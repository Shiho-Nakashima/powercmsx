<?php

class PTMySQL extends PTCache {

    protected $instance;
    protected $cache_expires = 86400;
    protected $request_time;
    protected $pado = null;
    protected $get_key = 'ce9b6c3b4cbe03d1a0615feafec343e1';
    protected $exi_key = 'e1b6cf058319d0f2964dcf56f7ca6aa7';
    protected $del_key = '2bf5ae4332312e02631af9f8cc315878';

    function __construct ( $app, $config = array() ) {
        $pdo = $app->db->db;
        $sql = "SHOW TABLES LIKE 'pt_cache'";
        $sth = $pdo->query( $sql );
        if ( empty( $sth->fetchAll( PDO::FETCH_COLUMN ) ) ) {
            $error_reporting = ini_get( 'error_reporting' ); 
            error_reporting( 0 );
            $scheme = ['column_defs' =>
                          ['id' => ['type' => 'int', 'size' => 11, 'not_null' => 1] ],
                       'indexes' =>
                          ['PRIMARY' => 'id', 'id' => 'id']
                      ];
            $app->db->model( 'pt_cache' )->create_table( 'pt_cache', 'pt_cache', '', $scheme );
            error_reporting( $error_reporting );
            $add = 'ALTER TABLE pt_cache ADD path varchar(255) NOT NULL'; // 'key' is reserved word in MySQL.
            $pdo->query( $add );
            $add = 'ALTER TABLE pt_cache ADD data longblob';
            $pdo->query( $add );
            $add = 'ALTER TABLE pt_cache ADD expires bigint';
            $pdo->query( $add );
            $add = 'ALTER TABLE pt_cache ADD model varchar(50)';
            $pdo->query( $add );
            $add = 'CREATE index path on pt_cache(path)';
            $pdo->query( $add );
            $add = 'CREATE index expires on pt_cache(expires)';
            $pdo->query( $add );
            $add = 'CREATE index model on pt_cache(model)';
            $pdo->query( $add );
        }
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
        $this->instance = $pdo;
        $this->pado = $app->db;
        $this->cache_expires = $app->cache_expires;
        $this->request_time = $app->request_time;
    }

    function instance () {
        return $this;
    }

    function get ( $key, $ttl = null, $comp = null ) {
        try {
            $pdo = $this->instance;
            $pado = $this->pado;
            if ( isset( $pado->statements[ $this->get_key ] ) ) {
                $sth = $pado->statements[ $this->get_key ];
            } else {
                $sth = $pdo->prepare( 'SELECT * FROM pt_cache WHERE path=? ORDER BY id DESC LIMIT 1;' );
                $pado->statements[ $this->get_key ] = $sth;
            }
            $sth->execute( [ $key ] );
            $res = $sth->fetchAll();
            if (! empty( $res ) ) {
                $res = $res[0];
                $expires = $res['expires'];
                if ( $expires <= $this->request_time || ( $ttl && ( $ttl >= $expires ) ) ) {
                    $this->delete( $key, false, (int)$res['id'] );
                    return false;
                }
                $data = $res['data'];
                return @unserialize( $data );
            }
            return false;
        } catch ( PDOException $e ) {
            $this->flush();
            return false;
        }
    }

    function exists ( $key ) {
        $pdo = $this->instance;
        $pado = $this->pado;
        if ( isset( $pado->statements[ $this->exi_key ] ) ) {
            $sth = $pado->statements[ $this->exi_key ];
        } else {
            $sth = $pdo->prepare( 'SELECT id FROM pt_cache WHERE path=? LIMIT 1;' );
            $pado->statements[ $this->exi_key ] = $sth;
        }
        $sth->execute( [ $key ] );
        return $sth->rowCount();
    }

    function getAllKeys () {
        try {
            $pdo = $this->instance;
            $sql = 'SELECT path FROM pt_cache;';
            $keys = $pdo->query( $sql );
            return $keys->fetchAll( PDO::FETCH_COLUMN );
        } catch ( PDOException $e ) {
            $this->flush();
            return [];
        }
    }

    function set ( $key, $data, $ttl = null ) {
        try {
            $model = null;
            if ( strpos( $key, 'queries' . DS ) !== false ) {
                $prefix = $this->_prefix . 'queries' . DS;
                if ( strpos( $key, $prefix ) === 0 ) {
                    list( $pfx, $_model, $hash ) = explode( DS, $key );
                    if ( $_model !== '_models' ) {
                        $model = $_model;
                    }
                }
            }
            $pdo = $this->instance;
            $pado = $this->pado;
            if ( isset( $pado->statements[ $this->exi_key ] ) ) {
                $sth = $pado->statements[ $this->exi_key ];
            } else {
                $sth = $pdo->prepare( 'SELECT id FROM pt_cache WHERE path=? LIMIT 1;' );
                $pado->statements[ $this->exi_key ] = $sth;
            }
            $sth->execute( [ $key ] );
            $res = $sth->fetchAll();
            $expires = $ttl ? $this->request_time + $ttl : $this->request_time + $this->cache_expires;
            $data = serialize( $data );
            if ( empty( $res ) ) {
                if ( $model ) {
                    $values = [ $key, $data, $expires, $model ];
                    $sql = 'INSERT INTO pt_cache(path,data,expires,model) VALUES(?,?,?,?)';
                    $cache_key = '08013ce634705e10ef04646e608a189f';
                } else {
                    $values = [ $key, $data, $expires ];
                    $sql = 'INSERT INTO pt_cache(path,data,expires) VALUES(?,?,?)';
                    $cache_key = '30aad590841c2d71181bcab73e4cd421';
                }
            } else {
                if ( $model ) {
                    $values = [ $data, $expires, $model, (int)$res[0]['id'] ];
                    $sql = 'UPDATE pt_cache SET data=?,expires=?,model=? WHERE id=?';
                    $cache_key = 'd319880be0584bd68cc1aa20ea7d3fa9';
                } else {
                    $values = [ $data, $expires, (int)$res[0]['id'] ];
                    $sql = 'UPDATE pt_cache SET data=?,expires=? WHERE id=?';
                    $cache_key = '6ad3aa0c09e419f879c72784f65031ab';
                }
            }
            if ( isset( $pado->statements[ $cache_key ] ) ) {
                $sth = $pado->statements[ $cache_key ];
            } else {
                $sth = $pdo->prepare( $sql );
                $pado->statements[ $cache_key ] = $sth;
            }
            $sth = $pdo->prepare( $sql );
            return $sth->execute( $values );
        } catch ( PDOException $e ) {
            $this->flush();
            return false;
        }
    }

    function delete ( $key, $no_prefix = false, $id = null ) {
        try {
            $pdo = $this->instance;
            if ( $id ) {
                $sql = 'DELETE FROM pt_cache WHERE id=?;';
                $sth = $pdo->prepare( $sql );
                return $sth->execute( [ $id ] );
            }
            $pado = $this->pado;
            if ( isset( $pado->statements[ $this->exi_key ] ) ) {
                $sth = $pado->statements[ $this->exi_key ];
            } else {
                $sth = $pdo->prepare( 'SELECT id FROM pt_cache WHERE path=? LIMIT 1;' );
                $pado->statements[ $this->exi_key ] = $sth;
            }
            $sth->execute( [ $key ] );
            $res = $sth->fetchAll();
            if (! empty( $res ) ) {
                $pado = $this->pado;
                if ( isset( $pado->statements[ $this->del_key ] ) ) {
                    $sth = $pado->statements[ $this->del_key ];
                } else {
                    $sth = $pdo->prepare( 'DELETE FROM pt_cache WHERE path=?;' );
                    $pado->statements[ $this->del_key ] = $sth;
                }
                return $sth->execute( [ $key ] );
            }
            return true;
        } catch ( PDOException $e ) {
            $this->flush();
            return false;
        }
    }

    function flush_model ( $model ) {
        $pdo = $this->instance;
        $sql = 'SELECT id FROM pt_cache WHERE model = ?;';
        $sth = $pdo->prepare( $sql );
        $sth->execute( [ $model ] );
        $res = $sth->fetchAll( PDO::FETCH_COLUMN );
        if (!empty( $res ) ) {
            $ids = implode( ',', $res );
            $sql = "DELETE FROM pt_cache WHERE id IN ({$ids});";
            $pdo->query( $sql );
        }
        return count( $res );
    }

    function flush ( $ttl = null, $realtime = false ) {
        $pdo = $this->instance;
        if (! $ttl ) {
            $sql = 'TRUNCATE pt_cache;';
            return $pdo->query( $sql );
        } else {
            $ttl = (int) $ttl;
            $sql = "DELETE FROM pt_cache  WHERE expires < ?;";
            $sth = $pdo->prepare( $sql );
            return $sth->execute( [ $ttl ] );
        }
        return true;
    }

    function clean_up ( $expires = null ) {
        $expires = $expires ? $expires : $this->request_time;
        $pdo = $this->instance;
        $sql = 'SELECT id FROM pt_cache WHERE expires <= ?;';
        $sth = $pdo->prepare( $sql );
        $sth->execute( [ $expires ] );
        $res = $sth->fetchAll( PDO::FETCH_COLUMN );
        if (!empty( $res ) ) {
            $ids = implode( ',', $res );
            $sql = "DELETE FROM pt_cache WHERE id IN ({$ids});";
            $pdo->query( $sql );
        }
        return count( $res );
    }
}