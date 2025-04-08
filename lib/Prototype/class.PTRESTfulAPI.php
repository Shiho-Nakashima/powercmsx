<?php

class PTRESTfulAPI extends Prototype {

    public $class;
    public $parent;
    public $api_version;
    public $model;
    public $object_id;
    public $method;
    public $workspace_id;
    public $workspace_ids = [];
    public $api_methods = [];
    public $api_list_limit = 10;
    public $api_name_column = 'name';
    public $api_password_column = 'password';
    public $api_sess_expires = 3600;
    public $api_caching = false;
    public $api_cache_methods = ['list', 'get', 'search', 'scheme'];
    public $api_cache_key = null;
    public $api_contains_username = false;
    public $api_contains_useremail = false;
    public $api_permitted_objs = true;
    public $api_unescaped_unicode = false;
    public $api_pretty_print = false;
    public $api_allow_login = true;
    public $api_debug = false;
    public $api_debug_user_id;
    public $api_debug_json_path = '';
    public $api_user_lockout = true;
    public $api_ip_lockout = false;
    public $api_use_cookie = false;
    public $api_login_model = 'user';
    public $api_cookie_name = 'pt-api-user';
    public $api_allowed_origin = [];
    public $api_acc_ctrl_allow_headers = ['Content-Type', 'X-PCMSX-Authorization', 'access_token'];
    public $api_allow_remember = false;
    public $api_allow_contact = true;
    public $api_status_text = false;
    public $api_requires_login = ['log', 'contact', 'activity', 'permission', 'role', 'searchword'];
    public $import_set_default = true;
    public $import_detach_binary = true;
    protected $upload_dir;
    protected $do_pre_listing = false;
    public $api_allow_merge = true;

    function __construct ( $options = [] ) {
        $this->id = 'RESTfulAPI';
        parent::__construct( $options );
        $config = $this->pt_dir . DS . 'api-config.json';
        if ( file_exists( $config ) ) {
            $json = json_decode( file_get_contents( $config ), true );
            if ( json_last_error() || !is_array( $json ) ) {
                echo 'An error occurred while decoding api-config.json ( ' . json_last_error_msg() . ' ).';
                exit();
            }
            foreach ( $json as $property => $value ) {
                $this->$property = $value;
            }
        }
    }

    function __destruct () {
        if (! $this->class ) {
            $this->class = Prototype::get_instance();
        }
        if ( $this->class ) {
            $this->set_object_vars( $this->class );
            parent::__destruct();
        }
    }

    function run () {
        $api_path_from = $this->api_path_from ? $this->api_path_from : 'REDIRECT_URL';
        $path = $_SERVER[ $api_path_from ];
        if ( $api_path_from === 'REQUEST_URI' && strpos( $path, '?' ) !== false ) {
            list( $path, $param ) = explode( '?', $path );
        }
        $self = dirname( $_SERVER['PHP_SELF'] ) . '/';
        $path = preg_replace( "!^{$self}!", '', $path );
        $path = str_replace( '.', '', $path );
        $items = explode( '/', $path );
        list( $version, $workspace_id, $model, $method, $object_id ) = array_pad( $items, 5, null );
        $this->api_version = $version;
        $this->model = $model;
        if ( $workspace_id == 'authentication' ) {
            $this->method = 'authentication';
        } else {
            $this->workspace_id = (int) $workspace_id;
            $this->method = $method;
            $this->object_id = $object_id;
        }
        $version = $this->api_version;
        if (! preg_match( '/^v[0-9]{1,}$/', $version ) ) {
            $this->json_error( "Version '%s' is not supported.", $version, 400 );
        }
        $class = __DIR__ . DS . 'RESTfulAPI' . DS . $version . '.php';
        if (! file_exists( $class ) ) {
            $this->json_error( "Version '%s' is not supported.", $version, 400 );
        }
        require_once( $class );
        $classname = 'PTRESTfulAPI' . $version;
        $app = new $classname();
        $method = $this->method;
        $method_exists = false;
        $version_number = (int) str_replace( 'v', '', $version );
        if (! $this->method_exists( $app, $method ) ) {
            for ( $i = $version_number; $i > 0; $i-- ) {
                $class = __DIR__ . DS . 'RESTfulAPI' . DS . "v{$i}" . '.php';
                if ( file_exists( $class ) ) {
                    require_once( $class );
                    $classname = 'PTRESTfulAPIv' . $i;
                    $app = new $classname();
                    if ( $this->method_exists( $app, $method ) ) {
                        $method_exists = true;
                        break;
                    }
                }
            }
        } else {
            $method_exists = true;
        }
        $model = $this->model;
        $app->properties = $this->properties;
        $app->parent = $this;
        $app->init();
        $this->class = $app;
        $api_methods = $app->api_methods;
        if (! empty( $api_methods ) && isset( $api_methods[ (string) $this->workspace_id ][ $model ] ) ) {
            $api_methods = $api_methods[ (string) $this->workspace_id ][ $model ];
            if ( is_array( $api_methods ) && !in_array( $method, $api_methods ) ) {
                $this->json_error( "Method '{$method}' for model '{$model}' not allowed in this scope.", 403 );
            }
        }
        $app->method = $method;
        $app->model = $model;
        $app->object_id = $this->object_id;
        // Parameter and mode set before post_init hook.
        if ( $this->workspace_id ) {
            $_REQUEST['workspace_id'] = $this->workspace_id;
        }
        if ( $this->object_id ) {
            $_REQUEST['id'] = $this->object_id;
        }
        $_REQUEST['_model'] = $this->model;
        if ( $this->method == 'insert' || $this->method == 'update' ) {
            $app->mode = 'save';
            require( LIB_DIR . 'Prototype' . DS . 'core_validation_types.php' );
            $app->registry['cms_validations'] = $this->registry['cms_validations'];
        } else if ( $app->method == 'delete' ) {
            $app->mode = 'delete';
        } else if ( $app->method == 'list' ) {
            $app->mode = 'view';
            $_REQUEST['_type'] = 'list';
        }
        $api_allowed_origin = $app->api_allowed_origin;
        if ( is_array( $api_allowed_origin ) && ! empty( $api_allowed_origin ) && isset( $_SERVER['HTTP_ORIGIN'] ) ) {
            $http_origin = $_SERVER['HTTP_ORIGIN'];
            if ( array_search( $http_origin, $app->api_allowed_origin ) !== false ) {
                header( 'Access-Control-Allow-Origin: ' . $http_origin );
                header( 'Access-Control-Allow-Credentials: true' );
                if ( $app->request_method === 'OPTIONS' ) {
                    header( 'Access-Control-Allow-Methods: GET, POST, PUT, DELETE' );
                    $allow_headers = $app->api_acc_ctrl_allow_headers;
                    if ( is_array( $allow_headers ) && ! empty( $allow_headers ) ) {
                        header( 'Access-Control-Allow-Headers: ' . implode( ', ', $allow_headers ) );
                    }
                    header( 'HTTP/1.1 204 No Content' );
                    exit;
                }
            }
        }
        if ( $app->api_debug ) {
            $app->api_pretty_print = true;
            $this->api_pretty_print = true;
            $app->api_unescaped_unicode = true;
            $this->api_unescaped_unicode = true;
        }
        if ( $this->api_caching && in_array( $method, $this->api_cache_methods ) ) {
            $request = $app->request;
            if ( $query_string = $app->query_string() ) {
                $request .= '?' . $query_string;
            }
            $app->api_cache_key = md5( $request );
            $cache = $app->db->model( 'api_cache' )->get_by_key( ['key' => $app->api_cache_key ] );
            if ( $cache->id ) {
                $app->api_cache_key = null;
                $app->print_json( unserialize( $cache->value ) );
                exit();
            }
        }
        $admin_url = $app->cfg_admin_url ? $app->cfg_admin_url : $app->admin_url;
        $app->ctx->vars['script_uri'] = $admin_url;
        $app->init_callbacks( 'restfulapi', 'pre_response' );
        $app->init_callbacks( 'restfulapi', 'generate_resource' );
        $app->api_version = $version;
        $workspace_id = $this->workspace_id;
        $app->workspace_id = $workspace_id;
        if ( $workspace_id ) {
            $this->workspace = $app->db->model( 'workspace' )->load( $workspace_id );
            if (! $this->workspace ) {
                $this->json_error( "WorkSpace does not exist.", 404 );
            }
            $app->workspace = $this->workspace;
            $app->stash( 'workspace', $this->workspace );
        }
        if ( $app->api_debug ) {
            if ( $this->method !== 'get' && $this->method !== 'scheme'
                && $this->request_method == 'GET' ) {
                $app->request_method = 'POST';
            }
        }
        if ( $method == 'authentication' ) {
            if (! $this->api_allow_login ) {
                $this->json_error( 'Authentication not allowed.', 403 );
            }
            if ( $app->api_debug ) {
                $app->request_method = 'POST';
            }
            $model = $model ? $model : 'user';
            $table = $app->get_table( $model );
            if (! $table ) {
                $this->json_error( "Model '%s' does not exist.", $model, 404 );
            }
            $app->model = $model;
            $app->table = $table;
            $app->authentication( $app );
            exit();
        }
        $table = $app->get_table( $model );
        if (! $table ) {
            $registry = $app->registry;
            if ( isset( $registry['api_methods'] ) ) {
                $meth = null;
                for ( $i = $version_number; $i > 0; $i-- ) {
                    if ( $method && isset( $registry['api_methods']['v' . $i ][ $method ] ) ) {
                        $meth = $registry['api_methods']['v' . $i ][ $method ];
                        break;
                    } else if ( isset( $registry['api_methods']['v' . $i ][ $model ] ) ) {
                        $meth = $registry['api_methods']['v' . $i ][ $model ];
                        break;
                    }
                }
                if ( $meth !== null ) {
                    $plugin = $meth['component'];
                    $method = $meth['method'];
                    $requires_login = $meth['requires_login'] ?? false;
                    if ( $requires_login && ! $app->user() ) {
                        $this->json_error( 'This method requires login.', 403 );
                    }
                    $component = $app->component( $plugin );
                    if (!$component ) $component = $app->autoload_component( $plugin );
                    if ( is_object( $component ) ) {
                        if (! method_exists( $component, $method ) ) {
                            $method = "api_method_{$method}";
                        }
                        if ( method_exists( $component, $method ) ) {
                            if ( isset( $meth['permission'] ) && $meth['permission'] ) {
                                $workspace = $app->workspace ? $app->workspace : $app->db->model( 'workspace' )->new( ['id' => 0] );
                                if (!$app->can_do( $meth['permission'], null, null, $workspace ) ) {
                                    $this->json_error( 'Permission denied.', 403 );
                                }
                            }
                            $allowed = $meth['allowed'] ?? null;
                            if ( $allowed && !in_array( $app->request_method, $allowed ) ) {
                                $this->json_error( 'Method %s not allowed.', $app->request_method, 400 );
                            }
                            return $component->$method( $app );
                        }
                    }
                }
            }
            $this->json_error( "Model '%s' does not exist.", $model, 404 );
        }
        if ( $model ) {
            $app->get_scheme_from_db( $model );
        }
        if ( $method == 'get' && ! ctype_digit( (string) $this->object_id ) ) {
            $obj = $app->db->model( $model );
            $terms = [];
            if ( $obj->has_column( 'workspace_id' ) ) {
                $terms['workspace_id'] = $this->workspace_id;
            }
            if ( $obj->has_column( 'rev_type' ) ) {
                $terms['rev_type'] = 0;
            }
            if ( $obj->has_column( 'status' ) ) {
                if ( $app->user() ) {
                    $max_status = $app->max_status( $app->user(), $this->model, $this->workspace_id );
                    $terms['status'] = ['<=' => $max_status ];
                } else {
                    $status_published = $app->status_published( $this->model );
                    $terms['status'] = $status_published;
                }
            }
            if ( $app->param( 'basename' ) && $obj->has_column( 'basename' ) ) {
                $terms['basename'] = $app->param( 'basename' );
                $obj = $obj->get_by_key( $terms, null, 'id' );
                if ( $obj->id ) {
                    $object_id = (int) $obj->id;
                    $app->object_id = $object_id;
                    $this->object_id = $object_id;
                }
            } else if ( $primary = $table->primary ) {
                $terms[ $primary ] = $this->object_id;
                $obj = $obj->get_by_key( $terms, null, 'id' );
                if ( $obj->id ) {
                    $object_id = (int) $obj->id;
                    $app->object_id = $object_id;
                    $this->object_id = $object_id;
                }
            }
            if (! ctype_digit( (string) $this->object_id ) && ! is_numeric( $this->object_id ) ) {
                $this->json_error( 'The %s was not found.', $model, 404 );
            }
        } else {
            $object_id = (int) $object_id;
            $this->object_id = $object_id;
        }
        $contact_methods = ['token', 'confirm', 'submit'];
        if (! $table->api ) {
            if ( $this->api_allow_contact && $model == 'contact' ) {
                if (! in_array( $method, $contact_methods ) ) {
                    $this->json_error( "API use of model '%s' is not allowed.", $model, 406 );
                }
            } else if (! isset( $app->api_methods[ (string) $this->workspace_id ][ $model ] ) ) {
                $this->json_error( "API use of model '%s' is not allowed.", $model, 406 );
            }
        }
        if ( ( $method == 'get' || $method == 'delete' || $method == 'update' ) && !$this->object_id ) {
            $this->json_error( 'The %s was not found.', $model, 404 );
        } else if ( $method == 'list' ) {
            $_REQUEST['_filter'] = $this->model;
            if (! $app->user() ) {
                $app->register_callback( $model, 'pre_listing', 'pre_listing', 5, $app );
            }
        } else if ( $method == 'search' ) {
            $component = $this->component( 'SearchEstraier' );
            if (! $component ) {
                $this->json_error( "Method '%s' is not supported.", $method, 405 );
            }
        } else if ( $model == 'contact' ) {
            if (! in_array( $method, $contact_methods ) ) {
                $this->json_error( "API use of model '%s' is not allowed.", $model, 406 );
            }
        }
        $app->table = $table;
        $enable_api = $this->workspace ? $this->workspace->enable_api : $app->enable_api;
        if (! $enable_api ) {
            if (! isset( $app->api_methods[ (string) $this->workspace_id ][ $model ] ) ) {
                $this->json_error( "WorkSpace ID:%s does not support API.", "'{$workspace_id}'", 403 );
            }
        }
        if ( $app->db->model( $model )->has_column( 'workspace_id' ) ) {
            $workspace_ids = $this->param( 'workspace_ids' );
            if ( $workspace_ids && !$this->user() ) {
                if ( $this->can_api_multi ) {
                    $workspace_ids = explode( ',', $workspace_ids );
                    $workspace_ids = array_unique( array_map( 'intval', $workspace_ids ) );
                    if (! empty( $workspace_ids ) ) {
                        $workspaces = $app->db->model( 'workspace' )->load(
                          ['id' => $workspace_ids, 'enable_api' => 0], null, 'id,enable_api' );
                        foreach ( $workspaces as $workspace ) {
                            unset( $workspace_ids[ (int) $workspace->id ] );
                        }
                        if ( in_array( 0, $workspace_ids ) && !$app->enable_api ) {
                            unset( $workspace_ids[0] );
                        }
                        if (! empty( $workspace_ids ) ) {
                            $this->workspace_ids = $workspace_ids;
                            $app->workspace_ids = $workspace_ids;
                        }
                    }
                }
            }
        }
        if (! $method_exists && ! $this->method_exists( $app, $method ) ) {
            $registry = $app->registry;
            if ( isset( $registry['api_methods'] ) ) {
                $meth = null;
                for ( $i = $version_number; $i > 0; $i-- ) {
                    if ( isset( $registry['api_methods']['v' . $i ][ $method ] ) ) {
                        $meth = $registry['api_methods']['v' . $i ][ $method ];
                        break;
                    } else if ( isset( $registry['api_methods']['v' . $i ][ $model ] ) ) {
                        $meth = $registry['api_methods']['v' . $i ][ $model ];
                        break;
                    }
                }
                if ( $meth !== null ) {
                    $plugin = $meth['component'];
                    $method = $meth['method'];
                    $requires_login = isset( $meth['requires_login'] ) ? $meth['requires_login'] : true;
                    if ( $requires_login && ! $app->user() ) {
                        $this->json_error( 'This method requires login.', 403 );
                    }
                    $component = $app->component( $plugin );
                    if (!$component ) $component = $app->autoload_component( $plugin );
                    if ( is_object( $component ) ) {
                        if (! method_exists( $component, $method ) ) {
                            $method = "api_method_{$method}";
                        }
                        if ( method_exists( $component, $method ) ) {
                            if ( isset( $meth['permission'] ) && $meth['permission'] ) {
                                $workspace = $app->workspace ? $app->workspace : $app->db->model( 'workspace' )->new( ['id' => 0] );
                                if (!$app->can_do( $meth['permission'], null, null, $workspace ) ) {
                                    $this->json_error( 'Permission denied.', 403 );
                                }
                            }
                            $allowed = $meth['allowed'] ?? null;
                            if ( $allowed && !in_array( $app->request_method, $allowed ) ) {
                                $this->json_error( 'Method %s not allowed.', $app->request_method, 400 );
                            }
                            return $component->$method( $app );
                        }
                    }
                }
            }
            $this->json_error( "Method '%s' is not supported.", $method, 405 );
        }
        $app->$method( $app );
    }

    function set_object_vars ( $app ) {
        $object_vars = get_object_vars( $app );
        foreach ( $object_vars as $key => $value ) {
            $this->$key = $value;
        }
    }

    function user ( $model = 'user' ) {
        if (! $this->api_allow_login ) {
            return;
        }
        if ( $this->api_user ) {
            return $this->api_user;
        }
        $headers = getallheaders();
        foreach ( $headers as $key => $value ) {
            if ( strtolower( $key ) == 'x-pcmsx-authorization' ) {
                $headers['access_token'] = $value;
                break;
            }
        }
        $cookie_val = $this->cookie_val( $this->api_cookie_name );
        if ( isset( $headers['access_token'] ) ) {
            $access_token = $headers['access_token'];
            $session = $this->db->model( 'session' )->get_by_key(
                  ['key' => 'RESTfulAPIAccessToken', 'kind' => 'US', 'name' => $access_token ] );
            if ( $session->id && $session->user_id && $session->expires ) {
                if ( $session->expires < $this->request_time ) {
                    $session->remove();
                    return;
                }
                if ( $this->api_use_cookie ) {
                    if (! $cookie_val || $session->value != $cookie_val ) {
                        $session->remove();
                        return;
                    }
                }
                $login_model = $session->data ? $session->data : 'user';
                if ( $login_model !== 'user' && $login_model !== 'member' ) {
                    $login_model = 'user';
                }
                $user = $this->db->model( $login_model )->load( (int) $session->user_id );
                if ( $user ) {
                    if ( $user->lock_out || $user->status != 2 ) {
                        $user = null;
                        $session->remove();
                        return;
                    } else {
                        $this->api_user = $user;
                        $this->user = $this->api_user;
                        $this->api_login_model = $login_model;
                        return $user;
                    }
                }
            }
        } else if ( $this->api_use_cookie && $cookie_val ) {
            $session = $this->db->model( 'session' )->get_by_key(
                  ['key' => 'RESTfulAPIAccessToken', 'kind' => 'US', 'value' => $cookie_val ] );
            if ( $session->id && $session->user_id && $session->expires ) {
                if ( $session->expires < $this->request_time ) {
                    $session->remove();
                    return;
                }
                $login_model = $session->text ? $session->text : 'user';
                if ( $login_model !== 'user' && $login_model !== 'member' ) {
                    $login_model = 'user';
                }
                $user = $this->db->model( $login_model )->load( (int) $session->user_id );
                if ( $user->lock_out || $user->status != 2 ) {
                    $user = null;
                    $session->remove();
                    return;
                } else {
                    $this->api_user = $user;
                    $this->user = $this->api_user;
                    $this->api_login_model = $login_model;
                    return $user;
                }
            }
        }
        // Debug.
        if ( $this->api_debug && $this->api_debug_user_id && $this->db ) {
            $this->api_user = $this->db->model( 'user' )->load( $this->api_debug_user_id );
            $this->user = $this->api_user;
            return $this->api_user;
        }
    }

    function validate_resource ( &$json, $obj = null, &$errors = [] ) {
        if (! $obj ) {
            $obj = $this->db->model( $this->model )->__new();
            if ( $obj->has_column( 'workspace_id' ) ) {
                $obj->workspace_id( $this->workspace_id );
            }
        }
        $validator = new PTValidator();
        $scheme = $this->get_scheme_from_db( $obj->_model );
        $column_defs = $scheme['column_defs'];
        $unique = $scheme['unique'] ?? [];
        $validation_types = $scheme['validation_types'] ?? [];
        $locale = $scheme['locale'] ?? [];
        $cms_validations = $this->registry['cms_validations'];
        $table_label = $this->translate( $this->table->label );
        foreach ( $column_defs as $column => $prop ) {
            $label = $locale['default'][ $column ] ?? $column;
            $label = $this->translate( $label );
            if ( $prop['type'] == 'datetime' && isset( $json[ $column ] ) && $json[ $column ] ) {
                $datetime = $json[ $column ];
                $datetime = preg_replace( '/[^0-9]/', '', $datetime );
                $msg = '';
                $res = $validator->cms_is_valid_ts( $label, $datetime, $msg );
                if (! $res ) {
                    $errors['Invalid'][ $column ] = $msg;
                    continue;
                }
            }
            if ( $this->api_allow_merge ) {
                $value = array_key_exists( $column, $json ) ? $json[ $column ] : $obj->$column;
            } else {
                $value = $json[ $column ] ?? null;
            }
            if ( !$value && ! $obj->id && $prop['type'] != 'relation' && isset( $prop['default'] ) && $prop['default'] ) {
                $value = $prop['default'];
            }
            if ( $column == 'status' ) {
                $value = (int) $value;
                $status_published = $this->status_published( $this->model );
                $workflow = $json['Workflow'] ?? null;
                unset( $json['Workflow'] );
                if (! $workflow ) {
                    $max_status = $this->max_status( $this->user(), $this->model, $this->workspace_id );
                    if ( $max_status < $value ) {
                        $errors['Invalid'][ $column ] =
                            $this->translate( 'An attempt was made to specify a status that the user cannot set.' );
                        continue;
                    }
                }
                if ( $status_published == 4 ) {
                    if ( $value < 0 || $value > 5 ) {
                        $errors['Invalid'][ $column ] = $this->translate( "Status '%s' cannot be specified.", $value );
                        continue;
                    }
                } else {
                    if ( $value < 1 || $value > 2 ) {
                        $errors['Invalid'][ $column ] = $this->translate( "Status '%s' cannot be specified.", $value );
                        continue;
                    }
                }
            } else if ( $column == 'rev_type' && $value ) {
                if ( $this->method == 'update' && ! $obj->rev_type ) {
                    $errors['Invalid'][ $column ] = $this->translate( 'The master cannot be a revision.' );
                }
                $rev_object_id = (int) $json['rev_object_id'] ?? null;
                if ( ( $value != 1 && $value != 2 ) || !$rev_object_id ) {
                    $errors['Invalid'][ $column ] = $this->translate( 'Invalid rev_type.' );
                    continue;
                }
                $master = $this->db->model( $obj->_model )->load( $rev_object_id );
                if (! $master ) {
                    $errors['Invalid'][ $column ] = $this->translate( 'Master not found.' );
                    continue;
                } else if ( $master->rev_type ) {
                    $errors['Invalid'][ $column ] = $this->translate( 'Revision cannot be specified for master.' );
                    continue;
                }
                if ( $obj->has_column( 'workspace_id' ) ) {
                    if ( $master->workspace_id != $this->workspace_id ) {
                        $errors['Invalid'][ $column ] = $this->translate( 'Invalid workspace_id for master.' );
                        continue;
                    }
                }
            }
            if ( $prop['type'] != 'relation' ) {
                if (! $obj->$column && ! $value && isset( $prop['not_null'] ) ) {
                    if ( isset( $prop['default'] ) ) {
                        $json[ $column ] = $prop['default'];
                    } else if ( strpos( $prop['type'], 'int' ) !== false ) {
                        $json[ $column ] = 0;
                    } else {
                        $errors['Required'][ $column ] = $this->translate( '%s is required.', $label );
                        continue;
                    }
                }
                if ( in_array( $column, $unique ) ) {
                    $unique_terms = [ $column => $value ];
                    if ( $this->object_id ) {
                        $unique_terms['id'] = ['!=' => $this->object_id ];
                    }
                    if ( $obj->has_column( 'workspace_id' ) ) {
                        $unique_terms['workspace_id'] = $this->workspace_id;
                    }
                    if ( $obj->has_column( 'rev_type' ) ) {
                        $unique_terms['rev_type'] = 0;
                    }
                    $existing = $this->db->model( $this->model )->count( $unique_terms );
                    if ( $existing ) {
                        $errors['Duplicate'][ $column ]
                            = $this->translate( 'A %1$s with the same %2$s already exists.', [ $label, $table_label ] );
                        continue;
                    }
                }
                if ( isset( $validation_types[ $column ] ) ) {
                    if ( isset( $cms_validations[ $validation_types[ $column ] ] ) ) {
                        $validation = $cms_validations[ $validation_types[ $column ] ];
                        $component = $validation['component'];
                        $method = $validation['method'];
                        $class = $component == 'PTValidator' ? $validator : $this->component( $component );
                        if ( is_object( $class ) && method_exists( $class, $method ) ) {
                            $msg = null;
                            $res = $class->$method( $label, $value, $msg );
                            if (! $res ) {
                                $errors['Invalid'][ $column ] = $msg;
                            }
                        }
                    }
                }
            } else if (! isset( $json[ $column ] ) && ! $value && isset( $prop['not_null'] ) ) {
                if ( $obj->id ) {
                    $count = $this->db->model( 'relation' )->count(
                        ['from_obj' => $this->model, 'from_id' => $obj->id, 'name' => $column ] );
                    if (! $count ) {
                        $errors['Required'][ $column ] = $this->translate( '%s is required.', $label );
                        continue;
                    }
                } else {
                    $errors['Required'][ $column ] = $this->translate( '%s is required.', $label );
                    continue;
                }
            }
        }
        $required_fields = PTUtil::get_fields( $obj, 'requireds' );
        $field_keys = [];
        if ( isset( $json['Fields'] ) && is_array( $json['Fields'] ) ) {
            $fields = $json['Fields'];
            $max = 0;
            foreach ( $fields as $idx => $field ) {
                if (! isset( $field['field_basename'] ) || !$field['field_basename'] ) {
                    unset( $fields[ $idx ] );
                    continue;
                } else {
                    if (! isset( $field['type'] ) || ! isset( $field['name'] )
                        || ! isset( $field['key'] ) ) {
                        $column = 'field.' . $field['field_basename'];
                        $errors['Invalid'][ $column ] = $this->translate( '%s is invalid.', $column );
                        continue;
                    }
                }
                if (! isset( $field['value'] ) || ! $field['value'] ) {
                    if ( isset( $field['json'] ) && is_array( $field['json'] ) ) {
                        $fld_values = $field['json'];
                        if ( $field['type'] == 'datetime' ) {
                            if ( $fld_values[ array_keys( $fld_values )[0] ] || $fld_values[ array_keys( $fld_values )[1] ] ) {
                                $field['value'] = join( ' ', $fld_values );
                                if ( $fld_values[ array_keys( $fld_values )[0] ] == '' ) {
                                    $fld_values[ array_keys( $fld_values )[0] ] = '0000-00-00';
                                }
                                if ( preg_match( '/\s[0-9]{2}:[0-9]{2}$/', $meta->value ) ) {
                                    $fld_values[ array_keys( $fld_values )[1] ] .= ':00';
                                } else if ( $fld_values[ array_keys( $fld_values )[1] ] == '' ) {
                                    $fld_values[ array_keys( $fld_values )[1] ] = '00:00:00';
                                }
                                $field['value'] = join( ' ', $fld_values );
                            }
                        } else if ( $field['type'] == 'tel_separated' ) {
                            if ( $fld_values[ array_keys( $fld_values )[0] ]
                                || $fld_values[ array_keys( $fld_values )[1] ]
                                || $fld_values[ array_keys( $fld_values )[2] ] ) {
                                $field['value'] = join( '-', $fld_values );
                            }
                        } else if ( $field['type'] == 'checkboxes' ) {
                            $field['value'] = join( ',', $fld_values );
                        } else if ( $field['type'] == 'input_text_multi' ) {
                            $field['value'] = join( PHP_EOL, $fld_values );
                        }
                        $fields[ $idx ] = $field;
                    }
                }
                if (! isset( $field['value'] ) ) {
                    $field['value'] = '';
                }
                $basename = $field['field_basename'];
                if ( isset( $required_fields[ $basename ] ) ) {
                    if ( $field['value'] ) {
                        $field_keys[ $basename ] = true;
                    }
                }

            }
            $json['Fields'] = $fields;
        }
        if ( $obj->id ) {
            $meta_fields = $this->get_meta( $obj, 'customfield' );
            foreach ( $meta_fields as $meta ) {
                if ( $meta->value || $meta->text ) {
                    unset( $required_fields[ $meta->key ] );
                }
            }
        }
        foreach ( $field_keys as $field_key => $book ) {
            unset( $required_fields[ $field_key ] );
        }
        foreach ( $required_fields as $basename => $name ) {
            $basename = "field.{$basename}";
            $errors['Required'][ $basename ] = $this->translate( '%s is required.', $name );
        }
        if (! empty( $errors ) ) {
            header( 'HTTP/1.1 406 Not Acceptable' );
            $message = 'The input data is missing or contains incorrect values.';
            $json = ['status'  => 406, 'message' => $message, 'errors' => $errors ];
            header( 'Content-type: application/json; charset=UTF-8' );
            echo $this->json_encode( $json );
            exit();
        }
        return true;
    }

    function object_to_resource ( $obj, $required = null, $recursive = false ) {
        $user = $this->user();
        $scheme = $this->get_scheme_from_db( $obj->_model );
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $translates = isset( $scheme['translate'] ) ? $scheme['translate'] : [];
        $options = isset( $scheme['options'] ) ? $scheme['options'] : [];
        $column_defs = $scheme['column_defs'];
        $edit_properties = $scheme['edit_properties'] ?? [];
        $has_thumb = false;
        $admin_url = $this->cfg_admin_url ? $this->cfg_admin_url : $this->admin_url;
        $assets_c_path = $this->assets_c_path;
        if ( $assets_c_path && strpos( $assets_c_path, '/' ) === 0 ) {
            $assets_c_path = $this->base . $assets_c_path;
        }
        $vars = $obj->get_values( true );
        $object_keys = array_keys( $vars );
        if ( in_array( 'object_id', $object_keys ) && in_array( 'model', $object_keys ) ) {
            $object_id = (int) $vars['object_id'];
            $object_model = $vars['model'];
            if ( $object_model && $object_id ) {
                $obj_table = $this->get_table( $object_model );
                if ( $obj_table && !$recursive ) {
                    $_primary = $obj_table->primary;
                    $rel_required = $required == null ? null : ['id', $_primary, 'Permalink', 'Thumbnail', 'Path'];
                    if ( $this->db->model( $object_model )->has_column( 'workspace_id' ) && is_array( $rel_required ) ) {
                        $rel_required[] = 'workspace_id';
                    }
                    $rel_terms = ['id' => $object_id ];
                    $rel_obj = $this->db->model( $object_model );
                    $permitted_objs = false;
                    if ( $this->api_permitted_objs && $rel_obj->has_column( 'status' ) ) {
                        if ( $user ) {
                            if ( $rel_obj->has_column( 'workspace_id' ) ) {
                                $max_status = $this->max_status( $user, $object_model, $this->workspace_id );
                            } else {
                                $max_status = $this->max_status( $user, $object_model, 0 );
                            }
                            $rel_terms['status'] = ['<=' => $max_status ];
                            $permitted_objs = !$user->is_superuser;
                        } else {
                            $status_published = $this->status_published( $object_model );
                            $rel_terms['status'] = $status_published;
                        }
                    }
                    $obj_model = $rel_obj->load( $rel_terms, null, $rel_required );
                    $obj_model = empty( $obj_model ) ? null : $obj_model[0];
                    if ( $permitted_objs && $obj_model && !$this->can_do( $object_model, 'edit', $obj_model ) ) {
                        $obj_model = null;
                    }
                    if ( $obj_model ) {
                        $vars['object_id'] = $this->object_to_resource( $obj_model, $rel_required, 1 );
                    }
                }
            }
        }
        foreach ( $vars as $key => $var ) {
            if ( isset( $edit_properties[ $key ] ) && $edit_properties[ $key ] == 'password(hash)' ) {
                 unset( $vars[ $key ] );
                 continue;
            }
            if ( $required && ! in_array( $key, $required ) ) {
                unset( $vars[ $key ] );
                continue;
            } else if ( ( $key == 'site_path' || $key == 'document_root' ) && $obj->_model == 'workspace' ) {
                unset( $vars[ $key ] );
                continue;
            } else if ( ( $obj->_model == 'user' || $obj->_model == 'member' ) && $this->model != $obj->_model ) {
                if ( $key == 'last_login_ip' || $key == 'uuid' || $key == 'last_login_on'
                    || $key == 'is_superuser' || $key == 'created_by' || $key == 'modified_by'
                    || $key == 'created_on' || $key == 'modified_on' || $key == 'lock_out' ) {
                    unset( $vars[ $key ] );
                    continue;
                } else if (! $this->api_contains_username && $key == 'name' ) {
                    unset( $vars[ $key ] );
                    continue;
                } else if (! $this->api_contains_useremail && $key == 'email' ) {
                    unset( $vars[ $key ] );
                    continue;
                }
            }
            if ( isset( $column_defs[ $key ] ) && isset( $column_defs[ $key ]['type'] )
                && $column_defs[ $key ]['type'] == 'blob' ) {
                unset( $vars[ $key ] );
                continue;
            } else if ( $obj->_model == 'contact' && ( $key == 'data' || $key == 'question_map' ) && $var ) {
                $vars[ $key ] = json_decode( $vars[ $key ], true );
            } else if ( isset( $column_defs[ $key ]['type'] ) && $column_defs[ $key ]['type'] == 'datetime' && $var ) {
                if ( preg_match( '/^[0-9]+$/', $var ) ) {
                    $vars[ $key ] = $obj->ts2db( $var );
                }
            }
            if ( isset( $edit_properties[ $key ] ) ) {
                if (! in_array( $key, $relations ) ) {
                    $rel_obj = null;
                    $prop = $edit_properties[ $key ];
                    if ( $prop && strpos( $prop, ':' ) !== false ) {
                        $props = explode( ':', $prop );
                        $rel_model = $props[1];
                        if ( $rel_model == '__any__' ) {
                            if (! isset( $vars['model'] ) ) continue;
                            $rel_model = $obj->model;
                        }
                        if ( isset( $vars[ $key ] ) && ctype_digit( (string) $vars[ $key ] ) ) {
                            $ref_id = (int) $vars[ $key ];
                            if ( $ref_id ) {
                                $rel_terms = ['id' => $ref_id ];
                                $rel_obj = $this->db->model( $rel_model );
                                $permitted_objs = false;
                                if ( $key !== 'user_id' && $this->api_permitted_objs && $rel_obj->has_column( 'status' ) ) {
                                    if ( $user ) {
                                        if ( $rel_obj->has_column( 'workspace_id' ) ) {
                                            $max_status = $this->max_status( $user, $rel_model, $this->workspace_id );
                                        } else {
                                            $max_status = $this->max_status( $user, $rel_model, 0 );
                                        }
                                        $rel_terms['status'] = ['<=' => $max_status ];
                                        $permitted_objs = !$user->is_superuser;
                                    } else {
                                        $status_published = $this->status_published( $rel_model );
                                        $rel_terms['status'] = $status_published;
                                    }
                                }
                                $rel_obj = $rel_obj->load( $rel_terms );
                                $rel_obj = empty( $rel_obj ) ? null : $rel_obj[0];
                                if ( $permitted_objs && $rel_obj && !$this->can_do( $rel_model, 'edit', $rel_obj ) ) {
                                    $rel_obj = null;
                                }
                            }
                            if ( $rel_obj ) {
                                $rel_col = $props[2];
                                if ( $rel_col == '__primary__' ) {
                                    $rel_table = $this->get_table( $rel_model );
                                    $rel_col = $rel_table->primary;
                                }
                                if (! $recursive ) {
                                    $rel_required = $required == null ? null : ['id', $rel_col, 'Permalink', 'Thumbnail', 'Path'];
                                    if ( $obj->_model == 'field' && $this->method == 'scheme' && $rel_model == 'fieldtype' ) {
                                        $rel_required = ['id', $rel_col, 'basename', 'order' ];
                                    }
                                    if ( $this->db->model( $rel_model )->has_column( 'workspace_id' )
                                        && is_array( $rel_required ) ) {
                                        $rel_required[] = 'workspace_id';
                                    }
                                    $vars[ $key ] = $this->object_to_resource( $rel_obj, $rel_required, 1 );
                                }
                            } else {
                                $vars[ $key ] = null;
                            }
                        } else {
                            $vars[ $key ] = null;
                        }
                    }
                }
            }
        }
        foreach ( $relations as $name => $to_obj ) {
            if ( $obj->_model == 'field' && $this->method == 'scheme' && $name == 'models' ) {
                continue;
            }
            if ( $required && ! in_array( $name, $required ) ) continue;
            if ( $to_obj == '__any__' ) $to_obj = null;
            $rel_objs = $this->get_relations( $obj, $to_obj, $name );
            $relation_vars = [];
            if (! empty( $rel_objs ) ) {
                if (! $to_obj ) {
                    $first = $rel_objs[0];
                    $to_obj = $first->to_obj;
                }
                $rel_table = $this->get_table( $to_obj );
                if (! $rel_table ) continue;
                $prop = $edit_properties[ $name ] ?? null;
                if (! $prop ) {
                    continue;
                }
                $props = explode( ':', $prop );
                $rel_col = isset( $props[2] ) ? $props[2] : 'null';
                if ( $rel_col === '__primary__' || !$rel_col || $rel_col == 'null' ) {
                    $rel_col = $rel_table->primary;
                }
                $rel_ids = [];
                foreach ( $rel_objs as $rel_obj ) {
                    $rel_ids[] = (int) $rel_obj->to_id;
                }
                foreach ( $rel_objs as $rel_obj ) {
                    $to_id = (int) $rel_obj->to_id;
                    $rel_required = $required == null ? '*' : ['id', $rel_col ];
                    if ( $this->db->model( $to_obj )->has_column( 'workspace_id' )
                        && is_array( $rel_required ) ) {
                        $rel_required[] = 'workspace_id';
                    }
                    $rel_terms = ['id' => $to_id ];
                    $rel_obj = $this->db->model( $to_obj );
                    $permitted_objs = false;
                    if ( $this->api_permitted_objs && $rel_obj->has_column( 'status' ) ) {
                        if ( $user ) {
                            if ( $rel_obj->has_column( 'workspace_id' ) ) {
                                $max_status = $this->max_status( $user, $to_obj, $this->workspace_id );
                            } else {
                                $max_status = $this->max_status( $user, $to_obj, 0 );
                            }
                            $rel_terms['status'] = ['<=' => $max_status ];
                            $permitted_objs = !$user->is_superuser;
                        } else {
                            $status_published = $this->status_published( $to_obj );
                            $rel_terms['status'] = $status_published;
                        }
                    }
                    $rel_obj = $this->db->model( $to_obj )->load( $rel_terms, null, $rel_required );
                    $rel_obj = empty( $rel_obj ) ? null : $rel_obj[0];
                    if ( $permitted_objs && $rel_obj && !$this->can_do( $to_obj, 'edit', $rel_obj ) ) {
                        $rel_obj = null;
                    }
                    if ( $rel_obj ) {
                        if (! $recursive ) {
                            $rel_required = $required == null ? null : ['id', $rel_col, 'Permalink', 'Thumbnail', 'Path'];
                            if ( $this->db->model( $to_obj )->has_column( 'workspace_id' )
                                && is_array( $rel_required ) ) {
                                $rel_required[] = 'workspace_id';
                            }
                            $relation_vars[] = $this->object_to_resource( $rel_obj, $rel_required, 1 );
                        } else {
                            $rel_value = $rel_obj->$rel_col;
                            $relation_vars[] = $rel_value;
                        }
                    }
                }
            }
            $vars[ $name ] = $relation_vars;
        }
        foreach( $column_defs as $column => $props ) {
            if ( array_key_exists( $column, $vars ) ) {
                if ( $column == 'status' && $this->api_status_text ) {
                    $values[ $column ] = $this->status_text( $vars[ $column ], $obj->_model );
                } else if ( strpos( $props['type'], 'int' ) !== false &&
                    !is_array( $vars[ $column ] ) && ctype_digit( (string) $vars[ $column ] ) ) {
                    $values[ $column ] = (int)$vars[ $column ];
                } else {
                    $values[ $column ] = $vars[ $column ];
                }
            } else if ( $props['type'] == 'blob'
                && (! $required || in_array( 'Fields', $required ) || in_array( 'Thumbnail', $required ) ) ) {
                $urlinfo = $this->db->model( 'urlinfo' )->get_by_key( ['object_id' => $obj->id,
                                                                       'model' => $obj->_model,
                                                                       'key' => $column,
                                                                       'class' => 'file',
                                                                       'delete_flag' => ['IN' => [0, 1] ] ],
                                                                      ['sort' => 'delete_flag',
                                                                       'direction' => 'ascend'] );
                $label = null;
                $meta = $this->db->model( 'meta' )->get_by_key(
                    ['model' => $obj->_model, 'object_id' => $obj->id,
                     'kind' => 'metadata', 'key' => $column ], null, ['id', 'text'] );
                $meta_vars = null;
                if ( $urlinfo->id && strpos( $urlinfo->mime_type, 'image' ) === 0 ) {
                    if ( $meta->id ) {
                        if ( $this->assets_c ) {
                            $meta_vars = json_decode( $meta->text, true );
                            if ( $meta_vars !== false ) {
                                if ( isset( $meta_vars['label'] ) ) {
                                    $label = $meta_vars['label'];
                                }
                                if (! $has_thumb ) {
                                    $thumb_model = $obj->_model;
                                    $asset_id = $obj->id;
                                    $file_ext = $meta_vars['extension'];
                                    $thumb = "thumb-{$thumb_model}-128xauto-square-{$asset_id}-{$column}.{$file_ext}";
                                    $thumb_path = $this->assets_c . DS . $thumb;
                                    if ( file_exists( $thumb_path ) ) {
                                        $has_thumb = $assets_c_path ? $assets_c_path . $thumb
                                                                     : $this->base . $this->path . $thumb_path;
                                    }
                                }
                            }
                        } else {
                            if ( $user ) {
                                $has_thumb = $admin_url . '?__mode=get_thumbnail&id=' . $meta->id;
                            }
                        }
                    }
                }
                if ( $meta->id ) {
                    $value = ['Url' => $urlinfo->url, 'Label' => $label ];
                    $meta_vars = is_array( $meta_vars ) ? $meta_vars : json_decode( $meta->text, true );
                    unset( $meta_vars['basename'], $meta_vars['file_name'], $meta_vars['label'] );
                    if ( isset( $meta_vars['user_id'] ) ) {
                        $meta_vars['user_id'] = (int) $meta_vars['user_id'];
                    }
                    $value['Metadata'] = $meta_vars;
                    $values[ $column ] = $value;
                } else {
                    $values[ $column ] = null;
                }
            }
        }
        $vars = $values;
        if (! $required || ( $required && ( in_array( 'Fields', $required ) || in_array( 'Meta', $required ) ) ) ) {
            $metaObjs = $this->db->model( 'meta' )->load(
                ['object_id' => $obj->id, 'model' => $obj->_model, 'kind' => ['!=' => 'metadata'] ], null,
                 'type,name,key,kind,value,text,field_id,number' );
            if ( count( $metaObjs ) ) {
                $fields = [];
                $metadata = [];
                foreach ( $metaObjs as $meta ) {
                    if ( $meta->kind == 'customfield' ) {
                        if (! $required || ( $required && in_array( 'Fields', $required ) ) ) {
                            $field_id = $meta->field_id;
                            $meta = $meta->get_values( true );
                            unset( $meta['field_id'] );
                            $field = $this->db->model( 'field' )->load( (int) $field_id, null, 'basename' );
                            if (! $field ) {
                                continue;
                            }
                            $meta['field_basename'] = $field->basename;
                            if ( $meta['text'] ) {
                                $text = json_decode( $meta['text'], true );
                                $meta['json'] = $text;
                            }
                            unset( $meta['text'] );
                            $fields[] = $meta;
                        }
                    } else {
                        if (! $required || ( $required && in_array( 'Meta', $required ) ) ) {
                            if ( $obj->_model == 'asset' && $meta->kind == 'thumbnail' ) {
                                continue;
                            }
                            $meta = $meta->get_values( true );
                            unset( $meta['field_id'] );
                            $metadata[] = $meta;
                        }
                    }
                }
                if (! empty( $fields ) ) {
                    $vars['Fields'] = $fields;
                }
                if (! empty( $metadata ) ) {
                    $vars['Meta'] = $metadata;
                }
            }
        }
        if (! $required || ( $required && in_array( 'Permalink', $required ) ) ) {
            if ( $permalink = $this->get_permalink( $obj ) ) {
                $vars['Permalink'] = $permalink;
            }
        }
        if ( isset( $scheme['hierarchy'] ) && $scheme['hierarchy'] ) {
            if (! $required || ( $required && in_array( 'Path', $required ) ) ) {
                $args = ['this_tag' => $obj->_model . 'path'];
                $ctx = clone $this->ctx;
                $ctx->stash( 'current_context', $obj->_model );
                $ctx->stash( $obj->_model, $obj );
                $vars['Path'] = $this->core_tags->hdlr_get_objectpath( $args, $ctx );
            }
        }
        if ( $has_thumb && (! $required || ( $required && in_array( 'Thumbnail', $required ) ) ) ) {
            $vars['Thumbnail'] = $has_thumb;
        }
        $callback = ['name' => 'generate_resource', 'model' => $obj->_model ];
        $this->run_callbacks( $callback, 'restfulapi', $vars );
        return $vars;
    }

    function object_from_resource ( $json ) {
        $model = $this->model;
        $table = $this->table;
        $plural = strtolower( $table->plural );
        $scheme = $this->get_scheme_from_db( $model );
        $obj = $this->db->model( $model );
        $column_defs = $scheme['column_defs'];
        $edit_properties = $scheme['edit_properties'] ?? [];
        $relations = $scheme['relations'] ?? [];
        $blob_cols = $this->db->get_blob_cols( $model, true );
        $ts = date( 'Y-m-d_H-i-s' );
        $this->upload_dir = $this->upload_dir();
        $csv_out  = $this->upload_dir . DS . "{$plural}-{$ts}.csv";
        $json_out = $this->upload_dir . DS . "{$plural}-{$ts}.json";
        $fmgr = $this->fmgr;
        $workspace_id = $json['workspace_id'] ?? $this->workspace_id;
        if ( $obj->has_column( 'workspace_id' ) ) {
            if ( $workspace_id && ( ctype_digit( (string) $workspace_id ) || is_numeric( $workspace_id ) ) ) {
                $workspace_id = (int) $workspace_id;
            } else if ( is_array( $workspace_id ) ) {
                $workspace_id = $workspace_id['id'] ?? 0;
            }
            if ( $this->workspace_id != $workspace_id ) {
                $this->json_error( 'Invalid workspace_id specified.', 403 );
            }
        }
        $import_files  = [];
        $detach_assets = [];
        $detach_files  = [];
        $detach_single  = [];
        $metadata = $json['Meta'] ?? [];
        foreach ( $json as $column => $value ) {
            if ( $obj->has_column( $column, true ) ) {
                if (! is_array( $value ) ) {
                    if ( $column_defs[ $column ]['type'] == 'datetime' ) {
                        if ( $value ) {
                            $value = $obj->db2ts( $value );
                            if (! $this->is_valid_ts( $value, $error ) ) {
                                unset( $json[ $column ] );
                                continue;
                            }
                            if ( $value ) {
                                $value = date( DATE_ATOM, strtotime( $value ) );
                                list( $value, $tz ) = explode( '+', $value );
                                $json[ $column ] = $value;
                            }
                        }
                    }
                } else {
                    if ( in_array( $column, $blob_cols ) && isset( $value['Data'] ) ) {
                        $line = $this->set_import_files( $value, $import_files );
                        if ( $line ) {
                            $json[ $column ] = $line;
                        } else {
                            $json[ $column ] = '';
                        }
                    } else if ( in_array( $column, $blob_cols ) ){
                        unset( $json[ $column ] );
                    } else {
                        if ( $this->model == 'user' && $column == 'is_superuser' ) {
                            if (! $user ) {
                                unset( $json[ $column ] );
                                continue;
                            } else if (! $user->is_superuser ) {
                                unset( $json[ $column ] );
                                continue;
                            }
                        }
                        if ( $column_defs[ $column ]['type'] == 'int' ) {
                            $id = $value['id'] ?? null;
                            $edit_prop = $edit_properties[ $column ] ?? null;
                            if ( $edit_prop && strpos( $edit_prop, ':' ) !== false ) {
                                $edit_props = explode( ':', $edit_prop );
                                $rel_model = $edit_props[1] ?? null;
                                if ( $rel_model == 'attachmentfile' && is_array( $value ) ) {
                                    if ( isset( $value['file'] ) && isset( $value['file']['Data'] ) ) {
                                        $line = $this->set_import_files( $value['file'], $import_files );
                                        if ( $line ) {
                                            $json[ $column ] = $line;
                                        } else {
                                            unset( $json[ $column ] );
                                        }
                                    } else if ( isset( $value['Detach'] ) && $value['Detach'] ) {
                                        if ( $this->object_id ) {
                                            $_obj = $this->db->model( $model )->load( $this->object_id, null, $column );
                                            if ( $_obj->$column ) {
                                                $detach_single[ $column ] = (int) $_obj->$column;
                                            }
                                            $json[ $column ] = null;
                                        } else {
                                            $json[ $column ] = null;
                                        }
                                    }
                                    continue;
                                }
                                if (! $rel_model ) {
                                    unset( $json[ $column ] );
                                    continue;
                                }
                                $rel_table = $this->get_table( $rel_model );
                                if (! $rel_table ) {
                                    unset( $json[ $column ] );
                                    continue;
                                }
                                $primary = $rel_table->primary;
                                if (! $primary || !isset( $value[ $primary ] ) || !$value[ $primary ] ) {
                                    unset( $json[ $column ] );
                                    continue;
                                }
                                $primary_value = $value[ $primary ] ?? null;
                                $rel_terms = [ $primary => $primary_value ];
                                if ( $this->db->model( $rel_model )->has_column( 'workspace_id' ) ) {
                                    $rel_terms['workspace_id'] = $workspace_id;
                                }
                                if ( $this->db->model( $rel_model )->has_column( 'rev_type' ) ) {
                                    $rel_terms['rev_type'] = 0;
                                }
                                $rel_obj = $this->db->model( $rel_model )->get_by_key( $rel_terms, null, 'id' );
                                if ( $rel_obj->id ) {
                                    $json[ $column ] = (int) $rel_obj->id ;
                                } else {
                                    unset( $json[ $column ] );
                                    continue;
                                }
                            } else if ( $id && ( ctype_digit( (string) $id ) || is_numeric( $id ) ) ) {
                                $json[ $column ] = (int) $id;
                                continue;
                            }
                        } else {
                            unset( $json[ $column ] );
                            continue;
                        }
                    }
                }
            } else if ( isset( $relations[ $column ] ) ) {
                $rel_model = $relations[ $column ];
                if ( $rel_model == 'asset' || $rel_model == 'attachmentfile' && is_array( $value ) ) {
                    $assets = [];
                    foreach ( $value as $asset ) {
                        if ( isset( $asset['file'] ) && isset( $asset['file']['Data'] )
                            && $asset['file']['Data'] ) {
                            if ( isset( $asset['file']['Path'] ) && strpos( $asset['file']['Path'], '%r/' ) === 0 ) {
                                $dirname = dirname( $asset['file']['Path'] );
                                $dirname = preg_replace( '!^%r/!', '', $dirname );
                                $basename = basename( $asset['file']['Path'] );
                                $dirname = $this->sanitize_dir( $dirname );
                                $basename = $this->sanitize_file( $basename );
                                $asset['file']['Path'] = '%r/' . $dirname . $basename;
                            } else {
                                $extra_path = $asset['extra_path'] ?? '';
                                if ( isset( $asset['file_name'] ) ) {
                                    $extra_path = $this->sanitize_dir( $extra_path );
                                    $path = '%r/' . $extra_path . $this->sanitize_file( $asset['file_name'] );
                                    $asset['file']['Path'] = $path;
                                }
                            }
                            $line = $this->set_import_files( $asset['file'], $import_files );
                            if ( $line ) {
                                $assets[] = $line;
                            }
                        } else if ( isset( $asset['Detach'] ) && $asset['Detach']
                            && isset( $asset['id'] ) && $this->object_id ) {
                            if ( $rel_model == 'asset' ) {
                                $detach_assets[ $column ][] = (int) $asset['id'];
                            } else {
                                $detach_files[ $column ][] = (int) $asset['id'];
                            }
                        } else if ( isset( $asset['id'] ) && $rel_model == 'asset' ) {
                            $id = $asset['id'];
                            if ( $id ) {
                                $assets[] = "id={$id}";
                            }
                        }
                    }
                    if (! empty( $assets ) ) {
                        $json[ $column ] = implode( ',', $assets );
                    } else {
                        unset( $json[ $column ] );
                    }
                } else {
                    $rel_table = $this->get_table( $rel_model );
                    if (! $rel_table ) {
                        unset( $json[ $column ] );
                        continue;
                    }
                    $rel_objs = [];
                    if ( is_array( $value ) ) {
                        foreach ( $value as $rel_obj ) {
                            if (!is_array( $rel_obj ) ) continue;
                            $id = $rel_obj['id'] ?? null;
                            if ( $id ) {
                                $rel_objs[] = "id={$id}";
                                continue;
                            }
                            if (! $id && $rel_table->hierarchy
                                && isset( $rel_obj['Path'] ) && $rel_obj['Path'] ) {
                                $path = $rel_obj['Path'];
                                $rel_objs[] = $path;
                                continue;
                            }
                            $primary = $rel_table->primary;
                            if ( $primary && isset( $rel_obj[ $primary ] ) ) {
                                $rel_objs[] = $rel_obj[ $primary ];
                            }
                        }
                    }
                    if (! empty( $rel_objs ) ) {
                        $json[ $column ] = implode( ',', $rel_objs );
                    } else {
                        unset( $json[ $column ] );
                    }
                }
            } else if ( $column == 'Fields' && is_array( $value ) ) {
                continue;
            } else {
                unset( $json[ $column ] );
            }
        }
        $fields = null;
        foreach ( $json as $column => $value ) {
            if ( $column == 'Fields' && is_array( $value ) ) {
                if (! empty( $value ) ) {
                    $export_uuid = $this->generate_uuid();
                    $json['export_uuid'] = $export_uuid;
                    foreach ( $value as $idx => $field_value ) {
                        $add_values = [];
                        if (! isset( $field_value['model'] ) ) {
                            $add_values['model'] = $model;
                        }
                        if (! isset( $field_value['kind'] ) ) {
                            $add_values['kind'] = 'customfield';
                        }
                        if ( isset( $field_value['value'] ) && $field_value['value'] ) {
                            if ( isset( $field_value['text'] ) && $field_value['text']
                                && is_array( $field_value['text'] ) && count( $field_value['text'] ) === 1 ) {
                                unset( $field_value['text'] );
                            }
                        }
                        if ( isset( $field_value['json'] ) ) {
                            $field_value['text'] = $field_value['json'];
                            unset( $field_value['json'] );
                        }
                        $value[ $idx ] = array_merge( $add_values, $field_value );
                    }
                    $fields = [ $export_uuid => $value ];
                }
                unset( $json[ $column ] );
            } else {
                $json["{$model}_{$column}"] = $value;
                unset( $json[ $column ] );
            }
        }
        if (! empty( $json ) ) {
            try {
                if (! empty( $fields ) ) {
                    $fmgr->put( $json_out, json_encode( $fields, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
                    $import_files[] = $json_out;
                }
                foreach ( $json as $key => $value ) {
                    if ( is_array( $value ) ) {
                        unset( $json[ $key ] ); // Array to string conversion.
                    }
                }
                if ( $obj->has_column( 'workspace_id' ) && $this->workspace_id ) {
                    if (! isset( $json["{$model}_workspace_id"] ) ) {
                        $json["{$model}_workspace_id"] = $this->workspace_id;
                    } else if (! $json["{$model}_workspace_id"] ) {
                        $json["{$model}_workspace_id"] = $this->workspace_id;
                    }
                }
                $fp = fopen( $csv_out, 'w' );
                fputcsv( $fp, array_keys( $json ), ',', '"' );
                fputcsv( $fp, array_values( $json ), ',', '"' );
                fclose( $fp );
                $import_files[] = $csv_out;
                $import_files = array_reverse( $import_files );
                $importer = new PTImporter();
                $importer->print_state = false;
                $objs = $importer->import_from_files( $this, $model, $this->upload_dir, $import_files );
                if ( is_array( $objs ) && !empty( $objs ) ) {
                    $obj = $objs[0];
                    if (! empty( $detach_assets ) ) {
                        foreach ( $detach_assets as $colName => $ids ) {
                            $relations = $this->db->model( 'relation' )->load(
                                ['from_obj' => $obj->_model, 'from_id' => $obj->id,
                                 'to_obj' => 'asset', 'to_id' => ['IN' => $ids ],
                                 'name' => $colName ], null, 'id' );
                            if (! empty( $relations ) ) {
                                $this->db->model( 'relation' )->remove_multi( $relations );
                            }
                        }
                    }
                    if (! empty( $detach_files ) ) {
                        foreach ( $detach_files as $colName => $ids ) {
                            $relations = $this->db->model( 'relation' )->load(
                                ['from_obj' => $obj->_model, 'from_id' => $obj->id,
                                 'to_obj' => 'attachmentfile', 'to_id' => ['IN' => $ids ],
                                 'name' => $colName ], null, 'id,to_id' );
                            if (! empty( $relations ) ) {
                                foreach ( $relations as $relation ) {
                                    $remove = $this->db->model( 'attachmentfile' )->load( (int) $relation->to_id );
                                    if ( is_object( $remove ) ) {
                                        $clone = clone $remove;
                                        $remove->status( 0 );
                                        $this->publish_obj( $remove, $clone, false, true );
                                        $this->remove_object( $remove );
                                        $remove->remove();
                                    }
                                }
                                $this->db->model( 'relation' )->remove_multi( $relations );
                            }
                        }
                    }
                    if (! empty( $detach_single ) ) {
                        foreach ( $detach_single as $colName => $id ) {
                            $remove = $this->db->model( 'attachmentfile' )->load( (int) $id );
                            if ( is_object( $remove ) ) {
                                $clone = clone $remove;
                                $remove->status( 0 );
                                $this->publish_obj( $remove, $clone, false, true );
                                $this->remove_object( $remove );
                                $remove->remove();
                            }
                            $obj->$colName('');
                        }
                    }
                    if (! empty( $metadata ) ) {
                        foreach ( $metadata as $meta ) {
                            $terms = ['model' => $obj->_model, 'object_id' => $obj->id ];
                            if ( isset( $meta['type'] ) ) {
                                $terms['type'] = $meta['type'];
                            }
                            if ( isset( $meta['key'] ) ) {
                                $terms['key'] = $meta['key'];
                            }
                            if ( isset( $meta['kind'] ) ) {
                                $terms['kind'] = $meta['kind'];
                            }
                            $metaObj = $this->db->model( 'meta' )->get_by_key( $terms );
                            $metaObj->set_values( $meta );
                            $metaObj->save();
                        }
                    }
                    return $obj;
                }
            } catch ( Exception $e ) {
                $this->json_error( 'An error occurred while save object(%s).', $e->getMessage(), 500 );
            }
        }
        $this->json_error( 'The resource object is empty.', 400 );
    }

    function set_import_files ( $value, &$import_files = [] ) {
        $line = false;
        $data = $value['Data'];
        if ( strpos( $data, ';base64,' ) !== false ) {
            $label = $value['Label'] ?? null;
            $path = $value['Path'] ?? null;
            list ( $mime_type, $data ) = explode( ';base64,', $data );
            $mime_type = preg_replace( '/^data:/', '', $mime_type );
            $extension = PTUtil::extension_from_mime_type( $mime_type );
            if ( $path && strpos( $path, '%r/' ) === 0 ) {
                $line = $path;
                $path = preg_replace( '!^%r/!', '/', $path );
            } else {
                $path = '/' . 'assets' . '/' . $this->magic() . ".{$extension}";
                $line = '%r' . $path;
            }
            if (! $this->asset_overwrite && ! isset( $value['Overwrite'] )
                || ( isset( $value['Overwrite'] ) && ! $value['Overwrite'] ) ) {
                $site_path = $this->workspace ? $this->workspace->site_path : $this->site_path;
                $asset_path = preg_replace( '!^%r!', $site_path, $line );
                $url = $this->db->model( 'urlinfo' )->get_by_key(
                  ['file_path' => $asset_path, 'delete_flag' => [0, 1] ] );
                if ( $url->id ) {
                    $_extension = preg_quote( $extension, '/' );
                    $basename = preg_replace( "/\.{$_extension}$/", '', $asset_path );
                    $i = 0;
                    $unique = false;
                    while ( $unique === false ) {
                        $rename = $i ? "{$basename}-{$i}.{$extension}" : "{$basename}.{$extension}";
                        $exists = $this->db->model( 'urlinfo' )->load(
                            ['file_path' => $rename, 'delete_flag' => [0, 1] ], ['limit' => 1], 'id' );
                        if ( is_array( $exists ) && count( $exists ) ) {
                        } else {
                            $unique = true;
                            $asset_path = $rename;
                            $site_path = preg_quote( $site_path, '/' );
                            $line = preg_replace( "/^{$site_path}/", '%r', $asset_path );
                            break;
                        }
                        $i++;
                    }
                    $basename = preg_quote( basename( $path ), '/' );
                    $path = preg_replace( "/{$basename}$/", basename( $asset_path ), $path );
                }
            }
            $_extension = PTUtil::get_extension( $path, true );
            if ( $extension != $_extension ) {
                $_extension = preg_quote( $_extension, '/' );
                $path = preg_replace( "/\.{$_extension}$/", ".{$extension}", $path );
            }
            $path = $this->upload_dir . $path;
            $data = base64_decode( $data );
            if ( $data === false ) {
                return false;
            }
            $this->fmgr->put( $path, $data );
            unset( $data );
            $import_files[] = $path;
            if ( $label ) {
                $line .= ";$label";
            }
        }
        return $line;
    }

    function setup_cols ( &$args = [] ) {
        $columns = $this->param( 'cols' ) ? $this->param( 'cols' ) : null;
        if ( $columns ) {
            $db_model = $this->db->model( $this->model );
            $columns_arr = explode( ',', $columns );
            $columns = $columns_arr;
            foreach ( $columns_arr as $idx => $column ) {
                if (! $db_model->has_column( $column ) ) {
                    unset( $columns_arr[ $idx ] );
                }
            }
            if (! empty( $columns_arr ) ) {
                $args['cols'] = $columns_arr;
            }
        } else {
            // Exclude binary columns.
            $blob_cols = $this->db->get_blob_cols( $this->model, true );
            if (! empty( $blob_cols ) && isset( $this->db->scheme[ $this->model ] ) ) {
                $columns_arr = array_keys( $this->db->scheme[ $this->model ]['column_defs'] );
                foreach ( $columns_arr as $idx => $column ) {
                    if ( in_array( $column, $blob_cols ) ) {
                        unset( $columns_arr[ $idx ] );
                    }
                    // $columns = $columns_arr; // include object_to_resource
                    $args['cols'] = $columns_arr;
                }
            }
        }
        return $columns;
    }

    function method_exists ( $app, $name ) {
        return in_array( $name, $app->methods );
    }

    function core_save_callbacks ( $model = null ) {
        $model = $model ? $model : $this->model;
        parent::core_save_callbacks( $model );
    }

    function core_delete_callbacks ( $model = null ) {
        $model = $model ? $model : $this->model;
        parent::core_delete_callbacks( $model );
    }

    function pre_listing ( &$cb, $app, &$terms, &$args, &$extra = '', &$placeholders = [] ) {
        $q = $this->param( 'phrase' );
        if ( $app->do_pre_listing ) {
            return true;
        }
        if ( !$q || $app->user() ) {
            return parent::pre_listing( $cb, $app, $terms, $args, $extra, $placeholders );
        }
        $app->do_pre_listing = true;
        $model = $this->model;
        foreach ( $terms as $col => $value ) {
            $extra .= " AND {$model}_$col = ? ";
            $placeholders[] = $value;
        }
        $terms = [];
        $db = $app->db;
        $obj = $db->model( $model );
        $args['and_or'] = 'or';
        $q = trim( $q );
        $q = mb_convert_kana( $q, 's', $this->encoding );
        $type = $this->param( 'search_type' );
        $cols = $this->param( 'search_cols' );
        $excludes = ['rev_changed', 'rev_diff', 'text_format'];
        if (! $app->user() ) {
            $excludes[] = 'rev_note';
            $excludes[] = 'status';
            $excludes[] = 'rev_type';
        }
        if (! $cols ) {
            $cols = [];
            $scheme = $app->get_scheme_from_db( $this->model );
            $scheme = $scheme['column_defs'];
            foreach ( $scheme as $col => $props ) {
                if ( in_array( $col, $excludes ) || $col == 'uuid' ) {
                    continue;
                }
                $colType = $props['type'];
                if ( strpos( $colType, 'string' ) === 0 || $colType == 'text' ) {
                    $cols[] = $col;
                }
            }
        } else {
            if (! is_array( $cols ) ) {
                $cols = preg_split( '/\s*,\s*/', $cols );
            }
        }
        if (! $app->user() ) {
            foreach ( $cols as $idx => $col ) {
                if ( in_array( $col, $excludes ) ) {
                    unset( $cols[ $idx ] );
                }
            }
        }
        foreach ( $cols as $idx => $col ) {
            if (! $obj->has_column( $col, true ) ) {
                unset( $cols[ $idx ] );
            }
        }
        if ( empty( $cols ) ) {
            $terms['id'] = 0; // No object found.
            return true;
        }
        if ( $type != 'phrase' && $type != 'or' && $type != 'and' ) {
            $type = 'phrase';
        }
        if ( $type != 'phrase' ) {
            $qs = preg_split( "/\s+/", $q );
            $conditions = [];
            $counter = 0;
            if ( count( $qs ) > 1 ) {
                foreach ( $qs as $s ) {
                    $s = $app->db->escape_like( $s, 1, 1 );
                    if (!$counter ) {
                        $conditions[] = ['LIKE' => $s ];
                    } else {
                        $conditions[] = ['LIKE' => [ $type => $s ] ];
                    }
                    $counter++;
                }
            } else {
                $conditions = ['LIKE' => $db->escape_like( $q, 1, 1 ) ];
            }
        } else {
            $conditions = ['LIKE' => $db->escape_like( $q, 1, 1 ) ];
        }
        foreach ( $cols as $col ) {
            $terms[ $col ] = $conditions;
        }
        return parent::pre_listing( $cb, $app, $terms, $args, $extra, $placeholders );
    }

    function tags ( $json ) {
        $tags = [];
        if ( $this->table->taggable && isset( $json['tags'] )
            && is_array( $json['tags'] ) && !empty( $json['tags'] ) ) {
            $tags = $json['tags'];
            foreach ( $tags as $idx => $tag ) {
                if ( isset( $tag['name'] ) && $tag['name'] ) {
                    $tags[ $idx ] = PTUtil::normalize( $tag['name'] );
                } else {
                    unset( $tags[ $idx ] );
                }
            }
        }
        return $tags;
    }

    function next_user ( &$json ) {
        $user = $this->user();
        $obj = $this->db->model( $this->model )->__new();
        $workflow = $json['Workflow'] ?? null;
        if (! $workflow ) {
            return;
        } else if ( $workflow != 'approval' && $workflow != 'remand' ) {
            return;
        }
        $workflowObj = $this->stash( 'workflow' ) ? $this->stash( 'workflow' )
                     : $this->db->model( 'workflow' )->get_by_key(
                      ['workspace_id' => $this->workspace_id, 'model' => $this->model ] );
        if (! $workflowObj->id ) {
            return;
        }
        if ( $obj->has_column( 'user_id' ) && isset( $json['user_id'] ) ) {
            $user_id = is_array( $json['user_id'] ) && isset( $json['user_id']['id'] )
                     ?  $json['user_id']['id'] : (int) $json['user_id'];
            if ( $user_id == $user->id ) {
                return;
            }
            $to_user = null;
            $next_user = $this->db->model( 'user' )->load( $user_id );
            if (! $next_user ) {
                return;
            }
            $match_user = false;
            $allUsers = PTUtil::workflow_users( $workflowObj );
            if ( $workflowObj->approval_type == 'Serial' ) {
                foreach ( $allUsers as $idx => $wf_user ) {
                    if ( $wf_user->id == $user->id ) {
                        if ( $workflow == 'approval' ) {
                            $to_user = $allUsers[ $idx + 1 ] ?? null;
                        } else {
                            $to_user = $allUsers[ $idx - 1 ] ?? null;
                        }
                        if ( $to_user->id != $user_id ) {
                            $to_user = null;
                        }
                        $match_user = true;
                        break;
                    }
                }
            } else {
                foreach ( $allUsers as $idx => $wf_user ) {
                    if ( $wf_user->id == $user->id ) {
                        if ( $workflow == 'approval' ) {
                            $limit = count( $allUsers ) - $idx - 1;
                            $allUsers = array_slice( $allUsers, $idx + 1, $limit );
                        } else {
                            $allUsers = array_slice( $allUsers, 0, $idx );
                        }
                        $match_user = true;
                        break;
                    }
                }
                foreach ( $allUsers as $wf_user ) {
                    if ( $wf_user->id == $user_id ) {
                        $to_user = $wf_user;
                        break;
                    }
                }
            }
            if ( $to_user && $match_user ) {
                $_POST['__workflow_type'] = $workflow == 'approval' ? 2 : 1;
                $_POST['__workflow_message'] = $json['Message'] ?? null;
                $_POST["__workflow_{$workflow}"] = $to_user->id;
                unset( $json['Message'] );
                $json['user_id'] = $user->id;
                $this->register_callback( $this->model, 'post_save', 'workflow_post_save', 1, $this );
                $this->stash( 'workflow', $workflowObj );
                return $to_user;
            }
        }
    }

    function start_contact ( &$json = [] ) {
        if ( $this->request_method !== 'POST' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        }
        if ( $this->model != 'contact' ) {
            $this->json_error( "Method '%s' is not supported.", 'token', 405 );
        }
        if (! $this->object_id ) {
            $this->json_error( 'The %s was not found.', 'form', 404 );
        }
        $form = $this->db->model( 'form' )->get_by_key( ['id' => $this->object_id, 'workspace_id' => $this->workspace_id ] );
        if (! $form->id ) {
            $this->json_error( 'The %s was not found.', 'form', 404 );
        }
        // JSON to $_FILES.
        $question_type = $this->db->model( 'questiontype' )->get_by_key( ['basename' => 'file'], null, 'id' );
        $question_files = [];
        $questions = $this->get_related_objs( $form, 'question' );
        $basenames = [];
        foreach ( $questions as $question ) {
            $basenames[ $question->basename ] = true;
            if ( $question->questiontype_id == $question_type->id ) {
                $question_files[] = $question;
            }
        }
        if ( $this->method !== 'token' ) {
            $json = file_get_contents( 'php://input' );
            if ( !$json && $this->api_debug && $this->api_debug_json_path
                && file_exists( $this->api_debug_json_path ) ) {
                $json = file_get_contents( $this->api_debug_json_path );
            }
            if ( $json ) {
                $json = json_decode( $json, true );
                if ( $json === null || !is_array( $json ) ) {
                    $this->json_error( 'Invalid request.', 400 );
                }
            }
            if ( is_array( $json ) ) {
                $_POST['form_id'] = $form->id;
                $_POST['_type'] = 'form';
                $_POST['magic_token'] = $json['MagicToken'] ?? null;
                $permalink = $json['Permalink'] ?? null;
                unset( $json['MagicToken'], $json['Permalink'] );
                if ( $permalink ) {
                    $url = $this->db->model( 'urlinfo' )->get_by_key( ['url' => $permalink ] );
                    if (! $url->id ) {
                        $this->json_error( 'The %s was not found.', 'form', 404 );
                    }
                    $_POST['object_id'] = (int) $url->object_id;
                    $_POST['model'] = $url->model;
                    $form->_url = $url;
                }
                foreach ( $json as $key => $value ) {
                    if ( $key === 'Identifier' ) {
                        $_POST['_identifier'] = $value;
                    } else if ( $key === 'Language' ) {
                        $_POST['_language'] = $value;
                        $this->language = $value;
                    } else if ( $key === 'ObjectId' && !$permalink && isset( $json['Model'] ) ) {
                        $_POST['object_id'] = $value;
                    } else if ( $key === 'Model' && !$permalink && isset( $json['ObjectId'] ) ) {
                        $_POST['model'] = $value;
                    } else {
                        if ( $key == 'attachmentfiles' ) {
                            foreach ( $value as $file ) {
                                $basename = $file['basename'] ?? null;
                                if (! isset( $basenames[ $basename ] ) && strpos( $basename, 'question_' ) === 0 ) {
                                    $basename = preg_replace( '/^question_/', '', $basename );
                                }
                                if (! isset( $basenames[ $basename ] ) ) {
                                    continue;
                                }
                                $name = $file['name'] ?? null;
                                $data = $file['file']['Data'] ?? null;
                                if (! $basename || ! $name || ! $data ) {
                                    continue;
                                }
                                if ( strpos( $data, ';base64,' ) !== false ) {
                                    list ( $mime_type, $data ) = explode( ';base64,', $data );
                                    $tmp_dir = $this->upload_dir();
                                    $data = base64_decode( $data );
                                    if ( $data === false ) {
                                        continue;
                                    }
                                    $tmp_name = $tmp_dir . DS . $this->magic();
                                    $tmp_name = $tmp_dir . DS . $name;
                                    $this->fmgr->put( $tmp_name, $data );
                                    $mime_type = preg_replace( '/^data:/', '', $mime_type );
                                    $resource = ['name' => $name, 'type' => $mime_type, 'tmp_name' => $tmp_name,
                                                 'error' => 0, 'size' => filesize( $tmp_name ) ];
                                    $_FILES["question_{$basename}"] = $resource;
                                    if ( $this->method == 'submit' && $magic_token = $this->param( 'magic_token' ) ) {
                                        $sess = $this->db->model( 'session' )->get_by_key(
                                            ['name' => "{$magic_token}-{$basename}", 'kind' => 'UP', 'workspace_id' => $this->workspace_id ] );
                                        if (! $sess->id ) {
                                            $fileError = null;
                                            $metadata = PTUtil::get_upload_info( $this, $tmp_name, $fileError );
                                            if (! $fileError ) {
                                                $thumbnail_small = isset( $metadata['thumbnail_small'] )
                                                                 ? $metadata['thumbnail_small']
                                                                 : '';
                                                $thumbnail_square= isset( $metadata['thumbnail_square'] )
                                                                 ? $metadata['thumbnail_square']
                                                                 : '';
                                                if ( $thumbnail_small ) {
                                                    $sess->extradata( file_get_contents( $thumbnail_small ) );
                                                }
                                                if ( $thumbnail_square ) {
                                                    $sess->metadata( file_get_contents( $thumbnail_square ) );
                                                }
                                                $metadata = $metadata['metadata'];
                                                $sess->text( json_encode( $metadata ) );
                                                $sess->data( $data );
                                                $sess->value( $name );
                                                $sess->key( $mime_type );
                                                $sess->start( $this->request_time );
                                                $form_expires = $form->token_expires
                                                              ? $form->token_expires : $this->form_expires;
                                                $sess->expires( $this->request_time + $form_expires );
                                                $sess->save();
                                            } else {
                                                $this->json_error( 'An error occurred while check upload file(%s).', $fileError, 500 );
                                            }
                                        }
                                    }
                                    unset( $data );
                                }
                            }
                        } else {
                            if (! isset( $basenames[ $key ] ) && strpos( $key, 'question_' ) === 0 ) {
                                $key = preg_replace( '/^question_/', '', $key );
                            }
                            if (! isset( $basenames[ $key ] ) ) {
                                continue;
                            }
                            $_POST["question_{$key}"] = $value;
                        }
                    }
                }
            }
        }
        $_POST['object_id'] = $_POST['object_id'] ?? $form->id;
        $_POST['model'] = $_POST['model'] ?? 'form';
        if ( $question_type->id && ! empty( $question_files ) ) {
            foreach ( $question_files as $question ) {
                $basename = 'question_' . $question->basename;
                if (! empty( $_FILES ) && isset( $_FILES[ $basename ]['name'] ) ) {
                    $_POST[ $basename ] = $_FILES[ $basename ]['name'];
                    $form->_files = $form->_files ?? [];
                    $form->_files[] = $question->basename;
                }
            }
        }
        return $form;
    }

    function contact_errors ( $vars ) {
        $error_vars = [];
        foreach ( $vars as $key => $var ) {
            if ( strpos( $key, 'question_' ) !== 0 ) {
                continue;
            }
            if (! preg_match( '/_error$/', $key ) ) {
                continue;
            }
            $basename = preg_replace( '/_error$/', '', $key );
            if ( isset( $_POST[ $basename ] ) ) {
                $basename = preg_replace( '/^question_/', '', $basename );
                $error_vars[ $basename ] = $var;
            }
        }
        return $error_vars;
    }

    function clear_query ( $obj ) {
        $this->db->clear_query( $obj->_model );
        $this->db->clear_query( $obj->_model, $obj->id );
    }

    function status_text ( $status, $model ) {
        $status_published = $this->status_published( $model );
        $mapping = $status_published == 4 ? [0 => 'Draft',
                                             1 => 'Review',
                                             2 => 'Approval Pending',
                                             3 => 'Reserved',
                                             4 => 'Publish',
                                             5 => 'Ended'] :
                                            [1 => 'Disable',
                                             2 => 'Enable'];
        if ( is_numeric( $status ) && ctype_digit( (string) $status ) ) {
            return $mapping[ $status ] ?? $status;
        } else {
            return array_flip( $mapping )[ ucwords( $status ) ] ?? $status;
        }
    }

    function print_json ( $data ) {
        $callback = ['name' => 'pre_response'];
        $this->run_callbacks( $callback, 'restfulapi', $data );
        header( 'Content-type: application/json; charset=UTF-8' );
        ignore_user_abort( true );
        while( ob_get_level() ) { ob_end_clean(); }
        $json = $this->json_encode( $data );
        $size = strlen( bin2hex( $json ) ) / 2;
        header( 'HTTP/1.1 200 OK' );
        header( "Content-Length: {$size}" );
        header( 'Connection: close' );
        echo $json;
        flush();
        if( $this->api_cache_key ) {
            $cache = $this->db->model( 'api_cache' )->get_by_key( ['key' => $this->api_cache_key ] );
            $cache->value( serialize( $data ) );
            $cache->save();
        }
    }

    function json_error ( $message,
        $params = null, $status = 200, $translate = false, $lang = null ) {
        if ( is_numeric( $params ) ) {
            list( $status, $component, $lang ) = [ $params, $message, $lang ];
        }
        switch ( $status ) {
            case 400:
                header( 'HTTP/1.1 400 Bad Request' );
                break;
            case 401:
                header( 'HTTP/1.1 401 Unauthorized' );
                break;
            case 403:
                header( 'HTTP/1.1 403 Forbidden' );
                break;
            case 404:
                header( 'HTTP/1.1 404 Not Found' );
                break;
            case 405:
                header( 'HTTP/1.1 405 Method Not Allowed' );
                break;
            case 406:
                header( 'HTTP/1.1 406 Not Acceptable' );
                break;
            default:
                header( "HTTP/1.1 {$status}" );
        }
        if ( $translate ) {
            if (! $lang ) $lang = $this->language;
            $message = $this->translate( $message, $params, $this, $lang );
        } else if ( strpos( $message, '%' ) !== false ) {
            $escaped = str_replace( '%s', '', $message );
            if ( strpos( $escaped, '%' ) !== false ) {
                $escaped = preg_replace( '/%\d+\$s/', '', $escaped );
            }
            if ( strpos( $escaped, '%' ) !== false ) {
                $message = str_replace( '%', '%%', $message );
            }
            if (!is_array( $params ) && !is_string( $params ) ) {
                $params = (string) $params;
            }
            $message = is_string( $params )
                ? sprintf( $message, $params ) : vsprintf( $message, $params );
        }
        $json = ['status'  => $status, 'message' => $message ];
        header( 'Content-type: application/json; charset=UTF-8' );
        echo $this->json_encode( $json );
        exit();
    }

    function json_encode ( $json ) {
        if ( $this->api_unescaped_unicode && $this->api_pretty_print ) {
            $json = json_encode( $json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
        } else if ( $this->api_unescaped_unicode ) {
            $json = json_encode( $json, JSON_UNESCAPED_UNICODE );
        } else if ( $this->api_pretty_print ) {
            $json = json_encode( $json, JSON_PRETTY_PRINT );
        } else {
            $json = json_encode( $json, JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT );
        }
        return $json;
    }
}