<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class MultipleNotifications extends PTPlugin {

    private $sent_mail = false;

    function __construct () {
        parent::__construct();
    }

    function mail_filter ( &$cb, $app, &$to, $subject, $body, &$headers ) {
        if ( $app->id !== 'Prototype' && $app->id !== 'Worker' && $app->id !== 'RESTfulAPI'
            || ( $app->id === 'Prototype' && $app->mode !== 'save' && $app->mode !== 'list_action' ) ) {
            return true;
        }
        $caller = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS, 4 );
        if (! isset( $caller[3] ) ) {
            return true;
        }
        $caller = $caller[3];
        if (! isset( $caller['class'] ) ||
            ( $caller['class'] != 'PTWorkflow' && $caller['class'] != 'BatchApproval' ) ) {
            return true;
        }
        if (! isset( $caller['function'] ) || 
            ( $caller['function'] != 'workflow_post_save'
            && $caller['function'] != 'batch_approval_objects'
            && $caller['function'] != 'publish_object' ) ) {
            return true;
        }
        $user = $app->user();
        if ( $user ) {
            $my_id = (int) $user->id;
            $model = $app->param( '_model' );
            $workspace_id = $app->param( 'workspace_id' ) ? $app->param( 'workspace_id' ) : 0;
            if (! $workspace_id && $app->id == 'Worker' ) {
                $workspace = $app->ctx->stash( 'workspace' );
                $workspace_id = $workspace ? $workspace->id : $workspace_id;
            }
            if ( $app->id === 'RESTfulAPI' ) {
                $model = $app->model;
                $workspace_id = $app->workspace_id;
            }
            $workspace_id = (int) $workspace_id;
            $enabled = $this->get_config_value( 'multiplenotifications_enabled', $workspace_id );
            if (! $enabled ) return true;
            $workflow = $app->db->model( 'workflow' )->get_by_key(
                        ['model' => $model, 'workspace_id' => $workspace_id ] );
            if (!$workflow->id ) return true;
            $from_permission = $app->permission_group( $user, $model, $workspace_id );
            if ( is_string( $to ) && strpos( $to, ',' ) === false ) {
                $to_user = $app->db->model( 'user' )->get_by_key( ['email' => $to ] );
                if (!$to_user->id ) return true;
                $to_permission = $app->permission_group( $to_user, $model, $workspace_id );
                if ( $app->multiplenotifications_to_same_group && $from_permission == $to_permission ) {
                    if (! $app->multiplenotifications_to_all_publisher ) {
                        if ( $this->sent_mail ) {
                            $cb['cancel'] = true;
                            return true;
                        }
                        $this->sent_mail = true;
                    }
                }
            }
            $send_to = is_array( $to ) ? $to : explode( ',', $to );
            foreach ( $send_to as $to_addr ) {
                $to_user = $app->db->model( 'user' )->get_by_key( ['email' => $to_addr ] );
                if (!$to_user->id ) continue;
                $to_permission = $app->permission_group( $to_user, $model, $workspace_id );
                $relation_name = '';
                if ( $to_permission == 'creator' ) {
                    $relation_name = 'users_draft';
                } else if ( $to_permission == 'reviewer' ) {
                    $relation_name = 'users_review';
                } else { // publisher
                    $relation_name = 'users_publish';
                }
                $terms = ['relation_name' => $relation_name ];
                $users = $app->load_related_objs( $workflow, 'user', $terms );
                foreach ( $users as $user ) {
                    $user_id = (int) $user->id;
                    if ( $app->multiplenotifications_to_same_group === 2 && $user_id == $my_id ) {
                        continue;
                    }
                    if ( $relation_name == 'users_publish'
                        && $app->multiplenotifications_to_all_publisher === 2 && $user_id == $my_id ) {
                        continue;
                    }
                    $send_to[] = $user->email;
                }
            }
            $send_to = array_unique( $send_to );
            $to = implode( ',', $send_to );
            if ( $app->multiplenotifications_send_bcc ) {
                $to_email = $app->multiplenotifications_send_bcc;
                $msg = '';
                if (! $app->is_valid_email( $to_email, $msg ) ) {
                    $to_email = $app->system_email();
                    if (! $to_email ) {
                        return $app->error( $msg );
                    }
                }
                $to = $to_email;
                $bcc = [];
                if ( isset( $headers['Bcc'] ) ) {
                    $bcc = $headers['Bcc'];
                    if ( is_array( $bcc ) ) {
                    } else if ( is_string( $bcc ) ) {
                        $bcc = explode( ',', $bcc );
                    } else {
                        $bcc = [];
                    }
                }
                $headers['Bcc'] = array_unique( array_merge( $send_to, $bcc ) );
                if ( $app->multiplenotifications_send_bcc_logging ) {
                    ob_start();
                    var_dump( $headers );
                    $_headers = ob_get_clean();
                    ob_start();
                    var_dump( $options );
                    $options = ob_get_clean();
                    $metadata = ['mailto' => $to, 'subject' => $subject,
                                 'body' => $body, 'headers' => $_headers, ];
                    $app->log( ['message' => '[bcc_logging] ' . $subject,
                                'metadata' => $metadata,
                                'category' => 'bcc_logging' ] );
                }
            }
        }
        return true;
    }

    function publish_object ( $cb, $app, $obj, &$user_ids ) {
        if (! $app->multiplenotifications_to_all_publisher ) {
            return true;
        }
        $user = $app->user();
        if ( $user ) {
            $my_id = (int) $user->id;
            $model = $app->param( '_model' );
            $workspace_id = $app->param( 'workspace_id' ) ? $app->param( 'workspace_id' ) : 0;
            if ( $app->id === 'RESTfulAPI' ) {
                $model = $app->model;
                $workspace_id = $app->workspace_id;
            }
            $enabled = $this->get_config_value( 'multiplenotifications_enabled', $workspace_id );
            if (! $enabled ) return true;
            $workflow = $app->db->model( 'workflow' )->get_by_key(
                        ['model' => $model, 'workspace_id' => $workspace_id ] );
            if (!$workflow->id ) return true;
            $relation_name = 'users_publish';
            $terms = ['relation_name' => $relation_name ];
            $users = $app->load_related_objs( $workflow, 'user', $terms );
            foreach ( $users as $user ) {
                $user_id = (int) $user->id;
                if ( $app->multiplenotifications_to_all_publisher === 2 && $my_id == $user_id ) {
                    continue;
                }
                if (! in_array( $user_id, $user_ids ) ) {
                    $user_ids[] = $user_id;
                }
            }
            $user_ids = array_unique( $user_ids );
        }
        return true;
    }

}