<?php
class urlinfo extends PADOBaseModel {

    const URLINFO_BINARY = ['url', 'dirname', 'relative_url', 'relative_path', 'file_path'];

    private $objects = [];

    function remove ( $force = false, $skip_empty = false ) {
        $db = $this->_pado;
        $app = $db->app;
        if (!$force && !$skip_empty && $this->model && $this->object_id && $this->file_path && $this->urlmapping_id ) {
            if ( $app->db->model( $this->model )->has_column( 'status' ) ) {
                if ( $map = $this->urlmapping ) {
                    $active_ui_check = true;
                    if ( $app->id === 'Prototype' && $app->mode === 'delete' && $app->param( '_model' ) === 'urlmapping' ) {
                        $urlmapping_ids = is_array( $app->param( 'id' ) ) ? $app->param( 'id' ) : [ $app->param( 'id' ) ];
                        if ( in_array( $this->urlmapping_id, $urlmapping_ids ) ) {
                            $active_ui_check = false;
                        }
                    }
                    if ( $active_ui_check && $app->db->model( $this->model )->has_column( 'status' ) ) {
                        $cols = 'id,status';
                        if ( strpos( $map->mapping, '<' ) !== false ) {
                            $cols = $app->core_tags->select_cols( $app, $app->db->model( $this->model ), '*' );
                        }
                        $published = $app->status_published( $this->model );
                        $obj = $app->db->model( $this->model )->load( ['id' => $this->object_id, 'status' => $published ], null, $cols );
                        if (!empty( $obj ) ) {
                            $obj = $obj[0];
                            // Object status is published.
                            $table = strpos( $map->mapping, '<' ) !== false ? $app->get_table( $this->model ) : null;
                            $path = $app->build_path_with_map( $obj, $map, $table, $this->archive_date );
                            if ( $this->file_path === $path ) {
                                // This is an active archive's URL.
                                trigger_error( "Attempted to delete an object that should not be deleted(ID:{$this->id})" );
                                return false;
                            }
                        }
                    }
                }
            }
        }
        if ( $this->class == 'archive' ) {
            // Replace the menu items.
            $relations = $db->model( 'relation' )->load( ['to_obj' => 'urlinfo', 'to_id' => $this->id ] );
            if (! empty( $relations ) ) {
                $url_relations = [];
                foreach ( $relations as $relation ) {
                    $relation->_url = $this;
                    $url_relations[] = $relation;
                }
                unset( $relations );
                $app->url_relations = array_merge( $url_relations, $app->url_relations );
            }
        }
        if ( $this->file_path ) {
            $file_path = $this->file_path;
            $file_path = str_replace( '/', DS, $file_path );
            if ( file_exists( $file_path ) && !is_dir( $file_path ) ) {
                if ( $this->id ) {
                    $existing = $this->count( ['file_path' => $this->file_path, 'id' => ['!=' => $this->id ] ] );
                    if ( $existing ) {
                        // Existing active other archive or file's url.
                        return parent::remove();
                    }
                }
                $dirname = dirname( $file_path );
                $app->remove_dirs[ $dirname ] = $dirname;
                $app->fmgr->unlink( $file_path, $this );
                if (! $force && $this->class == 'archive' && $this->publish_file == 4 && !$this->delete_flag ) {
                    // Queue
                    if ( $this->url ) {
                        $this->dirname( dirname( $this->url ) . '/' );
                    }
                    $this->delete_flag( 1 );
                    $this->is_published( 1 );
                    $this->filemtime( time() );
                    return parent::save();
                }
            }
        }
        if (! $force ) {
            if ( $this->url ) {
                $this->dirname( dirname( $this->url ) . '/' );
            }
            $this->delete_flag( 1 );
            $this->is_published( 0 );
            return parent::save();
        } else if ( $this->meta_id ) {
            $meta = $app->db->model( 'meta' )->load( (int) $this->meta_id, null, 'id' );
            if ( $meta ) {
                $meta->remove();
            }
        }
        $update_urls = $app->update_urls;
        if (! empty( $update_urls ) ) {
            unset( $update_urls[ $this->id ] );
            $app->update_urls = $update_urls;
        }
        return parent::remove();
    }

    function remove_multi ( $objs ) {
        $db = $this->_pado;
        $app = $db->app;
        $update_urls = $app->update_urls;
        if (! empty( $update_urls ) ) {
            foreach ( $objs as $obj ) {
                unset( $update_urls[ $obj->id ] );
            }
            $app->update_urls = $update_urls;
        }
        return parent::remove_multi( $objs );
    }

    function save () {
        if (! $this->url ) return false;
        $file_path = $this->file_path;
        $db = $this->_pado;
        $app = $db->app;
        if ( $file_path && strpos( $file_path, '..' ) !== false ) {
            if ( $app->path_verify ) {
                $file_path = PTUtil::rel2abs( $file_path );
                $this->file_path( $file_path );
                if ( $this->url ) $this->url( PTUtil::rel2abs( $this->url ) );
                if ( $this->relative_url ) $this->relative_url( PTUtil::rel2abs( $this->relative_url ) );
            }
        }
        if ( is_dir( $file_path ) ) {
            return false;
        }
        if ( file_exists( $file_path ) ) {
            $this->filemtime( filemtime( $file_path ) );
        } else {
            $this->filemtime( time() );
        }
        $this->dirname( dirname( $this->url ) . '/' );
        if ( $this->dirname == 'https:/' || $this->dirname == 'https:/' ) {
            $url = $this;
            if ( $this->id && $this->workspace_id === null ) {
                $url = $db->model( 'urlinfo' )->load( $this->id );
            }
            $site_url = $url->workspace ? $url->workspace->site_url : $app->site_url;
            $site_url = rtrim( $site_url, '/' ) . '/';
            $this->dirname( $site_url );
        }
        if (! $this->meta_id ) {
            $this->meta_id( 0 );
        }
        if ( $this->publish_file !== null && !$this->publish_file ) {
            if ( $this->class != 'archive' ) {
                $this->publish_file( 0 );
            }
        }
        $this->delete_flag( 0 );
        return parent::save();
    }

    function pre_load ( &$terms = [], &$args = [], &$cols = '*',
        &$extra = '', $ex_vals = [], $include_deleted = false ) {
        if ( $cols && $cols !== '*' ) {
            $db = $this->_pado;
            $app = $db->app;
            if ( $app->id === 'Prototype' && $app->mode === 'delete' && $app->param( '_model' ) === 'urlinfo' ) {
                // In delete from list URL screen.
            } else {
                if ( is_string( $cols ) ) {
                    $cols = explode( ',', $cols );
                }
                if ( is_array( $cols ) ) {
                    // For verifying path.
                    if (! in_array( 'url', $cols ) ) {
                        $cols[] = 'url';
                    }
                    if ( $app->path_verify && ! in_array( 'relative_url', $cols ) ) {
                        $cols[] = 'relative_url';
                    }
                    if (! in_array( 'file_path', $cols ) ) {
                        $cols[] = 'file_path';
                    }
                    // For replace the menu items.
                    if (! in_array( 'class', $cols ) ) {
                        $cols[] = 'class';
                    }
                    // For attempted to delete an object that should not be deleted.
                    if (! in_array( 'model', $cols ) ) {
                        $cols[] = 'model';
                    }
                    if (! in_array( 'object_id', $cols ) ) {
                        $cols[] = 'object_id';
                    }
                    if (! in_array( 'urlmapping_id', $cols ) ) {
                        $cols[] = 'urlmapping_id';
                    }
                }
            }
        }
        if ( $extra === null ) $extra = '';
        if ( is_array( $terms ) && array_key_exists( 'archive_date', $terms ) && !$terms['archive_date'] ) {
            $extra = ' AND urlinfo_archive_date IS NULL ' . $extra;
            unset( $terms['archive_date'] );
        }
        if ( ( is_array( $terms ) && isset( $terms['delete_flag'] ) ) 
            || ( $extra && strpos( $extra, 'delete_flag' ) !== false ) ) {
            if ( isset( $terms['delete_flag'] ) && is_array( $terms['delete_flag'] ) ) {
                if ( strtoupper( key( $terms['delete_flag'] ) ) == 'IN' ) {
                    if ( $terms['delete_flag'][ key( $terms['delete_flag'] ) ] === [0 ,1] ) {
                        unset( $terms['delete_flag'] );
                    }
                }
            } else if ( isset( $terms['delete_flag'] ) && $terms['delete_flag'] === '*' ) {
                unset( $terms['delete_flag'] );
            }
            return;
        }
        if (! $include_deleted ) {
            $extra = ' AND urlinfo_delete_flag=0 ' . $extra;
        } elseif ( is_array( $terms ) ) {
            unset( $terms['delete_flag'] );
        }
    }

    function count ( $terms = [], $args = [], $cols = '*', $extra = '', $ex_vals = [], $include_deleted = false ) {
        return parent::count( $terms, $args, $cols, $extra, $ex_vals, $include_deleted );
    }

    function load ( $terms = [], $args = [], $cols = '*', $extra = '', $ex_vals = [],
        $include_deleted = false ) {
        if ( is_numeric( $terms ) ) {
            $include_deleted = true;
        } else if ( is_array( $terms ) ) {
            $app = $this->_pado->app;
            if ( $app->path_upperlower ) {
                $bin_columns = self::URLINFO_BINARY;
                foreach ( $bin_columns as $bin_column ) {
                    if ( isset( $terms[ $bin_column ] ) && is_string( $terms[ $bin_column ] ) ) {
                        $terms[ $bin_column ] = ['BINARY' => $terms[ $bin_column ] ];
                    }
                }
            }
        }
        $this->pre_load( $terms, $args, $cols, $extra, $ex_vals, $include_deleted );
        return parent::load( $terms, $args, $cols, $extra, $ex_vals );
    }

    function get_by_key ( $terms = [], $args = [], $cols = '*', $extra = '', $ex_vals = [] ) {
        if ( is_array( $terms ) ) {
            $app = $this->_pado->app;
            if ( $app->path_upperlower ) {
                $bin_columns = self::URLINFO_BINARY;
                foreach ( $bin_columns as $bin_column ) {
                    if ( isset( $terms[ $bin_column ] ) && is_string( $terms[ $bin_column ] ) ) {
                        $terms[ $bin_column ] = ['BINARY' => $terms[ $bin_column ] ];
                    }
                }
            }
        }
        return parent::get_by_key( $terms, $args, $cols, $extra, $ex_vals );
    }

    function object ( $cols = '*' ) {
        $object_id = $this->object_id;
        $model = $this->model;
        if ( is_array( $cols ) ) {
            $cols = implode( ',', $cols );
        }
        $obj = $this->objects["{$model}_{$object_id}_{$cols}"] ?? null;
        if ( $obj === false ) {
            return null;
        } else if ( $obj ) {
            return $obj;
        }
        if (! $this->object_id || ! $this->model ) {
            $this->objects["{$model}_{$object_id}_{$cols}"] = false;
            return null;
        }
        $db = $this->_pado;
        $obj = $db->model( $model )->load( $object_id, null, $cols );
        if ( $obj === null ) {
            $this->objects["{$model}_{$object_id}_{$cols}"] = false;
        } else {
            $this->objects["{$model}_{$object_id}_{$cols}"] = $obj;
        }
        return $obj;
    }
}