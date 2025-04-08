<?php
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
$component = $app->component( 'SimplifiedJapanese' );
$urlinfo_ids = [];
if ( in_array( '--urlinfo_ids', $argv ) ) {
    $idx = array_search( '--urlinfo_ids', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $urlinfo_ids = explode( ',', $argv[ $idx + 1] );
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
$arg = 1;
if ( in_array( '--arg', $argv ) ) {
    $idx = array_search( '--urlinfo_ids', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $arg = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( empty( $urlinfo_ids ) ) {
    exit();
}
$arg = (int) $arg;
$cols = ['id', 'file_path', 'workspace_id', 'model', 'object_id', 'urlmapping_id'];
$urls = $app->db->model( 'urlinfo' )->load(
        ['id' => ['IN' => $urlinfo_ids, 'mime_type' => 'text/html'] ], null, $cols );
$ctx = $app->ctx;
$counter = 0;
foreach ( $urls as $url ) {
    if (! $app->fmgr->exists( $url->file_path ) ) {
        continue;
    }
    $html = $app->fmgr->get( $url->file_path );
    $extension = PTUtil::get_extension( $url->file_path );
    $json_path = preg_replace( "/\.{$extension}$/", '.json', $url->file_path );
    $json = $component->filter_textnode_to_json( $html, $arg, $ctx );
    if ( $app->fmgr->exists( $json_path ) ) {
        if ( md5_file( $json_path ) === md5( $json ) ) {
            continue;
        }
    }
    $app->fmgr->put( $json_path, $json );
    $json_url = $app->db->model( 'urlinfo' )->get_by_key(
                ['file_path' => $json_path, 'workspace_id' => $url->workspace_id ] );
    PTUtil::set_url_path( $json_url );
    $json_url->class( 'furigana_json' );
    $json_url->model( $url->model );
    $json_url->object_id( $url->object_id );
    $json_url->key( 'urlmapping-' . $url->urlmapping_id );
    $json_url->save();
    $counter++;
}