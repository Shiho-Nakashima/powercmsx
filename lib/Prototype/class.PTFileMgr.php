<?php

class PTFileMgr {

    public $app = null;
    public $delayed = false;
    public $use_tmp = false;
    public $updates = [];
    public $update_paths = [];
    public $update_objs = [];
    public $dir_perms  = null;
    public $file_perms = null;
    public $denied_exts = null;
    public $temp_dir = '/tmp';

    private $in_destruct = false;

    function __destruct () {
        $this->in_destruct = true;
        $updates = $this->updates;
        if (! empty( $updates ) ) {
            $this->delayed = false;
            foreach ( $updates as $path => $data ) {
                if ( $data !== false ) {
                    $this->put( $path, $data );
                } else {
                    $this->unlink( $path );
                }
                unset( $updates[ $path ], $this->updates[ $path ] );
            }
            $this->updates = [];
        }
    }

    public function touch ( $path, $obj = null ) {
        if (! $this->exists( $path ) ) {
            return false;
        }
        @touch( $path );
        $this->update_paths[ $path ] = true;
        $app = $this->app ? $this->app : Prototype::get_instance();
        $url = $app->db->model( 'urlinfo' )->get_by_key( ['file_path' => $path ] );
        if ( $url->id ) {
            $url->save();
            $this->update_objs[ $path ] = $url;
        }
        return true;
    }

    public function put ( $path, $data, $size = false, $option = false ) {
        if ( $this->denied_exts ) {
            $denied_exts = $this->denied_exts;
            $file_ext = PTUtil::get_extension( $path );
            if ( in_array( $file_ext, $denied_exts ) ) {
                $app = $this->app ? $this->app : Prototype::get_instance();
                if ( $app && ! $app->in_background && ! $this->in_destruct ) {
                    return $app->error( "Output '%s' is not allowed.", $path );
                }
                trigger_error( $app->translate( "Output '%s' is not allowed.", $path ) );
                return false;
            }
        }
        if ( is_dir( $path ) ) {
            return false;
        }
        $this->update_paths[ $path ] = $this->exists( $path ) ? true : 1;
        $url = null;
        $app = $this->app ? $this->app : Prototype::get_instance();
        $this->app = $app;
        if ( is_object( $size ) ) {
            $url = $size;
            $this->update_objs[ $path ] = $size;
        }
        if ( $this->delayed !== false && strpos( $path, $this->temp_dir ) !== 0 ) {
            $this->updates[ $path ] = $data;
            $size = strlen( bin2hex( $data ) ) / 2;
            return $size;
        }
        if (! is_dir( dirname( $path ) ) ) {
            $this->mkpath( dirname( $path ) );
        }
        $file_perms = $this->file_perms;
        if (! $this->use_tmp ) {
            $size = $option ? @file_put_contents( $path, $data, $option ) : @file_put_contents( $path, $data, LOCK_EX );
            if ( $size && $file_perms ) @chmod( $path, $file_perms );
            return $size;
        }
        $size = $option ? @file_put_contents( $path, $data, $option ) : @file_put_contents( "{$path}.new", $data, LOCK_EX );
        if ( $size !== false && ! $option ) {
            try {
                if (! rename( "{$path}.new", $path ) ) {
                    @unlink( "{$path}.new" );
                    $size = false;
                }
            } catch ( Exception $e ) {
                if ( $app && ! $app->in_background && ! $this->in_destruct ) {
                    return $app->error( "Cannot write file '%s'.", $path );
                }
                trigger_error( $app->translate( "Cannot write file '%s'.", $path ) );
            }
        }
        if ( $size === false ) {
            if ( $app && ! $app->in_background && ! $this->in_destruct ) {
                return $app->error( "Cannot write file '%s'.", $path );
            }
            trigger_error( $app->translate( "Cannot write file '%s'.", $path ) );
            return false;
        }
        if ( $file_perms ) @chmod( $path, $file_perms );
        if ( $url && $app && $app->build_dynamicmtml ) {
            if ( !PTUtil::is_binary_file( $path ) ) {
                $regex = '<\${0,1}' . $app->ctx->prefix;
                if ( preg_match( "/$regex/i", $data ) ) {
                    // DynamicMTML
                    $app->ctx->clone()->build( $data );
                }
            }
        }
        return $size;
    }

    public function get ( $path ) {
        if ( $path === null ) return false;
        if ( isset( $this->updates[ $path ] ) && $this->updates[ $path ] !== false ) {
            return $this->updates[ $path ];
        }
        if (! file_exists( $path ) ) {
            return '';
        }
        return @file_get_contents( $path );
    }

    public function delete ( $path ) {
        $this->unlink( $path );
    }

    public function is_dir ( $path ) {
        return @is_dir( $path );
    }

    public function unlink ( $path, $ui = null ) {
        $basename = basename( $path );
        if ( $basename === '.' || $basename === '..' ) return false; // Unintended path.
        if ( is_dir( $path ) ) {
            $app = $this->app ? $this->app : Prototype::get_instance();
            if ( $app->fmgr_can_unlink_dir ) {
                if ( $this->delayed !== false ) {
                    $this->updates[ $path ] = false;
                    return true;
                }
                return $this->rmdir( $path );
            }
            return false;
        }
        if ( $this->delayed !== false ) {
            $this->update_paths[ $path ] = false;
            $this->updates[ $path ] = false;
            return true;
        }
        if (! file_exists( $path ) ) {
            return true;
        }
        $this->update_paths[ $path ] = false;
        if ( is_object( $ui ) ) {
            $this->update_objs[ $path ] = $ui;
        }
        return @unlink( $path );
    }

    public function filesize ( $path ) {
        if (! file_exists( $path ) ) {
            return 0;
        }
        return @filesize( $path );
    }

    public function filemtime ( $path ) {
        if (! file_exists( $path ) ) {
            return false;
        }
        return @filemtime( $path );
    }

    public function copy ( $from, $to, $cmd = '', $opt = '' ) {
        if (! file_exists( $from ) ) {
            if ( $this->delayed !== false && isset( $this->updates[ $from ] ) ) {
                $this->updates[ $to ] = $this->updates[ $from ];
                return true;
            }
            return false;
        }
        if (! is_dir( dirname( $to ) ) ) {
            $this->mkpath( dirname( $to ) );
        }
        if ( is_dir( $from ) ) {
            $count = count( glob( $from . "/*" ) );
            $copied = false;
            if ( $cmd ) {
                if (! file_exists( $cmd ) || basename( $cmd ) !== 'cp' ) {
                    $cmd = '';
                }
                if ( $cmd ) {
                    $cmd = escapeshellcmd( $cmd );
                    $from = escapeshellarg( $from );
                    $_to = escapeshellarg( $to );
                    $cmd = "{$cmd} -R {$from} {$_to}";
                    $output = [];
                    $return_var = '';
                    exec( $cmd, $output, $return_var );
                    $res = $return_var === 0;
                    $copied = $res;
                }
            }
            if (! $copied ) {
                $res = $this->copy_recursive( $from, $to );
            }
            $end = false;
            $counter = 0;
            while (! $end ) {
                $to_count = count( glob( $to . "/*" ) );
                $end = $count === $to_count && is_dir( $to );
                if ( $end ) {
                    break;
                }
                $counter++;
                usleep( 300000 );
                if ( $counter > 1000 ) {
                    return false;
                }
            }
            return $res;
        }
        $this->update_paths[ $to ] = $this->exists( $to ) ? true : 1;
        if ( $this->delayed !== false && strpos( $to, $this->temp_dir ) !== 0 ) {
            $this->updates[ $to ] = file_get_contents( $from );
            return true;
        }
        if ( $cmd ) {
            if (! file_exists( $cmd ) || basename( $cmd ) !== 'cp' ) {
                $cmd = '';
            }
            if ( $cmd ) {
                $cmd = escapeshellcmd( $cmd );
                $from = escapeshellarg( $from );
                $to = escapeshellarg( $to );
                $cmd = "{$cmd} {$opt} {$from} {$to}";
                $output = [];
                $return_var = '';
                exec( $cmd, $output, $return_var );
                if ( $return_var === 0 ) {
                    return true;
                }
            }
        }
        $size = filesize( $from );
        $app = $this->app ? $this->app : Prototype::get_instance();
        $tmp = $app->upload_dir() . DS . basename( $to );
        if ( $size < 524288000 ) {
            // ~500MB
            @copy( $from, $tmp );
        } else {
            $fp_r = fopen( $from, 'rb' );
            $fp_w = fopen( $tmp, 'wb');
            while( ( $buffer = fread( $fp_r, 10000 ) ) != false ) {
                if ( fwrite( $fp_w, $buffer ) === false ) {
                    trigger_error( $app->translate( "Cannot write file '%s'.", $tmp ) );
                    fclose( $fp_r ); 
                    fclose( $fp_w ); 
                    return false;
                }
            }
            fclose( $fp_r ); 
            fclose( $fp_w ); 
            if ( filesize( $from ) !== filesize( $tmp ) ) {
                @copy( $from, $tmp );
            }
        }
        if (! @rename( $tmp, $to ) ) {
            return false;
        }
        @touch( $to, @filemtime( $from ) );
        return true;
    }

    public function copy_recursive ( $from, $to ) {
        if ( is_dir( $from ) ) {
            if (! is_dir( $to ) ) {
                $this->mkpath( dirname( $to ) );
            }
            $dir = dir( $from );
            if ( $dir === false ) {
                return false;
            }
            while ( false !== ( $item = $dir->read() ) ) {
                if ( $item != '.' && $item != '..' ) {
                    if ( is_file( $from . DS . $item ) ) {
                        $res = $this->copy( $from . DS . $item, $to . DS . $item );
                        if (! $res ) {
                            return false;
                        }
                    } else {
                        $this->copy_recursive( $from . DS . $item, $to . DS . $item );
                    }
                }
            }
            $dir->close();
        } else if ( is_file( $from ) ) {
            $res = $this->copy( $from, $to );
            if (! $res ) {
                return false;
            }
        }
        return true;
    }

    public function rename ( $from, $to ) {
        if ( is_dir( $to ) ) {
            // TODO
            return false;
        }
        if ( is_dir( $from ) ) {
            // TODO $this->updates['files'];
            if (! is_dir( dirname( $to ) ) ) {
                $this->mkpath( dirname( $to ) );
            }
            $res = @rename( $from, $to );
            if (! $res ) {
                $app = $this->app ? $this->app : Prototype::get_instance();
                $tmp = $app->magic();
                if ( $this->copy_recursive( $from, "{$to}.{$tmp}" ) ) {
                    // cross-device link.
                    $res = $this->rename( "{$to}.{$tmp}", $to );
                    if ( $res ) {
                        $this->remove_dir( $from );
                    }
                }
            }
            return $res;
        }
        if (! file_exists( $from ) ) {
            if ( $this->delayed !== false && isset( $this->updates[ $from ] ) ) {
                $this->updates[ $to ] = $this->updates[ $from ];
                $this->updates[ $from ] = false;
                return true;
            }
            return false;
        }
        $this->update_paths[ $to ] = $this->exists( $to ) ? true : 1;
        if ( $this->delayed !== false && strpos( $to, $this->temp_dir ) !== 0 ) {
            $this->updates[ $to ] = file_get_contents( $from );
            $this->updates[ $from ] = false;
            return true;
        }
        if (! is_dir( dirname( $to ) ) ) {
            $this->mkpath( dirname( $to ) );
        }
        $res = @rename( $from, $to );
        if (! $res ) {
            // cross-device link.
            $app = $this->app ? $this->app : Prototype::get_instance();
            $tmp = $app->magic();
            $this->copy( $from, "{$to}.{$tmp}" );
            return $this->rename( "{$to}.{$tmp}", $to );
        }
        return $res;
    }

    public function exists ( $path ) {
        if (! $path ) return false;
        return @file_exists( $path );
    }

    public function mkpath ( $path, $mode = 0755 ) {
        if ( is_file( $path ) ) {
            trigger_error( "mkdir {$path} file exists." );
        }
        $mode = $this->dir_perms ? $this->dir_perms : $mode;
        if ( is_dir( $path ) ) return true;
        $mask = umask();
        umask( 000 );
        $res = @mkdir( $path, $mode, true );
        @umask( $mask );
        return $res;
    }

    public function remove_dir ( $dir, $children_only = false ) {
        $files = [];
        $dirs = [];
        $this->file_find( $dir, $files, $dirs, true );
        foreach ( $files as $file ) {
            $res = @unlink( $file );
            if (! $res ) {
                return false;
            }
        }
        array_multisort( array_map( 'strlen', $dirs ), SORT_DESC, $dirs ) ;
        foreach ( $dirs as $item ) {
            $res = @rmdir( $item );
            if (! $res ) {
                return false;
            }
        }
        if (! $children_only ) {
            $res = @rmdir( $dir );
            if (! $res ) {
                return false;
            }
        }
        return true;
    }

    public function rmdir ( $dir, $children_only = false ) {
        require_once( 'class.PTUtil.php' );
        return PTUtil::remove_dir( $dir, $children_only, $this );
    }

    public function remove_empty_dirs ( $dirs ) {
        require_once( 'class.PTUtil.php' );
        return PTUtil::remove_empty_dirs( $dirs );
    }

    public function sync_dir ( $from, $to, $remove_dir = true ) {
        require_once( 'class.PTUtil.php' );
        return PTUtil::sync_dir( $from, $to, $remove_dir, $this );
    }

    public function file_find ( $dir, &$files = [], &$dirs = [], $hidden = false ) {
        return PTUtil::file_find( $dir, $files, $dirs, $hidden );
    }

    public function test ( $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $delayed = $this->delayed;
        $this->delayed = false;
        $eol = $app->id == 'Prototype' ? '<br>' : PHP_EOL;
        $work_dir = $app->upload_dir();
        echo "The work directory is '{$work_dir}'.", $eol;
        $file1 = $work_dir . DS . '1.txt';
        $file2 = $work_dir . DS . '2.txt';
        $file3 = $work_dir . DS . '3.txt';
        $file4 = $work_dir . DS . '4.txt';
        $res = $this->put( $file1, 'Hello World!' );
        if ( $res && file_exists( $file1 ) && $this->exists( $file1 ) && $this->get( $file1 ) == 'Hello World!' ) {
            echo "The method 'put', 'get' and 'exists' OK.", $eol;
        }
        $res = $this->rename( $file1, $file2 );
        if ( $res && file_exists( $file2 ) && !file_exists( $file1 ) && $this->get( $file2 ) == 'Hello World!' ) {
            echo "The method 'rename' OK.", $eol;
        }
        $res = $this->copy( $file2, $file1 );
        if ( $res && file_exists( $file1 ) && file_exists( $file2 ) && $this->get( $file1 ) == 'Hello World!'
            && $this->get( $file2 ) == 'Hello World!' ) {
            echo "The method 'copy' OK.", $eol;
        }
        if ( filesize( $file2 ) && $this->filesize( $file2 ) ) {
            echo "The method 'filesize' OK.", $eol;
        }
        if ( filemtime( $file2 ) && $this->filemtime( $file2 ) ) {
            echo "The method 'filemtime' OK.", $eol;
        }
        $res = $this->unlink( $file2 );
        if ( $res && !file_exists( $file2 ) ) {
            echo "The method 'unlink' OK.", $eol;
        }
        $mkpath1 = $work_dir . DS . 'test' . DS . 'test';
        $res = $this->mkpath( $mkpath1 );
        if ( $res && $this->is_dir( $mkpath1 ) ) {
            echo "The method 'mkpath' OK.", $eol;
            echo "The method 'is_dir' OK.", $eol;
        }
        $this->put( $mkpath1 . DS . '1.txt', 'Hello World!' );
        $mkpath2 = $work_dir . DS . 'test' . DS . 'test2';
        $res = $this->copy_recursive( $mkpath1, $mkpath2 );
        if ( $res && is_dir( $mkpath2 ) && file_exists( $mkpath2 . DS . '1.txt' ) ) {
            echo "The method 'copy_recursive' OK.", $eol;
        }
        $this->put( $mkpath1 . DS . '2.txt', 'Hello World!' );
        $this->sync_dir( $mkpath1, $mkpath2 );
        $files = [];
        $dirs = [];
        $res = $this->file_find( $work_dir, $files, $dirs );
        if ( count( $files ) == 5 && count( $dirs ) === 4 ) {
            echo "The method 'sync_dir' OK.", $eol;
            echo "The method 'file_find' OK.", $eol;
        }
        $this->unlink( $mkpath2 . DS . '1.txt' );
        $this->unlink( $mkpath2 . DS . '2.txt' );
        $res = $this->remove_empty_dirs( [ $mkpath1, $mkpath2 ] );
        if ( $res && is_dir( $mkpath1 ) && !is_dir( $mkpath2 ) ) {
            echo "The method 'remove_empty_dirs' OK.", $eol;
        }
        $res = pt_file_put_contents( $file3, 'Hello World!' );
        if ( $res && file_exists( $file3 ) && file_get_contents( $file3 ) === 'Hello World!' ) {
            echo "The function 'pt_file_put_contents' OK.", $eol;
        }
        $res = pt_rename( $file3, $file4 );
        if ( $res && !file_exists( $file3 ) && file_exists( $file4 ) && pt_file_get_contents( $file4 ) === 'Hello World!' ) {
            echo "The function 'pt_file_get_contents' OK.", $eol;
            echo "The function 'pt_rename' OK.", $eol;
        }
        $res = pt_unlink( $file4 );
        if ( $res && !file_exists( $file4 ) ) {
            echo "The function 'pt_unlink' OK.", $eol;
        }
        $res = $this->rmdir( $work_dir );
        if ( $res && !is_dir( $work_dir ) ) {
            echo "The method 'rmdir' OK.", $eol;
        }
        $this->delayed = $delayed;
    }
}

function pt_file_put_contents ( $path, $data, $opt = null ) {
    $app = Prototype::get_instance();
    if (! $app || ! $app->fmgr ) {
        return $opt ? file_put_contents( $path, $data, $opt ) : file_put_contents( $path, $data );
    }
    return $opt ? $app->fmgr->put( $path, $data, false, $opt ) : $app->fmgr->put( $path, $data );
}

function pt_file_get_contents ( $path ) {
    $app = Prototype::get_instance();
    if (! $app || ! $app->fmgr || preg_match( '!^https{0,1}://!', $path ) ) {
        return @file_get_contents( $path );
    }
    return $app->fmgr->get( $path );
}

function pt_rename ( $from, $to ) {
    $app = Prototype::get_instance();
    if (! $app || ! $app->fmgr ) {
        return @rename( $from, $to );
    }
    return $app->fmgr->rename( $from, $to );
}

function pt_unlink ( $path ) {
    $app = Prototype::get_instance();
    if (! $app || ! $app->fmgr ) {
        return @unlink( $path );
    }
    return $app->fmgr->unlink( $path );
}