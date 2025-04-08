<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
require_once( 'lib/color_difference.class.php' );

class ImageInfo extends PTPlugin {

    protected $end_point;
    protected $api_version;
    protected $language;
    protected $subscription_key;
    protected $region = null;
    protected $html_ids = [];

    public $upgrade_functions = [ ['version_limit' => 1.4, 'method' => 'add_new_column'] ];

    function __construct () {
        parent::__construct();
    }

    function __destruct () {
        $app = Prototype::get_instance();
        if (! empty( $this->html_ids ) && $app->component( 'AxeRunner' ) ) {
            $html_ids = array_keys( $this->html_ids );
            $runner = $app->component( 'AxeRunner' );
            $php_binary = $app->php_binary();
            $path = $runner->path() . DS . 'tools' . DS . 'axeRunner.php';
            if ( $php_binary && file_exists( $path ) ) {
                $cmd = $php_binary . " {$path} --silence --urlinfo_ids ";
                $urlinfo_ids = [];
                foreach ( $html_ids as $html_id ) {
                    $obj = $app->db->model( 'asset' )->load( $html_id, null, 'id' );
                    $url = $app->get_permalink( $obj );
                    $url_obj = null;
                    $url_obj = $app->db->model( 'urlinfo' )->load( ['url' => $url ], null, 'id' );
                    $url_obj = !empty( $url_obj ) ? $url_obj[0] : null;
                    if (! $url_obj ) {
                        continue;
                    }
                    $urlinfo_ids[] = (int) $url_obj->id;
                }
                $urlinfo_ids = array_unique( $urlinfo_ids );
                if (!empty( $urlinfo_ids ) ) {
                    $cmd .= implode( ',', $urlinfo_ids );
                    $cmd = 'cd ' . dirname( $app->pt_path ) . ';' . $cmd;
                    if ( $app->user() ) {
                        $cmd .= ' --user_id ' . $app->user()->id;
                    }
                    $process = proc_open( $cmd, [], $pipes );
                    if ( is_resource( $process ) ) {
                        proc_close($process);
                    }
                }
            }
        }
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'edit.tmpl' );
        $app->clear_compiled( 'insert_asset.tmpl' );
        $app->clear_cache( 'alt-tmpl' . DS . 'edit' . DS . 'asset' );
        $errors = [];
        $this->add_new_column( $app, $this, $this->version, $errors );
        return true;
    }

    function add_new_column ( $app, $plugin, $version, &$errors ) {
        $upgrader = new PTUpgrader();
        $table = $app->get_table( 'asset' );
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'a11y_verified'
        ] );
        if (!$column->id ) {
            $columnValues = [
                'type' => 'tinyint',
                'label' => 'A11Y Verified',
                'index' => 1,
                'default' => '0',
                'size' => 4,
                'order' => 45,
                'edit' => 'checkbox',
                'list' =>  'checkbox',
                'not_null' => 1
            ];
            $upgrader->make_column( $table, 'a11y_verified', $columnValues, false );
            $locale = $this->path() . DS . 'locale';
            if ( is_dir( $locale ) ) {
                PTUtil::locale_from_csv( $locale, strtolower( $this->id ) );
            }
            $upgrader->upgrade_scheme( 'asset' );
            $app->clear_cache( 'asset' );
        }
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'edit.tmpl' );
        $app->clear_compiled( 'insert_asset.tmpl' );
        return true;
    }

    function pre_view ( $app ) {
        if ( $app->param( '_model' ) === 'asset' && $app->param( '_type' ) === 'list' ) {
            if ( $app->param( 'background_proccess_running' ) ) {
                $app->ctx->vars['header_alert_message'] = $this->translate( 'Validation runs in the background process.' );
                $app->ctx->vars['header_alert_class'] = 'info';
            } else if ( $app->param( 'html_background_proccess' ) ) {
                $app->ctx->vars['header_alert_message'] = $this->translate( 'HTML validation runs in the background process.' );
                $app->ctx->vars['header_alert_class'] = 'info';
            }
        }
        return true;
    }

    function get_object ( $app, &$data, &$assetproperty, &$session, &$upload_file_session = false ) {
        $model = $app->param( '_model' );
        $model = $app->escape( $model );
        $id = (int) $app->param( 'id' );
        $key = $app->param( 'view' );
        $key = $app->escape( $key );
        $obj = $app->db->model( $model )->new();
        $screen_id = $app->param( '_screen_id' );
        if ( $id ) {
            $obj = $obj->load( $id );
            if (!$obj ) {
                return $app->error( 'Invalid request.' );
            }
            if (!$app->can_do( $model, 'edit', $obj ) ) {
                $app->error( 'Permission denied.' );
            }
        } else {
            if (!$app->can_do( $model, 'edit' ) ) {
                $app->error( 'Permission denied.' );
            }
        }
        $assetproperty = [];
        if ( $attachmentfile = $app->param( 'attachmentfile' ) ) {
            $session_name = $screen_id . '-' . $attachmentfile;
        } else {
            $session_name = $screen_id . '-' . $key;
        }
        $session = $app->db->model( 'session' )->get_by_key(
            ['name' => $session_name, 'user_id' => $app->user()->id ]
        );
        $data = null;
        if (!$session->id && $obj->id ) {
            $assetproperty = $app->get_assetproperty( $obj, $key );
            if ( $model == 'upload_file' ) {
                $data = $app->fmgr->get( $obj->file_path );
            } else {
                $data = $obj->$key;
            }
        } else {
            $json = $session->text;
            $assetproperty = json_decode( $json, true );
            $data = $session->data;
            if ( $model == 'upload_file' && $session->id && $session->value == $session->data ) {
                $data = $app->fmgr->get( $session->value );
                $upload_file_session = true;
            }
        }
        return $obj;
    }

    function get_imageinfo_dialog ( $app, $inspection = false, $changes = false ) {
        $ctx = $app->ctx;
        $tmpl = 'image_info.tmpl';
        $id = (int) $app->param( 'id' );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $key = $app->param( 'view' );
        $key = $app->escape( $key );
        $model = $app->param( '_model' );
        $app->get_scheme_from_db( $model );
        $model = $app->escape( $model );
        $screen_id = $app->param( '_screen_id' );
        $session   = null;
        $upload_file_session = false;
        $data = null;
        $assetproperty = [];
        $obj = $this->get_object( $app, $data, $assetproperty, $session, $upload_file_session );
        $save = $app->param( 'save' );
        $ajax = $app->param( 'ajax' );
        $set_pdfinfo = $app->param( 'set_pdfinfo' );
        $json_string = null;
        $magic_token = null;
        $json = [];
        if ( $save || $ajax || $set_pdfinfo ) {
            if (! $inspection ) {
                $json_string = file_get_contents( 'php://input' );
                $json = json_decode( $json_string, true );
                $magic_token = $json['magic_token'];
                $app->param( 'magic_token', $magic_token );
                $app->validate_magic( true );
            }
        }
        if ( $set_pdfinfo ) {
            $text = $json['text'] ?? null;
            if ( $text === null ) {
                return $app->json_error( $this->translate( 'An error occurred while save PDF informations.' ) );
            }
            $text = $this->strip_null_char( $text );
            $text = preg_replace( '/([^\x01-\x7E])\n([^\x01-\x7E])/', '$1$2', $text );
            $meta = null;
            $model = $json['model'] ?? 'asset';
            $column = $json['column'] ?? 'file';
            $hash = null;
            if ( $session->id ) {
                $hash = md5( $data );
            }
            if ( $session->id ) {
                $meta = $session;
            } else {
                $meta = $app->db->model( 'meta' )->get_by_key(
                  ['kind' => 'metadata', 'model' => $model, 'object_id' => $id, 'key' => $key ] );
            }
            if (! $meta->text ) {
                return $app->json_error( $this->translate( 'An error occurred while save PDF informations.' ) );
            }
            if ( $obj->id && ! $session->id ) {
                $cache_key = $obj->_model . '-' . $key . '-' . $obj->id . '-js.txt';
                $this->set_cache( $cache_key, $text );
                $cache_dir = $app->support_dir . DS . 'cache' . DS . $this-> id . '_cache' . DS;
                $cache_path = $cache_dir . $cache_key;
                $metadata = json_decode( $meta->text, true );
                $metadata['js_cache_mtime'] = filemtime( $cache_path );
                $meta->text( json_encode( $metadata ) );
                $meta->save();
            } else if ( $session->id ) {
                $this->set_cache( "session-{$hash}-js.txt", $text );
            }
            $result = ['status'=> 200, 'result' => $text ];
            header( 'Content-type: application/json' );
            echo json_encode( $result );
            exit();
        }
        if ( $save ) {
            $type = $json['type'];
            $meta = null;
            $model = $json['model'] ?? 'asset';
            $column = $json['column'] ?? 'file';
            if ( $session->id ) {
                $meta = $session;
            } else {
                $meta = $app->db->model( 'meta' )->get_by_key(
                  ['kind' => 'metadata', 'model' => $model, 'object_id' => $id, 'key' => $column ] );
            }
            if (! $meta->text ) {
                if ( $type == 'pdf' ) {
                    return $app->json_error( $this->translate( 'An error occurred while save PDF informations.' ) );
                } else {
                    return $app->json_error( $this->translate( 'An error occurred while save image informations.' ) );
                }
            }
            if ( $type == 'pdf' ) {
                $label = $json['title'];
                $subject = $json['subject'];
                $keywords = $json['keywords'];
                $author = $json['author'];
                $exiftool = $app->imageinfo_exiftool_path;
                if ( $exiftool ) {
                    $exiftool = escapeshellcmd( $exiftool );
                    $label = str_replace( ["\r\n", "\r", "\n"], '', $label );
                    $subject = str_replace( ["\r\n", "\r", "\n"], '', $subject );
                    $keywords = str_replace( ["\r\n", "\r", "\n"], '', $keywords );
                    $author = str_replace( ["\r\n", "\r", "\n"], '', $author );
                    $upload_dir = $app->upload_dir();
                    $tmpfile = $upload_dir . DS . 'tmp.pdf';
                    $app->fmgr->put( $tmpfile, $data );
                    $pdfinfo = $app->imageinfo_pdfinfo_path;
                    $update = false;
                    if ( $pdfinfo ) {
                        $pdfinfo = escapeshellcmd( $pdfinfo );
                        $cmd = "{$pdfinfo} {$tmpfile}";
                        $result = shell_exec( $cmd );
                        $result = trim( $result );
                        $results = explode( PHP_EOL, $result );
                        $pdfdata = [];
                        foreach ( $results as $result ) {
                            $meta_key = strtolower( preg_replace( "/(^.*?):\s*.*$/", '$1', $result ) );
                            if ( strpos( $meta_key, ' ' ) === 0 ) {
                                continue;
                            }
                            $value = preg_replace( "/^.*?:\s*(.*$)/", '$1', $result );
                            if ( isset( $pdfdata[ $meta_key ] ) ) {
                                continue;
                            }
                            $pdfdata[ $meta_key ] = $value;
                        }
                        if (! isset( $pdfdata['title'] ) ) {
                            $pdfdata['title'] = '';
                        }
                        if (! isset( $pdfdata['subject'] ) ) {
                            $pdfdata['subject'] = '';
                        }
                        if (! isset( $pdfdata['author'] ) ) {
                            $pdfdata['author'] = '';
                        }
                        if (! isset( $pdfdata['keywords'] ) ) {
                            $pdfdata['keywords'] = '';
                        }
                        if ( $pdfdata['title'] != $label || $pdfdata['subject'] != $subject
                          || $pdfdata['author'] != $author || $pdfdata['keywords'] != $keywords ) {
                            $update = true;
                        }
                    }
                    if ( $update ) {
                        $label = escapeshellarg( $label );
                        $subject = escapeshellarg( $subject );
                        $keywords = escapeshellarg( $keywords );
                        $author = escapeshellarg( $author );
                        $options = " -title={$label}";
                        $options .= " -subject={$subject}";
                        $options .= " -keywords={$keywords}";
                        $options .= " -author={$author}";
                        $cmd = "{$exiftool} {$options} {$tmpfile}";
                        exec( $cmd, $output, $return_var );
                        if ( $return_var === 0 ) {
                            $metadata['file_size'] = filesize( $tmpfile );
                            $data = $app->fmgr->get( $tmpfile );
                            if ( $session->id ) {
                                $session->data( $data );
                                $session->save();
                            } else if ( $model == 'upload_file' ) {
                                $app->fmgr->rename( $tmpfile, $obj->file_path );
                                if ( $app->fileuploader_backup ) {
                                    $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
                                    $cache = $cache_dir . md5( $obj->file_path );
                                    $app->fmgr->copy( $obj->file_path, $cache );
                                }
                            } else {
                                $obj->$key( $data );
                                $obj->save();
                                $app->publish_obj( $obj );
                            }
                        }
                    }
                }
                $contrast_ratio = $json['contrast_ratio'] ?? false;
                $fore_color = $json['fore_color'] ?? false;
                $back_color = $json['back_color'] ?? false;
                $image_kind = $json['image_kind'] ?? false;
                $pdftotext = $json['pdftotext'] ?? false;
                $title = $json['title'] ?? null;
                $verified = $json['verified'];
                $metadata = json_decode( $meta->text, true );
                $metadata['label'] = $label;
                $metadata['contrast_ratio'] = $contrast_ratio;
                $metadata['fore_color'] = $fore_color;
                $metadata['back_color'] = $back_color;
                $metadata['image_verified'] = $verified;
                $list_dialog = $json['list_dialog'];
                if ( $list_dialog && $obj->_model == 'asset' ) {
                    if ( $verified != $obj->a11y_verified ) {
                        $obj->a11y_verified( $verified );
                        $obj->save();
                    }
                }
                $metadata['pdftotext'] = $pdftotext;
                $metadata['title'] = $title;
                $meta->text( json_encode( $metadata ) );
                $meta->save();
                $result = ['text'=> $meta->text ];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            } else {
                $label = $json['alternative'];
                $contrast_ratio = $json['contrast_ratio'] ?? false;
                $fore_color = $json['fore_color'] ?? false;
                $back_color = $json['back_color'] ?? false;
                $image_kind = $json['image_kind'] ?? false;
                $verified = $json['verified'];
                $model = $json['model'] ?? 'asset';
                $column = $json['column'] ?? 'file';
                $metadata = json_decode( $meta->text, true );
                $metadata['label'] = $label;
                $metadata['contrast_ratio'] = $contrast_ratio;
                $metadata['fore_color'] = $fore_color;
                $metadata['back_color'] = $back_color;
                $metadata['image_kind'] = $image_kind;
                $metadata['image_verified'] = $verified;
                $list_dialog = $json['list_dialog'];
                if ( $list_dialog && $obj->_model == 'asset' ) {
                    if ( $verified != $obj->a11y_verified ) {
                        $obj->a11y_verified( $verified );
                        $obj->save();
                    }
                }
                $meta->text( json_encode( $metadata ) );
                $meta->save();
                $result = ['text'=> $meta->text ];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
        }
        if ( $ajax ) {
            $type = $json['type'];
            $model = $json['model'] ?? 'asset';
            $column = $json['column'] ?? 'file';
            if ( $session->id && !$upload_file_session ) {
                $obj = $session;
                $column = 'data';
            } else if ( $upload_file_session ) {
                $obj->binary_file( $data );
                $column = 'binary_file';
            } else if ( $model == 'upload_file' ) {
                $obj->binary_file( $app->fmgr->get( $obj->file_path ) );
                $column = 'binary_file';
            }
            $agreement = $json['agreement'] ?? null;
            if ( $agreement && !$app->cookie_val( 'pt-ii-agreement' ) ) {
                $path = $app->cookie_path ? $app->cookie_path : $app->path;
                $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
                $app->bake_cookie( 'pt-ii-agreement', 1, $expires, $path, true, $app->cookie_domain );
            }
            return $this->get_imageinfo_insert( $app, $obj, $column );
            exit();
        }
        if ( empty( $assetproperty ) ) {
            return $app->error( 'Invalid request.' );
        }
        $extension = $assetproperty['extension'];
        $param = "?__mode=view&amp;_type=edit&amp;_model={$model}&amp;id={$id}"
               ."&amp;_screen_id={$screen_id}&amp;view=";
        if ( $attachmentfile = $app->param( 'attachmentfile' ) ) {
            $param .= 'file&amp;attachmentfile=' . $app->param( 'attachmentfile' );
        } else {
            $param .= $key;
        }
        if ( $app->workspace() ) {
            $workspace_id = $app->workspace()->id;
            $param .= "&amp;workspace_id={$workspace_id}";
        }
        $ctx->vars['verified'] = $assetproperty['image_verified'] ?? false;
        $pdfinfo = $app->imageinfo_pdfinfo_path;
        $tools_ext = '';
        $tools_dir = dirname( $pdfinfo ) . DS;
        if ( $pdfinfo && $assetproperty['mime_type'] == 'application/pdf' ) {
            if ( $session->id ) {
                $meta = $session;
            } else {
                $meta = $app->db->model( 'meta' )->get_by_key(
                  ['kind' => 'metadata', 'model' => $model, 'object_id' => $id, 'key' => $key ] );
            }
            if (! $meta->text ) {
                if ( $type == 'pdf' ) {
                    return $app->json_error( $this->translate( 'An error occurred while save PDF informations.' ) );
                } else {
                    return $app->json_error( $this->translate( 'An error occurred while save image informations.' ) );
                }
            }
            $texttospeech = $app->param( 'texttospeech' );
            $pdftotext = $tools_dir . 'pdftotext' . $tools_ext;
            $pdfdetach = $tools_dir . 'pdfdetach' . $tools_ext;
            $pdfimages = $tools_dir . 'pdfimages' . $tools_ext;
            $pdftocairo = $tools_dir . 'pdftocairo' . $tools_ext;
            $pdftohtml  = $tools_dir . 'pdftohtml' . $tools_ext;
            $upload_dir = $app->upload_dir();
            $out = $upload_dir . DS . "tmp.{$extension}";
            $app->fmgr->put( $out, $data );
            $hash = null;
            if ( $session->id ) {
                $hash = md5( $data );
            }
            $out = escapeshellarg( $out );
            $extract_text = null;
            $cache_key = null;
            if ( $obj->id && ! $session->id ) {
                $cache_key = $obj->_model . '-' . $key . '-' . $obj->id . '-js.txt';
                $cache_dir = $app->support_dir . DS . 'cache' . DS . $this-> id . '_cache' . DS;
                $cache_path = $cache_dir . $cache_key;
                if ( $changes && $app->fmgr->exists( $cache_path ) ) {
                    $app->fmgr->unlink( $cache_path );
                }
                $metadata = json_decode( $meta->text, true );
                if ( $app->fmgr->exists( $cache_path ) ) {
                    $cache_mtime = $metadata['js_cache_mtime'] ?? null;
                    if ( $cache_mtime && $cache_mtime == filemtime( $cache_path ) ) {
                        $extract_text = $app->fmgr->get( $cache_path );
                    }
                }
                if ( $extract_text === null ) {
                    $cache_key = $obj->_model . '-' . $key . '-' . $obj->id . '.txt';
                    $cache_path = $cache_dir . $cache_key;
                    if ( $changes && $app->fmgr->exists( $cache_path ) ) {
                        $app->fmgr->unlink( $cache_path );
                    }
                    if ( $app->fmgr->exists( $cache_path ) ) {
                        $cache_mtime = $metadata['txt_cache_mtime'] ?? null;
                        if ( $cache_mtime && $cache_mtime == filemtime( $cache_path ) ) {
                            $extract_text = $app->fmgr->get( $cache_path );
                        }
                    }
                } else {
                    $ctx->vars['js_extracted_text'] = true;
                }
            } else if ( $session->id ) {
                $extract_text = $this->get_cache( "session-{$hash}-js.txt" );
                if ( $extract_text === null ) {
                    $extract_text = $this->get_cache( "session-{$hash}.txt" );
                } else {
                    $ctx->vars['js_extracted_text'] = true;
                }
            }
            if ( $app->fmgr->exists( $pdftotext ) ) {
                $output = $upload_dir . DS . 'output.txt';
                if ( $extract_text === null ) {
                    $cmd = "{$pdftotext} {$out} {$output}";
                    $result = shell_exec( $cmd );
                    $extract_text = trim( $app->fmgr->get( $output ) );
                    if ( $cache_key ) {
                        $this->set_cache( $cache_key, $extract_text );
                        $metadata['txt_cache_mtime'] = filemtime( $cache_path );
                        $meta->text( json_encode( $metadata ) );
                        $meta->save();
                    } else {
                        $this->set_cache( "session-{$hash}.txt", $extract_text );
                    }
                }
                if ( $extract_text !== null ) {
                    $output = $extract_text;
                    $output = $this->strip_null_char( $output );
                    $output = preg_replace( '/([^\x01-\x7E])\n([^\x01-\x7E])/', '$1$2', $output );
                    // $output = preg_replace( '/([^\x01-\x7E])\s\n([^\x01-\x7E])/', '$1$2', $output );
                    $ctx->vars['can_pdftotext'] = true;
                    $ctx->vars['pdftotext'] = $output ? true : false;
                    $ctx->vars['extracted'] = $output;
                }
            }
            if ( $extract_text !== null && $texttospeech ) {
                $output = $extract_text;
                $output = $this->strip_null_char( $output );
                $output = preg_replace( '/([^\x01-\x7E])\n([^\x01-\x7E])/', '$1$2', $output );
                $output = preg_replace( '/([^\x01-\x7E])\s\n([^\x01-\x7E])/', '$1$2', $output );
                $SimplifiedJapanese = $app->component( 'SimplifiedJapanese' );
                $ffmpeg = $app->simplifiedjapanese_ffmpeg_path;
                $maxlength = 1000;
                if ( mb_strlen( $output ) > $maxlength ) {
                    $paragraphs = [];
                    $outputs = explode( PHP_EOL, $output );
                    $tmp_text = '';
                    foreach ( $outputs as $idx => $output ) {
                        if (! $output ) continue;
                        $tmp_text .= $output;
                        if ( isset( $outputs[ $idx + 1 ] ) ) {
                            $length = mb_strlen( $tmp_text . $outputs[ $idx + 1 ] );
                            if ( $length > $maxlength ) {
                                $paragraphs[] = $tmp_text;
                                $tmp_text = '';
                            }
                        }
                    }
                    if ( $tmp_text ) {
                        $paragraphs[] = $tmp_text;
                    }
                    $list = $upload_dir . DS . 'list.txt';
                    $file_list = '';
                    foreach ( $paragraphs as $idx => $text ) {
                        $path = $upload_dir . DS . $idx . '.mp3';
                        $data = $SimplifiedJapanese->_simplifiedjapanese_export_mp3( $app, $text, $workspace_id, true, false );
                        $app->fmgr->put( $path, $data );
                        $file_list .= "file '{$path}'\n";
                    }
                    $file_list = trim( $file_list );
                    $app->fmgr->put( $list, $file_list );
                    $mp3_name = "simplified-japanese.mp3";
                    $cmd = $ffmpeg . '  -f concat -safe 0 -i ' . $list . ' -c copy ' . $upload_dir . DS . $mp3_name;
                    $result = shell_exec( $cmd );
                    return $app->print( $app->fmgr->get( $upload_dir . DS . $mp3_name ), 'audio/mpeg' );
                }
                $data = $SimplifiedJapanese->_simplifiedjapanese_export_mp3( $app, $output, $workspace_id, true, false );
                if ( $app->param( 'export' ) ) {
                    $ts = date( 'Y-m-d_H-i-s' );
                    header( 'Content-Type: application/octet-stream' );
                    header( "Content-Disposition: attachment; filename=image-info-{$ts}.mp3" );
                    echo $data;
                    exit();
                }
                return $app->print( $data, 'audio/mpeg' );
            }
            $cmd = "{$pdfinfo} {$out}";
            $upload_dir .= DS;
            $error = "{$upload_dir}error-output.txt";
            $descriptorspec = [
               0 => ['pipe', 'r'],
               1 => ['pipe', 'w'],
               2 => ['file', $error, 'a']
            ];
            $pipes = [];
            $proc = proc_open( $cmd, $descriptorspec, $pipes );
            $result = proc_close( $proc );
            if ( $result !== 0 ) {
                if ( $app->fmgr->exists( $error ) ) {
                    $error = $app->fmgr->get( $error );
                } else {
                    $error = $this->translate( 'An error occurred while parsing the PDF.' );
                }
                return $app->error( $error );
            }
            $result = shell_exec( $cmd );
            if ( $result === null ) {
                $error = $this->translate( 'An error occurred while parsing the PDF.' );
                return $app->error( $error );
            }
            chdir( $upload_dir );
            if ( $app->fmgr->exists( $pdfdetach ) ) {
                $cmd = "{$pdfdetach} -list {$out}";
                exec( $cmd, $output, $return_var );
                foreach ( $output as $outfile ) {
                    if ( preg_match( '/\.accreport\.html$/', $outfile ) && preg_match( '/^[0-9]+:/', $outfile ) ) {
                        $filename = preg_replace( '/[0-9]+:\s/', '', $outfile );
                        list( $num, $outfile ) = explode( ':', $outfile );
                        $cmd = "{$pdfdetach} -save {$num} {$out}";
                        exec( $cmd, $output, $return_var );
                        if ( $app->fmgr->exists( $filename ) ) {
                            $report_html = $app->fmgr->get( $filename );
                            if ( $app->param( 'a11y_report' ) ) {
                                return $app->print( $report_html );
                            }
                            $ctx->vars['report_html'] = $report_html;
                            $ctx->vars['a11y_report'] = true;
                        }
                    }
                }
            }
            $result = trim( $result );
            $results = explode( PHP_EOL, $result );
            $pdfinfo = [];
            foreach ( $results as $result ) {
                $_key = preg_replace( "/(^.*?):\s*.*$/", '$1', $result );
                if ( strpos( $_key, ' ' ) === 0 ) {
                    continue;
                }
                $value = preg_replace( "/^.*?:\s*(.*$)/", '$1', $result );
                if ( isset( $pdfinfo[ $_key ] ) ) {
                    continue;
                }
                $pdfinfo[ $_key ] = $value;
            }
            if ( $app->fmgr->exists( $pdfimages ) && !$inspection ) {
                $cmd = "{$pdfimages} -list {$out}";
                $result = shell_exec( $cmd );
                if ( $result ) {
                    $result = explode( PHP_EOL, $result );
                    if ( is_array( $result ) && count( $result ) > 3 ) {
                        $ctx->vars['has_image'] = true;
                    }
                }
            }
            if ( $app->fmgr->exists( $pdftohtml ) && !$inspection ) {
                $cache_key = null;
                $html = null;
                if ( $obj->id && ! $session->id ) {
                    $cache_key = $obj->_model . '-' . $key . '-' . $obj->id . '.html';
                    $cache_dir = $app->support_dir . DS . 'cache' . DS . $this-> id . '_cache' . DS;
                    $cache_path = $cache_dir . $cache_key;
                    $metadata = json_decode( $meta->text, true );
                    if ( $changes && $app->fmgr->exists( $cache_path ) ) {
                        $app->fmgr->unlink( $cache_path );
                    }
                    if ( $app->fmgr->exists( $cache_path ) ) {
                        $cache_mtime = $metadata['html_cache_mtime'] ?? null;
                        if ( $cache_mtime && $cache_mtime == filemtime( $cache_path ) ) {
                            $html = $app->fmgr->get( $cache_path );
                        }
                    }
                }
                if ( $html === null ) {
                    $outline = "{$upload_dir}outline.html";
                    $cmd = "{$pdftohtml} -s -i -noframes {$out} {$outline}";
                    $result = shell_exec( $cmd );
                    if ( $app->fmgr->exists( $outline ) ) {
                        $html = $app->fmgr->get( $outline );
                        if ( $cache_key ) {
                            $this->set_cache( $cache_key, $html );
                            $metadata['html_cache_mtime'] = filemtime( $cache_path );
                            $meta->text( json_encode( $metadata ) );
                            $meta->save();
                        }
                    }
                }
                if ( $html ) {
                    libxml_use_internal_errors( true );
                    $dom = new DomDocument();
                    if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                        LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                        $query = "/html/body/a[@name='outline']";
                        $xpath = new DOMXpath( $dom );
                        $nodes = $xpath->query( $query );
                        if ( $nodes->length ) {
                            $anchor = $nodes->item( 0 );
                            $element = $anchor->nextSibling;
                            if ( is_object( $element ) && property_exists( $element, 'textContent' )
                                && $element->textContent == 'Document Outline' ) {
                                $outline = $element->nextSibling->nextSibling;
                                if ( is_object( $outline ) && property_exists( $outline, 'tagName' )
                                && $outline->tagName == 'ul' ) {
                                    $outline = $this->outerHTML( $outline );
                                    $outline = preg_replace( '/<\/{0,1}a[^>]*?>/si', '', $outline );
                                    $ctx->vars['document_outline'] = $outline;
                                }
                            }
                        }
                    }
                }
            }
            $ctx->vars['html_title'] = $this->translate( 'PDF Informations' );
            foreach ( $pdfinfo as $_key => $value ) {
                $_key = str_replace( ' ', '_', strtolower( $_key ) );
                $ctx->vars["pdfinfo_{$_key}"] = $value;
            }
            $ctx->vars['pdfinfo'] = $pdfinfo;
            $ctx->vars['dialog_type'] = 'pdf';
            $ctx->vars['this_mode'] = $app->mode;
            $ctx->vars['edit_url'] = $app->admin_url . $param;
            if ( $pdftocairo && $meta->text ) {
                $bin = null;
                $cache_key = null;
                if ( $obj->id && ! $session->id ) {
                    $cache_key = $obj->_model . '-' . $key . '-' . $obj->id . '.png';
                    $cache_dir = $app->support_dir . DS . 'cache' . DS . $this-> id . '_cache' . DS;
                    $cache_path = $cache_dir . $cache_key;
                    if ( $changes && $app->fmgr->exists( $cache_path ) ) {
                        $app->fmgr->unlink( $cache_path );
                    }
                    $metadata = json_decode( $meta->text, true );
                    if ( $app->fmgr->exists( $cache_path ) ) {
                        $cache_mtime = $metadata['cache_mtime'] ?? null;
                        if ( $cache_mtime && $cache_mtime == filemtime( $cache_path ) ) {
                            $png = $cache_path;
                            $bin = $app->fmgr->get( $cache_path );
                        }
                    }
                }
                if (! $bin ) {
                    $cmd = "{$pdftocairo} -singlefile -r 600 -png {$out} {$upload_dir}thumbnail";
                    exec( $cmd, $output, $return_var );
                    $png = "{$upload_dir}thumbnail.png";
                    if ( $app->fmgr->exists( $png ) ) {
                        $bin = $app->fmgr->get( $png );
                        if ( $cache_key ) {
                            $this->set_cache( $cache_key, $bin );
                            $metadata['cache_mtime'] = filemtime( $cache_path );
                            $meta->text( json_encode( $metadata ) );
                            $meta->save();
                        }
                    }
                }
                if ( $bin ) {
                    if ( $app->imageinfo_check_contrast ) {
                        $results = ['contrast_ratio' => null];
                        if ( $changes ) {
                            unset( $assetproperty['image_kind'], $assetproperty['contrast_ratio'], $assetproperty['back_color'], $assetproperty['fore_color'] );
                        }
                        if (! isset( $assetproperty['image_kind'] ) ) {
                            $results = $this->image_calc( $png, 'application/png' );
                        }
                        $contrast_ratio = isset( $assetproperty['contrast_ratio'] ) ? $assetproperty['contrast_ratio'] : $results['contrast_ratio'];
                        if ( $contrast_ratio ) {
                            list( $forcolor, $backcolor ) = explode( ' : ', $contrast_ratio );
                            if ( $forcolor >= 3 ) {
                                $ctx->vars['aa_large'] = true;
                            }
                            if ( $forcolor >= 4.5 ) {
                                $ctx->vars['aa_small'] = true;
                                $ctx->vars['aaa_large'] = true;
                            }
                            if ( $forcolor >= 7 ) {
                                $ctx->vars['aaa_small'] = true;
                            }
                            $ctx->vars['back_color'] = isset( $assetproperty['back_color'] ) ? $assetproperty['back_color'] : $results['back_color'];
                            $ctx->vars['fore_color'] = isset( $assetproperty['fore_color'] ) ? $assetproperty['fore_color'] : $results['fore_color'];
                            $ctx->vars['contrast_ratio'] = $contrast_ratio;
                        }
                    }
                    $base64 = base64_encode( $bin );
                    $base64 = "data:image/png;base64,{$base64}";
                    $ctx->vars['base64'] = $base64;
                    if ( $inspection ) {
                        return $ctx;
                    }
                }
            }
            $ctx->vars['query_string'] = $app->query_string();
            $ctx->vars['imageinfo_assets_base'] = $app->imageinfo_assets_base;
            return $app->build_page( $tmpl );
        }
        $ctx->vars['dialog_type'] = 'image';
        $out = $app->upload_dir() . DS . "tmp.{$extension}";
        $png = $out;
        $app->fmgr->put( $out, $data );
        $file_type = mime_content_type( $out );
        $is_animated = false;
        if ( $app->imageinfo_check_contrast ) {
            $results = ['contrast_ratio' => null];
            if ( $changes ) {
                unset( $assetproperty['image_kind'], $assetproperty['contrast_ratio'], $assetproperty['back_color'], $assetproperty['fore_color'] );
            }
            if (! isset( $assetproperty['image_kind'] ) ) {
                $img = null;
                switch ( $file_type ) {
                    case 'image/jpeg':
                        $img = imagecreatefromjpeg( $out );
                        break;
                    case 'image/webp':
                        $is_animated = PTUtil::is_webp_animated( $out );
                        if (! $is_animated ) {
                            $img = imagecreatefromwebp( $out );
                        }
                        break;
                    case 'image/gif':
                        $is_animated = $this->is_animated( $out );
                        $img = imagecreatefromgif( $out );
                        break;
                    case 'image/svg+xml':
                        if ( class_exists( 'Imagick' ) ) {
                            $imagick = new Imagick();
                            $imagick->readImage( $out );
                            $png = "{$png}.png";
                            $imagick->writeImage( $png );
                            $imagick->clear();
                            $imagick->destroy();
                        }
                    default:
                        break;
                }
                if ( $img !== null ) {
                    $png = "{$png}.png";
                    imagepng( $img, $png );
                }
                if ( $img ) {
                    $results = $this->image_calc( $png, $file_type );
                }
            }
            $contrast_ratio = isset( $assetproperty['contrast_ratio'] ) ? $assetproperty['contrast_ratio'] : $results['contrast_ratio'];
            if ( $contrast_ratio && strpos( $contrast_ratio, ':' ) !== false ) {
                list( $forcolor, $backcolor ) = explode( ' : ', $contrast_ratio );
                if ( $forcolor >= 3 ) {
                    $ctx->vars['aa_large'] = true;
                }
                if ( $forcolor >= 4.5 ) {
                    $ctx->vars['aa_small'] = true;
                    $ctx->vars['aaa_large'] = true;
                }
                if ( $forcolor >= 7 ) {
                    $ctx->vars['aaa_small'] = true;
                }
                $ctx->vars['back_color'] = isset( $assetproperty['back_color'] ) ? $assetproperty['back_color'] : $results['back_color'];
                $ctx->vars['fore_color'] = isset( $assetproperty['fore_color'] ) ? $assetproperty['fore_color'] : $results['fore_color'];
            }
            $ctx->vars['contrast_ratio'] = $contrast_ratio;
            $ctx->vars['is_animated'] = isset( $assetproperty['is_animated'] ) ? $assetproperty['is_animated'] : $is_animated;
            if ( isset( $assetproperty['image_kind'] ) ) {
                $image_kind = $assetproperty['image_kind'];
                if ( $image_kind == 'picture') {
                    $ctx->vars['is_picture'] = true;
                } else if ( $image_kind == 'logo') {
                    $ctx->vars['is_logo'] = true;
                }
            } else {
                $ctx->vars['is_picture'] = isset( $results['image_kind'] ) && $results['image_kind'] === 'picture';
            }
        }
        $ctx->vars['html_title'] = $this->translate( 'Image Informations' );
        $ctx->vars['file_size'] = $assetproperty['file_size'];
        $ctx->vars['image_width'] = $assetproperty['image_width'];
        $ctx->vars['image_height'] = $assetproperty['image_height'];
        $ctx->vars['mime_type'] = $assetproperty['mime_type'];
        $ctx->vars['this_mode'] = $app->mode;
        $ctx->vars['edit_url'] = $app->admin_url . $param;
        if ( $model == 'upload_file' ) {
            if ( $upload_file_session ) {
                $base64 = base64_encode( $data );
                $mime_type = $assetproperty['mime_type'];
                $base64 = "data:{$mime_type};base64,{$base64}";
                $ctx->vars['edit_url'] = $base64;
            } else {
                $ctx->vars['edit_url'] = $obj->url;
            }
        }
        $ctx->vars['query_string'] = $app->query_string();
        return $app->build_page( $tmpl );
    }

    function strip_null_char ( $string ) {
        $ctrl_code = [
            "00",
            "01",
            "02",
            "03",
            "04",
            "05",
            "06",
            "07",
            "08",
            "0B",
            "0C",
            "0E",
            "0F",
            "10",
            "11",
            "12",
            "13",
            "14",
            "15",
            "16",
            "17",
            "18",
            "19",
            "1A",
            "1B",
            "1C",
            "1D",
            "1E",
            "1F",
            ];
        $code_array = [];
        foreach ( $ctrl_code as $code ){
            $code_array[] = hex2bin( $code );
        }
        return str_replace( $code_array, '', $string );
    }

    function get_imageinfo_insert ( $app, $asset = null, $column = null ) {
        $workspace_id = (int) $app->param( 'workspace_id' );
        $asset_id = (int) $app->param( 'id' );
        $end_point = $this->get_config_value( 'imageinfo_end_point' );
        $this->end_point = $end_point;
        $api_version = $this->get_config_value( 'imageinfo_api_version' );
        $this->api_version = $api_version;
        $language = $this->get_config_value( 'imageinfo_language', $workspace_id );
        $end_point = "https://{$end_point}.cognitiveservices.azure.com/vision/v{$api_version}/analyze?visualFeatures=Description&language={$language}";
        $subscription_key = $this->get_config_value( 'imageinfo_subscription_key' );
        $this->subscription_key = $subscription_key;
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $type = $json['type'];
        $model = $json['model'] ?? 'asset';
        if (! $column ) {
            $column = $json['column'] ?? 'file';
        }
        $region = $this->region !== null ? $this->region : $this->get_config_value( 'imageinfo_region' );
        $this->region = $region;
        $asset = $asset !== null ? $asset : $app->db->model( $model )->load( $asset_id );
        if ( $type == 2 ) {
            $text = $this->read_text_from_picture( $app, $asset, $column );
            $result = ['text'=> $text ];
            header( 'Content-type: application/json' );
            echo json_encode( $result );
            exit();
        }
        $headers = ['Content-Type: application/octet-stream',
                    "Ocp-Apim-Subscription-Key: {$subscription_key}"];
        if ( $region ) {
            $headers[] = "Ocp-Apim-Subscription-Region:{$region}";
        }
        $curl = curl_init();
        curl_setopt_array (
            $curl,
            [
                CURLOPT_URL => $end_point,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $asset->$column,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_BINARYTRANSFER => true,
            ]
        );
        $response = curl_exec( $curl );
        $httpCode = curl_getinfo( $curl, CURLINFO_RESPONSE_CODE );
        curl_close( $curl );
        $text = '';
        if ( $httpCode == 200 ) {
            $json = json_decode( $response, true );
            $captions = $json['description']['captions'];
            foreach ( $captions as $caption ) {
                $text .= $caption['text'];
            }
        }
        if ( $language != 'en' && strlen( $text ) === mb_strlen( $text ) ) {
            $mt = $app->component( 'MachineTranslator' );
            if (! $mt ) {
                $plugin = PT_DIR . 'plugins' . DS . 'MachineTranslator' . DS . 'MachineTranslator.php';
                if ( $app->fmgr->exists( $plugin ) ) {
                    require_once( $plugin );
                    $mt = new MachineTranslator();
                }
            }
            if ( is_object( $mt ) ) {
                $api_version = $this->get_config_value( 'imageinfo_mt_api_version' );
                $end_point = $this->get_config_value( 'imageinfo_mt_end_point' );
                $subscription_key = $this->get_config_value( 'imageinfo_mt_subscription_key' );
                $end_point .= "?api-version={$api_version}&to={$language}&from=en&textType=plain";
                $mt->end_point = $end_point;
                $mt->subscription_key = $subscription_key;
                $mt->region = $region;
                $mt->translate_from = 'en';
                $mt->translate_to = $language;
                $text = $mt->get_translate_text( $text, true, false );
            }
        }
        $result = ['text'=> $text ];
        header( 'Content-type: application/json' );
        echo json_encode( $result );
        exit();
    }

    function read_text_from_picture ( $app, $asset, $column ) {
        $end_point = $this->end_point;
        $api_version = $this->api_version;
        $language = $this->language;
        $subscription_key = $this->subscription_key;
        $url = "https://{$end_point}.cognitiveservices.azure.com/vision/v{$api_version}/read/analyze?language={$language}&model-version=latest";
        $region = $this->region;
        $headers = ['Content-Type: application/octet-stream',
                    "Ocp-Apim-Subscription-Key: {$subscription_key}"];
        if ( $region ) {
            $headers[] = "Ocp-Apim-Subscription-Region:{$region}";
        }
        $data = $asset->$column;
        $metadata = $app->db->model( 'meta' )->get_by_key( [
            'object_id' => $asset->id, 'model' => $asset->_model,
            'kind' => 'metadata', 'key' => $column ] );
        if ( $metadata->id ) {
            $metadata = json_decode( $metadata->text );
            $extension = $metadata->extension;
            if ( $extension === 'webp' ) {
                $upload_dir = $app->upload_dir();
                $file = $upload_dir . DS . "temp.{$extension}";
                $app->fmgr->put( $file, $data );
                list( $w, $h ) = getimagesize( $file );
                $size = $w > $h ? $w : $h;
                $thumbnail = PTUtil::make_thumbnail( $file, $size, 'png', 100 );
                $app->log( $thumbnail );
                $data = $app->fmgr->get( $thumbnail );
            }
        }
        $curl = curl_init();
        curl_setopt_array (
            $curl,
            [
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POST => true,
                CURLOPT_HEADER => true,
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_BINARYTRANSFER => true,
            ]
        );
        curl_setopt( $curl, CURLOPT_HEADER, true );
        $response = curl_exec( $curl );
        $curlInfo = curl_getinfo( $curl );
        $headerSize = 0;
        if ( isset( $curlInfo['header_size']) && $curlInfo['header_size'] != "" ) {
            $headerSize = $curlInfo['header_size'];
        }
        $headers = substr($response, 0, $headerSize);
        $response = substr($response, $headerSize);
        $httpCode = curl_getinfo( $curl, CURLINFO_RESPONSE_CODE );
        curl_close( $curl );
        $text = '';
        if ( $httpCode == 202 && $response == '' ) {
            sleep( $app->imageinfo_ocr_sleep );
            $retry = $app->imageinfo_ocr_retry;
            for ( $i = 0; $i < $retry; $i++ ) {
                $headers = trim( $headers );
                $headers = explode( "\r\n", $headers );
                foreach ( $headers as $header ) {
                    list( $key, $value ) = explode( ' ', $header );
                    if ( strtolower( $key ) == 'operation-location:' ) {
                        break;
                    }
                }
                $url = $value;
                $headers = ["Ocp-Apim-Subscription-Key: {$subscription_key}"];
                if ( $region ) {
                    $headers[] = "Ocp-Apim-Subscription-Region:{$region}";
                }
                $curl = curl_init();
                curl_setopt_array(
                    $curl,
                    [
                        CURLOPT_URL => $url,
                        CURLOPT_HTTPHEADER => $headers,
                        CURLOPT_RETURNTRANSFER => true
                    ]
                );
                $response = curl_exec( $curl );
                curl_close( $curl );
                $json = json_decode( $response, true );
                if ( $json['status'] == 'running' ) {
                    sleep( $app->imageinfo_ocr_sleep );
                    continue;
                } else if ( $json['status'] == 'succeeded' ) {
                    $results = $json['analyzeResult']['readResults'];
                    foreach ( $results as $result ) {
                        $lines = $result['lines'];
                        foreach ( $lines as $line ) {
                            $text .= $line['text'];
                        }
                    }
                    break;
                }
            }
        } else {
            $json = json_decode( $response, true );
            $results = $json['analyzeResult']['readResults'];
            foreach ( $results as $result ) {
                $lines = $result['lines'];
                foreach ( $lines as $line ) {
                    $text .= $line['text'];
                }
            }
        }
        return $text;
    }

    function action_asset_make_verified ( $app, $objects, $action, $unverified = false ) {
        $class = new PTListActions();
        $model = $app->param( '_model' );
        $counter = 0;
        $callback = ['name' => 'post_save', 'is_new' => false];
        $value = $unverified ? 0 : 1;
        foreach ( $objects as $obj ) {
            if ( $obj->a11y_verified == $value ) {
                continue;
            }
            $obj->a11y_verified( $value );
            if ( $obj->save() ) {
                $counter++;
            }
            $meta = $app->db->model( 'meta' )->get_by_key(
              ['kind' => 'metadata', 'model' => 'asset', 'object_id' => $obj->id, 'key' => 'file'] );
            if (! $meta->id ) {
                continue;
            }
            $metadata = json_decode( $meta->text, true );
            $metadata['image_verified'] = $unverified ? false : true;
            $meta->text( json_encode( $metadata ) );
            $meta->save();
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $class->add_return_params( $app ) ) {
            $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}apply_actions=[0-9]+&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}background_proccess_running=1/', '', $add_params );
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function action_asset_revert_to_unverified ( $app, $objects, $action ) {
        return $this->action_asset_make_verified( $app, $objects, $action, true );
    }

    function action_asset_image_inspection ( $app, $objects, $action ) {
        $class = new PTListActions();
        $model = $app->param( '_model' );
        $count = count( $objects );
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        if ( $app->imageinfo_inspection_background < $count ) {
            $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                         . "&apply_actions={$count}&background_proccess_running=1" . $app->workspace_param;
            if ( $add_params = $class->add_return_params( $app ) ) {
                $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}apply_actions=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}background_proccess_running=1/', '', $add_params );
                $return_args .= "&{$add_params}";
            }
            $app->redirect( $app->admin_url . '?' . $return_args, true );
        }
        $counter = 0;
        $callback = ['name' => 'post_save', 'is_new' => false];
        $html = false;
        $axerunner = $app->component( 'AxeRunner' );
        foreach ( $objects as $obj ) {
            if ( $axerunner && $obj->file_ext === 'html' && $obj->status == 4 ) {
                $html = true;
            }
            $counter+= $this->post_save_asset( $callback, $app, $obj, $obj );
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        if ( $app->imageinfo_action_background ) {
            return;
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        $add_params = '';
        if ( $add_params = $class->add_return_params( $app ) ) {
            $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}apply_actions=[0-9]+&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}background_proccess_running=1/', '', $add_params );
        }
        if ( $html ) {
            $add_params .= $add_params ? '&html_background_proccess=1' : 'html_background_proccess=1';
        }
        $return_args .= "&{$add_params}";
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function post_save_asset ( &$cb, $app, &$obj, $original ) {
        if ( $obj->class !== 'image' && $obj->class !== 'pdf' && $obj->file_ext !== 'svg' && $obj->file_ext !== 'html' ) {
            return $app->mode === 'list_action' ? 0 : 1;
        } else if (! $app->imageinfo_check_contrast ) {
            return $app->mode === 'list_action' ? 0 : 1;
        }
        if ( $obj->file_ext === 'svg' && !extension_loaded( 'imagick' ) ) {
            return $app->mode === 'list_action' ? 0 : 1;
        }
        if ( $obj->file_ext === 'html' ) {
            if ( !$app->component( 'AxeRunner' ) || $obj->status != 4 ) {
                return $app->mode === 'list_action' ? 0 : 1;
            }
        }
        $meta = $app->db->model( 'meta' )->get_by_key(
          ['kind' => 'metadata', 'model' => 'asset', 'object_id' => $obj->id, 'key' => 'file'] );
        if (! $meta->id ) {
            return $app->mode === 'list_action' ? 0 : 1;
        }
        $metadata = json_decode( $meta->text, true );
        if ( is_array( $metadata ) ) {
            if (! $obj->a11y_verified && isset( $metadata['image_verified'] ) && $metadata['image_verified'] ) {
                $metadata['image_verified'] = false;
                $meta->text( json_encode( $metadata ) );
                $meta->save();
                return $app->mode === 'list_action' ? 0 : 1;
            }
        }
        if ( !is_array( $metadata ) || isset( $metadata['image_kind'] ) ) {
            return $app->mode === 'list_action' ? 0 : 1;
        }
        if (! $obj->file ) {
            $obj = $obj->load( $obj->id );
        }
        $changes = false;
        if (! $cb['is_new'] && $obj->file && $original->file ) {
            if ( base64_encode( $obj->file ) !== base64_encode( $original->file ) ) {
                $changes = true;
                if ( $obj->a11y_verified ) {
                    if ( $app->mode === 'save' && $app->param( 'a11y_verified' ) ) {
                    } else {
                        $obj->a11y_verified(0);
                        $obj->save();
                    }
                }
            }
        }
        if ( $obj->file_ext === 'html' ) {
            if (! $app->imageinfo_html_autocheck && $app->mode !== 'list_action' ) {
                return $app->mode === 'list_action' ? 0 : 1;
            }
            $this->html_ids[(int)$obj->id ] = true;
            return 1;
        } else if ( $obj->class === 'pdf' ) {
            if (! $app->imageinfo_pdf_autocheck && $app->mode !== 'list_action' ) {
                return $app->mode === 'list_action' ? 0 : 1;
            }
            $pdfinfo = $app->imageinfo_pdfinfo_path;
            if (! $pdfinfo ) {
                return $app->mode === 'list_action' ? 0 : 1;
            }
            if ( isset( $metadata['contrast_ratio'] ) ) {
                return $app->mode === 'list_action' ? 0 : 1;
            }
            $changed = false;
            unset( $_GET['id'], $_POST['id'], $_REQUEST['id'] );
            $app->param( 'id', $obj->id );
            $app->param( 'workspace_id', $obj->workspace_id );
            $app->param( 'view', 'file' );
            $app->param( '_model', 'asset' );
            $cache_dir = $app->support_dir . DS . 'cache' . DS . $this-> id . '_cache' . DS;
            if ( $obj->id != $original->id ) {
                // Revision
                $cache_key = 'asset-file-' . $obj->id . '.txt';
                $cache_path = $cache_dir . $cache_key;
                if ( $app->fmgr->exists( $cache_path ) ) {
                    $copy_path = $cache_dir . 'asset-file-' . $original->id . '.txt';
                    $app->fmgr->rename( $cache_path, $copy_path );
                }
                $cache_key = 'asset-file-' . $obj->id . '.png';
                $cache_path = $cache_dir . $cache_key;
                if ( $app->fmgr->exists( $cache_path ) ) {
                    $copy_path = $cache_dir . 'asset-file-' . $original->id . '.png';
                    $app->fmgr->rename( $cache_path, $copy_path );
                }
            }
            $ctx = $this->get_imageinfo_dialog( $app, true, $changes );
            $extracted = $ctx->vars['extracted'] ?? '';
            $extracted = trim( $extracted );
            $fore_color = $ctx->vars['fore_color'] ?? '';
            $back_color = $ctx->vars['back_color'] ?? '';
            $contrast_ratio = $ctx->vars['contrast_ratio'] ?? '';
            $title = $ctx->vars['pdfinfo_title'] ?? '';
            if ( $changes || !isset( $metadata['pdftotext'] ) || !$metadata['pdftotext'] ) {
                $metadata['pdftotext'] = $extracted ? true : false;
                $changed = true;
            }
            if ( $changes || !isset( $metadata['fore_color'] ) && $fore_color ) {
                $metadata['fore_color'] = $fore_color;
                $changed = true;
            }
            if ( $changes || !isset( $metadata['back_color'] ) && $back_color ) {
                $metadata['back_color'] = $back_color;
                $changed = true;
            }
            if ( $changes || !isset( $metadata['contrast_ratio'] ) && $contrast_ratio ) {
                $metadata['contrast_ratio'] = $contrast_ratio;
                $changed = true;
            }
            if ( $changes || !isset( $metadata['title'] ) && $title ) {
                $metadata['title'] = $title;
                $changed = true;
            }
            $encrypted = $ctx->vars['pdfinfo_encrypted'] ?? '';
            if ( $encrypted && !preg_match( '/^yes/', $encrypted ) ) {
                $encrypted = null;
            }
            if ( $changes || $encrypted ) {
                $metadata['pdf_encrypted'] = $encrypted;
            }
            if ( $changes || !isset( $metadata['txt_cache_mtime'] ) ) {
                $cache_key = 'asset-file-' . $obj->id . '.txt';
                $cache_path = $cache_dir . $cache_key;
                if ( $app->fmgr->exists( $cache_path ) ) {
                    $metadata['txt_cache_mtime'] = filemtime( $cache_path );
                    $changed = true;
                }
            }
            if ( $changes || !isset( $metadata['cache_mtime'] ) ) {
                $cache_key = 'asset-file-' . $obj->id . '.png';
                $cache_path = $cache_dir . $cache_key;
                if ( $app->fmgr->exists( $cache_path ) ) {
                    $metadata['cache_mtime'] = filemtime( $cache_path );
                    $changed = true;
                }
            }
            if ( $changes ||! isset( $metadata['image_verified'] ) ) {
                $metadata['image_verified'] = false;
                $changed = true;
            }
            if (! $changed ) {
                return $app->mode === 'list_action' ? 0 : 1;
            }
            $meta->text( json_encode( $metadata ) );
            $meta->save();
            return 1;
        }
        if (! $app->imageinfo_img_autocheck && $app->mode !== 'list_action' ) {
            return $app->mode === 'list_action' ? 0 : 1;
        }
        $out = $app->upload_dir() . DS . $obj->file_name;
        $png = $out;
        $app->fmgr->put( $out, $obj->file );
        $file_type = mime_content_type( $out );
        $is_animated = false;
        $img = null;
        switch ( $file_type ) {
            case 'image/jpeg':
                $img = imagecreatefromjpeg( $out );
                break;
            case 'image/webp':
                $is_animated = PTUtil::is_webp_animated( $out );
                if (! $is_animated ) {
                    $img = imagecreatefromwebp( $out );
                } else {
                    return true;
                }
                break;
            case 'image/gif':
                $is_animated = $this->is_animated( $out );
                $img = imagecreatefromgif( $out );
                break;
            case 'image/svg+xml':
                if ( class_exists( 'Imagick' ) ) {
                    $imagick = new Imagick();
                    $imagick->readImage( $out );
                    $png = "{$png}.png";
                    $imagick->writeImage( $png );
                    $imagick->clear();
                    $imagick->destroy();
                } else {
                    return true;
                }
            default:
                break;
        }
        if ( $img !== null ) {
            $png = "{$png}.png";
            imagepng( $img, $png );
        }
        $results = $this->image_calc( $png, $file_type );
        $metadata = array_merge( $results, $metadata );
        $metadata['is_animated'] = $is_animated;
        if (! isset( $metadata['image_verified'] ) ) {
            $metadata['image_verified'] = false;
        }
        $meta->text( json_encode( $metadata ) );
        $meta->save();
        return 1;
    }

    function image_calc ( $path, $type = 'image/jpeg', $max = 400, $min = 100, $photo = 3000 ) {
        $app = Prototype::get_instance();
        $results = ['contrast_ratio' => 'Undefined', 'image_kind' => 'picture', 'fore_color' => '', 'backcolor' => ''];
        list( $width, $height ) = getimagesize( $path );
        if ( ( $width >= $photo || $height >= $photo ) && $type === 'image/jpeg' ) {
            // OR has ExifMetadata.
            if ( $width > $height ) {
                $aspect_ratio = $width / $height;
            } else {
                $aspect_ratio = $height / $width;
            }
            $aspect_ratio = (string) $aspect_ratio;
            if ( strpos( $aspect_ratio, '1.3333' ) === 0 ) {
                return $results;
            }
        }
        // $totalPixel = $width * $height;
        // Lager than...
        $img = imagecreatefrompng( $path );
        if ( $width > $max || $height > $max ) {
            if ( $width > $height ) {
                $scale = $max / $width;
            } else {
                $scale = $max / $height;
            }
            $twidth = $scale * $width;
            $theight = $scale * $height;
            $twidth = (int) $twidth;
            $theight = (int) $theight;
            if ( $twidth > $min && $theight > $min ) {
                $thumb = imagecreatetruecolor( $twidth, $theight );
                imagealphablending( $thumb, false );
                imagesavealpha( $thumb, true );
                imagecopyresampled( $thumb, $img, 0, 0, 0, 0, $twidth, $theight, $width, $height );
                $img = $thumb;
                $width = $twidth;
                $height = $theight;
            }
        }
        $totalPixel = $width * $height;
        $rgbs = [];
        for ( $i = 0; $i < $width; $i++ ) {
            for ( $j = 0; $j < $height; $j++ ) {
                $rgb = imagecolorat( $img, $i, $j );
                $rgbs[ $rgb ] = true;
            }
        }
        imagetruecolortopalette( $img, false, 32 );
        // imagepng( $img, 'test.png' );
        imagepalettetotruecolor( $img );
        $colors = [];
        $map = [];
        for ( $i = 0; $i < $width; $i++ ) {
            for ( $j = 0; $j < $height; $j++ ) {
                $rgb = imagecolorat( $img, $i, $j );
                $r = ( $rgb >> 16 ) & 0xFF;
                $g = ( $rgb >> 8  ) & 0xFF;
                $b = $rgb & 0xFF;
                $key = "$r-$g-$b";
                $map[ $key ] = isset( $map[ $key ] ) ? $map[ $key ] + 1 : 1;
                $colors[ $key ] = [ $r, $g, $b ];
            }
        }
        arsort( $map, SORT_NUMERIC );
        $require_back = $totalPixel * 0.1;
        $require_fore = $totalPixel * 0.008;
        $fore_color = null;
        $back_color = null;
        $fore_color_rgb = null;
        $back_color_rgb = null;
        $fore_color_hex = '';
        $back_color_hex = '';
        $back_color_rgb = [];
        $result = 0;
        $colorCount = count( $rgbs );
        $score = 0;
        $rate = ( $colorCount / $totalPixel ) * 10;
        $score += $rate;
        $score += $colorCount * 0.00005;
        if ( $type === 'image/jpeg' ) {
            $score += 1.5;
        } else if ( $type === 'image/gif' || $type === 'image/svg+xml' ) {
            $score -= 2;
        } else {
            // .png
            $score *= 0.7;
        }
        $color_count = count( $map );
        $score += $color_count / 32;
        // $app->log( "{$colorCount} {$score}" );
        $i = 0;
        foreach ( $map as $key => $count ) {
            $color = $colors[ $key ];
            $luminance = $this->relative_luminance( $color[0], $color[1], $color[2] );
            if ( !$i ) {
                $back_color = $luminance;
                $back_color_hex = $this->rgb_to_hex( [ $color[0], $color[1], $color[2] ] );
                $back_color_rgb = [ $color[0], $color[1], $color[2] ];
                if ( $require_back > $count ) {
                    $score  = 5;
                    $result = 0;
                    break;
                }
            } else {
                $color_difference = $this->color_difference( $back_color_rgb, [ $color[0], $color[1], $color[2] ] );
                if ( $back_color > $luminance ) {
                    $result = ( $back_color + 0.05 ) / ( $luminance + 0.05 );
                } else {
                    $result = ( $luminance + 0.05 ) / ( $back_color + 0.05 );
                }
                if ( $color_difference > 75 && $result > 4.5 ) {
                    $fore_color_hex = $this->rgb_to_hex( [ $color[0], $color[1], $color[2] ] );
                    $fore_color = $luminance;
                    break;
                } else if ( $require_fore > $count ) {
                    $fore_color_hex = $this->rgb_to_hex( [ $color[0], $color[1], $color[2] ] );
                    $fore_color = $luminance;
                    $score  = 5;
                    break;
                } else {
                    $score += 0.25;
                }
            }
            $i++;
        }
        // $app->log( $score );
        if ( $result ) {
            $result = round( $result, 1 );
        }
        $result = $result ? "{$result} : 1" : 'Undefined';
        $results['contrast_ratio'] = $result;
        $results['fore_color'] = strtoupper( $fore_color_hex );
        $results['back_color'] = strtoupper( $back_color_hex );
        if (! $result || ! $back_color_hex || ! $fore_color_hex || $score > 4 ) {
            $results['image_kind'] = 'picture';
        } else {
            $results['image_kind'] = 'graphics';
        }
        return $results;
    }

    function rgb_to_hex ( $rgb ) {
        return '#' . implode( '', array_map( function( $value ) {
            return substr( '0' . dechex( $value ), -2 ) ;
        }, $rgb ) );
    }

    function color_difference ( $rgb1, $rgb2 ) {
        $color_difference = new color_difference();
        return $color_difference->deltaECIE2000( $rgb1, $rgb2 );
    }

    function relative_luminance ( $r, $g, $b ) {
        $to_srgb = function ( int $byte ) : float {
            $srgb = (float) $byte / 255;
            return $srgb <= 0.03928 ? $srgb / 12.92 : ( ( $srgb + 0.055 ) / 1.055 ) ** 2.4;
        };
        return 0.2126 * $to_srgb( $r ) + 0.7152 * $to_srgb( $g ) + 0.0722 + $to_srgb( $b );
    }

    function is_animated ( $path ) {
        if (! file_exists( $path ) ) {
            return false;
        }
        if (!( $fp = fopen( $path, 'rb' ) ) ) return false;
        $head = fread($fp, 6);
        if (! preg_match( '/^GIF89a/', $head ) ) {
            return false;
        }
        $gce_cnt = 0;
        while (! feof( $fp ) ) {
            if ( bin2hex( fread( $fp, 1 ) ) != '21') continue;
            switch ( bin2hex( fread( $fp, 2 ) ) ) {
                case 'f904':
                    $gce_cnt++;
                    if ( $gce_cnt > 1 ) {
                        fclose( $fp );
                        unset( $gce_cnt );
                        return true;
                    }
                    break;
            }
        }
        fclose( $fp );
        unset( $gce_cnt );
        return false;
    }

    function remove_old_cache ( $app ) {
        list ( $start, $end ) = $app->maintenance_time;
        $current_ts = date( 'YmdHis' );
        $YmdHis = $current_ts;
        $Ymd = substr( $YmdHis, 0, 8 );
        $start = $Ymd . $start;
        $end = $Ymd . $end;
        if ( $start < $YmdHis && $end > $YmdHis ) {
            $fmgr = $app->fmgr;
            $counter = 0;
            $cache_dir = $app->support_dir . DS . 'cache' . DS . $this-> id . '_cache';
            $files = [];
            PTUtil::file_find( $cache_dir, $files );
            $expires = $app->request_time - $app->imageinfo_cache_expires;
            $object_ids = [];
            foreach ( $files as $file ) {
                $basename = basename( $file );
                if ( strpos( $basename, 'session-' ) === 0 ) {
                    $mtime = filemtime( $file );
                    if ( $mtime < $expires ) {
                        $fmgr->unlink( $file );
                        $counter++;
                    }
                } else {
                    list ( $model, $separator, $id ) = explode( '-', $basename );
                    $id = preg_replace( '/[^0-9]*/', '', $id );
                    if (! isset( $object_ids["{$model}_{$id}"] ) ) {
                        $obj = $app->db->model( $model )->load( $id, null, 'id' );
                        $object_ids["{$model}_{$id}"] = $obj ? true : false;
                    }
                    $bool = $object_ids["{$model}_{$id}"];
                    if ( $bool === false ) {
                        $fmgr->unlink( $file );
                        $counter++;
                    }
                }
            }
            return $counter;
        }
        return 0;
    }

    function hdlr_pdfthumbnail ( $args, $ctx ) {
        $app = $ctx->app;
        $current_context = $ctx->stash( 'current_context' );
        $obj = $ctx->stash( $current_context );
        if (! $obj ) return '';
        $pdfinfo = $app->imageinfo_pdfinfo_path;
        if (! $pdfinfo ) return '';
        $tools_ext = '';
        if ( substr( PHP_OS, 0, 3 ) == 'WIN' ) {
            $tools_ext = '.exe';
        }
        $id = (int) $obj->id;
        $width = isset( $args['width'] ) ? (int) $args['width'] : '';
        $height = isset( $args['height'] ) ? (int) $args['height'] : '';
        $square = isset( $args['square'] ) ? $args['square'] : false;
        $scale = isset( $args['scale'] ) ? (int) $args['scale'] : '';
        $model = isset( $args['model'] ) ? $args['model'] : $obj->_model;
        $name = isset( $args['name'] ) ? $args['name'] : 'file';
        $add_basename = isset( $args['add_basename'] ) ? $args['add_basename'] : '';
        $model = strtolower( $model );
        $name = strtolower( $name );
        if ( $obj->$name === null ) {
            $obj = $app->db->model( $model )->load( $id );
        }
        if (! $obj->has_column( $name ) || ! $obj->$name ) {
            return '1';
        }
        $args['model'] = $model;
        $args['name'] = $name;
        $tools_dir = dirname( $pdfinfo ) . DS;
        $pdftocairo = $tools_dir . 'pdftocairo' . $tools_ext;
        $extension = $args['extension'] ?? 'png';
        $extension = strtolower( $extension );
        if ( $extension !== 'png' && $extension !== 'jpg' ) {
            $extension = 'png';
        }
        $terms = ['model' => $obj->_model, 'object_id' => $obj->id,
                  'class' => 'file', 'key' => $name, 'delete_flag' => [0, 1] ];
        if ( $obj->_model == 'asset' ) {
            $values = $obj->get_values( true );
            if ( isset( $values['extra_path'] ) && isset( $values['file_name'] ) ) {
                $path = '%r/' . $values['extra_path'] . $values['file_name'];
                $terms['relative_path'] = $path;
            }
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key( $terms,
              ['limit' => 1, 'sort' => ['delete_flag' => 'ascend', 'id' => 'descend'] ],
               'id,url,workspace_id,mime_type' );
        if (! $url->id ) {
            return '';
        }
        if ( $url->mime_type !== 'application/pdf' ) {
            return '';
        }
        $mime_type = $extension === 'png' ? 'image/png' : 'image/jpeg';
        $thumbnail_basename = 'thumb';
        if ( $model != 'asset' ) {
            $thumbnail_basename .= "-{$model}";
        }
        if ( $width && !$height ) {
            $thumbnail_basename .= "-{$width}xauto";
        } else if (!$width && $height ) {
            $thumbnail_basename .= "-autox{$height}";
        }
        if ( $square ) {
            $thumbnail_basename .= '-square';
        }
        $thumbnail_basename .= "-{$id}";
        if ( $add_basename ) {
            $thumbnail_basename .= "-{$add_basename}";
        }
        $thumbnail_name = "{$thumbnail_basename}-{$name}.{$extension}";
        $site_path = $app->site_path;
        $extra_path = $app->extra_path;
        $site_url = $app->site_url;
        $asset_publish = $app->asset_publish;
        if ( $workspace = $obj->workspace ) {
            $site_path = $workspace->site_path;
            $extra_path = $workspace->extra_path;
            $site_url = $workspace->site_url;
            $asset_publish = $workspace->asset_publish;
        }
        $thumbnail_path = $site_path . DS . $extra_path . 'thumbnails' . DS . $thumbnail_name;
        $thumbnail_url = $site_url . $extra_path . 'thumbnails/' . $thumbnail_name;
        if ( $app->fmgr->exists( $thumbnail_path ) ) {
            $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $model,
                 'object_id' => $obj->id, 'kind' => 'metadata', 'key' => $name ] );
            if ( $meta->id ) {
                $json = json_decode( $meta->text );
                if ( $json !== null && property_exists( $json, 'uploaded' ) ) {
                    $uploaded = strtotime( $json->uploaded );
                    $mtime = filemtime( $thumbnail_path );
                    if ( $uploaded < $mtime ) {
                        return $thumbnail_url;
                    }
                }
            }
        }
        $args['mime_type'] = $mime_type;
        $upload_dir = $app->upload_dir() . DS;
        $tmp_pdf = $upload_dir . 'tmpimage.pdf';
        $thumbnail = $upload_dir . 'thumbnail.' . $extension;
        $app->fmgr->put( $tmp_pdf, $obj->$name );
        if (! $width && ! $height && ! $scale ) {
            $cmd = "{$pdfinfo} $tmp_pdf";
            $result = shell_exec( $cmd );
            if ( $result === false ) return '';
            $result = explode( PHP_EOL, $result );
            foreach ( $result as $res ) {
                if ( stripos( $res, 'Page size:' ) === 0 ) {
                    $res = preg_replace( '/^Page\ssize:\s*/', '', $res );
                    $res = preg_replace( '/\(.*?\)$/', '', $res );
                    list( $width, $height ) = explode( 'x', $res );
                    $width = (int) $width;
                    $width = $app->imageinfo_pt_to_px * $width;
                    $width = (int) $width;
                    $args['width'] = $width;
                    return $this->hdlr_pdfthumbnail( $args, $ctx );
                }
            }
        }
        $tmp_pdf = escapeshellarg( $tmp_pdf );
        $tmp_img = escapeshellarg( $upload_dir . 'thumbnail' );
        $cmd = "{$pdftocairo} -singlefile -{$extension} {$tmp_pdf} {$tmp_img}";
        $result = shell_exec( $cmd );
        if ( $result === false ) return '';
        if (! $app->fmgr->exists( $thumbnail ) ) return '';
        $clone = clone $obj;
        $clone->$name( $app->fmgr->get( $thumbnail ) );
        $meta = $app->db->model( 'meta' )->new( ['model' => $model,
             'object_id' => $obj->id, 'kind' => 'metadata', 'key' => $name ] );
        list( $width, $height ) = getimagesize( $thumbnail );
        $metadata = ['file_size' => filesize( $thumbnail ), 'image_width' => $width,
                     'image_height' => $height, 'class' => 'image',
                     'extension' => $extension, 'basename' => 'pdf_thumbnail',
                     'mime_type' => $mime_type, 'file_name' => 'pdf_thumbnail.png' ];
        $metadata['uploaded'] = date( 'Y-m-d H:i:s' );
        $metadata['user_id'] = $app->user()->id;
        $meta->text( json_encode( $metadata ) );
        $app->ctx->stash( "{$model}_meta_{$name}_" . $obj->id, $meta );
        return PTUtil::thumbnail_url( $clone, $args );
    }

    function outerHTML ( $element ) { 
        $outerHTML = ''; 
        if ( $element->nodeType == 1 ) {
            $tagAttrs = [];
            foreach ( $element->attributes as $attr ) {
                $tagAttrs[] = $attr->nodeValue ?
                              $attr->nodeName . '="' . $attr->nodeValue . '"' : $attr->nodeName;
            }
            $startTag = '<' . $element->nodeName . ' ' . implode( ' ', $tagAttrs ) . '>';
            $endTag = '</' . $element->nodeName . '>';
        }
        $children  = $element->childNodes;
        if ( $children !== null ) {
            foreach ( $children as $child ) { 
                $outerHTML .= $element->ownerDocument->saveHTML( $child );
            }
        }
        if ( $element->nodeType == 1 ) {
            $outerHTML = "{$startTag}{$outerHTML}{$endTag}";
        }
        return $outerHTML; 
    }
}