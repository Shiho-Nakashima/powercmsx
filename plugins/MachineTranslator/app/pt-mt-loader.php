<?php
if (! defined( 'DS' ) ) {
    define( 'DS', DIRECTORY_SEPARATOR );
}
$base_path = '..' . DS . '..' . DS . '..' . DS;
set_include_path( get_include_path() . PATH_SEPARATOR . $base_path );
require_once( "{$base_path}class.Prototype.php" );
$loader = $base_path . 'plugins' . DS . 'MachineTranslator' . DS .
          'lib' . DS . 'Prototype' . DS . 'class.PTMTLoader.php';
require_once( $loader );
$app = new PTMTLoader();
$app->init();
$app->run();