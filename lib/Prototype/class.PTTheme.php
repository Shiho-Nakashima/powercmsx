<?php

class PTTheme {

    public $skipped = [];
    public $skipped_count = 0;

    function manage_theme ( $app ) {
        if (! $app->can_do( 'import_objects' ) ) {
            return $app->error( 'Permission denied.' );
        }
        $app->theme_paths[] = dirname( $app->pt_path ) . DS . 'themes';
        $theme_dirs = array_unique( $app->theme_paths );
        $theme_loop = [];
        $themes = [];
        $theme_ids = [];
        $default_path = dirname( dirname( __DIR__ ) ) . DS . 'themes';
        $workspace_id = (int) $app->param( 'workspace_id' );
        foreach ( $theme_dirs as $themes_dir ) {
            $themes_dir_original = $themes_dir;
            $items = scandir( $themes_dir );
            foreach ( $items as $theme ) {
                $themes_dir = $themes_dir_original;
                if ( strpos( $theme, '.' ) === 0 ) continue;
                $theme_id = strtolower( $theme );
                $pull = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                                  'key' => 'theme_setting', 'kind' => 'pull'] );
                $path = null;
                if ( $pull->id ) {
                    $path = $pull->data;
                    $path = $this->rel2abs( $path, $app );
                }
                if ( $pull->id && $path && is_dir( $path ) ) {
                    $json = $path . DS  . 'theme.json';
                    $themes_dir = dirname( dirname( $json ) );
                } else {
                    $json = $themes_dir . DS . $theme . DS . 'theme.json';
                }
                if (! file_exists( $json ) ) continue;
                $configs = json_decode( file_get_contents( $json ), true );
                if ( $configs === null ) {
                    $error = $app->translate( 'An error occurred while decoding json(%s).', $json );
                    $app->ctx->vars['error'] = isset( $app->ctx->vars['error'] )
                                             ? $app->ctx->vars['error'] . PHP_EOL . $error : $error;
                    continue;
                }
                $can_write = PTUtil::is_removable( $json );
                $configs['json'] = $json;
                $label = $app->translate( $configs['label'] );
                $theme_vars = [];
                $theme_id = isset( $configs['id'] ) ? $configs['id'] : $theme;
                $theme_id = strtolower( $theme );
                if ( isset( $theme_ids[ $theme_id ] ) ) continue;
                $themes[ $theme_id ] = $configs;
                $theme_ids[ $theme_id ] = dirname( $json );
                $lang = $app->language;
                $locale = $themes_dir . DS . $theme . DS . 'locale' . DS . $lang . '.json';
                if ( file_exists( $locale ) ) {
                    $map = json_decode( file_get_contents( $locale ), true );
                    if ( isset( $app->dictionary[ $lang ] ) ) {
                        $app->dictionary[ $lang ] = array_merge( $app->dictionary[ $lang ], $map );
                    } else {
                        $app->dictionary[ $lang ] = $map;
                    }
                }
                $theme_vars['theme_id'] = $theme_id;
                $theme_vars['label'] = $label;
                if ( isset( $configs['version'] ) ) {
                    $theme_vars['version'] = $configs['version'];
                }
                $repository = $configs['repository'] ?? null;
                $theme_vars['repository'] = $repository;
                $theme_vars['upgrade_version'] = null;
                if ( $repository && strpos( $repository, 'https://github.com/' ) === 0 ) {
                    $base_url = preg_replace( '!^https://github\.com/!', 'https://api.github.com/repos/', $repository );
                    $branches_url = $base_url . '/branches';
                    $option = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                                        'key' => 'theme_setting', 'kind' => 'token'] );
                    if (! $option->id && !$option->value ) {
                        // For Theme_GitHub plugin.
                        $user = $app->user();
                        if ( $user->has_column( 'github_token', true ) && $user->github_token ) {
                            $option->value( $user->github_token );
                        }
                    }
                    if ( $option->value ) {
                        $options = [
                            'http' => [
                                'header' => [
                                    'User-Agent: Mozilla/5.0',
                                    'Authorization: bearer ' . $option->value,
                                    'Content-type: application/json; charset=UTF-8'
                                ]
                            ]
                        ];
                    } else {
                        $can_write = false;
                        $options = [
                            'http' => [
                                'header' => [
                                    'User-Agent: Mozilla/5.0',
                                    'Content-type: application/json; charset=UTF-8'
                                ]
                            ]
                        ];
                    }
                    $theme_vars['can_write'] = $can_write;
                    $branches_url .= '?per_page=100';
                    $context = PTUtil::stream_context_create( $options );
                    $json = $this->_file_get_contents( $branches_url, false, $context );
                    if ( $json !== false ) {
                        $branches = json_decode( $json, true );
                        $branche_names = [];
                        if ( is_array( $branches ) ) {
                            foreach ( $branches as $branche ) {
                                $branche_names[] = $branche['name'];
                            }
                        }
                        $theme_vars['branches'] = $branche_names;
                        $option = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                                            'key' => 'theme_setting', 'kind' => 'branch'] );
                        $current_branch = null;
                        if ( $option->id ) {
                            $current_branch = $option->value;;
                        } else {
                            $json = $this->_file_get_contents( $base_url, false, $context );
                            if ( $json !== false ) {
                                $repos = json_decode( $json );
                                $current_branch = $repos->default_branch;
                            }
                        }
                        if ( $current_branch ) {
                            $theme_vars['current_branch'] = $current_branch;
                            $config_url = $base_url . '/contents/theme.json?ref=' . rawurlencode( $current_branch );
                            $json = $this->_file_get_contents( $config_url, false, $context );
                            if ( $json !== false ) {
                                $theme_json = json_decode( $json );
                                $theme_json = json_decode( base64_decode( $theme_json->content ) );
                                if ( property_exists( $theme_json, 'version' ) ) {
                                    $remote_version = $theme_json->version;
                                    if ( isset( $theme_vars['version'] ) ) {
                                        $comp = version_compare( $remote_version, $theme_vars['version'] );
                                        if ( $comp === 1 ) {
                                            $theme_vars['upgrade_version'] = $remote_version;
                                        }
                                    }
                                }
                            }
                        }
                        $theme_vars['theme_link'] = $repository;
                    }
                }
                if ( isset( $configs['description'] ) ) {
                    $description = $app->translate( $configs['description'] );
                    $theme_vars['description'] = $description;
                }
                if ( isset( $configs['author'] ) ) {
                    $theme_vars['author'] = $configs['author'];
                    if ( isset( $configs['author_link'] ) ) {
                        $theme_vars['author_link'] = $configs['author_link'];
                    }
                }
                if ( isset( $configs['thumbnail'] ) && $configs['thumbnail'] ) {
                    $thumbnail = $themes_dir . DS . $theme . DS . $configs['thumbnail'];
                    if ( file_exists( $thumbnail ) &&  $themes_dir == $default_path ) {
                        $theme_vars['thumbnail'] = $app->app_path . "themes/{$theme}/" . $configs['thumbnail'];
                    } else if ( file_exists( $thumbnail ) ) {
                        $mime_type = PTUtil::get_mime_type( $thumbnail );
                        $theme_vars['thumbnail'] = "data:{$mime_type};base64," . base64_encode( file_get_contents( $thumbnail ) );
                    } else {
                        $theme_vars['thumbnail'] = $app->app_path . 'assets/img/model-icons/default.png';
                    }
                } else {
                    $theme_vars['thumbnail'] = $app->app_path . 'assets/img/model-icons/default.png';
                }
                $theme_loop[] = $theme_vars;
            }
        }
        $cache_driver = $app->cache_driver;
        if ( $current_id = $app->param( 'theme_id' ) ) {
            if ( isset( $themes[ $current_id ] ) && $themes[ $current_id ]['label'] ) {
                $app->ctx->vars['current_label'] = $app->translate( 
                                                      $themes[ $current_id ]['label'] );
            }
            $app->ctx->vars['current_theme'] = $current_id;
        } else {
            $current = $app->get_config( 'theme', $workspace_id );
            if ( $current ) {
                $current_id = $current->value;
                if ( isset( $themes[ $current_id ] ) ) {
                    if ( $themes[ $current_id ]['label'] ) {
                        $app->ctx->vars['current_label'] = $app->translate( 
                                                              $themes[ $current_id ]['label'] );
                    }
                    if (! $current->data && isset( $themes[ $current_id ]['json'] ) ) {
                        $theme_dir = dirname( $themes[ $current_id ]['json'] );
                        $theme_dir = $this->abs2rel( $theme_dir, $app );
                        $current->data( $theme_dir );
                        $current->save();
                    }
                    $app->ctx->vars['current_theme'] = $current_id;
                }
            }
        }
        $app->ctx->vars['theme_loop'] = $theme_loop;
        if ( $app->param( '_type' ) == 'apply_theme' && $app->request_method === 'POST' ) {
            ignore_user_abort( true );
            if ( $max_execution_time = $app->max_exec_time ) {
                $max_execution_time = (int) $max_execution_time;
                ini_set( 'max_execution_time', $max_execution_time );
            }
            $db = $app->db;
            $app->query_cache = false;
            $app->cache_driver = null;
            $db->query_cache = false;
            $db->cache_driver = null;
            $app->init_tags();
            $app->validate_magic();
            $app->db_caching = false;
            $db->caching = false;
            $theme_id = $app->param( 'theme_id' );
            $theme = $themes[ $theme_id ];
            $plugins = isset( $theme['plugins'] ) ? $theme['plugins'] : [];
            $component = null;
            $themes_dir = $theme_ids[ $theme_id ];
            if ( isset( $theme['component'] ) && $theme['component'] ) {
                $class = $themes_dir . DS . $theme['component'] . '.php';
                if ( file_exists( $class ) ) {
                    include_once( $class );
                    $class_name = $theme['component'];
                    $component = new $class_name();
                }
            }
            if (! $theme ) {
                return $app->error( 'Invalid request.' );
            }
            $upgrader = new PTUpgrader;
            $_models = $themes_dir . DS . 'models';
            if ( is_dir( $_models ) ) {
                $models = scandir( $_models );
                foreach ( $models as $model ) {
                    if ( strpos( $model, '.' ) === 0 ) continue;
                    $file = $_models . DS . $model;
                    if ( PTUtil::get_extension( $model ) == 'json' ) {
                        $model = preg_replace( '/\.json$/i', '', $model );
                        $m_dir = $upgrader->get_models_dir( $app, $model, dirname( $file ) );
                        $file = $m_dir . DS . basename( $file );
                        $app->db->base_model->set_scheme_from_json( $model, $file );
                        $scheme_opt = $app->db->model( 'option' )->get_by_key( ['kind' => 'scheme_version', 'key' => $model ] );
                        $current_version = $app->db->scheme[ $model ]['version'];
                        if ( $scheme_opt->id && $current_version && version_compare( $current_version, $scheme_opt->value ) !== 1 ) {
                            continue;
                        }
                        $colprefix = $app->db->colprefix;
                        if ( $colprefix ) {
                            if ( strpos( $colprefix, '<model>' ) !== false )
                                $colprefix = str_replace( '<model>', $model, $colprefix );
                        }
                        $existing = $app->db->show_tables( $model );
                        $table = $app->db->prefix . $model;
                        $scheme = $app->db->scheme[ $model ];
                        unset( $app->db->scheme[ $model ] );
                        $app->db->json_model = true;
                        $app->db->upgrader = true;
                        if ( empty( $existing ) ) {
                            $app->db->base_model->create_table
                                ( $model, $table, $colprefix, $scheme );
                            $message = $app->translate( "The model '%s' created.", $model );
                        } else {
                            $upgrader->upgrade_scheme( $model );
                            $message = $app->translate( "The model '%s' has been upgraded from version %s to version %s.", [ $model, $scheme_opt->value, $current_version ] );
                        }
                        unset( $app->db->scheme[ $model ] );
                        $m_dir = dirname( $file );
                        $app->model_paths[] = $m_dir;
                        $app->db->models_dirs[] = $m_dir;
                        $json_dirs = $app->db->models_dirs;
                        $path_keys = array_map( 'strlen', $json_dirs );
                        array_multisort( $path_keys, SORT_DESC, $json_dirs );
                        $app->db->models_dirs = $json_dirs;
                        $upgrader->setup_db( true, strtolower( $theme_id ), [ $model ], $m_dir );
                        $app->log( ['message'  => $message,
                                    'category' => 'scheme'] );
                    }
                }
            }
            $_plugins = $themes_dir . DS . 'plugins';
            if ( is_dir( $_plugins ) ) {
                $app->plugin_paths[] = $_plugins;
                $app->plugin_paths = array_unique( $app->plugin_paths );
                $_plugin_items = scandir( $_plugins );
                foreach ( $_plugin_items as $_plugin ) {
                    if ( strpos( $_plugin, '.' ) === 0 ) continue;
                    if ( is_dir( $_plugins . DS . $_plugin ) ) {
                        $plugins[] = $_plugin;
                    }
                }
            }
            $locale = $themes_dir . DS . 'locale';
            if ( is_dir( $locale ) ) {
                PTUtil::locale_from_csv( $locale, strtolower( $theme_id ) );
            }
            $publish_theme = isset( $theme['publish_theme'] ) ? $theme['publish_theme'] : false;
            if ( PTUtil::property_exists( $app, 'publish_theme' ) ) {
                $publish_theme = $app->publish_theme;
            }
            if ( $component !== null && method_exists( $component, 'start_import' ) ) {
                $component->start_import( $app, $theme, $workspace_id, $this );
            }
            $views = isset( $theme['views'] ) ? $theme['views'] : [];
            $terms = [];
            $terms['workspace_id'] = $workspace_id;
            $terms['rev_type'] = 0;
            $app->get_scheme_from_db( 'template' );
            $app->get_scheme_from_db( 'urlmapping' );
            $forms = [];
            $template_map = [];
            $uuid_map = [];
            $templates_installed = [];
            $imported_objects = [];
            $urlmap_ids = [];
            foreach ( $views as $uuid => $view ) {
                $urlmappings = isset( $view['urlmappings'] ) ? $view['urlmappings'] : [];
                $form = isset( $view['form'] ) ? $view['form'] : [];
                unset( $view['urlmappings'] );
                unset( $view['form'] );
                $basename = $db->quote( $view['basename'] );
                $name = $db->quote( $view['name'] );
                $_uuid = $db->quote( $uuid );
                $class = isset( $view['class'] ) ? $db->quote( $view['class'] ) : null;
                if (! $name || ! $basename ) {
                    continue;
                }
                $extra = '';
                if ( $class && $app->template_basename_by_class ) {
                    $extra = " AND ( template_name={$name} OR (template_basename={$basename} AND template_class={$class}) OR template_uuid={$_uuid} ) LIMIT 1";
                }
                $templates = $db->model( 'template' )->load( $terms, [], '*', $extra );
                $old_id = null;
                $old_template = null;
                $rev_note = null;
                $ts_name = date( 'Y-m-d H:i:s' );
                $existing = null;
                $path = $themes_dir . DS . 'views' . DS . $uuid . '.tmpl';
                $new_text = '';
                $linked_file = '';
                if ( file_exists( $path ) ) {
                    $new_text=  file_get_contents( $path );
                } else if ( isset( $view['linked_file'] ) ) {
                    $linked_file = $view['linked_file'];
                    $linked_path = $linked_file;
                    if ( preg_match( '/^%[t|s|r]/', $linked_file ) ) {
                        $linked_path = preg_replace( '/^%[t|s|r]/', '', $linked_file );
                        $linked_path = ltrim( $linked_path, '/\\' );
                    }
                    $path = $themes_dir . DS . 'views' . DS . $linked_path;
                    if ( file_exists( $path ) ) {
                        $new_text=  file_get_contents( $path );
                    }
                }
                if (! empty( $templates ) ) {
                    foreach ( $templates as $template ) {
                        $old_id = (int) $template->id;
                        $existing = $template;
                        if ( $template->text != $new_text ) {
                            $old_template = PTUtil::clone_object( $app, $template );
                            $rev_note = $app->translate( $app->translate( 'Backup of %s(%s).', [ $template->name, $ts_name ] ) );
                            $old_template->rev_type( 1 );
                            $old_template->rev_object_id( $old_id );
                            $old_template->rev_note( $rev_note );
                            $old_template->save();
                        }
                    }
                }
                $new_template = $existing ? $existing : $db->model( 'template' )->new( $view );
                $new_template->workspace_id( $workspace_id );
                $new_template->status( 2 );
                foreach ( $view as $tmpl_col => $tmpl_value ) {
                    if ( $new_template->has_column( $tmpl_col ) && ( is_string( $tmpl_value ) || is_numeric( $tmpl_value ) ) ) {
                        $new_template->$tmpl_col( $tmpl_value );
                    }
                }
                if ( file_exists( $path ) ) {
                    $new_template->text( $new_text );
                }
                $new_template->uuid( $uuid );
                if ( $linked_file && $new_template->has_column( 'linked_file' ) ) {
                    $new_template->linked_file( $linked_file );
                }
                $app->set_default( $new_template );
                if ( $old_id && $old_template ) {
                    $new_template->basename( $old_template->basename );
                }
                if (!$new_template->form_id ) {
                    $new_template->form_id( 0 );
                }
                $new_template->save();
                $orig_basename = '';
                $templates_installed[] = $new_template;
                $uuid_map[ $uuid ] = $new_template;
                if (! empty( $form ) ) {
                    $forms[ $new_template->id ] = $form;
                    $template_map[ $new_template->id ] = $new_template;
                }
                $imported_objects['template'][] = $new_template;
                if ( is_array( $urlmappings ) && !empty( $urlmappings ) ) {
                    // $rebuilds[] = $new_template;
                    foreach ( $urlmappings as $urlmapping ) {
                        $triggers = isset( $urlmapping['triggers'] )
                                  ? $urlmapping['triggers'] : [];
                        unset( $urlmapping['triggers'] );
                        $urlmapping['workspace_id'] = $workspace_id;
                        foreach ( $urlmapping as $key => $value ) {
                            if (! $db->model( 'urlmapping' )->has_column( $key ) ) {
                                unset( $urlmapping['key'] );
                            }
                        }
                        $mapping_name = $urlmapping['name'];
                        $urlmap = null;
                        if ( $old_id ) {
                            $old_cnt = $db->model( 'urlmapping' )->count( ['template_id' => $old_id, 'name' => $mapping_name ] );
                            if ( $old_cnt === 1 ) {
                                $urlmap = $db->model( 'urlmapping' )->load( ['template_id' => $old_id, 'name' => $mapping_name ] );
                                $urlmap = $urlmap[0];
                                $urlmap->set_values( $urlmapping );
                            }
                        }
                        if ( $urlmap === null ) {
                            $urlmap = $db->model( 'urlmapping' )->get_by_key( $urlmapping );
                        }
                        $urlmap->template_id( $new_template->id );
                        $app->set_default( $urlmap );
                        $urlmap->save();
                        $urlmap_ids[] = $urlmap->id;
                        $imported_objects['urlmapping'][] = $urlmap;
                        if ( count( $triggers ) ) {
                            $i = 1;
                            foreach ( $triggers as $trigger ) {
                                $table = $app->get_table( $trigger );
                                if (! $table ) continue;
                                $rel_terms = ['name' => 'triggers', 'from_id' => $urlmap->id,
                                              'from_obj' => 'urlmapping', 'to_obj' => 'table',
                                              'to_id' => $table->id ];
                                $relation = $db->model( 'relation' )->get_by_key( $rel_terms );
                                $relation->order( $i );
                                $relation->save();
                                $i++;
                            }
                        }
                    }
                }
            }
            if (! empty( $forms ) ) {
                foreach ( $forms as $template_id => $form ) {
                    $template = $template_map[ $template_id ];
                    $basename = $form['basename'];
                    $existing_terms = ['basename' => $basename, 'workspace_id' => $workspace_id ];
                    $existing = $db->model( 'form' )->get_by_key( $existing_terms );
                    if ( $existing->id ) {
                        $template->form_id( $existing->id );
                        $template->save();
                        $this->skipped['form'][] = $existing;
                        $imported_objects['form'][] = $existing;
                        $this->skipped_count++;
                        $msg = $app->translate(
                          "The %s '%s' has been skipped because it already existed." ,
                          [ $app->translate( 'Form' ), $basename ] );
                        $app->log( ['message'  => $msg,
                                    'category' => 'import',
                                    'model'    => 'form',
                                    'metadata' => json_encode( $form, JSON_UNESCAPED_UNICODE ),
                                    'level'    => 'info'] );
                        continue;
                    }
                    $thanks_template = $form['thanks_template'] ?? null;
                    $notify_template = $form['notify_template'] ?? null;
                    $questions = isset( $form['questions'] ) ? $form['questions'] : [];
                    unset( $form['thanks_template'] );
                    unset( $form['notify_template'] );
                    unset( $form['questions'] );
                    $new_form = $urlmap = $db->model( 'form' )->new( $form );
                    if ( $thanks_template ) {
                        if ( isset( $uuid_map[ $thanks_template ] ) ) {
                            $new_form->thanks_template( $uuid_map[ $thanks_template ]->id );
                        }
                    }
                    if ( $notify_template ) {
                        if ( isset( $uuid_map[ $notify_template ] ) ) {
                            $new_form->notify_template( $uuid_map[ $notify_template ]->id );
                        }
                    }
                    $new_form->workspace_id( $workspace_id );
                    $app->set_default( $new_form );
                    $new_form->status( 4 );
                    $new_form->save();
                    $imported_objects['form'][] = $new_form;
                    $template->form_id( $new_form->id );
                    $template->save();
                    if ( count( $questions ) ) {
                        $to_ids = [];
                        foreach ( $questions as $uuid => $question ) {
                            $basename = $question['basename'];
                            $existing_terms = ['basename' => $basename, 'workspace_id' => $workspace_id ];
                            $existing = $db->model( 'question' )->get_by_key( $existing_terms );
                            if ( $existing->id ) {
                                $to_ids[] = $existing->id;
                                $this->skipped['question'][] = $existing;
                                $msg = $app->translate(
                                  "The %s '%s' has been skipped because it already existed." ,
                                  [ $app->translate( 'Question' ), $basename ] );
                                $app->log( ['message'  => $msg,
                                            'category' => 'import',
                                            'model'    => 'question',
                                            'metadata' => json_encode( $question, JSON_UNESCAPED_UNICODE ),
                                            'level'    => 'info'] );
                                continue;
                            }
                            $questiontype_id = $question['questiontype_id'];
                            unset( $question['questiontype_id'] );
                            $questiontype = $db->model( 'questiontype' )->get_by_key(
                                ['basename' => $questiontype_id ] );
                            if ( $questiontype->id ) {
                                $question['questiontype_id'] = $questiontype->id;
                            }
                            $new_question = $db->model( 'question' )->new( $question );
                            $new_question->workspace_id( $workspace_id );
                            // $new_question->uuid( $uuid );
                            $app->set_default( $new_question );
                            $path = $themes_dir . DS . 'questions' . DS . $uuid . '.tmpl';
                            if ( file_exists( $path ) ) {
                                $new_question->template( file_get_contents( $path ) );
                            } else {
                                $path = $themes_dir . DS . 'questions' . DS . $basename . '.tmpl';
                                if ( file_exists( $path ) ) {
                                    $new_question->template( file_get_contents( $path ) );
                                }
                            }
                            $new_question->save();
                            $imported_objects['question'][] = $new_question;
                            $to_ids[] = $new_question->id;
                        }
                        $args = ['from_id' => $new_form->id, 
                                 'name' => 'questions',
                                 'from_obj' => 'form',
                                 'to_obj' => 'question' ];
                        $app->set_relations( $args, $to_ids, true );
                    }
                }
            }
            $plugin_paths = $app->plugin_paths;
            $plugin_dirs = [];
            $pt_plugin = new PTPlugin;
            $init_plugins = false;
            foreach ( $plugins as $plugin ) {
                foreach ( $plugin_paths as $dir ) {
                    $items = scandir( $dir, $app->plugin_order );
                    foreach ( $items as $item ) {
                        if ( strpos( $item, '.' ) === 0 || !is_dir( $dir . DS . $item ) ) continue;
                        if ( strtolower( $item ) == strtolower( $plugin ) ) {
                            if ( isset( $app->plugin_switch[ strtolower( $plugin ) ] ) ) {
                                $option = $app->plugin_switch[ strtolower( $plugin ) ];
                            } else {
                                $option = $app->db->model( 'option' )->get_by_key(
                                    ['kind' => 'plugin', 'key' => strtolower( $plugin ) ], null, 'id,key,value,number,kind' );
                            }
                            $_plugin = $dir . DS . $item . DS . 'config.json';
                            if ( file_exists( $_plugin ) ) {
                                $r = $app->configure_from_json( $_plugin );
                                $init_plugins = true;
                                $version = $r['version'];
                                $class = $dir . DS . $item . DS . $r['component'] . '.php';
                                if (! file_exists( $class ) ) {
                                    continue;
                                }
                                include_once( $class );
                                $class_name = basename( $item );
                                $_component = new $class_name();
                                if ( method_exists( $_component, 'activate' ) ) {
                                    $errors = [];
                                    $upgrade = $_component->activate( $app, $pt_plugin, $version, $errors );
                                    if (! $upgrade ) {
                                        $message = $app->translate( "The plugin '%s' cannot be enabled.", $class_name );
                                        $app->log( ['message'  => $message,
                                                    'category' => 'plugin',
                                                    'metadata' => json_encode( $errors, JSON_UNESCAPED_UNICODE ),
                                                    'level'    => 'error'] );
                                        continue;
                                    }
                                }
                                $option->number( 1 );
                                $option->value( $version );
                                $option->save();
                                $message = $app->translate( "The plugin '%s' has been activated.", $r['component'] );
                                $app->log( ['message'  => $message, 'category' => 'plugin'] );
                                $_models = $dir . DS . $item . DS . 'models';
                                if ( is_dir( $_models ) ) {
                                    $models = scandir( $_models );
                                    foreach ( $models as $model ) {
                                        if ( strpos( $model, '.' ) === 0 ) continue;
                                        $file = $_models . DS . $model;
                                        if ( PTUtil::get_extension( $model ) == 'json' ) {
                                            $model = preg_replace( '/\.json$/i', '', $model );
                                            $m_dir = $upgrader->get_models_dir( $app, $model, dirname( $file ) );
                                            $file = $m_dir . DS . basename( $file );
                                            $app->db->base_model->set_scheme_from_json( $model, $file );
                                            $scheme_opt = $app->db->model( 'option' )->get_by_key( ['kind' => 'scheme_version', 'key' => $model ] );
                                            $current_version = $app->db->scheme[ $model ]['version'];
                                            if ( $scheme_opt->id && $current_version && $current_version <= $scheme_opt->value ) {
                                                continue;
                                            }
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
                                            unset( $app->db->scheme[ $model ] );
                                            $m_dir = dirname( $file );
                                            $app->model_paths[] = $m_dir;
                                            $app->db->models_dirs[] = $m_dir;
                                            $json_dirs = $app->db->models_dirs;
                                            $path_keys = array_map( 'strlen', $json_dirs );
                                            array_multisort( $path_keys, SORT_DESC, $json_dirs );
                                            $app->db->models_dirs = $json_dirs;
                                            $upgrader->setup_db( true, strtolower( $plugin ), [ $model ], $m_dir );
                                            $app->log( ['message'  => $message,
                                                        'category' => 'scheme'] );
                                        }
                                    }
                                }
                                $locale = $dir . DS . $item . DS . 'locale';
                                if ( is_dir( $locale ) ) {
                                    if ( $handle = opendir( $locale ) ) {
                                        while ( false !== ( $entry = readdir( $handle ) ) ) {
                                            if ( strpos( $entry, '.' ) === 0 ) continue;
                                            $file = $locale . DS . $entry;
                                            $extension = pathinfo( $file )['extension'];
                                            if ( $extension != 'csv' ) continue;
                                            $content = file_get_contents( $file );
                                            $encoding = mb_detect_encoding( $content );
                                            if ( $encoding != 'UTF-8' ) {
                                                $content = mb_convert_encoding( $content, 'UTF-8', 'Shift_JIS' );
                                            }
                                            $content = preg_replace( "/\r\n|\r|\n/", PHP_EOL, $content );
                                            $lines = explode( PHP_EOL, $content );
                                            $lang = basename( $entry, '.csv' );
                                            $name = strtolower( $plugin );
                                            foreach ( $lines as $line ) {
                                                if (! $line ) continue;
                                                $valus = str_getcsv( $line );
                                                list ( $phrase, $trans ) = $valus;
                                                $phrase = $db->model( 'phrase' )->get_by_key
                                                ( ['phrase' => ['BINARY' => $phrase ],
                                                   'component' => $name, 'lang' => $lang ] );
                                                $phrase->trans( $trans );
                                                $app->set_default( $phrase );
                                                $phrase->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if ( $init_plugins ) {
                $app->init_plugins = false;
                $app->init_plugins();
            }
            $objects = isset( $theme['objects'] ) ? $theme['objects'] : [];
            $importer = new PTImporter();
            $importer->print_state = false;
            $importer->apply_theme = true;
            foreach ( $objects as $model ) {
                $dirname = $themes_dir . DS . 'objects' . DS . $model;
                if ( is_dir( $dirname ) ) {
                    $import_files = [];
                    $csv_exists = false;
                    $items = scandir( $dirname );
                    foreach ( $items as $import_file ) {
                        if ( strpos( $import_file, '.' ) === 0 ) continue;
                        $import_file = $dirname . DS . $import_file;
                        if ( preg_match( '/\.csv$/i', $import_file ) ) {
                            $import_files[] = $import_file;
                            $csv_exists = true;
                        } else if ( preg_match( '/\.json$/i', $import_file ) ) {
                            $import_files[] = $import_file;
                        }
                    }
                    if ( $csv_exists ) {
                        $imported_objects[ $model ] =
                              $importer->import_from_files( $app, $model, $dirname, $import_files );
                    }
                }
            }
            $skipped = $this->skipped_count;
            $skipped += $importer->theme_skipped;
            if ( $component !== null && method_exists( $component, 'post_import_objects' ) ) {
                $component->post_import_objects( $app, $imported_objects, $workspace_id, $this );
            }
            $theme_label = isset( $theme['label'] ) ? $app->translate( $theme['label'] ) : $theme_id;
            $msg = $app->translate(
                "The theme '%1\$s' has been applied by %2\$s.",
                [ $theme_label, $app->user()->nickname ] );
            $app->log( ['message'  => $msg,
                        'category' => 'theme',
                        'model'    => 'template',
                        'level'    => 'info'] );
            $cfg = $app->set_config( ['theme' => $theme_id ], $workspace_id );
            if ( is_object( $cfg ) ) {
                $cfg->data( $this->abs2rel( $themes_dir, $app ) );
                $cfg->save();
            }
            if ( $workspace_id ) {
                $workspace = $app->workspace();
                $workspace->last_update( time() );
                $workspace->save();
            }
            if ( $component !== null && method_exists( $component, 'post_apply_theme' ) ) {
                $component->post_apply_theme( $app, $imported_objects, $workspace_id, $this );
            }
            $return_args = "__mode=manage_theme&apply_theme=1&theme_id={$theme_id}";
            if ( $workspace_id ) {
                $return_args .= '&workspace_id=' . $workspace_id;
            }
            if ( $skipped ) {
                $return_args .= '&skipped=' . $skipped;
            }
            $app->redirect( $app->admin_url . '?' . $return_args, true );
            $app->caching = false;
            $app->db->caching = false;
            $app->init_tags( true );
            $scheme = $app->get_scheme_from_db( 'template' );
            $app->db->scheme['template'] = $scheme;
            $publish_templates = [];
            foreach ( $templates_installed as $template ) {
                $template->compiled('');
                $template->save();
                if ( $template->class == 'Archive' ) {
                    $publish_templates[] = $template;
                }
            }
            $caching = $app->db->caching;
            if ( $publish_theme ) {
                $sessions = $app->db->model( 'session' )->load( ['kind' => 'CH'] );
                foreach ( $sessions as $session ) {
                    if ( $session->user_id < 0 ) {
                        continue;
                    }
                    $session->remove();
                }
                $app->db->clear_query();
                $app->stash = []; // for mt:include
                $app->db->caching = false;
                $app->id = 'Worker';
                foreach ( $publish_templates as $template ) {
                    $app->publish_obj( $template, null, false );
                }
                $php_binary = $app->php_binary();
                if ( $php_binary ) {
                    $cmd = $php_binary . ' tools' . DS . 'rebuildFiles.php';
                    $cmd = 'cd ' . dirname( $app->pt_path ) . ';' . $cmd;
                    $cmd .= ' archive --sleep 90 --urlmapping_ids ' . implode( ',', $urlmap_ids );
                    $process = proc_open( $cmd, [], $pipes );
                    $app->procs[] = $process;
                } else {
                    foreach ( $publish_templates as $template ) {
                        $tmpl = $app->db->model( 'template' )->load(
                            ['id' => $template->id, 'class' => 'Archive' ] );
                        // Re-Publish Templates
                        if ( is_array( $tmpl ) && !empty( $tmpl ) ) {
                            $tmpl = $tmpl[0];
                            $app->publish_obj( $tmpl, null, false );
                        }
                    }
                }
                $app->id = 'Prototype';
            }
            $app->db->caching = $caching;
            $app->cache_driver = $cache_driver;
            $app->clear_cache( 'themes_plugin_dirs__c' );
            $app->clear_cache( 'themes_model_dirs__c' );
            $app->clear_cache( 'app_configs__c' );
            $app->clear_all_cache( true, $workspace_id );
        }
        return $app->__mode( 'manage_theme' );
    }

    function theme_setting ( $app ) {
        if (! $app->can_do( 'import_objects' ) ) {
            return $app->json_error( 'Permission denied.' );
        }
        $app->validate_magic( true );
        $type = $app->param( '_type' );
        if ( $type != 'branch' && $type != 'pull' && $type != 'token' && $type != 'version' ) {
            return $app->json_error( 'Invalid request.' );
        }
        $theme_id = $app->param( 'theme_id' );
        $value = $app->param( $type );
        $workspace_id = (int) $app->param( 'workspace_id' );
        if ( $type === 'version' ) {
            if (! preg_match( '/^[0-9\.]{1,}$/', $value ) ) {
                return $app->json_error( 'Please enter the correct version number.' );
            }
            $current = $app->get_config( 'theme', $workspace_id );
            if (!$current || ! $current->data ) {
                return $app->json_error( 'Invalid request.' );
            }
            $path = $this->rel2abs( $current->data );
            $theme = $path . DS . 'theme.json';
            $can_write = PTUtil::is_removable( $theme );
            $message = $app->translate( "Cannot write file '%s'.", $theme );
            if (! $can_write || !$app->fmgr->exists( $theme ) ) {
                return $app->json_error( $message );
            }
            $json = json_decode( $app->fmgr->get( $theme ), true );
            if ( $json === null ) {
                $app->json_error( 'An error occurred while decoding json(%s).', $theme );
            }
            $json['version'] = $value;
            $res = $app->fmgr->put( $theme, json_encode( $json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES ) );
            if (! $res ) {
                return $app->json_error( $message );
            }
            header( 'Content-type: application/json' );
            echo json_encode( ['result' => true ] );
            exit();
        }
        $option = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                            'key' => 'theme_setting', 'kind' => $type ] );
        $option->value( $value );
        if ( $type === 'pull' ) {
            $theme_dir = $option->data;
            $theme_dir = $this->rel2abs( $theme_dir, $app );
            if (! $theme_dir || !is_dir( $theme_dir ) ) {
                $app->theme_paths[] = dirname( $app->pt_path ) . DS . 'themes';
                $theme_dirs = $app->theme_paths;
                foreach ( $theme_dirs as $themes_dir ) {
                    $items = scandir( $themes_dir );
                    foreach ( $items as $theme ) {
                        if ( strpos( $theme, '.' ) === 0 ) continue;
                        if ( strtolower( $theme ) === $theme_id ) {
                            $theme_dir = $themes_dir . DS . $theme;
                            break;
                        }
                    }
                }
            }
            if (! $theme_dir || ! is_dir( $theme_dir ) ) {
                return $app->json_error( 'Invalid request.' );
            }
            $json = $theme_dir . DS . 'theme.json';
            if (! file_exists( $json ) ) {
                return $app->json_error( 'Invalid request.' );
            }
            $configs = json_decode( file_get_contents( $json ), true );
            $repository = $configs['repository'] ?? null;
            if (! $repository ) {
                return $app->json_error( 'Invalid request.' );
            }
            if ( strpos( $repository, 'https://github.com/' ) !== 0 ) {
                return $app->json_error( 'Invalid request.' );
            }
            $branch_url = preg_replace( '!^https://github\.com/!', 'https://api.github.com/repos/', $repository );
            $branch_url .= '/zipball';
            $branch = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                            'key' => 'theme_setting', 'kind' => 'branch'] );
            if ( $branch->id && $branch->value ) {
                $branch_url .= '/' . $branch->value;
            }
            $token = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                            'key' => 'theme_setting', 'kind' => 'token'] );
            if ( $token->id && $token->value ) {
                $options = [
                    'http' => [
                        'header' => [
                            'User-Agent: Mozilla/5.0',
                            'Authorization: bearer ' . $token->value,
                            'Content-type: application/json; charset=UTF-8'
                        ]
                    ]
                ];
            } else {
                $options = [
                    'http' => [
                        'header' => [
                            'User-Agent: Mozilla/5.0',
                            'Content-type: application/json; charset=UTF-8'
                        ]
                    ]
                ];
            }
            $context = PTUtil::stream_context_create( $options );
            $pull = file_get_contents( $branch_url, false, $context );
            if ( $pull === false ) {
                return $app->json_error( "Failed to pull theme from '%s'.", $branch_url );
            }
            $upload_dir = $app->upload_dir();
            $tmpPath = $upload_dir . DS . 'theme.zip';
            $extractPath = $upload_dir . DS . 'theme';
            $outPath = $app->support_dir . DS . 'themes' . DS . 'pull' . DS . $workspace_id . DS . $theme_id;
            $out = $app->fmgr->put( $tmpPath, $pull );
            $zip = new ZipArchive();
            $res = $zip->open( $tmpPath );
            if ( $res === true ) {
                $zip->extractTo( $extractPath );
                $zip->close();
            } else {
                return $app->json_error( "Failed to pull theme from '%s'.", $branch_url );
            }
            $items = scandir( $extractPath );
            foreach ( $items as $theme ) {
                if ( strpos( $theme, '.' ) === 0 ) continue;
                if ( is_dir( $outPath ) ) {
                    $app->fmgr->rmdir( $outPath );
                }
                $res = $app->fmgr->rename( $extractPath . DS . $theme, $outPath );
                if (! $res ) {
                    return $app->json_error( "Failed to pull theme from '%s'.", $branch_url );
                }
                break;
            }
            $option->data( $this->abs2rel( $outPath, $app ) );
        }
        $option->save();
        header( 'Content-type: application/json' );
        echo json_encode( ['result' => true ] );
    }

    function abs2rel ( $path, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        if ( strpos( $path, '%' ) !== 0 ) {
            $theme_dir = $app->pt_dir . DS . 'themes' . DS;
            $support_dir = rtrim( $app->support_dir, '/\\' ) . DS;
            if ( strpos( $path, $theme_dir ) === 0 ) {
                $theme_dir_q = preg_quote( $theme_dir, '!' );
                $path = preg_replace( "!{$theme_dir_q}!", '%t/', $path );
            } else if ( strpos( $path, $support_dir ) === 0 ) {
                $support_dir_q = preg_quote( $support_dir, '!' );
                $path = preg_replace( "!{$support_dir_q}!", '%s/', $path );
            } else {
                $theme_dirs = array_unique( $app->theme_paths );
                foreach ( $theme_dirs as $theme_d ) {
                    $theme_d = rtrim( $theme_d, '/\\' ) . DS;
                    if ( strpos( $path, $theme_d ) === 0 ) {
                        $theme_d_q = preg_quote( $theme_d, '!' );
                        $path = preg_replace( "!{$theme_d_q}!", '%c/', $path );
                    }
                }
            }
        }
        return $path;
    }

    function rel2abs ( $path, $app = null ) {
        if ( $path === null ) {
            $path = '';
        }
        $app = $app ? $app : Prototype::get_instance();
        if ( strpos( $path, '%' ) === 0 ) {
            if ( strpos( $path, '%c' ) === 0 ) {
                $theme_dirs = array_unique( $app->theme_paths );
                foreach ( $theme_dirs as $theme_d ) {
                    $theme_d = rtrim( $theme_d, DS );
                    $tmp = preg_replace( '/^%c/', $theme_d, $path );
                    if ( file_exists( $tmp ) ) {
                        $path = $tmp;
                        break;
                    }
                }
            } else if ( strpos( $path, '%t' ) === 0 ) {
                $theme_d = $app->pt_dir . DS . 'themes';
                $tmp = preg_replace( '/^%t/', $theme_d, $path );
                if ( file_exists( $tmp ) ) {
                    $path = $tmp;
                }
            } else if ( strpos( $path, '%s' ) === 0 ) {
                $theme_d = rtrim( $app->support_dir, '/\\' );
                $tmp = preg_replace( '/^%s/', $theme_d, $path );
                if ( file_exists( $tmp ) ) {
                    $path = $tmp;
                }
            }
        }
        return $path;
    }

    function _file_get_contents ( $url, $bool = false, $context = null ) {
        $app = Prototype::get_instance();
        $sess = $app->db->model( 'session' )->get_by_key(
            ['name' => 'json_from_github', 'kind' => 'CH', 'value' => $url ], null, 'id,data,start,expires' );
        if (! $app->develop ) {
            if ( $sess->id ) {
                $data = $sess->data;
                if (! $data ) {
                    return false;
                }
                return $data;
            }
        }
        $data = file_get_contents( $url, false, $context );
        $sess->data( $data );
        $sess->expires( $app->request_time + $app->sess_expires );
        $sess->start( $app->request_time );
        $sess->save();
        return $data;
    }
}