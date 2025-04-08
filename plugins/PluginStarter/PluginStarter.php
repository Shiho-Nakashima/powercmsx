<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class PluginStarter extends PTPlugin {

    public $upgrade_functions = [ ['version_limit' => 1.2, 'method' => 'add_new_phrase'] ];

    private $reserved_models = ['index', 'blob', 'activity', 'plugin'];

    function __construct () {
        parent::__construct();
    }

    function validation_existing_class ( $label, &$value, &$msg, $col = null ) {
        $app = Prototype::get_instance();
        if ( $app->plugin_starter_can_existing ) {
            return true;
        }
        $res = $this->existing_class( $value );
        if ( $res !== true ) {
            $msg = $res;
            return false;
        }
        return true;
    }

    function existing_class ( $name, $app = null ) {
        $app = $app ? $app : $app = Prototype::get_instance();
        if ( $app->plugin_starter_can_existing ) {
            return true;
        }
        $default_models = $app->get_config( 'default_models' );
        $reserved_models = $this->reserved_models;
        if ( $default_models ) {
            $default_models = explode( ',', $default_models->value );
        }
        $default_models = is_array( $default_models )
                        ? array_merge( $default_models, $reserved_models )
                        : $reserved_models;
        $plugin_dirs = $app->plugin_starter_check_default_plugins
                     ? [ $app->pt_dir . DS . 'plugins' . DS ] : $app->plugin_paths;
        $add_models = [];
        $ds = DS;
        foreach ( $plugin_dirs as $plugin_dir ) {
            foreach ( glob("{$plugin_dir}{$ds}*{$ds}*.php") as $filename ) {
                // include_once( $filename );
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
        $msg = '';
        if ( in_array( strtolower( $name ), $default_models ) || class_exists( $name ) ) {
            return $this->translate( "The name '%s' already exists or is reserved for the system.", $name );
        } else if (! $this->is_valid_key( $name, $app->translate( 'Name' ), $msg ) ) {
            return $msg;
        }
        return true;
    }

    function plugin_starter ( $app ) {
        if ( $app->request_method == 'POST' ) {
            $app->validate_magic();
            $name = trim( $app->param( 'name' ) );
            $callback_model = $app->param( 'callback_model' );
            $callback_kind = $app->param( 'callback_kind' );
            $callback_priority = $app->param( 'callback_priority' );
            $i = 0;
            foreach ( $callback_model as $cb_model ) {
                $cb_kind = $callback_kind[ $i ];
                $cb_priority = $callback_priority[ $i ];
                $_POST['callback_key'][] = "{$cb_model}_{$cb_kind}_{$cb_priority}";
                $_REQUEST['callback_key'][] = "{$cb_model}_{$cb_kind}_{$cb_priority}";
                $i++;
            }
            $res = $this->existing_class( $name );
            if ( $res !== true  ) {
                $app->ctx->vars['error']
                    = $app->translate( "The name '%s' can not be specified.", $name );
            } else {
                $errors = $this->export_plugin( $app, $name );
                if ( is_array( $errors ) && !empty( $errors ) ) {
                    $app->ctx->vars['error'] = implode( "\n", $errors );
                }
            }
        }
        return $app->build_page( 'plugin_starter.tmpl', [] );
    }

    function is_valid_key ( $prop, $name, &$msg = '', $len = 50 ) {
        if ( $prop == '404-error' && $name == $this->translate( 'Callback' )) {
            return true;
        }
        if (! preg_match( "/^[a-zA-Z][a-zA-Z0-9_]*$/", $prop ) ) {
            $msg = $this->translate(
            'A valid %s starts with a letter, '
            .'followed by any number of letters, numbers, or underscores.', $name );
            return false;
        }
        if ( $len ) {
            if ( strlen( $prop ) > $len ) {
                $msg = $this->translate(
                'The %s must be %s characters or less.', [ $name, $len ] );
                return false;
            }
        }
        return true;
    }

    function export_plugin ( $app, $name, $is_validation = false ) {
        $app->init_tags();
        $_all_tags = $app->ctx->all_tags;
        $all_tags = [];
        foreach ( $_all_tags as $kind => $tags ) {
            $all_tags = array_merge( $all_tags, array_keys( $tags ) );
        }
        $all_tags = array_unique( $all_tags );
        $app->ctx->vars['name'] = $name;
        $id = strtolower( $name );
        $errors = [];
        $description = trim( $app->param( 'description' ) );
        $description_locale = trim( $app->param( 'description_locale' ) );
        $version = trim( $app->param( 'version' ) );
        $author = trim( $app->param( 'author' ) );
        $author_url = trim( $app->param( 'author_url' ) );
        $fmgr = $app->fmgr;
        $fmgr->denied_exts = null;
        $dir = $app->upload_dir();
        $dir = $dir . DS . $name;
        $fmgr->mkpath( $dir );
        $config = ['label' => $name, 'id' => $id, 'component' => $name,
                   'description' => $description ];
        $config['version'] = $version;
        $config['author'] = $author;
        $config['author_link'] = $author_url;
        $locale = [];
        if ( $description && $description_locale ) {
            $locale = [ $description => $description_locale ];
        }
        $config_key = $app->param( 'config_key' );
        $config_value = $app->param( 'config_value' );
        if ( is_array( $config_key ) && ! empty( $config_key ) && count( $config_key ) > 1 ) {
            array_shift( $config_key );
            array_shift( $config_value );
            $i = 0;
            $config_settings = [];
            foreach ( $config_key as $key ) {
                $key = strtolower( trim( $key ) );
                $msg = null;
                if (! $this->is_valid_key( $key, $this->translate( 'Config Setting' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $key && ! $msg ) {
                    if ( strpos( $key, $id ) !== 0 ) {
                        $key = "{$id}_{$key}";
                    }
                    $value = isset( $config_value[ $i ] ) ? $config_value[ $i ] : '';
                    if ( ctype_digit( (string) $value ) ) {
                        $value = (int) $value;
                    }
                    $config_settings[ $key ] = $value;
                }
                $i++;
            }
            if (! empty( $config_settings ) ) {
                $config['config_settings'] = $config_settings;
            }
        }
        $setting_key = $app->param( 'setting_key' );
        $setting_value = $app->param( 'setting_value' );
        $setting_scope = $app->param( 'setting_scope' );
        $setting_label = $app->param( 'setting_label' );
        $setting_label_locale = $app->param( 'setting_label_locale' );
        if ( is_array( $setting_key ) && ! empty( $setting_key ) && count( $setting_key ) > 1 ) {
            array_shift( $setting_key );
            array_shift( $setting_value );
            array_shift( $setting_scope );
            array_shift( $setting_label );
            array_shift( $setting_label_locale );
            $i = 0;
            $settings = [];
            $system_settings = [];
            $workspace_settings = [];
            foreach ( $setting_key as $key ) {
                $key = strtolower( trim( $key ) );
                $msg = null;
                if (! $this->is_valid_key( $key, $this->translate( 'Plugin Setting' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $key && ! $msg ) {
                    if ( strpos( $key, $id ) !== 0 ) {
                        $key = "{$id}_{$key}";
                    }
                    $value = isset( $setting_value[ $i ] ) ? $setting_value[ $i ] : '';
                    $type = 'string';
                    if ( ctype_digit( (string) $value ) ) {
                        $value = (int) $value;
                        $type = 'integer';
                    } else if ( $value == 'true' || $value == 'false' ) {
                        $value = $value == 'true' ? true : false;
                        $type = 'boolean';
                    }
                    $settings[ $key ] = $value;
                    $scope = isset( $setting_scope[ $i ] ) ? $setting_scope[ $i ] : '';
                    $label = isset( $setting_label[ $i ] ) ? $setting_label[ $i ] : '';
                    $label_locale = isset( $setting_label_locale[ $i ] ) ? $setting_label_locale[ $i ] : '';
                    $array = ['type' => $type, 'label' => $label ];
                    if ( $scope ) {
                        if ( $scope == 1 ) {
                            $system_settings[ $key ] = $array;
                        } else if ( $scope == 2 ) {
                            $workspace_settings[ $key ] = $array;
                        } else if ( $scope == 3 ) {
                            $system_settings[ $key ] = $array;
                            $workspace_settings[ $key ] = $array;
                        }
                    }
                    if ( $label && $label_locale ) {
                        $locale[ $label ] = $label_locale;
                    }
                }
                $i++;
            }
            if (! empty( $settings ) ) {
                $config['settings'] = $settings;
            }
            if (! empty( $system_settings ) || ! empty( $workspace_settings ) ) {
                $config['cfg_template'] = 'cfg_template.tmpl';
                if (! empty( $system_settings ) ) {
                    $config['cfg_system'] = 1;
                }
                if (! empty( $workspace_settings ) ) {
                    $config['cfg_space'] = 1;
                }
                $all_settings = array_merge( $system_settings, $workspace_settings );
                $all_settings_loop = [];
                foreach ( $all_settings as $setting_key => $setting_detail ) {
                    if ( isset( $system_settings[ $setting_key ] ) && !isset( $workspace_settings[ $setting_key ] ) ) {
                        $setting_detail['only_system'] = true;
                    } else {
                        $setting_detail['only_system'] = false;
                    }
                    if (! isset( $system_settings[ $setting_key ] ) && isset( $workspace_settings[ $setting_key ] ) ) {
                        $setting_detail['only_space'] = true;
                    } else {
                        $setting_detail['only_space'] = false;
                    }
                    $all_settings_loop[ $setting_key ] = $setting_detail;
                }
                if (!empty ( $all_settings_loop ) ) {
                    $tmpl = $this->path() . DS . 'tmpl' . DS . 'cfg_template.tmpl';
                    $app->ctx->vars['settings_loop'] = $all_settings_loop;
                    $build = $app->ctx->build( $fmgr->get( $tmpl ) );
                    $build = str_replace( '{mt:', '<mt:', $build );
                    $build = str_replace( '/mt}', '>', $build );
                    $build = str_replace( '{/mt:', '</mt:', $build );
                    $fmgr->mkpath( $dir . DS . 'tmpl' );
                    $fmgr->put( $dir . DS . 'tmpl' . DS . 'cfg_template.tmpl', $build );
                }
            }
        }
        $functions = [];
        $method_mode = $app->param( 'method_mode' );
        $method_permission = $app->param( 'method_permission' );
        $method_menu = $app->param( 'method_menu' );
        $method_menu_order = $app->param( 'method_menu_order' );
        $method_menu_label = $app->param( 'method_menu_label' );
        $method_menu_label_locale = $app->param( 'method_menu_label_locale' );
        if ( is_array( $method_mode ) && ! empty( $method_mode ) && count( $method_mode ) > 1 ) {
            array_shift( $method_mode );
            array_shift( $method_permission );
            array_shift( $method_menu );
            array_shift( $method_menu_order );
            array_shift( $method_menu_label );
            array_shift( $method_menu_label_locale );
            $i = 0;
            $menus = [];
            $methods = [];
            $tmpl_method = $fmgr->get( $this->path() . DS . 'tmpl' . DS . 'plugin_method.tmpl' );
            $build_method = $fmgr->get( $this->path() . DS . 'tmpl' . DS . 'build_method.tmpl' );
            foreach ( $method_mode as $mode ) {
                $mode = strtolower( trim( $mode ) );
                $msg = null;
                if (! $this->is_valid_key( $mode, $this->translate( 'Method' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $mode && ! $msg ) {
                    $permission = isset( $method_permission[ $i ] ) ? $method_permission[ $i ] : '';
                    $methods[ $mode ] = ['component' => $name, 'method' => $mode ];
                    if ( $permission ) {
                        $methods[ $mode ]['permission'] = $permission;
                    }
                    $functions[ $mode ] = ['( $app )'];
                    $menu = isset( $method_menu[ $i ] ) ? $method_menu[ $i ] : '';
                    $label = isset( $method_menu_label[ $i ] ) ? $method_menu_label[ $i ] : '';
                    if ( $menu && $label ) {
                        $array = ['component' => $name, 'mode' => $mode ];
                        if ( $menu == 1 ) {
                            $array['display_system'] = 1;
                        } else if ( $menu == 2 ) {
                            $array['display_space'] = 1;
                        } else if ( $menu == 3 ) {
                            $array['display_system'] = 1;
                            $array['display_space'] = 1;
                        }
                        $array['label'] = $label;
                        if ( $permission ) {
                            $array['permission'] = $permission;
                        }
                        $order = isset( $method_menu_order[ $i ] ) ? $method_menu_order[ $i ] : 1000;
                        $array['order'] = (int) $order;
                        $label_locale = isset( $method_menu_label_locale[ $i ] ) ? $method_menu_label_locale[ $i ] : '';
                        if ( $label_locale ) {
                            $locale[ $label ] = $label_locale;
                        }
                        $menus[ $mode ] = $array;
                        $tmpl_dir = $dir . DS . 'tmpl';
                        $fmgr->mkpath( $tmpl_dir );
                        $app->ctx->vars['this_label'] = str_replace( "'", "\\'", $label );
                        $app->ctx->vars['this_mode'] = $mode;
                        $arguments = $app->build( $tmpl_method );
                        $functions[ $mode ] = ['( $app )', $arguments ];
                        $fmgr->put( $dir . DS . 'tmpl' . DS . $mode . '.tmpl', $build_method );
                    }
                }
                $i++;
            }
            if (! empty( $menus ) ) {
                $config['menus'] = $menus;
            }
            if (! empty( $methods ) ) {
                $config['methods'] = $methods;
            }
        }
        $api_method_mode = $app->param( 'api_method_mode' );
        $api_method_version = $app->param( 'api_method_version' );
        $api_method_login = $app->param( 'api_method_login' );
        $api_method_permission = $app->param( 'api_method_permission' );
        $api_method_allowed = $app->param( 'api_method_allowed' );
        if ( is_array( $api_method_mode ) && ! empty( $api_method_mode ) && count( $api_method_mode ) > 1 ) {
            $api_version = $this->get_api_version();
            array_shift( $api_method_mode );
            array_shift( $api_method_version );
            array_shift( $api_method_login );
            array_shift( $api_method_permission );
            array_shift( $api_method_allowed );
            $tmpl_method = $fmgr->get( $this->path() . DS . 'tmpl' . DS . 'plugin_api_method.tmpl' );
            $i = 0;
            $api_methods = [];
            foreach ( $api_method_mode as $mode ) {
                $version = $api_method_version[ $i ] ?? $api_version;
                $version = strtolower( $version );
                $version = (int) $version;
                $version = "v{$version}";
                $api_methods[ $version ][ $mode ]['component'] = $name;
                $api_methods[ $version ][ $mode ]['method'] = $mode;
                $login = $api_method_login[ $i ] ? true : false;
                $api_methods[ $version ][ $mode ]['requires_login'] = $login;
                $permission = $api_method_permission[ $i ] ?? '';
                $permission = trim( $permission );
                if ( $permission ) {
                    $api_methods[ $version ][ $mode ]['permission'] = $permission;
                }
                $allowed = $api_method_allowed[ $i ] ?? '';
                $allowed = trim( $allowed );
                if ( $allowed ) {
                    $api_methods[ $version ][ $mode ]['allowed'] = explode( ',', $allowed );
                }
                $functions[ $mode ] = ['( $app )', $tmpl_method ];
                $i++;
            }
            if (! empty( $api_methods ) ) {
                $config['api_methods'] = $api_methods;
            }
        }
        $tag_name = $app->param( 'tag_name' );
        $tag_kind = $app->param( 'tag_kind' );
        $tag_description = $app->param( 'tag_description' );
        $description_locale = $app->param( 'tag_description_locale' );
        if ( is_array( $tag_name ) && ! empty( $tag_name ) && count( $tag_name ) > 1 ) {
            array_shift( $tag_name );
            array_shift( $tag_kind );
            array_shift( $tag_description );
            array_shift( $description_locale );
            $i = 0;
            $tags = [];
            $tag_reference = [];
            $tags_dir = $this->path() . DS . 'tmpl' . DS . 'tags' . DS;
            $tag_kinds = ['block', 'conditional', 'function', 'modifier'];
            foreach ( $tag_name as $tag ) {
                $tag = strtolower( trim( $tag ) );
                $msg = '';
                if (! $this->is_valid_key( $tag, $this->translate( 'Template Tag' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( in_array( $tag, $all_tags ) ) {
                    $msg = $this->translate( "The Tag '%s' already exists.", $tag );
                    $errors[] = $msg;
                }
                $kind = isset( $tag_kind[ $i ] ) ? $tag_kind[ $i ] : '';
                if (! in_array( $kind, $tag_kinds ) ) {
                    $msg = $this->translate( 'Invalid Tag %s.', $kind );
                    $errors[] = $msg;
                }
                $description = isset( $tag_description[ $i ] ) ? $tag_description[ $i ] : '';
                $desc_locale = isset( $description_locale[ $i ] ) ? $description_locale[ $i ] : '';
                if ( $tag && $kind && ! $msg ) {
                    if ( $description ) {
                        $tag_key = $kind == 'modifier' ? "modifier_{$tag}" : $tag;
                        $tag_reference[ $tag_key ] = ['description' => $description ];
                        if ( $kind == 'block' ) {
                            $tag_reference[ $tag_key ]['set_loop_vars'] = true;
                            $tag_reference[ $tag_key ]['variables'] = ['variable_1' => 'Description of variable_1.'];
                        }
                        if ( $kind !== 'modifier' ) {
                            $tag_reference[ $tag_key ]['attributes'] = ['attribute_1' => 'Description of attribute_1.'];
                        } else {
                            $tag_reference[ $tag_key ]['attribute'] = '';
                        }
                    }
                    $meth = $kind === 'modifier' ? 'filter_' . $tag : 'hdlr_' . $tag;
                    $tags[ $kind ][ $tag ] = ['component' => $name, 'method' => $meth ];
                    $function = $fmgr->get( $tags_dir . $kind . '.tmpl' );
                    if ( $kind == 'block' ) {
                        $functions[ $meth ] = ['( $args, $content, $ctx, &$repeat, $counter )', $function ];
                    } else if ( $kind == 'conditional' ) {
                        $functions[ $meth ] = ['( $args, $content, $ctx, $repeat, $counter )', $function ];
                    } else if ( $kind == 'function' ) {
                        $functions[ $meth ] = ['( $args, $ctx )', $function ];
                    } else if ( $kind == 'modifier' ) {
                        $functions[ $meth ] = ['( $text, $arg, $ctx )', $function ];
                    }
                }
                if ( $description && $desc_locale ) {
                    $locale[ $description ] = $desc_locale;
                }
                $i++;
            }
            if (! empty( $tags ) ) {
                $config['tags'] = $tags;
            }
            if (! empty( $tag_reference ) ) {
                $fmgr->mkpath( $dir . DS . 'docs' );
                $tag_reference = json_encode( $tag_reference, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
                $fmgr->put( $dir . DS . 'docs' . DS . 'tag_reference.json', $tag_reference );
            }
        }
        $hook_kind = $app->param( 'hook_kind' );
        $hook_priority = $app->param( 'hook_priority' );
        if ( is_array( $hook_kind ) && ! empty( $hook_kind ) && count( $hook_kind ) > 1 ) {
            array_shift( $hook_kind );
            array_shift( $hook_priority );
            $i = 0;
            $hooks = [];
            foreach ( $hook_kind as $hook ) {
                $hook = strtolower( trim( $hook ) );
                $msg = '';
                if (! $this->is_valid_key( $hook, $this->translate( 'Hook' ), $msg ) ) {
                    $errors[] = $msg;
                }
                $priority = isset( $hook_priority[ $i ] ) && $hook_priority[ $i ] ? $hook_priority[ $i ] : 5;
                $priority = (int) $priority;
                if ( $hook && ! $msg ) {
                    $hook_id = strpos( $hook, $id ) === 0 ? $hook : "{$id}_{$hook}";
                    $hooks[ $hook_id ] = [ $hook => [
                        'component' => $name,
                        'priority'  => $priority,
                        'method'    => $hook
                    ] ];
                    $functions[ $hook ] = ['( $app )' ];
                }
                $i++;
            }
            if (! empty( $hooks ) ) {
                $config['hooks'] = $hooks;
            }
        }
        $edit_property_key = $app->param( 'edit_property_key' );
        $edit_property_label = $app->param( 'edit_property_label' );
        $edit_property_label_locale = $app->param( 'edit_property_label_locale' );
        $edit_property_order = $app->param( 'edit_property_order' );
        if ( is_array( $edit_property_key ) && ! empty( $edit_property_key ) && count( $edit_property_key ) > 1 ) {
            array_shift( $edit_property_key );
            array_shift( $edit_property_label );
            array_shift( $edit_property_label_locale );
            array_shift( $edit_property_order );
            $i = 0;
            $prop_content =  '        if ( $app->mode === \'save\' ) {' . PHP_EOL . PHP_EOL;
            $prop_content .= '        } else if ( $app->mode === \'view\' ) {' . PHP_EOL . PHP_EOL;
            $prop_content .= '        }';
            $edit_properties = [];
            $tmpl_content = $fmgr->get( $this->path() . DS . 'tmpl' . DS . 'custom_edit_property.tmpl' );
            $alt_tmpl = $dir . DS . 'alt-tmpl' . DS . 'include' . DS . 'edit';
            $fmgr->mkpath( $alt_tmpl );
            foreach ( $edit_property_key as $edit_property ) {
                $v_label = isset( $edit_property_label[ $i ] ) && $edit_property_label[ $i ] ? $edit_property_label[ $i ] : $edit_property;
                $edit_property_locale = isset( $edit_property_label_locale[ $i ] ) && $edit_property_label_locale[ $i ] ? $edit_property_label_locale[ $i ] : null;
                $edit_property = strtolower( trim( $edit_property ) );
                $order = isset( $edit_property_order[ $i ] ) && $edit_property_order[ $i ] ? $edit_property_order[ $i ] : 1000;
                $order = (int) $order;
                $msg = '';
                if (! $this->is_valid_key( $edit_property, $this->translate( 'CMS edit_property' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $edit_property && ! $msg ) {
                    $edit_properties[ $edit_property ] = [
                        'label'     => $v_label,
                        'component' => $name,
                        'method'    => $edit_property,
                        'order'  => $order
                    ];
                    $functions[ $edit_property ] = ['( &$app, &$obj, &$data )', ''];
                    $fmgr->put( $alt_tmpl . DS . $edit_property . '.tmpl', $tmpl_content );
                }
                if ( $edit_property_locale ) {
                    $locale[ $v_label ] = $edit_property_locale;
                }
                $i++;
            }
            if (! empty( $edit_properties ) ) {
                $config['edit_properties'] = $edit_properties;
            }
        }
        $return_true = '        return true;';
        $validation_key = $app->param( 'validation_key' );
        $validation_label = $app->param( 'validation_label' );
        $validation_label_locale = $app->param( 'validation_label_locale' );
        $validation_order = $app->param( 'validation_order' );
        if ( is_array( $validation_key ) && ! empty( $validation_key ) && count( $validation_key ) > 1 ) {
            array_shift( $validation_key );
            array_shift( $validation_label );
            array_shift( $validation_label_locale );
            array_shift( $validation_order );
            $i = 0;
            $validations = [];
            foreach ( $validation_key as $validation ) {
                $v_label = isset( $validation_label[ $i ] ) && $validation_label[ $i ] ? $validation_label[ $i ] : $validation;
                $validation_locale = isset( $validation_label_locale[ $i ] ) && $validation_label_locale[ $i ] ? $validation_label_locale[ $i ] : null;
                $validation = strtolower( trim( $validation ) );
                $order = isset( $validation_order[ $i ] ) && $validation_order[ $i ] ? $validation_order[ $i ] : 1000;
                $order = (int) $order;
                $msg = '';
                if (! $this->is_valid_key( $validation, $this->translate( 'CMS Validation' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $validation && ! $msg ) {
                    $validations[ $validation ] = [
                        'label'     => $v_label,
                        'component' => $name,
                        'method'    => $validation,
                        'order'  => $order
                    ];
                    $functions[ $validation ] = ['( $label, &$value, &$msg, $col = null )', $return_true ];
                }
                if ( $validation_locale ) {
                    $locale[ $v_label ] = $validation_locale;
                }
                $i++;
            }
            if (! empty( $validations ) ) {
                $config['cms_validations'] = $validations;
            }
        }
        $f_validation_key = $app->param( 'f_validation_key' );
        $f_validation_label = $app->param( 'f_validation_label' );
        $f_validation_label_locale = $app->param( 'f_validation_label_locale' );
        $f_validation_order = $app->param( 'f_validation_order' );
        if ( is_array( $f_validation_key ) && ! empty( $f_validation_key ) && count( $f_validation_key ) > 1 ) {
            array_shift( $f_validation_key );
            array_shift( $f_validation_label );
            array_shift( $f_validation_label_locale );
            array_shift( $f_validation_order );
            $i = 0;
            $f_validations = [];
            foreach ( $f_validation_key as $f_validation ) {
                $v_label = isset( $f_validation_label[ $i ] ) && $f_validation_label[ $i ] ? $f_validation_label[ $i ] : $f_validation;
                $f_validation_locale = isset( $f_validation_label_locale[ $i ] ) && $f_validation_label_locale[ $i ] ? $f_validation_label_locale[ $i ] : null;
                $f_validation = strtolower( trim( $f_validation ) );
                $order = isset( $f_validation_order[ $i ] ) && $f_validation_order[ $i ] ? $f_validation_order[ $i ] : 1000;
                $order = (int) $order;
                $msg = '';
                if (! $this->is_valid_key( $f_validation, $this->translate( 'Form Validation' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $f_validation && ! $msg ) {
                    $f_validations[ $f_validation ] = [
                        'label'     => $v_label,
                        'component' => $name,
                        'method'    => $f_validation,
                        'order'  => $order
                    ];
                    $functions[ $f_validation ] = ['( $app, $question, $value, &$msg )', $return_true ];
                    if ( $f_validation_locale ) {
                        $locale[ $v_label ] = $f_validation_locale;
                    }
                }
                $i++;
            }
            if (! empty( $f_validations ) ) {
                $config['form_validations'] = $f_validations;
            }
        }
        $system_filter_key = $app->param( 'system_filter_key' );
        $system_filter_model = $app->param( 'system_filter_model' );
        $system_filter_label = $app->param( 'system_filter_label' );
        $system_filter_label_locale = $app->param( 'system_filter_label_locale' );
        $system_filter_order = $app->param( 'system_filter_order' );
        if ( is_array( $system_filter_key ) && ! empty( $system_filter_key ) && count( $system_filter_key ) > 1 ) {
            array_shift( $system_filter_key );
            array_shift( $system_filter_model );
            array_shift( $system_filter_label );
            array_shift( $system_filter_label_locale );
            array_shift( $system_filter_order );
            $i = 0;
            $system_filters = [];
            foreach ( $system_filter_key as $system_filter ) {
                $filter_label = isset( $system_filter_label[ $i ] ) && $system_filter_label[ $i ] ? $system_filter_label[ $i ] : $system_filter;
                $filter_label_locale = isset( $system_filter_label_locale[ $i ] ) && $system_filter_label_locale[ $i ] ? $system_filter_label_locale[ $i ] : null;
                $system_filter = strtolower( trim( $system_filter ) );
                $model = isset( $system_filter_model[ $i ] ) && $system_filter_model[ $i ] ? $system_filter_model[ $i ] : null;
                $order = isset( $system_filter_order[ $i ] ) && $system_filter_order[ $i ] ? $system_filter_order[ $i ] : 10;
                $order = (int) $order;
                $msg = '';
                if (! $this->is_valid_key( $system_filter, $app->translate( 'System Filters' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $model && $system_filter && ! $msg ) {
                    $method = "filter_{$model}_{$system_filter}";
                    $system_filters[ $method ] = [
                        $model => [
                            $method => [
                                'name'      => $method,
                                'label'     => $filter_label,
                                'component' => $name,
                                'method'    => $method,
                                'order'     => $order
                            ]
                        ]
                    ];
                    $functions[ $method ] = ['( $app, &$terms, $model, $option, &$args, &$extra, &$ex_vals )' ];
                    if ( $filter_label_locale ) {
                        $locale[ $filter_label ] = $filter_label_locale;
                    }
                }
                $i++;
            }
            if (! empty( $system_filters ) ) {
                $config['system_filters'] = $system_filters;
            }
        }
        $list_action_key = $app->param( 'list_action_key' );
        $list_action_model = $app->param( 'list_action_model' );
        $list_action_label = $app->param( 'list_action_label' );
        $list_action_label_locale = $app->param( 'list_action_label_locale' );
        $list_action_input = $app->param( 'list_action_input' );
        $list_action_order = $app->param( 'list_action_order' );
        if ( is_array( $list_action_key ) && ! empty( $list_action_key ) && count( $list_action_key ) > 1 ) {
            array_shift( $list_action_key );
            array_shift( $list_action_model );
            array_shift( $list_action_label );
            array_shift( $list_action_label_locale );
            array_shift( $list_action_input );
            array_shift( $list_action_order );
            $i = 0;
            $list_actions = [];
            $tmpl_list_action = $this->path() . DS . 'tmpl' . DS . 'plugin_list_action.tmpl';
            $tmpl_list_action = $fmgr->get( $tmpl_list_action );
            foreach ( $list_action_key as $list_action ) {
                $filter_label = isset( $list_action_label[ $i ] ) && $list_action_label[ $i ] ? $list_action_label[ $i ] : $list_action;
                $filter_label_locale = isset( $list_action_label_locale[ $i ] ) && $list_action_label_locale[ $i ] ? $list_action_label_locale[ $i ] : null;
                $list_action = strtolower( trim( $list_action ) );
                $model = isset( $list_action_model[ $i ] ) && $list_action_model[ $i ] ? $list_action_model[ $i ] : null;
                $order = isset( $list_action_order[ $i ] ) && $list_action_order[ $i ] ? $list_action_order[ $i ] : 10;
                $order = (int) $order;
                $input = isset( $list_action_input[ $i ] ) ? (int) $list_action_input[ $i ] : 0;
                $msg = '';
                if (! $this->is_valid_key( $list_action, $this->translate( 'Action' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $model && $list_action && ! $msg ) {
                    $method = "action_{$model}_{$list_action}";
                    $list_actions[ $method ] = [
                        $model => [
                            $method => [
                                'name'      => $method,
                                'label'     => $filter_label,
                                'component' => $name,
                                'method'    => $method,
                                'input'     => $input,
                                'order'     => $order
                            ]
                        ]
                    ];
                    $functions[ $method ] = ['( $app, $objects, $action )', $tmpl_list_action ];
                    if ( $filter_label_locale ) {
                        $locale[ $filter_label ] = $filter_label_locale;
                    }
                }
                $i++;
            }
            if (! empty( $list_actions ) ) {
                $config['list_actions'] = $list_actions;
            }
        }
        $callbacks = [];
        $callback_model = $app->param( 'callback_model' );
        $callback_kind = $app->param( 'callback_kind' );
        $callback_priority = $app->param( 'callback_priority' );
        if ( is_array( $callback_model ) && ! empty( $callback_model ) && count( $callback_model ) > 1 ) {
            array_shift( $callback_model );
            array_shift( $callback_kind );
            array_shift( $callback_priority );
            $i = 0;
            foreach ( $callback_model as $cb_model ) {
                $cb_kind = $callback_kind[ $i ];
                $msg = '';
                if (! $this->is_valid_key( $cb_model, $app->translate( 'Model' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if (! $this->is_valid_key( $cb_kind, $this->translate( 'Callback' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $cb_model && $cb_kind && ! $msg ) {
                    $cb_priority = isset( $callback_priority[ $i ] )
                                 && $callback_priority[ $i ] ? (int) $callback_priority[ $i ] : 5;
                    $cb_key = "{$id}_{$cb_kind}_{$cb_model}";
                    if ( isset( $callbacks[ $cb_key ] ) ) {
                        $cb_key = "{$id}_{$cb_kind}_{$cb_model}_{$cb_priority}";
                    }
                    $cb_method = "{$cb_kind}_{$cb_model}";
                    if ( isset( $functions[ $cb_method ] ) ) {
                        $cb_method = "{$cb_kind}_{$cb_model}_{$cb_priority}";
                    }
                    $cb_key = str_replace( '-', '_', $cb_key );
                    $cb_method = str_replace( '-', '_', $cb_method );
                    if ( preg_match( '/^[0-9]/', $cb_method ) ) {
                        $cb_method = '_' . $cb_method;
                    }
                    $array = [ $cb_model => [
                               $cb_kind  => ['component' => $name,
                                             'priority' => $cb_priority,
                                             'method' => $cb_method ] ] ];
                    $callbacks[ $cb_key ] = $array;
                    if ( $cb_kind == 'before_save' || $cb_kind == 'post_save' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$obj, $original, $clone_org = null )', $return_true ];
                    } else if ( $cb_kind == 'post_save_clone' || $cb_kind == 'post_save_revision' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$obj, $original )', $return_true ];
                    } else if ( $cb_kind == 'save_filter' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$obj )', $return_true ];
                    } else if ( $cb_kind == 'delete_filter' || $cb_kind == 'start_listing' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app )', $return_true ];
                    } else if ( $cb_kind == 'pre_save' || $cb_kind == 'post_delete'
                        || $cb_kind == 'pre_delete' || $cb_kind == 'scheduled_published'
                        || $cb_kind == 'scheduled_unpublish' || $cb_kind == 'scheduled_replacement'
                        || $cb_kind == 'pre_import' || $cb_kind == 'post_import' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$obj, $original )', $return_true ];
                    } else if ( $cb_kind == 'pre_listing' || $cb_kind == 'pre_archive_count' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$terms, &$args, &$extra, &$placeholders )', $return_true ];
                    } else if ( $cb_kind == 'post_load_objects' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$objects, &$count_obj )', $return_true ];
                    } else if ( $cb_kind == 'pre_view' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$obj, &$url )', $return_true ];
                    } else if ( $cb_kind == '404-error' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, $obj )', $return_true ];
                    } else if ( $cb_kind == 'pre_archive_list' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$wheres )', $return_true ];
                    } else if ( $cb_kind == 'post_preview' ) {
                        $functions[ $cb_method ] = ['( $cb, $app, &$content )', $return_true ];
                    } else if ( $cb_kind == 'pre_preview' ) {
                        $functions[ $cb_method ] = ['( $cb, $app, &$tmpl )', $return_true ];
                    }
                }
                $i++;
            }
        }
        $callback_model = $app->param( 'b_callback_model' );
        $callback_kind = $app->param( 'b_callback_kind' );
        $callback_priority = $app->param( 'b_callback_priority' );
        if ( is_array( $callback_model ) && ! empty( $callback_model ) && count( $callback_model ) > 1 ) {
            array_shift( $callback_model );
            array_shift( $callback_kind );
            array_shift( $callback_priority );
            $i = 0;
            foreach ( $callback_model as $cb_model ) {
                $cb_kind = $callback_kind[ $i ];
                $msg = '';
                if (! $this->is_valid_key( $cb_model, $app->translate( 'Model' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if (! $this->is_valid_key( $cb_kind, $this->translate( 'Callback Name' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $cb_model && $cb_kind && ! $msg ) {
                    $config['config_overwrite']['publish_callbacks'] = true;
                    $cb_priority = isset( $callback_priority[ $i ] )
                                 && $callback_priority[ $i ] ? (int) $callback_priority[ $i ] : 5;
                    $cb_key = "{$id}_{$cb_kind}_{$cb_model}";
                    if ( isset( $callbacks[ $cb_key ] ) ) {
                        $cb_key = "{$id}_{$cb_kind}_{$cb_model}_{$cb_priority}";
                    }
                    $cb_method = "{$cb_kind}_{$cb_model}";
                    if ( isset( $functions[ $cb_method ] ) ) {
                        $cb_method = "{$cb_kind}_{$cb_model}_{$cb_priority}";
                    }
                    $array = [ $cb_model => [
                               $cb_kind  => ['component' => $name,
                                             'priority' => $cb_priority,
                                             'method' => $cb_method ] ] ];
                    $callbacks[ $cb_key ] = $array;
                    if ( $cb_kind == 'start_publish' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, &$unlink )', $return_true ];
                    } else if ( $cb_kind == 'pre_publish' ) {
                        if ( $cb_model == 'blob' ) {
                            $functions[ $cb_method ] = ['( &$cb, $app, &$data )', $return_true ];
                        } else {
                            $functions[ $cb_method ] = ['( &$cb, $app, &$tmpl )', $return_true ];
                        }
                    } else if ( $cb_kind == 'post_rebuild' || $cb_kind == 'post_publish' ) {
                        $functions[ $cb_method ] = ['( &$cb, $app, $tmpl, $built )', $return_true ];
                    }
                }
                $i++;
            }
        }
        $callback_model = $app->param( 'l_callback_model' );
        $callback_kind = $app->param( 'l_callback_kind' );
        $callback_priority = $app->param( 'l_callback_priority' );
        if ( is_array( $callback_model ) && ! empty( $callback_model ) && count( $callback_model ) > 1 ) {
            array_shift( $callback_model );
            array_shift( $callback_kind );
            array_shift( $callback_priority );
            $i = 0;
            foreach ( $callback_model as $cb_model ) {
                $cb_kind = $callback_kind[ $i ];
                $msg = '';
                if ( $cb_model != 'user' && $cb_model != 'member' ) {
                    $msg = $this->translate( 'Invalid Model %s.', $cb_model );
                    $errors[] = $msg;
                }
                if (! $this->is_valid_key( $cb_kind, $this->translate( 'Callback Name' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $cb_model && $cb_kind && ! $msg ) {
                    $cb_priority = isset( $callback_priority[ $i ] )
                                 && $callback_priority[ $i ] ? (int) $callback_priority[ $i ] : 5;
                    $cb_key = "{$id}_{$cb_kind}_{$cb_model}";
                    if ( isset( $callbacks[ $cb_key ] ) ) {
                        $cb_key = "{$id}_{$cb_kind}_{$cb_model}_{$cb_priority}";
                    }
                    $cb_method = "{$cb_kind}_{$cb_model}";
                    if ( isset( $functions[ $cb_method ] ) ) {
                        $cb_method = "{$cb_kind}_{$cb_model}_{$cb_priority}";
                    }
                    $array = [ $cb_model => [
                               $cb_kind  => ['component' => $name,
                                             'priority' => $cb_priority,
                                             'method' => $cb_method ] ] ];
                    $callbacks[ $cb_key ] = $array;
                    $functions[ $cb_method ] = ['( &$cb, $app, &$' . $cb_model . ' )', $return_true ];
                }
                $i++;
            }
        }
        $callback_basename = $app->param( 't_callback_basename' );
        $callback_kind = $app->param( 't_callback_kind' );
        $callback_priority = $app->param( 't_callback_priority' );
        if ( is_array( $callback_basename ) && ! empty( $callback_basename ) && count( $callback_basename ) > 1 ) {
            array_shift( $callback_basename );
            array_shift( $callback_kind );
            array_shift( $callback_priority );
            $i = 0;
            foreach ( $callback_basename as $cb_basename ) {
                $cb_kind = $callback_kind[ $i ];
                $msg = '';
                if (! $this->is_valid_key( $cb_basename, $this->translate( 'Template Basename' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if (! $this->is_valid_key( $cb_kind, $this->translate( 'Callback Name' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $cb_basename && $cb_kind ) {
                    $cb_priority = isset( $callback_priority[ $i ] )
                                 && $callback_priority[ $i ] ? (int) $callback_priority[ $i ] : 5;
                    $cb_key = "{$id}_{$cb_kind}_{$cb_basename}";
                    $cb_kind = strtolower( trim( $cb_kind ) );
                    $cb_key = strtolower( trim( $cb_key ) );
                    if ( isset( $callbacks[ $cb_key ] ) ) {
                        $cb_key = "{$id}_{$cb_kind}_{$cb_basename}_{$cb_priority}";
                    }
                    $cb_method = "{$cb_kind}_{$cb_basename}";
                    if ( isset( $functions[ $cb_method ] ) ) {
                        $cb_method = "{$cb_kind}_{$cb_basename}_{$cb_priority}";
                    }
                    $array = [ $cb_basename => [
                               $cb_kind  => ['component' => $name,
                                             'priority' => $cb_priority,
                                             'method' => $cb_method ] ] ];
                    $callbacks[ $cb_key ] = $array;
                    $arguments = $cb_kind == 'template_source' ? '( $cb, &$app, &$param, &$src )' : '( $cb, &$app, &$param, &$src, &$out )';
                    $functions[ $cb_method ] = [ $arguments, $return_true ];
                }
                $i++;
            }
        }
        $callback_model = $app->param( 'o_callback_model' );
        $callback_kind = $app->param( 'o_callback_kind' );
        $callback_priority = $app->param( 'o_callback_priority' );
        $arguments_map = [
            'mail_filter' => '( &$cb, $app, &$to, &$subject, &$body, &$headers )',
            'pre_search_estraier' => '( &$cb, $app, &$phrase, &$args )',
            'get_draft' => '( &$cb, $app, &$title, &$data, &$image_urls )',
            'post_twitter_authenticate' => '( &$cb, &$app )',
            'pre_response' => '( &$cb, $app, &$json )'
        ];
        if ( is_array( $callback_model ) && ! empty( $callback_model ) && count( $callback_model ) > 1 ) {
            array_shift( $callback_model );
            array_shift( $callback_kind );
            array_shift( $callback_priority );
            $i = 0;
            foreach ( $callback_model as $cb_model ) {
                $cb_kind = $callback_kind[ $i ];
                $msg = '';
                if (! $this->is_valid_key( $cb_model, $this->translate( 'Callback Key' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if (! $this->is_valid_key( $cb_kind, $this->translate( 'Callback Name' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $cb_model && $cb_kind ) {
                    $cb_priority = isset( $callback_priority[ $i ] )
                                 && $callback_priority[ $i ] ? (int) $callback_priority[ $i ] : 5;
                    $cb_key = "{$id}_{$cb_kind}_{$cb_model}";
                    $cb_kind = strtolower( trim( $cb_kind ) );
                    $cb_key = strtolower( trim( $cb_key ) );
                    if ( isset( $callbacks[ $cb_key ] ) ) {
                        $cb_key = "{$id}_{$cb_kind}_{$cb_model}_{$cb_priority}";
                    }
                    $cb_method = "{$cb_kind}_{$cb_model}";
                    if ( isset( $functions[ $cb_method ] ) ) {
                        $cb_method = "{$cb_kind}_{$cb_model}_{$cb_priority}";
                    }
                    $arguments = isset( $arguments_map[ $cb_kind ] )
                               ? $arguments_map[ $cb_kind ] : '( &$cb, $app, &$param1, &$param2, &$param3, &$param4 )';
                    $array = [ $cb_model => [
                               $cb_kind  => ['component' => $name,
                                             'priority' => $cb_priority,
                                             'method' => $cb_method ] ] ];
                    $callbacks[ $cb_key ] = $array;
                    $functions[ $cb_method ] = [ $arguments, $return_true ];
                }
                $i++;
            }
        }
        if (! empty( $callbacks ) ) {
            $config['callbacks'] = $callbacks;
        }
        $task_key = $app->param( 'task_key' );
        $task_label = $app->param( 'task_label' );
        $task_label_locale = $app->param( 'task_label_locale' );
        $task_frequency = $app->param( 'task_frequency' );
        $task_priority = $app->param( 'task_priority' );
        if ( is_array( $task_key ) && ! empty( $task_key ) && count( $task_key ) > 1 ) {
            array_shift( $task_key );
            array_shift( $task_label );
            array_shift( $task_label_locale );
            array_shift( $task_frequency );
            array_shift( $task_priority );
            $i = 0;
            $tasks = [];
            foreach ( $task_key as $task ) {
                $t_label = isset( $task_label[ $i ] ) && $task_label[ $i ] ? $task_label[ $i ] : $task;
                $task_locale = isset( $task_label_locale[ $i ] ) && $task_label_locale[ $i ] ? $task_label_locale[ $i ] : null;
                $task = strtolower( trim( $task ) );
                $frequency = isset( $task_frequency[ $i ] ) && $task_frequency[ $i ] ? $task_frequency[ $i ] : 1800;
                $priority = isset( $task_priority[ $i ] ) && $task_priority[ $i ] ? $task_priority[ $i ] : 500;
                $frequency = (int) $frequency;
                $priority = (int) $priority;
                if (! $this->is_valid_key( $task, $this->translate( 'Task Key' ), $msg ) ) {
                    $errors[] = $msg;
                }
                if ( $task ) {
                    $task_id = strpos( $task, $id ) === 0 ? $task : "{$id}_{$task}";
                    $tasks[ $task_id ] = [
                        'label'     => $t_label,
                        'component' => $name,
                        'method'    => $task,
                        'frequency' => $frequency,
                        'priority'  => $priority
                    ];
                    $functions[ $task ] = ['( $app )' ];
                }
                if ( $task_locale ) {
                    $locale[ $t_label ] = $task_locale;
                }
                $i++;
            }
            if (! empty( $tasks ) ) {
                $config['tasks'] = $tasks;
            }
        }
        $translate_phrase = $app->param( 'translate_phrase' );
        $translate_translate = $app->param( 'translate_translate' );
        if ( is_array( $translate_phrase ) && ! empty( $translate_phrase ) && count( $translate_phrase ) > 1 ) {
            array_shift( $translate_phrase );
            array_shift( $translate_translate );
            $i = 0;
            foreach ( $translate_phrase as $phrase ) {
                $translate = isset( $translate_translate[ $i ] ) && $translate_translate[ $i ] ? $translate_translate[ $i ] : '';
                if ( $phrase && $translate ) {
                    $locale[ $phrase ] = $translate;
                }
                $i++;
            }
        }
        if (!empty( $locale ) ) {
            $fmgr->mkpath( $dir . DS . 'locale' );
            $locale = json_encode( $locale, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
            $fmgr->put( $dir . DS . 'locale' . DS . $app->language . '.json', $locale );
        }
        $readme = $this->path() . DS . 'tmpl' . DS . 'docs' . DS . 'README.' . $app->user()->language . '.md';
        if ( $fmgr->exists( $readme ) ) {
            $app->ctx->vars['plugin_description'] = $app->user()->language != 'en'
                ? trim( $app->param( 'description_locale' ) ) : trim( $app->param( 'description' ) );
            $build = $app->ctx->build( $fmgr->get( $readme ) );
            $fmgr->mkpath( $dir . DS . 'docs' );
            $fmgr->put( $dir . DS . 'docs' . DS . 'README.' . $app->user()->language . '.md', $build );
        }
        $tmpl = $this->path() . DS . 'tmpl' . DS . 'plugin_class.tmpl';
        $app->ctx->vars['functions'] = $functions;
        $build = $app->ctx->build( $fmgr->get( $tmpl ) );
        $compiled = $dir . DS . $name . '.php';
        $fmgr->put( $compiled, $build );
        $php_binary = $app->php_binary();
        if ( $php_binary ) {
            $cmd = "{$php_binary} -l {$compiled}";
            exec( $cmd, $output, $return_var );
            if ( $return_var !== 0 ) {
                $errors[] = $this->translate( 'Unable to compile the plugin.' );
            }
        }
        $has_app = $app->param( 'has_app' );
        if ( $has_app ) {
            $tmpl = $this->path() . DS . 'tmpl' . DS . 'application.tmpl';
            $fmgr->mkpath( $dir . DS . 'app' );
            $build = $app->ctx->build( $fmgr->get( $tmpl ) );
            $compiled = $dir . DS . 'app' . DS . 'pt-' . strtolower( $name ) . '.php';
            $fmgr->put( $compiled, $build );
            if ( $php_binary ) {
                $cmd = "{$php_binary} -l {$compiled}";
                exec( $cmd, $output, $return_var );
                if ( $return_var !== 0 ) {
                    $errors[] = $this->translate( 'Unable to compile the plugin.' );
                }
            }
            $tmpl = $this->path() . DS . 'tmpl' . DS . 'class_lib.tmpl';
            $fmgr->mkpath( $dir . DS . 'lib' . DS . 'Prototype' );
            $build = $app->ctx->build( $fmgr->get( $tmpl ) );
            $compiled = $dir . DS . 'lib' . DS . 'Prototype' . DS . 'class.PT' . $name . '.php';
            $fmgr->put( $compiled, $build );
            if ( $php_binary ) {
                $cmd = "{$php_binary} -l {$compiled}";
                exec( $cmd, $output, $return_var );
                if ( $return_var !== 0 ) {
                    $errors[] = $this->translate( 'Unable to compile the plugin.' );
                }
            }
        }
        if (! empty( $errors ) || $is_validation ) {
            return $errors;
        }
        $tables = $app->param( 'tables' );
        $keys = ['label', 'plural', 'version', 'primary', 'auditing', 'order', 'menu_type',
                 'revisable', 'max_revisions', 'display_system', 'display_space', 'template_tags'];
        $i = 0;
        PTUtil::file_find( $app->pt_dir . DS . 'locale', $locales );
        $default_locale = [];
        foreach ( $locales as $language ) {
            if ( basename( $language ) == 'default.json' ) {
                continue;
            }
            $data = $fmgr->get( $language );
            $language_name = basename( $language );
            $language_name = preg_replace( '/\.json$/', '', $language_name );
            $default_locale[ $language_name ] = json_decode( $data, true );
        }
        $locale_csv = [];
        foreach ( $tables as $table ) {
            if (! $table ) continue;
            $table = $app->db->model( 'table' )->load( (int) $table );
            if (! $table ) continue;
            if (! $i ) {
                $fmgr->mkpath( $dir . DS . 'models' );
            }
            $i++;
            $scheme = $app->get_scheme_from_db( $table->name );
            $scheme['label'] = $table->label;
            $unshift = [];
            foreach ( $keys as $key ) {
                if ( isset( $scheme[ $key ] ) ) {
                    $unshift[ $key ] = $scheme[ $key ];
                    unset( $scheme[ $key ] );
                }
            }
            $scheme = array_merge( $unshift, $scheme );
            $scheme['column_labels'] = $scheme['locale']['default'];
            if ( $table->text_format ) {
                $scheme['text_format'] = $table->text_format;
            }
            $obj = $app->db->model( $table->name );
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
            $locale = $scheme['locale'];
            foreach ( $locale as $lang => $data ) {
                $default = isset( $default_locale[ $lang ] ) ? $default_locale[ $lang ] : [];
                foreach ( $data as $phrase => $trans ) {
                    if ( isset( $default[ $phrase ] ) || $phrase == $trans ) {
                        continue;
                    }
                    $locale_csv[ $lang ][ $phrase ] = $trans;
                }
                unset( $scheme['locale'] );
            }
            $json = json_encode( $scheme, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
            $fmgr->put( $dir . DS . 'models' . DS . $table->name . '.json', $json );
        }
        if (! empty( $locale_csv ) ) {
            $fmgr->mkpath( $dir . DS . 'locale' );
            foreach ( $locale_csv as $lang => $data ) {
                $csv_out = $dir . DS . 'locale' . DS . $lang . '.csv';
                $fp = fopen( $csv_out, 'w' );
                if ( $app->plugin_starter_csv_encoding == 'Shift_JIS' ) {
                    stream_filter_append( $fp, 'convert.iconv.UTF-8/CP932', STREAM_FILTER_WRITE );
                }
                foreach ( $data as $phrase => $trans ) {
                    fputcsv( $fp, [ $phrase, $trans ], ',', '"' );
                }
                fclose( $fp );
            }
        }
        $config = json_encode( $config, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );
        $fmgr->put( $dir . DS . 'config.json', $config );
        require_once( LIB_DIR . 'Prototype' . DS . 'class.PTUtil.php' );
        $tmp_dir = $app->upload_dir();
        $zip = $tmp_dir . DS . $name . '.zip';
        PTUtil::make_zip_archive( dirname( $dir ), $zip );
        PTUtil::export_data( $zip );
    }

    function get_api_version () {
        $lib_dir = LIB_DIR . 'Prototype' . DS . 'RESTfulAPI';
        list( $files, $dirs ) = [[], []];
        PTUtil::file_find( $lib_dir, $files, $dirs );
        arsort( $files, SORT_STRING );
        $version = 'v1';
        if (!empty ( $files ) ) {
            foreach ( $files as $php ) {
                $extention = PTUtil::get_extension( $php, true );
                if ( $extention == 'php' ) {
                    $php = basename( $php, '.php' );
                    if ( preg_match( '/^v[0-9]+$/', $php ) ) {
                        $version = $php;
                        break;
                    }
                }
            }
        }
        return $version;
    }

    function pre_listing_table ( $cb, $app, &$terms, &$args, &$extra ) {
        if ( $app->param( 'from_obj' ) != 'plugin_skeleton' ) {
            return;
        }
        $terms['not_delete'] = 0;
        return true;
    }

    function pre_save_plugin_skeleton ( &$cb, $app, $obj, $original ) {
        $params = $app->param();
        unset( $params['__mode'], $params['_model'], $params['magic_token'], $params['_screen_id'], $params['workspace_id'] );
        unset( $params['_type'], $params['_save_as_revision'], $params['_duplicate'], $params['name'], $params['version'] );
        unset( $params['description'], $params['id'], $params['_preview'], $params['author'], $params['author_url'] );
        $obj->parameters( json_encode( $params, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
        $errors = $this->export_plugin( $app, trim( $obj->name ), true );
        if ( is_array( $errors ) && !empty( $errors ) ) {
            $cb['errors'] = $errors;
            return false;
        }
        return true;
    }

    function template_source_edit ( $cb, $app, $param, &$tmpl ) {
        if ( $cb['model'] !== 'plugin_skeleton' ) {
            return true;
        }
        $obj = $app->ctx->stash( 'object' );
        if (! $obj ) {
            return true;
        }
        if (! $obj->parameters ) {
            return true;
        }
        $api_version = $this->get_api_version();
        $app->ctx->vars['api_version'] = $api_version;
        $button = $app->ctx->get_template_path( 'plugin_starter_export_button.tmpl' );
        $button = $app->ctx->build( file_get_contents( $button ) );
        $this->add_template_vars( 'add_edit_action_bar', $button );
        if ( $app->mode == 'view' ) {
            $parameters = json_decode( $obj->parameters, true );
            foreach ( $parameters as $key => $parameter ) {
                $_POST[ $key ] = $parameter;
                $_REQUEST[ $key ] = $parameter;
            }
        }
        $callback_model = $app->param( 'callback_model' );
        $callback_kind = $app->param( 'callback_kind' );
        $callback_priority = $app->param( 'callback_priority' );
        if ( is_array( $callback_model ) ) {
            $i = 0;
            foreach ( $callback_model as $cb_model ) {
                $cb_kind = $callback_kind[ $i ];
                $cb_priority = $callback_priority[ $i ];
                $_POST['callback_key'][] = "{$cb_model}_{$cb_kind}_{$cb_priority}";
                $_REQUEST['callback_key'][] = "{$cb_model}_{$cb_kind}_{$cb_priority}";
                $i++;
            }
        }
        $callback_model = $app->param( 'b_callback_model' );
        $callback_kind = $app->param( 'b_callback_kind' );
        $callback_priority = $app->param( 'b_callback_priority' );
        if ( is_array( $callback_model ) ) {
            $i = 0;
            foreach ( $callback_model as $cb_model ) {
                $cb_kind = $callback_kind[ $i ];
                $cb_priority = $callback_priority[ $i ];
                $_POST['b_callback_key'][] = "{$cb_model}_{$cb_kind}_{$cb_priority}";
                $_REQUEST['b_callback_key'][] = "{$cb_model}_{$cb_kind}_{$cb_priority}";
                $i++;
            }
        }
        $callback_model = $app->param( 'l_callback_model' );
        $callback_kind = $app->param( 'l_callback_kind' );
        $callback_priority = $app->param( 'l_callback_priority' );
        if ( is_array( $callback_model ) ) {
            $i = 0;
            foreach ( $callback_model as $cl_model ) {
                $cl_kind = $callback_kind[ $i ];
                $cl_priority = $callback_priority[ $i ];
                $_POST['l_callback_key'][] = "{$cl_model}_{$cl_kind}_{$cl_priority}";
                $_REQUEST['l_callback_key'][] = "{$cl_model}_{$cl_kind}_{$cl_priority}";
                $i++;
            }
        }
        $callback_model = $app->param( 'o_callback_model' );
        $callback_kind = $app->param( 'o_callback_kind' );
        $callback_priority = $app->param( 'o_callback_priority' );
        if ( is_array( $callback_model ) ) {
            $i = 0;
            foreach ( $callback_model as $co_model ) {
                $co_kind = $callback_kind[ $i ];
                $co_priority = $callback_priority[ $i ];
                $_POST['o_callback_key'][] = "{$co_model}_{$co_kind}_{$co_priority}";
                $_REQUEST['o_callback_key'][] = "{$co_model}_{$co_kind}_{$co_priority}";
                $i++;
            }
        }
        return true;
    }

    function add_new_phrase ( $app, $plugin, $version, &$errors ) {
        $phrase = $app->db->model( 'phrase' )->get_by_key(
          ['phrase' => 'Extended Apps', 'lang' => 'ja', 'component' => 'pluginstarter'] );
        if (! $phrase->id ) {
            $phrase->translate('拡張アプリ');
            $phrase->save();
        }
        return true;
    }
}