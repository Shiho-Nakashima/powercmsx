<?php
// cd path/to/powercmsx; sudo -u apache php ./tools/restore3.53-2.753.php
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'Worker'] );
$app->logging  = true;
$app->init();
$invalid = ['column','meta','option','relation','session'];
$counter = 0;
foreach ( $invalid as $model ) {
    $table = $app->db->model( 'table' )->get_by_key( ['name' => $model ] );
    if ( $table->id ) {
        $table->remove();
        echo $app->translate( 'Removed %s.', $model ), PHP_EOL;
        $counter++;
    }
}
if ( $counter ) {
    echo $app->translate( '%s %s have been deleted.', [ $counter, $app->translate( 'Table' ) ] );
} else {
    echo $app->translate( 'There is no upgrade.' );
}
echo PHP_EOL;