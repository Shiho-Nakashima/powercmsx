<?php
// cd path/to/powercmsx; sudo -u apache php ./tools/orphanRecords.php --dry_run --interactive --verbose
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit();
}
require_once( 'class.Prototype.php' );
$app = new Prototype( ['id' => 'Worker'] );
$app->logging  = true;
$app->init();
define( 'CACHING', $app->caching );
define( 'DB_CACHING', $app->db_caching );
define( 'QUERY_CACHE', $app->query_cache );
$app->caching = false;
$app->db_caching = false;
$app->db->caching = false;
$app->query_cache = false;
$app->db->query_cache = false;
$do = false;
$dry_run_err = 0;
if (!isset( $argv ) ) {
    $argv = [];
}
$pid = $app->temp_dir . DS . md5( __FILE__ . implode( '', $argv ) ) . '.pid';
if ( file_exists( $pid ) ) {
    $worker_period = $app->worker_period;
    $mtime = filemtime( $pid );
    if ( ( time() - $worker_period ) < $mtime ) {
        echo date( "Y-m-d H:i:s " ), $app->translate( "%s skipped (the file %s already exists).", [ basename( __FILE__ ), $pid ] ), "\n";
        exit();
    }
    unlink( $pid );
}
touch( $pid );
$app->pid = $pid;
array_shift( $argv );
$verbose = in_array( '--verbose', $argv );
$dry_run = in_array( '--dry_run', $argv );
$interactive = in_array( '--interactive', $argv );
$columns = $app->db->model( 'column' )->count_group_by( null, ['group' => ['table_id'] ] );
// Clean up non-existent table columns.
foreach ( $columns as $column ) {
    $table_id = $column['column_table_id'];
    $table = $app->db->model( 'table' )->load( $table_id, null, 'id' );
    if ( $table === null ) {
        $removed_meta = $app->db->model( 'column' )->load( ['table_id' => $table_id ], null, 'id' );
        if (! empty( $removed_meta ) ) {
            if ( $dry_run ) {
                $dry_run_err++;
                echo $app->translate( 'Model (ID:%s) was removed.', $table_id ), PHP_EOL;
                continue;
            }
            if ( $interactive ) {
                echo $app->translate( 'Model (ID:%s) was removed.', $table_id );
                echo $app->translate( 'Are you sure you want to remove related columns? (y/n):' );
                $stdin = strtolower( trim( fgets( STDIN ) ) );
                if ( $stdin != 'y' ) {
                    if ( $stdin == 'c' ) {
                        orphanrecords_exit( $app, $do );
                    }
                    continue;
                }
            }
            $count = count( $removed_meta );
            $app->db->model( 'column' )->remove_multi( $removed_meta );
            $do = true;
            if ( $verbose ) {
                if (! $interactive ) {
                    echo $app->translate( 'Model (ID:%s) was removed.', $table_id );
                }
                echo $app->translate( 'Removed %s orphan records.', $count ), PHP_EOL;
            }
        }
    }
}
// Clean up records associated with nonexistent WorkSpaces.
$columns = $app->db->model( 'column' )->load( ['name' => 'workspace_id'], null, 'table_id' );
$workspace_models = [];
foreach ( $columns as $column ) {
    $table = $app->db->model( 'table' )->load( $column->table_id, null, 'name' );
    if (! $table ) {
        continue;
    }
    $model = $table->name;
    $app->get_scheme_from_db( $model );
    $key = "{$model}_workspace_id";
    $workspace_ids = $app->db->model( $model )->count_group_by( ['workspace_id' => ['>' => 0] ], ['group' => ['workspace_id'] ] );
    foreach ( $workspace_ids as $workspace_id ) {
        $workspace_id = $workspace_id[ $key ];
        $workspace = $app->db->model( 'workspace' )->load( $workspace_id, null, 'id' );
        if ( $workspace === null ) {
            $removed_meta = $app->db->model( $model )->load( ['workspace_id' => $workspace_id ], null, 'id' );
            if (! empty( $removed_meta ) ) {
                if ( $dry_run ) {
                    $dry_run_err++;
                    echo $app->translate( 'WorkSpace (ID:%s) was removed.', $workspace_id ), PHP_EOL;
                    continue;
                }
                if ( $interactive ) {
                    echo $app->translate( 'WorkSpace (ID:%s) was removed.', $workspace_id );
                    echo $app->translate( 'Are you sure you want to remove workspace children? (y/n):' );
                    $stdin = strtolower( trim( fgets( STDIN ) ) );
                    if ( $stdin != 'y' ) {
                        if ( $stdin == 'c' ) {
                            orphanrecords_exit( $app, $do );
                        }
                        continue;
                    }
                }
                $count = count( $removed_meta );
                $app->db->model( $model )->remove_multi( $removed_meta );
                $do = true;
                if ( $verbose ) {
                    if (! $interactive ) {
                       echo $app->translate( 'WorkSpace (ID:%s) was removed.', $workspace_id );
                    }
                    echo $app->translate( 'Removed %s orphan records.', $count ), PHP_EOL;
                }
            }
        }
    }
}
// Clean up mt_meta records associated with non-existing models.
$meta_objs = $app->db->model( 'meta' )->count_group_by( null, ['group' => ['model'] ] );
foreach ( $meta_objs as $model ) {
    $model = $model['meta_model'];
    $table = $app->get_table( $model );
    if (! $table ) {
        $removed_meta = $app->db->model( 'meta' )->load( ['model' => $model ], null, 'id' );
        if (! empty( $removed_meta ) ) {
            if ( $dry_run ) {
                $dry_run_err++;
                echo $app->translate( 'Model %s was removed.', $model ), PHP_EOL;
                continue;
            }
            if ( $interactive ) {
                echo $app->translate( 'Model %s was removed.', $model );
                echo $app->translate( 'Are you sure you want to remove related metadata? (y/n):' );
                $stdin = strtolower( trim( fgets( STDIN ) ) );
                if ( $stdin != 'y' ) {
                    if ( $stdin == 'c' ) {
                        orphanrecords_exit( $app, $do );
                    }
                    continue;
                }
            }
            $count = count( $removed_meta );
            $app->db->model( 'meta' )->remove_multi( $removed_meta );
            $do = true;
            if ( $verbose ) {
                if (! $interactive ) {
                    echo $app->translate( 'Model %s was removed.', $model ), ' ';
                }
                echo $app->translate( 'Removed %s orphan records.', $count ), PHP_EOL;
            }
        }
    }
}
// Clean up mt_meta records associated with non-existing objects.
$meta_objs = $app->db->model( 'meta' )->count_group_by( null, ['group' => ['model', 'object_id'] ] );
foreach ( $meta_objs as $meta ) {
    $model = $meta['meta_model'];
    $app->get_scheme_from_db( $model );
    $id = $meta['meta_object_id'];
    $obj = $app->db->model( $model )->load( $id, null, 'id' );
    if ( $obj === null ) {
        $removed_meta = $app->db->model( 'meta' )->load( ['model' => $model, 'object_id' => $id ], null, 'id' );
        if (! empty( $removed_meta ) ) {
            if ( $dry_run ) {
                $dry_run_err++;
                echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] ), PHP_EOL;
                continue;
            }
            if ( $interactive ) {
                echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] );
                echo $app->translate( 'Are you sure you want to remove related metadata? (y/n):' );
                $stdin = strtolower( trim( fgets( STDIN ) ) );
                if ( $stdin != 'y' ) {
                    if ( $stdin == 'c' ) {
                        orphanrecords_exit( $app, $do );
                    }
                    continue;
                }
            }
            $count = count( $removed_meta );
            $app->db->model( 'meta' )->remove_multi( $removed_meta );
            $do = true;
            if ( $verbose ) {
                if (! $interactive ) {
                    echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] ), ' ';
                }
                echo $app->translate( 'Removed %s orphan records.', $count ), PHP_EOL;
            }
        }
    }
}
// Clean up mt_meta records associated with non-existent objects or binary columns with empty object columns.
$meta_objs = $app->db->model( 'meta' )->load(
    ['kind' => ['IN' => ['metadata', 'thumbnail'] ] ], null, 'id,model,kind,key,object_id,text' );
foreach ( $meta_objs as $meta ) {
    $column = $meta->key;
    $model = $meta->model;
    $kind  = $meta->kind;
    $id = $meta->object_id;
    $text = $meta->text;
    if ( $text && preg_match( '/^\{"file_size":.*?\}$/', $text ) ) { // Custom metadata?
        // Check with regular expression because there is something with key=metadata in the project's customization.
        $app->get_scheme_from_db( $model );
        if ( $app->db->model( $model )->has_column( $column, true ) || $kind === 'thumbnail' ) {
            $obj = $app->db->model( $model )->load( $id, null, "id,{$column}" );
            if (! $obj || ( is_object( $obj ) && ! $obj->$column ) ) {
                // Non-existent object or empty binary column.
                if ( $dry_run ) {
                    $dry_run_err++;
                    echo $app->translate( "Object %s(ID:%s) was removed or column %s is empty.", [ $model, $id, $column ] ), PHP_EOL;
                    continue;
                }
                if ( $interactive ) {
                    echo $app->translate( "Object %s(ID:%s) was removed or column %s is empty.", [ $model, $id, $column ] );
                    echo $app->translate( 'Are you sure you want to remove related metadata? (y/n):' );
                    $stdin = strtolower( trim( fgets( STDIN ) ) );
                    if ( $stdin != 'y' ) {
                        if ( $stdin == 'c' ) {
                            orphanrecords_exit( $app, $do );
                        }
                        continue;
                    }
                }
                $meta->remove();
                $do = true;
                if ( $verbose ) {
                    if (! $interactive ) {
                        echo $app->translate( "Object %s(ID:%s) was removed or column %s is empty.", [ $model, $id, $column ] ), ' ';
                    }
                    echo $app->translate( 'Removed %s orphan records.', 1 ), PHP_EOL;
                }
            }
        }
    }
}
// Clean up duplicate mt_meta records associated with binary columns or delete binary column metadata associated with nonexistent columns.
$meta_objs = $app->db->model( 'meta' )->count_group_by(
  ['kind' => 'metadata', 'text' => ['like' => '{"file_size":%'] ], ['group' => ['model', 'object_id', 'key'] ] );
foreach ( $meta_objs as $meta ) {
    $count = $meta['COUNT(meta_id)'];
    if ( $count > 1 ) {
        $model = $meta['meta_model'];
        $id = $meta['meta_object_id'];
        $key = $meta['meta_key'];
        $removed_meta = $app->db->model( 'meta' )->load(
          ['model' => $model, 'object_id' => $id, 'key' => $key, 'kind' => 'metadata' ],
          ['sort' => 'id', 'direction' => 'descend'], '*' );
        if (!empty( $removed_meta ) ) {
            if ( $dry_run ) {
                $dry_run_err++;
                echo $app->translate( "Object %s(ID:%s)'s column %s's metadata is duplicated.", [ $model, $id, $key ] ), PHP_EOL;
                continue;
            }
            if ( $interactive ) {
                echo $app->translate( "Object %s(ID:%s)'s column %s's metadata is duplicated.", [ $model, $id, $column ] );
                echo $app->translate( 'Are you sure you want to remove related metadata? (y/n):' );
                $stdin = strtolower( trim( fgets( STDIN ) ) );
                if ( $stdin != 'y' ) {
                    if ( $stdin == 'c' ) {
                        orphanrecords_exit( $app, $do );
                    }
                    continue;
                }
            }
            $counter = 0;
            foreach ( $removed_meta as $idx => $removed ) {
                if (! $idx ) {
                    if ( $app->db->model( $model )->has_column( $key, true ) ) {
                        continue; // Keep only the latest.
                    }
                }
                $removed->remove();
                $do = true;
                $counter++;
            }
            if ( $verbose ) {
                if (! $interactive ) {
                    echo $app->translate( "Object %s(ID:%s)'s column %s's metadata is duplicated.", [ $model, $id, $column ] ), ' ';
                }
                echo $app->translate( 'Removed %s orphan records.', $count ), PHP_EOL;
            }
        }
    }
}
// Empty binary columns with no corresponding file.
if ( $app->db->blob2file ) {
    $pfx = DB_PREFIX;
    $base_blob_path = $app->db->blob_path;
    $columns = $app->db->model( 'column' )->count_group_by( ['type' => 'blob'], ['group' => ['table_id'] ] );
    foreach ( $columns as $column ) {
        $table = $app->db->model( 'table' )->load( $column['column_table_id'] );
        if (! $table ) {
            continue;
        }
        $model = $table->name;
        $blob_cols = $app->db->get_blob_cols( $model );
        $blob_cols_short = $app->db->get_blob_cols( $model, true );
        $sql = "SELECT {$model}_id FROM {$pfx}{$model} WHERE ";
        foreach ( $blob_cols as $idx => $blob_col ) {
            $add = " ( {$blob_col}!='' OR {$blob_col} IS NOT NULL) ";
            $sql .= $idx ? " OR {$add} " : $add;
        }
        $objects = $app->db->model( $model )->load( $sql );
        if (! empty( $objects ) ) {
            foreach ( $objects as $obj ) {
                $error = false;
                $obj = $app->db->model( $model )->load( $obj->id );
                $values = $obj->get_values();
                $remove_cols = [];
                foreach ( $blob_cols_short as $idx => $blob_col ) {
                    if (! $obj->$blob_col ) {
                        $value = $values[ $blob_cols[ $idx ] ];
                        if ( strpos( $value, 'a:1:{s:8:"basename";s:' ) === 0 ) {
                            $unserialized = @unserialize( $value );
                            if ( is_array( $unserialized ) 
                                && isset( $unserialized['basename'] ) ) {
                                $basename = $unserialized['basename'];
                                $blob_path = $base_blob_path;
                                $blob_path .= $model;
                                $blob = $blob_path . DS . $basename;
                                if (! file_exists( $blob ) ) {
                                    $remove_cols[] = $blob_col;
                                    $error = true;
                                }
                            }
                        }
                    }
                }
                if ( $error ) {
                    if ( $dry_run ) {
                        $dry_run_err++;
                        echo $app->translate( "Object %s(ID:%s)'s binary file was removed.", [ $model, $obj->id ] ), PHP_EOL;
                        continue;
                    }
                    if ( $interactive ) {
                        echo $app->translate( "Object %s(ID:%s)'s binary file was removed.", [ $model, $obj->id ] );
                        echo $app->translate( 'Are you sure you want to empty this column(s) in the object? (y/n):' );
                        $stdin = strtolower( trim( fgets( STDIN ) ) );
                        if ( $stdin != 'y' ) {
                            if ( $stdin == 'c' ) {
                                orphanrecords_exit( $app, $do );
                            }
                            continue;
                        }
                    }
                    foreach ( $remove_cols as $remove_col ) {
                        $obj->$remove_col( '' );
                    }
                    $obj->save();
                }
            }
        }
    }
}
// Remove binary column metadata associated with non-existing objects (by from_obj, from_id).
$relations = $app->db->model( 'relation' )->count_group_by( null, ['group' => ['from_obj', 'from_id'] ] );
foreach ( $relations as $relation ) {
    $model = $relation['relation_from_obj'];
    $app->get_scheme_from_db( $model );
    $id = $relation['relation_from_id'];
    $obj = $app->db->model( $model )->load( $id, null, 'id' );
    if (! $obj ) {
        $removed_meta = $app->db->model( 'relation' )->load( ['from_obj' => $model, 'from_id' => $id ] );
        if (! empty( $removed_meta ) ) {
            if ( $dry_run ) {
                $dry_run_err++;
                echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] ), PHP_EOL;
                continue;
            }
            if ( $interactive ) {
                echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] );
                echo $app->translate( 'Are you sure you want to remove related metadata? (y/n):' );
                $stdin = strtolower( trim( fgets( STDIN ) ) );
                if ( $stdin != 'y' ) {
                    if ( $stdin == 'c' ) {
                        orphanrecords_exit( $app, $do );
                    }
                    continue;
                }
            }
            $count = count( $removed_meta );
            $app->db->model( 'relation' )->remove_multi( $removed_meta );
            $do = true;
            if ( $verbose ) {
                if (! $interactive ) {
                    echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] ), ' ';
                }
                echo $app->translate( 'Removed %s orphan records.', $count ), PHP_EOL;
            }
        }
    }
}
// Remove binary column metadata associated with non-existing objects (by to_obj, to_id).
$relations = $app->db->model( 'relation' )->count_group_by( null, ['group' => ['to_obj', 'to_id'] ] );
foreach ( $relations as $relation ) {
    $model = $relation['relation_to_obj'];
    $id = $relation['relation_to_id'];
    $app->get_scheme_from_db( $model );
    $obj = $app->db->model( $model )->load( $id, null, 'id' );
    if (! $obj ) {
        $removed_meta = $app->db->model( 'relation' )->load( ['to_obj' => $model, 'to_id' => $id ] );
        if (! empty( $removed_meta ) ) {
            if ( $dry_run ) {
                $dry_run_err++;
                echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] ), PHP_EOL;
                continue;
            }
            if ( $interactive ) {
                echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] );
                echo $app->translate( 'Are you sure you want to remove related metadata? (y/n):' );
                $stdin = strtolower( trim( fgets( STDIN ) ) );
                if ( $stdin != 'y' ) {
                    if ( $stdin == 'c' ) {
                        orphanrecords_exit( $app, $do );
                    }
                    continue;
                }
            }
            $count = count( $removed_meta );
            $app->db->model( 'relation' )->remove_multi( $removed_meta );
            $do = true;
            if ( $verbose ) {
                if (! $interactive ) {
                    echo $app->translate( 'Object %s(ID:%s) was removed.', [ $model, $id ] ), ' ';
                }
                echo $app->translate( 'Removed %s orphan records.', $count ), PHP_EOL;
            }
        }
    }
}
if (!$do && !$dry_run ) {
    echo $app->translate( 'Orphan record was not found.' ), PHP_EOL;
} else if ( $dry_run_err ) {
    if ( $dry_run_err == 1 ) {
        echo $app->translate( 'Orphan 1 record was found.' ), PHP_EOL;
    } else {
        echo $app->translate( 'Orphan %s record were found.', $dry_run_err ), PHP_EOL;
    }
}
orphanrecords_exit( $app, $do );

function orphanrecords_exit ( $app, $do = false ) {
    if ( $do ) {
        $app->caching = CACHING;
        $app->db_caching = DB_CACHING;
        $app->db->caching = DB_CACHING;
        $app->query_cache = QUERY_CACHE;
        $app->db->query_cache = QUERY_CACHE;
        $app->clear_all_cache( false, null, true );
    }
    exit();
}