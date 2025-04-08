<?php
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
@ini_set( 'memory_limit', -1 );
require_once( 'class.Prototype.php' );
$app = new Prototype();
$app->logging = true;
$app->init();
$db = $app->db;
$db->caching = false;
$blob_path = $db->blob_path;
if (! $blob_path ) {
    echo 'PADO::blob_path not specified.';
    exit();
}
$tables = $db->show_tables();
$pfx = preg_quote( DB_PREFIX, '/' );
$counter = 0;
$db->blob2file = false;
$db->blob_path = '';
foreach ( $tables as $key => $table ) {
    $key = array_keys( $table )[0];
    $tbl_name = $table[ $key ];
    $tbl_name = preg_replace( "/^$pfx/", '', $tbl_name );
    if ( $tbl_name == 'pt_cache' ) {
        continue;
    }
    $app->get_scheme_from_db( $tbl_name );
    $model = $db->model( $tbl_name );
    $db->caching = false;
    $blob_cols = $db->get_blob_cols( $tbl_name );
    $objects = $model->load( null, [], 'id' );
    $optimize = false;
    if (! empty( $blob_cols ) ) {
        foreach ( $objects as $obj ) {
            $db->blob2file = false;
            $db->blob_path = '';
            $object_vars = ['id' => $obj->id ];
            $update = false;
            foreach ( $blob_cols as $blob_col ) {
                $obj = $model->load( (int) $obj->id, [], 'id,' . $blob_col );
                if ( $value = $obj->$blob_col ) {
                    if ( strpos( $value, 'a:1:{s:8:"basename";s:' ) !== 0 ) {
                        $blob = $blob_path . $obj->_model;
                        if (!is_dir( $blob ) ) {
                            mkdir( $blob, 0777, true );
                        }
                        $basename = $db->generate_uuid( $blob );
                        $blob = $blob . DS . $basename;
                        file_put_contents( $blob, $value );
                        $value = ['basename' => $basename ];
                        $value = serialize( $value );
                        $object_vars[ $blob_col ] = $value;
                        $update = true;
                        $counter++;
                    }
                }
            }
            if ( $update ) {
                list ( $id, $conds, $vals ) = ['', [], [] ];
                foreach ( $object_vars as $col => $value ) {
                    if ( $col == 'id' ) {
                        $id = (int) $value;
                    } else {
                        $conds[] = "{$col}='{$value}'";
                    }
                }
                $condition = implode( ',', $conds );
                $sql = "UPDATE {$pfx}{$tbl_name} SET {$condition} WHERE {$tbl_name}_id={$id}";
                $pdo = $db->db;
                $sth = $pdo->query( $sql );
                $sth = null;
                $optimize = true;
            }
        }
        if ( $optimize ) {
            $pdo = $db->db;
            $table_name = DB_PREFIX . $tbl_name;
            $sql = "OPTIMIZE TABLE {$table_name}";
            $sth = $pdo->query( $sql );
            $sth = null;
        }
    }
}
if ( $counter ) {
    echo "Saved {$counter} blob(s) to file.", PHP_EOL;
} else {
    echo "No blob found to save file.", PHP_EOL;
}
