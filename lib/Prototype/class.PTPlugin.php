<?php

use Michelf\Markdown;

class PTPlugin {

    public $id;
    public $label;
    public $author;
    public $author_link;
    public $description;
    public $dictionary = [];
    public $path;
    public $name;
    public $configs;
    public $version;
    public $config_vars = false;
    public $max_packet  = null;
    public $properties    = [];

    private $plugins_properties = ['id', 'label', 'version', 'author', 'author_link', 'description'];

    function __construct () {
        $plugin_name = get_class( $this );
        if ( $plugin_name == 'PTPlugin' ) {
            return;
        }
        $app = Prototype::get_instance();
        $path = ( new ReflectionClass( static::class ) )->getFileName();
        $this->path = $path;
        $this->name = $plugin_name;
        $class_name = strtolower( $plugin_name );
        $app->components[ $class_name ] = $this;
        $language = $app->user() ? $app->user()->language : $app->language;
        $locale = dirname( $path ) . DS . 'locale' . DS . $language . '.json';
        $cache_id = 'component' . DS . 'locale_' . md5( $locale );
        $cached = false;
        $filemtime = file_exists( $locale ) ? filemtime( $locale ) : null;
        $dict = $app->get_cache( $cache_id, null, false, $filemtime, true );
        if ( $dict && is_array( $dict ) ) {
            $cached = true;
        } else if ( file_exists( $locale ) ) {
            $dict = json_decode( file_get_contents( $locale ), true );
        }
        if (! $cached ) {
            if (! is_array( $dict ) ) $dict = [];
            $phrases = $app->db->model( 'phrase' )->load_iter(
              ['component' => $class_name,
               'lang' => $language ], null, 'phrase,trans' );
            $phrases = $phrases->fetchAll( PDO::FETCH_ASSOC );
            if (! empty( $phrases ) ) {
                foreach ( $phrases as $phrase ) {
                    $dict[ $phrase['phrase_phrase'] ] = $phrase['phrase_trans'];
                }
            }
        }
        if ( is_array( $dict ) ) {
            $this->dictionary[ $language ] = $dict;
            if (! $cached ) $app->set_cache( $cache_id, $dict, true, true );
        }
        if ( isset( $app->plugin_configs[ $class_name ] ) ) {
            $this->configs = $app->plugin_configs[ $class_name ];
            foreach ( $this->plugins_properties as $property ) {
                if ( isset( $this->configs[ $property ] ) ) {
                    $this->$property = $this->configs[ $property ];
                }
            }
        }
        $app->components[ $class_name ] = $this;
        $app->ctx->components[ $class_name ] = $this;
    }

    function set_language ( $language ) {
        $app = Prototype::get_instance();
        if (! isset( $this->dictionary[ $language ] ) ) {
            $path = $this->path;
            $locale = dirname( $path ) . DS . 'locale' . DS . $language . '.json';
            if ( file_exists( $locale ) ) {
                $cache_id = 'component' . DS . 'locale_' . md5( $locale );
                $cached = false;
                $filemtime = filemtime( $locale );
                $dict = $app->get_cache( $cache_id, null, false, $filemtime );
                if ( $dict && is_array( $dict ) ) {
                    $cached = true;
                } else if ( file_exists( $locale ) ) {
                    $dict = json_decode( file_get_contents( $locale ), true );
                }
                $class_name = $this->id;
                if (! $cached ) {
                    if (! is_array( $dict ) ) $dict = [];
                    $phrases = $app->db->model( 'phrase' )->load_iter(
                      ['component' => $class_name,
                       'language' => $language ], null, 'phrase,trans' );
                    $phrases = $phrases->fetchAll( PDO::FETCH_ASSOC );
                    if (! empty( $phrases ) ) {
                        foreach ( $phrases as $phrase ) {
                            $dict[ $phrase['phrase_phrase'] ] = $phrase['phrase_trans'];
                        }
                    }
                }
                if ( is_array( $dict ) ) {
                    $this->dictionary[ $language ] = $dict;
                    if (! $cached ) $app->set_cache( $cache_id, $dict );
                }
            }
        }
    }

    function __get ( $name ) {
        if ( isset( $this->configs[ $name ] ) ) {
            return $this->configs[ $name ];
        } else if ( isset( $this->properties[ $name ] )
            || array_key_exists( $name, $this->properties ) ) {
            return $this->properties[ $name ];
        }
    }

    function __set ( $name, $value ) {
        $this->properties[ $name ] = $value;
    }

    function version () {
        if ( $this->version ) return $this->version;
        $app = Prototype::get_instance();
        $versions = $app->versions;
        $class = strtolower( get_class( $this ) );
        if ( isset( $versions[ $class ] ) ) {
            $this->version = $versions[ $class ];
            return $versions[ $class ];
        }
        $cfg = $this->path() . DS .'config.json';
        if ( is_file( $cfg ) ) {
            $cfgs = json_decode( file_get_contents( $cfg ) );
            return $cfgs->version;
        }
    }

    function translate ( $phrase, $params = '', $lang = null ) {
        $app = Prototype::get_instance();
        if (! $lang ) {
            if ( $app->user() ) {
                $lang = $app->user()->language;
            } else {
                $lang = $app->language;
            }
        }
        if (! $lang ) $lang = 'default';
        $dict = isset( $this->dictionary ) ? $this->dictionary : null;
        if ( $dict && isset( $dict[ $lang ] ) && isset( $dict[ $lang ][ $phrase ] ) )
             $phrase = $dict[ $lang ][ $phrase ];
        if ( $phrase && strpos( $phrase, '%' ) !== false ) {
            $escaped = str_replace( '%s', '', $phrase );
            if ( strpos( $escaped, '%' ) !== false ) {
                $escaped = preg_replace( '/%\d+\$s/', '', $escaped );
            }
            if ( strpos( $escaped, '%' ) !== false ) {
                $phrase = str_replace( '%', '%%', $phrase );
            }
            if (!is_array( $params ) && !is_string( $params ) ) {
                $params = (string) $params;
            }
            $phrase = is_string( $params )
                ? sprintf( $phrase, $params ) : vsprintf( $phrase, $params );
        }
        return $app->esc_trans ? htmlspecialchars( $phrase, ENT_COMPAT, 'UTF-8', false ) : $phrase;
    }

    function path () {
        return dirname( $this->path );
    }

    function manage_plugins ( $app ) {
        $workspace = $app->workspace()
                   ? $app->workspace() : $app->db->model( 'workspace' )->new( ['id' => 0 ] );
        if (! $app->can_do( 'manage_plugins', null, null, $workspace ) ) {
            $app->error( 'Permission denied.' );
        }
        $plugin_switch = $app->plugin_switch;
        $cfg_settings = $app->cfg_settings;
        $counter = 0;
        $errors = [];
        if ( function_exists( 'opcache_reset' ) ) {
            opcache_reset();
        }
        if ( $_type = $app->param( '_type' ) ) {
            $app->validate_magic();
            if ( $_type === 'enable' || $_type === 'disable' || $_type === 'upgrade' ) {
                if ( $app->workspace() ) {
                    return $app->error( 'Invalid request.' );
                }
                $status = $_type === 'disable' ? 0 : 1;
                $plugin_ids = $app->param( 'plugin_id' );
                $db = $app->db;
                foreach ( $plugin_ids as $plugin_id ) {
                    if (! isset( $plugin_switch[ $plugin_id ] ) ) {
                        return $app->error( 'Invalid request.' );
                    }
                    $upgrade = true;
                    $component = $app->component( $plugin_id );
                    $version = '0';
                    $version = $component ? $component->version() : '0';
                    $obj = $plugin_switch[ $plugin_id ];
                    if ( $_type === 'upgrade' && !$obj->number ) {
                        continue;
                    }
                    $comp = 0;
                    if ( $version != $obj->value ) {
                        $comp = version_compare( $version, $obj->value ?? '0' );
                    }
                    if ( $obj->number != $status || $comp === 1
                        || $_type === 'upgrade' ) {
                        if ( $_type == 'enable' || $comp === 1 ) {
                        } else if ( $_type !== 'disable' ) {
                            continue;
                        }
                        if ( is_object( $component ) && $upgrade ) {
                            if ( $status == 1 && method_exists( $component, 'activate' ) ) {
                                $upgrade = $component->activate( $app, $this, $obj->value, $errors );
                            } else if ( $status == 0 && method_exists( $component, 'deactivate' ) ) {
                                $upgrade = $component->deactivate( $app, $this, $obj->value, $errors );
                            }
                        }
                        if ( $upgrade ) {
                            if ( $status && $component ) {
                                $locale = $component->path() . DS . 'locale';
                                if ( is_dir( $locale ) ) {
                                    PTUtil::locale_from_csv( $locale, strtolower( $component->id ) );
                                }
                                if ( property_exists( $component, 'upgrade_functions' ) ) {
                                    $upgrade_functions = $component->upgrade_functions;
                                    foreach ( $upgrade_functions as $upgrade_function ) {
                                        $version_limit = isset( $upgrade_function['version_limit'] )
                                                       ? $upgrade_function['version_limit'] : '0';
                                        if ( version_compare( (string)$obj->value, $version_limit ) === 1 ) {
                                            $meth = $upgrade_function['method'];
                                            if ( method_exists( $component, $meth ) && $upgrade ) {
                                                $upgrade = $component->$meth( $app, $this, $obj->value, $errors );
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $component = is_object( $component ) ? $component : $app->component( $plugin_id );
                        $component_name = get_class( $component );
                        $message = '';
                        if ( $_type == 'enable' && $upgrade ) {
                            $message = $app->translate( "The plugin '%s' has been activated.", $component_name );
                        } else if ( $_type == 'disable' && $upgrade ) {
                            $message = $app->translate( "The plugin '%s' has been deactivated.", $component_name );
                        } else if ( $_type == 'upgrade' && $comp !== 0 ) {
                            $message = $app->translate(
                              "The plugin '%s' upgraded from version %s to version %s.", [ $component_name, $obj->value, $version ] );
                        }
                        if ( $message ) {
                            $app->log( ['message'  => $message, 'category' => 'plugin'] );
                        }
                        if ( $upgrade ) {
                            $obj->number( $status );
                            if (! $obj->value || $_type === 'upgrade' ) {
                                $obj->value( $version );
                            }
                            $obj->save();
                            $counter++;
                        }
                    }
                }
                if ( is_object( $app->cache_driver ) && $app->cache_driver->_driver ) {
                    if ( method_exists( $app->cache_driver->_driver, 'flush' ) ) {
                        $app->cache_driver->_driver->flush();
                    }
                }
                $app->clear_cache( 'init_plugins__c' );
                if ( function_exists( 'opcache_reset' ) && $app->query_cache ) {
                    sleep( 2 );
                }
            }
            if ( empty( $errors ) ) {
                $app->redirect( $app->admin_url .
                "?__mode=manage_plugins&action_type={$_type}&saved=1&count={$counter}" );
                exit();
            }
        }
        $ctx = $app->ctx;
        if ( $app->param( 'edit_settings' ) ) {
            $plugin_id = $app->param( 'plugin_id' );
            if (! isset( $cfg_settings[ $plugin_id ] ) ) {
                return $app->error( 'Invalid request.' );
            }
            $cfg_setting = $cfg_settings[ $plugin_id ];
            $component = $app->component( $cfg_setting['component'] );
            if (! $component )
                $component = $app->autoload_component( $cfg_setting['component'] );
            if (! $component ) {
                return $app->error( 'Invalid request.' );
            }
            $has_config = false;
            if ( $app->workspace() && isset( $cfg_setting['cfg_space'] ) &&
                $cfg_setting['cfg_space'] ) {
                $has_config = true;
            } else if (! $app->workspace() && isset( $cfg_setting['cfg_system'] ) &&
                $cfg_setting['cfg_system'] ) {
                $has_config = true;
            }
            $cfg_tmpl = '';
            if ( isset( $cfg_setting['cfg_template'] ) &&
                $cfg_setting['cfg_template'] ) {
                $cfg_tmpl = $cfg_setting['cfg_template'];
                $cfg_tmpl = $component->path() . DS . 'tmpl' . DS . $cfg_tmpl;
                if (! file_exists( $cfg_tmpl ) ) {
                    $has_config = false;
                }
            } else {
                $has_config = false;
            }
            if (! $has_config ) {
                return $app->error( 'Invalid request.' );
            }
            $terms = ['extra' => $plugin_id, 'kind' => 'plugin_setting'];
            if ( $app->workspace() ) {
                $terms['workspace_id'] = $app->workspace()->id;
            } else {
                $terms['workspace_id'] = 0;
            }
            $workspace_id = $terms['workspace_id'];
            $settings = isset( $cfg_setting['settings'] ) ? $cfg_setting['settings'] : [];
            if ( $app->param( 'save_config' ) ) {
                $app->validate_magic();
                $app->init_callbacks( 'plugin', 'pre_save_plugin_config' );
                $callback = ['name' => 'pre_save_plugin_config', 'plugin_id' => $plugin_id ];
                $errors = [];
                $app->run_callbacks( $callback, 'plugin', $component, $errors );
                $app->db->caching = false;
                $orig_cfgs = $component->get_config_value( false, $workspace_id );
                $callback['original'] = $orig_cfgs;
                if ( method_exists( $component, 'pre_save_plugin_config' ) ) {
                    $component->pre_save_plugin_config( $callback, $app, $component, $errors );
                }
                if ( count( $errors ) ) {
                    unset( $_REQUEST['save_config'] );
                    unset( $_POST['save_config'] );
                    $app->param( 'save_config', '' );
                    $ctx->vars['error'] = implode( "\n", $errors );
                    return $this->manage_plugins( $app );
                }
                $keys = array_keys( $settings );
                $app->db->caching = false;
                $action = $app->param( 'reset_config' ) ? 'reset' : 'saved';
                foreach ( $keys as $key ) {
                    $var = $app->param( 'setting_' . $key );
                    $terms['key'] = $key;
                    $setting_obj = $app->db->model( 'option' )->get_by_key( $terms, ['sort' => 'id', 'direction' => 'descend'] );
                    if ( $action == 'saved' ) {
                        if (! $setting_obj->id || $setting_obj->value != $var ) {
                            $setting_obj->value( $var );
                            $setting_obj->save();
                        }
                    } else if ( $setting_obj->id ) {
                        $setting_obj->remove();
                    }
                }
                $component->config_vars = false;
                $saved_cfgs = $component->get_config_value( false, $workspace_id );
                $metadata = null;
                if ( $action == 'saved' ) {
                    $masks = ['client_id', 'clientid', 'token', 'secret', 'password'];
                    if ( is_array( $orig_cfgs ) && !empty( $orig_cfgs ) ) {
                        foreach ( $masks as $mask ) {
                            foreach ( $orig_cfgs as $key => $value ) {
                                if ( stripos( $key, $mask ) !== false ) {
                                    unset( $orig_cfgs[ $key ] );
                                }
                            }
                        }
                    }
                    if ( is_array( $saved_cfgs ) && !empty( $saved_cfgs ) ) {
                        foreach ( $masks as $mask ) {
                            foreach ( $saved_cfgs as $key => $value ) {
                                if ( stripos( $key, $mask ) !== false ) {
                                    unset( $saved_cfgs[ $key ] );
                                }
                            }
                        }
                    }
                    if ( is_array( $orig_cfgs ) && !empty( $orig_cfgs ) && is_array( $saved_cfgs ) ) {
                        $metadata = array_diff_assoc( $orig_cfgs, $saved_cfgs );
                    } else if ( is_array( $saved_cfgs ) ) {
                        $metadata = $saved_cfgs;
                    }
                    $metadata = ['original' => $orig_cfgs, 'saved' => $saved_cfgs, 'diff' => $metadata ];
                }
                $callback = ['name' => 'post_save_plugin_config', 'plugin_id' => $plugin_id ];
                $callback['original'] = $orig_cfgs;
                $callback['saved'] = $saved_cfgs;
                $message = $action == 'saved' ? $app->translate( "Plugin %s's settings has been saved.", $plugin_id )
                         : $app->translate( "Plugin %s's settings has been reset.", $plugin_id );
                $log = $app->log( ['message' => $message, 'category' => 'plugin',
                                   'model' => $plugin_id, 'metadata' => $metadata,
                                   'level' => 'info'] );
                $callback['log'] = $log;
                $app->run_callbacks( $callback, 'plugin', $component );
                if ( method_exists( $component, 'post_save_plugin_config' ) ) {
                    $component->post_save_plugin_config( $callback, $app, $component );
                }
                $ctx->vars["config_{$action}"] = 1;
            }
            $label = $app->translate( $cfg_setting['label'], null, $component );
            $ctx->vars['page_title'] = $app->translate( 'Plugin %s\'s Settings', $label );
            $ctx->vars['plugin_label'] = $label;
            $ctx->vars['plugin_id'] = $plugin_id;
            if ( $app->workspace() ) {
                $ctx->vars['page_title']
                    .= ' (' . htmlspecialchars( $app->workspace()->name ) . ')';
            }
            if ( isset( $ctx->vars['error'] ) ) {
                foreach ( $settings as $key => $value ) {
                    $ctx->vars['setting_' . $key ] = $app->param( 'setting_' . $key );
                }
            } else {
                foreach ( $settings as $key => $value ) {
                    $ctx->vars['setting_' . $key ] = $value;
                }
                unset( $terms['key'] );
                $setting_objs = $app->db->model( 'option' )->load( $terms );
                foreach ( $setting_objs as $setting_obj ) {
                    $ctx->vars['setting_' . $setting_obj->key ] = $setting_obj->value;
                }
            }
            $required = '<i class="fa fa-asterisk required" aria-hidden="true"></i>';
            $required .= '<span class="sr-only">' . $app->translate( 'Required' ) . '</span>';
            $ctx->vars['field_required'] = $required;
            $cfg_tmpl = $app->build( file_get_contents( $cfg_tmpl ) );
            $ctx->vars['cfg_tmpl'] = $cfg_tmpl;
            if ( isset( $cfg_setting['cfg_header'] ) && $cfg_setting['cfg_header'] ) {
                $cfg_header = $component->path() . DS . 'tmpl' . DS . $cfg_setting['cfg_header'];
                if ( file_exists( $cfg_header ) ) {
                    $ctx->vars['cfg_header'] = $app->build( file_get_contents( $cfg_header ) );
                }
            }
            if ( isset( $cfg_setting['cfg_footer'] ) && $cfg_setting['cfg_footer'] ) {
                $cfg_footer = $component->path() . DS . 'tmpl' . DS . $cfg_setting['cfg_footer'];
                if ( file_exists( $cfg_footer ) ) {
                    $ctx->vars['cfg_footer'] = $app->build( file_get_contents( $cfg_footer ) );
                }
            }
            $ctx->vars['this_mode'] = $app->mode;
            $app->assign_params( $app, $ctx );
            $app->ctx = $ctx;
            return $app->build_page( 'plugin_config.tmpl' );
        }
        $plugins_loop = [];
        $upgrade_count = 0;
        $scheme_upgrade_count = 0;
        foreach ( $cfg_settings as $key => $cfg ) {
            $switch = $plugin_switch[ $key ];
            $cfg['status'] = $switch->number;
            if (! $app->workspace() ) {
                $old_version = $switch->value;
                if ( $cfg['status'] ) {
                    $comp = version_compare( $cfg['version'], $old_version );
                    if ( $comp === 1 ) {
                        $cfg['upgrade'] = true;
                        $ctx->local_vars['need_upgrade'] = true;
                        $upgrade_count++;
                    }
                }
                if ( $old_version ) {
                    $cfg['version'] = $old_version;
                }
            }
            $component = $app->component( $key );
            if (! $component ) continue;
            if ( $cfg['status'] ) {
                $models_dir = $component->path() . DS . 'models';
                if ( is_dir( $models_dir ) ) {
                    if ( $handle = opendir( $models_dir ) ) {
                        while ( false !== ( $entry = readdir( $handle ) ) ) {
                            if ( strpos( $entry, '.' ) === 0 ) continue;
                            $file = $models_dir . DS . $entry;
                            $extension = pathinfo( $file )['extension'];
                            if ( $extension != 'json' ) continue;
                            $scheme = json_decode( file_get_contents( $file ) );
                            $name = basename( $entry, '.json' );
                            $table = $app->get_table( $name );
                            if (! $table || $table->version < $scheme->version ) {
                                $ctx->local_vars['scheme_upgrade'] = true;
                                $scheme_upgrade_count++;
                                $cfg['upgrade_scheme'] = true;
                            }
                        }
                    }
                }
            }
            $doc = $component->path() . DS . 'docs' . DS . 'README.' . $app->user->language . '.md';
            unset( $cfg['document'] );
            if ( file_exists ( $doc ) ) {
                $cfg['document'] = 'README.' . $app->user->language . '.md';
            }
            $plugins_loop[ $key ] = $cfg;
        }
        $ctx->local_vars['upgrade_count'] = $upgrade_count;
        $ctx->local_vars['plugin_scheme_upgrade_count'] = $scheme_upgrade_count;
        if ( $scheme_upgrade_count ) {
            $ctx->local_vars['scheme_upgrade_count'] = $scheme_upgrade_count;
            $cfg = $app->db->model( 'option' )->get_by_key(
                ['kind' => 'config', 'key' => 'upgrade_count'] );
            $cfg->value( $scheme_upgrade_count );
            $cfg->data( time() );
            $cfg->save();
        }
        $ctx->local_vars['error'] = implode( "\n", $errors );
        $ctx->local_vars['plugins_loop'] = $plugins_loop;
        return $app->__mode( 'manage_plugins' );
    }

    function upgrade_plugin_check ( $app, $require_component = false ) {
        $upgrade_count = 0;
        $plugin_switch = $app->plugin_switch;
        $cfg_settings = $app->cfg_settings;
        $components = [];
        foreach ( $cfg_settings as $key => $cfg ) {
            $switch = $plugin_switch[ $key ];
            $cfg['status'] = $switch->number;
            $old_version = $switch->value;
            if ( $cfg['status'] ) {
                $comp = version_compare( $cfg['version'], $old_version );
                if ( $comp === 1 ) {
                    if ( $require_component ) {
                        $components[ $cfg['component'] ] = $cfg['version'];
                    }
                    $upgrade_count++;
                }
            }
        }
        if ( $require_component ) {
            return $components;
        }
        return $upgrade_count;
    }

    function view_plugin_doc ( $app ) {
        $workspace = $app->workspace()
                   ? $app->workspace() : $app->db->model( 'workspace' )->new( ['id' => 0 ] );
        if (! $app->can_do( 'manage_plugins', null, null, $workspace ) ) {
            $app->error( 'Permission denied.' );
        }
        $plugin_id = $app->param( 'plugin_id' );
        $component = $app->component( $plugin_id );
        if (! $component ) {
            $component = $app->autoload_component( $plugin_id );
        }
        $doc = $component->path() . DS . 'docs' . DS . 'README.' . $app->user->language . '.md';
        if ( file_exists ( $doc ) ) {
            $html = file_get_contents( $doc );
            require_once( LIB_DIR . 'php-markdown'
                . DS . 'Michelf' . DS . 'Markdown.inc.php' );
            $html = Markdown::defaultTransform( $html );
            $html = $app->build( $html );
            $app->ctx->local_vars['html'] = $html;
            unset( $app->ctx->local_vars['user_id'] );
            unset( $app->ctx->vars['user_id'] );
            $app->ctx->local_vars['page_title'] = $component->name . ' / ' . basename( $doc );
            return $app->__mode( 'view_plugin_doc' );
        }
    }

    function get_config_value ( $name, $ws_id = 0, $inheritance = false ) {
        $app = Prototype::get_instance();
        $plugin_id = strtolower( get_class( $this ) );
        if ( $this->config_vars === false || $name === false ) {
            $terms = ['extra' => $plugin_id, 'kind' => 'plugin_setting'];
            $settings = $app->db->model( 'option' )->load_iter( $terms,
                        ['sort' => 'id', 'direction' => 'descend'], 'id,workspace_id,key,value' );
            $settings = $settings->fetchAll( PDO::FETCH_ASSOC );
            $all_settings = [];
            $duplicates = [];
            foreach ( $settings as $setting ) {
                if ( isset( $all_settings[(int) $setting['option_workspace_id'] ][ $setting['option_key'] ] ) ) {
                    $duplicates[] = $app->db->model( 'option' )->new( $setting );
                    continue;
                }
                $all_settings[(int) $setting['option_workspace_id'] ][ $setting['option_key'] ] = $setting['option_value'];
            }
            if (! empty( $duplicates ) ) {
                $app->db->model( 'option' )->remove_multi( $duplicates );
            }
            $this->config_vars = $all_settings;
            if ( $name === false ) {
                if ( $ws_id !== false ) {
                    return isset( $all_settings[ $ws_id ] ) ? $all_settings[ $ws_id ] : [];
                }
                return $all_settings;
            }
        }
        if ( $this->config_vars !== false ) {
            $ws_id = (int) $ws_id;
            $config_vars = $this->config_vars;
            if ( isset( $config_vars[ $ws_id ][ $name ] ) ) {
                return $config_vars[ $ws_id ][ $name ];
            } else if ( $ws_id && $inheritance ) {
                if ( isset( $config_vars[0][ $name ] ) ) {
                    return $config_vars[0][ $name ];
                }
            }
        }
        $cfg_settings = $app->cfg_settings;
        if ( isset( $cfg_settings[ $plugin_id ] ) ) {
            $cfg_settings = $cfg_settings[ $plugin_id ];
            if ( isset( $cfg_settings['settings'] ) ) {
                if ( isset( $cfg_settings['settings'][ $name ] ) ) {
                    return $cfg_settings['settings'][ $name ];
                }
            }
        }
    }

    function set_config_value ( $name, $value, $ws_id = 0 ) {
        $app = Prototype::get_instance();
        $plugin_id = strtolower( get_class( $this ) );
        $terms = ['extra' => $plugin_id, 'key' => $name,
                  'workspace_id' => $ws_id, 'kind' => 'plugin_setting'];
        $setting_obj = $app->db->model( 'option' )->get_by_key( $terms );
        $setting_obj->value( $value );
        $setting_obj->save();
        if ( $this->config_vars !== false ) {
            $ws_id = (int) $ws_id;
            if ( isset( $this->config_vars[ $ws_id ][ $name ] ) ) {
                unset( $this->config_vars[ $ws_id ][ $name ] );
            }
        }
    }

    public function save_url ( $url, $obj = null, $unlink = false ) {
        PTUtil::set_url_path( $url );
        $app = Prototype::get_instance();
        if ( $app->publish_callbacks ) {
            if (! $obj ) {
                $obj = $app->db->model( $url->model )->load( $url->object_id );
            }
            $ctx = $app->ctx;
            $app->init_callbacks( 'blob', 'start_publish' );
            $callback = ['name' => 'start_publish', 'model' => 'blob',
                         'object' => $obj, 'ctx' => $ctx, 'original' => $obj,
                         'unlink' => $unlink ];
            $callback['urlinfo'] = $url;
            $app->run_callbacks( $callback, 'blob', $unlink );
            $url = $callback['urlinfo'];
        }
        if ( !$unlink && $url->model != 'upload_file'
            && $app->fmgr->exists( $url->file_path ) && $url->class == 'plugin' ) {
            $max_packet = $app->max_packet ? $app->max_packet : $this->max_packet;
            if (! $max_packet ) {
                $sql = "SHOW VARIABLES LIKE 'max_allowed_packet'";
                $max_allowed_packet = $app->db->db->query( $sql )->fetchAll();
                if ( isset( $max_allowed_packet[0][1] ) ) {
                    $max_packet = (int) $max_allowed_packet[0][1];
                    $this->max_packet = $max_packet;
                }
            }
            if ( $max_packet ) {
                $max_packet -= 1048576;
                $filesize = filesize( $url->file_path );
                if ( $filesize < $max_packet ) {
                    $meta = $app->db->model( 'meta' )->get_by_key(
                        ['object_id' => $url->object_id, 'model' => $url->model,
                         'key' => $url->key, 'kind' => 'plugin', 'type' => $this->id ] );
                    $meta->blob( $app->fmgr->get( $url->file_path ) );
                    $meta->save();
                    if ( $url->meta_id != $meta->id ) {
                        $url->meta_id( $meta->id );
                        $url->save();
                    }
                }
            }
        }
        return $url;
    }

    function add_template_vars ( $ctx, $key, $addVar = null ) {
        if ( is_string( $ctx ) ) {
            $app = Prototype::get_instance();
            $addVar = $key;
            $key = $ctx;
            $ctx = $app->ctx;
        }
        $var = isset( $ctx->vars[ $key ] ) ? $ctx->vars[ $key ] : null;
        if (! $var === null ) {
            $var = $addVar;
        } else {
            $var = is_array( $var ) ? array_merge( $var, $addVar ) : $var . $addVar;
        }
        $ctx->vars[ $key ] = $var;
    }

    function edit_mime_type ( $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $model = $app->param( '_model' );
        $id = (int) $app->param( 'id' );
        $permalink = isset( $app->ctx->vars['permalink'] )
                   ? $app->ctx->vars['permalink'] : '';
        if ( $permalink && $permalink !== 1 ) {
            $mime_type = PTUtil::get_mime_type( $permalink );
            return $mime_type;
        } else {
            $workspace_id = (int) $app->param( 'workspace_id' );
            $terms = ['model' => $model, 'workspace_id' => $workspace_id ];
            if ( $model == 'template' && $id ) {
                $terms['template_id'] = $id;
            } else if ( $model == 'template' && !$id ) {
                return 'text/plain';
            }
            $mappings = $app->db->model( 'urlmapping' )->load(
                $terms, ['sort' => 'is_preferred', 'direction' => 'descend'] );
            if ( is_array( $mappings ) && !empty( $mappings ) ) {
                $mapping = $mappings[0];
                $table = $app->get_table( $model );
                $id = $app->param( 'id' );
                $obj = $id ? $app->db->model( $model )->load( $id )
                     : $app->db->model( $model )->new( ['id' => -1] );
                $permalink = $app->build_path_with_map( $obj, $mapping, $table );
                $mime_type = PTUtil::get_mime_type( $permalink );
                return $mime_type;
            }
        }
        if ( $model == 'template' && $id ) {
            $obj = $app->ctx->stash( 'object' );
            if ( $obj && $obj->class === 'Archive' ) {
                $mapping = $obj->map();
                if ( $mapping && $mapping->model === 'template' ) {
                    return PTUtil::get_mime_type( $mapping->mapping );
                }
                $text = $app->linked_file === 2 ? $obj->_text( $app ) : $obj->text;
                if ( $this->is_html( $text ) ) {
                    return 'text/html';
                }
            }
        }
        return 'text/plain';
    }

    function is_html ( $text ) {
        if (! $text || !is_string( $text ) ) return false;
        return preg_match( '/\A\s*<!DOCTYPE\s+html|<title[\s>]/i', $text ) === 1;
    }

    function is_active ( $component, $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $class = $app->component( $component );
        if (! $class ) return false;
        $plugin_switch = $app->plugin_switch;
        $component = strtolower( $component );
        if (! isset( $plugin_switch[ $component ] ) ) {
            return false;
        } else {
            $plugin_switch = $plugin_switch[ $component ];
            return $plugin_switch->number ? true : false;
        }
        return false;
    }

    function cache_exists ( $key, $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $cache_dir = $app->support_dir . DS . 'cache' . DS . $this->id . '_cache' . DS;
        return $app->fmgr->exists( $cache_dir . $key );
    }

    function get_cache ( $key, $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $cache_dir = $app->support_dir . DS . 'cache' . DS . $this->id . '_cache' . DS;
        $result = null;
        $fmgr = $app->fmgr;
        if ( $fmgr->exists( $cache_dir . $key ) ) {
            $result = $fmgr->get( $cache_dir . $key );
            if ( $result === false ) $result = null;
        }
        return $result;
    }

    function set_cache ( $key, $value, $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $cache_dir = $app->support_dir . DS . 'cache' . DS . $this->id . '_cache' . DS;
        $fmgr = $app->fmgr;
        return $fmgr->put( $cache_dir . $key, $value );
    }

    function flush_cache ( $key = null, $expires = null, $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $cache_dir = $app->support_dir . DS . 'cache' . DS . $this->id . '_cache' . DS;
        $fmgr = $app->fmgr;
        if ( $fmgr->exists( $cache_dir . $key ) ) {
            $expires = (int) $expires;
            $start = $expires > 0 ? time() : 0;
            if ( is_dir( $cache_dir . $key ) ) {
                $dir = rtrim( $cache_dir . $key, DS );
                if ( $expires ) {
                    PTUtil::file_find( $dir, $files );
                    $res = false;
                    foreach ( $files as $file ) {
                        $mtime = $start - filemtime( $file );
                        if ( $mtime >= $expires ) {
                            $res = true;
                            $fmgr->unlink( $file );
                        }
                    }
                    return $res;
                } else {
                    return $fmgr->rmdir( $dir, true );
                }
                return false;
            }
            if ( $expires ) {
                $mtime = $start - filemtime( $cache_dir . $key );
                if ( $mtime >= $expires ) {
                    return $fmgr->unlink( $cache_dir . $key );
                }
                return false;
            }
            return $fmgr->unlink( $cache_dir . $key );
        }
        return false;
    }

    function log ( $message, $level = 'info', $metadata = [], $workspace_id = 0, $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $plugin_id = strtolower( get_class( $this ) );
        $log = ['level' => $level, 'category' => $plugin_id,
                'message' => $message, 'workspace_id' => $workspace_id ];
        if (! empty( $metadata ) ) {
            $log['metadata'] = $metadata;
        }
        $log = $app->log( $log );
        if ( $app->id === 'Worker' && $level == 'error' ) {
            echo $message, PHP_EOL;
        }
        return $log;
    }
}