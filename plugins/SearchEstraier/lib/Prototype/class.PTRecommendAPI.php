<?php

class PTRecommendAPI extends Prototype {

    public $workspace_id  = 0;
    public $cookie_length = 3096;
    public $cookie_by_scope = false;
    public $cookie_expire = 31536000;

    function __construct ( $options = [] ) {
        $this->id = 'RecommendAPI';
        parent::__construct( $options );
    }

    function run () {
        if ( $this->version > 300002 ) {
            if ( parent::have_method() ) {
                return parent::run();
            }
        }
        $setlocale = setlocale( LC_CTYPE, 'UTF8', 'ja_JP.UTF-8' );
        $app = $this;
        $component = $app->component( 'SearchEstraier' );
        if (! $component ) {
            $app->json_error( 'Invalid request.', 500 );
        }
        $estcmd_path = $component->estcmd_path( $app );
        if (! $estcmd_path ) {
            $app->json_error( 'Invalid request.', 500 );
        }
        $expire = $app->searchestraier_cookie_expires;
        $expire = time() + 86400 * $expire;
        $this->cookie_expire = $expire;
        $interest_expires = $app->searchestraier_interest_expires;
        $interest_expires = $interest_expires * 86400;
        $interest_expires = time() - $interest_expires;
        $path = $app->searchestraier_cookie_path;
        $url = $app->param( 'url' );
        $type = $app->param( 'type' );
        $msg = '';
        $ui = null;
        $workspace_id = $this->workspace_id;
        if ( $url ) {
            if ( strpos( $url, '/' ) === 0 ) {
                $ui = $app->db->model( 'urlinfo' )->get_by_key( ['relative_url' => $url, 'workspace_id' => $workspace_id ] );
            } else {
                if ( !$app->is_valid_url( $url, $msg ) ) {
                    $app->json_error( $msg, 500 );
                }
                $ui = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $url ] );
            }
            if (! $ui->id ) {
                $app->json_error( 'Page not found.', 404 );
            }
            $url = $ui->url;
            $workspace_id = $ui->workspace_id ? $ui->workspace_id : $workspace_id;
        }
        if (! $workspace_id && $app->param( 'workspace_id' ) ) {
            $workspace_id = $app->param( 'workspace_id' );
        }
        if (! $type && ! $url ) {
            $type = 'interest';
        } else if (! $type && $url ) {
            $type = 'similar';
        }
        if ( $type != 'interest' && $type != 'similar' && $type != 'both' ) {
            $app->json_error( $app->translate( 'Invalid type (%s).', $app->escape( $type ) ), 500 );
        }
        $workspace_id = (int) $workspace_id;
        $this->workspace_id = $workspace_id;
        $estcmd_path = escapeshellcmd( $estcmd_path );
        $data_dir = $component->get_config_value( 'searchestraier_data_dir', $workspace_id );
        $data_dir = $app->build( $data_dir );
        if (! $data_dir || !is_dir( $data_dir ) ) {
            $app->json_error( $component->translate( 'Index was not found.' ), 500 );
        }
        $doc_id = 0;
        $url_original = $url;
        $metadata = [];
        $app->init_callbacks( 'searchestraier', 'pre_recommend' );
        $app->init_callbacks( 'searchestraier', 'pre_print_recommend' );
        if ( $app->searchestraier_reccomend_inc && file_exists( $app->searchestraier_reccomend_inc ) ) {
            require_once( $app->searchestraier_reccomend_inc );
        }
        $print_callback = ['name' => 'pre_print_recommend'];
        $data_dir = escapeshellarg( $data_dir );
        if ( $url ) {
            $url = escapeshellarg( $url );
            $command = "{$estcmd_path} get {$data_dir} {$url}";
            if ( strpos( $command, "\r" ) !== false || strpos( $command, "\n" ) !== false ) {
                $app->json_error( 'Invalid request.', 500 );
            }
            $callback = ['name' => 'pre_recommend', 'kind' => 'get'];
            $app->run_callbacks( $callback, 'pre_recommend', $command );
            $res = shell_exec( $command );
            if ( $res === null ) {
                $app->json_error( 'Page not found.', 404 );
            }
            $res = preg_replace( "/\r\n|\r|\n/", "\n", $res );
            $lines = explode( "\n", $res );
            foreach ( $lines as $line ) {
                if ( strpos( $line, '@' ) === 0 ) {
                    $parts = explode( '=', $line );
                    $key = array_shift( $parts );
                    if ( $key == '@id' ) {
                        $doc_id = (int) $parts[0];
                    }
                    if ( $key == '@extracted' || $key == '@tags' || $key == '@metadata' || $key == '@keywords' ) {
                        $value = implode( '=', $parts );
                        if ( $value ) {
                            $values = preg_split( '/\s*,\s*/', $value );
                            $metadata = array_merge( $metadata, $values );
                        }
                    }
                }
                if (! $line ) break;
            }
        }
        if ( $type == 'similar' && !$doc_id ) {
            $app->json_error( 'Page not found.', 404 );
        }
        $limit = $app->param( 'limit' ) ? $app->param( 'limit' ) : 10;
        $limit = (int) $limit;
        $max = $limit;
        // if ( $max ) $max++;
        $condition = " -attr '@id NUMNE {$doc_id}' ";
        $workspace_ids = $app->param( 'workspace_ids' );
        $workspace_id = $app->param( 'workspace_id' );
        if ( $workspace_ids !== '' ) {
            $workspace_ids = preg_split( '/\s*,\s*/', $workspace_ids );
            $target_ids = [];
            foreach ( $workspace_ids as $id ) {
                $target_ids[] = (int) $id;
            }
            $target_ids = array_unique( $target_ids );
            if ( is_array( $target_ids ) && count( $target_ids ) ) {
                $workspace_ids = implode( ' ', $workspace_ids );
                $condition = " -attr " . escapeshellarg( "@workspace_id STROR {$workspace_ids}" );
            }
        } else if ( $workspace_id !== '' ) {
            $workspace_id = (int) $workspace_id;
            $condition = " -attr " . escapeshellarg( "@workspace_id STROR {$workspace_id}" );
        }
        $model = $app->param( 'model' );
        if ( $model && $app->get_table( $model ) ) {
            $condition .= " -attr " . escapeshellarg( "@model STREQ {$model}" );
        }
        $exclude_models = $app->param( 'exclude_models' );
        if ( $exclude_models ) {
            $exclude_models = preg_split( "/\s*,\s*/", $exclude_models );
            foreach ( $exclude_models as $model ) {
                if ( $model && $app->get_table( $model ) ) {
                    $condition .= " -attr " . escapeshellarg( "@model STRNE {$model}" );
                }
            }
        }
        $suffixes = ['html', 'pdf', 'xlsx', 'xls', 'docx', 'doc', 'pptx', 'ppt'];
        $suffix = $app->param( 'suffix' );
        if ( $suffix && in_array( $suffix, $suffixes ) ) {
            $condition .= " -attr " . escapeshellarg( "@suffix STREQ {$suffix}" );
        }
        $exclude_suffixes = $app->param( 'exclude_suffixes' );
        if ( $exclude_suffixes ) {
            $exclude_suffixes = preg_split( "/\s*,\s*/", $exclude_suffixes );
            foreach ( $exclude_suffixes as $suffix ) {
                if ( $suffix && in_array( $suffix, $suffixes ) ) {
                    $condition .= " -attr " . escapeshellarg( "@suffix STRNE {$suffix}" );
                }
            }
        }
        $add_attr = $app->param( 'add_attr' ) ? $app->param( 'add_attr' ) : $app->param( 'add_attrs' );
        if (!$add_attr && ( $app->param( 'ad_attr' ) || $app->param( 'ad_attrs' ) ) ) {
            // Backward compatibility
            $add_attr = $app->param( 'ad_attr' ) ? $app->param( 'ad_attr' ) : $app->param( 'ad_attrs' );
        }
        $add_condition = $app->param( 'add_condition' ) ? $app->param( 'add_condition' ) : $app->param( 'add_conditions' );
        $values = $app->param( 'value' ) ? $app->param( 'value' ) : $app->param( 'values' );
        if ( $add_attr ) {
            if (! is_array( $add_attr ) ) {
                $add_attr = [ $add_attr ];
            }
            if (! is_array( $add_condition ) ) {
                $add_condition = [ $add_condition ];
            }
            if (! is_array( $values ) ) {
                $values = [ $values ];
            }
        }
        if ( is_array( $add_attr ) && !empty( $add_attr ) ) {
            $add_condition = array_pad( $add_condition, count( $add_attr ), '' );
            $values = array_pad( $values, count( $add_attr ), '' );
            $i = 0;
            $conditions_allow = ['STREQ', 'STRNE', 'STRINC', 'STRBW', 'STREW', 'STRAND',
                                 'STROR', 'STROREQ', 'STRRX', 'NUMEQ', 'NUMNE', 'NUMGT',
                                 'NUMGE', 'NUMLT', 'NUMLE', 'NUMBT'];
            if ( isset( $add_attr ) && is_array( $add_attr ) ) {
                foreach( $add_attr as $attr ) {
                    $cond = strtoupper( $add_condition[ $i ] );
                    $value = $values[ $i ];
                    $i++;
                    if (! in_array( $cond, $conditions_allow ) ) continue;
                    if ( strpos( $cond, 'NUM' ) === 0 ) {
                        $value = (int) $value;
                    }
                    $add_cond = " -attr " . $this->mb_escapeshellarg( "{$attr} {$cond} {$value}", $setlocale );
                    $condition .= $add_cond;
                }
            }
        }
        $snippet = '';
        if ( $app->param( 'snippet_width' ) ) {
            $snippet_width = (int) $app->param( 'snippet_width' );
            if ( $snippet_width ) {
                $snippet_width = abs( $snippet_width );
                $snippet = " -sn {$snippet_width} 100 100 ";
            }
        }
        $mecab = '';
        $mecab_path = $component->mecab_path( $app );
        if ( $mecab_path ) {
            $mecab = ' -um ';
        }
        $command_similar = $doc_id ? "{$estcmd_path} search -vx {$snippet}{$mecab}-max {$max} -sim {$doc_id} {$condition} {$data_dir}" : '';
        $command_similar = str_replace( "\0", '', $command_similar );
        if ( strpos( $command_similar, "\r" ) !== false || strpos( $command_similar, "\n" ) !== false ) {
            $app->json_error( 'Invalid request.', 500 );
        }
        if ( $type == 'similar' ) {
            $callback = ['name' => 'pre_recommend', 'kind' => 'similar'];
            $app->run_callbacks( $callback, 'pre_recommend', $command_similar );
            $res = shell_exec( $command_similar );
            $results = $this->xml_to_array( $res, $url_original, $limit );
            $results = [ $type => $results ];
            $app->run_callbacks( $print_callback, 'pre_print_recommend', $results );
            $app->print( json_encode( $results, JSON_UNESCAPED_UNICODE ), 'application/json; charset=utf-8', null, false );
        }
        $command = "{$estcmd_path} search -vx {$snippet}{$mecab}-max {$max} {$condition} {$data_dir} [SIMILAR]";
        $command = str_replace( "\0", '', $command );
        $weight = $app->searchestraier_similar_weight;
        $interests = [];
        $interests_original = [];
        $interests_ts = [];
        $interests_ts_original = [];
        $by_scope = $component->get_config_value( 'searchestraier_cookie_by_scope', $workspace_id );
        $cookie_name = $app->searchestraier_interests_cookie;
        if ( $by_scope ) {
            $cookie_name .= '-' . $workspace_id;
        }
        $this->cookie_by_scope = $by_scope;
        $ts_cookie_name = "{$cookie_name}-ts";
        $cookie_val = $app->cookie_val( $cookie_name, $path );
        if ( $cookie_val ) {
            if ( strpos( $cookie_val, '{"' ) !== 0 ) {
                $cookie_val = gzuncompress( $cookie_val );
            }
            $interests = json_decode( $cookie_val, true );
            /*
            foreach ( $interests as $interest => $count ) {
                $interests[ trim( $interest, "'" ) ] = $count;
                unset( $interests[ $interest ] );
            }
            */
            $interests_original = $interests;
        }
        $cookie_val = $app->cookie_val( $ts_cookie_name, $path );
        if ( $cookie_val ) {
            if ( strpos( $cookie_val, '{"' ) !== 0 ) {
                $cookie_val = gzuncompress( $cookie_val );
            }
            $interests_ts = json_decode( $cookie_val, true );
            /*
            foreach ( $interests_ts as $interest => $ts ) {
                $interests_ts[ trim( $interest, "'" ) ] = $ts;
                unset( $interests_ts[ $interest ] );
            }
            */
            $interests_ts_original = $interests;
        }
        if ( count( $metadata ) ) {
            // array_walk( $metadata, function( &$interest ){ $interest = escapeshellarg( $interest ); } );
            foreach ( $metadata as $meta ) {
                $count = isset( $interests[ $meta ] ) ? $interests[ $meta ] + 1 : 1;
                $interests[ $meta ] = $count;
                $interests_ts[ $meta ] = time();
            }
        }
        foreach ( $interests as $interest => $count ) {
            $count = $weight + $count;
            $command .= ' WITH ' . $count;
            $interest = escapeshellarg( $interest );
            $command .= " {$interest}";
        }
        if ( strpos( $command, "\r" ) !== false || strpos( $command, "\n" ) !== false ) {
            $app->json_error( 'Invalid request.', 500 );
        }
        $callback = ['name' => 'pre_recommend', 'kind' => 'interest'];
        $app->run_callbacks( $callback, 'pre_recommend', $command );
        $res = shell_exec( $command );
        $results = $this->xml_to_array( $res, $url_original, $limit );
        if ( $url_original ) {
            if ( $this->searchestraier_save_cookie ) {
                $cookie_length = null;
            } else {
                $cookie_length = $this->cookie_length; // 4096
                if (! empty( $_COOKIE ) ) {
                    $cLen = strlen( implode( '', array_keys( $_COOKIE ) ) )
                          + strlen( implode( '', array_values( $_COOKIE ) ) );
                    $cookie_length -= $cLen;
                }
            }
            if ( count( $interests_ts ) > $app->searchestraier_max_interest ) {
                $_interests_ts = $interests_ts;
                foreach ( $interests_ts as $word => $interest_ts ) {
                    if ( $interest_ts < $interest_expires ) {
                        unset( $_interests_ts[ $word ] );
                        unset( $interests[ $word ] );
                    }
                }
                $__interests_ts = json_encode( $_interests_ts, JSON_UNESCAPED_UNICODE );
                $i = 0;
                if ( $cookie_length ) {
                    while ( strlen( $__interests_ts ) > $cookie_length ) {
                        array_pop( $_interests_ts );
                        $__interests_ts = json_encode( $_interests_ts, JSON_UNESCAPED_UNICODE );
                        $i++;
                        if ( $i > 100 ) {
                            $__interests_ts = json_encode( $interests_ts_original, JSON_UNESCAPED_UNICODE );
                            break;
                        }
                    }
                }
                $app->bake_cookie( $ts_cookie_name, gzcompress( $__interests_ts ), $expire, $path );
            }
            $_interests = json_encode( $interests, JSON_UNESCAPED_UNICODE );
            $i = 0;
            if ( $cookie_length ) {
                while ( strlen( $_interests ) > $cookie_length ) {
                    array_pop( $interests );
                    $_interests = json_encode( $interests, JSON_UNESCAPED_UNICODE );
                    $i++;
                    if ( $i > 100 ) {
                        $_interests = json_encode( $interests_original, JSON_UNESCAPED_UNICODE );
                        break;
                    }
                }
            }
            $app->bake_cookie( $cookie_name, gzcompress( $_interests ), $expire, $path );
        }
        if ( $type == 'both' ) {
            if (! $command_similar ) {
                $similar = [];
            } else {
                $callback = ['name' => 'pre_recommend', 'kind' => 'similar'];
                $app->run_callbacks( $callback, 'pre_recommend', $command_similar );
                $res = shell_exec( $command_similar );
                $similar = $this->xml_to_array( $res, $url_original, $limit );
            }
            $results = ['interest' => $results, 'similar' => $similar ];
        } else {
            $results = [ $type => $results ];
        }
        $app->run_callbacks( $print_callback, 'pre_print_recommend', $results );
        $app->print( json_encode( $results, JSON_UNESCAPED_UNICODE ), 'application/json; charset=utf-8', null, false );
    }

    function print ( $data, $mime_type = 'application/json; charset=utf-8', $ts = null,
                     $do_conditional = false, $exit = true ) {
        if ( $data === null ) $data = '';
        if ( $this->searchestraier_cache_path ) {
            $this->fmgr->put( $this->searchestraier_cache_path, $data );
        }
        $headers_sent = headers_sent();
        if ( $headers_sent ) {
            echo $data;
            flush();
            unset( $data );
            if ( $exit ) exit();
            return;
        }
        if (! $exit ) {
            ignore_user_abort( true );
            while( ob_get_level() ) { ob_end_clean(); }
        }
        if ( $this->do_conditional && !$this->debug && $this->request_method == 'GET' ) {
            $if_modified  = isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] )
                ? strtotime( stripslashes( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) ) : false;
            $if_nonematch = isset( $_SERVER['HTTP_IF_NONE_MATCH'] )
                ? stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) : false;
            $conditional = false;
            $etag = '"' . md5( $data ) . '"';
            if ( $if_nonematch && ( $if_nonematch == $etag ) ) {
                $conditional = 1;
            } else if (!$this->query_string() && $if_modified && $ts && ( $if_modified >= $ts ) ) {
                $conditional = 1;
            }
            if ( $conditional ) {
                header( $this->protocol . ' 304 Not Modified' );
                header( 'Connection: close' );
                flush();
                unset( $data );
                if ( $exit ) exit();
                return;
            }
        }
        if ( $this->output_compression ) {
            ini_set( 'zlib.output_compression', 'On' );
        }
        if ( $do_conditional ) return;
        if ( $ts !== false ) {
            header( $this->protocol . ' 200 OK' );
        }
        header( "Content-Type: {$mime_type}" );
        $file_size = strlen( bin2hex( $data ) ) / 2;
        header( "Content-Length: {$file_size}" );
        if ( $this->request_method == 'GET' ) {
            if (! $ts ) $ts = $this->request_time;
            $last_modified = gmdate( "D, d M Y H:i:s", $ts ) . ' GMT';
            if (! isset( $etag ) ) $etag = '"' . md5( $data ) . '"';
            header( "Last-Modified: $last_modified" );
            header( "ETag: $etag" );
        }
        header( 'Connection: close' );
        echo $data;
        unset( $data );
        if ( $exit ) exit();
        flush();
    }

    function bake_cookie ( $name, $value, $expires = null, $path = null, $httpOnly = true, $domain = '' ) {
        if ( $expires === null ) $expires = $this->cookie_expire;
        $useSession = false;
        if ( $name == $this->cookie_name ) {
            return parent::cookie_val( $name );
        }
        $sess_name = null;
        $cName = $this->searchestraier_cookie_name;
        $useSession = $this->searchestraier_save_cookie;
        $terms = [];
        if (! $path ) $path = $this->path;
        if ( $useSession ) {
            $sess_name = isset( $_COOKIE[ $cName ] ) ? $_COOKIE[ $cName ] : $this->magic();
            $terms = ['name' => $sess_name, 'kind' => 'VC', 'key' => 'visitor', 'value' => $name ];
            if ( $this->cookie_by_scope ) {
                $terms['workspace_id'] = (int) $this->workspace_id;
            }
            $session = $this->db->model( 'session' )->get_by_key( $terms );
            if (! $session->id ) {
                $_terms = ['name' => $sess_name, 'kind' => 'US', 'key' => 'visitor', 'value' => $cName ];
                if ( $this->cookie_by_scope ) {
                    $_terms['workspace_id'] = (int) $this->workspace_id;
                }
                $visitor_sess = $this->db->model( 'session' )->get_by_key( $_terms );
                if (! $visitor_sess->id ) {
                    $visitor_sess->start( $this->request_time );
                    $visitor_sess->expires( $this->cookie_expire );
                    $visitor_sess->save();
                }
                setcookie( $cName, $sess_name, $this->cookie_expire, $path, '', $this->is_secure, $httpOnly );
            }
            $session->data( $value );
            if ( isset( $_COOKIE[ $name ] ) ) {
                $this->clear_cookie( $name, $path );
            }
            $session->start( $this->request_time );
            $session->expires( $this->cookie_expire );
            return $session->save();
        }
        return parent::bake_cookie( $name, $value, $expires, $path, $httpOnly );
    }

    function clear_cookie ( $name, $path = null, $httpOnly = true ) {
        $expires = time() - 86400;
        if (! $path ) $path = $this->path;
        setcookie( $name, false, $expires, $path, '', $this->is_secure, $httpOnly );
        if ( $path != '/' ) {
            while ( $path !== '/' ) {
                $path = dirname( $path ) . '/';
                $path = str_replace( '//', '/', $path );
                setcookie( $name, false, $expires, $path, '', $this->is_secure, $httpOnly );
            }
        }
        return true;
    }

    function cookie_val ( $name, $path = null, $httpOnly = true ) {
        $useSession = false;
        if ( $name == $this->cookie_name ) {
            return parent::cookie_val( $name );
        }
        if (! $path ) $path = $this->path;
        $sess_name = null;
        $cName = $this->searchestraier_cookie_name;
        $useSession = $this->searchestraier_save_cookie;
        $terms = [];
        if ( $useSession ) {
            $sess_name = isset( $_COOKIE[ $cName ] ) ? $_COOKIE[ $cName ] : $this->magic();
            $terms = ['name' => $sess_name, 'kind' => 'US', 'key' => 'visitor', 'value' => $cName ];
            if ( $this->cookie_by_scope ) {
                $terms['workspace_id'] = (int) $this->workspace_id;
            }
            $session = $this->db->model( 'session' )->get_by_key( $terms );
            $value = '';
            if ( isset( $_COOKIE[ $name ] ) ) {
                $value = $_COOKIE[ $name ];
                $this->clear_cookie( $name, $path );
            }
            if ( $session->id ) {
                $terms['kind'] = 'VC';
                $terms['value'] = $name;
                $session = $this->db->model( 'session' )->get_by_key( $terms );
                if ( $session->expires > $this->request_time ) {
                    return $session->data;
                } else {
                    $session->remove();
                    return '';
                }
            } else {
                setcookie( $cName, $sess_name, $this->cookie_expire, $path, '', $this->is_secure, $httpOnly );
            }
            if ( $value ) {
                $session->start( $this->request_time );
                $session->expires( $this->cookie_expire );
                $session->save();
                $session = clone $session;
                $session->id( null );
                $session->kind( 'VC' ); // Visitor's Cookie
                $session->data( $value );
                $session->value( $name );
                $session->save();
                $this->clear_cookie( $cName, $path );
                return $value;
            }
            return '';
        }
        if ( isset( $_COOKIE[ $name ] ) ) {
            return $_COOKIE[ $name ];
        }
        return '';
    }

    function mb_escapeshellarg ( $arg, $setlocale = true ) {
        if ( $setlocale ) return escapeshellarg( $arg );
        if ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' ) {
            return '"' . str_replace( ['"', '%'], ['', ''], $arg ) . '"';
        } else {
            return "'" . str_replace("'", "'\\''", $arg ) . "'";
        }
    }

    function xml_to_array ( $res, $url, $limit ) {
        preg_match_all( "/<snippet>(.*?)<\/snippet>/s", $res, $snippets );
        $snippets = $snippets[1];
        $result = new SimpleXMLElement( $res );
        $records = $result->document;
        $results = [];
        $i = 0;
        $fields = $this->param( 'fields' );
        if ( $fields ) {
            $fields = preg_split( '/\s*,\s*/', $fields );
        } else {
            $fields = [];
        }
        foreach ( $records as $record ) {
            $result = [];
            $id = ( string )$record->attributes()->id;
            $attrs = $record->attribute;
            $doc_url = ( string )$record->attributes()->uri;
            $snippet = $snippets[ $i ];
            $snippet = str_replace( '<key', '<strong', $snippet );
            $snippet = str_replace( '</key>', '</strong>', $snippet );
            $snippet = str_replace( '<delimiter/>', '... ', $snippet );
            $snippet = preg_replace( '/ normal=".*?"/', '', $snippet );
            $i++;
            if ( $url && $url == $doc_url ) {
                continue;
            }
            if (! empty( $fields ) && !in_array( 'snippet', $fields ) ) {
            } else {
                $result['snippet'] = $snippet;
            }
            if ( $this->searchestraier_api_relative_url || $this->param( 'relative' ) ) {
                $doc_url = preg_replace( "/^https{0,1}:\/\/.*?\//", '/', $doc_url );
            }
            $result['uri'] = $doc_url;
            foreach( $attrs as $attr ) {
                $name = $attr->attributes()->name;
                $name = ( string ) $name;
                if ( strpos( $name, '_' ) === 0 ) continue;
                if ( strpos( $name, '@' ) === 0 ) {
                    $name = ltrim( $name, '@' );
                }
                if ( $name != 'title' && !empty( $fields ) && !in_array( $name, $fields ) ) {
                    continue;
                }
                $val = $attr->attributes()->value[ 0 ];
                $val = ( string ) $val;
                $result[ $name ] = $val;
            }
            $results[] = $result;
            if ( count( $results ) >= $limit ) {
                break;
            }
        }
        $mt = $this->param( 'mt' );
        if (! $mt ) {
            return $results;
        }
        $plugin = $this->component( 'MachineTranslator' );
        if (! $plugin ) {
            return $results;
        }
        $plugin->workspace_id = $this->workspace_id;
        $fields = preg_split( '/\s*,\s*/', $mt );
        $cookie_name = $this->machinetranslator_cookie_name ? $this->machinetranslator_cookie_name : 'pt-mt-language';
        $to = isset( $_COOKIE[ $cookie_name ] ) ? $_COOKIE[ $cookie_name ] : '';
        if ( $this->param( 'lang' ) ) {
            $to = $this->param( 'lang' );
        }
        if (! $to ) {
            return $results;
        }
        $workspace_id = $this->workspace_id;
        if ( $workspace_id ) {
            $use_system = $plugin->get_config_value( 'machinetranslator_use_system_settings', $workspace_id );
            if ( $use_system ) {
                $workspace_id = '0';
            }
        }
        $translate = $plugin->get_config_value( 'machinetranslator_translate_page', $workspace_id );
        if (! $translate ) {
            return $results;
        }
        $plugin->caching = $this->machinetranslator_caching;
        $subscription_key = $plugin->get_config_value( 'machinetranslator_subscription_key' );
        $end_point = $plugin->get_config_value( 'machinetranslator_end_point' );
        $api_version = $plugin->get_config_value( 'machinetranslator_api_version' );
        if (!$subscription_key || !$end_point || !$api_version ) {
            $translate = false;
        } else if ( strpos( $to, 'ja' ) === 0 ) {
            $translate = false;
        }
        if (! $translate ) {
            return $results;
        }
        $end_point .= "?api-version={$api_version}";
        $from = $plugin->get_config_value( 'machinetranslator_translate_from', $workspace_id );
        $plugin->translate_to = $to;
        $plugin->translate_from = $from;
        $params = $from ? "&to={$to}&from={$from}" : "&to={$to}";
        $end_point .= $params;
        $end_point .= '&textType=html';
        $plugin->subscription_key = $subscription_key;
        $plugin->end_point = $end_point;
        if ( $from && in_array( $from, $this->machinetranslator_mb_languages ) ) {
            $mb_languages = true;
            $plugin->mb_languages = true;
        }
        if ( in_array( $to, $this->machinetranslator_mb_languages ) ) {
            $mb_languages_to = true;
            $plugin->mb_languages_to = true;
        }
        $texts = [];
        $tokens = [];
        $mapping = [];
        $original = $results;
        $dictionaries = $this->db->model( 'mt_dic' )->load(
            ['lang' => ['IN' => [ $to, 'all'] ], 'status' => 2, 'workspace_id' => $workspace_id ] );
        $phrases = [];
        $exceptions = [];
        foreach ( $dictionaries as $dictionary ) {
            if ( $dictionary->exception ) {
                $exceptions[ $dictionary->phrase ] = true;
            }
            $phrases[ $dictionary->phrase ] = $dictionary->trans;
        }
        if (!empty( $phrases ) ) {
            $keys = array_map('strlen', array_keys( $phrases ) );
            array_multisort( $keys, SORT_DESC, $phrases );
        }
        if (!empty( $exceptions ) ) {
            $keys = array_map('strlen', array_keys( $exceptions ) );
            array_multisort( $keys, SORT_DESC, $exceptions );
        }
        foreach ( $results as $idx => $result ) {
            foreach ( $fields as $field ) {
                if ( isset( $result[ $field ] ) ) {
                    $magic = $plugin->magic( $result[ $field ], $tokens );
                    $text = $result[ $field ];
                    foreach ( $phrases as $phrase => $trans ) {
                        if ( strpos( $text, $phrase ) !== false ) {
                            if ( isset( $exceptions[ $phrase ] ) ) {
                                $trans = "<i class=\"notranslate\">$phrase</i>";
                                $text = str_replace( $phrase, $trans, $text );
                            } else {
                                $trans = "<i class=\"notranslate\">$trans</i>";
                                $text = str_replace( $phrase, $trans, $text );
                            }
                        }
                    }
                    $mapping[ $magic ] = $text;
                    $texts[] = $text;
                    $result[ $field ] = $magic;
                }
            }
            $results[ $idx ] = $result;
        }
        if ( empty( $texts ) ) {
            return $results;
        }
        $quoted = preg_quote( '<i class="notranslate">', '/' );
        $texts = $plugin->get_translate_array( $texts );
        if ( $texts === false ) {
            $results = $original;
        } else {
            foreach ( $results as $idx => $result ) {
                foreach ( $fields as $field ) {
                    if ( isset( $result[ $field ] ) ) {
                        $str = $mapping[ $result[ $field ] ];
                        $res = $texts[ $str ];
                        if ( strpos( $res, '<i class="notranslate">' ) !== false ) {
                            if ( $this->mb_languages_to ) {
                                $res = preg_replace( "!{$quoted}(.*?)</i>!s", '$1', $res );
                            } else {
                                $res = preg_replace( "!{$quoted}(.*?)</i>!s", ' $1 ', $res );
                            }
                        }
                        if ( $this->machinetranslator_keep_original ) {
                            $result[ "_{$field}" ] = $res;
                            $result[ $field ] = $str;
                        } else {
                            $result[ $field ] = $res;
                        }
                    }
                }
                $results[ $idx ] = $result;
            }
        }
        return $results;
    }
}