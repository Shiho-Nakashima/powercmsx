<?php

class ThemeMedia {

    private $stash = [];

    public function start_import ( $app, $theme, $workspace_id, $class ) {
        $this->stash['export_int2label'] = $app->export_int2label;
        $app->export_int2label = true;
    }

    public function post_import_objects ( $app, $imported_objects, $workspace_id, $class ) {
        $app->export_int2label = $this->stash['export_int2label'] ?? null;
        $db = $app->db;
        $builds = ['entry', 'page', 'form', 'template'];
        $global_nav_ids = [];
        $footer_nav_ids = [];
        foreach ( $imported_objects as $model => $objects ) {
            if ( $model !== 'phrase' ) {
                continue;
            }
            foreach ( $objects as $obj ) {
                $app->dictionary[ $obj->lang ][ $obj->phrase ] = $obj->trans;
            }
        }
        foreach ( $imported_objects as $model => $objects ) {
            if (! in_array( $model, $builds ) ) {
                continue;
            }
            foreach ( $objects as $obj ) {
                $app->publish_obj( $obj, null, false );
                if (! empty ( $app->update_urls ) ) {
                    $update_urls = array_values( $app->update_urls );
                    $db->model( 'urlinfo' )->update_multi( $update_urls );
                    $app->update_urls = [];
                }
                if ( $model === 'page' ) {
                    if (
                        $obj->title == 'About This Website'
                     || $obj->title == 'Operating Company'
                     || $obj->title == 'Privacy Policy'
                    ) {
                        $url = $db->model( 'urlinfo' )->get_by_key(
                            ['class' => 'archive',
                             'model' => 'page',
                             'workspace_id' => $workspace_id,
                             'object_id' => $obj->id,
                             'archive_type' => 'page'] );
                        if ( $url->id ) {
                            if ( $obj->title == 'About This Website' ) {
                                $global_nav_ids[] = $url->id;
                            }
                            $footer_nav_ids[] = $url->id;
                        }
                    }
                } else if ( $model === 'form' ) {
                    $url = $db->model( 'urlinfo' )->get_by_key(
                        ['workspace_id' => $workspace_id,
                         'class' => 'archive',
                         'model' => 'form',
                         'object_id' => $obj->id,
                         'archive_type' => 'form'] );
                    if ( $url->id ) {
                        $global_nav_ids[] = $url->id;
                        $footer_nav_ids[] = $url->id;
                    }
                }
            }
        }
        $menus = $imported_objects['menu'];
        $args = ['name' => 'urls',
                 'from_obj' => 'menu',
                 'to_obj' => 'urlinfo'];
        if ( is_array( $menus ) ) {
            foreach ( $menus as $menu ) {
                $args['from_id'] = $menu->id;
                if ( $menu->basename == 'media_global_navigation' ) {
                    $app->set_relations( $args, $global_nav_ids );
                } else if ( $menu->basename == 'media_footer_navigation' ) {
                    $app->set_relations( $args, $footer_nav_ids );
                }
                $menu->save();
            }
        }
        $categories = $db->model( 'category' )->load( ['workspace_id' => $workspace_id ] );
        if ( is_array( $categories ) ) {
            foreach ( $categories as $category ) {
                $app->publish_obj( $category, null, false );
            }
        }
    }

    public function post_apply_theme ( $app, $imported_objects, $workspace_id, $class ) {
        if ( $workspace_id ) {
            $workspace = $app->workspace();
            $do_update = false;
            if (! $workspace->description ) {
                $workspace->description( 'The quick brown fox jumps over the lazy dog.' );
                $do_update = true;
            }
            if (! $workspace->copyright ) {
                $workspace->copyright( 'Media : Copyright &copy; <mt:date format="Y"> Alfasado Inc. All rights reserved.' );
                $do_update = true;
            }
            if ( $do_update ) {
                $workspace->save();
            }
        }
    }

}
