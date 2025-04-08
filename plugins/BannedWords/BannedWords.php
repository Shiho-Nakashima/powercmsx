<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class BannedWords extends PTPlugin {

    public $check_tags          = false;
    public $rules               = [];
    public $mapping             = [];
    public $force               = false;
    private $convert_alphabet   = false;
    private $convert_number     = false;
    private $convert_kana       = false;
    private $convert_date       = false;
    private $convert_time       = false;
    private $convert_twelve_hour= false;
    private $convert_non_common = false;
    private $convert_ra_nuki    = false;
    private $convert_sa_ire     = false;
    private $convert_go_on      = false;
    private $convert_variante   = false;
    private $convert_conjunction= false;
    private $convert_adverb     = false;
    private $remove_adverb      = false;
    private $convert_suffixes   = false;
    private $convert_wareki     = false;
    private $convert_kana_end   = false;
    private $convert_sentence_end = false;
    private $convert_ambiguous  = false;
    private $convert_maybe      = false;
    private $convert_possible_verbs = false;
    private $allow_end_nominal  = false;
    private $notation_check     = true;
    private $normalize          = false;
    private $exclude_quote      = false;
    private $exclude_cite       = false;
    private $remove_final_particle = false;
    private $SimplifiedJapanese = null;
    private $sentence_end_class = null;
    private $mecab              = null;
    private $kanji_level        = 0;
    private $ty_long_sound      = 0;
    private $convert_diff       = true;

    function __construct () {
        parent::__construct();
    }

    const PT_POSSIBLE_VERBS = [
        '会える' => '会う', '買える' => '買う', '扱える' => '扱う', '行ける' => '行く', '書ける' => '書く', '買える' => '買う',
        '歩ける' => '歩く', '走れる' => '走る', '漕げる' => '漕ぐ', '研げる' => '研ぐ', '泳げる' => '泳ぐ', '貸せる' => '貸す',
        '足せる' => '足す', '起こせる' => '起こす', '打てる' => '打つ', '死ねる' => '死ぬ', '飛べる' => '飛ぶ', '呼べる' => '呼ぶ',
        '遊べる' => '遊ぶ', '編める' => '編む', '積める' => '積む', '楽しめる' => '楽しむ', '釣れる' => '釣る', '練れる' => '練る',
        '戻せる' => '戻す', '言える' => '言う', '移せる' => '移す', '映せる' => '映す', '取れる' => '取る', 'とれる' => 'とる',
        '勝てる' => '勝つ', '使える' => '使う', '作れる' => '作る',
        '放てる' => '放つ', '蹴れる' => '蹴る', '止まれる' => '止まる',// IPA辞書にはない
    ];

    const PT_POSSIBLE_VERBS_STEM = [
        '会え' => '会う', '買え' => '買う', '扱え' => '扱う', '行け' => '行く', '書け' => '書く', '買え' => '買う',
        '歩け' => '歩く', '走れ' => '走る', '漕げ' => '漕ぐ', '研げ' => '研ぐ', '泳げ' => '泳ぐ', '貸せ' => '貸す',
        '足せ' => '足す', '起こせ' => '起こす', '打て' => '打つ', '死ね' => '死ぬ', '飛べ' => '飛ぶ', '呼べ' => '呼ぶ', 
        '遊べ' => '遊ぶ', '編め' => '編む', '積め' => '積む', '楽しめ' => '楽しむ', '釣れ' => '釣る', '吊れ' => '吊る',
        '練れ' => '練る', '泊まれ' => '泊まる', '放て' => '放つ', '蹴れ' => '蹴る', '止まれ' => '止まる', '貸せ' => '貸す',
        '戻せ' => '戻す', '言え' => '言う', '移せ' => '移す', '映せ' => '映す', '取れ' => '取る', 'とれ' => 'とる',
        '勝て' => '勝つ', '使え' => '使う', '作れ' => '作る',
    ];

    const ADVERB_EXCLUDES = [
        // 副詞,一般のみが対象で、副詞,助詞類接続は除外
        // 後ろの語が「助詞,副詞化」「助詞,連体化」の時は後ろの語も含める
        'やや' => 'も', // '当然' => ['だ', 'で'], 'しばし' => 'の', 'しばらく' => 'の',
    ];

    function activate ( $app, $plugin, $version, &$errors ) {
        $options = $app->db->model( 'option' )->load(
            ['key' => 'tinymce_toolbar', 'kind' => 'plugin_setting', 'extra' => 'tinymce'] );
        foreach ( $options as $option ) {
            $value = trim( $option->value );
            if ( stripos( $value, 'pt-proofread' ) === false ) {
                $option->value( $value . ' pt-proofread' );
                $option->save();
            }
        }
        return true;
    }

    function post_init ( $app, $force = false ) {
        if (! $force ) {
            if ( $app->id != 'Prototype' ) return;
            if ( $app->mode !== 'save' ) return;
            if ( $app->param( '_preview' ) ) return;
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $models = $this->get_config_value( 'bannedwords_models', $workspace_id );
        $models = explode( ',', $models );
        $model = $app->param( '_model' );
        if (! in_array( $model, $models ) && !$force ) {
            return;
        }
        $inheritance = $this->get_config_value( 'bannedwords_inheritance', $workspace_id );
        $cfg_workspace_id = $workspace_id;
        if ( $inheritance ) {
            $cfg_workspace_id = 0;
        }
        $only_editor = $this->get_config_value( 'bannedwords_only_editor', $cfg_workspace_id );
        if ( $only_editor && !$force ) {
            return;
        }
        $rules = trim( $this->get_config_value( 'bannedwords_rules', $cfg_workspace_id ) );
        $normalize = $this->get_config_value( 'bannedwords_convert_normalize', $cfg_workspace_id );
        $not_normalize = $this->get_config_value( 'bannedwords_not_normalize', $cfg_workspace_id );
        $force = $this->get_config_value( 'bannedwords_force', $cfg_workspace_id );
        $this->convert_alphabet = $this->get_config_value( 'bannedwords_convert_alphabet', $cfg_workspace_id );
        $this->convert_number = $this->get_config_value( 'bannedwords_convert_number', $cfg_workspace_id );
        $this->convert_kana = $this->get_config_value( 'bannedwords_convert_kana', $cfg_workspace_id );
        $this->convert_date = $this->get_config_value( 'bannedwords_convert_date', $cfg_workspace_id );
        $this->convert_time = $this->get_config_value( 'bannedwords_convert_time', $cfg_workspace_id );
        $this->convert_twelve_hour = $this->get_config_value( 'bannedwords_convert_twelve_hour', $cfg_workspace_id );
        $this->convert_non_common = $this->get_config_value( 'bannedwords_convert_non_common', $cfg_workspace_id );
        $this->convert_variante = $this->get_config_value( 'bannedwords_convert_variante', $cfg_workspace_id );
        $this->kanji_level = $this->get_config_value( 'bannedwords_convert_kanji_level', $cfg_workspace_id );
        $this->convert_conjunction = $this->get_config_value( 'bannedwords_convert_conjunction', $cfg_workspace_id );
        $this->convert_adverb = $this->get_config_value( 'bannedwords_convert_adverb', $cfg_workspace_id );
        $this->remove_adverb = $this->get_config_value( 'bannedwords_remove_adverb', $cfg_workspace_id );
        $this->convert_suffixes = $this->get_config_value( 'bannedwords_convert_suffixes', $cfg_workspace_id );
        $this->convert_wareki = $this->get_config_value( 'bannedwords_convert_wareki', $cfg_workspace_id );
        $this->convert_kana_end = $this->get_config_value( 'bannedwords_convert_kana_end', $cfg_workspace_id );
        $this->convert_sentence_end = $this->get_config_value( 'bannedwords_convert_sentence_end', $cfg_workspace_id );
        $this->convert_ambiguous = $this->get_config_value( 'bannedwords_ambiguous', $cfg_workspace_id );
        $this->convert_maybe = $this->get_config_value( 'bannedwords_convert_maybe', $cfg_workspace_id );
        $this->convert_possible_verbs = $this->get_config_value( 'bannedwords_convert_possible_verbs', $cfg_workspace_id );
        $this->allow_end_nominal = $this->get_config_value( 'bannedwords_allow_end_nominal', $cfg_workspace_id );
        $this->exclude_quote = $this->get_config_value( 'bannedwords_exclude_quote', $cfg_workspace_id );
        $this->exclude_cite = $this->get_config_value( 'bannedwords_exclude_cite', $cfg_workspace_id );
        $this->notation_check = $this->get_config_value( 'bannedwords_notation_check', $cfg_workspace_id );
        $this->convert_ra_nuki = $this->get_config_value( 'bannedwords_convert_ra_nuki', $cfg_workspace_id );
        $this->convert_sa_ire = $this->get_config_value( 'bannedwords_convert_sa_ire', $cfg_workspace_id );
        $this->convert_go_on = $this->get_config_value( 'bannedwords_convert_go_on', $cfg_workspace_id );
        $this->convert_diff = $this->get_config_value( 'bannedwords_convert_diff', $cfg_workspace_id );
        $this->remove_final_particle = $this->get_config_value( 'bannedwords_remove_final_particle', $cfg_workspace_id );
        $this->ty_long_sound = $this->get_config_value( 'bannedwords_ty_long_sound', $cfg_workspace_id );
        if ( $this->exclude_quote ) {
            $this->exclude_quote = preg_split( "/\s*,\s*/", trim( $this->exclude_quote ) );
        }
        $this->normalize = $normalize;
        if ( $rules ) {
            $rules = preg_replace( "/\r\n|\r/","\n", $rules );
            $rules = explode( "\n", $rules );
        } else {
            $rules = [];
        }
        require_once( __DIR__ . DS . 'lib' . DS . 'BannedWordsMap.php' );
        if ( $normalize ) {
            $bannedwords_map = PT_BANNEDWORDS_MAP;
            if ( $not_normalize ) {
                $not_normalize = PTUtil::mb_str_split( $not_normalize );
                foreach ( $not_normalize as $idx  ) {
                    unset( $bannedwords_map[ $idx ] );
                }
            }
            $bannedwords_map = array_values( $bannedwords_map );
            $rules = array_merge( $rules, $bannedwords_map );
        }
        self::sort_by_length( $rules, 1 );
        foreach ( $rules as $idx => $rule ) {
            $cond = preg_split( '/\s*,\s*/', $rule );
            $rule = $cond[0];
            $replace = isset( $cond[1] ) ? $cond[1] : '';
            if ( $rule === '　' ) {
                $replace = ' ';
            } else if ( $rule === '，' ) {
                $replace = ',';
            }
            $rules[ $rule ] = $replace;
            unset( $rules[ $idx ] );
        }
        $this->force = $force;
        $this->rules = $rules;
        if ( in_array( 'tag', $models ) ) {
            $this->check_tags = true;
        }
        $app->register_callback( $model, 'save_filter', 'save_filter_object', 1, $this );
        return true;
    }

    private function replace_table_text ( &$table, $_replace_block, $replaced_map ) {
        $table_data = $table['rows'];
        foreach ( $table_data as $index => $row ) {
            foreach ( $row as $row_index => $cell ) {
                if ( $cell['is_visible'] ) {
                    $replaced = $cell['value'];
                    $this->quote_quote( $replaced, $replaced_map );
                    foreach ( $_replace_block as $search => $ptn_replace ) {
                        $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                    }
                    $this->revert_quote( $replaced, $replaced_map );
                    $cell['value'] = $replaced;
                }
                $row[ $row_index ] = $cell;
            }
            $table_data[ $index ] = $row;
        }
        $table['rows'] = $table_data;
    }

    private function replace_container_text ( &$container, $_replace_block, $replaced_map ) {
        $blocks = $container['blocks'];
        foreach ( $blocks as $index => $data ) {
            if ( array_key_exists( 'containers', $data ) ) {
                foreach ( $data['containers'] as $inner_container_index => $inner_container ) {
                    $this->replace_container_text( $inner_container, $_replace_block, $replaced_map );
                    $data['containers'][ $inner_container_index ] = $inner_container;
                }
            } else if ( array_key_exists( 'fields', $data ) ) {
                foreach ( $data['fields'] as $field_index => $block ) {
                    foreach ( $block as $key => $value ) {
                        if (! in_array( $key, ['id', 'type', 'invalidMessages', 'invalid'] ) ) {
                            $replaced = $value;
                            $this->quote_quote( $replaced, $replaced_map );
                            foreach ( $_replace_block as $search => $ptn_replace ) {
                                $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                            }
                            $this->revert_quote( $replaced, $replaced_map );
                            $block[ $key ] = $replaced;
                        }
                    }
                    $data['fields'][ $field_index ] = $block;
                }
                $blocks[$index] = $data;
            } else if ( is_array( $data ) ) {
                foreach ( $data as $key => $value ) {
                    if ( is_array( $value ) && array_key_exists( 'num_columns', $value ) ) {
                        $this->replace_table_text( $value, $_replace_block, $replaced_map );
                        $data[ $key ] = $value;
                    }
                }
            }
            foreach ( $data as $key => $value ) {
                if (! is_array( $value )
                    && ! in_array( $key, ['id', 'type', 'invalidMessages', 'invalid', 'containers', 'fields'] )
                    && is_string( $value ) ) {
                    $replaced = $value;
                    if (! $value ) continue;
                    $this->quote_quote( $replaced, $replaced_map );
                    foreach ( $_replace_block as $search => $ptn_replace ) {
                        $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                    }
                    $this->revert_quote( $replaced, $replaced_map );
                    $data[ $key ] = $replaced;
                }
            }
            $blocks[ $index ] = $data;
        }
        $container['blocks'] = $blocks;
    }

    function save_filter_object ( &$cb, $app, $obj ) {
        $scheme  = $app->get_scheme_from_db( $obj->_model );
        $columns = $scheme['column_defs'];
        $edit_properties = $scheme['edit_properties'];
        $column_labels = $scheme['labels'];
        $excludes = ['text_format', 'basename', 'extra_path', 'rev_changed', 'rev_diff', 'rev_note', 'uuid'];
        $text_cols = [];
        $richtexts = [];
        $component_blocks = [];
        foreach ( $columns as $column => $props ) {
            if ( $props['type'] == 'string' || $props['type'] == 'text' ) {
                if (! isset( $edit_properties[ $column ] ) ) {
                    continue;
                } else if ( $edit_properties[ $column ] === 'selection' ) {
                    continue;
                } else if ( $edit_properties[ $column ] === 'component_blocks' ) {
                    $component_blocks[ $column ] = true;
                } else if ( $edit_properties[ $column ] === 'richtext' ) {
                    $richtexts[ $column ] = true;
                }
                if (! in_array( $column, $excludes ) ) {
                    $text_cols[] = $column;
                }
            }
        }
        $text_only = $cb['text_only'] ?? false;
        $result_only = $cb['result_only'] ?? false;
        $workspace_id = (int) $app->param( 'workspace_id' );
        $force = $this->force;
        $rules = $this->rules;
        $all_fields = PTUtil::get_fields( $obj, [], 'objects', true );
        if (! empty( $all_fields ) ) {
            $field_types = PTUtil::get_fields( $obj, [], 'types', true );
            $exclude_types = ['checkbox', 'checkboxes', 'radio', 'dropdown', 'tel',
                              'tel_separated', 'datetime', 'asset', 'assets',
                              'image', 'images', 'video', 'videos'];
            $counter = 0;
            foreach ( $field_types as $idx => $field_type ) {
                if ( in_array( $field_type['type'], $exclude_types ) ) {
                    unset( $all_fields[ $counter ] );
                }
                $counter++;
            }
        }
        $banned_words = [];
        $hilight_ids = [];
        $replace_map = [];
        $replace_columns = $app->param( 'banned_words_replace_columns' );
        $replace_chars = [];
        $replace_column_map = [];
        if ( !empty( $replace_columns ) ) {
            foreach ( $replace_columns as $replace_column ) {
                list( $cName, $sName, $eName ) = explode( ',', $replace_column );
                if ( mb_strlen( $sName ) === 1 ) {
                    $replace_chars[ $sName ] = true;
                }
                $map_data = $replace_column_map[ $cName ] ?? [];
                $map_data[] = [ $sName, $eName ];
                $replace_column_map[ $cName ] = $map_data;
            }
            foreach ( $replace_columns as $idx => $replace_column ) {
                $items = explode( ',', $replace_column );
                $replace_columns[ $replace_column ] = strlen( $items[1] );
                unset( $replace_columns[ $idx ] );
            }
            arsort( $replace_columns );
            $replace_columns = array_keys( $replace_columns );
            $cnames = [];
            foreach ( $replace_columns as $replace_params ) {
                list( $cName, $sName, $eName ) = explode( ',', $replace_params );
                $cnames[ $cName ] = true;
                $data = $obj->$cName;
                $data = str_replace( $sName, $eName, $data );
                $obj->$cName( $data );
            }
            foreach ( $cnames as $text_col => $bool ) {
                $_POST[ $text_col ] = $obj->$text_col;
                $_REQUEST[ $text_col ] = $obj->$text_col;
            }
        }
        $patterns = [];
        if ( $this->convert_date ) {
            $patterns['![^0-9]*([0-9]{4,}/[0-9]{1,2}/[0-9]{1,})[^0-9]*!'] =
                      ['pattern' => '!([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})!',
                       'replace' => '$1年$2月$3日', 'date' => true, 'delimiter' => '/'];
        }
        if ( $this->convert_time ) {
            $patterns['![^0-9]*([0-9]{1,2}:[0-9]{1,2}:*[0-9]{0,2})[^0-9]*!'] =
                      ['pattern' => '!([0-9]{1,2}):([0-9]{1,2}):*([0-9]{0,2})!',
                       'replace' => '$1時$2分$3秒', 'time' => true, 'delimiter' => ':'];
        }
        if ( $this->convert_kana ) {
            $patterns['/([ｦ-ﾟｰ]+)/u'] = ['pattern' => '/[ｦ-ﾟｰ]+/u','mb_convert_kana' => 'KV'];
        }
        if ( $this->convert_alphabet ) {
            $patterns['/([ａ-ｚＡ-Ｚ]+)/u'] = ['pattern' => '/[ａ-ｚＡ-Ｚ]+/u','mb_convert_kana' => 'r'];
        }
        if ( $this->convert_number ) {
            $patterns['/([０-９]+)/u'] = ['pattern' => '/[０-９]+/u','mb_convert_kana' => 'n'];
        }
        if ( $this->convert_wareki ) {
            $patterns['/((?:明治|大正|昭和|平成|令和)[0-9０-９元一二三四五六七八九十〇]+年)/u'] =
                        ['pattern' => '/((?:明治|大正|昭和|平成|令和)[0-9０-９元一二三四五六七八九十〇]+年)/u',
                         'wareki' => true];
        }
        $plugin = $app->component( 'SimplifiedJapanese' );
        if ( $plugin && ! $plugin->get_command( 'mecab' ) ) {
            $plugin = null;
        }
        if ( $plugin ) {
            if ( PTUtil::property_exists( $app, 'bannedwords_mecab_dic_path' ) ) {
                $this->mecab = $plugin->get_mecab( $app, $workspace_id, true, null, $app->bannedwords_mecab_dic_path );
            } else {
                $this->mecab = $plugin->get_mecab( $app, $workspace_id );
            }
        }
        if ( $this->convert_sentence_end ) {
            require_once( $this->path() . DS . 'lib'. DS . 'PTSentenceEnd.php' );
            $this->sentence_end_class = new PTSentenceEnd();
            $this->sentence_end_class->allow_end_nominal = $this->allow_end_nominal;
            $this->sentence_end_class->ambiguous = $this->convert_ambiguous;
            $this->sentence_end_class->remove_final_particle = $this->remove_final_particle;
            $this->sentence_end_class->mecab = $this->mecab;
            $this->sentence_end_class->maybe = $this->convert_maybe;
        }
        $this->SimplifiedJapanese = $plugin;
        $kanji = new PTKanjiCharacters();
        $_pattern = PTKanjiCharacters::PT_KANJI_PATTERN;
        $_patterns = PTKanjiCharacters::PT_KANJIS_PATTERN;
        $characters = PTKanjiCharacters::PT_KANJI_CHARACTERS;
        $variante_map = $this->convert_variante ? PTKanjiCharacters::PT_KANJI_VARIANTE_MAP : [];
        $kanji_level = (int) $this->kanji_level;
        $variante_chars = 0;
        $texts = [];
        if ( $this->notation_check && $plugin ) {
            foreach ( $text_cols as $text_col ) {
                if (! $obj->$text_col ) continue;
                if ( ! trim( $obj->$text_col ) ) continue;
                $texts[] = $obj->$text_col;
            }
            foreach ( $all_fields as $field ) {
                $param_name = $field->basename . '__c';
                $params = $app->param( $param_name );
                if (! $params ) {
                    continue;
                }
                $value = '';
                if ( is_array( $params ) ) {
                    foreach ( $params as $param ) {
                        if (! $param ) continue;
                        $json = json_decode( $param, true );
                        if (! is_array( $json ) ) continue;
                        $keys = array_keys( $json );
                        foreach ( $keys as $key ) {
                            $value .= $json[ $key ];
                        }
                    }
                } else {
                    $json = json_decode( $params, true );
                    if (! is_array( $json ) ) continue;
                    $keys = array_keys( $json );
                    foreach ( $keys as $key ) {
                        $value .= $json[ $key ];
                    }
                }
                if (! trim( $value ) ) {
                    continue;
                }
                $texts[] = $value;
            }
            $this->notation_check( $texts, $patterns, $_pattern, $app );
        }
        function explore_table ( $table ) {
            $text = '';
            $table_data = $table['rows'];
            foreach ( $table_data as $row ) {
                foreach ( $row as $cell ) {
                    if ( $cell['is_visible'] ) {
                        $text .= $cell['value'] . ' ';
                    }
                }
            }
            return $text;
        }
        function explore_container ( $container ) {
            $text = '';
            $blocks = $container['blocks'];
            foreach ( $blocks as $data ) {
                if ( array_key_exists( 'containers', $data ) ) {
                    foreach ( $data['containers'] as $container ) {
                        $text .= explore_container( $container );
                    }
                } else if ( array_key_exists( 'fields', $data ) ) {
                    foreach ( $data['fields'] as $block ) {
                        unset( $block['id'], $block['type'], $block['invalidMessages'], $block['invalid'] );
                        $text .= implode( ' ', array_values( $block ) ) . ' ';
                    }
                } else if ( is_array( $data ) ) {
                    foreach ( $data as $key => $value ) {
                        if ( is_array( $value ) && array_key_exists( 'num_columns', $value ) ) {
                            $text .= explore_table( $value );
                            unset( $data[$key] );
                        }
                    }
                }
                unset( $data['id'], $data['type'], $data['invalidMessages'], $data['invalid'], $data['containers'], $data['fields'] );
                $text .= implode( ' ', array_values( $data ) ) . ' ';
            }
            return $text;
        }
        foreach ( $text_cols as $text_col ) {
            if (! trim( $obj->$text_col ) ) continue;
            $column_label = $text_col;
            $check_text = $obj->$text_col;
            $original_text = $check_text;
            $block_json = [];
            if ( isset( $component_blocks[ $text_col ] ) ) {
                $block_json = json_decode( $check_text, true );
                if (! is_array( $block_json ) ) continue;
                $text = '';
                foreach ( $block_json as $data ) {
                    unset( $data['id'], $data['type'], $data['invalidMessages'], $data['invalid'] );
                    foreach ( $data as $idx => $value ) {
                        if ( is_array( $value ) && array_key_exists( 'num_columns', $value ) ) {
                            // NOTE: テーブル
                            $text .= explore_table( $value );
                            unset( $data[ $idx ] );
                        } else if (! is_string( $value ) && is_array( $value ) ) {
                            foreach ( $value as $_idx => $_value ) {
                                if ( is_array( $_value ) && array_key_exists( 'blocks', $_value ) ) {
                                    // NOTE: コンテナ
                                    $text .= explore_container( $_value );
                                } else if ( is_array( $_value ) && array_key_exists( 'id', $_value ) ) {
                                    // NOTE: 繰り返しフィールドを対象とする（アセット等を除外）
                                    unset( $_value['id'] );
                                    $text .= implode( ' ', array_values( $_value ) ) . ' ';
                                }
                            }
                            unset( $data[ $idx ] );
                        }
                    }
                    $text .= implode( ' ', array_values( $data ) ) . ' ';
                }
                $check_text = $text;
                $original_text = $text;
            }
            if ( isset( $column_labels[ $text_col ] ) ) {
                $column_label = $app->translate( $column_labels[ $text_col ] );
            } else {
                $column_label = $app->translate( $app->translate( $text_col, '', $app, 'default' ) );
            }
            $replaced_map = [];
            if ( $plugin ) {
                // TODO::1文ずつに分割して解析したものをマージした方が良い
                // でも、僕らが絶対勝ちましょう! // <= 
                // 勝てれば、<= これが、かからなくなる
                $parses = $plugin->mecab_parse_simple( strip_tags( $check_text ), $this->mecab, true );
                if ( $this->remove_adverb ) {
                    if ( $text_only ) {
                        $this->remove_adverb( $parses, $patterns, $variante_chars, $replace_chars, $replaced_map, $original_text );
                    } else {
                        $this->remove_adverb( $parses, $patterns, $variante_chars, $replace_chars, $replaced_map, $check_text );
                    }
                }
                if ( $this->convert_non_common ) {
                    if ( $text_only ) {
                        $this->kanji_check( $parses, $patterns, $variante_chars, $replace_chars, $replaced_map, $original_text );
                    } else {
                        $this->kanji_check( $parses, $patterns, $variante_chars, $replace_chars, $replaced_map, $check_text );
                    }
                }
                if ( $this->convert_ra_nuki || $this->convert_sa_ire ) {
                    $this->convert_ra_nuki_sa_ire( $parses, $patterns );
                }
                if ( $this->convert_go_on ) {
                    $this->convert_go_on( $check_text, $patterns, $app );
                }
                if ( $this->ty_long_sound ) {
                    $this->ty_long_sound( $parses, $patterns, $app );
                }
                if ( $this->convert_possible_verbs ) {
                    $this->convert_possible_verbs( $parses, $patterns, $app );
                }
                if ( $this->convert_kana_end ) {
                    $this->okurigana_check( $check_text, $patterns, $app );
                }
                if ( $this->convert_twelve_hour ) {
                    $this->convert_twelve_hour( $check_text, $patterns, $app );
                }
            }
            $this->quote_quote( $check_text, $replaced_map );
            if ( $plugin && $this->convert_sentence_end ) {
                $this->convert_sentence_end( $check_text, $patterns, $this->convert_sentence_end, $replaced_map );
            }
            self::sort_by_length( $patterns, 2 );
            if ( isset( $replace_column_map[ $text_col ] ) && isset( $component_blocks[ $text_col ] ) ) {
                $replace_block = $replace_column_map[ $text_col ];
                $_replace_block = [];
                foreach ( $replace_block as $ptn_replace_data ) {
                    list( $search, $ptn_replace ) = $ptn_replace_data;
                    $search = preg_quote( $search, '/' );
                    $_replace_block[ $search ] = $ptn_replace;
                }
                self::sort_by_length( $_replace_block, 2 );
                foreach ( $block_json as $idx => $data ) {
                    foreach ( $data as $key => $v ) {
                        if ( $key === 'id' || $key === 'type' ) {
                            continue;
                        } else if (! is_string( $v ) && is_array( $v ) ) {
                            if ( array_key_exists( 'num_columns', $v ) ) {
                                $this->replace_table_text( $v, $_replace_block, $replaced_map );
                                $data[ $key ] = $v;
                            } else if ( $key === 'containers' ) {
                                foreach ( $v as $i => $container ) {
                                    $this->replace_container_text( $container, $_replace_block, $replaced_map );
                                    $v[$i] = $container;
                                }
                                $data[ $key ] = $v;
                            } else {
                                foreach ( $v as $i => $_v ) {
                                    foreach ( $_v as $_i => $__v ) {
                                        if ( $_i === 'id' ) {
                                            continue;
                                        }
                                        if ( is_string( $__v ) ) {
                                            $replaced = $__v;
                                            $this->quote_quote( $replaced, $replaced_map );
                                            foreach ( $_replace_block as $search => $ptn_replace ) {
                                                $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                                            }
                                            $this->revert_quote( $replaced, $replaced_map );
                                            $_v[ $_i ] = $replaced;
                                            $v[ $i ] = $_v;
                                        }
                                    }
                                }
                                $data[ $key ] = $v;
                                continue;
                            }
                        } else if ( is_string( $v ) ) {
                            $replaced = $v;
                            $this->quote_quote( $replaced, $replaced_map );
                            foreach ( $_replace_block as $search => $ptn_replace ) {
                                $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                            }
                            $this->revert_quote( $replaced, $replaced_map );
                            $data[ $key ] = $replaced;
                        }
                    }
                    $block_json[ $idx ] = $data;
                }
                $replaced = json_encode( $block_json, JSON_UNESCAPED_UNICODE );
                $obj->$text_col( $replaced );
                $_POST[ $text_col ] = $replaced;
                $_REQUEST[ $text_col ] = $replaced;
                continue;
            }
            foreach ( $patterns as $key => $data ) {
                $math_cnt = preg_match_all( $key, $check_text, $matchs );
                if ( $math_cnt ) {
                    $matchs = $matchs[1];
                    $m_replaced = [];
                    $invalid_kanji = $data['invalid_kanji'] ?? false;
                    $variante_char = $data['variante_char'] ?? false;
                    $word_part = $data['part'] ?? null;
                    $count_values = array_count_values( $matchs );
                    foreach ( $matchs as $match ) {
                        if ( isset( $m_replaced[ $match ] ) ) continue;
                        $m_replaced[ $match ] = true;
                        $ptn_replace = $this->replace_patterns( $match, $data, $word_part );
                        if (! $ptn_replace && $ptn_replace !== '0' ) continue;
                        $continue = false;
                        if ( is_array( $replace_columns ) ) {
                            foreach ( $replace_columns as $replace_column ) {
                                $replace_column = explode( ',', $replace_column );
                                if ( $replace_column[0] == $text_col && $replace_column[1] == $match ) {
                                    $continue = true;
                                    break;
                                }
                            }
                            if ( $continue ) {
                                $search = preg_quote( $match, '/' );
                                if ( isset( $component_blocks[ $text_col ] ) ) {
                                    foreach ( $block_json as $idx => $data ) {
                                        foreach ( $data as $key => $v ) {
                                            if ( $key === 'id' || $key === 'type' ) {
                                                continue;
                                            } else if (! is_string( $v ) && is_array( $v ) ) {
                                                foreach ( $v as $i => $_v ) {
                                                    foreach ( $_v as $_i => $__v ) {
                                                        if ( $_i === 'id' ) {
                                                            continue;
                                                        }
                                                        if ( is_string( $__v ) ) {
                                                            $replaced = $__v;
                                                            $this->quote_quote( $replaced, $replaced_map );
                                                            $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                                                            $this->revert_quote( $replaced, $replaced_map );
                                                            $_v[ $_i ] = $replaced;
                                                            $v[ $i ] = $_v;
                                                        }
                                                    }
                                                }
                                                $data[ $key ] = $v;
                                                continue;
                                            } else {
                                                $replaced = $v;
                                                $this->quote_quote( $replaced, $replaced_map );
                                                $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                                                $this->revert_quote( $replaced, $replaced_map );
                                                $data[ $key ] = $replaced;
                                            }
                                        }
                                        $block_json[ $idx ] = $data;
                                    }
                                    $replaced = json_encode( $block_json, JSON_UNESCAPED_UNICODE );
                                    $obj->$text_col( $replaced );
                                    $_POST[ $text_col ] = $replaced;
                                    $_REQUEST[ $text_col ] = $replaced;
                                } else {
                                    $replaced = $obj->$text_col;
                                    $this->quote_quote( $replaced, $replaced_map );
                                    $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                                    $this->revert_quote( $replaced, $replaced_map );
                                    $obj->$text_col( $replaced );
                                    $_POST[ $text_col ] = $replaced;
                                    $_REQUEST[ $text_col ] = $replaced;
                                }
                                continue;
                            }
                        }
                        if ( stripos( $check_text, $match ) !== false ) {
                            $words = isset( $banned_words[ $text_col ] ) ? $banned_words[ $text_col ] : [];
                            $words[ $match ] = $count_values[ $match ];
                            $banned_words[ $text_col ] = $words;
                            if ( isset( $component_blocks[ $text_col ] ) ) {
                                $hilight_ids["#{$text_col}-wrapper .card-body"] = true;
                            } else if ( isset( $richtexts[ $text_col ] ) ) {
                                $hilight_ids["#editor-{$text_col}-wrapper"] = true;
                            } else {
                                $hilight_ids["#{$text_col}" ] = true;
                            }
                            $replace_vars = isset( $replace_map[ $text_col ] ) ? $replace_map[ $text_col ] : [];
                            $replace_vars[] =
                                ['banned_words_replace_field_name' => $column_label,
                                 'banned_words_replace_rule' => $match,
                                 'banned_words_replace_replace' => $ptn_replace,
                                 'banned_words_invalid_kanji_char' => $invalid_kanji,
                                 'banned_words_variante_char' => $variante_char,
                                 'banned_words_word_part' => $this->translate( $word_part ) ];
                            $replace_map[ $text_col ] = $replace_vars;
                        }
                    }
                }
            }
            foreach ( $rules as $rule => $replace ) {
                if (! $rule ) continue;
                if ( stripos( $obj->$text_col, $rule ) !== false ) {
                    $continue = false;
                    if ( is_array( $replace_columns ) ) {
                        foreach ( $replace_columns as $replace_column ) {
                            $replace_column = explode( ',', $replace_column );
                            if ( $replace_column[0] == $text_col && $replace_column[1] == $rule ) {
                                $continue = true;
                                break;
                            }
                        }
                        if ( $continue ) {
                            $replaced = $obj->$text_col;
                            $this->quote_quote( $replaced, $replaced_map );
                            $search = preg_quote( $rule, '/' );
                            $replaced = preg_replace( "/$search/si", $replace, $replaced );
                            $this->revert_quote( $replaced, $replaced_map );
                            $obj->$text_col( $replaced );
                            $_POST[ $text_col ] = $replaced;
                            $_REQUEST[ $text_col ] = $replaced;
                            continue;
                        }
                    }
                }
                if ( stripos( $check_text, $rule ) !== false ) {
                    $words = isset( $banned_words[ $text_col ] ) ? $banned_words[ $text_col ] : [];
                    $words[ $rule ] = mb_substr_count( strtolower( $obj->$text_col ), strtolower( $rule ) );
                    $banned_words[ $text_col ] = $words;
                    $hilight_ids["#{$text_col}" ] = true;
                    $hilight_ids["#editor-{$text_col}-wrapper"] = true;
                    if ( $replace ) {
                        $replace_vars = isset( $replace_map[ $text_col ] ) ? $replace_map[ $text_col ] : [];
                        $replace_vars[] =
                            ['banned_words_replace_field_name' => $column_label,
                             'banned_words_replace_rule' => $rule,
                             'banned_words_replace_replace' => $replace,
                             'banned_words_invalid_kanji_char' => false,
                             'banned_words_variante_char' => false,
                             'banned_words_word_part' => null];
                        $replace_map[ $text_col ] = $replace_vars;
                    }
                }
            }
            if ( $text_only || $result_only ) {
                if ( $result_only ) {
                    if (! isset( $replace_vars ) ) {
                        return $original_text;
                    } else {
                        $this->quote_quote( $original_text, $replaced_map );
                        foreach ( $replace_vars as $replace_set ) {
                            $search = $replace_set['banned_words_replace_rule'];
                            $replace = $replace_set['banned_words_replace_replace'];
                            $original_text = str_replace( $search, $replace, $original_text );
                        }
                        $this->revert_quote( $original_text, $replaced_map );
                        return $original_text;
                    }
                }
                $raw_text = $original_text;
                $replaced_raw = $raw_text;
                $original_text = preg_replace( "/\r\n|\r/","\n", $original_text );
                if (! isset( $replace_vars ) ) {
                    return [
                        'original' => $original_text, 'replaced' => $original_text, 'results' => [],
                        'original_raw' => $raw_text, 'replaced_raw' => $replaced_raw
                    ];
                }
                if ( $this->convert_diff ) {
                    $original_text = preg_replace( '!<br\s*(/*)>([^\\n|<])!usi', '<br$1>' . "\n" . '$2', $original_text );
                }
                if ( $this->convert_diff == 1 ) {
                    $original_text = strip_tags( $original_text );
                    // センテンスごとに改行する
                    $original_text = preg_replace( '/([^。\?？！\!])(.*?)([。\?？！\!])([^\\n）」〉】＞》»\]\)])/usi', '$1$2$3' . "\n" . '$4', $original_text );
                }
                $replaced = $original_text;
                $this->quote_quote( $replaced_raw, $replaced_map );
                $this->quote_quote( $replaced, $replaced_map );
                $this->quote_quote( $original_text, $replaced_map );
                // 文字列長の長いものから置換する
                $replace_idx = [];
                foreach ( $replace_vars as $idx => $replace_set ) {
                    $replace_idx[ $idx ] = strlen( $replace_set['banned_words_replace_rule'] );
                }
                arsort( $replace_idx );
                $replace_vars_sorted = [];
                foreach ( $replace_idx as $key => $length ) {
                    $replace_vars_sorted[] = $replace_vars[ $key ];
                }
                foreach ( $replace_vars_sorted as $replace_set ) {
                    $org_replace = $replace_set['banned_words_replace_rule'];
                    $ptn_replace = $replace_set['banned_words_replace_replace'];
                    $check_text = $replaced_raw;
                    $replaced_raw = str_replace( $org_replace, $ptn_replace, $replaced_raw );
                    
                    if ( $check_text != $replaced_raw ) {
                        // TODO::極めて強まっている。(副詞+文末などで重複する時) $replacedが変わらない場合がある
                        // $ptn_replace = " {$ptn_replace} ";
                        $replaced = str_replace( $org_replace, $ptn_replace, $replaced );
                        // $sp_org_replace = " {$org_replace} ";
                        $sp_org_replace = $org_replace;
                        $original_text = str_replace( $org_replace, $sp_org_replace, $original_text );
                    }
                }
                $this->revert_quote( $original_text, $replaced_map );
                $this->revert_quote( $raw_text, $replaced_map );
                $this->revert_quote( $replaced_raw, $replaced_map );
                $this->revert_quote( $replaced, $replaced_map );
                // Replace in quote again.
                $this->revert_quote( $original_text, $replaced_map );
                $this->revert_quote( $raw_text, $replaced_map );
                $this->revert_quote( $replaced_raw, $replaced_map );
                $this->revert_quote( $replaced, $replaced_map );
                $original_text = html_entity_decode( $original_text );
                $replaced = html_entity_decode( $replaced );
                $raw_text = html_entity_decode( $raw_text );
                $replaced_raw = html_entity_decode( $replaced_raw );
                $results = [
                    'original' => $original_text, 'replaced' => $replaced, 'results' => $replace_vars,
                    'original_raw' => $raw_text, 'replaced_raw' => $replaced_raw
                ];
                return $results;
            }
        }
        $_banned_words = [];
        foreach ( $banned_words as $column_name => $error ) {
            if ( isset( $column_labels[ $column_name ] ) ) {
                $column_name = $app->translate( $column_labels[ $column_name ] );
            } else {
                $column_name = $app->translate( $app->translate( $column_name, '', $app, 'default' ) );
            }
            $_banned_words[ $column_name ] = $error;
        }
        $banned_words = $_banned_words;
        if ( $this->check_tags ) {
            if ( $tags = $app->param( 'additional_tags' ) ) {
                $replaced_map = [];
                $check_text = $tags;
                if ( $plugin ) {
                    $parses = $plugin->mecab_parse_simple( $tags, $this->mecab, true );
                    if ( $this->remove_adverb ) {
                        $this->remove_adverb( $parses, $patterns, $variante_chars, $replace_chars, $replaced_map, $check_text );
                    }
                    if ( $this->convert_non_common ) {
                        $this->kanji_check( $parses, $patterns, $variante_chars, $replace_chars, $replaced_map, $check_text );
                    }
                    if ( $this->convert_ra_nuki || $this->convert_sa_ire ) {
                        $this->convert_ra_nuki_sa_ire( $parses, $patterns );
                    }
                    if ( $this->convert_kana_end ) {
                        $this->okurigana_check( $tags, $patterns, $app );
                    }
                    if ( $this->convert_go_on ) {
                        $this->convert_go_on( $tags, $patterns, $app );
                    }
                }
                $this->quote_quote( $check_text, $replaced_map );
                self::sort_by_length( $patterns, 2 );
                foreach ( $patterns as $key => $data ) {
                    $math_cnt = preg_match_all( $key, $check_text, $matchs );
                    if ( $math_cnt ) {
                        $matchs = $matchs[1];
                        $m_replaced = [];
                        $invalid_kanji = $data['invalid_kanji'] ?? false;
                        $variante_char = $data['variante_char'] ?? false;
                        $word_part = $data['part'] ?? null;
                        $word_part = $data['part'] ?? null;
                        $count_values = array_count_values( $matchs );
                        foreach ( $matchs as $match ) {
                            if ( isset( $m_replaced[ $match ] ) ) continue;
                            $m_replaced[ $match ] = true;
                            $ptn_replace = $this->replace_patterns( $match, $data, $word_part );
                            if (! $ptn_replace && $ptn_replace !== '0' ) continue;
                            $continue = false;
                            if ( is_array( $replace_columns ) ) {
                                foreach ( $replace_columns as $replace_column ) {
                                    $replace_column = explode( ',', $replace_column );
                                    if ( $replace_column[0] == 'additional_tags' && $replace_column[1] == $match ) {
                                        $continue = true;
                                        break;
                                    }
                                }
                            }
                            if ( $continue ) {
                                $replaced = $tags;
                                $this->quote_quote( $replaced, $replaced_map );
                                $search = preg_quote( $match, '/' );
                                $replaced = preg_replace( "/$search/si", $ptn_replace, $replaced );
                                $this->revert_quote( $replaced, $replaced_map );
                                $tags = $replaced;
                                continue;
                            }
                            if ( stripos( $check_text, $match ) !== false ) {
                                if ( isset( $banned_words[ $app->translate( 'Tag' ) ] ) ) {
                                    $banned_words[ $app->translate( 'Tag' ) ][ $match ] = 1;
                                } else {
                                    $banned_words[ $app->translate( 'Tag' ) ] = [ $match => 1 ];
                                }
                                $hilight_ids['#additional_tags'] = true;
                                if ( $replace ) {
                                    $replace_vars = isset( $replace_map['additional_tags'] ) ? $replace_map['additional_tags'] : [];
                                    $replace_vars[] =
                                    ['banned_words_replace_field_name' => $app->translate( 'Tag' ),
                                     'banned_words_replace_rule' => $match,
                                     'banned_words_replace_replace' => $ptn_replace,
                                     'banned_words_invalid_kanji_char' => $invalid_kanji,
                                     'banned_words_variante_char' => $variante_char,
                                     'banned_words_word_part' => $this->translate( $word_part ) ];
                                    $replace_map['additional_tags'] = $replace_vars;
                                }
                            }
                        }
                    }
                    $_POST['additional_tags'] = $tags;
                    $_REQUEST['additional_tags'] = $tags;
                    $app->param( 'additional_tags', $tags );
                    $cb['add_tags'] = preg_split( '/\s*,\s*/', $tags );
                }
                foreach ( $rules as $rule => $replace ) {
                    if (! $rule ) continue;
                    if ( stripos( $check_text, $rule ) !== false ) {
                        $continue = false;
                        if ( is_array( $replace_columns ) ) {
                            foreach ( $replace_columns as $replace_column ) {
                                $replace_column = explode( ',', $replace_column );
                                if ( $replace_column[0] == 'additional_tags' && $replace_column[1] == $rule ) {
                                    $continue = true;
                                    break;
                                }
                            }
                        }
                        if ( $continue ) {
                            $replaced = $tags;
                            $this->quote_quote( $replaced, $replaced_map );
                            $search = preg_quote( $rule, '/' );
                            $replaced = preg_replace( "/$search/si", $replace, $replaced );
                            $this->revert_quote( $replaced, $replaced_map );
                            $tags = $replaced;
                            continue;
                        }
                    }
                    if ( stripos( $check_text, $rule ) !== false ) {
                        if ( isset( $banned_words[ $app->translate( 'Tag' ) ] ) ) {
                            $banned_words[ $app->translate( 'Tag' ) ][ $rule ] = 1;
                        } else {
                            $banned_words[ $app->translate( 'Tag' ) ] = [ $rule => 1 ];
                        }
                        $hilight_ids['#additional_tags'] = true;
                        if ( $replace ) {
                            $replace_vars = isset( $replace_map['additional_tags'] ) ? $replace_map['additional_tags'] : [];
                            $replace_vars[] =
                            ['banned_words_replace_field_name' => $app->translate( 'Tag' ),
                             'banned_words_replace_rule' => $rule,
                             'banned_words_replace_replace' => $replace,
                             'banned_words_invalid_kanji_char' => false,
                             'banned_words_variante_char' => false,
                             'banned_words_word_part' => null];
                            $replace_map['additional_tags'] = $replace_vars;
                        }
                    }
                }
            }
        }
        foreach ( $all_fields as $field ) {
            $param_name = $field->basename . '__c';
            $params = $app->param( $param_name );
            if (! $params ) {
                continue;
            }
            $value = '';
            if ( is_array( $params ) ) {
                foreach ( $params as $param ) {
                    if (! $param ) continue;
                    $json = json_decode( $param, true );
                    if (! is_array( $json ) ) continue;
                    $keys = array_keys( $json );
                    foreach ( $keys as $key ) {
                        $value .= $json[ $key ];
                    }
                }
            } else {
                $json = json_decode( $params, true );
                if (! is_array( $json ) ) continue;
                $keys = array_keys( $json );
                foreach ( $keys as $key ) {
                    $value .= $json[ $key ];
                }
            }
            $field_name = $field->translate ? $app->translate( $field->name ) : $field->name;
            $field_basename = $field->basename;
            $column_label = $field_name;
            if ( isset( $column_labels[ $field_name ] ) ) {
                $column_label = $app->translate( $column_labels[ $field_name ] );
            } else {
                $column_label = $app->translate( $app->translate( $field_name, '', $app, 'default' ) );
            }
            $replaced_map = [];
            $check_text = $value;
            if ( $plugin ) {
                $parses = $plugin->mecab_parse_simple( strip_tags( $value ), $this->mecab, true );
                if ( $this->remove_adverb ) {
                    $this->remove_adverb( $parses, $patterns, $variante_chars, $replace_chars, $replaced_map, $check_text );
                }
                if ( $this->convert_non_common ) {
                    $this->kanji_check( $parses, $patterns, $variante_chars, $replace_chars, $replaced_map, $check_text );
                }
                if ( $this->convert_ra_nuki || $this->convert_sa_ire ) {
                    $this->convert_ra_nuki_sa_ire( $parses, $patterns );
                }
                if ( $this->convert_go_on ) {
                    $this->convert_go_on( $value, $parses, $app );
                }
                if ( $this->ty_long_sound ) {
                    $this->ty_long_sound( $parses, $patterns, $app );
                }
                if ( $this->convert_possible_verbs ) {
                    $this->convert_possible_verbs( $parses, $patterns, $app );
                }
                if ( $this->convert_kana_end ) {
                    $this->okurigana_check( $value, $patterns, $app );
                }
                if ( $this->convert_twelve_hour ) {
                    $this->convert_twelve_hour( $check_text, $patterns, $app );
                }
            }
            $this->quote_quote( $check_text, $replaced_map );
            if ( $plugin && $this->convert_sentence_end ) {
                $this->convert_sentence_end( $check_text, $patterns, $this->convert_sentence_end, $replaced_map );
            }
            self::sort_by_length( $patterns, 2 );
            foreach ( $patterns as $key => $data ) {
                $math_cnt = preg_match_all( $key, $check_text, $matchs );
                if ( $math_cnt ) {
                    $matchs = $matchs[1];
                    $m_replaced = [];
                    $invalid_kanji = $data['invalid_kanji'] ?? false;
                    $variante_char = $data['variante_char'] ?? false;
                    $word_part = $data['part'] ?? null;
                    $word_part = $data['part'] ?? null;
                    $count_values = array_count_values( $matchs );
                    foreach ( $matchs as $match ) {
                        if ( isset( $m_replaced[ $match ] ) ) continue;
                        $m_replaced[ $match ] = true;
                        $ptn_replace = $this->replace_patterns( $match, $data, $word_part );
                        if (! $ptn_replace && $ptn_replace !== '0' ) continue;
                        $continue = false;
                        if ( is_array( $replace_columns ) ) {
                            foreach ( $replace_columns as $replace_column ) {
                                $replace_column = explode( ',', $replace_column );
                                if ( $replace_column[0] == $param_name && $replace_column[1] == $match ) {
                                    $continue = true;
                                    break;
                                }
                            }
                        }
                        if ( $continue ) {
                            $value = '';
                            if ( is_array( $params ) ) {
                                $new_params = [];
                                $params = $app->param( $param_name );
                                foreach ( $params as $param ) {
                                    $json = json_decode( $param, true );
                                    $keys = array_keys( $json );
                                    $_new_params = [];
                                    foreach ( $keys as $key ) {
                                        $_value = $json[ $key ];
                                        $this->quote_quote( $_value, $replaced_map );
                                        if ( stripos( $_value, $match ) !== false ) {
                                            $search = preg_quote( $match, '/' );
                                            $_value = preg_replace( "/$search/si", $ptn_replace, $_value );
                                        }
                                        $this->revert_quote( $_value, $replaced_map );
                                        $value .= $_value;
                                        $new = [ $key => $_value ];
                                        $_new_params[] = $new;
                                    }
                                    $param = json_encode( $_new_params, JSON_UNESCAPED_UNICODE );
                                    $new_params[] = $param;
                                }
                                $params = $new_params;
                                $app->param( $param_name, $params );
                                $_POST[ $param_name ] = $params;
                                $_REQUEST[ $param_name ] = $params;
                            } else {
                                $json = json_decode( $params, true );
                                $keys = array_keys( $json );
                                $_new_params = [];
                                foreach ( $keys as $key ) {
                                    $_value = $json[ $key ];
                                    $this->quote_quote( $_value, $replaced_map );
                                    if ( stripos( $_value, $match ) !== false ) {
                                        $search = preg_quote( $match, '/' );
                                        $_value = preg_replace( "/$search/si", $ptn_replace, $_value );
                                    }
                                    $this->revert_quote( $_value, $replaced_map );
                                    $_new_params[ $key ] = $_value;
                                    $value .= $_value;
                                }
                                $params = json_encode( $_new_params, JSON_UNESCAPED_UNICODE );
                                $app->param( $param_name, $params );
                                $_POST[ $param_name ] = $params;
                                $_REQUEST[ $param_name ] = $params;
                            }
                            continue;
                        }
                        if ( stripos( $check_text, $match ) !== false ) {
                            $words = isset( $banned_words[ $field_name ] ) ? $banned_words[ $field_name ] : [];
                            $words[ $match ] = $count_values[ $match ];
                            $banned_words[ $field_name ] = $words;
                            $hilight_ids["#field-{$field_basename}-wrapper textarea"] = true;
                            $hilight_ids["#field-{$field_basename}-wrapper input"] = true;
                            $hilight_ids["#field-{$field_basename}-wrapper select"] = true;
                            $hilight_ids["#field-{$field_basename}-wrapper .cf-editor-wrapper"] = true;
                            $replace_vars = isset( $replace_map["{$field_basename}__c"] ) ? $replace_map["{$field_basename}__c"] : [];
                            $replace_vars[] = ['banned_words_replace_field_name' => $column_label,
                                 'banned_words_replace_rule' => $match,
                                 'banned_words_replace_replace' => $ptn_replace,
                                 'banned_words_invalid_kanji_char' => $invalid_kanji,
                                 'banned_words_variante_char' => $variante_char,
                                 'banned_words_word_part' => $this->translate( $word_part ) ];
                            $replace_map["{$field_basename}__c"] = $replace_vars;
                        }
                    }
                }
            }
            foreach ( $rules as $rule => $replace ) {
                if (! $rule ) continue;
                if ( stripos( $check_text, $rule ) !== false ) {
                    $continue = false;
                    if ( is_array( $replace_columns ) ) {
                        foreach ( $replace_columns as $replace_column ) {
                            $replace_column = explode( ',', $replace_column );
                            if ( $replace_column[0] == $param_name && $replace_column[1] == $rule ) {
                                $continue = true;
                                break;
                            }
                        }
                    }
                    if ( $continue ) {
                        $value = '';
                        if ( is_array( $params ) ) {
                            $new_params = [];
                            $params = $app->param( $param_name );
                            foreach ( $params as $param ) {
                                $json = json_decode( $param, true );
                                $keys = array_keys( $json );
                                $_new_params = [];
                                foreach ( $keys as $key ) {
                                    $_value = $json[ $key ];
                                    $this->quote_quote( $_value, $replaced_map );
                                    if ( stripos( $_value, $rule ) !== false ) {
                                        $search = preg_quote( $rule, '/' );
                                        $_value = preg_replace( "/$search/si", $replace, $_value );
                                    }
                                    $this->revert_quote( $_value, $replaced_map );
                                    $value .= $_value;
                                    $new = [ $key => $_value ];
                                    $_new_params[] = $new;
                                }
                                $param = json_encode( $_new_params, JSON_UNESCAPED_UNICODE );
                                $new_params[] = $param;
                            }
                            $params = $new_params;
                            $app->param( $param_name, $params );
                            $_POST[ $param_name ] = $params;
                            $_REQUEST[ $param_name ] = $params;
                        } else {
                            $json = json_decode( $params, true );
                            $keys = array_keys( $json );
                            $_new_params = [];
                            foreach ( $keys as $key ) {
                                $_value = $json[ $key ];
                                $this->quote_quote( $_value, $replaced_map );
                                if ( stripos( $_value, $rule ) !== false ) {
                                    $search = preg_quote( $rule, '/' );
                                    $_value = preg_replace( "/$search/si", $replace, $_value );
                                }
                                $this->revert_quote( $_value, $replaced_map );
                                $_new_params[ $key ] = $_value;
                                $value .= $_value;
                            }
                            $params = json_encode( $_new_params, JSON_UNESCAPED_UNICODE );
                            $app->param( $param_name, $params );
                            $_POST[ $param_name ] = $params;
                            $_REQUEST[ $param_name ] = $params;
                        }
                        continue;
                    }
                }
                if ( stripos( $check_text, $rule ) !== false ) {
                    $words = isset( $banned_words[ $field_name ] ) ? $banned_words[ $field_name ] : [];
                    $words[ $rule ] = mb_substr_count( strtolower( $value ), strtolower( $rule ) );
                    $banned_words[ $field_name ] = $words;
                    $hilight_ids["#field-{$field_basename}-wrapper textarea"] = true;
                    $hilight_ids["#field-{$field_basename}-wrapper input"] = true;
                    $hilight_ids["#field-{$field_basename}-wrapper select"] = true;
                    $hilight_ids["#field-{$field_basename}-wrapper .cf-editor-wrapper"] = true;
                    if ( $replace ) {
                        $replace_vars = isset( $replace_map["{$field_basename}__c"] ) ? $replace_map["{$field_basename}__c"] : [];
                        $replace_vars[] = ['banned_words_replace_field_name' => $column_label,
                             'banned_words_replace_rule' => $rule,
                             'banned_words_replace_replace' => $replace,
                             'banned_words_invalid_kanji_char' => false,
                             'banned_words_variante_char' => false,
                             'banned_words_word_part' => null];
                        $replace_map["{$field_basename}__c"] = $replace_vars;
                    }
                }
            }
        }
        if ( $variante_chars && is_array( $replace_columns ) && !empty( $replace_columns ) && !isset( $cb['retry'] ) ) {
            $cb['retry'] = true;
            $app->param( 'banned_words_ignore_uncheck', '' );
            $app->param( 'banned_words_replace_columns', '' );
            unset( $_REQUEST['banned_words_ignore_uncheck'], $_REQUEST['banned_words_replace_columns'] );
            unset( $_POST['banned_words_ignore_uncheck'], $_POST['banned_words_replace_columns'] );
            return $this->save_filter_object( $cb, $app, $obj );
        }
        $app->ctx->vars['banned_words_force'] = $force;
        $ignore_uncheck = $force ? 0 : $app->param( 'banned_words_ignore_uncheck' );
        if (! $ignore_uncheck && ! empty( $banned_words ) ) {
            $error_messages = [];
            $count_all = 0;
            foreach ( $banned_words as $column_name => $error ) {
                $keys = array_keys( $error );
                $values = array_values( $error );
                $count = 0;
                foreach ( $values as $value ) {
                    $count += $value;
                    $count_all+= $value;
                }
                $column_label = $column_name;
                if ( isset( $column_labels[ $column_name ] ) ) {
                    $column_label = $app->translate( $column_labels[ $column_name ] );
                } else {
                    $column_label = $app->translate( $app->translate( $column_name, '', $app, 'default' ) );
                }
                $words = implode( ', ', $keys );
                $words = $app->ctx->modifier_truncate( $words, '80+...', $app->ctx );
                if ( $count == 1 ) {
                    $error_messages[] = 
                    $this->translate( 'The %s contains %s suggestion for proofreading( %s ).', [ $column_label, $count, $words ] );
                } else {
                    $error_messages[] = 
                    $this->translate( 'The %s contains %s suggestions for proofreading( %s ).', [ $column_label, $count, $words ] );
                }
            }
            $cb['errors'] = array_merge( $cb['errors'], $error_messages );
            $tmpl = $this->path() . DS . 'tmpl' . DS . 'form_header.tmpl';
            $app->ctx->vars['banned_words_hilight_ids'] = array_keys( $hilight_ids );
            $app->ctx->vars['banned_words_prohibited_count'] = $count_all;
            $app->ctx->vars['banned_words_replace_map'] = $replace_map;
            $form_header = $app->ctx->build( file_get_contents( $tmpl ) );
            $form_header = isset( $app->ctx->vars['form_header'] ) && $app->ctx->vars['form_header']
                         ? $app->ctx->vars['form_header'] . $form_header : $form_header;
            $app->ctx->vars['form_header'] = $form_header;
            $tmpl = $this->path() . DS . 'tmpl' . DS . 'form_footer.tmpl';
            $form_footer = $app->ctx->build( file_get_contents( $tmpl ) );
            $form_footer = isset( $app->ctx->vars['form_footer'] ) && $app->ctx->vars['form_footer']
                         ? $app->ctx->vars['form_footer'] . $form_footer : $form_footer;
            $app->ctx->vars['form_footer'] = $form_footer;
            return false;
        }
        return true;
    }

    static function sort_by_length ( &$patterns, $type = 1 ) {
        if ( $type === 1 ) {
            array_multisort( array_map( 'strlen', $patterns ), SORT_DESC, $patterns );
            return $patterns;
        }
        $array = array_keys( $patterns );
        array_multisort( array_map( 'strlen', $array ), SORT_DESC, $array );
        $new_array = [];
        foreach ( $array as $item ) {
            $new_array[ $item ] = $patterns[ $item ];
        }
        $patterns = $new_array;
        return $patterns;
    }

    function editor_proofread ( $app ) {
        $workspace_id = (int) $app->param( 'workspace_id' );
        if ( $app->request_method === 'POST' ) {
            $content = file_get_contents( 'php://input' );
            if (! $content ) {
                return $app->json_error( $this->translate( 'An error occurred while proofreading the content.' ), 500 );
            }
            $json = json_decode( $content );
            if (!is_object( $json ) ) {
                return $app->json_error( $this->translate( 'An error occurred while proofreading the content.' ), 500 );
            }
            $magic_token = $json->magic_token;
            if ( $magic_token != $app->current_magic ) {
                $app->json_error( 'Invalid request.' );
            }
            $text = $json->text;
            $model = $json->_model;
            if (! $model ) $model = 'entry';
            $scheme  = $app->get_scheme_from_db( $model );
            $columns = $scheme['column_defs'];
            $edit_properties = $scheme['edit_properties'];
            $excludes = ['text_format', 'basename', 'extra_path', 'rev_changed', 'rev_diff', 'rev_note', 'uuid'];
            $text_col = null;
            foreach ( $columns as $column => $props ) {
                if ( $props['type'] == 'string' || $props['type'] == 'text' ) {
                    if (! isset( $edit_properties[ $column ] ) ) {
                        continue;
                    } else if ( $edit_properties[ $column ] === 'selection' ) {
                        continue;
                    }
                    if (! in_array( $column, $excludes ) ) {
                        $text_col = $column;
                        break;
                    }
                }
            }
            if (! $text_col ) {
                $app->json_error( 'Invalid request.' );
            }
            $this->post_init( $app, true );
            header( 'Content-type: application/json' );
            if ( $app->param( 'cmd' ) ) {
                $mode = $app->param( 'shift' ) ? 2 : 1;
                $has_pn = false;
                $result = $this->kanji_level_check( $text, $mode, $workspace_id, $app, $has_pn );
                echo json_encode( ['result' => $result, 'has_proper_nouns' => $has_pn ] );
                exit();
            }
            $obj = $app->db->model( $model )->new( [ $text_col => $text ] );
            $cb = ['text_only' => true];
            $result = $this->save_filter_object( $cb, $app, $obj );
            $text = $result['original'];
            $replaced = $result['replaced'];
            $replace_vars = $result['results'];
            $original_raw = $result['original_raw'];
            $replaced_raw = $result['replaced_raw'];
            $replace_idx = [];
            foreach ( $replace_vars as $idx => $replace_var ) {
                $rule = $replace_var['banned_words_replace_rule'];
                $replace_idx[ $idx ] = strpos( $text, $rule );
                if ( isset( $replace_var['banned_words_invalid_kanji_char'] ) && $replace_var['banned_words_invalid_kanji_char'] ) {
                    $level = $replace_var['banned_words_invalid_kanji_char'];
                    if ( $level == 7 ) {
                        $level = $this->translate( 'Junior high schooler student level' );
                    }
                    if ( $level == 8 ) {
                        $replace_var['banned_words_invalid_kanji_char'] = $this->translate( 'Other than Jōyōkanji' );
                    } else {
                        $replace_var['banned_words_invalid_kanji_char'] = $this->translate( 'Kanji level by grade' ) . " - {$level}";
                    }
                    $replace_vars[ $idx ] = $replace_var;
                }
            }
            asort( $replace_idx );
            $replace_vars_sorted = [];
            foreach ( $replace_idx as $idx => $pos ) {
                $replace_vars_sorted[] = $replace_vars[ $idx ];
            }
            // Diffを見やすくするためにスペースを挿入
            foreach ( $replace_vars_sorted as $replace_var ) {
                $rule = $replace_var['banned_words_replace_rule'];
                $replace = $replace_var['banned_words_replace_replace'];
                $text = str_replace( $rule, " {$rule} ", $text );
                $replaced = str_replace( $replace, " {$replace} ", $replaced );
            }
            echo json_encode( ['text' => $text, 'replaced' => $replaced, 'replace_vars' => json_encode( $replace_vars_sorted ),
                               'text_raw' => $original_raw, 'replaced_raw' => $replaced_raw ] );
            exit();
        }
        $param = [];
        $inheritance = $this->get_config_value( 'bannedwords_inheritance', $workspace_id );
        $cfg_workspace_id = $workspace_id;
        if ( $inheritance ) {
            $cfg_workspace_id = 0;
        }
        $editor_select = $this->get_config_value( 'bannedwords_editor_select', $cfg_workspace_id );
        $param['editor_select'] = $editor_select;
        $tmpl = $app->ctx->get_template_path( 'editor_proofread.tmpl' );
        echo $app->build_page( $tmpl, $param );
    }

    function apply_proofread ( $app ) {
        if ( $app->request_method === 'POST' ) {
            $content = file_get_contents( 'php://input' );
            if (! $content ) {
                return $app->json_error( $this->translate( 'An error occurred while proofreading the content.' ), 500 );
            }
            $app->validate_magic( true );
            header( 'Content-type: application/json' );
            $text = $app->param( 'text' );
            $corrections = $app->param( 'corrections' );
            $corrections_pair = [];
            foreach ( $corrections as $correction ) {
                $json = json_decode( $correction, true );
                $corrections_pair[ $json[0] ] = $json[1];
            }
            $replace_idx = [];
            foreach ( $corrections_pair as $search => $replace ) {
                $replace_idx[ $search ] = strlen( $search );
            }
            arsort( $replace_idx );
            $replace_vars_sorted = [];
            foreach ( $replace_idx as $key => $length ) {
                $replace_vars_sorted[ $key ] = $corrections_pair[ $key ];
            }
            foreach ( $replace_vars_sorted as $search => $replace ) {
                $text = str_replace( $search, $replace, $text );
            }
            echo json_encode( ['text' => $text ] );
            exit();
        }
    }

    function get_proofread_japanese ( $text, $kanji_level = 0 , $workspace_id = 0, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $_REQUEST['workspace_id'] = (int) $workspace_id;
        $_GET['workspace_id'] = (int) $workspace_id;
        $this->post_init( $app, true );
        $obj = $app->db->model( 'entry' )->new( ['text' => $text ] );
        $cb = ['result_only' => true];
        $this->kanji_level = $kanji_level;
        $result = $this->save_filter_object( $cb, $app, $obj );
        return $result;
    }

    function kanji_level_check ( $text, $type = 1, $workspace_id = 0, $app = null, &$has_pn = false ) {
        $app = $app ? $app : Prototype::get_instance();
        $plugin = $this->SimplifiedJapanese ? $this->SimplifiedJapanese : $app->component( 'SimplifiedJapanese' );
        if ( $plugin ) {
            if ( PTUtil::property_exists( $app, 'bannedwords_mecab_dic_path' ) ) {
                $this->mecab = $plugin->get_mecab( $app, $workspace_id, true, null, $app->bannedwords_mecab_dic_path );
            } else {
                $this->mecab = $plugin->get_mecab( $app, $workspace_id );
            }
        }
        if ( stripos( $text, '<ruby' ) !== false ) {
            $text = preg_replace( '!<rt[^>]*?>.*?</rt>!sui', '', $text );
            $text = preg_replace( '!<rp[^>]*?>.*?</rp>!sui', '', $text );
        }
        $text = trim( strip_tags( $text ) );
        $text = preg_replace( "/\r\n|\r|\n/",'', $text );
        $_pattern = PTKanjiCharacters::PT_KANJI_PATTERN;
        $_patterns = PTKanjiCharacters::PT_KANJIS_PATTERN;
        $characters = PTKanjiCharacters::PT_KANJI_CHARACTERS;
        $parses = $plugin->mecab_parse_simple( $text, $this->mecab, true );
        $levels = [];
        $labels = [
            1 => '1st grade',
            2 => '2nd grade',
            3 => '3rd grade',
            4 => '4th grade',
            5 => '5th grade',
            6 => '6th grade',
            7 => 'Junior high school',
            8 => 'Other than Jōyōkanji',
        ];
        $label_pairs = [];
        if ( '1st grade' !== $this->translate( '1st grade' ) ) {
            foreach ( $labels as $label ) {
                $label_pairs[ $label ] = $this->translate( $label );
            }
        }
        $replaced_map = [];
        if ( $type != 2 ) {
            // 固有名詞を除く
            foreach ( $parses as $parse ) {
                if ( $parse === 'EOS' ) continue;
                if ( is_array( $parse ) ) {
                    list( $word, $csv, $setting ) = $parse;
                } else {
                    list( $word, $setting ) = explode( "\t", $parse );
                    $csv = explode( ',', $setting );
                }
                if ( $csv[1] === '固有名詞' ) {
                    if ( preg_match( $_patterns, $word, $matchs ) ) {
                        $has_pn = true;
                        $magic = self::magic( $text, $tokens );
                        $replaced_map[ $magic ] = $word;
                        $text = str_replace( $word, $magic, $text );
                    }
                }
            }
        }
        foreach ( $parses as $parse ) {
            if ( $parse === 'EOS' ) continue;
            if ( is_array( $parse ) ) {
                list( $word, $csv, $setting ) = $parse;
            } else {
                list( $word, $setting ) = explode( "\t", $parse );
                $csv = explode( ',', $setting );
            }
            if ( preg_match_all( $_patterns, $word, $matchs ) ) {
                foreach ( $matchs[0] as $string ) {
                    $chars = PTUtil::mb_str_split( $string );
                    foreach ( $chars as $char ) {
                        $level = isset( $characters[ $char ] ) ? $characters[ $char ] : 8;
                        $levels[ $char ] = $level;
                    }
                }
            }
        }
        foreach ( $levels as $char => $level ) {
            $str = $labels[ $level ];
            $tag = "<span class='L{$level}'>{$char}<sup>{$str}</sup></span>";
            $text = str_replace( $char, $tag, $text );
        }
        foreach ( $labels as $idx => $label ) {
            $label = preg_quote( $label, '!' );
            $pattern = "(<span\sclass='L{$idx}'>(.)<sup>{$label}</sup></span>)";
            if ( preg_match_all( "!{$pattern}{2,}!u", $text, $matches ) ) {
                $continues = $matches[0];
                foreach ( $continues as $continue ) {
                    $char = preg_replace( '!<sup>.*?</sup>!', '', $continue );
                    $char = preg_replace( '!<span[^>]*?>!', '', $char );
                    $char = str_replace( '</span>', '', $char );
                    $str = $labels[ $idx ];
                    $tag = "<span class='L{$idx}'><u>{$char}</u><sup>{$str}</sup></span>";
                    $text = str_replace( $continue, $tag, $text );
                }
            }
        }
        if (!empty( $label_pairs ) ) {
            foreach ( $label_pairs as $str => $trans ) {
                $search = "<sup>{$str}</sup>";
                $replace = "<sup>{$trans}</sup>";
                $text = str_replace( $search, $replace, $text );
            }
        }
        if (!empty( $replaced_map ) ) {
            $str = $this->translate( 'Proper Nouns' );
            foreach ( $replaced_map as $search => $replace ) {
                if ( mb_strlen( $replace ) > 1 ) {
                    $tag = "<span class='PN'><u>{$replace}</u><sup>{$str}</sup></span>";
                } else {
                    $tag = "<span class='PN'>{$replace}<sup>{$str}</sup></span>";
                }
                $text = str_replace( $search, $tag, $text );
            }
        }
        $text .= '。';
        if ( preg_match_all( '/[^。\?？！\!].*?([。\?？！\!])/us', $text, $matchs ) ) {
            $retuning = '';
            foreach ( $matchs[0] as $idx => $match ) {
                $retuning.= $match . PHP_EOL;
            }
            $retuning = rtrim( $retuning, PHP_EOL );
            $retuning = str_replace( PHP_EOL, '<br>', $retuning );
            $text = $retuning;
        }
        // $text = preg_replace( '/。$/u', '', $text );
        return $text;
    }

    function insert_button ( $cb, $app, &$param, &$tmpl ) {
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $ctx = $app->ctx;
        $editor_buttons = isset( $ctx->vars['editor_buttons'] ) ? $ctx->vars['editor_buttons'] : '';
        $tinymce_version = (int)$app->tinymce_version;
        if ( $tinymce_version && $tinymce_version == 4 ) {
            $editor_tmpl = $app->ctx->get_template_path( 'bannedwords_editor_button_4.tmpl' );
        } else {
            $editor_tmpl = $app->ctx->get_template_path( 'bannedwords_editor_button.tmpl' );
        }
        $editor_buttons .= $app->build( file_get_contents( $editor_tmpl ) );
        $ctx->vars['editor_buttons'] = $editor_buttons;
        $custom_buttons = isset( $ctx->vars['custom_html_insert_buttons'] )
                        ? $ctx->vars['custom_html_insert_buttons'] : '';
        $editor_tmpl = $app->ctx->get_template_path( 'bannedwords-proofread-btn.tmpl' );
        // Require build in old version's alt-tmpl?
        $custom_buttons .= $app->fmgr->get( $editor_tmpl );
        $ctx->vars['custom_html_insert_buttons'] = $custom_buttons;
        return true;
    }
  
    function replace_patterns ( $match, $data, &$word_part ) {
        $m_search = $data['pattern'];
        $m_replace = $data['replace'] ?? '';
        $m_date = $data['date'] ?? false;
        $m_time = $data['time'] ?? false;
        $wareki = $data['wareki'] ?? false;
        $m_delimiter = $data['delimiter'] ?? null;
        $mb_convert_kana = $data['mb_convert_kana'] ?? null;
        if ( $m_date && $m_delimiter ) {
            list( $y, $m, $d ) = explode( $m_delimiter, $match );
            $y = (int) $y;
            $m = (int) $m;
            $d = (int) $d;
            if ( checkdate( $m, $d, $y ) === false ) return false;
            $word_part = 'Date';
        }
        if ( $m_time && $m_delimiter ) {
            list( $h, $i, $s ) = array_pad( explode( $m_delimiter, $match ), 3, null );
            if ( $h > 24 ) {
                return false;
            } else if ( $i > 59 ) {
                return;
            } else if ( $s && ( $s > 59 ) ) {
                return false;
            }
            if ( $s === null ) {
                $m_replace = '$1時$2分';
                $word_part = 'Time';
            } else {
                $m_replace = '$1時$2分$3秒';
                $word_part = 'Time';
            }
        }
        if ( $mb_convert_kana ) {
            $m_replace = mb_convert_kana( $match, $mb_convert_kana );
            if ( $mb_convert_kana == 'K' && 
               ( strpos( $m_replace, '゛' ) !== false || strpos( $m_replace, '゜' ) !== false ) ) {
                foreach ( PT_VOICED_MARKS_MAP as $voiced => $char ) {
                    if ( strpos( $m_replace, $voiced ) === false ) return false;
                    $m_replace = str_replace( $voiced, $char, $m_replace );
                }
            }
        }
        if ( $wareki ) {
            $ptn_replace = PTUtil::str_to_christian_era( $match );
            $word_part = 'Wareki';
        } else {
            $ptn_replace = preg_replace( $m_search, $m_replace, $match );
        }
        if ( $ptn_replace === $match ) {
            return null;
        }
        return $ptn_replace;
    }

    function notation_check ( $texts, &$patterns, $pattern, $app ) {
        $original = $this->mecab;
        $plugin = $this->SimplifiedJapanese;
        $dic_path = $plugin->path() . DS . 'dictionaries' . DS . 'notation.dic';
        // 表記統合辞書を利用する
        $mecab = $plugin->get_mecab( $app, 0, false, $dic_path );
        $notations = [];
        $replaced_map = [];
        foreach ( $texts as $text ) {
            $text = strip_tags( $text );
            $this->quote_quote( $check_text, $replaced_map );
            $parses = $plugin->mecab_parse_simple( $text, $mecab );
            foreach ( $parses as $parse ) {
                if ( $parse === 'EOS' ) continue;
                list( $word, $setting ) = explode( "\t", $parse );
                if (! preg_match( $pattern, $word ) && mb_strlen( $word ) < 4 ) {
                    continue;
                }
                $csv = explode( ',', $setting );
                if (! isset( $csv[9] ) ) continue;
                $notation = $csv[9];
                $alternative = $csv[10] ?? ''; // TODO::優先語を追加する
                $notations[ $notation ][ $word ] = $alternative;
            }
        }
        foreach ( $notations as $pattern => $results ) {
            if ( count( $results ) === 1 ) continue;
            // TODO::優先語を決めて、カウントが1でも続行する
            // $words = explode( '/', $pattern );
            // $first = array_shift( $words );
            reset( $results );
            $first = key( $results );
            // 最初に出現したものに統一する
            foreach ( $results as $word => $bool ) {
                if (! isset( $results[ $first ] ) ) {
                    $first = $word;
                } else if ( $bool ) {
                    // 辞書に任せる場合
                    // $first = $bool;
                }
                if ( $word !== $first ) {
                    if (! isset( $patterns["/({$word})/u"] ) ) {
                        $patterns["/({$word})/u"] =
                                      ['pattern' => "/{$word}/u",
                                       'replace' => $first,
                                       'part' => 'Spelling Wobble'];
                    }
                }
            }
        }
        $this->mecab = $original;
    }

    function ty_long_sound ( $parses, &$patterns, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $ty_long_sound = $this->ty_long_sound;
        foreach ( $parses as $idx => $parse ) {
            if ( $parse === 'EOS' ) continue;
            if ( is_array( $parse ) ) {
                list( $word, $csv, $setting ) = $parse;
            } else {
                list( $word, $setting ) = explode( "\t", $parse );
                $csv = explode( ',', $setting );
            }
            if ( strpos( $word, 'ティ' ) === false ) {
                continue;
            }
            if ( $ty_long_sound == 2 && preg_match( '/ティ$/u', $word ) ) {
                $replace = preg_replace( '/ティ$/u', 'ティー', $word );
                if (! isset( $patterns["/({$word})/u"] ) ) {
                    $patterns["/({$word})/u"] =
                                  ['pattern' => "/{$word}/u",
                                   'replace' => $replace,
                                   'part' => '-ty handling'];
                }
            } else if ( $ty_long_sound == 1 && preg_match( '/ティー$/u', $word ) ) {
                $replace = preg_replace( '/ティー$/u', 'ティ', $word );
                if (! isset( $patterns["/({$word})/u"] ) ) {
                    $patterns["/({$word})/u"] =
                                  ['pattern' => "/{$word}/u",
                                   'replace' => $replace,
                                   'part' => '-ty handling'];
                }
            }
        }
    }

    function convert_possible_verbs ( $parses, &$patterns, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $possible_verbs = self::PT_POSSIBLE_VERBS;
        $possible_verbs_stem = self::PT_POSSIBLE_VERBS_STEM;
        $type = $this->convert_sentence_end;
        if ( $type == 2 ) {
            $can = 'ことができる';
            $can_not = 'ことができない';
        } else {
            $can = 'ことができます';
            $can_not = 'ことができません';
        }
        $pre = '';
        foreach ( $parses as $idx => $parse ) {
            if ( $parse === 'EOS' ) continue;
            if ( is_array( $parse ) ) {
                list( $word, $csv, $setting ) = $parse;
            } else {
                list( $word, $setting ) = explode( "\t", $parse );
                $csv = explode( ',', $setting );
            }
            $original = $word;
            if ( isset( $possible_verbs_stem[ $word ] ) && $csv[0] === '動詞' &&
               ( $csv[5] === '連用形' || $csv[5] === '仮定形' ) ) {
                if ( isset( $parses[ $idx + 1] ) ) {
                    // あなたと会えますように
                    if ( $parses[ $idx + 1][0] === 'ます' && $parses[ $idx + 1][1][0] === '助動詞' ) {
                        $replace = $pre . $possible_verbs_stem[ $word ] . $can;
                        $word = $pre . $word . $parses[ $idx + 1][0];
                        if (! isset( $patterns["/({$word})/u"] ) ) {
                            $patterns["/({$word})/u"] =
                                          ['pattern' => "/{$word}/u",
                                           'replace' => $replace,
                                           'part' => 'Possible Verbs'];
                        }
                    } else if ( $parses[ $idx + 1][0] === 'ませ' && $parses[ $idx + 1][1][0] === '助動詞' ) {
                        if ( isset( $parses[ $idx + 2] ) && $parses[ $idx + 2][0] === 'ん' ) {
                            $replace = $pre . $possible_verbs_stem[ $word ] . $can_not;
                            $word = $pre . $word . $parses[ $idx + 1][0] . 'ん';
                            if (! isset( $patterns["/({$word})/u"] ) ) {
                                $patterns["/({$word})/u"] =
                                              ['pattern' => "/{$word}/u",
                                               'replace' => $replace,
                                               'part' => 'Possible Verbs'];
                            }
                        }
                    } else if ( $parses[ $idx + 1][0] === 'ば' && $parses[ $idx + 1][1][0] === '助詞' ) {
                        // 明日勝てれば、チームの雰囲気も変わりましょう。
                        $replace = $pre . $possible_verbs_stem[ $word ] . 'ことができれば';
                        $word = $pre . $word . $parses[ $idx + 1][0];
                        if (! isset( $patterns["/({$word})/u"] ) ) {
                            $patterns["/({$word})/u"] =
                                          ['pattern' => "/{$word}/u",
                                           'replace' => $replace,
                                           'part' => 'Possible Verbs'];
                        }
                    }
                }
            } else if ( isset( $possible_verbs[ $word ] ) && $csv[0] === '動詞' ) {
                if ( isset( $parses[ $idx + 1] ) && $parses[ $idx + 1][0] !== 'こと' ) {
                    // あなたと会えることを楽しみにしています。は言い換えられない
                    // 次の単語が「こと」かどうかをチェックする
                    $replace = $pre . $possible_verbs[ $word ] . 'ことができる' . $parses[ $idx + 1][0];
                    $word = $pre . $word . $parses[ $idx + 1][0];
                    if (! isset( $patterns["/({$word})/u"] ) ) {
                        $patterns["/({$word})/u"] =
                                      ['pattern' => "/{$word}/u",
                                       'replace' => $replace,
                                       'part' => 'Possible Verbs'];
                    }
                } else if ( isset( $parses[ $idx + 1] ) && $parses[ $idx + 1][0] === 'こと' && isset( $parses[ $idx + 2] ) ) {
                    if ( $parses[ $idx + 2] !== 'EOS' && $parses[ $idx + 2][1][0] === '助詞' ) {
                        $replace = $pre . $possible_verbs[ $word ] . 'ことができるの' . $parses[ $idx + 2][0];
                        $word = $pre . $word . $parses[ $idx + 1][0] . $parses[ $idx + 2][0];
                        if (! isset( $patterns["/({$word})/u"] ) ) {
                            $patterns["/({$word})/u"] =
                                          ['pattern' => "/{$word}/u",
                                           'replace' => $replace,
                                           'part' => 'Possible Verbs'];
                        }
                    }
                }
            }
            $pre = $original;
        }
    }

    function convert_go_on ( $text, &$patterns, $app = null ) {
        $text = strip_tags( $text );
        $replaced_map = [];
        $this->quote_quote( $text, $replaced_map );
        if ( strpos( $text, '御' ) === false ) return false;
        $contains = false;
        $original = $this->mecab;
        $plugin = $this->SimplifiedJapanese;
        $dic_path = $plugin->path() . DS . 'dictionaries' . DS . 'go_on.dic';
        // 御(ご・おん)辞書を利用する
        $mecab = $plugin->get_mecab( $app, 0, false, $dic_path );
        $go_ob_parses = $plugin->mecab_parse_simple( $text, $mecab );
        foreach ( $go_ob_parses as $idx => $parse ) {
            if ( $parse === 'EOS' ) continue;
            if ( strpos( $parse, '御' ) === false ) continue;
            list( $word, $setting ) = explode( "\t", $parse );
            $csv = explode( ',', $setting );
            if (! isset( $csv[9] ) ) continue;
            $contains = true;
            if (! isset( $patterns["/({$word})/u"] ) ) {
                $patterns["/({$word})/u"] =
                              ['pattern' => "/{$word}/u",
                               'replace' => $csv[9],
                               'part' => 'Prefix「御」'];
            }
        }
        $this->mecab = $original;
        return $contains;
    }

    function okurigana_check ( $text, &$patterns, $app ) {
        $app = $app ? $app : Prototype::get_instance();
        $original = $this->mecab;
        $plugin = $this->SimplifiedJapanese;
        if ( $this->convert_kana_end == 1 ) {
            // 公文書の送り仮名用辞書(省略パターン)を利用する
            $dic_path = $plugin->path() . DS . 'dictionaries' . DS . 'okurigana.dic';
        } else if ( $this->convert_kana_end == 2 ) {
            // 逆パターンの辞書を利用する
            $dic_path = $plugin->path() . DS . 'dictionaries' . DS . 'kouyoubun.dic';
        } else if ( $this->convert_kana_end == 3 && $app->bannedwords_kana_dic_path ) {
            // カスタム辞書を利用する
            $dic_path = $app->bannedwords_kana_dic_path;
        }
        if (! $dic_path ) {
            return;
        }
        $mecab = $plugin->get_mecab( $app, 0, false, $dic_path );
        $parses = $plugin->mecab_parse_simple( $text, $mecab );
        foreach ( $parses as $parse ) {
            if ( $parse === 'EOS' ) continue;
            list( $word, $setting ) = explode( "\t", $parse );
            $csv = explode( ',', $setting );
            if ( isset( $csv[9] ) && $csv[9] === 'OK' ) {
                $replace = $csv[6];
                if (! isset( $patterns["/({$word})/u"] ) ) {
                    $patterns["/({$word})/u"] =
                                  ['pattern' => "/{$word}/u",
                                   'replace' => $replace,
                                   'part' => 'Declensional Kana Ending'];
                }
            }
        }
        $this->mecab = $original;
    }

    function convert_twelve_hour ( $text, &$patterns, $app ) {
        $app = $app ? $app : Prototype::get_instance();
        $text = strip_tags( $text );
        $twelve_hours = [];
        if ( preg_match_all( '/[^。\?？！\!].*?([。\?？！\!])/us', $text, $matchs ) ) {
            foreach ( $matchs[0] as $match ) {
                $this->twelve_hour_notation( $match, $twelve_hours );
            }
        } else {
            $this->twelve_hour_notation( $text, $twelve_hours );
        }
        foreach ( $twelve_hours as $word => $replace ) {
            if (! isset( $patterns["/({$word})/u"] ) ) {
                $patterns["/({$word})/u"] =
                              ['pattern' => "/{$word}/u",
                               'replace' => $replace,
                               'part' => 'Hour Notation'];
            }
        }
    }

    function twelve_hour_notation ( $text, &$patterns = [], $recursive = false,
        $wrap = '', $local = [], $original = '' ) {
        if ( strpos( $text, '正午' ) !== false ) {
            $patterns['正午'] = '午後0時';
            $text = str_replace( '正午', '午後0時', $text );
        }
        if ( strpos( $text, '時' ) === false ) {
            return $text;
        }
        $original = $original ? $original : $text;
        if (! $wrap && $text ) {
            new PTKanjiCharacters();
            $variante_map = PTKanjiCharacters::PT_KANJI_VARIANTE_MAP;
            foreach ( $variante_map as $variante => $char ) {
                if ( mb_strpos( $text, $variante ) !== false ) {
                    $wrap = $variante;
                    break;
                }
            }
        }
        if (! $wrap ) {
            $wrap = ' ';
        }
        $plugin = $this->SimplifiedJapanese;
        // $morning = strpos( $original, '午前' ) === false && strpos( $original, '午後' ) === false ? '午前' : '';
        // $afternoon = strpos( $original, '午前' ) === false && strpos( $original, '午後' ) === false ? '午後' : '';
        $text = "{$wrap}{$text}";
        $math_cnt = preg_match_all( '/([お|真]{0,1}昼間{0,1}の{0,1}、{0,1})([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})時([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $hour > 17 ) {
                    // 11時〜15時、0時〜3時
                    continue;
                } else if ( $hour > 11 ) {
                    $hour-= 12;
                }
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::knum_to_num( $minute );
                if ( $minute > 59 ) continue;
                $replace = '午後' . $hour . '時' . $minute . '分';
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([お|真]{0,1}昼間{0,1}の{0,1}、{0,1})([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})(時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $hour > 17 ) {
                    // 11時〜15時、0時〜3時
                    continue;
                } else if ( $hour > 11 ) {
                    $hour-= 12;
                }
                if ( $plugin ) {
                    $matchs[4][ $idx ] = $this->hour_next( $match, $matchs[4][ $idx ], $plugin );
                }
                $replace = '午後' . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([お|真]{0,1}昼間{0,1}の{0,1}\s*)([0-9]{1,2}|[０-９]{1,2})時([０-９]{1,2})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                if ( $hour > 17 ) {
                    // 11時〜15時、0時〜3時
                    continue;
                } else if ( $hour > 11 ) {
                    $hour-= 12;
                }
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::normalize( $minute );
                $replace = '午後' . $hour . '時' . $minute . '分';
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([お|真]{0,1}昼間{0,1}の{0,1}\s*)([0-9]{1,2}|[０-９]{1,2})時([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                if ( $hour > 17 ) {
                    // 11時〜15時、0時〜3時
                    continue;
                } else if ( $hour > 11 ) {
                    $hour-= 12;
                }
                if ( $plugin ) {
                    $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                }
                $replace = '午後' . $hour . '時' . $matchs[3][ $idx ];
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/(夕方の{0,1}、{0,1})([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})時([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $hour > 19 || $hour < 3 ) {
                    // 概ね18時まで
                    continue;
                } else if ( $hour > 11 ) {
                    $hour-= 12;
                }
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::knum_to_num( $minute );
                if ( $minute > 59 ) continue;
                $replace = '午後' . $hour . '時' . $minute . '分';
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/(夕方の{0,1}、{0,1})([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})(時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $hour > 19 || $hour < 3 ) {
                    // 概ね18時まで
                    continue;
                } else if ( $hour > 11 ) {
                    $hour-= 12;
                }
                if ( $plugin ) {
                    $matchs[4][ $idx ] = $this->hour_next( $match, $matchs[4][ $idx ], $plugin );
                }
                $replace = '午後' . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/(夕方の{0,1}\s*)([0-9]{1,2}|[０-９]{1,2})時([０-９]{1,2})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                if ( $hour > 19 || $hour < 3 ) {
                    // 概ね18時まで
                    continue;
                } else if ( $hour > 11 ) {
                    $hour-= 12;
                }
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::normalize( $minute );
                $replace = '午後' . $hour . '時' . $minute . '分';
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/(夕方の{0,1}\s*)([0-9]{1,2}|[０-９]{1,2})時([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                if ( $hour > 19 || $hour < 3 ) {
                    // 概ね18時まで
                    continue;
                } else if ( $hour > 11 ) {
                    $hour-= 12;
                }
                if ( $plugin ) {
                    $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                }
                $replace = '午後' . $hour . '時' . $matchs[3][ $idx ];
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([今|深|明|真]{0,1}[夜|晩]中{0,1}の{0,1}、{0,1}\s*)([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})時([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                $prefix = '';
                if ( $hour > 23 ) {
                    $hour -= 24;
                    $prefix = '午前';
                } else if ( $hour > 18 ) {
                    $hour-= 12;
                    $prefix = '午後';
                } else if ( $hour === 12 ) {
                    $hour = 0;
                    $prefix = '午前';
                    // $prefix = '午後'; // 午前0時は日付が変わるが、午後12時はわかりにくい
                } else if ( $hour < 5 ) {
                    $prefix = '午前';
                } else {
                    $prefix = '午後';
                }
                if (! $prefix ) continue;
                $pre = $matchs[1][ $idx ];
                if ( strpos( $pre, '今' ) === 0 ) {
                    $prefix = '今日の夜、' . $prefix;
                } else if ( strpos( $pre, '明晩' ) === 0 ) {
                    $prefix = '明日の夜、' . $prefix;
                } else {
                    $prefix = '夜、' . $prefix;
                }
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::knum_to_num( $minute );
                if ( $minute > 59 ) continue;
                $replace = $prefix . $hour . '時' . $minute . '分';
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([今|深|明|真]{0,1}[夜|晩]中{0,1}の{0,1}、{0,1}\s*)([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})(時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                $prefix = '';
                if ( $hour > 23 ) {
                    $hour -= 24;
                    $prefix = '午前';
                } else if ( $hour > 18 ) {
                    $hour-= 12;
                    $prefix = '午後';
                } else if ( $hour === 12 ) {
                    $hour = 0;
                    $prefix = '午前';
                    // $prefix = '午後'; // 午前0時は日付が変わるが、午後12時はわかりにくい
                } else if ( $hour < 5 ) {
                    $prefix = '午前';
                } else {
                    $prefix = '午後';
                }
                if (! $prefix ) continue;
                $pre = $matchs[1][ $idx ];
                if ( strpos( $pre, '今' ) === 0 ) {
                    $prefix = '今日の夜、' . $prefix;
                } else if ( strpos( $pre, '明晩' ) === 0 ) {
                    $prefix = '明日の夜、' . $prefix;
                 } else {
                    $prefix = '夜、' . $prefix;
                }
                if ( $plugin ) {
                    $matchs[4][ $idx ] = $this->hour_next( $match, $matchs[4][ $idx ], $plugin );
                }
                $replace = $prefix . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([今|深|明|真]{0,1}[夜|晩]中{0,1}の{0,1}、{0,1}\s*)([0-9]{1,2}|[０-９]{1,2})時([０-９]{1,2})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                $prefix = '';
                if ( $hour > 23 ) {
                    $hour -= 24;
                    $prefix = '午前';
                } else if ( $hour > 18 ) {
                    $hour-= 12;
                    $prefix = '午後';
                } else if ( $hour === 12 ) {
                    $hour = 0;
                    $prefix = '午前';
                    // $prefix = '午後'; // 午前0時は日付が変わるが、午後12時はわかりにくい
                } else if ( $hour < 5 ) {
                    $prefix = '午前';
                } else {
                    $prefix = '午後';
                }
                if (! $prefix ) continue;
                $pre = $matchs[1][ $idx ];
                if ( strpos( $pre, '今' ) === 0 ) {
                    $prefix = '今日の夜、' . $prefix;
                } else if ( strpos( $pre, '明晩' ) === 0 ) {
                    $prefix = '明日の夜、' . $prefix;
                } else {
                    $prefix = '夜、' . $prefix;
                }
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::normalize( $minute );
                $replace = $prefix . $hour . '時' . $minute . '分';
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([今|深|明|真]{0,1}[夜|晩]中{0,1}の{0,1}、{0,1}\s*)([0-9]{1,2}|[０-９]{1,2})時([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                $prefix = '';
                if ( $hour > 23 ) {
                    $hour -= 24;
                    $prefix = '午前';
                } else if ( $hour > 18 ) {
                    $hour-= 12;
                    $prefix = '午後';
                } else if ( $hour === 12 ) {
                    $hour = 0;
                    $prefix = '午前';
                    // $prefix = '午後'; // 午前0時は日付が変わるが、午後12時はわかりにくい
                } else if ( $hour < 5 ) {
                    $prefix = '午前';
                } else {
                    $prefix = '午後';
                }
                if (! $prefix ) continue;
                $pre = $matchs[1][ $idx ];
                if ( strpos( $pre, '今' ) === 0 ) {
                    $prefix = '今日の夜、' . $prefix;
                } else if ( strpos( $pre, '明晩' ) === 0 ) {
                    $prefix = '明日の夜、' . $prefix;
                } else {
                    $prefix = '夜、' . $prefix;
                }
                if ( $plugin ) {
                    $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                }
                $replace = $prefix . $hour . '時' . $matchs[3][ $idx ];
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([早|今|毎|明]{0,1}朝の{0,1}、{0,1})([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})時([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $hour > 11 ) {
                    // 朝の12時、はありえない
                    continue;
                }
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::knum_to_num( $minute );
                if ( $minute > 59 ) continue;
                $pre = $matchs[1][ $idx ];
                if ( strpos( $pre, '今朝' ) === 0 ) {
                    $replace = '今日の朝、午前' . $hour . '時' . $minute . '分';
                } else if ( strpos( $pre, '毎朝' ) === 0 ) {
                    $replace = '毎日、午前' . $hour . '時' . $minute . '分';
                } else if ( strpos( $pre, '明朝' ) === 0 ) {
                    $replace = '明日の朝、午前' . $hour . '時' . $minute . '分';
                } else {
                    $replace = '朝、午前' . $hour . '時' . $minute . '分';
                }
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([早|今|毎|明]{0,1}朝の{0,1}、{0,1})([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})(時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $hour > 11 ) {
                    // 朝の12時、はありえない
                    continue;
                }
                if ( $plugin ) {
                    $matchs[4][ $idx ] = $this->hour_next( $match, $matchs[4][ $idx ], $plugin );
                }
                $pre = $matchs[1][ $idx ];
                if ( strpos( $pre, '今朝' ) === 0 ) {
                    $replace = '今日の朝、午前' . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                } else if ( strpos( $pre, '毎朝' ) === 0 ) {
                    $replace = '毎日、午前' . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                } else if ( strpos( $pre, '明朝' ) === 0 ) {
                    $replace = '明日の朝、午前' . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                } else {
                    $replace = '朝、午前' . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                }
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([早|今|毎|明]{0,1}朝の{0,1}\s*)([0-9]{1,2}|[０-９]{1,2})時([０-９]{1,2})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                if ( $hour > 11 ) {
                    // 朝の12時、はありえない
                    continue;
                }
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::normalize( $minute );
                $pre = $matchs[1][ $idx ];
                if ( strpos( $pre, '今朝' ) === 0 ) {
                    $replace = '今日の朝、午前' . $hour . '時' . $minute . '分';
                } else if ( strpos( $pre, '毎朝' ) === 0 ) {
                    $replace = '毎日、午前' . $hour . '時' . $minute . '分';
                } else if ( strpos( $pre, '明朝' ) === 0 ) {
                    $replace = '明日の朝、午前' . $hour . '時' . $minute . '分';
                } else {
                    $replace = '朝、午前' . $hour . '時' . $minute . '分';
                }
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([早|今|毎|明]{0,1}朝の{0,1}\s*)([0-9]{1,2}|[０-９]{1,2})時([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                if ( $hour > 11 ) {
                    // 朝の12時、はありえない
                    continue;
                }
                if ( $plugin ) {
                    $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                }
                $pre = $matchs[1][ $idx ];
                if ( strpos( $pre, '今朝' ) === 0 ) {
                    $replace = '今日の朝、午前' . $hour . '時' . $matchs[3][ $idx ];
                } else if ( strpos( $pre, '毎朝' ) === 0 ) {
                    $replace = '毎日、午前' . $hour . '時' . $matchs[3][ $idx ];
                } else if ( strpos( $pre, '明朝' ) === 0 ) {
                    $replace = '明日の朝、午前' . $hour . '時' . $matchs[3][ $idx ];
                } else {
                    $replace = '朝、午前' . $hour . '時' . $matchs[3][ $idx ];
                }
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([^午前])(1[3-9]時|2[0-4]時|１[３-９]時|２[０-４]時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = preg_replace( '/[^0-9０-９]+/u', '', $matchs[2][ $idx ] );
                $hour = PTUtil::normalize( $hour );
                $hour = (int) $hour;
                if ( $hour < 13 ) continue;
                $hour-= 12;
                if ( $plugin ) {
                    $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                }
                $replace = $matchs[1][ $idx ] . '午後' . $hour . '時' . $matchs[3][ $idx ];
                $prev = preg_quote( $matchs[1][ $idx ], '/' );
                $match = preg_replace( "/^{$prev}/", '', $match );
                $replace = preg_replace( "/^{$prev}/", '', $replace );
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([^午後])(二十一|二十二|二十三|二十四)時([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::knum_to_num( $minute );
                if ( $minute > 59 ) continue;
                if ( $hour > 12 ) {
                    $hour-= 12;
                    $replace = $matchs[1][ $idx ] . '午後' . $hour . '時' . $minute . '分';
                } else {
                    $replace = $matchs[1][ $idx ] . $hour . '時' . $minute . '分';
                }
                $prev = preg_quote( $matchs[1][ $idx ], '/' );
                $match = preg_replace( "/^{$prev}/", '', $match );
                $replace = preg_replace( "/^{$prev}/", '', $replace );
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([^午後])(二十一|二十二|二十三|二十四)(時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $hour < 13 ) continue;
                if ( $plugin ) {
                    $matchs[4][ $idx ] = $this->hour_next( $match, $matchs[4][ $idx ], $plugin );
                }
                $hour-= 12;
                $replace = $matchs[1][ $idx ] . '午後' . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                $prev = preg_quote( $matchs[1][ $idx ], '/' );
                $match = preg_replace( "/^{$prev}/", '', $match );
                $replace = preg_replace( "/^{$prev}/", '', $replace );
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([^午前])(十三|十四|十五|十六|十七|十八|十九|二十)時([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::knum_to_num( $minute );
                if ( $minute > 59 ) continue;
                if ( $hour > 12 ) {
                    $hour-= 12;
                    $replace = $matchs[1][ $idx ] . '午後' . $hour . '時' . $minute . '分';
                } else {
                    $replace = $matchs[1][ $idx ] . $hour . '時' . $minute . '分';
                }
                $prev = preg_quote( $matchs[1][ $idx ], '/' );
                $match = preg_replace( "/^{$prev}/", '', $match );
                $replace = preg_replace( "/^{$prev}/", '', $replace );
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/([^午前])(十三|十四|十五|十六|十七|十八|十九|二十)(時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $plugin ) {
                    $matchs[4][ $idx ] = $this->hour_next( $match, $matchs[4][ $idx ], $plugin );
                }
                $next = mb_substr( $matchs[4][ $idx ], 0, 1 );
                if ( $next === '限' ) {
                    // 一時限
                    $replace = $matchs[1][ $idx ] . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                } else {
                    if ( $hour > 12 ) {
                        $hour-= 12;
                        $replace = $matchs[1][ $idx ] . '午後' . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                    } else {
                        $replace = $matchs[1][ $idx ] . $hour . $matchs[3][ $idx ] . $matchs[4][ $idx ];
                    }
                }
                $prev = preg_quote( $matchs[1][ $idx ], '/' );
                $match = preg_replace( "/^{$prev}/", '', $match );
                $replace = preg_replace( "/^{$prev}/", '', $replace );
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/(午[前|後])([一|二|三|四|五|六|七|八|九|十|十一|十二])時([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})分/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                $minute = $matchs[3][ $idx ];
                $minute = PTUtil::knum_to_num( $minute );
                if ( $minute > 59 ) continue;
                if ( $hour > 12 ) {
                    $hour-= 12;
                    $replace = $matchs[1][ $idx ] . $hour . '時' . $minute . '分';
                } else {
                    $replace = $matchs[1][ $idx ] . $hour . '時' . $minute . '分';
                }
                $prev = preg_quote( $matchs[1][ $idx ], '/' );
                $match = preg_replace( "/^{$prev}/", '', $match );
                $replace = preg_replace( "/^{$prev}/", '', $replace );
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/(午[前|後])([一|二|三|四|五|六|七|八|九|十|十一|十二])時([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = $matchs[2][ $idx ];
                $hour = PTUtil::knum_to_num( $hour );
                if ( $plugin ) {
                    $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                }
                $replace = $matchs[1][ $idx ] . $hour . '時' . $matchs[3][ $idx ];
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $math_cnt = preg_match_all( '/(午[前|後]\s*)([0-9]{1,2}|[０-９]{1,2})時([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $next = $matchs[3][ $idx ];
                if ( strpos( $next, '半' ) === 0 ) {
                    // 午前8時半ごろ
                    $hour = $matchs[2][ $idx ];
                    $hour = PTUtil::normalize( $hour );
                    if ( $plugin ) {
                        $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                    } else {
                        $matchs[3][ $idx ] = preg_replace( '/.*?半/u', '30分', $matchs[3][ $idx ] );
                    }
                    $replace = $matchs[1][ $idx ] . $hour . '時' . $matchs[3][ $idx ];
                    $patterns[ $match ] = $replace;
                    $text = str_replace( $match, $replace, $text );
                }
            }
        }
        $math_cnt = preg_match_all( '/([^前|^後|^0-9])([0-9]{1,2}時|[０-９]{1,2}時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                $hour = preg_replace( '/[^0-9０-９]+/u', '', $match );
                $hour = PTUtil::normalize( $hour );
                if ( strlen( $hour ) === 4 ) {
                    $hour = substr( $hour, 0, 2 );
                }
                $hour = (int) $hour;
                $prefix = '';
                if ( $hour > 12 ) {
                    $hour-= 12;
                    $prefix = '午後';
                } else {
                    $prefix = '午前';
                }
                if ( $plugin ) {
                    $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                }
                $replace = $matchs[1][ $idx ] . $prefix . $hour . '時' . $matchs[3][ $idx ];
                // $replace = $matchs[1][ $idx ] . $morning . $hour . '時' . $matchs[3][ $idx ];
                $prev = preg_quote( $matchs[1][ $idx ], '/' );
                $match = preg_replace( "/^{$prev}/", '', $match );
                $replace = preg_replace( "/^{$prev}/", '', $replace );
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                if ( $match === $replace ) continue;
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $need_recursive = false;
        if (!$recursive ) {
            $math_cnt = preg_match_all( '/(.)([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})時([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})分/su', $text, $matchs );
            if ( $math_cnt ) {
                foreach ( $matchs[0] as $idx => $match ) {
                    $hour = $matchs[2][ $idx ];
                    $hour = PTUtil::knum_to_num( $hour );
                    $minute = $matchs[3][ $idx ];
                    $minute = PTUtil::knum_to_num( $minute );
                    if ( $minute > 59 ) continue;
                    if ( $hour > 12 ) {
                        $hour-= 12;
                        $replace = $matchs[1][ $idx ] . '午後' . $hour . '時' . $minute . '分';
                    } else {
                        $replace = $matchs[1][ $idx ] . $hour . '時' . $minute . '分';
                    }
                    $prev = preg_quote( $matchs[1][ $idx ], '/' );
                    $match = preg_replace( "/^{$prev}/", '', $match );
                    $replace = preg_replace( "/^{$prev}/", '', $replace );
                    if ( mb_strpos( $match, $wrap ) !== false ) {
                        $match = str_replace( $wrap, '', $match );
                        $replace = str_replace( $wrap, '', $replace );
                    }
                    $patterns[ $match ] = $replace;
                    $text = str_replace( $match, $replace, $text );
                }
                $need_recursive = true;
            }
            $math_cnt = preg_match_all( '/(.)([零|一|二|三|四|五|六|七|八|九|十|〇]{1,3})(時)([^間]{1,3})/su', $text, $matchs );
            if ( $math_cnt ) {
                $k_pattern = PTKanjiCharacters::PT_KANJI_PATTERN;
                foreach ( $matchs[0] as $idx => $match ) {
                    $hour = $matchs[2][ $idx ];
                    $next = mb_substr( $matchs[4][ $idx ], 0, 1 );
                    if ( $next === '限' ) {
                        continue;
                    } else if ( $hour === '一' && preg_match( $k_pattern, $next ) ) {
                        // 一時見合わせ、一時騒然となりました、一時的に
                        // 一時開始、一時終了などはあり得なくはない?
                        continue;
                    }
                    $hour = PTUtil::knum_to_num( $hour );
                    if ( $hour > 24 ) continue;
                    if ( $hour > 11 ) {
                        $hour-= 12;
                        $hour = '午後' . $hour;
                    }
                    if ( $plugin ) {
                        $matchs[4][ $idx ] = $this->hour_next( $match, $matchs[4][ $idx ], $plugin );
                    }
                    $replace = $matchs[1][ $idx ] . $hour . '時' . $matchs[4][ $idx ];
                    $prev = preg_quote( $matchs[1][ $idx ], '/' );
                    $match = preg_replace( "/^{$prev}/", '', $match );
                    $replace = preg_replace( "/^{$prev}/", '', $replace );
                    if ( mb_strpos( $match, $wrap ) !== false ) {
                        $match = str_replace( $wrap, '', $match );
                        $replace = str_replace( $wrap, '', $replace );
                    }
                    $local[ $match ] = $replace;
                    $patterns[ $match ] = $replace;
                    $text = str_replace( $match, $replace, $text );
                }
                $need_recursive = true;
            }
        }
        $math_cnt = preg_match_all( '/(午[前|後])([０-９]{1,2}時)([^間]{1,3})/su', $text, $matchs );
        if ( $math_cnt ) {
            foreach ( $matchs[0] as $idx => $match ) {
                if ( $plugin ) {
                    $matchs[3][ $idx ] = $this->hour_next( $match, $matchs[3][ $idx ], $plugin );
                }
                $replace = $matchs[1][ $idx ] . PTUtil::normalize( $matchs[2][ $idx ] ) . $matchs[3][ $idx ];
                if ( mb_strpos( $match, $wrap ) !== false ) {
                    $match = str_replace( $wrap, '', $match );
                    $replace = str_replace( $wrap, '', $replace );
                }
                $patterns[ $match ] = $replace;
                $text = str_replace( $match, $replace, $text );
            }
        }
        $text = str_replace( $wrap, '', $text );
        if (! $recursive && $need_recursive ) {
            $text = $this->twelve_hour_notation( $text, $patterns, true, $wrap, $local, $original );
            foreach ( $local as $orig => $change ) {
                if ( isset( $patterns[ $change ] ) ) {
                    $patterns[ $orig ] = $patterns[ $change ];
                    unset( $patterns[ $change ] );
                }
            }
        }
        return $text;
    }

    function hour_next ( &$match, $original, $plugin ) {
        if ( $plugin ) {
            $plugin = $this->SimplifiedJapanese ? $this->SimplifiedJapanese : $app->component( 'SimplifiedJapanese' );
        }
        if (! $plugin ) {
            return $original;
        }
        $parse = $plugin->mecab_parse_simple( $match, $this->mecab, true );
        foreach ( $parse as $idx => $data ) {
            if ( $data === 'EOS' ) continue;
            list ( $word, $csv ) = $data;
            if ( $word === '時' && $csv[1] === '接尾' && isset( $parse[ $idx + 1] ) ) {
                $next = preg_quote( $parse[ $idx + 1][0], '/' );
                $match = preg_replace( "/時{$next}.*$/", "時{$next}", $match );
                return $next;
            } else if ( $word === '時半' && $csv[1] === '接尾' && isset( $parse[ $idx + 1] ) ) {
                $next = preg_quote( $parse[ $idx + 1][0], '/' );
                $match = preg_replace( "/時半{$next}.*$/", "時半{$next}", $match );
                return '30分' . $parse[ $idx + 1][0];
            }
        }
        return $original;
    }

    function convert_sentence_end ( $text, &$patterns, $type = 1, $replaced_map = [] ) {
        $text = strip_tags( $text );
        if ( $this->convert_ambiguous && strpos( $text, 'しょう' ) !== false ) {
            // 特定のパターン TODO ましょうけど、〜ても
            $arr = ['ましょうこと' => 'ますこと', 'ましょうとも。' => 'ます。',
                    'ましょうとも！' => 'ます！', 'ましょうとも!' => 'ます!',
                    'でしょうが' => 'ですが', 'でしょうけど' => 'ですが'];
            foreach ( $arr as $word => $replace ) {
                if ( strpos( $text, $word ) !== false ) {
                    if (! isset( $patterns["/({$word})/u"] ) ) {
                        $part = strpos( $word, 'ましょう' ) === 0 ? '〜ましょう' : '〜でしょう';
                        $patterns["/({$word})/u"] =
                                      ['pattern' => "/{$word}/u",
                                       'replace' => $replace,
                                       'part' => $part ];
                    }
                }
            }
        }
        $plugin = $this->SimplifiedJapanese;
        if ( preg_match_all( '/[^。\?？！\!].*?([。\?？！\!])/us', $text, $matchs ) ) {
            $end_words = [];
            if ( strpos( $text, 'が、' ) !== false ) {
                foreach ( $matchs[0] as $idx => $content ) {
                    if ( strpos( $content, 'が、' ) !== false ) {
                        if ( preg_match_all( '/(.*?)が、/u', $content, $ms ) ) {
                            $ms = $ms[0];
                            foreach ( $ms as $m ) {
                                array_unshift( $matchs[0], preg_replace( '/が、$/us', '', $m ) . '、' );
                                array_unshift( $matchs[1], '、' );
                                array_unshift( $end_words, 'が、' );
                            }
                        }
                    }
                }
            }
            if ( strpos( $text, 'し、' ) !== false ) {
                foreach ( $matchs[0] as $idx => $content ) {
                    if ( mb_substr_count( $content, 'し、' ) === 1 ) {
                        $parses = $plugin->mecab_parse_simple( $content, $this->mecab, true );
                        foreach ( $parses as $cnt => $parse ) {
                            if ( isset( $parses[ $cnt - 1] ) && $parse[0] === '、' && $parses[ $cnt - 1][0] === 'し' ) {
                                $csv = $parses[ $cnt - 1][1];
                                if ( $csv[0] === '助詞' && $csv[1] === '接続助詞' ) {
                                    array_unshift( $matchs[0], preg_replace( '/し、.*$/us', '', $content ) . '、' );
                                    array_unshift( $matchs[1], '、' );
                                    array_unshift( $end_words, 'し、' );
                                }
                            }
                        }
                    }
                }
            }
            foreach ( $matchs[0] as $idx => $content ) {
                $end_word = $end_words[ $idx ] ?? '';
                $res = $type == 1
                     ? $this->sentence_end_class->respectful_sentence_end( $content, $matchs[1][ $idx ], $end_word )
                     : $this->sentence_end_class->normal_sentence_end( $content, $matchs[1][ $idx ] );
                $end_words[ $idx ] = $end_word;
                if (!empty( $res ) ) {
                    list( $word, $replace ) = $res;
                    if ( $matchs[1][ $idx ] === '、' ) {
                        $word = preg_replace( '/、$/u', $end_word, $word );
                        $replace = preg_replace( '/、$/u', $end_word, $replace );
                    }
                    if (!empty( $replaced_map ) ) {
                        $check_text = $word;
                        $this->revert_quote( $check_text, $replaced_map );
                        if ( $check_text !== $word ) {
                            $word = $check_text;
                            $this->revert_quote( $replace, $replaced_map );
                        }
                    }
                    if ( $word !== $replace ) {
                        $word = preg_quote( $word, '/' );
                        if (! isset( $patterns["/({$word})/u"] ) ) {
                            $patterns["/({$word})/u"] =
                                          ['pattern' => "/{$word}/u",
                                           'replace' => $replace,
                                           'part' => 'Sentence End'];
                        }
                    }
                }
            }
        }
    }

    function convert_ra_nuki_sa_ire ( $parses, &$patterns ) {
        $pre_word = null;
        $pre_csv  = [];
        foreach ( $parses as $idx => $parse ) {
            if ( $parse === 'EOS' ) continue;
            if ( is_array( $parse ) ) {
                list( $word, $csv, $setting ) = $parse;
            } else {
                list( $word, $setting ) = explode( "\t", $parse );
                $csv = explode( ',', $setting );
            }
            if ( $this->convert_ra_nuki && $pre_word ) {
                if ( $word === 'れ' || $word === 'れる' ) {
                    if ( $csv[0] === '動詞' && $csv[1] === '接尾' && isset( $parses[ $idx - 1 ] ) ) {
                        if ( $pre_csv[0] === '動詞' && $pre_csv[5] === '未然形' ) {
                            if ( $pre_csv[4] === '一段' || ( $pre_word === '来' && $pre_csv[4] === '五段・ラ行' ) ) {
                                $replace = "{$pre_word}ら{$word}";
                                $word = "{$pre_word}{$word}";
                                if (! isset( $patterns["/({$word})/u"] ) ) {
                                    $part = "Words without 'ら'";
                                    $patterns["/({$word})/u"] =
                                                  ['pattern' => "/{$word}/u",
                                                   'replace' => $replace,
                                                   'part' => $part ];
                                }
                            }
                        }
                    }
                } else if ( ( ( $word === '来れる' || $word === '来れ' ) 
                    || ( $word === '見れる' || $word === '見れ' ) ) && $csv[4] === '一段' ) {
                    $fitst = mb_substr( $word, 0, 1 );
                    if ( ( $word === '来れ' || $word === '見れ' ) && isset( $parses[ $idx + 1 ] ) ) {
                        $after = $parses[ $idx + 1 ];
                        if ( is_array( $after ) ) {
                            list( $after_word, $after_csv ) = $after;
                        } else {
                            list( $after_word, $after_setting ) = explode( "\t", $after );
                            $after_csv = explode( ',', $after_setting );
                        }
                        if ( $after_csv[0] === '助動詞' && ( $after_csv[7] === 'ナイ' || $after_csv[7] === 'マス' ) ) {
                            $replace = "{$fitst}られ{$after_word}";
                            $word = "{$fitst}れ{$after_word}";
                            if (! isset( $patterns["/({$word})/u"] ) ) {
                                $part = "Words without 'ら'";
                                $patterns["/({$word})/u"] =
                                              ['pattern' => "/{$word}/u",
                                               'replace' => $replace,
                                               'part' => $part ];
                            }
                        }
                    } else if ( $word === '来れる' || $word === '見れる' ) {
                        if (! isset( $patterns["/({$word})/u"] ) ) {
                            $part = "Words without 'ら'";
                            $replace = "{$fitst}られる";
                            $patterns["/({$word})/u"] =
                                          ['pattern' => "/{$word}/u",
                                           'replace' => $replace,
                                           'part' => $part ];
                        }
                    }
                }
            }
            if ( $this->convert_sa_ire && $pre_word ) {
                if ( $word === 'させ' && $csv[0] === '動詞' && $csv[1] === '接尾' ) {
                    if ( $pre_csv[0] === '動詞' && $pre_csv[5] === '未然形' && strpos( $pre_csv[4], '五段' ) !== false ) {
                        $after_word = '';
                        if ( isset( $parses[ $idx + 1 ] ) ) {
                            $after = $parses[ $idx + 1 ];
                            if ( is_array( $after ) ) {
                                list( $after_word, $after_csv ) = $after;
                            } else {
                                list( $after_word, $after_setting ) = explode( "\t", $after );
                                $after_csv = explode( ',', $after_setting );
                            }
                        }
                        $match = "{$pre_word}{$word}{$after_word}";
                        if (! isset( $patterns["/({$match})/u"] ) ) {
                            $part = "Words extra 'さ'";
                            $replace = "{$pre_word}せ{$after_word}";
                            $patterns["/({$match})/u"] =
                                          ['pattern' => "/{$match}/u",
                                           'replace' => $replace,
                                           'part' => $part ];
                        }
                    }
                }
            }
            $pre_word = $word;
            $pre_csv  = $csv;
        }
    }

    function remove_adverb ( $parses, &$patterns, &$variante_chars, $replace_chars, &$replaced_map, &$text ) {
        $excludes = self::ADVERB_EXCLUDES;
        $word_count = count( $parses );
        $last_word = '';
        foreach ( $parses as $idx => $parse ) {
            if ( $parse === 'EOS' ) continue;
            $count_down = $word_count - $idx - 1;
            if ( is_array( $parse ) ) {
                list( $word, $csv, $setting ) = $parse;
            } else {
                list( $word, $setting ) = explode( "\t", $parse );
                $csv = explode( ',', $setting );
            }
            $kana = $csv[7] ?? '';
            $part = $csv[1];
            $part_name = $this->translate( $csv[0], '', 'ja' );
            $invalid_match = false;
            if ( $csv[0] === '副詞' && $csv[1] === '一般' && $count_down > 2 && isset( $parses[ $idx + 1] ) ) {
                // $search = $last_word . $word;
                $search = $word;
                $next = $parses[ $idx + 1];
                if ( is_array( $next ) ) {
                    list( $next_word, $csv, $setting ) = $next;
                } else {
                    list( $next_word, $setting ) = explode( "\t", $next );
                    $csv = explode( ',', $setting );
                }
                if ( isset( $excludes[ $word ] ) ) {
                    if ( is_string( $excludes[ $word ] ) && $excludes[ $word ] === $next_word ) {
                        $last_word = $word;
                        continue;
                    } else if ( is_array( $excludes[ $word ] ) && in_array( $next_word, $excludes[ $word ] ) ) {
                        $last_word = $word;
                        continue;
                    }
                }
                if ( $csv[0] === '助詞' && ( $csv[0] === '副詞化' || $csv[0] === '連体化' ) ) {
                    $next2 = $parses[ $idx + 2] ?? null;
                    if ( $next2 ) {
                        if ( is_array( $next2 ) ) {
                            list( $next_word2, $csv2, $setting2 ) = $next2;
                        } else {
                            list( $next_word2, $setting2 ) = explode( "\t", $next2 );
                            $csv2 = explode( ',', $setting2 );
                        }
                        $search .= $next_word;
                        $next_word = $next_word2;
                    }
                }
                $search .= $next_word;
                // 既存船については比較的[、]多数の船主が幅広く保有する構造になっている。
                $replace = $next_word === '、' ? $last_word . '、' : $next_word;
                if ( $next_word === '、' ) {
                    $search = $last_word . $search;
                }
                $search = preg_quote( $search, '/' );
                if (! isset( $patterns["/({$search})/u"] ) ) {
                    $patterns["/({$search})/u"] =
                                  ['pattern' => "/{$search}/u",
                                   'replace' => $replace,
                                   'part' => $part_name ];
                }
            }
            $last_word = $word;
        }
    }

    function kanji_check ( $parses, &$patterns, &$variante_chars, $replace_chars, &$replaced_map, &$text ) {
        $kanji_level = (int) $this->kanji_level;
        $_pattern = PTKanjiCharacters::PT_KANJI_PATTERN;
        $_patterns = PTKanjiCharacters::PT_KANJIS_PATTERN;
        $characters = PTKanjiCharacters::PT_KANJI_CHARACTERS;
        $variante_map = $this->convert_variante ? PTKanjiCharacters::PT_KANJI_VARIANTE_MAP : [];
        $adverb_map = PTKanjiCharacters::PT_ADVERB_MAP;
        $suffixes = PTKanjiCharacters::PT_SUFFIXES_MAP;
        $excludes = PTKanjiCharacters::PT_EXCLUDE_WORDS;
        $plugin = $this->SimplifiedJapanese;
        $tokens = [];
        foreach ( $parses as $parse ) {
            if ( $parse === 'EOS' ) continue;
            if ( is_array( $parse ) ) {
                list( $word, $csv, $setting ) = $parse;
            } else {
                list( $word, $setting ) = explode( "\t", $parse );
                $csv = explode( ',', $setting );
            }
            if ( in_array( $word, $excludes ) ) continue;
            $kana = $csv[7] ?? '';
            $part = $csv[1];
            $part_name = $this->translate( $csv[0], '', 'ja' );
            $invalid_match = false;
            if ( $this->convert_conjunction && $csv[0] === '接続詞' ) {
                if ( preg_match_all( $_pattern, $word, $matchs ) ) {
                    if (! isset( $patterns["/({$word})/u"] ) ) {
                        $yomi = mb_convert_kana( $kana, 'c', 'UTF-8' );
                        $patterns["/({$word})/u"] =
                                      ['pattern' => "/{$word}/u",
                                       'replace' => $yomi,
                                       'part' => $part_name ];
                    }
                }
            } else if ( $this->convert_adverb && $csv[0] === '副詞' && isset( $adverb_map[ $word ] ) ) {
                if ( preg_match_all( $_pattern, $word, $matchs ) ) {
                    if (! isset( $patterns["/({$word})/u"] ) ) {
                        $patterns["/({$word})/u"] =
                                      ['pattern' => "/{$word}/u",
                                       'replace' => $adverb_map[ $word ],
                                       'part' => $part_name ];
                    }
                }
            } else if ( $this->convert_suffixes && ( $csv[0] === '名詞' || $csv[0] === '助詞' ) ) {
                if ( preg_match_all( $_pattern, $word, $matchs ) ) {
                    foreach ( $suffixes as $search => $replace ) {
                        if ( strpos( $setting, $search ) === 0 ) {
                            if ( $replace === '__OPEN__' ) {
                                $yomi = mb_convert_kana( $kana, 'c', 'UTF-8' );
                            } else {
                                $yomi = $replace;
                            }
                            if (! isset( $patterns["/({$word})/u"] ) ) {
                                $patterns["/({$word})/u"] =
                                              ['pattern' => "/{$word}/u",
                                               'replace' => $yomi,
                                               'part' => $this->translate( '接尾辞・助詞・助動詞' ) ];
                            }
                        }
                    }
                }
            }
            if ( $this->convert_non_common || $this->convert_variante ) {
                if ( preg_match_all( $_pattern, $word, $matchs ) ) {
                    $matchs = $matchs[0];
                    foreach ( $matchs as $match ) {
                        if (! isset( $characters[ $match ] ) && $csv[1] === '固有名詞' ) {
                            $magic = self::magic( $text, $tokens );
                            $replaced_map[ $magic ] = $word;
                            // $text = str_replace( $word, $magic, $text );
                        }
                        if ( isset( $variante_map[ $match ] ) ) {
                            if ( isset( $replace_chars[ $match ] ) ) {
                                $variante_chars++;
                            }
                            if (! isset( $patterns["/({$match})/u"] ) ) {
                                if ( $csv[1] !== '固有名詞' ) {
                                    $invalid_match = true;
                                    $patterns["/({$match})/u"] =
                                                  ['pattern' => "/{$match}/u",
                                                   'replace' => $variante_map[ $match ],
                                                   'variante_char' => true];
                                }
                            }
                            if ( isset( $characters[ $variante_map[ $match ] ] ) ) {
                                if ( $kanji_level && $kanji_level > $characters[ $variante_map[ $match ] ] ) {
                                } else {
                                    $invalid_match = false;
                                    continue;
                                }
                            }
                        } else if (! isset( $characters[ $match ] ) ) {
                            if (! isset( $patterns["/({$match})/u"] ) ) {
                                if ( $csv[1] !== '固有名詞' ) {
                                    $invalid_match = true;
                                    if ( $match === $csv[6] ) {
                                        // Is one character.
                                        if (! $kana ) {
                                            $_parse = $plugin->mecab_parse_simple( $match, $this->mecab );
                                            $_parse = array_shift( $_parse );
                                            list( $_word, $_csv ) = explode( "\t", $_parse );
                                            $_csv = explode( ',', $_csv );
                                            $kana = $_csv[7] ?? '';
                                        }
                                        $yomi = mb_convert_kana( $kana, 'c', 'UTF-8' );
                                        $patterns["/({$match})/u"] =
                                                      ['pattern' => "/{$match}/u",
                                                       'replace' => $yomi,
                                                       'invalid_kanji' => 8];
                                    }
                                }
                            }
                        } else if ( $kanji_level && $characters[ $match ] > $kanji_level ) {
                            if (! isset( $patterns["/({$match})/u"] ) ) {
                                if ( $csv[1] !== '固有名詞' ) {
                                    $invalid_match = true;
                                    if ( $match === $csv[6] ) {
                                        // Is one character.
                                        if (! $kana ) {
                                            $_parse = $plugin->mecab_parse_simple( $match, $this->mecab );
                                            $_parse = array_shift( $_parse );
                                            list( $_word, $_csv ) = explode( "\t", $_parse );
                                            $_csv = explode( ',', $_csv );
                                            $kana = $_csv[7] ?? '';
                                        }
                                        $yomi = mb_convert_kana( $kana, 'c', 'UTF-8' );
                                        $patterns["/({$match})/u"] =
                                                      ['pattern' => "/{$match}/u",
                                                       'replace' => $yomi,
                                                       'invalid_kanji' => $characters[ $match ]];
                                    }
                                }
                            }
                        }
                    }
                }
                if ( $invalid_match ) {
                    if ( preg_match_all( $_patterns, $word, $matchs ) ) {
                        // Is muliple characters.
                        $_matchs = $matchs[0];
                        foreach ( $_matchs as $_match ) {
                            // if ( mb_strlen( $_match ) === 1 ) {
                            //     continue;
                            // }
                            $__matchs = PTUtil::mb_str_split( $_match );
                            $add_patterns = [];
                            $invalid_kanji_level = 0;
                            foreach ( $__matchs as $idx => $__match ) {
                                if (! isset( $characters[ $__match ] ) ) {
                                    if (! isset( $patterns["/({$word})/u"] ) ) {
                                        if ( $csv[1] !== '固有名詞' ) {
                                            if ( count( $__matchs ) === 2 ) {
                                                $words = $__matchs;
                                                unset( $words[ $idx ] );
                                                $other = array_shift( $words );
                                                if ( isset( $characters[ $other ] ) ) {
                                                    $kana = $this->convert_kanji( $match, $other, $kana, $idx );
                                                }
                                            }
                                            $yomi = mb_convert_kana( $kana, 'c', 'UTF-8' );
                                            $add_patterns["/({$word})/u"] =
                                                          ['pattern' => "/{$word}/u",
                                                           'replace' => $yomi ];
                                            if ( $invalid_kanji_level < 8 ) {
                                                $invalid_kanji_level = 8;
                                            }
                                        }
                                    }
                                } else if ( $kanji_level && $characters[ $__match ] > $kanji_level ) {
                                    if (! isset( $patterns["/({$word})/u"] ) ) {
                                        if ( $csv[1] !== '固有名詞' ) {
                                            if ( count( $__matchs ) === 2 ) {
                                                $words = $__matchs;
                                                unset( $words[ $idx ] );
                                                $other = array_shift( $words );
                                                if ( isset( $characters[ $other ] ) && $characters[ $other ] <= $kanji_level ) {
                                                    $kana = $this->convert_kanji( $match, $other, $kana, $idx );
                                                }
                                            }
                                            $yomi = mb_convert_kana( $kana, 'c', 'UTF-8' );
                                            $add_patterns["/({$word})/u"] =
                                                          ['pattern' => "/{$word}/u",
                                                           'replace' => $yomi,
                                                           ];
                                            if ( $invalid_kanji_level < $characters[ $__match ] ) {
                                                $invalid_kanji_level = $characters[ $__match ];
                                            }
                                        }
                                    }
                                }
                            }
                            if (!empty( $add_patterns ) ) {
                                $add_patterns["/({$word})/u"]['invalid_kanji'] = $invalid_kanji_level;
                                $patterns = array_merge( $patterns, $add_patterns );
                            }
                        }
                    }
                }
            }
        }
    }

    function convert_kanji ( $match, $other, $kana, $idx ) {
        $plugin = $this->SimplifiedJapanese;
        $is_changed = false;
        $_parse = $plugin->mecab_parse_simple( $other, $this->mecab );
        $_parse = array_shift( $_parse );
        list( $_word, $_csv ) = explode( "\t", $_parse );
        $_csv = explode( ',', $_csv );
        $_kana = $_csv[7] ?? '';
        if ( $idx === 0 && $_kana ) {
            if ( preg_match( "/{$_kana}$/", $kana ) ) {
                $kana = preg_replace( "/{$_kana}$/", $other, $kana );
                $is_changed = true;
            }
        } else if ( $_kana ) {
            if ( preg_match( "/^{$_kana}/", $kana ) ) {
                $kana = preg_replace( "/^{$_kana}/", $other, $kana );
                $is_changed = true;
            }
        }
        if (! $is_changed ) {
            $_parse = $plugin->mecab_parse_simple( $match, $this->mecab );
            $_parse = array_shift( $_parse );
            list( $_word, $_csv ) = explode( "\t", $_parse );
            $_csv = explode( ',', $_csv );
            $_kana = $_csv[7] ?? '';
            if ( $idx === 0 && $_kana ) {
                if ( preg_match( "/^{$_kana}/", $kana ) ) {
                    $kana = $_kana . $other;
                }
            } else if ( $_kana ) {
                if ( preg_match( "/{$_kana}$/", $kana ) ) {
                    $kana = $other . $_kana;
                }
            }
        }
        return $kana;
    }

    function quote_quote ( &$text, &$replaced_map = [] ) {
        if (! $text ) return '';
        if (! is_array( $replaced_map ) ) $replaced_map = [];
        foreach ( $replaced_map as $magic => $word ) {
            if ( strpos( $text, $word ) !== false ) {
                $text = str_replace( $word, $magic, $text );
            }
        }
        $tokens = [];
        if ( $this->exclude_cite ) {
            $brackets = ['(' => ')', '「' => '」', '〈' => '〉',
                         '『' => '』', '“' => '”', '【' => '】', '＜' => '＞',
                         '《' => '》', '«' => '»', '[' => ']'];
            foreach ( $brackets as $bracket_start => $bracket_end ) {
                if ( mb_strpos( $text, $bracket_start ) !== false
                    && mb_strpos( $text, $bracket_end ) !== false ) {
                    list( $start, $end ) = [ $bracket_start, $bracket_end ];
                    $bracket_start = preg_quote( $bracket_start, '/' );
                    $bracket_end = preg_quote( $bracket_end, '/' );
                    if ( preg_match_all( "/{$bracket_start}.*?{$bracket_end}/s", $text, $matches ) ) {
                        foreach ( $matches as $all_match ) {
                            foreach ( $all_match as $match ) {
                                $magic = self::magic( $text, $tokens );
                                $text = str_replace( $match, $magic, $text );
                                $replaced_map[ $magic ] = $match;
                            }
                        }
                    }
                }
            }
        }
        if ( $this->exclude_quote ) {
            foreach ( $this->exclude_quote as $tag ) {
                if ( stripos( $text, "<{$tag}" ) !== false ) {
                    if ( preg_match_all( "!<{$tag}.*?</{$tag}>!si", $text, $matches ) ) {
                        foreach ( $matches as $all_match ) {
                            foreach ( $all_match as $match ) {
                                $magic = self::magic( $text, $tokens );
                                $text = str_replace( $match, $magic, $text );
                                $replaced_map[ $magic ] = $match;
                            }
                        }
                    }
                }
            }
        }
        return $text;
    }

    function revert_quote ( &$text, $replaced_map ) {
        foreach ( $replaced_map as $magic => $quoted ) {
            $text = str_replace( $magic, $quoted, $text );
        }
        return $text;
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
}