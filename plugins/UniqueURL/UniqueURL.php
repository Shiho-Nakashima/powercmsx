<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class UniqueURL extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function pre_run ( $app ) {
        if ( $app->id !== 'Prototype' || ( $app->mode !== 'save' && $app->mode !== 'upload_multi' ) ) {
            return true;
        }
        $model = $app->mode == 'upload_multi' ? $app->param( 'model' ) : $app->param( '_model' );
        if ( $app->mode === 'upload_multi' && $model === 'asset' && $app->uniqueurl_upload_multi ) {
            if ( empty( $_FILES ) ) {
                $app->json_error( 'Please check the file size and data.' );
            }
            $options = ['upload_dir' => $app->upload_dir() . DS,
                        'prototype' => $app,
                        'magic' => $app->magic(),
                        'no_upload' => true,
                        'user_id'   => $app->user()->id,
                        'print_response' => false ];
            // UploadHandler::get_upload_data was protected function.
            require_once( LIB_DIR . 'jQueryFileUpload' . DS . 'UploadHandler.php' );
            $upload_handler = new UploadHandler( $options );
            $files = $upload_handler->get_upload_data( 'files' );
            if (! isset( $files['name'][0] ) ) {
                return true;
            }
            $file_name = $files['name'][0];
            if (! $file_name ) {
                return true;
            }
            $site_path = $app->workspace() ? $app->workspace()->site_path : $app->site_path;
            $extra_path = $app->param( 'extra_path' );
            $extra_path = $app->sanitize_dir( $extra_path );
            $basename = '';
            $file_name = $app->sanitize_file( $file_name, $basename );
            $relative = $extra_path . $file_name;
            $file_path = $site_path . DS . $relative;
            if ( $app->fmgr->exists( $file_path ) ) {
                $app->json_error( $this->translate( 'The file already exists on the same path(%s).', $relative ) );
                exit();
            }
            $urls = $app->db->model( 'urlinfo' )->load( ['file_path' => $file_path, 'delete_flag' => ['IN' => [ 0, 1 ] ] ] );
            foreach ( $urls as $url ) {
                if ( $url->object_id && $url->model ) {
                    $existing = $app->db->model( $url->model )->load( (int) $url->object_id );
                    if ( $existing === null ) {
                        continue;
                    } else {
                        $other = $app->db->model( 'urlinfo' )->get_by_key(
                            ['object_id' => (int) $url->object_id, 'model' => $url->model, 'id' => ['!=' => $url->id ] ] );
                        if ( $other->id ) {
                            continue;
                        }
                    }
                }
                $app->json_error( $this->translate( 'The file already exists on the same path(%s).', $relative ) );
                exit();
            }
            return true;
        }
        if ( $model == 'asset' && $app->uniqueurl_save_asset ) {
            // Because the asset has already been renamed at before_save.
            $app->register_callback( $model, 'pre_save', 'pre_save_asset', 1, $this );
        }
        if ( $app->uniqueurl_before_save ) {
            $workspace_id = (int) $app->param( 'workspace_id' );
            $urlmapping = $app->db->model( 'urlmapping' )->get_by_key( ['model' => $model, 'workspace_id' => $workspace_id ] );
            if ( $urlmapping->id ) {
                $app->register_callback( $model, 'before_save', 'before_save', 1, $this );
            }
        }
        return true;
    }

    function pre_save_asset ( &$cb, $app, $obj, $original, $clone_obj ) {
        $file_name = $obj->file_name;
        $file_ext = PTUtil::get_extension( $file_name );
        if (! $file_ext ) {
            $file_name .= '.' . $obj->file_ext;
        }
        $extra_path = $obj->extra_path;
        $extra_path = $app->sanitize_dir( $extra_path );
        $site_path = $obj->workspace ? $obj->workspace->site_path : $app->site_path;
        $relative = $extra_path . $file_name;
        $file_path = $site_path . DS . $relative;
        $urls = $app->db->model( 'urlinfo' )->load( ['file_path' => $file_path, 'delete_flag' => ['IN' => [ 0, 1 ] ] ] );
        foreach ( $urls as $url ) {
            if ( $url->object_id == $obj->id && $url->model == $obj->_model ) {
                continue;
            } else if ( $url->object_id && $url->model ) {
                $existing = $app->db->model( $url->model )->load( (int) $url->object_id );
                if ( $existing === null ) {
                    continue;
                } else {
                    $other = $app->db->model( 'urlinfo' )->get_by_key(
                        ['object_id' => (int) $url->object_id, 'model' => $url->model, 'id' => ['!=' => $url->id ] ] );
                    if ( $other->id ) {
                        continue;
                    }
                }
                if ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
                    if ( $obj->_model == $url->model && $url->object_id === $obj->rev_object_id ) {
                        continue;
                    }
                }
            }
            $cb['error'] = $this->translate( 'The URL is a duplicate of the URL of another object.' );
            return false;
        }
        return true;
    }

    function before_save ( &$cb, $app, $obj, $original, $clone_obj ) {
        $permalink = null;
        if ( $obj->_model == 'asset' || $obj->_model == 'attachmentfile' ) {
            $permalink = $app->get_permalink( $obj );
        } else {
            // Force build URL.
            $urlmapping = $app->get_permalink( $obj, true );
            if ( $urlmapping ) {
                $urlmapping = $app->db->model( 'urlmapping' )->load( $urlmapping->id ); // $urlmapping only has an id column.
                if ( $urlmapping ) {
                    $table = $app->get_table( $obj->_model );
                    $permalink = $app->build_path_with_map( $obj, $urlmapping, $table, null, true );
                    $workspace = null;
                    if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
                        $workspace = $obj->workspace;
                    }
                    $permalink = $app->replace_link( $permalink, $workspace );
                }
            }
        }
        if (! $permalink ) {
            return true;
        }
        // Use path instead of URL to check across scopes.
        $site_path = $obj->workspace ? $obj->workspace->site_path : $app->site_path;
        $site_url = $obj->workspace ? $obj->workspace->site_url : $app->site_url;
        if ( $permalink === $site_url ) {
            return true;
        }
        $site_url = preg_quote( rtrim( $site_url, '/' ), '/' );
        $file_path = preg_replace( "/^{$site_url}/", $site_path, $permalink );
        $urls = $app->db->model( 'urlinfo' )->load( ['file_path' => $file_path, 'delete_flag' => ['IN' => [ 0, 1 ] ] ] );
        foreach ( $urls as $url ) {
            $map = $url->urlmapping;
            if ( $obj->_model === 'template' ) {
                if ( $map && $map->id == $url->urlmapping_id ) {
                    continue;
                }
            }
            if ( $url->object_id == $obj->id && $url->model == $obj->_model ) {
                continue;
            } else if ( $url->object_id && $url->model ) {
                $existing = $app->db->model( $url->model )->load( (int) $url->object_id );
                if ( $existing === null ) {
                    continue;
                } else {
                    $other = $app->db->model( 'urlinfo' )->get_by_key(
                        ['object_id' => (int) $url->object_id, 'model' => $url->model, 'id' => ['!=' => $url->id ] ] );
                    if ( $other->id ) {
                        continue;
                    }
                }
                if ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
                    if ( $obj->_model == $url->model && $url->object_id === $obj->rev_object_id ) {
                        continue;
                    }
                }
            }
            $cb['error'] = $this->translate( 'The URL is a duplicate of the URL of another object.' );
            return false;
        }
        return true;
    }
}