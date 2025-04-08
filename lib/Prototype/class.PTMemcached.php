<?php

class PTMemcached extends PTCache {

    protected $instance;
    protected $request_time;

    function __construct ( $app, $config = array() ) {
        $servers = $app->memcached_servers;
        if (! count( $servers ) ) {
            $servers[] = 'localhost:11211:33';
        }
        $memcached_servers = [];
        foreach ( $servers as $server ) {
            list( $server, $port, $weight ) = array_pad( explode( ':', $server ), 3, null );
            if (! $weight ) $weight = 33;
            if (! $port ) $port = '11211';
            $memcached_servers[] = [ $server, $port, $weight ];
        }
        $memcached = new Memcached();
        $memcached->addServers( $memcached_servers );
        $this->instance = $memcached;
        $this->request_time = isset( $_SERVER['REQUEST_TIME'] ) ? $_SERVER['REQUEST_TIME'] : time();
    }

    function instance () {
        return $this->instance;
    }

    function get ( $key, $ttl = null, $comp = null ) {
        $cache = $this->instance->get( $key );
        if ( is_array( $cache ) ) {
            list( $mtime, $data ) = $cache;
            if ( $comp && ( $mtime < $comp ) ||
               ( $ttl && $mtime <= $ttl ) ) {
                $this->delete( $key );
                return null;
            }
            return $data;
        }
        return null;
    }

    function exists ( $key ) {
        $cache = $this->instance->get( $key );
        return $cache !== false ? 1 : 0;
    }

    function getAllKeys () {
        $allKeys = $this->get( $this->_prefix . '__getALLKeys' );
        return is_array( $allKeys ) ? array_keys( $allKeys ) : $this->instance->getAllKeys();
    }

    function set ( $key, $data, $ttl = null ) {
        $time = $this->request_time;
        if ( $ttl ) $time += $ttl;
        $this->instance->set( $key, array( $time, $data ) );
        $allKeys = $this->get( $this->_prefix . '__getALLKeys' );
        if (! $allKeys ) $allKeys = [];
        $allKeys[ $key ] = true;
        $this->instance->set( $this->_prefix . '__getALLKeys', array( $time, $allKeys ) );
        return true;
    }

    function delete ( $key, $no_prefix = false ) {
        $allKeys = $this->get( $this->_prefix . '__getALLKeys' );
        if (! $allKeys ) $allKeys = [];
        unset( $allKeys[ $key ] );
        $this->instance->set( $this->_prefix . '__getALLKeys', array( $this->request_time, $allKeys ) );
        return $this->instance->delete( $key );
    }

    function flush ( $ttl = null, $realtime = false ) {
        if (! $ttl ) 
           return $this->instance->flush();
        $keys = $this->instance->getAllKeys();
        if (! is_array( $keys ) ) return false;
        $_prefix = $this->_prefix;
        foreach( $keys as $item ) {
            if ( strpos( $item, $_prefix ) === 0 ) {
                $this->get( $item, $ttl );
            }
        }
        return true;
    }
}