<?php
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'SearchEstraierSyncCasket'] );
$app->logging  = true;
$app->init();
if (!isset( $argv ) ) {
    $argv = [];
}
$work_dir = $app->searchestraier_work_dir ?? $app->work_dir;
if (! $work_dir ) {
    $work_dir = $app->temp_dir;
}
$pid = $work_dir . DS . md5( __FILE__ . implode( '', $argv ) ) . '.pid';
if ( file_exists( $pid ) ) {
    $worker_period = $app->worker_period;
    $mtime = filemtime( $pid );
    if ( ( time() - $worker_period ) < $mtime ) {
        echo date( "Y-m-d H:i:s " ), $app->translate( "The worker skipped (the file %s already exists).", $pid ), "\n";
        exit();
    }
    unlink( $pid );
}
touch( $pid );
$component = $app->component( 'SearchEstraier' );
$component->pid = $pid;
$app->init_tags( true );
$component->sync_casket( $app, $argv );
@unlink( $pid );