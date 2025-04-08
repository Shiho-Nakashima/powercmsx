<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class Text2OgImage extends PTPlugin {

    private $background_cmds = [];

    function __construct () {
        parent::__construct();
    }

    function post_init ( $app ) {
        if ( $app->id == 'Prototype' && $app->mode === 'manage_plugins' ) {
            $app->ctx->vars['webp_support'] = function_exists( 'imagecreatefromwebp' );
        }
    }

    function pre_save_plugin_config ( $cb, $app, $component, &$errors ) {
        if ( $component->id != 'text2ogimage' ) {
            return true;
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $cache = $app->support_dir . DS . 'cache' . DS . $this-> id . '_cache' . DS . $workspace_id;
        PTUtil::remove_dir( $cache );
        return true;
    }

    function post_run ( $app ) {
        $background_cmds = $this->background_cmds;
        if (! empty( $background_cmds ) ) {
            foreach ( $background_cmds as $url => $data ) {
                $command = $data['command'];
                $foreground = $data['foreground'];
                $background = $data['background'];
                $cache_key = $data['cache_key'];
                $orig_h = $data['height'];
                $out_path = $data['out_path'];
                $file_path = $data['file_path'];
                $label = $data['label'];
                $src_func = $data['src_func'];
                $out_func = $data['out_func'];
                $asset = $data['asset'];
                $quality = $data['quality'];
                $result = shell_exec( $command );
                $img = $src_func( $foreground );
                $rgb = $this->pickColor( $img, 1, 1 );
                $transparent = imagecolorallocate( $img, $rgb['red'], $rgb['green'], $rgb['blue'] );
                imagecolortransparent( $img, $transparent );
                imagepng( $img, $foreground, 0 );
                imagedestroy( $img );
                $im = $src_func( $background );
                $stamp = imagecreatefrompng( $foreground );
                list ( $w, $h ) = getimagesize( $foreground );
                $top = $orig_h / 2;
                $top = $top - ( $h / 2 );
                $top = (int) $top;
                imagecopy( $im, $stamp, 0, $top, 0, 0, $w, $h );
                if ( $out_func == 'imagegif' ) {
                    $out_func( $im, $out_path );
                } else {
                    $out_func( $im, $out_path, $quality );
                }
                $cache_dir = dirname( $app->support_dir . DS . 'cache' . DS . $this->id . '_cache' . DS . $cache_key );
                if ( $app->fmgr->exists( $cache_dir ) ) {
                    PTUtil::remove_dir( $cache_dir, true );
                }
                $this->set_cache( $cache_key, $app->fmgr->get( $out_path ) );
                unset ( $this->background_cmds[ $url ] );
                if ( $app->id == 'Prototype' && $app->mode == 'save' && $app->param( '_preview' ) ) {
                    continue;
                }
                if ( $asset->_model == 'asset' ) {
                    $asset->file( $app->fmgr->get( $out_path ) );
                    $asset->size( filesize( $out_path ) );
                    $app->set_default( $asset );
                    $error = null;
                    PTUtil::file_attach_to_obj( $app, $asset, 'file', $out_path, $label, $error );
                    $app->publish_obj( $asset );
                } else {
                    $app->fmgr->rename( $out_path, $asset->file_path );
                    $asset->is_published( 1 );
                    $asset->was_published( 1 );
                    $asset->md5( md5_file( $asset->file_path ) );
                    $asset->save();
                    if ( $app->publish_callbacks ) {
                        $app->init_callbacks( 'blob', 'start_publish' );
                        $app->init_callbacks( 'blob', 'pre_publish' );
                        $app->init_callbacks( 'blob', 'post_publish' );
                        $unlink = false;
                        $obj = $data['obj'];
                        $original = $obj;
                        $data = $app->fmgr->get( $asset->file_path );
                        $callback = ['name' => 'start_publish', 'model' => 'blob',
                                     'urlinfo' => $asset, 'object' => $obj, 'ctx' => $app->ctx,
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
            }
        }
    }

    function editor_ogimage ( $app ) {
        if ( $app->request_method === 'POST' ) {
            $content = file_get_contents( 'php://input' );
            if (! $content ) {
                return $app->json_error( $this->translate( 'An error occurred while generating the og:image.' ) );
            }
            $json = json_decode( $content );
            if (!is_object( $json ) ) {
                return $app->json_error( $this->translate( 'An error occurred while generating the og:image.' ) );
            }
            $magic_token = $json->magic_token;
            if ( $magic_token != $app->current_magic ) {
                $app->json_error( 'Invalid request.' );
            }
            $text = $json->text;
            $coefficient = $json->coefficient ?? null;
            $image = $this->text2ogimage( $app, $text, $coefficient, $mime_type );
            $filename = 'og-image-' . date('Y-m-d_H-i-s');
            $extention = str_replace( 'image/', '', $mime_type );
            $filename .= '.' . $extention;
            $data = base64_encode( file_get_contents( $image ) );
            $data = "data:{$mime_type};base64,{$data}";
            header( 'Content-type: application/json' );
            echo json_encode( ['src' => $data, 'filename' => $filename ] );
            exit();
        }
        $workspace = $app->workspace();
        $ctx = $app->ctx;
        if (! $workspace ) {
            $workspace = $ctx->stash( 'workspace' );
        }
        $workspace_id = $workspace ? (int)$workspace->id : 0;
        $cfg_workspace_id = $workspace_id;
        if ( $cfg_workspace_id ) {
            $use_system_setting = $this->get_config_value( 'text2ogimage_use_system_setting', $cfg_workspace_id );
            if ( $use_system_setting ) {
                $cfg_workspace_id = 0;
            }
        }
        $coefficient = $this->get_config_value( 'text2ogimage_coefficient', $cfg_workspace_id );
        $param = ['coefficient' => $coefficient ];
        $tmpl = $app->ctx->get_template_path( 'editor_ogimage.tmpl' );
        echo $app->build_page( $tmpl, $param );
    }

    function text2ogimage ( $app, $text, $coefficient = null, &$mime_type = null ) {
        $workspace = $app->workspace();
        $ctx = $app->ctx;
        $old_vars = $ctx->vars;
        if (! $workspace ) {
            $workspace = $ctx->stash( 'workspace' );
        }
        $workspace_id = $workspace ? (int)$workspace->id : 0;
        $cfg_workspace_id = $workspace_id;
        if ( $cfg_workspace_id ) {
            $use_system_setting = $this->get_config_value( 'text2ogimage_use_system_setting', $cfg_workspace_id );
            if ( $use_system_setting ) {
                $cfg_workspace_id = 0;
            }
        }
        $bg_image_path = $this->get_config_value( 'text2ogimage_bg_image_path', $cfg_workspace_id );
        if (! $bg_image_path ) {
            $bg_image_path = $this->path() . DS . 'image' . DS . 'og_image.png';
        }
        if (! $app->fmgr->exists( $bg_image_path ) ) {
            exit();
        }
        $out_extension = $this->get_config_value( 'text2ogimage_extension', $cfg_workspace_id );
        if (! $out_extension ) {
            $out_extension = 'png';
        }
        $command = PTUtil::property_exists( $app, 'simplifiedjapanese_wkhtmltoimage_path' )
                      ? $app->simplifiedjapanese_wkhtmltoimage_path
                      : '/usr/local/bin/wkhtmltoimage';
        $command = escapeshellcmd( $command );
        list ( $orig_w, $orig_h ) = getimagesize( $bg_image_path );
        $command .= " --width {$orig_w} --quality 100 ";
        $background = $bg_image_path;
        $extension = PTUtil::get_extension( $bg_image_path, true );
        $quality = (int) $this->get_config_value( 'text2ogimage_quality', $cfg_workspace_id );
        if ( $quality > 100 ) {
            $quality = 100;
        }
        list ( $src_func, $out_func, $mime_type ) = $this->get_image_funcs( $extension, $out_extension, $quality );
        $tmpl = $app->ctx->get_template_path( 'text2ogimage-wkhtmltoimage.tmpl' );
        $font_face = $this->get_config_value( 'text2ogimage_canvas_font_face', $cfg_workspace_id );
        $plain_text = $text;
        if ( stripos( $plain_text, '<ruby' ) !== false ) {
            $plain_text = preg_replace( "/<rt[^>]*>.*?<\/rt>/si", '', $plain_text );
            $plain_text = preg_replace( "/<rp[^>]*>.*?<\/rp>/si", '', $plain_text );
            $plain_text = strip_tags( $plain_text );
        }
        if ( preg_match( "/<rt[^>]*>.*?<\/rt>/", $text ) ) {
            $line_height = '2.4em';
            if ( stripos( $font_face, 'BIZ UDP' ) === 0 ) {
                $text = preg_replace( "/(<rt[^>]*>)/", '$1<span class="rt">', $text );
                $text = str_replace( "</rt>", '</span></rt>', $text );
            }
        } else {
            $line_height = '1.5em';
        }
        $font_weight = $this->get_config_value( 'text2ogimage_canvas_font_weight', $cfg_workspace_id );
        $font_size = $this->get_config_value( 'text2ogimage_font_size', $cfg_workspace_id );
        $text_align = $this->get_config_value( 'text2ogimage_text_align', $cfg_workspace_id );
        $padding_right = $this->get_config_value( 'text2ogimage_padding_right', $cfg_workspace_id );
        $padding_left = $this->get_config_value( 'text2ogimage_padding_left', $cfg_workspace_id );
        $padding_top = $this->get_config_value( 'text2ogimage_padding_top', $cfg_workspace_id );
        $padding_bottom = $this->get_config_value( 'text2ogimage_padding_bottom', $cfg_workspace_id );
        $canvas_font = $this->get_config_value( 'text2ogimage_canvas_font', $cfg_workspace_id );
        $webfont = $this->get_config_value( 'text2ogimage_canvas_webfont', $cfg_workspace_id );
        $font_color = $this->get_config_value( 'text2ogimage_font_color', $cfg_workspace_id );
        $mask_color = $this->get_config_value( 'text2ogimage_mask_color', $cfg_workspace_id );
        $ruby_color = $this->get_config_value( 'text2ogimage_ruby_color', $cfg_workspace_id );
        $app->ctx->vars['font_color'] = $font_color;
        $app->ctx->vars['mask_color'] = $mask_color;
        $app->ctx->vars['ruby_color'] = $ruby_color;
        $app->ctx->vars['canvas_webfont'] = $webfont;
        $app->ctx->vars['font_size'] = $font_size;
        // $auto_fontsize = $this->get_config_value( 'text2ogimage_auto_fontsize', $cfg_workspace_id );
        // if ( $auto_fontsize ) {
        $coefficient = $coefficient ? $coefficient : $this->get_config_value( 'text2ogimage_coefficient', $cfg_workspace_id );
        $str_width = mb_strwidth( $plain_text ) / 2;
        $font_size = 240;
        if ( $str_width >= 100 ) {
            $coefficient *= 2;
            $different = $str_width - 100;
            $font_size = $font_size - $different * $coefficient;
        } else {
            $font_size = 220;
            $coefficient = 1.0 - $coefficient;
            $different = 100 - $str_width;
            $font_size = $font_size + ( $different * $coefficient * 1.8 );
            // $font_size = 440 + $str_width - $font_size;
        }
        $app->ctx->vars['font_size'] = $font_size;
        // }
        $app->ctx->vars['text_align'] = $text_align;
        $app->ctx->vars['padding_left'] = $padding_left;
        $app->ctx->vars['padding_right'] = $padding_right;
        $app->ctx->vars['padding_top'] = $padding_top;
        $app->ctx->vars['padding_bottom'] = $padding_bottom;
        $app->ctx->vars['canvas_font_face'] = $font_face;
        $app->ctx->vars['canvas_font_weight'] = $font_weight;
        $app->ctx->vars['canvas_font'] = $canvas_font;
        $app->ctx->vars['line_height'] = $line_height;
        $app->ctx->vars['html'] = $text;
        $render_html = $app->build( $app->fmgr->get( $tmpl ) );
        $app->ctx->vars = $old_vars;
        $upload_dir = $app->upload_dir();
        $html_path = $upload_dir . DS . 'og_image.html';
        $app->fmgr->put( $html_path, $render_html );
        $foreground = $upload_dir . DS . 'og_text.png';
        $out_path = $upload_dir . DS . 'og_image.png';
        $command .= "{$html_path} {$foreground}";
        usleep( 240000 );
        $result = shell_exec( $command );
        $img = $src_func( $foreground );
        $rgb = $this->pickColor( $img, 1, 1 );
        $transparent = imagecolorallocate( $img, $rgb['red'], $rgb['green'], $rgb['blue'] );
        imagecolortransparent( $img, $transparent );
        imagepng( $img, $foreground, 0 );
        imagedestroy( $img );
        $im = $src_func( $background );
        $stamp = imagecreatefrompng( $foreground );
        list ( $w, $h ) = getimagesize( $foreground );
        $top = $orig_h / 2;
        $top = $top - ( $h / 2 );
        $top = (int) $top;
        imagecopy( $im, $stamp, 0, $top, 0, 0, $w, $h );
        if ( $out_func == 'imagegif' ) {
            $out_func( $im, $out_path );
        } else {
            $out_func( $im, $out_path, $quality );
        }
        return $out_path;
    }

    function hdlr_text2ogimage ( $args, $ctx ) {
        $app = $ctx->app;
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? (int)$workspace->id : 0;
        $cfg_workspace_id = $workspace_id;
        if ( $cfg_workspace_id ) {
            $use_system_setting = $this->get_config_value( 'text2ogimage_use_system_setting', $cfg_workspace_id );
            if ( $use_system_setting ) {
                $cfg_workspace_id = 0;
            }
        }
        $model = $ctx->stash( 'current_context' );
        if (! $model ) {
            $model = 'template';
        }
        $obj = $ctx->stash( $model );
        if (! $obj ) {
            return '';
        }
        $id = $obj->id;
        $text = $args['text'] ?? null;
        if (! $text ) {
            $t = $app->get_table( $model );
            $primary = $t->primary;
            $text = $obj->$primary;
        }
        if (! $text ) {
            return '';
        }
        if ( isset( $args['convert_breaks'] ) ) {
            $text = PTUtil::convert_breaks( $text );
        }
        $plain_text = $text;
        if ( stripos( $plain_text, '<ruby' ) !== false ) {
            $plain_text = preg_replace( "/<rt[^>]*>.*?<\/rt>/si", '', $plain_text );
            $plain_text = preg_replace( "/<rp[^>]*>.*?<\/rp>/si", '', $plain_text );
            $plain_text = strip_tags( $plain_text );
        }
        $ruby = $args['furigana'] ?? false;
        if ( $ruby ) {
            $SimplifiedJapanese = $this->class_simplified_japanese( $app );
            $text = $SimplifiedJapanese->filter_furigana( $text, $ruby, $ctx );
            if ( preg_match( "/<rt[^>]*>.*?<\/rt>/", $text ) ) {
                $text = preg_replace( "/<rt[^>]*>(.*?)<\/rt>/si", '<rt><span class="ruby">$1</span></rt>', $text );
            }
        }
        $bg_image_path = $this->get_config_value( 'text2ogimage_bg_image_path', $cfg_workspace_id );
        if (! $bg_image_path ) {
            $bg_image_path = $this->path() . DS . 'image' . DS . 'og_image.png';
        }
        if (! $app->fmgr->exists( $bg_image_path ) ) {
            return '';
        }
        $out_extension = $this->get_config_value( 'text2ogimage_extension', $cfg_workspace_id );
        if (! $out_extension ) {
            $out_extension = 'png';
        }
        $basename_tmpl = $this->get_config_value( 'text2ogimage_basename', $cfg_workspace_id );
        $old_vars = $app->ctx->vars;
        $app->ctx->vars['model'] = $model;
        $app->ctx->vars['id'] = $id;
        $basename = $app->build( $basename_tmpl );
        $basename .= '.' . $out_extension;
        $command = PTUtil::property_exists( $app, 'simplifiedjapanese_wkhtmltoimage_path' )
                      ? $app->simplifiedjapanese_wkhtmltoimage_path
                      : '/usr/local/bin/wkhtmltoimage';
        $command = escapeshellcmd( $command );
        list ( $orig_w, $orig_h ) = getimagesize( $bg_image_path );
        $command .= " --width {$orig_w} --quality 100 ";
        $background = $bg_image_path;
        $extension = PTUtil::get_extension( $bg_image_path, true );
        $quality = (int) $this->get_config_value( 'text2ogimage_quality', $cfg_workspace_id );
        if ( $quality > 100 ) {
            $quality = 100;
        }
        list ( $src_func, $out_func, $mime_type ) = $this->get_image_funcs( $extension, $out_extension, $quality );
        $tmpl = $app->ctx->get_template_path( 'text2ogimage-wkhtmltoimage.tmpl' );
        $font_face = $this->get_config_value( 'text2ogimage_canvas_font_face', $cfg_workspace_id );
        if ( preg_match( "/<rt[^>]*>.*?<\/rt>/", $text ) ) {
            $line_height = '2.4em';
        } else {
            $line_height = '1.5em';
        }
        $font_weight = $this->get_config_value( 'text2ogimage_canvas_font_weight', $cfg_workspace_id );
        $font_size = $this->get_config_value( 'text2ogimage_font_size', $cfg_workspace_id );
        $text_align = $this->get_config_value( 'text2ogimage_text_align', $cfg_workspace_id );
        $padding_right = $this->get_config_value( 'text2ogimage_padding_right', $cfg_workspace_id );
        $padding_left = $this->get_config_value( 'text2ogimage_padding_left', $cfg_workspace_id );
        $padding_top = $this->get_config_value( 'text2ogimage_padding_top', $cfg_workspace_id );
        $padding_bottom = $this->get_config_value( 'text2ogimage_padding_bottom', $cfg_workspace_id );
        $canvas_font = $this->get_config_value( 'text2ogimage_canvas_font', $cfg_workspace_id );
        $webfont = $this->get_config_value( 'text2ogimage_canvas_webfont', $cfg_workspace_id );
        $font_color = $this->get_config_value( 'text2ogimage_font_color', $cfg_workspace_id );
        $mask_color = $this->get_config_value( 'text2ogimage_mask_color', $cfg_workspace_id );
        $app->ctx->vars['font_color'] = $font_color;
        $app->ctx->vars['mask_color'] = $mask_color;
        $app->ctx->vars['canvas_webfont'] = $webfont;
        $app->ctx->vars['font_size'] = $font_size;
        $auto_fontsize = $this->get_config_value( 'text2ogimage_auto_fontsize', $cfg_workspace_id );
        if ( $auto_fontsize ) {
            $coefficient = $this->get_config_value( 'text2ogimage_coefficient', $cfg_workspace_id );
            $str_width = mb_strwidth( $plain_text ) / 2;
            $font_size = 240;
            if ( $str_width >= 100 ) {
                $different = $str_width - 100;
                $font_size = $font_size - $different * $coefficient;
            } else {
                $different = 100 - $str_width;
                $font_size = $font_size + $different * $coefficient;
            }
            $app->ctx->vars['font_size'] = $font_size;
        }
        $app->ctx->vars['text_align'] = $text_align;
        $app->ctx->vars['padding_left'] = $padding_left;
        $app->ctx->vars['padding_right'] = $padding_right;
        $app->ctx->vars['padding_top'] = $padding_top;
        $app->ctx->vars['padding_bottom'] = $padding_bottom;
        $app->ctx->vars['canvas_font_face'] = $font_face;
        $app->ctx->vars['canvas_font_weight'] = $font_weight;
        $app->ctx->vars['canvas_font'] = $canvas_font;
        $app->ctx->vars['line_height'] = $line_height;
        $app->ctx->vars['html'] = $text;
        $render_html = $app->build( $app->fmgr->get( $tmpl ) );
        $app->ctx->vars = $old_vars;
        $cache_key = md5( $render_html ) . '-';
        $cache_key .= md5( $bg_image_path ) . '-';
        $cache_key .= $app->text2ogimage_model . '-';
        $cache_key .= $quality;
        $cache_key .= '.' . $out_extension;
        $cache_key = $workspace_id . DS . $model . DS . $id . DS . $cache_key;
        $table = $app->get_table( 'asset' );
        $extra_path = $table->out_path ? $table->out_path : 'assets';
        $app->sanitize_dir( $extra_path );
        $url = $workspace ? $workspace->site_url : $app->site_url;
        $url .= $extra_path;
        $url .= $basename;
        if ( $app->id == 'Prototype' && $app->mode == 'save' && $app->param( '_preview' ) ) {
            if ( !$app->text2ogimage_at_preview || $app->text2ogimage_model == 'asset' ) {
                return $url;
            }
        }
        if (! $id ) {
            return $url;
        }
        $file_path = $workspace ? $workspace->site_path : $app->site_path;
        $file_path .= DS . $extra_path;
        $file_path .= $basename;
        $cache = $app->support_dir . DS . 'cache' . DS . $this->id . '_cache' . DS . $cache_key;
        $terms = ['file_path' => $file_path, 'object_id' => $id, 'model' => $model,
                  'class' => 'file', 'workspace_id' => $workspace_id,
                  'key' => 'plugin_og_image', 'delete_flag' => [0, 1] ];
        $urlinfo = $app->db->model( 'urlinfo' )->get_by_key( $terms );
        $urlinfo_save = true;
        if ( $app->fmgr->exists( $cache ) ) {
            if ( $obj->has_column( 'status' ) ) {
                $status_published = $app->status_published( $model );
                if ( $status_published != $obj->status ) {
                    $urlinfo_save = false;
                }
            }
            if ( $urlinfo_save && ! $urlinfo->id && !$app->fmgr->exists( $file_path ) ) {
                if ( $app->id == 'Prototype' && $app->mode == 'save' && $app->param( '_preview' ) ) {
                } else {
                    PTUtil::set_url_path( $urlinfo );
                    $app->fmgr->copy( $cache, $file_path );
                    $urlinfo->is_published( 1 );
                    $urlinfo->was_published( 1 );
                    $urlinfo->md5( md5_file( $cache ) );
                    $urlinfo->mime_type( PTUtil::get_mime_type( $file_path ) );
                    $urlinfo->save();
                    if ( $app->publish_callbacks ) {
                        $app->init_callbacks( 'blob', 'start_publish' );
                        $app->init_callbacks( 'blob', 'pre_publish' );
                        $app->init_callbacks( 'blob', 'post_publish' );
                        $unlink = false;
                        $original = $obj;
                        $data = $app->fmgr->get( $file_path );
                        $callback = ['name' => 'start_publish', 'model' => 'blob',
                                     'urlinfo' => $urlinfo, 'object' => $obj, 'ctx' => $app->ctx,
                                     'original' => $original, 'unlink' => $unlink ];
                        $app->run_callbacks( $callback, 'blob', $unlink );
                        $callback['name'] = 'pre_publish';
                        $res = $app->run_callbacks( $callback, 'blob', $data );
                        // TODO::Move to Before Save.
                        $callback['name'] = 'post_publish';
                        $ref = '';
                        $app->run_callbacks( $callback, 'blob', $ref, $data );
                    }
                    return $url;
                }
            }
        }
        if ( $app->fmgr->exists( $file_path ) && $app->fmgr->exists( $cache ) ) {
            $mtime = filemtime( $cache );
            $bg_mtime = filemtime( $background );
            if ( $bg_mtime < $mtime ) {
                if ( $urlinfo->id ) {
                    if ( $urlinfo_save ) {
                        $urlinfo->save();
                    }
                    return $url;
                }
            }
        } else if ( $app->fmgr->exists( $cache ) && $urlinfo->id ) {
            if ( md5_file( $cache ) == $urlinfo->md5 ) {
                if ( $urlinfo_save ) {
                    $app->fmgr->copy( $cache, $file_path );
                    $urlinfo->save();
                }
                return $url;
            }
        }
        if (! $urlinfo_save ) {
            return $url;
        }
        $upload_dir = $app->upload_dir();
        $html_path = $upload_dir . DS . 'og_image.html';
        $app->fmgr->put( $html_path, $render_html );
        $foreground = $upload_dir . DS . 'og_text.png';
        $out_path = $upload_dir . DS . 'og_image.png';
        $command .= "{$html_path} {$foreground}";
        if ( $app->text2ogimage_model == 'asset' ) {
            $asset = $app->db->model( 'asset' )->get_by_key(
              ['file_name' => $basename, 'extra_path' => $extra_path, 'workspace_id' => $workspace_id ] );
            $label = $basename;
            $asset->set_values(
                ['label' => $basename, 'extra_path' => $extra_path,
                 'image_width' => $orig_w, 'image_height' => $orig_h, 'status' => 4,
                 'class' => 'image', 'file_name' => $basename,
                 'file_ext' => $out_extension, 'mime_type' => $mime_type,
                 'workspace_id' => $workspace_id ] );
        } else {
            // urlinfo
            $terms = ['object_id' => $id, 'model' => $model, 'class' => 'file',
                      'workspace_id' => $workspace_id, 'key' => 'plugin_og_image'];
            $terms['delete_flag'] = [0, 1];
            $asset = $app->db->model( 'urlinfo' )->get_by_key( $terms );
            if ( $asset->id && $asset->file_path != $file_path ) {
                $asset->remove();
                $asset->id( null );
            }
            $asset->file_path( $file_path );
            $asset->mime_type( PTUtil::get_mime_type( $file_path ) );
            PTUtil::set_url_path( $asset );
        }
        $data = ['command' => $command, 'foreground' => $foreground, 'src_func' => $src_func,
                 'background' => $background, 'height' => $orig_h, 'out_func' => $out_func,
                 'out_path' => $out_path, 'label' => strip_tags( $args['text'] ), 'cache_key' => $cache_key,
                 'asset' => $asset, 'quality' => $quality, 'file_path' => $file_path, 'obj' => $obj ];
        $this->background_cmds[ $url ] = $data;
        if ( $app->text2ogimage_realtime ) {
            if ( $app->id == 'Prototype' && $app->mode == 'rebuild_phase' ) {
                return $url;
            } else if ( $app->id == 'Prototype' && $app->mode == 'save' && $app->param( '_preview' ) ) {
                return $url;
            }
            $this->post_run( $app );
        }
        return $url;
    }

    function get_image_funcs ( $extension, $out_extension, &$quality ) {
        $src_func = null;
        $out_func = null;
        $mime_type = null;
        switch ( $extension ) {
            case 'jpg':
                $src_func = 'imagecreatefromjpeg';
                $out_func = 'imagejpeg';
                break;
            case 'jpeg':
                $src_func = 'imagecreatefromjpeg';
                $out_func = 'imagejpeg';
                break;
            case 'gif':
                $src_func = 'imagecreatefromgif';
                $out_func = 'imagegif';
                break;
            case 'png':
                $src_func = 'imagecreatefrompng';
                $out_func = 'imagepng';
                break;
            case 'webp':
                $src_func = 'imagecreatefromwebp';
                $out_func = 'imagewebp';
                break;
            default:
                return '';
        }
        switch ( $out_extension ) {
            case 'jpg':
                $out_func = 'imagejpeg';
                $quality  = 100;
                $mime_type = 'image/jpeg';
                break;
            case 'jpeg':
                $out_func = 'imagejpeg';
                $quality  = 100;
                $mime_type = 'image/jpeg';
                break;
            case 'gif':
                $out_func = 'imagegif';
                $mime_type = 'image/gif';
                break;
            case 'png':
                $out_func = 'imagepng';
                if ( $quality >= 10 ) {
                    $quality *= 0.1;
                    $quality = (int) $quality;
                    if ( $quality > 9 ) {
                        $quality = 0;
                    }
                } else if ( $type == 'png' && $quality == 0 ) {
                    $quality = 1;
                }
                $mime_type = 'image/png';
                break;
            case 'webp':
                $out_func = 'imagewebp';
                $quality  = 100;
                $mime_type = 'image/webp';
                break;
        }
        return [ $src_func, $out_func, $mime_type ];
    }

    function pickColor( $gd_obj, $x, $y ){
        $rgb = imagecolorat( $gd_obj, $x, $y );
        $array['red'] = ( $rgb >> 16 ) & 0xFF;
        $array['green'] = ( $rgb >> 8 ) & 0xFF;
        $array['blue'] = $rgb & 0xFF;
        return $array;
    }

    function remove_unpublish_ogimage ( $app ) {
        $counter = 0;
        $publish_callbacks = $app->publish_callbacks;
        if ( $publish_callbacks ) {
            $app->init_callbacks( 'blob', 'start_publish' );
            $unlink = true;
            $callback = ['name' => 'start_publish', 'model' => 'blob',
                         'ctx' => $app->ctx, 'unlink' => $unlink ];
        }
        $conditions = [0 => 2, 1 => 4];
        foreach ( $conditions as $start_end => $status_published ) {
            $tables = $app->db->model( 'table' )->load_iter( ['has_status' => 1, 'start_end' => $start_end ], null, 'name' );
            $tables = $tables->fetchAll( PDO::FETCH_COLUMN );
            $plugin_og_images = $app->db->model( 'urlinfo' )->load(
                ['class' => 'file', 'key' => 'plugin_og_image', 'model' => ['IN' => $tables ] ] );
            foreach ( $plugin_og_images as $plugin_og_image ) {
                $obj = $app->db->model( $plugin_og_image->model )->load( $plugin_og_image->object_id, null, 'id,status' );
                if (! $obj || $obj->status != $status_published ) {
                    if ( $publish_callbacks && $obj ) {
                        $obj = $app->db->model( $plugin_og_image->model )->load( $plugin_og_image->object_id );
                        $callback['obj'] = $obj;
                        $callback['original'] = $obj;
                        $callback['urlinfo'] = $plugin_og_image;
                        $app->run_callbacks( $callback, 'blob', $unlink );
                    }
                    $plugin_og_image->remove();
                    $counter++;
                }
            }
        }
        return $counter;
    }

    function insert_button ( $cb, $app, &$param, &$tmpl ) {
        $ctx = $app->ctx;
        $editor_tmpl = $app->ctx->get_template_path( 'text2ogimage_editor_button.tmpl' );
        $editor_buttons = isset( $ctx->vars['editor_buttons'] ) ? $ctx->vars['editor_buttons'] : '';
        $editor_buttons .= $app->build( file_get_contents( $editor_tmpl ) );
        $ctx->vars['editor_buttons'] = $editor_buttons;
        return true;
    }

    function class_simplified_japanese ( $app ) {
        $plugin = $app->component( 'SimplifiedJapanese' );
        if ( is_object( $plugin ) ) {
            return $plugin;
        }
        $class_path = dirname( $this->path() ) . DS . 'SimplifiedJapanese' . DS . 'SimplifiedJapanese.php';
        if ( file_exists( $class_path ) ) {
            require_once( $class_path );
            $cfg = dirname( $this->path() ) . DS . 'SimplifiedJapanese' . DS . 'config.json';
            $app->configure_from_json( $cfg, null, false );
        }
        return $app->component( 'SimplifiedJapanese' );
    }

}