<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class TinyMCE extends PTPlugin {

    public $upgrade_functions = [ ['version_limit' => 1.5, 'method' => 'update_plugins'] ];

    function __construct () {
        parent::__construct();
    }

    function update_plugins ( $app, $plugin, $version, &$errors ) {
        $settings = $app->db->model( 'option' )->load( ['key' => 'tinymce_plugins', 'extra' => 'tinymce', 'kind' => 'plugin_setting'] );
        $print = "!((?:\G|>)[^<]*?)(print)!";
        $paste = "!((?:\G|>)[^<]*?)(paste)!";
        foreach ( $settings as $setting ) {
            $value = $setting->value;
            $changed = false;
            if ( preg_match( $print, $value ) ) {
                $value = preg_replace( $print, '$1<mt:if name="tinymce_version" lt="6">$2</mt:if>', $value );
                $changed = true;
            }
            if ( preg_match( $paste, $value ) ) {
                $value = preg_replace( $paste, '$1<mt:if name="tinymce_version" lt="6">$2</mt:if>', $value );
                $changed = true;
            }
            if ( $changed ) {
                $setting->value( $value );
                $setting->save();
            }
        }
        return true;
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'edit.tmpl' );
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        return $this->activate( $app, $plugin, $version, $errors );
    }

    function post_init ( $app ) {
        // Register plugin to $ctx->include_paths.
        return true;
    }

    function hdlr_if_editormobile ( $args, $content, $ctx, $repeat, $counter ) {
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
        if ( !empty( $ua ) && ( strpos( $ua, 'iPhone' ) !== false ||
             strpos( $ua, 'Android' ) !== false ) ) {
            return true;
        }
        return false;
    }

    function tinymce_insert_boilerplate ( $app ) {
        $id = (int) $app->param( 'id' );
        $boilerplate = $app->db->model( 'boilerplate' )->load( $id );
        if (! $boilerplate ) return '';
        $workspace_id = (int) $app->param( 'workspace_id' );
        if ( $workspace_id != $boilerplate->workspace_id ) {
            return;
        }
        $ctx = $app->ctx;
        $model = $app->param( '_model' );
        $object_id = (int) $app->param( 'object_id' );
        if (! $model ) return;
        $obj = $object_id ? $app->db->model( $model )->load( $object_id )
             : $app->db->model( $model )->new();
        if (! $obj->id && $workspace_id && $obj->has_column( 'workspace_id' ) ) {
            $obj->workspace_id( $workspace_id );
        }
        if (! $app->can_do( $model, 'edit', $obj ) ) {
            return; // Permission denied.
        }
        $app->init_tags();
        $ctx->stash( 'current_context', $model );
        $ctx->stash( $model, $obj );
        header( 'X-Content-Type-Options: nosniff' );
        header( 'X-Frame-Options: DENY' );
        $snippet = $boilerplate->snippet;
        $app->print( $app->build( $snippet ), 'text/plain' );
    }
}
