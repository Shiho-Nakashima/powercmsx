<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
class CacheManager extends PTPlugin {

    public $upgrade_functions = [ ['version_limit' => 1.2, 'method' => 'clear_locale'] ];

    function __construct () {
        parent::__construct();
    }

    function clear_locale ( $app, $plugin, $version, &$errors ) {
        $locale_dir = $this->path() . DS . 'locale' . DS;
        $locales = [];
        PTUTil::file_find( $locale_dir, $locales );
        foreach ( $locales as $locale ) {
            $cache_id = 'component' . DS . 'locale_' . md5( $locale );
            $app->clear_cache( $cache_id );
        }
        return true;
    }

    function manage_cache ( $app ) {
        if (! $app->user->is_superuser ) return $app->error( 'Permission denied.' );
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $ctx = $app->ctx;
        $app_cache = null;
        $query_cache = null;
        $compile_cache = null;
        $driver = null;
        $redis  = false;
        $apcu  = false;
        $sqlite  = false;
        $mysql  = false;
        $can_list = false;
        if ( is_object( $app->cache_driver ) ) {
            if ( get_class( $app->cache_driver->_driver ) === 'PTMemcached' ) {
                $app_cache = 'Memcached';
                $driver = $app->cache_driver;
                $can_list = true;
            } else if ( get_class( $app->cache_driver->_driver ) === 'PTRedis' ) {
                $app_cache = 'Memcached';
                $driver = $app->cache_driver;
                $redis = true;
                $can_list = true;
            } else if ( get_class( $app->cache_driver->_driver ) === 'PTAPCu' ) {
                $app_cache = 'Memcached';
                $driver = $app->cache_driver;
                $apcu = true;
            } else if ( get_class( $app->cache_driver->_driver ) === 'PTMySQL' ) {
                $app_cache = 'Memcached';
                $driver = $app->cache_driver;
                $mysql = true;
                $can_list = true;
            } else if ( get_class( $app->cache_driver->_driver ) === 'PTSQLite' ) {
                $app_cache = 'Memcached';
                $driver = $app->cache_driver;
                $sqlite = true;
                $can_list = true;
            }
        } else if ( $app->cache_dir && is_dir( $app->cache_dir ) ) {
            $app_cache = 'File';
        }
        if ( $app_cache === 'Memcached' ) {
            $query_cache = 'Memcached';
            $driver = $app->cache_driver;
        } else if ( $app->db_cache_dir && is_dir( $app->db_cache_dir ) ) {
            $query_cache = 'File';
        }
        if ( $app_cache === 'Memcached' && !$apcu ) {
            $compile_cache = 'Memcached';
            $driver = $app->cache_driver;
        } else if (! $ctx->force_compile && $ctx->compile_dir ) {
            $compile_cache = 'File';
        }
        $plugin_cache_count = 0;
        $plugin_cache_dir = $app->support_dir . DS . 'cache';
        if ( is_dir( $plugin_cache_dir ) ) {
            $plugin_files = [];
            PTUtil::file_find( $plugin_cache_dir, $plugin_files );
            $plugin_cache_count = count( $plugin_files );
        }
        $all_caches = null;
        if ( $app->param( '_type' ) == 'clear_cache' && $app->request_method === 'POST' ) {
            $app->validate_magic();
            $apache_version = $app->db->model( 'option' )->get_by_key(
                ['kind' => 'config', 'key' => 'apache_version', 'workspace_id' => 0] );
            if ( $apache_version->id ) {
                $apache_version->remove();
            }
            $app->caching = false;
            $ctx->force_compile = true;
            $app->db_caching = false;
            $app->query_cache = false;
            $cache_ids = $app->param( 'cache_id' );
            $cache_labels = [];
            $flush_cache = $app->param( 'flush_cache' );
            if ( is_object( $app->cache_driver ) && $flush_cache &&
                in_array( 'app_cache', $cache_ids ) && in_array( 'compile_cache', $cache_ids ) &&
                in_array( 'query_cache', $cache_ids ) ) {
                $cache_ids = array_flip( $cache_ids );
                unset( $cache_ids['app_cache'], $cache_ids['compile_cache'], $cache_ids['query_cache'] );
                $cache_ids = array_keys( $cache_ids );
                $app->cache_driver->flush();
                $cache_labels[] = $redis ? 'Redis' : 'Memcached';
            }
            foreach ( $cache_ids as $cache_id ) {
                if ( $cache_id == 'app_cache' ) {
                    $cache_labels[] = 'Application cache';
                    if ( $app_cache == 'Memcached' && $driver ) {
                        $pfx = $driver->_prefix;
                        $query_prefix = $pfx . 'queries' . DS;
                        $all_caches = $driver->getAllKeys();
                        if ( $all_caches === false ) {
                            $driver->flush();
                        } else if ( is_array( $all_caches ) ) {
                            foreach ( $all_caches as $cache_key ) {
                                if ( stripos( $cache_key, $pfx ) === 0 ) {
                                    if ( stripos( $cache_key, $query_prefix ) === 0 ) {
                                    } else {
                                        $driver->delete( $cache_key, true );
                                    }
                                }
                            }
                        }
                    }
                    if ( $app->cache_dir && is_dir( $app->cache_dir ) ) {
                        PTUtil::remove_dir( $app->cache_dir, true );
                    }
                } else if ( $cache_id == 'compile_cache' ) {
                    $cache_labels[] = 'Template compile cache';
                    if ( $ctx->compile_dir && is_dir( $ctx->compile_dir ) ) {
                        PTUtil::remove_dir( $ctx->compile_dir, true );
                    }
                    if ( $compile_cache == 'Memcached' && $driver ) {
                        $pfx = $driver->_prefix;
                        $compiled_prefix = $pfx . 'compiled' . DS;
                        $all_caches = isset( $all_caches ) && is_array( $all_caches ) ? $all_caches : $driver->getAllKeys();
                        if ( $all_caches === false ) {
                            $driver->flush();
                        } else if ( is_array( $all_caches ) ) {
                            foreach ( $all_caches as $cache_key ) {
                                if ( stripos( $cache_key, $pfx ) === 0 ) {
                                    if ( stripos( $cache_key, $compiled_prefix ) === 0 ) {
                                        $driver->delete( $cache_key, true );
                                    }
                                }
                            }
                        }
                    }
                } else if ( $cache_id == 'query_cache' ) {
                    $cache_labels[] = 'Database query cache';
                    if (! $driver && $app->db_cache_dir && is_dir( $app->db_cache_dir ) ) {
                        PTUtil::remove_dir( $app->db_cache_dir, true );
                    } else if ( $app_cache == 'Memcached' && $driver ) {
                        $pfx = $driver->_prefix;
                        $query_prefix = $pfx . 'queries' . DS;
                        $all_caches = is_array( $all_caches ) ? $all_caches : $driver->getAllKeys();
                        if ( $all_caches === false ) {
                            $driver->flush();
                        }
                        if ( is_array( $all_caches ) ) {
                            foreach ( $all_caches as $cache_key ) {
                                if ( stripos( $cache_key, $pfx ) === 0 ) {
                                    if ( stripos( $cache_key, $query_prefix ) === 0 ) {
                                        $driver->delete( $cache_key, true );
                                    }
                                }
                            }
                        }
                    }
                } else if ( $cache_id == 'opcache' ) {
                    if ( function_exists( 'opcache_reset' ) ) {
                        $cache_labels[] = 'Opcode cache';
                        opcache_reset();
                    }
                } else if ( $cache_id == 'plugin_cache' ) {
                    $cache_labels[] = "Plugin's cache";
                    if ( is_dir( $plugin_cache_dir ) ) {
                        PTUtil::remove_dir( $plugin_cache_dir, true );
                        $plugin_cache_count = 0;
                    }
                } else if ( $cache_id == 'build_cache' ) {
                    $sessions = $app->db->model( 'session' )->load( ['kind' => 'CH'], null, 'id' );
                    $cache_labels[] = 'Build cache';
                    if (! empty( $sessions ) ) {
                        $app->db->model( 'session' )->remove_multi( $sessions );
                    }
                } else if ( $cache_id == 'view_compiled' ) {
                    $objects = $app->db->model( 'template' )->load( ['rev_type' => 0], [],
                                                'id,text' );
                    if ( count( $objects ) ) {
                        foreach ( $objects as $object ) {
                            $object->save();
                        }
                        $cache_labels[] = 'View Compiled';
                    }
                } else if ( $cache_id == 'urlmap_compiled' ) {
                    $objects = $app->db->model( 'urlmapping' )->load( [], [],
                                                'id,mapping' );
                    if ( count( $objects ) ) {
                        foreach ( $objects as $object ) {
                            $object->save();
                        }
                        $cache_labels[] = 'URL Map Compiled';
                    }
                } else if ( $cache_id == 'user_permissions' ) {
                    $sessions = $app->db->model( 'session' )->load(
                        ['kind' => 'PM', 'name' => 'user_permissions'], null, 'id' );
                    $cache_labels[] = 'User Permissions';
                    if (! empty( $sessions ) ) {
                        $app->db->model( 'session' )->remove_multi( $sessions );
                    }
                } else if ( $cache_id == 'expired_sessions' ) {
                    $sessions = $app->db->model( 'session' )->load(
                        ['kind' => ['!=' => 'PM'], 'name' => ['!=' => 'user_permissions'],
                         'expires' => ['<' => $app->request_time ] ], null, 'id' );
                    $cache_labels[] = 'Expired Sessions';
                    if (! empty( $sessions ) ) {
                        $app->db->model( 'session' )->remove_multi( $sessions );
                    }
                } else if ( $cache_id == 'api_cache' ) {
                    $api_cache = $app->db->model( 'api_cache' )->load( null, null, 'id' );
                    $cache_labels[] = 'API Cache';
                    if (! empty( $api_cache ) ) {
                        $app->db->model( 'api_cache' )->remove_multi( $api_cache );
                    }
                }
            }
            if (!empty( $cache_ids ) || !empty( $cache_labels ) ) {
                if ( in_array( 'compile_cache', $cache_ids ) ) {
                    $app->redirect( $app->admin_url .
                    "?__mode=manage_cache&cache_cleared=1&cache_ids=" . implode( ',', $cache_labels ), true );
                    $app->re_compile();
                }
                $app->redirect( $app->admin_url .
                    "?__mode=manage_cache&cache_cleared=1&cache_ids=" . implode( ',', $cache_labels ) );
                exit();
            }
        }
        $loop_vars = [];
        $memcached_servers = $app->memcached_servers;
        if (! count( $memcached_servers ) ) {
            if ( $redis ) {
                $memcached_servers[] = 'localhost:6379';
            } else {
                $memcached_servers[] = 'localhost:11211:33';
            }
        }
        if ( $apcu || $mysql || $sqlite ) {
            $memcached_servers = [];
        }
        $memcached_servers = implode( ', ', $memcached_servers );
        $app_cache_path = !$driver && is_dir( $app->cache_dir ) ? $app->cache_dir : $memcached_servers;
        if ( $driver && ! $app_cache_path && $app_cache != 'File' ) {
            $app_cache_path = $memcached_servers;
        }
        $query_cache_path = !$driver && is_dir( $app->db_cache_dir )? $app->db_cache_dir : $memcached_servers;
        if ( $driver && ! $query_cache_path && $query_cache != 'File' ) {
            $query_cache_path = $memcached_servers;
        }
        $all_caches = null;
        $app_cache_count = 0;
        $query_cache_count = 0;
        if ( $driver ) {
            $pfx = $driver->_prefix;
            $query_prefix = $pfx . 'queries' . DS;
            $all_caches = $driver->getAllKeys();
            if ( is_array( $all_caches ) ) {
                foreach ( $all_caches as $cache_key ) {
                    if ( stripos( $cache_key, $pfx ) === 0 ) {
                        if ( stripos( $cache_key, $query_prefix ) === 0 ) {
                            $query_cache_count++;
                        } else {
                            $app_cache_count++;
                        }
                    }
                }
            }
        } else if ( !$driver && $app_cache_path && is_dir( $app_cache_path ) ) {
            $app_cache_count = 0;
            $files = [];
            PTUTil::file_find( $app_cache_path, $files );
            foreach ( $files as $file ) {
                if ( PTUtil::get_extension( $file ) == 'php' ) {
                    $app_cache_count++;
                }
            }
        }
        $ctx_cache_count = 0;
        if ( $compile_cache == 'File' ) {
            $files = [];
            PTUTil::file_find( $ctx->compile_dir, $files );
            foreach ( $files as $file ) {
                if ( PTUtil::get_extension( $file ) == 'php' ) {
                    $ctx_cache_count++;
                }
            }
        } else if ( $driver  && $compile_cache == 'Memcached' ) {
            $pfx = $driver->_prefix;
            $compiled_prefix = $pfx . 'compiled' . DS;
            $all_caches = isset( $all_caches ) && is_array( $all_caches ) ? $all_caches : $driver->getAllKeys();
            if ( is_array( $all_caches ) ) {
                foreach ( $all_caches as $cache_key ) {
                    if ( stripos( $cache_key, $pfx ) === 0 ) {
                        if ( stripos( $cache_key, $compiled_prefix ) === 0 ) {
                            $ctx_cache_count++;
                        }
                    }
                }
            }
        }
        if ( !$driver && $query_cache_path && is_dir( $query_cache_path ) ) {
            $query_cache_count = 0;
            $files = [];
            PTUTil::file_find( $app->db_cache_dir, $files );
            foreach ( $files as $file ) {
                if ( PTUtil::get_extension( $file ) == 'php' ) {
                    $query_cache_count++;
                }
            }
        }
        $compile_dir = $ctx->compile_dir;
        $temp_dir = rtrim( $app->temp_dir, '/' );
        $prefix = preg_quote( $temp_dir, '/' );
        if ( strpos( $app_cache_path, $temp_dir ) === 0 ) {
            $app_cache_path = preg_replace( "/^$prefix/", '{temp_dir}', $app_cache_path );
        }
        if ( strpos( $app_cache_path, $temp_dir ) === 0 ) {
            $app_cache_path = preg_replace( "/^$prefix/", '{temp_dir}', $app_cache_path );
        }
        if ( strpos( $compile_dir, $temp_dir ) === 0 ) {
            $compile_dir = preg_replace( "/^$prefix/", '{temp_dir}', $compile_dir );
        }
        if ( strpos( $query_cache_path, $temp_dir ) === 0 ) {
            $query_cache_path = preg_replace( "/^$prefix/", '{temp_dir}', $query_cache_path );
        }
        if ( strpos( $plugin_cache_dir, $temp_dir ) === 0 ) {
            $plugin_cache_dir = preg_replace( "/^$prefix/", '{temp_dir}', $plugin_cache_dir );
        }
        if ( $driver && $compile_cache == 'Memcached' ) {
            $compile_dir = $memcached_servers;
        }
        if ( $redis ) {
            $app_cache = 'Redis';
            $compile_cache = 'Redis';
            $query_cache = 'Redis';
        } else if ( $apcu ) {
            $app_cache = 'APCu';
            $compile_cache = 'File';
            $query_cache = 'APCu';
        } else if ( $mysql ) {
            $app_cache = 'MySQL';
            $compile_cache = 'MySQL';
            $query_cache = 'MySQL';
        } else if ( $sqlite ) {
            $app_cache = 'SQLite';
            $compile_cache = 'SQLite';
            $query_cache = 'SQLite';
        }
        if ( $app_cache || $app_cache_count ) {
            $loop_vars[] = ['name'  => 'app_cache',
                            'label' => $this->translate( 'Application cache' ),
                            'scope' => $app_cache,
                            'path'  => $app_cache_path,
                            'count' => $app_cache_count ];
        }
        if ( $compile_cache ) {
            $loop_vars[] = ['name'  => 'compile_cache',
                            'label' => $this->translate( 'Template compile cache' ),
                            'scope' => $compile_cache,
                            'path'  => $compile_dir,
                            'count' => $ctx_cache_count ];
        }
        if ( $query_cache_count ) {
            $loop_vars[] = ['name'  => 'query_cache',
                            'label' => $this->translate( 'Database query cache' ),
                            'scope' => $query_cache,
                            'path'  => $query_cache_path,
                            'count' => $query_cache_count ];
        }
        if ( function_exists( 'opcache_get_status' ) ) {
            $cache_data = opcache_get_status();
            $cache_cnt  = $cache_data && isset( $cache_data['scripts'] )
                        ? count( $cache_data['scripts'] ) : 0;
            $loop_vars[] = ['name'  => 'opcache',
                            'label' => $this->translate( 'OPCache' ),
                            'scope' => $this->translate( 'Shared Memory' ),
                            'path'  => '',
                            'count' => $cache_cnt ];
        }
        $loop_vars[] = ['name'  => 'plugin_cache',
                        'label' => $this->translate( "Plugin's cache" ),
                        'scope' => $this->translate( 'File' ),
                        'path'  => $plugin_cache_dir,
                        'count' => $plugin_cache_count ];
        $sessions = $app->db->model( 'session' )->count( ['kind' => 'CH'], null, 'id' );
        $loop_vars[] = ['name'  => 'build_cache',
                        'label' => $this->translate( 'Build cache' ),
                        'scope' => $this->translate( 'Database' ),
                        'path'  => '',
                        'count' => $sessions ];
        $template_cnt = $app->db->model( 'template' )->count( ['rev_type' => 0], [], 'id' );
        $loop_vars[] = ['name'  => 'view_compiled',
                        'label' => $this->translate( 'View Compiled' ),
                        'scope' => $this->translate( 'Database' ),
                        'path'  => '',
                        'count' => $template_cnt ];
        $urlmap_cnt = $app->db->model( 'urlmapping' )->count( null, [], 'id' );
        $loop_vars[] = ['name'  => 'urlmap_compiled',
                        'label' => $this->translate( 'URL Map Compiled' ),
                        'scope' => $this->translate( 'Database' ),
                        'path'  => '',
                        'count' => $urlmap_cnt ];
        $sessions = $app->db->model( 'session' )->count( ['kind' => 'PM', 'name' => 'user_permissions'], null, 'id' );
        $loop_vars[] = ['name'  => 'user_permissions',
                        'label' => $this->translate( 'User Permissions' ),
                        'scope' => $this->translate( 'Database' ),
                        'path'  => '',
                        'count' => $sessions ];
        $expired_sessions = $app->db->model( 'session' )->count(
            ['kind' => ['!=' => 'PM'], 'name' => ['!=' => 'user_permissions'],
             'expires' => ['<' => $app->request_time ] ], null, 'id' );
        $loop_vars[] = ['name'  => 'expired_sessions',
                        'label' => $this->translate( 'Expired Sessions' ),
                        'scope' => $this->translate( 'Database' ),
                        'path'  => '',
                        'count' => $expired_sessions ];
        $table = $app->get_table( 'api_cache' );
        if ( $table ) {
            $api_cache = $app->db->model( 'api_cache' )->count();
            $loop_vars[] = ['name'  => 'api_cache',
                            'label' => $this->translate( 'API Cache' ),
                            'scope' => $this->translate( 'Database' ),
                            'path'  => '',
                            'count' => $api_cache ];
        }
        $ctx->vars['cache_driver'] = $app_cache;
        $ctx->vars['can_list'] = $can_list;
        $ctx->vars['cache_loop'] = $loop_vars;
        $ctx->vars['page_title'] = $this->translate( 'Manage Cache' );
        return $app->build_page( 'manage_cache.tmpl' );
    }

    function cachemanager_manage_cache ( $app ) {
        if (! $app->user->is_superuser ) return $app->error( 'Permission denied.' );
        $app_cache = null;
        $driver = null;
        if ( is_object( $app->cache_driver ) ) {
            $driver = $app->cache_driver;
            if ( get_class( $app->cache_driver->_driver ) === 'PTMemcached' ) {
                $app_cache = 'Memcached';
            } else if ( get_class( $app->cache_driver->_driver ) === 'PTRedis' ) {
                $app_cache = 'Redis';
            } else if ( get_class( $app->cache_driver->_driver ) === 'PTMySQL' ) {
                $app_cache = 'MySQL';
            } else if ( get_class( $app->cache_driver->_driver ) === 'PTSQLite' ) {
                $app_cache = 'SQLite';
            } else {
                // APCu
                return $app->error( 'Invalid request.' );
            }
        } else if ( $app->cache_dir && is_dir( $app->cache_dir ) ) {
            return $app->error( 'Invalid request.' );
        }
        $prefix = preg_quote( $driver->_prefix, '/' );
        if ( $app->param( '_type' ) && $app->param( '_type' ) === 'delete' ) {
            if ( $app->request_method !== 'POST' ) {
                return $app->error( 'Invalid request.' );
            }
            $app->validate_magic();
            $merged_params = $app->param( 'merged_params' );
            $paths = [];
            if ( $merged_params ) {
                $paths = json_decode( $merged_params, true );
            }
            if (! is_array( $paths ) ) {
                return $app->error( 'Invalid request.' );
            }
            foreach ( $paths as $keyname ) {
                $driver->delete( $keyname );
            }
            if ( count( $paths ) ) {
                $counter = count( $paths );
                $app->redirect( $app->admin_url .
                "?__mode=cachemanager_manage_cache&cache_cleared={$counter}" );
            }
        }
        $all_caches = $driver->getAllKeys();
        if ( $query = $app->param( 'query' ) ) {
            foreach ( $all_caches as $idx => $keyname ) {
                if ( stripos( $keyname, $query ) === false ) {
                    unset( $all_caches[ $idx ] );
                }
            }
            $all_caches = array_values( $all_caches );
        }
        $ctx = $app->ctx;
        $ctx->vars['prefix'] = $prefix;
        $ctx->vars['total_result'] = count( $all_caches );
        $ctx->vars['list_all_cache'] = $all_caches;
        $ctx->vars['page_title'] = $this->translate( 'Manage Cache' );
        $ctx->vars['page_title'] .= " ({$app_cache})";
        $ctx->vars['cache_cleared'] = (int) $app->param( 'cache_cleared' );
        return $app->build_page( 'list_all_cache.tmpl' );
    }
}