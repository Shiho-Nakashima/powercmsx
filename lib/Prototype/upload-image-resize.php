<?php
if ( $this->mode != 'fileuploader_upload' ) {
    $max_image_pixel = $this->max_image_pixel;
    if ( is_array( $max_image_pixel ) ) {
        $target_types = array_keys( $max_image_pixel );
    } else {
        $target_types = ['image/png', 'image/gif', 'image/webp', 'image/jpeg'];
    }
    $quality = $this->image_quality;
    foreach ( $_FILES as $input => $data ) {
        $types = isset( $data['type'] ) ? $data['type'] : [];
        if ( is_array( $types ) ) {
            foreach ( $types as $idx => $mime_type ) {
                if (! $mime_type || !in_array( $mime_type, $target_types ) ) continue;
                $tmp_name = $data['tmp_name'][ $idx ] ?? null;
                if (! $tmp_name ) continue;
                if ( function_exists( 'exif_read_data' ) && $mime_type !== 'image/gif' ) {
                    if ( ( $this->auto_orient || $this->remove_exif ) && @exif_read_data( $tmp_name ) ) {
                        $extension = str_replace( 'image/', '', $mime_type );
                        $rename = "{$tmp_name}.{$extension}";
                        if ( $this->fmgr->rename( $tmp_name, $rename ) ) {
                            $size = null;
                            if ( $this->auto_orient ) {
                                $size = PTUtil::fix_orientation( $rename );
                            } else if ( $this->remove_exif ) {
                                $size = PTUtil::remove_exif( $rename );
                            }
                            if ( $size ) {
                                $data['size'][ $idx ] = $size;
                            }
                            $this->fmgr->rename( $rename, $tmp_name );
                        }
                    }
                }
                if ( is_array( $max_image_pixel ) ) {
                    $max_pixel = (int) $max_image_pixel[ $mime_type ];
                } else if ( is_numeric( $max_image_pixel ) ) {
                    $max_pixel = $max_image_pixel;
                }
                if ( $max_pixel < 1 ) continue;
                if ( $size = prototype_image_resize( $this, $tmp_name, $max_pixel, $mime_type, $quality ) ) {
                    $data['size'][ $idx ] = $size;
                }
            }
        } else if ( isset( $names ) && $names ) {
            $mime_type = $data['type'];
            if (! $mime_type || !in_array( $mime_type, $target_types ) ) continue;
            $tmp_name = $data['tmp_name'] ?? null;
            if (! $tmp_name ) continue;
                if ( function_exists( 'exif_read_data' ) && $mime_type !== 'image/gif' ) {
                    if ( ( $this->auto_orient || $this->remove_exif ) && @exif_read_data( $tmp_name ) ) {
                    $extension = str_replace( 'image/', '', $mime_type );
                    $rename = "{$tmp_name}.{$extension}";
                    if ( $this->fmgr->rename( $tmp_name, $rename ) ) {
                        $size = null;
                        if ( $this->auto_orient ) {
                            $size = PTUtil::fix_orientation( $rename );
                        } else if ( $this->remove_exif ) {
                            $size = PTUtil::remove_exif( $rename );
                        }
                        if ( $size ) {
                            $data['size'] = $size;
                            $_FILES[ $input ] = $data;
                        }
                        $this->fmgr->rename( $rename, $tmp_name );
                    }
                }
            }
            if ( is_array( $max_image_pixel ) ) {
                $max_pixel = (int) $max_image_pixel[ $mime_type ];
            } else if ( is_numeric( $max_image_pixel ) ) {
                $max_pixel = $max_image_pixel;
            }
            if ( $max_pixel < 1 ) continue;
            if ( $size = prototype_image_resize( $this, $tmp_name, $max_pixel, $mime_type, $quality ) ) {
                $data['size'] = $size;
                $_FILES[ $input ] = $data;
            }
        }
        $_FILES[ $input ] = $data;
    }
}
function prototype_image_resize ( $app, $path, $max_pixel, $mime_type, $quality ) {
    list( $w, $h ) = getimagesize( $path );
    if (! $w ||! $h ) {
        return;
    }
    if ( $w <= $max_pixel && $h <= $max_pixel ) {
        return;
    }
    $scale = 100;
    list( $newWidth, $newHeight ) = [ $max_pixel, $max_pixel ];
    if ( $w > $h ) {
        $scale = $max_pixel / $w;
        $newHeight = $h * $scale;
        $newHeight = round( $newHeight );
        if (! $newHeight ) $newHeight = 1;
    } else {
        $scale = $max_pixel / $h;
        $newWidth = $w * $scale;
        $newWidth = round( $newWidth );
        if (! $newWidth ) $newWidth = 1;
    }
    switch ( $mime_type ) {
        case 'image/jpeg':
            $src_func = 'imagecreatefromjpeg';
            $out_func = 'imagejpeg';
            break;
        case 'image/gif':
            $src_func = 'imagecreatefromgif';
            $out_func = 'imagegif';
            break;
        case 'image/png':
            $src_func = 'imagecreatefrompng';
            $out_func = 'imagepng';
            break;
        case 'image/webp':
            $src_func = 'imagecreatefromwebp';
            $out_func = 'imagewebp';
            break;
        default:
            return '';
    }
    if ( $src_func === 'imagecreatefromwebp' ) {
        $is_animated = PTUtil::is_webp_animated( $path );
        if ( $is_animated ) {
            return;
        }
    }
    if ( $mime_type == 'image/png' && $quality >= 10 ) {
        $quality *= 0.1;
        $quality = (int) $quality;
        if ( $quality > 9 ) {
            $quality = 0;
        }
    } else if ( $mime_type == 'image/png' && $quality == 0 ) {
        $quality = 9;
    }
    $source = @$src_func( $path );
    if ( $source === false ) {
        trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $path, $src_func ] ) );
        return false;
    }
    $image = imagecreatetruecolor( $newWidth, $newHeight );
    if ( $mime_type == 'image/png' || $mime_type == 'image/webp' ) {
        imagealphablending( $image, false );
        imagesavealpha( $image, true );
    }
    imagecopyresampled( $image, $source, 0, 0, 0, 0, $newWidth, $newHeight, $w, $h );
    if ( $mime_type == 'image/gif' ) {
        $res = $out_func( $image, $path );
    } else {
        $res = $out_func( $image, $path, $quality );
    }
    if ( $res === false ) {
        trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $path, $out_func ] ) );
        return false;
    }
    if (! defined( 'NOT_VERIFY_THE_IMAGE' ) ) {
        define( 'NOT_VERIFY_THE_IMAGE', true );
    }
    return filesize( $path );
}