<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

require_once( __DIR__ . DS . 'lib' . DS . 'uri-converter' . DS . 'src' . DS . 'URIConverter' . DS . 'URI.php' );
require_once( __DIR__ . DS . 'lib' . DS . 'uri-converter' . DS . 'src' . DS . 'URIConverter' . DS . 'URIConverter.php' );

use URIConverter\URI as URI;
use URIConverter\URIConverter as URIConverter;

class Abs2Rel extends PTPlugin {

    protected static $settings = []; // Keys are Workspace ID

    public function __construct () {
        parent::__construct();
    }

    function post_save_plugin_config ( $cb, $app, $component ) {
        if ( $component->id != 'abs2rel' ) {
            return true;
        }
        if ( $app->abs2rel_caching ) {
            $app->clear_cache( 'abs2rel' . DS );
        }
        return true;
    }

    public function post_preview ( $cb, $app, &$html ) {
        if (! $app->abs2rel_preview ) {
            return true;
        }
        $ctx = $cb['ctx'];
        $urlmapping = $cb['urlmapping'];
        if (! $urlmapping ) {
            return;
        }
        $tmpl = $cb['template'];
        $obj = $ctx->stash( 'current_object' );
        $url = $ctx->vars['current_archive_url'];
        if ( $obj->id ) {
            $ui = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $url, 'workspace_id' => $urlmapping->workspace_id,
                                   'delete_flag' => ['IN' => [0, 1] ], 'urlmapping_id' => $urlmapping->id,
                                   'object_id' => $obj->id, 'model' => $obj->_model ] );
        } else {
            $ui = $app->db->model( 'urlinfo' )->get_by_key( ['url' => $url, 'workspace_id' => $urlmapping->workspace_id,
                                   'urlmapping_id' => $urlmapping->id, 'publish_file' => $urlmapping->publish_file,
                                   'model' => $obj->_model ] );
        }
        if (! $ui->id ) {
            if ( $workspace = $ui->workspace ) {
                $base_url = $workspace->site_url;
                $base_path = $workspace->site_path;
            } else {
                $base_url = $app->site_url;
                $base_path = $app->site_path;
            }
            $base_url = preg_quote( $base_url, '/' );
            $file_path = $base_path . DS . preg_replace( "/^{$base_url}/", '', $url );
            $ui->file_path( $file_path );
            $ui->publish_file( $urlmapping->publish_file );
            PTUtil::set_url_path( $ui );
        }
        $app->ctx->vars['publish_type'] = $urlmapping->publish_file;
        $cb['urlinfo'] = $ui;
        $cb['template'] = $urlmapping->template;
        $this->post_rebuild( $cb, $app, $tmpl, $html );
        return true;
    }

    public function post_rebuild ( $cb, $app, $tmpl, &$html ) {
        $workspace_id = 0;
        if ( isset( $cb['template'] ) && $cb['template']->workspace_id )
            $workspace_id = $cb['template']->workspace_id;
        $setting = $this->getSettings($workspace_id);
        $ctx = $app->ctx;
        $publish_type = $ctx->vars['publish_type'] ?? 1;
        if (!$setting['enabled'] && $publish_type != 6) {
            return true;
        } else if (!$setting['target_dynamic'] && ( $publish_type == 6 || $app->id === 'Bootstrapper' ) ) {
            return true;
        }
        $url_info = $cb['urlinfo'];
        // A file extension check.
        $extension = PTUtil::get_extension( $url_info->url, true );
        if (array_search($extension, $setting['target_extensions'])=== false) {
            return true;
        }
        // A directry check for exclusion.
        foreach ($setting['exclude_directries'] as $directry) {
            if ($directry === '') continue;
            if (preg_match('/\A' . preg_quote($directry, '/') . '/u', $url_info->relative_url)) {
                return true;
            }
        }
        $cache_key = null;
        $cache_dir = null;
        if ( $url_info && $app->abs2rel_caching ) {
            $cache_dir = 'abs2rel' . DS . md5( $url_info->url );
            $cache_key = $cache_dir . DS . md5( $html ) . '.html';
            $cache = $app->get_cache( $cache_key );
            if ( $cache !== null ) {
                $html = $cache;
                return true;
            }
        }
        $replacements = [];
        // Ignore inner tags
        if ( stripos( $html, '<html' ) === false ) {
            $parse_html = "<html><body>{$html}";
        } else {
            $parse_html = $html;
        }
        $parse_html = static::encode_double( $parse_html );
        libxml_use_internal_errors( true );
        $dom = new DomDocument();
        if ( $dom->loadHTML( mb_encode_numericentity( $parse_html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
            $finder = new DomXPath( $dom );
            if ( $setting['abs2rel_exclude_comment'] ) {
                $elements = $finder->query( "//comment()" );
                if ( $elements->length ) {
                    for ( $i = 0; $i < $elements->length; $i++ ) {
                        $element = $elements->item( $i );
                        $inner = html_entity_decode( $element->nodeValue );
                        $quoted = preg_quote( $inner, '/' );
                        $token = static::magic( $parse_html );
                        $token = "<!--{$token}-->";
                        $html = preg_replace( "/<!\-\-{$quoted}\-\->/si", "<!--{$token}-->", $html, 1 );
                        $replacements[preg_quote( $token, '/' )] = $inner;
                    }
                }
            }
            if ( $setting['abs2rel_exclude_js'] ) {
                $elements = $dom->getElementsByTagName('script');
                if ( $elements->length ) {
                    for ( $i = 0; $i < $elements->length; $i++ ) {
                        $element = $elements->item( $i );
                        $inner = html_entity_decode( $this->innerHTML( $element ) );
                        $token = static::magic( $parse_html );
                        $token = "<!--{$token}-->";
                        $quoted = preg_quote( $inner, '/' );
                        $res = preg_match( "/<script[^>]*?>{$quoted}<\/script>/si", $html, $matchs );
                        if (! $res ) {
                            $res = preg_match( "/<script[^>]*?>.*?<\/script>/si", $html, $matchs );
                        }
                        if ( $res ) {
                            if ( strlen( $matchs[0] ) < 2000 ) {
                                $quoted = preg_quote( $matchs[0], '/' );
                                $original = $html;
                                $html = preg_replace( "/{$quoted}/si", $token, $html, 1 );
                                if (! $html ) {
                                    $html = $original;
                                } else {
                                    $replacements[preg_quote( $token, '/' )] = $matchs[0];
                                }
                            }
                        }
                    }
                }
            }
            $elements = $finder->query( '//link[@rel="canonical"]' );
            foreach ( $elements as $element ) {
                $outer = $element->ownerDocument->saveHTML( $element );
                $_outer = rtrim( $outer, '>' );
                $token = static::magic( $parse_html );
                $token = "<!--{$token}-->";
                $quoted = preg_quote( $_outer, '/' );
                $html = preg_replace( "/{$quoted}[^>]*>/si", $token, $html, 1 );
                $replacements[preg_quote( $token, '/' )] = $outer;
            }
        }
        if ( $setting['abs2rel_exclude_base'] && stripos( $html, '<base' ) !== false ) {
            if ( preg_match( "/<base[^>]*?>/", $html, $matches ) ) {
                foreach ( $matches as $matche ) {
                    $token = static::magic( $html );
                    $token = "<!--{$token}-->";
                    $quoted = preg_quote( $matche, '/' );
                    $html = preg_replace( "/{$quoted}/si", $token, $html, 1 );
                    $replacements[preg_quote( $token, '/' )] = $matche;
                }
            }
        }
        // Main processing
        $base = new URI( $url_info->url );
        $converter = new URIConverter( $base );
        if ( $setting['directory_index'] ) {
            $converter->setDirectoryIndex( $setting['directory_index'] );
        }
        $uri_base = $base->getAbsoluteUri( URI::URI_BASE );
        $s = '[ \\n\\r\\t\\f]';
        $top = '(?:\Q' . $uri_base . '\E|//?)';
        $pattern = "!(?P<before><[^>]+{$s}(?:src|href|action){$s}*={$s}*([\"']?))(?P<path>(?:(?<=\"){$top}[^\"]*|(?<='){$top}[^']*)(?=\\2)|{$top}[^ \\n\\r\\t\\f<>]*)!iu";
        $html = preg_replace_callback( $pattern, function ( $matches ) use ( $converter, $setting ) {
            foreach ($setting['exclude_links'] as $link) {
                if ($link === '') continue;
                if (preg_match('/' . preg_quote($link, '/') . '\z/u', $matches['path'])) {
                    return $matches['before'] . $matches['path']; // not replace
                }
            }
            $converted_uri = null;
            $converter->setTarget($matches['path']);
            if ($setting['path_type'] === 'relative_path') {
                $converted_uri = $converter->getRelativeUri( URI::URI_FULL );
            } elseif ($setting['path_type'] === 'root_relative_path') {
                $converted_uri = $converter->getAbsoluteUri( URI::URI_WITH_PATH
                                                           | URI::URI_WITH_FILE
                                                           | URI::URI_WITH_QUERY
                                                           | URI::URI_WITH_FRAGMENT );
            }
            if ( is_null( $converted_uri ) ) {
                return $matches['before'] . $matches['path']; // not replace
            } else {
                return $matches['before'] . $converted_uri;
            }
        }, $html );
        // Restore the replaced texts
        if ( count( $replacements ) ) {
            foreach ( $replacements as $token => $original ) {
                $html = preg_replace( "/{$token}/", $original, $html, 1 );
            }
        }
        if ( $cache_key ) {
            $app->clear_cache( $cache_dir );
            $app->set_cache( $cache_key, $html );
        }
        return true;
    }

    protected function innerHTML ( $element ) { 
        $innerHTML = ''; 
        $children  = $element->childNodes;
        foreach ( $children as $child ) { 
            $innerHTML .= $element->ownerDocument->saveHTML( $child );
        }
        return $innerHTML; 
    }

    public static function encode_double ( $content ) {
        $content = str_replace( '&amp;', '&amp;amp;', $content );
        $content = str_replace( '&quot;', '&amp;quot;', $content );
        $content = str_replace( '&lt;', '&amp;lt;', $content );
        $content = str_replace( '&gt;', '&amp;gt;', $content );
        return $content;
    }

    public static function magic ( $content = '' ) {
        $magic = '_' . substr( md5( uniqid( mt_rand(), true ) ), 0, 15 );
        if ( strpos( $content, $magic ) !== false )
            return static::magic( $content );
        return $magic;
    }

    protected function getSettings($workspace_id) {
        $workspace_id = (int) $workspace_id;
        $setting = [
            'enabled' => true,
            'target_dynamic' => 0,
            'path_type' => 'root_relative_path',
            'directory_index' => '',
            'abs2rel_exclude_base' => 1,
            'abs2rel_exclude_js' => 0,
            'abs2rel_exclude_comment' => 0,
            'target_extensions' => [],
            'exclude_directries' => [],
            'exclude_links' => [],
        ];
        if (isset(static::$settings[$workspace_id])) {
            $setting = static::$settings[$workspace_id];
        } else {
            // Case of using system settings.
            if ( $workspace_id > 0 && $this->get_config_value( 'abs2rel_use_system_settings', $workspace_id ) ) {
                $setting = $this->getSettings(0); // System Workspace Setting
            } else {
                $setting['directory_index']
                    = $this->get_config_value( 'abs2rel_directory_index', $workspace_id );
                $setting['path_type']
                    = $this->get_config_value( 'abs2rel_path_type', $workspace_id );
                if ($setting['path_type'] !== 'relative_path' && $setting['path_type'] !== 'root_relative_path') {
                    $setting['path_type'] = 'relative_path';
                }
                // File extension settings.
                $target_extensions
                    = $this->get_config_value( 'abs2rel_target_extensions', $workspace_id );
                if (is_string($target_extensions) && $target_extensions !== '') {
                    $setting['target_extensions'] = preg_split('/\s*,\s*/u', $target_extensions);
                }
                // Directory path exclusion settings.
                $exclude_directries
                    = $this->get_config_value( 'abs2rel_exclude_directries', $workspace_id );
                if (is_string($exclude_directries) && $exclude_directries !== '') {
                    $exclude_directries = preg_replace( "/\r\n|\r/u", "\n", $exclude_directries );
                    $exclude_directries = preg_replace( "/^\s|\s$/u", '', $exclude_directries );
                    $setting['exclude_directries']
                        = array_diff( explode( "\n", $exclude_directries ), [ '' ] );
                }
                // Ignore inner tags.
                $setting['abs2rel_exclude_base']
                    = $this->get_config_value( 'abs2rel_exclude_base', $workspace_id );
                $setting['abs2rel_exclude_js']
                    = $this->get_config_value( 'abs2rel_exclude_js', $workspace_id );
                $setting['abs2rel_exclude_comment']
                    = $this->get_config_value( 'abs2rel_exclude_comment', $workspace_id );
                // Link string exclusion settings.
                $exclude_links
                    = $this->get_config_value( 'abs2rel_exclude_links', $workspace_id );
                if (is_string($exclude_links) && $exclude_links !== '') {
                    $exclude_links = preg_replace( "/\r\n|\r/u", "\n", $exclude_links );
                    $exclude_links = preg_replace( "/^\s|\s$/u", '', $exclude_links );
                    $setting['exclude_links']
                        = array_diff( explode( "\n", $exclude_links ), [ '' ] );
                }
            }
            // 'abs2rel_enabled' setting uses per-workspace values.
            $setting['enabled'] = $this->get_config_value( 'abs2rel_enabled', $workspace_id );
            $setting['target_dynamic'] = $this->get_config_value( 'abs2rel_target_dynamic', $workspace_id );
            static::$settings[$workspace_id] = $setting;
        }
        return $setting;
    }

    public function modifier_abs2relconvert ( $str, $arg, $ctx ) {
        if (
            !isset($ctx->vars['current_archive_url'])
         || !$ctx->vars['current_archive_url']
        ) {
            return $str;
        }
        $url = $ctx->vars['current_archive_url'];
        $objs = $ctx->app->db->model('urlinfo')->load(['url' => $url], ['limit' => 1], 'id,workspace_id');
        if (!is_array($objs) || count($objs) === 0) {
            return $str;
        }
        $workspace_id = (int) $objs[0]->workspace_id;
        $setting = $this->getSettings($workspace_id);
        if (is_string($arg) && ($arg == 'relative_path' || $arg == 'root_relative_path')) {
            $setting['path_type'] = $arg;
        }
        // Main processing
        $base = new URI( $url );
        $converter = new URIConverter( $base );
        if ( $setting['directory_index'] ) {
            $converter->setDirectoryIndex( $setting['directory_index'] );
        }
        $uri_base = $base->getAbsoluteUri( URI::URI_BASE );
        $pattern = '!(?P<path>\Q' . $uri_base . '\E(?:/[\w\- ./?%&=~]*)?)!ui';
        $str = preg_replace_callback( $pattern, function ( $matches ) use ( $converter, $setting ) {
            foreach ($setting['exclude_links'] as $link) {
                if ($link === '') continue;
                if (preg_match('/' . preg_quote($link, '/') . '\z/u', $matches['path'])) {
                    return $matches['path']; // not replace
                }
            }
            $converted_uri = null;
            $converter->setTarget($matches['path']);
            if ($setting['path_type'] === 'relative_path') {
                $converted_uri = $converter->getRelativeUri( URI::URI_FULL );
            } elseif ($setting['path_type'] === 'root_relative_path') {
                $converted_uri = $converter->getAbsoluteUri( URI::URI_WITH_PATH
                                                           | URI::URI_WITH_FILE
                                                           | URI::URI_WITH_QUERY
                                                           | URI::URI_WITH_FRAGMENT );
            }
            if ( is_null( $converted_uri ) ) {
                return $matches['path']; // not replace
            } else {
                return $converted_uri;
            }
        }, $str );
        return $str;
    }
}