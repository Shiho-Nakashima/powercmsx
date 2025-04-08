<?php

class PTRedis extends PTCache {

    protected $instance;
    protected $cache_expires = 86400;
    protected $keys_expires  = 604800;
    protected $request_time;
    protected $expires;
    protected $allKeys = [];

    function __construct ( $app, $config = array() ) {
        $servers = $app->memcached_servers;
        if (! count( $servers ) ) {
            $servers[] = 'localhost:6379';
        }
        foreach ( $servers as $server ) {
            $tls = false;
            if ( stripos( $server, 'tls://' ) === 0 ) {
                $tls = true;
                $server = preg_replace( '!^tls://!', '', $server );
            }
            list( $server, $port ) = array_pad( explode( ':', $server ), 2, null );
            if (! $port ) $port = 6379;
            if ( $tls ) {
                $server = 'tls://' . $server;
            }
            $redis = new Redis();
            $redis->connect( $server, $port );
            $this->instance = $redis;
            $this->cache_expires = $app->cache_expires;
            $this->request_time = $app->request_time;
            $this->expires = $this->cache_expires + $this->request_time;
            break;
        }
    }

    function instance () {
        return $this;
    }

    function get ( $key, $ttl = null, $comp = null ) {
        if (! $this->exists( $key ) ) {
            return null;
        }
        $data = $this->instance->get( $key );
        if ( $data ) {
            $data = json_decode( $data, true );
            unset( $data['__mtime__'] );
            if ( isset( $data['__scalar__'] ) ) {
                return $data['__scalar__'];
            }
            return $data;
        }
        $this->delete( $key, true );
        return null;
    }

    function exists ( $key ) {
        return isset( $this->getAllKeys( false )[ $key ] );
        // return $this->instance->exists( $key );
    }

    function getAllKeys ( $keys = true, $caching = true ) {
        // return $this->instance->keys( $this->_prefix . '*' );
        if ( $caching && !empty( $this->allKeys ) ) {
            // TODO::Update keys from other processes.
            return $keys ? array_keys( $this->allKeys ) : $this->allKeys;
        }
        $allKeys = $this->instance->get( $this->_prefix . '__getALLKeys' );
        if (! $allKeys ) {
            $this->allKeys = [];
            $this->instance->flushAll();
            return [];
        }
        $allKeys = json_decode( $allKeys, true );
        $this->allKeys = $allKeys;
        return $keys ? array_keys( $allKeys ) : $allKeys;
    }

    function setAllKeys ( $allKeys = [] ) {
        $this->allKeys = $allKeys;
        return $this->instance->set( $this->_prefix . '__getALLKeys', json_encode( $allKeys ), $this->keys_expires );
    }

    function set ( $key, $data, $ttl = null ) {
        $time = $this->request_time;
        if (! $ttl ) $ttl = $this->cache_expires;
        $time += $ttl;
        if (!is_array( $data ) ) {
            $data = ['__scalar__' => $data ];
        }
        $data['__mtime__'] = $time;
        $this->instance->set( $key, json_encode( $data ), $ttl );
        $allKeys = $this->getAllKeys( false, false );
        $allKeys[ $key ] = $this->expires;
        $this->setAllKeys( $allKeys );
        return true;
    }

    function delete ( $key, $keysOnly = false ) {
        $allKeys = $this->getAllKeys( false, false );
        unset( $allKeys[ $key ] );
        $this->setAllKeys( $allKeys );
        if ( $keysOnly ) {
            return true;
        }
        if ( method_exists( $this->instance, 'unlink' ) ) {
            return $this->instance->unlink( $key );
        }
        return $this->instance->del( $key );
    }

    function flush ( $ttl = null, $realtime = false ) {
        if (! $ttl ) {
            $this->allKeys = [];
            return $this->instance->flushAll();
        }
        $allKeys = $this->getAllKeys( false, false );
        $i = 0;
        foreach( $allKeys as $item => $mtime ) {
            if ( $ttl > $mtime ) {
                unset( $allKeys[ $item ] );
                $this->delete( $item );
                $i++;
            }
        }
        if ( $i ) {
            $this->setAllKeys( $allKeys );
        }
        return true;
    }

    function clean_up ( $expires = null ) {
        $expires = $expires ? $expires : $this->request_time;
        $allKeys = $this->getAllKeys( false, false );
        $i = 0;
        foreach ( $allKeys as $key => $ts ) {
            if ( $ts <= $expires ) {
                unset( $allKeys[ $key ] );
                $this->delete( $key, true );
                $i++;
            }
        }
        if ( $i ) {
            $this->setAllKeys( $allKeys );
        }
        return $i;
    }
}