<?php
$files = [];
$files[] = __DIR__ . '/index.php';
$files[] = __DIR__ . '/class.Prototype.php';
$files[] = __DIR__ . '/db-config.php';
$files[] = __DIR__ . '/lib/PADO/class.pado.php';
$files[] = __DIR__ . '/lib/PAML/class.paml.php';
$files[] = __DIR__ . '/lib/PAML/class.paml3.php';
$files[] = __DIR__ . '/lib/PAML/class.paml4.php';
foreach ( $files as $file ) {
    if ( file_exists( $file ) ) {
        opcache_compile_file( $file );
    }
}
$files = glob( __DIR__ . '/lib/Prototype/**.php' );
foreach ( $files as $file ) {
    opcache_compile_file( $file );
}