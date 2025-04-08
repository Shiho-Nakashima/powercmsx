<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
if (! defined( 'MB_ENCODE_NUMERICENTITY_MAP' ) ) {
    define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );
}

use Aws\Credentials\Credentials;
use Aws\Polly\PollyClient;
use Aws\Polly\Exception\PollyException;

class SimplifiedJapanese extends PTPlugin {

    const BRACKETS = ['=', '〈', '（', '【', '】', '『', '』', '(', ':', '：', '.', ',', '-', '?', ')', '．', '・',
                      '&', '!', '～', '〜', '~' , ']', '[', '@', '｢', '「', '｣', '」', '〉'];
    const KANJI_CHAR
        = '([\x{3005}\x{3007}\x{303b}\x{3400}-\x{9FFF}\x{F900}-\x{FAFF}\x{20000}-\x{2FFFF}])';
    const DUMMY_CHARS
        = ['Ａ', 'Ｂ', 'Ｃ', 'Ｄ', 'Ｅ', 'Ｆ', 'Ｇ', 'Ｈ', 'Ｉ', 'Ｊ', 'Ｋ', 'Ｌ', 'Ｍ', 'Ｎ',
           'Ｏ', 'Ｐ', 'Ｑ', 'Ｒ', 'Ｓ', 'Ｔ', 'Ｕ', 'Ｖ', 'Ｗ', 'Ｘ', 'Ｙ', 'Ｚ',
           'ａ', 'ｂ', 'ｃ', 'ｄ', 'ｅ', 'ｆ', 'ｇ', 'ｈ', 'ｉ', 'ｊ', 'ｋ', 'ｌ', 'ｍ', 'ｎ',
           'ｏ', 'ｐ', 'ｑ', 'ｒ', 'ｓ', 'ｔ', 'ｕ', 'ｖ', 'ｗ', 'ｘ', 'ｙ', 'ｚ',
           '１', '２', '３', '４', '５', '６', '７', '８', '９', '０',
           '①', '②', '③', '④', '⑤', '⑥', '⑦', '⑧', '⑨',];

    const DATE_KANA = [1 => 'ついたち', 2 => 'ふつか', 3 => 'みっか', 4 => 'よっか', 5 => 'いつか', 6 => 'むいか',
                       7 => 'なのか', 8 => 'ようか', 9 => 'ここのか', 10 => 'とおか', 20 => 'はつか',
                       14 => 'じゅうよっか', 19 => 'じゅうくにち', 24 => 'にじゅうよっか', 29 => 'にじゅうくにち'];

    const APPEND_THRESHOLD = 0.7;

    private $work_dir   = null;
    private $user_dics  = [];
    private $whole_dict = [];
    private $caching    = [];
    public  $separators = [];
    private $updated_obj= [];
    private $deleted_ws = [];
    public  $add_rp_tag = [];
    private $instances  = [];
    private $instances_dics = [];
    private $errors = [];
    private $access_token;
    private $client_id;
    private $client_secret;
    private $changed     = '';
    private $difficulty  = false;
    private $retry       = false;
    private $difficulty1 = '';
    private $difficulty2 = '';
    private $dictionaries= null;
    private $parsed      = [];
    public  $score       = [];
    public  $mapping     = [];
    private $in_modifier = true;
    private $appended    = [];
    private $commands    = [];
    private $export_mp3  = [];
    private $export_map  = [];
    private $js_captions = [];
    private $aws_key;
    private $aws_secret;
    private $aws_region;
    public  $resolution  = 1280;
    public  $caption_font_size = 300;
    public  $caption_text_shadow = 3;
    public  $upload_dirs = [];
    private $furigana_json_map = [];
    private $urlmapping_map = [];
    private $furigana_conv_map = [];
    private $dynamic_json_key = '';
    private $dynamic_json_mode = 1;

    function __construct () {
        parent::__construct();
        $app = Prototype::get_instance();
        if ( $app->id !== 'Bootstrapper' || !$app->simplifiedjapanese_can_embed_draft ) {
            return;
        }
        // $ua = "User-Agent' 'Mozilla/5.0 AppleWebKit/534.34 (KHTML, like Gecko)
        // wkhtmltoimage magic_token=c59c6ec6e57665ba134454f1bc7bda7d SimplifiedJapanese";
        if (! isset( $_SERVER['HTTP_USER_AGENT'] ) ) return;
        $ua = $_SERVER['HTTP_USER_AGENT'];
        if ( empty( $ua ) || strpos( $ua, 'SimplifiedJapanese' ) === false
            || stripos( $ua, 'magic_token=' ) === false ) {
            return;
        }
        $magic_token = preg_replace( "/^.*?magic_token=(.*)?\s.*$/", '$1', $ua );
        $session = $app->db->model( 'session' )->get_by_key( ['name' => $magic_token, 'kind' => 'SJ'] );
        if ( $session->id && $session->user_id && $session->expires > $app->request_time ) {
            $user = $app->db->model( 'user' )->load( $session->user_id );
            if ( $user && $user->status == 2 && !$user->lock_out ) {
                $app->user = $user;
                list( $request, $param ) = array_pad( explode( '?', $app->request_uri ), 2, null );
                $file_path = $_SERVER['DOCUMENT_ROOT'] . $request;
                if ( file_exists( $file_path ) ) {
                    $mime_type = PTUtil::get_mime_type( $file_path );
                    $app->print( file_get_contents( $file_path ), $mime_type );
                    exit();
                }
                $url = $app->db->model( 'urlinfo' )->get_by_key(
                    ['file_path' => $file_path, 'delete_flag' => [0, 1] ] );
                if ( $url->id && $url->model == 'asset' && $url->object_id ) {
                    $asset = $app->db->model( 'asset' )->load( $url->object_id );
                    if ( $asset && $asset->file ) {
                        $app->print( $asset->file, $asset->mime_type );
                        exit();
                    }
                }
            }
        }
    }

    function __destruct () {
        $app = Prototype::get_instance();
        $export_mp3 = $this->export_mp3;
        if (! empty( $export_mp3 ) ) {
            ini_set( 'max_execution_time', 7200 );
            foreach ( $export_mp3 as $out_path => $props ) {
                list( $text, $workspace_id, $js_caption, $language, $html_id ) = $props;
                $data = $this->_simplifiedjapanese_export_mp3( $app, $text, $workspace_id, true, true, $language, $html_id );
                if ( $data !== false ) {
                    if ( $js_caption && isset( $this->js_captions[ md5( $text ) ] ) ) {
                        $js = $this->js_captions[ md5( $text ) ];
                        $extention = PTUtil::get_extension( $js );
                        $js_path = preg_replace( "/[^\.]{1,}$/", $extention, $out_path );
                        if ( $app->fmgr->exists( $js ) ) {
                            $js_out = false;
                            $js_data = $app->fmgr->get( $js );
                            if ( $app->fmgr->exists( $js_path ) ) {
                                if ( md5_file( $js_path ) != md5 ( $js_data ) ) {
                                    $js_out = true;
                                }
                            } else {
                                $js_out = true;
                            }
                            if ( $js_out ) {
                                $urlinfo = null;
                                if ( isset( $this->export_map[ $out_path ] ) ) {
                                    $export_map = $this->export_map[ $out_path ];
                                    $model = $export_map['model'];
                                    $object_id = $export_map['object_id'];
                                    $urlinfo = $app->db->model( 'urlinfo' )->get_by_key(
                                      ['file_path' => $js_path, 'workspace_id' => $workspace_id,
                                       'object_id' => $object_id, 'model' => $model, 'key' => 'caption_js',
                                       'mime_type' => 'application/javascript', 'class' => 'plugin',
                                       'delete_flag' => [0, 1] ] );
                                    PTUtil::set_url_path( $urlinfo );
                                    $urlinfo->is_published( 1 );
                                    $urlinfo->was_published( 1 );
                                    $urlinfo->publish_file( 1 );
                                    $urlinfo->md5( md5( base64_encode( $js_data ) ) );
                                    $urlinfo->save();
                                }
                                $app->fmgr->put( $js_path, $js_data );
                                if ( $urlinfo ) {
                                    $urlinfo->filemtime( filemtime( $js_path ) );
                                    $urlinfo->save();
                                    if ( method_exists( $this, 'save_url' ) ) {
                                        $this->save_url( $urlinfo );
                                    }
                                }
                            }
                        }
                    }
                    if ( $app->fmgr->exists( $out_path ) ) {
                        if ( md5_file( $out_path ) === md5 ( $data ) ) {
                            sleep( 2 );
                            continue;
                        }
                    }
                    $urlinfo = null;
                    if ( isset( $this->export_map[ $out_path ] ) ) {
                        $export_map = $this->export_map[ $out_path ];
                        $model = $export_map['model'];
                        $object_id = $export_map['object_id'];
                        $urlinfo = $app->db->model( 'urlinfo' )->get_by_key(
                          ['file_path' => $out_path, 'workspace_id' => $workspace_id,
                           'object_id' => $object_id, 'model' => $model, 'key' => 'mp3',
                           'mime_type' => 'audio/mpeg', 'class' => 'plugin',
                           'delete_flag' => [0, 1] ] );
                        PTUtil::set_url_path( $urlinfo );
                        $urlinfo->is_published( 1 );
                        $urlinfo->was_published( 1 );
                        $urlinfo->publish_file( 1 );
                        $urlinfo->md5( md5( base64_encode( $data ) ) );
                    }
                    $app->fmgr->put( $out_path, $data );
                    if ( $urlinfo ) {
                        $urlinfo->filemtime( filemtime( $out_path ) );
                        $urlinfo->save();
                        if ( method_exists( $this, 'save_url' ) ) {
                            $this->save_url( $urlinfo );
                        }
                    }
                }
                sleep( 2 );
            }
        }
        if ( $this->work_dir ) {
            $this->upload_dirs[ $this->work_dir ] = true;
        }
        if (! empty ( $this->upload_dirs ) ) {
            $upload_dirs = $this->upload_dirs;
            $keys = array_map( 'strlen', array_keys( $upload_dirs ) );
            array_multisort( $keys, SORT_DESC, $upload_dirs );
            foreach ( $upload_dirs as $dir => $bool ) {
                if (! is_dir( $dir ) ) {
                    continue;
                }
                if ( $bool === false ) {
                    PTUtil::remove_dir( $dir, true );
                } else {
                    PTUtil::remove_dir( $dir );
                }
            }
            unset( $upload_dirs );
        }
    }

    function get_command ( $command, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        if ( isset( $this->commands[ $command ] ) ) {
            return $this->commands[ $command ];
        }
        $command_path = null;
        $param = null;
        if ( $command == 'mecab' ) {
            $command_path = PTUTil::property_exists( $app, 'simplifiedjapanese_mecab_path' )
                     ? $app->simplifiedjapanese_mecab_path
                     : '/usr/local/bin/mecab';
            $param = '-v';
        } else if ( $command == 'mecab_dict_index' ) {
            $command_path = PTUTil::property_exists( $app, 'simplifiedjapanese_mecab_dict_index_path' )
                     ? $app->simplifiedjapanese_mecab_dict_index_path
                     : '/usr/local/libexec/mecab/mecab-dict-index';
            $param = '-v';
        } else if ( $command == 'wkhtmltoimage' ) {
            $command_path = PTUTil::property_exists( $app, 'simplifiedjapanese_wkhtmltoimage_path' )
                     ? $app->simplifiedjapanese_wkhtmltoimage_path
                     : '/usr/local/bin/wkhtmltoimage';
            $param = '-V';
        } else if ( $command == 'wkhtmltopdf' ) {
            $command_path = PTUTil::property_exists( $app, 'simplifiedjapanese_wkhtmltopdf_path' )
                     ? $app->simplifiedjapanese_wkhtmltopdf_path
                     : '/usr/local/bin/wkhtmltopdf';
            $param = '-V';
        } else if ( $command == 'estcmd' ) {
            $command_path = PTUTil::property_exists( $app, 'simplifiedjapanese_estcmd_path' )
                     ? $app->simplifiedjapanese_estcmd_path
                     : '/usr/local/bin/estcmd';
            $param = 'version';
        }
        if (! $command_path ) {
            $this->commands[ $command ] = '';
            return '';
        }
        $test = escapeshellcmd( $command_path );
        $test .= " {$param}";
        exec( $test, $output, $return_var );
        if ( $return_var === 0 ) {
            $this->commands[ $command ] = $command_path;
            return $command_path;
        } else {
            $this->commands[ $command ] = '';
            return '';
        }
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $config = $this->path() . DS . 'config.json';
        $app->configure_from_json( $config );
        $config = dirname( $app->pt_path ) . DS . 'config.json';
        if ( file_exists( $config ) ) {
            $app->configure_from_json( $config );
            $app->cache_driver = null;
        }
        $mecab_path = $app->simplifiedjapanese_mecab_path;
        $mecab_dict_index = $app->simplifiedjapanese_mecab_dict_index_path;
        $mecab_dict_path = PTUTil::property_exists( $app, 'simplifiedjapanese_mecab_dic_path' )
                    ? $app->simplifiedjapanese_mecab_dic_path
                    : '/usr/local/lib/mecab/dic/ipadic';
        $error = 0;
        if ( $mecab_path ) { // or use api
            if (! $this->get_command( 'mecab' ) ) {
                $errors[] = $mecab_path
                  ? $this->translate( "Command mecab not found in '%s'.", $mecab_path )
                  : $this->translate( "System environment valiable '%s' is not specified.",
                                      'simplifiedjapanese_mecab_path' );
                $error++;
            }
            if (! $mecab_dict_index || ! $this->get_command( 'mecab_dict_index' ) ) {
                $errors[] = $mecab_dict_index
                  ? $this->translate( "Command mecab-dict-index not found in '%s'.", $mecab_dict_index )
                  : $this->translate( "System environment valiable '%s' is not specified.",
                                      'simplifiedjapanese_mecab_dict_index_path' );
                $error++;
            }
            if (! $mecab_dict_path || ! is_dir( $mecab_dict_path ) ) {
                $errors[] = $mecab_dict_path
                  ? $this->translate( "Dictionary not found in '%s'.", $mecab_dict_path )
                  : $this->translate( "System environment valiable '%s' is not specified.",
                                      'simplifiedjapanese_mecab_dic_path' );
                $error++;
            }
            if ( $error ) {
                $errors[] = $this->translate( 'Failed to activate SimplifiedJapanese plugin.' );
            }
        }
        if (! $error ) {
            $options = $app->db->model( 'option' )->load(
                ['key' => 'tinymce_toolbar', 'kind' => 'plugin_setting', 'extra' => 'tinymce'] );
            $client_id = $this->get_config_value( 'tsutaeru_client_id' );
            $client_secret = $this->get_config_value( 'tsutaeru_client_secret' );
            $buttons = $client_id && $client_secret
                     ? ' pt-simplified-japanese pt-break-with-clauses pt-furigana pt-ruby pt-remove-ruby'
                     : ' pt-break-with-clauses pt-furigana pt-ruby pt-remove-ruby';
            foreach ( $options as $option ) {
                $value = $option->value;
                if ( stripos( $value, 'pt-furigana' ) === false
                    && stripos( $value, 'pt-simplified-japanese' ) === false
                    && stripos( $value, 'pt-ruby' ) === false ) {
                    $option->value( $value . $buttons );
                    $option->save();
                }
            }
            $this->add_column_to_urlmapping( $app, $this, $this->version, $errors );
        }
        return $error === 0;
    }

    function add_column_to_urlmapping ( $app, $plugin, $version, &$errors ) {
        $upgrader = new PTUpgrader();
        $table = $app->get_table( 'urlmapping' );
        $upgrade = false;
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'furigana_json'
        ] );
        $order = 95;
        if (! $column->id ) {
            $trigger_scope = $app->db->model( 'column' )->get_by_key( [
                'table_id' => $table->id,
                'name' => 'trigger_scope'
            ] );
            if ( $trigger_scope->id ) {
                $order = $trigger_scope->order + 1;
            }
            $column_values = [
                'type' => 'tinyint',
                'label' => 'Generate JSON for Furigana',
                'index' => 0,
                'default' => '0',
                'size' => 4,
                'order' => $order,
                'edit' => 'checkbox',
                'list' =>  'checkbox',
                'not_null' => 0
            ];
            $upgrader->make_column( $table, 'furigana_json', $column_values, false );
            $upgrade = true;
        } else {
            $order = $column->order + 1;
        }
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'furigana_setting'
        ] );
        if (! $column->id ) {
            $column_values = [
                'type' => 'int',
                'label' => 'Furigana Setting',
                'index' => 0,
                'size' => 8,
                'order' => $order,
                'default' => 1,
                'not_null' => 1
            ];
            $upgrader->make_column( $table, 'furigana_setting', $column_values, false );
            $upgrade = true;
        }
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'furigana_urlmap'
        ] );
        if (! $column->id ) {
            $column_values = [
                'type' => 'string',
                'label' => 'Furigana URL Map',
                'size' => 255,
                'translate' => 1,
                'hint' => 'If not specified, no JSON file will be generated.',
                'edit' => 'text',
                'order' => $order + 1,
            ];
            $upgrader->make_column( $table, 'furigana_urlmap', $column_values, false );
            $upgrade = true;
        }
        if ( $upgrade ) {
            return $upgrader->upgrade_scheme( 'urlmapping' );
        }
    }

    function pre_save_plugin_config ( $cb, $app, $component, &$errors ) {
        if ( $component->id != 'simplifiedjapanese' ) {
            return true;
        }
        $style = $app->param( 'setting_simplifiedjapanese_custom_style' );
        if ( strpos( $style, '"' ) !== false || strpos( $style, '<' ) !== false
            || strpos( $style, '>' ) !== false ) {
            $errors[] = $this->translate( "Custom CSS cannot contain '\"', '<', '>'." );
            return false;
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $cache_dir = $app->support_dir . DS
                   . 'cache' . DS . 'simplifiedjapanese_cache' . DS . $workspace_id;
        if ( is_dir( $cache_dir ) ) {
            $this->upload_dirs[ $cache_dir ] = true;
        }
        $cache_dir = $app->support_dir . DS
                   . 'cache' . DS . 'simplifiedjapanese_cache' . DS . 'whole';
        if ( is_dir( $cache_dir ) ) {
            $this->upload_dirs[ $cache_dir ] = true;
        }
        $obj = $app->db->model( 'user_dic' )->get_by_key( ['workspace_id' => $workspace_id ] );
        if ( $obj->id ) {
            $this->update_user_dic( $app, $obj );
        }
        return true;
    }

    function simplifiedjapanese_tmp_delete ( $app ) {
        header( 'Content-type: application/json' );
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        if ( $magic_token != $app->current_magic ) {
            $app->json_error( 'Invalid request.' );
        }
        $workspace = $app->workspace();
        $workspace_id = $workspace ? $workspace->id : 0;
        $user_id = $app->user()->id;
        $meta = $app->db->model( 'meta' )->load( ['object_id' => $user_id,
                                                  'model' => 'user',
                                                  'kind' => 'temporary_data',
                                                  'number' => $workspace_id,
                                                  'key' => 'simplified_japanese'] );
        $count = count( $meta );
        if ( $count ) {
            $app->db->model( 'meta' )->remove_multi( $meta );
            echo json_encode( ['status' => 200 , 'result' => $count ] );
        } else {
            echo json_encode( ['status' => 404] );
        }
        exit();
    }

    function simplifiedjapanese_tmp_restore ( $app ) {
        header( 'Content-type: application/json' );
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        if ( $magic_token != $app->current_magic ) {
            $app->json_error( 'Invalid request.' );
        }
        $text = trim( $json['text'] );
        $number = $json['number'];
        $kind = trim( $json['kind'] );
        if ( $kind == 'backward' ) {
            $number--;
        } else {
            $number++;
        }
        $workspace = $app->workspace();
        $workspace_id = $workspace ? $workspace->id : 0;
        $user_id = $app->user()->id;
        $meta = $app->db->model( 'meta' )->get_by_key( ['object_id' => $user_id,
                                                        'model' => 'user',
                                                        'kind' => 'temporary_data',
                                                        'number' => $workspace_id,
                                                        'key' => 'simplified_japanese',
                                                        'field_id' => $number ] );
        if ( $meta->id ) {
            echo json_encode( ['status' => 200 , 'result' => $meta->text, 'number' => $number ] );
        } else {
            echo json_encode( ['status' => 404] );
        }
        exit();
    }

    function simplifiedjapanese_tmp_save ( $app ) {
        header( 'Content-type: application/json' );
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        if ( $magic_token != $app->current_magic ) {
            $app->json_error( 'Invalid request.' );
        }
        $text = trim( $json['text'] );
        $workspace = $app->workspace();
        $workspace_id = $workspace ? $workspace->id : 0;
        $user_id = $app->user()->id;
        $meta_last = $app->db->model( 'meta' )->get_by_key( ['object_id' => $user_id,
                                                             'model' => 'user',
                                                             'kind' => 'temporary_data',
                                                             'number' => $workspace_id,
                                                             'key' => 'simplified_japanese'],
                                                            ['sort' => 'field_id',
                                                             'direction' => 'descend',
                                                             'limit' => 1] );
        if ( $meta_last->id && $text == $meta_last->text ) {
            echo json_encode( ['status' => 200 , 'text' => $text ] );
            exit();
        }
        $count = $app->db->model( 'meta' )->count( ['object_id' => $user_id,
                                                    'model' => 'user',
                                                    'kind' => 'temporary_data',
                                                    'number' => $workspace_id,
                                                    'key' => 'simplified_japanese'] );
        $max = $app->simplifiedjapanese_editor_history;
        if ( $count >= $max ) {
            $limit = $count - $max;
            $limit++;
            $meta_objs = $app->db->model( 'meta' )->load( ['object_id' => $user_id,
                                                           'model' => 'user',
                                                           'kind' => 'temporary_data',
                                                           'number' => $workspace_id,
                                                           'key' => 'simplified_japanese'],
                                                          ['sort' => 'field_id',
                                                           'direction' => 'ascend',
                                                           'limit' => $limit ] );
            if (! empty( $meta_objs ) ) {
                $app->db->model( 'meta' )->remove_multi( $meta_objs );
            }
            $meta_objs = $app->db->model( 'meta' )->load( ['object_id' => $user_id,
                                                           'model' => 'user',
                                                           'kind' => 'temporary_data',
                                                           'number' => $workspace_id,
                                                           'key' => 'simplified_japanese'],
                                                          ['sort' => 'field_id',
                                                           'direction' => 'ascend'] );
            if (! empty( $meta_objs ) ) {
                foreach ( $meta_objs as $idx => $meta ) {
                    $number = $idx + 1;
                    $meta->field_id( $number );
                    $meta->save();
                }
            }
            $field_id = $max;
        } else {
            $field_id = $count + 1;
        }
        $meta = $app->db->model( 'meta' )->new( ['object_id' => $user_id,
                                                 'model' => 'user',
                                                 'kind' => 'temporary_data',
                                                 'number' => $workspace_id,
                                                 'field_id' => $field_id,
                                                 'key' => 'simplified_japanese'] );
        $meta->text( $text );
        $meta->save();
        echo json_encode( ['status' => 200 , 'text' => $text ] );
        exit();
    }

    function simplifiedjapanese_get_phonetic ( $app ) {
        $this->in_modifier = false;
        header( 'Content-type: application/json' );
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        if ( $magic_token != $app->current_magic ) {
            $app->json_error( 'Invalid request.' );
        }
        $shift_key = isset( $json['shift_key'] ) ? $json['shift_key'] : false;
        $text = trim( $json['text'] );
        if ( $shift_key ) {
            $text = preg_replace( "/<rt[^>]*?>.*?<\/rt>/si", '', $text );
            $text = preg_replace( "/<rp[^>]*?>.*?<\/rp>/si", '', $text );
            $text = preg_replace( "/<ruby[^>]*?>/si", '', $text );
            $text = preg_replace( "/<\/ruby>/i", '', $text );
            echo json_encode( ['status' => 200 , 'text' => $text, 'result' => ''] );
            exit();
        }
        $phonetic = '';
        if ( stripos( $text, '<ruby' ) === 0 && preg_match( "/<\/ruby>$/", $text ) ) {
            libxml_use_internal_errors( true );
            $html = '<html><body>' . $text;
            $dom = new DomDocument();
            if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                $elements = $dom->getElementsByTagName( 'ruby' );
                $source = '';
                if ( $elements->length ) {
                    for ( $i = 0; $i < $elements->length; $i++ ) {
                        $element = $elements->item( $i );
                        $source .= $element->firstChild->nodeValue;
                    }
                }
                if ( $source ) $text = $source;
                $elements = $dom->getElementsByTagName( 'rt' );
                $ruby = '';
                if ( $elements->length ) {
                    for ( $i = 0; $i < $elements->length; $i++ ) {
                        $element = $elements->item( $i );
                        if ( $element && $element->firstChild ) {
                            $ruby .= $element->firstChild->nodeValue;
                        }
                    }
                }
                if ( $ruby ) $phonetic = $ruby;
            }
        }
        $workspace = $app->workspace();
        $app->ctx->stash( 'workspace', $workspace );
        $workspace_id = $workspace ? $workspace->id : 0;
        $mecab = $this->get_mecab( $app, $workspace_id );
        if ( $text ) {
            $phonetic = $phonetic ? $phonetic : $this->get_phonetic( $text, $mecab );
        }
        if ( preg_match( "/[ぁ-んー]{1,}$/u", $text, $matches ) ) {
            $after = preg_quote( $matches[0], '/' );
            if ( mb_strlen( $after ) > $app->simplifiedjapanese_ruby_length
                && preg_match( "/{$after}$/", $phonetic ) ) {
                // The ruby tag may be selected.
                $text = preg_replace( "/{$after}$/", '', $text );
                $phonetic = preg_replace( "/{$after}$/", '', $phonetic );
            }
        }
        echo json_encode( ['status' => 200 , 'text' => $text, 'result' => $phonetic ] );
        exit();
    }

    function simplifiedjapanese_add_subtitles ( $app ) {
        // Move to VideoCaptions plugin.
        $SimplifiedJapanese = $app->component( 'SimplifiedJapanese' );
        ini_set( 'max_execution_time', 14400 );
        ignore_user_abort( true );
        $ctx = $app->ctx;
        $ctx->stash( 'workspace', $app->workspace() );
        $workspace_id = (int) $app->param( 'workspace_id' );
        // $width = $app->param( 'movie_width' ) ? $app->param( 'movie_width' ) : 1280;
        // $custom_style = $SimplifiedJapanese->get_config_value( 'simplifiedjapanese_custom_style', $workspace_id );
        // $ctx->vars['canvas_custom_style'] = $custom_style;
        $font = $SimplifiedJapanese->get_config_value( 'simplifiedjapanese_font', $workspace_id );
        $googleFont = $SimplifiedJapanese->get_config_value( 'simplifiedjapanese_google_font', $workspace_id );
        $font_face = $SimplifiedJapanese->get_config_value( 'simplifiedjapanese_font_face', $workspace_id );
        $ctx->vars['canvas_font'] = $font;
        $ctx->vars['canvas_webfont'] = $googleFont;
        $ctx->vars['canvas_font_face'] = $font_face;
        $ffmpeg = $app->simplifiedjapanese_ffmpeg_path;
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $data = json_decode( $json['text'], true );
        $id = (int) $app->param( 'id' );
        $upload_file = $app->db->model( 'upload_file' )->load( $id );
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['model' => 'upload_file', 'object_id' => $id ] );
        $file_path = $url->file_path;
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        $ffprobe = $app->simplifiedjapanese_ffprobe_path;
        $cmd = "{$ffprobe} {$file_path} -show_entries stream=width";
        exec( $cmd, $output, $return_var );
        $result = $output[1];
        $width = preg_replace( '/^width=/', '', $result );
        $width = (int) $width;
        if (! $width ) $width = 1280;
        $scale = $width / 1280;
        $top = 30 * $scale;
        $top = (int) $top;
        $extension = PTUtil::get_extension( $file_path );
        $postfix = $app->video_captions_postfix;
        $outFile = preg_replace( "/\.$extension$/", '', $file_path );
        $outFile .= $postfix . ".$extension";
        $file_url = $url->url;
        $file_url = preg_replace( "/\.$extension$/", '', $file_url );
        $file_url .= $postfix . ".$extension";
        $array = $data;
        $movie = $url->file_path;
        $upload_dir = $app->upload_dir();
        $audio = $upload_dir . DS . 'temp.aac';
        $cmd = "{$ffmpeg} -i {$movie} -vn -acodec copy {$audio}";
        exec( $cmd, $output, $return_var );
        $images = [];
        $filters = [];
        $out = $upload_dir . DS . 'tmp.' . $extension;
        if ( count( $array ) == 1 ) {
            $cmd = "{$ffmpeg} -i {$movie} -i ";
            $data = $array[0];
            list( $start, $end, $text, $color, $ruby, $pos ) = $data;
            if ( $color == 'white' ) {
                $ctx->vars['canvas_bgcolor'] = 'black';
                $ctx->vars['canvas_forecolor'] = 'white';
            } else {
                $ctx->vars['canvas_bgcolor'] = 'white';
                $ctx->vars['canvas_forecolor'] = 'black';
            }
            if ( $pos == 2 ) {
                $pos = '0:H-h';
            } else {
                $pos = '0:' . $top;
            }
            $start = (float) $start;
            $end = (float) $end;
            $app->ctx = $ctx;
            $image = $SimplifiedJapanese->generate_image( $text, $app, false, false, $width, $ruby );
            $cmd = "{$ffmpeg} -i {$movie} -i {$image} -filter_complex \"overlay={$pos}:enable='between(t,{$start},{$end})'\" {$out}";
        } else {
            foreach ( $array as $idx => $data ) {
                list( $start, $end, $text, $color, $ruby, $pos ) = $data;
                if ( $color == 'white' ) {
                    $ctx->vars['canvas_bgcolor'] = 'black';
                    $ctx->vars['canvas_forecolor'] = 'white';
                } else {
                    $ctx->vars['canvas_bgcolor'] = 'white';
                    $ctx->vars['canvas_forecolor'] = 'black';
                }
                if ( $pos == 2 ) {
                    $pos = '0:H-h';
                } else {
                    $pos = '0:' . $top;
                }
                $start = (float) $start;
                $end = (float) $end;
                $app->ctx = $ctx;
                $image = $SimplifiedJapanese->generate_image( $text, $app, false, false, $width, $ruby );
                $images[] = $image;
                if (! $idx ) {
                    $filters[] = "[0:v][1:v]overlay={$pos}:enable='between(t,{$start},{$end})'";
                } else {
                    $prev = $idx - 1;
                    $next = $idx + 1;
                    $filters[] = "[v{$prev}];[v{$prev}][{$next}:v]overlay={$pos}:enable='between(t,{$start},{$end})'";
                }
            }
            $cmd = "{$ffmpeg} -i {$movie} -i ";
            $cmd .= implode( ' -i ', $images ) . ' -filter_complex "';
            $cmd .= implode( '', $filters ) . '" ' . $out;
        }
        exec( $cmd, $output, $return_var );
        $path = $upload_dir . DS . 'movie.' . $extension;
        if ( $app->fmgr->exists( $audio ) ) {
            $cmd = "{$ffmpeg} -i {$out} -i {$audio} -c:v copy -c:a aac -strict experimental -map 0:v:0 -map 1:a:0 {$path}";
            exec( $cmd, $output, $return_var );
        } else {
            $app->fmgr->rename( $out, $path );
        }
        $app->fmgr->rename( $path, $outFile );
        $result = ['result'=> $file_url ];
        header( 'Content-type: application/json' );
        echo json_encode( $result );
        exit();
    }

    function simplifiedjapanese_export_img ( $app ) {
        $ctx = $app->ctx;
        $image_on_server = $app->simplifiedjapanese_wkhtmltoimage;
        if ( $image_on_server ) {
            $wkhtmltoimage = $this->get_command( 'wkhtmltoimage' );
            if ( $wkhtmltoimage ) {
                $ctx->vars['image_on_server'] = true;
                $image_on_server = true;
            } else {
                $ctx->vars['image_on_server'] = false;
            }
        }
        if ( $image_on_server ) {
            $html = $app->param( 'imageBase64' );
            if ( $app->param( 'target_id' ) == 'to_canvas_area' ) {
                $text_format = $app->param( 'text_format' );
                if ( $text_format == 'convert_breaks' ) {
                    $html = PTUtil::convert_breaks( $html );
                }
            }
            $ctx->stash( 'workspace', $app->workspace() );
            $workspace_id = (int) $app->param( 'workspace_id' );
            $bgcolor = $this->get_config_value( 'simplifiedjapanese_bgcolor', $workspace_id );
            $forecolor = $this->get_config_value( 'simplifiedjapanese_forecolor', $workspace_id );
            $custom_style = $this->get_config_value( 'simplifiedjapanese_custom_style', $workspace_id );
            $font = $this->get_config_value( 'simplifiedjapanese_font', $workspace_id );
            $googleFont = $this->get_config_value( 'simplifiedjapanese_google_font', $workspace_id );
            $font_face = $this->get_config_value( 'simplifiedjapanese_font_face', $workspace_id );
            $font_weight = $this->get_config_value( 'simplifiedjapanese_font_weight', $workspace_id );
            $ctx->vars['canvas_bgcolor'] = $bgcolor;
            $ctx->vars['canvas_forecolor'] = $forecolor;
            $ctx->vars['canvas_custom_style'] = $custom_style;
            $ctx->vars['canvas_font'] = $font;
            $ctx->vars['canvas_webfont'] = $googleFont;
            $ctx->vars['canvas_font_face'] = $font_face;
            $ctx->vars['canvas_font_weight'] = $font_weight;
            $image = $this->generate_image( $html, $app, false );
        } else {
            $image = base64_decode( $app->param( 'imageBase64' ) );
        }
        $app->validate_magic();
        $ts = date( 'Y-m-d_H-i-s' );
        header( 'Content-Type: application/octet-stream' );
        header( "Content-Disposition: attachment; filename=simplified-japanese-{$ts}.png" );
        echo $image;
        exit();
    }

    function simplifiedjapanese_helper ( $app ) {
        $app->get_scheme_from_db( 'workspace' );
        $this->in_modifier = false;
        $ctx = $app->ctx;
        $client_id = $this->get_config_value( 'tsutaeru_client_id' );
        $client_secret = $this->get_config_value( 'tsutaeru_client_secret' );
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        if ( $client_id && $client_secret ) {
            $ctx->vars['can_simplified'] = 1;
        }
        $ctx->stash( 'workspace', $app->workspace() );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $bgcolor = $this->get_config_value( 'simplifiedjapanese_bgcolor', $workspace_id );
        $forecolor = $this->get_config_value( 'simplifiedjapanese_forecolor', $workspace_id );
        $custom_style = $this->get_config_value( 'simplifiedjapanese_custom_style', $workspace_id );
        $font = $this->get_config_value( 'simplifiedjapanese_font', $workspace_id );
        $googleFont = $this->get_config_value( 'simplifiedjapanese_google_font', $workspace_id );
        $font_face = $this->get_config_value( 'simplifiedjapanese_font_face', $workspace_id );
        $font_weight = $this->get_config_value( 'simplifiedjapanese_font_weight', $workspace_id );
        $enable_summarize = $this->get_config_value( 'simplifiedjapanese_summarize', $workspace_id );
        $ctx->vars['canvas_bgcolor'] = $bgcolor;
        $ctx->vars['canvas_forecolor'] = $forecolor;
        $ctx->vars['canvas_custom_style'] = $custom_style;
        $ctx->vars['canvas_font'] = $font;
        $ctx->vars['canvas_webfont'] = $googleFont;
        $ctx->vars['canvas_font_face'] = $font_face;
        $ctx->vars['canvas_font_weight'] = $font_weight;
        $ctx->vars['enable_summarize'] = $enable_summarize;
        $image_on_server = $app->simplifiedjapanese_wkhtmltoimage;
        if ( $image_on_server ) {
            $wkhtmltoimage = $this->get_command( 'wkhtmltoimage' );
            if ( $wkhtmltoimage ) {
                $image_on_server = true;
                $ctx->vars['image_on_server'] = true;
            } else {
                $ctx->vars['image_on_server'] = false;
            }
        }
        $pdf_on_server = $app->simplifiedjapanese_wkhtmltopdf;
        if ( $pdf_on_server ) {
            $wkhtmltopdf = $this->get_command( 'wkhtmltopdf' );
            if ( $wkhtmltopdf ) {
                $pdf_on_server = true;
                $ctx->vars['pdf_on_server'] = true;
            } else {
                $ctx->vars['pdf_on_server'] = false;
            }
        }
        $ctx->vars['word_on_server'] = $app->composer_autoload ? file_exists( $app->composer_autoload ) :
                                       is_dir( LIB_DIR . 'PhpOffice' . DS . 'PhpWord' );
        if ( $app->composer_autoload ) {
            $aws_key = $this->get_config_value( 'simplifiedjapanese_aws_id' );
            $aws_secret = $this->get_config_value( 'simplifiedjapanese_aws_secret' );
            $can_audio = $this->get_config_value( 'simplifiedjapanese_can_audio', (int) $app->param( 'workspace_id' ) );
            if ( $aws_key && $aws_secret && $can_audio ) {
                $ctx->vars['mp3_on_server'] = true;
            }
        }
        if ( $app->request_method == 'POST' ) {
            if ( $app->param( '_type' ) && $app->param( '_type' ) == 'insert_editor' ) {
                $json_string = file_get_contents( 'php://input' );
                $json = json_decode( $json_string, true );
                $magic_token = $json['magic_token'];
                if ( $magic_token != $app->current_magic ) {
                    $app->json_error( 'Invalid request.' );
                }
                $text = $json['text'];
                if (! $text ) {
                    $app->json_error( $this->translate( 'No text selected.' ) );
                }
                $agreement = $json['agreement'] ?? null ;
                if ( $agreement && !$app->cookie_val( 'pt-sj-agreement' ) ) {
                    $path = $app->cookie_path ? $app->cookie_path : $app->path;
                    $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
                    $app->bake_cookie( 'pt-sj-agreement', 1, $expires, $path, true, $app->cookie_domain );
                }
                $simplified = $app->param( 'simplified_japanese' );
                $break_with_clauses = $app->param( 'break_with_clauses' );
                $arg = 1;
                $shift_key = $json['shift_key'];
                $option_key = isset( $json['option_key'] ) ? $json['option_key'] : false;
                if ( $break_with_clauses ) {
                    $arg = 3;
                } else if (! $simplified ) {
                    $split_in_editor = $this->get_config_value(
                    'simplifiedjapanese_split_in_editor', (int) $app->param( 'workspace_id' ) );
                    if ( $split_in_editor ) {
                        $arg = $shift_key ? 1 : 2;
                    } else {
                        $arg = $shift_key ? 2 : 1;
                    }
                } else {
                    if ( !$client_id || !$client_secret ) {
                        $app->json_error( $this->translate( 'Client ID and Client Secret are required.' ) );
                    }
                    $split_in_editor = $this->get_config_value(
                    'simplifiedjapanese_split_in_editor_s', (int) $app->param( 'workspace_id' ) );
                    if ( $split_in_editor ) {
                        $arg = $shift_key ? 1 : 2;
                    } else {
                        $arg = $shift_key ? 2 : 1;
                    }
                    $ruby_in_editor = $this->get_config_value(
                    'simplifiedjapanese_ruby_in_editor_s', (int) $app->param( 'workspace_id' ) );
                    if ( $option_key ) {
                        $ruby_in_editor = $ruby_in_editor ? false : true;
                    }
                    if (! $ruby_in_editor ) {
                        $arg = 6;
                    }
                    if ( $shift_key && $arg == 6 && !$split_in_editor ) {
                        $arg = 3;
                    } elseif ( ! $shift_key && 6 === $arg && $split_in_editor ) {
                        $arg = 3;
                    }
                }
                header( 'Content-type: application/json' );
                $remove_furigana = $app->param( 'remove_furigana' );
                if ( $remove_furigana ) {
                    $text_converted = preg_replace( '/<rt[^>]*?>.*?<\/rt>/si', '', $text );
                    $text_converted = preg_replace( '/<rp[^>]*?>.*?<\/rp>/si', '', $text_converted );
                    $text_converted = preg_replace( '/<\/{0,1}ruby[^>]*?>/si', '', $text_converted );
                    if ( $shift_key ) {
                        $separator = $this->get_config_value( 'simplifiedjapanese_separator', $workspace_id );
                        $text_converted = str_replace( $separator, '', $text_converted );
                    }
                } else {
                    $text_converted = $this->filter_furigana( $text, $arg, $ctx, $simplified );
                    $add_rt_style = $this->get_config_value(
                        'simplifiedjapanese_add_rt_style', (int) $app->param( 'workspace_id' ) );
                    if ( $add_rt_style && $app->param( 'from_mode' ) == 'simplifiedjapanese_helper' ) {
                        $text_converted = str_replace( '<rt>', '<rt style="font-size:0.5em">', $text_converted );
                    }
                }
                echo json_encode( ['status' => 200 ,'result' => $text_converted ] );
                exit();
            } else if ( $app->param( '_type' ) && $app->param( '_type' ) == 'export' ) {
                $app->validate_magic();
                $text_converted = trim( $app->param( 'text_converted' ) );
                $ts = date( 'Y-m-d_H-i-s' );
                header( 'Content-Type: application/octet-stream' );
                header( "Content-Disposition: attachment; filename=easy-japanese-{$ts}.html" );
                $ctx = $app->ctx;
                $tmpl = $ctx->get_template_path( 'simplifiedjapanese-export-html.tmpl' );
                $ctx->vars['page_title'] = strip_tags( $app->param( 'text_original' ) );
                $ctx->vars['page_body'] = $text_converted;
                echo $app->build_page( $tmpl );
                exit();
            }
            $text = trim( $app->param( 'text' ) );
            $agreement = $app->param( 'simplifiedjapanese_agreement' );
            if ( $agreement && !$app->cookie_val( 'pt-sj-agreement' ) ) {
                $path = $app->cookie_path ? $app->cookie_path : $app->path;
                $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
                $app->bake_cookie( 'pt-sj-agreement', 1, $expires, $path, true, $app->cookie_domain );
            }
            if ( $text ) {
                if ( $app->param( 'summarize' ) && $enable_summarize ) {
                    $summarize = (int) $app->param( 'summarize' );
                    if ( $summarize > 0 && $summarize < 11 ) {
                        $summarized = $this->summarize( $text, $summarize );
                        $text = '';
                        foreach ( $summarized as $summarize ) {
                            $text .= "<p>{$summarize}</p>";
                        }
                    }
                }
                $text = str_replace( '～', '〜', $text );
                $text = PTUtil::normalize( $text );
                if ( $text_format = $app->param( 'text_format' ) ) {
                    if ( $text_format == 'convert_breaks' ) {
                        $text = PTUtil::convert_breaks( $text );
                    }
                }
                $this->difficulty = true;
                $ctx->vars['converted'] = 1;
                $arg = 1;
                if ( $app->param( 'put_on_furigana' ) ) {
                    if ( $app->param( 'break_with_clauses' ) ) {
                        $arg = 2;
                    }
                } else if ( $app->param( 'break_with_clauses' ) ) {
                    $arg = 3;
                } else if (! $app->param( 'put_on_furigana' ) ) {
                    $arg = -1;
                }
                $simplified = $app->param( 'simplified_japanese' );
                if ( $simplified ) {
                    if ( $max_execution_time = $app->max_exec_time ) {
                        $max_execution_time = (int) $max_execution_time;
                        ini_set( 'max_execution_time', $max_execution_time );
                    }
                }
                $text_converted = $this->filter_furigana( $text, $arg, $ctx );
                $mode_email = $this->get_config_value( 'simplifiedjapanese_mode_email', (int) $app->param( 'workspace_id' ) );
                $add_rt_style = $this->get_config_value( 'simplifiedjapanese_add_rt_style', (int) $app->param( 'workspace_id' ) );
                if ( $mode_email ) {
                    $bracket_start = $this->get_config_value( 'simplifiedjapanese_bracket_start', (int) $app->param( 'workspace_id' ) );
                    $bracket_end = $this->get_config_value( 'simplifiedjapanese_bracket_end', (int) $app->param( 'workspace_id' ) );
                    $text_converted = preg_replace( '!<rp>.*?</rp>!si', '', $text_converted );
                    $text_converted = preg_replace( '!<rt>(.*?)</rt>!si', $bracket_start . '$1' . $bracket_end, $text_converted );
                    $text_converted = str_replace( '<ruby>', '', $text_converted );
                    $text_converted = str_replace( '</ruby>', '', $text_converted );
                } else {
                    if ( $add_rt_style && $app->param( 'from_mode' ) == 'simplifiedjapanese_helper' ) {
                        $text_converted = str_replace( '<rt>', '<rt style="font-size:0.5em">', $text_converted );
                    }
                }
                $ctx->vars['text_converted'] = $text_converted;
                if ( $simplified ) {
                    $text_simplified = $this->filter_furigana( $text, $arg, $ctx, $simplified );
                    if ( $mode_email ) {
                        $bracket_start = $this->get_config_value( 'simplifiedjapanese_bracket_start', (int) $app->param( 'workspace_id' ) );
                        $bracket_end = $this->get_config_value( 'simplifiedjapanese_bracket_end', (int) $app->param( 'workspace_id' ) );
                        $text_simplified = preg_replace( '!<rp>.*?</rp>!si', '', $text_simplified );
                        $text_simplified = preg_replace( '!<rt>(.*?)</rt>!si', $bracket_start . '$1' . $bracket_end, $text_simplified );
                        $text_simplified = str_replace( '<ruby>', '', $text_simplified );
                        $text_simplified = str_replace( '</ruby>', '', $text_simplified );
                    } else {
                        if ( $add_rt_style && $app->param( 'from_mode' ) == 'simplifiedjapanese_helper' ) {
                            $text_simplified = str_replace( '<rt>', '<rt style="font-size:0.5em">', $text_simplified );
                        }
                    }
                    $ctx->vars['text_simplified'] = $text_simplified;
                }
                $ctx->vars['text_format'] = $app->param( 'text_format' );
                if (! empty( $this->errors ) ) {
                    $ctx->vars['errors'] = array_keys( $this->errors );
                }
                $show_morphological = $this->get_config_value( 'simplifiedjapanese_morphological', (int) $app->param( 'workspace_id' ) );
                if ( $show_morphological ) {
                    $ctx->vars['mecab_parsed'] = $this->mecab_parse( strip_tags( $text ) );
                }
                $ctx->vars['changed'] = $this->changed;
                $ctx->vars['difficulty1'] = $this->difficulty1;
                $ctx->vars['difficulty2'] = $this->difficulty2;
            }
        }
        $ua = $_SERVER['HTTP_USER_AGENT'];
        if ( empty( $ua ) || strpos( $ua , 'Edge/' ) !== false ) {
        } elseif ( strpos( $ua , 'Trident/' ) !== false || strpos( $ua , 'MSIE ' ) !== false ) {
            $ctx->vars['is_internet_explorer'] = 1;
        }
        if (! isset( $ctx->vars['converted'] ) ) {
            $app->param( 'put_on_furigana', 1 );
            $_REQUEST['put_on_furigana'] = 1;
        }
        $editorHeight = $app->cookie_val( 'pt-editor-crient-height-' . $workspace_id );
        $textFormat   = $app->cookie_val( 'pt-furigana-helper-text_format-' . $workspace_id );
        $ctx->vars['richtext_editor_height'] = (int) $editorHeight;
        if (! $textFormat ) {
            $ctx->vars['text_format'] = 'richtext';
        } else {
            $ctx->vars['text_format'] = $textFormat;
        }
        if ( $client_id && $client_secret ) {
            $ctx->vars['can_tsutaeru_web'] = 1;
        }
        $add_rp = $this->get_config_value( 'simplifiedjapanese_add_rp', $workspace_id );
        $ctx->vars['simplifiedjapanese_add_rp'] = $add_rp;
        $fontCss = $ctx->vars['__add_content_styles'] ?? [];
        $add_method = $app->admin_url . '?__mode=simplifiedjapanese_content_css';
        if ( $workspace_id ) $add_method .= '&workspace_id=' . $workspace_id;
        $fontCss[] = $add_method;
        if ( $googleFont && $font_face ) {
            $font_face = str_replace( ' ', '+', $font_face );
            if ( $font_face == 'RocknRoll+One' || $font_face == 'BIZ+UDPMincho' ) {
                $fontCss[] = $app->simplifiedjapanese_google_font_url . 'family=' . $font_face . '&display=swap';
            } else {
                $fontCss[] = $app->simplifiedjapanese_google_font_url . 'family=' . $font_face . ':wght@' . $font_weight . '&display=swap';
            }
        }
        $ctx->vars['__add_content_styles'] = $fontCss;
        $editor_buttons = isset( $ctx->vars['editor_buttons'] ) ? $ctx->vars['editor_buttons'] : '';
        $tinymce_version = (int)$app->tinymce_version;
        if ( $tinymce_version && $tinymce_version == 4 ) {
            $tmpl = $app->ctx->get_template_path( 'simplifiedjapanese-editor_buttons_4.tmpl' );
        } else {
            $tmpl = $app->ctx->get_template_path( 'simplifiedjapanese-editor_buttons.tmpl' );
        }
        $editor_buttons .= $app->build( file_get_contents( $tmpl ) );
        $ctx->vars['editor_buttons'] = $editor_buttons;
        $ctx->vars['simplifiedjapanese_assets_base'] = $app->simplifiedjapanese_assets_base;
        $user_id = $app->user()->id;
        $meta = $app->db->model( 'meta' )->get_by_key( ['object_id' => $user_id,
                                                        'model' => 'user',
                                                        'kind' => 'temporary_data',
                                                        'number' => $workspace_id,
                                                        'key' => 'simplified_japanese'],
                                                       ['sort' => 'field_id',
                                                        'direction' => 'descend'] );
        $ctx->vars['simplifiedjapanese_tmp_save_number'] = 0;
        if ( $meta->id ) {
            $ctx->vars['simplifiedjapanese_tmp_save_text'] = $meta->text;
            $ctx->vars['simplifiedjapanese_tmp_save_number'] = $meta->field_id;
            $last = $meta->field_id;
            $last++;
            if ( $app->simplifiedjapanese_editor_history <= $last ) {
                $ctx->vars['max_temporary_data'] = true;
            }
        }
        $ctx->vars['page_title'] = $this->translate( 'Simplified Japanese' );
        return $app->__mode( $app->mode );
    }

    function simplifiedjapanese_content_css ( $app ) {
        $ctx = $app->ctx;
        $client_id = $this->get_config_value( 'tsutaeru_client_id' );
        $client_secret = $this->get_config_value( 'tsutaeru_client_secret' );
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        if ( $client_id && $client_secret ) {
            $ctx->vars['can_simplified'] = 1;
        }
        $ctx->stash( 'workspace', $app->workspace() );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $bgcolor = $this->get_config_value( 'simplifiedjapanese_bgcolor', $workspace_id );
        $forecolor = $this->get_config_value( 'simplifiedjapanese_forecolor', $workspace_id );
        $custom_style = $this->get_config_value( 'simplifiedjapanese_custom_style', $workspace_id );
        $font = $this->get_config_value( 'simplifiedjapanese_font', $workspace_id );
        $googleFont = $this->get_config_value( 'simplifiedjapanese_google_font', $workspace_id );
        $font_face = $this->get_config_value( 'simplifiedjapanese_font_face', $workspace_id );
        $ctx->vars['canvas_bgcolor'] = $bgcolor;
        $ctx->vars['canvas_forecolor'] = $forecolor;
        $ctx->vars['canvas_custom_style'] = $custom_style;
        $ctx->vars['canvas_font'] = $font;
        $ctx->vars['canvas_webfont'] = $googleFont;
        $ctx->vars['canvas_font_face'] = $font_face;
        $tmpl = $app->ctx->get_template_path( 'simplifiedjapanese-content-css.tmpl' );
        header( 'Content-type: text/css; charset=UTF-8' );
        echo $app->build( file_get_contents( $tmpl ) );
    }

    function simplifiedjapanese_export_pdf ( $app ) {
        $app->validate_magic();
        $ctx = $app->ctx;
        $html = $app->param( 'imageBase64' );
        $ctx->stash( 'workspace', $app->workspace() );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $bgcolor = $this->get_config_value( 'simplifiedjapanese_bgcolor', $workspace_id );
        $forecolor = $this->get_config_value( 'simplifiedjapanese_forecolor', $workspace_id );
        $custom_style = $this->get_config_value( 'simplifiedjapanese_custom_style', $workspace_id );
        $font = $this->get_config_value( 'simplifiedjapanese_font', $workspace_id );
        $googleFont = $this->get_config_value( 'simplifiedjapanese_google_font', $workspace_id );
        $font_face = $this->get_config_value( 'simplifiedjapanese_font_face', $workspace_id );
        $font_weight = $this->get_config_value( 'simplifiedjapanese_font_weight', $workspace_id );
        $ctx->vars['canvas_bgcolor'] = $bgcolor;
        $ctx->vars['canvas_forecolor'] = $forecolor;
        $ctx->vars['canvas_custom_style'] = $custom_style;
        $ctx->vars['canvas_font'] = $font;
        $ctx->vars['canvas_webfont'] = $googleFont;
        $ctx->vars['canvas_font_face'] = $font_face;
        $ctx->vars['canvas_font_weight'] = $font_weight;
        $pdf = $this->generate_image( $html, $app, false, true );
        $ts = date( 'Y-m-d_H-i-s' );
        header( 'Content-Type: application/octet-stream' );
        header( "Content-Disposition: attachment; filename=simplified-japanese-{$ts}.pdf" );
        echo $pdf;
        exit();
    }

    function hdlr_makemp3 ( $args, $ctx ) {
        $app = $ctx->app;
        $path = $args['path'] ?? '';
        $path = trim( str_replace( '../', '', $path ) );
        $path = str_replace( '..\\', '', $path );
        $path = str_replace( ["\r", "\n"], '', $path );
        $text = $args['text'] ?? '';
        $text = trim( $text );
        if (! $path || ! $text ) return;
        if (! preg_match( '/\.mp3$/i', $path ) ) {
            $path .= '.mp3';
        }
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? (int) $workspace->id : 0;
        $site_path = $workspace ? $workspace->site_path : $app->site_path;
        $site_url = $workspace ? $workspace->site_url : $app->site_url;
        $out_path = rtrim( $site_path, '/\\' ) . DS . $path;
        $url = rtrim( $site_url, '/' ) . '/' . $path;
        if ( $app->id === 'Prototype' && $app->param( '_preview' ) ) {
            // $data = $this->_simplifiedjapanese_export_mp3( $app, $text, $workspace_id, true );
            // file_put_contents( $out_path, $data );
            return $url;
        }
        $js_caption = isset( $args['js_caption'] ) ?? false;
        $language = $args['language'] ?? null;
        if (! $language ) {
            $language = $args['lang'] ?? null;
        }
        $id = $args['id'] ?? null;
        $this->export_mp3[ $out_path ] = [ $text, $workspace_id, $js_caption, $language, $id ];
        $context = $ctx->stash( 'current_context' );
        $obj = $ctx->stash( $context );
        if ( $obj ) {
            $this->export_map[ $out_path ] = ['model' => $obj->_model, 'object_id' => $obj->id ];
        }
        return $url;
    }

    function simplifiedjapanese_export_mp3 ( $app ) {
        $agreement = $app->param( 'polly_agreement' );
        if ( $agreement && !$app->cookie_val( 'polly_agreement' ) ) {
            $path = $app->cookie_path ? $app->cookie_path : $app->path;
            $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
            $app->bake_cookie( 'pt-sj-polly-agreement', 1, $expires, $path, true, $app->cookie_domain );
        }
        return $this->_simplifiedjapanese_export_mp3( $app, null );
    }

    function _simplifiedjapanese_export_mp3 ( $app, $text, $workspace_id = null, $func = false, $generateJS = true, $lang = null, $html_id = null ) {
        if ( $text === null ) $text = '';
        $caption_key = md5( $text );
        $ctx = $app->ctx;
        $text = $text ? $text : trim( $app->param( 'imageBase64' ) );
        $mp3_by_month = $app->simplifiedjapanese_mp3_by_month;
        $workspace_id = $workspace_id !== null ? $workspace_id : (int) $app->param( 'workspace_id' );
        // In External Preview, $app->user()->id is -1 and language is null.
        if (! $lang ) {
            $lang = $app->user() ? $app->user()->language : $app->language;
            if (! $lang && $workspace_id ) {
                $workspace = $app->db->model( 'workspace' )->load( $workspace_id, null, 'language' );
                $lang = $workspace->language;
            }
            if (! $lang ) {
                $lang = $app->language;
            }
        }
        if (! $func && $mp3_by_month !== -1 ) {
            $by_scope = $app->simplifiedjapanese_mp3_by_scope;
            $terms = ['category' => 'simplifiedjapanese_mp3', 'level' => 1];
            $offset_time = $app->offset_time( $app->timezone );
            list( $start, $end ) = PTUtil::start_end_month( date( 'YmdHis', $this->start_time ) );
            $start = strtotime( $start ) + $offset_time;
            $start = date( 'Y-m-d H:i:s', $start );
            $terms['created_on'] = ['>=' => $start ];
            if ( $by_scope ) {
                $terms['workspace_id'] = (int) $app->param( 'workspace_id' );
            }
            $count = $app->db->model( 'log' )->count( $terms );
            if ( $count > $mp3_by_month ) {
                $_REQUEST['text'] = $text;
                $app->param( 'text', $text );
                $app->request_method = 'GET';
                $app->ctx->vars['user_language'] = $lang;
                $app->mode = 'simplifiedjapanese_helper';
                $app->ctx->vars['error'] = $this->translate( 'The monthly download limit has been exceeded. You can download %s times.', $mp3_by_month );
                return $this->simplifiedjapanese_helper( $app );
            }
        }
        if (! $func ) {
            $app->validate_magic();
        }
        $aws_key = $this->aws_key ? $this->aws_key : $this->get_config_value( 'simplifiedjapanese_aws_id' );
        $aws_secret = $this->aws_secret ? $this->aws_secret : $this->get_config_value( 'simplifiedjapanese_aws_secret' );
        $aws_region = $this->aws_region ? $this->aws_region : $this->get_config_value( 'simplifiedjapanese_aws_region' );
        $this->aws_key = $aws_key;
        $this->aws_secret = $aws_secret;
        $this->aws_region = $aws_region;
        $text = preg_replace( "/<rp[^>]*?>.*?<\/rp>/si", '', $text );
        libxml_use_internal_errors( true );
        $text = '<html><body>' . $text;
        $dom = new DomDocument();
        // <ruby>日本橋<rt>にっぽんばし</rt></ruby>
        // <phoneme type="ruby" ph="にっぽんばし">日本橋</phoneme>
        if ( $dom->loadHTML( mb_encode_numericentity( $text, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
            LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
            $elements = $dom->getElementsByTagName( 'ruby' );
            if ( $elements->length ) {
                $i = $elements->length - 1;
                while ( $i > -1 ) {
                    $element = $elements->item( $i );
                    $i -= 1;
                    $original = $element->firstChild ? $element->firstChild->nodeValue : null;
                    $furigana = $element->lastChild  ? $element->lastChild->nodeValue : null;
                    if ( $original === null || $furigana == null ) {
                        // Invalid SSML request.
                        $element->parentNode->replaceChild( $dom->createTextNode( '' ), $element );
                        continue;
                    }
                    $phoneme = $dom->createElement( 'phoneme', $original );
                    if ( strpos( $furigana, "'" ) !== false ) {
                        $furigana = mb_convert_kana( $furigana, 'C' );
                        $phoneme->setAttribute( 'alphabet', 'x-amazon-pron-kana' );
                    } else {
                        $phoneme->setAttribute( 'type', 'ruby' );
                    }
                    $phoneme->setAttribute( 'ph', $furigana );
                    $element->parentNode->replaceChild( $phoneme, $element );
                }
            }
            if ( PHP_VERSION >= 8.2 ) {
                $text = html_entity_decode( $dom->saveHTML() );
            } else {
                $text = mb_convert_encoding( $dom->saveHTML(), 'utf-8', 'HTML-ENTITIES' );
            }
            $text = preg_replace( '!</body></html>$!si', '', $text );
        } else {
            if ( preg_match_all( "!<ruby[^>]*?>(.*?)<rt[^>]*?>(.*?)</rt>(.*?)</ruby>!si", $text, $matches ) ) {
                $phrases = $matches[0];
                foreach ( $phrases as $idx => $phrase ) {
                    $content = $matches[1][ $idx ] . $matches[3][ $idx ];
                    $rt = $matches[2][ $idx ];
                    if ( strpos( $rt, "'" ) !== false ) {
                        $rt = mb_convert_kana( $rt, 'C' );
                        $tag = "<phoneme alphabet=\"x-amazon-pron-kana\" ph=\"{$rt}\">{$content}</phoneme>";
                    } else {
                        $tag = "<phoneme type=\"ruby\" ph=\"{$rt}\">{$content}</phoneme>";
                    }
                    $text = str_replace( $phrase, $tag, $text );
                }
            }
        }
        $text = preg_replace( '/^<html><body>/si', '', $text );
        $text = str_replace( ['＜', '＞', '＆'], ['&lt;', '&gt;', '&amp;'], $text );
        $text = str_replace( '～', '〜', $text );
        $text = PTUtil::normalize( $text );
        $breaks = ['</h1>', '</h2>', '</h3>', '</h4>', '</h5>',
                   '</h6>', '</li>', '</dt>', '</dd>', '</td>',
                   '</th>', '</p>'];
        $replaced_phoneme = [];
        if ( preg_match_all( "!<phoneme.*?</phoneme>!si", $text, $matches ) ) {
            $matches = $matches[0];
            foreach ( $matches as $matche ) {
                $magic = $this->magic( $text );
                $quoted = preg_quote( $matche, '/' );
                $text = preg_replace( "/$quoted/", $magic, $text );
                $replaced_phoneme[ $magic ] = $matche;
            }
        }
        $contents = preg_split( '/(<[^>]*?>)/s',
                    $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
        $brackets = self::BRACKETS;
        $content = '';
        foreach ( $contents as $data ) {
            if ( $data === '' ) continue;
            if ( ( strpos( $data, '<' ) === false && strpos( $data, '>' ) === false ) ) {
                $data = str_replace( '&nbsp;', '<break />', $data );
                foreach ( $brackets as $bracket ) {
                    if ( $bracket === '&' || $bracket === ';' ) {
                        // Character Reference
                        continue;
                    }
                    $data = str_replace( $bracket, $bracket . '<break />', $data );
                }
                $content .= $data;
            } else {
                foreach ( $breaks as $break ) {
                    $breakTag = strpos( $break, '</h' ) === 0 ? '<break time="0.6s" />' : '<break time="0.3s" />';
                    $data = preg_replace( "!{$break}!i", $breakTag, $data );
                }
                $content .= $data;
            }
        }
        foreach ( $replaced_phoneme as $magic => $phoneme ) {
            $content = str_replace( $magic, $phoneme, $content );
        }
        $content = str_replace( '。', '。<break time="0.6s" />', $content );
        $text = $content;
        $quoted = self::magic( $text );
        $start_tag = self::magic( $text );
        $end_tag = self::magic( $text );
        $text = str_replace( '"', $quoted, $text );
        $text = str_replace( '<', $start_tag, $text );
        $text = str_replace( '>', $end_tag, $text );
        $text = htmlspecialchars( $text, ENT_COMPAT, 'UTF-8', false );
        $text = str_replace( '"', '&quot;', $text );
        $text = str_replace( $quoted, '"', $text );
        $text = str_replace( $start_tag, '<', $text );
        $text = str_replace( $end_tag, '>', $text );
        $text = strip_tags( $text, '<phoneme><break>' . $app->simplifiedjapanese_caption_allowed );
        $voice = $this->get_config_value( 'simplifiedjapanese_voice', $workspace_id );
        $pitch = $this->get_config_value( 'simplifiedjapanese_pitch', $workspace_id );
        $rate = $this->get_config_value( 'simplifiedjapanese_rate', $workspace_id );
        $add_rp = $this->get_config_value( 'simplifiedjapanese_add_rp', $workspace_id );
        $caching = $this->get_config_value( 'simplifiedjapanese_caching', $workspace_id );
        $cache_dir = $this->get_cache_dir( $workspace_id, $app );
        $ts = date( 'Y-m-d_H-i-s' );
        if ( $app->simplifiedjapanese_ffmpeg_path && ! $app->simplifiedjapanese_ffprobe_path ) {
            $app->simplifiedjapanese_ffprobe_path = dirname( $app->simplifiedjapanese_ffmpeg_path ) . DS . 'ffprobe';
        }
        if ( $app->simplifiedjapanese_ffmpeg_path && $app->simplifiedjapanese_ffprobe_path && $generateJS ) {
            $text = str_replace( ["\r\n", "\r", "\n"], '', $text );
            $original = $text;
            $ffmpeg = escapeshellcmd( $app->simplifiedjapanese_ffmpeg_path );
            $ffprobe = escapeshellcmd( $app->simplifiedjapanese_ffprobe_path );
            $paragraphs = preg_split( '!<break\stime=".*?"\s/>!', $text );
            $before = 0;
            foreach ( $paragraphs as $idx => $para ) {
                if ( mb_strlen( strip_tags( $para ) ) < 5 && isset( $paragraphs[ $idx - 1 ] ) ) {
                    $paragraphs[ $before ] .= $para;
                    unset( $paragraphs[ $idx ] );
                    continue;
                }
                $before = $idx;
            }
            $htmls = [];
            foreach ( $paragraphs as $idx => $para ) {
                if (! strip_tags( $para ) ) {
                    unset( $paragraphs[ $idx ] );
                    continue;
                }
                $source = $paragraphs[ $idx ];
                if ( strpos( $source, '<phoneme' ) !== false ) {
                    $source = $add_rp ? 
                        preg_replace( '!<phoneme type="ruby" ph="(.*?)">(.*?)</phoneme>!',
                              '<ruby>$2<rp> (</rp><rt>$1</rt><rp>) </rp></ruby>', $source ) : 
                        preg_replace( '!<phoneme type="ruby" ph="(.*?)">(.*?)</phoneme>!',
                                  '<ruby>$2<rt>$1</rt></ruby>', $source );
                    if ( strpos( $source, 'alphabet="x-amazon-pron-kana"' ) !== false ) {
                        preg_match_all( '!<phoneme alphabet="x\-amazon\-pron\-kana" ph="(.*?)">(.*?)</phoneme>!', $source, $matches );
                        if (! empty( $matches ) ) {
                            $ph_tags = $matches[0];
                            $furiganas = $matches[1];
                            $parents = $matches[2];
                            foreach ( $ph_tags as $idx => $ph_tag ) {
                                $k_kana = $furiganas[ $idx ];
                                $k_kana = mb_convert_kana( $k_kana, 'c' );
                                $k_kana = str_replace( "'", '', $k_kana );
                                $ph_tag_replace = '<phoneme alphabet="x-amazon-pron-kana" ph="' . $k_kana . '">' . $parents[ $idx ] . '</phoneme>';
                                $source = str_replace( $ph_tag, $ph_tag_replace, $source );
                            }
                        }
                    }
                    $source = $add_rp ? 
                        preg_replace( '!<phoneme alphabet="x\-amazon\-pron\-kana" ph="(.*?)">(.*?)</phoneme>!',
                              '<ruby>$2<rp> (</rp><rt>$1</rt><rp>) </rp></ruby>', $source ) : 
                        preg_replace( '!<phoneme alphabet="x\-amazon\-pron\-kana" ph="(.*?)">(.*?)</phoneme>!',
                                  '<ruby>$2<rt>$1</rt></ruby>', $source );
                }
                $source = strip_tags( $source, '<ruby><rt><rp>' . $app->simplifiedjapanese_caption_allowed );
                $source = $this->filter_furigana( $source, 2, $app->ctx );
                $htmls[ $idx ] = trim( str_replace( ["\r\n", "\n", "\r"], '', $source ) );
                // $paragraphs[ $idx ] .= '<break />';
            }
            $upload_dir = $app->upload_dir() . DS . "simplified-japanese-{$ts}";
            $this->upload_dirs[ dirname( $upload_dir ) ] = true;
            require_once( $app->composer_autoload );
            $credentials = new Credentials( $aws_key, $aws_secret );
            $client = new PollyClient( [
                        'region' => 'ap-northeast-1',
                        'version' => 'latest',
                        'credentials' => $credentials
                    ] );
            $list = $upload_dir . DS . 'list.txt';
            $vtt_path = $upload_dir . DS . "simplified-japanese-{$ts}.vtt";
            $file_list = '';
            $vtt = "WEBVTT\n\n";
            $start = 0.000;
            $mp3_files = [];
            $start_end_caption = [];
            $success = false;
            foreach ( $paragraphs as $idx => $para ) {
                foreach ( $brackets as $bracket ) {
                    if ( strpos( $para, $bracket . '<break />' ) !== false ) {
                        $para = str_replace( $bracket . '<break />', '<break />', $para );
                    }
                }
                $para = trim( strip_tags( $para, '<phoneme><break>' ) );
                if (! $para ) {
                    continue;
                }
                $text = "<speak xml:lang=\"{$lang}\"><prosody rate=\"{$rate}\" pitch=\"{$pitch}\">{$para}<break time=\"0.6s\" /></prosody></speak>";
                $cache = $cache_dir . DS . md5( $text ) . '-polly.mp3';
                if ( $caching && $app->fmgr->exists( $cache ) ) {
                    $data = $app->fmgr->get( $cache );
                    $success = true;
                } else {
                    try {
                        $result = $client->synthesizeSpeech( [
                                    'OutputFormat' => 'mp3',
                                    'Text' => $text,
                                    'TextType' => 'ssml',
                                    'VoiceId' => $voice,
                                ] );
                        $data = $result['AudioStream'];
                        if ( $caching ) {
                            $app->fmgr->put( $cache, $data );
                        }
                        $success = true;
                    } catch ( PollyException $e ) {
                        $message = $this->translate(
                                'An error occues while creating MP3 file(%s).', $e->getAwsErrorMessage() );
                        if ( $app->mode == 'simplifiedjapanese_export_mp3' ) {
                            return $app->error( $message );
                        } else {
                            $this->log( $message, 'error', ['text' => $text, 'voice' => $voice ], $workspace_id );
                        }
                        continue;
                    }
                }
                $path = $upload_dir . DS . $idx . '.mp3';
                $app->fmgr->put( $path, $data );
                $mp3_files[] = $path;
                $file_list .= "file '{$path}'\n";
                $cmd =  $ffprobe . ' ' . $path . ' -hide_banner -show_entries format=duration';
                $result = shell_exec( $cmd );
                if ( preg_match( '/duration=(.*)\n/i', $result, $matchs ) ) {
                    $seconds = trim( $matchs[1] );
                    $seconds = (float) $seconds;
                    $end = $start + $seconds - 0.2;
                    $start_end = ['start' => $start, 'end' => $end, 'caption' => $htmls[ $idx ] ];
                    $start_end_caption[] = $start_end;
                    list( $_start, $_end ) = [ $this->sec2hms( $start ), $this->sec2hms( $end ) ];
                    $vtt .= "$_start --> $_end\n";
                    $vtt .= $htmls[ $idx ];
                    $vtt .= "\n\n";
                    $start += $seconds;
                }
            }
            if (! $success ) {
                if ( $app->mode == 'simplifiedjapanese_export_mp3' ) {
                    $message = $this->translate( 'An error occues while creating MP3 file.' );
                    return $app->error( $message );
                }
                return false;
            }
            $vtt = trim( $vtt );
            $file_list = trim( $file_list );
            $app->fmgr->put( $list, $file_list );
            $mp3_name = "simplified-japanese-{$ts}.mp3";
            $js_name  = "simplified-japanese-{$ts}." . $app->simplifiedjapanese_caption_ext;
            $cmd =  $ffmpeg . '  -f concat -safe 0 -i ' . $list . ' -c copy ' . $upload_dir . DS . $mp3_name;
            exec( $cmd, $output, $return_var );
            $data = $app->fmgr->get( $upload_dir . DS . $mp3_name );
            foreach ( $mp3_files as $mp3_file ) {
                $app->fmgr->unlink( $mp3_file );
            }
            $app->fmgr->unlink( $list );
            $app->ctx->vars['captions_loop'] = $start_end_caption;
            if ( $app->simplifiedjapanese_caption_js_tmpl ) {
                $tmpl = $app->ctx->get_template_path( $app->simplifiedjapanese_caption_js_tmpl );
                $app->ctx->vars['html_id'] = $html_id;
                $js = $app->ctx->build( file_get_contents( $tmpl ) );
                $app->fmgr->put( $upload_dir . DS . $js_name, $js );
                $this->js_captions[ $caption_key ] = $upload_dir . DS . $js_name;
            } else {
                $app->fmgr->put( $vtt_path, $vtt );
            }
            if ( $func ) {
                return $data;
            }
            $archive = $upload_dir . '.zip';
            PTUtil::make_zip_archive( $upload_dir, $archive );
            $nickname = $app->user()->nickname;
            $message = $this->translate( 'The MP3 file exported by %s.', $nickname );
            $app->log( ['message'  => $message,
                        'category' => 'simplifiedjapanese_mp3',
                        'metadata' => $original,
                        'level'    => 'info'] );
            PTUtil::export_data( $archive );
            exit();
        }
        foreach ( $brackets as $bracket ) {
            if ( strpos( $text, $bracket . '<break />' ) !== false ) {
                $text = str_replace( $bracket . '<break />', '<break />', $text );
            }
        }
        $text = "<speak xml:lang=\"{$lang}\"><prosody rate=\"{$rate}\" pitch=\"{$pitch}\">{$text}</prosody></speak>";
        $maxlength = 3000;
        if ( mb_strlen( $text ) > $maxlength ) {
            if ( $func ) {
                return false;
            }
            $_REQUEST['text'] = $text;
            $app->param( 'text', $text );
            $app->request_method = 'GET';
            $app->ctx->vars['user_language'] = $lang;
            $app->mode = 'simplifiedjapanese_helper';
            $app->ctx->vars['error'] = $this->translate( 'The text exceeds the character limit. Text must be up to %s characters.', $maxlength );
            return $this->simplifiedjapanese_helper( $app );
        }
        $cache = $cache_dir . DS . md5( $text ) . '-polly.mp3';
        if ( $caching && $app->fmgr->exists( $cache ) ) {
            $data = $app->fmgr->get( $cache );
        } else {
            require_once( $app->composer_autoload );
            $credentials = new Credentials( $aws_key, $aws_secret );
            $client = new PollyClient( [
                        'region' => 'ap-northeast-1',
                        'version' => 'latest',
                        'credentials' => $credentials
                    ] );
            try {
                $result = $client->synthesizeSpeech( [
                            'OutputFormat' => 'mp3',
                            'Text' => $text,
                            'TextType' => 'ssml',
                            'VoiceId' => $voice,
                        ] );
                $data = $result['AudioStream'];
                if ( $caching ) {
                    $app->fmgr->put( $cache, $data );
                }
            } catch ( PollyException $e ) {
                $message = $this->translate(
                        'An error occues while creating MP3 file(%s).', $e->getAwsErrorMessage() );
                if ( $app->mode == 'simplifiedjapanese_export_mp3' ) {
                    return $app->error( $message );
                } else {
                    $this->log( $message, 'error', ['text' => $text, 'voice' => $voice ], $workspace_id );
                    return false;
                }
            }
        }
        if ( $func ) {
            return $data;
        }
        header( 'Content-Type: application/octet-stream' );
        header( "Content-Disposition: attachment; filename=simplified-japanese-{$ts}.mp3" );
        echo $data;
        $nickname = $app->user()->nickname;
        $message = $this->translate( 'The MP3 file exported by %s.', $nickname );
        $app->log( ['message'  => $message,
                    'category' => 'simplifiedjapanese_mp3',
                    'metadata' => $text,
                    'level'    => 'info'] );
        exit();
    }

    function sec2hms ( $seconds ) {
        $seconds = (string) $seconds;
        $decimal = '000';
        if ( strpos( $seconds, '.' ) !== false ) {
            list( $seconds, $decimal ) = explode( '.', $seconds );
        }
        if ( $seconds < 3600 ) {
            $hours = 0;
        } else {
            $hours = floor( $seconds / 3600 );
        }
        if ( $seconds < 60 ) {
            $minutes = 0;
        } else {
            $tmp = floor( $seconds / 60 );
            $minutes = floor( $tmp % 60 );
            // $minutes = floor( ( $seconds / 60 ) % 60 );
        }
        $seconds = $seconds % 60;
        $hms = sprintf( "%02d:%02d:%02d", $hours, $minutes, $seconds );
        $decimal = substr( $decimal, 0, 3 );
        $decimal = str_pad( $decimal, 3, STR_PAD_RIGHT );
        $hms .= '.' . $decimal;
        return $hms;
    }

    function simplifiedjapanese_export_word ( $app ) {
        if ( $app->composer_autoload && file_exists( $app->composer_autoload ) ) {
            require_once( $app->composer_autoload );
        }
        $app->validate_magic();
        $html = $app->param( 'imageBase64' );
        $html = preg_replace( '/\sstyle=".*?"/si', '', $html );
        $html = preg_replace( '!<rp>.*?</rp>!si', '', $html );
        $html = strip_tags( $html, '<ruby><rt><p><br>' );
        $html = str_replace( '&nbsp;&nbsp;', ' ', $html );
        $html = str_replace( '&nbsp;', ' ', $html );
        $html = str_replace( '<p><ruby></ruby></p>', '', $html );
        $ctx = $app->ctx;
        $ruby = file_get_contents( $this->path() . DS . 'tmpl' . DS . 'ruby.tmpl' );
        $paragraph = file_get_contents( $this->path() . DS . 'tmpl' . DS . 'paragraph.tmpl' );
        $textNode = file_get_contents( $this->path() . DS . 'tmpl' . DS . 'textNode.tmpl' );
        $ruby = str_replace( ["\r", "\n"], '', $ruby );
        $paragraph = str_replace( ["\r", "\n"], '', $paragraph );
        $textNode = str_replace( ["\r", "\n"], '', $textNode );
        libxml_use_internal_errors( true );
        $html = '<html><body>' . $html;
        $dom = new DomDocument();
        if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
            LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
            $elements = $dom->getElementsByTagName( 'ruby' );
            if ( $elements->length ) {
                $i = $elements->length - 1;
                while ( $i > -1 ) {
                    $element = $elements->item( $i );
                    $i -= 1;
                    $original = $element->firstChild->nodeValue;
                    $furigana = $element->lastChild->nodeValue;
                    $ctx->vars['original'] = $original;
                    $ctx->vars['furigana'] = $furigana;
                    $ctx->vars['magic'] = $this->magic( $html );
                    $inner = $ctx->build( $ruby );
                    $element->parentNode->replaceChild( $dom->createTextNode( $inner ), $element );
                }
            }
            $xpath = new DOMXpath($dom);
            $query1 = '/html/body/text()[string-length(normalize-space()) > 0]';
            $query2 = '/html/body//p/text()[string-length(normalize-space()) > 0]';
            $query = $query1 . '|' . $query2 ;
            $text_nodes = $xpath->query( $query );
            $i = 0;
            foreach ( $text_nodes as $node ) {
                $text = $node->nodeValue;
                if ( strpos( $text, '<' ) === false ) {
                    $ctx->vars['text'] = $text;
                    $inner = $ctx->build( $textNode );
                    $node->parentNode->replaceChild( $dom->createTextNode( $inner ), $node );
                }
            }
            if ( PHP_VERSION >= 8.2 ) {
                $out = html_entity_decode( $dom->saveHTML() );
            } else {
                $out = mb_convert_encoding( $dom->saveHTML(), 'utf-8', 'HTML-ENTITIES' );
            }
            $out = preg_replace( '/^<html><body>/si', '', $out );
            $out = preg_replace( '!</body></html>$!si', '', $out );
            if ( stripos( $out, '<p' ) !== false ) {
                $out = preg_replace( '/<p[^>]*?>/si', $paragraph, $out );
                $out = preg_replace( '/<\/p>/i', '</w:p>', $out );
            } else {
                $out = "{$paragraph}{$out}</w:p>";
            }
            $out = preg_replace( '!<br[^/]*?>!i', '<w:br />', $out );
            // $font = '<w:rPr><w:rFonts w:ascii="ＭＳ Ｐゴシック" w:eastAsia="ＭＳ Ｐゴシック" w:hAnsi="ＭＳ Ｐゴシック"/></w:rPr>';
            // $out = str_replace( '<w:t>', $font . '<w:t>', $out );
            $html = $out;
        }
        $html = str_replace( ["\r", "\n"], '', $html );
        $tmpl = $this->path() . DS . 'tmpl' . DS . 'template.docx';
        // $phpWord = new \PhpOffice\PhpWord\PhpWord();
        \PhpOffice\PhpWord\Settings::setTempDir( $app->temp_dir );
        // $template = $phpWord->loadTemplate( $tmpl );
        $template = new \PhpOffice\PhpWord\TemplateProcessor( $tmpl );
        $template->setValue( 'tagname', $html );
        $tmpfile = $template->save();
        $ts = date( 'Y-m-d_H-i-s' );
        header( 'Content-Type: application/octet-stream' );
        header( "Content-Disposition: attachment; filename=simplified-japanese-{$ts}.docx" );
        echo file_get_contents( $tmpfile );
        unlink( $tmpfile );
        unset( $phpWord );
    }

    function generate_image ( $html, $app = null, $base64 = true, $pdf = false, $caption = false, $ruby = false ) {
        $app = $app ? $app : Prototype::get_instance();
        $cmd = escapeshellcmd( $app->simplifiedjapanese_wkhtmltoimage_path );
        if ( $pdf ) {
            $cmd = escapeshellcmd( $app->simplifiedjapanese_wkhtmltopdf_path );
        }
        if ( $ruby ) {
            $html = $this->filter_furigana( $html, $ruby, $app->ctx );
            if ( $caption ) {
                if ( preg_match( "/<rt[^>]*>.*?<\/rt>/", $html ) ) {
                    $html = preg_replace( "/<rt[^>]*>(.*?)<\/rt>/si", '<rt><span class="ruby">$1</span></rt>', $html );
                }
            }
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $caching = isset( $this->caching[ $workspace_id ] ) ? $this->caching[ $workspace_id ]
                 : $this->get_config_value( 'simplifiedjapanese_caching', $workspace_id );
        $fmgr = $app->fmgr;
        $image = null;
        if ( $fmgr->exists( $cmd ) ) {
            $upload_dir = $app->upload_dir();
            $end = preg_quote( '</p><br style="clear:both;height:0">', '/' );
            if ( preg_match( "/{$end}$/", $html ) ) {
                $app->ctx->vars['text_format'] = 'richtext';
            }
            $end = preg_quote( '<br style="clear:both;height:0">', '/' );
            $html = preg_replace( "/{$end}$/", '', $html );
            $app->ctx->vars['html'] = $html;
            $base_html = $app->admin_url;
            $base_html = preg_replace( '!/[^/]*$!', '', $base_html ) . '/';
            $app->ctx->vars['base_html'] = $base_html;
            $app->ctx->vars['export_type'] = $pdf ? 'pdf' : 'image';
            $basename = $caption ? 'simplifiedjapanese-wkhtmltoimage-caption.tmpl' : 'simplifiedjapanese-wkhtmltoimage.tmpl';
            $tmpl = $app->ctx->get_template_path( $basename );
            if ( $caption ) {
                $font_size = $this->caption_font_size;
                $scale = $caption / $this->resolution;
                $font_size *= $scale;
                $font_size = (int) $font_size;
                $app->ctx->vars['font_size'] = $font_size;
                $shadow = $this->caption_text_shadow;
                $shadow *= $scale;
                $app->ctx->vars['text_shadow'] = $shadow;
                if ( preg_match( "/<rt[^>]*>.*?<\/rt>/", $html ) ) {
                    $line_height = '2.3em';
                } else {
                    $line_height = '1.3em';
                }
                $app->ctx->vars['line_height'] = $line_height;
            }
            $render_html = $app->build( file_get_contents( $tmpl ) );
            $html_title = '';
            $html_header_path = '';
            $html_footer_path = '';
            libxml_use_internal_errors( true );
            if ( $pdf ) {
                $dom = new DomDocument();
                $plain_html = preg_replace( "/<rt>.*?<\/rt>/", '', $render_html );
                $plain_html = preg_replace( "/<rp>.*?<\/rp>/", '', $plain_html );
                if ( $dom->loadHTML( mb_encode_numericentity( $plain_html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                    LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                    for ( $i = 1; $i < 7; $i++ ) {
                        if ( $html_title ) break;
                        $headings = $dom->getElementsByTagName( 'h' . $i );
                        if ( $headings->length ) {
                            for ( $i = 0; $i < $headings->length; $i++ ) {
                                $ele = $headings->item( $i );
                                $html_title = trim( $ele->textContent );
                                $children = $ele->childNodes;
                                if (! $html_title && $children->length ) {
                                    $html_title = $this->get_title_from_node( $ele->childNodes, $html_title );
                                }
                                if ( $html_title ) break 2;
                            }
                        }
                    }
                }
            }
            $dom = new DomDocument();
            if ( $dom->loadHTML( mb_encode_numericentity( $render_html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                if ( stripos( $render_html, '<img' ) !== false || stripos( $render_html, '<a' ) !== false ) {
                    $ratio = $pdf ? 0.9 : 1.4;
                    $changed_html = false;
                    $base = dirname( $app->ctx->vars['script_uri'] ) . '/';
                    $site_url = $app->workspace() ? $app->workspace()->site_url : $app->site_url;
                    $begin = preg_quote( $site_url, '/' );
                    $images = $dom->getElementsByTagName( 'img' );
                    if ( $images->length ) {
                        for ( $i = 0; $i < $images->length; $i++ ) {
                            $ele = $images->item( $i );
                            $src = $ele->getAttribute( 'src' );
                            if ( strpos( $src, '/' ) === 0 ) {
                                if ( strpos( $src, '?' ) !== false ) {
                                    list( $src, $param ) = explode( '?', $src );
                                }
                                $url_terms = ['relative_url' => $src, 'delete_flag' => [0, 1], 'workspace_id' => $workspace_id ];
                                $urlinfo = $app->db->model( 'urlinfo' )->get_by_key(
                                    $url_terms,
                                    ['sort' => 'delete_flag', 'direction' => 'ascend'] );
                                if (! $urlinfo->id && !$workspace_id ) {
                                    $src_url = rtrim( $site_url, '/' ) . $src;
                                    unset( $url_terms['workspace_id'] );
                                    $url_terms['url'] = $src_url;
                                    $urlinfo = $app->db->model( 'urlinfo' )->get_by_key(
                                        $url_terms,
                                        ['sort' => 'delete_flag', 'direction' => 'ascend'] );
                                }
                                $data = null;
                                $extension = PTUtil::get_extension( $src );
                                $mime_type = PTUtil::get_mime_type( $extension );
                                if ( $urlinfo->id ) {
                                    if ( $app->fmgr->exists( $urlinfo->file_path ) ) {
                                        $data = $app->fmgr->get( $urlinfo->file_path );
                                    } else if ( $urlinfo->meta_id ) {
                                        $meta = $app->db->model( 'meta' )->load( $urlinfo->meta_id );
                                        if ( $meta ) {
                                            $data = $meta->blob;
                                        }
                                    } else {
                                        $obj = $app->db->model( $urlinfo->model )->load( $urlinfo->object_id );
                                        if ( $obj ) {
                                            $class = $urlinfo->class;
                                            if ( $obj->has_column( $class ) ) {
                                                $data = $obj->$class;
                                            }
                                        }
                                    }
                                    $mime_type = $urlinfo->mime_type;
                                }
                                if ( $data ) {
                                    $data = base64_encode( $data );
                                    $data = "data:{$mime_type};base64,{$data}";
                                    $ele->setAttribute( 'src', $data );
                                    $changed_html = true;
                                }
                            } else if (! preg_match( '/^https{0,1}:\/\//', $src ) ) {
                                $src = PTUtil::convert2abs( $src, $base );
                                $ele->setAttribute( 'src', $src );
                                $changed_html = true;
                            } else if (! preg_match( "/^$begin/", $src ) ) {
                                $encoded = rawurlencode( $src );
                                $src = $app->admin_url . '?__mode=simplifiedjapanese_proxy&amp;url=';
                                $src .= $encoded;
                                if ( $app->workspace() ) {
                                    $src .= '&amp;workspace_id=' . $app->workspace()->id;
                                }
                                $ele->setAttribute( 'src', $src );
                                $changed_html = true;
                            }
                            $width = $ele->getAttribute( 'width' );
                            $height = $ele->getAttribute( 'height' );
                            if ( $width && $height ) {
                                $width = round( $width * $ratio );
                                $height = round( $height * $ratio );
                                $ele->setAttribute( 'width', $width );
                                $ele->setAttribute( 'height', $height );
                                $changed_html = true;
                            }
                        }
                    }
                    $anchors = $dom->getElementsByTagName( 'a' );
                    if ( $anchors->length ) {
                        for ( $i = 0; $i < $anchors->length; $i++ ) {
                            $ele = $anchors->item( $i );
                            $href = $ele->getAttribute( 'href' );
                            if (! preg_match( '/^https{0,1}:\/\//', $href ) ) {
                                $href = PTUtil::convert2abs( $href, $base );
                                $ele->setAttribute( 'href', $href );
                                // $ele->setAttribute( 'target', '_blank' );
                                $changed_html = true;
                            }
                        }
                    }
                    if ( $pdf && $app->simplifiedjapanese_pdf_header_footer ) {
                        $header_footer = $app->ctx->get_template_path( 'simplifiedjapanese-wkhtml-header-footer.tmpl' );
                        $headers = $dom->getElementsByTagName( 'header' );
                        if ( $headers->length ) {
                            $ele = $headers->item( 0 );
                            $outerHTML = PTUtil::outerHTML( $ele );
                            $ele->parentNode->removeChild( $ele );
                            $app->ctx->vars['html_header_footer'] = $outerHTML;
                            $header_html = $app->build( file_get_contents( $header_footer ) );
                            $html_header_path = $upload_dir . DS . 'wkhtml-header.html';
                            $app->fmgr->put( $html_header_path, $header_html );
                            $html_header_path = escapeshellarg( $html_header_path );
                            $changed_html = true;
                        }
                        $footers = $dom->getElementsByTagName( 'footer' );
                        if ( $footers->length ) {
                            $ele = $footers->item( 0 );
                            $outerHTML = PTUtil::outerHTML( $ele );
                            $ele->parentNode->removeChild( $ele );
                            $app->ctx->vars['html_header_footer'] = $outerHTML;
                            $footer_html = $app->build( file_get_contents( $header_footer ) );
                            $html_footer_path = $upload_dir . DS . 'wkhtml-footer.html';
                            $app->fmgr->put( $html_footer_path, $footer_html );
                            $html_footer_path = escapeshellarg( $html_footer_path );
                            $changed_html = true;
                        }
                    }
                    if ( $changed_html ) {
                        $render_html = $dom->saveHTML();
                    }
                }
            }
            $cache_key = null;
            if ( $caching && $caption ) {
                $cache_key = 'captions' . DS . md5( $render_html ) . '-caption.png';
                if ( $this->get_cache( $cache_key ) !== null ) {
                    $cache_dir = $app->support_dir . DS . 'cache' . DS . $this-> id . '_cache' . DS;
                    return $cache_dir . $cache_key;
                }
            }
            $html_path = $upload_dir . DS . 'wkhtmltoimage.html';
            $fmgr->put( $html_path, $render_html );
            $image_path = $pdf ? $upload_dir . DS . 'wkhtmltoimage.pdf'
                        : $upload_dir . DS . 'wkhtmltoimage.png';
            $width = (int) $app->param( 'window_width' );
            $width = round( $width * 3.89 );
            if (! $width ) $width = 2500;
            if ( $caption ) {
                $width = $caption;
            }
            $session = null;
            if ( $app->simplifiedjapanese_can_embed_draft ) {
                $magic = $app->magic();
                $session = $app->db->model( 'session' )->get_by_key(
                    ['name' => $magic, 'kind' => 'SJ', 'user_id' => $app->user()->id ] );
                $session->start( $app->request_time );
                $session->expires( $app->request_time + 3600 );
                $session->save();
                $ua = "Mozilla/5.0 AppleWebKit/534.34 (KHTML, like Gecko) wkhtmltoimage magic_token={$magic} SimplifiedJapanese";
                $cmd .= " --custom-header 'User-Agent' '{$ua}' --custom-header-propagation";
            }
            if ( $pdf ) {
                if ( $html_header_path ) {
                    $cmd .= " --header-html {$html_header_path} ";
                }
                if ( $html_footer_path ) {
                    $cmd .= " --footer-html {$html_footer_path} ";
                } else if ( $app->simplifiedjapanese_pdf_page_number ) {
                    $cmd .= " --footer-center '[page]/[topage]' ";
                }
                if (! $html_title ) {
                    $html_title = strip_tags( $html );
                }
                $separator = $this->get_config_value( 'simplifiedjapanese_separator', $workspace_id );
                $html_title = str_replace( $separator, ' ', $html_title );
                $html_title = str_replace( '&nbsp;', ' ', $html_title );
                $html_title = $app->ctx->modifier_truncate( $html_title, '80+...', $app->ctx );
                $html_title = str_replace( ["\r\n", "\r", "\n"], '', $html_title );
                $html_title = escapeshellarg( $html_title );
                // TODO spesify font-size by window_width.
                // TODO -O Landscape -s B4
                $top = $html_header_path ? 10 : 5;
                $bottom = $html_footer_path || $app->simplifiedjapanese_pdf_page_number ? 10 : 5;
                $cmd .= " --title {$html_title} -T {$top} -L 0 -B {$bottom} -R 0 --disable-smart-shrinking {$html_path} {$image_path}";
            } else {
                $quality = (int) $app->simplifiedjapanese_image_quality;
                if (! $quality || $quality > 10 ) {
                    $quality = 5;
                }
                $cmd .= " --width {$width} --quality {$quality} {$html_path} {$image_path}";
            }
            // $result = shell_exec( $cmd );
            $descriptorspec = [];
            $pipes = [];
            $proc = proc_open( $cmd, $descriptorspec, $pipes );
            proc_close( $proc );
            if ( is_object( $session ) ) {
                $session->remove();
            }
            if ( $fmgr->exists( $image_path ) ) {
                if ( $caption ) {
                    $img = imagecreatefrompng( $image_path );
                    $rgb = $this->pickColor( $img, 1, 1 );
                    $transparent = imagecolorallocate( $img, $rgb['red'], $rgb['green'], $rgb['blue'] );
                    imagecolortransparent( $img, $transparent );
                    imagepng( $img, $image_path, 0 );
                    imagedestroy( $img );
                    $img = null;
                    if ( $cache_key ) {
                        $this->set_cache( $cache_key, $app->fmgr->get( $image_path ) );
                    }
                    return $image_path;
                }
                $image = file_get_contents( $image_path );
                if ( $base64 ) {
                    $pfx = $pdf ? 'data:application/pdf;base64,' : 'data:image/png;base64,';
                    $image = $pfx . base64_encode( $image );
                }
            }
        }
        if ( $image === null ) {
            $image = false;
            return $app->error( $this->translate( 'Image generation failed.' ) );
        }
        return $image;
    }

    function pickColor( $gd_obj, $x, $y ){
        $rgb = imagecolorat( $gd_obj, $x, $y );
        $array['red'] = ( $rgb >> 16 ) & 0xFF;
        $array['green'] = ( $rgb >> 8 ) & 0xFF;
        $array['blue'] = $rgb & 0xFF;
        return $array;
    }

    function simplifiedjapanese_proxy ( $app ) {
        if (! isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
            return;
        }
        $ua = $_SERVER['HTTP_USER_AGENT'];
        if ( strpos( $ua, 'SimplifiedJapanese' ) === false
            || stripos( $ua, 'magic_token=' ) === false ) {
            return;
        }
        $magic_token = preg_replace( "/^.*?magic_token=(.*)?\s.*$/", '$1', $ua );
        $session = $app->db->model( 'session' )->get_by_key( ['name' => $magic_token, 'kind' => 'SJ'] );
        if ( $session->id && $session->user_id && $session->expires > $app->request_time ) {
            $user = $app->db->model( 'user' )->load( $session->user_id );
            if ( $user && $user->status == 2 && !$user->lock_out ) {
                $url = $app->param( 'url' );
                $error = '';
                if ( $app->is_valid_url( $url, $error ) ) {
                    $mime_type = PTUtil::get_mime_type( $url );
                    $app->print( file_get_contents( $url ), $mime_type );
                    exit();
                }
            }
        }
    }

    function get_title_from_node ( $children, &$title ) {
        for ( $i = 0; $i < $children->length; $i++ ) {
            $child = $children->item( $i );
            $title .= trim( $child->textContent );
            if ( $child->nodeName == 'img' ) {
                $title .= trim( $child->getAttribute( 'alt' ) );
            }
            $grandchildren = $child->childNodes;
            if ( $grandchildren->length ) {
                $this->get_title_from_node( $grandchildren, $title );
            }
        }
        return $title;
    }

    function simplified_japanese ( $text, $app, $workspace_id, $finalize = false, $append = false ) {
        $caching = isset( $this->caching[ $workspace_id ] ) ? $this->caching[ $workspace_id ]
                 : $this->get_config_value( 'simplifiedjapanese_caching', $workspace_id );
        $this->caching[ $workspace_id ] = $caching;
        $detect_chinese = $this->get_config_value( 'simplifiedjapanese_detect_chinese', $workspace_id );
        $chinese_map = [];
        if ( $detect_chinese ) {
            require_once( 'lib' . DS . 'class.PTDetectChinese.php' );
            $chinese_sentences = PTDetectChinese::chinese_sentences( $text );
            if (! empty( $chinese_sentences ) ) {
                foreach ( $chinese_sentences as $chinese_sentence ) {
                    $magic = self::magic( $text );
                    $text = str_replace( $chinese_sentence, $magic, $text );
                    $chinese_map[ $magic ] = $chinese_sentence;
                    $caching = false;
                }
            }
        }
        $fmgr = $app->fmgr;
        $cache_path = null;
        $result = null;
        $json = null;
        if (! $this->access_token ) {
            $access_token = $this->get_token( $app, $this->retry );
        }
        $access_token = $this->access_token;
        $endPoint = $app->tsutaeru_simplified_endpoint;
        $data = [
            'phrase' => $text,
            'difficulty' => $this->difficulty
        ];
        $forward_ip = $app->remote_ip;
        $options = [
          'http' => [
              'method'  => 'POST',
              'content' => json_encode( $data ),
              'header'  => "access_token: {$access_token}\r\n"
                         . "forward_ip: {$forward_ip}\r\n"
                         . "Content-Type: application/x-www-form-urlencoded"
          ]
        ];
        $context  = PTUtil::stream_context_create( $options );
        $result = file_get_contents( $endPoint, false, $context );
        if ( $result === false ) {
            $message = $this->translate(
                'An error occurred while translating to Simplified Japanese.' );
            $this->errors[ $message ] = true;
            return $text;
        }
        $json = json_decode( $result, true );
        $status = $json['status'];
        $json = is_array( $json ) ? $json : json_decode( $result, true );
        $status = $json['status'];
        if ( $status == 500 ) {
            $message = $this->translate(
                'Simplified Japanese translation failed because text is too large.' );
            if ( $app->mode == 'simplifiedjapanese_helper' ) {
                if ( $app->param( '_type' ) === 'insert_editor' ) {
                    return $app->json_error( $message );
                } else {
                    return $app->error( $message );
                }
            }
            $this->errors[ $message ] = true;
            return $text;
        } else if (! $this->retry && ( $status == 400 || $status == 401 ) ) {
            $this->access_token = null;
            $this->retry = true;
            return $this->simplified_japanese( $text, $app, $workspace_id );
        } else if ( $status == 400 || $status == 401 ) {
            $message = $this->translate( 'Simplified Japanese translation failed because authentication failed.' );
            if ( $app->mode == 'simplifiedjapanese_helper' ) {
                if ( $app->param( '_type' ) === 'insert_editor' ) {
                    return $app->json_error( $message );
                } else {
                    return $app->error( $message );
                }
            }
            $this->errors[ $message ] = true;
            return $text;
        }
        if (! empty( $chinese_map ) ) {
            foreach ( $chinese_map as $magic => $chinese_sentense ) {
                $json['result'] = str_replace( $magic, $chinese_sentense, $json['result'] );
                $json['changed'] = str_replace( $magic, $chinese_sentense, $json['changed'] );
                // <span class="chinese">本母语咨询中心也接受因遭受灾害<sup>(中国語)</sup></span>
                $chinese_sentense = "<span class=\"Chinese\">{$chinese_sentense}<sup>(中国語)</sup></span>";
                $json['difficulty1'] = str_replace( $magic, $chinese_sentense, $json['difficulty1'] );
                $json['difficulty2'] = str_replace( $magic, $chinese_sentense, $json['difficulty2'] );
            }
        }
        $json['result'] = $this->format_number( $json['result'], $text );
        $result = $json['result'];
        if ( $finalize ) {
            $this->changed .= '<strong class="ez_changed">' . $json['changed'] . "</strong>\n\n";
        } else {
            $this->changed .= $json['changed'];
            if ( preg_match( "/。$/", $this->changed ) ) {
                $this->changed .= "\n\n";
            }
        }
        if (! $append ) {
            $this->difficulty1 .= $json['difficulty1'];
            if ( preg_match( "/。$/", $this->difficulty1 ) ) {
                $this->difficulty1 .= "\n\n";
            }
        }
        $this->difficulty2 .= $json['difficulty2'];
        if ( preg_match( "/。$/", $this->difficulty2 ) ) {
            $this->difficulty2 .= "\n\n";
        }
        $appended = $json['appended'];
        if (! empty( $appended ) ) {
            $this->appended = array_unique( array_merge( $this->appended, $appended ) );
        }
        return $result;
    }

    function format_number ( $content, $original = '' ) {
        if ( preg_match_all( "/[0-9]{5,}/", $content, $matches ) ) {
            $matches = $matches[0];
            foreach ( $matches as $number ) {
                if ( strpos( $number, '0' ) !== 0 && strpos( $original, $number ) === false ) {
                    $formatted = number_format( $number );
                    $content = str_replace( $number, $formatted, $content );
                }
            }
        }
        return $content;
    }

    function insert_button ( $cb, $app, $param, &$tmpl ) {
        $table = $app->get_table( $app->param( '_model' ) );
        if ( $table->menu_type == 3 ) return true;
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $add_button = $this->get_config_value( 'simplifiedjapanese_add_button', $workspace_id );
        $ctx = $app->ctx;
        if ( $add_button ) {
            $html_body_footer = isset( $ctx->vars['html_body_footer'] ) ? $ctx->vars['html_body_footer'] : '';
            $footer = $ctx->get_template_path( 'simplifiedjapanese-html-body-footer.tmpl' );
            $html_body_footer .= $app->build( file_get_contents( $footer ) );
            $ctx->vars['html_body_footer'] = $html_body_footer;
        }
        if ( $app->param( 'dialog_view' ) ) {
            $ctx->vars['dialog_view'] = 1;
        }
        $client_id = $this->get_config_value( 'tsutaeru_client_id' );
        $client_secret = $this->get_config_value( 'tsutaeru_client_secret' );
        if ( $client_id && $client_secret ) {
            $ctx->vars['can_tsutaeru_web'] = 1;
        }
        $add_rp = $this->get_config_value( 'simplifiedjapanese_add_rp', $workspace_id );
        $ctx->vars['simplifiedjapanese_add_rp'] = $add_rp;
        $editor_buttons = isset( $ctx->vars['editor_buttons'] ) ? $ctx->vars['editor_buttons'] : '';
        $tinymce_version = (int)$app->tinymce_version;
        if ( $tinymce_version && $tinymce_version == 4 ) {
            $editor_tmpl = $app->ctx->get_template_path( 'simplifiedjapanese-editor_buttons_4.tmpl' );
        } else {
            $editor_tmpl = $app->ctx->get_template_path( 'simplifiedjapanese-editor_buttons.tmpl' );
        }
        $editor_buttons .= $app->build( file_get_contents( $editor_tmpl ) );
        $ctx->vars['editor_buttons'] = $editor_buttons;
        $ctx->vars['simplifiedjapanese_assets_base'] = $app->simplifiedjapanese_assets_base;
        $custom_buttons = isset( $ctx->vars['custom_html_insert_buttons'] )
                        ? $ctx->vars['custom_html_insert_buttons'] : '';
        $editor_tmpl = $app->ctx->get_template_path( 'simplifiedjapanese-input-html.tmpl' );
        $add_rt_style = $this->get_config_value( 'simplifiedjapanese_add_rt_style', (int) $app->param( 'workspace_id' ) );
        if ( $app->mode == 'simplifiedjapanese_helper' ) {
            $ctx->vars['simplifiedjapanese_add_rt_style'] = $add_rt_style;
        }
        $custom_buttons .= $app->fmgr->get( $editor_tmpl );
        $ctx->vars['custom_html_insert_buttons'] = $custom_buttons;
        return true;
    }

    function simplifiedjapanese_post_run ( $app ) {
        $updated_obj = $this->updated_obj;
        $deleted_ws = $this->deleted_ws;
        $updated = false;
        if (! empty( $updated_obj ) ) {
            $obj = $app->db->model( 'user_dic' )->new();
            foreach ( $updated_obj as $obj ) {
                $this->update_user_dic( $app, $obj );
            }
            $updated = true;
        }
        if (! empty( $deleted_ws ) ) {
            $dic_dir = $app->support_dir . DS . 'dictionaries' . DS;
            $fmgr = $app->fmgr;
            foreach ( $deleted_ws as $obj ) {
                $user_dic = $dic_dir . 'dictionary_' . $obj->id . '.dic';
                if ( $fmgr->exists( $user_dic ) ) {
                    $fmgr->unlink( $user_dic );
                }
            }
            $updated = true;
        }
        if ( $updated ) {
            $whole_dictionary = $this->get_config_value( 'simplifiedjapanese_whole_dictionary' );
            if ( $whole_dictionary ) {
                $this->update_user_dic( $app, $obj, 'whole' );
            }
        }
        return true;
    }

    function pre_save_user_dic ( &$cb, $app, &$obj, $original ) {
        $word = $obj->word;
        $word = str_replace( array( "\r", "\n" ), '', trim( $word ) );
        $phonetic = $obj->phonetic;
        $phonetic = str_replace( array( "\r", "\n" ), '', trim( $phonetic ) );
        if ( strpos( $word, ',' ) !== false || strpos( $phonetic, ',' ) !== false ) {
            $cb['error'] = $this->translate( "Word and Phonetic cannot contain ','." );
            return false;
        }
        $obj->word( $word );
        if (! $phonetic ) {
            $parse = $this->mecab_parse( $word );
            foreach ( $parse as $res ) {
                if ( $res === 'EOS' ) break;
                $split = explode( ',', $res );
                $phonetic .= isset( $split[ 7 ] ) ? $split[ 7 ] : '';
            }
            $phonetic = mb_convert_kana( $phonetic, 'c', 'UTF-8' );
        }
        $obj->phonetic( $phonetic );
        return true;
    }

    function post_save_user_dic ( $cb, $app, $obj, $original ) {
        $workspace_id = (int) $obj->workspace_id;
        $this->updated_obj[ $workspace_id ] = $obj;
        return true;
    }

    function post_save_workspace ( $cb, $app, $obj, $original ) {
        if ( isset( $cb['is_new'] ) && $cb['is_new'] ) {
            $workspace_id = (int) $obj->id;
            // Create a user dictionary.
            $user_dic = $app->db->model( 'user_dic' )->get_by_key(
              ['word' => '令和', 'phonetic' => 'れいわ', 'workspace_id' => $workspace_id ] );
            $app->set_default( $user_dic );
            $user_dic->save();
            $this->update_user_dic( $app, $user_dic );
        }
        return true;
    }

    function post_delete_workspace ( $cb, $app, $obj, $original ) {
        $workspace_id = (int) $obj->id;
        $this->deleted_ws[ $workspace_id ] = $obj;
        return true;
    }

    function post_import_user_dic ( $cb, $app, $obj, $original ) {
        $workspace_id = (int) $obj->workspace_id;
        $this->updated_obj[ $workspace_id ] = $obj;
        return true;
    }

    function urlmapping_furigana_settings ( $app, $objects, $action ) {
        $class = new PTListActions();
        $input = $app->param( 'itemset_action_input' );
        $model = $app->param( '_model' );
        $counter = 0;
        $callback = ['name' => 'post_save'];
        $arg = $app->simplifiedjapanese_furigana_default_arg;
        $map = $app->simplifiedjapanese_furigana_default_map;
        foreach ( $objects as $obj ) {
            $original = clone $obj;
            $changed = false;
            if (! $obj->furigana_json ) {
                $obj->furigana_json( 1 );
                $changed = true;
            }
            if (! $obj->furigana_setting ) {
                $obj->furigana_setting( $arg );
                $changed = true;
            }
            if (! $obj->furigana_urlmap ) {
                $obj->furigana_urlmap( $map );
                $changed = true;
            }
            if ( $changed ) {
                $obj->save();
            }
            $original->furigana_json( 0 );
            // Re-Generate JSON.
            $this->post_save_urlmapping( $callback, $app, $obj, $original );
            $counter++;
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $class->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function dynamic_furigana_json ( $app ) {
        $relative_url = $app->param( 'url' );
        $key = $app->param( 'key' );
        if (! $key && ! $relative_url ) {
            $app->print_json( [] );
            exit();
        }
        $workspace_id = (int) $app->workspace_id;
        $ctx = $app->ctx;
        $ctx->stash( 'workspace', $app->workspace );
        $arg = $app->param( 'mode' );
        if (! $arg ) {
            $arg = $app->simplifiedjapanese_furigana_default_arg;
        }
        $queue = null;
        $cache_dir = $this->get_cache_dir( $workspace_id, $app );
        $cache = null;
        if ( $relative_url ) {
            $url = $app->db->model( 'urlinfo' )->get_by_key( ['relative_url' => $relative_url,'workspace_id' => $workspace_id ] );
            if ( $url->id ) {
                $cache = $url->file_path;
                $queue = $app->db->model( 'queue' )->get_by_key( ['key' => md5( $url->file_path ),
                    'component' => 'SimplifiedJapanese',
                    'method' => 'queue_furigana_json', 'workspace_id' => $workspace_id ] );
                if (! $queue->id ) {
                    $queue = null;
                }
            }
        } else {
            $cache = $cache_dir . DS . "{$key}-d.html";
        }
        if ( !$cache || ! $app->fmgr->exists( $cache ) ) {
            $app->print_json( [] );
            exit();
        }
        $data = $app->fmgr->get( $cache );
        $cache = $cache_dir . DS . md5( $data ) . "-{$arg}-t_f_to_json.json";
        if ( $app->fmgr->exists( $cache ) ) {
            $json = $app->fmgr->get( $cache );
        } else {
            $debug = $app->debug;
            if ( $app->api_unescaped_unicode ) {
                $app->debug = true;
            }
            $json = $this->filter_textnode_to_json( $data, $arg, $ctx );
            $app->debug = $debug;
        }
        if ( $queue ) {
            $queue->remove();
        }
        $app->print( $json, 'application/json' );
    }

    function get_furigana_mapping ( $app ) {
        $json_string = file_get_contents( 'php://input' );
        // $json_string = '{"phrases":["\u9ad8\u53f0\u3078\u907f\u96e3\u3057\u307e\u3057\u3087\u3046\u3002",'
        //              . '"\u79c1\u304c\u6771\u4eac\u3078\u884c\u304d\u307e\u3057\u3087\u3046\u3002"]}';
        $workspace_id = (int) $app->workspace_id;
        $json = json_decode( $json_string, true );
        $ctx = $app->ctx;
        $ctx->stash( 'workspace', $app->workspace );
        $phrases = $json['phrases'] ?? [];
        if (! $phrases || empty( $phrases ) ) {
            $app->print_json( [] );
            exit();
        }
        $arg = $json['mode'] ?? $app->simplifiedjapanese_furigana_default_arg;
        $cache_dir = $this->get_cache_dir( $workspace_id, $app );
        $cache = $cache_dir . DS . md5( $json_string ) . "-{$arg}-g_f_m.json";
        if ( $app->fmgr->exists( $cache ) ) {
            $json = $app->fmgr->get( $cache );
            $app->print( $json, 'application/json' );
            exit();
        }
        $phrases = array_flip( $phrases );
        foreach ( $phrases as $phrase => $idx ) {
            $phrases[ $phrase ] = $this->filter_furigana( $phrase, $arg, $ctx );
        }
        if ( $app->debug ) {
            $json = json_encode( $phrase, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
        } else {
            $json = $app->api_unescaped_unicode ? json_encode( $phrases, JSON_UNESCAPED_UNICODE ) : json_encode( $phrases );
        }
        $app->fmgr->put( $cache, $json );
        $app->print( $json, 'application/json' );
    }

    function dynamic_view ( $cb, $app, $obj, $data ) {
        $key = $this->dynamic_json_key;
        if (! $key ) {
            return true;
        }
        $workspace = $app->ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : '0';
        $cache_dir = $cache_dir = $this->get_cache_dir( $workspace_id, $app );
        $cache = $cache_dir . DS . "{$key}-d.html";
        $app->fmgr->put( $cache, $data );
    }

    function hdlr_furiganajsonurl ( $args, $ctx ) {
        $urlmapping = $ctx->stash( 'current_urlmapping' );
        if (! $urlmapping ) {
            return '';
        }
        $app = $ctx->app;
        $arg = $args['mode'] ?? $app->simplifiedjapanese_furigana_default_arg;
        $is_dynamic = $urlmapping->publish_file == 6;
        $obj = $ctx->stash( 'current_object' );
        if (! $is_dynamic && $app->id === 'Bootstrapper' ) {
            if ( $obj->has_column( 'status' ) ) {
                $published = $app->status_published( $obj->_model );
                $is_dynamic = $published != $obj->status;
            }
            if (! $is_dynamic ) {
                $plugin = $app->component( 'LivePreview' );
                if ( $plugin ) {
                    $is_dynamic = $plugin->preview;
                }
            }
            if (! $is_dynamic && $app->query_string() ) {
                $is_dynamic = true;
            }
        }
        $plugin = $app->component( 'LivePreview' );
        $url = $ctx->stash( 'current_urlinfo' );
        $current_archive_url = $ctx->vars['current_archive_url'];
        if (! $url ) {
            $url = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $current_archive_url ] );
            if (! $url->id ) {
                return '';
            }
        }
        $endpoint = $app->simplifiedjapanese_api_endpoint;
        if (! $endpoint ) {
            $endpoint = $app->api_endpoint;
            if (! $endpoint ) {
                $endpoint = $app->path . 'api/';
            }
        }
        if ( $is_dynamic && $app->id === 'Bootstrapper' ) {
            if ( $endpoint ) {
                $request = $url->url;
                if ( $query_string = $app->query_string() ) {
                    $request .= "?{$query_string}";
                }
                $cache_key = md5( $request );
                $this->dynamic_json_key = $cache_key;
                $this->dynamic_json_mode = $arg;
                $workspace = $ctx->stash( 'workspace' );
                $workspace_id = $workspace ? $workspace->id : '0';
                $endpoint .= 'v1/' . $workspace_id . "/dynamic_furigana_json?key={$cache_key}&amp;mode={$arg}";
                return $endpoint;
            }
            return '';
        }
        $clone = clone $urlmapping;
        $urlmapping = $this->urlmapping_map[ $urlmapping->id ]
                    ?? $app->db->model( 'urlmapping' )->load( $urlmapping->id, null, 'furigana_json,furigana_urlmap' );
        $this->urlmapping_map[ $urlmapping->id ] = $urlmapping;
        $model = $obj->_model;
        $object_id = (int) $obj->id;
        $ts = $url->archive_date;
        if ( $app->id === 'Prototype' && $app->request_method === 'POST' && $app->mode === 'save' && $app->param( '_preview' ) ) {
            $meth = 'simplifiedjapanese_json_preview';
            $endpoint = $app->script_uri;
            $endpoint .= "?__mode=simplifiedjapanese_json_preview&_model={$model}&id={$object_id}&mode={$arg}";
            $this->dynamic_json_key = true;
            return $endpoint;
        }
        if ( isset( $args['api'] ) || $app->simplifiedjapanese_furigana_api_only ) {
            if ( $endpoint ) {
                $workspace = $ctx->stash( 'workspace' );
                $workspace_id = $workspace ? $workspace->id : '0';
                $relative_url = rawurlencode( $url->relative_url );
                $endpoint .= 'v1/' . $workspace_id . "/dynamic_furigana_json?url={$relative_url}&amp;mode={$arg}";
                return $endpoint;
            }
            return '';
        }
        if (! $urlmapping->furigana_json ) {
            return '';
        }
        $terms = ['class' => 'furigana_json', 'model' => $model,
             'object_id' => $object_id, 'key' => 'urlmapping-' . $urlmapping->id ];
        if ( $ts ) {
            $terms['archive_date'] = $ts;
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key( $terms, null, 'id,url' );
        if ( $url->id ) {
            return $url->url;
        }
        if ( $urlmapping->furigana_urlmap ) {
            $clone->mapping( $urlmapping->furigana_urlmap );
            $clone->compiled( '' );
            $clone->cache_key( '' );
            $url = $app->build_path_with_map( $obj, $clone, null, $ts, true );
            return $url;
        }
        return '';
    }

    function post_publish ( $cb, $app, $template, $data ) {
        if ( $app->simplifiedjapanese_furigana_api_only ) {
            return true;
        }
        $urlmapping = $cb['urlmapping'] ?? null;
        $urlinfo = $cb['urlinfo'] ?? null;
        if (! $urlmapping ||! $urlinfo ) {
            return true;
        }
        if ( $urlinfo->mime_type !== 'text/html' ) {
            return true;
        }
        $clone = clone $urlmapping;
        $urlmapping = $this->urlmapping_map[ $urlmapping->id ]
                    ?? $app->db->model( 'urlmapping' )->load( $urlmapping->id, null, 'id,furigana_json,furigana_urlmap' );
        $this->urlmapping_map[ $urlmapping->id ] = $urlmapping;
        if (! $urlmapping->furigana_json || !$urlmapping->furigana_urlmap ) {
            return true;
        }
        $ts = $urlinfo->archive_date;
        $clone->mapping( $urlmapping->furigana_urlmap );
        $clone->compiled( '' );
        $clone->cache_key( '' );
        $object = method_exists( $urlinfo, 'object' )
                ? $urlinfo->object() : $app->db->model( $urlinfo->model )->load( $object_id );
        if (! $object ) {
            return true;
        }
        $path = $app->build_path_with_map( $object, $clone, null, $ts );
        if (! $path ) {
            return true;
        }
        $this->furigana_json_map[ $path ] =
                  ['urlinfo' => $urlinfo, 'data' => $data,
                   'path' => $path, 'arg' => $urlmapping->furigana_setting ];
        return true;
    }

    function post_save_urlmapping ( $cb, $app, $urlmapping, $original ) {
        if ( $app->simplifiedjapanese_furigana_api_only ) {
            return true;
        }
        if ( $urlmapping->furigana_json == $original->furigana_json
            && $urlmapping->furigana_urlmap == $original->furigana_urlmap ) {
            return true;
        }
        $cols = ['id', 'file_path', 'workspace_id', 'model', 'object_id', 'urlmapping_id', 'archive_date'];
        if ( $urlmapping->furigana_json ) {
            if ( $urlmapping->furigana_urlmap != $original->furigana_urlmap ) {
                $urls = $app->db->model( 'urlinfo' )->load( ['key' => 'urlmapping-' . $urlmapping->id ], null, $cols );
                foreach ( $urls as $urlinfo ) {
                    $urlinfo->remove();
                }
            }
            if (! $urlmapping->furigana_urlmap ) {
                return true;
            }
            $clone = clone $urlmapping;
            $clone->mapping( $urlmapping->furigana_urlmap );
            $clone->compiled( '' );
            $clone->cache_key( '' );
            $urls = $app->db->model( 'urlinfo' )->load( ['urlmapping_id' => $urlmapping->id ], null, $cols );
            foreach ( $urls as $urlinfo ) {
                if (! $app->fmgr->exists( $urlinfo->file_path ) ) {
                    continue;
                }
                $data = $app->fmgr->get( $urlinfo->file_path );
                $object = method_exists( $urlinfo, 'object' )
                        ? $urlinfo->object() : $app->db->model( $urlinfo->model )->load( $object_id );
                $ts = $urlinfo->archive_date;
                $path = $app->build_path_with_map( $object, $clone, null, $ts );
                if (! $path ) {
                    continue;
                }
                $this->furigana_json_map[ $path ] =
                  ['urlinfo' => $urlinfo, 'data' => $data,
                   'path' => $path, 'arg' => $urlmapping->furigana_setting ];
            }
        } else {
            $urls = $app->db->model( 'urlinfo' )->load( ['key' => 'urlmapping-' . $urlmapping->id ], null, $cols );
            foreach ( $urls as $urlinfo ) {
                $urlinfo->remove();
            }
        }
        return true;
    }

    function take_down ( $app ) {
        if ( $app->simplifiedjapanese_furigana_api_only ) {
            return;
        }
        $furigana_json_map = $this->furigana_json_map;
        if ( empty( $furigana_json_map ) ) {
            return;
        }
        $ctx = $app->ctx;
        ini_set( 'max_execution_time', 14400 );
        ignore_user_abort( true );
        $furigana_force_queue = $app->simplifiedjapanese_furigana_force_queue;
        if ( $app->id === 'Worker'
            || ( $app->id === 'Prorotype' && ( $app->mode === 'save' || $app->mode === 'delete' ) ) ) {
            $furigana_force_queue = false;
        }
        if (! $furigana_force_queue ) {
            $counter = 0;
            foreach ( $furigana_json_map as $idx => $furigana_json ) {
                $url = $furigana_json['urlinfo'];
                if (! $app->fmgr->exists( $url->file_path ) ) {
                    continue;
                }
                $html = $furigana_json['data'];
                $arg = isset( $furigana_json['arg'] ) && $furigana_json['arg'] ? $furigana_json['arg'] : 1;
                $json_path = $furigana_json['path'];
                $json = $this->filter_textnode_to_json( $html, $arg, $ctx );
                if ( $app->fmgr->exists( $json_path ) ) {
                    if ( md5_file( $json_path ) === md5( $json ) ) {
                        continue;
                    }
                }
                $app->fmgr->put( $json_path, $json );
                $json_url = $app->db->model( 'urlinfo' )->get_by_key(
                            ['file_path' => $json_path, 'workspace_id' => $url->workspace_id, 'delete_flag' => [0, 1] ],
                            ['sort' => 'delete_flag', 'direction' => 'ascend'] );
                PTUtil::set_url_path( $json_url );
                $json_url->class( 'furigana_json' );
                $json_url->model( $url->model );
                $json_url->object_id( $url->object_id );
                $json_url->archive_date( $url->archive_date );
                $key = 'urlmapping-' . $url->urlmapping_id;
                $json_url->key( 'urlmapping-' . $url->urlmapping_id );
                $json_url->save();
                $counter++;
                unset( $furigana_json_map[ $idx ] );
                if ( $counter >= $app->simplifiedjapanese_furigana_queue_per ) {
                    break;
                }
            }
            $furigana_json_map = array_values( $furigana_json_map );
        }
        if (! empty( $furigana_json_map ) ) {
            $ts_job = $app->db->model( 'ts_job' )->new( ['name' => 'Generate Furigana JSON',
                                                                   'component' => 'SimplifiedJapanese'] );
            $ts_job->workspace_id( 0 );
            $ts = date( 'Y-m-d H:i:s' );
            $ts_job->start_on( $ts );
            $app->set_default( $ts_job );
            if ( $ts_job->has_column( 'status', true ) ) {
                $ts_job->status( 2 );
            }
            $ts_job->is_running( 0 );
            $ts_job->max_per_once( $app->simplifiedjapanese_furigana_queue_per );
            $ts_job->save();
            foreach ( $furigana_json_map as $furigana_json ) {
                $url = $furigana_json['urlinfo'];
                $arg = isset( $furigana_json['arg'] ) && $furigana_json['arg'] ? $furigana_json['arg'] : 1;
                $json_path = $furigana_json['path'];
                $queue = $app->db->model( 'queue' )->get_by_key( [
                    'key' => md5( $url->file_path ),
                    'component' => 'SimplifiedJapanese',
                    'method' => 'queue_furigana_json',
                    'workspace_id' => $url->workspace_id,
                    ] );
                $queue->start_on( $ts );
                $queue->ts_job_id( $ts_job->id );
                $queue->value( $url->file_path );
                $queue->data( $arg );
                $queue->metadata( $json_path );
                $key = 'urlmapping-' . $url->urlmapping_id;
                if ( $url->archive_date ) {
                    $key .= '-' . $url->db2ts( $url->archive_date );
                }
                $queue->class( $key );
                $queue->object_id( $url->object_id );
                $queue->model( $url->model );
                $app->set_default( $queue );
                $queue->save();
            }
        }
    }

    function queue_furigana_json ( $app, $queue, &$error ) {
        $file_path = $queue->value;
        if (! $app->fmgr->exists( $file_path ) ) {
            return true;
        }
        $html = $app->fmgr->get( $file_path );
        $ctx = $app->ctx;
        $arg = $queue->data;
        if (! $arg ) {
            $arg = 1;
        }
        $json_path = $queue->metadata;
        $json = $this->filter_textnode_to_json( $html, $arg, $ctx );
        if ( $app->fmgr->exists( $json_path ) ) {
            if ( md5_file( $json_path ) === md5( $json ) ) {
                return true;
            }
        }
        $app->fmgr->put( $json_path, $json );
        $json_url = $app->db->model( 'urlinfo' )->get_by_key(
                    ['file_path' => $json_path, 'workspace_id' => $queue->workspace_id, 'delete_flag' => [0, 1] ],
                    ['sort' => 'delete_flag', 'direction' => 'ascend'] );
        PTUtil::set_url_path( $json_url );
        $json_url->class( 'furigana_json' );
        $json_url->model( $queue->model );
        $json_url->object_id( $queue->object_id );
        $class = $queue->class;
        $classes = explode( '-', $class );
        if ( count( $classes ) === 2 ) {
            $json_url->key( $class );
        } else {
            $archive_date = $queue->ts2db( $classes[2] );
            $json_url->archive_date( $archive_date );
            $class = $classes[0] . '-' . $classes[0];
            $json_url->key( $class );
        }
        return $json_url->save();
    }

    function post_preview ( $cb, $app, $html ) {
        if (! $this->dynamic_json_key ) {
            return true;
        }
        $urlmapping = $cb['urlmapping'] ?? null;
        if (! $urlmapping ) {
            return true;
        }
        $arg = $urlmapping->furigana_setting;
        if (! $arg ) {
            $arg = 1;
        }
        $ctx = $app->ctx;
        $obj = $ctx->stash( 'current_object' );
        if (! $obj ) {
            return true;
        }
        $json = $this->filter_textnode_to_json( $html, $arg, $ctx );
        $user = $app->user();
        $terms = ['name' => 'furigana_json_preview', 'object_id' => $obj->id,
                  'key' => $obj->_model, 'user_id' => $user->id, 'kind' => 'PV'];
        $session = $app->db->model( 'session' )->get_by_key( $terms );
        $session->text( $json );
        $session->start( $app->request_time );
        $session->expires( $app->request_time + $app->token_expires );
        $session->save();
    }

    function simplifiedjapanese_json_preview ( $app ) {
        $user = $app->user();
        $terms = ['name' => 'furigana_json_preview', 'object_id' => $app->param( 'id' ),
                  'key' => $app->param( '_model' ), 'user_id' => $user->id, 'kind' => 'PV'];
        $session = $app->db->model( 'session' )->get_by_key( $terms );
        if (! $session->id ) {
            return $app->json_error( 'Invalid request.' );
        }
        $json = $session->text;
        $session->remove();
        $app->print( $json, 'application/json' );
    }

    function update_user_dic ( $app, $dic, $whole = '' ) {
        $fmgr = $app->fmgr;
        $mecab = $app->simplifiedjapanese_mecab_path;
        $mecab_dict = $app->simplifiedjapanese_mecab_dict_index_path;
        $dic_path = $app->simplifiedjapanese_mecab_dic_path;
        if (! $fmgr->exists( $mecab ) || ! $fmgr->exists( $mecab_dict )
            || ! $fmgr->exists( $dic_path ) ) {
            return true;
        }
        $mecab_dict = escapeshellcmd( $mecab_dict );
        $dic_path = escapeshellarg( $dic_path );
        $workspace_id = (int) $dic->workspace_id;
        $terms = ['status' => 2 ];
        if ( $whole !== 'whole' ) {
            $terms['workspace_id'] = $workspace_id;
        }
        $user_dics = $app->db->model( 'user_dic' )->load( $terms, [], 'word,phonetic,proper_noun' );
        $work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir();
        $work_dir = rtrim( $work_dir, DS ) . DS;
        $this->work_dir = $work_dir;
        $dictionaries = [];
        $mecab = $this->get_mecab( $app, 0, false );
        foreach ( $user_dics as $obj ) {
            $word = $obj->word;
            $word = str_replace( array( "\r", "\n" ), '', trim( $word ) );
            $phonetic = $obj->phonetic;
            $phonetic = str_replace( array( "\r", "\n" ), '', trim( $phonetic ) );
            $phonetic = mb_convert_kana( $phonetic, 'C', 'UTF-8' );
            $res = $this->mecab_parse( $word, $mecab, $app );
            $res = $res[0];
            list( $w, $info ) = explode( "\t", $res );
            $info = explode( ',', $info );
            $items = [ $word, '-1', '-1', '-4472'];
            for ( $i = 0; $i < 7; $i++ ) {
                $items[] = $info[ $i ];
            }
            $items[4] = '名詞';
            if ( $obj->proper_noun ) {
                $items[5] = '固有名詞';
                $items[6] = '一般';
            } else {
                $items[5] = '一般';
                $items[6] = '*';
            }
            $items[7] = '*';
            $items[8] = '*';
            $items[9] = '*';
            $items[10] = $word;
            $items[] = $phonetic;
            $items[] = $phonetic;
            $dictionaries[ $word ] = $items;
        }
        $dic_dir = $app->support_dir . DS . 'dictionaries' . DS;
        if (! $fmgr->exists( $dic_dir ) ) {
            $fmgr->mkpath( $dic_dir );
        }
        if ( $whole === 'whole' ) {
            $workspace_id = 'whole';
        }
        $cache_dir =  $app->support_dir . DS
                       . 'cache' . DS . 'simplifiedjapanese_cache' . DS . $workspace_id;
        if ( is_dir( $cache_dir ) ) {
            $this->upload_dirs[ $cache_dir ] = true;
        }
        $user_dic = $dic_dir . 'dictionary_' . $workspace_id . '.dic';
        if ( empty( $dictionaries ) ) {
            $fmgr->unlink( $user_dic );
        }
        $dictionary = $work_dir . 'dictionary_' . $workspace_id . '.csv';
        $fp = fopen( $dictionary, 'w' );
        foreach ( $dictionaries as $fields ) {
            fputcsv( $fp, $fields );
        }
        fclose( $fp );
        $tmp = PTUtil::magic();
        $cmd = "{$mecab_dict} -d {$dic_path} -u {$user_dic}.{$tmp} -f utf-8 -t utf-8 {$dictionary}";
        $result = shell_exec( $cmd );
        $fmgr->rename( "{$user_dic}.{$tmp}", $user_dic );
        return true;
    }

    function get_token ( $app, $force = false ) {
        $app->get_scheme_from_db( 'workspace' );
        $tsutaeru_web = false; // for tsutaeru.cloud
        $workspace = $app->workspace();
        if ( $app->tsutaeru_web && $workspace ) {
            if (! $force ) {
                $access_token = $this->access_token ? $this->access_token
                          : $this->get_config_value( 'tsutaeru_access_token', $workspace->id );
                if ( $access_token ) {
                    $this->access_token = $access_token;
                    return $access_token;
                }
            }
            $client_id = $workspace->uuid;
            $client_secret = $workspace->translate_api_key;
            $tsutaeru_web = true;
        } else {
            if (! $force ) {
                $access_token = $this->access_token ? $this->access_token
                          : $this->get_config_value( 'tsutaeru_access_token' );
                if ( $access_token ) {
                    $this->access_token = $access_token;
                    return $access_token;
                }
            }
            $client_id = $this->client_id ? $this->client_id
                       : $this->get_config_value( 'tsutaeru_client_id' );
            $client_secret = $this->client_secret ? $this->client_secret
                       : $this->get_config_value( 'tsutaeru_client_secret' );
        }
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        if (! $client_id || ! $client_secret ) {
            $message = $this->translate(
                'Client ID and Client Secret are required.' );
            $this->errors[ $message ] = true;
            return;
        }
        $endPoint = $app->tsutaeru_token_endpoint;
        $data = [
            'client_id' => $client_id,
            'client_secret' => $client_secret
        ];
        $options = [
          'http' => [
              'method'  => 'POST',
              'content' => json_encode( $data ),
              'header'  => 'Content-Type: application/x-www-form-urlencoded'
          ]
        ];
        $context  = PTUtil::stream_context_create( $options );
        $result = file_get_contents( $endPoint, false, $context );
        $json = json_decode( $result, true );
        $status = $json['status'];
        if ( $status != 200 ) {
            $message = $this->translate(
                'Simplified Japanese translation failed because authentication failed.' );
            $this->errors[ $message ] = true;
            return;
        }
        $access_token = $json['access_token'];
        $this->access_token = $access_token;
        if (! $tsutaeru_web ) {
            $this->set_config_value( 'tsutaeru_access_token', $access_token );
        } else {
            $this->set_config_value( 'tsutaeru_access_token', $access_token, $workspace->id );
        }
    }

    function get_cache_dir ( $workspace_id, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $fmgr = $app->fmgr;
        $whole_dictionary = $this->get_config_value( 'simplifiedjapanese_whole_dictionary' );
        if ( $whole_dictionary ) {
            $use_whole = $this->get_config_value( 'simplifiedjapanese_use_whole_dict', $workspace_id );
            if ( $use_whole ) $workspace_id = 'whole';
        }
        $cache_dir =  $app->support_dir . DS
                   . 'cache' . DS . 'simplifiedjapanese_cache' . DS . $workspace_id;
        if (! $fmgr->exists( $cache_dir ) ) {
            $fmgr->mkpath( $cache_dir );
        }
        return $cache_dir;
    }

    function get_mecab ( $app, $workspace_id = 0, $use_dic = true, $user_dic = null, $dic_path = null ) {
        $cache_key = $app->db->make_cache_key( $workspace_id, $use_dic, $user_dic, $dic_path );
        if ( isset( $this->instances[ $cache_key ] ) ) {
            if ( isset( $this->instances_dics[ $cache_key ] ) ) {
                $this->dictionaries = $this->instances_dics[ $cache_key ];
            }
            return $this->instances[ $cache_key ];
        }
        $class_name= 'Mecab\Tagger';
        $mecab = null;
        $whole_dict = null;
        if ( $use_dic ) {
            $whole_dict = isset( $this->whole_dict[ $workspace_id ] ) ? $this->whole_dict[ $workspace_id ]
                        : $this->get_config_value( 'simplifiedjapanese_use_whole_dict', $workspace_id );
            $this->whole_dict[ $workspace_id ] = $whole_dict;
            if ( $user_dic = $app->simplifiedjapanese_dic_path ) { // for tsutaeru.cloud
                $regex = '<\${0,1}' . $app->ctx->prefix;
                if ( preg_match( "/$regex/i", $user_dic ) ) {
                    $app->init_tags();
                    if ( $workspace_id ) {
                        $app->ctx->stash( 'workspace', $app->db->model( 'workspace' )->load( $workspace_id ) );
                    }
                    $user_dic = $app->build( $user_dic );
                }
            } else {
                $dic_dir = $app->support_dir . DS . 'dictionaries' . DS;
                if (! $user_dic ) {
                    $user_dic = $whole_dict ? $dic_dir . 'dictionary_whole.dic'
                                            : $dic_dir . 'dictionary_' . $workspace_id . '.dic';
                }
            }
            if (! $user_dic || ! file_exists( $user_dic ) ) {
                $user_dic = null;
            }
            $this->user_dics[ $workspace_id ] = $user_dic;
        }
        $dic_path = $dic_path ? $dic_path : $app->simplifiedjapanese_mecab_dic_path;
        if (! is_dir( $dic_path ) ) {
            $dic_path = null;
        }
        $_user_dic = $app->get_table( 'user_dic' );
        $mecab = $this->get_command( 'mecab' );
        if ( class_exists( $class_name ) ) {
            $options = [];
            if ( $dic_path ) {
                $options['-d'] = $dic_path;
            }
            if ( $user_dic ) {
                $options['-u'] = $user_dic;
            }
            $mecab = new MeCab\Tagger( $options );
        } else if ( $mecab ) {
            if ( $dic_path ) $dic_path = escapeshellarg( $dic_path );
            if ( $user_dic ) $user_dic = escapeshellarg( $user_dic );
            $mecab = $dic_path ? $mecab . " -d {$dic_path}" : $mecab;
            $mecab = $user_dic ? $mecab . " -u {$user_dic}" : $mecab;
        } else {
            if ( $this->dictionaries === null && $_user_dic ) {
                $terms = ['status' => 2];
                if (! $whole_dict ) {
                    $terms['workspace_id'] = $workspace_id;
                }
                $sth = $app->db->model( 'user_dic' )->load_iter( $terms, [], 'word,phonetic' );
                $this->dictionaries = $sth->fetchAll( PDO::FETCH_UNIQUE );
            }
        }
        if ( $use_dic && !$user_dic && $this->dictionaries === null && $_user_dic ) {
            $terms = ['status' => 2];
            if (! $whole_dict ) {
                $terms['workspace_id'] = $workspace_id;
            }
            $sth = $app->db->model( 'user_dic' )->load_iter( $terms, [], 'word,phonetic' );
            $this->dictionaries = $sth->fetchAll( PDO::FETCH_UNIQUE );
        }
        $this->instances[ $cache_key ] = $mecab;
        $this->instances_dics[ $cache_key ] = $this->dictionaries;
        return $mecab;
    }

    function get_phonetic ( $text, $mecab ) {
        $text = strip_tags( $text );
        $parse = $this->mecab_parse( $text, $mecab );
        $phonetic = '';
        foreach ( $parse as $res ) {
            if ( $res === 'EOS' ) break;
            $split = explode( ',', $res );
            $phonetic .= isset( $split[ 7 ] ) ? $split[ 7 ] : '';
        }
        $phonetic = mb_convert_kana( $phonetic, 'c', 'UTF-8' );
        return $phonetic;
    }

    function mecab_parse_simple ( $text, $mecab = null, $parse = false, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        if (! $mecab || is_numeric( $mecab ) ) {
            $mecab = $this->get_mecab( $app, 0, true );
        }
        $text = html_entity_decode( $text );
        $workspace_id = $app->ctx->stash( 'workspace' )
                      ? $app->ctx->stash( 'workspace' )->id : 0;
        $detect_chinese = $this->get_config_value( 'simplifiedjapanese_detect_chinese', $workspace_id );
        if ( $detect_chinese && !is_numeric( $mecab ) ) {
            require_once( 'lib' . DS . 'class.PTDetectChinese.php' );
            $chinese_sentences = PTDetectChinese::chinese_sentences( $text );
            if (! empty( $chinese_sentences ) ) {
                foreach ( $chinese_sentences as $chinese_sentence ) {
                    $magic = self::magic( $text );
                    $text = str_replace( $chinese_sentence, " {$magic} ", $text );
                    $chinese_map[ $magic ] = $chinese_sentence;
                }
            }
        }
        if ( is_object( $mecab ) ) {
            $result = $mecab->parse( $text );
        } else {
            $work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir();
            $work_dir = rtrim( $work_dir, DS ) . DS;
            $this->work_dir = $work_dir;
            $out = $work_dir . md5( $text ) . '.txt';
            $app->fmgr->put( $out, "{$text}\n" );
            $command = "{$mecab} {$out}";
            $result = shell_exec( $command );
        }
        if (! empty( $chinese_map ) ) {
            foreach ( $chinese_map as $magic => $chinese_sentense ) {
                $result = str_replace( $magic, $chinese_sentense, $result );
            }
        }
        $result = explode( PHP_EOL, rtrim( $result ) );
        if ( $parse ) {
            foreach ( $result as $idx => $line ) {
                if ( $line === 'EOS' ) continue;
                list( $word, $setting ) = explode( "\t", $line );
                $csv = explode( ',', $setting );
                $result[ $idx ] = [ $word, $csv, $setting ];
            }
        }
        return $result;
    }

    function cabocha_parse ( $text, $app, $dic_path = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $cabocha = $app->simplifiedjapanese_cabocha_path;
        if (! file_exists( $cabocha ) ) {
            return false;
        }
        $work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir();
        $work_dir = rtrim( $work_dir, DS ) . DS;
        $this->work_dir = $work_dir;
        $out = $work_dir . md5( $text ) . '.txt';
        $app->fmgr->put( $out, "{$text}\n" );
        $opt = '';
        $dic_path = $dic_path ? $dic_path : $app->simplifiedjapanese_mecab_dic_path;
        if ( $app->simplifiedjapanese_mecab_dic_path ) {
            $dic_path = escapeshellarg( $dic_path );
            $opt = " -d {$dic_path} ";
        }
        $command = "{$cabocha} -f 3{$opt}{$out}";
        $result = shell_exec( $command );
        return $result;
    }

    function mecab_parse ( $text, $mecab = null, $app = null ) {
        $text = html_entity_decode( $text );
        $app = $app ? $app : Prototype::get_instance();
        $workspace_id = $app->ctx->stash( 'workspace' )
                      ? $app->ctx->stash( 'workspace' )->id : 0;
        $caching = isset( $this->caching[ $workspace_id ] ) ? $this->caching[ $workspace_id ]
                 : $this->get_config_value( 'simplifiedjapanese_caching', $workspace_id );
        $detect_chinese = $this->get_config_value( 'simplifiedjapanese_detect_chinese', $workspace_id );
        $chinese_map = [];
        if ( $detect_chinese && !is_numeric( $mecab ) ) {
            require_once( 'lib' . DS . 'class.PTDetectChinese.php' );
            $chinese_sentences = PTDetectChinese::chinese_sentences( $text );
            if (! empty( $chinese_sentences ) ) {
                foreach ( $chinese_sentences as $chinese_sentence ) {
                    $magic = self::magic( $text );
                    $text = str_replace( $chinese_sentence, " {$magic} ", $text );
                    $chinese_map[ $magic ] = $chinese_sentence;
                    $caching = false;
                }
            }
        }
        if (! $mecab || is_numeric( $mecab ) ) {
            $mecab = $this->get_mecab( $app, 0, true );
        }
        if ( $mecab === null ) {
            if ( isset( $this->parsed[ $text ] ) ) {
                return $this->parsed[ $text ];
            }
            $fmgr = $app->fmgr;
            if (! $this->access_token ) {
                $access_token = $this->get_token( $app, $this->retry );
            }
            $access_token = $this->access_token;
            if (! $access_token ) {
                return [];
            }
            $endPoint = $app->tsutaeru_parse_endpoint;
            $data = [
                'phrase' => $text
            ];
            $options = [
              'http' => [
                  'method'  => 'POST',
                  'content' => json_encode( $data ),
                  'header'  => "access_token: {$access_token}\r\n"
                             . "Content-Type: application/x-www-form-urlencoded"
              ]
            ];
            // $caching = true; // Force caching.
            if ( $caching ) {
                $cache_dir =  $this->get_cache_dir( $workspace_id, $app );
                $cache = $cache_dir . DS . md5( $text ) . '-parse.json';
                if ( $fmgr->exists( $cache ) ) {
                    $result = json_decode( $fmgr->get( $cache , true ) );
                    if ( $result !== null ) {
                        return $result;
                    }
                }
            }
            $context = PTUtil::stream_context_create( $options );
            $result = file_get_contents( $endPoint, false, $context );
            $json = json_decode( $result, true );
            $status = $json['status'];
            if ( $status == 500 ) {
                $message = $this->translate(
                    'Simplified Japanese translation failed because text is too large.' );
                $this->errors[ $message ] = true;
                return [];
            } else if (! $this->retry && ( $status == 400 || $status == 401 ) ) {
                $this->access_token = null;
                $this->retry = true;
                return $this->mecab_parse( $text, $mecab, $app );
            }
            $result = $json['result'];
            foreach ( $result as $idx => $res ) {
                $result[ $idx ] = htmlspecialchars( $res );
            }
            if (! empty( $chinese_map ) ) {
                $text = implode( PHP_EOL, $result );
                foreach ( $chinese_map as $magic => $chinese_sentense ) {
                    $text = str_replace( $magic, $chinese_sentense, $text );
                }
                $result = explode( PHP_EOL, rtrim( $text ) );
            }
            if ( is_array( $this->dictionaries ) && !empty( $this->dictionaries ) ) {
                $this->apply_user_dic( $result );
            }
            if ( $caching ) {
                $fmgr->put( $cache, json_encode( $result ) );
            }
            return $result;
        }
        if ( is_object( $mecab ) ) {
            $result = $mecab->parse( $text );
        } else {
            $work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir();
            $work_dir = rtrim( $work_dir, DS ) . DS;
            $this->work_dir = $work_dir;
            $out = $work_dir . md5( $text ) . '.txt';
            $app->fmgr->put( $out, "{$text}\n" );
            $command = "{$mecab} {$out}";
            $result = shell_exec( $command );
        }
        if (! empty( $chinese_map ) ) {
            foreach ( $chinese_map as $magic => $chinese_sentense ) {
                $result = str_replace( $magic, $chinese_sentense, $result );
            }
        }
        $result = htmlspecialchars( $result );
        $result = explode( PHP_EOL, rtrim( $result ) );
        if ( is_array( $this->dictionaries ) && !empty( $this->dictionaries ) ) {
            $this->apply_user_dic( $result );
        }
        return $result;
    }

    function apply_user_dic ( &$result ) {
        $dictionaries = $this->dictionaries;
        foreach ( $result as $index => $res ) {
            if ( $res === 'EOS' ) break;
            list( $w, $csv ) = explode( "\t", $res );
            if ( isset( $dictionaries[ $w ] ) ) {
                $phonetic = $dictionaries[ $w ]->user_dic_phonetic;
                $csv = preg_replace( "/\,[^\,]*?\,[^\,]*$/", '', $csv );
                $csv .= "{$phonetic},{$phonetic}";
                $result[ $index ] = "{$w}\t{$csv}";
            }
        }
        return $result;
    }

    function filter_ssml2furigana ( $content, $arg, $ctx ) {
        $workspace_id = $ctx->stash( 'workspace' ) ? (int) $ctx->stash( 'workspace' )->id : 0;
        $add_rp = $this->get_config_value( 'simplifiedjapanese_add_rp', $workspace_id );
        if ( strpos( $content, '<phoneme' ) !== false ) {
            $content = $add_rp ? 
                preg_replace( '!<phoneme type="ruby" ph="(.*?)">(.*?)</phoneme>!',
                      '<ruby>$2<rp> (</rp><rt>$1</rt><rp>) </rp></ruby>', $content ) : 
                preg_replace( '!<phoneme type="ruby" ph="(.*?)">(.*?)</phoneme>!',
                          '<ruby>$2<rt>$1</rt></ruby>', $content );
            if ( strpos( $content, 'alphabet="x-amazon-pron-kana"' ) !== false ) {
                preg_match_all( '!<phoneme alphabet="x\-amazon\-pron\-kana" ph="(.*?)">(.*?)</phoneme>!', $content, $matches );
                if (! empty( $matches ) ) {
                    $ph_tags = $matches[0];
                    $furiganas = $matches[1];
                    $parents = $matches[2];
                    foreach ( $ph_tags as $idx => $ph_tag ) {
                        $k_kana = $furiganas[ $idx ];
                        $k_kana = mb_convert_kana( $k_kana, 'c' );
                        $k_kana = str_replace( "'", '', $k_kana );
                        $ph_tag_replace = '<phoneme alphabet="x-amazon-pron-kana" ph="' . $k_kana . '">' . $parents[ $idx ] . '</phoneme>';
                        $content = str_replace( $ph_tag, $ph_tag_replace, $content );
                    }
                }
            }
            $content = $add_rp ? 
                preg_replace( '!<phoneme alphabet="x\-amazon\-pron\-kana" ph="(.*?)">(.*?)</phoneme>!',
                      '<ruby>$2<rp> (</rp><rt>$1</rt><rp>) </rp></ruby>', $content ) : 
                preg_replace( '!<phoneme alphabet="x\-amazon\-pron\-kana" ph="(.*?)">(.*?)</phoneme>!',
                          '<ruby>$2<rt>$1</rt></ruby>', $content );
        }
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

    function filter_furigana ( $content, $arg, $ctx, $simplified = false ) {
        $app = $ctx->app;
        $original = $content;
        if ( $simplified && $simplified == 'furigana' ) {
            $simplified = false;
        }
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
        $work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir();
        $work_dir = rtrim( $work_dir, DS ) . DS;
        $this->work_dir = $work_dir;
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $caching = isset( $this->caching[ $workspace_id ] ) ? $this->caching[ $workspace_id ]
                 : $this->get_config_value( 'simplifiedjapanese_caching', $workspace_id );
        $this->caching[ $workspace_id ] = $caching;
        $separator = isset( $this->separators[ $workspace_id ] ) ? $this->separators[ $workspace_id ]
                   : $this->get_config_value( 'simplifiedjapanese_separator', $workspace_id );
        $this->separators[ $workspace_id ] = $separator;
        $add_rp = isset( $this->add_rp_tag[ $workspace_id ] ) ? $this->add_rp_tag[ $workspace_id ]
                : $this->get_config_value( 'simplifiedjapanese_add_rp', $workspace_id );
        $this->add_rp_tag[ $workspace_id ] = $add_rp;
        $cache_dir = '';
        $fmgr = $app->fmgr;
        if ( $caching ) {
            $cache_dir =  $this->get_cache_dir( $workspace_id, $app );
            $arg = (int) $arg;
            $pfx = $simplified ? '-simplified' : '';
            $cache_path = $cache_dir . DS . md5( $content ) . "{$pfx}-{$arg}";
            if ( $simplified ) $json_cache_path = "{$cache_path}.json";
            $cache_path .= '.html';
            if ( $fmgr->exists( $cache_path ) ) {
                $res = $fmgr->get( $cache_path );
                if ( $res ) {
                    if ( $simplified && $fmgr->exists( $json_cache_path ) ) {
                        $results = json_decode( $fmgr->get( $json_cache_path ) );
                        if ( is_object( $results ) ) {
                            $this->changed = $results->changed;
                            $this->difficulty1 = $results->difficulty1;
                            $this->difficulty2 = $results->difficulty2;
                        }
                    }
                    return $res;
                }
            }
        }
        $use_whole = $this->get_config_value( 'simplifiedjapanese_use_whole_dict', $workspace_id );
        $terms = ['status' => 2, 'exception' => 0];
        if (! $use_whole ) {
            $terms['workspace_id'] = $workspace_id;
        }
        $user_dics = $app->db->model( 'user_dic' )->load( $terms, null, 'word,phonetic' );
        $dict_mapping = [];
        foreach ( $user_dics as $user_dic ) {
            $dict_mapping[ $user_dic->word ] = $user_dic->phonetic;
        }
        $mecab = $this->get_mecab( $app, $workspace_id );
        if ( $this->in_modifier && $mecab === null ) {
            return $content;
        } else if ( $mecab === null && ( !$this->client_id || !$this->client_secret ) ) {
            return $content;
        } else if ( $mecab === null && strpos( $content, '<' ) !== false ) {
            $this->pre_parse( $content, $app, $workspace_id );
        }
        $dictionaries = [];
        if ( $app->simplifiedjapanese_dic_path ) { // for tsutaeru.cloud
            $ids = $workspace_id ? array_unique( [1, $workspace_id] ) : [1];
            $args = ['sort' => 'workspace_id', 'direction' => 'descend'];
            $terms = ['workspace_id' => ['IN' => $ids ], 'option' => 'Exception'];
            $dictionaries = $app->db->model( 'user_dic' )->load( $terms, $args, 'word' );
        } else {
            $terms = ['exception' => 1, 'status' => 2];
            if (! $app->simplifiedjapanese_exception_all ) {
                if (! $workspace_id ) {
                    $use_whole = $this->get_config_value( 'simplifiedjapanese_use_whole_dict', $workspace_id );
                    if (! $use_whole ) {
                        $terms['workspace_id'] = 0;
                    }
                } else {
                    $terms['workspace_id'] = $workspace_id;
                }
            }
            $dictionaries = $app->db->model( 'user_dic' )->load( $terms, [], 'word' );
        }
        $exception_tokens = [];
        if (! empty( $dictionaries ) ) {
            $exceptions = [];
            foreach ( $dictionaries as $dict ) {
                $exceptions[ $dict->word ] = true;
            }
            $all_keys = array_map('strlen', array_keys( $exceptions ) );
            array_multisort( $all_keys, SORT_DESC, $exceptions );
            $exceptions = array_keys( $exceptions );
            $magic_tokens = [];
            foreach ( $exceptions as $exception ) {
                $token = static::magic( $content, $magic_tokens );
                $content = static::str_replace_once( $exception, $token, $content );
                $exception_tokens[ $token ] = $exception;
            }
        }
        $contents = preg_split( '/(<[^>]*?>)/s',
                    $content, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
        $content = '';
        $in_ruby = false;
        $all_res = [];
        $rp_start = $add_rp ? '<rp> (</rp>' : '';
        $rp_end = $add_rp ? '<rp>) </rp>' : '';
        $date_kana = self::DATE_KANA;
        foreach ( $contents as $data ) {
            if ( $data === '' ) continue;
            if (! $in_ruby &&
              ( strpos( $data, '<' ) === false && strpos( $data, '>' ) === false ) ) {
                if ( $arg == 1 || $arg == 2 || $arg == 3 || $arg == 5 ) {
                    //issues/1603
                    $data = html_entity_decode( $data );
                }
                if ( strlen( $data ) !== mb_strlen( $data ) ) {
                    $dates = [];
                    // 日付表記
                    if ( preg_match_all( '/([0-9]{1,})月/u', $data, $matches ) ) {
                        $all_matches = $matches[0];
                        $num_matches = $matches[1];
                        foreach ( $num_matches as $idx => $numChar ) {
                            if ( $numChar > 0 && $numChar < 13 ) {
                                $date = $all_matches[ $idx ];
                                $magic = self::magic( $data );
                                $data = str_replace( $date, $magic, $data );
                                $date = "{$numChar}<ruby>月{$rp_start}<rt>がつ</rt>{$rp_end}</ruby>";
                                $dates[ $magic ] = $date;
                            }
                        }
                    }
                    if ( $app->simplifiedjapanese_reflects_dates ) {
                        $_data = 'あ' . $data; // ダミー文字を行頭に追加
                        if ( preg_match_all( '/[^0-9]([0-9]{1,2})日/u', $_data, $matches ) ) {
                            foreach ( $matches[0] as $idx => $match ) {
                                $matches[0][ $idx ] = $matches[1][ $idx ] . '日';
                            }
                            $all_matches = $matches[0];
                            $num_matches = $matches[1];
                            for ( $i = 0; $i < 2; $i++ ) {
                                foreach ( $num_matches as $idx => $numChar ) {
                                    if ( isset( $date_kana[ $numChar ] ) ) {
                                        $numChar = (int) $numChar;
                                        if ( strlen( $numChar ) === 1 && !$i ) {
                                            // 2桁の数値を先に処理する
                                            continue;
                                        }
                                        $date = $all_matches[ $idx ];
                                        $yomi = $date_kana[ $numChar ];
                                        $magic = self::magic( $data );
                                        $data = str_replace( $date, $magic, $data );
                                        $date = "<ruby>{$numChar}日{$rp_start}<rt>{$yomi}</rt>{$rp_end}</ruby>";
                                        $dates[ $magic ] = $date;
                                    }
                                }
                            }
                        }
                    }
                    if ( $simplified ) {
                        $data = $this->simplified_japanese( $data, $app, $workspace_id );
                    }
                    $res = $this->mecab_parse( $data, $mecab );
                    $all_res = array_merge( $all_res, $res );
                    $data = $this->finalize( $app, $res, $data, $arg, $separator, $add_rp, $dict_mapping );
                    if (!empty( $dates ) ) {
                        foreach ( $dates as $magic => $date ) {
                            $data = str_replace( $magic, $date, $data );
                        }
                    }
                    array_pop( $res );
                    $all_res = array_unique( array_merge( $all_res, $res ) );
                }
            } else {
                if ( $simplified ) {
                    $strip_data = strip_tags( $data );
                    $this->changed .= $strip_data;
                    $this->difficulty1 .= $strip_data;
                    $this->difficulty2 .= $strip_data;
                }
                if ( stripos( $data, '<ruby' ) === 0 ) {
                    $in_ruby = true;
                } else if ( stripos( $data, '</ruby' ) === 0 ) {
                    $in_ruby = false;
                }
            }
            $content .= $data;
        }
        if ( $simplified && !empty( $this->appended ) ) {
            $appended = $this->appended;
            $text_format = $app->param( 'text_format' );
            foreach ( $appended as $append ) {
                if ( stripos( $original, $append ) !== false ) continue;
                $append = $this->simplified_japanese( $append, $app, $workspace_id, true, true );
                if ( $arg == 2 || $arg == 3 || $arg == 5 ) {
                    //issues/1603
                    $append = html_entity_decode( $append );
                }
                $res = $this->mecab_parse( $append, $mecab );
                $count = count( $res ) - 1;
                $contain = 0;
                foreach ( $res as $part ) {
                    if ( $part == 'EOS' ) break;
                    if ( in_array( $part, $all_res ) ) {
                        $contain++;
                    }
                }
                $hit = $contain / $count;
                if ( $hit > self::APPEND_THRESHOLD ) {
                    continue;
                }
                $append = $this->finalize( $app, $res, $append, $arg, $separator, $add_rp, $dict_mapping );
                if ( $text_format == 'richtext' || $text_format == 'convert_breaks' ) {
                    $append = "<p>{$append}</p>";
                }
                $content .= $append;
            }
        }
        if (! empty( $exception_tokens ) ) {
            foreach ( $exception_tokens as $token => $exception ) {
                $content = static::str_replace_once( $token, $exception, $content );
                $this->changed = static::str_replace_once( $token, $exception, $this->changed );
                $this->difficulty2 = static::str_replace_once( $token, $exception, $this->difficulty2 );
            }
        }
        if ( $caching && $cache_path && $content ) {
            $fmgr->put( $cache_path, $content );
            if ( $simplified ) {
                $json = ['changed' => $this->changed, 'difficulty1' => $this->difficulty1, 'difficulty2' => $this->difficulty2 ];
                $fmgr->put( $json_cache_path, json_encode( $json ) );
            }
        }
        return $content;
    }

    function filter_hiragana ( $content, $arg, $ctx ) {
        $app = $ctx->app;
        $fmgr = $app->fmgr;
        $work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir();
        $work_dir = rtrim( $work_dir, DS ) . DS;
        $this->work_dir = $work_dir;
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $caching = isset( $this->caching[ $workspace_id ] ) ? $this->caching[ $workspace_id ]
                 : $this->get_config_value( 'simplifiedjapanese_caching', $workspace_id );
        $this->caching[ $workspace_id ] = $caching;
        if ( $caching ) {
            $cache_dir =  $this->get_cache_dir( $workspace_id, $app );
            $arg = (int) $arg;
            if (! $arg ) $arg = 1;
            $pfx = '-kana';
            $cache_path = $cache_dir . DS . md5( $content ) . "{$pfx}-{$arg}";
            if ( $fmgr->exists( $cache_path ) ) {
                return $fmgr->get( $cache_path );
            }
        }
        $use_whole = $this->get_config_value( 'simplifiedjapanese_use_whole_dict', $workspace_id );
        $terms = ['status' => 2, 'exception' => 0];
        if (! $use_whole ) {
            $terms['workspace_id'] = $workspace_id;
        }
        $user_dics = $app->db->model( 'user_dic' )->load( $terms, null, 'word,phonetic' );
        $dict_mapping = [];
        foreach ( $user_dics as $user_dic ) {
            $dict_mapping[ $user_dic->word ] = $user_dic->phonetic;
        }
        $content = str_replace( '～', '〜', $content );
        $content = PTUtil::normalize( $content );
        $contents = preg_split( '/(<[^>]*?>)/s',
                    $content, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
        $phrases = [];
        foreach ( $contents as $data ) {
            if (! $data ) continue;
            if ( strpos( $data, '<' ) === false && strpos( $data, '>' ) === false ) {
                $parse = $this->mecab_parse( strip_tags( $data ) );
                $kana = '';
                $pre_single = false;
                $single = false;
                foreach ( $parse as $part ) {
                    if ( $part === 'EOS' ) continue;
                    $parts = explode( ',', $part );
                    $yomi = $parts[7] ?? $parts[0];
                    list( $yomi, $pos ) = strpos( $yomi, "\t" ) ? explode( "\t", $yomi ) : [ $yomi, ''];
                    $single = strlen( $yomi ) === mb_strlen( $yomi );
                    list( $original, $pos ) = array_pad( explode( "\t", $parts[0] ), 2, null );
                    if ( isset( $dict_mapping[ $original ] ) ) {
                        $yomi = $dict_mapping[ $original ];
                    } else {
                        if ( $pre_single && $single && $parts[1] !== 'サ変接続' ) {
                            $kana .= ' ';
                        }
                    }
                    if ( $arg == 2 ) {
                        if ( $original != $yomi ) {
                            $yomi = mb_convert_kana( $yomi, 'c' );
                        }
                    }
                    $kana .= $yomi;
                    $pre_single = $single;
                }
                $phrases[] = $kana;
            } else {
                $phrases[] = $data;
            }
        }
        $content = implode( $phrases );
        if (! $arg || $arg == 1 ) {
            $content = mb_convert_kana( $content, 'c' );
        } else if ( $arg == 3 ) {
            $content = mb_convert_kana( $content, 'C' );
        }
        if ( $caching && $cache_path && $content ) {
            $fmgr->put( $cache_path, $content );
        }
        return $content;
    }

    function filter_katakana ( $content, $arg, $ctx ) {
        $arg = $arg == 2 ? 4 : 3;
        return $this->filter_hiragana( $content, $arg, $ctx );
    }

    function filter_kana ( $content, $arg, $ctx ) {
        $arg = 2;
        return $this->filter_hiragana( $content, $arg, $ctx );
    }

    function pre_parse ( $content, $app, $workspace_id ) {
        $fmgr = $app->fmgr;
        $workspace_id = $app->ctx->stash( 'workspace' )
                      ? $app->ctx->stash( 'workspace' )->id : 0;
        $caching = isset( $this->caching[ $workspace_id ] ) ? $this->caching[ $workspace_id ]
                 : $this->get_config_value( 'simplifiedjapanese_caching', $workspace_id );
        $pre_parse_cache = '';
        $result = null;
        if ( $caching ) {
            $cache_dir =  $this->get_cache_dir( $workspace_id, $app );
            $pre_parse_cache = $cache_dir . DS . md5( $content ) . '-pre_parse.json';
            if ( $fmgr->exists( $pre_parse_cache ) ) {
                $result = $fmgr->get( $pre_parse_cache );
            }
        }
        if ( $result === null ) {
            $contents = preg_split( '/(<[^>]*?>)/s',
                        $content, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
            $phrases = [];
            $in_ruby = false;
            foreach ( $contents as $data ) {
                if (! $data ) continue;
                if (! $in_ruby &&
                  ( strpos( $data, '<' ) === false && strpos( $data, '>' ) === false ) ) {
                    if ( strlen( $data ) !== mb_strlen( $data ) ) {
                        $phrases[] = $data;
                    }
                } else {
                    if ( stripos( $data, '<ruby' ) === 0 ) {
                        $in_ruby = true;
                    } else if ( stripos( $data, '</ruby' ) === 0 ) {
                        $in_ruby = false;
                    }
                }
            }
            if (! $this->access_token ) {
                $access_token = $this->get_token( $app, $this->retry );
            }
            $access_token = $this->access_token;
            if (! $access_token ) {
                return [];
            }
            $endPoint = $app->tsutaeru_parse_endpoint;
            $data = [
                'phrases' => $phrases
            ];
            $options = [
              'http' => [
                  'method'  => 'POST',
                  'content' => json_encode( $data ),
                  'header'  => "access_token: {$access_token}\r\n"
                             . "Content-Type: application/x-www-form-urlencoded"
              ]
            ];
            $context = PTUtil::stream_context_create( $options );
            $result = file_get_contents( $endPoint, false, $context );
            if ( $caching ) {
                $result = json_decode( $result, true );
                if ( is_array( $result ) ) {
                    $status = $result['status'];
                    if ( $status == 200 ) {
                        $fmgr->put( $pre_parse_cache, $result );
                    }
                }
            }
        }
        $result = is_array( $result ) ? $result : json_decode( $result, true );
        $status = $result['status'];
        if ( $status == 200 ) {
            $results = $result['results'];
            foreach ( $phrases as $index => $text ) {
                if ( isset( $this->parsed[ $text ] ) ) continue;
                $encoded = json_encode( $results[ $index ] );
                if ( $caching && $encoded !== null ) {
                    $cache = $cache_dir . DS . md5( $text ) . '-parse.json';
                    $fmgr->put( $cache, $encoded );
                }
                $this->parsed[ $text ] = $results[ $index ];
            }
        }
    }

    function finalize ( $app, $parse, $content, $arg, $separator, $add_rp, $mapping = [] ) {
        if ( $arg == 6 ) {
            return $content;
        }
        $workspace_id = $app->ctx->stash( 'workspace' )
                      ? $app->ctx->stash( 'workspace' )->id : 0;
        $detect_chinese = $this->get_config_value( 'simplifiedjapanese_detect_chinese', $workspace_id );
        $chinese_map = [];
        if ( $detect_chinese ) {
            require_once( 'lib' . DS . 'class.PTDetectChinese.php' );
            $chinese_sentences = PTDetectChinese::chinese_sentences( $content );
            if (! empty( $chinese_sentences ) ) {
                foreach ( $chinese_sentences as $chinese_sentence ) {
                    $magic = self::magic( $content );
                    $content = str_replace( $chinese_sentence, $magic, $content );
                    $chinese_map[ $magic ] = $chinese_sentence;
                }
            }
        }
        list ( $last_part, $last_kind, $counter ) = ['', '', 0];
        if ( $arg == 2 || $arg == 3 || $arg == 5 ) {
            $split_content = '';
            foreach ( $parse as $part ) {
                if ( $part == 'EOS' ) {
                    continue;
                }
                list( $phrase, $info ) = explode( "\t", $part );
                $add_pre_space = isset( $previous_phrase ) && $previous_phrase &&
                                 mb_strlen( $previous_phrase ) === strlen( $previous_phrase ) &&
                                 mb_strlen( $phrase ) === strlen( $phrase );
                $previous_phrase = $phrase;
                if ( $add_pre_space && !preg_match( '/^[A-Za-z0-9]/', $phrase ) ) {
                    $add_pre_space = false;
                }
                $add_pre_space = $add_pre_space ? ' ' : '';
                $csv = explode( ',', $info );
                if ( $phrase == ';' || $phrase == '&' ) {
                    $csv[0] = '記号';
                    if ( $phrase == '&' ) {
                        $add_pre_space = ' ';
                    }
                }
                $previous_part = $last_part;
                if ( $csv[0] == '名詞' && $csv[1] == 'サ変接続' ) {
                    $last_part = '';
                } else if ( $csv[0] == '名詞' && $csv[1] == '自立' ) {
                    $last_part = '';
                }
                if ( $last_part != $csv[0] && $csv[0] != '記号' &&
                    ( ( $csv[0] == '名詞' && ( $csv[1] != '数' && $last_part != '記号'
                    && $csv[1] != '接尾' && $csv[1] != '非自立' && $last_kind != '数' ) )
                    || ( $csv[0] == '動詞' && $csv[4] != 'サ変・スル' ) // && $csv[1] != '非自立' )
                    || $csv[0] == '形容詞' || $csv[0] == '副詞' || $csv[0] == '接頭詞'
                    || $csv[0] == '連体詞' || $csv[0] == '感動詞') ) {
                    if ( $counter && $phrase != ';' && $previous_part != '記号'
                        && $previous_part != '接頭詞' ) { // && $csv[1] != '非自立'
                        $split_content .= $separator . $phrase;
                    } else {
                        $split_content .= $add_pre_space . $phrase;
                    }
                    $counter++;
                } else if ( $phrase && $csv[1] == '固有名詞' ) {
                    if (! preg_match( '/^[_a-zA-Z0-9]+$/', $phrase ) ) {
                        $split_content .= $separator . $phrase;
                    } else {
                        $split_content .= $add_pre_space . $phrase;
                    }
                    $counter++;
                } else {
                    $split_content .= $add_pre_space . $phrase;
                }
                $last_part = $csv[0];
                $last_kind = $csv[1];
            }
            $brackets = self::BRACKETS;
            foreach ( $brackets as $bracket ) {
                $split_content = str_replace( "{$separator}{$bracket}", $bracket, $split_content );
                $split_content = str_replace( "{$bracket}{$separator}", $bracket, $split_content );
            }
            if ( $arg == 3 ) {
                if (! empty( $chinese_map ) ) {
                    foreach ( $chinese_map as $magic => $chinese_sentense ) {
                        $split_content = str_replace( $magic, $chinese_sentense, $split_content );
                    }
                }
                return $split_content;
            }
            $content = $split_content;
        }
        if ( $arg == -1 ) {
            if (! empty( $chinese_map ) ) {
                foreach ( $chinese_map as $magic => $chinese_sentense ) {
                    $split_content = str_replace( $magic, $chinese_sentense, $split_content );
                }
            }
            return $content;
        }
        $tokens = [];
        $magic_tokens = [];
        $kanji = self::KANJI_CHAR;
        foreach ( $parse as $part ) {
            if ( $part == 'EOS' ) {
                continue;
            }
            list( $phrase, $info ) = array_pad( explode( "\t", $part ), 2, null );
            if (!$phrase || !$info ) continue;
            $kana = mb_convert_kana( $phrase, 'c', 'UTF-8' );
            $orig_phrase = $phrase;
            if (! $kana ) $kana = $phrase;
            $info = explode( ',', $info );
            $yomi = isset( $info[7] ) ? $info[7] : '';
            if ( $yomi ) $yomi = mb_convert_kana( $yomi, 'c', 'UTF-8' );
            list( $pre, $after ) = ['', ''];
            if ( $yomi && ( $kana != $yomi ) && ! preg_match( "/^[×～＆％✕ー〒]$/u", $phrase ) ) {
                if ( $arg == 4 || $arg == 5 ) {
                } else {
                    if ( preg_match( "/^{$kanji}/u", $phrase ) && preg_match( "/{$kanji}$/u", $phrase ) ) {
                    } else {
                        if ( preg_match( "/^.*?([ぁ-んァ-ンー0-9]{1,}$)/u", $phrase, $matches ) ) {
                            $after = $matches[1];
                            $yomi = preg_replace( "/$after$/", '', $yomi );
                            $phrase = preg_replace( "/$after$/", '', $phrase );
                        }
                        if ( preg_match( "/^([ぁ-んァ-ンー0-9]{1,}).*$/u", $phrase, $matches ) ) {
                            $pre = $matches[1];
                            $yomi = preg_replace( "/^$pre/", '', $yomi );
                            $phrase = preg_replace( "/^$pre/", '', $phrase );
                        }
                    }
                }
                if ( isset( $mapping[ $phrase ] ) ) {
                    $yomi = $mapping[ $phrase ];
                } else {
                    $yomi = mb_convert_kana( $yomi, 'C', 'UTF-8' );
                }
                if ( $pre && preg_match( '/^[ァ-ンー]{1,}$/u', $pre, $matchs ) ) {
                    $pre_kana = $matchs[0];
                    if ( preg_match( "/^{$pre_kana}/", $yomi ) ) {
                        $yomi = preg_replace( "/^{$pre_kana}/", '', $yomi );
                    }
                }
                if ( $after && preg_match( '/^[ァ-ンー]{1,}$/u', $after, $matchs ) ) {
                    $after_kana = $matchs[0];
                    if ( preg_match( "/{$after_kana}$/", $yomi ) ) {
                        $yomi = preg_replace( "/{$after_kana}$/", '', $yomi );
                    }
                }
                if ( preg_match( "/^{$kanji}/u", $phrase ) && preg_match( "/{$kanji}$/u", $phrase ) ) {
                    $phrases = [['phrase' => $phrase, 'yomi' => $yomi ]];
                } else if ( $arg != 4 && $arg != 5
                    && preg_match( "/^(.*?)([ぁ-んァ-ンー]{1,})(.*$)/u", $phrase, $matches ) ) {
                    $split = $matches[2];
                    $pre = $matches[1];
                    $after = $matches[3];
                    $yomi_sp = explode( $split, $yomi );
                    $phrases = [];
                    $yomi_sp0 = $yomi_sp[0] ?? '';
                    $yomi_sp1 = $yomi_sp[1] ?? '';
                    $phrases[] = ['phrase' => $pre, 'yomi' => $yomi_sp0, 'split' => $split ];
                    $phrases[] = ['phrase' => $after, 'yomi' => $yomi_sp1 ];
                } else {
                    $phrases = [['phrase' => $phrase, 'yomi' => $yomi ]];
                }
                $sentence = '';
                foreach ( $phrases as $ph ) {
                    $str = $ph['phrase'];
                    $y = $ph['yomi'];
                    if ( preg_match_all( "/[ぁ-んー]+/u", $str, $matches ) ) {
                        if ( count( $matches[0] ) === 1 && preg_match( "/^{$kanji}/u", $str ) && preg_match( "/{$kanji}$/u", $str ) ) {
                            $separator = $matches[0][0];
                            $y = mb_convert_kana( $y, 'c', 'UTF-8' );
                            if ( mb_substr_count( $y, $separator ) === 1 ) {
                                list( $_pre, $_after ) = explode( $separator, $str );
                                list( $py, $ay ) = explode( $separator, $y );
                                $sentence .= $add_rp ? "<ruby>{$_pre}<rp> (</rp><rt>{$py}</rt><rp>) </rp></ruby>{$separator}"
                                           . "<ruby>{$_after}<rp> (</rp><rt>{$ay}</rt><rp>) </rp></ruby>"
                                           : "<ruby>{$_pre}<rt>{$py}</rt></ruby>{$separator}<ruby>{$_after}<rt>{$ay}</rt></ruby>";
                                if ( isset( $ph['split'] ) ) {
                                    $sentence .= $ph['split'];
                                }
                                continue;
                            }
                        }
                    }
                    $y = mb_convert_kana( $y, 'c', 'UTF-8' );
                    $sentence .= $add_rp ? "<ruby>{$str}<rp> (</rp><rt>{$y}</rt><rp>) </rp></ruby>"
                                         : "<ruby>{$str}<rt>{$y}</rt></ruby>";
                    if ( isset( $ph['split'] ) ) {
                        $sentence .= $ph['split'];
                    }
                }
                if (! preg_match( '/^[a-zA-Z]{1,4}$/', $phrase ) ) {
                    // Tシャツ => $phrase === 'T';
                    $token = static::magic( $content, $magic_tokens );
                    $content = static::str_replace_once( $phrase, $token, $content );
                    $tokens[ $token ] = $sentence;
                    // $content = static::str_replace_once( $orig_phrase, $token, $content );
                    // $tokens[ $token ] = "{$pre}{$sentence}{$after}";
                }
            }
        }
        foreach ( $tokens as $token => $ruby ) {
            $content = static::str_replace_once( $token, $ruby, $content );
        }
        if (! empty( $chinese_map ) ) {
            foreach ( $chinese_map as $magic => $chinese_sentense ) {
                $content = str_replace( $magic, $chinese_sentense, $content );
            }
        }
        return $content;
    }

    function filter_textnode_to_json ( $html, $arg, $ctx ) {
        if (! $arg ) $arg = 1;
        libxml_use_internal_errors( true );
        $dom = new DomDocument();
        if ( stripos( $html, '<body' ) === false ) {
            $html = "<body>{$html}</body>";
        }
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $caching = isset( $this->caching[ $workspace_id ] ) ? $this->caching[ $workspace_id ]
                 : $this->get_config_value( 'simplifiedjapanese_caching', $workspace_id );
        $this->caching[ $workspace_id ] = $caching;
        $app = $ctx->app;
        if ( $caching ) {
            $cache_dir = $this->get_cache_dir( $workspace_id, $app );
            $cache = $cache_dir . DS . md5( $html ) . "-{$arg}-t_f_to_json.json";
            if ( $app->fmgr->exists( $cache ) ) {
                return $app->fmgr->get( $cache );
            }
        }
        if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
            LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
            $body = $dom->getElementsByTagName( 'body' );
            $excludeFurigana = [];
            $textNodes = [];
            $excludes = ['textarea', 'script', 'style', 'rt', 'rp', 'ruby', 'option'];
            $this->getChildrenTextNodes( $body[0], $textNodes, $excludes );
            $replacedMap = [];
            foreach ( $textNodes as $idx => $textNode ) {
                if ( mb_strlen( $textNode ) == strlen( $textNode ) ) {
                    continue;
                } else if ( isset( $replacedMap[ $textNode ] ) ) {
                    continue;
                } else if ( isset( $excludeFurigana[ $textNode ] ) ) {
                    continue;
                } else if ( isset( $this->furigana_conv_map[ $textNode ] ) ) {
                    if ( is_string( $this->furigana_conv_map[ $textNode ] ) ) {
                        $replacedMap[ $textNode ] = $this->furigana_conv_map[ $textNode ];
                    }
                    continue;
                }
                $withRuby = $this->filter_furigana( $textNode, $arg, $ctx, false );
                if ( $textNode !== $withRuby ) {
                    $replacedMap[ $textNode ] = $withRuby;
                    $this->furigana_conv_map[ $textNode ] = $withRuby;
                } else {
                    $excludeFurigana[ $textNode ] = true;
                    $this->furigana_conv_map[ $textNode ] = true;
                }
            }
            $json = $app->debug ? json_encode( $replacedMap, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT )
                                : json_encode( $replacedMap );
            if ( $caching ) {
                $app->fmgr->put( $cache, $json );
            }
            return $json;
        }
        return json_encode( [] );
    }

    function getChildrenTextNodes ( $domNode, &$textNodes = [], $excludes = [] ) {
        if ( $domNode->hasChildNodes() ) {
            $children = [];
            foreach ( $domNode->childNodes as $child ) {
                if ( property_exists( $child, 'tagName' ) ) {
                    if ( in_array( $child->tagName, $excludes ) ) {
                        continue;
                    }
                }
                if ( $child->hasAttributes() ) {
                    $attributes = $child->attributes;
                    if ( $attributes->length ) {
                        for ( $i = 0; $i < $attributes->length; $i++ ) {
                            $attr = $attributes->item( $i );
                            if ( $attr->name === 'lang' ) {
                                if ( $attr->value !== 'ja' ) {
                                    continue 2;
                                }
                            }
                        }
                    }
                }
                $children[] = $child;
            }
            foreach ( $children as $child ) {
                if ( $child->nodeType === XML_TEXT_NODE ) {
                    $textNodes[] = $child->wholeText;
                } else {
                    $this->getChildrenTextNodes( $child, $textNodes, $excludes );
                }
            }
        }
    }

    function summarize ( $text = '', $length = 3, $keywords = [] ) {
        // TODO::Include Date & Time
        $app = Prototype::get_instance();
        if ( stripos( $text, '<ruby' ) !== false ) {
            $text = preg_replace( '!<rt[^>]*?>.*?</rt>!sui', '', $text );
            $text = preg_replace( '!<rp[^>]*?>.*?</rp>!sui', '', $text );
        }
        $original = $text;
        $text = strip_tags( $text );
        $text = str_replace( '&nbsp;', ' ', $text );
        if ( strrpos( $text, '＜' ) !== false || strrpos( $text, '＞' ) !== false ) {
            $br_st  = self::magic( $text );
            $br_end = self::magic( $text );
            $text = str_replace( '＜', $br_st, $text );
            $text = str_replace( '＞', $br_end, $text );
        }
        $text = str_replace( '～', '〜', $text );
        $text = PTUtil::normalize( $text );
        if ( isset( $br_st ) && isset( $br_end ) ) {
            $text = str_replace( $br_st, '＜', $text );
            $text = str_replace( $br_end, '＞', $text );
        }
        $text = trim( str_replace( ["\r\n", "\r", "\n"], '', $text ) );
        $text = preg_replace( "/\s{1,}/u", " ", $text );
        $length = strpos( $length, '.' ) !== false ? (float) $length : (int) $length;
        $length_threshold = 100;
        $short_threshold = 10;
        $duplicate_threshold = 30;
        $this_path = $this->path();
        $csv = $this_path . DS . 'dictionaries' . DS . 'thresholds.csv';
        $csv_handle = new SplFileObject( $csv ); 
        $csv_handle->setFlags( SplFileObject::READ_CSV | 
                               SplFileObject::READ_AHEAD | 
                               SplFileObject::SKIP_EMPTY | 
                               SplFileObject::DROP_NEW_LINE ); 
        $thresholds = [];
        foreach ( $csv_handle as $data ) {
            $thresholds[ $data[0] ] = (int)$data[1];
        }
        $csv = $this_path . DS . 'dictionaries' . DS . 'greetings.csv';
        $csv_handle = new SplFileObject( $csv ); 
        $csv_handle->setFlags( SplFileObject::READ_CSV | 
                               SplFileObject::READ_AHEAD | 
                               SplFileObject::SKIP_EMPTY | 
                               SplFileObject::DROP_NEW_LINE ); 
        $greetings = [];
        foreach ( $csv_handle as $data ) {
            $greetings[ $data[0] ] = (int)$data[1];
        }
        $csv = $this_path . DS . 'dictionaries' . DS . 'delete.csv';
        $csv_handle = new SplFileObject( $csv ); 
        $csv_handle->setFlags( SplFileObject::READ_CSV | 
                               SplFileObject::READ_AHEAD | 
                               SplFileObject::SKIP_EMPTY | 
                               SplFileObject::DROP_NEW_LINE ); 
        $removes = [];
        foreach ( $csv_handle as $data ) {
            $removes[] = $data[0];
        }
        foreach ( $removes as $remove ) {
            if ( strpos( $text, $remove ) !== false ) {
                $text = str_replace( $remove . '、', '', $text );
                $text = str_replace( $remove, '', $text );
            }
        }
        $csv = $this_path . DS . 'dictionaries' . DS . 'notations.csv';
        $csv_handle = new SplFileObject( $csv ); 
        $csv_handle->setFlags( SplFileObject::READ_CSV | 
                               SplFileObject::READ_AHEAD | 
                               SplFileObject::SKIP_EMPTY | 
                               SplFileObject::DROP_NEW_LINE ); 
        foreach ( $csv_handle as $data ) {
            $text = str_replace( $data[0], $data[1], $text );
        }
        $delimiter = '.';
        if ( strpos( $text, '。' ) !== false ) {
            $delimiter = '。';
        }
        $length = is_float( $length ) ? split( $delimiter, $text ) * $length : $length;
        $length = (int) $length;
        $brackets = ['(' => ')', '「' => '」', '〈' => '〉',
                     '『' => '』', '“' => '”', '【' => '】', '＜' => '＞',
                     '《' => '》', '«' => '»', '[' => ']', '『' => '』'];
        $remarks = ['「' => '」'];
        $blockquotes = [];
        $delimiter_quoted = preg_quote( $delimiter, '/' );
        foreach ( $brackets as $bracket_start => $bracket_end ) {
            if ( mb_strpos( $text, $bracket_start ) !== false
                && mb_strpos( $text, $bracket_end ) !== false ) {
                list( $start, $end ) = [ $bracket_start, $bracket_end ];
                $bracket_start = preg_quote( $bracket_start, '/' );
                $bracket_end = preg_quote( $bracket_end, '/' );
                if ( preg_match_all( "/$bracket_start.*?$bracket_end/s", $text, $matches ) ) {
                    if ( strpos( $text, $delimiter ) !== false ) {
                        foreach ( $matches as $all_match ) {
                            foreach ( $all_match as $match ) {
                                $magic = self::magic( $text );
                                $text = str_replace( $match, $magic, $text );
                                if ( stripos( $match, $delimiter ) !== false || strpos( $match, '、' ) !== false ) {
                                    if ( mb_substr_count( $match, $delimiter ) > $length ) {
                                        $inner = preg_replace( "/^$bracket_start/", '', $match );
                                        $inner = preg_replace( "/$bracket_end$/", '', $inner );
                                        $summary = $this->summarize( $inner, $length );
                                        $match = $start . implode( '', $summary ) . $end;
                                    }
                                }
                                $blockquotes[ $magic ] = $match;
                            }
                        }
                    }
                }
            }
        }
        $sentences = [];
        if ( strpos( $text, '。' ) !== false ) {
            $sentences = explode( '。', $text );
        } else {
            $sentences = explode( '.', $text );
        }
        if (! empty( $blockquotes ) ) {
            foreach ( $sentences as $idx => $sentence ) {
                $sentence = $this->restore_content( $sentence, $blockquotes );
                $sentences[ $idx ] = $sentence;
            }
        }
        $last = count( $sentences ) - 2;
        $contents = [];
        foreach ( $sentences as $idx => $sentence ) {
            $sentence = trim( $sentence );
            if ( $last < $idx ) {
                if ( isset( $sentences[ $idx + 2 ] ) ) {
                    $sentence .= $delimiter;
                }
            } else {
                $sentence .= $delimiter;
            }
            if ( $sentence ) {
                $contents[] = $sentence;
            }
        }
        $content_cnt = count( $contents );
        // $length = is_float( $length ) ? (int) $content_cnt * $length : $length;
        $by_length = $contents;
        $values = array_map('strlen', array_values( $by_length ) );
        array_multisort( $values, SORT_DESC, $by_length );
        $class_name= 'Mecab\Tagger';
        $adjustments = [];
        foreach ( $by_length as $idx => $sentense ) {
            if ( mb_strlen( $sentense ) > $length_threshold ) {
                $point = 10 - $idx * 3;
                if ( $point > 0 ) {
                    $adjustments[ md5( $sentense ) ] = $point;
                }
            }
        }
        $phrases = [];
        $conjunctions = [];
        $mecab_path = $this->get_command( 'mecab' );
        $in_heading = [];
        $parse = [];
        if ( $mecab_path || class_exists( $class_name ) ) {
            $parse = $this->mecab_parse( $text );
            foreach ( $parse as $line ) {
                if ( $line == 'EOS' ) break;
                list( $p, $r ) = explode( "\t", $line );
                if ( mb_strlen( $p ) > 1 ) {
                    $list = explode( ',', $r );
                    if ( $list[0] == '名詞' ) {
                        $phrases[ $p ] = isset( $phrases[ $p ] ) ? $phrases[ $p ] + 1 : 1;
                    } else if ( $list[0] == '接続詞' ) {
                        $conjunctions[] = $p;
                    } else if ( $list[0] == '感動詞' ) {
                        $conjunctions[] = $p;
                    } else if ( $list[0] == 'フィラー' ) {
                        $conjunctions[] = $p;
                    }
                }
            }
            if ( strpos( $original, '<' ) !== false && strpos( $original, '>' ) !== false ) {
                libxml_use_internal_errors( true );
                $html = '<html><body>' . $original;
                $dom = new DomDocument();
                if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                    LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                    for ( $i = 1; $i < 7; $i++ ) {
                        $add_point = 7 - $i;
                        $add_point = (int) $add_point;
                        $elements = $dom->getElementsByTagName( 'h' . $i );
                        if ( $elements->length ) {
                            for ( $j = 0; $j < $elements->length; $j++ ) {
                                $element = $elements->item( $j );
                                $heading = strip_tags( static::DOMinnerHTML( $element ) );
                                $hParse = $this->mecab_parse( $heading );
                                foreach ( $hParse as $hLine ) {
                                    if ( $hLine == 'EOS' ) break;
                                    list( $hp, $hr ) = explode( "\t", $hLine );
                                    if ( mb_strlen( $hp ) > 1 ) {
                                        $hList = explode( ',', $hr );
                                        if ( $hList[0] == '名詞' ) {
                                            $in_heading[ $hp ] = isset( $in_heading[ $hp ] ) ? $in_heading[ $hp ] + $add_point : $add_point;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $importants = ['strong', 'em', 'b', 'i'];
                    $add_point = 0.6;
                    foreach ( $importants as $important ) {
                        $elements = $dom->getElementsByTagName( $important );
                        if ( $elements->length ) {
                            for ( $j = 0; $j < $elements->length; $j++ ) {
                                $element = $elements->item( $j );
                                $strong = strip_tags( static::DOMinnerHTML( $element ) );
                                $hParse = $this->mecab_parse( $strong );
                                foreach ( $hParse as $hLine ) {
                                    if ( $hLine == 'EOS' ) break;
                                    list( $hp, $hr ) = explode( "\t", $hLine );
                                    if ( mb_strlen( $hp ) > 1 ) {
                                        $hList = explode( ',', $hr );
                                        if ( $hList[0] == '名詞' ) {
                                            $in_heading[ $hp ] = isset( $in_heading[ $hp ] ) ? $in_heading[ $hp ] + $add_point : $add_point;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $_phrases = [];
        arsort( $phrases );
        $max_phrase = 0;
        foreach ( $phrases as $phrase => $cnt ) {
            if ( $cnt > 2 ) {
                $_phrases[ $phrase ] = $cnt;
                if ( $cnt > $max_phrase ) {
                    $max_phrase = $cnt;
                }
            }
        }
        $phrases = $_phrases;
        $_phrases = [];
        foreach ( $phrases as $phrase => $cnt ) {
            $_phrases[ $phrase ] = $cnt / $max_phrase * 5;
            $_phrases[ $phrase ] = (int) $_phrases[ $phrase ];
        }
        foreach ( $keywords as $keyword ) {
            $_phrases[ $keyword ] = isset( $_phrases[ $keyword ] ) ? $_phrases[ $keyword ] + 5 : 5;
        }
        $phrases = $_phrases;
        $tmp = $app->upload_dir();
        $casket = $app->upload_dir();
        $mapping = [];
        $indexes = [];
        $draft_tmpl = $this_path . DS . 'tmpl' . DS . 'simplifiedjapanese-summarize_draft.tmpl';
        $i = 0;
        $is_first = false;
        $is_second = false;
        $estcmd_path = $this->get_command( 'estcmd' );
        foreach ( $contents as $idx => $content ) {
            $id = md5( $content );
            $is_greeting = 1;
            foreach ( $greetings as $greeting => $min ) {
                if ( stripos( $content, $greeting ) !== false ) {
                    $is_greeting = $min;
                }
            }
            $mb_strlen = mb_strlen( $content );
            if (! $is_second && $is_first && $is_greeting > 0 && $short_threshold < $mb_strlen ) {
                $add_first = $content_cnt * 3;
                $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + $add_first : $add_first;
                if ( $mb_strlen > $length_threshold ) {
                    $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + 10 : 10;
                }
                $is_second = true;
            }
            if (! $is_first && $is_greeting > 0 && $short_threshold < $mb_strlen ) {
                $add_first = $content_cnt * 5;
                $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + $add_first : $add_first;
                if ( $mb_strlen > $length_threshold ) {
                    $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + 10 : 10;
                }
                $is_first = true;
                if ( $mb_strlen > $length_threshold ) {
                    $is_second = true;
                }
            }
            $mapping[ $id ] = $content;
            if ( $estcmd_path ) {
                $app->ctx->vars['url'] = $id;
                $app->ctx->vars['text'] = $content;
                $app->ctx->vars['index'] = $idx;
                $build = $app->build_page( $draft_tmpl, [], false );
                $path = $tmp . DS . $id . '.est';
                file_put_contents( $path, $build );
            }
            $indexes[ $id ] = $i;
            $i++;
            if ( $content_cnt == $i ) {
                $add_last = $content_cnt * 1.5;
                $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + $add_last : $add_last;
            }
            $add_pt = 0;
            foreach ( $phrases as $key => $cnt ) {
                if ( stripos( $content, $key ) !== false ) {
                    $add_pt += $cnt + 5;
                }
            }
            if ( $add_pt > 5 ) {
                $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + $add_pt : $add_pt;
            }
            if ( $is_greeting < 0 ) {
                $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + $is_greeting : $is_greeting;
            }
            if ( $mb_strlen < $short_threshold ) {
                $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] -30 : -30;
            }
            foreach ( $remarks as $start => $end ) {
                $start = preg_quote( $start, '/' );
                $end = preg_quote( $end, '/' );
                if ( preg_match( "/$start(.*?)$end/s", $content, $matches ) ) {
                    if ( mb_strlen( $matches[1] ) > $length_threshold ) {
                        $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + $content_cnt * 4 : $content_cnt * 4;
                    }
                }
            }
            if (! empty( $in_heading ) ) {
                foreach ( $in_heading as $important => $weight ) {
                    if ( strpos( $content, $important ) !== false ) {
                        $_weight = mb_substr_count( $content, $important );
                        $_weight = $_weight * $weight * 0.8;
                        $_weight = (int) $_weight;
                        $adjustments[ $id ] = isset( $adjustments[ $id ] ) ? $adjustments[ $id ] + $_weight : $_weight;
                    }
                }
            }
        }
        $this->mapping = $mapping;
        if (! $estcmd_path ) {
            arsort( $adjustments );
            $adjustments = array_slice( $adjustments, 0, $length );
            $results = [];
            foreach ( $mapping as $hash => $paragraph ) {
                if ( isset( $adjustments[ $hash ] ) ) {
                    $results[] = $paragraph;
                }
            }
            return $results;
        }
        $ngram = $app->searchestraier_force_ngram ? ' -apn ' : '';
        $useMecab = $ngram ? '' : ' -um';
        if (! $mecab_path ) {
            $useMecab = '';
        }
        $language = escapeshellarg( $app->language );
        $command = "{$estcmd_path} gather -il {$language}{$ngram}{$useMecab} {$casket} {$tmp}";
        $res = shell_exec( $command );
        $command = $mecab_path ? "{$estcmd_path} extkeys {$useMecab} {$casket}" : "{$estcmd_path} extkeys {$casket}";
        $res = shell_exec( $command );
        $command = "{$estcmd_path} list {$casket}";
        $res = trim( shell_exec( $command ) );
        $ids = explode( PHP_EOL, $res );
        $score = [];
        foreach ( $ids as $id ) {
            if ( strpos( $id, "\t" ) === false ) {
                continue;
            }
            list( $id, $hash ) = explode( "\t", $id );
            $command = "{$estcmd_path} search -vx -max 15 -sk 1 -sim {$id} {$casket}";
            $res = shell_exec( $command );
            if (! $res ) {
                continue;
            }
            $result = new SimpleXMLElement( $res );
            $records = $result->document;
            $i = 0;
            $max = 15;
            foreach ( $records as $record ) {
                $uri = $record->attributes()->uri;
                $uri = ( string )$uri;
                $point = $max - $i;
                $score[ $uri ] = isset( $score[ $uri ] ) ? $score[ $uri ] + $point : $point;
                $i++;
            }
        }
        foreach ( $score as $key => $val ) {
            foreach ( $thresholds as $threshold => $add ) {
                // $threshold = preg_quote( $threshold, '/' );
                $regex = "/{$threshold}/u";
                if ( isset( $mapping[ $key ] ) && preg_match( $regex, $mapping[ $key ] ) ) {
                    $score[ $key ] = $val + $add;
                }
            }
        }
        foreach ( $adjustments as $key => $pt ) {
            $score[ $key ] = isset( $score[ $key ] ) ? $score[ $key ] + $pt : $pt;
        }
        $this->score = $score;
        arsort( $score );
        $sorted = [];
        foreach ( $score as $key => $val ) {
            if ( isset( $mapping[ $key ] ) ) {
                $sorted[ $mapping[ $key ] ] = $indexes[ $key ];
            }
        }
        $parses = [];
        if ( $mecab_path || class_exists( $class_name ) ) {
            foreach ( $sorted as $phrase => $number ) {
                $target = $phrase;
                $phrases = [];
                $parse = $this->mecab_parse( $phrase );
                foreach ( $parse as $line ) {
                    if ( $line == 'EOS' ) break;
                    list( $p, $r ) = explode( "\t", $line );
                    if ( mb_strlen( $p ) > 1 ) {
                        $list = explode( ',', $r );
                        if ( $list[0] == '名詞' ) {
                            $phrases[] = $p;
                        }
                    }
                }
                $phrases = array_unique( $phrases );
                $p_cnt = count( $phrases );
                if (! empty( $parses ) ) {
                    $duplication_max = 0;
                    $duplication = 0;
                    foreach ( $phrases as $phrase ) {
                        foreach ( $parses as $parse ) {
                            if ( in_array( $phrase, $parse ) ) {
                                $duplication++;
                            }
                            if ( $duplication_max < $duplication ) {
                                $duplication_max = $duplication;
                            }
                            $duplication = 0;
                        }
                    }
                    if (! $p_cnt ) $p_cnt = 0.1;
                    $score = $duplication_max / $p_cnt * 100;
                    if ( $score > $duplicate_threshold ) {
                        unset( $sorted[ $target ] );
                    }
                }
                $parses[] = $phrases;
            }
        }
        $sorted = array_slice( $sorted, 0, $length );
        asort( $sorted );
        $results = array_keys( $sorted );
        $values = array_values( $results );
        $_results = [];
        $contents = array_unique( $contents );
        foreach ( $contents as $content ) {
            if ( in_array( $content, $values ) ) {
                $_results[] = $content;
            }
        }
        $results = $_results;
        if ( $app->simplifiedjapanese_remove_conjunctions && !empty( $conjunctions ) ) {
            foreach ( $results as $idx => $result ) {
                foreach ( $conjunctions as $conjunction ) {
                    if ( preg_match( "/^{$conjunction}、/", $result ) ) {
                        $results[ $idx ] = preg_replace( "/^{$conjunction}、/", '', $result );
                        break;
                    }
                }
            }
        }
        return $results;
    }

    function restore_content ( &$content, $array ) {
        $keys = array_keys( $array );
        foreach ( $array as $magic => $text ) {
            $content = str_replace( $magic, $text, $content );
        }
        foreach ( $keys as $magic ) {
            if ( strpos( $content, $magic ) !== false ) {
                $content = $this->restore_content( $content, $array );
            }
        }
        return $content;
    }

    function remove_old_cache ( $app ) {
        $fmgr = $app->fmgr;
        $counter = 0;
        $cache_dir =  $app->support_dir . DS . 'cache' . DS . 'simplifiedjapanese_cache';
        if (! is_dir( $cache_dir ) ) {
            return;
        }
        $files = [];
        PTUtil::file_find( $cache_dir, $files );
        $expires = $app->request_time - $app->simplifiedjapanese_cache_expires;
        foreach ( $files as $file ) {
            if ( file_exists( $file ) ) {
                $mtime = @filemtime( $file );
                if ( $mtime && ( $mtime < $expires ) ) {
                    $fmgr->unlink( $file );
                    $counter++;
                }
            }
        }
        return $counter;
    }

    function regenerate_dictionaries ( $app ) {
        $sql = "SELECT DISTINCT user_dic_workspace_id FROM {$app->db->prefix}user_dic WHERE user_dic_status=2";
        $group = $app->db->db->query( $sql )->fetchAll( PDO::FETCH_COLUMN );
        $whole_dictionary = $this->get_config_value( 'simplifiedjapanese_whole_dictionary' );
        $counter = 0;
        $obj = null;
        foreach ( $group as $workspace_id ) {
            $obj = $app->db->model( 'user_dic' )->get_by_key( ['workspace_id' => $workspace_id ] );
            if ( $obj->id ) {
                $this->update_user_dic( $app, $obj );
                $counter++;
            }
        }
        if ( $whole_dictionary && $obj ) {
            $this->update_user_dic( $app, $obj, 'whole' );
            $counter++;
        }
        return $counter;
    }

    function get_config_value ( $name, $workspace_id = 0, $inheritance = false ) {
        $app = Prototype::get_instance();
        if ( $app->workspace() && // for tsutaeru.cloud
           ( $name == 'tsutaeru_client_id' || $name == 'tsutaeru_client_secret' ) ) {
            if ( $app->db->model( 'workspace' )->has_column( 'translate_api_key' ) ) {
                $workspace = $app->workspace();
                return $name == 'tsutaeru_client_id' ? $workspace->uuid : $workspace->translate_api_key;
            }
        }
        return parent::get_config_value( $name, $workspace_id, $inheritance );
    }

    private static function magic ( $content = '', &$tokens = [] ) {
        $magic = substr(
            str_shuffle( 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 10 );
        if ( strpos( $content, $magic ) !== false )
            return static::magic( $content, $tokens );
        if ( isset( $tokens[ $magic ] ) )
            return static::magic( $content, $tokens );
        $tokens[ $magic ] = true;
        return $magic;
    }

    private static function str_replace_once ( $from, $to, $subject ) {
        if (! $from ) {
            return $subject;
        }
        if ( stripos( $subject, $from ) === false ) {
            return $subject;
        } else if ( strlen( $from ) > 2000 || mb_substr_count( $subject, $from ) === 1 ) {
            return str_replace( $from, $to, $subject );
        }
        $from = '/' . preg_quote( $from, '/' ) . '/';
        return preg_replace( $from, $to, $subject, 1 );
    }

    private static function DOMinnerHTML ( $element ) { 
        $innerHTML = ''; 
        $children  = $element->childNodes;
        foreach ( $children as $child ) { 
            $innerHTML .= $element->ownerDocument->saveHTML( $child );
        }
        return $innerHTML; 
    }
}