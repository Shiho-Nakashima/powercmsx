<?php

/**
 * PADO : PHP Alternative Database Object
 *
 * @version    3.0
 * @package    PADO
 * @author     Alfasado Inc. <webmaster@alfasado.jp>
 * @copyright  2019 Alfasado Inc. All Rights Reserved.
 */
if (! defined( 'DS' ) ) {
    define( 'DS', DIRECTORY_SEPARATOR );
}
if (! defined( 'PADODIR' ) ) {
    define( 'PADODIR', __DIR__ . DS );
}

define( 'ILLEGAL_CHARS', [' ', "`" ,'+', '*', '/', '-', "'", ':', ';', '"', '\\', '|', "\0", "\x00"] );

class PADO extends stdClass {

    private $version     = 3.0;

    public  static $pado = null;
    public  $driver      = 'mysql';
    public  $dbname      = '';
    private $dbhost      = '';
    private $dbuser      = '';
    private $dbpasswd    = '';
    private $dbport      = ''; // 3306
    private $mysql_attr_ssl_ca;
    private $config      = [];
    public  $dbcharset   = 'utf8mb4';
    public  $collation   = 'utf8mb4_general_ci';
    public  $set_names   = false;
    public  $use_buffer  = false;
    public  $stringify   = false;
    public  $dbcompress  = false;
    public  $db;
    public  $dsn         = '';
    public  $max_packet  = null;
    public  $charset     = 'utf-8';
    public  $default_ts  = 'CURRENT_TIMESTAMP';
    public  $models_dirs = [];
    public  $blob_path   = '';
    public  $blob2file   = false;
    public  $cleanup_blob= false;
    public  $output_blobs= [];
    public  $remove_blobs= [];
    public  $txn_active  = false;
    public  $json_cache  = false;
    public  $cache_dir   = '';
    public  $query_cache = false;
    public  $max_cache_size = 12;
    public  $get_cache   = null;
    public  $not_cache   = [];
    public  $cache_driver= null;
    public  $update_multi= false;
    public  $update_objects = [];
    public  $select_cols = null;
    public  $show_columns= [];
    public  $save_strict = true;
    public  $column_strict= true;
    public  $in_upgrade  = false;
    public  $in_duplicate= false;
    public  $update_milti= false;
    public  $can_reconnect= true;
    public  $strict_offset= false;

/**
 * Table prefix.
 */
    public  $prefix      = '';

/**
 * Column name prefix. You can specify wild card strings <model>.
 */
    public  $colprefix   = '<model>_';
/**
 * Index name prefix. You can specify wild card strings <table>.
 */
    public  $idxprefix   = '<table>_';

/**
 * Column name of Primary key.
 */
    public  $id_column   = 'id';

/**
 * $debug: 1.error_reporting( E_ALL ) / 2.debugPrint error. /3.debugPrint SQL statement.
 *         4.recording the queries.
 */
    public  $debug       = false;

/**
 * If specified migrate db from $pado->scheme[$model].
 */
    public  $upgrader    = false;

    public  $persistent  = false;

    public  $logging     = false;
    public  $caching     = true;
    public  $log_path;
    public  $scheme      = [];
    public  $methods     = [];
    public  $json_model  = true;
    public  $save_json   = false;
    public  $can_drop    = false;
    public  $base_model  = null;
    public  $stash       = [];
    public  $cache       = [];
    public  $app         = null;
    public  $queries     = [];
    public  $query_cnt   = 0;
    public  $retry_cnt   = 0;
    public  $max_queries = 2500;
    public  $max_retries = 10;
    public  $retry_sleep = 1;
    public  $insert_empty= false;
    public  $errors      = [];
    public  $blob_type   = 'LONGBLOB';
    public  $int_type    = 'BIGINT';
    public  $text_type   = 'LONGTEXT';
    public  $float_type  = 'DOUBLE';
    public  $decimal_type= 'DECIMAL';
    public  $timeout     = 45;
    public  $models_json = [];

    public  $callbacks   = [
          'pre_save'     => [], 'post_save'   => [],
          'pre_delete'   => [], 'post_delete' => [],
          'pre_load'     => [], 'save_filter' => [],
          'delete_filter'=> [] ];

    public  $last_cache_key;

/**
 * Initialize a PADO.
 *
 * @param array $config: Array for set class properties.
 *                          or properties to JSON file.
 */
    function __construct ( $config = [] ) {
        set_error_handler( [ $this, 'errorHandler'] );
        if ( ( $cfg_json = PADODIR . 'config.json' )
            && file_exists( $cfg_json ) ) $this->configure_from_json( $cfg_json );
        foreach ( $config as $key => $value ) $this->$key = $value;
    }

    function __destruct() {
        $this->flush_queries();
    }

/**
 * Initialize a Database Connection.
 *
 * @param array $config: Array for set class properties.
 */
    function init ( $config = [], $retry = false ) {
        $this->config = $config;
        if (! $retry ) {
            foreach ( $config as $key => $value ) $this->$key = $value;
            if ( $this->debug ) error_reporting( E_ALL );
        }
        $dsn = $this->dsn;
        $driver = '';
        $dbuser = $this->dbuser ? $this->dbuser : PADO_DB_USER;
        $dbpasswd = $this->dbpasswd ? $this->dbpasswd : PADO_DB_PASSWORD;
        if (! $dsn ) {
            $driver = $this->driver;
            $dbname = $this->dbname ? $this->dbname : PADO_DB_NAME;
            $dbhost = $this->dbhost ? $this->dbhost : PADO_DB_HOST;
            $dbport = $this->dbport ? $this->dbport : PADO_DB_PORT;
            $dbcharset = defined( 'PADO_DB_CHARSET' ) ? PADO_DB_CHARSET : $this->dbcharset;
            $this->dbcompress = defined( 'PADO_DB_COMPRESS' ) ? PADO_DB_COMPRESS : $this->dbcompress;
            $dsn = "{$driver}:host={$dbhost};dbname={$dbname};"
                 . "charset={$dbcharset};port={$dbport}";
            $this->dsn = $dsn;
        } else {
            list( $driver ) = explode( ':', $dsn );
            $this->driver = $driver;
        }
        $blob2file = defined( 'PADO_DB_BLOB2FILE' ) ? PADO_DB_BLOB2FILE : $this->blob2file;
        $persistent = defined( 'PADO_DB_PERSISTENT' ) ? PADO_DB_PERSISTENT : $this->persistent;
        if (! $driver ) return;
        if ( $blob2file ) {
            $blob_path = defined( 'PADO_DB_BLOBPATH' ) ? PADO_DB_BLOBPATH : $this->blob_path;
            if (! $blob_path ) {
                $this->blob2file = false;
            } else {
                $this->use_buffer = true;
                $this->blob2file = $blob2file;
                $this->blob_path = $blob_path;
                if ( mb_substr( $this->blob_path, -1 ) != DS ) {
                    $this->blob_path .= DS;
                }
                if (! file_exists( $this->blob_path ) ) {
                    if (! mkdir( $this->blob_path, 0777, true ) ) {
                        $this->blob2file = false;
                        $this->blob_path = null;
                    }
                }
                $this->cleanup_blob = defined( 'PADO_DB_CLEANUP_BLOB' ) ? PADO_DB_CLEANUP_BLOB : $this->cleanup_blob;
            }
        }
        $sql = '';
        try {
            $this->db = null;
            $options = $persistent ? [ PDO::ATTR_PERSISTENT => true ] : [];
            $options[ PDO::ATTR_TIMEOUT ] = $this->timeout;
            $options[ PDO::ATTR_STRINGIFY_FETCHES ] = $this->stringify;
            $mysql_attr_ssl_ca = defined( 'PADO_MYSQL_ATTR_SSL_CA' )
                ? PADO_MYSQL_ATTR_SSL_CA : $this->mysql_attr_ssl_ca;
            if ( $mysql_attr_ssl_ca ) {
                $options[ PDO::MYSQL_ATTR_SSL_CA ] = $mysql_attr_ssl_ca;
            }
            $pdo = new PDO( $dsn, $dbuser, $dbpasswd, $options );
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->db = $pdo;
            $this->retry_cnt = 0;
            $this->query_cnt = 0;
            if ( $this->set_names ) {
                $pdo->query( 'SET NAMES ' . $this->dbcharset );
                if ( $this->debug == 4 ) $this->queries[] = 'SET NAMES ' . $this->dbcharset;
            }
            if ( class_exists( 'PADO' . $driver ) ) {
                if ( $driver === 'mysql' ) {
                    $max_packet = defined( 'PADO_DB_MAX_PACKET' ) ? PADO_DB_MAX_PACKET : $this->max_packet;
                    if ( $max_packet ) {
                        $max_packet = (int) $max_packet;
                        if ( $max_packet ) {
                            $sql = "SHOW VARIABLES LIKE 'max_allowed_packet'";
                            if ( $this->debug == 4 ) $this->queries[] = $sql;
                            $max_allowed_packet = $pdo->query( $sql )->fetchAll();
                            if ( isset( $max_allowed_packet[0] ) ) {
                                if ( $max_allowed_packet[0]['Value'] < $max_packet ) {
                                    $this->max_packet = $max_packet;
                                    $sql = "SET GLOBAL MAX_ALLOWED_PACKET = {$max_packet}";
                                    $sth = $pdo->prepare( $sql );
                                    $sth->execute();
                                    if ( $this->debug == 4 ) $this->queries[] = $sql;
                                    $sth = null;
                                } else {
                                    $this->max_packet = (int) $max_allowed_packet[0]['Value'];
                                }
                            }
                        }
                    }
                    if ( defined( 'PADO_DB_TIMEOUT' ) && PADO_DB_TIMEOUT > 10 ) {
                        $sql = "SHOW VARIABLES LIKE 'connect_timeout'";
                        if ( $this->debug == 4 ) $this->queries[] = $sql;
                        $connect_timeout = $pdo->query( $sql )->fetchAll();
                        if ( isset( $connect_timeout[0] ) ) {
                            if ( $connect_timeout[0]['Value'] < PADO_DB_TIMEOUT ) {
                                $timeout = (int) PADO_DB_TIMEOUT;
                                $sql = "SET GLOBAL CONNECT_TIMEOUT = {$timeout}";
                                $sth = $pdo->prepare( $sql );
                                $sth->execute();
                                if ( $this->debug == 4 ) $this->queries[] = $sql;
                                $sth = null;
                            }
                        }
                    }
                }
                if (! $retry ) {
                    $class = 'PADO' . $driver;
                    $base_model = new $class;
                    $class = get_class( $base_model );
                    $this->base_model = $base_model;
                    $reflection = new ReflectionClass( $base_model );
                    $get_methods = $reflection->getMethods();
                    $methods = [];
                    foreach ( $get_methods as $method )
                        if ( $method->class === $class )
                            $methods[ $method->name ] = true;
                    $this->methods = $methods;
                }
            }
        } catch ( PDOException $e ) {
            $message = 'Connection failed: ' . $e->getMessage();
            $this->errors[] = $message;
            $this->clear_query();
            trigger_error( $message );
            $this->retry_sleep = $this->retry_sleep * 2;
            sleep( $this->retry_sleep );
            if ( $this->retry_cnt > $this->max_retries ) {
                return die( 'Connection failed: ' . $e->getMessage() );
            }
            ++$this->retry_cnt;
            return $this->reconnect();
        }
        $pdo->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, $this->use_buffer );
        self::$pado = $this;
        return true;
    }

/**
 * Get max_allowed_packet.
 *
 * @return int $max_allowed_packet : variable of max_allowed_packet.
 */
    public function get_max_packet () {
        if ( $this->max_packet ) {
            return $this->max_packet;
        }
        try {
            $sql = "SHOW VARIABLES LIKE 'max_allowed_packet'";
            if ( $this->debug == 4 ) $this->queries[] = $sql;
            $max_allowed_packet = $this->db->query( $sql )->fetchAll();
            if ( isset( $max_allowed_packet[0] ) ) {
                $this->max_packet = (int) $max_allowed_packet[0]['Value'];
                return $this->max_packet;
            }
        } catch ( PDOException $e ) {
        }
        return false;
    }

/**
 * Reconnect to db.
 *
 * @return bool   $success : true or false.
 */
    public function reconnect () {
        if ( $this->caching ) {
            $max_cache_size = (int) $this->max_cache_size * 1024 * 1024;
            if ( memory_get_usage() > $max_cache_size ) {
                unset( $this->cache, $this->stash );
                $this->cache = [];
                $this->stash = [];
                if ( php_sapi_name() === 'cli' ) {
                    unset( $this->queries );
                    $this->queries = [];
                }
            }
        }
        if (! $this->can_reconnect ) {
            return false;
        }
        if ( $this->txn_active ) {
            $this->commit();
        }
        if ( $this->init( $this->config, true ) ) {
            $this->query_cnt = 0;
            return true;
        }
        return false;
    }

    public function keep_connect ( $force = false ) {
        if ( $force ||
            ( $this->query_cnt > $this->max_queries && ! $this->txn_active ) ) {
            return $this->reconnect();
        }
    }

/**
 * Prepares and executes an SQL statement without placeholders.
 *
 * @param  string $sql     : SQL statement.
 * @param  mixed $fetchMode : Class constants of PDO.
 * @param  mixed $extra    : Column number or class object.

 * @return mixed $objects or $array : Excute results.
 */
    public function query ( $sql, $fetchMode = null, $extra = null ) {
        $cache_path = null;
        if ( is_string( $fetchMode ) ) {
            $extra = $fetchMode;
            $fetchMode = null;
        }
        if ( is_string( $extra ) && !in_array( $extra, $this->not_cache ) ) {
            if ( $this->caching || $this->query_cache ) {
                $cache_path = $extra . DS . $this->make_cache_key( $sql, $fetchMode, $extra );
                if ( $cache = $this->get_cache( $cache_path ) ) {
                    return $cache;
                }
            }
        }
        try {
            if ( $this->debug == 4 ) {
                $start = microtime( true );
            }
            if ( $fetchMode === PDO::FETCH_CLASS && is_object( $extra ) ) {
                $result = $this->db->query( $sql, $fetchMode, get_class( $extra ) )->fetchAll();
            } else if ( $fetchMode === PDO::FETCH_COLUMN && is_int( $extra ) ) {
                $result = $this->db->query( $sql, $fetchMode, $colno )->fetchAll();
            } else if ( is_numeric( $fetchMode ) ) {
                $result = $this->db->query( $sql )->fetchAll( $fetchMode );
            } else {
                $result = $app->db->query( $sql, $fetchMode )->fetchAll();
            }
            if ( $this->debug == 4 ) {
                $end = microtime( true ) - $start;
                $end = round( $end, 3 );
                if ( $end ) {
                    $sql .= "(It took {$end} seconds.)";
                }
                $this->queries[] = $sql;
            }
            if ( $cache_path ) {
                if ( $this->caching ) {
                    $this->cache[ $extra ][ $cache_path ] = $result;
                }
                if ( $this->query_cache ) {
                    $this->set_cache( $cache_path, $result );
                }
            }
            return $result;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $this->errors[] = $message;
            $this->clear_query();
            trigger_error( $message );
            return [];
        }
    }

/**
 * Connect to db with minimum query.
 *
 * @param  string $sql     : SQL statement.
 * @return bool   $success : true or false.
 */
    public function ping ( $sql = 'SELECT 1' ) {
        try {
            $this->db->query( $sql )->fetchAll();
            if ( $this->debug == 4 ) $this->queries[] = $sql;
            return true;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $this->errors[] = $message;
            $this->clear_query();
            trigger_error( $message );
            sleep( 1 );
            if ( $this->retry_cnt > $this->max_retries ) {
                return false;
            }
            ++$this->retry_cnt;
            $this->reconnect();
            return;
        }
    }

/**
 * Get instance of class PADO($pado = PADO::get_instance();)
 * 
 * @return object $pado : Object class PADO.
 */
    static function get_instance () {
        return self::$pado;
    }

/**
 * Set properties from JSON.
 *
 * @param string $json: JSON file path.
 */
    function configure_from_json ( $json ) {
        if (!is_readable( $json ) ) return;
        $config = json_decode( file_get_contents( $json ), true );
        foreach ( $config as $k => $v ) $this->$k = $v;
    }

/**
 * Initializing the model.
 * When class exists model use it.
 * or PADO + driver name(e.g.PADOMySQL) use it.
 * Otherwise use PADOBaseModel.
 * 
 * @param  string $model : Name of model.
 * @return object $class : Class model object.
 */
    function model ( $model = '' ) {
        if ( is_array( $model ) ) {
            $model = current( $model );
        } else if ( $model === null ) {
            $model = '';
        }
        $class_exists = $model ? class_exists( $model, false ) : false;
        if (! $class_exists && $model ) {
            $model = str_replace( ILLEGAL_CHARS, '', $model );
        }
        $class = $class_exists ? $model
               : ( class_exists( 'PADO' . $this->driver )
               ? 'PADO' . $this->driver : 'PADOBaseModel' );
        $_model = new $class( $model, $this );
        if ( $class_exists && get_class( $_model ) != $model ) {
            $class = class_exists( 'PADO' . $this->driver )
               ? 'PADO' . $this->driver : 'PADOBaseModel';
            $_model = new $class( $model, $this );
        }
        return $_model;
    }

/**
 * SHOW TABLES.
 * 
 * @param  string $model  : Name of model.
 * @param  bool   $create : Specify true, SHOW CREATE TABLE.
 * @return object $res    : An array of Tables.
 */
    function show_tables ( $model = null, $create = false ) {
        $sql = 'SHOW TABLES';
        if ( $model ) {
            $model = $this->prefix . $model;
        }
        if ( $model && ! $create ) {
            $cache = $this->stash( 'show_tables_' . $model );
            if ( $cache !== null && is_array( $cache ) ) return $cache;
            $sql = "SHOW TABLES LIKE :model";
        } else if ( $model && $create ) {
            $sql = 'SHOW CREATE TABLE ' . $this->quote_model( $model );
        }
        if ( $this->query_cnt > $this->max_queries && ! $this->txn_active ) {
            $this->reconnect();
        }
        $pdo = $this->db;
        if (! $pdo ) {
            $this->init();
        }
        $sth = $pdo->prepare( $sql );
        if ( $model && ! $create ) {
            $sth->bindValue( ':model', $model, PDO::PARAM_STR );
        }
        try {
            $sth->execute();
            if ( $this->debug == 4 ) $this->queries[] = $model ? $sql . ' / values = ' . $model : $sql;
            ++$this->query_cnt;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $this->errors[] = $message;
            $this->clear_query();
            trigger_error( $message );
        }
        $res = $sth->fetchAll();
        $sth = null;
        $this->stash( 'show_tables_' . $model, $res );
        return $res;
    }

/**
 * SHOW COLUMNS.
 * 
 * @param  string $model  : Name of model.
 * @param  bool   $create : Specify true, SHOW CREATE TABLE.
 * @return object $res    : An array of Columns.
 */
    function show_columns ( $model ) {
        if ( isset( $this->show_columns[ $model ] ) ) {
            return $this->show_columns[ $model ];
        }
        $cache_path = $model . DS . 'columns';
        if ( $cache = $this->get_cache( $cache_path ) ) {
            $this->show_columns[ $model ] = $cache;
            return $cache;
        }
        $model = $this->prefix . $model;
        $sql = 'SHOW COLUMNS FROM ' . $this->quote_model( $model );
        if ( $this->query_cnt > $this->max_queries && ! $this->txn_active ) {
            $this->reconnect();
        }
        $pdo = $this->db;
        if (! $pdo ) {
            $this->init();
        }
        $sth = $pdo->prepare( $sql );
        try {
            $sth->execute();
            if ( $this->debug == 4 ) $this->queries[] = $model ? $sql . ' / values = ' . $model : $sql;
            ++$this->query_cnt;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $this->errors[] = $message;
            $this->clear_query();
            trigger_error( $message );
            return [];
        }
        $res = $sth->fetchAll( PDO::FETCH_COLUMN );
        $sth = null;
        $this->set_cache( $cache_path, $res );
        $this->show_columns[ $model ] = $res;
        return $res;
    }

/**
 * Begin transaction.
 */
    function begin_work () {
        if ( $this->txn_active ) return;
        $this->txn_active = true;
        try {
            $this->db->beginTransaction();
        } catch ( Exception $e ) {
            $message = 'PADOException: ' . $e->getMessage();
            $this->errors[] = $message;
            trigger_error( $message );
            return false;
        }
    }

/**
 * Commit.
 */
    function commit ( $model = null ) {
        if (! $this->db->inTransaction() ) {
            $this->txn_active = false;
            return true;
        }
        try {
            $this->db->commit();
            $this->txn_active = false;
            if ( $this->blob2file ) {
                $remove_blobs = $this->remove_blobs;
                foreach ( $remove_blobs as $blob ) {
                    if ( file_exists( $blob ) ) @unlink( $blob );
                }
                $this->remove_blobs = [];
                $this->output_blobs = [];
            }
            return true;
        } catch ( Exception $e ) {
            $message = 'PADOException: ' . $e->getMessage();
            $this->errors[] = $message;
            if ( $this->blob2file ) {
                $output_blobs = $this->output_blobs;
                foreach ( $output_blobs as $blob ) {
                    if ( file_exists( $blob ) ) @unlink( $blob );
                }
                $this->remove_blobs = [];
                $this->output_blobs = [];
            }
            if ( $model && !in_array( $model, $this->not_cache ) ) {
                $this->clear_query( $model, null, false, true );
            }
            trigger_error( $message );
            return false;
        }
    }

/**
 * Rollback.
 */
    function rollback ( $model = null ) {
        $this->db->rollBack();
        $this->txn_active = false;
        if ( $model && !in_array( $model, $this->not_cache ) ) {
            $this->clear_query( $model, null, false, true );
        }
        if ( $this->blob2file ) {
            $output_blobs = $this->output_blobs;
            foreach ( $output_blobs as $blob ) {
                if ( file_exists( $blob ) ) @unlink( $blob );
            }
            $this->output_blobs = [];
            $this->remove_blobs = [];
        }
    }

/**
 * Register plugin callback.
 *
 * @param  string $model    : Name of model.
 * @param  string $kind     : Kind of callback (pre_save, post_save, pre_delete,
 *                            post_delete, save_filter, delete_filter or pre_load).
 * @param  string $meth     : Function or method name.
 * @param  int    $priority : Callback priority.
 * @param  object $class    : Plugin class object.
 */
    function register_callback ( $model, $kind, $meth, $priority, $obj = null ) {
        if (! $priority ) $priority = 5;
        $this->callbacks[ $kind ][ $model ][ $priority ][] = [ $meth, $obj ];
    }

/**
 * Run callbacks.
 *
 * @param  array  $cb     : An array of string callback name, string sql and array values.
 * @param  string $model  : Name of model.
 * @param  object $obj    : Model object.
 * @param  bool   $needle : If specified and save_filter or delete_filter callbacks
 *                          returns false, cancel it.
 */
    function run_callbacks ( &$cb, $model, &$obj, $needle = false ) {
        $cb_name = $cb['name'];
        $all_callbacks = [];
        if ( isset( $this->callbacks[ $cb_name ][ $model ] ) ) {
            $all_callbacks = $this->callbacks[ $cb_name ][ $model ];
        }
        if ( isset( $this->callbacks[ $cb_name ]['__any__'] ) ) {
            $all_callbacks =
                array_merge( $all_callbacks, $this->callbacks[ $cb_name ]['__any__'] );
        }
        if (! empty( $all_callbacks ) ) {
            ksort( $all_callbacks );
            foreach ( $all_callbacks as $callbacks ) {
                foreach ( $callbacks as $callback ) {
                    list( $meth, $class ) = $callback;
                    $res = true;
                    if ( function_exists( $meth ) ) {
                        $res = $meth( $cb, $this, $obj );
                    } elseif ( $class && method_exists( $class, $meth ) ) {
                        $res = $class->$meth( $cb, $this, $obj );
                    }
                    if ( $needle && !$res ) return false;
                }
            }
        }
        return true;
    }

/**
 * Load object.
 * 
 * @param  string $model   : Name of model.
 * @param  mixed  $terms   : Numeric ID or an array should have keys matching column
 *                           names and the values are the values for that column.
 * @param  array  $args    : Search options.
 * @param  string $cols    : Get columns from records. Comma-separated text or '*'.
 * @param  string $extra   : String to add to the WHERE statement.
 *                           Insufficient care is required for injection.
 * @return array  $objects : An array of objects or single object(Specified Numeric ID).
 */
    function load ( $model, $terms = [], $args = [], $cols = '', $extra = '', $ex_vars = [] ) {
        return $this->model( $model )->load( $terms, $args, $cols, $extra, $ex_vars );
    }

/**
 * Quotes a string for use in a query.
 * 
 * @param  string $str    : String to quote.
 * @return string $quoted : Quoted string.
 */
    function quote ( $str ) {
        return $str === null ? "''" : $this->db->quote( $str );
    }

/**
 * Quotes a string for use in a table name.
 * 
 * @param  string $model    : String to quote.
 * @return string $quoted : Quoted string.
 */
    function quote_model ( $model ) {
        $model = str_replace( ILLEGAL_CHARS, '', $model );
        return '`' . $model . '`';
    }

/**
 * stash: Where the variable is stored.
 *
 * @param  string $name : Name of set or get variable to(from) stash.
 * @param  mixed  $value: Variable for set to stash.
 * @return mixed  $var  : Stored data.
 */
    function stash ( $name, $value = false, $var = null ) {
        if ( isset( $this->stash[ $name ] ) ) $var = $this->stash[ $name ];
        if ( $value !== false ) {
            $this->stash[ $name ] = $value;
        }
        return $var;
    }

/**
 * Quotes a string for like statement.
 * 
 * @param  string $str    : String to quote.
 * @param  bool   $start  : Add '%' before $str.
 * @param  bool   $end    : Add '%' after $str.
 * @return string $quoted : Quoted string.
 */
    function escape_like ( $str, $start = false, $end = false ) {
        $str = str_replace( '%', '\\%', $str );
        $str = str_replace( '_', '\\_', $str );
        $start = $start ? '%' : '';
        $end   = $end ? '%' : '';
        return $start . $str . $end;
    }

/**
 * Create a unique cache key.
 * 
 * @param              : See load method.
 * @return string $res : Unique cache key.
 */
    function make_cache_key ( $model, $terms = [], $args = [], $cols = '',
                              $extra = '', $ex_vals = [] ) {
        if ( is_array( $terms ) ) ksort( $terms );
        if ( is_array( $args ) ) ksort( $args );
        ob_start();
            print_r( $model );
            print_r( $terms );
            print_r( $args );
            print_r( $cols );
            print_r( $extra );
            print_r( $ex_vals );
        $res = ob_get_clean();
        $res = md5( $res );
        $this->last_cache_key = $res;
        return $res;
    }

/**
 * Clear cached objects or valiable. If model is omitted, all caches are cleared.
 * 
 * @param  string $model : Name of model.
 */
    function clear_cache ( $model = null ) {
        if ( $model ) {
            $this->cache[ $model ] = [];
        } else {
            $this->cache = [];
            $this->stash = [];
        }
    }

/**
 * Get cache.
 * 
 * @param  string $path      : Path of cache.
 * @param  int    $expires   : Cache expires(Unix timestamp).
 * @param  bool   $file      : Use file cache.
 * @return mixed  $data      : Cached data.
 */
    function get_cache ( $path, $expires = null, $file = false ) {
        if ( $this->in_upgrade ) return;
        if ( isset( $this->cache[ $path ] ) ) {
            return $this->cache[ $path ];
        }
        if ( $driver = $this->cache_driver ) {
            if (! $file ) {
                $path = 'queries' . DS . $path;
                $data = $driver->get( $path );
                if ( is_array( $data ) ) {
                    return $data;
                }
                return;
            }
        }
        if (! $this->cache_dir ) return;
        $this->get_cache = null;
        $path = $this->cache_dir . $path . '.php';
        $old_level = error_reporting();
        error_reporting( 0 );
        if ( file_exists( $path ) ) {
            if ( $expires ) {
                $mtime = @filemtime( $path );
                if ( ( $mtime === false ) || ( $expires && $expires > $mtime ) ) return;
            }
            @include( $path );
            $data = $this->get_cache;
            $this->get_cache = null;
            error_reporting( $old_level );
            return $data;
        }
        error_reporting( $old_level );
        return;
    }

/**
 * Set cache.
 * 
 * @param  string $path      : Path of cache.
 * @param  mixed  $data      : Stored data.
 * @param  bool   $file      : Use file cache.
 * @return bool   $result    : Cache creater or not.
 */
    function set_cache ( $path, $data, $file = false ) {
        if ( $this->in_upgrade ) return;
        if ( $driver = $this->cache_driver ) {
            $path = 'queries' . DS . $path;
            if (! $file ) return $driver->set( $path, $data );
        }
        if (! $this->cache_dir ) return;
        $data = var_export( $data, true );
        $path = $this->cache_dir . $path . '.php';
        $data =  '<?php $this->get_cache=' . $data . ';';
        $old_level = error_reporting();
        error_reporting( 0 );
        if (! is_dir( dirname( $path ) ) ) {
            @mkdir( dirname( $path ), 0777 , true );
        } else if ( file_exists( $path ) ) {
            @unlink( $path );
        }
        if ( @file_put_contents( "{$path}.tmp", $data, LOCK_EX ) ) {
            if (! @rename( "{$path}.tmp", $path ) ) {
                @unlink( "{$path}.tmp" );
                error_reporting( $old_level );
                return;
            }
            if ( function_exists( 'opcache_reset' ) ) {
                @include( $path );
                $this->get_cache = null;
            }
            error_reporting( $old_level );
            return true;
        }
        error_reporting( $old_level );
    }

/**
 * Flush query cache.
 * 
 * @param  string $model     : Model name.
 * @param  int    $id        : Object id.
 * @param  bool   $single    : Flush object cache that specified id.
 * @param  bool   $all       : Flush all query cache of model.
 */
    function clear_query ( $model = null, $id = null, $single = false, $all = false, $file = false ) {
        $old_level = error_reporting();
        error_reporting( 0 );
        if ( $model ) {
            $this->cache[ $model ] = [];
        } else {
            $this->cache = [];
        }
        if (! $model ) { // Clear all
            if ( $driver = $this->cache_driver ) {
                $keys = $driver->getAllKeys();
                $pfx = $driver->_prefix . 'queries' . DS;
                $memcached = $driver->instance();
                foreach ( $keys as $key ) {
                    if ( stripos( $key, $pfx ) === 0 ) {
                        $memcached->delete( $key );
                    }
                }
            } else {
                if (! $this->cache_dir ) {
                    error_reporting( $old_level );
                    return;
                }
                $path = $this->cache_dir;
                if ( $path && is_dir( $path ) ) {
                    $items = glob( $path . DS . '*' );
                    if ( is_array( $items ) ) {
                        $caches = [];
                        foreach ( $items as $item ) {
                            $children = glob( $item . DS . '*' );
                            if ( is_array( $children ) ) {
                                foreach ( $children as $child ) {
                                    if ( is_dir( $child ) ) {
                                        $gChildren = glob( $child . DS . '*.php' );
                                        if ( is_array( $gChildren ) && !empty( $gChildren ) ) {
                                            $caches = array_merge( $caches, $gChildren );
                                        }
                                    } else {
                                        $caches[] = $child;
                                    }
                                }
                            }
                        }
                    }
                    foreach ( $caches as $cache ) {
                        @unlink( $cache );
                    }
                }
            }
        } else {
            if ( $driver = $this->cache_driver ) {
                if (! $file ) {
                    if ( $id ) {
                        $path = 'queries' . DS . $model . DS . 'objects' . DS . $id;
                        $driver->delete( $path );
                        if ( $single ) {
                            error_reporting( $old_level );
                            return;
                        }
                    }
                    if ( method_exists( $driver->_driver, 'flush_model' ) ) {
                        $driver->_driver->flush_model( $model );
                        error_reporting( $old_level );
                        return;
                    }
                    $keys = $driver->getAllKeys();
                    $pfx = $driver->_prefix . 'queries' . DS . $model . DS;
                    $memcached = $driver->instance();
                    foreach ( $keys as $key ) {
                        if ( stripos( $key, $pfx ) === 0 ) {
                            $memcached->delete( $key );
                        }
                    }
                    error_reporting( $old_level );
                    return;
                }
            }
            if (! $this->cache_dir ) {
                error_reporting( $old_level );
                return;
            }
            if ( $id ) {
                $path = $this->cache_dir . $model . DS . 'objects' . DS . $id . '.php';
                if ( file_exists( $path ) ) {
                    @unlink( $path );
                }
            }
            if (! $single ) {
                $path = $this->cache_dir . $model . DS;
                if ( is_dir( $path ) ) {
                    $items = glob( $path . '*.php' );
                    if ( is_array( $items ) ) {
                        foreach ( $items as $item ) {
                            @unlink( $item );
                        }
                    }
                }
                if ( $all ) {
                    $path = $this->cache_dir . $model . DS . 'objects' . DS;
                    $items = glob( $path . '*.php' );
                    if ( is_array( $items ) ) {
                        foreach ( $items as $item ) {
                            @unlink( $item );
                        }
                    }
                }
            }
        }
        error_reporting( $old_level );
        if ( function_exists( 'opcache_reset' ) && !$this->cache_driver ) {
            opcache_reset();
        }
    }

/**
 * Flush queries.
 */

    function flush_queries () {
        $update_objs = $this->update_objects;
        if (!empty( $update_objs ) ) {
            foreach ( $update_objs as $model => $ids ) {
                $ids = array_unique( $ids );
                foreach ( $ids as $id ) {
                    $this->clear_query( $model, $id, true );
                }
                $this->clear_query( $model );
            }
            $this->update_objects = [];
        }
    }

/**
 * Drop Table
 * 
 * @param  string $model : Name of model.
 */
    function drop ( $model ) {
        if (! $this->can_drop ) return;
        $pado = $this;
        if ( !in_array( $model, $pado->not_cache ) ) {
            $pado->clear_query( $model, null, false, true );
        }
        $table = $this->prefix . $model;
        $_model = $this->model( $model )->new();
        if ( isset( $this->scheme[ $model ] )
            && is_array( $this->scheme[ $model ] ) && count( $this->scheme[ $model ] ) ) {
            $sql = 'DROP TABLE ' . $this->quote_model( $table );
            if ( $this->query_cnt > $this->max_queries && ! $this->txn_active ) {
                $this->reconnect();
            }
            $res = null;
            $sth = $this->db->prepare( $sql );
            try {
                if ( $this->debug == 4 ) {
                    $start = microtime( true );
                }
                $result = $sth->execute();
                $sth = null;
                if ( $this->debug == 4 ) {
                    $end = microtime( true ) - $start;
                    $end = round( $end, 3 );
                    if ( $end ) {
                        $sql .= "(It took {$end} seconds.)";
                    }
                    $this->queries[] = $sql;
                }
                ++$this->query_cnt;
                return $result;
            } catch ( PDOException $e ) {
                $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                $this->errors[] = $message;
                $this->clear_query();
                trigger_error( $message );
            }
            $sth = null;
            return $res;
        }
    }

/**
 * Generate UUID
 */
    function generate_uuid ( $dir = null ) {
        $uuid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
        if ( $dir && file_exists( $dir . DS . $uuid ) ) {
            return $this->generate_uuid( $dir );
        }
        return $uuid;
    }

/**
 * Get type blob columns.
 * 
 * @param  string $model : Name of model.
 */

    function get_blob_cols ( $model, $no_prefix = false ) {
        if (! $model ) return [];
        $no_prefix = $no_prefix ? 1 : 0;
        if ( isset( $this->show_columns["blob_cols_{$model}_{$no_prefix}"] ) ) {
            return $this->show_columns["blob_cols_{$model}_{$no_prefix}"];
        }
        $cache_path = $model . DS . "columns_{$no_prefix}";
        $blob_cols = $this->get_cache( $cache_path );
        if ( $blob_cols ) {
            $this->show_columns["blob_cols_{$model}_{$no_prefix}"] = $blob_cols;
            return $blob_cols;
        }
        $colprefix = $this->colprefix;
        if ( $colprefix ) {
            $colprefix = str_replace( '<model>', $model, $colprefix );
        }
        $blob_cols = [];
        $blob_type = strtolower( $this->blob_type );
        $query = 'SHOW COLUMNS FROM ' . $this->quote_model( $this->prefix . $model );
        $sth = $this->db->query( $query );
        $columns = $sth->fetchAll();
        foreach ( $columns as $column ) {
            if ( $blob_type === strtolower( $column['Type'] ) ) {
                if ( $no_prefix && $colprefix ) {
                    $field = $column['Field'];
                    $field = preg_replace( "/^{$colprefix}/", '', $field );
                    $blob_cols[] = $field;
                } else {
                    $blob_cols[] = $column['Field'];
                }
            }
        }
        $this->show_columns["blob_cols_{$model}_{$no_prefix}"] = $blob_cols;
        $this->set_cache( $cache_path, $blob_cols );
        return $blob_cols;
    }

/**
 * Display message.
 * 
 * @param  string $msg : Display text.
 */
    function debugPrint ( $msg ) {
        if ( php_sapi_name() === 'cli' ) {
            echo $msg, PHP_EOL;
        } else {
            echo '<hr><pre>', htmlspecialchars( $msg ), '</pre><hr>';
        }
    }

/**
 * Custom error handler.
 */
    function errorHandler ( $errno, $errmsg, $f, $line ) {
        $this->clear_query();
        if (!ini_get( 'error_reporting' ) || error_reporting() === 0 ) return;
        $msg = "{$errmsg} ({$errno}) occured( line {$line} of {$f} ).";
        if ( $this->debug == 2 ) $this->debugPrint( $msg );
        if ( $this->logging && !$this->log_path ) $this->log_path = PADODIR . 'log' . DS;
        if ( $this->logging ) error_log( date( 'Y-m-d H:i:s T', time() ) .
            "\t" . $msg . "\n", 3, $this->log_path . 'error.log' );
    }
}

/**
 * PADOBaseModel : PADO Base Model
 *
 * @version    1.0
 * @package    PADO
 * @author     Alfasado Inc. <webmaster@alfasado.jp>
 * @copyright  2017 Alfasado Inc. All Rights Reserved.
 */
class PADOBaseModel extends stdClass {

    public $_model     = '';
    public $_table     = '';
    public $_pado      = null;
    public $_id_column = '';
    public $_colprefix = '';
    public $_scheme    = [];
    public $_driver    = null;
    public $_insert    = false;
    public $_meta      = null;
    public $_relations = null;
    public $_original  = null;
    public $_delete    = false;
    public $_customfields = null;
    public $_apply_revision = null;

    public static $_Model     = '';
    public static $_ID_column = '';
    public static $_Colprefix = '';
    public static $_Scheme    = [];
    public static $_Driver    = null;

    const ILLEGALS = [' ', "`" ,'+', '*', '/', '-', "'", ':', ';', '"', '\\', '|', "\0", "\x00"];
    const RESERVED = [
                       '_model'     => true, '_table'     => true,
                       '_pado'      => true, '_id_column' => true,
                       '_colprefix' => true, '_scheme'    => true,
                       '_driver'    => true, '_engine'    => true,
                       '_original'  => true, '_relations' => true,
                       '_meta'      => true, '_insert'    => true,
                       '_delete'    => true, '_customfields' => true,
                       '_apply_revision' => true
                     ];

/**
 * Call from 'load' method or 'new' method.
 */
    function __construct ( $model = null, $pado = null ) {
        if (! $model ) {
            $model = self::$_Model;
            if (! $model ) return;
            $this->_id_column = self::$_ID_column;
            $colprefix = $this->_colprefix = self::$_Colprefix;
            $this->_scheme = self::$_Scheme;
            $this->_driver = self::$_Driver;
        }
        if (! $pado ) $pado = PADO::get_instance();
        $this->_model = $model;
        $this->_pado = $pado;
        $this->_table = $pado->prefix . $model;
        $this->_driver = $pado->base_model;
        $class = $this->_driver ? $this->_driver : $this;
        if (! isset( $colprefix ) ) {
            $colprefix = $pado->colprefix;
            if ( $colprefix ) {
                $colprefix = str_replace( '<model>', $model, $colprefix );
            }
            $this->_colprefix = $colprefix;
        }
        if (! isset( $pado->scheme[ $model ] ) ) {
            if ( $pado->json_model )
                $class->set_scheme_from_json( $model );
            if (! isset( $pado->scheme[ $model ] ) ) {
                $class->get_scheme( $model, $this->_table, $colprefix );
            }
            if ( $pado->upgrader ) {
                $upgrade = $class->check_upgrade( $model, $this->_table, $colprefix );
                if ( $upgrade !== false ) {
                    $class->upgrade( $this->_table, $upgrade, $colprefix );
                }
            }
        }
        $scheme = isset( $pado->scheme[ $model ] ) ? $pado->scheme[ $model ] : null;
        $this->_scheme = $scheme;
        if (! $this->_id_column ) {
            $primary = ( $scheme && isset( $scheme['indexes'] )
                && isset( $scheme['indexes']['PRIMARY'] ) )
                    ? $colprefix . $scheme['indexes']['PRIMARY']
                    : $colprefix . $pado->id_column;
            $this->_id_column = $primary;
        }
        if ( $pado->caching ) {
            if ( $id_col = $pado->id_column ) {
                if ( $this->$id_col && $pado->select_cols === '*' ) {
                    $pado->cache[ $model ][ $this->$id_col ] = $this;
                }
            }
        }
        if ( $pado->blob2file )
            $this->_original = $this->get_values();
    }

    public function __debugInfo() {
        return $this->get_values();
    }

    public function model ( $_model = null ) {
        if ( $this->has_column( 'model' ) ) {
            $col = $this->_model . '_model';
            $this->$col( $_model );
            return;
        }
        static $model;
        if ( $_model ) $model = $_model;
        return $model;
    }

/**
 * Get instance of class PADO
 * 
 * @return object $pado : Object class PADO.
 */
    function pado () {
        return $this->_pado ? $this->_pado : PADO::get_instance();
    }

/**
 * Get column value without prefix.
 * if $obj->relatedobj_id && exist model relatedobj, return $relatedobj.
 */
    function __get ( $col ) {
        $original = $col;
        $colprefix = $this->_colprefix;
        if (! isset( $this->$col ) && $colprefix )
            $col = $colprefix . $col;
        $pado = $this->_pado;
        if ( isset( $this->$col ) ) {
            $model = $this->_model;
            if ( $pado->blob2file ) {
                $blob_cols = $pado->get_blob_cols( $model );
                if ( count( $blob_cols ) &&
                   ( in_array( $col, $blob_cols ) ||
                     in_array( "{$model}_{$col}", $blob_cols ) ) &&
                     $value = $this->$col ) {
                    if ( is_object( $value ) ) {
                        return $value->value;
                    }
                    if ( strpos( $value, 'a:1:{s:8:"basename";s:' ) === 0 ) {
                        $unserialized = @unserialize( $value );
                        if ( is_array( $unserialized )
                            && isset( $unserialized['basename'] ) ) {
                            $basename = $unserialized['basename'];
                            $blob_path = $pado->blob_path;
                            $blob_path .= $model;
                            $blob = $blob_path . DS . $basename;
                            if ( file_exists( $blob ) ) {
                                return file_get_contents( $blob );
                            } else {
                                // TODO trigger_error
                                return null;
                            }
                        }
                    }
                }
            }
            return $this->$col;
        }
        $col = $original . '_id';
        if ( $this->has_column( $col, true ) && $this->$col ) {
            $scheme = isset( $pado->scheme[ $original ] )
                    ? $pado->scheme[ $original ] : [];
            if ( empty( $scheme ) ) {
                $has_model = $pado->show_tables( $original );
                if ( is_array( $has_model ) && !empty( $has_model ) ) {
                } else {
                    return null;
                }
            }
            $id = (int) $this->$col;
            if ( $id ) {
                $obj = $pado->model( $original )->load( $id );
                return is_object( $obj ) && $obj->id ? $obj : null;
            }
        }
    }

/**
 * Call new method or set column value useing method.
 */
    public function __call ( $method, $args ) {
        if ( $method === 'new' ) // for PHP5.x
            return call_user_func_array( array( $this, '__new' ), $args );
        $reserved_vars = PADOBaseModel::RESERVED;
        if (! isset( $reserved_vars[ $method ] ) ) {
            $pado = $this->_pado;
            if ( strpos( $method, '__' ) === 0 ) {
                $model = $this->_model;
                if ( isset( $pado->callbacks[ $method ][ $model ] ) ) {
                    $callback = ['name' => $method, 'args' => $args ];
                    return $pado->run_callbacks( $callback, $model, $this, true );
                }
            }
            $colprefix = $this->_colprefix;
            if ( $colprefix && strpos( $method, $colprefix ) !== 0 )
                $method = $colprefix . $method;
            $var = isset( $args[0] ) ? $args[0] : null;
            if ( $pado->blob2file ) {
                $blob_cols = $pado->get_blob_cols( $this->_model );
                if ( in_array( $method, $blob_cols ) ) {
                    if ( is_object( $this->$method ) ) {
                        $member = $this->$method;
                    } else {
                        $member = new stdClass();
                        $member->original = $this->$method;
                    }
                    $member->value = $var;
                    $var = $member;
                }
            }
            $this->$method = $var;
        }
    }

/**
 * Create a new object.
 * 
 * @param  array  $params : An array for column names and values for assign.
 * @return object $object : New object.
 */
    function __new ( $params = [], &$changed = false ) {
        $class = get_class( $this );
        if ( $class === 'PADOBaseModel' && $this->_driver ) {
            $model = $this->_driver;
        } else {
            $model = $this;
        }
        $colprefix = $this->_colprefix;
        if ( $params === null ) {
            return $model;
        }
        if (! is_array( $params ) ) {
            return $model;
        }
        foreach ( $params as $key => $value ) {
            if ( is_array( $value ) && isset( $value['BINARY'] ) ) {
                $value = $value['BINARY'];
            }
            if ( $colprefix && strpos( $key, $colprefix ) !== 0 )
                $key = $colprefix . $key;
            if ( $model->$key !== $value ) {
                $changed = true;
            }
            $model->$key = $value;
        }
        return $model;
    }

/**
 * Create a new object without colprefix.
 * 
 * @param  array  $params : An array for column names and values for assign.
 * @return object $object : New object.
 */
    function new_obj ( $params = [], &$changed = false ) {
        $class = get_class( $this );
        if ( $class === 'PADOBaseModel' && $this->_driver ) {
            $model = $this->_driver;
        } else {
            $model = $this;
        }
        if ( $params === null ) {
            return $model;
        }
        if (! is_array( $params ) ) {
            return $model;
        }
        foreach ( $params as $key => $value ) {
            if ( is_array( $value ) && isset( $value['BINARY'] ) ) {
                $value = $value['BINARY'];
            }
            if ( $model->$key !== $value ) {
                $model->$key = $value;
                $changed = true;
            }
        }
        return $model;
    }

/**
 * Load object.
 * 
 * @param  mixed  $terms   : Numeric ID or the hash should have keys matching column names
 *                           and the values are the values for that column.
 * @param  array  $args    : Search options.
 * @param  mixed  $cols    : Get columns from records. Comma-separated text or '*' or array.
 * @param  string $extra   : String to add to the WHERE statement.
 *                           Insufficient care is required for injection.
 * @param  array  $ex_vars : Placeholders for $extra statement.
 * @return mixed  $objects : An array of objects or single object(Specified Numeric ID).
 */
    function load ( $terms = [], $args = [], $cols = '', $extra = '', $ex_vars = [] ) {
        $pado = $this->pado();
        $pado->select_cols = null;
        if ( $terms === 0 ) return null; // TODO Is id=0 possible?
        if (!$terms ) $terms = [];
        // if ( isset( $pado->methods['load'] ) )
        //     return $this->_driver->load( $terms, $args, $cols );
        $model = $this->_model;
        $path = null;
        $illegals = ILLEGAL_CHARS;
        if (! is_array( $cols ) ) {
            if ( $cols === '*' ) {
            } elseif (! $cols ) {
                $cols = '*';
            } else {
                $cols = str_replace( $illegals, '', $cols );
            }
        }
        $caching = false;
        $is_numeric = is_numeric( $terms );
        $is_string = false;
        $blob_cols = [];
        $cache_key = $pado->caching || $pado->query_cache
                   ? $pado->make_cache_key( $model, $terms, $args, $cols, $extra, $ex_vars )
                   : null;
        if ( $pado->caching ) {
            if (! isset( $pado->cache[ $model ] ) ) {
                $pado->cache[ $model ] = [];
            } else {
                if ( is_numeric( $terms ) ) {
                    if ( array_key_exists( $terms, $pado->cache[ $model ] ) ) {
                        // The isset does not detect null.
                        return $pado->cache[ $model ][ $terms ];
                    }
                }
                if ( isset( $pado->cache[ $model ][ $cache_key ] ) ) {
                    return $pado->cache[ $model ][ $cache_key ];
                }
            }
        }
        if ( $pado->query_cache && !isset( $args['load_iter'] ) &&
            !in_array( $model, $pado->not_cache ) ) {
            if (!$pado->blob2file && !$pado->cache_driver ) {
                $blob_cols = $pado->get_blob_cols( $model );
            }
            if ( !$is_numeric ) {
                $path = $model . DS . $cache_key;
                $data = $pado->get_cache( $path );
                if ( is_array( $data ) ) {
                    if ( isset( $args['count_group_by'] ) ) {
                        $pado->cache[ $model ][ $cache_key ] = $data;
                        return $data;
                    } else if ( isset( $args['count'] ) ) {
                        $cnt = $pado->model( $model )->new( $data[0] );
                        $pado->cache[ $model ][ $cache_key ] = $cnt;
                        return $cnt;
                    }
                    $objects = [];
                    if ( is_string( $terms ) && stripos( $terms, 'SELECT DISTINCT ' ) === 0 ) {
                        $is_string = true;
                        foreach ( $data as $arr ) {
                            if (! empty( $blob_cols ) ) {
                                foreach ( $blob_cols as $col ) {
                                    if ( isset( $arr[ $col ] ) && $arr[ $col ] ) {
                                        $arr[ $col ] = base64_decode( $arr[ $col ] );
                                    }
                                }
                            }
                            $objects[] = $pado->model( $model )->new_obj( $arr );
                        }
                    } else {
                        foreach ( $data as $arr ) {
                            if (! empty( $blob_cols ) ) {
                                foreach ( $blob_cols as $col ) {
                                    if ( isset( $arr[ $col ] ) && $arr[ $col ] ) {
                                        $arr[ $col ] = base64_decode( $arr[ $col ] );
                                    }
                                }
                            }
                            $objects[] = $pado->model( $model )->__new( $arr );
                        }
                    }
                    $pado->cache[ $model ][ $cache_key ] = $objects;
                    return $objects;
                }
                $caching = true;
            } else if ( $is_numeric ) {
                $path = $model . DS . 'objects' . DS . $terms;
                $data = $pado->get_cache( $path );
                if ( isset( $data[0] ) ) {
                    $data = $data[0];
                    if (! empty( $blob_cols ) ) {
                        foreach ( $blob_cols as $col ) {
                            if ( isset( $data[ $col ] ) && $data[ $col ] ) {
                                $data[ $col ] = base64_decode( $data[ $col ] );
                            }
                        }
                    }
                    $obj = $pado->model( $model )->new( $data );
                    if ( $pado->caching ) {
                        $pado->cache[ $model ][ $cache_key ] = $obj;
                    }
                    return $obj;
                }
                if ( $cols === '*' ) $caching = true;
            }
        }
        $table = $this->_table;
        $colprefix = $this->_colprefix;
        if (! $pado->upgrader && ! isset( $pado->scheme[ $model ] ) ) {
            $this->get_scheme( $model, $table, $colprefix );
        }
        $scheme = isset( $pado->scheme[ $model ] ) ?
            $pado->scheme[ $model ]['column_defs'] : null;
        if ( $scheme === null && $pado->json_model ) {
            $_scheme = $this->set_scheme_from_json( $model );
            if ( is_array( $_scheme ) && isset( $_scheme['column_defs'] ) ) {
                $scheme = $_scheme['column_defs'];
            }
        }
        $use_index = '';
        if ( isset( $args['index'] ) ) {
            $use_index = $pado->prefix . $colprefix . $args['index'];
            unset( $args['index'] );
            $use_index = " USE INDEX({$use_index}) ";
        }
        $id_column = $this->_id_column;
        if ( is_array( $args ) && isset( $args['and_or'] ) ) $and_or = $args['and_or'];
        $extra_and_or = 'AND';
        if ( isset( $and_or ) ) {
        if ( is_array( $and_or ) ) list( $and_or, $extra_and_or ) = $and_or;
            $and_or = strtoupper( $and_or );
            $extra_and_or = strtoupper( $extra_and_or );
        }
        if (! isset( $and_or ) || ( $and_or !== 'AND' && $and_or !== 'OR' ) )
            $and_or = 'AND';
        if (! isset( $extra_and_or ) || ( $extra_and_or !== 'AND' &&
            $extra_and_or !== 'OR' ) ) $extra_and_or = 'AND';
        $model = str_replace( $illegals, '', $model );
        if (! $model ) return $is_numeric ? null : [];
        if (! $cols ) return $is_numeric ? null : [];
        if ( $cols !== '*' ) {
            $columns = is_array( $cols ) ? $cols : preg_split( '/\s*,\s*/', $cols );
            $columns = array_unique( $columns );
            $this->_invalid_cols = [];
            array_walk( $columns, function( &$col, $num, $params ) {
                list( $pfx, $scheme ) = $params;
                $orig_col = $col;
                if ( strpos( $col, $pfx ) !== 0 ) {
                    $col = $pfx . $col;
                } else {
                    $orig_col = preg_replace( "/^$pfx/", '', $orig_col );
                }
                if ( $scheme && !$this->has_column( $orig_col, true ) ) {
                    $col = '';
                    if ( $orig_col ) {
                        $this->_invalid_cols[] = $orig_col;
                    }
                }
            }, [ $colprefix, $scheme ] );
            $columns = array_filter( $columns, 'strlen' );
            if (! empty( $this->_invalid_cols ) ) {
                $_invalid_cols = implode( ',', $this->_invalid_cols );
                $message =
                "PADOBaseModelException: unknown column '{$_invalid_cols}' for model '{$model}'";
                $pado->errors[] = $message;
                trigger_error( $message );
                $cols = '*';
            } else {
                $cols = join( ',', $columns );
            }
            unset( $this->_invalid_cols );
            if (! $cols ) $cols = '*';
        }
        $regex = '/(=|>=|<=|<|>|BETWEEN|NOT\sBETWEEN|BINARY|LIKE|IN|NOT\sIN|NOT\sLIKE|'
               . 'AND|OR|IS\sNULL|IS\sNOT\sNULL|\!=)/i';
        $vals = [];
        $stms = [];
        $distinct = '';
        $count = '';
        $count_group_by = '';
        $group_by = '';
        $in_join = false;
        $join_stmt = '';
        $load_iter = false;
        $add_where = false;
        $method = isset( $args['get_by_key'] ) ? 'get_by_key' :'load';
        if ( is_array( $args ) && !empty( $args ) ) {
            if ( isset( $args['distinct'] ) || isset( $args['unique'] ) )
                $distinct = 'DISTINCT ';
            if ( isset( $args['load_iter'] ) || isset( $args['load_iter'] ) ) {
                $load_iter = true;
                $method = 'load_iter';
                unset( $args['load_iter'] );
            }
            $args = array_change_key_case( $args, CASE_LOWER );
            if ( isset( $args['count'] ) && $args['count'] ||
                isset( $args['count_group_by'] ) && $args['count_group_by'] ) {
                if ( isset( $args['count'] ) && $args['count'] !== true ) {
                    $count_col = $colprefix . $args['count'];
                } else {
                    $count_col = $id_column;
                }
                if ( is_string( $cols ) && $cols === $colprefix . 'id' ) {
                    $distinct = true;
                }
                if ( $distinct ) {
                    $count = "COUNT(DISTINCT {$count_col}) ";
                    $distinct = '';
                } else {
                    $count = "COUNT({$count_col}) ";
                }
                $method = isset( $args['count'] ) ? 'count' : 'count_group_by';
            }
            if ( isset( $args['count_group_by'] ) && isset( $args['group'] ) ) {
                $group_binary = false;
                $columns = $args['group'];
                foreach ( $columns as $idx => $col ) {
                    $col = strpos( $col, $colprefix ) !== 0 ? $colprefix . $col : $col;
                    if ( is_string( $idx ) && strtoupper( $idx ) === 'BINARY' ) {
                        $col = 'BINARY ' . $col;
                        $group_binary = $col;
                    }
                    $columns[ $idx ] = $col;
                }
                $count_group_by = join( ',', $columns );
                $group_by = " GROUP BY {$count_group_by} ";
                if ( isset( $args['having'] ) ) {
                    $having = $args['having'];
                    if ( is_array( $having ) ) {
                        $havingCol = array_keys( $having )[0];
                        $hav_op = array_keys( $having[ $havingCol ] )[0];
                        $comp = (int)$having[ $havingCol ][ $hav_op ];
                        if ( preg_match( $regex, $hav_op, $matchs ) ) {
                            $hav_op = $matchs[1];
                            $group_by .= "HAVING COUNT({$colprefix}{$havingCol}) {$hav_op} {$comp} ";
                        }
                        if ( isset( $args['direction'] ) ) {
                            $g_direction = $args['direction'];
                            $g_direction = stripos( $g_direction, 'desc' ) === 0 ? 'DESC' : 'ASC';
                            $group_by .= "ORDER BY COUNT({$colprefix}{$havingCol}) {$g_direction} ";
                        }
                    }
                }
                $count_group_by .= ',';
            }
            if ( isset( $args['join'] ) ) {
                $join_terms = [];
                $join_cols  = '';
                list( $join, $col ) = $args['join'];
                if ( isset( $args['join'][2] ) ) {
                    $join_terms = $args['join'][2];
                }
                if ( isset( $args['join'][3] ) ) {
                    $join_cols = $args['join'][3];
                }
                $join_pfx = $join;
                $col2 = $col;
                $join_type = 'JOIN';
                if ( is_array( $col ) ) {
                    if ( isset( $col[2] ) ) $join_type = strtoupper( $col[2] );
                    list( $col, $col2 ) = $col;
                    $join_types = ['JOIN', 'INNER JOIN', 'RIGHT OUTER JOIN', 'LEFT OUTER JOIN'];
                    if (! in_array( $join_type, $join_types ) ) {
                        $join_type = 'JOIN';
                    }
                }
                if (!isset( $pado->scheme[ $join ] ) && $pado->json_model ) {
                    $this->set_scheme_from_json( $join );
                }
                if (!isset( $pado->scheme[ $join ] ) ) {
                    $_colprefix = $pado->colprefix;
                    $_table = $pado->prefix . $join;
                    $_colprefix = str_replace( '<model>', $join, $_colprefix );
                    $this->get_scheme( $join, $pado->prefix . $join, $_colprefix );
                }
                $join_scheme = isset( $pado->scheme[ $join ] ) ?
                    $pado->scheme[ $join ]['column_defs'] : null;
                if (! $pado->model( $join )->has_column( $col2, true ) ) {
                    $message =
                    "PADOBaseModelException: unknown column '{$col2}' for model '{$join}'";
                    $pado->errors[] = $message;
                    trigger_error( $message );
                    return false;
                }
                if ( isset( $pado->show_columns[ $join ] ) ) {
                    $join_columns = $pado->show_columns[ $join ];
                    foreach ( $join_scheme as $join_col => $join_data ) {
                        if (! in_array( "{$join}_{$join_col}", $join_columns ) ) {
                            unset( $join_scheme[ $join_col ] );
                        }
                    }
                }
                if ( strpos( $col, $colprefix ) !== 0 )
                    $col = $colprefix . $col;
                if ( $cols !== '*' ) {
                    if ( isset( $columns ) ) {
                        array_walk( $columns, function( &$v, $num, $table = null ){
                            $v = $table . '.' . $v;
                        }, $table );
                        $cols = join( ',', $columns );
                    }
                } else {
                    $cols = $table . '.*';
                }
                if ( $count ) $cols = '';
                $join_prefix = $pado->colprefix;
                $join_prefix =
                    str_replace( '<model>', $join, $join_prefix );
                if ( $pado->prefix && strpos( $join, $pado->prefix ) !== 0 )
                    $join = $pado->prefix . $join;
                if ( $join && $cols ) {
                    if ( $join_cols && $join_cols == '*' ) {
                        $join_cols = "{$join}.*";
                    } else if ( $join_cols ) {
                        $join_cols = preg_split( '/\s*,\s*/', $join_cols );
                        $joinModel = $pado->model( $join_pfx );
                        $_join_cols = [];
                        foreach ( $join_cols as $join_col ) {
                            $join_col = preg_replace( "/^$join_pfx/", '', $join_col );
                            if ( $joinModel->has_column( $join_col, true ) ) {
                                $_join_cols[] = "{$join}.{$join_pfx}_$join_col";
                            }
                        }
                        $join_cols = join( ',', $_join_cols );
                        if (! $join_cols ) {
                            $join_cols = "{$join}.*";
                        }
                    } else {
                        $join_cols = "{$join}.*";
                    }
                    $cols .= ",{$join_cols}";
                }
                if ( $cols ) $cols .= ' ';
                $sql = "SELECT {$count_group_by}{$count}{$distinct}{$cols}FROM {$table}"
                     . " {$join_type} $join ON {$table}.{$col}={$join}.{$join_prefix}{$col2} ";
                if ( is_array( $join_terms ) && count( $join_terms ) ) {
                    $default_ts = $pado->default_ts;
                    foreach ( $join_terms as $join_key => $join_value ) {
                        $op = '=';
                        if (!isset( $join_scheme[ $join_key ] ) ) continue;
                        $type = $join_scheme[ $join_key ]['type'];
                        $size = isset( $join_scheme[ $join_key ]['size'] ) ? $join_scheme[ $join_key ]['size'] : null;
                        $binary = '';
                        if ( is_array( $join_value ) ) {
                            $op = key( $join_value );
                            if ( $op === 'BINARY' ) {
                                $join_value = $join_value['BINARY'];
                                if (! is_array( $join_value ) ) {
                                    continue;
                                }
                                $op = key( $join_value );
                                $binary = 'BINARY ';
                            }
                            if (! preg_match( $regex, $op, $matchs ) ) {
                                continue;
                            } else {
                                $cond = $join_value[ $op ];
                                if ( stripos( $op, 'BETWEEN' ) !== false || $op === 'IN' || $op === 'NOT IN' ) {
                                    if (! is_array( $cond ) ) {
                                        continue;
                                    }
                                    if ( stripos( $op, 'BETWEEN' ) !== false ) {
                                        if ( count( $cond ) !== 2 ) {
                                            continue;
                                        }
                                        list( $from, $to ) = $cond;
                                        $this->cast_value( $from, $type, $size );
                                        $this->cast_value( $to, $type, $size );
                                        $vals[] = $from;
                                        $vals[] = $to;
                                        if ( $join_stmt ) $join_stmt .= ' AND ';
                                        $join_stmt .= "{$binary}{$join_pfx}_{$join_key} {$op} ? AND ? ";
                                    } else {
                                        $placeholder = str_repeat( '?,', count( $cond ) );
                                        $placeholder = '(' . rtrim( $placeholder, ',' ) . ')';
                                        if ( $join_stmt ) $join_stmt .= ' AND ';
                                        $join_stmt .= "{$binary}{$join_pfx}_{$join_key} {$op} {$placeholder}";
                                        foreach ( $cond as $idx => $cond_v ) {
                                            $this->cast_value( $cond_v, $type, $size );
                                            $cond[ $idx ] = $cond_v;
                                        }
                                        $vals = array_merge( $vals, $cond );
                                    }
                                    continue;
                                }
                            }
                        }
                        $this->cast_value( $join_value, $type, $size );
                        if ( $join_stmt ) $join_stmt .= ' AND ';
                        $join_stmt .= "{$binary}{$join_pfx}_{$join_key} {$op} ?";
                        $vals[] = $join_value;
                    }
                    $sql .= "{$use_index}WHERE {$join_stmt} ";
                    $add_where = true;
                }
                $in_join = true;
            }
        }
        if (! isset( $sql ) || ! $sql ) {
            if ( $count ) $cols = '';
            $sql = "SELECT {$count_group_by}{$count}{$distinct}{$cols}"
                 . " FROM {$table} ";
        }
        $extra_stms = [];
        $extra_vals = [];
        $has_stmt = true;
        if ( is_array( $terms ) && empty( $terms ) ) {
            if (! $add_where ) {
                $sql .= "{$use_index}WHERE 1=?";
                $vals[] = 1;
            }
            $add_where = true;
            if ( isset( $args['count_group_by'] ) && $extra ) {
                $sql .= " $extra ";
                $extra = '';
            }
        } elseif ( is_array( $terms ) && ! empty( $terms ) ) {
            $has_stmt = false;
            foreach ( $terms as $key => $cond ) {
                $orig_key = $key;
                if ( $colprefix && strpos( $key, $colprefix ) !== 0 ) {
                    $key = $colprefix . $key;
                } else {
                    $orig_key = preg_replace( "/^$colprefix/", '', $orig_key );
                }
                if ( $scheme && !isset( $scheme[ $orig_key ] ) )
                    continue;
                list( $op, $v ) = ['=', $cond ];
                if ( is_array( $cond ) ) {
                    $op = key( $cond );
                    $v  = isset( $cond[ $op ] ) ? $cond[ $op ] : '';
                    $op = strtoupper( $op );
                }
                if ( $cond === null ) $cond = [];
                if ( ( ( is_string( $cond ) || is_numeric( $cond ) )
                    || ( is_array( $cond ) && count( $cond ) === 1 ) )
                    || ( stripos( $op, 'BETWEEN' ) !== false || $op === 'IN' || $op === 'NOT IN' ) ) {
                    if ( preg_match( $regex, $op, $matchs ) ) {
                        $orig_op = $op;
                        $op = strtoupper( $matchs[1] );
                        if ( $orig_op == 'BINARY' ) {
                            $stms[] = " {$key}= BINARY ?";
                            $vals[] = $v;
                        } else if ( stripos( $op, 'NULL' ) !== false ) {
                            $stms[] = " {$key} {$op} ";
                        } elseif ( is_array( $v ) &&
                            stripos( $op, 'BETWEEN' ) !== false ) {
                            list( $start, $end ) = $v;
                            $stms[] = " {$key} {$op} ? AND ? ";
                            $vals[] = $start;
                            $vals[] = $end;
                        } else {
                            $col_type = $scheme[ $orig_key ]['type'];
                            if ( $op === 'IN' && is_array( $v ) && ! empty( $v ) ) {
                                $stms[] = $this->in_stmt( $key, $v, $col_type );
                            } else if ( $op === 'NOT IN' && is_array( $v ) && ! empty( $v ) ) {
                                $stms[] = $this->in_stmt( $key, $v, $col_type, 'NOT IN' );
                            } else {
                                if ( $op == 'AND' || $op == 'OR' ) {
                                    // if (array_values($arr) === $arr) {
                                    // if ( is_array( $v ) ) {
                                    if ( array_values( $v ) !== $v ) {
                                        $op = key( $v );
                                        $v = $v[ $op ];
                                        if ( preg_match( $regex, $op, $matchs ) ) {
                                            $op = strtoupper( $matchs[1] );
                                            if ( $op == 'AND' || $op == 'OR' ) continue;
                                        } else {
                                            continue;
                                        }
                                    } else if (! is_array( $v ) ) {
                                        $op = '=';
                                    }
                                    if ( stripos( $op, 'NULL' ) !== false ) {
                                        $extra_stms[] = " {$key} {$op} ";
                                    } elseif ( is_array( $v ) &&
                                        stripos( $op, 'BETWEEN' ) !== false ) {
                                        list( $start, $end ) = $v;
                                        $extra_stms[] = " {$key} {$op} ? AND ? ";
                                        $extra_vals[] = $start;
                                        $extra_vals[] = $end;
                                    } else {
                                        if ( $op === 'IN' && is_array( $v )
                                                                    && ! empty( $v ) ) {
                                            $extra_stms[] =
                                                    $this->in_stmt( $key, $v, $col_type );
                                        } else {
                                            if ( is_array( $v ) )
                                          {
                                            if ( array_values( $v ) === $v ) {
                                                $_stmts = [];
                                                foreach ( $v as $cnd ) {
                                                    $_op = key( $cnd );
                                                    $_val = $cnd[ $_op ];
                                                    if ( preg_match
                                                        ( $regex, $_op, $matchs ) ) {
                                                        $_op = strtoupper( $matchs[1] );
                                                        if ( stripos( $_op, 'NULL' ) !== false && $_val ) {
                                                            $_stmts[] = " {$key} {$_op} ";
                                                        } else {
                                                            $_stmts[] = " {$key} {$_op} ? ";
                                                            $extra_vals[] = $_val;
                                                        }
                                                    }
                                                }
                                                $extra_stms[] =
                                                    '(' . join( " {$op} ", $_stmts ) . ')';
                                            }
                                          } else {
                                                $extra_stms[] = " {$key} {$op} ? ";
                                                $extra_vals[] = $v;
                                          }
                                        }
                                    }
                                } else {
                                    if ( is_array( $v ) ) {
                                        if ( key( $v ) == 'AND' || key( $v ) == 'OR' ) {
                                            $_cnd = $v[ key( $v ) ];
                                            $_array_stmt = [];
                                            foreach ( $_cnd as $_ph ) {
                                                $_array_stmt[] = " {$key} {$op} ? ";
                                                $vals[] = $_ph;
                                            }
                                            $add_str = implode( key( $v ), $_array_stmt );
                                            $stms[] = " ( $add_str ) ";
                                        }
                                    } else {
                                        $stms[] = " {$key} {$op} ? ";
                                        $vals[] = $v;
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if ( is_array( $cond ) ) {
                        $conds = array_values( $cond );
                        $stm = '';
                        foreach ( $conds as $k => $v ) {
                            $op = is_array( $v ) ? key( $v ) : '=';
                            $var = is_array( $v ) ? $v[ $op ] : $v;
                            if ( preg_match( $regex, $op, $matchs ) ) {
                                $op = strtoupper( $matchs[ 1 ] );
                                if ( is_array( $var ) ) {
                                    $var = array_change_key_case( $var, CASE_UPPER );
                                    $_and_or = strtoupper( key( $var ) );
                                    $_and_or = ltrim( $and_or, '-' );
                                    if ( $_and_or !== 'AND' && $_and_or !== 'OR' ) {
                                        continue;
                                    }
                                    if (! isset( $var[ $_and_or ] ) ) {
                                        if ( $_and_or == 'AND' && isset( $var['OR'] ) ) {
                                            $_and_or = 'OR';
                                        } else if ( $_and_or == 'OR' && isset( $var['AND'] ) ) {
                                            $_and_or = 'AND';
                                        }
                                    }
                                    $var = isset( $var[ $_and_or ] ) ? $var[ $_and_or ] : '';
                                } else {
                                    $_and_or = 'OR';
                                    // $_and_or = 'AND';
                                }
                                if ( $stm ) $stm .= $_and_or;
                                if ( stripos( $op, 'NULL' ) !== false ) {
                                    $stm .= " {$key} {$op}";
                                } elseif ( is_array( $var ) &&
                                    stripos( $op, 'BETWEEN' ) !== false ) {
                                    list( $start, $end ) = $var;
                                    $stm .= " {$key} {$op} ? AND ? ";
                                    $vals[] = $start;
                                    $vals[] = $end;
                                } else {
                                    $stm .= " {$key} {$op} ? ";
                                    $vals[] = $var;
                                }
                            }
                        }
                        if ( $stm ) {
                            $stm = " ({$stm}) ";
                            $stms[] = $stm;
                        }
                    }
                }
            }
            if ( count( $stms ) ) {
                // if ( $in_join ) $sql .= ' AND ';
                if (! $add_where ) {
                    $sql .= "{$use_index}WHERE ";
                } else {
                    $sql .= "$and_or ";
                }
                $sql .= '(' . join( " {$and_or} ", $stms ) . ')';
                $add_where = true;
            }
            if (! empty( $extra_stms ) ) {
                if ( $add_where ) {
                    $sql .= " {$extra_and_or} ";
                } else {
                    $sql .= "{$use_index}WHERE";
                }
                $array_and_or = isset( $args['array_and_or'] )
                              ? strtoupper( $args['array_and_or'] ) : $extra_and_or;
                $array_and_or = $array_and_or == 'OR' ? 'OR' : 'AND';
                $sql .= ' (' . join( " {$array_and_or} ", $extra_stms ) . ')';
                $vals = array_merge( $vals, $extra_vals );
            }
            if ( isset( $args['count_group_by'] ) && $extra ) {
                $sql .= $extra;
                $extra = '';
            }
        } elseif ( $is_numeric ) {
            $sql .= "{$use_index}WHERE {$id_column}=?";
            $vals[] = (int) $terms;
        } elseif ( is_string( $terms ) ) {
            $sql = $terms;
            $vals = is_array( $args ) ? $args : $vals;
            $is_string = true;
        }
        $sql .= $group_by;
        if ( $extra ) $sql .= " {$extra} ";
        if (!$count || ( isset( $args['count_group_by'] ) && $args['count_group_by'] ) ) {
            $opt = '';
            if ( is_array( $args ) && !empty( $args ) ) {
                $direction = 'ASC';
                foreach ( $args as $key => $arg ) {
                    // $key = strtolower( $key );
                    if ( $key === 'sort' || $key === 'order_by' ) {
                        if ( is_string( $arg ) && !$this->has_column( $arg, true ) ) {
                            $opt = null;
                        } else {
                            $opt = $arg;
                        }
                    } else if ( $key === 'limit' ) {
                        $limit = (int) $arg;
                    } else if ( $key === 'offset' ) {
                        $offset = (int) $arg;
                    } else if ( $key === 'direction' ) {
                        if ( is_string( $arg ) ) {
                            $direction = strtoupper( $arg );
                        } else if ( is_array( $arg ) ) {
                            // Invalid Parameter.
                            $direction = array_shift( $arg );
                        }
                    }
                }
                if ( is_string( $direction ) && $direction ) {
                    $direction = stripos( $direction, 'ASC' ) === 0 ? 'ASC' : 'DESC';
                } else {
                    $direction = 'ASC';
                }
                if ( $sql && $group_by && isset( $args['sort'] ) &&
                   ( strtolower( $args['sort'] ) == 'count' || strtolower( $args['sort'] ) == 'name' )
                    && stripos( $extra, 'ORDER BY' ) === false ) {
                    $_order_by = rtrim( $count_group_by, ',' );
                    if ( strtolower( $args['sort'] ) == 'count' ) {
                        if (strpos( $_order_by, ',' ) !== false ) {
                            $_order_by = explode( ',', $_order_by )[1];
                        }
                        $sql .= " ORDER BY COUNT({$_order_by}) $direction";
                    } else {
                        $sql .= " ORDER BY {$_order_by} $direction";
                    }
                } else if ( $opt ) {
                    if ( $pado->strict_offset ) {
                        if ( isset( $limit ) && $limit >= 0 && is_string( $opt ) && $opt !== $pado->id_column ) {
                            $opt = [ $opt => $direction, $pado->id_column => $direction ];
                        }
                    }
                    if ( is_string( $opt ) && $this->has_column( $opt, true ) ) {
                        if ( $colprefix && strpos( $opt, $colprefix ) !== 0 )
                            if ( ( $colprefix && !$in_join )
                                || ( $in_join && strpos( $opt, '.' ) === false ) )
                                    $opt = $colprefix . $opt;
                        if ( isset( $group_binary ) && $group_binary && "BINARY {$opt}" == $group_binary ) {
                            $opt = $group_binary;
                        }
                        $opt = " ORDER BY {$opt} ";
                        $opt .= $direction . ' ';
                    } else if ( is_array( $opt ) ) {
                        if ( array_values( $opt ) === $opt ) {
                            $max_cond = count( $opt );
                            $conditions = [];
                            for ( $i = 0; $i < $max_cond; $i++ ) {
                                if ( is_string( $direction ) ) {
                                    $conditions[ $opt[$i] ] = $direction;
                                } else if ( is_array( $conditions ) && isset( $direction[$i] ) ) {
                                    $conditions[ $opt[$i] ] = $direction[$i];
                                }
                            }
                            $opt = $conditions;
                        }
                        if ( $pado->strict_offset && !empty( $opt ) ) {
                            if ( isset( $limit ) && $limit >= 0 && !isset( $opt[ $pado->id_column ] ) ) {
                                $opt[ $pado->id_column ] = $opt[ key( $opt ) ];
                            }
                        }
                        $conds = [];
                        foreach ( $opt as $sort_key => $direction ) {
                            if (! $this->has_column( $sort_key, true ) ) continue;
                            if ( $colprefix && strpos( $sort_key, $colprefix ) !== 0 )
                                if ( ( $colprefix && !$in_join )
                                    || ( $in_join && strpos( $sort_key, '.' ) === false ) )
                                        $sort_key = $colprefix . $sort_key;
                            $direction = stripos( $direction, 'ASC' ) === 0 ? 'ASC' : 'DESC';
                            $conds[] = "{$sort_key} {$direction}";
                        }
                        $opt = !empty( $conds ) ? ' ORDER BY ' . join( ',', $conds ) : '';
                    }
                }
                if ( isset( $limit ) && $limit >= 0 ) {
                    if (! isset( $offset ) ) $offset = 0;
                    if ( $offset < 0 ) {
                        return [];
                    }
                    $opt .= $offset ? " LIMIT {$limit} OFFSET {$offset} " : " LIMIT {$limit}";
                }
            }
            $sql .= $opt;
        } else if ( isset( $args['count'] ) && $args['count'] === true && isset( $args['limit'] ) ) {
            $limit = (int) $args['limit'];
            if ( $limit && $limit >= 0 ) {
                $sql .= " LIMIT {$limit}";
            }
        }
        if ( is_array( $ex_vars ) && count( $ex_vars ) ) {
            $vals = array_merge( $vals, $ex_vars );
        }
        if ( $add_where && preg_match( '/^[^\']*?\sWHERE\s{1,}?AND\s/si', $sql ) ) {
            $sql = preg_replace( '/(^[^\']*?\sWHERE\s{1,}?)(AND\s)/si', '$1 1=1 $2', $sql );
        } else if ( $add_where && preg_match( '/^[^\']*?\sWHERE\s{1,}?OR\s/si', $sql ) ) {
            $sql = preg_replace( '/(^[^\']*?\sWHERE\s{1,}?)(OR\s)/si', '$1 1=1 $2', $sql );
        } else if (! $add_where && strpos( $sql, ' WHERE ' ) === false && strpos( $sql, ' AND ' ) !== false ) {
            if ( preg_match( "/^SELECT.*?\sFROM\s*{$pado->prefix}[^\s]+\s+AND\s/si", $sql, $matchs ) ) {
                // Syntax error or access violation.
                $sql = preg_replace( "/(^SELECT.*?\sFROM\s*{$pado->prefix}[^\s]+\s+)(AND\s)/si", '$1 WHERE 0=1 $2', $sql );
            }
        }
        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
        if ( $pado->debug === 3 ) var_dump( $vals );
        if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
            $pado->reconnect();
        }
        if (! $is_string ) $pado->select_cols = $cols;
        $pdo = $pado->db;
        $callback = ['name' => 'pre_load', 'sql' => $sql,
                     'values' => $vals, 'method' => $method ];
        $pado->run_callbacks( $callback, $model, $this );
        $sql = $callback['sql'];
        $sth = $pdo->prepare( $sql );
        if (! $count_group_by ) {
            $class = class_exists( $model, false ) ? $model
            : ( $this->_driver
            ? get_class( $this->_driver ) : 'PADOBaseModel' );
            $sth->setFetchMode( PDO::FETCH_CLASS, $class );
            self::$_Model = $this->_model;
            self::$_ID_column = $this->_id_column;
            self::$_Colprefix = $this->_colprefix;
            self::$_Scheme = $this->_scheme;
            self::$_Driver = $this->_driver;
        }
        try {
            if ( $pado->debug == 4 ) {
                $start = microtime( true );
            }
            $sth->execute( $vals );
            if ( $pado->debug == 4 ) {
                $end = microtime( true ) - $start;
                $end = round( $end, 3 );
                $query = !empty( $vals )
                             ? $sql . ' / values = ' . join( ', ', $vals ) : $sql;
                if ( $end ) {
                    $query .= "(It took {$end} seconds.)";
                }
                $pado->queries[] = $query;
            }
            ++$pado->query_cnt;
            if ( $count && !$count_group_by ) {
                $count = (int) $sth->fetchColumn();
                $sth = null;
                if ( $pado->caching ) {
                    $pado->cache[ $model ][ $cache_key ] = $count;
                }
                if ( $caching && !in_array( $model, $pado->not_cache ) ) {
                    $pado->set_cache( $path, $count );
                }
                $pado->select_cols = null;
                return $count;
            }
            if ( $load_iter ) {
                return $sth;
            }
            $array = null;
            if (! $pado->query_cache || in_array( $model, $pado->not_cache ) ) {
                $objects = $sth->fetchAll();
            } else {
                $objects = [];
                $array = [];
                while ( $result = $sth->fetch() ) {
                    $objects[] = $result;
                    if ( $caching && ! empty( $blob_cols ) ) {
                        $result = is_object( $result ) ? $result->get_values() : $result;
                        foreach ( $blob_cols as $col ) {
                            if ( isset( $result[ $col ] ) ) {
                                $result[ $col ] = base64_encode( $result[ $col ] );
                            }
                        }
                        $array[] = $result;
                    } else {
                        $array[] = is_object( $result ) ? $result->get_values() : $result;
                    }
                }
                if ( $cols === '*' ) {
                    $pado->set_cache( $path, $array );
                }
                unset( $array );
            }
            $pado->select_cols = null;
            if ( $is_numeric ) {
                $obj = isset( $objects[0] ) ? $objects[0] : null;
                if ( $pado->caching && $cols === '*' ) {
                    if ( $obj ) {
                        $pado->cache[ $model ][ $obj->id ] = $obj;
                    } else if ( is_numeric( $terms ) ) {
                        $pado->cache[ $model ][ $terms ] = null;
                    }
                }
                unset( $sth );
                return $obj;
            }
            if ( $pado->caching ) {
                $pado->cache[ $model ][ $cache_key ] = $objects;
            }
            unset( $sth );
            return $objects;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $pado->errors[] = $message;
            $pado->clear_query();
            trigger_error( $message );
            return $this->retry( $pado, $sth, $message, 'load', $terms, $args, $cols, $extra, $ex_vars );
        }
    }

    function cast_value ( &$value, $type, $size ) {
        $pado = $this->pado();
        switch ( true ) {
        case ( strpos( $type, 'int' ) !== false ):
            $value = (int) $value;
            break;
        case ( $type === 'float' || $type === 'double' || strpos( $type, 'decimal' ) === 0 ):
            $value = (float) $value;
        case ( strpos( $type, 'date' ) !== false ):
            if ( $value = $this->db2ts( $value ) ) {
                $default_ts = $pado->default_ts;
                if ( $default_ts &&
                  ( ( $value < 10000101000000 ) || ( $value > 99991231235959 ) ) ) {
                    if ( $default_ts === 'CURRENT_TIMESTAMP') {
                        $value = date( 'YmdHis' );
                    } else {
                        $value = $default_ts;
                    }
                }
                $value = $this->ts2db( $value );
            } else {
                $value = null;
            }
            break;
        case ( $type === 'time' && $value ):
            $value = $this->time2db( $value );
            break;
        case ( $type === 'year' ):
            $value = (string) $value;
            $value = preg_replace( '/[^0-9]+/', '', $value );
            if ( strlen( $value ) === 2 ) {
                $value = ( $value > 69 ) ? '19' . $value : '20' . $value;
            } else {
                $val = substr( $this->ts2db( $value ), 0, 4 );
            }
            $value = (int) $value;
            break;
        case ( $type === 'string' && $size ):
            $value = (string) $value;
            if ( mb_strlen( $value ) > $size )
                $value = mb_substr( $value, 0, $size, $pado->charset );
            break;
        default:
            $value = (string) $value;
        }
        return $value;
    }

    function retry ( $pado, &$sth, $message, $meth,
            $params1 = null, $params2 = null, $params3 = null, $params4 = null, $params5 = null ) {
        return false; // TODO::Set max retry count
        if ( $pado->driver === 'mysql' && strpos( $message, 'has gone away' ) !== false ) {
            $sth = null;
            if ( $pado->reconnect() ) {
                return $this->$meth( $params1, $params2, $params3, $params4, $params5 );
            }
        }
        return false;
    }

/**
 * Assemble the IN statement.
 * 
 * @param  string $key      : Key name for search.
 * @param  array  $v        : An array of values.
 * @param  string $col_type : Type of column.
 * @return string $stmt     : SQL IN statement.
 */
    function in_stmt ( $key, $v, $col_type, $stmt = 'IN' ) {
        if ( strpos( $col_type, 'int' ) !== false ) {
            array_walk( $v, function( &$val ) {
                $val = (int) $val;
            });
        } else {
            array_walk( $v, function( &$val ) {
                $val = $this->pado()->quote( $val );
            });
        }
        $v = '('. join( ',', $v ) . ')';
        $sql = " {$key} {$stmt} {$v} ";
        if ( $stmt == 'NOT IN' ) {
            $sql = "($sql OR {$key} IS NULL)";
        }
        return $sql;
    }

/**
 * Load object matches the params.
 * If no matching object is found, return new object assigned params.
 * 
 * @param  array  $params: An array for search or assign.
 * @return object $obj   : Single object matches the params or new object assigned params.
 */
    function get_by_key ( $params, $args = [], $cols = '*', $extra = '', $ex_vals = [] ) {
        $args['limit'] = 1;
        $args['get_by_key'] = true;
        $obj = $this->load( $params, $args, $cols, $extra, $ex_vals );
        if ( $obj ) {
            return is_array( $obj ) ? $obj[0] : $obj;
        }
        if ( is_array( $params ) ) {
            $values = [];
            foreach ( $params as $key => $value ) {
                if (! is_array( $value ) ) {
                    $values[ $key ] = $value;
                } else if (! empty( $value ) && array_keys( $value )[0] == 'BINARY' ) {
                    $array_values = array_values( $value );
                    if ( isset( $array_values[0] ) ) {
                        $values[ $key ] = $array_values[0];
                    }
                }
            }
            /* Keep array is empty.
            $pado = $this->pado();
            if ( !is_array( $obj ) && isset( $pado->cache[ $this->_model ] ) ) {
                if ( isset( $pado->cache[ $this->_model ][ $pado->last_cache_key ] ) ) {
                    unset( $pado->cache[ $this->_model ][ $pado->last_cache_key ] );
                }
            }
            */
            return $this->pado()->model( $this->_model )->__new( $values );
        }
    }

/**
 * Getting the count of a number of objects.
 * 
 * @param             : See load method.
 * @return int $count : Number of objects.
 */
    function count ( $terms = [], $args = [], $cols = '', $extra = '', $ex_vars = [] ) {
        $args['count'] = true;
        return $this->load( $terms, $args, $cols, $extra, $ex_vars );
    }

/**
 * The model has column or not.
 * 
 * @param  string $name : Column name.
 * @return bool   $has_column : Model has column or not.
 */
    function has_column ( $name, $strict = false ) {
        $model = $this->_model;
        if (! $model ) {
            return false;
        }
        $pado = $this->pado();
        if ( $strict && $pado->column_strict ) {
            $show_columns = $pado->show_columns( $model );
            return in_array( "{$model}_{$name}", $show_columns );
        }
        $scheme = $pado->scheme;
        $scheme = isset( $scheme[ $model ] ) ? $scheme[ $model ] : $this->_scheme;
        if ( $scheme === null && $pado->json_model ) {
            $scheme = $this->set_scheme_from_json( $model );
        }
        return isset( $scheme['column_defs'][ $name ] ) ? true : false;
    }

/**
 * Counting groups of objects.
 * 
 * @param mixed  $terms  : The hash should have keys matching column names and the values
 *                         are the values for that column.
 * @param array  $args   : Columns for grouping. (e.g.['group' => ['column1', ... ] ])
 * @return array $result : An array of conditions and 'COUNT(*)'.
 */
    function count_group_by ( $terms = [], $args = [], $extra = '', $extra2 = '' ) {
        if (! $extra && $extra2 ) {
            $extra = $extra2;
            $extra2 = [];
        }
        $args['count_group_by'] = true;
        return $this->load( $terms, $args, '', $extra, $extra2 );
    }

/**
 * Load object and get PDOStatement.
 * 
 * @param              : See load method.
 * @return object $sth : PDOStatement.
 */
    function load_iter ( $terms = [], $args = [], $cols = '', $extra = '' ) {
        $args['load_iter'] = true;
        return $this->load( $terms, $args, $cols, $extra );
    }

/**
 * INSERT or UPDATE the object.
 * 
 * @return bool $success : Returns true if it succeeds.
 */
    function save () {
        $pado = $this->pado();
        if ( isset( $pado->methods['save'] ) )
            return $this->_driver->save();
        $table = $this->_table;
        $model = $this->_model;
        $id_column = $this->_id_column;
        $colprefix = $this->_colprefix;
        $table = $this->_table;
        $callback = ['name' => 'save_filter'];
        $save_filter = $pado->run_callbacks( $callback, $model, $this, true );
        if (! $save_filter ) return false;
        $arr = get_object_vars( $this );
        $reserved_vars = array_keys( PADOBaseModel::RESERVED );
        foreach ( $reserved_vars as $var ) {
            unset( $arr[ $var ] );
        }
        if ( $pado->save_strict ) {
            $show_cols = $pado->show_columns( $this->_model );
            $cols = array_keys( $arr );
            foreach ( $cols as $col ) {
                if (! in_array( $col, $show_cols ) ) {
                    if ( in_array( "{$model}_{$col}", $show_cols ) ) {
                        $arr["{$model}_{$col}"] = $arr[ $col ];
                    } else if ( strpos( $col, '_' ) !== 0 && strpos( $col, $model ) === 0 ) {
                        $message = "PADOBaseModelException: unknown column({$col}) in model {$model}.";
                        $pado->errors[] = $message;
                        trigger_error( $message );
                    }
                    unset( $arr[ $col ] );
                }
            }
        }
        $original = $arr;
        $statement = 'UPDATE';
        $update = true;
        if ( $this->_insert || (! isset( $arr[ $id_column ] ) || ! $arr[ $id_column ] ) ) {
            $statement = 'INSERT';
            if (! $this->_insert ) {
                unset( $arr[ $id_column ] );
            }
            $update = false;
            $this->_insert = false;
        }
        $arr = $this->validation( $arr, $update );
        if ( $statement === 'INSERT' ) {
        } else {
            $object_id = $arr[ $id_column ];
            unset( $arr[ $id_column ] );
            $object_id = (int) $object_id;
            if ( $pado->blob2file && $pado->cleanup_blob && $object_id ) {
                $blob_cols = $pado->get_blob_cols( $model );
                if (! empty( $blob_cols ) ) {
                    $sql = 'SELECT ' . implode( ',', $blob_cols ) . " FROM {$table} WHERE {$id_column}=?";
                    $pdo = $pado->db;
                    $sth = $pdo->prepare( $sql );
                    $values = [ $object_id ];
                    try {
                        if ( $pado->debug == 4 ) {
                            $start = microtime( true );
                        }
                        $res = $sth->execute( $values );
                        if ( $pado->debug == 4 ) {
                            $end = microtime( true ) - $start;
                            $end = round( $end, 3 );
                            if ( $end ) {
                                $sql .= "(It took {$end} seconds.)";
                            }
                            $pado->queries[] = $sql;
                        }
                        ++$pado->query_cnt;
                        if ( $res ) {
                            $original = $sth->fetchAll( PDO::FETCH_ASSOC );
                            if (!empty( $original ) ) {
                                $original = $original[0];
                                foreach ( $blob_cols as $blob_col ) {
                                    if ( isset( $arr[ $blob_col ] )
                                        && $arr[ $blob_col ] != $original[ $blob_col ]
                                        && strpos( $original[ $blob_col ], 'a:1:{s:8:"basename";s:' ) === 0 ) {
                                        $unserialized = @unserialize( $original[ $blob_col ] );
                                        if ( is_array( $unserialized )
                                            && isset( $unserialized['basename'] ) ) {
                                            $blob = $pado->blob_path
                                                  . $this->_model . DS . $unserialized['basename'];
                                            if ( file_exists( $blob ) ) {
                                                @unlink( $blob );
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } catch ( PDOException $e ) {
                        $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                        $pado->errors[] = $message;
                        if ( !in_array( $model, $pado->not_cache ) ) {
                            $pado->clear_query( $model, null, false, true );
                        }
                        $pado->clear_query();
                        trigger_error( $message );
                    }
                    unset( $sth );
                }
            }
        }
        $placeholders = [];
        $cols = [];
        $vals = [];
        foreach ( $arr as $key => $val ) {
            $cols[] = $key;
            $vals[] = $val;
            $placeholders[] = '?';
        }
        if ( empty( $cols ) && !$pado->insert_empty ) {
            return false;
        }
        if ( $statement === 'INSERT' ) {
            if ( empty( $cols ) ) {
                $sql = "INSERT INTO {$table} ({$model}_id) VALUES (NULL)";
            } else {
                $sql = "INSERT INTO {$table} (" . join( ',', $cols ) . ')VALUES('
                     . join( ',', $placeholders ) . ')';
            }
        } else {
            $set = join( '=?,', $cols );
            $set .= '=?';
            $vals[] = $object_id;
            $sql = "UPDATE {$table} SET {$set} WHERE {$id_column}=?" ;
        }
        $callback = ['name' => 'pre_save', 'sql' => $sql, 'values' => $vals ];
        $sql = $callback['sql'];
        $vals = $callback['values'];
        $pado->run_callbacks( $callback, $model, $this, true );
        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
        if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
            $pado->reconnect();
        }
        $pdo = $pado->db;
        $sth = $pdo->prepare( $sql );
        try {
            if ( $pado->debug == 4 ) {
                $start = microtime( true );
            }
            $res = $sth->execute( $vals );
            if ( $pado->debug == 4 ) {
                $end = microtime( true ) - $start;
                $end = round( $end, 3 );
                if ( $end ) {
                    $sql .= "(It took {$end} seconds.)";
                }
                $pado->queries[] = $sql;
            }
            ++$pado->query_cnt;
            $this->$id_column = isset( $object_id )
                              ? $object_id : (int) $pdo->lastInsertId( $id_column );
            $callback['name'] = 'post_save';
            $pado->run_callbacks( $callback, $model, $this );
            if ( !in_array( $model, $pado->not_cache ) ) {
                if ( $pado->update_multi ) {
                    $ids = isset( $pado->update_objects[ $model ] )
                         ? $pado->update_objects[ $model ] : [];
                    if ( $this->$id_column ) {
                        $ids[] = $this->$id_column;
                    }
                    $pado->update_objects[ $model ] = $ids;
                } else {
                    if ( $this->$id_column ) {
                        $pado->clear_query( $model, $this->$id_column );
                    } else {
                        $pado->clear_query( $model );
                    }
                }
            }
            unset( $pado->cache[ $model ] );
            $sth = null;
            return $res;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $pado->errors[] = $message;
            if ( !in_array( $model, $pado->not_cache ) ) {
                $pado->clear_query( $model, null, false, true );
            }
            $pado->clear_query();
            $pado->reconnect();
            trigger_error( $message );
            return $this->retry( $pado, $sth, $message, 'save' );
        }
        $sth = null;
    }

/**
 * BULK INSERT or UPDATE the objects.
 *
 * @param array $objects : An array of objects.
 * @param bool  $update  : If specify false, BULK INSERT.
 * @return bool $success : Returns true if it succeeds.
 */
    function update_multi ( $objects, $update = true ) {
        if ( empty( $objects ) ) return;
        $pado = $this->pado();
        if ( isset( $pado->methods['update_multi'] ) )
            return $this->_driver->update_multi( $objects );
    }

/**
 * BULK Remove the objects.
 *
 * @param array $objects : An array of objects.
 * @return bool $success : Returns true if it succeeds.
 */
    function remove_multi ( $objects ) {
        if ( empty( $objects ) ) return;
        $pado = $this->pado();
        if ( isset( $pado->methods['remove_multi'] ) )
            return $this->_driver->remove_multi( $objects );
    }

/**
 * Alias for save.
 */
    function update ( $values = [] ) {
        // TODO
        return $this->save();
    }

/**
 * DELETE the object.
 *
 * @return bool $success : Returns true if it succeeds.
 */
    function remove () {
        $pado = $this->pado();
        $model = $this->_model;
        if ( isset( $pado->methods['remove'] ) )
            return $this->_driver->remove();
        $id_column = $this->_id_column;
        $id = $this->$id_column;
        if (! $id ) return;
        $obj = $this;
        if ( $pado->blob2file ) {
            $blob_cols = $pado->get_blob_cols( $model );
            $obj_keys = array_keys( $this->get_values() );
            $reload = false;
            foreach ( $blob_cols as $blob_col ) {
                if (! in_array( $blob_col, $obj_keys ) ) {
                    $reload = true;
                    break;
                }
            }
            if ( $reload ) {
                $obj = $pado->model( $model )->load(
                    (int) $id, [], implode( ',', $blob_cols ) );
                if (! $obj ) return true; // object already deleted.
            }
            if ( count( $blob_cols ) ) {
                $blob_path = $pado->blob_path;
                $blob_path .= $model;
                $obj_values = $obj->get_values();
                foreach ( $blob_cols as $blob )
              {
                if ( isset( $obj_values[ $blob ] ) && $obj_values[ $blob ] ) {
                    $value = $obj_values[ $blob ];
                    if ( is_object( $value ) ) {
                        $value = $value->original;
                    } else {
                        if ( $obj->_original &&
                            strpos( $value, 'a:1:{s:8:"basename";s:' ) === false
                            && isset( $obj->_original[ $blob ] ) ) {
                            $value = $obj->_original[ $blob ];
                        }
                    }
                    if (!$pado->in_duplicate && strpos( $value, 'a:1:{s:8:"basename";s:' ) === 0 ) {
                        $unserialized = @unserialize( $value );
                        if ( is_array( $unserialized )
                            && isset( $unserialized['basename'] ) ) {
                            $basename = $unserialized['basename'];
                            $blob = $blob_path . DS . $basename;
                            if ( file_exists( $blob ) ) {
                                if ( $pado->txn_active ) {
                                    $pado->remove_blobs[] = $blob;
                                } else {
                                    @unlink( $blob );
                                }
                            }
                        }
                    }
                }
              }
            }
        }
        $table = $this->_table;
        $callback = ['name' => 'delete_filter' ];
        $delete_filter = $pado->run_callbacks( $callback, $model, $this, true );
        if (! $delete_filter ) return false;
        if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
            $pado->reconnect();
        }
        $pdo = $pado->db;
        $sql = "DELETE FROM {$table} WHERE {$id_column}=:object_id";
        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
        $callback = ['name' => 'pre_delete', 'sql' => $sql, 'values' => [ $id ] ];
        $pado->run_callbacks( $callback, $model, $this );
        $sth = $pdo->prepare( $sql );
        $sth->bindValue( ':object_id', $id, PDO::PARAM_INT );
        try {
            if ( $pado->debug == 4 ) {
                $start = microtime( true );
            }
            $res = $sth->execute();
            $sth = null;
            if ( $pado->debug == 4 ) {
                $end = microtime( true ) - $start;
                $end = round( $end, 3 );
                if ( $end ) {
                    $sql .= "(It took {$end} seconds.)";
                }
                $pado->queries[] = $sql;
            }
            ++$pado->query_cnt;
            $callback['name'] = 'post_delete';
            $pado->run_callbacks( $callback, $model, $this );
            if ( !in_array( $model, $pado->not_cache ) ) {
                if ( $pado->update_multi ) {
                    $ids = isset( $pado->update_objects[ $model ] )
                         ? $pado->update_objects[ $model ] : [];
                    $ids[] = $id;
                    $pado->update_objects[ $model ] = $ids;
                } else {
                    $pado->clear_query( $model, $id );
                }
            }
            unset( $pado->cache[ $model ] );
            return $res;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $pado->errors[] = $message;
            if ( !in_array( $model, $pado->not_cache ) ) {
                $pado->clear_query( $model, null, false, true );
            }
            $pado->clear_query();
            trigger_error( $message );
            return $this->retry( $pado, $sth, $message, 'remove' );
        }
        $sth = null;
    }

/**
 * Alias for remove.
 */
    function delete () {
        return $this->remove();
    }

/**
 * Get table scheme from JSON file and set to $pado->scheme[ $model ].
 * 
 * @param string $model : Name of model.
 * @param string $json  : File path of json.
 */
    function set_scheme_from_json ( $model, $json = '' ) {
        $pado = $this->pado();
        $file_exists = false;
        if ( isset( $pado->models_json[ $model ] ) ) {
            $json = $pado->models_json[ $model ];
            $file_exists = file_exists( $json );
        }
        if (!$file_exists ) {
            $models_dirs = $pado->models_dirs;
            foreach ( $models_dirs as $models_dir ) {
                if ( file_exists( $models_dir . DS . $model . '.json' ) ) {
                    $json = $models_dir . DS . $model . '.json';
                    $file_exists = true;
                    break;
                }
            }
        }
        if (!$file_exists ) {
            $json = $json ? $json : PADODIR . 'models' . DS . $model . '.json';
            $file_exists = file_exists( $json );
        }
        if ( $file_exists ) {
            $cache_path = null;
            $scheme = null;
            if ( $pado->json_cache ) {
                $cache_path = '_models' . DS . $model;
                $scheme = $pado->get_cache( $cache_path, filemtime( $json ), true );
            }
            if (! $scheme ) {
                $scheme = json_decode( file_get_contents( $json ), true );
                if ( $cache_path ) {
                    $pado->set_cache( $cache_path, $scheme );
                }
            }
            if ( isset( $scheme['indexes'] ) && isset( $scheme['indexes']['PRIMARY'] ) ) {
                $id = $scheme['indexes']['PRIMARY'];
                if ( is_array( $id ) ) $id = join( ',', $id );
                $this->_id_column = $this->_colprefix . $id;
            }
            $this->_scheme = $scheme;
            $pado->scheme[ $model ] = $scheme;
            return $scheme;
        }
    }

/**
 * Get table scheme from database and set to $pado->scheme[ $model ].
 * 
 * @param  string $model     : Name of model.
 * @param  string $table     : Name of table.
 * @param  string $colprefix : Column prefix.
 * @param  bool   $needle    : If specified receive results(array).
 * @return array  $scheme    : If $needle specified.
 */
    function get_scheme ( $model, $table, $colprefix, $needle = false ) {
        $pado = $this->pado();
        if ( isset( $pado->methods['get_scheme'] ) )
            return $this->_driver->get_scheme( $model, $table, $colprefix, $needle );
        return;
    }

/**
 * Create new table from scheme.
 * 
 * @param string $model  : Name of model.
 * @param string $table  : Name of table.
 * @param array  $scheme : An array of column definition and index definition.
 */
    function create_table ( $model, $table, $colprefix, $scheme ) {
        $pado = $this->pado();
        if ( isset( $pado->methods['create_table'] ) )
            return $this->_driver->create_table( $model, $table, $colprefix, $scheme );
        return;
    }

/**
 * Get an array of column names and values.
 * 
 * @return array $key-values : Column names and values.
 */
    function column_values () {
        $object_vars = get_object_vars( $this );
        $colprefix = $this->_colprefix;
        foreach ( $object_vars as $name => $value ) {
            if ( strpos( $name, '_' ) !== 0 ) {
                $col_name = preg_replace( "/^$colprefix/", '', $name );
                $object_vars[ $col_name ] = $value;
            }
            unset( $object_vars[ $name ] );
        }
        return $object_vars;
    }

/**
 * Returns a list of the names of columns.
 * 
 * @return array $names : The names of columns.
 */
    function column_names () {
        $pado = $this->pado();
        if ( isset( $pado->scheme[ $this->_model ] ) ) {
            $scheme = $pado->scheme[ $this->_model ]['column_defs'];
            return array_keys( $scheme );
        }
        $id_column = $pado->id_column;
        if ( $this->$id_column ) {
            return array_keys( $this->column_values() );
        }
    }

/**
 * Set column names and values from an array.
 * 
 * @param array $params : The hash for assign.
 */
    function set_values ( $params = [], &$changed = false ) {
        $this->__new( $params, $changed );
    }

/**
 * Get column names and values except model properties.
 */
    function get_values ( $no_prefix = false, $no_blob = false ) {
        $arr = get_object_vars( $this );
        if ( $no_blob ) {
            $blob_cols = $this->_pado->get_blob_cols( $this->_model );
            if ( is_array( $blob_cols ) ) {
                foreach ( $blob_cols as $blob_col ) {
                    if ( isset( $arr[ $blob_col ] ) ) {
                        $arr[ $blob_col ] = $arr[ $blob_col ] ? true : false;
                    }
                }
            }
        }
        $reserved_vars = array_keys( PADOBaseModel::RESERVED );
        foreach ( $reserved_vars as $var ) {
            unset( $arr[ $var ] );
        }
        if ( $no_prefix ) {
            $_colprefix = $this->_colprefix;
            $values = [];
            foreach ( $arr as $k => $v ) {
                $values[ preg_replace( "/^$_colprefix/", '', $k ) ] = $v;
            }
            unset( $arr );
            return $values;
        }
        return $arr;
    }

/**
 * Next or Previous Object.
 * 
 * @param  string $direction : 'next' or 'previous'.
 * @param  string $column    : Column for compare.
 * @param  array  $terms     : $terms for load.
 * @param  string $cols      : $cols for load.
 * @param  string $extra     : $extra for load.
 * @return object $next_prev : Returns one object or null.
 */
    function next_prev ( $direction = 'next', $column = 'id', $terms = [],
                         $cols = '*', $extra = '' ) {
        $pado = $this->pado();
        $model = $this->_model;
        $colprefix = $this->_colprefix;
        $id_column = $pado->id_column;
        $id = $this->$id_column;
        $op = $direction === 'next' ? '>=' : '<=';
        $terms[ $column ] = [ $op => $this->$column ];
        $extra .= " AND {$colprefix}{$column} !={$id} ";
        $args = ['limit' => 1];
        $next_prev = $this->load( $terms, $args, $cols, $extra );
        if (! empty( $next_prev ) ) {
            return $next_prev[0];
        }
    }

/**
 * Upgrade database scheme.
 * 
 * @param  string $table     : Name of table.
 * @param  array  $upgrade   : Scheme information of update columns.
 * @param  string $colprefix : Column name prefix.
 * @return bool   $success   : Returns true if it succeeds.
 */
    function upgrade ( $table, $upgrade, $colprefix ) {
        $pado = $this->pado();
        if ( isset( $pado->methods['upgrade'] ) )
            return $this->_driver->upgrade( $table, $upgrade, $colprefix );
    }

/**
 * Whether there is a difference in array.
 * 
 * @param  array $from  : The array to compare from.
 * @param  array $to    : An array to compare against.
 * @return bool  $bool  : A difference in array.
 */
    function array_compare ( $from, $to ) {
        if ( $to === null ) return true;
        if (! empty( array_diff( array_keys( $from ),
                     array_keys( $to ) ) )
            || ! empty( array_diff( array_keys( $to ),
                        array_keys( $from ) ) ) ) {
            return true;
        } else {
            foreach ( $from as $name => $props ) {
                $_props = isset( $to[ $name ] ) ? $to[ $name ] : null;
                if (! $_props ) {
                    return true;
                }
                if ( is_array( $_props ) && is_array( $props ) ) {
                    if (! empty( array_diff_assoc( $_props, $props ) )
                        || ! empty( array_diff_assoc( $props, $_props ) ) ) {
                        return true;
                    }
                } else {
                    if ( $_props !== $props ) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

/**
 * Compare the schema definition with the actual schema.
 * 
 * @param  string $model : Name of model.
 * @param  string $table : Name of table.
 * @param  string $colprefix : Column prefix.
 * @return array  $diff  : Difference in array
 *                       (['column_defs' => $upgrade_cols, 'indexes' => $upgrade_idxs ]).
 */
    function check_upgrade ( $model, $table, $colprefix ) {
        $pado = $this->pado();
        $upgrade = false;
        $upgrade_idx = false;
        if (! empty( $this->_scheme ) ) {
            $pado->scheme[ $model ] = $this->_scheme;
        } else {
            if ( $pado->json_model )
                $this->set_scheme_from_json( $model );
        }
        if ( isset( $pado->scheme[ $model ] ) ) {
            $column_defs = $pado->scheme[ $model ]['column_defs'];
            if ( $scheme = $this->get_scheme(
                    $model, $table, $colprefix, true ) ) {
                $compare = $scheme['column_defs'];
                $upgrade = $this->array_compare( $column_defs, $compare );
                $indexes = $pado->scheme[ $model ]['indexes'];
                $compare_idx = $scheme['indexes'];
                $upgrade_idx = $this->array_compare( $indexes, $compare_idx );
                if ( $upgrade || $upgrade_idx ) {
                    $upgrade_cols = $this->get_diff( $column_defs, $compare );
                    $upgrade_idxs = $this->get_diff( $indexes, $compare_idx );
                    $upgrade = ['column_defs' => $upgrade_cols, 'indexes' => $upgrade_idxs ];
                }
            }
        }
        return $upgrade;
    }

    function get_diff ( $from, $to ) {
        $diff = ['new' => [], 'changed' => [], 'delete' => []];
        foreach ( $from as $name => $props ) {
            $_props = isset( $to[ $name ] ) ? $to[ $name ] : null;
            if (! $_props ) {
                $diff['new'][ $name ] = $props;
                continue;
            }
            if ( is_array( $_props ) && is_array( $props ) ) {
                if (! empty( array_diff_assoc( $_props, $props ) )
                    || ! empty( array_diff_assoc( $props, $_props ) ) ) {
                    $diff['changed'][ $name ] = $props;
                }
            } else {
                if ( $_props !== $props ) $diff['changed'][ $name ] = $props;
            }
        }
        foreach ( $to as $name => $_props ) {
            $props = isset( $from[ $name ] ) ? $from[ $name ] : null;
            if (! $props ) {
                $diff['delete'][ $name ] = null;
                continue;
            }
            if ( is_array( $_props ) && is_array( $props ) ) {
                if (! empty( array_diff_assoc( $_props, $props ) )
                    || ! empty( array_diff_assoc( $props, $_props ) ) ) {
                    $diff['changed'][ $name ] = $props;
                }
            } else {
                if ( $_props !== $props ) $diff['changed'][ $name ] = $props;
            }
        }
        return $diff;
    }

/**
 * Validate keys and values.
 * 
 * @param  array  $values : An array for sanitize.
 * @param  bool   $update : UPDATE(true) or INSERT(false).
 * @param  string $error  : Do nothing. For backward compatibility.
 * @return array  $values : Sanitized an array.
 */
    function validation ( $values, $update = false, &$error = null ) {
        $pado = $this->pado();
        if ( isset( $pado->methods['validation'] ) )
            return $this->_driver->validation( $values );
        $model = $this->_model;
        $scheme = isset( $pado->scheme[ $model ] ) ? $pado->scheme[ $model ] : null;
        $scheme = $scheme ? $scheme['column_defs'] : null;
        $colprefix = $this->_colprefix;
        $arr = [];
        if (! $scheme ) {
            $illegals = ILLEGAL_CHARS;
            foreach ( $values as $key => $val ) {
                $key = str_replace( $illegals, '', $key );
                if ( $colprefix && strpos( $key, $colprefix ) !== 0 )
                    $key = $colprefix . $key;
                $arr[ $key ] = $val;
            }
            return $arr;
        }
        $default_ts = $pado->default_ts;
        foreach ( $scheme as $col => $props ) {
            if ( $col === $pado->id_column ) continue;
            if ( $update && !isset( $values[ $col ] ) ) continue;
            if ( isset( $props['not_null'] ) && $props['not_null'] ) {
                if (!isset( $values[ $col ] ) &&!isset( $values[ $colprefix . $col ] ) ) {
                    if ( isset( $props['default'] ) ) {
                        $values[ $col ] = $props['default'];
                    } else {
                        $type = $props['type'];
                        if ( strpos( $type, 'int' ) !== false ) {
                            $values[ $col ] = 0;
                        } else if ( strpos( $type, 'time' ) !== false ) {
                            if ( $default_ts === 'CURRENT_TIMESTAMP') {
                                $values[ $col ] = date( 'YmdHis' );
                            } else {
                                $values[ $col ] = $default_ts;
                            }
                        } else if ( $type == 'string' || $type == 'text' ) {
                            $values[ $col ] = '';
                        }
                    }
                }
            }
        }
        foreach ( $values as $key => $val ) {
            $orig_key = $key;
            if ( $colprefix && strpos( $key, $colprefix ) === 0 )
                $key = preg_replace( "/^$colprefix/", '', $key );
            if (! isset( $scheme[ $key ] ) ) {
                continue;
            } else {
                $type = $scheme[ $key ]['type'];
                $size = isset( $scheme[ $key ]['size'] ) ? $scheme[ $key ]['size'] : null;
                $not_null = isset( $scheme[ $key ]['not_null'] )
                          ? $scheme[ $key ]['not_null'] : false;
                if ( $type !== 'blob' && is_string( $val ) ) {
                    $val = str_replace( "\0", '', $val );
                }
                switch ( true ) {
                case ( strpos( $type, 'int' ) !== false ):
                    $val = (int) $val;
                    break;
                case ( $type === 'float' || $type === 'double' || strpos( $type, 'decimal' ) === 0 ):
                    $val = (float) $val;
                    break;
                case ( $type === 'datetime' ):
                    if ( $val = $this->db2ts( $val ) ) {
                        if ( $default_ts &&
                          ( ( $val < 10000101000000 ) || ( $val > 99991231235959 ) ) ) {
                            if ( $default_ts === 'CURRENT_TIMESTAMP') {
                                $val = date( 'YmdHis' );
                            } else {
                                $val = $default_ts;
                            }
                        }
                        $val = $this->ts2db( $val, true );
                    } else {
                        $val = null;
                    }
                    break;
                case ( $type === 'date' && $val ):
                    $val = $this->date2db( $val, true );
                    break;
                case ( $type === 'time' && $val ):
                    $val = $this->time2db( $val );
                    break;
                case ( $type === 'year' ):
                    $val = (string) $val;
                    $val = preg_replace( '/[^0-9]+/', '', $val );
                    if ( strlen( $val ) === 2 ) {
                        $val = ( $val > 69 ) ? '19' . $val : '20' . $val;
                    } else {
                        $val = substr( $this->ts2db( $val ), 0, 4 );
                    }
                    $val = (int) $val;
                    break;
                case ( $type === 'blob' && $pado->blob2file ):
                    $blob_path = $pado->blob_path;
                    $blob_path .= $this->_model;
                    $update = false;
                    $orig_val = null;
                    if ( is_object( $val ) ) {
                        $orig_val = $val->original;
                        if ( $this->id && $this->_original
                            && isset( $this->_original[ $orig_key ] ) ) {
                            $orig_val = $this->_original[ $orig_key ];
                        }
                        $val = $val->value;
                        if ( $val ) {
                            $basename = $pado->generate_uuid( $blob_path );
                            $blob = $blob_path . DS . $basename;
                            if (!is_dir( $blob_path ) ) {
                                mkdir( $blob_path, 0777, true );
                            }
                            file_put_contents( $blob, $val );
                            if ( $pado->txn_active ) {
                                $pado->output_blobs[] = $blob;
                            }
                            $this->$orig_key = $val;
                            $value = ['basename' => $basename ];
                            $val = serialize( $value );
                        } else {
                            $val = '';
                        }
                        $arr[ $colprefix . $key ] = $val;
                        if ( $this->_original )
                            $this->_original[ $colprefix . $key ] = $val;
                        $update = true;
                    }
                    if (!$pado->in_duplicate && $this->id && $update && $orig_val
                        && strpos( $orig_val, 'a:1:{s:8:"basename";s:' ) === 0 ) {
                        $unserialized = @unserialize( $orig_val );
                        if ( is_array( $unserialized )
                            && isset( $unserialized['basename'] ) ) {
                            $basename = $unserialized['basename'];
                            $blob = $blob_path . DS . $basename;
                            if ( file_exists( $blob ) ) {
                                if ( $pado->txn_active ) {
                                    $pado->remove_blobs[] = $blob;
                                } else {
                                    @unlink( $blob );
                                }
                            }
                        }
                    }
                    if ( $val && is_string( $val ) &&
                        strpos( $val, 'a:1:{s:8:"basename";s:' ) !== 0 ) {
                        // re-try
                        $basename = $pado->generate_uuid( $blob_path );
                        $blob = $blob_path . DS . $basename;
                        if (!is_dir( $blob_path ) ) {
                            mkdir( $blob_path, 0777, true );
                        }
                        file_put_contents( $blob, $val );
                        if ( $pado->txn_active ) {
                            $pado->output_blobs[] = $blob;
                        }
                        $this->$orig_key = $val;
                        $value = ['basename' => $basename ];
                        $val = serialize( $value );
                        $arr[ $colprefix . $key ] = $val;
                        if ( $this->_original )
                            $this->_original[ $colprefix . $key ] = $val;
                        $update = true;
                    }
                    break;
                case ( $type === 'string' && $size ):
                    $val = (string) $val;
                    if ( mb_strlen( $val ) > $size )
                        $val = mb_substr( $val, 0, $size, $pado->charset );
                    break;
                default:
                    $val = (string) $val;
                }
            }
            if ( $val !== null || !$not_null ) $arr[ $colprefix . $key ] = $val;
        }
        return $arr;
    }

/**
 * Ymd to Y-m-d
 *
 *  20230329 -> 2023-03-29
 *        "" -> 0000-01-01
 *         0 -> 0000-01-01
 *         1 -> 0000-01-01
 *        01 -> 0000-01-01
 *       012 -> 0000-01-12
 *      0123 -> 0000-01-23
 *     01234 -> 0000-12-31
 *    012345 -> 0001-12-31
 *   0123456 -> 0012-12-31
 *  01234567 -> 0123-12-31
 *  12345678 -> 1234-12-31
 * 123456789 -> 1234-12-31
 *  00000000 -> 0000-01-01
 *  99991332 -> 9999-12-31
 *  20265432 -> 2026-12-31
 *  99999999 -> 9999-12-31
 *
 */
    function date2db ( $ts, $validate_and_repair = false ) {
        if ( isset( $this->pado()->methods['date2db'] ) )
            return $this->_driver->date2db( $ts );
        preg_match( '/^(\d|)(\d|)(\d|)(\d|)(\d|)(\d|)(\d|)(\d|)/',
                    strrev( substr( $ts, 0, 8 ) ),
                    $mts );
        $y = $mts[8] . $mts[7] . $mts[6] . $mts[5];
        $m = $mts[4] . $mts[3];
        $d = $mts[2] . $mts[1];
        if ( $validate_and_repair &&
             ! checkdate( (int) $m, (int) $d, (int) $y ) ) {
            if ( $m > 12 ) {
                $m = '12';
            } else if (! (int) $m ) {
                $m = '01';
            }
            if ( $d > 28 ) {
                $last = date( 't', strtotime( "$y-$m-01" ) );
                if ( $d > $last ) $d = $last;
            } else if (! (int) $d ) {
                $d = '01';
            }
        }
        return sprintf( '%04d-%02d-%02d', $y, $m, $d );
    }

/**
 * His to H:i:s
 *
 *      "" -> 00:00:00
 *       0 -> 00:00:00
 *       1 -> 00:00:01
 *      01 -> 00:00:01
 *     012 -> 00:00:12
 *    0123 -> 00:01:23
 *   01234 -> 00:12:34
 *  012345 -> 01:23:45
 *  123456 -> 12:34:56
 * 0123456 -> 01:23:45
 * 1234567 -> 12:34:56
 *  000000 -> 00:00:00
 *  240000 -> 23:00:00
 *  129876 -> 12:59:59
 *  235960 -> 23:59:60
 * 9999999 -> 23:59:59
 *
 */
    function time2db ( $ts, $validate_and_repair = false ) {
        if ( isset( $this->pado()->methods['time2db'] ) )
            return $this->_driver->time2db( $ts );
        preg_match( '/^(\d|)(\d|)(\d|)(\d|)(\d|)(\d|)/',
                    strrev( substr( $ts, 0, 6 ) ),
                    $mts );
        $h = $mts[6] . $mts[5];
        $m = $mts[4] . $mts[3];
        $s = $mts[2] . $mts[1];
        if ( $validate_and_repair ) {
            if ( $h > 23 ) {
                $h = '23';
            }
            if ( $m > 59 ) {
                $m = '59';
            }
            if ( $s > 59 &&
                ! ( $m == 59 && $s == 60 ) ) { // leap second (HH:59:60)
                $s = '59';
            }
        }
        return sprintf( '%02d:%02d:%02d', $h, $m, $s );
    }

/**
 * YmdHis to Y-m-d H:i:s
 */
    function ts2db ( $ts, $validate_and_repair = false ) {
        if ( isset( $this->pado()->methods['ts2db'] ) )
            return $this->_driver->ts2db( $ts );
        $ts = preg_replace( '/[^0-9]+/', '', $ts );
        // Make it a 14 digit number.
        preg_match( '/^ (?P<Y> \d{4} ) (?P<m> \d{2} ) (?P<d> \d{2} )' .
                    '   (?P<H> \d{2} ) (?P<i> \d{2} ) (?P<s> \d{2} ) /x',
                    "{$ts}00000000000000", $m );
        if ( $validate_and_repair ) {
            if (! checkdate( $m['m'], $m['d'], $m['Y'] ) ) {
                if ( $m['m'] > 12 ) {
                    $m['m'] = '12';
                } else if ( $m['m'] == '00' ) {
                    $m['m'] = '01';
                }
                if ( $m['d'] > 28 ) {
                    $last = date( 't', strtotime( "{$m['Y']}-{$m['m']}-01" ) );
                    if ( $m['d'] > $last ) $m['d'] = $last;
                } else if ( $m['d'] == '00' ) {
                    $m['d'] = '01';
                }
            }
            if ( $m['H'] > 23 ) {
                $m['H'] = '23';
            }
            if ( $m['i'] > 59 ) {
                $m['i'] = '59';
            }
            if ( $m['s'] > 59 &&
                 ! ( $m['i'] == 59 && $m['s'] == 60 ) ) { // leap second (HH:59:60)
                $m['s'] = '59';
            }
        }
        return "{$m['Y']}-{$m['m']}-{$m['d']} {$m['H']}:{$m['i']}:{$m['s']}";
    }

/**
 * Y-m-d H:i:s to YmdHis
 */
    function db2ts ( $ts, $validate_and_repair = false ) {
        if (! $ts ) return '0';
        if ( isset( $this->pado()->methods['db2ts'] ) )
            return $this->_driver->db2ts( $ts );
        $ts = preg_replace( '/[^0-9]+/', '', $ts );
        // Make it a 14 digit number.
        preg_match( '/^ (?P<Y> \d{4} ) (?P<m> \d{2} ) (?P<d> \d{2} )' .
                    '   (?P<H> \d{2} ) (?P<i> \d{2} ) (?P<s> \d{2} ) /x',
                    "{$ts}00000000000000", $m );
        if (! $validate_and_repair ) {
            if ( $m[0] == '00000000000000' ) {
                return '0';
            }
            return $m[0];
        }
        if (! checkdate( $m['m'], $m['d'], $m['Y'] ) ) {
            if ( $m['m'] > 12 ) {
                $m['m'] = '12';
            } else if ( $m['m'] == '00' ) {
                $m['m'] = '01';
            }
            if ( $m['d'] > 28 ) {
                $last = date( 't', strtotime( "{$m['Y']}-{$m['m']}-01" ) );
                if ( $m['d'] > $last ) $m['d'] = $last;
            } else if ( $m['d'] == '00' ) {
                $m['d'] = '01';
            }
        }
        if ( $m['H'] > 23 ) {
            $m['H'] = '23';
        }
        if ( $m['i'] > 59 ) {
            $m['i'] = '59';
        }
        if ( $m['s'] > 59 &&
             ! ( $m['i'] == 59 && $m['s'] == 60 ) ) { // leap second (HH:59:60)
            $m['s'] = '59';
        }
        return $m['Y'] . $m['m'] . $m['d'] . $m['H'] . $m['i'] . $m['s'];
    }
}

/**
 * PADOBaseModel : PADO Model for MySQL
 *
 * @version    1.0
 * @package    PADO
 * @author     Alfasado Inc. <webmaster@alfasado.jp>
 * @copyright  2017 Alfasado Inc. All Rights Reserved.
 */
class PADOMySQL extends PADOBaseModel {

    public static $_engine  = 'InnoDB';

/**
 * Get table scheme from db.
 */
    function get_scheme ( $model, $table, $colprefix, $needle = false ) {
        $table = $table ? $table : $this->_table;
        if ( strpos( $table, ',' ) !== false ) {
            return false;
        }
        $model = $model ? $model : $this->_model;
        $colprefix = $colprefix ? $colprefix : $this->_colprefix;
        $pado = $this->pado();
        if ( $pado->stash( $model ) ) {
            $scheme = $pado->stash( $model );
            if ( $needle ) return $scheme;
            $pado->scheme[ $model ] = $scheme;
            $this->_scheme = $scheme;
            return;
        }
        if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
            $pado->reconnect();
        }
        $quoted = $pado->quote_model( $table );
        $sql = "DESCRIBE {$quoted}";
        $sth = $pado->db->prepare( $sql );
        try {
            $sth->execute();
            if ( $pado->debug == 4 ) $pado->queries[] = $sql;
            ++$pado->query_cnt;
            $fields = $sth->fetchAll();
            $sth = null;
            $scheme = [];
            foreach ( $fields as $field ) {
                $name = $field['Field'];
                if ( $colprefix && strpos( $name, $colprefix ) === 0 )
                    $name = preg_replace( "/^$colprefix/", '', $name );
                $type = strtolower( $field['Type'] );
                $not_null = ( isset( $field['Null'] )
                    && $field['Null'] === 'NO' ) ? true : false;
                $size = null;
                $default = ( isset( $field['Default'] ) ) ? $field['Default'] : null;
                switch ( true ) {
                case ( strpos( $type, 'int' ) !== false ):
                    if( strpos( $type, '(' ) !== false ) {
                        list ( $type, $size ) = explode( '(', $type );
                        $size = rtrim( $size, ')' );
                    }
                    break;
                case ( strpos( $type, 'var' ) !== false
                    || strpos( $type, 'text' ) !== false ):
                    if( strpos( $type, '(' ) !== false ) {
                        list ( $type, $size ) = explode( '(', $type );
                        $size = (int) rtrim( $size, ')' );
                        $type = 'string';
                    } else {
                        $type = 'text';
                    }
                    break;
                case ( $type === 'timestamp' || $type === 'datetime' ):
                    $type = 'datetime';
                    break;
                case ( $type === 'float' || $type === 'double' ):
                    $type = 'double';
                    break;
                case ( $type === 'date' || $type === 'time' || $type === 'year' ):
                    break;
                case ( strpos( $type, 'blob' ) !== false ):
                    $type = 'blob';
                    break;
                default:
                    $type = 'string';
                }
                $scheme[ $name ]['type'] = $type;
                if ( $not_null ) $scheme[ $name ]['not_null'] = 1;
                if ( $size ) $scheme[ $name ]['size'] = $size;
                if ( $default !== null ) $scheme[ $name ]['default'] = $default;
            }
            $scheme = ['column_defs' => $scheme ];
            $sql = "SHOW INDEX FROM {$quoted}";
            if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
                $pado->reconnect();
            }
            $sth = $pado->db->prepare( $sql );
            try {
                $sth->execute();
                if ( $pado->debug == 4 ) $pado->queries[] = $sql;
                ++$pado->query_cnt;
                $fields = $sth->fetchAll();
                $sth = null;
                $indexes = [];
                $idxprefix = $pado->idxprefix;
                $idxprefix = str_replace( '<table>', $table, $idxprefix );
                foreach ( $fields as $field ) {
                    $key = $field['Key_name'];
                    if ( $idxprefix && strpos( $key, $idxprefix ) === 0 )
                        $key = preg_replace( "/^$idxprefix/", '', $key );
                    $name = $field['Column_name'];
                    if ( $colprefix &&  strpos( $name, $colprefix ) === 0 )
                        $name = preg_replace( "/^$colprefix/", '', $name );
                    if ( isset( $indexes[ $key ] ) ) {
                        if ( is_string( $indexes[ $key ] ) ) {
                            $value = $indexes[ $key ];
                            $indexes[ $key ] = [];
                            $indexes[ $key ][] = $value;
                            $indexes[ $key ][] = $name;
                        } else {
                            $indexes[ $key ][] = $name;
                        }
                    } else {
                        $indexes[ $key ] = $name;
                    }
                }
                $scheme['indexes'] = $indexes;
                if ( isset( $indexes['PRIMARY'] ) ) {
                    $id = $indexes['PRIMARY'];
                    if ( is_array( $id ) ) $id = join( ',', $id );
                    $this->_id_column = $this->_colprefix . $id;
                }
            } catch ( PDOException $e ) {
                $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                $pado->errors[] = $message;
                trigger_error( $message );
            }
            if ( $pado->json_model && $pado->save_json ) {
                $json = PADODIR . 'models' . DS . $model . '.json';
                if (! file_exists( $json ) )
                    file_put_contents( $json, json_encode( $scheme, JSON_PRETTY_PRINT ), LOCK_EX );
            }
            $sth = null;
            if ( $needle ) return $scheme;
            $pado->scheme[ $model ] = $scheme;
            $this->_scheme = $scheme;
            $pado->stash( $model, $scheme );
        } catch ( PDOException $e ) {
            $msg = $e->getMessage();
            $message = 'PDOException: ' . $msg . ", {$sql}";
            if ( strpos( $msg, 'not found' ) !== false ) {
                if ( $pado->upgrader ) {
                    if ( isset( $pado->scheme[ $model ] ) ) {
                        $this->create_table(
                            $model, $table, $colprefix, $pado->scheme[ $model ] );
                    }
                }
                $sth = null;
                return $this->retry( $pado, $sth, $message, 'get_scheme',
                       $model, $table, $colprefix, $needle );
            }
            $pado->errors[] = $message;
            $pado->clear_query();
            trigger_error( $message );
            return false;
        }
        $sth = null;
    }

/**
 * ALTER TABLE.
 */
    function upgrade ( $table, $upgrade, $colprefix ) {
        $pado = $this->pado();
        if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
            $pado->reconnect();
        }
        $pdo = $pado->db;
        $column_defs = $upgrade['column_defs'];
        $prefix = $pado->prefix ? $pado->prefix : '';
        $quoted = $pado->quote_model( $table );
        $sql = "SHOW COLUMNS FROM {$quoted}";
        $sth = $pdo->query( $sql );
        if ( $pado->debug == 4 ) $pado->queries[] = $sql;
        $fields = $sth->fetchAll( PDO::FETCH_BOTH );
        $mdlFields = [];
        $field_types = [];
        foreach ( $fields as $field ) {
            $mdlFields[] = $field[0];
            $field_types[ $field[0] ] = $field[1];
        }
        $model = $prefix ? preg_replace( "/^$prefix/", '', $table ) : $table;
        $pado->clear_query( $model, null, false, true );
        $scheme = $pado->scheme[ $model ] ? $pado->scheme[ $model ] : [];
        $indexes = ( $scheme && isset( $scheme['indexes'] ) ) ? $scheme['indexes'] : [];
        $res = false;
        $idx_deleted = [];
        if ( is_array( $column_defs ) ) {
            $update = array_merge( $column_defs['new'], $column_defs['changed'] );
            if (! empty( $update ) ) {
                foreach ( $update as $name => $props ) {
                    $col_name = $name;
                    if ( $name === $pado->id_column ) continue;
                    if ( $colprefix && strpos( $name, $colprefix ) !== 0 )
                        $col_name = $colprefix . $name;
                    $vals = [];
                    $type = $props['type'];
                    $size = 0;
                    if ( isset( $props['size'] ) ) {
                        $size = $props['size'];
                    }
                    switch ( true ) {
                    case ( strpos( $type, 'int' ) !== false ):
                        $type = $type == 'tinyint' ? $type : $pado->int_type;
                        unset( $props['size'] );
                        // As of MySQL 8.0.17, the display width attribute is deprecated for integer data types;
                        // you should expect support for it to be removed in a future version of MySQL.
                        break;
                    case ( strpos( $type, 'bool' ) === 0 ):
                        list( $type, $size ) = ['tinyint', 4];
                        break;
                    case ( $type === 'double' || $type === 'float' ):
                        $type = $pado->float_type;
                        break;
                    case ( strpos( $type, 'decimal' ) !== false ):
                        $size = trim( preg_replace( '/^.*?\((.*?)\)$/', '$1', $type ) );
                        $props['size'] = $size;
                        if ( $size ) {
                            list( $m, $d ) = preg_split( '/\s*,\s*/', $size );
                            list( $m, $d ) = [(int)$m, (int)$d ];
                            if ( $m < 1 || $m > 65 || $d < 0 || $d > 35 || $m < $d ) {
                                $type = '';
                            } else {
                                $type = $pado->decimal_type;
                            }
                        } else {
                            $type = '';
                        }
                        break;
                    case ( $type === 'string' ):
                        $type = 'VARCHAR';
                        break;
                    case ( $type === 'text' ):
                        $type = $pado->text_type;
                        unset( $props['default'] );
                        break;
                    case ( $type === 'datetime' ):
                        $type = 'DATETIME';
                        break;
                    case ( $type === 'date' ):
                        $type = 'DATE';
                        break;
                    case ( $type === 'time' ):
                        $type = 'TIME';
                        break;
                    case ( $type === 'blob' ):
                        $type = $pado->blob_type;
                        unset( $props['default'] );
                        break;
                    default:
                        $type = '';
                    }
                    if (! $type ) {
                        if ( $pado->debug && $pado->debug != 4 ) {
                            $message = 'PADOBaseModelException: unknown type('
                                     . $props['type'] . ')';
                            $pado->errors[] = $message;
                            trigger_error( $message );
                        }
                        continue;
                    }
                    if ( isset( $props['size'] ) ) {
                        $type .= '(' . $props['size'] . ')';
                    }
                    if ( isset( $props['not_null'] ) ) {
                        $type .= ' NOT NULL';
                        if (! isset( $props['default'] ) && $type == 'DATETIME NOT NULL' && $pado->default_ts ) {
                            // TODO DATE snd TIME
                            $default_ts = $pado->default_ts;
                            if ( $default_ts != 'CURRENT_TIMESTAMP' ) {
                                $default_ts = $pado->quote( $default_ts );
                            }
                            $type .= " DEFAULT {$default_ts}";
                        }
                    }
                    if ( isset( $props['default'] ) ) {
                        // TODO validation
                        $vals[] = $props['default'];
                        $type .= ' DEFAULT ?';
                    }
                    if ( isset( $upgrade['indexes'] ) &&
                        isset( $upgrade['indexes']['delete'] ) ) {
                        if ( in_array( $name, array_keys($upgrade['indexes']['delete'] ) ) ) {
                            if (! empty( $indexes ) && isset( $indexes[ $name ] ) ) {
                                $sql = "ALTER TABLE {$quoted} DROP INDEX {$prefix}{$col_name}";
                                $idx_deleted[] = $col_name;
                                if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
                                $sth = $pdo->prepare( $sql );
                                try {
                                    $res = $sth->execute();
                                    $sth = null;
                                    if ( $pado->debug == 4 ) $pado->queries[] = $sql;
                                    ++$pado->query_cnt;
                                    $pado->stash( $sql, 1 );
                                } catch ( PDOException $e ) {
                                    $sth = null;
                                    $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                                    $pado->errors[] = $message;
                                    $pado->clear_query();
                                    trigger_error( $message );
                                    return false;
                                }
                            }
                        }
                    }
                    if ( in_array( $col_name, $mdlFields ) &&
                        isset( $props['not_null'] ) && isset( $props['type'] ) ) {
                        $defaultValue = isset( $props['default'] ) ? $props['default'] : null;
                        if ( stripos( $props['type'], 'int' ) !== false ) {
                            $defaultValue = $defaultValue ? $defaultValue : 0;
                            $defaultValue = (int) $defaultValue;
                        } else {
                            $defaultValue = '';
                        }
                        $defaultValue = $pdo->quote( $defaultValue );
                        $query = "UPDATE {$quoted} SET {$col_name}={$defaultValue} WHERE {$col_name} IS NULL";
                        if ( $pado->debug === 3 ) $pado->debugPrint( $query );
                        $pdo->query( $query );
                        if ( $pado->debug == 4 ) $pado->queries[] = $query;
                    } else {
                        if ( stripos( $props['type'], 'int' ) !== false ) {
                            $oldType = isset( $field_types[ $col_name ] )
                                     ? $field_types[ $col_name ] : '';
                            if ( $oldType && ( strpos( $oldType, 'text' ) !== false
                                || strpos( $oldType, 'varchar' ) !== false ) ) {
                                $query = "UPDATE {$quoted} SET {$col_name}='0' WHERE {$col_name}=''";
                                if ( $pado->debug === 3 ) $pado->debugPrint( $query );
                                $pdo->query( $query );
                                if ( $pado->debug == 4 ) $pado->queries[] = $query;
                            }
                        }
                    }
                    $statement = isset( $column_defs['new'][ $name ] ) ? 'ADD' : 'CHANGE';
                    $column_name = $col_name;
                    $col_name = $statement === 'CHANGE' ? $col_name . ' ' . $col_name : $col_name;
                    $sql = "ALTER TABLE {$quoted} {$statement} {$col_name} {$type}";
                    if ( $pado->stash( $sql ) && empty( $vals ) ) continue;
                    if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
                    $sth = $pdo->prepare( $sql );
                    try {
                        $res = $sth->execute( $vals );
                        $sth = null;
                        if ( $pado->debug == 4 ) $pado->queries[] = !empty( $vals )
                                         ? $sql . ' / values = ' . join( ', ', $vals )
                                         : $sql;
                        if ( isset( $pado->scheme[ $model ]['column_defs'][ $name ] ) ) {
                            $props = $pado->scheme[ $model ]['column_defs'][ $name ];
                            $defaultValue = null;
                            if ( isset( $props['default'] ) ) {
                                $defaultValue = $props['default'];
                                if ( stripos( $props['type'], 'int' ) !== false ) {
                                    $defaultValue = (int) $defaultValue;
                                } else if ( $props['type'] == 'string' || $props['type'] == 'varchar' || $props['type'] == 'text' ) {
                                    $defaultValue = $pdo->quote( $defaultValue );
                                }
                            } else if ( isset( $props['not_null'] ) ) {
                                if ( stripos( $props['type'], 'int' ) !== false ) {
                                    $defaultValue = 0;
                                } else if ( $props['type'] == 'string' || $props['type'] == 'varchar' || $props['type'] == 'text' ) {
                                    $defaultValue = "''";
                                }
                            }
                            if ( $defaultValue !== null ) {
                                if (! is_numeric( $defaultValue ) && ! $defaultValue ) {
                                    $defaultValue = "''";
                                }
                                $query = "UPDATE {$quoted} SET {$column_name}={$defaultValue} WHERE {$column_name} IS NULL";
                                $sql .= ';' . $query;
                                if ( $pado->debug === 3 ) $pado->debugPrint( $query );
                                $pdo->query( $query );
                                if ( $pado->debug == 4 ) $pado->queries[] = $query;
                            }
                        }
                        ++$pado->query_cnt;
                        $pado->stash( $sql, 1 );
                    } catch ( PDOException $e ) {
                        $sth = null;
                        $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                        $pado->errors[] = $message;
                        $pado->clear_query();
                        trigger_error( $message );
                        return false;
                    }
                }
            }
            if ( $pado->can_drop ) {
                $delete = $column_defs['delete'];
                if (! empty( $delete ) ) {
                    foreach ( $delete as $name => $props ) {
                        $sql = '';
                        if ( in_array( $name, $mdlFields ) ) {
                            $sql = "ALTER TABLE {$quoted} DROP {$name}";
                        } else if ( in_array( "{$colprefix}{$name}", $mdlFields ) ) {
                            $sql = "ALTER TABLE {$quoted} DROP {$colprefix}{$name}";
                        }
                        if (! $sql || $pado->stash( $sql ) ) continue;
                        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
                        $sth = $pdo->prepare( $sql );
                        try {
                            $res = $sth->execute();
                            if ( $pado->debug == 4 ) $pado->queries[] = $sql;
                            ++$pado->query_cnt;
                            $pado->stash( $sql, 1 );
                        } catch ( PDOException $e ) {
                            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                            $pado->errors[] = $message;
                            $pado->clear_query();
                            trigger_error( $message );
                        }
                        $sth = null;
                    }
                }
            }
        }
        $sql = "SHOW INDEX FROM {$quoted}";
        $sth = $pdo->prepare( $sql );
        $existing_idx = $pdo->query( $sql )->fetchAll();
        if ( $pado->debug == 4 ) $pado->queries[] = $sql;
        $existing_idxs = [];
        foreach ( $existing_idx as $idx ) {
            $existing_idxs[ $idx['Key_name'] ] = true;
        }
        if ( isset( $upgrade['indexes'] ) && isset( $upgrade['indexes']['delete'] ) ) {
            $for_delete = array_keys( $upgrade['indexes']['delete'] );
            foreach ( $for_delete as $delete ) {
                if (! in_array( $delete, $idx_deleted ) ) {
                    $delete_inx = "{$prefix}{$colprefix}{$delete}";
                    if ( isset( $existing_idxs[ $delete_inx ] ) ) {
                        $sql = "ALTER TABLE {$quoted} DROP INDEX {$delete_inx}";
                        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
                        $sth = $pdo->prepare( $sql );
                        try {
                            $res = $sth->execute();
                            $sth = null;
                            if ( $pado->debug == 4 ) $pado->queries[] = $sql;
                            ++$pado->query_cnt;
                            $pado->stash( $sql, 1 );
                        } catch ( PDOException $e ) {
                            $sth = null;
                            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                            $pado->errors[] = $message;
                            $pado->clear_query();
                            trigger_error( $message );
                            return false;
                        }
                    }
                }
            }
        }
        $indexes = $upgrade['indexes'];
        if ( is_array( $indexes ) ) {
            $update = array_merge( $indexes['delete'], $indexes['changed'] );
            if (! empty( $update ) ) {
                foreach ( $update as $name => $props ) {
                    if ( $name === 'PRIMARY' ) {
                        $message = 'PADOBaseModelException: PRIMARY KEY could not be changed.';
                        $pado->errors[] = $message;
                        trigger_error( $message );
                        continue;
                    }
                    if ( isset( $indexes['changed'][ $name ] ) || $this->pado()->can_drop ) {
                        if ( isset( $sql ) ) {
                            if ( $pado->stash( $sql ) ) continue;
                            if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
                            $sth = $pdo->prepare( $sql );
                            try {
                                $res = $sth->execute();
                                if ( $pado->debug == 4 ) $pado->queries[] = $sql;
                                ++$pado->query_cnt;
                                $pado->stash( $sql, 1 );
                            } catch ( PDOException $e ) {
                                $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                                $pado->errors[] = $message;
                                $pado->clear_query();
                                trigger_error( $message );
                            }
                            $sth = null;
                        }
                    }
                }
            }
            $update = array_merge( $indexes['new'], $indexes['changed'] );
            if (! empty( $update ) ) {
                foreach ( $update as $name => $props ) {
                    if ( is_string( $props ) ) {
                        $props = explode( ',', $props );
                    }
                    if ( $colprefix ) {
                        if (! is_array( $props ) && is_string( $props ) ) {
                            $props = [ $props ]; // Why you are is_astring?
                        }
                        array_walk( $props, function( &$col, $num, $pfx = null ){
                            $col = strpos( $col, $pfx ) !== 0 ? $pfx . $col : $col;
                        }, $colprefix );
                    }
                    $props = join( ',', $props );
                    if ( $name === 'PRIMARY' ) {
                        trigger_error(
                        'PADOBaseModelException: PRIMARY KEY could not be changed.' );
                        continue;
                    } else {
                        $name = $table . '_' . $name;
                        if ( isset( $existing_idxs[ $name ] ) ) {
                            continue;
                        }
                        $sql = "CREATE INDEX {$name} ON {$quoted}({$props})";
                        if ( $pado->stash( $sql ) ) continue;
                        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
                    }
                    $sth = $pdo->prepare( $sql );
                    try {
                        $res = $sth->execute();
                        if ( $pado->debug == 4 ) $pado->queries[] = $sql;
                        ++$pado->query_cnt;
                        $pado->stash( $sql, 1 );
                    } catch ( PDOException $e ) {
                        trigger_error( 'PDOException: ' . $e->getMessage() . ", {$sql}" );
                        $pado->clear_query();
                        $sth = null;
                        return false;
                    }
                    $sth = null;
                }
            }
        }
        return $res;
    }

/**
 * BULK INSERT or UPDATE the objects.
 */
    function update_multi ( $objects, $update = true, $unique_key = '', $cols = '*' ) {
        // todo bulk_update_per = 1000?
        $objects = array_values( array_filter( $objects ) );
        if ( empty( $objects ) ) return;
        $pado = $this->pado();
        $model = $this->_model;
        $has_blob = false;
        if ( $pado->blob2file ) {
            $blob_cols = $pado->get_blob_cols( $model );
            $has_blob = count( $blob_cols );
        }
        $i = 0;
        $object_keys = '';
        $vals = [];
        $stmts = [];
        $unique_keys = [];
        $update_stmt = '';
        $model = '';
        $ids = [];
        list( $id_column, $colprefix, $table ) = ['', '', ''];
        $updated_ids = [];
        foreach ( $objects as $obj ) {
            if ( $obj->id ) {
                if ( isset( $updated_ids[ $obj->id ] ) ) {
                    continue;
                }
                $updated_ids[ $obj->id ] = true;
            }
            if ( $pado->blob2file  && $has_blob ) {
                $obj->save();
                continue;
            }
            if (! $i ) {
                $id_column = $obj->_id_column;
                $colprefix = $obj->_colprefix;
                $table = $obj->_table;
                $model = $obj->_model;
            }
            if ( $model && $model != $obj->_model ) {
                $message = 'PADOBaseModelException: Wrong model in objects.';
                $pado->errors[] = $message;
                trigger_error( $message );
                return;
            }
            $i++;
            $callback = ['name' => 'save_filter'];
            $save_filter = $pado->run_callbacks( $callback, $obj->_model, $obj, true );
            if (! $save_filter ) continue;
            $arr = $obj->get_values();
            $id = $obj->$id_column;
            $arr = $obj->validation( $arr, $update );
            ksort( $arr );
            unset( $arr[ $id_column ] );
            $keys = array_keys( $arr );
            array_unshift( $keys, $id_column );
            if (! $object_keys ) {
                $object_keys = join( ',', $keys );
                $updates = [];
                foreach ( $keys as $key ) {
                    $updates[] = "{$key}=VALUES({$key})";
                }
                $update_stmt = join( ',', $updates );
            } else {
                if ( $object_keys !== join( ',', $keys ) ) {
                    $obj->save();
                    continue;
                    /*
                    $message = 'PADOBaseModelException: Unequal column designation.';
                    $pado->errors[] = $message;
                    trigger_error( $message );
                    continue;
                    */
                }
            }
            $values = array_values( $arr );
            if (! $id ) {
                $id = "null";
            } else {
                $ids[] = $id;
            }
            $stmt = "({$id},";
            foreach ( $values as $v ) {
                $stmt .= '?,';
            }
            $stmt = rtrim( $stmt, ',' );
            $stmt .= ')';
            $stmts[] = $stmt;
            $vals = array_merge( $vals, $values );
            $callback = ['name' => 'pre_save'];
            $pado->run_callbacks( $callback, $obj->_model, $obj );
            if ( $unique_key && $obj->has_column( $unique_key, true ) ) {
                $unique_keys[] = $obj->$unique_key;
            }
        }
        if ( $pado->blob2file && $has_blob ) {
            return true;
        }
        $sql = "INSERT INTO {$table} ($object_keys) VALUES ";
        $sql .= join( ',', $stmts );
        $sql .= "ON DUPLICATE KEY UPDATE {$update_stmt}";
        if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
            $pado->reconnect();
        }
        $pdo = $pado->db;
        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
        $sth = $pdo->prepare( $sql );
        try {
            if ( $pado->debug == 4 ) {
                $start = microtime( true );
            }
            $res = $sth->execute( $vals );
            if ( $pado->debug == 4 ) {
                $query = !empty( $vals )
                             ? $sql . ' / values = ' . join( ', ', $vals )
                             : $sql;
                $end = microtime( true ) - $start;
                $end = round( $end, 3 );
                if ( $end ) {
                    $query .= "(It took {$end} seconds.)";
                }
                $pado->queries[] = $query;
            }
            if ( !in_array( $model, $pado->not_cache ) ) {
                if ( $pado->update_multi ) {
                    $update_ids = isset( $pado->update_objects[ $model ] )
                         ? $pado->update_objects[ $model ] : [];
                    foreach ( $ids as $id ) {
                        $update_ids[] = $id;
                    }
                    $pado->update_objects[ $model ] = $update_ids;
                } else {
                    foreach ( $ids as $id ) {
                        $pado->clear_query( $model, $id, true );
                    }
                    $pado->clear_query( $model );
                }
            }
            ++$pado->query_cnt;
        } catch ( PDOException $e ) {
            $sth = null;
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $pado->errors[] = $message;
            if ( !in_array( $model, $pado->not_cache ) ) {
                $pado->clear_query( $model, null, false, true );
            }
            $pado->clear_query();
            trigger_error( $message );
            return $this->retry( $pado, $sth, $message, 'update_multi', $objects, $update );
        }
        $sth = null;
        if ( $unique_key ) {
            if (! empty( $unique_keys ) ) {
                $terms = [ $unique_key => ['IN' => $unique_keys ] ];
                return $this->load( $terms, null, $cols );
            }
            return [];
        }
        return true;
    }

/**
 * BULK Remove the objects.
 */
    function remove_multi ( $objects ) {
        $objects = array_values( array_filter( $objects ) );
        if ( empty( $objects ) ) return;
        $pado = $this->pado();
        $model = $this->_model;
        $has_blob = false;
        if ( $pado->blob2file ) {
            if (! $model && is_array( $objects ) && $objects[0]->_model ) {
                $model = $objects[0]->_model;
                $this->_model = $model;
            }
            if ( $model ) {
                $blob_cols = $pado->get_blob_cols( $model );
                $has_blob = count( $blob_cols );
            }
        }
        $i = 0;
        $ids = [];
        list( $id_column, $colprefix, $table ) = ['', '', ''];
        $model = '';
        $removed_ids = [];
        foreach ( $objects as $obj ) {
            if ( isset( $removed_ids[ $obj->id ] ) ) {
                continue;
            }
            $removed_ids[ $obj->id ] = true;
            if ( $pado->blob2file && $has_blob ) {
                $obj->remove();
                continue;
            }
            if (! $i ) {
                $id_column = $obj->_id_column;
                $table = $obj->_table;
                $colprefix = $obj->_colprefix;
                $model = $obj->_model;
            }
            if ( $model && $model != $obj->_model ) {
                $message = 'PADOBaseModelException: Wrong model in objects.';
                $pado->errors[] = $message;
                trigger_error( $message );
                return;
            }
            $i++;
            $callback = ['name' => 'delete_filter'];
            $delete_filter = $pado->run_callbacks( $callback, $obj->_model, $obj, true );
            if (! $delete_filter ) continue;
            $id = (int) $obj->$id_column;
            if (! $id ) continue;
            $ids[] = $id;
        }
        if ( $pado->blob2file  && $has_blob ) {
            return true;
        }
        if ( empty( $ids ) ) return;
        $_ids = join( ',', $ids );
        $sql = "DELETE FROM {$table} WHERE {$colprefix}id IN ({$_ids})";
        if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
            $pado->reconnect();
        }
        $pdo = $pado->db;
        $sth = $pdo->prepare( $sql );
        try {
            if ( $pado->debug == 4 ) {
                $start = microtime( true );
            }
            $res = $sth->execute();
            if ( $pado->debug == 4 ) {
                $end = microtime( true ) - $start;
                $end = round( $end, 3 );
                if ( $end ) {
                    $sql .= "(It took {$end} seconds.)";
                }
                $pado->queries[] = $sql;
            } else if ( $pado->debug === 3 ) {
                $pado->debugPrint( $sql );
            }
            ++$pado->query_cnt;
            $sth = null;
            if ( !in_array( $model, $pado->not_cache ) ) {
                $pado->clear_query( $model );
            }
            return true;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $pado->errors[] = $message;
            if ( !in_array( $model, $pado->not_cache ) ) {
                $pado->clear_query( $model, null, false, true );
            }
            $pado->clear_query();
            trigger_error( $message );
            return $this->retry( $pado, $sth, $message, 'remove_multi', $objects );
        }
    }

/**
 * Create a new table.
 */
    function create_table ( $model, $table, $colprefix, $scheme, $set_scheme = false ) {
        $column_defs = $scheme['column_defs'];
        $indexes = $scheme['indexes'];
        $primary = $indexes['PRIMARY'];
        $primary = is_array( $primary ) ? join( ',', $primary ) : $primary;
        $props = $column_defs[ $primary ];
        $size = isset( $props['size'] ) ? $props['size'] : 0;
        $vals = [];
        $default = ' ';
        if ( isset( $props['default'] ) ) {
            $default = ' DEFAULT ? ';
            $vals[] = $props['default'];
        }
        $type = strtoupper( $props['type'] );
        $pado = $this->pado();
        if ( $type == 'INT' ) $type = $pado->int_type;
        $not_null = isset( $props['not_null'] ) ? ' NOT NULL ' : ' ';
        // $type = $size ? $type . '(' . $size . ')' : $type;
        // As of MySQL 8.0.17, the display width attribute is deprecated for integer data types;
        // you should expect support for it to be removed in a future version of MySQL.
        $quoted = $pado->quote_model( $table );
        $sql  = "CREATE TABLE {$quoted} (\n";
        $sql .= "{$colprefix}{$primary} {$type}{$not_null}AUTO_INCREMENT,"
             .  "PRIMARY KEY ({$colprefix}{$primary}) )";
        if ( self::$_engine ) $sql .= ' ENGINE=' . self::$_engine;
        $dbcompress = null;
        if ( $pado->dbcompress && $this->can_compress() ) {
            $dbcompress = $pado->dbcompress;
            if ( $dbcompress === 'zlib' || $dbcompress === 'lz4'
                || $dbcompress === 'none' ) {
                $dbcompress = $pado->dbcompress;
                $sql .= " COMPRESSION='{$dbcompress}'";
                // ROW_FORMAT=Compact ?
            } else {
                $sql .= " ROW_FORMAT=Compressed KEY_BLOCK_SIZE=8";
            }
        }
        $charset = defined( 'PADO_DB_CHARSET' ) ? PADO_DB_CHARSET : $pado->dbcharset;
        if ( $charset ) $sql .= ' DEFAULT CHARSET=' . $charset;
        $collation = defined( 'PADO_DB_COLLATION' ) ? PADO_DB_COLLATION : $pado->collation;
        if ( $collation ) $sql .= ' COLLATE ' . $collation;
        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
        if ( $pado->query_cnt > $pado->max_queries && ! $pado->txn_active ) {
            $pado->reconnect();
        }
        $sth = $pado->db->prepare( $sql );
        try {
            if ( $pado->debug == 4 ) {
                $start = microtime( true );
            }
            $res = $sth->execute( $vals );
            if ( $pado->debug == 4 ) {
                $end = microtime( true ) - $start;
                $end = round( $end, 3 );
                if ( $end ) {
                    $sql .= "(It took {$end} seconds.)";
                }
                $pado->queries[] = $sql;
            }
            ++$pado->query_cnt;
            if ( $pado->upgrader ) {
                if ( $set_scheme ) $this->_scheme = $scheme;
                $upgrade = $this->check_upgrade( $model, $table, $colprefix );
                if ( $upgrade !== false )
                    return $this->upgrade( $table, $upgrade, $colprefix );
            }
            $sth = null;
            return $res;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $pado->errors[] = $message;
            $pado->clear_query();
            trigger_error( $message );
            return $this->retry( $pado, $sth, $message, 'create_table',
                $model, $table, $colprefix, $scheme );
        }
    }

    function compress_all ( $dbcompress = true ) {
        if (! $this->can_compress() ) {
            return false;
        }
        $pado = $this->pado();
        $dbh = $pado->db;
        $upgrade = false;
        try {
            $tables = $dbh->query( 'SHOW TABLE STATUS' )->fetchAll();
            foreach ( $tables as $table ) {
                $table_name = $table['Name'];
                $table_engine = $table['Engine'];
                if ( $table_engine == 'InnoDB' ) {
                    $sql = '';
                    if ( $dbcompress === 'zlib' ||
                         $dbcompress === 'lz4' || $dbcompress === 'none' ) {
                        $sql = "ALTER TABLE {$table_name} COMPRESSION='{$dbcompress}'";
                    } else {
                        if ( $table['Row_format'] != 'Compressed' ) {
                            $sql = "ALTER TABLE {$table_name} ROW_FORMAT=Compressed "
                                 . "KEY_BLOCK_SIZE=8";
                        }
                    }
                    if ( $sql ) {
                        if ( $pado->debug === 3 ) $pado->debugPrint( $sql );
                        $sth = $dbh->prepare( $sql );
                        $sth->execute();
                        $sth = null;
                        $upgrade = true;
                    }
                }
            }
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $pado->errors[] = $message;
            $pado->clear_query();
            trigger_error( $message );
            return false;
        }
        return $upgrade;
    }

    function can_compress ( $table_name = '', $upgrade = false ) {
        $result = false;
        $pado = $this->pado();
        $dbh = $pado->db;
        $dbcompress = $pado->dbcompress;
        if ( $dbcompress === 'zlib' || $dbcompress === 'lz4' || $dbcompress === 'none' ) {
            $version = $dbh->query( 'select version()' )->fetchAll();
            $version = $version[0][0];
            preg_match( "/^[0-9\.]+/", $version, $match );
            $version = (float) $match[0];
            if ( $version >= 5.7 ) {
                $result = true;
                if (! $table_name || ! $upgrade ) {
                    return $result;
                } else if ( $table_name && $upgrade ) {
                    try {
                        // https://bugs.mysql.com/bug.php?id=88843
                        $quoted = $pado->quote_model( $table_name );
                        $sql = "ALTER TABLE {$quoted} COMPRESSION='{$dbcompress}'";
                        $sth = $dbh->prepare( $sql );
                        $sth->execute();
                        $sth = null;
                        return $result;
                    } catch ( PDOException $e ) {
                        $sth = null;
                        $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                        $pado->errors[] = $message;
                        $pado->clear_query();
                        trigger_error( $message );
                        return false;
                    }
                }
            }
            return $result;
        }
        $responce = [];
        try {
            $sql = "SHOW VARIABLES LIKE 'innodb_file_per_table'";
            $sth = $dbh->prepare( $sql );
            $sth->execute();
            $responce = $sth->fetchAll();
            $sth = null;
        } catch ( PDOException $e ) {
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            $pado->errors[] = $message;
            $pado->clear_query();
            trigger_error( $message );
            return false;
        }
        if ( count( $responce ) ) {
            $responce = $responce[0];
            if ( isset( $responce['Value'] ) && $responce['Value'] == 'ON' ) {
                try {
                    $sql = "SHOW VARIABLES LIKE 'innodb_file_format'";
                    $sth = $dbh->prepare( $sql );
                    $sth->execute();
                    $responce = $sth->fetchAll();
                    if ( count( $responce ) ) {
                        $responce = $responce[0];
                        if ( isset( $responce['Value'] ) && $responce['Value'] == 'Barracuda' ) {
                            $result = true;
                        }
                    }
                } catch ( PDOException $e ) {
                    $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                    $pado->errors[] = $message;
                    $pado->clear_query();
                    trigger_error( $message );
                    return false;
                }
            }
        }
        if ( $result && $table_name ) {
            try {
                $quoted = $pado->quote( $table_name );
                $sql = "SHOW TABLE STATUS LIKE {$quoted}";
                $sth = $dbh->prepare( $sql );
                $sth->execute();
                $responce = $sth->fetchAll();
                $sth = null;
                if ( count( $responce ) ) {
                    $responce = $responce[0];
                    if ( isset( $responce['Row_format'] )
                        && $responce['Row_format'] != 'Compressed' ) {
                        if (! $upgrade ) return $result;
                        $quoted = $pado->quote_model( $table_name );
                        $sql = "ALTER TABLE {$quoted} ROW_FORMAT=Compressed "
                             . "KEY_BLOCK_SIZE=8";
                        try {
                            $sth = $dbh->prepare( $sql );
                            $sth->execute();
                        } catch ( PDOException $e ) {
                            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                            $pado->errors[] = $message;
                            $pado->clear_query();
                            trigger_error( $message );
                            return false;
                        }
                    }
                }
            } catch ( PDOException $e ) {
                $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                $pado->errors[] = $message;
                $pado->clear_query();
                trigger_error( $message );
                return false;
            }
        }
        return $result;
    }
}
