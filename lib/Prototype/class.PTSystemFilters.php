<?php

class PTSystemFilters {

    function get_system_filters ( $model, &$system_filters = [] ) {
        $app = Prototype::get_instance();
        $registry = $app->registry;
        $table = $app->get_table( $model );
        if (! $table ) return;
        $obj = $app->db->model( $model )->new();
        $_colprefix = $obj->_colprefix;
        $prefix = $app->db->prefix;
        $ws_terms = [];
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        if ( $obj->has_column( 'workspace_id' ) && $workspace_id ) {
            $ws_terms = [ 'workspace_id' => ['IN' => [0, $workspace_id ] ] ];
        }
        if ( $table->revisable && $app->param( 'manage_revision' ) ) {
            $system_filters[] = ['name' => 'autosaved_revision',
                                 'label' => $app->translate( 'Autosaved Revision' ),
                                 'component' => $this,
                                 'option' => 1,
                                 'method' => 'rev_type'];
            $system_filters[] = ['name' => 'saved_revision',
                                 'label' => $app->translate( 'Saved Revision' ),
                                 'component' => $this,
                                 'option' => 2,
                                 'method' => 'rev_type'];
        }
        if ( $obj->has_column( 'workspace_id' ) && ! $app->workspace() ) {
            if ( $table->display_system && !$table->space_child ) {
                $system_filters[] = ['name' => 'system_objects',
                                     'label' => $app->translate( 'System %s', 
                                        $app->translate( $table->plural ) ),
                                     'component' => $this,
                                     'option' => 'workspace_id',
                                     'method' => 'system_objects'];
            }
        }
        if ( $workspace_id ) {
            $workflows = $app->db->model( 'workflow' )->load(
                    ['model' => $model, 'workspace_id' => $workspace_id ] );
        } else {
            $workflows = $app->db->model( 'workflow' )->load( ['model' => $model ] );
        }
        if (! empty( $workflows ) ) {
            $system_filters[] = ['name' => 'responsible_objects',
                                 'label' => $app->translate( '%s that your responsible', 
                                    $app->translate( $table->plural ) ),
                                 'component' => $this,
                                 'method' => 'responsible_objects'];
        } else if ( $table->assign_user ) {
            $system_filters[] = ['name' => 'owned_objects',
                                 'label' => $app->translate( 'My %s', 
                                    $app->translate( $table->plural ) ),
                                 'component' => $this,
                                 'option' => 'user_id',
                                 'method' => 'owned_objects'];
        } else if ( $obj->has_column( 'created_by' ) ) {
            $system_filters[] = ['name' => 'my_objects',
                                 'label' => $app->translate( 'My %s', 
                                    $app->translate( $table->plural ) ),
                                 'component' => $this,
                                 'option' => 'created_by',
                                 'method' => 'owned_objects'];
        }
        if ( $table->has_status ) {
            $status_published = $app->status_published( $model );
            $max_status = isset( $app->ctx->vars['list_max_status'] ) ?
                $app->ctx->vars['list_max_status'] : $app->max_status( $app->user(), $model );
            $i = 0;
            if ( $status_published == 4 ) {
                $status_text =
                    'Draft %s,%s Under Review,%s Waiting for Approval,Reserved %s,Published %s,Ended %s';
            } else {
                $status_text = 'Disabled %s,Enabled %s';
                $i = 1;
                $max_status++;
            }
            if ( $status_published == 4 && $max_status > 3 ) {
                $system_filters[] = ['name' => 'filter_not_published',
                                     'label' => $app->translate( 'Not Published %s',
                                        $app->translate( $table->plural ) ),
                                     'component' => $this,
                                     'option' => '',
                                     'method' => 'filter_not_published'];
            }
            $status_text = explode( ',', $status_text );
            $methods = ['filter_draft', 'filter_review', 'filter_approval', 'filter_reserved',
                        'filter_published', 'filter_unpublished'];
            foreach ( $status_text as $idx => $text ) {
                if ( $max_status >= $i ) {
                    $name = $methods[ $i ];
                    $i++;
                    if ( $idx == 4 && $table->revisable ) {
                        $system_filters[] = ['name' => 'filter_reserved_replace',
                                             'label' => $app->translate( 'Reserved(Replace) %s',
                                                $app->translate( $table->plural ) ),
                                             'component' => $this,
                                             'option' => '',

                                             'method' => 'filter_reserved_replace'];
                    }
                    $system_filters[] = ['name' => $name,
                                         'label' => $app->translate( $text,
                                            $app->translate( $table->plural ) ),
                                         'component' => $this,
                                         'option' => '',
                                         'method' => 'filter_status'];
                }
            }
        }
        if ( $obj->has_column( 'class', true ) && $obj->_model !== 'ts_job' ) {
            $sql = "SELECT DISTINCT {$model}_class FROM {$prefix}{$model}";
            $group = $app->db->query( $sql, PDO::FETCH_COLUMN, $model );
            $class_relation = false;
            $scheme = $app->get_scheme_from_db( $model );
            list ( $rel_model, $column ) = ['', ''];
            if ( isset( $scheme['edit_properties']['class'] ) && isset( $scheme['column_defs']['class']['type'] ) ) {
                $edit_prop = $scheme['edit_properties']['class'];
                if ( strpos( $edit_prop, 'relation:' ) === 0 && $scheme['column_defs']['class']['type'] === 'int' ) {
                    $class_relation = true;
                    list( $kind, $rel_model, $rel_column ) = explode( ':', $edit_prop );
                }
            }
            foreach ( $group as $class_type ) {
                if (! $class_type ) $class_type = '(Class not specified)';
                $class_name = $app->translate( $class_type, null, null, 'default' );
                if ( $class_type && $class_relation && $rel_model && $rel_column ) {
                    $class_rel = $app->db->model( $rel_model )->load( $class_type, null, $rel_column );
                    if ( $class_rel ) $class_name = $class_rel->$rel_column;
                }
                $class_name = $app->translate( $class_name );
                $system_filters[] = ['name' => 'filter_class_' . $class_type,
                                     'label' => $class_name,
                                     'component' => $this,
                                     'option' => $class_type,
                                     'method' => 'filter_class'];
            }
            if ( $obj->has_column( 'delete_flag' ) ) {
                $system_filters[] = ['name' => 'without_delete_flag',
                                     'label' => $app->translate( 'Without Delete Flag' ),
                                     'component' => $this,
                                     'option' => 0,
                                     'method' => 'filter_delete_flag'];
                $system_filters[] = ['name' => 'with_delete_flag',
                                     'label' => $app->translate( 'With Delete Flag' ),
                                     'component' => $this,
                                     'option' => 1,
                                     'method' => 'filter_delete_flag'];
            }
        }
        if ( $model === 'log' ) {
            $system_filters[] = ['name' => 'show_only_errors',
                                 'label' => $app->translate( 'Show only errors' ),
                                 'component' => $this,
                                 'method' => 'show_only_errors'];
            $sql = "SELECT DISTINCT log_category FROM {$prefix}log";
            $group = $app->db->db->query( $sql )->fetchAll( PDO::FETCH_COLUMN );
            foreach ( $group as $log_category ) {
                $system_filters[] = ['name' => 'filter_log_category_' . $log_category,
                                     'label' => $app->translate(
                                        'Category is \'%s\'', $log_category ),
                                     'component' => $this,
                                     'option' => $log_category,
                                     'method' => 'filter_log_category'];
            }
            $args  = ['group' => ['level'] ];
            $sql = "SELECT DISTINCT log_level FROM {$prefix}log;";
            $group = $app->db->db->query( $sql )->fetchAll( PDO::FETCH_COLUMN );
            $log_levels = [1 => 'info', 2 => 'warning', 4 => 'error',
                           8 => 'security', 16 => 'debug'];
            foreach ( $group as $log_level ) {
                if (! isset( $log_levels[ $log_level ] ) ) continue;
                $log_level_label = $log_levels[ $log_level ];
                $system_filters[] = ['name' => 'filter_log_level_' . $log_level,
                                     'label' => $app->translate(
                                        'Level is \'%s\'', $log_level_label ),
                                     'component' => $this,
                                     'option' => $log_level,
                                     'method' => 'filter_log_level'];
            }
        } else if ( $model === 'urlinfo' ) {
            $system_filters[] = ['name' => 'archive_active',
                                 'label' => $app->translate( '%s that archive is active', 
                                    $app->translate( $table->plural ) ),
                                 'component' => $this,
                                 'method' => 'archive_active'];
            $system_filters[] = ['name' => 'html_active',
                                 'label' => $app->translate( '%s that HTML is active', 
                                    $app->translate( $table->plural ) ),
                                 'component' => $this,
                                 'method' => 'html_active'];
            $system_filters[] = ['name' => 'waiting_queue',
                                 'label' => $app->translate( 'Waiting Queue' ),
                                 'component' => $this,
                                 'method' => 'waiting_queue'];
        } else if ( $model === 'contact' ) {
            $fileter_names = ['unlead', 'checked', 'progress', 'completed', 'flagged', 'uncompleted'];
            $status_texts = ['Unread Contacts', 'Checked Contacts', 'In progress Contacts',
                             'Completed Contacts', 'Flagged Contacts', 'Uncompleted Contacts'];
            foreach ( $status_texts as $idx => $text ) {
                $system_filters[] = ['name' => 'filter_contact_' . $fileter_names[ $idx ],
                                     'label' => $app->translate( $status_texts[ $idx ] ),
                                     'component' => $this,
                                     'option' => $idx,
                                     'method' => 'filter_contact_state'];
            }
        }
        return $app->get_registries( $model, 'system_filters', $system_filters );
    }

    function delete_filter ( $app ) {
        $app->validate_magic();
        header( 'Content-type: application/json' );
        $_filter_id = (int) $app->param( '_filter_id' );
        if (! $_filter_id ) {
            echo json_encode( ['result' => false ] );
            exit();
        }
        $option = $app->db->model( 'option' )->load( $_filter_id );
        if ( $option && $option->id ) {
            if ( $option->user_id == $app->user()->id && $option->kind == 'list_filter'
                && $option->key == $app->param( '_model' ) ) {
                $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
                $filter_primary = ['key' => $option->key, 'user_id' => $app->user()->id,
                                   'workspace_id' => $workspace_id,
                                   'kind'  => 'list_filter_primary',
                                   'object_id' => $option->id ];
                $primary = $app->db->model( 'option' )->get_by_key( $filter_primary );
                if ( $primary->id ) {
                    $primary->remove();
                }
                $res = $option->remove();
                echo json_encode( ['result' => $res ] );
                exit();
            }
        }
        echo json_encode( ['result' => true ] );
        exit();
    }

    function filter_log_category ( $app, &$terms, $model, $category ) {
        $terms['category'] = $category;
    }

    function filter_log_level ( $app, &$terms, $model, $level ) {
        $terms['level'] = $level;
    }

    function filter_contact_state ( $app, &$terms, $model, $level ) {
        $option = $app->param( '_system_filters_option' );
        $option++;
        if ( $option == 6 ) {
            $terms['state'] = ['!=' => 4];
        } else {
            $terms['state'] = $option;
        }
    }

    function owned_objects ( $app, &$terms, $model ) {
        $terms['user_id'] = (int) $app->user()->id;
    }

    function responsible_objects ( $app, &$terms, $model ) {
        if (! $app->workspace() ) {
            $workflows =
                $app->db->model( 'workflow' )->load(
                ['model' => $model ], [], 'workspace_id' );
            $ws_ids = [];
            foreach ( $workflows as $workflow ) {
                $ws_ids[] = (int) $workflow->workspace_id;
            }
            $terms['workspace_id'] = ['IN' => $ws_ids ];
        }
        $terms['user_id'] = (int) $app->user()->id;
        $terms['status'] = ['<' => 3 ];
        $table = $app->get_table( $model );
        if ( $table->revisable ) {
            $terms['rev_type'] = ['!=' => 1];
        }
    }

    function system_objects ( $app, &$terms, $model, $col = 'workspace_id' ) {
        $col = $col ? $col : 'workspace_id';
        if ( $col ) $terms[ $col ] = 0;
    }

    function filter_reserved_replace ( $app, &$terms, $model, $int ) {
        $revisions = $app->db->model( $model )->load_iter( ['rev_type' => 2], null, 'rev_object_id' );
        $revisions = array_unique( $revisions->fetchAll( PDO::FETCH_COLUMN ) );
        $terms = ['id' => ['IN' => $revisions ] ];
    }

    function rev_type ( $app, &$terms, $model, $int ) {
        $terms['rev_type'] = (int) $int;
    }

    function show_only_errors ( $app, &$terms, $model ) {
        $terms['level'] = 4;
    }

    function filter_status ( $app, &$terms, $model, $status ) {
        $terms['status'] = $status;
    }

    function filter_draft ( $app, &$terms, $model ) {
        return $this->filter_status( $app, $terms, $model, 0 );
    }

    function filter_review ( $app, &$terms, $model, $status ) {
        return $this->filter_status( $app, $terms, $model, 1 );
    }

    function filter_approval ( $app, &$terms, $model, $status ) {
        return $this->filter_status( $app, $terms, $model, 2 );
    }

    function filter_reserved ( $app, &$terms, $model, $status ) {
        return $this->filter_status( $app, $terms, $model, 3 );
    }

    function filter_published ( $app, &$terms, $model, $status ) {
        return $this->filter_status( $app, $terms, $model, 4 );
    }

    function filter_unpublished ( $app, &$terms, $model, $status ) {
        return $this->filter_status( $app, $terms, $model, 5 );
    }

    function filter_not_published ( $app, &$terms, $model, $status ) {
        return $this->filter_status( $app, $terms, $model, ['!=' => 4] );
    }

    function filter_class ( $app, &$terms, $model, $class ) {
        $terms['class'] = $class;
    }

    function filter_delete_flag ( $app, &$terms, $model, $flag ) {
        $terms['delete_flag'] = (int) $flag;
    }

    function archive_active ( $app, &$terms, $model, $class ) {
        $terms['delete_flag'] = 0;
        $terms['class'] = 'archive';
        if ( $app->filter_archive_active ) {
            $filter_archive_active = $app->filter_archive_active;
            if ( is_string( $filter_archive_active ) ) {
                $filter_archive_active = explode( ',', $filter_archive_active );
            }
            if ( is_array( $filter_archive_active ) && !empty( $filter_archive_active ) ) {
                if ( count( $filter_archive_active ) === 1 ) {
                    $terms['mime_type'] = $filter_archive_active[0];
                } else {
                    $terms['mime_type'] = ['IN' => $filter_archive_active ];
                }
                foreach ( $filter_archive_active as $idx => $mime_type ) {
                    $mime_type = $app->db->quote( $mime_type );
                    $filter_archive_active[ $idx ] = $mime_type;
                }
            }
        }
        if ( $ref_model = $app->param( 'ref_model' ) ) {
            if ( $ref_model === 'menu' && $app->param( 'query' ) ) {
                $query = trim( $app->param( 'query' ) );
                if (! $query || ( strpos( $query, '/' ) !== false && strpos( $query, ' ' ) === false ) &&
                    mb_strlen( $query ) === strlen( $query ) ) {
                    return;
                }
                $app->ctx->vars['query'] = $query;
                $where = " WHERE urlinfo_delete_flag=0 AND urlinfo_class='archive' ";
                if ( isset( $filter_archive_active ) &&  is_array( $filter_archive_active ) && !empty( $filter_archive_active ) ) {
                    if ( count( $filter_archive_active ) === 1 ) {
                        $where .= " AND urlinfo_mime_type=" . $filter_archive_active[0];
                    } else {
                        $where .= " AND urlinfo_mime_type IN (" . implode( ',', $filter_archive_active ) . ')';
                    }
                }
                $pfx = $app->db->prefix;
                $sql = "SELECT DISTINCT urlinfo_model,urlinfo_object_id FROM {$pfx}urlinfo" . $where;
                if ( $app->param( 'workspace_id' ) ) {
                    $workspace_id = (int) $app->param( 'workspace_id' );
                    $sql .= " AND urlinfo_workspace_id={$workspace_id}";
                }
                $groups = $app->db->db->query( $sql );
                $groups = $groups->fetchAll( PDO::FETCH_ASSOC );
                $map = [];
                $query = $app->db->escape_like( $query, true, true );
                foreach ( $groups as $group ) {
                    $model = $group['urlinfo_model'];
                    $id = $group['urlinfo_object_id'];
                    $model_ids = $map[ $model ] ?? [];
                    $model_ids[] = $id;
                    $map[ $model ] = $model_ids;
                }
                $urlinfo_ids = [];
                foreach ( $map as $model => $ids ) {
                    $table = $app->get_table( $model );
                    $primary = $table->primary;
                    $params = [ $primary => ['LIKE' => $query ] ];
                    $params['id'] = ['IN' => $ids ];
                    $objs = $app->db->model( $model )->load( $params, [], 'id' );
                    foreach ( $objs as $obj ) {
                        $sql = "SELECT urlinfo_id FROM {$pfx}urlinfo " . $where;
                        $sql .= " AND urlinfo_model='$model' AND urlinfo_object_id=" . $obj->id;
                        $url = $app->db->model( 'urlinfo' )->load( $sql );
                        if ( $url ) {
                            $url = $url[0];
                            $urlinfo_ids[] = $url->id;
                        }
                    }
                }
                if (! empty( $urlinfo_ids ) ) {
                    $urlinfo_ids = array_unique( $urlinfo_ids );
                    $terms['id'] = ['IN' => $urlinfo_ids ];
                    $app->param( 'query', '' );
                    unset( $_POST['query'], $_REQUEST['query'] );
                }
            }
        }
    }

    function html_active ( $app, &$terms, $model, $class ) {
        $terms['delete_flag'] = 0;
        $terms['mime_type'] = 'text/html';
    }

    function waiting_queue ( $app, &$terms, $model, $class ) {
        $terms['delete_flag'] = 0;
        $terms['publish_file'] = 4;
        $terms['is_published'] = 0;
        $terms['class'] = 'archive';
    }
}