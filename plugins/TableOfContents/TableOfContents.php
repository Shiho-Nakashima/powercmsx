<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class TableOfContents extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function hdlr_generatetableofcontents ( $args, $content, $ctx, &$repeat, $counter ) {
        if ( isset( $content ) ) {
            $add_body = false;
            if ( stripos( $content, '<body' ) === false ) {
                $add_body = true;
                $content = "<html><body>{$content}";
            }
            $name = $args['name'] ?? 'generated_table_of_contents';
            $prefix = $args['prefix'] ?? 'anchor';
            $dom = PTUtil::loadHTML( $content );
            $nodes = $dom->getElementsByTagName('*');
            $h2_counter = 0;
            $h3_counter = 0;
            $h4_counter = 0;
            $h5_counter = 0;
            $h6_counter = 0;
            $nestable_arr = [];
            foreach( $nodes as $node ) {
                if( $node->nodeName == 'h2' ) {
                    $heading = $node->nodeValue;
                    $h2_counter++;
                    $h3_counter = 0; // Reset h3 counter for each new h2
                    $id = $node->getAttribute( 'id' );
                    if (! $id ) {
                        $id = $prefix . sprintf( '%02d', $h2_counter );
                        $node->setAttribute( 'id', $id );
                    }
                    $nestable_arr[ $id ] = ['tag' => 'h2', 'content' => $heading, 'children' => []];
                } else if ( $node->nodeName == 'h3' ) {
                    $heading = $node->nodeValue;
                    $h3_counter++;
                    $h4_counter = 0; // Reset h4 counter for each new h3
                    $h2_id = $prefix . sprintf( '%02d', $h2_counter );
                    $id = $node->getAttribute( 'id' );
                    if (! $id ) {
                        $id = $h2_id . '-' . sprintf( '%02d', $h3_counter );
                    }
                    $nestable_arr[ $h2_id ]['children'][ $id ] = ['tag' => 'h3', 'content' => $heading, 'children' => [] ];
                    $node->setAttribute( 'id', $id );
                } else if ( $node->nodeName == 'h4' ) {
                    $heading = $node->nodeValue;
                    $h4_counter++;
                    $h5_counter = 0; // Reset h5 counter for each new h4
                    $h2_id = $prefix . sprintf( '%02d', $h2_counter );
                    $h3_id = $h2_id . '-' . sprintf( '%02d', $h3_counter );
                    $id = $node->getAttribute( 'id' );
                    if (! $id ) {
                        $id = $h3_id . '-' . sprintf( '%02d', $h4_counter );
                    }
                    $nestable_arr[ $h2_id ]['children'][ $h3_id ]['children'][ $id ] = ['tag' => 'h4', 'content' => $heading, 'children' => [] ];
                    $node->setAttribute( 'id', $id );
                } else if ( $node->nodeName == 'h5' ) {
                    $heading = $node->nodeValue;
                    $h5_counter++;
                    $h6_counter = 0; // Reset h6 counter for each new h5
                    $h2_id = $prefix . sprintf( '%02d', $h2_counter );
                    $h3_id = $h2_id . '-' . sprintf( '%02d', $h3_counter );
                    $h4_id = $h3_id . '-' . sprintf( '%02d', $h4_counter );
                    $id = $node->getAttribute( 'id' );
                    if (! $id ) {
                        $id = $h4_id . '-' . sprintf( '%02d', $h5_counter );
                    }
                    $nestable_arr[ $h2_id ]['children'][ $h3_id ]['children'][ $h4_id ]['children'][ $id ] = ['tag' => 'h5', 'content' => $heading, 'children' => [] ];
                    $node->setAttribute( 'id', $id );
                } else if ( $node->nodeName == 'h6' ) {
                    $heading = $node->nodeValue;
                    $h6_counter++;
                    $h2_id = $prefix . sprintf( '%02d', $h2_counter );
                    $h3_id = $h2_id . '-' . sprintf( '%02d', $h3_counter );
                    $h4_id = $h3_id . '-' . sprintf( '%02d', $h4_counter );
                    $h5_id = $h4_id . '-' . sprintf( '%02d', $h5_counter );
                    $id = $node->getAttribute( 'id' );
                    if (! $id ) {
                        $id = $h5_id . '-' . sprintf( '%02d', $h6_counter );
                    }
                    $nestable_arr[ $h2_id ]['children'][ $h3_id ]['children'][ $h4_id ]['children'][ $h5_id ]['children'][ $id ] = ['tag' => 'h6', 'content' => $heading ];
                    $node->setAttribute( 'id', $id );
                }
            }
            $html = '';
            $ctx->vars["{$name}_html"] = $html;
            if ( !empty( $nestable_arr ) ) {
                if ( $add_body ) {
                    $body = $dom->getElementsByTagName( 'body' );
                    $content = PTUtil::innerHTML( $body[0] );
                } else {
                    $content = PTUtil::saveHTML( $dom );
                }
                $this->build_toc( $nestable_arr, $html );
                $ctx->vars["{$name}_html"] = $html;
                $add_html = isset( $args['add_html'] ) ? true : false;
                if ( $add_html ) {
                    $content = $html . PHP_EOL . $content;
                }
            }
            $ctx->vars[ $name ] = $nestable_arr;
        }
        return $content;
    }

    function build_toc ( $array, &$html ) {
        if ( empty( $array ) ) {
            return $html;
        }
        $level = '';
        $level_end = '';
        $html .= '<ul>' . PHP_EOL;
        foreach ( $array as $id => $data ) {
            $indent = ( ltrim( $data['tag'], 'h' ) - 1 ) * 4;
            if ( $indent ) {
                $level = str_repeat( ' ', $indent );
                $html .= $level;
                $level_end = str_repeat( ' ', $indent - 4 );
            }
            $content = $data['content'];
            $html .= "<li>" . PHP_EOL . $level . "<a href=\"#{$id}\">{$content}</a>";
            if ( isset( $data['children'] ) && !empty( $data['children'] ) ) {
                $html .= PHP_EOL;
                if ( $level ) {
                    $html .= $level;
                }
                $this->build_toc( $data['children'], $html );
            }
            if ( $level ) {
                $html .= PHP_EOL . $level;
            }
            $html .= '</li>' . PHP_EOL;
        }
        $html .= $level_end . '</ul>';
        return $html;
    }
}