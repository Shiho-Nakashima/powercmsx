<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class URLRedirect extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function save_filter_redirect_map ( &$cb, $app, $obj ) {
        if ( $obj->type == 'URL' ) {
            return true;
        }
        $condition = $obj->condition;
        if ( $obj->type == 'Regular Expressions' ) {
            $delimiter = $app->urlredirect_delimiter;
            $result = @preg_match( "{$delimiter}{$condition}{$delimiter}", '' );
            if ( preg_last_error() ) {
                $cb['error'] = $this->translate( 'The regular expression is incorrect.' );
                return false;
            }
        } else {
            if ( strpos( $condition, '/' ) !== 0 ) {
                $cb['error'] = $this->translate( "Relative URLs must be paths starting with '/'." );
                return false;
            }
        }
        return true;
    }

    function urlredirect_redirect ( $cb, $app, $obj ) {
        $ctx = $app->ctx;
        $site_url = $app->stash( 'workspace' ) ? $app->stash( 'workspace' )->site_url : $app->site_url;
        $site_url = preg_replace( '!(^https{0,1}://.*?)/.*$!', '$1', $site_url );
        $current_url = $site_url . $app->request;
        $relative_url = $app->request;
        $workspace_id = $ctx->stash( 'workspace' ) ? $ctx->stash( 'workspace' )->id : 0;
        $count = $app->db->model( 'redirect_map' )->count( ['workspace_id' => $workspace_id,  'status' => 2] );
        if (! $count ) {
            return true;
        }
        $map = $app->db->model( 'redirect_map' )->get_by_key(
            ['condition' => $relative_url, 'workspace_id' => $workspace_id,  'status' => 2] );
        if ( $map->id ) {
            return $map->http_status == 301 ? $app->moved_permanently( $map->redirect_url ) : $app->redirect( $map->redirect_url );
        }
        $map = $app->db->model( 'redirect_map' )->get_by_key(
            ['condition' => $current_url, 'workspace_id' => $workspace_id,  'status' => 2] );
        if ( $map->id ) {
            return $map->http_status == 301 ? $app->moved_permanently( $map->redirect_url ) : $app->redirect( $map->redirect_url );
        }
        $maps = $app->db->model( 'redirect_map' )->load(
            ['type' => 'Regular Expressions', 'workspace_id' => $workspace_id,  'status' => 2], null,
             'condition,redirect_url,http_status' );
        $pertterns = [];
        foreach ( $maps as $map ) {
            $pertterns[ $map->condition ] = $map;
        }
        $keys = array_map('strlen', array_keys( $pertterns ) );
        array_multisort( $keys, SORT_DESC, $pertterns );
        foreach ( $pertterns as $condition => $map ) {
            if ( @preg_match( "!$condition!", $current_url ) ) {
                $current_url = preg_replace( "!$condition!", $map->redirect_url, $current_url );
                return $map->http_status == 301 ? $app->moved_permanently( $current_url ) : $app->redirect( $current_url );
            } else if ( @preg_match( "!$condition!", $relative_url ) ) {
                $relative_url = preg_replace( "!$condition!", $map->redirect_url, $relative_url );
                return $map->http_status == 301 ? $app->moved_permanently( $relative_url ) : $app->redirect( $relative_url );
            }
        }
        return true;
    }
}