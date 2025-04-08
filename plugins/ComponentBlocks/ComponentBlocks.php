<?php
require_once LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php';

class ComponentBlocks extends PTPlugin {

    protected $component_block_columns = [];
    protected $existing_models         = [];

    public function __construct() {
        parent::__construct();
    }

    /**
     * プラグイン有効化時にブロックをインポートする
     * フックポイント・コールバックが見あたらないのでupgrade_functionsを利用
     *
     * @param Prototype $app
     * @return void
     */
    public function import_blocks( $app ) {
        $table = $app->get_table( 'component_block' );
        if ( ! $table ) {
            return;
        }
        $block_count = $app->db->model( 'component_block' )->count();
        if ( $block_count === 0 ) {
            $class_path = $app->components['componentblocks']->path;
            $plugin_dir = str_replace( DS . get_class( $this ) . '.php', '', $class_path );
            $file = $plugin_dir . DS . 'appendix' . DS . 'blocks.csv';
            $importer = new PTImporter();
            $importer->print_state = false;
            $importer->import_from_files( $app, 'component_block', $plugin_dir, [ $file ] );
        }
    }

    private function existing ( $app, $model ) {
        // コンポーネントブロックカラムが存在する
        if ( $model === 'component_block' ) {
            return true;
        }
        if ( isset( $this->existing_models[ $model ] ) ) {
            return $this->existing_models[ $model ];
        }
        $scheme = $app->get_scheme_from_db( $model );
        if (! $scheme ) {
            $this->existing_models[ $model ] = false;
            return false;
        }
        $props = $scheme['edit_properties'] ?? [];
        $existing = array_search( 'component_blocks', $props );
        $this->existing_models[ $model ] = $existing;
        return $existing;
    }

    public function post_init( &$app ) {
        if ( $app->id !== 'Prototype' ) {
            if ( $app->id === 'RESTfulAPI' ) {
                $api = $app->parent;
                if ( is_object( $api ) ) {
                    if ( $api->method === 'insert' || $api->method === 'update' ) {
                        $app->register_callback( $api->model, 'pre_save', 'api_pre_save', 1, $this );
                        $app->init_callbacks( $api->model, 'pre_save' );
                    }
                }
            }
            return;
        }
        if (! $app->user() ) {
            // ログイン画面
            return;
        }
        if ( $app->param( '_type' ) === 'edit' || $app->mode === 'preview_component_blocks' ) {
            if ( $app->mode === 'view' && $app->param( '_type' ) === 'edit' ) {
                $model = $app->param( '_model' );
                if (! $this->existing( $app, $model ) ) {
                    return;
                }
            }
            $workspace_id = (int) $app->param( 'workspace_id' );
            // 開発者用スクリプトへの切り替え
            $develop_mode = $app->componentblocks_develop_mode;
            if (! $develop_mode ) {
                $app->ctx->vars['component_blocks_vue_suffix'] = '.prod';
                $app->ctx->vars['component_blocks_asset_dir'] = 'plugins/ComponentBlocks/assets';
            } else {
                $app->ctx->vars['component_blocks_vue_suffix'] = '';
                // 開発者モードの時のみプラグインディレクトリへのルート相対パスを変数に設定する
                $plugin_dir_array = array_filter( $app->plugin_dirs, function ( $dir ) {
                    return strpos( $dir, get_class( $this ) ) !== false;
                });
                $plugin_dir = count( $plugin_dir_array ) > 0 ? array_shift( $plugin_dir_array ) : '';
                $plugin_relative_url = str_replace( $app->pt_dir . DS, '', $plugin_dir );
                $plugin_relative_url = str_replace( '\\', '/', $plugin_relative_url );
                $app->ctx->vars['component_blocks_asset_dir'] = $plugin_relative_url . '/assets';
            }
        }
    }

    public function pre_run( $app ) {
        if (! $app->user() ) {
            // ログイン画面
            return;
        }
        $model = $app->param( '_model' );
        if ( $app->id !== 'Prototype' ) {
            return true;
        } else if ( $app->mode === 'preview_component_blocks' ) {
            // NOTE: Through
        } else if ( $app->param( '_type' ) !== 'edit' ) {
            return true;
        }
        if ( $app->mode === 'save' && $app->request_method === 'POST' ) {
            // 保存時
            if ( $this->existing( $app, $model ) ) {
                $app->init_callbacks( $model, 'save_filter' );
                $app->register_callback( $model, 'save_filter', 'save_filter', 1, $this );
            }
        }
        // プラグインを使用するモデルを割り出してCSS等の準備
        $existing = $app->mode === 'preview_component_blocks';
        if (! $existing && $model ) {
            $existing = $this->existing( $app, $model );
        }
        if (! $existing ) {
            return;
        }
        $asset_dir  = $app->ctx->vars['component_blocks_asset_dir'];
        if ( $existing ) {
            $pt_path      = $app->ctx->vars['prototype_path'];
            $script_uri   = $app->ctx->vars['script_uri'];
            $workspace_id = (int) $app->param( 'workspace_id' );
            $insert_image = $app->translate( 'Insert Image' );
            if ( !$model && $app->mode === 'preview_component_blocks' ) {
                // __mode=preview_component_blocks
                $column = $app->db->model( 'column' )->get_by_key( ['edit' => 'component_blocks'], null, 'id,table_id' );
                if ( $column->id ) {
                    $table = $app->db->model( 'table' )->load( $column->table_id, null, 'name' );
                    $model = $table ? $table->name : 'entry';
                } else {
                    $model = 'entry';
                }
            }
            $modal_url = "'{$script_uri}?__mode=view&_type=list&_model=asset&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model={$model}&insert=' + ed.id";
            if ( $workspace_id ) {
                $modal_url .= " + '&workspace_id={$workspace_id}'";
            }

            if ( ! isset( $app->ctx->vars['html_head'] ) ) {
                $app->ctx->vars['html_head'] = '';
            }
            $phrase_view = $app->translate( 'View' );
            $label_is_required = $app->translate( '${label} is required.' );
            $edit_not_entered = $app->translate( 'The ${edit} has not been entered (set).' );
            $app->ctx->vars['html_head'] .= <<<EOH
<link rel="stylesheet" href="{$asset_dir}/css/component_blocks.css">
<link rel="stylesheet" href="{$asset_dir}/css/component_blocks_definition.css">
<script>
    window.componentBlocks = [];
    window.componentBlocksSettings = {};
    componentBlocksSettings.scriptUri = '{$script_uri}';
    componentBlocksSettings.workspaceId = '{$workspace_id}';
    componentBlocksSettings.editorOnSetup = function (ed) {
        // NOTE: richtext.tmplから流用
        //       機能は登録しているがツールバーの標準設定には登録していない
        ed.ui.registry.addIcon('pt-image-icon', '<img src="{$pt_path}assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">');
        ed.ui.registry.addButton('pt-image', {
            icon: 'pt-image-icon',
            tooltip: '{$insert_image}',
            onAction: function () {
                const url = {$modal_url};
                $('#modal').modal().find('iframe').attr( 'src', url );
            }
        });
    };
    componentBlocksSettings.phrases = {
        'view': '{$phrase_view}',
        'labelIsRequired': '{$label_is_required}',
        'editNotEntered': '{$edit_not_entered}',
    };
</script>
EOH;
            if ( $model ) {
                if ( ! isset( $app->ctx->vars['__add_save_event'] ) ) {
                    $app->ctx->vars['__add_save_event'] = '';
                }
                $app->ctx->vars['__add_save_event'] .= 'await componentBlocksValidation();';
            }
        } elseif ( $app->param( '_model' ) === 'component_block' ) {
            if ( ! isset( $app->ctx->vars['html_head'] ) ) {
                $app->ctx->vars['html_head'] = '';
            }
        }
    }

    /**
     * ブロック一覧取得前の処理
     *
     * @access public
     * @param array $cb
     * @param Prototype $app アプリケーション
     * @param array $terms 検索条件
     * @param array $args 抽出条件
     * @param string $extra 追加のクエリ
     * @return bool 検査結果
     */
    public function pre_listing_block( &$cb, $app, &$terms, &$args, &$extra ) {
        // コンポーネント名の重複チェック
        $duplicate_names = [];
        $table = 'component_block';
        $query = "SELECT `{$table}_component_name`, `{$table}_workspace_id` FROM `mt_{$table}` "
            . "WHERE `{$table}_component_name` IN "
            . "(SELECT `{$table}_component_name` FROM `mt_{$table}` GROUP BY `{$table}_component_name` "
            . "HAVING COUNT(*) > 1);";
        $duplicate = $app->db->db->query( $query );
        while ($row = $duplicate->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            if (
                array_search( $row[0], $duplicate_names ) === false &&
                (int) $row[1] === (int) $app->param( 'workspace_id' )
            ) {
                $duplicate_names[] = $row[0];
            }
        }

        if ( count( $duplicate_names ) ) {
            $app->ctx->vars['error'] = $app->translate(
                'Duplicate component names occur. (Component name: %s)',
                implode( ', ', $duplicate_names )
            );
        }

        $is_dialog = $app->param( 'dialog_view' );
        if ( $is_dialog ) {
            // NOTE: マルチブロックで利用できるブロックを選択するダイアログにシステムのブロックを含める
            $workspace_id = (int) $app->param( 'workspace_id' );
            if ( $workspace_id ) {
                $cond = "/_workspace_id\={$workspace_id}/";
                $extra = preg_replace( $cond, "_workspace_id IN (0,{$workspace_id})", $extra );
            }
        }
    }

    /**
     * ブロックエディタを使用するカラムのエラーチェック
     *
     * @access public
     * @param array $cb
     * @param Prototype $app アプリケーション
     * @param PADOMySQL $obj
     * @return bool 検査結果
     */
    public function save_filter( &$cb, $app, &$obj ) {
        $scheme = $app->get_scheme_from_db( $app->param( '_model' ) );
        $edit_properties = $scheme['edit_properties'];
        $column_names = array_filter( $edit_properties, function ( $property ) { return $property === 'component_blocks'; } );

        if ( empty( $column_names ) ) {
            return true;
        }

        $has_error = false;
        foreach ( $column_names as $column_name => $edit_property ) {
            if ( strpos( $obj->$column_name, '"invalid":true' ) !== false ) {
                $column_label = $app->translate( $scheme['locale']['default'][ $column_name ] );
                $cb['errors'][] = $app->translate(
                    'There is an error in the input contents of the %s.',
                    $column_label
                );
                $has_error = true;
            }
        }

        if ( $has_error ) {
            return false;
        }

        return true;
    }

    /**
     * フィールド定義を検査
     *
     * @access private
     * @param array $cb
     * @param Prototype $app アプリケーション
     * @param PADOMySQL $obj
     * @return bool 検査結果
     */
    private function inspect_block_definition( &$cb, $app, &$obj ) {
        $cond = '/"key":"(id|type|fields|containers|blocks|invalid)"/';
        $fields = $obj->fields;
        $repeat_fields = $obj->repeat_fields;
        $has_error = false;

        if ( preg_match( $cond, $fields ) ) {
            $cb['errors'][] = $app->translate( 'The field key contains a word that cannot be used.' );
            $has_error = true;
        }

        if ( preg_match( $cond, $repeat_fields ) ) {
            $cb['errors'][] = $app->translate( 'The repeat field key contains a word that cannot be used.' );
            $has_error = true;
        }
        $fields_json = json_decode( $fields );
        if ( $fields_json === null ) {
            $cb['errors'][] = $this->translate( 'Unexpected data received.' );
            $has_error = true;
            $field_keys = [];
        } else {
            $field_keys = array_map( function ( $field ) { return $field->key; }, $fields_json );
        }
        $repeat_fields_json = json_decode( $repeat_fields );
        if ( $repeat_fields_json === null ) {
            $cb['errors'][] = $this->translate( 'Unexpected data received.' );
            $has_error = true;
            $repeat_field_keys = [];
        } else {
            $repeat_field_keys = array_map( function ( $field ) { return $field->key; }, $repeat_fields_json );
        }

        if ( $field_keys !== array_unique( $field_keys ) ) {
            $cb['errors'][] = $app->translate( 'Duplicate field key. Please specify a unique key.' );
            $has_error = true;
        }

        if ( $repeat_field_keys !== array_unique( $repeat_field_keys ) ) {
            $cb['errors'][] = $app->translate( 'Duplicate repeat field key. Please specify a unique key.' );
            $has_error = true;
        }

        foreach ( $fields_json as $field ) {
            if ( $field->edit === 'radio' || $field->edit === 'checkbox' ) {
                if ( empty( $field->choiceOptions ) ) {
                    $cb['errors'][] = $app->translate( 'When using radio buttons and check boxes, press the detailed setting button and set the options.' );
                    $has_error = true;
                }
            } elseif ( $field->edit === 'relation' ) {
                if ( empty( $field->relationModel ) ) {
                    $cb['errors'][] = $app->translate( 'When using relation, press the detailed setting button and choice the relation model.' );
                    $has_error = true;
                }
            }
        }

        foreach ( $repeat_fields_json as $field ) {
            if ( $field->edit === 'radio' || $field->edit === 'checkbox' ) {
                if ( empty( $field->choiceOptions ) ) {
                    $cb['errors'][] = $app->translate( 'When using radio buttons and check boxes, press the detailed setting button and set the options.' );
                    $has_error = true;
                }
            } elseif ( $field->edit === 'relation' ) {
                if ( empty( $field->relationModel ) ) {
                    $cb['errors'][] = $app->translate( 'When using relation, press the detailed setting button and choice the relation model.' );
                    $has_error = true;
                }
            }
        }

        if ( $has_error ) {
            $cb['errors'] = array_unique( $cb['errors'] );
            return false;
        }
        return true;
    }

    /**
     * 編集タイプ「コンポーネントブロック」定義
     *
     * @access public
     * @param Prototype $app アプリケーション
     * @param PADOMySQL $obj
     * @param mixed $data 保存するデータもしくはカラム名
     * @param string $name カラム名
     * @return void
     */
    public function component_blocks_type( &$app, $obj, &$data, $name = null, &$errors = [] ) {
        if ( $app->mode === 'view' ) {
            $value = $obj->$data;
            $app->ctx->vars['component_blocks_' . $name ] = $value;
        } elseif ( $app->mode === 'save' ) {
            if ( ! strpos( $data, '"invalid":true' ) ) {
                // 保存時にはバリデーション用データを削除する
                $data = preg_replace( '/,"invalid":(true|false)/', '', $data );
                $data = preg_replace( '/,"invalidMessages":\[[^\[]*?\]/', '', $data );
            }
        }
        return true;
    }

    /**
     * TinyMCEのJavaScriptを編集する
     *
     * @access public
     * @param array $cb
     * @param Prototype $app アプリケーション
     * @param array $params
     * @param string $tmpl
     * @param string $output ブラウザへの出力
     * @return void
     */
    public function edit_tinymce_js( $cb, $app, &$params, &$tmpl, &$output ) {
        if ( $app->param( '_type' ) === 'edit' ) {
            // tinymce.EditorManager.remove()の適用範囲をブロックエディタの外に限定する
            $output = preg_replace(
                '/tinymce.EditorManager.remove\(\);/',
                'tinymce.EditorManager.remove(\'textarea.richtext\');',
                $output
            );
        }
    }

    /**
     * enableblocksファンクションタグ
     *
     * @access public
     * @param array $args タグの引数
     * @param PAML $ctx
     * @return string 利用できるブロック情報
     */
    public function function_enable_blocks( $args, $ctx ) {
        $obj = $ctx->stash( 'component_block' );
        $rel_terms = [
            'from_id'  => $obj->id,
            'from_obj' => 'component_block',
            'to_obj'   => 'component_block',
        ];
        $enable_blocks_ids = $ctx->app->db->model( 'relation' )->load( $rel_terms, [], 'to_id' );
        $enable_blocks_ids = array_map( function ( $obj ) { return $obj->to_id; }, $enable_blocks_ids );

        $block_terms = [
            'id' => ['IN' => $enable_blocks_ids ],
        ];
        $block_args = [
            'sort'      => 'order',
            'direction' => 'ascend',
        ];
        $blocks = $ctx->app->db->model( 'component_block' )->load( $block_terms, $block_args, 'component_name' );
        $result = array_map( function( $block ) { return "'{$block->component_name}'"; }, $blocks );

        return implode( ',', $result );
    }

    /**
     * escape_quoteモディファイア
     *
     * @access public
     * @param string $value 入力値
     * @return string 処理結果
     */
    public function modifier_escape_quote( $value ) {
        return preg_replace( '/\'/', '\\\'', $value );
    }

    /**
     * コンポーネント名のバリデーション
     *
     * @access private
     * @param array $cb
     * @param Prototype $app アプリケーション
     * @param PADOMySQL $obj
     * @return string 処理結果
     */
    private function component_name_validation( &$cb, $app, &$obj ) {
        if ( preg_match( '/^(Editor|Draggable|BlockController|ImageSelector|ObjectSelector|MultiBlockEdit)$/', $obj->component_name ) ) {
            $cb['errors'][] = $app->translate( "The component name you entered is not available. Please specify another component name." );
            return false;
        }
        if ( preg_match( '/[^A-Za-z0-9$_]/u', $obj->component_name ) ) {
            $cb['errors'][] = $this->translate( "Only alphanumeric characters and $ _ are allowed in component names." );
            return false;
        }

        $terms = [
            'component_name' => $obj->component_name,
        ];
        if ( $app->param( 'id' ) !== '' ) {
            $terms['id'] = ['!=' => $obj->id ];
        }
        $duplicate_obj = $app->db->model( 'component_block' )->load( $terms );
        if ( count( $duplicate_obj ) > 0 ) {
            $cb['errors'][] = $app->translate( "The component name you entered is already in use. Please specify another component name." );
            return false;
        }

        return true;
    }

    /**
     * マルチブロックと利用できるブロックの確認
     *
     * @access private
     * @param array $cb
     * @param Prototype $app アプリケーション
     * @param PADOMySQL $obj
     * @return bool 検査結果
     */
    private function inspect_multiblock_definition( &$cb, $app, &$obj ) {
        $selected_blocks = array_filter( $app->param( 'enable_blocks' ), function ( $value ) {
            return $value !== '';
        });
        if ( $obj->use_multi_block && count( $selected_blocks ) === 0 ) {
            $cb['errors'][] = $app->translate( 'When using Multiblock, please select an enable block.' );
            return false;
        }

        return true;
    }

    /**
     * ブロック定義保存前の処理
     *
     * @access public
     * @param array $cb
     * @param Prototype $app アプリケーション
     * @param PADOMySQL $obj
     * @return bool 検査結果
     */
    public function pre_save_block( &$cb, $app, &$obj ) {
        $result = true;
        $result = $this->inspect_block_definition( $cb, $app, $obj );
        $result = $this->component_name_validation( $cb, $app, $obj );
        $result = $this->inspect_multiblock_definition( $cb, $app, $obj );
        return $result;
    }

    /**
     * オブジェクトのIDとラベルを返すモード
     * VueのObjectSelectorコンポーネントから呼び出される
     *
     * @access public
     * @param string $app Prototype
     * @return void
     */
    public function get_object_info( $app ) {
        $user = $app->user();
        if ( ! $user ) {
            header( $_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden' );
            echo json_encode( [] );
            return;
        };
        $object_ids = explode( ',', $app->param( 'object_ids' ) );
        $model = $app->param( 'model' );
        $table = $app->db->model( 'table' )->load( ['name' => $model ], null, 'primary' );
        if ( ! $table ) {
            header( $_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found' );
            echo json_encode( [] );
            return;
        }
        $primary = $table[0]->primary;
        $terms = [
            'id' => ['IN' => $object_ids ],
        ];
        $cols = null;
        if ( $model === 'asset' ) {
            $cols = 'id,label,class,workspace_id';
        }
        $objects  = $app->db->model( $model )->load( $terms, [], $cols );
        $workspace = $app->workspace() ? $app->workspace() : $app;
        $link_url = $workspace->link_url;
        $show_both = $workspace->show_both;
        $app->mode = 'view';
        if ( $link_url && $show_both ) {
            $workspace->show_both = false;
        }
        $data = [];
        foreach ( $object_ids as $id ) {
            foreach ( $objects as $object ) {
                if ( (int) $id === (int) $object->id ) {
                    $permalink = $app->get_permalink( $object );
                    if ( $link_url && !$show_both ) {
                        $permalink = $app->replace_link( $permalink, $workspace );
                    }
                    $items = [
                        'id'        => (int) $object->id,
                        'label'     => $object->$primary,
                        'permalink' => $permalink,
                        'class'     => $model === 'asset' ? $object->class : '',
                        'canEdit'   => $app->can_do( $model, 'edit', $object ) ? true : false,
                    ];
                    if ( $link_url && $show_both ) {
                        $permalink = $app->replace_link( $permalink, $workspace );
                        $items['linkurl'] = $permalink;
                    }
                    $data[] = $items;
                    break;
                }
            }
        }
        $app->mode = 'component_blocks_object_info';
        header( $_SERVER['SERVER_PROTOCOL'] . ' 200' );
        header( 'Content-type: application/json' );
        echo json_encode( $data );
    }

    /**
     * blockpartsfieldsブロックタグ
     *
     * @access public
     * @param array $args タグの引数
     * @param string $content 2回目以降のループでテンプレートブロックのコンテンツ
     * @param PAML $ctx
     * @param boolean $repeat
     * @param int $counter ループのカウンター
     * @return string 出力
     */
    public function block_block_parts_fields( $args, $content, $ctx, &$repeat, $counter ) {
        if ( ! $counter ) {
            $class = $args['class'] ?? '';
            return <<<EOP
<div class="repeat-field-container">
  <Draggable v-model="element.fields" item-key="id" handle=".handle-container div" :set="parent_element = element" @end="onDragEnd">
    <template #item="{element, index}">
      <div class="row form-group {$class}" :ref="'field' + element.id" tabindex="-1">
        <div class="col-auto handle-container">
          <div>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="16" height="16" class="handle" tabindex="-1"><use xlink:href="#grip_vertical"></use></svg>
          </div>
        </div>
EOP;
        } else {
            $block = $ctx->stash( 'component_block' );
            $component_name = $block->component_name;
            $add_filed_label = $ctx->app->translate( 'Add Field' );
            return <<<EOP
        {$content}
        <div class="col-auto control">
          <BlockController :blocks="parent_element.fields" :iscontainer="0" :index="index" :ref="'blockcontroller' + element.id" />
        </div>
      </div>
    </template>
  </Draggable>
  <button type="button" class="btn btn-primary btn-sm add-field mt-3 ml-0" @click="addField(element, '{$component_name}')">{$add_filed_label}</button>
</div>
EOP;
        }
    }

    /**
     * blockpartsファンクションタグ
     *
     * @access public
     * @param array $args タグの引数
     * @param PAML $ctx
     * @return string 編集タイプに応じたテンプレートの部品（HTML）
     */
    public function function_block_parts( $args, $ctx ) {
        $type  = isset( $args['type'] )  ? $args['type'] : 'text';
        $key   = isset( $args['key'] )   ? paml_htmlspecialchars( $args['key'] ) : '';
        $class = isset( $args['class'] ) ? paml_htmlspecialchars( $args['class'] ) : '';
        $label = isset( $args['label'] ) ? paml_htmlspecialchars( $args['label'] ) : '';
        $hint  = isset( $args['hint'] )  ? paml_htmlspecialchars( $args['hint'] ) : '';
        $index = 0;

        $id_attr = '';
        $v_on_attr = '';
        $label = $ctx->app->translate( $label );
        $hint = $ctx->app->translate( $hint );

        $single  = isset( $args['single'] )  ? (int)( $args['single'] ) : 0;
        $index  = isset( $args['index'] )  ? (int)( $args['index'] ) : 0;
        if ( $single ) {
            $id_attr = " :id=\"element.id\"";
        } elseif ( $label ) {
            $index = $index;
            $id_attr = " :id=\"element.id + '_{$index}'\"";
        }

        foreach ( $args as $arg_key => $arg_value ) {
            if ( preg_match( '/^v-on:/', $arg_key ) ) {
                $v_on_attr = " {$arg_key}=\"{$arg_value}\"";
            }
        }

        $tmpl = '';
        switch ( $type ) {
            case 'textarea':
                $rows = isset( $args['rows'] ) ? paml_htmlspecialchars( $args['rows'] ) : 5;
                if ( $label ) {
                    $tmpl .= "<label :for=\"element.id + '_{$index}'\" class=\"label\">{$label}</label>";
                }
                $tmpl .= "<textarea cols=\"10\" rows=\"{$rows}\" v-model=\"element['{$key}']\"{$v_on_attr} class=\"form-control {$class}\"{$id_attr}></textarea>";
                break;

            case 'editor':
                if ( $label ) {
                    $tmpl .= "<div class=\"label\">{$label}</div>";
                }
                $tmpl .= "<Editor :init=\"store.initTextEditor\" @init=\"setText\" v-model=\"element['{$key}']\" class=\"form-control inline-mce text {$class}\" />";
                break;

            case 'radio':
                $value = isset( $args['value'] ) ? paml_htmlspecialchars( $args['value'] ) : '';
                $model_modifier = is_numeric( $label ) ? '.number' : '';
                $value_modifier = is_numeric( $label ) ? ':' : '';
                if ( empty( $value ) ) {
                    $tmpl .= <<<EOP
<label class="custom-control custom-radio $class">
<input class="custom-control-input" type="radio" v-model{$model_modifier}="element['{$key}']"{$v_on_attr} {$value_modifier}value="{$label}">
<span class="custom-control-indicator"></span>
<span class="custom-control-description">{$label}</span>
</label>
EOP;
                } else {
                    $model_modifier = is_numeric( $value ) ? '.number' : '';
                    $value_modifier = is_numeric( $value ) ? ':' : '';
                    $tmpl .= <<<EOP
<label class="custom-control custom-radio $class">
<input class="custom-control-input" type="radio" v-model{$model_modifier}="element['{$key}']"{$v_on_attr} {$value_modifier}value="{$value}">
<span class="custom-control-indicator"></span>
<span class="custom-control-description">{$label}</span>
</label>
EOP;
                }
                break;

            case 'checkbox':
                $value = isset( $args['value'] ) ? paml_htmlspecialchars( $args['value'] ) : '';
                if ( empty( $value ) ) {
                    $model_modifier = is_numeric( $label ) ? '.number' : '';
                    $value_modifier = is_numeric( $label ) ? ':' : '';
                    $tmpl .= <<<EOP
<label class="custom-control custom-checkbox $class">
<input class="custom-control-input" type="checkbox" v-model{$model_modifier}="element['{$key}']"{$v_on_attr} {$value_modifier}value="{$label}">
<span class="custom-control-indicator"></span>
<span class="custom-control-description">{$label}</span>
</label>
EOP;
                } else {
                    $model_modifier = is_numeric( $value ) ? '.number' : '';
                    $value_modifier = is_numeric( $value ) ? ':' : '';
                    $tmpl .= <<<EOP
<label class="custom-control custom-checkbox $class">
<input class="custom-control-input" type="checkbox" v-model{$model_modifier}="element['{$key}']"{$v_on_attr} {$value_modifier}value="{$value}">
<span class="custom-control-indicator"></span>
<span class="custom-control-description">{$label}</span>
</label>
EOP;
                }
                break;

            case 'image':
                if ( $label ) {
                    $tmpl .= "<div class=\"label\">{$label}</div>";
                }
                $tmpl .= "<ImageSelector :element=\"element\" field-key=\"{$key}\" />";
                break;

            case 'asset':
                $class = isset( $args['asset_class'] ) ? paml_htmlspecialchars( $args['asset_class'] ) : '';
                $single_choice = isset( $args['single_choice'] ) ? $args['single_choice'] : 0;
                if ( $label ) {
                    $tmpl .= "<div class=\"label\">{$label}</div>";
                }
                $tmpl .= "<ObjectSelector :element=\"element\" model=\"asset\" field-key=\"{$key}\" single-choice=\"{$single_choice}\" class=\"{$class}\" />";
                break;

            case 'table':
                if ( $label ) {
                    $tmpl .= "<div class=\"label\">{$label}</div>";
                }
                $tmpl .= "<TableEditor :element=\"element\" field-key=\"{$key}\" />";
                break;

            case 'relation':
                $model = isset( $args['relation_model'] ) ? paml_htmlspecialchars( $args['relation_model'] ) : '';
                $single_choice = isset( $args['single_choice'] ) ? $args['single_choice'] : 0;
                if ( $label ) {
                    $tmpl .= "<div class=\"label\">{$label}</div>";
                }
                $tmpl .= "<ObjectSelector :element=\"element\" model=\"{$model}\" field-key=\"{$key}\" single-choice=\"{$single_choice}\" />";
                break;

            default:
                $model_modifier = $type === 'number' ? '.number' : '';
                if ( $label ) {
                    $tmpl .= "<label :for=\"element.id + '_{$index}'\" class=\"label\">{$label}</label>";
                }
                $tmpl .= "<input type=\"{$type}\" v-model{$model_modifier}=\"element['{$key}']\"{$v_on_attr} class=\"form-control {$class}\"{$id_attr}>";
                break;
        }

        if ( $hint ) {
            $hint_label = $ctx->app->translate( 'Hint' );
            $hint_html = <<< EOM
<p class="text-muted hint-block mb-0">
<i class="fa fa-question-circle-o" aria-hidden="true"></i>
<span class="sr-only">{$hint_label}</span>&ensp;
{$hint}</p>
EOM;
            $tmpl .= preg_replace( '/\n/', '', $hint_html );
        }

        return $tmpl;
    }

    /**
     * blockvalidaterulesファンクションタグ
     *
     * @access public
     * @param array $args タグの引数
     * @param PAML $ctx
     * @return string ブロックのバリデーションルールをまとめたJSON文字列
     */
    public function function_block_validate_rules( $args, $ctx ) {
        $block = $ctx->stash( 'component_block' );
        if (!$block || ! $block->fields ) {
            return '';
        }
        $rules = [];
        $fields = json_decode( $block->fields, true );
        foreach ( $fields as $field ) {
            if ( array_key_exists( 'required', $field ) && $field['required'] ) {
                $rules[ $field['key'] ] = [
                    'required' => true,
                    'label' => $ctx->app->translate( $field['label'] ),
                    'edit' => $ctx->app->translate( $field['edit'] ),
                ];
            }
        }
        if ( $block->repeat_fields ) {
            $repeat_fields = json_decode( $block->repeat_fields, true );
            if ( is_array( $repeat_fields ) ) {
                foreach ( $repeat_fields as $field ) {
                    if ( array_key_exists( 'required', $field ) && $field['required'] ) {
                        $rules[ $field['key'] ] = [
                            'required' => true,
                            'label' => $ctx->app->translate( $field['label'] ),
                            'edit' => $ctx->app->translate( $field['edit'] ),
                        ];

                        if ( ! array_key_exists( 'fields', $rules ) ) {
                            $rules['fields'] = true;
                        }
                    }
                }
            }
        }
        if ( count( $rules ) ) {
            $result = $block->component_name . ':' . json_encode( $rules ) . ',';
            return preg_replace( '/"([^"]+)":/', '$1:', $result );
        }

        return '';
    }

    /**
     * fieldinitialvalueファンクションタグ
     *
     * @access public
     * @param array $args タグの引数
     * @param PAML $ctx
     * @return string フィールドの初期値
     */
    public function function_field_initial_value( $args, $ctx ) {
        $result = '';
        $edit = $ctx->local_vars['edit'];
        $default_value = paml_htmlspecialchars( $ctx->local_vars['defaultValue'] );

        if ( $edit === 'asset' || $edit === 'relation' ) {
            $result = '[]';
        } elseif ( $edit === 'checkbox' || $edit === 'radio' ) {
            $choice_options = $ctx->local_vars['choiceOptions'];
            $choice_options_array = str_getcsv( $choice_options );
            $options_is_number_only = true;
            if ( strpos( $choice_options, '=' ) ) {
                foreach ( $choice_options_array as $option ) {
                    $key_value = explode( '=', $option );
                    if ( ! preg_match( '/^[0-9]+$/', $key_value[0] ) ) {
                        $options_is_number_only = false;
                    }
                }
            } else {
                foreach ( $choice_options_array as $option ) {
                    if ( ! preg_match( '/^[0-9]+$/', $option ) ) {
                        $options_is_number_only = false;
                    }
                }
            }

            if ( $edit === 'checkbox' && strpos( $choice_options, ',' ) ) {
                if ( $options_is_number_only ) {
                    $result = "[{$default_value}]";
                } else {
                    if ( strpos( $default_value, ',' ) === false ) {
                        $result = $default_value !== '' ? "['{$default_value}']" : '[]';
                    } else {
                        $result = "['" . str_replace( ',', "','", $default_value ) . "']";
                    }
                }
            } elseif ( $edit === 'checkbox' && substr_count( $choice_options, ',' ) === 0 ) {
                $result = ( $default_value !== '' && $default_value !== 'false' ) ? 'true' : 'false'; // NOTE: Vue.jsでは単一チェックボックスの保存値は真偽値になる
            } else {
                if ( $options_is_number_only ) {
                    $result = $default_value !== '' ? $default_value : 'null';
                } else {
                    $result = "'{$default_value}'";
                }
            }
        } elseif ( $edit === 'number' || $edit === 'image' ) {
            $result = $default_value !== '' ? $default_value : 'null';
        } else {
            $result = "'{$default_value}'";
        }

        return $result;
    }

    /**
     * settableblockvarsファンクションタグ
     *
     * @access public
     * @param string $arg 属性値
     * @param PAML $ctx
     * @return void
     */
    public function function_set_table_block_vars( $args, $ctx ) {
        $key = $args['from'] ?? null;
        if (! $key ) {
            return '';
        }

        $table_data = null;
        if ( array_key_exists( $key, $ctx->local_vars ) ) {
            $table_data = $ctx->local_vars[ $key ];
        } elseif ( array_key_exists( $key, $ctx->vars ) ) {
            $table_data = $ctx->vars[ $key ];
        }
        if (! $table_data ) {
            return '';
        }

        $prefix = $args['prefix'] ?? '';

        // データをtheadとtbodyに整理
        $thead_rows = [];
        $tbody_rows = [];
        foreach ( $table_data['rows'] as $row ) {
            $header_cells = array_filter($row, function ( $cell ) {
                return $cell['is_col_header'];
            });
            if (! count( $tbody_rows ) && count( $row ) === count( $header_cells ) ) {
                $thead_rows[] = $row;
            } else {
                $tbody_rows[] = $row;
            }
        }
        $ctx->local_vars[$prefix . 'thead_rows'] = $thead_rows;
        $ctx->local_vars[$prefix . 'tbody_rows'] = $tbody_rows;

        // 幅の処理
        $width_map = [
            'wider' => 506.625,
            'wide' => 337.75,
            'normal' => 225,
            'narrow' => 150,
            'narrower' => 100,
        ];
        $col_width_list = [];
        $total_width_value = null;
        $width_list = $table_data['col_width_list'];
        foreach ( $width_list as $width_label ) {
            $width_value = array_key_exists( $width_label, $width_map )
                ? $width_map[ $width_label ] : $width_map['normal'];
            $total_width_value += $width_value;
        }
        foreach ( $width_list as $width_label ) {
            $width_label = array_key_exists( $width_label, $width_map ) ? $width_label : 'normal';
            $width_value = $width_map[ $width_label ];

            $percent = sprintf('%.2f%%', ($width_value / $total_width_value) * 100);
            $col_width_list[] = [
                'label' => $width_label,
                'percent' => $percent,
            ];
        }
        $ctx->local_vars[$prefix . 'col_width_list'] = $col_width_list;

        return '';
    }

    /**
     * replace_curly_bracketsモディファイア
     *
     * @access public
     * @param string $value 入力値
     * @return string 処理結果
     */
    public function modifier_replace_curly_brackets( $value ) {
        return preg_replace( '/{{(\/)?mt:block([^}]+)( \/)?}}/', '<$1mt:block$2$3>', $value );
    }

    /**
     * component_blocks_optionsモディファイア
     *
     * @access public
     * @param string $value 入力値
     * @param string $arg 属性値
     * @param PAML $ctx
     * @return string 処理結果
     */
    public function modifier_component_blocks_options( $value, $arg, $ctx ) {
        $result = [];
        $options = str_getcsv( $value );
        if ( strpos( $value, '=' ) ) {
            foreach ( $options as $option ) {
                $key_value = explode( '=', $option );
                $result[ $key_value[0] ] = $key_value[1];
            }
            $ctx->vars['choice_options_label_only'] = false;
        } else {
            $result = $options;
            $ctx->vars['choice_options_label_only'] = true;
        }
        $ctx->vars[ $arg ] = $result;
    }

    /**
     * ifblockissinglefieldコンディショナルタグ
     *
     * @access public
     * @param array $args タグの引数
     * @param string $content
     * @param PAML $ctx
     * @return bool ブロックが2つ以上のフィールドを持つか否か
     */
    public function hdlr_block_is_single_field( $args, $content, $ctx ) {
        $obj = $ctx->stash( 'component_block' );
        if ( $obj ) {
            $fields = json_decode( $obj->fields );
            $repeat_fields = json_decode( $obj->repeat_fields );
            if ( is_null( $repeat_fields ) || count( $repeat_fields ) === 0 ) {
                if ( is_array( $fields ) && count( $fields ) === 1 ) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * __mode=component_blocks_default_templateの処理
     *
     * @access public
     * @param Prototype $app
     * @return void
     */
    public function component_blocks_default_template( $app ) {
        $app->ctx->vars['fields_definition'] = json_decode( $app->param( 'fields_definition' ), true );
        $app->ctx->vars['repeat_fields_definition'] = json_decode( $app->param( 'repeat_fields_definition' ), true );
        $app->build_page( 'component_blocks_default_template.tmpl' );
    }

    /**
     * __mode=component_blocks_i18nの処理
     *
     * @access public
     * @param Prototype $app
     * @return void
     */
    public function get_translate( $app ) {
        $data = $app->build_page( 'component_blocks_i18n.tmpl', [], false );
        header( $_SERVER['SERVER_PROTOCOL'] . ' 200' );
        header( 'Content-type: application/javascript' );
        echo $data;
    }

    /**
     * __mode=preview_component_blocksの処理
     *
     * @access public
     * @param Prototype $app
     * @return void
     */
    public function preview_component_blocks( $app ) {
        $app->build_page( 'preview_component_blocks.tmpl' );
    }

    function componentblocks_add_models ( $app, $objects, $action ) {
        $class = new PTListActions();
        $input = $app->param( 'itemset_action_input' );
        $triggers = preg_split( '/\s*,\s*/', $input );
        $model = $app->param( '_model' );
        $counter = 0;
        foreach ( $objects as $obj ) {
            $done = false;
            foreach ( $triggers as $trigger ) {
                $table = $app->get_table( $trigger );
                if (! $table ) {
                    continue;
                }
                $relation = $app->db->model( 'relation' )->get_by_key(
                    ['name' => 'enable_model',
                     'from_obj' => 'component_block',
                     'from_id' => $obj->id,
                     'to_obj' => 'table',
                     'to_id' => $table->id ]
                );
                if (! $relation->id ) {
                    $last = $app->db->model( 'relation' )->get_by_key(
                        ['name' => 'enable_model',
                         'from_obj' => 'component_block',
                         'from_id' => $obj->id,
                         'to_obj' => 'table'],
                        ['sort_by' => 'order',
                         'direction' => 'descend'] );
                    $order = 0;
                    if ( $last->id ) {
                        $order = $last->order;
                    }
                    $order++;
                    $relation->order( $order );
                    $relation->save();
                    $done = true;
                }
            }
            if ( $done ) {
                $counter++;
            }
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

    function component_block_columns ( $app, $model ) {
        if (! isset( $this->component_block_columns[ $model ] ) ) {
            $scheme = $app->get_scheme_from_db( $model );
            $props = $scheme['edit_properties'] ?? [];
            $component_blocks = array_search( 'component_blocks', $props );
            $this->existing_models[ $model ] = $component_blocks;
            if (! $component_blocks ) {
                $this->component_block_columns[ $model ] = [];
            } else {
                $component_block_columns = [];
                foreach ( $props as $column => $prop ) {
                    if ( $prop === 'component_blocks' ) {
                        $component_block_columns[] = $column;
                    }
                }
                $this->component_block_columns[ $model ] = $component_block_columns;
            }
        }
        return $this->component_block_columns[ $model ];
    }

    function generate_resource ( $cb, $app, &$resource ) {
        if (! $app->componentblocks_api_decode ) {
            return true;
        }
        $model = $cb['model'];
        $component_block_columns = $this->component_block_columns( $app, $model );
        foreach ( $component_block_columns as $column ) {
            if ( isset( $resource[ $column ] ) ) {
                $data = $resource[ $column ];
                if ( $data && is_string( $data ) ) {
                    $data = json_decode( $data, true );
                    if ( $data !== false ) {
                        $resource[ $column ] = $data;
                    }
                }
            }
        }
        return true;
    }

    function api_pre_save ( $cb, $app, &$obj, $original ) {
        $json = $cb['json'] ?? [];
        $model = $obj->_model;
        $component_block_columns = $this->component_block_columns( $app, $model );
        foreach ( $component_block_columns as $column ) {
            if ( isset( $json[ $column ] ) && is_array( $json[ $column ]  ) ) {
                $data = json_encode( $json[ $column ] );
                $obj->$column( $data );
            }
        }
        return true;
    }

    function componentblocks_remove_models ( $app, $objects, $action ) {
        $class = new PTListActions();
        $input = $app->param( 'itemset_action_input' );
        $triggers = preg_split( '/\s*,\s*/', $input );
        $model = $app->param( '_model' );
        $counter = 0;
        foreach ( $objects as $obj ) {
            $done = false;
            foreach ( $triggers as $trigger ) {
                $table = $app->get_table( $trigger );
                if (! $table ) {
                    continue;
                }
                $relation = $app->db->model( 'relation' )->get_by_key(
                    ['name' => 'enable_model',
                     'from_obj' => 'component_block',
                     'from_id' => $obj->id,
                     'to_obj' => 'table',
                     'to_id' => $table->id ]
                );
                if ( $relation->id ) {
                    $relation->remove();
                    $done = true;
                }
            }
            if ( $done ) {
                $counter++;
            }
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
}