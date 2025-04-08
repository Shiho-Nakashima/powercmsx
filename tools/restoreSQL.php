<?php
// cd path/to/powercmsx; sudo -u apache php ./tools/restoreSQL.php --file /path/to/sqldump.sql.gz -- blob /path/to/blob.tar.gz
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'Worker'] );
$app->logging  = true;
$locale_dir = $app->locale_dir ? $this->locale_dir : dirname( __DIR__ ) . DS . 'locale';
$app->locale_dir = $locale_dir;
$locale = $locale_dir . DS . 'default.json';
if ( file_exists( $locale ) ) {
    $dict = json_decode( file_get_contents( $locale ), true );
    $app->dictionary['default'] = $dict ? $dict : [];
}
$lang = $app->language;
if ( $lang ) {
    $locale = $locale_dir . DS . $lang . '.json';
    if ( file_exists( $locale ) ) {
        $dict = json_decode( file_get_contents( $locale ), true );
        $app->dictionary[ $lang ] = $dict;
    }
}
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
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTWorker.php' );
$worker = new PTWorker;
$worker->pid = $pid;
if ( count( $argv ) == 1 ) {
    $argv = preg_split( "/,/", $argv[0] );
}
$argv = array_unique( $argv );
$cfg = dirname( __DIR__ ) . DS . 'db-config.php';
require_once( $cfg );
$worker->restore_sql( $app, $argv );
unlink( $pid );