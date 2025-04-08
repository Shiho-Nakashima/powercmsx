<?php

class PTWorker {

    public $app;
    public $version = 3.5000;
    public $bulk_remove_per = 40;
    public $pid = null;
    public $verbose  = null;
    public $argv     = [];
    public $_argv     = [];
    public $executed = [];
    public $excludes = [];
    public $publish_queue_offset = null;
    public $publish_queue_order = 'descend';
    public $update_before = null;
    public $meth;
    public $max_execution_time = null;
    public $worker_period = null;
    public $memory_limit  = null;
    public $start_time    = 0;
    public $current_time  = 0;

    function __destruct() {
        if ( $this->pid && file_exists( $this->pid ) ) {
            @unlink( $this->pid );
        }
    }

    function start_work ( $app, &$argv = [] ) {
        $app->id = 'Worker';
        $app->worker = $this;
        $this->_argv = $argv;
        $this->app = $app;
        if ( $app->fmgr ) $app->fmgr->delayed = false;
        if ( function_exists( 'opcache_reset' ) ) {
            ini_set( 'opcache.enable_cli', 1 );
        }
        if ( $app->db ) $app->db->caching = $app->worker_db_caching;
        if ( in_array( '--verbose', $argv ) ) {
            $this->verbose = true;
            $idx = array_search( '--verbose', $argv );
            unset( $argv[ $idx ] );
        }
        if ( in_array( '--exclude_ids', $argv ) ) {
            $idx = array_search( '--exclude_ids', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $this->excludes = explode( ',', $argv[ $idx + 1] );
                unset( $argv[ $idx + 1] );
            } else {
                $this->excludes = [];
            }
            unset( $argv[ $idx ] );
        }
        if ( in_array( '--max_exec_time', $argv ) ) {
            $idx = array_search( '--max_exec_time', $argv );
            $max_execution_time = (int) $argv[ $idx + 1];
            unset( $argv[ $idx + 1], $argv[ $idx ] );
            if ( $max_execution_time ) {
                ini_set( 'max_execution_time', $max_execution_time );
            }
        } else if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        if ( in_array( '--request_id', $argv ) ) {
            $idx = array_search( '--request_id', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $request_id = isset( $argv[ $idx + 1] ) ? $argv[ $idx + 1] : $app->request_id;
                if ( $request_id ) $app->request_id = $request_id;
                unset( $argv[ $idx + 1], $argv[ $idx ] );
            } else {
                unset( $argv[ $idx ] );
            }
        }
        if ( in_array( '--publish_queue_limit', $argv ) ) {
            $idx = array_search( '--publish_queue_limit', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $publish_queue_limit = isset( $argv[ $idx + 1] ) ? (int) $argv[ $idx + 1] : 0;
                if ( $publish_queue_limit ) $app->publish_queue_limit = $publish_queue_limit;
                unset( $argv[ $idx + 1], $argv[ $idx ] );
            } else {
                unset( $argv[ $idx ] );
            }
        }
        if ( in_array( '--publish_queue_offset', $argv ) ) {
            $idx = array_search( '--publish_queue_offset', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $publish_queue_offset = isset( $argv[ $idx + 1] ) ? (int) $argv[ $idx + 1] : 0;
                if ( $publish_queue_offset ) $this->publish_queue_offset = $publish_queue_offset;
                unset( $argv[ $idx + 1], $argv[ $idx ] );
            } else {
                unset( $argv[ $idx ] );
            }
        }
        if ( in_array( '--publish_queue_order', $argv ) ) {
            $idx = array_search( '--publish_queue_order', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $publish_queue_order = $argv[ $idx + 1] ?? 'descend';
                if ( $publish_queue_order !== 'ascend' && $publish_queue_order !== 'descend' ) {
                    $publish_queue_order = 'descend';
                }
                if ( $publish_queue_order ) $this->publish_queue_order = $publish_queue_order;
                unset( $argv[ $idx + 1], $argv[ $idx ] );
            } else {
                unset( $argv[ $idx ] );
            }
        }
        if ( in_array( '--sleep', $argv ) ) {
            $idx = array_search( '--sleep', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $sleep = isset( $argv[ $idx + 1] ) ? (int) $argv[ $idx + 1] : 0;
                if ( $sleep ) sleep( $sleep );
                unset( $argv[ $idx + 1], $argv[ $idx ] );
            } else {
                unset( $argv[ $idx ] );
            }
        }
        if ( in_array( '--task_ids', $argv ) ) {
            $idx = array_search( '--task_ids', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $argv = explode( ',', $argv[ $idx + 1] );
            } else {
                $argv = [];
            }
        }
        $this->argv = $argv;
    }

    function work ( $app, $argv ) {
        $this->meth = 'work';
        $this->app = $app;
        if ( $app->worker_debug ) {
            $all_log = $this->start_task( $app->translate( 'All' ), $app, 'start_time' );
            $json = json_encode( $argv );
            $all_log->metadata( $json );
            $all_log->save();
        }
        $all_conter = 0;
        $this->start_work( $app, $argv );
        $app->init_tags( true );
        $fmgr = $app->fmgr;
        $current_ts = date( 'YmdHis' );
        $verbose = $this->verbose;
        $worker_labels = [];
        $worker_messages = [];
        $continue = $this->continue_task( 'remove_compiled', $argv );
        $worker_label = $app->translate( 'Clean up compiled cache' );
        if ( $continue && ( $app->ctx_cache_ttl > 0 ) ) {
            if ( $verbose ) echo "{$worker_label}...\n";
            $compile_dir = $app->compile_dir;
            if ( $compile_dir && is_dir( $compile_dir ) ) {
                if ( $app->worker_debug )
                    $log = $this->start_task( $worker_label, $app );
                $cache_files = [];
                $res_counter = 0;
                PTUtil::file_find( $compile_dir, $cache_files );
                $cache_expires = $app->ctx_cache_ttl;
                foreach ( $cache_files as $cache ) {
                    $past = $app->request_time - fileatime( $cache );
                    if ( $cache_expires < $past ) {
                        $fmgr->unlink( $cache );
                        $res_counter++;
                    }
                }
                if ( $res_counter ) {
                    $all_conter+= $res_counter;
                    $app->re_compile();
                    $this->executed[] = 'remove_compiled';
                    $worker_labels[] = $worker_label;
                    $worker_messages[ $worker_label ] =
                        $app->translate( 'Removed %s %s.',
                            [ $res_counter, $app->translate('Compiled template(s)') ] );
                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                }
                if ( $app->worker_debug )
                    $this->finish_task( $worker_label, $res_counter, $log, $app );
            }
        }
        if (! $theme_static = $app->theme_static ) {
            $theme_static = $app->path . 'theme-static/';
            $app->theme_static = $theme_static;
        }
        $db = $app->db;
        $bulk_remove_per = $this->bulk_remove_per;
        $res_counter = 0;
        $continue = $this->continue_task( 'clean_up_cache', $argv );
        if ( $continue ) {
            $worker_label = $app->translate( 'Clean up expired cache' );
            if ( $verbose ) echo "{$worker_label}...\n";
            $cache_expires = $app->cache_expires;
            $ttl = time() - $cache_expires;
            if ( $app->worker_debug )
                $log = $this->start_task( $worker_label, $app );
            if ( $driver = $app->cache_driver ) {
                if ( method_exists( $driver->_driver, 'clean_up' ) ) {
                    $res_counter = $driver->_driver->clean_up();
                } else {
                    // Memcached
                    $_prefix = $driver->_prefix;
                    $keys = $driver->getAllKeys();
                    if ( $keys !== false ) {
                        foreach ( $keys as $key ) {
                            if ( strpos( $key, $_prefix ) === 0 ) {
                                $cache = $driver->instance()->get( $key );
                                if ( is_array( $cache ) ) {
                                    list( $mtime, $data ) = $cache;
                                    if ( $ttl > $mtime ) {
                                        $driver->instance()->delete( $key );
                                        $res_counter++;
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                // File
                $cache_dirs = [];
                if ( $app->db_cache_dir && is_dir( $app->db_cache_dir ) ) {
                    $cache_dirs[] = $app->db_cache_dir;
                }
                if ( $app->cache_dir && is_dir( $app->cache_dir ) ) {
                    $cache_dirs[] = $app->cache_dir;
                }
                foreach ( $cache_dirs as $cache_path ) {
                    $files = [];
                    PTUTil::file_find( $cache_path, $files );
                    foreach ( $files as $file ) {
                        if ( PTUtil::get_extension( $file ) == 'php' ) {
                            if (!file_exists( $file ) ) {
                                continue;
                            }
                            $mtime = @filemtime( $file );
                            if (! $mtime ) continue;
                            if ( $ttl > $mtime ) {
                                $fmgr->unlink( $file );
                                $res_counter++;
                            }
                        }
                    }
                }
            }
            if ( $res_counter ) {
                $all_conter+= $res_counter;
                $this->executed[] = 'clean_up_cache';
                $worker_messages[ $worker_label ] =
                    $app->translate( 'Clean up %s expired cache.', $res_counter );
                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
            }
            if ( $app->worker_debug )
                $this->finish_task( $worker_label, $res_counter, $log, $app );
        }
        if ( $app->sync_dirs && is_array( $app->sync_dirs ) && !empty( $app->sync_dirs ) ) {
            $continue = $this->continue_task( 'sync_directories', $argv );
            $sync_dirs = $app->sync_dirs;
            if ( $continue ) {
                $worker_label = $app->translate( 'Synchronize Directories' );
                if ( $app->worker_debug )
                    $log = $this->start_task( $worker_label, $app );
                if ( $verbose ) echo "{$worker_label}...\n";
                $res_counter = 0;
                foreach ( $sync_dirs as $from => $to ) {
                    $res_counter = PTUtil::sync_dir( $from, $to, false );
                }
                if ( $res_counter ) {
                    $all_conter+= $res_counter;
                    $this->executed[] = 'sync_directories';
                    $worker_labels[] = $worker_label;
                    $item_label = $res_counter == 1
                                  ? $app->translate( 'Item' )
                                  : $app->translate( 'Items' );
                    $worker_messages[ $worker_label ] =
                        $app->translate( 'Synchronized %s %s.', [ $res_counter, $item_label ] );
                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                }
                if ( $app->worker_debug )
                    $this->finish_task( $worker_label, $res_counter, $log, $app );
            }
        }
        if ( $app->comp_url_md5 ) {
            $continue = $this->continue_task( 'check_url_hash', $argv );
            if ( $continue ) {
                $worker_label = $app->translate( "Check URL's hash" );
                if ( $app->worker_debug )
                    $log = $this->start_task( $worker_label, $app );
                if ( $verbose ) echo "{$worker_label}...\n";
                $res_counter = 0;
                $urls = $db->model( 'urlinfo' )->load(
                    ['md5' => ['IS NOT NULL' => 1], 'class' => 'archive' ] );
                foreach ( $urls as $url ) {
                    if ( $fmgr->exists( $url->file_path ) ) {
                        $md5 = md5_file( $url->file_path );
                        if ( $url->md5 != $md5 ) {
                            $url->md5( $md5 );
                            $url->save();
                            $res_counter++;
                        }
                    }
                }
                if ( $res_counter ) {
                    $all_conter+= $res_counter;
                    $this->executed[] = 'check_url_hash';
                    $worker_labels[] = $worker_label;
                    $object_label = $res_counter == 1
                                  ? $app->translate( 'URL' )
                                  : $app->translate( 'URLs' );
                    $worker_messages[ $worker_label ] =
                        $app->translate( 'Reset md5 hash %s %s.', [ $res_counter, $object_label ] );
                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                }
                if ( $app->worker_debug )
                    $this->finish_task( $worker_label, $res_counter, $log, $app );
            }
        }
        $publisher = new PTPublisher();
        $status_models = $db->model( 'table' )->load( ['start_end' => 1] );
        $workflows = [];
        $wf_class = new PTWorkflow();
        $worker_label = '';
        $res_counter = 0;
        $trigger_mappings = [];
        $trigger_obj_mappings = [];
        $published_objs = [];
        $containers     = [];
        $app->get_scheme_from_db( 'workspace' );
        $all_workspaces = $app->db->model( 'workspace' )->load( null, null, 'id,timezone' );
        $all_workspaces[] = $app->db->model( 'workspace' )->__new( ['id' => 0, 'timezone' => $app->timezone ] );
        $parallel_publish_objs = (int) $app->parallel_publish_objs;
        $php_binary = $app->php_binary();
        if (! $php_binary ) $parallel_publish_objs = 0;
        $published_on_request = [];
        $wrapper_label = $app->translate( 'Scheduled publish,unpublish,replacement' );
        $wrapper_counter = 0;
        $wrapper_time = microtime( true );
        if ( $app->worker_debug )
            $wrapper_log = $this->start_task( $wrapper_label, $app );
        foreach ( $status_models as $table ) {
            $_published_objs = [];
            $model = $table->name;
            $scheme = $app->get_scheme_from_db( $model );
            $mappings = [];
            $triggers = $db->model( 'relation' )->load(
                ['name' => 'triggers', 'from_obj' => 'urlmapping',
                 'to_obj' => 'table', 'to_id' => $table->id ]
            );
            foreach ( $triggers as $trigger ) {
                $map = $db->model( 'urlmapping' )->load( (int) $trigger->from_id );
                if ( $map ) {
                    $map->__is_trigger = 1;
                    $mappings[] = $map;
                }
            }
            // Scheduled publish
            $continue = $this->continue_task( 'scheduled_publish', $argv );
            $publish_nextprev = 'publish_nextprev_' . strtolower( $table->plural );
            $current_ts = date( 'YmdHis' );
            if ( $continue ) {
                $worker_label = $app->translate( 'Scheduled publish(%s)',
                                            $app->translate( $table->plural ) );
                $label = $app->translate( $table->label );
                $primary = $table->primary;
                $res_counter = 0;
                $terms = ['status' => 3,
                    'published_on' => ['<=' => $current_ts ] ];
                if ( $table->revisable ) {
                    $terms['rev_type'] = 0;
                }
                $objects = [];
                if ( $app->use_timezone && $db->model( $model )->has_column( 'workspace_id', true ) ) {
                    foreach ( $all_workspaces as $tz_space ) {
                        if ( $tz_space->timezone ) {
                            $app->date_default_timezone_set( $tz_space->timezone );
                            $ts = date( 'YmdHis' );
                            $terms['published_on'] = ['<=' => $ts ];
                        } else {
                            $app->date_default_timezone_set( $app->timezone );
                            $terms['published_on'] = ['<=' => $current_ts ];
                        }
                        $terms['workspace_id'] = $tz_space->id;
                        $ws_objects = $db->model( $model )->load( $terms );
                        if (!empty( $ws_objects ) ) {
                            $objects = array_merge( $objects, $ws_objects );
                        }
                    }
                } else {
                    if ( $app->use_timezone ) $app->date_default_timezone_set( $app->timezone );
                    $terms['published_on'] = ['<=' => $current_ts ];
                    $objects = $db->model( $model )->load( $terms );
                }
                if ( $objects === false ) {
                    continue;
                }
                $app->init_callbacks( $model, 'scheduled_published' );
                $callback = ['name' => 'scheduled_published', 'model' => $model,
                             'scheme' => $scheme, 'table' => $table ];
                $containers = $db->model( 'urlmapping' )->load( ['container' => $model ] );
                if ( $verbose && count( $objects ) ) echo "{$worker_label}...\n";
                try {
                    foreach ( $objects as $obj ) {
                        if ( $obj->status != 3 ) { // Why you selected?
                            continue;
                        } elseif ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
                            continue;
                        }
                        $res_counter++;
                        $obj->status( 4 );
                        $original = clone $obj;
                        $app->set_default( $obj, false );
                        $obj->save();
                        // if (! $parallel_publish_objs ) $app->publish_obj( $obj, null, true );
                        if ( $obj->_relations === null ) $obj->_relations = $app->get_relations( $obj );
                        $name = $primary ? $obj->$primary : '';
                        $params = [ $label, $name, $obj->id ];
                        $message = $app->translate( "%s '%s(ID:%s)' published by scheduled task.", $params );
                        $log = $app->log( ['message' => $message, 'category' => 'worker',
                                           'model' => $model, 'object_id' => $obj->id,
                                           'workspace_id' => (int) $obj->workspace_id,
                                           'level' => 'info'] );
                        if ( $verbose ) echo $message, PHP_EOL;
                        $callback['log'] = $log;
                        $app->run_callbacks( $callback, $model, $obj, $original );
                        $published_objs[ $obj->_model . '_' . $obj->id ] = [ $obj, $original ];
                        $_published_objs[ $obj->_model . '_' . $obj->id ] = [ $obj, $original ];
                        $date_col = $app->get_date_col( $obj );
                        if ( $date_col && $obj->has_column( $date_col ) && ( $app->publish_nextprev || $app->$publish_nextprev ) ) {
                            $next_prev_objs = PTUtil::next_prev( $app, $obj );
                            foreach ( $next_prev_objs as $key => $next_prev ) {
                                if ( is_object( $next_prev ) ) {
                                    $app->delayed_publish_objs
                                        [ $next_prev->_model . '_' . $next_prev->id ] = $next_prev;
                                }
                            }
                        }
                        $workspace_id = $obj->has_column( 'workspace_id' ) ? $obj->workspace_id : 0;
                        $workspace_id = (int) $workspace_id;
                        if ( isset( $workflows["{$model}_{$workspace_id}"] ) ) {
                            $workflow = $workflows["{$model}_{$workspace_id}"];
                        } else {
                            $workflow = $db->model( 'workflow' )->get_by_key(
                                ['model' => $obj->_model,
                                 'workspace_id' => $workspace_id ] );
                            $workflows["{$model}_{$workspace_id}"] = $workflow;
                        }
                        if ( $workflow->id && $workflow->notify_changes ) {
                            $app->stash( 'workflow', $workflow );
                            // Some Plugin use $app->user, $app->param( 'workspace_id' ) or $app->param( '_model' ).
                            $app->user = $obj->user;
                            $orig_model = isset( $_GET['_model'] ) ? $_GET['_model'] : false;
                            $_GET['workspace_id'] = $obj->workspace_id ? (int) $obj->workspace_id : 0;
                            $_GET['_model'] = $obj->_model;
                            $wf_class->publish_object( $app, $obj );
                            $app->user = null;
                            unset( $_GET['workspace_id'] );
                            unset( $_GET['_model'] );
                            $app->stash( 'workflow', null );
                        }
                        foreach ( $mappings as $map ) {
                            // if ( isset( $trigger_mappings[ $map->id ] ) ) continue;
                            if ( $map->trigger_scope ) {
                                if ( $obj->workspace_id == $map->workspace_id ) {
                                    $trigger_mappings[ $map->id ] = $map;
                                    $trigger_obj_mappings[ $map->id ][ $obj->_model ] = true;
                                }
                            } else {
                                $trigger_mappings[ $map->id ] = $map;
                                $trigger_obj_mappings[ $map->id ][ $obj->_model ] = true;
                            }
                        }
                    }
                    unset( $objects );
                    if ( $res_counter ) {
                        $all_conter+= $res_counter;
                        $this->executed[] = 'scheduled_publish';
                        $worker_labels[] = $worker_label;
                        $object_label = $res_counter == 1
                                      ? $app->translate( $table->label )
                                      : $app->translate( $table->plural );
                        $worker_messages[ $worker_label ] = $app->translate( 'Published %s %s.',
                            [ $res_counter, $object_label ] );
                        if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                    }
                    $wrapper_counter+= $res_counter;
                } catch ( Exception $e ) {
                    $error = $e->getMessage();
                    $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                              [ $worker_label, $error ] );
                    if ( $verbose ) echo $error, PHP_EOL;
                    $this->log( $error, 'error', $app );
                }
            }
            unset( $_GET['workspace_id'] );
            unset( $_GET['_model'] );
            $worker_label = '';
            $res_counter = 0;
            if ( $table->revisable ) {
                // Scheduled replacement from revision
                $app->db->in_duplicate = true; // Not remove blob file.
                $continue = $this->continue_task( 'scheduled_replacement', $argv );
                if ( $continue ) {
                    $current_ts = date( 'YmdHis' );
                    $worker_label = $app->translate( 'Scheduled replacement from revision(%s)',
                                                $app->translate( $table->plural ) );
                    $res_counter = 0;
                    $rel_attach_cols = PTUtil::attachment_cols( $table->name, $scheme, 'relation' );
                    $terms = ['rev_type' => 2, 'status' => 3];
                    try {
                        $objects = [];
                        if ( $app->use_timezone && $db->model( $model )->has_column( 'workspace_id', true ) ) {
                            foreach ( $all_workspaces as $tz_space ) {
                                if ( $tz_space->timezone ) {
                                    $app->date_default_timezone_set( $tz_space->timezone );
                                    $ts = date( 'YmdHis' );
                                    $terms['published_on'] = ['<=' => $ts ];
                                } else {
                                    $app->date_default_timezone_set( $app->timezone );
                                    $terms['published_on'] = ['<=' => $current_ts ];
                                }
                                $terms['workspace_id'] = $tz_space->id;
                                $ws_objects = $db->model( $model )->load( $terms );
                                if (!empty( $ws_objects ) ) {
                                    $objects = array_merge( $objects, $ws_objects );
                                }
                            }
                        } else {
                            if ( $app->use_timezone ) $app->date_default_timezone_set( $app->timezone );
                            $terms['published_on'] = ['<=' => $current_ts ];
                            $objects = $db->model( $model )->load( $terms );
                        }
                        if ( $objects === false ) {
                            continue;
                        }
                        if ( $verbose && count( $objects ) ) echo "{$worker_label}...\n";
                        $app->init_callbacks( $model, 'scheduled_replacement' );
                        $callback = ['name' => 'scheduled_replacement', 'model' => $model,
                                     'scheme' => $scheme, 'table' => $table ];
                        foreach ( $objects as $obj ) {
                            if ( $obj->rev_type != 2 || $obj->status != 3 ) {
                                continue; // Why you selected?
                            }
                            $rev_obj = clone $obj;
                            $rev_id = $obj->id;
                            $obj_relations = $app->get_relations( $obj );
                            $obj_metadata  = $app->get_meta( $obj );
                            $original = null;
                            $original_id = null;
                            $basename = '';
                            $clone = null;
                            $replaced_attaches = [];
                            $orig_attaches = [];
                            $original_status = null;
                            $changed_cols = [];
                            if ( $original_id = $obj->rev_object_id ) {
                                $original = $db->model( $model )->load( (int) $original_id );
                                $keep_published_on = $original->published_on;
                                if ( $original ) {
                                    $original_status = $original->status;
                                    if (! empty( $rel_attach_cols ) ) {
                                        foreach ( $rel_attach_cols as $attach_col ) {
                                            $orig_attaches =
                                                $app->get_relations( $original,
                                                    'attachmentfile', $attach_col );
                                            $obj_attaches =
                                                $app->get_relations( $obj,
                                                    'attachmentfile', $attach_col );
                                            if ( count( $orig_attaches ) || count( $obj_attaches ) ) {
                                                $changed_cols[ $attach_col ] = true;
                                                if ( count( $orig_attaches ) ) {
                                                    foreach ( $orig_attaches as $orig_attach ) {
                                                        $attachment_id = (int) $orig_attach->to_id;
                                                        $old_file =
                                                            $db->model( 'attachmentfile' )
                                                                ->load( $attachment_id );
                                                        if ( $old_file ) {
                                                            $replaced_attaches
                                                                [ $attachment_id ] = $old_file;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    $obj->id( (int) $original_id );
                                    if ( isset( $scheme['unchangeable'] ) ) {
                                        $unchangeable = $scheme['unchangeable'];
                                        foreach ( $unchangeable as $unchange_col ) {
                                            $obj->$unchange_col( $original->$unchange_col );
                                        }
                                    }
                                    $clone = clone $original;
                                    $clone->id( $rev_id );
                                    $obj->status( $original->status );
                                    if ( $obj->has_column( 'basename' ) && $app->keep_master_basename ) {
                                        $basename = $original->basename;
                                        $obj->basename( $basename );
                                    }
                                    $orig_relations = $app->get_relations( $original );
                                    $orig_metadata  = $app->get_meta( $original );
                                    $clone->_relations = $orig_relations;
                                    $clone->_meta = $orig_metadata;
                                    if (! empty( $orig_relations ) ) {
                                        foreach ( $orig_relations as $idx => $orig_relation ) {
                                            $orig_relation->from_id( $rev_id );
                                            $orig_relations[ $idx ] = $orig_relation;
                                        }
                                        $db->model( 'relation' )->update_multi( $orig_relations );
                                    }
                                    if (! empty( $orig_metadata ) ) {
                                        foreach ( $orig_metadata as $idx => $orig_meta ) {
                                            $orig_meta->object_id( $rev_id );
                                            $orig_metadata[ $idx ] = $orig_meta;
                                        }
                                        $db->model( 'meta' )->update_multi( $orig_metadata );
                                    }
                                    if ( $app->keep_published_on ) {
                                        $obj->published_on( $keep_published_on );
                                    }
                                    $obj->save();
                                    $blob_cols = $db->get_blob_cols( $obj->_model, true );
                                    $start_publish = [];
                                    if ( $app->publish_callbacks ) {
                                        $ctx = $app->ctx;
                                        $app->init_callbacks( 'blob', 'start_publish' );
                                        $file_unlink = true;
                                        $start_publish = ['name' => 'start_publish', 'model' => 'blob',
                                                          'object' => $obj, 'ctx' => $ctx, 'original' => $clone,
                                                          'unlink' => $file_unlink ];
                                    }
                                    foreach ( $blob_cols as $blob_col ) {
                                        if (! $obj->$blob_col ) {
                                            $urls = $db->model( 'urlinfo' )->load(
                                                ['class' => 'file','key' => $blob_col,
                                                 'object_id' => $obj->id,'model' => $obj->_model ] );
                                            foreach ( $urls as $url ) {
                                                if ( $app->publish_callbacks ) {
                                                    $start_publish['urlinfo'] = $url;
                                                    $app->run_callbacks( $start_publish, 'blob', $file_unlink );
                                                }
                                                if (! $url->remove() ) {
                                                    return $app->rollback(
                                                    'An error occurred while updating the related object(s).' );
                                                }
                                            }
                                        }
                                    }
                                    $clone->rev_type( 1 );
                                    $clone->rev_object_id( $obj->id );
                                    $clone->status( 0 );
                                    $changed_cols = PTUtil::object_diff( $app, $clone, $obj, [], $changed_cols );
                                    $changed = array_keys( $changed_cols );
                                    $clone->rev_changed( join( ', ', $changed ) );
                                    $clone->rev_diff( json_encode( $changed_cols,
                                                         JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
                                    $clone->save();
                                    $res_counter++;
                                } else {
                                    continue;
                                }
                            } else {
                                continue;
                            }
                            if ( $clone->id && ! empty( $replaced_attaches ) ) {
                                $update_rels = [];
                                foreach ( $orig_attaches as $attach ) {
                                    $old_id = (int) $attach->to_id;
                                    if ( isset( $replaced_attaches[ $old_id ] ) ) {
                                        $old_file = $replaced_attaches[ $old_id ];
                                        if ( $old_file ) {
                                            $old_file->status( 0 );
                                            $old_file->save();
                                        }
                                        $attach->from_id( $rev_id );
                                        $update_rels[] = $attach;
                                    }
                                }
                                if (! empty( $update_rels ) ) {
                                    $db->model( 'relation' )->update_multi( $update_rels );
                                }
                            }
                            if ( $model === 'asset' ) {
                                $file_ext = $original->file_ext;
                                $file_name = basename( $original->file_name, "{$file_ext}" ) . $obj->file_ext;
                                $obj->file_name( $file_name );
                            }
                            $app->set_default( $obj );
                            if ( $basename ) {
                                $obj->basename( $basename );
                            }
                            $obj->rev_type( 0 );
                            $obj->rev_object_id( 0 );
                            $obj->save();
                            $new_relations = [];
                            foreach ( $obj_relations as $relation ) {
                                $relation->from_id( (int) $obj->id );
                                $relation->save();
                                $new_relations[] = $relation;
                            }
                            foreach ( $obj_metadata as $meta ) {
                                $meta->object_id( (int) $obj->id );
                                $meta->save();
                            }
                            // if (! $parallel_publish_objs ) $app->publish_obj( $obj, $clone, true );
                            $workspace_id = $obj->has_column( 'workspace_id' ) ? $obj->workspace_id : 0;
                            $workspace_id = (int) $workspace_id;
                            if ( isset( $workflows["{$model}_{$workspace_id}"] ) ) {
                                $workflow = $workflows["{$model}_{$workspace_id}"];
                            } else {
                                $workflow = $db->model( 'workflow' )->get_by_key(
                                    ['model' => $obj->_model,
                                     'workspace_id' => $workspace_id ] );
                                $workflows["{$model}_{$workspace_id}"] = $workflow;
                            }
                            if ( $workflow->id && $workflow->notify_changes ) {
                                $app->stash( 'workflow', $workflow );
                                $original->_apply_revision = $rev_obj;
                                $workflow_callback = [];
                                // Some Plugin use $app->user, $app->param( 'workspace_id' ) or $app->param( '_model' ).
                                $app->user = $obj->user;
                                $_GET['workspace_id'] = $obj->workspace_id ? (int) $obj->workspace_id : 0;
                                $_GET['_model'] = $obj->_model;
                                $wf_class->workflow_post_save( $workflow_callback, $app, $obj, $original );
                                $app->user = null;
                                unset( $_GET['workspace_id'] );
                                unset( $_GET['_model'] );
                                $app->stash( 'workflow', null );
                            }
                            foreach ( $mappings as $map ) {
                                // if ( isset( $trigger_mappings[ $map->id ] ) ) continue;
                                if ( $map->trigger_scope ) {
                                    if ( $obj->workspace_id == $map->workspace_id ) {
                                        $trigger_mappings[ $map->id ] = $map;
                                        $trigger_obj_mappings[ $map->id ][ $obj->_model ] = true;
                                    }
                                } else {
                                    $trigger_mappings[ $map->id ] = $map;
                                    $trigger_obj_mappings[ $map->id ][ $obj->_model ] = true;
                                }
                            }
                            if ( $original_status !== null ) {
                                $clone->status( $original_status );
                            }
                            $obj->_relations = $new_relations;
                            $name = $primary ? $obj->$primary : '';
                            $params = [ $label, $name, $obj->id ];
                            $message = $app->translate( "%s '%s(ID:%s)' replacement from revision by scheduled task.", $params );
                            $metadata = (! empty( $changed_cols ) )
                                      ? json_encode( $changed_cols,
                                                     JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT )
                                      : '';
                            $log = $app->log( ['message' => $message, 'category' => 'worker',
                                               'model' => $model, 'object_id' => $obj->id,
                                               'workspace_id' => (int) $obj->workspace_id,
                                               'level' => 'info', 'metadata' => $metadata ] );
                            if ( $verbose ) echo $message, PHP_EOL;
                            $callback['log'] = $log;
                            $app->run_callbacks( $callback, $model, $obj, $clone );
                            $published_objs[ $obj->_model . '_' . $obj->id ] = [ $obj, $clone ];
                            $_published_objs[ $obj->_model . '_' . $obj->id ] = [ $obj, $clone ];
                            $date_col = $app->get_date_col( $obj );
                            if ( $date_col && $obj->has_column( $date_col ) && ( $app->publish_nextprev || $app->$publish_nextprev ) ) {
                                $next_prev_objs = PTUtil::next_prev( $app, $obj );
                                foreach ( $next_prev_objs as $key => $next_prev ) {
                                    if ( is_object( $next_prev ) ) {
                                        $app->delayed_publish_objs
                                            [ $next_prev->_model . '_' . $next_prev->id ] = $next_prev;
                                    }
                                }
                                if ( $clone && $clone->$date_col != $obj->$date_col ) {
                                    $next_prev_objs = PTUtil::next_prev( $app, $clone );
                                    foreach ( $next_prev_objs as $key => $next_prev ) {
                                        if ( is_object( $next_prev ) ) {
                                            $app->delayed_publish_objs
                                                [ $next_prev->_model . '_' . $next_prev->id ] = $next_prev;
                                        }
                                    }
                                }
                            }
                        }
                        unset( $objects );
                        if ( $res_counter ) {
                            $all_conter+= $res_counter;
                            $this->executed[] = 'scheduled_replacement';
                            $worker_labels[] = $worker_label;
                            $object_label = $res_counter == 1
                                          ? $app->translate( $table->label )
                                          : $app->translate( $table->plural );
                            $worker_messages[ $worker_label ] = $app->translate( 'Replaced %s %s from revision.',
                                [ $res_counter, $object_label ] );
                            if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                        }
                        $wrapper_counter+= $res_counter;
                    } catch ( Exception $e ) {
                        $error = $e->getMessage();
                        $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                                  [ $worker_label, $error ] );
                        if ( $verbose ) echo $error, PHP_EOL;
                        $this->log( $error, 'error', $app );
                    }
                }
                $app->db->in_duplicate = false;
            }
            unset( $_GET['workspace_id'] );
            unset( $_GET['_model'] );
            // Scheduled unpublish
            $continue = $this->continue_task( 'scheduled_unpublish', $argv );
            if ( $continue ) {
                $current_ts = date( 'YmdHis' );
                $worker_label = $app->translate( 'Scheduled unpublish(%s)',
                                            $app->translate( $table->plural ) );
                $res_counter = 0;
                $unpublish_ts = $current_ts;
                $terms = ['status' => 4,
                    'has_deadline' => 1,
                    'unpublished_on' => ['<=' => $unpublish_ts ] ];
                if ( $table->revisable ) {
                    $terms['rev_type'] = 0;
                }
                try {
                    $objects = [];
                    if ( $app->use_timezone && $db->model( $model )->has_column( 'workspace_id', true ) ) {
                        foreach ( $all_workspaces as $tz_space ) {
                            if ( $tz_space->timezone ) {
                                $app->date_default_timezone_set( $tz_space->timezone );
                                $ts = date( 'YmdHis' );
                                $terms['unpublished_on'] = ['<=' => $ts ];
                            } else {
                                $app->date_default_timezone_set( $app->timezone );
                                $terms['unpublished_on'] = ['<=' => $unpublish_ts ];
                            }
                            $terms['workspace_id'] = $tz_space->id;
                            $ws_objects = $db->model( $model )->load( $terms );
                            if (!empty( $ws_objects ) ) {
                                $objects = array_merge( $objects, $ws_objects );
                            }
                        }
                    } else {
                        if ( $app->use_timezone ) $app->date_default_timezone_set( $app->timezone );
                        $terms['unpublished_on'] = ['<=' => $unpublish_ts ];
                        $objects = $db->model( $model )->load( $terms );
                    }
                    if ( $objects === false ) {
                        continue;
                    }
                    if ( count( $objects ) ) {
                        if ( $verbose ) echo "{$worker_label}...\n";
                        $app->init_callbacks( $model, 'scheduled_unpublish' );
                        $callback = ['name' => 'scheduled_unpublish', 'model' => $model,
                                     'scheme' => $scheme, 'table' => $table ];
                        foreach ( $objects as $obj ) {
                            if ( $obj->status != 4 || $obj->has_deadline != 1 ) { // Why you selected?
                                continue;
                            } elseif ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
                                continue;
                            } else if ( $obj->unpublished_on > $unpublish_ts ) {
                                continue;
                            }
                            $clone = clone $obj;
                            $obj->status( 5 );
                            $obj->has_deadline( 0 );
                            $obj->save();
                            // if (! $parallel_publish_objs ) $app->publish_obj( $obj, $clone, true );
                            if ( $obj->_relations === null ) $obj->_relations = $app->get_relations( $obj );
                            $name = $primary ? $obj->$primary : '';
                            $params = [ $label, $name, $obj->id ];
                            $message = $app->translate( "%s '%s(ID:%s)' unpublished by scheduled task.", $params );
                            $log = $app->log( ['message' => $message, 'category' => 'worker',
                                               'model' => $model, 'object_id' => $obj->id,
                                               'workspace_id' => (int) $obj->workspace_id,
                                               'level' => 'info'] );
                            if ( $verbose ) echo $message, PHP_EOL;
                            $callback['log'] = $log;
                            $app->run_callbacks( $callback, $model, $obj, $clone );
                            $published_objs[ $obj->_model . '_' . $obj->id ] = [ $obj, $clone ];
                            $_published_objs[ $obj->_model . '_' . $obj->id ] = [ $obj, $clone ];
                            $date_col = $app->get_date_col( $obj );
                            if ( $date_col && $obj->has_column( $date_col ) && ( $app->publish_nextprev || $app->$publish_nextprev ) ) {
                                $next_prev_objs = PTUtil::next_prev( $app, $clone );
                                foreach ( $next_prev_objs as $key => $next_prev ) {
                                    if ( is_object( $next_prev ) ) {
                                        $app->delayed_publish_objs
                                            [ $next_prev->_model . '_' . $next_prev->id ] = $next_prev;
                                    }
                                }
                            }
                            foreach ( $mappings as $map ) {
                                // if ( isset( $trigger_mappings[ $map->id ] ) ) continue;
                                if ( $map->trigger_scope ) {
                                    if ( $obj->workspace_id == $map->workspace_id ) {
                                        $trigger_mappings[ $map->id ] = $map;
                                        $trigger_obj_mappings[ $map->id ][ $obj->_model ] = true;
                                    }
                                } else {
                                    $trigger_mappings[ $map->id ] = $map;
                                    $trigger_obj_mappings[ $map->id ][ $obj->_model ] = true;
                                }
                            }
                            $res_counter++;
                        }
                        unset( $objects );
                        if ( $res_counter ) {
                            $all_conter+= $res_counter;
                            $this->executed[] = 'scheduled_unpublish';
                            $worker_labels[] = $worker_label;
                            $object_label = $res_counter == 1
                                          ? $app->translate( $table->label )
                                          : $app->translate( $table->plural );
                            $worker_messages[ $worker_label ] = $app->translate( 'Unpublished %s %s.',
                                [ $res_counter, $object_label ] );
                            if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                        }
                        $wrapper_counter+= $res_counter;
                    }
                } catch ( Exception $e ) {
                    $error = $e->getMessage();
                    $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                              [ $worker_label, $error ] );
                    if ( $verbose ) echo $error, PHP_EOL;
                    $this->log( $error, 'error', $app );
                }
            }
            foreach ( $_published_objs as $published_id => $objs ) {
                list( $obj, $original ) = $objs;
                foreach ( $containers as $container ) {
                    if ( $obj->has_column( 'workspace_id' ) && $container->workspace_id != $obj->workspace_id ) {
                        if (!$container->workspace_id && !$container->container_scope ) {
                        } else {
                            continue;
                        }
                    }
                    $app->publish_dependencies( $obj, $original, $container, true, $published_on_request );
                }
            }
            unset( $_published_objs );
        }
        if ( $parallel_publish_objs && ! empty( $published_objs ) ) {
            $publisher->parallel_publish_objs( array_keys( $published_objs ), $parallel_publish_objs );
            $published = array_keys( $published_objs );
            foreach ( $published as $published_obj ) {
                unset( $app->delayed_publish_objs[ $published_obj ] );
            }
        } else if ( !empty( $published_objs ) ) {
            foreach ( $published_objs as $published_id => $objs ) {
                list( $obj, $original ) = $objs;
                $app->publish_obj( $obj, $original, true );
                unset( $app->delayed_publish_objs[ $published_id ] );
            }
        }
        // Publish queue
        $continue = $this->continue_task( 'publish_queue', $argv );
        if ( $continue ) {
            $worker_label = $app->translate( 'Publish queue' );
            if ( $verbose ) echo "{$worker_label}...\n";
            $res_counter = 0;
            if ( $app->worker_debug )
                $log = $this->start_task( $worker_label, $app );
            try {
                $res_counter = $publisher->publish_queue();
                if ( $res_counter ) {
                    $all_conter+= $res_counter;
                    $this->executed[] = 'publish_queue';
                    $worker_labels[] = $worker_label;
                    $object_label = $res_counter == 1
                                  ? $app->translate( 'File' )
                                  : $app->translate( 'Files' );
                    $worker_messages[ $worker_label ] =
                        $app->translate( 'Published %s %s by publish queue.',
                        [ $res_counter, $object_label ] );
                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                }
                if ( $app->worker_debug )
                    $this->finish_task( $worker_label, $res_counter, $log, $app );
            } catch ( Exception $e ) {
                $error = $e->getMessage();
                $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                          [ $worker_label, $error ] );
                if ( $verbose ) echo $error, PHP_EOL;
                $this->log( $error, 'error', $app );
                if ( $app->worker_debug && isset( $log ) && is_object( $log ) ) $log->remove();
            }
        } else {
            // Realtime publish queue.
            if (! empty( $published_objs ) ) {
                foreach ( $published_objs as $key => $objs ) {
                    $publish_object = $objs[0];
                    $publish_queues = $app->db->model( 'urlinfo' )->load(
                        ['publish_file' => 4,
                         'object_id' => $publish_object->id,
                         'model' =>  $publish_object->_model ] );
                    foreach ( $publish_queues as $publish_queue ) {
                        $app->ctx->stash( 'workspace', $publish_queue->workspace );
                        $publisher->publish( $publish_queue, true );
                    }
                    unset( $published_objs[ $key ] );
                }
            }
        }
        unset( $published_objs );
        $all_triggers = [];
        if (! empty ( $app->delayed_dependencies ) ) {
            $dependencies = $app->delayed_dependencies;
            foreach ( $dependencies as $path => $params ) {
                list( $param1, $param2, $param3, $param4 ) = $params;
                $url = $app->db->model( 'urlinfo' )->get_by_key(
                          ['file_path' => $path, 'urlmapping_id' => $param2->id,
                           'model' => $param1->_model, 'class' => 'archive'] );
                $publish_file = $param2->publish_file;
                if ( $url->id ) {
                    if ( $publish_file == 2 ) {
                        $app->delayed[ $url->id ] = $url;
                        unset( $dependencies[ $path ] );
                        continue;
                    } else if ( $publish_file == 3 ) {
                        // On demand
                        if ( $fmgr->exists( $url->file_path ) ) {
                            $fmgr->unlink( $url->file_path );
                        }
                        $url->publish_file( 3 );
                        $url->save();
                        unset( $dependencies[ $path ] );
                        continue;
                    } else if ( $publish_file == 4 ) {
                        // Queue
                        $url->is_published( 0 );
                        $url->publish_file( 4 );
                        $url->save();
                        unset( $dependencies[ $path ] );
                        continue;
                    }
                    unset( $dependencies[ $path ] );
                    $all_triggers[ $url->id ] = $url;
                    continue;
                }
                if ( $param1->has_column( 'workspace_id' ) ) {
                    $app->ctx->stash( 'workspace', $param1->workspace );
                }
                $app->publish( $path, $param1, $param2, $param3, $param4 );
                $app->ctx->stash( 'workspace', null );
            }
            $app->delayed_dependencies = [];
            unset( $dependencies );
        }
        if (! empty( $trigger_mappings ) ) {
            if ( $verbose ) {
                $worker_label = $app->translate( 'Rebuild Triggers' );
                echo "{$worker_label}...\n";
            }
            foreach ( $trigger_mappings as $map_id => $trigger_mapping ) {
                $publish_file = $trigger_mapping->publish_file;
                if ( $publish_file == 6 || $publish_file == 5 ) continue;
                $urls = $db->model( 'urlinfo' )->load( ['urlmapping_id' => $map_id, 'class' => 'archive'] );
                foreach ( $urls as $idx => $url ) {
                    $meta = $app->db->model( 'meta' )->get_by_key(
                            ['model' => 'urlinfo', 'object_id' => $url->id,
                             'kind' => 'metadata', 'name' => 'triggers'] );
                    if ( $publish_file == 3 ) {
                        // On demand
                        if ( $fmgr->exists( $url->file_path ) ) {
                            $fmgr->unlink( $url->file_path );
                        }
                        $url->publish_file( 3 );
                        $url->save();
                        unset( $urls[ $idx ] );
                        if ( $meta->id ) {
                            $meta->remove();
                        }
                        continue;
                    }
                    if ( $fmgr->exists( $url->file_path ) ) {
                        $content = $fmgr->get( $url->file_path );
                        if ( strpos( $content, '<!--/triggersection-->' ) !== false ) {
                            $is_trigger = false;
                            $pattern = '/(<!\-\-triggersection\s[^>]*?>)(.*?)<!\-\-\/triggersection\-\->/si';
                            preg_match_all( $pattern, $content, $matches );
                            $trigger_models = [];
                            $obj_mappings = array_keys( $trigger_obj_mappings[ $map_id ] );
                            if ( is_array( $matches ) && isset( $matches[1] ) ) {
                                $open_tags = $matches[1];
                                foreach ( $open_tags as $open_tag ) {
                                    if ( preg_match( '/model="(.*?)"/', $open_tag, $out ) ) {
                                        $model = $out[1];
                                        if ( $model == '__any__' ) {
                                            $is_trigger = true;
                                        } else {
                                            $models = explode( ',', $model );
                                            $trigger_models = array_unique( array_merge( $trigger_models, $models ) );
                                            foreach ( $models as $model ) {
                                                if ( in_array( $model, $obj_mappings ) ) {
                                                    $is_trigger = true;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            foreach ( $obj_mappings as $obj_mapping ) {
                                if (! in_array( $obj_mapping, $trigger_models ) ) {
                                    $is_trigger = false;
                                    if ( $meta->id ) {
                                        $meta->remove();
                                    }
                                }
                            }
                            if ( $is_trigger ) {
                                $value = $meta->value ? explode( ',', $meta->value ) : [];
                                $value = array_merge( $value, $obj_mappings );
                                $meta->value( implode( ',', array_unique( $value ) ) );
                                $meta->save();
                            }
                        }
                    }
                    if ( $publish_file == 4 ) {
                        // Queue
                        $url->is_published( 0 );
                        $url->publish_file( 4 );
                        $url->save();
                        unset( $urls[ $idx ] );
                        continue;
                    }
                    $all_triggers[ $url->id ] = $url;
                    // $publisher->publish( $url, true );
                }
                unset( $urls );
            }
        }
        if (! empty( $all_triggers ) ) {
            $count = count( $all_triggers );
            if ( $php_binary && $app->parallel_rebuild_trigger && ( $count > $app->parallel_rebuild_trigger ) ) {
                $publisher->parallel_publish( $all_triggers, (int) $app->parallel_rebuild_trigger );
            } else if ( $php_binary && $app->rebuild_trigger_per && ( $count > $app->rebuild_trigger_per ) ) {
                $publisher->split_publish( $all_triggers, (int) $this->split_publish );
            } else {
                foreach ( $all_triggers as $url ) {
                    $app->ctx->stash( 'workspace', $url->workspace );
                    $publisher->publish( $url, true );
                    $app->ctx->stash( 'workspace', null );
                }
            }
        }
        $this->current_time = $wrapper_time;
        if ( $app->worker_debug )
            $this->finish_task( $wrapper_label, $wrapper_counter, $wrapper_log, $app );
        $res_counter = 0;
        $continue = $this->continue_task( 'job_queue', $argv );
        if ( $continue ) {
            $queue_max_retries = $app->queue_max_retries;
            $queue_counter = 0;
            $error_counter = 0;
            $worker_label = $app->translate( 'Job queue' );
            if ( $app->worker_debug )
                $log = $this->start_task( $worker_label, $app );
            if ( $verbose ) echo "{$worker_label}...\n";
            $time = time();
            $ts = date( 'Y-m-d H:i:s', $time );
            $current_ts = date( 'YmdHis', $time );
            $job_terms = ['start_on' => ['<=' => $ts ] ];
            if ( $db->model( 'ts_job' )->has_column( 'status', true ) ) {
                $job_terms['status'] = 2;
            }
            if ( $db->model( 'ts_job' )->has_column( 'is_running', true ) ) {
                $job_terms['is_running'] = 0;
            }
            $jobs = $db->model( 'ts_job' )->load( $job_terms,
                                                  ['sort' => ['start_on', 'id'],
                                                   'direction' => 'ascend'] );
            $default_job_interval = $app->job_retry_interval;
            $queue_ids = [];
            if ( $db->model( 'ts_job' )->has_column( 'is_running', true ) ) {
                foreach ( $jobs as $job ) {
                    $job->is_running( 1 );
                    $job->save();
                }
            }
            $per_once = [];
            foreach ( $jobs as $job ) {
                if ( $job->retry_interval ) {
                    $job_interval = $job->retry_interval;
                } else {
                    $job_interval = $default_job_interval;
                }
                $next_start_on = date( 'Y-m-d H:i:s', $time + $job_interval );
                $queues = $db->model( 'queue' )->load( ['ts_job_id' => $job->id ] );
                if ( empty( $queues ) ) {
                    $job->remove();
                    continue;
                }
                $_queues = [];
                $completed = true;
                $does_act = false;
                $skipped = false;
                $max_per_once = $job->max_per_once;
                foreach ( $queues as $queue ) {
                    $start_on = $queue->db2ts( $queue->start_on );
                    if ( $current_ts < $start_on ) {
                        $queue_ids[] = $queue->id;
                        $skipped = true;
                        if ( $db->model( 'ts_job' )->has_column( 'is_running', true ) ) {
                            if ( $job->is_running ) {
                                $job->is_running( 0 );
                                $job->save();
                            }
                        }
                        continue;
                    }
                    if ( $max_per_once ) {
                        $per_once[ $job->name ] = isset( $per_once[ $job->name ] ) ? $per_once[ $job->name ] + 1 : 1;
                        if ( $per_once[ $job->name ] > $max_per_once ) {
                            $skipped = true;
                            if ( $db->model( 'ts_job' )->has_column( 'is_running', true ) ) {
                                if ( $job->is_running ) {
                                    $job->is_running( 0 );
                                    $job->save();
                                }
                                $queue->start_on( $next_start_on );
                                $queue->save();
                            }
                            continue;
                        }
                    }
                    $component = $queue->component;
                    $method = $queue->method;
                    $component = $app->component( $component );
                    if ( is_object( $component ) && method_exists( $component, $method ) ) {
                        $does_act = true;
                        $error = '';
                        $res = $component->$method( $app, $queue, $error );
                        if ( $queue->interval ) usleep( $queue->interval );
                        if ( $res ) {
                            $_queues[] = $queue;
                            $queue_counter++;
                            $queue->remove();
                        } else {
                            $queue_ids[] = $queue->id;
                            $queue->__error = true;
                            $error_counter++;
                            $errors = (int) $queue->errors;
                            $max_retries = $queue->max_retries ? $queue->max_retries : $queue_max_retries;
                            $errors++;
                            if ( $error ) {
                                $error = $app->translate( "An error occurred in class %s's method %s(%s).",
                                  [ $queue->component, $method, $error ] );
                            }
                            if ( $errors < $max_retries ) {
                                $completed = false;
                                $queue->errors( $errors );
                                $queue->start_on( $next_start_on );
                                $queue->save();
                            } else {
                                $queue->remove();
                                $error .= $app->translate( 'The queue has been canceled because the max retry number has been exceeded.' );
                            }
                            if ( $error ) {
                                $this->log( $error, 'error' );
                            }
                        }
                    }
                }
                unset( $queues );
                if ( $does_act ) {
                    $component = $app->component( $job->component );
                    $job_name = $job->name;
                    if ( is_object( $component ) ) {
                        $job_name = $component->translate( $job_name );
                    }
                    if ( $job_label = $job->label ) {
                        $job_name .= "({$job_label})";
                    }
                    $message = $app->translate( "The job '%s' has been executed.", $job_name );
                    $log = $this->log( $message, 'info', $app, $job->workspace_id );
                    $app->init_callbacks( 'ts_job', 'executed' );
                    $callback = ['name' => 'executed', 'model' => 'ts_job'];
                    $app->run_callbacks( $callback, 'ts_job', $job, $_queues, $log );
                    if ( $completed ) {
                        if (! $skipped ) {
                            $job->remove();
                        } else {
                            if ( $db->model( 'ts_job' )->has_column( 'is_running', true ) ) {
                                $job->is_running( 0 );
                            }
                            $job->start_on( $next_start_on );
                            $job->save();
                        }
                    } else {
                        if ( $db->model( 'ts_job' )->has_column( 'is_running', true ) ) {
                            $job->is_running( 0 );
                        }
                        $job->start_on( $next_start_on );
                        $job->save();
                    }
                }
                $res_counter++;
            }
            unset( $jobs );
            $terms = ['start_on' => ['<=' => $ts ] ];
            if (! empty( $queue_ids ) ) {
                $terms['id'] = ['NOT IN' => $queue_ids ];
            }
            $queues = $db->model( 'queue' )->load( $terms,
                                                   ['sort' => 'start_on',
                                                    'direction' => 'ascend'] );
            foreach ( $queues as $queue ) {
                $component = $queue->component;
                $method = $queue->method;
                $component = $app->component( $component );
                if ( is_object( $component ) && method_exists( $component, $method ) ) {
                    $error = '';
                    $res = $component->$method( $app, $queue, $error );
                    if ( $queue->interval ) usleep( $queue->interval );
                    if ( $res ) {
                        $queue_counter++;
                        $queue->remove();
                    } else {
                        $error_counter++;
                        $errors = (int) $queue->errors;
                        $max_retries = $queue->max_retries ? $queue->max_retries : $queue_max_retries;
                        $errors++;
                        if ( $error ) {
                            $error = $app->translate( "An error occurred in class %s's method %s(%s).",
                              [ $queue->component, $method, $error ] );
                        } else {
                            $error = $app->translate( "An error occurred in class %s's method %s.",
                              [ $queue->component, $method ] );
                        }
                        if ( $errors < $max_retries ) {
                            $queue->errors( $errors );
                            $queue->save();
                        } else {
                            $queue->remove();
                            $error .= $app->translate( 'The queue has been canceled because the max retry number has been exceeded.' );
                        }
                        $this->log( $error, 'error' );
                    }
                }
            }
            unset( $queues );
            if ( $res_counter || $queue_counter || $error_counter ) {
                $all_conter+= $res_counter;
                $this->executed[] = 'job_queue';
                $worker_labels[] = $worker_label;
                $worker_messages[ $worker_label ] =
                    $error_counter ? $app->translate( 'It ran %s jobs and processed %s queues(%s errors).',
                      [ $res_counter, $queue_counter, $error_counter ] )
                    : $app->translate( 'It ran %s jobs and processed %s queues.',
                      [ $res_counter, $queue_counter ] );
                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
            }
            if ( $app->worker_debug )
                $this->finish_task( $worker_label, $res_counter, $log, $app );
        }
        $res_counter = 0;
        if ( in_array( 'upgrade_schemes', $argv ) || $app->auto_upgrade_schemes ) {
            $continue = $this->continue_task( 'upgrade_schemes', $argv );
            if ( $continue ) {
                $upgrader = new PTUpgrader;
                $res_counter = $upgrader->upgrade_scheme_check( $app );
                if ( $res_counter ) {
                    if ( $php_binary && $app->backup_dir && $app->mysqldump_path && $app->auto_upgrade_backup ) {
                        $this->backup_sql( $app, [] );
                    }
                    $worker_label = $app->translate( 'Upgrade Schemes' );
                    if ( $app->worker_debug )
                        $log = $this->start_task( $worker_label, $app );
                    $worker_labels[] = $worker_label;
                    if ( $verbose ) echo "{$worker_label}...\n";
                    $upgrade_models = [];
                    $schemes = $upgrader->manage_scheme( $app, true );
                    foreach ( $schemes as $scheme ) {
                        if ( $scheme['scheme_version'] !=  $scheme['db_version'] ) {
                            $upgrade_models[ $scheme['model'] ] = true;
                        }
                    }
                    $upgrade_models = array_keys( $upgrade_models );
                    $upgrader_argv = ['--models', implode( ',', $upgrade_models ) ];
                    $upgrader->upgrade_from_cli( $app, $upgrader_argv );
                    if ( $res_counter == 1 ) {
                        $worker_messages[ $worker_label ] =
                            $app->translate( 'Upgrade 1 scheme.' );
                    } else {
                        $worker_messages[ $worker_label ] =
                            $app->translate( 'Upgrade %s schemes.', $res_counter );
                    }
                    $all_conter+= $res_counter;
                    if ( $app->worker_debug )
                        $this->finish_task( $worker_label, $res_counter, $log, $app );
                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                }
            }
        }
        $res_counter = 0;
        if ( in_array( 'upgrade_plugins', $argv ) || $app->auto_upgrade_plugins ) {
            $continue = $this->continue_task( 'upgrade_plugins', $argv );
            if ( $continue ) {
                $plugin_class = new PTPlugin;
                $res_counter = $plugin_class->upgrade_plugin_check( $app );
                if ( $res_counter ) {
                    $worker_label = $app->translate( 'Upgrade Plugins' );
                    if ( $app->worker_debug )
                        $log = $this->start_task( $worker_label, $app );
                    $worker_labels[] = $worker_label;
                    if ( $verbose ) echo "{$worker_label}...\n";
                    $components = $plugin_class->upgrade_plugin_check( $app, true );
                    foreach ( $components as $plugin => $version ) {
                        $obj = $db->model( 'option' )->get_by_key( ['kind' => 'plugin', 'key' => strtolower( $plugin ) ] );
                        $component = $app->component( $plugin );
                        if ( $obj->id && is_object( $component ) ) {
                            $locale = $component->path() . DS . 'locale';
                            if ( is_dir( $locale ) ) {
                                PTUtil::locale_from_csv( $locale, strtolower( $component->id ) );
                            }
                            $errors = [];
                            if ( property_exists( $component, 'upgrade_functions' ) ) {
                                $upgrade_functions = $component->upgrade_functions;
                                foreach ( $upgrade_functions as $upgrade_function ) {
                                    $version_limit = isset( $upgrade_function['version_limit'] )
                                                   ? $upgrade_function['version_limit'] : 0;
                                    $comp = 0;
                                    if ( $version_limit != $obj->value ) {
                                        $comp = version_compare( $version_limit, $obj->value );
                                    }
                                    if ( $comp === 1 ) {
                                        $meth = $upgrade_function['method'];
                                        if ( method_exists( $component, $meth ) ) {
                                            $component->$meth( $app, $this, $obj->value, $errors );
                                        }
                                    }
                                }
                            }
                            if ( method_exists( $component, 'activate' ) ) {
                                $component->activate( $app, $plugin_class, $obj->value, $errors );
                            }
                            $component_name = get_class( $component );
                            $message = $app->translate(
                              "The plugin '%s' upgraded from version %s to version %s.", [ $component_name, $obj->value, $version ] );
                            $app->log( ['message'  => $message, 'category' => 'plugin'] );
                            $obj->value( $version );
                            $obj->save();
                        }
                    }
                    if ( $res_counter == 1 ) {
                        $worker_messages[ $worker_label ] =
                            $app->translate( 'Upgrade 1 plugin.' );
                    } else {
                        $worker_messages[ $worker_label ] =
                            $app->translate( 'Upgrade %s plugins.', $res_counter );
                    }
                    $all_conter+= $res_counter;
                    if ( $app->worker_debug )
                        $this->finish_task( $worker_label, $res_counter, $log, $app );
                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                }
            }
        }
        $res_counter = 0;
        $continue = $this->continue_task( 'recompile_views', $argv );
        $recompile_views = $app->recompile_views;
        if ( $continue && $recompile_views ) {
            if ( $db->model( 'template' )->has_column( 'last_compiled' ) ) {
                $ts_from = time() - $recompile_views;
                $templates =
                    $db->model( 'template' )->load( ['rev_type' => 0, 'last_compiled' => ['<' => $ts_from ] ],
                                                          [], 'id,text,compiled,cache_key,modified_on' );
            } else {
                $ts_from = date( 'Y-m-d H:i:s', $app->request_time - $recompile_views );
                $templates =
                    $db->model( 'template' )->load( ['rev_type' => 0, 'modified_on' => ['<' => $ts_from ] ],
                                                          [], 'id,text,compiled,cache_key,modified_on' );
            }
            if (! empty( $templates ) ) {
                $current_ts = date( 'YmdHis' );
                $worker_label = $app->translate( 'Re-Compile views' );
                if ( $app->worker_debug )
                   $log = $this->start_task( $worker_label, $app );
                $this->executed[] = 'recompile_views';
                foreach ( $templates as $template ) {
                    if (! $template->has_column( 'last_compiled' ) ) {
                        $template->modified_on( $current_ts );
                    }
                    $template->save();
                    $res_counter++;
                }
                unset( $templates );
                $worker_messages[ $worker_label ] =
                    $app->translate( 'Re-Compile %s views.', $res_counter );
                $all_conter+= $res_counter;
                if ( $app->worker_debug )
                    $this->finish_task( $worker_label, $res_counter, $log, $app );
                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
            }
        }
        $res_counter = 0;
        $continue = $this->continue_task( 'clean_up_rebuild_logs', $argv );
        if ( $continue ) {
            $worker_label = $app->translate( 'Clean up rebuild logs' );
            if ( $verbose ) echo "{$worker_label}...\n";
            $ts_from = date( 'Y-m-d H:i:s', $app->request_time - $app->async_max_proc_time - 3600 );
            $rebuild_logs = $db->model( 'log' )->load(
              ['category' => 'async_end', 'modified_on' => ['<' => $ts_from ] ], 'id' );
            if (! empty( $rebuild_logs ) ) {
                if ( $app->worker_debug )
                    $log = $this->start_task( $worker_label, $app );
                $this->executed[] = 'clean_up_rebuild_logs';
                $res_counter = count( $rebuild_logs );
                $db->model( 'log' )->remove_multi( $rebuild_logs );
                unset( $rebuild_logs );
                $worker_labels[] = $worker_label;
                $worker_messages[ $worker_label ] =
                    $app->translate( 'Delete %s rebuild logs.', $res_counter );
                $all_conter+= $res_counter;
                if ( $app->worker_debug )
                    $this->finish_task( $worker_label, $res_counter, $log, $app );
                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
            }
        }
        $request_time = $app->request_time;
        $res_counter = 0;
        $continue = $this->continue_task( 'clean_up_temp_dir', $argv );
        if ( $continue ) {
            $worker_label = $app->translate( 'Clean up temporary files' );
            if ( $app->worker_debug )
                $log = $this->start_task( $worker_label, $app );
            if ( $verbose ) echo "{$worker_label}...\n";
            $expires = $app->sess_timeout;
            $temp = rtrim( $app->temp_dir, DS );
            $temp_dirs = scandir( $temp );
            foreach ( $temp_dirs as $temp_dir ) {
                if ( strpos( $temp_dir, '.' ) === 0 ) continue;
                if ( strpos( $temp_dir, 'pt_' ) !== 0 ) continue;
                $len = strlen( $temp_dir );
                $temp_dir = $temp . DS . $temp_dir;
                if ( is_dir( $temp_dir ) ) {
                    $past = filemtime( $temp_dir );
                    $past = $request_time - $past;
                    if ( $past > $expires ) {
                        if ( PTUtil::remove_dir( $temp_dir ) ) {
                            $res_counter++;
                        }
                    }
                }
            }
            unset( $temp_dirs );
            if ( $res_counter ) {
                $all_conter+= $res_counter;
                $this->executed[] = 'clean_up_temp_dir';
                $worker_labels[] = $worker_label;
                $worker_messages[ $worker_label ] =
                    $app->translate( 'Delete %s temporary files or directories.', $res_counter );
                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
            }
            if ( $app->worker_debug )
                $this->finish_task( $worker_label, $res_counter, $log, $app );
        }
        $res_counter = 0;
        $continue = $this->continue_task( 'clean_up_duplicate_urls', $argv );
        if ( $continue ) {
            $worker_label = $app->translate( 'Clean up duplicate URLs' );
            if ( $verbose ) echo "{$worker_label}...\n";
            $terms  = ['delete_flag' => [0, 1] ];
            $params = ['group' => ['url'], 'having' => ['url' => ['>' => 1] ], 'direction' => 'descend' ];
            $extra  = ' HAVING COUNT(urlinfo_url) > 1';
            $params['count'] = 'url';
            $groups = $db->model( 'urlinfo' )->count_group_by( $terms, $params );
            if (! empty( $groups ) ) {
                if ( $app->worker_debug )
                    $log = $this->start_task( $worker_label, $app );
                foreach ( $groups as $group ) {
                    if ( isset( $group['urlinfo_url'] ) && isset( $group['COUNT(urlinfo_url)'] ) ) {
                        $url = $group['urlinfo_url'];
                        $count = $group['COUNT(urlinfo_url)'];
                    } else {
                        list( $url, $count ) = $group;
                    }
                    if (! $url ) continue;
                    $terms['url'] = $url;
                    $db->begin_work();
                    $app->txn_active = true;
                    $duplicates = $db->model( 'urlinfo' )->load(
                        $terms, ['sort' => ['delete_flag', 'class'], 'direction' => 'ascend'],
                                 'id,object_id,model,delete_flag' );
                    if ( count( $duplicates ) < 2 ) {
                        $db->rollback();
                        $app->txn_active = false;
                        continue;
                    }
                    $deleted = [];
                    foreach ( $duplicates as $idx => $duplicate ) {
                        if (! $app->clean_up_published_url && !$duplicate->delete_flag ) {
                            unset( $duplicates[ $idx ] );
                            continue;
                        }
                        if ( $duplicate->model && $duplicate->object_id ) {
                            $cnt = $db->model( $duplicate->model )->count( (int) $duplicate->object_id );
                            if (! $cnt ) {
                                $deleted[] = $duplicate;
                                unset( $duplicates[ $idx ] );
                            }
                        }
                    }
                    if (!empty( $deleted ) ) {
                        $duplicates = array_merge( $duplicates, $deleted );
                    }
                    $current = array_shift( $duplicates );
                    $res_counter += count( $duplicates );
                    if ( $db->model( 'urlinfo' )->remove_multi( $duplicates ) ) {
                        $db->commit();
                    } else {
                        $db->rollback();
                    }
                    $app->txn_active = false;
                }
                unset( $groups );
                if ( $res_counter ) {
                    $all_conter+= $res_counter;
                    $this->executed[] = 'clean_up_duplicate_urls';
                    $worker_labels[] = $worker_label;
                    $worker_messages[ $worker_label ] =
                        $app->translate( 'Delete %s URLs.', $res_counter );
                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                }
                if ( $app->worker_debug )
                    $this->finish_task( $worker_label, $res_counter, $log, $app );
            }
        }
        $res_counter = 0;
        $continue = $this->continue_task( 'repair_urls', $argv );
        if ( $continue ) {
            $worker_label = $app->translate( 'Repair URLs' );
            if ( $app->worker_debug )
                $log = $this->start_task( $worker_label, $app );
            if ( $verbose ) echo "{$worker_label}...\n";
            $urls = $db->model( 'urlinfo' )->load( ['relative_path' => ['like' => '%//%'] ] );
            foreach ( $urls as $url ) {
                $relative_path = $url->relative_path;
                $relative_path = preg_replace( '!/{1,}!', '/', $relative_path );
                $relative_url = $url->relative_url;
                $relative_url = preg_replace( '!/{1,}!', '/', $relative_url );
                $base_url = $url->workspace ? $url->workspace->site_url : $app->site_url;
                $base_path = $url->workspace ? $url->workspace->site_path : $app->site_path;
                $base_url = rtrim( $base_url, '/\\' );
                $base_path = rtrim( $base_path, '/\\' );
                $file_path = preg_replace( '!^%r!', $base_path, $relative_path );
                $url_url = preg_replace( '!^%r!', $base_url, $relative_path );
                $url->url( $url_url );
                $url->dirname( dirname( $url_url ) );
                $url->relative_path( $relative_path );
                $url->file_path( $file_path );
                $url->relative_url( $relative_url );
                $url->save();
                $res_counter++;
            }
            $urls = $db->model( 'urlinfo' )->load( ['dirname' => 'https:/'] );
            foreach ( $urls as $url ) {
                $url->save();
                $res_counter++;
            }
            $urls = $db->model( 'urlinfo' )->load( ['dirname' => 'http:/'] );
            foreach ( $urls as $url ) {
                $url->save();
                $res_counter++;
            }
            unset( $urls );
            if ( $res_counter ) {
                $all_conter+= $res_counter;
                $this->executed[] = 'repair_urls';
                $worker_labels[] = $worker_label;
                $worker_messages[ $worker_label ] =
                    $app->translate( 'Repair %s URLs.', $res_counter );
                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
            }
            if ( $app->worker_debug )
                $this->finish_task( $worker_label, $res_counter, $log, $app );
        }
        $res_counter = 0;
        $continue = $this->continue_task( 'user_ip_unlock', $argv );
        if ( $continue && is_array( $app->ip_unlock ) && !empty( $app->ip_unlock ) &&
            isset( $app->ip_unlock['user'] ) && $app->ip_unlock['user'] ) {
            $past = $app->ip_unlock['user'];
            $worker_label = $app->translate( "Unlock User's IP Addresses" );
            if ( $app->worker_debug )
                $log = $this->start_task( $worker_label, $app );
            if ( $verbose ) echo "{$worker_label}...\n";
            $ts = PTUtil::current_ts( $request_time - $past );
            $terms = ['class' => 'banned', 'created_on' => ['<' => $ts ], 'model' => 'user'];
            $remote_ips = $db->model( 'remote_ip' )->load( $terms );
            foreach ( $remote_ips as $remote_ip ) {
                $remote_ip->class( 'info' );
                $app->set_default( $remote_ip );
                $message = $app->translate( "The User's lockout IP address %s has been released.", $remote_ip->ip_address );
                $remote_ip->save();
                $app->log( ['message' => $message, 'category' => 'worker',
                            'model' => 'remote_ip', 'object_id' => $remote_ip->id,
                            'workspace_id' => 0, 'level' => 'info'] );
                $res_counter++;
            }
            unset( $remote_ips );
            if ( $res_counter ) {
                $all_conter+= $res_counter;
                $this->executed[] = 'user_ip_unlock';
                $worker_labels[] = $worker_label;
                $worker_messages[ $worker_label ] =
                    $app->translate( "Unlock %s User's IP Addresses.", $res_counter );
                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
            }
            if ( $app->worker_debug )
                $this->finish_task( $worker_label, $res_counter, $log, $app );
        }
        $old_version = $app->get_config( 'worker_version' );
        $old_version = is_object( $old_version ) ? $old_version->value : "2.0";
        $res_counter = 0;
        // Plugin's tasks
        $tasks = isset( $app->registry['tasks'] ) ? $app->registry['tasks'] : [];
        $tasks = array_merge( $tasks, $this->core_tasks() );
        $event_tasks = [];
        foreach ( $tasks as $key => $regi ) {
            $priority = isset( $regi['priority'] ) ? (int) $regi['priority'] : 5;
            $event_tasks[ $priority ] = isset( $event_tasks[ $priority ] )
                                      ? $event_tasks[ $priority ] : [];
            $regi['id'] = $key;
            unset( $regi['priority'] );
            $event_tasks[ $priority ][] = $regi;
        }
        if (! empty( $event_tasks ) ) {
            ksort( $event_tasks );
            foreach ( $event_tasks as $tasks ) {
                foreach ( $tasks as $task ) {
                    $continue = $this->continue_task( $task['id'], $argv );
                    if (!$continue ) {
                        continue;
                    }
                    $component = $app->component( $task['component'] );
                    $meth = $task['method'];
                    if ( method_exists( $component, $meth ) ) {
                        $frequency = isset( $task['frequency'] ) ? $task['frequency'] : 900;
                        if ( $app->develop && $frequency ) {
                            $frequency = 0;
                        }
                        $task_id = $task['id'];
                        if ( PTUtil::property_exists( $app, "{$task_id}_frequency" ) ) {
                            $prop_name = "{$task_id}_frequency";
                            $frequency = $app->$prop_name;
                        }
                        $session = $db->model( 'session' )->get_by_key(
                                                ['kind' => 'TK', 'name' => md5( $task_id ) ] );
                        if ( $session->id ) {
                            $start = $session->start;
                            $time_limit = $start + $frequency;
                            if ( $time_limit > time() ) {
                                continue;
                            }
                        }
                        $label = $component->translate( $task['label'] );
                        if ( $app->worker_debug )
                            $log = $this->start_task( $label, $app );
                        try {
                            $start = time();
                            if ( $verbose ) echo "{$label}...\n";
                            $res = $component->$meth( $app );
                            if ( $res ) {
                                $worker_labels[] = $label;
                            }
                            if ( is_string( $res ) ) {
                                $worker_messages[ $label ] = $res;
                            }
                            $this->executed[] = $task['id'];
                            $session->start( $start );
                            $session->expires( $start + $frequency + 3600 );
                            $session->save();
                            unset( $session );
                            if (! $res ) {
                                $res_counter = 0;
                            } else {
                                $res_counter = is_numeric( $res ) ? $res : 1;
                            }
                            $all_conter+= $res_counter;
                            if ( $app->worker_debug )
                                $this->finish_task( $label, $res_counter, $log, $app );
                        } catch ( Exception $e ) {
                            $error = $e->getMessage();
                            $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                                      [ $label, $error ] );
                            if ( $verbose ) echo $error, PHP_EOL;
                            $this->log( $error, 'error', $app );
                            if ( $app->worker_debug && isset( $log ) && is_object( $log ) ) $log->remove();
                        }
                    }
                }
            }
        }
        $task_id = 'cleanup_preview_thumbnail';
        $continue = $this->continue_task( $task_id, $argv );
        if ( $continue ) {
            $res_counter = 0;
            $worker_label = $app->translate( 'Clean up preview thumbnail' );
            if ( $app->worker_debug )
                $log = $this->start_task( $worker_label, $app );
            if ( $verbose ) echo "{$worker_label}...\n";
            $previews = $db->model( 'session' )->load(
                ['kind'  => 'TT', 'value' => 'temp_thumbnail', 'expires' => ['<' => $app->request_time ] ] );
            foreach ( $previews as $preview ) {
                if (!$preview->key || !$preview->object_id ) {
                    continue;
                }
                if ( $app->db->model( $preview->key )->has_column( 'status' ) ) {
                    $status_published = $app->status_published( $preview->key );
                    $obj = $app->db->model( $preview->key )->load( $preview->object_id, null, 'id,status' );
                    if ( $obj && $obj->status != $status_published ) {
                        if ( $preview->text && $fmgr->exists( $preview->text ) ) {
                            $fmgr->unlink( $preview->text );
                            $res_counter++;
                        }
                    }
                }
                $preview->remove();
            }
            if ( $res_counter ) {
                $all_conter+= $res_counter;
                $this->executed[] = 'cleanup_preview_thumbnail';
                $worker_labels[] = $worker_label;
                $worker_messages[ $worker_label ] =
                    $app->translate( 'Delete %s preview thumbnail file(s).', $res_counter );
                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
            }
            if ( $app->worker_debug )
                $this->finish_task( $worker_label, $res_counter, $log, $app );
        }
        list ( $start, $end ) = $app->maintenance_time;
        $current_ts = date( 'YmdHis' );
        $YmdHis = $current_ts;
        $Ymd = substr( $YmdHis, 0, 8 );
        $start = $Ymd . $start;
        $end = $Ymd . $end;
        if ( $start < $YmdHis && $end > $YmdHis ) {
            // maintenance_time
            $frequency = 36000;
            $session = $db->model( 'session' )->get_by_key(
                                    ['kind' => 'TK', 'name' => 'maintenance_time_tasks'] );
            $continue_maintenance_time = true;
            if ( $session->id ) {
                $start = $session->start;
                $time_limit = $start + $frequency;
                if ( $time_limit > time() ) {
                    $continue_maintenance_time = false;
                }
            }
            $start = time();
            $session->start( $start );
            $session->expires( $start + $frequency + 3600 );
            $session->save();
            if ( $continue_maintenance_time ) {
                $res_counter = 0;
                $continue = $this->continue_task( 're_publish_urls', $argv, true );
                if ( $continue ) {
                    $worker_label = $app->translate( 'Re-Publish URLs' );
                    if ( $verbose ) echo "{$worker_label}...\n";
                    if ( $app->worker_debug )
                        $log = $this->start_task( $worker_label, $app );
                    $urls = $db->model( 'urlinfo' )->load_iter( ['publish_file' => 1], null, 'id,file_path' );
                    $re_publishes = [];
                    while ( $result = $urls->fetch( PDO::FETCH_ASSOC ) ) {
                        $path = $result['urlinfo_file_path'];
                        if (! $fmgr->exists( $path ) ) {
                            $re_publishes[ $path ] = $result;
                        }
                    }
                    $re_publishes_objs = [];
                    foreach ( $re_publishes as $path => $re_publish ) {
                        if (! $fmgr->exists( $path ) ) {
                            $urlinfo_id = (int) $re_publish['urlinfo_id'];
                            $url = $db->model( 'urlinfo' )->load( $urlinfo_id );
                            if ( $url->model && $url->object_id ) {
                                if ( isset( $re_publishes_objs[ $url->model . '_' .  $url->object_id ] ) ) {
                                    continue;
                                }
                                $url_obj = $app->db->model( $url->model )->load( $url->object_id );
                                if ( is_object( $url_obj ) ) {
                                    if ( $map = $url->urlmapping ) {
                                        $table = strpos( $map->mapping, '<' ) !== false ? $app->get_table( $url->model ) : null;
                                        $comp_path = $app->build_path_with_map( $url_obj, $map, $table, $url->archive_date );
                                        if ( $path === $comp_path ) {
                                            // TODO::skip_empty
                                            if ( $url_obj->has_column( 'status' ) ) {
                                                $status_published = $app->status_published( $url_obj->_model );
                                                if ( $status_published != $url_obj->status && !$url->delete_flag ) {
                                                    // $url->delete(); // Why you have not delete_flag?
                                                    continue;
                                                }
                                            }
                                            if ( $url_obj->has_column( 'workspace_id' ) ) {
                                                if ( $url_obj->workspace_id != $url->workspace_id ) {
                                                    // $url->delete();
                                                    continue;
                                                }
                                            }
                                            $re_publishes_objs[ $url->model . '_' .  $url->object_id ] = true;
                                            $app->ctx->stash( 'workspace', $url->workspace );
                                            $publisher->publish( $url );
                                            $res_counter++;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    unset( $re_publishes );
                    if ( $res_counter ) {
                        $all_conter+= $res_counter;
                        $this->executed[] = 're_publish_urls';
                        $worker_labels[] = $worker_label;
                        $worker_messages[ $worker_label ] =
                            $app->translate( 'Re-Publish %s URLs.', $res_counter );
                        if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                    }
                    if ( $app->worker_debug )
                        $this->finish_task( $worker_label, $res_counter, $log, $app );
                }
                $res_counter = 0;
                $continue = $this->continue_task( 'rebuild_optimizer', $argv, true );
                $performance_log = $app->log_dir . DS . 'performance.log';
                $rebuild_request_time = $app->rebuild_request_time ? (int) $app->rebuild_request_time : 40;
                if ( $app->rebuild_optimizer && $continue && file_exists( $performance_log ) && $rebuild_request_time ) {
                    $worker_label = $app->translate( 'Optimize Publisher' );
                    if ( $app->worker_debug )
                        $log = $this->start_task( $worker_label, $app );
                    if ( $verbose ) echo "{$worker_label}...\n";
                    $res_counter = $this->rebuildOptimizer( $app );
                    if ( $res_counter ) {
                        $all_conter+= $res_counter;
                        $this->executed[] = 'rebuild_optimizer';
                        $worker_labels[] = $worker_label;
                        $worker_messages[ $worker_label ] =
                            $app->translate( 'Set %s rebuild settings.', $res_counter );
                        if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                    }
                    if ( $app->worker_debug )
                        $this->finish_task( $worker_label, $res_counter, $log, $app );
                }
                $logrotate = $app->logrotate;
                if ( $logrotate && is_numeric( $logrotate ) ) {
                    $compress = substr( PHP_OS, 0, 3 ) == 'WIN' ? 'zip' : 'gz';
                    $logrotate = ['error.log' => ['monthly', $logrotate, $compress ] ];
                }
                if ( is_array( $logrotate ) && ! empty( $logrotate ) ) {
                    // Log Rotation
                    $res_counter = 0;
                    $continue = $this->continue_task( 'logrotate', $argv, true );
                    if ( $continue ) {
                        $worker_label = $app->translate( 'Log Rotation' );
                        if ( $app->worker_debug )
                            $log = $this->start_task( $worker_label, $app );
                        $backup_dir = $app->backup_dir ? $app->backup_dir : $app->log_dir;
                        $backup_dir = rtrim( $backup_dir, '/' );
                        $backup_dir = rtrim( $backup_dir, '\\' );
                        $backup_dir .= DS;
                        foreach ( $logrotate as $logfile => $settings ) {
                            $frequency = 'monthly';
                            $rotate    = 10;
                            $compress = substr( PHP_OS, 0, 3 ) == 'WIN' ? 'zip' : 'gz';
                            if ( is_numeric( $logfile ) ) {
                                $logfile = $settings;
                            } else if ( is_array( $settings ) ) {
                                $idx = null;
                                if ( in_array( 'daily', $settings ) ) {
                                    $frequency = 'daily';
                                    $idx = array_search( 'daily', $settings );
                                } else if ( in_array( 'weekly', $settings ) ) {
                                    $frequency = 'weekly';
                                    $idx = array_search( 'weekly', $settings );
                                } else if ( in_array( 'monthly', $settings ) ) {
                                    $frequency = 'monthly';
                                    $idx = array_search( 'monthly', $settings );
                                }
                                if ( $idx !== null ) {
                                    unset( $settings[ $idx ] );
                                    $idx = null;
                                }
                                if ( in_array( 'gz', $settings ) ) {
                                    $compress = 'gz';
                                    $idx = array_search( 'gz', $settings );
                                } else if ( in_array( 'zip', $settings ) ) {
                                    $compress = 'zip';
                                    $idx = array_search( 'zip', $settings );
                                }
                                if ( $idx !== null ) {
                                    unset( $settings[ $idx ] );
                                }
                                if (! empty( $settings ) ) {
                                    $rotate = array_shift( $settings );
                                    if ( $rotate != -1  ) {
                                        $rotate = $rotate ? $rotate : 10;
                                    }
                                }
                            }
                            $continue = $frequency == 'daily';
                            if ( $frequency == 'weekly' && date('w') == 0 ) {
                                $continue = true;
                            } else if ( $frequency == 'monthly' && date('j') == 1 ) {
                                $continue = true;
                            }
                            $extension = PTUtil::get_extension( $logfile );
                            $postfix = preg_quote( $extension, '/' );
                            $basename = preg_replace( "/\.{$postfix}$/i", '', $logfile );
                            $logfile = $app->log_dir . DS . $logfile;
                            if (! $fmgr->exists( $logfile ) || !filesize( $logfile ) ) {
                                $continue = false;
                            }
                            if ( $continue ) {
                                $backup_name = $backup_dir . $basename . '-' . date( 'Ymd' ) . '.' . $extension;
                                $existing = $compress ? "{$backup_name}.{$compress}" : $backup_name;
                                if (! $fmgr->exists( $existing ) ) {
                                    if ( $fmgr->copy( $logfile, $backup_name ) ) {
                                        $res_counter++;
                                        $fmgr->unlink( $logfile );
                                        if ( $compress == 'gz' ) {
                                            $archive_basename = basename( $backup_name );
                                            $backup_name = escapeshellarg( $backup_name );
                                            $gzip_path = $app->gzip_path;
                                            if ( $gzip_path ) {
                                                $cmd = "{$gzip_path} {$backup_name}";
                                                exec( $cmd, $output, $return_var );
                                                if ( $return_var !== 0 ) {
                                                    $this->log( $app->translate( 'An error occurred while executing gzip(%s).', $archive_basename, 'error' ) );
                                                }
                                            } else {
                                                $this->log( $app->translate( "The system environment value '%s' is not specified.", 'gzip_path' ) );
                                            }
                                        } else if ( $compress == 'zip' ) {
                                            $archive_basename = basename( $backup_name );
                                            $zip = new ZipArchive();
                                            $res = $zip->open( "{$backup_name}.zip", ZipArchive::CREATE );
                                            $zip->addFile( $backup_name, basename( $backup_name ) );
                                            $zip->close();
                                            if ( file_exists( "{$backup_name}.zip" ) ) {
                                                @unlink( $backup_name );
                                            } else {
                                                $this->log( $app->translate( "Could not create ZIP archive '%s'.", $archive_basename, 'error' ) );
                                            }
                                        }
                                    }
                                }
                                if ( $rotate != -1 ) {
                                    $extension = $compress ? "{$extension}.{$compress}" : $extension;
                                    $backup_files = [];
                                    foreach ( glob("{$backup_dir}{$basename}-*.{$extension}") as $filename ) {
                                        if ( preg_match( '/[0-9]{8}/', basename( $filename ), $matchs ) ) {
                                            $backup_files[ (int)$matchs[0] ] = $filename;
                                        }
                                    }
                                    ksort( $backup_files, SORT_NUMERIC );
                                    if ( $rotate < count( $backup_files ) ) {
                                        $over = count( $backup_files ) - $rotate;
                                        $backup_files = array_slice( $backup_files, 0, $over );
                                        foreach ( $backup_files as $backup_file ) {
                                            $fmgr->unlink( $backup_file );
                                        }
                                    }
                                }
                            }
                        }
                        if ( $res_counter ) {
                            $all_conter+= $res_counter;
                            $this->executed[] = 'logrotate';
                            $worker_messages[ $worker_label ] =
                                $app->translate( 'Rotate %s log file(s).', $res_counter );
                            if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                        }
                        if ( $app->worker_debug )
                            $this->finish_task( $worker_label, $res_counter, $log, $app );
                    }
                }
                // Reset URL
                $res_counter = 0;
                if ( $app->reset_urlinfo ) {
                    $continue = $this->continue_task( 'reset_urlinfo', $argv, true );
                    if ( $continue ) {
                        $worker_label = $app->translate( 'Reset URL' );
                        if ( $app->worker_debug )
                            $log = $this->start_task( $worker_label, $app );
                        try {
                            $urls = $db->model( 'urlinfo' )->load( ['delete_flag' => [0, 1] ], null, '*' );
                            if ( $verbose && count( $urls ) ) echo "{$worker_label}...\n";
                            $site_url = $app->get_config( 'site_url' )->value;
                            $site_path = $app->get_config( 'site_path' )->value;
                            $workspaces = [];
                            $updateUrls = [];
                            foreach ( $urls as $obj ) {
                                if ( $obj->class == 'archive' && ! $obj->publish_file ) {
                                    $urlmapping = $db->model( 'urlmapping' )->load( $obj->urlmapping_id );
                                    if ( $urlmapping ) {
                                        $obj->publish_file( $urlmapping->publish_file );
                                        $updateUrls[ $obj->id ] = $obj;
                                    }
                                }
                                $workspace = null;
                                if ( $workspace_id = $obj->workspace_id ) {
                                    $workspace = isset( $workspaces[ $obj->workspace_id ] )
                                               ? $workspaces[ $obj->workspace_id ] :
                                               $db->model( 'workspace' )->load( (int) $obj->workspace_id );
                                    if (! $workspace ) {
                                        $workspace = $db->model( 'workspace' )->load( ['id' => $obj->workspace_id ] );
                                        if ( is_array( $workspace ) && !empty( $workspace ) ) {
                                            $workspace = $workspace[0];
                                        } else {
                                            continue;
                                        }
                                    }
                                    $workspaces[ $obj->workspace_id ] = $workspace;
                                }
                                $url = $workspace ? $workspace->site_url : $site_url;
                                if ( mb_substr( $url, -1 ) == '/' ) {
                                    $url = rtrim( $url, '/' );
                                }
                                $path = $workspace ? $workspace->site_path : $site_path;
                                if ( mb_substr( $path, -1 ) == '/' ) {
                                    $url = rtrim( $path, '/' );
                                }
                                $relative_path = $obj->relative_path;
                                $newURL = preg_replace( '/^%r/', $url, $relative_path );
                                if ( strpos( $newURL, ' ' ) ) {
                                    $newURL = str_replace( ' ', '%20', $newURL );
                                }
                                $newPath = preg_replace( '/^%r/', $path, $relative_path );
                                if ( strpos( $newPath, '..' ) !== false && $app->path_verify ) {
                                    $newPath = PTUtil::rel2abs( $newPath );
                                    $newURL = PTUtil::rel2abs( $newURL );
                                    $valid = $app->path_verify == 2 ? strpos( $newPath, $path ) === 0
                                           : $app->document_root && strpos( $newPath, $app->document_root ) === 0;
                                    if ( $valid === false ) {
                                        $error = $app->path_verify == 2 ? 'You cannot write to directories above the site path.'
                                               : 'You cannot write to directories above the document root.';
                                        trigger_error( $error );
                                        continue;
                                    }
                                }
                                $file_path = $obj->file_path;
                                $old_path = $file_path;
                                $newDirname = ( dirname( $newURL ) . '/' );
                                $newRelativeURL = preg_replace( '!^https{0,1}:\/\/.*?\/!', '/', $newURL );
                                if ( $obj->url == $newURL && $obj->file_path == $newPath 
                                    && $obj->dirname == $newDirname && $obj->relative_url == $newRelativeURL ) {
                                    continue;
                                }
                                $obj->url( $newURL );
                                $obj->dirname( $newDirname );
                                $obj->relative_url( $newRelativeURL );
                                $obj->file_path( $newPath );
                                $res_counter++;
                                $updateUrls[ $obj->id ] = $obj;
                            }
                            if (! empty( $updateUrls ) ) {
                                $db->model( 'urlinfo' )->update_multi( $updateUrls );
                            }
                            unset( $urls, $updateUrls, $workspaces );
                            if ( $res_counter ) {
                                $all_conter+= $res_counter;
                                $this->executed[] = 'reset_urlinfo';
                                $worker_messages[ $worker_label ] =
                                    $app->translate( 'Reset %s URLs.', $res_counter );
                                if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                            }
                            if ( $app->worker_debug )
                                $this->finish_task( $worker_label, $res_counter, $log, $app );
                        } catch ( Exception $e ) {
                            $error = $e->getMessage();
                            $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                                      [ $worker_label, $error ] );
                            if ( $verbose ) echo $error, PHP_EOL;
                            $this->log( $error, 'error', $app );
                            if ( $app->worker_debug && isset( $log ) && is_object( $log ) ) $log->remove();
                        }
                    }
                }
                // Remove old sessions
                $continue = $this->continue_task( 'remove_old_sessions', $argv, true );
                $worker_label = $app->translate( 'Remove old sessions' );
                $res_counter = 0;
                $ts = $app->request_time;
                if ( $continue ) {
                    if ( $app->worker_debug )
                        $log = $this->start_task( $worker_label, $app );
                    if ( $verbose ) echo "{$worker_label}...\n";
                    $objects = [];
                    $sessions = $db->model( 'session' )->load( ['expires' => ['<' => $ts ] ], [], 'id,value,kind' );
                    $res_counter = count( $sessions );
                    try {
                        foreach ( $sessions as $obj ) {
                            $objects[] = $obj;
                            if ( $obj->kind == 'UP' && $obj->value && file_exists( $obj->value ) ) {
                                $fmgr->unlink( $obj->value );
                                $app->remove_dirs[] = dirname( $obj->value );
                            }
                            if ( count( $objects ) >= $bulk_remove_per ) {
                                $db->model( 'session' )->remove_multi( $objects );
                                $objects = [];
                            }
                        }
                        if (! empty( $objects ) ) {
                            $db->model( 'session' )->remove_multi( $objects );
                        }
                        if ( $res_counter ) {
                            $all_conter+= $res_counter;
                            $this->executed[] = 'remove_old_sessions';
                            $worker_labels[] = $worker_label;
                            $worker_messages[ $worker_label ] =
                                $app->translate( 'Removed %s %s.',
                                    [ $res_counter, $app->translate('Session(s)') ] );
                            if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                        }
                        if ( $app->worker_debug )
                            $this->finish_task( $worker_label, $res_counter, $log, $app );
                    } catch ( Exception $e ) {
                        $error = $e->getMessage();
                        $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                                  [ $worker_label, $error ] );
                        if ( $verbose ) echo $error, PHP_EOL;
                        $this->log( $error, 'error', $app );
                        if ( $app->worker_debug && isset( $log ) && is_object( $log ) ) $log->remove();
                    }
                }
                $continue = $this->continue_task( 'cache_compilation_error', $argv, true );
                // Remove cache compilation error
                $worker_label = '';
                $res_counter = 0;
                if ( $continue ) {
                    if ( $php_binary ) {
                        $cache_dirs = [ $app->compile_dir, $app->cache_dir, $app->db_cache_dir ];
                        $worker_label = $app->translate( 'Remove cache compilation error' );
                        if ( $verbose ) echo "{$worker_label}...\n";
                        if ( $app->worker_debug )
                            $log = $this->start_task( $worker_label, $app );
                        foreach ( $cache_dirs as $cache_dir ) {
                            if ( is_dir( $cache_dir ) ) {
                                $files = [];
                                PTUtil::file_find( $cache_dir, $files );
                                foreach ( $files as $file ) {
                                    if ( PTUtil::get_extension( $file ) == 'php' && file_exists( $file ) ) {
                                        $res = PTUtil::compile_check( file_get_contents( $file ) );
                                        if ( $res !== true ) {
                                            $fmgr->unlink( $file );
                                            $res_counter++;
                                        }
                                    }
                                }
                                unset( $files );
                            }
                        }
                        if ( $res_counter ) {
                            $all_conter+= $res_counter;
                            $this->executed[] = 'cache_compilation_error';
                            $worker_labels[] = $worker_label;
                            $worker_messages[ $worker_label ] = $app->translate( 'Remove %s cache compilation error(s).', $res_counter );
                            if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                        }
                        if ( $app->worker_debug )
                            $this->finish_task( $worker_label, $res_counter, $log, $app );
                    }
                }
                $res_counter = 0;
                $continue = $this->continue_task( 'set_uuid', $argv, true );
                // Set uuid
                if ( $continue ) {
                    $uuid_models = $db->model( 'table' )->load( ['has_uuid' => 1] );
                    $wrapper_label = $app->translate( 'Set UUID' );
                    $wrapper_counter = 0;
                    if ( $app->worker_debug )
                        $log = $this->start_task( $wrapper_label, $app );
                    foreach ( $uuid_models as $table ) {
                        $model = $table->name;
                        $revisable = $table->revisable;
                        $app->get_scheme_from_db( $model );
                        $terms = [];
                        $extra = " AND ({$model}_uuid IS NULL OR {$model}_uuid='') ";
                        $cols = 'id,uuid';
                        if ( $revisable ) {
                            $terms['rev_type'] = 0;
                            $cols .= ',rev_type,rev_object_id';
                        }
                        $objects = $db->model( $model )->load( $terms, [], $cols, $extra );
                        if ( $objects === false ) {
                            continue;
                        }
                        if ( count( $objects ) ) {
                            $worker_label = $app->translate(
                                'Set UUID(%s)', $app->translate( $table->plural ) );
                            if ( $verbose ) echo "{$worker_label}...\n";
                            $res_counter = 0;
                            try {
                                foreach ( $objects as $obj ) {
                                    if (! $obj->uuid ) {
                                        $uuid = $app->generate_uuid( $model );
                                        $obj->uuid( $uuid );
                                        $obj->save();
                                        $res_counter++;
                                        $wrapper_counter++;
                                        if ( $revisable ) {
                                            $rev_objs = $db->model( $model )->load( ['rev_object_id' => $obj->id ] );
                                            foreach ( $rev_objs as $rev ) {
                                                $rev->uuid( $uuid );
                                                $rev->save();
                                            }
                                        }
                                    }
                                }
                                unset( $objects );
                                if ( $res_counter ) {
                                    $all_conter+= $res_counter;
                                    $this->executed[] = 'set_uuid';
                                    $worker_labels[] = $worker_label;
                                    $obj_label = $res_counter == 1 ? $table->label : $table->plural;
                                    $worker_messages[ $worker_label ] = $app->translate( 'Set UUID of %s %s.',
                                        [ $res_counter, $obj_label ] );
                                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                                }
                            } catch ( Exception $e ) {
                                $error = $e->getMessage();
                                $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                                          [ $worker_label, $error ] );
                                if ( $verbose ) echo $error, PHP_EOL;
                                $this->log( $error, 'error', $app );
                            }
                        }
                    }
                    if ( $app->worker_debug )
                        $this->finish_task( $wrapper_label, $wrapper_counter, $log, $app );
                }
                $revisable_models = $db->model( 'table' )->load( ['revisable' => 1] );
                $continue = $this->continue_task( 'remove_old_revisions', $argv, true );
                // Remove old revisions
                $worker_label = '';
                $res_counter = 0;
                if ( $continue ) {
                    $wrapper_label = $app->translate( 'Remove old revisions' );
                    $wrapper_counter = 0;
                    if ( $app->worker_debug )
                        $log = $this->start_task( $wrapper_label, $app );
                    foreach ( $revisable_models as $table ) {
                        $max_revisions = $table->max_revisions || $table->max_revisions === '0'
                                       ? $table->max_revisions : $app->max_revisions;
                        $max_revisions = (int) $max_revisions;
                        if ( $max_revisions >= 0 ) {
                            $worker_label = $app->translate(
                                'Remove old revisions(%s)', $app->translate( $table->plural ) );
                            if ( $verbose ) echo "{$worker_label}...\n";
                            $res_counter = 0;
                            $model = $table->name;
                            try {
                                $sql = "SELECT {$model}_rev_object_id,COUNT({$model}_rev_object_id) ";
                                $sql.= "FROM mt_{$model} WHERE ( {$model}_rev_type = 1 ) ";
                                $sql.= "GROUP BY {$model}_rev_object_id HAVING COUNT({$model}_rev_object_id) > ";
                                $sql.= $max_revisions;
                                $groups = $db->model( $model )->load( $sql );
                                $count_key = "COUNT({$model}_rev_object_id)";
                                $id_key = "{$model}_rev_object_id"; 
                                foreach ( $groups as $group ) {
                                    $rev_object_id = (int) $group->$id_key;
                                    $obj_cnt = (int) $group->$count_key;
                                    $rev_limit = $obj_cnt - $max_revisions;
                                    $revisions = $db->model( $model )->load(
                                        ['rev_object_id' => $rev_object_id, 'rev_type' => 1],
                                        ['sort' => 'modified_on', 'direction' => 'ascend', 'limit' => $rev_limit ],
                                        'id'
                                    );
                                    foreach ( $revisions as $revision ) {
                                        $res_counter++;
                                        $wrapper_counter++;
                                        $app->remove_object( $revision, $table );
                                    }
                                }
                                unset( $groups );
                                if ( $res_counter ) {
                                    $all_conter+= $res_counter;
                                    $this->executed[] = 'remove_old_revisions';
                                    $worker_labels[] = $worker_label;
                                    $worker_messages[ $worker_label ] = $app->translate( 'Removed %s %s.',
                                        [ $res_counter, $app->translate('Revision(s)') ] );
                                    if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                                }
                            } catch ( Exception $e ) {
                                $error = $e->getMessage();
                                $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                                          [ $worker_label, $error ] );
                                if ( $verbose ) echo $error, PHP_EOL;
                                $this->log( $error, 'error', $app );
                            }
                        }
                    }
                    if ( $app->worker_debug )
                        $this->finish_task( $wrapper_label, $wrapper_counter, $log, $app );
                }
                $task_id = 'cleanup_thumbnails_c';
                $continue = $this->continue_task( $task_id, $argv, true );
                if ( $continue && $app->assets_c && is_dir( $app->assets_c ) ) {
                    $worker_label = $app->translate( 'Clean up thumbnail cache' );
                    if ( $app->worker_debug )
                        $log = $this->start_task( $worker_label, $app );
                    $res_counter = 0;
                    $thumbnails = [];
                    PTUtil::file_find( $app->assets_c, $thumbnails );
                    if ( $verbose && count( $thumbnails ) ) echo "{$worker_label}...\n";
                    foreach ( $thumbnails as $thumbnail ) {
                        $basename = basename( $thumbnail );
                        // thumb-asset-128xauto-square-12-file.png
                        preg_match( '/^thumb\-(.*)?\-128xauto\-square\-([0-9]*)\-([^\.]*)\..*$/', $basename, $matches );
                        list( $all, $model, $object_id, $key ) = $matches;
                        $meta = $app->db->model( 'meta' )->load(
                          ['object_id' => $object_id, 'model' => $model, 'key' => $key ], ['limit' => 1], 'id' );
                        if ( empty( $meta ) ) {
                            $fmgr->unlink( $thumbnail );
                            $res_counter++;
                        }
                        unset( $meta );
                    }
                    unset( $thumbnails );
                    if ( $res_counter ) {
                        $all_conter+= $res_counter;
                        $this->executed[] = 'cleanup-thumbnails_c';
                        $worker_labels[] = $worker_label;
                        $worker_messages[ $worker_label ] =
                            $app->translate( 'Delete %s thumbnail file(s).', $res_counter );
                        if ( $verbose ) echo $worker_messages[ $worker_label ], PHP_EOL;
                    }
                    if ( $app->worker_debug )
                        $this->finish_task( $worker_label, $res_counter, $log, $app );
                }
                $task_id = 'optimize_tables';
                $continue = $this->continue_task( $task_id, $argv, true );
                if ( $continue ) {
                    $frequency = 36000;
                    $session = $db->model( 'session' )->get_by_key(
                                            ['kind' => 'TK', 'name' => md5( $task_id ) ] );
                    $do_optimize = true;
                    if ( $session->id ) {
                        $start = $session->start;
                        $time_limit = $start + $frequency;
                        if ( $time_limit > time() ) {
                            $do_optimize = false;
                        }
                    }
                    $data_free = (int) $app->optimize_data_free;
                    if ( $data_free < 0 ) {
                        $do_optimize = false;
                    }
                    if ( $do_optimize ) {
                        $db_name = PADO_DB_NAME;
                        $sql = "SELECT table_name,data_free FROM information_schema.tables WHERE table_schema='{$db_name}' AND data_free > {$data_free} ORDER BY data_free DESC";
                        $pdo = $db->db;
                        $worker_label = $app->translate( 'Optimize Tables' );
                        if ( $app->worker_debug )
                            $log = $this->start_task( $worker_label, $app );
                        if ( $verbose ) echo "{$worker_label}...\n";
                        $res_counter = 0;
                        $table_cnt = (int) $app->optimize_table_cnt;
                        try {
                            $sth = $pdo->prepare( $sql );
                            $sth->execute();
                            $tables = $sth->fetchAll();
                            foreach ( $tables as $table ) {
                                $table_name = $table['table_name'] ?? '';
                                if (! $table_name ) {
                                    $table_name = $table['TABLE_NAME'] ?? '';
                                }
                                if (! $table_name ) {
                                    continue;
                                }
                                $sql = "OPTIMIZE TABLE $table_name";
                                $sth = $pdo->prepare( $sql );
                                $sth->execute();
                                $res_counter++;
                                if ( $table_cnt && ( $table_cnt >= $res_counter ) ) {
                                    break;
                                }
                            }
                            $sth = null;
                            $all_conter+= $res_counter;
                            if ( $app->worker_debug )
                                $this->finish_task( $worker_label, $res_counter, $log, $app );
                        } catch ( PDOException $e ) {
                            $error = $e->getMessage();
                            $error = $app->translate( "An error occurred in task '%s'. (%s)",
                                                      [ $worker_label, $error ] );
                            if ( $verbose ) echo $error, PHP_EOL;
                            $this->log( $error, 'error', $app );
                            if ( $app->worker_debug && isset( $log ) && is_object( $log ) ) $log->remove();
                        }
                        $start = time();
                        $session->start( $start );
                        $session->expires( $start + $frequency + 3600 );
                        $session->save();
                        unset( $session );
                        if ( $res_counter ) {
                            $this->executed[] = 'optimize-tables';
                            $worker_labels[] = $worker_label;
                            $worker_messages[ $worker_label ] =
                                $app->translate( 'Optimize %s table(s).', $res_counter );
                        }
                    }
                }
            }
        }
        $upgrader = new PTUpgrader();
        if ( method_exists( $upgrader, 'worker_upgrade_functions' ) ) {
            $upgrade_functions = $upgrader->worker_upgrade_functions( $old_version );
            if (!empty( $upgrade_functions ) ) {
                $res_counter = 0;
                $worker_label = $app->translate( 'Worker Upgrade Functions' );
                if ( $app->worker_debug )
                    $log = $this->start_task( $worker_label, $app );
                foreach ( $upgrade_functions as $upgrade_function ) {
                     $upgader = $upgrade_function['component'];
                     $upgader = new $upgader();
                     $method = $upgrade_function['method'];
                     if ( method_exists( $upgader, $method ) ) {
                        $upgader->$method( $app );
                        $res_counter++;
                     }
                }
                $all_conter+= $res_counter;
                if ( $app->worker_debug )
                    $this->finish_task( $worker_label, $res_counter, $log, $app );
            }
        }
        $app->set_config( ['worker_version' => $this->version ] );
        if (! empty( $worker_labels ) ) {
            $sess_terms = ['value' => $app->request_id, 'kind' => 'CH', 'user_id' => ['>=' => 0] ];
            $app->remove_session( $sess_terms );
            $message = $app->translate( 'Scheduled tasks update.' );
            $metadata = [ $app->translate( 'Labels' ) => $worker_labels,
                          $app->translate( 'Messages' ) => $worker_messages ];
            $log = ['level' => 'info', 'category' => 'worker', 'message' => $message,
                    'metadata' => $metadata, 'workspace_id' => 0];
            $app->stash( 'workspace', null );
            $app->worker_log = $log;
        }
        if ( $app->worker_debug )
            $this->finish_task( $app->translate( 'All' ), $all_conter, $all_log, $app, 'start_time' );
    }

    function rebuildOptimizer ( $app, $argv = [] ) {
        $this->meth = 'rebuildOptimizer';
        $res_counter = 0;
        $performance_log = $app->log_dir . DS . 'performance.log';
        $rebuild_request_time = $app->rebuild_request_time ? (int) $app->rebuild_request_time : 40;
        $verbose = false;
        if ( basename( $_SERVER['PHP_SELF'] ) == 'rebuildOptimizer.php' && in_array( '--verbose', $argv ) ) {
            $verbose = true;
        }
        if (! file_exists( $performance_log ) ) {
            if ( $verbose ) {
                echo $app->translate( '%s not found.', $performance_log ), PHP_EOL;
            }
            return 0;
        } else if ( $rebuild_request_time ) {
            $fileObj = new SplFileObject( $performance_log, 'r');
            $fileObj->setFlags( SplFileObject::SKIP_EMPTY );
            $time_map = [];
            foreach ( $fileObj as $n => $line ) {
                if ( $line === false ) {
                    continue;
                }
                $line = rtrim( $line );
                $items = explode( "\t", $line );
                $log_time = strtotime( $items[0] );
                if ( ( $app->request_time - $log_time ) > 604800 ) {
                    // Last 1 week.
                    continue;
                } else if (! isset( $items[6] ) ) {
                    continue;
                }
                if ( $items[6] != 'publish_file=1' && $items[6] != 'publish_file=2' ) {
                    continue;
                }
                $model = explode( '=', $items[4] )[1];
                $table = $app->get_table( $model );
                $per_rebuild = strtolower( $table->plural ) . '_per_rebuild';
                if ( PTUtil::property_exists( $app, $per_rebuild ) ) {
                    continue;
                }
                $workspace_id = explode( '=', $items[3] )[1];
                $time_map[ $workspace_id ][ $model ][] = $items[2];
            }
            asort( $time_map );
            $optimizer = [];
            $pfx = DB_PREFIX;
            $countSQL = "SELECT urlmapping_id FROM {$pfx}urlmapping,{$pfx}template WHERE {$pfx}urlmapping.urlmapping_model=?"
                      . " AND {$pfx}urlmapping.urlmapping_template_id={$pfx}template.template_id AND {$pfx}template.template_status=2"
                      . " AND {$pfx}urlmapping.urlmapping_workspace_id=? AND ({$pfx}urlmapping.urlmapping_publish_file=1 OR"
                      . " {$pfx}urlmapping.urlmapping_publish_file=2)";
            foreach ( $time_map as $workspace_id => $items ) {
                if ( $verbose ) {
                    echo $app->translate( 'Optimizing workspace_id=%s...', $workspace_id ), PHP_EOL;
                }
                foreach ( $items as $model => $result ) {
                    $params = [ $model, $workspace_id ];
                    $urlmappings = $app->db->model( 'urlmapping' )->load( $countSQL, $params );
                    $urlmappings = count( $urlmappings );
                    if (! $urlmappings ) {
                        continue;
                    }
                    $sum = array_sum( $result );
                    $average = $sum / count( $result );
                    if ( $model == 'template' ) {
                        $urls = $app->db->model( 'urlinfo' )->count( ['model' => $model, 'wirkspace_id' => $workspace_id] );
                        if ( $urls ) {
                            // Rebuild per urls/objects.
                            $rebuild_per = $urls / $urlmappings;
                            $average *= $rebuild_per;
                        }
                    } else if ( $urlmappings > 1 ) {
                        // Rebuild per object.
                        $average *= $urlmappings;
                    }
                    if ( $average ) {
                        if ( $verbose ) {
                            echo $app->translate( 'Average rebuild time for model %s is %s seconds.', [
                              $app->translate( $model ), round( $average, 2 ) ] ), PHP_EOL;
                        }
                        $per_rebuild = (int) ( $rebuild_request_time / $average );
                        if (! $per_rebuild ) {
                            $per_rebuild = 1;
                        } else if ( $per_rebuild > $app->per_rebuild ) {
                            $per_rebuild = $app->per_rebuild;
                        }
                        $optimizer[ $workspace_id ][ $model ] = $per_rebuild;
                    }
                }
            }
            foreach ( $optimizer as $workspace_id => $items ) {
                foreach ( $items as $model => $result ) {
                    $table = $app->get_table( $model );
                    $per_rebuild = strtolower( $table->plural ) . '_per_rebuild';
                    $option = $app->db->model( 'option' )->get_by_key(
                        ['key' => $per_rebuild, 'workspace_id' => (int) $workspace_id,
                         'kind' => 'rebuild_optimizer' ]
                    );
                    if ( $verbose ) {
                        echo $app->translate( 'Set "%1$s" of workspace_id=%2$s to %3$s.', [ $per_rebuild, $workspace_id, $result ] ), PHP_EOL;
                    }
                    $option->number( $result );
                    $option->save();
                    $res_counter++;
                }
            }
        }
        if ( $verbose && ! $res_counter ) {
            echo $app->translate( 'No model found to optimize.' ), PHP_EOL;
        }
        return $res_counter;
    }

    function restoreMenu ( $app, $argv ) {
        $this->meth = 'restoreMenu';
        $verbose = false;
        if ( in_array( '--verbose', $argv ) ) {
            $verbose = true;
        }
        $this->start_work( $app, $argv );
        $workspace_ids = ['0'];
        $workspaces = $app->db->model( 'workspace' )->load_iter( null, null, 'id' );
        $workspace_ids = array_merge( $workspace_ids, $workspaces->fetchAll( PDO::FETCH_COLUMN ) );
        $counter = 0;
        foreach ( $workspace_ids as $workspace_id ) {
            $menus = $app->db->model( 'menu' )->load( ['workspace_id' => (int) $workspace_id ] );
            foreach ( $menus as $obj ) {
                if (! $obj->meta ) continue;
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
        if ( $verbose && ! $counter ) {
            echo $app->translate( 'No menu found to restore.' ), PHP_EOL;
        } else if ( $verbose ) {
            echo $app->translate( 'Restore %s menu(s).', $counter ), PHP_EOL;
        }
    }

    function encryptDBPassword ( $app, $argv ) {
        $this->meth = 'encryptDBPassword';
        $json = json_decode( file_get_contents( 'config.json' ), true );
        if (! isset( $json['config_settings']['cfg_encrypt_key'] ) ) {
            echo $app->translate( "The system environment value '%s' is not specified.", 'cfg_encrypt_key' ), PHP_EOL;
            exit();
        }
        if (! is_writable( 'db-config.php' ) ) {
            echo $app->translate( "Cannot write file '%s'.", 'db-config.php' );
            exit();
        }
        if ( in_array( '--decrypt', $argv ) || in_array( '-d', $argv ) ) {
            require_once( 'db-config.php' );
            $encrypt_key = $json['config_settings']['cfg_encrypt_key'];
            $dbpasswd = $app->decrypt( PADO_DB_PASSWORD, $encrypt_key );
            echo $dbpasswd, PHP_EOL;
            exit();
        }
        $password = null;
        if ( in_array( '-p', $argv ) ) {
            $idx = array_search( '-p', $argv );
            $password = $argv[ $idx + 1];
            unset( $argv[ $idx + 1], $argv[ $idx ] );
        }
        $length = 0;
        if ( in_array( '-r', $argv ) ) {
            $idx = array_search( '-r', $argv );
            $length = (int) $argv[ $idx + 1];
            unset( $argv[ $idx + 1], $argv[ $idx ] );
        }
        if (! $password ) {
            echo $app->translate( '%s is required.', '-p' ), PHP_EOL;
            exit();
        }
        $magic = $app->magic();
        $tmpfile_1 = null;
        $tmpfile_2 = "db-config.php.{$magic}";
        if ( $length ) {
            if (! is_writable( 'config.json' ) ) {
                echo $app->translate( "Cannot write file '%s'.", 'config.json' ), PHP_EOL;
                exit();
            }
            $cfg_encrypt_key = PTUtil::make_password( $length );
            $json['config_settings']['cfg_encrypt_key'] = $cfg_encrypt_key;
            $tmpfile_1 = "config.json.{$magic}";
            $json = json_encode( $json, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );
            $res = file_put_contents( $tmpfile_1, $json );
            if (! $res ) {
                echo $app->translate( "Cannot write file '%s'.", $tmpfile_1 ), PHP_EOL;
                exit();
            }
        } else {
            $cfg_encrypt_key = $json['config_settings']['cfg_encrypt_key'];
        }
        $dbpassword = $app->encrypt( $password, $cfg_encrypt_key );
        $handle = fopen( 'db-config.php', 'r' );
        $db_config = '';
        $match = false;
        while ( $line = fgets( $handle ) ) {
            if ( strpos( $line, "'PADO_DB_PASSWORD'" ) !== false ) {
                if ( preg_match( "/('PADO_DB_PASSWORD',\s*').*?'/", $line, $matches ) ) {
                    $line = preg_replace( "/('PADO_DB_PASSWORD',\s*').*?'/", $matches[1] . $dbpassword . "'", $line );
                    $match = true;
                }
            }
            $db_config.= $line;
        }
        fclose( $handle );
        if (! $match ) {
            echo $app->translate( 'An error occurred.' ), PHP_EOL;
            if ( $tmpfile_1 ) {
                @unlink( $tmpfile_1 );
            }
            exit();
        }
        $res = file_put_contents( $tmpfile_2, $db_config );
        if (! $res ) {
            echo $app->translate( "Cannot write file '%s'.", $tmpfile_2 ), PHP_EOL;
            if ( $tmpfile_1 ) {
                @unlink( $tmpfile_1 );
            }
            exit();
        }
        if ( $tmpfile_1 ) {
            $res = $app->fmgr->rename( $tmpfile_1, 'config.json' );
            if (! $res ) {
                echo $app->translate( "Cannot write file '%s'.", 'config.json' ), PHP_EOL;
                @unlink( $tmpfile_1 );
                exit();
            }
        }
        $res = $app->fmgr->rename( $tmpfile_2, 'db-config.php' );
        if (! $res ) {
            echo $app->translate( "Cannot write file '%s'.", 'db-config.php' ), PHP_EOL;
            @unlink( $tmpfile_2 );
            exit();
        }
        if ( function_exists( 'opcache_reset' ) ) {
            opcache_reset();
        }
        if ( $tmpfile_1 ) {
            echo $app->translate( "Password changed and 'db-config.php' and 'config.json' updated successfully." ), PHP_EOL;
        } else {
            echo $app->translate( "Password changed and 'db-config.php' updated successfully." ), PHP_EOL;
        }
    }

    function rebuildFiles ( $app, $argv ) {
        $this->meth = 'rebuildFiles';
        $this->start_work( $app, $argv );
        ini_set( 'memory_limit', -1 );
        ini_set( 'max_execution_time', 0 );
        $app->init_tags( true );
        $update_before = null;
        $logging = false;
        $params = 'tools/rebuildFiles.php ' . implode( ' ', $argv );
        if ( in_array( '--update_before', $argv ) ) {
            $idx = array_search( '--update_before', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $update_before = (int) $argv[ $idx + 1];
                $update_before = $app->request_time - $update_before;
                $this->update_before = $update_before;
                unset( $argv[ $idx + 1] );
            }
            unset( $argv[ $idx ] );
        }
        if ( in_array( '--logging', $argv ) ) {
            $idx = array_search( '--logging', $argv );
            unset( $argv[ $idx ] );
            $logging = true;
        }
        if ( in_array( '--callbacks', $argv ) ) {
            $idx = array_search( '--callbacks', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $callbacks = $argv[ $idx + 1];
                if ( strpos( $callbacks, '--' ) === 0 ) {
                    $callbacks = true;
                }
                if (! $callbacks || $callbacks === 'false' ) {
                    $app->publish_callbacks = false;
                }
                unset( $argv[ $idx + 1] );
            }
            unset( $argv[ $idx ] );
        }
        if (! count( $argv ) ) {
            list( $archive, $file ) = [ true, true ];
        } else {
            list( $archive, $file ) = [ in_array( 'archive', $argv ) , in_array( 'file', $argv ) ];
        }
        $session = null;
        if ( in_array( '--proc_name', $argv ) ) {
            $idx = array_search( '--proc_name', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $sess_name = $argv[ $idx + 1];
                $session = $app->db->model( 'session' )->get_by_key( ['name' => $sess_name, 'kind' => 'AS'] );
                unset( $argv[ $idx + 1] );
            }
            unset( $argv[ $idx ] );
        }
        $offset = null;
        $limit = null;
        if ( in_array( '--limit', $argv ) ) {
            $idx = array_search( '--limit', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $limit = (int) $argv[ $idx + 1];
                unset( $argv[ $idx + 1] );
            }
            unset( $argv[ $idx ] );
            if ( in_array( '--offset', $argv ) ) {
                $idx = array_search( '--offset', $argv );
                if ( isset( $argv[ $idx + 1] ) ) {
                    $offset = (int) $argv[ $idx + 1];
                    unset( $argv[ $idx + 1] );
                }
                unset( $argv[ $idx ] );
            }
        }
        $args = [];
        if ( $limit ) {
            $args['limit'] = $limit;
        }
        if ( $offset ) {
            $args['offset'] = $offset;
        }
        if ( $file ) {
            $table_ids = [];
            $columns = $app->db->model( 'column' )->load( ['edit' => 'file'], null, 'table_id' );
            foreach ( $columns as $column ) {
                $table_ids[ $column->table_id ] = true;
            }
            $tables = $app->db->model( 'table' )->load( ['id' => ['IN' => array_keys( $table_ids ) ] ], null, 'name' );
            foreach ( $tables as $table ) {
                $model = $table->name;
                $objects = $app->db->model( $model )->load( null, $args, 'id' );
                foreach ( $objects as $res ) {
                    $obj = $app->db->model( $model )->get_by_key( ['id' => $res->id ] );
                    if ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
                        continue;
                    }
                    $app->publish_obj( $obj, $obj, false, true, false );
                }
            }
        }
        if ( $archive ) {
            $fmgr = $app->fmgr;
            $urlmapping_ids = [];
            if ( in_array( '--urlmapping_ids', $argv ) ) {
                $idx = array_search( '--urlmapping_ids', $argv );
                if ( isset( $argv[ $idx + 1] ) ) {
                    $urlmapping_ids = explode( ',', $argv[ $idx + 1] );
                    unset( $argv[ $idx + 1] );
                }
                unset( $argv[ $idx ] );
            }
            $urlinfo_ids = [];
            if ( in_array( '--urlinfo_ids', $argv ) ) {
                $idx = array_search( '--urlinfo_ids', $argv );
                if ( isset( $argv[ $idx + 1] ) ) {
                    $urlinfo_ids = explode( ',', $argv[ $idx + 1] );
                    unset( $argv[ $idx + 1] );
                }
                unset( $argv[ $idx ] );
            }
            $model = null;
            $object_ids = [];
            if ( in_array( '--object_ids', $argv ) && in_array( '--model', $argv ) ) {
                $idx = array_search( '--object_ids', $argv );
                if ( isset( $argv[ $idx + 1] ) ) {
                    $object_ids = explode( ',', $argv[ $idx + 1] );
                    unset( $argv[ $idx + 1] );
                }
                unset( $argv[ $idx ] );
                $idx = array_search( '--model', $argv );
                if ( isset( $argv[ $idx + 1] ) ) {
                    $model = $argv[ $idx + 1];
                    unset( $argv[ $idx + 1] );
                }
                unset( $argv[ $idx ] );
            }
            $publish_objs = [];
            if ( in_array( '--objects', $argv ) ) {
                $idx = array_search( '--objects', $argv );
                if ( isset( $argv[ $idx + 1] ) ) {
                    $publish_objs = explode( ',', $argv[ $idx + 1] );
                    unset( $argv[ $idx + 1] );
                }
                unset( $argv[ $idx ] );
            }
            $publisher = new PTPublisher();
            if (! empty( $urlmapping_ids ) ) {
                foreach ( $urlmapping_ids as $urlmapping_id ) {
                    $urlmapping_id = (int) $urlmapping_id;
                    if (! $urlmapping_id ) continue;
                    $urlmapping = $app->db->model( 'urlmapping' )->load( $urlmapping_id, null, 'id,template_id' );
                    if (! $urlmapping ) continue;
                    if (! $update_before ) {
                        $template = $urlmapping->template;
                        if ( $template ) {
                            $app->publish_obj( $template );
                            continue;
                        }
                    }
                    $urls = $app->db->model( 'urlinfo' )->load( ['urlmapping_id' => $urlmapping_id ], $args );
                    foreach ( $urls as $url ) {
                        if ( $update_before && $fmgr->exists( $url->file_path ) ) {
                            $mtime = filemtime( $url->file_path );
                            if ( $update_before < $mtime ) {
                                continue;
                            }
                        }
                        $app->ctx->stash( 'workspace', $url->workspace );
                        $publisher->publish( $url, true );
                        $app->ctx->stash( 'workspace', null );
                    }
                    unset( $urls );
                }
            }
            if (! empty( $urlinfo_ids ) ) {
                $urls = $app->db->model( 'urlinfo' )->load( ['id' => ['IN' => $urlinfo_ids ] ], $args );
                foreach ( $urls as $url ) {
                    if ( $update_before && $fmgr->exists( $url->file_path ) ) {
                        $mtime = filemtime( $url->file_path );
                        if ( $update_before < $mtime ) {
                            continue;
                        }
                    }
                    $app->ctx->stash( 'workspace', $url->workspace );
                    $publisher->publish( $url, true );
                    $app->ctx->stash( 'workspace', null );
                }
                unset( $urls );
            }
            if (! empty( $object_ids ) && $model ) {
                $tags = new PTTags();
                $obj = $app->db->model( $model );
                $cols = $tags->select_cols( $app, $obj, '*' );
                $objects = $obj->load( ['id' => ['IN' => $object_ids ] ], $args, $cols );
                foreach ( $objects as $obj ) {
                    $app->publish_obj( $obj );
                }
            }
            if (! empty( $publish_objs ) ) {
                $_publish_objs = $publish_objs;
                if ( $offset && $limit ) {
                    $_publish_objs = array_slice( $_publish_objs, $offset, $limit );
                }
                foreach ( $_publish_objs as $publish_obj ) {
                    list( $pub_model, $pub_id ) = explode( '_', $publish_obj );
                    $publish_object = $app->db->model( $pub_model )->load( (int) $pub_id );
                    if ( is_object( $publish_object ) ) {
                        $app->publish_obj( $publish_object );
                    }
                }
            }
            if ( empty( $urlmapping_ids ) && empty( $urlinfo_ids ) && ! $model && empty( $publish_objs ) ) {
                $app->db->caching = false;
                $app->db->db->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
                $pfx = DB_PREFIX;
                $sql = "SELECT urlmapping_model,urlmapping_workspace_id FROM {$pfx}urlmapping GROUP BY urlmapping_model,urlmapping_workspace_id";
                $sql .= ' ORDER BY urlmapping_workspace_id ASC';
                $group = $app->db->db->query( $sql );
                $rebuild_models = [];
                while ( $result = $group->fetch() ) {
                    list( $model, $workspace_id ) = [ $result['urlmapping_model'], $result['urlmapping_workspace_id'] ];
                    if ( isset( $rebuild_models[ $model ] ) ) continue;
                    $baseModel = $app->db->model( $model );
                    if ( $baseModel->has_column( 'workspace_id' ) ) {
                        $objects = $baseModel->load( ['workspace_id' => $workspace_id ], $args, 'id' );
                    } else {
                        $objects = $baseModel->load( null, $args, 'id' );
                        $rebuild_models[ $model ] = true;
                    }
                    if ( $app->ctx->stash('workspace') && $app->ctx->stash('workspace')->id != $workspace_id ) {
                        $workspace = $app->db->model( 'workspace' )->load( (int) $workspace_id );
                        $app->ctx->stash( 'workspace', $workspace );
                    } else if ( $workspace_id ) {
                        $workspace = $app->db->model( 'workspace' )->load( (int) $workspace_id );
                        $app->ctx->stash( 'workspace', $workspace );
                    }
                    foreach ( $objects as $res ) {
                        $obj = $app->db->model( $model )->get_by_key( ['id' => $res->id ] );
                        $app->publish_obj( $obj, $obj, false, false, true );
                    }
                }
            }
        }
        if ( is_object( $session ) && $session->id ) {
            $session->remove();
        }
        if ( $logging ) {
            $past = time() - $app->request_time;
            $message = $app->translate( 'The worker is complete (Processing time:%s).', $past );
            $metadata = ['meth' => 'rebuildFiles', 'params' => $params ];
            $app->log( ['message'  => $message,
                        'category' => 'worker',
                        'metadata' => json_encode( $metadata, JSON_UNESCAPED_UNICODE ),
                        'level'    => 'info'] );
        }
    }

    function restore_sql ( $app, $argv ) {
        $this->meth = 'restore_sql';
        $this->start_work( $app, $argv );
        $mysqld = $app->mysql_path;
        if (! $mysqld ) {
            echo $app->translate( "'%s' not specified.", 'mysql_path' );
            exit();
        }
        $file = null;
        $blob = null;
        if ( count( $argv ) ) {
            if ( count( $argv ) === 1 ) {
                $file = $argv[0];
                if ( strpos( $file, '--file=' ) === 0 ) {
                    list( $arg, $file ) = explode( '--file=', $file );
                }
            } else {
                foreach ( $argv as $idx => $arg ) {
                    if ( strpos( $arg, '--file=' ) === 0 ) {
                        list( $arg, $file ) = explode( '--file=', $argv );
                    } else if ( $arg === '--file' && isset( $argv[ $idx + 1] ) ) {
                        $file = $argv[ $idx + 1];
                    } else if ( strpos( $arg, '--blob=' ) === 0 ) {
                        list( $arg, $blob ) = explode( '--blob=', $argv );
                    } else if ( $arg === '--blob' && isset( $argv[ $idx + 1] ) ) {
                        $blob = $argv[ $idx + 1];
                    }
                }
            }
        }
        $backup_dir = $app->backup_dir;
        if ( $backup_dir ) {
            $backup_dir = rtrim( $backup_dir, '/' );
            $backup_dir = rtrim( $backup_dir, '\\' );
            $backup_dir .= DS;
            if (! $file ) {
                $file = file_exists( $backup_dir . 'sqldump.sql' ) ? $backup_dir . 'sqldump.sql' : $backup_dir . 'sqldump.sql.zip';
                if (! $file || file_exists( $backup_dir . 'sqldump.sql.gz' ) ) {
                    $file = $backup_dir . 'sqldump.sql.gz';
                }
            }
        }
        if (! $file || !file_exists( $file ) ) {
            if (! $file ) {
                echo $app->translate( "'%s' not specified.", '--file' );
            } else {
                echo $app->translate( '%s not found.', $file );
            }
            return;
        }
        $argv = $file;
        echo $app->translate( 'Are you sure you want to restore the database? (y/n):' );
        $stdin = strtolower( trim( fgets( STDIN ) ) );
        if ( $stdin != 'y' ) {
            echo $app->translate( 'Restore cancelled.' ) , PHP_EOL;
            exit();
        }
        $is_temp = false;
        $extsnsion = PTUtil::get_extension( $argv );
        $blob_path = null;
        if ( $blob && defined( 'PADO_DB_BLOB2FILE' ) ) {
            if (! file_exists( $blob ) ) {
                echo $app->translate( '%s not found.', $blob );
                exit();
            }
            if ( defined( 'PADO_DB_BLOBPATH' ) ) {
                $blob_path = PADO_DB_BLOBPATH;
            }
        }
        if ( $extsnsion == 'zip' ) {
            $temp_dir = $app->upload_dir() . DS;
            $zip = new ZipArchive();
            $res = $zip->open( $argv );
            $zip->extractTo( $temp_dir );
            $zip->close();
            $argv = preg_replace( '/\.[^\.]*$/', '', $argv );
            if (! file_exists( $argv ) ) {
                echo $app->translate( '%s not found.', $argv ), PHP_EOL;
                exit();
            }
            $is_temp = true;
        } else if ( $extsnsion == 'gz' ) {
            $gzip_path = $app->gzip_path;
            if ( $gzip_path ) {
                $expanded = preg_replace( '/\.[^\.]*$/', '', $argv );
                $argv = escapeshellarg( $argv );
                $expanded_basename = basename( $expanded );
                $_expanded = escapeshellarg( $expanded );
                $cmd = "{$gzip_path} -c -d {$argv} >{$_expanded}";
                exec( $cmd, $output, $return_var );
                if ( $return_var !== 0 ) {
                    echo $app->translate( 'An error occurred while executing gzip(%s).', $expanded_basename ) . PHP_EOL;
                    echo $app->translate( 'Restore cancelled.' ) , PHP_EOL;
                    exit();
                }
            } else {
                echo $app->translate( "The system environment value '%s' is not specified.", 'gzip_path' ), PHP_EOL;
                exit();
            }
            $is_temp = true;
            $argv = $expanded;
            if (! file_exists( $argv ) ) {
                echo $app->translate( '%s not found.', $argv ), PHP_EOL;
                exit();
            }
        }
        $user = PADO_DB_USER;
        $pswd = PADO_DB_PASSWORD;
        $host = PADO_DB_HOST;
        $port = PADO_DB_PORT;
        $name = PADO_DB_NAME;
        $json = $app->pt_dir . DS . 'config.json';
        $cfg_encrypt_key = $this->get_config_from_json( $json, 'cfg_encrypt_key' );
        $encrypt_dbpassword = $this->get_config_from_json( $json, 'encrypt_dbpassword' );
        if ( $cfg_encrypt_key && $encrypt_dbpassword ) {
            $pswd = $app->decrypt( PADO_DB_PASSWORD, $cfg_encrypt_key );
        }
        $user = escapeshellarg( $user );
        $pswd = escapeshellarg( $pswd );
        $config = "[client]\nuser={$user}\npassword={$pswd}\n";
        $conf = $app->upload_dir() . DS . 'mysql.cnf';
        file_put_contents( $conf, $config );
        $cmd = "{$mysqld} --defaults-extra-file={$conf} --host={$host} --port={$port} $name <{$argv}";
        if ( $blob_path && $blob ) {
            $extension = PTUtil::get_extension( $blob );
            $upload_dir = $app->upload_dir();
            if ( $extension === 'gz' && preg_match( '/\.tar\.gz$/', $blob ) ) {
                $tar_path = $app->tar_path;
                if (! $tar_path ) {
                    echo $app->translate( "The system environment value '%s' is not specified.", 'tar_path' ), PHP_EOL;
                    exit();
                }
                $expand = "{$tar_path} -zxf {$blob}";
                chdir( $upload_dir );
                exec( $expand, $output, $return_var );
                chdir( $app->pt_dir );
            } else if ( $extension === 'zip' ) {
                $zip = new ZipArchive();
                $res = $zip->open( $blob );
                $zip->extractTo( $upload_dir );
            } else {
                echo $app->translate( 'Could not expand archive.' ), PHP_EOL;
                exit();
            }
            $items = scandir( $upload_dir );
            $from = null;
            chdir( $upload_dir );
            foreach ( $items as $item ) {
                if ( strpos( $item, '.' ) === 0 ) continue;
                if ( is_dir( $item ) ) {
                    $from = $upload_dir . DS . $item;
                    break;
                }
            }
            chdir( $app->pt_dir );
            if (! $from ) {
                echo $app->translate( 'Could not expand archive.' ), PHP_EOL;
                exit();
            }
            if ( is_dir( "{$blob_path}.tmp" ) ) {
                echo $app->translate( 'An error occurred while restoring data.' ), PHP_EOL;
                exit();
            }
            $res = is_dir( $blob_path ) ? $app->fmgr->rename( $blob_path, "{$blob_path}.tmp" ) : true;
            if (! $res ) {
                echo $app->translate( 'An error occurred while restoring data.' ), PHP_EOL;
                exit();
            } else {
                if ( $app->fmgr->rename( $from, $blob_path ) ) {
                    if ( is_dir( "{$blob_path}.tmp" ) ) {
                        $app_protect = $app->app_protect;
                        $app->app_protect = false;
                        PTUTil::remove_dir( "{$blob_path}.tmp" );
                        $app->app_protect = $app_protect;
                    }
                } else {
                    echo $app->translate( 'An error occurred while restoring data.' ), PHP_EOL;
                    if ( is_dir( "{$blob_path}.tmp" ) ) {
                        $app->fmgr->rename( "{$blob_path}.tmp", $blob_path );
                    }
                    exit();
                }
            }
        }
        exec( $cmd, $output, $return_var );
        @unlink( $conf );
        if ( $is_temp ) @unlink( $argv );
        if ( $return_var !== 0 ) {
            $error = count( $output ) ? implode( ', ', $output ) : '';
            $msg = $error ? $app->translate( 'An error occurred while executing mysql restore(%s).', $error )
                          : $app->translate( 'An error occurred while executing mysql restore.' );
            $this->log( $msg, 'error', $app );
        } else {
            $app = new Prototype( ['id' => 'Worker'] );
            $app->init();
            $app->clear_all_cache( true );
            $msg = $app->translate( 'The database restore was successful.' );
            $this->log( $msg, 'info', $app );
            echo $msg, PHP_EOL;
        }
    }

    function backup_sql ( $app, $argv ) {
        $this->meth = 'backup_sql';
        $this->start_work( $app, $argv );
        $backup_dir = $app->backup_dir;
        if ( $backup_dir ) {
            $backup_dir = rtrim( $backup_dir, '/' );
            $backup_dir = rtrim( $backup_dir, '\\' );
            $backup_dir .= DS;
        }
        if (! $backup_dir ) {
            echo $app->translate( "'%s' not specified.", 'backup_dir' );
            exit();
        } else if ( !is_dir( $backup_dir ) || !is_writable( $backup_dir ) ) {
            echo $app->translate( "Cannot write to direcroty'%s'.", $backup_dir );
            exit();
        }
        $mysqldump = $app->mysqldump_path;
        if (! $mysqldump ) {
            echo $app->translate( "'%s' not specified.", 'mysqldump_path' );
            exit();
        }
        $help = "{$mysqldump} --help";
        exec( $help, $output, $return_var );
        if ( $return_var !== 0 ) {
            echo $app->translate( 'An error occurred while executing mysqldump.' ), PHP_EOL;
            exit();
        }
        $options = [];
        foreach ( $output as $out ) {
            if ( strpos( $out, '  -' ) === 0 ) {
                if ( strpos( $out, ', --' ) !== false ) {
                    $out = preg_replace( '!^\s\s\-.?,\s!', '', $out );
                } else {
                    $out = ltrim( $out, ' ' );
                }
                $out = preg_replace( '!(.*?)\s.*$!', '$1', $out );
                if ( $out && strpos( $out, '=' ) === false ) {
                    $options[] = $out;
                }
            }
        }
        $mysqldump_ver = $output[0];
        $mysqldump_ver = preg_replace( '/^.*?Distrib\s(.*?)\,.*$/', '$1', $mysqldump_ver );
        $mysqldump_ver = (float) $mysqldump_ver;
        $mysql_ver = $app->db->db->query( 'select version()' )->fetchAll();
        $mysql_ver = array_shift( $mysql_ver );
        $mysql_ver = array_shift( $mysql_ver );
        $mysql_ver = (float) $mysql_ver;
        $user = PADO_DB_USER;
        $pswd = PADO_DB_PASSWORD;
        $host = PADO_DB_HOST;
        $port = PADO_DB_PORT;
        $name = PADO_DB_NAME;
        $json = $app->pt_dir . DS . 'config.json';
        $cfg_encrypt_key = $this->get_config_from_json( $json, 'cfg_encrypt_key' );
        $encrypt_dbpassword = $this->get_config_from_json( $json, 'encrypt_dbpassword' );
        if ( $cfg_encrypt_key && $encrypt_dbpassword ) {
            $pswd = $app->decrypt( PADO_DB_PASSWORD, $cfg_encrypt_key );
        }
        $user = escapeshellarg( $user );
        $pswd = escapeshellarg( $pswd );
        $config = "[client]\nuser={$user}\npassword={$pswd}\n";
        $conf = $app->upload_dir() . DS . 'mysql.cnf';
        file_put_contents( $conf, $config );
        $compress_suffix = $app->backup_compress ? '.' . $app->backup_compress : '';
        $compress_suffix = strtolower( $compress_suffix );
        $gzip_path = $app->gzip_path;
        $tar_path = $app->tar_path;
        $filename = $backup_dir . 'sqldump.sql';
        $rotate = $app->backup_rotate;
        $max = $rotate - 1;
        $blob_suffix = $compress_suffix == '.zip' ? '.zip' : '.tar.gz';
        $blob_path = null;
        if ( in_array( '--blob', $argv ) && defined( 'PADO_DB_BLOB2FILE' ) ) {
            if ( defined( 'PADO_DB_BLOBPATH' ) ) {
                $blob_path = PADO_DB_BLOBPATH;
            }
        }
        if ( $rotate && $rotate > 1 ) {
            for ( $i = 0; $i <= $rotate; $i++ ) {
                $count = $rotate - $i;
                $old_filename = $count == 0 ? $filename . $compress_suffix
                                            : $backup_dir . "sqldump-{$count}.sql" . $compress_suffix;
                $next = $count + 1;
                $new_filename = $backup_dir . "sqldump-{$next}.sql" . $compress_suffix;
                if ( $next > $max && file_exists( $old_filename ) ) {
                    @unlink( $old_filename );
                } else if ( file_exists( $old_filename ) ) {
                    @rename( $old_filename, $new_filename );
                }
                $old_filename = $count == 0 ? $backup_dir . "blob{$blob_suffix}"
                                            : $backup_dir . "blob-{$count}{$blob_suffix}";
                $new_filename = $backup_dir . "blob-{$next}{$blob_suffix}";
                if ( $next > $max && file_exists( $old_filename ) ) {
                    @unlink( $old_filename );
                } else if ( file_exists( $old_filename ) ) {
                    rename( $old_filename, $new_filename );
                }
            }
        }
        $cmd_option = '';
        $skip_column = '';
        $sql = "SHOW TABLES LIKE 'COLUMN_STATISTICS'";
        $column_statistics = $app->db->db->query( $sql )->fetchAll();
        $output = implode( "\n", $output );
        if (! empty( $column_statistics ) ) {
            if ( $mysqldump_ver >= 8 && 6 > $mysql_ver ) {
                if ( strpos( $output, '--skip-column-statistics' ) !== false ) {
                    $skip_column = ' --skip-column-statistics ';
                }
            }
        }
        foreach ( $argv as $arg ) {
            if ( in_array( $arg, $options ) ) {
                $cmd_option .= $arg . ' ';
            }
        }
        $test = "{$mysqldump} --version";
        exec( $test, $version, $return_var );
        if ( $return_var !== 0 ) {
            $error = count( $version ) ? implode( ', ', $version ) : '';
            $msg = $error ? $app->translate( 'An error occurred while executing mysqldump(%s).', $error )
                          : $app->translate( 'An error occurred while executing mysqldump.' );
            $this->log( $msg, 'error', $app );
            echo $msg, PHP_EOL;
        }
        $version = implode( PHP_EOL, $version );
        $set_gtid_purged = stripos( $version, 'MariaDB' ) !== false ? '' : '--set-gtid-purged=OFF';
        $blobname_tmp = null;
        $filename_tmp = "{$filename}.tmp";
        if ( file_exists( $filename ) ) {
            @rename( $filename, $filename_tmp );
        }
        $compressed_file = "{$filename}{$compress_suffix}";
        $compressed_tmp  = "{$compressed_file}.tmp";
        $cmd = "{$mysqldump} {$skip_column} --defaults-extra-file={$conf} {$set_gtid_purged} {$cmd_option} --no-tablespaces --single-transaction --hex-blob --host={$host} --port={$port} {$name} >{$filename}";
        exec( $cmd, $output, $return_var );
        @unlink( $conf );
        if ( $return_var !== 0 ) {
            $error = count( $output ) ? implode( ', ', $output ) : '';
            $msg = $error ? $app->translate( 'An error occurred while executing mysqldump(%s).', $error )
                          : $app->translate( 'An error occurred while executing mysqldump.' );
            $this->log( $msg, 'error', $app );
            echo $msg, PHP_EOL;
        } else {
            if ( $compress_suffix == '.zip' ) {
                $expanded_basename = basename( $filename );
                if ( file_exists( $compressed_file ) ) {
                    @rename( $compressed_file, $compressed_tmp );
                }
                $zip = new ZipArchive();
                $res = $zip->open( "{$filename}.zip", ZipArchive::CREATE );
                $zip->addFile( $filename, basename( $filename ) );
                $zip->close();
                if ( file_exists( "{$filename}.zip" ) ) {
                    @unlink( $filename );
                } else {
                    echo $app->translate( "Could not create ZIP archive '%s'.", "{$expanded_basename}.zip" ) , PHP_EOL;
                }
                if ( $blob_path ) {
                    $filename = $backup_dir . "blob{$blob_suffix}";
                    $expanded_basename = basename( $filename );
                    $blobname_tmp = "{$filename}.tmp";
                    if ( file_exists( $filename ) ) {
                        @rename( $filename, $blobname_tmp );
                    }
                    $res = PTUtil::make_zip_archive( $blob_path, $filename );
                    if (! $res ) {
                        echo $app->translate( "Could not create ZIP archive '%s'.", "{$expanded_basename}.zip" ) , PHP_EOL;
                        if ( file_exists( $blobname_tmp ) ) {
                            @rename( $blobname_tmp, $filename );
                        }
                    }
                }
            } else if ( $compress_suffix == '.gz' ) {
                $expanded_basename = basename( $filename );
                $filename = escapeshellarg( $filename );
                $cmd = "{$gzip_path} {$filename}";
                if ( file_exists( $compressed_file ) ) {
                    @rename( $compressed_file, $compressed_tmp );
                }
                exec( $cmd, $output, $return_var );
                if ( $return_var !== 0 ) {
                    echo $app->translate( 'An error occurred while executing gzip(%s).', $expanded_basename ) , PHP_EOL;
                }
                if ( $blob_path ) {
                    $filename = $backup_dir . "blob{$blob_suffix}";
                    $blobname_tmp = "{$filename}.tmp";
                    if ( $app->fmgr->exists( $filename ) ) {
                        $app->fmgr->rename( $filename, $blobname_tmp );
                    }
                    $expanded_basename = basename( $filename );
                    chdir( dirname( $blob_path ) );
                    $blob_name = basename( $blob_path );
                    $cmd = "{$tar_path} zcf {$filename} {$blob_name}";
                    exec( $cmd, $output, $return_var );
                    if ( $return_var !== 0 ) {
                        echo $app->translate( 'An error occurred while executing gzip(%s).', $expanded_basename ) , PHP_EOL;
                        if ( file_exists( $blobname_tmp ) ) {
                            @rename( $blobname_tmp, $filename );
                        }
                    }
                    chdir( $app->pt_dir );
                }
            }
            if ( file_exists( $filename_tmp ) ) {
                @unlink( $filename_tmp );
            }
            if ( file_exists( $blobname_tmp ) ) {
                @unlink( $blobname_tmp );
            }
            if ( file_exists( $compressed_tmp ) ) {
                @unlink( $compressed_tmp );
            }
            $msg = $app->translate( 'The database backup was successful.' );
            $this->log( $msg, 'info', $app );
            if (! $this->verbose && basename( $_SERVER['PHP_SELF'] ) === 'backupSQL.php' ) {
                echo $msg, PHP_EOL;
            }
        }
    }

    function thumbnails_c ( $app, $argv = [] ) {
        $this->meth = 'thumbnails_c';
        if ( $app->assets_c && is_dir( $app->assets_c ) ) {
            $counter = 0;
            $terms = ['kind' => 'metadata'];
            if (!empty( $argv ) ) {
                $models = [];
                foreach ( $argv as $arg ) {
                    $model = $app->get_table( $arg );
                    if ( $model ) {
                        $models[] = $arg;
                    }
                }
                if (! empty( $models ) ) {
                    $terms['model'] = ['IN' => $models ];
                }
            }
            $fmgr = $app->fmgr;
            $meta = $app->db->model( 'meta' )->load( $terms );
            foreach ( $meta as $data ) {
                $metadata = json_decode( $data->text );
                if ( is_object( $metadata ) && $metadata->class == 'image' ) {
                    $file_ext = $metadata->extension;
                    $asset_id = $data->object_id;
                    $model = $data->model;
                    $column = $data->key;
                    $thumb_name = "thumb-{$model}-128xauto-square-{$asset_id}-{$column}.{$file_ext}";
                    if (! $fmgr->exists( $app->assets_c . DS . $thumb_name ) ) {
                        $fmgr->put( $app->assets_c . DS . $thumb_name, $data->metadata );
                        $counter++;
                    }
                }
            }
            echo $app->translate( '%s thumbnail file(s) has been created.', $counter ), PHP_EOL;
        } else {
            echo $app->translate( "The system environment value '%s' is not specified.", 'assets_c' ), PHP_EOL;
        }
    }

    function test ( $app, $argv = [] ) {
        $app->build_pre_parse = 0;
        $this->meth = 'test';
        $files = [];
        $logging = false;
        if ( in_array( '--logging', $argv ) ) {
            $idx = array_search( '--logging', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $logging = explode( ',', $argv[ $idx + 1] );
                unset( $argv[ $idx + 1] );
            } else {
                $logging = false;
            }
            unset( $argv[ $idx ] );
        }
        if ( in_array( '--files', $argv ) ) {
            $idx = array_search( '--files', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $files = explode( ',', $argv[ $idx + 1] );
                unset( $argv[ $idx + 1] );
            } else {
                $files = [];
            }
            unset( $argv[ $idx ] );
        } else if (!empty( $argv ) ) {
            $files = $argv;
        }
        $app_dir = dirname( dirname( __DIR__ ) );
        if ( empty( $files ) ) {
            PTUtil::file_find( $app_dir, $files );
        }
        $app_dir = preg_quote( $app_dir, '/' );
        $errors = [];
        $php_binary = $app->php_binary();
        if ( $php_binary ) {
            foreach ( $files as $file ) {
                if ( PTUtil::get_extension( $file ) == 'php' ) {
                    if (! file_exists( $file ) ) {
                        echo $app->translate( '%s not found.', $file ), PHP_EOL;
                        continue;
                    }
                    $res = PTUtil::compile_check( file_get_contents( $file ) );
                    $file = preg_replace( "/^{$app_dir}/", '', $file );
                    $file = str_replace( DS, '/', $file );
                    if ( $res === true ) {
                        echo "{$file} compile ok.", PHP_EOL;
                    } else {
                        $errors[ $file ] = $res;
                    }
                }
            }
        } else {
            echo $app->translate( "The system environment value '%s' is not specified.", 'php_binary' ), "\n\n";
        }
        $plugin_dirs = $app->plugin_paths;
        $ds = DS;
        foreach ( $plugin_dirs as $plugin_dir ) {
            foreach ( glob("{$plugin_dir}{$ds}*{$ds}*.json") as $filename ) {
                $app->configure_from_json( $filename );
            }
            foreach ( glob("{$plugin_dir}{$ds}*{$ds}*.php") as $filename ) {
                $app->class_paths[ strtolower( basename( dirname( $filename ) ) ) ] = $filename;
            }
        }
        $registry = $app->registry;
        $ctx = $app->ctx;
        if ( isset( $registry['tags'] ) ) {
            $tags = $registry['tags'];
            foreach ( $tags as $kind => $props ) {
                foreach ( $props as $tag => $func ) {
                    $component = $app->component( $func['component'] );
                    $method = $func['method'];
                    if ( $component && method_exists( $component, $method ) ) {
                        $ctx->register_tag( $tag, $kind, $method, $component );
                        $app->plugins_tags[ $tag ] = $func;
                    }
                }
            }
        }
        $app->init_tags( true );
        $excludes = ['/themes/website/views/f82e1985-d865-4c5b-9921-f186643a6c40.tmpl',
                     '/themes/media/views/a0766e79-d36a-4b1b-bc15-f6a6f21b46df.tmpl',
                     '/plugins/EmailMagazine/tmpl/html-wrapper.tmpl'];
        foreach ( $files as $file ) {
            if ( PTUtil::get_extension( $file ) == 'tmpl' ) {
                if (! file_exists( $file ) ) {
                    echo $app->translate( '%s not found.', $file ), PHP_EOL;
                    continue;
                }
                $res = PTUtil::compile_check( file_get_contents( $file ), '', $logging );
                $file = preg_replace( "/^{$app_dir}/", '', $file );
                $file = str_replace( DS, '/', $file );
                if (! in_array( $file, $excludes ) ) {
                    if ( $res === true ) {
                        echo "{$file} compile ok.", PHP_EOL;
                    } else {
                        $errors[ $file ] = $res;
                    }
                }
            }
        }
        foreach ( $files as $file ) {
            if ( PTUtil::get_extension( $file ) == 'json' ) {
                if (! file_exists( $file ) ) {
                    echo $app->translate( '%s not found.', $file ), PHP_EOL;
                    continue;
                }
                json_decode( file_get_contents( $file ) );
                $file = preg_replace( "/^{$app_dir}/", '', $file );
                $file = str_replace( DS, '/', $file );
                if ( json_last_error() === JSON_ERROR_NONE ) {
                    echo "{$file} decode ok.", PHP_EOL;
                } else {
                    $errors[ $file ] = ['An error occurred while decoding json.'];
                }
            }
        }
        if (! empty( $errors ) ) {
            echo "\n======================== Errors ========================\n";
            foreach ( $errors as $file => $res ) {
                echo "Errors in {$file}.\n";
                foreach ( $res as $line ) {
                    echo "\t{$line}\n";
                }
            }
        }
    }

    function continue_task ( $name, $argv = [], $maintenance_time = false ) {
        $app = $this->app;
        if ( $app->exclude_tasks && is_array( $app->exclude_tasks ) && in_array( $name, $app->exclude_tasks ) ) {
            return false;
        }
        if ( $maintenance_time ) {
            if ( in_array( $name, $this->excludes ) ) return false;
            return true;
        }
        $max_excec_time = $this->max_execution_time ? $this->max_execution_time : ini_get( 'max_execution_time' );
        $this->max_execution_time = $max_excec_time;
        $past = time() - $app->request_time;
        $excec_time = $max_excec_time - $past;
        if ( $excec_time < 600 ) { // 10minits
            $max_excec_time += 1200; // +20minits
            ini_set( 'max_execution_time', $max_excec_time );
            $this->max_execution_time = $max_excec_time;
            // return false;
        }
        $worker_period = $this->worker_period ? $this->worker_period : $app->worker_period - 300; // 5minits
        if ( $past >= $worker_period ) {
            return false;
        }
        $this->worker_period = $worker_period;
        $peak_memory = function_exists( 'memory_get_peak_usage' ) ? memory_get_peak_usage( true ) : 0;
        if ( $peak_memory && ini_get( 'memory_limit' ) != -1 ) {
            $memory_limit = $this->memory_limit ? $this->memory_limit : PTUtil::return_bytes( ini_get( 'memory_limit' ) );
            $this->memory_limit = $memory_limit;
            $remaining = $memory_limit - $peak_memory;
            if ( $remaining < 5242880 ) { // 5MB
                return false;
            }
        }
        // $load_avg = function_exists( 'sys_getloadavg' ) ? sys_getloadavg()[0] : 0;
        if ( in_array( $name, $this->excludes ) ) return false;
        if (! count( $argv ) ) return true;
        // Unintentional code.
        if ( property_exists( $app, $name ) ) {
            if (! $app->$name ) {
                return false;
            }
        }
        return in_array( $name, $argv );
    }

    function translate ( $phrase ) {
        $app = $this->app;
        if (! is_object( $app ) ) {
            $app = Prototype::get_instance();
            $this->app = $app;
        }
        return $app->translate( $phrase );
    }

    function core_tasks () {
        $tasks = ['cleanup_blobs' => [
            'label' => 'Cleanup removed files',
            'component' => 'PTWorker',
            'priority' => 100,
            'method' => 'cleanup_blobs',
            'frequency' => 10800,
        ] ];
        return $tasks;
    }

    function cleanup_blobs ( $app ) {
        $db = $app->db;
        $db->caching = false;
        if ( $db->blob2file && $db->blob_path && is_dir( $db->blob_path ) ) {
        } else {
            return false;
        }
        return false; // TODO;
        $dir = $db->blob_path;
        $counter = 0;
        if ( $counter ) {
            $this->log( $app->translate( 'Cleanup %s removed file(s).', $counter ) );
        }
        return $counter;
    }

    function get_config_from_json ( $json, $name ) {
        $json = json_decode( file_get_contents( $json ), true );
        if ( is_array( $json ) && isset( $json['config_settings'] ) ) {
            $settings = $json['config_settings'];
            return $settings[ $name ] ?? null;
        }
    }

    function start_task ( $msg, $app, $prop = 'current_time' ) {
        if (! $app ) $app = $this->app;
        $msg = $app->translate( "Scheduled task '%s' start.", $msg );
        $verbose = $this->verbose;
        $this->verbose = false;
        $log = $this->log( $msg );
        $this->verbose = $verbose;
        $this->$prop = microtime( true );
        return $log;
    }

    function finish_task ( $msg, $counter, $log, $app, $prop = 'current_time' ) {
        if (! $app ) $app = $this->app;
        $end = microtime( true );
        $past = $end - $this->$prop;
        if ( $past < 60 ) {
            $past = $app->translate( '%sseconds', number_format( $past, 2 ) );
        } else {
            $past = PTUtil::sec_to_hms( round( $past ), '%s,%s,%s' );
            $past = $app->translate( '%1$sh %2$smin %3$sseconds', explode( ',', $past ) );
        }
        $msg = $app->translate( "Scheduled task '%s' finish(Number processed:%s, Processing time: %s).", [ $msg, $counter, $past ] );
        if ( $prop !== 'start_time' ) {
            $log->message( $msg );
            $app->set_default( $log );
            $log->save();
        } else {
            $metadata = $log->metadata;
            $created_on = $log->created_on;
            $log->remove();
            $verbose = $this->verbose;
            $this->verbose = false;
            $log = $this->log( $msg );
            if ( $metadata ) {
                $log->metadata( $metadata );
            }
            $log->created_on( $created_on );
            $log->save();
            $this->verbose = $verbose;
        }
    }

    function log ( $message, $level = 'info', $app = null, $workspace_id = 0 ) {
        if (! $app ) $app = $this->app;
        if (! $app->db ) {
            return;
        }
        if ( $this->verbose ) echo $message, PHP_EOL;
        $log = ['level' => $level, 'category' => 'worker',
                'message' => $message, 'workspace_id' => $workspace_id ];
        $log = $app->log( $log );
        return $log;
    }
}