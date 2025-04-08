<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class EditorDiff extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function editor_diff ( $app ) {
        if ( $app->param( '_type' ) === 'diff' ) {
            $content = file_get_contents( 'php://input' );
            if (! $content ) {
                return $app->json_error( $this->translate( 'An error occurred while get diff.' ), 500 );
            }
            $json = json_decode( $content );
            if (!is_object( $json ) ) {
                return $app->json_error( $this->translate( 'An error occurred while get diff.' ), 500 );
            }
            $magic_token = $json->magic_token;
            if ( $magic_token != $app->current_magic ) {
                $app->json_error( 'Invalid request.' );
            }
            $model = $json->_model;
            $id = $json->id;
            $column = $json->column;
            $obj = $app->db->model( $model )->load( $id, null, "id,rev_object_id,rev_type,{$column}" );
            $text = '';
            $page_title = '';
            if (! $obj->rev_type ) {
                $revison = $app->db->model( $model )->get_by_key(
                    ['rev_object_id' => $id ],
                    ['sort' => 'id', 'direction' => 'descend'] );
                if ( $revison->id ) {
                    $text = $revison->$column;
                    $page_title = $this->translate( 'Difference with latest Revision(ID:%s)', $revison->id );
                } else {
                    $app->json_error( $this->translate( 'No revisions to diff were found.' ) );
                }
            } else {
                $_from_master = $app->param( '_from_master' );
                if ( $_from_master ) {
                    $revison = $app->db->model( $model )->load( $obj->rev_object_id );
                    if ( $revison ) {
                        $text = $revison->$column;
                        $page_title = $this->translate( 'Difference with Master(ID:%s)', $revison->id );
                    } else {
                        $app->json_error( $app->translate( 'Master not found.' ) );
                    }
                } else {
                    $revison = $app->db->model( $model )->get_by_key(
                        ['rev_object_id' => $obj->rev_object_id,
                         'id' => ['<' => $obj->id ] ],
                        ['sort' => 'id', 'direction' => 'descend'] );
                    if ( $revison->id ) {
                        $text = $revison->$column;
                        $page_title = $this->translate( 'Difference with latest Revision(ID:%s)', $revison->id );
                    } else {
                        $app->json_error( $this->translate( 'No revisions to diff were found.' ) );
                    }
                }
            }
            header( 'Content-type: application/json' );
            echo json_encode( ['revision' => $text, 'page_title' => $page_title ] );
            exit();
        }
        $param = [];
        $tmpl = $app->ctx->get_template_path( 'editor_diff.tmpl' );
        echo $app->build_page( $tmpl, $param );
    }

    function hdlr_ifobjecthasrevision ( $args, $content, $ctx, $repeat, $counter ) {
        $app = $ctx->app;
        $id = $app->param( 'id' );
        if (! $id ) {
            return false;
        }
        $model = $app->param( '_model' );
        if (! $model ) {
            return false;
        }
        $table = $app->get_table( $model );
        if (! $table ) {
            return false;
        }
        if (! $app->db->model( $model )->has_column( 'rev_type' ) ) {
            return false;
        }
        $obj = $app->db->model( $model )->load( $id, null, 'id,rev_object_id,rev_type' );
        if (! $obj ) {
            return false;
        }
        if (! $obj->rev_type ) {
            $revison = $app->db->model( $model )->get_by_key(
                ['rev_object_id' => $id ],
                ['sort' => 'id', 'direction' => 'descend'] );
            if ( !$revison->id ) {
                return false;
            }
        } else {
            $revison = $app->db->model( $model )->get_by_key(
                ['rev_object_id' => $obj->rev_object_id,
                 'id' => ['<' => $obj->id ] ],
                ['sort' => 'id', 'direction' => 'descend'] );
            if ( !$revison->id ) {
                return false;
            }
        }
        return true;
    }

    function insert_button ( $cb, $app, &$param, &$tmpl ) {
        $ctx = $app->ctx;
        $ctx->vars['editordiff_assets_base'] = $app->editordiff_assets_base;
        $editor_buttons = isset( $ctx->vars['editor_buttons'] ) ? $ctx->vars['editor_buttons'] : '';
        $tinymce_version = (int)$app->tinymce_version;
        if ( $tinymce_version && $tinymce_version == 4 ) {
            $editor_tmpl = $app->ctx->get_template_path( 'editor_diff_editor_button_4.tmpl' );
        } else {
            $editor_tmpl = $app->ctx->get_template_path( 'editor_diff_editor_button.tmpl' );
        }
        $editor_buttons .= $app->build( file_get_contents( $editor_tmpl ) );
        $ctx->vars['editor_buttons'] = $editor_buttons;
        $custom_buttons = isset( $ctx->vars['custom_html_insert_buttons'] )
                        ? $ctx->vars['custom_html_insert_buttons'] : '';
        $editor_tmpl = $app->ctx->get_template_path( 'editor_diff-btn.tmpl' );
        // Require build in old version's alt-tmpl?
        $custom_buttons .= $app->fmgr->get( $editor_tmpl );
        $ctx->vars['custom_html_insert_buttons'] = $custom_buttons;
        return true;
    }

}