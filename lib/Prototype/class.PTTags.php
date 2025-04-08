<?php

if (! defined( 'MB_ENCODE_NUMERICENTITY_MAP' ) ) {
    define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );
}

use Michelf\Markdown;

class PTTags {

    public $include_vars  = [];
    public $select_cols   = [];
    public $include_parts = [];
    public $include_tmpls = [];
    public $core_tags     = [];
    public $tags_cache    = [];
    public $restfulapi    = null;
    public $register_tags = null;
    public $col_labels    = [];

    function init_tags ( $force = false, $register = true ) {
        $app = Prototype::get_instance();
        $ctx = $app->ctx;
        if (!$force && $this->register_tags && is_array( $ctx->stash( 'function_relations' ) ) ) {
            $app->ctx->tags = $this->register_tags;
            return;
        } else if ( $ctx->stash( 'function_relations' ) === null ) {
            $app->init_tags = false;
        }
        if ( $app->force_register_tags && !$register ) {
            $register = true;
        }
        $this->core_tags = !empty( $this->core_tags ) ? $this->core_tags : $ctx->tags;
        if ( $app->init_tags &&! $force ) return;
        if (! array_key_exists( 'workspace', $ctx->__stash ) ) {
            $ctx->stash( 'workspace', $app->workspace() );
        }
        $cache_key = 'template_tags__c';
        $cache = !empty( $this->tags_cache ) ? $this->tags_cache : $app->get_cache( $cache_key );
        if ( $cache && ! $force ) {
            if (! isset( $cache['table_abbrs_map'] ) ) {
                $force = true;
            }
        }
        if ( $cache && ! $force ) {
            $r_tags = $cache['tags'];
            $blockmodels = $cache['blockmodels'];
            $function_relations = $cache['function_relations'];
            $block_relations = $cache['block_relations'];
            $function_date = $cache['function_date'];
            $fileurl_tags = $cache['fileurl_tags'];
            $workspace_tags = $cache['workspace_tags'];
            $alias = $cache['alias_functions'];
            $count_tags = $cache['count_tags'];
            $reference_tags = $cache['reference_tags'];
            $function_tags = $cache['function_tags'];
            $nextprev_tags = $cache['nextprev_tags'];
            $function_relcount = $cache['function_relcount'];
            $permalink_tags = $cache['permalink_tags'];
            $table_abbrs_map = isset( $cache['table_abbrs_map'] ) ? $cache['table_abbrs_map'] : [];
            if ( $register ) {
                foreach ( $r_tags as $name => $prop ) {
                    list( $kind, $method, $component ) = $prop;
                    if ( $component === 'PTTags' ) {
                        $_component = $this;
                    } else {
                        $_component = $app->component( $component );
                        if (! $_component ) $_component = $app->autoload_component( $component );
                    }
                    $ctx->register_tag( $name, $kind, $method, $_component );
                }
            }
            foreach ( $blockmodels as $key => $value ) {
                $ctx->stash( $key, $value );
            }
            $ctx->stash( 'function_relations', $function_relations );
            $ctx->stash( 'block_relations', $block_relations );
            $ctx->stash( 'function_date', $function_date );
            $ctx->stash( 'workspace_tags', $workspace_tags );
            $ctx->stash( 'fileurl_tags', $fileurl_tags );
            $ctx->stash( 'alias_functions', $alias );
            $ctx->stash( 'count_tags', $count_tags );
            $ctx->stash( 'reference_tags', $reference_tags );
            $ctx->stash( 'function_tags', $function_tags );
            $ctx->stash( 'nextprev_tags', $nextprev_tags );
            $ctx->stash( 'function_relcount', $function_relcount );
            $ctx->stash( 'permalink_tags', $permalink_tags );
            $ctx->stash( 'table_abbrs_map', $table_abbrs_map );
            $app->init_tags = $register;
            if ( $register ) $this->register_tags = $ctx->tags;
            return;
        }
        $cols = 'plural,label,name,start_end,taggable,hierarchy';
        $tables = $app->db->model( 'table' )->load( ['template_tags' => 1], [], $cols );
        $block_relations    = [];
        $function_relations = [];
        $function_relcount  = [];
        $function_date      = [];
        $workspace_tags     = [];
        $fileurl_tags       = [];
        $reference_tags     = [];
        $count_tags         = [];
        $function_tags      = [];
        $permalink_tags     = [];
        $alias              = [];
        $tags = $this;
        $r_tags             = [];
        $blockmodels        = [];
        $nextprev_tags      = [];
        $table_abbrs_map    = [];
        $excludes = ['rev_note', 'rev_changed', 'rev_diff', 'rev_type',
                     'rev_object_id', 'password'];
        foreach ( $tables as $table ) {
            $plural = strtolower( $table->plural );
            $plural = preg_replace( '/[^a-z0-9]/', '' , $plural );
            $label = strtolower( $table->label );
            $label = preg_replace( '/[^a-z0-9]/', '' , $label );
            $this->register_tag( $ctx, $plural, 'block', 'hdlr_objectloop', $tags, $r_tags, $register );
            $this->register_tag( $ctx, $label . 'referencecontext',
                'block', 'hdlr_referencecontext', $tags, $r_tags, $register );
            $tbl_name = $table->name;
            $ctx->stash( 'blockmodel_' . $plural, $table->name );
            $blockmodels['blockmodel_' . $plural ] = $table->name;
            $scheme = $app->get_scheme_from_db( $table->name );
            $columns = $scheme['column_defs'];
            $locale = $scheme['locale']['default'];
            $edit_properties = $scheme['edit_properties'];
            $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
            $obj = $app->db->model( $table->name )->new();
            $relation_alias = [];
            $tbl_label = $table->name;
            if (! $app->tags_compat ) {
                $tbl_label = preg_replace( '/[^a-z0-9]/', '' , $tbl_label );
                $table_abbrs_map[ $tbl_label ] = $table->name;
            }
            foreach ( $columns as $key => $props ) {
                if ( in_array( $key, $excludes ) ) continue;
                if ( strpos( $props['type'], 'password' ) !== false ) {
                    continue;
                }
                $label = strtolower( $locale[ $key ] );
                if ( strlen( $label ) != mb_strlen( $label ) && !$app->tag_multibyte ) {
                    $label = '';
                }
                $label = preg_replace( '/[^a-z0-9]/', '' , $label );
                if (! isset( $relations[ $key ] ) ) {
                    $tag_name = str_replace( '_', '', $key );
                    if ( $props['type'] === 'datetime' ) {
                        $function_date[] = $tbl_label . $tag_name;
                    } else if ( $props['type'] === 'int' && 
                        ( isset( $edit_properties[ $key ] )
                        && ( strpos( $edit_properties[ $key ], 'relation' ) === 0
                        || strpos( $edit_properties[ $key ], 'reference' ) === 0 ) ) ) {
                        $prop = $edit_properties[ $key ];
                        if ( strpos( $prop, ':' ) !== false ) {
                            $edit = explode( ':', $prop );
                            if ( $label ) {
                                $this->register_tag( $ctx, $tbl_label . $label . 'context',
                                'block', 'hdlr_referencecontext', $tags, $r_tags, $register );
                                $reference_tags[ $tbl_label . $label . 'context' ]
                                    = [ $tbl_name, $key, $edit[1] ];
                            }
                            if ( $label !== $tag_name ) {
                                $this->register_tag( $ctx, $tbl_label . $tag_name . 'context',
                                'block', 'hdlr_referencecontext', $tags, $r_tags, $register );
                                $reference_tags[ $tbl_label . $tag_name . 'context' ]
                                    = [ $tbl_name, $key, $edit[1] ];
                            }
                        }
                    }
                    if ( $key !== $tag_name ) {
                        $alias[ $tbl_label . $tag_name ] = $tbl_label . $key;
                        $function_tags[ $tbl_label . $key ] = [ $tbl_name, $key ];
                    }
                    $this->register_tag( $ctx, $tbl_label . $tag_name, 'function',
                        'hdlr_get_objectcol', $tags, $r_tags, $register );
                    $function_tags[ $tbl_label . $tag_name ] = [ $tbl_name, $key ];
                    if ( $table->name === 'workspace' ) {
                        $workspace_tags[] = $tbl_name . $tag_name;
                    }
                    if ( $label && $label != $tag_name ) {
                        if (! $obj->has_column( $label ) ) {
                            $this->register_tag( $ctx,
                                $tbl_label . $label,
                                    'function', 'hdlr_get_objectcol', $tags, $r_tags, $register );
                            $alias[ $tbl_label . $label ] = $tbl_label . $key;
                        }
                    }
                    if ( $key === 'published_on' ) {
                        $this->register_tag( $ctx,
                            $tbl_label . 'date', 'function',
                                                'hdlr_get_objectcol', $tags, $r_tags, $register );
                        if (! isset( $function_tags[ $tbl_label . 'date'] ) ) {
                            $function_tags[ $tbl_label . 'date'] = [ $tbl_name, $key ];
                            $alias[ $tbl_label . 'date'] = $tbl_label . $key;
                        } else if ( $app->date_tag_compat ) {
                            $function_tags[ $tbl_label . 'date'] = [ $tbl_name, $key ];
                            $alias[ $tbl_label . 'date'] = $tbl_label . $key;
                        }
                        $function_date[] = $tbl_label . 'date';
                        if ( $tbl_name != $label ) {
                            // Backward compatibility.
                            $this->register_tag( $ctx, $tbl_name . 'next',
                                'block', 'hdlr_nextprev', $tags, $r_tags, $register );
                            $nextprev_tags[ $tbl_name . 'next' ] = [ $tbl_name, 'next'];
                            $this->register_tag( $ctx, $tbl_name . 'previous',
                                'block', 'hdlr_nextprev', $tags, $r_tags, $register );
                            $nextprev_tags[ $tbl_name . 'previous' ] = [ $tbl_name, 'previous'];
                            // End Backward compatibility.
                            $this->register_tag( $ctx, $tbl_label . 'next',
                                'block', 'hdlr_nextprev', $tags, $r_tags, $register );
                            $nextprev_tags[ $tbl_label . 'next' ] = [ $tbl_name, 'next'];
                            $this->register_tag( $ctx, $tbl_label . 'previous',
                                'block', 'hdlr_nextprev', $tags, $r_tags, $register );
                            $nextprev_tags[ $tbl_label . 'previous' ] = [ $tbl_name, 'previous'];
                        }
                    }
                    if ( isset( $edit_properties[ $key ] ) 
                        && $edit_properties[ $key ] === 'file' ) {
                        if (! $obj->has_column( $tag_name . 'url' ) ) {
                            $fileurl_tags[ $tbl_label . $tag_name . 'url'] = $key;
                            if ( $tbl_name === 'workspace' ) {
                                $workspace_tags[] = $tbl_name . $tag_name . 'url';
                            }
                            $this->register_tag( $ctx,
                                $tbl_label . $tag_name . 'url',
                                    'function', 'hdlr_get_objecturl', $tags, $r_tags, $register );
                        }
                    }
                } else {
                    if ( $label && $label != $key ) {
                        $relation_alias[ $key ] = $label;
                    }
                }
                if ( preg_match( '/(^.*)_id$/', $key, $mts ) ) {
                    // if ( $props['type'] == 'int' ) {
                    if ( isset( $edit_properties[ $key ] ) ) {
                        $prop = $edit_properties[ $key ];
                        if ( strpos( $prop, ':' ) !== false ) {
                            $edit = explode( ':', $prop );
                            if ( $edit[0] === 'relation' || $edit[0] === 'reference' ) {
                                if ( $mts[1] === $edit[1] ) {
                                    $this->register_tag( $ctx, $tbl_label . $mts[1],
                                        'function', 'hdlr_get_objectcol', $tags, $r_tags, $register );
                                    $function_relations[ $tbl_label . $mts[1] ]
                                        = [ $key, $tbl_name, $mts[1], $edit[2] ];
                                    if ( $label ) {
                                        $alias[ $tbl_label . $label ] = $tbl_label . $mts[1];
                                    }
                                    if ( $key === 'user_id' ) {
                                        $this->register_tag( $ctx, $tbl_label . 'author',
                                                'function', 'hdlr_get_objectcol', $tags, $r_tags, $register );
                                        $alias[ $tbl_label . 'author'] = $tbl_label . $mts[1];
                                    }
                                } else {
                                    $alt_tbl = $app->get_table( $edit[1] );
                                    if ( is_object( $alt_tbl ) && $alt_tbl->id ) {
                                        $tName = $mts[1];
                                        $mts[1] = $edit[1];
                                        $this->register_tag( $ctx, $tbl_label . $tName,
                                            'function', 'hdlr_get_objectcol', $tags, $r_tags, $register );
                                        $function_relations[ $tbl_label . $tName ]
                                            = [ $key, $tbl_name, $mts[1], $edit[2] ];
                                        if ( $label ) {
                                            $alias[ $tbl_label . $label ] = $tbl_label . $tName;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $maps = $app->db->model( 'urlmapping' )->count( ['model' => $tbl_name ] );
            if ( $maps ) {
                $this->register_tag( $ctx,
                    $tbl_label . 'permalink',
                        'function', 'hdlr_get_objectcol', $tags, $r_tags, $register );
                $permalink_tags[ $tbl_label . 'permalink' ] = $tbl_name;
                $this->register_tag( $ctx,
                    $tbl_label . 'archivelink',
                        'function', 'hdlr_get_objectcol', $tags, $r_tags, $register );
            }
            $count_tagname = $plural . 'count';
            $this->register_tag( $ctx,
                $count_tagname,
                    'function', 'hdlr_container_count', $tags, $r_tags, $register );
            $count_tags[ $count_tagname ] = $tbl_name;
            foreach ( $relations as $key => $model ) {
                $tagName = preg_replace( '/[^a-z0-9]/', '' , $key );
                $this->register_tag( $ctx, $tbl_label . $tagName, 'block',
                    'hdlr_get_relatedobjs', $tags, $r_tags, $register );
                $block_relations[ $tbl_label . $tagName ] = [ $key, $tbl_name, $model ];
                $this->register_tag( $ctx, $tbl_label . $tagName . 'count', 'function',
                    'hdlr_get_relationscount', $tags, $r_tags, $register );
                $function_relcount[ $tbl_label . $tagName . 'count']
                    = [ $key, $tbl_name, $model ];
                if ( isset( $relation_alias[ $key ] ) ) {
                    $aliasName = $relation_alias[ $key ];
                    $this->register_tag( $ctx, $tbl_label . $aliasName, 'block',
                        'hdlr_get_relatedobjs', $tags, $r_tags, $register );
                    $block_relations[ $tbl_label . $aliasName ] = [ $key, $tbl_name, $model ];
                    $this->register_tag( $ctx, $tbl_label . $aliasName . 'count', 'function',
                        'hdlr_get_relationscount', $tags, $r_tags, $register );
                    $function_relcount[ $tbl_label . $aliasName . 'count']
                        = [ $key, $tbl_name, $model ];
                }
            }
            if ( $table->taggable ) {
                $this->register_tag( $ctx, $tbl_label . 'iftagged',
                    'conditional', 'hdlr_iftagged', $tags, $r_tags, $register );
            }
            if ( $table->hierarchy ) {
                $this->register_tag( $ctx, $tbl_label . 'path',
                    'function', 'hdlr_get_objectpath', $tags, $r_tags, $register );
            }
        }
        $ctx->stash( 'function_relations', $function_relations );
        $ctx->stash( 'block_relations', $block_relations );
        $ctx->stash( 'function_date', $function_date );
        $ctx->stash( 'workspace_tags', $workspace_tags );
        $ctx->stash( 'fileurl_tags', $fileurl_tags );
        $ctx->stash( 'alias_functions', $alias );
        $ctx->stash( 'count_tags', $count_tags );
        $ctx->stash( 'reference_tags', $reference_tags );
        $ctx->stash( 'function_tags', $function_tags );
        $ctx->stash( 'nextprev_tags', $nextprev_tags );
        $ctx->stash( 'function_relcount', $function_relcount );
        $ctx->stash( 'permalink_tags', $permalink_tags );
        $ctx->stash( 'table_abbrs_map', $table_abbrs_map );
        $cache = ['tags' => $r_tags, 'reference_tags' => $reference_tags,
                  'blockmodels' => $blockmodels, 'function_relations' => $function_relations,
                  'block_relations' => $block_relations, 'function_date' => $function_date,
                  'workspace_tags' => $workspace_tags, 'alias_functions' => $alias,
                  'count_tags' => $count_tags, 'fileurl_tags' => $fileurl_tags,
                  'function_tags' => $function_tags, 'nextprev_tags' => $nextprev_tags,
                  'function_relcount' => $function_relcount, 'permalink_tags' => $permalink_tags,
                  'table_abbrs_map' => $table_abbrs_map ];
        $app->set_cache( $cache_key, $cache );
        $this->tags_cache = $cache;
        $app->init_tags = $register;
        if ( $register ) $this->register_tags = $ctx->tags;
    }

    function register_tag ( $ctx, $name, $kind, $method, $obj, &$registered_tags = [], $register = true ) {
        if (! $register ) return;
        $ctx->register_tag( $name, $kind, $method, $obj );
        $registered_tags[ $name ] = [ $kind, $method, get_class( $obj ) ];
    }

    function hdlr_tablehascolumn ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $column = $args['column'];
        $model = isset( $args['model'] ) ? $args['model'] : '';
        $obj = $model ? $app->db->model( $model ) : $ctx->stash( 'object' );
        if ( $model ) $app->get_scheme_from_db( $model );
        if (! $obj ) return;
        if ( $obj->_model !== 'table' || $model ) {
            return $obj->has_column( $column );
        }
        return $app->db->model( 'column' )->count( ['table_id' => $obj->id,
                                                    'name' => $column ], [], 'id' );
    }

    function hdlr_breadcrumbs ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (! $counter ) {
            $container = isset( $args['container'] ) ? $args['container'] : null;
            $include_system =
              isset( $args['include_system'] ) ? $args['include_system'] : null;
            $exclude_workspace =
              isset( $args['exclude_workspace'] ) ? $args['exclude_workspace'] : false;
            $current_context = $ctx->stash( 'current_context' );
            $obj = $ctx->stash( 'preview_object' )
                 ? $ctx->stash( 'preview_object' ) : $ctx->stash( 'current_object' );
            if (! $obj ) $obj = $ctx->stash( $current_context );
            if (! $obj ) {
                $repeat = $ctx->false();
                return '';
            }
            if (! $container ) {
                if ( $obj->_model == 'entry' ) {
                    $container = 'category';
                } else if ( $obj->_model == 'page' ) {
                    $exclude_folders = isset( $args['exclude_folders'] )
                                     ? $args['exclude_folders'] : null;
                    if (! $exclude_folders ) {
                        $container = 'folder';
                    }
                }
            }
            $breadcrumbs = [];
            if ( $include_system ) {
                $breadcrumbs[] =
                  ['primary' => $ctx->app->appname, 'url' => $ctx->app->site_url ];
            }
            $workspace = $ctx->stash( 'workspace' );
            $site_url = $workspace ? $workspace->site_url : $app->site_url;
            if (! $exclude_workspace ) {
                if ( $workspace ) {
                    $breadcrumbs[] =
                        ['primary' => $workspace->name, 'url' => $workspace->site_url ];
                }
            }
            if ( $container ) {
                $preview_template = $ctx->stash( 'preview_template' );
                $in_preview = false;
                if ( $app->in_preview && !$ctx->stash( 'preview_object' ) ) {
                    $in_preview = true;
                }
                $relation = [];
                if ( $in_preview ) {
                    $obj_scheme = $app->get_scheme_from_db( $obj->_model );
                    $obj_relations = isset( $obj_scheme['relations'] ) ? $obj_scheme['relations'] : [];
                    $param_name = '';
                    $primary_param_name = '';
                    foreach ( $obj_relations as $colname => $relmodel ) {
                        if ( $container == $relmodel ) {
                            $param_name = $colname;
                            $primary_param_name = "{$param_name}_primary_id";
                            continue;
                        }
                    }
                    if (! $param_name ) {
                        $edit_props = $obj_scheme['edit_properties'];
                        foreach ( $edit_props as $colname => $edit_prop ) {
                            if ( strpos( $edit_prop, "relation:{$container}" ) === 0 ) {
                                $param_name = $colname;
                            }
                        }
                    }
                    if ( $param_name ) {
                        if ( $primary_param_name && $app->param( $primary_param_name ) ) {
                            $container_id = $app->param( $primary_param_name );
                        } else {
                            $container_id = $app->param( $param_name );
                        }
                        if ( is_array( $container_id ) ) {
                            $container_id = $container_id[0];
                        }
                        if ( $container_id ) {
                            $relation = $app->db->model( $container )->load( ['id' => $container_id ] );
                        }
                    }
                } else {
                    $relation_name = null;
                    if ( isset( $args['relation_name'] ) && is_string( $args['relation_name'] ) && $args['relation_name'] ) {
                        $relation_name = $args['relation_name'];
                    }
                    $relation = $app->get_related_objs( $obj, $container, $relation_name );
                }
                if (! empty( $relation ) ) {
                    $app->init_callbacks( $container, 'post_load_objects' );
                    $parent = $relation[0];
                    $relation = $parent;
                    $cTable = $app->get_table( $container );
                    $callback = ['name' => 'post_load_objects', 'model' => $container,
                                 'table' => $cTable, 'args' => $args ];
                    $parents = [];
                    $status_published = null;
                    if ( $parent->has_column( 'status' ) ) {
                        $status_published = $app->status_published( $relation );
                    }
                    if ( $parent->has_column( 'parent_id' ) ) {
                        while ( $parent !== null ) {
                            if ( $parent_id = $parent->parent_id ) {
                                $parent_id = (int) $parent_id;
                                $parent = $app->db->model( $container )->load( ['id' => $parent_id ] );
                                $count_obj = count( $parent );
                                $app->run_callbacks( $callback, $container, $parent, $count_obj );
                                if ( $count_obj ) {
                                    $parent = $parent[0];
                                    if ( $status_published && $parent->status != $status_published ) {
                                        continue;
                                    }
                                    array_unshift( $parents, $parent );
                                } else {
                                    $parent = null;
                                }
                            } else {
                                $parent = null;
                            }
                        }
                    }
                    if ( $status_published && $status_published == $relation->status ) {
                        $parents[] = $relation;
                    } else if (! $status_published ) {
                        $parents[] = $relation;
                    }
                    $primary = $cTable->primary;
                    foreach ( $parents as $parent ) {
                        $permalink = $app->get_permalink( $parent );
                        if (! $permalink && $app->build_breadcrumbs_url ) {
                            $current_context = $ctx->stash( 'current_context' );
                            $current_obj = $ctx->stash( $parent->_model );
                            $ctx->stash( $parent->_model, $parent );
                            $ctx->stash( 'current_context', $parent->_model );
                            $tag_args = ['this_tag' => $parent->_model . 'path'];
                            $permalink = $this->hdlr_get_objectpath( $tag_args, $ctx );
                            if ( $permalink ) {
                                $permalink = "{$site_url}{$permalink}/" . $app->directory_index;
                            }
                            $ctx->stash( 'current_context', $current_context );
                            $ctx->stash( $parent->_model, $current_obj );
                        }
                        $breadcrumbs[] = ['primary' => $parent->$primary, 'url' => $permalink ];
                    }
                }
            }
            $table = $app->get_table( $obj->_model );
            if ( $obj->has_column( 'parent_id' ) ) {
                $parent = $obj;
                $parents = [];
                $status_published = null;
                if ( $parent->has_column( 'status' ) ) {
                    $status_published = $app->status_published( $parent );
                }
                $callback = ['name' => 'post_load_objects', 'model' => $obj->_model,
                             'table' => $table, 'args' => $args ];
                while ( $parent !== null ) {
                    if ( $parent_id = $parent->parent_id ) {
                        $container = $container ? $container : $parent->_model;
                        $parent_id = (int) $parent_id;
                        $parent = $app->db->model( $container )->load( ['id' => $parent_id ] );
                        $count_obj = count( $parent );
                        $app->run_callbacks( $callback, $container, $parent, $count_obj );
                        if ( $count_obj ) {
                            $parent = $parent[0];
                            if ( $status_published && $parent->status != $status_published ) {
                                continue;
                            }
                            array_unshift( $parents, $parent );
                        } else {
                            $parent = null;
                        }
                    } else {
                        $parent = null;
                    }
                }
                if ( $status_published && $status_published == $obj->status ) {
                    $parents[] = $obj;
                } else if (! $status_published ) {
                    $parents[] = $obj;
                }
                $primary = $table->primary;
                foreach ( $parents as $parent ) {
                    $permalink = $app->get_permalink( $parent );
                    if (! $permalink && $app->build_breadcrumbs_url ) {
                        $current_context = $ctx->stash( 'current_context' );
                        $current_obj = $ctx->stash( $parent->_model );
                        $ctx->stash( $parent->_model, $parent );
                        $ctx->stash( 'current_context', $parent->_model );
                        $tag_args = ['this_tag' => $parent->_model . 'path'];
                        $permalink = $this->hdlr_get_objectpath( $tag_args, $ctx );
                        if ( $permalink ) {
                            $permalink = "{$site_url}{$permalink}/" . $app->directory_index;
                        }
                        $ctx->stash( 'current_context', $current_context );
                        $ctx->stash( $parent->_model, $current_obj );
                    }
                    $breadcrumbs[] = ['primary' => $parent->$primary, 'url' => $permalink ];
                }
            } else {
                // Called recursively when obtaining the upper path.
                // https://github.com/PowerCMS/Prototype/issues/2987
                // $permalink = $app->get_permalink( $obj );
                // $primary = $table->primary;
                // $primary = $obj->$primary;
                $breadcrumbs[] = ['primary' => $ctx->stash( 'current_archive_title' ),
                                  'url' => $ctx->stash( 'current_archive_url' ) ];
            }
            $ctx->local_params = $breadcrumbs;
        }
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $param = $params[ $counter ];
            $ctx->local_vars['__key__'] = $param['url'] ? $param['url'] : '';
            $ctx->local_vars['__value__'] = $param['primary'];
            $ctx->local_vars['__breadcrumbs_url__'] = $ctx->local_vars['__key__'];
            $ctx->local_vars['__breadcrumbs_title__'] = $param['primary'];
            $repeat = true;
        } else {
            unset( $params );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_menuitems ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (! $counter ) {
            $name = isset( $args['name'] ) ? $args['name'] : null;
            $id = isset( $args['id'] ) ? (int) $args['id'] : null;
            $basename = isset( $args['basename'] ) ? $args['basename'] : null;
            if (! $id && ! $name && ! $basename ) {
                $repeat = $ctx->false();
                return '';
            }
            $orig_args = $args;
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
            $args = ['limit' => 1];
            if ( $global ) {
                $terms['workspace_id'] = 0;
            } else {
                if ( $workspace_id === null && $ctx->stash( 'workspace' ) ) {
                    $workspace = $ctx->stash( 'workspace' );
                    $workspace_id = (int) $workspace->id;
                    $terms['workspace_id'] = ['IN' => [0, $workspace_id ]];
                    $args['sort'] = 'workspace_id';
                    $args['direction'] = 'descend';
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
            $menu = $app->db->model( 'menu' )->get_by_key( $terms, $args );
            if (! $menu->id ) {
                $repeat = $ctx->false();
                return '';
            }
            $urls = $app->get_related_objs( $menu, 'urlinfo' );
            if ( empty( $urls ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $params = [];
            $include_draft = isset( $args['include_draft'] )
                           ? true : false;
            $column = isset( $args['column'] ) ? $args['column'] : '';
            $callback_models = [];
            foreach ( $urls as $url ) {
                if (! $url->model || ! $url->object_id ) {
                    continue;
                }
                $table = $app->get_table( $url->model );
                if (! $table ) continue;
                $primary = $table->primary;
                $id = (int) $url->object_id;
                $_model = $app->db->model( $url->model );
                $terms = ['id' => $id];
                $args = ['limit' => 1];
                $cols = "id,{$primary}";
                $_caching = $app->db->caching;
                $app->db->caching = false;
                if ( $column ) $cols .= ",{$column}";
                if ( $_model->has_column( 'status' ) && ! $include_draft ) {
                    $status_published = (int) $app->status_published( $url->model );
                    $terms['status'] = $status_published;
                }
                $extra = '';
                $ex_vals = [];
                if (! isset( $callback_models[ $url->model ] ) ) {
                    $scheme = $app->get_scheme_from_db( $url->model );
                    $app->init_callbacks( $url->model, 'pre_listing' );
                    $app->init_callbacks( $url->model, 'post_load_objects' );
                    $callback_models[ $url->model ] = true;
                }
                $callback = ['name' => 'pre_listing', 'model' => $url->model,
                             'scheme' => $scheme, 'table' => $table,
                             'args' => $orig_args ];
                $extra = '';
                $app->run_callbacks( $callback, $url->model, $terms, $args, $extra, $ex_vals );
                $objects = $_model->load( $terms, $args, $cols, $extra, $ex_vals );
                $callback = ['name' => 'post_load_objects', 'model' => $url->model,
                             'table' => $table, 'args' => $orig_args ];
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
                $params[] = $_params;
                $app->db->caching = $_caching;
            }
            $ctx->local_params = $params;
        }
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $param = $params[ $counter ];
            foreach ( $param as $key => $value ) {
                $ctx->local_vars[ $key ] = $value;
            }
            $ctx->local_vars['__key__'] = $param['__item_url__'];
            $ctx->local_vars['__value__'] = $param['__item_primary__'];
            $repeat = true;
        } else {
            unset( $params );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_nextprev ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $this_tag = $args['this_tag'];
        $nextprev_tags = $ctx->stash( 'nextprev_tags' );
        if ( $nextprev_tags === null ) {
            // When __stash reseted.
            $this->init_tags();
            $nextprev_tags = $app->ctx->stash( 'nextprev_tags' );
        }
        if (! isset( $nextprev_tags[ $this_tag ] ) ) {
            $repeat = $ctx->false();
            return '';
        }
        list ( $model, $nextprev ) = [ $nextprev_tags[ $this_tag ][0],
                                       $nextprev_tags[ $this_tag ][1]];
        $local_vars = [ $model ];
        if (! $counter ) {
            $obj = $ctx->stash( $model );
            if (! $obj ) {
                $repeat = $ctx->false();
                return '';
            }
            $date_col = $args['sort_by'] ?? $app->get_date_col( $obj );
            if (! $date_col || ! $obj->has_column( $date_col ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $include_draft = isset( $args['include_draft'] ) ? true : false;
            $op = $nextprev == 'next' ? '>=' : '<=';
            $direction = $nextprev == 'next' ? 'ascend' : 'descend';
            $terms = ['id' => ['!=' => $obj->id ] ];
            $terms[ $date_col ] = [ $op => $obj->$date_col ];
            $_params = ['limit' => 1, 'sort' => $date_col, 'direction' => $direction];
            if ( $obj->has_column( 'rev_type' ) ) {
                $terms['rev_type'] = 0;
            }
            $status_published = null;
            if (! $include_draft && $obj->has_column( 'status' ) ) {
                $status_published = $app->status_published( $obj );
                $terms['status'] = $status_published;
            }
            $cols = isset( $args['cols'] ) ? $args['cols'] : '*';
            $cols = $this->select_cols( $app, $obj, $cols );
            $extra = '';
            if ( $obj->has_column( 'workspace_id' ) ) {
                $extra = $this->include_exclude_workspaces( $app, $args, $obj );
                if ( $extra ) {
                    $extra = ' AND ' . $obj->_model . "_workspace_id {$extra}";
                }
            }
            $app->init_callbacks( $model, 'pre_listing' );
            $scheme = $app->get_scheme_from_db( $model );
            $callback = ['name' => 'pre_listing', 'model' => $model,
                         'scheme' => $scheme, 'table' => $app->get_table( $model ),
                         'args' => $_params ];
            $ex_vals = [];
            $app->run_callbacks( $callback, $model, $terms, $_params, $extra, $ex_vals );
            $params = $app->db->model( $model )->load( $terms, $_params, $cols, $extra, $ex_vals );
            if ( empty( $params ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $_next_prev = $params[0];
            if ( $obj->$date_col === $_next_prev->$date_col ) {
                if ( $nextprev == 'next' ) {
                    if ( $obj->id > $_next_prev->id ) {
                        $terms['id'] = ['>' => $obj->id ];
                        $params = $app->db->model( $model )->load( $terms, $_params, $cols, $extra, $ex_vals );
                    }
                } else {
                    if ( $obj->id < $_next_prev->id ) {
                        $terms['id'] = ['<' => $obj->id ];
                        $params = $app->db->model( $model )->load( $terms, $_params, $cols, $extra, $ex_vals );
                    }
                }
                if ( empty( $params ) ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $_next_prev = $params[0];
            }
            $table = $app->get_table( $model );
            $app->init_callbacks( $model, 'post_load_objects' );
            $callback = ['name' => 'post_load_objects', 'model' => $model, 'table' => $table, 'args' => $args ];
            $count_obj = count( $params );
            $app->run_callbacks( $callback, $model, $params, $count_obj );
            if ( empty( $params ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $_next_prev = $params[0];
            $ctx->localize( $local_vars );
            $ctx->local_params = $params;
            if ( $app->id == 'Prototype'
                && isset( $args['rebuild'] ) && $args['rebuild'] ) {
                if ( $app->mode == 'save' && $obj->id == $app->param( 'id' ) ) {
                    if (! $status_published || $_next_prev->status == $status_published ) {
                        $app->delayed_publish_objs[ $obj->_model . '_' . $_next_prev->id ] = $_next_prev;
                    }
                }
            }
        }
        $params = $ctx->local_params;
        $ctx->local_vars['__total__'] = 1;
        $ctx->local_vars['__counter__'] = $counter;
        if ( isset( $params[ $counter ] ) ) {
            $obj = $params[ $counter ];
            $ctx->stash( $model, $obj );
            $repeat = true;
        } else {
            unset( $params );
            $ctx->restore( $local_vars );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_speedmeter ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $name = isset( $args['name'] ) ? $args['name'] : 'It';
        $key = $name !== 'It' ? md5( $name ) : '';
        $ctx->local_vars['__total__'] = 1;
        $ctx->local_vars['__counter__'] = $counter;
        if (! $counter ) {
            $proc_id = $key ? $key : $app->magic();
            $ctx->stash( 'speedmeter_id', $proc_id );
            $start_time = microtime( true );
            $ctx->stash( "speedmeter_{$proc_id}", $start_time );
        } else {
            $repeat = $ctx->false();
            $proc_id = $key ? $key : $ctx->stash( 'speedmeter_id' );
            $start_time = $ctx->stash( "speedmeter_{$proc_id}" );
            $build_time = microtime( true ) - $start_time;
            $build_time = round( $build_time, 4 );
            $comment_type = isset( $args['comment_type'] )
                          ? strtolower( $args['comment_type'] ) : 'HTML';
            if ( $comment_type == 'php' || $comment_type == 'javascript' ) {
                $content .= "\n    // {$name} took {$build_time} seconds to process this block.\n";
                $content = "\n    // {$name} start.-->\n" . $content;
            } else {
                $content .= "\n<!--{$name} took {$build_time} seconds to process this block.-->\n";
                $content = "\n<!--{$name} start.-->\n" . $content;
            }
        }
        return $content;
    }

    function hdlr_cacheblock ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $cache_key = isset( $args['cache_key'] ) ? md5( $args['cache_key'] ) : '';
        $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : 0;
        if (! $workspace_id && $ctx->stash( 'workspace' ) ) {
            $workspace_id = $ctx->stash( 'workspace' )->id;
        }
        $dynamic_caching = isset( $args['dynamic_caching'] );
        $cache_ttl = $app->request_time + $app->cache_expires;
        if ( isset( $args['cache_ttl'] ) && $args['cache_ttl'] ) {
            $cache_ttl = $app->request_time + (int) $args['cache_ttl'];
            if ( isset( $ctx->vars['publish_type'] ) && $ctx->vars['publish_type'] == 6 ) {
                $dynamic_caching = true;
            }
        }
        $request_id = $dynamic_caching ? 'dynamic_cache' : $app->request_id;
        $db_cache_key = md5( "template-module-{$cache_key}-{$request_id}-{$workspace_id}" );
        if (! $counter ) {
            if ( $cache_key && $app->stash( "template-module-{$cache_key}-{$workspace_id}" ) ) {
                $repeat = $ctx->false();
                return $app->stash( "template-module-{$cache_key}-{$workspace_id}" );
            } else if ( $cache_key && !$app->no_cache ) {
                $cache_terms = ['kind' => 'CH',
                                'value' => $request_id,
                                'key'  => $cache_key ];
                if ( isset( $args['triggers'] ) && $args['triggers'] ) {
                    unset( $cache_terms['value'] );
                    $user_id = isset( $args['cache_object_id'] ) && $args['cache_object_id'] ? -2 : -1;
                    $cache_terms['user_id'] = $user_id;
                }
                $session = $app->db->model( 'session' )->get_by_key( $cache_terms );
                if ( $session->id && ( $session->expires > $app->request_time ) ) {
                    $repeat = $ctx->false();
                    return $session->data;
                }
                $ctx->local_vars['template-module-' . $db_cache_key ] = $session;
            }
        } else {
            $repeat = $ctx->false();
        }
        $ctx->local_vars['__total__'] = 1;
        $ctx->local_vars['__counter__'] = $counter;
        if ( isset( $content ) ) {
            if ( $cache_key && !$app->no_cache ) {
                $app->stash( "template-module-{$cache_key}-{$workspace_id}", $content );
                $session = isset( $ctx->local_vars['template-module-' . $db_cache_key ] )
                         ? $ctx->local_vars['template-module-' . $db_cache_key ]
                         : $app->db->model( 'session' )->get_by_key( [
                               'kind'  => 'CH',
                               'key'   => $cache_key ] );
                $session->name( $db_cache_key );
                $session->value( $request_id );
                $session->start( $app->request_time );
                $session->expires( $cache_ttl );
                $session->data( $content );
                if ( isset( $args['triggers'] ) && $args['triggers'] ) {
                    // for flush_cache.
                    if ( isset( $args['cache_ttl'] ) && $args['cache_ttl'] == -1 ) {
                        $expires = 86400 * 365 * 50; // 50 years.
                        $cache_ttl = $app->request_time + $expires;
                        $session->expires( $cache_ttl );
                    }
                    $triggers = is_array( $args['triggers'] ) ? implode( ',', $args['triggers'] ) : $args['triggers'];
                    $session->text( strtolower( str_replace( ' ', '', $triggers ) ) );
                    if ( strpos( $triggers, ',' ) === false && isset( $args['cache_object_id'] ) && $args['cache_object_id'] ) {
                        $object_id = $args['cache_object_id'];
                        $session->name( "{$triggers}_{$object_id}" );
                        $session->user_id( -2 );
                    } else {
                        $session->user_id( -1 );
                    }
                } else {
                    $session->user_id( 0 ); 
                }
                $session->save();
            }
        }
        return $content;
    }

    function hdlr_setcontext ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $orig_args = $args;
        $localvars = ['workspace', 'current_container', 'current_archive_context',
                      'current_context', 'current_archive_type', 'current_timestamp',
                      'current_timestamp_end', 'inside_setcontext'];
        $context = isset( $args['context'] ) ? $args['context'] : null;
        if ( $context ) {
            $localvars[] = $context;
        }
        $ctx->local_vars['__total__'] = 1;
        $ctx->local_vars['__counter__'] = $counter;
        if (! $counter ) {
            $container = isset( $args['container'] ) ? $args['container'] : null;
            $archive_type = isset( $args['archive_type'] ) ? $args['archive_type'] : null;
            $archive_context = isset( $args['archive_context'] ) ? $args['archive_context'] : null;
            $timestamp = isset( $args['timestamp'] ) ? $args['timestamp'] : null;
            $timestamp_end = isset( $args['timestamp_end'] ) ? $args['timestamp_end'] : null;
            $workspace_id = isset( $args['workspace_id'] ) ? (int) $args['workspace_id'] : null;
            $workspace = $workspace_id
                       ? $app->db->model( 'workspace' )->load( $workspace_id )
                       : $ctx->stash( 'workspace' );
            $obj = null;
            if ( $context ) {
                $table = $app->get_table( $context );
                if (! $table ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $primary = $table->primary;
                $value = isset( $args[ $primary ] ) ? $args[ $primary ] : null;
                $path = isset( $args['path'] ) ? $args['path'] : null;
                $id = null;
                if (! $value ) {
                    $id = isset( $args['id'] ) ? (int) $args['id'] : null;
                }
                if (! $id && ! $value && ! $path ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $terms = [];
                if ( $path && !$table->hierarchy ) {
                    $repeat = $ctx->false();
                    return '';
                }
                if (! $path ) {
                    $terms = $id ? ['id' => $id ] : [ $primary => ['BINARY' => $value ] ];
                }
                $model = $app->db->model( $context );
                if ( $model->has_column( 'workspace_id' ) ) {
                    if (! $workspace && ! $table->space_child && $table->display_system ) {
                        $terms['workspace_id'] = 0;
                    } else if ( $workspace ) {
                        $terms['workspace_id'] = $workspace->id;
                    }
                }
                $args = ['limit' => 1];
                if ( $path ) {
                    $paths = explode( '/', $path );
                    $value = array_pop( $paths );
                    $parent_id = 0;
                    $ws_terms = $terms;
                    if (!empty( $paths ) ) {
                        foreach ( $paths as $path ) {
                            $ws_terms[ $primary ] = ['BINARY' => $path ];
                            $ws_terms['parent_id'] = $parent_id;
                            $parent = $app->db->model( $context )->get_by_key( $ws_terms, null, 'id' );
                            if (! $parent->id ) {
                                $ws_terms[ $primary ] = $path;
                                $parent = $app->db->model( $context )->get_by_key( $ws_terms, null, 'id' );
                            }
                            if (! $parent->id ) {
                                $repeat = $ctx->false();
                                return '';
                            }
                            $parent_id = (int) $parent->id;
                        }
                    }
                    $terms['parent_id'] = $parent_id;
                    $terms[ $primary ] = $value;
                } else {
                    if ( isset( $app->db->scheme[ $context ] ) && isset( $app->db->scheme[ $context ]['indexes'] ) ) {
                        if ( isset( $app->db->scheme[ $context ]['indexes']['context'] ) 
                            && is_array( $app->db->scheme[ $context ]['indexes']['context'] ) ) {
                            $args['index'] = 'context';
                        }
                    }
                }
                if ( $context == 'tag' && $container ) {
                    $terms['class'] = $container;
                }
                $obj = $app->db->model( $context )->load( $terms, $args );
                if (! $obj ||! count( $obj ) ) {
                    if ( isset( $terms[ $primary ] ) && isset( $terms[ $primary ]['BINARY'] ) ) {
                        $terms[ $primary ] = $terms[ $primary ]['BINARY'];
                    }
                    $obj = $app->db->model( $context )->load( $terms, $args );
                }
                if (! $obj ||! count( $obj ) ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $obj = $obj[0];
            }
            $ctx->localize( $localvars );
            if ( $workspace ) {
                $ctx->stash( 'workspace', $workspace );
            }
            if ( $obj ) {
                $ctx->stash( $context, $obj );
                $ctx->stash( 'current_context', $context );
                $ctx->stash( 'current_archive_context', $obj->_model );
            }
            if ( $container ) {
                $ctx->stash( 'current_container', $container );
            }
            if ( $archive_type ) {
                $ctx->stash( 'current_archive_type', $archive_type );
            }
            if ( $archive_context ) {
                $ctx->stash( 'current_archive_context', $archive_context );
            }
            if ( $timestamp ) {
                $ctx->stash( 'current_timestamp', $timestamp );
            }
            if ( $timestamp_end ) {
                $ctx->stash( 'current_timestamp_end', $timestamp_end );
            }
            $ctx->stash( 'inside_setcontext', true );
            $app->init_callbacks( $context, 'post_load_object' );
            $table = isset( $table ) ? $table : $app->get_table( $context );
            $callback = ['name' => 'post_load_object', 'model' => $context, 'table' => $table, 'args' => $orig_args ];
            $app->run_callbacks( $callback, $context, $obj );
        }
        if ( $counter ) {
            $ctx->restore( $localvars );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_triggersection ( $args, $content, $ctx, &$repeat, $counter ) {
        $ctx->local_vars['__total__'] = 1;
        $ctx->local_vars['__counter__'] = $counter;
        if ( $counter ) {
            $repeat = $ctx->false();
            $id = isset( $args['id'] ) ? $args['id'] : '';
            $model = isset( $args['model'] ) ? $args['model'] : '__any__';
            if ( $id ) {
                $tmpl = $ctx->stash( 'current_include_template' ) ? $ctx->stash( 'current_include_template' ) : $ctx->stash( 'current_template' );
                $tmpl_id = $tmpl->id;
                if ( $ctx->app->debug ) {
                    $time = isset( $_SERVER['REQUEST_TIME'] ) ? $_SERVER['REQUEST_TIME'] : time();
                    $ts = date( 'Y-m-d H:i:s', $time );
                    $content = "<!--triggersection id=\"{$id}\" model=\"{$model}\" template_id=\"{$tmpl_id}\" updated=\"{$ts}\"-->" . $content . '<!--/triggersection-->';
                } else {
                    $content = "<!--triggersection id=\"{$id}\" model=\"{$model}\" template_id=\"{$tmpl_id}\"-->" . $content . '<!--/triggersection-->';
                }
            }
        }
        return $content;
    }

    function hdlr_calendar ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $localvars = ['current_timestamp', 'current_timestamp_end'];
        if (! $counter ) {
            $m = isset( $args['month'] ) ? strtolower( $args['month'] )
               : $ctx->stash( 'current_timestamp' );
            if ( $m == 'this' || !$m ) {
                $year = date('Y');
                $month = date('n');
            } else if ( $m == 'last' ) {
                $year = date('Y', strtotime( date( 'Y-m-1' ) . '-1 month' ) );
                $month = date('n', strtotime( date( 'Y-m-1' ) . '-1 month' ) );
            } else if ( preg_match( '/^[0-9]*$/', $m ) ) {
                $year = substr( $m, 0, 4 );
                $month = substr( $m, 4, 2 );
            } else {
                $year = date('Y');
                $month = date('n');
            }
            $last_day = date( 'j', mktime( 0, 0, 0, $month + 1, 0, $year ) );
            $params = [];
            $j = 0;
            $s = 7;
            for ( $i = 1; $i < $last_day + 1; $i++ ) {
                $week = date( 'w', mktime( 0, 0, 0, $month, $i, $year ) );
                if ( $i == 1 ) {
                    for ( $s = 1; $s <= $week; $s++ ) {
                        $params[ $j ]['day'] = '';
                        $params[ $j ]['week'] = $s - 1;
                        $j++;
                    }
                    $s--;
                }
                $params[ $j ]['day'] = $i;
                if ( $s == 7 ) {
                    $s = 0;
                }
                $params[ $j ]['week'] = $s;
                $s++;
                $j++;
                if ( $i == $last_day ) {
                    for ( $k = 1; $k <= 6 - $week; $k++ ) {
                        $params[ $j ]['day'] = '';
                        $params[ $j ]['week'] = $s;
                        $s++;
                        $j++;
                    }
                }
            }
            $ctx->localize( $localvars );
            $ctx->local_params = $params;
            $week = [
              'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $ctx->local_vars['__week__'] = $week;
            $ctx->local_vars['__year__'] = $year;
            $month = str_pad( $month, 2, 0, STR_PAD_LEFT );
            $ctx->local_vars['__month__'] = $month;
        }
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $week = $ctx->local_vars['__week__'];
            $year = $ctx->local_vars['__year__'];
            $month = $ctx->local_vars['__month__'];
            $day = $params[ $counter ];
            $dayOfWeek = $day['week'];
            $day = $day['day'];
            $ctx->local_vars['__date__'] = $day;
            $ctx->local_vars['__value__'] = $day;
            $ctx->local_vars['__week_number__'] = $dayOfWeek;
            $ctx->local_vars['__key__'] = $dayOfWeek;
            $ctx->local_vars['__day_of_week__'] = $week[ $dayOfWeek ];
            $ctx->local_vars['__week_header__'] = $dayOfWeek == 0 ? true : false;
            $ctx->local_vars['__week_footer__'] = $dayOfWeek == 6 ? true : false;
            $ctx->stash( 'current_timestamp', null );
            $ctx->stash( 'current_timestamp_end', null );
            $ctx->local_vars['__timestamp__'] = '';
            if ( $day ) {
                $day = str_pad( $day, 2, 0, STR_PAD_LEFT );
                $ts_start = "{$year}{$month}{$day}000000";
                $ctx->local_vars['__timestamp__'] = $ts_start;
                $ctx->stash( 'current_timestamp', $ts_start );
                $ctx->stash( 'current_timestamp_end', "{$year}{$month}{$day}235959" );
            }
            $repeat = true;
        } else {
            unset( $params );
            $ctx->restore( $localvars );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_countgroupby ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (! $counter ) {
            $model = $args['model'];
            $app->get_scheme_from_db( $model );
            $group = $args['group'];
            if ( is_string( $group ) ) $group = [ $group ];
            $count = isset( $args['count'] ) ? $args['count']
                   : $group[ count( $group ) - 1 ];
            unset( $args['model'], $args['group'] );
            $obj = $app->db->model( $model )->new();
            $model = $obj->_model;
            $terms = [];
            foreach ( $args as $key => $value ) {
                if ( $obj->has_column( $key ) ) {
                    $terms[ $key ] = $value;
                }
            }
            $table = $app->get_table( $model );
            if ( $table ) {
                if ( ! isset( $args['status_lt'] ) &&
                     ! isset( $args['status_not'] ) && ! isset( $args['status'] )
                    && ! isset( $args['include_draft'] ) ) {
                    if ( $table->has_status ) {
                        $status_published = $app->status_published( $model );
                        $terms['status'] = $status_published;
                    }
                } else if ( isset( $args['status_not'] ) ) {
                    $not = (int) $args['status_not'];
                    $terms['status'] = ['!=' => $not ];
                } else if ( isset( $args['status_lt'] ) ) {
                    $lt = (int) $args['status_lt'];
                    $terms['status'] = ['<' => $lt ];
                }
                if ( $table->revisable ) {
                    $workflow = isset( $args['workflow'] ) ? $args['workflow'] : null;
                    if ( $workflow ) {
                        $terms['rev_type'] = ['!=' => 1];
                    } else {
                        $terms['rev_type'] = 0;
                    }
                }
            }
            $params = ['group' => $group ];
            $sort_by = null;
            if ( isset( $args['sort_by'] ) ) {
                $sort_by = $args['sort_by'];
            }
            if ( isset( $sort_by ) && ( $sort_by == 'name' || $sort_by == 'count' ) ) {
                $params['sort'] = $sort_by;
            } else if ( isset( $sort_by ) && $obj->has_column( $sort_by ) && in_array( $sort_by, $group ) ) {
                $params['sort'] = $sort_by;
            }
            $sort_order = null;
            if ( isset( $args['sort_order'] ) ) {
                $params['direction'] = ( stripos( $args['sort_order'], 'desc' )
                    !== false ) ? 'descend' : 'ascend';
                $sort_order = $params['direction'];
            }
            if ( isset( $args['offset'] ) ) {
                $params['offset'] = (int) $args['offset'];
            }
            if ( isset( $args['limit'] ) ) {
                $params['limit'] = (int) $args['limit'];
            }
            $extra = '';
            if ( $obj->has_column( 'workspace_id' ) && !isset( $args['workspace_id'] ) ) {
                $ws_attr = $this->include_exclude_workspaces( $app, $args, $obj );
                if ( $ws_attr ) {
                    $ws_attr = ' AND ' . $obj->_model . "_workspace_id {$ws_attr}";
                    $extra .= $ws_attr;
                }
            }
            $params['count'] = $count;
            if ( isset( $args['include_draft'] ) && $model == 'urlinfo' ) {
                $terms['delete_flag'] = [0, 1];
            }
            $place_holders = [];
            if ( isset( $args['join'] ) && is_array( $args['join'] ) ) {
                if ( count( $args['join'] ) === 5 ) {
                    // <mt:countgroupby model="urlmapping" count="model" group="'workspace_id','model'"
                    // join="'template','template_id','id','status','2'"...
                    list( $join_model, $this_col, $join_col, $filter_col, $filter_value ) = $args['join'];
                    $join_table = $app->get_table( $join_model );
                    if ( $join_table && $app->db->model( $model )->has_column( $this_col )
                        && $app->db->model( $join_model )->has_column( $join_col )
                        && $app->db->model( $join_model )->has_column( $filter_col ) ) {
                        $params['join'] = [ $join_model, [ $this_col, $join_col ] ];
                        $params['distinct'] = 1;
                        $dbprefix = DB_PREFIX;
                        $extra .= " AND {$dbprefix}{$join_model}.{$join_model}_{$filter_col}=? ";
                        $place_holders = [ $filter_value ];
                    }
                }
            }
            $group = $app->db->model( $model )->count_group_by( $terms, $params, $extra, $place_holders );
            if ( empty( $group ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $prefix = $obj->_colprefix;
            $params = [];
            foreach ( $group as $items ) {
                $_item = [];
                foreach ( $items as $k => $v ) {
                    if ( strpos( $k, 'COUNT' ) === 0 ) {
                        $k = '_count_object';
                    } else {
                        $k = preg_replace( "/^$prefix/", '', $k );
                    }
                    $_item[ $k ] = $v;
                }
                $params[] = $_item;
            }
            if ( $sort_by && $sort_by == 'order' && $model == 'urlmapping' && !$app->rebuild_order_compat ) {
                // rebuild_phase.tmpl
                $ordered = [];
                $mapping = [];
                foreach ( $params as $param ) {
                    $mapping[ $param['model'] ] = $param;
                }
                foreach ( $params as $param ) {
                    if (! isset( $param['model'] ) ) {
                        break;
                    }
                    $map_table = $app->db->model( 'table' )->get_by_key( ['name' => $param['model'] ], null, 'order' );
                    if (! $map_table->order ) {
                        $ordered[ $param['model'] ] = 0;
                    } else {
                        $ordered[ $param['model'] ] = $map_table->order;
                    }
                }
                if (! empty( $ordered ) ) {
                    $sort_func = ! $sort_order || $sort_order == 'ascend' ? 'asort' : 'arsort';
                    $sort_func( $ordered );
                    $ordered = array_keys( $ordered );
                    $_params = [];
                    foreach ( $ordered as $ordered_model ) {
                        $_params[] = $mapping[ $ordered_model ];
                    }
                    $params = $_params;
                    unset( $_params, $mapping );
                }
            }
            $ctx->local_params = $params;
        }
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $results = $params[ $counter ];
            foreach ( $results as $key => $value ) {
                $ctx->local_vars['count_group_by_' . $key ] = $value;
            }
            $repeat = true;
        } else {
            unset( $params );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_workspacecontext ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $ctx->local_vars['__total__'] = 1;
        $ctx->local_vars['__counter__'] = $counter;
        if (! $counter ) {
            $ws = $ctx->stash( 'workspace' );
            $ctx->stash( '_orig_workspace', $ws );
            $app = $ctx->app;
            $id = isset( $args['id'] ) ? $args['id'] : null;
            if (! $id ) {
                $id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : null;
            }
            if ( $id ) {
                $ws = $app->db->model( 'workspace' )->load( (int) $id );
                if ( $ws ) {
                    $ctx->stash( 'workspace', $ws );
                } else {
                    $ctx->stash( 'workspace', null );
                }
            }
        } else {
            $ws = $ctx->stash( '_orig_workspace' );
            $ctx->stash( 'workspace', $ws );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_workflowusers ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $workflow = $ctx->stash( 'workflow' );
        $workflow_id = isset( $args['workflow_id'] ) ? $args['workflow_id'] : 0;
        if (! $workflow ) {
            $workflow = $app->db->model( 'workflow' )->load( (int) $workflow_id );
        }
        if (! $workflow ) {
            $repeat = $ctx->false();
            return '';
        }
        if (! is_object( $workflow ) ) {
            $repeat = $ctx->false();
            return '';
        }
        $model = $workflow->model;
        $workspace_id = $workflow->workspace_id;
        if (! $counter ) {
            $orig_args = $args;
            $previous = isset( $args['previous'] ) ? $args['previous'] : false;
            $next = isset( $args['next'] ) ? $args['next'] : false;
            $all = isset( $args['all'] ) ? $args['all'] : false;
            $params = ['lock_out' => 0];
            $args['published_only'] = true;
            if ( $previous || $next || $all ) {
                $group_name = $app->permission_group( $app->user(), $model, $workspace_id );
                $users_draft =
                    $app->get_related_objs( $workflow, 'user', 'users_draft', $args, $params );
                $users_review =
                    $app->get_related_objs( $workflow, 'user', 'users_review', $args, $params );
                $users_publish =
                    $app->get_related_objs( $workflow, 'user', 'users_publish', $args, $params );
                $users = array_merge( $users_draft, $users_review, $users_publish );
                $contains_me = false;
                $object_user_id = isset( $ctx->vars['object_user_id'] )
                                ? $ctx->vars['object_user_id'] : null;
                $my_group = 'previous';
                foreach ( $users as $user ) {
                    if ( $object_user_id == $user->id ) {
                        $my_group = 'next';
                    }
                    if ( $user->id == $app->user()->id ) {
                        $contains_me = true;
                        break;
                    }
                }
                $current_user = $app->user();
                if (! $contains_me ) {
                    if ( $app->mode == 'view' ) {
                        $obj = $ctx->stash( 'object' );
                        if ( $obj && $obj->user_id ) $current_user = $obj->user;
                    }
                    if (! $current_user ) {
                        // User Removed.
                        $current_user = $app->user();
                    }
                    $add_me = false;
                    if ( $workflow->can_assign_you ) {
                        $add_me = true;
                    } else {
                        if ( $next && $workflow->approval_type == 'Parallel' ) {
                            $add_me = true;
                        } else if ( $previous && $workflow->remand_type == 'Parallel' ) {
                            $add_me = true;
                        }
                    }
                    $me = $app->user();
                    if ( $add_me ) {
                        if ( $group_name == 'creator' ) {
                            $me->relation_name = 'users_draft';
                            array_unshift( $users_draft, $me );
                        } else if ( $group_name == 'reviewer' ) {
                            $me->relation_name = 'users_review';
                            array_unshift( $users_review, $me );
                        } else if ( $group_name == 'publisher' ) {
                            $me->relation_name = 'users_publish';
                            array_unshift( $users_publish, $me );
                        }
                        $users = array_merge( $users_draft, $users_review, $users_publish );
                    }
                }
                $single = isset( $args['single'] ) ? $args['single'] : false;
                $match = false;
                if ( $single && $workflow->assoc_only ) {
                    $by_association_col = $app->by_association_col;
                    $assoc_user = $app->user();
                    if ( $by_association_col !== 'user_id' && $app->db->model( $model )->has_column( $by_association_col, true ) ) {
                        // filter used created_by
                        if (! isset( $obj ) && $id = $app->param( 'id' ) ) {
                            $obj = $ctx->stash( 'object' );
                            if (! $obj ) {
                               $obj = $app->db->model( $model )->load( $id );
                            }
                            if ( $obj && $obj->$by_association_col ) {
                                $assoc_user = $app->db->model( 'user' )->load( $obj->$by_association_col );
                            }
                        }
                    }
                    $association_users = $app->association_user_ids( $assoc_user );
                    if ( count( $association_users ) > 1 ) {
                        foreach ( $users as $idx => $user ) {
                            if (! in_array( $user->id, $association_users ) ) {
                                unset( $users[ $idx ] );
                            }
                        }
                        $users = array_values( $users );
                    }
                }
                $same_user_ids = [];
                if (! $single && $app->workflow_bidirectional ) {
                    if ( $group_name === 'creator' ) {
                        $same_users = $users_draft;
                    } else if ( $group_name === 'reviewer' ) {
                        $same_users = $users_review;
                    } else {
                        $same_users = $users_publish;
                    }
                    foreach ( $same_users as $same_user ) {
                        $same_user_ids[ $same_user->id ] = true;
                    }
                }
                if ( $next ) {
                    $_users = [];
                    foreach ( $users as $user ) {
                        if (! is_object( $user ) ) {
                            continue;
                        }
                        if ( $object_user_id && $object_user_id == $user->id ) {
                            if ( $user->id == $current_user->id ) {
                                $match = true;
                            }
                            continue;
                        }
                        if ( $match ) {
                            $_users[] = $user;
                        } else if ( isset( $same_user_ids[ $user->id ] ) ) {
                            $_users[] = $user;
                        }
                        if ( $user->id == $current_user->id ) {
                            $match = true;
                        }
                    }
                    if (! empty( $_users ) ) {
                        if ( $single ) {
                            $user = array_shift( $_users );
                            $users = [ $user ];
                        } else {
                            $users = $_users;
                        }
                    } else {
                        $users = [];
                    }
                } else if ( $previous ) {
                    $_users = [];
                    $match = false;
                    foreach ( $users as $user ) {
                        if (! is_object( $user ) ) {
                            continue;
                        }
                        if (! $match && $user->id != $current_user->id ) {
                            $_users[] = $user;
                        } else if ( isset( $same_user_ids[ $user->id ] ) ) {
                            $_users[] = $user;
                        }
                        if ( $user->id == $current_user->id ) {
                            $match = true;
                            if (! $app->workflow_bidirectional ) {
                                break;
                            }
                        }
                        if ( $app->workflow_bidirectional ) {
                            if ( $match && !isset( $same_user_ids[ $user->id ] ) ) {
                                break;
                            }
                        }
                    }
                    if (! empty( $_users ) ) {
                        if ( $single ) {
                            $user = array_pop( $_users );
                            $users = [ $user ];
                        } else {
                            $users = $_users;
                        }
                    } else {
                        $users = [];
                    }
                }
            } else {
                $type = isset( $args['type'] ) ? $args['type'] : 'users_draft';
                $users = $app->get_related_objs( $workflow, 'user', $type, $params );
            }
            $query_string = $app->query_string();
            $table = $app->get_table( $model );
            if ( $app->param( 'edit_revision' ) ) {
                if ( $table->revisable ) {
                    $permitted_users = [];
                    $workspace = $app->workspace();
                    foreach ( $users as $user ) {
                        $can_revision =
                            $app->can_do( $model, 'revision', null, $workspace, $user );
                        if ( $can_revision ) {
                            $permitted_users[] = $user;
                        }
                    }
                }
                $users = $permitted_users;
            }
            if (! $single && is_object( $current_user ) && $workflow->can_assign_you ) {
                if ( $app->mode == 'list_action' ) {
                    $object_user_id = null;
                }
                if ( $object_user_id && $object_user_id == $current_user->id ) {
                } else {
                    if ( ( $my_group == 'next' && $next ) || ( $my_group == 'previous' && $previous ) ) {
                        if ( $group_name == 'creator' ) {
                            $current_user->relation_name = 'users_draft';
                        } else if ( $group_name == 'reviewer' ) {
                            $current_user->relation_name = 'users_review';
                        } else if ( $group_name == 'publisher' ) {
                            $current_user->relation_name = 'users_publish';
                        }
                        $users[] = $current_user;
                    }
                }
            }
            $me = null;
            $_users = [];
            foreach ( $users as $user ) {
                if ( $user->id == $app->user()->id ) {
                    $me = $user;
                } else {
                    $_users[ $user->id ] = $user;
                }
            }
            if ( $me && $workflow->can_assign_you ) {
                $_users[ $me->id ] = $me;
            }
            $users = array_values( $_users );
            if ( empty( $users ) ) {
                $repeat = $ctx->false();
                return '';
            }
            if (! $single && $workflow->assoc_only ) {
                $by_association_col = $app->by_association_col;
                $assoc_user = $app->user();
                if ( $by_association_col !== 'user_id' && $app->db->model( $model )->has_column( $by_association_col, true ) ) {
                    // filter used created_by
                    if (! isset( $obj ) && $id = $app->param( 'id' ) ) {
                        $obj = $ctx->stash( 'object' );
                        if (! $obj ) {
                           $obj = $app->db->model( $model )->load( $id );
                        }
                        if ( $obj && $obj->$by_association_col ) {
                            $assoc_user = $app->db->model( 'user' )->load( $obj->$by_association_col );
                        }
                    }
                }
                $association_users = $app->association_user_ids( $assoc_user );
                if ( count( $association_users ) > 1 ) {
                    foreach ( $users as $idx => $user ) {
                        if (! in_array( $user->id, $association_users ) ) {
                            unset( $users[ $idx ] );
                        }
                    }
                    $users = array_values( $users );
                }
            }
            $table = $app->get_table( 'user' );
            $callback = ['name' => 'post_load_objects', 'model' => 'user',
                         'table' => $table, 'args' => $orig_args ];
            $count_obj = count( $users );
            $app->init_callbacks( 'user', 'post_load_objects' );
            $app->run_callbacks( $callback, 'user', $users, $count_obj );
            if ( empty( $users ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $ctx->local_params = $users;
        }
        $users = $ctx->local_params;
        if ( empty( $users ) ) {
            $repeat = $ctx->false();
            return '';
        }
        $ctx->set_loop_vars( $counter, $users );
        if ( isset( $users[ $counter ] ) ) {
            $user = $users[ $counter ];
            $user_values = $user->get_values();
            foreach ( $user_values as $key => $value ) {
                if ( stripos( $key, 'password' ) === false )
                    $ctx->local_vars['workflow_' . $key ] = $value;
            }
            $rel_name = $user_values['relation_name'];
            $group_label = 'Publisher';
            if ( $rel_name == 'users_draft' ) {
                $group_label = 'Creator';
            } else if ( $rel_name == 'users_review' ) {
                $group_label = 'Reviewer';
            }
            $ctx->local_vars['workflow_group_label'] = $group_label;
            $repeat = true;
        } else {
            unset( $users );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_archivenext ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $ctx->local_vars['__total__'] = 1;
        $ctx->local_vars['__counter__'] = $counter;
        $localvars = ['archive_date_based', 'archive_date_based_col', 'current_timestamp',
                      'current_timestamp_end', 'current_archive_title', 'current_archive_link',
                      'current_context'];
        $mapping = $ctx->stash( 'current_urlmapping' );
        $container = $mapping->container;
        $localvars[] = $container;
        if (! $counter ) {
            $date_based = $mapping->date_based;
            if (! $container || !$date_based ) {
                $repeat = $ctx->false();
                return '';
            }
            $container_scope = $mapping->container_scope;
            $nextprev_terms = !$container_scope || $mapping->workspace_id ? ['workspace_id' => $mapping->workspace_id ] : [];
            $obj = $app->db->model( $container )->__new();
            $date_col = $app->get_date_col( $obj );
            if (! $date_col ) {
                $repeat = $ctx->false();
                return '';
            }
            if ( $obj->has_column( 'status' ) ) {
                $nextprev_terms['status'] = $app->status_published( $container );
            }
            if ( $obj->has_column( 'rev_type' ) ) {
                $nextprev_terms['rev_type'] = 0;
            }
            $archive_type = $mapping->model;
            if ( $archive_type != 'template' ) {
                $archive_type .= '-' . strtolower( $date_based );
            } else {
                $archive_type = strtolower( $date_based );
            }
            $nextprev = isset( $args['nextprev'] ) ? $args['nextprev'] : 'next';
            $start = $nextprev == 'next' ? $ctx->stash( 'current_timestamp_end' ) : $ctx->stash( 'current_timestamp' );
            $plus_minus = $nextprev == 'next' ? '+' : '-';
            $op = $nextprev == 'next' ? '>=' : '<';
            $direction = $nextprev == 'next' ? 'ascend' : 'descend';
            if ( stripos( $date_based, 'Yearly' ) === false &&
                 stripos( $date_based, 'Monthly' ) === false &&
                 stripos( $date_based, 'Daily' ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $date_based = strtolower( $date_based );
            $op = $nextprev == 'next' ? '>' : '<';
            $start = $obj->ts2db( $start );
            $nextprev_url = $app->db->model( 'urlinfo' )->get_by_key(
              ['archive_type' => $date_based, 'archive_date' => [ $op => $start ], 'urlmapping_id' => $mapping->id ],
              ['sort' => 'archive_date', 'direction' => $direction ], '*' );
            if (! $nextprev_url->id ) {
                $repeat = $ctx->false();
                return '';
            }
            $nextprev_date = $obj->db2ts( $nextprev_url->archive_date );
            $strtotime = strtotime( $nextprev_date );
            if ( stripos( $date_based, 'yearly' ) !== false ) {
                $nextprev_date_end = date('Y1231235959', $strtotime );
            } else if ( stripos( $date_based, 'monthly' ) !== false ) {
                $nextprev_date_end = date('Ymt235959', $strtotime );
            } else if ( stripos( $date_based, 'daily' ) !== false ) {
                $nextprev_date_end = date('Ymd235959', $strtotime );
            }
            $op = $nextprev == 'next' ? '>=' : '<';
            $args = ['sort' => $date_col, 'direction' => $direction, 'limit' => 1];
            if ( $obj->has_column( 'workspace_id' ) ) {
                $args['workspace_id'] = $obj->workspace_id;
            }
            $nextprev_terms[ $date_col ] = $nextprev == 'next' ? [ $op => $nextprev_date ] : [ $op => $start ];
            $nextprev_obj = $obj->load( $nextprev_terms, $args, $date_col );
            if ( empty( $nextprev_obj ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $nextprev_obj = $nextprev_obj[0];
            list( $title, $start, $end ) = $app->title_start_end( $archive_type, $nextprev_date, $mapping );
            $ctx->localize( $localvars );
            $ctx->stash( $container, $nextprev_obj );
            $ctx->stash( 'current_context', $container );
            $ctx->stash( 'archive_date_based', $nextprev_obj->_model );
            $ctx->stash( 'archive_date_based_col', $date_col );
            $ctx->stash( 'current_timestamp', $nextprev_date );
            $ctx->stash( 'current_timestamp_end', $nextprev_date_end );
            $ctx->stash( 'current_archive_title', $title );
            $table = $app->get_table( $container );
            $ctx->stash( 'current_archive_link',
                        $app->build_path_with_map( $nextprev_obj, $mapping, $table, $nextprev_date, true ) );
            $repeat = true;
        } else {
            $repeat = $ctx->false();
            $ctx->restore( $localvars );
        }
        return $content;
    }

    function hdlr_archiveprevious ( $args, $content, $ctx, &$repeat, $counter ) {
        $args['nextprev'] = 'previous';
        return $this->hdlr_archivenext( $args, $content, $ctx, $repeat, $counter );
    }

    function hdlr_objectcontext ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $obj = null;
        if ( isset( $args['model'] ) && isset( $args['id'] ) ) {
            $id = (int) $args['id'];
            $obj = $app->db->model( $args['model'] )->load( $id );
        } else if ( isset( $args['from'] ) && isset( $args['id'] ) ) {
            $id = (int) $args['id'];
            $from = $app->db->model( $args['from'] )->load( $id );
            if ( $from && $from->has_column( 'object_id' )
                    && $from->has_column( 'model' ) ) {
                $object_id = $from->object_id;
                $model = $from->model;
                if ( (! $model || !$object_id ) && isset( $args['force'] ) && $args['force'] ) {
                    $from = $app->db->model( $args['from'] )->load( ['id' => $id ] );
                    if ( is_array( $from ) && count( $from ) ) {
                        $from = $from[0];
                        $object_id = $from->object_id;
                        $model = $from->model;
                    }
                }
                if ( $model && $object_id ) {
                    $obj = $app->db->model( $model )->load( (int) $object_id );
                }
            }
        } else {
            if (! isset( $args['model'] ) ) {
                $obj = $ctx->stash( 'object' );
            }
        }
        if (! $obj ) {
            if ( isset( $args['model'] ) ) {
                $model = $args['model'];
                $obj = $ctx->stash( $model );
            }
        }
        if (! $obj ) {
            return false;
        }
        $var_prefix = isset( $args['prefix'] ) ? $args['prefix'] : 'object';
        $var_prefix .= '_';
        $vars = $obj->get_values();
        if ( $obj->_model === 'template' && $app->linked_file === 2 ) {
            $vars['template_text'] = $obj->_text( $app );
        }
        $colprefix = $obj->_colprefix;
        $ctx->stash( 'current_context', $obj->_model );
        $ctx->stash( $obj->_model, $obj );
        $column_defs = $app->db->scheme[ $obj->_model ]['column_defs'];
        $table = $app->get_table( $obj->_model );
        $primary = $table ? $table->primary : '';
        if (! $primary ) {
            if ( $obj->has_column( 'title' ) ) {
                $primary = 'title';
            } else if ( $obj->has_column( 'name' ) ) {
                $primary = 'name';
            } else if ( $obj->has_column( 'label' ) ) {
                $primary = 'label';
            }
        }
        if ( isset( $ctx->vars['forward_params'] ) ) {
            $column_names = array_keys( $column_defs );
            foreach ( $column_names as $name ) {
                $vars[ $name ] = $app->param( $name );
                if ( $column_defs[ $name ]['type'] == 'datetime' ) {
                    $date = $app->param( $name . '_date' );
                    if ( $date ) {
                        $time = $app->param( $name . '_time' )
                              ? $app->param( $name . '_time' ) : '000000';
                        $vars[ $name ] = $date . $time;
                    }
                }
            }
        }
        $ctx->local_vars['_object_model'] = $obj->_model;
        foreach ( $vars as $col => $value ) {
            if ( $colprefix ) $col = preg_replace( "/^$colprefix/", '', $col );
            if ( isset( $column_defs[ $col ]['type'] )
                && $column_defs[ $col ]['type'] === 'blob' ) {
                if ( $app->db->blob2file ) {
                    $value = $obj->$col ? 1 : ''; // When PADO_DB_BLOB2FILE specified.
                } else {
                    $value = $value ? 1 : '';
                }
            }
            if ( $col == $primary ) {
                $ctx->local_vars['_object_primary'] = $value;
            }
            $ctx->local_vars[ $var_prefix . $col ] = $value;
            if ( $col === 'status' ) {
                if ( $table = $app->get_table( $obj->_model ) ) {
                    $column = $app->db->model( 'column' )->get_by_key(
                        ['table_id' => $table->id, 'name' => 'status'] );
                    $ctx->local_vars['status_options'] = $column->options;
                }
            }
        }
        $scheme = $app->get_scheme_from_db( $obj->_model );
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        if ( isset( $ctx->vars['forward_params'] ) ) {
            foreach ( $relations as $name => $to_obj ) {
                $rels = $app->param( $name );
                $ids = [];
                if ( is_array( $rels ) ) {
                    foreach ( $rels as $id ) {
                        if ( $id ) $ids[] = $id;
                    }
                }
                $ctx->local_vars[ $var_prefix . $name ] = $ids;
            }
        } else {
            if ( $obj->id ) {
                foreach ( $relations as $name => $to_obj ) {
                    $terms = ['from_obj' => $obj->_model, 'from_id' => $obj->id, 
                              'name'     => $name ];
                    if ( $to_obj !== '__any__' ) $terms['to_obj'] = $to_obj;
                    $relations = $app->db->model( 'relation' )->load(
                                                $terms, ['sort' => 'order'] );
                    $ids = [];
                    foreach( $relations as $relation ) {
                        $model = $relation->to_obj;
                        if (! $model ) continue;
                        $ctx->local_vars['object_' . $name . '_model'] = $model;
                        $to_id = (int) $relation->to_id;
                        $rel_obj = $app->db->model( $model )->load( $to_id, null, 'id' );
                        if ( $rel_obj ) $ids[] = $relation->to_id;
                    }
                    $ctx->local_vars[ $var_prefix . $name ] = $ids;
                }
            }
        }
        return true;
    }

    function hdlr_isadmin ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        if ( $app->user() && $app->user()->is_superuser ) {
            return true;
        }
        $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : false;
        if ( $workspace_id ) {
            $permissions = $app->permissions();
            if ( isset( $permissions[ $workspace_id ] ) ) {
                $ws_perms = $permissions[ $workspace_id ];
                if ( is_array( $ws_perms ) && in_array( 'workspace_admin', $ws_perms ) ) {
                    return true;
                }
            }
        }
        $workspace = isset( $args['workspace'] ) ? $args['workspace'] : false;
        if (! $workspace ) 
            $workspace = isset( $args['scope'] )
            && $args['scope'] == 'workspace' ? true : false;
        if ( $workspace ) return $app->can_do( 'workspace' );
        return false;
    }

    function hdlr_ifarchivetype ( $args, $content, $ctx, $repeat, $counter ) {
        if (! isset( $args['archive_type'] ) && ! isset( $args['type'] ) ) {
            return false;
        }
        $type = isset( $args['archive_type'] ) ? $args['archive_type'] : $args['type'];
        if (! $type ) return false;
        $app = $ctx->app;
        $extra = '';
        $ws_attr = $this->include_exclude_workspaces( $app, $args, $app->db->model( 'urlinfo' ) );
        if ( $ws_attr ) {
            $extra = " AND urlinfo_workspace_id {$ws_attr}";
        }
        $terms = ['archive_type' => $type ];
        if (! $extra ) {
            $workspace = $ctx->stash( 'workspace' );
            if ( $workspace ) {
                $terms['workspace_id'] = $workspace->id;
            } else {
                $terms['workspace_id'] = 0;
            }
        }
        $terms['delete_flag'] = 0;
        return $app->db->model( 'urlinfo' )->count( $terms, null, null, $extra );
    }

    function hdlr_ifacceptcomment ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        if (! $app->use_comment ) return false;
        if ( $workspace = $app->workspace() ) {
            $comment_setting = $workspace->accept_comment;
        } else {
            $comment_setting = $app->get_config( 'accept_comment' );
            if (! $comment_setting ) {
                $comment_setting = false;
            } else {
                $comment_setting = $comment_setting->value;
            }
        }
        if (! $comment_setting ) return false;
        $id = isset( $args['id'] ) ? $args['id'] : '';
        $model = isset( $args['model'] ) ? $args['model']
               : $ctx->stash( 'current_context' );
        if ( $id && $model && $app->db->model( $model )->has_column( 'allow_comment' ) ) {
            $obj = $app->db->model( $model )->load( (int) $id, 'id,allow_comment' );
        } else {
            $obj = $ctx->stash( $model );
        }
        if (! is_object( $obj ) ) {
            return false;
        }
        return $obj->has_column( 'allow_comment' ) && $obj->allow_comment;
    }

    function hdlr_ifmodelhasurlmapping ( $args, $content, $ctx, $repeat, $counter ) {
        $workspace_id = isset( $args['workspace_id'] ) ? (int) $args['workspace_id'] : 0;
        $model = isset( $args['model'] ) ? $args['model'] : null;
        if (! $model ) return false;
        $workspace_ids = [];
        if ( $workspace_id ) {
            $workspace_ids = [0, $workspace_id];
        } else {
            $workspace_ids = [0];
        }
        $app = $ctx->app;
        return $app->db->model( 'urlmapping' )->count(
            ['workspace_id' => ['IN' => $workspace_ids ], 'model' => $model ] );
    }

    function hdlr_ifuserrole ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $name = isset( $args['role'] ) ? $args['role'] : '';
        if (! $name ) return false;
        if (!$user = $app->user() ) {
            return false;
        }
        $inherit = isset( $args['inherit'] ) ? $args['inherit'] : '';
        if ( $inherit && $user->is_superuser ) return true;
        $extra = '';
        $ws_attr = $this->include_exclude_workspaces( $app, $args, $app->db->model( 'permission' ) );
        if ( $ws_attr ) {
            $ws_attr = " AND permission_workspace_id {$ws_attr}";
            $extra .= $ws_attr;
        }
        $terms = ['user_id' => $user->id ];
        if ( $app->workspace() ) {
            $workspace_id = (int) $app->workspace()->id;
            if ( $inherit ) {
                $perms = $app->permissions();
                if ( isset( $perms[ $workspace_id ] ) ) {
                    if ( in_array( 'workspace_admin', $perms[ $workspace_id ] ) ) {
                        return true;
                    }
                }
            }
            $terms['workspace_id'] = $workspace_id;
        } else if (! $extra ) {
            $terms['workspace_id'] = 0;
        }
        $permissions = $app->db->model( 'permission' )->load( $terms, [], 'id', $extra );
        if ( is_array( $permissions ) && count( $permissions ) ) {
            foreach ( $permissions as $permission ) {
                $roles = $app->get_related_objs( $permission, 'role', 'roles' );
                foreach ( $roles as $role ) {
                    if ( $role->name == $name ) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function hdlr_ifworkspacemodel ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $model = $args['model'];
        $obj = $app->db->model( $model )->new();
        return $obj->has_column( 'workspace_id' );
    }

    function hdlr_ifhasthumbnail ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $model = $args['model'];
        if (! $model ) return false;
        if ( $model == 'asset' ) return true;
        $scheme = $app->get_scheme_from_db( $model );
        if (! $scheme ) return false;
        $props = $scheme['edit_properties'];
        if ( is_array( $props ) ) {
            foreach ( $props as $prop => $type ) {
                if ( $type == 'file' ) {
                    $options = isset( $scheme['options'] ) ? $scheme['options'] : [];
                    if ( !empty( $options ) ) {
                        if ( isset( $options[ $prop ] )
                            && $options[ $prop ] == 'image' ) {
                            return true;
                        } else {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function hdlr_ifcomponent ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        if ( $app->ifcomponent_compat ) {
        } else {
            $component = strtolower( $args['component'] );
            if ( $component === 'prototype' ) return true;
            if ( isset( $app->plugin_switch[ $component ] ) ) {
                $plugin = $app->plugin_switch[ $component ];
                return $plugin->number;
            }
            return false;
        }
        if ( isset( $args['component'] ) ) {
            $component = $app->component( $args['component'] );
            if ( is_object( $component ) ) {
                return true;
            }
        }
        return false;
    }

    function hdlr_iftagged ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $current_context = $ctx->stash( 'current_context' );
        $obj = $ctx->stash( $current_context );
        if (! $obj ) return false;
        $tag = isset( $args['tag'] ) ? $args['tag'] : '';
        if (! $tag && isset( $args['name'] ) ) $tag = $args['name'];
        if ( $tag ) {
            $terms = ['name' => $tag ];
            if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
                $terms['workspace_id'] = $obj->workspace_id;
            } else {
                $terms['workspace_id'] = 0;
            }
            $tag_obj = $app->db->model( 'tag' )->load( $terms, [], 'id' );
            if (! $tag_obj || empty( $tag_obj ) ) return false;
            $from_id = $obj->id;
            $terms = ['from_obj' => $obj->_model, 'from_id' => $obj->id,
                      'name' => 'tags', 'to_obj' => 'tag', 'to_id' => $tag_obj->id ];
            return $app->db->model( 'relation' )->count( $terms );
        }
        if ( isset( $args['include_private'] ) && $args['include_private'] ) {
            $relations = $app->get_relations( $obj, 'tag' );
            if ( $relations && count( $relations ) ) return true;
        } else {
            $terms = ['from_obj' => $obj->_model, 'from_id'  => $obj->id,
                      'name' => ['not like' => '@%'], 'to_obj' => 'tag'];
            return $app->db->model( 'relation' )->count( $terms );
        }
        return false;
    }

    function hdlr_ifobjectexists ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $model = isset( $args['model'] ) ? $args['model'] : null;
        $column = isset( $args['column'] ) ? $args['column'] : 'id';
        $value = isset( $args['value'] ) ? $args['value'] : null;
        if (! $model ) return false;
        if (! $value ) return false;
        $obj = $app->db->model( $model )->new();
        if (! $obj->has_column( $column ) ) {
            return false;
        }
        $terms = [ $column => $value ];
        $workspace_id = isset( $args['workspace_id'] )
                      ? (int) $args['workspace_id'] : 0;
        if ( $obj->has_column( 'workspace_id' ) ) {
            $workspace_id = (int) $workspace_id;
            $terms['workspace_id'] = $workspace_id;
        }
        $objects = $app->db->model( $model )->load( $terms, ['limit' => 1], 'id' );
        if ( $objects && count( $objects ) ) {
            return true;
        }
        return false;
    }

    function hdlr_ifusercan ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        if ( $user = $app->user() ) {
            $action = isset( $args['action'] ) ? $args['action'] : 'edit';
            $model = isset( $args['model'] ) ? $args['model'] : null;
            $app->init_callbacks( 'permission', 'can_do' );
            $callback = ['name' => 'can_do', 'model' => 'permission', 'tag_args' => $args ];
            $res = $app->run_callbacks( $callback, 'permission', $model, $action );
            if ( $res === false ) return false;
            if ( $user->is_superuser ) return true;
            $permissions = $app->permissions();
            if ( $action === 'any' && isset( $args['workspace_id'] ) ) {
                $workspace_id = (int) $args['workspace_id'];
                return isset( $permissions[ $workspace_id ] );
            } else if ( $action === 'any' ) {
                return !empty( $permissions );
            }
            if ( isset( $args['workspace_id'] )
                && $args['workspace_id'] == 'any' && $model && $action ) {
                if ( empty( $permissions ) ) {
                    return false;
                }
                foreach ( $permissions as $perms ) {
                    if ( in_array( 'workspace_admin', $perms )
                        || in_array( "can_{$action}_{$model}", $perms ) ) {
                        return true;
                    }
                }
            } else {
                if (! isset( $workspace_id ) ) {
                    $workspace_id = isset( $args['workspace_id'] ) ? (int) $args['workspace_id'] : 0;
                    if ( $action == 'create' ) {
                        $table = $app->get_table( $model );
                        if (! $table->display_space ) {
                            // Only can create in System.
                            $workspace_id = 0;
                        }
                    }
                }
            }
            $workspace_id = isset( $workspace_id ) ? (int) $workspace_id : 0;
            $id = isset( $args['id'] ) ? (int) $args['id'] : null;
            $obj = null;
            $workspace = null;
            if ( $model ) {
                // TODO SELECT Cols
                $obj = $id ? $app->db->model( $model )->load( $id )
                           : $app->db->model( $model )->new();
                if (! $obj ) $obj = $app->db->model( $model )->new();
                if (! $obj->id && $workspace_id && $obj->has_column( 'workspace_id' ) ) {
                    $obj->workspace_id( $workspace_id );
                }
                if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
                    $workspace = $obj->workspace;
                }
            }
            if ( $workspace_id && ! $workspace ) {
                $workspace = $app->db->model( 'workspace' )->load( $workspace_id );
            }
            if ( $action == 'list' ) {
                $table = $app->get_table( $model );
                if (! $table ) {
                    return false;
                }
                if ( $table->dialog_view && !isset( $args['no_dialog_view'] ) ) {
                    return true;
                }
                if (! $workspace ) {
                    if ( $table->hierarchy ) {
                        return $app->can_do( $model, $action, $obj, $workspace );
                    }
                    foreach ( $permissions as $ws_id => $permission ) {
                        if ( in_array( "can_list_{$model}", $permission )
                            || in_array( 'workspace_admin', $permission ) ) {
                            return true;
                        }
                    }
                }
            }
            if (! $workspace ) 
                $workspace = $app->db->model( 'workspace' )->new( ['id' => 0 ] );
            return $app->can_do( $model, $action, $obj, $workspace );
        }
        return false;
    }

    function hdlr_ifformisopen ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $id = isset( $args['id'] ) ? (int) $args['id'] : null;
        if (! $id && isset( $args['form_id'] ) ) {
            $id = (int) $args['form_id'];
        }
        $form = $id ? $app->db->model( 'form' )->load( $id, null, 'contact_limit,status' ) : $ctx->stash( 'form' );
        if (! $form ) {
            return false;
        }
        if ( $form->status == 5 ) {
            return false;
        }
        if ( $app->ifformisopen_compat ) {
            if ( $form->status != 4 ) {
                $preview_template = $ctx->stash( 'preview_template' );
                if ( $app->in_preview && ! $preview_template ) {
                    return true;
                }
                return false; // When unpublished Form and not in preview mode.
            }
        }
        if ( $form->contact_limit ) {
            $contacts = $app->db->model( 'contact' )->count( ['form_id' => $form->id ] );
            if ( $contacts >= $form->contact_limit ) {
                return false;
            }
        }
        return true;
    }

    function hdlr_ifuseragent ( $args, $content, $ctx, $repeat, $counter ) {
        $agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
        if (! $agent ) {
            if ( isset( $args['cli'] ) ) {
                if (! $args['cli'] || $args['cli'] == 'false' ) {
                    return false;
                }
                return true;
            }
            return false;
        }
        $wants = isset( $args['wants'] ) ? strtolower( $args['wants'] ) : '';
        if (! $wants ) {
            $args['value'] = $agent;
            return $ctx->conditional_if( $args, $content, $ctx, $repeat, true );
        } else if ( $wants !== 'mobile' && $wants !== 'smartphone' && $wants !== 'pc'
            && $wants !== 'tablet' && $wants !== 'featurephone' ) {
            return true;
        }
        require_once( LIB_DIR . 'Mobile-Detect' . DS .'Mobile_Detect.php' );
        $detect = new Mobile_Detect;
        if ( $wants == 'mobile' ) {
            return $detect->isMobile();
        } else if ( $wants == 'smartphone' ) {
            return $detect->isMobile() && !$detect->isTablet();
        } else if ( $wants == 'tablet' ) {
            return $detect->isTablet();
        } else if ( $wants == 'featurephone' ) {
            return $this->is_featurephone( $agent );
        } else if ( $wants == 'pc' ) {
            if ( $this->is_featurephone( $agent ) || $detect->isMobile() ) {
                return false;
            }
            return true;
        }
        return false;
    }

    function is_featurephone ( $agent ) {
        if ( strpos( $agent, 'DoCoMo' ) !== false ) {
            return 'DoCoMo';
        } else if ( preg_match("/^KDDI\-/i", $agent ) ) {
            return 'KDDI';
        } else if ( preg_match("/^(J\-PHONE|Vodafone|MOT\-[CV]|SoftBank)/i", $agent ) ) {
            return 'SoftBank';
        }
        return false;
    }

    function hdlr_phpstart ( $args, $ctx ) {
        return '<?php';
    }

    function hdlr_phpend ( $args, $ctx ) {
        return '?>';
    }

    function hdlr_mtime ( $args, $ctx ) {
        $app = $ctx->app;
        $f = isset( $args['file'] ) ? $args['file'] : '';
        $m = isset( $args['module'] ) ? $args['module'] : '';
        $b = isset( $args['basename'] ) ? $args['basename'] : '';
        if (! $f && ! $m && ! $b ) return '';
        $mtime = '';
        $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : 0;
        $workspace = $ctx->stash( 'workspace' );
        if (! $workspace_id && $workspace ) {
            $workspace_id = $workspace->id;
        }
        $args['workspace_id'] = $workspace_id;
        ob_start();
        print_r( $args );
        $cache_key = 'mtime_' . md5( ob_get_clean() );
        if ( $app->stash( $cache_key ) !== null ) {
            return $app->stash( $cache_key );
        }
        if ( $f ) {
            $f = str_replace( '/', DS, $f );
            $site_path = $workspace ? $workspace->site_path : $ctx->app->site_path;
            if ( file_exists( $site_path . DS . $f ) ) {
                $f = $site_path . DS . $f;
            } else {
                $sep = preg_quote( DS, '/' );
                $template_paths = $app->template_paths;
                foreach ( $template_paths as $path ) {
                    $path = preg_replace( "/$sep$/", '', $path ) . DS;
                    if ( file_exists( $path . $f ) ) {
                        $f = $path . $f;
                        $ctx->template_paths[ $f ] = filemtime( $f );
                        break;
                    }
                }
                if (!$f = $ctx->get_template_path( $f ) ) return '';
            }
            $mtime = filemtime( $f );
        } else {
            $current_context = $ctx->stash( 'current_context' );
            $obj = $ctx->stash( $current_context );
            $terms = $m ? ['name' => $m, 'status' => 2, 'rev_type' => 0]
                        : ['basename' => $b, 'status' => 2, 'rev_type' => 0];
            $tmpl = [];
            $current_template = $ctx->stash( 'current_template' );
            $template_workspace_id = 0;
            if ( $workspace_id ) {
                $terms['workspace_id'] = ['IN' => [0, $workspace_id ] ];
                $tmpl = $app->db->model( 'template' )->load(
                    $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1] );
            }
            if ( empty( $tmpl ) && $current_template &&
                $workspace_id != $current_template->workspace_id ) {
                if ( $ws_id = $current_template->workspace_id ) {
                    $terms['workspace_id'] = ['IN' => [0, $ws_id ] ];
                    $tmpl = $app->db->model( 'template' )->load(
                        $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1] );
                }
            } else if ( empty( $tmpl ) ) {
                $tmpl = $app->db->model( 'template' )->load(
                    ['name' => $m, 'workspace_id' => 0, 'status' => 2, 'rev_type' => 0 ] );
            }
            if ( empty( $tmpl ) ) return '';
            $tmpl = $tmpl[0];
            $mtime = strtotime( $tmpl->modified_on );
        }
        if ( isset( $args['format'] ) && $args['format'] ) {
            $mtime = date( $args['format'], $mtime );
        }
        $app->stash( $cache_key, $mtime );
        return $mtime;
    }

    function hdlr_getregistry ( $args, $ctx ) {
        $app = $ctx->app;
        if (! isset( $args['registry'] )
          || !isset( $args['id'] ) || !isset( $args['key'] ) ) {
            return '';
        }
        $registry = $args['registry'];
        $registries = $app->registry;
        if (! isset( $registries[ $registry ] ) ) return '';
        $id = $args['id'];
        if ( isset( $registries[ $registry ][ $id ] ) ) {
            $key = $args['key'];
            if ( isset( $registries[ $registry ][ $id ][ $key ] ) ) {
                return $registries[ $registry ][ $id ][ $key ];
            }
        }
        return '';
    }

    function hdlr_objectcount ( $args, $ctx ) {
        if (! isset( $args['model'] ) ) {
            return 0;
        }
        $app = $ctx->app;
        $model = $args['model'];
        $table = $app->get_table( $model );
        if (! $table ) return 0;
        $obj = $app->db->model( $model );
        $extra = '';
        if ( $obj->has_column( 'workspace_id' ) ) {
            $ws_attr = $this->include_exclude_workspaces( $app, $args, $obj );
            if ( $ws_attr ) {
                $extra = " AND {$model}_workspace_id {$ws_attr}";
            }
        }
        return $obj->count( null, null, 'id', $extra );
    }

    function hdlr_modelproperty ( $args, $ctx ) {
        $app = $ctx->app;
        if (! isset( $args['name'] ) || ! isset( $args['property'] ) ) {
            return '';
        }
        $table = $app->get_table( $args['name'] );
        if (! $table ) return '';
        $property = $args['property'];
        return $table->$property === null ? '' : $table->$property;
    }

    function hdlr_get_objectpath ( $args, $ctx ) {
        $app = $ctx->app;
        $db = $app->db;
        $this_tag = $args['this_tag'];
        $current_context = $ctx->stash( 'current_context' );
        $obj = $ctx->stash( $current_context );
        $current_prefix = $current_context ? preg_replace( '/[^a-z0-9]/', '' , $current_context ) : '';
        if (! $current_prefix || strpos( $this_tag, $current_prefix ) !== 0 ) {
            $current_context = preg_replace( '/path$/', '', $this_tag );
            $table_abbrs_map = $ctx->stash( 'table_abbrs_map' );
            if ( is_array( $table_abbrs_map ) && isset( $table_abbrs_map[ $current_context ] ) ) {
                $current_context = $table_abbrs_map[ $current_context ];
            }
            if ( $ctx->stash( $current_context ) ) {
                $obj = $ctx->stash( $current_context );
            }
        }
        if (!$obj || !$obj->id ) return '';
        $column = isset( $args['column'] ) ? $args['column'] : 'basename';
        if (! $column || ! $obj->has_column( $column ) ) {
            $table = $app->get_table( $obj->_model );
            $column = $table->primary;
            if (! $column ) {
                $column = 'id';
            }
        }
        $separator = isset( $args['separator'] ) ? $args['separator'] : '/'; // Compat.
        $separator = isset( $args['delimiter'] ) ? $args['delimiter'] : $separator;
        $cache_key = 'objectpath_' . $column . '_' . $separator
                   . '_' . $current_context . '_' . $obj->id;
        if ( $app->stash( $cache_key ) ) {
            return $app->stash( $cache_key );
        }
        $parent = $obj;
        if ( $parent->$column === null || $parent->parent_id === null ) {
            $caching = $db->caching;
            $db->caching = false;
            $parent = $db->model( $current_context )->get_by_key
                ( ['id' => $obj->id ], ['limit' => 1], "id,{$column},parent_id" );
            $db->caching = $caching;
        }
        $paths = [ $parent->$column ];
        while ( $parent !== null ) {
            if ( $parent_id = $parent->parent_id ) {
                $parent_id = (int) $parent_id;
                $parent = $db->model( $current_context )->load( $parent_id, [], "id,{$column},parent_id" );
                if ( $parent ) {
                    if ( $parent->$column === null || $parent->parent_id === null ) {
                        $caching = $app->db->caching;
                        $db->caching = false;
                        $parent = $db->model( $current_context )->get_by_key
                            ( ['id' => $parent_id ], ['limit' => 1], "id,{$column},parent_id" );
                        $db->caching = $caching;
                    }
                    array_unshift( $paths, $parent->$column );
                } else {
                    $parent = null;
                    break;
                }
            } else {
                $parent = null;
                break;
            }
        }
        $path = implode( $separator, $paths );
        $app->stash( $cache_key, $path );
        return $path;
    }

    function hdlr_geturlprimary ( $args, $ctx ) {
        $app = $ctx->app;
        $id = isset( $args['id'] ) ? (int) $args['id'] : null;
        if (! $id ) return '';
        $url = $app->db->model( 'urlinfo' )->load( $id, ['limit' =>1], 'model,object_id' );
        if (! $url ) return '(null)';
        if (! $url->model && ! $url->object_id ) {
            return '(null)';
        }
        $table = $app->get_table( $url->model );
        if (! $table ) return '(null)';
        $primary = $table->primary;
        $cols = "id,{$primary}";
        $id = (int) $url->object_id;
        $object = $app->db->model( $url->model )->get_by_key(
            ['id' => $id ], ['limit' => 1], $cols );
        $name = $object->$primary ? $object->$primary : "null(id:{$id})";
        return $name;
    }

    function hdlr_getactivity ( $args, $ctx ) {
        $app = $ctx->app;
        $from = isset( $args['from'] ) && $args['from'] ? $args['from'] : date( "YmdHis" );
        $model = isset( $args['model'] ) ? $args['model'] : 'log';
        $error_log = $model === 'error_log';
        $model = $error_log ? 'log' : $model;
        $column = isset( $args['column'] ) ? $args['column'] : 'created_on';
        $limit = isset( $args['limit'] ) ? $args['limit'] : 30;
        $limit += 0;
        if (! $limit ) return '';
        if ( preg_match( '/235959$/', $from ) && $limit == 30 ) {
            $last = $ctx->modifier_format_ts( $from, 'Ymt', $ctx ) . '235959';
            if ( $last == $from ) {
                preg_match( '/([0-9]{2})235959$/', $from, $matches );
                if ( is_array( $matches ) && isset( $matches[1] ) ) {
                    $limit = (int) $matches[1];
                }
                $from = date( 'YmdHis',strtotime( $from ) + 1 );
            }
        }
        $sort_order = isset( $args['sort_order'] ) ? $args['sort_order'] : 'decend';
        $glue = isset( $args['glue'] ) ? $args['glue'] : ',';
        $data = isset( $args['data'] ) ? $args['data'] : '';
        $key = isset( $args['key'] ) ? $args['key'] : '';
        $sort_order = strtolower( $sort_order );
        $sort_order = $sort_order == 'ascend' ? 'ASC' : 'DESC';
        $format = 'YmdHis';
        $table = $app->get_table( $model );
        if (! $table ) return '';
        $obj = $app->db->model( $model );
        if (! $obj->has_column( $column ) ) return '';
        $from = preg_replace( "/[^0-9]/", '', $from );
        if (! preg_match( "/^[0-9]{14}$/", $from ) ) {
            $from = date( "YmdHis" );
        }
        $_from = $obj->ts2db( $from );
        $extra = '';
        $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : '';
        if ( $workspace_id && $obj->has_column( 'workspace_id' ) ) {
            $workspace_id += 0;
            $extra = " WHERE {$model}_workspace_id={$workspace_id} ";
            $extra.= " AND {$model}_{$column}<='{$_from}' ";
        } else {
            $extra = " WHERE {$model}_{$column}<='{$_from}' ";
        }
        if ( $table->revisable ) {
            $extra.= " AND {$model}_rev_type=0 ";
        }
        if ( $error_log ) {
            $extra.= " AND log_level=4 ";
        }
        $dbprefix = DB_PREFIX;
        $sql = "SELECT DATE_FORMAT({$model}_{$column}, '%Y%m%d000000') AS time, COUNT(*) ";
        $sql.= "AS count FROM mt_{$model} {$extra} GROUP BY DATE_FORMAT({$model}_{$column}, '%Y%m%d000000') ";
        $sql.= "ORDER BY time {$sort_order} LIMIT {$limit}";
        $activities = $obj->load( $sql );
        $_activities = [];
        foreach ( $activities as $activity ) {
            $values = $activity->get_values();
            if ( isset( $values['time'] ) ) {
                $_activities[ $values['time'] ] = (int) $values['count'];
            } else if ( isset( $values["{$model}_time"] ) ) {
                $_activities[ $values["{$model}_time"] ] = (int) $values["{$model}_count"];
            }
        }
        $stmt = '-';
        $from = substr( $from, 0, 8 );
        $tmp_time = "{$from}000000";
        for ( $i = 0; $i < $limit; $i++ ) {
            $next = date( "YmdHis", strtotime("{$tmp_time} {$stmt}1 day" ));
            if (! isset( $_activities[ $next ] ) ) {
                $_activities[ $next ] = 0;
            }
            $tmp_time = $next;
        }
        if ( $sort_order == 'ASC' ) {
            ksort( $_activities );
        } else {
            krsort( $_activities );
        }
        $activities = [];
        foreach ( $_activities as $time => $count ) {
            $time = date( $format, strtotime( $time ) );
            $activities["'{$time}'"] = $count;
        }
        if ( $limit < count( $activities ) ) {
            if ( $sort_order == 'DESC' ) {
                $activities = array_slice( $activities, 0, $limit );
            } else {
                $offset = count( $activities ) - $limit - 1;
                $activities = array_slice( $activities, $offset, null );
            }
        }
        if ( $sort_order == 'ASC' ) {
            krsort( $activities );
        } else {
            ksort( $activities );
        }
        $_activities = [];
        $format = isset( $args['format'] ) ? $args['format'] : 'm/d';
        foreach ( $activities as $ts => $count ) {
            $ts = date( $format, strtotime( trim( $ts, "'" ) ) );
            $_activities["'{$ts}'"] = $count;
        }
        $activities = $_activities;
        if ( $key ) {
            return implode( $glue, array_keys( $activities ) );
        } else if ( $data ) {
            return implode( $glue, array_values( $activities ) );
        } else {
            return implode( $glue, array_keys( $activities ) );
        }
    }

    function hdlr_customfieldvalues ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $localvars = ['customfield_value'];
        if (! $counter ) {
            $model = isset( $args['model'] ) ? $args['model'] : '';
            if (! $model ) {
                $model = $ctx->stash( 'current_context' );
            }
            $basename = isset( $args['basename'] ) ? $args['basename'] : '';
            if (! $model || ! $basename ) {
                $repeat = $ctx->false();
                return '';
            }
            $obj = $ctx->stash( $model );
            if (! $obj ) {
                $repeat = $ctx->false();
                return '';
            }
            $meta = $obj->_customfields;
            if ( $meta === null ) {
                $app->get_meta( $obj, 'customfield', true );
                $meta = $obj->_customfields;
            }
            if (! $meta || empty( $meta ) ) {
                $repeat = $ctx->false();
                return '';
            }
            if ( isset( $meta[ $basename ] ) ) {
                $meta = $meta[ $basename ];
            } else {
                $repeat = $ctx->false();
                return '';
            }
            $index = isset( $args['index'] ) ? (int) $args['index'] : null;
            if ( $index !== null ) {
                if (! isset( $meta[ $index ] ) ) {
                    $repeat = $ctx->false();
                    return '';
                } else {
                    $meta = [ $meta[ $index ] ];
                }
            }
            $params = [];
            foreach ( $meta as $field ) {
                $text = $field->text;
                if (! $text ) continue;
                $json = json_decode( $text, true );
                if ( $json !== null && count( $json ) == 1 ) {
                    $key = array_keys( $json )[0];
                    $value = $json[ $key ];
                    if ( is_array( $value ) ) {
                        $params = array_merge( $params, $value );
                    } else {
                        $params[] = $value;
                    }
                } else if ( $json !== null ) {
                    $params[] = $text;
                }
            }
            $ctx->localize( $localvars );
            $ctx->local_params = $params;
        }
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $value = $params[ $counter ];
            $ctx->stash( 'customfield_value', $value );
            $ctx->local_vars['__key__'] = $counter;
            $ctx->local_vars['__value__'] = $value;
            $repeat = true;
        } else {
            unset( $params );
            $ctx->restore( $localvars );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_currenturlmappingvalue ( $args, $ctx ) {
        $mapping = $ctx->stash( 'current_urlmapping' );
        $column = isset( $args['column'] ) ? $args['column'] : 'model';
        if (! $mapping ) return '';
        if ( $mapping->has_column( $column ) && $mapping->$column ) {
            return $mapping->$column;
        }
        return '';
    }

    function hdlr_websiteid ( $args, $ctx ) {
        $workspace = $ctx->stash( 'workspace' );
        return $workspace ? $workspace->id : '0';
    }

    function hdlr_websitename ( $args, $ctx ) {
        $workspace = $ctx->stash( 'workspace' );
        return $workspace ? $workspace->name : $ctx->app->appname;
    }

    function hdlr_websiteurl ( $args, $ctx ) {
        $workspace = $ctx->stash( 'workspace' );
        return $workspace ? $workspace->site_url : $ctx->app->site_url;
    }

    function hdlr_websitepath ( $args, $ctx ) {
        $workspace = $ctx->stash( 'workspace' );
        return $workspace ? $workspace->site_path : $ctx->app->site_path;
    }

    function hdlr_websitelanguage ( $args, $ctx ) {
        $workspace = $ctx->stash( 'workspace' );
        return $workspace ? $workspace->language : $ctx->app->sys_language;
    }

    function hdlr_websitecopyright ( $args, $ctx ) {
        $workspace = $ctx->stash( 'workspace' );
        return $workspace ? $workspace->copyright : $ctx->app->copyright;
    }

    function hdlr_websitedescription ( $args, $ctx ) {
        $workspace = $ctx->stash( 'workspace' );
        if ( $workspace ) {
            return $workspace->description;
        }
        $description = $ctx->app->get_config( 'description' );
        if ( is_object( $description ) ) return $description->value;
        return '';
    }

    function hdlr_websitepublishtype ( $args, $ctx ) {
        $app = $ctx->app;
        if ( $app->publish_type ) {
            return $app->publish_type;
        }
        $workspace = $ctx->stash( 'workspace' );
        $id = $workspace ? $workspace->id : 0;
        $urlmapping = $app->db->model( 'urlmapping' )->get_by_key(
            ['workspace_id' => $id, 'mapping' => 'index.html'], ['limit' => 1], 'id,publish_file' );
        if ( $urlmapping->id ) return $urlmapping->publish_file;
        return 1;
    }

    function hdlr_hex2rgba ( $args, $ctx ) {
        $color_code = isset( $args['hex'] ) ? $args['hex'] : '';
        $alpha = isset( $args['alpha'] ) ? $args['alpha'] : 0.5;
        $color_code = preg_replace( '/#/', '', $color_code );
        $rgba_code = [];
        $rgba_code['red']   = hexdec( substr( $color_code, 0, 2 ) );
        $rgba_code['green'] = hexdec( substr( $color_code, 2, 2 ) );
        $rgba_code['blue']  = hexdec( substr( $color_code, 4, 2 ) );
        $rgba_code['alpha'] = $alpha;
        return implode( ',', $rgba_code );
    }

    function hdlr_pluginsetting ( $args, $ctx ) {
        $app = $ctx->app;
        $component = isset( $args['component'] ) ? $args['component'] : '';
        $name = isset( $args['name'] ) ? $args['name'] : '';
        if (! $component || ! $name ) return '';
        $component = $app->component( $component );
        if (! $component ) return '';
        $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : 0;
        $value = $component->get_config_value( $name, (int) $workspace_id );
        return $value === null ? '' : $value;
    }

    function hdlr_customfieldcount ( $args, $ctx ) {
        $model = isset( $args['model'] ) ? $args['model'] : '';
        $basename = isset( $args['basename'] ) ? $args['basename'] : '';
        if (! $model ) {
            return 0;
        }
        $obj = $ctx->stash( $model );
        if (! $obj ) return 0;
        $meta = $obj->_customfields;
        $app = $ctx->app;
        if ( $meta === null ) {
            $app->get_meta( $obj, 'customfield', true );
            $meta = $obj->_customfields;
        }
        if ( $basename && isset( $meta[ $basename ] ) ) {
            return count( $meta[ $basename ] );
        } else if (! $basename ) {
            $cf_count = 0;
            foreach ( $meta as $m ) {
                $cf_count += count( $m ); 
            }
            return $cf_count;
        }
        return 0;
    }

    function hdlr_customfieldvalue ( $args, $ctx ) {
        $app = $ctx->app;
        if (! isset( $args['name'] ) && isset( $args['key'] ) ) {
            $args['name'] = $args['key'];
        }
        if ( $ctx->stash( 'customfield_value' ) ) {
            if ( isset( $args['name'] ) && $args['name'] ) {
                $json = json_decode( $ctx->stash( 'customfield_value' ), true );
                if ( $json !== null && isset( $json[ $args['name'] ] ) ) {
                    $value = $json[ $args['name'] ];
                    if ( isset( $args['index'] ) && is_array( $value ) ) {
                        $index = (int) $args['index'];
                        return isset( $value[ $index ] ) ? $value[ $index ] : '';
                    }
                    return is_array( $value ) ? json_encode( $value ) : $value;
                }
                if ( isset( $args['default'] ) ) return $args['default'];
            }
            return $ctx->stash( 'customfield_value' );
        }
        $model = isset( $args['model'] ) ? $args['model'] : $ctx->stash( 'current_context' );
        $basename = isset( $args['basename'] ) ? $args['basename'] : '';
        if (! $model || ! $basename ) {
            return '';
        }
        $obj = $ctx->stash( $model );
        if (! $obj ) return '';
        $meta = $obj->_customfields;
        if ( $meta === null ) {
            $app->get_meta( $obj, 'customfield', true );
            $meta = $obj->_customfields;
        }
        if (! $meta || empty( $meta ) ) {
            return '';
        }
        if ( isset( $meta[ $basename ] ) ) {
            $index = isset( $args['index'] ) ? (int) $args['index'] : 0;
            if (! isset( $meta[ $basename ][ $index ] ) ) return '';
            $meta = $meta[ $basename ][ $index ];
            $text = $meta->text;
            $json = json_decode( $text, true );
            if ( $json !== null && count( $json ) == 1 ) {
                $key = array_keys( $json )[0];
                if ( is_string( $json[ $key ] ) ) {
                    return $json[ $key ];
                } else if ( is_array( $json[ $key ] ) ) {
                    return json_encode( $json[ $key ] );
                }
                return $json[ $key ];
            } else if ( $json !== null && isset( $args['name'] )
                && isset( $json[ $args['name'] ] ) ) {
                if ( is_array( $json[ $args['name'] ] ) ) {
                    return json_encode( $json[ $args['name'] ] );
                }
                return $json[ $args['name'] ];
            } else if ( $json !== null && isset( $args['name'] )
                && !isset( $json[ $args['name'] ] ) && isset( $args['default'] ) ) {
                return $args['default'];
            }
            return $text;
        }
        return '';
    }

    function hdlr_setrolecolumns ( $args, $ctx ) {
        $data = isset( $args['data'] ) ? $args['data'] : '';
        if ( $data ) {
            $data = json_decode( $data, true );
            foreach ( $data as $model => $cols ) {
                if ( is_string( $cols ) && $cols == 'all' ) {
                    $ctx->local_vars["columns_all_{$model}"] = 1;
                } else {
                    foreach ( $cols as $col ) {
                        if ( is_string( $col ) ) {
                            $ctx->local_vars["columns_{$model}_{$col}"] = 1;
                        }
                    }
                }
            }
        }
        return '';
    }

    function hdlr_archivetitle ( $args, $ctx ) {
        $app = $ctx->app;
        $fmt = isset( $args['format'] ) ? $args['format'] : 0;
        $format_ts = isset( $args['format_ts'] ) ? $args['format_ts'] : 0;
        $title = $ctx->stash( 'current_archive_title' );
        if (! $title ) {
            return '';
        }
        $ts = $title;
        $ts = preg_replace( "/[^0-9]/", '', $ts );
        $at = $ctx->stash( 'current_archive_type' );
        $achive_date_based = ['yearly', 'fiscal-yearly', 'monthly', 'daily'];
        $date_based = $ctx->stash( 'archive_date_based' );
        if (! $date_based && !in_array( $at, $achive_date_based ) ) {
            return $title;
        }
        if (! $format_ts && !$fmt ) {
            if ( $at === 'monthly' ) {
                $fmt = $app->translate( 'F, Y' );
                if ( strlen( $ts ) === 6 ) {
                    $ts .= '01000000';
                }
            } else if ( $at === 'yearly' ) {
                $fmt = $app->translate( 'Y' );
                if ( strlen( $ts ) === 4 ) {
                    $ts .= '0101000000';
                }
            } else if ( $at === 'fiscal-yearly' ) {
                $fmt = $app->translate( '\F\i\s\c\a\l Y' );
                if ( strlen( $ts ) === 4 ) {
                    $ts .= '0101000000';
                }
            } else if ( $at === 'daily' ) {
                $fmt = $app->translate( 'F d, Y' );
                if ( strlen( $ts ) === 8 ) {
                    $ts .= '000000';
                }
            }
        } else if ( strpos( $at, 'yearly' ) !== false && strlen( $ts ) === 4 ) {
            $ts .= '0101000000';
            if (! $fmt ) {
                $fmt = $at == 'yearly' ? $app->translate( 'Y' ) : $app->translate( '\F\i\s\c\a\l Y' );
            }
        } else if ( $at == 'monthly' && strlen( $ts ) === 6 ) {
            $ts .= '01000000';
            if (! $fmt ) {
                $fmt = $app->translate( 'F, Y' );
            }
        } else if ( $at == 'daily' && strlen( $ts ) === 8 ) {
            $ts .= '000000';
            if (! $fmt ) {
                $fmt = $app->translate( 'F d, Y' );
            }
        }
        if ( $fmt && ! $format_ts ) {
            $args['ts'] = $ts;
            $args['format'] = $fmt;
            $ts = $ctx->function_date( $args, $ctx );
        }
        return $ts;
    }

    function hdlr_archivedescription ( $args, $ctx ) {
        $app = $ctx->app;
        $current_context = $ctx->stash( 'current_context' );
        $obj = $current_context ? $ctx->stash( $current_context ) : $ctx->stash( 'current_object' );
        if (! $obj ) {
            return '';
        }
        $cols = $app->description_cols;
        $description  = null;
        foreach ( $cols as $col ) {
            if ( $obj->has_column( $col, true ) && $obj->$col ) {
                $description = $obj->$col;
                break;
            }
        }
        if (! $description ) {
            $workspace = null;
            if ( $obj->has_column( 'workspace_id' ) ) {
                $workspace = $obj->workspace;
            }
            $description = $workspace ? $workspace->description : $app->description;
        }
        return $description === null ? '' : $description;
    }

    function hdlr_archiveogimage ( $args, $ctx ) {
        $app = $ctx->app;
        $current_context = $ctx->stash( 'current_context' );
        $obj = $current_context ? $ctx->stash( $current_context ) : $ctx->stash( 'current_object' );
        if (! $obj ) {
            return '';
        }
        $scheme = $app->get_scheme_from_db( $obj->_model );
        $column_defs = $scheme['column_defs'];
        $edit_properties = $scheme['edit_properties'] ?? [];
        $image_cols = [];
        foreach ( $edit_properties as $name => $prop ) {
            if ( $prop == 'file' ) {
                $image_cols[] = $name;
            } else if ( strpos( $prop, 'relation:attachmentfile:' ) === 0 ) {
                $image_cols[] = $name;
            } else if ( strpos( $prop, 'relation:asset:' ) === 0 ) {
                $image_cols[] = $name;
            }
        }
        $og_image = '';
        foreach ( $image_cols as $image_col ) {
            $column_def = $column_defs[ $image_col ];
            $edit = $edit_properties[ $image_col ];
            if ( $column_def['type'] === 'blob' ) {
                $urls = $app->db->model( 'urlinfo' )->load( ['class' => 'file',
                                                             'object_id' => $obj->id,
                                                             'model' => $obj->_model,
                                                             'key' => $image_col ],
                                                            ['limit' => 1,
                                                             'sort' => ['delete_flag' => 'ascend', 'id' => 'descend'] ],
                                                             'file_path,url' );
                if (! empty( $urls ) ) {
                    $url = $urls[0];
                    $extension = PTUtil::get_extension( $url->file_path, true );
                    if ( in_array( $extension, $app->images ) ) {
                        $og_image = $url->url;
                        break;
                    }
                }
            } else if ( $column_def['type'] == 'int' && $obj->$image_col ) {
                $rel_model = 'asset';
                if ( strpos( $edit, 'relation:attachmentfile:' ) === 0 ) {
                    $rel_model = 'attachmentfile';
                }
                $asset = $app->db->model( $rel_model )->load( (int) $obj->$image_col, null, 'id' );
                if ( $asset ) {
                    $permalink = $app->get_permalink( $asset );
                    $extension = PTUtil::get_extension( $permalink, true );
                    if ( in_array( $extension, $app->images ) ) {
                        $og_image = $permalink;
                        break;
                    }
                }
            } else {
                $rel_model = 'asset';
                if ( strpos( $edit, 'relation:attachmentfile:' ) === 0 ) {
                    $rel_model = 'attachmentfile';
                }
                $assets = $app->get_related_objs( $obj, $rel_model, $image_col, null, null, 'id' );
                foreach ( $assets as $asset ) {
                    $permalink = $app->get_permalink( $asset );
                    $extension = PTUtil::get_extension( $permalink, true );
                    if ( in_array( $extension, $app->images ) ) {
                        $og_image = $permalink;
                        break 2;
                    }
                }
            }
        }
        if (! $og_image && $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
            $urls = $app->db->model( 'urlinfo' )->load( ['class' => 'file',
                                                         'object_id' => $obj->workspace_id,
                                                         'model' => 'workspace',
                                                         'key' => 'image' ],
                                                        ['limit' => 1,
                                                         'sort' => ['delete_flag' => 'ascend', 'id' => 'descend'] ],
                                                         'url' );
            if (! empty( $urls ) ) {
                $url = $urls[0];
                $og_image = $url->url;
            }
        }
        return $og_image;
    }

    function hdlr_getchildrenids ( $args, $ctx ) {
        $app = $ctx->app;
        $id = isset( $args['id'] ) ? (int) $args['id'] : null;
        $model = isset( $args['model'] ) ? $args['model'] : null;
        if (! $id || ! $model ) return [];
        $obj = $app->db->model( $model )->load( $id );
        if (! $obj ) return [];
        $children = [];
        $children = $app->get_children( $obj, $children );
        $children_ids = [];
        foreach ( $children as $child ) {
            $children_ids[] = $child->id;
        }
        return $children_ids;
    }

    function hdlr_archivedate ( $args, $ctx ) {
        $ts = $ctx->stash( 'current_timestamp' );
        $args['ts'] = $ts;
        return $ctx->function_date( $args, $ctx );
    }

    function hdlr_archivelink ( $args, $ctx ) {
        $link = $ctx->stash( 'current_archive_link' );
        return $link === null ? '' : $link;
    }

    function hdlr_statustext ( $args, $ctx ) {
        $app = $ctx->app;
        $int = isset( $args['status'] ) ? $args['status'] : null;
        $options = isset( $args['options'] ) ? $args['options'] : '';
        $icon = isset( $args['icon'] ) ? $args['icon'] : false;
        $text = isset( $args['text'] ) ? $args['text'] : false;
        $model = isset( $args['model'] ) ? $args['model'] : '';
        $icon_only = isset( $args['icon_only'] ) ? $args['icon_only'] : false;
        $revision = isset( $args['revision'] ) ? $args['revision'] : false;
        $no_title = isset( $args['no_title'] ) ? $args['no_title'] : false;
        if (! $options && $model ) {
            $table = $app->get_table( $model );
            if ( $table ) {
                $col = $app->db->model( 'column' )->get_by_key(
                ['table_id' => $table->id, 'name' => 'status']);
                $options = $col->options;
            }
        }
        if ( $int === null || ! $options ) return '';
        $options = explode( ',', $options );
        if ( count( $options ) === 2 ) {
            if (! $int ) return '';
            $status = isset( $options[ $int - 1 ] ) ? $options[ $int - 1 ] : 1;
        } else {
            $int = (int) $int;
            if (! isset( $options[ $int ] ) ) return '';
            $status = $options[ $int ];
        }
        if ( strpos( $status, ':' ) !== false ) {
            list( $status, $option ) = explode( ':', $status );
        }
        $status_text = $app->translate( $status );
        $status = $icon_only ? '' : $status_text;
        if ( $int == 3 && $revision ) {
            $status_text = $app->translate( 'Reserved(Replace)' );
        }
        if ( $icon ) {
            $add = '';
            if ( $icon_only ) {
                if (! $no_title ) {
                    $tmpl = '<i data-toggle="tooltip" data-placement="right" title="'
                          . $status_text . '" class="status_icon fa fa-__" aria-hidden="true"></i>';
                } else {
                    $tmpl = '<i '
                          . $status_text . '" class="status_icon fa fa-__" aria-hidden="true"></i>';
                }
            } else {
                $tmpl = '<i class="status_icon fa fa-__" aria-hidden="true"></i>&nbsp;';
                $add = "<span class=\"sr-only\">$status</span>";
            }
            $tmpl .= $text ? $status : $add;
            if ( count( $options ) === 2 ) {
                $int--;
                $icons = ['pencil-square-o', 'check-square-o'];
            } else {
                $icons = ['pencil', 'pencil-square',
                    'check-circle', 'clock-o' , 'check-square-o', 'calendar-times-o'];
            }
            if ( isset( $icons ) && isset( $icons[ $int ] ) ) {
                return str_replace( '__', $icons[ $int ], $tmpl );
            }
        }
        return $status;
    }

    function hdlr_extends_meth ( $args, $ctx ) {
        $app = $ctx->app;
        $m = isset( $args['module'] ) ? $args['module'] : '';
        $b = isset( $args['basename'] ) ? $args['basename'] : '';
        $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : 0;
        if (! $workspace_id && $ctx->stash( 'workspace' ) ) {
            $workspace_id = $ctx->stash( 'workspace' )->id;
        }
        $current_context = $ctx->stash( 'current_context' );
        $obj = $ctx->stash( $current_context );
        $terms = $m ? ['name' => $m, 'status' => 2, 'rev_type' => 0]
                    : ['basename' => $b, 'status' => 2, 'rev_type' => 0];
        if ( $app->template_basename_by_class && $b ) {
            $terms['class'] = 'Module';
        }
        $tmpl = [];
        $current_template = $ctx->stash( 'current_template' );
        $template_workspace_id = 0;
        $tmpl_cols = 'id,name,text,compiled,cache_key,workspace_id';
        if ( $workspace_id ) {
            $terms['workspace_id'] = ['IN' => [0, $workspace_id ] ];
            $tmpl = $app->db->model( 'template' )->load(
                $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1], $tmpl_cols );
            if ( $app->template_basename_by_class && $b && empty( $tmpl ) ) {
                unset( $terms['class'] );
                $tmpl = $app->db->model( 'template' )->load(
                    $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1], $tmpl_cols );
            }
        }
        if ( empty( $tmpl ) && $current_template &&
            $workspace_id != $current_template->workspace_id ) {
            if ( $ws_id = $current_template->workspace_id ) {
                $terms['workspace_id'] = ['IN' => [0, $ws_id ] ];
                $tmpl = $app->db->model( 'template' )->load(
                    $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1], $tmpl_cols );
            }
        } else if ( empty( $tmpl ) && $m ) {
            $tmpl = $app->db->model( 'template' )->load(
                ['name' => $m, 'workspace_id' => 0, 'status' => 2, 'rev_type' => 0 ],
                ['limit' => 1], $tmpl_cols );
        } else if ( empty( $tmpl ) && $b ) {
            $tmpl = $app->db->model( 'template' )->load(
                ['basename' => $b, 'workspace_id' => 0, 'status' => 2, 'rev_type' => 0 ],
                ['limit' => 1], $tmpl_cols );
        }
        if ( empty( $tmpl ) ) return '';
        $tmpl = $tmpl[0];
        if ( $app->build_pre_parse !== 2 && !isset( $app->modules[ $tmpl->id ] ) ) {
            $app->modules[ $tmpl->id ] = $tmpl->get_values();
        }
        return $app->linked_file === 2 ? $tmpl->_text( $app ) : $tmpl->text;
    }

    function hdlr_includeblock ( $args, $content, $ctx, &$repeat, $counter ) {
        if ( isset( $content ) ) {
            $ctx->local_vars['contents'] = $content;
            $content = $this->hdlr_include( $args, $ctx );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_include ( $args, $ctx, $no_build = false ) {
        $app = $ctx->app;
        $f = isset( $args['file'] ) ? $args['file'] : '';
        $m = isset( $args['module'] ) ? $args['module'] : '';
        $b = isset( $args['basename'] ) ? $args['basename'] : '';
        $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : null;
        if ( $workspace_id === null && $ctx->stash( 'workspace' ) ) {
            $workspace_id = $ctx->stash( 'workspace' )->id;
        }
        if ( isset( $args['parent'] ) && $args['parent'] ) {
            if ( $ctx->stash( 'workspace' ) && $app->db->model( 'workspace' )->has_column( 'parent_id' ) ) {
                $workspace_id = $ctx->stash( 'workspace' )->parent_id;
                $workspace_id = $workspace_id ? (string) $workspace_id : '0';
            } else {
                $workspace_id = '0';
            }
        }
        $cache_key = isset( $args['cache_key'] ) ? md5( $args['cache_key'] ) : '';
        $_cache_key = null;
        $dynamic_caching = false;
        $cache_workspace_id = $workspace_id === null ? '0' : $workspace_id;
        if ( $cache_key ) {
            $cache_ttl = $app->request_time + $app->cache_expires;
            if ( isset( $args['cache_ttl'] ) && $args['cache_ttl'] ) {
                $cache_ttl = $app->request_time + (int) $args['cache_ttl'];
                if ( isset( $ctx->vars['publish_type'] ) && $ctx->vars['publish_type'] == 6 ) {
                    $dynamic_caching = true;
                }
            }
            $request_id = $dynamic_caching ? 'dynamic_cache' : $app->request_id;
            if ( $app->id != 'Prototype' && $app->id != 'Worker' && !$dynamic_caching ) {
                $cache_key = null;
            }
            if ( $cache_key && $app->stash( "template-module-{$cache_key}-{$cache_workspace_id}" ) ) {
                return $app->stash( "template-module-{$cache_key}-{$cache_workspace_id}" );
            } else if ( $cache_key && !$app->no_cache ) {
                $cache_terms = ['kind' => 'CH',
                                'value' => $request_id,
                                'key'  => $cache_key ];
                if ( isset( $args['triggers'] ) && $args['triggers'] ) {
                    unset( $cache_terms['value'] );
                    $user_id = isset( $args['cache_object_id'] ) && $args['cache_object_id'] ? -2 : -1;
                    $cache_terms['user_id'] = $user_id;
                }
                $session = $app->db->model( 'session' )->get_by_key( $cache_terms );
                if ( $session->id && ( $session->expires > $app->request_time ) ) {
                    return $session->data;
                }
            }
        }
        if (! $f && ! $m && ! $b ) return '';
        $template = null;
        $parent_include = $ctx->stash( 'current_include_template' );
        if ( $parent_include && $m && $app->build_pre_parse == 2 && $app->mode === 'view' ) {
            if ( $app->param( '_model' ) === 'template' && $app->param( '_type' ) === 'edit' ) {
                return '';
            }
        }
        if ( $f ) {
            $key = $f;
            if ( isset( $this->include_parts[ $key ] ) ) {
                if (! $this->include_parts[ $key ] ) {
                    return '';
                }
                $f = $this->include_parts[ $key ];
                if (! isset( $ctx->template_paths[ $f ] ) ) {
                    $ctx->template_paths[ $f ] = @filemtime( $f );
                }
                if ( isset( $this->include_tmpls[ $key ] ) ) {
                    $tmpl = $this->include_tmpls[ $key ];
                }
                $file_exists = true;
            } else {
                $isPrototype = $app->id == 'Prototype';
                $f = str_replace( '/', DS, $f );
                $template_paths = $app->template_paths;
                $has_include = $app->has_include;
                $file_exists = false;
                foreach ( $template_paths as $path ) {
                    $path = rtrim( $path, DS );
                    if ( strpos( $f, 'include' . DS ) === 0 && $isPrototype && $app->mode == 'view' ) {
                        if ( in_array(! $path, $has_include ) ) {
                            // Skip if not contains tmpl/include.
                            continue;
                        }
                    }
                    if ( file_exists( $path . DS . $f ) ) {
                        $f = $path . DS . $f;
                        $ctx->template_paths[ $f ] = @filemtime( $f );
                        $file_exists = true;
                        break;
                    }
                }
                if (! $file_exists ) {
                    if ( strpos( $key, 'include' . DS ) === 0 && $isPrototype && $app->mode == 'view' ) {
                        $this->include_parts[ $key ] = false;
                        $this->include_tmpls[ $key ] = false;
                        return '';
                    }
                    if (!$f = $ctx->get_template_path( $f ) ) return '';
                }
            }
            if (! isset( $this->include_parts[ $key ] ) ) {
                $this->include_parts[ $key ] = $f;
            }
            $tmpl = isset( $tmpl ) ? $tmpl : prototype_file_get_contents( $f );
            if (! $tmpl ) return '';
            if (! isset( $this->include_tmpls[ $key ] ) ) {
                $this->include_tmpls[ $key ] = $tmpl;
            }
        } else {
            $current_context = $ctx->stash( 'current_context' );
            $obj = $ctx->stash( $current_context );
            $terms = $m ? ['name' => $m, 'status' => 2, 'rev_type' => 0]
                        : ['basename' => $b, 'status' => 2, 'rev_type' => 0];
            if ( $app->template_basename_by_class && $b ) {
                $terms['class'] = 'Module';
            }
            $tmpl = [];
            $current_template = $ctx->stash( 'current_template' );
            $template_workspace_id = 0;
            $tmpl_cols = 'id,name,text,compiled,cache_key,workspace_id';
            if (! $workspace_id && !$app->include_scope_compat ) {
                $terms['workspace_id'] = 0;
                $tmpl = $app->db->model( 'template' )->load(
                    $terms, ['limit' => 1], $tmpl_cols );
                if ( $app->template_basename_by_class && $b && empty( $tmpl ) ) {
                    // Backward compatibility.
                    unset( $terms['class'] );
                    $tmpl = $app->db->model( 'template' )->load(
                        $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1], $tmpl_cols );
                }
            } else if ( $workspace_id ) {
                $terms['workspace_id'] = ['IN' => [0, $workspace_id ] ];
                $tmpl = $app->db->model( 'template' )->load(
                    $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1], $tmpl_cols );
                if ( $app->template_basename_by_class && $b && empty( $tmpl ) ) {
                    // Backward compatibility.
                    unset( $terms['class'] );
                    $tmpl = $app->db->model( 'template' )->load(
                        $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1], $tmpl_cols );
                }
            }
            if ( empty( $tmpl ) && $current_template &&
                $current_template->workspace_id && $workspace_id != $current_template->workspace_id ) {
                $ws_id = $current_template->workspace_id;
                $terms['workspace_id'] = ['IN' => [0, $ws_id ] ];
                $tmpl = $app->db->model( 'template' )->load(
                    $terms, ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1], $tmpl_cols );
            } else if ( empty( $tmpl ) && $m ) {
                $tmpl = $app->db->model( 'template' )->load(
                    ['name' => $m, 'workspace_id' => 0, 'status' => 2, 'rev_type' => 0 ],
                    ['limit' => 1], $tmpl_cols );
            } else if ( empty( $tmpl ) && $b ) {
                $tmpl = $app->db->model( 'template' )->load(
                    ['basename' => $b, 'workspace_id' => 0, 'status' => 2, 'rev_type' => 0 ],
                    ['limit' => 1], $tmpl_cols );
            }
            if ( empty( $tmpl ) ) return '';
            $tmpl = $tmpl[0];
            $ctx->stash( 'current_include_template', $tmpl );
            $template = $tmpl;
            $_compiled = $tmpl->compiled;
            $_cache_key = $app->incl_force_compile ? null : md5( $tmpl->_text( $app ) );
            if ( $_compiled && $_cache_key ) {
                $ctx->compiled[ $_cache_key ] = $_compiled;
            }
            if ( !isset( $app->modules[ $tmpl->id ] ) ) {
                $tmpl_values = $tmpl->get_values();
                if ( $app->build_pre_parse !== 2 || !$parent_include ) {
                    $app->modules[ $tmpl->id ] = $tmpl_values;
                }
                if (!$parent_include && is_array( $app->child_modules ) ) {
                    $app->child_modules[ $tmpl->id ] = $tmpl_values;
                }
            }
            if ( $no_build ) return '';
            $tmpl = $tmpl->_text( $app );
        }
        if ( $no_build || ! $tmpl ) return '';
        $local_args = $args;
        unset( $local_args['file'], $local_args['module'], $local_args['cace_key'], $local_args['workspace_id'] );
        $old_vars = [];
        foreach ( $local_args as $k => $v ) {
            if ( isset( $ctx->vars[ $k ] ) ) {
                $old_vars[ $k ] = $ctx->vars[ $k ];
            }
            $ctx->vars[ $k ] = $v;
        }
        $force_compile = $ctx->force_compile;
        $ctx->force_compile = $app->incl_force_compile;
        $old = $ctx->keep_vars;
        $ctx->keep_vars = true;
        if ( $_cache_key && isset( $ctx->compiled[ $_cache_key ] ) ) {
            if ( $app->incl_force_compile ) {
                unset( $ctx->compiled[ $_cache_key ] );
            } else {
                if ( stripos( $tmpl, 'setvartemplate' )!== false ) {
                    $regex = '<\${0,1}' . $ctx->prefix . ':{0,1}setvartemplate';
                    if ( preg_match( "/{$regex}/i", $tmpl ) ) {
                        unset( $ctx->compiled[ $_cache_key ] );
                        $ctx->force_compile = true;
                    }
                }
                if ( isset( $ctx->compiled[ $_cache_key ] ) && stripos( $tmpl, 'literal' )!== false ) {
                    $regex = '<\${0,1}' . $ctx->prefix . ':{0,1}literal';
                    if ( preg_match( "/{$regex}/i", $tmpl ) ) {
                        unset( $ctx->compiled[ $_cache_key ] );
                        $ctx->force_compile = true;
                    }
                }
                if ( isset( $ctx->compiled[ $_cache_key ] ) && stripos( $tmpl, 'dynamicmtml' )!== false ) {
                    $regex = '<\${0,1}' . $ctx->prefix . ':{0,1}dynamicmtml';
                    if ( preg_match( "/{$regex}/i", $tmpl ) ) {
                        unset( $ctx->compiled[ $_cache_key ] );
                        $ctx->force_compile = true;
                    }
                }
            }
        }
        $ctx->__stash['in_include'] = true;
        if ( $_cache_key && isset( $_compiled ) && $app->cache_driver && !$ctx->force_compile ) {
            $build = $ctx->_eval( $_compiled );
            if (! $ctx->binmode && ( $ctx->unify_breaks || $ctx->trim_tmpl ) ) {
                $build = $ctx->finalize( $build );
            }
        } else if ( $_cache_key && !$ctx->force_compile ) {
            if ( $ctx->get_cache( $cache_key ) && $ctx->out !== false && $ctx->out !== null ) {
                $build = $ctx->out;
                if (! $ctx->binmode && ( $ctx->unify_breaks || $ctx->trim_tmpl ) ) {
                    $build = $ctx->finalize( $build );
                }
            } else {
                $app->pre_fetch( $ctx, $_cache_key, $_compiled );
                if ( $ctx->get_cache( $cache_key ) && $ctx->out !== false && $ctx->out !== null ) {
                    $build = $ctx->out;
                    if (! $ctx->binmode && ( $ctx->unify_breaks || $ctx->trim_tmpl ) ) {
                        $build = $ctx->finalize( $build );
                    }
                } else {
                    $build = $ctx->build( $tmpl, false, $_cache_key );
                }
            }
            if (! $build ) {
                $ctx->force_compile = true;
                $build = $ctx->build( $tmpl );
            }
        } else {
            $build = $ctx->build( $tmpl );
        }
        unset( $ctx->__stash['in_include'] );
        if ( $parent_include ) {
            $ctx->stash( 'current_include_template', $parent_include );
        } else {
            unset( $ctx->__stash['current_include_template'] );
        }
        $ctx->keep_vars = $old;
        $ctx->force_compile = $force_compile;
        foreach ( $old_vars as $k => $v ) {
            $ctx->vars[ $k ] = $v;
        }
        if (! $app->in_preview && ! $ctx->cached && isset( $ctx->vars['current_archive_url'] ) ) {
            // https://github.com/PowerCMS/Prototype/issues/620
            $md5 = md5( $ctx->vars['current_archive_url'] );
            $this->include_vars[ $md5 ] = isset( $this->include_vars[ $md5 ] )
                ? array_merge( $this->include_vars[ $md5 ], $ctx->vars ) : $ctx->vars;
            $ctx->vars = $this->include_vars[ $md5 ];
        }
        if ( $cache_key && !$app->no_cache ) {
            $app->stash( "template-module-{$cache_key}-{$cache_workspace_id}", $build );
            $session = isset( $session ) ? $session
                     : $app->db->model( 'session' )->new( [
                           'kind'  => 'CH',
                           'key'   => $cache_key ] );
            $session->name( $cache_key );
            $session->value( $request_id );
            $session->start( $app->request_time );
            $session->expires( $cache_ttl );
            $session->data( $build );
            if ( $template && is_object( $template ) ) {
                $session->object_id( $template->id );
            }
            if ( isset( $args['triggers'] ) && $args['triggers'] ) {
                // for flush_cache.
                if ( isset( $args['cache_ttl'] ) && $args['cache_ttl'] == -1 ) {
                    $expires = 86400 * 365 * 50; // 50 years.
                    $cache_ttl = $app->request_time + $expires;
                    $session->expires( $cache_ttl );
                }
                $triggers = is_array( $args['triggers'] ) ? implode( ',', $args['triggers'] ) : $args['triggers'];
                $session->text( strtolower( str_replace( ' ', '', $triggers ) ) );
                if ( strpos( $triggers, ',' ) === false && isset( $args['cache_object_id'] ) && $args['cache_object_id'] ) {
                    $object_id = $args['cache_object_id'];
                    $session->name( "{$triggers}_{$object_id}" );
                    $session->user_id( -2 );
                } else {
                    $session->user_id( -1 );
                }
            } else {
                $session->user_id( 0 ); 
            }
            $session->save();
        }
        return $build;
    }

    function hdlr_includeparts ( $args, $ctx ) {
        $app = $ctx->app;
        $screen = $args['screen'];
        $edit_type = $args['edit_type'] ?? null;
        $type = $args['type'];
        $template_paths = $app->template_paths;
        $has_include = $app->has_include;
        if (! $edit_type ) {
            $model = $args['model'];
            $name = $args['name'];
            $key = "{$screen}/{$model}/{$type}/{$name}";
        } else {
            if ( strpos( $edit_type, ':' ) !== false ) {
                $edit_type = str_replace( ':', '-', $edit_type );
            }
            $key = "{$screen}/{$edit_type}";
        }
        if ( isset( $this->include_parts[ $key ] ) ) {
            if (! $this->include_parts[ $key ] ) {
                return '';
            }
            $file_path = $this->include_parts[ $key ];
            $tmpl = prototype_file_get_contents( $file_path );
            if ( $tmpl !== false ) {
                if ( $ctx->include_realtime ) {
                    return $ctx->build( $tmpl, false, null, true );
                } else {
                    return $ctx->build( $tmpl );
                }
            }
        }
        $tmpl_path = 'include' . DS . $screen . DS;
        if (! $edit_type ) {
            $tmpl_path .= $model . DS . 'column_' . $name . '.tmpl';
        } else {
            $tmpl_path .= $edit_type . '.tmpl'; // Custom Edit Type.
        }
        $file_exists = false;
        foreach ( $template_paths as $idx => $path ) {
            $path = rtrim( $path, DS ) . DS;
            if ( in_array(! $path, $has_include ) ) {
                // Skip if not contains tmpl/include.
                unset( $template_paths[ $idx ] );
                continue;
            }
            if ( file_exists( $path . $tmpl_path ) ) {
                $file_exists = true;
                $file_path = $path . $tmpl_path;
                $this->include_parts[ $key ] = $file_path;
                break;
            }
        }
        if ( $file_exists ) {
            $content = prototype_file_get_contents( $file_path );
            if ( $ctx->include_realtime ) {
                return $ctx->build( $content, false, null, true );
            } else {
                return $ctx->build( $content );
            }
        } else if ( $edit_type ) {
            $tmpl_path = 'include' . DS . $screen . DS;
            $tmpl_path .= 'edit_type_' . $edit_type . '.tmpl';
            foreach ( $template_paths as $idx => $path ) {
                $path = rtrim( $path, DS ) . DS;
                if ( in_array(! $path, $has_include ) ) {
                    // Skip if not contains tmpl/include.
                    unset( $template_paths[ $idx ] );
                    continue;
                }
                if ( file_exists( $path . $tmpl_path ) ) {
                    $file_exists = true;
                    $file_path = $path . $tmpl_path;
                    $this->include_parts[ $key ] = $file_path;
                    break;
                }
            }
            if ( $file_exists ) {
                $content = prototype_file_get_contents( $file_path );
                if ( $ctx->include_realtime ) {
                    return $ctx->build( $content, false, null, true );
                } else {
                    return $ctx->build( $content );
                }
            }
        }
        $file_exists = false;
        if ( $type === 'column' ) {
            $common_path = 'include' . DS . $screen . DS . 'column_' . $name;
            foreach ( $template_paths as $path ) {
                if ( in_array(! $path, $has_include ) ) {
                    // Skip if not contains tmpl/include.
                    continue;
                }
                $path = rtrim( $path, DS ) . DS;
                $common_tmpl = $path . $common_path . '.tmpl';
                if ( file_exists( $common_tmpl ) ) {
                    $file_exists = true;
                    $this->include_parts[ $key ] = $common_tmpl;
                    break;
                }
            }
        }
        if ( $file_exists ) {
            $content = prototype_file_get_contents( $common_tmpl );
            if ( $ctx->include_realtime ) {
                return $ctx->build( $content, false, null, true );
            } else {
                return $ctx->build( $content );
            }
        }
        return '';
    }

    function build_from_compiled ( $ctx, $tmpl, $file = null ) {
        if (! $file && file_exists( $tmpl ) ) {
            $file = $tmpl;
            $tmpl = file_get_contents( $file );
        }
        $cache_key = md5( $file );
        $path = $ctx->compile_dir . "pttags__{$cache_key}.php";
        $cache_hit = false;
        $compiled = null;
        if ( file_exists( $path ) ) {
            $compiled = file_get_contents( $path );
            $cache_hit = true;
        }
        $compiled = $compiled ? $compiled : rtrim( $ctx->build( $tmpl, true ) );
        $ctx->compiled[ $cache_key ] = $compiled;
        $build = $ctx->build( $tmpl );
        if (! $cache_hit ) {
            file_put_contents( $path, $compiled, LOCK_EX );
        }
        return $build;
    }

    function hdlr_property ( $args, $ctx ) {
        $name = isset( $args['name'] ) ? $args['name'] : '';
        $component = isset( $args['component'] ) ? $args['component'] : '';
        $component = $component ? $ctx->app->component( $component ) : $ctx->app;
        if ( $name && $component && PTUtil::property_exists( $component, $name )
            && stripos( $name, 'password' ) === false && $name != 'encrypt_key' ) {
            return $component->$name;
        }
        return '';
    }

    function hdlr_gettableid ( $args, $ctx ) {
        $app = $ctx->app;
        $name = isset( $args['name'] ) ? $args['name'] : '';
        if (! $name )
            $name = isset( $args['model'] ) ? $args['model'] : '';
        if (! $name ) return '';
        $table = $app->get_table( $name );
        $column = isset( $args['column'] ) ? $args['column'] : 'id';
        if ( is_object( $table ) ) return $table->$column;
        return '';
    }

    function hdlr_objectvar ( $args, $ctx ) {
        $app = $ctx->app;
        $col = isset( $args['name'] ) ? $args['name'] : '';
        if (! $col ) return '';
        if ( isset( $ctx->vars['forward_params'] ) ) {
            $value = isset( $ctx->__stash['forward_' . $col ] )
                ? $ctx->__stash['forward_' . $col ] : '';
            return $value;
        }
        if ( is_array( $col ) ) {
            $key = key( $col );
            $col = $col[ $key ];
        }
        if ( isset( $ctx->local_vars['object_' . $col ] ) ) 
            return $ctx->local_vars['object_' . $col ];
        $obj = $ctx->stash( 'object' )
             ? $ctx->stash( 'object' ) : null;
        if (! $obj ) {
            $obj = isset( $ctx->local_vars['__value__'] )
                 ? $ctx->local_vars['__value__'] : null;
        }
        $id = isset( $args['id'] ) ? $args['id'] : '';
        $model = isset( $args['model'] ) ? $args['model'] : '';
        if ( $id && $model ) {
            $obj = $app->db->model( $model )->load( (int) $id );
        }
        if (! is_object( $obj ) ) {
            return '';
        }
        if (! $id ) $ctx->stash( 'object', $obj );
        if ( $obj && $obj->has_column( $col ) ) {
            $perm = null;
            $all_list = null;
            if ( $id = $obj->id ) {
                $cache_key = 'can_edit_' . $obj->_model . '_' . $id;
                $perm = $app->stash( $cache_key );
                $workspace = null;
                if ( $obj->has_column( 'workspace_id' ) ) {
                    $workspace = $obj->workspace_id ? $obj->workspace
                               : $app->db->model( 'workspace' )->new( ['id' => 0] );
                }
                if ( $perm === null ) {
                    $perm = $app->can_do( $obj->_model, 'edit', $obj, $workspace );
                    $app->stash( $cache_key, $perm );
                }
                $cache_key = 'can_list_' . $obj->_model;
                $all_list = $app->stash( $cache_key );
                if ( $all_list === null ) {
                    $all_list = $app->can_do( $obj->_model, 'all_list', null, $workspace );
                    $app->stash( $cache_key, $all_list );
                }
                $ctx->local_vars['can_edit_object'] = $perm;
            }
            if ( stripos( $col, 'password' ) !== false ) {
                return '';
            }
            if ( $col !== 'allow_comment' && // Compat
                (! property_exists( $app, 'allow_objectvar' ) || !$app->allow_objectvar ) ) {
                if (! $app->user() ) return '';
                if (! $all_list && ! $perm ) {
                    return '';
                }
            }
            return $obj->$col;
        }
        if ( $obj && $col === 'permalink' ) {
            return $app->get_permalink( $obj );
        }
        return '';
    }

    function hdlr_getoption ( $args, $ctx ) {
        $app = $ctx->app;
        if (! $app->installed ) {
            return '';
        }
        $key  = $args['key'];
        $kind = isset( $args['kind'] ) ? $args['kind'] : 'config';
        if ( $kind == 'config' ) {
            if ( $configs = $app->stash( 'configs' ) ) {
                if ( isset( $configs[ $key ] ) ) {
                    return $configs[ $key ]->data ? $configs[ $key ]->data
                                                  : $configs[ $key ]->value;
                } else {
                    return '';
                }
            }
        }
        $obj = ( $kind === 'config' )
             ? $app->get_config( $key )
             : $app->db->model( 'option' )->load( ['kind' => $kind, 'key' => $key ] );
        if ( is_array( $obj ) && !empty( $obj ) ) {
            $obj = $obj[0];
        }
        if (! $obj ) return '';
        return $obj->data ? $obj->data : $obj->value;
    }

    function hdlr_assetproperty ( $args, $ctx ) {
        $app = $ctx->app;
        $property = isset( $args['property'] ) ? $args['property'] : '';
        $model = isset( $args['model'] ) ? $args['model'] : $app->param( 'model' );
        $name = isset( $args['name'] ) ? $args['name'] : 'file';
        if ( isset( $args['id'] ) && $args['id'] ) {
            $id = (int) $args['id'];
            $obj = $ctx->app->db->model( $model )->load( $id, null, 'id' );
        }
        $current_context = $ctx->stash( 'current_context' );
        if (! isset( $obj ) && $current_context ) {
            $obj = $ctx->stash( $current_context );
        }
        $obj = isset( $obj ) ? $obj : $ctx->stash( $model );
        if (! $obj ) {
            $obj = $ctx->stash( 'workspace' );
        }
        $thumb_width = isset( $args['thumbnail_height'] ) ? $args['thumbnail_height'] : '';
        if ( isset( $ctx->vars['forward_params'] ) ) {
            $screen_id = $app->param( '_screen_id' );
            $attachmentfile = isset( $args['attachmentfile'] ) ? $args['attachmentfile'] : null;
            if ( $attachmentfile ) {
                $name = $attachmentfile;
            }
            $session_name = "{$screen_id}-{$name}";
            $session = $app->db->model( 'session' )->get_by_key(
                        ['name' => $session_name, 'user_id' => $app->user()->id ] );
            if ( $session->id ) {
                $ctx->stash( 'current_session_' . $name, $session );
                $assetproperty = $app->get_assetproperty( $obj, $name, $property );
                if ( $thumb_width ) {
                    if (! $assetproperty ) return '';
                    $scale = $thumb_width / $assetproperty;
                    $height = $scale * $app->get_assetproperty( $obj, $name, 'image_height' );
                    return (int) $height;
                }
                return $assetproperty;
            }
        }
        if (! $obj || ! $obj->id ) return '';
        $assetproperty = $app->get_assetproperty( $obj, $name, $property );
        if ( $thumb_width ) {
            if (! $thumb_width || ! $assetproperty ) {
                return '';
            }
            $scale = $thumb_width / $assetproperty;
            $height = $scale * $app->get_assetproperty( $obj, $name, 'image_height' );
            return (int) $height;
        }
        return $assetproperty;
    }

    function hdlr_assetthumbnailurl ( $args, $ctx, &$meta = null ) {
        $app = $ctx->app;
        $current_context = $ctx->stash( 'current_context' );
        $obj = $ctx->stash( $current_context );
        if (! $obj ) return '';
        return PTUtil::thumbnail_url( $obj, $args, $ctx );
    }

    function hdlr_assetthumbnail ( $args, $ctx, &$meta = null ) {
        $app = $ctx->app;
        $type = isset( $args['type'] ) ? $args['type'] : '';
        $model = isset( $args['model'] ) ? $args['model'] : $app->param( 'model' );
        $name = isset( $args['name'] ) ? $args['name'] : null;
        $square = isset( $args['square'] ) ? $args['square'] : null;
        $id = isset( $args['id'] ) ? $args['id'] : null;
        if (!$name && $model && $id ) {
            if ( $table = $app->get_table( $model ) ) {
                $columns = $app->db->model( 'column' )->load(
                 ['model' => $model, 'table_id' => $table->id, 'edit' => 'file'],
                 ['sort' => 'order', 'direction' => 'ascend'] );
                if (! empty( $columns ) ) {
                    foreach( $columns as $column ) {
                        if (! $column->options || $column->options === 'image' ) {
                            $name = $column->name;
                            break;
                        }
                    }
                }
            }
        }
        $obj = null;
        $mime_type = '';
        if (!$model ) $model = $ctx->stash( 'current_context' );
        if (!$model || !$name ) return '';
        $data_uri = isset( $args['data_uri'] ) ? $args['data_uri'] : null;
        if (! $id ) {
            $obj = $ctx->stash( $model );
            if ( is_array( $obj ) ) $obj = $obj[0];
            if (! $obj && ! isset( $ctx->vars['forward_params'] ) ) return '';
            $id = $obj ? $obj->id : 0;
        }
        $session = $ctx->stash( 'current_session_' . $name );
        if (! $id && ! isset( $ctx->vars['forward_params'] ) && ! $session) return '';
        $data = '';
        $dynamic = isset( $args['dynamic'] ) ? $args['dynamic'] : null;
        if ( isset( $ctx->vars['forward_params'] ) || $session ) {
            $id = isset( $obj ) ? $obj->id : 0;
            $screen_id = $ctx->vars['screen_id'];
            $attachmentfile = isset( $args['attachmentfile'] ) ? $args['attachmentfile'] : null;
            if ( $attachmentfile ) {
                $name = $attachmentfile;
            }
            $screen_id .= '-' . $name;
            $cache = $ctx->stash( $model . '_session_' . $screen_id . '_' . $id );
            if (! $session ) {
                $session = $cache ? $cache : $app->db->model( 'session' )->get_by_key(
                ['name' => $screen_id, 'user_id' => $app->user()->id ] );
            }
            $ctx->stash( $model . '_session_' . $screen_id . '_' . $id, $session );
            if ( $session->id ) {
                if ( $type === 'default' ) {
                    if ( $square ) {
                        $data = $session->extradata;
                    } else {
                        $data = $session->metadata;
                    }
                    if ( $meta = $session->text ) {
                        $meta = json_decode( $meta, true );
                        $mime_type = $meta['mime_type'];
                    }
                }
                if ( $dynamic ) {
                    $data = base64_encode( $data );
                    $data = "data:{$mime_type};base64,{$data}";
                }
            }
        }
        $id = (int) $id;
        if (! $data && $type === 'default' ) {
            $cache = $ctx->stash( $model . '_meta_' . $name . '_' . $id );
            $metadata = $cache ? $cache : $app->db->model( 'meta' )->get_by_key(
                     ['model' => $model, 'object_id' => $id,
                      'kind' => 'metadata', 'key' => $name ] );
            $ctx->stash( $model . '_meta_' . $name . '_' . $id, $metadata );
            if (! $metadata->id ) {
                return '';
            }
            $uploaded = '';
            if ( $meta = $metadata->text ) {
                $meta = json_decode( $meta, true );
                $mime_type = $meta['mime_type'];
                $uploaded = $metadata->db2ts( $meta['uploaded'] );
            } else {
                $uploaded = md5( $metadata->data );
            }
            if ( $dynamic ) {
                return $app->admin_url . '?__mode=get_thumbnail&id=' . $metadata->id . "&ts={$uploaded}";
            }
            if ( $square ) {
                $data = $metadata->metadata;
                if (! $data ) $data = $metadata->data;
            } else {
                $data = $metadata->data;
            }
        }
        if (! isset( $obj ) || !$obj ) {
            $obj = $app->db->model( $model )->load( $id );
        }
        if ( $data_uri && $data ) {
            if (! $mime_type && $obj ) {
                $ui = $app->db->model( 'urlinfo' )->get_by_key( [
                        'model'     => $obj->_model,
                        'object_id' => $obj->id,
                        'key'       => $name,
                        'class' => 'file'] );
                if ( $ui->id ) {
                    $mime_type = $ui->mime_type;
                }
            }
            $data = base64_encode( $data );
            $data = "data:{$mime_type};base64,{$data}";
        }
        return $data === null ? '' : $data;
    }

    function hdlr_getobjectlabel ( $args, $ctx ) {
        $app = $ctx->app;
        $id = isset( $args['id'] ) ? (int) $args['id'] : null;
        $model = isset( $args['model'] ) ? $args['model'] : null;
        $_primary = isset( $args['primary'] ) ? $args['primary'] : null;
        if ( $_primary && $model ) {
            $table = $app->get_table( $model );
            if (! $table ) return '';
            return $table->primary;
        }
        $column = isset( $args['column'] ) ? $args['column'] : null;
        $model = $model ? $model : $ctx->stash( 'current_context' );
        if (! $id ) {
            $obj = $ctx->stash( $model );
        } else {
            $obj = $app->db->model( $model )->load( $id );
        }
        if (! $obj ) return '';
        if ( $column ) return $obj->$column;
        $table = $app->get_table( $obj->_model );
        if (! $table ) return '';
        $primary = $table ? $table->primary : '';
        if (! $primary ) {
            if ( $obj->has_column( 'title' ) ) {
                $primary = 'title';
            } else if ( $obj->has_column( 'name' ) ) {
                $primary = 'name';
            } else if ( $obj->has_column( 'label' ) ) {
                $primary = 'label';
            }
        }
        return $obj->$primary === null ? '' : $obj->$primary;
    }

    function hdlr_getobjectname ( $args, $ctx ) {
        $app = $ctx->app;
        $type = isset( $args['type'] ) ? $args['type'] : '';
        if ( is_array( $type ) ) {
            $key = key( $type );
            $type = $type[ $key ];
        }
        $properties = explode( ':', $type );
        $model = isset( $properties[1] ) ? $properties[1] : '';
        $col = isset( $properties[2] ) ? $properties[2] : '';
        $model = (! $model && isset( $args['model'] ) ) ? $args['model'] : $model;
        $id = $args['id'];
        $id = (int) $id;
        if ( $model === '__any__' ) {
            $from_obj = $ctx->stash( 'object' )
                 ? $ctx->stash( 'object' ) : $ctx->local_vars['__value__'];
            $to_model = '';
            if ( $from_obj->has_column( 'model' ) ) {
                $to_model = $from_obj->model;
                $table = $app->get_table( $from_obj->model );
            } else if ( $from_obj->has_column( 'table_id' ) ) {
                $table = $app->db->model( 'table' )->load( (int) $from_obj->table_id );
                if ( $table ) {
                    $to_model = $to_model->name;
                }
            }
            if (! $to_model || ! $id || ! $table ) return '';
            $rel_obj = $app->db->model( $to_model )->new();
            if ( $col == '__primary__' ) {
                $col = $table->primary;
            } else {
                $col = $rel_obj->has_column( 'title' ) ? 'title' : '';
                if (! $col ) $rel_obj->has_column( 'name' ) ? 'name' : '';
                if (! $col ) $rel_obj->has_column( 'label' ) ? 'label' : '';
            }
            if (! $col || !$rel_obj->has_column( $col ) ) return '';
            $rel_obj = $app->db->model( $to_model )->load( $id, null, $col );
            if (! $rel_obj ) return '';
            return $rel_obj->$col;
        }
        $name = isset( $args['name'] ) ? $args['name'] : '';
        $col = isset( $args['wants'] ) ? $args['wants'] : $col;
        if (! $id && $name ) {
            $this_model = isset( $args['model'] ) ? $args['model'] : '';
            $scheme = $app->get_scheme_from_db( $this_model );
            if ( isset( $scheme['relations'] ) ) {
                $from_id = isset( $args['from_id'] ) ? $args['from_id'] : '';
                if ( isset( $scheme['relations'][$name] ) && $from_id ) {
                    $obj = $app->db->model( $this_model )->new();
                    $obj->id = $from_id;
                    $relations = $app->get_relations( $obj, $model, $name );
                    $names = [];
                    foreach ( $relations as $r ) {
                        $rel_obj = $app->db->model( $model )->load( $r->to_id );
                        if ( is_object( $rel_obj ) && $rel_obj->has_column( $col ) ) {
                            $names[] = $ctx->modifier_truncate(
                                                        $rel_obj->$col, '10+...', $ctx );
                        }
                    }
                    return !empty( $names ) ? join( ', ', $names ) : '';
                }
            }
        }
        $_obj = $app->db->model( $model );
        if (! $col || !$_obj->has_column( $col ) ) return '';
        if (! $id ) return '';
        if ( $obj = $app->stash( "{$model}:{$id}:{$col}" ) ) {
            if ( is_object( $obj ) && $obj->$col !== null ) {
                return $obj->$col;
            }
        }
        $obj = $_obj->load( $id, null, $col );
        $app->stash( "{$model}:{$id}:{$col}", $obj );
        if ( is_object( $obj ) && $obj->has_column( $col, true ) ) {
            // Cached object
            if ( $obj->$col === null ) {
                $obj = $_obj->get_by_key( ['id' => $id ], null, $col );
            }
            return $obj->$col;
        }
        return '';
    }

    function hdlr_fieldloop ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (! $counter ) {
            $model = isset( $ctx->params['context_model'] ) ? $ctx->params['context_model'] : '';
            if (! $model ) $model = isset( $args['model'] ) ? $args['model'] : '';
            if (! $model ) {
                $repeat = $ctx->false();
                return '';
            }
            $id = isset( $args['id'] ) ? (int) $args['id'] : '';
            $obj = $id ? $app->db->model( $model )->load( $id ) 
                       : $app->db->model( $model )->new();
            $object_fields = [];
            $meta = [];
            if ( isset( $ctx->vars['forward_params'] ) ) {
                $_obj_fields = PTUtil::get_fields( $model, 'types' );
                foreach ( $_obj_fields as $fld => $fieldtype ) {
                    $fld_value = $app->param( "{$fld}__c" );
                    $unique_ids = $app->param( "field-unique_id-{$fld}" );
                    if ( $fld_value !== null ) {
                        if (! is_array( $fld_value ) ) $fld_value = [ $fld_value ];
                        if (! is_array( $unique_ids ) ) $unique_ids = [ $unique_ids ];
                        $i = 0;
                        foreach ( $fld_value as $value ) {
                            $unique_id = $unique_ids[ $i ];
                            $i++;
                            if ( $value ) {
                                $fld_values = json_decode( $value, true );
                                if ( is_array( $fld_values ) ) {
                                    foreach ( $fld_values as $key => $val ) {
                                        if ( strpos( $key, $unique_id . '_' ) === 0 ) {
                                            $new_key = preg_replace( "/^{$unique_id}_/", '', $key );
                                            unset( $fld_values[ $key ] );
                                            $fld_values[ $new_key ] = $val;
                                        }
                                    }
                                }
                                $value = json_encode( $fld_values, JSON_UNESCAPED_UNICODE );
                                $meta_obj = $app->db->model( 'meta' )->get_by_key(
                                    ['object_id' => $id, 'model' => $obj->_model,
                                     'kind' => 'customfield', 'key' => $fld, 'number' => $i ] );
                                $meta_obj->text( $value );
                                $meta_obj->type( $fieldtype );
                                if ( count( $fld_values ) == 1 ) {
                                    $meta_key = key( $fld_values );
                                    $meta_obj->name( $meta_key );
                                    $meta_obj->value( $fld_values[ $meta_key ] );
                                } else {
                                    $meta_obj->value( '' );
                                }
                                $meta[] = $meta_obj;
                            }
                        }
                    }
                }
            } else if ( $id && $obj ) {
                $meta = $app->get_meta( $obj, 'customfield' );
            }
            if (! empty( $meta ) ) {
                foreach ( $meta as $cf ) {
                    $basename = $cf->key;
                    $custom_fields = isset( $object_fields[ $basename ] )
                                   ? $object_fields[ $basename ] : [];
                    $custom_fields[] = $cf;
                    $object_fields[ $basename ] = $custom_fields;
                }
            }
            $fields = PTUtil::get_fields( $model, $args );
            if ( empty( $fields ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $ctx->local_params = $fields;
            $ctx->stash( 'object_fields', $object_fields );
        }
        $params = $ctx->local_params;
        $object_fields = $ctx->stash( 'object_fields' );
        if ( empty( $params ) ) {
            $repeat = $ctx->false();
            return '';
        }
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $force_compile = $ctx->force_compile;
            $ctx->force_compile = true;
            $repeat = true;
            $field = $params[ $counter ];
            $prefix = $field->_colprefix;
            $values = $field->get_values();
            $field_label = $field->label;
            $field_content = $field->content;
            if (! $field_content ) {
                $field_type = $field->fieldtype;
                if ( $field_type ) {
                    if (! $field_label ) $field_label = $field_type->label;
                    if (! $field_content ) $field_content = $field_type->content;
                }
            }
            unset( $ctx->local_vars['field__display'] );
            unset( $ctx->local_vars['field__html'] );
            $restore_vars = ['field_name', 'field_required', 'field_basename',
                             'field_options', 'field_uniqueid', 'field_label_html',
                             'field_content_html'];
            $ctx->local_vars['field_name'] = $field->translate
                ? $app->translate( $field->name ) : $field->name;
            $ctx->local_vars['field_required'] = $field->required;
            $basename = $field->basename;
            $ctx->local_vars['field_basename'] = $basename;
            $options = $field->options;
            $display = $field->display;
            if ( $options ) {
                $labels = $field->options_labels;
                $options = preg_split( '/\s*,\s*/', $options );
                $labels = $labels ? preg_split( '/\s*,\s*/', $labels ) : $options;
                if ( $field->translate_labels ) {
                    $trans_labels = [];
                    foreach ( $labels as $label ) {
                        $trans_labels[] = $app->translate( $label );
                    }
                    $labels = $trans_labels;
                }
                $i = 0;
                $field_options = [];
                foreach ( $options as $option ) {
                    $label = isset( $labels[ $i ] ) ? $labels[ $i ] : $option;
                    $field_options[] = ['field_label' => $label, 'field_option' => $option ];
                    $i++;
                }
                $ctx->vars['field_options'] = $field_options;
            }
            foreach ( $values as $key => $value ) {
                $key = preg_replace( "/^$prefix/", '', $key );
                if ( $field->translate && $key == 'name' ) {
                    $value = $app->translate( $value );
                }
                $ctx->local_vars['field__' . $key ] = $value;
            }
            $ctx->local_vars['field__hide_label'] = $field->hide_label;
            $field_out = false;
            $field_contents = '';
            if (! empty( $object_fields ) ) {
                $content_tmpl = file_get_contents(
                    $ctx->get_template_path( 'field' . DS . 'content.tmpl' ) );
                $label_tmpl = file_get_contents(
                    $ctx->get_template_path( 'field' . DS . 'label.tmpl' ) );
                $wrapper_tmpl = file_get_contents(
                    $ctx->get_template_path( 'field' . DS . 'wrapper.tmpl' ) );
                $basename = $field->basename;
                if ( isset( $object_fields[ $basename ] ) ) {
                    $fields = $object_fields[ $basename ];
                    $field_counter = 0;
                    foreach ( $fields as $custom_field ) {
                        $set_keys = [];
                        if ( $custom_field->text ) {
                            $vars = json_decode( $custom_field->text, true );
                            if ( is_array( $vars ) ) {
                                foreach ( $vars as $key => $value ) {
                                    $ctx->local_vars['field.' . $key ] = $value;
                                    $set_keys[] = 'field.' . $key;
                                }
                            }
                        }
                        if (! $field_counter && $display ) {
                            $ctx->local_vars['field__not_delete'] = 1;
                        } else {
                            $ctx->local_vars['field__not_delete'] = 0;
                        }
                        $ctx->local_vars['field__out'] = $field_out;
                        $uniqueid = '_' . $app->magic(); // issues/1594
                        $ctx->local_vars['field_uniqueid'] = $uniqueid;
                        $_fld_content = $ctx->build( $field_content );
                        $ctx->local_vars['field_content_html'] = $_fld_content;
                        $_fld_content = $ctx->build( $content_tmpl );
                        if (! $field->hide_label ) {
                            $_field_label = $ctx->build( $field_label );
                            $ctx->local_vars['field_label_html'] = $_field_label;
                            $_field_label = $ctx->build( $label_tmpl );
                            $ctx->local_vars['field_label_html'] = $_field_label;
                        }
                        $ctx->local_vars['field_content_html'] = $_fld_content;
                        $_fld_content = $ctx->build( $wrapper_tmpl );
                        PTUtil::add_id_to_field( $_fld_content, $uniqueid, $basename );
                        $field_contents .= $_fld_content;
                        foreach ( $set_keys as $key ) {
                            unset( $ctx->local_vars[ $key ] );
                        }
                        $field_out = true;
                        $display = true;
                        $field_counter++;
                    }
                }
            }
            if (! $field_out ) {
                if ( $app->remove_field_attr ) {
                    $uniqueid = $app->magic();
                } else {
                    $uniqueid = '_' . $app->magic(); // issues/1594
                }
                if ( $display ) {
                    $ctx->local_vars['field__not_delete'] = 1;
                } else {
                    $ctx->local_vars['field__not_delete'] = 0;
                }
                $ctx->local_vars['field_uniqueid'] = $uniqueid;
                if (! $field->hide_label ) {
                    $field_label = $ctx->build( $field_label );
                    $ctx->local_vars['field_label_html'] = $field_label;
                    $src = file_get_contents( TMPL_DIR . 'field' . DS . 'label.tmpl' );
                    $field_label = $ctx->build( $src );
                    $ctx->local_vars['field_label_html'] = $field_label;
                }
                $_fld_content = $ctx->build( $field_content );
                $src = file_get_contents( TMPL_DIR . 'field' . DS . 'content.tmpl' );
                PTUtil::add_id_to_field( $_fld_content, $uniqueid, $basename );
                $ctx->local_vars['field_content_html'] = $_fld_content;
                $field_contents = $ctx->build( $src );
                $ctx->local_vars['field_content_html'] = $field_contents;
                $src = file_get_contents( TMPL_DIR . 'field' . DS . 'wrapper.tmpl' );
                $field_contents = $ctx->build( $src );
            }
            $field_contents = "<div id=\"field-{$basename}-wrapper\">{$field_contents}</div>";
            $src = file_get_contents( TMPL_DIR . 'field' . DS . 'footer.tmpl' );
            $field_contents .= $ctx->build( $src );
            $ctx->local_vars['field__html'] = $field_contents;
            foreach ( $restore_vars as $key ) {
                unset( $ctx->local_vars[ $key ] );
            }
            $ctx->local_vars['field__display'] = $display;
            if ( $display && ! $field->multiple ) {
                $ctx->local_vars['field__hidden'] = true;
            } else {
                unset( $ctx->local_vars['field__hidden'] );
            }
            $ctx->local_vars['field__menu'] = true;
            $ctx->force_compile = $force_compile;
        } else {
            $repeat = $ctx->false();
            unset( $params );
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_referencecontext ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $this_tag = $args['this_tag'];
        $reference_tags = $ctx->stash( 'reference_tags' );
        if ( $reference_tags === null ) {
            // When __stash reseted.
            $this->init_tags();
            $reference_tags = $app->ctx->stash( 'reference_tags' );
        }
        $model = null;
        if ( isset( $reference_tags[ $this_tag ] ) ) {
            $prop = $reference_tags[ $this_tag ];
            $name = $prop[1];
        } else {
            $name = isset( $args['name'] ) ? $args['name'] : '';
            $model = isset( $args['model'] ) ? $args['model'] : '';
        }
        if (! $name && ! $model ) {
            $repeat = $ctx->false();
            return '';
        }
        $localvars = ['current_context', 'reference_obj', 'object'];
        if (! $counter ) {
            $sess = null;
            if ( $model ) {
                $obj_id = isset( $args['id'] ) ? $args['id'] : '';
                if (! $obj_id ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $ref_model = $model;
            } else {
                $current_context = $reference_tags[ $this_tag ][0];
                $scheme = $app->get_scheme_from_db( $current_context );
                $obj = $ctx->stash( $current_context );
                if (! $obj && $current_context == 'template' ) {
                    $obj = $ctx->stash( 'current_template' );
                }
                if (! $obj ) {
                    $repeat = $ctx->false();
                    return '';
                }
                if (! $obj->has_column( $name ) ) {
                    $name = strtolower( $name );
                    $labels = $scheme['labels'];
                    foreach ( $labels as $key => $val ) {
                        $val = strtolower( $val );
                        if ( $name == $val ) {
                            $name = $key;
                            break;
                        }
                    }
                }
                $in_preview = false;
                if ( $app->param( 'id' ) == $obj->id ) {
                    $preview_template = $ctx->stash( 'preview_template' );
                    if ( $app->in_preview && ! $preview_template && !$ctx->stash( 'relatedobjs_preview' ) ) {
                        $in_preview = true;
                    } else if ( $app->id == 'Prototype' && $app->param( '_preview' )
                        && $obj->_model == $app->param( '_model' ) ) {
                        $in_preview = true;
                    }
                }
                $props = $scheme['edit_properties'];
                $prop = $props[ $name ];
                $props = explode( ':', $prop );
                $ref_model = $props[1];
                $obj_id = null;
                if ( $in_preview && $ref_model == 'attachmentfile' ) {
                    $sess_name = $app->screen_id . "-{$name}";
                    $sess = $app->db->model( 'session' )->get_by_key(
                        ['name' => $sess_name, 'user->id' => $app->user()->id ] );
                } else if ( $in_preview ) {
                    if ( $current_context != 'template' && $app->param( $name ) ) {
                        $obj_id = $app->param( $name );
                    }
                }
                if (! $ref_model ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $obj_id = $in_preview && $obj_id ? $obj_id : $obj->$name;
                if (! $in_preview && $obj_id === null && $obj->id ) {
                    $obj = $obj->load( $obj->id, null, $name );
                    $obj_id = $obj ? $obj->$name : null;
                }
            }
            if ( isset( $args['force'] ) && $args['force'] ) {
                $app->db->caching = false;
            }
            $ref_obj = null;
            if ( $sess && $sess->id ) {
                $ref_obj = PTUtil::session_to_attachmentfile( $sess, $obj );
            } else {
                if (! $obj_id ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $ref_obj = $app->db->model( $ref_model )->load( (int)$obj_id );
            }
            if (! $ref_obj ||! is_object( $ref_obj ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $ctx->local_vars['__total__'] = 1;
            $ctx->local_vars['__counter__'] = $counter;
            $app->init_callbacks( $ref_model, 'post_load_object' );
            $table = $app->get_table( $ref_model );
            $callback = ['name' => 'post_load_object', 'model' => $ref_model, 'table' => $table, 'args' => $args ];
            $app->run_callbacks( $callback, $model, $ref_obj );
            $localvars[] = $ref_model;
            $ctx->localize( $localvars );
            $ctx->stash( 'reference_obj', $ref_model );
            $ctx->stash( 'current_context', $ref_model );
            $ctx->stash( $ref_model, $ref_obj );
            $ctx->stash( 'object', $ref_obj );
        }
        $ref_model = $ctx->stash( 'reference_obj' );
        if ( $counter ) {
            $localvars[] = $ref_model;
            $ctx->restore( $localvars );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_referencedobjects ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (! $counter ) {
            $orig_args = $args;
            $current_context = $ctx->stash( 'current_context' );
            $obj = $ctx->stash( $current_context );
            if (! $obj || ! is_object( $obj ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $ctx_model = isset( $args['model'] ) ? $args['model'] : $current_context;
            $name = null;
            if ( isset( $args['name'] ) ) {
                $name = $args['name'];
            } else if ( isset( $args['column'] ) ) {
                $name = $args['column'];
            } else if ( isset( $args['relation_name'] ) ) {
                $name = $args['relation_name'];
            }
            $terms = [];
            if ( $name ) {
                $terms['relation_name'] = $name;
            }
            $ctx_obj = $app->db->model( $ctx_model );
            if ( $ctx_obj->has_column( 'status' ) ) {
                $include_draft = isset( $args['include_draft'] )
                               ? true : false;
                if (! $include_draft ) {
                    $terms['status'] = $app->status_published( $ctx_model );
                } else {
                    $terms['status'] = ['>=' => 0];
                }
            }
            if ( $ctx_obj->has_column( 'rev_type' ) ) {
                $terms['rev_type'] = 0;
            }
            $select_cols = isset( $args['cols'] ) ? $args['cols'] : '*';
            if ( isset( $args['sort_by'] ) && $args['sort_by'] && $ctx_obj->has_column( $args['sort_by'] ) ) {
                $args['sort'] = $args['sort_by'];
                unset( $args['sort_by'] );
            }
            if ( isset( $args['sort_order'] ) && $args['sort_order'] ) {
                $direction = $args['sort_order'];
                $direction = stripos( $direction, 'desc' ) === 0 ? 'descend' : 'ascend';
                $args['direction'] = $direction;
                unset( $args['sort_order'] );
            }
            unset( $args['relation_name'], $args['column'], $args['name'], $args['this_tag'], $args['model'],
                   $args['include_draft'] );
            $select_cols = $this->select_cols( $app, $ctx_obj, $select_cols );
            $objects = $app->load_context_objs( $obj, $ctx_model, $terms, $args, $select_cols );
            $app->init_callbacks( $ctx_model, 'post_load_objects' );
            $table = $app->get_table( $ctx_model );
            $callback = ['name' => 'post_load_objects', 'model' => $ctx_model, 'table' => $table, 'args' => $orig_args ];
            $count_obj = $objects === false ? 0 : count( $objects );
            $app->run_callbacks( $callback, $ctx_model, $objects, $count_obj );
            if ( empty( $objects ) ) {
                $repeat = $ctx->false();
                return '';
            }
            if ( $app->in_compile ) {
                $objects = array_slice( $objects, 0, 1 );
                $count_obj = 1;
            }
            $ctx->localize( [ $ctx_model, 'current_context', 'ctx_model'] );
            $ctx->local_params = $objects;
            $ctx->stash( 'ctx_model', $ctx_model );
        }
        $params = $ctx->local_params;
        $ctx_model = $ctx->stash( 'ctx_model' );
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $obj = $params[ $counter ];
            $ctx->stash( $ctx_model, $obj );
            $ctx->stash( 'current_context', $ctx_model );
            $repeat = true;
        } else {
            unset( $params );
            $ctx->restore( [ $ctx_model, 'current_context', 'ctx_model'] );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_relatedobjects ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if ( isset( $ctx->local_vars['current_context'] ) ) {
            $from = $ctx->local_vars['current_context'];
        } else {
            $from = $args['from'] ?? $ctx->stash( 'current_context' );
        }
        if (! $from ) {
            $repeat = false;
            return '';
        }
        $to_model = $args['model'] ?? null;
        if (! $to_model && isset( $args['to'] ) ) {
            $to_model = $args['to'];
        }
        $name = $args['name'] ?? null;
        if (! $to_model || ! $name ) {
            $scheme = $app->get_scheme_from_db( $from );
            $relations = $scheme['relations'] ?? [];
            if ( $name && isset( $relations[ $name ] ) ) {
                $to_model = $relations[ $name ];
            } else if ( $to_model ) {
                $name = array_search( $to_model, $relations );
            }
        }
        if (! $to_model || ! $name ) {
            return '';
        }
        unset( $args['name'], $args['model'], $args['from'], $args['to'] );
        $this_tag = "{$from}{$name}"; // entrycategories, entrytags...
        if (! $counter ) {
            $ctx->local_vars['current_context'] = $from;
            $block_relations = $ctx->stash( 'block_relations' );
            if ( $block_relations === null ) {
                // When __stash reseted.
                $this->init_tags();
                $block_relations = $app->ctx->stash( 'block_relations' );
            }
            if (! isset( $block_relations[ $this_tag ] ) ) {
                $block_relations[ $this_tag ] = [ $name, $from, $to_model ];
                $app->ctx->stash( 'block_relations', $block_relations );
            }
        }
        $args['this_tag'] = $this_tag;
        return $this->hdlr_get_relatedobjs( $args, $content, $ctx, $repeat, $counter );
    }

    function hdlr_get_relatedobjs ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $this_tag = $args['this_tag'];
        $block_relations = $ctx->stash( 'block_relations' );
        if ( $block_relations === null ) {
            // When __stash reseted.
            $this->init_tags();
            $block_relations = $app->ctx->stash( 'block_relations' );
        }
        $current_context = $ctx->stash( 'current_context' );
        $settings = $block_relations[ $this_tag ] ?? null;
        if (! $settings ) {
            return '';
        }
        $model  = $settings[1];
        $to_obj = $settings[2];
        $colname = $settings[0];
        $obj = $ctx->stash( $model );
        if (! $obj || ! is_object( $obj ) ) {
            $repeat = false;
            return '';
        }
        $preview_template = $ctx->stash( 'preview_template' );
        $in_preview = false;
        $model_prefix = $app->param( '_model' );
        $model_prefix = preg_replace( '/[^a-z0-9]/', '' , $model_prefix );
        if ( $app->in_preview && !$preview_template &&
            stripos( $this_tag, $model_prefix ) === 0 ) {
            if ( $app->param( 'id' ) && $app->param( 'id' ) != $obj->id ) {
                $in_preview = false;
            } else if (! $app->param( 'id' ) && $obj->id ) {
                $in_preview = false;
            } else {
                $in_preview = true;
            }
        }
        $local_vars = [ $model, 'current_context', 'to_object', 'relatedobjs_preview'];
        $tag_relations_compat = property_exists( $app, 'tag_relations_compat' )
                              ? $app->tag_relations_compat : false;
        if (! $tag_relations_compat ) {
            $local_vars[] = $to_obj;
        }
        if (! $counter ) {
            $orig_args = $args;
            $include_draft = isset( $args['include_draft'] )
                           ? true : false;
            $objects = [];
            $ctx->localize( $local_vars );
            if ( $in_preview ) {
                $ctx->stash( 'relatedobjs_preview', true );
                if ( $to_obj === '__any__' ) {
                    $to_obj = $app->param( "_{$colname}_model" );
                }
                $rels = $app->param( $colname ) ? $app->param( $colname ) : [];
                if ( is_numeric( $rels ) ) {
                    $rels = [ $rels ];
                }
                $i = -1;
                $insert_sessions = [];
                $ids = [];
                foreach ( $rels as $id ) {
                    if ( $id ) $i++;
                    if (! is_numeric( $id ) ) {
                        if ( $to_obj == 'attachmentfile' && $id ) {
                            $id = str_replace( 'session-', '', $id );
                            $sess = $app->db->model( 'session' )->load( (int) $id );
                            if ( $sess ) {
                                $insert_sessions[ $i ] = $sess;
                            }
                        }
                        continue;
                    }
                    if ( $id ) $ids[] = (int) $id;
                }
                $additional_tags = null;
                $add_objs = [];
                if ( $to_obj == 'tag' ) {
                    $additional_tags = $app->param( 'additional_tags' );
                    if ( $additional_tags ) {
                        $add_tags = preg_split( '/\s*,\s*/', $additional_tags );
                        $workspace_id = (int) $app->param( 'workspace_id' );
                        foreach ( $add_tags as $tag ) {
                            $tag = PTUtil::normalize( $tag );
                            $normalize = str_replace( ' ', '', trim( mb_strtolower( $tag ) ) );
                            if (!$normalize ) continue;
                            $terms = ['normalize' => $normalize, 'class' => $model ];
                            if ( $workspace_id )
                                $terms['workspace_id'] = $workspace_id;
                            $tag_obj = $app->db->model( 'tag' )->get_by_key( $terms );
                            if ( $tag_obj->id ) {
                                $ids[] = $tag_obj->id;
                            } else {
                                $tag_obj->name = $tag;
                                $add_objs[] = $tag_obj;
                            }
                        }
                    }
                } else if ( $to_obj == 'taxonomy' ) {
                    $additional_taxonomies = $app->param( 'additional_taxonomies' );
                    if ( $additional_taxonomies ) {
                        $add_tags = preg_split( '/\s*,\s*/', $additional_taxonomies );
                        foreach ( $add_tags as $tag ) {
                            $tag = PTUtil::normalize( $tag );
                            $normalize = str_replace( ' ', '', trim( mb_strtolower( $tag ) ) );
                            if (!$normalize ) continue;
                            $terms = ['normalize' => $normalize ];
                            if ( $app->db->model( 'taxonomy' )->has_column( 'workspace_id', true ) ) {
                                $app->get_scheme_from_db( 'taxonomy' );
                                $terms['workspace_id'] = $workspace_id;
                            }
                            $tag_obj = $app->db->model( 'taxonomy' )->get_by_key( $terms );
                            if ( $tag_obj->id ) {
                                $ids[] = $tag_obj->id;
                            } else {
                                $tag_obj->name = $tag;
                                $add_objs[] = $tag_obj;
                            }
                        }
                    }
                }
                if ( empty( $rels ) || ( empty( $ids ) && empty( $insert_sessions ) ) && !$additional_tags ) {
                    $ctx->restore( $local_vars );
                    $repeat = $ctx->false();
                    if ( isset( $orig_args['__object_count'] ) ) {
                        return 0;
                    }
                    return '';
                }
                if ( $to_obj == 'attachmentfile' ) {
                    $include_draft = true;
                } else if ( $to_obj == 'asset' ) {
                    // Setting of UploadUtilities
                    $component = $app->component( 'UploadUtilities' );
                    if ( is_object( $component ) ) {
                        $scope_id = (int) $app->param( 'workspace_id' );
                        $sync_status = $component->get_config_value( 'uploadutilities_sync_status', $scope_id );
                        if ( $sync_status ) {
                            $sync_models = explode( ',', $sync_status );
                            $include_draft = in_array( $model, $sync_models );
                        }
                    }
                }
                $terms = [];
                $objects = [];
                if (! empty( $ids ) ) {
                    $ids = array_unique( $ids );
                    $terms = ['id' => ['in' => $ids ] ];
                    if (! $include_draft ) {
                        $status = $app->status_published( $to_obj );
                        if ( $status ) {
                            $terms['status'] = $status;
                        }
                    }
                    $params = [];
                    $limit = isset( $args['limit'] ) ? $args['limit'] : null;
                    $offset = isset( $args['offset'] ) ? $args['offset'] : null;
                    $order_sort = true;
                    if ( isset( $args['sort_by'] ) ) {
                        $params['sort'] = $args['sort_by'];
                        $order_sort = false;
                    }
                    if ( isset( $args['sort_order'] ) ) {
                        $params['direction'] = $args['sort_order'];
                    }
                    $to_model = $app->db->model( $to_obj );
                    foreach ( $args as $arg => $v ) {
                        if ( $to_model->has_column( $arg ) ) {
                            $terms[ $arg ] = $v;
                        }
                    }
                    if ( $to_obj == 'tag' && !isset( $args['include_private'] )
                        || ( isset( $args['include_private'] ) && !$args['include_private'] ) ) {
                        $terms['name'] = ['not like' => '@%'];
                    }
                    $objects = $app->db->model( $to_obj )->load( $terms, $params );
                    if ( $order_sort ) {
                        if ( $primary_id = $app->param( "{$colname}_primary_id" ) ) {
                            if ( is_numeric( $primary_id ) ) {
                                array_unshift( $ids, (int) $primary_id );
                                $ids = array_unique( $ids );
                            }
                        }
                    }
                    $arr = [];
                    // Filter by column
                    foreach ( $objects as $idx => $_obj ) {
                        foreach ( $args as $colName => $colValue ) {
                            if ( $_obj->has_column( $colName ) && $_obj->$colName != $colValue ) {
                                unset( $objects[ $idx ] );
                                continue;
                            }
                        }
                    }
                    if ( $order_sort ) {
                        foreach ( $objects as $_obj ) {
                            $arr[ (int) $_obj->id ] = $_obj;
                        }
                        $objects = [];
                        $i = 0;
                        foreach ( $ids as $id ) {
                            if (! isset( $arr[ $id ] ) ) {
                                continue;
                            }
                            if ( $limit && $limit <= $i ) {
                                break;
                            }
                            if ( $offset && $offset < $i ) {
                                $i++;
                                continue;
                            }
                            if ( isset( $arr[ $id ] ) ) {
                                $objects[] = $arr[ $id ];
                            }
                            $i++;
                        }
                    } else {
                        $filtered_objs = [];
                        $i = 0;
                        foreach ( $objects as $rel_obj ) {
                            if ( $limit && $limit <= $i ) {
                                break;
                            }
                            if ( $offset && $offset < $i ) {
                                $i++;
                                continue;
                            }
                            $filtered_objs[] = $rel_obj;
                            $i++;
                        }
                        $objects = $filtered_objs;
                    }
                }
                if ( $to_obj == 'attachmentfile' ) {
                    if (! empty( $insert_sessions ) ) {
                        $preview_objs = [];
                        $i = 0;
                        if ( empty( $objects ) ) {
                            foreach ( $insert_sessions as $sess ) {
                                $preview_objs[] =
                                    PTUtil::session_to_attachmentfile( $sess, $obj );
                            }
                        } else {
                            foreach ( $objects as $existing_obj ) {
                                if ( isset( $insert_sessions[$i] ) ) {
                                    $sess = $insert_sessions[$i];
                                    $preview_objs[] =
                                        PTUtil::session_to_attachmentfile( $sess, $obj, $i + 1 );
                                }
                                $preview_objs[] = $existing_obj;
                                $i++;
                            }
                        }
                        $objects = $preview_objs;
                    }
                }
                if (! empty( $add_objs ) ) {
                    $objects = array_merge( $objects, $add_objs );
                }
                if ( empty( $objects ) ) {
                    $ctx->restore( $local_vars );
                    $repeat = $ctx->false();
                    if ( isset( $orig_args['__object_count'] ) ) {
                        return 0;
                    }
                    return '';
                }
            } else {
                if ( $to_obj === '__any__' ) {
                    if ( $obj->has_column( 'model' ) ) {
                        $to_obj = $obj->model;
                    } else if ( $obj->has_column( 'table_id' ) ) {
                        $table = $app->db->model( 'table' )->load( (int) $obj->table_id );
                        if ( $table ) {
                            $to_obj = $table->name;
                        }
                    } else if ( $obj->id ) {
                        $rel = $app->db->model( 'relation' )->get_by_key(
                          ['from_obj' => $obj->_model, 'from_id' => $obj->id, 'name' => $colname ] );
                        if ( $rel->id ) {
                            $to_obj = $rel->to_obj;
                        }
                    }
                }
                if ( $to_obj === '__any__' ) {
                    $ctx->restore( $local_vars );
                    $repeat = $ctx->false();
                    if ( isset( $orig_args['__object_count'] ) ) {
                        return 0;
                    }
                    return '';
                }
                $params = [];
                if (! $include_draft ) {
                    if ( $to_obj !== 'attachmentfile' ) {
                        $params['published_only'] = true;
                    }
                }
                if ( isset( $args['limit'] ) ) {
                    $params['limit'] = (int) $args['limit'];
                }
                if ( isset( $args['offset'] ) ) {
                    $params['offset'] = (int) $args['offset'];
                }
                if ( isset( $args['sort_by'] ) ) {
                    $params['sort'] = $args['sort_by'];
                }
                if ( isset( $args['sort_order'] ) ) {
                    $params['direction'] = $args['sort_order'];
                }
                $terms = [];
                $to_model = $app->db->model( $to_obj );
                foreach ( $args as $arg => $v ) {
                    if ( $to_model->has_column( $arg ) ) {
                        $terms[ $arg ] = $v;
                    }
                }
                if ( isset( $orig_args['ignore_filter'] ) ) {
                    $params['ignore_filter'] = 1;
                }
                $select_cols = isset( $args['cols'] ) ? $args['cols'] : '*';
                $select_cols = $this->select_cols( $app, $to_model, $select_cols );
                $objects = $app->get_related_objs( $obj, $to_obj, $colname,
                                                   $params, $terms, $select_cols );
                $app->init_callbacks( $to_obj, 'post_load_objects' );
                $table = $app->get_table( $to_obj );
                $callback = ['name' => 'post_load_objects', 'model' => $to_obj, 'table' => $table, 'args' => $orig_args ];
                $count_obj = $objects === false ? 0 : count( $objects );
                $app->run_callbacks( $callback, $model, $objects, $count_obj );
            }
            if ( isset( $orig_args['__object_count'] ) ) {
                $ctx->restore( $local_vars );
                return count( $objects );
            }
            $scheme = $app->db->scheme;
            if ( empty( $objects ) ) {
                $repeat = $ctx->false();
                $ctx->restore( $local_vars );
                return '';
            }
            if ( $app->in_compile ) {
                $objects = array_slice( $objects, 0, 1 );
                $count_obj = 1;
            }
            $ctx->local_params = $objects;
            $ctx->stash( 'to_object', $to_obj );
            $ctx->local_vars['to_object'] = $to_obj;
        }
        $params = $ctx->local_params;
        $to_obj = $ctx->stash( 'to_object' );
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $obj = $params[ $counter ];
            $ctx->stash( $to_obj, $obj );
            $ctx->stash( 'current_context', $to_obj );
            $repeat = true;
        } else {
            unset( $params );
            $ctx->restore( $local_vars );
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_get_relationscount ( $args, $ctx ) {
        $content = null;
        $repeat = false;
        $counter = 0;
        $args['__object_count'] = true;
        $this_tag = $args['this_tag'];
        $this_tag = preg_replace( '/count$/', '', $this_tag );
        $args['this_tag'] = $this_tag;
        return $this->hdlr_get_relatedobjs( $args, $content, $ctx, $repeat, $counter );
    }

    function hdlr_get_objectcol ( $args, $ctx, $retry = false ) {
        $app = $ctx->app;
        $this_tag = $args['this_tag'];
        $current_context = $ctx->stash( 'current_context' );
        $function_tags = $ctx->stash( 'function_tags' );
        if ( $function_tags === null ) {
            // When __stash reseted.
            $this->init_tags();
            $function_tags = $app->ctx->stash( 'function_tags' );
        }
        $function_date = $ctx->stash( 'function_date' );
        if ( $function_date === null ) {
            // When __stash reseted.
            $this->init_tags();
            $function_date = $app->ctx->stash( 'function_date' );
        }
        if ( is_array( $function_tags ) && isset( $function_tags[ $this_tag ] ) ) {
            list( $model, $col ) = $function_tags[ $this_tag ];
            $obj = $ctx->stash( $model );
            if (! $obj && isset( $ctx->vars['current_archive_model'] )
                && $model === $ctx->vars['current_archive_model'] ) {
                // Lost current archive context.
                $obj = $ctx->stash( 'current_object' );
                if (! $obj ) {
                    if ( $id = $ctx->vars['current_object_id'] ) {
                        $obj = $app->db->model( $model )->load( $id );
                    }
                }
                $ctx->stash( 'current_object', $obj );
                $ctx->stash( $model, $obj );
            }
            if ( is_object( $obj ) && ( $obj->$col || $obj->has_column( $col ) ) ) {
                if ( $col === 'published_on' && $app->keep_published_on && $obj->has_column( 'rev_object_id' ) ) {
                    if ( ( $obj->rev_object_id === null || $obj->rev_type === null ) && $obj->id && $obj->id > 0 ) {
                        $_obj = $obj->load( $obj->id, null, "id,rev_object_id,rev_type,published_on" );
                        if ( $_obj ) {
                            $obj = $_obj;
                        }
                    }
                    if ( $obj->rev_object_id && $obj->rev_type ) {
                        $obj = $obj->load( $obj->rev_object_id, null, "id,{$col}" );
                    }
                }
                if ( $obj->$col === null && $obj->id ) {
                    $obj = $app->db->model( $obj->_model )->get_by_key(
                            ['id' => $obj->id ], ['limit' => 1], "id,{$col}" );
                }
                if ( isset( $args['format'] ) || isset( $args['format_name'] ) ) {
                    if ( is_array( $function_date ) && in_array( $this_tag, $function_date ) ) {
                        $args['ts'] = $obj->$col;
                        return $ctx->function_date( $args, $ctx );
                    }
                }
                if ( $this_tag == 'attachmentfilename'
                    && $app->param( '_preview' ) && $obj->id < 0 ) {
                    return urldecode( $obj->$col );
                }
                return $obj->$col;
            }
        }
        if ( strpos( $this_tag, 'template' ) === 0 ) {
            if ( $current_context !== 'template' ) {
                $col_name = preg_replace( "/^template/", '', $this_tag );
                $template = $ctx->stash( 'current_template' );
                if ( $template->has_column( $col_name ) ) {
                    return $template->$col_name;
                }
            }
        }
        $workspace_tags = $ctx->stash( 'workspace_tags' );
        if ( $workspace_tags && in_array( $this_tag, $workspace_tags ) ) {
            $current_context = 'workspace';
        }
        $alias_functions = $ctx->stash( 'alias_functions' );
        if ( $alias_functions === null ) {
            // When __stash reseted.
            $this->init_tags();
            $alias_functions = $app->ctx->stash( 'alias_functions' );
        }
        if ( is_array( $alias_functions ) && isset( $alias_functions[ $this_tag ] ) ) {
            $this_tag = $alias_functions[ $this_tag ];
            if (! $ctx->stash( $current_context ) ) {
                $args['this_tag'] = $this_tag;
                return $retry === 1 ? '' : $this->hdlr_get_objectcol( $args, $ctx, 1 );
            }
        }
        $function_relations = $ctx->stash( 'function_relations' );
        if ( $function_relations === null ) {
            // When __stash reseted.
            $this->init_tags();
            $function_relations = $app->ctx->stash( 'function_relations' );
        }
        if ( is_array( $function_relations ) && isset( $function_relations[ $this_tag ] ) ) {
            $settings = $function_relations[ $this_tag ];
            $column = $settings[0];
        }
        $permalink_tags = $ctx->stash( 'permalink_tags' );
        if ( $permalink_tags === null ) {
            // When __stash reseted.
            $this->init_tags();
            $permalink_tags = $app->ctx->stash( 'permalink_tags' );
        }
        if ( is_array( $permalink_tags ) && isset( $permalink_tags[ $this_tag ] ) ) {
            $current_context = $permalink_tags[ $this_tag ];
            $obj = $ctx->stash( $permalink_tags[ $this_tag ] );
            if ( $obj ) return $app->get_permalink( $obj, false, true );
        }
        $obj = $ctx->stash( $current_context );
        if (! $obj && $current_context == 'workspace' ) {
            if ( $this_tag == 'workspacename' ) {
                return $ctx->app->appname;
            } else if ( $this_tag == 'workspaceid' ) {
                return '0';
            }
        }
        if (! $obj ) return '';
        $current_context = preg_replace( '/[^a-z0-9]/', '' , $current_context );
        $column = isset( $column ) ? 
            $column : preg_replace( "/^{$current_context}/", '', $this_tag );
        if (! $obj->has_column( $column ) ) {
            $column = str_replace( '_', '', $column );
        }
        if ( $obj->has_column( $column ) ) {
            $column_name = $column;
            $column = $obj->_colprefix . $column;
            $value = $obj->$column;
            if ( $value && isset( $settings ) ) {
                $value = (int) $value;
                $app = $ctx->app;
                $obj = $app->db->model( $settings[2] )->load( $value );
                $col = isset( $args['wants'] ) ? $args['wants'] : $settings[3];
                if ( $obj && $obj->has_column( $col ) ) {
                    $col = $obj->_colprefix . $col;
                    $value = $obj->$col;
                }
            }
            $this_tag = preg_replace( '/[^a-z0-9]/', '' , $this_tag );
            if ( is_array( $function_date ) && in_array( $this_tag, $function_date ) ) {
                $args['ts'] = $value;
                return $ctx->function_date( $args, $ctx );
            }
            if ( $value === null ) {
                $obj = $app->db->model( $obj->_model )->get_by_key(
                            ['id' => $obj->id ], ['limit' => 1], "id,{$column_name}" );
                $value = $obj->$column_name;
            }
            return $value;
        }
        $prefix = str_replace( '_', '', $obj->_model );
        if ( $this_tag == $prefix . 'permalink' 
            || $this_tag == $prefix . 'archivelink' ) {
            return $app->get_permalink( $obj, false, true );
        }
        if ( $this_tag == $obj->_model . 'permalink' 
            || $this_tag == $obj->_model . 'archivelink' ) {
            return $app->get_permalink( $obj, false, true );
        }
    }

    function hdlr_columnproperty ( $args, $ctx ) {
        $app = $ctx->app;
        $model = isset( $args['model'] ) ? strtolower( $args['model'] ) : '';
        $name = isset( $args['name'] ) ? strtolower( $args['name'] ) : '';
        $property = isset( $args['property'] ) ? strtolower( $args['property'] ) : '';
        if (! $name || ! $model ||! $property ) return '';
        $table = $app->get_table( $model );
        if (! $table ) return '';
        $column = $app->db->model( 'column' )->get_by_key(
                                        ['name' => $name, 'table_id' => $table->id ] );
        if ( $column->has_column( $property ) ) {
            return $column->$property;
        }
    }

    function hdlr_asseturl ( $args, $ctx ) {
        $args['this_tag'] = 'assetfileurl';
        return $this->hdlr_get_objecturl( $args, $ctx );
    }

    function hdlr_get_objecturl ( $args, $ctx ) {
        $app = $ctx->app;
        $this_tag = $args['this_tag'];
        $fileurl_tags = $ctx->stash( 'fileurl_tags' );
        if ( $fileurl_tags === null ) {
            // When __stash reseted.
            $this->init_tags();
            $fileurl_tags = $app->ctx->stash( 'fileurl_tags' );
        }
        $key = $fileurl_tags[ $this_tag ];
        $current_context = $ctx->stash( 'current_context' );
        $workspace_tags = $ctx->stash( 'workspace_tags' );
        if ( $workspace_tags && in_array( $this_tag, $workspace_tags ) ) {
            $current_context = 'workspace';
        } else {
            $table_abbrs_map = $ctx->stash( 'table_abbrs_map' );
            if ( is_array( $table_abbrs_map ) ) {
                $col_abbr = preg_replace( '/[^a-z0-9]/', '' , $key );
                $tag_context = preg_replace( '/' . $col_abbr . 'url$/i', '', $this_tag );
                if ( isset( $table_abbrs_map[ $tag_context ] ) ) {
                    $current_context = $table_abbrs_map[ $tag_context ];
                }
            }
        }
        $obj = $ctx->stash( $current_context );
        $in_preview = false;
        $user = $app->user();
        if ( $app->in_preview && $user ) {
            $in_preview = true;
            if ( is_object( $obj ) && $obj->id != $app->param( 'id' ) ) {
            } else {
                $sess_name = $app->param( '_screen_id' );
                $sess_name = "{$sess_name}-{$key}";
                $session = $app->db->model( 'session' )->get_by_key( ['name' => $sess_name ] );
                if ( $session->id ) {
                    $params = '?__mode=get_temporary_file&data=1&id=session-' . $session->id;
                    return $app->admin_url . $params;
                }
            }
        }
        if (!$obj && !is_object( $obj ) && $app->urltag_compat !== false ) {
            // Backward compatibility.
            $obj = $ctx->stash( $ctx->stash( 'current_context' ) );
        }
        if (!$obj && !is_object( $obj ) ) {
            return '';
        }
        if ( $in_preview && ! $obj->id ) return '';
        $terms = ['model' => $obj->_model, 'object_id' => $obj->id, 'key' => $key, 'class' => 'file'];
        $args = ['sort' => 'id', 'direction' => 'ascend', 'limit' => 1];
        $urlinfo = $app->db->model( 'urlinfo' )->load( $terms, $args );
        if (! is_array( $urlinfo ) || empty( $urlinfo ) ) {
            if ( ( $in_preview || $app->id == 'Bootstrapper' ) && $user ) {
                $terms['delete_flag'] = [0, 1];
                $args['sort'] = 'delete_flag';
                $urlinfo = $app->db->model( 'urlinfo' )->load( $terms, $args );
            }
        }
        if ( is_array( $urlinfo ) && ! empty( $urlinfo ) ) {
            $urlinfo = $urlinfo[0];
        } else {
            $urlinfo = null;
        }
        if ( $urlinfo && $urlinfo->delete_flag && $urlinfo->class == 'file' ) {
            $column = $urlinfo->key;
            if ( $obj->has_column( $column ) ) {
                if ( $obj->$column === '' ) return ''; // Not SELECT COLUMN is NULL
            }
        }
        if (! $urlinfo ) {
            if ( $user ) {
                if ( $obj->$key === null && $obj->has_column( $key ) ) {
                    $obj = $app->db->model( $obj->_model )->load( $obj->id, [], $key );
                }
                $admin_url = $app->admin_url;
                if ( strpos( $admin_url, 'http' ) !== 0
                    && strpos( $admin_url, '/' ) === 0 ) {
                    $admin_url = $app->base . $admin_url;
                }
                if ( isset( $obj->__session ) && $obj->_model == 'attachmentfile' ) {
                    $session = $obj->__session;
                    $params = '?__mode=get_temporary_file&data=1&id=session-' . $session->id;
                    return $admin_url . $params;
                } else if ( $in_preview || $app->force_dynamic ) {
                    if ( $obj->$key ) {
                        $params = "?__mode=view&view={$key}&_type=edit&_model={$current_context}&id=" . $obj->id;
                        if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
                            $params .= '&workspace_id=' . (int) $obj->workspace_id;
                        }
                        return $admin_url . $params;
                    }
                }
            }
            return '';
        }
        if ( $urlinfo->model == 'asset' && !$app->encode_filename_compat ) {
            $_url = $urlinfo->url;
            $_url = $app->ctx->modifier_encode_url_basename( $_url, 1, $app->ctx );
            return $_url;
        }
        return $urlinfo->url;
    }

    function hdlr_canonicallink ( $args, $ctx ) {
        $canonicalurl = $this->hdlr_canonicalurl( $args, $ctx );
        $format = $args['format'] ?? 'html';
        if ( strtolower( $format ) === 'html' ) {
            return '<link rel="canonical" href="' . $canonicalurl . '">';
        }
        return '<link rel="canonical" href="' . $canonicalurl . '" />';
    }

    function hdlr_canonicalurl ( $args, $ctx ) {
        $app = $ctx->app;
        $canonicalurl = '';
        $obj = null;
        $urlmapping = null;
        $urlinfo = $ctx->stash( 'current_urlinfo' );
        if ( $urlinfo ) {
            $obj = $urlinfo->object();
            $urlmapping = $urlinfo->urlmapping;
        } else {
            // If `current_urlinfo` is not set.
            $context = $ctx->stash( 'current_context' );
            if ( $context && $app->get_table( $context ) ) {
                $obj = $ctx->stash( $context );
            }
            $urlmapping = $ctx->stash( 'current_urlmapping' );
        }
        if ( !$app->canonicalurl_compat && $obj ) {
            // Current URL is not date based, and not preferred URL.
            if ( !$urlmapping || ( !$urlmapping->is_preferred && !$urlmapping->date_based ) ) {
                $permalink = $app->get_permalink( $obj );
                if ( $permalink ) {
                    $canonicalurl = $permalink;
                }
            }
        }
        if (! $canonicalurl && isset( $ctx->vars['current_archive_url'] ) ) {
            $canonicalurl = $ctx->vars['current_archive_url'];
        }
        if (! $canonicalurl ) {
            if ( $app->id === 'Bootstrapper' ) {
                if ( $urlinfo ) {
                    $canonicalurl = $urlinfo->url;
                } else {
                    list( $request, $param ) = array_pad( explode( '?', $app->request_uri ), 2, null );
                    if ( preg_match( '!/$!', $request ) ) {
                        $request .= $app->directory_index;
                    }
                    $host = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : null;
                    if (! $host ) {
                        $host = isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : null;
                    }
                    $protocol= $app->is_secure ? 'https' : 'http';
                    $canonicalurl = "{$protocol}://{$host}{$request}";
                }
            }
            if (! $canonicalurl ) {
                if ( $obj ) {
                    $permalink = $app->get_permalink( $obj );
                    if ( $permalink ) {
                        $canonicalurl = $permalink;
                    }
                }
            }
        }
        if ( stripos( $canonicalurl, $app->directory_index ) !== false &&
            !isset( $args['with_index'] ) ) {
            $directory_index = preg_quote( $app->directory_index, '/' );
            $canonicalurl = preg_replace( "/\/$directory_index$/", '/', $canonicalurl );
        }
        return $canonicalurl;
    }

    function hdlr_objecttoresource ( $args, $ctx ) {
        return $this->hdlr_objecttojson( $args, $ctx );
    }

    function hdlr_objecttojson ( $args, $ctx ) {
        $app = $ctx->app;
        $this_tag = $args['this_tag'];
        $current_context = isset( $args['model'] ) ? $args['model'] : $ctx->stash( 'current_context' );
        $id = isset( $args['id'] ) ? (int) $args['id'] : null;
        $obj = $id ? $app->db->model( $current_context )->load( $id ) : $ctx->stash( $current_context );
        if ( $obj ) {
            if ( $app->objecttojson_compat && $this_tag == 'objecttojson' ) {
                $resource = PTUtil::object_to_resource( $obj );
                $cols = isset( $args['cols'] ) ? $args['cols'] : '*';
                if ( $cols !== '*' ) {
                    $cols = is_array( $cols ) ? $cols : preg_split( '/\s*,\s*/', $args['cols'] );
                    foreach ( $resource as $key => $value ) {
                        if (! in_array( $key, $cols ) ) {
                            unset( $resource[ $key ] );
                        }
                    }
                }
                return json_encode( $resource, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
            } else {
                $cols = isset( $args['cols'] ) ? $args['cols'] : null;
                if ( $cols && is_string( $cols ) ) {
                    $cols = explode( ',', $cols );
                }
                $class = $this->restfulapi;
                if (! $class ) {
                    require_once( LIB_DIR . 'Prototype' . DS .'class.PTRESTfulAPI.php' );
                    $class = new PTRESTfulAPI( ['id' => $app->id ] );
                    $class->db = $app->db;
                    $class->ctx = $app->ctx;
                    $class->core_tags = $app->core_tags;
                    $class->cache_dir = $app->cache_dir;
                    $class->temp_dir = $app->temp_dir;
                    $class->cache_driver = $app->cache_driver;
                    $this->restfulapi = $class;
                    // $class->init();
                }
                $resource = $class->object_to_resource( $obj, $cols );
                if ( $this_tag == 'objecttojson' ) {
                    return $class->json_encode( $resource );
                }
                return $resource;
            }
        }
    }

    function hdlr_container_count ( $args, $ctx ) {
        $app = $ctx->app;
        $this_tag = $args['this_tag'];
        $count_tags = $ctx->stash( 'count_tags' );
        if ( $count_tags === null ) {
            // When __stash reseted.
            $this->init_tags();
            $count_tags = $app->ctx->stash( 'count_tags' );
        }
        if ( isset( $args['_filter'] ) && isset( $count_tags[ $this_tag ] ) ) {
            $model = $count_tags[ $this_tag ];
            $table = $app->get_table( $model );
            if ( $table ) {
                $plural = strtolower( $table->plural );
                $plural = preg_replace( '/[^a-z0-9]/', '' , $plural );
                if ( $ctx->stash( 'blockmodel_' . $plural ) == $model ) {
                    $args['this_tag'] = $plural;
                    $args['_count'] = 1;
                    $args['model'] = $model;
                    unset( $args['_filter'] );
                    $repeat = true;
                    $content = null;
                    $counter = 0;
                    $count = (int) $this->hdlr_objectloop( $args, $content, $ctx, $repeat, $counter );
                    return $count;
                }
            }
        }
        $orig_args = $args;
        $tag_count_compat = property_exists( $app, 'tag_count_compat' ) ? $app->tag_count_compat : false;
        if ( $tag_count_compat ) return $this->hdlr_container_count_compat( $args, $ctx );
        $terms = [];
        $context = $ctx->stash( 'current_context' );
        if ( $app->weak_count_context ) {
            if ( $ctx->stash( 'inside_archivelist' ) ) {
                $context = null;
            }
        }
        $at = $ctx->stash( 'current_archive_context' )
            ? $ctx->stash( 'current_archive_context' )
            : $ctx->stash( 'current_archive_type' );
        $curr_at = $ctx->stash( 'current_archive_type' );
        if ( $curr_at && ( $curr_at === 'monthly' || $curr_at === 'yearly'
            || $curr_at === 'fiscal-yearly' ) ) {
            $at = $curr_at;
        }
        $context_model = isset( $args['context'] ) ? $args['context'] : null;
        if ( $context_model && ! $app->get_table( $context_model ) ) {
            $context_model = null;
        }
        if ( $context_model && ! $ctx->stash( $context_model ) ) {
            $context_model = null;
        }
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $model = isset( $args['container'] ) ? $args['container'] : $count_tags[ $this_tag ];
        $table = isset( $table ) ? $table : $app->get_table( $model );
        $archive_date_based = false;
        $ignore_archive_context = isset( $args['ignore_archive_context'] )
                                ? $args['ignore_archive_context'] : false;
        $date_based = ['daily', 'monthly', 'yearly', 'fiscal-yearly', 'dayly']; // 'dayly' is backward compatibility.
        if ( $at && ( in_array( $at, $date_based ) ) ) {
            if ( $ignore_archive_context === '1' || $ignore_archive_context === 'date_based' ) {
                $archive_date_based = false;
                $at = 'index';
            } else {
                $archive_date_based = true;
            }
        }
        if ( isset( $args['archive_date_based'] ) ) {
            $archive_type = $args['archive_date_based'];
            if ( $archive_type && ( in_array( $archive_type, $date_based ) ) ) {
                $archive_date_based = true;
                $at = $archive_type;
            }
        }
        $rel_args = [];
        if ( $table->has_status ) {
            $include_draft = isset( $args['include_draft'] )
                           ? true : false;
            if (! $include_draft ) {
                $terms['status'] = $app->status_published( $model );
                $rel_args['status'] = $terms['status'];
            }
        }
        if ( $table->revisable ) {
            $terms['rev_type'] = 0;
            $rel_args['rev_type'] = 0;
        }
        $extra = '';
        $callback = ['name' => 'pre_archive_count', 'model' => $model ];
        $app->init_callbacks( $model, 'pre_archive_count' );
        $_model = $app->db->model( $model );
        if ( $archive_date_based ) {
            $ts = $ctx->stash( 'current_timestamp' );
            $ts_end = $ctx->stash( 'current_timestamp_end' );
            if (! $ts ) return 0;
            $fiscal_start = null;
            if ( $at === 'fiscal-yearly' ) {
                $fiscal_start = isset( $args['fiscal_start'] ) ? $args['fiscal_start'] : 0;
                if (! $fiscal_start ) {
                    $map = $ctx->stash( 'current_urlmapping' );
                    if ( $map && $map->date_based === 'Fiscal-Yearly' ) {
                        $fiscal_start = $map->fiscal_start;
                    } else {
                        $map_terms = ['date_based' => 'Fiscal-Yearly'];
                        if ( $workspace ) $map_terms['workspace_id'] = $workspace->id;
                        $map = $app->db->model( 'urlmapping' )
                            ->load( $map_terms, ['limit' => 1] );
                        if ( is_array( $map ) && !empty( $map ) ) {
                            $map = $map[0];
                            $fiscal_start = $map->fiscal_start;
                        } else if ( isset( $map_terms['workspace_id'] ) ) {
                            unset( $map_terms['workspace_id'] );
                            $map = $app->db->model( 'urlmapping' )
                                ->load( $map_terms, ['limit' => 1] );
                            if ( is_array( $map ) && !empty( $map ) ) {
                                $map = $map[0];
                                $fiscal_start = $map->fiscal_start;
                            }
                        }
                    }
                }
                if (! $fiscal_start ) $fiscal_start = $app->fiscal_start;
            }
            list( $title, $start, $end ) = $app->title_start_end( $at, $ts, $fiscal_start );
            if ( $ts && $ts_end ) {
                list( $start, $end ) = [ $ts, $ts_end ];
            }
            $ws_attr = '';
            if ( $_model->has_column( 'workspace_id' ) ) {
                $ws_attr = $this->include_exclude_workspaces( $app, $orig_args, $_model );
                if ( $ws_attr ) {
                    $ws_attr = " AND {$model}_workspace_id {$ws_attr}";
                    $extra .= $ws_attr;
                }
            }
            if (! $extra && $workspace ) {
                $terms['workspace_id'] = $workspace->id;
            }
            $container = $ctx->stash( 'current_container' );
            if ( $container ) {
                if ( $model && $container && $context && (! $ignore_archive_context
                    || $ignore_archive_context != $context ) ) {
                    $ctx_model = $context_model ? $ctx->stash( $context_model ) : $ctx->stash( $context );
                    if ( is_object( $ctx_model ) ) {
                        $has_column = $app->db->model( 'column' )->count(
                            ['table_id' => $table->id, 'type' => 'relation', 'options' => $context ] );
                        if ( $has_column ) {
                            $relations = $app->db->model( 'relation' )->load_iter( 
                                                    ['to_obj' => $context, 'to_id' => $ctx_model->id,
                                                     'from_obj' => $model ], $rel_args, 'from_id' );
                            $ids = $relations->fetchAll( PDO::FETCH_COLUMN );
                            if ( empty( $ids ) ) return 0;
                            $terms['id'] = ['IN' => $ids ];
                        }
                    }
                }
            }
            $obj = $app->db->model( $model )->new();
            $date_col = $app->get_date_col( $obj );
            if ( $app->weak_count_context ) {
                if ( !$ctx->stash( 'inside_objectloop' ) || $ctx->stash( 'inside_archivelist' ) ) {
                    $terms[ $date_col ] = ['BETWEEN' => [ $start, $end ] ];
                }
            } else {
                $terms[ $date_col ] = ['BETWEEN' => [ $start, $end ] ];
            }
        } else {
            $at = ( $ignore_archive_context == '1' || $ignore_archive_context == $context )
                ? 'index' : $at;
            if ( $at == 'template' ) $at = 'index';
            if ( $context && $at == 'index' && $ignore_archive_context == 'date_based' ) {
                $at = $context;
            }
            $args = [];
            $container = $ctx->stash( 'current_container' );
            $ws_attr = '';
            if (! $context_model && 
               (! $context || ( $container && $container != $context ) || $at == 'index' ) ) {
                if ( $_model->has_column( 'workspace_id' ) ) {
                    if ( isset( $orig_args['workspace_id'] ) && is_numeric( $orig_args['workspace_id'] ) ) {
                        $terms['workspace_id'] = $orig_args['workspace_id'];
                    } else {
                        $ws_attr = $this->include_exclude_workspaces( $app, $orig_args, $_model );
                        if ( $ws_attr ) {
                            $ws_attr = " AND {$model}_workspace_id {$ws_attr}";
                            $extra .= $ws_attr;
                        }
                        if (! $extra && $workspace ) {
                            $terms['workspace_id'] = $workspace->id;
                        }
                    }
                }
                if ( ( $at == 'index' )
                    || (! $container && $model )
                    || ( $container && ( $container != $model ) ) ) {
                    if (! $ignore_archive_context ) {
                        $start = $ctx->stash( 'current_timestamp' );
                        $end = $ctx->stash( 'current_timestamp_end' );
                        if ( $start && $end ) {
                            $date_based_col = $app->get_date_col( $_model );
                            if ( $date_based_col ) {
                                if ( $app->weak_count_context ) {
                                    if ( !$ctx->stash( 'inside_objectloop' ) || $ctx->stash( 'inside_archivelist' ) ) {
                                        $terms[ $date_based_col ] = ['BETWEEN' => [ $start, $end ] ];
                                    }
                                } else {
                                    $terms[ $date_based_col ] = ['BETWEEN' => [ $start, $end ] ];
                                }
                            }
                        }
                    }
                    $ex_vals = [];
                    $app->run_callbacks( $callback, $model, $terms, $args, $extra, $ex_vals );
                    return $_model->count( $terms, [], '', $extra, $ex_vals );
                }
            }
            $obj = $context_model ? $ctx->stash( $context_model ) : $ctx->stash( $context );
            if (! $obj ) return 0;
            $args = array_merge( $args, $rel_args );
            $relations = $app->db->model( 'relation' )->load_iter( 
                                    ['to_obj' => $context, 'to_id' => $obj->id,
                                     'from_obj' => $model ], $args, 'from_id' );
            $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
            unset( $args['status'], $args['rev_type'] );
            if ( empty( $relations ) ) {
                if ( $_model->has_column( 'workspace_id' ) && !$extra && !$ws_attr ) {
                    $ws_attr = $this->include_exclude_workspaces( $app, $orig_args, $_model );
                    if ( $ws_attr ) {
                        $ws_attr = " AND {$model}_workspace_id {$ws_attr}";
                        $extra .= $ws_attr;
                    }
                }
                // Relation type int.
                $relation_int = false;
                $container_count_map = $app->stash( 'container_count_tag_map' )
                                     ? $app->stash( 'container_count_tag_map' ) : [];
                if (! empty( $container_count_map ) && isset( $container_count_map[ $context ][ $model ] )
                    && $container_count_map[ $context ][ $model ] !== false ) {
                    $terms[ $container_count_map[ $context ][ $model ] ] = $obj->id;
                    $relation_int = true;
                } else {
                    $cols = $app->db->model( 'column' )->load(
                        ['table_id' => $table->id, 'type' => 'int', 'column_edit' => ['!=' => '']],
                        [], 'name,column_edit' );
                    foreach ( $cols as $col ) {
                        if ( strpos( $col->column_edit, 'relation' ) === 0
                            && strpos( $col->column_edit, ':' ) !== false ) {
                            $parts = explode( ':', $col->column_edit );
                            if ( $parts[1] == $context ) {
                                $terms[ $col->name ] = $obj->id;
                                $container_count_map[ $context ][ $model ] = $col->name;
                                $app->stash( 'container_count_tag_map', $container_count_map );
                                $relation_int = true;
                                break;
                            }
                        }
                    }
                }
                if (! $relation_int ) {
                    $container_count_map[ $context ][ $model ] = false;
                    $app->stash( 'container_count_tag_map', $container_count_map );
                    return 0;
                }
            } else {
                $terms['id'] = ['IN' => $relations ];
            }
        }
        if (! $ws_attr && $obj->has_column( 'workspace_id' ) && !isset( $terms['workspace_id'] ) ) {
            $terms['workspace_id'] = (int) $workspace_id;
        }
        if ( $model === 'tag' && !isset( $args['include_private'] )
            || ( isset( $args['include_private'] ) && !$args['include_private'] ) ) {
            $terms['name'] = ['not like' => '@%'];
        }
        $loaded_ids = [];
        if ( isset( $orig_args['unique'] ) && $orig_args['unique'] ) {
            $loaded_ids = $ctx->stash( "{$model}_ids_published" )
                        ? $ctx->stash( "{$model}_ids_published" ) : [];
            $loaded_ids = array_keys( $loaded_ids );
        }
        if ( isset( $orig_args['exclude_ids'] ) && $orig_args['exclude_ids'] ) {
            $exclude_ids = $orig_args['exclude_ids'];
            $exclude_ids = is_array( $exclude_ids )
                         ? $exclude_ids : preg_split( "/\s*,\s*/", $exclude_ids );
            $loaded_ids = array_merge( $loaded_ids, $exclude_ids );
        }
        if (! empty( $loaded_ids ) ) {
            array_walk( $loaded_ids, function( &$i ){ $i += 0; } );
            $loaded_ids = array_unique( $loaded_ids );
            $extra .= " AND {$model}_id NOT IN (" . implode( ',', $loaded_ids ) . ')';
        }
        $args = [];
        $ex_vals = [];
        $app->init_callbacks( $model, 'pre_archive_count' );
        $app->run_callbacks( $callback, $model, $terms, $args, $extra, $ex_vals );
        $cnt = $app->db->model( $model )->count( $terms, $args, '', $extra, $ex_vals );
        return $cnt;
    }

    function hdlr_container_count_compat ( $args, $ctx ) {
        // Backward compatibility.
        $app = $ctx->app;
        $terms = [];
        $context = $ctx->stash( 'current_context' );
        $this_tag = $args['this_tag'];
        $count_tags = $ctx->stash( 'count_tags' );
        $at = $ctx->stash( 'current_archive_context' )
            ? $ctx->stash( 'current_archive_context' )
            : $ctx->stash( 'current_archive_type' );
        $curr_at = $ctx->stash( 'current_archive_type' );
        if ( $curr_at && ( $curr_at === 'monthly' || $curr_at === 'yearly'
            || $curr_at === 'fiscal-yearly' ) ) {
            $at = $curr_at;
        }
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $model = isset( $args['container'] ) ? $args['container'] : $count_tags[ $this_tag ];
        $table = $app->get_table( $model );
        $archive_date_based = false;
        $ignore_archive_context = false;
        if ( $at && ( $at === 'monthly' || $at === 'yearly' || $at === 'fiscal-yearly' ) ) {
            if (! isset( $args['ignore_archive_context'] ) ) {
                $archive_date_based = true;
            } else if ( $args['ignore_archive_context']
                || $args['ignore_archive_context'] === '' ) {
                $archive_date_based = false;
                $at = 'index';
                $ignore_archive_context = true;
            }
        }
        if ( $table->has_status ) {
            $include_draft = isset( $args['include_draft'] )
                           ? true : false;
            if (! $include_draft ) {
                $terms['status'] = $app->status_published( $model );
            }
        }
        if ( $table->revisable ) {
            $terms['rev_type'] = 0;
        }
        $extra = '';
        $callback = ['name' => 'pre_archive_count', 'model' => $model ];
        $app->init_callbacks( $model, 'pre_archive_count' );
        $_model = $app->db->model( $model );
        if ( $archive_date_based ) {
            $ts = $ctx->stash( 'current_timestamp' );
            if (! $ts ) return 0;
            $fiscal_start = null;
            if ( $at === 'fiscal-yearly' ) {
                $fiscal_start = isset( $args['fiscal_start'] ) ? $args['fiscal_start'] : 0;
                if (! $fiscal_start ) {
                    $map = $ctx->stash( 'current_urlmapping' );
                    if ( $map && $map->date_based === 'Fiscal-Yearly' ) {
                        $fiscal_start = $map->fiscal_start;
                    } else {
                        $map_terms = ['date_based' => 'Fiscal-Yearly'];
                        if ( $workspace ) $map_terms['workspace_id'] = $workspace->id;
                        $map = $app->db->model( 'urlmapping' )
                            ->load( $map_terms, ['limit' => 1] );
                        if ( is_array( $map ) && !empty( $map ) ) {
                            $map = $map[0];
                            $fiscal_start = $map->fiscal_start;
                        } else if ( isset( $map_terms['workspace_id'] ) ) {
                            unset( $map_terms['workspace_id'] );
                            $map = $app->db->model( 'urlmapping' )
                                ->load( $map_terms, ['limit' => 1] );
                            if ( is_array( $map ) && !empty( $map ) ) {
                                $map = $map[0];
                                $fiscal_start = $map->fiscal_start;
                            }
                        }
                    }
                }
                if (! $fiscal_start ) $fiscal_start = $app->fiscal_start;
            }
            list( $title, $start, $end ) = $app->title_start_end( $at, $ts, $fiscal_start );
            $ws_attr = '';
            if ( $_model->has_column( 'workspace_id' ) ) {
                $ws_attr = $this->include_exclude_workspaces( $app, $args, $_model );
                if ( $ws_attr ) {
                    $ws_attr = " AND {$model}_workspace_id {$ws_attr}";
                    $extra .= $ws_attr;
                }
            }
            if (! $extra && $workspace ) {
                $terms['workspace_id'] = $workspace->id;
            }
            $obj = $app->db->model( $model )->new();
            $date_col = $app->get_date_col( $obj );
            if ( $date_col ) {
                $terms[ $date_col ] = ['BETWEEN' => [ $start, $end ] ];
            }
        } else {
            $at = $ignore_archive_context ? 'index' : $at;
            if ( $at == 'template' ) $at = 'index';
            $args = [];
            $container = $ctx->stash( 'current_container' );
            $ws_attr = '';
            if (! $context || ( $container && $container != $context ) || $at == 'index' ) {
                if ( ( $at == 'index' )
                    || (! $container && $model )
                    || ( $container && ( $container != $model ) ) ) {
                    if ( $_model->has_column( 'workspace_id' ) ) {
                        $ws_attr = $this->include_exclude_workspaces( $app, $args, $_model );
                        if ( $ws_attr ) {
                            $ws_attr = " AND {$model}_workspace_id {$ws_attr}";
                            $extra .= $ws_attr;
                        }
                    }
                    if (! $extra && $workspace ) {
                        $terms['workspace_id'] = $workspace->id;
                    }
                    if (! $ignore_archive_context ) {
                        $start = $ctx->stash( 'current_timestamp' );
                        $end = $ctx->stash( 'current_timestamp_end' );
                        if ( $start && $end ) {
                            $date_based_col = $app->get_date_col( $_model );
                            if ( $date_based_col ) {
                                $terms[ $date_based_col ] = ['BETWEEN' => [ $start, $end ] ];
                            }
                        }
                    }
                    $ex_vals = [];
                    $app->run_callbacks( $callback, $model, $terms, $args, $extra, $ex_vals );
                    return $_model->count( $terms, [], '', $extra, $ex_vals );
                }
            }
            $obj = $ctx->stash( $context );
            if (! $obj ) return 0;
            $relations = $app->db->model( 'relation' )->load( 
                                    ['to_obj' => $context, 'to_id' => $obj->id,
                                     'from_obj' => $model ], $args, 'from_id' );
            if ( empty( $relations ) ) return 0;
            if (! $table->has_status && ! $table->revisable )
                return count( $relations );
            $ids = [];
            foreach ( $relations as $rel ) {
                $ids[ (int) $rel->from_id ] = true;
            }
            if ( empty( $ids ) ) return 0;
            $ids = array_keys( $ids );
            $terms['id'] = ['IN' => $ids ];
        }
        if (! $ws_attr && $obj->has_column( 'workspace_id' ) && !isset( $terms['workspace_id'] ) ) {
            $terms['workspace_id'] = (int) $workspace_id;
        }
        if ( $model == 'tag' && !isset( $args['include_private'] )
            || ( isset( $args['include_private'] ) && !$args['include_private'] ) ) {
            $terms['name'] = ['not like' => '@%'];
        }
        $args = [];
        $ex_vals = [];
        $app->init_callbacks( $model, 'pre_archive_count' );
        $app->run_callbacks( $callback, $model, $terms, $args, $extra, $ex_vals );
        return $app->db->model( $model )->count( $terms, $args, '', $extra, $ex_vals );
    }

    function hdlr_archivelist ( $args, &$content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $at = isset( $args['type'] ) ? strtolower( $args['type'] ) : '';
        if (! $at ) $at = isset( $args['archive_type'] ) ? strtolower( $args['archive_type'] ) : '';
        if (! $at ) {
            $repeat = $ctx->false();
            return '';
        }
        $date_based = false;
        if ( $at === 'daily' || $at === 'monthly'
            || $at === 'yearly' || $at === 'fiscal-yearly' ) {
            $at = $at === 'fiscal-yearly' ? 'Fiscal-Yearly' : ucfirst( $at );
            $date_based = true;
        }
        $local_vars = ['current_archive_type', 'current_archive_title', 'archive_title',
                       'current_archive_link', 'current_timestamp', 'current_timestamp_end',
                       'inside_archivelist', 'current_urlmapping'];
        if (! $counter ) {
            $terms = [];
            $ctx->localize( $local_vars );
            $model = isset( $args['model'] ) ? $args['model'] : '';
            $container = isset( $args['container'] ) ? $args['container'] : '';
            if ( $model ) $terms['model'] = $model;
            $workspace = $ctx->stash( 'workspace' ) 
                       ? $ctx->stash( 'workspace' ) : $app->workspace();
            $workspace_id = 0;
            if ( $workspace ) {
                $terms['workspace_id'] = ['IN' => [0, $workspace->id ] ];
                $workspace_id = $workspace->id;
            } else {
                $terms['workspace_id'] = 0;
            }
            $urlmapping = isset( $args['urlmapping'] ) ? $args['urlmapping'] : '';
            if ( $urlmapping ) {
                $terms['name'] = $urlmapping;
            }
            if ( $date_based ) {
                $terms['date_based'] = $at;
            }
            if (! $urlmapping && ! $date_based ) {
                $obj = $app->db->model( $at )->new();
                if ( $obj ) {
                    $model = $model ? $model : $at;
                    $terms['model'] = $model;
                }
            }
            if ( $container ) $terms['container'] = $container;
            $_args = ['sort' => 'workspace_id', 'direction' => 'descend', 'limit' => 1];
            $urlmapping = $app->db->model( 'urlmapping' )->load( $terms, $_args );
            $fy_start = $app->fiscal_start;
            if (! empty( $urlmapping ) ) $urlmapping = $urlmapping[0];
            if ( $urlmapping && is_object( $urlmapping ) && $urlmapping->id ) {
                $model = $model ? $model : $urlmapping->model;
                $container = $container ? $container : $urlmapping->container;
                if (! $container && $date_based ) $container = 'entry';
                $workspace_id = $urlmapping->workspace_id;
                $fy_start = $urlmapping->fiscal_start;
                $ctx->stash( 'current_urlmapping', $urlmapping );
            } else {
                $repeat = $ctx->false();
                $ctx->restore( $local_vars );
                return '';
            }
            $fy_end = $fy_start == 1 ? 12 : $fy_start - 1;
            $archive_loop = [];
            if (! $date_based ) {
                if ( $model === 'template' ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $terms = [];
                $obj = $app->db->model( $model )->new();
                $table = $app->get_table( $model );
                if ( $obj->has_column( 'workspace_id' ) ) {
                    $obj->workspace_id( $workspace_id );
                }
                $load_args = [];
                if ( isset( $args['sort_order'] ) ) {
                    $sort_order = $args['sort_order'];
                    $sort_order = stripos( $sort_order, 'asc' ) === 0 ? 'ascend' : 'descend';
                    $load_args['order'] = $sort_order;
                }
                if ( isset( $args['sort_by'] ) ) {
                    $sort_by = $args['sort_by'];
                    if ( $obj->has_column( $sort_by ) ) {
                        $load_args['sort'] = $sort_by;
                    }
                }
                if ( isset( $args['limit'] ) ) {
                    $load_args['limit'] = (int) $args['limit'];
                }
                $terms = PTUtil::setup_terms( $obj, $terms );
                $objects = $app->db->model( $model )->load( $terms, $load_args );
                $title_col = isset( $args['title_col'] ) ? $args['title_col'] : $table->primary;
                foreach ( $objects as $object ) {
                    $url = $app->build_path_with_map( $object, $urlmapping, $table, null, true );
                    $archive_loop[] = ['archive_title' => $object->$title_col,
                                       'archive_link'  => $url ];
                }
            } else {
                $container_obj = $app->db->model( $container )->new();
                $table = $app->get_table( $container );
                $_colprefix = $container_obj->_colprefix;
                $date_col = $app->get_date_col( $container_obj );
                if (! $date_col ) {
                    $repeat = $ctx->false();
                    return '';
                }
                $date_col = $_colprefix . $date_col;
                $_table = $app->db->prefix . $container;
                $day = '';
                if ( $at == 'Daily' ) {
                    $day = ", DAY({$date_col})";
                }
                $sql = "SELECT DISTINCT YEAR({$date_col}), MONTH({$date_col}){$day} FROM $_table";
                $context_model = null;
                $context_obj_id = null;
                $context_obj = null;
                if ( $model !== 'template' ) {
                    $context_obj = $ctx->stash( $model );
                    if ( $context_obj ) {
                        $context_model = $model;
                        $context_obj_id = (int) $context_obj->id;
                    }
                }
                $relation_tbl = $app->db->prefix . 'relation';
                if ( $context_obj ) {
                    $sql .= ',' . $relation_tbl;
                }
                $status_published = $app->status_published( $container );
                $sql .= " WHERE ";
                $wheres = [];
                if ( $status_published ) {
                    $wheres[] = "{$_colprefix}status=$status_published";
                }
                if ( $container_obj->has_column( 'workspace_id' ) ) {
                    if ( $table->space_child && ! $workspace_id ) {
                    } else {
                        $wheres[] = "{$_colprefix}workspace_id=$workspace_id";
                    }
                }
                if ( $container_obj->has_column( 'rev_type' ) ) {
                    $wheres[] = "{$_colprefix}rev_type=0";
                }
                if ( $context_obj ) {
                    $cModel = $container_obj->_model;
                    $cTable = $app->db->prefix . $cModel;
                    $wheres[] = "{$relation_tbl}.relation_from_obj='{$cModel}'";
                    $wheres[] = "{$relation_tbl}.relation_from_id={$cTable}.{$cModel}_id";
                    $wheres[] = "{$relation_tbl}.relation_to_obj='{$context_model}'";
                    $wheres[] = "{$relation_tbl}.relation_to_id={$context_obj_id}";
                }
                $app->init_callbacks( $container_obj->_model, 'pre_archive_list' );
                $callback = ['name' => 'pre_archive_list', 'model' => $container_obj->_model ];
                $app->run_callbacks( $callback, $container_obj->_model, $wheres );
                $sql .= join( ' AND ', $wheres );
                $request_id = $app->request_id;
                $cache_key = md5( "archive-list-{$sql}-{$at}-{$request_id}" );
                $session = null;
                $time_stamp = [];
                $sort_order = 'ascend';
                if ( isset( $args['sort_order'] ) ) {
                    $sort_order = $args['sort_order'];
                    $sort_order = stripos( $sort_order, 'asc' ) === 0 ? 'ascend' : 'descend';
                }
                if ( $app->stash( "timestamp-{$cache_key}" ) ) {
                    $time_stamp = $app->stash( "timestamp-{$cache_key}" );
                } else {
                    $year_month_day = $container_obj->load( $sql );
                    $time_stamp = [];
                    if ( $at == 'Daily' ) {
                        foreach ( $year_month_day as $ymd ) {
                            $ymd = $ymd->get_values();
                            $y = $ymd["YEAR({$date_col})"];
                            $m = $ymd["MONTH({$date_col})"];
                            $d = $ymd["DAY({$date_col})"];
                            $m = sprintf( '%02d', $m );
                            $d = sprintf( '%02d', $d );
                            $ts = "{$y}{$m}{$d}";
                            $time_stamp[ $ts ] = true;
                        }
                    }
                    foreach ( $year_month_day as $ym ) {
                        $ym = $ym->get_values();
                        $y = $ym["YEAR({$date_col})"];
                        $m = $ym["MONTH({$date_col})"];
                        $m = sprintf( '%02d', $m );
                        if ( $at === 'Fiscal-Yearly' ) {
                            if ( $m <= $fy_end ) $y--;
                            $time_stamp[ $y ] = true;
                        } else if ( $at === 'Yearly' ) {
                            $time_stamp[ $y ] = true;
                        } else if ( $at === 'Monthly' ) {
                            $time_stamp[ $y . $m ] = true;
                        }
                    }
                    $app->stash( "timestamp-{$cache_key}", $time_stamp );
                }
                if ( $sort_order == 'ascend' ) {
                    ksort( $time_stamp, SORT_NUMERIC );
                } else {
                    krsort( $time_stamp, SORT_NUMERIC );
                }
                $time_stamp = array_keys( $time_stamp );
                $template = $urlmapping->template;
                $limit = 0;
                if ( isset( $args['limit'] ) ) {
                    $limit = (int) $args['limit'];
                }
                $i = 0;
                foreach ( $time_stamp as $time ) {
                    if ( $limit && $limit <= $i ) break;
                    $ts = '';
                    $ts_end = '';
                    if ( $at === 'Fiscal-Yearly' ) {
                        $fy_start = sprintf( '%02d', $fy_start );
                        $ts = $time . $fy_start . '01000000';
                        $ts_end = date( 'YmdHis', strtotime( $ts . '+11 month' ) );
                        $ts_end = date( 'Ymd235959',strtotime( 'last day of' . $ts_end ));
                    } else if ( $at === 'Yearly' ) {
                        $ts = $time . '0101000000';
                        $ts_end = date( 'YmdHis', strtotime( $ts . '+11 month' ) );
                        $ts_end = date( 'Ymd235959',strtotime( 'last day of' . $ts_end ));
                    } else if ( $at === 'Monthly' ) {
                        $ts = $time . '01000000';
                        $ts_end = date( 'Ymd235959',strtotime( 'last day of' . $ts ));
                    } else if ( $at === 'Daily' ) {
                        $y = substr( $time, 0, 4 );
                        $m = substr( $time, 4, 2 );
                        $d = substr( $time, 6, 2 );
                        $ts = "{$y}{$m}{$d}000000";
                        $ts_end = "{$y}{$m}{$d}235959";
                    }
                    $url = $context_obj ? $app->build_path_with_map( $context_obj, $urlmapping, $table, $ts, true )
                         : $app->build_path_with_map( $template, $urlmapping, $table, $ts, true );
                    $archive_loop[] = ['archive_title' => $time,
                                       'archive_link'  => $url,
                                       'current_timestamp' => $ts,
                                       'current_timestamp_end' => $ts_end ];
                    $i++;
                }
            }
            $ctx->stash( 'inside_archivelist', true );
            $ctx->local_params = $archive_loop;
        }
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $archive = $params[ $counter ];
            $ctx->stash( 'current_archive_title', $archive['archive_title'] );
            $ctx->stash( 'current_archive_type', strtolower( $at ) );
            $ctx->stash( 'current_archive_link', $archive['archive_link'] );
            if ( isset( $archive['current_timestamp'] ) ) {
                $ctx->stash( 'current_timestamp', $archive['current_timestamp'] );
                $ctx->stash( 'current_timestamp_end', $archive['current_timestamp_end'] );
            }
            $repeat = true;
        } else {
            unset( $params );
            $ctx->restore( $local_vars );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_nestableobjects ( $args, &$content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $model = isset( $args['model'] ) ? $args['model'] : '';
        $parent_id = isset( $args['parent_id'] ) ? $args['parent_id'] : '';
        if ( $parent_id === '' ) {
            $repeat = $ctx->false();
            return '';
        }
        $orig_args = $args;
        $local_vars = [ $model, 'current_context', 'nestableobjects', 'nestable_condition'];
        // 'ctx_force_compile',
        if (! $counter ) {
            if (! $model ) {
                $repeat = $ctx->false();
                return '';
            }
            $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : null;
            $scheme = $app->get_scheme_from_db( $model );
            $obj = $app->db->model( $model );
            if (! $obj->has_column( 'parent_id' ) ) {
                $repeat = $ctx->false();
                return '';
            }
            if (! $parent_id ) $parent_id = 0;
            $terms = ['parent_id' => $parent_id ];
            $workspace = $ctx->stash( 'workspace' ) 
                       ? $ctx->stash( 'workspace' ) : $app->workspace();
            if ( $workspace_id ) {
                $terms['workspace_id'] = $workspace_id;
            } else if ( $workspace ) {
                $terms['workspace_id'] = $workspace->id;
            } else if ( $obj->has_column( 'workspace_id' ) ) {
                $table = $app->get_table( $model );
                if (! $table->space_child ) {
                    $terms['workspace_id'] = 0;
                }
            }
            if ( $app->mode != 'view' && $obj->has_column( 'status' ) ) {
                $include_draft = isset( $args['include_draft'] ) ? $args['include_draft'] : false;
                if (! $include_draft ) {
                    $status = $app->status_published( $obj->_model );
                    if ( $status ) {
                        $terms['status'] = $status;
                    }
                }
            }
            if ( $obj->has_column( 'rev_type' ) ) {
                $terms['rev_type'] = 0;
            }
            $cols = isset( $args['cols'] ) ? $args['cols'] : '*';
            $cols = $this->select_cols( $app, $obj, $cols );
            $sort_by = isset( $args['sort_by'] ) ? $args['sort_by'] : 'order';
            $orig_args = $args;
            $args = [];
            if ( $obj->has_column( $sort_by ) ) {
                $sort_order = isset( $orig_args['sort_order'] )
                            && $orig_args['sort_order'] == 'descend '? 'descend' : 'ascend';
                $args = ['sort' => $sort_by, 'direction' => $sort_order ];
            }
            unset( $orig_args['model'], $orig_args['parent_id'],
                   $orig_args['sort_order'], $orig_args['sort_by'] );
            foreach( $orig_args as $key => $value ) {
                if ( $obj->has_column( $key ) ) {
                    $terms[ $key ] = $value;
                } else if ( strpos ( $key, $model . '_' ) === 0 ) {
                    $key = preg_replace( "/^{$model}_/", '', $key );
                    if ( $obj->has_column( $key ) ) {
                        $terms[ $key ] = $value;
                    }
                }
            }
            $table = $app->get_table( $model );
            $callback = ['name' => 'pre_listing', 'model' => $model,
                         'scheme' => $scheme, 'table' => $table,
                         'args' => $orig_args ];
            $extra = '';
            $ex_vals = [];
            $app->init_callbacks( $model, 'pre_archive_list' );
            $app->run_callbacks( $callback, $model, $terms, $args, $extra, $ex_vals );
            $objects = [];
            if ( isset( $orig_args['no_cache'] ) ) {
                $objects = $obj->load( $terms, $args, $cols, $extra, $ex_vals );
            } else {
                $objects = $ctx->stash( 'children_object_' . $model . '_' . $parent_id )
                    ? $ctx->stash( 'children_object_' . $model . '_' . $parent_id )
                    : $obj->load( $terms, $args, $cols, $extra, $ex_vals );
            }
            $app->init_callbacks( $model, 'post_load_objects' );
            $callback = ['name' => 'post_load_objects', 'model' => $model,
                         'table' => $table, 'args' => $orig_args ];
            $count_obj = count( $objects );
            $app->run_callbacks( $callback, $model, $objects, $count_obj );
            if (! is_array( $objects ) || empty( $objects ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $ctx->localize( $local_vars );
            $table = $app->get_table( $model );
            $ctx->stash( 'nestableobjects', $objects );
            $ctx->stash( 'table', $table );
            $ctx->stash( 'current_context', $model );
            // $ctx->stash( 'ctx_force_compile', $ctx->force_compile );
            // $ctx->force_compile = true;
            $ctx->stash( 'nestable_condition', [ $terms, $args, $cols, $extra, $ex_vals ] );
            if ( $app->in_compile ) {
                $objects = array_slice( $objects, 0, 1 );
                $count_obj = 1;
            }
        }
        $table = $ctx->stash( 'table' );
        $primary = $table->primary;
        $params = $ctx->stash( 'nestableobjects' );
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $obj = $params[ $counter ];
            $ctx->stash( $model, $obj );
            $values = $obj->get_values();
            $colprefix = $obj->_colprefix;
            foreach ( $values as $key => $value ) {
                if ( $colprefix ) $key = preg_replace( "/^$colprefix/", '', $key );
                $ctx->local_vars[ $key ] = $value;
            }
            $ctx->local_vars['object_label'] = $obj->$primary;
            if ( isset( $orig_args['permalink'] ) ) {
                $ctx->local_vars['object_permalink'] = $app->get_permalink( $obj );
            }
            list ( $terms, $args, $cols, $extra, $ex_vals ) = $ctx->stash( 'nestable_condition' );
            $terms['parent_id'] = $obj->id;
            $children = $app->db->model( $model )->load( $terms, $args, $cols, $extra, $ex_vals );
            if ( is_array( $children ) && ! empty( $children ) ) {
                $ctx->local_vars['has_children'] = 1;
                $ctx->stash( 'children_object_' . $model . '_' . $obj->id , $children );
            } else {
                unset( $ctx->local_vars['has_children'] );
            }
            $repeat = true;
        } else {
            $repeat = $ctx->false();
            // $ctx->force_compile = $ctx->stash( 'ctx_force_compile' );
            $ctx->restore( $local_vars );
            unset( $params );
        }
        return $content;
    }

    function hdlr_grouploop ( $args, &$content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (! $counter ) {
            $model = isset( $args['model'] ) ? $args['model'] : null;
            $name =  isset( $args['name'] ) ? $args['name'] : null;
            $id =  isset( $args['id'] ) ? $args['id'] : null;
            $workspace = $ctx->stash( 'workspace' );
            if (!$name && !$id ) {
                $repeat = $ctx->false();
                return '';
            }
            $group = null;
            if ( $id ) {
                $group = $app->db->model( 'group' )->load( $id );
            } else {
                $terms = ['name' => $name ];
                $ws_extra = '';
                if (! $app->grouploop_compat ) {
                    $ws_attr = $this->include_exclude_workspaces( $app, $args, $app->db->model( 'group' ), $terms );
                    $ws_extra = $ws_attr ? " AND group_workspace_id {$ws_attr}" : '';
                } else if ( $workspace ) {
                    $terms['workspace_id'] = $workspace->id;
                }
                $group = $app->db->model( 'group' )->load( $terms, ['limit' => 1], 'id,workspace_id,model', $ws_extra );
                if ( is_array( $group ) && count( $group ) ) {
                    $group = $group[0];
                } else {
                    $repeat = $ctx->false();
                    return '';
                }
            }
            if (! $group ) {
                $repeat = $ctx->false();
                return '';
            }
            $model = $group->model;
            $get_args = [];
            $include_draft = isset( $args['include_draft'] )
                ? $args['include_draft'] : false;
            if (! $include_draft ) {
                $get_args['published_only'] = true;
            }
            if ( isset( $args['limit'] ) ) {
                $get_args['limit'] = (int) $args['limit'];
            } else if ( isset( $args['lastn'] ) ) {
                $get_args['limit'] = (int) $args['lastn'];
            }
            if ( isset( $args['offset'] ) ) {
                $get_args['offset'] = (int) $args['offset'];
            }
            $related_objs = $app->get_related_objs( $group, $model, 'objects', $get_args );
            $app->init_callbacks( $model, 'post_load_objects' );
            $table = $app->get_table( $model );
            $callback = ['name' => 'post_load_objects', 'model' => $model, 'table' => $table, 'args' => $args ];
            $count_obj = count( $related_objs );
            $app->run_callbacks( $callback, $model, $related_objs, $count_obj );
            if ( empty( $related_objs ) ) {
                $repeat = $ctx->false();
                return '';
            }
            if ( $app->in_compile ) {
                $related_objs = array_slice( $related_objs, 0, 1 );
                $count_obj = 1;
            }
            $ctx->localize( [ $model, 'current_context'] );
            $ctx->local_params = $related_objs;
            $ctx->stash( 'table', $table );
        }
        $table = $ctx->stash( 'table' );
        $model = $table->name;
        $primary = $table->primary;
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $obj = $params[ $counter ];
            $ctx->stash( $model, $obj );
            $ctx->stash( 'current_context', $obj->_model );
            $values = $obj->get_values();
            $colprefix = $obj->_colprefix;
            foreach ( $values as $key => $value ) {
                if ( $colprefix ) $key = preg_replace( "/^$colprefix/", '', $key );
                $ctx->local_vars[ $key ] = $value;
            }
            $ctx->local_vars['object_label'] = $obj->$primary;
            $repeat = true;
        } else {
            $repeat = $ctx->false();
            $ctx->restore( [ $model, 'current_context'] );
            unset( $params );
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_tables ( $args, &$content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $type = isset( $args['type'] ) ? $args['type'] : 'display_system';
        $workspace_perm = isset( $args['workspace_perm'] ) ? $args['workspace_perm'] : null;
        $workspace_id = isset( $args['workspace_id'] ) ? $args['workspace_id'] : 0;
        if ( $workspace_perm && ! $workspace_id && $app->workspace() ) {
            $workspace_id = $app->workspace()->id;
        }
        if (! $counter ) {
            $orig_args = $args;
            $extra = '';
            $terms = $type && $type !== 'all' ? [ $type => 1] : [];
            $menu_type = isset( $args['menu_type'] ) ? $args['menu_type'] : 0;
            if ( $menu_type ) $terms['menu_type'] = (int) $menu_type;
            $permission = isset( $args['permission'] ) ? $args['permission'] : 0;
            $show_activity = isset( $args['show_activity'] ) ? $args['show_activity'] : 0;
            $global_relations = isset( $args['global_relations'] ) ? $args['global_relations'] : 0;
            $models = [];
            $ws_admin = false;
            $user = $app->user() ?? $app->db->model( 'user' )->new( ['id' => -1, 'is_superuser' => 0] );
            if ( $permission && !$user->is_superuser ) {
                $permissions = $app->permissions();
                foreach ( $permissions as $ws_id => $perms ) {
                    if ( $workspace_id && $workspace_id != $ws_id ) continue;
                    if ( $workspace_perm && $app->workspace() ) {
                        if ( $ws_id != $app->workspace()->id ) {
                            continue;
                        }
                    }
                    if ( in_array( 'workspace_admin', $perms ) ) {
                        $ws_admin = true;
                        if ( $type == 'display_system' ) {
                            $show_tables = $app->stash( 'menu_show_tables' )
                                ? $app->stash( 'menu_show_tables' )
                                : $app->db->model( 'table' )->load( ['display_space' => 1] );
                            $app->stash( 'menu_show_tables', $show_tables );
                            foreach ( $show_tables as $show_table ) {
                                $models[ $show_table->name ] = true;
                            }
                        }
                    } else {
                        foreach ( $perms as $perm ) {
                            if ( strpos( $perm, 'can_list_' ) === 0 ) {
                                $perm = str_replace( 'can_list_', '', $perm );
                                $models[ $perm ] = true;
                            }
                        }
                    }
                }
                if (! $ws_admin ) {
                    if (! empty( $models ) ) {
                        $models = array_keys( $models );
                        $terms['name'] = ['IN' => $models ];
                    } else {
                        $repeat = $ctx->false();
                        return '';
                    }
                } else if (! $workspace_perm ) {
                    if (! empty( $models ) ) {
                        $models = array_keys( $models );
                        $terms['name'] = ['IN' => $models ];
                    } else {
                        $terms['display_space'] = 1;
                    }
                    $terms['hierarchy'] = ['!=' => 1];
                    $extra = " OR ( table_menu_type=$menu_type AND table_display_system=1";
                    $extra .= " AND table_display_space=1 AND table_space_child=1 ";
                    $extra .= " AND table_hierarchy != 1 )";
                }
            }
            $im_export = isset( $args['im_export'] ) ? $args['im_export'] : 0;
            if ( $im_export ) {
                $terms['im_export'] = 1;
            }
            $template_tags = isset( $args['template_tags'] ) ? $args['template_tags'] : 0;
            if ( $template_tags ) {
                $terms['template_tags'] = 1;
            }
            if ( isset( $args['taggable'] ) && $args['taggable'] ) {
                $terms['taggable'] = 1;
            }
            if ( isset( $args['taxonomy'] ) && $args['taxonomy'] ) {
                $terms['taxonomy'] = 1;
            }
            if ( $show_activity ) {
                $terms['show_activity'] = 1;
                if ( $app->workspace() ) {
                    $terms['display_space'] = 1;
                } else {
                    $terms['display_system'] = 1;
                }
            }
            if ( $global_relations ) {
                $terms['display_space'] = 0;
                $sql = "SELECT DISTINCT column_options,column_table_id FROM mt_column WHERE column_type = 'relation'";
                $group = $app->db->db->query( $sql )->fetchAll( PDO::FETCH_ASSOC );
                $names = [];
                foreach ( $group as $g ) {
                    $t = $app->db->model( 'table' )->load( $g['column_table_id'] );
                    if ( $t && $t->display_space ) {
                        if ( $g['column_options'] == '__any__'
                            || $g['column_options'] == 'table' || $g['column_options'] == 'role' ) {
                            continue;
                        }
                        $t = $app->db->model( 'table' )->get_by_key( ['name' => $g['column_options'] ] );
                        if ( $t->id && !$t->display_space ) {
                            $names[ $t->name ] = true;
                        }
                    }
                }
                if (! empty( $names ) ) {
                    $terms['name'] = ['IN' => array_keys( $names ) ];
                }
            }
            $table_model = $app->db->model( 'table' );
            $select_cols = isset( $args['cols'] ) ? $args['cols'] : '*';
            $select_cols = $this->select_cols( $app, $table_model, $select_cols );
            $cache_args = $args;
            $args = ['sort' => 'order'];
            if ( isset( $cache_args['limit'] ) ) {
                $args['limit'] = (int) $cache_args['limit'];
            }
            if ( isset( $cache_args['offset'] ) ) {
                $args['offset'] = (int) $cache_args['offset'];
            }
            $cache_args['extra'] = $extra;
            $app->init_callbacks( 'table', 'pre_load_objects' );
            $app->init_callbacks( 'table', 'post_load_objects' );
            $ex_vals = [];
            $callback =
                ['name' => 'pre_load_objects', 'model' => 'table', 'args' => $orig_args ];
            $app->run_callbacks( $callback, 'table', $terms, $args, $select_cols, $extra, $ex_vals );
            $cache_key = $app->make_cache_key( $terms, $cache_args, 'table' );
            $tables = $app->stash( $cache_key ) ? $app->stash( $cache_key )
                    : $table_model->load( $terms, $args, $select_cols, $extra, $ex_vals );
            $table = $app->get_table( 'table' );
            $callback = ['name' => 'post_load_objects', 'model' => 'table', 'table' => $table, 'args' => $orig_args ];
            $count_obj = count( $tables );
            $app->run_callbacks( $callback, 'table', $tables, $count_obj );
            $app->stash( $cache_key, $tables );
            if (! is_array( $tables ) || empty( $tables ) ) {
                $app->stash( $cache_key, [] );
                $repeat = $ctx->false();
                return '';
            }
            if ( isset( $cache_args['has_column'] ) &&  $cache_args['has_column'] ) {
                $has_columns = [];
                foreach ( $tables as $table ) {
                    $app->get_scheme_from_db( $table->name );
                    if ( $app->db->model( $table->name )->has_column( $cache_args['has_column'] ) ) {
                        $has_columns[] = $table;
                    }
                }
                $tables = $has_columns;
            }
            $ctx->local_params = $tables;
        }
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $obj = $params[ $counter ];
            $values = $obj->get_values();
            $colprefix = $obj->_colprefix;
            foreach ( $values as $key => $value ) {
                if ( $colprefix ) $key = preg_replace( "/^$colprefix/", '', $key );
                $ctx->local_vars[ $key ] = $value;
            }
            $label = $app->translate( $obj->label );
            $plural = $app->translate( $obj->plural );
            $ctx->local_vars['label'] = $plural;
            $repeat = true;
        } else {
            $repeat = $ctx->false();
            unset( $params );
        }
        return $content;
    }

    function hdlr_objectloop ( $args, &$content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $model = isset( $args['model'] ) ? $args['model'] : null;
        $this_tag = $args['this_tag'];
        $model = $model ? $model : $ctx->stash( 'blockmodel_' . $this_tag );
        if (! $model ) {
            // When __stash reseted.
            $table = $app->db->model( 'table' )->load( ['plural' => $this_tag ], ['limit' => 1], 'name' );
            if (! empty( $table ) ) {
                 $model = $table[0]->name;
            }
        }
        $local_vars = [ $model, 'workspace', 'current_context', 'current_archive_context',
                        'current_container', 'current_workspace', 'object_count',
                        'ignore_archive_context', 'offset_last', 'next_offset',
                        'current_offset', 'current_page', 'current_workspace_id',
                        'inside_objectloop'];
        $table = $model !== 'relation' && $model !== 'option'
              && $model !== 'column' && $model !== 'session'
               ? $app->get_table( $model ) : null;
        if (!isset( $content ) ) {
            if (! $model ) {
                $repeat = $ctx->false();
                return '';
            } else if ( $model !== 'relation' && $model !== 'option'
                && $model !== 'column' && $model !== 'session' && !$table ) {
                $repeat = $ctx->false();
                return '';
            }
            $restfulapi = $app->id == 'RESTfulAPI' && $app->method == 'list';
            $orig_args = $args;
            $cb_args = $args;
            $ctx->local_vars['current_workspace'] = $ctx->stash( 'workspace' );
            $workspace_id = 0;
            if ( $ctx->stash( 'workspace' ) ) {
                $ctx->local_vars['current_workspace_id'] = $ctx->stash( 'workspace' )->id;
                $workspace_id = $ctx->stash( 'workspace' )->id;
            } else {
                $ctx->local_vars['current_workspace_id'] = 0;
            }
            $ctx->localize( $local_vars );
            $obj = $app->db->model( $model );
            $scheme = $app->get_scheme_from_db( $model );
            if (! $scheme ) {
                $scheme = ['column_defs' => []];
            }
            $loop_objects = $ctx->stash( 'loop_objects' );
            if (! $loop_objects ) {
                $table_id = isset( $args['table_id'] ) ? (int) $args['table_id'] : null;
                if ( isset( $args['table_id'] ) && !$table_id ) {
                    $repeat = $ctx->false();
                    return $restfulapi ? [] : '';
                }
                $ignore_archive_context = isset( $args['ignore_archive_context'] ) 
                                        ? $args['ignore_archive_context'] : null;
                $ignore_context = isset( $args['ignore_archive_context'] ) ? 1 : 0;
                $ctx->stash( 'ignore_archive_context', $ignore_context );
                $array_and_or = ( isset( $args['array_and_or'] ) && $args['array_and_or'] )
                              ? $args['array_and_or'] : null;
                $terms = [];
                $not_extra = '';
                if ( $table ) {
                    if ( $table->has_status ) {
                        if (! isset( $args['status_lt'] ) && ! isset( $args['status_gt'] ) &&
                            ! isset( $args['status_not'] ) && ! isset( $args['status'] )
                            && ! isset( $args['include_draft'] ) ) {
                            $status_published = $app->status_published( $model );
                            $not_extra = " AND {$model}_status = {$status_published} ";
                        } else if ( isset( $args['status_not'] ) ) {
                            $not = (int) $args['status_not'];
                            $not_extra = " AND {$model}_status != {$not} ";
                        } else if ( isset( $args['status_lt'] ) ) {
                            $lt = (int) $args['status_lt'];
                            $not_extra = " AND {$model}_status < {$lt} ";
                        } else if ( isset( $args['status_gt'] ) ) {
                            $gt = (int) $args['status_gt'];
                            $not_extra = " AND {$model}_status > {$gt} ";
                        } else if ( isset( $args['include_draft'] ) ) {
                            $not_extra = " AND {$model}_status >= 0 ";
                        }
                    }
                    if ( $table->revisable && !isset( $terms['rev_type'] ) ) {
                        $workflow = isset( $args['workflow'] ) ? $args['workflow'] : null;
                        if ( $workflow ) {
                            $not_extra .= " AND {$model}_rev_type != 1 ";
                        } else {
                            $not_extra .= " AND {$model}_rev_type = 0 ";
                        }
                    }
                }
                $extra = '';
                if ( $table_id ) {
                    $terms['table_id'] = $table_id;
                }
                if ( isset( $args['sort_by'] ) ) {
                    $sort_by = $args['sort_by'];
                }
                if ( isset( $sort_by ) && is_array( $sort_by ) ) {
                    // issues #2470
                    $sorts = count( $sort_by );
                    if ( $sorts ) {
                        $sort_order = $args['sort_order'] ?? [];
                        $order = [];
                        if ( is_string( $sort_order ) ) {
                            $sort_order = array_pad( $order, $sorts, $sort_order );
                        } else if ( $sorts > count( $sort_order ) ) {
                            $sort_order = array_pad( $order, $sorts, 'ascend' );
                        }
                        $args_sort = [];
                        foreach ( $sort_by as $idx => $sort_col ) {
                            if ( $obj->has_column( $sort_col, true ) ) {
                                $order = $sort_order[ $idx ];
                                $order = stripos( $order, 'desc' ) === 0 ? 'descend' : 'ascend';
                                $args_sort[ $sort_col ] = $order;
                            }
                        }
                        if (!empty( $args_sort ) ) {
                            $args['sort'] = $args_sort;
                        }
                    }
                    unset( $sort_by, $args['sort_by'], $args['sort_order'] );
                }
                if ( isset( $sort_by ) && $obj->has_column( $sort_by, true ) ) {
                    $args['sort'] = $sort_by;
                } else if ( isset( $sort_by ) && !$obj->has_column( $sort_by, true ) ) {
                    if ( strpos( $sort_by, 'field:' ) === 0 ) {
                        if ( strpos( $sort_by, ' ' ) === false ) {
                            $sort_by .= ' ';
                        }
                        list( $sort_field, $sort_func ) = explode( ' ', $sort_by );
                        $sort_field = preg_replace( '/^field:/', '', $sort_field );
                        $bulk_func = 'ascend';
                        if ( isset( $args['sort_order'] ) ) {
                            $bulk_func = stripos( $args['sort_order'], 'desc' )
                                       !== false ? 'descend' : 'ascend';
                        }
                        $bulk_func = $bulk_func == 'ascend' ? 'asort' : 'arsort';
                        $bulk_numeric = $sort_func == 'numeric' ? true : false;
                    }
                    unset( $args['sort_by'] );
                }
                if ( isset( $args['sort_order'] ) ) {
                    $args['direction'] = stripos( $args['sort_order'], 'desc' )
                        !== false ? 'descend' : 'ascend';
                    if (! isset( $sort_by ) ) {
                        $sort_by = $app->get_date_col( $obj );
                        if (! $sort_by ) $sort_by = 'id';
                        $args['sort'] = $sort_by;
                    }
                }
                if ( isset( $args['offset'] ) ) {
                    $args['offset'] = (int) $args['offset'];
                }
                $lastn = false;
                if ( isset( $args['limit'] ) ) {
                    if ( $args['limit'] ) {
                        $args['limit'] = (int) $args['limit'];
                    } else {
                        unset( $args['limit'] );
                    }
                } else if ( isset( $args['lastn'] ) && $args['lastn'] ) {
                    $date_col = $app->get_date_col( $obj );
                    if ( $date_col ) {
                        $lastn = true;
                        $bulk_sort_by = isset( $args['sort'] ) ? $args['sort'] : '';
                            // Backward compatibility.
                        if (! $bulk_sort_by ) 
                            $bulk_sort_by = isset( $args['sort_by'] ) ? $args['sort_by'] : '';
                        if (! $bulk_sort_by ) {
                            if ( $obj->has_column( $date_col ) ) {
                                $bulk_sort_by = $date_col;
                            }
                        }
                        if (! $bulk_sort_by || ! $obj->has_column( $bulk_sort_by, true ) ) {
                            $bulk_sort_by = 'id';
                        }
                        $bulk_sort_order = isset( $args['direction'] ) ? $args['direction'] : 'asc';
                        $args['sort'] = $date_col;
                        $args['limit'] = (int) $args['lastn'];
                        $args['direction'] = 'descend';
                        unset( $args['lastn'] );
                    }
                }
                if ( isset( $args['options'] ) ) {
                    $options = $args['options'];
                    if ( is_array( $options ) ) {
                        if ( array_values($options) === $options ) {
                            $i = 1;
                            $col_opt;
                            foreach( $options as $option ) {
                                if ( $i % 2 ) {
                                    $col_opt = $option;
                                } else {
                                    if ( $obj->has_column( $col_opt ) ) {
                                        $terms[ $col_opt ] = $option;
                                    }
                                }
                                $i++;
                            }
                        } else {
                            foreach( $options as $col_opt => $option ) {
                                if ( $obj->has_column( $col_opt ) ) {
                                    $terms[ $col_opt ] = $option;
                                }
                            }
                        }
                    }
                }
                if ( isset( $orig_args['conditions'] ) || isset( $orig_args['condition'] ) ) {
                    $conditions =  isset( $orig_args['conditions'] )
                                ? $orig_args['conditions'] : $orig_args['condition'];
                    $op_map = ['gt' => '>', 'lt' => '<', 'eq' => '=', 'ne' => '!=', 'ge' => '>=',
                               'le' => '<=', 'ct' => 'LIKE', 'nc' => 'NOT LIKE', 'bw' => 'LIKE',
                               'ew' => 'LIKE', 'like' => 'LIKE'];
                }
                unset( $orig_args['table_id'], $orig_args['options'], $orig_args['limit'],
                       $orig_args['offset'], $orig_args['sort_order'], $orig_args['sort'],
                       $orig_args['sort_by'], $orig_args['this_tag'], $orig_args['model'],
                       $orig_args['ignore_archive_context'], $orig_args['conditions'],
                       $orig_args['condition'] );
                $meta_ids = [];
                $search_by_field = false;
                $workspace_ids = [];
                $ws_attr = $this->include_exclude_workspaces( $app, $orig_args, $obj, $terms, $workspace_ids );
                $workspace_ids = array_keys( $workspace_ids );
                if ( count( $workspace_ids ) === 1 ) {
                    $workspace_id = $workspace_ids[0];
                }
                $field_terms = false;
                $column_defs = $scheme['column_defs'];
                $edit_properties = isset( $scheme['edit_properties'] ) ? $scheme['edit_properties'] : [];
                $field_and_or = 'and';
                $relation_models = [];
                if ( isset( $scheme['relations'] ) && !empty( $scheme['relations'] ) ) {
                    $relation_models = array_values( $scheme['relations'] );
                }
                $relation_map = [];
                foreach( $orig_args as $key => $value ) {
                    if ( $obj->has_column( $key, true ) ) {
                        $terms[ $key ] = $value;
                    } else if ( $value !== '' && ( $obj->has_column( $key ) || in_array( $key, $relation_models ) ) ) {
                        unset( $orig_args[ $key ], $args[ $key ] );
                        $relation_map[ $key ] = $value;
                    } else if ( strpos ( $key, $model . '_' ) === 0 ) {
                        unset( $orig_args[ $key ], $args[ $key ] );
                        $key = preg_replace( "/^{$model}_/", '', $key );
                        if ( $obj->has_column( $key ) ) {
                            $terms[ $key ] = $value;
                        }
                    } else if ( $key === 'author' && ( $obj->has_column( 'user_id' ) || $obj->has_column( 'created_by' ) ) ) {
                        unset( $orig_args[ $key ], $args[ $key ] );
                        $obj_author = $app->db->model( 'user' )->get_by_key( ['name' => ['BINARY' => $value ] ], [], 'id' );
                        if ( $obj_author->id ) {
                            if ( $obj->has_column( 'user_id' ) ) {
                                $terms['user_id'] = $obj_author->id;
                            } else {
                                $terms['created_by'] = $obj_author->id;
                            }
                        }
                    } else if ( $table && strpos( $key, 'field:' ) === 0 ) {
                        $field_name = preg_replace( '/^field:/' , '', $key );
                        unset( $orig_args[ $key ], $args[ $key ] );
                        if ( isset( $orig_args['field_and_or'] ) ) {
                            $field_and_or = strtolower( $orig_args['field_and_or'] );
                            unset( $orig_args['field_and_or'], $args['field_and_or'] );
                        }
                        $fields = $this->get_fields( $app, $table, $field_name );
                        if ( is_array( $fields ) && !empty( $fields ) ) {
                            $search_by_field = true;
                            $metadata = $app->db->model( 'meta' )->load( [
                                'value' => $value, 'key' => $field_name,
                                'kind' => 'customfield', 'model' => $model ], [], 'object_id' );
                            if ( $field_terms && $field_and_or == 'and' ) {
                                $_meta_ids = [];
                                foreach ( $metadata as $meta ) {
                                    $_meta_ids[] = (int) $meta->object_id;
                                }
                                $duplicate_ids = [];
                                foreach ( $meta_ids as $meta_id ) {
                                    if ( in_array( $meta_id, $_meta_ids ) ) {
                                        $duplicate_ids[] = $meta_id;
                                    }
                                }
                                $meta_ids = $duplicate_ids;
                            } else {
                                foreach ( $metadata as $meta ) {
                                    $meta_ids[] = (int) $meta->object_id;
                                }
                            }
                            $field_terms = true;
                        }
                    } else {
                        $key = strtolower( $key );
                        $col_labels = isset( $this->col_labels[ $model ] ) ? $this->col_labels[ $model ] : [];
                        if ( empty( $col_labels ) && isset( $scheme['labels'] ) && !empty( $scheme['labels'] ) ) {
                            $column_labels = array_map( 'strtolower', $scheme['labels'] );
                            $column_labels = array_map( 'pt_whitespace_to_underscore',  $column_labels );
                            $col_labels = array_flip( $column_labels );
                            $this->col_labels[ $model ] = $col_labels;
                        }
                        if ( isset( $col_labels[ $key ] ) ) {
                            $ref_name = $col_labels[ $key ];
                            if ( isset( $column_defs[ $ref_name ] ) && isset( $edit_properties[ $ref_name ] ) ) {
                                if ( $column_defs[ $ref_name ]['type'] === 'int'
                                    && strpos( $edit_properties[ $ref_name ], ':' ) !== false ) {
                                    $setting = explode( ':', $edit_properties[ $ref_name ] );
                                    if ( $setting[0] === 'relation' || $setting[0] === 'reference' ) {
                                        $related_model = $setting[1];
                                        $related_table = $app->get_table( $related_model );
                                        if ( $related_table->primary ) {
                                            unset( $orig_args[ $key ], $args[ $key ] );
                                            $related_ids = [];
                                            $and_or = 'OR';
                                            if ( stripos( $value, ' OR ' ) !== false ) {
                                                $values = preg_split( "/\s{1,}OR\s{1,}/si", $value );
                                            } else {
                                                $values = [ $value ];
                                            }
                                            $has_workspace = $related_table->space_child || $related_table->display_space;
                                            if ( count( $workspace_ids ) > 1 && $has_workspace ) {
                                                $related_object_ids = [];
                                                foreach ( $values as $value ) {
                                                    $is_not = false;
                                                    $in_stmt = 'IN';
                                                    if ( stripos( $value, 'NOT ' ) !== false ) {
                                                        $value = preg_replace( '/^NOT\s{1,}/si', '', $value );
                                                        $is_not = true;
                                                        $in_stmt = 'NOT IN';
                                                    }
                                                    $paths = [];
                                                    if ( strpos( $value, '/' ) !== false && $related_table->hierarchy ) {
                                                        $paths = explode( '/', $value );
                                                        $value = array_pop( $paths );
                                                    }
                                                    $related_terms = [ $related_table->primary => $value ];
                                                    if ( $related_model == 'tag' ) {
                                                        $related_terms['class'] = $obj->_model;
                                                    }
                                                    foreach ( $workspace_ids as $_workspace_id ) {
                                                        if ( $has_workspace ) {
                                                            $related_terms['workspace_id'] = $_workspace_id;
                                                        }
                                                        if (!empty( $paths ) ) {
                                                            $related_terms[ $related_table->primary ] = $value;
                                                            $parent_id = 0;
                                                            foreach ( $paths as $path ) {
                                                                $rel_terms = [ $related_table->primary => $path,
                                                                             'parent_id' => $parent_id ];
                                                                if ( $has_workspace ) {
                                                                    $rel_terms['workspace_id'] = $_workspace_id;
                                                                }
                                                                $parent = $app->db->model( $related_model )->get_by_key( $rel_terms, [], 'id' );
                                                                if ( $parent->id ) {
                                                                    $parent_id = $parent->id;
                                                                }
                                                            }
                                                            $related_terms['parent_id'] = $parent_id;
                                                        }
                                                        $related_object = $app->db->model( $related_model )->get_by_key(
                                                            $related_terms, null, 'id' );
                                                        if ( $related_object->id ) {
                                                            $related_object_ids[] = $related_object->id;
                                                        }
                                                    }
                                                }
                                                if (! empty( $related_object_ids ) ) {
                                                    $terms[ $ref_name ] = [ $in_stmt => $related_object_ids ];
                                                } else if ( $in_stmt == 'IN' ) {
                                                    $repeat = $ctx->false();
                                                    $ctx->restore( $local_vars );
                                                    return $restfulapi ? [] : '';
                                                }
                                            } else {
                                                foreach ( $values as $value ) {
                                                    $is_not = false;
                                                    if ( stripos( $value, 'NOT ' ) !== false ) {
                                                        $value = preg_replace( '/^NOT\s{1,}/si', '', $value );
                                                        $is_not = true;
                                                    }
                                                    $related_terms = [ $related_table->primary => $value ];
                                                    $ws_extra = '';
                                                    if ( $has_workspace ) {
                                                        $related_terms['workspace_id'] = $workspace_id;
                                                    }
                                                    if ( $related_model == 'tag' ) {
                                                        $related_terms['class'] = $obj->_model;
                                                    }
                                                    if ( strpos( $value, '/' ) !== false && $related_table->hierarchy ) {
                                                        $paths = explode( '/', $value );
                                                        $value = array_pop( $paths );
                                                        $related_terms[ $related_table->primary ] = $value;
                                                        $parent_id = 0;
                                                        foreach ( $paths as $path ) {
                                                            $parent = $app->db->model( $related_model )->get_by_key(
                                                                        [ $related_table->primary => $path,
                                                                         'parent_id' => $parent_id ], [], 'id' );
                                                            if ( $parent->id ) {
                                                                $parent_id = $parent->id;
                                                            }
                                                        }
                                                        $related_terms['parent_id'] = $parent_id;
                                                    }
                                                    $related_object = $app->db->model( $related_model )->get_by_key(
                                                        $related_terms, null, 'id', $ws_extra );
                                                    if ( $related_object->id ) {
                                                        if (! $is_not ) {
                                                            $related_ids[] = (int) $related_object->id;
                                                        } else {
                                                            $r_terms = $obj->has_column( 'status', true ) ? ['status' => ['>=' => 0]] : [];
                                                            $context_objs = $app->load_context_objs(
                                                                $related_object, $obj->_model, $r_terms, [], 'id' );
                                                            $not_match_ids = [];
                                                            foreach ( $context_objs as $context_obj ) {
                                                                $not_match_ids[] = (int) $context_obj->id;
                                                            }
                                                            $not_extra_ids[] = $not_match_ids;
                                                        }
                                                    }
                                                }
                                                if ( empty( $related_ids ) && empty( $not_extra_ids ) ) {
                                                    $repeat = $ctx->false();
                                                    $ctx->restore( $local_vars );
                                                    return $restfulapi ? [] : '';
                                                }
                                                if (! empty( $related_ids ) ) {
                                                    $terms[ $ref_name ] = ['IN' => $related_ids ];
                                                    if ( $and_or === 'AND' && count( $related_ids ) > 1 ) {
                                                        $repeat = $ctx->false();
                                                        $ctx->restore( $local_vars );
                                                        return $restfulapi ? [] : '';
                                                    }
                                                }
                                                if (! empty( $not_extra_ids ) ) {
                                                    $add_extras = [];
                                                    foreach ( $not_extra_ids as $_not_extra_ids ) {
                                                        $add_extras[] = " {$model}_id NOT IN (" . implode( ',', $_not_extra_ids ) . ')';
                                                    }
                                                    $add_extras = implode( " {$and_or} ", $add_extras );
                                                    $extra .= " {$and_or} ({$add_extras})";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if ( isset( $conditions ) && !empty( $conditions ) ) {
                    foreach ( $conditions as $cond_col => $cond_value ) {
                        if ( isset( $terms[ $cond_col ] ) ) continue;
                        if ( $obj->has_column( $cond_col, true ) ) {
                            $cond_op_value = explode( ',', $cond_value );
                            $cond_op = array_shift( $cond_op_value );
                            $cond_op = trim( strtolower( $cond_op ) );
                            $cond_value = implode( ',', $cond_op_value );
                            if ( isset( $op_map[ $cond_op ] ) ) {
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
                                $terms[ $cond_col ] = [ $operator => $cond_value ];
                            }
                        }
                    }
                }
                $current_template = $ctx->stash( 'current_template' );
                $container = $ctx->stash( 'current_container' );
                $context = $ctx->stash( 'current_context' );
                $context = $context == 'template' ? '' : $context;
                $has_relation = false;
                $rel_args = [];
                if ( $table ) {
                    if ( $table->has_status ) {
                        if (! isset( $args['status_lt'] ) &&
                            ! isset( $args['status_not'] ) && ! isset( $args['status'] )
                            && ! isset( $args['include_draft'] ) ) {
                            $status_published = $app->status_published( $model );
                            $terms['status'] = $status_published;
                            $rel_args['status'] = $status_published;
                        } else if ( isset( $args['status_not'] ) ) {
                            $not = (int) $args['status_not'];
                            $terms['status'] = ['!=' => $not ];
                        } else if ( isset( $args['status_lt'] ) ) {
                            $lt = (int) $args['status_lt'];
                            $terms['status'] = ['<' => $lt ];
                        } else if ( isset( $args['include_draft'] ) ) {
                            $terms['status'] = ['>=' => 0];
                        }
                    }
                    if ( $table->revisable && !isset( $terms['rev_type'] ) ) {
                        $workflow = isset( $args['workflow'] ) ? $args['workflow'] : null;
                        if ( $workflow ) {
                            $terms['rev_type'] = ['!=' => 1];
                        } else {
                            $terms['rev_type'] = 0;
                            $rel_args['rev_type'] = 0;
                        }
                    }
                }
                $rel_ids = [];
                if (! $container && $context && $app->db->model( $context )->has_column( 'model' ) ) {
                    $ctx_obj = $ctx->stash( $context );
                    $ctx_model = null;
                    if ( $ctx_obj && $ctx_obj->model ) {
                        $ctx_model = $app->get_table( $ctx_obj->model );
                    }
                    $preview_template = $ctx->stash( 'preview_template' );
                    if ( $app->id == 'Prototype' && $app->param( '_preview' ) && !$preview_template ) {
                        $_scheme = $app->get_scheme_from_db( $context );
                        if ( isset( $_scheme['relations'] ) ) {
                            $relations = $_scheme['relations'];
                            foreach ( $relations as $key => $value ) {
                                $rel_model = $app->param( "_{$key}_model" );
                                if ( $ctx_model && $rel_model &&
                                        $rel_model == $ctx_model->name ) {
                                    $preview_ids = $app->param( $key );
                                    $rel_ids = [];
                                    foreach ( $preview_ids as $id ) {
                                        if ( $id ) $rel_ids[] = (int) $id;
                                    }
                                    $terms['id'] = ['IN' => $rel_ids ];
                                }
                            }
                        }
                    } else {
                        if ( $ctx_model && ! $ignore_context && isset( $scheme['relations'] ) ) {
                            $obj_relations = array_values( $scheme['relations'] );
                            if ( in_array( $context, $obj_relations ) ) {
                                $relations = $app->db->model( 'relation' )->load_iter( 
                                        ['from_obj' => $context, 'from_id' => (int) $ctx_obj->id,
                                         'to_obj' => $ctx_model->name ], [], 'to_id' );
                                $rel_ids = $relations->fetchAll( PDO::FETCH_COLUMN );
                                $has_relation = true;
                                $relation_col = 'to_id';
                            }
                        }
                    }
                }
                if ( $container && $context && (!$ignore_context || $ignore_archive_context == 'date_based' ) ) {
                    if ( $container == $model ) {
                        $to_obj = $ctx->stash( $context );
                        if ( $to_obj = $ctx->stash( $context ) ) {
                            $is_relation = false;
                            if ( $scheme !== null ) {
                                if ( isset( $scheme['relations'] ) ) {
                                    $obj_rels = $scheme['relations'];
                                    if ( array_search( $to_obj->_model, $obj_rels ) !== false ) {
                                        $is_relation = true;
                                    }
                                }
                                if ( $is_relation ) {
                                    $relations = $app->db->model( 'relation' )->load_iter( 
                                        ['to_obj' => $context, 'to_id' => (int) $to_obj->id,
                                         'from_obj' => $obj->_model ], $rel_args, 'from_id' );
                                    $rel_ids = $relations->fetchAll( PDO::FETCH_COLUMN );
                                    $has_relation = true;
                                    $relation_col = 'from_id';
                                } else {
                                    foreach ( $edit_properties as $id_col => $props ) {
                                        if ( strpos( $props, ':' ) === false ) continue;
                                        $props = explode( ':', $props );
                                        if ( $props[0] == 'relation' && $props[1] == $context ) {
                                            $terms[ $id_col ] = $to_obj->id;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if ( $has_relation && ! $ignore_context ) {
                    if ( count( $rel_ids ) ) {
                        if (! isset( $terms['id'] ) ) {
                            $terms['id'] = ['IN' => $rel_ids ];
                        } else {
                            $extra .= " AND {$model}_id IN (" . implode( ',', $rel_ids ) . ')';
                        }
                    } else {
                        if ( $this_tag !== 'objectloop' ) {
                            $repeat = $ctx->false();
                            $ctx->restore( $local_vars );
                            return $restfulapi ? [] : '';
                        }
                    }
                }
                $start = $ctx->stash( 'current_timestamp' );
                $end = $ctx->stash( 'current_timestamp_end' );
                $date_based = $ctx->stash( 'archive_date_based' );
                if (! $ignore_context && $date_based && $date_based == $obj->_model ) {
                    $date_based_col = $ctx->stash( 'archive_date_based_col' );
                    if ( $start && $end ) {
                        $terms[ $date_based_col ] = ['BETWEEN' => [ $start, $end ] ];
                    }
                } else if ( $start && $end && !$ignore_context ) {
                    $date_based_col = $app->get_date_col( $obj );
                    if ( $date_based_col ) {
                        if ( $app->weak_date_context ) {
                            if ( $obj->has_column( $date_based_col ) ) {
                                $terms[ $date_based_col ] = ['BETWEEN' => [ $start, $end ] ];
                            }
                        } else {
                            $terms[ $date_based_col ] = ['BETWEEN' => [ $start, $end ] ];
                        }
                    }
                }
                if ( $current_template
                    && $current_template->workspace_id && ! $ignore_context ) {
                }
                if ( isset( $args['can_access'] ) ) {
                    $user = $app->user() ?? $app->db->model( 'user' )->new( ['id' => -1, 'is_superuser' => 0] );
                    if (! $user->is_superuser ) {
                        $permissions = array_keys( $app->permissions() );
                        if ( empty( $permissions ) ) {
                            $repeat = $ctx->false();
                            $ctx->restore( $local_vars );
                            return $restfulapi ? [] : '';
                        }
                        $terms['workspace_id'] = ['IN' => $permissions ];
                    }
                }
                $and_ids = [];
                $not_ids = [];
                foreach ( $relation_map as $key => $value ) {
                    $and_or = 'AND';
                    $or_ids = [];
                    $related_model = in_array( $key, $relation_models )
                                   ? $key : $scheme['relations'][ $key ];
                    $related_table = $app->get_table( $related_model );
                    if ( $related_table && $related_table->primary ) {
                        if (! $app->loopfilter_compat ) {
                            if ( strpos( $value, ' AND ' ) !== false ) {
                                $values = preg_split( "/\s{1,}AND\s{1,}/s", $value );
                            } else if ( strpos( $value, ' OR ' ) !== false ) {
                                $values = preg_split( "/\s{1,}OR\s{1,}/s", $value );
                                $and_or = 'OR';
                            } else {
                                $values = [ $value ];
                            }
                        } else {
                            if ( stripos( $value, ' AND ' ) !== false ) {
                                $values = preg_split( "/\s{1,}AND\s{1,}/si", $value );
                            } else if ( stripos( $value, ' OR ' ) !== false ) {
                                $values = preg_split( "/\s{1,}OR\s{1,}/si", $value );
                                $and_or = 'OR';
                            } else {
                                $values = [ $value ];
                            }
                        }
                        $has_workspace = $related_table->space_child || $related_table->display_space;
                        if ( count( $workspace_ids ) > 1 && $has_workspace ) {
                            $scope_and_ids = [];
                            $ws_scope_and_ids = [];
                            $add_extras = '';
                            foreach ( $values as $value ) {
                                $is_not = false;
                                $in_stmt = 'IN';
                                if ( stripos( $value, 'NOT ' ) !== false ) {
                                    $value = preg_replace( '/^NOT\s{1,}/si', '', $value );
                                    $is_not = true;
                                    $in_stmt = 'NOT IN';
                                }
                                $paths = [];
                                if ( strpos( $value, '/' ) !== false && $related_table->hierarchy ) {
                                    $paths = explode( '/', $value );
                                    $value = array_pop( $paths );
                                }
                                $related_terms = [ $related_table->primary => $value ];
                                if ( $related_model == 'tag' ) {
                                    $related_terms['class'] = $obj->_model;
                                }
                                foreach ( $workspace_ids as $_workspace_id ) {
                                    if ( $has_workspace ) {
                                        $related_terms['workspace_id'] = $_workspace_id;
                                    }
                                    if (!empty( $paths ) ) {
                                        $related_terms[ $related_table->primary ] = $value;
                                        $parent_id = 0;
                                        foreach ( $paths as $path ) {
                                            $rel_terms = [ $related_table->primary => $path,
                                                         'parent_id' => $parent_id ];
                                            if ( $has_workspace ) {
                                                $rel_terms['workspace_id'] = $_workspace_id;
                                            }
                                            $parent = $app->db->model( $related_model )->get_by_key( $rel_terms, [], 'id' );
                                            if ( $parent->id ) {
                                                $parent_id = $parent->id;
                                            }
                                        }
                                        $related_terms['parent_id'] = $parent_id;
                                    }
                                    $related_object = $app->db->model( $related_model )->get_by_key(
                                        $related_terms, null, 'id' );
                                    if ( $related_object->id ) {
                                        $context_args = ['ignore_filter' => 1]; // Duplicate filter.
                                        if ( $array_and_or ) $context_args['array_and_or'] = $array_and_or;
                                        // For LivePreview.
                                        $context_terms = $terms;
                                        if ( $obj->has_column( 'status' ) && isset( $context_terms['status'] ) ) {
                                            $context_terms['status'] = ['<' => 6];
                                        }
                                        if ( $obj->has_column( 'rev_type' ) && isset( $context_terms['rev_type'] ) ) {
                                            $context_terms['rev_type'] = ['<' => 3];
                                        }
                                        $context_objs = $app->load_context_objs(
                                            $related_object, $obj->_model, $context_terms, $context_args, 'id' );
                                        $_and_ids = [];
                                        if (! empty( $context_objs ) ) {
                                            foreach ( $context_objs as $context_obj ) {
                                                $_and_ids[] = (int)$context_obj->id;
                                            }
                                            $and_ids[] = $_and_ids;
                                        }
                                    }
                                    $scope_and_ids[ $_workspace_id ] = $and_ids;
                                    $and_ids = [];
                                }
                                if ( $and_or == 'AND' ) {
                                    $ws_scope_and_ids = [];
                                }
                                if (!empty ( $scope_and_ids ) ) {
                                    foreach ( $scope_and_ids as $_workspace_id => $scope_and_id ) {
                                        $_scope_and_ids = [];
                                        foreach ( $scope_and_id as $_and_ids ) {
                                            if ( empty( $_and_ids ) ) {
                                                continue;
                                            }
                                            if ( $not_extra && $and_or == 'OR' ) {
                                                $_scope_and_ids[] = "({$model}_id {$in_stmt}(" . implode( ',', $_and_ids ) . ") {$not_extra})";
                                            } else {
                                                if ( $is_not && $obj->has_column( 'workspace_id' ) ) {
                                                     $_scope_and_ids[] = "({$model}_id {$in_stmt}(" . implode( ',', $_and_ids )
                                                                       . ")AND {$model}_workspace_id={$_workspace_id})";
                                                } else {
                                                    $_scope_and_ids[] = " {$model}_id {$in_stmt}(" . implode( ',', $_and_ids ) . ')';
                                                }
                                            }
                                        }
                                        if (! empty( $_scope_and_ids ) ) {
                                            $ws_scope_and_ids[] = implode( " {$and_or} ", $_scope_and_ids );
                                        }
                                    }
                                }
                                if (! empty( $ws_scope_and_ids ) ) {
                                    $add_extras .= $add_extras ? " {$and_or}(" . implode( 'OR', $ws_scope_and_ids ) . ')'
                                                 : "(" . implode( 'OR', $ws_scope_and_ids ) . ')';
                                } else {
                                    if ( $and_or === 'OR' ) {
                                        continue;
                                    }
                                    $repeat = $ctx->false();
                                    $ctx->restore( $local_vars );
                                    return $restfulapi ? [] : '';
                                }
                            }
                            if ( $add_extras ) {
                                $extra .= " AND ({$add_extras}) ";
                            }
                            if ( empty( $ws_scope_and_ids ) && $and_or === 'OR' ) {
                                $repeat = $ctx->false();
                                $ctx->restore( $local_vars );
                                return $restfulapi ? [] : '';
                            }
                        } else {
                            foreach ( $values as $value ) {
                                $is_not = false;
                                if ( stripos( $value, 'NOT ' ) !== false ) {
                                    $value = preg_replace( '/^NOT\s{1,}/si', '', $value );
                                    $is_not = true;
                                }
                                $related_terms = [ $related_table->primary => $value ];
                                if ( $has_workspace ) {
                                    $related_terms['workspace_id'] = $workspace_id;
                                }
                                if ( $related_model == 'tag' ) {
                                    $related_terms['class'] = $obj->_model;
                                }
                                if ( strpos( $value, '/' ) !== false && $related_table->hierarchy ) {
                                    $paths = explode( '/', $value );
                                    $value = array_pop( $paths );
                                    $related_terms[ $related_table->primary ] = $value;
                                    $parent_id = 0;
                                    foreach ( $paths as $path ) {
                                        $rel_terms = [ $related_table->primary => $path,
                                                     'parent_id' => $parent_id ];
                                        if ( $has_workspace ) {
                                            $rel_terms['workspace_id'] = $workspace_id;
                                        }
                                        $parent = $app->db->model( $related_model )->get_by_key( $rel_terms, [], 'id' );
                                        if ( $parent->id ) {
                                            $parent_id = $parent->id;
                                        }
                                    }
                                    $related_terms['parent_id'] = $parent_id;
                                }
                                $related_object = $app->db->model( $related_model )->get_by_key(
                                    $related_terms, null, 'id' );
                                if ( $related_object->id ) {
                                    $context_args = ['ignore_filter' => 1]; // Duplicate filter.
                                    if ( $array_and_or ) $context_args['array_and_or'] = $array_and_or;
                                    // For LivePreview.
                                    $context_terms = $terms;
                                    if ( $obj->has_column( 'status' ) && isset( $context_terms['status'] ) ) {
                                        $context_terms['status'] = ['<' => 6];
                                    }
                                    if ( $obj->has_column( 'rev_type' ) && isset( $context_terms['rev_type'] ) ) {
                                        $context_terms['rev_type'] = ['<' => 3];
                                    }
                                    $context_objs = $app->load_context_objs(
                                        $related_object, $obj->_model, $context_terms, $context_args, 'id' );
                                    $_and_ids = [];
                                    if (! empty( $context_objs ) ) {
                                        foreach ( $context_objs as $context_obj ) {
                                            $_and_ids[] = (int)$context_obj->id;
                                        }
                                        if ( $is_not ) {
                                            $not_ids[] = $_and_ids;
                                        } else if ( $and_or == 'AND' ) {
                                            $and_ids[] = $_and_ids;
                                        } else if ( $and_or == 'OR' ) {
                                            $or_ids = array_merge( $or_ids, $_and_ids );
                                        }
                                    } else {
                                        if ( $and_or == 'AND' && ! $is_not ) {
                                            $repeat = $ctx->false();
                                            $ctx->restore( $local_vars );
                                            return $restfulapi ? [] : '';
                                        }
                                    }
                                } else {
                                    if ( $and_or == 'AND' && ! $is_not ) {
                                        $repeat = $ctx->false();
                                        $ctx->restore( $local_vars );
                                        return $restfulapi ? [] : '';
                                    }
                                }
                            }
                            if ( $and_or == 'OR' ) {
                                if (! empty( $or_ids ) ) {
                                    $and_ids[] = array_unique( $or_ids );
                                } else if ( empty( $not_ids ) ) {
                                    $repeat = $ctx->false();
                                    $ctx->restore( $local_vars );
                                    return $restfulapi ? [] : '';
                                }
                            }
                        }
                    }
                }
                unset( $args['sort_order'], $args['ignore_archive_context'], $args['this_tag'],
                       $args['options'], $args['table_id'], $args['status_lt'], $args['status_not'] );
                $cols = isset( $args['cols'] ) ? $args['cols'] : '*';
                if ( $model == 'tag' && !isset( $args['include_private'] )
                    || ( isset( $args['include_private'] ) && !$args['include_private'] ) ) {
                    $terms['name'] = ['not like' => '@%'];
                }
                if ( $obj->has_column( 'workspace_id' ) ) {
                    if ( $ignore_context ) $orig_args['ignore_archive_context'] = 1;
                    if ( $ignore_archive_context == 'date_based' ) {
                        unset( $orig_args['ignore_archive_context'] );
                    }
                    if ( isset( $orig_args['ids'] ) && $orig_args['ids'] && !$app->tags_compat ) {
                    } else {
                        $ws_attr = $this->include_exclude_workspaces( $app, $orig_args, $obj, $terms );
                        if ( $ws_attr ) {
                            $ws_attr = ' AND ' . $obj->_model . "_workspace_id {$ws_attr}";
                            $extra .= $ws_attr;
                        }
                        if ( $ws_attr === null && !$ignore_context ) {
                            $current_urlmap = $ctx->stash( 'current_urlmapping' );
                            if ( $current_urlmap ) {
                                if ( $current_urlmap->container_scope
                                    && $current_urlmap->container
                                    && $current_urlmap->container == $model
                                    && ! $current_urlmap->workspace_id ) {
                                    $extra .= " AND {$model}_workspace_id=0 ";
                                } else if ( $table->hierarchy ) {
                                    $hierarchy_ws = $current_urlmap->workspace_id + 0;
                                    $extra .= " AND {$model}_workspace_id={$hierarchy_ws} ";
                                }
                            }
                        }
                    }
                }
                if ( isset( $orig_args['ids'] ) ) {
                    $ids = $orig_args['ids'];
                    $ids = is_array( $ids ) ? $ids : preg_split( "/\s*,\s*/", trim( $ids ) );
                    if ( count( $ids ) ) {
                        $obj_ids = [];
                        foreach ( $ids as $id ) {
                            if ( is_numeric( $id ) ) {
                                $obj_ids[ (int) $id ] = true;
                            }
                        }
                        if ( empty( $obj_ids ) ) {
                            $repeat = $ctx->false();
                            $ctx->restore( $local_vars );
                            return $restfulapi ? [] : '';
                        }
                        $ids = array_keys( $obj_ids );
                        $extra .= " AND {$model}_id IN (" . implode( ',', $ids ) . ')';
                    } else {
                        $repeat = $ctx->false();
                        $ctx->restore( $local_vars );
                        return $restfulapi ? [] : '';
                    }
                }
                $loaded_ids = [];
                if ( isset( $orig_args['unique'] ) && $orig_args['unique'] ) {
                    $loaded_ids = $ctx->stash( "{$model}_ids_published" )
                                ? $ctx->stash( "{$model}_ids_published" ) : [];
                    $loaded_ids = array_keys( $loaded_ids );
                }
                if ( isset( $orig_args['exclude_ids'] ) && $orig_args['exclude_ids'] ) {
                    $exclude_ids = $orig_args['exclude_ids'];
                    $exclude_ids = is_array( $exclude_ids )
                                 ? $exclude_ids : preg_split( "/\s*,\s*/", $exclude_ids );
                    $loaded_ids = array_merge( $loaded_ids, $exclude_ids );
                }
                if (! empty( $loaded_ids ) ) {
                    array_walk( $loaded_ids, function( &$i ){ $i += 0; } );
                    $loaded_ids = array_unique( $loaded_ids );
                    $extra .= " AND {$model}_id NOT IN (" . implode( ',', $loaded_ids ) . ')';
                }
                if ( $search_by_field ) {
                    $meta_ids = array_unique( $meta_ids );
                    if ( empty( $meta_ids ) ) {
                        if (! $app->search_by_field_compat ) {
                            $repeat = $ctx->false();
                            $ctx->restore( $local_vars );
                            return $restfulapi ? [] : '';
                        }
                    } else {
                        if (! isset( $terms['id'] ) ) {
                            $terms['id'] = ['IN' => $meta_ids ];
                        } else {
                            $extra .= " AND {$model}_id IN (" . implode( ',', $meta_ids ) . ')';
                        }
                    }
                }
                if (! empty( $and_ids ) ) {
                    foreach ( $and_ids as $_and_ids ) {
                        $_and_ids = array_unique( $_and_ids );
                        $extra .= " AND {$model}_id IN (" . implode( ',', $_and_ids ) . ')';
                    }
                }
                if (! empty( $not_ids ) ) {
                    $and_or = 'AND';
                    $add_extras = [];
                    foreach ( $not_ids as $_not_ids ) {
                        $add_extras[] = " {$model}_id NOT IN (" . implode( ',', $_not_ids ) . ')';
                    }
                    $add_extras = implode( " {$and_or} ", $add_extras );
                    $extra .= " AND ({$add_extras})";
                }
                $_filter = $app->param( '_filter' );
                $ex_vals = [];
                if ( isset( $args['ignore_filter'] ) && $args['ignore_filter'] ) {
                    $cols = '*';
                } else {
                    if ( ( $_filter && $_filter == $model ) || $app->force_filter ) {
                        $app->register_callback( $model, 'pre_listing', 'pre_listing', 5, $app );
                    }
                    $app->init_callbacks( $model, 'pre_listing' );
                    $callback = ['name' => 'pre_listing', 'model' => $model,
                                 'scheme' => $scheme, 'table' => $table,
                                 'args' => $cb_args ];
                    $app->run_callbacks( $callback, $model, $terms, $args, $extra, $ex_vals );
                }
                $caching = $app->db->caching;
                if ( isset( $args['cols'] ) && $args['cols'] === '*' ) {
                } else {
                    $cols = $this->select_cols( $app, $obj, $cols, $column_defs );
                }
                unset( $args['cols'], $args['glue'], $args['include_draft'], $args['ignore_filter'] );
                $count_args = $args;
                unset( $count_args['limit'], $count_args['offset'] );
                $count_obj = $obj->count( $terms, $count_args, 'id', $extra, $ex_vals );
                if ( isset( $args['limit'] ) && $args['limit'] && $args['limit'] > $count_obj ) {
                    $args['limit'] = $count_obj;
                } else if ( isset( $args['offset'] ) && $args['offset'] && !isset( $args['limit'] ) ) {
                    if ( $args['offset'] > $count_obj ) {
                        $repeat = $ctx->false();
                        $ctx->restore( $local_vars );
                        return $restfulapi ? [] : '';
                    }
                    $args['limit'] = $count_obj - $args['offset'];
                }
                if (! isset( $args['direction'] ) && isset( $args['sort'] ) ) {
                    if ( $app->objectloop_order && $this_tag != 'objectloop' ) {
                        $args['direction'] = stripos( $app->objectloop_order, 'desc' ) !== false ? 'descend' : 'ascend';
                    }
                }
                if ( isset( $orig_args['_count'] ) && $orig_args['_count'] ) {
                    $cols = 'id';
                }
                $sort_field_limit = null;
                if ( isset( $sort_field ) && isset( $args['limit'] ) ) {
                    $sort_field_limit = $args['limit'];
                    unset( $args['limit'] );
                }
                if ( isset( $args['limit'] ) && $args['limit'] == 0 ) {
                    $loop_objects = [];
                } else {
                    if ( $cols && $cols !== '*' ) {
                        // For LivePreview
                        $cols = explode( ',', $cols );
                        if ( !in_array( 'id', $cols ) ) {
                            $cols[] = 'id';
                        }
                        if ( $obj->has_column( 'workspace_id' ) && !in_array( 'workspace_id', $cols ) ) {
                            $cols[] = 'workspace_id';
                        }
                    }
                    $loop_objects = $obj->load( $terms, $args, $cols, $extra, $ex_vals );
                }
                if (! isset( $cb_args['sort_by'] ) && isset( $cb_args['shuffle'] ) ) {
                    if ( $cb_args['shuffle'] !== '0' ) {
                        shuffle( $loop_objects );
                    }
                }
                if ( $lastn ) {
                    $sort_type = $scheme['column_defs'][ $bulk_sort_by ]['type'];
                    $bulk_map = [];
                    foreach ( $loop_objects as $idx => $loop_object ) {
                        $bulk_map[ $idx ] = $loop_object->$bulk_sort_by;
                    }
                    $sort_func = stripos( $bulk_sort_order, 'asc' ) !== false ? 'asort' : 'arsort';
                    if ( strpos( $sort_type, 'int' ) !== false ) {
                        $sort_func( $bulk_map, SORT_NUMERIC );
                    } else {
                        $sort_func( $bulk_map );
                    }
                    $ordered_objs = [];
                    foreach ( $bulk_map as $idx => $colValue ) {
                        $ordered_objs[] = $loop_objects[ $idx ];
                    }
                    $loop_objects = $ordered_objs;
                }
                if ( isset( $sort_field ) ) {
                    $fields = $this->get_fields( $app, $table, $sort_field );
                    if ( is_array( $fields ) && !empty( $fields ) ) {
                        $bulk_map = [];
                        foreach ( $loop_objects as $idx => $loop_object ) {
                            $customfields = $app->get_meta( $loop_object, 'customfield', true );
                            if ( isset( $customfields[ $sort_field ] ) ) {
                                $bulk_map[ $idx ] = $customfields[ $sort_field ][0]->value;
                            } else {
                                $bulk_map[ $idx ] = $bulk_numeric ? 0 : '';
                            }
                        }
                        if ( $bulk_numeric ) {
                            $bulk_func( $bulk_map, SORT_NUMERIC );
                        } else {
                            $bulk_func( $bulk_map );
                        }
                        $ordered_objs = [];
                        foreach ( $bulk_map as $idx => $colValue ) {
                            $ordered_objs[] = $loop_objects[ $idx ];
                        }
                        $loop_objects = $ordered_objs;
                    }
                }
                if ( $sort_field_limit ) {
                    $loop_objects = array_slice( $loop_objects, 0, $sort_field_limit );
                }
                $app->init_callbacks( $model, 'post_load_objects' );
                $callback = ['name' => 'post_load_objects', 'model' => $model,
                             'table' => $table, 'args' => $orig_args ];
                $app->run_callbacks( $callback, $model, $loop_objects, $count_obj );
                $cancel = $callback['object_loop_canceled'] ?? false;
                if ( $cancel ) {
                    $repeat = $ctx->false();
                    $ctx->restore( $local_vars );
                    return $restfulapi ? [] : '';
                }
                if ( isset( $orig_args['_count'] ) && $orig_args['_count'] ) {
                    $repeat = $ctx->false();
                    $ctx->restore( $local_vars );
                    return $count_obj;
                }
                if ( empty( $loop_objects ) ) {
                    $repeat = $ctx->false();
                    $ctx->restore( $local_vars );
                    return $restfulapi ? [] : '';
                }
                $ctx->stash( 'object_count', $count_obj );
                $offset_last = 0;
                $next_offset = 0;
                $prev_offset = 0;
                $current_offset = 0;
                $current_page = 0;
                if ( isset( $args['offset'] ) && isset( $args['limit'] ) ) {
                    $current_offset = $args['offset'] ? $args['offset'] : 0;
                    if ( $args['limit'] ) {
                        $limit = (int) $args['limit'];
                        $offset_last = $count_obj / $limit;
                        $offset_last = (int) $offset_last;
                        $current_page = ( $current_offset / $limit ) + 1;
                        $ctx->stash( 'current_page', (int) $current_page );
                        $ctx->stash( 'offset_last', $offset_last );
                        $next_offset = $current_offset + $limit;
                        $ctx->stash( 'next_offset', $next_offset );
                        $prev_offset = $current_offset - $limit;
                        $ctx->stash( 'prev_offset', $prev_offset );
                        $ctx->stash( 'current_offset', $current_offset );
                    }
                }
            }
            if ( empty( $loop_objects ) ) {
                $repeat = $ctx->false();
                $ctx->restore( $local_vars );
                return $restfulapi ? [] : '';
            }
            if ( $restfulapi ) {
                return $loop_objects;
            }
            if ( $app->in_compile ) {
                $loop_objects = array_slice( $loop_objects, 0, 1 );
                $count_obj = 1;
            }
            $ctx->stash( 'current_archive_context', $model );
            $ctx->stash( 'current_container', $model );
            $ctx->stash( 'inside_objectloop', true );
            $ctx->local_params = $loop_objects;
        }
        $params = $ctx->local_params;
        $current_page = $ctx->stash( 'current_page' );
        $count_obj = $ctx->stash( 'object_count' );
        $offset_last = $ctx->stash( 'offset_last' );
        $next_offset = $ctx->stash( 'next_offset' );
        $prev_offset = $ctx->stash( 'prev_offset' );
        $current_offset = $ctx->stash( 'current_offset' );
        $ctx->local_vars['current_page'] = $current_page ? $current_page : 1;
        $ctx->local_vars['object_count'] = $count_obj;
        $ctx->local_vars['offset_last'] = $offset_last;
        $ctx->local_vars['next_offset'] = $next_offset;
        $ctx->local_vars['prev_offset'] = $prev_offset;
        $ctx->local_vars['current_offset'] = $current_offset;
        $ctx->set_loop_vars( $counter, $params );
        $var_prefix = isset( $args['prefix'] ) ? $args['prefix'] : '';
        $var_prefix .= $var_prefix ? '_' : '';
        $primary = $table ? $table->primary : '';
        if ( isset( $params[ $counter ] ) ) {
            $obj = $params[ $counter ];
            if ( is_object( $obj ) ) {
                $loaded_ids = $ctx->stash( "{$model}_ids_published" )
                            ? $ctx->stash( "{$model}_ids_published" ) : [];
                $loaded_ids[(int) $obj->id ] = true;
                if ( $obj->has_column( 'rev_object_id' ) && $obj->rev_object_id ) {
                    $loaded_ids[(int) $obj->rev_object_id ] = true;
                }
                $ctx->stash( "{$model}_ids_published", $loaded_ids );
                $ctx->stash( $model, $obj );
                $ctx->stash( 'current_context', $model );
                $colprefix = $obj->_colprefix;
                $values = $obj->get_values();
                foreach ( $values as $key => $value ) {
                    if ( $colprefix ) $key = preg_replace( "/^$colprefix/", '', $key );
                    $ctx->local_vars[ $var_prefix . $key ] = $value;
                }
                $ctx_workspace_id = $ctx->stash( 'workspace_id' );
                if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id !== null
                    & $ctx_workspace_id != $obj->workspace_id ) {
                    if ( $ws = $obj->workspace ) {
                        $ctx->stash( 'workspace', $ws );
                        $ctx->stash( 'workspace_id', $ws->id );
                    } else {
                        $ctx->stash( 'workspace', null );
                        $ctx->stash( 'workspace_id', 0 );
                    }
                } else if ( $model == 'workspace' ) {
                    $ctx->stash( 'workspace', $obj );
                    $ctx->stash( 'workspace_id', $obj->id );
                }
                if ( $primary ) {
                    $ctx->local_vars[ $var_prefix . '_primary' ] = $obj->$primary;
                }
                $repeat = true;
            } else {
                $ctx->restore( $local_vars );
                $ws = $ctx->local_vars['current_workspace'];
                $ctx->stash( 'workspace', $ws );
                $repeat = $ctx->false();
                unset( $params );
            }
        } else {
            unset( $params );
            $ctx->restore( $local_vars );
            if ( isset( $ctx->local_vars['current_workspace'] ) ) {
                $ws = $ctx->local_vars['current_workspace'];
                $ctx->stash( 'workspace', $ws );
                $ctx->stash( 'workspace_id', $ctx->local_vars['current_workspace_id'] );
            }
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_convert2linkurl ( $args, &$content, $ctx, &$repeat, $counter ) {
        if ( isset( $content ) ) {
            $app = $ctx->app;
            $workspace = $ctx->stash( 'workspace' );
            $site_url  = $workspace ? $workspace->site_url : $app->site_url;
            $link_url  = $workspace ? $workspace->link_url : $app->link_url;
            $workspace_id = $workspace ? $workspace->id : 0;
            $attrs = ['src', 'href', 'action'];
            if ( isset( $args['site_url'] ) ) $site_url = $args['site_url'];
            if ( isset( $args['link_url'] ) && $app->is_valid_url( $args['link_url'] ) ) $link_url = $args['link_url'];
            if ( isset( $args['attributes'] ) ) $attrs = $args['attributes'];
            if ( is_string( $attrs ) ) $attrs = preg_split( '/\s*,\s*/', $attrs );
            $add_mtime = null;
            if ( isset( $args['add_mtime'] ) ) {
                $add_mtime = $args['add_mtime'] ? $args['add_mtime'] : 'ts';
            }
            if (! $site_url || ! $link_url || empty( $attrs ) ) {
                return $content;
            }
            if ( $site_url === $link_url ) {
                return $content;
            }
            $attrs = array_map( 'strtolower', $attrs );
            $extensions = isset( $args['extensions'] ) ? $args['extensions'] : [];
            if ( is_string( $extensions ) ) $extensions = preg_split( '/\s*,\s*/', $extensions );
            if (!empty( $extensions ) ) {
                $extensions = array_map( 'strtolower', $extensions );
            }
            $tagNames = isset( $args['elements'] ) ? $args['elements'] : [];
            if ( is_string( $tagNames ) ) $tagNames = preg_split( '/\s*,\s*/', $tagNames );
            if (!empty( $tagNames ) ) {
                $tagNames = array_map( 'strtolower', $tagNames );
            }
            $search = preg_quote( $site_url, '/' );
            $currentUrl = isset( $args['base_url'] ) ? $args['base_url'] : '';
            if (! $currentUrl ) {
                $currentUrl = isset( $ctx->vars['current_archive_url'] ) ? $ctx->vars['current_archive_url']
                                                                         : $ctx->stash( 'current_archive_url' );
            }
            $original = $content;
            $is_html = stripos( $content, '<body' ) !== false;
            if (! $is_html ) {
                $content = '<!DOCTYPE html><html><body>' . $content . '</body></html>';
            }
            $content = PTUtil::encode_double( $content );
            libxml_use_internal_errors( true );
            $dom = new DomDocument();
            if ( $dom->loadHTML( mb_encode_numericentity( $content, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                $changed = false;
                $finder = new DomXPath( $dom );
                $elements = $finder->query( "//*" );
                if ( $elements->length ) {
                    $i = $elements->length - 1;
                    while ( $i > -1 ) {
                        $ele = $elements->item( $i );
                        foreach ( $attrs as $attr ) {
                            if (!empty( $tagNames ) && !in_array( strtolower( $ele->tagName ), $tagNames ) ) {
                                continue;
                            }
                            $url = $ele->getAttribute( $attr );
                            $checkUrl = null;
                            if ( $url ) {
                                if (!empty( $extensions ) ) {
                                    $checkUrl = $url;
                                    if ( strpos( $checkUrl, '?' ) !== false ) {
                                        list( $checkUrl, $param ) = explode( '?', $checkUrl );
                                    }
                                    if ( strpos( $checkUrl, '#' ) !== false ) {
                                        list( $checkUrl, $param ) = explode( '#', $checkUrl );
                                    }
                                    $extension = PTUtil::get_extension( $checkUrl, true );
                                    if (!in_array( $extension, $extensions ) ) {
                                        continue;
                                    }
                                }
                                $converted = $currentUrl ? PTUtil::convert2abs( $url, $currentUrl ) : $url;
                                if ( strpos( $converted, $site_url ) === 0 ) {
                                    $urlObj = null;
                                    if ( $add_mtime ) {
                                        $checkUrl = $converted;
                                        if ( strpos( $checkUrl, '?' ) !== false ) {
                                            list( $checkUrl, $param ) = explode( '?', $checkUrl );
                                        }
                                        if ( strpos( $checkUrl, '#' ) !== false ) {
                                            list( $checkUrl, $param ) = explode( '#', $checkUrl );
                                        }
                                        $urlObj = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $checkUrl ] );
                                    }
                                    $converted = preg_replace( "/^{$search}/", $link_url, $converted );
                                    if ( $add_mtime && is_object( $urlObj ) && $urlObj->id && $app->fmgr->exists( $urlObj->file_path ) ) {
                                        $converted .= strpos( $converted, '?' ) !== false ? '&' . $add_mtime : '?' . $add_mtime;
                                        $mtime = $app->fmgr->filemtime( $urlObj->file_path );
                                        if (! $mtime ) $mtime = $urlObj->filemtime;
                                        if ( $mtime ) {
                                            $converted .= '=' . $mtime;
                                        }
                                    }
                                    $ele->setAttribute( $attr, $converted );
                                    $changed = true;
                                }
                            }
                        }
                        $i -= 1;
                    }
                }
                if (! $changed ) {
                    return $original;
                }
                if ( PHP_VERSION >= 8.2 ) {
                    $content = html_entity_decode( $dom->saveHTML() );
                } else {
                    $content = mb_convert_encoding( $dom->saveHTML(), 'utf-8', 'HTML-ENTITIES' );
                }
                $content = PTUtil::decode_double( $content );
                if (! $is_html ) {
                    if ( strpos( $content, '</body></html>' ) !== false ) {
                        $content = preg_replace( '!^.*?<body>(.*?)</body></html>$!is', '$1', $content );
                    } else {
                        $content = preg_replace( '!^.*?<body>(.*?)$!is', '$1', $content );
                    }
                }
            } else {
                $content = $original;
            }
        }
        return $content;
    }

    public function get_fields ( $app, $model, $basename ) {
        $dbprefix = DB_PREFIX;
        if (! $dbprefix ) $dbprefix = 'mt_';
        $select =  "SELECT DISTINCT {$dbprefix}field.field_id FROM "
                  ."{$dbprefix}field,{$dbprefix}relation";
        $wheres = ["{$dbprefix}field.field_id="
                  ."{$dbprefix}relation.relation_from_id",
                   "{$dbprefix}relation.relation_name='models'",
                   "{$dbprefix}relation.relation_from_obj='field'",
                   "{$dbprefix}relation.relation_to_obj='table'",
                   "{$dbprefix}relation.relation_to_id=?",
                   "{$dbprefix}field.field_basename=?"];
        $select .= ' WHERE ';
        $select .= implode( ' AND ', $wheres );
        $select .= ' LIMIT 1';
        if ( is_string( $model ) ) {
            $model = $app->get_table( $model );
        }
        $fields = [];
        if ( is_object( $model ) ) {
            $placeholders = [(int)$model->id,  $basename ];
            $fields = $app->db->model( 'field' )->load( $select, $placeholders );
        }
        return $fields;
    }

    public function include_exclude_workspaces ( $app, $args, $obj = null,
        $terms = null, &$ids = [] ) {
        if ( isset( $args['id'] ) && is_numeric( $args['id'] ) ) {
            return '';
        }
        if ( get_class( $app ) === 'PAML' ) {
            $ctx = $app;
            $app = $ctx->app;
        } else {
            $ctx = $app->ctx;
        }
        $attr = null;
        $is_excluded = null;
        $workspace = $ctx->stash( 'workspace' );
        if ( isset( $args['workspace_ids'] ) ||
             isset( $args['include_workspaces'] ) ) {
            if (! isset( $args['workspace_ids'] ) ) {
                $args['workspace_ids'] = $args['include_workspaces'];
            }
            $attr = $args['workspace_ids'];
            if ( $attr && strtolower( $attr ) == 'this' ) {
                if ( $workspace && $workspace->id ) {
                    $ids[(int) $workspace->id ] = true;
                    return ' = ' . $workspace->id;
                } else {
                    $ids[0] = true;
                    return ' = 0 ';
                }
            } else if ( $attr && strtolower( $attr ) == 'all' ) {
                $args['include_workspaces'] = 'all';
                $attr = null;
            }
            unset( $args['workspace_ids'] );
            $is_excluded = 0;
        } elseif ( isset( $args['exclude_workspaces'] ) ) {
            $attr = $args['exclude_workspaces'];
            $is_excluded = 1;
        } elseif ( isset( $args['workspace_id'] ) && isset( $terms ) ) {
            if ( isset( $terms['workspace_id'] ) && $terms['workspace_id'] == $args['workspace_id'] ) {
                return '';
            }
            $ids[(int) $args['workspace_id'] ] = true;
            return ' = ' . (int) $args['workspace_id'];
        } else {
            if (! isset( $args['ignore_archive_context'] ) ) {
                if ( $obj && $obj->has_column( 'workspace_id' ) ) {
                    if ( $workspace && $workspace->id ) {
                        $ids[(int) $workspace->id ] = true;
                        return ' = ' . $workspace->id;
                    } else {
                        $ids[0] = true;
                        return ' = 0';
                    }
                }
            }
        }
        if ( $attr == 'children' ) {
            if ( isset( $args['root_id'] ) && $args['root_id'] ) {
                $workspace = $app->db->model( 'workspace' )->load( (int) $args['root_id'] );
            }
            if ( $workspace && $workspace->has_column( 'parent_id' ) ) {
                $depth = isset( $args['depth'] ) ? (int) $args['depth'] : 0;
                $children = isset( $args['include_this'] ) ? [ $workspace ] : [];
                PTUtil::get_children( $workspace, $depth, $children, 'id,parent_id' );
                $children_ids = [];
                foreach ( $children as $child ) {
                    $children_ids[] = $child->id;
                    $ids[(int) $child->id ] = true;
                }
                if ( count( $children_ids ) ) {
                    $sql = implode( ',', $children_ids );
                    $sql = " IN ($sql) ";
                    return $sql;
                }
                return '';
            } else {
                return;
            }
        }
        if ( $attr && preg_match( '/-/', $attr ) ) {
            $list = preg_split( '/\s*,\s*/', $attr );
            $attr = '';
            foreach ( $list as $item ) {
                if ( preg_match('/(\d+)-(\d+)/', $item, $matches ) ) {
                    for ( $i = $matches[1]; $i <= $matches[2]; $i++ ) {
                        if ( $attr != '' ) $attr .= ',';
                        $attr .= $i;
                    }
                } else {
                    if ( $attr != '' ) $attr .= ',';
                    $attr .= $item;
                }
            }
        }
        $workspace_ids = $attr !== null ? preg_split( '/\s*,\s*/', $attr, -1, PREG_SPLIT_NO_EMPTY ) : [];
        $sql = '';
        if ( $is_excluded ) {
            foreach ( $workspace_ids as $id ) {
                unset( $ids[(int) $id ] );
            }
            $sql = ' not in ( ' . join( ',', $workspace_ids ) . ' )';
        } else if ( isset( $args['include_workspaces'] ) &&
            $args['include_workspaces'] == 'all' ) {
            $sth = $app->db->model( 'workspace' )->load_iter( null, null, 'id' );
            $workspaces = $sth->fetchAll( PDO::FETCH_COLUMN );
            $ids = [0 => true];
            foreach ( $workspaces as $workspace_id ) {
                $ids[(int) $workspace_id ] = true;
            }
            $sql = '';
        } else {
            if ( count( $workspace_ids ) ) {
                array_walk( $workspace_ids, function( &$i ){ $i = (int) $i; } );
                $sql = ' in ( ' . join( ',', $workspace_ids ) . ' ) ';
                foreach ( $workspace_ids as $id ) {
                    $ids[(int) $id ] = true;
                }
            } else {
                $ids = [];
                $sql = '';
            }
        }
        return $sql;
    }

    function select_cols ( $app, $obj, $select_cols, $column_defs = null ) {
        $is_all = $select_cols == '*';
        if ( $is_all && isset( $this->select_cols[ $obj->_model ] ) ) {
            return $this->select_cols[ $obj->_model ];
        }
        $excludes = ['rev_type','rev_object_id','rev_changed','rev_diff', 'rev_note'];
        $caching = $app->db->caching;
        $app->db->caching = false;
        if (! $column_defs ) {
            $scheme = $app->get_scheme_from_db( $obj->_model );
            if (! $scheme ) {
                $scheme = $app->db->scheme[ $obj->_model ];
            }
            if (! $scheme ) return $select_cols;
            $column_defs = isset( $scheme['column_defs'] ) ? $scheme['column_defs'] : null;
        }
        if (! $column_defs ) {
            return $select_cols;
        }
        if ( is_string( $select_cols ) ) {
            if ( $select_cols == '*' ) {
                $select_cols = array_keys( $column_defs );
            } else {
                $select_cols = preg_split( '/\s*,\s*/', $select_cols, -1, PREG_SPLIT_NO_EMPTY );
            }
        }
        if (! is_array( $select_cols ) ) {
            return $select_cols;
        }
        $_select_cols = [];
        foreach ( $select_cols as $select_col ) {
            $select_col = trim( $select_col );
            if ( in_array( $select_col, $excludes ) ) continue;
            if ( $obj->has_column( $select_col ) ) {
                if ( isset( $column_defs[ $select_col ] ) 
                    && isset( $column_defs[ $select_col ]['type'] ) ) {
                    if ( $column_defs[ $select_col ]['type'] != 'relation' ) {
                        $_select_cols[] = $select_col;
                    }
                }
            }
        }
        if (!in_array( 'id', $_select_cols ) ) {
            array_unshift( $_select_cols, 'id' );
        }
        if ( $obj->has_column( 'status' ) &&
            !in_array( 'status', $_select_cols ) ) {
            $_select_cols[] = 'status';
        }
        if ( $obj->has_column( 'workspace_id' ) &&
            !in_array( 'workspace_id', $_select_cols ) ) {
            $_select_cols[] = 'workspace_id';
        }
        if ( $obj->has_column( 'basename' ) &&
            !in_array( 'basename', $_select_cols ) ) {
            $_select_cols[] = 'basename';
        }
        $_select_cols = array_unique( $_select_cols );
        $blobs = $app->db->get_blob_cols( $obj->_model, true );
        if ( count( $blobs ) ) {
            $select_cols = [];
            foreach ( $_select_cols as $select_col ) {
                if (! in_array( $select_col, $blobs ) ) {
                    $select_cols[] = $select_col;
                }
            }
            $_select_cols = $select_cols;
        }
        $select_cols = !empty( $_select_cols )
                     ? implode( ',', $_select_cols )
                     : '*';
        $app->db->caching = $caching;
        if ( $is_all ) {
            $this->select_cols[ $obj->_model ] = $select_cols;
        }
        return $select_cols;
    }

    function hdlr_objectcols ( $args, &$content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        $type = isset( $args['type'] ) ? $args['type'] : '';
        $var_prefix = isset( $args['prefix'] ) ? $args['prefix'] . '_' : '';
        if (! $counter ) {
            $model = isset( $args['model'] ) ? $args['model'] : null;
            $colName = isset( $args['name'] ) ? $args['name'] : null;
            if (! $model ) {
                $model = $ctx->params['context_model'];
                $table = $ctx->params['context_table'];
            } else {
                $table = $app->get_table( $model );
            }
            $_model = $app->db->model( $model )->new();
            if (! $table ) {
                $repeat = $ctx->false();
                return '';
            }
            $columns = $type ? $app->stash( $model . ':columns:' . $type ) : null;
            $file_col = $app->stash( $model . ':file_column' );
            if (! $columns ) {
                $terms = [];
                $terms['table_id'] = $table->id;
                $cols = 'name,type,default,edit,disp_edit,label,not_null,is_primary,autoset,unchangeable,hint,options,translate,extra,index';
                if ( $type ) {
                    if ( $type === 'list' ) {
                        $terms['list'] = ['!=' => ''];
                        $cols .= ',list';
                    } else if ( $type === 'edit' ) {
                        $terms['edit'] = ['!=' => ''];
                        $cols .= ',disp_edit,edit';
                    }
                }
                if ( $colName ) {
                    $terms['name'] = $colName;
                }
                $args = ['sort' => 'order', 'direction' => 'ascend'];
                $columns = $app->db->model( 'column' )->load( $terms, $args, $cols );
                if ( $type ) {
                    $app->stash( $model . ':columns:' . $type, $columns );
                }
                $file_col = $app->db->model( 'column' )->load( [
                    'table_id' => $table->id,
                    'edit' => 'file'], ['limit' => 1], 'id,name' );
                if ( is_array( $file_col ) && count( $file_col ) ) {
                    $file_col = $file_col[0];
                    $app->stash( $model . ':file_column', $file_col );
                }
            }
            $user = $app->user();
            if ( $model == 'user' && $user && !$user->is_superuser ) {
                $new_columns = [];
                $not_changes = ['is_superuser', 'status', 'lock_out', 'last_login_on',
                    'uuid', 'lock_out_on', 'created_on'];
                if ( $app->can_do( 'user', 'create' ) ) {
                    $not_changes = ['is_superuser'];
                    if (! $app->can_do( 'user', 'activate' ) ) {
                        $not_changes[] = 'status';
                    }
                }
                foreach ( $columns as $col ) {
                    if ( in_array( $col->name, $not_changes ) == false ) {
                        $new_columns[] = $col;
                    }
                }
                $columns = $new_columns;
            }
            $scheme = $app->get_scheme_from_db( $model );
            $ctx->stash( 'scheme', $scheme );
            $hide_edit_options = isset( $scheme['hide_edit_options'] )
                               ? $scheme['hide_edit_options'] : [];
            $ctx->stash( 'hide_edit_options', $hide_edit_options );
            $ctx->local_vars['table_primary'] = $table->primary;
            $ctx->local_params = $columns;
            $ctx->stash( 'model', $model );
            $ctx->stash( 'file_col', $file_col );
        }
        $scheme = $ctx->stash( 'scheme' );
        $disable_edit_options = $ctx->stash( 'disable_edit_options' );
        $hide_edit_options = $ctx->stash( 'hide_edit_options' );
        $model = $ctx->stash( 'model' );
        $params = $ctx->local_params;
        $file_col = $ctx->stash( 'file_col' );
        if ( $file_col ) $ctx->local_vars['__file_col__'] = $file_col->name;
        $ctx->set_loop_vars( $counter, $params );
        $disp_option = $app->disp_option;
        if ( isset( $params[ $counter ] ) ) {
            $repeat = true;
            $obj = $params[ $counter ];
            $colprefix = $obj->_colprefix;
            $values = $obj->get_values();
            $ctx->local_vars['disable_edit_options'] = false;
            // $ctx->local_vars['hide_edit_options'] = false;
            if ( $type === 'list' || $app->param( '_type' ) === 'list' ) {
                if ( $disp_option && is_array( $disp_option ) ) {
                    $col = $values[ $colprefix . 'name'];
                    if (! in_array( $col, $disp_option ) ) {
                        return $counter === 1 ? $content : '';
                    }
                }
            } else if ( $type === 'edit' || $app->param( '_type' ) === 'edit' ) {
                if ( isset( $args['option'] ) && !empty( $disable_edit_options ) ) {
                    if ( in_array( $obj->name, $disable_edit_options ) ) {
                        $ctx->local_vars['disable_edit_options'] = true;
                    }
                }
            }
            foreach ( $values as $key => $value ) {
                if ( $colprefix ) $key = preg_replace( "/^$colprefix/", '', $key );
                if ( $key === 'edit' ) {
                    $ctx->local_vars['disp_option'] = '';
                    if ( $value && strpos( $value, ':' ) && preg_match( '/:hierarchy$/', $value ) ) {
                        $props = explode( ':', $value );
                        $rel_table = $app->get_table( $props[1] );
                        if (! $rel_table || ! $rel_table->hierarchy ) {
                            $value = preg_replace( '/:hierarchy$/', ':checkbox', $value );
                        }
                    }
                    if ( $value && strpos( $value, '(' ) ) {
                        list( $value, $opt ) = explode( '(', $value );
                        $opt = rtrim( $opt, ')' );
                        $ctx->local_vars['disp_option'] = $opt;
                    }
                }
                $ctx->local_vars[ $var_prefix . $key ] = $value;
            }
            $ctx->local_vars['label'] = $app->translate( $obj->label );
        } else {
            $repeat = $ctx->false();
            unset( $params );
        }
        return $content;
    }

    function hdlr_getcookie ( $args, $ctx ) {
        if ( php_sapi_name() == 'cli' ) return '';
        $name   = isset( $args['name'] ) ? $args['name'] : false;
        if (! $name ) return '';
        return isset( $_COOKIE[ $name ] ) ? $_COOKIE[ $name ] : '';
    }

    function filter_sec2hms ( $ts, $arg, $ctx ) {
        if ( $ts === null ) $ts = 0;
        list( $h, $m, $s ) = PTUtil::sec2hms( $ts, true );
        $app = $ctx->app;
        if ( $h ) return $app->translate( '%1$sh %2$smin %3$sseconds', [ $h, $m, $s ] );
        if ( $m ) return $app->translate( '%1$smin %2$sseconds', [ $m, $s ] );
        return $app->translate( '%sseconds', $s );
    }

    function filter_add_mtime ( $url, $arg, $ctx ) {
        if (! $url ) return '';
        $app = $ctx->app;
        $urlObj = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $url ] );
        if ( $urlObj->id ) {
            $mtime = $app->fmgr->filemtime( $urlObj->file_path );
            if (! $mtime ) $mtime = $urlObj->filemtime;
            if ( $mtime ) {
                $arg = $arg ? $arg : 'ts';
                $arg .= '=';
                $url .= strpos( $url, '?' ) === false ? "?{$arg}{$mtime}" : "&{$arg}{$mtime}";
            }
        }
        return $url;
    }

    function filter_trans ( $str, $arg, $ctx ) {
        if ( $str === null ) return '';
        $app = $ctx->app;
        if (! $arg ) return $str;
        $component = $app->component( $arg );
        if ( $component ) {
            $arg = '';
        } else {
            $component = $app;
        }
        return $app->translate( $str, $arg, $component );
    }

    function filter_language ( $str, $arg, $ctx ) {
        if ( $str === null ) return '';
        $app = $ctx->app;
        return $app->translate( $str, null, null, $arg );
    }

    function filter__archive_type ( $str, $arg, $ctx ) {
        if ( $str === null ) return '';
        if ( strpos( $str, '-' ) !== false ) {
            $app = $ctx->app;
            $at = explode( '-', $str );
            $model = array_shift( $at );
            $at = implode( '-', $at );
            $str = $app->translate( $model ) . ' - ' . $app->translate( $at );
        }
        return $str;
    }

    function filter_convert_breaks ( $text, $arg, $ctx ) {
        if ( $text === null ) return '';
        if ( $text === '' ) return '';
        $text = trim( $text );
        if ( $text === '' ) return '';
        $app = $ctx->app;
        $current_context = $ctx->stash( 'current_context' );
        $obj = $ctx->stash( $current_context );
        if (! $obj ) return $text;
        $format = $arg == 'auto' ? $obj->text_format : $arg;
        if ( $format === 'markdown' ) {
            $cache_key = $obj->_model . DS . $obj->id. DS . 'md_' . md5( $text ) . '__c';
            $cache = $app->get_cache( $cache_key );
            if ( $cache ) return $cache;
            require_once( LIB_DIR . 'php-markdown'
                . DS . 'Michelf' . DS . 'Markdown.inc.php' );
            $text = Markdown::defaultTransform( $text );
            $app->set_cache( $cache_key, $text );
        } else if ( $format === 'convert_breaks' ) {
            $cache_key = $obj->_model . DS . $obj->id. DS . 'cb_' . md5( $text ) . '__c';
            $cache = $app->get_cache( $cache_key );
            if ( $cache ) return $cache;
            $text = PTUtil::convert_breaks( $text );
            $app->set_cache( $cache_key, $text );
        }
        return $text;
    }

    function filter_offset_time ( $ts, $arg, $ctx ) {
        if ( $ts === null ) return '';
        $app = $ctx->app;
        if (! $app->use_timezone || $app->current_tz == $app->timezone ) {
            return $ts;
        } else if (! $app->workspace() ) {
            return $ts;
        }
        if (! $app->time_offset ) {
            return $ts;
        }
        $ts = strtotime( $ts );
        if ( $ts === false ) return '';
        $ts += $app->time_offset;
        return date( 'Y-m-d H:i',$ts );
    }

    function filter__eval ( $text, $arg, $ctx ) {
        if ( $text === null ) return $text;
        $app = $ctx->app;
        if ( stripos( $text, '{{mt' ) !== false && strpos( $text, '}}' ) !== false ) {
            $text = preg_replace( "/\{\{(\/{0,1}mt.*?)\}\}/i", "<$1>", $text );
        }
        return $ctx->build( $text );
    }

    function filter_convert2linkurl ( $text, $arg, $ctx ) {
        if ( $text === null ) return $text;
        $app = $ctx->app;
        $workspace = $ctx->stash( 'workspace' );
        $site_url  = $workspace ? $workspace->site_url : $app->site_url;
        if ( strpos( $text, $site_url ) === false ) {
            return $text;
        }
        $link_url  = $workspace ? $workspace->link_url : $app->link_url;
        if ( $app->is_valid_url( $arg ) ) {
            $link_url = $arg;
        }
        if (! $site_url || ! $link_url ) {
            return $text;
        }
        return str_replace( $site_url, $link_url, $text );
    }

    function filter_normarize ( $text, $arg, $ctx ) { // Typo, Backward compatibility.
        if ( $text === null ) return $text;
        return $ctx->modifier_normalize( $text, $arg, $ctx );
    }

    function filter_epoch2str ( $ts, $arg, $ctx ) {
        $app = $ctx->app;
        if (! $ts ) return $app->translate( 'Just Now' );
        $ts = time() - $ts;
        if ( $ts < 3600 ) {
            $str = $ts / 60;
            $str = round( $str );
            if ( $str < 5 ) return $app->translate( 'Just Now' );
            return $app->translate( '%s mins ago', $str );
        } else if ( $ts < 86400 ) {
            $str = $ts / 3600;
            $str = round( $str );
            return $app->translate( '%s hours ago', $str );
        } else if ( $ts < 604800 ) {
            $str = $ts / 86400;
            $str = round( $str );
            return $app->translate( '%s day(s) ago', $str );
        } else if ( $ts < 2678400 ) {
            $str = $ts / 604800;
            $str = round( $str );
            return $app->translate( '%s week(s) ago', $str );
        } else if ( $ts < 31536000 ) {
            return $app->translate( 'More than month ago' );
        } else {
            return $app->translate( 'More than year ago' );
        }
    }
}

function pt_whitespace_to_underscore ( $var ) {
    return  strpos( $var, ' ' ) === false ? $var : str_replace( ' ', '_', $var );
}