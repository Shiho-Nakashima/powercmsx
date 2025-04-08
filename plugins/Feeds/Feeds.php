<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class Feeds extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function hdlr_feed ( $args, $content, $ctx, &$repeat, $counter ) {
        if (! isset( $content ) ) {
            $this->hdlr_getxml2vars( $args, $content, $ctx, $repeat, $counter );
        }
        return $content;
    }

    function hdlr_feedentries ( $args, $content, $ctx, &$repeat, $counter ) {
        $local_vars = ['current_feed_entry'];
        if (! isset( $content ) ) {
            $ctx->localize( $local_vars );
            $sort_order = isset( $args['sort_order'] ) ? $args['sort_order'] : 'descend';
            if ( $sort_order == 'ascend' ) {
                $ctx->local_params = array_reverse( $ctx->local_params );
            }
            $limit = isset( $args['lastn'] ) ? (int) $args['lastn'] : 0;
            if (! isset( $args['lastn'] ) && isset( $args['limit'] ) ) {
                $limit = (int) $args['limit'];
            } else {
                $limit = isset( $args['lastn'] ) ? (int) $args['lastn'] : 0;
            }
            $offset = isset( $args['offset'] ) ? (int) $args['offset'] : 0;
            if ( $limit || $offset ) {
                $ctx->local_params = array_slice( $ctx->local_params, $offset, $limit );
            }
        }
        $params = $ctx->local_params ? $ctx->local_params : [];
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $vars = $params[ $counter ];
            $ctx->stash( 'current_feed_entry', $vars );
            $repeat = true;
        } else {
            $ctx->restore( $local_vars );
            $repeat = false;
        }
        return $content;
    }

    function hdlr_feedinclude ( $args, $ctx ) {
        $url = isset( $args['uri'] ) ? $args['uri'] : '';
        if (! $url ) {
            $url = isset( $args['url'] ) ? $args['url'] : '';
        }
        $app = $ctx->app;
        if (! $url || !$app->is_valid_url( $url ) ) {
            return;
        }
        $tag_args = $args;
        $cache_ttl = (int) isset( $args['cache_ttl'] ) ? $args['cache_ttl'] : '';
        if ( $cache_ttl ) {
            $cache_ttl = "cache_ttl=\"{$cache_ttl}\"";
        }
        unset( $tag_args['this_tag'], $tag_args['uri'], $tag_args['url'], $tag_args['cache_ttl'] );
        $tag_attrs = '';
        if (! empty( $tag_args ) ) {
            foreach ( $tag_args as $tag_arg => $arg ) {
                $tag_attrs .= " {$tag_arg}=\"{$arg}\" ";
            }
        }
        $body = <<<BODY
<mtfeed uri="{$url}" {$cache_ttl}>
<h2><mtfeedtitle></h2>
<ul><mtfeedentries {$tag_attrs}>
<li><a href="<mtfeedentrylink escape>"><mtfeedentrytitle></a></li>
</mtfeedentries></ul>
</mtfeed>
BODY;
        return $ctx->modifier_eval( $body, 1, $ctx );
    }

    function hdlr_feedtitle ( $args, $ctx ) {
        return isset( $ctx->local_vars['feed_title'] ) ? $ctx->local_vars['feed_title'] : '';
    }

    function hdlr_feedlink ( $args, $ctx ) {
        return isset( $ctx->local_vars['feed_link'] ) ? $ctx->local_vars['feed_link'] : '';
    }

    function hdlr_feedentrytitle ( $args, $ctx ) {
        $entry = $ctx->stash( 'current_feed_entry' );
        return isset( $entry['title'] ) ? $entry['title'] : '';
    }

    function hdlr_feedentrylink ( $args, $ctx ) {
        $entry = $ctx->stash( 'current_feed_entry' );
        return isset( $entry['link'] ) ? $entry['link'] : '';
    }

    function hdlr_getjson2vars ( $args, $content, $ctx, &$repeat, $counter ) {
        if (! isset( $content ) ) {
            $this->hdlr_getxml2vars( $args, $content, $ctx, $repeat, $counter );
        }
        $params = $ctx->local_params ? $ctx->local_params : [];
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $args['key'] ) && $args['key'] ) {
            if ( isset( $params[ $counter ] ) ) {
                $prefix = isset( $args['prefix'] ) ? $args['prefix'] : '';
                $vars = $params[ $counter ];
                foreach ( $vars as $key => $value ) {
                    $ctx->local_vars[ $prefix . $key ] = (string) $value;
                }
                $repeat = true;
            } else {
                $repeat = false;
            }
        }
        return $content;
    }

    function hdlr_getxml2vars ( $args, $content, $ctx, &$repeat, $counter ) {
        // https://www.metro.tokyo.lg.jp/rss/index.rdf // RSS1.0
        // http://www.city.gose.nara.jp/rss/rss.xml // RSS2.0
        // https://www.pref.kochi.lg.jp/news/index.atom // ATOM
        if (! isset( $content ) ) {
            $url = isset( $args['uri'] ) ? $args['uri'] : '';
            if (! $url ) {
                $url = isset( $args['url'] ) ? $args['url'] : '';
            }
            $app = $ctx->app;
            if (! $url || !$app->is_valid_url( $url ) ) {
                return;
            }
            $cache_ttl = (int) isset( $args['cache_ttl'] ) ? $args['cache_ttl'] : '';
            $xml = null;
            if ( $cache_ttl ) {
                $cache = $app->db->model( 'session' )->get_by_key( ['name' => 'feed_cache', 'kind' => 'CH', 'key' => $url ] );
                if ( $cache->id && ( $cache->expires > $app->request_time ) ) {
                    $xml = $cache->text;
                }
            }
            if (! $xml ) {
                $ua = $app->feeds_useragent;
                $ssl_opt = ['verify_peer' => false, 'verify_peer_name' => false ]; // Skip verification of SSL certificate used.
                $http_options = ['http' => ['header'=>"User-Agent: {$ua}", 'ignore_errors' => true, 'timeout' => 10], 'ssl' => $ssl_opt ];
                $http_options = PTUtil::stream_context_create( $http_options );
                $xml = file_get_contents( $url, false, $http_options );
                if ( $xml === false ) {
                    $this->error( $app, $this->translate( 'Failed to get %s.', $url ) );
                    return;
                }
                if ( $cache_ttl && isset( $cache ) ) {
                    $cache->start( $app->request_time );
                    $cache->text( $xml );
                    $user_id = $app->user() ? $app->user()->id : 0;
                    $cache->user_id( $user_id );
                    $cache->expires( $app->request_time + $cache_ttl );
                    $cache->save();
                }
            }
            if (! $xml ) {
                $this->error( $app, $this->translate( 'Failed to get %s.', $url ) );
                return;
            }
            $params = [];
            $results = [];
            if ( $args['this_tag'] == 'getjson2vars' ) {
                $results = json_decode( $xml, true );
                if ( json_last_error() ) {
                    $this->error( $app, $this->translate( 'Failed to parse %s.', $url ) );
                    return;
                }
                $prefix = isset( $args['prefix'] ) ? $args['prefix'] : '';
                if ( isset( $args['key'] ) && $args['key'] ) {
                    $key = $args['key'];
                    $results = isset( $results[ $key ] ) ? $results[ $key ] : $results;
                    foreach ( $results as $key => $result ) {
                        $params[] = $result;
                    }
                } else {
                    foreach ( $results as $key => $result ) {
                        $ctx->local_vars[ $prefix . $key ] = $result;
                    }
                    return;
                }
            } else {
                $errors = libxml_get_errors();
                libxml_use_internal_errors( true );
                $results = new SimpleXMLElement( $xml );
                $result_err = libxml_get_errors();
                if ( count( $errors ) < count( $result_err ) ) {
                    $this->error( $app, $this->translate( 'Failed to parse %s.', $url ) );
                    return;
                }
                $format = '';
                $namespaces = $results->getNamespaces( true );
                if ( $args['this_tag'] == 'feed' ) {
                    if ( is_array( $namespaces ) && ! empty( $namespaces ) && isset( $namespaces[''] )
                        && $namespaces[''] == 'http://purl.org/rss/1.0/' ) {
                        $format = 'RSS1.0';
                        foreach ( $results->item as $result ) {
                            $params[] = get_object_vars( $result );
                        }
                        $ctx->local_vars['feed_title'] = (string) $results->channel->title;
                        $ctx->local_vars['feed_link'] = (string) $results->channel->link;
                    } else if ( isset( $results[0] ) && strtolower( $results[0]->getName() ) == 'rss' &&
                        is_object( $results[0]->attributes() ) && isset( $results[0]->attributes()->version )
                        && $results[0]->attributes()->version == '2.0' ) {
                        $format = 'RSS2.0';
                        foreach ( $results->channel->item as $result ) {
                            $params[] = get_object_vars( $result );
                        }
                        $ctx->local_vars['feed_title'] = (string) $results->channel->title;
                        $ctx->local_vars['feed_link'] = (string) $results->channel->link;
                    } else if ( is_array( $namespaces ) && ! empty( $namespaces ) && isset( $namespaces[''] )
                        && $namespaces[''] == 'http://www.w3.org/2005/Atom' ) {
                        $format = 'ATOM';
                        foreach ( $results->entry as $result ) {
                            $params[] = get_object_vars( $result );
                        }
                        $ctx->local_vars['feed_title'] = (string) $results->title;
                        foreach ( $results->link as $link ) {
                            if ( is_object( $link->attributes() ) && isset( $link->attributes()->rel )
                                && $link->attributes()->rel == 'alternate' ) {
                                $ctx->local_vars['feed_link'] = (string) $link->attributes()->href;
                                break;
                            }
                        }
                    } else {
                        if ( isset( $args['key'] ) && $args['key'] ) {
                            $key = $args['key'];
                            $results = $results->$key;
                        }
                        foreach ( $results as $key => $result ) {
                            $params[] = get_object_vars( $result );
                        }
                    }
                    $ctx->local_vars['feed_result'] = $results;
                    $ctx->local_vars['feed_format'] = $format;
                } else {
                    if ( isset( $args['key'] ) && $args['key'] ) {
                        $key = $args['key'];
                        $results = $results->$key;
                    }
                    foreach ( $results as $key => $result ) {
                        $params[] = get_object_vars( $result );
                    }
                }
            }
            $ctx->local_params = $params;
            if ( $args['this_tag'] != 'feed' && ( isset( $args['key'] ) && $args['key'] ) ) {
                $sort_order = isset( $args['sort_order'] ) ? $args['sort_order'] : 'descend';
                if ( $sort_order == 'ascend' ) {
                    $ctx->local_params = array_reverse( $ctx->local_params );
                }
                $limit = isset( $args['lastn'] ) ? (int) $args['lastn'] : 0;
                if (! isset( $args['lastn'] ) && isset( $args['limit'] ) ) {
                    $limit = (int) $args['limit'];
                } else {
                    $limit = isset( $args['lastn'] ) ? (int) $args['lastn'] : 0;
                }
                $offset = isset( $args['offset'] ) ? (int) $args['offset'] : 0;
                if ( $limit || $offset ) {
                    $ctx->local_params = array_slice( $ctx->local_params, $offset, $limit );
                }
            }
        }
        if ( $args['this_tag'] != 'getxml2vars' ) {
            return;
        }
        $params = $ctx->local_params ? $ctx->local_params : [];
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $prefix = isset( $args['prefix'] ) ? $args['prefix'] : '';
            $vars = $params[ $counter ];
            foreach ( $vars as $key => $value ) {
                if ( is_string( $value ) ) {
                    $value = (string) $value;
                }
                $ctx->local_vars[ $prefix . $key ] = is_object( $value ) ? get_object_vars( $value ) : $value;
            }
            $repeat = true;
        } else {
            $repeat = false;
        }
        return $content;
    }

    function error ( $app, $msg ) {
        if ( $app->id == 'Prototype' ) {
            return $app->error( $msg );
        } else if ( $app->id == 'Worker' ) {
            echo $msg, "\n";
        } else {
            $app->log( ['message'  => $msg,
                        'category' => 'feed',
                        'level'    => 'error'] );
        }
    }

}