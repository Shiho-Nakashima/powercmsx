<?php
// cd path/to/powercmsx; sudo -u apache php ./tools/upgrader.php --models model_1,model_2...
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
$pid = $app->temp_dir . DS . md5( __FILE__ ) . '.pid';
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
if (!isset( $argv ) ) {
    $argv = [];
}
array_shift( $argv );
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTUpgrader.php' );
$upgrader = new PTUpgrader;
if ( count( $argv ) == 1 ) {
    $argv = preg_split( "/,/", $argv[0] );
}
$argv = array_unique( $argv );
$upgrader->upgrade_from_cli( $app, $argv );
unlink( $pid );