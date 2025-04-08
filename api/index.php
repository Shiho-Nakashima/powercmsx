<?php
$base_path = '..' . DIRECTORY_SEPARATOR;

require_once( $base_path .'class.Prototype.php' );
require_once( $base_path . 'lib' . DS . 'Prototype' . DS . 'class.PTRESTfulAPI.php' );
$app = new PTRESTfulAPI();
$app->run();