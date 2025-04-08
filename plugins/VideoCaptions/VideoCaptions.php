<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class VideoCaptions extends PTPlugin {

    protected $duration  = null;
    protected $json_path = null;
    protected $thumbnail_job = null;

    function __construct () {
        parent::__construct();
    }

    public $upgrade_functions = [ ['version_limit' => 3.0, 'method' => 'add_column_thumbnail_sec'],
                                  ['version_limit' => 3.3, 'method' => 'add_column_duration'] ];

    function add_column_thumbnail_sec ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'upload_file' );
        $upgrader = new PTUpgrader();
        $upgrade  = false;
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'thumbnail_sec'
        ] );
        if (! $column->id ) {
            $values = [
                'type' => 'double',
                'label' => 'Export Thumbnail Sec',
                'index' => 0,
                'default' => 0,
                'order' => 75
            ];
            $upgrade = $upgrader->make_column( $table, 'thumbnail_sec', $values, false );
            $upgrader->upgrade_scheme( 'upload_file' );
        }
        return true;
    }

    function add_column_duration ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'upload_file' );
        $upgrader = new PTUpgrader();
        $upgrade  = false;
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'duration'
        ] );
        if (! $column->id ) {
            $values = [
                'type' => 'double',
                'label' => 'Play Time',
                'index' => 1,
                'default' => 0,
                'order' => 80
            ];
            $upgrade = $upgrader->make_column( $table, 'duration', $values, false );
            $upgrader->upgrade_scheme( 'upload_file' );
        }
        return true;
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $uploader = $app->component( 'FileUploader' );
        $plugin_switch = $app->plugin_switch;
        if (! isset( $plugin_switch['fileuploader'] ) ) {
            $uploader = null;
        } else {
            $plugin_switch = $plugin_switch['fileuploader'];
            $uploader = $plugin_switch->number;
        }
        $table = $app->get_table( 'upload_file' );
        if (! $table ) {
            $uploader = null;
        }
        if (! $uploader ) {
            $errors[] = $this->translate(
              'The FileUploader plugin must be enabled to enable VideoCaptions plugin.' );
            return false;
        }
        $app->clear_compiled( 'edit.tmpl' );
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
        $table = $app->get_table( 'upload_file' );
        $upgrader = new PTUpgrader();
        $upgrade  = false;
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'thumbnail_sec'
        ] );
        if (! $column->id ) {
            $values = [
                'type' => 'double',
                'label' => 'Export Thumbnail Sec',
                'index' => 0,
                'default' => 0,
                'order' => 75
            ];
            $upgrader->make_column( $table, 'thumbnail_sec', $values, false );
            $upgrade = true;
        }
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'duration'
        ] );
        if (! $column->id ) {
            $values = [
                'type' => 'double',
                'label' => 'Play Time',
                'index' => 1,
                'default' => 0,
                'order' => 80
            ];
            $upgrade = $upgrader->make_column( $table, 'duration', $values, false );
            $upgrade = true;
        }
        if ( $upgrade ) {
            $upgrader->upgrade_scheme( 'upload_file' );
        }
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'edit.tmpl' );
        return true;
    }

    function queue_add_subtitles ( $app, $queue, &$error ) {
        $json_string = $queue->metadata;
        $params = $queue->data;
        $params = json_decode( $params, true );
        foreach ( $params as $key => $param ) {
            $_REQUEST[ $key ] = $param;
            $_POST[ $key ] = $param;
        }
        $ts_job = $queue->ts_job;
        $app->user = $ts_job->user;
        return $this->video_caption_add_subtitles( $app, false, false, $json_string );
    }

    function queue_convert_to_hls ( $app, $queue, &$error ) {
        $params = $queue->data;
        $params = json_decode( $params, true );
        if (! $params ) {
            // json_decode(): Passing null to parameter #1 ($json) of type string is deprecated.
            return true;
        }
        foreach ( $params as $key => $param ) {
            $_REQUEST[ $key ] = $param;
            $_POST[ $key ] = $param;
        }
        $ts_job = $queue->ts_job;
        $app->user = $ts_job->user;
        $obj = $app->db->model( $queue->model )->load( $queue->object_id );
        if (! $obj ) {
            return true;
        }
        $cb = [];
        $res = $this->post_save_upload_file( $cb, $app, $obj, true );
        sleep( $app->video_captions_hls_queue_sleep );
        return $res;
    }

    function video_caption_add_subtitles ( $app, $temp_save = false, $temp_save_text = false, $json_string = false ) {
        $is_queue = $json_string !== false;
        if ( ! $is_queue ) {
            if (! $app->can_do( 'upload_file', 'create' ) || $app->request_method !== 'POST' ) {
                return $app->json_error( 'Permission denied.' );
            }
        }
        $SimplifiedJapanese = $app->component( 'SimplifiedJapanese' );
        $SimplifiedJapanese->caption_text_shadow = $app->video_captions_text_shadow;
        ini_set( 'memory_limit', -1 );
        ini_set( 'max_execution_time', 14400 );
        ignore_user_abort( true );
        $ctx = $app->ctx;
        $ctx->stash( 'workspace', $app->workspace() );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $font = $this->get_config_value( 'video_captions_font', $workspace_id );
        $font_face = $this->get_config_value( 'video_captions_font_face', $workspace_id );
        $font_weight = $this->get_config_value( 'video_captions_font_weight', $workspace_id );
        $canvas_webfont = $this->get_config_value( 'video_captions_canvas_webfont', $workspace_id );
        $default_ruby = $this->get_config_value( 'video_captions_default_ruby', $workspace_id );
        $default_color = $this->get_config_value( 'video_captions_default_color', $workspace_id );
        $default_pos = $this->get_config_value( 'video_captions_default_pos', $workspace_id );
        $wordwrap = $this->get_config_value( 'video_captions_wordwrap', $workspace_id );
        $ctx->vars['canvas_font'] = $font;
        $ctx->vars['canvas_font_face'] = $font_face;
        $ctx->vars['canvas_font_weight'] = $font_weight;
        $ctx->vars['canvas_webfont'] = $canvas_webfont;
        $ffmpeg = $app->simplifiedjapanese_ffmpeg_path;
        $json_string = $json_string !== false ? $json_string : file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $audioTrack = $json['audio'] ?? null;
        $screen_id = $json['screen_id'] ?? null;
        $agreement = $json['agreement'] ?? null;
        if ( $agreement && !$app->cookie_val( 'pt-sj-polly-agreement' ) ) {
            $path = $app->cookie_path ? $app->cookie_path : $app->path;
            $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
            $app->bake_cookie( 'pt-sj-polly-agreement', 1, $expires, $path, true, $app->cookie_domain );
        }
        $request_an_image = isset( $json['request_an_image'] ) ?? false;
        $app->param( 'magic_token', $magic_token );
        if (! $is_queue ) {
            $app->validate_magic( true );
        }
        $text = $json['text'];
        $text = preg_replace( "/\r\n|\r/", PHP_EOL , $text );
        $lines = explode( PHP_EOL, $text );
        $data = [];
        foreach ( $lines as $line ) {
            if (! $line ) {
                continue;
            }
            $data[] = explode( "\t", $line );
        }
        // $data = json_decode( $json['text'], true );
        $id = (int) $app->param( 'id' );
        $obj = $app->db->model( 'upload_file' )->load( $id );
        if (! $obj ) {
            if ( $is_queue ) {
                return false;
            }
            return $app->json_error( $this->translate( 'An error occurred while generation captions.' ) );
        }
        if ( $app->video_captions_bake_queue &&
            ! $is_queue && ! $request_an_image && $app->request_method === 'POST' && !$temp_save && !$temp_save_text ) {
            $ts_job = $app->db->model( 'ts_job' )->get_by_key( ['name' => 'Add Subtitles for Video',
                                                                'class' => $obj->id, 'component' => 'VideoCaptions'] );
            $ts_job->workspace_id( $workspace_id );
            $now = date( 'Y-m-d H:i:s' );
            $ts_job->start_on( $now );
            $app->set_default( $ts_job );
            if ( $ts_job->has_column( 'status', true ) ) {
                $ts_job->status( 2 );
            }
            $queue = null;
            if ( $ts_job->id ) {
                $queue = $app->db->model( 'queue' )->get_by_key( ['ts_job_id' => $ts_job->id ] );
            }
            $ts_job->max_per_once( $app->video_captions_job_max_per );
            $ts_job->label( $obj->label );
            $ts_job->save();
            $queue = $queue && $queue->id ? $queue : $app->db->model( 'queue' )->__new();
            $queue->key( 'Add Subtitles for Video' );
            $queue->component( 'VideoCaptions' );
            $queue->method( 'queue_add_subtitles' );
            $queue->metadata( $json_string );
            $params = $app->param();
            $queue->data( json_encode( $params ) );
            $queue->interval( 999999 );
            $queue->ts_job_id( $ts_job->id );
            $queue->model( 'upload_file' );
            $queue->object_id( $obj->id );
            $queue->workspace_id( $workspace_id );
            $queue->max_retries( 2 );
            $app->set_default( $queue );
            $queue->save();
            $result = ['message'=> $this->translate( 'You made a reservation for subtitling to the video.' ) ];
            $json = json_encode( $result );
            while( ob_get_level() ) { ob_end_clean(); }
            header( $app->protocol . ' 200 OK' );
            header( 'Content-type: application/json' );
            $file_size = strlen( bin2hex( $json ) ) / 2;
            header( "Content-Length: {$file_size}" );
            header( 'Connection: close' );
            echo $json;
            unset( $json );
            flush();
            exit();
        }
        if (! $request_an_image ) {
            $meta = $app->db->model( 'meta' )->get_by_key( ['object_id' => $id,
                                                        'model' => 'upload_file',
                                                        'kind' => 'metadata',
                                                        'key' => 'video_caption'] );
            $meta->text( json_encode( $data ) );
            $meta->save();
        }
        if (! $this->can_bake_captions( $app ) ) {
            $temp_save_text = true;
        }
        if ( $temp_save_text ) {
            $result = ['result'=> 'OK'];
            $json = json_encode( $result );
            while( ob_get_level() ) { ob_end_clean(); }
            header( $app->protocol . ' 200 OK' );
            header( 'Content-type: application/json' );
            $file_size = strlen( bin2hex( $json ) ) / 2;
            header( "Content-Length: {$file_size}" );
            header( 'Connection: close' );
            echo $json;
            unset( $json );
            flush();
            exit();
        }
        $upload_file = $app->db->model( 'upload_file' )->load( $id );
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['model' => 'upload_file', 'object_id' => $id, 'url' => $upload_file->url ] );
        $file_path = $url->file_path;
        $extension = PTUtil::get_extension( $file_path );
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        $ffprobe = $app->simplifiedjapanese_ffprobe_path;
        $cmd = $ffprobe . ' ' . escapeshellarg( $file_path ) . ' -hide_banner -show_entries format=duration';
        $result = shell_exec( $cmd );
        preg_match( '/duration=([0-9].*)\n/i', $result, $matchs );
        $length = trim( $matchs[1] );
        $length = (float) $length;
        $this->duration = $length;
        $postfix = $app->video_captions_postfix;
        $outFile = preg_replace( "/\.$extension$/", '', $file_path );
        $outFile .= $postfix . ".$extension";
        $file_url = $url->url;
        $file_url = preg_replace( "/\.$extension$/", '', $file_url );
        $file_url .= $postfix . ".$extension";
        $array = $data;
        $file_path = escapeshellarg( $file_path );
        $cmd = "{$ffprobe} {$file_path} -show_entries stream=width,height";
        exec( $cmd, $output, $return_var );
        $width = null;
        $height = null;
        foreach ( $output as $item ) {
            if ( strpos( $item, 'width=' ) === 0 ) {
                $width = preg_replace( '/^width=/', '', $item );
            } else if ( strpos( $item, 'height=' ) === 0 ) {
                $height = preg_replace( '/^height=/', '', $item );
            }
        }
        $width = (int) $width;
        if (! $width ) $width = 1280;
        $height = (int) $height;
        if (! $height ) $height = 720;
        $scale = $width / 1280;
        $top = 30 * $scale;
        $top = (int) $top;
        $movie = $file_path;
        $upload_dir = $app->upload_dir();
        $audio = $upload_dir . DS . 'temp.aac';
        $cmd = "{$ffmpeg} -i {$movie} -vn -acodec copy {$audio}";
        if (! $temp_save && $app->video_captions_keep_audio ) {
            exec( $cmd, $output, $return_var );
        }
        $this->audio_backup( $app, $url->file_path );
        $images = [];
        $filters = [];
        $out = $upload_dir . DS . 'tmp.' . $extension;
        $opt = '';
        if ( $codec = $app->video_captions_codec ) {
            $opt = " -c:v {$codec} ";
        }
        $chapter_url = null;
        if (! $temp_save ) {
            $has_chapter = false;
            foreach ( $array as $idx => $data ) {
                if (! isset( $data[6] ) ) {
                    $data[6] = null;
                }
                list ( $start, $end, $text, $pos, $color, $ruby, $wrap ) = $data;
                if ( $data[6] ) {
                    $has_chapter = true;
                    break;
                }
            }
            if ( $has_chapter ) {
                $chapter_url = $this->video_caption_generate_vtt( $app, false, true );
                $chapter_url = $app->ctx->modifier_encode_url_basename( $chapter_url, 1 );
            }
        }
        if ( count( $array ) == 1 ) {
            $cmd = "{$ffmpeg} -i {$movie} -i ";
            $data = $array[0];
            if (! isset( $data[3] ) ) {
                $data[3] = $default_pos;
            }
            if (! isset( $data[4] ) ) {
                $data[4] = $default_color;
            }
            if (! isset( $data[5] ) ) {
                $data[5] = $default_ruby;
            }
            if (! isset( $data[6] ) ) {
                $data[6] = null;
            }
            list ( $start, $end, $text, $pos, $color, $ruby, $wrap ) = $data;
            if (! $pos ) {
                if ( $is_queue ) {
                    return true;
                }
                $result = ['result'=> null, 'chapter' => $chapter_url ];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
            $color = strtolower( $color );
            if ( $color == '2' || $color == 'black' ) {
                $color = 'black';
            } else {
                $color = 'white';
            }
            if ( $color == 'white' ) {
                $ctx->vars['canvas_bgcolor'] = 'black';
                $ctx->vars['canvas_forecolor'] = 'white';
            } else {
                $ctx->vars['canvas_bgcolor'] = 'white';
                $ctx->vars['canvas_forecolor'] = 'black';
            }
            // $SimplifiedJapanese->resolution = 1280;
            $SimplifiedJapanese->caption_font_size = 300;
            if ( $pos == 1 ) {
                $pos = '0:H-h';
            } else if ( $pos == 2 ) {
                $pos = '0:' . $top;
            } else if ( $pos == 3 ) {
                $pos = 'x=(W-w)/2:y=(H-h)/2';
                // $SimplifiedJapanese->resolution = 853; // x1.5
                $SimplifiedJapanese->caption_font_size = 450; // x1.5
            } else {
                $pos = '0:H-h';
            }
            if ( strpos( $start, ':' ) !== false ) {
                $start = $this->hms2sec( $start );
            } else {
                $start = (float) $start;
            }
            if ( strpos( $end, ':' ) !== false ) {
                $end = $this->hms2sec( $end );
            } else {
                $end = (float) $end;
            }
            $app->ctx = $ctx;
            if ( stripos( $text, '<nocaption' ) !== false ) {
                $text = preg_replace( '/<nocaption[^>]*?>.*?<\/nocaption>/si', '', $text );
            }
            if ( stripos( $text, 'noaudio' ) !== false ) {
                $text = preg_replace( '/<\/{0,1}noaudio[^>]*?>/si', '', $text );
            }
            $text = $this->ssml2furigana( $text );
            if ( $wordwrap && !preg_match( "/<rt[^>]*>.*?<\/rt>/", $text ) ) {
                if ( $data[3] == 3 ) {
                    $text = $this->mb_wordwrap( $text, 33, '<br>' );
                } else {
                    $text = $this->mb_wordwrap( $text, 53, '<br>' );
                }
            }
            $image = $SimplifiedJapanese->generate_image( $text, $app, false, false, $width, $ruby );
            if ( $request_an_image ) {
                $mime_type = $url->mime_type;
                $data = base64_encode( file_get_contents( $image ) );
                $data = "data:{$mime_type};base64,{$data}";
                $result = ['data'=> $data ];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
            $cmd = "{$ffmpeg} -i {$movie} -i {$image} -filter_complex \"overlay={$pos}:enable='between(t,{$start},{$end})'\" {$opt} {$out}";
        } else {
            $counter = 0;
            foreach ( $array as $idx => $data ) {
                if (! isset( $data[3] ) ) {
                    $data[3] = $default_pos;
                }
                if (! isset( $data[4] ) ) {
                    $data[4] = $default_color;
                }
                if (! isset( $data[5] ) ) {
                    $data[5] = $default_ruby;
                }
                if (! isset( $data[6] ) ) {
                    $data[6] = null;
                }
                list ( $start, $end, $text, $pos, $color, $ruby, $wrap ) = $data;
                if (! $pos ) {
                    continue;
                }
                if ( $color == '2' || $color == 'black' ) {
                    $color = 'black';
                } else {
                    $color = 'white';
                }
                if ( strpos( $start, ':' ) !== false ) {
                    $start = $this->hms2sec( $start );
                } else {
                    $start = (float) $start;
                }
                if ( $start > $length ) {
                    break;
                }
                if ( strpos( $end, ':' ) !== false ) {
                    $end = $this->hms2sec( $end );
                } else {
                    $end = (float) $end;
                }
                $color = strtolower( $color );
                if ( $color == 'white' ) {
                    $ctx->vars['canvas_bgcolor'] = 'black';
                    $ctx->vars['canvas_forecolor'] = 'white';
                } else {
                    $ctx->vars['canvas_bgcolor'] = 'white';
                    $ctx->vars['canvas_forecolor'] = 'black';
                }
                // $SimplifiedJapanese->resolution = 1280;
                $SimplifiedJapanese->caption_font_size = 300;
                if ( $pos == 1 ) {
                    $pos = '0:H-h';
                } else if ( $pos == 2 ) {
                    $pos = '0:' . $top;
                } else if ( $pos == 3 ) {
                    $pos = 'x=(W-w)/2:y=(H-h)/2';
                    // $SimplifiedJapanese->resolution = 853; // x1.5
                    $SimplifiedJapanese->caption_font_size = 450; // x1.5
                } else {
                    $pos = '0:H-h';
                }
                $start = (float) $start;
                $end = (float) $end;
                $app->ctx = $ctx;
                if ( stripos( $text, '<nocaption' ) !== false ) {
                    $text = preg_replace( '/<nocaption[^>]*?>.*?<\/nocaption>/si', '', $text );
                }
                if ( stripos( $text, 'noaudio' ) !== false ) {
                    $text = preg_replace( '/<\/{0,1}noaudio[^>]*?>/si', '', $text );
                }
                $text = $this->ssml2furigana( $text );
                if ( $wordwrap && !preg_match( "/<rt[^>]*>.*?<\/rt>/", $text ) ) {
                    if ( $data[3] == 3 ) {
                        $text = $this->mb_wordwrap( $text, 33, '<br>' );
                    } else {
                        $text = $this->mb_wordwrap( $text, 53, '<br>' );
                    }
                }
                $image = $SimplifiedJapanese->generate_image( $text, $app, false, false, $width, $ruby );
                $images[] = $image;
                if (! count( $filters ) ) {
                    $filters[] = "[0:v][1:v]overlay={$pos}:enable='between(t,{$start},{$end})'";
                } else {
                    $prev = $counter - 1;
                    $next = $counter + 1;
                    $filters[] = "[v{$prev}];[v{$prev}][{$next}:v]overlay={$pos}:enable='between(t,{$start},{$end})'";
                }
                $counter++;
            }
            if (! $counter ) {
                if ( $is_queue ) {
                    return true;
                }
                $result = ['result'=> null, 'chapter' => $chapter_url ];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
            $cmd = "{$ffmpeg} -i {$movie} -i ";
            $cmd .= implode( ' -i ', $images ) . ' -filter_complex "';
            $cmd .= implode( '', $filters ) . '" ' . $opt . $out;
        }
        if ( $temp_save_text ) {
            exit();
        }
        if ( $temp_save ) {
            $result = ['result'=> 'OK'];
            header( 'Content-type: application/json' );
            echo json_encode( $result );
            exit();
        }
        $existing = $app->db->model( 'session' )->count( ['key' => 'BAKE', 'kind' => 'VC'] );
        $bake_parallel = $app->video_captions_bake_parallel ? $app->video_captions_bake_parallel : 1;
        if ( $existing && $existing >= $bake_parallel ) {
            $app->json_error( $this->translate( 'Another video compositing process is running. Please try again after a while.' ) );
        }
        $session = $app->db->model( 'session' )->new( ['name' => "{$screen_id}-convert",
                                    'object_id' => $id, 'workspace_id' => $workspace_id,
                                    'text' => $out, 'key' => 'BAKE', 'kind' => 'VC',
                                    'user_id' => $app->user()->id ] );
        $session->start( $app->request_time );
        $session->expires( $app->request_time + $app->perm_expires );
        $session->save();
        // TODO To queue.
        exec( $cmd, $output, $return_var );
        $path = $upload_dir . DS . 'movie.' . $extension;
        if ( $app->fmgr->exists( $audio ) ) {
            $cmd = "{$ffmpeg} -i {$out} -i {$audio} -c:v copy -c:a aac -strict experimental -map 0:v:0 -map 1:a:0 {$path}";
            exec( $cmd, $output, $return_var );
        } else {
            $app->fmgr->rename( $out, $path );
        }
        $params = [ $app->user()->nickname, $obj->label, $obj->id ];
        if ( $app->fmgr->exists( $outFile ) ) {
            $message = $this->translate( "User %s has update the video with caption '%s(ID:%s)'.", $params );
            $app->fmgr->rename( $outFile, "{$outFile}.backup" );
        } else {
            $message = $this->translate( "User %s has added a caption to the video '%s(ID:%s)'.", $params );
        }
        if ( $audioTrack == 3 || $audioTrack == 4 ) {
            $path = $this->audio_track( $app, $path, $array, $SimplifiedJapanese, $workspace_id, $upload_dir, $audioTrack );
        } else if ( $audioTrack == 2 ) {
            $out = $upload_dir . DS . 'movie-remove-audio.' . $extension;
            $cmd = "{$ffmpeg} -i {$path} -vcodec copy -an {$out}";
            exec( $cmd, $output, $return_var );
            $path = $out;
        } else if ( $audioTrack == 1 ) {
            $backup_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS;
            $backup = $backup_dir . md5( $outFile ) . ".aac";
            if ( $app->fmgr->exists( $backup ) ) {
                $out = $upload_dir . DS . 'movie-restore-audio.' . $extension;
                $cmd = "{$ffmpeg} -i {$path} -i {$backup} -c:v copy -c:a aac -strict experimental -map 0:v:0 -map 1:a:0 {$out}";
                exec( $cmd, $output, $return_var );
                $path = $out;
            }
        }
        $app->fmgr->rename( $path, $outFile );
        $session->remove();
        if ( $app->fmgr->exists( $outFile ) ) {
            $caption_url = $app->db->model( 'urlinfo' )->get_by_key(
            ['class' => 'plugin', 'object_id' => $id, 'model' => 'upload_file', 'key' => 'captions', 'delete_flag' => [0, 1] ] );
            $caption_url->mime_type( $url->mime_type );
            $caption_url->workspace_id( $url->workspace_id );
            $caption_url->publish_file( 1 );
            $caption_url->was_published( 1 );
            $caption_url->is_published( 1 );
            $caption_url->md5( md5_file( $outFile ) );
            $caption_url->filemtime( filemtime( $outFile ) );
            $caption_url->url( $file_url );
            $caption_url->file_path( $outFile );
            PTUtil::set_url_path( $caption_url );
            $caption_url->save();
            $metadata = ['url' => $file_url, 'kind' => 'movie'];
            $app->log( ['message' => $message, 'category' => 'videocaptions',
                        'model' => 'upload_file', 'object_id' => $id,
                        'metadata' => $metadata, 'level' => 'info'] );
            if ( $app->fileuploader_backup ) {
                $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
                $cache = $cache_dir . md5( $outFile ) . ".{$extension}";
                $app->fmgr->copy( $outFile, $cache );
            }
        } else {
            if ( $is_queue ) {
                return false;
            }
            return $app->json_error( $this->translate( 'An error occurred while generation captions.' ) );
        }
        if ( $is_queue ) {
            return true;
        }
        // $file_url = $app->ctx->modifier_encode_url_basename( $file_url, 1 );
        $result = ['result'=> $file_url, 'chapter' => $chapter_url ];
        header( 'Content-type: application/json' );
        echo json_encode( $result );
        exit();
    }

    function video_caption_delete_file ( $app ) {
        if (! $app->can_do( 'upload_file', 'delete' ) || $app->request_method !== 'POST' ) {
            return $app->json_error( 'Permission denied.' );
        }
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $id = (int) $app->param( 'id' );
        $obj = $app->db->model( 'upload_file' )->load( $id );
        if (! $obj ) {
            return $app->json_error( $this->translate( 'Invalid request.' ) );
        }
        $type = $json['type'];
        $ds = DS;
        $basename = basename( $obj->file_path, ".{$obj->file_ext}" );
        $chapters_pfx = $app->video_captions_chapters_postfix ;
        if ( $type === 'vtt' ) {
            $file_path = dirname( $obj->file_path ) . "{$ds}{$basename}.vtt";
            $file_url = dirname( $obj->url ) . "/{$basename}.vtt";
            $extension = 'vtt';
        } else if ( $type === 'chapter-vtt' ) {
            $file_path = dirname( $obj->file_path ) . "{$ds}{$basename}{$chapters_pfx}.vtt";
            $file_url = dirname( $obj->url ) . "/{$basename}{$chapters_pfx}.vtt";
            $extension = 'vtt';
        } else if ( $type === 'chapter-vtt-js' ) {
            $file_path = dirname( $obj->file_path ) . "{$ds}{$basename}{$chapters_pfx}.json";
            $file_url = dirname( $obj->url ) . "/{$basename}{$chapters_pfx}.json";
            $extension = 'json';
        } else {
            $postfix = $app->video_captions_postfix;
            $file_path = dirname( $obj->file_path ) . "{$ds}{$basename}{$postfix}.{$obj->file_ext}";
            $file_url = dirname( $obj->url ) . "/{$basename}{$postfix}.{$obj->file_ext}";
            $extension = $obj->file_ext;
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['file_path' => $file_path ] );
        if (! $app->fmgr->exists( $file_path ) || !$url->id ) {
            return $app->json_error( $this->translate( 'Invalid request.' ) );
        }
        $url->remove();
        if ( $app->fileuploader_backup ) {
            $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
            $cache = $cache_dir . md5( $file_path ) . ".{$extension}";
            $app->fmgr->unlink( $cache );
        }
        $metadata = ['url' => $file_url, 'kind' => $type ];
        $message = $this->translate( "The file '%1\$s' deleted by %2\$s.",
          [ preg_replace('!^https{0,1}://[^/]+!', '', $file_url ), $app->user()->nickname ] );
        $app->log( ['message' => $message, 'category' => 'videocaptions',
                    'model' => 'upload_file', 'object_id' => $id,
                    'metadata' => $metadata, 'level' => 'info'] );
        $result = ['result'=> 'OK'];
        header( 'Content-type: application/json' );
        echo json_encode( $result );
        exit();
    }

    function video_caption_bake_processing ( $app ) {
        $screen_id = $app->param( 'screen_id' );
        $name = "{$screen_id}-convert";
        $session = $app->db->model( 'session' )->get_by_key( ['name' => $name ] );
        if (! $session->id ) {
            return $app->error( 'Invalid request.' );
        }
        if ( $app->request_method == 'POST' ) {
            $app->validate_magic();
        }
        $tmp = $session->text;
        $id = (int) $app->param( 'id' );
        $obj = $app->db->model( 'upload_file' )->load( $id );
        if (! $obj ) {
            return $app->json_error( $this->translate( 'Invalid request.' ) );
        }
        $file_path = $obj->file_path;
        $extension = PTUtil::get_extension( $file_path );
        $postfix = $app->video_captions_postfix;
        $outFile = preg_replace( "/\.$extension$/", '', $file_path );
        $outFile .= $postfix . ".$extension";
        $success = false;
        if ( $app->fmgr->exists( $outFile ) && !$app->fmgr->exists( $session->text ) ) {
            $mtime = filemtime( $outFile );
            if ( ( $app->request_time - $mtime ) < 60 ) {
                $success = true;
            }
        }
        $counter = (int) $app->param( 'counter' ) ?? 0;
        $live = $app->fmgr->exists( $session->text ) && ! $counter ? true : false;
        if (! $success ) {
            if ( $session->text && $app->fmgr->exists( $session->text ) ) {
                $filesize = $session->value ? $session->value : filesize( $session->text );
                $session->value( $filesize );
                $session->save();
                $i = 0;
                while ( $success === false ) {
                    sleep( 10 );
                    if (! $app->fmgr->exists( $session->text ) && $app->fmgr->exists( $outFile ) ) {
                        $mtime = filemtime( $outFile );
                        if ( ( $app->request_time - $mtime ) < 60 ) {
                            $success = true;
                            break;
                        }
                    } else {
                        $compare = filesize( $session->text );
                        if ( $filesize < $compare ) {
                            $session->value( $compare );
                            $session->save();
                            $live = true;
                        }
                    }
                    if ( $i > 3 ) {
                        break;
                    }
                    $i++;
                }
            }
            if (! $app->fmgr->exists( $session->text ) && $app->fmgr->exists( $outFile ) ) {
                $mtime = filemtime( $outFile );
                if ( ( $app->request_time - $mtime ) < 60 ) {
                    $success = true;
                }
            }
        }
        if ( $success ) {
            $workspace_id = $obj->workspace_id;
            $id = $obj->id;
            $params = "?__mode=view&_type=edit&_model=upload_file&id={$id}&baked=1";
            $params .= $workspace_id ? "&workspace_id={$workspace_id}" : '';
            $app->redirect( $this->admin_url . $params );
        } else if ( $live ) {
            $tmpl = $app->ctx->get_template_path( 'video-captions-bake-processing.tmpl' );
            $params = [];
            $counter++;
            $params['counter'] = $counter;
            return $app->build_page( $tmpl, $params );
        } else {
            $session = $app->db->model( 'session' )->get_by_key( ['name' => $name ] );
            if ( $session->id ) {
                $session->remove();
            }
            $app->error( $this->translate( 'An error occurred while generation captions.' ) );
        }
    }

    function ssml2furigana ( $content ) {
        if ( strpos( $content, "'" ) !== false && stripos( $content, '<ruby' ) !== false ) {
            if ( preg_match_all( "!<ruby[^>]*?>(.*?)<rt[^>]*?>(.*?)</rt>(.*?)</ruby>!si", $content, $matches ) ) {
                $r_tags = $matches[0];
                $parents = $matches[1];
                $yomis = $matches[2];
                foreach ( $r_tags as $idx => $r_tag ) {
                    $yomi = $yomis[ $idx ];
                    if ( strpos( $yomi, "'" ) === false ) {
                        continue;
                    }
                    if ( preg_match("/[ァ-ヾ]/u", $yomi ) ) {
                        $_yomi = str_replace( "'", '', $yomi );
                        $_yomi = mb_convert_kana( $_yomi, 'c' );
                        $quoted = preg_quote( $yomi, '/' );
                        $content = preg_replace( "!(<ruby[^>]*?>.*?<rt[^>]*?>){$quoted}(</rt>.*?</ruby>)!si", '$1' . $_yomi . '$2', $content );
                    }
                }
            }
        }
        return $content;
    }

    function audio_backup ( $app, $path ) {
        $ffmpeg  = $app->simplifiedjapanese_ffmpeg_path;
        $backup_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS;
        $app->fmgr->mkpath( $backup_dir );
        $backup = $backup_dir . md5( $path ) . ".aac";
        $require_backup = true;
        if ( $app->fmgr->exists( $backup ) ) {
            if ( filemtime( $backup ) > filemtime( $path ) ) {
                $require_backup = false;
            }
        }
        if ( $require_backup ) {
            $cmd = "{$ffmpeg} -i {$path} -vn -acodec copy {$backup}";
            exec( $cmd, $output, $return_var );
        }
        return $backup;
    }

    function audio_track ( $app, $path, $array, $SimplifiedJapanese = null, $workspace_id = null, $upload_dir = null, $audioTrack = 3 ) {
        $extension = PTUtil::get_extension( $path );
        if ( $SimplifiedJapanese === null ) {
            $SimplifiedJapanese = $app->component( 'SimplifiedJapanese' );
        }
        if ( $workspace_id === null ) {
            $workspace_id = (int) $app->param( 'workspace_id' );
        }
        if ( $upload_dir === null ) {
            $upload_dir = $app->upload_dir();
        }
        $ffmpeg  = $app->simplifiedjapanese_ffmpeg_path;
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        $backup = $this->audio_backup( $app, $path );
        $ffprobe = $app->simplifiedjapanese_ffprobe_path;
        $length = $this->duration;
        if ( $length === null ) {
            $cmd = $ffprobe . ' ' . escapeshellarg( $path ) . ' -hide_banner -show_entries format=duration';
            $result = shell_exec( $cmd );
            preg_match( '/duration=([0-9].*)\n/i', $result, $matchs );
            $length = trim( $matchs[1] );
            $length = (float) $length;
        }
        $total = 0;
        $file_list = '';
        foreach ( $array as $idx => $line ) {
            list( $start, $text ) = [ $line[0], $line[2] ];
            // $text = str_replace( '&', '&amp;', $text );
            if ( stripos( $text, '<noaudio' ) !== false ) {
                $text = preg_replace( '/<noaudio[^>]*?>.*?<\/noaudio>/i', '', $text );
            }
            if ( stripos( $text, 'nocaption' ) !== false ) {
                $text = preg_replace( '/<\/{0,1}nocaption[^>]*?>/si', '', $text );
            }
            if ( strpos( $start, ':' ) !== false ) {
                $start = $this->hms2sec( $start );
            } else {
                $start = (float) $start;
            }
            if ( $length < $start ) {
                break;
            }
            $start_time = $start - $total;
            if ( $start_time <= 10 ) {
                $text = $start_time > 0 ? "<break time=\"{$start_time}s\" />{$text}" : $text;
            } else {
                $st_time = $start_time * 1000;
                $st_time = ceil( $st_time ); // conversion from float xxxx.xx to int loses precision
                $mod = $st_time % 10000;
                $mod /= 1000;
                $repeat = floor( $start_time / 10 );
                $break = str_repeat( '<break time="10s" />', $repeat );
                if ( $mod > 0 ) {
                    $break .= "<break time=\"{$mod}s\" />";
                }
                $text = $break . $text;
            }
            $mp3 = $upload_dir . DS . "out{$idx}.mp3";
            $file_list .= "file '{$mp3}'" . PHP_EOL;
            $data = $SimplifiedJapanese->_simplifiedjapanese_export_mp3( $app, $text, $workspace_id, true, false );
            $app->fmgr->put( $mp3, $data );
            $cmd =  $ffprobe . ' ' . $mp3 . ' -hide_banner -show_entries format=duration';
            $result = shell_exec( $cmd );
            preg_match( '/duration=([0-9].*)\n/i', $result, $matchs );
            $seconds = trim( $matchs[1] );
            $seconds = (float) $seconds;
            $total += $seconds;
        }
        $file_list = trim( $file_list );
        $list = $upload_dir . DS . 'list.txt';
        $app->fmgr->put( $list, $file_list );
        $audio_desc = $upload_dir . DS . 'merge.mp3';
        $cmd = "{$ffmpeg} -f concat -safe 0 -i {$list} -c copy {$audio_desc}";
        exec( $cmd, $output, $return_var );
        if ( $audioTrack == 4 && $app->fmgr->exists( $backup ) ) {
            $combining = $upload_dir . DS . 'combining.mp3';
            $cmd = "{$ffmpeg} -i {$backup} -i {$audio_desc} -filter_complex amix=2 -y {$combining}";
            // ffmpeg -i audio -i audio -filter_complex amix=2 -y
            exec( $cmd, $output, $return_var );
            $audio_desc = $combining;
        }
        $out = $upload_dir . DS . 'movie-with-audio.' . $extension;
        $path = escapeshellarg( $path );
        $audio_desc = escapeshellarg( $audio_desc );
        $cmd = "{$ffmpeg} -i {$path} -i {$audio_desc} -c:v copy -c:a aac -strict experimental -map 0:v:0 -map 1:a:0 {$out}";
        exec( $cmd, $output, $return_var );
        return $out;
    }

    function sec2hms ( $seconds, $digits = 1 ) {
        $seconds = (string) $seconds;
        $decimal = str_repeat( '0', $digits );
        if ( strpos( $seconds, '.' ) !== false ) {
            list( $seconds, $decimal ) = explode( '.', $seconds );
        }
        $hours = floor( $seconds / 3600 );
        $minutes = floor( ( $seconds / 60 ) % 60 );
        $seconds = $seconds % 60;
        $hms = sprintf( "%02d:%02d:%02d", $hours, $minutes, $seconds );
        $decimal = substr( $decimal, 0, $digits );
        $decimal = str_pad( $decimal, $digits, STR_PAD_RIGHT );
        $hms .= '.' . $decimal;
        return $hms;
    }

    function hms2sec ( $hms ) {
        $t = explode( ':', $hms );
        $h = (int) $t[0];
        if ( isset( $t[1] ) ) {
            $m = (int) $t[1];
        } else {
            $m = 0;
        }
        if ( isset( $t[2] ) ) {
            $s = (float) $t[2];
        } else {
            $s = 0;
        }
        $seconds = ( $h * 60 * 60 ) + ( $m * 60 ) + $s;
        return $seconds;
    }

    function video_caption_generate_vtt ( $app, $preview = false, $chapter = false ) {
        if (! $app->can_do( 'upload_file', 'create' ) || $app->request_method !== 'POST' ) {
            return $app->json_error( 'Permission denied.' );
        }
        $message = '';
        $metadata = [];
        $SimplifiedJapanese = $app->component( 'SimplifiedJapanese' );
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $audioTrack = $json['audio'] ?? null;
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $individual = isset( $json['individual'] ) ?? false;
        $audio_processing = isset( $json['audio_processing'] ) ?? false;
        $agreement = $json['agreement'] ?? null;
        if ( $agreement && !$app->cookie_val( 'pt-sj-polly-agreement' ) ) {
            $path = $app->cookie_path ? $app->cookie_path : $app->path;
            $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
            $app->bake_cookie( 'pt-sj-polly-agreement', 1, $expires, $path, true, $app->cookie_domain );
        }
        $ctx = $app->ctx;
        $ctx->stash( 'workspace', $app->workspace() );
        $workspace_id = (int) $app->param( 'workspace_id' );
        if ( is_object( $SimplifiedJapanese ) ) {
            $SimplifiedJapanese->add_rp_tag[ $workspace_id ] = true;
        }
        $default_ruby = $this->get_config_value( 'video_captions_default_ruby', $workspace_id );
        $default_color = $this->get_config_value( 'video_captions_default_color', $workspace_id );
        $default_pos = $this->get_config_value( 'video_captions_default_pos', $workspace_id );
        $wordwrap = $this->get_config_value( 'video_captions_wordwrap', $workspace_id );
        $text = $json['text'];
        $text = preg_replace( "/\r\n|\r/", PHP_EOL , $text );
        $lines = explode( PHP_EOL, $text );
        $array = [];
        $id = (int) $app->param( 'id' );
        $upload_file = $app->db->model( 'upload_file' )->load( $id );
        if (! $upload_file ) {
            return $app->json_error( $this->translate( 'An error occurred while creating the WebVTT file.' ) );
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['model' => 'upload_file',
                                                          'object_id' => $id,
                                                          'url' => $upload_file->url ] );
        $file_path = $url->file_path;
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        $ffprobe = $app->simplifiedjapanese_ffprobe_path;
        $length = 0;
        $length_str = '0.0';
        if ( $ffprobe && $app->fmgr->exists( $ffprobe ) ) {
            $cmd = $ffprobe . ' ' . escapeshellarg( $file_path ) . ' -hide_banner -show_entries format=duration';
            $result = shell_exec( $cmd );
            if ( preg_match( '/duration=([0-9].*)\n/i', $result, $matchs ) ) {
                $length_str = trim( $matchs[1] );
                $length = (int) $length_str;
            }
        }
        $chapters_pfx = $chapter ? $app->video_captions_chapters_postfix : '';
        $this->audio_backup( $app, $file_path );
        $extension = PTUtil::get_extension( $file_path );
        $file_path = preg_replace( "/\.$extension$/", $chapters_pfx . '.vtt', $file_path );
        $file_url  = $url->url;
        $file_url  = preg_replace( "/\.$extension$/", $chapters_pfx . '.vtt', $file_url );
        $params = [ $app->user()->nickname, $upload_file->label, $upload_file->id ];
        $vtt    = "WEBVTT\n\n";
        $vtt_rb = "WEBVTT\n\n";
        foreach ( $lines as $line ) {
            if (! $line ) {
                continue;
            }
            $array[] = explode( "\t", $line );
        }
        if (! $individual ) {
            $meta = $app->db->model( 'meta' )->get_by_key( ['object_id' => $id,
                                                            'model' => 'upload_file',
                                                            'kind' => 'metadata',
                                                            'key' => 'video_caption'] );
            $meta->text( json_encode( $array ) );
            $meta->save();
        }
        if ( $chapter ) {
            foreach ( $array as $item_idx => $item ) {
                if ( isset( $item[6] ) && $item[6] ) {
                } else {
                    unset( $array[ $item_idx ] );
                }
            }
            $array = array_values( $array );
            if ( $app->video_captions_fill_chapter && $length ) {
                foreach ( $array as $item_idx => $item ) {
                    $next_item = $array[ $item_idx + 1] ?? null;
                    if (! $next_item ) {
                        $mod = preg_replace( '/^.*\./', '', $length_str );
                        $mod = substr( $mod, 0, 1 );
                        $caption_end = PTUtil::sec_to_hms( $length ) . '.' . $mod;
                        $item[1] = $caption_end;
                    } else {
                        $next_start = $next_item[0];
                        $mod = preg_replace( '/^.*\./', '', $next_start );
                        $app->log( $mod );
                        $caption_end = PTUtil::hms_to_sec( $next_start );
                        $caption_end -= 1;
                        $caption_end = PTUtil::sec_to_hms( $caption_end ) . '.' . $mod;
                        $item[1] = $caption_end;
                    }
                    $array[ $item_idx ] = $item;
                }
            }
        }
        $close_tag = $chapter ? '' : '</c>';
        $chapter_json = [];
        if (! $audio_processing ) {
            $counter = 0;
            foreach ( $array as $idx => $data ) {
                if (! isset( $data[3] ) ) {
                    $data[3] = $default_pos;
                }
                if (! isset( $data[4] ) ) {
                    $data[4] = $default_color;
                }
                if (! isset( $data[5] ) ) {
                    $data[5] = $default_ruby;
                }
                if (! isset( $data[6] ) ) {
                    $data[6] = null;
                }
                list ( $start, $end, $text, $pos, $color, $ruby, $wrap ) = $data;
                if (! $pos && !$chapter ) {
                    continue;
                } else if ( $chapter && !$data[6] ) {
                    continue;
                }
                $counter++;
                if ( preg_match( '/^[0-9]{2}:[0-9]{2}:[0-9]{2}\.[0-9]{1}$/', $start ) ) {
                    $_start = $start . '00';
                } else {
                    $_start = $this->sec2hms( (float) $start );
                }
                $startTime = preg_replace( '/\..*$/', '', $_start );
                $start_sec = PTUtil::hms2sec( $startTime );
                if ( $length && $length < $start_sec ) {
                    break;
                }
                if ( $chapter && $app->video_captions_chapter_json ) {
                    $json = ['startTime' => $startTime ];
                    $json['name'] = strip_tags( $text );
                    $args = ['id' => $id, 'extension' => $app->video_captions_thumbnail_ext, 'width' => $app->video_captions_thumbnail_width, 'starttime' => $start_sec, 'backup' => true];
                    $thumbnail = $this->hdlr_videothumbnail( $args, $app->ctx );
                    if ( $thumbnail ) {
                        $thumbnail = preg_replace( "/^https{0,1}:\/\/.*?\//", '/', $thumbnail );
                        $json['thumbnail'] = $thumbnail;
                    }
                    $chapter_json[] = $json;
                }
                if ( preg_match( '/^[0-9]{2}:[0-9]{2}:[0-9]{2}\.[0-9]{1}$/', $end ) ) {
                    $_end = $end . '00';
                } else {
                    $_end = $this->sec2hms( (float) $end );
                }
                $color = strtolower( $color );
                if ( $color == '2' || $color == 'black' ) {
                    $color = 'black';
                } else {
                    $color = 'white';
                }
                $tag = '';
                $color = ucfirst( $color );
                if (! $chapter ) {
                    if ( $pos == 1 ) {
                        $pos = ' line:98%';
                        $tag = "<c.vttBottom.vtt{$color}>";
                    } else if ( $pos == 2 ) {
                        $pos = ' line:3%';
                        $tag = "<c.vttTop.vtt{$color}>";
                    } else if ( $pos == 3 ) {
                        $pos = ' line:50%';
                        $tag = "<c.vttTitle.vtt{$color}>";
                    } else {
                        $pos = ' line:98%';
                        $tag = "<c.vttBottom.vtt{$color}>";
                    }
                }
                $vtt .= "$_start --> $_end {$pos}\n";
                $vtt_rb .= "$_start --> $_end {$pos}\n";
                $text = preg_replace( '/<br[^>]*?>/', PHP_EOL, $text );
                if ( stripos( $text, '<nocaption' ) !== false ) {
                    $text = preg_replace( '/<nocaption[^>]*?>.*?<\/nocaption>/si', '', $text );
                }
                if ( stripos( $text, 'noaudio' ) !== false ) {
                    $text = preg_replace( '/<\/{0,1}noaudio[^>]*?>/si', '', $text );
                }
                if (! $chapter && $ruby && is_object( $SimplifiedJapanese ) ) {
                    if ( $wordwrap && ! $chapter ) {
                        if ( $data[3] == 3 ) {
                            $text = $this->mb_wordwrap( $text, 37 );
                        } else {
                            $text = $this->mb_wordwrap( $text );
                        }
                    }
                    $text = $SimplifiedJapanese->filter_furigana( $text, $ruby, $ctx );
                    $rtext = preg_replace( '/<rp[^>]*>.*?<\/rp>/si', '', $text );
                    $vtt_rb .= "{$tag}{$rtext}{$close_tag}";
                    $text = str_replace( PHP_EOL, '', $text );
                    $text = preg_replace( '/<\/{0,1}rp[^>]*>/si', '', $text );
                    $text = preg_replace( '/<\/{0,1}ruby[^>]*>/si', '', $text );
                    $text = preg_replace( '/<\/{0,1}rt[^>]*>/si', '', $text );
                } else {
                    $text = $this->ssml2furigana( $text );
                    $vtt_rb .= "{$tag}{$text}{$close_tag}";
                }
                if ( $wordwrap ) {
                    if ( $data[3] == 3 ) {
                        $text = $this->mb_wordwrap( $text, 37 );
                    } else {
                        $text = $this->mb_wordwrap( $text );
                    }
                }
                $vtt .= "{$tag}{$text}{$close_tag}";
                $vtt .= "\n\n";
                $vtt_rb .= "\n\n";
            }
            if ( $chapter && $app->video_captions_chapter_json ) {
                $json_path = preg_replace( '/\.vtt/', '.json', $file_path );
                $caption_url = $app->db->model( 'urlinfo' )->get_by_key(
                ['class' => 'plugin', 'object_id' => $id, 'model' => 'upload_file', 'key' => 'json',
                  'delete_flag' => [0, 1] ] );
                if ( !empty( $chapter_json ) ) {
                    // Generate Image Save json.
                    if ( $app->fmgr->exists( $json_path ) ) {
                        $message = $this->translate( "User %s has update the Chapter JSON file to the video '%s(ID:%s)'.", $params );
                        $app->fmgr->copy( $json_path, "{$json_path}.backup" );
                    } else {
                        $message = $this->translate( "User %s has added a Chapter JSON file to the video '%s(ID:%s)'.", $params );
                    }
                    $app->fmgr->put( $json_path, json_encode( $chapter_json,
                      JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
                    $caption_url->mime_type( 'application/json' );
                    $caption_url->workspace_id( $url->workspace_id );
                    $caption_url->publish_file( 1 );
                    $caption_url->was_published( 1 );
                    $caption_url->is_published( 1 );
                    $caption_url->class( 'json' );
                    $caption_url->md5( md5_file( $json_path ) );
                    $caption_url->filemtime( filemtime( $json_path ) );
                    $caption_url->file_path( $json_path );
                    PTUtil::set_url_path( $caption_url );
                    $caption_url->save();
                    if ( $app->fileuploader_backup ) {
                        $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
                        $cache = $cache_dir . md5( $json_path ) . ".json";
                        $app->fmgr->copy( $json_path, $cache );
                    }
                    $metadata = ['url' => $caption_url->url ];
                    $app->log( ['message' => $message, 'category' => 'videocaptions',
                                'model' => 'upload_file', 'object_id' => $id,
                                'metadata' => $metadata, 'level' => 'info'] );
                    $this->json_path = $caption_url->url;
                } else {
                    // Remove json.
                    $caption_url->remove();
                }
            }
            $vtt = trim( $vtt );
            $vtt_rb = trim( $vtt_rb );
            if ( $preview ) {
                return $counter ? $vtt_rb : '';
            }
            $chapter_url = '';
            if (! $chapter ) {
                $chapter_url = $this->video_caption_generate_vtt( $app, false, true );
            }
            $ruby_url = '';
            if (! $counter ) {
                if ( $app->fmgr->exists( $file_path ) ) {
                    $app->fmgr->copy( $file_path, "{$file_path}.backup" );
                    $app->fmgr->unlink( $file_path );
                }
                $file_url = '';
                $ruby_url = '';
                if ( $chapter ) {
                    return '';
                }
            } else {
                $metadata = ['url' => $file_url ];
                if ( $app->fmgr->exists( $file_path ) ) {
                    $message = $this->translate( "User %s has update the WebVTT file to the video '%s(ID:%s)'.", $params );
                    $app->fmgr->copy( $file_path, "{$file_path}.backup" );
                } else {
                    $message = $this->translate( "User %s has added a WebVTT file to the video '%s(ID:%s)'.", $params );
                }
                $app->fmgr->put( $file_path, $vtt_rb );
                $url_key = $chapter ? 'chapter' : 'vtt';
                $caption_url = $app->db->model( 'urlinfo' )->get_by_key(
                ['class' => 'plugin', 'object_id' => $id, 'model' => 'upload_file', 'key' => $url_key, 'delete_flag' => [0, 1] ] );
                $caption_url->mime_type( 'text/vtt' );
                $caption_url->workspace_id( $url->workspace_id );
                $caption_url->publish_file( 1 );
                $caption_url->was_published( 1 );
                $caption_url->is_published( 1 );
                $caption_url->md5( md5_file( $file_path ) );
                $caption_url->filemtime( filemtime( $file_path ) );
                $caption_url->url( $file_url );
                $caption_url->file_path( $file_path );
                PTUtil::set_url_path( $caption_url );
                $caption_url->save();
                if ( $app->fileuploader_backup ) {
                    $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
                    $cache = $cache_dir . md5( $file_path ) . ".vtt";
                    $app->fmgr->copy( $file_path, $cache );
                }
                if ( $chapter ) {
                    $app->log( ['message' => $message, 'category' => 'videocaptions',
                                'model' => 'upload_file', 'object_id' => $id,
                                'metadata' => $metadata, 'level' => 'info'] );
                    return $file_url;
                }
                if ( !$chapter && $app->video_captions_compat_postfix ) {
                    $postfix = $app->video_captions_compat_postfix;
                    $file_path = preg_replace( "/\.vtt$/", $postfix . '.vtt', $file_path );
                    $ruby_url = $url->url;
                    $ruby_url = preg_replace( "/\.$extension$/", $postfix . '.vtt', $ruby_url );
                    if ( $app->fmgr->exists( $file_path ) ) {
                        $app->fmgr->copy( $file_path, "{$file_path}.backup" );
                    }
                    $app->fmgr->put( $file_path, $vtt );
                    $caption_url = $app->db->model( 'urlinfo' )->get_by_key(
                    ['class' => 'plugin', 'object_id' => $id, 'model' => 'upload_file', 'key' => 'vtt-ruby', 'delete_flag' => [0, 1] ] );
                    $caption_url->mime_type( 'text/vtt' );
                    $caption_url->workspace_id( $url->workspace_id );
                    $caption_url->publish_file( 1 );
                    $caption_url->was_published( 1 );
                    $caption_url->is_published( 1 );
                    $caption_url->md5( md5_file( $file_path ) );
                    $caption_url->filemtime( filemtime( $file_path ) );
                    $caption_url->url( $ruby_url );
                    $metadata['ruby_url'] = $ruby_url;
                    $caption_url->file_path( $file_path );
                    PTUtil::set_url_path( $caption_url );
                    $caption_url->save();
                    if ( $app->fileuploader_backup ) {
                        $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
                        $cache = $cache_dir . md5( $file_path ) . ".vtt";
                        $app->fmgr->copy( $file_path, $cache );
                    }
                }
            }
        }
        if ( $audioTrack ) {
            $ffmpeg = $app->simplifiedjapanese_ffmpeg_path;
            $out = null;
            $file_path = $upload_file->file_path;
            $upload_dir = $app->upload_dir();
            $app->fmgr->copy( $file_path, "{$file_path}.backup" );
            if ( $audioTrack == 3 || $audioTrack == 4 ) {
                $out = $this->audio_track( $app, $file_path, $array, $SimplifiedJapanese, $workspace_id, $upload_dir, $audioTrack );
                if ( $audioTrack == 3 ) {
                    $message = $this->translate( "User %s created an audio description for the video '%s(ID:%s)' and replaced the audio track.", $params );
                } else {
                    $message = $this->translate( "User %s created an audio description for the video '%s(ID:%s)' and synthesized the audio track.", $params );
                }
            } else if ( $audioTrack == 2 ) {
                $out = $upload_dir . DS . 'movie-remove-audio.' . $extension;
                $cmd = "{$ffmpeg} -i {$file_path} -vcodec copy -an {$out}";
                exec( $cmd, $output, $return_var );
                $message = $this->translate( "User %s has deleted the audio track of the video '%s(ID:%s)'.", $params );
            } else if ( $audioTrack == 1 ) {
                $backup_dir = $app->support_dir . DS . 'backup' . DS . $this->id . DS;
                $backup = $backup_dir . md5( $file_path ) . ".aac";
                $message = $this->translate( "User %s has restored the audio track of the video '%s(ID:%s)'.", $params );
                if ( $app->fmgr->exists( $backup ) ) {
                    $out = $upload_dir . DS . 'movie-restore-audio.' . $extension;
                    $cmd = "{$ffmpeg} -i {$file_path} -i {$backup} -c:v copy -c:a aac -strict experimental -map 0:v:0 -map 1:a:0 {$out}";
                    exec( $cmd, $output, $return_var );
                }
            }
            $atime = fileatime( $file_path );
            $mtime = filemtime( $file_path );
            $app->fmgr->rename( $out, $file_path );
            touch( $file_path, $mtime, $atime );
            if ( $app->fileuploader_backup ) {
                $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
                $cache = $cache_dir . md5( $file_path ) . ".{$extension}";
                $app->fmgr->copy( $file_path, $cache );
            }
            if ( $audio_processing ) {
                $metadata = ['url' => $url->url ];
                $app->log( ['message' => $message, 'category' => 'videocaptions',
                            'model' => 'upload_file', 'object_id' => $id,
                            'metadata' => $metadata, 'level' => 'info'] );
                $result = ['result'=> $url->url ];
                header( 'Content-type: application/json' );
                echo json_encode( $result );
                exit();
            }
        }
        // $file_url = $app->ctx->modifier_encode_url_basename( $file_url, 1 );
        // $ruby_url = $app->ctx->modifier_encode_url_basename( $ruby_url, 1 );
        // $chapter_url = $app->ctx->modifier_encode_url_basename( $chapter_url, 1 );
        if ( $message ) {
            $app->log( ['message' => $message, 'category' => 'videocaptions',
                        'model' => 'upload_file', 'object_id' => $id,
                        'metadata' => $metadata, 'level' => 'info'] );
        }
        $result = ['result'=> $file_url, 'ruby'=> $ruby_url, 'chapter' => $chapter_url, 'chapter_json' => $this->json_path ];
        header( 'Content-type: application/json' );
        echo json_encode( $result );
        exit();
    }

    function video_caption_preview_vtt ( $app ) {
        if (! $app->can_do( 'upload_file', 'create' ) ) {
            return $app->json_error( 'Permission denied.' );
        }
        if ( $app->request_method == 'POST' ) {
            $preview_url = '';
            $chapter_url = '';
            $preview = $this->video_caption_generate_vtt( $app, true );
            if ( $preview ) {
                $name = md5( $preview );
                $session = $app->db->model( 'session' )->get_by_key( ['name' => $name,
                                            'key' => 'VTT', 'kind' => 'VC', 'user_id' => $app->user()->id ] );
                $session->data( $preview );
                $session->save();
                $preview_url = $app->admin_url . '?__mode=video_caption_preview_vtt&token=' . $name;
            }
            $chapter = $this->video_caption_generate_vtt( $app, true, true );
            if ( $chapter ) {
                $name = md5( $chapter );
                $session = $app->db->model( 'session' )->get_by_key( ['name' => $name,
                                            'key' => 'VTT', 'kind' => 'VC', 'user_id' => $app->user()->id ] );
                $session->data( $chapter );
                $session->save();
                $chapter_url = $app->admin_url . '?__mode=video_caption_preview_vtt&token=' . $name;
            }
            $result = ['preview_url'=> ['captions' => $preview_url, 'chapter' => $chapter_url ] ];
            header( 'Content-type: application/json' );
            echo json_encode( $result );
            exit();
        } else {
            $name = $app->param( 'token' );
            $session = $app->db->model( 'session' )->get_by_key( ['name' => $name,
                                        'key' => 'VTT', 'kind' => 'VC', 'user_id' => $app->user()->id ] );
            if ( $session->id ) {
                header( 'Content-type: text/vtt; charset=UTF-8' );
                echo $session->data;
                $session->remove();
            }
        }
    }

    function mb_wordwrap ( $text, $width = 53, $break = PHP_EOL ) {
        if ( strpos( $text, '<' ) !== false ) {
            $plain = $text;
            $plain = preg_replace( '/<rp[^>]*>.*?<\/rp>/si', '', $plain );
            $plain = preg_replace( '/<\/{0,1}ruby[^>]*>/si', '', $plain );
            $plain = preg_replace( '/<rt[^>]*>.*?<\/rt>/si', '', $plain );
            $plain = strip_tags( $plain );
            $len = mb_strwidth( $plain );
            if ( $len <= $width ) {
                return $text;
            }
        }
        $orig = $width;
        $w = mb_strwidth( $text );
        $array = [];
        if( $w < $width ){
            return $text;
        }
        $cnt = 2;
        $max = $w + 1;
        while ( $max > $width ) {
            $max = $w / $cnt;
            $cnt++;
        }
        $cnt--;
        if (! $cnt ) {
            $cnt = 1;
        }
        $width = $w / $cnt;
        $width = (int) $width;
        $chars = self::mb_str_split( $text );
        $tmp = '';
        foreach ( $chars as $char ) {
            $tmp .= $char;
            if ( mb_strwidth( $tmp ) >= $width ) {
                $array[] = $tmp;
                $tmp = '';
            }
        }
        $array[] = $tmp;
        foreach ( $array as $idx => $line ) {
            $line = trim( $line );
            if (! $line ) {
                unset( $array[ $idx ] );
                continue;
            }
            if ( isset( $array[ $idx + 1 ] ) ) {
                $curr = mb_strwidth( $line );
                $next = mb_strwidth( $array[ $idx + 1 ] );
                $curr += $next;
                if ( $curr <= $orig ) {
                    $array[ $idx ] = $line . trim( $array[ $idx + 1 ] );
                    unset( $array[ $idx + 1 ] );
                    continue;
                }
            }
        }
        $text = implode( $break, $array );
        $quoted = preg_quote( $break, '/' );
        $text = preg_replace( "/{$quoted}\s*\)/", ')' . $break, $text );
        $text = preg_replace( "/\(\s*{$quoted}/", $break . '(', $text );
        return $text;
    }

    public static function mb_str_split( $string ) {
        if ( function_exists( 'mb_str_split' ) ) { // PHP7.4 or later
            return mb_str_split( $string );
        }
        $results = [];
        $length = mb_strlen( $string );
        for ( $offset = 0; $offset < $length; $offset++ ) {
            $results[] = mb_substr( $string, $offset, 1 );
        }
        return $results;
    }

    function video_caption_determine ( $app ) {
        if (! $app->can_do( 'upload_file', 'create' ) || $app->request_method !== 'POST' ) {
            return $app->json_error( 'Permission denied.' );
        }
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $kind = $json['kind'];
        $app->validate_magic( true );
        $id = (int) $app->param( 'id' );
        $obj = $app->db->model( 'upload_file' )->load( $id );
        if (! $obj ) {
            return $app->json_error( $this->translate( 'An error occurred while determine captioned video.' ) );
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['model' => 'upload_file', 'object_id' => $id, 'url' => $obj->url ] );
        $file_path = $url->file_path;
        $extension = PTUtil::get_extension( $file_path );
        $postfix = $app->video_captions_postfix;
        if ( $kind == 'vtt' ) {
            $outFile = preg_replace( "/\.$extension$/", '.vtt', $file_path );
        } else {
            $outFile = preg_replace( "/\.$extension$/", '', $file_path );
            $outFile .= $postfix . ".$extension";
        }
        if ( $app->fmgr->exists( "{$outFile}.backup" ) ) {
            $app->fmgr->unlink( "{$outFile}.backup" );
        }
        if ( $postfix = $app->video_captions_chapters_postfix ) {
            $ext = 'vtt';
            $outFile = preg_replace( "/\.{$extension}/", $postfix . ".{$ext}", $file_path );
            if ( $app->fmgr->exists( "{$outFile}.backup" ) ) {
                $app->fmgr->unlink( "{$outFile}.backup" );
            }
            $ext = 'json';
            $outFile = preg_replace( "/\.{$extension}/", $postfix . ".{$ext}", $file_path );
            if ( $app->fmgr->exists( "{$outFile}.backup" ) ) {
                $json = json_decode( $app->fmgr->get( "{$outFile}.backup" ), true );
                $site_path = $obj->workspace_id ? $obj->workspace->site_path : $app->site_path;
                foreach ( $json as $data ) {
                    $thumbnail = $data['thumbnail'] ?? null;
                    if ( $thumbnail ) {
                        $thumbnail = $site_path . $thumbnail;
                        if ( $app->fmgr->exists( "{$thumbnail}.backup" ) ) {
                            $app->fmgr->unlink( "{$thumbnail}.backup" );
                        }
                    }
                }
                $app->fmgr->unlink( "{$outFile}.backup" );
            }
        }
        if ( $kind == 'vtt' ) {
            if ( $postfix = $app->video_captions_compat_postfix ) {
                $outFile = preg_replace( '/\.vtt/', $postfix . '.vtt', $outFile );
                $app->fmgr->unlink( "{$outFile}.backup" );
            }
        }
        $result = ['result'=> 'Success' ];
        header( 'Content-type: application/json' );
        echo json_encode( $result );
        exit();
    }

    function video_caption_discard ( $app ) {
        if (! $app->can_do( 'upload_file', 'create' ) || $app->request_method !== 'POST' ) {
            return $app->json_error( 'Permission denied.' );
        }
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $kind = $json['kind'];
        $id = (int) $app->param( 'id' );
        $obj = $app->db->model( 'upload_file' )->load( $id );
        if (! $obj ) {
            return $app->json_error( $this->translate( 'An error occurred while canceling the process.' ) );
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['model' => 'upload_file', 'object_id' => $id, 'url' => $obj->url ] );
        if (! $url->id ) {
            $app->json_error( $this->translate( 'An error occurred while canceling the process.' ) );
        }
        $file_path = $url->file_path;
        if ( $app->fmgr->exists( "{$file_path}.backup" ) ) {
            $app->fmgr->rename( "{$file_path}.backup", $file_path );
        }
        $extension = PTUtil::get_extension( $file_path );
        $metadata = ['url' => $url->url, 'kind' => $kind ];
        $params = [ $app->user()->nickname, $obj->label, $obj->id ];
        $message = $this->translate( "User %s has canceled added a caption to the video '%s(ID:%s)'.", $params );
        if ( $kind == 'vtt' ) {
            $message = $this->translate( "User %s has canceled added a WebVTT file to the video '%s(ID:%s)'.", $params );
            $outFile = preg_replace( "/\.{$extension}$/", '.vtt', $file_path );
        } else {
            $postfix = $app->video_captions_postfix;
            $outFile = preg_replace( "/\.{$extension}$/", '', $file_path );
            $outFile .= $postfix . ".{$extension}";
        }
        if (! $app->fmgr->exists( "{$outFile}.backup" ) ) {
            $url2 = $app->db->model( 'urlinfo' )->get_by_key(
                  ['object_id' => $id, 'model' => 'upload_file', 'file_path' => $outFile ] );
            if ( $url2->id ) {
                $url2->remove();
            } else {
                $app->fmgr->unlink( $outFile );
            }
        } else {
            $app->fmgr->rename( "{$outFile}.backup", $outFile );
        }
        if ( $postfix = $app->video_captions_chapters_postfix ) {
            $ext = 'vtt';
            $outFile = preg_replace( "/\.[^\.]*$/", $postfix . ".{$ext}", $url->file_path );
            $chapter_url = preg_replace( "/\.[^\.*]*$/", $postfix . ".{$ext}", $url->url );
            $metadata['chapter_url'] = $chapter_url;
            if ( $app->fmgr->exists( "{$outFile}.backup" ) ) {
                $app->fmgr->rename( "{$outFile}.backup", $outFile );
            } else {
                $url = $app->db->model( 'urlinfo' )->get_by_key(
                      ['object_id' => $id, 'model' => 'upload_file', 'file_path' => $outFile ] );
                if ( $url->id ) {
                    $url->remove();
                } else {
                    $app->fmgr->unlink( $outFile );
                }
            }
            $ext = 'json';
            $outFile = preg_replace( "/\.[^\.]*$/", $postfix . ".{$ext}", $url->file_path );
            $chapter_url = preg_replace( "/\.[^\.*]*$/", $postfix . ".{$ext}", $url->url );
            $metadata['chapter_url'] = $chapter_url;
            if ( $app->fmgr->exists( "{$outFile}.backup" ) ) {
                $app->fmgr->rename( "{$outFile}.backup", $outFile );
                if ( $ext === 'json' ) {
                    $json = json_decode( $app->fmgr->get( $outFile ), true );
                    $site_path = $obj->workspace_id ? $obj->workspace->site_path : $app->site_path;
                    foreach ( $json as $data ) {
                        $thumbnail = $data['thumbnail'] ?? null;
                        if ( $thumbnail ) {
                            $thumbnail = $site_path . $thumbnail;
                            if ( $app->fmgr->exists( "{$thumbnail}.backup" ) ) {
                                $app->fmgr->rename( "{$thumbnail}.backup", $thumbnail );
                            }
                        }
                    }
                }
            } else {
                $url = $app->db->model( 'urlinfo' )->get_by_key(
                      ['object_id' => $id, 'model' => 'upload_file', 'file_path' => $outFile ] );
                if ( $url->id ) {
                    $url->remove();
                } else {
                    $app->fmgr->unlink( $outFile );
                }
            }
            if ( $ext === 'json' ) {
                $message = $this->translate( "User %s has canceled added a WebVTT(JSON) file to the video '%s(ID:%s)'.", $params );
            }
        }
        if ( $kind == 'vtt' ) {
            if ( $postfix = $app->video_captions_compat_postfix ) {
                $outFile = preg_replace( '/\.vtt/', $postfix . '.vtt', $outFile );
                $ruby_url = preg_replace( '/\.vtt/', $postfix . '.vtt', $url->url );
                $metadata['ruby_url'] = $ruby_url;
                if ( $app->fmgr->exists( "{$outFile}.backup" ) ) {
                    $app->fmgr->rename( "{$outFile}.backup", $outFile );
                } else {
                    $url = $app->db->model( 'urlinfo' )->get_by_key(
                          ['object_id' => $id, 'model' => 'upload_file', 'file_path' => $outFile ] );
                    if ( $url->id ) {
                        $url->remove();
                    } else {
                        $app->fmgr->unlink( $outFile );
                    }
                }
            }
        }
        $app->log( ['message' => $message, 'category' => 'videocaptions',
                    'model' => 'upload_file', 'object_id' => $id,
                    'metadata' => $metadata, 'level' => 'info'] );
        $result = ['result'=> 'Success' ];
        header( 'Content-type: application/json' );
        echo json_encode( $result );
        exit();
    }

    function video_caption_temp_save ( $app ) {
        return $this->video_caption_add_subtitles( $app, true, false );
    }

    function video_caption_temp_save_text ( $app ) {
        return $this->video_caption_add_subtitles( $app, true, true );
    }

    function pre_save_upload_file ( $cb, $app, $obj, $original ) {
        if ( $id = $obj->id ) {
            $text = $app->param( 'video-captions' );
            if ( $text ) {
                $text = preg_replace( "/\r\n|\r/", PHP_EOL , $text );
                $lines = explode( PHP_EOL, $text );
                $data = [];
                foreach ( $lines as $line ) {
                    if (! $line ) {
                        continue;
                    }
                    $data[] = explode( "\t", $line );
                }
                // $data = json_decode( $json['text'], true );
                $id = (int) $app->param( 'id' );
                $meta = $app->db->model( 'meta' )->get_by_key( ['object_id' => $id,
                                                                'model' => 'upload_file',
                                                                'kind' => 'metadata',
                                                                'key' => 'video_caption'] );
                $meta->text( json_encode( $data ) );
                $meta->save();
            }
        }
        return true;
    }

    function post_save_upload_file ( $cb, $app, &$obj, $original, $clone_obj = null ) {
        $file_magic = $app->param( 'upload-file-magic' );
        $meta = $app->db->model( 'meta' )->get_by_key(
            ['model' => $obj->_model, 'object_id' => $obj->id,
             'kind' => 'metadata', 'key' => 'file_path'] );
        if (! $meta->id ) {
            $error = null;
            $data = PTUtil::get_upload_info( $app, $obj->file_path, $error );
            $json = json_encode( $data['metadata'] );
            $meta->text( $json );
            $meta->save();
            $url = $app->db->model( 'urlinfo' )->get_by_key( ['file_path' => $obj->file_path, 'model' => 'upload_file'] );
            if ( $url->id ) {
                $url->meta_id( $meta->id );
                $url->save();
            }
        }
        $create_tumb = false;
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        $ffprobe = $app->simplifiedjapanese_ffprobe_path;
        if ( $app->simplifiedjapanese_ffmpeg_path ) {
            if ( is_object( $original ) && $obj->thumbnail_sec != $original->thumbnail_sec ) {
                $create_tumb = true;
            } else if ( $file_magic && $obj->class === 'video' && is_object( $original ) ) {
                $create_tumb = true;
            }
            if ( ( $obj->class === 'video' || $obj->class === 'audio' ) && !$obj->duration ) {
                $input = escapeshellarg( $obj->file_path );
                $cmd = $ffprobe . ' ' . $input . ' -hide_banner -show_entries format=duration -show_streams';
                $result = shell_exec( $cmd );
                if ( $result !== false ) {
                    if ( preg_match( '/duration=([0-9].*)\n/i', $result, $matchs ) ) {
                        $duration = trim( $matchs[1] );
                        $duration = (float) $duration;
                        $obj->duration( $duration );
                        $this->duration = $duration;
                        if ( $obj->thumbnail_sec > $duration ) {
                            $thumbnail_sec = (int) $duration;
                            $thumbnail_sec -= 1;
                            if ( $thumbnail_sec < 0 ) {
                                $thumbnail_sec = 0;
                            }
                            $obj->thumbnail_sec( $thumbnail_sec );
                        }
                    }
                    if ( $obj->class === 'video' ) {
                        if ( preg_match( '/^width=(.*)$/mi', $result, $matchs ) ) {
                            $width = $matchs[1];
                            $obj->image_width( $width );
                        }
                        if ( preg_match( '/^height=(.*)$/mi', $result, $matchs ) ) {
                            $height = $matchs[1];
                            $obj->image_height( $height );
                        }
                    }
                    $obj->save();
                }
            }
        }
        if ( $create_tumb ) {
            if ( $meta->id ) {
                $starttime = (float) $obj->thumbnail_sec;
                $args = ['id' => $obj->id, 'extension' => 'png', 'width' => 128, 'starttime' => $starttime, 'square' => true];
                $thumbnail_s = $this->hdlr_videothumbnail( $args, $app->ctx );
                $thumbnail_urls = [];
                if ( $thumbnail_s ) {
                    if ( isset( $args['urlinfo'] ) ) {
                        $thumbnail_urls = $args['urlinfo'];
                    }
                    $args = ['id' => $obj->id, 'extension' => 'png', 'width' => 256, 'starttime' => $starttime, 'square' => false];
                    $thumbnail = $this->hdlr_videothumbnail( $args, $app->ctx );
                    if ( $thumbnail ) {
                        if ( isset( $args['urlinfo'] ) ) {
                            $thumbnail_urls = array_merge( $thumbnail_urls, $args['urlinfo'] );
                        }
                    }
                }
                if (!empty( $thumbnail_urls ) ) {
                    $current = time();
                    if ( count( $thumbnail_urls ) === 4 ) {
                        array_shift( $thumbnail_urls );
                    }
                    foreach ( $thumbnail_urls as $thumbnail_url ) {
                        if ( $thumbnail_url->key === 'thumbnail' && $thumbnail_url->meta_id ) {
                            $url_meta = $app->db->model( 'meta' )->load( (int) $thumbnail_url->meta_id );
                            $data = $url_meta->blob;
                            $colName = strpos( $thumbnail_url->url, '-square-' ) !== false ? 'metadata' : 'data';
                            $meta->$colName( $data );
                        }
                        $past = $thumbnail_url->filemtime - $current;
                        if ( $past < 10 ) {
                            // Do not sync by AWS_S3.
                            $file_path = $thumbnail_url->file_path;
                            $thumbnail_url->remove( true );
                            unset( $app->fmgr->update_paths[ $file_path ] );
                        }
                    }
                    $meta->save();
                }
            }
            if ( $clone_obj === true ) {
                return true;
            }
        }
        $ts_files = [];
        $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
        $workspace_id = (int) $obj->workspace_id;
        $orig_path = $obj->file_path;
        $ds = DS;
        $site_path = $obj->workspace_id ? $obj->workspace->site_path : $app->site_path;
        $quoted = preg_quote( $site_path, '/' );
        $site_url = $obj->workspace_id ? $obj->workspace->site_url : $app->site_url;
        $trimmed_url = rtrim( $site_url, '/' );
        $create_hls = $app->param( 'create-hls' );
        $extract = $app->param( 'extract-zip' );
        $hls_created = false;
        $existing = false;
        if ( $create_hls && ( $obj->mime_type == 'video/mp4' || $obj->mime_type == 'audio/mpeg' ) && $app->simplifiedjapanese_ffmpeg_path ) {
            $ffmpeg = $app->simplifiedjapanese_ffmpeg_path;
            $file_ext = $obj->file_ext;
            $basename = basename( $obj->file_path, ".{$file_ext}" );
            $error = false;
            if ( $app->video_captions_hls_mkdir ) {
                $dirname = dirname( $obj->file_path ) . $ds . $basename;
                // $vtt = "{$dirname}.vtt";
                if ( $app->fmgr->exists( $dirname ) && count( glob( $dirname . "/*" ) ) != 0 ) {
                    $existing = true;
                }
                $hls_file_path = dirname( $obj->file_path ) . $ds . $basename . $ds . "{$basename}.m3u8";
                $hls_url = dirname( $obj->url ) . $ds . $basename . $ds . "{$basename}.m3u8";
                $hls_file_path = dirname( $obj->file_path ) . $ds . $basename . $ds . "{$basename}.m3u8";
                $hls_relative_path = dirname( $obj->relative_path ) . $ds . $basename . $ds . "{$basename}.m3u8";
                $hls_extra_path = $obj->extra_path . $ds . $basename;
            } else {
                $dirname = dirname( $obj->file_path );
                // $vtt = "{$dirname}{$ds}{$basename}.vtt";
                $hls_file_path = "{$dirname}{$ds}{$basename}.m3u8";
                if ( $app->fmgr->exists( $hls_file_path ) ) {
                    $existing = true;
                }
                $hls_url = dirname( $obj->url ) . $ds . "{$basename}.m3u8";
                $hls_file_path = dirname( $obj->file_path ) . $ds . "{$basename}.m3u8";
                $hls_relative_path = dirname( $obj->relative_path ) . $ds . "{$basename}.m3u8";
                $hls_extra_path = $obj->extra_path;
            }
            $session = null;
            if (! $error ) {
                if (! $app->video_captions_hls_queue && $app->video_captions_hls_scales && $original !== true ) {
                    $existing_proc = $app->db->model( 'session' )->count( ['key' => 'CONVERT_HLS', 'kind' => 'VC'] );
                    $bake_parallel = $app->video_captions_hls_parallel ? $app->video_captions_hls_parallel : 1;
                    if ( $existing_proc && $existing_proc >= $bake_parallel ) {
                        $app->video_captions_hls_queue = true;
                    } else {
                        $screen_id = $app->current_magic;
                        $session = $app->db->model( 'session' )->new( ['name' => "{$screen_id}-convert-hls",
                                                    'object_id' => $obj->id, 'workspace_id' => $workspace_id,
                                                    'key' => 'CONVERT_HLS', 'kind' => 'VC',
                                                    'user_id' => $app->user()->id ] );
                        $session->start( $app->request_time );
                        $session->expires( $app->request_time + $app->perm_expires );
                        $session->save();
                    }
                }
                if ( $app->video_captions_hls_queue && $original !== true ) {
                    $ts_job = $app->db->model( 'ts_job' )->get_by_key( ['name' => 'Convert to HLS',
                                                                        'class' => $obj->id, 'component' => 'VideoCaptions'] );
                    $ts_job->workspace_id( $workspace_id );
                    $now = date( 'Y-m-d H:i:s' );
                    $ts_job->start_on( $now );
                    $app->set_default( $ts_job );
                    if ( $ts_job->has_column( 'status', true ) ) {
                        $ts_job->status( 2 );
                    }
                    $queue = null;
                    if ( $ts_job->id ) {
                        $queue = $app->db->model( 'queue' )->get_by_key( ['ts_job_id' => $ts_job->id ] );
                    }
                    $ts_job->max_per_once( $app->video_captions_job_max_per );
                    $ts_job->label( $obj->label );
                    $ts_job->save();
                    $queue = $queue && $queue->id ? $queue : $app->db->model( 'queue' )->__new();
                    $queue->key( 'Convert to HLS' );
                    $queue->component( 'VideoCaptions' );
                    $queue->method( 'queue_convert_to_hls' );
                    $params = $app->param();
                    $queue->data( json_encode( $params ) );
                    $queue->interval( 999999 );
                    $queue->ts_job_id( $ts_job->id );
                    $queue->model( 'upload_file' );
                    $queue->object_id( $obj->id );
                    $queue->workspace_id( $workspace_id );
                    $queue->max_retries( 2 );
                    $app->set_default( $queue );
                    $queue->save();
                    $id = $obj->id;
                    $params = "?__mode=view&_type=edit&_model=upload_file&id={$id}&saved=1&create_hls_queue=1";
                    $params .= $workspace_id ? "&workspace_id={$workspace_id}" : '';
                    return $app->redirect( $this->admin_url . $params );
                }
                ini_set( 'memory_limit', -1 );
                ini_set( 'max_execution_time', 14400 );
                ignore_user_abort( true );
                $app->fmgr->mkpath( $dirname );
                $input = escapeshellarg( $obj->file_path );
                $app_id = $app->id;
                $app->id = 'Prorotype';
                $temp_dir = $app->temp_dir;
                if ( $app->video_captions_work_dir ) {
                    $app->temp_dir = $app->video_captions_work_dir;
                }
                $upload_dir = $app->upload_dir();
                $app->temp_dir = $temp_dir;
                $app->id = $app_id;
                chdir( $upload_dir );
                $hls_time = $app->video_captions_hls_time ? (int) $app->video_captions_hls_time : 10;
                if (! $hls_time || $hls_time < 1 ) {
                    $hls_time = 10;
                }
                $gframe = $app->video_captions_framerate * $hls_time;
                $gframe = (int) $gframe;
                $outname = escapeshellarg( "{$basename}.m3u8" );
                $hls_playlist_type = $app->video_captions_hls_playlist_type ? (int) $app->video_captions_hls_playlist_type : 2;
                if ( $hls_playlist_type > 2 || $hls_playlist_type < 0 ) {
                    $hls_playlist_type = 2;
                }
                $start_time = time();
                if ( $obj->mime_type == 'audio/mpeg' ) {
                    $cmd = "{$ffmpeg} -i {$input} -f hls -hls_playlist_type {$hls_playlist_type} -hls_list_size 0 ";
                    $cmd .= "-master_pl_publish_rate 4 -master_pl_name {$outname} -segment_time {$hls_time} -g {$gframe} ";
                    $segment_name = escapeshellarg( "{$basename}-%v.m3u8" );
                    $cmd .= $segment_name;
                    exec( $cmd, $output, $return_var );
                    if ( $return_var !== 0 ) {
                        if ( $session ) {
                            $session->remove();
                        }
                        chdir( $app->pt_dir );
                        if ( $app->id === 'Worker' ) {
                            return false;
                        } else {
                            return $app->error( $this->translate( 'Conversion to HLS failed because the execution command failed.' ) );
                        }
                        $error = 2;
                    }
                    if (! $error ) {
                        foreach ( glob("*") as $filename ) {
                            $rename_to = "{$dirname}{$ds}{$filename}";
                            $rename_from = "{$upload_dir}{$ds}{$filename}";
                            $app->fmgr->rename( $rename_from, $rename_to );
                        }
                    }
                } else {
                    $codec = $app->video_captions_codec ? $app->video_captions_codec : 'libx264';
                    $cmd = $ffprobe . ' ' . $input . ' -hide_banner -show_entries format=duration -show_streams';
                    $result = shell_exec( $cmd );
                    if ( $result === false ) {
                        if ( $session ) {
                            $session->remove();
                        }
                        chdir( $app->pt_dir );
                        if ( $app->id === 'Worker' ) {
                            return false;
                        } else {
                            return $app->error( $this->translate( 'Conversion to HLS failed because the execution command failed.' ) );
                        }
                    }
                    $has_audio = false;
                    if ( preg_match_all( '/^codec_type=(.*)$/mi', $result, $matchs ) ) {
                        $has_audio = in_array( 'audio', $matchs[1] );
                    }
                    $width = null;
                    if ( preg_match( '/^width=(.*)$/mi', $result, $matchs ) ) {
                        $width = $matchs[1];
                    }
                    $height = null;
                    if ( preg_match( '/^height=(.*)$/mi', $result, $matchs ) ) {
                        $height = $matchs[1];
                    }
                    $scales = $app->video_captions_hls_scales;
                    $final = null;
                    $playlist = false;
                    if ( $scales ) {
                        $scales = explode( ',', $scales );
                        $filters = [];
                        $stream_maps = [];
                        $maps = '';
                        // For not contains audio track.
                        $filters_a = [];
                        $stream_maps_a = [];
                        $maps_a = '';
                        $i = 0;
                        foreach ( $scales as $idx => $scale ) {
                            // 1080xauto,480xauto,240xauto
                            list( $scale_w, $scale_h ) = explode( 'x', $scale );
                            if ( $width && $scale_w !== 'auto' && $width < $scale_w ) {
                                continue;
                            }
                            if ( $height && $scale_h !== 'auto' && $height < $scale_h ) {
                                continue;
                            }
                            if ( strpos( $scale, 'auto' ) !== false && strpos( $scale, 'x' ) !== false ) {
                                $scale = str_replace( 'auto', '-2', $scale );
                                $scale = str_replace( 'x', ':', $scale );
                            }
                            $filter = "-filter:v:{$i} scale={$scale} -c:v:{$i} {$codec} ";
                            $filter_a = "-filter:v:{$i} scale={$scale} -c:v:{$i} {$codec} ";
                            $stream_map = "v:{$i}";
                            $stream_map_a = "v:{$i}";
                            if ( $has_audio ) {
                                $filter .= "-c:a:{$i} copy ";
                                $stream_map .= ",a:{$i}";
                            }
                            $filter_a .= "-c:a:{$i} copy ";
                            $stream_map_a .= ",a:{$i}";
                            $filters[] = $filter;
                            $stream_maps[] = $stream_map;
                            $filters_a[] = $filter_a;
                            $stream_maps_a[] = $stream_map_a;
                            $maps .= " -map 0:v ";
                            $maps_a .= " -map 0:v ";
                            if ( $has_audio ) {
                                $maps .= " -map 0:a ";
                            }
                            $maps_a .= " -map 0:a ";
                            $i++;
                        }
                        if ( $i ) {
                            $cmd = "{$ffmpeg} -i {$input} " . implode( ' ', $filters ) . $maps . " -f hls -hls_playlist_type {$hls_playlist_type} -hls_list_size 0 ";
                            $final = "{$ffmpeg} -i {$input} " . implode( ' ', $filters_a ) . $maps_a . " -f hls -hls_playlist_type {$hls_playlist_type} -hls_list_size 0 ";
                            $cmd .= " -master_pl_publish_rate 4 -master_pl_name {$outname} -segment_time {$hls_time} -g {$gframe} -var_stream_map \"" . implode( ' ', $stream_maps ) . '" ';
                            $final .= " -master_pl_publish_rate 4 -master_pl_name {$outname} -segment_time {$hls_time} -g {$gframe} -var_stream_map \"" . implode( ' ', $stream_maps_a ) . '" ';
                            $segment_name = escapeshellarg( "{$basename}-%v.m3u8" );
                            $cmd .= $segment_name;
                            $final .= $segment_name;
                            $playlist = true;
                        } else {
                            $copy_audio = $has_audio ? '-c:a copy' : '';
                            $cmd = "{$ffmpeg} -i {$input} -c:v {$codec} {$copy_audio} -f hls -segment_time {$hls_time} -g {$gframe} -hls_playlist_type {$hls_playlist_type} {$outname}";
                        }
                    } else {
                        $copy_audio = $has_audio ? '-c:a copy' : '';
                        $cmd = "{$ffmpeg} -i {$input} -c:v {$codec} {$copy_audio} -f hls -segment_time {$hls_time} -g {$gframe} -hls_playlist_type {$hls_playlist_type} {$outname}";
                    }
                    exec( $cmd, $output, $return_var );
                    if ( $return_var !== 0 ) {
                        if ( $session ) {
                            $session->remove();
                        }
                        chdir( $app->pt_dir );
                        $message = $this->translate( 'Conversion %s to HLS failed because the execution command failed.', $obj->file_name );
                        if ( $app->id === 'Worker' ) {
                            $this->log( $message, 'error', [], $workspace_id, $app );
                            return false;
                        } else {
                            return $app->error( $message );
                        }
                        $error = 2;
                    }
                    if (! $error ) {
                        foreach ( glob("*") as $filename ) {
                            $rename_to = "{$dirname}{$ds}{$filename}";
                            $rename_from = "{$upload_dir}{$ds}{$filename}";
                            $app->fmgr->rename( $rename_from, $rename_to );
                        }
                        $data = $app->fmgr->get( $hls_file_path );
                        if ( $playlist && strpos( $data, '#EXT-X-STREAM-INF:' ) === false ) {
                            // Incomplete master playlist generated with no audio tracks.
                            $tmp_dir = $app->upload_dir();
                            chdir( $tmp_dir );
                            // Regenerate the master playlist by extracting a 3-second video with an audio track.
                            $short = escapeshellarg( $tmp_dir . DS . 'short.mp4' );
                            $merge = escapeshellarg( $tmp_dir . DS . 'merge.mp4' );
                            $audio = escapeshellarg( $this->path(). DS . 'sample' . DS . 'audio.mp3' );
                            $final = preg_replace( "/(^.*?\-i\s+?)'.*?'/", '$1' . $merge , $final );
                            $cmd = "{$ffmpeg} -ss 00:00:00 -i {$input} -t 3 -c copy {$short}";
                            exec( $cmd, $output, $return_var );
                            $cmd = "{$ffmpeg} -i {$short} -i {$audio} -c:v copy -c:a aac -strict experimental -map 0:v:0 -map 1:a:0 {$merge}";
                            exec( $cmd, $output, $return_var );
                            exec( $final, $output, $return_var );
                            $app->fmgr->rename( $tmp_dir . DS . basename( $hls_file_path ), $hls_file_path );
                        }
                        if ( $playlist ) {
                            // Adjust the bandwidth of each.
                            $lines = explode( PHP_EOL, $app->fmgr->get( $hls_file_path ) );
                            $bandwidth_map = [];
                            foreach ( $lines as $idx => $line ) {
                                if ( strpos( $line, '#EXT-X-STREAM-INF:' ) === 0 ) {
                                    if ( preg_match( '/BANDWIDTH=([^,]*)/', $line, $match1 ) ) {
                                        if ( preg_match( '/RESOLUTION=([^,]*)/', $line, $match2 ) ) {
                                            $bandwidth_map[ $match2[1] ] = $match1[1];
                                        }
                                    }
                                }
                            }
                            if ( count( $bandwidth_map ) > 1 ) {
                                $bandwidths = array_unique( array_values( $bandwidth_map ) );
                                if ( count( $bandwidths ) === 1 ) {
                                    $bandwidth = (int) $bandwidths[0];
                                    $pixels = [];
                                    foreach ( $lines as $idx => $line ) {
                                        if ( strpos( $line, '#EXT-X-STREAM-INF:' ) === 0 ) {
                                            if ( preg_match( '/BANDWIDTH=([^,]*)/', $line, $match1 ) ) {
                                                if ( preg_match( '/RESOLUTION=([^,]*)/', $line, $match2 ) ) {
                                                    $match = true;
                                                    list( $width, $height ) = explode( 'x', $match2[1] );
                                                    $pixels[ $idx ] = $width * $height;
                                                }
                                            }
                                        }
                                    }
                                    asort( $pixels );
                                    $min = array_shift( $pixels );
                                    $mast_playlist = '';
                                    foreach ( $lines as $idx => $line ) {
                                        if ( strpos( $line, '#EXT-X-STREAM-INF:' ) === 0 ) {
                                            if ( preg_match( '/BANDWIDTH=([^,]*)/', $line, $match1 ) ) {
                                                if ( preg_match( '/RESOLUTION=([^,]*)/', $line, $match2 ) ) {
                                                    list( $width, $height ) = explode( 'x', $match2[1] );
                                                    $pixel = $width * $height;
                                                    if ( $pixel != $min ) {
                                                        $coefficient = $pixel / $min;
                                                        $_bandwidth = $bandwidth * $coefficient;
                                                        $_bandwidth = (int) $_bandwidth;
                                                        $line = preg_replace( '/BANDWIDTH=[^,]*/', 'BANDWIDTH=' . $_bandwidth ,$line );
                                                    }
                                                }
                                            }
                                        }
                                        $mast_playlist .= $line . PHP_EOL;
                                    }
                                    $app->fmgr->put( $hls_file_path, $mast_playlist );
                                }
                            }
                        }
                    }
                }
                $end_time = time();
                $processing = $end_time - $start_time;
                $label = $obj->label;
                $file_name = $obj->file_name;
                $label = "{$label}({$file_name})";
                $message = $this->translate( "The Upload File '%s' was converted to HLS format.(Processing time: %s seconds).", [ $label, $processing ] );
                $log = $this->log( $message, 'info', [], $workspace_id, $app );
                chdir( $app->pt_dir );
            }
            if ( $error ) {
                if ( $session ) {
                    $session->remove();
                }
                if ( $original === true ) {
                    return false;
                }
                $id = $obj->id;
                $params = "?__mode=view&_type=edit&_model=upload_file&id={$id}&saved=1&create_hls_error={$error}";
                $params .= $workspace_id ? "&workspace_id={$workspace_id}" : '';
                return $app->redirect( $this->admin_url . $params );
            }
            /*
            // Duplicate from URL Mapping when video_captions_hls_mkdir
            if ( $app->fmgr->exists( $vtt ) ) {
                $vtt_file_path = dirname( $obj->file_path ) . $ds . $basename . $ds . "{$basename}.vtt";
                $app->fmgr->copy( $vtt, $vtt_file_path );
                $app->fmgr->update_paths[ $vtt_file_path ] = 1;
                $ts_files[] = $vtt_file_path;
            }
            */
            $hls_extra_path = $app->sanitize_dir( $hls_extra_path );
            $hls_file_name = "{$basename}.m3u8";
            $hls_mime_type = 'application/x-mpegURL';
            $hls_file_ext = 'm3u8';
            $hls_filesize = filesize( $hls_file_path );
            $clone = null;
            if ( $existing ) {
                $clone = $app->db->model( 'upload_file' )->get_by_key( ['file_path' => $hls_file_path, 'workspace_id' => $workspace_id ] );
                if (! $clone->id ) {
                    $clone = null;
                }
            }
            if (! $clone ) {
                $clone = clone $obj;
                $clone->id( null );
                $existing = false;
            }
            $clone->url( $hls_url );
            $clone->file_path( $hls_file_path );
            $clone->relative_path( $hls_relative_path );
            $clone->extra_path( $hls_extra_path );
            $clone->file_name( $hls_file_name );
            $clone->mime_type( $hls_mime_type );
            $clone->file_ext( $hls_file_ext );
            $clone->size( $hls_filesize );
            $clone->created_on( null );
            $clone->modified_on( null );
            $clone->created_by( null );
            $clone->modified_by( null );
            $app->set_default( $clone );
            $clone->save();
            $_obj = $obj; // For Callback.
            $obj = $clone;
            if ( $app->fileuploader_backup ) {
                $cache = $cache_dir . md5( $hls_file_path ) . ".{$hls_file_ext}";
                $app->fmgr->copy( $hls_file_path, $cache );
            }
            $metadata = $app->db->model( 'meta' )->get_by_key(
               ['model' => 'upload_file', 'object_id' => $obj->id,
                'kind' => 'metadata', 'key' => 'file_path'] );
            $meta_obj = [];
            $meta_obj['extension'] = $hls_file_ext;
            $meta_obj['mime_type'] = $hls_mime_type;
            $meta_obj['class'] = 'video';
            $meta_obj['file_name'] = "{$basename}.m3u8";
            $meta_obj['basename'] = $basename;
            $meta_obj['file_size'] = $hls_filesize;
            $meta_obj = json_encode( $meta_obj );
            $metadata->text( $meta_obj );
            $metadata->value( $_obj->id ); // Original MP4's ID
            $metadata->save();
            if ( $meta->id && $obj->class === 'video' ) {
                $metadata->data( $meta->data );
                $metadata->metadata( $meta->metadata );
                $metadata->save();
            } else if ( $app->video_captions_thumbnail_sec && $obj->class === 'video' ) {
                $original = clone $obj;
                $original->thumbnail_sec( 0 );
                $obj->thumbnail_sec( $app->video_captions_thumbnail_sec );
                $this->post_save_upload_file( $cb, $app, $obj, $original, true );
            }
            $obj->save();
            $url = $app->db->model( 'urlinfo' )->get_by_key(
                ['model' => 'upload_file', 'class' => 'file', 'object_id' => $obj->id ] );
            $url->url( $hls_url );
            $url->file_path( $hls_file_path );
            $url->relative_path( $hls_relative_path );
            $url->dirname( dirname( $hls_url ) . '/' );
            $url->relative_url( preg_replace( '!^https{0,1}://[^/]*?/!', '/', $hls_url ) );
            $url->md5( md5_file( $hls_file_path ) );
            $url->mime_type( $hls_mime_type );
            $url->workspace_id( $obj->workspace_id );
            $url->save();
            chdir( $dirname );
            foreach ( glob("*.ts") as $filename ) {
                $ts_files[] = "{$dirname}{$ds}{$filename}";
            }
            foreach ( glob("*.m3u8") as $filename ) {
                $m3u8_path = "{$dirname}{$ds}{$filename}";
                if ( $m3u8_path !== $hls_file_path ) {
                    $ts_files[] = $m3u8_path;
                }
            }
            chdir( $app->pt_dir );
            $hls_created = true;
            if ( $session ) {
                $session->remove();
            }
        } else if ( $extract && $obj->mime_type == 'application/zip' ) {
            $zip = new ZipArchive();
            if (!$zip->open( $obj->file_path ) ) {
                return true;
            }
            $error = false;
            $m3u8_count = 0;
            for( $i = 0; $i < $zip->numFiles; $i++ ){
                $file_path = $zip->getNameIndex( $i );
                if (! preg_match( "!$ds$!", $file_path ) ) {
                    $item_path = dirname( $orig_path ) . DS . $file_path;
                    if ( $app->fmgr->exists( $item_path ) ) {
                        $error = true;
                        break;
                    }
                }
                $extension = PTUtil::get_extension( $file_path );
                if ( $extension == 'm3u8' ) {
                    ++$m3u8_count;
                }
            }
            if ( $error ) {
                $id = $obj->id;
                $params = "?__mode=view&_type=edit&_model=upload_file&id={$id}&saved=1&extract_error=1";
                $params .= $workspace_id ? "&workspace_id={$workspace_id}" : '';
                return $app->redirect( $this->admin_url . $params );
            }
            for( $i = 0; $i < $zip->numFiles; $i++ ){
                $file_path = $zip->getNameIndex( $i );
                if (! preg_match( "!$ds$!", $file_path ) ) {
                    $extension = PTUtil::get_extension( $file_path );
                    if ( $extension == 'm3u8' || $extension == 'mpd' ) {
                        $m3u8_path = dirname( $orig_path ) . DS . $file_path;
                        $zip->extractTo( dirname( $orig_path ), $file_path );
                        if ( $app->fmgr->exists( $m3u8_path ) ) {
                            $zip->extractTo( dirname( $orig_path ) );
                            $app->fmgr->unlink( $orig_path );
                            if ( $app->fileuploader_backup ) {
                                $cache = $cache_dir . md5( $m3u8_path ) . ".{$extension}";
                                $app->fmgr->copy( $m3u8_path, $cache );
                                $cache = $cache_dir . md5( $orig_path ) . ".zip";
                                $app->fmgr->unlink( $cache );
                            }
                            if ( $m3u8_count > 1 ) {
                                $m3u8_content = file_get_contents( $m3u8_path );
                                if ( strpos( $m3u8_content, '.m3u8' ) === false ) {
                                    $ts_files[] = $m3u8_path;
                                    continue;
                                }
                            }
                            $filesize = filesize( $m3u8_path );
                            $m3u8_url = preg_replace( "/^$quoted/", $trimmed_url, $m3u8_path );
                            $m3u8_relative_path = preg_replace( "/^$quoted/", '%r', $m3u8_path );
                            $m3u8_extra_path = dirname( preg_replace( "!^%r/!", '', $m3u8_relative_path ) ) . '/';
                            if ( $extension == 'm3u8' ) {
                                $obj->file_ext( 'm3u8' );
                                $mime_type = 'application/x-mpegURL';
                            } elseif ( $extension == 'mpd' ) {
                                $obj->file_ext( 'mpd' );
                                $mime_type = 'application/dash+xml';
                            }
                            $obj->mime_type( $mime_type );
                            $obj->class( 'video' );
                            $obj->extra_path( $m3u8_extra_path );
                            $obj->relative_path( $m3u8_relative_path );
                            $obj->file_path( $m3u8_path );
                            $obj->url( $m3u8_url );
                            $obj->file_name( basename( $m3u8_path ) );
                            $obj->size( $filesize );
                            $metadata = $app->db->model( 'meta' )->get_by_key(
                               ['model' => 'upload_file', 'object_id' => $obj->id,
                                'kind' => 'metadata', 'key' => 'file_path'] );
                            $meta_obj = json_decode( $metadata->text, true );
                            $meta_obj['extension'] = $extension;
                            $meta_obj['mime_type'] = $mime_type;
                            $meta_obj['class'] = 'video';
                            $meta_obj['file_name'] = basename( $m3u8_path );
                            $meta_obj['basename'] = basename( $m3u8_path, ".{$extension}" );
                            $meta_obj['file_size'] = $filesize;
                            $meta_obj = json_encode( $meta_obj );
                            $metadata->text( $meta_obj );
                            $metadata->save();
                            $obj->save();
                            $url = $app->db->model( 'urlinfo' )->get_by_key(
                                ['model' => 'upload_file', 'class' => 'file', 'object_id' => $obj->id ] );
                            $url->url( $m3u8_url );
                            $url->file_path( $m3u8_path );
                            $url->relative_path( $m3u8_relative_path );
                            $url->dirname( dirname( $m3u8_url ) . '/' );
                            $url->relative_url( preg_replace( '!^https{0,1}://[^/]*?/!', '/', $m3u8_url ) );
                            $url->md5( md5_file( $m3u8_path ) );
                            $url->mime_type( $mime_type );
                            $url->save();
                        }
                    } else if ( $extension == 'ts' || $extension == 'm4s' || $extension == 'mp4' ) {
                        $ts_files[] = dirname( $orig_path ) . DS . $file_path;
                    }
                }
            }
        }
        if ( $hls_created ) {
            $callback = ['name' => 'post_convert_hls', 'hls_files' => $ts_files ];
            $app->init_callbacks( 'upload_file', 'post_convert_hls' );
            $app->run_callbacks( $callback, 'upload_file', $obj, $_obj );
            foreach ( $ts_files as $ts_file ) {
                if ( $app->fmgr->exists( $ts_file ) ) {
                    $ts_url = preg_replace( "/^$quoted/", $trimmed_url, $ts_file );
                    $ts_relative_path = preg_replace( "/^$quoted/", '%r', $ts_file );
                    $ts_relative_url = preg_replace( '!^https{0,1}://[^/]*?/!', '/', $ts_url );
                    $ts_extension = PTUtil::get_extension( $ts_file );
                    $ts_file_key = '';
                    if ( $ts_extension === 'ts' ) {
                        $ts_file_class = 'hls_movie';
                        $mime_type = 'video/mp2t';
                    } elseif ( $ts_extension === 'm4s' ) {
                        $ts_file_class = 'fragment_mp4';
                        $mime_type = 'video/iso.segment';
                    } elseif ( $ts_extension === 'mp4' ) {
                        $ts_file_class = 'file';
                        $mime_type = 'video/mp4';
                    } elseif ( $ts_extension === 'm3u8' ) {
                        $ts_file_class = 'file';
                        $mime_type = 'application/x-mpegURL';
                    } elseif ( $ts_extension === 'vtt' ) {
                        $ts_file_class = 'plugin';
                        $mime_type = 'application/x-mpegURL';
                        $ts_file_key = 'vtt';
                    }
                    $url = $app->db->model( 'urlinfo' )->get_by_key(
                        ['model' => 'upload_file', 'class' => $ts_file_class, 'object_id' => $obj->id,
                         'file_path' => $ts_file, 'url' => $ts_url, 'mime_type' => $mime_type,
                         'workspace_id' => $obj->workspace_id, 'relative_url' => $ts_relative_url,
                         'relative_path' => $ts_relative_path ] );
                    $url->dirname( dirname( $ts_url ) . '/' );
                    $url->md5( md5_file( $ts_file ) );
                    $url->is_published( 1 );
                    $url->was_published( 1 );
                    $url->filemtime( filemtime( $ts_file ) );
                    $url->save();
                    if ( $app->fileuploader_backup ) {
                        $cache = $cache_dir . md5( $ts_file ) . ".{$ts_extension}";
                        $app->fmgr->copy( $ts_file, $cache );
                    }
                }
            }
        }
        if ( $hls_created ) {
            if ( $original === true ) {
                return true;
            }
            $id = $obj->id;
            $params = "?__mode=view&_type=edit&_model=upload_file&id={$id}&saved=1&hls_created=1";
            if ( $existing ) {
                $params .= "&existing=1";
            }
            $params .= $workspace_id ? "&workspace_id={$workspace_id}" : '';
            $app->redirect( $this->admin_url . $params );
        }
        return true;
    }

    function video_caption_is_hls ( $app ) {
        $magic = $app->param( 'file_magic' );
        $scope_id = (int) $app->param( 'workspace_id' );
        $session = $app->db->model( 'session' )->get_by_key(
            ['user_id' => $app->user()->id, 'name' => $magic, 'workspace_id' => $scope_id ] );
        if ( $session && file_exists( $session->value ) ) {
            $file_path = $session->value;
            $res = $this->zip_is_hls( $app, $file_path );
            if ( $res ) {
                $app->print( 1 );
            }
        }
    }

    function video_captions_view_hls ( $app ) {
        $id = $app->param( 'id' );
        $file = $app->db->model( 'upload_file' )->load( $id );
        if (! $file || $file->mime_type !== 'application/x-mpegURL' ) {
            return $app->error( 'Invalid request.' );
        }
        $tmpl = $app->ctx->get_template_path( 'video-captions-hls-preview.tmpl' );
        $app->ctx->vars['file_label'] = $file->label;
        $app->ctx->vars['class'] = $file->class;
        if (! $theme_static = $app->theme_static ) {
            $theme_static = $app->path . 'theme-static/';
            $app->theme_static = $theme_static;
        }
        $app->ctx->vars['theme_static'] = $app->theme_static;
        $app->ctx->vars['basename'] = $app->param( 'basename' );
        $app->ctx->stash( 'upload_file', $file );
        echo $app->build( file_get_contents( $tmpl ) );
    }

    function zip_is_hls ( $app, $file_path ) {
        $zip = new ZipArchive();
        if (! $app->fmgr->exists( $file_path ) || !$zip->open( $file_path ) ) {
            return false;
        }
        $ds = DS;
        $index   = false;
        $movie   = false;
        $counter = 0;
        for( $i = 0; $i < $zip->numFiles; $i++ ){
            $path = $zip->getNameIndex( $i );
            if (! preg_match( "!$ds$!", $path ) ) {
                $extension = PTUtil::get_extension( $path );
                if ( $extension == 'm3u8' || $extension == 'mpd' ) {
                    $index = true;
                    $counter++;
                } else if ( $extension == 'ts' || $extension == 'm4s' || $extension == 'mp4' ) {
                    $movie = true;
                }
            }
        }
        if ( $index && $movie && $counter ) {
            return true;
        }
        return false;
    }

    function video_caption_insert_video ( $app ) {
        $id = $app->param( 'id' );
        $obj = $app->db->model( 'upload_file' )->load( $id );
        $file_path = $obj->file_path;
        $postfix = $app->video_captions_postfix;
        $extension = PTUtil::get_extension( $file_path );
        $outFile = preg_replace( "/\.$extension$/", '', $file_path );
        $outFile .= $postfix . ".$extension";
        $file_url = $obj->url;
        if ( $app->fmgr->exists( $outFile ) ) {
            $file_url = preg_replace( "/\.$extension$/", '', $file_url );
            $file_url .= $postfix . ".$extension";
        } else {
            $vtt_path = preg_replace( "/\.$extension$/", '.vtt', $file_path );
            if ( $app->fmgr->exists( $vtt_path ) ) {
                $vtt_url = $obj->url;
                $vtt_url = preg_replace( "/\.$extension$/", '.vtt', $vtt_url );
                $app->ctx->vars['vtt_url'] = $vtt_url;
            }
        }
        // video_captions_video_tag
        $workspace_id = (int) $app->param( 'workspace_id' );
        $tag = $this->get_config_value( 'video_captions_video_tag', $workspace_id );
        if (! $tag ) {
            $tag = '<video controls style="width:100%;height:auto">';
        }
        $app->ctx->vars['video_tag'] = $tag;
        $app->ctx->vars['video_url'] = $file_url;
        $app->ctx->vars['mime_type'] = $obj->mime_type;
        if ( $obj->mime_type != 'video/mp4' ) {
            $app->ctx->vars['mime_type'] = '';
        }
        $tmpl = $app->ctx->get_template_path( 'video-captions-insert_video.tmpl' );
        echo $app->build( file_get_contents( $tmpl ) );
    }

    function video_caption_js ( $app ) {
        $js = $app->ctx->get_template_path( 'video-captions.js.tmpl' );
        $id = (int) $app->param( 'id' );
        $app->ctx->vars['object_id'] = $id;
        $app->ctx->vars['can_bake_captions'] = $this->can_bake_captions( $app ) ? '1' : '';
        header( 'Content-type: text/javascript' );
        echo $app->build( file_get_contents( $js ) );
    }

    function output_list ( $cb, $app, $param, $tmpl, &$out ) {
        $model = $app->param( '_model' );
        $dialog_view = $app->param( 'dialog_view' );
        $insert_editor = $app->param( 'insert_editor' );
        if ( $model == 'upload_file' && $dialog_view && $insert_editor ) {
            $search = 'id="dialog-selector-btn-editor_insert"';
            $out = str_replace( 'id="dialog-selector-btn-editor_insert"', 'id="video-selector-btn-editor_insert"', $out );
            $button = $app->ctx->get_template_path( 'video-captions-list-button.tmpl' );
            $button = $app->build( file_get_contents( $button ) );
            $out = str_replace( '</body>', "{$button}</body>", $out );
        }
    }

    function set_caption_param ( $cb, $app, &$param, &$tmpl ) {
        $ctx = $app->ctx;
        $model = $app->param( '_model' );
        $id = $app->param( 'id' );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $tinymce = $app->component( 'TinyMCE' );
        if ( $tinymce ) {
            $tinymce_toolbar = $tinymce->get_config_value( 'tinymce_toolbar', $workspace_id );
            if ( strpos( $tinymce_toolbar, 'pt-video' ) !== false ) {
                $editor_buttons = isset( $ctx->vars['editor_buttons'] ) ? $ctx->vars['editor_buttons'] : '';
                $button = null;
                $tinymce_version = (int)$app->tinymce_version;
                if ( $tinymce_version && $tinymce_version == 4 ) {
                    $button = $app->ctx->get_template_path( 'video-captions-editor_buttons_4.tmpl' );
                } else {
                    $button = $app->ctx->get_template_path( 'video-captions-editor_buttons.tmpl' );
                }
                $editor_buttons .= $app->build( $app->fmgr->get( $button ) );
                $ctx->vars['editor_buttons'] = $editor_buttons;
                $ctx->vars['video_captions_assets_base'] = $app->video_captions_assets_base;
                $custom_buttons = isset( $ctx->vars['custom_html_insert_buttons'] )
                                ? $ctx->vars['custom_html_insert_buttons'] : '';
                $editor_tmpl = $app->ctx->get_template_path( 'video-captions-input-html.tmpl' );
                $custom_buttons .= $app->build( $app->fmgr->get( $editor_tmpl ) );
                $ctx->vars['custom_html_insert_buttons'] = $custom_buttons;
            }
        }
        if ( $model == 'upload_file' && $id ) {
            if ( $app->param( 'extract_error' ) ) {
                $param['error'] = $this->translate( 'The ZIP archive could not be unzipped because the file already exists.' );
            }
            $obj = $app->db->model( 'upload_file' )->load( $id );
            if ( $obj->mime_type == 'application/zip' ) {
                $res = $this->zip_is_hls( $app, $obj->file_path );
                if ( $res ) {
                    $param['zip_is_hls'] = true;
                }
            }
            if ( $obj->class != 'video' ) {
                if ( $obj->class == 'audio' ) {
                    if ( $obj->mime_type === 'audio/mpeg' && $app->simplifiedjapanese_ffmpeg_path && $app->video_captions_can_convert_hls ) {
                        $basename = basename( $obj->file_path, '.mp3' );
                        $dirname = dirname( $obj->file_path ) . DS . $basename;
                        if (! $app->video_captions_hls_allow_overwrite && $app->fmgr->exists( $dirname ) && count( glob( $dirname . "/*" ) ) != 0 ) {
                        } else {
                            $include = $this->path() . DS . 'tmpl' . DS . 'video-captions-cobvert-cb.tmpl';
                            $add_edit_action_bar = $app->ctx->vars['add_edit_action_bar'] ?? '';
                            $app->ctx->vars['add_edit_action_bar'] = $add_edit_action_bar . $app->build( $app->fmgr->get( $include ) );
                        }
                    }
                }
                return true;
            }
            $ctx = $app->ctx;
            $SimplifiedJapanese = $app->component( 'SimplifiedJapanese' );
            if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
                $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
            }
            $ffprobe = $app->simplifiedjapanese_ffprobe_path;
            if ( $SimplifiedJapanese && $ffprobe ) {
                $simplifiedjapanese_aws_id = $SimplifiedJapanese->get_config_value( 'simplifiedjapanese_aws_id' );
                $simplifiedjapanese_aws_secret = $SimplifiedJapanese->get_config_value( 'simplifiedjapanese_aws_secret' );
                if ( $simplifiedjapanese_aws_id && $simplifiedjapanese_aws_secret ) {
                    $ctx->vars['can_polly'] = true;
                }
            }
            if ( $obj->mime_type === 'video/mp4' && $app->simplifiedjapanese_ffmpeg_path && $app->video_captions_can_convert_hls ) {
                $basename = basename( $obj->file_path, '.mp4' );
                $dirname = dirname( $obj->file_path ) . DS . $basename;
                if (! $app->video_captions_hls_allow_overwrite && $app->fmgr->exists( $dirname ) && count( glob( $dirname . "/*" ) ) != 0 ) {
                } else {
                    $include = $this->path() . DS . 'tmpl' . DS . 'video-captions-cobvert-cb.tmpl';
                    $add_edit_action_bar = $app->ctx->vars['add_edit_action_bar'] ?? '';
                    $app->ctx->vars['add_edit_action_bar'] = $add_edit_action_bar . $app->build( $app->fmgr->get( $include ) );
                }
            }
            if (! $theme_static = $app->theme_static ) {
                $theme_static = $app->path . 'theme-static/';
                $app->theme_static = $theme_static;
            }
            $ctx->vars['theme_static'] = $app->theme_static;
            $meta = $app->db->model( 'meta' )->get_by_key( ['object_id' => $id,
                                                            'model' => 'upload_file',
                                                            'kind' => 'metadata',
                                                            'key' => 'video_caption'] );
            $text = [];
            if ( $meta->id && $meta->text ) {
                $data = json_decode( $meta->text, true );
                foreach ( $data as $line ) {
                    $text[] = implode( "\t", $line );
                }
            }
            $font_face = $this->get_config_value( 'video_captions_font_face', $workspace_id );
            $font_face = str_replace( ' ', '+', $font_face );
            $font_weight = $this->get_config_value( 'video_captions_font_weight', $workspace_id );
            $canvas_webfont = $this->get_config_value( 'video_captions_canvas_webfont', $workspace_id );
            if ( $canvas_webfont ) {
                $html_head = $ctx->vars['html_head'] ?? '';
                if ( $font_face == 'RocknRoll+One' || $font_face == 'BIZ+UDPMincho' ) {
                    $html_head .= '<link href="https://fonts.googleapis.com/css2?family=' . $font_face . '&amp;display=swap" rel="stylesheet">';
                } else {
                    $html_head .= '<link href="https://fonts.googleapis.com/css2?family=' . $font_face . ':wght@' . $font_weight . '&amp;display=swap" rel="stylesheet">';
                }
                $ctx->vars['html_head'] = $html_head;
            }
            $text = implode( PHP_EOL, $text );
            $param['file_caption'] = $text;
            $url = $app->db->model( 'urlinfo' )->get_by_key( ['model' => 'upload_file', 'object_id' => $id, 'url' => $obj->url ] );
            if (! $url->id ) {
                $file_path = $obj->file_path;
                $url = $this->set_upload_file_urlinfo( $obj, $app );
            } else {
                $file_path = $url->file_path;
            }
            $ctx->vars['genarate_percent'] = 1;
            if ( is_object( $SimplifiedJapanese ) ) {
                $ctx->vars['can_furigana'] = true;
                $ctx->vars['simplifiedjapanese_assets_base'] = $app->simplifiedjapanese_assets_base;
            }
            $ctx->vars['video_captions_assets_base'] = $app->video_captions_assets_base;
            if ( $this->can_bake_captions( $app ) ) {
                $ctx->vars['can_bake_captions'] = true;
                $cmd = $ffprobe . ' ' . escapeshellarg( $file_path ) . ' -hide_banner -show_entries format=duration';
                $result = shell_exec( $cmd );
                if ( preg_match( '/duration=([0-9].*)\n/i', $result, $matchs ) ) {
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
            } else {
                $ctx->vars['can_bake_captions'] = false;
            }
            $extension = PTUtil::get_extension( $file_path );
            $postfix = $app->video_captions_postfix;
            $chapters_pfx = $app->video_captions_chapters_postfix;
            $outFile = preg_replace( "/\.$extension$/", '', $file_path );
            $outFile .= $postfix . ".$extension";
            if ( $app->fmgr->exists( $outFile ) && $app->fmgr->exists( "{$outFile}.backup" ) ) {
                if (! $app->param( 'baked' ) ) {
                    $redirect = $ctx->vars['script_uri'] . '?' . $app->query_string() . '&baked=1';
                    $app->redirect( $redirect );
                    exit();
                }
            }
            $vtt = preg_replace( "/\.$extension$/", '.vtt', $file_path );
            $chapter = preg_replace( "/\.$extension$/", $chapters_pfx . '.vtt', $file_path );
            $chapter_json = preg_replace( "/\.$extension$/", $chapters_pfx . '.json', $file_path );
            if ( $app->fmgr->exists( $outFile ) || $app->fmgr->exists( $vtt ) || $app->fmgr->exists( $chapter ) || $app->fmgr->exists( $chapter_json ) ) {
                $__add_save_event = isset( $ctx->vars['__add_save_event'] ) ? $ctx->vars['__add_save_event'] : '';
                $add_save_event = file_get_contents( $this->path(). DS . 'tmpl' . DS . 'add_save_event.tmpl' );
                $add_save_event = str_replace( '__message__',
                $this->translate( 'The generated captioned video will be deleted because the file has changed. Are you sure you want to continue?' ),
                                  $add_save_event );
                $__add_save_event .= $add_save_event;
                $ctx->vars['__add_save_event'] = $__add_save_event;
                $file_url = $url->url;
                $vtt_url = preg_replace( "/\.$extension$/", '.vtt', $file_url );
                $chapter_url = preg_replace( "/\.$extension$/", $chapters_pfx . '.vtt', $file_url );
                if ( $app->fmgr->exists( $outFile ) ) {
                    $file_url = preg_replace( "/\.$extension$/", '', $file_url );
                    $file_url .= $postfix . ".$extension";
                    $ctx->vars['with-caption-url'] = $file_url;
                }
                if ( $app->fmgr->exists( $vtt ) ) {
                    $ctx->vars['caption-vtt-url-orig'] = $vtt_url;
                }
                if ( $app->fmgr->exists( $chapter ) ) {
                    $ctx->vars['chapter-vtt-url-orig'] = $chapter_url;
                }
                if ( $app->fmgr->exists( $chapter_json ) ) {
                    $chapter_json_url = preg_replace( "/\.$extension$/", $chapters_pfx . '.json', $file_url );
                    $ctx->vars['chapter-json-url-orig'] = $chapter_json_url;
                }
                $vtt_ruby = false;
                if ( $postfix = $app->video_captions_compat_postfix ) {
                    $vtt = preg_replace( '/\.vtt/', $postfix . '.vtt', $vtt );
                    $vtt_ruby = preg_replace( '/\.vtt/', $postfix . '.vtt', $vtt_url );
                    if ( $app->fmgr->exists( $vtt ) ) {
                        $ctx->vars['caption-vtt-url-ruby'] = $vtt_ruby;
                    }
                }
                $agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
                if ( strpos( $agent, 'Firefox' ) !== false && $vtt_ruby ) {
                    $vtt_url = $vtt_ruby;
                }
                if ( $app->fmgr->exists( $vtt ) ) {
                    $ctx->vars['caption-vtt-url'] = $vtt_url;
                }
            }
            if ( $obj->mime_type === 'application/x-mpegURL' ) {
                $data = $app->fmgr->get( $obj->file_path );
                $lines = explode( PHP_EOL, $data );
                $scales = [];
                foreach ( $lines as $idx => $line ) {
                    if ( strpos( $line, '#EXT-X-STREAM-INF:' ) === 0 ) {
                        $resolution = preg_replace( '/^.*RESOLUTION=(.*?)\,.*$/', '$1', $line );
                        if ( stripos( $resolution, 'RESOLUTION=' ) !== 0 ) {
                            $resolution = preg_replace( '/^.*RESOLUTION=(.*?)\,{0,1}/', '$1', $resolution );
                        }
                        $scales[ $resolution ] = $lines[ $idx + 1];
                    }
                }
                $ctx->vars['hls_scales'] = $scales;
            }
        }
        return true;
    }

    function set_upload_file_urlinfo ( $obj, $app ) {
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['model' => 'upload_file', 'object_id' => $obj->id, 'url' => $obj->url ] );
        if (! $url->id ) {
            $file_path = $obj->file_path;
            $url->workspace_id( $obj->workspace_id );
            $url->file_path( $file_path );
            $url->class( 'file' );
            PTUtil::set_url_path( $url );
            $url->save();
        }
        $dir = dirname( $file_path );
        $items = scandir( dirname( $file_path ) );
        foreach ( $items as $item ) {
            if ( strpos( $item, '.' ) === 0 ) {
                continue;
            }
            $item_path = $dir . DS . $item;
            if ( $item_path === $file_path ) {
                continue;
            }
            $item_url = $app->db->model( 'urlinfo' )->get_by_key( ['model' => 'upload_file', 'object_id' => $obj->id, 'file_path' => $item_path ] );
            if (! $item_url->id ) {
                $item_url->workspace_id( $obj->workspace_id );
                $item_url->class( 'file' );
                PTUtil::set_url_path( $item_url );
                $item_url->save();
            }
        }
        return $url;
    }

    function hdlr_ifembedvideo ( $args, $content, $ctx, $repeat, $counter ) {
        $args['ifembedvideo'] = true;
        return $this->hdlr_embedvideo( $args, $ctx );
    }

    function hdlr_ifembedaudio ( $args, $content, $ctx, $repeat, $counter ) {
        $args['ifembedvideo'] = true;
        $args['class_type'] = 'audio';
        return $this->hdlr_embedvideo( $args, $ctx );
    }

    function hdlr_embedaudio ( $args, $ctx ) {
        $args['class_type'] = 'audio';
        return $this->hdlr_embedvideo( $args, $ctx );
    }

    function hdlr_embedvideo ( $args, $ctx ) {
        $app = $ctx->app;
        $id = $args['id'] ?? null;
        $attr_id = $args['attr_id'] ?? null;
        if (! $attr_id && $id && !ctype_digit( (string) $id ) ) {
            $attr_id = $id;
            $id = null;
        }
        if (! $id ) {
            $id = $args['object_id'] ?? null;
        }
        $ifembedvideo = isset( $args['ifembedvideo'] ) ?? false;
        $url = isset( $args['url'] ) ?? false;
        $original = isset( $args['original_url'] ) ?? false;
        $caption = isset( $args['caption_url'] ) ?? false;
        $vtt = isset( $args['vtt_url'] ) ?? false;
        $vtt_compat = isset( $args['vtt_compat_url'] ) ?? false;
        $vtt_chapter = isset( $args['vtt_chapter_url'] ) ?? false;
        $webVTT = isset( $args['vtt'] ) ?? false;
        $priority = $args['priority'] ?? null;
        $original = isset( $args['original'] ) ?? false;
        $without_vtt = isset( $args['without_vtt'] ) ?? false;
        $upload_file = $this->get_ctx_video( $args, $ctx );
        if (! $upload_file ) {
            return '';
        }
        if ( $ifembedvideo ) {
            return true;
        }
        if ( $original ) {
            return $upload_file->url;
        }
        $workspace_id = (int) $upload_file->workspace_id;
        $relative = false;
        if ( $app->id === 'Prototype' ) {
            if ( $app->mode === 'video_captions_view_hls' ) {
                $relative = $this->get_config_value( 'video_captions_src_relative', $workspace_id );
            }
        }
        $language = $args['language'] ?? null;
        if (! $language && $workspace_id ) {
            $language = $upload_file->workspace->language;
        } else {
            $language = $app->get_config( 'language' )->value;
        }
        $file_path = $upload_file->file_path;
        $postfix = $app->video_captions_postfix;
        $extension = PTUtil::get_extension( $file_path );
        $outFile = preg_replace( "/\.$extension$/", '', $file_path );
        $outFile .= $postfix . ".$extension";
        $file_url = $upload_file->url;
        $has_synthetic = false;
        if ( $app->fmgr->exists( $outFile ) && !$webVTT && !$original ) {
            $file_url = preg_replace( "/\.{$extension}$/", '', $file_url );
            $file_url .= $postfix . ".{$extension}";
            if ( $caption ) {
                if ( $relative ) {
                    $file_url = $ctx->modifier_relative( $file_url, 1, $ctx );
                }
                return $file_url;
            }
            $has_synthetic = true;
        }
        $vtt_path = preg_replace( "/\.{$extension}$/", '.vtt', $file_path );
        if ( $app->fmgr->exists( $vtt_path ) ) {
            $vtt_url = $upload_file->url;
            $vtt_url = preg_replace( "/\.{$extension}$/", '.vtt', $vtt_url );
            if ( $relative ) {
                $vtt_url = $ctx->modifier_relative( $vtt_url, 1, $ctx );
            }
            if ( $vtt ) {
                return $vtt_url;
            }
            if (! $has_synthetic && !$without_vtt ) {
                $app->ctx->vars['vtt_url'] = $vtt_url;
            }
            if ( $priority && $priority == 'vtt' ) {
                $file_url = $upload_file->url;
                if ( $relative ) {
                    $file_url = $ctx->modifier_relative( $file_url, 1, $ctx );
                }
                $app->ctx->vars['vtt_url'] = $vtt_url;
            }
        }
        if ( $postfix = $app->video_captions_chapters_postfix ) {
            $vtt_path = $upload_file->file_path;
            $vtt_path = preg_replace( "/\.{$extension}$/", $postfix . '.vtt', $vtt_path );
            if ( $app->fmgr->exists( $vtt_path ) ) {
                $vtt_url = $upload_file->url;
                $vtt_url = preg_replace( "/\.{$extension}$/", $postfix . '.vtt', $vtt_url );
                if ( $relative ) {
                    $vtt_url = $ctx->modifier_relative( $vtt_url, 1, $ctx );
                }
                if ( $vtt_chapter ) {
                    return $vtt_url;
                }
                $app->ctx->vars['chapter_url'] = $vtt_url;
            }
        }
        if ( $postfix = $app->video_captions_compat_postfix ) {
            if ( $vtt_compat ) {
                $vtt_path = $upload_file->file_path;
                $vtt_path = preg_replace( "/\.{$extension}$/", $postfix . '.vtt', $vtt_path );
                if ( $app->fmgr->exists( $vtt_path ) ) {
                    $vtt_url = $upload_file->url;
                    $vtt_url = preg_replace( "/\.{$extension}$/", $postfix . '.vtt', $vtt_url );
                    if ( $relative ) {
                        $vtt_url = $ctx->modifier_relative( $vtt_url, 1, $ctx );
                    }
                    return $vtt_url;
                }
            }
        }
        if ( $vtt_chapter || $vtt_compat ) {
            return '';
        }
        $basename = $args['basename'] ?? null;
        if ( $basename ) {
            $original = preg_quote( basename( $file_path ), '/' );
            $scaled_path = preg_replace( "/{$original}$/", $basename, $file_path );
            if ( $app->fmgr->exists( $scaled_path ) ) {
                $file_url = preg_replace( "/{$original}$/", $basename, $file_url );
            }
        }
        if ( $relative ) {
            $file_url = $ctx->modifier_relative( $file_url, 1, $ctx );
        }
        if ( $url ) {
            return $file_url;
        }
        $attributes = $args['attributes'] ?? null;
        $attrs = ['controlslist', 'crossorigin', 'intrinsicsize', 'src', 'preload', 'poster',
                  'disablepictureinpicture', 'duration', 'width', 'height', 'class', 'style'];
        $omits = ['autopictureinpicture', 'disableremoteplayback', 'controls', 'autoplay',
                  'playsinline', 'muted', 'loop'];
        if (! isset( $args['class'] ) ) {
            $args['class'] = $app->video_captions_video_class;
        }
        if ( isset( $args['controls'] ) && $args['controls'] === 'always' ) {
            if ( isset( $args['class'] ) ) {
                $args['class'] = $args['class'] . ' vjs-controls-fixed';
            } else {
                $args['class'] = 'vjs-controls-fixed';
            }
        }
        foreach ( $attrs as $attr ) {
            if ( isset( $args[ $attr ] ) ) {
                $value = $args[ $attr ];
                $attributes = $attributes ? "{$attr}=\"{$value}\" {$attributes}" : "{$attr}=\"{$value}\"";
            }
        }
        foreach ( $omits as $omit ) {
            if ( isset( $args[ $omit ] ) ) {
                $attributes = $attributes ? "$omit {$attributes}" : $omit;
            }
        }
        $attr_id = $attr_id ?? $app->video_captions_video_id;
        if ( isset( $args['unique_id'] ) ) {
            $attr_id = 'video-' . $upload_file->id;
            $args['id'] = $attr_id;
        }
        if ( $attr_id ) {
            $attributes = $attributes ? "id=\"{$attr_id}\" {$attributes}" : "id=\"{$attr_id}\"";
        }
        $class_type = $args['class_type'] ?? 'video';
        if ( $attributes ) {
            $tag = "<{$class_type} {$attributes}>";
        } else {
            $tag = $this->get_config_value( 'video_captions_video_tag', $workspace_id );
            if (! $tag ) {
                $tag = '<' . $class_type . ' controls style="width:100%;height:auto">';
            }
        }
        $app->ctx->vars['video_tag'] = $tag;
        $app->ctx->vars['video_url'] = $file_url;
        $app->ctx->vars['mime_type'] = $upload_file->mime_type;
        if ( $upload_file->mime_type != 'video/mp4' ) {
            $app->ctx->vars['mime_type'] = '';
        }
        $app->ctx->vars['language'] = $language;
        $app->ctx->vars['class_type'] = $class_type;
        $app->ctx->vars['chapters_json'] = $args['chapters_json'] ?? false;
        $app->ctx->vars['video_options'] = $args['options'] ?? null;
        $tmpl = $ctx->get_template_path( 'video-captions-embed-video.tmpl' );
        $html = $app->build( $app->fmgr->get( $tmpl ) );
        $indent = $args['indent'] ?? '';
        if ( $indent ) {
            $indent = str_repeat( ' ', $indent );
        }
        if ( $indent ) {
            $html = $indent . trim( str_replace( "\n", "\n{$indent}", $html ) );
        }
        if ( isset( $args['script'] ) ) {
            $html .= PHP_EOL . $this->hdlr_videojsscript( $args, $ctx );
        }
        return $html;
    }

    function queue_video_thumbnail ( $app, $queue, &$error ) {
        $ctx = $app->ctx;
        $upload_file = $app->db->model( 'upload_file' )->load( $queue->object_id );
        if (! $upload_file ) {
            return true;
        }
        $workspace = $ctx->stash( 'workspace' );
        $ctx->stash( 'upload_file', $upload_file );
        $ctx->stash( 'workspace', $upload_file->workspace );
        $args = json_decode( $queue->metadata, true );
        $use_queue = $app->video_captions_thumbnail_queue;
        $app->video_captions_thumbnail_queue = false;
        $res = $this->hdlr_videothumbnail( $args, $ctx );
        $app->video_captions_thumbnail_queue = $use_queue;
        $ctx->stash( 'workspace', $workspace );
        return $res ? true : false;
    }

    function hdlr_videothumbnailurl ( $args, $ctx ) {
        // Only variables should be passed by reference.
        return $this->hdlr_videothumbnail( $args, $ctx );
    }

    function hdlr_videothumbnail ( &$args, $ctx ) {
        $app = $ctx->app;
        $upload_file = $this->get_ctx_video( $args, $ctx );
        if (! $upload_file ) {
            return '';
        }
        $ffmpeg = $app->simplifiedjapanese_ffmpeg_path;
        if (! $ffmpeg || ! $app->fmgr->exists( $upload_file->file_path ) ) {
            return '';
        }
        $ffmpeg = escapeshellcmd( $ffmpeg );
        $starttime = $args['starttime'] ?? 0;
        $starttime = (float) $starttime;
        $add_basename = (string) $starttime;
        $add_basename = str_replace( '.', '-', $add_basename );
        $extension = $args['extension'] ?? 'png';
        $extension = strtolower( $extension );
        $output = $extension;
        if ( $extension !== 'png' && $extension !== 'jpg' ) {
            $extension = 'png';
        }
        $withcaption = $args['withcaption'] ?? 'png';
        $mime_type = $extension === 'png' ? 'image/png' : 'image/jpeg';
        $file_path = $upload_file->file_path;
        if ( $withcaption ) {
            $postfix = $app->video_captions_postfix;
            $movie_ext = PTUtil::get_extension( $file_path );
            $_file_path = preg_replace( "/\.$movie_ext$/", '', $file_path );
            $_file_path .= $postfix . ".$movie_ext";
            if ( $app->fmgr->exists( $_file_path ) ) {
                $file_path = $_file_path;
                $add_basename .= $postfix;
            }
        }
        $img_path = preg_replace( '/\.[^.]*$/', "-{$starttime}.{$extension}", $file_path );
        $url = $app->db->model( 'urlinfo' )->get_by_key(
            ['file_path' => $img_path, 'class' => 'thumbnail',
             'object_id' => $upload_file->id, 'model' => 'upload_file',
             'key' => 'thumbnail-' . $starttime, 'delete_flag' => [0, 1] ] );
        $create = false;
        $throw_img = null;
        if ( $app->fmgr->exists( $img_path ) && filemtime( $file_path ) < filemtime( $img_path ) ) {
        } else {
            if ( $app->video_captions_thumbnail_queue ) {
                if (! $app->fmgr->exists( $img_path ) ) {
                    $basename = basename( $img_path );
                    $dummy_img = $this->path() . DS . 'assets' . DS . 'img' . DS . "dummy.{$extension}";
                    if (! $app->fmgr->exists( $dummy_img ) ) {
                        // dummy.gif
                        return '';
                    }
                    $upload_dir = $app->upload_dir();
                    $throw_img = $upload_dir . DS . $basename;
                    $app->fmgr->copy( $dummy_img, $throw_img );
                    $queue = $app->db->model( 'queue' )->get_by_key( [
                        'key' => md5( $img_path ),
                        'class' => 'Generate Video Thumbnail',
                        'component' => 'VideoCaptions',
                        'method' => 'queue_video_thumbnail',
                        'object_id' => $upload_file->id,
                        'model' => 'upload_file',
                        'workspace_id' => $upload_file->workspace_id,
                        ] );
                    $ts_job = null;
                    if ( $queue->id ) {
                        $ts_job = $queue->ts_job;
                    }
                    if (! $ts_job ) {
                        $ts_job = $this->thumbnail_job ? $this->thumbnail_job : 
                                  $app->db->model( 'ts_job' )->new( ['name' => 'Generate Video Thumbnail',
                                                                     'component' => 'VideoCaptions'] );
                    }
                    $ts_job->workspace_id( 0 );
                    $ts = date( 'Y-m-d H:i:s' );
                    $ts_job->start_on( $ts );
                    $app->set_default( $ts_job );
                    if ( $ts_job->has_column( 'status', true ) ) {
                        $ts_job->status( 2 );
                    }
                    $ts_job->is_running( 0 );
                    $ts_job->max_per_once( $app->video_captions_thumbnail_queue_per );
                    $ts_job->save();
                    $queue->start_on( $ts );
                    $queue->ts_job_id( $ts_job->id );
                    $queue->value( $img_path );
                    $queue->metadata( json_encode( $args ) );
                    $queue->object_id( $upload_file->id );
                    $queue->model( 'upload_file' );
                    $app->set_default( $queue );
                    $queue->save();
                    $img_path = $throw_img;
                }
            } else {
                if ( $app->fmgr->exists( $img_path ) ) {
                    $app->fmgr->rename( $img_path, "{$img_path}.tmp" );
                }
                $_file_path = escapeshellarg( $file_path );
                $_img_path = escapeshellarg( $img_path );
                $cmd = "{$ffmpeg} -ss {$starttime} -i {$_file_path} -update true -vframes 1 -q:v 1 -f image2 {$_img_path}";
                $result = shell_exec( $cmd );
                if (! $app->fmgr->exists( $img_path ) ) {
                    if ( $app->fmgr->exists( "{$img_path}.tmp" ) ) {
                        $app->fmgr->rename( "{$img_path}.tmp", $img_path );
                    } else {
                        return '';
                    }
                } else if ( $app->fmgr->exists( "{$img_path}.tmp" ) ) {
                    $app->fmgr->unlink( "{$img_path}.tmp" );
                }
                $create = true;
                if ( $app->fileuploader_backup && $app->fmgr->exists( $img_path ) ) {
                    $cache_dir = $app->support_dir . DS . 'backup' . DS . 'fileuploader' . DS;
                    $cache = $cache_dir . md5( $img_path ) . ".{$extension}";
                    $app->fmgr->copy( $img_path, $cache );
                }
            }
        }
        if (! $app->fmgr->exists( $img_path ) ) {
            return '';
        }
        if (! $url->id ) {
            $url->mime_type( $mime_type );
            $url->workspace_id( $upload_file->workspace_id );
            $url->publish_file( 1 );
            $url->was_published( 1 );
            $url->is_published( 1 );
            $url->md5( md5_file( $img_path ) );
            $url->filemtime( filemtime( $img_path ) );
            PTUtil::set_url_path( $url );
            if ( $throw_img ) {
                $url->was_published( 0 );
                $url->is_published( 0 );
                $url->md5('');
            } else {
                $url->save();
            }
        } else if ( $url->delete_flag ) {
            $url->is_published( 1 );
            $url->save();
        }
        $width = isset( $args['width'] ) ? (int) $args['width'] : '';
        $height = isset( $args['height'] ) ? (int) $args['height'] : '';
        $square = isset( $args['square'] ) ? $args['square'] : false;
        $scale = isset( $args['scale'] ) ? (int) $args['scale'] : '';
        if (! $width && ! $height && ! $scale ) {
            return $url->url;
        }
        $args['name'] = 'binary_file';
        $args['add_basename'] = $add_basename;
        $args['mime_type'] = $mime_type;
        if ( $throw_img ) {
            $args['url'] = true;
        }
        $clone = clone $upload_file;
        $clone->binary_file( $app->fmgr->get( $img_path ) );
        $meta = $app->db->model( 'meta' )->new( ['model' => 'upload_file',
             'object_id' => $upload_file->id, 'kind' => 'metadata', 'key' => 'file'] );
        list( $width, $height ) = getimagesize( $img_path );
        $basename = basename( $img_path, ".{$extension}" );
        $metadata = ['file_size' => filesize( $img_path ), 'image_width' => $width,
                     'image_height' => $height, 'class' => 'image',
                     'extension' => $extension, 'basename' => $basename,
                     'mime_type' => $mime_type, 'file_name' => basename( $img_path ) ];
        $metadata['uploaded'] = date( 'Y-m-d H:i:s' );
        $metadata['user_id'] = $app->user() ? $app->user()->id : $upload_file->modified_by;
        $meta->text( json_encode( $metadata ) );
        $app->ctx->stash( 'upload_file_meta_binary_file_' . $upload_file->id, $meta );
        // if ( $create && $app->id === 'Prototype' && $app->param( '_preview' ) ) {
        // TODO::Clean Up Temporary File
        //}
        $args['extension'] = $output;
        if (! $app->video_captions_thumbnail_queue ) {
            if ( isset( $args['backup'] ) && $args['backup'] ) {
                $args['path'] = true;
                $path = PTUtil::thumbnail_url( $clone, $args );
                if ( $app->fmgr->exists( $path ) ) {
                    $app->fmgr->rename( $path, "{$path}.backup" );
                }
                unset( $args['path'] );
            }
        }
        unset( $args['urlinfo'] );
        $urls = [ $url ];
        $thumbnail_url = PTUtil::thumbnail_url( $clone, $args );
        if ( isset( $args['urlinfo'] ) && is_object( $args['urlinfo'] ) ) {
            $urls[] = $args['urlinfo'];
        }
        $args['urlinfo'] = $urls;
        return $thumbnail_url;
    }

    function hdlr_videochapterurl ( $args, $ctx, $upload_file = null, $retry = false ) {
        $app = $ctx->app;
        $upload_file = $upload_file ? $upload_file : $this->get_ctx_video( $args, $ctx );
        if (! $upload_file ) {
            return '';
        }
        $type = $args['type'] ?? 'chapter';
        if ( $type === 'chapters' ) {
            $type = 'chapter';
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key(
          ['object_id' => $upload_file->id, 'model' => 'upload_file', 'key' => $type, 'delete_flag' => [0, 1] ],
          ['sort' => 'delete_flag', 'direction' => 'ascend'] );
        if ( $url->id ) {
            if ( isset( $args['include_draft'] ) ) {
                return $url->url;
            } else if ( $app->fmgr->exists( $url->file_path ) ) {
                return $url->url;
            }
        }
        if (! $retry ) {
            $meta = $app->db->model( 'meta' )->get_by_key( ['model' => 'upload_file',
                                                            'value' => $upload_file->id,
                                                            'kind' => 'metadata',
                                                            'meta_key' => 'file_path'] );
            
            if ( $meta->id ) {
                $upload_file = $app->db->model( 'upload_file' )->load( $meta->object_id );
                return $this->hdlr_videochapterurl( $args, $ctx, $upload_file, true );
            }
        }
        return '';
    }

    function hdlr_videovtturl ( $args, $ctx, $upload_file = null, $retry = false ) {
        $app = $ctx->app;
        $upload_file = $upload_file ? $upload_file : $this->get_ctx_video( $args, $ctx );
        if (! $upload_file ) {
            return '';
        }
        $type = $args['type'] ?? 'vtt';
        if ( $type === 'subtitles' ) {
            $type = 'vtt';
        } else if ( $type === 'subtitle' ) {
            $type = 'vtt';
        } else if ( $type === 'chapters' ) {
            $type = 'chapter';
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key(
          ['object_id' => $upload_file->id, 'model' => 'upload_file', 'key' => $type, 'delete_flag' => [0, 1] ],
          ['sort' => 'delete_flag', 'direction' => 'ascend'] );
        if ( $url->id ) {
            if ( isset( $args['include_draft'] ) ) {
                return $url->url;
            } else if ( $app->fmgr->exists( $url->file_path ) ) {
                return $url->url;
            }
        }
        if (! $retry ) {
            $meta = $app->db->model( 'meta' )->get_by_key( ['model' => 'upload_file',
                                                            'value' => $upload_file->id,
                                                            'kind' => 'metadata',
                                                            'meta_key' => 'file_path'] );
            if ( $meta->id ) {
                $upload_file = $app->db->model( 'upload_file' )->load( $meta->object_id );
                return $this->hdlr_videovtturl( $args, $ctx, $upload_file, true );
            }
        }
        return '';
    }

    function hdlr_videoplaylisturl ( $args, $ctx ) {
        $app = $ctx->app;
        $upload_file = $this->get_ctx_video( $args, $ctx );
        if (! $upload_file ) {
            return '';
        }
        $urls = $app->db->model( 'urlinfo' )->load(
          ['object_id' => $upload_file->id, 'model' => 'upload_file', 'mime_type' => 'application/x-mpegURL', 'delete_flag' => [0, 1] ],
          ['sort' => 'delete_flag', 'direction' => 'ascend'] );
        $extention = PTUtil::get_extension( $upload_file->file_name );
        $basename = basename( $upload_file->file_path, ".{$extention}" ) . '.m3u8';
        $include_draft = isset( $args['include_draft'] );
        if ( empty( $urls ) ) {
            $meta = $app->db->model( 'meta' )->get_by_key( ['model' => 'upload_file',
                                                            'value' => $upload_file->id,
                                                            'kind' => 'metadata',
                                                            'meta_key' => 'file_path'] );
            if ( $meta->id ) {
                $upload_file = $app->db->model( 'upload_file' )->load( $meta->object_id );
                if ( $upload_file && $upload_file->mime_type === 'application/x-mpegURL' ) {
                    if ( $include_draft ) {
                        return $upload_file->url;
                    } else if ( $app->fmgr->exists( $upload_file->file_path ) ) {
                        return $upload_file->url;
                    }
                }
                return '';
            }
        }
        foreach ( $urls as $url ) {
            if ( basename( $url->file_path ) === $basename ) {
                if ( $include_draft ) {
                    return $url->url;
                } else if ( $app->fmgr->exists( $url->file_path ) ) {
                    return $url->url;
                } else {
                    return '';
                }
            }
        }
        return '';
    }

    function get_ctx_video ( $args, $ctx ) {
        $class = $args['class_type'] ?? 'video';
        $upload_file = $ctx->stash( 'upload_file' );
        if ( $upload_file && $upload_file->class === $class ) return $upload_file;
        $app = $ctx->app;
        $id = $args['id'] ?? null;
        $attr_id = $args['attr_id'] ?? null;
        if (! $attr_id && $id && !ctype_digit( (string) $id ) ) {
            $attr_id = $id;
            $id = null;
        }
        if (! $id ) {
            $id = $args['object_id'] ?? null;
        }
        $upload_file = null;
        if (! $id ) {
            if ( $app->param( '_preview' ) ) {
                $previewObj = $app->db->model( $app->param( '_model' ) )->new();
                $previewObj->workspace_id( (int) $app->param( 'workspace_id' ) );
                $scheme = $app->get_scheme_from_db( $app->param( '_model' ) );
                $column_defs = $scheme['column_defs'];
                $edit_properties = $scheme['edit_properties'];
                foreach ( $column_defs as $column => $column_def ) {
                    if ( $column_def['type'] == 'int' || $column_def['type'] == 'relation' ) {
                        if ( isset( $edit_properties[ $column ] ) && strpos( $edit_properties[ $column ], ':' ) !== false ) {
                            $props = explode( ':', $edit_properties[ $column ] );
                            if ( $props[1] == 'upload_file' ) {
                                $fieldValue = $app->param( $column );
                                if ( is_array( $fieldValue ) ) {
                                    foreach ( $fieldValue as $fieldVar ) {
                                        $upload_file = $app->db->model( 'upload_file' )->load( (int) $fieldVar );
                                        if ( is_object( $upload_file ) && $upload_file->class == $class ) {
                                            break;
                                        } else {
                                            $upload_file = null;
                                        }
                                    }
                                } else {
                                    $upload_file = $app->db->model( 'upload_file' )->load( (int) $fieldValue );
                                    if ( is_object( $upload_file ) && $upload_file->class == $class ) {
                                        break;
                                    } else {
                                        $upload_file = null;
                                    }
                                }
                            }
                        }
                    }
                }
                if (! $upload_file ) {
                    $fields = PTUtil::get_fields( $previewObj );
                    $field_types = $app->db->model( 'fieldtype' )->load_iter( ['basename' => ['IN' => [ $class, "{$class}s"] ] ], null, 'id' );
                    $field_types = $field_types->fetchAll( PDO::FETCH_COLUMN );
                    foreach ( $fields as $field ) {
                        if ( in_array( $field->fieldtype_id, $field_types ) ) {
                            $fieldValue = $app->param( $field->basename . '__c' );
                            if ( $fieldValue ) {
                                $fieldValue = json_decode( $fieldValue, true );
                                $fieldValue = array_values( $fieldValue );
                                if ( is_array( $fieldValue ) ) {
                                    foreach ( $fieldValue as $fieldVar ) {
                                        $upload_file = $app->db->model( 'upload_file' )->load( (int) $fieldVar );
                                        if ( is_object( $upload_file ) && $upload_file->class == $class ) {
                                            break;
                                        }
                                    }
                                } else {
                                    $upload_file = $app->db->model( 'upload_file' )->load( (int) $fieldValue );
                                    if ( is_object( $upload_file ) && $upload_file->class == $class ) {
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                $context = $ctx->stash( 'current_context' );
                if ( $context == 'upload_file' ) {
                    $upload_file = $ctx->stash( $context );
                    if ( $upload_file && $upload_file->class != $class ) {
                        return '';
                    }
                } else {
                    $obj = $ctx->stash( 'current_object' );
                    if (! $obj ) {
                        $context = $ctx->stash( 'current_context' );
                        $obj = $ctx->stash( $context );
                    }
                    if (! $obj ) {
                        return '';
                    }
                    $objects = $app->get_related_objs( $obj, 'upload_file', true );
                    foreach ( $objects as $upload_file ) {
                        if ( $upload_file->class == $class ) {
                            break;
                        }
                    }
                    if (! $upload_file ) {
                        $fields = $app->get_meta( $obj );
                        foreach ( $fields as $field ) {
                            if ( $field->kind == 'customfield' ) {
                                if ( $field->type == $class || $field->type == "{$class}s" ) {
                                    $file_id = $field->value;
                                    $upload_file = $app->db->model( 'upload_file' )->load( (int) $file_id );
                                    if ( $upload_file && $upload_file->class == $class ) {
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $upload_file = $app->db->model( 'upload_file' )->load( (int) $id );
        }
        if (! $upload_file ) {
            return '';
        }
        return $upload_file;
    }

    function hdlr_videojsscript ( $args, $ctx ) {
        $app = $ctx->app;
        $indent = $args['indent'] ?? '';
        if ( $indent ) {
            $indent = str_repeat( ' ', $indent );
        }
        $params = $args['params'] ?? null;
        if ( $params && strpos( $params, '?' ) !== 0 ) {
            $params = '?' . $params;
        }
        if ( isset( $args['link'] ) ) {
            $theme_static = $app->theme_static;
            if ( $args['link'] === '0' ) {
                $head = "{$indent}<link rel=\"stylesheet\" href=\"{$theme_static}common/css/video.css{$params}\">";
                $head .= PHP_EOL . "{$indent}<script src=\"{$theme_static}common/js/video.core.min.js{$params}\"></script>";
                $head .= PHP_EOL . "{$indent}<script src=\"{$theme_static}common/js/videojs-http-streaming.min.js{$params}\"></script>";
            } else {
                $head = "{$indent}<link rel=\"stylesheet\" href=\"{$theme_static}common/css/video8.css{$params}\">";
                $head .= PHP_EOL . "{$indent}<script src=\"{$theme_static}common/js/video8.min.js{$params}\"></script>";
                $head .= PHP_EOL . "{$indent}<script src=\"{$theme_static}common/js/video8.ja.js{$params}\"></script>";
                if ( isset( $args['theme'] ) ) {
                    if ( $args['theme'] === 'pcmsx' ) {
                        $head .= PHP_EOL . "{$indent}<link rel=\"stylesheet\" href=\"{$theme_static}common/css/video8.pcmsx_player.css{$params}\">";
                        $head .= PHP_EOL . "{$indent}<script src=\"{$theme_static}common/js/videojs-mobile-ui.min.js{$params}\"></script>";
                    }
                }
            }
            if ( isset( $args['mpeg_dash'] ) ) {
                $head .= PHP_EOL . "{$indent}<script src=\"{$theme_static}common/js/dash.all.min.js{$params}\"></script>";
                $head .= PHP_EOL . "{$indent}<script src=\"{$theme_static}common/js/videojs-dash.min.js{$params}\"></script>";
            }
            if ( isset( $args['googlefont'] ) ) {
                $googlefont = $args['googlefont'];
                $workspace = $ctx->stash( 'workspace' );
                $workspace_id = $workspace ? $workspace->id : 0;
                if ( $googlefont ) {
                    $font_face = $this->get_config_value( 'video_captions_font_face', $workspace_id );
                    $font_weight = $this->get_config_value( 'video_captions_font_weight', $workspace_id );
                    if ( $font_face == 'RocknRoll+One' || $font_face == 'BIZ+UDPMincho' ) {
                        $head .= PHP_EOL . $indent . '<link href="https://fonts.googleapis.com/css2?family=' . $font_face . '&amp;display=swap" rel="stylesheet">';
                    } else {
                        $head .= PHP_EOL . $indent . '<link href="https://fonts.googleapis.com/css2?family=' . $font_face . ':wght@' . $font_weight . '&amp;display=swap" rel="stylesheet">';
                    }
                }
            }
            return $head;
        }
        $id = $args['id'] ?? $app->video_captions_video_id;
        $ctx->vars['video_id'] = $id;
        $ctx->vars['video_theme'] = $args['theme'] ?? '';
        $ctx->vars['video_options'] = $args['options'] ?? null;
        $tmpl = $ctx->get_template_path( 'video-captions-video-js.tmpl' );
        $html = $app->build( $app->fmgr->get( $tmpl ) );
        if ( $indent ) {
            $html = $indent . trim( str_replace( "\n", "\n{$indent}", $html ) );
        }
        return $html;
    }

    function video_caption_example ( $app ) {
        if (! $app->can_do( 'upload_file', 'create' ) ) {
            return $app->json_error( 'Permission denied.' );
        }
        $path = $this->path() . DS . 'sample' . DS . 'I_am_a_cat.xlsx';
        PTUtil::export_data( $path );
    }

    function can_bake_captions ( $app ) {
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        $ffprobe = $app->simplifiedjapanese_ffprobe_path;
        $SimplifiedJapanese = $app->component( 'SimplifiedJapanese' );
        $wkhtmltoimage_path = $app->simplifiedjapanese_wkhtmltoimage_path;
        $can_bake = $app->video_captions_can_bake;
        if ( $can_bake && $ffprobe && $app->fmgr->exists( $ffprobe ) &&
            $SimplifiedJapanese && $wkhtmltoimage_path && $app->fmgr->exists( $wkhtmltoimage_path ) ) {
            return true;
        }
        return false;
    }

    function cleanup_tmp ( $app ) {
        $counter = 0;
        $backup_expires = $app->video_captions_backup_expires;
        $urls = $app->db->model( 'urlinfo' )->load_iter(
            ['model' => 'upload_file',
             'class' => ['!=' => 'hls_movie'],
             'mime_type' => ['!=' => 'application/x-mpegURL'] ], null, 'file_path' );
        while ( false !== $url = $urls->fetch( PDO::FETCH_COLUMN ) ) {
            $backup = $url . '.backup';
            if ( $app->fmgr->exists( $backup ) ) {
                $mtime = filemtime( $backup );
                $expires = $app->request_time - $mtime;
                if ( $backup_expires < $expires ) {
                    $app->fmgr->unlink( $backup );
                    $counter++;
                }
            }
        }
        $cache_expires = $app->video_captions_cache_expires;
        $dir = $app->support_dir . DS . 'cache' . DS . 'simplifiedjapanese_cache' . DS;
        $files = [];
        PTUtil::file_find( $dir, $files );
        foreach ( $files as $file ) {
            $mtime = filemtime( $file );
            $expires = $app->request_time - $mtime;
            if ( $cache_expires < $expires ) {
                $app->fmgr->unlink( $file );
                $counter++;
            }
        }
        return $counter;
    }
}