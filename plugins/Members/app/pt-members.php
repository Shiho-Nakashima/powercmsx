<?php
if (! defined( 'DS' ) ) {
    define( 'DS', DIRECTORY_SEPARATOR );
}
$base_path = '..' . DS . '..' . DS . '..' . DS;
set_include_path( get_include_path() . PATH_SEPARATOR . $base_path );
require_once( "{$base_path}class.Prototype.php" );
$member = $base_path . 'plugins' . DS . 'Members' . DS .
          'lib' . DS . 'Prototype' . DS . 'class.PTMembers.php';
require_once( $member );
$app = new PTMembers();
$app->init();
$app->run();