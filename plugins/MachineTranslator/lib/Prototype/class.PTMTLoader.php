<?php

class PTMTLoader extends Prototype {

    function run () {
        $app = $this;
        header( 'Content-type: application/json' );
        $cache_key = $app->param( 'session_id' );
        $this_url = $app->param( 'this_url' );
        $to = $app->param( 'to' );
        $component = $app->component( 'MachineTranslator' );
        $cache = $component->get_cache( $cache_key, true );
        if (! $cache && $app->machinetranslator_cache_expires ) {
            $cached_map = $component->get_cache( 'machinetranslator_cached_map' );
            if ( $cached_map && is_array( $cached_map ) ) {
                if ( isset( $cached_map[ $this_url ] ) ) {
                    if ( isset( $cached_map[ $this_url ][ $to ] ) ) {
                        $path = $cached_map[ $this_url ][ $to ];
                        $path = 'plugin' . DS . 'mt' . DS . $path;
                        $cache_dir = $app->support_dir . DS . 'cache' . DS . 'machinetranslator_cache' . DS;
                        $path = $cache_dir . $path . '.html';
                        if ( $app->fmgr->exists( $path ) ) {
                            $cache = $app->fmgr->get( $path );
                        }
                    }
                }
            }
        }
        $translated = $cache !== null ? true : false;
        $json = ['translated' => $translated ];
        echo json_encode( $json );
        exit();
    }
}