<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class DynamicCaching extends PTPlugin {

    private $cachePath   = null;
    private $removePaths = [];
    private $content     = null;
    private $triggerUrls = [];

    function __construct () {
        parent::__construct();
    }

    function __destruct () {
        $app = Prototype::get_instance();
        if (!empty( $this->triggerUrls ) ) {
            $trigger_urls = $this->triggerUrls;
            foreach ( $trigger_urls as $trigger_url ) {
                $path = 'dynamic_content' . DS . md5( $trigger_url->url ) . DS;
                $app->clear_cache( $path );
            }
        }
        if ( $this->cachePath !== null ) {
            $app = Prototype::get_instance();
            $app->set_cache( $this->cachePath, $this->content );
        }
        if (!empty( $this->removePaths ) ) {
            $removePaths = $this->removePaths;
            foreach ( $removePaths as $path => $true ) {
                $app->clear_cache( $path . DS );
            }
        }
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'edit.tmpl' );
        $app->clear_cache( 'alt-tmpl' . DS . 'edit' . DS . 'urlmapping' );
        return true;
    }

    function post_load_object_urlinfo ( $cb, $app, $url ) {
        $query_string = $_SERVER['QUERY_STRING'] ?? null;
        if ( $app->id != 'Bootstrapper' ) {
            return true;
        }
        if (! $app->dynamiccaching_cache_with_query && $query_string ) {
            return true;
        }
        if ( $url->publish_file != 6 || $url->delete_flag ) {
            return true;
        }
        if ( $app->fmgr->exists( $url->file_path ) ) {
            return true;
        }
        $uri = $url->url;
        $extensions = $app->dynamiccaching_extensions;
        $extension = PTUtil::get_extension( $uri );
        if (! in_array( $extension, $extensions ) ) {
            return true;
        }
        $methods = $app->dynamiccaching_request_methods;
        if (! in_array( $app->request_method, $methods ) ) {
            return true;
        }
        $excludes = $app->dynamiccaching_exclude_logged_in;
        foreach ( $excludes as $exclude ) {
            if ( $exclude == 'user' && is_object( $app->$exclude ) ) {
                return true;
            } else if ( $exclude == 'member' && $component = $app->component( 'members' ) ) {
                if ( is_object( $component->member( $app ) ) ) {
                    return true;
                }
            }
        }
        $path = 'dynamic_content' . DS . md5( $uri );
        if ( $query_string ) {
            $path .= DS . md5( $query_string );
        } else {
            $path .= DS . 'without_query';
        }
        $cache = $app->get_cache( $path );
        if ( $cache !== null ) {
            $app->print( $cache, $url->mime_type, $url->filemtime );
            exit();
        }
        $this->cachePath = $path;
        return true;
    }

    function dynamic_view_urlinfo ( $cb, $app, $url, $data ) {
        if ( $this->cachePath !== null ) {
            $this->content = $data;
        }
        return true;
    }

    function start_publish_template ( $cb, $app, $unlink ) {
        if ( $app->id != 'Prototype' ) {
            return true;
        } else if ( $app->mode == 'rebuild_phase' ) {
            return true;
        }
        $url = $cb['urlinfo'];
        $table = $app->get_table( $url->model );
        $triggers = $app->db->model( 'relation' )->load(
            ['to_obj' => 'table', 'to_id' => $table->id,
             'name' => 'triggers', 'from_obj' => 'urlmapping']
        );
        foreach ( $triggers as $trigger ) {
            $map = $app->db->model( 'urlmapping' )->load( (int) $trigger->from_id );
            if ( $map ) {
                if ( $map->trigger_scope && $url->workspace_id != $map->workspace_id ) {
                    continue;
                }
                $trigger_terms = ['urlmapping_id' => $map->id, 'publish_file' => 6,
                                  'delete_flag' => 0, 'class' => 'archive'];
                $trigger_urls = $app->db->model( 'urlinfo' )->load( $trigger_terms, null, 'url' );
                $this->triggerUrls = array_merge( $this->triggerUrls, $trigger_urls );
            }
        }
        if ( $url->publish_file != 6 ) {
            return true;
        }
        $uri = $url->url;
        $path = 'dynamic_content' . DS . md5( $uri );
        $this->removePaths[ $path ] = true;
        return true;
    }

}