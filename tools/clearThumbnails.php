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
$meta = $app->db->model( 'meta' )->load_iter( ['kind' => 'thumbnail'], null, 'id' );
$counter = 0;
while ( $result = $meta->fetch( PDO::FETCH_ASSOC ) ){
    $result = $app->db->model( 'meta' )->new( $result );
    $result->remove();
    $counter++;
}
if ( $counter ) {
    echo $app->translate( 'Cleared %s thumbnail cache(s).', $counter ), PHP_EOL;
}