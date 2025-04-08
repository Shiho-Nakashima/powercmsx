<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

use ScssPhp\ScssPhp\Compiler;
use NodejsPhpFallback\Stylus;

class CSSPreprocessor extends PTPlugin {

    private $minifier = null;
    private $extensions = ['sass', 'scss', 'styl', 'less'];
    private $linked_file = null;

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $sass_path = $app->csspreprocessor_sass_path
                   ? $app->csspreprocessor_sass_path
                   : '/usr/local/bin/sass';
        $sass_cmd  = $app->csspreprocessor_sass_cmd
                   ? $app->csspreprocessor_sass_cmd
                   : 'Dart';
        $use_sass  = true;
        if ( PTUtil::property_exists( $app, 'csspreprocessor_use_sass' ) ) {
            $use_sass = $app->csspreprocessor_use_sass;
        }
        if (! $use_sass ) {
            return;
        }
        $sass_cmd  = strtolower( $sass_cmd );
        $sass_path = escapeshellcmd( $sass_path );
        $test = "{$sass_path} -v";
        exec( $test, $output, $return_var );
        if ( $return_var !== 0 ) {
            $test = "{$sass_path} --version";
            $output = [];
            exec( $test, $output, $return_var );
        }
        if ( $return_var === 0 ) {
            $output = $output[0];
            if ( stripos( $output, 'ruby' ) !== false && $sass_cmd !== 'ruby' ) {
                $errors[] = $this->translate(
                "Specify 'Ruby' in the environment variable 'csspreprocessor_sass_cmd'." );
                return false;
            }
        } else {
            $errors[] = $this->translate( "Sass is not installed in '%s'." , $sass_path );
            return false;
        }
        return true;
    }

    function hdlr_csspreprocessor ( $args, $content, $ctx, &$repeat, $counter ) {
        if ( isset( $content ) ) {
            $app = $ctx->app;
            $preprocessor = $args['type'] ?? '';
            $preprocessor = strtolower( $preprocessor );
            $compress = isset( $args['compress'] );
            if (! $compress ) {
                $compress = isset( $args['minify'] );
            }
            if ( $app->id == 'Prototype' && $app->mode == 'save' &&
                $app->param( '_preview' ) && $app->param( '_model' ) == 'template' ) {
                $compress = $app->csspreprocessor_minify_preview;
            }
            $convert = false;
            /*
            if ( $preprocessor === 'scss' && !$cmd ) {
                require_once( $app->composer_autoload );
                $compiler = new Compiler();
                try {
                    $css = $compiler->compileString( $content )->getCss();
                    $content = $css;
                    $convert = true;
                } catch ( Exception $e ) {
                    $errstr = $e->getMessage();
                    trigger_error( $errstr );
                }
            }
            */
            $autoload = $app->composer_autoload;
            if ( ( $preprocessor === 'sass' || $preprocessor === 'scss' )
                && $app->csspreprocessor_use_sass ) {
                $cmd = $app->csspreprocessor_sass_path;
                if ( $cmd ) {
                    $cmd = escapeshellcmd( $cmd );
                    if ( $this->linked_file ) {
                        $tmp = dirname( $this->linked_file ) . DS;
                    } else {
                        $tmp = $app->upload_dir() . DS;
                    }
                    $sass = $tmp . 'tmp.' . $preprocessor;
                    $css = $tmp . 'tmp.css';
                    $sass = PTUtil::unique_filename( $sass );
                    $css = PTUtil::unique_filename( $css );
                    $app->fmgr->put( $sass, $content );
                    $engine = strtolower( $app->csspreprocessor_sass_cmd );
                    if ( $engine === 'dart' ) {
                        // Dart
                        $cmd = "{$cmd} {$sass}:{$css} --no-source-map";
                    } else if ( $engine === 'ruby' ) {
                        // Ruby
                        $cmd = "{$cmd} {$sass}:{$css} --sourcemap=none --no-cache";
                    } else {
                        $cmd = "{$cmd} {$sass}:{$css}";
                    }
                    exec( $cmd, $output, $return_var );
                    if ( $app->fmgr->exists( $css ) ) {
                        $content = $app->fmgr->get( $css );
                        $convert = true;
                    } else {
                        trigger_error( implode( '', $output ) );
                    }
                    if ( $this->linked_file ) {
                        $app->fmgr->unlink( $sass );
                        $app->fmgr->unlink( $css );
                    }
                }
            } else if ( $preprocessor === 'less' && $autoload ) {
                require_once( $autoload );
                $less = new lessc;
                try {
                    $css = $less->compile( $content );
                    $content = $css;
                    $convert = true;
                } catch ( Exception $e ) {
                    $errstr = $e->getMessage();
                    trigger_error( $errstr );
                }
            } else if ( $preprocessor === 'stylus' ) {
                $stylus_path = $app->csspreprocessor_stylus_path;
                if ( $stylus_path ) {
                    $stylus_path = escapeshellcmd( $stylus_path );
                    $lib_dir = __dir__ . DS . 'lib' . DS;
                    $root = 'nodejs-php-fallback' . DS;
                    $nodejs_php = $lib_dir . $root;
                    $class = 'NodejsPhpFallback';
                    require_once( $nodejs_php . 'stylus' . DS .'src' . DS . $class . DS . 'Stylus.php' );
                    require_once( $nodejs_php . $root .'src' . DS . $class . DS . $class . '.php' );
                    require_once( $lib_dir . 'kylekatarnls/stylus/src/Stylus/Stylus.php' );
                    require_once( $lib_dir . 'class.StylusCompiler.php' );
                    if ( $this->linked_file ) {
                        $tmp = dirname( $this->linked_file ) . DS;
                    } else {
                        $tmp = $app->upload_dir() . DS;
                    }
                    $styl = $tmp . 'tmp.styl';
                    $styl = PTUtil::unique_filename( $styl );
                    $app->fmgr->put( $styl, $content );
                    try {
                        $stylus = new StylusCompiler( $styl );
                        $stylus->setStylusPath( $stylus_path );
                        $css = $stylus->getCss();
                        $content = $css;
                        $convert = true;
                    } catch ( Exception $e ) {
                        $errstr = $e->getMessage();
                        trigger_error( $errstr );
                    }
                    if ( $this->linked_file ) {
                        $app->fmgr->unlink( $styl );
                    }
                }
            }
            if ( $compress && $convert ) {
                $minifier = $this->minifier ? $this->minifier : $app->component( 'Minifier' );
                if (! $minifier ) {
                    $minifier_path = $app->pt_dir . DS . 'plugins' . DS . 'Minifier';
                    if ( is_dir( $minifier_path ) ) {
                        $app->configure_from_json( $minifier_path . DS . 'config.json' );
                        if ( file_exists( $minifier_path . DS . 'Minifier.php' ) ) {
                            require_once( $minifier_path . DS . 'Minifier.php' );
                            $minifier = new Minifier();
                        }
                    }
                }
                if ( is_object( $minifier ) ) {
                    $this->minifier = $minifier;
                    $repeat = false;
                    $content = $minifier->hdlr_cssminifier( [], $content, $ctx, $repeat, $counter );
                }
            }
        }
        return $content;
    }

    function post_preview_template ( &$cb, $app, &$content ) {
        $linked_file = $app->param( 'linked_file' );
        if (! $linked_file ) {
            return true;
        }
        $cb['template'] = $app->db->model( 'template' )->new(
            ['linked_file' => $linked_file, 'workspace_id' => $app->param( 'workspace_id' ) ] );
        $tmpl = '';
        $this->post_rebuild_template( $cb, $app, $tmpl, $content );
        return true;
    }

    function post_rebuild_template ( $cb, $app, $tmpl, &$content ) {
        $this->linked_file = null;
        $template = $cb['template'];
        $linked_file = $template->linked_file;
        if (! $linked_file ) {
            return true;
        }
        $this->linked_file = $template->_linked_file( $app );
        $extension = null;
        $preprocessor = false;
        if ( $linked_file ) {
            $extension = PTUtil::get_extension( $linked_file );
            $urlmapping = isset( $cb['urlmapping'] ) && is_object( $cb['urlmapping'] ) ? $cb['urlmapping'] : null;
            if (! $urlmapping ) {
                return true;
            }
            $map_extension = PTUtil::get_extension( $urlmapping->mapping );
            $preprocessor = in_array( $extension, $this->extensions ) && $map_extension == 'css';
        }
        if ( $preprocessor && $extension ) {
            $compile = $this->get_config_value( 'csspreprocessor_compile', (int) $template->workspace_id );
            if ( $compile ) {
                $args = ['type' => $extension ];
                $minify = $this->get_config_value( 'csspreprocessor_minify', (int) $template->workspace_id );
                if ( $minify ) {
                    $args['compress'] = 1;
                }
                $ctx = $app->ctx;
                $repeat = false;
                $counter = 1;
                $content = $this->hdlr_csspreprocessor( $args, $content, $ctx, $repeat, $counter );
                $cb['mime_type'] = 'text/css';
            }
        }
        return true;
    }
}