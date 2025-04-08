<?php

class PTRESTfulAPIv1 extends PTRESTfulAPI {

    public $api_version;
    public $model;
    public $parent;
    public $object_id;
    public $api_user;
    public $table;
    public $method;
    protected $methods = ['authentication', 'scheme', 'get', 'list', 'search', 'insert',
                          'update', 'delete', 'token', 'confirm', 'submit'];

    function __destruct () {
    }

    function authentication () {
        if ( $this->request_method !== 'POST' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        }
        $model = $this->model ? $this->model : 'user';
        $expires = $this->api_sess_expires ?? 3600;
        if ( $model === 'member' ) {
            $plugin = $this->component( 'Members' );
            if (! $plugin ) {
                $this->json_error( 'Invalid request.', 400 );
            }
            $workspace_id = (int)$this->param( 'workspace_id' );
            $expires = $plugin->get_config_value( 'members_sess_timeout', $workspace_id );
        }
        if (! $expires ) {
            $expires = $this->api_sess_expires ?? 3600;
        }
        $json = file_get_contents( 'php://input' );
        if ( $json && ! $this->param( 'name' ) && ! $this->param( 'password' ) ) {
            $json = json_decode( $json, true );
            if ( $json === null ) {
                $this->json_error( 'Invalid request.', 400 );
            }
        }
        $remember = false;
        if ( is_array( $json ) ) {
            $name = $json['name'] ?? '';
            $password = $json['password'] ?? '';
            $remember = $json['remember'] ?? '';
        } else {
            $name = $this->param( 'name' );
            $password = $this->param( 'password' );
            $remember = $this->param( 'remember' );
        }
        if (! $name ||! $password ) {
            $this->json_error( 'Name and password are required.', 401 );
        }
        if (! $this->api_allow_remember ) {
            $remember = false;
        }
        $lockout_limit = $this->lockout_limit;
        $lockout_interval = $this->lockout_interval;
        $faild_login = 0;
        $name_md5 = md5( $name );
        if ( $this->api_user_lockout && $lockout_limit && $lockout_interval && !$this->api_debug ) {
            $from = date( 'Y-m-d H:i:s', strtotime("-{$lockout_interval} second") );
            $faild_login = $this->db->model( 'log' )->count( ['md5'      => $name_md5,
                                                              'category' => 'login',
                                                              'model'    => $model,
                                                              'level'    => 8,
                                                              'created_on' => ['>' => $from ] ] );
            if ( $faild_login >= $lockout_limit ) {
                $this->json_error( 'Authentication faild.', 401 );
            }
        }
        if ( $this->api_ip_lockout ) {
            $banned_ip = $this->db->model( 'remote_ip' )->get_by_key(
                             ['ip_address' => $this->remote_ip, 'class' => 'banned'] );
            if ( $banned_ip->id ) {
                $this->json_error( 'This IP address was locked out.', 401 );
            }
        }
        $name_column = $this->api_name_column;
        $password_column = $this->api_password_column;
        if ( $model != 'user' ) {
            $api_name_column = "api_{$model}_name_column";
            $api_password_column = "api_{$model}_password_column";
            if ( $this->$api_name_column ) {
                $name_column = $this->$api_name_column;
            }
            if ( $this->$api_password_column ) {
                $api_password_column = $this->$api_password_column;
            }
        }
        $terms[ $name_column ] = ['BINARY' => $name, 'status' => 2];
        $api_password = null;
        if ( $password_column != 'password' ) {
            $column = $this->db->model( 'column' )->get_by_key(
                ['name' => $password_column, 'table_id' => $this->table->id ] );
            if (! $column->id ) {
                $this->json_error( 'The %s was not found.', $password_column, 401 );
            }
            if ( $column->edit !== 'password(hash)' ) {
                $api_password = $password;
                $password = null;
            }
        }
        $user = $this->db->model( $model )->load( $terms, ['limit' => 1] );
        $login_user = null;
        if (!empty( $user ) ) {
            $login_user = $user[0];
            $user = $user[0];
            if ( $user->lock_out ) {
                $user = null;
            } else if ( $password && !password_verify( $password, $user->$password_column ) ) {
                $user = null;
            } else if ( $api_password && ( $password !== $user->$password_column ) ) {
                $user = null;
            }
        } else {
            $user = null;
        }
        if (! $user ) {
            $message = $this->translate( 'Authentication faild with RESTful API.' );
            $faild_user = $this->db->model( $model )->get_by_key( [ $name_column => ['BINARY' => $name ] ] );
            $metadata = $password ? ['username' => $name, 'password' => '*************']
                      : ['username' => $name, 'uuid' => '*************'];
            $this->log( ['message'  => $message,
                         'category' => 'login',
                         'model'    => $model,
                         'object_id'=> $faild_user->id,
                         'md5'      => $name_md5, // for lock out.
                         'metadata' => json_encode( $metadata, JSON_UNESCAPED_UNICODE ),
                         'level'    => 'security'] );
            if ( $this->api_user_lockout && $lockout_limit && $lockout_interval && !$this->api_debug ) {
                $faild_login++;
                if ( $faild_login >= $lockout_limit ) {
                    if ( is_object( $login_user ) && $login_user->id ) {
                        $login_user->lock_out_on( PTUtil::current_ts( $this->request_time ) );
                        $login_user->lock_out( 1 );
                        $login_user->save();
                    }
                }
            }
            if ( $this->api_ip_lockout && !$this->api_debug ) {
                $no_lockout_allowed = $this->no_lockout_allowed_ip;
                if ( $no_lockout_allowed ) {
                    $allowed_ip = $this->db->model( 'remote_ip' )->get_by_key(
                            ['ip_address' => $this->remote_ip,
                             'class' => ['IN' => ['administrator', 'allow'] ] ] );
                    if (! $allowed_ip->id ) {
                        $no_lockout_allowed = false;
                    }
                }
                $lockout_limit = $this->ip_lockout_limit;
                if (! $no_lockout_allowed && $lockout_limit ) {
                    $lockout_interval = $this->ip_lockout_interval;
                    $from = date( 'Y-m-d H:i:s', strtotime("-{$lockout_interval} second") );
                    $faild_login = $this->db->model( 'log' )->count( ['category'   => 'login',
                                                                      'model'      => $model,
                                                                      'level'      => 8,
                                                                      'remote_ip'  => $this->remote_ip,
                                                                      'created_on' => ['>' => $from ] ] );
                    if ( $faild_login >= $lockout_limit ) {
                        $banned_ip = $this->db->model( 'remote_ip' )->get_by_key(
                                         ['ip_address' => $this->remote_ip, 'class' => 'banned'] );
                        $banned_ip->memo( $this->translate( 'Authentication faild %s times with RESTful API.', $faild_login ) );
                        $this->set_default( $banned_ip );
                        $banned_ip->save();
                    }
                }
            }
            $this->json_error( 'Authentication faild.', 401 );
        }
        $time = $this->request_time;
        $session = $this->db->model( 'session' )->get_by_key(
              ['key' => 'RESTfulAPIAccessToken','kind' => 'US', 'user_id' => $user->id ] );
        if ( $remember ) {
            $expires = 60 * 60 * 24 * 365;
        }
        $expires += $time;
        $cookie_value = null;
        if ( $this->api_use_cookie ) {
            if (! $session->value ) {
                $session->name('');
                $cookie_value = $this->magic();
            } else {
                $cookie_value = $session->value;
            }
            $path = $this->cookie_path ? $this->cookie_path : $this->path;
            $name = $this->api_cookie_name;
            $this->bake_cookie( $name, $cookie_value, $expires, $path, true, $this->cookie_domain );
        }
        $session->text( $user->_model );
        if ( $session->id &&
           ( $session->expires && $session->expires > $time && $session->name ) ) {
            $data = ['access_token' => $session->name, 'expires_in' => (int) $session->expires ];
            $session->expires( $expires );
            $session->save();
        } else {
            $session->expires( $expires );
            $session->start( $time );
            $session->name( $this->magic() );
            if ( $this->api_use_cookie ) {
                $session->value( $this->magic() );
            }
            $session->save();
            $data = ['access_token' => $session->name, 'expires_in' => (int) $session->expires ];
        }
        $this->print_json( $data );
    }

    function scheme () {
        if ( $this->request_method !== 'GET' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        } else if (! $user = $this->user() ) {
            $this->json_error( 'Permission denied.', 403 );
        }
        if (! $user->is_superuser ) {
            $permissions = $this->permissions();
            if (! isset( $permissions[ $this->workspace_id ] ) ) {
                $this->json_error( 'Permission denied.', 403 );
            }
            $permissions = $permissions[ $this->workspace_id ];
            $model = $this->model;
            if (! in_array( 'workspace_admin', $permissions ) &&
                ! in_array( "can_create_{$model}", $permissions ) &&
                ! in_array( "can_update_own_{$model}", $permissions ) &&
                ! in_array( "can_update_all_{$model}", $permissions ) ) {
                $this->json_error( 'Permission denied.', 403 );
            }
        }
        $model = $this->model;
        $scheme = $this->get_scheme_from_db( $model );
        $keys = $this->param( 'keys' ) ? $this->param( 'keys' ) : [];
        if (! empty( $keys ) ) {
            $keys = explode( ',', $keys );
            foreach ( $scheme as $key => $props ) {
                if (! in_array( $key, $keys ) ) {
                    unset( $scheme[ $key ] );
                }
            }
            if (! in_array( 'fields', $keys ) ) {
                $this->print_json( $scheme );
                exit();
            }
        }
        $relations = $this->db->model( 'relation' )->load_iter(
            ['from_obj' => 'field', 'to_obj' => 'table', 'to_id' => $this->table->id ], null, 'from_id' );
        $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
        if (! empty( $relations ) ) {
            $terms_ids = $this->workspace_id ? [0, $this->workspace_id] : [ $this->workspace_id ];
            $terms = ['workspace_id' => ['IN' => $terms_ids ] ];
            $terms['id'] = ['IN' => $relations ];
            $custom_fields = $this->db->model( 'field' )->load( $terms );
            $fields = [];
            if (! empty( $custom_fields ) ) {
                $fields = [];
                foreach ( $custom_fields as $field ) {
                    $fields[] = $this->object_to_resource( $field );
                }
                $scheme['fields'] = $fields;
            }
        }
        $this->print_json( $scheme );
    }

    function get () {
        if ( $this->request_method !== 'GET' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        }
        $user = $this->user();
        if ( in_array( $this->model, $this->api_requires_login ) && !$user ) {
            $this->json_error( 'Permission denied.', 403 );
        }
        $model = $this->model;
        $obj = $this->db->model( $model );
        $cols = ['id'];
        if ( $obj->has_column( 'status' ) ) {
            $cols[] = 'status';
        }
        if ( $obj->has_column( 'workspace_id' ) ) {
            $cols[] = 'workspace_id';
        }
        if ( $obj->has_column( 'user_id' ) ) {
            $cols[] = 'user_id';
        }
        if ( $obj->has_column( 'rev_type' ) ) {
            $cols[] = 'rev_type';
        }
        $obj = $obj->load( $this->object_id, null, $cols );
        if (! $obj ) {
            $this->json_error( 'The %s was not found.', $model, 404 );
        }
        if ( $user ) {
            if (!$this->can_do( $model, 'edit', $obj ) ) {
                $this->json_error( 'Permission denied.', 403 );
            }
        }
        if ( $obj && $this->db->model( $model )->has_column( 'workspace_id' ) &&
            $obj->workspace_id != $this->workspace_id ) {
            if (! empty( $this->workspace_ids )
                && in_array( (int) $obj->workspace_id, $this->workspace_ids ) ) {
            } else {
                $obj = null;
            }
        }
        if ( $obj && $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
            $obj = null;
        } else if (! $this->user() && $obj && $obj->has_column( 'status' ) ) {
            if ( $this->status_published( $model ) != $obj->status ) {
                $obj = null;
            }
        }
        if (! $obj ) {
            $this->json_error( 'The %s was not found.', $model, 404 );
        }
        $args  = [];
        $columns = $this->setup_cols( $args );
        $cols = isset( $args['cols'] ) ? $args['cols'] : '*';
        $obj = $obj->load( $this->object_id, null, $cols );
        $obj = $this->object_to_resource( $obj, $columns );
        $this->print_json( $obj );
    }

    function list () {
        if ( $this->request_method !== 'GET' && $this->request_method !== 'POST' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        }
        $user = $this->user();
        if ( in_array( $this->model, $this->api_requires_login ) && !$user ) {
            $this->json_error( 'Permission denied.', 403 );
        }
        $table = $this->table;
        $ctx = $this->ctx;
        $ctx->stash( 'workspace', $this->workspace );
        $this_tag = strtolower( $table->plural );
        $tag_class = $this->core_tags;
        $model = $this->model;
        $args = ['model' => $this->model, 'this_tag' => $this_tag ];
        list( $content, $repeat, $counter ) = [ null, true, 0 ];
        $columns = $this->setup_cols( $args );
        if (! empty( $this->workspace_ids ) ) {
            $args['workspace_ids'] = implode( ',', $this->workspace_ids );
        }
        if ( $sort_by = $this->param( 'sort_by' ) ) {
            $args['sort_by'] = $sort_by;
        }
        if ( $sort_order = $this->param( 'sort_order' ) ) {
            $args['sort_order'] = $sort_order;
        }
        if ( $limit = $this->param( 'limit' ) ) {
            if ( $limit != -1 ) {
                $args['limit'] = $limit;
            } else {
                unset( $_REQUEST['limit'], $_POST['limit'], $_GET['limit'] );
                $count =  $this->db->model( $model )->count();
                $args['limit'] = $count;
                $_REQUEST['limit'] = $count;
            }
        } else {
            $args['limit'] = $this->api_list_limit;
            $_REQUEST['limit'] = $this->api_list_limit;
        }
        if ( $offset = $this->param( 'offset' ) ) {
            $args['offset'] = $offset;
        }
        if ( $q = $this->param( 'query' ) ) {
            if ( !$this->user() ) {
                unset( $_GET['query'], $_POST['query'], $_REQUEST['query'] );
            }
            $_REQUEST['phrase'] = $q;
        }
        if ( $user ) {
            if (! $user->is_superuser ) {
                $permissions = $this->permissions();
                if (! isset( $permissions[ $this->workspace_id ] ) ) {
                    $this->json_error( 'Permission denied.', 403 );
                }
                $permissions = $permissions[ $this->workspace_id ];
                if (! in_array( "can_list_{$model}", $permissions ) &&
                    ! in_array( 'workspace_admin', $permissions ) ) {
                    $this->json_error( 'Permission denied.', 403 );
                }
                if ( $this->param( 'manage_revision' ) &&
                    ! $this->can_do( "can_revision_{$model}", null, null, $workspace ) ) {
                    $this->json_error( 'Permission denied.', 403 );
                }

            }
            if (! empty( $columns ) ) {
                $_REQUEST['get_cols'] = implode( ',', $columns );
            } else {
                $_REQUEST['get_cols'] = '*';
            }
            $_REQUEST['workspace_id'] = $this->workspace_id;
            $_REQUEST['to_json'] = 1;
            list( $count, $objects ) = $this->view( $this, $model, 'list' );
            $ctx->stash( 'object_count', $count );
        } else {
            $objects = $tag_class->hdlr_objectloop( $args, $content, $ctx, $repeat, $counter );
            if (! $objects ) {
                $objects =[];
            }
        }
        $items = [];
        foreach ( $objects as $obj ) {
            $items[] = $this->object_to_resource( $obj, $columns );
        }
        $count = $ctx->stash( 'object_count' ) ? (int) $ctx->stash( 'object_count' ) : 0;
        $json = ['totalResult' => $count, 'items' => $items ];
        $this->print_json( $json );
    }

    function search () {
        if ( $this->request_method !== 'GET' && $this->request_method !== 'POST' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        }
        $component = $this->component( 'SearchEstraier' );
        $ctx = $this->ctx;
        $ctx->stash( 'workspace', $this->workspace );
        $ctx->local_vars['current_archive_url'] = '';
        $args = ['callback' => '', 'add_attr' => '@model', 'add_condition' => 'STREQ', 'value' => $this->model ];
        if (! empty( $this->workspace_ids ) ) {
            $args['workspace_ids'] = implode( ',', $this->workspace_ids );
        }
        if ( $sort_by = $this->param( 'sort_by' ) ) {
            $args['sort_by'] = $sort_by;
            $sort_order = $this->param( 'sort_order' ) ? $this->param( 'sort_order' ) : 'ascend';
            $order_allow = ['STRA', 'STRD', 'NUMA', 'NUMD'];
            if ( in_array( strtoupper( $sort_order ), $order_allow ) ) {
                $sort_order = strtoupper( $sort_order );
            } else {
                $sort_order = strtolower( $sort_order );
                if ( $sort_order != 'ascend' && $sort_order != 'descend' ) {
                    $sort_order = 'ascend';
                }
            }
            $args['sort_order'] = $sort_order;
        }
        if ( $limit = $this->param( 'limit' ) ) {
            if ( $limit == -1 ) {
                unset( $_REQUEST['limit'], $_POST['limit'], $_GET['limit'] );
                $count =  $this->db->model( $this->model )->count();
                $_REQUEST['limit'] = $count;
            }
        }
        $json = $component->hdlr_estraier_json( $args, $ctx );
        $json = json_decode( $json, true );
        $count = $json['total_match_items'];
        $objects = $json['items'];
        $items =[];
        $columns = $this->setup_cols();
        foreach ( $objects as $item ) {
            $obj = $this->db->model( $this->model )->load( $item['object_id'] );
            if (! $obj ) {
                $count--;
                continue;
            }
            $items[] = $this->object_to_resource( $obj, $columns );
        }
        $json = ['totalResult' => $count, 'items' => $items ];
        $this->print_json( $json );
    }

    function insert () {
        if ( $this->request_method !== 'POST' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        }
        $user = $this->user();
        if (! $user ) {
            $this->json_error( 'Permission denied.', 403 );
        }
        $json = file_get_contents( 'php://input' );
        if ( !$json && $this->api_debug && $this->api_debug_json_path
            && file_exists( $this->api_debug_json_path ) ) {
            $json = file_get_contents( $this->api_debug_json_path );
        }
        if (! $json ) {
            $this->json_error( 'Invalid request.', 400 );
        }
        if ( $json ) {
            $json = json_decode( $json, true );
            if ( $json === null || !is_array( $json ) ) {
                $this->json_error( 'Invalid request.', 400 );
            }
        }
        $model = $this->model;
        if ( isset( $json['id'] ) ) {
            $this->json_error( 'Invalid request.', 400 );
        }
        $workspace = $this->workspace ?? $this->db->model( 'workspace' )->__new( ['id' => 0] );
        if (! $this->can_do( "can_create_{$model}", null, null, $workspace ) ) {
            $this->json_error( 'Permission denied.', 403 );
        }
        $rev_type = $json['rev_type'] ?? null;
        if ( $rev_type ) {
            if (! $this->can_do( "can_revision_{$model}", null, null, $workspace ) ) {
                $this->json_error( 'Permission denied.', 403 );
            }
        }
        $obj = $this->db->model( $model )->__new();
        $workflow = $json['Workflow'] ?? null;
        if ( isset( $json['status'] ) && $this->db->model( $model )->has_column( 'status' ) ) {
            if (! ctype_digit( (string) $json['status'] ) && ! is_numeric( $json['status'] ) ) {
                $json['status'] = $this->status_text( $json['status'], $model );
            }
            $to_user = null;
            if ( $workflow ) {
                $to_user = $this->next_user( $json );
                if (! $to_user ) {
                    $this->json_error( 'Permission denied.', 403 );
                }
            }
            $max_status = $this->max_status( $user, $model, $this->workspace_id );
            if ( $to_user ) {
                $my_group = $this->permission_group( $user, $model, $this->workspace_id );
                $to_group = $this->permission_group( $to_user, $model, $this->workspace_id );
                if ( $my_group != $to_group ) {
                    if ( $to_group == 'publisher' ) {
                        $max_status = 2;
                    } else if ( $to_group == 'reviewer' ) {
                        $max_status = 1;
                    } else if ( $to_group == 'creator' ) {
                        $max_status = 0;
                    }
                }
            }
            $status = (int) $json['status'];
            if ( $status > $max_status ) {
                $this->json_error( 'Permission denied.', 403 );
            }
        }
        $columns = array_keys( $json );
        $columns[] = 'id';
        $this->core_save_callbacks();
        $add_tags = $this->tags( $json );
        $errors = [];
        $this->validate_resource( $json, null, $errors );
        foreach ( $json as $column => $value ) {
            if ( $obj->has_column( $column, true )
                && ( is_numeric( $value ) || is_string( $value ) ) ) {
                $obj->$column( $value );
            }
        }
        $callback = ['name' => 'save_filter', 'add_tags' => $add_tags,
                     'error' => '', 'errors' => $errors, 'json' => $json ];
        $save_filter = $this->run_callbacks( $callback, $model, $obj );
        $errors = $callback['errors'];
        if (! $save_filter || !empty( $errors ) || $callback['error'] ) {
            $this->json_error( 'Insert canceled by callback(%s).', $callback['error'], 406 );
        }
        $add_tags = $callback['add_tags'];
        $this->db->begin_work();
        $this->txn_active = true;
        $original = clone $obj;
        $obj = $this->object_from_resource( $json );
        if (! is_object( $obj ) ) {
            $this->db->rollback();
            $this->txn_active = false;
            $this->json_error( 'An error occurred while save object.', 500 );
        }
        $callback = ['name' => 'pre_save', 'error' => '', 'is_new' => true,
                     'add_tags' => $add_tags, 'errors' => $errors, 'json' => $json ];
        $save_filter = $this->run_callbacks( $callback, $model, $obj, $original );
        $errors = $callback['errors'];
        if (! $save_filter || !empty( $errors ) || $callback['error'] ) {
            $this->json_error( 'Insert canceled by callback(%s).', $callback['error'], 406 );
        }
        $add_tags = $callback['add_tags'];
        if (! empty( $this->hooks ) ) {
            $this->run_hooks( 'pre_save' );
        }
        $this->db->flush_queries();
        $this->db->update_multi = false;
        $callback = ['name' => 'before_save', 'is_new' => true, 'errors' => $errors,
                     'add_tags' => $add_tags, 'error' => '', 'changed_cols' => [],
                     'orig_relations' => [], 'orig_metadata' => [], 'json' => $json ];
        if ( $obj->_relations === null ) $obj->_relations = $this->get_relations( $obj );
        $save_filter = $this->run_callbacks( $callback, $model, $obj, $original, $original );
        $errors = $callback['errors'];
        if (! $save_filter || !empty( $errors ) || $callback['error'] ) {
            $this->json_error( 'Insert canceled by callback(%s).', $callback['error'], 406 );
        }
        $changed_cols = [];
        if ( $obj->has_column( 'rev_type' ) && $obj->rev_type && $obj->rev_object_id ) {
            $master = $this->db->model( $model )->load( (int) $obj->rev_object_id );
            if (! $master ) {
                $this->db->rollback();
                $this->txn_active = false;
                $this->json_error( 'Master not found.', 500 );
            }
            $changed_cols = PTUtil::object_diff( $this, $obj, $master );
        }
        $this->db->commit();
        $this->txn_active = false;
        $nickname = $user->nickname;
        $label = $this->translate( $this->table->label );
        $primary = $this->table->primary;
        $name = $primary ? $obj->$primary : '';
        $params = [ $label, $name, $obj->id, $nickname ];
        $message = $this->translate( "%1\$s '%2\$s(ID:%3\$s)' created by %4\$s from RESTful API.", $params );
        $log = $this->log( ['message' => $message, 'category' => 'insert',
                            'model' => $model, 'object_id' => $obj->id,
                            'level' => 'info'] );
        $callback = ['name' => 'post_save', 'is_new' => true, 'add_tags' => $add_tags,
                     'changed_cols' => [], 'orig_relations' => [],
                     'orig_metadata' => [], 'log' => $log, 'json' => $json ];
        if (!empty( $changed_cols ) ) {
            $callback['changed_cols'] = $changed_cols;
            $changed = array_keys( $changed_cols );
            $obj->rev_changed( join( ', ', $changed ) );
            $obj->rev_diff( json_encode( $changed_cols,
                                 JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
        }
        $obj->save();
        $this->run_callbacks( $callback, $model, $obj, $original, $original );
        $this->clear_query( $obj );
        $obj = $this->db->model( $model )->load( $obj->id );
        $resource = $this->object_to_resource( $obj, $columns );
        $this->print_json( $resource );
        if ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
            exit();
        }
        $this->publish_obj( $obj, null, true );
    }

    function update () {
        if ( $this->request_method !== 'POST' && $this->request_method !== 'PUT' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        }
        $user = $this->user();
        if (! $user ) {
            $this->json_error( 'Permission denied.', 403 );
        }
        $json = file_get_contents( 'php://input' );
        if ( !$json && $this->api_debug && $this->api_debug_json_path
            && file_exists( $this->api_debug_json_path ) ) {
            $json = file_get_contents( $this->api_debug_json_path );
        }
        if (! $json ) {
            $this->json_error( 'Invalid request.', 400 );
        }
        if ( $json ) {
            $json = json_decode( $json, true );
            if ( $json === null || !is_array( $json ) ) {
                $this->json_error( 'Invalid request.', 400 );
            }
        }
        if ( isset( $json['id'] ) && $json['id'] != $this->object_id ) {
            $this->json_error( 'Invalid request.', 400 );
        }
        $model = $this->model;
        $obj = $this->db->model( $model );
        $cols = ['id'];
        if ( $obj->has_column( 'workspace_id' ) ) {
            $cols[] = 'workspace_id';
        }
        if ( $obj->has_column( 'user_id' ) ) {
            $cols[] = 'user_id';
        }
        if ( $model === 'asset' ) { /* Used in `Prototype\save_filter_asset()` . */
            $cols[] = 'label';
            $cols[] = 'file_name';
        }
        $obj = $obj->load( $this->object_id, null, $cols );
        if (! $obj ) {
            $this->json_error( 'The %s was not found.', $model, 404 );
        }
        if (!$this->can_do( $model, 'edit', $obj ) ) {
            $this->json_error( 'Permission denied.', 403 );
        }
        $rev_type = $json['rev_type'] ?? null;
        if ( $rev_type ) {
            if (! $this->can_do( "can_revision_{$model}", null, null, $workspace ) ) {
                $this->json_error( 'Permission denied.', 403 );
            }
        }
        $workflow = $json['Workflow'] ?? null;
        if ( $obj->has_column( 'status' ) ) {
            $cols[] = 'status';
            if ( isset( $json['status'] ) ) {
                if (! ctype_digit( (string) $json['status'] ) && ! is_numeric( $json['status'] ) ) {
                    $json['status'] = $this->status_text( $json['status'], $model );
                }
                $to_user = null;
                if ( $workflow ) {
                    $to_user = $this->next_user( $json );
                    if (! $to_user ) {
                        $this->json_error( 'Permission denied.', 403 );
                    }
                }
                $max_status = $this->max_status( $user, $model, $this->workspace_id );
                if ( $to_user ) {
                    $my_group = $this->permission_group( $user, $model, $this->workspace_id );
                    $to_group = $this->permission_group( $to_user, $model, $this->workspace_id );
                    if ( $my_group != $to_group ) {
                        if ( $to_group == 'publisher' ) {
                            $max_status = 2;
                        } else if ( $to_group == 'reviewer' ) {
                            $max_status = 1;
                        } else if ( $to_group == 'creator' ) {
                            $max_status = 0;
                        }
                    }
                }
                $status = (int) $json['status'];
                if ( $status > $max_status ) {
                    $this->json_error( 'Permission denied.', 403 );
                }
            }
        }
        $original = $this->db->model( $model )->load( $obj->id );
        $errors = [];
        $this->validate_resource( $json, $original, $errors );
        $original = clone $original;
        $relations = $this->get_relations( $original );
        $metadata  = $this->get_meta( $original );
        $original->_relations = $relations;
        $original->_meta = $metadata;
        $original->id( null );
        $json['id'] = $this->object_id;
        $columns = array_keys( $json );
        $this->core_save_callbacks();
        $add_tags = $this->tags( $json );
        $callback = ['name' => 'save_filter', 'add_tags' => $add_tags,
                     'error' => '', 'errors' => $errors, 'json' => $json ];
        $save_filter = $this->run_callbacks( $callback, $model, $obj );
        $errors = $callback['errors'];
        if (! $save_filter || !empty( $errors ) || $callback['error'] ) {
            $this->json_error( 'Update canceled by callback(%s).', $callback['error'], 406 );
        }
        $add_tags = $callback['add_tags'];
        $this->db->begin_work();
        $this->txn_active = true;
        $obj = $this->object_from_resource( $json );
        if (! is_object( $obj ) ) {
            $this->db->rollback();
            $this->txn_active = false;
            $this->json_error( 'An error occurred while save object.', 500 );
        }
        $callback = ['name' => 'pre_save', 'error' => '', 'is_new' => false,
                     'add_tags' => $add_tags, 'errors' => $errors, 'json' => $json ];
        $save_filter = $this->run_callbacks( $callback, $model, $obj, $original );
        $errors = $callback['errors'];
        if (! $save_filter || !empty( $errors ) || $callback['error'] ) {
            $this->json_error( 'Update canceled by callback(%s).', $callback['error'], 406 );
        }
        $add_tags = $callback['add_tags'];
        if (! empty( $this->hooks ) ) {
            $this->run_hooks( 'pre_save' );
        }
        $this->db->flush_queries();
        $this->db->update_multi = false;
        $changed_cols = PTUtil::object_diff( $this, $obj, $original );
        $callback = ['name' => 'before_save', 'is_new' => false, 'errors' => $errors,
                     'add_tags' => $add_tags, 'error' => '', 'changed_cols' => $changed_cols,
                     'orig_relations' => $relations, 'orig_metadata' => $metadata, 'json' => $json ];
        if ( $obj->_relations === null ) $obj->_relations = $this->get_relations( $obj );
        $save_filter = $this->run_callbacks( $callback, $model, $obj, $original, $original );
        $errors = $callback['errors'];
        if (! $save_filter || !empty( $errors ) || $callback['error'] ) {
            $this->json_error( 'Update canceled by callback(%s).', $callback['error'], 406 );
        }
        $this->db->commit();
        $this->txn_active = false;
        $log_metadata = ! empty( $changed_cols )
                      ? json_encode( $changed_cols, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) : '';
        $nickname = $user->nickname;
        $label = $this->translate( $this->table->label );
        $primary = $this->table->primary;
        $name = $primary ? $obj->$primary : '';
        $params = [ $label, $name, $obj->id, $nickname ];
        $message = $this->translate( "%1\$s '%2\$s(ID:%3\$s)' edited by %4\$s from RESTful API.", $params );
        $log = $this->log( ['message' => $message, 'category' => 'update',
                            'model' => $model, 'object_id' => $obj->id,
                            'metadata' => $log_metadata, 'level' => 'info'] );
        $callback = ['name' => 'post_save', 'is_new' => false, 'add_tags' => $add_tags,
                     'changed_cols' => $changed_cols, 'orig_relations' => $relations,
                     'orig_metadata' => $metadata, 'log' => $log, 'json' => $json ];
        $this->run_callbacks( $callback, $model, $obj, $original, $original );
        $this->clear_query( $obj );
        $obj = $this->db->model( $model )->load( $obj->id );
        $resource = $this->object_to_resource( $obj, $columns );
        $this->print_json( $resource );
        $this->publish_obj( $obj, $original, true );
    }

    function delete () {
        if ( $this->request_method !== 'POST' && $this->request_method !== 'DELETE' ) {
            $this->json_error( 'Method %s not allowed.', $this->request_method, 400 );
        }
        $user = $this->user();
        if (! $user ) {
            $this->json_error( 'Permission denied.', 403 );
        }
        $model = $this->model;
        $obj = $this->db->model( $model )->load( $this->object_id );
        if (! $obj ) {
            $this->json_error( 'The %s was not found.', $model, 404 );
        }
        if ( $user ) {
            if (!$this->can_do( $model, 'delete', $obj ) ) {
                $this->json_error( 'Permission denied.', 403 );
            }
        } else {
            $this->json_error( 'Permission denied.', 403 );
        }
        $this->core_delete_callbacks();
        $errors = [];
        $callback = ['name' => 'delete_filter', 'error' => ''];
        $delete_filter = $this->run_callbacks( $callback, $model );
        if (! $delete_filter || $callback['error'] ) {
            $this->json_error( 'Delete canceled by callback(%s).', $callback['error'], 406 );
        }
        $original = clone $obj;
        $obj->_relations = $this->get_relations( $obj );
        $callback = ['name' => 'pre_delete', 'table' => $this->table,
                     'model' => $model, 'error' => '' ];
        $delete_filter = $this->run_callbacks( $callback, $model, $obj, $original );
        if (! $delete_filter || $callback['error'] ) {
            $this->json_error( 'Delete canceled by callback(%s).', $callback['error'], 406 );
        }
        $rebuild = true;
        if ( $obj->has_column( 'status' ) ) {
            $status_published = $this->status_published( $model );
            if ( $obj->status != $status_published ) {
                $rebuild = false;
            } else {
                $obj->status( 0 );
                $obj->save();
            }
        }
        if ( $rebuild ) {
            $this->clear_query( $obj );
            $original = clone $obj;
            $obj->_delete = true;
            $this->publish_obj( $obj, $original, true );
        }
        $res = $this->remove_object( $obj );
        if (! $res ) {
            $this->json_error( 'An error occurred while delete object.', 500 );
        }
        $json = ['Success' => 1];
        $this->print_json( $json );
        $nickname = $this->user()->nickname;
        $label = $this->translate( $this->table->label );
        $primary = $this->table->primary;
        $name = $primary ? $obj->$primary : '';
        $params = [ $label, $name, $obj->id, $nickname ];
        $message = $this->translate( "%1\$s '%2\$s(ID:%3\$s)' deleted by %4\$s from RESTful API.", $params );
        $log = $this->log( ['message' => $message, 'category' => 'delete',
                            'model' => $model, 'object_id' => $obj->id,'level' => 'info'] );
        $callback = ['name' => 'post_delete', 'table' => $this->table, 'model' => $model ];
        if ( $model == 'table' ) {
            $callback['scheme'] = $this->get_scheme_from_db( $obj->name );
        }
        $this->run_callbacks( $callback, $model, $obj, $original );
        exit();
    }

    function token () {
        $form = $this->start_contact();
        $_POST['form_id'] = $this->object_id;
        $class = new PTForm();
        $sess = $class->make_magic_token( $this );
        if (! $sess->id ) {
            $this->json_error( 'An error occurred while generating token.', 500 );
        }
        $json = ['magic_token' => $sess->name ];
        $this->print_json( $json );
    }

    function confirm () {
        $form = $this->start_contact( $json );
        $_POST['form_id'] = $this->object_id;
        $_POST['__mode'] = 'confirm';
        $this->mode = 'confirm';
        $class = new PTForm();
        $url = $form->_url ?? $this->db->model( 'urlinfo' )->__new();
        $errors = $class->confirm( $this, $url );
        $errors = $errors['errors'] ?? [];
        $vars = $this->ctx->vars;
        if (!empty( $form->_files ) ) {
            foreach ( $form->_files as $file ) {
                if ( isset( $vars["base64_{$file}"] ) && $vars["base64_{$file}"] ) {
                    $_POST["question_{$file}_DataURI"] = $vars["base64_{$file}"];
                }
            }
        }
        $resource = is_array( $json ) ? $json : $_POST;
        if (! empty( $errors ) ) {
            $error_vars = $this->contact_errors( $vars );
            $json = ['messages' => $errors, 'errors' => $error_vars, 'params' => $resource ];
            $this->print_json( $json );
            exit();
        } else {
            $magic_token = $this->ctx->vars['magic_token'] ?? null;
            if (! $magic_token ) {
                $this->json_error( 'An error occurred while generating token.', 500 );
            }
            $_POST['magic_token'] = $magic_token;
            $json = ['magic_token' => $magic_token, 'params' => $json ];
        }
        $this->print_json( $json );
    }

    function submit () {
        $form = $this->start_contact( $json );
        if ( $form->requires_token ) {
            $token = $this->param( 'magic_token' );
            if (! $token ) {
                $this->json_error( 'Invalid request.', 403 );
            }
            $session = $this->db->model( 'session' )->get_by_key(
                ['name' => $token, 'kind' => 'CR'] );
            if (! $session->id ) {
                $this->json_error( 'Invalid request.', 403 );
            }
            if ( $session->expires < $this->request_time ) {
                $session->remove();
                $this->json_error( 'Your session has expired.', 403 );
            }
            if ( $this->validate_token_ip ) {
                if ( $session->key != $this->remote_ip ) {
                    $this->json_error( 'Invalid IP address.', 403 );
                }
            }
            if ( $this->validate_token_ua ) {
                $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
                if ( $session->text != $user_agent ) {
                    $this->json_error( 'Invalid User Agent.', 403 );
                    return false;
                }
            }
            if ( $form->use_session ) {
                session_start();
                $session_name = $this->form_session_name ? $this->form_session_name : 'pcmsx_form_token';
                $sess_token = isset( $_SESSION[ $session_name ] ) ? $_SESSION[ $session_name ] : '';
                if (! $sess_token || $sess_token != $session->data ) {
                    $this->json_error( 'Invalid session.', 403 );
                }
            }
        }
        $_POST['form_id'] = $this->object_id;
        $_POST['__mode'] = 'submit';
        $this->mode = 'submit';
        $class = new PTForm();
        $url = $form->_url ?? $this->db->model( 'urlinfo' )->__new();
        $submit = $class->submit( $this, $url );
        $errors = $submit['errors'] ?? [];
        $vars = $this->ctx->vars;
        $resource = is_array( $json ) ? $json : $_POST;
        if (! empty( $errors ) ) {
            if (!empty( $form->_files ) ) {
                foreach ( $form->_files as $file ) {
                    if ( isset( $vars["base64_{$file}"] ) && $vars["base64_{$file}"] ) {
                        $_POST["question_{$file}_DataURI"] = $vars["base64_{$file}"];
                    }
                }
            }
            $error_vars = $this->contact_errors( $vars );
            $json = ['messages' => $errors, 'errors' => $error_vars, 'params' => $resource ];
            $this->print_json( $json );
            exit();
        } else {
            $contact = $submit['contact'];
            if (! is_object( $contact ) ) {
                $this->json_error( 'An error occurred while save contact.', 500 );
            }
            $contact = $this->object_to_resource( $contact );
            unset( $contact['form_id'], $contact['object_id'], $contact['created_by'],
                   $contact['modified_on'], $contact['modified_by'] );
            $json = ['Success' => 1, 'contact' => $contact, 'params' => $resource ];
            if ( isset( $submit['redirect_url'] ) ) {
                $json['redirect_url'] = $submit['redirect_url'];
            }
            $this->print_json( $json );
        }
    }
}