<?php

class PTPublisher {

    function shared_background_publishing ( $app, &$urls, $parallel = false ) {
        if ( empty( $urls ) ) {
            return;
        }
        $proc_id = $app->proc_id;
        $ts_job = $app->db->model( 'ts_job' )->__new();
        $ts_job->name( 'Shared Background Publishing' );
        $ts_job->class( 'Shared Background Publishing' );
        $ts_job->component( 'PTPublisher' );
        $ts_job->label( $proc_id );
        $ts_job->workspace_id( 0 );
        $ts = date( 'Y-m-d H:i:s', time() + $app->shared_background_publishing + 300 );
        $ts_job->start_on( $ts );
        $app->set_default( $ts_job );
        $ts_job->save();
        foreach ( $urls as $url ) {
            $queue = $app->db->model( 'queue' )->get_by_key(
                ['model' => 'urlinfo',
                 'key' => md5( $url->file_path ),
                 'component' => 'PTPublisher',
                 'method' => 'queue_publish_url'] );
            $queue->class( $proc_id );
            $queue->data( $url->file_path );
            $queue->object_id( $url->id );
            $queue->workspace_id( $url->workspace_id );
            $queue->ts_job_id( $ts_job->id );
            $app->set_default( $queue );
            $queue->start_on( $queue->created_on );
            $queue->max_retries( 0 );
            $queue->interval( 1000000 );
            $queue->ts_job_id( 0 );
            $queue->save();
            if ( $app->enable_on_demand ) {
                $app->fmgr->unlink( $url->file_path, $url );
            }
        }
        sleep( $app->shared_background_publishing );
        $queue = true;
        $publish_urls = [];
        $publisher = $app->publisher;
        while ( $queue ) {
            $queue = $app->db->model( 'queue' )->get_by_key(
              ['model' => 'urlinfo',
               'class' => $proc_id,
               'component' => 'PTPublisher',
               'method' => 'queue_publish_url'] );
            if (! $queue->id ) {
                $queue = null;
                break;
            }
            $url = $app->db->model( 'urlinfo' )->get_by_key( ['file_path' => $queue->data ] );
            if (! $url->id || $url->delete_flag ) {
                $queue->remove();
                continue;
            }
            if (! $parallel ) {
                $app->ctx->stash( 'workspace', $url->workspace );
                $publisher->publish( $url );
                $interval = $queue->interval;
                $queue->remove();
                usleep( $interval );
            } else {
                $publish_urls[] = $url;
                $queue->remove();
            }
        }
        $ts_job->remove();
        $urls = $publish_urls;
    }

    function queue_publish_url ( $app, $queue, &$error ) {
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['file_path' => $queue->data ] );
        if (! $url->id || $url->delete_flag ) {
            return true;
        }
        $publisher = $app->publisher;
        $app->ctx->stash( 'workspace', $url->workspace );
        $publisher->publish( $url );
        return true;
    }

    function publish_queue ( $interval = 0 ) {
        $app = Prototype::get_instance();
        require_once( 'class.PTUtil.php' );
        $db = $app->db;
        $app->get_scheme_from_db( 'urlinfo' );
        $args = ['sort' => 'filemtime', 'direction' => 'descend'];
        $publish_queue_limit = $app->publish_queue_limit
                             ? (int) $app->publish_queue_limit : null;
        if ( $publish_queue_limit ) {
            $args['limit'] = $publish_queue_limit;
        }
        if ( is_object( $app->worker ) ) {
            if ( $publish_queue_offset = $app->worker->publish_queue_offset ) {
                $args['offset'] = $publish_queue_offset;
            }
            if ( $publish_queue_order = $app->worker->publish_queue_order ) {
                $args['direction'] = $publish_queue_order;
            }
        }
        $deleted = 0;
        $counter = 0;
        $deleted_urls = $db->model( 'urlinfo' )->load( ['is_published' => 1, 'delete_flag' => 1] );
        foreach ( $deleted_urls as $deleted_url ) {
            $deleted_url->remove();
            $deleted++;
        }
        $count = $db->model( 'urlinfo' )->count(
          ['publish_file' => 4, 'is_published' => 0, 'class' => 'archive'], $args, 'id' );
        $php_binary = $app->php_binary();
        if ( $php_binary && $app->parallel_publish_queue && ( $count > $app->parallel_publish_queue ) ) {
            $urlinfo = $db->model( 'urlinfo' )->load_iter(
              ['publish_file' => 4, 'is_published' => 0, 'class' => 'archive'], $args, 'id' );
            $urlinfo_ids = $urlinfo->fetchAll( PDO::FETCH_COLUMN );
            if ( empty( $urlinfo_ids ) ) {
                return $deleted;
            }
            $counter = $this->parallel_publish( $urlinfo_ids, (int) $app->parallel_publish_queue );
        } else if ( $app->php_binary && $app->publish_queue_per && ( $count > $app->publish_queue_per ) ) {
            $urlinfo = $db->model( 'urlinfo' )->load_iter(
              ['publish_file' => 4, 'is_published' => 0, 'class' => 'archive'], $args, 'id' );
            $urlinfo_ids = $urlinfo->fetchAll( PDO::FETCH_COLUMN );
            if ( empty( $urlinfo_ids ) ) {
                return $deleted;
            }
            $counter = $this->split_publish( $urlinfo_ids, (int) $app->publish_queue_per );
        } else {
            $urlinfo = $db->model( 'urlinfo' )->load(
              ['publish_file' => 4, 'is_published' => 0, 'class' => 'archive'], $args );
            if ( empty( $urlinfo ) ) {
                return $deleted;
            }
            foreach ( $urlinfo as $obj ) {
                $data = $this->publish( $obj, true );
                if ( $data === false ) {
                    continue;
                }
                $counter++;
                if ( $interval ) {
                    usleep( $interval );
                }
                unset( $obj );
            }
            unset( $urlinfo );
        }
        return $counter + $deleted;
    }

    function split_publish ( $urls, $size = 5 ) {
        $size = (int) $size;
        if (! $size ) $size = 10;
        $counter = count( $urls );
        if ( $counter < $size ) {
            $size = $counter / 3;
            $size = ceil( $size );
        }
        $app = Prototype::get_instance();
        $urlinfo_ids = [];
        $is_object = false;
        foreach ( $urls as $url ) {
            if (! $is_object ) {
                if (! is_object( $url ) && ( ctype_digit( (string) $url ) || is_numeric( $url ) ) ) {
                    $urlinfo_ids = $urls;
                    break;
                }
            }
            $is_object = true;
            $urlinfo_ids[] = $url->id;
        }
        if ( empty( $urlinfo_ids ) ) {
            return 0;
        }
        $url_group = array_chunk( $urlinfo_ids, $size );
        $php_binary = $app->php_binary();
        if (! $php_binary ) {
            $message = $app->translate( "The system environment value '%s' is not specified.", 'php_binary' );
            if ( $app->id == 'Worker' && is_object( $app->worker ) ) {
                $app->worker->log( $message, 'error', $app );
            } else {
                $log = ['level' => 'error', 'category' => 'publisher', 'message' => $message ];
                $log = $app->log( $log );
            }
            $urls = $is_object ? $urls : $app->db->model( 'urlinfo' )->load( ['id' => ['IN' => $urlinfo_ids ] ] );
            foreach ( $urls as $url ) {
                $this->publish( $url );
            }
            return count( $urls );
        }
        $app->request_id = $app->request_id ? $app->request_id : $app->magic();
        $cmd = $php_binary . ' tools' . DS . 'rebuildFiles.php --request_id ' . $app->request_id;
        $cmd = 'cd ' . dirname( $app->pt_path ) . ';' . $cmd;
        $arg = ' archive --urlinfo_ids ';
        $start_time = time();
        foreach ( $url_group as $group ) {
            $proc = $cmd . $arg . implode( ',', $group );
            exec( $proc, $output, $return_var );
            if ( $return_var !== 0 ) {
                $message = $app->translate( 'An error occurred while split publication(%s).', $proc );
                if ( $app->id == 'Worker' && is_object( $app->worker ) ) {
                    $app->worker->log( $message, 'error', $app );
                } else {
                    $log = ['level' => 'error', 'category' => 'publisher', 'message' => $message ];
                    $log = $app->log( $log );
                }
                trigger_error( $message );
                return false;
            }
        }
        unset( $urlinfo_ids, $url_group );
        return $counter;
    }

    function parallel_publish ( $urls, $parallel = 3, $timeout = 1200 ) {
        $app = Prototype::get_instance();
        $urlinfo_ids = [];
        $is_object = false;
        foreach ( $urls as $url ) {
            if (! $is_object ) {
                if (! is_object( $url ) && ( ctype_digit( (string) $url ) || is_numeric( $url ) ) ) {
                    $urlinfo_ids = $urls;
                    break;
                }
            }
            $is_object = true;
            $urlinfo_ids[] = $url->id;
        }
        if ( empty( $urlinfo_ids ) ) {
            return 0;
        }
        $counter = count( $urlinfo_ids );
        $php_binary = $app->php_binary();
        if (! $php_binary ) {
            $message = $app->translate( "The system environment value '%s' is not specified.", 'php_binary' );
            if ( $app->id == 'Worker' && is_object( $app->worker ) ) {
                $app->worker->log( $message, 'error', $app );
            } else {
                $log = ['level' => 'error', 'category' => 'publisher', 'message' => $message ];
                $log = $app->log( $log );
            }
            $urls = $is_object ? $urls : $app->db->model( 'urlinfo' )->load( ['id' => ['IN' => $urlinfo_ids ] ] );
            foreach ( $urls as $url ) {
                $this->publish( $url );
            }
            return count( $urls );
        }
        $size = $counter / $parallel;
        $size = ceil( $size );
        $url_group = array_chunk( $urlinfo_ids, $size );
        $app->request_id = $app->request_id ? $app->request_id : $app->magic();
        $proc_id = $app->magic();
        $cmd = $php_binary . ' ' . dirname( $app->pt_path ) . DS . 'tools' . DS . 'rebuildFiles.php --request_id ' . $app->request_id;
        chdir( $app->pt_dir );
        $arg = ' archive --urlinfo_ids ';
        $start_time = time();
        $max_proc_time = $app->async_max_proc_time ? $start_time + $app->async_max_proc_time : $start_time + $timeout;
        $expires = $max_proc_time ? $start_time + $max_proc_time + 3600 : $start_time + $app->sess_timeout;
        // $descriptorspec = [ ['pipe', 'r'], ['pipe', 'w'], ['pipe', 'w'] ];
        $async_counter = 0;
        $parallel_sleep_time = (int) $app->parallel_sleep_time;
        $processes = [];
        foreach ( $url_group as $group ) {
            $async_counter++;
            $sess_name = $proc_id . '_' . $async_counter . '.pid';
            $async_session = $app->db->model( 'session' )->new(
                          ['name' => $sess_name, 'key' => $proc_id,
                           'kind' => 'AS', 'start' => $start_time, 'expires' => $expires ] );
            $arg = ' --proc_name ' . $sess_name . $arg;
            $async_session->save();
            // $proc = [ $cmd, $arg . implode( ',', $group ) ]; // PHP7.4~
            $proc = $cmd . $arg . implode( ',', $group );
            $process = proc_open( $proc, [], $pipes );
            $processes[] = $process;
            sleep( $parallel_sleep_time );
            exec( $proc, $output, $return_var );
        }
        $timed_out = false;
        $db_caching = $app->db->caching;
        $app->db->caching = false;
        while ( $app->db->model( 'session' )->count(
            ['key' => $proc_id, 'kind' => 'AS'], null, 'id' ) != 0 ) {
            if ( $max_proc_time && ( time() > $max_proc_time ) ) {
                $timed_out = true;
                break;
            }
            sleep( $parallel_sleep_time );
        }
        if ( $timed_out ) {
            $message = $app->translate( 'Background publishing has timed out.' );
            if ( $app->id == 'Worker' && is_object( $app->worker ) ) {
                $app->worker->log( $message, 'error', $app );
            } else {
                $log = ['level' => 'error', 'category' => 'publisher', 'message' => $message ];
                $log = $app->log( $log );
            }
            trigger_error( $message );
            return false;
        }
        foreach ( $processes as $process ) {
            proc_close( $process );
        }
        unset( $urlinfo_ids, $url_group );
        return $counter;
    }

    function parallel_publish_objs ( $published_objs, $parallel_publish_objs = null ) {
        $app = Prototype::get_instance();
        $parallel_publish_objs = $parallel_publish_objs ? $parallel_publish_objs : (int) $app-> parallel_publish_objs;
        $counter = count( $published_objs );
        $php_binary = $app->php_binary();
        if (! $php_binary ) {
            $message = $app->translate( "The system environment value '%s' is not specified.", 'php_binary' );
            if ( $app->id == 'Worker' && is_object( $app->worker ) ) {
                $app->worker->log( $message, 'error', $app );
            } else {
                $log = ['level' => 'error', 'category' => 'publisher', 'message' => $message ];
                $log = $app->log( $log );
            }
            $rebuilt = 0;
            foreach ( $published_objs as $published_id ) {
                list( $pub_model, $pub_id ) = explode( '_', $published_id );
                $publish_object = $app->db->model( $pub_model )->load( (int) $pub_id );
                if ( is_object( $publish_object ) ) {
                    $app->publish_obj( $publish_object );
                    $rebuilt++;
                }
            }
            return $rebuilt;
        }
        if ( $counter > $parallel_publish_objs ) {
            $size = $counter / $parallel_publish_objs;
            $size = ceil( $size );
            $object_group = array_chunk( $published_objs, $size );
            $app->request_id = $app->request_id ? $app->request_id : $app->magic();
            $proc_id = $app->magic();
            $cmd = $php_binary . ' tools' . DS . 'rebuildFiles.php --request_id ' . $app->request_id;
            chdir( $app->pt_dir );
            $arg = ' archive --objects ';
            $start_time = time();
            $max_proc_time = $app->async_max_proc_time ? $start_time + $app->async_max_proc_time : $start_time + 1200;
            $expires = $max_proc_time ? $start_time + $max_proc_time + 3600 : $start_time + $app->sess_timeout;
            $async_counter = 0;
            $parallel_sleep_time = (int) $app->parallel_sleep_time;
            $processes = [];
            foreach ( $object_group as $group ) {
                $async_counter++;
                $sess_name = $proc_id . '_' . $async_counter . '.pid';
                $async_session = $app->db->model( 'session' )->new(
                              ['name' => $sess_name, 'key' => $proc_id,
                               'kind' => 'AS', 'start' => $start_time, 'expires' => $expires ] );
                $arg = ' --proc_name ' . $sess_name . $arg;
                $async_session->save();
                // $proc = [ $cmd, $arg . implode( ',', $group ) ]; // PHP7.4~
                $proc = $cmd . $arg . implode( ',', $group );
                $process = proc_open( $proc, [], $pipes );
                $processes[] = $process;
                if ( $parallel_sleep_time ) sleep( $parallel_sleep_time );
            }
            $timed_out = false;
            $db_caching = $app->db->caching;
            $app->db->caching = false;
            while ( $app->db->model( 'session' )->count(
                ['key' => $proc_id, 'kind' => 'AS'], null, 'id' ) != 0 ) {
                if ( $max_proc_time && ( time() > $max_proc_time ) ) {
                    $timed_out = true;
                    break;
                }
                if ( $parallel_sleep_time ) sleep( $parallel_sleep_time );
            }
            if ( $timed_out ) {
                $message = $app->translate( 'Background publishing has timed out.' );
                if ( $app->id == 'Worker' && is_object( $app->worker ) ) {
                    $app->worker->log( $message, 'error', $app );
                } else {
                    $log = ['level' => 'error', 'category' => 'publisher', 'message' => $message ];
                    $log = $app->log( $log );
                }
                trigger_error( $message );
                return false;
            }
            foreach ( $processes as $process ) {
                proc_close( $process );
            }
            $app->db->caching = $db_caching;
        } else {
            foreach ( $published_objs as $published_id ) {
                list( $pub_model, $pub_id ) = explode( '_', $published_id );
                $publish_object = $app->db->model( $pub_model )->load( (int) $pub_id );
                if ( is_object( $publish_object ) ) {
                    $app->publish_obj( $publish_object );
                }
            }
        }
        return $counter;
    }

    function publish ( &$url, $existing_data = null, &$mtime = null,
                      $obj = null, &$update = false, $force_compile = false ) {
        $app = Prototype::get_instance();
        $destruct_time = $app->destruct_time;
        if ( $destruct_time && $app->fmgr->exists( $url->file_path ) ) {
            if ( filemtime( $url->file_path ) >= $destruct_time ) {
                // Update from other proccess.
                return true;
            }
        }
        $app->core_tags->include_vars = [];
        $force = false;
        if ( is_bool( $existing_data ) && $existing_data === true ) {
            $existing_data = null;
            $force = true;
        }
        if (! $mtime ) $mtime = (int)$url->filemtime;
        $cache_vars = $app->ctx->vars;
        $cache_local_vars = $app->ctx->local_vars;
        $cache_stash = $app->ctx->__stash;
        $tmp_ctx = $app->ctx;
        $ctx = $app->ctx->clone();
        if (! $app->__stash ) {
            $app->__stash = $ctx->__stash;
        } else {
            $ctx->__stash = $app->__stash;
        }
        if ( $current_context = $ctx->stash( 'current_context' ) ) {
            unset( $ctx->__stash['current_context'], $ctx->__stash[ $current_context ] );
        }
        unset( $ctx->__stash['current_template'], $ctx->__stash['current_timestamp'],
               $ctx->__stash['current_timestamp_end'], $ctx->__stash['archive_date_based'],
               $ctx->__stash['current_archive_type'], $ctx->__stash['current_archive_title'],
               $ctx->__stash['current_include_template'], $ctx->__stash['current_container']
        );
        $ctx->stash( 'current_urlinfo', $url );
        if ( $app->id != 'Bootstrapper' ) {
            $ctx->vars = [];
            $ctx->local_vars = [];
            $ctx->params = [];
            $ctx->local_params = [];
            $workspace = $url->workspace;
            if (! $workspace && $url->workspace_id ) {
                $workspace = $app->db->model( 'workspace' )->load( $url->workspace_id );
            }
            $ctx->stash( 'workspace', $workspace );
        }
        $app->init_tags();
        $__stash = $ctx->__stash;
        $object_id = (int) $url->object_id;
        $model = $url->model;
        $table = $app->get_table( $model );
        if ( !$table ) {
            return false;
        }
        $model = $table->name;
        $workspace = $ctx->stash( 'workspace' ) ? $ctx->stash( 'workspace' ) : null;
        $key = $url->key;
        $mapping = null;
        $published = null;
        if ( $object_id && $model ) {
            $obj = $obj ? $obj : $app->db->model( $model )->load( $object_id );
            if ( $obj ) {
                $published = $app->status_published( $obj->_model );
                if ( $app->request_method !== 'GET' && $obj->has_column( 'status' ) ) {
                    if ( $app->id == 'Bootstrapper' && $app->user() ) {
                    } else if ( $published != $obj->status ) {
                        $url->remove();
                        return false;
                    }
                }
                if ( $obj->has_column( 'workspace_id' ) && $obj->workspace ) {
                    $workspace = $obj->workspace;
                }
                if ( $mtime && $obj->has_column( 'modified_on' ) ) {
                    $comp = strtotime( $obj->modified_on );
                    if ( $comp > $mtime ) {
                        $mtime = $comp;
                    }
                }
                if ( $mapping = $url->urlmapping ) {
                    $file_path = $app->build_path_with_map( $obj, $mapping, $table, $url->archive_date );
                    $request_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
                    if ( $request_method == 'GET' && ! $app->query_string() ) {
                        if ( $file_path && ( $url->file_path !== $file_path ) ) {
                            // URL Map or Setting changed.
                            $clone = $app->db->model( 'urlinfo' )->get_by_key(
                                ['file_path' => $file_path, 'workspace_id' => $url->workspace_id ] );
                            $clone_id = null;
                            if ( $clone->id ) {
                                $clone_id = $clone->id;
                            }
                            $clone->set_values( $url->get_values( true ) );
                            $clone->file_path( $file_path );
                            $site_path = $workspace ? $workspace->site_path : $app->site_path;
                            $site_path = rtrim( $site_path, "/\\" );
                            $site_url = $workspace ? $workspace->site_url : $app->site_url;
                            $site_url = rtrim( $site_url, "/\\" );
                            $quoted = preg_quote( $site_path, '/' );
                            $url_url = preg_replace( "/^{$quoted}/", $site_url, $file_path );
                            $url_relative_path = preg_replace( "/^{$quoted}/", '%r', $file_path );
                            $url_relative_url = preg_replace( '!^https{0,1}:\/\/.*?\/!', '/', $url_url );
                            $url_mime_type = PTUtil::get_mime_type( PTUtil::get_extension( $file_path ) );
                            $clone->set_values( [
                                'url' => $url_url,
                                'mime_type' => $url_mime_type,
                                'relative_url' => $url_relative_url,
                                'relative_path' => $url_relative_path,
                                'dirname' => dirname( $url_url ),
                            ] );
                            $clone->id( $clone_id );
                            $clone->save();
                            $url->remove();
                            $url = $clone;
                        } else if (! $file_path ) {
                            $url->remove();
                            return false;
                        }
                    }
                }
            }
        }
        $current_tz = $app->current_tz;
        if ( $app->use_timezone ) {
            if ( $workspace && $workspace->timezone ) {
                $app->date_default_timezone_set( $workspace->timezone );
            } else if (! $workspace ) {
                $app->date_default_timezone_set( $app->timezone );
            }
        }
        $this_mode = $app->mode;
        if ( $url->publish_file == 4 && $url->key === 'rebuild_phase' ) {
            $app->mode = $url->key;
        }
        if ( $obj ) {
            $callback = ['name' => 'pre_view', 'model' => $obj->_model, 'ctx' => $ctx ];
            $app->init_callbacks( $obj->_model, 'pre_view' );
            $app->run_callbacks( $callback, $obj->_model, $obj, $url );
            $ctx->stash( 'current_object', $obj );
            $ctx->vars['current_archive_model'] = $obj->_model;
            $ctx->vars['current_object_id'] = $obj->id;
        } else {
            $this->restore( $app, $__stash, $current_tz );
            $app->mode = $this_mode;
            return false;
        }
        $ts = $url->archive_date;
        $data = null;
        $fmgr = isset( $app->fmgr ) ? $app->fmgr : new $app->file_mgr;
        if ( $urlmapping_id = (int) $url->urlmapping_id ) {
            $mapping = $mapping ? $mapping : $app->db->model( 'urlmapping' )->load( $urlmapping_id );
            if (! $mapping ) {
                $app->mode = $this_mode;
                return false;
            }
            $url->publish_file( $mapping->publish_file );
            if ( $mapping->publish_file == $app->publish_queue && $app->id  == 'Prototype' ) {
                // Queue
                $url->is_published( 0 );
                $this->restore( $app, $__stash, $current_tz );
                $app->mode = $this_mode;
                return $url->save();
            } else if ( ( $mapping->publish_file == 3 || $mapping->publish_file == 6 )
                && $app->id  == 'Prototype' ) {
                // Dynamic or On demand
                if ( $fmgr->exists( $url->file_path ) ) {
                    $fmgr->unlink( $url->file_path, $url );
                }
                $this->restore( $app, $__stash, $current_tz );
                $app->mode = $this_mode;
                return $url->save();
            }
            if ( $mapping && $mapping->template_id ) {
                $template = $app->db->model( 'template' )->load(
                    (int) $mapping->template_id, ['limit' => 1] );
                if ( !$template || $template->text === null || $template->status === null
                    || $template->compiled === null || $template->cache_key === null ) {
                    $app->db->caching = false;
                    $template = $mapping->template;
                    if ( $template === null ) {
                        $template = $app->db->model( 'template' )->get_by_key( ['id' => $mapping->template_id ] );
                    }
                    $app->db->caching = $app->db_caching;
                }
                $text = $app->linked_file === 2 ? $template->_text( $app ) : $template->text;
                $tmpl = $existing_data && is_string( $existing_data ) ? $existing_data : $text;
                if ( $workspace ) {
                    $ctx->stash( 'workspace', $workspace );
                }
                $basename = preg_quote( basename( $app->request_uri ) );
                $relative_url = $app->request_uri;
                $relative_path = preg_replace( "/{$basename}$/", '', $relative_url );
                $ctx->stash( 'current_urlmapping', $mapping );
                $ctx->stash( 'current_context', $model );
                $ctx->stash( 'current_template', $template );
                $ctx->stash( 'current_container', $mapping->container );
                if ( $mtime ) {
                    $comp = strtotime( $template->modified_on );
                    if ( $comp > $mtime ) {
                        $mtime = $comp;
                    }
                }
                $compiled = $template->compiled;
                $cache_key = $template->cache_key;
                if ( $force_compile ) {
                    $cache_key = null;
                } else if ( $existing_data && is_string( $existing_data ) ) {
                    $cache_key = md5( $cache_key );
                    $cache_path = $ctx->compile_dir . $ctx->prefix . '__' . $cache_key . '.php';
                    if ( $fmgr->exists( $cache_path ) ) {
                        $compiled = file_get_contents( $cache_path );
                    } else {
                        $cache_key = null;
                        $compiled = null;
                    }
                }
                if ( $compiled && $cache_key ) {
                    $ctx->compiled[ $cache_key ] = $compiled;
                    $cache_key .= '.view';
                    $ctx->compiled[ $cache_key ] = $compiled;
                }
                $ctx->stash( $model, $obj );
                $ctx->stash( 'current_timestamp', '' );
                $ctx->stash( 'current_timestamp_end', '' );
                $ctx->stash( 'archive_date_based', false );
                $ctx->vars['archive_date_based'] = false;
                $archive_type = '';
                if ( $mapping->model === 'template' ) {
                    $ctx->stash( 'current_archive_type', 'index' );
                    if ( $mapping->template ) {
                        $ctx->stash( 'current_archive_title', $mapping->template->name );
                    }
                } else {
                    $archive_type = $mapping->model;
                    $ctx->stash( 'current_archive_type', $archive_type );
                }
                if ( $mapping->date_based && $ts ) {
                    $ctx->vars['archive_date_based'] = true;
                    $ts = $mapping->db2ts( $ts );
                    $at = $mapping->date_based;
                    $container = $mapping->container;
                    $_obj = $obj;
                    if ( $container ) {
                        $_obj = $app->db->model( $container )->new();
                    }
                    $ctx->stash( 'archive_date_based', $_obj->_model );
                    list( $title, $start, $end ) =
                        $app->title_start_end( $at, $ts, $mapping );
                    $ctx->stash( 'current_timestamp', $start );
                    $ctx->stash( 'current_timestamp_end', $end );
                    $ctx->stash( 'current_archive_title', $title );
                    $date_col = $app->get_date_col( $_obj );
                    $ctx->stash( 'archive_date_based_col', $date_col );
                    $archive_type .= $archive_type ? '-' . strtolower( $at )
                                   : strtolower( $at );
                    $ctx->stash( 'current_archive_type', $archive_type );
                } else {
                    if ( $mapping->model === $obj->_model ) {
                        $primary = $table->primary;
                        $ctx->stash( 'current_archive_title', $obj->$primary );
                    }
                }
                if (! $theme_static = $app->theme_static ) {
                    $theme_static = $app->path . 'theme-static/';
                    $app->theme_static = $theme_static;
                }
                $ctx->vars['publish_type'] = $mapping->publish_file;
                $ctx->vars['theme_static'] = $app->theme_static;
                $ctx->vars['application_dir'] = $app->pt_dir;
                $ctx->vars['application_path'] = $app->path;
                $ctx->vars['current_archive_type'] = $ctx->stash( 'current_archive_type' );
                $ctx->vars['current_archive_title'] = $ctx->stash( 'current_archive_title' );
                $ctx->vars['current_archive_url'] = $url->url;
                if ( $mapping->container && $mapping->publish_file != 6 ) {
                    $container = $app->get_table( $mapping->container );
                    if ( is_object( $container ) ) {
                        $ctx->stash( 'current_container', $container->name );
                        if ( $mapping->skip_empty ) { // Count Children
                            $ctx->stash( $obj->_model, $obj );
                            $cnt_tag = strtolower( $container->plural ) . 'count';
                            $cnt_tag = preg_replace( '/[^a-z0-9]/', '' , $cnt_tag );
                            $count_terms = ['container' => $container->name, 'this_tag' => $cnt_tag ];
                            if ( $app->db->model( $container->name )->has_column( 'workspace_id' ) ) {
                                if (! $mapping->container_scope ) {
                                    $count_terms['include_workspaces'] = 'all';
                                } else if ( $obj->has_column( 'workspace_id' ) ) {
                                    $count_terms['workspace_id'] = (int) $obj->workspace_id;
                                }
                            }
                            $old_context = $ctx->stash( 'current_context' );
                            $ctx->stash( 'current_context', $mapping->model );
                            $count_children = $app->core_tags->hdlr_container_count( $count_terms, $ctx );
                            $ctx->stash( 'current_context', $old_context );
                            if (! $count_children ) {
                                if ( $app->id !== 'Bootstrapper' && $fmgr->exists( $url->file_path ) ) {
                                    $url->remove( false, true );
                                }
                                $this->restore( $app, $__stash, $current_tz );
                                $app->mode = $this_mode;
                                return false;
                            }
                        }
                    }
                }
                $ctx->vars['current_container'] = $ctx->stash( 'current_container' );
                if ( $app->publish_callbacks ) {
                    $app->init_callbacks( 'template', 'pre_publish' );
                    $callback = ['name' => 'pre_publish', 'model' => 'template',
                                 'urlmapping' => $mapping, 'template' => $template,
                                 'urlinfo' => $url, 'object' => $obj, 'ctx' => $ctx->clone() ];
                    $res = $app->run_callbacks( $callback, 'template', $tmpl );
                    if (! $res ) {
                        $this->restore( $app, $__stash, $current_tz );
                        $app->mode = $this_mode;
                        return false;
                    }
                }
                $start_time = microtime( true );
                $file_path = $url->file_path;
                $is_trigger = false;
                if ( $app->publish_callbacks && $app->id !== 'Bootstrapper' ) {
                    $unlink = false;
                    $callback['unlink'] = $unlink;
                    $callback['name'] = 'start_publish';
                    $callback['original'] = clone $obj;
                    $app->run_callbacks( $callback, 'template', $unlink );
                }
                if (! $force && $app->id !== 'Bootstrapper' && $fmgr->exists( $file_path ) ) {
                    $data = $fmgr->get( $file_path );
                    if ( strpos( $data, '<!--/triggersection-->' ) !== false ) {
                        $meta = $app->db->model( 'meta' )->get_by_key(
                                ['model' => 'urlinfo', 'object_id' => $url->id,
                                 'kind' => 'metadata', 'name' => 'triggers'] );
                        if ( $meta->id ) {
                            if ( $app->debug ) {
                                $build_time = isset( $_SERVER['REQUEST_TIME'] ) ? $_SERVER['REQUEST_TIME'] : time();
                                $build_ts = date( 'Y-m-d H:i:s', $build_time );
                            }
                            $is_trigger = true;
                            $trigeer_models = explode( ',', $meta->value );
                            $pattern = '/(<!\-\-triggersection\s[^>]*?>)(.*?)<!\-\-\/triggersection\-\->/si';
                            preg_match_all( $pattern, $data, $matches );
                            if ( is_array( $matches ) && isset( $matches[1] ) ) {
                                $open_tags = $matches[1];
                                $sections = $matches[0];
                                $i = 0;
                                $regex = '!(<' . $ctx->prefix . ':{0,1}triggersection[^>]*?>)(.*?)</' . $ctx->prefix . ':{0,1}triggersection>!si';
                                foreach ( $open_tags as $open_tag ) {
                                    if ( preg_match( '/model="(.*?)"/', $open_tag, $out ) ) {
                                        $model = $out[1];
                                        if ( in_array( $model, $trigeer_models ) || $model == '__any__' ) {
                                            $section = $sections[ $i ];
                                            if ( preg_match( '/template_id="(.*?)"/', $open_tag, $out ) ) {
                                                if ( $out[1] != $template->id ) {
                                                    $module = $app->db->model( 'template' )->load( (int)$out[1] );
                                                    if ( $module ) {
                                                        $tmpl_src = $app->linked_file === 2 ? $module->_text( $app ) : $module->text;
                                                    }
                                                } else {
                                                    $tmpl_src = $app->linked_file === 2 ? $template->_text( $app ) : $template->text;
                                                }
                                                preg_match( '/\sid="(.*?)"/', $open_tag, $identifier );
                                                $identifier = $identifier[1];
                                                if ( $tmpl_src && stripos( $tmpl_src, 'triggersection' ) !== false ) {
                                                    preg_match_all( $regex, $tmpl_src, $inner );
                                                    $mt_tags = $inner[1];
                                                    $j = 0;
                                                    foreach ( $mt_tags as $mt_tag ) {
                                                        preg_match( '/\sid="(.*?)"/', $mt_tag, $mt_identifier );
                                                        $mt_identifier = $mt_identifier[1];
                                                        if ( $identifier == $mt_identifier ) {
                                                            $mtml = $inner[2][ $j ];
                                                            $app->ctx = $ctx;
                                                            $mtml = $ctx->build( $mtml );
                                                            if ( $app->debug ) {
                                                                $open_tag = preg_replace( '/updated="[^"]*?"/', "updated=\"{$build_ts}\"", $open_tag );
                                                            }
                                                            $mtml = "{$open_tag}{$mtml}<!--/triggersection-->";
                                                            $data = str_replace( $section, $mtml, $data );
                                                        }
                                                        $j++;
                                                    }
                                                }
                                            }
                                        }
                                        $i++;
                                    }
                                }
                            }
                            $meta->remove();
                        }
                    }
                }
                $ctx->template_paths = [];
                $app->ctx = $ctx;
                $data = $is_trigger ? $data : $ctx->build( $tmpl, false, $cache_key );
                if ( $app->performance_logging && $app->id !== 'Bootstrapper' ) {
                    $build_time = microtime( true ) - $start_time;
                    if ( $app->performance_logging_threshold < $build_time ) {
                        $build_time = round( $build_time, 4 );
                        $tmap = $app->db->model( 'urlmapping' )->load( $url->urlmapping_id );
                        if ( $tmap ) {
                            $template = $tmap->template;
                            $tmpl_name = $template->name;
                            $tmpl_wsid = $url->workspace_id;
                            $msg = "{$file_path}\t{$build_time}\tworkspace_id={$tmpl_wsid}"
                                 . "\tmodel=" . $url->model . "\tview={$tmpl_name}\tpublish_file="
                                 . $tmap->publish_file;
                            // if ( $app->id == 'Worker' ) echo $msg, PHP_EOL;
                            error_log( $app->date( 'Y-m-d H:i:s T' ) . "\t" . $msg . PHP_EOL, 3,
                                       $app->log_dir . DS . 'performance.log' );
                        }
                    }
                }
                if ( $app->publish_callbacks ) {
                    $app->init_callbacks( 'template', 'post_rebuild' );
                    $callback['name'] = 'post_rebuild';
                    $app->run_callbacks( $callback, 'template', $tmpl, $data );
                }
                $app->ctx->vars = $cache_vars;
                $app->ctx->local_vars = $cache_local_vars;
                $app->ctx->__stash = $cache_stash;
                if ( ( ( $app->id == 'Prototype' || $app->id == 'RESTfulAPI' ) && $mapping->publish_file == 1 ) || // Static
                   ( $mapping->publish_file == 2 && $app->request_method != 'GET' ) || // Delayed
                   ( $app->id == 'Bootstrapper' && $app->request_method == 'GET' // On demand
                    && $mapping->publish_file == 3 && !$app->user() && !$app->query_string() ) ||
                    ( $app->id == 'Worker' && // Worker
                    ( $mapping->publish_file == 1 || $mapping->publish_file == 2
                      || ( $mapping->publish_file != 6 && $force === true ) ) ) ) {
                    // Clean up old urlinfo
                    $continue_output = true;
                    if ( $obj->has_column( 'status' ) ) {
                        if ( $published && $obj->status != $published ) {
                            $continue_output = false;
                        }
                    }
                    if ( $continue_output )
                  {
                    if ( $url->object_id && $url->model && $url->class === 'archive' ) {
                        $terms = ['object_id' => $url->object_id, 'model' => $url->model,
                                  'class' => 'archive', 'archive_type' => $url->archive_type,
                                  'urlmapping_id' => $url->urlmapping_id ];
                        $terms['id'] = ['!=' => $url->id ];
                        if ( $url->archive_date ) {
                            $terms['archive_date'] = $url->archive_date;
                        }
                        $old_uis = $app->db->model( 'urlinfo' )->load( $terms );
                        foreach ( $old_uis as $old_ui ) {
                            $old_ui->remove();
                        }
                    }
                    $md5 = $app->comp_url_md5 ? $url->md5 : null;
                    if (! $md5 && $fmgr->exists( $file_path ) ) {
                        $md5 = md5_file( $file_path );
                    }
                    $hash = md5( $data );
                    if ( $md5 != $hash || !$fmgr->exists( $file_path ) ) {
                        $fmgr->put( $url->file_path, $data, $url );
                        if ( $md5 != $hash ) {
                            $url->md5( $hash );
                            $update = true;
                        } else {
                            // For If-Modified-Since.
                            touch( $url->file_path, $url->filemtime );
                        }
                        if ( $app->shared_background_publishing ) {
                            // Remove queue_publish_url.
                            $queues = $app->db->model( 'queue' )->load(
                                ['model' => 'urlinfo',
                                 'key' => md5( $url->file_path ),
                                 'component' => 'PTPublisher',
                                 'method' => 'queue_publish_url'] );
                            if (! empty( $queues ) ) {
                                $app->db->model( 'queue' )->remove_multi( $queues );
                            }
                        }
                    }
                    if (! $url->mime_type ) {
                        $extension = PTUtil::get_extension( $file_path );
                        $mime_type = PTUtil::get_mime_type( $extension );
                        $url->mime_type( $mime_type );
                        $update = true;
                    }
                    if (! $url->is_published ) {
                        $url->is_published( 1 );
                        $update = true;
                    }
                    if ( $url->publish_file == 4 && $url->key === 'rebuild_phase' ) {
                        $url->key( '' );
                        $update = true;
                    }
                    if (! $url->was_published ) {
                        $url->was_published( 1 );
                        $update = true;
                    }
                    if ( ( $md5 != $hash ) && $app->publish_callbacks ) {
                        $app->init_callbacks( 'template', 'post_publish' );
                        $callback['name'] = 'post_publish';
                        $callback['urlinfo'] = $url;
                        $app->run_callbacks( $callback, 'template', $tmpl, $data );
                    }
                  }
                }
                if ( $update ) {
                    $url->save();
                }
            }
            $this->restore( $app, $__stash, $current_tz );
            $app->ctx = $tmp_ctx;
            $app->mode = $this_mode;
            return $data;
        }
    }

    public function restore ( $app, $__stash, $current_tz = null ) {
        $app->ctx->__stash = $__stash;
        $app->ctx->vars = [];
        $app->ctx->local_vars = [];
        $app->ctx->params = [];
        $app->ctx->local_params = [];
        if ( $app->use_timezone && $current_tz ) $app->date_default_timezone_set( $current_tz );
    }
}