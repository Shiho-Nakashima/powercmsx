<?php

class PTUpgrader {

    protected $reserved = ['magic_token', 'tags', 'additional_tags', 'created_on', 'depth', 'new',
                           'taxonomies', 'additional_taxonomies', 'created_by', 'workspace_id', 'order',
                           'status', 'modified_on', 'modified_by', 'published_on', 'unpublished_on', 'user_id',
                           'root_id', 'load', 'retry', 'in_stmt', 'get_by_key', 'count', 'has_column',
                           'count_group_by', 'load_iter', 'save', 'update_multi', 'sort', 'direction',
                           'remove_multi', 'update', 'remove', 'delete', 'set_scheme_from_json',
                           'get_scheme', 'create_table', 'column_values', 'column_names', 'glue',
                           'set_values', 'get_values', 'next_prev', 'upgrade', 'array_compare',
                           'check_upgrade', 'get_diff', 'validation', 'serialize', 'date2db', 'ids',
                           'time2db', 'ts2db', 'db2ts', 'basename', 'has_deadline', 'sort_by', 'sort_order',
                           'rev_type', 'rev_object_id', 'rev_note', 'rev_changed', 'uuid', 'has_column',
                           'rev_diff', 'workspace_id', 'allow_comment', 'form_id', 'limit', 'offset',
                           'attachmentfiles', 'previous_owner', 'show_activity', 'has_assets', 'extra_path',
                           'direct_edit', 'need_rebuild', 'workspace_ids', 'include_workspaces',
                           'ignore_archive_context', 'exclude_workspaces', 'include_this', 'table_id',
                           'timestamp', 'timestamp_end', 'thumbnail', 'permalink', 'search',
                           'serch_type', 'serch_cols', 'this_tag', 'lastn', 'can_access'];

    private $reserved_models
                        = ['index', 'blob', 'activity', 'searchword', 'image', 'form_footer', 'restfulapi',
                           'member', 'user_dic', 'boilerplate', 'keyword', 'app_property', 'plugin_skeleton',
                           'emailboilerplate', 'emailnewsletter', 'emailsubscriber', 'displayoption',
                           'upload_file', 'mt_dic', 'archive', 'block'];

    private $print_state= false;

    protected $ver3_0_3 = false;

    private $unchange_disp_upgrade = false;

    protected function core_upgrade_functions ( $version ) {
        if (! $version ) return [];
        $functions = [
            'upgrade_status' => ['component' => 'PTUpgrader',
                                 'method'    => 'upgrade_status',
                                 'version_limit' => '0.1'],
            'set_preferred'  => ['component' => 'PTUpgrader',
                                 'method'    => 'set_preferred',
                                 'version_limit' => '1.001'],
            'set_workspace'  => ['component' => 'PTUpgrader',
                                 'method'    => 'set_workspace',
                                 'version_limit' => '2.01'],
            'update1006'     => ['component' => 'PTUpgrader',
                                 'method'    => 'update1006',
                                 'version_limit' => '1.006'],
            'update_perm'    => ['component' => 'PTUpgrader',
                                 'method'    => 'update_perm',
                                 'version_limit' => '1.104'],
            'set_hierarchy'  => ['component' => 'PTUpgrader',
                                 'method'    => 'set_hierarchy',
                                 'version_limit' => '1.016'],
            'set_session_key'=> ['component' => 'PTUpgrader',
                                 'method'    => 'set_session_key',
                                 'version_limit' => '1.017'],
            'atfile_menu_pos'=> ['component' => 'PTUpgrader',
                                 'method'    => 'atfile_menu_pos',
                                 'version_limit' => '1.102'],
            'update_perm_11' => ['component'  => 'PTUpgrader',
                                 'method'    => 'update_perm',
                                 'version_limit' => '1.112'],
            'reset_mime_type'=> ['component' => 'PTUpgrader',
                                 'method'    => 'reset_mime_type',
                                 'version_limit' => '2.017'],
            'set_users_draft'=> ['component' => 'PTUpgrader',
                                 'method'    => 'set_users_draft',
                                 'version_limit' => '2.106'],
            'upgrade_role'   => ['component' => 'PTUpgrader',
                                 'method'    => 'upgrade_role',
                                 'version_limit' => '2.3002'],
            'upgrade_attach' => ['component' => 'PTUpgrader',
                                 'method'    => 'upgrade_attach',
                                 'version_limit' => '2.3004'],
            'add_field_type' => ['component' => 'PTUpgrader',
                                 'method'    => 'add_field_type',
                                 'version_limit' => '2.5400'],
            'set_publishfile'=> ['component' => 'PTUpgrader',
                                 'method'    => 'set_publishfile',
                                 'version_limit' => '2.5800'],
            'update_menus'   => ['component' => 'PTUpgrader',
                                 'method'    => 'update_menus',
                                 'version_limit' => '2.5810'],
            'set_field_value'=> ['component' => 'PTUpgrader',
                                 'method'    => 'set_field_value',
                                 'version_limit' => '2.5828'],
            'to_normalize'   => ['component' => 'PTUpgrader',
                                 'method'    => 'to_normalize',
                                 'version_limit' => '2.6'],
            'repair_thumbnails'=> ['component' => 'PTUpgrader',
                                 'method'    => 'repair_thumbnails',
                                 'version_limit' => '2.72',
                                 'version3_limit' => '3.11'],
            'remove_timezone'=> ['component' => 'PTUpgrader',
                                 'method'    => 'remove_timezone',
                                 'version_limit' => '2.72',
                                 'version3_limit' => '3.11'],
            'change_modified_by'=> ['component' => 'PTUpgrader',
                                 'method'    => 'change_modified_by',
                                 'version_limit' => '2.72',
                                 'version3_limit' => '3.2'],
            'themes_to_relative'=> ['component' => 'PTUpgrader',
                                 'method'    => 'themes_to_relative',
                                 'version_limit' => '2.752',
                                 'version3_limit' => '3.52'],
            'validation_password'=> ['component' => 'PTUpgrader',
                                 'method'    => 'validation_password',
                                 'version_limit' => '2.755',
                                 'version3_limit' => '3.55'],
        ];
        $app = Prototype::get_instance();
        $app_version = $app->app_version;
        $app_version = preg_replace( '/\..*$/', '', $app_version );
        if ( ( $app_version == 3 && $version < 3.03 ) || ( $app_version == 2 && $version < 2.6 ) ) {
            $setting = $app->db->model( 'option' )->get_by_key( ['kind' => 'plugin', 'key' => 'fileuploader'] );
            if ( $setting->number ) {
                $this->ver3_0_3 = true;
            }
        }
        $upgrade_functions = [];
        foreach ( $functions as $func ) {
            $version_limit = $func['version3_limit'] ?? $func['version_limit'];
            if ( $app_version == 2 ) {
                $version_limit = $func['version_limit'];
            }
            if ( $version_limit > $version ) {
                $upgrade_functions[] = $func;
            }
        }
        return $upgrade_functions;
    }

    function __destruct() {
        if ( $this->ver3_0_3 ) {
            $app = Prototype::get_instance();
            $component = $app->component( 'FileUploader' );
            if ( $component && method_exists( $component, 'activate' ) ) {
                $plugin = new PTPlugin();
                $errors = [];
                $component->activate( $app, $plugin, 1, $errors );
                $phrase = $app->db->model( 'phrase' )->get_by_key( ['phrase' => 'Videos (Multiple)', 'lang' => 'ja'] );
                if (! $phrase->id ) {
                    $phrase->trans( 'ビデオ (複数)' );
                    $phrase->component( 'fileuploader' );
                    $phrase->save();
                }
            }
        }
    }

    function worker_upgrade_functions ( $version ) {
        if (! $version ) return [];
        $functions = [
            'tmpl_last_compiled' => ['component' => 'PTUpgrader',
                                     'method'    => 'tmpl_last_compiled',
                                     'version_limit' => '2.019'],
            'clear_thumbnail_meta'=>['component' => 'PTUpgrader',
                                     'method'    => 'clear_thumbnail_meta',
                                     'version_limit' => '3.0.8'],
            'set_default_models' => ['component' => 'PTUpgrader',
                                     'method'    => 'set_default_models',
                                     'version_limit' => '2.75',
                                     'version3_limit' => '3.5'],
        ];
        $app = Prototype::get_instance();
        $app_version = $app->app_version;
        $app_version = preg_replace( '/\..*$/', '', $app_version );
        $upgrade_functions = [];
        foreach ( $functions as $func ) {
            $version_limit = $func['version3_limit'] ?? $func['version_limit'];
            if ( $app_version == 2 ) {
                $version_limit = $func['version_limit'];
            }
            $comp = version_compare( $version_limit, $version );
            if ( $comp === 1 ) {
                $upgrade_functions[] = $func;
            }
        }
        return $upgrade_functions;
    }

    function start_upgrade ( $app, $model = null ) {
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        if ( $model ) {
            $app->clear_cache( $model . DS );
        }
        $app->db->clear_cache();
    }

    function upgrade () {
        $app = Prototype::get_instance();
        $app->cache_driver = null;
        $app->caching = false;
        $app->db->query_cache = false;
        $app->db->caching = false;
        $app->db->json_cache = false;
        $app->db->in_upgrade = true;
        $app->ctx->force_compile = true;
        $tables = $app->db->db->query( 'show tables' );
        $tables = $tables->fetchAll( PDO::FETCH_COLUMN );
        if ( count( $tables ) > 10 ) {
            $app->error( 'Invalid request.' );
        }
        ignore_user_abort( true );
        $tmpl = TMPL_DIR . 'upgrade.tmpl';
        $ctx = $app->ctx;
        $ctx->vars['language'] = $app->language;
        if ( $app->param( '_type' ) === 'install' ) {
            $ctx->vars['page_title'] = $app->translate( 'Install' );
        } else {
            $ctx->vars['page_title'] = $app->translate( 'Upgrade' );
        }
        if ( $app->request_method === 'POST' ) {
            if ( $app->param( '_type' ) === 'install' ) {
                /*
                foreach ( $tables as $table ) {
                    if ( $table == 'mt_option' ) {
                        $drop = "DROP TABLE {$table}";
                        $app->db->db->query( $drop );
                    }
                }
                */
                $this->start_upgrade( $app );
                $app->clear_all_cache( false, null, true );
                $name = $app->param( 'name' );
                $pass = $app->param( 'password' );
                $verify = $app->param( 'password-verify' );
                $email = $app->param( 'email' );
                $appname = $app->param( 'appname' );
                $activation_code = $app->param( 'activation_code' );
                $site_path = rtrim( $app->param( 'site_path' ), DS );
                if ( $app->site_base_path ) {
                    $site_base_path = rtrim( $app->site_base_path, DS ) . DS;
                    $site_path = $site_base_path . rtrim( $app->sanitize_dir( $site_path ), DS );
                }
                $site_url = $app->param( 'site_url' );
                $language = $app->param( 'sys_language' );
                $extra_path = $app->param( 'extra_path' );
                $asset_publish = $app->param( 'asset_publish' );
                $copyright = $app->param( 'copyright' );
                $system_email = $app->param( 'system_email' );
                $two_factor_auth = $app->param( 'two_factor_auth' );
                $lockout_limit = $app->param( 'lockout_limit' );
                $lockout_interval = $app->param( 'lockout_interval' );
                $ip_lockout_limit = $app->param( 'ip_lockout_limit' );
                $ip_lockout_interval = $app->param( 'ip_lockout_interval' );
                $tmpl_markup = $app->param( 'tmpl_markup' );
                $barcolor = $app->param( 'barcolor' );
                $bartextcolor = $app->param( 'bartextcolor' );
                $errors = [];
                if (!$appname || !$site_url || !$system_email || !$site_path ) {
                    $errors[] = $app->translate(
                        'App Name, System Email Site URL and Site Path are required.' );
                }
                if (!$name || !$pass || !$email ) {
                    $errors[] = $app->translate( 'Username, Password and Email are required.' );
                } else {
                    if (!$app->is_valid_email( $system_email, $msg ) ) {
                        $errors[] = $msg;
                    }
                    if (!$app->is_valid_password( $pass, $verify, $msg ) ) {
                        $errors[] = $msg;
                    }
                    if (!$app->is_valid_email( $email, $msg ) ) {
                        $errors[] = $msg;
                    }
                    if ( $site_url && !$app->is_valid_url( $site_url, $msg ) ) {
                        $errors[] = $msg;
                    }
                    if (! preg_match( '/\/$/', $site_url ) ) {
                        $site_url .= '/';
                    }
                    $app->sanitize_dir( $extra_path );
                    if ( $extra_path &&
                        !$app->is_valid_property( str_replace( '/', '', $extra_path ) ) ) {
                        $errors[] = $app->translate(
                            'Upload Path contains an illegal character.' );
                    }
                }
                if (! empty( $errors ) ) {
                    $app->assign_params( $app, $ctx, true );
                    $ctx->vars['error'] = join( "\n", $errors );
                    echo $ctx->build_page( $tmpl );
                    exit();
                }
                while ( ob_get_level() > 0 ) {
                    ob_end_flush();
                }
                $tmpl = TMPL_DIR . 'install.tmpl';
                echo $ctx->build_page( $tmpl );
                $msg = $app->translate( 'Start Install...' );
                echo str_pad( ' ', 4096 ) . "<br />\n";
                echo "<script>$('#print').html( $('#print').html() + '{$msg}' + '<hr>' );</script>";
                flush();
                // ob_start( 'mb_output_handler' );
                $this->print_state = true;
                $default_widget = TMPL_DIR . 'import' . DS . 'default_widget.tmpl';
                $default_widget = file_get_contents( $default_widget );
                if ( $app->ignore_default_widget ) {
                    $default_widget = "<mt:ignore>{$default_widget}</mt:ignore>";
                }
                $db = $app->db;
                $cfgs = ['appname'    => $appname,
                         'activation_code'=> $activation_code,
                         'site_path'  => $site_path,
                         'site_url'   => $site_url,
                         'extra_path' => $extra_path,
                         'language'   => $language,
                         'copyright'  => $copyright,
                         'system_email' => $system_email,
                         'asset_publish' => $asset_publish,
                         'two_factor_auth' => $two_factor_auth,
                         'lockout_limit' => $lockout_limit,
                         'lockout_interval' => $lockout_interval,
                         'ip_lockout_interval' => $ip_lockout_interval,
                         'ip_lockout_limit' => $ip_lockout_limit,
                         'default_widget' => $default_widget,
                         'tmpl_markup' => $tmpl_markup,
                         'barcolor' => $barcolor,
                         'bartextcolor' => $bartextcolor,
                         'app_version' => $app->app_version ];
                $password = $app->param( 'password' );
                $language = $app->param( 'language' );
                $nickname = $app->param( 'nickname' );
                $password = password_hash( $password, PASSWORD_BCRYPT );
                $db->upgrader = true;
                $tbl_count = $this->setup_db( true );
                $app->set_config( $cfgs );
                $plugin_models = $this->plugin_models( true );
                if (! empty( $plugin_models ) ) {
                    $m_items = [];
                    foreach ( $plugin_models as $m_dir => $props ) {
                        foreach ( $props as $prop ) {
                            $arr = [ $prop['component'], $m_dir ];
                            $uniqkey = json_encode( $arr );
                            $models = isset( $m_items[ $uniqkey ] )
                                    ? $m_items[ $uniqkey ] : [];
                            $models[] = $prop['model'];
                            $m_items[ $uniqkey ] = $models;
                        }
                    }
                    if (! empty( $m_items ) ) {
                        foreach ( $m_items as $m_key => $m_item ) {
                            list( $component, $m_dir ) = json_decode( $m_key, true );
                            $this->setup_db( true, $component, $m_item, $m_dir );
                        }
                    }
                }
                $user = $db->model( 'user' )->get_by_key( ['name' => $name ] );
                $user->name( $name );
                $user->password( $password );
                $user->email( $email );
                $user->nickname( $nickname );
                $user->language( $language ); // White List Check
                $user->is_superuser( 1 );
                $user->modified_on( date( 'YmdHis' ) );
                $user->created_on( date( 'YmdHis' ) );
                $user->status( 2 );
                $user->save();
                $this->install_field_types( $app );
                $this->install_question_types( $app );
                $message = $app->translate( "PowerCMS X has been installed and create first user '%s'.",
                                            $user->name );
                $app->log( ['message'  => $message,
                            'category' => 'install',
                            'model'    => 'user',
                            'object_id'=> $user->id,
                            'level'    => 'info'] );
                $msg = $app->translate( "Create %s tables.", $tbl_count );
                echo "<script>$('#print').html( $('#print').html() + '<hr>' + '{$msg}' + '<br>' );</script>";
                echo "<script>$('#print').html( $('#print').html() + '<hr>' + '{$message}' + '<br>' );</script>";
                echo '<script>var $target = $(\'#print\');';
                echo '$target.scrollTop($target[0].scrollHeight);</script>';
                echo "<script>$('#move_login').show();</script>";
                ob_flush();
                flush();
                $app->clear_all_cache( true, false );
                if ( $app->assets_c && is_dir( $app->assets_c ) ) {
                    $app->app_protect = false;
                    PTUtil::remove_dir( $app->assets_c, true );
                }
                exit();
            }
        } else {
            $app->clear_all_cache( false, false );
            $path = $app->path;
            if (! $path ) {
                $path = $app->path();
                $search = preg_quote( $app->document_root, '/' );
                $path = preg_replace( "/^$search/", '', $path );
            }
            $path = rtrim( $path, '/' );
            $path = str_replace( '/', DS, $path );
            $_path = str_replace( DS, '/', $path );
            $ctx->vars['site_url'] = $app->base . '/';
            if (! $app->site_base_path ) {
                $ctx->vars['site_path'] = $app->document_root;
            }
            $ctx->vars['extra_path'] = 'assets/';
            $ctx->vars['language'] = $app->language;
            $ctx->vars['sys_language'] = $app->language;
        }
        echo $ctx->build_page( $tmpl );
        exit();
    }

    function upgrade_scheme ( $name ) {
        $app = Prototype::get_instance();
        $this->start_upgrade( $app, $name );
        $db = $app->db;
        $table = $app->get_table( $name );
        if (! $table ) return;
        $table_id =  $table->id;
        $columns = $db->model( 'column' )->load( ['table_id' => $table_id,
                                                  'type' => ['not' => 'relation'] ] );
        list( $column_defs, $indexes ) = [ [], [] ];
        foreach ( $columns as $column ) {
            $col_name = $column->name;
            $props = [];
            $props['type'] = $column->type === 'int' ? 'bigint' : $column->type;
            if ( $column->type == 'decimal' ) {
                $props['type'] = $column->type . '(' . $column->size . ')';
            }
            if ( $column->size ) {
                if ( $props['type'] === 'bigint' ) {
                    $props['size'] = 20;
                } else {
                    $props['size'] = $column->size;
                }
            }
            $not_null = $column->not_null;
            if ( $not_null ) $props['not_null'] = 1;
            if ( $column->default !== null ) {
                if ( $column->type != 'text' && $column->type != 'blob' ) {
                    // TODO::datetime or int validation
                    $props['default'] = $column->default;
                }
            }
            $column_defs[ $column->name ] = $props;
            if ( $column->is_primary ) $indexes['PRIMARY'] = $col_name;
            if ( $column->index ) $indexes[ $col_name ] = $col_name;
        }
        $model  = $db->model( $name );
        $scheme = $model->get_scheme(
            $model->_model, $model->_table, $model->_colprefix, true );
        $comp_defs = $scheme['column_defs'] ? $scheme['column_defs'] : [];
        $comp_idxs = $scheme['indexes'];
        foreach ( $column_defs as $key => $props ) {
            // if ( isset( $column_defs[ $key ]['default'] ) && !$column_defs[ $key ]['default'] ) {
            unset( $column_defs[ $key ]['default'] );
            // }
            if ( $column_defs[ $key ]['type'] === 'relation' ) {
                unset( $column_defs[ $key ] );
            }
        }
        foreach ( $comp_defs as $key => $props ) {
            // if ( isset( $comp_defs[ $key ]['default'] ) && !$comp_defs[ $key ]['default'] ) {
            unset( $comp_defs[ $key ]['default'] );
            // }
        }
        $upgrade = $model->array_compare( $column_defs, $comp_defs );
        $upgrade_idx = $model->array_compare( $indexes, $comp_idxs );
        if ( $upgrade || $upgrade_idx ) {
            $upgrade_cols = $model->get_diff( $column_defs, $comp_defs );
            $upgrade_idxs = $model->get_diff( $indexes, $comp_idxs );
            if ( isset( $upgrade_cols['delete'] ) && !empty( $upgrade_cols['delete'] ) ) {
                $db->can_drop = true;
            }
            $upgrade = ['column_defs' => $upgrade_cols, 'indexes' => $upgrade_idxs ];
            $app->get_scheme_from_db( $name );
            return $model->upgrade( $model->_table, $upgrade, $model->_colprefix );
        }
    }

    function upgrade_from_cli ( $app, $argv ) {
        $models = [];
        if ( in_array( '--models', $argv ) ) {
            $idx = array_search( '--models', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $models = preg_split( '/\s*,\s*/', strtolower( $argv[ $idx + 1] ) );
                unset( $argv[ $idx + 1] );
            }
            unset( $argv[ $idx ] );
        }
        if ( empty( $models ) ) {
            echo $app->translate( 'Model not specified.' ), PHP_EOL;
            return;
        }
        $upgrader_dir = __DIR__ . DS . 'Upgrader' . DS;
        $this->start_upgrade( $app );
        foreach ( $models as $model ) {
            $app->clear_cache( $model . DS );
            $item = $app->db->model( 'option' )->get_by_key( ['key' => $model, 'kind' => 'scheme_version'] );
            $component = $item->extra;
            $old_version = $item->value;
            $plugin = null;
            if ( $component && $component !== 'core' ) {
                $plugin = $app->component( $component );
                if (! $plugin ) {
                    $plugin = $app->autoload_component( $component );
                }
                $models_dir = $this->get_models_dir( $app, $model );
            } else {
                $models_dir = $this->get_models_dir( $app, $model );
                $component = 'core';
            }
            $file = $models_dir . DS . $model . '.json';
            if (! file_exists( $file ) ) {
                $message = $app->translate( 'The configuration file config.json is missing.' );
                $app->log( ['message'  => $message,
                            'category' => 'scheme',
                            'level'    => 'error'] );
                echo $message, PHP_EOL;
                continue;
            }
            $scheme = json_decode( file_get_contents( $file ), true );
            if ( isset( $scheme['is_new'] ) && $scheme['is_new'] ) {
                $table = $app->get_table( $model );
                if ( $table && is_object( $table ) ) {
                    $message = $app->translate( "The newly added model '%s' cannot be activated because it is already registered in the system.", $model );
                    $app->log( ['message'  => $message,
                                'category' => 'scheme',
                                'model'    => 'table',
                                'object_id'=> $table->id,
                                'level'    => 'error'] );
                    echo $message, PHP_EOL;
                    continue;
                }
            }
            if ( $scheme === null ) {
                echo $app->translate( 'An error occurred while decoding json(%s).', $file ), PHP_EOL;
                continue;
            }
            if ( isset( $scheme['version'] ) && $scheme['version'] <= $old_version ) {
                echo $app->translate( "The model '%s' is the latest version.", $model ), PHP_EOL;
                continue;
            }
            $app->db->base_model->set_scheme_from_json( $model, $file );
            $table = $app->db->show_tables( $model );
            if ( is_array( $table ) && count( $table ) ) {
            } else {
                $colprefix = $app->db->colprefix;
                if ( $colprefix ) {
                    if ( strpos( $colprefix, '<model>' ) !== false )
                        $colprefix = str_replace( '<model>', $model, $colprefix );
                }
                $table = $app->db->prefix . $model;
                $scheme = $app->db->scheme[ $model ];
                unset( $app->db->scheme[ $model ] );
                $app->db->json_model = true;
                $app->db->upgrader = true;
                $app->db->base_model->create_table
                    ( $model, $table, $colprefix, $scheme );
                $message = $app->translate( "The model '%s' created.", $model );
                $app->log( ['message'  => $message,
                            'category' => 'scheme'] );
                echo $message, PHP_EOL;
            }
            unset( $app->db->scheme[ $model ] );
            $component = $component == 'core' ? 'Prototype' : $component;
            $this->unchange_disp_upgrade = $app->unchange_disp_upgrade;
            $this->setup_db( true, $component, [ $model ], dirname( $file ) );
            if ( is_array( $table ) && count( $table ) ) {
                $new_version = $app->db->model( 'option' )->get_by_key( [
                    'key' => $model,
                    'kind' => 'scheme_version'] );
                $new_version = $new_version->value;
                $message = $app->translate(
                  "The model '%s' has been upgraded from version %s to version %s.",
                  [ $model, $old_version, $new_version ] );
                $app->log( ['message'  => $message,
                            'category' => 'scheme'] );
                echo $message, PHP_EOL;
            }
            $scheme = $app->get_scheme_from_db( $model );
            if ( $model == 'fieldtype' ) {
                $this->install_field_types( $app );
            } else if ( $model == 'questiontype' ) {
                $this->install_question_types( $app );
            }
            $model_upgrader = "{$upgrader_dir}upgrader.{$model}.php";
            if ( file_exists( $model_upgrader ) ) {
                require_once( $model_upgrader );
                $upgrader_class = "upgrader_{$model}";
                $model_upgrader = new $upgrader_class();
                $model_upgrade_funcs = $model_upgrader->upgrade_functions;
                foreach ( $model_upgrade_funcs as $upgrade_key => $upgrader_props ) {
                    // $old_version
                    $upgrade_limit = $upgrader_props['version_limit'];
                    if ( $upgrade_limit >= $old_version ) {
                        $meth = $upgrader_props['method'];
                        if ( method_exists( $model_upgrader, $meth ) ) {
                            $model_upgrader->$meth( $app, $this, $old_version );
                        }
                    }
                }
            }
            if ( is_object( $plugin ) ) {
                $plugin_config = $plugin->path() . DS . 'config.json';
                if ( file_exists( $plugin_config ) ) {
                    $plugin_config = json_decode( file_get_contents( $plugin_config ), true );
                    if ( $plugin_config !== null ) {
                        if ( isset( $plugin_config['upgrade_functions'] ) && isset( $plugin_config['upgrade_functions'][ $model ] ) ) {
                            $upgrade_funcs = $plugin_config['upgrade_functions'][ $model ];
                            list( $version_limit, $_plugin, $_plugin_meth ) = [ $upgrade_funcs['version_limit'], $upgrade_funcs['component'], $upgrade_funcs['method'] ];
                            if ( $old_version <= $version_limit ) {
                                $_plugin = $app->component( $_plugin );
                                if (!$_plugin ) $_plugin = $app->autoload_component( $_plugin );
                                if ( is_object( $_plugin ) && method_exists( $_plugin, $_plugin_meth ) ) {
                                    $_plugin->$_plugin_meth( $app );
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function manage_scheme ( $app, $get_info = false ) {
        $workspace = $app->workspace()
                   ? $app->workspace() : $app->db->model( 'workspace' )->new( ['id' => 0 ] );
        if (! $get_info ) {
            if (! $app->can_do( 'manage_plugins', null, null, $workspace ) ) {
                $app->error( 'Permission denied.' );
            }
        }
        $schemes = $app->db->model( 'option' )->load( ['kind' => 'scheme_version'] );
        $items = [];
        $current_scheme = $app->db->scheme;
        $upgrade_count = 0;
        $model_files = [];
        $model_names = [];
        $components = [];
        $cfg_settings = $app->cfg_settings;
        $json_basenames = [];
        foreach ( $schemes as $item ) {
            $model = $item->key;
            $model_names[] = $model;
            $component = $item->extra;
            $models_dir = null;
            if ( $component && $component !== 'core' ) {
                $plugin = $app->component( $component );
                if (! $plugin ) {
                    $plugin = $app->autoload_component( $component );
                }
                $models_dir = $this->get_models_dir( $app, $model );
            } else {
                $models_dir = $this->get_models_dir( $app, $model );
                $component = 'core';
            }
            $upgrade_models = $app->param( 'upgrade_models' )
                            ? explode( ',', $app->param( 'upgrade_models' ) ) : [];
            if ( $models_dir ) {
                $file = $models_dir . DS . $model . '.json';
                if ( is_readable( $file ) ) {
                    $model_files[ $model ] = $file;
                    $scheme = json_decode( file_get_contents( $file ), true );
                    if ( $scheme === null ) {
                        return $app->error( 'An error occurred while decoding json(%s).', basename( $file ) );
                    }
                    $json_basenames[] = basename( $file, '.json' );
                    $scheme_version = isset( $scheme['version'] ) ? $scheme['version'] : '';
                    $db_version = $item->value;
                    $comp = version_compare( $scheme_version, $db_version );
                    if ( $comp === 1 ) {
                        if (! in_array( $model, $upgrade_models ) ) {
                            $upgrade_count++;
                        }
                    }
                    $component = $component == 'core' ? 'Prototype' : $component;
                    $info = ['model' => $model, 'scheme_version' => $scheme_version,
                             'db_version' => $db_version, 'component' => $component ];
                    if ( isset( $cfg_settings[ $component ] ) &&
                        isset( $cfg_settings[ $component ]['label'] ) ) {
                        $cfg_setting = $cfg_settings[ $component ];
                        $plugin = $app->component( $component );
                    }
                    $items[] = $info;
                    $components[ $model ] = $component;
                }
            }
        }
        $json_dirs = array_keys( $this->plugin_models( true ) );
        $json_dirs = array_merge( $app->model_paths, $json_dirs );
        $names = [];
        $errors = [];
        $invalid = [];
        foreach ( $json_dirs as $dir ) {
            if (! is_dir( $dir ) ) continue;
            $files = scandir( $dir, $app->plugin_order );
            foreach ( $files as $json ) {
                if ( strpos( $json, '.' ) === 0 ) continue;
                $file = $dir . DS . $json;
                $extension = PTUtil::get_extension( $json );
                if ( $extension !== 'json' ) continue;
                $model = pathinfo( $json )['filename'];
                if (! in_array( $model, $model_names ) ) {
                    $model_names[] = $model;
                    $component = in_array( $dir, $app->model_paths )
                               ? 'Prototype'
                               : strtolower( basename( dirname( dirname( $file ) ) ) );
                    $data = json_decode( file_get_contents( $file ), true );
                    if ( $data === null ) {
                        $errors[] = $app->translate( 'An error occurred while decoding json(%s).', basename( $file ) );
                        continue;
                    }
                    if ( isset( $data['component'] ) ) $component = $data['component'];
                    $version = isset( $data['version'] ) ? $data['version'] : 0;
                    $info = ['model' => $model, 'scheme_version' => $version,
                             'db_version' => 0, 'component' => $component ];
                    $items[] = $info;
                    if (! in_array( $model, $upgrade_models ) ) {
                        if ( isset( $data['is_new'] ) && $data['is_new'] ) {
                            $table = $app->get_table( $model );
                            if ( $table && is_object( $table ) ) {
                                $errors[] =
                                  $app->translate( "The newly added model '%s' cannot be activated because it is already registered in the system.", $model );
                                $invalid[] = $model;
                                continue;
                            }
                        }
                        $upgrade_count++;
                    }
                    $model_files[ $model ] = $file;
                    $components[ $model ] = $component;
                }
            }
        }
        $models = $app->param( 'model' );
        if ( $app->request_method === 'POST' &&
            $app->param( '_type' ) && $app->param( '_type' ) === 'upgrade' && $models && !empty( $models ) ) {
            $app->validate_magic();
            $this->start_upgrade( $app );
            $counter = count( $models );
            $app->db->clear_cache();
            $app->db->caching = false;
            $upgrader_dir = __DIR__ . DS . 'Upgrader' . DS;
            $schemes = [];
            $errors = [];
            foreach ( $models as $model ) {
                if (! isset( $components[ $model ] ) ) {
                    $errors[] = $app->translate( 'Unknown Model %s.', $model );
                }
            }
            if (!empty( $errors ) ) {
                $app->ctx->vars['error'] = join( "\n", $errors );
            } else {
                foreach ( $models as $model ) {
                    $file = $model_files[ $model ];
                    $scheme = json_decode( file_get_contents( $file ), true );
                    if ( $scheme === null ) {
                        return $app->error( 'An error occurred while decoding json(%s).', basename( $file ) );
                    }
                    if ( in_array( $model, $invalid ) ) {
                        return $app->error( "The newly added model '%s' cannot be activated because it is already registered in the system.", $model );
                    }
                }
                if ( $max_execution_time = $app->max_exec_time ) {
                    $max_execution_time = (int) $max_execution_time;
                    ini_set( 'max_execution_time', $max_execution_time );
                }
                $this->unchange_disp_upgrade = $app->unchange_disp_upgrade;
                ignore_user_abort( true );
                $app->redirect( $app->admin_url .
                    "?__mode=manage_scheme&saved_changes=" . $counter
                    . '&upgrade_models=' . implode( ',', $models ), true );
                foreach ( $models as $model ) {
                    $app->clear_cache( $model . DS );
                    $file = $model_files[ $model ];
                    if ( $components[ $model ] != 'Prototype' ) {
                        $dir = dirname( dirname( $file ) );
                        $locale = $dir . DS . 'locale' . DS . 'default.json';
                        if ( file_exists( $locale ) ) {
                            $dict = json_decode( file_get_contents( $locale ), true );
                            if ( $dict === null ) {
                                return $app->error( 'An error occurred while decoding json(%s).', basename( $locale ) );
                            }
                            if ( is_array( $dict ) ) {
                                $app->dictionary['default'] = array_merge(
                                    $app->dictionary['default'], $dict );
                            }
                        }
                    }
                    $old_version = $app->db->model( 'option' )->get_by_key( [
                        'key' => $model,
                        'kind' => 'scheme_version'] );
                    $old_version = $old_version->value;
                    $component = $components[ $model ];
                    $plugin = null;
                    if ( $component != 'Prototype' ) {
                        $plugin = $app->component( $component );
                        if (! $plugin ) {
                            $plugin = $app->autoload_component( $component );
                        }
                    }
                    $app->db->base_model->set_scheme_from_json( $model, $file );
                    $table = $app->db->show_tables( $model );
                    if ( is_array( $table ) && count( $table ) ) {
                    } else {
                        $colprefix = $app->db->colprefix;
                        if ( $colprefix ) {
                            if ( strpos( $colprefix, '<model>' ) !== false )
                                $colprefix = str_replace( '<model>', $model, $colprefix );
                        }
                        $table = $app->db->prefix . $model;
                        $scheme = $app->db->scheme[ $model ];
                        unset( $app->db->scheme[ $model ] );
                        $app->db->json_model = true;
                        $app->db->upgrader = true;
                        $app->db->base_model->create_table
                            ( $model, $table, $colprefix, $scheme );
                        $message = $app->translate( "The model '%s' created.", $model );
                        $app->log( ['message'  => $message,
                                    'category' => 'scheme'] );
                    }
                    unset( $app->db->scheme[ $model ] );
                    $this->setup_db( true, $component, [ $model ], dirname( $file ) );
                    if ( is_array( $table ) && count( $table ) ) {
                        $new_version = $app->db->model( 'option' )->get_by_key( [
                            'key' => $model,
                            'kind' => 'scheme_version'] );
                        $new_version = $new_version->value;
                        $message = $app->translate(
                          "The model '%s' has been upgraded from version %s to version %s.",
                          [ $model, $old_version, $new_version ] );
                        $app->log( ['message'  => $message,
                                    'category' => 'scheme'] );
                    }
                    $scheme = $app->get_scheme_from_db( $model );
                    if ( $model == 'fieldtype' ) {
                        $this->install_field_types( $app );
                    } else if ( $model == 'questiontype' ) {
                        $this->install_question_types( $app );
                    }
                    $model_upgrader = "{$upgrader_dir}upgrader.{$model}.php";
                    if ( file_exists( $model_upgrader ) ) {
                        require_once( $model_upgrader );
                        $upgrader_class = "upgrader_{$model}";
                        $model_upgrader = new $upgrader_class();
                        $model_upgrade_funcs = $model_upgrader->upgrade_functions;
                        foreach ( $model_upgrade_funcs as $upgrade_key => $upgrader_props ) {
                            // $old_version
                            $upgrade_limit = $upgrader_props['version_limit'];
                            if ( $upgrade_limit >= $old_version ) {
                                $meth = $upgrader_props['method'];
                                if ( method_exists( $model_upgrader, $meth ) ) {
                                    $model_upgrader->$meth( $app, $this, $old_version );
                                }
                            }
                        }
                    }
                    if ( is_object( $plugin ) ) {
                        $plugin_config = $plugin->path() . DS . 'config.json';
                        if ( file_exists( $plugin_config ) ) {
                            $plugin_config = json_decode( file_get_contents( $plugin_config ), true );
                            if ( $plugin_config !== null ) {
                                if ( isset( $plugin_config['upgrade_functions'] ) && isset( $plugin_config['upgrade_functions'][ $model ] ) ) {
                                    $upgrade_funcs = $plugin_config['upgrade_functions'][ $model ];
                                    list( $version_limit, $_plugin, $_plugin_meth ) = [ $upgrade_funcs['version_limit'], $upgrade_funcs['component'], $upgrade_funcs['method'] ];
                                    if ( $old_version <= $version_limit ) {
                                        $_plugin = $app->component( $_plugin );
                                        if (!$_plugin ) $_plugin = $app->autoload_component( $_plugin );
                                        if ( is_object( $_plugin ) && method_exists( $_plugin, $_plugin_meth ) ) {
                                            $_plugin->$_plugin_meth( $app );
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $app->clear_cache( 'scheme_versions__c' );
            }
            $app->clear_all_cache();
            $this->upgrade_scheme_check( $app );
            exit();
        }
        $app->ctx->vars['errors'] = $errors;
        $app->ctx->vars['schemes'] = $items;
        $app->ctx->vars['invalid'] = $invalid;
        if ( $get_info ) {
            return $items;
        }
        $app->ctx->vars['upgrade_count'] = $upgrade_count;
        return $app->__mode( 'manage_scheme' );
    }

    function get_models_dir ( $app, $model, $m_dir = '' ) {
        $json_dirs = $app->db->models_dirs;
        if (! $json_dirs ) {
            $json_dirs = array_keys( $this->plugin_models( true ) );
            $json_dirs = array_merge( $app->model_paths, $json_dirs );
            $path_keys = array_map( 'strlen', $json_dirs );
            array_multisort( $path_keys, SORT_DESC, $json_dirs );
            $app->db->models_dirs = $json_dirs;
        }
        foreach ( $json_dirs as $model_path ) {
            $json_path = $model_path . DS . $model . '.json';
            if ( file_exists( $json_path ) ) {
                return dirname( $json_path );
            }
        }
        return $m_dir;
    }

    function install_field_types ( $app, $skip_changed = true, $basename_only = null ) {
        $fields_dir = $app->path() . DS . 'tmpl' . DS . 'field' . DS . 'field_types';
        $json = $fields_dir . DS . 'fields.json';
        $tmpl_dir = $fields_dir . DS . 'tmpl' . DS;
        if ( is_readable( $json ) ) {
            $fields = json_decode( file_get_contents( $json ), true );
            if ( $fields === null ) {
                return $app->error( 'An error occurred while decoding json(%s).', basename( $json ) );
            }
            foreach ( $fields as $basename => $prop ) {
                if ( $basename_only && $basename_only !== $basename ) {
                    continue;
                }
                $field = $app->db->model( 'fieldtype' )->get_by_key(
                        ['basename' => $basename ] );
                $created_by = false;
                $modified_by = false;
                if ( $field->id ) {
                    if ( $skip_changed ) {
                        if ( $field->modified_by ) {
                            continue;
                        }
                    }
                    $created_by = $field->created_by;
                    $modified_by = $field->modified_by;
                    $original = clone $field;
                    PTUtil::pack_revision( $field, $original );
                }
                $name = $prop['name'];
                $field->name( $prop['name'] );
                $field->order( $prop['order'] );
                $hide_label = ( isset( $prop['hide_label'] ) && $prop['hide_label'] ) ? 1 : 0;
                $field->hide_label( $hide_label );
                $field->label( file_get_contents( "{$tmpl_dir}{$basename}_label.tmpl" ) );
                $field->content( file_get_contents( "{$tmpl_dir}{$basename}_content.tmpl" ) );
                $app->set_default( $field );
                if ( $created_by !== false ) {
                    $field->created_by( $created_by );
                }
                if ( $modified_by !== false ) {
                    $field->modified_by( $modified_by );
                }
                $field->save();
            }
        }
        $component = $app->component( 'FileUploader' );
        if ( $component ) {
            $tmpl_dir = $component->path() . DS . 'tmpl' . DS . 'fields' . DS;
            $fields = ['video' => ['name' => 'Video', 'hide_label' => false],
                       'videos' => ['name' => 'Videos (Multiple)', 'hide_label' => false] ];
            foreach ( $fields as $basename => $prop ) {
                $field = $app->db->model( 'fieldtype' )->get_by_key(
                        ['basename' => $basename ] );
                $created_by = false;
                $modified_by = false;
                if ( $field->id ) {
                    if ( $skip_changed ) {
                        if ( $field->created_on != $field->modified_on ) {
                            continue;
                        }
                    }
                    $created_by = $field->created_by;
                    $modified_by = $field->modified_by;
                    $original = clone $field;
                    PTUtil::pack_revision( $field, $original );
                } else {
                    $last = $app->db->model( 'fieldtype' )->load(
                        false, ['sort' => 'order', 'direction' => 'descend', 'limit' => 1], 'order' );
                    if (! empty( $last ) ) {
                        $last = $last[0];
                        $last = $last->order;
                        $field->order( $last + 1 );
                    }
                }
                $field->name( $prop['name'] );
                $hide_label = ( isset( $prop['hide_label'] ) && $prop['hide_label'] ) ? 1 : 0;
                $field->hide_label( $hide_label );
                $field->label( file_get_contents( "{$tmpl_dir}{$basename}_label.tmpl" ) );
                $field->content( file_get_contents( "{$tmpl_dir}{$basename}_content.tmpl" ) );
                $app->set_default( $field );
                if ( $created_by !== false ) {
                    $field->created_by( $created_by );
                }
                if ( $modified_by !== false ) {
                    $field->modified_by( $modified_by );
                }
                $field->save();
            }
        }
    }

    function install_question_types ( $app, $skip_changed = true ) {
        $questions_dir = $app->path() . DS . 'tmpl' . DS . 'question' . DS . 'question_types';
        $json = $questions_dir . DS . 'questions.json';
        $tmpl_dir = $questions_dir . DS . 'tmpl' . DS;
        if ( is_readable( $json ) ) {
            $questions = json_decode( file_get_contents( $json ), true );
            if ( $questions === null ) {
                return $app->error( 'An error occurred while decoding json(%s).', basename( $json ) );
            }
            foreach ( $questions as $basename => $prop ) {
                $question = $app->db->model( 'questiontype' )->get_by_key(
                        ['basename' => $basename ] );
                $created_by = false;
                $modified_by = false;
                if ( $question->id ) {
                    if ( $skip_changed ) {
                        if ( $question->modified_by ) {
                            continue;
                        }
                    }
                    $created_by = $question->created_by;
                    $modified_by = $question->modified_by;
                    $original = clone $question;
                    PTUtil::pack_revision( $question, $original );
                }
                $name = $prop['name'];
                $question->name( $prop['name'] );
                $question->order( $prop['order'] );
                if ( isset( $prop['aria_label'] ) ) {
                    $question->aria_label( $prop['aria_label'] );
                }
                $question->template( file_get_contents( "{$tmpl_dir}{$basename}.tmpl" ) );
                $app->set_default( $question );
                if ( $created_by !== false ) {
                    $question->created_by( $created_by );
                }
                if ( $modified_by !== false ) {
                    $question->modified_by( $modified_by );
                }
                $question->save();
            }
        }
    }

    function plugin_models ( $dirs = false ) {
        $app = Prototype::get_instance();
        if ( $app->stash( 'plugin_models' ) ) {
            return $app->stash( 'plugin_models' );
        }
        $plugin_dirs = $app->plugin_dirs;
        $plugin_models = [];
        $json_dirs = [];
        $plugins = $app->get_cache( 'init_plugins__c', 'option', true );
        if (! $plugins ) {
            $plugins = $app->db->model( 'option' )->load( ['kind' => 'plugin', 'number' => 1] );
            $app->set_cache( 'init_plugins__c', $plugins, true );
        }
        $options = [];
        foreach ( $plugins as $switch ) {
            $options[ $switch->key ] = $switch;
        }
        foreach ( $plugin_dirs as $dir ) {
            $id = strtolower( basename( $dir ) );
            $switch = isset( $options[ $id ] ) ? $options[ $id ]
                    : $app->db->model( 'option' )->get_by_key(
                      ['key' => $id, 'kind' => 'plugin', 'number' => 1] );
            if (! $switch->id ) continue;
            $dir .= DS . 'models';
            if ( is_dir( $dir ) ) {
                $files = scandir( $dir, $app->plugin_order );
                $has_model = false;
                $models = [];
                foreach ( $files as $json ) {
                    if ( strpos( $json, '.' ) === 0 ) continue;
                    $file = $dir . DS . $json;
                    $extension = PTUtil::get_extension( $json );
                    if ( $extension !== 'json' ) continue;
                    $model = pathinfo( $json )['filename'];
                    $component = strtolower( basename( dirname( dirname( $file ) ) ) );
                    $data = json_decode( file_get_contents( $file ), true );
                    if ( $data === null ) {
                        return $app->error( 'An error occurred while decoding json(%s).', basename( $file ) );
                    }
                    if ( isset( $data['component'] ) ) $component = $data['component'];
                    $version = isset( $data['version'] ) ? $data['version'] : 0;
                    $info = ['component' => $component, 'version' => $version,
                             'model' => $model ];
                    $plugin_models[ $model ] = $info;
                    $models[] = $info;
                    $has_model = true;
                }
                if ( $has_model ) $json_dirs[ $dir ] = $models;
            }
        }
        $res = $dirs ? $json_dirs : $plugin_models;
        $app->stash( 'plugin_models', $res );
        return $res;
    }

    function setup_db ( $force = false, $component = 'core', $items = [], $m_dir = '' ) {
        $app = Prototype::get_instance();
        $this->start_upgrade( $app );
        $db = $app->db;
        if ( empty( $items ) && $force === true && ! $m_dir ) {
            $m_dir = PADODIR . DS . 'models';
        }
        $db->json_model = true;
        $app->db->upgrader = true;
        $init = $db->model( 'table' )->new();
        $init = $db->model( 'option' )->new();
        $init = $db->model( 'session' )->new();
        if ( empty( $items ) ) {
            $items = scandir( $m_dir );
            array_unshift( $items, 'phrase.json' );
        } else {
            array_walk( $items, function( &$item ) { $item .= '.json'; } );
        }
        $ws_children = [];
        $workspace = null;
        $items = array_flip( $items );
        $items = array_keys( $items );
        $default_models = $app->get_config( 'default_models' );
        if ( $default_models ) {
            $default_models = explode( ',', $default_models->value );
        } else {
            $default_models = [];
        }
        $tbl_count = 0;
        $logging = $app->logging;
        $app->logging = false;
        $error_reporting = ini_get( 'error_reporting' );
        error_reporting(0);
        foreach ( $items as $item ) {
            if ( strpos( $item, '.' ) === 0 ) continue;
            $m_dir = $this->get_models_dir( $app, basename( $item, '.json' ), $m_dir );
            $file = $m_dir . DS . $item;
            if (! is_readable( $file ) ) continue;
            $app->clear_cache( $item . DS );
            $item = basename( $item, '.json' );
            $default_models[] = $item;
            $db->models_json[ $item ] = $file;
            $basemodel = $db->model( $item );
            $init = $db->model( $item )->new();
            $scheme = json_decode( file_get_contents( $file ), true );
            if ( $scheme === null ) {
                $log = ['message' => $app->translate( 'An error occurred while decoding json(%s).', basename( $file ) ),
                        'level' => 'error', 'category' => 'scheme'];
                $app->log( $log );
                die();
            }
            $table = $db->model( 'table' )->get_by_key( ['name' => $item ] );
            if ( isset( $scheme['version'] ) ) {
                $scheme_version = $scheme['version'];
                $version_opt = $db->model( 'option' )->get_by_key(
                    ['kind' => 'scheme_version', 'key' => $item ] );
                $extra = $component == 'Prototype' ? 'core' : $component;
                $version_opt->value( $scheme_version );
                $version_opt->extra( $extra );
                $version_opt->save();
                if ( $table->id && $app->param( '_type' ) !== 'install' ) {
                    $ver = $table->version;
                    $comp = version_compare( $scheme_version, $ver );
                    if ( $comp !== 0 ) {
                        $table->version( $scheme_version );
                        $table->save();
                    }
                }
            }
            if ( $item === 'column' || $item === 'option' || $item === 'relation'
                || $item === 'meta' || $item === 'session' ) continue;
            $tbl_count++;
            if ( $this->print_state ) {
                $msg = $app->translate( "Creating TABLE \'%s\'...", $item );
                echo "<script>$('#print').html( $('#print').html() + '{$msg}' + '<br>' );</script>";
                echo '<script>var $target = $(\'#print\');';
                echo '$target.scrollTop($target[0].scrollHeight);</script>';
                ob_flush();
                flush();
            }
            if ( isset( $scheme['locale'] ) ) {
                $locale = $scheme['locale'];
                foreach ( $locale as $lang => $dict ) {
                    if ( $lang == 'default' ) {
                        $app->dictionary['default'] = array_merge(
                        $app->dictionary['default'], $scheme['locale']['default'] );
                    } else {
                        foreach ( $dict as $phrase => $trans ) {
                            $record = $db->model( 'phrase' )->get_by_key(
                                ['lang' => $lang, 'phrase' => ['BINARY' => $phrase ] ] );
                            if (! $force && $record->id ) continue;
                            $record->trans( $trans );
                            $app->set_default( $record );
                            $record->save();
                        }
                    }
                }
            }
            $column_labels = [];
            if ( isset( $scheme['column_labels'] ) ) {
                $column_labels = $scheme['column_labels'];
            }
            $column_defs = $scheme['column_defs'];
            $table_pfx = $db->prefix;
            if ( $table->id && $app->mode == 'manage_scheme' && $app->develop ) {
                $columns = $db->model( 'column' )->load( ['table_id' => $table->id ] );
                $drop_cols = [];
                foreach ( $columns as $column ) {
                    if (! isset( $column_defs[ $column->name ] ) && $column->not_delete ) {
                        $drop_cols[ $column->name ] = $column;
                    }
                }
                if (! empty( $drop_cols ) ) {
                    $query = "SHOW COLUMNS FROM " . $db->prefix . $item;
                    $sth = $db->db->query( $query );
                    $show_cols = $sth->fetchAll();
                    foreach ( $show_cols as $idx => $show_col ) {
                        $show_cols[ $idx ] = preg_replace( "/^{$item}_/", '', $show_col[ 0 ] );
                    }
                    foreach ( $drop_cols as $column ) {
                        if ( $column->type != 'relation' && in_array( $column->name, $show_cols ) ) {
                            $sql = "ALTER TABLE {$table_pfx}{$item} DROP {$item}_" . $column->name;
                            $sth = $db->db->prepare( $sql );
                            try {
                                $sth->execute();
                            } catch ( PDOException $e ) {
                                trigger_error( $e->getMessage() );
                            }
                        }
                        if ( $column->type == 'relation' ) {
                            $relations = $db->model( 'relation' )->load(
                                ['name' => $column->name, 'from_obj' => $item ], [], 'id' );
                            $db->model( 'relation' )->remove_multi( $relations );
                        }
                        $column->remove();
                    }
                }
            }
            $indexes = $scheme['indexes'];
            $child_tables = isset( $scheme['child_tables'] )
                          ? $scheme['child_tables'] : [];
            $do_not_output = isset( $scheme['do_not_output'] )
                          ? $scheme['do_not_output'] : false;
            $primary = $indexes['PRIMARY'];
            $col_primary = isset( $scheme['primary'] ) ? $scheme['primary'] : null;
            $child_of = isset( $scheme['child_of'] ) ? $scheme['child_of'] : null;
            $options = ['label', 'plural', 'auditing', 'order', 'sortable', 'taxonomy',
                'menu_type', 'template_tags', 'taggable', 'display_space', 'start_end',
                'has_extra_path', 'has_basename', 'has_status', 'assign_user', 'revisable', 'max_revisions',
                'hierarchy', 'allow_comment', 'default_status', 'has_uuid', 'dialog_view',
                'can_duplicate', 'has_assets', 'has_attachments', 'show_activity',
                'text_format', 'has_form', 'can_duplicate', 'allow_identical', 'im_export'];
            foreach ( $options as $option ) {
                $opt = isset( $scheme[ $option ] ) ? $scheme[ $option ] : '';
                if (! $table->$option && $opt && $table->has_column( $option, true ) ) {
                    $table->$option( $opt );
                } else if (! $table->has_column( $option, true ) ) {
                    unset( $table->$option );
                    $table_option = "table_{$option}";
                    unset( $table->$table_option );
                }
            }
            if ( $app->mode === 'manage_scheme' && $table->name === 'table' ) {
                $arr = get_object_vars( $table );
                $reserved_vars = array_keys( PADOBaseModel::RESERVED );
                foreach ( $reserved_vars as $var ) {
                    unset( $arr[ $var ] );
                }
                $show_cols = $db->show_columns( 'table' );
                $cols = array_keys( $arr );
                foreach ( $cols as $col ) {
                    if (! in_array( $col, $show_cols ) ) {
                        // When upgrade model 'table'.
                        unset( $table->$col );
                    }
                }
            }
            if ( isset( $scheme['sort_by'] ) ) {
                $sort_by = $scheme['sort_by'];
                $sort_key = key( $sort_by );
                $sort_order = $sort_by[ $sort_key ];
                $table->sort_by( $sort_key );
                $table->sort_order( $sort_order );
            }
            foreach ( $child_tables as $child ) {
                $table = $this->set_child_tables( $child, $table, true, false );
            }
            if ( $child_of === 'workspace' ) {
                $table->space_child( 1 );
                $ws_children[] = $item;
                $table->display_space( 1 );
            } else if ( $table->display_space ) {
                $ws_children[] = $item;
            }
            $table->primary( $col_primary );
            if ( isset( $scheme['display_system'] ) && $scheme['display_system'] ) {
                $table->display_system( 1 );
            } else {
                $table->display_system( 0 );
            }
            if ( $do_not_output ) {
                $table->do_not_output( 1 );
            }
            $app->set_default( $table );
            $table->not_delete( 1 );
            if ( isset( $scheme['version'] ) ) {
                $table->version( $scheme['version'] );
            }
            if ( $app->param( '_type' ) === 'install' && $table->revisable && !$table->max_revisions ) {
                $table->max_revisions( 20 );
            }
            $table->save();
            error_reporting( $error_reporting );
            $app->logging = $logging;
            if ( $item === 'workspace' ) {
                $workspace = $table;
            }
            $table_id = $table->id;
            if (! $table_id ) {
                // Why table_id is 0
                $table = $app->db->model('table')->get_by_key( ['name' => $table->name ] );
                $table_id = $table->id;
                if (! $table_id ) {
                    $app->error( 'An error occurred while saving %s.', $table->name );
                }
            }
            $list_props = isset( $scheme['list_properties'] ) ?
                $scheme['list_properties'] : [];
            $edit_props = isset( $scheme['edit_properties'] ) ?
                $scheme['edit_properties'] : [];
            $unique = isset( $scheme['unique'] ) ? $scheme['unique'] : [];
            $unchangeable = isset( $scheme['unchangeable'] ) ?
                $scheme['unchangeable'] : [];
            $unchange_disp_upgrade = $this->unchange_disp_upgrade;
            $disp_upgrade = isset( $scheme['disp_upgrade'] ) ? $scheme['disp_upgrade'] : false;
            if ( $disp_upgrade ) {
                $unchange_disp_upgrade = false;
            }
            $autoset = isset( $scheme['autoset'] ) ? $scheme['autoset'] : [];
            $validations = isset( $scheme['validation_types'] ) ? $scheme['validation_types'] : [];
            $maxlength = isset( $scheme['maxlength'] ) ? $scheme['maxlength'] : [];
            $col_options = isset( $scheme['options'] ) ? $scheme['options'] : [];
            $col_extras = isset( $scheme['extras'] ) ? $scheme['extras'] : [];
            $translates = isset( $scheme['translate'] ) ? $scheme['translate'] : [];
            $hints = isset( $scheme['hint'] ) ? $scheme['hint'] : [];
            $disp_edit = isset( $scheme['disp_edit'] ) ? $scheme['disp_edit'] : [];
            $i = 1;
            $locale = $app->dictionary['default'];
            foreach ( $column_defs as $name => $defs ) {
                $record = $db->model( 'column' )->get_by_key(
                    ['table_id' => $table_id, 'name' => $name ] );
                if (! $force && $record->id ) continue;
                if ( $name === $primary ) $record->is_primary( 1 );
                $record->type( $defs['type'] );
                if ( isset( $defs['size'] ) ) $record->size( $defs['size'] );
                if ( isset( $defs['default'] ) ) {
                    $record->default( $defs['default'] );
                } else {
                    $record->default( null );
                }
                $record->not_null( 0 );
                $record->index( 0 );
                $record->autoset( 0 );
                $record->unique( 0 );
                $record->unchangeable( 0 );
                $record->not_delete( 0 );
                if ( isset( $defs['not_null'] ) ) $record->not_null( 1 );
                if ( isset( $indexes[ $name ] ) ) $record->index( 1 );
                if ( in_array( $name, $autoset ) ) $record->autoset( 1 );
                if ( isset( $column_labels[ $name ] ) ) {
                    $label = $column_labels[ $name ];
                } else if ( isset( $locale[ $name ] ) ) {
                    $label = $locale[ $name ];
                } else {
                    $phrases = explode( '_', $name );
                    array_walk( $phrases, function( &$str ) { $str = ucfirst( $str ); } );
                    $label = join( ' ', $phrases );
                }
                if ( $item === 'entry' && $name === 'text' ) {
                    $label = 'Body';
                }
                if (! $unchange_disp_upgrade || ! $record->id ) {
                    $record->label( $label );
                    if ( isset( $edit_props[ $name ] ) ) {
                        $record->edit( $edit_props[ $name ] );
                    } else {
                        $record->edit('');
                    }
                    if ( isset( $list_props[ $name ] ) ) {
                        $record->list( $list_props[ $name ] );
                    } else {
                        $record->list('');
                    }
                    $record->order( $i * 10 );
                    if ( isset( $scheme['relations'] ) ) {
                        if ( isset( $scheme['relations'][ $name ] ) ) {
                            $record->options( $scheme['relations'][ $name ] );
                        }
                    }
                    if ( isset( $col_options[ $name ] ) && ! $record->options ) {
                        $record->options( $col_options[ $name ] );
                    } else if ( isset( $col_options[ $name ] ) && $col_options[ $name ] != $record->options ) {
                        if (! $this->unchange_disp_upgrade ) {
                            $record->options( $col_options[ $name ] );
                        }
                    }
                }
                if ( in_array( $name, $unique ) ) {
                    $record->unique( 1 );
                } else {
                    $record->unique( 0 );
                }
                if ( in_array( $name, $unchangeable ) ) $record->unchangeable( 1 );
                $record->not_delete( 1 );
                if ( isset( $col_extras[ $name ] ) ) 
                    $record->extra( $col_extras[ $name ] );
                if ( isset( $validations[ $name ] ) ) 
                    $record->validation_type( $validations[ $name ] );
                if ( isset( $maxlength[ $name ] ) ) 
                    $record->maxlength( $maxlength[ $name ] );
                if ( isset( $hints[ $name ] ) ) 
                    $record->hint( $hints[ $name ] );
                if ( isset( $disp_edit[ $name ] ) ) 
                    $record->disp_edit( $disp_edit[ $name ] );
                if ( in_array( $name, $translates ) ) 
                    $record->translate( 1 );
                if ( $record->type == 'int' ) {
                    if ( strpos( $record->edit, 'relation:' ) === 0 ||
                        strpos( $record->edit, 'reference:' ) === 0 ) {
                        $e_props = explode( ':', $record->edit );
                        if ( $e_props[1] != '__any__' ) {
                            $record->rel_model( $e_props[1] );
                            $record->disp_edit( $e_props[0] );
                        }
                    }
                } else if ( $record->type == 'relation' && $record->options != '__any__' ) {
                    $record->rel_model( $record->options );
                }
                $app->set_default( $record );
                $record->save();
                if ( $name === 'workspace_id' ) {
                    if (! in_array( $item, $ws_children ) ) {
                        $ws_children[] = $item;
                    }
                }
                ++$i;
            }
            if (!empty( $db->errors ) ) {
                return $app->error( implode( "\n", $db->errors ) );
            }
            if ( $item === 'phrase' ) {
                $locale_dir = dirname( LIB_DIR ) . DS . 'locale';
                $locales = scandir( $locale_dir );
                foreach ( $locales as $locale ) {
                    if ( strpos( $locale, '.' ) === 0 ) continue;
                    if ( $locale === 'default.json' ) continue;
                    $lang = str_replace( '.json', '', $locale );
                    $locale = $locale_dir . DS . $locale;
                    $dict = json_decode( file_get_contents( $locale ), true );
                    if ( $dict === null ) {
                        $log = ['message' => $app->translate( 'An error occurred while decoding json(%s).', basename( $locale ) ),
                                'level' => 'error', 'category' => 'scheme'];
                        $app->log( $log );
                        die();
                    }
                    foreach ( $dict as $phrase => $trans ) {
                        $record = $db->model( 'phrase' )->get_by_key(
                            ['lang' => $lang, 'phrase' => ['BINARY' => $phrase ] ] );
                        if (! $force && $record->id ) continue;
                        $record->trans( $trans );
                        $app->set_default( $record );
                        $record->save();
                    }
                }
            }
        }
        if (! empty( $ws_children ) && $workspace ) {
            foreach ( $ws_children as $child ) {
                $workspace = $this->set_child_tables( $child, $workspace, true, false );
            }
            $workspace->save();
        }
        $app->set_config( ['default_models' => join( ',', $default_models ) ] );
        if (! $this->print_state ) {
            $this->set_workspace_children( $app );
        }
        return $tbl_count;
    }

    function save_filter_table ( &$cb, $app, &$obj ) {
        if ( $app->param( '_preview' ) ) return true;
        $validation = $app->param( '__validation' );
        $name = strtolower( $app->param( 'name' ) );
        $json_data = $app->param( 'json_data' );
        /*
        Backward Compatibility
        if (! $json_data && $obj->id ) {
            header( 'Content-type: application/json' );
            $message = ['status' => 500, 'error' => $app->translate( 'Unable to get columns data.' ) ];
            echo json_encode( $message );
            exit();
        }
        */
        $posts = array_values( $_POST );
        $post_cnt = 0;
        foreach ( $posts as $post ) {
            if ( is_array( $post ) ) {
                $post_cnt += count( $post );
            } else {
                $post_cnt++;
            }
        }
        $buffer = $app->max_input_vars_buffer ? $app->max_input_vars_buffer : 10;
        $post_cnt += (int) $buffer;
        $max_input_vars = ini_get( 'max_input_vars' );
        if ( $max_input_vars <= $post_cnt ) {
            if ( $validation ) {
                header( 'Content-type: application/json' );
                $message['status'] = 500;
                $message['error'] = $app->translate( 'The number of posted data has reached the upper limit of max_input_vars(%s).', $max_input_vars );
                echo json_encode( $message );
                exit();
            } else {
                return $app->error( 'The number of posted data has reached the upper limit of max_input_vars(%s).', $max_input_vars );
            }
        }
        if ( $obj->id && $json_data ) {
            $json_data = json_decode( $json_data, true );
            if ( $json_data === null ) {
                header( 'Content-type: application/json' );
                $message = ['status' => 500, 'error' => $app->translate( 'Unable to get columns data.' ) ];
                echo json_encode( $message );
                exit();
            }
            if ( is_array( $json_data ) ) {
                foreach ( $json_data as $key => $data ) {
                    $_POST[ $key ] = $data;
                    $_REQUEST[ $key ] = $data;
                }
            }
        }
        if (! $obj->id ) {
            if (! $app->is_valid_property( $name, $msg, true ) ) {
                $cb['error'] = $msg;
                return false;
            }
            $default_models = $app->get_config( 'default_models' );
            $reserved_models = $this->reserved_models;
            if ( $default_models ) {
                $default_models = explode( ',', $default_models->value );
            }
            $default_models = is_array( $default_models )
                            ? array_merge( $default_models, $reserved_models )
                            : $reserved_models;
            $plugin_dirs = $app->plugin_paths;
            $add_models = [];
            $ds = DS;
            foreach ( $plugin_dirs as $plugin_dir ) {
                foreach ( glob("{$plugin_dir}{$ds}*{$ds}*.php") as $filename ) {
                    $filename = strtolower( pathinfo( $filename )['filename'] );
                    $add_models[] = $filename;
                }
                foreach ( glob("{$plugin_dir}{$ds}*{$ds}models{$ds}*json") as $filename ) {
                    $filename = strtolower( pathinfo( $filename )['filename'] );
                    $add_models[] = $filename;
                }
            }
            $model_paths = $app->db->models_dirs;
            foreach ( $model_paths as $model_path ) {
                foreach ( glob("{$model_path}{$ds}*json") as $filename ) {
                    $filename = pathinfo( $filename )['filename'];
                    $add_models[] = $filename;
                }
            }
            $lib_dir = LIB_DIR;
            foreach ( glob("{$lib_dir}Prototype{$ds}class.*.php") as $filename ) {
                $filename = strtolower( pathinfo( $filename )['filename'] );
                $filename = preg_replace( '/^class\./', '', $filename );
                $add_models[] = $filename;
            }
            foreach ( glob("{$lib_dir}*") as $filename ) {
                $add_models[] = strtolower( basename( $filename ) );
            }
            $default_models = array_unique( array_merge( $default_models, $add_models ) );
            if ( in_array( $name, $default_models ) ) {
                $cb['error'] = $app->translate( 'The name %s is reserved.', $name );
                return false;
            }
            if ( class_exists( $name ) ) {
                $cb['error'] = $app->translate( "The name '%s' can not be specified.", $name );
                return false;
            }
            $label = $app->param( 'label' );
            $plural = $app->param( 'plural' );
            if ( ( strlen( $label ) !== mb_strlen( $label ) ) || ( strlen( $plural ) !== mb_strlen( $plural ) ) ) {
                $cb['error'] = $app->translate( 'Multibyte characters are not allowed in label and plural.' );
                return false;
            }
            $obj->name( $name );
        }
        $primary = $app->param( 'primary' );
        if ( $primary && !$app->is_valid_property( $primary, $msg, true ) ) {
            $cb['error'] = $msg;
            return false;
        }
        // TODO check reserved column name e.g. magic_token
        $errors = [];
        if (!$obj->id ) return true;
        $new_ids = $app->param( '_new_column' );
        $add_ids = [];
        if ( is_array( $new_ids ) ) {
            foreach ( $new_ids as $col ) {
                if ( $col ) {
                    $add_ids[] = (int) $col;
                }
            }
        }
        $ids = $app->param( '_column_id' );
        if (!is_array( $ids ) ) {
            $ids = [];
        }
        $not_specify = $this->reserved;
        $types       = ['boolean'  => ['tinyint', 4],
                        'integer'  => ['int', 11],
                        'text'     => ['text', ''],
                        'blob'     => ['blob', ''],
                        'relation' => ['relation', ''],
                        'datetime' => ['datetime', ''],
                        'double'   => ['double', ''],
                        'decimal'  => ['decimal', ''],
                        'tinystr'  => ['string', 50],
                        'string'   => ['string', 255],
                        'longstr'  => ['string', 768] ];
        $list_types  = ['checkbox', 'number', 'primary', 'text', 'popover',
                        'text_short', 'password', 'datetime', 'date', 'url'];
        $edit_types  = ['hidden', 'checkbox', 'number', 'primary', 'text', 'file',
                        'text_short', 'textarea', 'password', 'password(hash)', 'datetime',
                        'date', 'languages', 'richtext', 'selection', 'color', 'url'];
        $edit_types  = ['hidden', 'checkbox', 'number', 'primary', 'text', 'file',
                        'text_short', 'textarea', 'password', 'password(hash)', 'datetime',
                        'date', 'languages', 'richtext', 'selection', 'color', 'url'];
        $add_edit_types = isset( $app->registry['edit_properties'] ) ? $app->registry['edit_properties'] : [];
        if (! empty( $add_edit_types ) ) {
            $edit_types = array_merge( $edit_types, array_keys( $add_edit_types ) );
        }
        $can_index   = ['tinyint', 'int', 'tinystr', 'string', 'longstr', 'datetime', 'double', 'decimal'];
        $db = $app->db;
        $db->can_drop = true;
        $columns = $db->model( 'column' )->load( ['table_id' => $obj->id ] );
        $col_names = [];
        $primary_cols = [];
        $BLOB2FILE = false;
        if ( defined( 'PADO_DB_BLOBPATH' ) && defined( 'PADO_DB_BLOB2FILE' ) ) {
            if ( PADO_DB_BLOBPATH && PADO_DB_BLOB2FILE ) {
                $BLOB2FILE = true;
            }
        }
        foreach ( $columns as $column ) {
            $col_name = $column->name;
            $col_names[] = $col_name;
            $id = $column->id;
            $order = $app->param( '_order_' . $id );
            if ( $column->is_primary ) {
                $list = $app->param( '_list_' . $id ) ? 'number' : '';
                $column->order( $order );
                $column->list( $list );
                if (! $validation ) $column->save();
                continue;
            }
            $model_name = $obj->name;
            if (! in_array( $id, $ids ) ) {
                if ( $col_name !== $obj->primary && ( !$column->not_delete ||
                    $app->develop ) ) {
                    if (! $validation ) {
                        // Cleanup relation
                        if ( $column->type == 'relation' ) {
                            $rel_model = $column->options;
                            $rel_name = $column->name;
                            $placements = $db->model( 'relation' )->load(
                                ['name' => $rel_name, 'from_obj' => $obj->name,
                                 'to_obj' => $rel_model ], null, 'id' );
                            if ( count( $placements ) ) {
                                $db->model( 'relation' )->remove_multi( $placements );
                            }
                        } else if ( $column->type == 'blob' ) {
                            $colName = $column->name;
                            $meta_objs = $db->model( 'meta' )->load(
                                ['model' => $model_name, 'key' => $colName, 'kind' => 'metadata'], null, 'id' );
                            if (! empty( $meta_objs ) ) {
                                if ( $BLOB2FILE ) {
                                    foreach ( $meta_objs as $meta_obj ) {
                                        $meta_obj->remove();
                                    }
                                } else {
                                    $db->model( 'meta' )->remove_multi( $meta_objs );
                                }
                            }
                            if ( $db->blob_path && $BLOB2FILE ) {
                                $colModel = $db->prefix . $model_name;
                                $sql = "SELECT {$model_name}_{$colName} FROM {$colModel} "
                                     . "WHERE {$name}_$colName IS NOT NULL OR {$name}_$colName != ''";
                                $results = $db->db->query( $sql );
                                $results = $results->fetchAll();
                                foreach ( $results as $result ) {
                                    $value = $result["{$model_name}_{$colName}"];
                                    if ( strpos( $value, 'a:1:{s:8:"basename";s:' ) === 0 ) {
                                        $unserialized = @unserialize( $value );
                                        if ( is_array( $unserialized ) 
                                            && isset( $unserialized['basename'] ) ) {
                                            $basename = $unserialized['basename'];
                                            $blob_path = $db->blob_path;
                                            $blob_path .= $model_name;
                                            $blob = $blob_path . DS . $basename;
                                            if ( file_exists( $blob ) ) {
                                                @unlink( $blob );
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $column->remove();
                        unset( $db->scheme[ $name ]['column_defs'][ $col_name ] );
                    }
                    continue;
                }
            }
            $type = $app->param( '_type_' . $id );
            if (! $type || !isset( $types[ $type ] ) ) {
                $errors[] = $app->translate( 'Invalid type (%s).', $type );
                continue;
            }
            $orig_type = $type;
            list( $type, $size ) = $types[ $type ];
            $size = (int) $size;
            if ( $type == 'decimal' ) {
                $size = $app->param( '_size_' . $id );
                $decimal_err = '';
                if (! $this->validate_decimal( $size, $decimal_err ) ) {
                    $errors[] = $decimal_err;
                }
            }
            $autoset = $app->param( '_autoset_' . $id );
            $autoset = (int) $autoset;
            if (! $size ) $size = ''; // null?
            $label = $app->param( '_label_' . $id );
            $options = $app->param( '_options_' . $id );
            $extra = $app->param( '_extra_' . $id );
            $validation_type = $app->param( '_validation_type_' . $id );
            $maxlength = $app->param( '_maxlength_' . $id );
            if ( $maxlength ) {
                $maxlength = trim( $maxlength );
                if ( strpos( $maxlength, ',' ) !== false ) {
                    $maxlengths = preg_split( '/\s*,\s*/', $maxlength );
                    $min = (int) $maxlengths[0];
                    $max = (int) $maxlengths[1];
                    $maxlength = "{$min},{$max}";
                } else {
                    $maxlength = (int) $maxlength;
                }
            }
            $disp_edit = $app->param( '_disp_edit_' . $id );
            $default = $app->param( '_default_' . $id );
            $not_null = $app->param( '_not_null_' . $id ) ? 1 : 0;
            $index = $app->param( '_index_' . $id ) ? 1 : 0;
            if ( $index && ! in_array( $type, $can_index ) ) {
                $errors[] = $app->translate( 'Can not specify an index for \'%s\'.', $type );
                $index = 0;
            }
            $unique = $app->param( '_unique_' . $id ) ? 1 : 0;
            $unchangeable = $app->param( '_unchangeable_' . $id ) ? 1 : 0;
            $list = $app->param( '_list_' . $id );
            $edit = $app->param( '_edit_' . $id );
            $translate = $app->param( '_trans_' . $id );
            $hint = $app->param( '_hint_' . $id );
            if ( $edit && ! in_array( $edit, $edit_types ) ) {
                if ( strpos( $edit, ':' ) === false ||
                    !$app->is_valid_property( str_replace( ':', '', $edit ) ) ) {
                    $errors[] = $app->translate( 'Invalid edit type (%s).', $edit );
                    $edit = ''; // error
                }
            }
            if ( $list && ! in_array( $list, $list_types ) ) {
                if ( strpos( $list, ':' ) === false ||
                    !$app->is_valid_property( str_replace( ':', '', $list ) ) ) {
                    $errors[] = $app->translate( 'Invalid list type (%s).', $list );
                    $list = ''; // error
                }
            }
            if ( $column->type != $type && $validation && $column->type != 'relation' ) {
                $test = "SELECT COUNT({$obj->name}_id) FROM mt_{$obj->name} WHERE {$obj->name}_{$col_name} != '' AND {$obj->name}_{$col_name} IS NOT NULL";
                $cnt = $db->db->query( $test )->fetchAll();
                $cnt = $cnt[0];
                $cntKey = array_keys( $cnt )[0];
                $cnt = (int) $cnt[ $cntKey ];
                if ( $cnt ) {
                    if ( $type == 'int' || $type == 'tinyint' || $type == 'decimal' || $type == 'double' ) {
                        if ( $column->type == 'tinyint' && $type == 'int') {
                        } else {
                            $errors[] = $app->translate( "Column '%s' cannot be converted because a record already contains a value.", $col_name );
                        }
                    } else if ( $type == 'datetime' ) {
                        $errors[] = $app->translate( "Column '%s' cannot be converted because a record already contains a value.", $col_name );
                    }
                }
            }
            if ( $not_null && $validation && $column->type != 'relation' ) {
                $test = "SELECT COUNT({$obj->name}_id) FROM mt_{$obj->name} WHERE {$obj->name}_{$col_name} IS NULL";
                $cnt = $db->db->query( $test )->fetchAll();
                $cnt = $cnt[0];
                $cntKey = array_keys( $cnt )[0];
                $cnt = (int) $cnt[ $cntKey ];
                if ( $cnt && strpos( $column->type, 'int' ) !== false ) {
                    $null_objs = $db->model( $obj->name )->load( "SELECT {$obj->name}_id FROM mt_{$obj->name} WHERE {$obj->name}_{$col_name} IS NULL" );
                    foreach ( $null_objs as $idx => $null_obj ) {
                        $null_obj->$col_name( 0 );
                        $null_objs[ $idx ] = $null_obj;
                    }
                    if (!empty( $null_objs ) ) {
                        foreach ( $null_objs as $null_obj ) {
                            $null_obj->save();
                        }
                    }
                    $cnt = 0;
                    /*
                    $cnt = $db->db->query( $test )->fetchAll();
                    $cnt = $cnt[0];
                    $cntKey = array_keys( $cnt )[0];
                    $cnt = (int) $cnt[ $cntKey ];
                    */
                }
                if ( $cnt ) {
                    $errors[] = $app->translate( "Column '%s' cannot be converted because a record already exists that value is null.", $col_name );
                }
            }
            if ( $type === 'string' && $column->size > $size && $validation ) {
                $test = "SELECT {$obj->name}_{$col_name} FROM mt_{$obj->name} WHERE CHAR_LENGTH({$obj->name}_{$col_name})=( SELECT MAX(CHAR_LENGTH({$obj->name}_{$col_name})) FROM mt_{$obj->name})";
                $res = $db->db->query( $test )->fetchAll();
                $res = array_shift( $res );
                $res = array_shift( $res );
                $len = mb_strlen( $res );
                if ( $len > $size ) {
                    $errors[] = $app->translate( "Column '%s' cannot be converted because a record with a string length longer than the specified length already exists.", $col_name );
                }
            }
            if (! $validation && $column->type != $type && $column->type == 'relation' ) {
                $relations = $app->db->model( 'relation' )->load( ['name' => $col_name, 'from_obj' => $obj->name ] );
                if (! empty( $relations ) ) {
                    $app->db->model( 'relation' )->remove_multi( $relations );
                }
            }
            $rel_model = '';
            if ( $type === 'int' ) {
                if ( strpos( $edit, 'relation:' ) === 0 ||
                     strpos( $edit, 'reference:' ) === 0 ) {
                    $edit_props = explode( ':', $edit );
                    if ( $edit_props[1] !== '__any__' ) {
                        $rel_model = $edit_props[1];
                        $disp_edit = $edit_props[0];
                    }
                }
            } else if ( $type === 'relation' && $options !== '__any__' ) {
                $rel_model = $options;
            }
            $column->type( $type );
            $column->size( $size );
            $column->label( $label );
            $column->options( $options );
            $column->extra( $extra );
            $column->validation_type( $validation_type );
            $column->maxlength( $maxlength );
            $column->order( $order );
            $column->not_null( $not_null );
            $column->index( $index );
            $column->disp_edit( $disp_edit );
            $column->rel_model( $rel_model );
            if ( $column->name == 'status' ) {
                $column->default( $obj->default_status );
            } else if ( $type == 'boolean' ) {
                $default = $default ? 1 : 0;
                $column->default( $default );
            } else if ( $type == 'integer' ) {
                $default += 0;
                $column->default( $default );
            } else {
                $column->default( $default );
            }
            $column->unique( $unique );
            $column->unchangeable( $unchangeable );
            $column->list( $list );
            $column->edit( $edit );
            $column->translate( $translate );
            $column->hint( $hint );
            $column->autoset( $autoset );
            if ( empty( $errors ) ) {
                $app->set_default( $column );
                if (! $validation ) $column->save();
            }
            if ( $column->list == 'primary' && $column->edit == 'primary' ) {
                $primary_cols[] = $column->name;
            }
        }
        $baseModel = $db->model( $obj->name )->new();
        $prefix = $obj->name;
        foreach ( $add_ids as $id ) {
            $name = strtolower( trim( $app->param( '_new_name_' . $id ) ) );
            if ( in_array( $name, $col_names ) ) {
                $errors[] = $app->translate( 'A %1$s with the same %2$s already exists.',
                     [ $name, $app->translate( 'column' ) ] );
                continue;
            }
            $col_names[] = $name;
            if (! $app->is_valid_property( $name, $msg, true ) ) {
                $errors[] = $msg;
                continue;
            }
            if ( in_array( $name, $not_specify ) ) {
                $errors[] = $app->translate( "The name '%s' can not be specified.", $name );
            } else if ( $name !== 'model' && method_exists( $baseModel, $name ) ) {
                $errors[] = $app->translate( "The name '%s' can not be specified.", $name );
            }
            if ( strpos( $name, $prefix ) === 0 ) {
                $errors[] =
                    $app->translate( "The name starting with '%s' can not be specified(%s).",
                        [ $prefix, $name ] );
            }
            $label = $app->param( '_new_label_' . $id );
            $type = $app->param( '_new_type_' . $id );
            if (! $type || !isset( $types[ $type ] ) ) {
                $errors[] = $app->translate( 'Invalid type (%s).', $type );
                continue;
            }
            list( $type, $size ) = $types[ $type ];
            if ( $type === 'decimal' && $app->param( '_new_size_' . $id ) ) {
                $size = $app->param( '_new_size_' . $id );
                $decimal_err = '';
                if (! $this->validate_decimal( $size, $decimal_err ) ) {
                    $errors[] = $decimal_err;
                }
            }
            $order = $app->param( '_new_order_' . $id );
            $order = (int) $order;
            $autoset = $app->param( '_new_autoset_' . $id );
            $autoset = (int) $autoset;
            $options = $app->param( '_new_options_' . $id );
            $extra = $app->param( '_new_extra_' . $id );
            $validation_type = $app->param( '_new_validation_type_' . $id );
            $maxlength = $app->param( '_new_maxlength_' . $id );
            if ( $maxlength ) {
                $maxlength = trim( $maxlength );
                if ( strpos( $maxlength, ',' ) !== false ) {
                    $maxlengths = preg_split( '/\s*,\s*/', $maxlength );
                    $min = (int) $maxlengths[0];
                    $max = (int) $maxlengths[1];
                    $maxlength = "{$min},{$max}";
                } else {
                    $maxlength = (int) $maxlength;
                }
            }
            $disp_edit = $app->param( '_new_disp_edit_' . $id );
            $default = $app->param( '_new_default_' . $id );
            $not_null = $app->param( '_new_not_null_' . $id ) ? 1 : 0;
            $index = $app->param( '_new_index_' . $id ) ? 1 : 0;
            if ( $index && ! in_array( $type, $can_index ) ) {
                $errors[] = $app->translate( 'Can not specify an index for \'%s\'.', $type );
                $index = 0;
            }
            $unique = $app->param( '_new_unique_' . $id ) ? 1 : 0;
            $unchangeable = $app->param( '_new_unchangeable_' . $id ) ? 1 : 0;
            $list = $app->param( '_new_list_' . $id );
            $translate = $app->param( '_new_trans_' . $id );
            $hint = $app->param( '_new_hint_' . $id );
            if (! $primary && $list === 'primary' ) {
                $obj->primary( $list );
            }
            $edit = $app->param( '_new_edit_' . $id );
            if ( $edit && !in_array( $edit, $edit_types ) ) {
                if ( strpos( $edit, ':' ) === false ||
                    !$app->is_valid_property( str_replace( ':', '', $edit ) ) ) {
                    $errors[] = $app->translate( 'Invalid edit type (%s).', $edit );
                    $edit = '';
                }
            }
            if ( $list && !in_array( $list, $list_types ) ) {
                if ( strpos( $list, ':' ) === false ||
                    !$app->is_valid_property( str_replace( ':', '', $list ) ) ) {
                    $errors[] = $app->translate( 'Invalid list type (%s).', $list );
                    $list = '';
                }
            }
            if ( $type == 'boolean' ) {
                $default = $default ? 1 : 0;
            } else if ( $type == 'int' && $default ) {
                $default = (int) $default;
            }
            $rel_model = '';
            if ( empty( $errors ) ) {
                if ( $type == 'int' ) {
                    if ( strpos( $edit, 'relation:' ) === 0 ||
                        strpos( $edit, 'reference:' ) === 0 ) {
                        $edit_props = explode( ':', $edit );
                        if ( $edit_props[1] != '__any__' ) {
                            $rel_model = $edit_props[1];
                            $disp_edit = $edit_props[0];
                        }
                    }
                } else if ( $type == 'relation' && $options != '__any__' ) {
                    $rel_model = $options;
                }
                $column = $db->model( 'column' )->get_by_key( [
                    'table_id'  => $obj->id,
                    'name'      => $name,
                    'label'     => $label,
                    'type'      => $type,
                    'size'      => $size,
                    'order'     => $order,
                    'not_null'  => $not_null,
                    'index'     => $index,
                    'extra'     => $extra,
                    'validation_type'=> $validation_type,
                    'maxlength' => $maxlength,
                    'options'   => $options,
                    'rel_model' => $rel_model,
                    'disp_edit' => $disp_edit,
                    'unique'    => $unique,
                    'list'      => $list,
                    'edit'      => $edit,
                    'autoset'   => $autoset,
                    'default'   => $default,
                    'unchangeable' => $unchangeable,
                    'translate' => $translate,
                    'hint'      => $hint
                ] );
                $app->set_default( $column );
                if (! $validation ) $column->save();
                if ( $column->list == 'primary' && $column->edit == 'primary' ) {
                    $primary_cols[] = $column->name;
                }
            }
        }
        $label = $app->param( 'label' );
        $plural = $app->param( 'plural' );
        if ( ( strlen( $label ) !== mb_strlen( $label ) ) || ( strlen( $plural ) !== mb_strlen( $plural ) ) ) {
            $errors[] = $app->translate( 'Multibyte characters are not allowed in label and plural.' );
        }
        if ( $validation ) {
            $message = ['status' => 200];
            header( 'Content-type: application/json' );
            if (! empty( $errors ) ) {
                array_unshift( $errors, '' );
                $message['status'] = 500;
                $message['error'] = join( "\n", $errors );
            }
            echo json_encode( $message );
            exit();
        }
        if (! empty( $errors ) ) {
            $cb['error'] = join( "\n", $errors );
            return false;
        }
        if (!empty( $primary_cols ) && !in_array( $obj->primary, $primary_cols ) ) {
            $obj->primary( $primary_cols[0] );
        }
        if (!$obj->primary && !$cb['is_new'] ) {
            $column = $db->model( 'column' )->get_by_key(
              ['table_id' => $obj->id, 'type' => 'string'],
              ['sort' => 'order', 'direction' => 'ascend'], 'id,name' );
            if ( $column->id ) {
                $obj->primary( $column->name );
            }
        }
        return true;
    }

    function validate_decimal ( $size, &$error = '' ) {
        $app = Prototype::get_instance();
        if (! $size || strpos( $size, ',' ) === false ) {
            $error = $app->translate( 'Please specify the ranges of values(Comma separated values).' );
            return false;
        }
        list( $m, $d ) = preg_split( '/\s*,\s*/', $size );
        list( $m, $d ) = [(int)$m, (int)$d ];
        if ( $m < 1 || $m > 65 || $d < 0 || $d > 35 || $m < $d ) {
            $error = $app->translate( 'M has a range of 1 to 65, D has a range of 0 to 30, and must be no larger than M.' );
            return false;
        }
        return true;
    }

    function post_save_table ( $cb, $app, $obj, $original = null ) {
        $this->start_upgrade( $app, $obj->name );
        $app->caching = false;
        $force = false;
        $is_child = $obj->space_child;
        $db = $app->db;
        $db->logging = false;
        $ctx = $app->ctx;
        $ctx->logging = false;
        $workspace_col = $db->model( 'column' )->get_by_key
            ( ['table_id' => $obj->id, 'name' => 'workspace_id'] );
        if ( $workspace_col->id ) $is_child = true;
        if( $is_child || $obj->sortable || $obj->auditing || $obj->taggable || $obj->taxonomy
            || $obj->has_status || $obj->start_end || $obj->has_extra_path || $obj->has_basename
            || $obj->assign_user || $obj->revisable || $obj->display_space
            || $obj->hierarchy || $obj->allow_comment || $obj->has_uuid 
            || $obj->has_assets || $obj->has_attachments || $obj->has_form ) {
            $last = $db->model( 'column' )->load
                    ( ['table_id' => $obj->id ],
                      ['sort' => 'order', 'direction' => 'descend', 'limit' => 1] );
            $last = (! empty( $last ) ) ? $last[0]->order : 10;
            $last++;
            $upgrade = false;
            if ( $obj->sortable ) {
                $values = ['type' => 'int', 'size' => 11,
                           'label'=> 'Order',
                           'list' => 'number', 'edit' => 'number',
                           'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'order', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->assign_user ) {
                $values = ['type' => 'int', 'size' => 11,
                           'label'=> 'User',
                           'list' => 'reference:user:nickname',
                           'edit' => 'relation:user:nickname:dialog',
                           'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'user_id', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
                $values = ['type' => 'int', 'size' => 11,
                           'label'=> 'Previous Owner',
                           'list' => 'reference:user:nickname',
                           'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'previous_owner', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->has_form ) {
                $values = ['type' => 'int', 'size' => 11,
                           'label'=> 'Form',
                           'edit' => 'relation:form:name:dialog',
                           'list' => 'reference:form:name',
                           'index' => 1,
                           'order' => $last ];
                if ( $this->make_column( $obj, 'form_id', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->has_assets ) {
                $edit = "relation:asset:label:dialog";
                $values = ['type' => 'relation',
                           'label'=> 'Assets',
                           'edit' => $edit,
                           'options' => 'asset',
                           'order' => $last ];
                if ( $this->make_column( $obj, 'assets', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->has_attachments ) {
                $edit = "relation:attachmentfile:name:dialog";
                $values = ['type' => 'relation',
                           'label'=> 'Attachment Files',
                           'edit' => $edit,
                           'options' => 'attachmentfile',
                           'order' => $last ];
                if ( $this->make_column( $obj, 'attachmentfiles', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->allow_comment ) {
                $values = ['type' => 'tinyint', 'size' => 4,
                           'label'=> 'Accept Comments',
                           'list' => 'checkbox',
                           'edit' => 'checkbox',
                           'order' => $last ];
                if ( $this->make_column( $obj, 'allow_comment', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->hierarchy ) {
                $name = $obj->name;
                $primary = $obj->primary;
                $list = "reference:{$name}:{$primary}";
                $edit = "relation:{$name}:{$primary}:select";
                $values = ['type' => 'int', 'size' => 11,
                           'label'=> 'Parent',
                           'default' => 0,
                           'list' => $list,
                           'edit' => $edit,
                           'not_null' => 1,
                           'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'parent_id', $values, true ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->taggable ) {
                $values = ['type' => 'relation',
                           'label'=> 'Tags',
                           'list' => 'reference:tag:name',
                           'edit' => 'relation:tag:name:dialog',
                           'options' => 'tag', 'order' => $last ];
                if ( $this->make_column( $obj, 'tags', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->taxonomy ) {
                $values = ['type' => 'relation',
                           'label'=> 'Taxonomies',
                           'list' => 'reference:taxonomy:name',
                           'edit' => 'relation:taxonomy:name:dialog',
                           'options' => 'taxonomy', 'order' => $last ];
                if ( $this->make_column( $obj, 'taxonomies', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->start_end ) {
                $start_end_cols = ['published_on' => 'Publish Date',
                                   'unpublished_on' => 'Unpublish Date',
                                   'has_deadline' => 'Specify the Deadline'];
                foreach ( $start_end_cols as $name => $label ) {
                    $col = $db->model( 'column' )->get_by_key
                      ( ['table_id' => $obj->id, 'name' => $name ] );
                    if (! $col->id ) {
                        $col->label( $label );
                        if ( $name !== 'has_deadline' ) {
                            $col->set_values( ['type' => 'datetime', 'index' => 1,
                                               'list' => 'date', 'edit' => 'datetime',
                                               'order' => $last ] );
                        } else {
                            $col->set_values( ['type' => 'tinyint', 'size' => 4,
                            'list' => 'checkbox', 'index' => 1, 'order' => $last ] );
                        }
                        $app->set_default( $col );
                        $col->save();
                        $upgrade = true;
                        $last++;
                    }
                }
            }
            if ( $obj->has_status ) {
                $col = $db->model( 'column' )->get_by_key(
                        ['table_id' => $obj->id, 'name' => 'status'] );
                $status_create = false;
                if (! $col->id ) {
                    $status_create = true;
                } else {
                    $status_opt = $col->options;
                    $statuses = explode( ',', $status_opt );
                    if ( $obj->start_end && count( $statuses ) != 6 ) {
                        $status_create = true;
                    } else if (! $obj->start_end && count( $statuses ) != 2 ) {
                        $status_create = true;
                    }
                }
                if ( $status_create ) {
                    if ( $obj->start_end ) {
                        $status_opt = 'Draft,Review,Approval Pending,Reserved,Publish,Ended';
                    } else {
                        $status_opt = 'Disable,Enable';
                    }
                    $values = ['type' => 'int', 'size' => 11, 'default' => 1,
                               'label'=> 'Status', 'list' => 'number',
                               'edit' => 'selection', 'disp_edit' => 'select',
                               'options' => $status_opt, 'index' => 1, 'order' => $last ];
                    if ( $this->make_column( $obj, 'status', $values, true ) ) {
                        $last++;
                        $upgrade = true;
                    }
                }
            }
            if ( $obj->has_extra_path ) {
                $values = ['type' => 'string', 'size' => 255,
                           'label'=> 'Path',
                           'list' => 'text_short',
                           'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'extra_path', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->has_basename ) {
                $values = ['type' => 'string', 'size' => 255,
                           'label'=> 'Basename',
                           'edit' => 'text_short', 'not_null' => 1,
                           'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'basename', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->has_uuid ) {
                $values = ['type' => 'string', 'size' => 255,
                           'label'=> 'UUID',
                           'edit' => 'text_short',
                           'unchangeable' => 1,
                           'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'uuid', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->space_child || $obj->display_space ) {
                $values = ['type' => 'int', 'size' => 11,
                           'label'=> 'WorkSpace',
                           'default' => 0,
                           'list' => 'reference:workspace:name', 'unchangeable' => 1,
                           'autoset' => 1, 'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'workspace_id', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
            }
            if ( $obj->revisable ) {
                $values = ['type' => 'int', 'size' => 11, 'autoset' => 1,
                           'label'=> 'Type', 'not_null' => 1, 'list' => 'text_short',
                           'default' => '0', 'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'rev_type', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
                $values = ['type' => 'int', 'size' => 11,
                           'label'=> 'Object ID', 'autoset' => 1,
                           'index' => 1, 'order' => $last ];
                if ( $this->make_column( $obj, 'rev_object_id', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
                $values = ['type' => 'string', 'size' => 255, 'autoset' => 1,
                           'label'=> 'Changed', 'list' => 'text', 'order' => $last ];
                if ( $this->make_column( $obj, 'rev_changed', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
                $values = ['type' => 'string', 'size' => 255, 'index' => 1, 'list' => 'text',
                           'label'=> 'Change Note', 'order' => $last ];
                if ( $this->make_column( $obj, 'rev_note', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
                $values = ['type' => 'text', 'label'=> 'Diff', 'list' => 'popover',
                           'order' => $last, 'autoset' => 1];
                if ( $this->make_column( $obj, 'rev_diff', $values, $force ) ) {
                    $last++;
                    $upgrade = true;
                }
                if (! $obj->auditing ) $obj->auditing( 2 );
            }
            if ( $is_child ) {
                $ws_table = $db->model( 'table' )->get_by_key( ['name' => 'workspace'] );
                if ( $ws_table->id ) {
                    $this->set_child_tables( $obj->name, $ws_table, true, true );
                }
            }
            if ( $obj->auditing ) {
                $auditing_cols = [
                     'created_on'  => 
                         ['label' => 'Date Created', 'type' => 'datetime'],
                     'modified_on' => 
                         ['label' => 'Date Modified', 'type' => 'datetime'],
                     'created_by'  => 
                         ['label' => 'Created By', 'type' => 'reference:user:nickname'],
                     'modified_by' => 
                         ['label' => 'Modified By', 'type' => 'reference:user:nickname']
                     ];
                foreach ( $auditing_cols as $name => $props ) {
                    $col = $db->model( 'column' )->get_by_key
                      ( ['table_id' => $obj->id, 'name' => $name ] );
                    if (! $col->id ) {
                        list( $label, $type ) = [ $props['label'], $props['type'] ];
                        $col->label( $label );
                        if ( $type === 'datetime' ) {
                            $col->type( $type );
                            if ( $name === 'modified_on' ) $col->list( $type );
                        } else {
                            $col->type( 'int' );
                            $col->size( 11 );
                            if ( $name == 'modified_by' ) $col->list( $type );
                        }
                        $col->set_values(
                            ['index' => 1, 'autoset' => 1, 'order' => $last ] );
                        $app->set_default( $col );
                        if ( $obj->auditing == 1 ) $col->save();
                        if ( $obj->auditing == 2 ) {
                            if ( strpos( $name, 'modified' ) === 0 ) {
                                $col->save();
                            }
                        }
                    }
                    $upgrade = true;
                    $last++;
                }
            }
        }
        if (! $cb['is_new'] ) {
            $return_args = '?__mode=view&_type=edit&_model=table&id=' . $obj->id . '&saved=1';
            $app->redirect( $app->admin_url . $return_args, true );
            $this->upgrade_scheme( $obj->name );
        }
        $model = $obj->name;
        $version_opt =
          $app->db->model( 'option' )->get_by_key(
          ['kind' => 'scheme_version', 'key' => $model ] );
        $scheme_v = $version_opt->value ?? '0';
        $new_ver =  $obj->version ?? '0';
        $comp = version_compare( $scheme_v, $new_ver );
        if ( $comp !== 0 ) {
            $version_opt->value( $new_ver );
            $version_opt->save();
        }
        if (! $cb['is_new'] && ! $original->has_uuid && $obj->has_uuid ) {
            unset( $db->show_columns[ $obj->name ] );
            $scheme = $app->get_scheme_from_db( $obj->name, true );
            $column_defs = $scheme['column_defs'];
            $_model = $db->model( $obj->name )->new();
            $terms = ['uuid' => ['IS NULL' => 1]];
            $cols = ['id'];
            foreach ( $column_defs as $column_name => $column_def ) {
                if ( isset( $column_def['not_null'] ) && $column_def['not_null'] == 1
                    && $column_def['type'] != 'relation' ) {
                    $cols[] = $column_name;
                }
            }
            $cols = array_unique( $cols );
            $objects = $db->model( $obj->name )->load( $terms, null, $cols, ' OR ' .
                $_model->_colprefix . 'uuid=\'\'' );
            if (! empty( $objects ) ) {
                $new_objects = [];
                foreach ( $objects as $uu_obj ) {
                    $uu_obj->uuid( $app->generate_uuid() );
                    $new_objects[] = $uu_obj;
                }
                $db->in_upgrade = true;
                $_model->update_multi( $new_objects );
            }
        }
        if (! $original || ( $original && $obj->template_tags != $original->template_tags ) ) {
            $app->clear_all_cache();
        }
        if (!empty( $db->errors ) ) {
            return $app->error( implode( "\n", $db->errors ) );
        }
        if (! $cb['is_new'] ) return;
        $values = ['type' => 'int', 'size' => 11,
                   'label'=> 'ID', 'is_primary' => 1,
                   'list' => 'number', 'edit' => 'hidden',
                   'index' => 1, 'order' => 1, 'not_null' => 1];
        $this->make_column( $obj, 'id', $values, $force );
        $db->upgrader = false;
        $scheme = $app->get_scheme_from_db( $model );
        $colprefix = $db->colprefix;
        if ( $colprefix ) {
            if ( strpos( $colprefix, '<model>' ) !== false )
                $colprefix = str_replace( '<model>', $model, $colprefix );
            else if ( strpos( $colprefix, '<table>' ) !== false )
                $colprefix = str_replace( '<table>', $app->_table, $colprefix );
        }
        if (! isset( $scheme['indexes']['PRIMARY'] ) ) {
            $scheme['indexes']['PRIMARY'] = $db->id_column;
            $scheme['column_defs'][ $db->id_column ] =
                ['type' => 'int', 'size' => 11, 'not_null' => 1];
        }
        $db->upgrader = true;
        $db->caching = false;
        $res = $db->base_model->create_table( $model, $db->prefix . $model,
                                                $colprefix, $scheme, true );
        if (!empty( $db->errors ) ) {
            return $app->error( implode( "\n", $db->errors ) );
        }
        $db->upgrader = false;
        $db->logging = true;
        $ctx->logging = true;
        return $res;
    }

    function post_delete_table ( &$cb, $app, &$obj ) {
        $name = $obj->name;
        $scheme = $cb['scheme'];
        if ( $scheme ) {
            $edit_props = $scheme['edit_properties'];
            if ( array_search( 'relation:attachmentfile:name:dialog', $edit_props ) ) {
                $columns = [];
                foreach ( $edit_props as $key => $value ) {
                    if ( $value === 'relation:attachmentfile:name:dialog' ) {
                        $columns[] = $key;
                    }
                }
                foreach ( $columns as $colName ) {
                    $objs_with_file = $app->db->model( $name )->load(
                                      [ $colName => ['>' => 0] ], null, $colName );
                    foreach ( $objs_with_file as $obj_with_file ) {
                        $attach_id = (int) $obj_with_file->$colName;
                        $attachmentfile = $app->db->model( 'attachmentfile' )->load(
                            $attach_id, null, 'id' );
                        if ( $attachmentfile ) {
                            $app->remove_object( $attachmentfile );
                        }
                    }
                }
            }
        }
        $options = $app->db->model( 'option' )->load(
            ['key' => $name, 'kind' => 'scheme_version'], null, 'id' );
        if (! empty( $options ) ) {
            $app->remove_objects['option'] = $options;
        }
        $from_objs = $app->db->model( 'relation' )->load(
            ['from_obj' => $name ], null, 'id,to_obj,to_id' );
        $to_objs = $app->db->model( 'relation' )->load( ['to_obj' => $name ], null, 'id' );
        $relations = array_merge( $from_objs, $to_objs );
        if (! empty( $relations ) ) {
            $app->remove_objects['relation'] = $relations;
            $attachmentfiles = [];
            foreach ( $from_objs as $relation ) {
                if ( $relation->to_obj === 'attachmentfile' ) {
                    $attachmentfile = $app->db->model( 'attachmentfile' )->load(
                        (int) $relation->to_id, null, 'id' );
                    if ( $attachmentfile ) {
                        $app->remove_object( $attachmentfile );
                    }
                }
            }
        }
        $meta = $app->db->model( 'meta' )->load( ['model' => $name ], null, 'id' );
        if (! empty( $meta ) ) {
            $app->remove_objects['meta'] = $meta;
        }
        $urlmapping = $app->db->model( 'urlmapping' )->load( ['model' => $name ] );
        if (! empty( $urlmapping ) ) {
            $app->remove_objects['urlmapping'] = $urlmapping;
        }
        $urlinfo = $app->db->model( 'urlinfo' )->load( ['model' => $name ] );
        if (! empty( $urlinfo ) ) {
            $app->remove_objects['urlinfo'] = $urlinfo;
        }
        $logging = $app->logging;
        $app->logging = false;
        $error_reporting = ini_get( 'error_reporting' );
        error_reporting(0);
        $columns = $app->db->model( 'column' )->load(
            ['rel_model' => $obj->name, 'table_id' => ['!=' => $obj->id ] ] );
        if (! empty( $columns ) ) {
            $relTables = [];
            foreach ( $columns as $column ) {
                if ( $column->type == 'relation' ) {
                    $column->remove();
                } else if ( $column->type == 'int' ) {
                    $relTable = $app->db->model( 'table' )->load( $column->table_id );
                    $column->remove();
                    if ( $relTable ) {
                        $relTables[] = $relTable->name;
                    }
                }
            }
            if (! empty( $relTables ) ) {
                foreach ( $relTables as $relTable ) {
                    $this->upgrade_scheme( $relTable );
                }
            }
        }
        $app->db->can_drop = true;
        $upgrader = new PTUpgrader;
        $upgrader->drop( $obj );
        $app->db->drop( $name );
        $app->clear_all_cache( false );
        error_reporting( $error_reporting );
        $app->logging = $logging;
        return true;
    }

    function make_column ( $obj, $name, $values, $force = false ) {
        $app = Prototype::get_instance();
        $col = $app->db->model( 'column' )->get_by_key
            ( ['table_id' => $obj->id, 'name' => $name ] );
        if (! $col->id || $force ) {
            if ( $col->order ) unset( $values['order'] );
            $col->set_values( $values );
            $app->set_default( $col );
            $col->save();
            return $col;
        }
    }

    function set_child_tables ( $child, &$parent, $attach = true, $save = true ) {
        $child_tables = $parent->child_tables;
        $child_tables = $child_tables ? explode( ',', $parent->child_tables ) : [];
        $flipped = array_flip( $child_tables );
        if ( $attach ) {
            $flipped[ $child ] = $attach;
        } else {
            unset( $flipped[ $child ] );
        }
        $parent->child_tables( join( ',', array_keys( $flipped ) ) );
        if ( $save ) $parent->save();
        return $parent;
    }

    function version_up ( $app, $old, $version ) {
        $lang = $app->language;
        if ( $app->id == 'Prototype' && $app->user() ) {
            $lang = $app->user()->language;
        }
        $app->set_language( null, $lang );
        $languages = $app->languages;
        $languages[] = 'default';
        foreach ( $languages as $lang ) {
            $cache_key = 'phrase' . DS . "locale_{$lang}__c";
            $app->clear_cache( $cache_key );
        }
        $app->clear_cache( 'app_configs__c' );
        if (! $app->force_compile ) $app->fmgr->rmdir( $app->compile_dir, true );
        $this->start_upgrade( $app );
        $upgrade_functions = $this->core_upgrade_functions( $old );
        foreach ( $upgrade_functions as $func ) {
            list( $component, $method ) = [ $func['component'], $func['method'] ];
            $component = $app->component( $component );
            if ( is_object( $component ) && method_exists( $component, $method ) ) {
                $component->$method( $app );
            }
        }
        $sessions = $app->db->model( 'session' )->load(
            ['name' => 'system_info', 'kind' => 'CH'], null, 'id' );
        if (! empty( $sessions ) ) {
            $app->db->model( 'session' )->remove_multi( $sessions );
        }
        $sessions = $app->db->model( 'session' )->load(
            ['name' => 'news_box', 'kind' => 'CH'], null, 'id' );
        if (! empty( $sessions ) ) {
            $app->db->model( 'session' )->remove_multi( $sessions );
        }
        $app->set_config( ['app_version' => $version ] );
        $app->app_version = $version;
        $message = $app->translate( 'PowerCMS X has been upgraded from version %s to version %s.', [ $old, $version ] );
        $app->log( ['message'  => $message,
                    'category' => 'version'] );
        $app->clear_all_cache( false, false, true );
    }

    function upgrade_status ( $app ) {
        $tables = $app->db->model( 'table' )->load( ['start_end' => 1] );
        $options = 'Draft,Review,Approval Pending,Reserved,Publish,Ended';
        foreach ( $tables as $table ) {
            $col = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id,
                                                       'name' => 'status'] );
            if ( $col->id && $col->options != $options ) {
                $col->options( $options );
                $col->save();
            }
            if ( $table->default_status && $table->default_status < 3 ) {
                $table->default_status( $table->default_status - 1 );
            } else if (! $table->default_status ) {
                $table->default_status( 0 );
            }
            $objects = $app->db->model( $table->name )->load( ['status' => ['<' => 3] ] );
            $update_objects = [];
            foreach ( $objects as $obj ) {
                if ( $obj->status ) {
                    $obj->status( $obj->status - 1 );
                    $update_objects[] = $obj;
                }
            }
            if (! empty( $update_objects ) ) {
                $app->db->model( $table->name )->update_multi( $update_objects );
            }
            $table->save();
        }
    }

    function set_workspace_children ( $app ) {
        $table = $app->db->model( 'table' )->get_by_key( ['name' => 'workspace'] );
        if (! $table->id ) return false;
        $child_models = ['entry', 'folder', 'workflow', 'widget', 'session', 'field', 'template',
                         'permission', 'comment', 'question', 'urlmapping', 'urlinfo', 'menu', 'attachmentfile',
                         'queue', 'category', 'option', 'tag', 'contact', 'group', 'form', 'asset', 'page', 'ts_job'];
        $columns = $app->db->model( 'column' )->load( ['name' => 'workspace_id'], [], 'table_id' );
        foreach ( $columns as $column ) {
            $child = $app->db->model( 'table' )->load( $column->table_id, [], 'name' );
            if ( $child ) {
                $child_models[] = $child->name;
            }
        }
        $child_models = array_unique( $child_models );
        $child_models = implode( ',', $child_models );
        if ( $table->child_tables != $child_models ) {
            $table->child_tables( $child_models );
            $table->save();
            $cache_key = 'workspace' . DS . 'properties__c';
            $app->set_cache( $cache_key, $table );
            $app->stash( 'table:workspace', $table );
        }
        return $table;
    }

    function set_preferred ( $app ) {
        unset( $app->db->scheme['urlmapping'] );
        $app->logging = false;
        $dir = LIB_DIR . 'PADO' . DS . 'models';
        $this->setup_db( true, 'core', [ 'urlmapping' ], $dir );
        $app->get_scheme_from_db( 'urlmapping' );
        $db = $app->db;
        $workspaces = $db->model( 'workspace' )->load( [], null, 'id' );
        $ws_ids = [0];
        foreach ( $workspaces as $workspace ) {
            $ws_ids[] = (int) $workspace->id;
        }
        foreach ( $ws_ids as $ws_id ) {
            $urlmappings = $db->model( 'urlmapping' )->load(
              ['workspace_id' => $ws_id ], ['sort' => 'id', 'direction' => 'ascend'] );
            $models = [];
            foreach ( $urlmappings as $urlmapping ) {
                if ( $urlmapping->model == 'template' ) continue;
                if ( isset( $models[ $urlmapping->model ] ) ) continue;
                $models[ $urlmapping->model ] = true;
                $urlmapping->is_preferred( 1 );
                $urlmapping->save();
            }
        }
    }

    function update_perm ( $app ) {
        $sessions = $app->db->model( 'session' )->load(
                                                ['name' => 'user_permissions',
                                                 'kind' => 'PM'] );
        if ( is_array( $sessions ) && !empty( $sessions ) ) {
            $app->db->model( 'session' )->remove_multi( $sessions );
        }
    }

    function set_hierarchy ( $app ) {
        $tables = $app->db->model( 'table' )->load();
        foreach ( $tables as $table ) {
            if (! $table->hierarchy ) {
                $table->hierarchy( 0 );
                $table->save();
            }
        }
    }

    function set_session_key ( $app ) {
        $sessions = $app->db->model( 'session' )->load( ['kind' => 'US'] );
        foreach ( $sessions as $session ) {
            $session->key( 'user' );
            $session->save();
        }
    }

    function update1006 ( $app ) {
        $cf = $app->get_table( 'field' );
        $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $cf->id,
                                                            'name' => 'required'] );
        if ( $column->id && $column->hint ) {
            $column->hint( '' );
            $column->save();
        }
        $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $cf->id,
                                                            'name' => 'translate_labels'] );
        if ( $column->id && $column->label == 'Translate' ) {
            $column->label( 'Translate Labels' );
            $column->save();
        }
        $tables = $app->db->model( 'table' )->load();
        foreach ( $tables as $table ) {
            if ( $table->hierarchy != 1 ) {
                $table->hierarchy( 0 );
                $table->save();
            }
        }
    }

    function set_workspace ( $app ) {
        $tables = $app->db->show_tables();
        $pfx = DB_PREFIX;
        $db = $app->db;
        $db_name = PADO_DB_NAME;
        foreach ( $tables as $table ) {
            $t = $table[0];
            $t = preg_replace( "/^$pfx/", '', $t );
            $app->get_scheme_from_db( $t );
            if ( $db->model( $t )->has_column( 'workspace_id' ) ) {
                $sql = "SELECT COLUMN_DEFAULT FROM information_schema.columns where COLUMN_NAME='{$t}_workspace_id' and TABLE_SCHEMA = '{$db_name}' AND TABLE_NAME='mt_{$t}'";
                $result = $db->db->query( $sql );
                $result = $result->fetchAll();
                $result = $result[0][0];
                if ( $result === null ) {
                    $upgrade = "ALTER TABLE mt_{$t} CHANGE {$t}_workspace_id {$t}_workspace_id BIGINT NULL DEFAULT '0'";
                    $db->db->query( $upgrade );
                }
                $sql = "SELECT {$t}_id FROM {$pfx}{$t} WHERE {$t}_workspace_id IS NULL";
                $objects = $db->model( $t )->load( $sql );
                $update_objs = [];
                if ( is_array( $objects ) && ! empty( $objects ) ) {
                    foreach ( $objects as $obj ) {
                        $obj->workspace_id( 0 );
                        $update_objs[] = $obj;
                    }
                    if ( count( $update_objs ) ) {
                        $db->model( $t )->update_multi( $update_objs );
                    }
                }
            }
        }
        $tables = null;
    }

    function set_default_models ( $app ) {
        $app->set_config(
        ['default_models' =>
        'phrase,asset,attachmentfile,category,column,comment,contact,entry,field,fieldtype,folder,form,group,'
       .'log,menu,meta,option,page,permission,question,questiontype,queue,relation,remote_ip,role,session,table,'
       .'tag,template,ts_job,urlinfo,urlmapping,user,widget,workflow,workspace,taxonomy,association,api_cache'] );
        $this->install_field_types( $app, true, 'hidden' );
    }

    function tmpl_last_compiled ( $app ) {
        require_once( 'Prototype' . DS . 'Upgrader' . DS . 'upgrader.template.php' );
        $upgrader = new upgrader_template();
        $upgrader->tmpl_last_compiled( $app, $this );
    }

    function clear_thumbnail_meta ( $app ) {
        $meta = $app->db->model( 'meta' )->load( ['kind' => 'thumbnail'], null, 'id,object_id,model,key' );
        foreach ( $meta as $m ) {
            $key = $m->key;
            if ( $m->model && $m->object_id && $key ) {
                $obj = $app->db->model( $m->model )->load( $m->object_id, null, ['id', $key ] );
                if (! $obj || ( is_object( $obj ) && !$obj->$key ) ) {
                    $m->remove();
                }
            }
        }
    }

    function reset_mime_type ( $app ) {
        $urls = $app->db->model( 'urlinfo' )->load( ['mime_type' => 'application/octet-stream',
                                                     'delete_flag' => [0, 1] ], null,
                                                     'id,object_id,model,mime_type,url,delete_flag,file_path,key' );
        $reseted_obj = [];
        $records = [];
        foreach ( $urls as $url ) {
            if ( isset( $reseted_obj[ $url->model . '_' . $url->object_id ] ) ) continue;
            $reseted_obj[ $url->model . '_' . $url->key . '_' . $url->object_id ] = true;
            $mime_type = PTUtil::get_mime_type( $url->file_path );
            if ( $mime_type != 'application/octet-stream' ) {
                $meta = $app->db->model( 'meta' )->load( ['model' => $url->model,
                                                          'object_id' => $url->object_id,
                                                          'key' => $url->key ] );
                foreach ( $meta as $record ) {
                    if (! $record->text ) continue;
                    $json = json_decode( $record->text, true );
                    if ( $json !== false && isset( $json['mime_type'] )
                        && $json['mime_type'] == 'application/octet-stream' ) {
                        $json['mime_type'] = $mime_type;
                        $record->text( json_encode( $json ) );
                        $records[] = $record;
                    }
                }
                if ( $app->db->model( $url->model )->has_column( 'mime_type' ) ) {
                    $obj = $app->db->model( $url->model )->load( (int) $url->object_id );
                    if ( $obj && $obj->mime_type != $mime_type ) {
                        $obj->mime_type( $mime_type );
                        $obj->save();
                    }
                }
                $url->mime_type( $mime_type );
                $url->save();
            }
        }
        if (! empty( $records ) ) {
            $app->db->model( 'meta' )->update_multi( $records );
        }
    }

    function set_users_draft ( $app ) {
        $relations = $app->db->model( 'relation' )->load( ['name' => 'user_draft',
                                    'from_obj' => 'workflow', 'to_obj' => 'user'] );
        foreach ( $relations as $relation ) {
            $relation->name( 'users_draft' );
            $relation->save();
        }
    }

    function upgrade_role ( $app ) {
        $this->upgrade_scheme( 'role' );
    }

    function atfile_menu_pos ( $app ) {
        $table = $app->get_table( 'attachmentfile' );
        $table->menu_type( 2 );
        $table->save();
    }

    function upgrade_attach ( $app ) {
        $table = $app->get_table( 'attachmentfile' );
        $table->default_status( 4 );
        $table->save();
    }

    function add_field_type ( $app ) {
        $last = $app->db->model( 'fieldtype' )->load( [], ['limit' => 1, 'sort' => 'order', 'direction' => 'descend'] );
        $last = ! empty( $last ) ? $last[0]->order : 0;
        $field_dir = dirname( $app->pt_path ) . DS . 'tmpl' . DS . 'field' . DS . 'field_types' . DS . 'tmpl' . DS;
        $field = $app->db->model( 'fieldtype' )->get_by_key( ['basename' => 'asset'] );
        if (! $field->id && file_exists( $field_dir . 'asset_label.tmpl' )
            && file_exists( $field_dir . 'asset_content.tmpl' ) ) {
            $last++;
            $field->name( $app->translate( 'Asset' ) );
            $field->order( $last );
            $field->hide_label( 0 );
            $field->label( file_get_contents( $field_dir . 'asset_label.tmpl' ) );
            $field->content( file_get_contents( $field_dir . 'asset_content.tmpl' ) );
            $app->set_default( $field );
            $field->created_by( 0 );
            $field->modified_by( 0 );
            $field->save();
        }
        $field = $app->db->model( 'fieldtype' )->get_by_key( ['basename' => 'assets'] );
        if (! $field->id && file_exists( $field_dir . 'assets_label.tmpl' )
            && file_exists( $field_dir . 'assets_content.tmpl' ) ) {
            $last++;
            $field->name( $app->translate( 'Assets (Multiple)' ) );
            $field->order( $last );
            $field->hide_label( 0 );
            $field->label( file_get_contents( $field_dir . 'assets_label.tmpl' ) );
            $field->content( file_get_contents( $field_dir . 'assets_content.tmpl' ) );
            $app->set_default( $field );
            $field->created_by( 0 );
            $field->modified_by( 0 );
            $field->save();
        }
        $field = $app->db->model( 'fieldtype' )->get_by_key( ['basename' => 'image'] );
        if (! $field->id && file_exists( $field_dir . 'image_label.tmpl' )
            && file_exists( $field_dir . 'image_content.tmpl' ) ) {
            $last++;
            $field->name( $app->translate( 'Image' ) );
            $field->order( $last );
            $field->hide_label( 0 );
            $field->label( file_get_contents( $field_dir . 'image_label.tmpl' ) );
            $field->content( file_get_contents( $field_dir . 'image_content.tmpl' ) );
            $app->set_default( $field );
            $field->created_by( 0 );
            $field->modified_by( 0 );
            $field->save();
        }
        $field = $app->db->model( 'fieldtype' )->get_by_key( ['basename' => 'images'] );
        if (! $field->id && file_exists( $field_dir . 'images_label.tmpl' )
            && file_exists( $field_dir . 'images_content.tmpl' ) ) {
            $last++;
            $field->name( $app->translate( 'Images (Multiple)' ) );
            $field->order( $last );
            $field->hide_label( 0 );
            $field->label( file_get_contents( $field_dir . 'images_label.tmpl' ) );
            $field->content( file_get_contents( $field_dir . 'images_content.tmpl' ) );
            $app->set_default( $field );
            $field->created_by( 0 );
            $field->modified_by( 0 );
            $field->save();
        }
        $questions_dir = $app->path() . DS . 'tmpl' . DS . 'question' . DS . 'question_types';
        $tmpl_dir = $questions_dir . DS . 'tmpl' . DS;
        $basename = 'email_with_confirm';
        $last = $app->db->model( 'questiontype' )->load( null, ['sort' => 'order', 'direction' => 'descend', 'limit' => 1] );
        $question = $app->db->model( 'questiontype' )->get_by_key(
                ['basename' => $basename ] );
        if ( $question->id ) {
            $original = clone $question;
            PTUtil::pack_revision( $question, $original );
        }
        $last = is_array( $last ) && !empty( $last ) ? $last[0] : null;
        $last = $last ? $last->order + 1 : 10;
        $question->name( 'Email (Confirm)' );
        $question->order( $last );
        $question->template( file_get_contents( "{$tmpl_dir}{$basename}.tmpl" ) );
        $app->set_default( $question );
        $field->created_by( 0 );
        $field->modified_by( 0 );
        $question->save();
    }

    function set_publishfile ( $app ) {
        $urls = $app->db->model( 'urlinfo' )->load(
            ['publish_file' => ['IS NULL' => 1], 'delete_flag' => [0, 1] ] );
        foreach ( $urls as $idx => $url ) {
            $url->publish_file( 1 );
            $urls[ $idx ] = $url;
        }
        $app->db->model( 'urlinfo' )->update_multi( $urls );
    }

    function update_menus ( $app ) {
        $menus = $app->db->model( 'menu' )->load();
        foreach ( $menus as $menu ) {
            $menu->save();
        }
    }

    function set_field_value ( $app ) {
        $terms = ['type' => ['IN' => ['datetime', 'tel_separated', 'checkboxes', 'input_text_multi'],
           'kind' => 'customfield'] ];
        $extra = " AND ( meta_value='' OR meta_value IS NULL ) ";
        $fields = $app->db->model( 'meta' )->load( $terms, null, '*', $extra );
        foreach ( $fields as $idx => $meta ) {
            if (! $meta->text ) continue;
            $value = $meta->value;
            $fld_values = json_decode( $meta->text, true );
            if ( $fld_values === null ) {
                continue;
            }
            if ( $meta->type == 'datetime' ) {
                if ( $fld_values[ array_keys( $fld_values )[0] ] || $fld_values[ array_keys( $fld_values )[1] ] ) {
                    $meta->value( join( ' ', $fld_values ) );
                    if ( $fld_values[ array_keys( $fld_values )[0] ] == '' ) {
                        $fld_values[ array_keys( $fld_values )[0] ] = '0000-00-00';
                    }
                    if ( preg_match( '/\s[0-9]{2}:[0-9]{2}$/', $meta->value ) ) {
                        $fld_values[ array_keys( $fld_values )[1] ] .= ':00';
                    } else if ( $fld_values[ array_keys( $fld_values )[1] ] == '' ) {
                        $fld_values[ array_keys( $fld_values )[1] ] = '00:00:00';
                    }
                    $meta->value( join( ' ', $fld_values ) );
                    $value = json_encode( $fld_values, JSON_UNESCAPED_UNICODE );
                    $meta->text( $value );
                } else {
                    $meta->value( '' );
                }
            } else if ( $meta->type == 'tel_separated' ) {
                if ( $fld_values[ array_keys( $fld_values )[0] ] || $fld_values[ array_keys( $fld_values )[1] ] ||
                    $fld_values[ array_keys( $fld_values )[2] ] ) {
                    $meta->value( join( '-', $fld_values ) );
                } else {
                    $meta->value( '' );
                }
            } else if ( $meta->type == 'checkboxes' ) {
                $meta->value( join( ',', $fld_values ) );
            } else if ( $meta->type == 'input_text_multi' ) {
                $meta->value( join( PHP_EOL, $fld_values ) );
            } else {
                $meta->value( '' );
            }
            if ( $meta->value == $value ) {
                unset( $fields[ $idx ] );
            } else {
                $fields[ $idx ] = $meta;
            }
        }
        if (! empty( $fields ) ) {
            $app->db->model( 'meta' )->update_multi( $fields );
        }
    }

    function to_normalize ( $app ) {
        $logging = $app->logging;
        $app->logging = false;
        $error_reporting = ini_get( 'error_reporting' );
        error_reporting(0);
        $questions = $app->db->model( 'question' )->load( 'SELECT * FROM mt_question WHERE question_normarize=1' );
        $table = $app->get_table( 'question' );
        $column = $app->db->model( 'column' )->get_by_key( ['name' => 'normarize', 'table_id' => $table->id ] );
        if ( $column->id ) {
            $column->name( 'normalize' );
            $column->label( 'Normalize' );
            $column->save();
        }
        $this->upgrade_scheme( 'question' );
        if ( $questions !== false ) {
            if (!empty( $questions ) ) {
                foreach ( $questions as $idx => $question ) {
                    $question->normalize(1);
                    $questions[ $idx ] = $question;
                }
                unset( $app->db->show_columns['question'] );
                $app->db->model( 'question' )->update_multi( $questions );
            }
        }
        $settings = $app->db->model( 'option' )->load( ['key' => 'members_sign_up_normarize',
                                                        'kind' => 'plugin_setting',
                                                        'extra' => 'members'] );
        if (!empty( $settings ) ) {
            foreach ( $settings as $idx => $setting ) {
                $setting->key( 'members_sign_up_normalize' );
                $settings[ $idx ] = $setting;
            }
            $app->db->model( 'option' )->update_multi( $settings );
        }
        $this->set_theme_paths( $app );
        error_reporting( $error_reporting );
        $app->logging = $logging;
    }

    function repair_thumbnails ( $app ) {
        $thumbnails = $app->db->model( 'urlinfo' )->load( ['key' => 'thumbnail',
                                                           'delete_flag' => [0, 1], 'was_published' => 0] );
        if (! empty( $thumbnails ) ) {
            foreach ( $thumbnails as $idx => $thumbnail ) {
                $thumbnail->was_published( 1 );
                $thumbnails[ $idx ] = $thumbnail;
            }
            $app->db->model( 'urlinfo' )->update_multi( $thumbnails );
        }
    }

    function remove_timezone ( $app ) {
        $csv = __DIR__ . DS . 'Upgrader' . DS . 'removed-phrases.csv';
        $fh = fopen( $csv, 'r' );
        $phrases = [];
        while( $data = fgetcsv( $fh ) ) {
            $phrase = $data[0];
            if ( $phrase ) {
                $phrase = $app->db->model( 'phrase' )->get_by_key( ['phrase' => $phrase ], null, 'id' );
                if ( $phrase->id ) {
                    $phrases[] = $phrase;
                }
            }
        }
        if (! empty( $phrases ) ) {
            $app->db->model( 'phrase' )->remove_multi( $phrases );
        }
    }

    function change_modified_by ( $app ) {
        $columns = $app->db->model( 'column' )->load( ['name' => 'modified_by', 'list' => 'reference:user:name'] );
        if (!empty( $columns ) ) {
            foreach ( $columns as $idx => $column ) {
                $column->list( 'reference:user:nickname' );
                $columns[ $idx ] = $column;
            }
            $app->db->model( 'column' )->update_multi( $columns );
        }
        $columns = $app->db->model( 'column' )->load( ['name' => 'created_by', 'list' => 'reference:user:name'] );
        if (!empty( $columns ) ) {
            foreach ( $columns as $idx => $column ) {
                $column->list( 'reference:user:nickname' );
                $columns[ $idx ] = $column;
            }
            $app->db->model( 'column' )->update_multi( $columns );
        }
    }

    function decode_asset_url ( $app ) {
        // Pending.
        $urls = $app->db->model( 'urlinfo' )->load( ['model' => 'asset', 'delete_flag' => ['IN' => [0, 1]]] );
        foreach ( $urls as $idx => $urlinfo ) {
            $url = $urlinfo->url;
            $relative_url = $urlinfo->relative_url;
            $relative_path = $urlinfo->relative_path;
            $relative_path = preg_replace( '!^%r/!', '', $relative_path );
            $quoted = preg_quote( $relative_path, '!' );
            if (! preg_match( "!{$quoted}$!", $url ) ) {
                $site_url = $urlinfo->workspace ? $urlinfo->workspace->site_url : $app->site_url;
                $new_url = $site_url . $relative_path;
                $urlinfo->url( $new_url );
                $relative_url = preg_replace( "/^https{0,1}:\/\/.*?\//", '/', $new_url );
                $urlinfo->relative_url( $relative_url );
                $urls[ $idx ] = $urlinfo;
            }
        }
        if (! empty( $urls ) ) {
            $app->db->model( 'urlinfo' )->update_multi( $urls );
        }
    }

    function add_asset_extensions ( $app ) {
        // Pending.
        $assets = $app->db->model( 'asset' )->load( null, null, 'id,file_name,file_ext');
        foreach ( $assets as $idx => $asset ) {
            if ( strpos( $asset->file_name, '.' ) !== false || !$asset->file_ext ) {
                unset( $assets[ $idx ] );
                continue;
            }
            $asset->file_name( $asset->file_name . '.' . $asset->file_ext );
            $asset->save();
        }
    }

    function set_theme_paths ( $app ) {
        $app->theme_paths[] = dirname( $app->pt_path ) . DS . 'themes';
        $theme_dirs = $app->theme_paths;
        $theme_map = [];
        foreach ( $theme_dirs as $themes_dir ) {
            $items = scandir( $themes_dir );
            foreach ( $items as $theme ) {
                if ( strpos( $theme, '.' ) === 0 ) continue;
                $theme_id = strtolower( $theme );
                $theme_map[ $theme_id ] = $themes_dir . DS . $theme;
            }
        }
        $themes = $app->db->model( 'option' )->load( ['key' => 'theme', 'kind' => 'config'] );
        foreach ( $themes as $theme ) {
            $pull = $app->db->model( 'option' )->get_by_key( ['key' => 'theme_setting',
                                                              'kind' => 'pull',
                                                              'extra' => $theme->value,
                                                              'workspace_id' => (int)$theme->workspace_id ] );
            if ( $pull->id ) {
                $theme->data( $pull->data );
                $theme->save();
                continue;
            }
            if ( isset( $theme_map[ $theme->value ] ) ) {
                $theme->data( $theme_map[ $theme->value ] );
                $theme->save();
            }
        }
    }

    function themes_to_relative ( $app ) {
        $themes = $app->db->model( 'option' )->load( ['key' => 'theme', 'kind' => 'config'] );
        $theme_settings = $app->db->model( 'option' )->load( ['key' => 'theme_setting', 'kind' => 'pull'] );
        $themes = array_merge( $themes, $theme_settings );
        $theme_dir = $app->pt_dir . DS . 'themes' . DS;
        $support_dir = rtrim( $app->support_dir, '/\\' ) . DS;
        $theme_dir_q = preg_quote( $theme_dir, '!' );
        $support_dir_q = preg_quote( $support_dir, '!' );
        $theme_dirs = array_unique( $app->theme_paths );
        foreach ( $themes as $theme ) {
            $path = $theme->data;
            if ( strpos( $path, '%' ) !== 0 ) {
                if ( strpos( $path, $theme_dir ) === 0 ) {
                    $path = preg_replace( "!{$theme_dir_q}!", '%t/', $path );
                } else if ( strpos( $path, $support_dir ) === 0 ) {
                    $path = preg_replace( "!{$support_dir_q}!", '%s/', $path );
                } else {
                    foreach ( $theme_dirs as $theme_d ) {
                        $theme_d = rtrim( $theme_d, '/\\' ) . DS;
                        if ( strpos( $path, $theme_d ) === 0 ) {
                            $theme_d_q = preg_quote( $theme_d, '!' );
                            $path = preg_replace( "!{$theme_d_q}!", '%c/', $path );
                        }
                    }
                }
                $theme->data( $path );
                $theme->save();
            }
        }
    }

    function validation_password ( $app ) {
        $models = ['question', 'questiontype'];
        foreach ( $models as $model ) {
            $table = $app->get_table( $model );
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'validation_type'] );
            if ( stripos( $column->options, 'Password' ) === false ) {
                $column->options( $column->options . ',Password' );
                $column->save();
            }
            if ( $model === 'questiontype' ) {
                $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'class'] );
                // text,textarea,text_input_group,radio,checkbox,checkboxes,dropdown,date,file
                $options = $column->options;
                if ( stripos( $options, 'email_with_confirm' ) === false ) {
                    $options .= ',email_with_confirm';
                }
                if ( stripos( $options, 'hidden' ) === false ) {
                    $options .= ',hidden';
                }
                if ( stripos( $options, 'password' ) === false ) {
                    $options .= ',password';
                }
                if ( $column->options != $options ) {
                    $column->options( $options );
                    $column->save();
                }
            }
        }
        $this->install_question_types( $app );
    }

    function upgrade_scheme_check ( $app ) {
        if ( $app->mode == 'manage_scheme' && $app->param( 'saved_changes' ) ) {
            return 0;
        }
        $upgrade_count = 0;
        $schemes = $app->get_cache( 'scheme_versions__c', 'option', true );
        if (! $schemes ) {
            $schemes = $app->db->model( 'option' )->load(
                ['kind' => 'scheme_version'], [], 'key,value,extra' );
            $app->set_cache( 'scheme_versions__c', $schemes, true );
        }
        $model_names = [];
        foreach ( $schemes as $item ) {
            $model = $item->key;
            $model_names[] = $model;
            $component = $item->extra;
            $models_dir = null;
            if ( $component && $component !== 'core' ) {
                if ( $app->mode == 'manage_plugins' ) {
                    $switch = isset( $app->plugin_switch[ $component ] ) ? $app->plugin_switch[ $component ] : null;
                    if ( is_object( $switch ) && ! $switch->number ) {
                        continue;
                    }
                }
                $plugin = $app->component( $component );
                if (! $plugin ) {
                    $plugin = $app->autoload_component( $component );
                }
                $models_dir = $this->get_models_dir( $app, $model );
            } else {
                $models_dir = $this->get_models_dir( $app, $model );
            }
            if ( $models_dir ) {
                $file = $models_dir . DS . $model . '.json';
                if ( is_readable( $file ) ) {
                    $model_files[ $model ] = $file;
                    list( $cache_id, $cached, $scheme ) = [ null, false, null ];
                    if ( $app->caching ) {
                        $cache_id = 'schemes' . DS . $model;
                        $scheme = $app->get_cache( $cache_id, null, false, filemtime( $file ), true );
                    }
                    if (! $scheme ) {
                        $scheme = json_decode( file_get_contents( $file ), true );
                        if ( $scheme === null ) {
                            return $app->error( 'An error occurred while decoding json(%s).', basename( $file ) );
                        }
                    } else {
                        $cached = true;
                    }
                    if ( $cache_id && ! $cached ) {
                        $app->set_cache( $cache_id, $scheme, false, true );
                    }
                    $scheme_version = isset( $scheme['version'] ) ? $scheme['version'] : '';
                    $db_version = $item->value;
                    if ( $scheme_version != $db_version ) {
                        $comp = version_compare( $scheme_version, $db_version );
                        if ( $comp === 1 ) {
                            $upgrade_count++;
                        }
                    }
                }
            }
        }
        $json_dirs = array_keys( $this->plugin_models( true ) );
        $json_dirs = array_merge( $app->model_paths, $json_dirs );
        foreach ( $json_dirs as $dir ) {
            if (! is_dir( $dir ) ) continue;
            $files = scandir( $dir, $app->plugin_order );
            foreach ( $files as $json ) {
                if ( strpos( $json, '.' ) === 0 ) continue;
                $file = $dir . DS . $json;
                $extension = PTUtil::get_extension( $json );
                if ( $extension !== 'json' ) continue;
                $model = pathinfo( $json )['filename'];
                if (! in_array( $model, $model_names ) ) {
                    $component = in_array( $dir, $app->model_paths )
                               ? 'Prototype'
                               : strtolower( basename( dirname( dirname( $file ) ) ) );
                    $data = json_decode( file_get_contents( $file ), true );
                    if ( $data === null ) {
                        return $app->error( 'An error occurred while decoding json(%s).', basename( $file ) );
                    }
                    if ( isset( $data['component'] ) ) $component = $data['component'];
                    $version = isset( $data['version'] ) ? $data['version'] : 0;
                    $upgrade_count++;
                }
            }
        }
        return $upgrade_count;
    }

    function export_scheme ( $app ) {
        $app->validate_magic();
        $model = $app->param( 'name' );
        $scheme = $app->get_scheme_from_db( $model, true );
        $table = $app->get_table( $model );
        $scheme['label'] = $table->label;
        $lang = $app->user() ? $app->user()->language : $app->language;
        if ( isset( $scheme['locale'][ $lang ] ) ) {
            // Translate options, hints.
            $locale = $scheme['locale'][ $lang ];
            $translates = $scheme['translate'] ?? [];
            if (! empty( $translates ) && isset( $scheme['options'] ) ) {
                $options = $scheme['options'];
                foreach ( $translates as $translate ) {
                    if ( isset( $options[ $translate ] ) ) {
                        $option = $options[ $translate ];
                        $phrases = explode( ',', $option );
                        foreach ( $phrases as $phrase ) {
                            $trans = $app->translate( $phrase );
                            if ( $trans !== $phrase ) {
                                $locale[ $phrase ] = $trans;
                            }
                        }
                    }
                }
            }
            if (! empty( $translates ) && isset( $scheme['hint'] ) ) {
                $hints = $scheme['hint'];
                foreach ( $hints as $hint ) {
                    $trans = $app->translate( $hint );
                    if ( $trans !== $hint ) {
                        $locale[ $hint ] = $trans;
                    }
                }
            }
            $scheme['locale'][ $lang ] = $locale;
        }
        $scheme['column_labels'] = $scheme['locale']['default'];
        if ( $table->text_format ) {
            $scheme['text_format'] = $table->text_format;
        }
        $obj = $app->db->model( $model );
        $hide_options = isset( $scheme['hide_edit_options'] ) 
                      ? $scheme['hide_edit_options'] : [];
        if ( $obj->has_column( 'status' )
            && ! in_array( 'status', $hide_options ) ) {
            $hide_options[] = 'status';
        }
        if ( $obj->has_column( 'user_id' )
            && ! in_array( 'user_id', $hide_options ) ) {
            $hide_options[] = 'user_id';
        }
        if ( $obj->has_column( 'published_on' )
            && ! in_array( 'published_on', $hide_options ) ) {
            $hide_options[] = 'published_on';
        }
        if ( $obj->has_column( 'unpublished_on' )
            && ! in_array( 'unpublished_on', $hide_options ) ) {
            $hide_options[] = 'unpublished_on';
        }
        $scheme['hide_edit_options'] = $hide_options;
        unset( $scheme['locale']['default'] );
        unset( $scheme['labels'] );
        $keys = ['label', 'plural', 'version', 'primary', 'auditing', 'order', 'menu_type',
                 'revisable', 'max_revisions', 'display_system', 'display_space', 'template_tags',
                 'can_duplicate', 'allow_identical', 'im_export'];
        $unshift = [];
        foreach ( $keys as $key ) {
            if ( isset( $scheme[ $key ] ) ) {
                $unshift[ $key ] = $scheme[ $key ];
                unset( $scheme[ $key ] );
            }
        }
        $scheme = array_merge( $unshift, $scheme );
        if (! $table->revisable ) {
            unset( $scheme['max_revisions'] );
        }
        header( 'Content-type: application/json' );
        header( "Content-Disposition: attachment;"
            . " filename=\"{$model}.json\"" );
        header( "Pragma: " );
        echo json_encode( $scheme, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
    }

    function export_scheme_csv ( $app ) {
        $app->validate_magic();
        $model = $app->param( 'name' );
        $scheme = $app->get_scheme_from_db( $model, true );
        $table = $app->get_table( $model );
        $label = $app->translate( $table->label );
        $default_models = $app->get_config( 'default_models' );
        if ( $default_models ) {
            $default_models = explode( ',', $default_models->value );
        } else {
            $default_models = [];
        }
        $column_defs = $scheme['column_defs'];
        $indexes = $scheme['indexes'] ?? [];
        $yes = $app->translate( 'Yes' );
        $no = $app->translate( 'No' );
        $none = $app->translate( 'None' );
        $edit_map = ['hidden' => $app->translate( 'Hidden' ),
                     'primary' => $app->translate( 'Primary' ),
                     'checkbox' => $app->translate( 'Checkbox' ),
                     'number' => $app->translate( 'Number' ),
                     'text' => $app->translate( 'Text Box' ),
                     'text_short' => $app->translate( 'Short Text' ),
                     'password' => $app->translate( 'Password' ),
                     'password(hash)' => $app->translate( 'Password(Hashed)' ),
                     'textarea' => $app->translate( 'Textarea' ),
                     'richtext' => $app->translate( 'RichText' ),
                     'datetime' => $app->translate( 'DateTime' ),
                     'date' => $app->translate( 'Date' ),
                     'url' => 'URL',
                     'selection' => $app->translate( 'Selection' ),
                     ];
        $list_map = ['hidden' => $app->translate( 'Hidden' ),
                     'primary' => $app->translate( 'Primary' ),
                     'checkbox' => $app->translate( 'Checkbox' ),
                     'number' => $app->translate( 'Number' ),
                     'text' => $app->translate( 'Text Box' ),
                     'text_short' => $app->translate( 'Short Text' ),
                     'password' => $app->translate( 'Password' ),
                     'password(hash)' => $app->translate( 'Password(Hashed)' ),
                     'popover' => $app->translate( 'Popover' ),
                     'datetime' => $app->translate( 'DateTime' ),
                     'date' => $app->translate( 'Date' ),
                     'url' => 'URL',
                     ];
        $desc_map = ['extra_path' => $app->translate( 'Directory' ),
                     'rev_object_id' => $app->translate( 'Master Object ID' ),
                     'rev_type' => $app->translate( 'Revision Type(0=Master,1=Auto Save,2=Revision)' ),
                     'text_format' => $app->translate( 'Editor Type(None,Convert Line Breaks,Markdown,RichText)' ),
                     ];
        $desc_type = [
                      'int' => '(' . $app->translate( 'Number' ) . ')',
                      'tinyint' => '(' . $app->translate( 'Boolean' ) . ')',
                      'datetime' => '(' . $app->translate( 'DateTime' ) . ')',
                     ];
        $column_values = [];
        foreach ( $column_defs as $column_name => $props ) {
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => $column_name ] );
            if (! $column->id ) {
                continue;
            }
            $col_label = $app->translate( $column->label );
            $vars = ["{$model}_{$column_name}", $col_label ];
            $type = $column->type;
            $size = $column->size;
            $add_desc = $desc_type[ $type ] ?? '';
            if ( $type === 'int' && $size == 11 ) {
                $type = 'bigint(20)';
            } else if ( $type === 'tinyint' ) {
                $type = $size ? "tinyint({$size})" : 'tinyint';
            } else if ( $type == 'string' ) {
                $type = $size ? "varchar({$size})" : 'varchar';
            } else if ( $type == 'text' ) {
                $type = 'longtext';
            }
            $vars[] = $type !== 'relation' ? $type : '';
            $vars[] = $column->not_null ? $no : $yes;
            if ( $type !== 'relation' ) {
                $vars[] = $column->index ? $yes : $no;
            } else {
                $vars[] = '';
            }
            $vars[] = $column->default;
            $vars[] = $column_name === 'id' ? 'AUTO_INCREMENT' : '';
            $vars[] = $column->is_primary ? $yes : '';
            $description = $app->translate( "%s's %s", [ $label, $col_label ] );
            $edit = $edit_map[ $column->edit ] ?? '';
            if ( $column->edit == 'textarea' || $column->edit == 'richtext' ) {
                $height = $column->options;
                if (! $height ) {
                    $height = $column->edit == 'richtext' ? 10 : 5;
                }
                $add_edit = $app->translate( 'Height:%s', $height );
                $add_edit = "({$add_edit})";
                $edit .= $add_edit;
            } elseif ( $column->edit == 'selection' ) {
                $options = explode( ',', $column->options );
                if ( $column->translate ) {
                    foreach ( $options as $idx => $option ) {
                        if ( strpos( $option, '=' ) !== false && strpos( $option, '=' ) !== 0 ) {
                            list( $var1, $var2 ) = explode( '=', $option );
                            $var2 = $app->translate( $var2 );
                            $option = "{$var1}={$var2}";
                        } else {
                            $option = $app->translate( $option );
                        }
                        $options[ $idx ] = $option;
                    }
                }
                $add_desc = implode( ',', $options );
                $add_desc = "({$add_desc})";
            }
            if (! $edit && $type != 'relation' ) {
                if ( $column->type === 'int' && strpos( $column->edit, ':' ) !== false ) {
                    $settings = explode( ':', $column->edit );
                    $col_model = $app->translate( $settings[1] );
                    $description = $app->translate( 'The Object of model \'%1$s\' associated by %2$s_id', [ $col_model, $settings[1]] );
                    $edit = $app->translate( ucfirst( $settings[3] ) );
                    $add_desc = '';
                } else {
                    $edit = $column->edit ? $app->translate( $column->edit ) : $none;
                }
            } else if ( $type == 'relation' && $column->edit ) {
                $settings = explode( ':', $column->edit );
                $edit = $app->translate( ucfirst( $settings[3] ) );
                $description = $app->translate( "Relations (pseudo columns) with model '%s' via join table", $settings[1] );
            }
            if ( isset( $desc_map[ $column_name ] ) ) {
                $description = $app->translate( "%s's %s", [ $label, $desc_map[ $column_name ] ] );
            }
            if ( $column_name === 'status' ) {
                if ( $table->start_end ) {
                    $add = $app->translate( '(0=Draft,1=Review,2=Approval Pending,3=Reserved,4=Publish,5=Ended)' );
                } else {
                    $add = $app->translate( '(1=Disable,2=Enable)' );
                }
                $description .= $add;
            } else {
                $description .= $add_desc;
            }
            $vars[] = $description;
            $hint = $column->hint;
            if ( $column->translate ) {
                $hint = $app->translate( $hint );
            }
            $vars[] = $hint;
            $list = $list_map[ $column->list ] ?? '';
            if (! $list && $type != 'relation' ) {
                if ( $column->type === 'int' && strpos( $column->list, ':' ) !== false ) {
                    $settings = explode( ':', $column->list );
                    $col = $app->translate( $app->translate( $settings[2], null, $app, 'default' ) );
                    $col_model = $app->translate( $settings[1] );
                    $list = $app->translate( "%s's %s", [ $col_model, $col ] );
                } else {
                    $list = $column->list ? $app->translate( $column->list ) : $none;
                }
            } else if ( $type == 'relation' && $column->list ) {
                $settings = explode( ':', $column->list );
                $col_model = $app->translate( $app->translate( $settings[1], null, $app, 'default' ) );
                $col = $app->translate( $app->translate( $settings[2], null, $app, 'default' ) );
                $list = $app->translate( "%s's %s", [ $col_model, $col ] );
            }
            if (! $list ) {
                $list = $none;
            }
            $vars[] = $list;
            $vars[] = $edit;
            $vars[] = $column->not_delete ? $no : $yes;
            $column_values[] = $vars;
        }
        $col_names = [ $app->translate( 'Column' ),
                       $app->translate( 'Label' ),
                       $app->translate( 'Type' ),
                       'NULL',
                       $app->translate( 'Index' ),
                       $app->translate( 'Default Value' ),
                       $app->translate( 'Other' ),
                       $app->translate( 'Primary' ),
                       $app->translate( 'Description' ),
                       $app->translate( 'Hint' ),
                       $app->translate( 'List Type' ),
                       $app->translate( 'Edit Type' ),
                       $app->translate( 'Added Column' ),
                       ];
        $upload_dir = $app->upload_dir();
        $csv_out = $upload_dir . DS . "{$model}.csv";
        $fp = fopen( $csv_out, 'w' );
        if ( $app->csv_with_bom ) {
            fwrite( $fp, '   ' );
        }
        fputcsv( $fp, $col_names, ',', '"' );
        foreach ( $column_values as $vars ) {
            fputcsv( $fp, $vars, ',', '"' );
        }
        fclose( $fp );
        if ( $app->csv_with_bom ) {
            $bom = pack( 'C*', 0xEF, 0xBB, 0xBF );
            $fp = fopen( $csv_out, 'r+b' );
            fseek( $fp, 0 );
            fwrite( $fp, $bom );
            fclose( $fp );
        }
        PTUtil::export_data( $csv_out );
    }

    function drop ( $table ) {
        $app = Prototype::get_instance();
        $this->start_upgrade( $app );
        $tables = $app->db->model( 'table' )->load();
        foreach ( $tables as $t ) {
            if ( $table->id == $t->id ) continue;
            $rel_table = $app->get_table( $t->name );
            $model = $app->db->model( $t->name )->new();
            if ( $model->has_column( 'table_id' ) ) {
                $rel_objs = $model->load( ['table_id' => $table->id ] );
                foreach ( $rel_objs as $obj ) {
                    $app->remove_object( $obj, $rel_table );
                }
            }
            if ( $model->has_column( 'model' ) ) {
                $rel_objs = $model->load( ['model' => $table->name ] );
                foreach ( $rel_objs as $obj ) {
                    $app->remove_object( $obj, $rel_table );
                }
            }
        }
        $app->clear_cache( $table->name . DS );
        $db = $app->db;
        $blob_path = $db->blob_path;
        if ( $blob_path && is_dir( $blob_path ) ) {
            $blob_path .= $table->name;
            if ( is_dir( $blob_path ) ) {
                PTUtil::remove_dir( $blob_path );
            }
        }
    }
}