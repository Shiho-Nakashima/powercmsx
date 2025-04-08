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
array_shift( $argv );
if ( count( $argv ) == 1 ) {
    $argv = preg_split( "/,/", $argv[0] );
}
$argv = array_unique( $argv );
$verbose = in_array( '--verbose', $argv );
$ignore_pid = in_array( '--ignore_pid', $argv );
if (!$ignore_pid && file_exists( $pid ) ) {
    $worker_period = $app->worker_period;
    $mtime = filemtime( $pid );
    if ( ( time() - $worker_period ) < $mtime ) {
        echo date( "Y-m-d H:i:s " ), $app->translate( "The worker skipped (the file %s already exists).", $pid ), "\n";
        exit();
    }
    unlink( $pid );
}
if ( $verbose ) {
    echo date( "Y-m-d H:i:s " ), $app->translate( "The worker start (pid file is %s)...", $pid ), "\n";
    echo "=========================================================\n";
}
$app->verbose = $verbose;
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTWorker.php' );
$worker = new PTWorker;
if (! $ignore_pid ) {
    touch( $pid );
    $app->pid = $pid;
    $worker->pid = $pid;
}
$worker->work( $app, $argv );