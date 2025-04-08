<?php
// cd path/to/powercmsx; php sudo -u apache ./tools/repair.php
// cd path/to/powercmsx; php sudo -u apache ./tools/repair.php --models model_1,model_2... --dry_run 1 --debug 1
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'Worker'] );
$app->logging  = true;
$app->init();
$app->caching = false;
$app->db->caching = false;
if (!isset( $argv ) ) {
    $argv = [];
}
$pid = $app->temp_dir . DS . md5( __FILE__ ) . '.pid';
if ( file_exists( $pid ) ) {
    $worker_period = $app->worker_period;
    $mtime = filemtime( $pid );
    if ( ( time() - $worker_period ) < $mtime ) {
        echo date( "Y-m-d H:i:s " ), $app->translate( "%s skipped (the file %s already exists).", [ basename( __FILE__ ), $pid ] ), PHP_EOL;
        exit();
    }
    unlink( $pid );
}
touch( $pid );
$app->pid = $pid;
if (!isset( $argv ) ) {
    $argv = [];
}
array_shift( $argv );
$pdo = $app->db->db;
$models = [];
if ( in_array( '--models', $argv ) ) {
    $idx = array_search( '--models', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $models = preg_split( '/\s*,\s*/', strtolower( $argv[ $idx + 1] ) );
        unset( $argv[ $idx + 1] );
        foreach ( $models as $idx => $model ) {
            if ( strpos( $model, 'mt_' ) !== 0 ) {
                $models[ $idx ] = "mt_{$model}";
            }
        }
    }
    unset( $argv[ $idx ] );
} else {
    $sql = 'SHOW TABLES;';
    $query = $pdo->query( 'SHOW TABLES' );
    $models = $query->fetchAll( PDO::FETCH_COLUMN );
}
$dry_run = false;
if ( in_array( '--dry_run', $argv ) ) {
    $idx = array_search( '--dry_run', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $dry_run = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
$debug = false;
if ( in_array( '--debug', $argv ) ) {
    $idx = array_search( '--debug', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $debug = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( empty( $models ) ) {
    echo $app->translate( 'Model not specified.' ), PHP_EOL;
    exit();
}
if ( $debug ) {
    $dry_run = true;
}
$done = false;
$success = false;
foreach ( $models as $counter => $model ) {
    if (! $model ) continue;
    if ( strpos( $model, 'mt_' ) !== 0 ) {
        if ( $model !== 'pt_cache' ) {
            echo $app->translate( 'Unknown Model %s.', $model ), PHP_EOL;
        }
        continue;
    }
    $model = preg_replace( '/^mt_/', '', $model );
    $scheme = $app->get_scheme_from_db( $model, true );
    if ( $scheme === null ) {
        $app->db->model( $model )->set_scheme_from_json( $model );
        $scheme = isset( $app->db->scheme[ $model ] ) ? $app->db->scheme[ $model ] : null;
        if ( $scheme === null ) {
            echo $app->translate( 'Unknown Model %s.', $model ), PHP_EOL;
            continue;
        }
    }
    $column_defs = $scheme['column_defs'];
    $column_indexes = $scheme['indexes'] ?? [];
    if ( $debug ) {
        $repeat = str_repeat( '=', 30 - strlen( $model ) );
        if ( $counter ) {
            echo PHP_EOL;
        }
        echo "{$model} {$repeat}", PHP_EOL, PHP_EOL;
        echo 'column_defs : ', PHP_EOL, PHP_EOL;
        var_dump( $column_defs );
        echo PHP_EOL, 'indexes : ', PHP_EOL, PHP_EOL;
        var_dump( $column_indexes );
    }
    unset( $column_indexes['PRIMARY'] );
    $sql = "SHOW COLUMNS FROM mt_{$model}";
    $sth = $pdo->prepare( $sql );
    $sth->execute();
    $columns = $sth->fetchAll();
    if ( $debug ) {
        echo PHP_EOL, $sql, PHP_EOL, PHP_EOL;
        var_dump( $columns );
        echo PHP_EOL;
    }
    $sql = "SHOW INDEX FROM mt_{$model}";
    $sth = $pdo->prepare( $sql );
    $sth->execute();
    $indexes = $sth->fetchAll();
    if ( $debug ) {
        echo $sql, PHP_EOL, PHP_EOL;
        var_dump( $indexes );
        echo PHP_EOL;
    }
    foreach ( $column_indexes as $column_idx => $index_name ) {
        if ( is_array( $index_name ) ) {
            // Composite index is not support.
            unset( $column_indexes[ $column_idx ] );
        }
    }
    $db_indexes = [];
    foreach ( $indexes as $index ) {
        $Key_name = $index['Key_name'];
        if ( $Key_name == 'PRIMARY' ) {
            continue;
        }
        $Column_name = $index['Column_name'];
        $Column_name = preg_replace( "/^{$model}_/", '', $Column_name );
        $db_indexes[] = $Column_name;
    }
    $add_indexes = [];
    $remove_indexes = [];
    $add_columns = [];
    $remove_columns = [];
    $changed_columns = [];
    foreach ( $column_indexes as $column_idx => $index_name ) {
        if ( in_array( $column_idx, $db_indexes ) ) {
            continue;
        }
        $add_indexes[] = $column_idx;
    }
    foreach ( $db_indexes as $db_index ) {
        if ( isset( $column_indexes[ $db_index ] ) ) {
            continue;
        }
        $remove_indexes[] = $db_index;
    }
    foreach ( $columns as $column ) {
        $field = $column['Field'];
        $field = preg_replace( "/^{$model}_/", '', $field );
        $remove_columns[ $field ] = $column;
    }
    foreach ( $column_defs as $key => $props ) {
        if ( $props['type'] == 'relation' ) {
            unset( $remove_columns[ $key ] );
            continue;
        }
        $db_props = $remove_columns[ $key ] ?? null;
        if (! isset( $remove_columns[ $key ] ) ) {
            $add_columns[ $key ] = $props;
            continue;
        }
        unset( $remove_columns[ $key ] );
        if ( $key == 'id' ) {
            continue;
        }
        $type = $db_props['Type'];
        /*
        if ( isset( $props['default'] ) && $props['default'] ) {
            if ( $db_props['Default'] != $props['default'] ) {
                $changed_columns[ $key ] = $props;
                continue;
            }
        }
        */
        if ( isset( $props['not_null'] ) && $props['not_null'] ) {
            if ( $db_props['Null'] != 'NO' ) {
                $changed_columns[ $key ] = $props;
                continue;
            }
        }
        if ( $props['type'] == 'string' ) {
            $size = preg_replace( '/^.*\((.*?)\).*$/', '$1', $type );
            if ( $size == $props['size'] ) {
                continue;
            }
        } else if ( $props['type'] == 'text' ) {
            if ( $type == 'longtext' ) {
                continue;
            }
        } else if ( $props['type'] == 'blob' ) {
            if ( $type == 'longblob' ) {
                continue;
            }
        } else if ( $props['type'] == 'int' ) {
            // As of MySQL 8.0.17, the display width attribute is deprecated for integer data types;
            // you should expect support for it to be removed in a future version of MySQL.
            if ( stripos( $type, 'bigint' ) === 0 ) {
                continue;
            }
        } else if ( $props['type'] == 'tinyint' ) {
            // As of MySQL 8.0.17, the display width attribute is deprecated for integer data types;
            // you should expect support for it to be removed in a future version of MySQL.
            if ( stripos( $type, 'tinyint' ) === 0 ) {
                continue;
            }
        } else if ( $props['type'] == 'datetime' ) {
            if ( $type == 'datetime' ) {
                continue;
            }
        } else if ( $props['type'] == 'float' ) {
            if ( $type == 'double' ) {
                continue;
            }
        } else if ( $props['type'] == 'decimal' ) {
            if ( $type == 'decimal' ) {
                continue;
            }
        }
        $changed_columns[ $key ] = $props;
    }
    $pado = $app->db;
    $vals = [];
    foreach ( $add_columns as $column => $prop ) {
        $type = $prop['type'];
        $size = 0;
        if ( isset( $props['size'] ) ) {
            $size = $props['size'];
        }
        $vals = [];
        $type = pt_repair_get_type( $type, $prop, $pado, $vals );
        $sql = "ALTER TABLE mt_{$model} ADD {$model}_{$column} {$type}";
        $sth = $pdo->prepare( $sql );
        $done = true;
        try {
            if (! $dry_run ) {
                $res = !empty( $vals ) ? $sth->execute( $vals ) : $sth->execute();
                $success = true;
            }
            $sth = null;
            echo "EXECUTE SQL '{$sql}'", PHP_EOL;
        } catch ( PDOException $e ) {
            $sth = null;
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            echo $message, PHP_EOL;
        }
    }
    $dateValue = "'" . date( 'Y-m-d H:i:s' ) . "'";
    foreach ( $changed_columns as $column => $prop ) {
        $type = $prop['type'];
        $size = 0;
        if ( isset( $props['size'] ) ) {
            $size = $props['size'];
        }
        $vals = [];
        $type = pt_repair_get_type( $type, $prop, $pado, $vals );
        if ( stripos( $type, 'NOT NULL' ) !== false ) {
            $defaultValue = "''";
            if ( stripos( $prop['type'], 'int' ) !== false ) {
                $defaultValue = 0;
            } else if ( $prop['type'] == 'datetime' ) {
                $defaultValue = $dateValue;
            }
            $sql = "UPDATE mt_{$model} SET {$model}_{$column}={$defaultValue} WHERE {$model}_{$column} IS NULL";
            try {
                if (! $dry_run ) {
                    $pdo->query( $sql );
                }
                echo "EXECUTE SQL '{$sql}'", PHP_EOL;
            } catch ( PDOException $e ) {
                $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
                echo $message, PHP_EOL;
            }
        }
        $sql = "ALTER TABLE mt_{$model} CHANGE {$model}_{$column} {$model}_{$column} {$type}";
        $sth = $pdo->prepare( $sql );
        $done = true;
        try {
            if (! $dry_run ) {
                $res = !empty( $vals ) ? $sth->execute( $vals ) : $sth->execute();
                $success = true;
            }
            $sth = null;
            echo "EXECUTE SQL '{$sql}'", PHP_EOL;
        } catch ( PDOException $e ) {
            $sth = null;
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            echo $message, PHP_EOL;
        }
    }
    foreach ( $add_indexes as $add_index ) {
        $sql = "CREATE INDEX {$model}_{$add_index} ON mt_{$model}({$model}_{$add_index})";
        $sth = $pdo->prepare( $sql );
        $done = true;
        try {
            if (! $dry_run ) {
                $res = $sth->execute();
                $success = true;
            }
            $sth = null;
            echo "EXECUTE SQL '{$sql}'", PHP_EOL;
        } catch ( PDOException $e ) {
            $sth = null;
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            echo $message, PHP_EOL;
        }
    }
    foreach ( $remove_indexes as $remove_index ) {
        $sql = "ALTER TABLE mt_{$model} DROP INDEX mt_{$model}_{$add_index}";
        $sth = $pdo->prepare( $sql );
        $done = true;
        try {
            if (! $dry_run ) {
                $res = $sth->execute();
                $success = true;
            }
            $sth = null;
            echo "EXECUTE SQL '{$sql}'", PHP_EOL;
        } catch ( PDOException $e ) {
            $sth = null;
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            echo $message, PHP_EOL;
        }
    }
    foreach ( $remove_columns as $column => $prop ) {
        $sql = "ALTER TABLE mt_{$model} DROP {$model}_{$column}";
        $sth = $pdo->prepare( $sql );
        $done = true;
        try {
            if (! $dry_run ) {
                $res = $sth->execute();
                $success = true;
            }
            $sth = null;
            echo "EXECUTE SQL '{$sql}'", PHP_EOL;
        } catch ( PDOException $e ) {
            $sth = null;
            $message = 'PDOException: ' . $e->getMessage() . ", {$sql}";
            echo $message, PHP_EOL;
        }
    }
}
if ( $done ) {
    if (! $dry_run && $success ) {
        $app->clear_all_cache( false );
    }
} else {
    echo $app->translate( 'There is no model to repair.' ), PHP_EOL;
}
unlink( $pid );
function pt_repair_get_type ( $type, $props, $pado, &$vals = [] ) {
    switch ( true ) {
    case ( stripos( $type, 'int' ) !== false ):
        $type = $type == 'tinyint' ? strtoupper( $type ) : $pado->int_type;
        break;
    case ( stripos( $type, 'bool' ) === 0 ):
        list( $type, $size ) = ['TINYINT', 4];
        break;
    case ( $type === 'double' || $type === 'float' ):
        $type = $pado->float_type;
        break;
    case ( stripos( $type, 'decimal' ) !== false ):
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
    if ( isset( $props['size'] ) && stripos( $type, 'int' ) === false ) {
        $type .= '(' . $props['size'] . ')';
    }
    if ( isset( $props['not_null'] ) ) {
        $type .= ' NOT NULL';
    }
    /*
    if ( isset( $props['default'] ) ) {
        $vals[] = $props['default'];
        $type .= ' DEFAULT ?';
    }
    */
    return $type;
}