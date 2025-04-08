<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class ExternalPreview extends PTPlugin {

    public $upgrade_functions = [ ['version_limit' => 1.2, 'method' => 'clear_locale'] ];

    function __construct () {
        parent::__construct();
    }

    function clear_locale ( $app, $plugin, $version, &$errors ) {
        $locale_dir = $this->path() . DS . 'locale' . DS;
        $locales = [];
        PTUTil::file_find( $locale_dir, $locales );
        foreach ( $locales as $locale ) {
            $cache_id = 'component' . DS . 'locale_' . md5( $locale );
            $app->clear_cache( $cache_id );
        }
        return true;
    }

    function post_init ( $app ) {
        if ( $app->id !== 'Prototype' ) return true;
        if ( $app->mode !== 'save' && $app->mode !== 'clone_object' ) return true;
        if ( $app->param( '_preview' ) ) return true;
        $workspace_id = $app->workspace() ? (int) $app->workspace()->id : 0;
        $models = $this->get_config_value( 'externalpreview_models', $workspace_id );
        if (! $models ) return true;
        $model = $app->param( '_model' );
        $models = array_filter( preg_split( '/\s*,\s*/', strtolower( $models ) ), 'strlen' );
        if (! in_array( $model, $models ) ) {
            return true;
        }
        $app->register_callback( $model, 'pre_save', 'pre_save_object', 1, $this );
        if ( $app->mode == 'save' && !$app->param( '_duplicate' ) ) {
            $app->register_callback( $model, 'post_save', 'post_save_object', 1, $this );
        } else {
            $app->register_callback( $model, 'post_save_clone', 'post_save_clone', 1, $this );
        }
        return true;
    }

    function post_save_clone ( $cb, $app, $obj, $original ) {
        $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $obj->_model,
                                                        'object_id' => $obj->id,
                                                        'kind' => 'external_preview'] );
        if ( $meta->id ) {
            $default_expires = $this->get_config_value( 'externalpreview_default_expires',
                                                      (int)$app->param( 'workspace_id' ) );
            $default_expires .= '';
            if ( ctype_digit( (string) $default_expires ) ) {
                $expires = date('YmdHis', strtotime("+{$default_expires} day"));
                $meta->text( $expires );
                $meta->save();
            }
            // or remove by setting.
        }
        return true;
    }

    function pre_save_object ( &$cb, $app, $obj, $original ) {
        if (! $obj->id ) {
            return true;
        }
        if ( $app->param( '__external_preview' ) ) {
            $workspace_id = $app->workspace() ? (int) $app->workspace()->id : 0;
            $externalpreview_pw_kind = $this->get_config_value( 'externalpreview_pw_kind', $workspace_id );
            if ( $externalpreview_pw_kind == 2 ) {
                $pass = $app->param( '__external_preview_password' );
                $msg = $this->translate( 'You have not entered a password for the External Preview.' );
                if (! $pass ) {
                    $cb['error_selectors']['#__ExternalPreview_password'] = true;
                    $cb['error'] = $msg;
                    return false;
                } else if ( !$app->is_valid_password( $pass, $pass, $msg ) ) {
                    $cb['error_selectors']['#__ExternalPreview_password'] = true;
                    $cb['error'] = $msg;
                    return false;
                }
            }
        }
        return true;
    }

    function post_save_object ( $cb, $app, $obj, $original ) {
        $external_preview = $app->param( '__external_preview' );
        $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $obj->_model,
                                                'object_id' => $obj->id,
                                                'kind' => 'external_preview' ] );
        if ( $external_preview ) {
            $date_expires = $app->param( '__external_preview_date' );
            $time_expires = $app->param( '__external_preview_time' );
            $preview_password = $app->param( '__external_preview_password' );
            if ( $date_expires ) {
                $date_expires = trim( $date_expires );
                $time_expires = trim( $time_expires );
                if (! $time_expires ) $time_expires = '00:00';
                $date_expires = "{$date_expires}{$time_expires}";
                $date_expires = preg_replace( '/[^0-9]/', '', $date_expires );
                $date_expires .= '00';
                if ( preg_match( '/^[0-9]{14}$/', $date_expires ) ) {
                    $y = substr( $date_expires, 0, 4 );
                    $m = substr( $date_expires, 4, 2 );
                    $d = substr( $date_expires, 6, 2 );
                    if ( checkdate( $m, $d, $y ) ) {
                        $meta->text( $date_expires );
                    }
                }
            }
            $workspace_id = $app->workspace() ? (int) $app->workspace()->id : 0;
            $externalpreview_pw_kind = $this->get_config_value( 'externalpreview_pw_kind', $workspace_id );
            if ( $externalpreview_pw_kind == 2 && $preview_password ) {
                $meta->blob( $preview_password );
            }
            $meta->value( 1 );
            $meta->save();
        } else if ( $meta->id ) {
            $meta->remove();
        }
        return true;
    }

    function post_load_urlinfo ( $cb, $app, &$url ) {
        if ( $app->id != 'Bootstrapper' ) return true;
        $uuid = $app->param( 'uuid' );
        if ( $uuid && $url->is_published && !$app->param( 'revision_id' ) ) return true;
        if ( $uuid && $url->file_path && file_exists( $url->file_path ) && !$app->param( 'revision_id' ) ) {
            return true;
        }
        $obj_cookie = $app->cookie_val( 'pt-external-preview-user' );
        $obj_session = null;
        if ( $obj_cookie ) {
            $obj_session = $app->db->model( 'session' )->get_by_key(
            ['name' => $obj_cookie, 'key' => 'pt-external-preview-user', 'kind' => 'EP'] );
            if (! $obj_session->id || $obj_session->expires < $app->request_time ) {
                if ( $obj_session->id ) {
                    $obj_session->remove();
                }
                $obj_session = null;
            }
        }
        if (! $uuid && ! $obj_session ) return true;
        $cookie_val = $app->cookie_val( 'pt-external-preview' );
        if (! $uuid && ! $cookie_val ) return true;
        if (! $url->id ) {
            $terms = ['relative_url' => $url->relative_url, 'delete_flag' => [0, 1] ];
            if ( $url->url ) {
                $terms['url'] = $url->url;
            }
            $url = $app->db->model( 'urlinfo' )->get_by_key( $terms,
                ['sort' => 'delete_flag', 'direction' => 'descend'] );
            if (! $url->id ) {
                if (! $url->relative_url ) return true;
                unset( $terms['url'] );
                $url = $app->db->model( 'urlinfo' )->get_by_key( $terms,
                    ['sort' => 'delete_flag', 'direction' => 'descend'] );
            }
        }
        if ( $url->model && $url->object_id ) {
            $workspace_id = $url->workspace_id ? (int) $url->workspace_id : 0;
            $models = $this->get_config_value( 'externalpreview_models', $workspace_id );
            if (! $models ) return true;
            $models = preg_split( '/\s*,\s*/', strtolower( $models ) );
            $models[]= 'attachmentfile';
            if ( $obj_session ) {
                $models[]= $url->model;
            }
            $models = array_filter( $models, 'strlen' );
            if (! in_array( $url->model, $models ) ) {
                return true;
            }
            $obj = $app->param( 'revision_id' ) ? $app->db->model( $url->model )->load( (int) $app->param( 'revision_id' ) )
                 : $app->db->model( $url->model )->load( (int) $url->object_id );
            if (! $obj ) return true;
            $app->get_scheme_from_db( $obj->_model );
            if ( $uuid ) {
                if ( $obj->has_column( 'uuid' ) && $obj->uuid != $uuid ) {
                    return true;
                }
            }
            $url->object_id( $obj->id );
            $relation_columns = [];
            if ( $obj_session && $obj->_model != $obj_session->value ) {
                $scheme = $app->get_scheme_from_db( $obj_session->value );
                if (! $scheme || ( is_array( $scheme ) && empty( $scheme ) ) ) {
                    return true;
                }
                $edit_properties = $scheme['edit_properties'];
                $column_defs = $scheme['column_defs'];
                foreach ( $edit_properties as $column => $prop ) {
                    if ( $column_defs[ $column ]['type'] == 'int' && strpos( $prop, ':' ) !== false ) {
                        $props = explode( ':', $prop );
                        if ( $props[0] == 'relation' || $props[0] == 'reference' ) {
                            $relation_columns[ $column ] = $props[1];
                        }
                    }
                }
            }
            $medias = array_merge( $app->images, $app->videos, $app->audios, $app->externalpreview_attachment_exts );
            $extension = PTUtil::get_extension( $url->file_path, true );
            if ( $url->model == 'attachmentfile' ) {
                if (! in_array( $extension, $medias ) ) {
                    return true;
                }
                $relation = $app->db->model( 'relation' )->get_by_key(
                    ['to_obj' => 'attachmentfile', 'to_id' => $obj->id ] );
                if ( $relation->id ) {
                    $obj = $app->db->model( $relation->from_obj )->load( $relation->from_id );
                } else if ( $obj_session ) {
                    $rel_col = array_search( $obj->_model, $relation_columns );
                    if ( $rel_col === false ) {
                        return true;
                    }
                    $_obj = $app->db->model( $obj_session->value )->load( (int) $obj_session->text );
                    if ( $_obj && $_obj->$rel_col == $obj->id ) {
                        $obj = $_obj;
                    } else {
                        return true;
                    }
                } else {
                    return true;
                }
            } else if ( $obj_session && $obj->_model != $obj_session->value && !$uuid ) {
                if (! in_array( $extension, $medias ) ) {
                    return true;
                }
                $has_field = false;
                if ( $obj->_model == 'asset' ) {
                    $_obj = $app->db->model( $obj_session->value )->load( (int) $obj_session->text );
                    $customfields  = $app->get_meta( $_obj, 'customfield' );
                    if (! empty( $customfields ) ) {
                        $field_type_asset = $app->field_type_asset
                                      ? explode( $app->field_type_asset ) : ['asset', 'assets', 'image', 'images'];
                        $asset_ids = [];
                        foreach ( $customfields as $customfield ) {
                            if ( in_array( $customfield->type, $field_type_asset ) && $customfield->data ) {
                                $data = array_filter( explode( ':', $customfield->data ), 'strlen' );
                                $asset_ids = array_merge( $asset_ids, $data );
                            }
                        }
                        $asset_ids = array_unique( $asset_ids );
                        if (! empty( $asset_ids ) && in_array( $obj->id, $asset_ids ) ) {
                            $has_field = true;
                        }
                    }
                }
                if (! $has_field ) {
                    $relation = $app->db->model( 'relation' )->get_by_key(
                        ['from_obj' => $obj_session->value, 'to_obj' => $obj->_model,
                         'from_id' => (int)$obj_session->text,'to_id' => $obj->id ] );
                    if (! $relation->id ) {
                        $rel_col = array_search( $obj->_model, $relation_columns );
                        if ( $rel_col === false ) {
                            return true;
                        }
                        $_obj = $app->db->model( $obj_session->value )->load( (int) $obj_session->text );
                        if ( $_obj && $_obj->$rel_col == $obj->id ) {
                        } else {
                            return true;
                        }
                    }
                }
                $obj = isset( $_obj ) ? $_obj : $app->db->model( $obj_session->value )->load( (int) $obj_session->text );
            }
            if (! $obj->has_column( 'uuid' ) || ! $obj->has_column( 'status' ) ) {
                return true;
            }
            if (! $obj->uuid ) return true;
            $parmalink = $app->get_permalink( $obj );
            $setting = $this->get_config_value( 'externalpreview_url', $url->workspace_id );
            if ( $setting == 'view_link' ) {
                if ( $url->workspace_id ) {
                    $workspace = $app->db->model( 'workspace' )->load( $url->workspace_id );
                    $site_url = $workspace->site_url;
                    $link_url = $workspace->link_url;
                } else {
                    $site_url = $app->site_url;
                    $link_url = $app->link_url;
                }
                if ( $link_url ) {
                    $parmalink = str_replace( $site_url, $link_url, $parmalink );
                }
            }
            $cookie = md5( $parmalink ) . '-' . md5( $obj->uuid );
            if ( $cookie_val && $cookie_val == $cookie ) {
                $uuid = $obj->uuid;
            }
            $status_published = $app->status_published( $url->model );
            $can_views = [1];
            if ( $status_published == 4 ) {
                $can_views = [1, 2, 3];
            }
            $status = (int) $obj->status;
            if (! in_array( $status, $can_views ) ) {
                return true;
            }
            $ctx = $app->ctx;
            $expires = PTUTil::property_exists( $app, 'external_preview_cookie_expires' )
                     ? $app->external_preview_cookie_expires : 60;
            if ( $obj->uuid && $uuid == $obj->uuid ) {
                $password = $this->get_config_value( 'externalpreview_password', $workspace_id );
                $pw_kind = $this->get_config_value( 'externalpreview_pw_kind', $workspace_id );
                $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $obj->_model,
                                                    'object_id' => $obj->id,
                                                    'kind' => 'external_preview' ] );
                if (! $meta->id ) {
                    return true;
                }
                if ( $date_expires = $meta->text ) {
                    $ts = date('YmdHis');
                    if ( $ts > $date_expires ) {
                        $meta->remove();
                        return true;
                    }
                }
                $domain = $app->externalpreview_cookie_domain;
                if ( $app->request_method == 'GET' ) {
                    if ( $url->mime_type == 'text/html' ) {
                        $app->bake_cookie( 'pt-external-preview', $cookie, $expires, '/', true, $domain );
                        $user_id = $obj->user_id ? $obj->user_id : $obj->modified_by;
                        if ( $obj && $obj->id && $user_id ) {
                            $magic = $app->cookie_val( 'pt-external-preview-user' )
                                   ? $app->cookie_val( 'pt-external-preview-user' ) : $app->magic();
                            $session = $app->db->model( 'session' )->get_by_key(
                                ['name' => $magic, 'key' => 'pt-external-preview-user', 'kind' => 'EP'] );
                            $session->user_id( $user_id );
                            $session->value( $obj->_model );
                            $session->text( $obj->id );
                            $session->data( $obj->uuid );
                            $session->workspace_id( $workspace_id );
                            $session->start( $app->request_time );
                            $session->expires( $app->request_time + $expires );
                            $session->save();
                            $app->bake_cookie( 'pt-external-preview-user', $magic, $expires, '/', true, $domain );
                        }
                        $ctx->vars['form_action'] = $parmalink;
                        $ctx->vars['uuid'] = $uuid;
                        $ctx->vars['page_title'] = $this->translate( 'External Preview' );
                        $ctx->vars['require_password'] = $password !== '';
                        if ( $pw_kind == 2 && $meta->blob ) {
                            $ctx->vars['require_password'] = true;
                        }
                        $table = $app->get_table( $url->model );
                        $ctx->vars['preview_model'] = $app->translate( $table->label );
                        $path_keys = array_map( 'strlen', array_keys( $ctx->include_paths ) );
                        array_multisort( $path_keys, SORT_DESC, $ctx->include_paths );
                        $app->build_page( 'external_preview.tmpl' );
                        exit();
                    }
                } else {
                    $app->ctx->vars['popup'] = 1;
                    if ( $pw_kind == 2 && $meta->blob != $app->param( 'password' ) ) {
                        return $app->error( $this->translate( 'Your password is incorrect.' ) );
                        exit();
                    } else if ( $password && $password != $app->param( 'password' ) ) {
                        return $app->error( $this->translate( 'Your password is incorrect.' ) );
                        exit();
                    }
                    $app->bake_cookie( 'pt-external-preview', $cookie, $expires, '/', true, $domain );
                }
                $workspace = null;
                if ( $obj->has_column( 'workspace_id' ) && $obj->workspace ) {
                    $workspace = $obj->workspace;
                } else {
                    $workspace = $app->db->model( 'workspace' )->new();
                    $workspace->id( 0 );
                }
                $status_published = $app->status_published( 'user' );
                $user = $app->user() ? $app->user()
                      : $app->db->model( 'user' )->new( ['status' => $status_published, 'lockout' => 0 ] );
                if (! $user->id ) {
                    $user->id = -1;
                }
                $perms = $app->permissions();
                $ws_perms = isset( $perms[ $url->workspace_id ] ) ? $perms[ $url->workspace_id ] : [];
                $permission = $obj->has_column( 'status' ) ? 'can_activate_' . $url->model
                            : 'can_create_' . $url->model;
                if (! in_array( $permission, $ws_perms ) ) {
                    $ws_perms[] = $permission;
                }
                if ( $obj->has_column( 'user_id' ) ) {
                    $permission = 'can_update_all_' . $url->model;
                    if (! in_array( $permission, $ws_perms ) ) {
                        $ws_perms[] = $permission;
                    }
                }
                $perms[ $url->workspace_id ] = $ws_perms;
                $app->stash( 'user_permissions_' . $user->id, $perms );
                $app->user = $user;
                if ( $app->dynamicmtml_in_preview ) {
                    $app->publish_callbacks = true;
                    $app->register_callback( 'template', 'post_rebuild', 'post_rebuild', 1, $this );
                }
            }
        }
        $_REQUEST['_external_preview'] = 1;
        return true;
    }

    function post_rebuild ( $cb, $app, $tmpl, &$preview ) {
        $ctx = $app->ctx;
        $regex = '<\${0,1}' . $ctx->prefix;
        if ( preg_match( "/$regex/i", $preview ) ) {
            $preview = $ctx->build( $preview, false, null, true );
        }
    }

    function insert_externalpreview_link ( $cb, $app, $param, &$tmpl ) {
        $workspace_id = $app->workspace() ? (int) $app->workspace()->id : 0;
        $models = $this->get_config_value( 'externalpreview_models', $workspace_id );
        if (! $models ) return true;
        $models = preg_split( '/\s*,\s*/', strtolower( $models ) );
        $model = $app->param( '_model' );
        if (! in_array( $model, $models ) ) {
            return true;
        }
        $obj = $app->db->model( $model );
        if (! $obj->has_column( 'uuid' ) || ! $obj->has_column( 'status' ) ) {
            return true;
        }
        $id = (int) $app->param( 'id' );
        if (! $id ) return true;
        $date_specified = false;
        $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $obj->_model,
                                            'object_id' => $id,
                                            'kind' => 'external_preview' ] );
        if ( $meta->id ) {
            $app->ctx->vars['_externalpreview_specified'] = true;
            if ( $date_expires = $meta->text ) {
                $y = substr( $date_expires, 0, 4 );
                $m = substr( $date_expires, 4, 2 );
                $d = substr( $date_expires, 6, 2 );
                if ( checkdate( $m, $d, $y ) ) {
                    $h = substr( $date_expires, 8, 2 );
                    $t = substr( $date_expires, 10, 2 );
                    $app->ctx->vars['_externalpreview_date_expires'] = "{$y}-{$m}-{$d}";
                    $app->ctx->vars['_externalpreview_time_expires'] = "{$h}:{$t}";
                    $date_specified = true;
                }
            }
            $app->ctx->vars['_externalpreview_password'] = $meta->blob;
        }
        if (! $date_specified ) {
            $default_expires = $this->get_config_value( 'externalpreview_default_expires', $workspace_id );
            $default_expires .= '';
            if ( ctype_digit( (string) $default_expires ) ) {
                $expires = date('Y-m-d H:i', strtotime("+{$default_expires} day"));
                list( $d, $t ) = explode( ' ', $expires );
                $app->ctx->vars['_externalpreview_date_expires'] = $d;
                $app->ctx->vars['_externalpreview_time_expires'] = $t;
            }
        }
        $externalpreview_pw_kind = $this->get_config_value( 'externalpreview_pw_kind', $workspace_id );
        $status_published = $app->status_published( $model );
        $app->ctx->vars['_externalpreview_status_published'] = $status_published;
        $app->ctx->vars['_externalpreview_pw_kind'] = $externalpreview_pw_kind;
        // $include = $this->path() . DS . 'tmpl' . DS . 'screen_footer.tmpl';
        $include = $app->ctx->get_template_path( 'external_preview_footer.tmpl' );
        $include = file_get_contents( $include );
        $tmpl = preg_replace( '/<\/form>/', "{$include}</form>", $tmpl );
        return true;
    }
}