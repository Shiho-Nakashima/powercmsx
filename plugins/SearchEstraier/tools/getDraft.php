<?php
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'SearchEstraierAsync'] );
$app->logging  = true;
$app->init();
if (!isset( $argv ) ) {
    $argv = [];
}
$component = $app->component( 'SearchEstraier' );
$app->init_tags( true );
$component->get_draft_async( $app, $argv );