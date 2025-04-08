<?php
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype();
$app->logging = true;
$app->init();
$db = $app->db;
$blob_path = $db->blob_path;
if (! $blob_path ) {
    echo 'PADO::blob_path not specified.';
    exit();
}
$db->caching = false;
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
    $blob_cols = $db->get_blob_cols( $tbl_name );
    $objects = $model->load( null, [], 'id' );
    if (! empty( $blob_cols ) ) {
        foreach ( $objects as $obj ) {
            $db->blob2file = false;
            $db->blob_path = '';
            $obj = $model->load( (int) $obj->id, [], 'id,' . implode( ',', $blob_cols ) );
            $update = false;
            foreach ( $blob_cols as $blob_col ) {
                if ( $value = $obj->$blob_col ) {
                    if ( $value && strpos( $value, 'a:1:{s:8:"basename";s:' ) === 0 ) {
                        $blob = $blob_path . $obj->_model;
                        $unserialized = @unserialize( $value );
                        if ( is_array( $unserialized ) 
                            && isset( $unserialized['basename'] ) ) {
                            $basename = $unserialized['basename'];
                            $blob = $blob . DS . $basename;
                            if ( file_exists( $blob ) ) {
                                $value = file_get_contents( $blob );
                                $obj->$blob_col( $value );
                                $update = true;
                                $counter++;
                            }
                        }
                    }
                }
            }
            if ( $update ) {
                $obj->save();
            }
        }
    }
}
if ( $counter ) {
    echo "Saved {$counter} file(s) to blob.", PHP_EOL;;
} else {
    echo "No file found to save blob.", PHP_EOL;;
}
