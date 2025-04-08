<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
require 'lib' . DS . 'JShrink' . DS . 'Minifier.php';

class Minifier extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function hdlr_jsminifier ( $args, $content, $ctx, &$repeat ) {
        if ( isset( $content ) ) {
            if ( $ctx->app->minifier_use_jshrink ) {
                $content = JShrink\Minifier::minify( $content );
            } else {
                $p = array(
                      "/[\r\n]+/",
                      "/^[\s\t]*\/\/.+$/m",
                      "/\/\*.+?\*\//s",
                      "/([\{\(\[,;=])\n+/",
                      "/[\s\t]*([\{\(\[,;=\+\*-<>\|\&\?\:!])[\s\t]*/",
                      "/\n\}/",
                      "/^[\s\t]+/m",
                      "/[\s\t]+$/m",
                      "/[\s\t]{2,}/",
                    );
                $r = array ( "\n", "", "", "$1", "$1", "}", "", "", "", );
                do { $content = preg_replace( $p, $r, $content ); }
                    while( $content != preg_replace( $p, $r, $content ) );
            }
        }
        return $content;
    }

    function hdlr_cssminifier ( $args, $content, $ctx, &$repeat ) {
        if ( isset( $content ) ) {
            $content = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content );
            $content = str_replace( ["\r\n", "\r", "\n", "\t", '  ', '    ', '    '],
                                    '', $content );
            $content = str_replace( ' {', '{', $content );
            $content = str_replace( ';}', '}', $content );
            $content = str_replace( ': ', ':', $content );
        }
        return $content;
    }

    function hdlr_htmlminifier ( $args, $content, $ctx, &$repeat ) {
        if ( isset( $content ) ) {
            if ( $ctx->app->minifier_use_smarty ) {
                require_once( LIB_DIR . 'Smarty' . DS . 'outputfilter.trimwhitespace.php' );
                $content = smarty_outputfilter_trimwhitespace( $content );
            } else {
                $replaced_map = [];
                $tokens = [];
                if ( stripos( $content, '<s' ) !== false ) {
                    if ( preg_match_all( "/<script[^>]*?>.*?<\/script>/si", $content, $matches ) ) {
                        $matches = $matches[0];
                        foreach ( $matches as $matche ) {
                            $magic = $this->magic( $content, $tokens );
                            $replaced_map[ $magic ] = $matche;
                            $content = str_replace( $matche, $magic, $content );
                        }
                    }
                    if ( preg_match_all( "/<style[^>]*?>.*?<\/style>/si", $content, $matches ) ) {
                        $matches = $matches[0];
                        foreach ( $matches as $matche ) {
                            $magic = $this->magic( $content, $tokens );
                            $replaced_map[ $magic ] = $matche;
                            $content = str_replace( $matche, $magic, $content );
                        }
                    }
                }
                require_once( $this->path() . DS . 'lib' . DS . 'TinyHtmlMinifier' . DS . 'TinyHtmlMinifier.php' );
                $minifier = new TinyHtmlMinifier( [] );
                $content = $minifier->minify( $content );
                if (! empty( $replaced_map ) ) {
                    foreach ( $replaced_map as $token => $phrase ) {
                        $content = str_replace( $token, $phrase, $content );
                    }
                }
            }
        }
        return $content;
    }

    function post_rebuild ( $cb, $app, $tmpl, &$content ) {
        $workspace_id = 0;
        if ( isset( $cb['template'] ) && $cb['template']->workspace_id ) {
            $workspace_id = $cb['template']->workspace_id;
        }
        $static = $this->get_config_value( 'minifier_minify_static', $workspace_id );
        $ctx = $app->ctx;
        $publish_type = $ctx->vars['publish_type'] ?? 1;
        if ( $publish_type == 6 ) {
            $minify = $this->get_config_value( 'minifier_minify_dynamic', $workspace_id );
            if (! $minify ) return true;
        } else {
            $minify = $this->get_config_value( 'minifier_minify_static', $workspace_id );
            if (! $minify ) return true;
        }
        $urlinfo = $cb['urlinfo'];
        $mime_type = $urlinfo->mime_type;
        $type = null;
        $minify_html = false;
        $minify_js = false;
        $minify_css = false;
        if ( strpos( $content, '<?php' ) !== false ) {
            return true;
        }
        if ( $mime_type == 'text/html' ) {
            $extension = PTUtil::get_extension( $urlinfo->file_path );
            if ( $extension === 'php' ) {
                return true;
            }
            $type = 'HTML';
            $minify_html = $this->get_config_value( 'minifier_minify_html', $workspace_id );
            if (! $minify_html ) return;
            $minify_js = $this->get_config_value( 'minifier_minify_js', $workspace_id );
            $minify_css = $this->get_config_value( 'minifier_minify_css', $workspace_id );
        } else if ( $mime_type == 'text/css' ) {
            $type = 'CSS';
            $minify_css = $this->get_config_value( 'minifier_minify_css', $workspace_id );
            if (! $minify_css ) return true;
        } else if ( $mime_type == 'application/javascript' ) {
            $type = 'JS';
            $minify_js = $this->get_config_value( 'minifier_minify_js', $workspace_id );
            if (! $minify_js ) return true;
        } else if ( $mime_type == 'application/json' ) {
            $type = 'JS';
            $minify_js = $this->get_config_value( 'minifier_minify_js', $workspace_id );
            if (! $minify_js ) return true;
        }
        $content = $this->minify_content( $app, $type, $content, $minify_js, $minify_css );
    }

    function post_preview ( $cb, $app, &$content ) {
        if (! $app->minifier_preview ) return;
        $workspace = $cb['workspace'];
        $workspace_id = is_object( $workspace ) ? (int) $workspace->id : 0;
        $static = $this->get_config_value( 'minifier_minify_static', $workspace_id );
        $ctx = $app->ctx;
        $publish_type = $ctx->vars['publish_type'] ?? 1;
        if ( $publish_type == 6 ) {
            $minify = $this->get_config_value( 'minifier_minify_dynamic', $workspace_id );
            if (! $minify ) return true;
        } else {
            $minify = $this->get_config_value( 'minifier_minify_static', $workspace_id );
            if (! $minify ) return true;
        }
        $minify_js  = false;
        $minify_css = false;
        $mime_type = $cb['mime_type'];
        if ( $mime_type == 'text/html' ) {
            $type = 'HTML';
            $minify_html = $this->get_config_value( 'minifier_minify_html', $workspace_id );
            if (! $minify_html ) return;
            $minify_js = $this->get_config_value( 'minifier_minify_js', $workspace_id );
            $minify_css = $this->get_config_value( 'minifier_minify_css', $workspace_id );
        } else if ( $mime_type == 'text/css' ) {
            $type = 'CSS';
            $minify_css = $this->get_config_value( 'minifier_minify_css', $workspace_id );
            if (! $minify_css ) return true;
        } else if ( $mime_type == 'application/javascript' ) {
            $type = 'JS';
            $minify_js = $this->get_config_value( 'minifier_minify_js', $workspace_id );
            if (! $minify_js ) return true;
        } else if ( $mime_type == 'application/json' ) {
            $type = 'JS';
            $minify_js = $this->get_config_value( 'minifier_minify_js', $workspace_id );
            if (! $minify_js ) return true;
        }
        $content = $this->minify_content( $app, $type, $content, $minify_js, $minify_css );
    }

    function minify_content ( $app, $type, $content, $minify_js, $minify_css ) {
        $content = trim( $content );
        $ctx = $app->ctx;
        $repeat = false;
        $args = [];
        if ( $type == 'HTML' ) {
            $content = $this->hdlr_htmlminifier( $args, $content, $ctx, $repeat );
            if ( ( $minify_js || $minify_css ) && stripos( $content, '<s' ) !== false ) {
                if ( $minify_js ) {
                    if ( preg_match_all( "/<script[^>]*?>.*?<\/script>/si", $content, $matches ) ) {
                        $matches = $matches[0];
                        foreach ( $matches as $matche ) {
                            $minify = $this->hdlr_jsminifier( $args, $matche, $ctx, $repeat );
                            $content = str_replace( $matche, $minify, $content );
                        }
                    }
                }
                if ( $minify_css ) {
                    if ( preg_match_all( "/<style[^>]*?>.*?<\/style>/si", $content, $matches ) ) {
                        $matches = $matches[0];
                        foreach ( $matches as $matche ) {
                            $minify = $this->hdlr_cssminifier( $args, $matche, $ctx, $repeat );
                            $content = str_replace( $matche, $minify, $content );
                        }
                    }
                }
            }
        } else if ( $type == 'JS' ) {
            $content = $this->hdlr_jsminifier( $args, $content, $ctx, $repeat );
        } else if ( $type == 'CSS' ) {
            $content = $this->hdlr_cssminifier( $args, $content, $ctx, $repeat );
        }
        return $content;
    }

    function magic ( $content = '', &$tokens = [] ) {
        $magic = str_shuffle( '0123456789' ) . '-' . str_shuffle( '0123456789' );
        if ( strpos( $content, $magic ) !== false )
            return $this->magic( $content, $tokens );
        if ( isset( $tokens[ $magic ] ) )
            return $this->magic( $content, $tokens );
        $tokens[ $magic ] = true;
        return $magic;
    }
}