<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class MTMLReference extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function mtml_reference ( $app ) {
        $ctx = new PAML();
        $core_tags = $ctx->tags;
        $core_blocks = $core_tags['block'];
        $core_conditionals = $core_tags['conditional'];
        $core_functions = $core_tags['function'];
        $core_modifiers = $core_tags['modifier'];
        $core_modifiers = array_merge( $core_modifiers, array_keys( $ctx->modifier_funcs ) );
        $ctx = $app->ctx;
        $system_tags = $ctx->tags;
        $query = trim( $app->param( 'query' ) );
        $query_prefix = false;
        if ( $query && stripos( $query, 'mt' ) === 0 ) {
            $query = preg_replace( '/^mt:{0,1}/', '', $query );
            $query_prefix = true;
        }
        $system_blocks = $system_tags['block'];
        $app->init_tags();
        $table_labels = [];
        $table_has_status = [];
        $table_hierarchy = [];
        $table_workspace = [];
        $tables = $app->db->model( 'table' )->load_iter( [], [], 'name,label,plural,has_status,hierarchy' );
        while ( $result = $tables->fetch( PDO::FETCH_BOTH ) ) {
            $model = $result['table_name'];
            $table_labels[ $model ] = $result['table_label'];
            $table_has_status[ $model ] = $result['table_has_status'];
            $table_hierarchy[ $model ] = $result['table_hierarchy'];
            $table_workspace[ $model ] = $app->db->model( $model )->has_column( 'workspace_id' );
            $model = str_replace( '_', '', $model );
            $table_labels[ $model ] = $result['table_label'];
            $table_has_status[ $model ] = $result['table_has_status'];
            $table_hierarchy[ $model ] = $result['table_hierarchy'];
        }
        $plugins_tags = $app->plugins_tags;
        $all_tags = $ctx->tags;
        $block_tags = $all_tags['block'];
        $block_tags = array_merge( $block_tags, $all_tags['block_once'] );
        sort( $block_tags );
        $block_tags_loop = [];
        $block_relations = $ctx->stash( 'block_relations' );
        $nextprev_tags   = $ctx->stash( 'nextprev_tags' );
        $reference_tags  = $ctx->stash( 'reference_tags' );
        $excludes = ['nocache', 'isinchild', 'workflowusers', 'tables'];
        $json = $this->path() . DS . 'docs' . DS . 'tag_reference.json';
        $tag_reference = json_decode( file_get_contents( $json ), true );
        $components = $app->components;
        foreach ( $components as $key => $class ) {
            if ( $key == 'core' || $key == 'mtmlreference' ) continue;
            $reference = $class->path() . DS . 'docs' . DS . 'tag_reference.json';
            if ( file_exists( $reference ) ) {
                $add_reference = json_decode( file_get_contents( $reference ), true );
                if ( is_array( $add_reference ) ) {
                    $tag_reference = array_merge( $tag_reference, $add_reference );
                }
            }
        }
        foreach ( $block_tags as $block_tag ) {
            if ( $query && stripos( $block_tag, $query ) === false ) continue;
            if ( $query_prefix && stripos( $block_tag, $query ) !== 0 ) continue;
            if ( in_array( $block_tag, $excludes ) ) continue;
            $tag_data = ['name' => $block_tag ];
            $tag = isset( $ctx->func_map['block_' . $block_tag ] )
                 ? $ctx->func_map['block_' . $block_tag ] : null;
            $tag_data['component'] = null;
            $tag_data['handler'] = null;
            $tag_data['model'] = null;
            $tag_data['relation'] = null;
            $tag_data['column'] = null;
            $tag_data['tag_kind'] = null;
            $tag_data['description'] = null;
            $tag_data['attributes'] = [];
            $tag_data['variables'] = [];
            $tag_data['model_status'] = null;
            $tag_data['relation_status'] = null;
            $tag_data['model_hierarchy'] = null;
            $tag_data['model_workspace'] = null;
            $tag_data['relation_workspace'] = null;
            $tag_data['plugin'] = 'MTMLReference';
            $tag_name = $block_tag;
            if ( $tag ) {
                $tag_data['component'] = get_class( $tag[0] );
                $handler = $tag[1];
                $tag_data['handler'] = $handler;
                if (! $app->tags_compat && $handler == 'hdlr_nextprev' && isset( $nextprev_tags[ $block_tag ][0] ) ) {
                    $modelName = $nextprev_tags[ $block_tag ][0];
                    $tbl_label = preg_replace( '/[^a-z0-9]/', '' , $modelName );
                    if ( stripos( $block_tag, $tbl_label ) !== 0 ) continue;
                }
                if ( $handler == 'hdlr_objectloop' ) {
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                    $tag_data['model'] = $ctx->stash( "blockmodel_{$block_tag}" );
                } else if ( $handler == 'hdlr_nextprev' && isset( $nextprev_tags[ $block_tag ] ) ) {
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                    $tag_data['model'] = $nextprev_tags[ $block_tag ][0];
                    $model = $tag_data['model'];
                    $tag_data['column'] = $this->translate( 'the ' . preg_replace( "/^$model/", '', $block_tag ) );
                } else if ( $handler == 'hdlr_referencecontext' ) {
                    if ( isset( $reference_tags[ $block_tag ] ) ) {
                        $tag_data['tag_kind'] = 'Dynamic Tags';
                        $tag_data['model'] = $reference_tags[ $block_tag ][0];
                        $tag_data['column'] = $reference_tags[ $block_tag ][1];
                        $tag_data['relation'] = $reference_tags[ $block_tag ][2];
                    } else {
                        continue;
                    }
                } else if ( $handler == 'hdlr_get_relatedobjs' ) {
                    if ( isset( $block_relations[ $block_tag ] ) ) {
                        $tag_data['tag_kind'] = 'Dynamic Tags';
                        $tag_data['model']    = $block_relations[ $block_tag ][1];
                        $tag_data['column']   = $block_relations[ $block_tag ][0];
                        $tag_data['relation'] = $block_relations[ $block_tag ][2];
                    } else {
                        continue;
                    }
                } else if ( $handler == 'hdlr_menuitems' ) {
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                    $tag_data['model']    = 'menu';
                    $tag_data['column']   = 'urls';
                    $tag_data['relation'] = 'urlinfo';
                } else if ( $handler == 'hdlr_menuitems' ) {
                    $tag_data['tag_kind'] = 'System Tags';
                    $tag_data['model'] = 'menu';
                } else if ( $handler == 'hdlr_tables' ) {
                    $tag_data['tag_kind'] = 'System Tags';
                    $tag_data['model'] = 'table';
                } else if ( $handler == 'hdlr_grouploop' ) {
                    $tag_data['tag_kind'] = 'System Tags';
                    $tag_data['model'] = 'group';
                } else if ( $handler == 'hdlr_workflowusers' ) {
                    $tag_data['tag_kind'] = 'System Tags';
                    $tag_data['model'] = 'user';
                } else if ( $handler == 'hdlr_workspacecontext' ) {
                    $tag_data['tag_kind'] = 'System Tags';
                    $tag_data['model'] = 'workspace';
                } else if ( $handler == 'hdlr_tables' ) {
                    $tag_data['model'] = 'table';
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                } else {
                    $tag_data['tag_kind'] = 'System Tags';
                }
            } else if ( in_array( $block_tag, $block_tags ) ) {
                $tag_data['component'] = 'PAML';
                $tag_data['handler'] = "block_{$block_tag}";
                $tag_data['tag_kind'] = 'Core Tags';
            }
            $hdlr = $tag !== null && isset( $handler ) ? preg_replace( '/^hdlr_/', '', $handler ) : $block_tag;
            if ( isset( $tag_reference[ $block_tag ] ) ) $hdlr = $block_tag;
            if ( isset( $tag_reference[ $hdlr ] ) ) {
                if ( isset( $tag_reference[ $hdlr ]['description'] ) && $tag_reference[ $hdlr ]['description'] ) {
                    $tag_data['description'] = $tag_reference[ $hdlr ]['description'];
                }
                if ( isset( $tag_reference[ $hdlr ]['attributes'] ) && $tag_reference[ $hdlr ]['attributes'] ) {
                    $tag_data['attributes'] = $tag_reference[ $hdlr ]['attributes'];
                }
                $variables = [];
                if ( isset( $tag_reference[ $hdlr ]['variables'] ) && $tag_reference[ $hdlr ]['variables'] ) {
                    $variables = $tag_reference[ $hdlr ]['variables'];
                }
                if ( isset( $tag_reference[ $hdlr ]['set_loop_vars'] ) && $tag_reference[ $hdlr ]['set_loop_vars'] ) {
                    $variables = array_merge( $this->loop_vars(), $variables );
                }
                $tag_data['variables'] = $variables;
            }
            if ( isset( $plugins_tags[ $block_tag ] ) ) {
                $plugin_tag = $plugins_tags[ $block_tag ];
                $component = $tag[0] ? $tag[0] : $app->component( $plugin_tag['component'] );
                $tag_data['component'] = get_class( $component );
                $tag_data['plugin'] = $tag_data['component'];
                if (! $tag_data['description'] ) {
                    if ( isset( $plugin_tag['description'] ) ) {
                        $tag_data['description'] = $component->translate( $plugin_tag['description'] );
                    } else {
                        $tag_data['description'] = $this->translate( "Block tag provided by plugin '%s'.", $tag_data['component'] );
                    }
                }
            }
            if ( $tag_data['model'] ) {
                $tag_data['model_status'] = $table_has_status[ $tag_data['model'] ];
                $tag_data['model_hierarchy'] = $table_hierarchy[ $tag_data['model'] ];
                $tag_data['model_workspace'] = $table_workspace[ $tag_data['model'] ];
                $tag_data['model'] = $table_labels[ $tag_data['model'] ];
            }
            if ( $tag_data['relation'] ) {
                $tag_data['relation_workspace'] = $table_workspace[ $tag_data['relation'] ];
                $tag_data['relation_status'] = $table_has_status[ $tag_data['relation'] ];
                if ( $table_labels[ $tag_data['relation'] ] ) {
                    $tag_data['relation'] = $table_labels[ $tag_data['relation'] ];
                } else if ( $tag_data['relation'] == '__any__' ) {
                    $tag_data['relation'] = $this->translate( 'Specified model' );
                }
            }
            if ( $tag_data['name'] == 'objectloop' ) {
                $tag_data['model'] = $this->translate( 'Any specified model' );
                $add_attr = ['model' => 'Specify the model name to output in a loop.'];
                $tag_data['attributes'] = array_merge( $add_attr, $tag_data['attributes'] );
            }
            $block_tags_loop[] = $tag_data;
        }
        $ctx->vars['block_tags'] = $block_tags_loop;
        $ctx->vars['reserved_vars'] = array_keys( $this->loop_vars() );
        $conditional_tags_loop = [];
        $conditional_tags = $all_tags['conditional'];
        sort( $conditional_tags );
        $conditional_tags_loop = [];
        $excludes = ['ifhasthumbnail', 'ifworkspacemodel'];
        foreach ( $conditional_tags as $conditional_tag ) {
            if ( $query && stripos( $conditional_tag, $query ) === false ) continue;
            if ( $query_prefix && stripos( $conditional_tag, $query ) !== 0 ) continue;
            if ( in_array( $conditional_tag, $excludes ) ) continue;
            $tag_data = ['name' => $conditional_tag ];
            $tag = isset( $ctx->func_map['conditional_' . $conditional_tag ] )
                 ? $ctx->func_map['conditional_' . $conditional_tag ] : null;
            $tag_data['component'] = null;
            $tag_data['handler'] = null;
            $tag_data['model'] = null;
            $tag_data['column'] = null;
            $tag_data['tag_kind'] = null;
            $tag_data['description'] = null;
            $tag_data['attributes'] = [];
            $tag_data['variables'] = [];
            $tag_data['plugin'] = 'MTMLReference';
            $tag_name = $conditional_tag;
            if ( $tag ) {
                $tag_data['component'] = get_class( $tag[0] );
                $tag_data['handler'] = $tag[1];
                if ( $tag[1] == 'hdlr_iftagged' ) {
                    $tag_data['model'] = preg_replace( '/iftagged$/', '', $conditional_tag );
                }
            } else if ( in_array( $conditional_tag, $core_conditionals ) ) {
                $tag_data['component'] = 'PAML';
                $tag_data['handler'] = "conditional_{$conditional_tag}";
                $tag_data['tag_kind'] = 'Core Tags';
            }
            $hdlr = $tag !== null && isset( $tag[1] ) ? preg_replace( '/^hdlr_/', '', $tag[1] ) : $tag_name;
            if ( isset( $tag_reference[ $tag_name ] ) ) $hdlr = $tag_name;
            if ( isset( $tag_reference[ $hdlr ] ) ) {
                if ( isset( $tag_reference[ $hdlr ]['description'] ) && $tag_reference[ $hdlr ]['description'] ) {
                    $tag_data['description'] = $tag_reference[ $hdlr ]['description'];
                }
                if ( isset( $tag_reference[ $hdlr ]['attributes'] ) && $tag_reference[ $hdlr ]['attributes'] ) {
                    $tag_data['attributes'] = $tag_reference[ $hdlr ]['attributes'];
                }
                if ( isset( $tag_reference[ $hdlr ]['variables'] ) && $tag_reference[ $hdlr ]['variables'] ) {
                    $tag_data['variables'] = $tag_reference[ $hdlr ]['variables'];
                }
            }
            if ( isset( $plugins_tags[ $conditional_tag ] ) ) {
                $plugin_tag = $plugins_tags[ $conditional_tag ];
                $component = $tag[0] ? $tag[0] : $app->component( $plugin_tag['component'] );
                $tag_data['component'] = get_class( $component );
                $tag_data['plugin'] = $tag_data['component'];
                if (! $tag_data['description'] ) {
                    if ( isset( $plugin_tag['description'] ) ) {
                        $tag_data['description'] = $component->translate( $plugin_tag['description'] );
                    } else {
                        $tag_data['description'] = $this->translate( "Conditional tag provided by plugin '%s'.", $tag_data['component'] );
                    }
                }
            }
            if ( $tag_data['model'] ) {
                if ( $tag_data['model'] ) {
                    $tag_data['model'] = $table_labels[ $tag_data['model'] ];
                }
            }
            $conditional_tags_loop[] = $tag_data;
        }
        $ctx->vars['conditional_tags'] = $conditional_tags_loop;
        $function_tags_loop = [];
        $function_tags = $all_tags['function'];
        $function_tags[] = 'extends';
        sort( $function_tags );
        $function_tags_loop = [];
        $alias_functions = $ctx->stash( 'alias_functions' );
        $function_relations = $ctx->stash( 'function_relations' );
        $functions_map = $ctx->stash( 'function_tags' );
        $permalink_tags = $ctx->stash( 'permalink_tags');
        $count_tags = $ctx->stash( 'count_tags');
        $fileurl_tags = $ctx->stash( 'fileurl_tags' );
        $function_relcount = $ctx->stash( 'function_relcount' );
        $fileurl_tags = $ctx->stash( 'fileurl_tags' );
        $table_map = [];
        $excludes = ['ldelim', 'rdelim', 'includeparts', 'assign', 'getactivity',
                     'getregistry', 'getobjectname', 'gettableid', 'geturlprimary',
                     'setrolecolumns', 'assetthumbnail', 'statustext'];
        $function_tags = array_unique( $function_tags );
        $function_date = $ctx->stash( 'function_date' );
        $date_attributes = $tag_reference['date']['attributes'];
        unset( $date_attributes['unixtime'], $date_attributes['ts'] );
        foreach ( $function_tags as $function_tag ) {
            if ( $query && stripos( $function_tag, $query ) === false ) continue;
            if ( $query_prefix && stripos( $function_tag, $query ) !== 0 ) continue;
            if ( in_array( $function_tag, $excludes ) ) continue;
            $tag_data = [];
            $tag_data['name'] = $function_tag;
            $tag = isset( $ctx->func_map['function_' . $function_tag ] )
                 ? $ctx->func_map['function_' . $function_tag ] : null;
            $tag_data['component'] = null;
            $tag_data['handler'] = null;
            $tag_data['model'] = null;
            $tag_data['relation'] = null;
            $tag_data['column'] = null;
            $tag_data['tag_kind'] = null;
            $tag_data['description'] = null;
            $tag_data['attributes'] = [];
            $tag_data['variables'] = [];
            $handler = $tag ? $tag[1] : '';
            $tag_data['plugin'] = 'MTMLReference';
            $tag_name = $function_tag;
            if ( $tag ) {
                $tag_data['component'] = get_class( $tag[0] );
                $tag_data['handler'] = $handler;
                if ( $handler == 'hdlr_get_objectcol' ) {
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                    if ( isset( $alias_functions[ $function_tag ] ) ) {
                        $tag_name = $alias_functions[ $function_tag ];
                    }
                    if ( isset( $function_relations[ $tag_name ] ) ) {
                        $relation_settings = $function_relations[ $tag_name ];
                        $relation = $relation_settings['2'];
                        if ( $relation == 'parent' ) {
                            $relation = $relation_settings['1'];
                        }
                        $tag_data['model'] = $relation_settings['1'];
                        $tag_data['relation'] = $relation;
                        $tag_data['column'] = $relation_settings['3'];
                    } else {
                        if ( isset( $alias_functions[ $function_tag ] ) ) {
                            $alias = $alias_functions[ $function_tag ];
                            $alias = str_replace( '_', '', $alias );
                            if ( $alias != $function_tag ) {
                                $alias_desc = $this->translate( "Alias for '%s'.", "mt:{$alias}" );
                                $tag_data['description'] = $alias_desc;
                                if ( isset( $functions_map[ $alias ] ) ) {
                                    list( $tag_data['model'], $tag_data['column'] ) = $functions_map[ $alias ];
                                }
                            }
                        }
                        if (! $tag_data['description'] && isset( $functions_map[ $tag_name ] ) ) {
                            list( $tag_data['model'], $tag_data['column'] )
                                                          = $functions_map[ $tag_name ];
                            $model = $app->translate( $table_labels[ $tag_data['model'] ] );
                            $column = $app->translate(
                                $app->translate( $tag_data['column'], '', null, 'default' ) );
                            if ( $app->language == 'ja' && $tag_data['column'] === $column ) {
                                $table = isset( $table_map[ $tag_data['model'] ] )
                                       ? $table_map[ $tag_data['model'] ] : $app->get_table( $tag_data['model'] );
                                $table_map[ $tag_data['model'] ] = $table;
                                if ( $table ) {
                                    $colObj = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id,
                                                                                        'name' => $column ] );
                                    if ( $colObj->id ) {
                                        $column = $app->translate(
                                            $app->translate( $colObj->label, '', null, 'default' ) );
                                    }
                                }
                            }
                            $tag_data['description'] =
                                $this->translate( "Get '%s' object's column value '%s'.", [ $model, $column ] );
                        }
                    }
                    if (!$tag_data['model'] && !$tag_data['description'] ) {
                        if ( isset( $permalink_tags[ $tag_name ] ) ) {
                            $model = $permalink_tags[ $tag_name ];
                            $tag_data['model'] = $model;
                            $model = $app->translate( $table_labels[ $tag_data['model'] ] );
                            $tag_data['description'] =
                                $this->translate( "Get '%s' object's permalink.", $model );
                        } else if ( preg_match( '/(^.*?)(archivelink$)/', $tag_name, $matchs ) ) {
                            if ( isset( $matchs[1] ) && isset( $table_labels[ $matchs[1] ] ) ) {
                                $tag_data['model'] = $matchs[1];
                                $model = $app->translate( $table_labels[ $tag_data['model'] ] );
                                $tag_data['description'] =
                                    $this->translate( "Get '%s' object's permalink.", $model );
                            }
                        }
                    }
                } else if ( $handler == 'hdlr_container_count' && isset( $count_tags[ $tag_name ] ) ) {
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                    $tag_data['model'] = $count_tags[ $tag_name ];
                    $model = $app->translate( $table_labels[ $tag_data['model'] ] );
                    $tag_data['description'] =
                        $this->translate( "Get count of '%s' objects in current context.", $model );
                    $loop_name = 'mt:' . preg_replace( '/count$/', '', $tag_name );
                    $attr = $this->translate( "Adds a specifiable tag attribute to the block tag '%s' and returns the count of objects in the current context.", $loop_name );
                    $tag_data['attributes'] = ['_filter' => $attr ];
                } else if ( $handler == 'hdlr_get_relationscount' && isset( $function_relcount[ $tag_name ] ) ) {
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                    list( $tag_data['column'], $tag_data['model'], $tag_data['relation'] ) = $function_relcount[ $tag_name ];
                    $model = $app->translate( $table_labels[ $tag_data['model'] ] );
                    $column = $app->translate(
                        $app->translate( $tag_data['column'], '', null, 'default' ) );
                    if ( $tag_data['relation'] == '__any__' ) {
                        $relation = $this->translate( 'Specified model' );
                    } else {
                        $relation = $app->translate( $table_labels[ $tag_data['relation'] ] );
                    }
                    $tag_data['description'] =
                            $this->translate( "Get count of '%1\$s' related from '%2\$s' named '%3\$s'.", [ $relation, $model, $column ] );
                } else if ( $handler == 'hdlr_get_objecturl' && isset( $fileurl_tags[ $tag_name ] ) ) {
                    $tag_data['column'] = $fileurl_tags[ $tag_name ];
                    $col_name = str_replace( '_', '', $fileurl_tags[ $tag_name ] );
                    $tag_model = preg_replace( "/{$col_name}url$/", '', $tag_name );
                    $tag_data['model'] = $tag_model;
                    $model = $app->translate( $table_labels[ $tag_model ] );
                    $tag_data['description'] =
                        $this->translate( "Get file's url of column '%1\$s' of '%2\$s' object.", [ $fileurl_tags[ $tag_name ], $model ] );
                } else if ( $handler == 'hdlr_get_objecturl' && isset( $fileurl_tags[ $tag_name ] ) ) {
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                    $tag_data['column'] = $fileurl_tags[ $tag_name ];
                    $column_name = $tag_data['column'];
                    if ( preg_match( "/(^.*?){$column_name}url$/", $tag_name, $matchs ) ) {
                        $tag_data['model'] = $matchs[1];
                        $model = $app->translate( $table_labels[ $tag_data['model'] ] );
                        $column = $app->translate(
                            $app->translate( $tag_data['column'], '', null, 'default' ) );
                        $tag_data['description'] =
                            $this->translate( "Get upload file url of '%s' object of column '%s'.", [ $model, $column ] );
                    }
                } else if ( $handler == 'hdlr_get_objectpath' ) {
                    $tag_data['tag_kind'] = 'Dynamic Tags';
                    if ( preg_match( '/(^.*?)(path$)/', $tag_name, $matchs ) ) {
                        if ( isset( $matchs[1] ) && isset( $table_labels[ $matchs[1] ] ) ) {
                            $tag_data['model'] = $matchs[1];
                        }
                    }
                }
                if (! $tag_data['tag_kind'] ) {
                    $tag_data['tag_kind'] = 'System Tags';
                }
            } else if ( in_array( $function_tag, $core_functions ) ) {
                $tag_data['component'] = 'PAML';
                $tag_data['handler'] = "function_{$function_tag}";
                $tag_data['tag_kind'] = 'Core Tags';
            }
            $hdlr = $tag !== null && isset( $handler ) ? preg_replace( '/^hdlr_/', '', $handler ) : $tag_name;
            if ( isset( $tag_reference[ $tag_name ] ) ) $hdlr = $tag_name;
            if ( isset( $tag_reference[ $hdlr ] ) ) {
                if ( isset( $tag_reference[ $hdlr ]['description'] ) && $tag_reference[ $hdlr ]['description'] ) {
                    $tag_data['description'] = $tag_reference[ $hdlr ]['description'];
                }
                if ( isset( $tag_reference[ $hdlr ]['attributes'] ) && $tag_reference[ $hdlr ]['attributes'] ) {
                    $tag_data['attributes'] = $tag_reference[ $hdlr ]['attributes'];
                }
                if ( isset( $tag_reference[ $hdlr ]['variables'] ) && $tag_reference[ $hdlr ]['variables'] ) {
                    $tag_data['variables'] = $tag_reference[ $hdlr ]['variables'];
                }
            }
            if ( isset( $plugins_tags[ $function_tag ] ) ) {
                $plugin_tag = $plugins_tags[ $function_tag ];
                $component = $tag[0] ? $tag[0] : $app->component( $plugin_tag['component'] );
                $tag_data['component'] = get_class( $component );
                $tag_data['plugin'] = $tag_data['component'];
                if (! $tag_data['description'] ) {
                    if ( isset( $plugin_tag['description'] ) ) {
                        $tag_data['description'] = $component->translate( $plugin_tag['description'] );
                    } else {
                        $tag_data['description'] = $this->translate( "Function tag provided by plugin '%s'.", $tag_data['component'] );
                    }
                }
            }
            if ( $tag_data['model'] ) {
                $tag_data['model'] = $table_labels[ $tag_data['model'] ];
            }
            if ( isset( $alias_functions[ $function_tag ] ) ) {
                $tag = str_replace( '_', '', $alias_functions[ $function_tag ] );
                if ( in_array( $tag, $function_date ) ) {
                
                    $tag_data['attributes'] = array_merge( $tag_data['attributes'], $date_attributes );
                }
            }
            if ( in_array( $function_tag, $function_date ) ) {
                $tag_data['attributes'] = array_merge( $tag_data['attributes'], $date_attributes );
            }
            $function_tags_loop[] = $tag_data;
        }
        $ctx->vars['function_tags'] = $function_tags_loop;
        $modifiers = array_unique( $all_tags['modifier'] );
        sort( $modifiers );
        $modifiers_loop = [];
        $excludes = ['eval', 'nocache', 'setvartemplate', 'normarize'];
        $modifier_funcs = $ctx->modifier_funcs;
        foreach ( $modifiers as $modifier ) {
            if ( $query && stripos( $modifier, $query ) === false ) continue;
            if ( in_array( $modifier, $excludes ) ) continue;
            $tag_data = [];
            $tag_data['name'] = $modifier;
            $tag = isset( $ctx->func_map['modifier_' . $modifier ] )
                 ? $ctx->func_map['modifier_' . $modifier ] : null;
            if ( $tag === null ) {
                $tag = isset( $ctx->func_map['filter_' . $modifier ] )
                     ? $ctx->func_map['filter_' . $modifier ] : null;
            }
            $tag_data['component'] = null;
            $tag_data['handler'] = null;
            $tag_data['model'] = null;
            $tag_data['relation'] = null;
            $tag_data['column'] = null;
            $tag_data['tag_kind'] = null;
            $tag_data['description'] = null;
            $tag_data['attribute'] = '';
            $handler = $tag ? $tag[1] : '';
            $tag_data['plugin'] = 'MTMLReference';
            $tag_name = $modifier;
            if ( $tag ) {
                $tag_data['component'] = get_class( $tag[0] );
                $tag_data['handler'] = $handler;
            } else if ( in_array( $modifier, $core_modifiers ) ) {
                $tag_data['component'] = 'PAML';
                if ( method_exists( $ctx, "modifier_{$modifier}" ) ) {
                    $tag_data['handler'] = "modifier_{$modifier}";
                } else if ( isset( $modifier_funcs[ $modifier ] ) ) {
                    $tag_data['handler'] = $modifier_funcs[ $modifier ];
                }
                $tag_data['tag_kind'] = 'Core Tags';
            }
            $hdlr = "modifier_{$modifier}";
            if ( isset( $tag_reference[ $hdlr ] ) ) {
                if ( isset( $tag_reference[ $hdlr ]['description'] ) && $tag_reference[ $hdlr ]['description'] ) {
                    $tag_data['description'] = $tag_reference[ $hdlr ]['description'];
                }
                if ( isset( $tag_reference[ $hdlr ]['attribute'] ) && $tag_reference[ $hdlr ]['attribute'] ) {
                    $tag_data['attribute'] = $tag_reference[ $hdlr ]['attribute'];
                }
            }
            if ( isset( $plugins_tags[ $modifier ] ) ) {
                $plugin_tag = $plugins_tags[ $modifier ];
                $component = $tag[0] ? $tag[0] : $app->component( $plugin_tag['component'] );
                $tag_data['component'] = get_class( $component );
                $tag_data['plugin'] = $tag_data['component'];
                if (! $tag_data['description'] ) {
                    if ( isset( $plugin_tag['description'] ) ) {
                        $tag_data['description'] = $component->translate( $plugin_tag['description'] );
                    } else {
                        $tag_data['description'] = $this->translate( "Global modifier provided by plugin '%s'.", $tag_data['component'] );
                    }
                }
            }
            $modifiers_loop[] = $tag_data;
        }
        $ctx->vars['global_modifiers'] = $modifiers_loop;
        $ctx->vars['tags_count']
          = count( $block_tags_loop ) + count( $conditional_tags_loop ) + count( $function_tags_loop );
        $ctx->vars['modifiers_count'] = count( $modifiers_loop );
        $ctx->vars['total_count'] = $ctx->vars['modifiers_count'] + $ctx->vars['tags_count'];
        $ctx->vars['block_versions'] = ['assignvars' => '3.0', 'capture' => '3.0', 'csspreprocessor' => '3.0'];
        $ctx->vars['function_versions'] =  ['constant' => '3.0', 'extends' => '3.0', 
                                            'fileput' => '3.0', 'let' => '3.0', 'objecttoresource' => '3.0',
                                            'questionnormalize' => '3.0', 'templatelinkedfile' => '3.0',
                                            'templatelinktofile' => '3.0', 'unlink' => '3.0',
                                            'workspaceenableapi' => '3.0', 'archiveogimage' => '3.0',
                                            'archivedescription' => '3.0'];
        $ctx->vars['modifier_versions'] = ['assign' => '3.0', 'date_modify' => '3.0', 'let' => '3.0', 'encode_json' => '3.0'];
        $app->build_page( 'mtml_reference.tmpl' );
    }

    function loop_vars () {
        return [
            '__first__' => 'Assigned 1 when the loop is in the first iteration.',
            '__last__' => 'Assigned 1 when the loop is in the last iteration.',
            '__odd__' => 'Assigned 1 when the loop index is odd, 0 when it is even.',
            '__even__' => 'Assigned 1 when the loop index is even, 0 when it is odd.',
            '__counter__' => 'Tracks the number of times the loop has run (starts at 1).',
            '__index__' => "Holds the current loop index value, even if the 'var' attribute has been given.",
            '__total__' => 'The loop total count.'
        ];
    }
}