<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
if (! defined( 'MB_ENCODE_NUMERICENTITY_MAP' ) ) {
    define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );
}

class MachineTranslator extends PTPlugin {

    // Rrotected properties.
    protected $app;
    protected $cache_dir;
    protected $get_cache;
    protected $max_length = 6000;
    protected $replaced_map = [];
    protected $text;
    protected $cached_map = [];
    protected $phrase_map = [];
    protected $virtual = false;
    protected $magic_quoted = '[0-9]{10}\-[0-9]{10}';
    protected $append_elements = [];
    protected $translate_map = [];
    protected $html;

    // Public properties.
    public $caching = true;
    public $translate_to;
    public $translate_from;
    public $end_point;
    public $subscription_key;
    public $region  = null;
    public $tokens = [];
    public $mb_languages;
    public $mb_languages_to;
    public $workspace_id;
    public $languages = ['ja', 'en', 'zh-Hans', 'zh-Hant', 'ko', 'vi', 'th', 'pt', 'pt-PT', 'es',
                         'fr', 'fr-CA', 'it', 'de', 'sv', 'ru', 'nl', 'af', 'ar', 'az', 'bg', 'bn',
                         'bs', 'ca', 'cs', 'cy', 'da', 'el', 'et', 'fa', 'fi', 'fil', 'fj', 'ga',
                         'gu', 'he', 'hi', 'hr', 'ht', 'hu', 'hy', 'id', 'is', 'kk', 'kn', 'lt',
                         'lv', 'mg', 'mi', 'ml', 'mr', 'ms', 'mt', 'mww', 'nb', 'ne', 'or', 'otq',
                         'pa', 'pl', 'ro', 'sk', 'sl', 'sm', 'sq', 'sr-Cyrl', 'sr-Latn', 'sw', 'ta',
                         'te', 'to', 'tr', 'ty', 'uk', 'ur', 'yua', 'yue'];
    public  $upload_dirs = [];

    function __construct () {
        parent::__construct();
    }

    function __destruct () {
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

    function activate ( $app, $plugin, $version, &$errors ) {
        $options = $app->db->model( 'option' )->load(
            ['key' => 'tinymce_toolbar', 'kind' => 'plugin_setting', 'extra' => 'tinymce'] );
        foreach ( $options as $option ) {
            $value = $option->value;
            if ( stripos( $value, 'pt-translate' ) === false ) {
                $option->value( $value . ' pt-translate' );
                $option->save();
            }
        }
        return true;
    }

    function pre_save_plugin_config ( $cb, $app, $component, &$errors ) {
        if ( $component->id != 'machinetranslator' ) {
            return true;
        }
        $cache_expires = $app->machinetranslator_cache_expires;
        if ( is_numeric( $cache_expires ) && $cache_expires < 0 ) {
            return true;
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $cache_dir = $app->support_dir . DS
                   . 'cache' . DS . 'machinetranslator_cache' . DS . $workspace_id;
        $cached_map = $this->cached_map ? $this->cached_map : $this->get_cache( 'machinetranslator_cached_map' );
        $this->cached_map = $cached_map;
        if ( is_array( $cached_map ) && !empty( $cached_map ) ) {
            foreach ( $cached_map as $url => $data ) {
                foreach ( $data as $lang => $path ) {
                    $this->clear_cache( $path, $app->machinetranslator_cache_expires );
                }
            }
        }
        if ( is_dir( $cache_dir ) ) {
            $this->upload_dirs[ $cache_dir ] = true;
        }
        return true;
    }

    function start_publish ( $cb, $app, $unlink ) {
        $ui = $cb['urlinfo'];
        if ( $ui->publish_file != 6 ) {
            return true;
        }
        $cached_map = $this->cached_map ? $this->cached_map : $this->get_cache( 'machinetranslator_cached_map' );
        $this->cached_map = $cached_map;
        if (! $cached_map ) {
            return true;
        }
        if ( isset( $cached_map[ $ui->url ] ) ) {
            $cache = $cached_map[ $ui->url ];
            foreach ( $cache as $lang => $cache_key ) {
                $this->clear_cache( $cache_key, $app->machinetranslator_cache_expires );
            }
        }
        return true;
    }

    function post_publish ( $cb, $app, $tmpl, $data ) {
        if ( stripos( $data, '<html' ) === false || $app->id == 'Bootstrapper' ) {
            return true;
        }
        $cached_map = $this->get_cache( 'machinetranslator_cached_map' );
        if (! $cached_map ) {
            return true;
        }
        $ui = $cb['urlinfo'];
        if ( isset( $cached_map[ $ui->url ] ) ) {
            $cache = $cached_map[ $ui->url ];
            foreach ( $cache as $lang => $cache_key ) {
                $this->clear_cache( $cache_key, $app->machinetranslator_cache_expires );
            }
        }
        return true;
    }

    function machinetranslator_virtual ( $cb, $app, $tmpl ) {
        if (! $app->machinetranslator_can_bot ) {
            $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
            if ( preg_match( '/(bot|crawler|spider|crawling)/i', $ua ) ) {
                return true;
            }
        }
        $virtual_lang = $app->machinetranslator_virtual;
        if (! is_array( $virtual_lang ) ) {
            return true;
        } else if ( empty( $virtual_lang ) ) {
            return true;
        }
        $this->virtual = true;
        $request_uri = $app->request_uri;
        $paths = explode( '/', $request_uri );
        if ( isset( $paths[1] ) ) {
            $lang = $paths[1];
            $lang_path = $lang;
            if (! isset( $virtual_lang[ $lang ] ) ) {
                $lang = null;
                if ( isset( $paths[2] ) ) {
                    $lang = $paths[1] . '/' . $paths[2];
                    $lang_path = $lang;
                    $check_path = str_replace( '-', '_', strtolower( $lang ) );
                    if (! isset( $virtual_lang[ $lang ] ) && !isset( $virtual_lang[ $check_path ] ) ) {
                        return true;
                    }
                    if ( isset( $virtual_lang[ $check_path ] ) ) {
                        $search = preg_quote( $lang, '/' );
                        $request_uri = preg_replace( "!/{$search}/!", '/', $request_uri );
                        $lang = $check_path;
                    }
                    if (! isset( $virtual_lang[ $lang ] ) ) {
                        return true;
                    }
                }
                if (! $lang ) {
                    return true;
                }
            }
            $search = preg_quote( $lang, '/' );
            $request_uri = preg_replace( "!/{$search}/!", '/', $request_uri );
            $lang = $virtual_lang[ $lang ];
            list( $request, $param ) = array_pad( explode( '?', $request_uri ), 2, null );
            if ( preg_match( '!/$!', $request ) ) {
                $request .= $app->directory_index;
            }
            $file_path = $app->document_root . $request;
            $workspace = $cb['workspace'];
            $workspace_id = is_object( $workspace ) ? $workspace->id : 0;
            $url = $app->db->model( 'urlinfo' )->get_by_key( ['file_path' => $file_path ] );
            if (! $url->id ) {
                return true;
            }
            if ( $url->mime_type !== 'text/html' ) {
                if ( $app->fmgr->exists( $file_path ) ) {
                    return $app->redirect( $request_uri );
                }
            } else {
                if ( $app->fmgr->exists( $file_path ) && !$app->query_string ) {
                    $text = $app->fmgr->get( $file_path );
                } else {
                    require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPublisher.php' );
                    $pub = new PTPublisher;
                    $text = $pub->publish( $url );
                }
                $text = str_replace( '～', '〜', $text );
                $original = $text;
                $this->dynamic_view( $cb, $app, $url, $text, $lang );
                if ( $text === $original ) {
                    return true;
                }
                libxml_use_internal_errors( true );
                $dom = new DomDocument();
                if (! $dom->loadHTML( mb_encode_numericentity( $text, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                    LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                    return true;
                }
                $no_convert_class = $app->machinetranslator_no_convert_class;
                $elements = $dom->getElementsByTagName( 'a' );
                if ( $elements->length ) {
                    $link_url = $workspace_id ? $workspace->link_url : $app->link_url;
                    if ( $link_url ) {
                        $site_url = $link_url;
                    } else {
                        $site_url = $workspace_id ? $workspace->site_url : $app->site_url;
                    }
                    $quoted = preg_quote( $site_url, '/' );
                    $i = $elements->length - 1;
                    $changed = false;
                    while ( $i > -1 ) {
                        $node = $elements->item( $i );
                        $i -= 1;
                        $href = $node->getAttribute( 'href' );
                        $class = $node->getAttribute( 'class' );
                        if ( $class ) {
                            $class = '';
                        }
                        if ( $href && ( !$class || strpos( $class, $no_convert_class ) === false ) ) {
                            if ( strpos( $href, '/' ) === 0 ) {
                                $href = "/{$lang_path}{$href}";
                                $node->setAttribute( 'href', $href );
                                $changed = true;
                            } else if ( stripos( $href, $site_url ) === 0 ) {
                                $href = preg_replace( "/^{$quoted}/", '/', $href );
                                $href = "/{$lang_path}{$href}";
                                $node->setAttribute( 'href', $href );
                                $changed = true;
                            }
                        }
                    }
                    if ( $changed ) {
                        if ( PHP_VERSION >= 8.2 ) {
                            $text = html_entity_decode( $dom->saveHTML() );
                        } else {
                            $text = mb_convert_encoding( $dom->saveHTML(), 'utf-8', 'HTML-ENTITIES' );
                        }
                    }
                }
                if ( $app->publish_callbacks ) {
                    if ( $url->object_id && $url->model ) {
                        $object = $app->db->model( $url->model )->load( $url->object_id );
                        if ( $object ) {
                            $app->init_callbacks( 'template', 'post_publish' );
                            $callback = [];
                            $ui = $app->ctx->stash( 'current_urlinfo' );
                            $callback['name'] = 'post_publish';
                            $callback['noindex'] = true;
                            $callback['urlinfo'] = $ui;
                            $callback['object'] = $object;
                            $tmpl = $tmpl->text;
                            $app->run_callbacks( $callback, 'template', $tmpl, $text );
                        }
                    }
                }
                $app->print( $text );
                exit();
            }
        }
    }

    function mt_async ( $app ) {
        $this->app = $app;
        if ( $app->version > 300002 ) {
            if ( $app->have_method() ) {
                return $app->run();
            }
        }
        $content = file_get_contents( 'php://input' );
        if (! $content ) {
            return $app->json_error( $this->translate( 'An error occurred while translate content.' ), 500 );
        }
        $json = json_decode( $content );
        if (!is_object( $json ) ) {
            return $app->json_error( $this->translate( 'An error occurred while translate content.' ), 500 );
        }
        $data = $json->data;
        $from = $json->pt_mt_from;
        $lang = $json->pt_mt_language;
        $baseUrl  = $json->baseUrl;
        list( $request_uri, $param ) = array_pad( explode( '?', $baseUrl ), 2, null );
        if ( preg_match( '!/$!', $request_uri ) ) {
            $request_uri .= $app->directory_index;
        }
        $virtual_lang = $app->machinetranslator_virtual;
        $paths = explode( '/', $request_uri );
        if (! $lang ) {
            if ( isset( $paths[3] ) ) {
                $lang = $paths[3];
                if (! isset( $virtual_lang[ $lang ] ) ) {
                    $lang = null;
                } else {
                    $search = preg_quote( $lang, '/' );
                    $request_uri = preg_replace( "!(^https{0,1}://[^/]*?)/{$search}!", '$1', $request_uri );
                    $lang = $virtual_lang[ $lang ];
                }
            }
        }
        $urlObj = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $request_uri ] );
        header( 'Content-type: application/json' );
        if (! $urlObj->id ) {
            echo json_encode( ['translations' => $data ] );
            exit();
        }
        $workspace_id = (int) $urlObj->workspace_id;
        if (! $from ) {
            if ( $app->machinetranslator_auto_detect ) {
                $from = $this->detect_language( $text );
            } else {
                $from = $this->get_config_value( 'machinetranslator_translate_from', $workspace_id );
            }
        }
        $region = $this->region !== null ? $this->region : $this->get_config_value( 'machinetranslator_region' );
        $this->region = $region;
        if ( is_array( $data ) ) {
            $api_version = $this->get_config_value( 'machinetranslator_api_version' );
            $subscription_key = $this->get_config_value( 'machinetranslator_subscription_key' );
            $end_point = $this->get_config_value( 'machinetranslator_end_point' );
            if ( $lang == 'jp-yn' ) {
                $tsutaeru_client_id = $app->tsutaeruweb_client_id;
                $tsutaeru_client_secret = $app->tsutaeruweb_client_secret;
                $plugin = $app->component( 'SimplifiedJapanese' );
                if (! $tsutaeru_client_id && !$tsutaeru_client_secret && $plugin ) {
                    $tsutaeru_client_id = $plugin->get_config_value( 'tsutaeru_client_id' );
                    $tsutaeru_client_secret = $plugin->get_config_value( 'tsutaeru_client_secret' );
                }
                if ( $tsutaeru_client_id && $tsutaeru_client_secret ) {
                    $subscription_key = "{$tsutaeru_client_id}:{$tsutaeru_client_secret}";
                    $end_point = $app->machinetranslator_tsutaeru_web . '?';
                } else {
                    return $app->json_error( $this->translate( 'An error occurred while translate content.' ), 500 );
                }
            }
            $end_point .= "?api-version={$api_version}";
            $params = $from ? "&to={$lang}&from={$from}" : "&to={$lang}";
            $end_point .= $params;
            $end_point .= '&textType=html';
            $dictionaries = $app->db->model( 'mt_dic' )->load(
                ['lang' => ['IN' => [ $lang, 'all'] ], 'status' => 2, 'workspace_id' => $workspace_id ] );
            if ( $from && in_array( $from, $app->machinetranslator_mb_languages ) ) {
                $this->mb_languages = true;
            }
            if ( in_array( $lang, $app->machinetranslator_mb_languages ) ) {
                $this->mb_languages_to = true;
            }
            $all_data = [];
            $all_string = '';
            $part = [];
            foreach ( $data as $str ) {
                if ( mb_strlen( $all_string . $str ) >= $this->max_length && !empty( $part ) ) {
                    $all_data[] = $part;
                    $part = [];
                    $all_string = '';
                }
                $all_string .= $str;
                $part[] = $str;
            }
            $all_phrases = [];
            $all_data[] = $part;
            foreach ( $all_data as $data ) {
                $requestBody = [];
                $tokens = [];
                $replaced_map = [];
                $changed = [];
                $origData = $data;
                $notrans_map = [];
                foreach ( $data as $idx => $str ) {
                    $cache_key = $workspace_id . DS . 'machinetranslator_' . $lang . '_' . md5( $str );
                    $cache = $this->get_cache( $cache_key );
                    $cache = null;
                    if ( $cache ) {
                        $data[ $idx ] = $cache;
                        $str = '';
                    } else {
                        if ( mb_strlen( $str ) > 9999 ) {
                            $str = '';
                        } else {
                            $original = $str;
                            $str = $this->pre_translate( $str, $dictionaries, $replaced_map, $tokens, $notrans_map );
                            if ( $original != $str ) {
                                $changed[ $idx ] = true;
                            }
                            if ( $this->mb_languages && strlen( $str ) == mb_strlen( $str ) ) {
                                $str = '';
                            }
                        }
                    }
                    $requestBody[] = ['Text' => $str ];
                }
                if ( empty( $requestBody ) ) {
                    continue;
                }
                $content = json_encode( $requestBody, JSON_UNESCAPED_UNICODE );
                $headers = ["Content-type: application/json",
                            "Content-length: " . strlen( $content ),
                            "Ocp-Apim-Subscription-Key: {$subscription_key}",
                            "X-Ocp-Apim-Subscription-Key: {$subscription_key}",
                            //"Ocp-Apim-Subscription-Region:eastasia",
                            "X-ClientTraceId: " . $this->com_create_guid() ];
                if ( $region ) {
                    $headers[] = "Ocp-Apim-Subscription-Region:{$region}";
                }
                $curl = curl_init( $end_point );
                curl_setopt( $curl, CURLOPT_POST, true );
                curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $curl, CURLOPT_POSTFIELDS, $content );
                curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
                $json = curl_exec( $curl );
                if (! $json ) {
                    return $app->json_error( $this->translate( 'An error occurred while translate content.' ), 500 );
                }
                $result = json_decode( $json, true );
                if ( isset( $result['error'] ) ) {
                    $phrases = [];
                    foreach ( $requestBody as $idx => $body ) {
                        $text = $body['Text'];
                        if (! $text ) $text = $origData[ $idx ]; // Over 9999 characters.
                        if ( isset( $changed[ $idx ] ) ) {
                            $this->replace_from_map( $text, $replaced_map, $this->mb_languages_to );
                            $this->replace_from_map( $text, $replaced_map, $this->mb_languages_to );
                            $this->replace_from_map( $text, $replaced_map, $this->mb_languages_to );
                            foreach ( $notrans_map as $id => $phrase ) {
                                if ( strpos( $text, $id ) !== false ) {
                                    $start = preg_quote( "<wrap id=\"{$id}\">", '!' );
                                    $text = preg_replace( "!$start.*?</wrap>!", $phrase, $text );
                                }
                            }
                            if ( $lang == 'jp-yn' || $lang == 'jp-rb' ) {
                                $text = $this->add_ruby( $text, $lang );
                            }
                        } else {
                            if ( $lang == 'jp-yn' || $lang == 'jp-rb' ) {
                                $text = $this->add_ruby( $text, $lang );
                            }
                        }
                        $phrases[] = $text;
                    }
                    $all_phrases = array_merge( $all_phrases, $phrases );
                    continue;
                    // return $app->json_error( $this->translate( 'An error occurred while translate content.' ), 500 );
                }
                $phrases = [];
                foreach ( $result as $idx => $res ) {
                    $text = $res['translations'][0]['text'];
                    $text = $text ? $text : $data[ $idx ];
                    if (! $text ) $text = $origData[ $idx ]; // Over 9999 characters.
                    if ( isset( $changed[ $idx ] ) ) {
                        $this->replace_from_map( $text, $replaced_map, $this->mb_languages_to );
                        $this->replace_from_map( $text, $replaced_map, $this->mb_languages_to );
                        $this->replace_from_map( $text, $replaced_map, $this->mb_languages_to );
                        foreach ( $notrans_map as $id => $phrase ) {
                            if ( strpos( $text, $id ) !== false ) {
                                $start = preg_quote( "<wrap id=\"{$id}\">", '!' );
                                $text = preg_replace( "!$start.*?</wrap>!", $phrase, $text );
                            }
                        }
                        if ( $lang == 'jp-yn' || $lang == 'jp-rb' ) {
                            $text = $this->add_ruby( $text, $lang );
                        }
                    } else {
                        if ( $lang == 'jp-yn' || $lang == 'jp-rb' ) {
                            $text = $this->add_ruby( $text, $lang );
                        }
                        $cache_key = $workspace_id . DS . 'machinetranslator_' . $lang . '_' . md5( $origData[ $idx ] );
                        $this->set_cache( $cache_key, $text, false, $origData[ $idx ] );
                    }
                    $phrases[] = $text;
                }
                $all_phrases = array_merge( $all_phrases, $phrases );
            }
            echo json_encode( ['translations' => $all_phrases ] );
            exit();
        }
        $cb = ['workspace' => $urlObj->workspace ];
        $data = '<!DOCTYPE html><html><body>' . $data . '</body></html>';
        $app->id = 'MachineTranslator';
        $app->machinetranslator_show_loader = false;
        $app->machinetranslator_exclude_post = false;
        $app->machinetranslator_cache_expires = 0;
        $this->dynamic_view( $cb, $app, $urlObj, $data, $lang, $from );
        $data = preg_replace( '!^.*?<body>(.*?)</body></html>$!is', '$1', $data );
        echo json_encode( ['translations' => $data ] );
        exit();
    }

    function dynamic_view ( $cb, &$app, $url, &$text, $to = null, $from = null ) {
        if ( $app->id !== 'Bootstrapper' && $app->id !== 'MachineTranslator' ) return true;
        ini_set( 'memory_limit', -1 );
        ini_set( 'max_execution_time', 10000 );
        ignore_user_abort( true );
        $cookie_name = $app->machinetranslator_cookie_name ? $app->machinetranslator_cookie_name : 'pt-mt-language';
        if (! $cookie_name ) return true;
        if (! $to && $app->cookie_val( $cookie_name ) ) {
            $app->bake_cookie( $cookie_name, $app->cookie_val( $cookie_name ), $app->machinetranslator_cookie_expires, '/' );
        }
        $to = $to ? $to : $app->cookie_val( $cookie_name );
        if (! $to ) return true;
        $cookie_name = $app->machinetranslator_exclude_cookie ? $app->machinetranslator_exclude_cookie : 'pt-mt-is-exclude';
        if ( $app->machinetranslator_exclude_post && $app->request_method == 'POST' ) {
            $app->bake_cookie( $cookie_name, 1, 5 );
            return true;
        }
        if ( stripos( $text, '<html' ) === false ) {
            return true;
        }
        $this->app = $app;
        $workspace_id = (int) $url->workspace_id;
        if ( $workspace_id ) {
            $use_system = $this->get_config_value( 'machinetranslator_use_system_settings', $workspace_id );
            if ( $use_system ) {
                $workspace_id = '0';
            }
        }
        libxml_use_internal_errors( true );
        $api_version = $this->get_config_value( 'machinetranslator_api_version' );
        $subscription_key = $this->get_config_value( 'machinetranslator_subscription_key' );
        $end_point = $this->get_config_value( 'machinetranslator_end_point' );
        if ( $app->machinetranslator_auto_detect && $from === false ) {
            $dom = new DomDocument();
            if (! $dom->loadHTML( mb_encode_numericentity( $text, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                $lang = null;
                $root = $dom->getElementsByTagName( 'html' );
                if ( $root->length ) {
                    $root =  $root[0];
                    $lang = $root->getAttribute( 'lang' );
                    if ( $lang && in_array( $lang, $this->languages ) ) {
                        $from = $lang;
                    } else {
                        $lang = null;
                    }
                }
                if (! $lang ) {
                    $body = $dom->getElementsByTagName( 'body' );
                    if ( $body->length ) {
                        $body = $body[0]->textContent;
                        $from = $this->detect_language( $body );
                        if ( $from === false ) {
                            return true;
                        }
                    }
                }
            }
        }
        $from = $from === null ? $this->get_config_value( 'machinetranslator_translate_from', $workspace_id ) : $from;
        if ( $to == 'jp-yn' ) {
            $tsutaeru_client_id = $app->tsutaeruweb_client_id;
            $tsutaeru_client_secret = $app->tsutaeruweb_client_secret;
            $plugin = $app->component( 'SimplifiedJapanese' );
            if (! $tsutaeru_client_id && !$tsutaeru_client_secret && $plugin ) {
                $tsutaeru_client_id = $plugin->get_config_value( 'tsutaeru_client_id' );
                $tsutaeru_client_secret = $plugin->get_config_value( 'tsutaeru_client_secret' );
            }
            if ( $tsutaeru_client_id && $tsutaeru_client_secret ) {
                $subscription_key = "{$tsutaeru_client_id}:{$tsutaeru_client_secret}";
                $end_point = $app->machinetranslator_tsutaeru_web . '?';
            } else {
                return true;
            }
        }
        if ( $from == $to ) {
            return true;
        }
        $ctx = $app->ctx;
        if (!$subscription_key || !$end_point || !$api_version ) {
            return true;
        }
        $this->caching = $app->machinetranslator_caching;
        // $this->caching = false; // Debug.
        $end_point .= "?api-version={$api_version}";
        $translate = $this->get_config_value( 'machinetranslator_translate_page', $workspace_id );
        if (! $translate ) {
            return true;
        }
        $this_url = $url->url;
        $this->workspace_id = $url->workspace_id;
        $exclude_urls = $this->get_config_value( 'machinetranslator_exclude_urls', $workspace_id );
        $regex = '<\${0,1}' . $ctx->prefix;
        $this->translate_to = $to;
        $this->translate_from = $from;
        $ctx->vars['language_from'] = $from;
        $ctx->vars['language_to'] = $to;
        $ctx->stash( 'current_urlinfo', $url );
        $ctx->stash( 'current_archive_url', $this_url );
        $ctx->vars['current_archive_url'] = $this_url;
        $workspace = $url->workspace;
        $site_url = $workspace_id ? $workspace->site_url : $app->site_url;
        $link_url = $workspace_id ? $workspace->link_url : $app->link_url;
        if ( $exclude_urls ) {
            $orig_url = $url->url;
            if ( $link_url ) {
                $quoted = preg_quote( $site_url, '!' );
                $orig_url = preg_replace( "!^{$site_url}!", $link_url, $orig_url );
            }
            if ( preg_match( "/$regex/i", $exclude_urls ) ) {
                $exclude_urls = $ctx->build( $exclude_urls );
            }
            $exclude_urls = preg_replace( "/\r\n|\r|\n/", PHP_EOL, trim( $exclude_urls ) );
            $exclude_urls = explode( PHP_EOL, $exclude_urls );
            $exclude_urls = array_filter( $exclude_urls, 'strlen' ) ;
            if ( in_array( $this_url, $exclude_urls ) ) {
                if ( $app->machinetranslator_redirectto_org ) {
                    return $app->redirect( $orig_url );
                }
                $app->bake_cookie( $cookie_name, 1, 5 );
                return true;
            }
            foreach ( $exclude_urls as $exclude_url ) {
                if ( preg_match ( '!/$!', $exclude_url ) && stripos( $this_url, $exclude_url ) === 0 ) {
                    if ( $app->machinetranslator_redirectto_org ) {
                        return $app->redirect( $orig_url );
                    }
                    $app->bake_cookie( $cookie_name, 1, 5 );
                    return true;
                }
            }
        }
        if ( $app->query_string() ) {
            $this_url .= '?' . $app->query_string();
        }
        $cache_key = $workspace_id . DS . 'machinetranslator_' . $to . '_' . md5( $text );
        $cache = $this->get_cache( $cache_key, true );
        if (! $cache && $app->machinetranslator_cache_expires ) {
            $cached_map = $this->get_cache( 'machinetranslator_cached_map' );
            if ( $cached_map && is_array( $cached_map ) ) {
                if ( isset( $cached_map[ $this_url ] ) ) {
                    if ( isset( $cached_map[ $this_url ][ $to ] ) ) {
                        $path = $cached_map[ $this_url ][ $to ];
                        $path = 'plugin' . DS . 'mt' . DS . $path;
                        $cache_dir = $app->support_dir . DS . 'cache' . DS . 'machinetranslator_cache' . DS;
                        $this->cache_dir = $cache_dir;
                        $path = $cache_dir . $path . '.html';
                        if ( $app->fmgr->exists( $path ) ) {
                            $expires = $app->request_time - $app->machinetranslator_cache_expires;
                            if ( $expires < filemtime( $path ) ) {
                                $cache = $app->fmgr->get( $path );
                            } else {
                                $app->fmgr->unlink( $path );
                            }
                        }
                    }
                }
            }
        }
        $noIndex = '<meta name="robots" content="noindex">';
        $tracking = $this->get_config_value( 'machinetranslator_tracking', $workspace_id );
        $analytics = $app->component( 'AccessAnalytics' );
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $log_message = $app->date( 'Y-m-d H:i:s T' ) . "\t" . "{$this_url}\t{$to}\t{$ua}\t";
        if ( $cache && $this->caching ) {
            if ( $analytics && $tracking ) {
                $this->save_activity( $ctx, $analytics, $to );
            }
            if ( $app->machinetranslator_no_index && stripos( $cache, $noIndex ) === false ) {
                $cache = str_replace( '</head>', "{$noIndex}</head>", $cache );
            }
            $text = $cache;
            if ( $app->machinetranslator_logging ) {
                error_log( $log_message . 'Cached'. PHP_EOL, 3, $app->log_dir . DS . 'machinetranslator_virtual.log' );
            }
            return true;
        }
        $start_time = microtime( true );
        $minifier = null;
        $minifier = $app->component( 'Minifier' );
        if (! $minifier ) {
            $minifier_path = $app->pt_dir . DS . 'plugins' . DS . 'Minifier';
            if ( is_dir( $minifier_path ) ) {
                $app->configure_from_json( $minifier_path . DS . 'config.json' );
                if ( file_exists( $minifier_path . DS . 'Minifier.php' ) ) {
                    require_once( $minifier_path . DS . 'Minifier.php' );
                    $minifier = new Minifier();
                }
            }
        }
        if ( $minifier && method_exists( $minifier, 'minify_content' ) ) {
            $text = $minifier->minify_content( $app, 'HTML', $text, true, true );
        } else {
            require_once( LIB_DIR . 'Smarty' . DS . 'outputfilter.trimwhitespace.php' );
            $text = smarty_outputfilter_trimwhitespace( $text );
        }
        $now_loading = false;
        if ( $this->caching && $app->machinetranslator_show_loader && strlen( $text ) > $app->machinetranslator_show_loader ) {
            $loader_url = $app->machinetranslator_loader;
            if (! $loader_url ) {
                $loader_url = $app->app_path . 'plugins/MachineTranslator/app/pt-mt-loader.php';
            }
            $loader_image = $app->machinetranslator_loader_image;
            if (! $loader_image ) {
                $loader_image = $app->app_path . 'assets/img/loading.gif';
            }
            $param = ['loader_url' => $loader_url, 'session_id' => $cache_key, 'html' => $text,
                      'loader_image' => $loader_image, 'this_url' => $this_url, 'to' => $to ];
            $tmpl = $app->ctx->get_template_path( 'machinetranslator_loader.tmpl' );
            $app->build_page( $tmpl, $param, true, false );
            $now_loading = true;
        }
        $dictionaries = $app->db->model( 'mt_dic' )->load(
            ['lang' => ['IN' => [ $to, 'all'] ], 'status' => 2, 'workspace_id' => $workspace_id ] );
        $tokens = [];
        $replaced_map = [];
        $original = $text;
        $mb_languages = false;
        $mb_languages_to = false;
        if ( $from && in_array( $from, $app->machinetranslator_mb_languages ) ) {
            $mb_languages = true;
            $this->mb_languages = true;
        }
        if ( in_array( $to, $app->machinetranslator_mb_languages ) ) {
            $mb_languages_to = true;
            $this->mb_languages_to = true;
        }
        $params = $from ? "&to={$to}&from={$from}" : "&to={$to}";
        $end_point .= $params;
        $end_point .= '&textType=html';
        $this->subscription_key = $subscription_key;
        $this->end_point = $end_point;
        $notrans_map = [];
        $this->pre_translate( $text, $dictionaries, $replaced_map, $tokens, $notrans_map );
        $footer_html = $this->get_config_value( 'machinetranslator_footer_html', $workspace_id );
        $trans_footer = $this->get_config_value( 'machinetranslator_trans_footer', $workspace_id );
        if ( $footer_html && $app->id == 'Bootstrapper' ) {
            $footer_html = trim( $footer_html );
            if ( $footer_html && preg_match( "/$regex/i", $footer_html ) ) {
                $footer_html = $ctx->build( $footer_html );
            }
            if ( $footer_html && $trans_footer ) {
                if ( stripos( $text, '</body>' ) !== false ) {
                    $text = preg_replace( '!</body>!i', $footer_html . '</body>', $text );
                } else {
                    $text .= $footer_html;
                }
                $footer_html = '';
            }
        }
        $text = PTUtil::encode_double( $text );
        $dom = new DomDocument();
        if (! $dom->loadHTML( mb_encode_numericentity( $text, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
            LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
            $text = $original;
            return true;
        }
        $finder = new DOMXpath( $dom );
        $exclude_classes = $this->get_config_value( 'machinetranslator_exclude_classes', $workspace_id );
        $hidden_classes = $this->get_config_value( 'machinetranslator_hidden_classes', $workspace_id );
        $ucwords_classes = $this->get_config_value( 'machinetranslator_ucwords_classes', $workspace_id );
        $individual_elements = $this->get_config_value( 'machinetranslator_individuals', $workspace_id );
        if ( $exclude_classes && preg_match( "/$regex/i", $exclude_classes ) ) {
            $exclude_classes = $ctx->build( $exclude_classes );
        }
        if ( $hidden_classes && preg_match( "/$regex/i", $hidden_classes ) ) {
            $hidden_classes = $ctx->build( $hidden_classes );
        }
        if ( $ucwords_classes && preg_match( "/$regex/i", $ucwords_classes ) ) {
            $ucwords_classes = $ctx->build( $ucwords_classes );
        }
        if ( $exclude_classes ) {
            $exclude_classes = preg_split( '/\s*,\s*/', $exclude_classes );
            foreach ( $exclude_classes as $class ) {
                if ( $class == 'notranslate' ) {
                    continue;
                }
                $tag = null;
                if ( strpos( $class, '.' ) !== false ) {
                    list( $tag, $class ) = explode( '.', $class );
                }
                $elements = $finder->query( "//*[contains(@class, '$class')]" );
                if ( $elements->length ) {
                    $i = $elements->length - 1;
                    while ( $i > -1 ) {
                        $node = $elements->item( $i );
                        $i -= 1;
                        if ( $tag && $tag != $node->tagName ) {
                            continue;
                        }
                        $parent = $node->parentNode;
                        $outerHTML = $this->outerHTML( $node );
                        $magic = $this->magic( $text, $tokens );
                        $replaced_map[ $magic ] = $outerHTML;
                        $parent->replaceChild( $dom->createTextNode( $magic ), $node );
                        $changed = true;
                    }
                }
            }
        }
        if ( $hidden_classes ) {
            $hidden_classes = preg_split( '/\s*,\s*/', $hidden_classes );
            foreach ( $hidden_classes as $class ) {
                $tag = null;
                if ( strpos( $class, '.' ) !== false ) {
                    list( $tag, $class ) = explode( '.', $class );
                }
                $elements = $finder->query( "//*[contains(@class, '$class')]" );
                if ( $elements->length ) {
                    $i = $elements->length - 1;
                    while ( $i > -1 ) {
                        $node = $elements->item( $i );
                        $i -= 1;
                        if ( $tag && $tag != $node->tagName ) {
                            continue;
                        }
                        $parent = $node->parentNode;
                        $parent->removeChild( $node );
                        $changed = true;
                    }
                }
            }
        }
        $magic_quoted = $this->magic_quoted;
        if ( $to != 'jp-rb' ) {
            $replace_elements = [];
            $replace_texts = [];
            $replace_text = '';
            if ( $app->machinetranslator_trans_attrs || $app->machinetranslator_trans_meta ) {
                $elementMap = $app->machinetranslator_trans_attrs
                    ? ['img' => 'alt', 'input' => 'placeholder', 'textarea' => 'placeholder', 'a' => 'title'] : ['textarea'];
                if ( $app->machinetranslator_trans_meta ) {
                    $elementMap['meta'] = 'content';
                }
                foreach ( $elementMap as $eleName => $attr ) {
                    $elements = $dom->getElementsByTagName( $eleName );
                    if ( $elements->length ) {
                        $i = $elements->length - 1;
                        while ( $i > -1 ) {
                            $node = $elements->item( $i );
                            $i -= 1;
                            if ( $app->machinetranslator_trans_attrs ) {
                                $attribute = trim( $node->getAttribute( $attr ) );
                                if ( $attribute ) {
                                    $translate = true;
                                    if ( $mb_languages && ( strlen( $attribute ) == mb_strlen( $attribute ) ) ) {
                                        $translate = false;
                                    }
                                    if ( $translate ) {
                                        $add_tag = $this->get_notranslate( $attribute );
                                        if ( mb_strlen( $replace_text . $attribute . $add_tag ) >= $this->max_length ) {
                                            $this->append_elements( $replace_elements, $replace_texts, $replace_text );
                                        }
                                        $replace_elements[] = ['setAttribute', $node, $attr, $attribute ];
                                        $replace_texts[] = $attribute;
                                        $replace_text .= $attribute;
                                        $replace_text .= $add_tag;
                                    }
                                }
                            }
                            if ( $eleName == 'textarea' ) {
                                $outerHTML = $this->outerHTML( $node );
                                $parent = $node->parentNode;
                                $magic = $this->magic( $text, $tokens );
                                $replaced_map[ $magic ] = $outerHTML;
                                $parent->replaceChild( $dom->createTextNode( $magic ), $node );
                            }
                        }
                    }
                }
            }
            $this->replaced_map = $replaced_map;
            $this->text = $text;
            $this->tokens = $tokens;
            if ( $ucwords_classes ) {
                $ucwords_classes = preg_split( '/\s*,\s*/', $ucwords_classes );
                foreach ( $ucwords_classes as $class ) {
                    if ( $class == 'notranslate' ) {
                        continue;
                    }
                    $tag = null;
                    if ( strpos( $class, '.' ) !== false ) {
                        list( $tag, $class ) = explode( '.', $class );
                    }
                    $elements = $finder->query( "//*[contains(@class, '$class')]" );
                    if ( $elements->length ) {
                        $i = $elements->length - 1;
                        while ( $i > -1 ) {
                            $node = $elements->item( $i );
                            $i -= 1;
                            if ( $tag && $tag != $node->tagName ) {
                                continue;
                            }
                            $classes = $node->getAttribute( 'class' );
                            $classes = preg_split( '/\s+/', $classes );
                            if (! in_array( $class, $classes ) ) {
                                continue;
                            }
                            $html = $this->outerHTML( $node );
                            $add_tag = $this->get_notranslate( $html );
                            if ( mb_strlen( $replace_text . $html . $add_tag ) >= $this->max_length ) {
                                $this->append_elements( $replace_elements, $replace_texts, $replace_text );
                            }
                            if ( $node->parentNode ) {
                                $replace_elements[] = ['replaceUcwords', $node, $html ];
                                $replace_texts[] = $html;
                                $replace_text .= $html;
                                $replace_text .= $add_tag;
                            }
                        }
                    }
                }
            }
            if ( $individual_elements ) {
                $individual_elements = preg_split( '/\s*,\s*/', $individual_elements );
                foreach ( $individual_elements as $individual_ele ) {
                    $class = null;
                    $id = null;
                    if ( strpos( $individual_ele, '.' ) !== false ) {
                        list( $individual_ele, $class ) = explode( '.', $individual_ele );
                    } else if ( strpos( $individual_ele, '#' ) !== false ) {
                        list( $individual_ele, $id ) = explode( '.', $individual_ele );
                    }
                    $elements = $dom->getElementsByTagName( $individual_ele );
                    if ( $elements->length ) {
                        $i = $elements->length - 1;
                        while ( $i > -1 ) {
                            $node = $elements->item( $i );
                            $i -= 1;
                            $html = $this->outerHTML( $node );
                            if ( $class ) {
                                $classes = $node->getAttribute( 'class' );
                                if (! $classes ) {
                                    continue;
                                }
                                $classes = preg_split( '/\s+/', $classes );
                                if (! in_array( $class, $classes ) ) {
                                    continue;
                                }
                            } else if ( $id ) {
                                $elementId = $node->getAttribute( 'id' );
                                if (! $elementId || $elementId != $id ) {
                                    continue;
                                }
                            }
                            $add_tag = $this->get_notranslate( $html );
                            if ( mb_strlen( $replace_text . $html . $add_tag ) >= $this->max_length ) {
                                $this->append_elements( $replace_elements, $replace_texts, $replace_text );
                            }
                            $replace_elements[] = ['replaceIndividual', $node, $html ];
                            $replace_texts[] = $html;
                            $replace_text .= $html;
                            $replace_text .= $add_tag;
                        }
                    }
                }
            }
            if (! empty( $replace_elements ) ) {
                $this->append_elements( $replace_elements, $replace_texts, $replace_text );
            }
            if ( $app->id == 'Bootstrapper' ) {
                $title = $dom->getElementsByTagName( 'title' );
                if ( $title->length ) {
                    $parent = $title[0]->parentNode;
                    $html_title = trim( $title[0]->textContent );
                    $translate = true;
                    if ( $mb_languages && ( strlen( $html_title ) == mb_strlen( $html_title ) ) ) {
                        $translate = false;
                    }
                    if ( $translate ) {
                        $add_tag = $this->get_notranslate( $html_title );
                        if ( mb_strlen( $replace_text . $html_title . $add_tag ) >= $this->max_length ) {
                            $this->append_elements( $replace_elements, $replace_texts, $replace_text );
                        }
                        $replace_elements[] = ['setTitle', $title[0], $html_title ];
                        $replace_texts[] = $html_title;
                        $replace_text .= $html_title;
                        $replace_text .= $add_tag;
                    }
                }
            }
            $query = '/html/body/text()[string-length(normalize-space()) > 0]';
            $text_nodes = $finder->query( $query );
            foreach ( $text_nodes as $node ) {
                $value = $node->nodeValue;
                $add_tag = $this->get_notranslate( $value );
                if ( mb_strlen( $replace_text . $value . $add_tag ) >= $this->max_length ) {
                    $this->append_elements( $replace_elements, $replace_texts, $replace_text );
                }
                $replace_elements[] = ['replaceChild', $node, $value ];
                $replace_texts[] = $value;
                $replace_text .= $value;
                $replace_text .= $add_tag;
            }
            $is_error = false;
            if (! empty( $this->append_elements ) ) {
                $results = $this->get_translate_elements( $end_point, $subscription_key, $is_error );
            } else {
                $is_error = true;
            }
            foreach ( $this->append_elements as $idx => $append_elements ) {
                $res = isset( $results[ $idx ] ) ? $results[ $idx ] : [];
                $this->replace_elements( $dom, $append_elements[0], $append_elements[1], $append_elements[2], $is_error );
                $replaced_map = $this->replaced_map;
                $text = $this->text;
                $tokens = $this->tokens;
            }
            $this->append_elements = [];
            $body = $dom->getElementsByTagName( 'body' );
            $children = $body[0]->childNodes;
            $i = $children->length - 1;
            while ( $i > -1 ) {
                $node = $children->item( $i );
                $i -= 1;
                $parent = $node->parentNode;
                $html = $this->outerHTML( $node );
                if (! $html ) continue;
                $translate = true;
                if ( $mb_languages && ( strlen( $html ) == mb_strlen( $html ) ) ) {
                    $translate = false;
                }
                $html = html_entity_decode( $html );
                if ( stripos( $html, '<pre' ) === false && mb_strlen( $html ) >= 5000 ) {
                    $html = preg_replace( '/\s{1,}/', ' ', $html );
                }
                if ( $translate && ( mb_strlen( $html ) < $this->max_length ) ) {
                    if ( $parent && trim( $html ) ) {
                        $add_tag = $this->get_notranslate( $html );
                        if ( mb_strlen( $replace_text . $html . $add_tag ) >= $this->max_length ) {
                            $this->append_elements( $replace_elements, $replace_texts, $replace_text );
                        }
                        $replace_elements[] = ['replaceChild', $node, $html ];
                        $replace_texts[] = $html;
                        $replace_text .= $html;
                        $replace_text .= $add_tag;
                    }
                } else if ( $translate ) {
                    $this->replace_child( $dom, $node, $mb_languages );
                }
            }
            if (! empty( $replace_elements ) ) {
                $this->append_elements( $replace_elements, $replace_texts, $replace_text );
            }
        }
        $is_error = false;
        if ( $to != 'jp-rb' && !empty( $this->append_elements ) ) {
            $results = $this->get_translate_elements( $end_point, $subscription_key, $is_error );
        } else {
            $is_error = true;
        }
        foreach ( $this->append_elements as $idx => $append_elements ) {
            $res = isset( $results[ $idx ] ) ? $results[ $idx ] : [];
            $this->replace_elements( $dom, $append_elements[0], $append_elements[1], $append_elements[2], $is_error );
            $replaced_map = $this->replaced_map;
            $text = $this->text;
            $tokens = $this->tokens;
        }
        if ( PHP_VERSION >= 8.2 ) {
            $text = html_entity_decode( $dom->saveHTML() );
        } else {
            $text = mb_convert_encoding( $dom->saveHTML(), 'utf-8', 'HTML-ENTITIES' );
        }
        if ( preg_match( '/<body[^>]*?>/si', $text, $matches ) ) {
            $body_tag = $matches[0];
            $head_and_body = explode( $body_tag, $text );
        } else {
            $body_tag = '';
            $head_and_body = ['', $text ];
        }
        if ( $to == 'jp-yn' || $to == 'jp-rb' ) {
            $i = 0;
            foreach ( $head_and_body as $idx => $str ) {
                if ( $i ) {
                    $content = $this->add_ruby( $str, $to );
                    $head_and_body[ $idx ] = $content;
                }
                $i++;
            }
            $text = implode( $body_tag, $head_and_body );
        }
        $this->replace_from_map( $text, $replaced_map, $mb_languages_to );
        $this->replace_from_map( $text, $replaced_map, $mb_languages_to );
        $this->replace_from_map( $text, $replaced_map, $mb_languages_to );
        $text = PTUtil::decode_double( $text );
        if (! empty( $notrans_map ) ) {
            $dom->loadHTML( $text, LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT );
        }
        foreach ( $notrans_map as $id => $phrase ) {
            $node = $dom->getElementById( $id );
            if ( is_object( $node ) ) {
                $out = $this->outerHTML( $node );
                $text = str_replace( $out, $phrase, $text );
            }
            if ( strpos( $text, $id ) !== false ) {
                $start = preg_quote( "<wrap id=\"{$id}\">", '!' );
                $text = preg_replace( "!$start.*?</wrap>!si", $phrase, $text );
            }
        }
        if ( $footer_html ) {
            if ( $footer_html ) {
                if ( stripos( $text, '</body>' ) !== false ) {
                    $text = preg_replace( '!</body>!i', $footer_html . '</body>', $text );
                } else {
                    $text .= $footer_html;
                }
            }
        }
        if ( $app->machinetranslator_no_index && stripos( $text, $noIndex ) === false ) {
            $text = str_replace( '</head>', "{$noIndex}</head>", $text );
        }
        $this->set_cache( $cache_key, $text, true );
        $cached_map = $this->get_cache( 'machinetranslator_cached_map' );
        if (! $cached_map ) {
            $cached_map = [];
        }
        if ( isset( $cached_map[ $this_url ] ) ) {
            if ( isset( $cached_map[ $this_url ][ $to ] ) ) {
                $cache = $cached_map[ $this_url ][ $to ];
                if ( $cache != $cache_key ) {
                    $this->clear_cache( $cache );
                }
            }
        }
        $cached_map[ $this_url ][ $to ] = $cache_key;
        $this->set_cache( 'machinetranslator_cached_map', $cached_map );
        if ( $app->machinetranslator_logging ) {
            $past = microtime( true ) - $start_time;
            error_log( "{$log_message}{$past}". PHP_EOL, 3, $app->log_dir . DS . 'machinetranslator_virtual.log' );
        }
        if ( $now_loading ) {
            exit();
        }
        if ( $analytics && $tracking ) {
            $this->save_activity( $ctx, $analytics, $to );
        }
    }

    function get_translate_elements ( $end_point, $subscription_key, &$is_error = false ) {
        $app = $this->app ? $this->app : Prototype::get_instance();
        $contents = [];
        $text_arr = [];
        $cache_keys = [];
        $contain_tokens = [];
        foreach ( $this->append_elements as $append_elements ) {
            $cached = [];
            $phrase_keys = [];
            $json = $this->get_translate_text( $append_elements[1], $this->caching, true, $phrase_keys, $contain_tokens );
            $json = is_array( $json ) ? '[]' : $json;
            $contents[] = $json;
            $cache_keys = array_merge( $cache_keys, $phrase_keys );
            $text_arr[] = array_keys( $phrase_keys );
        }
        $region = $this->region !== null ? $this->region : $this->get_config_value( 'machinetranslator_region' );
        $this->region = $region;
        $mh = curl_multi_init();
        foreach ( $contents as $idx => $content ) {
            if ( $content == '[]' ) continue;
            $headers = ["Content-type: application/json",
                        "Content-length: " . strlen( $content ),
                        "Ocp-Apim-Subscription-Key: {$subscription_key}",
                        "X-Ocp-Apim-Subscription-Key: {$subscription_key}",
                        //"Ocp-Apim-Subscription-Region:eastasia",
                        "X-ClientTraceId: " . $this->com_create_guid() ];
            if ( $region ) {
                $headers[] = "Ocp-Apim-Subscription-Region:{$region}";
            }
            $curl = curl_init( $end_point . '&counter=' . $idx );
            curl_setopt( $curl, CURLOPT_POST, true );
            curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $curl, CURLOPT_POSTFIELDS, $content );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
            curl_multi_add_handle( $mh, $curl );
        }
        $timeout = 600;
        do {
            $stat = curl_multi_exec( $mh, $running );
        } while ( $stat === CURLM_CALL_MULTI_PERFORM );
        if (! $running || $stat !== CURLM_OK ) {
            $is_error = true;
        }
        $results = [];
        if (! $is_error ) {
            do switch ( curl_multi_select( $mh, $timeout ) ) {
                case -1: // Failed
                    usleep( 10000 );
                    do {
                        $stat = curl_multi_exec($mh, $running);
                    } while ( $stat === CURLM_CALL_MULTI_PERFORM );
                    continue 2;
                // case 0: // Timeout
                //     continue 2;
                default:
                    do {
                        $stat = curl_multi_exec( $mh, $running );
                    } while ( $stat === CURLM_CALL_MULTI_PERFORM );
                    do if ( $raised = curl_multi_info_read( $mh, $remains ) ) {
                        $response = curl_multi_getcontent( $raised['handle'] );
                        if ( $response === false ) {
                            $is_error = true;
                            break;
                        }
                        $url = curl_getinfo( $raised['handle'], CURLINFO_EFFECTIVE_URL );
                        $number = (int) preg_replace( '/^.*?&counter=([0-9]{1,})$/', '$1', $url );
                        $result = json_decode( $response, true );
                        $from_text = $text_arr[ $number ];
                        if (! isset( $result['error'] ) ) {
                            $i = 0;
                            foreach ( $result as $res ) {
                                $res = $res['translations'][0]['text'];
                                $no_cache = false;
                                if ( isset( $contain_tokens[ $from_text[ $i ] ] ) ) {
                                    $no_cache = true;
                                }
                                $phrase_key = $cache_keys[ $from_text[ $i ] ];
                                if ( $this->caching && !$no_cache ) {
                                    $this->set_cache( $phrase_key, $res, false, $from_text[ $i ] );
                                }
                                $this->translate_map[ $from_text[ $i ] ] = $res;
                                $i++;
                            }
                        }
                        curl_multi_remove_handle( $mh, $raised['handle'] );
                        curl_close( $raised['handle'] );
                    } while ( $remains );
            } while ( $running );
            curl_multi_close( $mh );
        }
        return $results;
    }

    function get_notranslate ( $text ) {
        $magic_quoted = $this->magic_quoted;
        if (! preg_match( "/{$magic_quoted}/", $text ) ) {
            return '';
        }
        preg_match_all( "/{$magic_quoted}/", $text, $matches );
        $count = count( $matches[0] );
        if ( $count ) {
            return '';
        }
        return str_repeat( '<wrap id="01234567890-01234567890">  </wrap>', $count );
    }

    function add_ruby ( $str, $to ) {
        $app = $this->app;
        $ctx = $app->ctx;
        $arg = $to == 'jp-rb' ? 1 : 2;
        $plugin = $app->component( 'SimplifiedJapanese' );
        if (! $plugin ) {
            return $str;
        }
        $content = '';
        $in_ruby = false;
        $contents = preg_split( '/(<[^>]*?>)/s', $str, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
        foreach ( $contents as $data ) {
            if (! $in_ruby && ( strpos( $data, '<' ) === false && strpos( $data, '>' ) === false ) ) {
                if ( strlen( $data ) !== mb_strlen( $data ) ) {
                    $data = $plugin->filter_furigana( $data, $arg, $ctx );
                }
            } else {
                if ( stripos( $data, '<ruby' ) === 0 ) {
                    $in_ruby = true;
                } else if ( stripos( $data, '</ruby' ) === 0 ) {
                    $in_ruby = false;
                }
            }
            $content .= $data;
        }
        return $content;
    }

    function save_activity ( $ctx, $analytics, $to ) {
        if ( $activity = $analytics->already_save ) {
            $activity->language( $to );
            $activity->save();
        } else {
            $args = ['lang' => $to ];
            $analytics->hdlr_accesstracking( $args, $ctx );
        }
    }

    function replace_from_map ( &$text, $replaced_map, $mb_languages_to ) {
        if (! empty( $replaced_map ) ) {
            $count = count( $replaced_map );
            for ( $i = 0; $i < $count; $i++ ) {
                $match = false;
                foreach ( $replaced_map as $magic => $phrase ) {
                    if (! $mb_languages_to && strpos( $phrase, '<' ) !== 0 ) {
                        $phrase = " {$phrase} ";
                    }
                    if (! $i ) {
                        if ( strpos( $text, $magic ) !== false ) {
                            $text = str_replace( $magic, $phrase, $text );
                        } else if ( strpos( $text, trim( $magic ) ) !== false ) {
                            $text = str_replace( trim( $magic ), $phrase, $text );
                        }
                        $match = true;
                    } else if ( strpos( $text, $magic ) !== false ) {
                        $text = str_replace( $magic, $phrase, $text );
                        $match = true;
                    } else if ( strpos( $text, trim( $magic ) ) !== false ) {
                        $text = str_replace( trim( $magic ), $phrase, $text );
                        $match = true;
                    }
                    $magic = trim( $magic );
                    $text = str_replace( $magic, $phrase, $text );
                    $match = true;
                }
                if (! $match ) {
                    break;
                }
            }
        }
        return $text;
    }

    function replace_child ( &$dom, &$parent, $mb_languages ) {
        $magic_quoted = $magic_quoted = $this->magic_quoted;
        $children = $parent->childNodes;
        if ( $children !== null ) {
            $replace_elements = [];
            $replace_texts = [];
            $replace_text = '';
            $i = $children->length - 1;
            while ( $i > -1 ) {
                $node = $children->item( $i );
                $i -= 1;
                $html = $this->outerHTML( $node );
                $html = html_entity_decode( $html );
                $translate = true;
                if ( $mb_languages && ( strlen( $html ) == mb_strlen( $html ) ) ) {
                    $translate = false;
                }
                if ( $translate ) {
                    if ( stripos( $html, '<pre' ) === false && mb_strlen( $html ) >= 5000 ) {
                        $html = preg_replace( '/\s{1,}/s', ' ', $html );
                    }
                    if ( mb_strlen( $html ) >= $this->max_length ) {
                        $this->replace_child( $dom, $node, $mb_languages );
                    } else {
                        $add_tag = $this->get_notranslate( $html );
                        if ( mb_strlen( $replace_text . $html . $add_tag ) >= $this->max_length ) {
                            $this->append_elements( $replace_elements, $replace_texts, $replace_text );
                        }
                        $replace_elements[] = ['replaceChild', $node, $html ];
                        $replace_texts[] = $html;
                        $replace_text .= $html;
                        $replace_text .= $add_tag;
                    }
                }
            }
            if (! empty( $replace_elements ) ) {
                $this->append_elements( $replace_elements, $replace_texts, $replace_text );
            }
        }
    }

    function append_elements ( &$elements, &$texts, &$replace_text ) {
        $this->append_elements[] = [ $elements, $texts, $replace_text ];
        $elements = [];
        $texts = [];
        $replace_text = '';
    }

    function replace_elements ( &$dom, &$elements, &$texts, &$replace_text, $trasnlate = true ) {
        if ( $trasnlate ) {
            $texts = $this->get_translate_array( $texts );
        }
        if ( $texts !== false ) {
            foreach ( $elements as $element ) {
                $kind = $element[0];
                if ( $kind == 'setAttribute' ) {
                    list( $kind, $node, $attr, $value ) = $element;
                    if ( isset( $this->translate_map[ $value ] ) ) {
                        $node->setAttribute( $attr, $this->translate_map[ $value ] );
                    }
                } else if ( $kind == 'setTitle' ) {
                    list( $kind, $node, $value ) = $element;
                    if ( isset( $this->translate_map[ $value ] ) ) {
                        $title = '<title>' . $this->translate_map[ $value ] . '</title>';
                        $node->parentNode->replaceChild( $dom->createTextNode( $title ), $node );
                    }
                } else if ( $kind == 'replaceChild' ) {
                    list( $kind, $node, $value ) = $element;
                    if ( isset( $this->translate_map[ $value ] ) ) {
                        $node->parentNode->replaceChild( $dom->createTextNode( $this->translate_map[ $value ] ), $node );
                    }
                } else if ( $kind == 'replaceIndividual' ) {
                    list( $kind, $node, $value ) = $element;
                    if ( isset( $this->translate_map[ $value ] ) ) {
                        $magic = $this->magic( $this->text, $this->tokens );
                        $string = $this->translate_map[ $value ];
                        $this->replaced_map[ $magic ] = $string;
                        $node->parentNode->replaceChild( $dom->createTextNode( $magic ), $node );
                    }
                } else if ( $kind == 'replaceUcwords' ) {
                    list( $kind, $node, $value ) = $element;
                    if ( isset( $this->translate_map[ $value ] ) ) {
                        $string = $this->translate_map[ $value ];
                        $contents = preg_split( '/(<[^>]*?>)/s',
                                $string, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
                        $content = '';
                        foreach ( $contents as $data ) {
                            if ( strpos( $data, '<' ) === false && strpos( $data, '>' ) === false ) {
                                $data = ucwords( $data );
                            }
                            $content .= $data;
                        }
                        $this->replaced_map[ $string ] = $content;
                    }
                }
            }
        }
        $elements = [];
        $texts = [];
        $replace_text = '';
    }

    function get_translate_text ( $text, $caching = true, $get_json = false, &$phrase_keys = [], &$contain_tokens = [] ) {
        list( $from, $to, $end_point, $subscription_key ) = [ $this->translate_from, $this->translate_to,
                                                              $this->end_point, $this->subscription_key ];
        $tokens = array_keys( $this->tokens );
        if ( is_string( $text ) ) {
            $phrase_key = 'mt_phrase_' . $from . '_' . $to . '_' . md5( $text );
            $cache = $this->get_cache( $phrase_key );
            if ( $cache ) {
                return $cache;
            }
            if ( mb_strlen( $text ) >= 10000 ) {
                return $text;
            }
            $originalText = $text;
        } else {
            $text = array_unique( $text );
            $trans_text = '';
            foreach ( $text as $idx => $str ) {
                $phrase_key = 'mt_phrase_' . $from . '_' . $to . '_' . md5( $str );
                $cache = $this->get_cache( $phrase_key );
                if ( $cache ) {
                    $this->translate_map[ $str ] = $cache;
                    unset( $text[ $idx ] );
                    continue;
                } else if ( $this->mb_languages && strlen( $str ) === mb_strlen( $str ) ) {
                    $this->translate_map[ $str ] = $str;
                    unset( $text[ $idx ] );
                    continue;
                } else {
                    $cache_key = $str;
                    $token_match = false;
                    $token_matchs = [];
                    foreach ( $tokens as $token ) {
                        if ( strpos( $cache_key, $token ) !== false ) {
                            $token_matchs[] = $token;
                            if ( $str == $token ) {
                                $this->translate_map[ $str ] = $str;
                                unset( $text[ $idx ] );
                                continue 2;
                            }
                        }
                    }
                }
                if ( mb_strlen( $trans_text . $str ) >= 10000 ) {
                    continue;
                }
                $phrase_keys[ $str ] = $phrase_key;
            }
            if ( empty( $text ) ) {
                return [];
            }
        }
        $contain_tokens = [];
        if ( is_array( $text ) ) {
            $requestBody = [];
            $total = '';
            foreach ( $text as $str ) {
                $original = $str;
                foreach ( $tokens as $token ) {
                    if ( strpos( $str, $token ) !== false ) {
                        $contain_tokens[ $str ] = true;
                    }
                }
                if ( mb_strlen( $total ) >= 10000 ) {
                    $str = $this->get_translate_text( $original, $caching );
                    $this->translate_map[ $original ] = $str;
                    continue;
                }
                $total .= $str;
                if ( mb_strlen( $total ) >= 10000 ) {
                    $str = $this->get_translate_text( $original, $caching );
                    $this->translate_map[ $original ] = $str;
                    continue;
                }
                $requestBody[] = ['Text' => $str ];
            }
        } else {
            $original = $text;
            foreach ( $tokens as $token ) {
                if ( strpos( $text, $token ) !== false ) {
                    $contain_tokens[ $text ] = true;
                }
            }
            if ( mb_strlen( $text ) >= 10000 ) {
                $text = $original;
            }
            $requestBody = [ ['Text' => $text ] ];
        }
        $content = json_encode( $requestBody, JSON_UNESCAPED_UNICODE );
        if ( $get_json ) {
            return $content;
        }
        $region = $this->region !== null ? $this->region : $this->get_config_value( 'machinetranslator_region' );
        $this->region = $region;
        $headers = ["Content-type: application/json",
                    "Content-length: " . strlen( $content ),
                    "Ocp-Apim-Subscription-Key: {$subscription_key}",
                    "X-Ocp-Apim-Subscription-Key: {$subscription_key}",
                    //"Ocp-Apim-Subscription-Region:eastasia",
                    "X-ClientTraceId: " . $this->com_create_guid() ];
        if ( $region ) {
            $headers[] = "Ocp-Apim-Subscription-Region:{$region}";
        }
        $curl = curl_init( $end_point );
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $content );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        $json = curl_exec( $curl );
        if (! $json ) {
            return false;
        }
        $result = json_decode( $json, true );
        if ( $result !== null && ! isset( $result['error'] ) ) {
            if ( is_array( $text ) ) {
                $texts = [];
                $i = 0;
                foreach ( $result as $res ) {
                    $res = $res['translations'][0]['text'];
                    $no_cache = false;
                    if ( isset( $contain_tokens[ $text[ $i ] ] ) ) {
                        $no_cache = true;
                    }
                    $phrase_key = $phrase_keys[ $text[ $i ] ];
                    if ( $caching && !$no_cache ) {
                        $this->set_cache( $phrase_key, $res, false, $text[ $i ] );
                    }
                    $texts[ $text[ $i ] ] = $res;
                    $i++;
                }
                return $texts;
            } else if ( isset( $result[0]['translations'][0]['text'] ) ) {
                $text = $result[0]['translations'][0]['text'];
                $no_cache = false;
                if ( isset( $contain_tokens[ $text ] ) ) {
                    $no_cache = true;
                }
                if ( $caching && !$no_cache ) {
                    $this->set_cache( $phrase_key, $text, false, $originalText );
                }
                return $text;
            }
        } else {
            $this->log( $result['error']['message'], 'error' );
            return false;
        }
        return false;
    }

    function get_translate_array ( $text, $caching = true ) {
        list( $from, $to, $end_point, $subscription_key )
            = [ $this->translate_from, $this->translate_to,
                $this->end_point, $this->subscription_key ];
        if ( $to == 'jp-rb' ) {
            $app = $this->app ? $this->app : Prototype::get_instance();
            $SimplifiedJapanese = $app->component( 'SimplifiedJapanese' );
            if ( $SimplifiedJapanese ) {
                $ctx = $app->ctx;
                $ctx->stash( 'workspace', null );
                if ( $this->workspace_id ) {
                    $workspace = $app->workspace() ?? $app->db->model( 'workspace' )->load( $this->workspace_id );
                    $ctx->stash( 'workspace', $workspace );
                }
                if ( is_string( $text ) ) {
                    $phrase_key = 'mt_phrase_' . $from . '_' . $to . '_' . md5( $text );
                    $cache = $this->get_cache( $phrase_key );
                    if ( $cache ) {
                        return $cache;
                    }
                    return $SimplifiedJapanese->filter_furigana( $text, 1, $ctx );
                } else if ( is_array( $text ) ) {
                    $texts = [];
                    foreach ( $text as $idx => $str ) {
                        $phrase_key = 'mt_phrase_' . $from . '_' . $to . '_' . md5( $str );
                        $cache = $this->get_cache( $phrase_key );
                        if ( $cache ) {
                            $texts[ $str ] = $cache;
                            continue;
                        }
                        $ruby = $SimplifiedJapanese->filter_furigana( $str, 1, $ctx );
                        $texts[ $str ] = $ruby;
                        $this->set_cache( $phrase_key, $ruby, false, $str );
                    }
                    return $texts;
                }
            }
            return false;
        }
        $phrase_keys = [];
        $tokens = array_keys( $this->tokens );
        $cached = [];
        if ( is_string( $text ) ) {
            $phrase_key = 'mt_phrase_' . $from . '_' . $to . '_' . md5( $text );
            $cache = $this->get_cache( $phrase_key );
            if ( $cache ) {
                return $cache;
            }
            if ( mb_strlen( $text ) >= 10000 ) {
                return $text;
            }
        } else {
            $text = array_unique( $text );
            $trans_text = '';
            foreach ( $text as $idx => $str ) {
                $phrase_key = 'mt_phrase_' . $from . '_' . $to . '_' . md5( $str );
                $cache = $this->get_cache( $phrase_key );
                if ( $cache ) {
                    $cached[ $str ] = $cache;
                    unset( $text[ $idx ] );
                    continue;
                } else if ( $this->mb_languages && strlen( $str ) === mb_strlen( $str ) ) {
                    $cached[ $str ] = $str;
                    unset( $text[ $idx ] );
                    continue;
                } else {
                    $cache_key = $str;
                    $token_match = false;
                    $token_matchs = [];
                    foreach ( $tokens as $token ) {
                        if ( strpos( $cache_key, $token ) !== false ) {
                            $token_matchs[] = $token;
                            if ( $str == $token ) {
                                $cached[ $str ] = $str;
                                unset( $text[ $idx ] );
                                continue 2;
                            }
                        }
                    }
                }
                if ( mb_strlen( $trans_text . $str ) >= 10000 ) {
                    continue;
                }
                $phrase_keys[ $str ] = $phrase_key;
            }
            if ( empty( $text ) ) {
                return $cached;
            }
            rsort( $text );
        }
        $contain_tokens = [];
        $requestBody = [];
        $total = '';
        foreach ( $text as $str ) {
            $original = $str;
            foreach ( $tokens as $token ) {
                if ( strpos( $str, $token ) !== false ) {
                    $contain_tokens[ $str ] = true;
                }
            }
            if ( mb_strlen( $total ) >= 10000 ) {
                $str = $this->get_translate_text( $original, $caching );
                $cached[ $original ] = $str;
                continue;
            }
            $total .= $str;
            if ( mb_strlen( $total ) >= 10000 ) {
                $str = $this->get_translate_text( $original, $caching );
                $cached[ $original ] = $str;
                continue;
            }
            $requestBody[] = ['Text' => $str ];
        }
        $content = json_encode( $requestBody, JSON_UNESCAPED_UNICODE );
        $region = $this->region !== null ? $this->region : $this->get_config_value( 'machinetranslator_region' );
        $this->region = $region;
        $headers = "Content-type: application/json\r\n" .
            "Content-length: " . strlen( $content ) . "\r\n" .
            "Ocp-Apim-Subscription-Key: {$subscription_key}\r\n" .
            "X-Ocp-Apim-Subscription-Key: {$subscription_key}\r\n" .
            //"Ocp-Apim-Subscription-Region:eastasia\r\n" .
            "X-ClientTraceId: " . $this->com_create_guid() . "\r\n";
        if ( $region ) {
            $headers .= "Ocp-Apim-Subscription-Region:{$region}\r\n";
        }
        $options = [
            'http' => [
                'header' => $headers,
                'method' => 'POST',
                'content' => $content
            ]
        ];
        $context  = stream_context_create( $options );
        $json = file_get_contents( $end_point, false, $context );
        if ( $json === false ) {
            return false;
        }
        $result = json_decode( $json, true );
        if (! isset( $result['error'] ) ) {
            $texts = [];
            $i = 0;
            foreach ( $result as $res ) {
                $res = $res['translations'][0]['text'];
                $no_cache = false;
                if ( isset( $contain_tokens[ $text[ $i ] ] ) ) {
                    $no_cache = true;
                }
                $phrase_key = $phrase_keys[ $text[ $i ] ];
                if ( $caching && !$no_cache ) {
                    $this->set_cache( $phrase_key, $res, false, $text[ $i ] );
                }
                $texts[ $text[ $i ] ] = $res;
                $i++;
            }
            $texts = array_merge( $cached, $texts );
            return $texts;
        } else {
            return false;
        }
        return false;
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

    function machinetranslator_translate ( $app ) {
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        if ( $magic_token != $app->current_magic ) {
            $app->json_error( 'Invalid request.' );
        }
        $this->app = $app;
        $this->workspace_id = (int) $app->param( 'workspace_id' );
        $text = $json['text'];
        if (! $text ) {
            $app->json_error( $this->translate( 'No text selected.' ) );
        }
        $agreement = $json['agreement'];
        $originalText = $text;
        $subscription_key = $this->get_config_value( 'machinetranslator_subscription_key' );
        $end_point = $this->get_config_value( 'machinetranslator_end_point' );
        $api_version = $this->get_config_value( 'machinetranslator_api_version' );
        if (!$subscription_key || !$end_point || !$api_version ) {
            $app->json_error( 'Invalid request.' );
        }
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $cookie_from = 'pt-mt-user-from-';
        $cookie_to = 'pt-mt-user-to-';
        if ( $app->machinetranslator_language_all ) {
            $cookie_from .= 'all';
            $cookie_to .= 'all';
        } else {
            $cookie_from .= $workspace_id;
            $cookie_to .= $workspace_id;
        }
        $from = $app->cookie_val( $cookie_from );
        $to = $app->cookie_val( $cookie_to );
        if ( $workspace_id ) {
            $use_system = $this->get_config_value( 'machinetranslator_use_system_settings', $workspace_id );
            if ( $use_system ) {
                $workspace_id = '0';
            }
        }
        if (! $from || ! $to ) {
            if (! isset( $_COOKIE[ $cookie_from ] ) ) {
                $from = $this->get_config_value( 'machinetranslator_translate_from', $workspace_id );
            }
            if (! isset( $_COOKIE[ $cookie_to ] ) ) {
                $to = $this->get_config_value( 'machinetranslator_translate_to', $workspace_id );
            }
        }
        $region = $this->region !== null ? $this->region : $this->get_config_value( 'machinetranslator_region' );
        $this->region = $region;
        if (! $from || $app->machinetranslator_auto_detect ) {
            $detectAPI = $end_point == 'https://api.cognitive.microsofttranslator.com/translate'
                       ? 'https://api.cognitive.microsofttranslator.com/detect?api-version=' . $api_version
                       : $end_point . '?detect=1';
            $content = json_encode( [ ['Text' => $text ] ] );
            $headers = ["Content-type: application/json",
                        "Content-length: " . strlen( $content ),
                        "Ocp-Apim-Subscription-Key: {$subscription_key}",
                        "X-Ocp-Apim-Subscription-Key: {$subscription_key}",
                        //"Ocp-Apim-Subscription-Region:eastasia",
                        "X-ClientTraceId: " . $this->com_create_guid() ];
            if ( $region ) {
                $headers[] = "Ocp-Apim-Subscription-Region:{$region}";
            }
            $curl = curl_init( $detectAPI );
            curl_setopt( $curl,CURLOPT_POST, true );
            curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $curl, CURLOPT_POSTFIELDS, $content );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec( $curl );
            $json = json_decode( $result, true );
            if ( is_array( $json ) ) {
                $json = $json[0];
                if (! $json['isTranslationSupported'] ) {
                    return true;
                }
                $detect_from = $json['language'];
                if ( $detect_from === $to ) {
                    $detect_from = $from;
                    $from = $to;
                    $to = $detect_from;
                } else {
                    $from = $detect_from;
                }
            }
        }
        if (! $to ) {
            header( 'Content-type: application/json' );
            echo json_encode( ['status' => 200 , 'result' => $text ] );
        }
        $end_point .= "?api-version={$api_version}";
        $phrase_key = 'mt_phrase_' . $from . '_' . $to . '_' . md5( $text );
        // $this->caching = false; // Debug.
        $cache = $this->get_cache( $phrase_key );
        if ( $cache ) {
            header( 'Content-type: application/json' );
            echo json_encode( ['status' => 200 , 'result' => $cache ] );
            exit();
        }
        $original = $to;
        if ( $to == 'jp-yn' && (! $from || $from == 'ja' ) ) {
            $subscription_key = $app->tsutaeruweb_client_id;
            $client_secret = $app->tsutaeruweb_client_secret;
            $plugin = $app->component( 'SimplifiedJapanese' );
            if (! $subscription_key && !$client_secret && $plugin ) {
                $subscription_key = $plugin->get_config_value( 'tsutaeru_client_id' );
                $client_secret = $plugin->get_config_value( 'tsutaeru_client_secret' );
            }
            if ( $subscription_key && $client_secret ) {
                $subscription_key = "{$subscription_key}:{$client_secret}";
                $end_point = $app->machinetranslator_tsutaeru_web . '?';
            } else {
                header( 'Content-type: application/json' );
                echo json_encode( ['status' => 200 , 'result' => $text ] );
                exit();
            }
        } else if ( $to == 'jp-yn' && $from != 'ja' ) {
            $to = 'ja';
        }
        if ( $agreement ) {
            $path = $app->cookie_path ? $app->cookie_path : $app->path;
            $cookie_name = $to == 'jp-yn' ? 'pt-sj-agreement' : 'pt-mt-agreement';
            if (! $app->cookie_val( $cookie_name ) ) {
                $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
                $app->bake_cookie( $cookie_name, 1, $expires, $path, true, $app->cookie_domain );
            }
        }
        $mb_languages = false;
        $mb_languages_to = false;
        if ( $from && in_array( $from, $app->machinetranslator_mb_languages ) ) {
            $mb_languages = true;
            $this->mb_languages = true;
        }
        if ( in_array( $to, $app->machinetranslator_mb_languages ) ) {
            $mb_languages_to = true;
            $this->mb_languages_to = true;
        }
        if ( $mb_languages ) {
            if ( strlen( $text ) == mb_strlen( $text ) ) {
                header( 'Content-type: application/json' );
                echo json_encode( ['status' => 200 , 'result' => $text ] );
            }
        }
        $dictionaries = $app->db->model( 'mt_dic' )->load(
            ['lang' => ['IN' => [ $to, 'all'] ], 'status' => 2, 'workspace_id' => $workspace_id ] );
        $tokens = [];
        $replaced_map = [];
        $this->translate_to = $to;
        $this->translate_from = $from;
        if ( $from === 'ja' ) {
            if ( stripos( $text, '<r' ) !== false ) {
                $text = preg_replace( '/<rt[^>]*?>.*?<\/rt>/si', '', $text );
                $text = preg_replace( '/<rp[^>]*?>.*?<\/rp>/si', '', $text );
                $text = preg_replace( '/<ruby[^>]*?>/si', '', $text );
                $text = preg_replace( '/<\/ruby>/si', '', $text );
                $text = preg_replace( '/<rb[^>]*?>/si', '', $text );
                $text = preg_replace( '/<\/rb>/si', '', $text );
            }
            $component = $app->component( 'SimplifiedJapanese' );
            if ( $component ) {
                $separator = $component->get_config_value( 'simplifiedjapanese_separator', $workspace_id );
                if ( $separator && strpos( $text, $separator ) !== false ) {
                    $text = str_replace( $separator, '', $text );
                }
            }
        }
        $mode_html = $app->machinetranslator_ruby_force_html;
        if ( $app->param( '_type' ) == 'insert_editor' ) {
            $mode_html = true;
        } else if ( preg_match( '/<[^\/]{1,}?>/', $text ) && preg_match( '/<\/[^>]{1,}?>/', $text ) ) {
            $mode_html = true;
        }
        if ( $mode_html && stripos( $text, '<pre' ) === false && mb_strlen( $text ) >= 5000 ) {
            $text = preg_replace( '/\s{1,}/', ' ', $text );
        }
        $notrans_map = [];
        $this->pre_translate( $text, $dictionaries, $replaced_map, $tokens, $notrans_map );
        $params = $from ? "&to={$to}&from={$from}" : "&to={$to}";
        $end_point .= $params;
        $end_point .= '&textType=html';
        $this->subscription_key = $subscription_key;
        $this->end_point = $end_point;
        if ( mb_strlen( $text ) >= 10000 ) {
            $app->json_error( $this->translate( 'The text is too long. The text must be 10,000 characters or less.' ) );
        }
        if ( $to != 'jp-rb' ) {
            $text = $this->get_translate_text( $text, false );
            if ( $text === false || ! $text ) {
                $app->json_error( $this->translate( 'An error occurred while translate content.' ) );
            }
        }
        $to = $original;
        if ( $to == 'jp-yn' || $to == 'jp-rb' ) {
            $text = $this->add_ruby( $text, $to );
            if (! $mode_html && stripos( $text, '<r' ) !== false ) {
                $text = preg_replace( '/<rt[^>]*?>/si', '(', $text );
                $text = preg_replace( '/<\/rt>/si', ')', $text );
                $text = preg_replace( '/<rb[^>]*?>/si', '', $text );
                $text = preg_replace( '/<\/rb>/si', '', $text );
                $text = preg_replace( '/<ruby[^>]*?>/si', '', $text );
                $text = preg_replace( '/<\/ruby>/si', '', $text );
                $text = preg_replace( '/<rp[^>]*?>.*?<\/rp>/si', '', $text );
            }
        }
        $this->replace_from_map( $text, $replaced_map, $mb_languages_to );
        $this->replace_from_map( $text, $replaced_map, $mb_languages_to );
        foreach ( $notrans_map as $id => $phrase ) {
            if ( strpos( $text, $id ) !== false ) {
                $start = preg_quote( "<wrap id=\"{$id}\">", '!' );
                $text = preg_replace( "!$start.*?</wrap>!", $phrase, $text );
            }
        }
        $this->set_cache( $phrase_key, $text, false, $originalText );
        header( 'Content-type: application/json' );
        echo json_encode( ['status' => 200 , 'result' => $text ] );
        exit();
    }

    function detect_language ( $text ) {
        $end_point = $this->get_config_value( 'machinetranslator_end_point' );
        $api_version = $this->get_config_value( 'machinetranslator_api_version' );
        $subscription_key = $this->get_config_value( 'machinetranslator_subscription_key' );
        $region = $this->region !== null ? $this->region : $this->get_config_value( 'machinetranslator_region' );
        $this->region = $region;
        $detectAPI = $end_point == 'https://api.cognitive.microsofttranslator.com/translate'
                   ? 'https://api.cognitive.microsofttranslator.com/detect?api-version=' . $api_version
                   : $end_point . '?detect=1';
        if ( mb_strlen( $text ) > 20000 ) {
            $text = mb_substr( $text, 0, 20000 );
        }
        $content = json_encode( [ ['Text' => $text ] ] );
        $headers = ["Content-type: application/json",
                    "Content-length: " . strlen( $content ),
                    "Ocp-Apim-Subscription-Key: {$subscription_key}",
                    "X-Ocp-Apim-Subscription-Key: {$subscription_key}",
                    //"Ocp-Apim-Subscription-Region:eastasia",
                    "X-ClientTraceId: " . $this->com_create_guid() ];
        if ( $region ) {
            $headers[] = "Ocp-Apim-Subscription-Region:{$region}";
        }
        $curl = curl_init( $detectAPI );
        curl_setopt( $curl,CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $content );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec( $curl );
        $json = json_decode( $result, true );
        if ( is_array( $json ) ) {
            $json = $json[0];
            if (! $json['isTranslationSupported'] ) {
                return false;
            }
            return $json['language'];
        }
        return null;
    }

    function pre_translate ( &$text, $dictionaries, &$replaced_map, &$tokens, &$notrans_map ) {
        $to = $this->translate_to;
        $app = $this->app ? $this->app : Prototype::get_instance();
        if ( strpos( $to, 'jp' ) !== 0 && stripos( $text, '<r' ) !== false ) {
            $text = preg_replace( '/<rp[^>]*?>.*?<\rp>/si', '', $text );
            $text = preg_replace( '/<rt[^>]*?>.*?<\rt>/si', '', $text );
            $text = preg_replace( '/<rb[^>]*?>/si', '', $text );
            $text = preg_replace( '/<\/rb>/si', '', $text );
            $text = preg_replace( '/<ruby[^>]*?>/si', '', $text );
            $text = preg_replace( '/<\/ruby>/si', '', $text );
        }
        $phrases = [];
        $exceptions = [];
        $html_phrases = [];
        foreach ( $dictionaries as $dictionary ) {
            if ( strpos( $text, $dictionary->phrase ) !== false ) {
                if ( $dictionary->exception ) {
                    // Translation is wrong with the notranslate attribute.
                    // continue;
                    $exceptions[ $dictionary->phrase ] = true;
                }
                $phrases[ $dictionary->phrase ] = $dictionary->trans;
                if ( strpos( $dictionary->phrase, '<' ) !== false && strpos( $dictionary->phrase, '>' ) !== false ) {
                    $html_phrases[ $dictionary->phrase ] = $dictionary->trans;
                }
            }
        }
        if (!empty( $phrases ) ) {
            $keys = array_map('strlen', array_keys( $phrases ) );
            array_multisort( $keys, SORT_DESC, $phrases );
        }
        if (!empty( $exceptions ) ) {
            $keys = array_map('strlen', array_keys( $exceptions ) );
            array_multisort( $keys, SORT_DESC, $exceptions );
        }
        if (!empty( $html_phrases ) ) {
            $keys = array_map('strlen', array_keys( $html_phrases ) );
            array_multisort( $keys, SORT_DESC, $html_phrases );
            foreach ( $html_phrases as $phrase => $trans ) {
                $in_wraps = [];
                if ( strpos( $text, $phrase ) !== false ) {
                    if (!empty( $in_wraps ) ) {
                        foreach ( $in_wraps as $wrap ) {
                            if ( strpos( $wrap, $phrase ) !== false ) {
                                continue 2;
                            }
                        }
                    }
                    $in_wraps[] = $phrase;
                    $magic = $this->exception_token( $text, $tokens );
                    $tag = "<wrap id=\"{$magic}\"> {$phrase} </wrap>";
                    $text = str_replace( $phrase, $tag, $text );
                    if ( isset( $exceptions[ $phrase ] ) ) {
                        $notrans_map[ $magic ] = $phrase;
                    } else if ( $trans ) {
                        $notrans_map[ $magic ] = $trans;
                        $text = str_replace( $phrase, $trans, $text );
                    }
                }
            }
        }
        if ( preg_match( '/<body[^>]*?>/si', $text, $matches ) ) {
            $body_tag = $matches[0];
            $head_and_body = explode( $body_tag, $text );
        } else {
            $body_tag = '';
            $head_and_body = ['', $text ];
        }
        $i = 0;
        foreach ( $head_and_body as $idx => $str ) {
            if ( $i ) {
                if ( stripos( $str, '<s' ) !== false ) {
                    if ( preg_match_all( "/<script[^>]*?>.*?<\/script>/si", $str, $matches ) ) {
                        $matches = $matches[0];
                        foreach ( $matches as $matche ) {
                            $magic = $this->magic( $text, $tokens );
                            $replaced_map[ $magic ] = $matche;
                            $str = str_replace( $matche, $magic, $str );
                        }
                    }
                    if ( preg_match_all( "/<style[^>]*?>.*?<\/style>/si", $str, $matches ) ) {
                        $matches = $matches[0];
                        foreach ( $matches as $matche ) {
                            $magic = $this->magic( $text, $tokens );
                            $replaced_map[ $magic ] = $matche;
                            $str = str_replace( $matche, $magic, $str );
                        }
                    }
                }
                if ( stripos( $str, '<code' ) !== false ) {
                    if ( preg_match_all( "/<code[^>]*?>.*?<\/code>/si", $str, $matches ) ) {
                        $matches = $matches[0];
                        foreach ( $matches as $matche ) {
                            $magic = $this->magic( $text, $tokens );
                            $replaced_map[ $magic ] = $matche;
                            $str = str_replace( $matche, $magic, $str );
                        }
                    }
                }
                if ( stripos( $str, '<textarea' ) !== false ) {
                    if (! $app->machinetranslator_trans_attrs || $this->virtual ) {
                        if ( preg_match_all( "/<textarea[^>]*?>.*?<\/textarea>/si", $str, $matches ) ) {
                            $matches = $matches[0];
                            foreach ( $matches as $matche ) {
                                $magic = $this->magic( $text, $tokens );
                                $replaced_map[ $magic ] = $matche;
                                $str = str_replace( $matche, $magic, $str );
                            }
                        }
                    }
                }
                $contents = preg_split( '/(<[^>]*?>)/s',
                                $str, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
                $brackets = $this->app->machinetranslator_bracket_individual ?
                            ['「' => '」', '〈' => '〉', '『' => '』', '“' => '”', '【' => '】',
                             '＜' => '＞', '《' => '》', '«' => '»', '『' => '』'] : [];
                $texts = [];
                $in_brackets = [];
                $result = '';
                foreach ( $contents as $content ) {
                    if ( strpos( $content, '<' ) === false && strpos( $content, '>' ) === false ) {
                        $in_wraps = [];
                        foreach ( $phrases as $phrase => $trans ) {
                            if ( strpos( $content, $phrase ) !== false ) {
                                if (!empty( $in_wraps ) ) {
                                    foreach ( $in_wraps as $wrap ) {
                                        if ( strpos( $wrap, $phrase ) !== false ) {
                                            continue 2;
                                        }
                                    }
                                }
                                $in_wraps[] = $phrase;
                                $magic = $this->exception_token( $text, $tokens );
                                $tag = "<wrap id=\"{$magic}\"> {$phrase} </wrap>";
                                $content = str_replace( $phrase, $tag, $content );
                                if ( isset( $exceptions[ $phrase ] ) ) {
                                    $notrans_map[ $magic ] = $phrase;
                                } else if ( $trans ) {
                                    $notrans_map[ $magic ] = $trans;
                                    // $content = str_replace( $phrase, $trans, $content );
                                }
                            }
                        }
                        foreach ( $brackets as $bracket_start => $bracket_end ) {
                            if ( mb_strpos( $content, $bracket_start ) !== false
                                && mb_strpos( $content, $bracket_end ) !== false ) {
                                $bracket_start = preg_quote( $bracket_start, '/' );
                                $bracket_end = preg_quote( $bracket_end, '/' );
                                if ( preg_match_all( "/{$bracket_start}(.*?){$bracket_end}/s", $content, $matches ) ) {
                                    $cnt = 0;
                                    list( $matches, $inners ) = $matches;
                                    foreach ( $matches as $match ) {
                                        $inner = $inners[ $cnt ];
                                        if ( $this->mb_languages ) {
                                            if ( strlen( $inner ) == mb_strlen( $inner ) ) {
                                                continue;
                                            }
                                        }
                                        $cnt++;
                                        $magic = $this->magic( $text, $tokens );
                                        $replaced_map[ $magic ] = $match;
                                        $in_brackets[ $match ] = $magic;
                                        $replace_text = implode( '', $texts );
                                        $add_tag = $this->get_notranslate( $match );
                                        if ( mb_strlen( $replace_text . $match . $add_tag ) >= $this->max_length ) {
                                            $texts = $this->get_translate_text( $texts );
                                            if ( $texts !== false ) {
                                                foreach ( $texts as $str => $trans ) {
                                                    $magic = $in_brackets[ $str ];
                                                    $replaced_map[ $magic ] = $this->app->escape( $trans );
                                                }
                                                foreach ( $replaced_map as $magic => $str ) {
                                                    if ( isset( $texts[ $str ] ) ) {
                                                        $replaced_map[ $magic ] = $texts[ $str ];
                                                    }
                                                }
                                            } else {
                                                continue;
                                            }
                                            $texts = [];
                                        }
                                        $texts[] = $match;
                                        $texts = array_unique( $texts );
                                        $content = str_replace( $match, $magic, $content );
                                    }
                                }
                            }
                        }
                    }
                    $result .= $content;
                }
                if (! empty( $texts ) ) {
                    $texts = $this->get_translate_text( $texts );
                    if ( $texts !== false ) {
                        foreach ( $texts as $str => $trans ) {
                            $magic = $in_brackets[ $str ];
                            $replaced_map[ $magic ] = $this->app->escape( $trans );
                        }
                    }
                    foreach ( $replaced_map as $magic => $str ) {
                        if ( isset( $texts[ $str ] ) ) {
                            $replaced_map[ $magic ] = $texts[ $str ];
                        }
                    }
                }
                $str = $result;
            }
            $head_and_body[ $i ] = $str;
            $i++;
        }
        $text = implode( $body_tag, $head_and_body );
        return $text;
    }

    function com_create_guid () {
        if ( function_exists( 'com_create_guid' ) ) {
            return com_create_guid();
        }
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    function magic ( $content = '', &$tokens = [] ) {
        $magic = str_shuffle( '0123456789' ) . '-' . str_shuffle( '0123456789' );
        if ( strpos( $content, $magic ) !== false )
            return $this->magic( $content, $tokens );
        if ( isset( $tokens[ $magic ] ) )
            return $this->magic( $content, $tokens );
        $tokens[ $magic ] = true;
        $this->tokens[ $magic ] = true;
        $magic = " {$magic} ";
        $tokens[ $magic ] = true;
        $this->tokens[ $magic ] = true;
        return $magic;
    }

    function exception_token ( $content = '', &$tokens = [] ) {
        $magic = str_shuffle( '01234567890' ) . '-' . str_shuffle( '01234567890' );
        if ( isset( $tokens[ $magic ] ) )
            return $this->exception_token( $content, $tokens );
        $tokens[ $magic ] = true;
        if ( strpos( $content, $magic ) !== false )
            return $this->magic( $content, $tokens );
        return $magic;
    }

    function post_save_mt_dic ( $cb, $app, $obj, $original ) {
        $update = false;
        if ( $cb['name'] == 'post_delete' ) {
            $update = true;
        } else if ( isset( $cb['is_new'] ) && $cb['is_new'] ) {
            $update = true;
        } else {
            if ( $original && $obj->phrase != $original->phrase ) {
                $update = true;
            } else if ( $original && $obj->trans != $original->trans ) {
                $update = true;
            } else if ( $original && $obj->status != $original->status ) {
                $update = true;
            }
        }
        if (! $update ) {
            return true;
        }
        $lang = $obj->lang;
        if (! $lang ) {
            return true;
        }
        $cached_map = $this->get_cache( 'machinetranslator_cached_map' );
        if ( is_array( $cached_map ) ) {
            foreach ( $cached_map as $url => $data ) {
                if ( isset( $data[ $lang ] ) ) {
                    $id = $data[ $lang ];
                    unset( $cached_map[ $url ][ $lang ] );
                    if ( empty( $cached_map[ $url ] ) ) {
                        unset( $cached_map[ $url ] );
                    }
                    $this->clear_cache( $id, $app->machinetranslator_cache_expires );
                }
            }
            $this->set_cache( 'machinetranslator_cached_map', $cached_map );
        }
        $workspace_id = (int) $obj->workspace_id;
        $key = "machinetranslator_phrase_map_{$workspace_id}";
        $phrase_map = $this->phrase_map ? $this->phrase_map : $this->get_cache( $key );
        if (! $phrase_map ) {
            $phrase_map = [];
        }
        $phrase = $obj->phrase;
        $prefix = preg_quote( 'plugin' . DS . 'mt' . DS, '/' );
        foreach ( $phrase_map as $path => $trans ) {
            if ( strpos( $trans, $phrase ) !== false ) {
                $id = preg_replace( "/^$prefix/", '', $path );
                $this->clear_cache( $id );
                unset( $phrase_map[ $path ] );
            }
        }
        $this->set_cache( $key, $phrase_map );
        return true;
    }

    function get_cache ( $id, $html = null ) {
        if (! $this->caching ) return;
        $id = 'plugin' . DS . 'mt' . DS . $id;
        $app = $this->app ? $this->app : Prototype::get_instance();
        $cache = $app->get_cache( $id );
        if ( $cache ) {
            return $cache;
        }
        $cache_dir = $this->cache_dir ? $this->cache_dir
                   : $app->support_dir . DS . 'cache' . DS . 'machinetranslator_cache' . DS;
        $this->cache_dir = $cache_dir;
        if ( $app->fmgr->exists( $cache_dir . $id . '.php' ) ) {
            @include( $cache_dir . $id . '.php' );
            $cache = $this->get_cache;
        } else if ( $app->fmgr->exists( $cache_dir . $id . '.txt' ) ) {
            $cache = $app->fmgr->get( $cache_dir . $id . '.txt' );
        } else if ( $app->fmgr->exists( $cache_dir . $id . '.html' ) ) {
            $cache = $app->fmgr->get( $cache_dir . $id . '.html' );
        }
        if ( $cache ) {
            $this->set_cache( $id, $cache, $html );
            return $cache;
        }
    }

    function set_cache ( $id, $data, $html = false, $phrase = '' ) {
        // if (! $this->caching ) return;
        if ( is_string( $data ) && strpos( $data, '<wrap id="' ) !== false ) {
            return;
        }
        $id = 'plugin' . DS . 'mt' . DS . $id;
        $app = $this->app ? $this->app : Prototype::get_instance();
        $app->set_cache( $id, $data );
        $cache_dir = $this->cache_dir ? $this->cache_dir
                   : $app->support_dir . DS . 'cache' . DS . 'machinetranslator_cache' . DS;
        $this->cache_dir = $cache_dir;
        if ( is_array( $data ) ) {
            $code = var_export( $data, true );
            $code =  '<?php $this->get_cache=' . $code . ';';
            $cache_path = $cache_dir . $id . '.php';
            $app->fmgr->put( $cache_path, $code );
        } else if ( $html ) {
            $cache_path = $cache_dir . $id . '.html';
            $app->fmgr->put( $cache_path, $data );
        } else {
            $cache_path = $cache_dir . $id . '.txt';
            $app->fmgr->put( $cache_path, $data );
        }
        if ( $phrase ) {
            $workspace_id = (int) $this->workspace_id;
            $key = "machinetranslator_phrase_map_{$workspace_id}";
            $phrase_map = $this->phrase_map ? $this->phrase_map : $this->get_cache( $key );
            if (! $phrase_map ) {
                $phrase_map = [];
            }
            $phrase_map[ $id ] = $phrase;
            $this->phrase_map = $phrase_map;
            $this->set_cache( $key, $phrase_map );
        }
    }

    function clear_cache ( $id, $expires = false ) {
        if ( is_numeric( $expires ) && $expires < 0 ) {
            return;
        }
        $id = 'plugin' . DS . 'mt' . DS . $id;
        $app = $this->app ? $this->app : Prototype::get_instance();
        $app->clear_cache( $id );
        $cache_dir = $this->cache_dir ? $this->cache_dir
                   : $app->support_dir . DS . 'cache' . DS . 'machinetranslator_cache' . DS;
        $this->cache_dir = $cache_dir;
        $cache = null;
        if ( $app->fmgr->exists( $cache_dir . $id . '.php' ) ) {
            $cache = $cache_dir . $id . '.php';
        }
        if ( $app->fmgr->exists( $cache_dir . $id . '.json' ) ) {
            $cache = $cache_dir . $id . '.json';
        }
        if ( $app->fmgr->exists( $cache_dir . $id . '.html' ) ) {
            $cache = $cache_dir . $id . '.html';
        }
        if ( $cache ) {
            if (! $expires ) {
                $app->fmgr->unlink( $cache );
            } else {
                $expires = $app->request_time - $app->machinetranslator_cache_expires;
                if ( $expires > filemtime( $cache ) ) {
                    $app->fmgr->unlink( $cache );
                }
            }
        }
    }

    function machinetranslator_detect_language ( $app ) {
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        if ( $magic_token != $app->current_magic ) {
            $app->json_error( 'Invalid request.' );
        }
        $this->app = $app;
        $this->workspace_id = (int) $app->param( 'workspace_id' );
        $text = $json['text'];
        if (! $text ) {
            $app->json_error( $this->translate( 'No text selected.' ) );
        }
        $agreement = $json['agreement'];
        if ( $agreement && !$app->cookie_val( 'pt-mt-agreement' ) ) {
            $path = $app->cookie_path ? $app->cookie_path : $app->path;
            $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
            $app->bake_cookie( 'pt-mt-agreement', 1, $expires, $path, true, $app->cookie_domain );
        }
        $from = $this->detect_language( $text );
        header( 'Content-type: application/json' );
        echo json_encode( ['status' => 200 , 
                           'language' => $from ] );
        exit();
    }

    function machinetranslator_japanese_check ( $app ) {
        $plugin = $app->component( 'SimplifiedJapanese' );
        $this->workspace_id = (int) $app->param( 'workspace_id' );
        $workspace_id = $this->workspace_id;
        if ( $app->param( '_type' ) === 'japanese_check' ) {
            $json_string = file_get_contents( 'php://input' );
            $json = json_decode( $json_string, true );
            $magic_token = $json['magic_token'];
            if ( $magic_token != $app->current_magic ) {
                $app->json_error( 'Invalid request.' );
            }
            $this->app = $app;
            $text = $json['text'];
            if (! $text ) {
                $app->json_error( $this->translate( 'No text selected.' ) );
            }
            $brackets = ['(' => ')', '「' => '」', '〈' => '〉', '（' => '）',
                         '『' => '』', '“' => '”', '【' => '】', '＜' => '＞',
                         '《' => '》', '«' => '»', '[' => ']', '『' => '』'];
            $kanji = $plugin::KANJI_CHAR;
            if ( stripos( $text, '<r' ) !== false ) {
                $text = preg_replace( '/<rt[^>]*?>.*?<\/rt>/si', '', $text );
                $text = preg_replace( '/<rp[^>]*?>.*?<\/rp>/si', '', $text );
                $text = preg_replace( '/<ruby[^>]*?>/si', '', $text );
                $text = preg_replace( '/<\/ruby>/si', '', $text );
                $text = preg_replace( '/<rb[^>]*?>/si', '', $text );
                $text = preg_replace( '/<\/rb>/si', '', $text );
            }
            $text = trim( strip_tags( $text ) );
            $component = $app->component( 'SimplifiedJapanese' );
            if ( $component ) {
                $separator = $component->get_config_value( 'simplifiedjapanese_separator', $workspace_id );
                if ( $separator && strpos( $text, $separator ) !== false ) {
                    $text = str_replace( $separator, '', $text );
                }
            }
            if ( strpos( $text, '。' ) !== false ) {
                $delimiter = '.';
                if ( strpos( $text, '。' ) !== false ) {
                    $delimiter = '。';
                }
                $blockquotes = [];
                foreach ( $brackets as $bracket_start => $bracket_end ) {
                    if ( mb_strpos( $text, $bracket_start ) !== false
                        && mb_strpos( $text, $bracket_end ) !== false ) {
                        list( $start, $end ) = [ $bracket_start, $bracket_end ];
                        $bracket_start = preg_quote( $bracket_start, '/' );
                        $bracket_end = preg_quote( $bracket_end, '/' );
                        if ( preg_match_all( "/{$bracket_start}.*?{$bracket_end}/s", $text, $matches ) ) {
                            if ( strpos( $text, $delimiter ) !== false ) {
                                foreach ( $matches as $all_match ) {
                                    foreach ( $all_match as $match ) {
                                        $magic = self::magic( $text );
                                        $text = str_replace( $match, $magic, $text );
                                        $blockquotes[ $magic ] = $match;
                                    }
                                }
                            }
                        }
                    }
                }
                $texts = explode( '。', $text );
                $last = $texts[ count( $texts ) - 1];
                foreach ( $texts as $idx => $txt ) {
                    if ( $txt ) {
                        $texts[ $idx ] .= '。';
                    } else {
                        unset( $texts[ $idx ] );
                    }
                }
                if (! empty( $blockquotes ) ) {
                    foreach ( $texts as $idx => $txt ) {
                        foreach ( $blockquotes as $magic => $org ) {
                            $txt = str_replace( $magic, $org, $txt );
                        }
                        $texts[ $idx ] = $txt;
                    }
                }
            } else {
                $texts = [ $text ];
            }
            $api_version = $this->get_config_value( 'machinetranslator_api_version' );
            $this->subscription_key = $this->get_config_value( 'machinetranslator_subscription_key' );
            $end_point = $this->get_config_value( 'machinetranslator_end_point' );
            $lang = $app->cookie_val( 'pt-mt-user-to-' . $this->workspace_id );
            if (! $lang ) {
                $lang = $this->get_config_value( 'machinetranslator_translate_to', $this->workspace_id );
            }
            if ( $lang === 'jp-yn' || $lang === 'jp-rb' ) {
                $lang = 'en';
            }
            $difficulty_map = ['PN' => $this->translate( 'Proper Noun' ),
                               'ON' => $this->translate( 'Onomatopoeia' ),
                               'ID' => $this->translate( 'Idiom' ),
                               'N0' => $this->translate( 'Out of Level' ),
                               'EN' => $this->translate( 'Alphanumeric' ),
                               'BQ' => $this->translate( 'Quote' ) ];
            $dictionaries = $app->db->model( 'mt_dic' )->load(
                ['lang' => ['IN' => [ $lang, 'all'] ], 'status' => 2, 'workspace_id' => $workspace_id ] );
            $results = [];
            foreach ( $texts as $text ) {
                $original = $text;
                $from = 'ja';
                $_end_point = "{$end_point}?api-version={$api_version}";
                $params = "&to={$lang}&from={$from}";
                $_end_point .= $params;
                // $_end_point .= '&textType=html';
                $this->end_point = $_end_point;
                $this->translate_from = $from;
                $this->translate_to = $lang;
                $map = [];
                $text_translate = $text;
                foreach ( $dictionaries as $dictionary ) {
                    $phrase = $dictionary->phrase;
                    if ( stripos( $text_translate, $phrase ) !== false ) {
                        $magic = self::magic( $text_translate );
                        $text_translate = str_replace( $phrase, $magic, $text_translate );
                        $map[ $magic ] = $dictionary->trans;
                    }
                }
                $translated = $this->get_translate_text( $text_translate );
                foreach ( $map as $magic => $trans ) {
                    $translated = str_replace( $magic, $trans, $translated );
                }
                $_end_point = "{$end_point}?api-version={$api_version}";
                $params = "&to={$from}&from={$lang}";
                $_end_point .= $params;
                // $_end_point .= '&textType=html';
                $this->end_point = $_end_point;
                $map = [];
                $text_translate = $translated;
                foreach ( $dictionaries as $dictionary ) {
                    $phrase = $dictionary->trans;
                    if ( stripos( $text_translate, $phrase ) !== false ) {
                        $magic = self::magic( $text_translate );
                        $text_translate = str_replace( $phrase, $magic, $text_translate );
                        $map[ $magic ] = $dictionary->phrase;
                    }
                }
                $reverse = $this->get_translate_text( $text_translate );
                foreach ( $map as $magic => $trans ) {
                    $reverse = str_replace( $magic, $trans, $reverse );
                }
                $dic_path = $plugin->path() . DS . 'dictionaries' . DS . 'japanese_check.dic';
                $mecab = $plugin->get_mecab( $app, 0, false, $dic_path );
                $pronouns = ['この' => '連体詞', 'その' => '連体詞', 'あの' => '連体詞',
                             'これ' => '名詞', 'それ' => '名詞', 'あれ' => '名詞'];
                $sentences = explode( '、', $text );
                $sentence_total = count( $sentences );
                $result = '';
                $difficult = '';
                $result_texts = '';
                $subject = false;
                foreach ( $sentences as $sentence_idx => $sentence ) {
                    $parse = $plugin->mecab_parse( $sentence, $mecab );
                    $errors = [];
                    $plugin->separators[ $this->workspace_id ] = '　';
                    $separated = $plugin->filter_furigana( $original, 3, $app->ctx );
                    $pronunciation = '';
                    $object = false;
                    $pre = '';
                    $total = count( $parse ) - 1;
                    $first_half = $total / 3 * 2;
                    $modifier = false;
                    $onomatopoeia = false;
                    $idiom = false;
                    $difficult_word = false;
                    $onomatopoeias = [];
                    $idioms = [];
                    $negations = 0;
                    $has_nai = false;
                    $nai_after = false;
                    $ambiguous = false;
                    $lastWord = '';
                    $passive_voice = false;
                    $has_pronoun = false;
                    $has_option = true;
                    $causative = false;
                    foreach ( $parse as $idx => $res ) {
                        $res = trim( $res );
                        if ( $res === 'EOS' ) continue;
                        list( $word, $split ) = explode( "\t", $res );
                        $result .= $word;
                        $split = explode( ',', $split );
                        if ( $idx < $first_half ) {
                            if (!$subject && $pre === '名詞' && $split[0] === '助詞' ) {
                                if ( ( $split[1] === '係助詞' && $word === 'は' )
                                    || ( $split[1] === '格助詞' && $word === 'が' ) ) {
                                    $subject = true;
                                }
                            }
                        }
                        if (! $object && $pre === '名詞' && $split[0] === '助詞' ) {
                            if ( ( $split[1] === '格助詞' && $word === 'を' )
                                || ( $split[1] === '格助詞' && $word === 'が' )
                                || ( $split[1] === '格助詞' && $word === 'に' )
                                || ( $split[1] === '格助詞' && $word === 'へ' ) ) {
                                $object = true;
                            }
                        }
                        if ( isset( $pronouns[ $word ] ) && $split[0] === $pronouns[ $word ] ) {
                            $has_pronoun = true;
                        }
                        if ( $res === "れ\t動詞,接尾,*,*,一段,連用形,れる,レ,レ" ) {
                            $passive_voice = true;
                        }
                        $next = $idx + 1;
                        if ( isset( $parse[ $next ] ) && $parse[ $next ] && stripos( $parse[ $next ], "\t" ) !== false ) {
                            list( $nWord, $nSplit ) = explode( "\t", $parse[ $next ] );
                        } else {
                            list( $nWord, $nSplit ) = ['', ''];
                        }
                        if ( ( $split[0] === '形容詞' || $split[0] === '助動詞')  && $split[6] === 'ない' ) {
                            $negations++;
                            $has_nai = true;
                        } else if ( $split[0] === '助動詞' && $word === 'ませ' ) {
                            if ( isset( $parse[ $idx + 1 ] ) ) {
                                if ( $split[0] === '助動詞' && $nWord === 'ん' ) {
                                    $negations++;
                                    $has_nai = true;
                                }
                            }
                        } else if ( $split[6] === 'せる' && $split[0] === '動詞' && $split[1] === '接尾' ) {
                            $causative = true;
                        } else if ( $split[6] === 'させる' && $split[0] === '動詞' && $split[1] === '接尾' ) {
                            $causative = true;
                        }
                        $counter = $idx + 1;
                        if ( $has_nai && $counter != $total ) {
                            if ( $split[0] === '動詞' && $split[1] === '自立' ) {
                                $nai_after = true;
                                $has_nai = false;
                            } else if ( $split[0] === '名詞' && $split[1] !== '非自立' ) {
                                $nai_after = true;
                                $has_nai = false;
                            }
                        }
                        if ( ( $word === 'ましょ' || $word === 'でしょ' ) && $nWord === 'う' ) {
                            $ambiguous = true;
                        }
                        $option = $split[9] ?? null;
                        if ( $option ) {
                            $has_option = true;
                        }
                        $pre = $split[0] === '助詞' || $split[1] === '非自立' ? $pre : $split[0];
                        $pronunciation .= isset( $split[ 7 ] ) ? $split[ 7 ] : '';
                        $lastWord = $word;
                    }
                    if ( mb_strlen( $pronunciation ) > $app->machinetranslator_japanese_check_len ) {
                        $errors[] = $this->translate( 'One sentence is too long. Consider splitting your sentences.' );
                    }
                    if ( $causative || $has_option || $has_pronoun || $passive_voice || $ambiguous
                        || ( $negations > 1 ) || ( $has_nai && ! $nai_after ) ) {
                        $last_single = false;
                        $result = '';
                        foreach ( $parse as $idx => $res ) {
                            $res = trim( $res );
                            if ( $res === 'EOS' ) continue;
                            list( $word, $split ) = explode( "\t", $res );
                            $is_single = strlen( $word ) === mb_strlen( $word );
                            $split = explode( ',', $split );
                            if ( isset( $parse[ $idx + 1 ] ) && strpos( $parse[ $idx + 1 ], "\t" ) !== false ) {
                                list( $nWord, $nSplit ) = explode( "\t", $parse[ $idx + 1 ] );
                            } else {
                                list( $nWord, $nSplit ) = ['', ''];
                            }
                            $option = $split[9] ?? null;
                            if ( $option && strpos( $option, 'N' ) !== 0 ) {
                                // N5, N4...
                                $result .= "<strong class=g>{$word}</strong>";
                                if ( $option === 'delete' ) {
                                    $modifier = true;
                                } else if ( $option === 'onomatopoeia' ) {
                                    $onomatopoeia = true;
                                    $onomatopoeias[ $word ] = true;
                                } else if ( $option === 'idiom' ) {
                                    $idiom = true;
                                    $idioms[ $word ] = true;
                                }
                            } else if ( isset( $pronouns[ $word ] ) && $split[0] === $pronouns[ $word ] ) {
                                $result .= "<strong class=d>{$word}</strong>";
                            } else if ( ( $split[0] === '形容詞' || $split[0] === '助動詞')  && $split[6] === 'ない' ) {
                                if ( $negations > 1 ) {
                                    $result .= "<strong class=r>{$word}</strong>";
                                } else {
                                    if ( $is_single && $last_single ) {
                                        $word = " $word";
                                    }
                                    $result .= $word;
                                }
                            } else if ( $res === "れ\t動詞,接尾,*,*,一段,連用形,れる,レ,レ" ) {
                                $result .= "<strong class=p>{$word}</strong>";
                            } else if ( $split[0] === '助動詞' && $word === 'ませ' && $negations > 1 ) {
                                $negation = false;
                                if ( isset( $parse[ $idx + 1 ] ) ) {
                                    if ( $split[0] === '助動詞' && $nWord === 'ん' ) {
                                        $negation = true;
                                    }
                                }
                                if ( $negation ) {
                                    $result .= "<strong class=r>{$word}</strong>";
                                } else {
                                    if ( $is_single && $last_single ) {
                                        $word = " $word";
                                    }
                                    $result .= $word;
                                }
                            } else if ( $causative && ( $split[6] === 'せる' && $split[0] === '動詞' && $split[1] === '接尾' ) ) {
                                $result .= "<strong class=p>{$word}</strong>";
                            } else if ( $causative && ( $split[6] === 'させる' && $split[0] === '動詞' && $split[1] === '接尾' ) ) {
                                $result .= "<strong class=p>{$word}</strong>";
                            } else if ( $ambiguous && ( $word === 'ましょ' || $word === 'でしょ' ) && $nWord === 'う' ) {
                                $result .= "<strong class=b>{$word}</strong>";
                            } else {
                                $counter = $idx + 1;
                                if ( $word === '?' && $has_nai && !$nai_after && $counter == $total ) {
                                    $result .= "<strong class=r>{$word}</strong>";
                                } else {
                                    if ( $is_single && $last_single ) {
                                        $word = " $word";
                                    }
                                    $result .= $word;
                                }
                            }
                            $last_single = $is_single;
                        }
                        $text = $result;
                    }
                    $warekis = ['明治', '大正','昭和', '平成', '令和'];
                    foreach ( $warekis as $wareki ) {
                        if ( preg_match_all( "/{$wareki}[0-9０-９元一二三四五六七八九十〇]+年/u", $text, $matches ) ) {
                            $matches = $matches[0];
                            foreach ( $matches as $matche ) {
                                $text = str_replace( $matche, "<strong class=db>$matche</strong>", $text );
                            }
                            $errors[] = $this->translate( 'Please replace the <strong class=db>Japanese calendar</strong> with the Western calendar.' );
                        }
                    }
                    if ( preg_match_all( "/午[前|後]([0-9０-９一二三四五六七八九十〇])+時/u", $text, $matches ) ) {
                        $hour_err = false;
                        foreach ( $matches[0] as $idx => $matche ) {
                            $hour = PTUtil::normalize( $matches[1][ $idx ] );
                            if ( ( 0 <= $hour ) && ( $hour <= 12 ) ) {
                                $hour_err = true;
                                $text = str_replace( $matche, "<strong class=db>$matche</strong>", $text );
                            }
                        }
                        if ( $hour_err ) {
                            $errors[] = $this->translate( 'Correct the time to <strong class=db>24-hour</strong> units.' );
                        }
                    }
                    $kanji_characters = $app->machinetranslator_kanji_characters;
                    $hiragana_characters = $app->machinetranslator_hiragana_characters;
                    $katakana_characters = $app->machinetranslator_katakana_characters;
                    if ( preg_match_all( "/{$kanji}{{$kanji_characters},}/u", $text, $matches ) ) {
                        $matches = $matches[0];
                        $moji_error = false;
                        foreach ( $matches as $matche ) {
                            $parse_kan = $plugin->mecab_parse( $matche );
                            $proper_noun = 0;
                            foreach ( $parse_kan as $kan ) {
                                $kan = trim( $kan );
                                if ( $kan === 'EOS' ) continue;
                                if ( strpos( $kan, '固有名詞' ) !== false ) {
                                    $proper_noun++;
                                }
                            }
                            $hit = $proper_noun / count( $parse_kan );
                            if ( $hit < 0.4 ) {
                                $moji_error = true;
                            } else {
                                continue;
                            }
                            $text = str_replace( $matche, "<strong class=dp>$matche</strong>", $text );
                        }
                        if ( $moji_error ) {
                            $errors[] = $this->translate( 'Consecutive letters of the same type should be sentences that use <strong class=dp>kanji</strong>, hiragana, and katakana in a well-balanced manner.' );
                        }
                    }
                    if ( preg_match_all( "/[ぁ-ん]{{$hiragana_characters},}/u", $text, $matches ) ) {
                        $matches = $matches[0];
                        $moji_error = false;
                        foreach ( $matches as $matche ) {
                            $parse_kan = $plugin->mecab_parse( $matche );
                            $proper_noun = 0;
                            foreach ( $parse_kan as $kan ) {
                                $kan = trim( $kan );
                                if ( $kan === 'EOS' ) continue;
                                if ( strpos( $kan, '固有名詞' ) !== false ) {
                                    $proper_noun++;
                                }
                            }
                            $hit = $proper_noun / count( $parse_kan );
                            if ( $hit < 0.4 ) {
                                $moji_error = true;
                            } else {
                                continue;
                            }
                            $text = str_replace( $matche, "<strong class=dp>$matche</strong>", $text );
                        }
                        if ( $moji_error ) {
                            $errors[] = $this->translate( 'Consecutive letters of the same type should be sentences that use kanji, <strong class=dp>hiragana</strong>, and katakana in a well-balanced manner.' );
                        }
                    }
                    if ( preg_match_all( "/[ァ-ン]{{$katakana_characters},}/u", $text, $matches ) ) {
                        $matches = $matches[0];
                        $moji_error = false;
                        foreach ( $matches as $matche ) {
                            $parse_kan = $plugin->mecab_parse( $matche );
                            $proper_noun = 0;
                            foreach ( $parse_kan as $kan ) {
                                $kan = trim( $kan );
                                if ( $kan === 'EOS' ) continue;
                                if ( strpos( $kan, '固有名詞' ) !== false ) {
                                    $proper_noun++;
                                }
                            }
                            $hit = $proper_noun / count( $parse_kan );
                            if ( $hit < 0.4 ) {
                                $moji_error = true;
                            } else {
                                continue;
                            }
                            $text = str_replace( $matche, "<strong class=dp>$matche</strong>", $text );
                        }
                        if ( $moji_error ) {
                            $errors[] = $this->translate( 'Consecutive letters of the same type should be sentences that use kanji, <strong class=dp>hiragana</strong>, and katakana in a well-balanced manner.' );
                        }
                    }
                    if (! $subject && ! $object ) {
                        $errors[] = $this->translate( 'No subject was found in the sentence.' ) . ' ' . $this->translate( 'No object was found in the sentence.' );
                    } else if (! $subject ) {
                        $errors[] = $this->translate( 'No subject was found in the sentence.' );
                    } else if (! $object ) {
                        $errors[] = $this->translate( 'No object was found in the sentence.' );
                    }
                    if ( $modifier ) {
                        $errors[] = $this->translate( 'Consider omitting unnecessary <strong class=g>modifiers</strong>.' );
                    }
                    if ( $onomatopoeia ) {
                        $errors[] = $this->translate( '<strong class=g>Onomatopoeia</strong> can interfere with comprehension.' );
                    }
                    $strongs = [];
                    if ( preg_match_all( "!<strong[^>]*?>.*?</strong>!si", $text, $matches ) ) {
                        foreach ( $matches as $all_match ) {
                            foreach ( $all_match as $match ) {
                                $magic = self::magic( $text );
                                $text = str_replace( $match, $magic, $text );
                                $strongs[ $magic ] = $match;
                            }
                        }
                    }
                    foreach ( $strongs as $magic => $strong ) {
                        $text = str_replace( $magic, $strong, $text );
                    }
                    if ( $idiom ) {
                        $errors[] = $this->translate( 'Avoid using <strong class=g>idioms</strong> as much as possible.' );
                    }
                    if ( $negations > 1 ) {
                        $errors[] = $this->translate( 'Please check if it is not a <strong class=r>double negative expression</strong>.' );
                    }
                    if ( $lastWord === '?' && $has_nai && !$nai_after ) {
                        $errors[] = $this->translate( "Isn't it a <strong class=r>negative interrogative</strong> sentence?" );
                    }
                    if ( $ambiguous ) {
                        $errors[] = $this->translate( 'Change <strong class=b>ambiguous expressions</strong> into clear ones.' );
                    }
                    if ( $passive_voice ) {
                        $errors[] = $this->translate( 'Can the <strong class=p>passive voice</strong> be changed to the active voice?' );
                    }
                    if ( $causative ) {
                        $errors[] = $this->translate( 'Consider changing the <strong class=p>causative</strong> verb to another way of saying it.' );
                    }
                    if ( $has_pronoun ) {
                        $errors[] = $this->translate( "Can't you replace it with what the <strong class=d>demonstrative/pronoun</strong> refers to?" );
                    }
                    if ( $app->machinetranslator_difficulty_check ) {
                        $dic_path = $plugin->path() . DS . 'dictionaries' . DS . 'difficulty.dic';
                        // 慣用句・オノマトペ・固有名詞の辞書を利用する
                        $mecab = $plugin->get_mecab( $app, 0, false, $dic_path );
                        $difficult_text = $original;
                        $replaced_map = [];
                        $option_str = $difficulty_map['ID'];
                        foreach ( $idioms as $key => $value ) {
                            $magic = self::magic( $difficult_text );
                            $magic = trim( str_replace( '-', '', $magic ) );
                            $difficult_text = str_replace( $key, $magic, $difficult_text );
                            $tag = "<span class=\"ID\">{$key}<sup>({$option_str})</sup></span>";
                            $replaced_map[ $magic ] = $tag;
                        }
                        $option_str = $difficulty_map['ON'];
                        foreach ( $onomatopoeias as $key => $value ) {
                            $magic = self::magic( $difficult_text );
                            $magic = trim( str_replace( '-', '', $magic ) );
                            $difficult_text = str_replace( $key, $magic, $difficult_text );
                            $tag = "<span class=\"ON\">{$key}<sup>({$option_str})</sup></span>";
                            $replaced_map[ $magic ] = $tag;
                        }
                        $option_str = $difficulty_map['BQ'];
                        foreach ( $brackets as $bracket_start => $bracket_end ) {
                            if ( mb_strpos( $difficult_text, $bracket_start ) !== false
                                && mb_strpos( $difficult_text, $bracket_end ) !== false ) {
                                list( $start, $end ) = [ $bracket_start, $bracket_end ];
                                $bracket_start = preg_quote( $bracket_start, '/' );
                                $bracket_end = preg_quote( $bracket_end, '/' );
                                if ( preg_match_all( "/{$bracket_start}.*?{$bracket_end}/s", $difficult_text, $matches ) ) {
                                    foreach ( $matches as $all_match ) {
                                        foreach ( $all_match as $match ) {
                                            $magic = self::magic( $difficult_text );
                                            $magic = trim( str_replace( '-', '', $magic ) );
                                            $difficult_text = str_replace( $match, $magic, $difficult_text );
                                            $tag = "<span class=\"BQ\">{$match}<sup>({$option_str})</sup></span>";
                                            $replaced_map[ $magic ] = $tag;
                                        }
                                    }
                                }
                            }
                        }
                        $parse = $plugin->mecab_parse( $difficult_text );
                        foreach ( $parse as $idx => $res ) {
                            $option = '';
                            $res = trim( $res );
                            if ( $res === 'EOS' ) continue;
                            list( $word, $split ) = explode( "\t", $res );
                            if ( isset( $replaced_map[ trim( $word ) ] ) ) {
                                $difficult .= $word;
                                continue;
                            }
                            $is_single = strlen( $word ) === mb_strlen( $word );
                            $split = explode( ',', $split );
                            if ( $split[1] === '固有名詞' ) {
                                $option = 'PN';
                            } else {
                                $difficulties = $plugin->mecab_parse( $word, $mecab );
                                foreach ( $difficulties as $i => $difficulty ) {
                                    $difficulty = trim( $difficulty );
                                    if ( $difficulty === 'EOS' ) continue;
                                    list( $s_word, $s_split ) = explode( "\t", $difficulty );
                                    $s_split = explode( ',', $s_split );
                                    $option = $s_split[9] ?? '';
                                    if (! $option ) {
                                        $alternatives = $plugin->mecab_parse( $split[6], $mecab );
                                        foreach ( $alternatives as $j => $alternative ) {
                                            $alternative = trim( $alternative );
                                            if ( $alternative === 'EOS' ) continue;
                                            list( $a_word, $a_split ) = explode( "\t", $alternative );
                                            if ( $split[6] !== $a_word ) {
                                                break;
                                            }
                                            $a_split = explode( ',', $a_split );
                                            $option = $a_split[9] ?? '';
                                            break;
                                        }
                                    }
                                    break;
                                }
                            }
                            if ( strlen( $word ) === mb_strlen( $word ) ) {
                                $option = 'EN';
                            }
                            if (! $option && $split[0] !== '記号' && $split[1] !== '数' && !in_array( $word, $plugin::BRACKETS ) ) {
                                $option = 'N0';
                            }
                            if ( $option ) {
                                $option_str = $difficulty_map[ $option ] ?? $option;
                                $option_str = "<sup>($option_str)</sup>";
                                $word = "<span class=\"{$option}\">{$word}{$option_str}</span>";
                                if ( $option === 'N0' || $option === 'N1' ) {
                                    $difficult_word = true;
                                }
                            }
                            if ( $is_single && $last_single ) {
                                $word = " $word";
                            }
                            $difficult .= $word;
                            $last_single = $is_single;
                        }
                        foreach ( $replaced_map as $magic => $tag ) {
                            $difficult = str_replace( $magic, $tag, $difficult );
                        }
                    }
                    if ( $app->machinetranslator_difficulty_check && $difficult_word ) {
                        $errors[] = $this->translate( 'The sentence may contain difficult words.' );
                    }
                    $sentense_counter = $sentence_idx + 1;
                    if ( $sentence_total > 1 && $sentence_total != $sentense_counter ) {
                        $text .= '、';
                    }
                    $result_texts .= $text;
                }
                $kango_wago = '';
                if ( $app->simplifiedjapanese_unidic_path && $app->machinetranslator_difficulty_check ) {
                    $mecab = $plugin->get_mecab( $app, 0, false, false, $app->simplifiedjapanese_unidic_path );
                    $clone = PTUtil::normalize( $original );
                    $dummy_strs = $plugin::DUMMY_CHARS;
                    $replaced_map = [];
                    if ( preg_match_all( "/[A-Za-z0-9]{1,}/", $clone, $matches ) ) {
                        $dummy_cnt = 0;
                        foreach ( $matches[0] as $idx => $matche ) {
                            $matche = preg_quote( $matche, '/' );
                            $magic = $dummy_strs[ $dummy_cnt ] ?? '';
                            if ( $magic ) {
                                $clone = preg_replace( "/$matche/", $magic, $clone, 1 );
                                $replaced_map[ $magic ] = $matche;
                                $dummy_cnt++;
                            }
                        }
                    }
                    $parse = $plugin->mecab_parse( $clone, $mecab );
                    $last_single = false;
                    $kan = $this->translate( 'Chinese Words' );
                    $wa = $this->translate( 'Japanese Words' );
                    $foreign = $this->translate( 'Foreign Words' );
                    $pn = $this->translate( 'Proper Noun' );
                    $symbol = $this->translate( 'Symbol' );
                    $alphanumeric = $this->translate( 'Alphanumeric' );
                    $wa_count = 0;
                    $kan_count = 0;
                    foreach ( $parse as $idx => $res ) {
                        $res = trim( $res );
                        if ( $res === 'EOS' ) continue;
                        $split = explode( "\t", $res );
                        if (! isset( $split[7] ) ) {
                            continue;
                        }
                        $word = $split[0];
                        $is_single = strlen( $word ) === mb_strlen( $word );
                        $sup = '';
                        $class = '';
                        $kan_wa = $split[7];
                        if ( in_array( $word, $dummy_strs ) && isset( $replaced_map[ $word ] ) ) {
                            $word = $replaced_map[ $word ];
                            $sup = $alphanumeric;
                        } else if ( $kan_wa === '和' ) {
                            $sup = $wa;
                            $wa_count++;
                            $class = 'WA';
                        } else if ( $kan_wa === '漢' ) {
                            $sup = $kan;
                            $kan_count++;
                            $class = 'KAN';
                        } else if ( $kan_wa === '外' ) {
                            $sup = $foreign;
                            $kan_count++;
                            $class = 'GAI';
                        // } else if ( $kan_wa === '記号' ) {
                        // $sup = $symbol;
                        } else if ( $kan_wa === '固' ) {
                            $sup = $pn;
                        }
                        if ( $sup ) {
                            $word = "{$word}<sup>({$sup})</sup>";
                        }
                        if ( $class ) {
                            $word = "<span class={$class}>{$word}</span>";
                        }
                        if ( $is_single && $last_single ) {
                            $word = " $word";
                        }
                        $kango_wago .= $word;
                        $last_single = $is_single;
                    }
                    $kango_wago_total = $wa_count + $kan_count;
                    $kango_wago_percent = $kan_count / $kango_wago_total;
                    if ( $kango_wago_percent > 0.33 ) {
                        $errors[] = $this->translate( 'Make sure that the proportion of <span class=KAN>Chinese words</span> and <span class=GAI>Foreign words</span> in the text is not high.' );
                    }
                }
                $results[] = ['translated' => $translated,
                              'reverse' => $reverse,
                              'text' => $result_texts,
                              'original' => $original,
                              'difficulty' => $difficult,
                              'kango_wago' => $kango_wago,
                              'pronunciation' => $pronunciation,
                              'errors' => $errors ];
            }
            header( 'Content-type: application/json' );
            echo json_encode( ['status' => 200 , 
                               'results' => $results ] );
            exit();
        }
        $param = [];
        $font = $plugin->get_config_value( 'simplifiedjapanese_font', $workspace_id );
        $googleFont = $plugin->get_config_value( 'simplifiedjapanese_google_font', $workspace_id );
        $font_face = $plugin->get_config_value( 'simplifiedjapanese_font_face', $workspace_id );
        $param['canvas_font'] = $font;
        $param['canvas_webfont'] = $googleFont;
        $param['canvas_font_face'] = $font_face;
        $tmpl = $app->ctx->get_template_path( 'machinetranslator_japanese_check.tmpl' );
        echo $app->build_page( $tmpl, $param );
    }

    function machinetranslator_settings ( $app ) {
        $cookie_from = 'pt-mt-user-from-';
        $cookie_to = 'pt-mt-user-to-';
        $workspace_id = (int) $app->param( 'workspace_id' );
        if ( $app->machinetranslator_language_all ) {
            $cookie_from .= 'all';
            $cookie_to .= 'all';
        } else {
            $cookie_from .= $workspace_id;
            $cookie_to .= $workspace_id;
        }
        $from = $app->cookie_val( $cookie_from );
        $to = $app->cookie_val( $cookie_to );
        if (! $from || ! $to ) {
            if ( $workspace_id ) {
                $use_system = $this->get_config_value( 'machinetranslator_use_system_settings', $workspace_id );
                if ( $use_system ) {
                    $workspace_id = '0';
                }
            }
            if (! isset( $_COOKIE[ $cookie_from ] ) ) {
                $from = $this->get_config_value( 'machinetranslator_translate_from', $workspace_id );
            }
            if (! isset( $_COOKIE[ $cookie_to ] ) ) {
                $to = $this->get_config_value( 'machinetranslator_translate_to', $workspace_id );
            }
        }
        $param = ['page_title' => $this->translate( 'Translate Settings' ) ];
        $param['translate_from'] = $from;
        $param['translate_to'] = $to;
        $tmpl = $app->ctx->get_template_path( 'machinetranslator_settings.tmpl' );
        echo $app->build_page( $tmpl, $param );
    }

    function insert_button ( $cb, $app, &$param, &$tmpl ) {
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        if ( $app->mode != 'simplifiedjapanese_helper' ) {
            $table = $app->get_table( $app->param( '_model' ) );
            if ( $table->menu_type == 3 ) return true;
        }
        $subscription_key = $this->get_config_value( 'machinetranslator_subscription_key' );
        $end_point = $this->get_config_value( 'machinetranslator_end_point' );
        $api_version = $this->get_config_value( 'machinetranslator_api_version' );
        if (!$subscription_key || !$end_point || !$api_version ) {
            return;
        }
        $cookie_from = 'pt-mt-user-from-';
        $cookie_to = 'pt-mt-user-to-';
        if ( $app->machinetranslator_language_all ) {
            $cookie_from .= 'all';
            $cookie_to .= 'all';
        } else {
            $cookie_from .= $workspace_id;
            $cookie_to .= $workspace_id;
        }
        $from = $app->cookie_val( $cookie_from );
        $to = $app->cookie_val( $cookie_to );
        if ( $workspace_id ) {
            $use_system = $this->get_config_value( 'machinetranslator_use_system_settings', $workspace_id );
            if ( $use_system ) {
                $workspace_id = 0;
            }
        }
        if (! $from || ! $to ) {
            if (! isset( $_COOKIE[ $cookie_from ] ) ) {
                $from = $this->get_config_value( 'machinetranslator_translate_from', $workspace_id );
            }
            if (! isset( $_COOKIE[ $cookie_to ] ) ) {
                $to = $this->get_config_value( 'machinetranslator_translate_to', $workspace_id );
            }
        }
        if (! $to ) return;
        if ( isset( $table ) && $table->name == 'mt_dic' && !$app->param( 'id' ) ) {
            $param['dict_language'] = $to;
        }
        $ctx = $app->ctx;
        $editor_buttons = isset( $ctx->vars['editor_buttons'] ) ? $ctx->vars['editor_buttons'] : '';
        $tinymce_version = (int)$app->tinymce_version;
        $ctx->vars['mstranslate_assets_base'] = $app->mstranslate_assets_base;
        if ( $tinymce_version && $tinymce_version == 4 ) {
            $editor_tmpl = $app->ctx->get_template_path( 'machinetranslator_editor_button_4.tmpl' );
        } else {
            $editor_tmpl = $app->ctx->get_template_path( 'machinetranslator_editor_button.tmpl' );
        }
        $editor_buttons .= $app->build( file_get_contents( $editor_tmpl ) );
        $ctx->vars['editor_buttons'] = $editor_buttons;
        if ( $app->mode === 'simplifiedjapanese_helper' ) {
            $component = $app->component( 'SimplifiedJapanese' );
            if (! $component ) {
                return true;
            }
            $show_editor = $component->get_config_value( 'simplifiedjapanese_translate', $workspace_id );
            if (! $show_editor ) {
                return true;
            }
        }
        $screen_tmpl = $app->ctx->get_template_path( 'machinetranslator_screen_button.tmpl' );
        $screen_tmpl = file_get_contents( $screen_tmpl );
        $ctx->vars['mt-language'] = $to;
        $ctx->vars['mt-language-to'] = $to;
        $ctx->vars['mt-language-from'] = $from ? $from : 'auto';
        if ( strpos( $tmpl, '<mt:var name="add_footer">' ) !== false ) {
            $tmpl = str_replace( '<mt:var name="add_footer">', '<mt:var name="add_footer">' . $screen_tmpl, $tmpl );
        } else {
            $tmpl = str_replace( '<mt:var name="add_edit_action_bar">', '<mt:var name="add_edit_action_bar">' . $screen_tmpl, $tmpl );
        }
        return true;
    }
}