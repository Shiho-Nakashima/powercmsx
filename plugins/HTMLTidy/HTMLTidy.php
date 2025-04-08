<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
if (! defined( 'MB_ENCODE_NUMERICENTITY_MAP' ) ) {
    define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );
}

class HTMLTidy extends PTPlugin {

    private $app = null;
    private $tokens = [];
    public  $csv_delimiter = ',';
    public  $csv_enclosure = '"';
    public  $styles = [];

    function __construct () {
        $app = Prototype::get_instance();
        $this->app = $app;
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        /*
        if (! extension_loaded( 'tidy' ) ) {
            $errors[] = $this->translate(
              'The plugin HTMLTidy cannot be enabled because Tidy extension is missing.' );
            return false;
        }
        */
        return true;
    }

    function filter_htmltidy ( $html, $arg, $ctx ) {
        /*
        if (! extension_loaded( 'tidy' ) ) {
            return $html;
        }
        */
        $app = $ctx->app;
        if ( $app->tidy_outputfilter ) {
            return $html;
        }
        $tidy_css_to_head = $app->tidy_css_to_head;
        if ( $arg != 2 ) {
            $app->tidy_css_to_head = false;
        }
        $is_not_html = $this->is_not_html( $html );
        $styles = $this->styles;
        $html = $this->clean_up( $html, $styles );
        $this->styles = $styles;
        if ( $is_not_html ) {
            $html = preg_replace( '!^.*<body[^>]*?>!si', '', $html );
            $html = preg_replace( '!</body>.*?$!si', '', $html );
        }
        $app->tidy_css_to_head = $tidy_css_to_head;
        return $html;
    }

    function post_preview ( $cb, $app, &$html ) {
        /*
        if (! extension_loaded( 'tidy' ) ) {
            return true;
        }
        */
        if ( $this->is_not_html( $html ) ) {
            return true;
        }
        $styles = $this->styles;
        if (! $app->tidy_outputfilter ) {
            if ( !empty( $styles ) ) {
                $this->add_styles( $styles, $html );
            }
            return;
        }
        $ctx = $app->ctx;
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $archve_types = $this->get_config( 'htmltidy_archive_types', $workspace_id );
        $archve_types = trim( $archve_types, ',' );
        $archve_types = explode( ',', $archve_types );
        $map = $ctx->stash( 'current_urlmapping' );
        $at = $map->model;
        if ( $map->date_based ) {
            if ( $at === 'template' ) {
                $at = strtolower( $map->date_based );
            } else {
                $at .= '-' . strtolower( $map->date_based );
            }
        }
        if (! in_array( $at, $archve_types ) ) {
            return true;
        }
        $styles = [];
        $html = $this->clean_up( $html, $styles );
        return true;
    }

    function post_rebuild ( $cb, $app, $tmpl, &$html ) {
        /*
        if (! extension_loaded( 'tidy' ) ) {
            return true;
        }
        */
        $url = $cb['urlinfo'];
        if ( $url->mime_type !== 'text/html' ) {
            return true;
        }
        if ( $this->is_not_html( $html ) ) {
            return true;
        }
        $styles = $this->styles;
        if (! $app->tidy_outputfilter ) {
            if ( !empty( $styles ) ) {
                $this->add_styles( $styles, $html );
            }
            return;
        }
        $ctx = $app->ctx;
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $archve_types = $this->get_config( 'htmltidy_archive_types', $workspace_id );
        $archve_types = trim( $archve_types, ',' );
        $archve_types = explode( ',', $archve_types );
        $map = $ctx->stash( 'current_urlmapping' );
        $at = $map->model;
        if ( $map->date_based ) {
            if ( $at === 'template' ) {
                $at = strtolower( $map->date_based );
            } else {
                $at .= '-' . strtolower( $map->date_based );
            }
        }
        if (! in_array( $at, $archve_types ) ) {
            return true;
        }
        $styles = [];
        $html = $this->clean_up( $html, $styles );
        return true;
    }

    function pre_publish ( $cb, $app, &$html ) {
        /*
        if (! extension_loaded( 'tidy' ) ) {
            return true;
        }
        */
        if (! $app->tidy_outputfilter ) {
            return true;
        }
        $url = $cb['urlinfo'];
        if ( $url->mime_type !== 'text/html' ) {
            return true;
        }
        if ( $this->is_not_html( $html ) ) {
            return true;
        }
        $ctx = $app->ctx;
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $archve_types = $this->get_config( 'htmltidy_archive_types', $workspace_id );
        $archve_types = trim( $archve_types, ',' );
        $archve_types = explode( ',', $archve_types );
        $at = $url->model;
        if (! in_array( $at, $archve_types ) ) {
            return true;
        }
        $styles = [];
        $html = $this->clean_up( $html, $styles );
        return true;
    }

    private function is_not_html ( $text ) {
        return preg_match( '/\A\s*<!DOCTYPE\s+html|<title[\s>]/i', $text ) !== 1;
    }

    function html5_config ( $config = [] ) {
        $config += [
            'tidy-mark'   => false,
            //'wrap' => 10000,
            // HTML5 tags
            'new-blocklevel-tags' => 'article aside audio bdi canvas details dialog figcaption figure footer header hgroup main menu menuitem nav section source summary template track video',
            'new-empty-tags' => 'command embed keygen source track wbr',
            'new-inline-tags' => 'audio command datalist embed keygen mark menuitem meter output progress source time video wbr',
            'drop-empty-elements' => false,
            'numeric-entities' => true,
        ];
        return $config;
    }

    public function clean_up ( $html, &$styles = [] ) {
        $app = $this->app;
        $this->tokens = [];
        $replaced_map = [];
        $config = $app->tidy_config;
        if (! is_array( $config ) ) {
            $config = [];
        }
        if ( $app->tidy_cleanup ) {
            $config['clean'] = true;
        }
        $config['wrap'] = $app->tidy_html_wrap;
        $config = $app->tidy_html5 ? $this->html5_config( $config ) : $config;
        $workspace = $app->ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        $exclude_string = $this->get_config( 'htmltidy_exclude_string', $workspace_id );
        if ( $exclude_string && strpos( $html, $exclude_string ) !== false ) {
            return $html;
        }
        $exclude_petterns = trim( $this->get_config( 'htmltidy_exclude_petterns', $workspace_id ) );
        $exclude_petterns = preg_replace( "/\r\n?/", "\n", $exclude_petterns );
        $exclude_petterns = $exclude_petterns ? explode( "\n", $exclude_petterns ) : [];
        foreach ( $exclude_petterns as $exclude ) {
            $magic = self::magic( $html, $this->tokens );
            /*
            if ( strpos( $exclude, '!' ) === 0 ) {
                // Regular Expression
            } else if ( strpos( $exclude, '//' ) === 0 ) {
                // XPath
            }
            */
            if ( strpos( $html, $exclude ) !== false ) {
                $html = str_replace( $exclude, $magic, $html );
                $replaced_map[ $magic ] = $exclude;
            }
        }
        $replace_petterns = $this->get_config( 'htmltidy_replace_petterns', $workspace_id );
        $replace_petterns = preg_replace( "/\r\n?/", "\n", $replace_petterns );
        $replace_petterns = $replace_petterns ? explode( "\n", $replace_petterns ) : [];
        foreach ( $replace_petterns as $replace_pettern ) {
            list( $search, $replace ) = $this->parse_csv( $replace_pettern );
            if ( strpos( $search, '!' ) === 0 ) {
                // Regular Expression
            } else if ( strpos( $html, $search ) !== false ) {
                $html = str_replace( $search, $replace, $html );
            }
        }
        $body_perttern = $this->get_config( 'htmltidy_body_pettern', $workspace_id );
        $regex = '';
        if ( $body_perttern ) {
            list ( $start, $end ) = explode( ',', $body_perttern );
            $start = preg_quote( $start );
            $end = preg_quote( $end );
            $regex = "!(^.*?<body[^>]*?>)(.*?)({$start}.*?{$end})(.*?)(</body>.*$)!si";
        }
        $body_match = false;
        if ( $regex && preg_match( $regex, $html, $matchs ) ) {
            $html_head = $matchs[1];
            $body_head = $matchs[2];
            $html_main = $matchs[3];
            $html_foot = $matchs[4];
            $html_end  = $matchs[5];
            $body_match = true;
            $html = "{$html_head}{$html_main}{$html_end}";
        }
        if ( extension_loaded( 'tidy' ) ) {
            $tidy = tidy_parse_string( $html, $config, 'utf8' );
            $tidy->cleanRepair();
            $html = $tidy->value;
        }
        $ctx = $app->ctx;
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? $workspace->id : 0;
        if ( $app->tidy_clean_a_href ) {
            $this->tidy_clean_a_href( $html, $replaced_map );
        }
        libxml_use_internal_errors( true );
        if ( $app->tidy_html5 ) {
            $html = PTUtil::encode_double( $html );
            $dom = new DomDocument();
            if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                /*
                if ( $app->tidy_normalize ) {
                    $_html = $dom->getElementsByTagName( 'html' );
                    if ( $_html->length ) {
                        $_html = $_html[0];
                        $language = $_html->getAttribute( 'lang' );
                        if ( $language && $language !== 'ja' && $language !== 'ja-JP' ) {
                            $normalize = true;
                        }
                    }
                }
                */
                $changed = false;
                if ( $app->tidy_clean_table && stripos( $html, '<table' ) !== false ) {
                    $this->tidy_clean_table( $dom, $changed, $styles );
                }
                if ( $app->tidy_clean_image && stripos( $html, '<img' ) !== false ) {
                    $this->tidy_clean_image( $dom, $changed, $styles );
                }
                if ( $app->tidy_clean_block_align ) {
                    $this->tidy_clean_block_align( $dom, $changed, $styles );
                }
                if ( $app->tidy_clean_br_clear && stripos( $html, '<br' ) !== false ) {
                    $this->tidy_clean_br_clear( $dom, $changed, $styles );
                }
                if ( $app->tidy_clean_a_name && stripos( $html, '<a' ) !== false ) {
                    $this->tidy_clean_a_name( $dom, $changed, $styles );
                }
                if ( $app->tidy_clean_area ) {
                    $elements = $dom->getElementsByTagName( 'area' );
                    foreach ( $elements as $element ) {
                        $attrV = $element->getAttribute( 'nohref' );
                        if ( $attrV ) {
                            $href = $element->getAttribute( 'href' );
                            if (! $href ) {
                                $element->parentNode->removeChild( $element );
                                continue;
                            }
                        }
                        $attrV = $element->getAttribute( 'coords' );
                        if ( $attrV ) {
                            $coords = preg_split( '/\s*,\s*/', $attrV );
                            $coords = implode( ',', $coords );
                            if ( $coords != $attrV ) {
                                $element->setAttribute( 'coords', $coords );
                                $changed = true;
                            }
                        }
                    }
                }
                if ( $app->tidy_clean_iframe ) {
                    $elements = $dom->getElementsByTagName( 'iframe' );
                    foreach ( $elements as $element ) {
                        $element->removeAttribute( 'frameborder' );
                        $changed = true;
                    }
                }
                if ( $app->tidy_clean_font ) {
                    $elements = $dom->getElementsByTagName( 'font' );
                    if ( $elements->length ) {
                        $font_map = ['1' => 'x-small',
                                     '2' => 'small',
                                     '4' => 'large',
                                     '5' => 'x-large',
                                     '6' => 'xx-large',
                                     '7' => 'xxx-large'];
                        $i = $elements->length - 1;
                        while ( $i > -1 ) {
                            $element = $elements->item( $i );
                            $i -= 1;
                            $inner = $this->innerHTML( $element );
                            $span = $dom->createElement( 'span', $inner );
                            $style = $app->tidy_css_to_head ? '' : $element->getAttribute( 'style' );
                            $style_org = $style;
                            foreach ( $element->attributes as $attr ) {
                                if ( $attr->nodeName === 'color' ) {
                                    $color = $attr->nodeValue;
                                    $style .= $style ? ";color:{$color}" : "color:{$color}";
                                    continue;
                                } else if ( $attr->nodeName === 'face' ) {
                                    $face = $attr->nodeValue;
                                    $faces = preg_split( '/\s*,\s*/', $face );
                                    foreach ( $faces as $idx => $font ) {
                                        $faces[ $idx ] = "\"{$font}\"";
                                    }
                                    $face = implode( ',', $faces );
                                    $style .= $style ? ";font-family:{$face}" : "font-family:{$face}";
                                    continue;
                                } else if ( $attr->nodeName === 'size' ) {
                                    $nodeValue = trim( $attr->nodeValue );
                                    if ( isset( $font_map[ $nodeValue ] ) ) {
                                        $size = $font_map[ $nodeValue ];
                                        $style .= $style ? ";font-size:{$size}" : "font-size:{$size}";
                                        continue;
                                    }
                                    if ( strpos( $nodeValue, '+' ) === 0 ) {
                                        $size = 100;
                                        $nodeValue = ltrim( $nodeValue, '+' );
                                        for ( $j = 0; $j < $nodeValue; $j++ ) {
                                            $size *= 1.2;
                                            $size = floor( $size );
                                        }
                                        $size = (int) $size;
                                        $style .= $style ? ";font-size:{$size}%" : "font-size:{$size}%";
                                        continue;
                                    } else if ( strpos( $nodeValue, '-' ) === 0 ) {
                                        $size = 100;
                                        $nodeValue = ltrim( $nodeValue, '-' );
                                        for ( $j = 0; $j < $nodeValue; $j++ ) {
                                            $size /= 1.2;
                                            $size = floor( $size );
                                        }
                                        $size = (int) $size;
                                        $style .= $style ? ";font-size:{$size}%" : "font-size:{$size}%";
                                        continue;
                                    }
                                    continue;
                                }
                                $span->setAttribute( $attr->nodeName, $attr->nodeValue );
                            }
                            if ( $style !== $style_org ) {
                                if ( $app->tidy_css_to_head ) {
                                    $this->tidy_add_class( $span, $style, $styles );
                                } else {
                                    $span->setAttribute( 'style', $style );
                                }
                            }
                            $element->parentNode->replaceChild( $span, $element );
                            $changed = true;
                        }
                    }
                }
                $clean_deprecated = $app->tidy_clean_deprecated;
                if (!empty( $clean_deprecated ) ) {
                    foreach ( $app->tidy_clean_deprecated as $from => $to ) {
                        $elements = $dom->getElementsByTagName( $from );
                        if ( $elements->length ) {
                            $i = $elements->length - 1;
                            while ( $i > -1 ) {
                                $element = $elements->item( $i );
                                $i -= 1;
                                $inner = $this->innerHTML( $element );
                                $replace = $dom->createElement( $to, $inner );
                                foreach ( $element->attributes as $attr ) {
                                    $replace->setAttribute( $attr->name, $attr->value );
                                }
                                if ( $from === 'big' || $from === 'tt' || $from === 'u' || $from === 'center' ) {
                                    $style = $app->tidy_css_to_head ? '' : $element->getAttribute( 'style' );
                                    if ( $from === 'big' ) {
                                        $style .= $style ? ";font-size:larger" : "font-size:larger";
                                    } else if ( $from === 'tt' ) {
                                        $style .= $style ? ";font-family:monospace" : "font-family:monospace";
                                    } else if ( $from === 'u' ) {
                                        $style .= $style ? ";text-decoration:underline" : "text-decoration:underline";
                                    } else if ( $from === 'center' ) {
                                        $style .= $style ? ";text-align:center" : "text-align:center";
                                    }
                                    if ( $app->tidy_css_to_head ) {
                                        $this->tidy_add_class( $replace, $style, $styles );
                                    } else {
                                        $replace->setAttribute( 'style', $style );
                                    }
                                }
                                $element->parentNode->replaceChild( $replace, $element );
                                $changed = true;
                            }
                        }
                    }
                }
                if ( $app->tidy_clean_applet && stripos( $html, '<applet' ) !== false ) {
                    $elements = $dom->getElementsByTagName( 'applet' );
                    if ( $elements->length ) {
                        $i = $elements->length - 1;
                        while ( $i > -1 ) {
                            $element = $elements->item( $i );
                            $i -= 1;
                            $code = $element->getAttribute( 'code' );
                            if ( $code ) {
                                $param = $dom->createElement( 'param' );
                                $param->setAttribute( 'code', $code );
                            }
                            $element->removeAttribute( 'align' );
                            $element->removeAttribute( 'code' );
                            $element->setAttribute( 'type', 'application/x-java-applet' );
                            $element->appendChild( $param );
                            $inner = $this->innerHTML( $element );
                            $replace = $dom->createElement( 'object', $inner );
                            foreach ( $element->attributes as $attr ) {
                                $replace->setAttribute( $attr->name, $attr->value );
                            }
                            $element->parentNode->replaceChild( $replace, $element );
                            $changed = true;
                        }
                    }
                }
                if ( $app->tidy_clean_dl ) {
                    $this->tidy_clean_dl( $dom, $changed, $styles );
                }
                if ( $app->tidy_clean_ul_ol ) {
                    $this->tidy_clean_ul_ol( $dom, $changed, $styles );
                }
                if ( $app->tidy_clean_double_byte_space ) {
                    $this->tidy_clean_double_byte_space( $dom, $changed, $styles );
                }
                $finder = new DomXPath( $dom );
                if ( $app->tidy_clean_comment ) {
                    $elements = $finder->query( '//*/comment()' );
                    foreach ( $elements as $element ) {
                        $element->parentNode->removeChild( $element );
                        $changed = true;
                    }
                }
                if ( $app->tidy_clean_lang ) {
                    $language_mapping = is_array( $app->tidy_clean_lang )
                                      ? $app->tidy_clean_lang : ['jp' => 'ja'];
                    $elements = $finder->query( './/*[@lang]' );
                    foreach ( $elements as $element ) {
                        $attrV = $element->getAttribute( 'lang' );
                        if ( isset( $language_mapping[ $attrV ] ) ) {
                            if ( $language_mapping[ $attrV ] === false ) {
                                $element->setAttribute( 'lang', $language_mapping[ $attrV ] );
                            } else {
                                $element->removeAttribute( 'lang' );
                            }
                            $changed = true;
                        }
                    }
                }
                if ( $app->tidy_clean_empty_attrs ) {
                    $attrs = explode( ',', $app->tidy_clean_empty_attrs );
                    foreach ( $attrs as $attr ) {
                        $elements = $finder->query( './/*[@' . $attr .  ']' );
                        foreach ( $elements as $element ) {
                            $attrV = $element->getAttribute( $attr );
                            if (! $attrV ) {
                                $element->removeAttribute( $attr );
                            }
                        }
                    }
                }
                if ( $app->tidy_clean_attrs ) {
                    $attrs = explode( ',', $app->tidy_clean_attrs );
                    foreach ( $attrs as $attr ) {
                        $elements = $finder->query( './/*[@' . $attr .  ']' );
                        foreach ( $elements as $element ) {
                            $element->removeAttribute( $attr );
                        }
                    }
                }
                if ( $changed || $app->tidy_force_utf8 ) {
                    if ( PHP_VERSION >= 8.2 ) {
                        $html = html_entity_decode( $dom->saveHTML() );
                    } else {
                        $html = mb_convert_encoding( $dom->saveHTML(), 'utf-8', 'HTML-ENTITIES' );
                    }
                }
            }
        }
        if ( $app->tidy_clean_empty_a ) {
            if ( preg_match_all( '!<a\s[^>]+?>\s{0,}?</a>!si', $html, $matchs ) ) {
                $matchs = $matchs[0];
                foreach ( $matchs as $match ) {
                    $check = preg_replace( "/[]\r|\n]/", ' ', $match );
                    if ( stripos( $check, 'href=' ) !== false && stripos( $check, ' name=' ) === false ) {
                        $html = str_replace( $match, '', $html );
                    }
                }
            }
        }
        if ( $app->tidy_repair_ldquo_rdquo && strpos( $html, '&#14' ) !== false ) {
            $html = str_replace( '&#147;', '&ldquo;', $html );
            $html = str_replace( '&#148;', '&rdquo;', $html );
            $html = str_replace( '&#151;', '&mdash;', $html );
        }
        if ( $body_match ) {
            if ( preg_match( "!(^.*?<body[^>]*?>)(.*?)(</body>.*$)!si", $html, $matchs ) ) {
                $html_head = $matchs[1];
                $html_main = $matchs[2];
                $html_end  = $matchs[3];
                $html = "{$html_head}{$body_head}{$html_main}{$html_foot}{$html_end}";
            }
        }
        /*
        if ( $normalize ) {
            $html = PTUtil::normalize( $html );
        }
        */
        $config = $app->tidy_config;
        $config = $app->tidy_html5 ? $this->html5_config( $config ) : $config;
        if ( extension_loaded( 'tidy' ) ) {
            $tidy = tidy_parse_string( $html, $config, 'utf8' );
            $tidy->cleanRepair();
            $html = $tidy->value;
        }
        foreach ( $replaced_map as $magic => $attrV ) {
            $html = preg_replace( "/$magic/", $attrV, $html, 1 );
        }
        if ( !empty( $styles ) ) {
            $this->add_styles( $styles, $html );
        }
        if ( $app->tidy_clean_code_point ) {
            $hex_chars_map = self::HEX_CHARS_MAP;
            foreach ( $hex_chars_map as $regex => $char ) {
                if ( preg_match( $regex, $html ) ) {
                    $html = preg_replace( $regex, $char, $html );
                }
            }
        }
        if ( $app->tidy_re_save_html ) {
            $html = PTUtil::encode_double( $html );
            $dom = new DomDocument();
            if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                if ( PHP_VERSION >= 8.2 ) {
                    $html = html_entity_decode( $dom->saveHTML() );
                } else {
                    $html = mb_convert_encoding( $dom->saveHTML(), 'utf-8', 'HTML-ENTITIES' );
                }
            }
        }
        return $html;
    }

    function add_styles ( $styles = [], &$html = '' ) {
        $str = '';
        foreach ( $styles as $class => $style ) {
            $str .= ".{$class}{{$style}}";
        }
        if (! $str ) {
            $this->styles = [];
            return;
        }
        $str = "<style>{$str}</style>";
        if ( preg_match( '/<meta[^>]+charset=[^>]+?>/si', $html ) ) {
            $html = preg_replace( '/(<meta[^>]+charset=[^>]+?>)/si', '$1' . PHP_EOL . $str . PHP_EOL, $html, 1 );
        } else {
            $html = preg_replace( '/(<head[^>]*?>)/si', '$1' . PHP_EOL . $str . PHP_EOL, $html, 1 );
        }
        $this->styles = [];
    }

    private function tidy_clean_a_href ( &$html, &$replaced_map ) {
        $app = $this->app;
        $map = is_array( $app->tidy_clean_a_href ) ? $app->tidy_clean_a_href
                                                   : ['&#13;' => '', ' ' => '%20'];
        if ( preg_match_all( '/(<a\s*[^>]*?href=")(.*?)("[^>]*?>)/si', $html, $matchs ) ) {
            $tags = $matchs[0];
            $preHTML = $matchs[1];
            $hrefs = $matchs[2];
            $afterHTML = $matchs[3];
            foreach ( $hrefs as $idx => $href ) {
                $replaced = $href;
                foreach ( $map as $char => $after ) {
                    if ( strpos( $href, $char ) !== false ) {
                        $replaced = str_replace( $char, $after, $replaced );
                    }
                }
                if ( $href !== $replaced ) {
                    $magic = self::magic( $html, $this->tokens );
                    $tag = preg_quote( $tags[ $idx ], '/' );
                    $replace = $preHTML[ $idx ] . $magic . $afterHTML[ $idx ];
                    $html = preg_replace( "/$tag/", $replace, $html, 1 );
                    $replaced_map[ $magic ] = $replaced;
                }
            }
        }
    }

    private function tidy_clean_double_byte_space ( &$dom, &$changed = false, &$styles = [] ) {
        $app = $this->app;
        $tags = ['table', 'ul', 'ol', 'dl'];
        foreach ( $tags as $tag ) {
            $elements = $dom->getElementsByTagName( $tag );
            foreach ( $elements as $element ) {
                $childNodes = $element->childNodes;
                foreach ( $childNodes as $childNode ) {
                    if ( get_class( $childNode ) === 'DOMText' ) {
                        if (! preg_match( "/^\s*$/s", $childNode->wholeText ) ) {
                            $newNode = $dom->createTextNode( str_replace( '　', ' ', $childNode->wholeText ) );
                            $element->replaceChild( $newNode, $childNode );
                            $changed = true;
                        }
                    }
                }
            }
        }
    }

    private function tidy_clean_ul_ol ( &$dom, &$changed = false, &$styles = [] ) {
        $app = $this->app;
        $tags = ['ul', 'ol'];
        foreach ( $tags as $tag ) {
            $elements = $dom->getElementsByTagName( $tag );
            foreach ( $elements as $element ) {
                $childNodes = $element->childNodes;
                $lastLi = null;
                $invalidElement = null;
                $textNode = '';
                $removeNodes = [];
                foreach ( $childNodes as $childNode ) {
                    if ( get_class( $childNode ) === 'DOMElement' ) {
                        if ( $childNode->tagName === 'li' ) {
                            $lastLi = $childNode;
                            if ( $invalidElement ) {
                                $newElement = $dom->createElement( 'li' );
                                $newElement->appendChild( $invalidElement );
                                $element->insertBefore( $newElement, $lastLi );
                                $invalidElement = null;
                                $changed = true;
                            }
                            $textNode = '';
                            $removeNodes = [];
                        } else if ( $lastLi ) {
                            $lastLi->appendChild( $childNode );
                        } else {
                            $removeNodes[] = $childNode;
                            $invalidElement = $childNode;
                            $textNode .= $this->outerHTML( $childNode ) ;
                        }
                    } else if ( get_class( $childNode ) === 'DOMText' ) {
                        if (! preg_match( "/^\s*$/s", $childNode->wholeText ) ) {
                            $removeNodes[] = $childNode;
                            $textNode .= $childNode->wholeText;
                        }
                    }
                }
                if ( $invalidElement ) {
                    $newElement = $dom->createElement( 'li' );
                    $newElement->appendChild( $invalidElement );
                    $element->appendChild( $invalidElement );
                    $changed = true;
                }
                if ( $textNode ) {
                    // Change to div?
                    $newElement = $dom->createElement( 'li' );
                    $text = $dom->createTextNode( $textNode );
                    $newElement->appendChild( $text );
                    $element->appendChild( $newElement );
                    foreach ( $removeNodes as $removeNode ) {
                        $element->removeChild( $removeNode );
                    }
                    $changed = true;
                }
            }
        }
    }

    private function tidy_clean_dl ( &$dom, &$changed = false, &$styles = [] ) {
        $app = $this->app;
        $elements = $dom->getElementsByTagName( 'dl' );
        foreach ( $elements as $element ) {
            $has_dt = false;
            $has_dd = false;
            $childNodes = $element->childNodes;
            $body = null;
            $lastNode = null;
            foreach ( $childNodes as $childNode ) {
                if ( get_class( $childNode ) === 'DOMElement' ) {
                    if ( $childNode->tagName === 'dt' ) {
                        $has_dt = true;
                    } else if (! $has_dd && $childNode->tagName === 'dd' ) {
                        $body = $childNode;
                        $has_dd = true;
                    }
                    $lastNode = $childNode;
                }
            }
            if (! $has_dt && ! $has_dd ) {
                $innerHTML = trim( $this->innerHTML( $element ) );
                if (! $innerHTML ) {
                    $element->parentNode->removeChild( $element );
                } else {
                    $replace = $dom->createElement( 'p', $innerHTML );
                    foreach ( $element->attributes as $attr ) {
                        $replace->setAttribute( $attr->name, $attr->value );
                    }
                    $element->parentNode->replaceChild( $replace, $element );
                    $changed = true;
                }
            } else if (! $has_dt && $body ) {
                $child = $dom->createElement( 'dt', '&#8203;' );
                $element->insertBefore( $child, $body );
                $changed = true;
            } else if (! $has_dt ) {
                $child = $dom->createElement( 'dt', '&#8203;' );
                $element->appendChild( $child );
                $changed = true;
            }
            if (! $has_dd ) {
                $child = $dom->createElement( 'dd' );
                $element->appendChild( $child );
                $changed = true;
            }
            if ( $lastNode && $lastNode->tagName === 'dt' ) {
                $child = $dom->createElement( 'dd' );
                $element->appendChild( $child );
                $changed = true;
            }
        }
    }

    private function tidy_clean_br_clear ( &$dom, &$changed = false, &$styles = [] ) {
        $app = $this->app;
        $attrs_map = ['all' => 'both', 'right' => 'right', 'left' => 'left'];
        $elements = $dom->getElementsByTagName( 'br' );
        foreach ( $elements as $element ) {
            $attrV = $element->getAttribute( 'clear' );
            if ( $attrV ) {
                $changed = true;
                $element->removeAttribute( 'clear' );
                $style = $app->tidy_css_to_head ? '' : $element->getAttribute( 'style' );
                if (! $style || ! stripos( $style, 'clear' ) ) {
                    $style_org = $style;
                    $attrV = strtolower( $attrV );
                    if ( isset( $attrs_map[ $attrV ] ) ) {
                        $value = $attrs_map[ $attrV ];
                        $style .= $style ? ";clear:{$value}" : "clear:{$value}";
                    }
                    if ( $style !== $style_org ) {
                        if ( $app->tidy_css_to_head ) {
                            $this->tidy_add_class( $element, $style, $styles );
                        } else {
                            $element->setAttribute( 'style', $style );
                        }
                    }
                }
            }
        }
    }

    private function tidy_clean_a_name ( &$dom, &$changed = false, &$styles = [] ) {
        $app = $this->app;
        $elements = $dom->getElementsByTagName( 'a' );
        foreach ( $elements as $element ) {
            $attrV = $element->getAttribute( 'name' );
            if ( $attrV ) {
                $element->removeAttribute( 'name' );
                $changed = true;
                $attrID = $element->getAttribute( 'id' );
                if (! $attrID ) {
                    $element->setAttribute( 'id', $attrV );
                }
            }
        }
    }

    private function tidy_clean_table ( &$dom, &$changed = false, &$styles = [] ) {
        $app = $this->app;
        $tags = ['table', 'tr', 'th', 'td'];
        $attrs = ['width', 'height', 'align', 'valign', 'cellpadding', 'nowrap', 'bgcolor'];
        $attrs_map = ['align' => 'text-align', 'valign' => 'vertical-align',
                      'cellpadding' => 'padding', 'nowrap' => 'white-space',
                      'bgcolor' => 'background-color'];
        $presentation_class = $app->tidy_table_presentation_class;
        $presentation_classes = explode( ',', $presentation_class );
        foreach ( $tags as $tag ) {
            $elements = $dom->getElementsByTagName( $tag );
            foreach ( $elements as $element ) {
                $changed = true;
                $style = $app->tidy_css_to_head ? '' : $element->getAttribute( 'style' );
                $style_org = $style;
                if ( $tag === 'table' ) {
                    $element->removeAttribute( 'summary' );
                    if ( $presentation_class ) {
                        $class = $element->getAttribute( 'class' );
                        $role = $element->getAttribute( 'role' );
                        if (! $role ) {
                            foreach ( $presentation_classes as $className ) {
                                if ( stripos( $class, $className ) !== false ) {
                                    $element->setAttribute( 'role', 'presentation' );
                                    break;
                                }
                            }
                        }
                    }
                } else if ( $tag === 'td' ) {
                    $element->removeAttribute( 'scope' );
                }
                if ( $tag !== 'table' && $tag !== 'tr' ) {
                    // Remove empty attributes.
                    $span = $element->getAttribute( 'rowspan' );
                    if (! $span ) {
                        $element->removeAttribute( 'rowspan' );
                    }
                    $span = $element->getAttribute( 'colspan' );
                    if (! $span ) {
                        $element->removeAttribute( 'colspan' );
                    }
                }
                foreach ( $attrs as $attr ) {
                    $attrV = $element->getAttribute( $attr );
                    $element->removeAttribute( $attr );
                    if (! $attrV ) {
                        continue;
                    }
                    $prop = $attrs_map[ $attr ] ?? $attr;
                    if (! $style || ! stripos( $style, $prop ) ) {
                        if (!isset( $attrs_map[ $attr ] ) ) {
                            if ( strpos( $attrV, '%' ) === false && strpos( $attrV, 'px' ) === false ) {
                                $attrV .= 'px';
                            }
                        } else if ( $attr === 'cellpadding' ) {
                            $attrV .= 'px';
                        }
                        $style .= $style ? ";{$prop}:{$attrV}" : "{$prop}:{$attrV}";
                    }
                }
                $attrV = $element->getAttribute( 'border' );
                if ( $attrV === '0' ) {
                    $element->removeAttribute( 'border' );
                    if (! $app->tidy_clean_table_zero_border ) {
                        $style .= $style ? ";border:none" : "border:none";
                    }
                } else if ( $app->tidy_clean_table_border ) {
                    $element->removeAttribute( 'border' );
                }
                $attrV = $element->getAttribute( 'cellspacing' );
                if ( $attrV === '0' ) {
                    $element->removeAttribute( 'cellspacing' );
                }
                if ( $style !== $style_org ) {
                    if ( $app->tidy_css_to_head ) {
                        $this->tidy_add_class( $element, $style, $styles );
                    } else {
                        $element->setAttribute( 'style', $style );
                    }
                }
            }
        }
    }

    private function tidy_clean_image ( &$dom, &$changed = false, &$styles = [] ) {
        $app = $this->app;
        $invalid_attrs = $app->tidy_clean_image_attrs;
        $invalid_attrs = explode( ',', $invalid_attrs );
        $attrs = ['vspace', 'hspace', 'border'];
        $sizes = ['width', 'height'];
        $elements = $dom->getElementsByTagName( 'img' );
        foreach ( $elements as $element ) {
            $src = $element->getAttribute( 'src' );
            $attributes = $element->attributes;
            $has_alt = false;
            $has_width = false;
            $has_hight = false;
            $has_align = false;
            foreach ( $attributes as $attribute ) {
                $attr_name = $attribute->name;
                if ( $attr_name === 'alt' ) {
                    $has_alt = true;
                } else if ( $attr_name === 'width' ) {
                    $has_width = true;
                } else if ( $attr_name === 'height' ) {
                    $has_hight = true;
                } else if ( $attr_name === 'align' ) {
                    $has_align = true;
                } else if ( in_array( $attr_name, $invalid_attrs ) ) {
                    if ( $attr_name === 'longdesc' ) {
                        $longdesc = urldecode( $element->getAttribute( $attr_name ) );
                        $alt = urldecode( $element->getAttribute( 'alt' ) );
                        if ( $longdesc ) {
                            $element->setAttribute( 'alt', "{$alt} {$longdesc}" );
                        }
                    }
                    $element->removeAttribute( $attr_name );
                    $changed = true;
                }
            }
            if (! $has_alt ) {
                $element->setAttribute( 'alt', '' );
                $changed = true;
            }
            $style = $app->tidy_css_to_head ? '' : $element->getAttribute( 'style' );
            $style_org = $style;
            foreach ( $attrs as $attr ) {
                $attrV = $element->getAttribute( $attr );
                $element->removeAttribute( $attr );
                if ( $attrV === '' ) {
                    continue;
                }
                $changed = true;
                if ( $attr == 'vspace' || $attr == 'hspace' ) {
                    if (! $style || ! stripos( $style, 'margin' ) ) {
                        if ( $attr == 'vspace' ) {
                            $css = "margin-top:{$attrV}px;margin-bottom:{$attrV}px";
                        } else {
                            $css = "margin-left:{$attrV}px;margin-right:{$attrV}px";
                        }
                        $style .= $style ? ";{$css}" : "{$css}";
                    }
                } else if ( $attr == 'border' && is_numeric( $attrV ) ) {
                    if (! $style || ! stripos( $style, 'border' ) ) {
                        $style .= $style ? ";border:{$attrV}px" : "border:{$attrV}px";
                    }
                }
            }
            if ( $has_align ) {
                $attrV = strtolower( $element->getAttribute( 'align' ) );
                $element->removeAttribute( 'align' );
                $changed = true;
                if ( $attrV === 'left' || $attrV === 'right' ) {
                    $style .= $style ? ";float:{$attrV}" : "float:{$attrV}";
                } else if ( $attrV === 'top' || $attrV === 'middle' || $attrV === 'bottom' ) {
                    $style .= $style ? ";vertical-align:middle" : "vertical-align:middle";
                }
            }
            foreach ( $sizes as $attr ) {
                $attrV = strtolower( $element->getAttribute( $attr ) );
                if ( $attrV ) {
                    // Not number.
                    if (! is_numeric( $attrV ) ) {
                        if ( preg_match( '/^[0-9]+px$/', $attrV ) ) {
                            $style .= $style ? ";{$attr}:{$attrV}" : "{$attr}:{$attrV}";
                        }
                        $element->removeAttribute( $attr );
                        $changed = true;
                    }
                } else {
                    // Empty attribute value.
                    if ( $has_hight && $attr === 'height' ) {
                        $element->removeAttribute( $attr );
                        $changed = true;
                    } else if ( $has_width && $attr === 'width' ) {
                        $element->removeAttribute( $attr );
                        $changed = true;
                    }
                }
            }
            if ( $style !== $style_org ) {
                if ( $app->tidy_css_to_head ) {
                    $this->tidy_add_class( $element, $style, $styles );
                } else {
                    $element->setAttribute( 'style', $style );
                }
            }
            if ( $app->tidy_clean_duplicate_alt ) {
                $parent = $element->parentNode;
                if ( get_class( $parent ) === 'DOMElement' ) {
                    $tagName = $parent->tagName;
                    if ( $tagName === 'a' ) {
                        $alt = trim( $element->getAttribute( 'alt' ) );
                        if (! $alt ) {
                            continue;
                        }
                        $clone = clone $parent;
                        $childNodes = $clone->childNodes;
                        $removeNodes = [];
                        foreach ( $childNodes as $childNode ) {
                            if ( get_class( $childNode ) === 'DOMElement' && $childNode->tagName === 'img' ) {
                                $removeNodes[] = $childNode;
                            }
                        }
                        foreach ( $removeNodes as $removeNode ) {
                            $clone->removeChild( $removeNode );
                        }
                        $innerHTML = trim( $this->innerHTML( $clone ) );
                        if ( $app->tidy_clean_duplicate_alt == 1 && strpos( $innerHTML, $alt ) !== false ) {
                            $element->setAttribute( 'alt', '' );
                        } else if ( $app->tidy_clean_duplicate_alt === 2 && $innerHTML === $alt ) {
                            $element->setAttribute( 'alt', '' );
                        }
                    }
                }
            }
        }
    }

    private function tidy_clean_block_align ( &$dom, &$changed = false, &$styles = [] ) {
        $app = $this->app;
        if ( is_string( $app->tidy_clean_block_align ) && $app->tidy_clean_block_align != 1 ) {
            $tags = preg_split( '/\s*,\s*/', $app->tidy_clean_block_align );
        } else {
            $tags = is_array( $app->tidy_clean_block_align )
                  ? $app->tidy_clean_block_align : ['p', 'div', 'dd', 'li'];
        }
        foreach ( $tags as $tag ) {
            $elements = $dom->getElementsByTagName( $tag );
            foreach ( $elements as $element ) {
                $attributes = $element->attributes;
                $style = $app->tidy_css_to_head ? '' : $element->getAttribute( 'style' );
                $style_org = $style;
                $has_align = false;
                foreach ( $attributes as $attribute ) {
                    if ( $attribute->name === 'align' ) {
                        $has_align = true;
                        break;
                    }
                }
                if (! $has_align ) {
                    continue;
                }
                $attrV = strtolower( $element->getAttribute( 'align' ) );
                $element->removeAttribute( 'align' );
                if ( $attrV === 'left' || $attrV === 'right' || $attrV === 'center' ) {
                    $style .= $style ? ";text-align:{$attrV}" : "text-align:{$attrV}";
                    if ( $app->tidy_css_to_head ) {
                        $this->tidy_add_class( $element, $style, $styles );
                    } else {
                        $element->setAttribute( 'style', $style );
                    }
                }
            }
        }
    }

    private function tidy_add_class ( &$element, $style, &$styles = [] ) {
        $class = $element->getAttribute( 'class' );
        $app = $this->app;
        $prefix = $app->tidy_class_prefix;
        $classname = $prefix ? $prefix . '-' . self::hash_short( $style ) : self::hash_short( $style ); // or md5
        $styles[ $classname ] = $style;
        $class = $class ? "{$class} {$classname}" : $classname;
        $element->setAttribute( 'class', $class );
    }

    private static function hash_short ( $data, $algo = 'CRC32' ) {
        return strtr( rtrim( base64_encode( pack( 'H*', hash( $algo, $data ) ) ), '=' ), '+/', '-_' );
    }

    private static function magic ( $content = '', &$tokens = [] ) {
        $magic = substr(
            str_shuffle( 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 15 );
        $magic = preg_quote( $magic, '/' );
        if ( strpos( $content, $magic ) !== false )
            return static::magic( $content, $tokens );
        if ( isset( $tokens[ $magic ] ) )
            return static::magic( $content, $tokens );
        $tokens[ $magic ] = true;
        return $magic;
    }

    function get_config ( $name, $workspace_id = 0 ) {
        if ( $workspace_id ) {
            $use_system = $this->get_config_value( 'htmltidy_use_system_setting', $workspace_id );
            if ( $use_system ) {
                $workspace_id = 0;
            }
        }
        return $this->get_config_value( $name );
    }

    function innerHTML ( $element ) { 
        $innerHTML = ''; 
        $children  = $element->childNodes;
        foreach ( $children as $child ) { 
            $innerHTML .= $element->ownerDocument->saveHTML( $child );
        }
        return $innerHTML; 
    }

    function outerHTML ( $element ) { 
        $outerHTML = ''; 
        if ( $element->nodeType == 1 ) {
            $tagAttrs = [];
            foreach ( $element->attributes as $attr ) {
                $tagAttrs[] = $attr->nodeValue ?
                              $attr->nodeName . '="' . $attr->nodeValue . '"' : $attr->nodeName;
            }
            $startTag = '<' . $element->nodeName . ' ' . implode( ' ', $tagAttrs ) . '>';
            $endTag = '</' . $element->nodeName . '>';
        }
        $children  = $element->childNodes;
        if ( $children !== null ) {
            foreach ( $children as $child ) { 
                $outerHTML .= $element->ownerDocument->saveHTML( $child );
            }
        }
        $inline = ['br', 'hr', 'img'];
        if ( $element->nodeType == 1 ) {
            if (! $outerHTML && in_array( $element->nodeName, $inline ) ) {
                return str_replace( '>', ' />', $startTag );
            }
            $outerHTML = "{$startTag}{$outerHTML}{$endTag}";
        }
        return $outerHTML; 
    }

    function parse_csv ( $s ) {
        return str_getcsv( stripslashes( $s ), $this->csv_delimiter, $this->csv_enclosure );
    }

    const HEX_CHARS_MAP = [
        '/\x{0080}/u' => 'Ђ',
        '/\x{0081}/u' => 'Ѓ',
        '/\x{0082}/u' => '‚',
        '/\x{0083}/u' => 'ѓ',
        '/\x{0084}/u' => '„',
        '/\x{0085}/u' => '…',
        '/\x{0086}/u' => '†',
        '/\x{0087}/u' => '‡',
        '/\x{0088}/u' => '€',
        '/\x{0089}/u' => '‰',
        '/\x{008A}/u' => 'Љ',
        '/\x{008B}/u' => '‹',
        '/\x{008C}/u' => 'Њ',
        '/\x{008D}/u' => 'Ќ',
        '/\x{008E}/u' => 'Ћ',
        '/\x{008F}/u' => 'Џ',
        '/\x{0090}/u' => 'ђ',
        '/\x{0091}/u' => '‘',
        '/\x{0092}/u' => '’',
        '/\x{0093}/u' => '“',
        '/\x{0094}/u' => '”',
        '/\x{0095}/u' => '•',
        '/\x{0096}/u' => '–',
        '/\x{0097}/u' => '—',
        '/\x{0098}/u' => ' ',
        '/\x{0099}/u' => '™',
        '/\x{009A}/u' => 'љ',
        '/\x{009B}/u' => '›',
        '/\x{009C}/u' => 'њ',
        '/\x{009D}/u' => 'ќ',
        '/\x{009E}/u' => 'ћ',
        '/\x{009F}/u' => 'џ',
        '/\x{00A0}/u' => ' ',
        '/\x{00A1}/u' => 'Ў',
        '/\x{00A2}/u' => 'ў',
        '/\x{00A3}/u' => 'Ј',
        '/\x{00A4}/u' => '¤',
        '/\x{00A5}/u' => 'Ґ',
        '/\x{00A6}/u' => '¦',
        '/\x{00A7}/u' => '§',
        '/\x{00A8}/u' => 'Ё',
        '/\x{00A9}/u' => '©',
        '/\x{00AA}/u' => 'Є',
        '/\x{00AB}/u' => '«',
        '/\x{00AC}/u' => '¬',
        '/\x{00AD}/u' => ' ',
        '/\x{00AE}/u' => '®',
        '/\x{00AF}/u' => 'Ї',
        '/\x{00B0}/u' => '°',
        '/\x{00B1}/u' => '±',
        '/\x{00B2}/u' => 'І',
        '/\x{00B3}/u' => 'і',
        '/\x{00B4}/u' => 'ґ',
        '/\x{00B5}/u' => 'µ',
        '/\x{00B6}/u' => '¶',
        '/\x{00B7}/u' => '·',
        '/\x{00B8}/u' => 'ё',
        '/\x{00B9}/u' => '№',
        '/\x{00BA}/u' => 'є',
        '/\x{00BB}/u' => '»',
        '/\x{00BC}/u' => 'ј',
        '/\x{00BD}/u' => 'Ѕ',
        '/\x{00BE}/u' => 'ѕ',
        '/\x{00BF}/u' => 'ї',
        '/\x{00C0}/u' => 'А',
        '/\x{00C1}/u' => 'Б',
        '/\x{00C2}/u' => 'В',
        '/\x{00C3}/u' => 'Г',
        '/\x{00C4}/u' => 'Д',
        '/\x{00C5}/u' => 'Е',
        '/\x{00C6}/u' => 'Ж',
        '/\x{00C7}/u' => 'З',
        '/\x{00C8}/u' => 'И',
        '/\x{00C9}/u' => 'Й',
        '/\x{00CA}/u' => 'К',
        '/\x{00CB}/u' => 'Л',
        '/\x{00CC}/u' => 'М',
        '/\x{00CD}/u' => 'Н',
        '/\x{00CE}/u' => 'О',
        '/\x{00CF}/u' => 'П',
        '/\x{00D0}/u' => 'Р',
        '/\x{00D1}/u' => 'С',
        '/\x{00D2}/u' => 'Т',
        '/\x{00D3}/u' => 'У',
        '/\x{00D4}/u' => 'Ф',
        '/\x{00D5}/u' => 'Х',
        '/\x{00D6}/u' => 'Ц',
        '/\x{00D7}/u' => 'Ч',
        '/\x{00D8}/u' => 'Ш',
        '/\x{00D9}/u' => 'Щ',
        '/\x{00DA}/u' => 'Ъ',
        '/\x{00DB}/u' => 'Ы',
        '/\x{00DC}/u' => 'Ь',
        '/\x{00DD}/u' => 'Э',
        '/\x{00DE}/u' => 'Ю',
        '/\x{00DF}/u' => 'Я',
        '/\x{00E0}/u' => 'а',
        '/\x{00E1}/u' => 'б',
        '/\x{00E2}/u' => 'в',
        '/\x{00E3}/u' => 'г',
        '/\x{00E4}/u' => 'д',
        '/\x{00E5}/u' => 'е',
        '/\x{00E6}/u' => 'ж',
        '/\x{00E7}/u' => 'з',
        '/\x{00E8}/u' => 'и',
        '/\x{00E9}/u' => 'й',
        '/\x{00EA}/u' => 'к',
        '/\x{00EB}/u' => 'л',
        '/\x{00EC}/u' => 'м',
        '/\x{00ED}/u' => 'н',
        '/\x{00EE}/u' => 'о',
        '/\x{00EF}/u' => 'п',
        '/\x{00F0}/u' => 'р',
        '/\x{00F1}/u' => 'с',
        '/\x{00F2}/u' => 'т',
        '/\x{00F3}/u' => 'у',
        '/\x{00F4}/u' => 'ф',
        '/\x{00F5}/u' => 'х',
        '/\x{00F6}/u' => 'ц',
        '/\x{00F7}/u' => 'ч',
        '/\x{00F8}/u' => 'ш',
        '/\x{00F9}/u' => 'щ',
        '/\x{00FA}/u' => 'ъ',
        '/\x{00FB}/u' => 'ы',
        '/\x{00FC}/u' => 'ь',
        '/\x{00FD}/u' => 'э',
        '/\x{00FE}/u' => 'ю',
        '/\x{00FF}/u' => 'я'
    ];
}