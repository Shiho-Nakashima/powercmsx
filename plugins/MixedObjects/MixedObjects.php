<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class MixedObjects extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function hdlr_mixedobjects ( $args, $content, $ctx, &$repeat, $counter ) {
        $tag_class = new PTTags();
        $var_prefix = isset( $args['prefix'] ) ? $args['prefix'] : 'object';
        $var_prefix .= '_';
        if (!$counter ) {
            $app = $ctx->app;
            $models = isset( $args['models'] ) ? $args['models'] : [];
            if ( empty( $models ) ) {
                $models = isset( $args['model'] ) ? $args['model'] : [];
            }
            if ( is_string( $models ) ) {
                $models = preg_split( '/\s*,\s*/', $models );
            }
            $params = isset( $args['params'] ) ? $args['params'] : [];
            $tables = [];
            if ( empty( $models ) && is_array( $params ) && ! empty( $params ) ) {
                $count_map = [];
                foreach ( $params as $model => $columns ) {
                    $table = $app->get_table( $model );
                    if ( $table && $table->id ) {
                        $tables[ $model ] = $table;
                        $obj = $app->db->model( $model );
                        $columns = preg_split( '/\s*,\s*/',  $columns );
                        $count_cols = 0;
                        foreach ( $columns as $column ) {
                            if ( $column != 'id' && $obj->has_column( $column, true ) ) {
                                $count_cols++;
                            }
                        }
                        $count_map[ $model ] = $count_cols;
                    } else {
                        unset( $params[ $model ] );
                        continue;
                    }
                }
                $count_cols = array_values( $count_map );
                $count = array_shift( $count_cols );
                foreach ( $count_cols as $count_col ) {
                    if ( $count != $count_col ) {
                        $this->error( $this->translate(
                            'The number of columns specified in the tag mixedobjects does not match.' ),
                            $params );
                        $repeat = $ctx->false();
                        return;
                    }
                }
                $models = array_keys( $params );
            }
            if ( empty( $models ) ) {
                $repeat = $ctx->false();
                return;
            }
            $local_vars = ['workspace', 'workspace_id', 'current_context',
                           'current_archive_context', 'current_container'];
            $local_vars = array_merge( $local_vars, $models );
            $sort_by = isset( $args['sort_by'] ) ? $args['sort_by'] : null;
            $limit = isset( $args['limit'] ) ? (int) $args['limit'] : null;
            $offset = isset( $args['offset'] ) ? (int) $args['offset'] : null;
            if (! $limit ) {
                $offset = null;
            }
            $i = 0;
            $selects = [];
            $first_model = '';
            $placeholders = [];
            if ( isset( $args['conditions'] ) || isset( $args['condition'] ) ) {
                $conditions =  isset( $args['conditions'] )
                            ? $args['conditions'] : $args['condition'];
                $op_map = ['gt' => '>', 'lt' => '<', 'eq' => '=', 'ne' => '!=', 'ge' => '>=',
                           'le' => '<=', 'ct' => 'LIKE', 'nc' => 'NOT LIKE', 'bw' => 'LIKE',
                           'ew' => 'LIKE', 'like' => 'LIKE'];
            }
            foreach ( $models as $model ) {
                $table = isset( $tables[ $model ] )
                       ?  $tables[ $model ]
                       : $app->get_table( $model );
                if ( $table && $table->id ) {
                    $app->get_scheme_from_db( $model );
                    $obj = $app->db->model( $model );
                    if (! $i ) {
                        $first_model = $model;
                        if (! $obj->has_column( $sort_by, true ) ) {
                            $sort_by = '';
                        }
                    }
                    $cols = '';
                    if ( isset( $params[ $model ] ) ) {
                        $cols = preg_split( '/\s*,\s*/',  $params[ $model ] );
                    } else {
                        $cols = ['id,', $table->primary ];
                    }
                    if (! in_array( 'id', $cols ) ) {
                        array_unshift( $cols, 'id' );
                    }
                    if ( $sort_by && ! in_array( $sort_by, $cols ) && $obj->has_column( $sort_by, true ) ) {
                        $cols[] = $sort_by;
                    }
                    $select = 'SELECT ';
                    foreach ( $cols as $col ) {
                        if (! $obj->has_column( $col, true ) ) {
                            continue;
                        }
                        $select .= "{$model}_{$col},";
                    }
                    $select .= "'$model' AS table_name FROM " . DB_PREFIX . $model;
                    $wheres = [];
                    if ( $table->revisable ) {
                        $wheres[] = "{$model}_rev_type=0";
                    }
                    $include_draft = isset( $args['include_draft'] ) ? true : false;
                    if ( $obj->has_column( 'status', true ) && ! $include_draft ) {
                        $wheres[] = "{$model}_status=" . $app->status_published( $model );
                    }
                    if ( $obj->has_column( 'workspace_id', true ) ) {
                        $extra = $tag_class->include_exclude_workspaces( $app, $args, $obj );
                        if ( $extra ) {
                            $wheres[] = "{$model}_workspace_id " . $extra;
                        }
                    }
                    // TODO::Filters
                    if ( isset( $conditions ) && isset( $conditions[ $model ] ) ) {
                        $condition = $conditions[ $model ];
                        $condition = explode( ',', $condition );
                        if ( isset( $condition[2] ) ) {
                            $cond_col = strtolower( trim( array_shift( $condition ) ) );
                            $cond_op  = strtolower( trim( array_shift( $condition ) ) );
                            $cond_value = implode( ',', $condition );
                            if ( $obj->has_column( $cond_col, true ) && isset( $op_map[ $cond_op ] ) ) {
                                $operator = $op_map[ $cond_op ];
                                if ( $operator === 'LIKE' ) {
                                    if ( $cond_op == 'ct' || $cond_op == 'like' ) {
                                        $cond_value = $app->db->escape_like( $cond_value, true, true );
                                    } else if ( $cond_op == 'bw' ) {
                                        $cond_value = $app->db->escape_like( $cond_value, false, true );
                                    } else if ( $cond_op == 'ew' ) {
                                        $cond_value = $app->db->escape_like( $cond_value, true, false );
                                    }
                                } else if ( $operator === 'NOT LIKE' ) {
                                    $cond_value = $app->db->escape_like( $cond_value, true, true );
                                }
                                $wheres[] = "{$model}_{$cond_col} {$operator} ?";
                                $placeholders[] = $cond_value;
                            }
                        }
                    }
                    if (! empty( $wheres ) ) {
                        $select .= ' WHERE ' . implode( ' AND ', $wheres );
                    }
                    $select = "({$select})";
                    $selects[] = $select;
                    $i++;
                }
            }
            if ( empty( $selects ) ) {
                $repeat = $ctx->false();
                return;
            }
            $selects = implode( ' UNION ', $selects );
            if ( $sort_by ) {
                $sort_order = isset( $args['sort_order'] ) ? $args['sort_order'] : 'ascend';
                $sort_order = stripos( $sort_order, 'desc' ) !== false ? 'DESC' : 'ASC';
                $selects .= " ORDER BY {$first_model}_{$sort_by} {$sort_order}";
            }
            if ( $limit ) {
                $selects .= " LIMIT {$limit}";
                if ( $offset ) {
                    $selects .= " OFFSET {$offset}";
                }
            }
            $db_caching = $app->db->caching;
            $app->db->caching = false;
            $db_query_cache = $app->db->query_cache;
            $app->db->query_cache = false;
            $params = $app->db->model( $first_model )->load( $selects, $placeholders );
            $app->db->caching = $db_caching;
            $app->db->query_cache = $db_query_cache;
            // TODO::Callbacks
            if ( empty( $params ) ) {
                $repeat = $ctx->false();
                return;
            }
            $ctx->localize( $local_vars );
            $ctx->local_vars['local_vars'] = $local_vars;
            $ctx->local_vars['first_model'] = $first_model;
            $ctx->local_params = $params;
        }
        if (!isset( $first_model ) ) $first_model = $ctx->local_vars['first_model'];
        if (!isset( $params ) ) $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $repeat = true;
            $obj = $params[ $counter ];
            $values = $obj->get_values( true );
            $model = null;
            $object_id = null;
            foreach ( $values as $col => $value ) {
                if ( strpos( $col, '_' ) === 0 ) continue;
                if ( $col == 'table_name' ) {
                    $ctx->local_vars['__table_name__'] = $value;
                    $ctx->local_vars['__model__'] = $value;
                    $model = $value;
                } else {
                    if ( $col == 'id' ) {
                        $object_id = (int) $value;
                    }
                    $ctx->local_vars[ $var_prefix . $col ] = $value;
                }
            }
            $set_context = isset( $args['set_context'] ) ? $args['set_context'] : null;
            if ( $set_context ) {
                if ( $model && $object_id ) {
                    $obj = $ctx->app->db->model( $model )->load( $object_id );
                    $ctx->stash( 'current_context', $model );
                    $ctx->stash( 'current_archive_context', $model );
                    $ctx->stash( 'current_container', $model );
                    $ctx->stash( $model, $obj );
                    if ( $obj->has_column( 'workspace_id', true ) ) {
                        if ( $workspace = $obj->workspace ) {
                            $ctx->stash( 'workspace', $workspace );
                            $ctx->stash( 'workspace_id', $workspace->id );
                        } else {
                            $ctx->stash( 'workspace', null );
                            $ctx->stash( 'workspace_id', 0 );
                        }
                    } else if ( $model == 'workspace' ) {
                        $ctx->stash( 'workspace', $obj );
                        $ctx->stash( 'workspace_id', $obj->id );
                    }
                }
            }
        } else {
            unset( $params );
            if (!isset( $local_vars ) ) $local_vars = $ctx->local_vars['local_vars'];
            $ctx->restore( $local_vars );
            unset( $local_vars );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function error ( $message, $params ) {
        $app = Prototype::get_instance();
        if ( $app->id === 'Prototype' ) {
            $app->error( $message );
        } else {
            if ( $app->id === 'Worker' ) {
                echo $message, PHP_EOL;
            }
            $app->log( ['message'  => $message,
                        'category' => 'mixedobjects',
                        'metadata' => json_encode( $params, JSON_UNESCAPED_UNICODE ),
                        'level'    => 'error'] );
        }
    }
}