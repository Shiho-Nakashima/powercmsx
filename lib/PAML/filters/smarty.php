<?php
    $pfx = $this->prefix;
    $this->pre_fetch = ['/\{\*.*?\*\}/si'
                          => '',
                       '/\{\([^\}"\']*?)\|[a-zA-Z0-9|]+?\}/si'
                          => ['/\|/' => ' '],
                       '/\{\/(.*?)\}/si'
                          => '</' . $pfx . ':$1>',
                       '/\{(.*?)\}/si'
                          => '<' . $pfx . ':$1>'];

    function smarty_pre_fetch ( $ctx, &$content, &$map ) {
        if ( strpos( $content, '{' ) === false ) {
            return;
        }
        if ( stripos( $content, '{literal' ) !== false ) {
            // Literal
            $regex = '/\{\s*literal.*?\s*\}(.*?)\{\/\s*literal\s*\}/si';
            if ( preg_match_all( $regex, $content, $mts ) ) {
                $raws = $mts[1];
                $mts = $mts[0];
                foreach ( $mts as $idx => $mt ) {
                    $magic = $ctx->magic( $content );
                    $map[ $magic ] = $raws[ $idx ];
                    $mt = preg_quote( $mt, '/' );
                    $content = preg_replace( "/{$mt}/", $magic, $content, 1 );
                }
            }
        }
        if ( stripos( $content, '{raw' ) !== false ) {
            // Raw
            $regex = '/\{\s*raw.*?\s*\}(.*?)\{\/\s*raw\s*\}/si';
            if ( preg_match_all( $regex, $content, $mts ) ) {
                $raws = $mts[1];
                $mts = $mts[0];
                foreach ( $mts as $idx => $mt ) {
                    $magic = $ctx->magic( $content );
                    $map[ $magic ] = $raws[ $idx ];
                    $mt = preg_quote( $mt, '/' );
                    $content = preg_replace( "/{$mt}/", $magic, $content, 1 );
                }
            }
        }
    }