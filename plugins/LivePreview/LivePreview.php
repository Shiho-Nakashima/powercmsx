<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class LivePreview extends PTPlugin {

    public    $preview    = false;
    public    $preview_ts = null;
    protected $status_pending = null;
    protected $status_in_pending = false;
    protected $in_workspace = false;

    function __construct () {
        parent::__construct();
    }

    function post_logout ( $app, $user ) {
        $cookies = array_keys( $_COOKIE );
        foreach ( $cookies as $cookie ) {
            if ( strpos( $cookie, 'pt-live-preview' ) === 0 ) {
                setcookie( $cookie, '', -1, '/' );
                unset( $_COOKIE[ $cookie ] );
            }
        }
    }

    function post_init ( $app ) {
        if ( $app->livepreview_open_external && $app->id === 'Prototype'
            && !$app->param( 'dialog_view' ) && !$app->mode != 'rebuild_phase' ) {
            if ( isset( $app->registry['menus']['live_preview'] ) ) {
                $app->registry['menus']['live_preview']['target'] = '_blank';
            }
        }
        $expires = $app->sess_timeout;
        $path = $app->cookie_path ? $app->cookie_path : $app->path;
        $login_cookie_name = $app->cookie_name;
        if ( $app->id === 'Prototype' && $app->mode == 'live_preview' && $app->request_method === 'GET'
            && !$app->user() && $app->param( 'session' ) ) {
            // Different domain's setting page.
            $workspace_id = $app->param( 'workspace_id' );
            $page_url = $this->get_config_value( 'livepreview_page_url', $workspace_id );
            if (! $page_url ) return;
            $this_page = $app->base . $_SERVER['REQUEST_URI'];
            if ( strpos( $this_page, '&session=' ) !== false ) {
                $this_page = preg_replace( '/&session=.*?$/', '', $this_page );
            }
            $page_url = $page_url ? $app->build( $page_url ) : '';
            $session = $app->param( 'session' );
            if ( $page_url == $this_page ) {
                $session = $app->db->model( 'session' )->get_by_key( ['name' => $session, 'kind' => 'LP'] );
                if ( $session->id && $session->user_id ) {
                    $user = $app->db->model( 'user' )->load( $session->user_id );
                    $session->remove();
                    if ( $user && $user->status == 2 && !$user->lock_out ) {
                        $user_session = $app->db->model( 'session' )->get_by_key( ['kind' => 'US', 'user_id' => $user->id ] );
                        if (! $user_session->id ) {
                            return;
                        }
                        $app->bake_cookie( $login_cookie_name, $user_session->name, $expires, $path, true, $app->cookie_domain );
                        echo '<html><head><title>Loading...</title><script>location.reload(); </script><body>';
                        exit();
                    }
                }
            }
        }
        $workspace_id = (int) $app->workspace_id;
        $is_setting_page = false;
        $name = 'pt-live-preview-pt-user';
        if ( $app->id === 'Prototype' && $app->mode === 'view'
            && $app->param( 'view' ) && $app->param( '_type' ) === 'edit' && $app->user() ) {
            // View binary column's data.
            $workspace = $app->workspace();
            $app->workspace_id = $workspace ? $workspace->id : 0;
            $ts = isset( $_COOKIE['pt-live-preview-ts'] )
                             ? $_COOKIE['pt-live-preview-ts'] : '';
            if ( $app->workspace_id && isset( $_COOKIE['pt-live-preview-ts-' . $app->workspace_id ] ) ) {
                $ts = $_COOKIE['pt-live-preview-ts-' . $app->workspace_id ];
            }
            if (! $ts ) return;
            if ( $ts ) {
                $ts = preg_replace( '/[^0-9]/', '', $ts );
                $y = substr( $ts, 0, 4 );
                $m = substr( $ts, 4, 2 );
                $d = substr( $ts, 6, 2 );
                if (! checkdate( $m, $d, $y ) ) {
                    $this->clear_lp_cookie();
                    return;
                }
            }
            if ( date('YmdHis') > $ts ) {
                $this->clear_lp_cookie();
                return;
            }
            if (! $workspace ) {
                if (! $app->can_do( 'can_livepreview' ) ) {
                    return;
                }
            } else {
                if (! $app->can_do( 'can_livepreview' )
                    && ! $app->can_do( 'can_livepreview', null, null, $workspace ) ) {
                    return;
                }
            }
            $model = $app->param( '_model' );
            $id = $app->param( 'id' );
            $basemodel = $app->db->model( $model );
            if ( $model && $id && $basemodel->has_column( 'status' ) && $basemodel->has_column( 'user_id' ) ) {
                $obj = $basemodel->load( $id, null, 'id,status,user_id' );
                if ( $obj ) {
                    if ( $obj->status == 2 || $obj->status == 3 ) {
                        $user = $app->db->model( 'user' )->load( $obj->user_id );
                        if ( $user ) {
                            $app->user = $user;
                            return;
                        }
                    }
                }
            }
        }
        if ( $app->id !== 'Bootstrapper' ) {
            return;
        }
        if ( $workspace_id ) $name .= '-' . $workspace_id;
        $session = $app->param( 'session' ) ? $app->param( 'session' ) : $app->cookie_val( $name );
        if ( $session ) {
            $session = $app->db->model( 'session' )->get_by_key( ['name' => $session, 'kind' => 'LP'] );
            if ( $session->id && $session->user_id ) {
                $user = $app->db->model( 'user' )->load( $session->user_id );
                if ( $user && $user->status == 2 && !$user->lock_out ) {
                    // Static setting page.
                    $user_session = $app->db->model( 'session' )->get_by_key( ['kind' => 'US', 'user_id' => $user->id ] );
                    if (! $user_session->id ) {
                        return;
                    }
                    $app->bake_cookie( $login_cookie_name, $user_session->name, $expires, $path, true, $app->cookie_domain );
                    $app->force_dynamic = null;
                    list( $request, $param ) = array_pad( explode( '?', $app->request_uri ), 2, null );
                    $request_uri = $app->base . $request;
                    $livepreview_page_url = $this->get_config_value( 'livepreview_page_url', $workspace_id );
                    $is_setting_page = $livepreview_page_url && $livepreview_page_url == $request_uri;
                    if ( $app->param( 'session' ) ) {
                        $app->force_dynamic = 0;
                        $app->bake_cookie( $name, $app->param( 'session' ), 0, $app->cookie_path, true );
                        if ( $is_setting_page ) {
                            parse_str( $param, $params );
                            unset( $params['session'] );
                            $param = http_build_query( $params );
                            $request_uri = strpos( $request_uri, '?' ) === false
                                      ? $request_uri .= '?' . $param
                                      : $request_uri .= '&' . $$param;
                            $app->redirect( $request_uri, true );
                            exit();
                        }
                    }
                }
            }
        }
        if (! $app->user() ) return;
        $app->do_conditional = false;
        $app->static_conditional = false;
        $workspace = $app->workspace_id
                   ? $app->db->model( 'workspace' )->load( $workspace_id ) : null;
        $ts = isset( $_COOKIE['pt-live-preview-ts'] )
                         ? $_COOKIE['pt-live-preview-ts'] : '';
        if ( $app->workspace_id && isset( $_COOKIE['pt-live-preview-ts-' . $app->workspace_id ] ) ) {
            $ts = $_COOKIE['pt-live-preview-ts-' . $app->workspace_id ];
            $this->in_workspace = $app->workspace_id;
        }
        $datebased = $this->in_workspace
                   ? $this->get_config_value( 'livepreview_date_based', $workspace_id )
                   : $this->get_config_value( 'livepreview_date_based' );
        if ( $datebased ) {
            $datebased_models = preg_split( '/\s*,\s*/', $datebased );
            foreach ( $datebased_models as $model ) {
                $app->register_callback( $model, 'publish_date_based',
                                         'publish_date_based', 1000, $this );
            }
        }
        if (! $workspace ) {
            if (! $app->can_do( 'can_livepreview' ) ) {
                return;
            }
        } else {
            if (! $app->can_do( 'can_livepreview' )
                && ! $app->can_do( 'can_livepreview', null, null, $workspace ) ) {
                return;
            }
        }
        if ( $app->mode == 'live_preview' ) {
            $bootstrapper = $app->bootstrapper;
            if ( $bootstrapper->allow_login ) {
                $app->ctx->vars['prototype_path'] = $bootstrapper->prototype_path
                                ? $bootstrapper->prototype_path : $app->path;
                $app->ctx->vars['workspace_id'] = $app->workspace_id;
                return $app->build_page( 'live_preview_site.tmpl' );
            }
        }
        if (! $ts ) return;
        if ( $ts ) {
            $ts = preg_replace( '/[^0-9]/', '', $ts );
            $y = substr( $ts, 0, 4 );
            $m = substr( $ts, 4, 2 );
            $d = substr( $ts, 6, 2 );
            if (! checkdate( $m, $d, $y ) ) {
                $this->clear_lp_cookie();
                return;
            }
        }
        if ( date('YmdHis') > $ts ) {
            $this->clear_lp_cookie();
            return;
        }
        $status_pending = $this->in_workspace
                        ? $this->get_config_value( 'livepreview_status_pending', $workspace_id )
                        : $this->get_config_value( 'livepreview_status_pending' );
        if ( $status_pending ) {
            $this->status_pending = true;
        }
        $app->force_filter = true;
        $app->force_dynamic = $app->force_dynamic === 0 ? false : true;
        if ( $is_setting_page ) {
            $app->force_dynamic = false;
        }
        $app->no_cache = true;
        $app->register_callback( 'urlinfo', 'post_load_object', 'post_load_urlinfo', 1000, $this );
        $status_models = $app->db->model( 'table' )->load( ['start_end' => 1] );
        foreach ( $status_models as $table ) {
            $model = $table->name;
            $app->register_callback( $model, 'pre_listing', 'pre_listing', 1000, $this );
            $app->register_callback( $model, 'post_load_objects', 'post_load_objects', 1000, $this );
            $app->register_callback( $model, 'post_load_object', 'post_load_object', 1000, $this );
            $app->register_callback( $model, 'pre_view', 'pre_view', 1000, $this );
            $app->register_callback( $model, 'pre_archive_list', 'pre_archive_list', 1000, $this );
            $app->register_callback( $model, 'pre_archive_count', 'pre_listing', 1000, $this );
        }
        $app->register_callback( 'meta', 'pre_view', 'pre_view', 1000, $this );
        $app->register_callback( 'template', 'post_rebuild', 'post_rebuild', 1000, $this );
        $app->publish_callbacks = true;
        $this->preview = true;
        $this->preview_ts = $ts;
        if ( $this->in_workspace ) {
            $status_in_pending = isset( $_COOKIE['pt-live-preview-pending-' . $app->workspace_id ] )
                     ? $_COOKIE['pt-live-preview-pending-' . $app->workspace_id ] : '';
        } else {
            $status_in_pending = isset( $_COOKIE['pt-live-preview-pending'] )
                     ? $_COOKIE['pt-live-preview-pending'] : '';
        }
        if ( $status_in_pending ) {
            $this->status_in_pending = true;
        }
    }

    function hdlr_if_livepreview ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        if ( $app->id != 'Bootstrapper' ) {
            return false;
        }
        if (! $this->preview ) return false;
        if (! $this->preview_ts ) return false;
        $ts = $this->preview_ts;
        if ( date('YmdHis') > $ts ) {
            $this->clear_lp_cookie();
            return false;
        }
        return true;
    }

    function hdlr_if_livepreview_inpending ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        if ( $app->id != 'Bootstrapper' ) {
            return false;
        }
        if (! $this->preview ) return false;
        if (! $this->preview_ts ) return false;
        $ts = $this->preview_ts;
        if ( date('YmdHis') > $ts ) {
            $this->clear_lp_cookie();
            return false;
        }
        if ( $this->status_pending && $this->status_in_pending ) {
            return true;
        }
        return false;
    }

    function hdlr_livepreview_date ( $args, $ctx ) {
        $app = $ctx->app;
        if ( $app->id != 'Bootstrapper' ) {
            return '';
        }
        if (! $this->preview ) return '';
        if (! $this->preview_ts ) return '';
        $ts = $this->preview_ts;
        if ( date('YmdHis') > $ts ) {
            $this->clear_lp_cookie();
            return '';
        }
        if ( isset( $args['format'] ) && $args['format'] ) {
            $args['ts'] = $ts;
            $ts = $ctx->function_date( $args, $ctx );
        }
        return $ts;
    }

    function post_rebuild ( $cb, $app, $tmpl, &$data ) {
        if ( $app->id != 'Bootstrapper' ) {
            return;
        }
        if (! $this->preview ) return '';
        if (! $this->preview_ts ) return '';
        $ts = $this->preview_ts;
        if ( date('YmdHis') > $ts ) {
            $this->clear_lp_cookie();
            return;
        }
        $workspace_id = (int) $app->workspace_id;
        $html = $this->in_workspace
              ? $this->get_config_value( 'livepreview_insert_html', $workspace_id, true )
              : $this->get_config_value( 'livepreview_insert_html' );
        if ( $html ) {
            if ( preg_match ( '/<\/body>/i', $data ) ) {
                $html = $app->build( $html );
                $data = preg_replace( '/(<\/body>)/i', "$html$1", $data );
            }
        }
    }

    function publish_date_based ( &$cb, $app, &$wheres ) {
        if ( array_values( $wheres ) === $wheres ) {
            $model = $cb['model'];
            $sqls = [];
            foreach ( $wheres as $sql ) {
                if ( $sql == "{$model}_status=4" ) {
                    if ( $this->status_pending ) {
                        $sql = "( {$model}_status=4 OR {$model}_status=3 OR {$model}_status=2 )";
                    } else {
                        $sql = "( {$model}_status=4 OR {$model}_status=3 )";
                    }
                }
                $sqls[] = $sql;
            }
            $wheres = $sqls;
        } else {
            // $count_terms;
            if ( $this->status_pending === null ) {
                $status_pending = $this->in_workspace
                                ? $this->get_config_value( 'livepreview_status_pending', $this->in_workspace )
                                : $this->get_config_value( 'livepreview_status_pending' );
                if ( $status_pending ) {
                    $this->status_pending = true;
                }
            }
            if ( isset( $wheres['status'] ) && $wheres['status'] == 4 ) {
                if ( $this->status_pending ) {
                    $wheres['status'] = [2, 3, 4];
                } else {
                    $wheres['status'] = [3, 4];
                }
            }
        }
    }

    function pre_archive_list ( &$cb, $app, &$wheres ) {
        if (! $this->preview ) return;
        if (! $this->preview_ts ) return;
        $model = $cb['model'];
        $ts = $this->preview_ts;
        $status_stmt = "{$model}_status=3";
        if ( $this->status_pending && $this->status_in_pending ) {
            $status_stmt = "( {$model}_status=2 OR {$model}_status=3 )";
        }
        $_extra  = " ( ( {$model}_status=4 AND ( ( {$model}_has_deadline != 1 ";
        $_extra .= "OR {$model}_has_deadline IS NULL ) OR ";
        $_extra .= "{$model}_unpublished_on > $ts ) ) ";
        $_extra .= "OR ( {$status_stmt} AND {$model}_published_on <= {$ts} ";
        $_extra .= "AND ( ( {$model}_has_deadline != 1 OR {$model}_has_deadline ";
        $_extra .= "IS NULL ) OR {$model}_unpublished_on > {$ts} ) ) )";
        $sqls = [];
        foreach ( $wheres as $sql ) {
            if ( $sql != "{$model}_status=4" ) {
                $sqls[] = $sql;
            }
        }
        $sqls[] = $_extra;
        $wheres = $sqls;
    }

    function pre_view ( &$cb, $app, &$obj, &$url ) {
        $model = $obj->_model;
        if ( $model != 'meta' && ! $obj->has_column( 'rev_type' ) ) {
            return;
        }
        if (! $this->preview ) return;
        if (! $this->preview_ts ) return;
        $ts = $this->preview_ts;
        $args = ['sort' => 'published_on', 'direction' => 'descend', 'limit' => 1];
        $status_min = 3;
        if ( $model == 'meta' ) {
            $meta_model = $obj->model;
            $meta_object_id = $obj->object_id;
            $meta_obj = $app->db->model( $meta_model )->load( (int)$meta_object_id );
            if (! $meta_obj ) return;
            if (! $meta_obj->has_column( 'status' ) ||
                ! $meta_obj->has_column( 'has_deadline' ) ||
                ! $meta_obj->has_column( 'unpublished_on' ) ||
                ! $meta_obj->has_column( 'published_on' ) ||
                ! $meta_obj->has_column( 'rev_type' ) ) {
                return;
            }
            $status_stmt = 3;
            if ( $this->status_pending && $this->status_in_pending ) {
                $status_stmt = [2, 3];
                $status_min = 2;
            }
            $revision = $app->db->model( $meta_model )->load
            ( ['rev_object_id' => $meta_obj->id, 'rev_type' => 2, 'status' => $status_stmt,
               'published_on' => ['<=' => $ts ] ], $args );
            if ( count( $revision ) ) {
                $meta_obj = $revision[0];
                $col = $obj->key;
                if ( $meta_obj->has_column( $col ) ) {
                    $meta = $app->db->model( 'meta' )->load( [
                        'object_id' => $meta_obj->id, 'model' => $meta_obj->_model,
                        'key' => $col, 'kind' => 'metadata'
                    ] );
                    if ( is_array( $meta ) && !empty( $meta ) ) {
                        $meta = $meta[0];
                        $metadata = $meta->text;
                        $metadata = json_decode( $metadata, true );
                        if ( $obj->kind == 'thumbnail' && $obj->data ) {
                            $args = unserialize( $obj->data );
                            $args['wants'] = 'data';
                            $data = PTUtil::thumbnail_url( $meta_obj, $args );
                        } else {
                            $data = $meta_obj->$col;
                        }
                        $mime_type = $metadata['mime_type'];
                        $app->print( $data, $mime_type );
                    }
                }
            }
        } else {
            $status_stmt = 3;
            if ( $this->status_pending && $this->status_in_pending ) {
                $status_stmt = [2, 3];
                $status_min = 2;
            }
            $revision = $app->db->model( $obj->_model )->load
            ( ['rev_object_id' => $obj->id, 'rev_type' => 2, 'status' => $status_stmt,
               'published_on' => ['<=' => $ts ] ], $args );
            if ( count( $revision ) ) {
                $obj = $revision[0];
            }
            $url->publish_file( -1 );
        }
        $status_published = $app->status_published( $obj->_model );
        if ( $status_published == 4 ) {
            if ( $obj->has_column( 'has_deadline' ) && $obj->has_deadline
                && $obj->has_column( 'unpublished_on' ) && $obj->unpublished_on ) {
                $unpublished_on = $obj->db2ts( $obj->unpublished_on );
                if ( $unpublished_on <= $ts ) {
                    $app->bootstrapper->page_not_found( $app, $obj->workspace );
                    exit();
                }
            }
            if ( $status_min > $obj->status || $obj->status == 5 ) {
                $app->bootstrapper->page_not_found( $app, $obj->workspace );
                exit();
            } else if ( $obj->status != 4 && $obj->has_column( 'published_on' ) ) {
                // 2 or 3
                $published_on = $obj->db2ts( $obj->published_on );
                if ( $published_on > $ts ) {
                    $app->bootstrapper->page_not_found( $app, $obj->workspace );
                    exit();
                }
            }
        }
    }

    function post_load_urlinfo ( $cb, $app, $url ) {
        if ( $app->user()->is_superuser ) return true;
        if ( $workspace_id = $url->workspace_id ) {
            if ( $app->is_workspace_admin( $workspace_id ) ) {
                return true;
            }
        }
        if ( $url->object_id && $url->model ) {
            $obj = $app->db->model( $url->model )->load( (int) $url->object_id );
            if ( $obj ) {
                $workspace = null;
                if ( $obj->has_column( 'workspace_id' ) && $obj->workspace ) {
                    $workspace = $obj->workspace;
                } else {
                    $workspace = $app->db->model( 'workspace' )->new();
                    $workspace->id( 0 );
                }
                $user = $app->user();
                $perms = $app->permissions();
                $ws_perms = isset( $perms[ $url->workspace_id ] ) ? $perms[ $url->workspace_id ] : [];
                $permission = $obj->has_column( 'status' ) ? 'can_activate_' . $url->model
                            : 'can_create_' . $url->model;
                if (! in_array( $permission, $ws_perms ) ) {
                    $ws_perms[] = $permission;
                }
                if ( $obj->has_column( 'user_id' ) ) {
                    $permission = 'can_update_all_' . $url->model;
                    if (! in_array( $permission, $ws_perms ) ) {
                        $ws_perms[] = $permission;
                    }
                }
                $perms[ $url->workspace_id ] = $ws_perms;
                $app->stash( 'user_permissions_' . $user->id, $perms );
                if ( $app->can_do( $url->model, 'edit', $obj, $workspace ) ) {
                    return true;
                }
                $user_id = null;
                if ( $obj->has_column( 'user_id' ) ) {
                    $user_id = $obj->user_id;
                }
                if (! $user_id ) {
                    if ( $obj->has_column( 'modified_by' ) && $obj->modified_by ) {
                        $user_id = $obj->modified_by;
                    } else if ( $obj->has_column( 'created_by' ) && $obj->created_by ) {
                        $user_id = $obj->created_by;
                    }
                }
                $status_published = $app->status_published( 'user' );
                if ( $user_id ) {
                    $user = $app->db->model( 'user' )->load( $user_id );
                    if ( $user && !$user->lock_out && $user->status == $status_published ) {
                        $app->user = $user;
                    }
                }
                if (! $app->can_do( $url->model, 'edit', $obj, $workspace ) ) {
                    // There is no time to pass here.
                    $user = $app->db->model( 'user' )->new(
                        ['is_superuser' => 1, 'lock_out' => 0, 'status' => $status_published ] );
                    $app->user = $user;
                }
            }
        }
    }

    function post_load_object ( &$cb, $app, &$obj ) {
        if (! $obj->has_column( 'rev_type' ) ) {
            return;
        }
        if (! $this->preview ) return;
        if (! $this->preview_ts ) return;
        if (! $obj->has_column( 'status' ) ||
            ! $obj->has_column( 'has_deadline' ) ||
            ! $obj->has_column( 'unpublished_on' ) ||
            ! $obj->has_column( 'published_on' ) ) {
            return;
        }
        $ts = $this->preview_ts;
        $args = ['sort' => 'published_on', 'direction' => 'descend', 'limit' => 1];
        $status_stmt = 3;
        if ( $this->status_pending && $this->status_in_pending ) {
            $status_stmt = [2, 3];
        }
        $revision = $app->db->model( $obj->_model )->load
        ( ['rev_object_id' => $obj->id, 'rev_type' => 2, 'status' => $status_stmt,
           'published_on' => ['<=' => $ts ] ], $args );
        if ( count( $revision ) ) {
            $obj = $revision[0];
        }
    }

    function post_load_objects ( &$cb, &$app, &$objects, &$count_obj ) {
        if ( empty( $objects ) ) return;
        if (! $this->preview ) return;
        if (! $this->preview_ts ) return;
        $_model = $objects[0];
        if (! $_model->has_column( 'rev_type' ) ||
            ! $_model->has_column( 'status' ) ||
            ! $_model->has_column( 'has_deadline' ) ||
            ! $_model->has_column( 'unpublished_on' ) ||
            ! $_model->has_column( 'published_on' ) ) {
            return;
        }
        $ts = $this->preview_ts;
        $model = $cb['model'];
        $args = ['sort' => 'published_on', 'direction' => 'descend', 'limit' => 1];
        $status_stmt = 3;
        if ( $this->status_pending && $this->status_in_pending ) {
            $status_stmt = [2, 3];
        }
        $loop_objects = [];
        foreach ( $objects as $obj ) {
            $revision = $app->db->model( $model )->load
            ( ['rev_object_id' => $obj->id, 'rev_type' => 2, 'status' => $status_stmt,
               'published_on' => ['<=' => $ts ] ], $args );
            if ( count( $revision ) ) {
                $revision = $revision[0];
                if ( $revision->has_deadline ) {
                    $unpublished_on = $revision->db2ts( $revision->unpublished_on );
                    if ( $ts >= $unpublished_on ) {
                        $loop_objects[ (int) $obj->id ] = $obj;
                        continue;
                    }
                }
                $loop_objects[ (int) $revision->id ] = $revision;
            } else {
                $loop_objects[ (int) $obj->id ] = $obj;
            }
        }
        $count_obj = count( $loop_objects );
        $objects = array_values( $loop_objects );
    }

    function pre_listing ( &$cb, $app, &$terms, &$args, &$extra ) {
        if (! $this->preview ) return;
        if (! $this->preview_ts ) return;
        $model = $cb['model'];
        $ts = $this->preview_ts;
        if ( isset( $args['include_draft'] ) || isset( $args['status_not'] )
            || isset( $args['status_lt'] ) || isset( $args['status_gt'] ) ) {
            return;
        }
        if ( isset( $terms['status'] ) ) {
            unset( $terms['status'] );
        } else {
            if ( isset( $cb['args'] ) && isset( $cb['args']['include_draft'] ) ) {
                if ( $cb['args']['include_draft'] ) {
                    return;
                }
            }
        }
        $args['cols'] = '*';
        $status_stmt = "{$model}_status=3";
        if ( $this->status_pending && $this->status_in_pending ) {
            $status_stmt = "( {$model}_status=2 OR {$model}_status=3 )";
        }
        $_extra  = " AND ( ( {$model}_status=4 AND ( ( {$model}_has_deadline != 1 ";
        $_extra .= "OR {$model}_has_deadline IS NULL ) OR ";
        $_extra .= "{$model}_unpublished_on > $ts ) ) ";
        $_extra .= "OR ( {$status_stmt} AND {$model}_published_on <= {$ts} ";
        $_extra .= "AND ( ( {$model}_has_deadline != 1 OR {$model}_has_deadline ";
        $_extra .= "IS NULL ) OR {$model}_unpublished_on > {$ts} ) ) )";
        $extra = $_extra . $extra;
        $ctx = $app->ctx;
        if ( isset( $terms['rev_type'] ) ) {
            $terms['rev_type'] = ['IN' => [0, 2] ];
        }
        if ( isset( $terms['id'] ) && isset( $terms['rev_type'] ) &&
           ( isset( $terms['id']['IN'] ) || isset( $terms['id']['in'] ) ) ) {
            $_terms = $terms;
            $_terms['rev_type'] = 2;
            $replace_map = [];
            $objects = $app->db->model( $model )->load( $_terms, $args, 'id,published_on,rev_object_id', $extra );
            foreach ( $objects as $object ) {
                $published_on = $object->db2ts( $object->published_on );
                if ( ( $published_on < $ts ) && $object->rev_object_id ) {
                    $replace_map[ $object->id ] = $object->rev_object_id;
                }
            }
            if (! empty( $replace_map ) ) {
                $ids = isset( $terms['id']['IN'] ) ? $terms['id']['IN'] : $terms['id']['in'];
                foreach ( $ids as $idx => $id ) {
                    if ( isset( $replace_map[ $id ] ) ) {
                        $ids[ $idx ] = (int) $replace_map[ $id ];
                    }
                }
                $terms['id'] = ['IN' => $ids ];
            }
        }
    }

    function clear_lp_cookie () {
        $app = Prototype::get_instance();
        $postfix = $this->in_workspace ? '-' . $app->workspace_id : '';
        setcookie( "pt-live-preview-ts{$postfix}", '', -1, '/' );
        setcookie( "pt-live-preview-date{$postfix}", '', -1, '/' );
        setcookie( "pt-live-preview-time{$postfix}", '', -1, '/' );
        setcookie( "pt-live-preview-pending{$postfix}", '', -1, '/' );
        setcookie( "pt-live-preview-pt-user{$postfix}", '', -1, '/' );
        if ( isset( $_COOKIE["pt-live-preview-ts{$postfix}"] ) ) {
            unset( $_COOKIE["pt-live-preview-ts{$postfix}"] );
        }
        if ( isset( $_COOKIE["pt-live-preview-date{$postfix}"] ) ) {
            unset( $_COOKIE["pt-live-preview-date{$postfix}"] );
        }
        if ( isset( $_COOKIE["pt-live-preview-time{$postfix}"] ) ) {
            unset( $_COOKIE["pt-live-preview-time{$postfix}"] );
        }
        if ( isset( $_COOKIE["pt-live-preview-pending{$postfix}"] ) ) {
            unset( $_COOKIE["pt-live-preview-pending{$postfix}"] );
        }
        if ( isset( $_COOKIE["pt-live-preview-pt-user{$postfix}"] ) ) {
            unset( $_COOKIE["pt-live-preview-pt-user{$postfix}"] );
        }
    }

    function live_preview ( $app ) {
        if (! $app->can_do( 'can_livepreview' ) ) {
            return $app->error( 'Permission denied.' );
        }
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $postfix = '';
        if ( $workspace_id ) {
            if ( ! $app->can_do( 'can_livepreview', null, null, $app->workspace() ) ) {
                return $app->error( 'Permission denied.' );
            }
            $this->in_workspace = true;
            $postfix = '-' . $workspace_id;
        } else {
            if (! $app->can_do( 'can_livepreview' ) ) {
                return $app->error( 'Permission denied.' );
            }
        }
        $page_url = $this->get_config_value( 'livepreview_page_url', $workspace_id );
        $this_page = $app->base . $_SERVER['REQUEST_URI'];
        if ( strpos( $this_page, '&session=' ) !== false ) {
            $this_page = preg_replace( '/&session=.*?$/', '', $this_page );
        }
        $page_url = $page_url ? $app->build( $page_url ) : '';
        if ( $app->request_method === 'GET' ) {
            if ( $page_url && $page_url != $this_page ) {
                if ( $workspace_id && strpos( $page_url, 'workspace_id=' ) === false ) {
                    $page_url = strpos( $page_url, '?' ) === false
                              ? $page_url .= '?workspace_id=' . $workspace_id
                              : $page_url .= '&workspace_id=' . $workspace_id;
                }
                $session_name = $app->magic();
                $session = $app->db->model( 'session' )->new(
                          ['name' => $session_name, 
                           'workspace_id' => $workspace_id, 'user_id' => $app->user->id, 'kind' => 'LP',
                           'start' => $app->request_time,
                           'expires' => $app->request_time + $app->livepreview_session_timeout ] );
                $session->save();
                $page_url = strpos( $page_url, '?' ) === false
                          ? $page_url .= '?session=' . $session_name
                          : $page_url .= '&session=' . $session_name;
                $app->redirect( $page_url );
                exit();
            }
        }
        $tmpl = dirname( $this->path ) . DS . 'tmpl' . DS . 'live_preview.tmpl';
        $app->ctx->vars['live_preview_date'] = date( 'Y-m-d' );
        $app->ctx->vars['live_preview_time'] = date( 'H:i:s' );
        $app->ctx->vars['status_pending']
            = $this->get_config_value( 'livepreview_status_pending', $workspace_id );
        if ( isset( $_COOKIE["pt-live-preview-ts{$postfix}"] ) ) {
            $ts = $_COOKIE["pt-live-preview-ts{$postfix}"];
            if ( $ts && date('YmdHis') > $ts ) {
                $this->clear_lp_cookie();
            }
        }
        if ( $app->request_method === 'POST' ) {
            $app->validate_magic();
            $date = $app->param( 'live_preview_date' );
            $time = $app->param( 'live_preview_time' );
            $pending = $app->param( 'livepreview_status_pending' );
            $_time = $time;
            $action_type = $app->param( 'action_type' );
            if ( $action_type == 'set' ) {
                $time = preg_replace( '/[^0-9]/', '', $time );
                if ( strlen( $time ) < 6 ) {
                    $pad = 6 - strlen( $time );
                    $_time .= ':';
                    for ( $i = 0; $i < $pad; $i++ ) {
                        $time .= '0';
                        $_time.= '0';
                    }
                }
                $ts = "{$date} {$time}";
                $msg_ts = "{$date} {$_time}";
                $ts = preg_replace( '/[^0-9]/', '', $ts );
                $y = substr( $ts, 0, 4 );
                $m = substr( $ts, 4, 2 );
                $d = substr( $ts, 6, 2 );
                if (! checkdate( $m, $d, $y ) ) {
                    $error_msg = $app->translate( '%s is invalid.',
                        $app->translate( 'Date & Time' ) );
                    $app->ctx->vars['error'] = $error_msg;
                    return $app->build_page( $tmpl );
                }
                if ( $ts && date('YmdHis') > $ts ) {
                    $error_msg = $this->translate( 'The past date can not be specified.' );
                    $app->ctx->vars['error'] = $error_msg;
                    return $app->build_page( $tmpl );
                }
                setcookie( "pt-live-preview-ts{$postfix}", $ts, 0, '/' );
                setcookie( "pt-live-preview-date{$postfix}", $date, 0, '/' );
                setcookie( "pt-live-preview-time{$postfix}", $_time, 0, '/' );
                $_COOKIE["pt-live-preview-ts{$postfix}"] = $ts;
                $date = preg_replace( '/[^0-9]/', '', $date );
                $_time = preg_replace( '/[^0-9]/', '', $_time );
                $_COOKIE["pt-live-preview-date{$postfix}"] = $date;
                $_COOKIE["pt-live-preview-time{$postfix}"] = $_time;
                if ( $pending ) {
                    setcookie( "pt-live-preview-pending{$postfix}", 1, 0, '/' );
                    $_COOKIE["pt-live-preview-pending{$postfix}"] = 1;
                } else {
                    setcookie( "pt-live-preview-pending{$postfix}", '', -1, '/' );
                    if ( isset( $_COOKIE["pt-live-preview-pending{$postfix}"] ) ) {
                        unset( $_COOKIE["pt-live-preview-pending{$postfix}"] );
                    }
                }
                $app->ctx->vars['header_alert_message'] = $this->translate(
                'Set the date and time to live preview at %s.', $msg_ts );
            } else {
                $this->clear_lp_cookie();
                $app->ctx->vars['header_alert_message'] = $this->translate(
                'Clear the date and time to live preview.' );
            }
        }
        return $app->build_page( $tmpl );
    }
}