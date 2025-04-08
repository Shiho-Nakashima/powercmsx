<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
if (! defined( 'MB_ENCODE_NUMERICENTITY_MAP' ) ) {
    define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );
}

class SearchEstraier extends PTPlugin {

    private $estcmd_path= null;
    private $data_dir = '';
    public  $update_indexes = [];
    private $mecab_path = null;
    private $mecab_userdic = '';
    private $work_dir = '';
    private $meta_index = null;
    public  $extract = null;
    private $init_get_draft = false;
    protected $ts_job = null;
    protected $commands = [];
    private $insert_queue = false;
    private $keywords = [];
    private $rules_banned_words = [];
    private $notation_rules = [];
    public  $tmp_map = [];
    public  $work_dir_map = [];
    public  $update_idx = false;
    public  $pid = null;

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $searchestraier_estcmd_path = $app->searchestraier_estcmd_path;
        if (! $searchestraier_estcmd_path ) {
            $config = $this->path() . DS . 'config.json';
            $app->configure_from_json( $config );
        }
        if ( $this->estcmd_path( $app ) ) {
            return true;
        }
        $errors[] = $this->translate( 'The plugin SearchEstraier cannot be enabled because Hyper Estraier is not installed.' );
        return false;
    }

    function estcmd_path ( $app ) {
        if ( $this->estcmd_path !== null ) {
            return $this->estcmd_path;
        }
        if (! $app->searchestraier_estcmd_path ) {
            $this->estcmd_path= '';
            $app->searchestraier_estcmd_path = null;
            return false;
        }
        $estcmd_path = escapeshellcmd( $app->searchestraier_estcmd_path );
        $test = "{$estcmd_path} version";
        exec( $test, $output, $return_var );
        if ( $return_var === 0 ) {
            $this->estcmd_path = $estcmd_path;
            return $estcmd_path;
        } else {
            $this->estcmd_path= null;
            $app->searchestraier_estcmd_path = null;
            return false;
        }
    }

    function mecab_path ( $app ) {
        if ( $this->mecab_path !== null ) {
            return $this->mecab_path;
        }
        $return_var = 0;
        $mecab_path = escapeshellcmd( $app->searchestraier_mecab_path );
        if (! $mecab_path ) {
            $this->mecab_path = '';
            return false;
        }
        if ( basename( $mecab_path ) != 'mecab' && basename( $mecab_path ) != 'mecab.exe' ) {
            $this->mecab_path = '';
            $app->searchestraier_mecab_path = null;
            return false;
        }
        $test = "{$mecab_path} -v";
        exec( $test, $output, $return_var );
        if ( $return_var === 0 ) {
            $this->mecab_path = $mecab_path;
            $userdic = $app->searchestraier_mecab_userdic;
            if ( $userdic ) {
                if ( strpos( $userdic, "\r" ) !== false || strpos( $userdic, "\n" ) !== false ) {
                } else {
                    if ( file_exists( $userdic ) ) {
                        $class_name= 'Mecab\Tagger';
                        if (! class_exists( $class_name ) ) {
                            $userdic = escapeshellarg( $userdic );
                        }
                        $this->mecab_userdic = $userdic;
                    }
                }
            }
            return $mecab_path;
        }
        $app->searchestraier_mecab_path = null;
        $this->mecab_path = '';
        return false;
    }

    function searchestraier_pre_run ( $app ) {
        if ( $app->mode !== 'manage_plugins' ) {
            return;
        }
        if ( $app->param( 'plugin_id' ) !== 'searchestraier' || !$app->param( 'edit_settings' ) ) {
            return;
        }
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $data_dir = $this->get_config_value( 'searchestraier_data_dir', $workspace_id );
        $data_dir = $app->build( $data_dir );
        if (! $data_dir || !is_dir( $data_dir ) ) {
            return;
        }
        $data_dir = rtrim( $data_dir, DS );
        $index = $data_dir . DS . '_list';
        if (! file_exists( $index ) ) {
            return;
        }
        $app->ctx->vars['index_mtime'] = date( 'Y-m-d H:i:s', filemtime( $index ) );
    }

    function searchestraier_debug ( $app ) {
        $tmpl = $app->ctx->get_template_path( 'searchestraier_debug.tmpl' );
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $data_dir = $this->get_config_value( 'searchestraier_data_dir', $workspace_id );
        $data_dir = $app->build( $data_dir );
        if (! $data_dir || !is_dir( $data_dir ) ) {
            return $app->error( 'An error occurred.' );
        }
        $estcmd_path = $this->estcmd_path( $app );
        if (! $estcmd_path ) {
            return $app->error( 'An error occurred.' );
        }
        $data_dir = escapeshellarg( $data_dir );
        if ( $app->param( '_type' ) === 'get' ) {
            $url = escapeshellarg( $app->param( 'url' ) );
            $command = "{$estcmd_path} get {$data_dir} {$url}";
            $res = shell_exec( $command );
            if (! $res ) {
                return $app->error( 'An error occurred.' );
            }
            $app->ctx->vars['page_title'] = $this->translate( 'Results for estcmd get' );
            $app->ctx->vars['estcmd_get_result'] = $res;
            echo $app->build_page( $tmpl );
            exit();
        }
        $command = "{$estcmd_path} list {$data_dir}";
        $res = shell_exec( $command );
        $list = !$res ? [] : explode( PHP_EOL, trim( str_replace( "\t", '#', $res ) ) );
        $app->ctx->vars['page_title'] = $this->translate( 'Results for estcmd list' );
        $app->ctx->vars['estcmd_list_result'] = $list;
        echo $app->build_page( $tmpl );
    }

    function searchestraier_post_run ( $app ) {
        $estcmd_path = $this->estcmd_path( $app );
        if (! $estcmd_path ) {
            return;
        }
        if ( $ts_job = $this->ts_job ) {
            if ( $ts_job->has_column( 'status', true ) && $ts_job->status != 2 ) {
                $ts_job->status( 2 );
                $ts_job->save();
            }
        }
        $cp = substr( PHP_OS, 0, 3 ) != 'WIN' ? exec( 'which cp' ) : null;
        $fmgr = $app->fmgr;
        $update_indexes = $this->update_indexes;
        if (! empty( $update_indexes ) ) {
            $can_mecab = $this->mecab_path( $app );
            $upload_dir = $app->upload_dir();
            foreach ( $update_indexes as $path => $bool ) {
                if ( $app->searchestraier_use_tmp ) {
                    $_path = trim( $path, "'" );
                    $tmp = $upload_dir . DS . md5( $_path );
                    $res = $this->copy( $_path, $tmp, $cp, $app );
                    if (! $res ) {
                        continue;
                    }
                    $_tmp = escapeshellarg( $tmp );
                    if ( $app->searchestraier_use_reccomend ) {
                        $command = $can_mecab ? "{$estcmd_path} extkeys -um {$_tmp}" : "{$estcmd_path} extkeys {$_tmp}";
                        $this->update_url( $command, 90 );
                    }
                    if ( $app->searchestraier_idx_optimize ) {
                        $command = "{$estcmd_path} optimize {$_tmp}";
                        $this->update_url( $command, 120 );
                    }
                    $res = $this->copy( $tmp, "{$_path}.tmp", $cp, $app );
                    if (! $res ) {
                        continue;
                    }
                    while (! is_dir( "{$_path}.tmp" ) ) {
                        usleep( 300000 );
                    }
                    $fmgr->rename( $_path, "{$_path}.backup" );
                    $res = $this->copy( "{$_path}.tmp", $_path, $cp, $app );
                    if (! $res ) {
                        // Recover from Back up when copy failed.
                        $fmgr->rename( "{$_path}.backup", $_path );
                        continue;
                    }
                    $fmgr->rmdir( "{$_path}.backup" );
                    $fmgr->rmdir( "{$_path}.tmp" );
                } else {
                    if ( $app->searchestraier_use_reccomend ) {
                        $command = $can_mecab ? "{$estcmd_path} extkeys -um {$path}" : "{$estcmd_path} extkeys {$path}";
                        $this->update_url( $command, 90 );
                    }
                    if ( $app->searchestraier_idx_optimize ) {
                        $command = "{$estcmd_path} optimize {$path}";
                        $this->update_url( $command, 120 );
                    }
                }
            }
        }
        $start_time = time();
        if ( $app->id === 'Worker' ) {
            $session = $app->db->model( 'session' )->new( ['name' => 'searchestraier_update_idx', 'kind' => 'SE'] );
            $session->start( $start_time );
            $session->expires( $start_time + $app->sess_timeout ); // 86400
            $session->save();
            foreach ( $this->tmp_map as $index => $out ) {
                if (!is_dir( $out ) ) {
                    continue;
                }
                if ( $app->searchestraier_idx_backup && $this->update_idx ) {
                    if ( $fmgr->exists( "{$index}.bk" ) ) {
                        if ( is_dir( "{$index}.bk" ) ) {
                            $fmgr->rmdir( "{$index}.bk" );
                        } else {
                            $fmgr->unlink( "{$index}.bk" );
                        }
                    }
                    $this->copy( $out, "{$index}.bk", $cp, $app );
                }
                $res = $this->copy( $out, "{$index}.tmp", $cp, $app );
                if ( $res ) {
                    // Rename index when Successfuly copied.
                    if ( $fmgr->exists( $index ) && is_dir( $index ) ) {
                        $fmgr->rename( $index, "{$index}.backup" );
                    }
                    $fmgr->rename( "{$index}.tmp", $index );
                    if ( $fmgr->exists( "{$index}.backup" ) ) {
                        $fmgr->rmdir( "{$index}.backup" );
                    }
                    if ( $fmgr->exists( "{$index}.tmp" ) ) {
                        $fmgr->rmdir( "{$index}.tmp" );
                    }
                    $app->remove_dirs[] = dirname( $out );
                    $fmgr->rmdir( $out );
                }
            }
            $session->remove();
        }
        $updates = $fmgr->update_paths;
        $workspace_indexes = [];
        $data_dirs = [];
        if (!empty( $updates ) ) {
            $session = $app->db->model( 'session' )->new( ['name' => 'searchestraier_update_idx', 'kind' => 'SE'] );
            $session->start( $start_time );
            $session->expires( $start_time + $app->sess_timeout ); // 86400
            $session->save();
            foreach ( $updates as $path => $data ) {
                if ( $data !== false ) {
                    continue;
                }
                $urls = $app->db->model( 'urlinfo' )->load( ['file_path' => $path ] );
                foreach ( $urls as $ui ) {
                    $data_dir = null;
                    if ( isset( $workspace_indexes[ $ui->workspace_id ] ) ) {
                        $data_dir = $workspace_indexes[ $ui->workspace_id ];
                        $data_dir = $data_dirs[ $data_dir ];
                    } else {
                        $data_dir = $this->get_config_value( 'searchestraier_data_dir', $ui->workspace_id );
                        $data_dir = $app->build( $data_dir );
                        if (! $data_dir || !is_dir( $data_dir ) ) {
                            continue;
                        }
                        $upload_dir = $app->upload_dir();
                        $tmp_dir = $upload_dir . DS . 'index.tmp';
                        $res = $this->copy( $data_dir, $tmp_dir, $cp, $app );
                        if (! $res ) {
                            continue;
                        }
                        $data_dirs[ $data_dir ] = $tmp_dir;
                        $workspace_indexes[ $ui->workspace_id ] = $data_dir;
                        $data_dir = $tmp_dir;
                    }
                    $data_dir = escapeshellarg( $data_dir );
                    $url = escapeshellarg( $ui->url );
                    $command = "{$estcmd_path} out {$data_dir} {$url}";
                    $res = $this->update_url( $command, $ui, $app );
                }
            }
            foreach ( $data_dirs as $index => $out ) {
                if (!is_dir( $out ) ) {
                    continue;
                }
                if ( $app->searchestraier_idx_backup && $this->update_idx ) {
                    if ( $fmgr->exists( "{$index}.bk" ) ) {
                        if ( is_dir( "{$index}.bk" ) ) {
                            $fmgr->rmdir( "{$index}.bk" );
                        } else {
                            $fmgr->unlink( "{$index}.bk" );
                        }
                    }
                    $res = $this->copy( $out, "{$index}.bk", $cp, $app );
                    if (! $res ) {
                        continue;
                    }
                }
                if ( $fmgr->exists( $index ) && is_dir( $index ) ) {
                    $fmgr->rename( $index, "{$index}.backup" );
                }
                $fmgr->rename( $out, $index );
                if ( $fmgr->exists( "{$index}.backup" ) ) {
                    $fmgr->rmdir( "{$index}.backup" );
                }
            }
            $session->remove();
        }
        if ( $this->update_idx ) {
            $sessions = $app->db->model( 'session' )->load( ['name' => 'searchestraier_update_idx', 'kind' => 'SE'] );
            foreach ( $sessions as $session ) {
                $session->remove();
            }
        }
        if ( $this->work_dir ) {
            if ( $this->update_idx || (!$app->searchestraier_use_queue && !$this->insert_queue ) ) {
                PTUtil::remove_empty_dirs( [ $this->work_dir ] );
            }
        }
    }

    function searchestraier_start_publish ( $cb, $app, $unlink ) {
        if ( $app->mode == 'rebuild_phase' && !$app->searchestraier_re_index_at_rebuild ) {
            return true;
        }
        $ui = $cb['urlinfo'];
        $obj = $cb['object'];
        $original = isset( $cb['original'] ) ? $cb['original'] : clone $obj;
        $update = false;
        if ( $ui->delete_flag ) {
            $unlink = true;
        } else if (! $unlink && $obj && $obj->has_column( 'status' ) ) {
            $status_published = $app->status_published( $obj->_model );
            if ( $obj->status != $status_published ) {
                $unlink = true;
            } else {
                $unlink = false;
            }
            if ( $unlink || ( $original && $original->status != $status_published ) ) {
                $ui->md5 = '';
                $update = true;
            }
        }
        if ( $ui->publish_file != 6 && $ui->publish_file != 3 && ! $unlink ) {
            if ( $update ) {
                $ui->save();
            }
            return true;
        }
        $estcmd_path = $this->estcmd_path( $app );
        if (! $estcmd_path ) {
            return true;
        }
        $workspace_id = (int) $ui->workspace_id;
        $archive_types = $this->get_config_value( 'searchestraier_archive_types', $workspace_id );
        if (! $archive_types ) {
            return true;
        }
        $archive_types = preg_split( '/\s*,\s*/', $archive_types );
        if (! in_array( $ui->archive_type, $archive_types ) ) {
            return true;
        }
        $enabled = $this->get_config_value( 'searchestraier_enabled', $workspace_id );
        if (! $enabled ) {
            return true;
        }
        $data_dir = $this->get_config_value( 'searchestraier_data_dir', $workspace_id );
        $data_dir = $app->build( $data_dir );
        if (! $data_dir || !is_dir( $data_dir ) ) {
            return true;
        }
        $url = escapeshellarg( $ui->url );
        $this->data_dir = $data_dir;
        $data_dir = escapeshellarg( $data_dir );
        $delete = $app->searchestraier_use_queue ? false : true;
        $this->work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir( $delete );
        if ( $ui->urlmapping_id ) {
            $removed_uis = $app->db->model( 'urlinfo' )->load(
              ['model' => $ui->model, 'object_id' => $ui->object_id, 'delete_flag' => 1, 'urlmapping_id' => $ui->urlmapping_id ] );
            foreach ( $removed_uis as $removed_ui ) {
                if ( $removed_ui->url === $ui->url ) {
                    continue;
                }
                $url = escapeshellarg( $removed_ui->url );
                $command = "{$estcmd_path} get {$data_dir} {$url}";
                $res = shell_exec( $command );
                if ( $res === null ) {
                    continue;
                }
                $command = "{$estcmd_path} out {$data_dir} {$url}";
                $this->update_url( $command, $removed_ui, $app );
            }
        }
        if ( $unlink ) {
            if ( $ui->publish_file != 6 && !$app->fmgr->exists( $ui->file_path ) ) {
                return true;
            }
            $command = "{$estcmd_path} get {$data_dir} {$url}";
            $res = shell_exec( $command );
            if ( $res === null ) {
                return true;
            }
            $this->update_indexes[ $data_dir ] = true;
            $command = "{$estcmd_path} out {$data_dir} {$url}";
            $res = $this->update_url( $command, $ui, $app );
        } else {
            $index_dynamic = $this->get_config_value( 'searchestraier_index_dinamic', $workspace_id );
            // TODO dinamic => dynamic
            if ( $index_dynamic ) {
                $ctx = $app->ctx;
                require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPublisher.php' );
                $pub = new PTPublisher;
                $orig_id = $app->id;
                $app->id = 'Bootstrapper';
                $data = $pub->publish( $ui );
                $app->id = $orig_id;
                $md5 = md5( $data );
                if ( $ui->md5 != $md5 ) {
                    $ui->md5( $md5 );
                    $ui->save();
                    unset( $app->update_urls[ $ui->id ] );
                } else {
                    return;
                }
                $data = $this->convert_utf8( $data, $app, false );
                if (! $data ) {
                    return $this->searchestraier_start_publish( $cb, $app, true );
                }
                $this->update_indexes[ $data_dir ] = true;
                if ( $this->is_not_html( $data ) ) {
                    return $this->searchestraier_start_publish( $cb, $app, true );
                }
                $obj = $cb['object'];
                $doc_title = $this->get_config_value( 'searchestraier_doc_title', $workspace_id );
                $thumbnail = $this->get_config_value( 'searchestraier_make_thumbnail', $workspace_id );
                $thumbnail_width = $this->get_config_value( 'searchestraier_thumbnail_width', $workspace_id );
                $this->extract = $this->extract ? $this->extract
                                                : $this->get_config_value( 'searchestraier_extract', $workspace_id );
                $site_name = $app->appname;
                if ( $workspace_id ) {
                    $workspace = $ui->workspace;
                    $site_name = $workspace ? $workspace->name : $site_name;
                }
                $site_name = str_replace( ["\r", "\n"], '', $site_name );
                $ctx->local_vars['site_name'] = $site_name;
                $ctx->local_vars['url'] = $ui->url;
                $ctx->local_vars['object_id'] = $ui->object_id;
                $ctx->local_vars['model'] = $ui->model;
                $ctx->local_vars['mime_type'] = $ui->mime_type;
                $ctx->local_vars['workspace_id'] = $workspace_id;
                $app->ctx = $ctx;
                $build = $this->get_draft( $app, $data, $obj, $ui, $doc_title, $thumbnail, $thumbnail_width );
                if ( $build === false ) return true;
                $out = $this->work_dir . DS . $ui->id . '.est';
                // echo $out, PHP_EOL;
                file_put_contents( $out, $build );
                $ngram = $app->searchestraier_force_ngram ? ' -apn ' : '';
                $useWeight = $app->searchestraier_use_weight ? ' -ws ' : '';
                $command = "{$estcmd_path} put{$ngram}{$useWeight} {$data_dir} {$out}";
                $res = $this->update_url( $command, $ui, $app, $out );
            }
        }
    }

    function searchestraier_post_publish ( $cb, $app, $tmpl, $data ) {
        $noindex = $cb['noindex'] ?? false;
        if ( $noindex ) {
            return true;
        }
        $data = $this->convert_utf8( $data, $app, false );
        if (! $data || $this->is_not_html( $data ) && $app->id != 'Bootstrapper' ) {
            return $this->searchestraier_start_publish( $cb, $app, true );
        }
        if ( $app->mode == 'rebuild_phase' && !$app->searchestraier_re_index_at_rebuild ) {
            return true;
        }
        $ui = $cb['urlinfo'];
        $estcmd_path = $this->estcmd_path( $app );
        if (! $estcmd_path ) {
            return;
        }
        $workspace_id = (int) $ui->workspace_id;
        $archive_types = $this->get_config_value( 'searchestraier_archive_types', $workspace_id );
        if (! $archive_types ) {
            return;
        }
        $archive_types = preg_split( '/\s*,\s*/', $archive_types );
        if (! in_array( $ui->archive_type, $archive_types ) ) {
            return;
        }
        $enabled = $this->get_config_value( 'searchestraier_enabled', $workspace_id );
        if (! $enabled ) {
            return;
        }
        $data_dir = $this->get_config_value( 'searchestraier_data_dir', $workspace_id );
        $data_dir = $app->build( $data_dir );
        if (! $data_dir || !is_dir( $data_dir ) ) {
            return;
        }
        $url = escapeshellarg( $ui->url );
        $this->data_dir = $data_dir;
        $data_dir = escapeshellarg( $data_dir );
        $delete = $app->searchestraier_use_queue ? false : true;
        $this->work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir( $delete );
        $ctx = $app->ctx;
        $this->update_indexes[ $data_dir ] = true;
        $doc_title = $this->get_config_value( 'searchestraier_doc_title', $workspace_id );
        $thumbnail = $this->get_config_value( 'searchestraier_make_thumbnail', $workspace_id );
        $thumbnail_width = $this->get_config_value( 'searchestraier_thumbnail_width', $workspace_id );
        $this->extract = $this->extract ? $this->extract
                                        : $this->get_config_value( 'searchestraier_extract', $workspace_id );
        $obj = $cb['object'] ?? null;
        if (! $obj ) {
            if ( $ui->model && $ui->object_id ) {
                $obj = $app->db->model( $ui->model )->load( $ui->object_id );
            }
        }
        if (! $obj ) {
            return true;
        }
        $site_name = $app->appname;
        if ( $workspace_id ) {
            $workspace = $ui->workspace;
            $site_name = $workspace ? $workspace->name : $site_name;
        }
        if ( $ui->urlmapping_id ) {
            $removed_uis = $app->db->model( 'urlinfo' )->load(
              ['model' => $ui->model, 'object_id' => $ui->object_id, 'delete_flag' => 1, 'urlmapping_id' => $ui->urlmapping_id ] );
            foreach ( $removed_uis as $removed_ui ) {
                if ( $removed_ui->url === $ui->url ) {
                    continue;
                }
                $url = escapeshellarg( $removed_ui->url );
                $command = "{$estcmd_path} get {$data_dir} {$url}";
                $res = shell_exec( $command );
                if ( $res === null ) {
                    continue;
                }
                $command = "{$estcmd_path} out {$data_dir} {$url}";
                $this->update_url( $command, $removed_ui, $app );
            }
        }
        $site_name = str_replace( ["\r", "\n"], '', $site_name );
        $ctx->local_vars['site_name'] = $site_name;
        $ctx->local_vars['url'] = $ui->url;
        $ctx->local_vars['object_id'] = $ui->object_id;
        $ctx->local_vars['model'] = $ui->model;
        $ctx->local_vars['mime_type'] = $ui->mime_type;
        $ctx->local_vars['workspace_id'] = $workspace_id;
        $app->ctx = $ctx;
        $build = $this->get_draft( $app, $data, $obj, $ui, $doc_title, $thumbnail, $thumbnail_width );
        if ( $build === false ) return true;
        $out = $this->work_dir . DS . $ui->id . '.est';
        file_put_contents( $out, $build );
        $ngram = $app->searchestraier_force_ngram ? ' -apn' : '';
        $useWeight = $app->searchestraier_use_weight ? ' -ws ' : '';
        $command = "{$estcmd_path} put{$ngram}{$useWeight} {$data_dir} {$out}";
        $res = $this->update_url( $command, $ui, $app, $out );
        return $res;
    }

    function update_url ( $command, $ui = null, $app = null, $out = null ) {
        $app = $app ? $app : Prototype::get_instance();
        if ( $app->searchestraier_use_queue ) {
            $ts = is_numeric( $ui ) ? date( 'Y-m-d H:i:s', $app->request_time + $ui )
                                    : date( 'Y-m-d H:i:s', $app->request_time );
            if ( is_object( $ui ) ) {
                $workspace_id = $ui->workspace_id;
            } else {
                $workspace_id = $app->ctx->stash( 'workspace' )
                              ? $app->ctx->stash( 'workspace' )->id : 0;
            }
            $index = '';
            if ( $app->searchestraier_use_tmp ) {
                if ( preg_match( "/'(.*?[^\\'])'/", $command, $matchs ) ) {
                    if (! preg_match( '/\.tmp\'$/', $matchs[0] ) ) {
                        $index = $matchs[0];
                        $command = str_replace( $matchs[0], '__tmpdir__', $command );
                    }
                }
            }
            if (! $this->ts_job ) {
                $ts_job = $app->db->model( 'ts_job' )->__new();
                $ts_job->name( 'Rebuild Index for Hyper Estraier' );
                $ts_job->component( 'SearchEstraier' );
                $ts_job->workspace_id( $workspace_id );
                $ts_job->start_on( $ts );
                $app->set_default( $ts_job );
                if ( $ts_job->has_column( 'status', true ) ) {
                    $ts_job->status( 2 );
                }
                $ts_job->save();
                $this->ts_job = $ts_job;
            }
            if ( isset( $this->commands[ $command ] ) ) {
                return true;
            }
            if ( is_object( $ui ) ) {
                $queue = $app->db->model( 'queue' )->get_by_key( [
                    'key' => md5( $ui->url ),
                    'class' => 'Rebuild Index for Hyper Estraier',
                    'component' => 'SearchEstraier',
                    'method' => 'update_queue'
                    ] );
            } else {
                $queue = $app->db->model( 'queue' )->get_by_key( [
                    'key' => md5( $command ),
                    'class' => 'Rebuild Index for Hyper Estraier',
                    'component' => 'SearchEstraier',
                    'method' => 'update_queue'
                    ] );
            }
            $queue->workspace_id( $this->ts_job->workspace_id );
            $queue->start_on( $ts );
            $queue->ts_job_id( $this->ts_job->id );
            $queue->value( $command );
            $queue->metadata( $out );
            $queue->data( $index );
            $app->set_default( $queue );
            $this->commands[ $command ] = true;
            $this->insert_queue = true;
            $this->update_indexes = [];
            return $queue->save();
        } else {
            exec( $command, $output, $return_var );
            if ( $app->id == 'Worker' ) {
                echo implode( PHP_EOL, $output ), PHP_EOL;
            }
            return $return_var === 0 ? true : false;
        }
    }

    function update_queue ( $app, $queue, &$error ) {
        $command = $queue->value;
        $index = $queue->data;
        if ( $index && strpos( $command, '__tmpdir__' ) !== false && $app->searchestraier_use_tmp ) {
            $index = trim( $index, "'" );
            if (! isset( $this->work_dir_map[ $index ] ) ) {
                $cmd = substr( PHP_OS, 0, 3 ) != 'WIN' ? exec( 'which cp' ) : null;
                $tmp = $app->upload_dir( false ) . DS . basename( $index );
                $res = $this->copy( $index, $tmp, $cmd, $app );
                if (! $res ) {
                    return false;
                }
                $this->work_dir_map[ $index ] = $tmp;
            }
            $command = str_replace( '__tmpdir__', $this->work_dir_map[ $index ] , $command );
            $this->tmp_map[ $index ] = $this->work_dir_map[ $index ];
        }
        $est = $queue->metadata;
        if ( $est && !file_exists( $est ) ) {
            return false;
        }
        exec( $command, $output, $return_var );
        if ( $return_var !== 0 ) {
            $error_message = $this->translate( "An error occurred while executing the command '%s.", $command );
            $this->log( $error_message, 'error' );
            return false;
        }
        echo $command, PHP_EOL;
        echo implode( PHP_EOL, $output ), PHP_EOL;
        // usleep( 50000 );
        if ( $est && file_exists( $est ) ) {
            unlink( $est );
            $app->remove_dirs[] = dirname( $est );
        }
        return true;
    }

    function copy ( $index, $copy, $cmd, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $fmgr = $app->fmgr;
        $delayed = $fmgr->delayed;
        $fmgr->delayed = false;
        $res = $fmgr->copy( $index, $copy, $cmd );
        $fmgr->delayed = $delayed;
        if (! $res ) {
            trigger_error( $this->translate( "Index '%s' can not be copied to '%s'.", [ $index, $copy ] ) );
            return false;
        }
        if ( $copy_sleep = $app->searchestraier_copy_sleep ) {
            sleep( $copy_sleep );
        }
        $estcmd_path = $this->estcmd_path( $app );
        $res = false;
        $counter = 0;
        $sleep = $app->searchestraier_sync_sleep;
        $max_retry = $app->searchestraier_sync_max_retry;
        $test1 = "{$estcmd_path} inform {$index}";
        $test2 = "{$estcmd_path} inform {$copy}";
        while (! $res ) {
            if ( $counter >= $max_retry ) {
                break;
            }
            $return_var = null;
            $output = [];
            exec( $test1, $output, $return_var );
            if ( $return_var !== 0 ) {
                $counter++;
                sleep( $sleep );
                continue;
            }
            $return_var = null;
            $output2 = [];
            exec( $test2, $output2, $return_var );
            if ( $return_var !== 0 ) {
                $counter++;
                sleep( $sleep );
                continue;
            }
            $res = $output[0] === $output2[0];
            if (! $res ) {
                $counter++;
                sleep( $sleep );
                continue;
            }
        }
        if (! $res ) {
            trigger_error( $this->translate( "Index '%s' can not be copied to '%s'.", [ $index, $copy ] ) );
        }
        return $res;
    }

    function searchestraier_update_idx ( $app ) {
        $counter = 0;
        $estcmd_path = $this->estcmd_path( $app );
        if (! $estcmd_path ) {
            return;
        }
        $can_mecab = $this->mecab_path( $app );
        $ngram = $app->searchestraier_force_ngram ? ' -apn ' : '';
        require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPublisher.php' );
        $pub = new PTPublisher;
        $db = $app->db;
        $workspaces = $db->model( 'workspace' )->load( [], ['sort' => 'id', 'direction' => 'ascend'], 'id' );
        $workspace_ids = [0];
        foreach ( $workspaces as $workspace ) {
            $workspace_ids[] = (int)$workspace->id;
        }
        $fmgr = $app->fmgr;
        $language = $app->language;
        $ctx = $app->ctx;
        $this->work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir( false );
        $tmp_dirs = [];
        $commands = [];
        $useWeight = $app->searchestraier_use_weight ? ' -ws ' : '';
        $command_after = "{$estcmd_path} put{$ngram}{$useWeight} ";
        $command_afters = [];
        $app->searchestraier_draft_capacity = $app->searchestraier_draft_capacity ?? 100000;
        $upload_dir = $app->upload_dir( false );
        $session = $app->db->model( 'session' )->get_by_key( ['name' => 'searchestraier_update_idx', 'kind' => 'SE'] );
        $this->update_idx = true;
        $start_time = time();
        $session->start( $start_time );
        $session->expires( $start_time + $app->sess_timeout ); // 86400
        $session->save();
        $est_dirs = [];
        foreach ( $workspace_ids as $workspace_id ) {
            $site_name = $app->appname;
            $workspace = null;
            if ( $workspace_id ) {
                $workspace = $db->model( 'workspace' )->load( (int) $workspace_id, [], 'id,name,language' );
                $site_name = $workspace->name;
                $language = $workspace->language;
            }
            $site_name = str_replace( ["\r", "\n"], '', $site_name );
            $archive_types = $this->get_config_value( 'searchestraier_archive_types', $workspace_id );
            if (! $archive_types ) {
                continue;
            }
            $enabled = $this->get_config_value( 'searchestraier_enabled', $workspace_id );
            if (! $enabled ) {
                continue;
            }
            $index_dynamic = $this->get_config_value( 'searchestraier_index_dinamic', $workspace_id );
            $ctx->stash( 'workspace', $workspace );
            $doc_title = $this->get_config_value( 'searchestraier_doc_title', $workspace_id );
            $data_dir = $this->get_config_value( 'searchestraier_data_dir', $workspace_id );
            $thumbnail = $this->get_config_value( 'searchestraier_make_thumbnail', $workspace_id );
            $thumbnail_width = $this->get_config_value( 'searchestraier_thumbnail_width', $workspace_id );
            $this->extract = $this->get_config_value( 'searchestraier_extract', $workspace_id );
            $data_dir = trim( $app->build( $data_dir ) );
            $data_dir = str_replace( ["\r", "\n"], '', $data_dir );
            if (!is_dir( $data_dir ) ) {
                $fmgr->mkpath( $data_dir );
            }
            if (!is_dir( $data_dir ) ) {
                $message = $this->translate( "The directory '%s' is not writable.", $data_dir );
                echo "{$message}\n";
                $app->log( ['message'   => $message,
                            'category'  => 'searchestraier',
                            'level'     => 'error'] );
                return false;
            }
            $this->data_dir = $data_dir;
            $data_dir = $upload_dir . DS . md5( $data_dir );
            $return_var = null;
            $output = [];
            $error_message = $this->translate( "An error occurred while updating search index'%s'.", $data_dir );
            if (!is_dir( "{$data_dir}.tmp" ) ) {
                if ( $ngram ) {
                    $create_index = escapeshellarg( "{$data_dir}.tmp" );
                    echo "{$estcmd_path} create -apn {$create_index}", PHP_EOL;
                    exec( "{$estcmd_path} create -apn {$create_index}", $output, $return_var );
                    if ( $return_var !== 0 ) {
                        $this->log( $error_message, 'error' );
                        continue;
                    }
                    echo implode( PHP_EOL, $output ), PHP_EOL;
                } else {
                    $fmgr->mkpath( "{$data_dir}.tmp" );
                }
            } else {
                $fmgr->rmdir( "{$data_dir}.tmp" );
                if ( $ngram ) {
                    $create_index = escapeshellarg( "{$data_dir}.tmp" );
                    echo "{$estcmd_path} create -apn {$create_index}\n";
                    exec( "{$estcmd_path} create -apn {$create_index}", $output, $return_var );
                    if ( $return_var !== 0 ) {
                        $this->log( $error_message, 'error' );
                        continue;
                    }
                    echo implode( PHP_EOL, $output ), PHP_EOL;
                } else {
                    $fmgr->mkpath( "{$data_dir}.tmp" );
                }
            }
            if ( is_dir( "{$data_dir}.backup" ) ) {
                $fmgr->rmdir( "{$data_dir}.backup" );
            } else if ( is_file( "{$data_dir}.backup" ) ) {
                $fmgr->unlink( "{$data_dir}.backup" ); // Bug ver.2.582
            }
            $tmp_dir = $this->work_dir . DS . md5( $data_dir );
            $tmp_dirs[ $tmp_dir ] = $data_dir;
            if (!is_dir( $tmp_dir ) ) {
                $fmgr->mkpath( $tmp_dir );
            }
            $publish_file = $index_dynamic ? ['NOT IN' => [0] ] : ['NOT IN' => [0, 6] ];
            $archive_types = preg_split( '/\s*,\s*/', $archive_types );
            $urls = $db->model( 'urlinfo' )->load( ['workspace_id' => $workspace_id, 'mime_type' => 'text/html',
                                                    'publish_file' => $publish_file,
                                                    'archive_type' => ['IN' => $archive_types ] ] );
            if ( is_array( $urls ) && empty( $urls ) ) {
                continue;
            }
            $data_dir_tmp = escapeshellarg( "{$data_dir}.tmp" );
            $esc_tmp_dir = escapeshellarg( $tmp_dir );
            $language = escapeshellarg( $language );
            $useMecab = $ngram ? '' : ' -um';
            $index_lt = (int) $app->searchestraier_index_lt;
            if ( $index_lt < 128 ) {
                $index_lt = '';
            } else {
                $index_lt = " -lt {$index_lt}";
            }
            $useWeight = $app->searchestraier_use_weight ? ' -ws ' : '';
            $commands["{$estcmd_path} gather -il {$language}{$ngram}{$useMecab}{$useWeight}{$index_lt} {$data_dir_tmp} {$esc_tmp_dir}"] =
              ['data_dir' => $data_dir, 'index' => $this->data_dir ];
            $est_dirs[ $this->data_dir ] = $tmp_dir;
            $php_binary = $app->php_binary();
            $task_proc = (int) $app->searchestraier_task_proc;
            $parallel = (int) $app->searchestraier_task_proc_per;
            $count_urls = count( $urls );
            if ( $task_proc > 1 && $php_binary && $parallel < $count_urls ) {
                $parallel_sleep_time = (int) $app->parallel_sleep_time;
                if (! $parallel_sleep_time ) $parallel_sleep_time = 1;
                $start_time = time();
                $max_proc_time = $app->async_max_proc_time ? $start_time + $app->async_max_proc_time : $start_time + 1200;
                $proc_key = $app->magic();
                $size = $count_urls / $parallel;
                $size = ceil( $size );
                $object_group = array_chunk( $urls, $size );
                $cmd = $php_binary . ' ' . $this->path() . DS . 'tools' . DS . 'getDraft.php';
                chdir( $app->pt_dir );
                $db_caching = $app->db->caching;
                $app->db->caching = false;
                $i = 0;
                $timed_out = false;
                $processes = [];
                foreach ( $object_group as $url_group ) {
                    $ids = [];
                    foreach ( $url_group as $url ) {
                        $ids[] = (int) $url->id;
                    }
                    if ( empty( $ids ) ) {
                        continue;
                    }
                    $proc_name = $app->magic();
                    $session = $db->model( 'session' )->__new( ['name' => $proc_name, 'kind' => 'AS', 'key' => $proc_key ] );
                    $session->data( serialize( $ids ) );
                    $session->value( $tmp_dir );
                    $session->save();
                    $proc = $cmd . " --proc_name {$proc_name}";
                    $process = proc_open( $proc, [], $pipes );
                    $processes[] = $process;
                    if ( $task_proc <= $i ) {
                        while ( $db->model( 'session' )->count(
                            ['kind' => 'AS', 'key' => $proc_key ], null, 'id' ) >= $task_proc ) {
                            if ( $max_proc_time && ( time() > $max_proc_time ) ) {
                                $timed_out = true;
                                break;
                            }
                            if ( $parallel_sleep_time ) sleep ( $parallel_sleep_time );
                        }
                    } else {
                        usleep( 300000 );
                    }
                    $i++;
                }
                if (! $timed_out ) {
                    while ( $db->model( 'session' )->count(
                        ['kind' => 'AS', 'key' => $proc_key ], null, 'id' ) ) {
                        if ( $max_proc_time && ( time() > $max_proc_time ) ) {
                            $timed_out = true;
                            break;
                        }
                        if ( $parallel_sleep_time ) sleep ( $parallel_sleep_time );
                    }
                }
                $app->db->caching = $db_caching;
                if ( $timed_out ) {
                    $error_message = $this->translate( 'An error occurred while updating search index(Search index update timed out).' );
                    $this->log( $error_message, 'error' );
                    return 0;
                }
                foreach ( $processes as $process ) {
                    proc_close( $process );
                }
                $counter += $count_urls;
            } else {
                foreach ( $urls as $url ) {
                    $file_path = $url->file_path;
                    if (! $file_path ) continue;
                    $data = '';
                    if ( $fmgr->exists( $file_path ) ) {
                        $data = $fmgr->get( $file_path );
                    } else if ( ( $index_dynamic && $url->publish_file == 6 ) || $url->publish_file == 3 ) {
                        $orig_id = $app->id;
                        $app->id = 'Bootstrapper';
                        $app->request_method = 'GET';
                        $data = $pub->publish( $url );
                        $app->id = $orig_id;
                        $app->request_method = null;
                    }
                    $data = $this->convert_utf8( $data, $app, false );
                    if (! $data || $this->is_not_html( $data ) ) {
                        continue;
                    }
                    $obj = null;
                    if ( $url->object_id && $url->model ) {
                        $obj = $db->model( $url->model )->load( (int) $url->object_id );
                    }
                    $ctx->local_vars['site_name'] = $site_name;
                    $ctx->local_vars['url'] = $url->url;
                    $ctx->local_vars['object_id'] = $url->object_id;
                    $ctx->local_vars['model'] = $url->model;
                    $ctx->local_vars['mime_type'] = $url->mime_type;
                    $ctx->local_vars['workspace_id'] = $workspace_id;
                    $app->ctx = $ctx;
                    $build = $this->get_draft( $app, $data, $obj, $url, $doc_title, $thumbnail, $thumbnail_width );
                    if ( $build === false ) continue;
                    $out = $tmp_dir . DS . $url->id . '.est';
                    // echo $out, PHP_EOL;
                    file_put_contents( $out, $build );
                    if ( strlen( $build ) > $app->searchestraier_draft_capacity ) {
                        $out = escapeshellarg( $out );
                        $add_after = "{$command_after} {$esc_tmp_dir} {$out}";
                        $command_afters[] = $add_after;
                    }
                    $counter++;
                }
            }
        }
        if ( $documentsearch = $app->component( 'DocumentSearch' ) ) {
            $documentsearch->documentsearch_update_idx( $app, $est_dirs );
        }
        foreach ( $commands as $command => $out ) {
            $index = $out['index'];
            $out = $out['data_dir'];
            $out = trim( $out, "'" );
            if ( $fmgr->exists( "{$out}.backup" ) ) {
                $fmgr->rmdir( "{$out}.backup" );
            }
            $error_message = $this->translate( "An error occurred while updating search index'%s'.", $out );
            echo "$command", PHP_EOL;
            $output =[];
            exec( $command, $output, $return_var );
            if ( $return_var !== 0 ) {
                $this->log( $error_message, 'error' );
                $fmgr->rmdir( "{$out}.tmp" );
                continue;
            }
            echo implode( PHP_EOL, $output ), PHP_EOL;;
            $output = [];
            $test = "{$estcmd_path} search -vx -max 1 {$out}.tmp 'Hello World!'";
            exec( $test, $output, $return_var );
            if ( $return_var !== 0 ) {
                $this->log( $error_message, 'error' );
                $fmgr->rmdir( "{$out}.tmp" );
                continue;
            }
            $xml = implode( PHP_EOL, $output );
            try {
                $result = new SimpleXMLElement( $xml );
            } catch ( Exception $e ) {
                trigger_error( $e->getMessage() );
                $this->log( $error_message, 'error' );
                $fmgr->rmdir( "{$out}.tmp" );
                continue;
            }
            $this->tmp_map[ $index ] = "{$out}.tmp";
        }
        foreach ( $command_afters as $command ) {
            exec( $command, $output, $return_var );
        }
        foreach ( $commands as $command => $out ) {
            $index = $out['index'];
            $out = $out['data_dir'];
            $out = trim( $out, "'" );
            if ( $app->searchestraier_use_reccomend ) {
                $output =[];
                $command = $can_mecab ? "{$estcmd_path} extkeys -um {$out}.tmp" : "{$estcmd_path} extkeys {$out}.tmp";
                echo "$command", PHP_EOL;
                exec( $command, $output, $return_var );
                if ( $return_var !== 0 ) {
                    $this->log( $error_message, 'error' );
                    $fmgr->rmdir( "{$out}.tmp" );
                    continue;
                }
                echo implode( PHP_EOL, $output ), PHP_EOL;
            }
        }
        foreach ( $est_dirs as $est_dir => $tmp_dir ) {
            $fmgr->rmdir( dirname( $tmp_dir ) );
        }
        $this->update_indexes = [];
        return $counter;
    }

    function convert_utf8 ( $data, $app = null, $force = false ) {
        if (! $force ) {
            $app = $app ? $app : Prototype::get_instance();
            if (! $app->searchestraier_convert_utf8 ) {
                return $data;
            }
        }
        try {
            $data = mb_convert_encoding( $data, 'utf-8', ['UTF-7','ISO-2022-JP',
                                'UTF-8', 'SJIS', 'JIS', 'eucjp-win', 'sjis-win',
                                'EUC-JP', 'ASCII'] );
        } catch ( \Throwable $e ) {
            return $force ? '' : false;
        }
        return $data;
    }

    function sync_casket ( $app, $argv ) {
        $session = $app->db->model( 'session' )->get_by_key( ['name' => 'searchestraier_update_idx', 'kind' => 'SE'] );
        if ( $session->id ) {
            echo $this->translate( 'Search index rebuild is in progress.' ), PHP_EOL;
            unlink( $this->pid );
            exit();
        }
        $from = null;
        $to   = null;
        if ( in_array( '--from', $argv ) ) {
            $idx = array_search( '--from', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $from = $argv[ $idx + 1];
                unset( $argv[ $idx + 1] );
            }
            unset( $argv[ $idx ] );
        }
        if ( in_array( '--to', $argv ) ) {
            $idx = array_search( '--to', $argv );
            if ( isset( $argv[ $idx + 1] ) ) {
                $to = $argv[ $idx + 1];
                unset( $argv[ $idx + 1] );
            }
            unset( $argv[ $idx ] );
        }
        if (! $from ) {
            echo $app->translate( '%s is required.', '--from' ), PHP_EOL;
            unlink( $this->pid );
            exit();
        }
        if (! $to ) {
            echo $app->translate( '%s is required.', '--to' ), PHP_EOL;
            unlink( $this->pid );
            exit();
        }
        $fmgr = $app->fmgr;
        $cp = substr( PHP_OS, 0, 3 ) != 'WIN' ? exec( 'which cp' ) : null;
        if (! $fmgr->exists( $from ) ) {
            if ( $app->searchestraier_idx_backup && $fmgr->exists( "{$from}.bk" ) ) {
                trigger_error( $this->translate( "Index %s' does not exist. Copy from backup and continue synchronization.", $from ) );
                $recover = $this->copy( "{$from}.bk", $from, $cp, $app );
                if (! $recover || ! $fmgr->exists( $from ) ) {
                    trigger_error( $this->translate( "Index can not be copied to '%s' because '%s' is not exists.", [ $to, $from ] ) );
                    return false;
                }
            } else {
                trigger_error( $this->translate( "Index can not be copied to '%s' because '%s' is not exists.", [ $to, $from ] ) );
                return false;
            }
        }
        $magic = $app->magic();
        $tmp = "{$to}.{$magic}";
        $estcmd_path = $this->estcmd_path( $app );
        $_tmp = escapeshellarg( $tmp );
        $test = "{$estcmd_path} search -vx -max 1 {$_tmp} 'Hello World!'";
        $res = 0;
        $max_retry = $app->searchestraier_sync_max_retry;
        $sleep = $app->searchestraier_sync_sleep;
        $counter = 0;
        while ( $res === 0 ) {
            $counter++;
            $output =[];
            $this->copy( $from, $tmp, $cp, $app );
            exec( $test, $output, $return_var );
            if ( $return_var !== 0 ) {
                sleep( $sleep );
                $fmgr->rmdir( $tmp );
                if ( $counter >= $max_retry ) {
                    break;
                }
                continue;
            }
            $xml = implode( PHP_EOL, $output );
            try {
                $result = new SimpleXMLElement( $xml );
            } catch ( Exception $e ) {
                sleep( $sleep );
                $fmgr->rmdir( $tmp );
                if ( $counter > $max_retry ) {
                    break;
                }
                continue;
            }
            $fmgr->rename( $to, "{$to}.backup" );
            if ( $fmgr->rename( $tmp, $to ) ) {
                $fmgr->rmdir( "{$to}.backup" );
                $res = 1;
            }
        }
        if (! $res ) {
            trigger_error( $this->translate( "Index '%s' can not be copied to '%s'.", [ $from, $to ] ) );
            $fmgr->rmdir( $tmp );
        } else {
            $this->log( $this->translate( "Copying the index '%s' to '%s' is completed.", [ $from, $to ] ) );
        }
        return $res;
    }

    function get_draft_async ( $app, $argv ) {
        if (! in_array( '--proc_name', $argv ) ) {
            exit();
        }
        $idx = array_search( '--proc_name', $argv );
        $session = null;
        $db = $app->db;
        $fmgr = $app->fmgr;
        $ctx = $app->ctx;
        if ( isset( $argv[ $idx + 1] ) ) {
            $sess_name = $argv[ $idx + 1];
            $session = $db->model( 'session' )->get_by_key( ['name' => $sess_name, 'kind' => 'AS'] );
            unset( $argv[ $idx + 1] );
        }
        if ( $session === null || !$session->id ) {
            exit();
        }
        $tmp_dir = $session->value;
        unset( $argv[ $idx ] );
        $urlinfo_ids = unserialize( $session->data );
        if ( $urlinfo_ids === false || empty( $urlinfo_ids ) ) {
            $session->remove();
            exit();
        }
        $urls = $db->model( 'urlinfo' )->load( ['id' => $urlinfo_ids ] );
        if ( empty( $urls ) ) {
            $session->remove();
            exit();
        }
        $url = $urls[0];
        $workspace_id = (int) $url->workspace_id;
        $site_name = $app->appname;
        $workspace = null;
        if ( $workspace_id ) {
            $workspace = $db->model( 'workspace' )->load( (int) $workspace_id, [], 'id,name,language' );
            $site_name = $workspace->name;
        }
        $site_name = str_replace( ["\r", "\n"], '', $site_name );
        $index_dynamic = $this->get_config_value( 'searchestraier_index_dinamic', $workspace_id );
        $ctx->stash( 'workspace', $workspace );
        $doc_title = $this->get_config_value( 'searchestraier_doc_title', $workspace_id );
        $data_dir = $this->get_config_value( 'searchestraier_data_dir', $workspace_id );
        $thumbnail = $this->get_config_value( 'searchestraier_make_thumbnail', $workspace_id );
        $thumbnail_width = $this->get_config_value( 'searchestraier_thumbnail_width', $workspace_id );
        $this->extract = $this->get_config_value( 'searchestraier_extract', $workspace_id );
        $pub = new PTPublisher;
        foreach ( $urls as $url ) {
            $file_path = $url->file_path;
            if (! $file_path ) continue;
            $data = '';
            if ( $fmgr->exists( $file_path ) ) {
                $data = $fmgr->get( $file_path );
            } else if ( ( $index_dynamic && $url->publish_file == 6 ) || $url->publish_file == 3 ) {
                $orig_id = $app->id;
                $app->id = 'Bootstrapper';
                $app->request_method = 'GET';
                $data = $pub->publish( $url );
                $app->id = $orig_id;
                $app->request_method = null;
            }
            $data = $this->convert_utf8( $data, $app, false );
            if (! $data || $this->is_not_html( $data ) ) {
                continue;
            }
            $obj = null;
            if ( $url->object_id && $url->model ) {
                $obj = $db->model( $url->model )->load( (int) $url->object_id );
            }
            $ctx->local_vars['site_name'] = $site_name;
            $ctx->local_vars['url'] = $url->url;
            $ctx->local_vars['object_id'] = $url->object_id;
            $ctx->local_vars['model'] = $url->model;
            $ctx->local_vars['mime_type'] = $url->mime_type;
            $ctx->local_vars['workspace_id'] = $workspace_id;
            $app->ctx = $ctx;
            $build = $this->get_draft( $app, $data, $obj, $url, $doc_title, $thumbnail, $thumbnail_width );
            if ( $build === false ) continue;
            $out = $tmp_dir . DS . $url->id . '.est';
            file_put_contents( $out, $build );
        }
        $session->remove();
    }

    function get_draft ( $app, $data, $obj, $ui, $doc_title, $thumbnail, $thumbnail_width ) {
        $draft_tmpl = $app->ctx->get_template_path( 'html_draft.tmpl' );
        $ctx = $app->ctx;
        $url = $ctx->local_vars['url'];
        $weight = 1.0;
        if ( $app->searchestraier_use_weight ) {
            $extension = PTUtil::get_extension( $url, true );
            if ( isset( $app->searchestraier_doc_weight[ $extension ] ) ) {
                $weight = $app->searchestraier_doc_weight[ $extension ];
            }
            if ( isset( $app->searchestraier_model_weight[ $obj->_model ] ) ) {
                $weight *= $app->searchestraier_model_weight[ $obj->_model ];
            }
        }
        $ctx->local_vars['weight'] = $weight;
        $relation_labels = [];
        list( $mdate, $cdate, $author ) = ['', '', ''];
        $ctx->local_vars['metadata'] = '';
        $ctx->local_vars['tags'] = '';
        if ( is_object( $obj ) ) {
            if ( $obj->has_column( 'published_on' ) ) {
                $cdate = $obj->published_on;
                $cdate = $obj->ts2db( $cdate );
            } else if ( $obj->has_column( 'created_on' ) ) {
                $cdate = $obj->created_on;
                $cdate = $obj->ts2db( $cdate );
            }
            if ( $obj->has_column( 'modified_on' ) ) {
                $mdate = $obj->modified_on;
                $mdate = $obj->ts2db( $mdate );
            } else {
                $mdate = date( 'Y-m-d H:i:s' );
            }
            if ( $obj->has_column( 'user_id' ) && $obj->user_id ) {
                $user = $app->db->model( 'user' )->load( (int)$obj->user_id, [], 'id,nickname' );
                $author = $user ? $user->nickname : '';
            }
            if (! $author ) {
                if ( $obj->has_column( 'created_by' ) && $obj->created_by ) {
                    $user = $app->db->model( 'user' )->load( (int)$obj->created_by, [], 'id,nickname' );
                    $author = $user ? $user->nickname : '';
                }
            }
            if (! $author ) {
                if ( $obj->has_column( 'modified_by' ) && $obj->modified_by ) {
                    $user = $app->db->model( 'user' )->load( (int)$obj->modified_by, [], 'id,nickname' );
                    $author = $user ? $user->nickname : '';
                }
            }
            $relation_labels = $this->get_relation_labels( $app, $obj );
            if (! empty( $relation_labels ) ) {
                $ctx->local_vars['metadata'] = implode( ',', $relation_labels );
                $tags = $this->get_relation_labels( $app, $obj, 'tags' );
                if (! empty( $tags ) ) {
                    $ctx->local_vars['tags'] = implode( ',', $tags );
                }
            }
        }
        if (! $mdate ) {
            $mdate = date( 'Y-m-d H:i:s' );
        }
        $time_diff = date('P');
        if (! $cdate ) {
            $estcmd_path = $this->estcmd_path( $app );
            $data_dir = $this->data_dir;
            if ( $estcmd_path && $data_dir && is_dir( $data_dir ) ) {
                if ( file_exists( $data_dir . DS . '_xfm' ) ) {
                    $data_dir = escapeshellarg( $data_dir );
                    $command = "{$estcmd_path} get {$data_dir} {$url}";
                    if ( strpos( $command, "\r" ) !== false || strpos( $command, "\n" ) !== false ) {
                    } else {
                        $res = shell_exec( $command );
                        if ( $res !== null ) {
                            $res = preg_replace( "/\r\n|\r|\n/", "\n", $res );
                            $lines = explode( "\n", $res );
                            foreach ( $lines as $line ) {
                                if ( strpos( $line, '@' ) === 0 ) {
                                    $parts = explode( '=', $line );
                                    $key = array_shift( $parts );
                                    if ( $key == '@mdate' ) {
                                        $value = implode( '=', $parts );
                                        $value = str_replace( 'T', ' ', $value );
                                        if ( strpos( $value, '+' ) !== false ) {
                                            $value = preg_replace( '/\+.*$/', '', $value );
                                        } else if ( strpos( $value, '-' ) !== false ) {
                                            $value = preg_replace( '/\-[^-]*$/', '', $value );
                                        }
                                        $cdate = $value;
                                        break;
                                    }
                                }
                                if (! $line ) break;
                            }
                        }
                    }
                }
            }
        }
        if (! $cdate ) {
            $cdate = $mdate;
        }
        $cdate = str_replace( ' ', 'T' , $cdate ) . $time_diff;
        $mdate = str_replace( ' ', 'T' , $mdate ) . $time_diff;
        $ctx->local_vars['cdate'] = $cdate;
        $ctx->local_vars['mdate'] = $mdate;
        $author = str_replace( ["\r", "\n"], '', $author );
        $ctx->local_vars['author'] = $author;
        require_once( LIB_DIR . 'ExtractContent' . DS . 'ExtractContent.php' );
        $data = PTUtil::normalize( $data );
        $data_original = $data;
        $extractor = new ExtractContent( $data );
        $extractor->base_url = $url;
        $extractor->punctuation_weight = $app->searchestraier_punctuation_weight;
        $extractor->threshold = $app->searchestraier_content_threshold;
        if ( $thumbnail && $thumbnail_width ) {
            if ( PTUtil::property_exists( $app, 'searchestraier_thumbnail_min_pixel' ) ) {
                if ( $app->searchestraier_thumbnail_min_pixel ) {
                    if ( is_numeric( $app->searchestraier_thumbnail_min_pixel ) ) {
                        $extractor->minimum_area = $app->searchestraier_thumbnail_min_pixel;
                    } else {
                        $extractor->minimum_area = $thumbnail_width * $thumbnail_width;
                    }
                }
            } else {
                if ( $app->searchestraier_thumb_minimum_area ) {
                    if ( is_numeric( $app->searchestraier_thumb_minimum_area ) ) {
                        $extractor->minimum_area = $app->searchestraier_thumb_minimum_area;
                    } else {
                        $extractor->minimum_area = $thumbnail_width * $thumbnail_width;
                    }
                }
            }
        }
        $title = '';
        $image_urls = [];
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $title_option = $this->get_config_value( 'searchestraier_title_option', $workspace_id );
        $body_option = $this->get_config_value( 'searchestraier_body_option', $workspace_id );
        $title_weight = $this->get_config_value( 'searchestraier_title_weight', $workspace_id );
        $tag_regex = '<\${0,1}' . $ctx->prefix;
        if ( preg_match( "/$tag_regex/i", $title_option ) || preg_match( "/$tag_regex/i", $body_option ) ) {
            $ctx->stash( $obj->_model, $obj );
            $ctx->local_vars['archive_type'] = $obj->_model === 'template' ? 'index' : $obj->_model;
            $ctx->local_vars['model'] = $obj->_model;
            $old_vars = $ctx->vars;
            $old_local_vars = $ctx->local_vars;
            if ( preg_match( "/$tag_regex/i", $title_option ) ) {
                $title_option = $ctx->build( $title_option );
            }
            if ( preg_match( "/$tag_regex/i", $body_option ) ) {
                $body_option = $ctx->build( $body_option );
            }
            $ctx->local_vars = $old_local_vars;
            $ctx->vars = $old_vars;
        }
        if ( stripos( $data, '<s' ) !== false ) {
            if ( stripos( $data, '<script' ) !== false ) {
                $data = preg_replace( '/<script.*?<\/script>/si', '', $data );
            }
            if ( stripos( $data, '<style' ) !== false ) {
                $data = preg_replace( '/<style.*?<\/style>/si', '', $data );
            }
        }
        $lib = LIB_DIR . 'Prototype' . DS . 'class.PTDomDocument.php';
        if ( file_exists( $lib ) ) {
            $dom = new PTDomDocument();
            if ( $dom->loadHTML( $data ) ) {
                $extractor->dom = $dom;
            }
        } else {
            libxml_use_internal_errors( true );
            $dom = new DomDocument();
            if ( $dom->loadHTML( mb_encode_numericentity( $data, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                $extractor->dom = $dom;
            }
        }
        $headings = [];
        $extract = $this->extract;
        if ( $extract === 'css' ) {
            $body_option = PTUtil::selector2xpath( $body_option );
            $extract = 'xpath';
        }
        if ( $extract == 'auto' ) {
            $data = $extractor->getTextContent();
            $image_urls = $extractor->image_urls;
        } else {
            if ( $extract == 'all' || !$body_option ) {
                $tmp_file_path = '';
                if ( file_exists( $ui->file_path ) ) {
                    $tmp_file_path = $ui->file_path;
                } else {
                    $this->work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir();
                    $tmp_file_path = $this->work_dir . DS . md5( $data ) . '.html';
                }
                if (! $this->estcmd_path ) {
                    $estcmd_path = $app->searchestraier_estcmd_path;
                    $estcmd_path = escapeshellcmd( $estcmd_path );
                    $this->estcmd_path = $estcmd_path;
                } else {
                    $estcmd_path = $this->estcmd_path;
                }
                $index_lt = (int) $app->searchestraier_index_lt;
                if ( $index_lt < 128 ) {
                    $index_lt = '';
                } else {
                    $index_lt = " -lt {$index_lt}";
                }
                $command = "{$estcmd_path} draft -fh{$index_lt} {$tmp_file_path}";
                $res = shell_exec( $command );
                $res = preg_replace( "/\r\n|\r|\n/", PHP_EOL, $res );
                $lines = explode( PHP_EOL, $res );
                $in_body = false;
                $data = '';
                foreach ( $lines as $line ) {
                    if (! $in_body ) {
                        if ( strpos( $line, '@title=' ) === 0 ) {
                            $title = preg_replace( '/^@title=/', '', $line );
                        } else if (! $line ) {
                            $in_body = true;
                            continue;
                        }
                    }
                    if ( $in_body ) {
                        $data .= $line . PHP_EOL;
                    }
                }
            } else if ( $extract == 'xpath' ) {
                $finder = new DomXPath( $dom );
                $elements = $finder->query( $body_option );
                if ( $elements === false || ! $elements->length ) {
                    try {
                        $elements = $finder->evaluate( $body_option );
                        if ( is_string( $elements ) ) {
                            $data = $elements;
                            $elements = null;
                        }
                    } catch ( Exception $e ) {
                        // trigger_error( $e->getMessage() );
                    }
                }
                if ( is_object( $elements ) && $elements->length ) {
                    $htags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
                    $items = [];
                    for ( $i = 0; $i < $elements->length; $i++ ) {
                        $ele = $elements->item( $i );
                        $items[] = $this->innerHTML( $ele );
                        if ( $app->searchestraier_consider_headings && method_exists( $ele, 'find' ) ) {
                            foreach ( $htags as $heading ) {
                                $hElements = $ele->find( $heading );
                                if ( $hElements->length ) {
                                    foreach ( $hElements as $hElement ) {
                                        $textContents = trim( $hElement->textContent );
                                        $textContents = str_replace( ["\r", "\n"], '', $textContents );
                                        $headings[] = $textContents;
                                    }
                                }
                            }
                        }
                    }
                    if (!empty( $items ) ) {
                        $data = implode( PHP_EOL, $items );
                    }
                }
                $data = is_string( $data ) ? trim( strip_tags( $data ) ) : $data;
            } else if ( $extract == 'start_end' || $extract == 'regex' ) {
                if ( $extract == 'start_end' ) {
                    $splits = explode( ',', $body_option );
                    $start = array_shift( $splits );
                    $end = implode( '', $splits );
                    $start = preg_quote( $start, '/' );
                    $end = preg_quote( $end, '/' );
                    $regex = "/{$start}(.*?){$end}/si";
                } else {
                    $regex = $body_option;
                }
                $regex = $this->sanitize_regex( $regex );
                preg_match( $regex,  $data, $matches );
                $data = isset( $matches[1] ) ? $matches[1] : $data;
                $data = trim( strip_tags( $data ) );
            }
            if ( is_object( $extractor->dom ) ) {
                $finder = new DomXPath( $extractor->dom );
                $og_image = $finder->query( "//meta[@property='og:image']" );
                if ( $og_image->length ) {
                    $og_image = $og_image[0]->getAttribute( 'content' );
                    if ( $og_image ) {
                        $og_image = $extractor->convert2url( $og_image );
                        $image_urls[] = $og_image;
                    }
                }
                $elements = $extractor->dom->getElementsByTagName( 'img' );
                $minimum_area = $app->searchestraier_thumb_minimum_area;
                if ( $elements->length ) {
                    for ( $i = 0; $i < $elements->length; $i++ ) {
                        $ele = $elements->item( $i );
                        $alt = $ele->getAttribute( 'alt' );
                        $w = (int) $ele->getAttribute( 'width' );
                        $h = (int) $ele->getAttribute( 'height' );
                        $area = $h * $w;
                        $src = $ele->getAttribute( 'src' );
                        if ( $src ) {
                            $src = $extractor->convert2url( $ele->getAttribute( 'src' ) );
                            if ( $area > $minimum_area ) {
                                $image_urls[] = $src;
                            } else if (! $area ) {
                                $image_ui = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $src ] );
                                if ( $image_ui->id ) {
                                    if ( filesize( $image_ui->file_path ) > $app->searchestraier_thumb_minimum_size ) {
                                        $image_urls[] = $src;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if (! $this->init_get_draft ) {
            if (! $app->searchestraier_callback_compat ) {
                $app->init_callbacks( 'searchestraier', 'get_draft' );
            } else {
                // Backward compatibility.
                $app->init_callbacks( 'search_estraier', 'get_draft' );
            }
            $this->init_get_draft = true;
        }
        $ctx->local_vars['thumbnail'] = '';
        $ctx->local_vars['thumbnail_square'] = '';
        $callback = ['name' => 'get_draft', 'object' => $obj, 'urlinfo' => $ui,
                     'ctx' => $ctx, 'component' => $this ];
        $orig_data = $data;
        // Backward compatibility.
        $res = $app->searchestraier_callback_compat
             ? $app->run_callbacks( $callback, 'search_estraier', $title, $data, $image_urls )
             : $app->run_callbacks( $callback, 'searchestraier', $title, $data, $image_urls );
        if (! $res && $data != $orig_data ) {
            return $data;
        }
        $ctx = $callback['ctx'];
        if ( $thumbnail && $thumbnail_width ) {
            $image_obj = null;
            foreach ( $image_urls as $image_url ) {
                if (! $image_obj ) {
                    $image_urlinfo = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $image_url ] );
                    if ( $image_urlinfo->id ) {
                        if ( $image_urlinfo->mime_type == 'image/svg+xml' ) {
                            continue; // TODO image/svg+xml
                        } else if ( $image_urlinfo->key == 'plugin_og_image'
                            && $app->text2ogimage_model != 'asset' ) {
                            continue; // TODO Text2OgImage plugin
                        }
                        $image_obj = $image_urlinfo;
                        break;
                    }
                }
            }
            if (! $image_obj ) {
                $image_obj = $app->db->model( 'urlinfo' )->get_by_key(
                    ['model' => $obj->_model, 'object_id' => $obj->id, 'class' => 'file',
                     'mime_type' => ['like' => 'image/%'] ] );
            }
            if ( $image_obj && $image_obj->id ) {
                $img_model = '';
                $img_column = '';
                $img_obj_id = '';
                $debug = 0;
                if ( $image_obj->id ) {
                    if ( $image_obj->meta_id ) {
                        $meta = $image_obj->meta;
                        if ( is_object( $meta ) ) {
                            $img_model  = $meta->model;
                            $img_column = $meta->key;
                            $img_obj_id = $meta->object_id;
                        }
                    } else {
                        $img_model  = $image_obj->model;
                        $img_column = $image_obj->key;
                        $img_obj_id = $image_obj->object_id;
                        if (! $app->db->model( $img_model )->has_column( $img_column ) ) {
                            $basename = pathinfo( $image_obj->file_path, PATHINFO_FILENAME );
                            if ( strpos( $basename, '-' ) !== false ) {
                                $parts = explode( '-', $basename );
                                $img_column = array_pop( $parts );
                            }
                        }
                    }
                    if ( $img_model && $img_column && $img_obj_id ) {
                        $img_obj = $app->db->model( $img_model )->load( (int) $img_obj_id );
                        if ( $img_obj && $img_obj->has_column( $img_column ) ) {
                            $args = ['width' => $thumbnail_width, 'name' => $img_column ];
                            $thumbnail_url = PTUtil::thumbnail_url( $img_obj, $args );
                            $args['square'] = 1;
                            unset( $args['urlinfo'] );
                            $thumb_square_url = PTUtil::thumbnail_url( $img_obj, $args );
                            if ( $thumbnail_url && $thumb_square_url ) {
                                $ctx->local_vars['thumbnail'] = $thumbnail_url;
                                $ctx->local_vars['thumbnail_square'] = $thumb_square_url;
                            }
                        }
                    }
                }
            }
        }
        if ( $doc_title == 'heading' && is_object( $extractor->dom ) ) {
            $title = $this->get_heading( $extractor->dom );
        } else if ( $doc_title == 'title' && is_object( $extractor->dom ) ) {
            $titleEle = $dom->getElementsByTagName( 'title' );
            if ( $titleEle->length ) {
                $titleEle = $titleEle->item( 0 );
                $title = trim( $titleEle->textContent );
            }
        } else if ( $doc_title == 'title'
            && preg_match( '/<title.*?>(.*?)<\/title>/si', $data_original, $mathes ) ) {
            $title = $mathes[1];
        } else {
            if ( $doc_title == 'css' ) {
                $title_option = PTUtil::selector2xpath( $title_option );
            }
            $finder = new DomXPath( $dom );
            $elements = $finder->query( $title_option );
            if ( $elements === false || ! $elements->length ) {
                try {
                    $elements = $finder->evaluate( $title_option );
                    if ( is_string( $elements ) ) {
                        $title = $elements;
                        $elements = null;
                    }
                } catch ( Exception $e ) {
                    // trigger_error( $e->getMessage() );
                }
            }
            if ( is_object( $elements ) && $elements->length ) {
                $items = [];
                for ( $i = 0; $i < $elements->length; $i++ ) {
                    $ele = $elements->item( $i );
                    $items[] = $this->innerHTML( $ele );
                }
                if (!empty( $items ) ) {
                    $title = implode( ' ', $items );
                }
            }
            $title = is_string( $title ) ? trim( strip_tags( $title ) ) : $title;
            $title = str_replace( ["\r", "\n"], '', $title );
        }
        if (! $title ) {
            if ( is_object( $obj ) ) {
                $table = $app->get_table( $obj->_model );
                $primary = $table->primary;
                if ( $obj->has_column( $primary ) ) {
                    $title = $obj->$primary;
                }
                $date_based = ['yearly', 'monthly', 'daily', 'fiscal-yearly'];
                $archive_type = $ui->archive_type;
                // if object date based
                if ( in_array( $archive_type, $date_based ) ) {
                    $map = $ui->urlmapping;
                    $container = is_object( $map ) ? $map->container : '';
                    $container_label = '';
                    if ( $container ) {
                        $container_table = $app->get_table( $container );
                        $container_label = $container_table ? $container_table->plural : '';
                        $container_label = $app->translate( $container_label );
                    }
                    $ts = $obj->db2ts( $ui->archive_date );
                    list( $ts, $start, $end ) =
                    $app->title_start_end( $ui->archive_type, $ts, $map );
                    if ( $archive_type == 'fiscal-yearly' ) {
                        $fmt = $app->translate( '\F\i\s\c\a\l Y' );
                    } else if ( $archive_type == 'yearly' ) {
                        $fmt = $app->translate( 'Y' );
                    } else if ( $archive_type == 'monthly' ) {
                        $fmt = $app->translate( 'F, Y' );
                    } else if ( $archive_type == 'daily' ) {
                        $fmt = $app->translate( 'F d, Y' );
                    }
                    $date_args = [];
                    $date_args['ts'] = $start;
                    $date_args['format'] = $fmt;
                    $ts = $ctx->function_date( $date_args, $ctx );
                    $parent_label = $app->translate( $app->translate(
                        $obj->_model, null, $app, 'default' ) );
                    if ( $container_label ) {
                        if ( $ui->model == 'template' ) {
                            $title = $this->translate( '%1$s for %2$s', [ $container_label, $ts ] );
                        } else {
                            $title = $this->translate( '%1$s for %2$s %3$s %4$s',
                                [ $container_label, $ts, $parent_label, $title ] );
                        }
                    } else {
                        if ( $ui->model == 'template' ) {
                            $title = $ts;
                        } else {
                            $title = $this->translate( '%s(%s)', [ $title, $ts ] );
                        }
                    }
                }
            }
            if (! $title && is_object( $extractor->dom ) ) {
                $title = $this->get_heading( $extractor->dom );
            }
        }
        $data = html_entity_decode( $data );
        $title = $title ? $title : $extractor->title;
        $title = str_replace( ["\r", "\n"], '', $title );
        $ctx->local_vars['title'] = $title;
        $parse_result = null;
        $data = $ctx->modifier_merge_linefeeds( $data, '1', $ctx );
        $data = preg_replace("/(\r?\n)+/", "\n" , $data );
        $data = preg_replace("/\s{2,}/", ' ', $data );
        $ctx->local_vars['body_title'] = $title;
        $ctx->local_vars['meta_loop'] = [];
        $ctx->local_vars['meta_index_loop'] = [];
        $ctx->local_vars['extracted'] = '';
        if ( is_object( $extractor->dom ) ) {
            $metadata = $this->get_meta( $extractor->dom );
            if (! empty( $metadata ) && $app->searchestraier_skip_noindex ) {
                if ( isset( $metadata['robots'] ) && $metadata['robots'] == 'noindex' ) {
                    return false;
                }
            }
            $meta_index = $this->meta_index;
            if ( $meta_index === null ) {
                $meta_index = trim( $this->get_config_value( 'searchestraier_meta_index', (int) $ui->workspace_id ) );
                if (! $meta_index ) {
                    $meta_index = [];
                } else {
                    $meta_index = preg_split( "/\s*,\s*/", $meta_index );
                    $this->meta_index = $meta_index;
                }
            }
            $meta_index_loop = [];
            if (! empty( $meta_index ) ) {
                foreach ( $meta_index as $meta ) {
                    if ( isset( $metadata[ $meta ] ) ) {
                        $text = str_replace( ["\r", "\n"], '', $metadata[ $meta ] );
                        $meta_index_loop[] = $text;
                    }
                }
            }
            $meta_index_loop = array_merge( $meta_index_loop, $headings );
            $ctx->local_vars['meta_loop'] = $metadata;
            $ctx->local_vars['meta_index_loop'] = $meta_index_loop;
        }
        if ( $app->searchestraier_auto_keywords ) {
            if ( $this->mecab_path( $app ) ) {
                $end_of_sentense = preg_quote( $app->searchestraier_end_of_sentense );
                if (! preg_match( "/{$end_of_sentense}$/", $title ) ) {
                    $title .= $app->searchestraier_end_of_sentense;
                }
                $keywords = [];
                $this->mecab_parse( "{$title}\n{$title}\n{$data}",
                                    $keywords, $this->mecab_userdic, false, $parse_result );
                if ( count( $keywords ) ) {
                    $ctx->local_vars['extracted'] = implode( ',', $keywords );
                }
            }
        }
        if (! isset( $ctx->local_vars['site_name'] ) || !$ctx->local_vars['site_name'] ) {
            $site_name = $app->appname;
            if ( $workspace_id ) {
                $workspace = $ui->workspace;
                $site_name = $workspace ? $workspace->name : $site_name;
            }
            $site_name = str_replace( ["\r", "\n"], '', $site_name );
            $ctx->local_vars['site_name'] = $site_name;
        }
        $local_vars = $ctx->local_vars;
        foreach ( $local_vars as $key => $var ) {
            $ctx->vars[ $key ] = $var;
        }
        $keywords = $this->keywords[ $ui->workspace_id ] ?? false;
        if ( $keywords === false ) {
            $this->keywords[ $ui->workspace_id ] = [];
            $k_table = $app->get_table( 'keyword' );
            if ( is_object( $k_table ) ) {
                if ( $app->db->model( 'keyword' )->has_column( 'alternative' ) ) {
                    $extra = " AND ( keyword_alternative !='' AND keyword_alternative IS NOT NULL )";
                    $keywords = $app->db->model( 'keyword' )->load( ['workspace_id' => $ui->workspace_id,
                                                                     'status' => 2], null, 'name,alternative', $extra );
                    $this->keywords[ $ui->workspace_id ] = $keywords;
                }
            }
        }
        if (! empty( $keywords ) ) {
            $shakings = [];
            $allData = $title . ' ' . $data;
            $allData .= ' ' . $ctx->local_vars['metadata'];
            $allData .= ' ' . implode( ',', $ctx->local_vars['meta_index_loop'] );
            foreach ( $keywords as $keyword ) {
                if (! $keyword->alternative ) continue;
                list( $kName, $kAlt ) = [ $keyword->name, $keyword->alternative ];
                if ( stripos( $allData, $kName ) === false && stripos( $allData, $kAlt ) === false ) {
                    continue;
                }
                if ( stripos( $allData, $kName ) !== false && stripos( $allData, $kAlt ) === false ) {
                    $shakings[] = $kAlt;
                } else if ( stripos( $allData, $kName ) === false && stripos( $allData, $kAlt ) !== false ) {
                    $shakings[] = $kName;
                }
            }
            if (! empty( $shakings ) ) {
                $shakings = implode( ',', array_unique( $shakings ) );
                $data .= "\n\n\t{$shakings}\n";
            }
        }
        $ctx->local_vars['content'] = $data;
        if ( is_object( $ui ) ) {
            $ctx->local_vars['url'] = $ui->url;
            $ctx->vars['url'] = $ui->url;
            $ctx->local_vars['object_id'] = $ui->object_id;
            $ctx->local_vars['model'] = $ui->model;
            $ctx->local_vars['mime_type'] = $ui->mime_type;
            $ctx->vars['object_id'] = $ui->object_id;
            $ctx->vars['model'] = $ui->model;
            $ctx->vars['mime_type'] = $ui->mime_type;
        }
        if (! isset( $ctx->local_vars['url'] ) || !$ctx->local_vars['url'] ) {
            return false;
        }
        if ( $title_weight && $title_weight > 0 ) {
            if ( $title_weight > 1.0 ) $title_weight = 1.0;
            if ( $title_weight < 0.1 ) $title_weight = 0.1;
            $title_repeat = 1;
            $title = $ctx->local_vars['title'];
            if ( $data ) {
                $weight = mb_strlen( $title ) / mb_strlen( $data );
                $title_repeat = round( $title_weight / $weight );
            }
            if (! $title_repeat ) {
                $title_repeat = 1;
            }
            $ctx->local_vars['title_repeat'] = $title_repeat;
        }
        $build = $ctx->build( file_get_contents( $draft_tmpl ) );
        $build = PTUtil::normalize( $build );
        if ( $app->searchestraier_task_usleep && php_sapi_name() === 'cli' ) {
            usleep( $app->searchestraier_task_usleep );
        }
        return $build;
    }

    function sanitize_regex ( $str ) {
        if ( preg_match('!([a-zA-Z\s]+)$!s', $str, $matches ) && ( preg_match('/[eg]/', $matches[1] ) ) ) {
            $str = substr( $str, 0, - strlen( $matches[1] ) )
                 . preg_replace( '/[eg\s]+/', '', $matches[1] );
        }
        return $str;
    }

    function innerHTML ( $element ) { 
        $innerHTML = ''; 
        $children  = $element->childNodes;
        foreach ( $children as $child ) { 
            $innerHTML .= $element->ownerDocument->saveHTML( $child );
        }
        return $innerHTML; 
    } 

    function mecab_split ( $data, $connector = "\n", &$res = false, $word_only = false ) {
        $app = Prototype::get_instance();
        if ( $this->mecab_path( $app ) ) {
            $keywords = [];
            $split = $this->mecab_parse( $data, $keywords, $this->mecab_userdic, true, $res );
            $split_data = [];
            foreach ( $split as $w ) {
                list( $w, $info ) = array_pad( explode( "\t", $w ), 2, '' );
                if ( $w === 'EOS') continue;
                if ( $word_only && stripos( $info, '助詞' ) === 0 ) continue;
                $split_data[] = $w;
            }
            $data = implode( $connector, $split_data );
        }
        return $data;
    }

    function mecab_parse ( $data, &$keywords = [], $user_dic = '', $raw = false, &$res = false ) {
        $app = Prototype::get_instance();
        $dic_path = $app->searchestraier_mecab_dic_path;
        if (! is_array( $res ) ) {
            $data = trim( $data );
            if (! $data ) return [];
            $data = preg_replace( '/(、|「|」|）|（|【|】)/', '', $data );
            $data = str_replace( ["\r\n", "\r", "\n"], "\n", $data );
            $lines = explode( "\n", $data );
            $end_of_sentense = preg_quote( $app->searchestraier_end_of_sentense );
            $text = '';
            foreach ( $lines as $line ) {
                $line = trim( $line );
                if (! $line ) continue;
                if (! $end_of_sentense || preg_match( "/{$end_of_sentense}$/", $line ) ) {
                    $text .= "{$line}\n";
                } else {
                    $text .= $line;
                }
            }
            if (! $text ) return [];
            $class_name= 'Mecab\Tagger';
            if ( class_exists( $class_name ) ) {
                try {
                    $options = [];
                    if ( file_exists( $dic_path ) ) {
                        $options['-d'] = $dic_path;
                    }
                    if ( file_exists( $user_dic ) ) {
                        $options['-u'] = $user_dic;
                    }
                    $mecab = new MeCab\Tagger( $options );
                    $result = $mecab->parse( $text );
                    if ( $result !== false ) {
                        $res = explode( "\n", rtrim( $result ) );
                    }
                } catch ( Exception $e ) {
                    //
                }
            }
            $this->work_dir = $this->work_dir ? $this->work_dir : $app->upload_dir();
            if ( empty( $res ) ) {
                $upload_dir = $this->work_dir . DS;
                $cmd = $user_dic ? $this->mecab_path . " -u {$user_dic}" : $this->mecab_path;
                if ( file_exists( $dic_path ) ) {
                    $cmd .= " -d {$dic_path}";
                }
                $out = $upload_dir . md5( $data ) . '.txt';
                file_put_contents( $out, "{$text}\n" );
                $command = "{$cmd} {$out}";
                $result = shell_exec( $command );
                $res = explode( "\n", rtrim( $result ) );
            }
        }
        if ( $raw ) return $res;
        $min_word_len = $app->searchestraier_min_word_len;
        $word_multibyte_only = $app->searchestraier_word_multibyte_only;
        if (! empty( $res ) ) {
            foreach ( $res as $line ) {
                if ( $line == 'EOS' ) {
                    continue;
                }
                list( $word, $result ) = explode( "\t", $line );
                if ( $word_multibyte_only && strlen( $word ) == mb_strlen( $word ) ) {
                    continue;
                }
                if ( mb_strlen( $word ) <= $min_word_len ) {
                    continue;
                }
                $word = strtolower( $word );
                $result = explode( ',', $result );
                if ( $result[0] != '名詞' ) continue;
                if ( $result[1] != '一般' && $result[1] != '固有名詞' ) continue;
                $words = strpos( $word, '・' ) !== false ? explode( '・', $word ) : [ $word ];
                foreach ( $words as $word ) {
                    if ( isset( $keywords[ $word ] ) ) {
                        $keywords[ $word ] = $keywords[ $word ] + 1;
                    } else {
                        $keywords[ $word ] = 1;
                    }
                }
            }
            arsort( $keywords );
            $filtered = [];
            if ( count( $keywords ) ) {
                $min_word_cnt = $app->searchestraier_min_word_cnt;
                foreach ( $keywords as $keyword => $cnt ) {
                    if ( $cnt < $min_word_cnt ) {
                        break;
                    }
                    $filtered[] = $keyword;
                }
                $keywords = $filtered;
            }
        }
        return $res;
    }

    function get_relation_labels ( $app, $obj, $name = '' ) {
        $relation_labels = [];
        $scheme = $app->get_scheme_from_db( $obj->_model );
        if (! is_array( $scheme ) || !isset( $scheme['edit_properties'] ) ) {
            return $relation_labels;
        }
        $edit_properties = $scheme['edit_properties'];
        $excludes = ['user_id', 'parent_id'];
        foreach ( $edit_properties as $column => $props ) {
            if ( in_array( $column, $excludes ) ) {
                continue;
            }
            if ( strpos( $props, ':' ) === false ) {
                continue;
            }
            if ( $name && $column != $name ) {
                continue;
            }
            $props = explode( ':', $props );
            if ( $props[0] != 'relation' && $props[0] != 'reference' ) {
                continue;
            } else if ( $props[1] === '__any__' ) {
                continue;
            }
            $col_name = $props[2];
            $related_objs = $app->load_related_objs( $obj, $props[1], [], [], "id,{$col_name}" );
            if (! is_array( $related_objs ) || ! count( $related_objs ) ) {
                continue;
            }
            foreach ( $related_objs as $related_obj ) {
                $label = trim( $related_obj->$col_name );
                $label = trim( str_replace( ["\r", "\n"], '', $label ) );
                if ( $related_obj->_model == 'tag' && strpos( $label, '@' ) === 0 ) {
                    continue;
                }
                $relation_labels[] = $label;
            }
        }
        return $relation_labels;
    }

    private function is_not_html ( $text ) {
        return preg_match( '/\A\s*<!DOCTYPE\s+html|<title[\s>]/i', $text ) !== 1;
    }

    function get_heading ( $dom ) {
        $arr = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
        $title = null;
        foreach ( $arr as $tag ) {
            $elements = $dom->getElementsByTagName( $tag );
            if ( $elements->length ) {
                for ( $i = 0; $i < $elements->length; $i++ ) {
                    $ele = $elements->item( $i );
                    $title = trim( $ele->textContent );
                    $children = $ele->childNodes;
                    if (! $title && $children->length ) {
                        $title = $this->get_title_from_node( $ele->childNodes, $title );
                    }
                    if ( $title ) break;
                }
            }
            if ( $title ) break;
        }
        return $title;
    }

    function get_meta ( $dom ) {
        $meta_elements = $dom->getElementsByTagName( 'meta' );
        $metadata = [];
        if ( $meta_elements->length ) {
            $i = $meta_elements->length - 1;
            for ( $i = 0; $i < $meta_elements->length; $i++ ) {
                $ele = $meta_elements->item( $i );
                $name = strtolower( $ele->getAttribute( 'name' ) );
                $content = trim( $ele->getAttribute( 'content' ) );
                if ( $name == 'viewport' ) continue;
                if ( $name == 'format-detection' ) continue;
                if ( $name ) {
                    $name = str_replace( ["\r", "\n"], '', $name );
                    if ( $content !== '' ) {
                        $content = str_replace( ["\r", "\n"], '', $content );
                    }
                    $metadata[ $name ] = $content;
                }
            }
        }
        return $metadata;
    }

    function get_title_from_node ( $children, &$title ) {
        for ( $i = 0; $i < $children->length; $i++ ) {
            $child = $children->item( $i );
            $title .= trim( $child->textContent );
            if ( $child->nodeName == 'img' ) {
                $title .= trim( $child->getAttribute( 'alt' ) );
            }
            $grandchildren = $child->childNodes;
            if ( $grandchildren->length ) {
                $this->get_title_from_node( $grandchildren, $title );
            }
        }
        return $title;
    }

    function modifier_notations ( $text, $arg, $ctx ) {
        $app = $ctx->app;
        $dic_dir = $app->pt_dir . DS . 'plugins' . DS . 'SimplifiedJapanese' . DS . 'dictionaries' . DS;
        $dict = $dic_dir . 'notation.dic';
        if (! $app->fmgr->exists( $dict ) ) {
            return '';
        }
        $lib = LIB_DIR . 'Prototype' . DS . 'class.PTKanjiCharacters.php';
        if (! $app->fmgr->exists( $lib ) ) {
            return '';
        }
        $can_mecab = $this->mecab_path( $app );
        if (! $can_mecab ) {
            return '';
        }
        if (! $arg ) {
            $arg = ',';
        }
        $keywords = [];
        $res = $this->mecab_parse( $text, $keywords, $dict, true );
        $kanji = new PTKanjiCharacters();
        $pattern = PTKanjiCharacters::PT_KANJI_PATTERN;
        $notations = [];
        foreach ( $res as $parse ) {
            if ( $parse === 'EOS' || strpos( $parse, "\t" ) === false ) {
                continue;
            }
            list( $word, $setting ) = explode( "\t", $parse );
            if (! preg_match( $pattern, $word ) && mb_strlen( $word ) < 4 ) {
                continue;
            }
            $csv = explode( ',', $setting );
            if (! isset( $csv[9] ) ) continue;
            $notation = $csv[9];
            $notations[ $notation ][ $word ] = true;
        }
        $unique = [];
        foreach ( $notations as $key => $notation ) {
            $words = explode( '/', $key );
            foreach ( $words as $word ) {
                if ( isset( $notations[ $key ][ $word ] ) || mb_strlen( $word ) < 2 ) {
                    continue;
                }
                $unique[ $word ] = true;
            }
        }
        $workspace = $app->ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        if ( $app->searchestraier_bannedwords_rules ) {
            $rules = [];
            if ( isset( $this->rules_banned_words[ $workspace_id ] ) ) {
                $rules = $this->rules_banned_words[ $workspace_id ];
            } else {
                $plugin = $app->component( 'BannedWords' );
                if ( $plugin ) {
                    $inheritance = $plugin->get_config_value( 'bannedwords_inheritance', $workspace_id );
                    $cfg_workspace_id = $workspace_id;
                    if ( $inheritance ) {
                        $cfg_workspace_id = 0;
                    }
                    $rules = trim( $plugin->get_config_value( 'bannedwords_rules', $cfg_workspace_id ) );
                    if ( $rules ) {
                        $rules = preg_replace( "/\r\n|\r/","\n", $rules );
                        $rules = explode( "\n", $rules );
                        $all_rules = [];
                        foreach ( $rules as $rule ) {
                            if ( strpos( $rule, ',' ) === false ) continue;
                            list( $search, $replace ) = preg_split( '/\s*,\s*/', $rule );
                            $all_rules[ $search ] = $replace;
                        }
                        $rules = $all_rules;
                    } else {
                        $rules = [];
                    }
                }
            }
            $this->rules_banned_words[ $workspace_id ] = $rules;
            $add_words = [];
            foreach ( $rules as $search => $replace ) {
                if ( stripos( $text, $search ) !== false && stripos( $text, $replace ) === false ) {
                    $unique[ $replace ] = true;
                    $add_words[ $replace ] = true;
                }
                if ( stripos( $text, $replace ) !== false && stripos( $text, $search ) === false ) {
                    $unique[ $search ] = true;
                    $add_words[ $search ] = true;
                }
            }
            foreach ( $add_words as $add_word => $bool ) {
                if ( in_array( $add_word, $rules ) ) {
                    foreach ( $rules as $search => $replace ) {
                        if ( $replace === $add_word && stripos( $text, $search ) === false ) {
                            $unique[ $search ] = true;
                        }
                    }
                }
                if ( isset( $rules[ $add_word ] ) ) {
                    $search = $rules[ $add_word ];
                    if ( stripos( $text, $search ) === false ) {
                        $unique[ $search ] = true;
                    }
                }
            }
        }
        $rules = [];
        if ( isset( $this->notation_rules[ $workspace_id ] ) ) {
            $rules = $this->notation_rules[ $workspace_id ];
        } else {
            $rules = trim( $this->get_config_value( 'searchestraier_notations', $workspace_id ) );
            if ( $rules ) {
                $rules = preg_replace( "/\r\n|\r/","\n", $rules );
                $rules = explode( "\n", $rules );
                $all_rules = [];
                foreach ( $rules as $rule ) {
                    if ( strpos( $rule, ',' ) === false ) continue;
                    $all_rules[] = preg_split( '/\s*,\s*/', $rule );
                }
                $rules = $all_rules;
            } else {
                $rules = [];
            }
        }
        $this->notation_rules[ $workspace_id ] = $rules;
        foreach ( $rules as $rule ) {
            $match = false;
            foreach ( $rule as $idx => $word ) {
                if ( stripos( $text, $word ) !== false ) {
                    $match = true;
                    unset( $rule[ $idx ] );
                }
            }
            if ( $match ) {
                foreach ( $rule as $word ) {
                    $unique[ $word ] = true;
                }
            }
        }
        return implode( $arg, array_keys( $unique ) );
    }

    function hdlr_estraier_search ( $args, $content, $ctx, &$repeat, $counter ) {
        $localvars = array( '_estraier_search_time', '_estraier_count', '_estraier_snippets',
            '_estraier_search_hit', '_estraier_search_meta', '_estraier_search_results', '_estraier_limit' );
        $default_limit = isset( $args['default_limit'] ) ? $args['default_limit'] : '-1';
        $prefix = isset( $args['prefix'] ) ? $args['prefix'] : '';
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $app = $ctx->app;
        if (! isset( $content ) ) {
            $setlocale = setlocale( LC_CTYPE, 'UTF8', 'ja_JP.UTF-8' );
            $phrase = '';
            if ( isset( $_REQUEST['phrase'] ) ) {
                $phrase = $_REQUEST['phrase'];
            } else if ( isset( $_REQUEST['query'] ) ) {
                $phrase = $_REQUEST['query'];
            } else if ( isset( $args['query'] ) ) {
                $phrase = $args['query'];
            }
            $raw_exp = '';
            if ( $phrase ) {
                if (! is_array( $phrase ) ) {
                    $phrase = $this->convert_utf8( $phrase, $app, true );
                    $phrase = mb_convert_kana( $phrase, 's' );
                    $raw_exp = $phrase;
                    $phrase = PTUtil::normalize( $phrase );
                }
            }
            $ctx->localize( $localvars );
            $offset = 0;
            if ( isset( $args['limit'] ) ) {
                $limit = $args['limit'];
                if (! ctype_digit((string) $limit ) ) {
                    $limit = $default_limit;
                }
            } else if ( isset( $_REQUEST['limit'] ) ) {
                $limit = $_REQUEST['limit'];
                if (! ctype_digit((string) $limit ) ) {
                    $limit = $default_limit;
                }
            } else {
                $limit = $default_limit;
            }
            if ( isset( $args['offset'] ) ) {
                $offset = $args['offset'];
                if (! ctype_digit((string) $offset ) ) {
                    $offset = null;
                }
            } else if ( isset( $_REQUEST['offset'] ) ) {
                $offset = $_REQUEST['offset'];
                if (! ctype_digit((string) $offset ) ) {
                    $offset = null;
                }
            }
            if ( isset( $offset ) ) {
                if ( isset( $_REQUEST['decrementoffset'] ) ) {
                    if ( $_REQUEST['decrementoffset'] ) {
                        $offset--;
                    }
                }
            }
            $offset = (int) $offset;
            $callback = ['name' => 'pre_search_estraier'];
            if (! $app->searchestraier_callback_compat ) {
                $app->init_callbacks( 'searchestraier', 'pre_search_estraier' );
                $app->run_callbacks( $callback, 'searchestraier', $phrase, $args );
            } else {
                // Backward compatibility.
                $app->init_callbacks( 'search_estraier', 'pre_search_estraier' );
                $app->run_callbacks( $callback, 'search_estraier', $phrase, $args );
            }
            $need_count = false;
            $json = isset( $args['json'] ) ? isset( $args['json'] ) : false;
            if ( isset( $args['count'] ) ) {
                if ( $args['count'] ) {
                    $need_count = 1;
                    $limit = 0;
                }
            }
            if ( isset( $args['add_attr'] ) ) {
                $add_attr = $args['add_attr'];
            } else if ( isset( $args['add_attrs'] ) ) {
                $add_attr = $args['add_attrs'];
            } else if ( isset( $args['ad_attr'] ) ) { // Backward compatibility
                $add_attr = $args['ad_attr'];
            } else if ( isset( $args['ad_attrs'] ) ) { // Backward compatibility
                $add_attr = $args['ad_attrs'];
            }
            if ( isset( $args['add_condition'] ) ) {
                $add_condition = $args['add_condition'];
            } else if ( isset( $args['add_conditions'] ) ) {
                $add_condition = $args['add_conditions'];
            }
            if ( isset( $args['value'] ) ) {
                $values = $args['value'];
            } else if ( isset( $args['values'] ) ) {
                $values = $args['values'];
            }
            if ( isset( $add_condition ) ) {
                if (! is_array( $add_condition ) ) {
                    $add_condition = [ $add_condition ];
                }
            }
            if ( isset( $values ) ) {
                if (! is_array( $values ) ) {
                    $values = [ $values ];
                }
            }
            if (! empty( $values ) ) {
                foreach ( $values as $idx => $value ) {
                    $values[ $idx ] = PTUtil::normalize( $value );
                }
            }
            if ( isset( $add_attr ) ) {
                if (! is_array( $add_attr ) ) {
                    $add_attr = [ $add_attr ];
                }
                if ( count( $add_attr ) ) {
                    $add_condition = array_pad( $add_condition, count( $add_attr ), '' );
                    if ( is_array( $values ) ) {
                        $values = array_pad( $values, count( $add_attr ), '' );
                    }
                }
            }
            $i = 0;
            $conditions_allow = ['STREQ', 'STRNE', 'STRINC', 'STRBW', 'STREW', 'STRAND',
                                 'STROR', 'STROREQ', 'STRRX', 'NUMEQ', 'NUMNE', 'NUMGT',
                                 'NUMGE', 'NUMLT', 'NUMLE', 'NUMBT'];
            $condition = '';
            if ( isset( $add_attr ) && is_array( $add_attr ) ) {
                foreach( $add_attr as $attr ) {
                    $cond = strtoupper( $add_condition[ $i ] );
                    $value = $values[ $i ];
                    $i++;
                    if (! in_array( $cond, $conditions_allow ) ) continue;
                    $add_cond = " -attr " . $this->mb_escapeshellarg( "{$attr} {$cond} {$value}", $setlocale );
                    $condition .= $add_cond;
                }
            }
            $workspace_ids = [];
            if ( $app->searchestraier_attr_index_path && isset( $args['index'] ) && is_dir( $args['index'] ) ) {
                $index_path = $args['index'];
            } else {
                $index_path = $this->get_config_value( 'searchestraier_data_dir', $workspace_id );
                $settings = $app->db->model( 'option' )->load( ['key' => 'searchestraier_data_dir', 'kind' => 'plugin_setting' ] );
                foreach ( $settings as $setting ) {
                    if ( $index_path == $setting->value ) {
                        $workspace_ids[] = (int) $setting->workspace_id;
                    }
                }
                $index_path = $app->build( $index_path );
            }
            if (! $index_path || ! file_exists( $index_path ) ) {
                $repeat = $ctx->false();
                return;
            }
            $backup = "{$index_path}.bk";
            $workspace_ids = $this->workspace_attr( $app, $args, $workspace_ids );
            if ( is_array( $workspace_ids ) && count( $workspace_ids ) ) {
                $workspace_ids = implode( ' ', $workspace_ids );
                $add_cond = " -attr " . escapeshellarg( "@workspace_id STROREQ {$workspace_ids}" );
                $condition .= $add_cond;
            }
            $model = isset( $args['model'] ) ? $args['model'] : '';
            if ( $model && $app->get_table( $model ) ) {
                $condition .= " -attr " . escapeshellarg( "@model STREQ {$model}" );
            }
            $exclude_models = isset( $args['exclude_models'] ) ? $args['exclude_models'] : '';
            if ( $exclude_models ) {
                $exclude_models = preg_split( "/\s*,\s*/", $exclude_models );
                foreach ( $exclude_models as $model ) {
                    if ( $model && $app->get_table( $model ) ) {
                        $condition .= " -attr " . escapeshellarg( "@model STRNE {$model}" );
                    }
                }
            }
            $cmd = $this->estcmd_path( $app );
            if (! $cmd ) {
                $repeat = $ctx->false();
                return;
            }
            if ( substr( PHP_OS, 0, 3 ) == 'WIN' ) {
                $cmd .= " search -ic SHIFT_JIS";
            } else {
                $cmd .= " search";
            }
            $snippet_width = isset( $args['snippet_width'] )
                            ? (int) $args['snippet_width'] : 200;
            $snippet_width = abs( $snippet_width );
            $cmd .= " -sn {$snippet_width} 100 100";
            if ( isset( $args['auxiliary'] ) ) {
                $auxiliary = (string) $args['auxiliary'];
                if ( ctype_digit( (string) $auxiliary ) ) {
                    $cmd .= " -aux {$auxiliary}";
                }
            } else {
                $cmd .= " -aux 0";
            }
            if ( isset( $args['definitely'] ) ) {
                $cmd .= " -cd";
            }
            if (! $app->searchestraier_force_ngram ) {
                if ( isset( $args['ngram'] ) && $args['ngram'] ) {
                } else {
                    if ( $this->mecab_path( $app ) ) {
                        $cmd .= ' -um';
                    }
                }
            }
            $cmd .= $condition;
            if (! $need_count ) {
                $sort_by = null;
                $sort_order = null;
                if ( isset( $args['sort_by'] ) ) {
                    $sort_by = $args['sort_by'];
                }
                if ( isset( $args['sort_order'] ) ) {
                    $sort_order = $args['sort_order'];
                }
                if ( $sort_by && $sort_order ) {
                    $order_allow = ['STRA', 'STRD', 'NUMA', 'NUMD'];
                    if ( in_array( $sort_order, $order_allow ) ) {
                    } elseif ( stripos( $sort_order, 'asc' ) === 0 ) {
                        $sort_order = 'NUMA';
                    } else {
                        $sort_order = 'NUMD';
                    }
                    $cmd .= " -ord " . escapeshellarg( "{$sort_by} {$sort_order}" );
                }
            }
            $count_cmd = $cmd . " -vu";
            if ( $limit > 0 ) $limit++;
            $cmd .= " -max {$limit}";
            if ( $offset ) {
                $cmd .= " -sk {$offset}";
            }
            $count_cmd .= " -max -1";
            $cmd .= " -vx";
            $index_path = escapeshellarg( $index_path );
            $cmd .= ' ' . $index_path;
            $count_cmd .= ' ' . $index_path;
            $raw_query = '';
            $mecab_split = false;
            if ( $phrase ) {
                $and_or = isset( $args['and_or'] ) ? $args['and_or'] : '';
                $and_or = isset( $_REQUEST['and_or'] ) ? $_REQUEST['and_or'] : $and_or;
                if (! $and_or || ( $and_or != 'AND' && $and_or != 'OR' ) ) {
                    $and_or = 'OR';
                }
                $and_or = strtoupper( $and_or );
                $and_or = " {$and_or} ";
                $connector = $and_or == ' OR ' ? ' AND ' : ' ';
                $phrases = [];
                if ( is_array( $phrase ) ) {
                    if ( $app->searchestraier_force_mecab ) {
                        $newPhrase = [];
                        $mecab_split = [];
                        foreach ( $phrase as $ph ) {
                            if (! isset( $mecab_split[$ph] ) ) $mecab_split[$ph] = false;
                            $newPhrase[] = $this->mecab_split( $ph, ' ', $mecab_split[$ph], true );
                        }
                        $phrase = $newPhrase;
                    }
                    $phrase = trim( implode( $and_or, $phrase ) );
                    $phrase = $this->convert_utf8( $phrase, $app, true );
                    $phrase = mb_convert_kana( $phrase, 's' );
                    $phrase = PTUtil::normalize( $phrase );
                } else {
                    $quotes = mb_substr_count( $phrase, '"' );
                    if ( $quotes && $quotes % 2 == 0 ) {
                        while ( strpos( $phrase, '"' ) !== false ) {
                            preg_match( '/".*?"/si', $phrase, $quoted );
                            $phrase = preg_replace( '/".*?"/si', '', $phrase );
                            $phrases[] = trim( $quoted[0], '"' );
                        }
                    }
                    if ( isset( $args['raw_query'] ) ) $raw_query = $args['raw_query'];
                    if (! $raw_query ) {
                        $separator = '';
                        if ( isset( $args['separator'] ) ) $separator = $args['separator'];
                        if (! $separator ) $separator = ' ';
                        if ( strpos( $phrase, $separator ) !== false ) {
                            $phrase = array_filter( explode( $separator, $phrase ), function ( $value ) {
                                return ( $value || $value === '0' ) ? true : false;
                            } );
                            if ( $app->searchestraier_force_mecab ) {
                                $newPhrase = [];
                                $mecab_split = [];
                                foreach ( $phrase as $ph ) {
                                    if (! isset( $mecab_split[$ph] ) ) $mecab_split[$ph] = false;
                                    $newPhrase[] = $this->mecab_split( $ph, $connector, $mecab_split[$ph], true );
                                }
                                $phrase = $newPhrase;
                            }
                            $phrase = join( $and_or, $phrase );
                        } else if ( $app->searchestraier_force_mecab ) {
                            $phrase = trim( $this->mecab_split( $phrase, ' AND ', $mecab_split, true ) );
                        }
                    } else {
                        if ( $app->searchestraier_force_mecab ) {
                            $phrase = trim( $this->mecab_split( $phrase, $connector, $mecab_split, true ) );
                        }
                    }
                    if (!empty( $phrases ) ) {
                        $phrase = $phrase ? $phrase . " {$and_or}" . implode( $and_or, $phrases )
                                          : implode( $and_or, $phrases );
                        $phrase = trim( $phrase );
                    }
                    $phrase = str_replace( ["\r", "\n"], '', $phrase);
                }
                $phrase = $this->mb_escapeshellarg( $phrase, $setlocale );
                $cmd .= " {$phrase}";
                $count_cmd .= " {$phrase}";
            } else if ( isset( $args['no_query'] ) && $args['no_query'] ) {
            } else {
                $repeat = $ctx->false();
                return;
            }
            $ctx->local_vars['estcmd_cmd'] = htmlspecialchars( $cmd, ENT_COMPAT, 'UTF-8', false );
            if ( isset( $args['debug'] ) ) {
                echo $ctx->local_vars['estcmd_cmd'];
            }
            if ( strpos( $cmd, "\r" ) !== false || strpos( $cmd, "\n" ) !== false ) {
                $repeat = $ctx->false();
                return;
            }
            $cmd = str_replace( "\0", '', $cmd );
            $count_cmd = str_replace( "\0", '', $count_cmd );
            if ( substr( PHP_OS, 0, 3 ) == 'WIN' ) {
                $phrase = mb_convert_encoding( $phrase, 'sjis-win', 'UTF-8');
            }
            $hit = null;
            if ( $app->searchestraier_definitely ) {
                exec( $count_cmd, $output, $return_var );
                if ( $return_var !== 0 ) {
                    if ( file_exists( $backup ) ) {
                        $args['index'] = $backup;
                        return $this->hdlr_estraier_search( $args, $content, $ctx, $repeat, $counter );
                    }
                }
                $tsv = implode( PHP_EOL, $output );
                $tsv = explode( '--------', $tsv );
                $tsv = trim( $tsv[4] );
                $tsv = explode( PHP_EOL, $tsv );
                $hit = count( $tsv );
            }
            $output = [];
            exec( $cmd, $output, $return_var );
            if ( $return_var !== 0 ) {
                if ( file_exists( $backup ) ) {
                    $args['index'] = $backup;
                    return $this->hdlr_estraier_search( $args, $content, $ctx, $repeat, $counter );
                }
            }
            $xml = implode( '', $output );
            try {
                $result = new SimpleXMLElement( $xml );
            } catch ( Exception $e ) {
                trigger_error( $e->getMessage() );
                if ( file_exists( $backup ) ) {
                    $args['index'] = $backup;
                    return $this->hdlr_estraier_search( $args, $content, $ctx, $repeat, $counter );
                }
                $repeat = $ctx->false();
                return;
            }
            preg_match_all( "/<snippet>(.*?)<\/snippet>/s", $xml, $snippets );
            $snippets = $snippets[1];
            $ctx->stash( '_estraier_snippets', $snippets );
            $records = $result->document;
            $meta = $result->meta;
            $ctx->stash( '_estraier_search_meta', $meta );
            if (! $hit ) {
                $hit = $meta->hit;
                $hit = $hit->attributes()->number;
                $hit = ( int ) $hit;
            }
            if ( $need_count ) {
                $repeat = $ctx->false();
                $ctx->restore( $localvars );
                return $hit;
            }
            $ctx->local_vars[ $prefix . 'hit'] = $hit;
            $time = $meta->time;
            $time = $time->attributes()->time;
            $time = ( string ) $time;
            $ctx->stash( '_estraier_search_time', $time );
            $ctx->local_vars[ $prefix . 'totaltime'] = $time;
            $ctx->stash( '_estraier_search_hit', $hit );
            $max = count( $records );
            $ctx->local_vars[ $prefix . 'resultcount'] = $max;
            $ctx->stash( '_estraier_count', $max );
            $ctx->local_vars[ $prefix . 'totalresult'] = $max;
            if ( $limit > 0 ) {
                $limit--;
                $ctx->local_vars[ $prefix . 'limit'] = $limit;
                $total = ceil( $hit / $limit );
                $ctx->local_vars[ $prefix . 'pagertotal'] = $total;
                if ( ( $offset + $limit ) < $hit ) {
                    $ctx->local_vars[ $prefix . 'nextoffset'] = $offset + $limit;
                }
                if ( $offset ) {
                    $prevoffset = $offset - $limit;
                    if ( $prevoffset < 0 ) {
                        $prevoffset = 0;
                    }
                    $ctx->local_vars[ $prefix . 'prevoffset'] = $prevoffset;
                }
                $current = $offset / $limit + 1;
                $ctx->local_vars[ $prefix . 'currentpage'] = floor( $current );
            }
            if ( isset( $args['shuffle'] ) ) {
                if ( $args['shuffle'] ) {
                    $_count = count( $records );
                    $_records = array();
                    for ( $i = 0; $i < $_count; $i++ ) {
                        $_records[] = $records[ $i ];
                    }
                    shuffle( $_records );
                    $records = $_records;
                }
            }
            if ( $json ) {
                $repeat = $ctx->false();
                $ctx->restore( $localvars );
                $results = array( 'records' => $records, 'snippets' => $snippets,
                                  'raw_exp' => $raw_exp, 'time' => $time, 'hit' => $hit,
                                  'phrase' => $phrase, 'limit' => $limit, 'offset' => $offset );
                return $results;
            }
            $ctx->local_params = $records;
            $ctx->stash( '_estraier_search_results', $records );
            $count = count( $records );
            if ( $limit && ( $limit < $count ) ) {
                unset( $records[ $limit ] );
            }
            $ctx->stash( '_estraier_limit', $limit );
        } else {
            $records = $ctx->stash( '_estraier_search_results' );
            $snippets = $ctx->stash( '_estraier_snippets' );
            $meta = $ctx->stash( '_estraier_search_meta' );
            $hit = $ctx->stash( '_estraier_search_hit' );
            $time = $ctx->stash( '_estraier_search_time' );
            $max = $ctx->stash( '_estraier_count' );
        }
        $limit = $ctx->stash( '_estraier_limit' );
        $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $records[ $counter ] ) ) {
            $record = $records[ $counter ];
            $attrs = $record->attribute;
            $ctx->local_vars[ $prefix . 'title' ] = '';
            $_uri = null;
            foreach( $attrs as $attr ) {
                $val = $attr->attributes()->value[ 0 ];
                $val = ( string ) $val;
                $name = $attr->attributes()->name;
                $name = ( string ) $name;
                $name = ltrim( $name, '@' );
                $ctx->local_vars[ $prefix . $name ] = $val;
            }
            $ctx->stash( '_estraier_record', $record );
            if (! $_uri ) {
                $_uri = $record->attributes()->uri;
                $_uri = ( string )$_uri;
            }
            $_id = $record->attributes()->id;
            $_id = ( string )$_id; 
            $ctx->local_vars[ $prefix . 'uri'] = $_uri;
            $ctx->local_vars[ $prefix . 'id'] = $_id;
            $snippet = $snippets[ $counter ];
            $snippet = str_replace( '<key', '<strong', $snippet );
            $snippet = str_replace( '</key>', '</strong>', $snippet );
            $snippet = str_replace( '<delimiter/>', '... ', $snippet );
            $snippet = preg_replace( '/ normal=".*?"/', '', $snippet );
            if ( $app->searchestraier_force_mecab ) {
                $snippets = explode( ' ', $snippet );
                $i = 0;
                foreach ( $snippets as $sn ) {
                    $pre = '';
                    if ( isset( $snippets[ $i - 1 ] ) &&
                        strlen( $snippets[ $i - 1 ] ) === mb_strlen( $snippets[ $i - 1 ] ) ) {
                        $pre = ' ';
                    }
                    $after = '';
                    if ( isset( $snippets[ $i + 1 ] ) && isset( $snippets[ $i - 1 ] ) &&
                        strlen( $snippets[ $i + 1 ] ) === mb_strlen( $snippets[ $i - 1 ] ) ) {
                        $after = ' ';
                    }
                    $snippets[ $i ] = strlen( $sn ) === mb_strlen( $sn ) ? "{$pre}{$sn}{$after}" : $sn;
                    $i++;
                }
                $snippet = str_replace( '  ', ' ', implode( '', $snippets ) );
            }
            $ctx->local_vars[ $prefix . 'snippet'] = $snippet;
            $count = $counter + 1;
            $repeat = true;
        } else {
            $ctx->restore( $localvars );
            $repeat = $ctx->false();
        }
        return $content;
    }

    function hdlr_estraier_json ( $args, $ctx ) {
        $time_start = microtime( true );
        $args['json'] = 1;
        $content = null;
        $repeat = true;
        $counter = 0;
        $results = $this->hdlr_estraier_search( $args, $content, $ctx, $repeat, $counter );
        $jsonp = isset( $args['jsonp'] ) ? true : false;
        $callback = isset( $args['callback'] ) ? $args['callback'] : 'callback';
        $callback = isset( $_REQUEST['callback'] ) ? $_REQUEST['callback'] : $callback;
        if ( $callback && (! preg_match( "/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/", $callback ) ) ) {
            $callback = false;
            $jsonp = false;
        }
        if ( $callback ) {
            $jsonp = true;
        }
        $records = $results['records'];
        $snippets = $results['snippets'];
        $hit = (int) $results['hit'];
        $phrase = $results['phrase'];
        $raw_exp = $results['raw_exp'];
        $limit = $results['limit'];
        $prefix = isset( $args['prefix'] ) ? $args['prefix'] : '';
        if ( isset( $args['phrase'] ) ) {
            $query = $args['phrase'];
        } else if ( isset( $args['query'] ) ) {
            $query = $args['query'];
        }
        $i = 0;
        $items = [];
        $attributes = $args['attributes'] ?? null;
        if ( $attributes && is_string( $attributes ) ) {
            if ( $attributes == 'all' ) {
                $attributes = true;
            } else {
                $attributes = preg_split( '/\s*,\s*/', $attributes );
            }
        }
        foreach ( $records as $record ) {
            $resource = array();
            $attrs = $record->attribute;
            $id = (int) $record->attributes()->id;
            $snippet = $snippets[ $i ];
            $snippet = str_replace( '<key', '<strong', $snippet );
            $snippet = str_replace( '</key>', '</strong>', $snippet );
            $snippet = str_replace( '<delimiter/>', '... ', $snippet );
            $snippet = preg_replace( '/ normal=".*?"/', '', $snippet );
            $uri = ( string )$record->attributes()->uri;
            $resource['uri'] = $uri;
            $resource['id'] = $id;
            $resource['excerpt'] = $snippet;
            foreach ( $attrs as $attr ) {
                $val = $attr->attributes()->value[ 0 ];
                $val = ( string ) $val;
                $name = $attr->attributes()->name;
                $name = ( string ) $name;
                if ( $name === '@title' ) {
                    $resource['title'] = $val;
                } else if ( $name == 'tsutaeru_uri' ) {
                    $resource['uri'] = $val;
                } else if ( $name == '@object_id' ) {
                    $resource['object_id'] = $val;
                } else if ( $name == '@model' ) {
                    $resource['model'] = $val;
                } else {
                    if ( $attributes === true ) {
                        $resource[ $name ] = $val;
                    } else if ( is_array( $attributes ) && in_array( $name, $attributes ) ) {
                        $resource[ $name ] = $val;
                    }
                }
            }
            $i++;
            $items[] = $resource;
        }
        $phrase = trim( $phrase, "'" );
        $results = array( 'total_match_items' => $hit, 'items' => $items, 'phrase' => $raw_exp );
        $url = $ctx->local_vars['current_archive_url'] ?? '';
        $base_url = $url . '?query=' . rawurlencode( $raw_exp ) . '&limit=' . $limit;
        if ( isset( $ctx->local_vars[ $prefix . 'nextoffset'] ) ) {
            $next_offset = $ctx->local_vars[ $prefix . 'nextoffset'];
            $next_url = "{$base_url}&offset={$next_offset}";
            $results['nextURL'] = $next_url;
        }
        if ( isset( $ctx->local_vars[ $prefix . 'prevoffset'] ) ) {
            $prev_offset = $ctx->local_vars[ $prefix . 'prevoffset'];
            $prev_url = "{$base_url}&offset={$prev_offset}";
            $results['previousURL'] = $prev_url;
        }
        if ( isset( $ctx->local_vars[ $prefix . 'currentpage'] ) ) {
            $results['currentPage'] = $ctx->local_vars[ $prefix . 'currentpage'];
        }
        if ( isset( $ctx->local_vars[ $prefix . 'pagertotal'] ) ) {
            $results['totalPage'] = $ctx->local_vars[ $prefix . 'pagertotal'];
        }
        $pagenavi = [];
        $total_pages = null;
        $active_page = null;
        if ( isset( $ctx->local_vars[ $prefix . 'pagertotal'] ) ) {
            $total_pages = $ctx->local_vars[ $prefix . 'pagertotal'];
        }
        if ( isset( $ctx->local_vars[ $prefix . 'currentpage'] ) ) {
            $active_page = $ctx->local_vars[ $prefix . 'currentpage'];
        }
        if ( $limit > 0 ) {
            $pagenavi['first_item'] = ['offset' => 0, 'number' => 1];
            $pagenavi['active_page'] = $active_page;
            $pagenavi['total_pages'] = $total_pages;
            if ( $active_page > 1 ) {
                $prev_item = $active_page - 1;
                $pagenavi['prev_item'] = ['number' => $prev_item ];
                $prev_item--;
                $pagenavi['prev_item']['offset'] = $limit * $prev_item;
            }
            if ( $active_page < $total_pages ) {
                $next_item = $active_page + 1;
                $pagenavi['next_item'] = ['number' => $next_item ];
                $next_item--;
                $pagenavi['next_item']['offset'] = $limit * $next_item;
            }
            if ( $total_pages > 1 ) {
                $last_item = $total_pages;
                $pagenavi['last_item'] = ['number' => $total_pages ];
                $last_item--;
                $pagenavi['last_item']['offset'] = $limit * $last_item;
                $nav_items = [];
                for ( $i = 0; $i <= $last_item; $i++ ) {
                    $nav_items[] = ['offset' => $i * $limit, 'number' => $i + 1];
                }
                $pagenavi['items'] = $nav_items;
            }
        }
        $results['pagenavi'] = $pagenavi;
        $results['time'] = microtime( true ) - $time_start;
        $result = json_encode( $results, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
        return $jsonp ? "{$callback}({$result})" : $result;
    }

    private function workspace_attr ( $app, $args, $all_ids ) {
        $attr = null;
        $is_excluded = null;
        $workspace = $app->ctx->stash( 'workspace' );
        if ( isset( $args['workspace_ids'] ) ||
             isset( $args['include_workspaces'] ) ) {
            if (! isset( $args['workspace_ids'] ) ) {
                $args['workspace_ids'] = $args['include_workspaces'];
            } else if (! isset( $args['include_workspaces'] ) ) {
                $args['include_workspaces'] = $args['workspace_ids'];
            }
            $attr = $args['workspace_ids'];
            if ( $attr && strtolower( $attr ) == 'this' ) {
                if ( $workspace && $workspace->id ) {
                    return [(int) $workspace->id ];
                } else {
                    return [0];
                }
            }
            unset( $args['workspace_ids'] );
            $is_excluded = 0;
        } elseif ( isset( $args['exclude_workspaces'] ) ) {
            $attr = $args['exclude_workspaces'];
            $is_excluded = 1;
        } elseif ( isset( $args['workspace_id'] ) ) {
            if ( $args['workspace_id'] == 'this' ) {
                if ( $workspace && $workspace->id ) {
                    return [(int) $workspace->id ];
                } else {
                    return [0];
                }
            }
            return [(int) $args['workspace_id'] ];
        }
        if ( $attr && preg_match( '/-/', $attr ) ) {
            $list = preg_split( '/\s*,\s*/', $attr );
            $attr = '';
            foreach ( $list as $item ) {
                if ( preg_match('/(\d+)-(\d+)/', $item, $matches ) ) {
                    for ( $i = $matches[1]; $i <= $matches[2]; $i++ ) {
                        if ( $attr != '' ) $attr .= ',';
                        $attr .= $i;
                    }
                } else {
                    if ( $attr != '' ) $attr .= ',';
                    $attr .= $item;
                }
            }
        }
        $attr = $attr === null ? '' : $attr;
        $workspace_ids = preg_split( '/\s*,\s*/', $attr, -1, PREG_SPLIT_NO_EMPTY );
        if ( $is_excluded ) {
            asort( $workspace_ids );
            asort( $all_ids );
            return array_diff( $all_ids, $workspace_ids );
        } else if ( isset( $args['include_workspaces'] ) &&
            $args['include_workspaces'] == 'all' ) {
            return false;
        } else {
            if ( count( $workspace_ids ) ) {
                foreach ( $workspace_ids as $idx => $workspace_id ) {
                    $workspace_ids[ $idx ] = (int) $workspace_id;
                }
                return $workspace_ids;
            } else {
                return false;
            }
        }
        return false;
    }

    function remove_old_cache ( $app ) {
        $cache_dir = $app->support_dir . DS . 'cache' . DS . 'searchestraier_cache' . DS;
        $iter = $app->db->model( 'option' )->load_iter( ['KIND' => 'plugin_setting',
                                                         'extra' => 'searchestraier',
                                                         'key' => 'searchestraier_enabled'],null, 'workspace_id' );
        $workspace_ids = $iter->fetchAll( PDO::FETCH_COLUMN );
        $counter = 0;
        foreach ( $workspace_ids as $workspace_id ) {
            $data_dir = $this->get_config_value( 'searchestraier_data_dir', $workspace_id );
            $data_dir = $app->build( $data_dir );
            if (! $data_dir || !is_dir( $data_dir ) ) {
                continue;
            }
            $data_dir = rtrim( $data_dir, DS );
            $index = $data_dir . DS . '_list';
            if (! file_exists( $index ) ) {
                continue;
            }
            $index_mtime = filemtime( $index );
            $ws_cache_dir = $cache_dir . $workspace_id;
            if ( !is_dir( $ws_cache_dir ) ) {
                continue;
            }
            $files = [];
            PTUtil::file_find( $ws_cache_dir, $files );
            foreach ( $files as $file ) {
                $cache_mtime = @filemtime( $file );
                if ( $cache_mtime !== false ) {
                    if ( $cache_mtime < $index_mtime ) {
                        @unlink( $file );
                        $counter++;
                    }
                }
            }
        }
        return $counter;
    }

    function mb_escapeshellarg ( $arg, $setlocale = true ) {
        $arg = str_replace( "\0", '', $arg );
        if ( $setlocale ) return escapeshellarg( $arg );
        if ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' ) {
            return '"' . str_replace( ['"', '%'], ['', ''], $arg ) . '"';
        } else {
            return "'" . str_replace("'", "'\\''", $arg ) . "'";
        }
    }
}