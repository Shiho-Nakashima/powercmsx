<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class Members extends PTPlugin {

    public $cookie_name = 'pt-member';
    public $member = null;
    public $updated_login   = false;
    public $updated_session = null;
    public $updated_member  = null;

    function __construct () {
        parent::__construct();
    }

    function __destruct () {
        if ( $obj = $this->updated_session ) {
            $obj->save();
        }
        if ( $obj = $this->updated_member ) {
            $obj->save();
        }
    }

    function hdlr_if_login ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $model = isset( $args['model'] ) ? $args['model'] : 'member';
        $member = $model == 'user' ? $app->user() : $this->member( $app );
        if ( $member ) {
            if ( isset( $args['setcontext'] ) && $args['setcontext'] ) {
                $ctx->stash( $model, $member );
            }
            return true;
        }
        return false;
    }

    function hdlr_member_context ( $args, $content, $ctx, $repeat, $counter ) {
        $model = isset( $args['model'] ) ? $args['model'] : 'member';
        $localvars = [ $model ];
        $member = null;
        if (! $counter ) {
            $app = $ctx->app;
            $member = $model == 'user' ? $app->user() : $this->member( $app );
            if (! $member ) {
                $repeat = false;
                return;
            }
            $ctx->localize( $localvars );
            $ctx->stash( $model, $member );
        }
        $member = $ctx->stash( $model );
        if ( $member ) {
            $ctx->stash( $model, $member );
            $ctx->local_vars['__total__'] = 1;
            $ctx->local_vars['__counter__'] = $counter;
        }
        if ( $counter ) {
            $ctx->restore( $localvars );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_if_members_app_url ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $workspace_id = isset( $args['workspace_id'] ) && ctype_digit( (string) $args['workspace_id'] )
                      ? (int) $args['workspace_id'] : 'any';
        if ( $workspace_id == 'any' ) {
            $options = $app->db->model( 'option' )->load( ['kind' => 'plugin_setting',
                                                           'key' => 'members_app_url', 'extra' => 'members'] );
            if ( is_array( $options ) && count( $options ) ) {
                foreach ( $options as $option ) {
                    if ( $option->value && $app->is_valid_url( $option->value ) ) {
                        return true;
                    }
                }
            }
        } else {
            $app_url =
                $this->get_config_value( 'members_app_url', $workspace_id );
            if ( $app_url && $app->is_valid_url( $app_url ) ) {
                return true;
            }
        }
        return false;
    }

    function hdlr_members_signuptoken ( $args, $ctx ) {
        $app = $ctx->app;
        if ( $app->param( '_preview' ) || php_sapi_name() === 'cli' || $app->id === 'Prototype' ) {
            return $app->magic();
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $token = $app->param( 'magic_token' ) ? $app->param( 'magic_token' ) : $app->magic();
        $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token,
                                                           'kind' => 'CR'] );
        $sess->start( $app->request_time );
        $expires = $this->get_config_value( 'members_sign_up_timeout', $workspace_id, true );
        $sess->expires( $app->request_time + $expires );
        $sess->save();
        return $token;
    }

    function hdlr_members_app_url ( $args, $ctx ) {
        $workspace_id = isset( $args['workspace_id'] ) && ctype_digit( (string) $args['workspace_id'] )
                      ? (int) $args['workspace_id'] : 0;
        $app_url = $this->get_config_value( 'members_app_url', $workspace_id, true );
        return $app_url;
    }

    function pre_save_member ( &$cb, $app, &$obj, $original ) {
        if ( $obj->language && !in_array( $obj->language, $app->languages ) ) {
            $cb['error'] = $app->translate( "'Language' is invalid." );
            return false;
        }
        if ( isset( $cb['is_new'] ) && $cb['is_new'] ) {
            $existing = $app->db->model( 'member' )->get_by_key( ['name' => $obj->name ] );
            $error = false;
            if ( $existing->id ) {
                $cb['errors'][] = $app->translate( "A %1\$s with the same %2\$s '%3\$s' already exists.",
                      [ $app->translate( 'Member' ), $app->translate( 'Name' ), $obj->name ] );
                $error = true;
            }
            $existing = $app->db->model( 'member' )->get_by_key( ['email' => $obj->email ] );
            if ( $existing->id ) {
                $cb['errors'][] = $app->translate( "A %1\$s with the same %2\$s '%3\$s' already exists.",
                      [ $app->translate( 'Member' ), $app->translate( 'Email' ), $obj->email ] );
                $error = true;
            }
            if ( $error ) {
                return false;
            }
        }
        if ( $app->id !== 'Prototype' ) return true;
        if ( $app->param( 'reg_workspace_id_selector' ) == 'system' ) {
            $obj->reg_workspace_id( 0 );
        }
        if ( $app->param( 'member_send_notification' ) && !$obj->notification 
            && ( $original && $original->status != 2 ) && $obj->status == 2 ) {
            $component = $this;
            $obj->notification( 1 );
            $workspace_id = $obj->reg_workspace_id;
            $workspace = $workspace_id ?
                $app->db->model( 'workspace' )->load( (int) $workspace_id ) : null;
            // send notification
            $ctx = $app->ctx;
            $app->set_mail_param( $ctx );
            $subject = null;
            $body = null;
            $template = null;
            $body = $app->get_mail_tmpl( 'members_activate_notification', $template, $workspace );
            if ( $template ) {
                $subject = $template->subject;
            }
            if (! $subject ) {
                $subject = $app->translate( "Your account of '%s' was activated by administrator.", $ctx->vars['app_name'] );
            }
            $mail_from = $this->mail_from( $app, $workspace_id );
            $app_url =
                $component->get_config_value( 'members_app_url', $workspace_id, true );
            if (! $app_url ) {
                $cb['error'] = $app->translate( 'App URL has not been set.' );
                return false;
            }
            $ctx->vars['admin_url'] = $app_url;
            $ctx->vars['workspace_id'] = $workspace_id;
            $ctx->vars['user_language'] = $obj->language;
            $headers = ['From' => $mail_from ];
            $error = '';
            $body = $app->build( $body );
            $subject = $app->build( $subject );
            $mail_from = $app->build( $mail_from );
            if (! PTUtil::send_mail(
                $obj->email, $subject, $body, $headers, $error ) ) {
                $cb['errors'][] = $error;
                return false;
            }
        }
        if (! $obj->notification ) {
            $obj->notification( 0 );
        }
        return true;
    }

    function post_login_member ( $cb, $app, $member ) {
        if ( $app->api_allow_login && $app->api_use_cookie ) {
            // Session for RESTfulAPI.
            $remember = $app->param( 'remember' );
            $workspace_id = (int)$app->param( 'workspace_id' );
            $expires = $this->get_config_value( 'members_sess_timeout', $workspace_id );
            if (! $expires ) {
                $expires = $app->api_sess_expires ?? 3600;
            }
            $time = $app->request_time;
            $session = $app->db->model( 'session' )->get_by_key(
                  ['key' => 'RESTfulAPIAccessToken','kind' => 'US', 'user_id' => $member->id ] );
            if ( $remember ) {
                $expires = 60 * 60 * 24 * 365;
            }
            $expires += $time;
            $cookie_value = null;
            if (! $session->value ) {
                $session->name('');
                $cookie_value = $app->magic();
            } else {
                $cookie_value = $session->value;
            }
            $path = $app->cookie_path ?? $app->path;
            $name = $app->api_cookie_name ?? 'pt-api-user';
            $app->bake_cookie( $name, $cookie_value, $expires, $path, true, $app->cookie_domain );
            $session->text( 'member' );
            $session->value( $cookie_value );
            if ( $session->id &&
               ( $session->expires && $session->expires > $time && $session->name ) ) {
                $session->expires( $expires );
                $session->save();
            } else {
                $session->expires( $expires );
                $session->start( $time );
                $magic = $app->magic();
                $session->name( $magic );
                $session->save();
            }
        }
        return true;
    }

    function members_post_load_urlinfo ( &$cb, &$app, &$obj, $original ) {
        if ( $app->id !== 'Bootstrapper' ) {
            return true;
        }
        if ( $member = $this->member( $app ) ) {
            $ctx = $app->ctx;
            // $ctx->stash( 'member', $member );
            if ( $language = $member->language ) {
                if ( $ctx->language !== $language ) {
                    $app->language = $language;
                    $ctx->language = $language;
                    $ctx->vars['user_language'] = $language;
                    $app->set_language( null, $language );
                    $components = $app->components;
                    array_shift( $components );
                    foreach ( $components as $component ) {
                        if (! isset( $component->dictionary[ $language ] )
                            && method_exists( $component, 'set_language' ) ) {
                            $component->set_language( $language );
                        }
                    }
                }
            }
            $app->ctx = $ctx;
        }
        return true;
    }

    function mail_from ( $app, $workspace_id = 0 ) {
        $mail_from =
            $this->get_config_value( 'members_email_from', $workspace_id, true );
        if (! $mail_from ) {
            $system_email = $app->get_config( 'system_email' );
            if (!$system_email ) {
                return $app->error( 'System Email Address is not set in System.' );
            }
            $mail_from = $system_email->value;
        }
        return $mail_from;
    }

    function member ( $app ) {
        if ( $app->member && !$app->always_update_login ) {
            return $app->member;
        } else if ( $app->member && $app->always_update_login && $this->updated_login ) {
            return $app->member;
        }
        if (! $app ) $app = Prototype::get_instance();
        if ( $app->id == 'Worker' && $app->members_member_in_worker ) {
            $member_id = (int) $app->members_member_in_worker;
            if ( $member_id ) {
                $member = $app->db->model( 'member' )->load( $member_id );
                if ( $member ) {
                    $this->member = $member;
                    $app->member = $member;
                    return $member;
                }
            }
        } else if ( $app->id == 'Prototype'
            && $app->mode == 'save' && $app->user() && $app->members_member_in_preview ) {
            if ( $app->param( '_preview' ) && $app->request_method == 'POST' ) {
                $member_id = (int) $app->members_member_in_preview;
                if ( $member_id ) {
                    $member = $app->db->model( 'member' )->load( $member_id );
                    if ( $member ) {
                        $this->member = $member;
                        $app->member = $member;
                        return $member;
                    }
                }
            }
        }
        $cookie_name = $this->cookie_name;
        $cookie = $app->cookie_val( $cookie_name );
        if (!$cookie ) return null;
        $sess = $app->db->model( 'session' )->get_by_key(
            ['name' => $cookie, 'kind' => 'US', 'key' => 'member'] );
        if (! $sess->id ) return null;
        if (! $sess->user_id ) return null;
        $member = $app->db->model( 'member' )->load( (int) $sess->user_id );
        if (! $member ) {
            return null;
        }
        if ( $member->delete_flag ) return null;
        $status_published = $app->status_published( 'member' );
        if ( $member->status != $status_published ) {
            return null;
        }
        $app->language = $member->language;
        $app->ctx->vars['user_language'] = $member->language;
        if ( $member->lock_out ) return null;
        if ( $app->always_update_login && !$this->updated_login ) {
            $app->always_update_login = false;
            $this->updated_login = true;
            $workspace_id = $app->workspace_id
                          ? $app->workspace_id : $app->param( 'workspace_id' );
            if (! $workspace_id ) $workspace_id = 0;
            $sess_timeout = $this->get_config_value( 'members_sess_timeout', $workspace_id, true );
            $expires = time() + $sess_timeout;
            if ( $sess->expires < $expires ) {
                $sess->expires( $expires );
                $this->updated_session = $sess;
            }
            $expires = $sess_timeout;
            if ( $sess->value ) {
                $expires = 60 * 60 * 24 * 365;
            }
            $path = $app->cookie_path ? $app->cookie_path : $app->path;
            $app->bake_cookie( $cookie_name, $cookie, $expires, $path, true );
            $member->last_login_on( date( 'YmdHis' ) );
            $member->last_login_ip( $app->remote_ip );
            $this->updated_member = $member;
        }
        $this->member = $member;
        $app->member = $member;
        return $member;
    }

    function member_ip_unlock ( $app ) {
        if ( is_array( $app->ip_unlock ) && !empty( $app->ip_unlock ) &&
            isset( $app->ip_unlock['member'] ) && $app->ip_unlock['member'] ) {
            $past = $app->ip_unlock['member'];
            $res_counter = 0;
            $ts = PTUtil::current_ts( $app->request_time - $past );
            $terms = ['class' => 'banned', 'created_on' => ['<' => $ts ], 'model' => 'member'];
            $remote_ips = $app->db->model( 'remote_ip' )->load( $terms );
            foreach ( $remote_ips as $remote_ip ) {
                $remote_ip->class( 'info' );
                $app->set_default( $remote_ip );
                $message = $this->translate( "The Member's lockout IP address %s has been released.", $remote_ip->ip_address );
                $remote_ip->save();
                $app->log( ['message' => $message, 'category' => 'worker',
                            'model' => 'remote_ip', 'object_id' => $remote_ip->id,
                            'workspace_id' => 0, 'level' => 'info'] );
                $res_counter++;
            }
            unset( $remote_ips );
            return $res_counter;
        }
        return 0;
    }
}