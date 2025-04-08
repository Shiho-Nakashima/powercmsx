<?php
// cd path/to/powercmsx; sudo -u apache php ./tools/importFromCSV.php --file import/pages-Y-m-d_H-i-s.csv --model page --user admin
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'Worker'] );
$app->logging  = true;
$app->init();
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
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTImporter.php' );
$importer = new PTImporter;
array_shift( $argv );
$import_file = null;
$model = null;
$user  = null;
$argv = array_unique( $argv );
if ( in_array( '--file', $argv ) ) {
    $idx = array_search( '--file', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $import_file = $argv[ $idx + 1];
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
if ( in_array( '--user', $argv ) ) {
    $idx = array_search( '--user', $argv );
    if ( isset( $argv[ $idx + 1] ) ) {
        $user = $argv[ $idx + 1];
        unset( $argv[ $idx + 1] );
    }
    unset( $argv[ $idx ] );
}
if (! $import_file ) {
    echo $app->translate( "'%s' not specified.", '--file' ) , PHP_EOL;
    exit();
} else if (! file_exists( $import_file ) ) {
    echo $app->translate( "%s not found.", $import_file ) , PHP_EOL;
}
$extension = PTUtil::get_extension( $import_file, true );
if ( $extension !== 'csv' && $extension !== 'zip' ) {
    echo $app->translate( 'Could not import %s. Please check upload file format.', basename( $import_file ) );
    exit();
}
if (! $model ) {
    echo $app->translate( "'%s' not specified.", '--model' ) , PHP_EOL;
    exit();
}
$table = $app->get_table( $model );
if (! $table ) {
    echo $app->translate( "%s not found.", $model ) , PHP_EOL;
}
if (! $user ) {
    echo $app->translate( "'%s' not specified.", '--user' ) , PHP_EOL;
    exit();
}
$user = $app->db->model( 'user' )->get_by_key( ['name' => $user ] );
if (! $user->id ) {
    echo $app->translate( 'There were no %s for action.', $app->translate( 'User' ) ) , PHP_EOL;
    exit();
}
$app->user = $user;
$importer->print_state = false;
$dirname = dirname( $import_file );
if ( $extension === 'zip' ) {
    $extractTo = $app->upload_dir();
    $dirname = $extractTo;
    $zip = new ZipArchive();
    $res = $zip->open( $import_file );
    if ( $res === true ) {
        $zip->extractTo( $extractTo );
        $zip->close();
        $list = PTUtil::file_find( $extractTo, $import_files, $dirs );
        if ( $import_files == 0 ) {
            echo $app->translate( 'Could not expand ZIP archive.' ), PHP_EOL;
            exit();
        }
        $import_file = $import_files;
    } else {
        $error = $app->translate( 'Could not expand ZIP archive.' );
        return $app->error( $error );
    }
} else {
    $import_file = [ $import_file ];
}
$importer->import_from_files( $app, $model, $dirname, $import_file );