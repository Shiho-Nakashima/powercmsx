<?php
if (! defined( 'DS' ) ) {
    define( 'DS', DIRECTORY_SEPARATOR );
}
$base_path = '..' . DS . '..' . DS . '..' . DS;
set_include_path( get_include_path() . PATH_SEPARATOR . $base_path );
require_once( "{$base_path}class.Prototype.php" );
$analytics = $base_path . 'plugins' . DS . 'AccessAnalytics' . DS .
          'lib' . DS . 'Prototype' . DS . 'class.PTAccessAnalytics.php';
require_once( $analytics );
$app = new PTAccessAnalytics();
$app->init();
$app->run();