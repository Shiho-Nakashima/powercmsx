<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class GetHierarchy extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function hdlr_gethierarchy ( $args, $ctx ) {
        $app = $ctx->app;
        $model = isset( $args['model'] ) ? $args['model'] : null;
        if ( $model === null ) {
            if ( isset( $args['var_dump'] ) ) {
                var_dump( [] );
            }
            return [];
        }
        $app->get_scheme_from_db( $model );
        $table = $app->get_table( $model );
        if (!$table ) {
            if ( isset( $args['var_dump'] ) ) {
                var_dump( [] );
            }
            return [];
        }
        $_args = $args;
        $cols = isset( $_args['cols'] ) ? $_args['cols'] : '*';
        $include_draft = isset( $_args['include_draft'] ) ? $_args['include_draft'] : null;
        $with_relation = isset( $_args['with_relation'] ) ? 'api' : 'list';
        unset( $_args['this_tag'], $_args['model'], $_args['var_dump'], $_args['to_json'],
               $_args['setvar'], $_args['cols'], $_args['include_draft'] );
        $terms = [];
        $obj = $app->db->model( $model );
        foreach ( $_args as $column => $value ) {
            if ( $obj->has_column( $column ) ) {
                $terms[ $column ] = $value;
            }
        }
        $extra = '';
        if ( $obj->has_column( 'workspace_id' ) ) {
            $tags = new PTTags;
            $extra = $tags->include_exclude_workspaces( $app, $args, $obj );
            if ( $extra ) {
                $extra = ' AND ' . $obj->_model . "_workspace_id {$extra}";
            }
        }
        if ( $obj->has_column( 'status' ) && !$include_draft ) {
            $published = $app->status_published( $model );
            $terms['status'] = $published;
        }
        $objects = $obj->load( $terms, [], $cols, $extra );
        $items = [];
        foreach ( $objects as $object ) {
            $resource = PTUtil::object_to_resource( $object, $with_relation );
            $children = $this->get_children( $app, $object, $args, $cols );
            if (! empty( $children ) ) {
                $resource['__children__'] = $children;
            }
            $items[] = $resource;
        }
        if ( isset( $args['var_dump'] ) ) {
            var_dump( $items );
        }
        return $items;
    }

    function get_children ( $app, $obj, $args, $cols ) {
        $include_draft = isset( $_args['include_draft'] ) ? $_args['include_draft'] : null;
        $with_relation = isset( $_args['with_relation'] ) ? 'api' : 'list';
        $terms = ['parent_id' => $obj->id ];
        if ( $obj->has_column( 'status' ) && !$include_draft ) {
            $published = $app->status_published( $model );
            $terms['status'] = $published;
        }
        $objects = $obj->load( $terms, [], $cols );
        $items = [];
        foreach ( $objects as $object ) {
            $resource = PTUtil::object_to_resource( $object, $with_relation );
            $children = $this->get_children( $app, $object, $args, $cols );
            if (! empty( $children ) ) {
                $resource['__children__'] = $children;
            }
            $items[] = $resource;
        }
        return $items;
    }

    function hdlr_getmenustructure ( $args, $ctx ) {
        $app = $ctx->app;
        $name = isset( $args['name'] ) ? $args['name'] : null;
        $id = isset( $args['id'] ) ? (int) $args['id'] : null;
        $basename = isset( $args['basename'] ) ? $args['basename'] : null;
        $global = isset( $args['global'] ) ? (int) $args['global'] : null;
        $workspace_id = isset( $args['workspace_id'] )
                      ? (int) $args['workspace_id'] : null;
        if ( $workspace_id === null ) {
            $current_template = $ctx->stash( 'current_template' );
            if ( $current_template && $current_template->workspace_id ) {
                $workspace_id = (int) $current_template->workspace_id;
            }
        }
        $terms = [];
        $params = [];
        if ( $global ) {
            $terms['workspace_id'] = 0;
        } else {
            if ( $workspace_id === null && $ctx->stash( 'workspace' ) ) {
                $workspace = $ctx->stash( 'workspace' );
                $workspace_id = (int) $workspace->id;
                $terms['workspace_id'] = ['IN' => [0, $workspace_id ]];
                $params['sort'] = 'workspace_id';
                $params['direction'] = 'descend';
            } else if ( $workspace_id !== null ) {
                $terms['workspace_id'] = $workspace_id;
            }
        }
        if ( $name ) {
            $terms['name'] = $name;
        } else if ( $id ) {
            $terms['id'] = $id;
        } else if ( $basename ) {
            $terms['basename'] = $basename;
        }
        $app->get_scheme_from_db( 'menu' );
        if (! $id && ! $name && ! $basename ) {
            $menu = $app->db->model( 'menu' )->new( ['parent_id' => '0' ] );
            $results = $this->get_menu_items( $app, $menu, $args );
            $results = isset( $results['__children__'] ) ? $results['__children__'] : [];
        } else {
            $menu = $app->db->model( 'menu' )->get_by_key( $terms, $params );
            if (! $menu->id ) {
                if ( isset( $args['var_dump'] ) ) {
                    var_dump( [] );
                }
                return [];
            }
            $results = $this->get_menu_items( $app, $menu, $args );
        }
        if ( isset( $args['var_dump'] ) ) {
            var_dump( $results );
        }
        return $results;
    }

    function get_menu_items ( $app, $menu, $tag_args ) {
        $urls = $app->get_related_objs( $menu, 'urlinfo' );
        $params = [];
        $include_draft = isset( $tag_args['include_draft'] )
                       ? true : false;
        $column = isset( $tag_args['column'] ) ? $tag_args['column'] : '';
        $collback_models = [];
        foreach ( $urls as $url ) {
            if (! $url->model || ! $url->object_id ) {
                continue;
            }
            if ( $url->delete_flag ) continue;
            $table = $app->get_table( $url->model );
            if (! $table ) continue;
            $primary = $table->primary;
            $id = (int) $url->object_id;
            $_model = $app->db->model( $url->model );
            $terms = ['id' => $id];
            $args = ['limit' => 1];
            $cols = "id,{$primary}";
            if ( $column ) $cols .= ",{$column}";
            if ( $_model->has_column( 'status' ) && ! $include_draft ) {
                $status_published = (int) $app->status_published( $url->model );
                $terms['status'] = $status_published;
            }
            $extra = '';
            $ex_vals = [];
            if (! isset( $collback_models[ $url->model ] ) ) {
                $scheme = $app->get_scheme_from_db( $url->model );
                $app->init_callbacks( $url->model, 'pre_listing' );
                $app->init_callbacks( $url->model, 'post_load_objects' );
                $collback_models[ $url->model ] = true;
            }
            $callback = ['name' => 'pre_listing', 'model' => $url->model,
                         'scheme' => $scheme, 'table' => $table,
                         'args' => $tag_args ];
            $extra = '';
            $app->run_callbacks( $callback, $url->model, $terms, $args, $extra, $ex_vals );
            $objects = $_model->load( $terms, $args, $cols, $extra, $ex_vals );
            $callback = ['name' => 'post_load_objects', 'model' => $url->model,
                         'table' => $table ];
            $count_obj = count( $objects );
            $app->run_callbacks( $callback, $url->model, $objects, $count_obj );
            if (! $objects || ! count( $objects ) ) continue;
            $obj = $objects[0];
            $_params = [];
            $_params['__item_primary__'] = $obj->$primary;
            $_params['__item_label__'] = $obj->$primary;
            if ( $column && $obj->has_column( $column ) ) {
                $_params["__item_{$column}__"] = $obj->$column;
            }
            $_params['__item_id__'] = $id;
            $_params['__item_model__'] = $url->model;
            $_params['__item_url__'] = $url->url;
            $_params['__key__'] = $url->url;
            $_params['__value__'] = $obj->$primary;
            $params[] = $_params;
        }
        $args = [];
        $args['sort'] = 'order';
        $args['direction'] = 'ascend';
        $children = $app->db->model( 'menu' )->load( ['parent_id' => $menu->id ], $args );
        if (! empty( $children ) ) {
            $child_params = [];
            foreach ( $children as $child ) {
                $child_items = $this->get_menu_items( $app, $child, $tag_args );
                if (! empty( $child_items ) ) {
                    $child_params = array_merge( $child_params, $child_items );
                }
            }
            if (!empty( $child_params ) ) {
                $params['__children__'] = $child_params;
            }
        }
        return $params;
    }

}