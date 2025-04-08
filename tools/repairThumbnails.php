<?php
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'Worker'] );
$app->logging  = true;
$app->init();
if (!isset( $argv ) ) {
    $argv = [];
}
$pid = $app->temp_dir . DS . md5( __FILE__ . implode( '', $argv ) ) . '.pid';
if ( file_exists( $pid ) ) {
    $worker_period = $app->worker_period;
    $mtime = filemtime( $pid );
    if ( ( time() - $worker_period ) < $mtime ) {
        echo date( "Y-m-d H:i:s " ), $app->translate( "%s skipped (the file %s already exists).", [ basename( __FILE__ ), $pid ] ), "\n";
        exit();
    }
    unlink( $pid );
}
touch( $pid );
$app->pid = $pid;
array_shift( $argv );
$thumbnails = $app->db->model( 'urlinfo' )->load( ['key' => 'thumbnail',
                                                   'delete_flag' => [0, 1], 'was_published' => 0] );
if (! empty( $thumbnails ) ) {
    foreach ( $thumbnails as $idx => $thumbnail ) {
        $thumbnail->was_published( 1 );
        $thumbnails[ $idx ] = $thumbnail;
    }
    $app->db->model( 'urlinfo' )->update_multi( $thumbnails );
}
