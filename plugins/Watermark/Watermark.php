<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class Watermark extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        /*
        $uploader = $app->component( 'FileUploader' );
        if (! $uploader ) {
            $errors[] = $this->translate(
              'The FileUploader plugin must be enabled to enable Watermark plugin.' );
        }
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        if (! $app->simplifiedjapanese_ffprobe_path ) {
            $errors[] = $app->translate( "The system environment value '%s' is not specified.", 'simplifiedjapanese_ffprobe_path' );
        }
        if (! empty( $errors ) ) {
            return false;
        }
        */
        $app->clear_compiled( 'edit.tmpl' );
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'edit.tmpl' );
        return true;
    }

    function watermark_asset ( $app ) {
        ini_set( 'memory_limit', -1 );
        ini_set( 'max_execution_time', 14400 );
        ignore_user_abort( true );
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $pos = $json['position'];
        $id = $app->param( 'id' );
        $obj = $app->db->model( 'asset' )->load( $id );
        $error = false;
        if ( !$id || !$obj ) {
            $error = true;
        } else if ( $obj->class != 'image' ) {
            $error = true;
        }
        $error_message = $pos ? $this->translate( 'An error occurred while combine the watermark.' )
                              : $this->translate( 'An error occurred while removing the watermark.' );
        if ( $error ) {
            return $app->json_error( $error_message );
        }
        $permalink = $app->get_permalink( $obj );
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $permalink, 'model' => 'asset', 'object_id' => (int) $obj->id,
                                                          'class' => 'file', 'key' => 'file', 'delete_flag' => [0, 1] ] );
        if (! $url->id ) {
            return $app->json_error( $error_message );
        }
        $file_path = $url->file_path;
        $extension = strtolower( PTUtil::get_extension( $file_path ) );
        if (! $app->fmgr->exists( $file_path ) ) {
            $file_path = $app->upload_dir() . DS . basename( $url->file_path ) . ".{$extension}";
            $app->fmgr->put( $file_path, $obj->file );
        }
        $backup_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS . 'asset' . DS;
        $backup_path = $backup_dir . $obj->id . '.' . $extension;
        $meta = $app->db->model( 'meta' )->get_by_key(
            ['model' => 'asset', 'key' => 'file',
             'object_id' => $obj->id, 'kind' => 'metadata'] );
        $backup_path = $backup_dir . $obj->id . '.' . $extension;
        $image_path = $this->get_config( 'watermark_dir' );
        if (! $image_path ) {
            $image_path = $this->path() . DS . 'watermark';
        } else {
            $image_path = rtrim( $image_path, DS );
        }
        if ( strpos( $pos, 'left' ) !== false ) {
            $watermark = $image_path . DS . 'left.png';
        } else {
            $watermark = $image_path . DS . 'right.png';
        }
        if (! $app->fmgr->exists( $backup_path ) ) {
            $app->fmgr->copy( $file_path, $backup_path );
            $meta_path = $backup_dir . $obj->id . '.json';
            $app->fmgr->put( $meta_path, $meta->text );
            $meta_path = $backup_dir . $obj->id . '.square';
            $app->fmgr->put( $meta_path, $meta->metadata );
            $meta_path = $backup_dir . $obj->id . '.thumbnail';
            $app->fmgr->put( $meta_path, $meta->data );
        } else {
            $current = $this->get_meta( $obj, $app );
            $current_pos = $current->value;
            $md5 = $current->text;
            if ( $current->id && $current_pos == $pos && md5_file( $watermark ) == $md5 ) {
                $result = ['result'=> 'OK'];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
        }
        $this->set_meta( $obj, $pos, $watermark, $app );
        if (! $pos ) {
            if ( $app->fmgr->exists( $backup_path ) ) {
                $meta_path = $backup_dir . $obj->id . '.json';
                if ( $app->fmgr->exists( $meta_path ) ) {
                    $meta->text( $app->fmgr->get( $meta_path ) );
                }
                $meta_path = $backup_dir . $obj->id . '.square';
                if ( $app->fmgr->exists( $meta_path ) ) {
                    $meta->metadata( $app->fmgr->get( $meta_path ) );
                }
                $meta_path = $backup_dir . $obj->id . '.thumbnail';
                if ( $app->fmgr->exists( $meta_path ) ) {
                    $meta->data( $app->fmgr->get( $meta_path ) );
                }
                $meta->save();
                $original = clone $obj;
                $original->id( null );
                $obj->file( $app->fmgr->get( $backup_path ) );
                $obj->save();
                $changed_cols = ['file' => true ];
                PTUtil::pack_revision( $obj, $original, $changed_cols );
                $app->publish_obj( $obj, $original, false, true );
                $result = ['result'=> 'OK'];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
            return $app->json_error( $error_message );
        }
        list ( $w, $h ) = getimagesize( $watermark );
        $source = imagecreatefrompng( $watermark );
        $upload_dir = $app->upload_dir();
        $copy = $upload_dir . DS . 'watermark.png';
        $temp_path = $upload_dir . DS . 'temp.' . $extension;
        list ( $width, $height ) = getimagesize( $backup_path );
        if ( $w != $width ) {
            $scale = $width / $w;
            $newWidth = $width;
            $newHeight = $h * $scale;
            $newHeight = floor( $newHeight );
            if (! $newHeight ) $newHeight = 1;
            $image_p = imagecreatetruecolor( $newWidth, $newHeight );
            imagealphablending( $image_p, false );
            imagesavealpha( $image_p, true );
            imagecopyresampled( $image_p, $source, 0, 0, 0, 0, $newWidth, $newHeight, $w, $h );
            imagepng( $image_p, $copy, 0 );
        } else {
            $app->fmgr->copy( $watermark, $copy );
        }
        if ( $extension === 'webp' && PTUtil::is_webp_animated( $backup_path ) ) {
            return $app->json_error( $error_message );
        }
        switch ( $extension ) {
            case 'jpg':
                $src_func = 'imagecreatefromjpeg';
                $out_func = 'imagejpeg';
                $quality  = 100;
                break;
            case 'jpeg':
                $src_func = 'imagecreatefromjpeg';
                $out_func = 'imagejpeg';
                $quality  = 100;
                break;
            case 'gif':
                $src_func = 'imagecreatefromgif';
                $out_func = 'imagegif';
                break;
            case 'png':
                $src_func = 'imagecreatefrompng';
                $out_func = 'imagepng';
                $quality  = 0;
                break;
            case 'webp':
                $src_func = 'imagecreatefromwebp';
                $out_func = 'imagewebp';
                $quality  = 100;
                break;
            default:
                return $app->json_error( $error_message );
        }
        // TODO webp by convert command.
        if ( !function_exists( $src_func ) || !function_exists( $out_func ) ) {
            return $app->json_error( $this->translate( "'%s' function is not supported.", $out_func ) );
        }
        $im = $src_func( $backup_path );
        $stamp = imagecreatefrompng( $copy );
        list ( $w, $h ) = getimagesize( $copy );
        $top = 0;
        if ( strpos( $pos, 'bottom' ) !== false ) {
            $top = $height - $h;
        }
        imagecopy( $im, $stamp, 0, $top, 0, 0, $w, $h );
        if ( $extension == 'gif' ) {
            $out_func( $im, $temp_path );
        } else {
            $out_func( $im, $temp_path, $quality );
        }
        $original = clone $obj;
        $original->id( null );
        $obj->file( $app->fmgr->get( $temp_path ) );
        $obj->save();
        $changed_cols = ['file' => true ];
        PTUtil::pack_revision( $obj, $original, $changed_cols );
        $file_path = $temp_path;
        $square    = PTUtil::make_thumbnail( $file_path, 256, 'auto', 100, true );
        $thumbnail = PTUtil::make_thumbnail( $file_path, 280, 'auto', 100, false );
        $meta->metadata( $app->fmgr->get( $square ) );
        $meta->data( $app->fmgr->get( $thumbnail ) );
        $metadata = [];
        if ( $meta->id ) {
            $metadata = json_decode( $meta->text );
        }
        $metadata = ['file_size' => filesize( $file_path ), 'image_width' => $width, 'image_height' => $height,
                     'extension' => $extension, 'basename' => basename( $file_path, ".{$extension}" ),
                     'uploaded' => date( 'Y-m-d H:i:s', filemtime( $file_path ) ), 'user_id' => $app->user()->id,
                     'mime_type' => $obj->mime_type, 'file_name' => basename( $file_path ), 'class' => $obj->class ];
        $meta->text( json_encode( $metadata ) );
        $meta->save();
        $app->publish_obj( $obj, $original, false, true );
        $result = ['result'=> 'OK'];
        header( 'Content-type: application/json' );
        echo json_encode( $result );
        exit();
    }

    function combine_watermark ( $app ) {
        ini_set( 'memory_limit', -1 );
        ini_set( 'max_execution_time', 14400 );
        ignore_user_abort( true );
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $pos = $json['position'];
        $id = $app->param( 'id' );
        $obj = $app->db->model( 'upload_file' )->load( $id );
        $error = false;
        $plugin = $app->component( 'FileUploader' );
        if ( !$id || !$obj || !$plugin ) {
            $error = true;
        } else if ( $obj->class != 'image' && $obj->class != 'video' ) {
            $error = true;
        }
        $error_message = $pos ? $this->translate( 'An error occurred while combine the watermark.' )
                              : $this->translate( 'An error occurred while removing the watermark.' );
        if ( $error ) {
            return $app->json_error( $error_message );
        }
        $original = clone $obj;
        $file_path = $obj->file_path;
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        $extension = PTUtil::get_extension( $file_path );
        $backup_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS;
        $backup_path = $backup_dir . $obj->id . '.' . $extension;
        $meta = $app->db->model( 'meta' )->get_by_key(
            ['model' => 'upload_file', 'key' => 'file_path',
             'object_id' => $obj->id, 'kind' => 'metadata'] );
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['object_id' => $obj->id, 'model' => 'upload_file'] );
        if ( $app->publish_callbacks ) {
            $app->init_callbacks( 'blob', 'start_publish' );
            $app->init_callbacks( 'blob', 'pre_publish' );
            $app->init_callbacks( 'blob', 'post_publish' );
        }
        $current = $this->get_meta( $obj, $app );
        $current_pos = $current->value;
        $md5 = $current->text;
        $image_path = $this->get_config( 'watermark_dir' );
        if (! $image_path ) {
            $image_path = $this->path() . DS . 'watermark';
        } else {
            $image_path = rtrim( $image_path, DS );
        }
        if ( strpos( $pos, 'left' ) !== false ) {
            $watermark = $image_path . DS . 'left.png';
        } else {
            $watermark = $image_path . DS . 'right.png';
        }
        $this->set_meta( $obj, $pos, $watermark, $app );
        if (! $pos ) {
            if ( $app->fmgr->exists( $backup_path ) ) {
                if ( $app->publish_callbacks ) {
                    $unlink = false;
                    $callback = ['name' => 'start_publish', 'model' => 'blob',
                                 'urlinfo' => $url, 'object' => $obj, 'ctx' => $app->ctx,
                                 'original' => $original, 'unlink' => $unlink ];
                    $app->run_callbacks( $callback, 'blob', $unlink );
                    $callback['name'] = 'pre_publish';
                    $res = $app->run_callbacks( $callback, 'blob', $data );
                }
                $app->fmgr->copy( $backup_path, $file_path );
                if ( $app->publish_callbacks ) {
                    $callback['name'] = 'post_publish';
                    $ref = '';
                    $app->run_callbacks( $callback, 'blob', $ref, $data );
                }
                $meta_path = $backup_dir . $obj->id . '.json';
                if ( $app->fmgr->exists( $meta_path ) ) {
                    $meta->text( $app->fmgr->get( $meta_path ) );
                }
                if ( $obj->class == 'image' ) {
                    $meta_path = $backup_dir . $obj->id . '.square';
                    if ( $app->fmgr->exists( $meta_path ) ) {
                        $meta->metadata( $app->fmgr->get( $meta_path ) );
                    }
                    $meta_path = $backup_dir . $obj->id . '.thumbnail';
                    if ( $app->fmgr->exists( $meta_path ) ) {
                        $meta->data( $app->fmgr->get( $meta_path ) );
                    }
                }
                $meta->save();
                $result = ['result'=> 'OK'];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
            return $app->json_error( $error_message );
        }
        if (! $app->fmgr->exists( $backup_path ) ) {
            $app->fmgr->copy( $file_path, $backup_path );
            $meta_path = $backup_dir . $obj->id . '.json';
            $app->fmgr->put( $meta_path, $meta->text );
            if ( $obj->class == 'image' ) {
                $meta_path = $backup_dir . $obj->id . '.square';
                $app->fmgr->put( $meta_path, $meta->metadata );
                $meta_path = $backup_dir . $obj->id . '.thumbnail';
                $app->fmgr->put( $meta_path, $meta->data );
            }
        } else {
            if ( $current->id && $current_pos == $pos && md5_file( $watermark ) == $md5 ) {
                $result = ['result'=> 'OK'];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
        }
        list ( $w, $h ) = getimagesize( $watermark );
        $source = imagecreatefrompng( $watermark );
        $upload_dir = $app->upload_dir();
        $copy = $upload_dir . DS . 'watermark.png';
        if ( $obj->class == 'image' ) {
            list ( $width, $height ) = getimagesize( $backup_path );
            if ( $w != $width ) {
                $scale = $width / $w;
                $newWidth = $width;
                $newHeight = (int) $h * $scale;
                $image_p = imagecreatetruecolor( $newWidth, $newHeight );
                imagealphablending( $image_p, false );
                imagesavealpha( $image_p, true );
                imagecopyresampled( $image_p, $source, 0, 0, 0, 0, $newWidth, $newHeight, $w, $h );
                imagepng( $image_p, $copy, 0 );
            } else {
                $app->fmgr->copy( $watermark, $copy );
            }
            if ( $extension === 'webp' && PTUtil::is_webp_animated( $backup_path ) ) {
                return $app->json_error( $error_message );
            }
            switch ( $extension ) {
                case 'jpg':
                    $src_func = 'imagecreatefromjpeg';
                    $out_func = 'imagejpeg';
                    $quality  = 100;
                    break;
                case 'jpeg':
                    $src_func = 'imagecreatefromjpeg';
                    $out_func = 'imagejpeg';
                    $quality  = 100;
                    break;
                case 'gif':
                    $src_func = 'imagecreatefromgif';
                    $out_func = 'imagegif';
                    break;
                case 'png':
                    $src_func = 'imagecreatefrompng';
                    $out_func = 'imagepng';
                    $quality  = 0;
                    break;
                case 'webp':
                    $src_func = 'imagecreatefromwebp';
                    $out_func = 'imagewebp';
                    $quality  = 100;
                    break;
                default:
                    return $app->json_error( $error_message );
            }
            // TODO webp by convert command.
            if ( !function_exists( $src_func ) || !function_exists( $out_func ) ) {
                return $app->json_error( $this->translate( "'%s' function is not supported.", $out_func ) );
            }
            $im = $src_func( $backup_path );
            $stamp = imagecreatefrompng( $copy );
            list ( $w, $h ) = getimagesize( $copy );
            $top = 0;
            if ( strpos( $pos, 'bottom' ) !== false ) {
                $top = $height - $h;
            }
            imagecopy( $im, $stamp, 0, $top, 0, 0, $w, $h );
            if ( $app->publish_callbacks ) {
                $unlink = false;
                $callback = ['name' => 'start_publish', 'model' => 'blob',
                             'urlinfo' => $url, 'object' => $obj, 'ctx' => $app->ctx,
                             'original' => $original, 'unlink' => $unlink ];
                $app->run_callbacks( $callback, 'blob', $unlink );
                $callback['name'] = 'pre_publish';
                $res = $app->run_callbacks( $callback, 'blob', $data );
            }
            if ( $extension == 'gif' ) {
                $out_func( $im, $file_path );
            } else {
                $out_func( $im, $file_path, $quality );
            }
            if ( $app->publish_callbacks ) {
                $callback['name'] = 'post_publish';
                $ref = '';
                $app->run_callbacks( $callback, 'blob', $ref, $data );
            }
            $square    = PTUtil::make_thumbnail( $file_path, 256, 'auto', 100, true );
            $thumbnail = PTUtil::make_thumbnail( $file_path, 280, 'auto', 100, false );
            $meta->metadata( $app->fmgr->get( $square ) );
            $meta->data( $app->fmgr->get( $thumbnail ) );
            $metadata = [];
            if ( $meta->id ) {
                $metadata = json_decode( $meta->text );
            }
            $metadata = ['file_size' => filesize( $file_path ), 'image_width' => $width, 'image_height' => $height,
                         'extension' => $extension, 'basename' => basename( $file_path, ".{$extension}" ),
                         'uploaded' => date( 'Y-m-d H:i:s', filemtime( $file_path ) ), 'user_id' => $app->user()->id,
                         'mime_type' => $obj->mime_type, 'file_name' => basename( $file_path ), 'class' => $obj->class ];
            $meta->text( json_encode( $metadata ) );
            $meta->save();
            $this->fileuploader_backup( $obj, $app );
            $result = ['result'=> 'OK'];
            header( 'Content-type: application/json' );
            echo json_encode( $result );
            exit();
        }
        $ffmpeg = $app->simplifiedjapanese_ffmpeg_path;
        $ffprobe = $app->simplifiedjapanese_ffprobe_path;
        $file_path = escapeshellarg( $file_path );
        $cmd = "{$ffprobe} {$file_path} -show_entries stream=width,height";
        exec( $cmd, $output, $return_var );
        $result = $output[1];
        $width = preg_replace( '/^width=/', '', $result );
        $width = (int) $width;
        $result = $output[2];
        $height = preg_replace( '/^height=/', '', $result );
        $height = (int) $height;
        if ( $w != $width ) {
            $scale = $width / $w;
            $newWidth = $width;
            $newHeight = (int) $h * $scale;
            $image_p = imagecreatetruecolor( $newWidth, $newHeight );
            imagealphablending( $image_p, false );
            imagesavealpha( $image_p, true );
            imagecopyresampled( $image_p, $source, 0, 0, 0, 0, $newWidth, $newHeight, $w, $h );
            imagepng( $image_p, $copy, 0 );
        } else {
            $app->fmgr->copy( $watermark, $copy );
        }
        $out = $upload_dir . DS . 'watermark.' . $extension;
        if ( strpos( $pos, 'bottom' ) !== false ) {
            $opt = '-filter_complex "overlay=0:H-h"';
        } else {
            $opt = '-filter_complex "overlay=0:0"';
        }
        if ( $codec = $app->video_captions_codec ) {
            $opt .= " -c:v {$codec} ";
        }
        $cmd = "{$ffmpeg} -i {$backup_path} -i {$copy} {$opt} {$out}";
        if ( $app->publish_callbacks ) {
            $unlink = false;
            $callback = ['name' => 'start_publish', 'model' => 'blob',
                         'urlinfo' => $url, 'object' => $obj, 'ctx' => $app->ctx,
                         'original' => $original, 'unlink' => $unlink ];
            $app->run_callbacks( $callback, 'blob', $unlink );
            $callback['name'] = 'pre_publish';
            $res = $app->run_callbacks( $callback, 'blob', $data );
        }
        exec( $cmd, $output, $return_var );
        if ( $app->fmgr->exists( $out ) ) {
            $file_path = $obj->file_path;
            $app->fmgr->copy( $out, $file_path );
            if ( $app->publish_callbacks ) {
                $callback['name'] = 'post_publish';
                $ref = '';
                $app->run_callbacks( $callback, 'blob', $ref, $data );
            }
            $metadata = ['file_size' => filesize( $file_path ), 'image_width' => null, 'image_height' => null,
                         'extension' => $extension, 'basename' => basename( $file_path, ".{$extension}" ),
                         'uploaded' => date( 'Y-m-d H:i:s', filemtime( $file_path ) ), 'user_id' => $app->user()->id,
                         'mime_type' => $obj->mime_type, 'file_name' => basename( $file_path ), 'class' => $obj->class ];
            $meta->text( json_encode( $metadata ) );
            $meta->save();
            $this->fileuploader_backup( $obj, $app );
            $result = ['result'=> 'OK'];
            header( 'Content-type: application/json' );
            echo json_encode( $result );
            exit();
        }
        return $app->json_error( $error_message );
    }

    function set_watermark_param ( $cb, $app, &$param, &$tmpl ) {
        $model = $app->param( '_model' );
        $id = $app->param( 'id' );
        $ctx = $app->ctx;
        if ( ( $model == 'asset' || $model == 'upload_file' ) && $id ) {
            $app->template_paths[] = $this->path() . DS . 'alt-tmpl'  . DS . 'alt-tmpl';
            $app->update_ctx_include_paths( $ctx );
            $path_keys = array_map( 'strlen', array_keys( $ctx->template_paths ) );
            array_multisort( $path_keys, SORT_DESC, $ctx->template_paths );
            $path_keys = array_map( 'strlen', array_keys( $ctx->include_paths ) );
            array_multisort( $path_keys, SORT_DESC, $ctx->include_paths );
            $app->template_paths = array_keys( $ctx->include_paths );
            if ( $model == 'upload_file' ) {
                $obj = $app->db->model( 'upload_file' )->load( $id );
                if (! $obj ) {
                    return true;
                }
                $current = $this->get_meta( $obj, $app );
                if (! $current->id ) {
                    $default_pos = $this->get_config( 'default_pos' );
                } else {
                    $default_pos = $current->value;
                }
                $ctx->vars['watermark_default_pos'] = $default_pos;
                $file_path = $obj->file_path;
                $extension = PTUtil::get_extension( $file_path );
                $backup_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS;
                $backup_path = $backup_dir . $obj->id . '.' . $extension;
                if ( $app->fmgr->exists( $backup_path ) ) {
                    $ctx->vars['watermark_backup'] = true;
                }
                if ( $obj->class != 'video' ) {
                    $ctx->vars['genarate_percent'] = 100;
                    return true;
                }
                if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
                    $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
                }
                $ffprobe = $app->simplifiedjapanese_ffprobe_path;
                if (! $ffprobe ) {
                    $ctx->vars['watermark_video_support'] = false;
                    return true;
                }
                $ctx->vars['watermark_video_support'] = true;
                if ( isset( $ctx->vars['genarate_percent'] ) ) {
                    return true;
                }
                $cmd = $ffprobe . ' ' . escapeshellarg( $file_path ) . ' -hide_banner -show_entries format=duration';
                $result = shell_exec( $cmd );
                if ( preg_match( '/duration=(.*)\n/i', $result, $matchs ) ) {
                    $seconds = trim( $matchs[1] );
                    $seconds = (float) $seconds;
                    $genarate_percent = 25 / $seconds;
                    $genarate_percent = $genarate_percent;
                    if (! $genarate_percent ) {
                        $genarate_percent = 0.1;
                    }
                    $cmd = $ffprobe . ' ' . escapeshellarg( $file_path ) . ' -show_entries stream=width,height';
                    exec( $cmd, $output, $return_var );
                    $result = $output[1];
                    $width = preg_replace( '/^width=/', '', $result );
                    $width = (int) $width;
                    if (! $width ) $width = 1280;
                    $result = $output[2];
                    $height = preg_replace( '/^height=/', '', $result );
                    $height = (int) $height;
                    if (! $height ) $height = 720;
                    $basePixels = 1280 * 720;
                    $pixels = $width * $height;
                    $coefficient = $basePixels / $pixels;
                    $genarate_percent *= $coefficient;
                    $ctx->vars['genarate_percent'] = $genarate_percent;
                }
            } else if ( $model == 'asset' ) {
                $obj = $app->db->model( 'asset' )->load( $id );
                $permalink = $app->get_permalink( $obj );
                $url = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $permalink, 'model' => 'asset', 'object_id' => (int) $obj->id,
                                                                  'class' => 'file', 'key' => 'file', 'delete_flag' => [0, 1] ] );
                if (! $url->id ) {
                    return true;
                }
                $current = $this->get_meta( $obj, $app );
                if (! $current->id ) {
                    $default_pos = $this->get_config( 'default_pos' );
                } else {
                    $default_pos = $current->value;
                }
                $ctx->vars['watermark_default_pos'] = $default_pos;
                $file_path = $url->file_path;
                $extension = PTUtil::get_extension( $file_path );
                $backup_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS . 'asset' . DS;
                $backup_path = $backup_dir . $obj->id . '.' . $extension;
                if ( $app->fmgr->exists( $backup_path ) ) {
                    $ctx->vars['watermark_backup'] = true;
                }
            }
        }
        return true;
    }

    function set_meta ( $obj, $pos, $watermark, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $meta = $app->db->model( 'meta' )->get_by_key(
            ['kind' => 'metadata', 'model' => $obj->_model,
             'object_id' => $obj->id, 'key' => 'watermark'] );
        $meta->value( $pos );
        $meta->text( md5_file( $watermark ) );
        return $meta->save();
    }

    function get_meta ( $obj, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $meta = $app->db->model( 'meta' )->get_by_key(
            ['kind' => 'metadata', 'model' => $obj->_model,
             'object_id' => $obj->id, 'key' => 'watermark'] );
        return $meta;
    }

    function post_save_asset ( $cb, $app, $obj, $original ) {
        $comp_from = $obj->file ? base64_encode( $obj->file ) : '';
        $comp_to = $original->file ? base64_encode( $original->file ) : '';
        if ( $comp_from != $comp_to ) {
             $this->post_delete_asset( $cb, $app, $obj, $original );
        }
        return true;
    }

    function post_delete_asset ( $cb, $app, $obj, $original ) {
        $backup_basename = $app->support_dir . DS . 'backup' . DS . $this->id . DS . 'asset' . DS . $obj->id . '.*';
        foreach ( glob( $backup_basename ) as $filename ) {
            $app->fmgr->unlink( $filename );
        }
        return true;
    }

    function post_save_upload_file ( $cb, $app, $obj, $original ) {
        $plugin = $app->component( 'FileUploader' );
        if ( $plugin->updated ) {
            $this->post_delete_upload_file( $cb, $app, $obj, $original );
        }
        return true;
    }

    function post_delete_upload_file ( $cb, $app, $obj, $original ) {
        $backup_basename = $app->support_dir . DS . 'backup' . DS . $this->id . DS . $obj->id . '.*';
        foreach ( glob( $backup_basename ) as $filename ) {
            $app->fmgr->unlink( $filename );
        }
        return true;
    }

    function fileuploader_backup ( $obj, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $plugin = $app->component( 'FileUploader' );
        if ( $app->fileuploader_backup && $app->fmgr->exists( $obj->file_path ) ) {
            $cache_dir = $app->support_dir . DS . 'backup' . DS . $plugin->id . DS;
            $extension = $obj->file_ext;
            $cache = $cache_dir . md5( $obj->file_path ) . ".{$extension}";
            $app->fmgr->copy( $obj->file_path, $cache );
        }
    }

    function get_config ( $name, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $workspace_id = (int) $app->param( 'workspace_id' );
        $use_system_setting = $this->get_config_value( 'watermark_use_system_setting', $workspace_id );
        if ( $use_system_setting ) {
            $workspace_id = 0;
        }
        return $this->get_config_value( 'watermark_' . $name, $workspace_id );
    }
}