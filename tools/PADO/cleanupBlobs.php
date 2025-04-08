<?php
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype();
$app->logging = true;
$app->init();
$db = $app->db;
$blob_path = $db->blob_path;
if (! $blob_path ) {
    echo 'PADO::blob_path not specified.';
    exit();
}
$pid = $app->temp_dir . DS . md5( __FILE__ ) . '.pid';
if ( file_exists( $pid ) ) {
    $worker_period = $app->worker_period;
    $mtime = filemtime( $pid );
    if ( ( time() - $worker_period ) < $mtime ) {
        echo date( "Y-m-d H:i:s " ), $app->translate( "%s skipped (the file %s already exists).", [ basename( __FILE__ ), $pid ] ), "\n";
        exit();
    }
    @unlink( $pid );
}
touch( $pid );
$db->caching = false;
$db->query_cache = false;
$tables = $db->show_tables();
$pfx = preg_quote( DB_PREFIX, '/' );
$counter = 0;
foreach ( $tables as $key => $table ) {
    $key = array_keys( $table )[0];
    $tbl_name = $table[ $key ];
    $model = preg_replace( "/^$pfx/", '', $tbl_name );
    if ( $model == 'pt_cache' ) {
        continue;
    }
    $app->get_scheme_from_db( $model );
    $blob_cols = $db->get_blob_cols( $model );
    if (! empty( $blob_cols ) ) {
        $select_cols = implode( ',', $blob_cols );
        $path = $blob_path . $model;
        if ( is_dir( $path ) ) {
            $blobs = [];
            PTUtil::file_find( $path, $blobs );
            foreach ( $blobs as $blob ) {
                $basename = basename( $blob );
                $wheres = [];
                foreach ( $blob_cols as $blob_col ) {
                    $like = $db->escape_like( "\"$basename\"", true, true );
                    $wheres[] = " $blob_col LIKE '{$like}'";
                }
                $sql = "SELECT COUNT({$model}_id) FROM {$tbl_name} WHERE " . implode( ' OR ', $wheres );
                try {
                    $res = $db->db->query( $sql );
                    $res = $res->fetchAll( PDO::FETCH_COLUMN );
                    if (! $res[0] && is_file( $blob ) ) {
                        @unlink( $blob );
                        $counter++;
                    }
                } catch ( Exception $e ) {
                    trigger_error( $e->getMessage() );
                }
            }
        }
    }
}
if ( $counter ) {
    echo $app->translate( 'Clean up %s blob(s).', $counter ), PHP_EOL;;
} else {
    echo $app->translate( 'No blob found to clean up.' ), PHP_EOL;;
}
@unlink( $pid );