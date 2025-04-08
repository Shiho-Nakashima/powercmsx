<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class CookieUtilities extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function hdlr_getcookie ( $args, $ctx ) {
        if ( php_sapi_name() == 'cli' ) return '';
        $name   = isset( $args['name'] ) ? $args['name'] : false;
        if (! $name ) return '';
        return isset( $_COOKIE[ $name ] ) ? $_COOKIE[ $name ] : '';
    }

    function hdlr_getenv ( $args, $ctx ) {
        $name = isset( $args['name'] ) ? $args['name'] : false;
        if (! $name ) return '';
        $kind = isset( $args['kind'] ) ? $args['kind'] : 'SERVER';
        $kind = strtoupper( $kind );
        if ( $kind === 'COOKIE' ) {
            return isset( $_COOKIE ) && isset( $_COOKIE[ $name ] ) ? $_COOKIE[ $name ] : '';
        } else if ( $kind === 'SERVER' ) {
            return isset( $_SERVER ) && isset( $_SERVER[ $name ] ) ? $_SERVER[ $name ] : '';
        } else if ( $kind === 'ENV' ) {
            return isset( $_ENV ) && isset( $_ENV[ $name ] ) ? $_ENV[ $name ] : '';
        } else if ( $kind === 'REQUEST' ) {
            return isset( $_REQUEST ) && isset( $_REQUEST[ $name ] ) ? $_REQUEST[ $name ] : '';
        } else if ( $kind === 'POST' ) {
            return isset( $_POST ) && isset( $_POST[ $name ] ) ? $_POST[ $name ] : '';
        } else if ( $kind === 'GET' ) {
            return isset( $_GET ) && isset( $_GET[ $name ] ) ? $_GET[ $name ] : '';
        } else if ( $kind === 'SESSION' ) {
            return isset( $_SESSION ) && isset( $_SESSION[ $name ] ) ? $_SESSION[ $name ] : '';
        }
        return '';
    }

    function hdlr_ifcookie ( $args, $content, $ctx, $repeat ) {
        if ( php_sapi_name() == 'cli' ) return '';
        $name = isset( $args['name'] ) ? $args['name'] : null;
        if (! $name ) return false;
        $key = isset( $args['key'] ) ? $args['key'] : null;
        if (! $key ) {
            $key = 'cookie_val';
        }
        $cookie_val = isset( $_COOKIE[ $name ] ) ? $_COOKIE[ $name ] : null;
        $ctx->vars[ $key ] = $cookie_val;
        $args['name'] = $key;
        return $ctx->conditional_if( $args, $content, $ctx, $repeat, true );
    }

    function hdlr_setcookie ( $args, $ctx ) {
        if ( php_sapi_name() == 'cli' ) return '';
        if ( headers_sent() ) return '';
        $app = $ctx->app;
        $reload = isset( $args['reload'] ) ? $args['reload'] : false;
        $name   = isset( $args['name'] ) ? $args['name'] : false;
        if (! $name ) return '';
        $cookie_val = isset( $_COOKIE[ $name ] ) ? $_COOKIE[ $name ] : false;
        $value  = isset( $args['value'] ) ? $args['value'] : '';
        $path   = isset( $args['path'] ) ? $args['path'] : '/';
        $expires = isset( $args['expires'] ) ? $args['expires'] : $app->sess_timeout + $app->request_time;
        $httponly = isset( $args['httponly'] ) && $args['httponly'] ? true : false;
        if ( $app->bake_cookie( $name, $value, $expires, $path, $httponly ) ) {
            if ( $cookie_val === $value ) {
            } else {
                if ( $reload && !$app->param( $reload ) ) {
                    $return_url = $app->request_uri;
                    if ( $app->request_method == 'GET' ) {
                        if ( $app->mode == 'preview'
                            || ( $app->mode == 'save' && $app->param( '_preview' ) ) ) {
                            return '';
                        }
                        if ( $query_string = $app->query_string() ) {
                            $return_url .= '?' . $query_string . "&{$reload}=1";
                        } else {
                            $return_url .=  "?{$reload}=1";
                        }
                        return "<script>location.replace( '{$return_url}' );</script>";
                    }
                }
            }
        }
        return '';
    }

    function hdlr_clearcookie ( $args, $ctx ) {
        $app = $ctx->app;
        $args['expires'] = $app->request_time - 87600;
        $args['value'] = false;
        return $this->hdlr_setcookie( $args, $ctx );
    }

    function hdlr_clearallcookies ( $args, $ctx ) {
        if ( php_sapi_name() == 'cli' ) return '';
        if ( headers_sent() ) return '';
        $app = $ctx->app;
        $cookies = isset( $_SERVER['HTTP_COOKIE'] ) ? explode( ';', $_SERVER['HTTP_COOKIE'] ) : [];
        $do = false;
        $path = isset( $args['path'] ) ? $args['path'] : '/';
        $httponly = isset( $args['httponly'] ) && $args['httponly'] ? true : false;
        $expires = $app->request_time - 87600;
        $archive_path = null;
        if ( $app->request_uri && !isset( $args['path'] ) ) {
            $archive_path = dirname( $app->request_uri ) . '/';
        }
        foreach( $cookies as $cookie ) {
            $parts = explode( '=', $cookie );
            $name = trim( $parts[0] );
            setcookie( $name, '', $expires, $path, '', $app->is_secure, $httponly );
            if ( $archive_path && $archive_path != '/' ) {
                while ( $archive_path !== '/' ) {
                    $archive_path = dirname( $archive_path ) . '/';
                    $archive_path = str_replace( '//', '/', $archive_path );
                    setcookie( $name, false, $expires, $archive_path, '', $app->is_secure, $httponly );
                }
            }
        }
        if ( $do ) {
            $reload = isset( $args['reload'] ) ? $args['reload'] : false;
            if ( $reload && !$app->param( $reload ) ) {
                $return_url = $app->request_uri;
                if ( $app->request_method == 'GET' ) {
                    if ( $app->mode == 'preview'
                        || ( $app->mode == 'save' && $app->param( '_preview' ) ) ) {
                        return '';
                    }
                    if ( $query_string = $app->query_string() ) {
                        $return_url .= '?' . $query_string . "&{$reload}=1";
                    } else {
                        $return_url .=  "?{$reload}=1";
                    }
                    return "<script>location.replace( '{$return_url}' );</script>";
                }
            }
        }
        return '';
    }

}