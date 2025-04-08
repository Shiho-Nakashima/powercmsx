<?php

use ScssPhp\ScssPhp\Compiler;
use NodejsPhpFallback\Stylus;

class StylusCompiler extends Stylus {

    public function setStylusPath ( $path ) {
        $this->basename = basename( $path );
        $node = $this->node;
        $node::setModulePath( 'stylus', dirname( $path ) );
    }
}