<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
if (! defined( 'MB_ENCODE_NUMERICENTITY_MAP' ) ) {
    define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );
}

class HTMLImporter extends PTPlugin {

    public $migrator;
    public $session;
    public $linkchecker;
    public $import_type;

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $datamigrator = $app->component( 'DataMigrator' );
        $plugin_switch = $app->plugin_switch;
        if (! isset( $plugin_switch['datamigrator'] ) ) {
            $datamigrator = null;
        } else {
            $plugin_switch = $plugin_switch['datamigrator'];
            $datamigrator = $plugin_switch->number;
        }
        if (! $datamigrator ) {
            $errors[] = $this->translate(
              'The DataMigrator plugin must be enabled to enable HTMLImporter plugin.' );
            return false;
        }
        $settings_paths = $app->htmlimporter_settings_paths;
        if (! $settings_paths || !is_array( $settings_paths ) ) {
            $settings_paths = [];
        }
        $settings_paths[] = $this->path() . DS . 'settings';
        foreach ( $settings_paths as $settings_path ) {
            chdir( $settings_path );
            foreach ( glob("*.yaml") as $filename ) {
                $yaml = $settings_path . DS . $filename;
                if ( $app->fmgr->exists( $yaml ) ) {
                    $yaml = $app->fmgr->get( $yaml );
                    $json = PTUtil::yaml_parse( $yaml );
                    if ( isset( $json['html_field_settings'] ) && is_array( $json['html_field_settings'] ) ) {
                        $json['html_field_settings'] = implode( PHP_EOL, $json['html_field_settings'] );
                    }
                    if ( isset( $json['html_preprocessing'] ) && is_array( $json['html_preprocessing'] ) ) {
                        $json['html_preprocessing'] = implode( PHP_EOL, $json['html_preprocessing'] );
                    }
                    if ( isset( $json['html_preprocessing_replace'] ) && is_array( $json['html_preprocessing_replace'] ) ) {
                        $json['html_preprocessing_replace'] = implode( PHP_EOL, $json['html_preprocessing_replace'] );
                    }
                    if ( isset( $json['html_asset_exts'] ) && is_array( $json['html_asset_exts'] ) ) {
                        $json['html_asset_exts'] = implode( ',', $json['html_asset_exts'] );
                    }
                    $name = $json['name'];
                    $model = $json['model'];
                    $user_id = $json['user_id'] ?? $app->user()->id;
                    $workspace_id = $json['workspace_id'] ?? 0;
                    unset( $json['name'], $json['model'], $json['user_id'], $json['workspace_id'] );
                    $meta = $app->db->model( 'meta' )->get_by_key( ['model' => 'workspace',
                                                                    'kind' => $model,
                                                                    'type' => 'html_importer_setting',
                                                                    'name' => $name ] );
                    if ( $meta->id ) continue;
                    $meta->key( $user_id );
                    $meta->object_id( $workspace_id );
                    $meta->text( json_encode( $json ) );
                    $meta->save();
                }
            }
        }
        return true;
    }

    function htmlimporter_post_init ( $app ) {
        if ( $app->id !== 'Prototype' ) {
            return;
        }
        if ( $app->mode != 'data_migration' && $app->mode != 'start_migration' ) {
            if ( $app->htmlimporter_show_import_from ) {
                if ( $app->mode === 'view' && $app->param( '_type' ) === 'edit' && $app->param( 'id' ) ) {
                    $model = $app->param( '_model' );
                    $id = (int) $app->param( 'id' );
                    $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $model, 'object_id' => $id, 'kind' => 'import_url'] );
                    if ( $meta->id && $meta->text && ( stripos( $meta->text, 'http://' ) === 0 || stripos( $meta->text, 'https://' ) === 0 ) ) {
                        $imported_url = $app->escape( $meta->text );
                        $label = $this->translate( 'Import From :' );
                        $imported_url = "<a href=\"$imported_url\" target=\"_blank\">{$label} {$imported_url} <i class=\"fa fa-external-link-square\" aria-hidden=\"true\"></i></a>";
                        $app->ctx->vars['header_alert_message'] = $imported_url;
                    }
                }
            }
            return;
        }
        $app->ctx->vars['html_can_css'] = 1;
        $workspace = $app->workspace() ? $app->workspace() : null;
        $workspace_id = $workspace ? $workspace->id : 0;
        $app->init_callbacks( 'table', 'pre_load_objects' );
        $app->init_callbacks( 'table', 'post_load_objects' );
        $args = [];
        $terms = ['im_export' => 1, 'menu_type' => ['IN' => [1, 2, 6] ] ];
        $callback =
            ['name' => 'pre_load_objects', 'model' => 'table', 'args' => $args ];
        $app->run_callbacks( $callback, 'table', $terms, $args );
        $models = $app->db->model( 'table' )->load( $terms, $args );
        $table = $app->get_table( 'table' );
        $callback = ['name' => 'post_load_objects', 'model' => 'table', 'table' => $table ];
        $count_obj = count( $models );
        $app->run_callbacks( $callback, 'table', $models, $count_obj );
        $entry_settings = ['primary' => $app->translate( 'Title' ), 'body' => $app->translate( 'Body' ), 'keywords' => true,
                           'taggable' => true, 'text_format' => true, 'excerpt' => true, 'has_assets' => true ];
        $models_mapping = [ 'entry' => $entry_settings, 'page' => $entry_settings ];
        $displayoption = $app->get_table( 'displayoption' );
        foreach ( $models as $table ) {
            $workspace_id = 0;
            if ( $workspace ) {
                if (! $table->display_space ) continue;
                $workspace_id = $workspace->id;
            } else {
                if (! $table->display_system ) continue;
            }
            if ( is_object( $displayoption ) ) {
                $option = $app->db->model( 'displayoption' )->get_by_key( ['model' => $table->name, 'workspace_id' => $workspace_id ] );
                if ( $option->id ) {
                    if ( $option->menu_type != 1 && $option->menu_type != 2 && $option->menu_type != 6 ) {
                        continue;
                    }
                }
            }
            $app->registry['import_format']['html']['models'][] = $table->name;
            if ( $app->mode == 'data_migration' ) {
                continue;
            }
            if ( $table->name == 'entry' || $table->name == 'page' ) continue;
            $primary = $table->primary;
            $primary_col = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => $primary ] );
            $models_map = ['primary' => $app->translate( $app->escape( $primary_col->label ) ) ];
            $extra = "AND column_name not like 'rev_%' AND column_name != 'basename' AND column_name != 'uuid'"
                   . " AND column_name != 'extra_path' AND column_name != 'class'";
            $body_col = $app->db->model( 'column' )->load( ['table_id' => $table->id, 'type' => 'text', 'name' => ['!=' => $table->primary ] ],
                                                           ['sort' => 'order', 'direction' => 'ascend'], '*', $extra );
            $body_col = is_array( $body_col ) && count( $body_col ) ? $body_col[0] : null;
            if (! $body_col ) {
                $body_col = $app->db->model( 'column' )->load( ['table_id' => $table->id, 'type' => 'string',
                                                                'name' => ['!=' => $table->primary ] ],
                                                               ['sort' => 'order', 'direction' => 'ascend'], '*', $extra );
                $body_col = is_array( $body_col ) && count( $body_col ) ? $body_col[0] : null;
            }
            $body = '';
            if ( $body_col ) {
                $body = $app->translate( $app->escape( $body_col->label ) );
            }
            $models_map['body'] = $body;
            $keywords = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'keywords',
                                                                  'type' => ['IN' => ['string', 'text'] ] ] );
            if ( $keywords->id ) {
                $models_map['keywords'] = true;
            } else {
                $models_map['keywords'] = false;
            }
            if ( $table->taggable ) {
                $models_map['taggable'] = true;
            } else {
                $models_map['taggable'] = false;
            }
            $text_format = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'text_format'] );
            if ( $text_format->id ) {
                $models_map['text_format'] = true;
            } else {
                $models_map['text_format'] = false;
            }
            $excerpt = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'excerpt', 'type' => ['IN' => ['string', 'text'] ] ] );
            if ( $excerpt->id ) {
                $models_map['excerpt'] = 'excerpt';
            } else {
                $excerpt = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'description', 'type' => ['IN' => ['string', 'text'] ] ] );
                if ( $excerpt->id ) {
                    $models_map['excerpt'] = 'description';
                } else {
                    $models_map['excerpt'] = false;
                }
            }
            $models_map['has_assets'] = $table->has_assets ? true : false;
            $models_mapping[ $table->name ] = $models_map;
        }
        if ( $app->can_do( 'asset', 'create', null, $workspace ) ) {
            $app->ctx->vars['html_can_asset'] = 1;
        }
        $app->ctx->vars['html_models_mapping'] = json_encode( $models_mapping );
    }

    function pre_url_get ( &$cb, $app ) {
        // url, http_option, table, model,
        $http_option = $cb['http_option'];
        $http_option[] = 'User-Agent: Mozilla/5.0';
        $cb['http_option'] = $http_option;
        return true;
    }

    function html_importer_send_urls ( $app ) {
        $app->validate_magic();
        $workspace = $app->workspace() ? $app->workspace() : null;
        $import_model = $app->param( 'import_model' );
        if (! $app->can_do( $import_model, 'create', null, $workspace ) ) {
            return $app->print( json_encode( [
                'status' => 500,
                'message' => $app->translate( 'Permission denied.' ) ] ), 'application/json' );
        }
        $urls = $app->param( 'urls' );
        $urls = trim( $urls );
        $urls = preg_replace( "/\r\n?/", "\n/", $urls );
        if (! $urls ) {
            return $app->print( json_encode( [
                'status' => 500,
                'message' => $this->translate( 'URLs is empty.' ) ] ), 'application/json' );
        }
        $curls = explode( "\n", $urls );
        $counter = 0;
        $errors = 0;
        $msg;
        $valid_urls = [];
        foreach ( $curls as $url ) {
            if ( !$app->is_valid_url( $url, $msg ) ) {
                $errors++;
            } else {
                $counter++;
                $valid_urls[] = $url;
            }
        }
        $valid_urls = array_unique( $valid_urls );
        if (! $counter ) {
            $msg = $app->translate( 'Please enter a valid URL.' );
            return $app->print( json_encode( [
                'status' => 500,
                'message' => $msg ] ), 'application/json' );
        }
        $magic = $app->magic();
        $session = $app->db->model( 'session' )->new( ['name' => $magic, 'kind' => 'UP' ] );
        $session->user_id( $app->user()->id );
        $meta = ['file_size' => strlen($urls), 'extension' => 'txt', 'class' => 'file',
                 'basename' => 'url_list', 'mime_type' => 'text/plain',
                 'image_width' => null, 'image_height' => null, 'file_name' => 'url_list.txt' ];
        $meta['uploaded'] = date( 'Y-m-d H:i:s' );
        $meta['user_id'] = $app->user()->id;
        $session->text( json_encode( $meta ) );
        $session->data( implode( "\n", $valid_urls ) );
        $session->start( time() );
        $session->expires( time() + $app->sess_timeout );
        if ( $app->workspace() ) {
            $session->workspace_id( $app->workspace()->id );
        }
        $session->save();
        if ( $errors ) {
            if ( $errors == 1 ) {
                $msg = $this->translate( '%s URLs have been registered( %s URL is invalid. ).', [ $counter, $errors ] );
            } else {
                $msg = $this->translate( '%s URLs have been registered( %s URLs are invalid. ).', [ $counter, $errors ] );
            }
        } else {
            $msg = $this->translate( '%s URLs have been registered.', $counter );
        }
        return $app->print( json_encode( [
            'status' => 200,
            'session_id' => $magic,
            'message' => $msg ] ), 'application/json' );
    }

    function html_importer_apply_settings ( $app ) {
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $workspace_id = (int) $json['workspace_id'];
        $import_model = $json['model'];
        $name = $json['name'];
        $mode = $json['mode'];
        $terms = ['model' => 'workspace', 'type' => 'html_importer_setting', 'kind' => $import_model, 'name' => $name ];
        if ( $app->htmlimporter_setting_by_scope ) {
            $terms['object_id'] = $workspace_id;
        }
        if ( $app->htmlimporter_setting_by_user ) {
            $terms['key'] = $app->user()->id;
        }
        $metadata = $app->db->model( 'meta' )->get_by_key( $terms );
        if (! $metadata->id ) {
            if ( $mode === 'apply' ) {
                $app->json_error( $this->translate( 'An error occurred while get settings.' ) );
            } else {
                $app->json_error( $this->translate( 'An error occurred while delete settings.' ) );
            }
        } else {
            if ( $mode === 'delete' ) {
                $metadata->remove();
                return $app->print( json_encode( ['status' => 200] ), 'application/json' );
            }
            return $app->print( $metadata->text, 'application/json' );
        }
    }

    function html_importer_export_settings ( $app ) {
        if ( $app->request_method === 'GET' && $session = $app->param( 'session' ) ) {
            $session = $app->db->model( 'session' )->get_by_key( ['name' => $session, 'kind' => 'YM'] );
            if (! $session->id ) {
                return $app->error( 'Invalid request.' );
            }
            if ( $session->user_id != $app->user()->id ) {
                return $app->error( 'Invalid request.' );
            }
            $file_name = $session->key . '.yaml';
            $upload_dir = $app->upload_dir();
            $file_name = $upload_dir . DS . $file_name;
            /*
            $res = PTUtil::yaml_parse( $session->text );
            var_dump( $res );
            exit();
            */
            $app->fmgr->put( $file_name, $session->text );
            PTUtil::export_data( $file_name );
            $session->remove();
            exit();
        }
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $workspace_id = (int) $json['workspace_id'];
        $import_model = $json['model'];
        $name = $json['name'];
        $terms = ['model' => 'workspace', 'type' => 'html_importer_setting', 'kind' => $import_model, 'name' => $name ];
        if ( $app->htmlimporter_setting_by_scope ) {
            $terms['object_id'] = $workspace_id;
        }
        if ( $app->htmlimporter_setting_by_user ) {
            $terms['key'] = $app->user()->id;
        }
        $metadata = $app->db->model( 'meta' )->get_by_key( $terms );
        if (! $metadata->id ) {
            $app->json_error( $this->translate( 'An error occurred while get settings.' ) );
        } else {
            $yaml = ['name' => $metadata->name, 'model' => $metadata->kind ];
            if ( $app->htmlimporter_setting_by_scope ) {
                $yaml['workspace_id'] = $workspace_id;
            }
            if ( $app->htmlimporter_setting_by_user ) {
                $yaml['user_id'] = $app->user()->id;
            }
            $json = json_decode( $metadata->text, true );
            $html_field_settings = $json['html_field_settings'] ?? null;
            if (! $html_field_settings ) {
                unset( $json['html_field_settings'] );
            } else {
                $html_field_settings = preg_replace( "/\r\n?/", PHP_EOL, $html_field_settings );
                $json['html_field_settings'] = explode( PHP_EOL, $html_field_settings );
            }
            $html_preprocessing = $json['html_preprocessing'] ?? null;
            if (! $html_preprocessing ) {
                unset( $json['html_preprocessing'] );
            } else {
                $html_preprocessing = preg_replace( "/\r\n?/", PHP_EOL, $html_preprocessing );
                $json['html_preprocessing'] = explode( PHP_EOL, $html_preprocessing );
            }
            $html_preprocessing_replace = $json['html_preprocessing_replace'] ?? null;
            if (! $html_preprocessing_replace ) {
                unset( $json['html_preprocessing_replace'] );
            } else {
                $html_preprocessing_replace = preg_replace( "/\r\n?/", PHP_EOL, $html_preprocessing_replace );
                $json['html_preprocessing_replace'] = explode( PHP_EOL, $html_preprocessing_replace );
            }
            $html_asset_exts = $json['html_asset_exts'] ?? '';
            $html_asset_exts = trim( $html_asset_exts );
            if (! $html_asset_exts ) {
                unset( $json['html_asset_exts'] );
            } else {
                $json['html_asset_exts'] = explode( ',', $html_asset_exts );
            }
            foreach ( $json as $key => $value ) {
                if ( is_numeric( $value ) ) {
                    $json[ $key ] = (int) $value;
                }
            }
            $yaml = array_merge( $yaml, $json );
            $result = PTUtil::yaml_dump( $yaml );
            $magic = $app->magic();
            $session = $app->db->model( 'session' )->new( ['name' => $magic, 'kind' => 'YM'] );
            $session->key( $metadata->name );
            $session->user_id( $app->user()->id );
            $session->text( $result );
            $session->start( time() );
            $session->expires( time() + $app->sess_timeout );
            if ( $app->workspace() ) {
                $session->workspace_id( $app->workspace()->id );
            }
            $session->save();
            return $app->print( json_encode( ['status' => 200, 'session' => $magic ] ), 'application/json' );
        }
    }

    function html_importer_save_settings ( $app ) {
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = '';
        $workspace_id = 0;
        $import_model = null;
        $name = null;
        $settings = [];
        foreach ( $json as $data ) {
            if ( $data['name'] === 'magic_token' ) {
                $magic_token = $data['value'];
                $app->param( 'magic_token', $magic_token );
                $app->validate_magic( true );
            } else if ( $data['name'] === 'workspace_id' ) {
                $workspace_id = (int) $data['value'];
            } else if ( $data['name'] === 'import_model' ) {
                $import_model = $data['value'];
            } else if ( $data['name'] === 'html_importer_setting_name' ) {
                $name = $data['value'];
            } else if ( $data['name'] === 'html_importer_send_urls' ) {
            } else if ( strpos( $data['name'], 'html_' ) === 0 ) {
                $settings[ $data['name'] ] = $data['value'];
            }
        }
        $terms = ['model' => 'workspace', 'type' => 'html_importer_setting', 'kind' => $import_model, 'name' => $name ];
        if ( $app->htmlimporter_setting_by_scope ) {
            $terms['object_id'] = $workspace_id;
        }
        if ( $app->htmlimporter_setting_by_user ) {
            $terms['key'] = $app->user()->id;
        }
        $meta = $app->db->model( 'meta' )->get_by_key( $terms );
        $meta->object_id( $workspace_id );
        $meta->key( $app->user()->id );
        $meta->text( json_encode( $settings ) );
        $meta->save();
        return $app->print( json_encode( ['status' => 200] ), 'application/json' );
    }

    function html_importer_get_settings ( $app ) {
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        $app->param( 'magic_token', $magic_token );
        $app->validate_magic( true );
        $workspace_id = (int) $json['workspace_id'];
        $import_model = $json['model'] ?? '';
        $terms = ['model' => 'workspace', 'type' => 'html_importer_setting', 'kind' => $import_model ];
        if ( $app->htmlimporter_setting_by_scope ) {
            $terms['object_id'] = $workspace_id;
        }
        if ( $app->htmlimporter_setting_by_user ) {
            $terms['key'] = $app->user()->id;
        }
        $metadata = $app->db->model( 'meta' )->load( $terms );
        $names = [];
        foreach ( $metadata as $meta ) {
            $names[] = $meta->name;
        }
        return $app->print( json_encode( [
            'status' => 200,
            'settings' => $names ] ), 'application/json' );
    }

    function import_html ( $app, $import_files, $session ) {
        $migrator = $app->component( 'DataMigrator' );
        $app->db->caching = false;
        $app->db->query_cache = false;
        require_once( LIB_DIR . 'ExtractContent' . DS . 'ExtractContent.php' );
        require_once( LIB_DIR . 'Smarty' . DS . 'outputfilter.trimwhitespace.php' );
        // TODO:: Convert href to root relative path.
        // TODO:: Set datetime from server timestamp.
        // TODO:: Topic Path or breadcrumb.
        ini_set( 'max_execution_time', 0 );
        $this->migrator = $migrator;
        $this->session = $session;
        $counter = 0;
        $import_type = $app->param( 'html_import_type' );
        $this->import_type = $import_type;
        $workspace = $app->workspace() ? $app->workspace() : null;
        $workspace_id = $workspace ? (int) $workspace->id : 0;
        $site_fullpath = $workspace ? $workspace->site_path : $app->site_path;
        $site_url = $workspace ? $workspace->site_url : $app->site_url;
        $site_path = preg_replace( '!^https{0,1}://.*?/!', '', $site_url );
        $site_path = rtrim( $site_path, '/' );
        $relative = preg_quote( $site_path, '/' );
        $top_level = preg_replace( '!^https{0,1}://[^/]+/!', '', $site_url );
        $top_level_q = '';
        if ( $top_level ) {
            $top_level_q = preg_quote( $top_level, '/' );
        }
        // $site_fullpath = rtrim( preg_replace( "/{$relative}\$/", '', $site_fullpath ), DS );
        $model = $app->param( 'import_model' );
        $model_type = $model == 'entry' || $model == 'page' ? 'entry' : 'other';
        $table = $app->get_table( $model );
        if ( $table->revisable ) $app->db->in_duplicate = true; // Not remove blob file.
        $scheme = $app->get_scheme_from_db( $model );
        $column_defs = $scheme['column_defs'];
        $edit_properties = $scheme['edit_properties'];
        $relations = $scheme['relations'];
        $obj_label_plural = $app->translate( $table->plural );
        $urls = [];
        $asset_paths = [];
        $insert_asset_paths = [];
        $import_base = $session->value;
        $denied_exts = $app->denied_exts;
        $denied_exts = preg_split( '/\s*,\s*/', $denied_exts );
        $asset_exts = $app->param( 'html_asset_exts' );
        $asset_extensions = [];
        if ( $asset_exts ) {
            $asset_extensions = preg_split( '/\s*,\s*/', $asset_exts );
        }
        $images = $app->images;
        $use_curl = $app->htmlimporter_use_curl;
        $component = null;
        if ( $use_curl ) {
            $component = $app->component( 'LinkChecker' );
            if (! $component ) {
                $lib_dir = $app->pt_dir . DS . 'plugins' . DS . 'LinkChecker' . DS;
                if ( is_dir( $lib_dir ) ) {
                    $app->configure_from_json( $lib_dir . 'config.json' );
                    require_once( $lib_dir . 'LinkChecker.php' );
                    $component = new LinkChecker();
                    $app->components['linkchecker'] = $component;
                }
            }
            $html_digest_auth   = $app->param( 'html_digest_auth' );
            if ( $component ) {
                $component->digest = $html_digest_auth;
                $this->linkchecker = $component;
            }
        }
        $from_zip_url = [];
        $temp_path = preg_quote( $app->temp_dir, '/' );
        if ( $import_type == 'url' ) {
            $urls = file_get_contents( $import_files[0] );
            $urls = explode( "\n", $urls );
        } else {
            foreach ( $import_files as $import_file ) {
                $mime_type = PTUtil::get_mime_type( $import_file );
                if ( $mime_type === 'text/html' ) {
                    $urls[] = $import_file;
                    $import_file_rel = preg_replace( "/^{$temp_path}[\|\/][A-Za-z0-9\_]+/", '', $import_file );
                    $from_zip_url[ $import_file ] = $import_file_rel;
                } else {
                    $ext = PTUtil::get_extension( basename( $import_file ), true );
                    if (! $ext || in_array( $ext, $denied_exts ) ) {
                    } else if ( in_array( $ext, $asset_extensions ) || in_array( $ext, $images ) ) {
                        $asset_paths[] = $import_file;
                        $insert_asset_paths[ $import_file ] = true;
                    }
                }
            }
            usort( $asset_paths, function( $a, $b ) {
            return strlen( $a ) - strlen( $b );
            });
        }
        $asset_ids = [];
        $import_assets  = $app->param( 'html_import_assets' );
        $imported_asset_ids = [];
        if ( $import_assets && count( $insert_asset_paths ) ) {
            foreach ( $insert_asset_paths as $asset_path => $bool ) {
                $extra_path = $this->get_extra_path( $asset_path, $site_path, $import_type );
                $printPath = htmlspecialchars( $extra_path . basename( $asset_path ) );
                $asset = $app->db->model( 'asset' )->get_by_key(
                   ['extra_path' => $extra_path,
                    'file_name' => basename( $asset_path ),
                    'workspace_id' => $workspace_id,
                    'rev_type' => 0]
                );
                if ( $asset->id ) {
                    $asset_ids[] = (int) $asset->id;
                    $migrator->print( "The import is skipped because the asset '%s' exists.", $printPath, $this );
                    continue;
                }
                $asset_data = @file_get_contents( $asset_path );
                $error = '';
                $logging = $app->logging;
                $app->logging = false;
                $error_reporting = ini_get( 'error_reporting' ); 
                error_reporting(0);
                $metadata = PTUtil::get_upload_info( $app, $asset_path, $error );
                $app->logging = $logging;
                error_reporting( $error_reporting );
                if ( $error ) {
                    $error = $migrator->print( "The import is skipped because error occurred while importing '%s'.", $printPath, $this, true );
                    $import_results[ $url_key ]['errors'][] = $error;
                    $i -= 1;
                    continue;
                }
                $metadata = $metadata['metadata'];
                $label = basename( $asset_path );
                $asset->label( $label );
                $this->set_asset_meta( $asset, $metadata );
                $asset->file( $asset_data );
                $app->set_default( $asset );
                $asset->save();
                $imported_asset_ids[] = $asset->id;
                PTUtil::file_attach_to_obj( $app, $asset, 'file', $asset_path, $label, $error );
                $app->publish_obj( $asset );
                $migrator->print( $app->translate( 'Create %s (%s / ID : %s).', [ $app->translate('Asset'), $printPath, $asset->id ] ) );
            }
        }
        $auth_user = $app->param( 'html_auth_user' );
        $auth_pwd = $app->param( 'html_auth_pwd' );
        $http_option = [];
        if ( $auth_user && $auth_pwd ) {
            $http_option[] = 'Authorization: Basic ' . base64_encode( "{$auth_user}:{$auth_pwd}" );
        }
        $html_preprocessing = $app->param( 'html_preprocessing' ) ? $app->param( 'html_preprocessing' ) : '';
        $html_preprocessing_replace = $app->param( 'html_preprocessing_replace' ) ? $app->param( 'html_preprocessing_replace' ) : '';
        $basic_auth_raw = $auth_user ? "{$auth_user}:{$auth_pwd}" : '';
        $title_perttern = $app->param( 'html_title_perttern' ) ? $app->param( 'html_title_perttern' ) : 'heading';
        $title_option = $app->param( 'html_title_option' ) ? $app->param( 'html_title_option' ) : '';
        $remove_title = $app->param( 'html_remove_title' ) ? $app->param( 'html_remove_title' ) : '';
        $body_perttern = $app->param( 'html_body_perttern' ) ? $app->param( 'html_body_perttern' ) : '';
        $body_option = $app->param( 'html_body_option' ) ? $app->param( 'html_body_option' ) : '';
        $overwrite_same = $app->param( 'html_overwrite_same' );
        $field_settings = $app->param( 'html_field_settings' );
        $meta_ogimage   = $app->param( 'html_meta_ogimage' );
        $minifying_html = $app->param( 'html_minifying_html' );
        $create_report = $app->param( 'html_create_report' );
        $js_to_asset = $app->param( 'html_js_to_asset' );
        $css_to_asset = $app->param( 'html_css_to_asset' );
        $asset_fullpath = $site_fullpath;
        if ( $import_assets || $meta_ogimage ) {
            if ( is_numeric( $app->asset_workspace_id ) ) {
                $asset_workspace = $app->asset_workspace_id ? $app->db->model( 'workspace' )->load( $app->asset_workspace_id ) : null;
                if (! $app->can_do( 'asset', 'create', null, $asset_workspace ) ) {
                    return $app->error( $this->translate( 'You do not have permission to import assets.' ) );
                }
                $asset_fullpath = $asset_workspace ? $asset_workspace->site_path : $app->site_path;
            } else if (! $app->can_do( 'asset', 'create', null, $workspace ) ) {
                return $app->error( $this->translate( 'You do not have permission to import assets.' ) );
            }
        }
        $text_format = $app->param( 'html_text_format' );
        libxml_use_internal_errors( true );
        $start = '';
        $end = '';
        $body_start = '';
        $body_end = '';
        $asset_table = $app->get_table( 'asset' );
        $rel_column = $app->db->model( 'column' )->get_by_key(
            ['table_id' => $asset_table->id, 'name' => 'file' ] );
        $asset_extra = $rel_column->extra;
        $tag_regex = '<\${0,1}' . $app->ctx->prefix;
        $html_preprocessing_org = $html_preprocessing;
        $html_preprocessing_replace_org = $html_preprocessing_replace;
        $title_option_org = $title_option;
        $body_option_org  = $body_option;
        $field_settings_org = $field_settings;
        $title_perttern_org = $title_perttern;
        $body_perttern_org = $body_perttern;
        $title_col = $model_type == 'entry' ? 'title' : '';
        $body_col = $model_type == 'entry' ? 'text' : '';
        if ( $model_type != 'entry' ) {
            $title_col = $table->primary;
            $extra = "AND column_name not like 'rev_%' AND column_name != 'basename' AND column_name != 'uuid'"
                   . " AND column_name != 'extra_path' AND column_name != 'class'";
            $body_col = $app->db->model( 'column' )->load( ['table_id' => $table->id, 'type' => 'text', 'name' => ['!=' => $table->primary ] ],
                                                           ['sort' => 'order', 'direction' => 'ascend'], '*', $extra );
            $body_col = is_array( $body_col ) && count( $body_col ) ? $body_col[0] : null;
            if (! $body_col ) {
                $body_col = $app->db->model( 'column' )->load( ['table_id' => $table->id, 'type' => 'string',
                                                                'name' => ['!=' => $table->primary ] ],
                                                               ['sort' => 'order', 'direction' => 'ascend'], '*', $extra );
                $body_col = is_array( $body_col ) && count( $body_col ) ? $body_col[0] : null;
            }
            if ( $body_col ) {
                $body_col = $body_col->name;
            }
        }
        $asset_extra_path = $workspace ? $workspace->extra_path : $app->extra_path;
        $app->init_callbacks( 'htmlimporter', 'pre_url_get' );
        $last = count( $urls ) - 1;
        $import_results = [];
        $work_dir = $app->upload_dir() . DS;
        foreach ( $urls as $idx => $url ) {
            $callback = ['name' => 'pre_url_get', 'model' => $model, 'url' => $url,
                         'http_option' => $http_option, 'table' => $table, 'cookie' => null];
            $app->run_callbacks( $callback, 'htmlimporter' );
            $http_options = $callback['http_option'];
            $url = $callback['url'];
            $model = $callback['model'];
            $table = $callback['table'];
            if ( $component ) {
                $component->cookie = $callback['cookie'];
            }
            $this->linkchecker = $component;
            if ( $use_curl ) {
                $http_options = $basic_auth_raw;
            } else {
                $http_options = ['http' => ['header' => implode("\r\n", $http_options ) ] ];
                $http_options['ssl']['verify_peer'] = false;
                $http_options['ssl']['verify_peer_name'] = false;
                $http_options['http'] = ['timeout' => $app->htmlimporter_timeout ];
                $http_options = PTUtil::stream_context_create( $http_options );
            }
            $url_key = null;
            if ( isset( $from_zip_url[ $url ] ) ) {
                $url_key = $from_zip_url[ $url ];
            } else {
                $url_key = $url;
            }
            $import_results[ $url_key ] = ['errors' => []];
            $data = $this->file_get_contents( $url, $http_options, $app );
            if (! $data ) {
                $error = $migrator->print( "An error occurred while fetch URL '%s'.", $url, $this, true );
                $import_results[ $url_key ]['errors'][] = $error;
                continue;
            }
            $migrator->print( "<i>Importing '%s'...</i>", $url_key, $this );
            if ( preg_match( '!/$!', $url ) ) {
                $url .= 'index.html';
            }
            $html_preprocessing = $html_preprocessing_org;
            $html_preprocessing_replace = $html_preprocessing_replace_org;
            $title_option = $title_option_org;
            $body_option = $body_option_org;
            $field_settings = $field_settings_org;
            $title_perttern = $title_perttern_org;
            $body_perttern = $body_perttern_org;
            $app->ctx->vars['url'] = $url;
            $app->ctx->vars['html'] = $data;
            if ( preg_match( "/$tag_regex/i", $html_preprocessing ) ) {
                $html_preprocessing = $app->build( $html_preprocessing );
            }
            if ( preg_match( "/$tag_regex/i", $html_preprocessing_replace ) ) {
                $html_preprocessing_replace = $app->build( $html_preprocessing_replace );
            }
            if ( preg_match( "/$tag_regex/i", $title_option ) ) {
                $title_option = $app->build( $title_option );
            }
            if ( preg_match( "/$tag_regex/i", $body_option ) ) {
                $body_option = $app->build( $body_option );
            }
            if ( preg_match( "/$tag_regex/i", $field_settings ) ) {
                $field_settings = $app->build( $field_settings );
            }
            if ( $title_perttern == 'title' ) {
                // $title_option = preg_quote( $title_option, '/' );
            } else if ( $title_perttern == 'start_end' ) {
                if (! $title_option || strpos( $title_option, ',' ) === false ) {
                    $this->print_error(
                        $this->translate( 'The start and end part of %s are not specified.',
                        $app->translate( 'Title' ) ) );
                }
                list( $start, $end ) = explode( ',', $title_option );
                $start = preg_quote( $start, '/' );
                $end = preg_quote( $end, '/' );
            } else if ( $title_perttern == 'regex' ) {
                $title_option = $this->sanitize_regex( $title_option );
            }
            if ( $body_perttern == 'start_end' ) {
                if (! $body_option || strpos( $body_option, ',' ) === false ) {
                    $this->print_error(
                        $this->translate( 'The start and end part of %s are not specified.',
                        $app->translate( 'Body' ) ) );
                }
                list( $body_start, $body_end ) = explode( ',', $body_option );
                $body_start = preg_quote( $body_start, '/' );
                $body_end = preg_quote( $body_end, '/' );
            } else if ( $body_perttern == 'regex' ) {
                $body_option = $this->sanitize_regex( $body_option );
            }
            $field_settings = preg_replace( "/\r\n?/", "\n", $field_settings );
            $field_settings = $field_settings ? explode( "\n", $field_settings ) : [];
            $data = PTUtil::to_utf8( $data );
            $html_preprocessing = preg_replace( "/\r\n?/", "\n", $html_preprocessing );
            $html_preprocessing = $html_preprocessing ? explode( "\n", $html_preprocessing ) : [];
            $entry = $app->db->model( $model )->new();
            $field_vars = [];
            $remove_selectors = [];
            foreach ( $html_preprocessing as $condition ) {
                $set_column = null;
                if ( strpos( $condition, '=' ) !== false ) {
                    $split = explode( '=', $condition );
                    $last = array_pop( $split );
                    if ( $entry->has_column( $last ) || stripos( $last, 'field.' ) === 0 ) {
                        $set_column = $last;
                        $condition = implode( '=', $split );
                    }
                }
                if ( strpos( $condition, '!' ) === 0 ) {
                    $perttern = 'regex';
                    $condition = $this->sanitize_regex( $condition );
                    if ( $set_column ) {
                        if ( @preg_match( $condition, $data, $matchs ) ) {
                            $value = trim( array_pop( $matchs ) );
                            if ( strpos( $set_column, 'field.' ) === 0 ) {
                                $set_column = preg_replace( '/^field\./', '', $set_column );
                                $field_vars[ $set_column ] = $value;
                            } else {
                                $entry->$set_column( $value );
                            }
                        }
                    }
                    $data = @preg_replace( $condition, '', $data );
                } else if ( strpos( $condition, '/' ) === 0 ) {
                    // XPath
                    if ( $set_column ) {
                        $remove_selectors[ $set_column ] = $condition;
                    } else {
                        $remove_selectors[] = $condition;
                    }
                } else {
                    // CSS Selector
                    $condition_org = $condition;
                    $condition = PTUtil::selector2xpath( $condition );
                    if ( $set_column === null && $condition === '//' && strpos( $data, $condition_org ) !== false ) {
                        // Remove Simple string.
                        $data = str_replace( $condition_org, '', $data );
                    } else {
                        if ( $set_column ) {
                            $remove_selectors[ $set_column ] = $condition;
                        } else {
                            $remove_selectors[] = $condition;
                        }
                    }
                }
            }
            $replace_selectors = [];
            if ( $html_preprocessing_replace ) {
                $replace_setting = "{$work_dir}html_preprocessing_replace.csv";
                $app->fmgr->put( $replace_setting, $html_preprocessing_replace );
                $csv_handle = new SplFileObject( $replace_setting ); 
                $csv_handle->setFlags( SplFileObject::READ_CSV | 
                                       SplFileObject::READ_AHEAD | 
                                       SplFileObject::SKIP_EMPTY ); 
                foreach ( $csv_handle as $line ) {
                    $condition = $line[0];
                    $replace = $line[1] ?? '';
                    if ( strpos( $condition, '!' ) === 0 ) {
                        $condition = $this->sanitize_regex( $condition );
                        $data = @preg_replace( $condition, $replace, $data );
                    } else if ( strpos( $condition, '/' ) === 0 ) {
                        // XPath
                        $replace_selectors[ $condition ] = $replace;
                    } else {
                        // CSS Selector
                        $condition_org = $condition;
                        $condition = PTUtil::selector2xpath( $condition );
                        if ( $condition === '//' && strpos( $data, $condition_org ) !== false ) {
                            // Replace Simple string.
                            $data = str_replace( $condition_org, $replace, $data );
                        } else {
                            $replace_selectors[ $condition ] = $replace;
                        }
                    }
                }
            }
            $dom = PTUtil::loadHTML( $data );
            if (! $dom ) {
                $error = $migrator->print( "An error occurred while parsing data from '%s'.", $url, $this, true );
                $import_results[ $url_key ]['errors'][] = $error;
                continue;
            }
            $finder = new DomXPath( $dom );
            $meta_url = $url;
            if ( $import_type != 'url' ) {
                $search = preg_quote( $import_base, '/' );
                $meta_url = preg_replace( "/^$search/", 'file://', $meta_url );
            }
            $is_new = true;
            $meta = null;
            if ( $overwrite_same ) {
                $metaObjs = $app->db->model( 'meta' )->load( ['model' => $model,
                                                    'text' => $meta_url, 'kind' => 'import_url',
                                                    'number' => $workspace_id ], ['sort' => 'object_id',
                                                                                  'direction' => 'ascend'] );
                foreach ( $metaObjs as $meta ) {
                    $terms = ['id' => $meta->object_id ];
                    if ( $entry->has_column( 'workspace_id' ) ) {
                        $terms['workspace_id'] = $workspace_id;
                    }
                    $entry = $app->db->model( $model )->get_by_key( $terms );
                    $existing = $app->db->model( $model )->load( $terms );
                    if ( empty( $existing ) ) {
                        $meta->remove();
                        continue;
                    }
                    if ( $table->revisable ) {
                        foreach ( $existing as $exist ) {
                            if (! $exist->rev_type ) {
                                $entry = $exist;
                                $is_new = false;
                                break;
                            }
                        }
                    } else {
                        if ( !empty( $existing ) ) {
                            $is_new = false;
                            break;
                        }
                    }
                }
            }
            if (! $meta ) {
                $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $model,
                                                    'text' => $meta_url, 'kind' => 'import_url',
                                                    'number' => $workspace_id ]);
            }
            if ( $is_new && $entry->id ) {
                $entry = $app->db->model( $model )->new();
            } else if ( $entry->rev_type ) {
                $entry = $app->db->model( $model )->new();
            }
            if (! empty( $remove_selectors ) ) {
                $dom_changed = false;
                foreach ( $remove_selectors as $set_column => $remove_selector ) {
                    $elements = $finder->query( $remove_selector );
                    if ( $elements->length ) {
                    } else {
                        try {
                            $elements = $finder->evaluate( $remove_selector );
                        } catch ( Exception $e ) {
                            // Error
                        }
                        if (! is_object( $elements ) ) {
                            $elements = null;
                        }
                    }
                    if ( is_object( $elements ) && $elements->length ) {
                        $i = $elements->length - 1;
                        while ( $i > -1 ) {
                            $ele = $elements->item( $i );
                            if ( is_string( $set_column )
                                && ( $entry->has_column( $set_column ) || strpos( $set_column, 'field.' ) === 0 ) ) {
                                $value = trim( PTUtil::outerHTML( $ele ) );
                                if ( strpos( $set_column, 'field.' ) === 0 ) {
                                    $set_column = preg_replace( '/^field\./', '', $set_column );
                                    $field_vars[ $set_column ] = $value;
                                } else {
                                    $entry->$set_column( $value );
                                }
                            }
                            $parent = $ele->parentNode;
                            $parent->removeChild( $ele );
                            $dom_changed = true;
                            $i -= 1;
                        }
                    }
                }
                if ( $dom_changed ) {
                    $data = PTUtil::saveHTML( $dom );
                    $dom = PTUtil::loadHTML( $data );
                    $extractor = new ExtractContent( $data );
                    $extractor->dom = $dom;
                    $finder = new DomXPath( $dom );
                }
            }
            if (! empty( $replace_selectors ) ) {
                $dom_changed = false;
                foreach ( $replace_selectors as $replace_selector => $replace_txt ) {
                    $elements = $finder->query( $replace_selector );
                    if ( $elements !== false && $elements->length ) {
                    } else {
                        try {
                            $elements = $finder->evaluate( $replace_selector );
                        } catch ( Exception $e ) {
                            // Error
                        }
                        if (! is_object( $elements ) ) {
                            $elements = null;
                        }
                    }
                    if ( is_object( $elements ) && $elements->length ) {
                        $i = $elements->length - 1;
                        while ( $i > -1 ) {
                            $ele = $elements->item( $i );
                            $parent = $ele->parentNode;
                            $parent->replaceChild( $dom->createTextNode( $replace_txt ), $ele );
                            $dom_changed = true;
                            $i -= 1;
                        }
                    }
                }
                if ( $dom_changed ) {
                    $data = PTUtil::saveHTML( $dom );
                    $dom = PTUtil::loadHTML( $data );
                    $extractor = new ExtractContent( $data );
                    $extractor->dom = $dom;
                    $finder = new DomXPath( $dom );
                }
            }
            $meta_elements = $dom->getElementsByTagName( 'meta' );
            if ( $meta_elements->length ) {
                $i = $meta_elements->length - 1;
                for ( $i = 0; $i < $meta_elements->length; $i++ ) {
                    $ele = $meta_elements->item( $i );
                    $charset = strtolower( $ele->getAttribute( 'charset' ) );
                    // <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
                    $meta_content = $ele->getAttribute( 'content' );
                    $equiv = strtolower( $ele->getAttribute( 'http-equiv' ) );
                    if ( $charset && $charset == 'utf-8' ) {
                        $ele->parentNode->removeChild( $ele );
                    } else if ( $equiv && strpos( $meta_content, 'text/html' ) === 0 ) {
                        $ele->parentNode->removeChild( $ele );
                    }
                }
            }
            $original = null;
            if ( !$is_new && $table->revisable ) {
                $original = clone $entry;
                $original->id( null );
                $orig_relations = $app->get_relations( $entry );
                $orig_metadata  = $app->get_meta( $entry );
                $original->_relations = $orig_relations;
                $original->_meta = $orig_metadata;
            }
            if ( $entry->has_column( 'workspace_id' ) ) {
                $entry->workspace_id( $workspace_id );
            }
            $title = '';
            $description = '';
            $keywords = '';
            $body = '';
            $og_image = '';
            $attachment_labels = [];
            $attachment_basenames = [];
            if ( $title_perttern == 'css' ) {
                $title_option = PTUtil::selector2xpath( $title_option );
                $title_perttern = 'xpath';
            }
            $extractor = new ExtractContent( $data );
            $extractor->dom = $dom;
            $base = dirname( $url ) . '/';
            $target_site_path = preg_replace( '!(^https{0,1}://[^/]+?/).*$!', '$1', $url );
            $replaced_url = [];
            $replaced_href = [];
            if ( $js_to_asset || $css_to_asset ) {
                $eleNames = [];
                if ( $js_to_asset ) {
                    $eleNames[] = 'script';
                }
                if ( $js_to_asset ) {
                    $eleNames[] = 'link';
                }
                foreach ( $eleNames as $eleName ) {
                    $elements = $dom->getElementsByTagName( $eleName );
                    if ( $elements->length ) {
                        $attrName = $eleName === 'script' ? 'src' : 'href';
                        for ( $i = 0; $i < $elements->length; $i++ ) {
                            $ele = $elements->item( $i );
                            $src_url = $ele->getAttribute( $attrName );
                            if (! $src_url ) {
                                continue;
                            }
                            $src_url_org = $src_url;
                            $asset_path = '';
                            $extra_path = '';
                            if ( $import_type !== 'url' ) {
                                if ( strpos( $src_url, '?' ) !== false ) {
                                    list( $src_url, $params ) = explode( '?', $src_url );
                                }
                                $src_url_org = $src_url;
                                if ( preg_match( '/^.\//', $src_url ) ) {
                                    $src_url = preg_replace( '/^.\//', '', $src_url );
                                }
                                if ( strpos( $src_url, '.' ) === 0 ) {
                                    $src_url = dirname( $url ) . DS . $src_url;
                                    $asset_path = $src_url;
                                }
                                $search = preg_quote( $src_url, '/' );
                                foreach ( $asset_paths as $file_path ) {
                                    if ( preg_match( "/{$search}$/", $file_path ) ) {
                                        $asset_path = $file_path;
                                        $extra_path = $this->get_extra_path( $asset_path, $site_path, $import_type );
                                        unset( $insert_asset_paths[ $file_path ] );
                                        break;
                                    }
                                }
                            } else {
                                $src_url = $extractor->convert2url( $src_url, $base );
                                $src_url_org = $src_url;
                                if ( strpos( $src_url, '?' ) !== false ) {
                                    list( $src_url, $params ) = explode( '?', $src_url );
                                }
                                $extra_path = dirname( preg_replace( '!^https{0,1}:\/\/[^\/]*?\/!', '', $src_url ) );
                                $asset_data = $this->url_existing( $src_url, $http_options, $app );
                                // Existing check...
                                if ( $asset_data === false ) {
                                    $error = $migrator->print( "The import is skipped because file was not found '%s'.", $src_url, $this, true );
                                    $import_results[ $url_key ]['errors'][] = $error;
                                    continue;
                                }
                                $upload_dir = $app->upload_dir();
                                $asset_path = $upload_dir. DS . basename( $src_url );
                            }
                            if (! $asset_path ) {
                                continue;
                            }
                            $ext = PTUtil::get_extension( basename( $src_url ), true );
                            if (! $ext || in_array( $ext, $denied_exts ) ) {
                                $error = $migrator->print( "The import is skipped because the file (%s) is not allowed.", $src_url, $this, true );
                                $import_results[ $url_key ]['errors'][] = $error;
                                continue;
                            }
                            if ( strpos( $extra_path, $top_level ) === 0 ) {
                                // Sub directory of Site URL.
                                $extra_path = preg_replace( "/^{$top_level_q}/", '', $extra_path );
                            }
                            if (! $extra_path ) {
                                $extra_path = $asset_extra_path;
                            }
                            $app->sanitize_dir( $extra_path );
                            $printPath = htmlspecialchars( $extra_path . basename( $asset_path ) );
                            $file_full_path = $asset_fullpath . DS . $extra_path . basename( $asset_path );
                            $label = basename( $asset_path );
                            if ( is_numeric( $app->asset_workspace_id ) ) {
                                // Support asset_workspace_id.
                                $asset = $app->db->model( 'asset' )->get_by_key(
                                   ['extra_path' => $extra_path,
                                    'file_name' => $label,
                                    'workspace_id' => $app->asset_workspace_id,
                                    'rev_type' => 0]
                                );
                            } else {
                                $asset = $app->db->model( 'asset' )->get_by_key(
                                   ['extra_path' => $extra_path,
                                    'file_name' => $label,
                                    'workspace_id' => $workspace_id,
                                    'rev_type' => 0]
                                );
                            }
                            if ( $asset->id || $app->fmgr->exists( $file_full_path ) || isset( $file_full_paths[ $file_full_path ] ) ) {
                                if ( $asset->id ) {
                                    $asset_urlObj = $app->db->model( 'urlinfo' )->get_by_key(
                                        ['object_id' => (int) $asset->id, 'model' => 'asset'] );
                                    if ( $asset_urlObj->id ) {
                                        if ( $eleName === 'script' ) {
                                            $replaced_url[ $src_url_org ] = $asset_urlObj->relative_url;
                                        } else {
                                            $replaced_href[ $src_url_org ] = $asset_urlObj->relative_url;
                                        }
                                    }
                                    $asset_ids[] = (int) $asset->id;
                                }
                                if ( in_array( $asset->id, $imported_asset_ids ) ) {
                                    continue;
                                }
                                $migrator->print( "The import is skipped because the asset '%s' exists.", $printPath, $this );
                                continue;
                            }
                            $asset_data = $this->file_get_contents( $src_url, $http_options, $app );
                            if (! $asset_data ) {
                                $error = $migrator->print( "The import is skipped because file was not found '%s'.", $origURL, $this, true );
                                $import_results[ $url_key ]['errors'][] = $error;
                                continue;
                            }
                            $app->fmgr->put( $asset_path, $asset_data );
                            $asset->label( $label );
                            $logging = $app->logging;
                            $app->logging = false;
                            $error_reporting = ini_get( 'error_reporting' ); 
                            error_reporting(0);
                            $metadata = PTUtil::get_upload_info( $app, $asset_path, $error );
                            $app->logging = $logging;
                            error_reporting( $error_reporting );
                            if ( $error ) {
                                $error = $migrator->print( "The import is skipped because error occurred while importing '%s'.", $printPath, $this, true );
                                $import_results[ $url_key ]['errors'][] = $error;
                                continue;
                            }
                            $metadata = $metadata['metadata'];
                            $this->set_asset_meta( $asset, $metadata );
                            $asset->file( $asset_data );
                            $app->set_default( $asset );
                            $saved = $asset->save();
                            if (! $saved ) {
                                $error = $migrator->print( "The import is skipped because error occurred while importing '%s'.", $printPath, $this, true );
                                $import_results[ $url_key ]['errors'][] = $error;
                                continue;
                            }
                            PTUtil::file_attach_to_obj ( $app, $asset, 'file', $asset_path, $label, $error );
                            $app->publish_obj( $asset );
                            $asset_urlObj = $app->db->model( 'urlinfo' )->get_by_key(
                                ['object_id' => (int) $asset->id, 'model' => 'asset'] );
                            if ( $asset_urlObj->id ) {
                                if ( $eleName === 'script' ) {
                                    $replaced_url[ $src_url_org ] = $asset_urlObj->relative_url;
                                } else {
                                    $replaced_href[ $src_url_org ] = $asset_urlObj->relative_url;
                                }
                            }
                            $asset_ids[] = (int) $asset->id;
                            $migrator->print( $app->translate( 'Create %s (%s / ID : %s).', [ $app->translate('Asset'), $printPath, $asset->id ] ) );
                        }
                    }
                }
            }
            if ( $title_perttern == 'heading' ) {
                $arr = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
                foreach ( $arr as $tag ) {
                    if (! $title ) {
                        $elements = $dom->getElementsByTagName( $tag );
                        if ( $elements->length ) {
                            for ( $i = 0; $i < $elements->length; $i++ ) {
                                $ele = $elements->item( $i );
                                $title = trim( $ele->textContent );
                                $children = $ele->childNodes;
                                if (! $title && $children->length ) {
                                    $title = $this->get_title_from_node( $ele->childNodes, $title );
                                }
                                if ( $title && $remove_title ) {
                                    $ele->parentNode->removeChild( $ele );
                                    $data = html_entity_decode( $dom->saveHTML(), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, 'UTF-8' );
                                    $dom->loadHTML( mb_encode_numericentity( $data, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                                        LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT );
                                    $extractor = new ExtractContent( $data );
                                    $extractor->dom = $dom;
                                    $finder = new DomXPath( $dom );
                                    break;
                                }
                            }
                        }
                        if ( $title ) break;
                    }
                }
            } else if ( $title_perttern == 'title' ) {
                $elements = $dom->getElementsByTagName( 'title' );
                if ( $elements->length ) {
                    $ele = $elements->item(0);
                    $title = $ele->nodeValue;
                    if ( $title_option ) {
                        $magic = static::magic( $title );
                        if ( preg_match( '/\\\,/', $title_option ) ) {
                            $title_option = preg_replace( '/\\\,/', $magic, $title_option );
                        }
                        $title_options = explode( ',', $title_option );
                        $replaced = false;
                        foreach ( $title_options as $title_opt ) {
                            $title_opt = str_replace( $magic, ',', $title_opt );
                            $title_opt = preg_quote( $title_opt, '/' );
                            $_title = preg_replace( "/^(.*?){$title_opt}.*$/", '$1', $title );
                            if ( $_title !== $title ) {
                                $title = $_title;
                                $replaced = true;
                                break;
                            }
                        }
                        if (! $replaced && $app->htmlimporter_print_separator_error ) {
                            $error = $migrator->print( "Column '%s' did not match separator.", $title_col, $this, true );
                            $import_results[ $url_key ]['errors'][] = $error;
                        }
                    }
                }
            } else if ( $title_perttern == 'start_end' ) {
                preg_match( "/{$start}(.*?){$end}/si",  $data, $matches );
                $title = isset( $matches[1] ) ? $matches[1] : '';
                if ( $title && $remove_title ) {
                    $data = preg_replace( "/{$start}.*?{$end}/si", '', $data );
                    $dom->loadHTML( mb_encode_numericentity( $data, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                        LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT );
                    $extractor = new ExtractContent( $data );
                    $extractor->dom = $dom;
                    $finder = new DomXPath( $dom );
                }
            } else if ( $title_perttern == 'regex' ) {
                preg_match( $title_option,  $data, $matches );
                $title = isset( $matches[1] ) ? $matches[1] : '';
                if ( $title && $remove_title ) {
                    $data = preg_replace( $title_option, '', $data );
                    $dom->loadHTML( mb_encode_numericentity( $data, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                        LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT );
                    $extractor = new ExtractContent( $data );
                    $extractor->dom = $dom;
                    $finder = new DomXPath( $dom );
                }
            } else if ( $title_perttern == 'xpath' ) {
                $elements = $finder->query( $title_option );
                if ( $elements->length ) {
                    if ( $elements->length ) {
                        $ele = $elements->item(0);
                        $title = $ele->textContent;
                        $children = $ele->childNodes;
                        if (! $title && $children->length ) {
                            $title = $this->get_title_from_node( $ele->childNodes, $title );
                        }
                        if ( $title && $remove_title ) {
                            $ele->parentNode->removeChild( $ele );
                            $data = html_entity_decode( $dom->saveHTML(), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, 'UTF-8' );
                            $dom->loadHTML( mb_encode_numericentity( $data, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT );
                            $extractor = new ExtractContent( $data );
                            $extractor->dom = $dom;
                            $finder = new DomXPath( $dom );
                        }
                    }
                } else {
                    try {
                        $title = $finder->evaluate( $title_option );
                    } catch ( Exception $e ) {
                        // trigger_error( $e->getMessage() );
                    }
                    if ( is_object( $title ) ) {
                        if ( $title->length ) {
                            $ele = $title->item(0);
                            $title = $ele->textContent;
                        } else {
                            $title = '';
                        }
                    }
                }
            }
            if (! $title ) {
                $error = $migrator->print( "Could not extract column '%s'.", $title_col, $this, true );
                $import_results[ $url_key ]['errors'][] = $error;
            }
            if (! $title ) {
                $elements = $dom->getElementsByTagName( 'title' );
                if ( $elements->length ) {
                    $ele = $elements->item(0);
                    $title = $ele->nodeValue;
                }
            }
            if ( is_object( $title ) ) {
                $title = ''; // TODO
            }
            $title = str_replace( ["\r", "\n"], '', $title );
            $import_results[ $url_key ]['primary'] = $title;
            if ( $app->param( 'html_meta_description' ) ) {
                if ( $meta_elements->length ) {
                    $i = $meta_elements->length - 1;
                    for ( $i = 0; $i < $meta_elements->length; $i++ ) {
                        $ele = $meta_elements->item( $i );
                        $name = strtolower( $ele->getAttribute( 'name' ) );
                        if ( $name && $name == 'description' ) {
                            $description = $ele->getAttribute( 'content' );
                            break;
                        }
                    }
                }
            }
            if ( $app->param( 'html_meta_keywords' ) || $app->param( 'html_meta_tags' ) ) {
                if ( $meta_elements->length ) {
                    for ( $i = 0; $i < $meta_elements->length; $i++ ) {
                        $ele = $meta_elements->item( $i );
                        $name = strtolower( $ele->getAttribute( 'name' ) );
                        if ( $name && $name == 'keywords' ) {
                            $keywords = trim( $ele->getAttribute( 'content' ) );
                            break;
                        }
                    }
                }
            }
            if ( $meta_ogimage ) {
                if ( $meta_elements->length ) {
                    for ( $i = 0; $i < $meta_elements->length; $i++ ) {
                        $ele = $meta_elements->item( $i );
                        $property = strtolower( $ele->getAttribute( 'property' ) );
                        if ( $property && $property == 'og:image' ) {
                            $og_image = trim( $ele->getAttribute( 'content' ) );
                            break;
                        }
                    }
                }
            }
            if ( $body_perttern == 'css' ) {
                $body_option = PTUtil::selector2xpath( $body_option );
                $body_perttern = 'xpath';
            }
            if ( $body_perttern == 'start_end' ) {
                preg_match( "/{$body_start}(.*?){$body_end}/si",  $data, $matches );
                $body = isset( $matches[1] ) ? $matches[1] : '';
            } else if ( $body_perttern == 'regex' ) {
                preg_match( "$body_option",  $data, $matches );
                $body = isset( $matches[1] ) ? $matches[1] : '';
            } else if ( $body_perttern == 'xpath' ) {
                $elements = $finder->query( $body_option );
                $comments = $finder->query( '//comment()' );
                if ( $comments->length ) {
                    for ( $i = 0; $i < $comments->length; $i++ ) {
                        $ele = $comments->item( $i );
                        if ( preg_match( '/&#[0-9]{1,};/', $ele->textContent ) ) {
                            $parent = $ele->parentNode;
                            $no_entities = html_entity_decode( $ele->textContent, ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, 'UTF-8' );
                            $parent->replaceChild( $dom->createComment( $no_entities ), $ele );
                        }
                    }
                }
                if (! is_object( $elements ) || ! $elements->length ) {
                    try {
                        $elements = $finder->evaluate( $body_option );
                        if ( is_string( $elements ) ) {
                            $body = $elements;
                            $elements = null;
                        }
                    } catch ( Exception $e ) {
                        // trigger_error( $e->getMessage() );
                    }
                }
                if ( is_object( $elements ) && $elements->length ) {
                    for ( $i = 0; $i < $elements->length; $i++ ) {
                        $ele = $elements->item( $i );
                        $body .= $this->innerHTML( $ele );
                    }
                }
            } else if ( $body_perttern == 'auto' ) {
                // $extractor = new ExtractContent( $data );
                // $extractor->dom = $dom;
                $content = $extractor->get_main();
                $body = $content;
            } else if ( $body_perttern == 'all_html' ) {
                $body = $data;
            }
            if (! $body ) {
                $error = $migrator->print( "Could not extract column '%s'.", $body_col, $this, true );
                $import_results[ $url_key ]['errors'][] = $error;
            } else {
                $body = $this->removeTags( $body );
            }
            $field_values = [ $title_col => $title ];
            if ( $body_col ) {
                $field_values[ $body_col ] = $body;
            }
            if ( $entry->has_column( 'keywords' ) && $app->param( 'html_meta_keywords' ) ) {
                $field_values['keywords'] = $keywords;
            }
            if ( $app->param( 'html_meta_description' ) ) {
                if ( $entry->has_column( 'excerpt' ) ) {
                    $field_values['excerpt'] = $description;
                } else if ( $entry->has_column( 'description' ) ) {
                    $field_values['description'] = $description;
                }
            }
            // $base = dirname( $url ) . '/';
            // $target_site_path = preg_replace( '!(^https{0,1}://[^/]+?/).*$!', '$1', $url );
            foreach ( $field_settings as $field_setting ) {
                $field_setting = ltrim( $field_setting );
                if (! $field_setting ) {
                    continue;
                }
                $parts = explode( '=', $field_setting );
                $column_name = array_shift( $parts );
                $condition = implode( '=', $parts );
                if (! $condition ) continue;
                $match_all = false;
                $match_join = '';
                $perttern = '';
                if ( strpos( $condition, '!' ) === 0 ) {
                    $perttern = 'regex';
                    $condition = $this->sanitize_regex( $condition );
                    if ( preg_match( '/a[^!]*$/', $condition, $match ) ) {
                        $condition = preg_replace( '/a[^!]*$/', '', $condition );
                        $match_join = ltrim( $match[0], 'a' );
                        if ( $match_join == '\\n' ) {
                            $match_join = PHP_EOL;
                        }
                        $match_all  = true;
                    }
                } else if ( strpos( $condition, '/' ) === 0 || 
                  ( mb_substr_count( $condition, ',' ) !== 1
                    && strpos( $condition, '//' ) !== false ) ) {
                    $perttern = 'xpath';
                } else if ( strpos( $condition, ',' ) !== false ) {
                    $perttern = 'start_end';
                } else {
                    // $perttern = 'css';
                    $condition = PTUtil::selector2xpath( $condition );
                    $perttern = 'xpath';
                }
                if (! $perttern ) continue;
                $col_type = $column_defs[ $column_name ]['type'] ?? '';
                $edit_prop = isset( $edit_properties[ $column_name ] ) ? $edit_properties[ $column_name ] : '';
                $value = '';
                if ( $perttern == 'start_end' ) {
                    list( $colStart, $colEnd ) = explode( ',', $condition );
                    $colStart = preg_quote( $colStart, '/' );
                    $colEnd = preg_quote( $colEnd, '/' );
                    @preg_match( "/{$colStart}(.*?){$colEnd}/si", $data, $matches );
                    $value = isset( $matches[1] ) ? $matches[1] : '';
                } else if ( $perttern == 'regex' ) {
                    if ( $match_all ) {
                        @preg_match_all( "$condition",  $data, $matches );
                        if ( isset( $matches[1] ) ) {
                            $value = implode( $match_join, $matches[1] );
                        }
                    } else {
                        @preg_match( "$condition",  $data, $matches );
                        $value = isset( $matches[1] ) ? $matches[1] : '';
                    }
                } else if ( $perttern == 'xpath' ) {
                    $elements = $finder->query( $condition );
                    if ( $elements === false || ! $elements->length ) {
                        try {
                            $value = $finder->evaluate( $condition );
                            if ( is_object( $value ) ) {
                                if ( $value->length ) {
                                    $ele = $value->item(0);
                                    $value = $ele->textContent;
                                } else {
                                    $value = '';
                                }
                            }
                        } catch ( Exception $e ) {
                            // trigger_error( $e->getMessage() );
                        }
                    }
                    if ( $elements !== false && $elements->length ) {
                        $i = $elements->length - 1;
                        for ( $i = 0; $i < $elements->length; $i++ ) {
                            $ele = $elements->item( $i );
                            if ( get_class( $ele ) == 'DOMText' ) {
                                $value .= $ele->textContent;
                            } else if ( property_exists( $ele, 'tagName' ) &&
                                $ele->tagName == 'meta' || $ele->tagName == 'img'
                                || $ele->tagName == 'a' ) {
                                if ( $col_type == 'blob' ) {
                                    $path = '';
                                    if ( $ele->tagName == 'meta' ) {
                                        $path = trim( $ele->getAttribute( 'content' ) );
                                    } else if ( $ele->tagName == 'img' ) {
                                        $path = trim( $ele->getAttribute( 'src' ) );
                                        if (! $path ) {
                                            $path = trim( $ele->getAttribute( 'data-src' ) );
                                            if ( $path ) {
                                                $ele->setAttribute( 'src', $path );
                                            }
                                        }
                                    } else if ( $ele->tagName == 'a' ) {
                                        $path = trim( $ele->getAttribute( 'href' ) );
                                    }
                                    if ( strpos( $path, '?' ) !== false ) {
                                        list( $path, $_param ) = explode( '?', $path );
                                    }
                                    if ( strpos( $path, '#' ) !== false ) {
                                        list( $path, $_param ) = explode( '#', $path );
                                    }
                                    $attach_label = '';
                                    if ( $ele->tagName == 'img' || $ele->tagName == 'a' ) {
                                        if ( $import_type == 'url' ) {
                                            $path = $extractor->convert2url( $path, $base );
                                        } else {
                                            if ( preg_match( '/^.\//', $path ) ) {
                                                $path = preg_replace( '/^.\//', '', $path );
                                            }
                                            if ( strpos( $path, '.' ) === 0 ) {
                                                $path = dirname( $url ) . DS . $path;
                                            } else if ( strpos( $path, '/' ) === 0 ) {
                                                $search = preg_quote( $path, '/' );
                                                foreach ( $asset_paths as $file_path ) {
                                                    if ( preg_match( "/{$search}$/", $file_path ) ) {
                                                        $path = $file_path;
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        if ( $ele->tagName == 'img' ) {
                                            $attach_label = trim( $ele->getAttribute( 'alt' ) );
                                        } else if ( $ele->tagName == 'a' ) {
                                            $attach_label = trim( strip_tags( $this->innerHTML( $ele ) ) );
                                        }
                                    }
                                    $attach_label = $attach_label ? $attach_label : basename( $path );
                                    if ( $app->is_valid_url( $path ) || file_exists( $path ) ) {
                                        $attachment_labels[ $column_name ] = $attach_label;
                                        $attachment_basenames[ $column_name ] = basename( $path );
                                        // $value = @file_get_contents( $path, false, $http_options );
                                        $value = $this->file_get_contents( $path, $http_options, $app );
                                        break;
                                    }
                                }
                            }
                            if ( isset( $relations[ $column_name ] ) ) {
                                $value = $this->innerHTML( $ele );
                                if ( isset( $field_values[ $column_name ] ) ) {
                                    $field_values[ $column_name ][] = $value;
                                } else {
                                    $field_values[ $column_name ] = [ $value ];
                                }
                            } else {
                                $value .= $this->innerHTML( $ele );
                            }
                            if ( $col_type === 'datetime' ) {
                                break;
                            }
                        }
                    }
                }
                if ( isset( $relations[ $column_name ] ) ) {
                    if ( $value ) {
                        $field_values[ $column_name ] = is_array( $value ) ? $value : [ $value ];
                    }
                } else {
                    if ( isset( $field_values[ $column_name ] ) ) {
                        $field_values[ $column_name ] = $field_values[ $column_name ] . $value;
                    } else {
                        $field_values[ $column_name ] = $value;
                    }
                }
                if (! $field_values[ $column_name ] ) {
                    $error = $migrator->print( "Could not extract column '%s'.", $column_name, $this, true );
                    $import_results[ $url_key ]['errors'][] = $error;
                }
            }
            $binaries = [];
            $file_full_paths = [];
            $has_relations = false;
            foreach ( $field_values as $column_name => $field_value ) {
                if ( $entry->has_column( $column_name ) ) {
                    if ( is_array( $field_value ) && isset( $relations[ $column_name ] ) ) {
                        $has_relations = true;
                        continue;
                    }
                    $col_type = $column_defs[ $column_name ]['type'];
                    $edit_prop = isset( $edit_properties[ $column_name ] ) ? $edit_properties[ $column_name ] : '';
                    if ( $edit_prop == 'primary' || $edit_prop == 'text' || $edit_prop == 'text_short' ) {
                        $field_value = trim( $field_value );
                        $field_value = str_replace( ["\r", "\n"], '', $field_value );
                    } else if ( $col_type == 'text' || $edit_prop == 'textarea' || $edit_prop == 'textarea' ) {
                        if ( $minifying_html ) {
                            $field_value = smarty_outputfilter_trimwhitespace( $field_value );
                        }
                    } else if ( $col_type == 'blob' && $field_value ) {
                        $blob_column = $app->db->model( 'column' )->get_by_key(
                            ['table_id' => $table->id, 'name' => $column_name ] );
                        $blob_extra = $blob_column->extra;
                        $upload_dir = $app->upload_dir();
                        $basename = $attachment_basenames[ $column_name ];
                        $asset_path = $upload_dir. DS . $basename;
                        $app->fmgr->put( $asset_path, $field_value );
                        $error = '';
                        $res = PTUtil::upload_check( $blob_extra, $asset_path, false, $error );
                        if ( $res == 'resized' ) {
                            $error = $migrator->print( "The image (%s) was larger than the size limit, so it was reduced.", $basename, $app );
                            $import_results[ $url_key ]['errors'][] = $error;
                        } else if ( $error ) {
                            $migrator->print( $error, '', null, true );
                            $import_results[ $url_key ]['errors'][] = $error;
                            $field_value = null;
                            continue;
                        }
                        $binaries[ $column_name ] = ['path' => $asset_path, 'label' => $attachment_labels[ $column_name ] ];
                        continue;
                    } else if ( stripos( $col_type, 'date' ) === 0 ) {
                        if ( $field_value ) {
                            $field_value = $this->str2DateTime( $field_value );
                        }
                    }
                    $field_value = trim( $field_value );
                    $entry->$column_name( $field_value );
                } else {
                    if ( stripos( $column_name, 'field.' ) === 0 ) {
                        $field_value = trim( $field_value );
                        if ( $minifying_html ) {
                            $field_value = smarty_outputfilter_trimwhitespace( $field_value );
                        }
                        $column_name = preg_replace( '/^field\./', '', $column_name );
                        $field_vars[ $column_name ] = $field_value;
                    } else {
                        continue;
                    }
                }
                if (! $import_assets ) {
                    continue;
                }
                if ( is_array( $field_value ) || !$field_value ) {
                    continue;
                }
                $dom_changed = false;
                $_dom = PTUtil::loadHTML( $field_value );
                if (! $_dom ) {
                    continue;
                }
                $import_elements = [];
                $elements = $_dom->getElementsByTagName( 'img' );
                if ( $elements->length ) {
                     for ( $i = 0; $i < $elements->length; $i++ ) {
                        $source = $elements->item( $i );
                        $import_elements[] = $source;
                        $src_urls = $source->getAttribute( 'srcset' );
                        if ( $src_urls ) {
                            $src_urls = explode( ',', $src_urls );
                            foreach ( $src_urls as $src_u ) {
                                $src_u = trim( $src_u );
                                if ( strpos( $src_u, ' ' ) !== false ) {
                                    $parts = preg_split( '/\s+/', $src_u );
                                    $src_u = $parts[0];
                                }
                                $newEle = $_dom->createElement( 'img' );
                                $newEle->setAttribute( 'src', $src_u );
                                $import_elements[] = $newEle;
                            }
                        }
                    }
                }
                if ( $asset_exts ) {
                    $elements = $_dom->getElementsByTagName( 'a' );
                    if ( $elements->length ) {
                        for ( $i = 0; $i < $elements->length; $i++ ) {
                            $ele = $elements->item( $i );
                            $src_url = $ele->getAttribute( 'href' );
                            if ( strpos( $src_url, '?' ) !== false ) {
                                list( $src_url, $_param ) = explode( '?', $src_url );
                            }
                            if ( strpos( $src_url, '#' ) !== false ) {
                                list( $src_url, $_param ) = explode( '#', $src_url );
                            }
                            $ext = preg_replace("/^.*\.([^\.].*$)/is", '$1', basename( $src_url ) );
                            if ( in_array( $ext, $asset_extensions ) ) {
                                $import_elements[] = $ele;
                            }
                        }
                    }
                }
                $elements = $_dom->getElementsByTagName( 'source' );
                if ( $elements->length ) {
                     for ( $i = 0; $i < $elements->length; $i++ ) {
                        $source = $elements->item( $i );
                        $src_urls = $source->getAttribute( 'srcset' );
                        if ( $src_urls ) {
                            $src_urls = explode( ',', $src_urls );
                            foreach ( $src_urls as $src_u ) {
                                $src_u = trim( $src_u );
                                if ( strpos( $src_u, ' ' ) !== false ) {
                                    $parts = preg_split( '/\s+/', $src_u );
                                    $src_u = $parts[0];
                                }
                                $newEle = $_dom->createElement( 'img' );
                                $newEle->setAttribute( 'src', $src_u );
                                $import_elements[] = $newEle;
                            }
                        }
                    }
                }
                if ( $og_image ) {
                    array_unshift( $import_elements, $og_image );
                }
                $asset_cnt = 0;
                foreach ( $import_elements as $ele ) {
                    $tagName = '';
                    $label = '';
                    if ( $og_image && ! $asset_cnt ) {
                        $label = $title;
                        $og_image = '';
                    }
                    $asset_cnt++;
                    if ( is_string( $ele ) ) {
                        $src_url = $ele;
                    } else {
                        $tagName = $ele->tagName;
                        $src_url = $tagName == 'a' ? $ele->getAttribute( 'href' )
                                                   : $ele->getAttribute( 'src' );
                        if (! $src_url && $tagName != 'a' ) {
                            $src_url = $ele->getAttribute( 'data-src' );
                            if ( $src_url ) {
                                $ele->setAttribute( 'src', $src_url );
                                $dom_changed = true;
                            }
                        }
                    }
                    $origURL = $src_url;
                    if ( $src_url && strpos( $src_url, 'mailto:' ) !== 0 && strpos( $src_url, 'data:' ) !== 0
                        && strpos( $src_url, 'javascript:' ) !== 0 && strpos( $src_url, '#' ) !== 0 ) {
                        if ( strpos( $src_url, '?' ) !== false ) {
                            list( $src_url, $_param ) = explode( '?', $src_url );
                        }
                        if ( strpos( $src_url, '#' ) !== false ) {
                            list( $src_url, $_param ) = explode( '#', $src_url );
                        }
                        $error = '';
                        $asset_path = '';
                        if ( $import_type == 'url' ) {
                            $src_url = $extractor->convert2url( $src_url, $base );
                        } else {
                            if ( preg_match( '/^.\//', $src_url ) ) {
                                $src_url = preg_replace( '/^.\//', '', $src_url );
                            }
                            if ( strpos( $src_url, '.' ) === 0 ) {
                                $src_url = dirname( $url ) . DS . $src_url;
                                $asset_path = $src_url;
                            }
                            $search = preg_quote( $src_url, '/' );
                            foreach ( $asset_paths as $file_path ) {
                                if ( preg_match( "/{$search}$/", $file_path ) ) {
                                    $res = PTUtil::upload_check( $asset_extra, $file_path, false, $error );
                                    if ( $res == 'resized' ) {
                                        $error = $migrator->print( "The image (%s) was larger than the size limit, so it was reduced.", basename( $file_path ), $app );
                                        $import_results[ $url_key ]['errors'][] = $error;
                                    } else if ( $error ) {
                                        $migrator->print( $error, '', null, true );
                                        $import_results[ $url_key ]['errors'][] = $error;
                                        $i -= 1;
                                        continue;
                                    }
                                    $asset_path = $file_path;
                                    unset( $insert_asset_paths[ $file_path ] );
                                    break;
                                }
                            }
                        }
                        $ext = PTUtil::get_extension( basename( $src_url ), true );
                        if (! $ext || in_array( $ext, $denied_exts ) ) {
                            $error = $migrator->print( "The import is skipped because the file (%s) is not allowed.", $src_url, $this, true );
                            $import_results[ $url_key ]['errors'][] = $error;
                            $i -= 1;
                            continue;
                        }
                        $http_get = false;
                        $extra_path = '';
                        if ( strpos( $src_url, 'http' ) === 0 ) {
                            $http_get = true;
                            $extra_path = dirname( preg_replace( '!^https{0,1}:\/\/[^\/]*?\/!', '', $src_url ) );
                            // $asset_data = @file_get_contents( $src_url, false, $http_options, 0, 1 );
                            $asset_data = $this->url_existing( $src_url, $http_options, $app );
                            // Existing check...
                            if ( $asset_data === false ) {
                                $error = $migrator->print( "The import is skipped because file was not found '%s'.", $origURL, $this, true );
                                $import_results[ $url_key ]['errors'][] = $error;
                                $i -= 1;
                                continue;
                            }
                            $upload_dir = $app->upload_dir();
                            $asset_path = $upload_dir. DS . basename( $src_url );
                            // file_put_contents( $asset_path, $asset_data );
                        }
                        if ( strpos( $extra_path, $top_level ) === 0 ) {
                            // Sub directory of Site URL.
                            $extra_path = preg_replace( "/^{$top_level_q}/", '', $extra_path );
                        }
                        if (! $http_get ) {
                            if ( $import_type == 'url' ) {
                                $extra_path = $this->get_extra_path( $src_url, $site_path, $import_type );
                            } else {
                                $extra_path = $this->get_extra_path( $asset_path, $site_path, $import_type );
                            }
                        }
                        if (! $asset_path ) {
                            $error = $migrator->print( "The import is skipped because file was not found '%s'.", $origURL, $this, true );
                            $import_results[ $url_key ]['errors'][] = $error;
                            $i -= 1;
                            continue;
                        }
                        if (! $extra_path ) {
                            $extra_path = $asset_extra_path;
                        }
                        $app->sanitize_dir( $extra_path );
                        $printPath = htmlspecialchars( $extra_path . basename( $asset_path ) );
                        $file_full_path = $asset_fullpath . DS . $extra_path . basename( $asset_path );
                        if ( is_numeric( $app->asset_workspace_id ) ) {
                            // Support asset_workspace_id.
                            $asset = $app->db->model( 'asset' )->get_by_key(
                               ['extra_path' => $extra_path,
                                'file_name' => basename( $asset_path ),
                                'workspace_id' => $app->asset_workspace_id,
                                'rev_type' => 0]
                            );
                        } else {
                            $asset = $app->db->model( 'asset' )->get_by_key(
                               ['extra_path' => $extra_path,
                                'file_name' => basename( $asset_path ),
                                'workspace_id' => $workspace_id,
                                'rev_type' => 0]
                            );
                        }
                        if ( $tagName == 'a' ) {
                            $label = trim( $ele->textContent ) ? trim( $ele->textContent ) : basename( $asset_path );
                        } else if ( $tagName == 'img' ) {
                            $label = $ele->getAttribute( 'alt' ) ? $ele->getAttribute( 'alt' ) : basename( $asset_path );
                        } else {
                            $label = $label ? $label : basename( $asset_path );
                        }
                        if ( $asset->id || $app->fmgr->exists( $file_full_path ) || isset( $file_full_paths[ $file_full_path ] ) ) {
                            if ( $asset->id ) {
                                $asset_ids[] = (int) $asset->id;
                                if (! in_array( $asset->id, $imported_asset_ids ) ) {
                                    $migrator->print( "The import is skipped because the asset '%s' exists.", $printPath, $this );
                                }
                            }
                            $i -= 1;
                            $url_obj = $app->db->model( 'urlinfo' )->load( [
                                'model' => 'asset', 'file_path' => $file_full_path, 'class' => 'file'] );
                            if ( is_array( $url_obj ) && ! empty( $url_obj ) ) {
                                $url_obj = $url_obj[0];
                                $newURL = $url_obj->url;
                                $newURL = preg_replace( '!^https{0,1}://.*?/!', '/', $newURL );
                                if ( $origURL != $newURL ) {
                                    if ( $tagName == 'a' ) {
                                        $replaced_href[ $origURL ] = $newURL;
                                    } else if ( $tagName == 'img' ) {
                                        $replaced_url[ $origURL ] = $newURL;
                                    }
                                }
                            }
                            continue;
                        }
                        $file_full_paths[ $file_full_path ] = true;
                        if ( strpos( $src_url, 'http' ) === 0 ) {
                            // $asset_data = @file_get_contents( $src_url, false, $http_options );
                            $asset_data = $this->file_get_contents( $src_url, $http_options, $app );
                            if (! $asset_data ) {
                                $error = $migrator->print( "The import is skipped because file was not found '%s'.", $origURL, $this, true );
                                $import_results[ $url_key ]['errors'][] = $error;
                                $i -= 1;
                                continue;
                            }
                            $app->fmgr->put( $asset_path, $asset_data );
                            $res = PTUtil::upload_check( $asset_extra, $asset_path, false, $error );
                            if ( $res == 'resized' ) {
                                $error = $migrator->print( "The image (%s) was larger than the size limit, so it was reduced.", basename( $asset_path ), $app );
                                $import_results[ $url_key ]['errors'][] = $error;
                            } else if ( $error ) {
                                $migrator->print( $error, '', null, true );
                                $import_results[ $url_key ]['errors'][] = $error;
                                $i -= 1;
                                continue;
                            }
                        }
                        $logging = $app->logging;
                        $app->logging = false;
                        $error_reporting = ini_get( 'error_reporting' ); 
                        error_reporting(0);
                        $metadata = PTUtil::get_upload_info( $app, $asset_path, $error );
                        $app->logging = $logging;
                        error_reporting( $error_reporting );
                        if ( $error ) {
                            $error = $migrator->print( "The import is skipped because error occurred while importing '%s'.", $printPath, $this, true );
                            $import_results[ $url_key ]['errors'][] = $error;
                            $i -= 1;
                            continue;
                        }
                        $metadata = $metadata['metadata'];
                        $asset->label( $label );
                        $this->set_asset_meta( $asset, $metadata );
                        if (! isset( $asset_data ) ) {
                            if ( file_exists( $asset_path ) ) {
                                $asset_data = @file_get_contents( $asset_path );
                            }
                        }
                        $asset->file( $asset_data );
                        $app->set_default( $asset );
                        $saved = $asset->save();
                        if (! $saved ) {
                            $error = $migrator->print( "The import is skipped because error occurred while importing '%s'.", $printPath, $this, true );
                            $import_results[ $url_key ]['errors'][] = $error;
                            $i -= 1;
                            continue;
                        }
                        PTUtil::file_attach_to_obj ( $app, $asset, 'file', $asset_path, $label, $error );
                        $app->publish_obj( $asset );
                        $url_obj = $app->db->model( 'urlinfo' )->load( [
                            'model' => 'asset', 'object_id' => $asset->id, 'class' => 'file'] );
                        if ( is_array( $url_obj ) && ! empty( $url_obj ) ) {
                            $url_obj = $url_obj[0];
                            $newURL = $url_obj->url;
                            $newURL = preg_replace( '!^https{0,1}://.*?/!', '/', $newURL );
                            if ( $origURL != $newURL ) {
                                if ( $tagName == 'a' ) {
                                    $replaced_href[ $origURL ] = $newURL;
                                } else {
                                    $replaced_url[ $origURL ] = $newURL;
                                }
                            }
                        }
                        $migrator->print( $app->translate( 'Create %s (%s / ID : %s).', [ $app->translate('Asset'), $printPath, $asset->id ] ) );
                        $asset_ids[] = (int) $asset->id;
                    }
                    $i -= 1;
                }
                if ( $dom_changed ) {
                    $field_value = PTUtil::saveHTML( $_dom );
                    $field_vars[ $column_name ] = $field_value;
                }
                if ( count( $replaced_url ) ) {
                    foreach ( $replaced_url as $old => $new ) {
                        if ( mb_substr_count( $field_value, $old ) ) {
                            if ( mb_substr_count( $field_value, $old ) == 1 ) {
                                $field_value = str_replace( $old, $new, $field_value );
                            } else {
                                $regex = preg_quote( $old, '/' );
                                $regex = "/(src=['\"]{0,1}){$regex}(['\"]{0,1})/si";
                                $field_value = preg_replace( $regex, "$1$new$2", $field_value );
                            }
                        }
                    }
                }
                if ( $app->htmlimporter_href_to_relative ) {
                    $elements = $_dom->getElementsByTagName( 'a' );
                    if ( $elements->length ) {
                        for ( $i = 0; $i < $elements->length; $i++ ) {
                            // Replace inner links to relative url.
                            $ele = $elements->item( $i );
                            $src_url = $ele->getAttribute( 'href' );
                            $_param = '';
                            if ( strpos( $src_url, '?' ) !== false ) {
                                list( $src_url, $_param ) = explode( '?', $src_url );
                                $_param = "?{$_param}";
                            }
                            if ( strpos( $src_url, '#' ) !== false ) {
                                list( $src_url, $_param ) = explode( '#', $src_url );
                                $_param = "#{$_param}";
                            }
                            if (! isset( $replaced_href[ $src_url ] ) && strpos( $src_url, 'mailto:' ) !== 0
                                && strpos( $src_url, 'data:' ) !== 0
                                && strpos( $src_url, 'javascript:' ) !== 0 && strpos( $src_url, '#' ) !== 0 ) {
                                $new_url = $extractor->convert2url( $src_url, $base );
                                if ( strpos( $new_url, $target_site_path ) === 0 ) {
                                    $new_url = preg_replace( '!^https{0,1}://[^/]*?/!', '/', $new_url );
                                    $replaced_href[ $src_url ] = $new_url;
                                }
                            } else if ( $_param ) {
                                $new_url = $extractor->convert2url( $src_url, $base );
                                if ( strpos( $new_url, $target_site_path ) === 0 ) {
                                    $new_url = preg_replace( '!^https{0,1}://[^/]*?/!', '/', $new_url );
                                    $replaced_href[ $src_url . $_param ] = $new_url . $_param;
                                }
                            }
                        }
                    }
                }
                if ( count( $replaced_href ) ) {
                    // Sort by long key.
                    $replaced_href_len = [];
                    foreach ( $replaced_href as $key => $value ) {
                        $replaced_href_len[ $key ] = strlen( $key );
                    }
                    arsort( $replaced_href_len );
                    $_replaced_href = [];
                    foreach ( $replaced_href_len as $key => $len ) {
                        $_replaced_href[ $key ] = $replaced_href[ $key ];
                    }
                    $replaced_href = $_replaced_href;
                    foreach ( $replaced_href as $old => $new ) {
                        if ( mb_substr_count( $field_value, $old ) ) {
                            if ( mb_substr_count( $field_value, $old ) == 1 ) {
                                $field_value = str_replace( $old, $new, $field_value );
                            } else {
                                $regex = preg_quote( $old, '/' );
                                $regex = "/(href=['\"]{0,1}){$regex}(['\"]{0,1})/si";
                                $field_value = preg_replace( $regex, "$1$new$2", $field_value );
                            }
                        }
                    }
                }
                if ( $entry->has_column( $column_name ) ) {
                    if ( isset( $column_defs[ $column_name ] )
                        && isset( $column_defs[ $column_name ]['type'] ) && $column_defs[ $column_name ]['type'] === 'int' ) {
                        if ( isset( $edit_properties[ $column_name ] )
                            && strpos( $edit_properties[ $column_name ], 'relation' ) === 0 ) {
                            list( $relType, $relModel, $relCol ) = explode( ':', $edit_properties[ $column_name ] );
                            $relTable = $app->get_table( $relModel );
                            if ( $relTable ) {
                                $relTerms = [ $relCol => $field_value ];
                                if ( $app->db->model( $relModel )->has_column( 'workspace_id' ) ) {
                                    $relTerms['workspace_id'] = $workspace_id;
                                }
                                $relObj = $app->db->model( $relModel )->get_by_key( $relTerms, null, 'id' );
                                if ( $relObj->id ) {
                                    $field_value = (int) $relObj->id;
                                } else {
                                    $field_value = (int) $field_value;
                                }
                            } else {
                                $field_value = (int) $field_value;
                            }
                        }
                    }
                    $entry->$column_name( $field_value );
                } else {
                    $field_vars[ $column_name ] = $field_value;
                }
            }
            if ( $entry->has_column( 'text_format' ) ) {
                $entry->text_format( $text_format );
            }
            $extra_path = '';
            if ( $import_type == 'url' ) {
                $rel_path = preg_replace( '!^https{0,1}://.*?/!', '', $url );
                if ( strpos( $rel_path, '/' ) !== false ) {
                    $extra_path = dirname( preg_replace( '!^https{0,1}://.*?/!', '', $url ) );
                }
            } else {
                $begin = preg_quote( $import_base, '/' );
                $extra_path = dirname( preg_replace( "/^{$begin}/", '', $url ) );
                $extra_path = str_replace( DS, '/', $extra_path );
                $extra_paths = explode( '/', $extra_path );
                $first = array_shift( $extra_paths );
                if (! $first ) {
                    array_shift( $extra_paths );
                }
                $extra_path = implode( '/', $extra_paths );
            }
            if ( $extra_path ) {
                if ( stripos( $extra_path, $site_path ) === 0 ) {
                    $search = preg_quote( $site_path, '/' );
                    $extra_path = preg_replace( "/^{$search}/", '', $extra_path );
                    $extra_path = ltrim( $extra_path, '/' );
                }
                $extra_path = ltrim( $extra_path, '/' );
                $extra_path = $app->sanitize_dir( $extra_path );
            }
            if ( $entry->has_column( 'extra_path' ) && ! $entry->extra_path ) {
                $entry->extra_path( $extra_path );
            }
            $lastCat = null;
            if ( $app->param( 'html_create_categories' ) && $extra_path
                && $model_type == 'entry' ) {
                $extra_path = rtrim( $extra_path, '/' );
                $extra_paths = explode( '/', $extra_path );
                $catModel = $model == 'entry' ? 'category' : 'folder';
                $parent_id = 0;
                $terms = [];
                $terms['workspace_id'] = $workspace_id;
                foreach ( $extra_paths as $path ) {
                    $terms['basename'] = $path;
                    $terms['parent_id'] = $parent_id;
                    $caching = $app->db->caching;
                    $q_caching = $app->db->query_cache;
                    $app->db->caching = false;
                    $app->db->query_cache = false;
                    $cat = $app->db->model( $catModel )->get_by_key( $terms );
                    if (! $cat->id ) {
                        $label = $app->translate( $path , '', $app, 'default' );
                        $cat->label( $app->translate( $label ) );
                        $app->set_default( $cat );
                        $cat->save();
                    }
                    $app->db->caching = $caching;
                    $app->db->query_cache = $q_caching;
                    $lastCat = $cat;
                    $parent_id = (int) $cat->id;
                }
                if ( $lastCat !== null ) {
                    if ( $model == 'page' ) {
                        $entry->folder_id( $lastCat->id );
                    }
                }
            }
            $basename_set = $entry->has_column( 'basename' ) && $entry->basename && !$app->htmlimporter_force_basename;
            $app->set_default( $entry );
            $entry->save();
            $add_categories = false;
            if ( $has_relations ) {
                foreach ( $field_values as $column_name => $field_value ) {
                    if ( $entry->has_column( $column_name ) ) {
                        if ( is_array( $field_value ) && isset( $relations[ $column_name ] ) ) {
                            $relModel = $relations[ $column_name ];
                            $relTable = $app->get_table( $relModel );
                            if (! $relTable || !$relTable->primary ) {
                                continue;
                            }
                            $relIds = [];
                            foreach ( $field_value as $field_var ) {
                                $relTerms = [ $relTable->primary => $field_var ];
                                if ( $app->db->model( $relModel )->has_column( 'workspace_id' ) ) {
                                    $relTerms['workspace_id'] = $workspace_id;
                                }
                                $relObj =  $app->db->model( $relModel )->get_by_key( $relTerms, null, 'id' );
                                if ( $relObj->id ) {
                                    $relIds[] = (int) $relObj->id;
                                }
                            }
                            if (! empty( $relIds ) ) {
                                if ( $relModel === 'category' ) {
                                    $add_categories = true;
                                }
                                $args = ['from_id' => $entry->id, 
                                         'name' => $column_name,
                                         'from_obj' => $model,
                                         'to_obj' => $relModel ];
                                $app->set_relations( $args, $relIds, false );
                            }
                        }
                    }
                }
            }
            if ( count( $asset_ids ) && $table->has_assets ) {
                $asset_ids = array_unique( $asset_ids );
                $args = ['from_id' => $entry->id, 
                         'name' => 'assets',
                         'from_obj' => $model,
                         'to_obj' => 'asset' ];
                $app->set_relations( $args, $asset_ids, true );
            }
            if ( $lastCat !== null && $model == 'entry' ) {
                $args = ['from_id' => $entry->id, 
                         'name' => 'categories',
                         'from_obj' => $model,
                         'to_obj' => 'category' ];
                $app->set_relations( $args, [ $lastCat->id ], $add_categories );
            }
            if ( count( $binaries ) ) {
                foreach ( $binaries as $binary => $props ) {
                    PTUtil::file_attach_to_obj(
                    $app, $entry, $binary, $props['path'], $props['label'] );
                }
            }
            if ( $app->param( 'html_meta_tags' ) && $keywords ) {
                $keywords = preg_split( '/\s*,\s*/', $keywords );
                $tag_ids = [];
                foreach ( $keywords as $tag ) {
                    $normalize = PTUtil::normalize( $tag );
                    $normalize = PTUtil::normalize_tag( $normalize );
                    if (! $normalize ) continue;
                    $terms = ['normalize' => $normalize, 'class' => $model ];
                    $terms['workspace_id'] = $workspace_id;
                    $tag_obj = $app->db->model( 'tag' )->get_by_key( $terms );
                    if (!$tag_obj->id ) {
                        $tag_obj->name( $tag );
                        $app->set_default( $tag_obj );
                        $order = $app->get_order( $tag_obj );
                        $tag_obj->order( $order );
                        $tag_obj->save();
                    }
                    $tag_ids[] = $tag_obj->id;
                }
                if ( count( $tag_ids ) ) {
                    $args = ['from_id' => $entry->id, 
                             'name' => 'tags',
                             'from_obj' => $model,
                             'to_obj' => 'tag' ];
                    $app->set_relations( $args, $tag_ids, false );
                }
            }
            $message = $is_new
                        ? $app->translate( 'Create %s (%s / ID : %s).',
                            [ $app->translate( $table->label ),
                              $entry->$title_col,
                              $entry->id ] )
                        : $app->translate( 'Update %s (%s / ID : %s).',
                            [ $app->translate( $table->label ),
                              $entry->$title_col,
                              $entry->id ] );
            $edit_link = $app->admin_url . '?__mode=view&_type=edit&_model=' . $model . '&id=' . $entry->id;
            if ( $workspace_id ) {
                $edit_link .= "&workspace_id={$workspace_id}";
            }
            $import_results[ $url_key ]['edit_link'] = $edit_link;
            $permalink = $app->get_permalink( $entry );
            if ( $permalink ) {
                $import_results[ $url_key ]['permalink'] = $permalink;
            }
            $message = "<a href='$edit_link' target='_blank'>{$message}</a>";
            $migrator->print( $message );
            if ( $idx !== $last ) {
                echo '<hr>';
            }
            $meta->object_id( $entry->id );
            $meta->save();
            if ( $entry->has_column( 'basename' ) && ! $basename_set ) {
                if ( strpos( $url, '?' ) !== false ) {
                    list( $url, $_param ) = explode( '?', $url );
                }
                $pathinfo = pathinfo( $url );
                $basename = isset( $pathinfo ) && $pathinfo['filename'] ? $pathinfo['filename'] : '';
                $basename = PTUtil::make_basename( $entry, $basename, true );
                $entry->basename( $basename );
                $entry->save();
            }
            if (! empty( $field_vars ) ) {
                PTUtil::set_object_fields( $entry, $field_vars );
            }
            $callback = ['name' => 'post_import', 'url' => $url, 'caller' => $this,
                         'data' => $data, 'format' => 'html', 'import_results' => $import_results,
                         'dom' => $dom, 'finder' => $finder, 'fields' => $field_vars ];
            $app->run_callbacks( $callback, $entry->_model, $entry, $original );
            $app->publish_obj( $entry );
            $import_results = $callback['import_results'];
            $counter++;
            if (! $is_new && $original ) {
                PTUtil::pack_revision( $entry, $original );
            }
        }
        $export_link = '';
        if ( $create_report ) {
            $magic = $app->magic();
            $result = $app->db->model( 'session' )->get_by_key( ['name' => $magic, 'user_id' => $app->user()->id, 'workspace_id' => $workspace_id, 'kind' => 'HT'] );
            $result->text( json_encode( $import_results ) );
            $result->save();
            $export_link = $app->admin_url . '?__mode=html_importer_report&session=' . $magic;
            if ( $workspace_id ) {
                $export_link .= "&workspace_id={$workspace_id}";
            }
            $message = $this->translate( '[ Export Report ]' );
            $export_link = $message = " <a href='$export_link' target='_blank'>{$message}</a>";
        }
        $migrator->end_import( $session, $counter, $obj_label_plural, $export_link );
    }

    function file_get_contents ( $url, $option, $app = null ) {
        if ( $this->import_type === 'zip' && is_file( $url ) ) {
            return @file_get_contents( $url );
        }
        if ( is_string( $option ) && $this->linkchecker ) {
            return $this->linkchecker->file_get_contents( $url, $option, $app );
        }
        return @file_get_contents( $url, false, $option );
    }

    function url_existing ( $url, $option, $app = null ) {
        if ( is_string( $option ) && $this->linkchecker ) {
            $app = Prototype::get_instance();
            $app->linkchecker_retry_outlink = true;
            return $this->linkchecker->url_existing( $url, $option, $app, true );
        }
        return @file_get_contents( $url, false, $option, 0, 1 );
    }

    function html_importer_report ( $app ) {
        $workspace_id = (int) $app->param( 'workspace_id' );
        $magic = $app->param( 'session' );
        $result = $app->db->model( 'session' )->get_by_key( ['name' => $magic, 'user_id' => $app->user()->id, 'workspace_id' => $workspace_id, 'kind' => 'HT'] );
        if (! $result->id ) {
            return $app->error( 'Invalid request.' );
        }
        $json = json_decode( $result->text, true );
        $upload_dir = $app->upload_dir();
        $ts = date( 'Y-m-d_H-i-s' );
        $csv_out = $upload_dir . DS . "html-import-report-{$ts}.csv";
        $encoding = $app->html_importer_report_encoding;
        $fp = fopen( $csv_out, 'w' );
        if ( $encoding && $encoding == 'Shift_JIS' ) {
            stream_filter_append( $fp, 'convert.iconv.UTF-8/CP932', STREAM_FILTER_WRITE );
        } else if ( $app->csv_with_bom ) {
            fwrite( $fp, '   ' );
        }
        $no_error = $this->translate( 'Found no errors.' );
        $first = ['URL', $app->translate( 'Primary' ), $this->translate( 'Edit URL' ),  $this->translate( 'Permalink' ), $app->translate( 'Error' ) ];
        fputcsv( $fp, $first, ',', '"' );
        foreach ( $json as $url => $data ) {
            $primary = $data['primary'] ?? '';
            $line = [];
            $line[] = $url;
            $line[] = $primary;
            $edit_link = $data['edit_link'] ?? '';
            $line[] = $edit_link;
            $permalink = $data['permalink'] ?? '';
            $line[] = $permalink;
            $errors = $data['errors'];
            $line[] = empty( $errors ) ? $no_error : implode( PHP_EOL, $errors );
            fputcsv( $fp, $line, ',', '"' );
        }
        fclose( $fp );
        if ( $encoding && $encoding == 'Shift_JIS' ) {
        } else if ( $app->csv_with_bom ) {
            $bom = pack( 'C*', 0xEF, 0xBB, 0xBF );
            $fp = fopen( $csv_out, 'r+b' );
            fseek( $fp, 0 );
            fwrite( $fp, $bom );
            fclose( $fp );
        }
        $result->remove();
        PTUtil::export_data( $csv_out );
    }

    function set_asset_meta ( &$asset, $metadata ) {
        $asset->mime_type( $metadata['mime_type'] );
        $asset->file_ext( $metadata['extension'] );
        $asset->size( $metadata['file_size'] );
        if ( isset( $metadata['image_width'] ) ) {
            $asset->image_width( $metadata['image_width'] );
        }
        if ( isset( $metadata['image_width'] ) ) {
            $asset->image_height( $metadata['image_height'] );
        }
        $asset->class( $metadata['class'] );
        return $asset;
    }

    function get_extra_path ( $url, $site_path, $type = 'url' ) {
        $app = Prototype::get_instance();
        if ( $type == 'url' ) {
            $extra_path = dirname( preg_replace( '!^https{0,1}://.*?/!', '', $url ) );
            if ( $extra_path == '.' ) {
                return '';
            }
            if ( stripos( $extra_path, $site_path ) === 0 ) {
                $search = preg_quote( $site_path, '/' );
                $extra_path = preg_replace( "/^{$search}/", '', $extra_path );
                $extra_path = ltrim( $extra_path, '/' );
            }
        } else {
            $begin = preg_quote( $this->session->value, '/' );
            $extra_path = dirname( preg_replace( "/^{$begin}/", '', $url ) );
            $extra_paths = explode( DS, $extra_path );
            $first = array_shift( $extra_paths );
            if (! $first ) {
                array_shift( $extra_paths );
            }
            $extra_path = implode( '/', $extra_paths );
            if ( stripos( $extra_path, $site_path ) === 0 ) {
                $search = preg_quote( $site_path, '/' );
                $extra_path = preg_replace( "/^{$search}/", '', $extra_path );
            }
        }
        $extra_path = ltrim( $extra_path, '/' );
        $i = 1; //
        while ( strpos( $extra_path, '../' ) !== false ) {
            $extra_path = preg_replace( '/[^\/|^\.]{1,}\/\.\.\//', '', $extra_path );
            $i++;
            if ( $i > 15 ) break;
        }
        if ( strpos( $extra_path, './' ) !== false ) {
            $extra_path = str_replace( './', '', $extra_path );
        }
        $extra_path = $app->sanitize_dir( $extra_path );
        $extra_path = str_replace( DS, '/', $extra_path );
        return $extra_path;
    }

    function innerHTML ( $element ) { 
        $innerHTML = ""; 
        $children  = $element->childNodes;
        foreach ( $children as $child ) { 
            $innerHTML .= $element->ownerDocument->saveHTML( $child );
        }
        return $innerHTML; 
    } 

    function get_title_from_node ( $children, &$title ) {
        for ( $i = 0; $i < $children->length; $i++ ) {
            $child = $children->item( $i );
            if ( $child->nodeName == '#comment' ) {
                continue;
            }
            $title .= trim( $child->textContent );
            if ( $child->nodeName == 'img' ) {
                $title .= trim( $child->getAttribute( 'alt' ) );
            }
            $grandchildren = $child->childNodes;
            if ( is_object( $grandchildren ) && $grandchildren->length ) {
                $this->get_title_from_node( $grandchildren, $title );
            }
        }
        return $title;
    }

    function sanitize_regex ( $str ) {
        if ( preg_match('!([a-zA-Z\s]+)$!s', $str, $matches ) && ( preg_match('/[eg]/', $matches[1] ) ) ) {
            $str = substr( $str, 0, - strlen( $matches[1] ) )
                 . preg_replace( '/[eg\s]+/', '', $matches[1] );
        }
        return $str;
    }

    function str2DateTime ( $date ) {
        $ts = '';
        $date = PTUtil::normalize( $date );
        $date = str_replace( ["\r", "\n"], '', $date );
        $date = str_replace( ' ', '', strip_tags( trim( $date ) ) );
        $Y = '';
        if ( preg_match( '/(令和|昭和|大正|明治)[0-9]+年/', $date ) ) {
            $date = preg_replace( '/(令和|昭和|大正|明治)[0-9]+年/', '', $date );
        }
        if ( preg_match( '/[0-9]{4}年/', $date ) ) {
            $date = preg_replace( '/^.*([0-9]{4}年)/', '$1', $date );
        }
        if ( preg_match( '/[0-9]{1,2}日/', $date ) ) {
            $date = preg_replace( '/([0-9]{1,2}日).*$/', '$1', $date );
        }
        if ( preg_match( '/[^0-9]{1,}/', $date ) ) {
            $parts = preg_split( '/[^0-9]{1,}/', $date );
            $Y = isset( $parts[0] ) ? $parts[0] : '';
            $m = isset( $parts[1] ) ? sprintf('%02d', $parts[1] ) : '';
            $d = isset( $parts[2] ) ? sprintf('%02d', $parts[2] ) : '';
            $H = isset( $parts[3] ) ? sprintf('%02d', $parts[3] ) : '00';
            $i = isset( $parts[4] ) ? sprintf('%02d', $parts[4] ) : '00';
            $s = isset( $parts[5] ) ? sprintf('%02d', $parts[5] ) : '00';
        } else if ( preg_match( '/^[0-9]{8,}$/', $date ) ) {
            $Y = substr( $date, 0, 4 );
            $m = substr( $date, 4, 2 );
            $d = substr( $date, 6, 2 );
            $H = substr( $date, 8, 2 ) ? substr( $date, 8, 2 ) : '00';
            $i = substr( $date, 10, 2 ) ? substr( $date, 10, 2 ) : '00';
            $s = substr( $date, 12, 2 ) ? substr( $date, 12, 2 ) : '00';
        }
        $mm = (int) $m;
        $dd = (int) $d;
        if (! $dd ) {
            $dd = 1;
            $d = '01';
        }
        $YY = (int) $Y;
        if ( $Y && checkdate( $mm, $dd, $YY ) ) {
            $ts = "$Y$m$d$H$i$s";
        } else {
            $ts = PTUtil::str_to_ts( $date );
        }
        return $ts;
    }

    private static function magic ( $content = '' ) {
        $magic = substr(
            str_shuffle( 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 10 );
        if ( strpos( $content, $magic ) !== false )
            return static::magic( $content );
        return $magic;
    }

    function removeTags ( $html ) {
        $html = preg_replace( '/<form[^>]*?>.*?<\/form>/si', '', $html );
        /*
        $html = preg_replace( '/<nav[^>]*?>.*?<\/nav>/si', '', $html );
        $html = preg_replace( '/<menu[^>]*?>.*?<\/menu>/si', '', $html );
        $html = preg_replace( '/<header[^>]*?>.*?<\/header>/si', '', $html );
        $html = preg_replace( '/<footer[^>]*?>.*?<\/footer>/si', '', $html );
        $html = preg_replace( '/<aside[^>]*?>.*?<\/aside>/si', '', $html );
        $html = preg_replace( '/<style[^>]*?>.*?<\/style>/si', '', $html );
        $html = preg_replace( '/<script[^>]*?>.*?<\/script>/si', '', $html );
        */
        $html = preg_replace( '/<noscript[^>]*?>.*?<\/noscript>/si', '', $html );
        $html = preg_replace('#<!--.*?-->#msi', '', $html);
        return $html;
    }

    function print_error ( $message ) {
        $app = Prototype::get_instance();
        $migrator = $this->migrator;
        $session = $this->session;
        $migrator->print( $message );
        $dir = $session->value;
        if (! $app->datamigrator_develop ) {
            PTUtil::remove_dir( $dir );
            $session->remove();
        }
        $migrator->pause( $app );
    }
}