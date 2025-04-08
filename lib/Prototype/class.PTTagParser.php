<?php
class PTTagParser {

    protected $app = null;
    public    $logging = false;

    function __construct ( &$app, $ctx = null ) {
        $this->app = $app;
        $ctx = $ctx ? $ctx : $app->ctx;
        $ctx->register_callback(
            'pt_pre_parse_filter', 'pre_parse_filter', 'pre_parse_filter', $this );
    }

    function pre_parse_filter ( $template, $ctx, $insert, $content ) {
        $app = $this->app;
        $ctx = $ctx ? $ctx : $app->ctx;
        $ctx->unregister_callback( 'pt_pre_parse_filter', 'pre_parse_filter' );
        $tmpl = $template;
        $tmpl = preg_replace( "/\r\n|\r/","\n", $tmpl );
        $prefix = $ctx->prefix;
        $tmpl = preg_replace( '/^<.*?>/', '', $tmpl );
        $tmpl = preg_replace( '/<\/[^>]*?>$/', '', $tmpl );
        $tmpl = str_replace( $insert, '', $tmpl );
        if ( preg_match( "/^\n/", $tmpl ) ) {
            $tmpl = "1 {$tmpl}"; // tag_start is not correct when the beginning is a newline.
        }
        $regex = '/<\/' . $prefix . '.*?>/s';
        preg_match_all( $regex, $tmpl, $matches );
        if (! empty( $matches ) ) {
            $magic = PTUtil::magic( 10, $tmpl );
            $matches = $matches[0];
            $tokens = [];
            foreach ( $matches as $idx => $matche ) {
                $magic = PTUtil::magic( 10, $tmpl );
                $tokens[] = $magic;
                $close = preg_replace( '/>/', $magic, $matche );
                $close .= "==$idx=="; // Get position of end tag.
                $matche = preg_quote( $matche, '/' );
                $tmpl = preg_replace( "/$matche/", $close, $tmpl, 1 );
            }
            foreach ( $tokens as $token ) {
                $tmpl = str_replace( $token, '>', $tmpl );
            }
        }
        $lib = LIB_DIR . 'simple_html_dom' . DS . 'simple_html_dom.php';
        require_once( $lib );
        $parser = str_get_html( $tmpl );
        if (! $tmpl || $parser === false ) {
            return false;
        }
        $block_tags = array_merge( $ctx->tags['block'], $ctx->tags['conditional'] );
        $conditional_tags = $ctx->tags['conditional'];
        $conditionals = [];
        foreach ( $conditional_tags as $conditional_tag ) {
            if ( $conditional_tag != 'else' && $conditional_tag != 'elseif'
                && $conditional_tag != 'elseifgetvar' ) {
                $conditionals[] = "{$prefix}{$conditional_tag}";
            }
        }
        $blocks = [];
        foreach ( $block_tags as $block_tag ) {
            $blocks[] = "{$prefix}{$block_tag}";
        }
        $errors = [];
        foreach ( $block_tags as $block ) {
            $raw_block = $block;
            // if ( $block == 'elseif' || $block == 'else' ) continue;
            $block = "{$prefix}{$block}";
            $mt_block = '<' . preg_replace( '/^mt/', 'mt:', $block ) . '>';
            $ret = $parser->find( $block );
            $counter = 0;
            foreach ( $ret as $ele ) {
                $counter++;
                if ( $raw_block == 'elseif' || $raw_block == 'else'
                  || $raw_block == 'elseifgetvar' ) {
                    $parentTag = strtolower( $ele->parent()->tag );
                    if ( $ctx->else_in_block && $raw_block == 'else' ) {
                        if (! in_array( $parentTag, $conditionals ) && ! in_array( $parentTag, $blocks ) ) {
                            $tag_start = $ele->tag_start;
                            $pre_mtml = substr( $tmpl, 0, $tag_start );
                            $line = mb_substr_count( $pre_mtml, "\n" ) + 1;
                            $errors[] = $app->translate(
                                'The %sth %s tag is not in block tag ( at line %s ).',
                                    [ $counter, $mt_block, $line ] );
                        }
                    } else {
                        if (! in_array( $parentTag, $conditionals ) ) {
                            $tag_start = $ele->tag_start;
                            $pre_mtml = substr( $tmpl, 0, $tag_start );
                            $line = mb_substr_count( $pre_mtml, "\n" ) + 1;
                            $errors[] = $app->translate(
                                'The %sth %s tag is not in conditional tag ( at line %s ).',
                                    [ $counter, $mt_block, $line ] );
                        }
                    }
                } else {
                    $outertext = $ele->outertext;
                    if (! preg_match( "/<{$block}.*?.*<\/{$block}>$/si", $outertext ) ) {
                        $tag_start = $ele->tag_start;
                        $pre_mtml = substr( $tmpl, 0, $tag_start );
                        $line = mb_substr_count( $pre_mtml, "\n" ) + 1;
                        $errors[] = $app->translate(
                            'The %sth %s tag is not closed ( at line %s ).',
                                [ $counter, $mt_block, $line ] );
                    }
                }
            }
        }
        if (! $app->build_pre_parse ) {
            $tag_class = new PTTags();
            $includes = $parser->find( "{$prefix}extends" );
            foreach ( $includes as $include ) {
                $args = $include->attr;
                if ( isset( $args['module'] ) || isset( $args['basename'] ) ) {
                    $tag_class->hdlr_extends_meth( $args, $ctx );
                }
            }
            $includes = $parser->find( "{$prefix}includeblock" );
            foreach ( $includes as $include ) {
                $args = $include->attr;
                if ( isset( $args['module'] ) || isset( $args['basename'] ) ) {
                    $tag_class->hdlr_include( $args, $ctx, true );
                }
            }
            $includes = $parser->find( "{$prefix}include" );
            foreach ( $includes as $include ) {
                $args = $include->attr;
                if ( isset( $args['module'] ) || isset( $args['basename'] ) ) {
                    $tag_class->hdlr_include( $args, $ctx, true );
                }
            }
        }
        // Check stray end tag.
        foreach ( $block_tags as $block ) {
            $block = "{$prefix}{$block}";
            $ret = $parser->find( $block );
            foreach ( $ret as $ele ) {
                $ele->outertext = '';
            }
        }
        $mtml = $parser->save();
        if ( $this->logging ) {
            $app->log( $mtml ); // For debug.
        }
        $not_open_tags = [];
        $regex = '/<\/' . $prefix . '.*?>==[0-9]+==/s';
        preg_match_all( $regex, $mtml, $matches );
        if ( isset( $matches[0] ) ) {
            $matches = $matches[0];
            foreach ( $matches as $match ) {
                $not_open_tags[] = $match;
            }
        }
        if (! empty( $not_open_tags ) ) {
            foreach ( $not_open_tags as $tag ) {
                $tag_start = preg_quote( $tag, '/' );
                $pre_mtml = preg_replace( "/(^.*?{$tag_start}).*$/si", '$1', $tmpl );
                $line = mb_substr_count( $pre_mtml, "\n" ) + 1;
                $mt_block = preg_replace( '/^<\/mt/', '</mt:', $tag );
                $mt_block = preg_replace( '/>.*$/', '>', $mt_block );
                $errors[] = $app->translate( 'The %s tag is not open ( at line %s ).', [ $mt_block, $line ] );
            }
        }
        $parser->clear();
        $regex = '/<(\$?' . $prefix . '.*?)>/s';
        $content = preg_replace( "/\r\n|\r/","\n", $content );
        preg_match_all( $regex, $content, $matches );
        $using_tags = [];
        if ( isset( $matches[1] ) ) {
            $matches = $matches[1];
            foreach ( $matches as $match ) {
                $tag = strtolower( str_replace( ':', '', $match ) );
                $tag = str_replace( '$', '', $tag );
                $tag = str_replace( '/', '', $tag );
                $tag = preg_replace( "/\r\n|\r/"," ", $tag );
                $tag = preg_split( "/\s/", $tag );
                $tag = $tag[0];
                $using_tags[] = $tag;
            }
        }
        $using_tags = array_unique( $using_tags );
        $all_tags = $ctx->tags;
        $registered_tags = [];
        foreach ( $all_tags as $kind => $tags ) {
            if ( $kind == 'modifier' ) continue;
            foreach ( $tags as $tag ) {
                $registered_tags[ "{$prefix}{$tag}" ] = true;
            }
        }
        foreach ( $using_tags as $tag ) {
            if (! isset( $registered_tags[ $tag ] ) ) {
                $name = preg_replace( "/^{$prefix}/", '', $tag );
                $emergence =
                    preg_replace( "/(.*?<{$prefix}:{0,1}{$name}.*?>).*$/si", "$1" ,$content );
                $line = mb_substr_count( $emergence, "\n" ) + 1;
                $mt_tag = '<' . preg_replace( '/^mt/', 'mt:', $tag ) . '>';
                $errors[] = $app->translate(
                        'The tag %s is not found ( at line %s ).', [ $mt_tag, $line ] );
            }
        }
        $app->stash( 'parser_errors', $errors );
        return $app->build_pre_parse ? $template : false;
    }
}