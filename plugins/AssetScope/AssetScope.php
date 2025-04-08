<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class AssetScope extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function start_app ( $app ) {
        if ( $app->id === 'Prototype' ) {
            $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
            $config = $this->get_config_value( 'assetscope_workspace_id', $workspace_id );
            if ( is_numeric( $config ) && $workspace_id != $config ) {
                $app->asset_workspace_id = (int) $config;
            }
            if ( $app->mode === 'insert_asset' ) {
                $config = $app->param( '_from_scope' );
                if (! is_numeric( $config ) ) {
                    $config = $workspace_id;
                }
                $config = $this->get_config_value( 'assetscope_label_column', (int) $config );
                if ( $config ) {
                    $app->asset_label_col = $config;
                }
            }
        }
    }

    function move_assets ( $app ) {
        $argv = $app->worker->argv;
        if ( is_array( $argv ) && in_array( 'assetscope_move_assets', $argv ) ) {
        } else {
            return false;
        }
        $settings = $app->db->model( 'option' )->load(
            ['key' => 'assetscope_workspace_id', 'kind' => 'plugin_setting', 'extra' => 'assetscope'] );
        $counter = 0;
        foreach ( $settings as $setting ) {
            $workspace_id = (int) $setting->workspace_id;
            $value = $setting->value;
            if ( is_numeric( $value ) && $workspace_id != $value ) {
                $site_path = null;
                if ( $workspace_id ) {
                    $workspace = $app->db->model( 'workspace' )->load( (int) $workspace_id );
                    if ( $workspace ) {
                        $site_path = $workspace->site_path;
                    }
                } else {
                    $site_path = $app->site_path;
                }
                if (! $site_path ) {
                    continue;
                }
                $move_site_path = null;
                if ( $value ) {
                    $move_workspace = $app->db->model( 'workspace' )->load( (int) $value );
                    if ( $move_workspace ) {
                        $move_site_path = $move_workspace->site_path;
                    }
                } else {
                    $move_site_path = $app->site_path;
                }
                if (! $move_site_path ) {
                    continue;
                }
                if ( strpos( $site_path, $move_site_path ) !== 0 ) {
                    $this->log( $this->translate( "The asset could not be moved because the scope's site path is not below the destination site path." ),
                                'error', [], $workspace_id, $app );
                    continue;
                }
                $root = preg_quote( $move_site_path, '/' );
                $extra_path = preg_replace( "/^{$root}/", '', $site_path );
                $assets = $app->db->model( 'asset' )->load( ['workspace_id' => (int) $workspace_id ] );
                foreach ( $assets as $asset ) {
                    $urls = $app->db->model( 'urlinfo' )->load( ['object_id' => $asset->id, 'model' => 'asset', 'delete_flag' => [0, 1]] );
                    $status = $asset->status;
                    if ( $status == 4 ) {
                        $asset->status( 0 );
                        $asset->save();
                        $app->publish_obj( $asset );
                        // For DocumentSearch or Other Callbacks.
                        $asset->status( 4 );
                    }
                    if (!empty( $urls ) ) {
                        foreach ( $urls as $idx => $url ) {
                            $url->workspace_id( $value );
                            PTUtil::set_url_path( $url );
                            $urls[ $idx ] = $url;
                        }
                        $app->db->model( 'urlinfo' )->update_multi( $urls );
                    }
                    // Set extra_path
                    if ( $extra_path ) {
                        $extra_path = $extra_path . DS . $asset->extra_path;
                        $app->sanitize_dir( $extra_path );
                        $asset->extra_path( $extra_path );
                    }
                    $asset->workspace_id( $value );
                    $asset->save();
                    $app->publish_obj( $asset );
                    // For DocumentSearch or Other Callbacks.
                    $counter++;
                }
            }
        }
        return $counter ? $this->translate( 'Changed the scope of %s asset(s).', $counter ) : $counter;
    }
}