<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class QuickEdit extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $app->clear_compiled( 'edit.tmpl' );
        $app->clear_cache( 'alt-tmpl' . DS . 'edit' . DS . 'user' );
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        return $this->activate( $app, $plugin, $version, $errors );
    }

    function go_to_edit_screen ( $app ) {
        $permalink = $app->param( 'permalink' );
        if ( strpos( $permalink, '?' ) !== false ) {
            list( $permalink, $param ) = explode( '?', $permalink );
            if ( $permalink == $app->admin_url ) {
                parse_str( $param, $params );
                $permalink = isset( $params['from_cms'] ) ? $app->param( 'permalink' ) : $app->param( 'permalink' ) . '&from_cms=1';
                $app->redirect( $permalink );
            }
        }
        if ( preg_match( '!/$!', $permalink ) ) {
            $permalink .= $app->directory_index;
        }
        $url = $app->db->model( 'urlinfo' )->get_by_key(
            ['url' => $permalink, 'delete_flag' => [0, 1] ],
            ['direction' => 'ascend', 'sort' => 'delete_flag'] );
        if (! $url->id ) {
            $relative = preg_replace( '!^https{0,1}://[^/]*!', '', $permalink );
            $urls = $app->db->model( 'urlinfo' )->load(
                ['relative_url' => $relative, 'delete_flag' => [0, 1] ],
                ['direction' => 'ascend', 'sort' => 'delete_flag'] );
            foreach ( $urls as $ui ) {
                $link_url = $ui->workspace_id ? $ui->workspace->link_url : $app->link_url;
                if ( $link_url ) {
                    $site_url = $ui->workspace_id ? $ui->workspace->site_url : $app->site_url;
                    $site_url = preg_replace( '!(^https{0,1}://[^/]*?/).*$!', '$1', $site_url );
                    $link = rtrim( $site_url, '/' ) . $relative;
                    if ( $link == $ui->url ) {
                        $url = $ui;
                        break;
                    }
                }
            }
        }
        if ( is_object( $url ) && $url->id ) {
            $obj = null;
            $type = $app->param( 'type' );
            if ( $type == 'view' ) {
                $map_id = (int) $url->urlmapping_id;
                if ( $map_id ) {
                    $map = $url->urlmapping;
                    if ( is_object( $map ) ) {
                        $obj = $map->template;
                    }
                }
            } else if ( $url->object_id && $url->model ) {
                $obj = $app->db->model( $url->model )->load( (int) $url->object_id );
            }
            if ( is_object( $obj ) ) {
                $editLink = $app->ctx->vars['script_uri'];
                if ( strpos( $editLink, '/' ) === 0 ) {
                    $editLink = $app->base . $editLink;
                }
                $editLink = $editLink . '?__mode=view&_type=edit&_model=' . $obj->_model . '&id=' . $obj->id;
                if ( $obj->has_column( 'workspace_id' ) ) {
                    $editLink .= '&workspace_id=' . (int) $obj->workspace_id;
                }
                $app->redirect( $editLink );
            }
        }
        $app->return_to_dashboard( ['edit_link_not_found' => 1 ] );
    }

    function insert_quickedit_error ( $cb, $app, &$param, $tmpl ) {
        if ( $app->param( 'edit_link_not_found' ) ) {
            $error_msg = $this->translate( 'Quick link for editing screen was not found.' );
            $param['error'] = isset( $param['error'] ) ? $param['error'] . $error_msg : $error_msg;
        }
    }
}