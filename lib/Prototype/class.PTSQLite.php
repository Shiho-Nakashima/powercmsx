<?php

class PTSQLite extends PTCache {

    protected $instance;
    protected $cache_expires = 86400;
    protected $request_time;
    protected $db_file;
    protected $app;

    function __construct ( $app, $config = array() ) {
        $this->app = $app;
        $path = $app->cache_dir . md5( __FILE__ ) . '.db';
        $this->db_file = $path;
        if ( file_exists( $path ) ) {
            $dsn = 'sqlite:' . $path;
            $pdo = new PDO( $dsn );
        } else {
            if (! is_dir( $app->cache_dir ) ) {
                mkdir( $app->cache_dir, 0755, true );
            }
            $dsn = 'sqlite:' . $path;
            $pdo = new PDO( $dsn );
            $pdo->exec( 'CREATE TABLE IF NOT EXISTS cache(
                         id INTEGER PRIMARY KEY AUTOINCREMENT,
                         key VARCHAR(255),
                         data TEXT,
                         expires INTEGER,
                         model VARCHAR(50))' );
            $pdo->exec( 'CREATE INDEX id ON cache(id);' );
            $pdo->exec( 'CREATE INDEX key ON cache(key);' );
            $pdo->exec( 'CREATE INDEX expires ON cache(expires);' );
            $pdo->exec( 'CREATE INDEX model ON cache(model);' );
            $pdo->exec( 'PRAGMA auto_vacuum=1;' );
        }
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
        $this->instance = $pdo;
        $this->cache_expires = $app->cache_expires;
        $this->request_time = $app->request_time;
    }

    function instance () {
        return $this;
    }

    function get ( $key, $ttl = null, $comp = null ) {
        if (! file_exists( $this->db_file ) ) {
            $this->__construct( $this->app );
            return false;
        }
        try {
            $pdo = $this->instance;
            $sql = 'SELECT * FROM cache WHERE key=? ORDER BY id DESC LIMIT 1;';
            $sth = $pdo->prepare( $sql );
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
        if (! file_exists( $this->db_file ) ) {
            $this->__construct( $this->app );
            return false;
        }
        $pdo = $this->instance;
        $sql = 'SELECT id FROM cache WHERE key=? ORDER BY id DESC LIMIT 1;';
        $sth = $pdo->prepare( $sql );
        $sth->execute( [ $key ] );
        return count( $sth->fetchAll() );
    }

    function getAllKeys () {
        if (! file_exists( $this->db_file ) ) {
            $this->__construct( $this->app );
            return [];
        }
        try {
            $pdo = $this->instance;
            $sql = 'SELECT key FROM cache;';
            $keys = $pdo->query( $sql );
            return $keys->fetchAll( PDO::FETCH_COLUMN );
        } catch ( PDOException $e ) {
            $this->flush();
            return [];
        }
    }

    function set ( $key, $data, $ttl = null ) {
        if (! file_exists( $this->db_file ) ) {
            $this->__construct( $this->app );
        }
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
            $sql = 'SELECT id FROM cache WHERE key=? LIMIT 1;';
            $sth = $pdo->prepare( $sql );
            $sth->execute( [ $key ] );
            $res = $sth->fetchAll();
            $expires = $ttl ? $this->request_time + $ttl : $this->request_time + $this->cache_expires;
            $data = serialize( $data );
            if ( empty( $res ) ) {
                if ( $model ) {
                    $values = [ $key, $data, $expires, $model ];
                    $sql = 'INSERT INTO cache(key,data,expires,model) VALUES(?,?,?,?)';
                } else {
                    $values = [ $key, $data, $expires ];
                    $sql = 'INSERT INTO cache(key,data,expires) VALUES(?,?,?)';
                }
                $sth = $pdo->prepare( $sql );
                return $sth->execute( $values );
            } else {
                if ( $model ) {
                    $values = [ $data, $expires, $model, (int)$res[0]['id'] ];
                    $sql = 'UPDATE cache SET data=?,expires=?,model=? WHERE id=?';
                } else {
                    $values = [ $data, $expires, (int)$res[0]['id'] ];
                    $sql = 'UPDATE cache SET data=?,expires=? WHERE id=?';
                }
                $sth = $pdo->prepare( $sql );
                return $sth->execute( $values );
            }
        } catch ( PDOException $e ) {
            $this->flush();
            return false;
        }
    }

    function delete ( $key, $no_prefix = false, $id = null ) {
        if (! file_exists( $this->db_file ) ) {
            $this->__construct( $this->app );
            return true;
        }
        try {
            $pdo = $this->instance;
            if ( $id ) {
                $sql = 'DELETE FROM cache WHERE id=?;';
                $sth = $pdo->prepare( $sql );
                return $sth->execute( [ $id ] );
            }
            $sql = 'SELECT id FROM cache WHERE key=? LIMIT 1;';
            $sth = $pdo->prepare( $sql );
            $sth->execute( [ $key ] );
            $res = $sth->fetchAll();
            if (! empty( $res ) ) {
                $sql = 'DELETE FROM cache WHERE key=?;';
                $sth = $pdo->prepare( $sql );
                return $sth->execute( [ $key ] );
            }
            return true;
        } catch ( PDOException $e ) {
            $this->flush();
            return false;
        }
    }

    function flush_model ( $model ) {
        if (! file_exists( $this->db_file ) ) {
            $this->__construct( $this->app );
            return 0;
        }
        try {
            $pdo = $this->instance;
            $sql = 'SELECT id FROM cache WHERE model = ?;';
            $sth = $pdo->prepare( $sql );
            $sth->execute( [ $model ] );
            $res = $sth->fetchAll( PDO::FETCH_COLUMN );
            if (!empty( $res ) ) {
                $ids = implode( ',', $res );
                $sql = "DELETE FROM cache WHERE id IN ({$ids});";
                $pdo->query( $sql );
            }
        } catch ( PDOException $e ) {
            return false;
        }
        return count( $res );
    }

    function flush ( $ttl = null, $realtime = false ) {
        if ( file_exists( $this->db_file ) ) {
            @unlink( $this->db_file );
            $this->__construct( $this->app );
        }
        return true;
    }

    function clean_up ( $expires = null ) {
        if (! file_exists( $this->db_file ) ) {
            $this->__construct( $this->app );
            return 0;
        }
        $expires = $expires ? $expires : $this->request_time;
        $pdo = $this->instance;
        $sql = 'SELECT id FROM cache WHERE expires <= ?;';
        $sth = $pdo->prepare( $sql );
        $sth->execute( [ $expires ] );
        $res = $sth->fetchAll( PDO::FETCH_COLUMN );
        if (!empty( $res ) ) {
            $ids = implode( ',', $res );
            $sql = "DELETE FROM cache WHERE id IN ({$ids});";
            $pdo->query( $sql );
        }
        return count( $res );
    }
}