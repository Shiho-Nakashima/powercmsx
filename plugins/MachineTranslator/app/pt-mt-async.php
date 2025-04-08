<?php
if (! defined( 'DS' ) ) {
    define( 'DS', DIRECTORY_SEPARATOR );
}
$base_path = '..' . DS . '..' . DS . '..' . DS;
set_include_path( get_include_path() . PATH_SEPARATOR . $base_path );
require_once( "{$base_path}class.Prototype.php" );
$app = new Prototype( ['id' => 'MTLoader'] );
$app->init();
$component = $app->component( 'MachineTranslator' );
$component->mt_async( $app );