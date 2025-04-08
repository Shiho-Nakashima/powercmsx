<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class TaxonomyUtils extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function pre_run ( $app ) {
        if ( $app->id !== 'Prototype'
            || $app->mode !== 'view'
            || $app->param( '_type' ) !== 'list'
            || !$app->param( '_model' ) ) {
            if (! $app->mode === 'list_action' ) {
                return;
            } else {
                $action_name = $app->param( 'action_name' );
                if ( $action_name !== 'action_add_taxonomies' && $action_name !== 'action_remove_taxonomies' ) {
                    return;
                }
            }
        }
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        if (! $table || ! $table->taxonomy ) {
            return;
        }
        $taxonomy_filter = ['name' => 'list_filter_taxonomy',
                            'label' => $this->translate( 'Filter by Taxonomy' ),
                            'input' => true,
                            'hint'  => $this->translate( 'Please Enter the Taxonomy Name.' ),
                            'component' => 'TaxonomyUtils',
                            'order' => 100,
                            'method' => 'list_filter_taxonomy'];
        $app->registry['system_filters']['list_filter_taxonomy'][ $model ]['list_filter_taxonomy'] = $taxonomy_filter;
        $taxonomy_filter = ['name' => 'list_filter_taxonomy_partial',
                            'label' => $this->translate( 'Filter by Taxonomy(Partial Match)' ),
                            'input' => true,
                            'hint'  => $this->translate( 'Please Enter the Taxonomy Name(Partial Match).' ),
                            'component' => 'TaxonomyUtils',
                            'order' => 100,
                            'method' => 'list_filter_taxonomy_partial'];
        $app->registry['system_filters']['list_filter_taxonomy_partial'][ $model ]['list_filter_taxonomy_partial'] = $taxonomy_filter;
        $taxonomy_action = ['name'  => 'action_add_taxonomies',
                            'label' => $this->translate( 'Add Taxonomies' ),
                            'component' => 'TaxonomyUtils',
                            'method' => 'action_add_taxonomies',
                            'input' => 1,
                            'columns' => 'id',
                            'order' => 200];
        $app->registry['list_actions']['action_add_taxonomies'][ $model ]['action_add_taxonomies'] = $taxonomy_action;
        $taxonomy_action = ['name'  => 'action_remove_taxonomies',
                            'label' => $this->translate( 'Remove Taxonomies' ),
                            'component' => 'TaxonomyUtils',
                            'method' => 'action_remove_taxonomies',
                            'input' => 1,
                            'columns' => 'id',
                            'order' => 201];
        $app->registry['list_actions']['action_remove_taxonomies'][ $model ]['action_remove_taxonomies'] = $taxonomy_action;
    }

    function list_filter_taxonomy ( $app, &$terms, $model, $option, $args, $extra, $ex_vars ) {
        $partial = is_bool( $ex_vars ) ? true : false;
        $option = PTUtil::normalize( $option );
        $option = PTUtil::normalize_tag( $option );
        if (!$option ) {
            $terms = ['id' => 0];
            return;
        }
        if ( $partial ) {
            $option = $app->db->escape_like( $option, true, true );
            $terms = ['normalize' => ['LIKE' => $option ] ];
        } else {
            $terms = ['normalize' => $option ];
        }
        $taxonomy = $app->db->model( 'taxonomy' )->get_by_key( $terms );
        if (! $taxonomy->id ) {
            $terms = ['id' => 0];
            return;
        }
        $relations = $app->db->model( 'relation' )->load_iter(
            ['from_obj' => $model, 'to_obj' => 'taxonomy', 'to_id' => $taxonomy->id ], null, 'from_id' );
        $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
        if ( empty( $relations ) ) {
            $terms = ['id' => 0];
            return;
        }
        $terms['id'] = ['IN' => $relations ];
    }

    function action_taxonomy_normalize ( $app, $objects, $action ) {
        $class = new PTListActions();
        $input = $app->param( 'itemset_action_input' );
        $model = $app->param( '_model' );
        $counter = 0;
        foreach ( $objects as $obj ) {
            if ( $obj->normalize ) {
                continue;
            }
            $normalize = PTUtil::normalize( $obj->name );
            $normalize = PTUtil::normalize_tag( $normalize );
            $obj->normalize( $normalize );
            $app->set_default( $obj );
            $obj->save();
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

    function list_filter_taxonomy_partial ( $app, &$terms, $model, $option, $args, $extra, $ex_vars ) {
        return $this->list_filter_taxonomy( $app, $terms, $model, $option, $args, $extra, true );
    }

    function action_add_taxonomies ( $app, $objects, $action, $add = true ) {
        $class = new PTListActions();
        $input = $app->param( 'itemset_action_input' );
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        $counter = 0;
        $add_taxonomies = $app->param( 'itemset_action_input' );
        if (! $add_taxonomies ) {
            $return_args =
                "__mode=view&_type=list&_model={$model}&apply_actions={$counter}"
                    . $app->workspace_param;
            if ( $add_params = $this->add_return_params( $app ) ) {
                $return_args .= "&{$add_params}";
            }
            $app->redirect( $app->admin_url . '?' . $return_args );
        }
        $name = 'taxonomies';
        $add_taxonomies = preg_split( '/\s*,\s*/', $add_taxonomies );
        $status_published = $app->status_published( $model );
        $taxonomy_ids = [];
        $taxonomy_objs = [];
        if (! $add ) {
            foreach ( $add_taxonomies as $taxonomy ) {
                $normalize = PTUtil::normalize( $taxonomy );
                $normalize = PTUtil::normalize_tag( $normalize );
                if (! $normalize ) continue;
                $terms = ['normalize' => $normalize ];
                $taxonomies = $app->db->model( 'taxonomy' )->load( $terms );
                if (! empty( $taxonomies ) ) {
                    $taxonomy_objs = array_merge( $taxonomy_objs, $taxonomies );
                }
            }
            if ( empty( $taxonomy_objs ) ) {
                $return_args =
                    "__mode=view&_type=list&_model={$model}&apply_actions={$counter}"
                    . $app->workspace_param;
                if ( $add_params = $this->add_return_params( $app ) ) {
                    $return_args .= "&{$add_params}";
                }
                $app->redirect( $app->admin_url . '?' . $return_args );
            }
            foreach ( $taxonomy_objs as $taxonomy ) {
                $taxonomy_ids[] = $taxonomy->id;
            }
        }
        $publish_ids = [];
        $workspace_ids = [];
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $app->core_save_callbacks( $model );
        $callback = ['name' => 'post_save', 'error' => '', 'is_new' => false ];
        $callbackObjs = [];
        foreach ( $objects as $obj ) {
            $res = false;
            $original = clone $obj;
            if ( $add ) {
                $res = $this->add_taxonomies_to_obj( $app, $obj, $add_taxonomies, $taxonomy_ids );
            } else {
                if ( $table->revisable ) {
                    $original->_meta = $app->get_meta( $obj );
                    $original->_relations = $app->get_relations( $obj );
                    $original->id( null );
                }
                $relations = $app->get_relations( $obj, 'taxonomy', $name );
                foreach ( $relations as $relation ) {
                    if ( in_array( $relation->to_id, $taxonomy_ids ) ) {
                        $res = $relation->remove();
                    }
                }
                if ( $table->revisable ) {
                    PTUtil::pack_revision( $obj, $original );
                }
                $app->set_default( $obj, false, true );
                $res = $obj->save();
            }
            if ( $res ) {
                $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
                $workspace_ids[ $workspace_id ] = true;
                $counter++;
                if ( $table->has_status && $obj->has_column( 'status', true ) ) {
                    if ( $obj->status == $status_published ) {
                        if ( $app->get_permalink( $obj, true ) ) {
                            $publish_ids[] = $obj->id;
                        }
                    }
                }
                $callbackObjs[] = ['obj' => $obj, 'original' => $original ];
            }
        }
        if ( !empty( $db->errors ) ) {
            $errstr = $app->translate( 'An error occurred while saving %s.',
                      $app->translate( $table->label ) );
            return $app->rollback( $errstr );
        } else {
            $db->commit();
            $app->txn_active = false;
        }
        foreach ( $callbackObjs as $callbackObj ) {
            $obj = $callbackObj['obj'];
            $original = $callbackObj['original'];
            $app->run_callbacks( $callback, $model, $obj, $original );
        }
        if ( $counter ) {
            $add_taxonomies = join( ', ', $add_taxonomies );
            $action = $action['label'] . " ({$add_taxonomies})";
            $class->log( $action, $model, $counter );
        }
        return $class->start_rebuild( $app, $model, $publish_ids, $workspace_ids, $counter );
    }

    function action_remove_taxonomies ( $app, $objects, $action ) {
        return $this->action_add_taxonomies ( $app, $objects, $action, false );
    }

    function add_taxonomies_to_obj ( $app, $obj, $add_taxonomies, &$taxonomy_ids = [] ) {
        if (! empty( $add_taxonomies ) ) {
            $name = 'taxonomies';
            $workspace_id = 0;
            if ( $obj->has_column( 'workspace_id' ) ) {
                $workspace_id = (int) $obj->workspace_id;
            }
            $to_ids = [];
            $error = false;
            $original = null;
            if ( $obj->has_column( 'rev_type', true ) ) {
                $original = clone $obj;
                $original->_meta = $app->get_meta( $obj );
                $original->_relations = $app->get_relations( $obj );
                $original->id( null );
            }
            foreach ( $add_taxonomies as $taxonomy ) {
                $normalize = PTUtil::normalize( $taxonomy );
                $normalize = PTUtil::normalize_tag( $normalize );
                if (! $normalize ) continue;
                $terms = ['normalize' => $normalize ];
                $taxonomy_obj = $app->db->model( 'taxonomy' )->get_by_key( $terms );
                if (! $taxonomy_obj->id ) {
                    $taxonomy_obj->name( $taxonomy );
                    $app->set_default( $taxonomy_obj, false, true );
                    $order = $app->get_order( $taxonomy_obj );
                    $taxonomy_obj->order( $order );
                    $taxonomy_obj->save();
                }
                $to_ids[] = $taxonomy_obj->id;
                if (! in_array( $taxonomy_obj->id, $taxonomy_ids ) ) {
                    $taxonomy_ids[] = $taxonomy_obj->id;
                }
            }
            $args = ['from_id' => $obj->id, 
                     'name' => $name,
                     'from_obj' => $obj->_model,
                     'to_obj' => 'taxonomy' ];
            $res = $app->set_relations( $args, $to_ids, true );
            if ( $original ) {
                PTUtil::pack_revision( $obj, $original );
            }
            $app->set_default( $obj, false, true );
            $obj->save();
            return $res;
        }
        return false;
    }

    function hdlr_taxonomyobjects ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $container = $args['context'] ?? 'taxonomy';
        $taxonomy = $ctx->stash( $container );
        if (! $taxonomy ) {
            $repeat = $ctx->false();
            return '';
        }
        if (!$counter ) {
            $q_container = $app->db->quote( $container );
            $local_vars = ['taxonomyobjects_tables', 'local_vars', 'workspace',
                           'current_context', 'current_object'];
            $params = [];
            $filter_models = $ctx->local_vars['taxonomy_filter_models'] ?? null;
            $models = $args['models'] ?? null;
            if (! $models && $filter_models ) {
                // Prefer tag attributes
                $models = $filter_models;
            }
            if (! $models ) {
                $sql = "SELECT DISTINCT relation_from_obj FROM mt_relation WHERE relation_to_obj={$q_container}";
                $stmt = $app->db->db->query( $sql );
                $models = $stmt->fetchAll( PDO::FETCH_COLUMN );
                $ctx->local_vars['taxonomy_filter_models'] = $models;
            }
            $models = is_array( $models ) ? $models : explode( ',', $models );
            $ctx->local_vars['taxonomy_filter_models'] = $models;
            if ( is_array( $models ) && empty( $models ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $sort_by = $args['sort_by'] ?? null;
            $sort_order = $args['sort_order'] ?? 'ascend';
            if ( $sort_by ) {
                if ( stripos( $sort_order, 'asc' ) !== false ) {
                    $sort_order = 'ascend';
                } else {
                    $sort_order = 'descend';
                }
            }
            $tables = [];
            $limit = $args['limit'] ?? null;
            $offset = $args['offset'] ?? 0;
            $plugin = $app->component( 'SearchEstraier' );
            $use_plugin = false;
            if ( $app->taxonomyutils_use_estraier && $plugin && isset( $args['meta_name'] ) && isset( $args['meta_value'] ) && $sort_by ) {
                $sql = "SELECT COUNT(relation_id) FROM mt_relation WHERE relation_to_obj={$q_container} AND relation_to_id=" . $taxonomy->id;
                $stmt = $app->db->db->query( $sql );
                $count = $stmt->fetchAll( PDO::FETCH_COLUMN );
                $count = (int) $count[0];
                if ( $count > 1000 ) {
                    $use_plugin = true;
                } else {
                    unset( $args['meta_name'], $args['meta_value'] );
                }
            }
            if (! isset( $args['workspace_id'] ) &&
                ! isset( $args['workspace_ids'] ) &&
                ! isset( $args['include_workspaces'] ) &&
                ! isset( $args['exclude_workspaces'] ) ) {
                if ( $ctx->stash( 'workspace' ) ) {
                    $args['workspace_id'] = $ctx->stash( 'workspace' )->id;
                } else {
                    $args['workspace_id'] = 0;
                }
            }
            if ( $use_plugin ) {
                $add_attrs = [];
                $add_conditions = [];
                $values = [];
                $add_attrs[] = $args['meta_name'];
                $add_conditions[] = 'STRINC';
                $values[] = $args['meta_value'];
                $add_attrs[] = '@model';
                $add_conditions[] = 'STROREQ';
                $values[] = implode( ' ', $models );
                unset( $args['meta_name'], $args['meta_value'] );
                $args['json'] = 1;
                $args['add_attrs'] = $add_attrs;
                $args['add_conditions'] = $add_conditions;
                $args['values'] = $values;
                $args['no_query'] = true;
                $args['snippet_width'] = 0;
                // $args['debug'] = true;
                if ( $limit ) {
                    // Multiple URL Mappings.
                    $args['limit'] = $limit + 20;
                    if ( $offset ) {
                        $args['limit'] += $offset;
                    }
                }
                $content = null;
                $repeat = true;
                $counter = 0;
                $app->searchestraier_definitely = false;
                if ( $sort_by === 'published_on' ) {
                    $args['sort_by'] = '@cdate';
                } else if ( $sort_by === 'modified_on' ) {
                    $args['sort_by'] = '@mdate';
                }
                $results = $plugin->hdlr_estraier_search( $args, $content, $ctx, $repeat, $counter );
                $hit = (int) $results['hit'];
                if (! $hit ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $records = $results['records'];
                $models = [];
                $object_map = [];
                foreach ( $records as $record ) {
                    $attrs = $record->attribute;
                    $hit_model = null;
                    $hit_id = null;
                    foreach ( $attrs as $attr ) {
                        $val = $attr->attributes()->value[ 0 ];
                        $val = ( string ) $val;
                        $name = $attr->attributes()->name;
                        $name = ( string ) $name;
                        if ( $name == '@object_id' ) {
                            $hit_id = $val;
                        } else if ( $name == '@model' ) {
                            $hit_model = $val;
                            $models[ $hit_model ] = true;
                        } else {
                            continue;
                        }
                        if ( $hit_model && $hit_id ) {
                            break;
                        }
                    }
                    if ( $hit_model && $hit_id ) {
                        $object_map["{$hit_model}_{$hit_id}"] = ['model' => $hit_model, 'id' => $hit_id ];
                    }
                }
                $cols = $args['cols'] ?? '*';
                if ( $cols !== '*' ) {
                    $cols = is_array( $cols ) ? $cols : explode( ',', $cols );
                    if (! in_array( 'id', $cols ) ) {
                        $cols[] = 'id';
                    }
                    $model_cols = [];
                    $models = array_keys( $models );
                    foreach ( $models as $model ) {
                        $table = $app->get_table( $model );
                        $tables[ $model ] = $table;
                        $baseModel = $app->db->model( $model );
                        $load_cols = $cols;
                        if (! in_array( $sort_by, $load_cols ) && $baseModel->has_column( $sort_by ) ) {
                            $load_cols[] = $sort_by;
                        } else if ( $sort_by == '@cdate' && $baseModel->has_column( 'published_on' )
                            && ! in_array( 'published_on', $load_cols ) ) {
                            $load_cols[] = 'published_on';
                        }
                        foreach ( $load_cols as $idx => $load_col ) {
                            if (! $baseModel->has_column( $load_col, true ) ) {
                                unset( $load_cols[ $idx ] );
                            }
                        }
                        if ( $baseModel->has_column( 'status', true ) && !in_array( 'status', $cols ) ) {
                            $load_cols[] = 'status';
                        }
                        if ( $baseModel->has_column( 'workspace_id', true ) && !in_array( 'workspace_id', $cols ) ) {
                            $load_cols[] = 'workspace_id';
                        }
                        $model_cols[ $model ] = array_values( $load_cols );
                    }
                }
                if ( $sort_by == '@cdate' ) {
                    $sort_by = null;
                }
                foreach ( $object_map as $map ) {
                    $map_model = $map['model'];
                    $map_id = $map['id'];
                    $map_cols = $model_cols[ $map_model ];
                    $obj = $app->db->model( $map_model )->load( $map_id, null, $map_cols );
                    if ( $obj ) {
                        $params[] = $obj;
                    }
                }
            } else {
                $cols = $args['cols'] ?? '*';
                if ( $limit ) {
                    $limit = (int) $limit;
                    $cols = $sort_by ? "id,{$sort_by}" : 'id';
                }
                if ( $cols !== 'id' && $cols !== '*' ) {
                    $cols = is_array( $cols ) ? $cols : explode( ',', $cols );
                }
                $ws_attr = null;
                if ( isset( $args['workspace_id'] ) && is_numeric( $args['workspace_id'] ) ) {
                    $ws_attr = '=' . $args['workspace_id'];
                } else {
                    $ws_attr = $app->core_tags->include_exclude_workspaces(
                               $app, $args, $app->db->model( 'urlinfo' ) );
                }
                $model_cols = [];
                unset( $args['workspace_ids'], $args['include_workspaces'], $args['exclude_workspaces'],
                       $args['this_tag'], $args['offset'], $args['limit'], $args['sort_by'],
                       $args['sort_oerder'], $args['models'], $args['include_draft'] );
                foreach ( $models as $model ) {
                    $app->get_scheme_from_db( $model );
                    $relations = $app->db->model( 'relation' )->load_iter(
                        ['from_obj' => $model, 'to_obj' => $container, 'to_id' => $taxonomy->id ], null, 'from_id' );
                    $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
                    if ( empty( $relations ) ) {
                        continue;
                    }
                    $baseModel = $app->db->model( $model );
                    $terms = ['id' => ['IN' => $relations ] ];
                    $load_args = [];
                    if ( $limit && $sort_by ) {
                        if ( $baseModel->has_column( $sort_by, true ) ) {
                            $load_args['limit'] = $limit;
                            if ( $offset ) {
                                $load_args['limit'] += $offset;
                            }
                            $load_args['sort'] = $sort_by;
                            $load_args['direction'] = $sort_order;
                        }
                    }
                    if ( $baseModel->has_column( 'status', true ) && !isset( $args['include_draft'] ) ) {
                        $terms['status'] = 4;
                    }
                    if ( $baseModel->has_column( 'rev_type', true ) ) {
                        $terms['rev_type'] = 0;
                    }
                    $extra = '';
                    if ( $ws_attr && $baseModel->has_column( 'workspace_id', true ) ) {
                        $extra = " AND {$model}_workspace_id {$ws_attr}";
                    }
                    $load_cols = $cols;
                    if ( is_array( $load_cols ) ) {
                        foreach ( $load_cols as $idx => $load_col ) {
                            if (! $baseModel->has_column( $load_col, true ) ) {
                                unset( $load_cols[ $idx ] );
                            }
                        }
                        if (! in_array( 'id', $load_cols ) ) {
                            $load_cols[] = 'id';
                        }
                        // For bulk sort.
                        if ( $sort_by && !in_array( $sort_by, $load_cols ) && $baseModel->has_column( $sort_by, true ) ) {
                            $load_cols[] = $sort_by;
                        }
                        // Set for stash.
                        if ( $baseModel->has_column( 'workspace_id', true ) && !in_array( 'workspace_id', $load_cols ) ) {
                            $load_cols[] = 'workspace_id';
                        }
                        $load_cols = array_values( $load_cols );
                    }
                    if (! empty( $args ) ) {
                        foreach ( $args as $arg => $v ) {
                            if ( $baseModel->has_column( $arg ) ) {
                                $terms[ $arg ] = $v;
                            }
                        }
                    }
                    $objs = $baseModel->load( $terms, $load_args, $load_cols, $extra );
                    if (! empty( $objs ) ) {
                        $local_vars[] = $model;
                        $params = array_merge( $params, $objs );
                        $table = $app->get_table( $model );
                        $tables[ $model ] = $table;
                        $attr_cols = $args['cols'] ?? '*';
                        if ( $attr_cols === '*' ) {
                            $model_cols[ $model ] = $attr_cols;
                        } else {
                            $attr_cols = is_array( $attr_cols ) ? $attr_cols : explode( ',', $attr_cols );
                            foreach ( $attr_cols as $idx => $attr_col ) {
                                if (! $baseModel->has_column( $attr_col, true ) ) {
                                    unset( $attr_cols[ $idx ] );
                                }
                            }
                            // Column status and workspace_id are required for get_permalink.
                            if ( $baseModel->has_column( 'status', true ) && !in_array( 'status', $attr_cols ) ) {
                                $attr_cols[] = 'status';
                            }
                            if ( $baseModel->has_column( 'workspace_id', true ) && !in_array( 'workspace_id', $attr_cols ) ) {
                                $attr_cols[] = 'workspace_id';
                            }
                            if ( is_array( $load_cols ) ) {
                                $attr_cols = array_merge( $load_cols, $attr_cols );
                            } else if ( is_string( $load_cols ) ) {
                                $attr_cols = array_merge( explode( ',', $load_cols ), $attr_cols );
                            }
                            $model_cols[ $model ] = $attr_cols;
                        }
                    }
                }
                if ( empty( $params ) ) {
                    $repeat = $ctx->false();
                    return;
                }
            }
            if ( $sort_by ) {
                $sort_order = $sort_order === 'ascend' ? 'asort' : 'arsort';
                $objs = [];
                $conditions = [];
                foreach ( $params as $param ) {
                    $key = "{$param->_model}_{$param->id}";
                    $conditions[ $key ] = $param->$sort_by;
                    $objs[ $key ] = $param;
                }
                $sort_order( $conditions );
                $orderedObjs = [];
                foreach ( $conditions as $key => $value ) {
                    $orderedObjs[] = $objs[ $key ];
                }
                $params = $orderedObjs;
            }
            if ( empty( $params ) ) {
                $repeat = $ctx->false();
                return;
            }
            if ( isset( $args['shuffle'] ) ) {
                shuffle( $params );
            }
            if ( $limit ) {
                $params = array_slice( $params, (int)$offset, $limit );
            }
            foreach ( $params as $idx => $obj ) {
                $load_cols = $model_cols[ $obj->_model ];
                $params[ $idx ] = $obj->load( $obj->id, null, $load_cols );
            }
            $ctx->localize( $local_vars );
            $ctx->stash( 'taxonomyobjects_tables', $tables );
            $ctx->stash( 'local_vars', $local_vars );
            $ctx->local_params = $params;
        }
        if (!isset( $params ) ) $params = $ctx->local_params;
        if (!isset( $tables ) ) $tables = $ctx->stash( 'taxonomyobjects_tables' );
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $repeat = true;
            $obj = $params[ $counter ];
            $table = $tables[ $obj->_model ];
            $primary = $table->primary;
            $date_col = $app->get_date_col( $obj );
            $ctx->local_vars['__url__'] = $app->get_permalink( $obj );
            $ctx->local_vars['__primary__'] = $obj->$primary;
            $ctx->local_vars['__model__'] = $obj->_model;
            $ctx->local_vars['__id__'] = $obj->id;
            $ctx->local_vars['__date__'] = $obj->$date_col;
            $ctx->stash( 'current_object', $obj );
            $ctx->stash( 'current_context', $obj->_model );
            $ctx->stash( 'workspace', $obj->workspace );
            $ctx->stash( $obj->_model, $obj );
            $var_prefix = isset( $args['prefix'] ) ? $args['prefix'] : '';
            $var_prefix .= $var_prefix ? '_' : '';
            $colprefix = $obj->_colprefix;
            $values = $obj->get_values();
            foreach ( $values as $key => $value ) {
                $key = preg_replace( "/^{$colprefix}/", '', $key );
                $ctx->local_vars[ $var_prefix . $key ] = $value;
            }
            $relation = $args['relation'] ?? null;
            if ( $relation ) {
                $terms = [];
                $exlude_self = isset( $args['relation_exlude_self'] );
                $load_args = ['ignore_filter' => 1];
                if ( $exlude_self ) {
                    $terms['id'] = ['!=' => $taxonomy->id ];
                }
                $cols = $args['relation_cols'] ?? '*';
                $related_objs = $app->load_related_objs( $obj, $relation, $terms, $load_args, $cols );
                $ctx->local_vars[ $var_prefix . $relation ] = $related_objs;
            }
        } else {
            unset( $params );
            if (!isset( $local_vars ) ) $local_vars = $ctx->stash( 'local_vars' );
            $ctx->restore( $local_vars );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_iftaxonomyhaschild ( $args, $content, $ctx, $repeat, $counter ) {
        $condition = [];
        $condition['value'] = $this->hdlr_taxonomychildcount( $args, $ctx );
        $condition['name'] = 'value';
        return $ctx->conditional_if( $condition, $content, $ctx, $repeat, true );
    }

    function hdlr_taxonomychildcount ( $args, $ctx ) {
        $app = $ctx->app;
        $container = $args['context'] ?? 'taxonomy';
        $taxonomy = $ctx->stash( $container );
        if (! $taxonomy ) {
            return 0;
        }
        $q_container = $app->db->quote( $container );
        $filter_models = $ctx->local_vars['taxonomy_filter_models'] ?? null;
        $models = $args['models'] ?? null;
        if (! $models && $filter_models ) {
            // Prefer tag attributes
            $models = $filter_models;
        }
        if (! $models ) {
            $sql = "SELECT DISTINCT relation_from_obj FROM mt_relation WHERE relation_to_obj={$q_container}";
            $stmt = $app->db->db->query( $sql );
            $models = $stmt->fetchAll( PDO::FETCH_COLUMN );
        }
        $models = is_array( $models ) ? $models : explode( ',', $models );
        $ctx->local_vars['taxonomy_filter_models'] = $models;
        if ( is_array( $models ) && empty( $models ) ) {
            return 0;
        }
        $counter = 0;
        $app = $ctx->app;
        $plugin = $app->component( 'SearchEstraier' );
        $count = $args['this_tag'] === 'iftaxonomyhaschild' ? true : false;
        $use_plugin = false;
        if ( $app->taxonomyutils_use_estraier && $plugin && isset( $args['meta_name'] ) && isset( $args['meta_value'] ) && $sort_by ) {
            $sql = "SELECT COUNT(relation_id) FROM mt_relation WHERE relation_to_obj={$q_container} AND relation_to_id=" . $taxonomy->id;
            $stmt = $app->db->db->query( $sql );
            $count = $stmt->fetchAll( PDO::FETCH_COLUMN );
            $count = (int) $count[0];
            unset( $args['meta_name'], $args['meta_value'] );
        }
        if (! isset( $args['workspace_id'] ) &&
            ! isset( $args['workspace_ids'] ) &&
            ! isset( $args['include_workspaces'] ) &&
            ! isset( $args['exclude_workspaces'] ) ) {
            if ( $ctx->stash( 'workspace' ) ) {
                $args['workspace_id'] = $ctx->stash( 'workspace' )->id;
            } else {
                $args['workspace_id'] = 0;
            }
        }
        if ( $use_plugin ) {
            $add_attrs = [];
            $add_conditions = [];
            $values = [];
            $add_attrs[] = $args['meta_name'];
            $add_conditions[] = 'STRINC';
            $values[] = $args['meta_value'];
            $add_attrs[] = '@model';
            $add_conditions[] = 'STROREQ';
            $values[] = implode( ' ', $models );
            unset( $args['meta_name'], $args['meta_value'] );
            $args['json'] = 1;
            $args['add_attrs'] = $add_attrs;
            $args['add_conditions'] = $add_conditions;
            $args['values'] = $values;
            $args['no_query'] = true;
            $args['snippet_width'] = 0;
            unset( $args['sort_by'], $args['limit'] );
            // $args['debug'] = true;
            $content = null;
            $repeat = true;
            $counter = 0;
            $app->searchestraier_definitely = false;
            if ( $app->searchestraier_count_by_object ) {
                $results = $plugin->hdlr_estraier_search( $args, $content, $ctx, $repeat, $counter );
                $records = $results['records'];
                $object_map = [];
                foreach ( $records as $record ) {
                    $attrs = $record->attribute;
                    $hit_model = null;
                    $hit_id = null;
                    foreach ( $attrs as $attr ) {
                        $val = $attr->attributes()->value[ 0 ];
                        $val = ( string ) $val;
                        $name = $attr->attributes()->name;
                        $name = ( string ) $name;
                        if ( $name == '@object_id' ) {
                            $hit_id = $val;
                        } else if ( $name == '@model' ) {
                            $hit_model = $val;
                        } else {
                            continue;
                        }
                        if ( $hit_model && $hit_id ) {
                            break;
                        }
                    }
                    if ( $hit_model && $hit_id ) {
                        $object_map["{$hit_model}_{$hit_id}"] = ['model' => $hit_model, 'id' => $hit_id ];
                    }
                }
                $hit = count( $object_map );
            } else {
                $args['limit'] = 1;
                $args['count'] = true;
                $hit = $plugin->hdlr_estraier_search( $args, $content, $ctx, $repeat, $counter );
            }
            if ( $count ) {
                return $hit ? true : false;
            }
            return $hit;
        } else {
            $ws_attr = null;
            if ( $ctx->stash( 'workspace' ) ) {
                if ( isset( $args['workspace_id'] ) && is_numeric( $args['workspace_id'] ) ) {
                    $ws_attr = '=' . $args['workspace_id'];
                } else {
                    $ws_attr = $app->core_tags->include_exclude_workspaces(
                               $app, $args, $app->db->model( 'urlinfo' ) );
                }
            }
            $count_args = $count ? ['limit' => 1] : null;
            foreach ( $models as $model ) {
                $relations = $app->db->model( 'relation' )->load_iter(
                    ['from_obj' => $model, 'to_obj' => $container, 'to_id' => $taxonomy->id ], null, 'from_id' );
                $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
                if ( empty( $relations ) ) {
                    continue;
                }
                $terms = ['id' => ['IN' => $relations ] ];
                if ( $app->db->model( $model )->has_column( 'status', true ) && !isset( $args['include_draft'] ) ) {
                    $terms['status'] = 4;
                }
                if ( $app->db->model( $model )->has_column( 'rev_type', true ) ) {
                    $terms['rev_type'] = 0;
                }
                $extra = '';
                if ( $ws_attr && $app->db->model( $model )->has_column( 'workspace_id', true ) ) {
                    $extra = " AND {$model}_workspace_id {$ws_attr}";
                }
                $objs = $app->db->model( $model )->count( $terms, $count_args, 'id', $extra );
                if ( $count && $objs ) {
                    return true;
                }
                $counter += $objs;
            }
            if ( $count && !$counter ) {
                return false;
            }
            return $counter;
        }
    }

    function pre_listing_taxonomy ( &$cb, $app, &$terms, &$args, &$extra, &$placeholders ) {
        if ( isset( $terms['id'] ) ) {
            return true;
        }
        $tag_args = $cb['args'];
        if (!isset( $tag_args['has_child'] ) ) {
            return true;
        }
        $has_child = $tag_args['has_child'] ?? null;
        if ( $has_child ) {
            $models = is_array( $has_child ) ? $has_child : explode( ',', $has_child );
        } else {
            $sql = "SELECT DISTINCT relation_from_obj FROM mt_relation WHERE relation_to_obj='taxonomy'";
            $stmt = $app->db->db->query( $sql );
            $models = $stmt->fetchAll( PDO::FETCH_COLUMN );
        }
        if ( empty( $models ) ) {
            // Child does not match.
            $terms = ['id' => 0];
            return true;
        }
        $app->ctx->local_vars['taxonomy_filter_models'] = $models;
        $app->ctx->local_vars['taxonomy_filter_args'] = $tag_args;
        $sql = "SELECT DISTINCT relation_to_id FROM mt_relation WHERE relation_to_obj='taxonomy'";
        $in_stmt = str_repeat( '?,', count( $models ) );
        $in_stmt = rtrim( $in_stmt, ',' );
        $sql .= " AND relation_from_obj IN ($in_stmt)";
        $stmt = $app->db->model( 'relation' )->load_iter( $sql, $models );
        $ids = $stmt->fetchAll( PDO::FETCH_COLUMN );
        if (!empty( $ids ) ) {
            $terms = ['id' => ['IN' => $ids ] ];
        } else {
            // Child does not match.
            $terms = ['id' => 0];
        }
        return true;
    }

    function post_load_objects_taxonomy ( &$cb, $app, &$objects, &$count_obj ) {
        $models = $app->ctx->local_vars['taxonomy_filter_models'] ?? null;
        if (! $models || ( is_array( $models ) && empty( $models ) ) ) {
            return true;
        }
        $args['models'] = $models;
        $args['this_tag'] = 'iftaxonomyhaschild';
        $filter_args = $app->ctx->local_vars['taxonomy_filter_args'] ?? null;
        if ( $filter_args && isset( $filter_args['include_draft'] ) ) {
            $args['include_draft'] = $filter_args['include_draft'];
        }
        unset( $app->ctx->local_vars['taxonomy_filter_args'] );
        $ctx = $app->ctx;
        $counter = 0;
        $content = null;
        foreach ( $objects as $idx => $obj ) {
            $ctx->stash( 'taxonomy', $obj );
            $ctx->app = $app;
            $repeat = true;
            $has_child = $this->hdlr_iftaxonomyhaschild( $args, $content, $ctx, $repeat, $counter );
            if (! $has_child ) {
                unset( $objects[ $idx ] );
                $count_obj--;
            }
        }
        $objects = array_values( $objects );
        return true;
    }

    function template_source_mtml_reference ( $cb, $app, $param, $src ) {
        $block_tags = $app->ctx->vars['block_tags'];
        $match_cnt = false;
        $data = null;
        foreach ( $block_tags as $idx => $block_tag ) {
            if ( $block_tag['name'] === 'taxonomies' ) {
                $match_cnt = $idx;
                $data = $block_tag;
                break;
            }
        }
        if ( $match_cnt !== false ) {
            $attributes = $data['attributes'];
            $attr = $this->translate( 'Specify comma-separated text or array of model names(If omitted, all models are targeted) and Filter for those that have related objects.' );
            $data['attributes']['has_child'] = $attr;
            $attr = $this->translate( "If specify attribute value 'has_child', Whether to include not published objects." );
            $data['attributes']['include_draft'] = $attr;
            $block_tags[ $match_cnt ] = $data;
            $app->ctx->vars['block_tags'] = $block_tags;
        }
        return true;
    }
}