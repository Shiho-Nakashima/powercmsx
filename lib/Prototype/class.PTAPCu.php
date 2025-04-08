<?php

class PTAPCu extends PTCache {

    protected $cache_expires = 86400;
    protected $request_time;
    protected $expires;

    function __construct ( $app, $config = array() ) {
        $this->cache_expires = $app->cache_expires;
        $this->request_time = $app->request_time;
        $this->expires = $this->cache_expires + $this->request_time;
    }

    function __destruct () {
        $expires = $this->request_time;
        $allKeys = apcu_fetch( $this->_prefix . '__getALLKeys' );
        if ( is_array( $allKeys ) && !empty( $allKeys ) ) {
            $i = 0;
            foreach ( $allKeys as $key => $ts ) {
                if ( $ts <= $expires ) {
                    unset( $allKeys[ $key ] );
                    $i++;
                }
            }
            if ( $i ) {
                apcu_store( $this->_prefix . '__getALLKeys', $allKeys, $this->cache_expires );
            }
        }
    }

    function instance () {
        return $this;
    }

    function get ( $key, $ttl = null, $comp = null ) {
        $data = apcu_fetch( $key );
        if ( $data ) {
            if ( isset( $data['__mtime__'] ) ) {
                if ( $ttl ) {
                    $mtime = $data['__mtime__'];
                    if ( $mtime <= $ttl ) {
                        $this->delete( $key );
                        return null;
                    }
                }
                unset( $data['__mtime__'] );
            }
            if ( isset( $data['__scalar__'] ) ) {
                return $data['__scalar__'];
            }
            return $data;
        }
        return null;
    }

    function exists ( $key ) {
        return apcu_exists( $key ) ? 1 : 0;
    }

    function getAllKeys () {
        $allKeys = apcu_fetch( $this->_prefix . '__getALLKeys' );
        return is_array( $allKeys ) ? array_keys( $allKeys ) : [];
    }

    function set ( $key, $data, $ttl = null ) {
        $time = $this->request_time;
        if ( $ttl ) $time += $ttl;
        if (!is_array( $data ) ) {
            $data = ['__scalar__' => $data ];
        }
        $data['__mtime__'] = $time;
        if ( $ttl ) {
            apcu_store( $key, $data, $ttl );
        } else {
            apcu_store( $key, $data, $this->cache_expires );
        }
        $allKeys = apcu_fetch( $this->_prefix . '__getALLKeys' );
        if (! $allKeys ) $allKeys = [];
        $allKeys[ $key ] = $this->expires;
        apcu_store( $this->_prefix . '__getALLKeys', $allKeys, $this->cache_expires );
        return true;
    }

    function delete ( $key, $no_prefix = false ) {
        $allKeys = $this->get( $this->_prefix . '__getALLKeys' );
        if ( is_array( $allKeys ) ) {
            unset( $allKeys[ $key ] );
            apcu_store( $this->_prefix . '__getALLKeys', $allKeys, $this->cache_expires );
        }
        return apcu_delete( $key );
    }

    function flush ( $ttl = null, $realtime = false ) {
        return apcu_clear_cache();
    }

    function clean_up ( $expires = null ) {
        return 0;
    }
}