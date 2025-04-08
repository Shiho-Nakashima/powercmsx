<?php

class PTViewer {

    public $prototype_path = '';
    public $allow_login    = false;
    public $init_tags      = false;

    function view ( $app, $workspace_id = null ) {
        $app->id = 'Bootstrapper';
        $app->bootstrapper = $this;
        $app->workspace_id = (int) $workspace_id;
        $language = $app->param( '_language' );
        if ( $language && !in_array( $language, $app->languages ) ) {
            $language = null;
        }
        if ( $language ) {
            $app->language = $language;
        }
        $app->init();
        $fmgr = $app->fmgr;
        $workspace = null;
        $pt_path = dirname( $app->pt_path ) . DS;
        if ( $workspace_id ) {
            $workspace = $app->db->model( 'workspace' )->load( $workspace_id );
            if (!$workspace ) {
                $request_uri = $app->base . $app->request_uri;
                $workspace = $this->get_workspace_from_url( $app, $request_uri );
            }
        }
        if (! $workspace ) {
            $config = $app->get_config( 'document_root' );
            if ( is_object( $config ) && $config->value ) {
                $app->document_root = $config->value;
            }
        } else if ( $workspace->document_root ) {
            $app->document_root = $workspace->document_root;
        }
        $document_root = $app->document_root;
        list( $request, $param ) = array_pad( explode( '?', $app->request_uri ), 2, null );
        if ( preg_match( '!/$!', $request ) ) {
            $request .= $app->directory_index;
        }
        $max_size = $app->viewer_size_limit ? $app->viewer_size_limit : 50000000;
        $user = null;
        if ( $app->mode == 'preview' && $app->param( 'token' ) ) {
            $magic = $app->param( 'token' );
            $user = $app->user();
            if (!$user ) {
                $key = $app->param( 'key' );
                $user_id = $app->decrypt( $key, $magic );
                if ( $user_id ) $user_id = (int) $user_id;
                $user = $app->db->model( 'user' )->load( $user_id );
            }
            if (!$user ) {
                return $app->error( 'Invalid request.' );
            }
            if ( $this->allow_login ) {
                $user_session = $app->db->model( 'session' )->get_by_key(
                    ['user_id' => $user->id, 'key' => 'user', 'kind' => 'US'] );
                if ( $user_session->id ) {
                    $path = $app->cookie_path ? $app->cookie_path : $app->path;
                    $name = $app->cookie_name;
                    $expires = $app->sess_timeout;
                    $app->bake_cookie( $name, $user_session->name, $expires, $path, true, $app->cookie_domain );
                }
            }
            $terms = ['name' => $magic, 'user_id' => $user->id, 'kind' => 'PV'];
            if ( $app->workspace_id ) $terms['workspace_id'] = $app->workspace_id;
            $session = $app->db->model( 'session' )->get_by_key( $terms );
            if (!$session->id ) {
                return $app->error( 'Invalid request.' );
            }
            $mime_type = $session->key;
            if ( $mime_type ) {
                header( "Content-type: {$mime_type}" );
            }
            echo $session->text;
            $session->remove();
            exit();
        }
        $extension = PTUtil::get_extension( $request, true );
        if ( $extension && $extension == 'php' && basename( $request ) === 'pt-view.php' ) {
            exit();
        }
        if ( $app->use_timezone ) {
            if ( $workspace && $workspace->timezone ) {
                $app->date_default_timezone_set( $workspace->timezone );
            } else if (! $workspace ) {
                $app->date_default_timezone_set( $app->timezone );
            }
        }
        $file_path = $document_root . $request;
        $existing_data = null;
        $mtime = null;
        $ctx = $app->ctx;
        if (! $theme_static = $app->theme_static ) {
            $theme_static = $app->path . 'theme-static/';
            $app->theme_static = $theme_static;
        }
        $ctx->vars['theme_static'] = $theme_static;
        $ctx->vars['application_dir'] = __DIR__;
        $ctx->vars['application_path'] = $app->path;
        if ( strpos( $file_path, '../' ) !== false || strpos( $file_path, '..' . DS ) !== false ) {
            $this->page_not_found( $app, $workspace );
        }
        $app->init_callbacks( 'urlinfo', 'dynamic_view' );
        if (! $app->dynamic_init_tags_later ) {
            $app->init_tags();
            $this->init_tags = true;
        }
        $host = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : null;
        if (! $host ) {
            $host = isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : null;
        }
        $protocol= $app->is_secure ? 'https' : 'http';
        $current_uri = "{$protocol}://{$host}{$request}";
        if ( is_numeric( $workspace_id ) ) {
            $terms['workspace_id'] = $workspace_id;
        }
        $user = $app->user();
        $args = [];
        if ( $user ) {
            $terms['delete_flag'] = [0, 1];
            $args = ['sort' => 'delete_flag', 'direction' => 'ascend', 'limit' => 1];
        }
        $uri = $current_uri;
        $basename = basename( $request );
        if ( $app->validate_url ) {
            $terms['url'] = $uri;
            unset( $terms['workspace_id'] );
        } else if ( $app->dynamic_ignore_scope ) {
            unset( $terms['workspace_id'] );
            $terms['relative_url'] = $request;
        } else {
            $terms['relative_url'] = $request;
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, $args );
        if (! $url->id && $app->validate_url && strpos( $basename, '%' ) !== false && $app->no_encode_filename ) {
            $decorded = urldecode( $uri );
            $decorded = str_replace( ' ', '%20', $decorded );
            $terms['url'] = $decorded;
            $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, $args );
        }
        if (! $url->id ) {
            if ( strpos( $basename, '%' ) !== false && !$app->encode_filename_compat ) {
                $request = $app->ctx->modifier_decode_url_basename( $request, 1, $app->ctx );
            }
            $terms['relative_url'] = $request;
            if ( isset( $terms['url'] ) ) {
                $uri = "{$protocol}://{$host}{$request}";
                $terms['url'] = $uri;
            }
            $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, $args );
            if (! $url->id && strpos( $file_path, '%20' ) !== false ) {
                if ( isset( $terms['relative_url'] ) ) {
                    $terms['relative_url'] = str_replace( '%20', ' ', $terms['relative_url'] );
                }
                if ( isset( $terms['url'] ) ) {
                    $terms['url'] = str_replace( '%20', ' ', $terms['url'] );
                }
                $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, $args );
            }
            if ( $url->id ) {
                $file_path = $url->file_path;
            }
        }
        $regex = '<\${0,1}' . $ctx->prefix;
        if ( $fmgr->exists( $file_path ) && is_file( $file_path ) && !$app->force_dynamic ) {
            $denied_exts = explode( ',', $app->denied_exts );
            if ( in_array( $extension, $denied_exts ) ) {
                $this->page_not_found( $app, $workspace );
            }
            $filesize = filesize( $file_path );
            if ( $max_size < $filesize ) {
                PTUtil::export_data( $url->file_path, null, true );
                exit();
            }
            $mime_type = PTUtil::get_mime_type( $file_path );
            $mtime = filemtime( $file_path );
            $data = file_get_contents( $file_path );
            if ( strpos( $mime_type, 'text' ) === false
                || !preg_match( "/$regex/i", $data ) ) {
                header( 'HTTP/1.1 200 OK' );
                $app->do_conditional = $app->static_conditional;
                if ( $app->eval_in_view && strpos( $data, '<?php' ) !== false ) {
                    ob_start();
                    eval( '?>' . $data );
                    $data = ob_get_clean();
                }
                $callback = ['name' => 'dynamic_view', 'model' => 'urlinfo', 'object' => null, 'workspace' => $workspace ];
                $app->run_callbacks( $callback, 'urlinfo', $url, $data );
                $app->print( $data, $mime_type, $mtime );
            } else {
                $existing_data = $data;
            }
        }
        if (! $url->id && $app->dynamic_filename_compat ) {
            $request = rawurldecode( $request );
            $terms['relative_url'] = $request;
            if ( $app->validate_url ) {
                $terms['url'] = rawurldecode( $uri );
                unset( $terms['relative_url'], $terms['workspace_id'] );
            }
            $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, $args );
        } else if (! $url->id ) {
            $request = rawurldecode( $request );
            $terms = ['relative_url' => $request, 'workspace_id' => $workspace_id ];
            $terms['delete_flag'] = [0, 1];
            $args = ['sort' => 'delete_flag', 'direction' => 'ascend', 'limit' => 1];
            $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, $args );
        }
        if (! $url->id ) {
            $terms = ['url' => $uri ];
            $terms['delete_flag'] = [0, 1];
            $args = ['sort' => 'delete_flag', 'direction' => 'ascend', 'limit' => 1];
            $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, $args );
        }
        if ( $url->id && ( $workspace_id != $url->workspace_id ) ) {
            $workspace_id = (int) $url->workspace_id;
            $workspace = $url->workspace;
            if ( $app->use_timezone && $workspace && $workspace->timezone ) {
                $app->date_default_timezone_set( $workspace->timezone );
            }
        }
        $app->init_callbacks( 'urlinfo', 'post_load_object' );
        $callback = ['name' => 'post_load_object', 'model' => 'urlinfo'];
        $app->run_callbacks( $callback, 'urlinfo', $url );
        $user = $app->user();
        if ( $this->allow_login ) {
            if ( $app->request_method == 'GET' && $app->user() && $app->mode == 'login' ) {
                $app->redirect( $uri );
                exit();
            }
            if ( $app->mode =='logout' && $app->dynamic_view ) {
                if ( $user ) {
                    return $this->login_logout( $app, $workspace );
                }
            } else if ( $app->mode =='login' && $app->dynamic_view ) {
                return $this->login_logout( $app, $workspace );
            }
        }
        $ctx->stash( 'current_urlinfo', $url );
        $ctx->vars['current_archive_url'] = $url->url;
        $ctx->stash( 'current_archive_url', $url->url );
        $ctx->vars['current_archive_type'] = $url->archive_type;
        $ctx->vars['app_version'] = $app->app_version;
        unset( $ctx->vars['magic_token'] );
        $ctx->vars['appname'] = $app->appname;
        $ctx->include_paths[ $app->site_path ] = true;
        $url_obj = null;
        if ( $url->id && $url->delete_flag ) {
            $values = $url->get_values( true );
            unset( $values['id'], $values['url'], $values['dirname'], $values['relative_url'],
                   $values['relative_path'], $values['file_path'], $values['is_published'],
                   $values['was_published'], $values['md5'], $values['filemtime'],
                   $values['publish_file'], $values['delete_flag'] );
            $values['id'] = ['not' => $url->id ];
            $active = $app->db->model( 'urlinfo' )->load( $values );
            if ( $active && !empty( $active ) ) {
                $active = $active[0];
                if ( $active->id && !$active->delete_flag ) {
                    $this->page_not_found( $app, $workspace );
                }
            } else {
                unset( $values['id'] );
                $values['delete_flag'] = [0, 1];
                $count = $app->db->model( 'urlinfo' )->count( $values );
                if ( $count > 1 ) {
                    if ( $url->object_id && $url->model ) {
                        $url_obj = $app->db->model( $url->model )->load( $url->object_id );
                        if (! $url_obj ) {
                            $terms['id'] = ['!=' => $url->id ];
                            $args['sort'] = 'id';
                            $args['direction'] = 'descend';
                            $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, $args );
                            if ( $url->id && $url->object_id && $url->model ) {
                                $url_obj = $app->db->model( $url->model )->load( $url->object_id );
                            }
                        }
                        if (! $url_obj ) {
                            $this->page_not_found( $app, $workspace );
                        }
                    }
                }
            }
        }
        if ( $workspace && $workspace_id ) {
            $app->stash( 'workspace', $workspace );
            $ctx->stash( 'workspace', $workspace );
            $ctx->stash( 'workspace_id', $workspace_id );
            $ctx->include_paths[ $workspace->site_path ] = true;
        }
        if (! $url->id ) {
            if (! $existing_data && $fmgr->exists( $file_path ) && $app->allow_static ) {
                $extension = PTUtil::get_extension( $file_path, true );
                $denied_exts = $app->denied_exts;
                $denied_exts = preg_split( '/\s*,\s*/', $denied_exts );
                if ( in_array( $extension, $denied_exts ) ) {
                    $this->page_not_found( $app, $workspace );
                }
                $filesize = filesize( $file_path );
                if ( $max_size < $filesize ) {
                    PTUtil::export_data( $url->file_path, null, true );
                    exit();
                }
                $data = file_get_contents( $file_path );
                $mime_type = PTUtil::get_mime_type( $extension );
                $mtime = filemtime( $file_path );
                if ( strpos( $mime_type, 'text' ) === false
                    || !preg_match( "/$regex/i", $data ) ) {
                    header( 'HTTP/1.1 200 OK' );
                    if ( $app->eval_in_view && strpos( $data, '<?php' ) !== false ) {
                        ob_start();
                        eval( '?>' . $data );
                        $data = ob_get_clean();
                    }
                    $app->do_conditional = $app->static_conditional;
                    $app->print( $data, $mime_type, $mtime );
                } else {
                    $existing_data = $data;
                }
            } else {
                $this->page_not_found( $app, $workspace );
            }
        }
        $workspace = $workspace ? $workspace : $url->workspace;
        if (! $fmgr->exists( $file_path ) && ! $url->is_published &&
            $url->publish_file == 1 && ! $user ) {
            $this->page_not_found( $app, $workspace );
        }
        if ( $app->do_conditional && $url->filemtime && $url->mime_type ) {
            $app->print( '', $url->mime_type, $url->filemtime, true );
        }
        $workspace_id = (int) $url->workspace_id;
        $workspace = $url->workspace;
        if (! $user ) {
            if (! $app->dynamic_view ) {
                $this->page_not_found( $app, $workspace );
            }
        }
        if ( $workspace ) {
            $app->stash( 'workspace', $workspace );
            $ctx->vars['appname'] = $workspace->name;
            $ctx->vars['app_name'] = $workspace->name;
            $ctx->include_paths[ $workspace->site_path ] = true;
        } else {
            $ctx->vars['appname'] = $app->appname;
            $ctx->vars['app_name'] = $app->appname;
        }
        $object_id = (int) $url->object_id;
        $model = $url->model;
        $table = $app->db->model( 'table' )->load( ['name' => $model ] );
        if ( empty( $table ) ) {
            $this->page_not_found( $app, $workspace );
        }
        $table = $table[0];
        $model = $table->name;
        $app->get_scheme_from_db( $model );
        $can_view = false;
        if ( $table->has_status ) {
            $publish_status = $table->start_end ? 4 : 2;
            $obj_id = (int) $url->object_id;
            $url_obj = $url_obj ? $url_obj : $app->db->model( $model )->load( $obj_id );
            if (! $url_obj ) {
                $url->remove();
                $remove_uis = [ $url ];
                if (! $user ) {
                    unset( $terms['delete_flag'] );
                }
                // Same url exists?
                $terms['id'] = ['!=' => $url->id ];
                $other_urls = $app->db->model( 'urlinfo' )->load( $terms );
                foreach ( $other_urls as $other_url ) {
                    if ( $other_url->model && $other_url->object_id ) {
                        $url_obj = $app->db->model( $other_url->model )->load( $other_url->object_id );
                        if ( $url_obj ) {
                            $callback = ['name' => 'post_load_object', 'model' => 'urlinfo' ];
                            $app->run_callbacks( $callback, 'urlinfo', $other_url );
                            $url = $other_url;
                            $object_id = $other_url->object_id;
                        } else {
                            $remove_uis = [ $other_url ];
                            $other_url->remove();
                        }
                    }
                }
            }
            if (! $url_obj ) {
                $this->page_not_found( $app, $workspace );
            } else {
                if ( isset( $remove_uis ) && !empty( $remove_uis ) ) {
                    $app->db->model( 'urlinfo' )->remove_multi( $remove_uis );
                }
            }
            if ( $url_obj->status != $publish_status ) {
                if (! $user ) {
                    $login = $this->login_logout( $app, $workspace );
                    if ( $login === false ) {
                        $this->page_not_found( $app, $workspace );
                    }
                }
            } else {
                $can_view = true;
            }
        }
        $obj = $url_obj;
        $key = $url->key;
        if ( $object_id && $model ) {
            $obj = $app->db->model( $model )->load( $object_id );
            if ( $obj ) {
                if ( $obj->has_column( 'workspace_id' ) && $obj->workspace ) {
                    $workspace = $obj->workspace;
                }
                if ( $url->delete_flag ) {
                    if (! $user || ! $app->can_do( $model, 'edit', $obj, $workspace ) ) {
                        if ( $obj->_model === 'attachmentfile' && $url->object_id ) {
                            $refModel = null;
                            $refObj   = null;
                            $relation = $app->db->model( 'relation' )->get_by_key(
                                ['to_obj' => 'attachmentfile', 'to_id' => $url->object_id ] );
                            if ( $relation->id ) {
                                $refModel = $relation->from_obj;
                                $refObj = $app->db->model( $refModel );
                                $refCols = ['id'];
                                if ( $refObj->has_column( 'status' ) ) {
                                    $refCols[] = 'status';
                                }
                                if ( $refObj->has_column( 'user_id' ) ) {
                                    $refCols[] = 'user_id';
                                }
                                if ( $refObj->has_column( 'rev_type' ) ) {
                                    $refCols[] = 'rev_type';
                                }
                                if ( $refObj->has_column( 'workspace_id' ) ) {
                                    $refCols[] = 'workspace_id';
                                }
                                $refObj = $refObj->load( $relation->from_id, null, $refCols );
                            }
                            if (! $refObj ) {
                                $columns = $app->db->model( 'column' )->load(
                                    ['type' => 'int', 'rel_model' => 'attachmentfile'], null, 'name,table_id' );
                                foreach ( $columns as $column ) {
                                    $tbl = $app->db->model( 'table' )->load( $column->table_id, null, 'name' );
                                    $refObj = $app->db->model( $tbl->name )->get_by_key( [ $column->name => $url->object_id ] );
                                    if ( $refObj->id ) {
                                        $refModel = $tbl->name;
                                        break;
                                    }
                                }
                            }
                            if (! $refObj || ! $app->can_do( $refModel, 'edit', $refObj, $workspace ) ) {
                                $this->page_not_found( $app, $workspace, $app->translate( 'Permission denied.' ) );
                            }
                        } else {
                            $this->page_not_found( $app, $workspace, $app->translate( 'Permission denied.' ) );
                        }
                    }
                }
                $app->ctx->stash( 'current_object', $obj );
            }
            if ( $key == 'thumbnail' && $url->meta_id ) {
                $model = 'meta';
                $object_id = (int) $url->meta_id;
                $key = 'blob';
                $obj = $app->db->model( $model )->load( $object_id );
            }
        }
        $mapping = null;
        $mime_type = $url->mime_type ? $url->mime_type : PTUtil::get_mime_type( $request );
        if ( $url->class === 'file' ) {
            if (! $obj ) {
                $this->page_not_found( $app, $workspace );
            }
            $current = $app->get_permalink( $obj );
            if ( $current && $current != $url->url && $current != $current_uri && $url->delete_flag ) {
                $existing = $app->db->model( 'urlinfo' )->get_by_key(
                    ['id' => ['!=' => $url->id ], 'url' => ['!=' => $current_uri ],'model' => $url->model,
                     'object_id' => $url->object_id, 'key' => $url->key, 'class' => $url->class ] );
                if ( $existing->id ) {
                    $this->page_not_found( $app, $workspace );
                }
            }
            if ( isset( $obj ) && $key && $obj->has_column( $key ) ) {
                $callback = ['name' => 'pre_view', 'model' => $obj->_model ];
                $app->run_callbacks( $callback, $obj->_model, $obj, $url );
                $data = $obj->$key;
                if (! $data ) {
                    $this->page_not_found( $app, $workspace );
                }
                if (! $fmgr->exists( $url->file_path ) ) {
                    if ( $url->publish_file == 1 && !$user && !$url->delete_flag && !$table->do_not_output ) {
                        // Re-Publish deleted file.
                        $fmgr->put( $url->file_path, $data );
                    }
                }
                header( 'HTTP/1.1 200 OK' );
                $app->print( $data, $mime_type );
            } else if ( $fmgr->exists( $url->file_path ) ) {
                header( 'HTTP/1.1 200 OK' );
                $filesize = filesize( $url->file_path );
                if ( $max_size < $filesize ) {
                    PTUtil::export_data( $url->file_path, null, true );
                    exit();
                }
                $app->print( $fmgr->get( $url->file_path ), $mime_type );
            }
        } else {
            $mapping = $url->urlmapping;
            $ctx->vars['publish_type'] = $mapping ? $mapping->publish_file : 6;
            $ctx->stash( 'current_context', $url->model );
            $ctx->stash( $url->model, $obj );
            if ( $mapping && $mapping->container ) {
                $ctx->stash( 'current_container', $mapping->container );
                if ( $mapping->skip_empty ) {
                    $container = $app->get_table( $mapping->container );
                    $cnt_tag = strtolower( $container->plural ) . 'count';
                    $count_terms = ['container' => $container->name, 'this_tag' => $cnt_tag ];
                    if ( $mapping->container_scope ) {
                        $count_terms['include_workspaces'] = 'all';
                    }
                    $count_children = $app->core_tags->hdlr_container_count( $count_terms, $ctx );
                    if (! $count_children ) {
                        if ( $user && $app->can_do( $model, 'edit', $obj, $workspace ) ) {
                        } else {
                            $this->page_not_found( $app, $workspace );
                        }
                    }
                }
            }
            $magic_token = '';
            if ( $app->request_method === 'POST' ) {
                $magic_token = $app->param( 'magic_token' )
                             ? $app->param( 'magic_token' ) : $app->request_id;
                $session = $app->db->model( 'session' )->get_by_key( ['name' => $magic_token, 'kind' => 'CR'] );
                if (! $session->id ) {
                    $magic_token = '';
                }
                $ctx->local_vars['magic_token'] = $magic_token;
            }
            if ( $app->request_method === 'POST' ) {
                if ( $app->param( '_type' ) === 'form' ) {
                    require_once( $pt_path . 'lib' . DS . 'Prototype'
                                  . DS . 'class.PTForm.php' );
                    $form = new PTForm;
                    $mode = $app->mode;
                    if ( method_exists( $form, $mode ) ) {
                        $form->$mode( $app, $url );
                    }
                } else if ( $app->param( '_type' ) === 'comment' ) {
                    require_once( $pt_path . 'lib' . DS . 'Prototype'
                                  . DS . 'class.PTComment.php' );
                    $comment = new PTComment;
                    $mode = $app->mode;
                    if ( method_exists( $comment, $mode ) ) {
                        $comment->$mode( $app, $url );
                    }
                }
            }
            require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPublisher.php' );
            $pub = new PTPublisher;
            if ( $url->publish_file != 6 && $url->publish_file != 3 && !$user && !$fmgr->exists( $file_path ) ) {
                if ( $url->delete_flag == 0 && $url->object_id && $url->model && !$table->do_not_output ) {
                    $obj = isset( $obj ) ? $obj : $app->db->model( $url->model )->load( (int) $url->object_id );
                    if ( is_object( $obj ) ) {
                        if ( $obj->has_column( 'status' ) ) {
                            $status_published = $app->status_published( $obj->_model );
                            if ( $status_published != $obj->status ) {
                                $this->page_not_found( $app, $workspace );
                            }
                        }
                        $app->id = 'Prototype'; // Re-Publish deleted file when other objects's duplicate URL.
                        if ( $url->class == 'archive' ) {
                            $mtime = null;
                            $pub->publish( $url, null, $mtime, $obj );
                        } else if ( $url->class == 'file' ) {
                            $app->publish_obj( $obj, null, false, true );
                        }
                        $app->id = 'Bootstrapper';
                    }
                }
                if ( !$fmgr->exists( $file_path ) ) {
                    $this->page_not_found( $app, $workspace );
                }
            }
            if ( $mtime ) {
                $mtime = ( $mtime > $url->filemtime ) ? $mtime : $url->filemtime;
            } else {
                $mtime = $url->filemtime;
            }
            $update = false;
            $dynamic_compile = $app->dynamic_compile;
            $app->init_tags();
            $this->init_tags = true;
            $data = $pub->publish( $url, $existing_data, $mtime, $obj, $update, $dynamic_compile );
            if ( $data === false || $data === null ) {
                $this->page_not_found( $app, $workspace );
            }
            if ( $app->eval_in_view && strpos( $data, '<?php' ) !== false ) {
                ob_start();
                eval( '?>' . $data );
                $data = ob_get_clean();
            }
            if ( $user && $app->dynamicmtml_in_preview ) {
                if ( preg_match( "/$regex/i", $data ) ) {
                    $data = $ctx->build( $data, false, null, true );
                }
            }
            if (! $url->delete_flag ) {
                if (! $app->query_string() ) {
                    $page = str_replace( $magic_token, '', $data );
                    $md5 = md5( $page );
                    if ( $md5 != $url->md5 ) {
                        $url->md5( $md5 );
                        $update = true;
                    }
                }
            }
            $callback = ['name' => 'dynamic_view', 'model' => 'urlinfo', 'object' => $obj, 'workspace' => $workspace ];
            $app->run_callbacks( $callback, 'urlinfo', $url, $data );
            $app->print( $data, $mime_type, $mtime, false, false );
            if ( $update && !$url->delete_flag ) $url->save();
        }
    }

    function page_not_found ( $app, $workspace = null, $error = null, $mime_type = 'text/html' ) {
        $fmgr = $app->fmgr;
        if ( $app->error_document404 ) {
            $error_document_basename = str_replace( '..', '', $app->error_document404 );
            if ( strpos( $error_document_basename, DS ) !== 0 ) {
                $error_document_basename = DS . $error_document_basename;
            }
            $error_document404 = $app->site_path . $error_document_basename;
            if (! $fmgr->exists( $error_document404 ) ) {
                $error_document404 = $app->document_root . $error_document_basename;
            }
            if ( $fmgr->exists( $error_document404 ) ) {
                header( $app->protocol . ' 404 Not Found' );
                $extension = PTUtil::get_extension( $error_document404, true );
                if ( $extension == 'php' ) {
                    global $error_message;
                    $error_message = $error;
                    header( "Content-Type: {$mime_type}" );
                    require_once( $error_document404 );
                    exit();
                } else {
                    $data = $fmgr->get( $error_document404 );
                    $app->print( $data, $mime_type, false );
                    exit();
                }
            }
        }
        if (! $theme_static = $app->theme_static ) {
            $theme_static = $app->path . 'theme-static/';
            $app->theme_static = $theme_static;
        }
        $app->ctx->vars['theme_static'] = $theme_static;
        $app->ctx->vars['application_dir'] = __DIR__;
        $app->ctx->vars['application_path'] = $app->path;
        $app->ctx->vars['publish_type'] = 6;
        $tmpl = null;
        if (! $error ) $error = $app->translate( 'Page not found.' );
        if ( $workspace ) {
            $tmpl = $app->db->model( 'template' )->get_by_key( [
            'basename' => '404-error', 'workspace_id' => $workspace->id, 'rev_type' => 0, 'status' => 2],
            ['limit' => 1], 'id,text,compiled,cache_key,basename' );
        }
        if (! $tmpl || ! $tmpl->id ) {
            $tmpl = $app->db->model( 'template' )->get_by_key( [
                'basename' => '404-error', 'workspace_id' => 0, 'rev_type' => 0, 'status' => 2],
                ['limit' => 1], 'id,text,compiled,cache_key,basename' );
        }
        if ( $tmpl->id ) {
            if (! $this->init_tags ) {
                $app->init_tags();
                $this->init_tags = true;
            }
            $app->ctx->vars['error_message'] = $error;
            $app->ctx->stash( 'workspace', $workspace );
            $app->ctx->stash( 'current_template', $tmpl );
            $app->init_callbacks( 'template', '404-error' );
            $callback = ['name' => '404-error', 'model' => 'template', 'workspace' => $workspace ];
            $app->run_callbacks( $callback, 'template', $tmpl );
            header( $app->protocol . ' 404 Not Found' );
            $data = $app->ctx->build( $tmpl->text );
            if ( $app->eval_in_view && strpos( $data, '<?php' ) !== false ) {
                ob_start();
                eval( '?>' . $data );
                $data = ob_get_clean();
            }
            $app->print( $data, $mime_type, false );
        } else {
            header( $app->protocol . ' 404 Not Found' );
            $app->print( $error, $mime_type, false );
        }
        exit();
    }

    function login_logout ( $app, $workspace = null ) {
        if (! $app->dynamic_view ) return false;
        if (! $this->allow_login ) return false;
        $request_uri = $app->escape( $app->request_uri );
        list( $request, $param ) = array_pad( explode( '?', $request_uri ), 2, null );
        $ctx = $app->ctx;
        if ( $app->mode != 'login' && $app->mode != 'logout' &&
            ! $param && isset( $ctx->vars['admin_url'] ) ) {
            $referer = $_SERVER['HTTP_REFERER'] ?? '';
            if ( strpos( $referer, '?' ) !== false ) {
                list ( $referer, $referer_q ) = explode( '?', $referer );
            }
            if ( $referer === $app->ctx->vars['admin_url'] ) {
                $app->redirect( $request . '?__mode=login' );
            } else {
                $this->page_not_found( $app, $workspace );
            }
        }
        $ctx->vars['prototype_path'] = $this->prototype_path
                                     ? $this->prototype_path : $app->path;
        $ctx->vars['script_uri'] = $request;
        $ctx->vars['return_url'] = $request;
        return $app->mode == 'logout' ? $app->logout() : $app->__mode( 'login' );
        return false;
    }

    function get_workspace_from_url ( $app, $url, $retry = false ) {
        $url = preg_replace( '!/[^\/]*$!', '/', $url );
        $workspace = $app->db->model( 'workspace' )->load( ['site_url' => $url ] );
        if ( is_array( $workspace ) && ! empty( $workspace ) ) {
            return $workspace[0];
        }
        $url = rtrim( $url, '/' );
        $url = preg_replace( '!/[^\/]*$!', '/dummy', $url );
        if ( preg_match( '!https{0,1}:\/\/.*?/!', $url ) && ! $retry ) {
            return $this->get_workspace_from_url( $app, $url, true );
        }
        return null;
    }
}