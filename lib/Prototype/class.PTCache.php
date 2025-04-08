<?php

class PTCache {

    protected $driver;
    protected $app;
    protected $_compiled = '_compiled';
    protected $_cache    = '_cache';
    public    $_prefix = PADO_DB_NAME . '__';
    public    $_driver;
    public    $_flush  = [];
    public    $_stash  = [];

    function __construct ( $app, $config = array() ) {
        foreach ( $config as $key => $value ) $this->$key = $value;
        if (! $this->driver ) return;
        $driver = $this->driver;
        $class_file = __DIR__ . DS 
            . 'class.PT' . $driver . '.php';
        if ( file_exists( $class_file ) ) {
            require_once( $class_file );
            $_driver = 'PT' . $driver;
            if (! class_exists ( $_driver ) ) return;
            $cache_driver = new $_driver( $app, $config );
            $this->_driver = $cache_driver;
            $this->app = $app;
        }
    }

    function __destruct () {
        if (! empty( $this->_flush ) && $this->_driver ) {
            foreach ( $this->_flush as $ttl ) {
                $this->_driver->flush( $ttl );
            }
        }
    }

    function instance () {
        if (! $this->_driver ) return null;
        return $this->_driver->instance();
    }

    function get ( $key, $ttl = null, $comp = null ) {
        if (! $this->_driver ) return false;
        $key = $this->_prefix . $key;
        if ( isset( $this->_stash[ $key ] ) ) {
            return $this->_stash[ $key ];
        }
        $cache = $this->_driver->get( $key, $ttl, $comp );
        if ( $ttl === true ) {
            $this->_stash[ $key ] = $cache;
        }
        return $cache;
    }

    function exists ( $key ) {
        if (! $this->_driver ) return false;
        $key = $this->_prefix . $key;
        if ( isset( $this->_stash[ $key ] ) ) {
            return true;
        }
        return $this->_driver->exists( $key );
    }


    function getAllKeys () {
        return $this->_driver->getAllKeys();
    }

    function set ( $key, $data, $ttl = null ) {
        if (! $this->_driver ) return false;
        $key = $this->_prefix . $key;
        if ( $ttl === true ) {
            $this->_stash[ $key ] = $data;
        }
        return $this->_driver->set( $key, $data, $ttl );
    }

    function delete ( $key, $no_prefix = false ) {
        if (! $this->_driver ) return false;
        return $no_prefix ? $this->_driver->delete( $key )
                          : $this->_driver->delete( $this->_prefix . $key );
    }

    function flush ( $ttl = null, $realtime = false ) {
        if (! $this->_driver ) return false;
        if ( $realtime ) {
            return $this->_driver->flush( $ttl );
        }
        if (! $ttl ) {
            $this->_flush = [0 => null];
            return true;
        } else if ( isset( $this->_flush[0] ) ) {
            return true;
        } else {
            if ( isset( $this->_flush[1] ) && $this->_flush[1] > $ttl ) {
                return true;
            }
            $this->_flush[1] = $ttl;
            return true;
        }
        return true;
    }
}