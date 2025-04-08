<?php

class PTMembers extends Prototype {

    public $cookie_name = 'pt-member';
    public $default_language;
    public $member = null;
    public $excludes = ['id', 'notification', 'status', 'delete_flag', 'created_by',
                        'lock_out', 'modified_by', 'lock_out_on', 'created_on',
                        'modified_on', 'last_login_on', 'last_login_ip', 'reg_workspace_id'];
    public $non_editable = [];

    function __construct ( $options = [] ) {
        $this->id = 'Members';
        $this->login_model = 'member';
        parent::__construct( $options );
    }

    function init () {
        require( LIB_DIR . 'Prototype' . DS . 'core_validation_types.php' );
        parent::init();
        $this->ctx->use_cache_id = true;
    }

    function user ( $login_model = null ) {
        return;
    }

    function member ( $login_model = 'member' ) {
        return parent::user( $login_model );
    }

    function login ( $model = 'member', $return_url = null, $terms = [] ) {
        $app = $this;
        $app->init_tags();
        $component = $app->component( 'Members' );
        if (! is_object( $component ) ) {
            exit();
        }
        $workspace_id = $app->workspace_id
                      ? $app->workspace_id : $app->param( 'workspace_id' );
        if ( $app->request_method == 'POST' ) {
            $app->two_factor_auth = $component->get_config_value( 'members_two_factor_auth', $workspace_id );
            $app->sess_timeout = $component->get_config_value( 'members_sess_timeout', $workspace_id );
            $app->system_email = $component->mail_from( $app, $workspace_id );
        }
        if ( $return_url !== true ) {
            $return_url = $return_url ? $return_url : $component->get_config_value( 'members_login_return_url', $workspace_id );
            if ( $return_url && strpos( $return_url, '/' ) !== 0 ) {
                $return_url = preg_replace( '!^https{0,1}://[^/]*?/!', '/', $return_url );
            }
            $return_url = $return_url ? $return_url : $this->get_return_url();
        }
        return parent::login( $model, $return_url, ['delete_flag' => 0] );
    }

    function is_login ( $model = 'member', $cookie_name = null ) {
        return parent::is_login( 'member', $this->cookie_name );
    }

    function run () {
        $app = $this;
        $app->init_tags();
        $app->default_language = $app->language;
        $component = $app->component( 'Members' );
        if (! is_object( $component ) ) {
            exit();
        }
        if (! empty( $app->hooks ) ) {
            $app->run_hooks( 'pre_run' );
        }
        $ctx = $app->ctx;
        $workspace_id = $app->workspace_id
                      ? $app->workspace_id : (int) $app->param( 'workspace_id' );
        if (! $workspace_id ) $workspace_id = 0;
        if ( $app->mode == 'login' && $app->request_method == 'POST' ) {
            $app->two_factor_auth = $component->get_config_value( 'members_two_factor_auth', $workspace_id );
        }
        $member = $this->member ? $this->member : $component->member( $app );
        $allow_login = $component->get_config_value( 'members_allow_login', $workspace_id );
        if (! $allow_login ) return $app->logout( $member );
        $app->member = $member;
        $mode = $app->mode;
        if ( $return_args = $app->param( 'return_args' ) ) {
            parse_str( $return_args, $app->return_args );
        }
        $methods = isset( $this->registry['methods'] ) ? $this->registry['methods'] : null;
        list ( $plugin, $plugin_method ) = [ null, null ];
        if ( is_array( $methods ) && isset( $methods[ $mode ] ) ) {
            $method = $methods[ $mode ];
            if ( isset( $method['application'] ) &&
                strtolower( $method['application'] ) == strtolower( $app->id ) ) {
                list( $plugin, $plugin_method ) = [ $method['component'], $method['method'] ];
                $plugin = $app->component( $plugin );
                if ( is_object( $plugin ) && method_exists( $plugin, $plugin_method ) ) {
                    if (! isset( $method['requires_login'] ) || ! $method['requires_login'] ) {
                        return $plugin->$plugin_method( $app );
                    }
                }
            }
        }
        if ( $member ) {
            if ( $language = $member->language ) {
                if ( $ctx->language !== $language && in_array( $language, $app->languages ) ) {
                    $app->language = $language;
                    $ctx->language = $language;
                    $ctx->vars['user_language'] = $language;
                    $app->set_language( null, $language );
                    $components = $app->components;
                    array_shift( $components );
                    foreach ( $components as $plugin ) {
                        if (! isset( $plugin->dictionary[ $language ] )
                            && method_exists( $plugin, 'set_language' ) ) {
                            $plugin->set_language( $language );
                        }
                    }
                }
            }
            $member_values = $member->get_values();
            foreach ( $member_values as $colName => $colValue ) {
                if ( strpos( $colName, 'password' ) !== false ) continue;
                $ctx->vars[ $colName ] = $colValue;
            }
            if ( $plugin && $plugin_method && method_exists( $plugin, $plugin_method ) ) {
                return $plugin->$plugin_method( $app );
            }
        } else {
            if ( $app->param( 'language' ) ) {
                $this->language = $app->param( 'language' );
            } else {
                if ( $app->members_set_accept_language && isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) {
                    $language = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
                    if ( in_array( $this->language, $app->languages ) ) {
                        $this->language = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
                    }
                }
            }
            if ( $ctx->language !== $this->language && in_array( $this->language, $app->languages ) ) {
                $language = $this->language;
                $ctx->language = $language;
                $ctx->vars['user_language'] = $language;
                $app->set_language( null, $language );
                $components = $app->components;
                array_shift( $components );
                foreach ( $components as $plugin ) {
                    if (! isset( $plugin->dictionary[ $language ] )
                        && method_exists( $plugin, 'set_language' ) ) {
                        $plugin->set_language( $language );
                    }
                }
            }
        }
        $ctx->vars['workspace_id'] = $workspace_id;
        $workspace = $workspace_id ?
                     $app->db->model( 'workspace' )->load( (int) $workspace_id ) : null;
        if ( $workspace_id && ! $workspace ) {
            return $app->error( 'Invalid request.' );
        }
        if ( $workspace ) {
            $app->stash( 'workspace', $workspace );
            $ctx->stash( 'workspace', $workspace );
            $ctx->vars['appname'] = $workspace->name;
            $barcolor = $workspace->barcolor;
            $bartextcolor = $workspace->bartextcolor;
            $html_head = isset( $ctx->vars['html_head'] ) ? $ctx->vars['html_head'] : '';
            $html_head .= '<style>';
            $html_head .= ".nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: {$barcolor} !important; color: {$bartextcolor} !important; }";
            $html_head .= ".nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: {$bartextcolor} !important; }";
            $html_head .= '</style>';
            $ctx->vars['html_head'] = $html_head;
        }
        if ( $workspace_id ) {
            $app->workspace_id = $workspace_id;
            if ( $workspace ) {
                $ctx->stash( 'workspace', $workspace );
            }
        }
        if ( $app->mode == 'logout' ) return $app->logout( $member );
        if ( $app->mode == 'login' && !$member ) return $app->logout();
        if ( $app->mode == 'start_recover' ) return $app->__mode( 'start_recover' );
        $app_url = $component->get_config_value( 'members_app_url', $workspace_id, true );
        // if ( $app_url != $app->script_uri ) {
        if (! $app_url ) {
            $component->set_config_value( 'members_app_url', $app->script_uri, $workspace_id );
        }
        $allow_sign_up = null;
        if ( $app->mode == 'do_signup' ) {
            $allow_sign_up = $component->get_config_value( 'members_allow_sign_up', $workspace_id );
            if (! $allow_sign_up ) {
                return $app->logout( $member );
            }
            $sign_up_status = $component->get_config_value( 'members_sign_up_status', $workspace_id, true );
            $ctx->vars['sign_up_status'] = $sign_up_status;
            return $app->do_signup();
        }
        if ( $app->mode == 'unsubscribe' && !$member ) return $app->logout();
        if ( $app->mode == 'unsubscribe' ) return $app->unsubscribe();
        $non_editable =
            $component->get_config_value( 'members_non_editable_cols', $workspace_id, true );
        if ( $non_editable ) {
            $non_editable = preg_split( '/\s*,\s*/', $non_editable );
            $app->non_editable = $non_editable;
            $ctx->vars['non_editable_columns'] = $non_editable;
        }
        if ( $app->mode == 'edit_profile' && !$member ) return $app->logout();
        if ( $app->mode == 'edit_profile' ) return $app->edit_profile();
        if ( $app->mode == 'sign_up' ) {
            $allow_sign_up = $allow_sign_up ? $allow_sign_up
                                            : $component->get_config_value( 'members_allow_sign_up', $workspace_id );
            if (! $allow_sign_up ) {
                return $app->logout( $member );
            }
            return $app->request_method == 'GET' ? $app->__mode( 'sign_up' )
                                                 : $app->sign_up();
        }
        if ( $app->param( '_lockedout' ) ) {
            return $app->logout( $member );
        }
        if ( $app->mode == 'recover_password' ) {
            $app->system_email = $component->mail_from( $app, $workspace_id );
            $return_url =  $component->get_config_value( 'members_recover_return_url', $workspace_id );
            if ( $return_url && strpos( $return_url, '/' ) !== 0 ) {
                $return_url = preg_replace( '!^https{0,1}://[^/]*?/!', '/', $return_url );
            }
            $return_url = $return_url ? $return_url : $app->get_return_url();
            return $app->recover_password( $app, 'member', $return_url );
        }
        if ( ( $app->mode === 'login' || $app->mode === 'dashboard' ) && $member ) {
            $return_url = $app->param( 'return_url' );
            $return_url = $return_url ? $return_url : $component->get_config_value( 'members_login_return_url', $workspace_id );
            if ( $return_url && strpos( $return_url, '/' ) !== 0 ) {
                $return_url = preg_replace( '!^https{0,1}://[^/]*?/!', '/', $return_url );
            }
            $return_url = $return_url ? $return_url : $this->get_return_url();
            $app->redirect( $return_url );
        }
        if ( $member ) return $app->redirect( $app->get_return_url() );
        $redirect_url = $app->script_uri . '?__mode=login';
        $redirect_url .= $workspace_id ? '&workspace_id=' . $workspace_id : '';
        $app->redirect( $redirect_url );
    }

    function unsubscribe () {
        $app = $this;
        $component = $app->component( 'Members' );
        $member = $this->member ? $this->member : $component->member( $this );
        $ctx = $app->ctx;
        $_type = $app->param( '_type' );
        if (! $_type ) $_type = 'confirm';
        $workspace_id = (int) $app->param( 'workspace_id' );
        $workspace = $ctx->stash( 'workspace' );
        if (! $workspace && $workspace_id ) {
            $workspace = $app->db->model( 'workspace' )->load( $workspace_id );
        }
        if ( $_type && $_type == 'confirm' ) {
            $ctx->vars['page_title'] = $component->translate( 'Unsubscribe' );
            $magic = $app->magic();
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => $magic,
                                                               'kind' => 'CR'] );
            $sess->start( $_SERVER['REQUEST_TIME'] );
            $expires =
                $component->get_config_value( 'members_unsubscribe_timeout', $workspace_id, true );
            $sess->expires( $_SERVER['REQUEST_TIME'] + $expires );
            $sess->workspace_id( $workspace_id );
            if ( $app->validate_token_ip ) {
                $sess->key( $app->remote_ip );
            }
            if ( $app->validate_token_ua ) {
                $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
                $sess->data( $user_agent );
            }
            $sess->save();
            $ctx->vars['magic_token'] = $magic;
            $ctx->local_vars['magic_token'] = $magic;
            return $this->__mode( 'unsubscribe' );
        }
        if ( $_type && $_type == 'unsubscribe' && $app->request_method == 'POST' ) {
            $token = $app->param( 'magic_token' );
            if (! $token ) {
                return $app->error( 'Invalid request.' );
            }
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token, 'kind' => 'CR'] );
            if ( !$sess->id ) {
                return $app->error( 'Invalid request.' );
            }
            if ( $sess->expires < $_SERVER['REQUEST_TIME'] ) {
                return $app->error( 'Your session has expired. Please unregister again.' );
            }
            if ( $app->verify_form_referrer ) {
                $is_valid = true;
                $referer = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : null;
                if (! $referer ) {
                    $is_valid = false;
                } else {
                    $parse_url = parse_url( $referer );
                    $parse_admin = parse_url( $app->script_uri );
                    if ( $parse_url && $parse_admin
                        && $parse_url['scheme'] == $parse_admin['scheme']
                        && $parse_url['host']   == $parse_admin['host'] ) {
                        $is_valid = true;
                    } else {
                        $is_valid = false;
                    }
                }
                if (! $is_valid ) {
                    return $app->error( 'Invalid request.' );
                }
            }
            if ( $app->validate_token_ip ) {
                if ( $sess->key != $app->remote_ip ) {
                    return $app->error( 'Invalid request.' );
                }
            }
            if ( $app->validate_token_ua ) {
                $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
                if ( $sess->data != $user_agent ) {
                    return $app->error( 'Invalid request.' );
                }
            }
            $app->db->begin_work();
            $app->init_callbacks( 'member', 'save' );
            $original = clone $member;
            $orig_relations = $app->get_relations( $original );
            $orig_metadata  = $app->get_meta( $original );
            $original->_relations = $orig_relations;
            $original->_meta      = $orig_metadata;
            $errors = [];
            $changed_cols = [];
            $member->status( 1 );
            $member->delete_flag( 1 );
            $changed_cols = PTUtil::object_diff( $app, $member, $original, [], $changed_cols );
            $callback = ['name' => 'save_filter', 'error' => '', 'errors' => $errors,
                         'changed_cols' => $changed_cols, 'is_new' => false,
                         'orig_relations' => $orig_relations, 'orig_metadata' => $orig_metadata];
            $save_filter = $app->run_callbacks( $callback, 'member', $member, $original );
            $errors = $callback['errors'];
            if ( $callback['error'] ) {
                $errors[] = $callback['error'];
            }
            if (!$save_filter && empty( $errors ) ) {
                $errors[] = $app->translate( 'An error occurred while saving %s.', $app->translate( 'Member' ) );
            }
            if (!empty( $errors ) ) {
                $app->db->rollback();
                $app->txn_active = false;
                return $app->error(join("\n", $errors));
            }
            $callback = ['name' => 'pre_save', 'error' => '', 'errors' => $errors,
                         'changed_cols' => $changed_cols, 'is_new' => false,
                         'orig_relations' => $orig_relations, 'orig_metadata' => $orig_metadata];
            $pre_save = $app->run_callbacks( $callback, 'member', $member, $original );
            $errors = $callback['errors'];
            if ( $callback['error'] ) {
                $errors[] = $callback['error'];
            }
            if (!empty( $errors ) || !$pre_save ) {
                $app->db->rollback();
                $app->txn_active = false;
                return $app->error(join("\n", $errors));
            }
            $app->set_default( $member );
            if ( $member->save() ) {
                $callback = ['name' => 'before_save', 'error' => '', 'errors' => $errors,
                             'changed_cols' => $changed_cols, 'is_new' => false,
                             'orig_relations' => $orig_relations, 'orig_metadata' => $orig_metadata];
                $before_save = $app->run_callbacks( $callback, 'member', $member, $original );
                $errors = $callback['errors'];
                if ( $callback['error'] ) {
                    $errors[] = $callback['error'];
                }
                if (!empty( $errors ) || !$before_save ) {
                    $app->db->rollback();
                    $app->txn_active = false;
                    return $app->error( join( "\n", $errors ) );
                }
                $appname = $workspace ? $workspace->name : $app->appname;
                $message = $component->translate( "A member '%s' unsubscribe from '%s'.",
                    [ $member->name, $appname ] );
                $log = $app->log( ['message' => $message, 'category' => 'sign_up',
                                   'model' => 'member', 'object_id' => $member->id,
                                   'level' => 'info'] );
                $app->db->commit();
                $app->txn_active = false;
                $sess->remove();
                $mailto = $component->get_config_value(
                    'members_unsubscribe_notify_mailto', $workspace_id, true );
                if ( $mailto ) {
                    // send mail to administer
                    $app->set_mail_param( $ctx );
                    $subject = null;
                    $body = null;
                    $template = null;
                    $body = $app->get_mail_tmpl( 'members_unsubscribe_notification', $template, $workspace );
                    if ( $template ) {
                        $subject = $template->subject;
                    }
                    if (! $subject ) {
                        $subject = $app->translate( "A member '%s' unsubscribe on '%s'",
                            [ $member->name, $ctx->vars['app_name'] ] );
                    }
                    $mail_from = $component->mail_from( $app, $workspace_id );
                    $error = '';
                    $admin_url = $app->admin_url;
                    $ctx->vars['admin_url'] = $admin_url;
                    $ctx->vars['member_id'] = $member->id;
                    $ctx->vars['member_name'] = $member->nickname;
                    $ctx->vars['member_email'] = $member->email;
                    $ctx->vars['member_nickname'] = $member->nickname;
                    $body = $app->build( $body );
                    $subject = $app->build( $subject );
                    $mail_from = $app->build( $mail_from );
                    $mailto = $app->build( $mailto );
                    $headers = ['From' => $mail_from ];
                    $error = '';
                    if (! PTUtil::send_mail(
                        $mailto, $subject, $body, $headers, $error ) ) {
                        // Not show error for member
                    }
                }
                $callback = ['name' => 'post_save', 'log' => $log,
                             'changed_cols' => $changed_cols, 'is_new' => false,
                             'orig_relations' => $orig_relations, 'orig_metadata' => $orig_metadata];
                $app->run_callbacks( $callback, 'member', $member, $original );
            } else {
                $app->db->rollback();
                $app->txn_active = false;
                return $app->error( 'An error occurred while saving %s.', $app->translate( 'Member' ) );
            }
            $return_url = $app->param( 'return_url' );
            if ( $return_url ) {
                $return_url = $app->get_return_url();
            } else {
                $return_url = $app->script_uri . '?__mode=logout&unsubscribe=1';
                $return_url .= $workspace_id ? '&workspace_id=' . $workspace_id : '';
            }
            $app->redirect( $return_url );
        }
    }

    function edit_profile () {
        $app = $this;
        $cms_validations = $app->registry['cms_validations'] ?? [];
        $db = $app->db;
        $ctx = $app->ctx;
        $component = $app->component( 'Members' );
        $workspace_id = $app->workspace_id;
        $workspace = $ctx->stash( 'workspace' );
        $table = $app->get_table( 'member' );
        $columns = $db->model( 'column' )->load( ['table_id' => $table->id ],
                                            ['sort' => 'order', 'direction' => 'ascend'] );
        $excludes = $app->excludes;
        $member = $app->member;
        $original = clone $member;
        $original->_relations = $app->get_relations( $member );
        $original->_meta = $app->get_meta( $member );
        $fmgr = $app->fmgr;
        $scheme = $app->get_scheme_from_db( 'member' );
        $normalize =
            $component->get_config_value( 'members_sign_up_normalize', $workspace_id, true );
        $non_editable = $app->non_editable;
        if ( $app->request_method == 'POST' ) {
            $app->validate_magic();
            $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
            $errors = [];
            $messages = [];
            $file_names = [];
            $values = [];
            $related_objs = [];
            foreach ( $columns as $column ) {
                if ( in_array( $column->name, $excludes ) ) {
                    continue;
                } else if (! empty( $non_editable ) && in_array( $column->name, $non_editable ) ) {
                    continue;
                }
                $col = $column->name;
                if ( $column->unique ) {
                    if (! $app->validate_unique( $column, $member, $errors ) ) {
                        continue;
                    }
                }
                if ( $column->type == 'string' ) {
                    $data = $app->param( $column->name );
                    $size = mb_strlen( $data );
                    $max_size = (int) $column->size;
                    $max_length = (int) $column->maxlength;
                    if ( $max_length && $max_length < $size ) {
                        $errors[] = $component->translate( '%s must be %s characters or less.', [ $app->translate( $column->label ), $max_length ] );
                    } else if ( $max_size && $max_size < $size ) {
                        $errors[] = $component->translate( '%s must be %s characters or less.', [ $app->translate( $column->label ), $max_size ] );
                    }
                }
                if ( $column->validation_type && $app->param( $column->name ) && isset( $cms_validations[ $column->validation_type ] ) ) {
                    $v = $cms_validations[ $column->validation_type ];
                    $vComponent = $app->component( $v['component'] );
                    if ( is_object( $vComponent ) ) {
                        $vMeth = $v['method'];
                        if ( method_exists( $vComponent, $vMeth ) ) {
                            $cValue = $app->param( $column->name );
                            $vErr = '';
                            $res = $vComponent->$vMeth( $app->translate( $column->label ), $cValue, $vErr, $column );
                            if (! $res ) {
                                $errors[] = $vErr;
                                continue;
                            }
                        }
                    }
                }
                if ( $column->edit == 'file' && $column->type == 'blob' ) {
                    $file_names[ $column->name ] = $app->param( $column->name );
                    $base64 = $app->param( $column->name . '_base64' );
                    if ( $base64 ) {
                        $column_name = $column->name;
                        $parts = explode( ',', $base64 );
                        array_shift( $parts );
                        $file_data = implode( '', $parts );
                        if ( md5( $file_data ) == md5( base64_encode( $member->$column_name ) ) ) {
                            $ctx->vars[ $column->name . '_base64'] = $base64;
                            $values[ $column->name ] = $base64;
                        }
                    }
                    if ( isset( $_FILES[ $column->name ] ) &&  $_FILES[ $column->name ]['name'] ) {
                        $data = $app->base64_encode_file( $column, $errors, $messages );
                        $file_names[ $column->name ] = $_FILES[ $column->name ]['name'];
                    } else {
                        $data = $base64 ? $base64 : $app->base64_encode_file( $column, $errors, $messages );
                    }
                    if ( $data ) {
                        $ctx->vars[ $column->name . '_base64'] = $data;
                        if ( isset( $_FILES[ $column->name ] ) &&  $_FILES[ $column->name ]['name'] ) {
                            $_REQUEST[ $column->name ] = $_FILES[ $column->name ]['name'];
                        } else {
                            $_REQUEST[ $column->name ] = $app->param( $column->name );
                        }
                        $values[ $column->name ] = $data;
                    }
                } else if ( $column->edit == 'password(hash)' ) {
                    $pass = $app->param( $column->name );
                    $verify = $app->param( $column->name . '-verify' );
                    if ( $pass || $verify ) {
                        $msg = '';
                        if (!$app->is_valid_password( $pass, $verify, $msg ) ) {
                            $errors[] = $msg;
                            continue;
                        }
                    }
                    if ( $pass ) {
                        $values[ $column->name ] = password_hash( $pass, PASSWORD_BCRYPT );
                    }
                } else if ( $column->name == 'email' ) {
                    $data = $app->param( $column->name );
                    $msg = '';
                    if ( $normalize ) {
                        $data = PTUtil::normalize( $data );
                        $_REQUEST[ $column->name ] = $data;
                    }
                    if (!$app->is_valid_email( $data, $msg ) ) {
                        $errors[] = $msg;
                        continue;
                    }
                    $values[ $column->name ] = $data;
                } else if ( $column->edit == 'datetime' || $column->edit == 'date' ) {
                    $data = $app->validate_date( $column, $member, $errors );
                    $values[ $column->name ] = $data;
                } else if ( $column->edit == 'selection' && $column->disp_edit == 'checkbox' ) {
                    $data = $app->param( $column->name );
                    if ( is_array( $data ) ) {
                        if ( empty( $data ) && $column->not_null ) {
                            $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                            continue;
                        }
                        $data = implode( ',', $data );
                        if ( $normalize ) {
                            $data = PTUtil::normalize( $data );
                            $_REQUEST[ $column->name ] = $data;
                        }
                    }
                    $values[ $column->name ] = $data;
                } else if ( $column->type == 'relation' & strpos( $column->edit, 'relation:' ) === 0 ) {
                    list( $edit, $rel_model, $rel_col, $rel_type ) = explode( ':', $column->edit );
                    $ids = $app->param( $column->name );
                    $relatedObjs = is_array( $ids )
                                  ? $db->model( $rel_model )->load( ['id' => ['IN' => $ids ] ] )
                                  : $db->model( $rel_model )->load( (int) $ids );
                    $to_ids = [];
                    if ( is_array( $relatedObjs ) && count( $relatedObjs ) ) {
                        foreach ( $relatedObjs as $rerated_obj ) {
                            $to_ids[] = (int) $rerated_obj->id;
                        }
                    } else if ( is_object( $relatedObjs ) ) {
                        $to_ids[] = (int) $relatedObjs->id;
                    }
                    $related_objs[ $column->name ] = $to_ids;
                } else {
                    if (! isset( $_REQUEST[ $column->name ] ) ) continue;
                    $data = $app->param( $column->name );
                    if ( strpos( $column->type, 'int' ) !== false ) {
                        if ( $app->check_int_null == false ) {
                            // or allow 0 cols.
                            $data = (int) $data;
                        } else if ( $data === '' ) {
                            $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                            continue;
                        }
                    } else {
                        if ( $column->not_null && ! $data ) {
                            $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                            continue;
                        }
                    }
                    if ( $normalize ) {
                        $data = PTUtil::normalize( $data );
                        $_REQUEST[ $column->name ] = $data;
                    }
                    $values[ $column->name ] = $data;
                }
            }
            $app->init_callbacks( 'member', 'save' );
            if ( empty( $errors ) ) {
                foreach ( $columns as $column ) {
                    if ( in_array( $column->name, $excludes ) ) {
                        continue;
                    }
                    $upload_dir = $app->upload_dir();
                    $key = $column->name;
                    if (! isset( $values[ $key ] ) ) continue;
                    if ( $column->edit == 'file' && $column->type == 'blob' ) {
                        $file_name = $file_names[ $key ];
                        $value = $values[ $key ];
                        $base64 = explode( ',', $value );
                        $mime_type = explode( ':', explode( ';', $base64[0] )[0] )[1];
                        $parts = explode( '.', $file_name );
                        $extIndex = count( $parts ) - 1;
                        $extension = strtolower( @$parts[ $extIndex ] );
                        unset( $base64[0] );
                        $data = '';
                        foreach ( $base64 as $d ) {
                            $data .= $d;
                        }
                        $data = base64_decode( $data );
                        $member->$key( $data );
                        $basename = tempnam( $upload_dir, '' );
                        unlink( $basename );
                        $out = $basename . DS . $file_name;
                        $fmgr->put( $out, $data );
                        PTUtil::file_attach_to_obj( $app, $member, $key, $out );
                    } else {
                        $member->$key( $values[ $key ] );
                    }
                }
                $callback = ['name' => 'save_filter', 'error' => '', 'errors' => $errors, 'is_new' => false ];
                $save_filter = $app->run_callbacks( $callback, 'member', $member, $original );
                $errors = $callback['errors'];
                if ( $msg = $callback['error'] ) {
                    $errors[] = $msg;
                }
                if (! $save_filter && empty( $errors ) ) {
                    $errors[] = $app->translate( 'An error occurred while saving %s.', $app->translate( 'Member' ) );
                }
                if (! empty( $errors ) ) {
                    $ctx->vars['errors'] = $errors;
                    $ctx->vars['messages'] = $messages;
                } else {
                    if (! empty( $related_objs ) ) {
                        foreach ( $related_objs as $col => $to_ids ) {
                            $rel_model = isset( $relations[ $col ] ) ? $relations[ $col ] : null;
                            if (! $rel_model ) continue;
                            $args = ['from_id' => $member->id, 
                                     'name' => $col,
                                     'from_obj' => 'member',
                                     'to_obj' => $rel_model ];
                            $app->set_relations( $args, $to_ids, false, $errors );
                        }
                    }
                    $callback = ['name' => 'pre_save', 'error' => '', 'is_new' => false,
                                 'errors' => $errors ];
                    $pre_save = $app->run_callbacks( $callback, 'member', $member, $original );
                    $errors = $callback['errors'];
                    if ( $msg = $callback['error'] ) {
                        $errors[] = $msg;
                    }
                    if (!empty( $errors ) || !$pre_save ) {
                        $ctx->vars['errors'] = $errors;
                        $ctx->vars['messages'] = $messages;
                    } else {
                        $app->set_default( $member );
                        $member->save();
                        $changed_cols = PTUtil::object_diff( $app, $member, $original, [] );
                        $message = $component->translate( "Member '%s' edited own profile.", $member->name );
                        $metadata = (! empty( $changed_cols ) )
                                  ? json_encode( $changed_cols,
                                                 JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) : '';
                        $log = $app->log( ['message' => $message, 'category' => 'update',
                                           'model' => 'member', 'object_id' => $member->id,
                                           'metadata' => $metadata, 'level' => 'info'] );
                        $callback = ['name' => 'post_save', 'is_new' => false, 'changed_cols' => $changed_cols,
                                     'orig_relations' => $original->_relations,
                                     'orig_metadata' => $original->_meta, 'log' => $log ];
                        $app->run_callbacks( $callback, 'member', $member, $original );
                        $app->publish_obj( $member );
                        $return_url = $app->script_uri . '?__mode=edit_profile&saved=1';
                        $return_url .= $workspace_id ? '&workspace_id=' . $workspace_id : '';
                        $app->redirect( $return_url );
                    }
                }
            } else {
                $ctx->vars['errors'] = $errors;
                $ctx->vars['messages'] = $messages;
            }
        } else {
            foreach ( $columns as $column ) {
                if ( in_array( $column->name, $excludes ) ) {
                    continue;
                }
                $col = $column->name;
                if ( $column->edit == 'file' && $column->type == 'blob' ) {
                    if ( $member->$col === null ) {
                        $member = $app->db->model( 'member' )->load( $member->id );
                    }
                    if ( $member->$col ) {
                        $meta = $db->model( 'meta' )->get_by_key( ['model' => 'member',
                                                                   'kind' => 'metadata',
                                                                   'key' => $col,
                                                                   'object_id' => $member->id ] );
                        if ( $meta->text ) {
                            $metadata = json_decode( $meta->text, true );
                            $_REQUEST[ $col ] = $metadata['file_name'];
                            $mime_type = $metadata['mime_type'];
                            $data = base64_encode( $member->$col );
                            $data = "data:{$mime_type};base64,{$data}";
                            $ctx->vars[ $col . '_base64' ] = $data;
                        }
                    }
                } else if ( $column->edit == 'datetime' || $column->edit == 'date' ) {
                    if ( $member->$col ) {
                        $date = $member->ts2db( $member->db2ts( $member->$col ) );
                        list( $d, $t ) = explode( ' ', $date );
                        $_REQUEST[ $col ] = $d;
                        $_REQUEST[ "{$col}_time" ] = $t;
                    }
                } else if ( $column->type == 'relation' && strpos( $column->edit, 'relation:' ) === 0 ) {
                    list( $edit, $rel_model, $rel_col, $rel_type ) = explode( ':', $column->edit );
                    $relations = $app->get_relations( $member, $rel_model );
                    if ( $rel_type == 'checkbox' || $rel_type == 'hierarchy' || $rel_type == 'dialog' ) {
                        $rel_ids = [];
                        foreach ( $relations as $relation ) {
                            $rel_ids[] = $relation->to_id;
                        }
                        $_REQUEST[ $col ] = $rel_ids;
                    } else {
                        if ( count( $relations ) ) {
                            $relation = $relations[0];
                            $_REQUEST[ $col ] = $relation->to_id;
                        }
                    }
                } else {
                    $_REQUEST[ $col ] = $member->$col;
                }
            }
        }
        return $app->__mode( 'edit_profile' );
    }

    function do_signup () {
        $app = $this;
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $scheme = $app->get_scheme_from_db( 'member' );
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $component = $app->component( 'Members' );
        $ctx = $app->ctx;
        $workspace_id = (int) $app->param( 'workspace_id' );
        $workspace = $ctx->stash( 'workspace' );
        if (! $workspace && $workspace_id ) {
            $workspace = $app->db->model( 'workspace' )->load( $workspace_id );
        }
        if ( $app->param( 'signup' ) ) {
            return $this->__mode( 'do_signup' );
        }
        $token = $app->param( 'token' );
        if (! $token ) {
            return $app->error( 'Invalid request.' );
        }
        $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token, 'kind' => 'TM' ] );
        if ( !$sess->id ) {
            return $app->error( 'Invalid request.' );
        }
        if ( $sess->expires < $_SERVER['REQUEST_TIME'] ) {
            return $app->error( 'Your confirmation has expired. Please register again.' );
        }
        $data = json_decode( $sess->data, true );
        $values = $data['values'];
        $file_names = $data['file_names'];
        $member = $app->db->model( 'member' )->new();
        $upload_dir = $app->upload_dir();
        $fmgr = $app->fmgr;
        $files = [];
        $related_objs = [];
        foreach ( $values as $key => $value ) {
            if ( isset( $file_names[ $key ] ) && $value ) {
                $base64 = explode( ',', $value );
                $mime_type = explode( ':', explode( ';', $base64[0] )[0] )[1];
                $file_name = $file_names[ $key ];
                $parts = explode( '.', $file_name );
                $extIndex = count( $parts ) - 1;
                $extension = strtolower( @$parts[ $extIndex ] );
                unset( $base64[0] );
                $data = '';
                foreach ( $base64 as $d ) {
                    $data .= $d;
                }
                $data = base64_decode( $data );
                $member->$key( $data );
                $basename = tempnam( $upload_dir, '' );
                unlink( $basename );
                $file_name = $file_names[ $key ];
                $out = $basename . DS . $file_name;
                $fmgr->put( $out, $data );
                $files[ $key ] = $out;
            } else {
                if ( count( $relations ) && isset( $relations[ $key ] ) ) {
                    $related_objs[ $key ] = $value;
                } else {
                    $member->$key( $value );
                }
            }
        }
        $app->init_callbacks( 'member', 'save' );
        $app->set_default( $member );
        // default_status
        $status = (int) $component->get_config_value( 'members_sign_up_status', $workspace_id, true );
        $member->status( $status );
        if ( $status == 2 ) {
            $member->notification( 1 );
        }
        $member->reg_workspace_id( $workspace_id );
        $errors = [];
        $callback = ['name' => 'pre_save', 'error' => '', 'is_new' => true,
                     'errors' => $errors ];
        $pre_save = $app->run_callbacks( $callback, 'member', $member, $member );
        $errors = $callback['errors'];
        if ( $msg = $callback['error'] ) {
            $errors[] = $msg;
        }
        if (!empty( $errors ) || !$pre_save ) {
            $error = join( "\n", $errors );
            return $app->error( $error );
        }
        if ( $member->save() ) {
            $sess->remove();
        } else {
            return $app->error( 'An error occurred while saving %s.', $app->translate( 'Member' ) );
        }
        foreach ( $files as $col => $path ) {
            PTUtil::file_attach_to_obj( $app, $member, $col, $path );
        }
        if (!empty( $related_objs ) ) {
            // set relations
            foreach ( $related_objs as $col => $ids ) {
                $rel_model = $relations[ $col ];
                $rerated_objs = is_array( $ids )
                              ? $db->model( $rel_model )->load( ['id' => ['IN' => $ids ] ] )
                              : $db->model( $rel_model )->load( (int) $ids );
                $to_ids = [];
                if ( is_array( $rerated_objs ) && count( $rerated_objs ) ) {
                    foreach ( $rerated_objs as $rerated_obj ) {
                        $to_ids[] = (int) $rerated_obj->id;
                    }
                } else if ( is_object( $rerated_objs ) ) {
                    $to_ids[] = (int) $rerated_objs->id;
                }
                $args = ['from_id' => $member->id, 
                         'name' => $col,
                         'from_obj' => 'member',
                         'to_obj' => $rel_model ];
                $errors = [];
                $app->set_relations( $args, $to_ids, false, $errors );
                if (!empty( $errors ) ) {
                    return $app->rollback( join( ',', $errors ) );
                }
            }
        }
        $appname = $workspace ? $workspace->name : $app->appname;
        $message = $component->translate( "A new member '%s' registered on '%s'.",
            [ $member->name, $appname ] );
        $log = $app->log( ['message' => $message, 'category' => 'sign_up',
                           'model' => 'member', 'object_id' => $member->id,
                           'level' => 'info'] );
        $existing = $app->db->model( 'member' )->count( ['name' => ['BINARY' => $member->name ],
                                                         'email' => ['BINARY' => $member->email ],
                                                         'id' => ['!=' => $member->id ] ] );
        if ( $existing ) {
            return $app->error( 'An error occurred while saving %s.', $app->translate( 'Member' ) );
        }
        $db->commit();
        $app->txn_active = false;
        // $ctx->stash( 'member', $member );
        if ( $language = $member->language ) {
            if ( $ctx->language !== $language && in_array( $language, $app->languages ) ) {
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
            } else {
                $language = null;
            }
        }
        $app->ctx = $ctx;
        $callback = ['name' => 'post_save', 'is_new' => true, 'log' => $log ];
        $app->run_callbacks( $callback, 'member', $member, $member );
        $app->publish_obj( $member );
        $mailto = $component->get_config_value(
            'members_sign_up_notify_mailto', $workspace_id, true );
        if ( $mailto ) {
            // send mail to administer
            $app->set_mail_param( $ctx );
            $subject = null;
            $body = null;
            $template = null;
            $body = $app->get_mail_tmpl( 'members_sign_up_notification', $template, $workspace );
            if ( $template ) {
                $subject = $template->subject;
            }
            if (! $subject ) {
                $subject = $app->translate( "A new member '%s' registered on '%s'",
                    [ $member->name, $ctx->vars['app_name'] ] );
            }
            $mail_from = $component->mail_from( $app, $workspace_id );
            $error = '';
            $admin_url = $app->admin_url;
            $ctx->vars['admin_url'] = $admin_url;
            $ctx->vars['member_id'] = $member->id;
            $ctx->vars['member_name'] = $member->nickname;
            $ctx->vars['member_email'] = $member->email;
            $ctx->vars['member_nickname'] = $member->nickname;
            $body = $app->build( $body );
            $subject = $app->build( $subject );
            $mail_from = $app->build( $mail_from );
            $mailto = $app->build( $mailto );
            $headers = ['From' => $mail_from ];
            $error = '';
            if (! PTUtil::send_mail(
                $mailto, $subject, $body, $headers, $error ) ) {
                $ctx->vars['error'] = $error;
                return $app->error( $error );
            }
        }
        $return_url = $app->script_uri . '?__mode=do_signup&signup=1';
        if ( $app->default_language != $app->language ) $return_url .= '&language=' . $app->language;
        $return_url .= $workspace_id ? '&workspace_id=' . $workspace_id : '';
        $app->redirect( $return_url );
    }

    function sign_up () {
        $app = $this;
        $cms_validations = $app->registry['cms_validations'] ?? [];
        $ctx = $app->ctx;
        $component = $this->component( 'members' );
        $workspace_id = $app->workspace_id;
        $workspace = $ctx->stash( 'workspace' );
        $table = $app->get_table( 'member' );
        $columns = $app->db->model( 'column' )->load( ['table_id' => $table->id ],
                                            ['sort' => 'order', 'direction' => 'ascend'] );
        $excludes = $app->excludes;
        $errors = [];
        if ( $app->members_require_agreement && $app->request_method === 'POST' ) {
            $agreement = $app->param( '__agree' );
            if (! $agreement ) {
                $errors[] = $app->translate( 'Please agree to the Terms & Conditions and Privacy Policy.' );
            }
        }
        $messages = [];
        $values = [];
        $file_names = [];
        $passwords = [];
        $_type = $app->param( '_type' );
        $obj = $app->db->model( 'member' )->new();
        if ( $app->request_method == 'POST' && $app->param( 'language' ) ) {
            $app->language = $app->param( 'language' );
            $ctx->language = $app->param( 'language' );
        }
        $email = null;
        $sess = null;
        $normalize =
            $component->get_config_value( 'members_sign_up_normalize', $workspace_id, true );
        $tmp_files = [];
        $token = $app->param( 'magic_token' );
        if ( $_type == 'sign_up' ) {
            // token for CSRF
            if (! $token ) {
                return $app->error( 'Invalid request.' );
            }
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token, 'kind' => 'CR'] );
            if ( !$sess->id ) {
                return $app->error( 'Invalid request.' );
            }
            if ( $sess->expires < $_SERVER['REQUEST_TIME'] ) {
                return $app->error( 'Your session has expired. Please register again.' );
            }
            if ( $app->validate_token_ip ) {
                if ( $sess->key != $app->remote_ip ) {
                    return $app->error( 'Invalid request.' );
                }
            }
            if ( $app->validate_token_ua ) {
                $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
                if ( $sess->data != $user_agent ) {
                    return $app->error( 'Invalid request.' );
                }
            }
            if ( $sess->text ) {
                $tmp_files = json_decode( $sess->text, true );
            }
        } else if ( $token ) {
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token, 'kind' => 'CR'] );
            if ( !$sess->id || $sess->expires < $_SERVER['REQUEST_TIME'] ) {
            } else {
                if ( $sess->text ) {
                    $tmp_files = json_decode( $sess->text, true );
                }
            }
        }
        $fmgr = $app->fmgr;
        $non_editable = $app->non_editable;
        foreach ( $columns as $column ) {
            if ( in_array( $column->name, $excludes ) ) {
                continue;
            } else if (! empty( $non_editable ) && in_array( $column->name, $non_editable ) ) {
                continue;
            }
            if ( $column->unique ) {
                if (! $app->validate_unique( $column, null, $errors ) ) {
                    continue;
                }
            }
            if ( $column->type == 'string' ) {
                $data = $app->param( $column->name );
                $size = mb_strlen( $data );
                $max_size = (int) $column->size;
                $max_length = (int) $column->maxlength;
                if ( $max_length && $max_length < $size ) {
                    $errors[] = $component->translate( '%s must be %s characters or less.', [ $app->translate( $column->label ), $max_length ] );
                } else if ( $max_size && $max_size < $size ) {
                    $errors[] = $component->translate( '%s must be %s characters or less.', [ $app->translate( $column->label ), $max_size ] );
                }
            }
            if ( $column->validation_type && $app->param( $column->name ) && isset( $cms_validations[ $column->validation_type ] ) ) {
                $v = $cms_validations[ $column->validation_type ];
                $vComponent = $app->component( $v['component'] );
                if ( is_object( $vComponent ) ) {
                    $vMeth = $v['method'];
                    if ( method_exists( $vComponent, $vMeth ) ) {
                        $cValue = $app->param( $column->name );
                        $vErr = '';
                        $res = $vComponent->$vMeth( $app->translate( $column->label ), $cValue, $vErr, $column );
                        if (! $res ) {
                            $errors[] = $vErr;
                            continue;
                        }
                    }
                }
            }
            if ( $column->edit == 'file' && $column->type == 'blob' ) {
                $base64 = $app->param( $column->name . '_base64' );
                if ( $base64 && !empty( $tmp_files ) && isset( $tmp_files[ $column->name ] ) ) {
                    $tmp = $tmp_files[ $column->name ];
                    $filename = $app->param( $column->name );
                    if ( $tmp['filename'] === $filename && $tmp['data'] === md5( $base64 ) ) {
                        $ctx->vars[ $column->name . '_base64'] = $base64;
                        $values[ $column->name ] = $base64;
                    } else {
                        $errors[] = $component->translate( "The file attached to '%s' is invalid.", $app->translate( $column->label ) );
                    }
                }
                if ( $_type == 'confirm' ) {
                    $data = $app->base64_encode_file( $column, $errors, $messages );
                    if ( $data ) {
                        $values[ $column->name ] = $data;
                        $ctx->vars[ $column->name . '_base64'] = $data;
                        $_REQUEST[ $column->name ] = $_FILES[ $column->name ]['name'];
                    }
                    $file_names[ $column->name ] = $data;
                } else {
                    $data = $app->param( $column->name );
                    if ( $column->not_null && ! $data ) {
                        $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                        continue;
                    } else {
                        $file_names[ $column->name ] = $data;
                    }
                }
            } else if ( $column->edit == 'password(hash)' ) {
                $pass = $app->param( $column->name );
                if ( $column->not_null && ! $pass ) {
                    $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                    continue;
                }
                $verify = $app->param( $column->name . '-verify' );
                if ( $_type === 'sign_up' && !$verify && !isset( $_POST[ $column->name . '-verify' ] ) ) {
                    $verify = $pass;
                }
                $msg = '';
                if (!$app->is_valid_password( $pass, $verify, $msg ) ) {
                    $errors[] = $msg;
                    continue;
                }
                $values[ $column->name ] = $pass;
                $passwords[] = $column->name;
            } else if ( $column->name == 'email' ) {
                $data = $app->param( $column->name );
                if ( $normalize ) {
                    $data = PTUtil::normalize( $data );
                    $_REQUEST[ $column->name ] = $data;
                }
                $msg = '';
                if (!$app->is_valid_email( $data, $msg ) ) {
                    $errors[] = $msg;
                } else {
                    $email = $data;
                    $values[ $column->name ] = $data;
                }
            } else if ( $column->edit == 'datetime' || $column->edit == 'date' ) {
                $value = $app->validate_date( $column, null, $errors );
                if ( $value ) {
                    $values[ $column->name ] = $value;
                }
            } else if ( $column->edit == 'selection' && $column->disp_edit == 'checkbox' ) {
                $data = $app->param( $column->name );
                if ( is_array( $data ) ) {
                    if ( empty( $data ) && $column->not_null ) {
                        $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                        continue;
                    }
                    $data = implode( ',', $data );
                    if ( $normalize ) {
                        $data = PTUtil::normalize( $data );
                        $_REQUEST[ $column->name ] = $data;
                    }
                }
                $values[ $column->name ] = $data;
            } else if ( $column->type == 'relation' && strpos( $column->edit, 'relation:' ) === 0 ) {
                $data = $app->param( $column->name );
                list( $edit, $rel_model, $rel_col, $rel_type ) = explode( ':', $column->edit );
                if ( $rel_type == 'checkbox' || $rel_type == 'hierarchy' || $rel_type == 'dialog' ) {
                    if (! $data || ( is_array( $data ) && empty( $data ) ) ) {
                        if ( $column->not_null ) {
                            $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                        }
                        continue;
                    }
                }
                if ( is_string( $data ) && $normalize ) {
                    $data = PTUtil::normalize( $data );
                    $_REQUEST[ $column->name ] = $data;
                }
                if ( is_string( $data ) && $column->not_null && ! $data ) {
                    $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                    continue;
                } else if ( is_array( $data ) && $column->not_null && empty( $data ) ) {
                    $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                    continue;
                }
                $values[ $column->name ] = $data;
            } else {
                $data = $app->param( $column->name );
                if ( is_string( $data ) && $normalize ) {
                    $data = PTUtil::normalize( $data );
                    $_REQUEST[ $column->name ] = $data;
                }
                if ( is_string( $data ) && $column->not_null && ! $data ) {
                    $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                    continue;
                } else if ( is_array( $data ) && $column->not_null && empty( $data ) ) {
                    $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
                    continue;
                }
                $values[ $column->name ] = $data;
            }
        }
        if (!isset( $values['language'] ) || !$values['language'] ) {
            $values['language'] = $app->language;
        }
        $member = $app->db->model( 'member' )->__new( $values );
        $app->init_callbacks( 'member', 'save' );
        $callback = ['name' => 'save_filter', 'error' => '', 'errors' => $errors, 'is_new' => true, 'values' => $values ];
        $save_filter = $app->run_callbacks( $callback, 'member', $member, $member );
        $errors = $callback['errors'];
        if ( $msg = $callback['error'] ) {
            $errors[] = $msg;
        }
        if (! $save_filter && empty( $errors ) ) {
            $errors[] = $app->translate( 'An error occurred while saving %s.', $app->translate( 'Member' ) );
        }
        $values = $callback['values'];
        $ctx->vars['messages'] = $messages;
        if ( $_type == 'confirm' ) { 
            $magic = $app->param( 'magic_token' ) ? $app->param( 'magic_token' ) : $app->magic();
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => $magic,
                                                               'kind' => 'CR'] );
            $sess->start( $_SERVER['REQUEST_TIME'] );
            $expires =
                $component->get_config_value( 'members_sign_up_timeout', $workspace_id, true );
            $sess->expires( $_SERVER['REQUEST_TIME'] + $expires );
            if (! empty( $file_names ) ) { 
                $data = $sess->text ? json_decode( $sess->text, true ) : [];
                foreach ( $file_names as $column => $base64 ) {
                    if (! $base64 ) continue;
                    $data[ $column ] = [ 'filename' => $app->param( $column ), 'data' => md5( $base64 ) ];
                }
                if (!empty( $data ) ) {
                    $sess->text( json_encode( $data ) );
                }
            }
            if ( $app->validate_token_ip ) {
                $sess->key( $app->remote_ip );
            }
            if ( $app->validate_token_ua ) {
                $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
                $sess->data( $user_agent );
            }
            $sess->workspace_id( $workspace_id );
            $res = $sess->save();
            $ctx->vars['magic_token'] = $magic;
            $ctx->local_vars['magic_token'] = $magic;
        }
        if ( empty( $errors ) ) {
            if ( $_type !== 'confirm' ) {
                if ( $sess ) $sess->remove();
            }
            if ( $_type ) $ctx->vars['confirm_ok'] = 1;
        } else {
            $ctx->vars['errors'] = $errors;
        }
        if ( empty( $errors ) && $_type == 'sign_up' ) {
            if (! empty( $passwords ) ) {
                foreach ( $values as $key => $value ) {
                    if ( in_array( $key, $passwords ) ) {
                        $values[ $key ] = password_hash( $value, PASSWORD_BCRYPT );
                    }
                }
            }
            $column_values = ['values' => $values, 'file_names' => $file_names ];
            $magic = $app->magic();
            $sess = $app->db->model( 'session' )->get_by_key(
                ['name' => $magic, 'kind' => 'TM'] );
            $sess->data( json_encode( $column_values ) );
            $sess->workspace_id( $workspace_id );
            $app->set_mail_param( $ctx );
            $subject = null;
            $body = null;
            $template = null;
            $body = $app->get_mail_tmpl( 'members_sign_up_confirm', $template, $workspace );
            if ( $template ) {
                $subject = $template->subject;
            }
            if (! $subject ) {
                $subject = $app->translate( "Your account confirmation on '%s'.", $ctx->vars['app_name'] );
            }
            $expires =
                $component->get_config_value( 'members_sign_up_expires', $workspace_id, true );
            $sess->expires( $_SERVER['REQUEST_TIME'] + $expires );
            $sess->start( $_SERVER['REQUEST_TIME'] );
            $sess->save();
            $ctx->vars['token'] = $sess->name;
            $body = $app->build( $body );
            $subject = $app->build( $subject );
            $mail_from = $component->mail_from( $app, $workspace_id );
            $mail_from = $app->build( $mail_from );
            $headers = ['From' => $mail_from ];
            $error = '';
            if (! PTUtil::send_mail(
                $email, $subject, $body, $headers, $error ) ) {
                $ctx->vars['error'] = $error;
                return $app->error( $error );
            }
            $return_url = $app->script_uri . '?__mode=sign_up&submit=1';
            $return_url .= $workspace_id ? '&workspace_id=' . $workspace_id : '';
            if ( $app->default_language != $app->language ) {
                $return_url .= '&language=' . $app->language;
            }
            $app->redirect( $return_url );
        }
        return $this->__mode( 'sign_up' );
    }

    function __mode ( $mode, $t = null ) {
        $tmpl = is_object( $t ) ? $t : $this->get_template_from_db( $mode, $this->workspace_id );
        return parent::__mode( $mode, $tmpl );
    }

    function get_template_from_db ( $mode, $workspace_id = null, $component = null ) {
        $component = $component ? $component : $this->component( 'members' );
        $workspace_id = $workspace_id !== null ? $workspace_id : $this->workspace_id;
        $status_published = $this->status_published( 'template' );
        $workspace_ids = $workspace_id ? [0, $workspace_id ] : [ $workspace_id ];
        $ctx = $this->ctx;
        $tmpl = $this->db->model( 'template' )->load(
                      ['basename' => 'member_' . $mode,
                       'workspace_id' => ['IN' => $workspace_ids ],
                       'rev_type' => 0,
                       'class' => 'Member',
                       'status' => $status_published ],
                       ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1] );
        $tmpl = ( is_array( $tmpl ) && !empty( $tmpl ) ) ? $tmpl[0] : null;
        if (! $tmpl ) {
            $tmpl_path = $this->ctx->get_template_path( 'member_' . $mode . '.tmpl' );
            $tmpl_path = $tmpl_path ? $tmpl_path : $component->path() . DS . 'tmpl' . DS . 'member_' . $mode . '.tmpl';
            if ( file_exists( $tmpl_path ) ) {
                $mtml = file_get_contents( $tmpl_path );
                $tmpl = $this->db->model( 'template' )->new( ['text' => $mtml ] );
            }
        } else {
            $ctx->vars['publish_type'] = 6;
        }
        $ctx->vars['mamber_id'] = isset( $ctx->vars['user_id'] ) ? $ctx->vars['user_id'] : null;
        if ( $mode === 'sign_up' ) {
            $terms_and_privacy = $component->get_config_value( 'members_terms_and_privacy', $workspace_id );
            $ctx->vars['terms_and_privacy'] = $terms_and_privacy;
        }
        $ctx->vars['user_id'] = null;
        $this->ctx = $ctx;
        return $tmpl;
    }

    function base64_encode_file ( $column, &$errors, &$messages ) {
        $app = $this;
        $ctx = $app->ctx;
        if ( isset( $_FILES[ $column->name ] )
            && ( is_uploaded_file( $_FILES[ $column->name ]['tmp_name'] ) || defined( 'NOT_VERIFY_THE_IMAGE' ) ) ) {
            $parts = explode( '.', $_FILES[ $column->name ]['name'] );
            $extIndex = count( $parts ) - 1;
            $extension = strtolower( @$parts[ $extIndex ] );
            $denied_exts = $app->denied_exts;
            $denied_exts = preg_split( '/\s*,\s*/', $denied_exts );
            $upload_dir = $app->upload_dir();
            $file_name = $upload_dir . DS . $_FILES[ $column->name ]['name'];
            if ( defined('NOT_VERIFY_THE_IMAGE') ) {
                rename( $_FILES[ $column->name ]['tmp_name'], $file_name );
            } else {
                move_uploaded_file( $_FILES[ $column->name ]['tmp_name'], $file_name );
            }
            $mime_type = $_FILES[ $column->name ]['type'];
            $extra = ( $column->extra &&is_string( $column->extra ) ) ? $column->extra : '';
            list( $sizelimit, $pixel, $extra, $type ) = array_pad( explode( ':', $extra ), 4, null );
            if ( $type == 'image' ) {
                if (! in_array( $extension, $app->images ) ) {
                    $errors[] = $app->translate( 'Invalid image file format.' );
                    return false;
                }
                if ( function_exists( 'exif_imagetype' ) ) {
                    if (! PTUtil::image_types( $mime_type, exif_imagetype( $file_name ) ) ) {
                        $errors[] = $app->translate( 'The image format are Invalid. Please confirm the file.' );
                        return false;
                    }
                }
            }
            if ( in_array( $extension, $denied_exts ) ) {
                $errors[] = $app->translate( "Invalid File extension'%s'.", $extension );
                return false;
            }
            $error = '';
            $res = PTUtil::upload_check( $column->extra, $file_name, false, $error );
            if ( $error ) {
                $errors[] = $error;
                return false;
            }
            if ( $res == 'resized' )
                $messages[] =
                    $app->translate(
                      "It has been reduced as it exceeds the maximum size of the image file '%s'.",
                      basename( $file_name ) );
            $data = file_get_contents( $file_name );
            $data = base64_encode( $data );
            $data = "data:{$mime_type};base64,{$data}";
            return $data;
        } else {
            if ( $column->not_null ) {
                $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
            }
        }
        return false;
    }

    function validate_date ( $column, $member = null, &$errors = [] ) {
        $app = $this;
        $data = $app->param( $column->name );
        if ( $column->not_null && ! $data ) {
            $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
            return false;
        }
        $component = $app->component( 'Members' );
        $workspace_id = $app->workspace_id;
        $normalize =
            $component->get_config_value( 'members_sign_up_normalize', $workspace_id, true );
        if ( $data ) {
            if ( $normalize ) {
                $data = PTUtil::normalize( $data );
                $_REQUEST[ $column->name ] = $data;
            }
            if ( preg_match( '!^([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})$!', $data, $matches ) ) {
                list( $y, $m, $d ) = [ $matches[1], $matches[2], $matches[3] ];
                $data = sprintf('%04d-%02d-%02d', $y, $m, $d );
            }
            if ( strpos( $data, '-' ) === false ) {
                list( $Y, $m, $d ) =
                  [ substr( $data, 0, 4 ), substr( $data, 4, 2 ), substr( $data, 6, 2 ) ];
                $data = "{$Y}-{$m}-{$d}";
            }
            list( $Y, $m, $d ) = explode( '-', $data );
            if ( checkdate( (int) $m, (int) $d, (int) $Y ) !== true ) {
                $errors[] = $app->translate( '%s is invalid date.',
                            $app->translate( $column->label ) );
                return false;
            }
            $_REQUEST[ $column->name ] = $data;
            $time = $column->edit == 'date' ? '0000'
                  : $app->param( $column->name . '_time' );
            if ( $normalize ) {
                $time = PTUtil::normalize( $time );
                $_REQUEST[ $column->name . '_time' ] = $time;
            }
            $time = preg_replace( '/[^0-9]/', '', $time );
            if ( strlen( $time ) == 4 ) {
                $time .= '00';
            }
            if ( $time >= 0 && $time < 240000 ) {
                $t = substr( $time, 0, 2 ) . ':' . substr( $time, 4, 2 );
                $_REQUEST[ $column->name . '_time' ] = $t;
            } else {
                $errors[] = $app->translate( '%s is invalid date.', $app->translate( $column->label ) );
                return false;
            }
            $member = $member ? $member : $app->db->model('member')->new();
            $ts = $member->db2ts( $data . $time );
            $value = $member->ts2db( $ts );
            return $value;
        } else if ( $column->not_null ) {
            $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
            return false;
        }
    }

    function validate_unique ( $column, $member = null, &$errors = [] ) {
        $app = $this;
        $ctx = $app->ctx;
        $data = $app->param( $column->name );
        if (! $data && $column->not_null ) {
            $errors[] = $app->translate( '%s is required.', $app->translate( $column->label ) );
            return false;
        }
        $component = $app->component( 'Members' );
        $workspace_id = $app->workspace_id;
        $normalize =
            $component->get_config_value( 'members_sign_up_normalize', $workspace_id, true );
        if ( $normalize ) {
            $data = PTUtil::normalize( $data );
            $_REQUEST[ $column->name ] = $data;
        }
        $terms = [ $column->name => ['BINARY' => $data ] ];
        if ( $member ) $terms['id'] = ['!=' => $member->id ];
        $existings = $app->db->model( 'member' )->count( $terms );
        if ( $existings ) {
            $errors[] = $app->translate(
                "A %1\$s with the same %2\$s '%3\$s' already exists.",
                [ $app->translate( 'Member' ),
                  $app->translate( $column->label ),
                  $app->translate( $data ) ] );
            return false;
        }
        // Check session.
        $sessions = $app->db->model( 'session' )->load(
            ['kind' => 'TM', 'expires' => ['>' => $_SERVER['REQUEST_TIME']] ] );
        foreach ( $sessions as $sess ) {
            $values = json_decode( $sess->data, true );
            if (! isset( $values['values'] ) ) continue;
            if ( isset( $values[ $column->name ] ) ) {
                if ( $values[ $column->name ] == $data ) {
                    $errors[] = $app->translate(
                        "A %1\$s with the same %2\$s '%3\$s' already exists.",
                        [ $app->translate( 'Member' ),
                          $app->translate( $column->label ),
                          $app->translate( $data ) ] );
                    return false;
                }
            }
        }
        return true;
    }

    function redirect ( $url, $ignore_user_abort = false ) {
        $this->language = 'ja';
        if ( $this->default_language != $this->language ) {
            $redirect = $url;
            if ( strpos( $redirect, '?' ) !== false ) {
                list( $base, $redirect ) = explode( '?', $redirect );
                $arr = [];
                $query = parse_str( $redirect, $arr );
                if (! isset( $arr['language'] ) || $arr['language'] != $this->language ) {
                } else {
                    $arr['language'] = $this->language;
                    $query = http_build_query( $arr );
                    $url = $query ? $base . '?' . $query : '';
                }
            } else {
                $url .= '?language=' . $this->language;
            }
        }
        return parent::redirect( $url, $ignore_user_abort );
    }

    function get_return_url () {
        $app = $this;
        $ctx = $app->ctx;
        $workspace_id = $app->workspace_id;
        $workspace = $ctx->stash( 'workspace' );
        $return_url = $this->param( 'return_url' ) ? $this->param( 'return_url' ) : null;
        if (! $return_url ) {
            $return_args = $this->param( 'return_args' );
            if ( strpos( $return_args, 'logout' ) !== false ) {
                $return_args = str_replace( '__mode=logout', '', $return_args );
            }
            if ( $return_args ) {
                $return_url = $app->script_uri . '?' . $return_args;
            }
            if (! $return_url ) {
                $return_url = $workspace ? $workspace->site_url : $app->site_url;
            }
        }
        if ( $return_url && stripos( $return_url, 'http' ) === 0 ) {
            $return_url = preg_replace( '!^https{0,1}://[^/]*!i', '', $return_url );
        } else if ( strpos( $return_url, '/' ) === 0 ) {
            $return_url = preg_replace( '!^/\s*/!u', '/', $return_url ); // sanitize "^//" and "^/\s+/" .
        }
        if (! $return_url ) $return_url = '/';
        return $return_url;
    }
}