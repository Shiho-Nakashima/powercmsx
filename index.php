<?php
require_once( __DIR__ . DIRECTORY_SEPARATOR .'class.Prototype.php' );
$app = new Prototype();
ini_set( 'max_execution_time', 600 );
$app->init();
if ( $app->force_secure && !$app->is_secure ) {
    $uri = $app->base . $app->request_uri;
    $uri = preg_replace( '/^http:/', 'https:', $uri );
    $app->redirect( $uri );
}
$app->run();