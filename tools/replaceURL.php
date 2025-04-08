<?php
// cd path/to/powercmsx; sudo -u apache php ./tools/replaceURL.php --workspace_id 1 --old_url 'http://localhost/' --site_url 'https://cms.powercmsx.jp/' --link_url 'https://powercmsx.jp/'
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
ini_set( 'max_execution_time', 0 );
ini_set( 'memory_limit', -1 );
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'Worker'] );
$app->logging  = true;
$app->maintenance_setting = false;
$start_time = time();
$app->init();
if (!isset( $argv ) ) {
    $argv = [];
}
$pid = $app->temp_dir . DS . md5( __FILE__ . implode( '', $argv ) ) . '.pid';
if ( file_exists( $pid ) ) {
    $worker_period = $app->worker_period;
    $mtime = filemtime( $pid );
    if ( ( time() - $worker_period ) < $mtime ) {
        echo date( "Y-m-d H:i:s " ), $app->translate( "%s skipped (the file %s already exists).", [ basename( __FILE__ ), $pid ] ), PHP_EOL;
        exit();
    }
    unlink( $pid );
}
touch( $pid );
$app->pid = $pid;
array_shift( $argv );
$update_limit = 10000;
$workspace_id = null;
$site_url = null;
$link_url = null;
$old_url = null;
$limit = null;
$offset = null;
$direction = 'ascend';
$delete_flag = '*';
$verbose = in_array( '--verbose', $argv );
if ( in_array( '--workspace_id', $argv ) ) {
    $idx = array_search( '--workspace_id', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $workspace_id = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--site_url', $argv ) ) {
    $idx = array_search( '--site_url', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $site_url = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--old_url', $argv ) ) {
    $idx = array_search( '--old_url', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $old_url = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--link_url', $argv ) ) {
    $idx = array_search( '--link_url', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $link_url = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--limit', $argv ) ) {
    $idx = array_search( '--limit', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $limit = (int) $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--offset', $argv ) ) {
    $idx = array_search( '--offset', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $offset = (int) $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--direction', $argv ) ) {
    $idx = array_search( '--direction', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $direction = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
    if ( $direction !== 'descend' ) {
        $direction = 'ascend';
    }
}
if ( in_array( '--delete_flag', $argv ) ) {
    $idx = array_search( '--delete_flag', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $delete_flag = (int) $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( $delete_flag === '*' || $delete_flag > 1 ) {
    $delete_flag = [0, 1];
}
if (! is_numeric( $workspace_id ) ) {
    echo $app->translate( '%s is required.', '--workspace_id' ), PHP_EOL;
    exit();
}
if (! $site_url ) {
    echo $app->translate( '%s is required.', '--site_url' ), PHP_EOL;
    exit();
}
if (! $old_url ) {
    echo $app->translate( '%s is required.', '--old_url' ), PHP_EOL;
    exit();
}
$msg = '';
if (! $app->is_valid_url( $site_url, $msg ) ) {
    echo $msg, PHP_EOL;
    exit();
}
if ( $link_url && ! $app->is_valid_url( $link_url, $msg ) ) {
    echo $msg, PHP_EOL;
    exit();
}
$db = $app->db;
$pdo = $db->db;
$workspace = null;
if ( $workspace_id ) {
    $workspace = $db->model( 'workspace' )->load( $workspace_id, null, 'id,site_url,link_url' );
    if (! $workspace ) {
        echo $app->translate( '%s not found.', $app->translate( 'WorkSpace' ) );
        exit();
    }
}
if (! $old_url ) {
    $old_url = $workspace ? $workspace->id : $app->site_url;
}
$like_stmt = $db->escape_like( $old_url, false, true );
if (! $workspace_id ) {
    $cfg = ['site_url' => $site_url ];
    if ( $link_url !== null ) {
        $cfg['link_url'] = $link_url;
    }
    $app->set_config( $cfg );
} else {
    $changed = false;
    if ( $workspace->site_url !== $site_url ) {
        $workspace->site_url( $site_url );
        $changed = true;
    }
    if ( $link_url !== null ) {
        if ( $workspace->link_url !== $link_url ) {
            $workspace->link_url( $link_url );
            $changed = true;
        }
    }
    if ( $changed ) {
        $workspace->save();
    }
}
$param1 = $db->quote( $old_url );
$param2 = $db->quote( $site_url );
$param3 = (int) $workspace_id;
$param4 = $db->quote( $like_stmt );
$add_params = ' ORDER BY urlinfo_id ';
$add_params .= $direction === 'ascend' ? ' ASC ' : ' DESC ';
if (! $limit || $limit > $update_limit ) {
    $limit = $update_limit;
}
$add_params = " LIMIT {$limit}";
if ( $offset ) {
    $add_params = " OFFSET {$offset}";
}
$sql = "UPDATE mt_urlinfo SET urlinfo_url=REPLACE(urlinfo_url, {$param1}, {$param2}) WHERE urlinfo_workspace_id={$param3} AND urlinfo_url LIKE {$param4} {$add_params};";
$sql .= "UPDATE mt_urlinfo SET urlinfo_dirname=REPLACE(urlinfo_dirname, {$param1}, {$param2}) WHERE urlinfo_workspace_id={$param3} AND urlinfo_dirname LIKE {$param4} {$add_params};";
$sql = str_replace( '  ', ' ', $sql );
$counter = 0;
$res = true;
$i = 0;
while ( $res ) {
    if ( $verbose ) {
        if (! $i ) {
            echo '===============================================================================', PHP_EOL;
            echo str_replace( ';', ';' . PHP_EOL, $sql );
            echo '===============================================================================', PHP_EOL;
        }
        $query_start = microtime( true );
    }
    $res = $pdo->exec( $sql );
    if ( $verbose ) {
        $end = microtime( true ) - $query_start;
        if ( $res ) {
            echo $app->translate( "%s '%s' updated.", [ $res, 'urlinfo'] ), ' ';
        }
        echo $app->translate( 'Processing time: %s', $app->translate( '%sseconds', $end ) ), PHP_EOL;
    }
    $counter += $res;
    if ( $res && $res < $limit ) {
        $res = 0;
        break;
    }
    $i++;
}
$table = $app->get_table( 'upload_file' );
if ( $table ) {
    $sql = "UPDATE mt_upload_file SET upload_file_url=REPLACE(upload_file_url, {$param1}, {$param2}) WHERE upload_file_workspace_id={$param3} AND upload_file_url LIKE {$param4} {$add_params};";
    $sql = str_replace( '  ', ' ', $sql );
    $res = true;
    $i = 0;
    while ( $res ) {
        if ( $verbose ) {
            if (! $i ) {
                echo '===============================================================================', PHP_EOL;
                echo $sql, PHP_EOL;
                echo '===============================================================================', PHP_EOL;
            }
            $query_start = microtime( true );
        }
        $res = $pdo->exec( $sql );
        if ( $verbose ) {
            $end = microtime( true ) - $query_start;
            if ( $res ) {
                echo $app->translate( "%s '%s' updated.", [ $res, 'upload_file'] ), ' ';
            }
            echo $app->translate( 'Processing time: %s', $app->translate( '%sseconds', $end ) ), PHP_EOL;
        }
        $counter += $res;
        if ( $res && $res < $limit ) {
            $res = 0;
            break;
        }
        $i++;
    }
}
$menus = $db->model( 'menu' )->load_iter( ['workspace_id' => $workspace_id ], null, 'id,meta' );
$search = preg_quote( $old_url, '!' );
$i = 0;
if ( $verbose ) {
    $query_start = microtime( true );
    echo '===============================================================================', PHP_EOL;
    echo 'UPDATE mt_menu SET menu_meta=? WHERE menu_id=?', PHP_EOL;
    echo '===============================================================================', PHP_EOL;
}
while ( $obj = $menus->fetch( PDO::FETCH_ASSOC ) ) {
    $obj = $app->db->model( 'menu' )->new( $obj );
    $meta = unserialize( $obj->meta );
    $changed = false;
    foreach ( $meta as $url => $data ) {
        if ( strpos( $url, $site_url ) !== 0 ) {
            $new_url = preg_replace( "!^{$search}!", $site_url, $url );
            $meta[ $new_url ] = $data;
            unset( $meta['url'] );
            $changed = true;
        }
    }
    if (! $changed ) {
        continue;
    }
    $meta = serialize( $meta );
    $obj->meta( $meta );
    $i++;
    $obj->save();
    $counter++;
}
if ( $verbose ) {
    $end = microtime( true ) - $query_start;
    if ( $i ) {
        echo $app->translate( "%s '%s' updated.", [ $i, 'menu'] ), ' ';
    }
    echo $app->translate( 'Processing time: %s', $app->translate( '%sseconds', $end ) ), PHP_EOL;
}
$end = time() - $start_time;
if ( $verbose ) {
    echo '===============================================================================', PHP_EOL;
}
echo $app->translate( 'Changing the URL and %s objects were updated(Processing time: %s).', [ $counter, $app->translate( '%sseconds', $end ) ] ), PHP_EOL;