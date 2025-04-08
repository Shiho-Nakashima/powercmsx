<?php
    $pfx = $this->prefix;
    $this->pre_fetch = ['/\{#\s*.*?\s*#\}/si'
                          => '',
                       '/\{%\s*set\s{1,}([^=\s]*)?\s*%\}(.*?)\{%\s*endset\s*%\}/si'
                          => '<' . $pfx . ':setvarblock name="$1">$2</' . $pfx . ':setvarblock>',
                       '/\{%\s*let\s{1,}([^=\s]*)?\s*%\}(.*?)\{%\s*endlet\s*%\}/si'
                          => '<' . $pfx . ':setvarblock name="$1" scope="local">$2</' . $pfx . ':setvarblock>',
                       '/\{%\s*end(.*?)\s*%\}/si'
                          => '</' . $pfx . ':$1>',
                       '/\{%\s*(.*?)?\s*%\}/si'
                          => '<' . $pfx . ':$1>',
                       '/\{\{\s*([^\}"\']*?)\|[a-zA-Z0-9|]+?\s*\}\}/si'
                          => ['/\|/' => ' '],
                       '/\{\{\s*(.*?)?\s*\}\}/si'
                          => '<' . $pfx . ':$1>'];

    function twig_pre_fetch ( $ctx, &$content, &$map ) {
        if ( strpos( $content, '{' ) === false ) {
            return;
        }
        if ( stripos( $content, 'endraw' ) !== false ) {
            // Raw
            $regex = '/\{%\s*raw.*?\s*%\}(.*?)\{%\s*endraw\s*%\}/si';
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
        if ( stripos( $content, 'endliteral' ) !== false ) {
            // Literal
            $regex = '/\{%\s*literal.*?\s*%\}(.*?)\{%\s*endliteral\s*%\}/si';
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