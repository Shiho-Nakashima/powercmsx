<?php
    // Runtime Configuration.
    $app_path    = '';
    $cookie_name = 'pt-member';             // The cookie name for Members plugin.
    $out_buffer  = 8192 * 10;               // Buffering if filesize over max allowed file size.
    $size_limit  = 5242880;                 // Max allowed file size. If not specified, set from memory_limit.
    $conditional = true;                    // Set and check HTTP_IF_MODIFIED_SINCE header.
    $set_etag    = false;                   // Set and check HTTP_IF_NONE_MATCH header if $conditional.
    $compression = true;                    // Whether to transparently compress page.
    $redirect    = true;                    // If not logged-in, redirect to login screen.

    $denied_exts = ['ascx', 'asis', 'asp', 'aspx', 'bat', 'cfc', 'cfm', 'cgi', 'cmd', 'com', 'cpl', 'dll', 'exe',
                    'htaccess', 'htpasswd', 'inc', 'jhtml', 'jsb', 'jsp', 'mht', 'msi', 'php', 'php2', 'php3', 'php4',
                    'php5', 'phps', 'phtm', 'phtml', 'pif', 'pl', 'pwml', 'py', 'reg', 'scr', 'sh', 'shtm', 'shtml',
                    'vbs', 'vxd','pm', 'so', 'rb','htc'];

    $app_path    = $app_path ? $app_path : dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . DIRECTORY_SEPARATOR;
    define( 'LIB_DIR', $app_path . 'lib' );

    $self = $_SERVER['SCRIPT_FILENAME'];
    $file = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];

    $db = null;
    $forbidden = false;

    if ( $_SERVER['REQUEST_METHOD'] != 'GET' ) {
        // Allow GET only.
        $forbidden = true;
    } else if ( $file === $self ) {
        // Request to self.
        $forbidden = true;
    } else if ( strpos( $file, '../' ) !== false || strpos( $file, '..\\' ) !== false ) {
        // Directory traversal.
        $forbidden = true;
    } else if (! isset( $_COOKIE[ $cookie_name ] ) ) {
        // Not logged-in.
        if ( $redirect ) {
            require_once( $app_path . 'db-config.php' );
            require_once( $app_path . 'lib/PADO/class.pado.php' );
            $db = new PADO();
            $config = ['dbname' => PADO_DB_NAME, 'dbhost' => PADO_DB_HOST,
                       'dbuser' => PADO_DB_USER, 'dbpasswd' => PADO_DB_PASSWORD, 'dbport' => PADO_DB_PORT ];
            $db->init( $config );
            redirect_login( $db );
            $redirect = false; // Setting members_app_url not set.
        }
        $forbidden = true;
    }
    if ( $forbidden ) {
        print_status( '403 Forbidden' );
    } else if (! file_exists( $file ) ) {
        // File not found.
        print_status( '404 Not Found' );
    }

    if ( $conditional ) {
        // Check HTTP Header for conditional GET.
        if ( empty( $_GET ) ) {
            $etag = $set_etag ? '"' . md5_file( $file ) . '"' : null;
            $if_modified  = isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] )
                          ? strtotime( stripslashes( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) ) : false;
            $if_nonematch = isset( $_SERVER['HTTP_IF_NONE_MATCH'] )
                          ? stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) : false;
            $ts = filemtime( $file );
            $not_modified = false;
            if ( $if_modified && $if_modified >= $ts ) {
                $not_modified = true;
            } else if ( $etag && $if_nonematch == $etag ) {
                $not_modified = true;
            }
            if ( $not_modified ) {
                // Not modifired.
                header( 'HTTP/1.1 304 Not Modified' );
                header( 'Connection: close' );
                flush();
                exit();
            }
        }
    }
    require_once( $app_path . 'lib/Prototype/class.PTUtil.php' );
    $extension = PTUtil::get_extension( $file, true );

    if ( in_array( $extension, $denied_exts ) ) {
        // Denied extension.
        print_status( '403 Forbidden' );
    }

    // Check the logged-in member.
    if (! $db ) {
        require_once( $app_path . 'db-config.php' );
        require_once( $app_path . 'lib/PADO/class.pado.php' );
        $db = new PADO();
        $config = ['dbname' => PADO_DB_NAME, 'dbhost' => PADO_DB_HOST,
                   'dbuser' => PADO_DB_USER, 'dbpasswd' => PADO_DB_PASSWORD, 'dbport' => PADO_DB_PORT ];
        $db->init( $config );
    }
    $session_id = $_COOKIE[ $cookie_name ];
    $time = (int) $_SERVER['REQUEST_TIME'];
    $sql  = "SELECT mt_member.member_nickname FROM mt_member,mt_session WHERE mt_session.session_key='member'";
    $sql .= ' AND session_name=? AND mt_session.session_user_id=mt_member.member_id AND mt_member.member_status=2';
    $sql .= ' AND mt_member.member_lock_out=0 AND mt_session.session_expires > ? LIMIT 1';
    $placeholders = [ $session_id, $time ];

    // $db->db is PDO.
    $sth = $db->db->prepare( $sql );
    $sth->execute( $placeholders );
    $member = $sth->fetchAll( PDO::FETCH_COLUMN );
    // or $member = $db->model( 'session' )->load( $sql, $placeholders );
    if ( empty( $member ) ) {
        // Not logged-in.
        if ( $redirect ) {
            redirect_login( $db );
        }
        print_status( '403 Forbidden' );
    }

    if ( $compression ) {
        ini_set( 'zlib.output_compression', 'On' );
    }

    $mime_type = PTUtil::get_mime_type( $extension );
    $file_size = filesize( $file );

    // Set HTTP Headers.
    $headers = [];
    $headers[] = "Content-Type: {$mime_type}";

    if ( $conditional ) {
        // Send HTTP Headers for conditional GET.
        if (!isset( $ts ) ) {
            $ts = filemtime( $file );
        }
        $last_modified = gmdate( "D, d M Y H:i:s", $ts ) . ' GMT';
        $headers[] = "Last-Modified: $last_modified";
        if ( isset( $etag ) && $etag ) {
            $headers[] = "ETag: $etag";
        }
    }

    if (! $size_limit ) {
        // Max allowed file size.
        $memory_limit = ini_get( 'memory_limit' );
        if ( $memory_limit == -1  ) {
            $size_limit = 1024 * 1024 * 1024;
        } else {
            $last = strtoupper( $memory_limit[ strlen( $memory_limit ) -1 ] );
            if ( is_numeric( $memory_limit ) ) {
                $memory_limit = (int) $memory_limit;
            } else {
                $memory_limit = (int) substr( $memory_limit, 0, -1 );
            }
            if ( $last == 'G' ) {
                $memory_limit *= 1024 * 1024 * 1024;
            } else if ( $last == 'M' ) {
                $memory_limit *= 1024 * 1024;
            } else if ( $last == 'K' ) {
                $memory_limit *= 1024;
            }
        }
        $size_limit = $memory_limit / 20;
        $size_limit = (int) $size_limit;
        $min_limit = $out_buffer * 5;
        if ( $size_limit < $min_limit ) {
            $size_limit = $min_limit;
        }
    }

    // Get range from request header.
    $range = isset( $_SERVER['HTTP_RANGE'] ) ? $_SERVER['HTTP_RANGE'] : null;

    // Output the file.
    if ( $range && preg_match( '/bytes=\d*-\d*/', $range ) ) {
        // HTTP Range Requests
        ini_set( 'max_execution_time', 0 );
        list(, $range ) = explode( '=', $range, 2 );
        list( $start, $end ) = explode( '-', $range, 2 );
        $start = $start === '' ? 0 : intval( $start );
        $end = $end === '' ? $file_size - 1 : intval( $end );
        if ( $start > $end || $start >= $file_size || $end >= $file_size ) {
            header( 'HTTP/1.1 416 Requested Range Not Satisfiable' );
            exit;
        }

        header( 'HTTP/1.1 206 Partial Content' );
        $headers[] = "Content-Range: bytes $start-$end/$file_size";
        $headers[] = 'Content-Length: ' . ( $end - $start + 1 );
        foreach ( $headers as $header ) {
            header( $header );
        }
        $fp = fopen( $file, 'rb' );
        if ( $fp === false ) {
            print_status( '500 Internal Server Error' );
            exit;
        }
        fseek( $fp, $start );
        while (! feof( $fp ) && ( $pos = ftell( $fp ) ) <= $end ) {
            if ( $pos + $out_buffer > $end ) {
                echo fread( $fp, $end - $pos + 1 );
            } else {
                echo fread( $fp, $out_buffer );
            }
            ob_flush();
            flush();
        }
        fclose( $fp );
    } else {
        $headers[] = "Content-Length: {$file_size}";
        if ( $file_size < $size_limit ) {
            if ( is_readable( $file ) ) {
                header( 'HTTP/1.1 200 OK' );
                foreach ( $headers as $header ) {
                    header( $header );
                }
                echo file_get_contents( $file );
            } else {
                print_status( '500 Internal Server Error' );
            }
        } else {
            $fp = @fopen( $file, 'rb' );
            if ( $fp === false ) {
                print_status( '500 Internal Server Error' );
            }
            header( 'HTTP/1.1 200 OK' );
            foreach ( $headers as $header ) {
                header( $header );
            }
            $left = $file_size;
            set_time_limit( 0 );
            while ( $left > 0 && !feof( $fp ) ) {
                $buffer = min( $out_buffer, $left );
                $data = fread( $fp, $buffer );
                echo $data;
                flush();
                ob_flush();
                $left = $left - strlen( $data );
            }
            fclose( $fp );
        }
        header( 'Connection: close' );
        flush();
    }

    function print_status ( $status ) {
        header( "HTTP/1.1 {$status}" );
        echo $status;
        flush();
        exit();
    }

    function redirect_login ( $db ) {
        $sql = "SELECT option_value FROM `mt_option` WHERE option_key='members_app_url' AND option_extra='members'";
        $sql .= " AND option_kind='plugin_setting' AND option_workspace_id=0 LIMIT 1";
        $result = $db->db->query( $sql );
        $result = $result->fetchAll( PDO::FETCH_COLUMN );
        if (! empty( $result ) ) {
            $result = $result[0];
            if ( $result ) {
                $result = $result . '?__mode=login&return_url=' . rawurlencode( $_SERVER['REQUEST_URI'] );
                while( ob_get_level() ) { ob_end_clean() ; }
                $out = "\r\n";
                header( 'Content-Length: ' . strlen( $out ) );
                header( 'Connection: close' );
                header( 'Location: ' . $result, true, 302 );
                echo $out;
                flush();
                exit();
            }
        }
    }