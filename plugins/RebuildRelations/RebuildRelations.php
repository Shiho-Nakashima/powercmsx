<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class RebuildRelations extends PTPlugin {

    public $trigger_models  = [];

    function __construct () {
        parent::__construct();
    }

    function rebuildrelations_post_init ( $app ) {
        if ( $app->id == 'Prototype' || $app->id == 'RESTfulAPI' ) {
            $model = $app->param( '_model' );
            if (! $model ) return;
            if ( $app->mode == 'save' || $app->mode == 'delete' || $app->mode == 'list_action' ) {
            } else {
                return;
            }
            $models = $this->get_config_value( 'rebuildrelations_models' );
            $to_models = $this->get_config_value( 'rebuildrelations_to_models' );
            if (! $models || ! $to_models ) return;
            $models = explode( ',', $models );
            $to_models = explode( ',', $to_models );
            if ( in_array( $model, $models ) ) {
                $app->register_callback( $model, 'post_save', 'post_save_object', 9, $this );
                $app->register_callback( $model, 'post_delete', 'post_save_object', 9, $this );
                foreach ( $to_models as $to_model ) {
                    $this->trigger_models[] = $to_model;
                }
            }
            if ( in_array( $model, $to_models ) ) {
                $quoted = $app->db->quote( $model );
                $sql = "SELECT DISTINCT relation_from_obj FROM {$app->db->prefix}relation WHERE relation_to_obj={$quoted}";
                $groups = $app->db->db->query( $sql )->fetchAll( PDO::FETCH_COLUMN );
                foreach ( $groups as $from_obj ) {
                    if ( in_array( $from_obj, $models ) ) {
                        $this->trigger_models[] = $from_obj;
                        $app->register_callback( $model, 'post_save', 'trigger_context_objs', 10, $this );
                        $app->register_callback( $model, 'post_delete', 'trigger_context_objs', 10, $this );
                    }
                }
                $extra = " AND column_edit != 'hidden' AND column_edit != 'integer' AND column_edit != 'selection' ";
                foreach ( $models as $from_model ) {
                    $to_table = $app->get_table( $from_model );
                    $from_columns = $app->db->model( 'column' )->load(
                        ['type' => 'int', 'table_id' => $to_table->id, 'edit' => ['!=' => ''] ], null, 'edit', $extra );
                    foreach ( $from_columns as $from_column ) {
                        $from_edit = $from_column->edit;
                        if ( stripos( $from_edit, ":{$model}:" ) !== false ) {
                            $from_edits = explode( ':', $from_edit );
                            if ( isset( $from_edits[1] ) && $from_edits[1] == $model ) {
                                $this->trigger_models[] = $from_model;
                                $app->register_callback( $model, 'post_save', 'trigger_context_objs', 10, $this );
                                $app->register_callback( $model, 'post_delete', 'trigger_context_objs', 10, $this );
                            }
                        }
                    }
                }
            }
        } else if ( $app->id == 'Worker' ) {
            $models = $this->get_config_value( 'rebuildrelations_models' );
            $to_models = $this->get_config_value( 'rebuildrelations_to_models' );
            if (! $models || ! $to_models ) return;
            $models = explode( ',', $models );
            $to_models = explode( ',', $to_models );
            $extra = " AND column_edit != 'hidden' AND column_edit != 'integer' AND column_edit != 'selection' ";
            foreach ( $models as $model ) {
                $this->trigger_models[] = $model;
                $app->register_callback( $model, 'scheduled_published', 'post_save_object', 9, $this );
                $app->register_callback( $model, 'scheduled_replacement', 'post_save_object', 9, $this );
                $app->register_callback( $model, 'scheduled_unpublish', 'post_save_object', 9, $this );
                $quoted = $app->db->quote( $model );
                $sql = "SELECT DISTINCT relation_to_obj FROM {$app->db->prefix}relation WHERE relation_from_obj={$quoted}";
                $groups = $app->db->db->query( $sql )->fetchAll( PDO::FETCH_COLUMN );
                foreach ( $groups as $to_model ) {
                    if ( in_array( $to_model, $to_models ) ) {
                        $this->trigger_models[] = $to_model;
                        $app->register_callback( $to_model, 'scheduled_published', 'trigger_context_objs', 10, $this );
                        $app->register_callback( $to_model, 'scheduled_replacement', 'trigger_context_objs', 10, $this );
                        $app->register_callback( $to_model, 'scheduled_unpublish', 'trigger_context_objs', 10, $this );
                    }
                }
                $to_table = $app->get_table( $model );
                $from_columns = $app->db->model( 'column' )->load(
                    ['type' => 'int', 'table_id' => $to_table->id, 'edit' => ['!=' => ''] ], null, 'edit', $extra );
                foreach ( $from_columns as $from_column ) {
                    $from_edit = $from_column->edit;
                    if ( strpos( $from_edit, ':' ) !== false ) {
                        $from_edits = explode( ':', $from_edit );
                        if ( isset( $from_edits[1] ) && in_array( $from_edits[1], $to_models ) ) {
                            $this->trigger_models[] = $from_edits[1];
                            $app->register_callback( $from_edits[1], 'scheduled_published', 'trigger_context_objs', 10, $this );
                            $app->register_callback( $from_edits[1], 'scheduled_replacement', 'trigger_context_objs', 10, $this );
                            $app->register_callback( $from_edits[1], 'scheduled_unpublish', 'trigger_context_objs', 10, $this );
                            $this->trigger_models[] = $model;
                            $app->register_callback( $model, 'scheduled_published', 'post_save_object', 9, $this );
                            $app->register_callback( $model, 'scheduled_replacement', 'post_save_object', 9, $this );
                            $app->register_callback( $model, 'scheduled_unpublish', 'post_save_object', 9, $this );
                        }
                    }
                }
            }
        }
        $this->trigger_models = array_unique( $this->trigger_models );
    }

    function trigger_context_objs ( $cb, $app, $obj, $original ) {
        if ( $obj->has_column( 'status' ) ) {
            $published = $app->status_published( $obj->_model );
            $original = $original ? $original : $obj;
            if ( $obj->status != $published && $original->status == $obj->status ) {
                return true;
            } else if ( $obj->status != $published && $original->status != $published ) {
                return true;
            }
        }
        if ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
            return true;
        }
        $models = $this->trigger_models;
        $tags = new PTTags();
        foreach ( $models as $model ) {
            $table = $app->get_table( $model );
            if (! $table ) continue;
            $rel_obj = $app->db->model( $model );
            $terms = [];
            if ( $table->revisable ) {
                $terms['rev_type'] = 0;
            }
            if ( $table->has_status ) {
                $terms['status'] = $app->status_published( $model );
            }
            $objects = $app->load_context_objs( $obj, $model, $terms, [], '*' );
            $sessions = [];
            foreach ( $objects as $object ) {
                if ( $obj->_model == $object->_model && $obj->id == $object->id ) {
                } else {
                    if ( $app->rebuildrelations_clear_cache ) {
                        $cache = $app->db->model( 'session' )->load( [
                        'name' => $object->_model . '_' . $object->id, 'key' => ['IS NOT NULL' => 1],
                        'kind' => 'CH', 'user_id' => -2 ], null, 'id' );
                        if (! empty( $cache ) ) {
                            $sessions = array_merge( $sessions, $cache );
                        }
                    }
                    $app->delayed_publish_objs[ $object->_model . '_' . $object->id ] = $object;
                }
            }
            if (! empty( $sessions ) ) {
                $app->db->model( 'session' )->remove_multi( $sessions );
            }
        }
        return true;
    }

    function post_save_object ( $cb, $app, $obj, $original ) {
        if ( $obj->has_column( 'status' ) && $cb['name'] == 'post_save' ) {
            $published = $app->status_published( $obj->_model );
            $original = $original ? $original : $obj;
            if ( $obj->status != $published && $original->status == $obj->status ) {
                return true;
            } else if ( $obj->status != $published && $original->status != $published ) {
                return true;
            }
        }
        if ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
            return true;
        }
        $models = $this->trigger_models;
        $related_ids = [];
        if (! empty( $models ) ) {
            if ( $relations = $obj->_relations ) {
                foreach ( $relations as $relation ) {
                    if ( $obj->_model == $relation->to_obj && $relation->to_id == $obj->id ) {
                    } else {
                        if ( in_array( $relation->to_obj, $models ) ) {
                            $rel_ids = isset( $related_ids[ $relation->to_obj ] )
                                     ? $related_ids[ $relation->to_obj ] : [];
                            $rel_ids[] = (int) $relation->to_id;
                            $related_ids[ $relation->to_obj ] = $rel_ids;
                        }
                    }
                }
            }
            if ( $original && $original->_relations ) {
                $relations = $original->_relations;
                foreach ( $relations as $relation ) {
                    if ( $obj->_model == $relation->to_obj && $relation->to_id == $obj->id ) {
                    } else {
                        if ( in_array( $relation->to_obj, $models ) ) {
                            $rel_ids = isset( $related_ids[ $relation->to_obj ] )
                                     ? $related_ids[ $relation->to_obj ] : [];
                            $rel_ids[] = (int) $relation->to_id;
                            $related_ids[ $relation->to_obj ] = $rel_ids;
                        }
                    }
                }
            }
            // Relation type int.
            $scheme = $app->get_scheme_from_db( $obj->_model );
            $edit_properties = isset( $scheme['edit_properties'] ) ? $scheme['edit_properties'] : [];
            $column_defs = $scheme['column_defs'];
            $type_int = [];
            foreach ( $edit_properties as $cName => $prop ) {
                if ( strpos( $prop, ':' ) !== false && isset( $column_defs[ $cName ]['type'] )
                    && $column_defs[ $cName ]['type'] == 'int' ) {
                    $prop = explode( ':', $prop );
                    if ( in_array( $prop[1], $models ) ) {
                        $type_int[ $cName ] = $prop[1];
                    }
                }
            }
            foreach ( $type_int as $cName => $relModel ) {
                $ids = [];
                if ( $original->$cName ) {
                    $ids[] = (int) $original->$cName;
                }
                if ( $obj->$cName != $original->$cName ) {
                    $ids[] = (int) $obj->$cName;
                }
                if (!empty( $ids ) ) {
                    $add_relations = $app->db->model( $relModel )->load( ['id' => ['IN' => $ids ] ], null, 'id' );
                    foreach ( $add_relations as $add_relation ) {
                        $rel_ids = isset( $related_ids[ $relModel ] )
                                 ? $related_ids[ $relModel ] : [];
                        $rel_ids[] = (int) $add_relation->id;
                        $related_ids[ $relModel ] = $rel_ids;
                    }
                }
            }
            foreach ( $models as $relModel ) {
                $add_relations = $app->load_related_objs( $obj, $relModel, [], [], 'id' );
                foreach ( $add_relations as $add_relation ) {
                    $rel_ids = isset( $related_ids[ $relModel ] )
                             ? $related_ids[ $relModel ] : [];
                    $rel_ids[] = (int) $add_relation->id;
                    $related_ids[ $relModel ] = $rel_ids;
                }
            }
        }
        $tags = new PTTags();
        foreach ( $related_ids as $model => $ids ) {
            $table = $app->get_table( $model );
            if (! $table ) continue;
            $rel_obj = $app->db->model( $model );
            $ids = array_unique( $ids );
            $terms = ['id' => ['IN' => $ids ] ];
            if ( $table->revisable ) {
                $terms['rev_type'] = 0;
            }
            if ( $table->has_status ) {
                $terms['status'] = $app->status_published( $model );
            }
            $objects = $rel_obj->load( $terms, null, '*' );
            $sessions = [];
            foreach ( $objects as $object ) {
                if ( $obj->_model === $object->_model && $obj->id == $object->id ) {
                } else {
                    if ( $app->rebuildrelations_clear_cache ) {
                        $cache = $app->db->model( 'session' )->load( [
                        'name' => $object->_model . '_' . $object->id, 'key' => ['IS NOT NULL' => 1],
                        'kind' => 'CH', 'user_id' => -2 ], null, 'id' );
                        if (! empty( $cache ) ) {
                            $sessions = array_merge( $sessions, $cache );
                        }
                    }
                    $app->delayed_publish_objs[ $object->_model . '_' . $object->id ] = $object;
                }
            }
            if (! empty( $sessions ) ) {
                $app->db->model( 'session' )->remove_multi( $sessions );
            }
        }
        return true;
    }
}