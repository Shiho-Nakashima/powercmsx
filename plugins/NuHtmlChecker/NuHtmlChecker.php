<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class NuHtmlChecker extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function nuhtmlchecker_htmlcheck ( $app ) {
        $app->validate_magic();
        $html = $app->param( 'html' );
        $app->param( '_preview', 'nu_html_checker' );
        $this->nu_html_checker( [], $app, $html );
    }

    function nu_html_checker ( $cb, $app, &$html ) {
        if ( $app->param('_preview') != 'nu_html_checker' ) {
            return true;
        }
        $agreement = $app->param('__nu_html_checker_agreement');
        if ( $agreement && !$app->cookie_val( 'pt-nu-agreement' ) ) {
            $path = $app->cookie_path ? $app->cookie_path : $app->path;
            $expires = $app->confirm_web_service_expires ? $app->confirm_web_service_expires : 60 * 60 * 24 * 7;
            $app->bake_cookie( 'pt-nu-agreement', 1, $expires, $path, true, $app->cookie_domain );
        }
        $agree = $this->get_config_value( 'nuhtmlchecker_agree' );
        if (! $agree ) return true;
        $caching = $this->get_config_value( 'nuhtmlchecker_caching' );
        $parse = $app->mode == 'save'
               ? $this->get_config_value( 'nuhtmlchecker_parse_result' ) : true;
        $url = $this->get_config_value( 'nuhtmlchecker_url' );
        $app->ctx->vars['url'] = $url;
        if (! $parse ) {
            $app->init();
            unset( $_REQUEST['__mode'], $_REQUEST['_preview'] );
            $app->ctx->vars['html'] = $html;
            $tmpl = $app->ctx->get_template_path( 'validator-w3-org.tmpl' );
            $app->print( $app->build( file_get_contents( $tmpl ) ) );
            exit();
        }
        $cache_key = $caching ? md5( $html ) . '.html' : null;
        $content = null;
        if ( $caching ) {
            $content = $this->get_cache( $cache_key, $app );
        }
        if (! $content ) {
            $boundary = '---------------------------' . $app->magic();
            $data = '';
            $CRLF = "\r\n";
            $data .= "--{$boundary}" . $CRLF;
            $data .= 'Content-Disposition: form-data; name=content' . $CRLF . $CRLF;
            $data .= $html . $CRLF;
            $data .= "--{$boundary}--" . $CRLF;
            $header = [
                "Content-Type: multipart/form-data; boundary=" . $boundary,
                "Content-Length: " . strlen( $data ),
                "User-Agent: Mozilla/5.0"
            ];
            $context = [
                "http" => [
                    "method"  => "POST",
                    "header"  => implode( $CRLF, $header ),
                    "content" => $data,
                    'ignore_errors' => true,
                    'ssl' => ['verify_peer' => false]
                ]
            ];
            $context = PTUtil::stream_context_create( $context );
            $content = file_get_contents( $url, false, $context );
            if ( $caching && $cache_key ) {
                $this->set_cache( $cache_key, $content, $app );
            }
        }
        $result = [];
        $source = '';
        $success = $this->parse_result( $content, $result, $source, $app );
        $app->ctx->vars['success'] = $success;
        if (! $success ) {
            $app->ctx->vars['source'] = $result['source'];
            $app->ctx->vars['errors'] = $result['errors'];
            $app->ctx->vars['html'] = $html;
            if (! $result['errors'] ) {
                $app->ctx->vars['success'] = true;
            }
            $_errors = $result['_errors'];
            $_warnings = $result['_warnings'];
            $error_msg = $_errors == 1 ? 'error' : 'errors';
            $warning_msg = $_warnings == 1 ? 'warning' : 'warnings';
            $error_msg = $this->translate( $error_msg );
            $warning_msg = $this->translate( $warning_msg );
            $error_mssage = '';
            $app->ctx->vars['alert_class'] = 'danger';
            if ( $_errors && $_warnings ) {
                $error_mssage = $this->translate( 'Found %s %s and %s %s.',
                    [ $_warnings, $warning_msg,
                      $_errors, $error_msg
                    ]
                 );
            } else if ( $_warnings ) {
                $app->ctx->vars['alert_class'] = 'warning';
                $error_mssage = $this->translate( 'Found %s %s.', [ $_warnings, $warning_msg ] );
            } else {
                $error_mssage = $this->translate( 'Found %s %s.', [ $_errors, $error_msg ] );
            }
            $app->ctx->vars['error_mssage'] = $error_mssage;
        }
        $app->ctx->vars['url'] = $url;
        $app->ctx->vars['magic_token'] = $app->current_magic;
        unset( $_REQUEST['__mode'], $_REQUEST['_preview'], $_REQUEST['_type'] );
        $tmpl = $app->ctx->get_template_path( 'nu_html_checker_result.tmpl' );
        $app->build_page( $tmpl );
    }

    function parse_result ( $html, &$parse_result = [], &$source = '', $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        libxml_use_internal_errors( true );
        $dom = new DomDocument();
        $success = false;
        $_errors = 0;
        $_warnings = 0;
        $document_written_in = 'This document appears to be written in ';
        // 'A table row was 2 columns wide, which is less than the column count established by the first row (3).'
        $table_first_row = 'columns wide, which is less than the column count established by the first row';
        // 'A table row was 6 columns wide and exceeded the column count established by the first row (5).
        $table_exceeded_row = 'columns wide and exceeded the column count established by the first row';
        // A table row was 2 columns wide and exceeded the column count established using column markup (1).
        $table_using_column = 'columns wide and exceeded the column count established using column markup';
        // 'Table column 3 established by element td has no cells beginning in it.'
        $invalid_table_column = '/Table\scolumn\s([0-9]+)\sestablished\sby\selement\s\<code\>(.*?)\<\/code\>\shas\sno\scells\sbeginning\sin\sit\./';
        // Table columns in range 4…6 established by element td have no cells beginning in them.
        $invalid_table_range = '/Table\scolumns\sin\srange\s(.*?)\sestablished\sby\selement\s(.*?)\shave\sno\scells\sbeginning\sin\sthem\./';
        // Bad value <code></code> for attribute <code>width</code> on element <a target="_blank" href="https://html.spec.whatwg.org/multipage/#the-img-element"><code>img</code></a>: The empty string is not a valid non-negative integer.
        $invalid_attr_value = '!Bad\svalue\s<code>(.*?)</code>\sfor\sattribute\s<code>(.*?)</code>\son\selement\s<a\starget="_blank"\shref="(.*?)"><code>(.*?)</code></a>:\s(.*)!';
        $forbidden_code_point = 'Forbidden code point ';
        $ignore_errors = ['The <code>type</code> attribute for the <code>style</code> element is not needed and should be omitted.',
                          'The <code>type</code> attribute is unnecessary for JavaScript resources.',
                          'The <code>type</code> attribute for the <code>style</code> element is not needed and should be omitted.'];
        if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
            LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
            $xpath = new DomXPath( $dom );
            $source = $xpath->query( "//ol[@class='source']" );
            $parse_result['source'] = '';
            if ( $source->length ) {
                $parse_result['source'] = $this->innerHTML( $source->item( 0 ) );
            }
            $results = $dom->getElementById( 'results' );
            $result = $results->firstChild;
            if ( $result->tagName == 'p' && $result->getAttribute( 'class' ) == 'success' ) {
                $success = true;
                $parse_result['success'] = true;
            } else {
                // is error
                $parse_result['success'] = false;
                $errors = $result->childNodes;
                // $errors = $xpath->query( "//li[@class='error']" );
                $items = [];
                if ( $errors && $errors->length ) {
                    for ( $i = 0; $i < $errors->length; $i++ ) {
                        $data = [];
                        $ele = $errors->item( $i );
                        $type = $ele->getAttribute( 'class' );
                        if ( stripos( $type, 'error' ) !== false ) {
                            $_errors++;
                        } else {
                            $_warnings++;
                        }
                        $data['type'] = $ele->firstChild->firstChild->nodeValue;
                        $childNodes = $ele->childNodes;
                        if ( $childNodes && $childNodes->length ) {
                            for ( $j = 0; $j < $childNodes->length; $j++ ) {
                                $p = $childNodes->item( $j );
                                $class = $p->getAttribute( 'class' );
                                $inner = $this->innerHTML( $p );
                                if ( $j == 0 && ! $class ) {
                                    $class = 'message';
                                    $inner = preg_replace( "/^.*?:\s/", '', $inner );
                                    $inner = trim( preg_replace( "/^<span>(.*)<\/span>$/", '$1', $inner ) );
                                    $inner = str_replace( '<a ', '<a target="_blank" ', $inner );
                                    if ( preg_match( '!(<a\starget="_blank"[^>]*?>)(.*?)(</a>)!', $inner, $matchs ) ) {
                                        if ( count( $matchs ) === 4 ) {
                                            $inner = str_replace( $matchs[0], $matchs[1] . $this->translate( $matchs[2] ) . $matchs[3], $inner );
                                        }
                                    }
                                    $original = $inner;
                                    if ( in_array( $inner, $ignore_errors ) ) {
                                        continue 2;
                                    }
                                    $tags = [];
                                    $cnt = 1;
                                    if ( stripos( $inner, $document_written_in ) !== false ) {
                                        $language = preg_replace( "/^{$document_written_in}(.*?)\s.*$/", '$1', $inner );
                                        $inner = preg_replace( "/{$language}/", '%' . $cnt . '$s' , $inner, 1 );
                                        $tags[] = $this->translate( $language );
                                        $cnt++;
                                    } else if ( stripos( $inner, $table_first_row ) !== false ) {
                                        if ( preg_match( '/A\stable\srow\swas\s([0-9]+)\scolumns\swide,\swhich\sis\sless\sthan\sthe\scolumn\scount\sestablished\sby\sthe\sfirst\srow\s\(([0-9]+)\)/', $inner, $counts ) ) {
                                            $inner = $this->translate( 'A table row was %1$s columns wide, which is less than the column count established by the first row (%2$s)', [ $counts[1], $counts[2] ] );
                                        }
                                    } else if ( stripos( $inner, $table_using_column ) !== false ) {
                                        if ( preg_match( '/A table row was\s([0-9]+)\scolumns wide and exceeded the column count established using column markup\s\(([0-9]+)\)\./', $inner, $counts ) ) {
                                            $inner = $this->translate( 'A table row was %1$s columns wide and exceeded the column count established using column markup (%2$s).', [ $counts[1], $counts[2] ] );
                                        }
                                    } else if ( stripos( $inner, $table_exceeded_row ) !== false ) {
                                        if ( preg_match( '/A table row was\s([0-9]+)\scolumns wide and exceeded the column count established by the first row\s\(([0-9]+)\)\./', $inner, $counts ) ) {
                                            $inner = $this->translate( 'A table row was %1$s columns wide and exceeded the column count established by the first row (%2$s).', [ $counts[1], $counts[2] ] );
                                        }
                                    } else if ( stripos( $inner, ' has no cells beginning in it.' ) !== false ) {
                                        if ( preg_match( $invalid_table_column, $inner, $counts ) ) {
                                            $inner = $this->translate( 'Table column %1$s established by element <code>%2$s</code> has no cells beginning in it.', [ $counts[1], $counts[2] ] );
                                        }
                                    } else if ( preg_match( $invalid_table_range, $inner, $counts ) ) {
                                        $inner = $this->translate( 'Table columns in range %1$s established by element %2$s have no cells beginning in them.', [ $counts[1], $counts[2] ] );
                                    } else if ( stripos( $inner, 'Bad value ' ) === 0 ) {
                                        if ( preg_match( $invalid_attr_value, $inner, $matchs ) ) {
                                            $matchs5 = $matchs[5];
                                            if ( stripos( $matchs5, '<code>' ) !== false ) {
                                                if ( preg_match( '!<code>(.*?)</code>!si', $matchs5, $m ) ) {
                                                    $matchs5 = preg_replace( '!<code>(.*?)</code>!si', '<code>%s</code>', $matchs5 );
                                                    $matchs5 = $this->translate( $matchs5, $m[1] );
                                                }
                                            }
                                            $inner = $this->translate( 'Bad value <code>%1$s</code> for attribute <code>%2$s</code> on element <a target="_blank" href="%3$s"><code>%4$s</code></a>: %5$s',
                                                [ $matchs[1], $matchs[2], $matchs[3], $matchs[4], $this->translate( $matchs5 ) ] );
                                        }
                                    } else if ( stripos( $inner, $forbidden_code_point ) === 0 ) {
                                        $inner = str_replace( $forbidden_code_point, $this->translate( $forbidden_code_point ), $inner );
                                    }
                                    if ( strpos( $inner, '<' ) !== false ) {
                                        $loop = 0;
                                        while ( stripos( $inner, '<a' ) !== false ) {
                                            if ( preg_match( "/<a\s.*?<\/a>/", $inner, $matches ) ) {
                                                $tags[] = $matches[0];
                                                $replace = '%' . $cnt . '$s';
                                                $inner = preg_replace( "/<a\s.*?<\/a>/", $replace, $inner, 1 );
                                                $cnt++;
                                            }
                                            $loop++;
                                            if ( $loop > 10 ) break;
                                        }
                                        $loop = 0;
                                        while ( stripos( $inner, '<code>' ) !== false ) {
                                            if ( preg_match( "/<code>.*?<\/code>/", $inner, $matches ) ) {
                                                $tags[] = $matches[0];
                                                $replace = '%' . $cnt . '$s';
                                                $inner = preg_replace( "/<code>.*?<\/code>/", $replace, $inner, 1 );
                                                $cnt++;
                                            }
                                            if ( $loop > 10 ) break;
                                        }
                                    }
                                    $_inner = $inner;
                                    $inner = $this->translate( $inner, $tags );
                                    if ( $original == $inner && $app->nuhtmlchecker_debug ) {
                                        $inner .= "<input type=\"text\" class=\"form-control\" value=\"{$_inner}\">";
                                    }
                                }
                                $data[ $class ] = $inner;
                            }
                        }
                        $items[] = $data;
                    }
                }
                $parse_result['errors'] = $items;
            }
        }
        $parse_result['_errors'] = $_errors;
        $parse_result['_warnings'] = $_warnings;
        return $success;
    }

    function insert_nu_html_checker ( $cb, $app, $param, &$tmpl ) {
        $agree = $this->get_config_value( 'nuhtmlchecker_agree' );
        if (! $agree ) return true;
        $model = $app->param( '_model' );
        $id = $app->param( 'id' );
        if ( $model == 'template' && $id ) {
            $obj = $app->ctx->stash( 'object' );
            if ( $obj && $obj->class != 'Archive' ) {
                return true;
            }
        }
        $mime_type = $this->edit_mime_type( $app );
        if ( $mime_type != 'text/html' ) {
            return true;
        }
        $button = $app->ctx->get_template_path( 'nu_html_checker_button.tmpl' );
        $button = $app->ctx->build( file_get_contents( $button ) );
        $this->add_template_vars( 'add_edit_action_bar', $button );
        return true;
    }

    function innerHTML ( $element ) { 
        $innerHTML = ""; 
        $children  = $element->childNodes;
        foreach ( $children as $child ) { 
            $innerHTML .= $element->ownerDocument->saveHTML( $child );
        }
        return $innerHTML; 
    }

    function remove_old_cache ( $app ) {
        $counter = 0;
        $cache_dir =  $app->support_dir . DS . 'cache' . DS . 'nuhtmlchecker_cache';
        $files = [];
        PTUtil::file_find( $cache_dir, $files );
        $expires = $app->request_time - $app->nuhtmlchecker_cache_expires;
        foreach ( $files as $file ) {
            $mtime = filemtime( $file );
            if ( $mtime < $expires ) {
                unlink( $file );
                $counter++;
            }
        }
        return $counter;
    }
}