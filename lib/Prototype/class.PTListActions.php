<?php

class PTListActions {

    function list_action ( $app ) {
        $app->validate_magic();
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $db = $app->db;
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        $menu_type = $table->menu_type;
        $list_actions = $this->get_list_actions( $model );
        $action_name = $app->param( 'action_name' );
        if (! isset( $list_actions[ $action_name ] ) ) {
            return $app->error( 'Invalid request.' );
        }
        $action = $list_actions[ $action_name ];
        if ( is_array( $action ) && isset( $action['component'] ) ) {
            if ( isset( $action['columns'] ) && $action['columns'] ) {
                $objects = $app->get_object( $model, $action['columns'] );
            } else {
                $objects = $app->get_object( $model );
            }
            $permitted_objs = [];
            foreach ( $objects as $obj ) {
                if ( $app->can_do( $model, 'edit', $obj ) ) {
                    $permitted_objs[] = $obj;
                } else if ( $menu_type == 3 && $app->can_do( $model, 'update_all' ) ) {
                    $permitted_objs[] = $obj;
                }
            }
            $component = $action['component'];
            $meth = $action['method'];
            $action['model'] = $model;
            if ( method_exists( $component, $meth ) ) {
                if ( count( $permitted_objs ) > 1 ) {
                    $db->update_multi = true;
                }
                $db->caching = false;
                return $component->$meth( $app, $permitted_objs, $action, false, $this );
            }
        }
        return $app->error( 'Invalid request.' );
    }

    function get_list_actions ( $model, &$list_actions = [] ) {
        $app = Prototype::get_instance();
        $table = $app->get_table( $model );
        if ( $table->has_status && !$app->param( 'manage_revision' ) ) {
            $list_actions[] = ['name' => 'set_status', 'input' => 0,
                               'label' => $app->translate( 'Set Status' ),
                               'component' => $this,
                               'method' => 'set_status'];
        }
        $obj = $app->db->model( $model );
        if ( $obj->has_column( 'state' ) ) {
            $column = $app->db->model( 'column' )->get_by_key(
                ['table_id' => $table->id, 'name' => 'state'] );
            if ( $column->id ) {
                $options = explode( ',', $column->options );
                $input_options = [];
                $i = 1;
                foreach ( $options as $option ) {
                    $input_options[] = ['label' => 
                        $app->translate( $option ), 'value' => $i ];
                    $i++;
                }
                $list_actions[] = ['name' => 'set_state', 'input' => 1,
                                   'label' => $app->translate( 'Set Status' ),
                                   'component' => $this,
                                   'input_options' => $input_options,
                                   'columns' => ['id', 'state'],
                                   'method' => 'set_state'];
            }
        }
        if ( $table->taggable ) {
            $list_actions[] = ['name' => 'add_tags', 'input' => 1,
                               'label' => $app->translate( 'Add Tags' ),
                               'columns' => ['id'],
                               'component' => $this,
                               'method' => 'add_tags'];
            $list_actions[] = ['name' => 'remove_tags', 'input' => 1,
                               'label' => $app->translate( 'Remove Tags' ),
                               'columns' => ['id'],
                               'component' => $this,
                               'method' => 'remove_tags'];
        }
        $blob_cols = $app->db->get_blob_cols( $model );
        if ( count( $blob_cols ) ) {
            $files = $app->db->model( 'column' )->count( ['table_id' => $table->id, 'edit' => 'file'] );
            if ( $files ) {
                $list_actions[] = ['name' => 'publish_files', 'input' => 0,
                                   'label' => $app->translate( 'Publish Files' ),
                                   'component' => $this,
                                   'method' => 'publish_files'];
            }
        }
        if ( $table->name === 'template' ) {
            $list_actions[] = ['name' => 'export_theme', 'input' => 1,
                               'hint' => $app->translate( 'Input label of the Theme.' ),
                               'label' => $app->translate( 'Export Theme' ),
                               'component' => $this,
                               'columns' => ['id', 'name', 'text', 'subject', 'status',
                                             'class', 'basename', 'form_id', 'uuid', 'linked_file'],
                               'method' => 'export_theme'];
            $list_actions[] = ['name' => 'recompile_cache', 'input' => 0,
                               'label' => $app->translate( 'Re-Compile Cache' ),
                               'component' => $this,
                               'columns' => ['id', 'text', 'compiled', 'cache_key'],
                               'method' => 'recompile_cache'];
        } else if ( $table->name === 'urlmapping' ) {
            $list_actions[] = ['name' => 'recompile_cache', 'input' => 0,
                               'label' => $app->translate( 'Re-Compile Cache' ),
                               'component' => $this,
                               'columns' => ['id', 'mapping', 'compiled', 'cache_key'],
                               'method' => 'recompile_cache'];
            $list_actions[] = ['name' => 'delete_trigger', 'input' => 0,
                               'label' => $app->translate( 'Delete Rebuild Triggers' ),
                               'component' => $this,
                               'columns' => ['id'],
                               'method' => 'delete_trigger'];
        } else if ( $table->name === 'fieldtype' ) {
            $list_actions[] = ['name' => 'export_fieldtypes', 'input' => 0,
                               'label' => $app->translate( 'Export' ),
                               'component' => $this,
                               'method' => 'export_fieldtypes'];
        } else if ( $table->name === 'contact' ) {
            $input_options = [];
            $input_options[] = ['label' => 'UTF-8', 'value' => 'UTF-8' ];
            $input_options[] = ['label' => 'Shift_JIS', 'value' => 'Shift_JIS' ];
            $list_actions[] = ['name' => 'export_contacts', 'input' => 1,
                               'label' => $app->translate( 'CSV Export' ),
                               'component' => $this,
                               'columns' => '*',
                               'input_options' => $input_options,
                               'method' => 'export_contacts'];
            $list_actions[] = ['name' => 'aggregate_contact', 'input' => 0,
                               'label' => $app->translate( 'Aggregate' ),
                               'component' => $this,
                               'columns' => '*',
                               // 'hint' => $app->translate( 'Please enter comma-delimited question labels to be summarized(When omitted, it counts everything).' ),
                               'input_options' => [],
                               'method' => 'aggregate_contacts'];
        } else if ( $table->name === 'question' ) {
            $list_actions[] = ['name' => 'set_aggregate_target', 'input' => 0,
                               'label' => $app->translate( 'Target for Aggregation' ),
                               'component' => $this,
                               'columns' => ['id', 'aggregate'],
                               'method' => 'set_aggregate_target'];
            $list_actions[] = ['name' => 'unset_aggregate_target', 'input' => 0,
                               'label' => $app->translate( 'Remove from Aggregation target' ),
                               'component' => $this,
                               'columns' => ['id', 'aggregate'],
                               'method' => 'set_aggregate_target'];
        } else if ( $table->name === 'menu' ) {
            $list_actions[] = ['name' => 'reassociate_urls', 'input' => 0,
                               'label' => $app->translate( 'Reassociate URLs' ),
                               'component' => $this,
                               'columns' => ['id', 'meta'],
                               'method' => 'reassociate_urls'];
        } else if ( ( $table->name === 'user' ||  $table->name === 'association' ) && $app->user()->is_superuser ) {
            $input_options = [];
            $input_options[] = ['label' => 'System', 'value' => 'system' ];
            $input_options[] = ['label' => 'WorkSpace', 'value' => 'workspace' ];
            $list_actions[] = ['name' => 'add_permission', 'input' => 1,
                               'label' => $app->translate( 'Add Permissions' ),
                               'component' => $this,
                               'modal' => 1,
                               'columns' => ['id'],
                               'input_options' => $input_options,
                               'method' => 'add_permissions'];
        }
        if ( $table->im_export ) {
            $list_actions[] = ['name' => 'export_objects', 'input' => 0,
                               'label' => $app->translate( 'Export CSV' ),
                               'component' => $this,
                               // 'columns' => '*',
                               'method' => 'export_objects'];
        }
        if ( $model == 'urlinfo' ) {
            // or if ( $obj->has_column( 'delete_flag' ) ) {
            $list_actions[] = ['name' => 'physical_delete', 'input' => 0,
                               'label' => $app->translate( 'Physical Delete' ),
                               'component' => $this,
                               'columns' => 'id,url,file_path,meta_id',
                               'method' => 'physical_delete'];
            $list_actions[] = ['name' => 'republish_urlinfo', 'input' => 0,
                               'label' => $app->translate( 'Re-Publish URLs' ),
                               'component' => $this,
                               'columns' => '*',
                               'method' => 'republish_urlinfo'];
            $list_actions[] = ['name' => 'reset_urlinfo', 'input' => 0,
                               'label' => $app->translate( 'Reset URL' ),
                               'component' => $this,
                               'columns' => 'id,url,dirname,file_path,relative_url,urlmapping_id,relative_path,workspace_id',
                               'method' => 'reset_urlinfo'];
            if ( $app->param( 'select_system_filters' ) === 'waiting_queue' ) {
                $list_actions[] = ['name' => 'cancel_queues', 'input' => 0,
                                   'label' => $app->translate( 'Cancel Publish Queues' ),
                                   'component' => $this,
                                   'columns' => 'id,is_published',
                                   'method' => 'cancel_queues'];
            }
        }
        if ( $table->has_status && $table->start_end ) {
            $list_actions[] = ['name' => 'set_published_on', 'input' => 'datetime-local',
                               'label' => $app->translate( 'Set Publish Date' ),
                               'component' => $this,
                               'columns' => ['id', 'published_on'],
                               'method' => 'set_date_and_time'];
            $list_actions[] = ['name' => 'set_unpublished_on', 'input' => 'datetime-local',
                               'label' => $app->translate( 'Set Unpublish Date' ),
                               'component' => $this,
                               'columns' => ['id', 'unpublished_on'],
                               'method' => 'set_date_and_time'];
        }
        if ( $table->revisable && $app->param( 'manage_revision' ) ) {
            $list_actions[] = ['name' => 'apply_to_master',
                               'input' => 0,
                               'label' => $app->translate( 'Apply to Master' ),
                               'component' => $this,
                               'columns' => ['id'],
                               'method' => 'apply_to_master'];
        }
        if ( $table->auditing ) {
            $list_actions[] = ['name' => 'set_created_by', 'input' => 1,
                               'hint' => $app->translate( 'Enter user name or email.' ),
                               'label' => $app->translate( 'Set Created By' ),
                               'component' => $this,
                               'columns' => ['id', 'created_by'],
                               'method' => 'set_created_by'];
        }
        if ( $query = $app->param( 'query' ) ) {
            if ( $table->menu_type != 3 ) {
                $list_actions[] = ['name' => 'search_replace', 'input' => 1, 'allow_empty' => 1,
                                   'label' => $app->translate( "Replace '%s'", $query ),
                                   'columns' => '*',
                                   'hint' => $app->translate( "Replaces '%1\$s' in the selected %2\$s with the entered string.",
                                   [ $app->escape( $query ), $app->translate( $table->plural ) ] ),
                                   'component' => $this,
                                   'order' => 0,
                                   'method' => 'search_replace'];
            }
        }
        $actions = [];
        foreach ( $list_actions as $list_action ) {
            if (! isset( $list_action['hint'] ) ) {
                $list_action['hint'] = '';
            }
            if (! isset( $list_action['modal'] ) ) {
                $list_action['modal'] = '';
            }
            if (! isset( $list_action['input_options'] ) ) {
                $list_action['input_options'] = [];
            }
            $actions[] = $list_action;
        }
        $list_actions = $actions;
        return $app->get_registries( $model, 'list_actions', $list_actions );
    }

    function set_aggregate_target ( $app, $objects, $action ) {
        $action_name = $action['name'];
        $value = $action_name == 'unset_aggregate_target' ? 0 : 1;
        $counter = 0;
        foreach ( $objects as $obj ) {
            if ( $obj->aggregate != $value ) {
                $obj->aggregate( $value );
                $obj->save();
                $counter++;
            }
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model=question&"
                     . "apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function reassociate_urls ( $app, $objects, $action ) {
        $counter = 0;
        foreach ( $objects as $obj ) {
            if (! $obj->meta ) {
                $obj->save();
                $counter++;
            } else {
                $meta = unserialize( $obj->meta );
                $to_ids = [];
                foreach ( $meta as $url => $data ) {
                    $data['url'] = $url;
                    $url_obj = $app->db->model( 'urlinfo' )->get_by_key( $data, null, 'id' );
                    if ( $url_obj->id ) {
                        $to_ids[] = (int) $url_obj->id;
                    }
                }
                if (!empty( $to_ids ) ) {
                    $args = ['from_id' => $obj->id, 
                             'name' => 'urls',
                             'from_obj' => 'menu',
                             'to_obj' => 'urlinfo'];
                    $app->set_relations( $args, $to_ids );
                    $counter++;
                }
            }
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model=menu&"
                     . "apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function add_permissions ( $app, $objects, $action ) {
        if (! $app->user()->is_superuser ) {
            return $app->error( 'Permission denied.' );
        }
        $model = $app->param( '_model' );
        $input = $app->param( 'itemset_action_input' );
        if ( $input == 'system' ) {
            $param = ['page_title' => $app->translate( 'Select Roles' ), 'select_model' => 'role',
                      'class' => 'system', 'user_ids' => $app->param( 'id' ) ];
            echo $app->build_page( 'add_permissions.tmpl', $param );
        } else if ( $input == 'workspace' ) {
            $param = ['page_title' => $app->translate( 'Select WorkSpaces' ),
                      'select_model' => 'workspace', 'user_ids' => $app->param( 'id' ) ];
            echo $app->build_page( 'add_permissions.tmpl', $param );
        } else if ( $input == 'workspace_select' ) {
            $param = ['page_title' => $app->translate( 'Select Roles' ), 'select_model' => 'role',
                      'class' => 'workspace', 'user_ids' => $app->param( 'user_id' ), 'workspace_ids' => $app->param( 'id' ) ];
            echo $app->build_page( 'add_permissions.tmpl', $param );
        } else {
            $user_ids = $app->param( 'user_id' );
            $workspace_ids = $app->param( 'workspace_ids' );
            $role_ids = $app->param( 'id' );
            $counter = 0;
            $assoc_user_ids = [];
            $rel_terms = ['name' => 'users', 'from_obj' => 'association', 'to_obj' => 'user'];
            foreach ( $user_ids as $user_id ) {
                $user = $app->db->model( $model )->load( (int)$user_id, null, 'id' );
                if (! $user ) continue;
                foreach ( $workspace_ids as $workspace_id ) {
                    $workspace_id = (int) $workspace_id;
                    if ( $workspace_id ) {
                        $workspace = $app->db->model( 'workspace' )->load( (int)$workspace_id, null, 'id' );
                        if (! $workspace ) continue;
                    }
                    $permission = $app->db->model( 'permission' )->get_by_key(
                        ["{$model}_id" => (int)$user_id,
                         'workspace_id' => (int)$workspace_id ] );
                    if (! $permission->id ) {
                        $permission->save();
                    }
                    $user_role = $app->db->model( 'relation' )->get_by_key( [
                        'name' => 'roles', 'from_obj' => 'permission', 'to_obj' => 'role',
                        'from_id' => $permission->id
                    ], ['limit' => 1, 'sort' => 'order', 'direction' => 'descend'] );
                    $last = $user_role->id ? $user_role->order : 0;
                    $last++;
                    foreach ( $role_ids as $role_id ) {
                        $role = $app->db->model( 'role' )->load( (int)$role_id, null, 'id' );
                        if (! $role ) continue;
                        $relation = $app->db->model( 'relation' )->get_by_key( [
                            'name' => 'roles', 'from_obj' => 'permission', 'to_obj' => 'role',
                            'from_id' => $permission->id, 'to_id' => (int)$role_id
                        ] );
                        if (! $relation->id ) {
                            $relation->order( $last );
                            $relation->save();
                            $last++;
                        }
                    }
                }
                if ( $model == 'user' ) {
                    $user_cache = $app->db->model( 'session' )->get_by_key(
                      ['name' => 'user_permissions', 'user_id' => (int)$user_id ] );
                    if ( $user_cache->id ) {
                        $user_cache->remove();
                    }
                } else {
                    $rel_terms['from_id'] = $user->id;
                    $assoc_ids = $app->db->model( 'relation' )->load_iter( $rel_terms, null, 'to_id' );
                    $assoc_ids = $assoc_ids->fetchAll( PDO::FETCH_COLUMN );
                    $assoc_user_ids = array_merge( $assoc_user_ids, $assoc_ids );
                }
                $counter++;
            }
            if (! empty( $assoc_user_ids ) ) {
                $assoc_user_ids = array_unique( $assoc_user_ids );
                $user_caches = $app->db->model( 'session' )->load(
                      ['name' => 'user_permissions', 'user_id' => ['IN' => $assoc_user_ids] ], null, 'id' );
                if (!empty( $user_caches ) ) {
                    $app->db->model( 'session' )->remove_multi( $user_caches );
                }
            }
            $return_args = "does_act=1&__mode=view&_type=list&_model={$model}&"
                         . "apply_actions={$counter}";
            if ( $add_params = $this->add_return_params( $app ) ) {
                $return_args .= "&{$add_params}";
            }
            $param = ['return_url' => $app->admin_url . '?' . $return_args ];
            echo $app->build_page( 'add_permissions.tmpl', $param );
        }
    }

    function aggregate_contacts ( $app, $objects, $action ) {
        $aggregate_cols = [];
        $multiple_cols = [];
        $aggregates = $this->export_contacts( $app, $objects, $action,
                                              true, $aggregate_cols, $multiple_cols );
        $colors = ['#D9ECFF', '#FAF9DC', '#EFD9D9', '#D7EDCF', '#FFFFFF',
                   '#DDBBFF', '#E9E9FA', '#FFDDAA', '#EEEEEE'];
        $aggregate_vars = [];
        $aggregate_counts = [];
        $aggregate_data = [];
        $aggregate_colors = [];
        $aggregate_raw_colors = [];
        $aggregate_labels = [];
        $aggregate_percents = [];
        foreach ( $aggregate_cols as $col => $dummy ) {
            if ( isset( $aggregates[ $col ] ) ) {
                $sorted = $aggregates[ $col ];
                arsort( $sorted );
                $counter = 0;
                $data = [];
                $dataColors = [];
                $dataRawColors = [];
                $labels = [];
                $percents = [];
                $i = 0;
                $new_data = [];
                foreach ( $sorted as $key => $count ) {
                    $counter += $count;
                    $data[] = $count;
                    if (! $key ) $key = $app->translate( '(No Answer)' );
                    $esc_key = str_replace( ',', '\\,', $key );
                    $esc_key = str_replace( "'", "\\'", $key );
                    $esc_key = $app->ctx->modifier_trim_to( $esc_key, '15+...', $app->ctx );
                    $labels[] = "'{$esc_key}'";
                    if (! isset( $colors[$i] ) ) {
                        $i = 0;
                    }
                    $dataRawColors[] = $colors[$i];
                    $dataColors[] = "'" . $colors[$i] . "'";
                    $new_data[ $key ] = $count;
                    $i++;
                }
                foreach ( $sorted as $key => $count ) {
                    $percent = $count / $counter * 100;
                    $percent = number_format( $percent, 1, '.', ',' );
                    $percents[] = $percent . '%';
                }
                $aggregate_counts[] = $counter;
                $aggregate_vars[ $col ] = $new_data;
                $aggregate_data[] = $data;
                $aggregate_colors[] = $dataColors;
                $aggregate_raw_colors[] = $dataRawColors;
                $aggregate_labels[] = $labels;
                $aggregate_percents[] = $percents;
            }
        }
        // $app->param( '_type', 'edit' );
        $_REQUEST['_type'] = 'edit';
        $app->ctx->vars['can_create'] = 1;
        $app->ctx->vars['model'] = 'contact';
        $app->ctx->vars['aggregate_results'] = $aggregate_vars;
        $app->ctx->vars['aggregate_counts']  = $aggregate_counts;
        $app->ctx->vars['aggregate_data']    = $aggregate_data;
        $app->ctx->vars['aggregate_colors']  = $aggregate_colors;
        $app->ctx->vars['aggregate_labels']  = $aggregate_labels;
        $app->ctx->vars['aggregate_raw_colors'] = $aggregate_raw_colors;
        $app->ctx->vars['aggregate_total'] = count( $objects );
        $app->ctx->vars['aggregate_percents'] = $aggregate_percents;
        $app->ctx->vars['multiple_cols'] = array_keys( $multiple_cols );
        $app->build_page('aggregate_contacts.tmpl');
    }

    function export_contacts ( $app, $objects, $action, $aggregate = null,
            &$aggregate_cols = [], &$multiple_cols = [] ) {
        if ( is_object( $aggregate_cols ) ) {
            $aggregate_cols = [];
        }
        $encoding = $app->param( 'itemset_action_input' );
        $plural = 'contacts';
        $ts = date( 'Y-m-d_H-i-s' );
        $upload_dir = $app->upload_dir();
        $csv_out = $upload_dir . DS . "{$plural}-{$ts}.csv";
        $add_cols = $app->contact_csv_add_cols ?? ['created_on'];
        $col_names = [];
        $has_attachments = false;
        $has_tags = false;
        foreach( $objects as $obj ) {
            $data = json_decode( $obj->data, true );
            $question_map = json_decode( $obj->question_map, true );
            foreach ( $data as $key => $value ) {
                $id = preg_replace( '/^question_/', '', $key );
                $q = $app->db->model( 'question' )->load( (int) $id );
                $label = '';
                if ( $q ) {
                    $label = $q->label;
                } else {
                    $label = $question_map[ $key ];
                }
                $col_names[ $label ] = true;
            }
            if (! $has_attachments ) {
                $attachmentfiles = $app->get_relations( $obj, 'attachmentfile' );
                if ( count( $attachmentfiles ) ) {
                    $has_attachments = true;
                }
            }
            if (! $has_tags ) {
                $tags = $app->get_relations( $obj, 'tag' );
                if ( count( $tags ) ) {
                    $has_tags = true;
                }
            }
        }
        $col_names = array_keys( $col_names );
        $label_names = $col_names;
        // array_unshift( $col_names, $app->translate( 'Email' ) );
        if ( $app->contact_export_subject ) {
            array_unshift( $col_names, $app->translate( 'Subject' ) );
        }
        array_unshift( $col_names, $app->translate( 'Form' ) );
        array_unshift( $col_names, 'contact_id' );
        if ( $has_tags ) {
            $col_names[] = $app->translate( 'Tags' );
        }
        foreach ( $add_cols as $add_col ) {
            $add_label = $app->translate( $app->translate( $add_col, '', $app, 'default' ) );
            $col_names[] = $add_label;
        }
        $fp = $aggregate ? null : fopen( $csv_out, 'w' );
        if (! $aggregate && $encoding === 'Shift_JIS' ) {
            stream_filter_append( $fp, 'convert.iconv.UTF-8/CP932//TRANSLIT', STREAM_FILTER_WRITE );
        }
        $error_lines = [];
        if (! $aggregate ) {
            if ( $app->csv_with_bom && $encoding === 'UTF-8' ) {
                fwrite( $fp, '   ' );
            }
            fputcsv( $fp, $col_names, ',', '"' );
        }
        $aggregate_values = [];
        foreach( $objects as $obj ) {
            $data = json_decode( $obj->data, true );
            $question_map = json_decode( $obj->question_map, true );
            $values = [];
            $connectors = [];
            foreach ( $data as $key => $value ) {
                $id = preg_replace( '/^question_/', '', $key );
                $q = $app->db->model( 'question' )->load( (int) $id );
                $label = '';
                if ( $q ) {
                    $label = $q->label;
                    if ( $q->connector ) {
                        $connectors[ $label ] = $q->connector;
                    }
                    if ( $q->aggregate ) {
                        $aggregate_cols[ $label ] = true;
                    }
                    if ( $q->multiple ) {
                        $multiple_cols[ $label ] = true;
                    }
                } else {
                    $label = $question_map[ $key ];
                }
                if ( isset( $values[ $label ] ) ) {
                    if ( is_array( $values[ $label ] ) ) {
                        $values[ $label ][] = $value;
                    } else {
                        $values[ $label ] = [ $values[ $label ], $value ];
                    }
                } else {
                    $values[ $label ] = $value;
                }
            }
            $csv_values = [];
            $csv_values[] = $obj->id;
            $form = $obj->form;
            $form_name = $form ? $form->name : $app->translate( '*Deleted*' );
            $csv_values[] = $form_name;
            if ( $app->contact_export_subject ) {
                $csv_values[] = $obj->subject;
            }
            // $csv_values[] = $obj->email;
            foreach ( $label_names as $label ) {
                if (! isset( $values[ $label ] ) ) {
                    $values[ $label ] = '';
                }
                $value = $values[ $label ];
                if (! isset( $aggregate_values[ $label ] ) ) {
                    $aggregate_values[ $label ] = [];
                }
                if ( is_array( $value ) ) {
                    foreach ( $value as $v ) {
                        if ( isset( $aggregate_values[ $label ][ $v ] ) ) {
                            $aggregate_values[ $label ][ $v ]
                                = $aggregate_values[ $label ][ $v ] + 1;
                        } else {
                            $aggregate_values[ $label ][ $v ] = 1;
                        }
                    }
                    $conn = isset( $connectors[ $label ] ) ? $connectors[ $label ] : ', ';
                    $value = implode( ', ', $value );
                } else {
                    if ( isset( $aggregate_values[ $label ][ $value ] ) ) {
                        $aggregate_values[ $label ][ $value ]
                            = $aggregate_values[ $label ][ $value ] + 1;
                    } else {
                        $aggregate_values[ $label ][ $value ] = 1;
                    }
                }
                $csv_values[] = $value;
            }
            if ( $has_tags ) {
                $tags = $app->get_related_objs( $obj, 'tag', 'tags' );
                $tag_values = [];
                if (! empty( $tags ) ) {
                    foreach ( $tags as $tag ) {
                        $tag_values[] = $tag->name;
                    }
                }
                $csv_values[] = implode( ', ', $tag_values );
            }
            if ( $has_attachments && ! $aggregate ) {
                $files = $app->get_related_objs( $obj, 'attachmentfile', 'attachmentfiles' );
                if (! empty( $files ) ) {
                    $files_dir = $upload_dir . DS . $obj->id;
                    foreach ( $files as $file ) {
                        if ( $file->file ) {
                            $path = $files_dir . DS . $file->name;
                            if ( file_exists( $path ) ) {
                                $path = PTUtil::unique_filename( $path );
                            }
                            $app->fmgr->put( $path, $file->file );
                        }
                    }
                }
            }
            foreach ( $add_cols as $add_col ) {
                $csv_values[] = $obj->$add_col;
            }
            if (! $aggregate ) {
                $res = fputcsv( $fp, $csv_values, ',', '"' );
                if (! $res ) {
                    $has_data = false;
                    foreach ( $csv_values as $v ) {
                        if ( $v != '' ) {
                            $has_data = true;
                            break;
                        }
                    }
                    if ( $has_data ) {
                        $tempLine = '"';
                        foreach ( $csv_values as $idx => $column_value ) {
                            if ( strpos( $column_value, '"' ) !== false ) {
                                $column_value = str_replace( '"', '""', $column_value );
                            }
                            $csv_values[ $idx ] = $column_value;
                        }
                        $tempLine .= implode( '","', $csv_values );
                        $tempLine = preg_replace("/\r\n|\r|\n/", "", $tempLine );
                        $tempLine .= '"';
                        $error_lines[] = $tempLine;
                    }
                }
            }
        }
        if ( $aggregate ) {
            return $aggregate_values;
        }
        fclose( $fp );
        if (! empty( $error_lines ) ) {
            if ( $encoding == 'Shift_JIS' ) {
                mb_convert_variables( 'sjis-win', 'utf-8', $error_lines );
            }
            $append = implode( "\n", array_values( $error_lines ) );
            file_put_contents( $csv_out, $append, FILE_APPEND );
        }
        if ( $app->csv_with_bom && $encoding === 'UTF-8' ) {
            $bom = pack( 'C*', 0xEF, 0xBB, 0xBF );
            $fp = fopen( $csv_out, 'r+b' );
            fseek( $fp, 0 );
            fwrite( $fp, $bom );
            fclose( $fp );
        }
        $zip = $upload_dir . DS . "{$plural}-{$ts}.zip";
        PTUtil::make_zip_archive( $upload_dir, $zip );
        // PTUtil::make_zip_archive( $upload_dir, $zip, "{$plural}-{$ts}" );
        PTUtil::export_data( $zip );
        // PTUtil::remove_dir( $upload_dir );
    }

    function export_objects ( $app, $objects, $action ) {
        $php_sapi = $app->php_sapi_name ? $app->php_sapi_name : php_sapi_name();
        $silence = false;
        $without_id = false;
        $encoding = 'UTF-8';
        if ( $php_sapi === 'cli' ) {
            $model = $action['model'];
            $without_id = $action['without_id'];
            $encoding = $action['encoding'];
            $silence = $action['silence'];
            $app->wait_export = false;
        } else {
            $model = $app->param( '_model' );
            $export_type = (int) $app->param( 'itemset_export_select' );
            if ( $export_type > 0 && $export_type < 5 ) {
                $encoding = ( $export_type < 3 ) ? 'UTF-8' : 'Shift_JIS';
                $without_id = false;
                if ( $export_type == 2 || $export_type == 4 ) {
                    $without_id = true;
                }
            } else {
                return $app->error( 'Invalid request.' );
            }
        }
        ini_set( 'max_execution_time', 0 );
        ignore_user_abort( true );
        ini_set( 'memory_limit', -1 );
        $fmgr = $app->fmgr;
        $fmgr->delayed = false;
        $table = $app->get_table( $model );
        $scheme = $app->get_scheme_from_db( $model );
        $column_defs = $scheme['column_defs'];
        $column_keys = array_keys( $column_defs );
        $plural = strtolower( $table->plural );
        $plural = str_replace( ' ', '_', $plural );
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $ts = date( 'Y-m-d_H-i-s' );
        $upload_dir = $app->upload_dir( false );
        $csv_out = $upload_dir . DS . "{$plural}-{$ts}.csv";
        $fp = fopen( $csv_out, 'w' );
        if ( $encoding == 'Shift_JIS' ) {
            stream_filter_append( $fp, 'convert.iconv.UTF-8/CP932//TRANSLIT', STREAM_FILTER_WRITE );
        }
        $prop_name = "{$model}_csv_exclude_cols";
        $excludes = $app->$prop_name;
        if ( $excludes ) {
            $excludes = is_array( $excludes ) ? $excludes : explode( ',', $excludes );
        } else {
            $excludes = ['rev_type', 'rev_object_id', 'rev_changed', 'rev_diff',
                         'modified_on', 'previous_owner',
                         'modified_by', 'compiled', 'last_compiled'];
            if ( $model != 'log' && $table->menu_type != 3 ) {
                $excludes = array_merge( $excludes, ['created_on', 'created_by'] );
            }
        }
        $column_defs = $scheme['column_defs'];
        $edit_properties = $scheme['edit_properties'];
        $passwords = [];
        foreach ( $column_defs as $colName => $column_def ) {
            if ( $column_def['type'] == 'blob' ) {
                if ( $app->export_without_bin ) {
                    $excludes[] = $colName;
                }
            } else if ( $column_def['type'] == 'string' ) {
                if ( isset( $edit_properties[ $colName ] ) ) {
                    if ( $edit_properties[ $colName ] == 'password(hash)' ) {
                        $passwords[] = $colName;
                    }
                }
            }
        }
        $load_cols = [];
        foreach ( $column_defs as $colName => $column_def ) {
            if (! in_array( $colName, $excludes ) ) {
                if ( $column_def['type'] != 'relation' ) {
                    $load_cols[] = $colName;
                }
            }
        }
        $zip = $upload_dir . DS . "{$plural}-{$ts}.zip";
        if ( $app->wait_export ) {
            $session_id = $app->magic();
            $session = $app->db->model( 'session' )->new(
                ['name' => $session_id, 'kind' => 'EX', 'user_id' => $app->user()->id, 'key' => $model,
                 'text' => $zip ] );
            $session->save();
            $ctx = $app->ctx;
            $ctx->vars['page_title'] =
            $app->translate( 'Exporting %s...', $app->translate( $table->plural ) );
            $ctx->vars['model'] = $model;
            $ctx->vars['apply_actions'] = count( $objects );
            $ctx->vars['workspace_id'] = $app->workspace() ? $app->workspace()->id : 0;
            $app->debug = false;
            $app->param( 'session_id', $session_id );
            $_REQUEST['session_id'] = $session_id;
            $app->build_page( 'wait_export.tmpl', [], true, false );
        }
        $load_cols = implode( ',', $load_cols );
        $i = 0;
        $error_lines = [];
        $attachment_cols = PTUtil::attachment_cols( $model, $scheme );
        $app->db->caching = false;
        $custom_fields = [];
        $meta_cnt = $app->db->model( 'meta' )->count(
            ['model' => $model, 'kind' => 'customfield'], null, 'id' );
        if ( $php_sapi === 'cli' &&! $silence ) {
            echo $app->translate( 'Exporting %s...', $app->translate( $table->plural ) ), PHP_EOL;
        }
        $counter = 0;
        while ( $obj = array_shift( $objects ) ) {
            $obj = $obj->load( (int) $obj->id, [], $load_cols );
            $values = $obj->get_values();
            if ( $without_id ) {
                unset( $values["{$model}_id"] );
            }
            foreach ( $excludes as $exclude ) {
                if ( isset( $values["{$model}_{$exclude}"] ) ) {
                    unset( $values["{$model}_{$exclude}"] );
                }
            }
            $__values = [];
            foreach ( $column_keys as $column_key ) {
                if ( array_key_exists( "{$model}_{$column_key}", $values ) ) {
                    $__values["{$model}_{$column_key}"] = $values["{$model}_{$column_key}"];
                }
            }
            $values = $__values;
            if (! $i ) {
                $names = array_keys( $values );
                if (! empty( $relations ) ) {
                    $rel_names = array_keys( $relations );
                    foreach ( $rel_names as $rel_name ) {
                        if ( in_array( $rel_name, $excludes ) ) {
                            continue;
                        }
                        $names[] = "{$model}_{$rel_name}";
                    }
                }
                if ( $app->csv_with_bom && $encoding === 'UTF-8' ) {
                    fwrite( $fp, '   ' );
                }
                if ( $meta_cnt || !$app->csv_allow_nl ) $names[] = 'export_uuid';
                fputcsv( $fp, $names, ',', '"' );
            }
            $column_values = [];
            $text_data = [];
            foreach ( $values as $key => $value ) {
                $key = preg_replace( "/^{$model}_/", '', $key );
                if ( isset( $edit_properties[ $key ] ) ) {
                    if ( $column_defs[ $key ]['type'] == 'int' ) {
                        $edit_prop = $edit_properties[ $key ];
                        if ( strpos( $edit_prop, 'relation:' ) === 0 ) {
                            if ( preg_match( "/:hierarchy$/", $edit_prop ) ) {
                                $edit_prop = explode( ':', $edit_prop );
                                $refModel = $edit_prop[1];
                                $refCol = $edit_prop[2];
                                if ( $refModel . '_id' == $key ) {
                                    $parents = [];
                                    $refObj = $obj->$refModel;
                                    $parent = $refObj;
                                    if ( $parent ) {
                                        if ( $parent->has_column( 'parent_id' ) ) {
                                            while ( $parent !== null ) {
                                                if ( $parent_id = $parent->parent_id ) {
                                                    $parent_id = (int) $parent_id;
                                                    $parent = $app->db->model( $refModel )->load( $parent_id );
                                                    if ( $parent->id ) {
                                                        array_unshift( $parents, $parent->$refCol );
                                                    } else {
                                                        $parent = null;
                                                    }
                                                } else {
                                                    $parent = null;
                                                }
                                            }
                                        }
                                        $parents[] = $refObj->$refCol;
                                    }
                                    $value = implode( '/', $parents );
                                }
                            } else if ( $value && $app->export_int2label ) {
                                $edit_opt = explode( ':', $edit_prop );
                                if ( $key == 'parent_id' && $table->hierarchy && $model == $edit_opt[1] ) {
                                    $parents = [];
                                    $primary = $table->primary;
                                    $rel_obj = $app->db->model( $model )->load( (int) $value );
                                    $parent = $rel_obj;
                                    while ( $parent !== null ) {
                                        if ( $parent_id = $parent->parent_id ) {
                                            $parent_id = (int) $parent_id;
                                            $parent = $app->db->model( $model )->load( $parent_id );
                                            if ( $parent->id ) {
                                                array_unshift( $parents, $parent->$primary );
                                            } else {
                                                $parent = null;
                                            }
                                        } else {
                                            $parent = null;
                                        }
                                    }
                                    $parents[] = $rel_obj->$primary;
                                    $value = implode( '/', $parents );
                                } else if ( $edit_opt[1] !== 'asset' && $edit_opt[1] !== 'attachmentfile' ) {
                                    $ref_table = $app->get_table( $edit_opt[1] );
                                    if ( is_object( $ref_table ) && $ref_table->primary ) {
                                        $reference_obj = $app->db->model( $edit_opt[1] )->load( (int) $value );
                                        $ref_primary = $ref_table->primary;
                                        if ( $reference_obj && $reference_obj->$ref_primary ) {
                                            $value = $reference_obj->$ref_primary;
                                        }
                                    }
                                } else if ( $value && $edit_opt[1] === 'asset' ) {
                                    $reference_obj = $app->db->model( 'asset' )->load( (int) $value );
                                    if ( $reference_obj ) {
                                        $urlinfo = $app->db->model( 'urlinfo' )->get_by_key(
                                            ['model' => 'asset', 'object_id' => $reference_obj->id,
                                             'key' => 'file', 'class' => 'file', 'delete_flag' => [0, 1] ] );
                                        if ( $urlinfo->id && $urlinfo->relative_path ) {
                                            $relative_path = $urlinfo->relative_path;
                                            $outpath = preg_replace( "/^%r/", $upload_dir, $relative_path );
                                            if (! $app->export_without_bin ) {
                                                $app->fmgr->mkpath( dirname( $outpath ) );
                                                file_put_contents( $outpath, $reference_obj->file );
                                            }
                                            $mata = $app->db->model( 'meta' )->get_by_key(
                                                ['kind' => 'metadata', 'object_id' => $reference_obj->id, 'model' => 'asset'] );
                                            $metadata = $mata->text;
                                            $label = null;
                                            $basename = basename( $reference_obj->file_name, '.' . $reference_obj->file_ext );
                                            if ( $metadata && preg_match( '/^{.*}$/s', $metadata ) ) {
                                                $metadata = json_decode( $mata->text, true );
                                                if ( is_array( $metadata ) && isset( $metadata['label'] ) ) {
                                                    $label = $metadata['label'];
                                                    $relative_path .= ';' . $label;
                                                }
                                            }
                                            if (! $label && $basename !== $reference_obj->label ) {
                                                $relative_path .= ';' . $reference_obj->label;
                                            }
                                            $value = $relative_path;
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else if ( $key == 'created_by' && $value ) {
                    // TODO::reference:...
                    $creator = $app->db->model( 'user' )->load( (int)$value );
                    if ( $creator ) {
                        $value = $creator->nickname;
                    } else {
                        $balue = $app->translate( '*Deleted*' );
                    }
                }
                if ( $column_defs[ $key ]['type'] == 'blob' && $value ) {
                    $value = $obj->$key;
                    if ( $value ) {
                        $urlinfo = $app->db->model( 'urlinfo' )->get_by_key(
                            ['model' => $obj->_model, 'object_id' => $obj->id,
                             'key' => $key, 'class' => 'file', 'delete_flag' => [0, 1] ] );
                        if (! $urlinfo->id ) {
                            $app->publish_obj( $obj );
                            $app->db->clear_cache( $obj->_model );
                            $urlinfos = $app->db->model( 'urlinfo' )->load(
                                ['model' => $obj->_model, 'object_id' => $obj->id,
                                 'key' => $key, 'class' => 'file', 'delete_flag' => [0, 1] ] );
                            if ( is_array( $urlinfos ) && !empty( $urlinfos ) ) {
                                $urlinfo = $urlinfos[0];
                            }
                        }
                        if ( is_object( $urlinfo ) && $urlinfo->relative_path ) {
                            $relative_path = $urlinfo->relative_path;
                            $outpath = preg_replace( "/^%r/", $upload_dir, $relative_path );
                            if (! $app->export_without_bin ) {
                                $app->fmgr->mkpath( dirname( $outpath ) );
                                file_put_contents( $outpath, $value );
                            }
                            $mata = $app->db->model( 'meta' )->get_by_key(
                                ['kind' => 'metadata', 'object_id' => $obj->id, 'model' => $obj->_model, 'key' => $key ] );
                            $metadata = $mata->text;
                            if ( $metadata && preg_match( '/^{.*}$/s', $metadata ) ) {
                                $metadata = json_decode( $mata->text, true );
                                if ( is_array( $metadata ) && isset( $metadata['label'] ) ) {
                                    $label = $metadata['label'];
                                    $relative_path .= ';' . $label;
                                }
                            }
                            $value = $relative_path;
                        }
                    }
                } else if ( ( $column_defs[ $key ]['type'] == 'text' || $column_defs[ $key ]['type'] == 'string' )
                    && $value && !$app->csv_allow_nl && preg_match( "/\r|\n/", $value ) ) {
                    $text_data[ $key ] = $value;
                    $value = '';
                } else if ( $column_defs[ $key ]['type'] == 'datetime' ) {
                    $value = $obj->db2ts( $value );
                    if ( $value ) {
                        $value = date( DATE_ATOM, strtotime( $value ) );
                        list( $value, $tz ) = explode( '+', $value );
                    }
                } else if ( in_array( $key, $attachment_cols ) ) {
                    if (! $value ) {
                        $value = '';
                    } else {
                        $rel_obj = $app->db->model( 'attachmentfile' )->load( (int) $value );
                        $value = '';
                        if ( $rel_obj ) {
                            if ( $rel_obj->file ) {
                                $relative_path = $app->get_assetproperty(
                                        $rel_obj, 'file', 'relative_path' );
                                if ( $relative_path ) {
                                    $outpath = preg_replace(
                                        "/^%r/", $upload_dir, $relative_path );
                                    if (! $app->export_without_bin ) {
                                        $app->fmgr->mkpath( dirname( $outpath ) );
                                        file_put_contents( $outpath, $rel_obj->file );
                                    }
                                    // $relative_path = $rel_obj->workspace_id ?
                                    //     "%w/{$relative_path}" : "%s/{$relative_path}";
                                    $mata = $app->db->model( 'meta' )->get_by_key(
                                        ['kind' => 'metadata', 'object_id' => $rel_obj->id, 'model' => $rel_obj->_model ] );
                                    $metadata = $mata->text;
                                    if ( $metadata && preg_match( '/^{.*}$/s', $metadata ) ) {
                                        $metadata = json_decode( $mata->text, true );
                                        if ( is_array( $metadata ) && isset( $metadata['label'] ) ) {
                                            $label = $metadata['label'];
                                            $relative_path .= ';' . $label;
                                        }
                                    }
                                    $value = $relative_path;
                                }
                            }
                        }
                    }
                }
                if ( in_array( $key, $passwords ) ) {
                    $value = '';
                }
                $column_values[] = $value;
            }
            if (! empty( $relations ) ) {
                foreach ( $relations as $name => $to_obj ) {
                    if ( in_array( $name, $excludes ) ) {
                        continue;
                    }
                    $terms = ['from_id'  => $obj->id, 
                              'name'     => $name,
                              'from_obj' => $obj->_model ];
                    if ( $to_obj !== '__any__' ) $terms['to_obj'] = $to_obj;
                    $rel_objs = $app->db->model( 'relation' )->load(
                                                $terms, ['sort' => 'order'] );
                    $ids = [];
                    $labels = [];
                    $rel_model = '';
                    foreach( $rel_objs as $relation ) {
                        $rel_model = $relation->to_obj;
                        if (! $rel_model ) continue;
                        $to_id = (int) $relation->to_id;
                        $rel_obj = $app->db->model( $rel_model )->load( $to_id );
                        if ( $rel_obj ) {
                            $rel_table = $app->get_table( $rel_model );
                            $refCol = null;
                            if ( $rel_table->hierarchy && isset( $edit_properties[ $name ] ) ) {
                                $edit_prop = $edit_properties[ $name ];
                                if ( strpos( $edit_prop, 'relation:' ) === 0 ) {
                                    if ( preg_match( "/:hierarchy$/", $edit_prop ) ) {
                                        $edit_prop = explode( ':', $edit_prop );
                                        $refCol = $edit_prop[2];
                                    }
                                }
                            }
                            $primary = $refCol ? $refCol : $rel_table->primary;
                            if ( $rel_obj->_model == 'asset' || $rel_obj->_model == 'attachmentfile' ) {
                                if ( $rel_obj->file ) {
                                    $relative_path = $app->get_assetproperty(
                                            $rel_obj, 'file', 'relative_path' );
                                    if ( $relative_path === '' ) {
                                        $app->publish_obj( $rel_obj );
                                        $relative_path = $app->get_assetproperty(
                                                $rel_obj, 'file', 'relative_path' );
                                    }
                                    if ( $rel_obj->_model == 'asset'
                                        && $relative_path === null ) {
                                        $cb = ['name' => 'post_save', 'is_new' => false ];
                                        $app->post_save_asset( $cb, $app, $rel_obj );
                                        $app->db->clear_cache( $rel_obj->_model );
                                        $relative_path = $app->get_assetproperty(
                                                $rel_obj, 'file', 'relative_path' );
                                    }
                                    if ( $relative_path ) {
                                        $outpath = preg_replace(
                                            "/^%r/", $upload_dir, $relative_path );
                                        if (! $app->export_without_bin ) {
                                            $app->fmgr->mkpath( dirname( $outpath ) );
                                            file_put_contents( $outpath, $rel_obj->file );
                                        }
                                        // $relative_path = $rel_obj->workspace_id ?
                                        //     "%w/{$relative_path}" : "%s/{$relative_path}";
                                        if ( $rel_obj->_model != 'attachmentfile' ) {
                                            $mata = $app->db->model( 'meta' )->get_by_key(
                                                ['kind' => 'metadata', 'object_id' => $rel_obj->id, 'model' => $rel_obj->_model ] );
                                            $metadata = $mata->text;
                                            if ( $metadata && preg_match( '/^{.*}$/s', $metadata ) ) {
                                                $metadata = json_decode( $mata->text, true );
                                                if ( is_array( $metadata ) && isset( $metadata['label'] ) ) {
                                                    $label = $metadata['label'];
                                                    $relative_path .= ';' . $label;
                                                }
                                            }
                                        } else {
                                            $relative_path .= ';' . $rel_obj->name;
                                        }
                                        $labels[] = $relative_path;
                                    }
                                }
                            } else {
                                if ( $refCol && $rel_obj->has_column( 'parent_id' ) ) {
                                    $parents = [];
                                    $parent = $rel_obj;
                                    while ( $parent !== null ) {
                                        if ( $parent_id = $parent->parent_id ) {
                                            $parent_id = (int) $parent_id;
                                            $parent = $app->db->model( $rel_model )->load( $parent_id );
                                            if ( $parent->id ) {
                                                array_unshift( $parents, $parent->$primary );
                                            } else {
                                                $parent = null;
                                            }
                                        } else {
                                            $parent = null;
                                        }
                                    }
                                    $parents[] = $rel_obj->$primary;
                                    $labels[] = implode( '/', $parents );
                                } else {
                                    $labels[] = $rel_obj->$primary;
                                }
                            }
                        }
                    }
                    if ( $to_obj == '__any__' ) {
                        array_unshift( $labels, $rel_model );
                    }
                    $column_values[] = implode( ',', $labels );
                }
            }
            $export_uuid = null;
            if ( $meta_cnt || !empty( $text_data ) ) {
                $uuid_model = $obj->has_column( 'uuid' ) ? $obj->_model : null;
                $export_uuid = $app->generate_uuid( $uuid_model );
                $column_values[] = $export_uuid;
            }
            $res = fputcsv( $fp, $column_values, ',', '"' );
            $counter++;
            if ( $php_sapi === 'cli' && ! $silence ) {
                if ( $counter % 50 === 0 ) {
                    echo PHP_EOL;
                }
                echo '*';
            }
            if (! $res ) {
                $has_data = false;
                foreach ( $column_values as $v ) {
                    if ( $v != '' ) {
                        $has_data = true;
                        break;
                    }
                }
                if ( $has_data ) {
                    $tempLine = '"';
                    foreach ( $column_values as $idx => $column_value ) {
                        if ( $column_value !== null ) {
                            if ( strpos( $column_value, '"' ) !== false ) {
                                $column_value = str_replace( '"', '""', $column_value );
                            }
                        }
                        $column_values[ $idx ] = $column_value;
                    }
                    $tempLine .= implode( '","', $column_values );
                    $tempLine = preg_replace("/\r\n|\r|\n/", "", $tempLine );
                    $tempLine .= '"';
                    $error_lines[] = $tempLine;
                }
            }
            if ( $meta_cnt && $export_uuid ) {
                $metadata = $app->db->model( 'meta' )->load(
                    ['object_id' => $obj->id, 'model' => $obj->_model, 'kind' => 'customfield'], null,
                     'model,kind,type,name,key,value,text,field_id,number' );
                if ( count( $metadata ) ) {
                    $data = [];
                    foreach ( $metadata as $meta ) {
                        $field_id = $meta->field_id;
                        $meta = $meta->get_values( true );
                        unset( $meta['id'], $meta['object_id'], $meta['field_id'] );
                        $field = $app->db->model( 'field' )->load( (int) $field_id );
                        if ( $field ) {
                            $meta['field_basename'] = $field->basename;
                        }
                        $values = json_decode( $meta['text'], true );
                        if ( $values !== null && is_array( $values ) && count( $values ) === 1 && isset( $values['value'] ) ) {
                            $meta['value'] = $values['value']; // Because the text length of the value column is 255.
                            unset( $meta['text'] );
                        } else if ( $values !== null && is_array( $values ) ) {
                            $meta['text'] = $values;
                        }
                        $data[] = $meta;
                    }
                    $custom_fields[ $export_uuid ] = $data;
                }
            }
            if (! empty( $text_data ) && $export_uuid ) {
                $text_dir = dirname( $csv_out ) . DS . 'texts' . DS . $export_uuid;
                if ( $fmgr->mkpath( $text_dir ) ) {
                    foreach ( $text_data as $column => $text ) {
                        $fmgr->put( $text_dir . DS . "{$model}_{$column}.txt", $text );
                    }
                }
            }
            $i++;
        }
        fclose( $fp );
        if (! empty( $error_lines ) ) {
            if ( $encoding == 'Shift_JIS' ) {
                mb_convert_variables( 'sjis-win', 'utf-8', $error_lines );
            }
            $append = implode( "\n", array_values( $error_lines ) );
            file_put_contents( $csv_out, $append, FILE_APPEND );
        }
        if ( $app->csv_with_bom && $encoding === 'UTF-8' ) {
            $bom = pack( 'C*', 0xEF, 0xBB, 0xBF );
            $fp = fopen( $csv_out, 'r+b' );
            fseek( $fp, 0 );
            fwrite( $fp, $bom );
            fclose( $fp );
        }
        if (!empty( $custom_fields ) ) {
            $json = preg_replace( "/\.csv$/", '.json', $csv_out );
            file_put_contents( $json, json_encode( $custom_fields, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
        }
        PTUtil::make_zip_archive( $upload_dir, $zip );
        if ( $php_sapi === 'cli' ) {
            return $zip;
        }
        if (! $app->wait_export ) {
            PTUtil::export_data( $zip );
            PTUtil::remove_dir( $upload_dir );
        }
    }

    function wait_export ( $app ) {
        $app->validate_magic();
        $session_id = $app->param( 'session_id' );
        $model = $app->param( 'model' );
        $apply_actions = $app->param( 'apply_actions' );
        $session = $app->db->model( 'session' )->get_by_key(
            ['name' => $session_id, 'kind' => 'EX', 'user_id' => $app->user()->id, 'key' => $model ] );
        if (! $session->id ) {
            return $app->error( 'Invalid request.' );
        }
        $table = $app->get_table( $model );
        if (! $table ) {
            return $app->error( 'Invalid request.' );
        }
        $zip = $session->text;
        $ctx = $app->ctx;
        $ctx->vars['model'] = $model;
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $ctx->vars['workspace_id'] = $workspace_id;
        $ctx->vars['apply_actions'] = (int) $apply_actions;
        if (! $app->fmgr->exists( $zip ) ) {
            $ctx->vars['page_title'] =
            $app->translate( 'Exporting %s...', $app->translate( $table->plural ) );
            $app->build_page( 'wait_export.tmpl' );
            exit();
        }
        $ready_to_export = $app->param( 'ready_to_export' );
        if (! $ready_to_export ) {
            $ctx->vars['ready_to_export'] = true;
            $ctx->vars['page_title'] =
            $ctx->vars['page_title'] =
            $app->translate( 'Exporting %s...', $app->translate( $table->plural ) );
            $return_args = "does_act=1&__mode=view&_type=list&_model={$model}&apply_actions={$apply_actions}";
            if ( $add_params = $this->add_return_params( $app ) ) {
                $return_args .= "&{$add_params}";
            }
            if ( $workspace_id ) {
                $return_args .= "&workspace_id={$workspace_id}";
            }
            $ctx->vars['return_args'] = $return_args;
            $filesize = filesize( $zip );
            if ( $filesize > 1000000 ) {
                $ctx->vars['wait_time'] = 5000;
            } else {
                $ctx->vars['wait_time'] = 2500;
            }
            $app->build_page( 'wait_export.tmpl' );
            exit();
        }
        PTUtil::export_data( $zip );
        PTUtil::remove_dir( dirname( $zip ) );
        $session->remove();
    }

    function set_state ( $app, $objects, $action ) {
        $state = (int) $app->param( 'itemset_action_input' );
        $model = $app->param( '_model' );
        $obj = $app->db->model( $model );
        if (! $obj->has_column( 'state' ) ) {
            return $app->error( 'Invalid request.' );
        }
        $table = $app->get_table( $model );
        $column = $app->db->model( 'column' )->get_by_key(
            ['table_id' => $table->id, 'name' => 'state'] );
        $status_text = '';
        if ( $column->id ) {
            $options = explode( ',', $column->options );
            if (! isset( $options[ $state - 1 ] ) ) {
                return $app->error( 'Invalid request.' );
            }
            $status_text = $app->translate( $options[ $state - 1 ] );
        }
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $counter = 0;
        foreach ( $objects as $obj ) {
            if ( $obj->state != $state ) {
                $obj->state( $state );
                $obj->save();
                $counter++;
            }
        }
        if ( $counter ) {
            $action = $action['label'] . " ({$status_text})";
            $this->log( $action, $model, $counter );
            $db->commit();
            $app->txn_active = false;
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}&"
                     . "apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function set_date_and_time ( $app, $objects, $action ) {
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        $action_name = $app->param( 'action_name' );
        $action_input = $app->param('itemset_action_input');
        $action_input = preg_replace( "/[^0-9]/", '', $action_input );
        if ( strlen( $action_input ) == 12 ) {
            $action_input .= '00';
        }
        $label = $action_name == 'set_published_on' ? $app->translate( 'Publish Date' )
                                                    : $app->translate( 'Unublish Date' );
        if ( strlen( $action_input ) !== 14 ) {
            return $app->error( '%s is invalid date.', $label );
        }
        $y = substr( $action_input, 0, 4 );
        $m = (int) substr( $action_input, 4, 2 );
        $d = (int) substr( $action_input, 6, 2 );
        if (! checkdate( $m, $d, $y ) ) {
            return $app->error( '%s is invalid date.', $label );
        }
        $col_name = $action_name == 'set_published_on'
                  ? 'published_on' : 'unpublished_on';
        $counter = 0;
        $workspace_ids = [];
        $app->core_save_callbacks( $model );
        $callback = ['name' => 'post_save', 'error' => '', 'is_new' => false ];
        $publish_ids = [];
        $current_ts = date( 'YmdHis' );
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $callbackObjs = [];
        foreach ( $objects as $obj ) {
            if ( $obj->$col_name != $action_input ) {
                $obj = $obj->load( (int) $obj->id );
                if (! $obj ) {
                    continue;
                }
                $original = clone $obj;
                $orig_date = $obj->$col_name;
                $obj->$col_name( $action_input );
                $need_rebuild = false;
                if ( $col_name == 'unpublished_on' ) {
                    $obj->has_deadline( 1 );
                    /* Realtime status change.
                    if ( $current_ts > $action_input ) {
                        $obj->status( 5 );
                        $need_rebuild = true;
                    }
                    */
                }
                if ( $obj->status == 4 ) {
                    $need_rebuild = true;
                } else if ( $obj->status == 3 ) {
                    /* Realtime status change.
                    if ( $current_ts > $action_input ) {
                        $obj->status( 4 );
                        $need_rebuild = true;
                    }
                    */
                }
                $app->set_default( $obj, false, true );
                $obj->save();
                $original->$col_name( $orig_date );
                $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
                if ( $need_rebuild ) {
                    $workspace_ids[ $workspace_id ] = true;
                    $publish_ids[] = $obj->id;
                }
                $callbackObjs[] = ['obj' => $obj, 'original' => $original ];
                $counter++;
            }
        }
        if ( !empty( $db->errors ) ) {
            $errstr = $app->translate( 'An error occurred while saving %s.',
                      $app->translate( $table->label ) );
            $app->rollback( $errstr );
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
            $action = $action['label'];
            $this->log( $action, $model, $counter );
        }
        $this->start_rebuild( $app, $model, $publish_ids, $workspace_ids, $counter );
    }

    function apply_to_master ( $app, $objects, $action ) {
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        $scheme = $app->get_scheme_from_db( $model );
        $properties = $scheme['edit_properties'] ?? [];
        $status_published = $app->status_published( $model );
        $status_draft = $status_published == 4 ? 0 : 1;
        $publish_ids = [];
        $workspace_ids = [];
        $app->core_save_callbacks( $model );
        $callback = ['name' => 'post_save', 'error' => '', 'is_new' => false ];
        $counter = 0;
        $user = $app->user();
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $callbackObjs = [];
        $changes = [];
        $workflow_map = [];
        $ws_user_map = [];
        $user_map = [];
        $workflow_class = new PTWorkflow();
        foreach ( $objects as $obj ) {
            $obj = $obj->load( (int) $obj->id );
            if (! $obj ) {
                continue;
            }
            $rev_object_id = (int) $obj->rev_object_id;
            $original = $app->db->model( $obj->_model )->load( $rev_object_id );
            if (! $original ) {
                if (! $app->leave_revisions ) {
                    continue;
                }
            }
            if (! $original ) {
                if ( isset( $changes[ $obj->rev_object_id ] ) ) {
                    continue;
                }
                $changes[ $obj->rev_object_id ] = true;
                $select_cols = $app->core_tags->select_cols( $app, $obj, []);
                $revisions = $db->model( $model )->load(
                  ['rev_object_id' => $obj->rev_object_id, 'id' => ['!=' => $obj->id ] ], null, $select_cols );
                if (! empty( $revisions ) ) {
                    foreach ( $revisions as $idx => $rev ) {
                        $rev->rev_object_id( $obj->id );
                        $revisions[ $idx ] = $rev;
                    }
                    $app->db->model( $model )->update_multi( $revisions );
                }
                $obj->rev_object_id( null );
                $obj->rev_type( 0 );
                $callbackObjs[] = ['obj' => $obj ];
                $app->set_default( $obj, false, true );
                $obj->save();
                $counter++;
                continue;
            }
            $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
            if ( $obj->has_column( 'status' ) ) {
                $max_status = $app->max_status( $user, $model, $workspace_id );
                if ( $max_status < $original->status ) {
                    $app->delayed_publish_objs = [];
                    return $app->rollback( 'Permission denied.' );
                }
            }
            $clone_obj = clone $obj;
            $orig_relations = $app->get_relations( $original );
            $orig_metadata  = $app->get_meta( $original );
            $original->id( $obj->id );
            $original->_relations = $orig_relations;
            $original->_meta = $orig_metadata;
            $rev_relations = $app->get_relations( $obj );
            $rev_metadata  = $app->get_meta( $obj );
            if ( $obj->has_column( 'status' ) ) {
                $obj->status( $original->status );
            }
            $obj->id( $rev_object_id );
            $obj->_relations = $rev_relations;
            $obj->_meta = $rev_metadata;
            $obj->rev_object_id( null );
            $obj->rev_type( 0 );
            if ( $obj->has_column( 'status' ) ) {
                $original->status( $status_draft );
            }
            $original->rev_object_id( $obj->id );
            $original->rev_type( 1 );
            $this->replace_objects( $app, $obj, $original );
            $app->set_default( $obj, false, true );
            $changed_cols = [];
            $changed_cols = PTUtil::object_diff( $app, $obj, $original, ['status'], $changed_cols );
            $changed = array_keys( $changed_cols );
            $original->rev_changed( join( ', ', $changed ) );
            $original->rev_diff( json_encode( $changed_cols,
                                 JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
            if ( $obj->_model == 'asset' ) {
                $file_name = $original->file_name;
                $original_ext = $original->file_ext;
                $file_ext = $obj->file_ext;
                $file_basename = preg_replace( "/$original_ext$/i", '', $file_name );
                $obj->file_name( "{$file_basename}{$file_ext}" );
            }
            if ( $obj->has_column( 'basename' ) && $app->keep_master_basename ) {
                $obj->basename( $original->basename );
            }
            $obj->save();
            $workflow = isset( $workflow_map[ $workspace_id ] )
                      ? $workflow_map[ $workspace_id ]
                      : $app->db->model( 'workflow' )->get_by_key(
                                            ['model' => $model,
                                             'workspace_id' => $workspace_id ] );
            $workflow_map[ $workspace_id ] = $workflow;
            if ( $workflow->id ) {
                $original->_apply_revision = clone $original;
                $app->stash( 'workflow', $workflow );
                $workflow_class->workflow_post_save( $callback, $app, $obj, $original );
                if ( isset( $callback['change_case'] ) ) {
                    $old_user = $callback['old_user'];
                    if (! isset( $ws_user_map[ $workspace_id ][ $old_user->id ] ) ) {
                        $ws_user_map[ $workspace_id ][ $old_user->id ] = [];
                    }
                    $user_map[ $old_user->id ] = $old_user;
                    $ws_user_map[ $workspace_id ][ $old_user->id ][] = $obj;
                }
            }
            $app->delayed_publish_objs
                            [ $obj->_model . '_' . $obj->id ] = $obj;
            $app->set_default( $original, false, true );
            if ( $obj->has_column( 'status' ) ) {
                $original->status( $status_draft );
            }
            $original->save();
            if ( $app->assets_c && in_array( 'file', $properties ) ) {
                PTUtil::create_assets_c( $app, $original, $properties );
            }
            $original->_apply_revision = $clone_obj;
            if ( $obj->status == $status_published && $model != 'template' ) {
                $workspace_ids[ $workspace_id ] = true;
                $publish_ids[] = $obj->id;
            }
            $callbackObjs[] = ['obj' => $obj, 'original' => $original ];
            $counter++;
        }
        if ( !empty( $db->errors ) ) {
            $errstr = $app->translate( 'An error occurred while saving %s.',
                      $app->translate( $table->label ) );
            $app->rollback( $errstr );
        } else {
            $db->commit();
            $app->txn_active = false;
        }
        foreach ( $callbackObjs as $callbackObj ) {
            $obj = $callbackObj['obj'];
            $original = $callbackObj['original'] ?? $obj;
            $app->run_callbacks( $callback, $model, $obj, $original );
        }
        if (! empty( $ws_user_map ) ) {
            $this->batch_email( 'batch_apply_to_master', $ws_user_map, $user_map, $workflow_map, 0, $table, $app );
        }
        if ( $counter ) {
            $action = $action['label'];
            $this->log( $action, $model, $counter );
        }
        $this->start_rebuild( $app, $model, $publish_ids, $workspace_ids, $counter );
    }

    function set_status ( $app, $objects, $action ) {
        $model = $app->param( '_model' );
        $blob_cols = $app->db->get_blob_cols( $model, true );
        $status_published = $app->status_published( $model );
        $table = $app->get_table( $model );
        if (! $table || ! $table->has_status ) {
            return $app->error( 'Invalid request.' );
        }
        $status = (int) $app->param( 'itemset_action_input' );
        $user = $app->user();
        $counter = 0;
        $publish_ids = [];
        $error = false;
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $workflow_map = [];
        $ws_user_map = [];
        $user_map = [];
        $workspace_ids = [];
        $app->core_save_callbacks( $model );
        $callback = ['name' => 'post_save', 'error' => '', 'is_new' => false ];
        $callbackObjs = [];
        $affectedObjs = [];
        $workflow_class = new PTWorkflow();
        foreach ( $objects as $obj ) {
            if (! $obj->has_column( 'status' ) ) {
                return $app->error( 'Invalid request.' );
            }
            $original = clone $obj;
            if ( $obj->status != $status ) {
                $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
                $max_status = $app->max_status( $user, $model, $workspace_id );
                if ( $max_status < $status ) {
                    return $app->rollback( 'Permission denied.' );
                }
                if ( $obj->status == $status_published || $status == $status_published ) {
                    if ( $app->get_permalink( $obj, true ) ) {
                        $publish_ids[] = $obj->id;
                    } else {
                        $affectedObjs[] = $obj;
                        $workspace_ids[ $workspace_id ] = true;
                    }
                }
                $orig_status = $obj->status;
                $app->set_default( $obj, false, true );
                $obj->status( $status );
                if (! $obj->save() ) $error = true;
                $attachments = $app->get_related_objs( $obj, 'attachmentfile' );
                if (! empty( $attachments ) ) {
                    foreach ( $attachments as $attachment ) {
                        $attachment->status( $status );
                        $attachment->save();
                        $app->publish_obj( $attachment );
                    }
                }
                $original->status( $orig_status );
                $workflow = isset( $workflow_map[ $workspace_id ] )
                          ? $workflow_map[ $workspace_id ]
                          : $app->db->model( 'workflow' )->get_by_key(
                                                ['model' => $model,
                                                 'workspace_id' => $workspace_id ] );
                $workflow_map[ $workspace_id ] = $workflow;
                if ( $workflow->id ) {
                    $app->stash( 'workflow', $workflow );
                    $workflow_class->workflow_post_save( $callback, $app, $obj, $original );
                    if ( isset( $callback['change_case'] ) ) {
                        $old_user = $callback['old_user'];
                        if (! isset( $ws_user_map[ $workspace_id ][ $old_user->id ] ) ) {
                            $ws_user_map[ $workspace_id ][ $old_user->id ] = [];
                        }
                        $user_map[ $old_user->id ] = $old_user;
                        $ws_user_map[ $workspace_id ][ $old_user->id ][] = $obj;
                    }
                }
                if ( !empty( $blob_cols ) ) {
                    $obj = $obj->load( $obj->id );
                    $app->publish_obj( $obj, null, false, true );
                }
                $callbackObjs[] = ['obj' => $obj, 'original' => $original ];
                $counter++;
            }
        }
        if ( $error || !empty( $db->errors ) ) {
            $errstr = $app->translate( 'An error occurred while saving %s.',
                      $app->translate( $table->label ) );
            $app->rollback( $errstr );
        } else {
            $db->commit();
            $app->txn_active = false;
        }
        foreach ( $callbackObjs as $callbackObj ) {
            $obj = $callbackObj['obj'];
            $original = $callbackObj['original'];
            $app->run_callbacks( $callback, $model, $obj, $original );
        }
        $ctx = $app->ctx;
        if (! empty( $ws_user_map ) ) {
            $this->batch_email( 'batch_status_change', $ws_user_map, $user_map, $workflow_map, $status, $table, $app );
        }
        if ( $counter ) {
            $column = $app->db->model( 'column' )->get_by_key(
                      ['table_id' => $table->id, 'name' => 'status'] );
            $options = $column->options;
            $status_text = $status;
            if ( $options ) {
                $options = explode( ',', $options );
                if ( count( $options ) == 2 ) {
                    $status_text = $app->translate( $options[ $status - 1] );
                } else {
                    $status_text = $app->translate( $options[ $status ] );
                }
            }
            $action = $action['label'] . " ({$status_text})";
            $this->log( $action, $model, $counter );
            if ( !empty( $affectedObjs ) ) {
                // Object has not url_mapping.
                $maps = $app->db->model( 'urlmapping' )->load( ['container' => $model ] );
                $on_request = [];
                foreach ( $maps as $map ) {
                    foreach ( $affectedObjs as $affectedObj ) {
                        $workspace_id = $affectedObj->has_column( 'workspace_id' )
                                      ? (int) $affectedObj->workspace_id : 0;
                        $rebuild = false;
                        if ( $map->workspace_id == $workspace_id ) {
                            $rebuild = true;
                        } else if (! $map->workspace_id && !$map->container_scope ){
                            $rebuild = true;
                        }
                        if ( $rebuild ) {
                            $app->publish_dependencies( $affectedObj, null, $map, true, $on_request );
                        }
                    }
                }
            }
        }
        return $this->start_rebuild( $app, $model, $publish_ids, $workspace_ids, $counter );
    }

    function set_created_by ( $app, $objects, $action ) {
        $input = trim( $app->param( 'itemset_action_input' ) );
        $model = $app->param( '_model' );
        $counter = 0;
        $error = '';
        $column = 'name';
        if ( $app->is_valid_email( $input, $error ) ) {
            $column = 'email';
        }
        $user = $app->db->model( 'user' )->get_by_key( [ $column => $input, 'status' => 2, 'lock_out' => 0], null, 'id' );
        if (! $user->id ) {
            return $app->error( '%s not found.', $app->translate( 'User' ) );
        }
        $user_id = $user->id;
        foreach ( $objects as $obj ) {
            if ( $user_id != $obj->created_by ) {
                $obj->created_by( $user_id );
                $obj->save();
                $counter++;
            }
        }
        if ( $counter ) {
            $action = $action['label'];
            $this->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function batch_email ( $tmpl_name, $ws_user_map, $user_map, $workflow_map, $status, $table, $app ) {
        $app = $app ? $app : $app = Prototype::get_instance();
        if (!$tmpl_name ) $tmpl_name = 'batch_status_change';
        $model = $app->param( '_model' );
        $ctx = $app->ctx;
        $object_label_plural = $app->translate( $table->plural );
        $object_label = $app->translate( $table->label );
        $ctx->vars['object_label_plural'] = $object_label_plural;
        $by_user = $app->user()->nickname;
        $ctx->vars['by_user'] = $by_user;
        $tags = new PTTags();
        $tag_args = ['status' => $status, 'model' => $model ];
        $status_text = $tags->hdlr_statustext( $tag_args, $app->ctx );
        $ctx->vars['status_text'] = $status_text;
        foreach ( $ws_user_map as $ws_id => $workflow_objects ) {
            $workflow = $workflow_map[ $ws_id ];
            if (! $workflow || ! $workflow->notify_changes ) {
                continue;
            }
            $msg = '';
            $from_address = '';
            $user_email = $app->user()->email;
            $from_address = $workflow->from_address;
            if ( $workflow->email_from === 'Specify Individually' &&
                $from_address && $app->is_valid_email( $from_address, $msg ) ) {
            } else if ( $workflow->email_from == 'System Email' ) {
                $from_address = $app->system_email( $msg );
            } else {
                $from_address = $user_email;
            }
            if (! $from_address ) {
                $from_address = $app->system_email( $msg );
            }
            $list_url = $app->admin_url . '?__mode=view&_type=list&_model=' . $model;
            if ( $ws_id ) {
                $list_url .= '&workspace_id=' . $ws_id;
            }
            $workspace = $ws_id
                       ? $app->db->model( 'workspace' )->load( (int) $ws_id )
                       : null;
            $workspace_name = $workspace ? $workspace->name : $app->appname;
            $app->set_mail_param( $ctx, $workspace );
            $template = null;
            $tmpl = $app->get_mail_tmpl( $tmpl_name, $template, $workspace );
            $ctx->stash( 'workspace', $workspace );
            foreach ( $workflow_objects as $user_id => $changed_objs ) {
                $old_user = $user_map[ $user_id ];
                $ctx->vars['object_label']
                    = count( $changed_objs ) == 1 ? $object_label
                    : $object_label_plural;
                $object_label = $ctx->vars['object_label'];
                $count = count( $changed_objs );
                $ctx->vars['count_objects'] = $count;
                $primary = $table->primary;
                $params = [];
                foreach ( $changed_objs as $changed_obj ) {
                    $_params = $changed_obj->get_values();
                    $_params['object_name'] = $changed_obj->$primary;
                    $_params['object_id'] = $changed_obj->id;
                    $_params['object_permalink'] = $app->get_permalink( $changed_obj );
                    $params[] = $_params;
                    $edit_link = $app->admin_url . '?__mode=view&_type=edit&_model=';
                    $edit_link .= $model . '&id=' . $changed_obj->id;
                    if ( $changed_obj->workspace_id ) {
                        $edit_link .= '&workspace_id=' . $changed_obj->workspace_id;
                    }
                    $_params['edit_link'] = $edit_link;
                }
                $ctx->vars['object_loop'] = $params;
                $ctx->vars['list_url'] = $list_url;
                $body = $app->build( $tmpl );
                $subject = '';
                if (! $template || ! $template->subject ) {
                    if ( $tmpl_name == 'batch_status_change' ) {
                        $subject = $app->translate ( '(%s)', $workspace_name ) . 
                        $app->translate(
                        'The status of the %1$s %2$s you are in charge has been '
                         . 'changed to %3$s by user %4$s and the responsible user has been changed.',
                        [ $count, $object_label, $status_text, $by_user ] );
                    } else if ( $tmpl_name == 'batch_apply_to_master' ) {
                        $subject = $app->translate ( '(%s)', $workspace_name ) .
                        $app->translate(
                        '%1$s %2$s\'s revision you are responsible for have been '
                        . 'applied to master by user %3$s and the responsible user has changed.',
                        [ $count, $object_label, $by_user ] );
                    } else {
                        return;
                    }
                } else {
                    $subject = $app->build( $template->subject );
                }
                $headers = ['From' => $from_address ];
                if ( $from_address !== $user_email ) {
                    $headers['Reply-To'] = $user_email;
                }
                $error = '';
                PTUtil::send_mail(
                    $old_user->email, $subject, $body, $headers, $error );
            }
        }
    }

    function add_tags ( $app, $objects, $action ) {
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        if (! $table || ! $table->taggable ) {
            return $app->error( 'Invalid request.' );
        }
        $add = $app->param( 'action_name' ) == 'add_tags';
        $counter = 0;
        $add_tags = $app->param( 'itemset_action_input' );
        if (! $add_tags ) {
            $return_args =
                "__mode=view&_type=list&_model={$model}&apply_actions={$counter}"
                    . $app->workspace_param;
            if ( $add_params = $this->add_return_params( $app ) ) {
                $return_args .= "&{$add_params}";
            }
            $app->redirect( $app->admin_url . '?' . $return_args );
        }
        $column = $app->db->model( 'column' )->load(
            ['table_id' => $table->id, 'type' => 'relation', 'options' => 'tag'],
            ['limit' => 1] );
        $name = 'tags';
        if ( is_array( $column ) && count( $column ) ) {
            $column = $column[0];
            $name = $column->name;
        }
        $add_tags = preg_split( '/\s*,\s*/', $add_tags );
        $status_published = $app->status_published( $model );
        $tag_ids = [];
        $tag_objs = [];
        if (! $add ) {
            foreach ( $add_tags as $tag ) {
                $normalize = preg_replace( '/\s+/', '', trim( strtolower( $tag ) ) );
                if (! $tag ) continue;
                $terms = ['normalize' => $normalize, 'class' => $model ];
                $tags = $app->db->model( 'tag' )->load( $terms );
                if (! empty( $tags ) ) {
                    $tag_objs = array_merge( $tag_objs, $tags );
                }
            }
            if ( empty( $tag_objs ) ) {
                $return_args =
                    "__mode=view&_type=list&_model={$model}&apply_actions={$counter}"
                    . $app->workspace_param;
                if ( $add_params = $this->add_return_params( $app ) ) {
                    $return_args .= "&{$add_params}";
                }
                $app->redirect( $app->admin_url . '?' . $return_args );
            }
            foreach ( $tag_objs as $tag ) {
                $tag_ids[] = $tag->id;
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
            if ( $table->revisable ) {
                $obj = $obj->load( (int) $obj->id );
                if (! $obj ) continue;
            }
            $res = false;
            $original = clone $obj;
            if ( $add ) {
                $res = $this->add_tags_to_obj( $obj, $add_tags, $name, $tag_ids );
            } else {
                if ( $table->revisable ) {
                    $original->_meta = $app->get_meta( $obj );
                    $original->_relations = $app->get_relations( $obj );
                    $original->id( null );
                }
                $relations = $app->get_relations( $obj, 'tag', $name );
                foreach ( $relations as $relation ) {
                    if ( in_array( $relation->to_id, $tag_ids ) ) {
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
                if ( $table->has_status && $obj->has_column( 'status' ) ) {
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
            $add_tags = join( ', ', $add_tags );
            $action = $action['label'] . " ({$add_tags})";
            $this->log( $action, $model, $counter );
        }
        return $this->start_rebuild( $app, $model, $publish_ids, $workspace_ids, $counter );
    }

    function remove_tags ( $app, $objects, $action ) {
        return $this->add_tags( $app, $objects, $action );
    }

    function search_replace  ( $app, $objects, $action ) {
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        $status_published = $app->status_published( $model );
        $workspace_id = $app->param( 'workspace_id' ) ? (int) $app->param( 'workspace_id' ) : 0;
        $publish_ids = [];
        $workspace_ids = [];
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $search_cols = [];
        $list_option = $app->get_user_opt( $model, 'list_option', $workspace_id );
        $case_sensitive = false;
        $scheme = $app->get_scheme_from_db( $model );
        if (! $list_option->id ) {
            $column_defs = $scheme['column_defs'];
            foreach ( $column_defs as $col => $prop ) {
                if ( ( $prop['type'] === 'string' || $prop['type'] === 'text' )
                    && strpos( $col, 'rev_' ) !== 0 ) {
                    $search_cols[ $col ] = true;
                }
            }
        } else {
            $search_cols = array_flip( explode( ',', $list_option->data ) );
            foreach ( $search_cols as $col => $search_col ) {
                if ( strpos( $col, 'rev_' ) === 0 ) {
                    unset( $search_cols[ $col ] );
                }
            }
            $user_othor = $list_option->other ? $list_option->other : '0,0';
            if ( strpos( $user_othor, ',' ) !== false ) $user_othor .= ',0';
            list( $user_keep_search, $case_sensitive ) = explode( ',', $user_othor );
        }
        $unchangeable = isset( $scheme['unchangeable'] ) ? $scheme['unchangeable'] : [];
        foreach ( $unchangeable as $unchange ) {
            unset( $search_cols[ $unchange ] );
        }
        $search_cols = array_keys( $search_cols );
        $replace = $app->param( 'itemset_action_input' );
        $query = $app->param( 'query' );
        $search = preg_quote( $app->param( 'query' ), '/' );
        $counter = 0;
        $comp_meth = $case_sensitive ? 'strpos' : 'stripos';
        $app->core_save_callbacks( $model );
        $callback = ['name' => 'post_save', 'error' => '', 'is_new' => false ];
        $callbackObjs = [];
        foreach ( $objects as $obj ) {
            $need_rebuild = false;
            $changed = false;
            $original = clone $obj;
            if ( $table->revisable ) {
                $original->id( null );
            }
            foreach ( $search_cols as $search_col ) {
                if ( $obj->has_column( $search_col ) && $obj->$search_col ) {
                    $value = $obj->$search_col;
                    if ( $comp_meth( $value, $query ) !== false ) {
                        $orig_value = $value;
                        if ( $case_sensitive ) {
                            $value = str_replace( $query, $replace, $value );
                        } else {
                            $value = preg_replace( "/{$search}/si", $replace, $value );
                        }
                        if ( $orig_value != $value ) {
                            $obj->$search_col( $value );
                            $changed = true;
                            if ( $model == 'asset' && ( $search_col == 'extra_path' || $search_col == 'file_name' ) ) {
                                $need_rebuild = true;
                            } else if ( $obj->has_column( 'status' ) && $obj->status ==  $status_published ) {
                                $need_rebuild = true;
                            }
                        }
                    }
                }
            }
            if (! $changed ) continue;
            if ( $table->revisable ) {
                PTUtil::pack_revision( $obj, $original );
                if ( $obj->rev_type ) {
                    $original->rev_object_id( $obj->rev_object_id );
                    $original->save();
                }
            }
            $app->set_default( $obj, false, true );
            $res = $obj->save();
            if ( $res ) {
                if ( $need_rebuild ) {
                    $app->publish_obj( $obj );
                }
                $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
                $workspace_ids[ $workspace_id ] = true;
                $counter++;
                if ( $table->has_status && $obj->has_column( 'status' ) ) {
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
            $action = $action['label'] . ' ( ' . $query . ' => ' . $replace . ' )';
            $this->log( $action, $model, $counter );
        }
        return $this->start_rebuild( $app, $model, $publish_ids, $workspace_ids, $counter );
    }

    function publish_files ( $app, $objects, $action, $process = false ) {
        $model = $action['model'];
        if ( !$process ) {
            return $this->process_start( $app, $objects, $action );
        }
        $app->comp_url_md5 = false;
        $callback = ['name' => 'post_save', 'is_new' => false ];
        $object = $app->db->model( $model )->new();
        $column_defs = $object->_scheme['column_defs'];
        $status_published = isset( $column_defs['status'] )
                          ? $app->status_published( $model ) : null;
        $fmgr = $app->fmgr;
        foreach ( $objects as $obj ) {
            $obj = $app->db->model( $model )->load( $obj->id );
            if (! $obj ) continue;
            $workspace = $obj->workspace;
            $asset_publish = $workspace ? $workspace->asset_publish : $app->asset_publish;
            if (! $asset_publish ) {
                continue;
            }
            $metadata = $app->db->model( 'meta' )->load( ['model' => $model, //'type' => 'editor',
                                                          'kind' => 'thumbnail', 'object_id' => $obj->id ] );
            if (! empty( $metadata ) ) {
                $site_path = $workspace ? $workspace->site_path : $app->site_path;
                foreach ( $metadata as $meta ) {
                    $path = null;
                    if ( $meta->name && strpos( $meta->name, '%r' ) === 0 && $meta->type == 'editor' ) {
                        $path = $meta->name;
                        $path = preg_replace( "/^%r/", $site_path, $path );
                        $path = str_replace( '/', DS, $path );
                    } else {
                        if ( $status_published && $status_published != $obj->status ) {
                        } else {
                            $url = $app->db->model( 'urlinfo' )->get_by_key( ['meta_id' =>$meta->id ] );
                            if ( $url->id ) {
                                $path = $url->file_path;
                            }
                        }
                    }
                    if ( $path && $meta->blob ) {
                        $fmgr->put( $path, $meta->blob );
                    } else if ( $path && !$meta->blob && $fmgr->exists( $path ) ) {
                        $meta->blob( $fmgr->get( $path ) );
                        $meta->save();
                    }
                }
            }
            $app->publish_obj( $obj, null, false, true );
            if ( $model == 'asset' ) {
                $app->post_save_asset( $callback, $app, $obj );
            }
        }
    }

    function physical_delete ( $app, $objects, $action ) {
        $model = $action['model'];
        $db = $app->db;
        $counter = count( $objects );
        $nickname = $app->user()->nickname;
        if ( $counter ) {
            $db->begin_work();
            $app->txn_active = true;
            $fmgr = $app->fmgr;
            foreach ( $objects as $idx => $obj ) {
                if ( $obj->file_path && $fmgr->exists( $obj->file_path ) ) {
                    $fmgr->unlink( $obj->file_path );
                }
                $params = [ 'URL', $obj->url, $obj->id, $nickname ];
                $message = $app->translate(
                    "%1\$s '%2\$s(ID:%3\$s)' physically deleted by %4\$s.", $params );
                $app->log( ['message'   => $message,
                            'category'  => 'delete',
                            'model'     => 'urlinfo',
                            'object_id' => $obj->id,
                            'level'     => 'info'] );
                if ( $obj->meta_id ) {
                    $obj->remove( true );
                    unset( $objects[ $idx ] );
                }
            }
            $obj = $db->model( $model );
            $obj->remove_multi( $objects );
            if ( !empty( $db->errors ) ) {
                $table = $app->get_table( $model );
                $object_label = $counter == 1 ? $table->label : $table->plural;
                $errstr = $app->translate( 'An error occurred while deleting %s.',
                          $app->translate( $object_label ) );
                return $app->rollback( $errstr );
            } else {
                $db->commit();
                $app->txn_active = false;
            }
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}&"
                     ."apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function republish_urlinfo ( $app, $objects, $action, $process = false ) {
        $model = $action['model'];
        if ( !$process ) {
            return $this->process_start( $app, $objects, $action );
        }
        $pub = $app->publisher;
        foreach ( $objects as $url ) {
            if ( $app->fmgr->exists( $url->file_path ) ) {
                continue;
            }
            if (! $url->object_id ||! $url->model ) {
                continue;
            }
            $obj = $app->db->model( $url->model )->load( $url->object_id );
            if (! $obj ) {
                continue;
            }
            if ( $obj->has_column( 'status' ) ) {
                $status_published = $app->status_published( $url->model );
                if ( $obj->status != $status_published ) {
                    continue;
                }
            }
            if ( $url->class !== 'archive' ) {
                if ( $obj->has_column( $url->class ) ) {
                    $blob_cols = $app->db->get_blob_cols( $url->model, true );
                    if ( in_array( $url->class, $blob_cols ) ) {
                        $app->publish( $url->file_path, $obj, $url->class, $url->mime_type, 'file' );
                        if ( $app->fmgr->exists( $url->file_path ) ) {
                            $url->is_published( 1 );
                            $url->filemtime( filemtime( $url->file_path ) );
                            $url->save();
                            continue;
                        }
                    }
                }
                $app->publish_obj( $obj, $obj, false, true, false, null );
                if ( $app->fmgr->exists( $url->file_path ) ) {
                    $url->is_published( 1 );
                    $url->filemtime( filemtime( $url->file_path ) );
                    $url->save();
                    continue;
                }
            } else {
                if ( $url->publish_file == 6 ) {
                    $url->is_published( 1 );
                    $url->filemtime( time() );
                    $url->save();
                    continue;
                }
            }
            $queue = $url->publish_file == $app->publish_queue ? true : null;
            $data = $pub->publish( $url, $queue );
            if (! $app->fmgr->exists( $url->file_path ) && is_string( $data ) && $data ) {
                $app->fmgr->put( $url->file_path, $data );
            }
            if ( $app->fmgr->exists( $url->file_path ) ) {
                $url->is_published( 1 );
                $url->filemtime( filemtime( $url->file_path ) );
                $url->save();
                continue;
            }
            $app->publish_obj( $obj, $obj, false, false, true, $url->urlmapping );
            if ( $app->fmgr->exists( $url->file_path ) ) {
                $url->is_published( 1 );
                $url->filemtime( filemtime( $url->file_path ) );
                $url->save();
            }
        }
    }

    function reset_urlinfo ( $app, $objects, $action = null ) {
        $app->cache_driver = null;
        $app->db->caching = false;
        $app->db->query_cache = false;
        $app->stash = [];
        $site_url = $app->get_config( 'site_url' );
        $site_path = $app->get_config( 'site_path' );
        $workspaces = [];
        $update_objs = [];
        $move_files = [];
        $fmgr = $app->fmgr;
        foreach ( $objects as $obj ) {
            $workspace = null;
            if ( $workspace_id = $obj->workspace_id ) {
                $workspace = isset( $workspaces[ $obj->workspace_id ] )
                           ? $workspaces[ $obj->workspace_id ] : $obj->workspace;
                $workspaces[ $obj->workspace_id ] = $workspace;
            }
            $url = $workspace ? $workspace->site_url : $site_url->value;
            if ( mb_substr( $url, -1 ) == '/' ) {
                $url = rtrim( $url, '/' );
            }
            $path = $workspace ? $workspace->site_path : $site_path->value;
            if ( mb_substr( $path, -1 ) == '/' ) {
                $url = rtrim( $path, '/' );
            }
            $relative_path = $obj->relative_path;
            $newURL = preg_replace( '/^%r/', $url, $relative_path );
            $newPath = preg_replace( '/^%r/', $path, $relative_path );
            $file_path = $obj->file_path;
            $old_path = $file_path;
            $newDirname = ( dirname( $newURL ) . '/' );
            $newRelativeURL = preg_replace( '!^https{0,1}:\/\/.*?\/!', '/', $newURL );
            if ( $obj->url == $newURL && $obj->file_path == $newPath 
                && $obj->dirname == $newDirname && $obj->relative_url == $newRelativeURL ) {
                continue;
            }
            if ( $obj->file_path != $newPath && $fmgr->exists( $old_path ) ) {
                $move_files[ $old_path ] = $newPath;
            }
            $obj->url( $newURL );
            $obj->dirname( $newDirname );
            $obj->relative_url( $newRelativeURL );
            $obj->file_path( $newPath );
            $update_objs[] = $obj;
        }
        if (! empty( $update_objs ) ) {
            if (! $app->db->model( 'urlinfo' )->update_multi( $update_objs ) ) {
                return $app->error( 'An error occurred while updating the URLs.' );
            }
            if (! empty( $move_files ) ) {
                $meth = $app->reset_url_method;
                if ( $meth && $meth != 'rename' && $meth != 'copy' ) {
                    $meth = null;
                }
                if ( $meth ) {
                    foreach ( $move_files as $old => $new ) {
                        $fmgr->copy( $old, "{$old}.bk" );
                        if ( $fmgr->$meth( $old, $new ) ) {
                            if ( $meth === 'rename' ) {
                                $app->remove_dirs[ dirname( $old ) ] = dirname( $old );
                                // TODO::https://github.com/PowerCMS/Prototype/issues/775
                            }
                            if ( $fmgr->exists( "{$old}.bk" ) ) {
                                $fmgr->unlink( "{$old}.bk" );
                            }
                        }
                    }
                }
            }
        }
        $counter = count( $update_objs );
        if (! $action ) {
            return $counter;
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model=urlinfo&"
                     ."apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function cancel_queues ( $app, $objects, $action ) {
        $counter = 0;
        foreach ( $objects as $obj ) {
            if (! $obj->is_published ) {
                $obj->is_published( 1 );
                $obj->save();
                $counter++;
            }
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model=urlinfo&"
                     ."apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $return_args = '&select_system_filters=waiting_queue&_filter=urlinfo';
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function export_theme ( $app, $objects, $action ) {
        $counter = 0;
        $excludes = ['_insert', '_meta', '_relations', '_original', 'id',
                     'created_by', 'workspace_id', 'form_id'];
        $map_excludes
                  = ['id', 'template_id', 'is_preferred', 'link_status', 'created_on', 'modified_on',
                     'created_by', 'modified_by', 'workspace_id', 'order', 'compiled', 'cache_key'];
        $form_cols= ['name', 'requires_token', 'token_expires', 'redirect_url', 'basename',
                     'send_email', 'email_from', 'send_thanks', 'send_notify',
                     'notify_to'];
        $que_cols = ['label', 'description', 'questiontype_id', 'hint', 'required',
                     'is_primary', 'is_name', 'validation_type', 'normalize', 'format',
                     'maxlength', 'multi_byte', 'hide_in_email', 'aggregate', 'rows',
                     'count_fields', 'multiple', 'connector', 'options', 'unit', 'values',
                     'aria_label', 'default_value', 'placeholder', 'basename'];
        $theme = [];
        $templates = [];
        $theme_label = $app->param( 'itemset_action_input' );
        $theme_id = null;
        if ( $theme_label ) {
            $theme_id = strtolower( preg_replace( '/[^A-Za-z0-9]/', '_', $theme_label ) );
            if ( $theme_id ) {
                $theme['label'] = $theme_label;
                $theme['id'] = $theme_id;
            } else {
                $theme['label'] = 'Your Theme';
                $theme['id'] = 'your_theme';
            }
        }
        $theme['version'] = '';
        $theme['author'] = '';
        $theme['author_link'] = '';
        $theme['author_link'] = '';
        $theme['description'] = '';
        $theme['objects'] = [];
        $theme['component'] = '';
        $upload_dir = $app->upload_dir();
        $temp_dir = $theme_id ? $upload_dir . DS . $theme_id
                              : $upload_dir . DS . 'your_theme';
        $template_dir = $temp_dir . DS . 'views';
        $questions_dir = $temp_dir . DS . 'questions';
        mkdir( $template_dir , 0777, true );
        foreach ( $objects as $obj ) {
            if (! $obj->uuid ) continue;
            $values = $obj->get_values( true );
            $text = $values['text'];
            unset( $values['text'] );
            foreach ( $excludes as $prop ) {
                unset( $values[ $prop ] );
            }
            $linked_file = null;
            if ( $obj->linked_file && preg_match( '/^%[t|s|r]/', $obj->linked_file ) ) {
                $linked_file = preg_replace( '/^%[t|s|r]/', '', $obj->linked_file );
                $linked_file = ltrim( $linked_file, '/\\' );
                $app->fmgr->put( $template_dir . DS . $linked_file, $text );
                $values['linked_file'] = $obj->linked_file;
            } else {
                $app->fmgr->put( $template_dir . DS . $obj->uuid . '.tmpl', $text );
            }
            if ( $obj->form_id ) {
                $form = $app->db->model( 'form' )->load( (int) $obj->form_id );
                if ( $form ) {
                    $tmpl_form = [];
                    $form_values = $form->get_values( true );
                    foreach ( $form_cols as $form_col ) {
                        $tmpl_form[ $form_col ] = $form->$form_col;
                    }
                    if ( $form->thanks_template ) {
                        $mail = $app->db->model( 'template' )->load(
                          (int) $form->thanks_template );
                        if ( $mail ) {
                            $tmpl_form['thanks_template'] = $mail->uuid;
                        }
                    }
                    if ( $form->notify_template ) {
                        $mail = $app->db->model( 'template' )->load(
                          (int) $form->notify_template );
                        if ( $mail ) {
                            $tmpl_form['notify_template'] = $mail->uuid;
                        }
                    }
                    $questions = $app->get_related_objs( $form, 'question', 'questions' );
                    $question_ids = [];
                    foreach ( $questions as $question ) {
                        if (! $question->uuid ) continue;
                        $question_path = $questions_dir . DS . $question->basename . '.tmpl';
                        if ( $app->fmgr->exists( $question_path ) ) {
                            $question_path = $questions_dir . DS . $question->uuid . '.tmpl';
                        }
                        $app->fmgr->put( $question_path, $question->template );
                        $question_values = [];
                        foreach ( $que_cols as $que_col ) {
                            $question_values[ $que_col ] = $question->$que_col;
                        }
                        if ( $questiontype_id = $question->questiontype_id ) {
                            $qt = $app->db->model( 'questiontype' )->load( (int) $questiontype_id );
                            if ( $qt ) {
                                $question_values['questiontype_id'] = $qt->basename;
                            }
                        }
                        $question_ids[ $question->uuid ] = $question_values;
                    }
                    if ( count( $question_ids ) ) {
                        $tmpl_form['questions'] = $question_ids;
                    }
                    $values['form'] = $tmpl_form;
                }
            }
            $maps = $app->db->model( 'urlmapping' )->load( ['template_id' => $obj->id ] );
            $mappings = [];
            foreach ( $maps as $map ) {
                $mapping = $map->get_values( true );
                foreach ( $map_excludes as $map_exclude ) {
                    unset( $mapping[ $map_exclude ] );
                }
                $tables = $app->get_related_objs( $map, 'table', 'triggers' );
                $triggers = [];
                foreach ( $tables as $trigger ) {
                    $triggers[] = $trigger->name;
                }
                if ( count( $triggers ) ) {
                    $mapping['triggers'] = $triggers;
                }
                $mappings[] = $mapping;
            }
            if ( count( $mappings ) ) {
                $values['urlmappings'] = $mappings;
            }
            unset( $values['uuid'] );
            $templates[ $obj->uuid ] = $values;
        }
        $theme['views'] = $templates;
        $theme = json_encode( $theme, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );
        file_put_contents( $temp_dir . DS . 'theme.json', $theme );
        $zip = $upload_dir . DS . "theme.zip";
        PTUtil::make_zip_archive( $upload_dir, $zip );
        PTUtil::export_data( $zip );
    }

    function recompile_cache ( $app, $objects, $action ) {
        $counter = 0;
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        foreach ( $objects as $obj ) {
            $counter++;
            $obj->compiled('');
            $obj->cache_key('');
            $obj->save();
        }
        if ( !empty( $db->errors ) ) {
            $errstr = $app->translate( 'An error occurred while saving %s.',
                      $app->translate( 'View' ) );
            return $app->rollback( $errstr );
        } else {
            $db->commit();
            $app->txn_active = false;
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model=" . $action['model']
                     ."&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function delete_trigger ( $app, $objects, $action ) {
        $counter = 0;
        foreach ( $objects as $obj ) {
            $triggers = $app->db->model( 'relation' )->load(
                ['name' => 'triggers', 'from_obj' => 'urlmapping', 'from_id' => $obj->id, 'to_obj' => 'table'] );
            if ( count( $triggers ) ) {
                $app->db->model( 'relation' )->remove_multi( $triggers );
                $counter++;
            }
        }
        if ( $counter ) {
            $action = $app->translate( 'Delete Rebuild Triggers' );
            $this->log( $action, 'urlmapping', $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model=urlmapping"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $this->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function export_fieldtypes ( $app, $objects, $action ) {
        $counter = 0;
        $model = $app->param( '_model' );
        $counter = 0;
        $temp_dir = $app->upload_dir();
        $temp_dir .= DS . 'field_types';
        $tmpl_dir = $temp_dir . DS . 'tmpl' . DS;
        mkdir( $tmpl_dir, 0777, TRUE );
        $config = [];
        $files = [];
        $dirs = [ $tmpl_dir, $temp_dir, dirname( $tmpl_dir ), dirname( $tmpl_dir ) ];
        foreach ( $objects as $obj ) {
            $counter++;
            $obj = $app->db->model( 'fieldtype' )->load( $obj->id );
            $basename = $obj->basename;
            $label = "{$tmpl_dir}{$basename}_label.tmpl";
            file_put_contents( $label, $obj->label );
            $files[] = $label;
            $content = "{$tmpl_dir}{$basename}_content.tmpl";
            file_put_contents( $content, $obj->content );
            $files[] = $content;
            $hide_label = $obj->hide_label ? true : false;
            $config[ $basename ] = [
                'name' => $obj->name,
                'order' => (int) $obj->order,
                'hide_label' => $hide_label ];
        }
        $config = json_encode( $config, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
        file_put_contents( $temp_dir . DS ."fields.json", $config );
        $files[] = "{$temp_dir}field.json";
        require_once( 'class.PTUtil.php' );
        $zip_path = rtrim( $temp_dir, '/' ) . '.zip';
        $res = PTUtil::make_zip_archive( $temp_dir, $zip_path );
        $files[] = $zip_path;
        PTUtil::export_data( $zip_path, 'application/zip' );
        exit();
    }

    function replace_objects ( $app, &$obj, &$original ) {
        $attachment_files = [];
        $status_published = $app->status_published( $obj->_model );
        $relations = $obj->_relations;
        foreach ( $relations as $idx => $relation ) {
            $relation->from_id( $obj->id );
            $relations[ $idx ] = $relation;
            if ( $relation->to_obj == 'attachmentfile' && $obj->has_column( 'status' ) ) {
                $attachment =
                    $app->db->model( 'attachmentfile' )->load( (int) $relation->to_id );
                if ( $attachment ) {
                    $newStatus = 4;
                    if ( $obj->has_column( 'status' ) && $obj->status == $status_published ) {
                        $newStatus = 4;
                    } else if ( $obj->has_column( 'status' ) ) {
                        $newStatus = $obj->status;
                    }
                    if ( $attachment->status != $newStatus ) {
                        $attachment->status( $newStatus );
                        $attachment_files[] = $attachment;
                        $app->delayed_publish_objs[
                            $attachment->_model . '_' . $attachment->id ] = $attachment;
                    }
                }
            }
        }
        $orig_relations = $original->_relations;
        $obj->_relations = $relations;
        foreach ( $orig_relations as $idx => $relation ) {
            $relation->from_id( $original->id );
            $orig_relations[ $idx ] = $relation;
            if ( $relation->to_obj == 'attachmentfile' && $obj->has_column( 'status' ) ) {
                $attachment =
                    $app->db->model( 'attachmentfile' )->load( (int) $relation->to_id );
                if ( $attachment ) {
                    $attachment->status( 0 );
                    $attachment_files[] = $attachment;
                    $app->delayed_publish_objs[
                        $attachment->_model . '_' . $attachment->id ] = $attachment;
                }
            }
        }
        $original->_relations = $orig_relations;
        $relations = array_merge( $relations, $orig_relations );
        $metadata = $obj->_meta;
        foreach ( $metadata as $idx => $meta ) {
            $meta->object_id( $obj->id );
            $metadata[ $idx ] = $meta;
        }
        $orig_metadata = $original->_meta;
        $obj->_meta = $metadata;
        foreach ( $orig_metadata as $idx => $meta ) {
            $meta->object_id( $original->id );
            $orig_metadata[ $idx ] = $meta;
        }
        $original->_meta = $orig_metadata;
        $metadata = array_merge( $metadata, $orig_metadata );
        if (! empty( $attachment_files ) ) {
            $res = $app->db->model( 'attachmentfile' )->update_multi( $attachment_files );
            if (! $res ) {
                return false;
            }
        }
        if (! empty( $relations ) ) {
            $res = $app->db->model( 'relation' )->update_multi( $relations );
            if (! $res ) {
                return false;
            }
        }
        if (! empty( $metadata ) ) {
            $res = $app->db->model( 'meta' )->update_multi( $metadata );
            if (! $res ) {
                return false;
            }
        }
        return true;
    }

    function add_tags_to_obj ( $obj, $add_tags, $name = 'tags', &$tag_ids = [] ) {
        $app = Prototype::get_instance();
        if (! empty( $add_tags ) ) {
            $db = $app->db;
            $workspace_id = 0;
            if ( $obj->has_column( 'workspace_id' ) ) {
                $workspace_id = (int) $obj->workspace_id;
            }
            $to_ids = [];
            $error = false;
            $original = null;
            if ( $obj->has_column( 'rev_type' ) ) {
                $original = clone $obj;
                $original->_meta = $app->get_meta( $obj );
                $original->_relations = $app->get_relations( $obj );
                $original->id( null );
            }
            foreach ( $add_tags as $tag ) {
                $normalize = preg_replace( '/\s+/', '', trim( strtolower( $tag ) ) );
                if (! $tag ) continue;
                $terms = ['normalize' => $normalize, 'class' => $obj->_model ];
                if ( $workspace_id )
                    $terms['workspace_id'] = $workspace_id;
                $tag_obj = $db->model( 'tag' )->get_by_key( $terms );
                if (! $tag_obj->id ) {
                    $tag_obj->name( $tag );
                    $app->set_default( $tag_obj, false, true );
                    $order = $app->get_order( $tag_obj );
                    $tag_obj->order( $order );
                    $tag_obj->save();
                }
                $to_ids[] = $tag_obj->id;
                if (! in_array( $tag_obj->id, $tag_ids ) ) {
                    $tag_ids[] = $tag_obj->id;
                }
            }
            $args = ['from_id' => $obj->id, 
                     'name' => $name,
                     'from_obj' => $obj->_model,
                     'to_obj' => 'tag' ];
            $res = $app->set_relations( $args, $to_ids, true );
            if ( $original ) {
                PTUtil::pack_revision( $obj, $original );
            }
            $app->set_default( $obj, false, true );
            $obj->save();
            return $res;
        }
        return null;
    }

    function start_rebuild ( $app, $model, $publish_ids, $workspace_ids, $counter ) {
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}&"
                     . "apply_actions={$counter}" . $app->workspace_param;
        if ( $model == 'template' ) {
            $return_args .= '&need_rebuild=1';
        }
        $excludes = ['__mode', '_type', '_model'];
        if ( $app->param( 'action_name' ) == 'apply_to_master' && (! empty( $publish_ids ) ) ) {
            $excludes[] = 'manage_revision';
        }
        if ( $add_params = $this->add_return_params( $app, '_query_string', $excludes ) ) {
            $return_args .= "&{$add_params}";
        }
        $table = $app->get_table( $model );
        $extra = ' OR urlmapping_container = ? ';
        $count = $app->db->model( 'urlmapping' )->count( ['model' => $model ], null, 'id', $extra, [ $model ] );
        if ( $model != 'template' && $count && ! empty( $publish_ids ) ) {
            $ctx = $app->ctx;
            $ctx->vars['page_title'] =
                $app->translate( 'Rebuilding %s...', $app->translate( $table->plural ) );
            $ctx->vars['rebuild_interval'] = 0;
            $ctx->vars['rebuild_ids'] = implode( ',', $publish_ids );
            $ctx->vars['request_id'] = $app->magic();
            $ctx->vars['model'] = $model;
            $ctx->vars['count_object'] = count( $publish_ids );
            $ctx->vars['return_args'] = $return_args;
            $ctx->vars['icon_url'] = 'assets/img/loading.gif';
            $ctx->vars['start_rebuild'] = 1;
            $ctx->vars['workspace_id'] = $app->workspace() ? $app->workspace()->id : 0;
            $ctx->vars['start_time'] = time();
            return $app->build_page( 'rebuild_action.tmpl' );
        }
        $app->redirect( $app->admin_url . '?' . $return_args, true );
        if ( empty( $publish_ids ) && ! empty( $workspace_ids ) ) {
            $app->init_tags();
            foreach ( $workspace_ids as $wsId => $bool ) {
                $object = $app->db->model( $model )->new();
                if ( $object->has_column( 'workspace_id' ) ) {
                    $object->workspace_id( $wsId );
                }
                $app->rebuild_trigger( $app, $object, $table );
            }
        }
    }

    function rebuild_action ( $app ) {
        $ctx = $app->ctx;
        $app->validate_magic();
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $start_time = $app->param( 'start_time' ) ? $app->param( 'start_time' ) : time();
        $app->destruct_time = $start_time;
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        $obj = $app->db->model( $model );
        $rebuld_ids = $app->param( 'rebuild_ids' );
        $ids = explode( ',', $rebuld_ids );
        if ( $app->param( 'start_rebuild' ) ) {
            $publish_nextprev = 'rebuild_nextprev_' . strtolower( $table->plural );
            $date_col = $app->get_date_col( $obj );
            if ( $date_col && $obj->has_column( $date_col ) && ( $app->publish_nextprev || $app->$publish_nextprev ) ) {
                $_objs = $app->db->model( $model )->load( ['id' => ['IN' => $ids ] ], [],
                                  'id,status,rev_type,workspace_id,' . $date_col );
                foreach ( $_objs as $_obj ) {
                    $next_prev = PTUtil::next_prev( $app, $_obj, 'both', 'id' );
                    if ( isset( $next_prev['next'] ) && is_object( $next_prev['next'] ) ) {
                        $ids[] = $next_prev['next']->id;
                    }
                    if ( isset( $next_prev['previous'] ) && is_object( $next_prev['previous'] ) ) {
                        $ids[] = $next_prev['previous']->id;
                    }
                }
                $ids = array_unique( $ids );
            }
        }
        $request_id = $app->param( 'request_id' );
        $return_args = $app->param( 'return_args' );
        $return_args = rawurldecode( $return_args );
        $workspace_ids = $app->param( 'workspace_ids' );
        $workspace_ids = $workspace_ids ? explode( $workspace_ids ) : [];
        if ( $app->param( 'workspace_id' ) ) {
            $workspace_ids[] = (int) $app->param( 'workspace_id' );
        } else {
            $workspace_ids[] = 0;
        }
        $per_rebuild = $app->per_rebuild;
        $prop_key = strtolower( $table->plural );
        $model_per_rebuild = $prop_key . '_per_rebuild';
        if ( $app->$model_per_rebuild ) {
            $per_rebuild = (int) $app->$model_per_rebuild;
        }
        $per_rebuild /= 2;
        $per_rebuild = (int) $per_rebuild;
        if ( $per_rebuild < 1 ) $per_rebuild = 1;
        $rebuild_ids = array_slice( $ids, 0, $per_rebuild );
        $next_ids = array_slice( $ids, $per_rebuild );
        $terms = ['model' => $model, 'container' => $model ];
        $extra = '';
        $ws_id = 0;
        $app->get_scheme_from_db( 'urlmapping' );
        $map_cols = 'id,mapping,publish_file,template_id,link_status,date_based,model,skip_empty,'
                  . 'container,container_scope,fiscal_start,workspace_id,compiled,cache_key';
        /* For SplitPage or Date based archive.
        if ( $obj->_model === 'template' ) {
            unset( $terms['container'] );
        }
        */
        $object = $app->db->model( $model )->load( ['id' => ['IN' => $rebuild_ids ] ] );
        $rebuild_async = $app->rebuild_async;
        $map = $app->db->model( 'urlmapping' )->__new();
        $map_prefix = $map->_colprefix;
        $app->db->update_multi = false;
        $app->db->flush_queries();
        // $app->ctx->force_compile = true;
        foreach ( $object as $obj ) {
            if ( $obj->has_column( 'workspace_id' ) ) {
                $extra = ' AND ' . $map_prefix . 'workspace_id';
                $ws_id = (int) $obj->workspace_id;
                if ( $ws_id && $table->space_child && !$table->display_system ) {
                    $extra .= " IN (0,{$ws_id})";
                } else {
                    $extra .= '=' . $ws_id;
                }
                $workspace_ids[] = $ws_id;
            }
            $mappings = $app->db->model( 'urlmapping' )->load(
                $terms, ['and_or' => 'OR'], $map_cols, $extra );
            foreach ( $mappings as $mapping ) {
                $app->publish_dependencies( $obj, null, $mapping );
            }
            if ( $rebuild_async ) {
                $object_id = $obj->id;
                $app->delayed_publish_objs["{$model}_{$object_id}"] = $obj;
            } else {
                if ( $obj->has_column( 'workspace_id' ) ) {
                    $app->ctx->stash( 'workspace', $obj->workspace );
                }
                $app->publish_obj( $obj );
            }
        }
        $dependencies = $app->delayed_dependencies;
        $session = $app->db->model( 'session' )->get_by_key(
            ['name' => $request_id, 'kind' => 'AS', 'user_id' => $app->user()->id ] );
        $publish_last = $session->id ? json_decode( $session->data, true ) : [];
        foreach ( $dependencies as $path => $params ) {
            list( $param1, $param2, $param3, $param4 ) = $params;
            $publish_last[ $path ]
                = ['object' => ['model' => $param1->_model, 'id' => (int)$param1->id ],
                   'urlmapping' => (int) $param2->id,
                   'timestamp' => $param4 ];
        }
        if ( empty( $next_ids ) ) {
            $app->return_args = [];
            $app->redirect( $app->admin_url. '?' . $return_args, true );
            $app->init_tags();
            $app->delayed_dependencies = [];
            foreach ( $publish_last as $path => $params ) {
                $ts = $params['timestamp'];
                $object = $params['object'];
                $object = $app->db->model( $object['model'] )->load( (int) $object['id'] );
                if ( is_object( $object ) ) {
                    $urlmapping = $app->db->model( 'urlmapping' )->load( $params['urlmapping'] );
                    $app->delayed_dependencies[ $path ] = [ $object, $urlmapping, null, $ts ];
                }
            }
            $workspace_ids = array_unique( $workspace_ids );
            foreach ( $workspace_ids as $workspace_id ) {
                $object = $app->db->model( $model )->new();
                if ( $object->has_column( 'workspace_id' ) ) {
                    $object->workspace_id( $workspace_id );
                }
                $app->rebuild_trigger( $app, $object, $table );
            }
            if ( $session->id ) {
                $session->remove();
            }
            return;
        }
        $publish_last = json_encode( $publish_last );
        $session->data( $publish_last );
        $session->expires( $app->request_time + $app->sess_timeout );
        $session->start( $app->request_time );
        $session->save();
        if ( $rebuild_async ) {
            $max_proc_time = $app->async_max_proc_time
                           ? $app->request_time + $app->async_max_proc_time : false;
            $max_proc = $app->async_max_proc;
            $count = $app->db->model( 'session' )->count( ['name' => $request_id,
                    'kind' => 'PR', 'user_id' => $app->user()->id, 'key' => $model ] );
            while ( $count >= $max_proc ) {
                sleep( 1 );
                $count = $app->db->model( 'session' )->count( ['name' => $request_id,
                        'kind' => 'PR', 'user_id' => $app->user()->id, 'key' => $model ] );
                if ( $max_proc_time && time() > $max_proc_time ) {
                    $count = 0;
                    return $app->error( 'Background publishing has timed out.' );
                }
            }
            $session = $app->db->model( 'session' )->new(
                ['name' => $request_id, 'kind' => 'PR', 'user_id' => $app->user()->id,
                 'text' => implode( ',', $next_ids ), 'key' => $model ] );
            $session->expires( $app->request_time + $app->sess_timeout );
            $session->start( $app->request_time );
            $session->save();
            $app->remove_objects['session'] = [ $session ];
        }
        $count_object = $app->param( 'count_object' );
        $past = $count_object - count( $next_ids );
        $percent = ( $past / $count_object ) * 100;
        $ctx->vars['rebuilt_percent'] = (int) $percent;
        $ctx->vars['workspace_ids'] = implode( ',', array_unique( $workspace_ids ) );
        $app->delayed_dependencies = [];
        $ctx->vars['model'] = $model;
        $ctx->vars['request_id'] = $request_id;
        $ctx->vars['return_args'] = $return_args;
        $ctx->vars['count_object'] = $count_object;
        $rebuild_interval = $prop_key . '_rebuild_interval';
        if ( $app->$rebuild_interval ) {
            $ctx->vars['rebuild_interval'] = (int) $app->$rebuild_interval;
        } else {
            $ctx->vars['rebuild_interval'] = $app->rebuild_interval;
        }
        if ( $model === 'template' ) {
            $ctx->vars['page_title'] =
                $app->translate( 'Rebuilding %s...', $app->translate( 'Index' ) );
        } else {
            $ctx->vars['page_title'] =
                $app->translate( 'Rebuilding %s...', $app->translate( $table->plural ) );
        }
        $ctx->vars['icon_url'] = 'assets/img/loading.gif';
        $ctx->vars['rebuild_ids'] = implode( ',', $next_ids );
        $ctx->vars['start_time'] = $start_time;
        $app->ctx = $ctx;
        return $app->build_page( 'rebuild_action.tmpl' );
    }

    function process_start ( $app, $objects, $action ) {
        $model = $app->param( '_model' );
        $list_actions = $this->get_list_actions( $model );
        $action_name = $app->param( 'action_name' );
        if (! isset( $list_actions[ $action_name ] ) ) {
            return $app->error( 'Invalid request.' );
        }
        $action = $list_actions[ $action_name ];
        $counter = count( $objects );
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}&"
                     . "apply_actions={$counter}" . $app->workspace_param;
        if ( $model == 'template' ) {
            $return_args .= '&need_rebuild=1';
        }
        $table = $app->get_table( $model );
        $label = $action['label'] ?? null;
        if ( $label ) {
            $page_title = $app->translate( 'Processing %s...', $label );
        } else {
            $page_title = $app->translate( 'Apply actions to %s...', $app->translate( $table->plural ) );
        }
        $proc_ids = [];
        foreach ( $objects as $obj ) {
            $proc_ids[] = $obj->id;
        }
        $ctx = $app->ctx;
        $ctx->vars['page_title'] = $page_title;
        $ctx->vars['process_interval'] = 0;
        $ctx->vars['proc_ids'] = implode( ',', $proc_ids );
        $ctx->vars['action_name'] = $app->param( 'action_name' );
        $ctx->vars['itemset_action_input'] = $app->param( 'itemset_action_input' );
        $ctx->vars['request_id'] = $app->magic();
        $ctx->vars['model'] = $model;
        $ctx->vars['count_object'] = $counter;
        $ctx->vars['return_args'] = $return_args;
        $ctx->vars['icon_url'] = 'assets/img/loading.gif';
        $ctx->vars['start_rebuild'] = 1;
        $ctx->vars['workspace_id'] = $app->workspace() ? $app->workspace()->id : 0;
        return $app->build_page( 'process_action.tmpl' );
    }

    function process_action ( $app ) {
        $app->validate_magic();
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        $obj = $app->db->model( $model );
        $proc_ids = $app->param( 'proc_ids' );
        $ids = explode( ',', $proc_ids );
        $per_rebuild = $app->per_rebuild;
        $prop_key = strtolower( $table->plural );
        $model_per_rebuild = $prop_key . '_per_rebuild';
        if ( $app->$model_per_rebuild ) {
            $per_rebuild = (int) $app->$model_per_rebuild;
        }
        $per_rebuild /= 2;
        $per_rebuild = (int) $per_rebuild;
        if ( $per_rebuild < 1 ) $per_rebuild = 1;
        $proc_ids = array_slice( $ids, 0, $per_rebuild );
        $next_ids = array_slice( $ids, $per_rebuild );
        $action_name = $app->param( 'action_name' );
        $list_actions = $this->get_list_actions( $model );
        $action_name = $app->param( 'action_name' );
        if (! isset( $list_actions[ $action_name ] ) ) {
            return $app->error( 'Invalid request.' );
        }
        $action = $list_actions[ $action_name ];
        $label = $action['label'] ?? null;
        if ( $label ) {
            $page_title = $app->translate( 'Processing %s...', $label );
        } else {
            $page_title = $app->translate( 'Apply actions to %s...', $app->translate( $table->plural ) );
        }
        $return_args = urldecode( $app->param( 'return_args' ) );
        $cols = $action['columns'] ?? '*';
        $objects = $app->db->model( $model )->load( ['id' => ['IN' => $proc_ids ] ], null, $cols );
        $invalid = false;
        foreach ( $objects as $idx => $obj ) {
            if (! $app->can_do( $model, 'edit', $obj ) ) {
                unset( $objects[ $idx ] );
                $invalid = true;
            }
        }
        if ( $invalid ) {
            $objects = array_values( $objects );
        }
        $component = $action['component'];
        $method = $action['method'];
        $action['model'] = $model;
        $component->$method( $app, $objects, $action, true, $this );
        $counter = $app->param( 'count_object' );
        if (!empty( $next_ids ) ) {
            $ctx = $app->ctx;
            $percent = ( $counter - count( $next_ids ) ) / $counter;
            $percent *= 100;
            $ctx->vars['rebuilt_percent'] = round( $percent );
            $ctx->vars['page_title'] = $page_title;
            $ctx->vars['process_interval'] = 0;
            $ctx->vars['proc_ids'] = implode( ',', $next_ids );
            $ctx->vars['action_name'] = $app->param( 'action_name' );
            $ctx->vars['itemset_action_input'] = $app->param( 'itemset_action_input' );
            $ctx->vars['request_id'] = $app->magic();
            $ctx->vars['magic_token'] = $app->current_magic;
            $ctx->vars['model'] = $model;
            $ctx->vars['count_object'] = $counter;
            $ctx->vars['return_args'] = $return_args;
            $ctx->vars['icon_url'] = 'assets/img/loading.gif';
            $ctx->vars['workspace_id'] = $app->workspace() ? $app->workspace()->id : 0;
            $app->ctx = $ctx;
            return $app->build_page( 'process_action.tmpl' );
        }
        $this->log( $label, $model, $counter );
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function add_return_params ( $app, $param = '_query_string', $excludes = null ) {
        $query = urldecode( $app->param( $param ) );
        parse_str( $query, $return_params );
        $excludes = $excludes ? $excludes : ['__mode', '_type', '_model'];
        foreach ( $excludes as $exclude ) {
            if ( isset( $return_params[ $exclude ] ) ) {
                unset( $return_params[ $exclude ] );
            }
        }
        if ( empty( $return_params ) ) {
            return '';
        }
        return http_build_query( $return_params );
    }

    function log ( $action, $model, $count ) {
        $app = Prototype::get_instance();
        $table = $app->get_table( $model );
        $obj_label = $count == 1 ? $table->label : $table->plural;
        $obj_label = $app->translate( $obj_label );
        $message = $app->translate(
                        'The action \'%1$s\' was executed for %2$s %3$s by %4$s.',
                            [ $action, $count, $obj_label, $app->user()->nickname ] );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $app->log( ['message'  => $message,
                    'category' => 'list_action',
                    'model'    => $model,
                    'workspace_id' => $workspace_id,
                    'level'    => 'info'] );
    }
}