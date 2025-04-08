<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class HTTPAuth extends PTPlugin {

    private $cfg_changed = false;

    function __construct () {
        parent::__construct();
    }

    function pre_save_plugin_config ( $cb, $app, $component, &$errors ) {
        if ( $component->id != 'httpauth' ) {
            return true;
        }
        if ( $app->param( 'reset_config' ) ) {
            return true;
        }
        $auth_cms = $app->param( 'setting_httpauth_auth_cms' );
        if (! $auth_cms ) {
            return true;
        }
        $column = $app->param( 'setting_httpauth_column' );
        $type = $app->param( 'setting_httpauth_type' );
        $login_id = $app->param( 'setting_httpauth_loginid' );
        if ( $column === '_unique' ) {
            if (! $login_id ) {
                $errors[] = $this->translate( 'Login ID is required.' );
            }
            if ( $type != 2 ) {
                $errors[] = $this->translate( 'Unique Common ID is selected, but Unique Common Password is not selected.' );
            }
        }
        $password = $app->param( 'setting_httpauth_password' );
        $password_verify = $app->param( 'setting_httpauth_password-verify' );
        if ( $type == 2 && !$password ) {
            $errors[] = $this->translate( 'Password is required.' );
        } else if ( $type == 2 ) {
            $msg = null;
            if (! $app->is_valid_password( $password, $password_verify, $msg ) ) {
                $errors[] = $msg;
            }
        }
        if (!empty( $errors ) ) {
            return false;
        }
        $column_old = $this->get_config_value( 'httpauth_column' );
        $type_old = $this->get_config_value( 'httpauth_type' );
        $login_id_old =  $this->get_config_value( 'httpauth_loginid' );
        $password_old =  $this->get_config_value( 'httpauth_password' );
        $pw_column = $app->param( 'setting_httpauth_pw_column' );
        $pw_column_old =  $this->get_config_value( 'httpauth_pw_column' );
        if ( $column !== $column_old || $type !== $type_old ) {
            $this->cfg_changed = true;
        } else if ( $column === '_unique' && $login_id !== $login_id_old ) {
            $this->cfg_changed = true;
        } else if ( $type == 2 && $password !== $password_old ) {
            $this->cfg_changed = true;
        } else if ( $pw_column !== $pw_column_old ) {
            $this->cfg_changed = true;
        }
        return true;
    }

    function post_save_plugin_config ( $cb, $app, $component ) {
        if ( $component->id != 'httpauth' ) {
            return true;
        }
        if ( $this->cfg_changed && $app->httpauth_admin_always ) {
            $tmpl = $this->path() . DS . 'tmpl' . DS . 'cfg_changed.tmpl';
            $tmpl = $app->fmgr->get( $tmpl );
            echo $app->build( $tmpl );
            exit();
        }
        return true;
    }

    function http_auth_changed ( $app ) {
        $app->ctx->vars['page_title'] = $app->translate( 'Your changes have been saved.' );
        $app->ctx->vars['error'] = $this->translate( 'HTTP Authentication Settings has been changed. Please close your browser and Login again.' );
        echo $app->build_page( 'http_auth_error.tmpl' );
    }

    function http_auth_htpasswd ( $app ) {
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        if ( $magic_token != $app->current_magic ) {
            $app->json_error( 'Invalid request.' );
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        if ( $app->param( '_type' ) && $app->param( '_type' ) === 'reset' ) {
            $workspace_id = (int) $app->param( 'workspace_id' );
            $start = preg_quote( '# Generate from HTTPAuth plugin.', '/' );
            $end = preg_quote( '# /Generate from HTTPAuth plugin.', '/' );
            $site_path = $workspace_id ? $app->workspace()->site_path : $app->site_path;
            $auth_filename = '.htaccess';
            $htaccess = $site_path . DS . $auth_filename;
            $urlmapping = $app->db->model( 'urlmapping' )->get_by_key( ['mapping' => $auth_filename, 'workspace_id' => $workspace_id ] );
            $changed = false;
            if ( $urlmapping->id ) {
                $template = $urlmapping->template;
                if (! $template ) {
                    $app->json_error( $this->translate( "The view '%s' was not found.", $auth_filename ) );
                }
                $rev_note = '';
                $content = $template->text;
                if ( preg_match( "/{$start}/", $content ) && preg_match( "/{$end}/", $content ) ) {
                    $rev_note = $this->translate( 'Authentication information removed by HTTPAuth plugin.' );
                    $content = preg_replace( "/{$start}.*?{$end}/s", '', $content );
                }
                if ( $template->text !== $content ) {
                    $changed = true;
                    $original = clone $template;
                    $original->id( null );
                    $template->text( $content );
                    $template->rev_note( $rev_note );
                    $app->set_default( $template );
                    $template->save();
                    PTUtil::pack_revision( $template, $original );
                    $app->publish_obj( $template );
                }
            }
            if (! $changed && $app->fmgr->exists( $htaccess ) ) {
                $content = $app->fmgr->get( $htaccess );
                if ( preg_match( "/{$start}/", $content ) && preg_match( "/{$end}/", $content ) ) {
                    $content = preg_replace( "/{$start}.*?{$end}/s", '', $content );
                    $app->fmgr->put( $htaccess, $content );
                }
            }
            if ( $changed ) {
                $message = $this->translate( 'Authentication information was deleted because reset the HTTPAuth plugin settings by user %s.', $app->user()->nickname );
                $this->log( $message );
            }
            header( 'Content-type: application/json' );
            echo json_encode( ['status' => 200, 'message' => $this->translate( 'Authentication information was deleted.' ) ] );
            exit();
        }
        $authtype = $json['authtype'];
        $authname = $json['authname'];
        $username = $json['username'];
        $password = $json['password'];
        $verify = $json['verify'];
        $authname = str_replace( '"', '', $authname );
        if ( !$authname || !$username || !$password || !$verify ) {
            $app->json_error( $this->translate( 'Please enter all fields.' ) );
        }
        if ( preg_match( "/[\r\n]/", "{$authname}{$username}{$password}" ) ) {
            $app->json_error( 'Invalid request.' );
        }
        $error = $this->translate( "';', '#' and ' '(space) cannot be used in the Username." );
        if ( strpos( $username, ':' ) !== false ) {
            $app->json_error( $error );
        } else if ( strpos( $username, '#' ) !== false ) {
            $app->json_error( $error );
        } else if ( strpos( $username, ' ' ) !== false ) {
            $app->json_error( $error );
        }
        if ( strlen( $username ) !== mb_strlen( $username ) ) {
            $app->json_error( $this->translate( 'Username cannot contain multi-byte characters.' ) );
        }
        $msg = null;
        if (! $app->is_valid_password( $password, $verify, $msg ) ) {
            $app->json_error( $msg );
        }
        $username_password = null;
        $auth_filename = '.htpasswd';
        if ( $authtype == 'Digest' ) {
            $auth_filename = '.htdigest';
            $hash = md5( "{$username}:{$authname}:{$password}" );
            $username_password = "{$username}:{$authname}:{$hash}";
        } else {
            $cmd_path = $app->httpauth_htpasswd_path;
            if (! $cmd_path ) {
                $test = 'which htpasswd';
                $res = exec( $test, $output );
                if ( $res !== false ) {
                    $cmd_path = array_shift( $output );
                    if (! $cmd_path && file_exists( '/usr/bin/htpasswd' ) ) {
                        $cmd_path = '/usr/bin/htpasswd';
                    } else if (! $cmd_path && file_exists( '/usr/sbin/htpasswd' ) ) {
                        $cmd_path = '/usr/sbin/htpasswd';
                    }
                    if (! $cmd_path ) {
                        $app->json_error( $this->translate( 'An error occues while Generating %s and .htaccess.', $auth_filename ) );
                    }
                    $cmd_path = escapeshellcmd( $cmd_path );
                }
            }
            if (! $cmd_path ) {
                $app->json_error( $this->translate( 'An error occues while Generating %s and .htaccess.', $auth_filename ) );
            }
            if ( $cmd_path ) {
                $_username = escapeshellarg( $username );
                $_password = escapeshellarg( $password );
                $cmd = "{$cmd_path} -b -n {$_username} {$_password}";
                $res = exec( $cmd, $output );
                if ( $res !== false ) {
                    $username_password = array_shift( $output );
                } else {
                    $app->json_error( $this->translate( 'An error occues while Generating %s and .htaccess.', $auth_filename ) );
                    // $password = password_hash( $password, PASSWORD_BCRYPT );
                    // $username_password = "{$username}:{$password}";
                }
            }
        }
        $start = preg_quote( '# Generate from HTTPAuth plugin.', '/' );
        $end = preg_quote( '# /Generate from HTTPAuth plugin.', '/' );
        $site_path = $workspace_id ? $app->workspace()->site_path : $app->site_path;
        $htpasswd = $site_path . DS . $auth_filename;
        $tmpl = $this->path() . DS . 'tmpl' . DS . 'htpasswd.tmpl';
        $tmpl = $app->fmgr->get( $tmpl );
        $app->ctx->vars['username_password'] = $username_password;
        $app->ctx->vars['auth_type'] = $authtype;
        $app->ctx->vars['auth_filename'] = $auth_filename;
        $tmpl = $app->build( $tmpl );
        $urlmapping = $app->db->model( 'urlmapping' )->get_by_key( ['mapping' => $auth_filename, 'workspace_id' => $workspace_id ] );
        if ( $urlmapping->id ) {
            $template = $urlmapping->template;
            if (! $template ) {
                $app->json_error( $this->translate( "The view '%s' was not found.", $auth_filename ) );
            }
            $content = $template->text;
            if (! preg_match( "/{$start}/", $content ) && !preg_match( "/{$end}/", $content ) ) {
                $rev_note = $this->translate( 'Adding authentication information by HTTPAuth plugin.' );
                $content .= PHP_EOL . $tmpl;
            } else {
                $rev_note = $this->translate( 'Authentication information replacement by HTTPAuth plugin.' );
                $content = preg_replace( "/{$start}.*?{$end}/s", $tmpl, $content );
            }
            if ( $template->text !== $content ) {
                $original = clone $template;
                $original->id( null );
                $template->text( $content );
                $template->rev_note( $rev_note );
                $app->set_default( $template );
                $template->save();
                PTUtil::pack_revision( $template, $original );
                $app->publish_obj( $template );
            }
        } else {
            if ( $app->fmgr->exists( $htpasswd ) ) {
                $content = $app->fmgr->get( $htpasswd );
                if (! preg_match( "/{$start}/", $content ) && !preg_match( "/{$end}/", $content ) ) {
                    $content .= PHP_EOL . $tmpl;
                } else {
                    $content = preg_replace( "/{$start}.*?{$end}/s", $tmpl, $content );
                }
            } else {
                $content = $tmpl;
            }
            $app->fmgr->put( $htpasswd, $content );
        }
        $tmpl = $this->path() . DS . 'tmpl' . DS . 'htaccess.tmpl';
        $tmpl = $app->fmgr->get( $tmpl );
        $htaccess = $site_path . DS . '.htaccess';
        $app->ctx->vars['htpasswd_path'] = $htpasswd;
        $app->ctx->vars['htpasswd_authname'] = $authname;
        $tmpl = $app->build( $tmpl );
        $urlmapping = $app->db->model( 'urlmapping' )->get_by_key( ['mapping' => '.htaccess', 'workspace_id' => $workspace_id ] );
        $eol = PHP_EOL;
        $changed = false;
        if ( $urlmapping->id ) {
            $template = $urlmapping->template;
            if (! $template ) {
                $app->json_error( $this->translate( "The view '%s' was not found.", '.htaccess' ) );
            }
            $content = $template->text;
            if ( stripos( $content, '<Files ~ "^\.ht">' ) !== false ) {
                $tmpl = preg_replace( "/<Files.*?<\/Files>{$eol}/si", '', $tmpl );
            }
            if (! preg_match( "/{$start}/", $content ) && !preg_match( "/{$end}/", $content ) ) {
                $content = preg_replace( "/$eol$/s", '', $content );
                $rev_note = $this->translate( 'Adding authentication information by HTTPAuth plugin.' );
                $content .= PHP_EOL . $tmpl;
            } else {
                $rev_note = $this->translate( 'Authentication information replacement by HTTPAuth plugin.' );
                $content = preg_replace( "/{$start}.*?{$end}/s", $tmpl, $content );
            }
            if ( $template->text !== $content ) {
                $original = clone $template;
                $original->id( null );
                $template->text( $content );
                $template->rev_note( $rev_note );
                $app->set_default( $template );
                $template->save();
                PTUtil::pack_revision( $template, $original );
                $app->publish_obj( $template );
                $changed = true;
            }
        } else {
            if ( $app->fmgr->exists( $htaccess ) ) {
                $content = $app->fmgr->get( $htaccess );
                if ( stripos( $content, '<Files ~ "^\.ht">' ) !== false ) {
                    $tmpl = preg_replace( "/<Files.*?<\/Files>{$eol}/si", '', $tmpl );
                }
                if (! preg_match( "/{$start}/", $content ) && !preg_match( "/{$end}/", $content ) ) {
                    $content .= PHP_EOL . $tmpl;
                } else {
                    $content = preg_replace( "/{$start}.*?{$end}/s", $tmpl, $content );
                }
            } else {
                $content = $tmpl;
            }
            $app->fmgr->put( $htaccess, $content );
            $changed = true;
        }
        if ( $changed ) {
            $message = $this->translate( '%1$s and .htaccess are saved successfully by user %2$s.', [ $auth_filename, $app->user()->nickname ] );
            $this->log( $message );
        }
        $this->set_config_value( 'httpauth_htpasswd_authname', $authname, $workspace_id );
        $this->set_config_value( 'httpauth_auth_type', $authtype, $workspace_id );
        header( 'Content-type: application/json' );
        echo json_encode( ['status' => 200, 'message' => $this->translate( '%s and .htaccess are saved successfully.', $auth_filename ) ] );
    }

    function start_app ( $app ) {
        // Priority is 2, Run after AppProperties plugin.
        if ( $app->id !== 'Prototype' ) {
            return;
        } else if ( $app->mode === 'start_recover' || $app->mode === 'recover_password' || $app->mode === 'http_auth_changed' ) {
            return;
        }
        if ( $app->mode == 'manage_plugins' ) {
            if ( $app->request_method === 'GET' && $app->param( 'plugin_id' ) === 'httpauth' && $app->param( 'edit_settings' ) ) {
                $workspace_id = (int) $app->param( 'workspace_id' );
                if (!$app->workspace() ) {
                    $site_path = $app->site_path;
                    $pt_path = dirname( $app->pt_path );
                    $site_path = str_replace( '\\', '/', $site_path );
                    $pt_path = str_replace( '\\', '/', $pt_path );
                    if ( strpos( $pt_path, $site_path ) === 0 ) {
                        // HTTP Authentication cannot be set because the management screen path is under the Site Path.
                        $app->ctx->vars['admin_start_with_site_path'] = 1;
                    }
                }
                $has_settings = false;
                $urlmapping = $app->db->model( 'urlmapping' )->get_by_key( ['mapping' => '.htaccess', 'workspace_id' => $workspace_id ] );
                $start = preg_quote( '# Generate from HTTPAuth plugin.', '/' );
                $end = preg_quote( '# /Generate from HTTPAuth plugin.', '/' );
                $site_path = $workspace_id ? $app->workspace()->site_path : $app->site_path;
                if ( $urlmapping->id ) {
                    $template = $urlmapping->template;
                    if ( $template ) {
                        $content = $template->text;
                        if ( preg_match( "/{$start}/", $content ) && preg_match( "/{$end}/", $content ) ) {
                            $has_settings = true;
                        }
                    }
                }
                if (! $has_settings ) {
                    $htaccess = $site_path . DS . '.htaccess';
                    if ( $app->fmgr->exists( $htaccess ) ) {
                        $content = $app->fmgr->get( $htaccess );
                        if ( preg_match( "/{$start}/", $content ) && preg_match( "/{$end}/", $content ) ) {
                            $has_settings = true;
                        }
                    }
                }
                if ( $has_settings ) {
                    $app->ctx->vars['http_auth_has_settings'] = 1;
                }
            }
        }
        if ( $app->user() && !$app->httpauth_admin_always ) {
            unset( $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'], $_SERVER['PHP_AUTH_DIGEST'] );
            return;
        }
        $auth_cms = $this->get_config_value( 'httpauth_auth_cms' );
        if (! $auth_cms ) {
            return;
        }
        $error = false;
        $user = null;
        $username = null;
        $login_id = null;
        $password_verify = false;
        $password_col = null;
        $type = $this->get_config_value( 'httpauth_type' );
        $column = $this->get_config_value( 'httpauth_column' );
        if ( $type == 3 ) {
            $password_col = $this->get_config_value( 'httpauth_pw_column' );
            $table = $app->db->model( 'table' )->load( ['name' => 'user'], null, 'id' );
            $password_column = $app->db->model( 'column' )->get_by_key(
                ['table_id' => $table[0]->id, 'name' => $password_col ], null, 'edit' );
            if ( $password_column->edit === 'password(hash)' ) {
                $type = 1; // Auth Type Basic.
            } else {
                $type = 2; // Auth Type Digest.
            }
        }
        if ( $column === '_unique' ) {
            $type = 2; // Auth Type Digest.
            $login_id = $this->get_config_value( 'httpauth_loginid' );
            $column = 'name';
        } else if ( $column === '_specified' ) {
            $column = $this->get_config_value( 'httpauth_id_column' );
        }
        $banned_ip = $app->db->model( 'remote_ip' )->get_by_key( ['ip_address' => $app->remote_ip, 'class' => 'banned'], null, 'id' );
        $ip_lockout = false;
        $user_lockout = false;
        if ( $banned_ip->id ) {
            $error = true;
            $ip_lockout = true;
        } else {
            $user_cols = 'id,name,nickname,email,status,lock_out,password,language';
            $realm = $app->translate( 'Enter Username and Password.' );
            $realm = str_replace( '"', '', $realm );
            if ( $type == 2 ) {
                $password = $this->get_config_value( 'httpauth_password' );
                if ( empty( $_SERVER['PHP_AUTH_DIGEST'] ) ) {
                    header( 'HTTP/1.1 401 Unauthorized' );
                    header( 'WWW-Authenticate: Digest realm="' . $realm .
                            '",qop="auth",nonce="' . uniqid() . '",opaque="' . md5( $realm ) . '"' );
                }
                if ( isset( $_SERVER['PHP_AUTH_DIGEST'] ) ) {
                    $data = $this->http_digest_parse( $_SERVER['PHP_AUTH_DIGEST'] );
                    unset( $_SERVER['PHP_AUTH_DIGEST'] );
                    $username = $data['username'] ?? null;
                    if (! $username ) {
                        $error = true;
                    } else {
                        if ( $password_col ) {
                            $user_cols .= ",{$password_col}";
                            $user = $app->db->model( 'user' )->get_by_key( [ $column => $username ], null, $user_cols );
                            if (! $user->id ) {
                                $error = true;
                            } else {
                                $password = $user->$password_col;
                            }
                        }
                        if (! $error ) {
                            $A1 = md5( $username . ':' . $realm . ':' . $password );
                            $A2 = md5( $_SERVER['REQUEST_METHOD'] . ':' . $data['uri'] );
                            $valid_response = md5( $A1 . ':' . $data['nonce'] . ':' . $data['nc'] . ':' . $data['cnonce'].':' . $data['qop'] . ':' . $A2 );
                            $password_verify = $data['response'] === $valid_response;
                            if (! $password_verify ) {
                                $error = true;
                            }
                            if ( $column === '_unique' ) {
                                if ( $login_id !== $username ) {
                                    $password_verify = false;
                                    $error = true;
                                }
                            } else {
                                $user = $user ? $user : $app->db->model( 'user' )->get_by_key( [ $column => $username ], null, $user_cols );
                            }
                        }
                    }
                }
            } else {
                if (!isset( $_SERVER['PHP_AUTH_USER'] ) || !$_SERVER['PHP_AUTH_USER'] ) {
                    header( "WWW-Authenticate: Basic realm=\"{$realm}\"" );
                    header( 'HTTP/1.0 401 Unauthorized' );
                } else {
                    $username = $_SERVER['PHP_AUTH_USER'];
                    $password = $_SERVER['PHP_AUTH_PW'];
                    unset( $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'] );
                    $user_cols .= ",{$column}";
                    if ( $password_col ) {
                        $user_cols .= ",{$password_col}";
                    }
                    $user = $app->db->model( 'user' )->get_by_key( [ $column => $username ], null, $user_cols );
                    if ( $password_col ) {
                        $password_verify = password_verify( $password, $user->$password_col );
                    } else {
                        $password_verify = password_verify( $password, $user->password );
                    }
                }
            }
            if (! $username ) {
                // Do not send HTTP status code.
                $app->ctx->vars['page_title'] = $app->translate( 'An error occurred' );
                $msg = $app->translate( 'Login failed: Username or Password was wrong.' );
                $msg .= $app->translate( '(Please close your browser and try again.)' );
                $app->ctx->vars['error'] = $msg;
                $tmpl = $this->path() . DS . 'tmpl' . DS . 'http_auth_error.tmpl';
                $tmpl = $app->fmgr->get( $tmpl );
                echo $app->build( $tmpl );
                exit();
            }
            if ( $username ) {
                if ( ( $user && ( ! $user->id || $user->status != 2 || $user->lock_out ) ) || !$password_verify ) {
                    $error = true;
                }
                if ( $user ) {
                    $user_lockout = $user->lock_out;
                }
            }
        }
        if ( $error ) {
            if (! $banned_ip->id ) {
                $no_lockout_allowed = $app->no_lockout_allowed_ip;
                if ( $no_lockout_allowed ) {
                    $allowed_ip = $app->db->model( 'remote_ip' )->get_by_key(
                            ['ip_address' => $app->remote_ip,
                             'class' => ['IN' => ['administrator', 'allow'] ] ] );
                    if (! $allowed_ip->id ) {
                        $no_lockout_allowed = false;
                    }
                }
                $limit = $app->ip_lockout_limit;
                if (! $no_lockout_allowed && $limit ) {
                    $interval = $app->ip_lockout_interval ??  600;
                    $ts = date( 'Y-m-d H:i:s', $app->request_time - $interval );
                    $terms = ['remote_ip' => $app->remote_ip, 'created_on' => ['>' => $ts ],
                              'level' => 8, 'category' => 'login', 'model' => 'user'];
                    $faild_login = $app->db->model( 'log' )->count( $terms, null, 'id' );
                    if ( $faild_login && $faild_login >= $limit ) {
                        $banned_ip = $app->db->model( 'remote_ip' )->get_by_key( ['ip_address' => $app->remote_ip ] );
                        $banned_ip->class( 'banned' );
                        $banned_ip->model( 'user' );
                        $app->set_default( $banned_ip );
                        $banned_ip->save();
                    }
                }
                if ( $user && ! $user->lock_out ) {
                    $limit = $app->lockout_limit;
                    if ( $limit && $user->id ) {
                        $interval = $app->lockout_interval ??  600;
                        $ts = date( 'Y-m-d H:i:s', $app->request_time - $interval );
                        $terms = ['object_id' => $user->id, 'created_on' => ['>' => $ts ],
                                  'level' => 8, 'category' => 'login', 'model' => 'user'];
                        $faild_login = $app->db->model( 'log' )->count( $terms, null, 'id' );
                        if ( $faild_login && $faild_login >= $limit ) {
                            $user = $app->db->model( 'user' )->load( $user->id );
                            $user->lock_out( 1 );
                            $user->lock_out_on( date( 'Y-m-d H:i:s', $app->request_time ) );
                            $user->save();
                            $app->user = $user; // Update in __destruct.
                        }
                    }
                }
                if ( $user ) {
                    $message = $app->translate( 'Login failed: Username or Password was wrong.' );
                    $password = isset( $password ) ? str_repeat( '*', strlen( $password ) ) : '***********';
                    $metadata = ['username' => $username,
                                 'password' => $password ];
                    $app->log( ['message'  => $message,
                                'category' => 'login',
                                'model'    => 'user',
                                'object_id'=> $user->id,
                                'metadata' => json_encode( $metadata, JSON_UNESCAPED_UNICODE ),
                                'level'    => 'security'] );
                }
            }
            $app->ctx->vars['page_title'] = $app->translate( 'An error occurred' );
            $msg = $app->translate( 'Login failed: Username or Password was wrong.' );
            $msg .= $app->translate( '(Please close your browser and try again.)' );
            $app->ctx->vars['error'] = $msg;
            $tmpl = $this->path() . DS . 'tmpl' . DS . 'http_auth_error.tmpl';
            $tmpl = $app->fmgr->get( $tmpl );
            $app->print( $app->build( $tmpl ) );
            exit();
        }
    }

    function http_digest_parse ( $txt ) {
        $needed_parts = ['nonce'=> 1 , 'nc' => 1, 'cnonce' => 1, 'qop' => 1, 'username' => 1, 'uri' => 1, 'response' => 1 ];
        $data = [];
        $keys = implode( '|', array_keys( $needed_parts ) );
        preg_match_all( '@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER );
        foreach ( $matches as $m ) {
            $data[$m[1]] = $m[3] ? $m[3] : $m[4];
            unset( $needed_parts[ $m[1] ] );
        }
        return $needed_parts ? false : $data;
    }
}