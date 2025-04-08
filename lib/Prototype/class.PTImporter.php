<?php

function ptimporter_auto_loader($class) {
    $path = $class;
    $path = str_replace( '\\', DS, $path ) . '.php';
    if ( file_exists( LIB_DIR . $path ) ) {
        include_once( LIB_DIR . $path );
    }
}
spl_autoload_register( '\ptimporter_auto_loader' );

class PTImporter {

    public  $print_state = true;
    private $allowed = ['csv', 'zip'];
    public  $apply_theme = false;
    public  $skipped_objects = [];
    public  $theme_skipped = 0;

    function import_objects ( $app ) {
        if (! $app->can_do( 'import_objects' ) ) {
            return $app->error( 'Permission denied.' );
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $ctx = $app->ctx;
        $ctx->vars['page_title'] = $app->translate( 'Import Objects' );
        // $do_import = $app->param( 'do_import' );
        $do_import = $app->param( '_type' );
        $session_id = $app->param( 'magic' );
        $upload_filename = $app->param( 'upload_filename' );
        if ( $upload_filename ) $session_id = '';
        if ( $session_id ) {
            $session = $app->db->model( 'session' )->get_by_key( ['name' => $session_id, 'kind' => 'UP'] );
            if (! $session->id || $session->user_id != $app->user()->id ) {
                return $app->return_to_dashboard();
            }
        }
        $import_paths = $app->import_paths;
        $import_paths[] = dirname( $app->pt_path ) . DS . 'import';
        if ( $do_import == 'do_import' ) {
            $app->db->caching = false;
            $onetime_token = $app->param( 'onetime_token' );
            if (! $onetime_token ) {
                return $app->error( $app->translate( 'Invalid request.' ), true );
            }
            $ontime_session = $app->db->model( 'session' )->get_by_key(
            ['name' => $onetime_token, 'kind' => 'OT', 'user_id' => $app->user()->id, 'workspace_id' => $workspace_id] );
            if (! $ontime_session->id || $ontime_session->expires < time() ) {
                return $app->error( $app->translate( 'Invalid request.' ), true );
            }
            // $app->validate_magic();
            if ( $upload_filename ) {
                $upload_filename = str_replace( '..' . DS, '', $upload_filename );
                $upload_filename = str_replace( DS, '', $upload_filename );
                foreach ( $import_paths as $import_dir ) {
                    if ( file_exists( $import_dir . DS . $upload_filename ) ) {
                        $import_file = $import_dir . DS . $upload_filename;
                        break;
                    }
                }
            } else {
                if (! $session_id ) {
                    return $app->error( 'Invalid request.' );
                }
                $import_file = $session->value;
            }
            if ( $max_execution_time = $app->max_exec_time ) {
                $max_execution_time = (int) $max_execution_time;
                ini_set( 'max_execution_time', $max_execution_time );
            }
            if (! file_exists( $import_file ) ) {
                return $app->error( 'Invalid request.', true );
            }
            $model = $app->param( 'model' );
            if (! $app->can_do( $model, 'create' ) ) {
                return $app->error( 'Permission denied.', true );
            }
            $app->init_callbacks( $model, 'pre_import' );
            $app->init_callbacks( $model, 'post_import' );
            $app->init_callbacks( 'attachmentfile', 'post_import' );
            if ( $session_id ) {
                $meta = json_decode( $session->text, true );
                $extension = $meta['extension'];
            } else {
                $extension = PTUtil::get_extension( $import_file );
            }
            $dirname = dirname( $import_file );
            require_once( 'class.PTUtil.php' );
            if ( strtolower( $extension ) == 'zip' ) {
                $extractTo = $upload_filename ? $app->upload_dir() : dirname( $import_file );
                $dirname = $extractTo;
                $zip = new ZipArchive();
                $res = $zip->open( $import_file );
                if ( $res === true ) {
                    $zip->extractTo( $extractTo );
                    $zip->close();
                    // unlink( $import_file );
                    $list = PTUtil::file_find( $extractTo, $files, $dirs );
                    if ( $files == 0 ) {
                        $error = $app->translate( 'Could not expand ZIP archive.' );
                        return $app->error( $error );
                    }
                    $import_file = $files;
                } else {
                    $error = $app->translate( 'Could not expand ZIP archive.' );
                    return $app->error( $error );
                }
            } else {
                $import_file = [ $import_file ];
            }
            $csv_exists = false;
            foreach ( $import_file as $file ) {
                $extension = PTUtil::get_extension( $file );
                if ( strtolower( $extension ) == 'csv' ||
                    ( isset( $extractTo ) && $extractTo == dirname( $file ) ) ) {
                    $csv_exists = true;
                    $dirname = dirname( $file );
                    break;
                }
            }
            $ds = preg_quote( DS, '/' );
            if (! $csv_exists && count( $dirs ) > 1 ) {
                $dirname = $dirs[1];
                $dirname = preg_replace( "/{$ds}\.$/", '', $dirname );
            }
            $this->import_from_files( $app, $model, $dirname, $import_file, $session );
            if ( $session && $session->id ) {
                $session->remove();
                PTUtil::remove_dir( dirname( $session->value ) );
            }
            $ontime_session->remove();
            if ( $this->print_state ) {
                echo "<script>window.parent.importDone = true;</script>";
            }
            exit();
        }
        $import_files = [];
        foreach ( $import_paths as $import_dir ) {
            if ( $handle = opendir( $import_dir ) ) {
                while ( false !== ($name = readdir( $handle ) ) ) {
                    if ( strpos( $name, '.' ) !== 0 ) {
                        $extension = PTUtil::get_extension( $name );
                        if ( $extension && in_array( $extension, $this->allowed ) ) {
                            $import_files[ $import_dir . DS . $name ] = true;
                        }
                    }
                }
            }
        }
        $import_file_names = [];
        foreach ( $import_files as $path => $bool ) {
            $import_file_names[] = basename( $path );
        }
        $onetime_token = $app->magic();
        $session = $app->db->model( 'session' )->get_by_key(
        ['name' => $onetime_token, 'kind' => 'OT', 'user_id' => $app->user()->id, 'workspace_id' => $workspace_id] );
        $session->start( time() );
        $session->expires( time() + $app->token_expires );
        $session->save();
        $ctx->vars['onetime_token'] = $onetime_token;
        $ctx->vars['import_file_names'] = $import_file_names;
        return $app->build_page( 'import_objects.tmpl' );
    }

    function import_from_files ( $app, $model, $dirname, $import_file, $session = null ) {
        if ( substr( PHP_OS, 0, 3 ) == 'WIN' && $app->language == 'ja' ) {
            setlocale( LC_CTYPE, 'Japanese_Japan.utf8' );
        }
        $table = $app->get_table( $model );
        if ( $table->revisable ) $app->db->in_duplicate = true; // Not remove blob file.
        $fmgr = $app->fmgr;
        $plural = $table->plural;
        $primary = $table->primary;
        $primary_col = "{$model}_{$primary}";
        $scheme = $app->get_scheme_from_db( $model );
        $app->get_scheme_from_db( 'attachmentfile' );
        $app->in_iframe = $this->print_state;
        $column_defs = $scheme['column_defs'];
        $allowed_exts = $app->allowed_exts ? preg_split( '/\s*,\s*/', $app->allowed_exts ) : [];
        $allowed_exts = array_filter( $allowed_exts, 'strlen' );
        $denied_exts = $app->denied_exts ? preg_split( '/\s*,\s*/', $app->denied_exts ) : [];
        $denied_exts = array_filter( $denied_exts, 'strlen' );
        $default_vars = [];
        foreach ( $column_defs as $key => $prop ) {
            if ( isset( $prop['default'] ) ) {
                $default_vars[ $key ] = $prop['default'];
            }
        }
        $edit_properties = $scheme['edit_properties'];
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $images = $app->images;
        $videos = $app->videos;
        $audios = $app->audios;
        list( $insert, $update, $skip, $faild ) = [0, 0, 0, 0];
        $errors = [];
        $log_info = [];
        $attachment_cols = PTUtil::attachment_cols( $model, $scheme );
        $status_published = null;
        if ( $app->db->model( $model )->has_column( 'status' ) ) {
            $status_published = $app->status_published( $model );
        }
        $passwords = [];
        foreach ( $column_defs as $colName => $column_def ) {
            if ( $column_def['type'] == 'string' ) {
                if ( isset( $edit_properties[ $colName ] ) ) {
                    if ( $edit_properties[ $colName ] == 'password(hash)' ) {
                        $passwords[] = "{$model}_{$colName}";
                    }
                }
            }
        }
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $wait_import = null;
        if ( $app->wait_import && $this->print_state ) {
            $this->print_state = false;
            $session_id = $app->magic();
            $wait_import = $app->db->model( 'session' )->new(
                ['name' => $session_id, 'kind' => 'IM', 'user_id' => $app->user()->id, 'key' => $model] );
            $wait_import->save();
            $ctx = $app->ctx;
            $ctx->vars['page_title'] =
            $app->translate( 'Importing %s...', $app->translate( $table->plural ) );
            $ctx->vars['model'] = $model;
            $ctx->vars['workspace_id'] = $app->workspace() ? $app->workspace()->id : 0;
            $app->debug = false;
            $app->param( 'session_id', $session_id );
            $_REQUEST['session_id'] = $session_id;
            $app->build_page( 'wait_import.tmpl', [], true, false );
        }
        $app->db->update_multi = true;
        $app->importer = $this;
        $header_out = false;
        $csv_exists = false;
        $imported_objects = [];
        $custom_fields = null;
        $keys = array_map( function( $file ) {
            return substr_count( $file, DS );
        }, $import_file );
        array_multisort( $keys, SORT_ASC, $import_file );
        foreach ( $import_file as $file ) {
            $extension = PTUtil::get_extension( $file );
            if ( $extension == 'json' ) {
                $custom_fields = json_decode( file_get_contents( $file ), true );
            }
        }
        foreach ( $import_file as $file ) {
            $extension = PTUtil::get_extension( $file );
            if (! $csv_exists && $extension == 'csv' ) {
                if ( $dirname == dirname( dirname( $file ) ) ) {
                    $dirname = dirname( $file );
                }
                $filename = $app->escape( basename( $file ) );
                $csv = $file;
                $csv_exists = true;
                $content = file_get_contents( $csv );
                $encoding = mb_detect_encoding( $content );
                if ( $encoding != 'UTF-8' ) {
                    $content = mb_convert_encoding( $content, 'UTF-8', 'Shift_JIS' );
                } else if ( preg_match( '/^\xEF\xBB\xBF/', $content ) ) {
                    $content = preg_replace( '/^\xEF\xBB\xBF/', '', $content );
                }
                $content = preg_replace( "/\r\n|\r|\n/", PHP_EOL, $content );
                if (! $this->apply_theme ) {
                    file_put_contents( $csv, $content );
                } else {
                    $upload_dir = $app->upload_dir();
                    $csv = $upload_dir . DS . basename( $csv );
                    file_put_contents( $csv, $content );
                }
                // $fh = fopen( $csv, 'r' );
                $i = 0;
                $columns = [];
                $csv_handle = new SplFileObject( $csv ); 
                $csv_handle->setFlags( SplFileObject::READ_CSV | 
                                       SplFileObject::READ_AHEAD | 
                                       SplFileObject::SKIP_EMPTY ); 
                // | SplFileObject::DROP_NEW_LINE
                // while( $data = fgetcsv( $fh ) ) {
                foreach ( $csv_handle as $data ) {
                    // if ( $data[0] == null ) continue;
                    $attachment_files = [];
                    $has_blob = false;
                    if (! $i ) {
                        $columns = $data;
                        foreach ( $columns as $column ) {
                            if ( $column != 'export_uuid' && strpos( $column, $model ) === false ) {
                                if ( $session ) {
                                    $session->remove();
                                    PTUtil::remove_dir( dirname( $session->value ) );
                                }
                                $error = $app->translate( 'The CSV format are Invalid. Please confirm the file.' );
                                if ( $wait_import ) {
                                    $wait_import->text( $error );
                                    $wait_import->value( 1 );
                                    $wait_import->save();
                                } else {
                                    return $app->error( $error, true );
                                }
                                exit();
                            }
                        }
                        if (! $header_out && $this->print_state ) {
                            while ( ob_get_level() > 0 ) {
                                ob_end_flush();
                            }
                            echo str_repeat( ' ', 1024 );
                            echo '<html><body style="font-family: sans-serif">';
                            flush();
                        }
                        $header_out = true;
                    } else {
                        $values = [];
                        $id = null;
                        $status = null;
                        $cnt = 0;
                        $export_uuid = null;
                        foreach ( $columns as $column ) {
                            $column = preg_replace( '/[\x00-\x1F\x80-\xFF]/', '', $column );
                            if ( $column == 'export_uuid' ) {
                                $export_uuid = $data[ $cnt ];
                            } else if ( $column == "{$model}_id" ) {
                                $id = (int) $data[ $cnt ];
                            } else if ( $column == "{$model}_status" ) {
                                $status = (int) $data[ $cnt ];
                            } else if ( $column == "{$model}_extra_path" ) {
                                $extra_path = $data[ $cnt ];
                                $extra_path = $app->sanitize_dir( $extra_path );
                                $data[ $cnt ] = $extra_path;
                                $values[ $column ] = $data[ $cnt ];
                            } else if ( $column == "asset_file_name" ) {
                                $asset_file_name = $data[ $cnt ];
                                $asset_file_name = $app->sanitize_file( $asset_file_name );
                                $data[ $cnt ] = $asset_file_name;
                                $file_ext = PTUtil::get_extension( $asset_file_name, true );
                                $check_upload = true;
                                if (! empty( $allowed_exts ) && !in_array( $file_ext, $allowed_exts ) ) {
                                    $check_upload = false;
                                }
                                if (! empty( $denied_exts ) && in_array( $file_ext, $denied_exts ) ) {
                                    $check_upload = false;
                                }
                                if (! $check_upload ) {
                                    $data[ $cnt ] = '';
                                    $error_msg = $app->translate( "The file '%s' that you uploaded is not allowed.", $asset_file_name );
                                    $log_info[] = $error_msg;
                                    $faild++;
                                    if ( $this->print_state ) {
                                        echo $error_msg, '<br>';
                                        flush();
                                    } else {
                                        $app->log( ['message'  => $error_msg,
                                                    'category' => 'import',
                                                    'model'    => $obj->_model,
                                                    'level'    => 'error'] );
                                    }
                                    $cnt++;
                                    continue 2;
                                }
                                $values[ $column ] = $data[ $cnt ];
                            } else if ( $column == "{$model}_workspace_id" ) {
                                $workspace_id = (int) $data[ $cnt ];
                                if ( $app->workspace() && $workspace_id != $app->workspace()->id ) {
                                    $workspace_id = (int) $app->workspace()->id;
                                } else if (! $app->workspace() && ! $workspace_id ) {
                                    $workspace_id = 0;
                                } else if ( $workspace_id && $workspace_id != $app->param( 'workspace_id' ) ) {
                                    $target_ws = $app->db->model( 'workspace' )->load( $workspace_id );
                                    if ( $target_ws === null ) {
                                        $error_msg = $app->translate( "The line was skipped because invalid workspace_id %1\$s specified (line %2\$s of %3\$s).",
                                                [ $workspace_id, $i + 1, $filename ] );
                                        $log_info[] = $error_msg;
                                        $faild++;
                                        if ( $this->print_state ) {
                                            echo $error_msg, '<br>';
                                            flush();
                                        } else {
                                            $app->log( ['message'  => $error_msg,
                                                        'category' => 'import',
                                                        'model'    => $obj->_model,
                                                        'level'    => 'error'] );
                                        }
                                        $cnt++;
                                        continue 2;
                                    }
                                }
                                $values[ $column ] = $workspace_id;
                            } else if ( in_array( $column, $passwords ) ) {
                                if ( $data[ $cnt ] ) {
                                    $value = password_hash( $data[ $cnt ], PASSWORD_BCRYPT );
                                    $values[ $column ] = $value;
                                }
                            } else {
                                $values[ $column ] = $data[ $cnt ];
                            }
                            $cnt++;
                        }
                        if ( $export_uuid ) {
                            $uuid_dir = $dirname . DS . 'texts' . DS . $export_uuid;
                            if ( $fmgr->exists( $uuid_dir ) ) {
                                $text_files = [];
                                PTUtil::file_find( $uuid_dir, $text_files );
                                if (! empty( $text_files ) ) {
                                    foreach ( $text_files as $text_file ) {
                                        if ( preg_match( "/\.txt$/", $text_file ) ) {
                                            $basename = basename( $text_file );
                                            $basename = preg_replace( "/\.txt$/", '', $basename );
                                            $values[ $basename ] = $fmgr->get( $text_file );
                                        }
                                    }
                                }
                            }
                        }
                        if ( $this->apply_theme ) {
                            if ( isset( $values[ $primary_col ] ) ) {
                                $obj_primary = $values[ $primary_col ];
                                $existing_terms = [ $primary => $obj_primary ];
                                if ( !isset( $workspace_id ) ) {
                                    $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
                                }
                                if ( $app->db->model( $model )->has_column( 'workspace_id' ) ) {
                                    $existing_terms['workspace_id'] = (int) $app->param( 'workspace_id' );
                                }
                                if ( $table->revisable ) {
                                    $existing_terms['rev_type'] = 0;
                                }
                                if ( $model == 'asset' && isset( $values['asset_extra_path'] ) && ( $values['asset_file_name'] ) ) {
                                    $existing_terms['extra_path'] = $values['asset_extra_path'];
                                    $existing_terms['file_name'] = $values['asset_file_name'];
                                }
                                $existing = $app->db->model( $model )->get_by_key( $existing_terms );
                                if ( $existing->id ) {
                                    $imported_objects[] = $existing;
                                    $this->skipped_objects[ $model ][] = $existing;
                                    $this->theme_skipped++;
                                    $msg = $app->translate(
                                      "The %s '%s' has been skipped because it already existed." ,
                                      [ $app->translate( $table->label ), $obj_primary ] );
                                    $app->log( ['message'  => $msg,
                                                'category' => 'import',
                                                'model'    => $model,
                                                'level'    => 'info'] );
                                    continue;
                                }
                            }
                        }
                        $obj = null;
                        $update_rels = [];
                        $exists = false;
                        $original = null;
                        $orig_relations = null;
                        $orig_metadata = null;
                        $orig_attachments = null;
                        $remove_files = [];
                        $revision_files = [];
                        if ( $id ) {
                            $obj = $app->db->model( $model )->load( $id );
                            if ( $obj ) {
                                if (! $app->can_do( $model, 'edit', $obj ) ) {
                                    $skip++;
                                    continue;
                                }
                                $exists = true;
                                $orig_relations = $app->get_relations( $obj );
                                $orig_metadata  = $app->get_meta( $obj );
                                $original = clone $obj;
                                $original->id( null );
                                $original->_relations = $orig_relations;
                                $original->_meta = $orig_metadata;
                                $orig_attachments = $app->get_related_objs(
                                    $obj, 'attachmentfile' );
                            }
                        } else {
                            $workspace = isset( $workspace_id )
                            && $workspace_id ? $app->db->model( 'workspace' )->load( $workspace_id )
                            : null;
                            if (! $app->can_do( $model, 'create', null, $workspace ) ) {
                                $skip++;
                                continue;
                            }
                            if ( $model === 'phrase' && isset( $values['phrase_phrase'] ) ) {
                                $obj = $app->db->model( $model )->get_by_key( ['phrase' => $values['phrase_phrase'] ] );
                            }
                        }
                        $is_new = $obj === null;
                        if (! $obj ) {
                            $obj = $app->db->model( $model )->new();
                            if ( $id ) {
                                $obj->id( $id );
                                $obj->_insert = true;
                            }
                        }
                        if ( $status !== null && $obj->has_column( 'status' ) ) {
                            $obj->status( $status );
                        }
                        if ( $this->apply_theme && $obj->has_column( 'workspace_id' ) ) {
                            $obj->workspace_id( (int) $app->param( 'workspace_id' ) );
                        }
                        foreach ( $values as $col => $value ) {
                            $col = preg_replace( "/^{$model}_/", '', $col );
                            if ( $obj->has_column( $col ) &&
                                ! isset( $relations[ $col ] ) ) {
                                $type = $column_defs[ $col ]['type'];
                                if ( $type == 'blob' ) {
                                    $blob_col = $app->db->model( 'column' )->get_by_key(
                                        ['table_id' => $table->id, 'name' => $col ] );
                                    $extra = $blob_col->extra;
                                    // $type = $blob_col->options;
                                    if ( $value === '' && $obj->id && $app->import_detach_binary ) {
                                        $metadata = $app->db->model( 'meta' )->get_by_key(
                                                 ['model' => $model, 'object_id' => $obj->id,
                                                  'kind' => 'metadata', 'key' => $col ] );
                                        $obj->$col('');
                                        if ( $app->publish_callbacks ) {
                                            $ctx = $app->ctx;
                                            $app->init_callbacks( 'blob', 'start_publish' );
                                            $file_unlink = true;
                                            $callback = ['name' => 'start_publish', 'model' => 'blob',
                                                         'object' => $obj, 'ctx' => $ctx, 'original' => $original,
                                                         'unlink' => $file_unlink ];
                                        }
                                        if ( $metadata->id ) {
                                            $metadata->remove();
                                            $urls = $app->db->model( 'urlinfo' )->load(
                                                ['class' => 'file','key' => $col,
                                                 'object_id' => $obj->id,'model' => $obj->_model ] );
                                            foreach ( $urls as $url ) {
                                                if ( $app->publish_callbacks ) {
                                                    $callback['urlinfo'] = $url;
                                                    $app->run_callbacks( $callback, 'blob', $file_unlink );
                                                }
                                                $url->remove();
                                            }
                                        }
                                    } else if ( strpos( $value, '%r' ) === 0 ) {
                                        if ( strpos( $value, ';' ) === false ) {
                                            $value .= ';';
                                        }
                                        list( $value, $label ) = preg_split( '/\;/', $value, 2 );
                                        $value = str_replace( '%r', $dirname, $value );
                                        $value = preg_replace( "/\//", DS, $value );
                                        if ( file_exists( $value ) ) {
                                            $error = '';
                                            $res = PTUtil::upload_check( $extra, $value, false, $error );
                                            if ( $this->print_state &&$res == 'resized' ) {
                                                echo $app->translate(
                                                "The image (%s) was larger than the size limit, so it was reduced.",
                                                htmlspecialchars( basename( $value ), ENT_COMPAT, 'UTF-8', false ) ), '<br>';
                                                flush();
                                            } else if ( $this->print_state && $error ) {
                                                echo $error, '<br>';
                                                flush();
                                            }
                                            if (! $error ) {
                                                if (! $obj->id ) {
                                                    $obj->$col( file_get_contents( $value ) );
                                                    if (! $obj->save() ) {
                                                        $db_errors = $app->db->errors;
                                                        $error = '';
                                                        if ( count( $db_errors ) ) {
                                                            $error = $db_errors[ count( $db_errors )-1 ];
                                                            list ( $error, $sql ) = explode( ',', $error );
                                                        }
                                                        $line = $primary ? $app->escape( $obj->$primary ) : null;
                                                        if ( $line ) {
                                                            $error_msg = $error ? $app->translate( "Saving %1\$s '%2\$s' failed(line %3\$s of %4\$s - %5\$s).",
                                                                    [ $app->translate( $table->label ), $line,
                                                                      $i + 1, $filename, $app->escape( $error ) ] )
                                                                      : $app->translate( "Saving %1\$s '%2\$s' failed(line %3\$s of %4\$s).",
                                                                    [ $app->translate( $table->label ), $line, $i + 1, $filename ] );
                                                        } else {
                                                            $error_msg = $error ? $app->translate( "Saving %1\$s failed(line %2\$s of %3\$s - %4\$s).",
                                                                    [ $app->translate( $table->label ),
                                                                      $i + 1, $filename, $app->escape( $error ) ] )
                                                                      : $app->translate( "Saving %1\$s failed(line %2\$s of %3\$s) .",
                                                                    [ $app->translate( $table->label ),
                                                                      $i + 1, $filename ] );
                                                        }
                                                        $faild++;
                                                        $log_info[] = $error_msg;
                                                        if ( $this->print_state ) {
                                                            echo $error_msg, '<br>';
                                                            flush();
                                                        } else {
                                                            $app->log( ['message'  => $error_msg,
                                                                        'category' => 'import',
                                                                        'model'    => $obj->_model,
                                                                        'level'    => 'error'] );
                                                        }
                                                        continue 2;
                                                    }
                                                }
                                                $label = $label ? $label : basename( $value );
                                                PTUtil::file_attach_to_obj(
                                                    $app, $obj, $col, $value, $label );
                                                $has_blob = true;
                                            }
                                        } else if ( $label ) {
                                            PTUtil::update_blob_label( $app, $obj, $col, $label );
                                        }
                                    }
                                } else if ( $type == 'datetime' ) {
                                    $value = $obj->db2ts( $value );
                                    $value = $obj->ts2db( $value );
                                    $obj->$col( $value );
                                } else if ( $table->primary && $type == 'int' && $col == 'parent_id' && $table->hierarchy && !is_numeric( $value ) ) {
                                    $paths = explode( '/', $value );
                                    $parent_id = 0;
                                    foreach ( $paths as $path ) {
                                        $terms['parent_id'] = $parent_id;
                                        $terms[ $table->primary ] = ['BINARY' => $path ];
                                        if ( $app->db->model( $model )->has_column( 'workspace_id' ) ) {
                                             $ws_id = $obj->workspace_id === null ? $app->param( 'workspace_id' ) : $obj->workspace_id;
                                             $ws_id = (int) $ws_id;
                                             $terms['workspace_id'] = $ws_id;
                                        }
                                        $refObj = $app->db->model( $model )->get_by_key( $terms );
                                        $parent_id = (int) $refObj->id;
                                    }
                                    $value = $parent_id ? $parent_id : 0;
                                    $obj->$col( $value );
                                } else if ( $type == 'int' ) {
                                    $edit_property = $edit_properties[ $col ] ?? null;
                                    $is_asset = false;
                                    if ( $edit_property ) {
                                        $edit_property = explode( ':', $edit_property );
                                        if ( $edit_property[0] === 'relation' && $edit_property[1] === 'asset' ) {
                                            $is_asset = true;
                                        }
                                    }
                                    if ( $is_asset && strpos( $value, '%r' ) === 0 && $app->export_int2label ) {
                                        $path = $value;
                                        if ( strpos( $path, ';' ) === false ) {
                                            $path .= ';';
                                        }
                                        list( $path, $label ) = preg_split( '/\;/', $path, 2 );
                                        $realpath = str_replace( '%r', $dirname, $path );
                                        $realpath = preg_replace( "/\//", DS, $realpath );
                                        if (! file_exists( $realpath ) ) {
                                            continue;
                                        }
                                        $ws_id = $obj->workspace_id ? $obj->workspace_id : $app->param( 'workspace_id' );
                                        $ws_id = is_numeric( $app->asset_workspace_id ) ? $app->asset_workspace_id : $ws_id;
                                        $ws_id = (int) $ws_id;
                                        $workspace = $ws_id ? $app->db->model( 'workspace' )->load( $ws_id ) : null;
                                        if (! $app->can_do( 'asset', 'create', null, $workspace ) ) {
                                            continue;
                                        }
                                        $url_terms = ['workspace_id' => $ws_id,
                                                      'relative_path' => $path,
                                                      'model' => 'asset'];
                                        $asset_obj = null;
                                        $url_obj = $app->db->model( 'urlinfo' )->get_by_key( $url_terms );
                                        if ( $url_obj->id ) {
                                            $asset_id = (int) $url_obj->object_id;
                                            $asset_obj = $app->db->model( 'asset' )->load( $asset_id );
                                        }
                                        $asset_data = file_get_contents( $realpath );
                                        $_is_new = false;
                                        $image_info = null;
                                        $ext = PTUtil::get_extension( $realpath, true );
                                        if ( in_array( $ext, $images ) ) {
                                            $image_info = getimagesize( $realpath );
                                        }
                                        $_updated = false;
                                        if (! $asset_obj ) {
                                            $asset_obj = $app->db->model( 'asset' )->new( ['workspace_id' => $ws_id ] );
                                            $asset_obj->file_name( basename( $path ) );
                                            $label = $label ? $label : basename( $path );
                                            $asset_obj->label( $label );
                                            $asset_obj->file( $asset_data );
                                            $app->set_default( $asset_obj );
                                            $asset_obj->save();
                                            PTUtil::file_attach_to_obj( $app, $asset_obj, 'file', $path, $label );
                                            $_is_new = true;
                                            $_updated = true;
                                        } else {
                                            $comp_new = md5( base64_encode( $asset_data ) );
                                            $comp_old = md5( base64_encode( $asset_obj->file ) );
                                            if ( $comp_new != $comp_old ) {
                                                $asset_obj->file( $asset_data );
                                                PTUtil::file_attach_to_obj( $app, $asset_obj, 'file', $path, $label );
                                                $_updated = true;
                                            }
                                        }
                                        if ( $_updated ) {
                                            $this->update_asset( $app, $asset_obj, $realpath, $path, $image_info );
                                            $asset_obj->save();
                                        }
                                        if ( $label ) {
                                            PTUtil::update_blob_label( $app, $asset_obj, 'file', $label );
                                        }
                                        if ( $app->id != 'RESTfulAPI' ) {
                                            $callback = ['name' => 'post_import', 'is_new' => $_is_new ];
                                            $app->run_callbacks( $callback, 'asset', $asset_obj );
                                        }
                                        $app->publish_obj( $asset_obj, null, false, true );
                                        $log_info[] =
                                            $_is_new
                                            ? $app->translate( 'Create %s (%s / ID : %s).',
                                            [ $app->translate( 'Asset' ),
                                              $asset_obj->label,
                                              $asset_obj->id ] )
                                            : $app->translate( 'Update %s (%s / ID : %s).',
                                            [ $app->translate( 'Asset' ),
                                              $asset_obj->label,
                                              $asset_obj->id ] );
                                        $obj->$col( $asset_obj->id );
                                    } else if ( in_array( $col, $attachment_cols ) ) {
                                        $blob_col = $app->db->model( 'column' )->get_by_key(
                                            ['table_id' => $table->id, 'name' => $col ] );
                                        $extra = $blob_col->extra;
                                        // $type = $blob_col->options;
                                        if ( strpos( $value, '%r' ) === 0 ) {
                                            if ( strpos( $value, ';' ) === false ) {
                                                $value .= ';';
                                            }
                                            list( $value, $label ) = preg_split( '/\;/', $value, 2 );
                                            $value = str_replace( '%r', $dirname, $value );
                                            $value = preg_replace( "/\//", DS, $value );
                                            if ( file_exists( $value ) ) {
                                                $error = '';
                                                $res = PTUtil::upload_check( $extra, $value, false, $error );
                                                if ( $this->print_state && $res == 'resized' ) {
                                                    echo $app->translate(
                                                    "The image (%s) was larger than the size limit, so it was reduced.",
                                                    htmlspecialchars( basename( $value ), ENT_COMPAT, 'UTF-8', false ) ), '<br>';
                                                    flush();
                                                } else if ( $this->print_state && $error ) {
                                                    echo $error, '<br>';
                                                    flush();
                                                }
                                                if (! $error ) {
                                                    $upload_info = PTUtil::get_upload_info( $app, $value, $error );
                                                    if (! $error ) {
                                                        if ( isset( $upload_info['thumbnail_small'] ) ) {
                                                            $thumbnail_small = $upload_info['thumbnail_small'];
                                                            if ( file_exists( $thumbnail_small ) ) {
                                                                PTUtil::remove_dir( dirname( $thumbnail_small ) );
                                                            }
                                                        }
                                                        $upload_info = $upload_info['metadata'];
                                                        $_is_new = false;
                                                        if ( $obj->id && $obj->$col ) {
                                                            $attachmentfile = $app->db->model( 'attachmentfile' )->get_by_key( ['id' => $obj->$col ] );
                                                            if ( $original && $table->revisable ) {
                                                                $clone_file = PTUtil::clone_object( $app, $attachmentfile );
                                                                $original->$col( $clone_file->id );
                                                                $revision_files[] = $clone_file;
                                                            }
                                                        } else {
                                                            $_is_new = true;
                                                            $attachmentfile = $app->db->model( 'attachmentfile' )->new();
                                                        }
                                                        $attachmentfile->name( $upload_info['file_name'] );
                                                        $attachmentfile->mime_type( $upload_info['mime_type'] );
                                                        $attachmentfile->class( $upload_info['class'] );
                                                        $attachmentfile->size( $upload_info['file_size'] );
                                                        $app->set_default( $attachmentfile );
                                                        $attachmentfile->save();
                                                        $label = $label ? $label : basename( $value );
                                                        PTUtil::file_attach_to_obj( $app, $attachmentfile, 'file', $value, $label );
                                                        if ( $app->id != 'RESTfulAPI' ) {
                                                            $callback = ['name' => 'post_import', 'is_new' => $_is_new ];
                                                            $app->run_callbacks( $callback, 'attachmentfile', $attachmentfile );
                                                        }
                                                        $app->publish_obj( $attachmentfile, null, false, true );
                                                        $obj->$col( $attachmentfile->id );
                                                        $attachment_files[] = $attachmentfile;
                                                        $log_info[] =
                                                            $_is_new
                                                            ? $app->translate( 'Create %s (%s / ID : %s).',
                                                            [ $app->translate( 'Attachment File' ),
                                                              $attachmentfile->name,
                                                              $attachmentfile->id ] )
                                                            : $app->translate( 'Update %s (%s / ID : %s).',
                                                            [ $app->translate( 'Attachment File' ),
                                                              $attachmentfile->name,
                                                              $attachmentfile->id ] );
                                                    }
                                                }
                                            } else if ( $label && $obj->$col ) {
                                                $attachmentfile = $app->db->model( 'attachmentfile' )->get_by_key( ['id' => $obj->$col ] );
                                                if ( $attachmentfile->id ) {
                                                    PTUtil::update_blob_label( $app, $attachmentfile, 'file', $label );
                                                }
                                            }
                                        }
                                    } else {
                                        if ( isset( $edit_properties[ $col ] ) ) {
                                            $edit_prop = $edit_properties[ $col ];
                                            if ( strpos( $edit_prop, 'relation:' ) === 0 ) {
                                                if ( preg_match( "/:hierarchy$/", $edit_prop ) ) {
                                                    $edit_prop = explode( ':', $edit_prop );
                                                    if ( $value && !is_numeric( $value ) ) {
                                                        $refModel = $edit_prop[1];
                                                        $can_create_folder = false;
                                                        $workspace = $obj->workspace ? $obj->workspace : null;
                                                        if ( $refModel == 'folder' && $obj->_model == 'page' ) {
                                                            $can_create_folder = $app->can_do( 'folder', 'create', null, $workspace );
                                                        }
                                                        $ref_model = $app->db->model( $refModel );
                                                        $refCol = $edit_prop[2];
                                                        $app->get_scheme_from_db( $refModel );
                                                        $terms = [];
                                                        if ( $ref_model->has_column( 'workspace_id' ) ) {
                                                            $workspace_id = $obj->workspace_id;
                                                            if (! $workspace_id && $app->workspace() ) {
                                                                $workspace_id = $app->workspace()->id;
                                                            }
                                                            $workspace_id = (int) $workspace_id;
                                                            if ( $this->apply_theme ) {
                                                                $terms = ['workspace_id' => (int) $app->param( 'workspace_id' ) ];
                                                            } else {
                                                                $terms = ['workspace_id' => $workspace_id ];
                                                            }
                                                        }
                                                        if ( $ref_model->has_column( 'rev_type' ) ) {
                                                            $terms = ['rev_type' => 0];
                                                        }
                                                        if ( strpos( $value, '/' ) === false ) {
                                                            $terms[ $refCol ] = ['BINARY' => $value ];
                                                            $count = $ref_model->count( $terms );
                                                            if ( $count > 1 && $ref_model->has_column( 'parent_id' ) ) {
                                                                $terms['parent_id'] = 0;
                                                            }
                                                            $refObj = $ref_model->load( $terms );
                                                            if (!empty( $refObj ) ) {
                                                                $refObj = $refObj[0];
                                                                $value = $refObj->id;
                                                            } else {
                                                                if ( $can_create_folder ) {
                                                                    $terms[ $refCol ] = $value;
                                                                    $refObj = $ref_model->get_by_key( $terms );
                                                                    $app->set_default( $refObj );
                                                                    $refObj->basename( PTUtil::make_basename( $refObj, $refObj->label ) );
                                                                    $refObj->save();
                                                                    $log_info[] =
                                                                        $app->translate( 'Create %s (%s / ID : %s).',
                                                                        [ $app->translate( 'Folder' ),
                                                                          $app->translate( $value ),
                                                                          $refObj->id ] );
                                                                    $value = $refObj->id;
                                                                } else {
                                                                    $value = '';
                                                                }
                                                            }
                                                        } else {
                                                            $paths = explode( '/', $value );
                                                            $parent_id = 0;
                                                            foreach ( $paths as $path ) {
                                                                $terms['parent_id'] = $parent_id;
                                                                $terms[ $refCol ] = ['BINARY' => $path ];
                                                                $refObj = $ref_model->get_by_key( $terms );
                                                                if (! $refObj->id ) {
                                                                    $terms[ $refCol ] = $path;
                                                                    $refObj = $ref_model->get_by_key( $terms );
                                                                    if ( $can_create_folder ) {
                                                                        $app->set_default( $refObj );
                                                                        $refObj->basename( PTUtil::make_basename( $refObj, $refObj->label ) );
                                                                        $refObj->save();
                                                                        $log_info[] =
                                                                            $app->translate( 'Create %s (%s / ID : %s).',
                                                                            [ $app->translate( 'Folder' ),
                                                                              $app->translate( $value ),
                                                                              $refObj->id ] );
                                                                    }
                                                                }
                                                                $parent_id = (int) $refObj->id;
                                                            }
                                                            $value = $parent_id ? $parent_id : '';
                                                        }
                                                    }
                                                } else if ( $value && $app->export_int2label ) {
                                                    $edit_opt = explode( ':', $edit_prop );
                                                    $ref_table = $app->get_table( $edit_opt[1] );
                                                    if ( is_object( $ref_table ) && $ref_table->primary ) {
                                                        $ref_primary = $ref_table->primary;
                                                        $ref_terms = [ $ref_primary => $value ];
                                                        $ref_model = $app->db->model( $edit_opt[1] );
                                                        if ( $ref_model->has_column( 'workspace_id' ) ) {
                                                            $ref_wsId = isset( $values['{$model}_workspace_id'] )
                                                                      ? $values["{$model}_workspace_id"] : (int) $app->param( 'workspace_id' );
                                                            $ref_terms['workspace_id'] = $ref_wsId;
                                                        }
                                                        if ( $ref_model->has_column( 'rev_type' ) ) {
                                                            $ref_terms['rev_type'] = 0;
                                                        }
                                                        $ref_obj = $ref_model->load( $ref_terms, ['limit' => 1] );
                                                        if ( is_array( $ref_obj ) && !empty( $ref_obj ) ) {
                                                            $ref_obj = $ref_obj[0];
                                                            $value = $ref_obj->id;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        $value = (int) $value;
                                        $obj->$col( $value );
                                    }
                                } else {
                                    $obj->$col( $value );
                                }
                            }
                        }
                        if (! $obj->id ) $obj->id( null );
                        if ( $is_new && $obj->has_column( 'workspace_id' ) && !$obj->workspace_id && $app->workspace() ) {
                            $obj->workspace_id( $app->workspace()->id );
                        }
                        $app->set_default( $obj );
                        if ( $is_new && $app->import_set_default ) {
                            foreach ( $default_vars as $defaultCol => $defaultValue ) {
                                if (! $obj->$defaultCol ) {
                                    $obj->$defaultCol( $defaultValue );
                                }
                            }
                        }
                        if ( $is_new && $obj->has_column( 'uuid' ) && $obj->uuid ) {
                            $uid_terms = ['uuid' => $obj->uuid ];
                            if ( $obj->id ) {
                                $uid_terms['id'] = ['!=' => $obj->id ];
                            }
                            $existing = $app->db->model( $obj->_model )->get_by_key( $uid_terms );
                            if ( $existing->id ) {
                                $obj->uuid( $app->generate_uuid( $obj->_model ) );
                            }
                        }
                        if ( $app->id != 'RESTfulAPI' ) {
                            $callback = ['name' => 'pre_import', 'values' => $values, 'is_new' => $is_new, 'format' => 'csv'];
                            $app->run_callbacks( $callback, $obj->_model, $obj, $original );
                        }
                        $line = $primary ? $app->escape( $obj->$primary ) : '(null)';
                        if (! $obj->save() ) {
                            $db_errors = $app->db->errors;
                            $error = '';
                            if ( count( $db_errors ) ) {
                                $error = $db_errors[ count( $db_errors )-1 ];
                                list ( $error, $sql ) = explode( ',', $error );
                            }
                            $error_msg = $error ? $app->translate( "Saving %1\$s '%2\$s' failed(line %3\$s of %4\$s - %5\$s).",
                                    [ $app->translate( $table->label ), $line,
                                      $i + 1, $filename, $app->escape( $error ) ] )
                                      : $app->translate( "Saving %1\$s '%2\$s' failed(line %3\$s of %4\$s).",
                                    [ $app->translate( $table->label ), $line, $i + 1, $filename ] );
                            $faild++;
                            $log_info[] = $error_msg;
                            if ( $this->print_state ) {
                                echo $error_msg, '<br>';
                                flush();
                            } else {
                                $app->log( ['message'  => $error_msg,
                                            'category' => 'import',
                                            'model'    => $obj->_model,
                                            'level'    => 'error'] );
                            }
                            continue;
                        }
                        if ( $is_new ) {
                            $insert++;
                        } else {
                            $update++;
                        }
                        if ( $this->print_state ) {
                            echo $app->translate( "Saving %s ( %s )...",
                                    [ $app->translate( $table->label ),
                                      htmlspecialchars( $line, ENT_COMPAT, 'UTF-8', false ) ] ), '<br>';
                            flush();
                        }
                        if ( $export_uuid && $custom_fields !== null && !empty( $custom_fields ) ) {
                            $object_fields = isset( $custom_fields[ $export_uuid ] )
                                           ? $custom_fields[ $export_uuid ] : null;
                            if ( is_array( $object_fields ) ) {
                                $metadata = $app->db->model( 'meta' )->load(
                                    ['object_id' => $obj->id, 'model' => $obj->_model, 'kind' => 'customfield' ] );
                                if (! empty( $metadata ) ) {
                                    $app->db->model( 'meta' )->remove_multi( $metadata );
                                }
                            }
                            $field_terms = ['workspace_id' => 0];
                            $field_args = [];
                            if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
                                $field_terms = ['workspace_id' => ['IN' => [0, $obj->workspace_id ] ] ];
                                $field_args = ['sort' => 'workspace_id', 'direction' => 'descend'];
                            }
                            $field_args['limit'] = 1;
                            if ( is_array( $object_fields ) && !empty( $object_fields ) ) {
                                foreach ( $object_fields as $object_field ) {
                                    if (! isset( $object_field['field_basename'] ) ) {
                                        continue;
                                    }
                                    $field_terms['basename'] = $object_field['field_basename'];
                                    $field = $app->db->model( 'field' )->load( $field_terms, $field_args, 'id' );
                                    if (! $field || empty( $field ) ) {
                                        if ( $this->print_state ) {
                                            echo $app->translate( "Field '%s' not found.", $object_field['field_basename'] ), '<br>';
                                            flush();
                                        }
                                        continue;
                                    }
                                    $object_field['field_id'] = $field[0]->id;
                                    if (! isset( $object_field['text'] ) && isset( $object_field['value'] ) ) {
                                        $object_field['text'] = json_encode( ['value' => $object_field['value'] ], JSON_UNESCAPED_UNICODE );
                                    } else if ( isset( $object_field['text'] ) ) {
                                        if ( is_array( $object_field['text'] ) ) {
                                            $object_field['text'] = json_encode( $object_field['text'], JSON_UNESCAPED_UNICODE );
                                        }
                                    }
                                    unset( $object_field['field_basename'] );
                                    $meta = $app->db->model( 'meta' )->new( $object_field );
                                    $meta->object_id( $obj->id );
                                    $meta->save();
                                }
                            }
                        }
                        $log_info[] = $is_new
                                    ? $app->translate( 'Create %s (%s / ID : %s).',
                                        [ $app->translate( $table->label ),
                                          $line, $obj->id ] )
                                    : $app->translate( 'Update %s (%s / ID : %s).',
                                        [ $app->translate( $table->label ),
                                          $line, $obj->id ] );
                        if (! empty( $relations ) ) {
                            foreach ( $relations as $key => $to_obj ) {
                                $app->get_scheme_from_db( $to_obj );
                                $col_name = "{$model}_{$key}";
                                if ( isset( $values[ $col_name ] ) ) {
                                    if ( $values[ $col_name ] && strpos( $values[ $col_name ], ',%r' ) !== false ) {
                                        $csv = explode( ',%r', $values[ $col_name ] );
                                        if ( count( $csv ) > 1 ) {
                                            // Contains ',' in Label
                                            foreach ( $csv as $idx => $var ) {
                                                if ( $idx ) {
                                                    $csv[ $idx ] = "%r{$var}";
                                                }
                                            }
                                        }
                                    } else {
                                        $csv = $values[ $col_name ] ? str_getcsv( $values[ $col_name ], ',', '"' ) : [];
                                    }
                                    if ( $to_obj == '__any__' ) {
                                        $to_obj = array_shift( $csv );
                                    }
                                    $to_table = $app->get_table( $to_obj );
                                    $to_model = $app->db->model( $to_obj );
                                    if (! $to_table ) continue;
                                    $to_primary = $to_table->primary;
                                    $is_hierarchy = false;
                                    if ( $to_table->hierarchy ) {
                                        $edit_prop = $edit_properties[ $key ];
                                        if ( strpos( $edit_prop, 'relation:' ) === 0 ) {
                                            if ( preg_match( "/:hierarchy$/", $edit_prop ) ) {
                                                $edit_prop = explode( ':', $edit_prop );
                                                $to_primary = $edit_prop[2];
                                                $is_hierarchy = true;
                                            }
                                        }
                                    }
                                    $to_ids = [];
                                    $workspace = $obj->workspace ? $obj->workspace : null;
                                    if ( !$is_new && empty( $csv ) ) {
                                        $obj_relations = $app->get_relations( $obj, $to_model, $key );
                                        if (! empty( $obj_relations ) ) {
                                            $app->db->model( 'relation' )->remove_multi( $obj_relations );
                                            $update_rels[ $key ] = true;
                                        }
                                    } else {
                                        if ( $to_obj != 'asset' && $to_obj != 'attachmentfile' ) {
                                            $can_create_cat = false;
                                            if ( $to_obj == 'category' && $obj->_model == 'entry' ) {
                                                $can_create_cat = $app->can_do( 'category', 'create', null, $workspace );
                                            }
                                            foreach ( $csv as $name ) {
                                                $rel_terms = [];
                                                if ( $obj->workspace_id && $to_model->has_column( 'workspace_id' ) ) {
                                                    if ( $this->apply_theme ) {
                                                        $rel_terms['workspace_id'] = (int) $app->param( 'workspace_id' );
                                                    } else {
                                                        $rel_terms['workspace_id'] = $obj->workspace_id;
                                                    }
                                                }
                                                if ( $to_table->revisable ) {
                                                    $rel_terms['rev_type'] = 0;
                                                }
                                                if ( $app->id == 'RESTfulAPI' ) {
                                                    if ( preg_match( '/^id=[0-9]{1,}$/', $name ) ) {
                                                        $rel_id = preg_replace( '/^id=/', '', $name );
                                                        $rel_id = (int) $rel_id;
                                                        $rel_terms = ['id' => $rel_id ];
                                                    }
                                                }
                                                if (! $is_hierarchy || strpos( $name, '/' ) === false ) {
                                                    $rel_terms[ $to_primary ] = ['BINARY' => $name ];
                                                    if ( $is_hierarchy && strpos( $name, '/' ) === false ) {
                                                        $count = $app->db->model( $to_obj )->count( $rel_terms );
                                                        if ( $count > 1 && $app->db->model( $to_obj )->has_column( 'parent_id' ) ) {
                                                            $rel_terms['parent_id'] = 0;
                                                        }
                                                    }
                                                    $rel = $app->db->model( $to_obj )->get_by_key( $rel_terms );
                                                    if ( $can_create_cat && ! $rel->id ) {
                                                        $rel_terms[ $to_primary ] = $name;
                                                        $rel = $app->db->model( $to_obj )->get_by_key( $rel_terms );
                                                        $rel->basename( PTUtil::make_basename( $rel, $rel->$to_primary ) );
                                                        $app->set_default( $rel );
                                                        $rel->save();
                                                        $log_info[] =
                                                            $app->translate( 'Create %s (%s / ID : %s).',
                                                            [ $app->translate( 'Category' ),
                                                              $app->translate( $name ),
                                                              $rel->id ] );
                                                    }
                                                } else {
                                                    $paths = explode( '/', $name );
                                                    $parent_id = 0;
                                                    foreach ( $paths as $path ) {
                                                        $rel_terms[ $to_primary ] = ['BINARY' => $path ];
                                                        $rel_terms['parent_id'] = $parent_id;
                                                        $rel = $app->db->model( $to_obj )->get_by_key( $rel_terms );
                                                        if (! $rel->id ) {
                                                            if ( $can_create_cat ) {
                                                                $rel_terms[ $to_primary ] = $path;
                                                                $rel = $app->db->model( $to_obj )->get_by_key( $rel_terms );
                                                                $rel->basename( PTUtil::make_basename( $rel, $rel->$to_primary ) );
                                                                $app->set_default( $rel );
                                                                $rel->save();
                                                                $log_info[] =
                                                                    $app->translate( 'Create %s (%s / ID : %s).',
                                                                    [ $app->translate( 'Category' ),
                                                                      $app->translate( $name ),
                                                                      $rel->id ] );
                                                            }
                                                        }
                                                        $parent_id = $rel->id;
                                                        if (! $parent_id ) {
                                                            break;
                                                        }
                                                    }
                                                }
                                                if ( $rel->id ) {
                                                    $to_ids[] = (int) $rel->id;
                                                } else {
                                                  if ( $to_obj === 'tag' || $to_obj === 'taxonomy' )
                                                  {
                                                    $can_do = $to_obj === 'tag'
                                                            ? $app->can_do( 'tag', 'create', null, $workspace )
                                                            : $app->can_do( 'taxonomy', 'create' );
                                                    if ( $can_do ) {
                                                        $name = PTUtil::normalize( $name );
                                                        $normalize = PTUtil::normalize_tag( $name );
                                                        $terms = ['normalize' => $normalize ];
                                                        if ( $to_obj === 'tag' ) {
                                                            $terms['class'] = $obj->_model;
                                                            if ( $this->apply_theme ) {
                                                                $terms['workspace_id'] = (int) $app->param( 'workspace_id' );
                                                            } else {
                                                                if ( $workspace ) {
                                                                    $terms['workspace_id'] = $workspace->id;
                                                                }
                                                            }
                                                        } else if ( $app->db->model( 'taxonomy' )->has_column( 'workspace_id', true ) ) {
                                                            $app->get_scheme_from_db( 'taxonomy' );
                                                            if ( $this->apply_theme ) {
                                                                $terms['workspace_id'] = (int) $app->param( 'workspace_id' );
                                                            } else {
                                                                if ( $workspace ) {
                                                                    $terms['workspace_id'] = $workspace->id;
                                                                }
                                                            }
                                                        }
                                                        if ( $app->db->model( $to_obj )->has_column( 'rev_type' ) ) {
                                                            // Tag Model is customized.
                                                            $terms['rev_type'] = 0;
                                                        }
                                                        $tag_obj = $app->db->model( $to_obj )->get_by_key( $terms );
                                                        if ( $tag_obj->id ) {
                                                            $to_ids[] = (int) $tag_obj->id;
                                                        } else {
                                                            $tag_obj->name( $name );
                                                            $app->set_default( $tag_obj );
                                                            $order = $app->get_order( $tag_obj );
                                                            $tag_obj->order( $order );
                                                            $tag_obj->save();
                                                            $to_ids[] = (int) $tag_obj->id;
                                                            $log_info[] =
                                                                $app->translate( 'Create %s (%s / ID : %s).',
                                                                [ $app->translate( $tag_obj->_model ),
                                                                  $app->translate( $name ),
                                                                  $tag_obj->id ] );
                                                        }
                                                    } else {
                                                        $skip++;
                                                    }
                                                  }
                                                }
                                            }
                                        } else {
                                            $ws_id = isset( $values["{$model}_workspace_id"] )
                                                          ? (int)$values["{$model}_workspace_id"] : 0;
                                            if (! $ws_id && $obj->workspace_id ) {
                                                $ws_id = (int) $obj->workspace_id;
                                            }
                                            $extra = '';
                                            if ( $to_obj == 'asset' ) {
                                                $asset_table = $app->get_table( 'asset' );
                                                $rel_column = $app->db->model( 'column' )->get_by_key(
                                                    ['table_id' => $asset_table->id, 'name' => 'file' ] );
                                                $extra = $rel_column->extra;
                                            } else {
                                                $rel_column = $app->db->model( 'column' )->get_by_key(
                                                    ['table_id' => $table->id, 'name' => $key ] );
                                                $extra = $rel_column->extra;
                                            }
                                            foreach ( $csv as $path ) {
                                                if ( $to_obj == 'asset' && $app->id == 'RESTfulAPI' ) {
                                                    if ( preg_match( '/^id=[0-9]{1,}$/', $path ) ) {
                                                        $rel_id = preg_replace( '/^id=/', '', $path );
                                                        $rel_id = (int) $rel_id;
                                                        $rel_asset = $app->db->model( 'asset' )->load( $rel_id, null, 'id' );
                                                        if ( $rel_asset ) {
                                                            $to_ids[] = (int) $rel_asset->id;
                                                        }
                                                        continue;
                                                    }
                                                }
                                                $error = '';
                                                $realpath = '';
                                                $label = '';
                                                if ( strpos( $path, '%r' ) === 0 ) {
                                                    if ( strpos( $path, ';' ) === false ) {
                                                        $path .= ';';
                                                    }
                                                    list( $path, $label ) = preg_split( '/\;/', $path, 2 );
                                                    $realpath = str_replace( '%r', $dirname, $path );
                                                    $realpath = preg_replace( "/\//", DS, $realpath );
                                                }
                                                if ( $realpath && file_exists( $realpath ) ) {
                                                    $res = PTUtil::upload_check( $extra, $realpath, false, $error );
                                                    if ( $this->print_state && $res == 'resized' ) {
                                                        echo $app->translate(
                                                        "The image (%s) was larger than the size limit, so it was reduced.",
                                                        htmlspecialchars( basename( $path ) ) ), '<br>';
                                                        flush();
                                                    } else if ( $this->print_state && $error ) {
                                                        echo $error, '<br>';
                                                        flush();
                                                        continue;
                                                    }
                                                }
                                                if ( $this->apply_theme ) {
                                                    $url_terms = ['workspace_id' => (int) $app->param( 'workspace_id' ),
                                                                  'relative_path' => $path,
                                                                  'model' => $to_obj ];
                                                } else {
                                                    // Support asset_workspace_id.
                                                    $ws_id = is_numeric( $app->asset_workspace_id ) ? $app->asset_workspace_id : $ws_id;
                                                    $url_terms = ['workspace_id' => $ws_id,
                                                                  'relative_path' => $path,
                                                                  'model' => $to_obj ];
                                                }
                                                $asset_obj = null;
                                                if ( $to_obj != 'attachmentfile' ) {
                                                    $url_obj =
                                                        $app->db->model( 'urlinfo' )->get_by_key( $url_terms );
                                                    if ( $url_obj->id ) {
                                                        $asset_id = (int) $url_obj->object_id;
                                                        $asset_obj = $app->db->model( $to_obj )->load( $asset_id );
                                                    }
                                                } else {
                                                    $basename = basename( $path );
                                                    if ( $orig_attachments ) {
                                                        foreach ( $orig_attachments as $orig_rel ) {
                                                            if ( $orig_rel->name == $basename ) {
                                                                $asset_obj = $orig_rel;
                                                                if ( $original && $table->revisable ) {
                                                                    $remove_files[] = $asset_obj;
                                                                    $asset_obj = PTUtil::clone_object( $app, $asset_obj );
                                                                }
                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                                $orig_path = $path;
                                                $path = str_replace( '%r', $dirname, $path );
                                                $_update = false;
                                                $orig_asset_obj = null;
                                                $_is_new = false;
                                                if ( $asset_obj ) {
                                                    if ( $to_obj == 'attachmentfile' ||
                                                         $app->can_do( $to_obj, 'edit', $asset_obj ) ) {
                                                        $to_ids[] = (int) $asset_obj->id;
                                                        if ( file_exists( $path ) ) {
                                                            $asset_data = file_get_contents( $path );
                                                            $comp_new = md5( base64_encode( $asset_data ) );
                                                            $comp_old = md5( base64_encode( $asset_obj->file ) );
                                                            if ( $comp_new != $comp_old ) {
                                                                $asset_obj->file( $asset_data );
                                                                $_update = true;
                                                            }
                                                        }
                                                    } else {
                                                        $skip++;
                                                    }
                                                    if ( $label ) {
                                                        PTUtil::update_blob_label( $app, $asset_obj, 'file', $label );
                                                    }
                                                } else {
                                                    if ( file_exists( $path ) ) {
                                                        // Create new asset
                                                        $workspace = $ws_id ? $app->db->model( 'workspace' )->load( $ws_id )
                                                                   : null;
                                                        if ( $to_obj == 'attachmentfile'
                                                            || $app->can_do( $to_obj, 'create', null, $workspace ) ) {
                                                            if ( $this->apply_theme ) {
                                                                $asset_obj = $app->db->model( $to_obj )->new(
                                                                      ['workspace_id' => (int) $app->param( 'workspace_id' ) ] );
                                                            } else {
                                                                $asset_obj = $app->db->model( $to_obj )->new(
                                                                      ['workspace_id' => $ws_id ] );
                                                            }
                                                            $app->set_default( $asset_obj );
                                                            $asset_obj->$to_primary( basename( $path ) );
                                                            $label = $label ? $label : basename( $path );
                                                            if ( $asset_obj->has_column( 'name' ) ) {
                                                                $asset_obj->name( $label );
                                                            } else if ( $asset_obj->has_column( 'label' ) ) {
                                                                $asset_obj->label( $label );
                                                            }
                                                            $asset_obj->save();
                                                            PTUtil::file_attach_to_obj(
                                                                $app, $asset_obj, 'file', $path, $label );
                                                            $to_ids[] = (int) $asset_obj->id;
                                                            $_update = true;
                                                            $_is_new = true;
                                                        } else {
                                                            $skip++;
                                                        }
                                                    }
                                                }
                                                if ( $_update && $asset_obj ) {
                                                    // Update meta objs
                                                    $image_info = null;
                                                    $ext = PTUtil::get_extension( $orig_path, true );
                                                    if ( in_array( $ext, $images ) ) {
                                                        $image_info = getimagesize( $path );
                                                    }
                                                    $this->update_asset(
                                                        $app, $asset_obj, $path, $orig_path, $image_info );
                                                    $app->set_default( $asset_obj );
                                                    $asset_obj->save();
                                                    $app->init_callbacks( $to_obj, 'post_import' );
                                                    $callback = ['name' => 'post_import', 'is_new' => $_is_new, 'format' => 'csv'];
                                                    $app->run_callbacks( $callback, $to_obj, $asset_obj );
                                                    $app->publish_obj( $asset_obj, null, false, true );
                                                    // $app->post_save_asset( $callback, $app, $asset_obj );
                                                    $log_label = $to_obj == 'asset' ? 'Asset' : 'Attachment File'; 
                                                    $log_info[] =
                                                        $_is_new
                                                        ? $app->translate( 'Create %s (%s / ID : %s).',
                                                        [ $app->translate( $log_label ),
                                                          $asset_obj->$to_primary,
                                                          $asset_obj->id ] )
                                                        : $app->translate( 'Update %s (%s / ID : %s).',
                                                        [ $app->translate( $log_label ),
                                                          $asset_obj->$to_primary,
                                                          $asset_obj->id ] );
                                                }
                                                if ( $asset_obj !== null && $to_obj == 'attachmentfile' ) {
                                                    $attachment_files[] = $asset_obj;
                                                }
                                            }
                                        }
                                        $args = ['from_id' => $obj->id, 
                                                 'name' => $key,
                                                 'from_obj' => $model,
                                                 'to_obj' => $to_obj ];
                                        if ( $res = $app->set_relations( $args, $to_ids, false, $errors ) ) {
                                            $update_rels[ $key ] = true;
                                        }
                                    }
                                }
                            }
                        }
                        $imported_objects[] = $obj;
                        // $app->publish_obj( $obj, $original );
                        if ( $table->revisable && $exists ) {
                            if ( PTUtil::pack_revision( $obj, $original, $update_rels ) ) {
                                if (! empty( $remove_files ) ) {
                                    foreach ( $remove_files as $remove_file ) {
                                        $remove_file->remove();
                                    }
                                }
                            } else {
                                if (! empty( $revision_files ) ) {
                                    foreach ( $revision_files as $remove_file ) {
                                        $remove_file->remove();
                                    }
                                }
                            }
                        }
                        if ( $app->id != 'RESTfulAPI' ) {
                            if (! empty( $attachment_files ) ) {
                                $file_status = 4;
                                if ( $obj->has_column( 'status' ) ) {
                                    $obj_status = $obj->status;
                                    $publish_status = $app->status_published( $obj->_model );
                                    $file_status = $obj_status == $publish_status ? 4 : $obj_status;
                                }
                                foreach ( $attachment_files as $attachment ) {
                                    if ( $attachment->status != $file_status ) {
                                        $attachment->status( $file_status );
                                        $attachment->save();
                                    }
                                }
                            }
                            if ( $obj->has_column( 'status' ) ) {
                                if ( $status_published && $obj->status != $status_published ) {
                                    $app->publish_obj( $obj, $original );
                                } else if ( $has_blob ) {
                                    $app->publish_obj( $obj, $original, false, true );
                                }
                            } else {
                                $app->publish_obj( $obj, $original );
                            }
                            $callback = ['name' => 'post_import', 'values' => $values, 'is_new' => $is_new, 'format' => 'csv'];
                            $app->run_callbacks( $callback, $obj->_model, $obj, $original );
                        }
                    }
                    $i++;
                }
                // fclose( $fh );
            }
        }
        $msg = '';
        $plural = $app->translate( $plural );
        if ( $insert || $update ) {
            $msg = $faild ? 
                $app->translate(
                'Import %s successfully( Insert : %s, Update : %s, Error : %s ).',
                    [ $plural, $insert, $update, $faild ] )
                 : $app->translate(
                'Import %s successfully( Insert : %s, Update : %s ).',
                    [ $plural, $insert, $update ] );
        } else {
            if (! $skip && ! $this->apply_theme ) {
                $msg = $app->translate(
                    'Could not import %s. Please check upload file format.', $plural );
            }
        }
        if ( $skip ) {
            $msg .= $app->translate(
                '%s object(s) were skipped because you have not permission.', $skip );
        }
        if ( $this->print_state ) {
            echo '<hr>', $msg;
            flush();
        }
        if ( $wait_import ) {
            $wait_import->text( $msg );
            $wait_import->save();
        }
        if ( $msg && $app->id != 'RESTfulAPI' ) {
            $app->log( ['message'  => $msg,
                        'category' => 'import',
                        'model'    => $model,
                        'metadata' => json_encode( $log_info, JSON_UNESCAPED_UNICODE ),
                        'level'    => 'info'] );
        }
        return $imported_objects;
    }

    function wait_import ( $app ) {
        $app->validate_magic();
        $session_id = $app->param( 'session_id' );
        $model = $app->param( 'model' );
        $session = $app->db->model( 'session' )->get_by_key(
            ['name' => $session_id, 'kind' => 'IM', 'user_id' => $app->user()->id, 'key' => $model ] );
        if (! $session->id ) {
            return $app->error( 'Invalid request.' );
        }
        $table = $app->get_table( $model );
        if (! $table ) {
            return $app->error( 'Invalid request.' );
        }
        $text = $session->text;
        $ctx = $app->ctx;
        $ctx->vars['model'] = $model;
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $ctx->vars['workspace_id'] = $workspace_id;
        $ctx->vars['message'] = $session->text;
        $ctx->vars['page_title'] =
        $app->translate( 'Importing %s...', $app->translate( $table->plural ) );
        if ( $session->text ) {
            if ( $session->value ) {
                $ctx->vars['error'] = 1;
            }
            $session->remove();
        }
        $app->build_page( 'wait_import.tmpl' );
        exit();
    }

    function update_asset ( $app, $obj, $file, $path, $image_info = null ) {
        $path_relative = preg_replace( "/^%r\//", "", $path );
        $extra_path = dirname( $path_relative ) . '/';
        $file_ext = PTUtil::get_extension( $path_relative );
        $mime_type = PTUtil::get_mime_type( $file_ext );
        $class = PTUtil::get_asset_class( $file_ext );
        $image_width = null;
        $image_height = null;
        if ( $image_info ) {
            if ( isset( $image_info['mime'] ) ) {
                $mime_type = $image_info['mime'];
            }
            $image_width  = $image_info[0];
            $image_height = $image_info[1];
        }
        if (! $obj->label ) {
            $label = basename( $path_relative );
            $obj->label( $label );
        }
        $file_name = basename( $path_relative );
        $basename = pathinfo( $path_relative, PATHINFO_FILENAME );
        $size = strlen( bin2hex( $obj->file ) ) / 2;
        $obj->set_values(
            ['extra_path' => $extra_path,
             'class' => $class, 'size' => $size, 'file_name' => $file_name,
             'file_ext' => $file_ext, 'mime_type' => $mime_type ] );
        if ( $image_width ) {
            $obj->image_width( $image_width );
        }
        if ( $image_height ) {
            $obj->image_height( $image_height );
        }
        $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $obj->_model,
             'object_id' => $obj->id, 'kind' => 'metadata', 'key' => 'file'] );
        $metadata = ['file_size' => $size, 'image_width' => $image_width,
                     'image_height' => $image_height, 'class' => $class,
                     'extension' => $file_ext, 'basename' => $basename,
                     'mime_type' => $mime_type, 'file_name' => $file_name ];
        $metadata['uploaded'] = date( 'Y-m-d H:i:s' );
        $metadata['user_id'] = $app->user()->id;
        if ( $class == 'image' ) {
            $thumbnail_square = PTUtil::make_thumbnail( $file, 128, 'auto', 100, true );
            $thumbnail_small = PTUtil::make_thumbnail( $file, 256, 'auto', 100, false );
            $meta->metadata( file_get_contents( $thumbnail_square ) );
            $meta->data( file_get_contents( $thumbnail_small ) );
            if ( $app->assets_c && is_dir( $app->assets_c ) ) {
                $asset_id = $obj->id;
                $model = $obj->_model;
                $thumb_name = "thumb-{$model}-128xauto-square-{$asset_id}-file.{$file_ext}";
                copy( $thumbnail_square, $app->assets_c . DS . $thumb_name );
            }
        }
        if (! isset( $metadata['label'] ) ) {
            $metadata['label'] = $obj->label;
        }
        $meta->text( json_encode( $metadata ) );
        $meta->save();
    }

    function pause ( $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        echo "<script>window.parent.importDone = true;</script>";
        if ( $app->txn_active ) {
            $app->db->rollback();
            $app->txn_active = false;
        }
        exit();
    }

    function upload_objects ( $app ) {
        if ( empty( $_FILES ) ) {
            $app->json_error( 'Please check the file size and data.' );
        }
        $app->db->caching = false;
        $app->validate_magic( true );
        if (! $app->can_do( 'import_objects' ) ) {
            $error = $app->translate( 'Permission denied.' );
            header( 'Content-type: application/json' );
            echo json_encode( ['message'=> $error ] );
            exit();
        }
        $magic = $app->magic() . '-file';
        $upload_dir = $this->upload_dir( $app, $app->param( 'request_id' ) );
        $options = ['upload_dir' => $upload_dir . DS, 'prototype' => $app,
                    'magic' => $magic, 'user_id' => $app->user()->id,
                    'session_no_data' => true];
        $name = $_FILES['files']['name'];
        $extension = PTUtil::get_extension( $name );
        if (! in_array( $extension, $this->allowed ) ) {
            $error = $app->translate( 'Invalid File extension\'%s\'.', $extension );
            header( 'Content-type: application/json' );
            echo json_encode( ['message'=> $error ] );
            exit();
        }
        require_once( LIB_DIR . 'jQueryFileUpload' . DS . 'UploadHandler.php' );
        $upload_handler = new UploadHandler( $options );
    }

    function upload_dir ( $app, $basename ) {
        $upload_dir = $app->temp_dir;
        if ( $upload_dir ) {
            $upload_dir = rtrim( $upload_dir, DS );
            $upload_dir .= DS;
        }
        if (!$upload_dir ) $upload_dir =  dirname( $app->pt_path ) . DS . 'tmp' . DS;
        $upload_dir .= 'pt_' . $basename;
        if (! is_dir( $upload_dir ) ) mkdir( $upload_dir . DS, 0777, true );
        return $upload_dir;
    }
}