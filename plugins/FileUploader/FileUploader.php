<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class FileUploader extends PTPlugin {

    private $session = null;
    public  $updated = false;

    function __construct () {
        parent::__construct();
        $app = Prototype::get_instance();
        if ( $app->mode === 'save' ) {
            $app->field_type_asset = 'asset,assets,image,images,video,videos';
        } else if ( $app->id === 'Prototype' && $app->mode === 'view' ) {
            if ( $app->param( '_model' ) === 'upload_file' && $app->param( '_type' ) === 'list' ) {
                $app->register_callback( 'upload_file', 'before_listing', 'before_listing', 1000, $this );
            }
        }
    }

    function before_listing ( &$cb, $app, $terms, $args, $extra, $ex_vals ) {
        $cols = $cb['cols'];
        $cols .= ',class,url,file_ext';
        $cb['cols'] = $cols;
        return 1;
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $tmpl_dir = $this->path() . DS . 'tmpl' . DS . 'fields' . DS;
        $fields = ['video' => ['name' => 'Video', 'hide_label' => false ],
                   'videos' => ['name' => 'Videos (Multiple)', 'hide_label' => false ] ];
        foreach ( $fields as $basename => $prop ) {
            $field = $app->db->model( 'fieldtype' )->get_by_key(
                    ['basename' => $basename ] );
            if ( $field->id ) {
                continue;
                // $original = clone $field;
                // PTUtil::pack_revision( $field, $original );
            } else {
                $last = $app->db->model( 'fieldtype' )->load(
                    false, ['sort' => 'order', 'direction' => 'descend', 'limit' => 1], 'order' );
                if (! empty( $last ) ) {
                    $last = $last[0];
                    $last = $last->order;
                    $field->order( $last + 1 );
                }
            }
            $field->name( $prop['name'] );
            $hide_label = ( isset( $prop['hide_label'] ) && $prop['hide_label'] ) ? 1 : 0;
            $field->hide_label( $hide_label );
            $field->label( file_get_contents( "{$tmpl_dir}{$basename}_label.tmpl" ) );
            $field->content( file_get_contents( "{$tmpl_dir}{$basename}_content.tmpl" ) );
            $app->set_default( $field );
            $field->save();
        }
        return true;
    }

    function save_filter_upload_file ( &$cb, $app, &$obj ) {
        $file_magic = $app->param( 'upload-file-magic' );
        $session = $app->db->model( 'session' )->get_by_key( ['name' => $file_magic ] );
        $tmpfile = $session->data && file_exists( $session->data ) ? $session->data : $session->value;
        if ( $session->id ) {
            $app->ctx->vars['thumbnail'] = $app->admin_url . '?__mode=get_thumbnail&id=session-' . $session->id;
        }
        return true;
    }

    function pre_save_upload_file ( &$cb, $app, &$obj, $original ) {
        $file_magic = $app->param( 'upload-file-magic' );
        $session = $app->db->model( 'session' )->get_by_key( ['name' => $file_magic ] );
        $tmpfile = $session->data && file_exists( $session->data ) ? $session->data : $session->value;
        if ( $session->id ) {
            $app->ctx->vars['thumbnail'] = $app->admin_url . '?__mode=get_thumbnail&id=session-' . $session->id;
        }
        if ( $obj->id ) {
            $object = $app->db->model( 'upload_file' )->load( (int) $obj->id, null, 'url,file_path,relative_path' );
            $obj->set_values( ['url' => $object->url,
                               'file_path' => $object->file_path,
                               'relative_path' => $object->relative_path ] );
        }
        if (! $obj->url && (! $session->id || !$tmpfile || ! file_exists( $tmpfile ) ) ) {
            $cb['errors'][] = $this->translate( 'The file is required.' );
            return false;
        }
        $file_name = $obj->file_name;
        $basename = '';
        $file_name = $app->sanitize_file( $file_name, $basename );
        if (! $basename && strpos( $file_name, '.' ) !== 0 ) {
            $cb['errors'][] = $app->translate( "The file '%s' that you uploaded is not allowed.", $file_name );
            return false;
        } else if ( strpos( $file_name, '.' ) === 0 && !$app->can_upload_hidden ) {
            $cb['errors'][] = $app->translate( "The file '%s' that you uploaded is not allowed.", $file_name );
            return false;
        } else if ( $file_name == '.' || strpos( $file_name, '..' ) === 0 || strpos( $file_name, DS ) !== false ) {
            $cb['errors'][] = $app->translate( "The file '%s' that you uploaded is not allowed.", $file_name );
            return false;
        }
        $extension = PTUtil::get_extension( $file_name, true );
        $allowed_exts = $app->allowed_exts ? preg_split( '/\s*,\s*/', $app->allowed_exts ) : [];
        $allowed_exts = array_filter( $allowed_exts, 'strlen' );
        if (! empty( $allowed_exts ) && !in_array( $extension, $allowed_exts ) ) {
            $cb['errors'][] = $app->translate( "'%s' is not allowed to upload by system settings.", $file_name );
            return false;
        }
        $denied_exts = $app->denied_exts ? preg_split( '/\s*,\s*/', $app->denied_exts ) : [];
        $denied_exts = array_filter( $denied_exts, 'strlen' );
        if (! empty( $denied_exts ) && in_array( $extension, $denied_exts ) ) {
            $cb['errors'][] = $app->translate( "'%s' is not allowed to upload by system settings.", $file_name );
            return false;
        }
        $obj->file_name( $file_name );
        if ( $obj->id && $app->fileuploader_keep_extension ) {
            $metadata = $app->db->model( 'meta' )->get_by_key(
               ['model' => 'upload_file', 'object_id' => $obj->id,
                'kind' => 'metadata', 'key' => 'file_path'] );
            if ( $metadata->text ) {
                $meta = json_decode( $metadata->text, true );
                if ( $meta['file_name'] != $obj->file_name ) {
                    $file_ext = PTUtil::get_extension( $obj->file_name );
                    if ( strtolower( $meta['extension'] ) != strtolower( $file_ext ) ) {
                        $ext = strtolower( $meta['extension'] );
                        $obj->file_name( preg_replace( "/\.$file_ext$/i", ".{$ext}", $obj->file_name ) );
                    }
                }
            }
        }
        $site_path = $app->workspace() ? $app->workspace()->site_path : $app->site_path;
        $site_url  = $app->workspace() ? $app->workspace()->site_url  : $app->site_url;
        $extra_path = $app->param( 'extra_path' );
        $app->sanitize_dir( $extra_path );
        $site_path = rtrim( $site_path, DS );
        $site_url = rtrim( $site_url, DS );
        $file_name = $obj->file_name;
        $out_path = $site_path . DS . $extra_path . $file_name;
        $url = str_replace( DS, '/', $site_url . '/' . $extra_path . $file_name );
        $dirname = dirname( $out_path );
        $fmgr = $app->fmgr;
        if (! $fmgr->mkpath( $dirname ) ) {
            $cb['errors'][] = $app->translate( "Cannot write to direcroty'%s'.", $dirname );
            return false;
        }
        $relative_path = '%r/' . $extra_path . $file_name;
        $check_duplicate = false;
        if ( $original && $original->file_path != $out_path ) {
            $check_duplicate = true;
        } else if (! $obj->id ) {
            if ( $fmgr->exists( $out_path ) ) {
                $cb['errors'][] = $this->translate( "The file '%s' already exists.", $extra_path . $file_name );
                return false;
            }
            $check_duplicate = true;
        }
        if ( $check_duplicate ) {
            $terms = $obj->id ? ['id' => ['!=' => (int) $obj->id ] ] : [];
            $terms['url'] = $url;
            $count = $app->db->model( 'upload_file' )->count( $terms );
            if ( $count ) {
                $cb['errors'][] = $this->translate( "The file '%s' already exists.", $extra_path . $file_name );
                return false;
            }
        }
        $existing = $app->db->model( 'urlinfo' )->count(
            ['url' => $url, 'delete_flag' => ['IN' => [0, 1] ], 'model' => ['!=' => 'upload_file'] ] );
        if ( $existing ) {
            $url_objs = $app->db->model( 'urlinfo' )->load(
                [ 'url' => $url, 'delete_flag' => ['IN' => [0, 1] ], 'model' => ['!=' => 'upload_file'] ] );
            $existing = false;
            foreach ( $url_objs as $url_obj ) {
                if (! $url_obj->delete_flag ) {
                    $existing = true;
                    break;
                } else {
                    if ( $url_obj->object_id && $url_obj->model ) {
                        $urlObj = $app->db->model( $url_obj->model )->load( (int) $url_obj->object_id );
                        if ( is_object( $urlObj ) ) {
                            $existing = true;
                            break;
                        }
                    }
                }
            }
            if ( $existing ) {
                $cb['errors'][] = $this->translate( "The file '%s' already exists.", $extra_path . $file_name );
                return false;
            }
        }
        if ( $original && ! $session->id && $out_path != $original->file_path ) {
            if (! $fmgr->exists( $original->file_path ) ) {
                $cb['errors'][] = $this->translate( "The file '%s' is not found.", $original->file_path );
                return false;
            }
            $existing = $app->db->model( 'urlinfo' )->count(
                [ 'url' => $original->url, 'delete_flag' => ['IN' => [0, 1] ], 'model' => ['!=' => 'upload_file'] ] );
            $method = $existing ? 'copy' : 'rename';
            if (! $fmgr->$method( $original->file_path, $out_path ) ) {
                $cb['errors'][] = $app->translate( "Cannot write to direcroty'%s'.", $dirname );
                return false;
            }
            $app->remove_dirs[] = dirname( $original->file_path );
            $this->updated = true;
        }
        $obj->relative_path( $relative_path );
        $obj->file_path( $out_path );
        $obj->url( $url );
        $obj->file_ext( $extension );
        $mime_type = PTUtil::get_mime_type( $extension );
        $obj->mime_type( $mime_type );
        if ( $tmpfile && $obj->file_path ) {
            if (! $fmgr->rename( $tmpfile, $obj->file_path ) ) {
                $cb['errors'][] = $app->translate( "Cannot write to direcroty'%s'.", $dirname );
                return false;
            }
            // $app->remove_dirs[] = dirname( $tmpfile );
            PTUtil::remove_dir( dirname( $tmpfile ) );
        }
        if ( $session->id ) {
            $this->session = $session;
            $this->updated = true;
        }
        return true;
    }

    function post_save_upload_file ( &$cb, $app, &$obj, $original, $clone_obj = null ) {
        $metadata = $app->db->model( 'meta' )->get_by_key(
           ['model' => 'upload_file', 'object_id' => $obj->id,
            'kind' => 'metadata', 'key' => 'file_path'] );
        $url = null;
        if ( $this->updated ) {
            $fmgr = $app->fmgr;
            $url = $app->db->model( 'urlinfo' )->get_by_key( ['object_id' => $obj->id, 'model' => 'upload_file'] );
            if ( $app->publish_callbacks ) {
                $app->init_callbacks( 'blob', 'start_publish' );
                $app->init_callbacks( 'blob', 'pre_publish' );
                $app->init_callbacks( 'blob', 'post_publish' );
            }
            $cache_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS;
            $extension = PTUtil::get_extension( $obj->file_path );
            if ( $url->id && $obj->file_path != $original->file_path ) {
                $ui = clone $url;
                $ui->id( null );
                $ui->save();
                if ( $app->publish_callbacks ) {
                    $unlink = true;
                    $callback = ['name' => 'start_publish', 'model' => 'blob',
                                 'urlinfo' => $ui, 'object' => $obj, 'ctx' => $app->ctx,
                                 'original' => $original, 'unlink' => $unlink ];
                    $app->run_callbacks( $callback, 'blob', $unlink );
                }
                $ui->remove();
                if ( $app->fileuploader_backup && $fmgr->exists( $obj->file_path ) ) {
                    $cache = $cache_dir . md5( $original->file_path ) . ".{$extension}";
                    $fmgr->unlink( $cache );
                }
            }
            $url->set_values( ['is_published' => 1, 'was_published' => 1, 'publish_file' => 1, 'class' => 'file'] );
            $mime_type = PTUtil::get_mime_type( $extension );
            $url->mime_type( $mime_type );
            $url->url( $obj->url );
            $url->file_path( $obj->file_path );
            $url->relative_path( $obj->relative_path );
            $relative_url = preg_replace( '!^https{0,1}://.*?/!', '/', $obj->url );
            $url->relative_url( $relative_url );
            $url->key( '' ); // IS NOT NULL
            $data = '';
            if ( $fmgr->exists( $obj->file_path ) ) {
                $memory_limit = ini_get( 'memory_limit' );
                if ( $memory_limit === -1 ) $memory_limit = $app->memory_limit;
                $memory_limit = (int) PTUtil::return_bytes( $memory_limit );
                $memory_limit -= 51200;
                // Fatal error: Allowed memory size of 2147483648 bytes exhausted (tried to allocate XXXX bytes)
                $file_size = @filesize( $obj->file_path );
                if ( $file_size < $memory_limit ) {
                    $data = $fmgr->get( $obj->file_path );
                    $md5 = md5( $data );
                } else {
                    $md5 = md5_file( $obj->file_path );
                }
                $url->md5( $md5 );
                $url->filemtime( filemtime( $obj->file_path ) );
            }
            $url->workspace_id( (int) $app->param( 'workspace_id' ) );
            $url->delete_flag( 0 );
            $url->save();
            if ( $app->fileuploader_backup && $fmgr->exists( $obj->file_path ) ) {
                $cache = $cache_dir . md5( $url->file_path ) . ".{$extension}";
                $fmgr->copy( $obj->file_path, $cache );
            }
            if ( $app->publish_callbacks && $data ) {
                $unlink = false;
                $callback = ['name' => 'start_publish', 'model' => 'blob',
                             'urlinfo' => $url, 'object' => $obj, 'ctx' => $app->ctx,
                             'original' => $original, 'unlink' => $unlink ];
                $app->run_callbacks( $callback, 'blob', $unlink );
                $callback['name'] = 'pre_publish';
                $res = $app->run_callbacks( $callback, 'blob', $data );
                // TODO::Move to Before Save.
                $callback['name'] = 'post_publish';
                $ref = '';
                $app->run_callbacks( $callback, 'blob', $ref, $data );
            }
        }
        if ( is_object( $this->session ) ) {
            $sess = $this->session;
            $metadata->text( $sess->text );
            $metadata->metadata( $sess->extradata );
            $metadata->data( $sess->metadata );
            if ( $app->assets_c && is_dir( $app->assets_c ) && in_array( $obj->file_ext, $app->images ) ) {
                $asset_id = $obj->id;
                $file_ext = $obj->file_ext;
                $thumb_name = "thumb-upload_file-128xauto-square-{$asset_id}-file.{$file_ext}";
                $fmgr->put( $app->assets_c . DS . $thumb_name, $sess->extradata, LOCK_EX );
            }
            $metadata->save();
            if ( is_object( $url ) && !$url->meta_id ) {
                $url->meta_id( $metadata->id );
                $url->save();
            }
            $sess->remove();
        }
        return true;
    }

    function post_delete_upload_file ( &$cb, $app, &$obj, $original ) {
        $urls = $app->db->model( 'urlinfo' )->load( ['object_id' => $obj->id, 'model' => 'upload_file'] );
        $fmgr = $app->fmgr;
        $file_unlink = true;
        foreach ( $urls as $url ) {
            if ( $app->publish_callbacks ) {
                $app->init_callbacks( 'blob', 'start_publish' );
                $callback = ['name' => 'start_publish', 'model' => 'blob',
                             'object' => $obj, 'ctx' => $app->ctx, 'original' => $original,
                             'unlink' => $file_unlink ];
                $callback['urlinfo'] = $url;
                $app->run_callbacks( $callback, 'blob', $file_unlink );
            }
            if ( $app->fileuploader_backup && $fmgr->exists( $url->file_path ) ) {
                $cache_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS;
                $extension = PTUtil::get_extension( $url->file_path );
                $cache = $cache_dir . md5( $url->file_path ) . ".{$extension}";
                $fmgr->unlink( $cache );
            }
            $url->remove();
        }
        $search = $app->db->escape_like( ':' . $obj->id . ':', true, true );
        $field_type_asset = ['video', 'videos'];
        $fields = $app->db->model( 'meta' )->load(
                  ['kind' => 'customfield', 'type' => ['IN' => $field_type_asset ] , 'data' => ['LIKE' => $search ] ] );
        if (! empty( $fields ) ) {
            foreach ( $fields as $field ) {
                $data = $field->data;
                if ( $data === ':' . $obj->id . ':' ) {
                    $field->remove();
                } else {
                    $existing = [];
                    $first = null;
                    $ids = explode( ':', $data );
                    $text = json_decode( $field->text, true );
                    foreach ( $ids as $id ) {
                        if ( $id != $obj->id ) {
                            if (! $first ) $first = $id;
                            $existing[] = $id;
                        }
                    }
                    $key = key( $text );
                    $value = $text[ $key ];
                    $field->value( $first );
                    $data = implode( ':', $existing );
                    $data = str_replace( '::', ':', $data );
                    $field->data( $data );
                    $existing = array_filter( $existing, 'strlen' );
                    $text = [ $key => array_values( $existing ) ];
                    $field->text( json_encode( $text ) );
                    $field->save();
                }
            }
        }
        if ( $obj->file_path ) {
            $dirname = dirname( $obj->file_path );
            if ( count( glob( $dirname . "/*" ) ) === 0 ) {
                PTUtil::remove_empty_dirs( [ $dirname ] );
            }
        }
        return true;
    }

    function param_meta_id ( $cb, $app, &$param, &$tmpl ) {
        if ( $cb['model'] !== 'upload_file' || !$app->param( 'id' ) ) {
            return true;
        }
        $obj = $app->ctx->stash( 'object' );
        $metadata = $app->db->model( 'meta' )->get_by_key(
           ['model' => 'upload_file', 'object_id' => $obj->id,
            'kind' => 'metadata', 'key' => 'file_path' ], null, 'id' );
        $param['_meta_id'] = $metadata->id;
        $param['thumbnail'] = $obj->file_ext == 'svg' ? $obj->url : $app->admin_url . '?__mode=get_thumbnail&id=' . $metadata->id;
    }

    function fileuploader_upload ( $app ) {
        if ( empty( $_FILES ) ) {
            $app->json_error( 'Please check the file size and data.' );
        }
        $app->db->caching = false;
        $app->validate_magic( true );
        $workspace = $app->workspace() ? $app->workspace() : null;
        if (! $app->can_do( 'upload_file', 'create', null, $workspace ) ) {
            $error = $app->translate( 'Permission denied.' );
            header( 'Content-type: application/json' );
            echo json_encode( ['message'=> $error ] );
            exit();
        }
        $magic = $app->magic() . '-file';
        $upload_dir = $this->upload_dir( $app, $app->param( 'request_id' ) );
        $options = ['upload_dir' => $upload_dir . DS, 'prototype' => $app,
                    'magic' => $magic, 'user_id' => $app->user()->id,
                    'session_no_data' => true];
        $name = $_FILES['files']['name'];
        $extension = PTUtil::get_extension( $name, true );
        $denied_exts = explode( ',', $app->denied_exts );
        if ( in_array( $extension, $denied_exts ) ) {
            $error = $app->translate( 'Invalid File extension\'%s\'.', $extension );
            header( 'Content-type: application/json' );
            echo json_encode( ['message'=> $error ] );
            exit();
        }
        $options['allow_hidden'] = $app->can_upload_hidden;
        require_once( LIB_DIR . 'jQueryFileUpload' . DS . 'UploadHandler.php' );
        $upload_handler = new UploadHandler( $options );
    }

    function upload_dir ( $app, $basename ) {
        $upload_dir = $app->temp_dir;
        if ( $upload_dir ) {
            $upload_dir = rtrim( $upload_dir, DS );
            $upload_dir .= DS;
        }
        if (!$upload_dir ) $upload_dir =  dirname( $app->pt_path ) . DS . 'tmp' . DS;
        $upload_dir .= 'pt_' . $basename;
        if (! is_dir( $upload_dir ) ) mkdir( $upload_dir . DS, 0777, true );
        return $upload_dir;
    }
}