<?php
// cd path/to/powercmsx; sudo -u apache php ./tools/exportCSV.php --file /path/to/filename.zip --model page --workspace_ids 1,2,3
/*
Parameters.

--file /path/to/filename.zip (required)
--model model_name (required)

--workspace_ids 1,2,3... (optional)
--sort_by column_name (optional, default:id)
--sort_order descend|ascend (optional, default:descend)
--limit [number]
--offset [number]
--without_id 1 (optional, default:false)
--encoding Shift_JIS (optional, default:UTF-8)
--silence 1 (optional, default:false)

*/
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'Worker'] );
$app->logging  = true;
$app->init();
ini_set( 'memory_limit', -1 );
if (!isset( $argv ) ) {
    $argv = [];
}
$pid = $app->temp_dir . DS . md5( __FILE__ . implode( '', $argv ) ) . '.pid';
if ( file_exists( $pid ) ) {
    $worker_period = $app->worker_period;
    $mtime = filemtime( $pid );
    if ( ( time() - $worker_period ) < $mtime ) {
        echo date( "Y-m-d H:i:s " ), $app->translate( "%s skipped (the file %s already exists).", [ basename( __FILE__ ), $pid ] ), "\n";
        exit();
    }
    unlink( $pid );
}
touch( $pid );
$app->pid = $pid;
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTListActions.php' );
$exporter = new PTListActions;
array_shift( $argv );
$export_file = null;
$model = null;
$workspace_ids = null;
$sort_by = 'id';
$sort_order = 'descend';
$limit = null;
$offset = 0;
$without_id = false;
$encoding = 'UTF-8';
$silence = false;
$argv = array_unique( $argv );
if ( in_array( '--file', $argv ) ) {
    $idx = array_search( '--file', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $export_file = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--model', $argv ) ) {
    $idx = array_search( '--model', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $model = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--workspace_ids', $argv ) ) {
    $idx = array_search( '--workspace_ids', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $workspace_ids = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--sort_by', $argv ) ) {
    $idx = array_search( '--sort_by', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $sort_by = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--sort_order', $argv ) ) {
    $idx = array_search( '--sort_order', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $sort_order = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--limit', $argv ) ) {
    $idx = array_search( '--limit', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $limit = (int) $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--offset', $argv ) ) {
    $idx = array_search( '--offset', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $offset = (int) $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--without_id', $argv ) ) {
    $idx = array_search( '--without_id', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $without_id = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--encoding', $argv ) ) {
    $idx = array_search( '--encoding', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $encoding = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if ( in_array( '--silence', $argv ) ) {
    $idx = array_search( '--silence', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $silence = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if (! $export_file ) {
    echo $app->translate( "'%s' not specified.", '--file' ) , PHP_EOL;
    exit();
}
$extension = PTUtil::get_extension( $export_file, true );
if ( $extension !== 'zip' ) {
    echo $app->translate( "Could not export %s. File extension must be '.zip'." );
    exit();
}
if (! $model ) {
    echo $app->translate( "'%s' not specified.", '--model' ) , PHP_EOL;
    exit();
}
$fmgr = $app->fmgr;
$dirname = dirname( $export_file );
if (! $fmgr->mkpath( $dirname ) ) {
    echo $app->translate( "Cannot make directory '%s'.", $dirname );
}
$table = $app->get_table( $model );
if (! $table ) {
    echo $app->translate( "%s not found.", $model ) , PHP_EOL;
}
if (! $app->db->model( $model )->has_column( $sort_by ) ) {
    $sort_by = 'id';
}
if ( stripos( $sort_order, 'asc' ) === 0 ) {
    $sort_order = 'ascend';
} else {
    $sort_order = 'descend';
}
if ( $encoding !== 'Shift_JIS' ) {
    $encoding = 'UTF-8';
}
$action = ['without_id' => $without_id, 'encoding' => $encoding, 'model' => $model, 'silence' => $silence ];
$workspace_ids = $workspace_ids ? preg_split( "/\s*,\s*/", $workspace_ids ) : null;
$terms = $workspace_ids ? ['workspace_ids' => ['IN' => $workspace_ids] ] : [];
$args = ['sort' => $sort_by, 'direction' => $sort_order ];
if ( $limit ) {
    $args['limit'] = $limit;
    if ( $offset ) {
        $args['offset'] = $offset;
    }
}
$objects = $app->db->model( $model )->load( $terms, $args, 'id' );
$upload_dir = dirname( $zip );
$start = time();
$zip = $exporter->export_objects( $app, $objects, $action );
if ( $fmgr->rename( $zip, $export_file ) ) {
    echo PHP_EOL;
    echo $app->translate( "Created the CSV and make a file '%s' successfully.", $export_file );
    $passed = time() - $start;
    $passed = $app->core_tags->filter_sec2hms( $passed, 1, $app->ctx );
    echo $app->translate( '(Processing time: %s)', $passed );
    echo PHP_EOL;
    PTUtil::remove_dir( $upload_dir );
} else {
    echo $app->translate( "Cannot write file '%s'.", $export_file ) , PHP_EOL;
}