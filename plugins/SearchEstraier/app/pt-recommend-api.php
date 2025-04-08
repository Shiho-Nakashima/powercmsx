<?php
if (! defined( 'DS' ) ) {
    define( 'DS', DIRECTORY_SEPARATOR );
}
$base_path = '..' . DS . '..' . DS . '..' . DS;
set_include_path( get_include_path() . PATH_SEPARATOR . $base_path );
require_once( "{$base_path}class.Prototype.php" );
$recommend_api = $base_path . 'plugins' . DS . 'SearchEstraier' . DS .
          'lib' . DS . 'Prototype' . DS . 'class.PTRecommendAPI.php';
require_once( $recommend_api );
$app = new PTRecommendAPI();
if (! $app->searchestraier_api_can_bot ) {
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if ( preg_match( '/(bot|crawler|spider|crawling)/i', $ua ) ) {
        $app->json_error( 'Forbidden.', 403 );
    }
}
$app->app_path = realpath( $base_path );
$url = $app->param( 'url' );
$type = $app->param( 'type' );
if (! $type && ! $url ) {
    $type = 'interest';
} else if (! $type && $url ) {
    $type = 'similar';
}
$workspace_id = $app->param('workspace_id') ? $app->param('workspace_id') : 0;
$app->workspace_id = $workspace_id;
if ( $type === 'similar' && $app->searchestraier_api_caching !== false ) {
    if (! $app->support_dir ) {
        $app->support_dir = $app->app_path . DS . 'support';
    }
    $cache_dir = $app->support_dir . DS . 'cache' . DS . 'searchestraier_cache' . DS . $workspace_id . DS;
    $cache_key = md5( $app->query_string() );
    $cache_path = "{$cache_dir}{$cache_key}.json";
    if ( $app->fmgr->exists( $cache_path ) ) {
        $data = $app->fmgr->get( $cache_path );
        if ( $data ) {
            $app->print( $data, 'application/json; charset=utf-8', null, false );
        }
    }
    $app->searchestraier_cache_path = $cache_path;
}
$app->init();
$app->run();