<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class ExclusionControl extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function set_dashboard_message ( $cb, $app ) {
        if ( $app->param( 'exclusioncontrol_in_edit' ) ) {
            $user_id = (int) $app->param( 'user_id' );
            $model = $app->param( '_model' );
            if (! $user_id || ! $model ) return;
            $user = $app->db->model( 'user' )->load( $user_id );
            $nickname = $app->escape( $user->nickname );
            $model = $app->translate( $app->translate( $model, null, $app, 'default' ) );
            $workspace_id = (int) $app->param( 'workspace_id' );
            $show_username  = $this->get_config_value( 'exclusioncontrol_show_username', $workspace_id );
            if ( $show_username ) {
                if ( $app->param( 'hierarchy' ) ) {
                    $message
                      = $this->translate( 'The %s you tried to manage hierarchy are being edited by other user %s.',
                           [ $model, $nickname ] );
                } else {
                    $message
                      = $this->translate( 'The %s you tried to edit are being edited by other user %s.',
                           [ $model, $nickname ] );
                }
            } else {
                if ( $app->param( 'hierarchy' ) ) {
                    $message
                      = $this->translate( 'The %s you tried to manage hierarchy are being edited by other user.',
                           [ $model, $nickname ] );
                } else {
                    $message
                      = $this->translate( 'The %s you tried to edit are being edited by other user.',
                           [ $model, $nickname ] );
                }
            }
            $message .= ' ' . $this->translate( 
                   'Please try again in a short while.' );
            $app->ctx->vars['error'] = isset( $app->ctx->vars['error'] )
                                     ? $app->ctx->vars['error'] . "\n$message"
                                     : $message;
        }
    }

    function exclusioncontrol_pre_view ( $app ) {
        if ( $app->id != 'Prototype' ) {
            return;
        }
        if ( $app->mode == 'view' && $app->param( '_type' ) == 'edit' && $app->param( 'id' ) ) {
        } else if ( $app->mode == 'view' && $app->param( '_type' ) == 'hierarchy' ) {
        } else if ( $app->mode == 'save' || $app->mode == 'save_hierarchy' ) {
        } else {
            return;
        }
        $model = $app->param( '_model' );
        $workspace_id = $model === 'workspace' ? 0 : (int) $app->param( 'workspace_id' );
        $models  = $this->get_config_value( 'exclusioncontrol_target_models', $workspace_id );
        $models = preg_split( "/\s*,\s*/", $models );
        if ( in_array( $model, $models ) ) {
            if ( $model == 'table' && $app->param( '__validation' ) ) {
                return;
            }
            $_type  = $app->param( '_type' ); // edit or hierarchy
            if ( $app->mode == 'save' ) {
                $_type = 'edit';
            } else if ( $app->mode == 'save_hierarchy' ) {
                $_type = 'hierarchy';
            }
            $name = "exclusioncontrol_{$model}_{$_type}";
            $id = $_type == 'hierarchy' ? 0 : (int) $app->param( 'id' );
            $session = $app->db->model( 'session' )->get_by_key(
                ['name' => $name, 'key' => $id, 'workspace_id' => $workspace_id, 'kind' => 'EC'] );
            $user_id = $app->user()->id;
            $in_error = false;
            if ( $session->id ) {
                if ( $user_id != $session->user_id && $session->expires > time() ) {
                    $in_error = true;
                    $app->stash( 'exclusioncontrol_in_error', true );
                    $params = ['exclusioncontrol_in_edit' => 1, 'user_id' => $session->user_id, '_model' => $model ];
                    if ( $app->param( '_type' ) == 'hierarchy' || $app->mode == 'save_hierarchy' ) {
                        $hierarchy  = $this->get_config_value( 'exclusioncontrol_hierarchy', $workspace_id );
                        if (! $hierarchy ) return;
                        $params['hierarchy'] = 1;
                    }
                    $error_handling  = $this->get_config_value( 'exclusioncontrol_error', $workspace_id );
                    if ( $app->mode == 'save' || $app->mode == 'save_hierarchy' ) {
                        $error_handling = 'error';
                    }
                    $user = $app->db->model( 'user' )->load( (int) $session->user_id );
                    if (! $user ) return;
                    if ( $error_handling == 'dashboard' ) {
                        $app->return_to_dashboard( $params );
                    }
                    $nickname = $app->escape( $user->nickname );
                    $model = $app->translate( $app->translate( $model, null, $app, 'default' ) );
                    $show_username  = $this->get_config_value( 'exclusioncontrol_show_username', $workspace_id );
                    if ( $show_username ) {
                        if ( $app->param( '_type' ) == 'hierarchy' || $app->mode == 'save_hierarchy' ) {
                            $message
                              = $this->translate( 'The %s you tried to manage hierarchy are being edited by other user %s.',
                                   [ $model, $nickname ] );
                        } else {
                            $message
                              = $this->translate( 'The %s you tried to edit are being edited by other user %s.',
                                   [ $model, $nickname ] );
                        }
                    } else {
                        if ( $app->param( '_type' ) == 'hierarchy' || $app->mode == 'save_hierarchy' ) {
                            $message
                              = $this->translate( 'The %s you tried to manage hierarchy are being edited by other user.',
                                   [ $model, $nickname ] );
                        } else {
                            $message
                              = $this->translate( 'The %s you tried to edit are being edited by other user.',
                                   [ $model, $nickname ] );
                        }
                    }
                    if ( $error_handling == 'error' ) {
                        $message .= ' ' . $this->translate( 
                               'Please try again in a short while.' );
                        return $app->error( $message );
                    } else {
                        $app->ctx->vars['error'] = isset( $app->ctx->vars['error'] )
                                                 ? $app->ctx->vars['error'] . "\n$message"
                                                 : $message;
                    }
                }
            }
            if (! $in_error ) {
                $expires = (int) $this->get_config_value( 'exclusioncontrol_sess_expires', $workspace_id );
                $session->start( time() );
                $session->expires( time() + $expires );
                $session->user_id( $user_id );
                $session->save();
            }
        }
    }

    function exclusioncontrol_in_edit ( $app ) {
        $model = $app->param( '_model' );
        $_type  = $app->param( '_type' ); // edit or hierarchy
        $name  = "exclusioncontrol_{$model}_{$_type}";
        $workspace_id = (int) $app->param( 'workspace_id' );
        $id = (int) $app->param( 'id' );
        $session = $app->db->model( 'session' )->get_by_key(
            ['name' => $name, 'key' => $id, 'workspace_id' => $workspace_id, 'kind' => 'EC'] );
        $expires = (int) $this->get_config_value( 'exclusioncontrol_sess_expires', $workspace_id );
        $user_id = $app->user()->id;
        if ( $session->id && $user_id != $session->user_id && $session->expires > time() ) {
            $status = 403;
        } else {
            $can_do = false;
            if ( $_type == 'edit' ) {
                if ( $id ) {
                    $obj = $app->db->model( $model )->load( $id );
                    if ( $obj && $app->can_do( $model, 'edit', $obj ) ) {
                        $can_do = true;
                    }
                }
            } else {
                if ( $app->can_do( $model, 'hierarchy', null, $app->workspace() ) ) {
                    $can_do = true;
                }
            }
            if (! $can_do ) {
                $status = 403;
            } else {
                $session->start( time() );
                $session->expires( time() + $expires );
                $session->user_id( $user_id );
                if ( $session->save() ) {
                    $status = 200;
                } else {
                    $status = 500;
                }
            }
        }
        $results = ['status' => $status, 'name' => $name ];
        header( $app->protocol . " {$status}" );
        $app->print( json_encode( $results, JSON_UNESCAPED_UNICODE ), 'application/json; charset=utf-8', null, false );
    }

    function insert_exclusioncontrol_script ( $cb, $app, $param, $tmpl, &$out ) {
        if ( $app->stash( 'exclusioncontrol_in_error' ) ) {
            return;
        }
        $model = $app->param( '_model' );
        $workspace_id = $model === 'workspace' ? 0 : (int) $app->param( 'workspace_id' );
        $models  = $this->get_config_value( 'exclusioncontrol_target_models', $workspace_id );
        $model = $app->param( '_model' );
        $_type  = $app->param( '_type' ); // edit or hierarchy
        $models = preg_split( "/\s*,\s*/", $models );
        if ( in_array( $model, $models ) ) {
            if ( $_type == 'hierarchy' ) {
                $hierarchy  = $this->get_config_value( 'exclusioncontrol_hierarchy', $workspace_id );
                if (! $hierarchy ) return;
            }
            $include = $this->path() . DS . 'tmpl' . DS . 'footer_javascript.tmpl';
            $include = $app->ctx->build( file_get_contents( $include ) );
            $out = preg_replace( '!</body>!i', "{$include}</body>", $out );
        }
    }
}