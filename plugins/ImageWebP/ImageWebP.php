<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class ImageWebP extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        if ( $app->imagick_convert_path || function_exists( 'imagecreatefromwebp' ) ) {
            return true;
        }
        $errors[] = $this->translate( 'The plugin ImageWebP cannot be enabled because WebP format image is not supported.' );
        return false;
    }

    function start_mode ( &$app ) {
        if ( $app->id !== 'Prototype' ) {
            return true;
        }
        if ( $app->mode !== 'manage_plugins' ) {
            return true;
        }
        if ( $app->param( 'plugin_id' ) != 'imagewebp' || !$app->param( 'edit_settings' ) ) {
            return true;
        }
        if ( $app->request_method != 'GET' && !$app->develop ) {
            return true;
        }
        $columns = $app->db->model( 'column' )->load( ['type' => 'blob', 'edit' => 'file'] );
        $models = [];
        foreach ( $columns as $column ) {
            $extra = $column->extra;
            if ( $extra && preg_match( '/video$/i', $extra ) ) {
                continue;
            } else if ( $extra && preg_match( '/audio$/i', $extra ) ) {
                continue;
            } else if ( $extra && preg_match( '/pdf$/i', $extra ) ) {
                continue;
            }
            if (! isset( $models[ $column->table_id ] ) ) {
                $models[ $column->table_id ] = $app->db->model( 'table' )->load( $column->table_id );
            }
        }
        $models = array_values( $models );
        $models_loop = [];
        foreach ( $models as $model ) {
            $models_loop[] = ['label' => $app->translate( $model->label ), 'name' => $model->name ];
        }
        $app->ctx->vars['imagewebp_models'] = $models_loop;
        if ( function_exists( 'imagecreatefromwebp' ) ) {
            $app->ctx->vars['imagewebp_can_function'] = true;
        }
        return true;
    }

    function start_publish ( &$cb, $app, $unlink ) {
        if ( $unlink ) {
            $ui = $cb['urlinfo'];
            $file_path = $ui->file_path;
            $extension = PTUtil::get_extension( $file_path, true );
            if ( $extension === 'webp' || !in_array( $extension, $app->images ) ) {
                return true;
            }
            $scope_id = (int) $ui->workspace_id;
            if ( $ui->workspace_id ) {
                $use_system_settings = $this->get_config_value( 'imagewebp_use_system_settings', $ui->workspace_id );
                if ( $use_system_settings ) {
                    $scope_id = 0;
                }
            }
            $models = trim( $this->get_config_value( 'imagewebp_models', $scope_id ) );
            if (! $models ) {
                return true;
            }
            $models = preg_split( '/\s*,\s*/', $models );
            if (! in_array( $ui->model, $models ) ) {
                return true;
            }
            $file_types = trim( $this->get_config_value( 'imagewebp_file_types', $scope_id ) );
            if (! $file_types ) {
                return true;
            }
            $file_types = preg_split( '/\s*,\s*/', $file_types );
            if (! in_array( $ui->mime_type, $file_types ) ) {
                return true;
            }
            $webp = self::replace_path( $file_path );
            $existing = $app->db->model( 'urlinfo' )->count(
                  ['file_path' => $webp, 'key' => ['!=' => 'image_webp'],
                   'delete_flag' => ['IN' => [0, 1] ] ] );
            if ( $existing ) {
                return true;
            }
            if ( $app->fmgr->exists( $webp ) ) {
                $url = $app->db->model( 'urlinfo' )->load(
                          ['file_path' => $webp, 'key' => 'image_webp',
                           'delete_flag' => ['IN' => [0, 1] ] ],
                          ['sort' => 'delete_flag', 'sort_order' => 'descend', 'limit' => 1] );
                if ( is_array( $url ) && !empty( $url ) ) {
                    $url = $url[0];
                    $url->remove();
                }
            } else {
                $url = self::replace_path( $ui->url );
                $relative_url = self::replace_path( $ui->relative_url );
                $relative_path = self::replace_path( $ui->relative_path );
                $file_path = self::replace_path( $ui->file_path );
                $clone = clone $ui;
                $terms = $clone->get_values( true );
                unset( $terms['id'], $terms['filemtime'] );
                $terms['url'] = $url;
                $terms['relative_url'] = $relative_url;
                $terms['relative_path'] = $relative_path;
                $terms['file_path'] = $file_path;
                $terms['key'] = 'image_webp';
                $terms['mime_type'] = 'image/webp';
                $terms['delete_flag'] = [0, 1];
                $webp = $app->db->model( 'urlinfo' )->get_by_key( $terms );
                $webp->filemtime( $ui->filemtime );
                $webp->remove();
            }
        }
        return true;
    }

    function post_publish ( $cb, $app, $ref, $data ) {
        $ui = $cb['urlinfo'];
        $file_path = $ui->file_path;
        $extension = PTUtil::get_extension( $file_path, true );
        if ( $extension === 'webp' || !in_array( $extension, $app->images ) ) {
            return true;
        }
        if (! $app->fmgr->exists( $file_path ) ) {
            if ( isset( $app->fmgr->updates[ $file_path ] ) ) {
                $delayed = $app->fmgr->delayed;
                $app->fmgr->delayed = false;
                $app->fmgr->put( $file_path, $app->fmgr->updates[ $file_path ] );
                $app->fmgr->delayed = $delayed;
                unset( $app->fmgr->updates[ $file_path ] );
            }
        }
        if (! $app->fmgr->exists( $file_path ) ) {
            trigger_error( "File {$file_path} does not exist." );
            return true;
        }
        $scope_id = (int) $ui->workspace_id;
        if ( $ui->workspace_id ) {
            $use_system_settings = $this->get_config_value( 'imagewebp_use_system_settings', $ui->workspace_id );
            if ( $use_system_settings ) {
                $scope_id = 0;
            }
        }
        $webp = preg_replace( "/{$extension}$/", 'webp', $file_path );
        if ( isset( $cb['name'] ) && $cb['name'] == 'filter_convert2webp' ) {
        } else {
            $models = trim( $this->get_config_value( 'imagewebp_models', $scope_id ) );
            if (! $models ) {
                return true;
            }
            $models = preg_split( '/\s*,\s*/', $models );
            if (! in_array( $ui->model, $models ) ) {
                return true;
            }
            $file_types = trim( $this->get_config_value( 'imagewebp_file_types', $scope_id ) );
            if (! $file_types ) {
                return $webp;
            }
            $file_types = preg_split( '/\s*,\s*/', $file_types );
            if (! in_array( $ui->mime_type, $file_types ) ) {
                return $webp;
            }
        }
        $quality = isset( $cb['quality'] ) ? $cb['quality']
                 : (int) $this->get_config_value( 'imagewebp_quality', $scope_id );
        if ( $quality < 0 || $quality > 100 ) {
            $quality = 80;
        }
        if ( $app->fmgr->exists( $webp ) ) {
            $existing = $app->db->model( 'urlinfo' )->count(
                  ['file_path' => $webp, 'key' => ['!=' => 'image_webp'],
                   'delete_flag' => ['IN' => [0, 1] ] ] );
            if ( $existing ) {
                return $webp;
            }
        }
        list( $width, $height ) = getimagesize( $file_path );
        $size = $width > $height ? $width : $height;
        $convert = PTUtil::make_thumbnail( $file_path, $size, 'webp', $quality, null );
        $app->fmgr->rename( $convert, $webp );
        $url = $app->db->model( 'urlinfo' )->get_by_key(
                  ['file_path' => $webp, 'key' => 'image_webp',
                   'delete_flag' => ['IN' => [0, 1] ] ] );
        $url->model( $ui->model );
        $url->object_id( $ui->object_id );
        $url->dirname( $ui->dirname );
        $url->meta_id( $ui->meta_id );
        $url->class( 'file' );
        $url->key( 'image_webp' );
        $url->was_published( 1 );
        $url->is_published( 1 );
        $url->workspace_id( $ui->workspace_id );
        $webp_url = preg_replace( "/{$extension}$/", 'webp', $ui->url );
        $webp_relative_url  = preg_replace( "/{$extension}$/", 'webp', $ui->relative_url );
        $webp_relative_path = preg_replace( "/{$extension}$/", 'webp', $ui->relative_path );
        $md5 = md5( base64_encode( $app->fmgr->get( $webp ) ) );
        $url->md5( $md5 );
        $url->url( $webp_url );
        $url->relative_url( $webp_relative_url );
        $url->relative_path( $webp_relative_path );
        $url->filemtime( time() );
        $url->mime_type( 'image/webp' );
        $url->save();
        return $webp;
    }

    function post_load_urlinfo ( $cb, $app, &$url ) {
        $user = $app->user();
        if ( $user && $url->key == 'image_webp' && $url->mime_type == 'image/webp'
            && ! $app->fmgr->exists( $url->file_path ) ) {
            if (! $url->model ||!$url->object_id ) {
                return true;
            }
            $obj = $app->db->model( $url->model )->load( $url->object_id );
            if (! $obj ) {
                return true;
            }
            $terms = ['model' => $url->model, 'object_id' => $url->object_id,
                      'class' => 'file', 'workspace_id' => $url->workspace_id ];
            $terms['delete_flag'] = [0, 1];
            $terms['id'] = ['!=' => $url->id ];
            $terms['key'] = ['!=' => 'thumbnail'];
            $url_start = preg_replace( '/\.[^\.]*$/', '', $url->url );
            $url_start = $app->db->escape_like( $url_start, 0, 1 );
            $terms['url'] = ['LIKE' => $url_start ];
            $original = $app->db->model( 'urlinfo' )->get_by_key( $terms );
            if (! $original->id ) {
                return true;
            }
            $workspace = $app->db->model( 'workspace' )->new( ['id' => $url->workspace_id ] );
            $column = $original->key;
            if (! $obj->has_column( $column ) ) {
                return true;
            }
            if (! $app->can_do( $url->model, 'edit', $obj, $workspace ) ) {
                return true;
            }
            $upload_dir = $app->upload_dir();
            $tmp = $upload_dir . DS . basename( $original->file_path );
            $app->fmgr->put( $tmp, $obj->$column );
            $upload_dir = $app->upload_dir();
            $scope_id = (int) $url->workspace_id;
            if ( $url->workspace_id ) {
                $use_system_settings = $this->get_config_value( 'imagewebp_use_system_settings', $url->workspace_id );
                if ( $use_system_settings ) {
                    $scope_id = 0;
                }
            }
            $quality = (int) $this->get_config_value( 'imagewebp_quality', $scope_id );
            if ( $quality < 0 || $quality > 100 ) {
                $quality = 80;
            }
            list( $width, $height ) = getimagesize( $tmp );
            $size = $width > $height ? $width : $height;
            $convert = PTUtil::make_thumbnail( $tmp, $size, 'webp', $quality, null );
            header( 'HTTP/1.1 200 OK' );
            $app->print( $app->fmgr->get( $convert ), 'image/webp' );
            exit();
        }
        return true;
    }

    function filter_convert2webp ( $url, $arg, $ctx ) {
        if ( strpos( $url, 'http' ) !== 0 ) return $url;
        $app = $ctx->app;
        $workspace_id = $ctx->stash( 'workspace' ) ? $ctx->stash( 'workspace' )->id : 0;
        $extension = PTUtil::get_extension( $url, true );
        if ( $extension === 'webp' ) {
            return $url;
        } elseif (! in_array( $extension, $app->images ) ) {
            return $url;
        }
        $webp = preg_replace( "/{$extension}$/", 'webp', $url );
        $webp_ui = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $webp, 'workspace_id' => $workspace_id ] );
        if ( $app->id === 'Prototype' && $app->param( '_preview' ) ) {
            if ( $webp_ui->id ) {
                return $webp;
            }
            return $url;
        }
        $ui = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $url, 'workspace_id' => $workspace_id ] );
        if (! $ui->id && !$app->no_encode_filename && strpos( basename( $url ), '%' ) !== false ) {
            $url = urldecode( $url );
            $ui = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $url, 'workspace_id' => $workspace_id ] );
        }
        if (! $ui->id ) {
            return $webp_ui->id ? $webp_ui->url : $url;
        }
        if ( $webp_ui->id ) {
            if ( $app->fmgr->exists( $ui->file_path ) && $app->fmgr->exists( $webp_ui->file_path ) ) {
                $mtime = filemtime( $ui->file_path );
                $generated = filemtime( $webp_ui->file_path );
                if ( $mtime > $generated ) {
                } else {
                    return $webp;
                }
            }
        }
        $cb = ['urlinfo' => $ui, 'name' => 'filter_convert2webp'];
        if ( $arg !== '' && $arg !== '1' && $arg > -1 && $arg <= 100 ) {
            $cb['quality'] = (int) $arg;
        }
        $ref  = '';
        $data = '';
        if ( $this->post_publish( $cb, $app, $ref, $data ) ) {
            if ( $webp === true ) {
                return $url;
            }
            return $webp;
        }
        return $url;
    }

    static function replace_path ( $path ) {
        return preg_replace( '/\.[^\.]*$/', '', $path ) . '.webp';
    }
}