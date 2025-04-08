<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class DisplayOptions extends PTPlugin {

    public $upgrade_functions = [ ['version_limit' => 1.3, 'method' => 'activate'],
                                  ['version_limit' => 1.6, 'method' => 'rename_meta'] ];
    public $stash = [];
    private $disp_option   = null;
    private $model_setting = null;

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'table' );
        $column = $app->db->model( 'column' )->get_by_key(
            ['table_id' => $table->id, 'name' => 'workspaces'] );
        if (! $column->id ) {
            $column->type( 'relation' );
            $column->label( 'WorkSpaces' );
            $column->edit( 'relation:workspace:name:dialog' );
            $column->list( 'reference:workspace:name' );
            $last = $app->db->model( 'column' )->get_by_key(
                ['table_id' => $table->id ],
                ['sort' =>'order', 'direction' => 'descend'] );
            $column->order( $last->order + 10 );
            $column->options( 'workspace' );
            $app->set_default( $column );
            $column->save();
            $app->db->clear_query( 'table' );
            $app->clear_cache( 'table' );
            // clear app cache and query cache.
        }
        return true;
    }

    function rename_meta ( $app, $plugin, $version, &$errors ) {
        // Fix typo.
        $meta_objs = $app->db->model( 'meta' )->load( ['key' => 'indivilal_options'] );
        if (! empty( $meta_objs ) ) {
            foreach ( $meta_objs as $idx => $meta ) {
                $meta->key( 'individual_options' );
                $meta_objs[ $idx ] = $meta;
            }
            $app->db->model( 'meta' )->update_multi( $meta_objs );
        }
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'table' );
        $column = $app->db->model( 'column' )->get_by_key(
            ['table_id' => $table->id, 'name' => 'workspaces'] );
        if ( $column->id ) {
            $column->remove();
            // $options = $app->db->model( 'option' )->load(
            //                ['kind' => 'list_option', 'key' => 'table'] );
            // $app->db->clear_query( 'option' );
            $app->db->clear_query( 'table' );
            $app->clear_cache( 'table' );
            // clear app cache and query cache.
        }
        return true;
    }

    function stash ( $name, $value = false, $var = null ) {
        if ( isset( $this->stash[ $name ] ) ) $var = $this->stash[ $name ];
        if ( $value !== false ) $this->stash[ $name ] = $value;
        return $var;
    }

    function post_init ( &$app ) {
        if (! $app->user() ) return;
        if ( $app->id != 'Prototype' ) {
            return;
        }
        $table = $app->get_table( 'displayoption' );
        if (! $table ) {
            return;
        }
        $this->stash( 'model_displayoption', $table );
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        if (! $table ) {
            return;
        }
        $workspace_id = $app->workspace() ? (int)$app->workspace()->id : 0;
        if (! $app->db->model( $model )->has_column( 'workspace_id' ) ) {
            $workspace_id = 0;
        }
        $displayoption = $app->db->model( 'displayoption' )->get_by_key(
                    ['workspace_id' => $workspace_id, 'model' => $model ] );
        $this->stash( 'current_displayoption', $displayoption );
        if ( $displayoption->id ) {
            $this->disp_option = $displayoption;
            if ( $app->mode == 'view' && $app->param( '_type' ) == 'list' ) {
                if ( $displayoption->menu_type == 9 ) {
                    $setting = $app->get_table( $model );
                    if ( $setting->dialog_view && $app->param( 'dialog_view' ) ) {
                    } else {
                        return $app->return_to_dashboard();
                    }
                }
                $app->register_callback( $model, 'start_listing', 'start_listing', 1, $this );
            } else if ( $app->mode === 'save' && $app->param( '__obj_display_opt' ) ) {
                $app->register_callback( $model, 'post_save', 'post_save_object', 9, $this );
            }
        }
    }

    function pre_view ( $app ) {
        $type = $app->param( '_type' );
        if ( $type !== 'edit' ) return;
        $display_options = $app->ctx->vars['display_options'];
        $model = $app->param( '_model' );
        $scheme = $app->get_scheme_from_db( $model );
        $edit_properties = $scheme['edit_properties'] ?? [];
        if ( empty( $edit_properties ) ) {
            return;
        }
        $relation_cols = [];
        foreach ( $edit_properties as $column => $edit_prop ) {
            if ( strpos( $edit_prop, 'relation:' ) === 0 && preg_match( '/:dialog$/', $edit_prop ) ) {
                $props = explode( ':', $edit_prop );
                $relation_cols[ $column ] = $props[1];
            }
        }
        if ( empty( $relation_cols ) ) {
            return;
        }
        $models = array_values( $relation_cols );
        $workspace_id = $app->workspace() ? (int)$app->workspace()->id : 0;
        $displayoptions = $app->db->model( 'displayoption' )->load(
                    ['workspace_id' => $workspace_id, 'menu_type' => 9,
                     'model' => ['IN' => $models ] ], null, 'model' );
        $hidden_cols = [];
        $asset_table = null;
        foreach ( $displayoptions as $displayoption ) {
            $hidden = $displayoption->model;
            $table = $app->get_table( $hidden );
            if ( $hidden === 'asset' ) {
                $asset_table = $table;
            }
            if ( $table->dialog_view ) {
                continue;
            }
            if ( $hidden === 'asset' && is_numeric( $app->asset_workspace_id ) ) {
                $displayoption = $app->db->model( 'displayoption' )->get_by_key(
                            ['workspace_id' => (int) $app->asset_workspace_id,
                             'menu_type' => 9,
                             'model' => 'asset'], null, 'id' );
                if (! $displayoption->id ) {
                    continue;
                }
            }
            foreach ( $relation_cols as $column => $model ) {
                if ( $model === $hidden ) {
                    $hidden_cols[] = $column;
                }
            }
        }
        foreach ( $hidden_cols as $hidden_col ) {
            $search = array_search( $hidden_col, $display_options );
            unset( $display_options[ $search ] );
        }
        $asset_table = $asset_table ? $asset_table : $app->get_table( 'asset' );
        if (! $asset_table->dialog_view ) {
            // CustomFields.
            $workspace_id = is_numeric( $app->asset_workspace_id ) ? (int) $app->asset_workspace_id : $workspace_id;
            $displayoption = $app->db->model( 'displayoption' )->get_by_key(
                            ['workspace_id' => $workspace_id,
                             'menu_type' => 9,
                             'model' => 'asset'], null, 'id' );
            if ( $displayoption->id ) {
                $types = ['asset', 'assets', 'image', 'images'];
                $obj = $app->db->model( $model );
                $fields = PTUtil::get_fields( $obj, 'types' );
                foreach ( $fields as $basename => $prop ) {
                    if ( in_array( $prop['type'], $types ) ) {
                        $search = array_search( "field-{$basename}", $display_options );
                        unset( $display_options[ $search ] );
                    }
                }
            }
        }
        $app->ctx->vars['display_options'] = $display_options;
    }

    function post_save_object ( $cb, $app, $obj, $original ) {
        if ( $app->param( '__obj_display_opt' ) ) {
            $individual_options = rawurldecode( $app->param( '__obj_display_opt' ) );
            parse_str( $individual_options, $params );
            unset( $params['__mode'], $params['_type'], $params['_model'], $params['magic_token'],
                   $params['field_sort_order'], $params['_d_'] );
            $params = array_keys( $params );
            array_walk( $params, function( &$str ) { $str = preg_replace( '/^_d_/', '', $str ); } );
            $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $obj->_model,
                                                            'object_id' => $obj->id,
                                                            'kind' => 'individual_options'] );
            $meta->text( implode( ',', $params ) );
            $meta->save();
        }
        return true;
    }

    function pre_load_objects ( &$cb, $app, &$terms, $args, $cols, &$extra = '' ) {
        if (! $this->stash( 'model_displayoption' ) ) return;
        $tag_args = $cb['args'];
        if (! isset( $tag_args['this_tag'] ) || $tag_args['this_tag'] != 'tables' ) {
            return;
        }
        $workspace_id = $app->workspace() ? (int)$app->workspace()->id : 0;
        if ( isset( $terms['display_system'] )
            && $terms['display_system'] && $workspace_id ) {
            $workspace_id = 0;
        }
        $displayoptions = $this->stash( 'current_displayoptions_' . $workspace_id )
                        ? $this->stash( 'current_displayoptions_' . $workspace_id )
                        : $app->db->model( 'displayoption' )->load(
                                        ['workspace_id' => $workspace_id] );
        $this->stash( 'current_displayoptions_' . $workspace_id , $displayoptions );
        if ( empty( $displayoptions ) ) return;
        $target_names = [];
        if ( isset( $terms['name'] ) && isset( $terms['name']['IN'] ) ) {
            $target_names = $terms['name']['IN'];
        }
        if ( isset( $terms['menu_type'] ) ) {
            $type = $terms['menu_type'];
            $permissions = $app->permissions();
            $exclude_models = [];
            $include_models = [];
            foreach ( $displayoptions as $displayoption ) {
                $pos = array_search( $displayoption->model , $target_names );
                if ( $displayoption->menu_type != $type ) {
                    $exclude_models[] = $displayoption->model;
                    if ( $pos !== false ) {
                        unset( $target_names[ $pos ] );
                    }
                } else {
                    $include_models[] = $displayoption->model;
                    if ( $workspace_id || $app->user()->is_superuser ) {
                        if (! $app->can_do( $displayoption->model, 'list' ) ) {
                            continue;
                        }
                    } else {
                        if (! $this->can_do( $app, $displayoption->model, $permissions ) ) {
                            continue;
                        }
                    }
                    if ( $pos === false ) $target_names[] = $displayoption->model;
                }
            }
            $_extra = '';
            if (! empty( $exclude_models ) ) {
                $expressions = [];
                foreach ( $exclude_models as $model ) {
                    $model = $app->db->quote( $model );
                    $expressions[] = " table_name!={$model} ";
                }
                if (! empty( $expressions ) ) {
                    $_extra .= ' AND (' . implode( ' AND ', $expressions ) . ') ';
                }
            }
            if (! empty( $include_models ) ) {
                $expressions = [];
                foreach ( $include_models as $model ) {
                    if ( $workspace_id || $app->user()->is_superuser ) {
                        if (! $app->can_do( $model, 'list' ) ) {
                            continue;
                        }
                    } else {
                        if (! $this->can_do( $app, $model, $permissions ) ) {
                            continue;
                        }
                    }
                    $model = $app->db->quote( $model );
                    $expressions[] = " table_name={$model} ";
                }
                if (! empty( $expressions ) ) {
                    $_extra .= ' OR (' . implode( ' OR ', $expressions ) . ') ';
                }
            }
            $extra .= $_extra;
            if ( isset( $terms['name'] ) && isset( $terms['name']['IN'] ) ) {
                $_target_names = [];
                foreach ( $target_names as $target_name ) {
                    if ( $workspace_id || $app->user()->is_superuser ) {
                        if ( $app->can_do( $target_name, 'list' ) ) {
                            $_target_names[] = $target_name;
                        }
                    } else {
                        if ( $this->can_do( $app, $target_name, $permissions ) ) {
                            $_target_names[] = $target_name;
                        }
                    }
                }
                if (! empty( $_target_names ) ) {
                    $terms['name']['IN'] = $_target_names;
                }
            }
        } else if ( isset( $terms['display_dashboard'] ) ) {
            $expressions = [];
            foreach ( $displayoptions as $displayoption ) {
                if ( $displayoption->menu_type == 9 ) {
                    $model = $app->db->quote( $displayoption->model );
                    $expressions[] = " table_name!={$model} ";
                }
            }
            if (! empty( $expressions ) ) {
                $extra .= ' AND (' . implode( ' AND ', $expressions ) . ') ';
            }
        }
    }

    function can_do ( $app, $model, $permissions ) {
        if ( $app->db->model( $model )->has_column( 'parent_id' ) ) {
            if (! isset( $permissions[0] ) ) {
                return false;
            }
            $permissions = [ 0 => $permissions[0] ];
        }
        foreach ( $permissions as $permission ) {
            if ( in_array( 'workspace_admin', $permission ) ||
                in_array( "can_list_{$model}", $permission ) ) {
                return true;
                break;
            }
        }
        return false;
    }

    function start_listing ( &$cb, $app ) {
        if (! $this->stash( 'model_displayoption' ) ) return;
        $workspace_id = $app->workspace() ? (int)$app->workspace()->id : 0;
        $model = $cb['model'];
        if (! $app->db->model( $model )->has_column( 'workspace_id' ) ) {
            $workspace_id = 0;
        }
        $list_option = $app->get_user_opt( $model, 'list_option', $workspace_id );
        $scheme = $cb['scheme'];
        $displayoption = $this->stash( 'current_displayoption' );
        if (! $displayoption ) return;
        if ( $this->exclude_case( $app, $displayoption, $workspace_id ) ) {
            return;
        }
        if (! $displayoption->list_columns ) {
            return;
        }
        $user_options = $app->stash( 'user_options' );
        $app->stash( 'user_options', $app->db->model( 'option' )->new() );
        if ( $list_columns = $displayoption->list_columns ) {
            $list_columns = json_decode( $list_columns, true );
            if ( empty( $list_columns ) ) return true;
            if ( is_array( $list_columns ) && isset( $list_columns['columns'] ) ) {
                $columns = $list_columns['columns'];
                if ( $list_columns['can_hide_in_list'] ) {
                    if ( $list_option->id ) {
                        $list_options = explode( ',', $list_option->option );
                        foreach ( $columns as $idx => $value ) {
                            if (! in_array( $value, $list_options ) ) {
                                unset( $columns[ $idx ] );
                            }
                        }
                    }
                }
                $can_sort_in_list = $list_columns['can_sort_in_list'] ?? false;
                $user_options->option( implode( ',', $columns ) );
                if ( $displayoption->has_column( 'sort_by' ) && $displayoption->sort_by ) {
                    if (! $can_sort_in_list ) {
                        $sort_by = $displayoption->sort_by;
                        $sort_order = $displayoption->sort_order ? $displayoption->sort_order : 'ascend';
                        $user_options->extra( "{$sort_by},{$sort_order}" );
                    }
                }
                $app->stash( 'user_options', $user_options );
                $scheme['default_list_items'] = $columns;
                $cb['scheme'] = $scheme;
            }
        }
    }

    function exclude_case ( $app, $displayoption, $workspace_id ) {
        if ( $app->user()->is_superuser ) {
            return $displayoption->exclude_superuser;
        }
        $is_admin = $workspace_id ? $app->is_workspace_admin( $workspace_id ) : false;
        if ( $is_admin ) {
            return $displayoption->exclude_ws_admin;
        }
        $group_name = $app->permission_group( $app->user(), $displayoption->model, $workspace_id );
        if ( $displayoption->exclude_publisher && $group_name == 'publisher' ) {
            return true;
        }
        if ( $displayoption->exclude_reviewer && $group_name == 'reviewer' ) {
            return true;
        }
        return false;
    }

    function pre_save_displayoption ( $cb, $app, &$obj, $original ) {
        if (! $this->stash( 'model_displayoption' ) ) return;
        $params = $app->param();
        $columns = [];
        $displays = [];
        $orders = [];
        $list_orders = [];
        $data = [];
        $list_data = [];
        $list_columns = [];
        $list_displays = [];
        $can_save = false;
        foreach ( $params as $key => $value ) {
            if ( strpos( $key, '_column-' ) === 0 ) {
                $col_name = preg_replace( '/_column\-/', '', $key );
                $orders[] = $col_name;
                $displays[] = ['name' => $col_name, 'diaplay' => $value ]; // typo...
                if ( $value ) {
                    $columns[] = $col_name;
                }
                $can_save = true;
            } else if ( strpos( $key, '_customize-' ) === 0 ) {
                $customize_name = preg_replace( '/_customize\-/', '', $key );
                $data[ $customize_name ] = $value;
                $can_save = true;
            } else if ( strpos( $key, '_list_column-' ) === 0 ) {
                $col_name = preg_replace( '/_list_column\-/', '', $key );
                $list_orders[] = $col_name;
                $list_displays[] = ['name' => $col_name, 'diaplay' => $value ];
                if ( $value ) {
                    $list_columns[] = $col_name;
                }
                $can_save = true;
            } else if ( strpos( $key, '_customize_list-' ) === 0 ) {
                $customize_name = preg_replace( '/_customize_list\-/', '', $key );
                $list_data[ $customize_name ] = $value;
                $can_save = true;
            }
        }
        if ( $can_save ) {
            $data['columns'] = $columns;
            $data['orders'] = $orders;
            $data['displays'] = $displays;
            $list_data['columns'] = $list_columns;
            $list_data['displays'] = $list_displays;
            $list_data['orders'] = $list_orders;
            $obj->edit_columns( json_encode( $data ) );
            $obj->list_columns( json_encode( $list_data ) );
        }
        if (! $obj->id ) {
            $table = $app->get_table( $obj->model );
            $obj->menu_type( $table->menu_type );
        }
        return true;
    }

    function post_save_displayoption ( $cb, $app, $obj, $original ) {
        $table = $app->get_table( $obj->model );
        $relation = $app->db->model( 'relation' )->get_by_key(
                    ['from_id' => $table->id, 'from_obj' => 'table',
                     'name' => 'workspaces', 'to_obj' => 'workspace',
                     'to_id' => (int) $obj->workspace_id ] );
        if ( $obj->menu_type == 9 && $relation->id ) {
            $relation->remove();
        } else if ( $obj->menu_type != 9 && ! $relation->id ) {
            $relations = $app->load_related_objs( $table, 'workspace' );
            if (! empty( $relations ) ) {
                $last = $app->db->model( 'relation' )->get_by_key(
                    ['from_id' => $table->id, 'from_obj' => 'table',
                     'name' => 'workspaces', 'to_obj' => 'workspace'],
                    ['sort' => 'order', 'direction' => 'descend'] );
                $relation->order( $last->order + 1 );
                $relation->save();
            }
        }
        return true;
    }

    function post_delete_displayoption ( $cb, $app, $obj, $original ) {
        $table = $app->get_table( $obj->model );
        $relation = $app->db->model( 'relation' )->get_by_key(
                    ['from_id' => $table->id, 'from_obj' => 'table',
                     'name' => 'workspaces', 'to_obj' => 'workspace',
                     'to_id' => (int) $obj->workspace_id ] );
        $relations = $app->load_related_objs( $table, 'workspace' );
        if (! empty( $relations ) && ! $relation->id ) {
            $last = $app->db->model( 'relation' )->get_by_key(
                ['from_id' => $table->id, 'from_obj' => 'table',
                 'name' => 'workspaces', 'to_obj' => 'workspace'],
                ['sort' => 'order', 'direction' => 'descend'] );
            $relation->order( $last->order + 1 );
            $relation->save();
        }
        return true;
    }

    function post_save_table ( $cb, $app, $obj, $original ) {
        $relations = $app->load_related_objs( $obj, 'workspace' );
        $scheme = $app->get_scheme_from_db( $obj->name );
        if (! empty( $relations ) ) {
            $workspace_ids = [];
            foreach ( $relations as $ws ) {
                $workspace_ids[ $ws->id ] = true;
            }
            $all_spaces = $app->db->model( 'workspace' )->load( [], [], 'id' );
            foreach ( $all_spaces as $workspace ) {
                $displayoption =
                      $app->db->model( 'displayoption' )->get_by_key(
                          ['workspace_id' => $workspace->id, 'model' => $obj->name ] );
                if ( isset( $workspace_ids[ $workspace->id ] ) ) {
                    if ( $displayoption->id && $displayoption->menu_type == 9 ) {
                        $menu_type = 2;
                        if ( is_array( $scheme ) && isset( $scheme['menu_type'] ) ) {
                            $menu_type = $scheme['menu_type'];
                        }
                        $displayoption->menu_type( $menu_type );
                        $app->set_default( $displayoption );
                        $displayoption->save();
                    }
                } else {
                    if ( $displayoption->menu_type != 9 ) {
                        $displayoption->menu_type( 9 );
                        $app->set_default( $displayoption );
                        $displayoption->save();
                    }
                }
            }
        } else {
            if ( is_array( $original->_relations ) && !empty( $original->_relations ) ) {
                $relations = $original->_relations;
                $has_setting = false;
                foreach ( $relations as $relation ) {
                    if ( $relation->name == 'workspaces' ) {
                        $has_setting = true;
                        break;
                    }
                }
                if ( $has_setting ) {
                    $displayoptions =
                        $app->db->model( 'displayoption' )->load(
                            ['model' => $obj->name, 'menu_type' => 9 ] );
                    foreach ( $displayoptions as $displayoption ) {
                        $menu_type = 2;
                        if ( is_array( $scheme ) && isset( $scheme['menu_type'] ) ) {
                            $menu_type = $scheme['menu_type'];
                        }
                        $displayoption->menu_type( $menu_type );
                        $app->set_default( $displayoption );
                        $displayoption->save();
                    }
                }
            }
        }
        return true;
    }

    function post_save_workspace ( $cb, $app, $obj, $original ) {
        if ( isset( $cb['is_new'] ) && $cb['is_new'] ) {
            $params = ['group' => ['from_id'] ];
            $terms  = ['name' => 'workspaces', 'from_obj' => 'table'];
            $relations = $app->db->model( 'relation' )->count_group_by( $terms, $params );
            $table_ids = [];
            foreach ( $relations as $relation ) {
                $table_ids[] = $relation['relation_from_id'];
            }
            if ( $app->displayoptions_add_new_workspace ) {
                foreach ( $table_ids as $table_id ) {
                    $last = $app->db->model( 'relation' )->get_by_key(
                        ['from_id' => $table_id, 'from_obj' => 'table',
                         'name' => 'workspaces', 'to_obj' => 'workspace'],
                        ['sort' => 'order', 'direction' => 'descend'] );
                    $new = $app->db->model( 'relation' )->get_by_key(
                        ['from_id' => $table_id, 'from_obj' => 'table',
                         'name' => 'workspaces', 'to_id' => $obj->id, 'to_obj' => 'workspace'] );
                    $new->order( $last->order + 1 );
                    $new->save();
                }
            } else {
                foreach ( $table_ids as $table_id ) {
                    $table = $app->db->model( 'table' )->load( (int) $table_id );
                    if (! $table ) continue;
                    $displayoption
                        = $app->db->model( 'displayoption' )->get_by_key(
                          ['workspace_id' => $obj->id,
                           'model' => $table->name ]);
                    $displayoption->menu_type( 9 );
                    $app->set_default( $displayoption );
                    $displayoption->save();
                }
            }
        }
        return true;
    }

    function hdlr_get_menu_position ( $args, $ctx ) {
        $app = $ctx->app;
        $workspace_id = $app->workspace() ? (int)$app->workspace()->id : 0;
        $table = $app->get_table( $ctx->local_vars['name'] );
        $display_option =
          $app->db->model( 'displayoption' )->get_by_key(
            ['model' => $table->name, 'workspace_id' => $workspace_id ] );
        return $display_option->id ? $display_option->menu_type : $table->menu_type;
    }

    function customize_menus ( $app ) {
        $workspace_id = $app->workspace() ? (int)$app->workspace()->id : 0;
        if ( $app->request_method === 'POST' ) {
            $update = 0;
            $app->validate_magic();
            $params = $app->param();
            foreach ( $params as $key => $param ) {
                if ( strpos( $key, 'menu_type_' ) !== 0 ) {
                    continue;
                }
                $param = (int) $param;
                $key = preg_replace( '/^menu_type_/', '', $key );
                $table = $app->get_table( $key );
                if (! $table ) return;
                $display_option =
                  $app->db->model( 'displayoption' )->get_by_key(
                    ['model' => $table->name, 'workspace_id' => $workspace_id ] );
                $menu_type = $display_option->id ? $display_option->menu_type : $table->menu_type;
                if ( $menu_type != $param ) {
                    $display_option->menu_type( $param );
                    $app->set_default( $display_option );
                    $display_option->save();
                    $update++;
                }
            }
            $redirect_url = $app->admin_url . '?__mode=customize_menus';
            $redirect_url .= $workspace_id ? '&workspace_id=' . $workspace_id : '';
            $redirect_url .= '&saved=1&update=' . (int) $update;
            $app->redirect( $redirect_url );
        }
        return $app->__mode( 'customize_menus' );
    }

    function template_source_list ( $cb, $app, $param, $src ) {
        if (! $this->stash( 'model_displayoption' ) ) return true;
        $ctx = $app->ctx;
        $model = $cb['model'];
        $displayoption = $this->stash( 'current_displayoption' );
        $workspace_id = $app->workspace() ? (int)$app->workspace()->id : 0;
        if (! $displayoption ) return true;
        if ( $this->exclude_case( $app, $displayoption, $workspace_id ) ) {
            return true;
        }
        if ( $displayoption && $displayoption->id ) {
            $list_columns = $displayoption->list_columns;
            $props = $list_columns ? json_decode( $list_columns, true ) : [];
            if ( empty( $props ) ) return true;
            $disp_options = $ctx->vars['disp_options'];
            $overwrite_options = [];
            $hide_list_options = $ctx->vars['hide_list_options'];
            $col_settings = $props['columns'];
            foreach ( $disp_options as $col => $disp_option ) {
                $disp_option[1] = in_array( $col, $col_settings ) ? 1 : 0;
                if (! in_array( $col, $col_settings ) ) {
                    $hide_list_options[] = $col;
                }
                $overwrite_options[ $col ] = $disp_option;
            }
            $ctx->vars['cant_hide_in_list'] = false;
            if (! $props['can_hide_in_list'] ) {
                $ctx->vars['disp_options'] = $overwrite_options;
                $ctx->vars['cant_hide_in_list'] = true;
            }
            $ctx->vars['can_hide_in_list'] = $props['can_hide_in_list'];
            $ctx->vars['hide_list_options'] = $hide_list_options;
            if ( $displayoption->has_column( 'sort_by' ) && $displayoption->sort_by ) {
                // $sort_by = $displayoption->sort_by;
                // $sort_order = $displayoption->sort_order ? $displayoption->sort_order : 'ascend';
                $can_sort_in_list = $props['can_sort_in_list'] ?? false;
                if (!$can_sort_in_list ) {
                    unset( $ctx->vars['sort_options'] );
                }
            }
        }
        return true;
    }

    function template_source_edit ( $cb, &$app, $param, &$src ) {
        if (! $this->stash( 'model_displayoption' ) ) return true;
        $ctx = $app->ctx;
        $model = $cb['model'];
        $workspace_id = $app->workspace() ? (int)$app->workspace()->id : 0;
        if (! $app->db->model( $model )->has_column( 'workspace_id' ) ) {
            $workspace_id = 0;
        }
        if ( $model == 'displayoption' ) {
            $obj = $ctx->stash( 'object' );
            if (! $obj ) return true;
            if (! $obj->model ) return true;
            $edit_columns = $obj->edit_columns;
            if ( $edit_columns ) {
                $props = json_decode( $edit_columns, true );
                if ( is_array( $props ) ) {
                    $ctx->vars['show_edit_columns'] = $props['columns'];
                    $orders = $props['orders'];
                    $ctx->vars['column_edit_orders'] = json_encode( $orders );
                    $ctx->vars['column_edit_orders_array'] = $orders;
                    if ( isset( $props['can_hide_in_edit'] ) ) {
                        $ctx->vars['can_hide_in_edit'] = $props['can_hide_in_edit'];
                    }
                    if ( isset( $props['can_sort_in_edit'] ) ) {
                        $ctx->vars['can_sort_in_edit'] = $props['can_sort_in_edit'];
                    }
                    if ( isset( $props['can_individual_options'] ) ) {
                        $ctx->vars['can_individual_options'] = $props['can_individual_options'];
                    }
                }
            }
            $ctx->vars['_force_display'] = ['user_id', 'status'];
            $table = $app->get_table( $obj->model );
            $model_obj = $app->db->model( $obj->model )->new();
            if ( $obj->menu_type ) {
                $ctx->vars['_menu_type'] = $obj->menu_type;
            } else {
                $ctx->vars['_menu_type'] = $table->menu_type;
            }
            $fields = PTUtil::get_fields( $model_obj );
            $customFields = [];
            foreach ( $fields as $field ) {
                $name = $field->name;
                $translate = $field->translate;
                if ( $translate ) $name = $app->translate( $name );
                $basename = $field->basename;
                $customFields[] = ['name' => $name, 'basename' => $basename ];
            }
            $ctx->vars['field_loop'] = $customFields;
            $scheme = $app->get_scheme_from_db( $obj->model );
            $hide_edit_options = [];
            if ( isset( $scheme['hide_edit_options'] ) ) {
                $hide_edit_options = $scheme['hide_edit_options'];
                if ( is_string( $hide_edit_options ) ) {
                    $hide_edit_options = [ $hide_edit_options ];
                }
            }
            $hide_edit_options[] = 'published_on';
            $hide_edit_options[] = 'unpublished_on';
            $ctx->vars['__hide_edit_options'] = array_unique( $hide_edit_options );
            if ( $table->revisable ) {
                $ctx->vars['__hide_list_options'] = ['rev_note', 'rev_diff', 'rev_type', 'rev_changed'];
            }
            $list_columns = $obj->list_columns;
            if ( $list_columns ) {
                $props = json_decode( $list_columns, true );
                if ( is_array( $props ) ) {
                    $ctx->vars['show_list_columns'] = $props['columns'];
                    if ( isset( $props['orders'] ) ) {
                        $orders = $props['orders'];
                        $ctx->vars['column_list_orders'] = json_encode( $orders );
                        $ctx->vars['column_list_orders_array'] = $orders;
                    } else {
                        $ctx->vars['column_list_orders'] = '';
                        $ctx->vars['column_list_orders_array'] = [];
                    }
                    if ( isset( $props['can_hide_in_list'] ) )
                        $ctx->vars['can_hide_in_list'] = $props['can_hide_in_list'];
                    if ( isset( $props['can_sort_in_list'] ) )
                        $ctx->vars['can_sort_in_list'] = $props['can_sort_in_list'];
                }
            } else if ( isset( $scheme['default_list_items'] ) ) {
                $ctx->vars['show_list_columns'] = $scheme['default_list_items'];
            } else {
                $user_options = array_keys( $scheme['list_properties'] );
                $user_options = array_slice( $user_options, 0, 7 );
                if (! $app->workspace() && ! in_array( 'workspace_id', $user_options )
                    && $obj->has_column( 'workspace_id' ) ) {
                    $user_options[] = 'workspace_id';
                }
                if ( $table->primary && ! in_array( $table->primary, $user_options ) ) {
                    array_unshift( $user_options, $table->primary );
                }
                $ctx->vars['show_list_columns'] = $user_options;
            }
        }
        $displayoption = $app->db->model( 'displayoption' )->get_by_key(
            ['workspace_id' => $workspace_id, 'model' => $model] );
        if ( $displayoption->id && $displayoption->edit_columns ) {
            $edit_columns = $displayoption->edit_columns;
            $props = $edit_columns ? json_decode( $edit_columns, true ) : [];
            if (! empty( $props ) ) {
                if ( is_array( $props ) && isset( $props['can_individual_options'] ) ) {
                    $can_individual_options = $props['can_individual_options'];
                    if ( $can_individual_options ) {
                        $add_save_event = isset( $ctx->vars['__add_save_event'] )
                                          ? $ctx->vars['__add_save_event'] : '';
                        $add_save_event .= file_get_contents( $this->path(). DS . 'tmpl' . DS . 'add_save_event.tmpl' );
                        $ctx->vars['__add_save_event'] = $add_save_event;
                        $pointer = preg_quote( '<mt:var name="form_header">', '/' );
                        $src = preg_replace( "/($pointer)/",
                               '$1<input type="hidden" name="__obj_display_opt" id="__obj_display_opt" value="">',
                               $src );
                    }
                }
            }
            if ( $app->param( 'id' ) && $displayoption->edit_columns ){
                $obj_option = json_decode( $displayoption->edit_columns );
                if ( is_object( $obj_option )
                    && property_exists( $obj_option, 'can_individual_options' ) ) {
                    if ( $obj_option->can_individual_options ) {
                        $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $app->param( '_model' ),
                                                                'object_id' => $app->param( 'id' ),
                                                                'kind' => 'individual_options'] );
                        if ( $meta->id ) {
                            $options = explode( ',', $meta->text );
                            $orig_order = $ctx->vars['_field_sort_order'];
                            if ( $orig_order ) {
                                $orig_order = explode( ',', $orig_order );
                                foreach ( $orig_order as $idx => $option ) {
                                    if (! in_array( $option, $options ) ) {
                                        array_splice( $options, $idx + 1, 0, $option );
                                    }
                                }
                            }
                            $ctx->vars['_field_sort_order'] = implode( ',', $options );
                            $ctx->vars['display_options'] = explode( ',', $meta->text );
                            $this->stash( 'individual_displayoption', 1 );
                        }
                    }
                }
            }
            if ( $this->exclude_case( $app, $displayoption, $workspace_id ) ) {
                return true;
            }
            $overwrite_options = [];
            $can_hide_in_edit = false;
            $can_sort_in_edit = false;
            $can_individual_options = false;
            if ( is_array( $props ) && isset( $props['columns'] ) ) {
                $overwrite_options = $props['columns'];
            }
            if ( is_array( $props ) && isset( $props['can_hide_in_edit'] ) ) {
                $can_hide_in_edit = $props['can_hide_in_edit'];
            }
            if ( is_array( $props ) && isset( $props['can_sort_in_edit'] ) ) {
                $can_sort_in_edit = $props['can_sort_in_edit'];
            }
            if (! $can_hide_in_edit ) {
                $ctx->vars['_can_hide_edit_col'] = false;
                $hide_edit_options = [];
                $display_options = $ctx->vars['display_options'];
                $table = $app->get_table( $model );
                $columns = $app->db->model( 'column' )->load( ['table_id' => $table->id ] );
                foreach ( $columns as $column ) {
                    if (! in_array( $column->name, $overwrite_options ) ) {
                        $hide_edit_options[] = $column->name;
                    }
                }
                $obj = $ctx->stash( 'object' );
                $fields = PTUtil::get_fields( $obj );
                foreach ( $fields as $field ) {
                    $field_name = $field->basename;
                    $field_name = "field-{$field_name}";
                    if (! in_array( $field_name, $overwrite_options ) ) {
                        $hide_edit_options[] = $field_name;
                    }
                }
                $ctx->vars['__hide_edit_options'] = $hide_edit_options;
            }
            if (! $this->stash( 'individual_displayoption' ) ) {
                if (! $can_hide_in_edit && !empty( $overwrite_options ) ) {
                    $ctx->vars['display_options'] = $props['columns'];
                } else if ( !empty( $overwrite_options ) ) {
                    $user_option = $app->get_user_opt( $model, 'edit_option', $workspace_id );
                    if (! $user_option->id ) {
                        $ctx->vars['display_options'] = $props['columns'];
                    }
                }
            }
            if (! $app->displayoptions_v1_compat && isset( $props['displays'] )
                && is_array( $props['displays'] ) ) {
                $displays = $props['displays'];
                $not_display = [];
                foreach ( $displays as $display ) {
                    $disp_col = isset( $display['diaplay'] ) ? (int) $display['diaplay'] : 1;
                    if (! $disp_col ) {
                        $not_display[] = $display['name'];
                    }
                }
                if (!isset( $ctx->vars['hide_edit_options'] ) ) $ctx->vars['hide_edit_options']  = [];
                $ctx->vars['hide_edit_options'] = array_merge( $not_display, $ctx->vars['hide_edit_options'] );
            }
            if (! $can_sort_in_edit ) {
                $ctx->vars['_can_sort_edit_col'] = false;
            }
            if (! isset( $ctx->vars['_field_sort_order'] )
                || ! $ctx->vars['_field_sort_order'] ) {
                $can_sort_in_edit = false;
            }
            if (! $can_sort_in_edit && is_array( $props ) && isset( $props['orders'] ) ) {
                if (! $this->stash( 'individual_displayoption' ) ) {
                    $ctx->vars['_field_sort_order'] = implode( ',', $props['orders'] );
                }
            }
            if (! $can_hide_in_edit && ! $can_sort_in_edit ) {
                $html_head = isset( $ctx->vars['html_head'] ) ? $ctx->vars['html_head'] : '';
                $html_head .= '<style>.disp-option{display:none;}.title-with-opt{margin-top: -4px !important;}</style>';
                $ctx->vars['html_head'] = $html_head;
                $ctx->vars['has_option'] = 0;
            }
        }
        return true;
    }

    function permission_can_do ( $cb, $app, $model, $action, $obj, $workspace ) {
        if ( $model && isset( $cb['tag_args'] ) ) {
            $args = $cb['tag_args'];
            $plugin = $app->component( 'DisplayOptions' );
            if ( $app->mode == 'manage_plugins' ) {
                $plugin_switch = $app->plugin_switch;
                if (! isset( $plugin_switch['displayoptions'] ) ) {
                    $plugin = null;
                } else {
                    $plugin_switch = $plugin_switch['displayoptions'];
                    $plugin = $plugin_switch->number;
                }
                if ( $plugin ) {
                    $plugin = $app->get_table( 'displayoption' );
                }
            }
            if ( $plugin ) {
                // Can not create when the menu_type is '9'.
                $workspace_id = $args['workspace_id'] ?? '';
                if ( is_numeric( $workspace_id ) ) {
                    $workspace_id = (int) $workspace_id;
                    if ( $action == 'create' ) {
                        $table = $app->get_table( $model );
                        if (! $table->display_space ) {
                            // Only can create in System.
                            $workspace_id = 0;
                        }
                    }
                    $option = $app->db->model( 'displayoption' )->get_by_key(
                        ['model' => $model, 'workspace_id' => $workspace_id ], null, 'menu_type' );
                    if ( $option->menu_type == 9 ) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}