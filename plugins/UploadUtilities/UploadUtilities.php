<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class UploadUtilities extends PTPlugin {

    private $can_overwrite  = false;
    private $in_callback    = false;
    private $apply_revision = false;

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'list.tmpl' );
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'list.tmpl' );
        return true;
    }

    function pre_save_plugin_config ( $cb, $app, $component, &$errors ) {
        if ( $cb['plugin_id'] == 'uploadutilities' ) {
            $app->clear_compiled( 'list.tmpl' );
            $app->clear_cache( 'uploadutilities' . DS . 'sync_status_models' );
        }
        return true;
    }

    function post_save_plugin_config ( $cb, $app, $component ) {
        if ( $cb['plugin_id'] != 'uploadutilities' ) {
            return true;
        }
        $settings = $app->db->model( 'option' )->load( ['key' => 'uploadutilities_sync_status',
                                                        'kind' => 'plugin_setting',
                                                        'extra' => 'uploadutilities',
                                                        'value' => ['!=' => ''] ], [], 'value' );
        $all_models = [];
        foreach ( $settings as $setting ) {
            if (! $setting->value ) continue;
            $all_models = array_unique( array_merge( preg_split( '/\s*,\s*/', $setting->value ), $all_models ) );
        }
        $app->set_cache( 'uploadutilities' . DS . 'sync_status_models', $all_models );
        return true;
    }

    function post_init ( $app ) {
        $ctx = $app->ctx;
        $workspace_id = $app->param( 'workspace_id' ) ? (int)$app->param( 'workspace_id' ) : 0;
        if ( ( $app->mode === 'view' &&
            $app->param( '_type' ) === 'list' &&
            $app->param( '_model' ) === 'asset' ) || $app->mode === 'upload_multi' ) {
        } else {
            if ( $app->id == 'Worker' || $app->mode == 'save' || $app->mode == 'list_action' || $app->mode == 'delete' ) {
                $model = $app->param( '_model' );
                if ( $model ) {
                    $obj = $app->db->model( $model );
                    if (! $obj->has_column( 'status' ) || ! $obj->has_column( 'has_deadline' ) ) {
                        return true;
                    }
                }
                $all_models = $app->get_cache( 'uploadutilities' . DS . 'sync_status_models' );
                if (! is_array( $all_models ) ) {
                    $settings = $app->db->model( 'option' )->load( ['key' => 'uploadutilities_sync_status',
                                                                    'kind' => 'plugin_setting',
                                                                    'extra' => 'uploadutilities',
                                                                    'value' => ['!=' => ''] ], [], 'value' );
                    $all_models = [];
                    foreach ( $settings as $setting ) {
                        if (! $setting->value ) continue;
                        $all_models = array_unique( array_merge( preg_split( '/\s*,\s*/', $setting->value ), $all_models ) );
                    }
                    $app->set_cache( 'uploadutilities' . DS . 'sync_status_models', $all_models );
                }
                if ( $app->id == 'Worker' ) {
                    foreach ( $all_models as $model ) {
                        $app->register_callback( $model, 'scheduled_published', 'post_save_object', 10, $this );
                        $app->register_callback( $model, 'scheduled_replacement', 'post_save_object', 10, $this );
                        $app->register_callback( $model, 'scheduled_unpublish', 'post_save_object', 10, $this );
                    }
                    return true;
                }
                if (! in_array( $model, $all_models ) ) {
                    return true;
                }
                $app->register_callback( $model, 'post_save', 'post_save_object', 10, $this );
                $app->register_callback( $model, 'pre_delete', 'post_save_object', 10000, $this );
                return true;
            }
            return true;
        }
        $use_system_settings = $workspace_id
                             ? $this->get_config_value( 'uploadutilities_use_system_settings', $workspace_id ) : 0;
        $cfg_id = $use_system_settings ? 0 : $workspace_id;
        $can_switches = $this->get_config_value( 'uploadutilities_can_switches', $cfg_id );
        $can_overwrite = $this->get_config_value( 'uploadutilities_can_overwrite', $cfg_id );
        if ( !$can_overwrite && $app->asset_overwrite ) $can_overwrite = true;
        $settings = trim( $this->get_config_value( 'uploadutilities_settings', $cfg_id ) );
        $settings = preg_replace( "/\r\n|\r/","\n", $settings );
        $dir_settings = explode( "\n", $settings );
        $ctx->vars['uploadutilities_can_switches'] = $can_switches;
        $ctx->vars['uploadutilities_can_overwrite'] = $can_overwrite;
        $allow_multibyte = $this->get_config_value( 'uploadutilities_allow_multibyte', $cfg_id );
        if ( $app->mode === 'view' && $app->param( '_type' ) === 'list' &&
            $app->param( '_model' ) === 'asset' ) {
            $extension_settings = [];
            foreach ( $dir_settings as $dir_setting ) {
                $dir_setting = trim( $dir_setting );
                if (! $dir_setting ) continue;
                list( $dirname, $extensions ) = preg_split( "/\s*:\s*/", trim( $dir_setting ) );
                $extensions = strtolower( trim( $extensions ) );
                $exts = preg_split( "/\s*,\s*/", $extensions );
                $extension_settings[ trim( $dirname ) ] = implode( ', ', $exts );
            }
            $ctx->vars['extension_settings'] = $extension_settings;
            $can_status = $this->get_config_value( 'uploadutilities_can_status', $cfg_id );
            if ( $can_status ) {
                $table = $app->get_table( 'asset' );
                $max_status = $app->max_status( $app->user(), 'asset' );
                $default_status = $table->default_status;
                if ( $default_status > $max_status ) {
                    $default_status = $max_status;
                }
                $ctx->vars['can_asset_status'] = 1;
                $ctx->vars['asset_max_status'] = $max_status;
                $ctx->vars['asset_default_status'] = $default_status;
            }
            $can_publish_date = $this->get_config_value( 'uploadutilities_can_publish_date', $cfg_id );
            $ctx->vars['can_publish_date'] = $can_publish_date;
            $can_unpublish_date = $this->get_config_value( 'uploadutilities_can_unpublish_date', $cfg_id );
            $ctx->vars['can_unpublish_date'] = $can_unpublish_date;
            $can_extract_zip = $this->get_config_value( 'uploadutilities_can_extract_zip', $cfg_id );
            $ctx->vars['can_extract_zip'] = $can_extract_zip;
            $can_add_tags = $this->get_config_value( 'uploadutilities_can_add_tags', $cfg_id );
            $ctx->vars['can_add_tags'] = $can_add_tags;
            $ctx->vars['allow_multibyte'] = $allow_multibyte;
            $import_paths = property_exists( $app, 'import_paths' ) ? $app->import_paths : [];
            $import_paths[] = dirname( $app->pt_path ) . DS . 'import';
            $import_files = [];
            foreach ( $import_paths as $import_dir ) {
                if ( $handle = opendir( $import_dir ) ) {
                    while ( false !== ( $name = readdir( $handle ) ) ) {
                        if ( strpos( $name, '.' ) !== 0 ) {
                            $extension = PTUtil::get_extension( $name );
                            if ( strtolower( $extension ) === 'zip' ) {
                                $import_files[] = $name;
                            }
                        }
                    }
                }
            }
            $ctx->vars['import_files'] = $import_files;
            if ( $can_add_tags ) {
                $use_tag_helper = $this->get_config_value( 'uploadutilities_can_tag_helper', $cfg_id );
                $ctx->vars['use_tag_helper'] = $use_tag_helper;
            }
            return true;
        }
        if (! isset( $_FILES['files'] ) ) return true;
        $file_name = $_FILES['files']['name'][0];
        $file_ext = PTUtil::get_extension( $file_name, true );
        $uploadutilities_overwrite = $app->param( 'uploadutilities_overwrite' );
        if ( $can_overwrite && $uploadutilities_overwrite == 'true' ) {
            $this->can_overwrite = $uploadutilities_overwrite;
            $can_extract_zip = $this->get_config_value( 'uploadutilities_can_extract_zip', $cfg_id );
            $extract_zip = isset( $_REQUEST['uploadutilities_extract_zip'] )
                                 ? $_REQUEST['uploadutilities_extract_zip'] : null;
            if ( $can_extract_zip && $extract_zip == 'true' && $file_ext == 'zip' ) {
            } else {
                $app->param( 'overwrite', true );
                $_REQUEST['overwrite'] = true;
            }
        }
        $uploadutilities_switches = $app->param( 'uploadutilities_switches' );
        if ( $app->mode === 'upload_multi' && $uploadutilities_switches == 'true' ) {
            $dir_name = $_REQUEST['extra_path'];
            foreach ( $dir_settings as $dir_setting ) {
                $dir_setting = trim( $dir_setting );
                if (! $dir_setting ) continue;
                list( $dirname, $extensions ) = preg_split( "/\s*:\s*/", trim( $dir_setting ) );
                $extensions = strtolower( $extensions );
                if ( stripos( $extensions, $file_ext ) !== false ) {
                    $exts = preg_split( "/\s*,\s*/", $extensions );
                    if ( in_array( $file_ext, $exts ) ) {
                        $dir_name = trim( $dirname );
                        break;
                    }
                }
            }
            $app->sanitize_dir( $dir_name );
            $app->param( 'extra_path', $dir_name );
            $_REQUEST['extra_path'] = $dir_name;
        }
        if ( $allow_multibyte && $app->param( 'uploadutilities_allow_multibyte' ) == 'true' ) {
            $app->no_encode_filename = true;
        }
        return true;
    }

    function extract_zip ( $app ) {
        $app->validate_magic( true );
        $import_file = $app->param( 'uploadutilities_selected_zip' );
        if (! $import_file ) {
            header( 'Content-type: application/json' );
            echo json_encode( ['status' => 404, 'message' => $this->translate( 'ZIP file not selected.' ) ] );
            exit();
        }
        $import_paths = property_exists( $app, 'import_paths' ) ? $app->import_paths : [];
        $import_paths[] = dirname( $app->pt_path ) . DS . 'import';
        foreach ( $import_paths as $import_dir ) {
            if ( $handle = opendir( $import_dir ) ) {
                while ( false !== ( $name = readdir( $handle ) ) ) {
                    if ( strpos( $name, '.' ) !== 0 ) {
                        if ( $name === $import_file ) {
                            $import_file = $import_dir . DS . $name;
                            break;
                        }
                    }
                }
            }
        }
        if ( file_exists( $import_file ) ) {
            $workspace_id = $app->param( 'workspace_id' ) ? (int)$app->param( 'workspace_id' ) : 0;
            $use_system_settings = $workspace_id
                                 ? $this->get_config_value( 'uploadutilities_use_system_settings', $workspace_id ) : 0;
            $cfg_id = $use_system_settings ? 0 : $workspace_id;
            $can_overwrite = $this->get_config_value( 'uploadutilities_can_overwrite', $cfg_id );
            if ( !$can_overwrite && $app->asset_overwrite ) $can_overwrite = true;
            $uploadutilities_overwrite = $app->param( 'uploadutilities_overwrite' );
            if ( $can_overwrite && $uploadutilities_overwrite == 'true' ) {
                $this->can_overwrite = $uploadutilities_overwrite;
            }
            $asset = $app->db->model( 'asset' )->new();
            $asset->file( file_get_contents( $import_file ) );
            $asset->file_ext( 'zip' );
            $callback = [];
            $app->mode = 'upload_multi';
            $res = $this->post_save_asset( $callback, $app, $asset, $asset );
            if ( $res ) {
                header( 'Content-type: application/json' );
                echo json_encode( ['status' => 200 ] );
                exit();
            }
        }
        header( 'Content-type: application/json' );
        echo json_encode( ['status' => 500, 'message' => $this->translate( 'An error occurred while extracting ZIP file.' ) ] );
        exit();
    }

    function post_save_asset ( $cb, $app, &$obj, $original ) {
        if ( $app->mode !== 'upload_multi' || $this->in_callback ) return true;
        $this->in_callback = true;
        $app->db->in_duplicate = true; // Not remove blob file.
        if ( $app->db->blob2file ) {
            $app->db->cleanup_blob = true;
        }
        $workspace_id = $app->param( 'workspace_id' ) ? (int)$app->param( 'workspace_id' ) : 0;
        $changed = false;
        $base_url = $app->site_url;
        $base_path = $app->site_path;
        if ( $workspace = $obj->workspace ) {
            $base_url = $workspace->site_url;
            $base_path = $workspace->site_path;
        }
        $use_system_settings = $workspace_id
                             ? $this->get_config_value( 'uploadutilities_use_system_settings', $workspace_id ) : 0;
        $cfg_id = $use_system_settings ? 0 : $workspace_id;
        $can_extract_zip = $this->get_config_value( 'uploadutilities_can_extract_zip', $cfg_id );
        $can_add_tags = $this->get_config_value( 'uploadutilities_can_add_tags', $cfg_id );
        $objects = [ $obj ];
        $errors = [];
        $uploaded = false;
        if ( $can_extract_zip ) {
            $extract_zip = $app->param( 'uploadutilities_extract_zip' );
            $extension = strtolower( $obj->file_ext );
            if ( $extract_zip === 'true' && $extension === 'zip' ) {
                ignore_user_abort( true );
                if ( $max_execution_time = $app->max_exec_time ) {
                    $max_execution_time = (int) $max_execution_time;
                    ini_set( 'max_execution_time', $max_execution_time );
                }
                $upload_dir = $app->upload_dir();
                $extractTo = $app->upload_dir();
                $search_prefix = preg_quote( $extractTo, '/' );
                $zip_file = $upload_dir . DS . 'extract.zip';
                $app->fmgr->delayed = false;
                $app->fmgr->put( $zip_file , $obj->file );
                $zip = new ZipArchive();
                $res = $zip->open( $zip_file );
                if ( $res === true ) {
                    $zip->extractTo( $extractTo );
                    $zip->close();
                    list( $files, $dirs ) = [[], []];
                    $can_upload_hidden = false;
                    if ( $app->can_upload_hidden ) {
                        $can_upload_hidden = true;
                    }
                    PTUtil::file_find( $extractTo, $files, $dirs, $can_upload_hidden );
                    $objects = [];
                    $denied_exts = preg_split( "/\s*,\s*/", strtolower( $app->denied_exts ) );
                    $ds = DS;
                    $app->core_save_callbacks( 'asset' );
                    foreach ( $files as $file ) {
                        $asset_path = preg_replace( "/^{$search_prefix}/", $base_path, $file );
                        $asset_data = $app->fmgr->get( $file );
                        $dirname = dirname( preg_replace( "/^{$search_prefix}/", '', $file ) );
                        $extra_path = $app->sanitize_dir( $dirname );
                        // if (! $extra_path ) {}
                        $file_basename = basename( $asset_path );
                        if (! $app->no_encode_filename ) {
                            $file_basename = $this->encode_multibyte_chars( $file_basename );
                        }
                        $extension = PTUtil::get_extension( $file_basename, true );
                        if ( in_array( $extension, $denied_exts ) ) {
                            $errors[] = $this->translate( "Invalid File extension'%s'.", $file_basename );
                            continue;
                        } else if ( mb_substr_count( $file_basename, '.' ) > 1 ) {
                            $exts = explode( '.', $file_basename );
                            array_shift( $exts );
                            foreach ( $exts as $ext ) {
                                $ext = strtolower( $ext );
                                if ( in_array( $ext, $denied_exts ) ) {
                                    $errors[] = $this->translate( "Invalid File extension'%s'.", $file_basename );
                                    continue 2;
                                }
                            }
                        }
                        // TODO::PTUtil::upload_check
                        $can_overwrite = $this->can_overwrite;
                        $method = $can_overwrite ? 'get_by_key' : '__new';
                        if ( $method == 'get_by_key' && $app->path_upperlower ) {
                            $asset = $app->db->model( 'asset' )->$method( ['workspace_id' => $workspace_id,
                                                                           'extra_path' => ['BINARY' => $extra_path ],
                                                                           'file_name' => ['BINARY' => $file_basename ],
                                                                           'rev_type' => 0 ] );
                        } else {
                            $asset = $app->db->model( 'asset' )->$method( ['workspace_id' => $workspace_id,
                                                                           'extra_path' => $extra_path,
                                                                           'file_name' => $file_basename,
                                                                           'rev_type' => 0 ] );
                        }
                        // $asset = $app->db->model( 'asset' )->$method(
                        //       ['extra_path' => $extra_path, 'file_name' => $file_basename, 'workspace_id' => $workspace_id ] );
                        $original = $method == 'get_by_key' && $asset->id ? clone $asset : null;
                        $is_new = true;
                        $orig_relations = [];
                        $orig_metadata = [];
                        if ( $original ) {
                            if (! $app->upload_compat ) {
                                $max_status = $app->max_status( $app->user(), 'asset' );
                                if ( $original->status > $max_status ) {
                                    $errors[] = $this->translate( "Permission denied'%s'.",
                                        $extra_path . basename( $asset_path ) );
                                    continue;
                                }
                            }
                            $label = $original->label;
                            $orig_relations = $app->get_relations( $original );
                            $orig_metadata = $app->get_meta( $original );
                            $original->_relations = $orig_relations;
                            $original->_meta = $orig_metadata;
                            $original->id( null );
                            $is_new = false;
                        } else {
                            $label = basename( $asset_path );
                        }
                        $error = '';
                        $logging = $app->logging;
                        $app->logging = false;
                        $error_reporting = ini_get( 'error_reporting' ); 
                        error_reporting(0);
                        $metadata = PTUtil::get_upload_info( $app, $file, $error );
                        $app->logging = $logging;
                        error_reporting( $error_reporting );
                        $metadata = $metadata['metadata'];
                        $asset->label( $label );
                        $this->set_asset_meta( $asset, $metadata );
                        $asset->file( $asset_data );
                        $app->set_default( $asset );
                        $original = $original ? $original : clone $asset;
                        $callback = ['name' => 'save_filter', 'error' => '', 'is_new' => $is_new,
                                     'original' => $original ];
                        $res = $app->run_callbacks( $callback, 'asset', $asset, $original );
                        if (! $res ) {
                            $this->log( $callback['error'], 'error' );
                            continue;
                        }
                        $callback['name'] = 'pre_save';
                        $res = $app->run_callbacks( $callback, 'asset', $asset, $original );
                        if (! $res ) {
                            $this->log( $callback['error'], 'error' );
                            continue;
                        }
                        $asset->save();
                        if ( $original ) {
                            $meta = $app->db->model( 'meta' )->get_by_key(
                                                   ['model' => 'asset', 'object_id' => $asset->id,
                                                    'kind' => 'metadata', 'key' => 'file'] );
                            if ( $meta->id ) {
                                $orig_meta = json_decode( $meta->text, true );
                                if ( isset( $orig_meta['label'] ) ) {
                                    $label = $orig_meta['label'];
                                }
                            }
                        }
                        PTUtil::file_attach_to_obj( $app, $asset, 'file', $file, $label, $error );
                        $changed_cols = [];
                        if ( $original ) {
                            if ( base64_encode( $asset->file ) !== base64_encode( $original->file ) ) {
                                require_once( LIB_DIR . 'Prototype' . DS . 'class.PTUtil.php' );
                                $changed_cols = PTUtil::object_diff( $app, $asset, $original );
                                PTUtil::pack_revision( $asset, $original, $changed_cols );
                            }
                        }
                        $callback = ['name' => 'post_save', 'error' => '', 'is_new' => $is_new,
                                     'original' => $original ];
                        $app->run_callbacks( $callback, 'asset', $asset, $original );
                        $params = [ $app->translate( 'Asset' ), $label, $asset->id, $app->user()->nickname ];
                        $message = $is_new ? $app->translate( "%1\$s '%2\$s(ID:%3\$s)' created by %4\$s.", $params )
                                 : $app->translate( "%1\$s '%2\$s(ID:%3\$s)' edited by %4\$s.", $params );
                        $log = $app->log( ['message'   => $message,
                                           'category'  => 'save',
                                           'model'     => 'asset',
                                           'object_id' => $asset->id,
                                           'level'     => 'info'] );
                        $app->init_callbacks( 'asset', 'save' );
                        $callback = ['name' => 'post_save', 'is_new' => $is_new,
                                     'changed_cols' => $changed_cols, 'orig_relations' => $orig_relations,
                                     'orig_metadata' => $orig_metadata, 'log' => $log ];
                        $app->run_callbacks( $callback, 'asset', $asset, $original );
                        $app->publish_obj( $asset );
                        $objects[] = $asset;
                        $uploaded = true;
                    }
                    if ( $obj->id ) {
                        $log = $cb['log'];
                        $log->remove();
                        $urlinfos = $app->db->model( 'urlinfo' )->load( ['model' => 'asset', 'object_id' => $obj->id ] );
                        foreach ( $urlinfos as $urlinfo ) {
                            if ( $app->fmgr->exists( $urlinfo->file_path ) ) {
                                $app->fmgr->unlink( $urlinfo->file_path );
                                // Do not purge cache by AWS_CloudFront plugin.
                                unset( $app->fmgr->update_paths[ $urlinfo->file_path ] );
                            }
                        }
                        if (! empty( $urlinfos ) ) {
                            $update_urls = $app->update_urls;
                            foreach ( $urlinfos as $urlinfo ) {
                                foreach ( $update_urls as $idx => $url ) {
                                    if ( $url->id == $urlinfo->id ) {
                                        unset( $update_urls[ $idx ] );
                                    }
                                }
                            }
                            $app->update_urls = $update_urls;
                            $app->db->model( 'urlinfo' )->remove_multi( $urlinfos );
                        }
                        $app->db->in_duplicate = false;
                        $obj = $app->db->model( 'asset' )->load( $obj->id, false, 'id,file' );
                        $app->remove_object( $obj );
                        if ( $app->db->blob2file ) {
                            $obj->remove();
                        }
                        $app->db->in_duplicate = true;
                    }
                }
            }
        }
        $can_status = $this->get_config_value( 'uploadutilities_can_status', $cfg_id );
        require_once( LIB_DIR . 'Prototype' . DS . 'class.PTValidator.php' );
        $can_publish_date = $this->get_config_value( 'uploadutilities_can_publish_date', $cfg_id );
        $validator = new PTValidator();
        $can_unpublish_date = $this->get_config_value( 'uploadutilities_can_unpublish_date', $cfg_id );
        $uploadutilities_status = isset( $_REQUEST['uploadutilities_status'] )
                             ? (int) $_REQUEST['uploadutilities_status'] : null;
        $published_on_date = isset( $_REQUEST['uploadutilities_published_on'] )
                             ? $_REQUEST['uploadutilities_published_on'] : null;
        $has_deadline = isset( $_REQUEST['uploadutilities_has_deadline'] )
                             ? $_REQUEST['uploadutilities_has_deadline'] : null;
        $unpublished_on_date = isset( $_REQUEST['uploadutilities_unpublished_on'] )
                             ? $_REQUEST['uploadutilities_unpublished_on'] : null;
        foreach ( $objects as $obj ) {
            $file_path = $base_path . '/'. $obj->extra_path . $obj->file_name;
            $file_path = str_replace( '/', DS, $file_path );
            if ( $can_status ) {
                if ( $uploadutilities_status !== null ) {
                    if ( $obj->status != $uploadutilities_status ) {
                        $max_status = $app->max_status( $app->user(), 'asset' );
                        if ( $uploadutilities_status <= $max_status ) {
                            if ( $uploadutilities_status != 4 ) {
                                $app->fmgr->unlink( $file_path );
                            }
                            $obj->status( $uploadutilities_status );
                            $changed = true;
                        }
                    }
                }
            }
            if ( $can_publish_date ) {
                if ( $published_on_date !== null ) {
                    $published_on_date = preg_replace( '/[^0-9]*/', '', $published_on_date );
                    $error = '';
                    if ( $uploadutilities_status == null || $obj->status == 3 ) {
                        if ( $published_on_date != $obj->published_on &&
                            $validator->is_valid_ts( $published_on_date, $error ) ) {
                            $obj->published_on( $published_on_date );
                            $changed = true;
                        }
                    }
                }
            }
            if ( $can_unpublish_date ) {
                if ( $has_deadline && $has_deadline === 'true' ) {
                    $obj->has_deadline(1);
                    $changed = true;
                    if ( $unpublished_on_date !== null ) {
                        $unpublished_on_date = preg_replace( '/[^0-9]*/', '', $unpublished_on_date );
                        $error = '';
                        if ( $unpublished_on_date != $obj->published_on &&
                            $validator->is_valid_ts( $unpublished_on_date, $error ) ) {
                            $obj->unpublished_on( $unpublished_on_date );
                        }
                    }
                }
            }
            if ( $changed ) $obj->save();
            if ( $can_add_tags && $app->param( 'uploadutilities_add_tags' ) ) {
                $add_tags = trim( $app->param( 'uploadutilities_add_tags' ) );
                if ( $add_tags ) {
                    $add_tags = preg_split( '/\s*,\s*/', $add_tags );
                    if (! empty( $add_tags ) ) {
                        $tag_ids = [];
                        foreach ( $add_tags as $tag ) {
                            $tag = PTUtil::normalize( $tag );
                            $normalize = PTUtil::normalize_tag( $tag );
                            if (!$normalize ) continue;
                            $terms = ['normalize' => $normalize, 'class' => 'asset'];
                            if ( $workspace_id )
                                $terms['workspace_id'] = $workspace_id;
                            $tag_obj = $app->db->model( 'tag' )->get_by_key( $terms );
                            if (!$tag_obj->id ) {
                                $tag_obj->name( $tag );
                                $app->set_default( $tag_obj );
                                $order = $app->get_order( $tag_obj );
                                $tag_obj->order( $order );
                                if (! $tag_obj->save() ) return $app->rollback( $errstr );
                            }
                            $tag_ids[] = $tag_obj->id;
                        }
                        if (! empty( $tag_ids ) ) {
                            $args = ['from_id' => $obj->id, 'name' => 'tags',
                                     'from_obj' => 'asset','to_obj' => 'tag' ];
                            $app->set_relations( $args, $tag_ids, true );
                        }
                    }
                }
            }
            if ( $uploadutilities_status && $obj->status == 4 ) {
                $app->publish_obj( $obj );
            }
        }
        if (! empty( $errors ) ) {
            $status = $uploaded ? 207 : 403;
            header( 'Content-type: application/json' );
            echo json_encode( [
                'status' => $status,
                'message' => implode( "\n", $errors ) ] );
            exit();
        }
        return true;
    }

    function post_save_object ( $cb, $app, &$obj, $original ) {
        if ( $obj->_model == 'asset' ) return true;
        $workspace_id = $obj->has_column( 'workspace_id' ) ? $obj->workspace_id : 0;
        $use_system_settings = $workspace_id
                             ? $this->get_config_value( 'uploadutilities_use_system_settings', $workspace_id ) : 0;
        $cfg_id = $use_system_settings ? 0 : $workspace_id;
        $sync_status = $this->get_config_value( 'uploadutilities_sync_status', $cfg_id );
        if (! $sync_status || $obj->rev_type ) {
            return true;
        }
        $sync_status = preg_split( '/\s*,\s*/', $sync_status );
        if (! in_array( $obj->_model, $sync_status ) ) {
            return true;
        }
        $status_published = $app->status_published( $obj->_model );
        $force = $status_published == $obj->status;
        $sync_status_published = $this->get_config_value( 'uploadutilities_sync_status_published', $cfg_id );
        if ( $force ) {
            $force = $sync_status_published;
        }
        $orig_status = $obj->status;
        if ( $cb['name'] === 'pre_delete' ) {
            $obj->status( 5 );
        }
        $relations = $app->get_relations( $obj, 'asset' );
        $asset_ids = [];
        foreach ( $relations as $relation ) {
            $asset_ids[] = $relation->to_id;
        }
        $customfields  = $app->get_meta( $obj, 'customfield' );
        $field_type_asset = $app->field_type_asset
                          ? explode( ',', $app->field_type_asset ) : ['asset', 'assets', 'image', 'images'];
        foreach ( $customfields as $customfield ) {
            if ( in_array( $customfield->type, $field_type_asset ) && $customfield->data ) {
                $data = array_filter( explode( ':', $customfield->data ), 'strlen' );
                $asset_ids = array_merge( $asset_ids, $data );
            }
        }
        if ( $app->component( 'ComponentBlocks' ) ) {
            $scheme = $app->get_scheme_from_db( $obj->_model );
            $props = $scheme['edit_properties'] ?? [];
            $existing = array_search( 'component_blocks', $props );
            if ( $existing ) {
                $columns = [];
                foreach ( $props as $column => $prop ) {
                    if ( $prop === 'component_blocks' ) {
                        $columns[] = $column;
                    }
                }
                foreach ( $columns as $column ) {
                    if ( $json = $obj->$column ) {
                        $json = json_decode( $json, true );
                        if ( $json ) {
                            foreach ( $json as $block ) {
                                $ids = null;
                                if ( isset( $block['asset_ids'] ) ) {
                                    $ids = $block['asset_ids'];
                                } else if ( isset( $block['asset_id'] ) ) {
                                    $ids = $block['asset_id'];
                                }
                                if ( is_numeric( $ids ) ) {
                                    $asset_ids[] = $ids;
                                } else if ( is_array( $ids ) ) {
                                    foreach ( $ids as $id ) {
                                        if ( is_numeric( $id ) ) {
                                            $asset_ids[] = $id;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $asset_ids = array_unique( $asset_ids );
        // Type integer.
        $table = $app->get_table( $obj->_model );
        $columns = $app->db->model( 'column' )->load(
            ['table_id' => $table->id,
             'type' => 'int', 'disp_edit' => 'relation', 'rel_model' => 'asset'],
            null, 'name' );
        foreach ( $columns as $column ) {
            $colName = $column->name;
            if ( $obj->$colName ) {
                $asset_ids[] = $obj->$colName;
            }
        }
        $asset_ids = array_unique( $asset_ids );
        $status_map = [];
        $base_max_status = $obj->status == 5 ? 0 : $obj->status;
        if (! $force ) {
            foreach ( $asset_ids as $idx => $asset_id ) {
                $max_status = $base_max_status;
                $others = $app->db->model( 'relation' )->load( ['to_id' => $asset_id, 'to_obj' => 'asset'] );
                $search = $app->db->escape_like( ':' . $asset_id . ':' );
                $fields = $app->db->model( 'meta' )->load(
                          ['type' => ['IN' => $field_type_asset ] , 'data' => ['LIKE' => $search ] ] );
                foreach ( $fields as $field ) {
                    if ( $field->model == $obj->_model && $field->object_id == $obj->id ) {
                    } else {
                        $from_obj = $app->db->model( $field->model );
                        if (! $from_obj->has_column( 'status' ) || ! $from_obj->has_column( 'has_deadline' ) ) {
                            continue;
                        }
                        $from_obj = $from_obj->load( $field->object_id );
                        if (! $from_obj ) {
                            continue;
                        } else if ( $from_obj->has_column( 'rev_type' ) && $from_obj->rev_type ) {
                            continue;
                        }
                        if ( $sync_status_published ) {
                            if ( $from_obj->status > $max_status ) {
                                $max_status = $from_obj->status;
                            }
                        } else if ( $from_obj->status != $obj->status ) {
                            unset( $asset_ids[ $idx ] );
                            continue;
                        }
                    }
                }
                foreach ( $others as $other ) {
                    if ( $other->from_obj == $obj->_model && $other->from_id == $obj->id ) {
                    } else {
                        $from_obj = $app->db->model( $other->from_obj );
                        if (! $from_obj->has_column( 'status' ) || ! $from_obj->has_column( 'has_deadline' ) ) {
                            continue;
                        }
                        $from_obj = $from_obj->load( $other->from_id );
                        if (! $from_obj ) {
                            continue;
                        } else if ( $from_obj->has_column( 'rev_type' ) && $from_obj->rev_type ) {
                            continue;
                        }
                        if ( $sync_status_published ) {
                            if ( $from_obj->status > $max_status ) {
                                $max_status = $from_obj->status;
                            }
                        } else if ( $from_obj->status != $obj->status ) {
                            unset( $asset_ids[ $idx ] );
                            continue;
                        }
                    }
                }
                $status_map[ $asset_id ] = $max_status;
            }
            if (! empty( $asset_ids ) ) {
                $columns = $app->db->model( 'column' )->load(
                    ['type' => 'int', 'disp_edit' => 'relation', 'options' => 'asset'], null, 'table_id,name' );
                foreach ( $columns as $column ) {
                    $refTable = $app->db->model( 'table' )->load( (int) $column->table_id, null, 'name' );
                    if (! $app->db->model( $refTable->name )->has_column( 'status' )
                        || !$app->db->model( $refTable->name )->has_column( 'has_deadline' ) ) {
                        continue;
                    }
                    foreach ( $asset_ids as $idx => $asset_id ) {
                        $max_status = $status_map[ $asset_id ] ?? $base_max_status;
                        $cols = ['status'];
                        if ( $app->db->model( $refTable->name )->has_column( 'rev_type' ) ) {
                            $cols[] = 'rev_type';
                        }
                        $refObjs = $app->db->model( $refTable->name )->load( [ $column->name => $asset_id ], null, $cols );
                        foreach ( $refObjs as $from_obj ) {
                            if ( $from_obj->has_column( 'rev_type' ) && $from_obj->rev_type ) {
                                continue;
                            }
                            if ( $sync_status_published ) {
                                if ( $from_obj->status > $max_status ) {
                                    $max_status = $from_obj->status;
                                }
                            } else if ( $from_obj->status != $obj->status ) {
                                unset( $asset_ids[ $idx ] );
                                continue;
                            }
                        }
                        $status_map[ $asset_id ] = $max_status;
                    }
                }
            }
        }
        if (! empty( $asset_ids ) ) {
            $change_status = $app->mode == 'delete' ? 5 : $obj->status;
            $not_sync_published = $this->get_config_value( 'uploadutilities_not_sync_published', $cfg_id );
            foreach ( $asset_ids as $asset_id ) {
                $asset = $app->db->model( 'asset' )->load( $asset_id );
                if (! $asset ) {
                    continue;
                }
                if ( $not_sync_published && $asset->status == $status_published ) {
                    continue;
                }
                if ( $sync_status_published && isset( $status_map[ $asset_id ] ) ) {
                    $after_status = $status_map[ $asset_id ];
                } else {
                    $after_status = $change_status;
                }
                if ( $asset->status != $after_status ) {
                    $asset->status( $after_status );
                    $asset->save();
                    $app->publish_obj( $asset );
                }
            }
        }
        if ( $app->param( '_apply_to_master' ) && !$this->apply_revision ) {
            $this->apply_revision = true;
            $clone = clone $original;
            $clone->status( 0 );
            $this->post_save_object( $cb, $app, $clone, $original );
        }
        $obj->status( $orig_status );
        return true;
    }

    function hdlr_assetmodels ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (!$counter ) {
            $params = [];
            $sql = "SELECT column_table_id FROM mt_column WHERE column_rel_model='asset' GROUP BY column_table_id";
            $app = $ctx->app;
            $models = $app->db->db->query( $sql );
            $models = $models->fetchAll();
            foreach ( $models as $model ) {
                $table_id = array_shift( $model );
                $table = $app->db->model( 'table' )->load( (int) $table_id, null, 'name,label' );
                if (! $table ) {
                    continue;
                }
                $params[ $table->name ] = ['name' => $table->name, 'label' => $table->label ];
            }
            $terms = ['workspace_id' => 0];
            if ( $args['workspace_id'] ) {
                $terms = ['workspace_id' => ['IN' => [0, 1] ] ];
            }
            $field_type_asset = $app->field_type_asset
                              ? explode( ',', $app->field_type_asset ) : ['asset', 'assets', 'image', 'images'];
            $types = $app->db->model( 'fieldtype' )->load_iter( ['basename' => ['IN' => $field_type_asset ] ], null, 'id' );
            $type_ids = $types->fetchAll( PDO::FETCH_COLUMN );
            if (! empty( $type_ids ) ) {
                $terms['fielstype_id'] = ['IN' => $type_ids ];
                $fields = $app->db->model( 'field' )->load( $terms, null, 'id' );
                foreach ( $fields as $field ) {
                    $relations = $app->get_relations( $field, 'table', 'models' );
                    foreach ( $relations as $relation ) {
                        $table = $app->db->model( 'table' )->load( (int) $relation->to_id, null, 'name,label' );
                        $params[ $table->name ] = ['name' => $table->name, 'label' => $table->label ];
                    }
                }
            }
            if ( empty( $params ) ) {
                $repeat = $ctx->false();
                return;
            }
            $_params = [];
            foreach ( $params as $param ) {
                $_params[] = $param;
            }
            $params = $_params;
            $ctx->local_params = $params;
        }
        if (!isset( $params ) ) $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $repeat = true;
            $ctx->local_vars['name'] = $params[ $counter ]['name'];
            $ctx->local_vars['label'] = $params[ $counter ]['label'];
        } else {
            unset( $params );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function encode_multibyte_chars ( $name ) {
        $chars = preg_split( '//u', $name );
        $encoded = '';
        foreach ( $chars as $char ) {
            if ( strlen( $char ) === mb_strlen( $char ) ) {
                $encoded .= $char;
            } else {
                $encoded .= rawurlencode( $char );
            }
        }
        return $encoded;
    }

    function set_asset_meta ( &$asset, $metadata ) {
        $asset->mime_type( $metadata['mime_type'] );
        $asset->file_ext( $metadata['extension'] );
        $asset->size( $metadata['file_size'] );
        if ( isset( $metadata['image_width'] ) ) $asset->image_width( $metadata['image_width'] );
        if ( isset( $metadata['image_height'] ) ) $asset->image_height( $metadata['image_height'] );
        $asset->class( $metadata['class'] );
        return $asset;
    }
}