<?php

if (! defined( 'MB_ENCODE_NUMERICENTITY_MAP' ) ) {
    define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );
}

use Gt\CssXPath\Translator;

function ptutil_auto_loader( $class ) {
    $path = $class;
    $path = str_replace( '\\', DS, $path ) . '.php';
    if ( file_exists( LIB_DIR . $path ) ) {
        include_once( LIB_DIR . $path );
        return;
    }
    if ( stripos( $class, 'SebastianBergmann' ) !== false ) {
        $base_dir = LIB_DIR . 'SebastianBergmann' . DS . 'Diff' . DS;
        if ( substr( $class, -9 ) === 'Exception' ) {
            $base_dir .= 'Exception' . DS;
        }
        $paths = explode( '\\', $class );
        $basename = $paths[ count( $paths ) - 1] . '.php';
        foreach ( glob("{$base_dir}*.php") as $filename ) {
            if ( $basename === basename( $filename ) ) {
                include_once( $filename );
                break;
            }
        }
        return;
    } else if ( $class === 'Gt\CssXPath\Translator' ) {
        include_once( LIB_DIR . 'CssXPath' . DS . 'Translator.php' );
    }
}
spl_autoload_register( '\ptutil_auto_loader' );

class PTUtil {

    public static $list_options = [];
    public static $option_items = [];
    public static $magic_tokens = [];

    public static function mkpath ( $path, $mode = 0777 ) {
        if ( is_dir( $path ) ) return true;
        return mkdir( $path, $mode, true );
    }

    public static function start_end_month ( $ts ) {
        $y = substr( $ts, 0, 4 );
        $m = substr( $ts, 4, 2 );
        $start = sprintf( '%04d%02d01000000', $y, $m );
        $end   = sprintf( '%04d%02d%02d235959', $y, $m,
                 date( 't', mktime( 0, 0, 0, $m, 1, $y ) ) );
        return [ $start, $end ];
    }

    public static function start_end_week ( $ts ) {
        $time = strtotime( $ts );
        $weekNo = date('w', $time );
        $start = date( 'YmdHis', strtotime("-{$weekNo} day", $time ) );
        $daysLeft = 6 - $weekNo;
        $end = date('Ymd235959', strtotime("+{$daysLeft} day", $time ) );
        return [ $start, $end ];
    }

    public static function setup_terms ( $obj, &$terms = [] ) {
        $app = Prototype::get_instance();
        if ( $obj->has_column( 'workspace_id' ) ) {
            $terms['workspace_id'] = $obj->workspace_id;
        }
        if ( $obj->has_column( 'status' ) ) {
            $status_published = $app->status_published( $obj->_model );
            $terms['status'] = $status_published;
        }
        if ( $obj->has_column( 'rev_type' ) ) {
            $terms['rev_type'] = 0;
        }
        return $terms;
    }

    public static function current_ts ( $ts = null ) {
        $ts = $ts ? $ts : time();
        return date( 'YmdHis', $ts );
    }

    public static function sec2hms ( $seconds, $digits = 1 ) {
        if ( is_string( $seconds ) ) {
            $seconds = (int) $seconds;
        }
        if ( $digits === true ) {
            if ( $seconds < 3600 ) {
                $hours = 0;
            } else {
                $hours = floor( $seconds / 3600 );
            }
            if ( $seconds < 60 ) {
                $minutes = 0;
            } else {
                $tmp = floor( $seconds / 60 );
                $minutes = floor( $tmp % 60 );
                // $minutes = floor( ( $seconds / 60 ) % 60 );
            }
            $seconds = $seconds % 60;
            return [ $hours, $minutes, $seconds ];
        }
        $seconds = (string) $seconds;
        $decimal = str_repeat( '0', $digits );
        if ( strpos( $seconds, '.' ) !== false ) {
            list( $seconds, $decimal ) = explode( '.', $seconds );
        }
        $hours = floor( $seconds / 3600 );
        $min = $seconds / 60;
        $min = (int) $min;
        $min = $min % 60;
        $min = (int) $min;
        $minutes = floor( $min );
        $seconds = $seconds % 60;
        $hms = sprintf( '%02d:%02d:%02d', $hours, $minutes, $seconds );
        $decimal = substr( $decimal, 0, $digits );
        $decimal = str_pad( $decimal, $digits, STR_PAD_RIGHT );
        $hms .= '.' . $decimal;
        return $hms;
    }

    public static function hms2sec ( $hms ) {
        $t = explode( ':', $hms );
        $h = (int) $t[0];
        if ( isset( $t[1] ) ) {
            $m = (int) $t[1];
        } else {
            $m = 0;
        }
        if ( isset( $t[2] ) ) {
            $s = (float) $t[2];
        } else {
            $s = 0;
        }
        $seconds = ( $h * 60 * 60 ) + ( $m * 60 ) + $s;
        return $seconds;
    }

    public static function clone_object ( $app, $obj, $strict = true ) {
        $app->get_scheme_from_db( $obj->_model );
        $clone = clone $obj;
        $clone->id( null );
        $blob_cols = $app->db->get_blob_cols( $obj->_model, true );
        foreach ( $blob_cols as $col ) {
            $clone->$col( $obj->$col );
        }
        $table = $app->get_table( $obj->_model );
        if (! $app->param( 'as_revision' ) && ! $app->param( '_save_as_revision' ) ) {
            $columns = $app->db->model( 'column' )->load(
              ['table_id' => $table->id, 'unique' => 1] );
            foreach ( $columns as $column ) {
                $col_name = $column->name;
                if ( $column->type == 'string' || $column->type == 'text' ) {
                    $orig_value = $clone->$col_name;
                    if ( $orig_value ) {
                        $new_value = $app->translate( 'Clone of %s', $orig_value );
                        $duplicate_terms = [ $col_name => $new_value ];
                        if ( $table->revisable ) {
                            $duplicate_terms['rev_type'] = 0;
                        }
                        if ( $obj->has_column( 'workspace_id' ) ) {
                            $duplicate_terms['workspace_id'] = (int) $obj->workspace_id;
                        }
                        $compare = $app->db->model( $obj->_model )->get_by_key( $duplicate_terms );
                        if ( $compare->id ) {
                            $is_unique = false;
                            $counter = 1;
                            while ( $is_unique === false ) {
                                $duplicate_terms[ $col_name ] = $new_value . " ($counter)";
                                $compare = $app->db->model( $obj->_model )->get_by_key( $duplicate_terms );
                                if (! $compare->id ) {
                                    $is_unique = true;
                                    $new_value = $new_value . " ($counter)";
                                    break;
                                }
                                $counter++;
                                if ( $counter > 3000 ) {
                                    return $app->error( $app->translate(
                                    'A %1$s with the same %2$s already exists.',
                                    [ $new_value, $app->translate( $table->label ) ] ) );
                                }
                            }
                        }
                        $clone->$col_name( $new_value );
                    }
                } else if ( $column->type == 'int' ) {
                    $duplicate_terms = [];
                    if ( $table->revisable ) {
                        $duplicate_terms['rev_type'] = 0;
                    }
                    if ( $obj->has_column( 'workspace_id' ) ) {
                        $duplicate_terms['workspace_id'] = (int) $obj->workspace_id;
                    }
                    $maxObj = $app->db->model( $obj->_model )->load(
                      $duplicate_terms, ['sort' => $col_name, 'direction' => 'descend', 'limit' => 1],
                      "id,$col_name" );
                    if ( count( $maxObj ) ) {
                        $maxObj = $maxObj[0];
                        $clone->$col_name( $maxObj->$col_name + 1 );
                    }
                }
            }
        }
        if ( $app->mode !== 'clone_object' && $obj->has_column( 'order' ) ) {
            $maxObj = $app->db->model( $obj->_model )->load(
              [], ['sort' => 'order', 'direction' => 'descend', 'limit' => 1],
              "id,order" );
            if ( count( $maxObj ) ) {
                $maxObj = $maxObj[0];
                $clone->order( $maxObj->order + 1 );
            }
        }
        if ( $obj->has_column( 'uuid' ) ) {
            $clone->uuid( $app->generate_uuid() );
        }
        if (! $strict ) {
            if ( $obj->has_column( 'status' ) ) {
                $workspace = $obj->workspace;
                if ( $app->user() ) {
                    $max_status = $app->max_status( $app->user(), $obj->_model, $workspace );
                    if ( $obj->status > $max_status ) {
                        $clone->status( $max_status );
                    }
                }
                $status_published = $app->status_published( $obj->_model );
                if ( $obj->status == $status_published ) {
                    if ( $status_published == 4 ) {
                        $clone->status = '0';
                    } else {
                        $clone->status( 1 );
                    }
                }
            }
            if ( $obj->has_column( 'created_by' ) ) {
                $clone->created_by('');
            }
            if ( $obj->has_column( 'modified_by' ) ) {
                $clone->modified_by('');
            }
            if ( $obj->has_column( 'created_on' ) ) {
                $clone->created_on('');
            }
            if ( $obj->has_column( 'modified_on' ) ) {
                $clone->modified_on('');
            }
            if ( $obj->has_column( 'previous_owner' ) ) {
                $clone->previous_owner('');
            }
            if ( $app->user() && $clone->has_column( 'user_id' ) ) {
                $clone->user_id( $app->user()->id );
            }
            $app->set_default( $clone, $app->rebasename_clone );
        }
        if ( $obj->has_column( 'rev_type', true ) && !$clone->rev_type ) {
            $clone->rev_type( 0 );
        }
        if ( $obj->has_column( 'published_on' ) ) {
            $duplicate_a_date = true;
            $duplicate_key = 'duplicate_a_' . $obj->_model . '_date';
            if ( self::property_exists( $app, $duplicate_key ) ) {
                $duplicate_a_date = $app->$duplicate_key;
            } else {
                $duplicate_a_date = $app->duplicate_a_date;
            }
            if (! $duplicate_a_date ) {
                $clone->published_on( $app->date( 'YmdHis', $clone ) );
                if ( $clone->has_column( 'unpublished_on' ) ) {
                    $clone->has_deadline( 0 );
                    $clone->unpublished_on( '' );
                }
            }
        }
        $clone->save();
        $orig_relations = $app->get_relations( $obj );
        $orig_metadata  = $app->get_meta( $obj );
        foreach ( $orig_relations as $relation ) {
            if ( $relation->to_obj != 'attachmentfile' ) {
                $rel = clone $relation;
                $rel->id( null );
                $rel->from_id = $clone->id;
                $rel->save();
            }
        }
        foreach ( $orig_metadata as $metadata ) {
            $meta = clone $metadata;
            $meta->id( null );
            $meta->object_id = $clone->id;
            $meta->save();
        }
        self::attachments_to_clone( $app, $obj, $clone );
        return $clone;
    }

    public static function count_date_based ( $app, $mapping, $ts = null, $context = null ) {
        if ( get_class( $app ) == 'urlmapping' ) {
            $context = $ts;
            $ts = $mapping;
            $mapping = $app;
            $app = Prototype::get_instance();
        }
        $msg = '';
        $ts = preg_replace( '/[^0-9]/', '', $ts );
        if (! $app->is_valid_ts( $ts, $msg ) ) {
            return false;
        }
        $model = $mapping->container;
        if (! $model ) {
            return false;
        }
        $date_based = $mapping->date_based;
        if (! $date_based ) {
            return false;
        }
        $table = $app->get_table( $model );
        if (! $table ) {
            return false;
        }
        $obj = $app->db->model( $model );
        $date_col = $app->get_date_col( $obj );
        if (! $date_col ) {
            return false;
        }
        $ts = $obj->ts2db( $ts );
        $start = strtotime( $ts ) - 1;
        if ( stripos( $date_based, 'Monthly' ) ) {
            $ts_end = date( 'Y-m-d H:i:s', strtotime( '+1 month', $start ) );
        } else if ( stripos( $date_based, 'Daily' ) ) {
            $ts_end = date( 'Y-m-d H:i:s', strtotime( '+1 day', $start ) );
        } else {
            $ts_end = date( 'Y-m-d H:i:s', strtotime( '+1 year', $start ) );
        }
        $terms = [ $date_col => ['BETWEEN' => [ $ts, $ts_end ] ] ];
        $archive_type = $mapping->model;
        if ( $archive_type !== 'template' && is_object( $context ) ) {
            $scheme = $app->get_scheme_from_db( $model );
            $relation = false;
            if ( isset( $scheme['relations'] ) ) {
                if ( in_array( $archive_type, array_values( $scheme['relations'] ) ) ) {
                    $relation = true;
                }
            }
            if (! $relation ) {
                $column = $app->db->model( 'column' )->get_by_key(
                    ['rel_model' => $archive_type, 'table_id' => $table->id ], null, 'name' );
                if ( $column->id ) {
                    $terms[ $column->name ] = $context->id;
                }
            } else {
                $relations = $app->db->model( 'relation' )->load_iter(
                    ['to_id' => $context->id, 'to_model' => $archive_type,
                     'from_obj' => $model ], null, 'from_id' );
                $ids = $relations->fetchAll( PDO::FETCH_COLUMN );
                if (! empty( $ids ) ) {
                    $terms['id'] = ['IN' => $ids ];
                }
            }
        }
        if ( $obj->has_column( 'status' ) ) {
            $status_published = $app->status_published( $model );
            if ( $status_published ) {
                $terms['status'] = $status_published;
            }
        }
        if ( $obj->has_column( 'rev_type' ) ) {
            $terms['rev_type'] = 0;
        }
        if ( $obj->has_column( 'workspace_id' ) ) {
            if (! $mapping->container_scope && ! $mapping->workspace_id ) { // all
            } else if ( $obj->workspace_id ) {
                $terms['workspace_id'] = (int) $mapping->workspace_id;
            }
        }
        $count = $obj->count( $terms );
        return $count;
    }

    public static function workflow_users ( $app, $workflow = null ) {
        if ( get_class( $app ) == 'PADOMySQL' ) {
            $workflow = $app;
            $app = Prototype::get_instance();
        }
        $params = ['lock_out' => 0];
        $args['published_only'] = true;
        $users_draft =
            $app->get_related_objs( $workflow, 'user', 'users_draft', $args, $params );
        $users_review =
            $app->get_related_objs( $workflow, 'user', 'users_review', $args, $params );
        $users_publish =
            $app->get_related_objs( $workflow, 'user', 'users_publish', $args, $params );
        $users = array_merge( $users_draft, $users_review, $users_publish );
        return $users;
    }

    public static function locale_from_csv ( $locale, $name ) {
        if (! is_dir( $locale ) ) {
            return false;
        }
        $counter = 0;
        if ( $handle = opendir( $locale ) ) {
            $app = Prototype::get_instance();
            $db = $app->db;
            while ( false !== ( $entry = readdir( $handle ) ) ) {
                if ( strpos( $entry, '.' ) === 0 ) continue;
                $file = $locale . DS . $entry;
                $extension = pathinfo( $file )['extension'];
                if ( $extension != 'csv' ) continue;
                $content = file_get_contents( $file );
                $encoding = mb_detect_encoding( $content );
                if ( $encoding != 'UTF-8' ) {
                    $content = mb_convert_encoding( $content, 'UTF-8', 'Shift_JIS' );
                }
                $content = preg_replace( "/\r\n|\r|\n/", PHP_EOL, $content );
                $lines = explode( PHP_EOL, $content );
                $lang = basename( $entry, '.csv' );
                foreach ( $lines as $line ) {
                    if (! $line ) continue;
                    $valus = str_getcsv( $line );
                    list ( $phrase, $trans ) = $valus;
                    $phrase = $db->model( 'phrase' )->get_by_key
                    ( ['phrase' => ['BINARY' => $phrase ], 'lang' => $lang ] );
                    $phrase->trans( $trans );
                    $phrase->component( $name );
                    $app->set_default( $phrase );
                    $phrase->save();
                    $counter++;
                }
            }
        }
        return $counter;
    }

    public static function mb_urlencode( $url ) {
        return preg_replace_callback( '/[^\x21-\x7e]+/',
            function( $matches ) {
                return urlencode( $matches[0] );
            }, $url );
    }

    public static function object_diff ( $app, $obj1, $obj2, $excludes = [], $changed_cols = [] ) {
        $renderer = null;
        $scheme = $app->get_scheme_from_db( $obj1->_model );
        $properties = $scheme['edit_properties'];
        $column_defs = $scheme['column_defs'];
        $values  = $obj1->get_values();
        $values2 = $obj2->get_values(); // bug : specify blob2file
        $prefix  = $obj1->_colprefix;
        $excludes = array_merge( $excludes,
                    ['id', 'uuid', 'rev_type', 'rev_object_id', 'rev_changed', 'rev_diff',
                     'compiled', 'status', 'created_on', 'modified_on', 'created_by',
                     'modified_by', 'last_update', 'cache_key', 'last_compiled'] );
        $excludes = array_unique( $excludes );
        foreach ( $values as $key => $value1 ) {
            if ( is_array( $value1 ) ) continue;
            $value2 = isset( $values2[ $key ] ) ? $values2[ $key ] : $obj2->$key;
            $key = preg_replace( "/^$prefix/", '' , $key );
            if ( in_array( $key, $excludes ) ) continue;
            $prop = isset( $properties[ $key ] ) ? $properties[ $key ] : '' ;
            if ( $prop && $prop === 'password' ) continue;
            $type = isset( $column_defs[ $key ] ) ? $column_defs[ $key ] : '';
            if ( isset( $type['type'] ) && strpos( $type['type'], 'int' ) !== false ) {
                $value1 = (int) $value1;
                $value2 = (int) $value2;
            }
            if ( is_array( $type ) ) {
                $type = $type['type'];
                // $value2 = $obj2->$key; // bug : specify blob2file
                if ( $type == 'blob' ) {
                    if ( is_object( $value1 ) && property_exists( $value1, 'value' ) ) {
                        $value1 = $value1->value;
                    }
                    if ( is_object( $value2 ) && property_exists( $value2, 'value' ) ) {
                        $value2 = $value2->value;
                    }
                    $value1 = $value1 ? base64_encode( $value1 ) : '';
                    $value2 = $value2 ? base64_encode( $value2 ) : '';
                } else if ( $type == 'datetime' ) {
                    $value1 = $value1 ? $obj1->ts2db( $value1 ) : '';
                    $value2 = $value2 ? $obj2->ts2db( $value2 ) : '';
                }
                $diff = self::diff( $value1, $value2, $renderer );
                if ( $diff ) {
                    if ( $type == 'blob' ) {
                        $changed_cols[ $key ] = true;
                    } else {
                        $changed_cols[ $key ] = $diff;
                    }
                }
            }
        }
        self::get_relation_diff( $app, $obj1, $obj2, $changed_cols );
        self::get_relation_diff( $app, $obj2, $obj1, $changed_cols );
        self::get_meta_diff( $app, $obj1, $obj2, $changed_cols );
        self::get_meta_diff( $app, $obj2, $obj1, $changed_cols );
        return $changed_cols;
    }

    public static function get_meta_diff ( $app, $obj1, $obj2,
        &$changed_cols = [] ) {
        if (! $obj2->id ) {
            return $changed_cols;
        }
        $blobs = ['blob', 'data', 'metadata'];
        $metadata1 = $app->get_meta( $obj1 );
        foreach ( $metadata1 as $rel ) {
            if ( isset( $changed_cols[ $rel->key ] ) ) continue;
            $terms = ['model' => $rel->model, 'kind' => $rel->kind,
                      'key' => $rel->key,'object_id' => $obj2->id ];
            if ( $rel->type ) $terms['type'] = $rel->type;
            if ( $rel->field_id ) $terms['field_id'] = $rel->field_id;
            if ( $rel->number ) $terms['number'] = $rel->number;
            $comp = $app->db->model( 'meta' )->get_by_key( $terms );
            if (! $comp->id ) {
                if ( $rel->kind != 'thumbnail' ) {
                    $changed_cols[ $rel->key ] = true;
                }
            } else {
                if ( $rel->text != $comp->text ) {
                    $changed_cols[ $rel->key ] = true;
                } else {
                    foreach ( $blobs as $blob ) {
                        if ( $rel->$blob || $comp->$blob ) {
                            $value1 = base64_encode( $rel->$blob );
                            $value2 = base64_encode( $comp->$blob );
                            if ( $value1 != $value2 ) {
                                $changed_cols[ $rel->key ] = true;
                                break;
                            }
                        }
                    }
                }
            }
        }
        return $changed_cols;
    }

    public static function get_relation_diff ( $app, $obj1, $obj2,
        &$changed_cols = [] ) {
        if (! $obj2->id ) {
            return $changed_cols;
        }
        $relations1 = $app->get_relations( $obj1 );
        foreach ( $relations1 as $rel ) {
            if ( isset( $changed_cols[ $rel->name ] ) ) continue;
            $comp = $app->db->model( 'relation' )->get_by_key(
                ['name' => $rel->name, 'from_obj' => $rel->from_obj,
                 'to_obj' => $rel->to_obj, 'to_id' => $rel->to_id,
                 'from_id' => $obj2->id, 'order' => $rel->order ] );
            if (! $comp->id ) {
                $changed_cols[ $rel->name ] = true;
            }
        }
        return $changed_cols;
    }

    public static function attachments_to_clone ( $app, $obj, $clone ) {
        $scheme = $app->get_scheme_from_db( $obj->_model );
        $attachment_cols = self::attachment_cols( $obj->_model, $scheme );
        $updated = false;
        foreach ( $attachment_cols as $col ) {
            if ( $obj->$col ) {
                $attachmentfile =
                    $app->db->model( 'attachmentfile' )->load( (int) $obj->$col );
                if ( $attachmentfile ) {
                    $orig_id = $attachmentfile->id;
                    $attach_clone = self::clone_object( $app, $attachmentfile );
                    if ( $clone->has_column( 'status' ) ) {
                        $attach_clone->status( $clone->status );
                    } else {
                        $attach_clone->status(0);
                    }
                    $attach_clone->save();
                    $clone->$col( $attach_clone->id );
                    $app->publish_obj( $attach_clone, null, false, true );
                    $updated = true;
                }
            }
        }
        if ( $updated ) {
            $clone->save();
        }
        $to_ids = [];
        $relations = $app->get_relations( $obj, 'attachmentfile' );
        if ( empty( $relations ) ) {
            return;
        }
        $rel_to_ids = [];
        foreach ( $relations as $meta ) {
            $file_id = (int) $meta->to_id;
            $attachment = $app->db->model( 'attachmentfile' )->load( $file_id );
            if (! $attachment ) continue;
            $attach_clone = self::clone_object( $app, $attachment );
            if ( $clone->has_column( 'status' ) ) {
                $attach_clone->status( $clone->status );
            } else {
                $attach_clone->status(0);
            }
            $attach_clone->save();
            $app->publish_obj( $attach_clone, null, false, true );
            $name = $meta->name;
            if ( isset( $rel_to_ids[ $name ] ) ) {
                $rel_to_ids[ $name ][] = (int) $attach_clone->id;
            } else {
                $rel_to_ids[ $name ] = [ (int) $attach_clone->id ];
            }
        }
        if (! empty( $rel_to_ids ) ) {
            foreach ( $rel_to_ids as $name => $to_ids ) {
                $args = ['from_id' => $clone->id,
                         'name' => $name,
                         'from_obj' => $clone->_model,
                         'to_obj' => 'attachmentfile'];
                $app->set_relations( $args, $to_ids );
            }
        }
    }

    public static function attachment_cols ( $model, $scheme = null, $type = 'int' ) {
        $app = Prototype::get_instance();
        $scheme = $scheme ? $scheme : $app->get_scheme_from_db( $model );
        $properties = $scheme['edit_properties'];
        $column_defs = $scheme['column_defs'];
        $attachment_cols = [];
        foreach ( $properties as $key => $prop ) {
            $col_type = $column_defs[ $key ]['type'];
            if ( $col_type == $type ) {
                if ( strpos( $prop, 'relation:attachmentfile:' ) === 0 ) {
                    $attachment_cols[] = $key;
                }
            }
        }
        return $attachment_cols;
    }

    public static function session_to_attachmentfile ( $sess, $obj, $i = 1 ) {
        $app = Prototype::get_instance();
        $tmp_obj = $app->db->model( 'attachmentfile' )->new();
        $tmp_obj->file( $sess->data );
        $meta = json_decode( $sess->text, true );
        $tmp_obj->name( $meta['file_name'] );
        $tmp_obj->mime_type( $meta['mime_type'] );
        $tmp_obj->class( $meta['class'] );
        $tmp_obj->size( $meta['file_size'] );
        $app->set_default( $tmp_obj );
        if ( $obj->has_column( 'status' ) ) {
            $tmp_obj->status( $obj->status );
        }
        $tmp_id = $obj->id * 20 + $i;
        $tmp_id *= -1;
        $tmp_obj->id( $tmp_id );
        $tmp_obj->_meta = $meta;
        $tmp_obj->__session = $sess;
        return $tmp_obj;
    }

    public static function set_tags ( $obj, $tags, $model = 'tag' ) {
        $app = Prototype::get_instance();
        $app->db->register_callback( $obj->_model, '__set_tags', 'set_tag_objects', 100, new PTUtil() );
        return $obj->__set_tags( $obj, $tags, $model, false );
    }

    public static function add_tags ( $obj, $tags, $model = 'tag' ) {
        $app = Prototype::get_instance();
        $app->db->register_callback( $obj->_model, '__set_tags', 'set_tag_objects', 100, new PTUtil() );
        return $obj->__set_tags( $obj, $tags, $model, true );
    }

    function set_tag_objects ( $cb, $pado, $obj ) {
        $app = $pado->app;
        $args = $cb['args'];
        $tags = $args[1];
        $tag_model = $args[2];
        $tag_obj = $pado->model( $tag_model );
        $add_only = $cb['args'][3] ?? false;
        if (! $obj->id ) {
            return false;
        }
        $scheme = $app->get_scheme_from_db( $obj->_model );
        $relations = $scheme['relations'] ?? null;
        if (! $relations ) {
            return false;
        }
        $relation_name = array_search( $tag_model, $relations );
        if (! $relation_name ) {
            return false;
        }
        $tag_ids = [];
        foreach ( $tags as $tag ) {
            if ( is_object( $tag ) ) {
                if ( $tag->id ) {
                    $tag_ids[] = $tag->id;
                }
                continue;
            }
            $tag = PTUtil::normalize( $tag );
            $normalize = PTUtil::normalize_tag( $tag );
            if (!$normalize ) continue;
            $terms = ['normalize' => $normalize ];
            if ( $tag_model === 'tag' ) {
                $terms['class'] = $obj->_model;
            }
            if ( $tag_obj->has_column( 'workspace_id', true ) ) {
                if ( $obj->has_column( 'workspace_id', true ) && $obj->workspace_id ) {
                    $terms['workspace_id'] = (int) $obj->workspace_id;
                } else {
                    $terms['workspace_id'] = 0;
                }
            }
            $tag_obj = $tag_obj->get_by_key( $terms );
            if (!$tag_obj->id ) {
                $tag_obj->name( $tag );
                $app->set_default( $tag_obj );
                $order = $app->get_order( $tag_obj );
                $tag_obj->order( $order );
                $tag_obj->save();
            }
            $tag_ids[] = $tag_obj->id;
        }
        if (! empty( $tag_ids ) ) {
            $args = ['from_id' => $obj->id, 
                     'name' => $relation_name,
                     'from_obj' => $obj->_model,
                     'to_obj' => $tag_model ];
            $app->set_relations( $args, $tag_ids, $add_only );
            return true;
        }
        return false;
    }

    public static function pack_revision ( $obj, &$original, &$changed_cols = [] ) {
        $app = Prototype::get_instance();
        $cleanup_blob = $app->db->cleanup_blob;
        $app->db->cleanup_blob = false;
        $obj->_pado = $app->db;
        $obj->_pado->cleanup_blob = false;
        $original->_pado = $app->db;
        $original->_pado->cleanup_blob = false;
        $scheme = $app->get_scheme_from_db( $obj->_model );
        $columns = $scheme['column_defs'];
        $properties = $scheme['edit_properties'];
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $values = $obj->get_values();
        $renderer = null;
        $excludes = ['id', 'uuid', 'rev_type', 'rev_object_id', 'rev_changed', 'rev_diff',
                     'created_on', 'modified_on', 'created_by', 'modified_by', 'password',
                     'rev_note', 'user_id', 'previous_owner', 'published_on',
                     'compiled', 'cache_key', 'status', 'text_format', 'last_compiled'];
        $obj->_relations = $obj->_relations
                          ? $obj->_relations : $app->get_relations( $obj );
        if ( is_array( $obj->_relations ) && is_array( $original->_relations ) ) {
            $orig_rels = $original->_relations;
            $obj_rels = $obj->_relations;
            $orig_rel_keys = [];
            $obj_rel_keys = [];
            foreach ( $orig_rels as $orig_rel ) {
                $rel_key = $orig_rel->name . ':'
                     . $orig_rel->to_obj . ':' . $orig_rel->to_id;
                $orig_rel_keys[] = $rel_key;
            }
            foreach ( $obj_rels as $obj_rel ) {
                $rel_key = $obj_rel->name . ':'
                     . $obj_rel->to_obj . ':' . $obj_rel->to_id;
                $obj_rel_keys[] = $rel_key;
            }
            foreach ( $orig_rel_keys as $rel_key ) {
                if (! in_array( $rel_key, $obj_rel_keys ) ) {
                    $changed_cols[ explode( ':', $rel_key )[0] ] = true;
                }
            }
            foreach ( $obj_rel_keys as $rel_key ) {
                if (! in_array( $rel_key, $orig_rel_keys ) ) {
                    $changed_cols[ explode( ':', $rel_key )[0] ] = true;
                }
            }
        }
        $obj->_meta = $obj->_meta
                     ? $obj->_meta : $app->get_meta( $obj );
        $data_blobs = [];
        $meta_blobs = [];
        if ( is_array( $obj->_meta ) && is_array( $original->_meta ) ) {
            $orig_metadata = $original->_meta;
            $obj_metadata = $obj->_meta;
            $orig_fields = [];
            $obj_fields = [];
            $orig_meta_files = [];
            $orig_meta_labels = [];
            $obj_meta_files = [];
            $obj_meta_labels = [];
            foreach ( $orig_metadata as $orig_meta ) {
                if ( $orig_meta->kind == 'customfield' ) {
                    $field_basename = $orig_meta->key . '__c';
                    $orig_fields[ $field_basename ][ $orig_meta->number ]
                        = $orig_meta->text;
                } else if ( $orig_meta->kind == 'metadata'
                    && strpos( $orig_meta->text, '{"file_size":' ) === 0 ) {
                    $key = $orig_meta->key;
                    $json = json_decode( $orig_meta->text, true );
                    $orig_meta_files[ $key ] = isset( $json['file_name'] )
                        ? $json['file_name'] : '';
                    $orig_meta_labels[ $key ] = isset( $json['label'] )
                        ? $json['label'] : '';
                }
            }
            foreach ( $obj_metadata as $obj_meta ) {
                if ( $obj_meta->kind == 'customfield' ) {
                    $field_basename = $obj_meta->key . '__c';
                    $obj_fields[ $field_basename ][ $obj_meta->number ]
                        = $obj_meta->text;
                } else if ( $obj_meta->kind == 'metadata'
                    && strpos( $obj_meta->text, '{"file_size":' ) === 0 ) {
                    $key = $obj_meta->key;
                    $json = json_decode( $obj_meta->text, true );
                    $obj_meta_files[ $key ] = isset( $json['file_name'] )
                        ? $json['file_name'] : '';
                    $obj_meta_labels[ $key ] = isset( $json['label'] )
                        ? $json['label'] : '';
                }
            }
            foreach ( $orig_fields as $basename => $field_vars ) {
                foreach ( $field_vars as $number => $text ) {
                    $comp = '';
                    if (! isset( $obj_fields[ $basename ] )
                        || ! isset( $obj_fields[ $basename ][ $number ] ) ) {
                    } else {
                        $comp = $obj_fields[ $basename ][ $number ];
                    }
                    if ( $comp != $text ) {
                        $changed_cols["{$basename}__{$number}"] =
                            self::diff( $text, $comp, $renderer );
                    }
                }
            }
            foreach ( $obj_fields as $basename => $field_vars ) {
                foreach ( $field_vars as $number => $text ) {
                    $comp = '';
                    if (! isset( $orig_fields[ $basename ] )
                        || ! isset( $orig_fields[ $basename ][ $number ] ) ) {
                    } else {
                        $comp = $orig_fields[ $basename ][ $number ];
                    }
                    if ( $comp != $text && ! isset( $changed_cols["{$basename}__{$number}"] ) ) {
                        $changed_cols["{$basename}__{$number}"] =
                            self::diff( $comp, $text, $renderer );
                    }
                }
            }
            foreach ( $orig_meta_files as $col => $field_var ) {
                $comp = isset( $obj_meta_files[ $col ] ) ? $obj_meta_files[ $col ] : '';
                if ( $field_var != $comp ) {
                    $changed_cols["{$col}__filename"] =
                        self::diff( $field_var, $comp, $renderer );
                }
            }
            foreach ( $orig_meta_labels as $col => $field_var ) {
                $comp = isset( $obj_meta_labels[ $col ] ) ? $obj_meta_labels[ $col ] : '';
                if ( $field_var != $comp ) {
                    $changed_cols["{$col}__filelabel"] =
                        self::diff( $field_var, $comp, $renderer );
                }
            }
            foreach ( $obj_meta_files as $col => $field_var ) {
                $comp = isset( $orig_meta_files[ $col ] ) ? $orig_meta_files[ $col ] : '';
                if ( $field_var != $comp && !isset( $changed_cols["{$col}__filename"] ) ) {
                    $changed_cols["{$col}__filename"] =
                        self::diff( $comp, $field_var, $renderer );
                }
            }
            foreach ( $obj_meta_labels as $col => $field_var ) {
                $comp = isset( $orig_meta_labels[ $col ] ) ? $orig_meta_labels[ $col ] : '';
                if ( $field_var != $comp && !isset( $changed_cols["{$col}__filelabel"] ) ) {
                    $changed_cols["{$col}__filelabel"] =
                        self::diff( $comp, $field_var, $renderer );
                }
            }
        }
        $attachment_cols = self::attachment_cols( $obj->_model, $scheme );
        foreach( $columns as $col => $props ) {
            if ( isset( $relations[ $col ] ) ) {
                continue;
            } else if ( in_array( $col, $excludes ) ) {
                continue;
            }
            $type = $props['type'];
            $comp_old = $original->$col;
            $prop = isset( $properties[ $col ] ) ? isset( $properties[ $col ] ) : '' ;
            $comp_new = $obj->$col;
            if (! $comp_old ) $comp_old = '';
            if (! $comp_new ) $comp_new = '';
            if ( $type != 'blob' ) {
                $comp_old = preg_replace( "/\r\n|\r/","\n", $comp_old );
                $comp_new = preg_replace( "/\r\n|\r/","\n", $comp_new );
                $comp_old = rtrim( $comp_old );
                $comp_new = rtrim( $comp_new );
            }
            if ( $type === 'datetime' ) {
                $comp_old = preg_replace( '/[^0-9]/', '', $comp_old );
                $comp_old = (int) $comp_old;
                $comp_new = preg_replace( '/[^0-9]/', '', $comp_new );
                $comp_new = (int) $comp_new;
            } else if ( strpos( $type, 'int' ) !== false ) {
                $comp_new = (int) $comp_new;
                $comp_old = (int) $comp_old;
            } else if ( $type === 'blob' ) {
                $comp_new = base64_encode( $comp_new );
                $comp_old = base64_encode( $comp_old );
            }
            if ( $comp_old != $comp_new ) {
                if ( $type == 'blob' ) {
                    $changed_cols[ $col ] = true;
                } else {
                    if (! in_array( $col, $attachment_cols ) ) {
                        $changed_cols[ $col ] =
                            self::diff( $comp_old, $comp_new, $renderer );
                    }
                }
            }
        }
        if ( empty( $changed_cols ) && !$app->param( '_apply_to_master' ) ) {
            if (! $obj->rev_note && $app->param( '__rev_note' ) ) {
                $obj->rev_note( $app->param( '__rev_note' ) );
                $obj->save();
            }
        } else {
            $original->rev_type( 1 );
            $original->rev_object_id( $obj->id );
            $changed = array_keys( $changed_cols );
            $original->rev_changed( join( ', ', $changed ) );
            $original->rev_diff( json_encode( $changed_cols,
                                 JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
            // $original->id( null );
            if ( $original->has_column( 'status' ) ) {
                $original->status( 0 );
            }
            $original_id = $original->id;
            if ( $original_id ) {
                $rem_rels = $app->get_relations( $original );
                if (!empty( $rem_rels ) ) {
                    $app->db->model( 'relation' )->remove_multi( $rem_rels );
                }
            }
            $original->save();
            if ( $orig_relations = $original->_relations ) {
                foreach ( $orig_relations as $relation ) {
                    $rel_rev = clone $relation;
                    $rel_rev->id( null );
                    $rel_rev->from_id = $original->id;
                    if ( $rel_rev->to_obj == 'attachmentfile' ) {
                        $file =
                            $app->db->model( 'attachmentfile' )->load( (int) $rel_rev->to_id );
                        if ( $file ) {
                            $clone_file = self::clone_object( $app, $file );
                            $clone_file->status( 0 );
                            $clone_file->file( $file->file );
                            $clone_file->save();
                            $rel_rev->to_id( $clone_file->id );
                        }
                    }
                    $rel_rev->save();
                }
            }
            if ( $original_id ) {
                $rem_meta = $app->get_meta( $original );
                if (!empty( $rem_meta ) ) {
                    $app->db->model( 'meta' )->remove_multi( $rem_meta );
                }
            }
            if ( $orig_metadata = $original->_meta ) {
                $has_assets_c = false;
                foreach ( $orig_metadata as $meta ) {
                    $meta_rev = clone $meta;
                    $meta_rev->id( null );
                    $meta_rev->object_id( $original->id );
                    $meta_rev->save();
                    if (! $has_assets_c && $app->assets_c && $meta_rev->kind === 'metadata' ) {
                        $json = json_decode( $meta_rev->text );
                        if ( $json->class === 'image' ) {
                            $has_assets_c = self::create_assets_c( $app, $original, $meta_rev );
                        }
                    }
                }
            }
            foreach ( $attachment_cols as $attachment_col ) {
                if ( $original->$attachment_col ) {
                    $file =
                        $app->db->model( 'attachmentfile' )->load(
                          (int) $original->$attachment_col, [], 'id,status' );
                    if ( $file && $file->status != 0 ) {
                        $file->status( 0 );
                        $file->save();
                    }
                }
            }
            $table = $app->get_table( $obj->_model );
            if ( $table->max_revisions !== null && $table->max_revisions < 1 ) {
                $_remove_async = $app->remove_async;
                $app->remove_async = true;
                $app->remove_object( $original );
                $app->remove_async = $_remove_async;
            }
            $app->db->cleanup_blob = $cleanup_blob;
            return true;
        }
        $app->db->cleanup_blob = $cleanup_blob;
        return false;
    }

    public static function diff ( $source, $change, &$differ = null ) {
        if ( $source === null ) $source = '';
        if ( $change === null ) $change = '';
        $source = str_replace( ['\r\n', '\r', '\n'], '\n', $source );
        $change = str_replace( ['\r\n', '\r', '\n'], '\n', $change );
        if ( $source != $change ) {
            if (! $differ ) { // --- Original\n+++ New\n
                $builder = new \SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder( "", true );
                $differ = new \SebastianBergmann\Diff\Differ( $builder );
            }
            return $differ->diff( $source, $change );
        }
        return '';
    }

    public static function remove_dir ( $dir, $children = false, $fmgr = null, $app = null, $recursive = false ) {
        $app = $app ? $app : Prototype::get_instance();
        if (! $fmgr ) {
            $fmgr = $app->fmgr;
        }
        $dir = rtrim( $dir, DS );
        if (! self::is_removable( $dir, $children ) ) {
            return false;
        }
        if (! is_dir( $dir ) ) return false;
        if (! $recursive ) {
            $tmp_dir = $app->upload_dir( true, true, true );
            if ( strpos( $dir, $tmp_dir ) !== 0 ) {
                $upload_dir = $app->upload_dir( true, true );
                if ( $fmgr->rename( $dir, $upload_dir ) ) {
                    if ( $children ) {
                        $fmgr->mkpath( $dir );
                        $children = false;
                    }
                    $dir = $upload_dir;
                }
            }
        }
        if ( is_dir( $dir ) ) {
            if ( $handle = opendir( $dir ) ) {
                while ( false !== ( $item = readdir( $handle ) ) ) {
                    if ( $item != '.' && $item != '..' ) {
                        if ( is_dir( $dir . DS . $item ) ) {
                            self::remove_dir( $dir . DS . $item, false, $fmgr, $app, true );
                        } else {
                            $file = $dir . DS . $item;
                            @unlink( $file );
                        }
                    }
                }
                closedir( $handle );
                if ( $children ) return true;
                if ( is_dir( $dir ) ) {
                    return @rmdir( $dir );
                }
            }
        }
        return true;
    }

    public static function magic ( $length = 10, $content = '' ) {
        $magic = substr(
        str_shuffle( 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, $length );
        if ( isset( self::$magic_tokens[ $magic ] ) ) {
            return static::magic( $length, $content );
        } else if ( stripos( $content, $magic ) !== false ) {
            return static::magic( $length, $content );
        }
        self::$magic_tokens[ $magic ] = true;
        return $magic;
    }

    public static function remove_empty_dirs ( $dirs ) {
        if ( empty( $dirs ) ) {
            return false;
        }
        if ( array_values( $dirs ) !== $dirs ) {
            $dirs = array_keys( $dirs );
        }
        $does_act = false;
        foreach ( $dirs as $dir ) {
            if ( is_dir( $dir ) && count( glob( $dir . "/*" ) ) == 0 ) {
                if ( self::is_dir_empty( $dir ) ) {
                    if (! self::is_removable( $dir ) ) {
                        continue;
                    }
                    @rmdir( $dir );
                    $does_act = true;
                }
            }
        }
        return $does_act;
    }

    public static function is_removable ( $dir, $children = false ) {
        $app = Prototype::get_instance();
        if ( strpos( $dir, realpath( $app->temp_dir ) ) === 0 ) {
            return true;
        }
        if ( strpos( $dir, realpath( $app->support_dir ) ) === 0 ) {
            return true;
        }
        if (! $app->app_protect ) return true;
        $dir = rtrim( $dir, DS );
        $app_path = $app->pt_dir;
        if ( strpos( $dir, $app_path . DS . 'cache' ) === 0 ) {
            return true;
        }
        if ( $app->id === 'Prototype' && ! empty( $app->theme_paths ) ) {
            if ( $app->mode === 'theme_setting' || $app->mode === 'manage_theme' ||
               ( $app->mode === 'save' && $app->param( '_model' ) == 'template' ) ) {
                foreach ( $app->theme_paths as $theme_path ) {
                    if ( strpos( $dir, realpath( $theme_path ) ) === 0 ) {
                        return true;
                    }
                }
            }
        }
        if ( strpos( $dir, $app_path ) === 0 ) {
            return false;
        }
        if ( !$children ) {
            if ( $dir === $app->site_path ) {
                return false;
            }
            if ( $app->workspace() && $app->workspace()->site_path === $dir ) {
                return false;
            }
        }
        return true;
    }

    public static function is_dir_empty ( $dir ) {
        if (!is_readable( $dir ) ) return NULL;
        $handle = opendir( $dir );
        while ( false !== ( $entry = readdir( $handle ) ) ) {
            if ( $entry != '.' && $entry != '..' ) {
                return false;
            }
        }
        return true;
    }

    public static function make_basename ( $obj, $basename = '', $unique = false ) {
        $app = Prototype::get_instance();
        $basename_len = $app->basename_len;
        $table = $app->get_table( $obj->_model );
        if (! $basename ) {
            $primary = $table->primary;
            $basename = $obj->$primary;
            if ( $obj->_model == 'attachmentfile' ) {
                // Keep attachmentfile name.
                $basename = preg_replace( '/\.[^\.]*$/', '', $basename );
            }
        }
        if (! $basename ) $basename = $obj->_model;
        if ( $basename && is_array( $app->no_genarate_basename )
            && in_array( $obj->_model, $app->no_genarate_basename ) ) {
            return $basename;
        }
        if (! $app->basename_upper_lower ) {
            $basename = strtolower( $basename );
        }
        if ( preg_match( "/^[^A-Za-z0-9\-]+$/", $basename ) ) {
            $basename = '';
        } else {
            $sep = $app->basename_separator ? $app->basename_separator : '_';
            if ( $sep === '_' ) {
                $basename = preg_replace( "/[^A-Za-z0-9\-]/", ' ', $basename );
            } else {
                $basename = preg_replace( "/[^A-Za-z0-9\-_]/", ' ', $basename );
            }
            $basename = preg_replace( "/\s{1,}/", ' ', $basename );
            $basename = trim( $basename );
            $basename = str_replace( ' ', $sep, $basename );
        }
        $basename = mb_substr( $basename, 0, $basename_len, $app->db->charset );
        if ( $unique && $table->allow_identical ) {
            if (! $obj->id ) {
                $obj = clone $obj; // In create new object.
                $obj->id( -1 );
            }
            $unique = false;
            $permalink = $app->get_permalink( $obj );
            if ( $permalink ) {
                $url = $app->db->model( 'urlinfo' )->get_by_key(
                  ['url' => $permalink, 'delete_flag' => 0, 'model' => $obj->_model ] );
                if ( $url->id && $url->object_id != $obj->id ) {
                    $unique = true;
                }
            }
        }
        if (! $basename ) $basename = $obj->_model;
        if ( $unique ) {
            $terms = [];
            if ( $obj->id ) {
                $terms['id'] = ['!=' => (int)$obj->id ];
            }
            if ( $obj->has_column( 'workspace_id' ) && $obj->_model != 'field' ) {
                $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
                if (! $workspace_id && $app->workspace() ) {
                    $workspace_id = $app->workspace()->id;
                }
                $terms['workspace_id'] = $workspace_id;
            }
            if ( $obj->has_column( 'rev_type' ) ) {
                $terms['rev_type'] = 0;
            }
            if ( $app->template_basename_by_class && $obj->_model === 'template' && $obj->class ) {
                $terms['class'] = $obj->class;
            }
            $terms['basename'] = $basename;
            $i = 1;
            $is_unique = false;
            $new_basename = $basename;
            while ( $is_unique === false ) {
                $exists = $app->db->model( $obj->_model )->load( $terms );
                if (! $exists ) {
                    $is_unique = true;
                    $basename = $new_basename;
                    break;
                } else {
                    $len = mb_strlen( $basename . '_' . $i );
                    if ( $len > $basename_len ) {
                        $diff = $len - $basename_len;
                        $basename = mb_substr(
                            $basename, 0, $basename_len - $diff, $app->db->charset );
                    }
                    $new_basename = $basename . '_' . $i;
                    $terms['basename'] = $new_basename;
                }
                $i++;
            }
        }
        return $basename;
    }

    public static function thumbnail_url ( $obj, &$args, $assetproperty = null, $retry = false ) {
        $app = Prototype::get_instance();
        $name = isset( $args['name'] ) ? $args['name'] : 'file';
        $name = strtolower( $name );
        if (! $obj->has_column( $name ) ) {
            return '';
        }
        $force = $app->force_thumbnail;
        if (! $force ) {
            $force = isset( $args['force'] );
        }
        $fmgr = $app->fmgr;
        $orig_args = $args;
        $keep_ctx = false;
        if ( is_object( $assetproperty ) ) {
            if ( get_class( $assetproperty ) === 'PAML' ) {
                $ctx = $assetproperty;
                $keep_ctx = true;
            } else {
                $ctx = $app->ctx;
            }
            $assetproperty = null;
        } else {
            $ctx = $app->ctx;
        }
        $orig_property = $assetproperty;
        $thumb = null;
        $id = $obj->id;
        $width = isset( $args['width'] ) ? (int) $args['width'] : '';
        $height = isset( $args['height'] ) ? (int) $args['height'] : '';
        $args_width = $width;
        $args_height = $height;
        $square = isset( $args['square'] ) ? $args['square'] : false;
        $scale = isset( $args['scale'] ) ? (int) $args['scale'] : '';
        $model = isset( $args['model'] ) ? $args['model'] : $obj->_model;
        $add_basename = isset( $args['add_basename'] ) ? $args['add_basename'] : '';
        $keep_aspect = isset( $args['keep_aspect'] ) ? true : false;
        $fit = isset( $args['fit'] ) ? $args['fit'] : false;
        if ( isset( $args['fit'] ) && !$fit ) {
            $fit = "1";
        }
        $aspect = isset( $args['aspect'] ) ? $args['aspect'] : false;
        $trim = isset( $args['trim'] );
        $mimetype = isset( $args['mime_type'] ) ? $args['mime_type'] : '';
        $max = isset( $args['max'] ) ? $args['max'] : false;
        $properties = isset( $args['properties'] ) ? $args['properties'] : false;
        $model = strtolower( $model );
        $workspace_id = $obj->has_column( 'workspace_id' ) ? (int) $obj->workspace_id : 0;
        if ( $scale ) {
            if ( $width ) $width = round( $width * $scale / 100 );
            if ( $height ) $height = round( $height * $scale / 100 );
        }
        $modified_on = null;
        if ( $obj->has_column( 'modified_on' ) ) {
            if ( !$obj->modified_on ) {
                $cols = "id,{$name}";
                $add_cols = ['modified_on', 'workspace_id', 'status', 'mime_type'];
                foreach ( $add_cols as $add ) {
                    if ( $obj->has_column( $add ) ) {
                        $cols .= ",{$add}";
                    }
                }
                $obj = $obj->get_by_key( ['id' => $obj->id ], [], $cols );
                if (! $obj->$name ) return '';
            }
            $modified_on = $obj->modified_on;
            $modified_on = $obj->db2ts( $modified_on );
        }
        if (! $modified_on ) {
            $url = $app->db->model( 'urlinfo' )->get_by_key(
                  ['model' => $model, 'object_id' => $obj->id, 'class' => 'file',
                   'key' => $name ], null, 'id,file_path' );
            if ( $url->id ) {
                $file_path = $url->file_path;
                if ( $fmgr->exists( $file_path ) ) {
                    $mtime = filemtime( $file_path );
                    $modified_on = date( 'YmdHis', $mtime );
                }
            }
        }
        if (! $modified_on ) {
            $force = true;
        }
        if (! $assetproperty ) $assetproperty = $app->get_assetproperty( $obj, $name );
        if ( empty( $assetproperty ) ) {
            return '';
        }
        $basename = $assetproperty['basename'];
        $extension = $assetproperty['extension'];
        $output_ext = isset( $args['extension'] ) ? $args['extension'] : $extension;
        if ( $assetproperty['class'] != 'image' ) {
            return '';
        }
        $thumbnail_basename = 'thumb';
        if ( $model != 'asset' ) {
            $thumbnail_basename .= "-{$model}";
        }
        if ( $width && !$height ) {
            $thumbnail_basename .= "-{$width}xauto";
        } else if (!$width && $height ) {
            $thumbnail_basename .= "-autox{$height}";
        } else if ( $width && $height ) {
            $thumbnail_basename .= "-{$width}x{$height}";
        }
        if ( $square ) {
            $thumbnail_basename .= '-square';
        }
        $use_imagine = $app->use_imagine;
        if ( $aspect !== false ) {
            if ( strpos( $aspect, ':' ) !== false ) {
                $aspect = str_replace( ':', 'x', $aspect );
            }
            if (! preg_match( '/^[0-9]+x[0-9]+$/', $aspect ) ) {
                $aspect = false;
            }
        }
        if ( $trim && !$fit ) {
            $fit = "1";
        }
        if ( $fit !== false && ( $aspect || $square ) ) {
            $thumbnail_basename .= $trim ? '-trim' : '-fit';
            if ( is_string( $fit ) && preg_match('/^#[a-f0-9]{6}$/i', $fit ) ) {
                $thumbnail_basename .= '-' . str_replace( '#', '', strtolower( $fit ) );
            }
            $use_imagine = false;
            if ( $aspect !== false ) {
                $thumbnail_basename .= '-aspect-' . $aspect;
            }
        }
        if ( $keep_aspect && $width && $height ) {
            $thumbnail_basename .= '-k-a';
            $use_imagine = false;
        }
        if ( $max && is_numeric( $max ) ) {
            $thumbnail_basename .= '-max-' . $max;
        }
        $thumbnail_basename .= "-{$id}";
        if ( $add_basename ) {
            $thumbnail_basename .= "-{$add_basename}";
        }
        $thumbnail_name = "{$thumbnail_basename}-{$name}.{$output_ext}";
        $site_path = $app->site_path;
        $extra_path = $app->extra_path;
        $site_url = $app->site_url;
        $asset_publish = $app->asset_publish;
        if ( $workspace = $obj->workspace ) {
            $site_path = $workspace->site_path;
            $extra_path = $workspace->extra_path;
            $site_url = $workspace->site_url;
            $asset_publish = $workspace->asset_publish;
        }
        $relative_path = '%r' . DS;
        $relative_url =
            preg_replace( '!^https{0,1}:\/\/.*?\/!', '/', $site_url );
        $relative_url .= $extra_path;
        $relative_url = rtrim( $relative_url, '/' );
        $relative_url .= '/thumbnails/' . $thumbnail_name;
        $relative_path .= $extra_path;
        $relative_path = rtrim( $relative_path, DS );
        $relative_path .= DS . 'thumbnails' . DS . $thumbnail_name;
        $asset_url = rtrim( $site_url, '/' );
        $asset_url .= '/' . $extra_path;
        $asset_url = rtrim( $asset_url, '/' );
        $asset_url .= '/thumbnails/' . $thumbnail_name;
        $asset_path = rtrim( $site_path, DS );
        $asset_path = $asset_path . DS . $extra_path;
        $asset_path = rtrim( $asset_path, DS );
        $asset_path .= DS . 'thumbnails' . DS . $thumbnail_name;
        if ( isset( $args['path'] ) && $args['path'] ) {
            return $asset_path;
        } else if ( isset( $args['url'] ) && $args['url'] ) {
            return $asset_url;
        }
        $metadata = $app->db->model( 'meta' )->get_by_key( [
            'object_id' => $id, 'model' => $model,
            'kind' => 'thumbnail', 'key' => $name, 'value' => $thumbnail_basename ],
            ['sort' => 'id', 'direction' => 'descend'], 'id,text' );
        $uploaded = 0;
        if ( $metadata->text ) {
            $thumb_props = json_decode( $metadata->text, true );
            $uploaded = $thumb_props['uploaded'];
            $uploaded = $obj->db2ts( $uploaded );
        }
        $wants = false;
        if ( isset( $orig_args['wants'] ) && $orig_args['wants'] == 'data' ) {
            $wants = true;
        }
        if ( $obj->id && $obj->has_column( 'status' ) && $obj->status === null ) {
            $obj = $obj->load( $obj->id );
        }
        $status_published = $app->status_published( $model );
        $logging = $app->logging;
        $app->logging = false;
        $error_reporting = ini_get( 'error_reporting' );
        error_reporting(0);
        $hash = '';
        if ( $fmgr->exists( $asset_path ) ) {
            $uploaded = date( 'YmdHis', filemtime( $asset_path ) );
        }
        if (! $uploaded ) {
            $force = true;
        }
        $asset_path_base = preg_replace( '/\.[^\.]*$/', '.', $asset_path );
        $info = $app->db->model( 'urlinfo' )->get_by_key(
          ['file_path' => $asset_path, 'delete_flag' => [0, 1],
           'object_id' => $id, 'model' => $model, 'class' => 'file',
           'key' => 'thumbnail', 'workspace_id' => $workspace_id ],
           ['sort' => 'delete_flag', 'direction' => 'ascend'] );
        if ( $app->param( '_preview' ) ) {
            $force = true;
        }
        if ( $force || (! $metadata->id || $modified_on > $uploaded || $wants ) ) {
            if (! $obj->$name ) {
                $cols = "id,{$name}";
                $add_cols = ['modified_on', 'workspace_id', 'status', 'mime_type'];
                foreach ( $add_cols as $add ) {
                    if ( $obj->has_column( $add ) ) {
                        $cols .= ",{$add}";
                    }
                }
                $obj = $obj->get_by_key( ['id' => $obj->id ], [], $cols );
            }
            if ( $obj->$name === null ) {
                // Lost file when specifying PADO_DB_BLOB2FILE setting.
                $url = $app->db->model( 'urlinfo' )->get_by_key(
                  ['object_id' => $obj->id, 'model' => $obj->_model, 'key' => $name, 'class' => 'file'] );
                if ( $url->id && $app->fmgr->exists( $url->file_path ) ) {
                    $obj->$name( $app->fmgr->get( $url->file_path ) );
                    $obj->save();
                }
            }
            if (! $obj->$name ) return '';
            // $ctx->stash( 'current_context', $model );
            // $ctx->stash( $model, $obj );
            $args = ['model' => $model, 'name' => $name, 'id' => $id ];
            $args['width'] = $width;
            $args['height'] = $height;
            $args['square'] = $square;
            $args['scale'] = $scale;
            $meta = [];
            $upload_dir = $app->upload_dir();
            $file = $upload_dir . DS . $obj->id . ".{$extension}";
            $data = $obj->$name;
            $data = $name == 'file_path' && strpos( $data, DS ) !== false
                  && is_string( $data ) && is_file( $data ) && $fmgr->exists( $data )
                  ? $fmgr->get( $obj->$name ) : $data;
            // Error use $fmgr->put when fmgr_delayed specified.
            $delayed = $fmgr->delayed;
            $fmgr->delayed = false;
            $fmgr->put( $file, $data );
            $fmgr->delayed = $delayed;
            $getimagesize = getimagesize( $file );
            list( $w, $h ) = $getimagesize;
            if ( $max && is_numeric( $max ) ) {
                if ( $w > $h ) {
                    $args['width'] = $max;
                    $width = $max;
                    unset( $args['height'] );
                    $sc = $max/ $w;
                    $height = $h * $sc;
                    $height = (int) $height;
                    if (! $height ) {
                        $height = 1;
                    }
                } else {
                    $args['height'] = $max;
                    $height = $max;
                    unset( $args['width'] );
                    $sc = $max/ $h;
                    $width = $w * $sc;
                    $width = (int) $width;
                    if (! $width ) {
                        $width = 1;
                    }
                }
            }
            if (! $width || ! $height ) {
                if ( $scale ) {
                    $scale = $scale * 0.01;
                    $height = round( $h * $scale );
                    $width = round( $w * $scale );
                } else {
                    if ( $width ) {
                        if ( $square ) {
                            $height = $width;
                        } else {
                            $scale = $width / $w;
                            $height = round( $h * $scale );
                        }
                    } else if ( $height ) {
                        if ( $square ) {
                            $width = $height;
                        } else {
                            $scale = $height / $h;
                            $width = round( $w * $scale );
                        }
                    }
                }
            }
            if ( $square ) {
                if ( $height && $width > $height ) {
                    $width = $height;
                } else {
                    $height = $width;
                }
            }
            $width = (int) $width;
            $height = (int) $height;
            if ( $width <= 0 || $height <= 0 ) {
                return '';
            }
            $meta['image_width'] = $width;
            $meta['image_height'] = $height;
            if ( $extension === 'webp' && self::is_webp_animated( $file ) ) {
                $use_imagine = false;
            }
            if (! $use_imagine ) {
                $quality = $app->image_quality;
                if ( $output_ext === $extension ) {
                    switch ( $extension ) {
                        case 'jpg':
                            $src_func = 'imagecreatefromjpeg';
                            $out_func = 'imagejpeg';
                            break;
                        case 'jpeg':
                            $src_func = 'imagecreatefromjpeg';
                            $out_func = 'imagejpeg';
                            break;
                        case 'gif':
                            $src_func = 'imagecreatefromgif';
                            $out_func = 'imagegif';
                            $quality = null;
                            break;
                        case 'png':
                            $src_func = 'imagecreatefrompng';
                            $out_func = 'imagepng';
                            if ( $quality >= 10 ) {
                                $quality *= 0.1;
                                $quality = (int) $quality;
                                if ( $quality > 9 ) {
                                    $quality = 0;
                                }
                            } else if ( $quality == 0 ) {
                                $quality = 9;
                            }
                            break;
                        case 'webp':
                            $src_func = 'imagecreatefromwebp';
                            $out_func = 'imagewebp';
                            break;
                        default:
                            return '';
                    }
                    if ( $app->get_image_src_func ) {
                        $src_func = self::get_src_func( $file );
                        if (! $src_func ) {
                            if ( isset( $args['path'] ) && $args['path'] ) {
                                return $asset_path;
                            } else {
                                return $asset_url;
                            }
                        }
                    }
                    if ( $src_func === 'imagecreatefromwebp' ) {
                        if ( self::is_webp_animated( $file ) ) {
                            $src_func = '';
                        }
                    }
                } else {
                    switch ( $output_ext ) {
                        case 'jpg':
                            $out_func = 'imagejpeg';
                            break;
                        case 'jpeg':
                            $out_func = 'imagejpeg';
                            break;
                        case 'gif':
                            $out_func = 'imagegif';
                            $quality = null;
                            break;
                        case 'png':
                            $out_func = 'imagepng';
                            if ( $quality >= 10 ) {
                                $quality *= 0.1;
                                $quality = (int) $quality;
                                if ( $quality > 9 ) {
                                    $quality = 0;
                                }
                            } else if ( $quality == 0 ) {
                                $quality = 9;
                            }
                            break;
                        case 'webp':
                            $out_func = 'imagewebp';
                            break;
                        default:
                            return '';
                    }
                    switch ( $extension ) {
                        case 'jpg':
                            $src_func = 'imagecreatefromjpeg';
                            break;
                        case 'jpeg':
                            $src_func = 'imagecreatefromjpeg';
                            break;
                        case 'gif':
                            $src_func = 'imagecreatefromgif';
                            $quality = null;
                            break;
                        case 'png':
                            $src_func = 'imagecreatefrompng';
                            if ( $quality >= 10 ) {
                                $quality *= 0.1;
                                $quality = (int) $quality;
                                if ( $quality > 9 ) {
                                    $quality = 0;
                                }
                            } else if ( $quality == 0 ) {
                                $quality = 9;
                            }
                            break;
                        case 'webp':
                            $src_func = 'imagecreatefromwebp';
                            break;
                        default:
                            return '';
                    }
                    if ( $app->get_image_src_func ) {
                        $src_func = self::get_src_func( $file );
                        if (! $src_func ) {
                            if ( isset( $args['path'] ) && $args['path'] ) {
                                return $asset_path;
                            } else {
                                return $asset_url;
                            }
                        }
                    }
                    if ( $src_func === 'imagecreatefromwebp' ) {
                        if ( self::is_webp_animated( $file ) ) {
                            $src_func = '';
                        }
                    }
                }
                list( $orig_width, $orig_height ) = isset( $getimagesize ) ? $getimagesize : getimagesize( $file );
                if ( $max && is_numeric( $max ) ) {
                    if ( $orig_width > $orig_height ) {
                        $args['width'] = $max;
                        $width = $max;
                        unset( $args['height'] );
                        $sc = $max / $orig_width;
                        $height = $orig_height * $sc;
                        $height = (int) $height;
                        if (! $height ) {
                            $height = 1;
                        }
                    } else {
                        $args['height'] = $max;
                        $height = $max;
                        unset( $args['width'] );
                        $sc = $max / $orig_height;
                        $width = $orig_width * $sc;
                        $width = (int) $width;
                        if (! $width ) {
                            $width = 1;
                        }
                    }
                }
                $thumb_path = $upload_dir . DS . $thumbnail_name;
                if ( function_exists( $src_func ) && function_exists( $out_func ) ) {
                    $src_img = @$src_func( $file );
                    if ( $src_img === false ) {
                        error_reporting( $error_reporting );
                        $app->logging = $logging;
                        trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                        return '';
                    }
                    if ( $square ) {
                        $w = $orig_width;
                        $h = $orig_height;
                        $thumb_image = imagecreatetruecolor( $width, $height );
                        if ( $output_ext === 'png' || $output_ext === 'webp' ) {
                            imagealphablending( $thumb_image, false );
                            imagesavealpha( $thumb_image, true );
                        }
                        if ( $fit ) {
                            if ( $w > $h ) {
                                $scale = $width / $w;
                            } else {
                                $scale = $height / $h;
                            }
                            $outW = $w * $scale;
                            $outH = $h * $scale;
                            $outW = (int) $outW;
                            $outH = (int) $outH;
                            if ( $w > $h ) {
                                $dst_x = 0;
                                $dst_h = ( $height - $outH ) / 2;
                            } else {
                                $dst_h = 0;
                                $dst_x = ( $width - $outW ) / 2;
                            }
                            $dst_h = (int) $dst_h;
                            $dst_x = (int) $dst_x;
                            if ( is_string( $fit ) && preg_match('/^#[a-f0-9]{6}$/i', $fit ) ) {
                                $code_red = hexdec( substr( $fit, 1, 2 ) );
                                $code_green = hexdec( substr( $fit, 3, 2 ) );
                                $code_blue = hexdec( substr( $fit, 5, 2 ) );
                                $bg_color = imagecolorallocate( $thumb_image, $code_red, $code_blue, $code_blue );
                                imagefill( $thumb_image, 0, 0, $bg_color );
                            } else if ( $out_func === 'imagepng' || $out_func === 'imagewebp' ) {
                                $bg_color = imagecolorallocatealpha( $thumb_image, 255, 255, 255, 100 );
                                imagesavealpha( $thumb_image, true );
                                imagefill( $thumb_image, 0, 0, $bg_color );
                            } else {
                                $bg_color = imagecolorallocate( $thumb_image, 255, 255, 255 );
                                imagefill( $thumb_image, 0, 0, $bg_color );
                            }
                            imagecopyresampled( $thumb_image, $src_img, $dst_x, $dst_h, 0, 0, $outW, $outH, $w, $h );
                        } else {
                            if ( $w > $h ) {
                                $diff  = ( $w - $h ) * 0.5;
                                $diffW = $h;
                                $diffH = $h;
                                $diffY = 0;
                                $diffX = $diff;
                            } else {
                                if( $w == $h ) {
                                    $diffW = $w;
                                    $diffH = $h;
                                    $diffY = 0;
                                    $diffX = 0;
                                } else {
                                    $diff  = ( $h - $w ) * 0.5;
                                    $diffW = $w;
                                    $diffH = $w;
                                    $diffY = $diff;
                                    $diffX = 0;
                                }
                            }
                            if (! $diffW ) $diffW = 1;
                            if (! $diffH ) $diffH = 1;
                            imagecopyresampled( $thumb_image, $src_img, 0, 0, $diffX, $diffY, $width, $height, $diffW, $diffH );
                        }
                        if ( $out_func === 'imagegif' ) {
                            $im = @$out_func( $thumb_image, $thumb_path );
                        } else {
                            $im = @$out_func( $thumb_image, $thumb_path, $quality );
                        }
                        if ( $im === false ) {
                            error_reporting( $error_reporting );
                            $app->logging = $logging;
                            trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $thumb_path, $out_func ] ) );
                            return '';
                        }
                    } else if ( $aspect && $fit ) {
                        list( $aspect_w, $aspect_h ) = explode( 'x', $aspect );
                        $w = $orig_width;
                        $h = $orig_height;
                        if ( $args_width ) {
                            $args_height = $args_width * $aspect_h / $aspect_w;
                            $args_height = round( $args_height );
                        } else if ( $args_height ) {
                            $args_width = $args_height * $aspect_w / $aspect_h;
                            $args_width = round( $args_width );
                        }
                        $thumb_image = imagecreatetruecolor( $args_width, $args_height );
                        if ( $output_ext === 'png' || $output_ext === 'webp' ) {
                            imagealphablending( $thumb_image, false );
                            imagesavealpha( $thumb_image, true );
                        }
                        if ( is_string( $fit ) && preg_match('/^#[a-f0-9]{6}$/i', $fit ) ) {
                            $code_red = hexdec( substr( $fit, 1, 2 ) );
                            $code_green = hexdec( substr( $fit, 3, 2 ) );
                            $code_blue = hexdec( substr( $fit, 5, 2 ) );
                            $bg_color = imagecolorallocate( $thumb_image, $code_red, $code_blue, $code_blue );
                            imagefill( $thumb_image, 0, 0, $bg_color );
                        } else if ( $out_func === 'imagepng' || $out_func === 'imagewebp' ) {
                            $bg_color = imagecolorallocatealpha( $thumb_image, 255, 255, 255, 100 );
                            imagesavealpha( $thumb_image, true );
                            imagefill( $thumb_image, 0, 0, $bg_color );
                        } else {
                            $bg_color = imagecolorallocate( $thumb_image, 255, 255, 255 );
                            imagefill( $thumb_image, 0, 0, $bg_color );
                        }
                        list( $w_pos, $h_pos ) = [0, 0];
                        $scope = 'beside';
                        $comp1 = $aspect_h / $aspect_w;
                        $comp2 = $h / $w;
                        if ( $comp1 < $comp2 ) {
                            $scope = 'vertical';
                        } else {
                            $scope = 'beside';
                        }
                        if (! $trim ) {
                            if ( $scope === 'vertical' ) {
                                $scale = $args_height / $h;
                                $height = $h * $scale;
                                $height = round( $height );
                                $width = $w * $scale;
                                $width = round( $width );
                                $w_pos = ( $args_width - $width ) / 2;
                                $w_pos = round( $w_pos );
                            } else {
                                $scale = $args_width / $w;
                                $height = $h * $scale;
                                $height = round( $height );
                                $width = $w * $scale;
                                $width = round( $width );
                                $h_pos = ( $args_height - $height ) / 2;
                                $h_pos = round( $h_pos );
                            }
                        } else {
                            if ( $scope === 'vertical' ) {
                                $width = $args_width;
                                $scale = $width / $w;
                                $height = $h * $scale;
                                $height = round( $height );
                                $h_pos = ( $height - $args_height ) / 2;
                                $h_pos = round( $h_pos );
                                $h_pos *= -1;
                            } else {
                                $height = $args_height;
                                $scale = $height / $h;
                                $width = $w * $scale;
                                $width = round( $width );
                                $w_pos = ( $width - $args_width ) / 2;
                                $w_pos = round( $w_pos );
                                $w_pos *= -1;
                            }
                        }
                        imagecopyresampled( $thumb_image, $src_img, $w_pos, $h_pos, 0, 0, $width, $height, $w, $h );
                        if ( $out_func === 'imagegif' ) {
                            $im = @$out_func( $thumb_image, $thumb_path );
                        } else {
                            $im = @$out_func( $thumb_image, $thumb_path, $quality );
                        }
                        if ( $im === false ) {
                            error_reporting( $error_reporting );
                            $app->logging = $logging;
                            trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $thumb_path, $out_func ] ) );
                            return '';
                        }
                    } else if ( $keep_aspect ) {
                        $aspect_w = $orig_width / $width;
                        $aspect_h = $orig_height / $height;
                        if ( $aspect_w > $aspect_h ) {
                            $ratio = $width * $aspect_h;
                            $diffW = (int) $ratio;
                            $diffH = $orig_height;
                            $diffX = $orig_width - $diffW;
                            $diffX = $diffX * 0.5;
                            $diffX = (int) $diffX;
                            $diffY = 0;
                        } else {
                            $ratio = $height * $aspect_w;
                            $diffH = (int) $ratio;
                            $diffW = $orig_width;
                            $diffY = $orig_height - $diffH;
                            $diffY = $diffY * 0.5;
                            $diffY = (int) $diffY;
                            $diffX = 0;
                        }
                        if (! $diffW ) $diffW = 1;
                        if (! $diffH ) $diffH = 1;
                        $thumb_image = imagecreatetruecolor( $width, $height );
                        if ( $output_ext === 'png' || $output_ext === 'webp' ) {
                            imagealphablending( $thumb_image, false );
                            imagesavealpha( $thumb_image, true );
                        }
                        imagecopyresampled( $thumb_image, $src_img, 0, 0, $diffX, $diffY, $width, $height, $diffW, $diffH );
                        if ( $out_func === 'imagegif' ) {
                            $im = @$out_func( $thumb_image, $thumb_path );
                        } else {
                            $im = @$out_func( $thumb_image, $thumb_path, $quality );
                        }
                        if ( $im === false ) {
                            error_reporting( $error_reporting );
                            $app->logging = $logging;
                            trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $thumb_path, $out_func ] ) );
                            return '';
                        }
                    } else {
                        $thumb_image = imagecreatetruecolor( $width, $height );
                        if ( $output_ext === 'png' || $output_ext === 'webp' ) {
                            imagealphablending( $thumb_image, false );
                            imagesavealpha( $thumb_image, true );
                        }
                        imagecopyresampled( $thumb_image, $src_img, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height );
                        if ( $out_func === 'imagegif' ) {
                            $im = @$out_func( $thumb_image, $thumb_path );
                        } else {
                            $im = @$out_func( $thumb_image, $thumb_path, $quality );
                        }
                        if ( $im === false ) {
                            error_reporting( $error_reporting );
                            $app->logging = $logging;
                            trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $thumb_path, $out_func ] ) );
                            return '';
                        }
                    }
                    imagedestroy( $src_img );
                    imagedestroy( $thumb_image );
                } else if ( $convert_path = $app->imagick_convert_path ) {
                    // This function is obsolete.
                    $convert_path = escapeshellcmd( $convert_path );
                    $thumb_path = escapeshellarg( $thumb_path );
                    if ( $square ) {
                        if ( $orig_width > $orig_height ) {
                            $cmd = "{$convert_path} {$file} -resize {$width}x -resize x{$height}";
                        } else {
                            $cmd = "{$convert_path} {$file} -resize x{$width} -resize {$height}x";
                        }
                        $cmd .= " -gravity center -crop {$width}x{$height}+0+0 {$thumb_path}";
                    } else {
                        $cmd = "{$convert_path} {$file} -resize {$width}x{$height} {$thumb_path}";
                    }
                    exec( $cmd, $output, $return_var );
                } else {
                    $url = $app->db->model( 'urlinfo' )->get_by_key(
                        ['object_id' => $obj->id, 'model' => $obj->_model, 'class' => 'file', 'key' => $name,
                         'delete_flag' => [0, 1] ], ['sort' => 'delete_flag', 'direction' => 'ascend'] );
                    return $url->url;
                }
            } else {
                $imagine = new \Imagine\Gd\Imagine();
                if ( isset( $orig_args['force'] ) && $orig_args['force']
                    && ( $w < $width || $h < $height ) ) {
                    if ( $h > $w ) {
                        $tmp_w = $width;
                        $tmp_scale = $width / $w;
                        $tmp_h = round( $h * $tmp_scale );
                    } else {
                        $tmp_h = $height;
                        $tmp_scale = $height / $h;
                        $tmp_w = round( $w * $tmp_scale );
                    }
                    $image = $imagine->open( $file );
                    $tmp_name = $file . '.' . $extension;
                    if (! $tmp_w ) {
                        $tmp_w = 1;
                    }
                    if (! $tmp_h ) {
                        $tmp_h = 1;
                    }
                    $tmp_image = $image->resize( new Imagine\Image\Box( $tmp_w, $tmp_h ) );
                    if ( $output_ext == 'png' ) {
                        $image_quality = 'png_compression_level';
                        $tmp_quality = 9;
                    } else if ( $output_ext == 'jpg' ) {
                        $image_quality = 'jpeg_quality';
                        $tmp_quality = 100;
                    } else if ( $output_ext == 'jpeg' ) {
                        $image_quality = 'jpeg_quality';
                        $tmp_quality = 100;
                    }
                    if ( isset( $tmp_quality ) ) {
                        $tmp_image->save( $tmp_name, [ $image_quality => $tmp_quality ] );
                    } else {
                        $tmp_image->save( $tmp_name );
                    }
                    $file = $tmp_name;
                }
                $image = $imagine->open( $file );
                if (! $width ) {
                    $width = 1;
                }
                if (! $height ) {
                    $height = 1;
                }
                if ( $square ) {
                    $mode = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;
                    $thumbnail = $image->thumbnail( new Imagine\Image\Box( $width, $height ), $mode );
                } else {
                    $thumbnail = $image->thumbnail( new Imagine\Image\Box( $width, $height ) );
                }
                $thumbnail->save( $upload_dir . DS . $thumbnail_name );
            }
            if (! $fmgr->exists( $upload_dir . DS . $thumbnail_name ) ) {
                return '';
            }
            $thumb = $fmgr->get( $upload_dir . DS . $thumbnail_name );
            if ( isset( $orig_args['wants'] ) && $orig_args['wants'] == 'data' ) {
                return $thumb;
            }
            $fmgr->put( $asset_path, $thumb );
            $t_property = $assetproperty;
            $t_property['file_name'] = $thumbnail_name;
            $t_property['basename'] = $thumbnail_basename;
            $t_property['file_size'] = strlen( bin2hex( $thumb ) ) / 2;
            $t_property['image_width'] = $meta['image_width'];
            $t_property['image_height'] = $meta['image_height'];
            $t_property['uploaded'] = date( 'Y-m-d H:i:s' );
            if ( $app->user() ) {
                $t_property['user_id'] = $app->user()->id;
            }
            $metadata->blob( $thumb );
            $orig_args = self::serialize( $orig_args );
            $orig_property = self::serialize( $orig_property );
            $metadata->data( $orig_args );
            $metadata->metadata( $orig_property );
            $hash = md5( base64_encode( $thumb ) );
            $_t_property = json_encode( $t_property );
            $metadata->text( $_t_property );
            if ( $app->mode == 'insert_asset' ) {
                $metadata->type( 'editor' );
                $q_site_path = preg_quote( $site_path, '/' );
                $metadata->name( preg_replace( "/^$q_site_path/", '%r', $asset_path ) );
            }
            $metadata->number( $workspace_id );
            if ( $app->param( '_preview' ) ) {
                if (! $fmgr->exists( $asset_path ) ) {
                    $fmgr->mkpath( dirname( $asset_path ) );
                    $delayed = $fmgr->delayed;
                    $fmgr->put( $asset_path, $thumb );
                    $fmgr->delayed = $delayed;
                    if ( $obj->has_column( 'status' ) && $obj->status != $status_published ) {
                        $session = $app->db->model( 'session' )->get_by_key(
                            ['name'  => md5( $asset_path ), 'key' => $obj->_model,
                             'object_id' => (int) $obj->id,
                             'value' => 'temp_thumbnail',
                             'kind'  => 'TT'] );
                        $session->text( $asset_path );
                        $session->start( $app->request_time );
                        $session->expires( $app->request_time + 60 );
                        $app->set_default( $session );
                        $session->save();
                    }
                }
                if ( $properties ) {
                    $ctx->vars[ $properties ] = $t_property;
                }
                return $asset_url;
            }
            $metadata->save();
        }
        if ( $properties ) {
            if ( isset( $thumb_props ) ) {
                $ctx->vars[ $properties ] = $thumb_props;
            } else if ( isset( $t_property ) ) {
                $ctx->vars[ $properties ] = $t_property;
            } else {
                $ctx->vars[ $properties ] = json_decode( $metadata->text, true );
            }
        }
        $info = $info->id ? $info : $app->db->model( 'urlinfo' )->get_by_key( [
            'object_id' => $id, 'model' => $model, 'class' => 'file',
            'key' => 'thumbnail', 'meta_id' => $metadata->id,
            'workspace_id' => $workspace_id ] );
        $info->meta_id( $metadata->id );
        unset( $args['urlinfo'] );
        $args['urlinfo'] = $info;
        if (! $force && $info->id && file_exists( $info->file_path ) ) {
            $orig_info = $app->db->model( 'urlinfo' )->get_by_key( [
                'object_id' => $id, 'model' => $model, 'class' => 'file',
                'key' => $name, 'meta_id' => 0,
                'workspace_id' => $workspace_id ], ['limit' => 1], 'id,file_path' );
            if ( $orig_info->id && file_exists( $orig_info->file_path ) ) {
                if ( filemtime( $orig_info->file_path ) < filemtime( $info->file_path ) ) {
                    $info->save(); // Update filemtime.
                    return $info->url;
                }
            }
        }
        if ( $info->relative_path != $relative_path ) {
            if ( $info->file_path &&
                ( $info->file_path != $asset_path ) ) {
                if ( $fmgr->exists( $info->file_path ) ) {
                    $fmgr->unlink( $info->file_path );
                }
            }
            $extension = self::get_extension( $asset_path );
            $mimetype = self::get_mime_type( $extension );
            $info->set_values( [
                'relative_path' => $relative_path,
                'relative_url' => $relative_url,
                'file_path' => $asset_path,
                'url' => $asset_url,
                'mime_type' => $mimetype,
                'publish_file' => 1
            ] );
            if ( $obj->has_column( 'status' ) ) {
                if ( $obj->status == $status_published ) {
                    $info->is_published( 1 );
                }
            } else {
                $info->is_published( 1 );
            }
        }
        $publish = false;
        if ( $obj->has_column( 'status' ) && $obj->status != $status_published ) {
            if ( $fmgr->exists( $asset_path ) ) {
                $fmgr->unlink( $asset_path );
                $info->is_published( 0 );
                $info->filemtime( time() );
            }
        } else {
            if ( file_exists( $asset_path ) ) {
                if (! $metadata->blob ) {
                    $metadata = $app->db->model( 'meta' )->get_by_key( [
                        'object_id' => $metadata->object_id, 'model' => $model,
                        'kind' => 'thumbnail', 'key' => $metadata->key,
                        'value' => $thumbnail_basename ], null, 'id,blob' );
                }
                if ( !$metadata->blob ) {
                    if ( $info->id ) {
                        $info->remove();
                    }
                    return '';
                }
                $thumb = isset( $thumb ) && $thumb ? $thumb : $metadata->blob;
                $comp = md5( base64_encode( $fmgr->get( $asset_path ) ) );
                $data = md5( base64_encode( $thumb ) );
                if ( $comp != $data ) {
                    $publish = true;
                } else {
                    $info->was_published( 1 );
                    $info->filemtime( filemtime( $asset_path ) );
                    $info->md5( $data );
                    $info->save();
                    $args['urlinfo'] = $info;
                    return $asset_url;
                }
                $hash = $data;
            } else {
                $publish = true;
            }
            $info->is_published( 1 );
        }
        if ( $app->publish_callbacks ) {
            $original = clone $obj;
            $app->init_callbacks( 'blob', 'start_publish' );
            $app->init_callbacks( 'blob', 'pre_publish' );
            $app->init_callbacks( 'blob', 'post_publish' );
            $unlink = false;
            $callback = ['name' => 'start_publish', 'model' => 'blob',
                         'urlinfo' => $info, 'object' => $obj, 'thumbnail' => true,
                         'original' => $original, 'unlink' => $unlink ];
            $app->run_callbacks( $callback, 'blob', $unlink );
        }
        if ( $publish && !$app->param( '_preview' ) ) {
            if (! isset( $thumb ) && ! $metadata->blob ) {
                $metadata = $app->db->model( 'meta' )->get_by_key( [
                    'object_id' => $metadata->object_id, 'model' => $model,
                    'kind' => 'thumbnail', 'key' => $metadata->key,
                    'value' => $thumbnail_basename ], null, 'id,blob' );
            }
            $thumb = isset( $thumb ) && $thumb ? $thumb : $metadata->blob;
            if ( $thumb === null ) {
                if ( $info->id ) {
                    $info->remove();
                }
                if ( $metadata->id ) {
                    $metadata->remove();
                }
                if ( $app->txn_active ) {
                    $app->db->commit();
                    $app->db->begin_work();
                }
                if (! $retry ) {
                    // re-make
                    return $keep_ctx ?
                        self::thumbnail_url( $obj, $args, $ctx, true ) : self::thumbnail_url( $obj, $args, $assetproperty, true );
                }
                return '';
            }
            if ( $app->publish_callbacks ) {
                $callback['name'] = 'pre_publish';
                $res = $app->run_callbacks( $callback, 'blob', $thumb );
                if (! $res ) return $asset_path;
            }
            if ( $asset_publish ) {
                // Error use $fmgr->put when fmgr_delayed specified.
                $fmgr->mkpath( dirname( $asset_path ) );
                $delayed = $fmgr->delayed;
                $fmgr->delayed = false;
                $fmgr->put( $asset_path, $thumb );
                $fmgr->delayed = $delayed;
                $info->was_published( 1 );
            }
        }
        if ( $metadata->blob === null ) {
            $metadata = $app->db->model( 'meta' )->get_by_key( [
                'object_id' => $metadata->object_id, 'model' => $model,
                'kind' => 'thumbnail', 'key' => $metadata->key,
                'value' => $thumbnail_basename ], null, 'id,blob' );
        }
        if ( $metadata->blob === null ) {
            if ( $info->id ) {
                $info->filemtime( time() );
                $info->remove();
            }
            if ( $metadata->id ) {
                $metadata->remove();
            }
            if ( $app->txn_active ) {
                $app->db->commit();
                $app->db->begin_work();
            }
            if (! $retry ) {
                // re-make
                return $keep_ctx ?
                    self::thumbnail_url( $obj, $args, $ctx, true ) : self::thumbnail_url( $obj, $args, $assetproperty, true );
            }
            return '';
        }
        if ( $hash ) {
            $info->md5( $hash );
        }
        error_reporting( $error_reporting );
        $app->logging = $logging;
        if ( $obj->has_column( 'status' ) && $obj->status != $status_published ) {
            $info->filemtime( time() );
            $info->remove(); // set delete_flag=1
        } else {
            $info->save();
            $args['urlinfo'] = $info;
        }
        if ( $app->param( '_preview' ) && $app->txn_active ) {
            if ( $obj->id < 1 ) {
                self::temp_object( $info );
            }
            $app->db->commit();
            $app->db->begin_work();
        }
        if ( $thumb && $publish && !$app->param( '_preview' ) ) {
            if ( $app->publish_callbacks ) {
                $callback['name'] = 'post_publish';
                $callback['urlinfo'] = $info;
                $ref = '';
                $app->run_callbacks( $callback, 'blob', $ref, $thumb );
            }
        }
        $args['urlinfo'] = $info;
        return $asset_url;
    }

    public static function get_children ( $obj, $depth = 0, &$children = [],
                                          $cols = '*', &$curr_depth = 0 ) {
        if ( $depth && $curr_depth >= $depth ) {
            return;
        }
        $curr_depth++;
        $childObjs = $obj->load( ['parent_id' => $obj->id ], null, $cols );
        foreach ( $childObjs as $childObj ) {
            $children[] = $childObj;
            self::get_children( $childObj, $depth, $children, $cols, $curr_depth );
        }
    }

    public static function temp_object ( $obj, $expires = 60 ) {
        $app = Prototype::get_instance();
        $screen_id = $app->screen_id ? $app->screen_id : $app->request_id;
        $session = $app->db->model( 'session' )->get_by_key(
            ['name'  => $screen_id, 'key' => $obj->_model,
             'value' => (int) $obj->id,
             'kind'  => 'TP'] );
        $session->start( time() );
        $session->expires( time() + $expires );
        $app->set_default( $session );
        $session->save();
    }

    public static function get_meta_property ( $obj, $col, $property ) {
        if (! $obj->id ) return;
        $app = Prototype::get_instance();
        $meta = $app->db->model( 'meta' )->get_by_key(
                               ['model' => $obj->_model, 'object_id' => $obj->id,
                                'kind' => 'metadata', 'key' => $col ] );
        if (! $meta->id ) return;
        $metadata = json_decode( $meta->text );
        if ( property_exists( $metadata, $property ) ) {
            return $metadata->$property;
        }
    }

    public static function set_meta_property ( &$obj, $col, $property, $value ) {
        if (! $obj->id ) {
            $obj->save();
        }
        $app = Prototype::get_instance();
        $meta = $app->db->model( 'meta' )->get_by_key(
                               ['model' => $obj->_model, 'object_id' => $obj->id,
                                'kind' => 'metadata', 'key' => $col ] );
        if (! $meta->id ) return;
        $metadata = json_decode( $meta->text, true );
        $metadata[ $property ] = $value;
        $new = json_encode( $metadata );
        if ( $meta->text != $new ) {
            $meta->text( $new );
            $meta->save();
        }
    }

    public static function asset_from_file ( $path, $extra_path = '', $workspace_id = 'auto' ) {
        $app = Prototype::get_instance();
        if (! $app->fmgr->exists( $path ) ) {
            return false;
        }
        if ( $workspace_id === 'auto' ) {
            $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        }
        $workspace_id = (int) $workspace_id;
        $workspace = null;
        if ( $workspace_id ) {
            $workspace = $app->db->model( 'workspace' )->load( $workspace_id );
            if (! $workspace ) {
                return false;
            }
        }
        // TODO::$overwrite option.
        $existing = $app->db->model( 'urlinfo' )->get_by_key( ['file_path' => $path,
                                                               'model' => 'asset',
                                                               'workspace_id' => $workspace_id ] );
        if ( $existing->id ) {
            $existing = $app->db->model( 'asset' )->load( $existing->object_id );
            if ( $existing ) {
                return $existing;
            }
        }
        $table = $app->get_table( 'asset' );
        if (! $extra_path ) {
            $site_path = $workspace ? $workspace->site_path : $app->site_path;
            if ( strpos( $path, $site_path ) === 0 ) {
                $search = preg_quote( $site_path, '/' );
                $extra_path = dirname( ltrim( preg_replace( "/^{$search}/", '', $path ), DS ) );
            }
            if (! $extra_path ) {
                $extra_path = $table->out_path ? $table->out_path : 'assets';
            }
        }
        $app->init_callbacks( 'asset', 'post_save' );
        $data = self::get_upload_info( $app, $path, $error );
        if (! isset( $data['metadata'] ) || $error ) {
            return false;
        }
        $txn_active = $app->txn_active;
        if (! $txn_active ) {
            $app->db->begin_work();
            $app->txn_active = true;
        }
        $data = $data['metadata'];
        $file_name = basename( $path );
        $obj = $app->db->model( 'asset' )->new( [
          'label'     => $file_name,
          'file_name' => $file_name,
          'extra_path'=> $extra_path,
          'file_ext'  => $data['extension'],
          'mime_type' => $data['mime_type'],
          'size'      => $data['file_size'],
          'class'     => $data['class']
        ] );
        if ( $data['class'] === 'image' ) {
            $obj->image_width( $data['image_width'] );
            $obj->image_height( $data['image_height'] );
        }
        $obj->workspace_id( $workspace_id );
        $obj->file( $app->fmgr->get( $path ) );
        $app->set_default( $obj );
        if (! $obj->save() ) {
            $app->db->rollback();
            if ( $txn_active ) {
                $app->db->begin_work();
            }
            $app->txn_active = $txn_active;
            return false;
        }
        $obj = $app->file_attach_to_obj( $obj, 'file', $path, $file_name, $error );
        if ( $error ) {
            $app->db->rollback();
            if ( $txn_active ) {
                $app->db->begin_work();
            }
            $app->txn_active = $txn_active;
            return false;
        }
        $callback = ['name' => 'post_save', 'is_new' => 1, 'add_tags' => [],
                     'changed_cols' => [], 'orig_relations' => [],
                     'orig_metadata' => [] ];
        $app->post_save_asset( $callback, $app, $obj );
        $app->run_callbacks( $callback, 'asset', $obj, $obj );
        $app->publish_obj( $obj );
        $app->db->commit();
        if ( $txn_active ) {
            $app->db->begin_work();
        }
        $app->txn_active = $txn_active;
        return $obj;
    }

    public static function set_ctx_from_template ( &$ctx, $obj ) {
        $app = Prototype::get_instance();
        $map = $obj->map();
        if (! $map ) {
            return;
        }
        $db = $app->db;
        $ctx->include_paths[ $app->site_path ] = true;
        if ( $workspace = $map->workspace ) {
            $ctx->include_paths[ $workspace->site_path ] = true;
        }
        $model = $map->model;
        $table = $app->get_table( $model );
        if (! $table ) {
            return;
        }
        $primary = $table->primary;
        $ctx->stash( 'current_urlmapping', $map );
        $ctx->stash( 'current_object', $obj );
        $ctx->stash( 'current_template', $obj );
        $archive_type = '';
        if ( $table->name != 'template' ) {
            $terms = [];
            if ( $map && $map->workspace_id ) {
                $terms['workspace_id'] = $map->workspace_id;
            }
            if ( $table->revisable ) {
                $terms['rev_type'] = 0;
            }
            $_obj = $db->model( $table->name )->load( $terms,
                ['limit' => 1, 'sort' => 'id', 'direction' => 'descend'] );
            if (! empty( $_obj ) ) {
                $obj = $_obj[0];
            } else {
                $obj = $db->model( $table->name )->new();
                $obj->id( -1 );
                $obj->$primary( $app->translate( $table->label ) );
                $app->set_default( $obj );
            }
            $ctx->stash( 'current_archive_title', $obj->$primary );
            $ctx->stash( 'current_archive_type', $obj->_model );
            $ctx->stash( $obj->_model, $obj );
            $ctx->stash( 'current_object', $obj );
        } else {
            $archive_type = 'index';
            $ctx->stash( 'current_archive_type', $archive_type );
            $ctx->stash( 'current_archive_title', $obj->$primary );
        }
        if ( $map->container ) {
            $container = $app->get_table( $map->container );
            if ( is_object( $container ) ) {
                $ctx->stash( 'current_container', $container->name );
                if ( $at = $map->date_based ) {
                    if ( $archive_type != 'template' ) {
                        $archive_type .= $archive_type ? '-' . strtolower( $at )
                                       : strtolower( $at );
                    } else {
                        $archive_type = strtolower( $at );
                    }
                    $ctx->stash( 'current_archive_type', $archive_type );
                    $container_obj = $app->db->model( $map->container )->new();
                    $date_col = $app->get_date_col( $container_obj );
                    $terms = [];
                    if ( $container_obj->has_column( 'workspace_id' )
                        && $workspace ) {
                        $terms['workspace_id'] = $workspace->id;
                        $workspace = $obj->workspace ? $obj->workspace : $workspace;
                    }
                    $last = $container_obj->load( $terms,
                        ['limit' => 1, 'sort' => $date_col, 'direction' => 'descend'] );
                    if ( is_array( $last ) && !empty( $last ) ) {
                        $last = $last[0];
                        $ts = $container_obj->db2ts( $last->$date_col );
                        list( $title, $start, $end ) =
                            $app->title_start_end( $at, $ts, $map );
                        $ctx->stash( 'archive_date_based', $container_obj->_model );
                        $ctx->stash( 'archive_date_based_col', $date_col );
                        $ctx->stash( 'current_timestamp', $start );
                        $ctx->stash( 'current_timestamp_end', $end );
                        $ctx->stash( 'current_archive_title', $title );
                    }
                }
            }
        }
        $ctx->stash( 'current_context', $obj->_model );
        $ctx->stash( $obj->_model, $obj );
        $ctx->stash( 'workspace', $workspace );
        $ctx->vars['current_archive_model'] = $obj->_model;
        $ctx->vars['current_object_id'] = $obj->id;
        $ctx->vars['publish_type'] = $map->publish_file;
        if (! $theme_static = $app->theme_static ) {
            $theme_static = $app->path . 'theme-static/';
            $app->theme_static = $theme_static;
        }
        $ctx->vars['theme_static'] = $theme_static;
        $ctx->vars['application_dir'] = __DIR__;
        $ctx->vars['application_path'] = $app->path;
        $ctx->vars['current_archive_type'] = $ctx->stash( 'current_archive_type' );
        $ctx->vars['current_archive_title'] = $ctx->stash( 'current_archive_title' );
        $mapping = $map->mapping;
        $ts = $ctx->stash( 'current_timestamp' )
            ? $ctx->stash( 'current_timestamp' ) : '';
        $url = $app->build_path_with_map( $obj, $map, $table, $ts, true );
        $ctx->stash( 'current_archive_url', $url );
        $ctx->vars['current_archive_url'] = $url;
        $ctx->vars['current_archive_title'] = $ctx->stash( 'current_archive_title' );
        if (! $obj->id ) {
            $clone = clone $obj;
            $clone->id( -1 ); // If the object id is specified, the site path is returned.
            $permalink = $app->get_permalink( $clone );
        } else {
            $permalink = $app->get_permalink( $obj );
        }
        if ( $permalink ) $mapping = $permalink;
        if ( preg_match( '!/$!', $mapping ) ) {
            $mapping .= $app->directory_index;
        }
        if ( $permalink && !$ctx->stash( 'current_archive_url' ) ) {
            $ctx->stash( 'current_archive_url', $permalink );
            $ctx->vars['current_archive_url'] = $permalink;
        }
        return $ctx;
    }

    public static function file_attach_to_obj ( $app, $obj, $col, $path, $label = '', &$error = '' ) {
        $fmgr = $app->fmgr;
        if (! $fmgr->exists( $path ) ) {
            $error = 'File not found.';
            return null;
        }
        $delayed = $fmgr->delayed;
        $fmgr->delayed = false;
        $model = $obj->_model;
        $logging = $app->logging;
        $app->logging = false;
        $error_reporting = ini_get( 'error_reporting' );
        error_reporting(0);
        // Warning: exif_read_data File not supported in...
        $data = self::get_upload_info( $app, $path, $error );
        $app->logging = $logging;
        error_reporting( $error_reporting );
        if ( $error ) return null;
        $obj->$col( $fmgr->get( $path ) );
        if (! $obj->id ) {
            $obj->save();
        }
        $meta = $app->db->model( 'meta' )->get_by_key(
                               ['model' => $model, 'object_id' => $obj->id,
                                'kind' => 'metadata', 'key' => $col ] );
        $metadata = $data['metadata'];
        if ( $label ) {
            $metadata['label'] = $label;
        }
        $file_ext = $metadata['extension'];
        $metadata = json_encode( $metadata );
        if ( isset( $data['thumbnail_square'] ) ) {
            $thumbnail_square = $data['thumbnail_square'];
            $thumbnail_small = $data['thumbnail_small'];
            if ( $fmgr->exists( $thumbnail_square ) ) {
                $meta->metadata( $fmgr->get( $thumbnail_square ) );
                if ( $app->assets_c && is_dir( $app->assets_c ) ) {
                    $asset_id = $obj->id;
                    $thumb_name = "thumb-{$model}-128xauto-square-{$asset_id}-{$col}.{$file_ext}";
                    $fmgr->copy( $thumbnail_square, $app->assets_c . DS . $thumb_name );
                }
            }
            if ( $fmgr->exists( $thumbnail_small ) ) {
                $meta->data( $fmgr->get( $thumbnail_small ) );
            }
        }
        $meta->text( $metadata );
        $obj->save();
        if ( $app->db->blob2file ) {
            $obj = $app->db->model( $model )->get_by_key( ['id' => $obj->id ] );
        }
        $meta->save();
        $fmgr->delayed = $delayed;
        return $obj;
    }

    public static function create_assets_c ( $app, $obj, $properties = null ) {
        $db = $app->db;
        $model = $obj->_model;
        $metadata = null;
        $db_caching = $db->caching;
        $query_cache = $db->query_cache;
        if (! $properties ) {
            $scheme = $app->get_scheme_from_db( $model );
            $properties = $scheme['edit_properties'];
        } else if ( is_string( $properties ) ) {
            $key = $properties;
            $metadata = $db->model( 'meta' )->get_by_key(
                     ['model' => $model, 'object_id' => $obj->id,
                      'kind' => 'metadata', 'key' => $key ] );
            if (!$metadata->id ) {
                $scheme = $app->get_scheme_from_db( $model );
                $properties = $scheme['edit_properties'];
                $metadata = null;
            }
        } else if ( is_object( $properties ) && $properties->id ) {
            $metadata = $properties;
            $key = $metadata->key;
        }
        if (! is_object( $metadata ) || !$metadata->id ) {
            if ( is_array( $properties ) ) {
                foreach ( $properties as $key => $val ) {
                    if ( $val === 'file' ) {
                        $metadata = $db->model( 'meta' )->get_by_key(
                                 ['model' => $model, 'object_id' => $obj->id,
                                  'kind' => 'metadata', 'key' => $key ] );
                        if (!$metadata->id ) continue;
                        $file_meta = json_decode( $metadata->text, true );
                        if ( $file_meta['class'] !== 'image' ) {
                            continue;
                        }
                        break;
                    }
                }
            }
        }
        $db->caching = $db_caching;
        $db->query_cache = $query_cache;
        if (! is_object( $metadata ) || !$metadata->id ) {
            return false;
        }
        $file_meta = json_decode( $metadata->text, true );
        $file_ext = $file_meta['extension'];
        if ( $file_meta['class'] === 'image' ) {
            $fmgr = $app->fmgr;
            $data = $metadata->metadata ?? $metadata->data;
            if ( $data ) {
                $asset_id = $obj->id;
                $thumb_name = "thumb-{$model}-128xauto-square-{$asset_id}-{$key}.{$file_ext}";
                $thumb_name = $app->assets_c . DS . $thumb_name;
                if ( $fmgr->exists( $thumb_name ) && md5( $data ) === md5_file( $thumb_name ) ) {
                    return true;
                } else {
                    return $fmgr->put( $thumb_name, $data, LOCK_EX );
                }
            }
        }
        return false;
    }

    public static function update_blob_label ( $app, $obj, $col, $label = '' ) {
        $meta = $app->db->model( 'meta' )->get_by_key(
                               ['model' => $obj->_model, 'object_id' => $obj->id,
                                'kind' => 'metadata', 'key' => $col ] );
        if (! $meta->id ) {
            return;
        }
        $metadata = json_decode( $meta->text, true );
        if (! isset( $metadata['label'] ) ||
            ( isset( $metadata['label'] ) && $metadata['label'] != $label ) ) {
            $metadata['label'] = $label;
            $metadata = json_encode( $metadata );
            $meta->text( $metadata );
            return $meta->save();
        }
    }

    public static function get_upload_info ( $app, $upload_path, &$error ) {
        if (! file_exists( $upload_path ) ) {
            $error = 'File not found.';
            return [];
        }
        $logging = $app->logging;
        $app->logging = false;
        $error_reporting = ini_get( 'error_reporting' );
        error_reporting(0);
        $upload_dir = $app->mode == 'manage_theme' ? $app->upload_dir() : dirname( $upload_path );
        $data = [];
        $ext = self::get_extension( $upload_path );
        $pathdata = pathinfo( $upload_path );
        $mime_type = self::get_mime_type( $ext );
        $class = self::get_asset_class( $ext );
        $metadata = [
            'file_size' => filesize( $upload_path ),
            'mime_type' => $mime_type,
            'extension' => $ext,
            'class'     => $class,
            'basename'  => $pathdata['filename'],
            'file_name' => $pathdata['basename'] ];
        if ( $user = $app->user() ) {
            $metadata['user_id'] = $user->id;
        }
        $basename = md5( $pathdata['filename'] );
        if ( $class === 'image' ) {
            try {
                $info = getimagesize( $upload_path );
                $w = $info[0];
                $h = $info[1];
                $metadata['image_width'] = $info[0];
                $metadata['image_height'] = $info[1];
                $metadata['mime_type'] = $info['mime'];
                $metadata['class'] = 'image';
            } catch ( Exception $e ) {
                $error = $e->getMessage();
                $data['metadata'] = $metadata;
                return $data;
            }
            if (! $app->use_imagine ) {
                $data['thumbnail_square'] = self::make_thumbnail( $upload_path, 128, 'auto', 100, true );
                $data['thumbnail_small'] = self::make_thumbnail( $upload_path, 256, 'auto', 100, false );
            } else {
                $imagine = new \Imagine\Gd\Imagine();
                $image = null;
                try {
                    $image = $imagine->open( $upload_path );
                } catch ( Exception $e ) {
                    $error = $e->getMessage();
                    $data['metadata'] = $metadata;
                    return $data;
                }
                $width = 128;
                $height = 128;
                $mode = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;
                if (! is_dir( $upload_dir . DS . "thumbnails-{$basename}" ) ) {
                    mkdir( $upload_dir . DS . "thumbnails-{$basename}", 0777, true );
                }
                $thumbnail = $image->thumbnail( new Imagine\Image\Box( $width, $height ), $mode );
                $thumbnail_square = $upload_dir . DS . "thumbnails-{$basename}" . DS . "thumb-square.{$ext}";
                $thumbnail->save( $thumbnail_square );
                $data['thumbnail_square'] = $thumbnail_square;
                if ( $w > $h ) {
                    $width = 256;
                    $scale = $width / $w;
                    $height = round( $h * $scale );
                } else {
                    $height = 256;
                    $scale = $height / $h;
                    $width = round( $w * $scale );
                }
                $image = $imagine->open( $upload_path );
                if (! $width ) {
                    $width = 1;
                }
                if (! $height ) {
                    $height = 1;
                }
                $thumbnail = $image->thumbnail( new Imagine\Image\Box( $width, $height ) );
                $thumbnail_small = $upload_dir . DS . "thumbnails-{$basename}" . DS . "thumb-small.{$ext}";
                $thumbnail->save( $thumbnail_small );
                $data['thumbnail_small'] = $thumbnail_small;
            }
        }
        error_reporting( $error_reporting );
        $app->logging = $logging;
        $date = date( 'Y-m-d H:i:s', time() );
        $metadata['uploaded'] = $date;
        $data['metadata'] = $metadata;
        return $data;
    }

    public static function generate_uuid () {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    public static function get_fields ( $obj, $args = [], $type = 'objects', $all = false ) {
        $app = Prototype::get_instance();
        if ( is_string( $obj ) ) $obj = $app->db->model( $obj )->new();
        if ( is_string( $args ) ) {
            $type = $args;
            $args = [];
        }
        $table = $app->get_table( $obj->_model );
        $terms = [];
        $terms = ['name' => 'models', 'from_obj' => 'field', 'to_obj' => 'table',
                  'to_id' => $table->id ];
        $relations = $app->db->model( 'relation' )->load(
                                       $terms, ['sort' => 'order'] );
        if ( empty( $relations ) ) {
            return [];
        }
        $ids = [];
        foreach ( $relations as $rel ) {
            $ids[] = (int) $rel->from_id;
        }
        $workspace_ids = [0];
        if ( $obj->has_column( 'workspace_id' ) ) {
            if ( $obj->workspace_id ) {
                $workspace_ids[] = (int) $obj->workspace_id;
            }
        }
        if ( isset( $args['workspace_id'] ) && $args['workspace_id'] ) {
            $workspace_ids[] = (int) $args['workspace_id'];
        } else {
            if ( $app->workspace() ) {
                $workspace_ids[] = (int) $app->workspace()->id;
            }
        }
        $workspace_ids = array_unique( $workspace_ids );
        if (! $all ) {
            $fields = $app->db->model( 'field' )->load(
                ['id' => ['IN' => $ids ], 'workspace_id' => ['IN' => $workspace_ids ] ],
                ['sort' => 'order'] );
        } else {
            $fields = $app->db->model( 'field' )->load( ['id' => ['IN' => $ids ] ], ['sort' => 'order'] );
        }
        if ( empty( $fields ) ) {
            return [];
        }
        $_fields = [];
        foreach ( $fields as $field ) {
            if ( in_array( $field->workspace_id, $workspace_ids ) ) {
                $_fields[] = $field;
            }
        }
        ksort( $_fields );
        $_fields = array_values( $_fields );
        if ( $type === 'objects' ) {
            return $_fields;
        } else if ( $type === 'basenames' ) {
            $basenames = [];
            foreach ( $_fields as $field ) {
                $basenames[] = $field->basename;
            }
            return $basenames;
        } else if ( $type === 'types' ) {
            $meta_fields = [];
            foreach ( $_fields as $field ) {
                $fieldtype = $field->fieldtype;
                $type = $fieldtype ? $fieldtype->basename : '';
                $props = ['type' => $type, 'id' => $field->id ];
                $basenames[ $field->basename ] = $props;
            }
            return $basenames;
        } else if ( $type === 'requireds' ) {
            $meta_fields = [];
            foreach ( $_fields as $field ) {
                if ( $field->required )
                    $meta_fields[ $field->basename ] = $field->name;
            }
            return $meta_fields;
        } else if ( $type === 'displays' ) {
            $basenames = [];
            foreach ( $_fields as $field ) {
                if ( $field->display )
                    $basenames[] = $field->basename;
            }
            return $basenames;
        }
    }

    public static function add_id_to_field ( &$content, $uniqueid, $basename ) {
        if (! $content ) return $content;
        $content = preg_replace_callback( "/(&#{0,1}[a-zA-Z0-9]{2,};)/is",
            function( $mts ) { return htmlspecialchars( $mts[0], ENT_QUOTES ); }, $content );
        $app = Prototype::get_instance();
        $ctx = $app->ctx;
        $dom = $ctx->dom ? $ctx->dom : new DomDocument();
        $ctx->dom = $dom;
        $content = '<!DOCTYPE html><html><body>' . $content;
        libxml_use_internal_errors( true );
        if (!$dom->loadHTML( mb_encode_numericentity( $content, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
            LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) )
            trigger_error( 'loadHTML failed!' );
        $inputs = ['input', 'textarea', 'select', 'button'];
        foreach ( $inputs as $ctrl ) {
            $elements = $dom->getElementsByTagName( $ctrl );
            if ( $elements->length ) {
                $i = $elements->length - 1;
                while ( $i > -1 ) {
                    $ele = $elements->item( $i );
                    $i -= 1;
                    $ctrl_name = $ele->getAttribute( 'name' );
                    $ctrl_value = $ele->getAttribute( 'value' );
                    if ( $ctrl_value === $uniqueid ) continue;
                    if ( $ctrl_name && $ctrl_name != "{$basename}__c"
                        && $ctrl_name != "{$basename}__c[]"
                        && strpos( $ctrl_name, $uniqueid ) === false ) {
                        $new_name = "{$uniqueid}_{$ctrl_name}";
                        $ele->setAttribute( 'name', $new_name );
                    }
                }
            }
        }
        if ( PHP_VERSION >= 8.2 ) {
            $content = html_entity_decode( $dom->saveHTML() );
        } else {
            $content = mb_convert_encoding( $dom->saveHTML(), 'utf-8', 'HTML-ENTITIES' );
        }
        $content = preg_replace( '/^.*<body>/si', '', $content );
        $content = preg_replace( '/<\/body>.*$/si', '', $content );
        return $content;
    }

    public static function make_zip_archive ( $dir, &$file, $root = '' ){
        $zip = new ZipArchive();
        $res = $zip->open( $file, ZipArchive::CREATE );
        if( $res ) {
            if( $root ) {
                $zip->addEmptyDir( $root );
                $root .= '/';
            }
            $base_len = mb_strlen( $dir );
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator(
                    $dir,
                    FilesystemIterator::SKIP_DOTS
                    |FilesystemIterator::KEY_AS_PATHNAME
                    |FilesystemIterator::CURRENT_AS_FILEINFO
                ), RecursiveIteratorIterator::SELF_FIRST
            );
            $list = [];
            foreach( $iterator as $pathname => $info ){
                $pathname = str_replace( DS, '/', $pathname );
                $localpath = $root . mb_substr( $pathname, $base_len );
                if( $info->isFile() ){
                    // $zip->addFile( $pathname, $localpath );
                    $res = $zip->addFile( $pathname, ltrim( $localpath, '/' ) );
                } else {
                    $res = $zip->addEmptyDir( $localpath );
                }
            }
            if ( $res === false ) return $res;
            $res = $zip->close();
            if ( $res === false ) {
                $app = Prototype::get_instance();
                $zip_path = $app->zip_path;
                if ( basename( $zip_path ) == 'zip' && file_exists( $zip_path ) ) {
                    $file = $app->upload_dir() . DS . basename( $file );
                    $cmd = "cd {$dir};{$zip_path} {$file} -r ./";
                    $output = [];
                    $return_var = '';
                    exec( $cmd, $output, $return_var );
                    if ( $return_var === 0 ) $res = true;
                }
            }
        } else {
            return false;
        }
        return $res;
    }

    public static function update_permissions ( $app ) {
        $app = $app ? $app : Prototype::get_instance();
        $sessions = $app->db->model( 'session' )->load(
            ['kind' => 'PM', 'name' => 'user_permissions'], null, 'id' );
        if (! empty( $sessions ) ) {
            return $app->db->model( 'session' )->remove_multi( $sessions );
        }
        return true;
    }

    public static function editable_count ( $obj, $terms, $count_args, $extra, $count_extra, $ex_vals ) {
        $app = Prototype::get_instance();
        $model = $obj->_model;
        $perms = $app->permissions();
        $workspace_id = $app->param( 'workspace_id' );
        $user = $app->user();
        $add_extras = [];
        $has_workspace_id = $obj->has_column( 'workspace_id' );
        foreach ( $perms as $wsId => $perm ) {
            if ( $workspace_id && $workspace_id != $wsId ) {
                continue;
            }
            if ( $has_workspace_id ) {
                if ( in_array( 'workspace_admin', $perm ) ) {
                    $add_extras[] = " {$model}_workspace_id={$wsId} ";
                    continue;
                } else if ( in_array( 'can_activate_' . $model, $perm ) && in_array( 'can_update_all_' . $model, $perm ) ) {
                    $add_extras[] = " {$model}_workspace_id={$wsId} ";
                    continue;
                }
            }
            $add_extra = '';
            if (! in_array( 'can_update_all_' . $model, $perm ) ) {
                if ( in_array( 'can_update_assoc_' . $model, $perm ) ) {
                    $association_users = $app->association_user_ids();
                    $add_extra = " {$model}_user_id IN (" . implode( ',', $association_users ) . ') ' ;
                } else if ( in_array( 'can_update_own_' . $model, $perm ) ) {
                    $add_extra = " {$model}_user_id={$user->id} "; 
                } else {
                    $add_extra = " {$model}_user_id=0 "; 
                }
            }
            if (! in_array( 'can_activate_' . $model, $perm ) ) {
                if ( in_array( 'can_review_' . $model, $perm ) ) {
                    $add_status = " {$model}_status < 2 ";
                    $add_extra = $add_extra ? $add_extra .= " AND {$add_status}" : $add_status;
                } else {
                    $add_status = " {$model}_status = 0 ";
                    $add_extra = $add_extra ? $add_extra .= " AND {$add_status}" : $add_status;
                }
            }
            if ( $has_workspace_id ) {
                if ( $add_extra ) {
                    $add_extra = " {$model}_workspace_id={$wsId} AND {$add_extra}";
                } else {
                    $add_extra = " {$model}_workspace_id !={$wsId} ";
                }
                $add_extras[] = $add_extra;
            }
        }
        if (!empty( $add_extras ) ) {
            if ( $count_extra ) {
                $count_extra = ' AND (' . implode( ' OR ', $add_extras ) . ')' . $count_extra;
            } else {
                $count_extra = ' AND (' . implode( ' OR ', $add_extras ) . ')' . $extra;
            }
        }
        return $obj->count( $terms, $count_args, 'id', $count_extra, $ex_vals, true );
    }

    public static function object_to_resource ( $obj, $type = 'api', $required = null, $depth = 0 ) {
        $app = Prototype::get_instance();
        $scheme = $app->get_scheme_from_db( $obj->_model );
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $translates = isset( $scheme['translate'] ) ? $scheme['translate'] : [];
        $options = self::$list_options[ $obj->_model ] ?? null;
        $tag_regex = '/<\${0,1}' . $app->ctx->prefix . '/si';
        if ( $options === null ) {
            $options = isset( $scheme['options'] ) ? $scheme['options'] : [];
            foreach ( $options as $idx => $opt ) {
                if ( preg_match( $tag_regex, $opt ) ) {
                    $options[ $idx ] = $app->ctx->build( $opt );
                }
            }
            self::$list_options[ $obj->_model ] = $options;
        }
        $column_defs = $scheme['column_defs'];
        $list_properties = $scheme['list_properties'];
        $edit_properties = $scheme['edit_properties'];
        $vars = $obj->get_values( true );
        $option_items = self::$option_items;
        if ( $type == 'list' ) {
            if ( $workspace = $obj->workspace ) {
                $vars['_site_url'] = $workspace->site_url;
                $vars['_link_url'] = $workspace->link_url;
                $vars['_show_both'] = $workspace->show_both;
            } else {
                $vars['_site_url'] = $app->site_url;
                $vars['_link_url'] = $app->link_url;
                $vars['_show_both'] = $app->show_both;
            }
        }
        if ( $obj->has_column( 'user_id' ) ) {
            $vars['_user_id'] = $obj->user_id;
        }
        $object_keys = array_keys( $vars );
        if ( in_array( 'object_id', $object_keys ) && in_array( 'model', $object_keys ) ) {
            $object_id = (int) $vars['object_id'];
            $object_model = $vars['model'];
            if ( $object_model && $object_id ) {
                $obj_table = $app->get_table( $object_model );
                if ( $obj_table ) {
                    $_primary = $obj_table->primary;
                    $cols = $_primary ? "id,{$_primary}" : 'id';
                    $obj_model = $app->db->model( $object_model )->load( $object_id, null, $cols );
                    if ( $obj_model ) {
                        $name = $obj_model->$_primary
                              ? $obj_model->$_primary
                              : "null(id:{$object_id})";
                        $vars['_model_primary'] = $name;
                    }
                }
            }
            $vars['_model_primary'] = $vars['_model_primary'] ?? null;
        }
        foreach ( $vars as $key => $var ) {
            if ( $key != 'status' && $required && ! in_array( $key, $required ) ) continue;
            if ( isset( $column_defs[ $key ] ) && isset( $column_defs[ $key ]['type'] ) ) {
                if ( $column_defs[ $key ]['type'] == 'blob' ) {
                    unset( $vars[ $key ] );
                    continue;
                }
            }
            if ( isset( $edit_properties[ $key ] ) && $edit_properties[ $key ] == 'password(hash)' ) {
                 unset( $vars[ $key ] );
                 continue;
            } else if ( isset( $edit_properties[ $key ] ) && $edit_properties[ $key ] == 'selection' ) {
                if ( isset( $options[ $key ] ) && mb_substr_count( $options[ $key ], '=' ) > 1 ) {
                    if ( isset( $option_items[ $key ] ) || !preg_match( $tag_regex, $options[ $key ] ) ) {
                        $items = $option_items[ $obj->_model ][ $key ] ?? explode( ',', $options[ $key ] );
                        self::$option_items[ $obj->_model ][ $key ] = $items;
                        if ( strpos( $vars[ $key ], ',' ) === false ) {
                            foreach ( $items as $item ) {
                                if ( strpos( $item, '=' ) !== false ) {
                                    list( $v, $disp ) = explode( '=', $item );
                                    if ( $vars[ $key ] === $v ) {
                                        if ( in_array( $key, $translates ) ) {
                                            $disp = $app->translate( $disp );
                                        }
                                        $vars[ $key ] = $disp;
                                        break;
                                    }
                                }
                            }
                        } else {
                            $values = explode( ',', $vars[ $key ] );
                            foreach ( $values as $idx => $value ) {
                                foreach ( $items as $item ) {
                                    if ( strpos( $item, '=' ) !== false ) {
                                        list( $v, $disp ) = explode( '=', $item );
                                        if ( $value === $v ) {
                                            if ( in_array( $key, $translates ) ) {
                                                $disp = $app->translate( $disp );
                                            }
                                            $values[ $idx ] = $disp;
                                            continue;
                                        }
                                    }
                                }
                            }
                            $vars[ $key ] = implode( ',', $values );
                        }
                    }
                }
            }
            if ( isset( $list_properties[ $key ] ) ) {
                if (! in_array( $key, $relations ) ) {
                    $rel_obj = null;
                    $prop = $list_properties[ $key ];
                    if ( $prop && strpos( $prop, 'reference:' ) === 0 ) {
                        $props = explode( ':', $prop );
                        $rel_model = $props[1];
                        $rel_col = $props[2];
                        if ( $rel_col == '__primary__' ) {
                            $rel_table = $app->get_table( $rel_model );
                            $rel_col = $rel_table->primary;
                        }
                        if ( $rel_model == '__any__' ) {
                            if (! isset( $vars['model'] ) ) continue;
                            $rel_model = $obj->model;
                        }
                        if (! isset( $vars[ $key ] ) ) {
                            if ( $column_defs[ $key ]['type'] === 'int'
                                && isset( $column_defs[ $key ]['default'] ) && $column_defs[ $key ]['default'] ) {
                                $vars[ $key ] = $column_defs[ $key ]['default'];
                            }
                        }
                        if ( isset( $vars[ $key ] ) && ctype_digit( (string) $vars[ $key ] ) && $vars[ $key ] ) {
                            $ref_id = (int) $vars[ $key ];
                            if ( $ref_id ) {
                                if ( $type === 'api' && !$depth ) {
                                    $rel_obj = $app->db->model( $rel_model )->load( $ref_id );
                                } else {
                                    $rel_obj = $app->db->model( $rel_model )->load( $ref_id, null, "id,{$rel_col}" );
                                }
                            }
                            if ( $rel_obj ) {
                                if ( $type === 'api' && !$depth ) {
                                    $depth++;
                                    $vars[ $key ] = self::object_to_resource( $rel_obj, $type, null, $depth );
                                } else {
                                    if ( $rel_obj->has_column( $rel_col ) ) {
                                        if ( $key == 'workspace_id' ) {
                                            $vars['workspace_name'] = $rel_obj->$rel_col;
                                            $vars['_site_url'] = $rel_obj->site_url;
                                            $vars['_link_url'] = $rel_obj->link_url;
                                        } else {
                                            $vars[ $key ] = $rel_obj->$rel_col;
                                        }
                                    }
                                }
                            } else {
                                if ( $key === 'user_id' ) {
                                    $vars[ $key ] = $app->translate( '*Unspecified*' );
                                } else if ( $key === 'workspace_id' ) {
                                    $vars[ $key ] = $ref_id;
                                    $vars['workspace_name'] = $ref_id
                                                            ? $app->translate( '*Deleted*' ) : '';
                                } else {
                                    $vars[ $key ] = $ref_id ? $app->translate( '*Deleted*' ) : null;
                                }
                            }
                        } else {
                            if ( $key !== 'workspace_id' ) {
                                $vars[ $key ] = $app->translate( '*Unspecified*' );
                            }
                        }
                    }
                    if ( $type === 'list' ) {
                        switch ( true ) {
                            case $prop === 'primary':
                                //$vars[ $key ] = self::trim_to( $vars[ $key ], 60 );
                                if ( in_array( $key, $translates ) ) {
                                    $vars["__{$key}"] = $vars[ $key ];
                                    $vars[ $key ] = $app->translate( $vars[ $key ] );
                                }
                                break;
                            case $prop === 'datetime':
                                $format = 'Y-m-d H:i';
                                if ( in_array( $key, $translates ) ) {
                                    $format = $app->translate( $format );
                                }
                                if ( $vars[ $key ] ) $vars[ $key ] =
                                date( $format, strtotime( $obj->db2ts( $vars[ $key ] ) ) );
                                break;
                            case $prop === 'date':
                                $format = 'Y-m-d';
                                if ( in_array( $key, $translates ) ) {
                                    $format = $app->translate( $format );
                                }
                                if ( $vars[ $key ] ) $vars[ $key ] =
                                date( $format, strtotime( $obj->db2ts( $vars[ $key ] ) ) );
                                break;
                            case $key === 'status':
                                $vars["__{$key}"] = $vars[ $key ];
                                if (! empty( $options ) ) {
                                    $status_opt = $options['status'];
                                    $args = ['options' => $status_opt,
                                             'status' => $vars[ $key ],
                                             'icon' => 1, 'text' => 1];
                                    $vars['_status_text'] =
                                        $app->core_tags->hdlr_statustext( $args, $app->ctx );
                                }
                                break;
                            case $prop === 'text':
                                $vars["__{$key}"] = isset( $vars[ $key ] ) ? $vars[ $key ] : null;
                                if ( in_array( $key, $translates ) ) {
                                    $vars[ $key ] = $app->translate( $vars[ $key ] );
                                }
                                if (! isset( $vars[ $key ] ) || $vars[ $key ] === null ) {
                                    $vars[ $key ] = '';
                                }
                                $vars[ $key ] = self::trim_to( $vars[ $key ], 128 );
                                break;
                            case $prop === 'text_short':
                                $vars["__{$key}"] = $vars[ $key ];
                                if ( in_array( $key, $translates ) ) {
                                    $vars[ $key ] = $app->translate( $vars[ $key ] );
                                }
                                if ( $vars[ $key ] === null ) {
                                    $vars[ $key ] = '';
                                }
                                $vars[ $key ] = self::trim_to( $vars[ $key ], 22 );
                                break;
                            case $prop === 'password':
                                $vars[ $key ] = $vars[ $key ] ? '**********...' : '';
                                break;
                            default:
                                if ( in_array( $key, $translates ) ) {
                                    $vars["__{$key}"] = $vars[ $key ];
                                    $vars[ $key ] = $app->translate( $vars[ $key ] );
                                }
                        }
                    }
                }
            }
        }
        if (! isset( $vars['workspace_name'] ) ) $vars['workspace_name'] = '';
        if (! isset( $vars['_status_text'] ) ) {
            if ( isset( $vars['status'] ) ) {
                $status_opt = $options['status'];
                $args = ['options' => $status_opt,
                         'status' => $vars['status'],
                         'text' => 1];
                $vars['_status_text'] = $app->core_tags->hdlr_statustext( $args, $app->ctx );
            } else if ( $type == 'list' ) {
                $vars['_status_text'] = '';
            }
        }
        $thumbnail = false;
        $vars['_icon'] = '';
        $vars['_icon_class'] = '';
        $vars['_has_file'] = '';
        $app->assets_c = is_string( $app->assets_c ) ? rtrim( $app->assets_c, DS ) : false;
        foreach ( $edit_properties as $col => $prop ) {
            if ( $thumbnail && $required && ! in_array( $col, $required ) ) continue;
            if ( $prop === 'file' ) {
                $vars['_has_file'] = 1;
                $meta_vars = [];
                $meta = $app->db->model( 'meta' )->get_by_key(
                    ['model' => $obj->_model, 'object_id' => $obj->id,
                     'kind' => 'metadata', 'key' => $col ], null, ['id', 'text'] );
                if ( $meta->id ) {
                    $meta_vars = json_decode( $meta->text, true );
                    $url = $app->get_assetproperty( $obj, $col, 'url' );
                    $meta_vars['url'] = $url;
                    $vars['_icon_class'] = isset( $meta_vars['class'] )
                                         ? $meta_vars['class'] : '';
                    $ext = $meta_vars['extension'];
                    if ( $ext === 'zip' || $ext === 'gz' || $ext === 'tar' ) {
                        $vars['_icon_class'] = 'archive';
                    }
                    if (! $thumbnail && ( $vars['_icon_class'] == 'image' || $ext == 'svg' ) ) {
                        $uploaded = $meta->db2ts( $meta_vars['uploaded'] );
                        $icon = $app->admin_url
                              . '?__mode=get_thumbnail&square=1&id=' . $meta->id . "&ts={$uploaded}";
                        $ts_param = "ts={$uploaded}";
                        if ( $app->assets_c && is_dir( $app->assets_c ) ) {
                            $thumb_model = $obj->_model;
                            $asset_id = $obj->id;
                            $file_ext = $meta_vars['extension'];
                            $tuumb = "thumb-{$thumb_model}-128xauto-square-{$asset_id}-{$col}.{$file_ext}";
                            $thumb_path = $app->assets_c . DS . $tuumb;
                            if ( file_exists( $thumb_path ) ) {
                                $icon = $app->assets_c_path ? $app->assets_c_path . $tuumb
                                                            : $app->base . $app->path . $thumb_path;
                                $icon .= '?' . $ts_param;
                            }
                        }
                        $vars['_icon'] = $icon;
                        $icon2 = $app->admin_url
                              . '?__mode=get_thumbnail&id=' . $meta->id . '&' . $ts_param;
                        $vars['_icon_large'] = $icon2;
                        $thumbnail = true;
                        if ( in_array( $col, $object_keys ) ) {
                            $vars[ $col ] = isset( $meta_vars['file_name'] )
                                          ? $meta_vars['file_name'] : $meta_vars;
                        }
                    }
                    break;
                }
            }
        }
        foreach ( $relations as $name => $to_obj ) {
            if ( $required && ! in_array( $name, $required ) ) continue;
            if ( $to_obj == '__any__' ) $to_obj = null;
            $rel_objs = $app->get_relations( $obj, $to_obj, $name );
            $relation_vars = [];
            if (! empty( $rel_objs ) ) {
                if (! $to_obj ) {
                    $first = $rel_objs[0];
                    $to_obj = $first->to_obj;
                }
                $rel_table = $app->get_table( $to_obj );
                if (! $rel_table ) continue;
                if (! isset( $list_properties[ $name ] ) ) continue;
                $prop = $list_properties[ $name ];
                $props = explode( ':', $prop );
                $rel_col = isset( $props[2] ) ? $props[2] : 'null';
                if ( $rel_col === 'primary' || !$rel_col || $rel_col == 'null' ) {
                    $rel_col = $rel_table->primary;
                }
                $rel_ids = [];
                foreach ( $rel_objs as $rel_obj ) {
                    $rel_ids[] = (int) $rel_obj->to_id;
                }
                foreach ( $rel_objs as $rel_obj ) {
                    $to_id = (int) $rel_obj->to_id;
                    $rel_obj = $app->db->model( $to_obj )->load( $to_id );
                    if ( $rel_obj ) {
                        if ( $type === 'api' && !$depth ) {
                            $depth++;
                            $relation_vars[] = self::object_to_resource( $rel_obj, $type, null, $depth );
                        } else {
                            $rel_value = $rel_obj->$rel_col;
                            if ( $type === 'list' ) {
                                if ( in_array( $name, $translates ) ) {
                                    $rel_value = $app->translate( $rel_value );
                                }
                            }
                            $rel_value = $type === 'list'
                                       ? self::trim_to( $rel_value, 22 )
                                       : $rel_value;
                            $relation_vars[] = $rel_value;
                        }
                    }
                }
            }
            $vars[ $name ] = $relation_vars;
        }
        $vars['_permalink'] = '';
        if ( $permalink = $app->get_permalink( $obj ) ) {
            if ( $app->allow_login && $app->add_param_permalink && $obj->has_column( 'status' ) ) {
                $app->add_param_permalink( $obj, $permalink );
            }
            $vars['_permalink'] = $permalink;
        }
        if ( $obj->has_column( 'rev_type' ) ) {
            $vars['rev_type'] = $obj->rev_type;
        }
        if ( $user = $app->user() ) {
            if ( isset( $column_defs['status'] ) && $type == 'list' ) {
                $vars['_max_status']
                    = $app->max_status( $user, $obj->_model, $obj->workspace );
            }
        }
        if ( $app->can_pull_back && $obj->has_column( 'previous_owner' ) ) {
            $vars['_previous_owner'] = $obj->previous_owner;
        }
        return $vars;
    }

    public static function trim_to ( $str, $num ) {
        $app = Prototype::get_instance();
        $ctx = $app->ctx;
        return $ctx->modifier_truncate( $str, "{$num}+...", $ctx );
    }

    public static function sort_by_order ( &$registries, $default = 50, $widget = false ) {
        $registries_all = [];
        foreach ( $registries as $key => $registry ) {
            $registry['key'] = $key;
            $order = isset( $registry['order'] ) ? $registry['order'] : $default;
            $item_by_order = isset( $registries_all[ $order ] ) ? $registries_all[ $order ] : [];
            $item_by_order[] = $registry;
            $registries_all[ $order ] = $item_by_order;
        }
        ksort( $registries_all );
        if ( $widget ) {
            $ordered = [];
            foreach ( $registries_all as $appWidget ) {
                foreach ( $appWidget as $_Widget ) {
                    $key = $_Widget['key'];
                    unset( $_Widget['key'] );
                    $ordered[ $key ] = $_Widget;
                }
            }
            $registries = $ordered;
            return $registries;
        }
        $registries = [];
        foreach ( $registries_all as $registry_by_order ) {
            foreach ( $registry_by_order as $r ) {
                $registries[] = $r;
            }
        }
        return $registries;
    }

    public static function trim_image ( $file, $x, $y, $w, $h ) {
        $app = Prototype::get_instance();
        $extension = self::get_extension( $file, true );
        $res = false;
        $out_func = 'imagejpeg';
        $src_func = 'imagecreatefromjpeg';
        switch ( $extension ) {
            case 'jpg':
                break;
            case 'jpeg':
                break;
            case 'png':
                $out_func = 'imagepng';
                $src_func = 'imagecreatefrompng';
                break;
            case 'gif':
                $out_func = 'imagegif';
                $src_func = 'imagecreatefromgif';
                break;
            case 'webp':
                $out_func = 'imagewebp';
                $src_func = 'imagecreatefromwebp';
                break;
            default:
                return false;
        }
        if ( $app->get_image_src_func ) {
            $src_func = self::get_src_func( $file );
            if (! $src_func ) {
                return false;
            }
        }
        if ( $src_func === 'imagecreatefromwebp' ) {
            if ( self::is_webp_animated( $file ) ) {
                trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                return false;
            }
        }
        $resource = @$src_func( $file );
        if ( $resource === false ) {
            if ( $image === false ) {
                trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                return false;
            }
        }
        self::crop_image( $resource, $x, $y, $w, $h );
        rename( $file, "{$file}.bk" );
        $im = @$out_func( $resource, $file );
        if ( $im !== false ) {
            @unlink( "{$file}.bk" );
            $res = true;
        } else {
            rename( "{$file}.bk", $file );
            trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $out_func ] ) );
            return false;
        }
        return $res;
    }

    public static function crop_image ( &$resource, $x, $y, $w, $h ) {
        $resource = imagecrop( $resource, [
            'x'      => $x,
            'y'      => $y,
            'width'  => $w,
            'height' => $h,
        ]);
    }

    public static function send_mail ( $to, $subject, $body, $headers = [],
                                      &$error = '', $multipart = false ) {
        $app = Prototype::get_instance();
        $subject = str_replace( "\0", '', $subject );
        $body = str_replace( "\0", '', $body );
        if ( $app->mail_encording && ! $app->mail_encoding ) {
            // encording is typo.
            $app->mail_encoding = $app->mail_encording;
        }
        if ( $app->fix_email_from && isset( $headers['From'] ) ) {
            if ( is_string( $app->fix_email_from )
                && $app->is_valid_email( $app->fix_email_from, $error )
                && $headers['From'] != $app->fix_email_from ) {
                $headers['From'] = $app->fix_email_from;
            } else {
                unset( $headers['From'] );
            }
        }
        $from = isset( $headers['From'] )
            ? $headers['From'] : $app->system_email();
        if ( is_string( $to ) && strpos( $to, ',' ) !== false ) {
            $to = preg_split( '/\s*,\s*/', $to );
        }
        if ( is_array( $to ) ) {
            $to = array_filter( $to, 'strlen' );
            foreach ( $to as $idx => $addr ) {
                if (!$app->is_valid_email( $addr, $error ) ) {
                    unset( $to[ $idx ] );
                    continue;
                }
            }
            $to = implode( ',', $to );
        } else {
            if (!$app->is_valid_email( $to, $error ) ) {
                return false;
            }
        }
        if ( $from === null || is_object( $from ) ) {
            $from = $from ? $from : $app->get_config( 'system_email' );
            $from = $from->value;
        }
        $header_from = $from;
        if (!$app->is_valid_email( $header_from, $error ) ) {
            return false;
        }
        if (! $to || ! $from ||! $subject ) {
            $error = $app->translate( 'To, From and Subject are required.' );
            return false;
        }
        $subject = str_replace( ["\r\n", "\n", "\r"], '', $subject );
        if ( isset( $headers['From'] ) && $from != $headers['From'] ) {
            $from = $headers['From'];
        }
        $headers['From'] = $from;
        $wrap_email = (int) $app->wrap_email;
        if ( $wrap_email && !$multipart ) {
            $body = $app->ctx->modifier_wrap( $body, $wrap_email );
        }
        mb_internal_encoding( $app->encoding );
        $mb_language = mb_language();
        if ( $app->mail_language && is_string( $app->mail_language ) ) {
            mb_language( $app->mail_language );
        }
        $callback = is_array( $multipart ) ? $multipart : [];
        $callback['name'] = 'mail_filter';
        $callback['error'] = $error;
        $app->init_callbacks( 'mail_filter', 'mail_filter' );
        if (! $app->run_callbacks( $callback, 'mail_filter', $to, $subject, $body, $headers ) ) {
            $error = $callback['error'];
            return false;
        } else if ( isset( $callback['cancel'] ) && $callback['cancel'] ) {
            return true;
        }
        $from = isset( $headers['From'] ) ? $headers['From'] : $from;
        $from = self::encode_mimeheader( $from );
        $options = "From: {$from}\r\n";
        foreach ( $headers as $key => $value ) {
            $key = str_replace( ["\r\n", "\n", "\r"], '', $key );
            $value = str_replace( ["\r\n", "\n", "\r"], '', $value );
            $value = self::encode_mimeheader( $value );
            $key = ucwords( $key );
            if ( $key == 'From' ) continue;
            if ( $key == 'Cc' || $key == 'Bcc' ) {
                $addrs = [];
                if ( is_array( $value ) || strpos( $value, ',' ) !== false ) {
                    if (! is_array( $value ) ) {
                        $value = preg_split( '/\s*,\s*/', $value );
                    }
                    $value = array_filter( $value, 'strlen' );
                    foreach ( $value as $addr ) {
                        $email = $addr; // User Name <username@powercmsx.jp>
                        if ( $app->is_valid_email( $addr, $error ) ) {
                            $addrs[] = $email;
                        }
                    }
                } else {
                    $email = $value; // User Name <username@powercmsx.jp>
                    if ( $app->is_valid_email( $value, $error ) ) {
                        $addrs[] = $email;
                    }
                }
                if (! empty( $addrs ) ) {
                    $value = implode( ',', $addrs );
                    if ( $app->mail_not_cc && $key == 'Cc' ) {
                        $to .= ',' . $value;
                    } else if ( $app->mail_not_cc && $key == 'Bcc' ) {
                        $bcc_headers = $headers;
                        unset( $bcc_headers['Cc'], $bcc_headers['Bcc'] );
                        self::send_mail( $value, $subject, $body, $bcc_headers, $error, $multipart );
                    } else {
                        $options .= "{$key}: {$value}\r\n";
                    }
                }
            } else {
                $options .= "{$key}: {$value}\r\n";
            }
        }
        unset( $headers['From'] );
        $envelope_from = $app->mail_return_path;
        if ( $envelope_from === true ) {
            // User Name <username@powercmsx.jp> to username@powercmsx.jp.
            $app->is_valid_email( $from, $error );
            $additional = '-f' . $from;
        } else {
            $additional = $envelope_from && $app->is_valid_email( $envelope_from, $error ) ? '-f' . $envelope_from : '';
        }
        if ( $app->mail_transfer && $app->mail_transfer == 'debug' ) {
            ob_start();
            var_dump( $headers );
            $headers = ob_get_clean();
            ob_start();
            var_dump( $options );
            $options = ob_get_clean();
            $metadata = ['mailto' => $to, 'subject' => $subject, 'body' => $body,
                         'headers' => $headers, 'options' => $options,
                         'multipart' => $multipart, 'multipart' => $multipart,
                         'language' => $app->mail_language, 'encoding' => $app->mail_encoding ];
            $app->log( ['message' => $subject, 'metadata' => $metadata ] );
            return true;
        }
        if ( $app->mail_language && $app->mail_language == 'uni' && $multipart ) {
            if ( $app->mail_encoding ) {
                $subject = mb_encode_mimeheader( $subject, strtoupper( $app->mail_encoding ) );
            } else {
                $subject = mb_encode_mimeheader( $subject, 'UTF-8' );
            }
            $res = mail( $to, $subject, $body, $options, $additional );
        } else {
            $res = mb_send_mail( $to, $subject, $body, $options, $additional );
        }
        if ( $app->mail_language ) {
            mb_language( $mb_language );
        }
        return $res;
    }

    public static function send_multipart_mail ( $to, $subject, $body, $headers,
                                                 $files = [], &$error = '' ) {
        $app = Prototype::get_instance();
        $content_type = isset( $headers['Content-Type'] ) ? $headers['Content-Type'] : 'text/plain';
        $boundary = '__BOUNDARY__' . md5( rand() );
        $headers['Content-Type'] = "multipart/mixed;boundary=\"{$boundary}\"";
        if ( $app->mail_encording && ! $app->mail_encoding ) {
            // encording is typo.
            $app->mail_encoding = $app->mail_encording;
        }
        $charset = $app->mail_encoding ? strtoupper( $app->mail_encoding ) : 'ISO-2022-JP';
        if ( $app->mail_language && $app->mail_language == 'uni' ) {
            $charset = 'UTF-8';
        }
        $wrap_email = (int) $app->wrap_email;
        if ( $wrap_email ) {
            $body = $app->ctx->modifier_wrap( $body, $wrap_email );
        }
        $text = $body;
        $body = "--{$boundary}\n";
        $body .= "Content-Type: {$content_type}; charset=\"{$charset}\"\n\n";
        $body .= $text . "\n";
        $body .= "--{$boundary}\n";
        $existing_files = [];
        foreach ( $files as $file ) {
            if ( is_object( $file ) ) { // Session
                $upload_dir = $app->upload_dir();
                $file_path = $upload_dir . DS . $file->value;
                file_put_contents( $file_path, $file->data );
                $file = $file_path;
            }
            if ( file_exists( $file ) ) {
                $existing_files[] = $file;
            }
        }
        $counter = 0;
        foreach ( $existing_files as $file ) {
            $reference = basename( $file );
            $file_name = self::encode_mimeheader( $reference );
            $body .= "Content-Type: application/octet-stream; name=\"{$file_name}\"\n";
            $body .= "Content-Disposition: attachment; filename=\"{$file_name}\"\n";
            $body .= "Content-Transfer-Encoding: base64\n";
            $body .= "\n";
            $body .= chunk_split( base64_encode( file_get_contents( $file ) ) );
            $counter++;
            $body .= $counter == count( $existing_files ) ? "--{$boundary}--\n" : "--{$boundary}\n";
        }
        return self::send_mail( $to, $subject, $body, $headers, $error, true );
    }

    public static function encode_mimeheader ( &$value ) {
        if ( mb_strlen( $value ) == strlen( $value ) ) return $value;
        $app = Prototype::get_instance();
        if ( strpos( $value, '<' ) !== false && strpos( $value, '>' ) !== false
            && preg_match( '/(^.*?)<(.*?)>$/', $value, $matches ) ) {
            list( $addr, $value ) = [ $matches[2], $matches[1] ];
            if ( $app->mail_encoding ) {
                $value = mb_encode_mimeheader( $value, strtoupper( $app->mail_encoding ) );
            } else {
                $value = mb_encode_mimeheader( $value );
            }
            $value = "{$value}<{$addr}>";
        } else {
            if ( $app->mail_encoding ) {
                $value = mb_encode_mimeheader( $value, strtoupper( $app->mail_encoding ) );
            } else {
                $value = mb_encode_mimeheader( $value );
            }
        }
        return $value;
    }

    public static function convert_breaks ( $str = '' ) {
        if (! $str ) return '';
        $results = [];
        $lines = preg_split( '/[\r?\n]{2}/', $str );
        $perttern = '/^<\/?(?:h|table|tr|dl|ul|ol|div|p|pre|blockquote|address|hr)/';
        $in_paragraph = false;
        foreach ( $lines as $line ) {
            if ( preg_match( "/<p/i", $line ) ) {
                $after = preg_replace( "/.*<p[^>]*>/i", '', $line );
                if (! preg_match( "/<\/p/i", $after ) ) {
                    $in_paragraph = true;
                }
            }
            if (!preg_match( $perttern, $line ) ) {
                $line = preg_replace( '/\r?\n/', '<br />' . PHP_EOL, $line );
                if (! $in_paragraph ) {
                    $line = "<p>{$line}</p>";
                } else {
                    $line = "<br /><br />{$line}";
                }
            }
            if ( preg_match( "/<\/p/i", $line ) ) {
                $after = preg_replace( "/.*<\/p[^>]*>/i", '', $line );
                if (! preg_match( "/<p/i", $after ) ) {
                    $in_paragraph = false;
                }
            }
            $results[] = $line;
        }
        return implode( PHP_EOL . PHP_EOL, $results );
    }

    public static function export_data ( $path, $mimetype = '', $inline = false ) {
        $file_size = filesize( $path );
        $file_name = basename( $path );
        if (! $mimetype ) {
            $extension = isset( pathinfo( $path )['extension'] )
                       ? pathinfo( $path )['extension'] : '';
            $mimetype = self::get_mime_type( $extension );
        }
        $app = Prototype::get_instance();
        if ( $app->output_compression ) {
            ini_set( 'zlib.output_compression', 'On' );
        }
        header( "Content-Type: {$mimetype}" );
        header( "Content-Length: {$file_size}" );
        if (! $inline ) {
            header( "Content-Disposition: attachment;"
                . " filename=\"{$file_name}\"" );
            header( 'Pragma: ' );
        }
        while ( ob_get_level() ) {
            ob_end_flush();
        }
        flush();
        readfile( $path );
        // echo file_get_contents( $path );
    }

    public static function get_asset_class ( $extension ) {
        $app = Prototype::get_instance();
        $extension = strtolower( $extension );
        if ( in_array( $extension, $app->videos ) ) {
            return 'video';
        } elseif ( in_array( $extension, $app->images ) ) {
            return 'image';
        } elseif ( in_array( $extension, $app->audios ) ) {
            return 'audio';
        } elseif ( $extension==='pdf' ) {
            return 'pdf';
        } else {
            return 'file';
        }
    }

    public static function next_prev ( $app, $obj, $nextprev = 'both' ) {
        $db = $app->db;
        $model = $obj->_model;
        $date_col = $app->get_date_col( $obj );
        if (! $date_col ) {
            return null;
        }
        $nextprev_objs = ['next' => null, 'previous' => null];
        $nextprev_terms = [];
        if ( $obj->has_column( 'rev_type' ) ) {
            $nextprev_terms['rev_type'] = 0;
        }
        if ( $obj->has_column( 'status' ) ) {
            $nextprev_terms['status'] = $app->status_published( $obj );
        }
        if ( $obj->has_column( 'workspace_id' ) ) {
            $nextprev_terms['workspace_id'] = (int) $obj->workspace_id;
        }
        $nextprev_terms['id'] = ['!=' => $obj->id ];
        if ( $nextprev == 'next' || $nextprev == 'both' ) {
            $nextprev_terms[ $date_col ] = [ '>=' => $obj->$date_col ];
            $nextprev_args = ['limit' => 1, 'sort' => $date_col, 'direction' => 'ascend'];
            $next_obj = $db->model( $model )->load( $nextprev_terms, $nextprev_args );
            if (!empty( $next_obj ) ) {
                $next_obj = $next_obj[0];
                if ( $obj->$date_col === $next_obj->$date_col ) {
                    if ( $obj->id > $next_obj->id ) {
                        $nextprev_terms['id'] = ['>' => $obj->id ];
                        $next_obj = $db->model( $model )->load( $nextprev_terms, $nextprev_args );
                        if (!empty( $next_obj ) ) {
                            $next_obj = $next_obj[0];
                        }
                    }
                }
            }
            if (! is_object( $next_obj ) || empty( $next_obj ) ) {
                $next_obj = null;
            }
            if ( $nextprev == 'next' ) {
                return $next_obj;
            }
            $nextprev_objs['next'] = $next_obj;
        }
        if ( $nextprev == 'previous' || $nextprev == 'both' ) {
            $nextprev_terms[ $date_col ] = [ '<=' => $obj->$date_col ];
            $nextprev_terms['id'] = ['!=' => $obj->id ];
            $nextprev_args = ['limit' => 1, 'sort' => $date_col, 'direction' => 'descend'];
            $prev_obj = $db->model( $model )->load( $nextprev_terms, $nextprev_args );
            if (!empty( $prev_obj ) ) {
                $prev_obj = $prev_obj[0];
                if ( $obj->$date_col === $prev_obj->$date_col ) {
                    if ( $obj->id < $prev_obj->id ) {
                        $nextprev_terms['id'] = ['<' => $obj->id ];
                        $prev_obj = $db->model( $model )->load( $nextprev_terms, $nextprev_args );
                        if (!empty( $prev_obj ) ) {
                            $prev_obj = $prev_obj[0];
                        }
                    }
                }
            }
            if (! is_object( $prev_obj ) || empty( $prev_obj ) ) {
                $prev_obj = null;
            }
            if ( $nextprev == 'previous' ) {
                return $prev_obj;
            }
            $nextprev_objs['previous'] = $prev_obj;
        }
        return $nextprev_objs;
    }

    public static function get_field_html ( $app ) {
        $app->validate_magic( true );
        $id = (int) $app->param( 'id' );
        $model = $app->param( 'model' );
        $workspace_id = $app->param( 'workspace_id' );
        if ( $app->param( '_type' ) == 'questiontype' ) {
            $field_model = $app->param( '_type' );
        } else {
            $field_model = $app->param( '_type' ) && $app->param( '_type' ) == 'fieldtype'
                     ? 'fieldtype' : 'field';
        }
        $field = $app->db->model( $field_model )->load( $id );
        header( 'Content-type: application/json' );
        if (!$field ) {
            echo json_encode( ['status' => 404,
                               'message' => $app->translate( 'Field not found.' ) ] );
            exit();
        }
        if ( $field_model == 'questiontype' ) {
            echo json_encode( ['status' => 200,
                    'content' => $field->template, 'class' => $field->class,
                    'aria_label' => $app->translate( $field->aria_label ) ] );
            exit();
        }
        $field_label = $field->label;
        $field_content = $field->content;
        if (!$field_label || !$field_content ) {
            if ( $field_model == 'field' ) {
                $field_type = $field->fieldtype;
                if ( $field_type ) {
                    if (!$field_label ) $field_label = $field_type->label;
                    if (!$field_content ) $field_content = $field_type->content;
                }
            }
        }
        if (!$field_label && ! $field_content ) {
            echo json_encode( ['status' => 404,
                     'message' => $app->translate( 'Field HTML not specified.' ) ] );
            exit();
        }
        if ( $field_model == 'fieldtype' ) {
            echo json_encode( ['status' => 200,
                    'hide_label' => $field->hide_label,
                    'label' => $field_label, 'content' => $field_content ] );
            exit();
        }
        $ctx = $app->ctx;
        $param = [];
        $field_name = $field->name;
        if ( $field->translate ) {
            $field_name = $app->translate( $field_name );
        }
        $ctx->local_vars['field_name'] = $field_name;
        $ctx->local_vars['field_required'] = $field->required;
        $basename = $field->basename;
        $ctx->local_vars['field_basename'] = $basename;
        $prefix = $field->_colprefix;
        $values = $field->get_values();
        foreach ( $values as $key => $value ) {
            $key = preg_replace( "/^$prefix/", '', $key );
            $ctx->local_vars[ 'field__' . $key ] = $value;
        }
        $options = $field->options;
        if ( $options ) {
            $labels = $field->options_labels;
            $options = preg_split( '/\s*,\s*/', $options );
            $labels = $labels ? preg_split( '/\s*,\s*/', $labels ) : $options;
            $i = 0;
            $field_options = [];
            foreach ( $options as $option ) {
                $label = isset( $labels[ $i ] ) ? $labels[ $i ] : $option;
                $field_options[] = ['field_label' => $label, 'field_option' => $option ];
                $i++;
            }
            $ctx->local_vars['field_options'] = $field_options;
        }
        if ( $app->param( 'field__out' ) ) {
            $ctx->local_vars['field__out'] = 1;
        }
        $uniqueid = $app->magic();
        $ctx->local_vars['field__hide_label'] = $field->hide_label;
        $ctx->local_vars['field_uniqueid'] = $uniqueid;
        $field_content = $ctx->build( $field_content );
        $ctx->local_vars['field_content_html'] = $field_content;
        list( $vars, $local_vars ) = [ $ctx->vars, $ctx->local_vars ];
        $field_content = $app->build_page( 'field' . DS . 'content.tmpl', $param, false );
        list( $ctx->vars, $ctx->local_vars ) = [ $vars, $local_vars ];
        $ctx->local_vars['field_content_html'] = $field_content;
        if (! $field->hide_label ) {
            $field_label = $ctx->build( $field_label );
            $ctx->local_vars['field_label_html'] = $field_label;
            list( $vars, $local_vars ) = [ $ctx->vars, $ctx->local_vars ];
            $field_label = $app->build_page( 'field' . DS . 'label.tmpl', $param, false );
            list( $ctx->vars, $ctx->local_vars ) = [ $vars, $local_vars ];
            $ctx->local_vars['field_label_html'] = $field_label;
        }
        list( $vars, $local_vars ) = [ $ctx->vars, $ctx->local_vars ];
        $html = $app->build_page( 'field' . DS . 'wrapper.tmpl', $param, false );
        list( $ctx->vars, $ctx->local_vars ) = [ $vars, $local_vars ];
        self::add_id_to_field( $html, $uniqueid, $basename );
        if (!$app->param( 'field__out' ) ) {
            $html = "<div id=\"field-{$basename}-wrapper\">{$html}</div>";
            $html .= $app->build_page( 'field' . DS . 'footer.tmpl', $param, false );
        }
        echo json_encode( ['html' => $html, 'status' => 200,
                           'basename' => $basename ] );
        exit();
    }

    public static function unique_filename ( $path, $counter = 1, $connector = '_' ) {
        $pathinfo = pathinfo( $path );
        $ext = isset( $pathinfo['extension'] ) ? $pathinfo['extension'] : '';
        $filename = $pathinfo['filename'];
        $filename = "{$filename}{$connector}{$counter}";
        if ( $ext ) $filename .= ".{$ext}";
        $_path = dirname( $path ) . DS . $filename;
        if ( file_exists( $_path ) ) {
            $counter++;
            return self::unique_filename( $path, $counter, $connector );
        }
        return $_path;
    }

    public static function remove_exif ( $file ) {
        $imginfo = @getimagesize( $file );
        if (! $imginfo ) return false;
        $pixel = $imginfo[0] > $imginfo[1] ? $imginfo[0] : $imginfo[1];
        $newfile = self::make_thumbnail( $file, $pixel, 'auto', 100 );
        if ( $newfile ) {
            copy( $newfile, $file );
            return filesize( $file );
        }
        return false;
    }

    public static function fix_orientation ( $file ) {
        $app = Prototype::get_instance();
        if (! function_exists( 'exif_read_data' ) ) {
            if ( $app->remove_exif ) {
                return self::remove_exif( $file );
            }
            return false;
        }
        $logging = $app->logging;
        $app->logging = false;
        $error_reporting = ini_get( 'error_reporting' );
        error_reporting(0);
        $exif = @exif_read_data( $file );
        $app->logging = $logging;
        error_reporting( $error_reporting );
        if ( $exif === false ) {
            return false;
        }
        if (! isset( $exif['Orientation'] ) ) return false;
        $orientation = (int)@$exif['Orientation'];
        if ( $orientation < 2 || $orientation > 8 ) {
            if ( $app->remove_exif ) {
                return self::remove_exif( $file );
            }
            return false;
        }
        if (! $app->use_imagine ) {
            return self::image_orientation( $file, $orientation );
        }
        $upload_dir = $app->upload_dir();
        $tmpfile = $upload_dir . DS . basename( $file );
        try {
            ini_set( 'memory_limit', -1 );
            $imagine = new \Imagine\Gd\Imagine();
            $lib_dir = LIB_DIR . 'Imagine' . DS;
            $reader = $lib_dir . 'Image' . DS . 'Metadata' . DS . 'ExifMetadataReader.php';
            require_once( $reader );
            $imagine->setMetadataReader( new Imagine\Image\Metadata\ExifMetadataReader() );
            $rotator = $lib_dir . 'Filter' . DS . 'Basic' . DS . 'Autorotate.php';
            require_once( $rotator );
            $autorotate = new Imagine\Filter\Basic\Autorotate( '000000', $app );
            $autorotate->apply( $imagine->open( $file ) )->save( $tmpfile );
            if ( $app->fmgr->exists( $tmpfile ) ) {
                $app->fmgr->rename( $tmpfile, $file );
                return filesize( $file );
            }
        } catch ( Imagine\Exception\Exception $e ) {
            return false;
        }
        return false;
    }

    public static function image_orientation ( $file, $orientation ) {
        $app = Prototype::get_instance();
        $extension = self::get_extension( $file, true );
        $upload_dir = $app->upload_dir();
        $tmpfile = $upload_dir . DS . basename( $file );
        $quality = $app->image_quality;
        switch ( $extension ) {
            case 'jpg':
                $src_func = 'imagecreatefromjpeg';
                $out_func = 'imagejpeg';
                break;
            case 'jpeg':
                $src_func = 'imagecreatefromjpeg';
                $out_func = 'imagejpeg';
                break;
            case 'gif':
                $src_func = 'imagecreatefromgif';
                $out_func = 'imagegif';
                $quality = null;
                break;
            case 'png':
                $src_func = 'imagecreatefrompng';
                $out_func = 'imagepng';
                if ( $quality >= 10 ) {
                    $quality *= 0.1;
                    $quality = (int) $quality;
                    if ( $quality > 9 ) {
                        $quality = 0;
                    }
                } else if ( $quality == 0 ) {
                    $quality = 9;
                }
                break;
            case 'webp':
                $src_func = 'imagecreatefromwebp';
                $out_func = 'imagewebp';
                break;
            default:
                return false;
        }
        if ( $app->get_image_src_func ) {
            $src_func = self::get_src_func( $file );
            if (! $src_func ) {
                trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                return false;
            }
        }
        if ( $src_func === 'imagecreatefromwebp' ) {
            if ( self::is_webp_animated( $file ) ) {
                trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                return false;
            }
        }
        if ( function_exists( $src_func ) && function_exists( $out_func ) ) {
            $image = @$src_func( $file );
            if ( $image === false ) {
                trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                return false;
            }
            $degrees = 0;
            switch( $orientation ) {
                case 8:
                    $degrees = 90;
                    break;
                case 3:
                    $degrees = 180;
                    break;
                case 6:
                    $degrees = 270;
                    break;
                case 2:
                    $mode = IMG_FLIP_HORIZONTAL;
                    break;
                case 7:
                    $degrees = 90;
                    $mode = IMG_FLIP_HORIZONTAL;
                    break;
                case 4:
                    $mode = IMG_FLIP_VERTICAL;
                    break;
                case 5:
                    $degrees = 270;
                    $mode = IMG_FLIP_HORIZONTAL;
                    break;
                default:
                    return false;
            }
            if ( isset( $mode ) ) {
                $image = imageflip( $image, $mode );
            }
            if ( $degrees > 0 ) {
                if ( $adjust = $app->imagerotate_adjust ) {
                    $degrees+= (int) $adjust;
                }
                $image = @imagerotate( $image, $degrees, 0 );
            }
            if ( $out_func === 'imagegif' ) {
                $im = @$out_func( $image, $tmpfile );
            } else {
                $im = @$out_func( $image, $tmpfile, $quality );
            }
            if ( $im === false ) {
                trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $tmpfile, $out_func ] ) );
                return false;
            }
            imagedestroy( $image );
            $res = $app->fmgr->rename( $tmpfile, $file );
            return filesize( $file );;
        }
        return false;
    }

    public static function make_thumbnail ( $file, $size = 480, $type = 'auto',
                                            $quality = 60, $square = false, $error = null ) {
        $app = Prototype::get_instance();
        $image_quality = $quality;
        $extension = self::get_extension( $file, true );
        if (! $extension ) {
            $extension = $type;
            rename( $file, "$file.$extension" );
            $file = "$file.$extension";
        }
        if ( $type == 'auto' ) {
            $type = $extension ? $extension : 'png';
            $extension = $type;
        } else if ( $extension === 'tmp' ) {
            $extension = $type;
        }
        $logging = $app->logging;
        $app->logging = false;
        $error_reporting = ini_get( 'error_reporting' );
        error_reporting(0);
        $upload_dir = $app->upload_dir();
        $filename = basename( $file );
        $outfile = $upload_dir . DS . basename( $filename ) . ".{$extension}";
        if ( $type !== 'auto' && $type !== $extension ) {
            $outfile = preg_replace( "/{$extension}$/", $type, $outfile );
        }
        if (! $app->use_imagine ) {
            $orig_path = $outfile;
            list( $orig_width, $orig_height ) = getimagesize( $file );
            $width  = $orig_width;
            $height = $orig_height;
            if ( $width > $height ) {
                $scale = $size / $width;
                $width = $size;
                $height = $height * $scale;
                $height = (int) $height;
            } else {
                $scale = $size / $height;
                $height = $size;
                $width = $width * $scale;
                $width = (int) $width;
            }
            if (! $width ) $width = 1;
            if (! $height ) $height = 1;
            switch ( $extension ) {
                case 'jpg':
                    $src_func = 'imagecreatefromjpeg';
                    $out_func = 'imagejpeg';
                    break;
                case 'jpeg':
                    $src_func = 'imagecreatefromjpeg';
                    $out_func = 'imagejpeg';
                    break;
                case 'gif':
                    $src_func = 'imagecreatefromgif';
                    $out_func = 'imagegif';
                    $quality = null;
                    break;
                case 'png':
                    $src_func = 'imagecreatefrompng';
                    $out_func = 'imagepng';
                    if ( $quality >= 10 ) {
                        $quality *= 0.1;
                        $quality = (int) $quality;
                        if ( $quality > 9 ) {
                            $quality = 0;
                        }
                    } else if ( $quality == 0 ) {
                        $quality = 9;
                    }
                    break;
                case 'webp':
                    $src_func = 'imagecreatefromwebp';
                    $out_func = 'imagewebp';
                    break;
                default:
                    return false;
            }
            if ( $type !== 'auto' && $type !== $extension ) {
                $quality = $image_quality;
                $extension = $type;
                $orig_path = $outfile;
                switch ( $type ) {
                    case 'jpg':
                        $out_func = 'imagejpeg';
                        break;
                    case 'jpeg':
                        $out_func = 'imagejpeg';
                        break;
                    case 'gif':
                        $out_func = 'imagegif';
                        $quality = null;
                        break;
                    case 'png':
                        $out_func = 'imagepng';
                        if ( $quality >= 10 ) {
                            $quality *= 0.1;
                            $quality = (int) $quality;
                            if ( $quality > 9 ) {
                                $quality = 0;
                            }
                        } else if ( $quality == 0 ) {
                            $quality = 9;
                        }
                        break;
                    case 'webp':
                        $out_func = 'imagewebp';
                        break;
                    default:
                        return false;
                }
            }
            if ( $app->get_image_src_func ) {
                $src_func = self::get_src_func( $file );
                if (! $src_func ) {
                    trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                    return false;
                }
            }
            if ( $src_func === 'imagecreatefromwebp' ) {
                if ( self::is_webp_animated( $file ) ) {
                    trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                    return false;
                }
            }
            if ( function_exists( $src_func ) && function_exists( $out_func ) ) {
                $src_img = @$src_func( $file );
                if ( $src_img === false ) {
                    error_reporting( $error_reporting );
                    $app->logging = $logging;
                    trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $file, $src_func ] ) );
                    return false;
                }
                $im = false;
                if ( $square ) {
                    $w = $orig_width;
                    $h = $orig_height;
                    if ( $w > $h ) {
                        $diff  = ( $w - $h ) * 0.5;
                        $diffW = $h;
                        $diffH = $h;
                        $diffY = 0;
                        $diffX = $diff;
                    } else {
                        if( $w == $h ) {
                            $diffW = $w;
                            $diffH = $h;
                            $diffY = 0;
                            $diffX = 0;
                        } else {
                            $diff  = ( $h - $w ) * 0.5;
                            $diffW = $w;
                            $diffH = $w;
                            $diffY = $diff;
                            $diffX = 0;
                        }
                    }
                    if (! $w ) $w = 1;
                    if (! $h ) $h = 1;
                    $thumb_image = imagecreatetruecolor( $size, $size );
                    if ( $extension === 'png' || $extension === 'webp' ) {
                        imagealphablending( $thumb_image, false );
                        imagesavealpha( $thumb_image, true );
                    }
                    imagecopyresampled( $thumb_image, $src_img, 0, 0, $diffX, $diffY, $size, $size, $diffW, $diffH );
                    if ( $type !== 'gif' && $quality ) {
                        $im = @$out_func( $thumb_image, $outfile, $quality );
                    } else {
                        $im = @$out_func( $thumb_image, $outfile );
                    }
                } else {
                    if (! is_bool( $square ) ) {
                        $thumb_image = imagecreatetruecolor( $orig_width, $orig_height );
                        if ( $extension === 'png' || $extension === 'webp' ) {
                            imagealphablending( $thumb_image, false );
                            imagesavealpha( $thumb_image, true );
                        }
                        imagecopyresampled( $thumb_image, $src_img, 0, 0, 0, 0, $orig_width, $orig_height, $orig_width, $orig_height );
                        if ( $extension !== 'gif' ) {
                            $im = @$out_func( $thumb_image, $outfile, $quality );
                        } else {
                            $im = @$out_func( $thumb_image, $outfile );
                        }
                    } else {
                        $thumb_image = imagecreatetruecolor( $width, $height );
                        if ( $extension === 'png' || $extension === 'webp' ) {
                            imagealphablending( $thumb_image, false );
                            imagesavealpha( $thumb_image, true );
                        }
                        imagecopyresampled( $thumb_image, $src_img, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height );
                        if ( $extension !== 'gif' && $quality ) {
                            $im = @$out_func( $thumb_image, $outfile, $quality );
                        } else {
                            $im = @$out_func( $thumb_image, $outfile );
                        }
                    }
                }
                imagedestroy( $src_img );
                imagedestroy( $thumb_image );
                error_reporting( $error_reporting );
                $app->logging = $logging;
                if ( $im === false ) {
                    error_reporting( $error_reporting );
                    $app->logging = $logging;
                    trigger_error( $app->translate( "An error occurred while process image file '%s'(%s).", [ $outfile, $out_func ] ) );
                    return false;
                }
                if ( file_exists( $outfile ) ) return $outfile;
                return false;
            } else if ( $convert_path = $app->imagick_convert_path ) {
                // This funxtion is obsolete.
                $convert_path = escapeshellcmd( $convert_path );
                $file = escapeshellarg( $file );
                $outfile = escapeshellarg( $outfile );
                if ( $square ) {
                    if ( $width > $height ) {
                        $cmd = "{$convert_path} {$file} -resize {$size}x -resize x{$size}";
                    } else {
                        $cmd = "{$convert_path} {$file} -resize x{$size} -resize {$size}x";
                    }
                    $cmd .= " -gravity center -crop {$size}x{$size}+0+0 {$outfile}";
                } else {
                    if (! is_bool( $square ) ) {
                        $cmd = "{$convert_path} {$file} {$outfile}";
                    } else {
                        $cmd = "{$convert_path} {$file} -resize {$width}x{$height} {$outfile}";
                    }
                }
                exec( $cmd, $output, $return_var );
                if ( $return_var !== 0 ) {
                    $error = implode( '', $output );
                    return false;
                }
            }
            error_reporting( $error_reporting );
            $app->logging = $logging;
            if ( file_exists( $orig_path ) ) return $orig_path;
            return false;
        }
        if ( $type == 'jpeg' ) $type = 'jpg';
        if (! $type ) $type = 'jpg';
        if ( $type == 'png' && $quality >= 10 ) {
            $quality *= 0.1;
            $quality = (int) $quality;
            if ( $quality > 9 ) {
                $quality = 0;
            }
        } else if ( $type == 'png' && $quality == 0 ) {
            $quality = 9;
        }
        $image_quality = '';
        if ( $type == 'png' ) {
            $image_quality = 'png_compression_level';
        } else if ( $type == 'jpg' ) {
            $image_quality = 'jpeg_quality';
        } else if ( $type == 'webp' ) {
            $image_quality = 'webp_quality';
        }
        $imagine = new \Imagine\Gd\Imagine();
        $image = $imagine->open( $file );
        if (! $size ) $size = 1;
        if ( $square ) {
            $mode = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;
            $thumbnail = $image->thumbnail( new Imagine\Image\Box( $size, $size ), $mode );
        } else {
            $thumbnail = $image->thumbnail( new Imagine\Image\Box( $size, $size ) );
        }
        error_reporting( $error_reporting );
        $app->logging = $logging;
        $option = $image_quality ? [ $image_quality => $quality ] : [];
        try {
            $thumbnail->save( $outfile, $option );
            new PADOBaseModel( 'log' ); // Make thumbnail faild from upload-image-resize.php.
        } catch ( Exception $e ) {
            $error = $e->getMessage();
            return false;
        }
        if ( file_exists( $outfile ) ) return $outfile;
        return false;
    }

    public static function get_extension ( $path, $to_lower = false ) {
        if (! $path ) return '';
        if ( strpos( $path, '.' ) === false ) {
            return '';
        }
        $parts = explode( '.', $path );
        $extIndex = count( $parts ) - 1;
        $extension = @$parts[ $extIndex ];
        $app = Prototype::get_instance();
        if (! $app->path_upperlower || $to_lower ) {
            $extension = strtolower( $extension );
        }
        return $extension;
    }

    public static function upload_check ( $extra, $name = 'files',
        $json = true, &$error = '' ) {
        $app = Prototype::get_instance();
        if (! $extra ) {
            if ( $app->upload_size_limit || $app->upload_max_pixel ) {
                $extra = implode( ':', [
                    $app->upload_size_limit,
                    $app->upload_max_pixel,
                    $app->upload_image_option ] );
            }
        }
        $filename = $json ? $_FILES['files']['name'] : $name;
        if ( is_array( $filename ) ) $filename = $filename[0];
        $ext = self::get_extension( $filename, true );
        $allowed_exts = $app->allowed_exts;
        if ( $allowed_exts ) {
            $allowed_exts = preg_split( '/\s*,\s*/', $allowed_exts );
            $allowed_exts = array_filter( $allowed_exts, 'strlen' );
            if (! empty( $allowed_exts ) && ! in_array( $ext, $allowed_exts ) ) {
                if ( $json ) {
                    $app->json_error(
                        "The file '%s' that you uploaded is not allowed.",
                            basename( $filename ) );
                } else {
                    $error = $app->translate( "The file '%s' that you uploaded is not allowed.",
                            basename( $filename ) );
                    return null;
                }
            }
        }
        $denied_exts = $app->denied_exts;
        if ( $denied_exts ) {
            $denied_exts = preg_split( '/\s*,\s*/', $denied_exts );
            $denied_exts = array_filter( $denied_exts, 'strlen' );
            if (! empty( $denied_exts ) && in_array( $ext, $denied_exts ) ) {
                if ( $json ) {
                    $app->json_error(
                        "The file '%s' that you uploaded is not allowed.",
                            basename( $filename ) );
                } else {
                    $error = $app->translate( "The file '%s' that you uploaded is not allowed.",
                            basename( $filename ) );
                    return null;
                }
            }
        }
        $tmp_name = $json ? $_FILES['files']['tmp_name'] : $name;
        if ( is_array( $tmp_name ) ) $tmp_name = $tmp_name[0];
        $filesize = $json ? $_FILES[ $name ]['size'] : filesize( $tmp_name );
        $is_array = false;
        if ( is_array( $filesize ) ) {
            $filesize = $filesize[0];
            $is_array = true;
        }
        if (! $filesize ) {
            if ( $json ) {
                $app->json_error(
                    'The upload that 0 byte size file is not allowed.' );
            } else {
                $error = $app->translate(
                    'The upload that 0 byte size file is not allowed.' );
                return null;
            }
        }
        if (! $json && in_array( $ext, $app->images ) && $ext !== 'gif' ) {
            if ( $app->auto_orient ) {
                self::fix_orientation( $tmp_name );
            } else if ( $app->remove_exif ) {
                self::remove_exif( $tmp_name );
            }
        }
        if (! $extra && ! $app->upload_size_limit ) return 1;
        if (! $extra ) {
            $extra = $app->upload_size_limit;
        }
        list( $sizelimit, $pixel, $extra, $type ) = array_pad( explode( ':', $extra ), 4, null );
        if (! $sizelimit && $app->upload_size_limit ) {
            $sizelimit = $app->upload_size_limit;
        }
        $ext = self::get_extension( $filename, true );
        if ( $type === null ) $type = '';
        $type_label = ( $type === 'pdf' ) ? 'PDF' : ucfirst( $type );
        if ( $type ) {
            $_type = $type;
            $_type .= 's';
            $extensions = ( $type === 'pdfs' ) ? ['pdf'] : $app->$_type;
            if (! is_array( $extensions ) ) {
                $type_label = null;
                $extensions = preg_split( '/\s*,\s*/', $type );
            }
            if ( is_array( $extensions ) && !empty( $extensions ) && !in_array( $ext, $extensions ) ) {
                $error = $type_label ? $app->translate( 'The file must be an %s.', $app->translate( $type_label ) )
                       : $app->translate( "The file '%s' that you uploaded is not allowed.", basename( $filename ) );
                if ( $json ) {
                    $app->json_error( $error );
                } else {
                    return null;
                }
            }
        }
        $resized = null;
        $pixel = (int) $pixel;
        if ( $pixel && in_array( $ext, $app->images ) ) {
            $size = getimagesize( $tmp_name );
            if ( $size && ( $size[0] > $pixel || $size[1] > $pixel ) ) {
                if ( $extra == 'resize' ) {
                    $resized = self::make_thumbnail( $tmp_name, $pixel, $ext, $app->image_quality );
                    if (! $resized ) {
                        if ( $json ) {
                            $app->json_error( 'Failed to resize image.' );
                        } else {
                            $error = $app->translate( 'Failed to resize image.' );
                            return null;
                        }
                    } else {
                        file_put_contents( $tmp_name, file_get_contents( $resized ) );
                        if ( $json ) {
                            if ( $is_array ) {
                                $_FILES['files']['size'][0] = filesize( $resized );
                            } else {
                                $_FILES['files']['size'] = filesize( $resized );
                            }
                        }
                        self::remove_dir( dirname( $resized ) );
                        $resized = 'resized';
                        $filesize = filesize( $tmp_name );
                    }
                } else {
                    if ( $json ) {
                        $app->json_error( 'The file you uploaded is too large.' );
                    } else {
                        $error = $app->translate( 'The file you uploaded is too large.' );
                        return null;
                    }
                }
            }
        }
        if ( $sizelimit && ( $filesize > $sizelimit ) ) {
            $sizelimit = $app->ctx->modifier_format_size( $sizelimit, 1, $app->ctx );
            if ( $json ) {
                $app->json_error( 'The file you uploaded is too large(The file must be %s or less).', $sizelimit );
            } else {
                $error = $app->translate( 'The file you uploaded is too large(The file must be %s or less).', $sizelimit );
                return null;
            }
        }
        return $resized;
    }

    public static function set_object_fields ( &$obj, $update = true ) {
        $app = Prototype::get_instance();
        $db = $app->db;
        if ( is_array( $update ) ) {
            $values = $update;
            $customfields = $app->get_meta( $obj, 'customfield', true );
            $field_data = [];
            $field_terms = [];
            if ( $obj->has_column( 'workspace_id' ) ) {
                $field_terms['workspace_id'] = $obj->workspace_id ? [0, (int) $obj->workspace_id ] : 0;
            }
            if ( empty( $values ) ) {
                foreach ( $customfields as $key => $fields ) {
                    foreach ( $fields as $meta ) {
                        $meta->remove();
                    }
                }
                $obj->_customfields = [];
                return [];
            }
            foreach ( $values as $key => $value ) {
                $field_terms['basename'] = $key;
                $field = $db->model( 'field' )->get_by_key( $field_terms );
                if (! $field->id ) continue;
                $fieldtype = $field->fieldtype;
                if ( $fieldtype ) {
                    $basename = $field->fieldtype->basename;
                } else {
                    $basename = $field->basename;
                }
                if ( is_array( $value ) ) {
                    $is_array = array_values( $value ) === $value;
                    $i = 1;
                    if ( $is_array ) {
                        if ( $basename == 'checkboxes' ) {
                            if ( is_array( $value[0] ) ) {
                                foreach ( $value as $idx => $var ) {
                                    $data = ['value' => $var ];
                                    $v = $var[0];
                                    $field_data[] = ['value' => $v, 'field' => $field, 'number' => $idx, 'data' => $data, 'basename' => $basename ];
                                }
                            } else {
                                $data = ['value' => $value ];
                                $var = $value[0];
                                $field_data[] = ['value' => $var, 'field' => $field, 'number' => $i, 'data' => $data, 'basename' => $basename ];
                            }
                        } else {
                            foreach ( $value as $key => $var ) {
                                if ( is_array( $var ) ) {
                                    $v = '';
                                    if ( $basename == 'datetime' ) {
                                        $v = implode( ' ', $var );
                                    } else if ( $basename == 'tel_separated' ) {
                                        $v = implode( '-', $var );
                                    } else if ( $basename == 'checkboxes' || $basename == 'input_text_multi' ) {
                                        $v = $var[0];
                                    }
                                    $field_data[] = ['value' => $v, 'field' => $field, 'number' => $i, 'data' => $var, 'basename' => $basename ];
                                } else {
                                    $data = null;
                                    if ( $basename == 'datetime' && strpos( $var, ' ' ) !== false ) {
                                        list( $d, $t ) = explode( ' ', $var );
                                        $data = ['field_date' => $d, 'field_time' => $t ];
                                    } else if ( $basename == 'tel_separated' && strpos( $var, '-' ) !== false ) {
                                        list( $a, $s, $p ) = explode( '-', $var );
                                        $data = ['area_code' => $a, 'state_code' => $s, 'phone_number' => $p ];
                                    } else if ( $basename == 'checkboxes' ) {
                                        $v    = explode( ',', $var );
                                        $data = ['value' => $v ];
                                        $var  = $value[0];
                                    } else if ( $basename == 'input_text_multi' ) {
                                        $v    = explode( PHP_EOL, $var );
                                        $data = ['field_value_multi' => $v ];
                                        $var  = $value[0];
                                    }
                                    $field_data[] = ['value' => $var, 'field' => $field, 'number' => $i, 'data' => $data, 'basename' => $basename ];
                                }
                                $i++;
                            }
                        }
                    } else {
                        $var = '';
                        if ( $basename == 'datetime' ) {
                            $var = implode( ' ', $value );
                        } else if ( $basename == 'tel_separated' ) {
                            $var = implode( '-', $value );
                        } else if ( $basename == 'checkboxes' || $basename == 'input_text_multi' ) {
                            $var = $value[0];
                        }
                        $field_data[] = ['value' => $var, 'field' => $field, 'number' => $i, 'data' => $value, 'basename' => $basename ];
                    }
                } else {
                    $data = null;
                    if ( $basename == 'datetime' ) {
                        $value = self::str_to_ts( $value );
                    }
                    if ( $basename == 'datetime' && strpos( $value, ' ' ) !== false ) {
                        list( $d, $t ) = explode( ' ', $value );
                        $data = ['field_date' => $d, 'field_time' => $t ];
                    } else if ( $basename == 'tel_separated' && strpos( $value, '-' ) !== false ) {
                        list( $a, $s, $p ) = explode( '-', $value );
                        $data = ['area_code' => $a, 'state_code' => $s, 'phone_number' => $p ];
                    } else if ( $basename == 'checkboxes' ) {
                        $v     = explode( ',', $value );
                        $data  = ['value' => $v ];
                        $value = $value[0];
                    } else if ( $basename == 'input_text_multi' ) {
                        $v     = explode( PHP_EOL, $var );
                        $data  = ['field_value_multi' => $v ];
                        $value = $value[0];
                    }
                    $field_data[] = ['value' => $value, 'field' => $field, 'number' => 1, 'data' => $data, 'basename' => $basename ];
                }
            }
            $idx = 0;
            foreach ( $customfields as $key => $fields ) {
                foreach ( $fields as $meta ) {
                    if ( isset( $field_data[ $idx ] ) ) {
                        $data = $field_data[ $idx ];
                        unset( $field_data[ $idx ] );
                        $field = $data['field'];
                        $meta->type( $data['basename'] );
                        $meta->key( $field->basename );
                        $value = $data['data'] ?? ['value' => $data['value'] ];
                        $value = json_encode( $value, JSON_UNESCAPED_UNICODE );
                        $meta->text( $value );
                        if (! isset( $data['data'] ) ) {
                            $meta->name( 'value' );
                        } else {
                            $keys = array_keys( $data['data'] );
                            if ( count( $keys ) === 1 ) {
                                $meta->name( $keys[0] );
                            } else {
                                $meta->name( '' );
                            }
                        }
                        $meta->number( $data['number'] );
                        $meta->save();
                    } else {
                        $meta->remove();
                    }
                    $idx++;
                }
            }
            foreach ( $field_data as $data ) {
                $meta = $db->model( 'meta' )->new( ['model' => $obj->_model,
                                                         'object_id' => $obj->id,
                                                         'kind' => 'customfield',
                                                         'value' => $data['value'] ] );
                $field = $data['field'];
                $meta->type( $data['basename'] );
                $meta->key( $field->basename );
                $value = $data['data'] ?? ['value' => $data['value'] ];
                $value = json_encode( $value, JSON_UNESCAPED_UNICODE );
                $meta->text( $value );
                if (! isset( $data['data'] ) ) {
                    $meta->name( 'value' );
                } else {
                    $keys = array_keys( $data['data'] );
                    if ( count( $keys ) === 1 ) {
                        $meta->name( $keys[0] );
                    } else {
                        $meta->name( '' );
                    }
                }
                $meta->number( $data['number'] );
                $meta->save();
            }
            $obj->_customfields = null;
            return $app->get_meta( $obj, 'customfield', true );
        }
        $object_fields = self::get_fields( $obj, 'types' );
        $custom_fields = $app->get_meta( $obj, 'customfield' );
        $field_ids = [];
        $id = $obj->id;
        $type_asset = $app->field_type_asset ? explode( ',', $app->field_type_asset )
                    : ['asset', 'assets', 'image', 'images'];
        foreach ( $object_fields as $fld => $props ) {
            $fieldtype = $props['type'];
            $field_id = $props['id'];
            $field_basename = "{$fld}__c";
            if (! isset( $_REQUEST[ $field_basename ] ) ) {
                continue;
            }
            $fld_value = $app->param( $field_basename );
            $unique_ids = $app->param( "field-unique_id-{$fld}" );
            if ( $fld_value !== null ) {
                if (! is_array( $fld_value ) ) $fld_value = [ $fld_value ];
                if (! is_array( $unique_ids ) ) $unique_ids = [ $unique_ids ];
                $i = 0;
                $meta_objects = [];
                foreach ( $fld_value as $value ) {
                    $unique_id = $unique_ids[ $i ];
                    $i++;
                    $fld_values = json_decode( $value, true );
                    $values = [];
                    foreach ( $fld_values as $key => $val ) {
                        if ( strpos( $key, $unique_id . '_' ) === 0 ) {
                            $new_key = preg_replace( "/^{$unique_id}_/", '', $key );
                            unset( $fld_values[ $key ] );
                            $fld_values[ $new_key ] = $val;
                            $values[] = $val;
                        }
                    }
                    $value = json_encode( $fld_values, JSON_UNESCAPED_UNICODE );
                    $meta = $db->model( 'meta' )->get_by_key(
                        ['object_id' => $id, 'model' => $obj->_model,
                         'kind' => 'customfield', 'key' => $fld, 'number' => $i ] );
                    $meta_vars = $meta->get_values();
                    $meta->text( $value );
                    $meta->type( $fieldtype );
                    $meta->field_id( $field_id );
                    if ( in_array( $fieldtype, $type_asset ) ) {
                        if ( is_array( $values ) && isset( $values[0] ) ) {
                            $values = $values[0];
                            if ( is_array( $values ) ) {
                                $meta_value = implode( ':', $values );
                                $meta_value = ":{$meta_value}:";
                                $meta->data( $meta_value );
                            } else {
                                $meta_value = ":{$values}:";
                                $meta->data( $meta_value );
                            }
                        }
                    }
                    if ( count( $fld_values ) == 1 ) {
                        $meta_key = key( $fld_values );
                        $meta->name( $meta_key );
                        $meta_value = $fld_values[ $meta_key ];
                        if ( is_array( $meta_value ) ) {
                            $meta_value = isset( $meta_value[0] ) ? $meta_value[0] : '';
                        }
                        $meta->value( $meta_value );
                    } else {
                        if ( $meta->type == 'datetime' ) {
                            if ( $fld_values[ array_keys( $fld_values )[0] ] || $fld_values[ array_keys( $fld_values )[1] ] ) {
                                $meta->value( join( ' ', $fld_values ) );
                                if ( $fld_values[ array_keys( $fld_values )[0] ] == '' ) {
                                    $fld_values[ array_keys( $fld_values )[0] ] = '0000-00-00';
                                }
                                if ( preg_match( '/\s[0-9]{2}:[0-9]{2}$/', $meta->value ) ) {
                                    $fld_values[ array_keys( $fld_values )[1] ] .= ':00';
                                } else if ( $fld_values[ array_keys( $fld_values )[1] ] == '' ) {
                                    $fld_values[ array_keys( $fld_values )[1] ] = '00:00:00';
                                }
                                $meta->value( join( ' ', $fld_values ) );
                                $value = json_encode( $fld_values, JSON_UNESCAPED_UNICODE );
                                $meta->text( $value );
                            } else {
                                $meta->value( '' );
                            }
                        } else if ( $meta->type == 'tel_separated' ) {
                            if ( isset( $fld_values[ array_keys( $fld_values )[0] ] ) || isset( $fld_values[ array_keys( $fld_values )[1] ] ) ||
                                isset( $fld_values[ array_keys( $fld_values )[2] ] ) ) {
                                $meta->value( join( '-', $fld_values ) );
                            } else {
                                $meta->value( '' );
                            }
                        } else if ( $meta->type == 'checkboxes' ) {
                            $meta->value( join( ',', $fld_values ) );
                        } else if ( $meta->type == 'input_text_multi' ) {
                            if ( array_values( $fld_values ) === $fld_values ) {
                                $meta->value( join( PHP_EOL, $fld_values ) );
                            } else {
                                $meta->value( '' );
                            }
                        } else {
                            $meta->value( '' );
                        }
                    }
                    if ( mb_strlen( $meta->value ) > 255 ) {
                        $meta->value( mb_substr( $meta->value, 0, 255 ) );
                    }
                    if ( $meta->id ) {
                        $field_ids[] = $meta->id;
                    } else {
                        $meta->id = '';
                    }
                    $meta_objects[] = $meta;
                }
                if ( $update ) {
                    if (! empty( $meta_objects ) ) {
                        if (! $db->model( 'meta' )->update_multi( $meta_objects ) ) {
                            return $app->rollback( 'An error occurred while updating the related object(s).' );
                        }
                        $caching = $app->db->caching;
                        $query_cache = $app->db->query_cache;
                        $app->db->caching = false;
                        $app->db->query_cache = false;
                        $meta = $app->get_meta( $obj );
                        $app->db->caching = $caching;
                        $app->db->query_cache = $query_cache;
                        $obj->_meta = $meta;
                    }
                } else {
                    $customfields = [];
                    foreach ( $meta_objects as $field ) {
                        if ( isset( $customfields[ $field->key ] ) ) {
                            $customfields[ $field->key ][] = $field;
                        } else {
                            $customfields[ $field->key ] = [ $field ];
                        }
                    }
                    if ( isset( $obj->_customfields ) && is_array( $obj->_customfields ) && !empty( $obj->_customfields ) ) {
                        $obj->_customfields = array_merge( $obj->_customfields, $customfields );
                    } else {
                        $obj->_customfields = $customfields;
                    }
                }
            }
        }
        if ( $update ) {
            if (! empty( $custom_fields ) ) {
                foreach ( $custom_fields as $custom_field ) {
                    if (! in_array( $custom_field->id, $field_ids ) ) {
                        $custom_field->remove();
                    }
                }
            }
        }
    }

    public static function str_to_ts ( $value, $format = 'Y-m-d H:i:s' ) {
        $value = self::normalize( $value );
        if ( preg_match( '/([0-9]{4})年/', $value, $matches ) ) {
            $y = $matches[1];
        }
        if ( preg_match( '/([0-9]{1,2})月/', $value, $matches ) ) {
            $m = $matches[1];
            $m = str_pad( $m, 2, 0, STR_PAD_LEFT );
        }
        if ( preg_match( '/([0-9]{1,2})日(.*$)/', $value, $matches ) ) {
            $d = $matches[1];
            $d = str_pad( $d, 2, 0, STR_PAD_LEFT );
            $after = $matches[2];
        }
        if ( isset( $y ) && isset( $m ) && isset( $d ) ) {
            $value = "{$y}{$m}{$d}{$after}";
        }
        $value = preg_replace( '/[^0-9]/', '', $value );
        if (! preg_match( '/^[0-9]{14}$/', $value ) ) {
            $add = 14 - strlen( $value );
            $value .= str_repeat( '0', $add );
        }
        if ( substr( $value, 6, 2 ) === '00' ) {
            $value = preg_replace( '/(^[0-9]{6})00/', '$1-01', $value );
            $value = str_replace( '-', '', $value );
        }
        $time = strtotime( $value );
        return date( $format, $time );
    }

    public static function hms_to_sec ( $hms ) {
        list( $h, $m, $s ) = array_pad( explode( ':', $hms ), 3, 0 );
        $h = (int) $h;
        $m = (int) $m;
        $h *= 3600;
        $m *= 60;
        return $h + $m + $s;
    }

    public static function sec_to_hms ( $seconds, $format = '%02d:%02d:%02d' ) {
        $seconds = round( $seconds );
        $seconds = intval( $seconds );
        $gmdate = gmdate( 'H:i:s', $seconds );
        list( $hours, $minutes, $seconds ) = explode( ':', $gmdate );
        $hms = sprintf( $format, $hours, $minutes, $seconds );
        return $hms;
    }

    public static function set_url_path ( &$ui ) {
        $app = Prototype::get_instance();
        if ( $workspace = $ui->workspace ) {
            $base_url = $workspace->site_url;
            $base_path = $workspace->site_path;
        } else {
            $base_url = $app->site_url;
            $base_path = $app->site_path;
        }
        $file_path = $ui->file_path;
        $file_path = str_replace( DS, '/', $file_path );
        $base_path = str_replace( DS, '/', $base_path );
        if ( mb_substr( $base_url, -1 ) != '/' ) {
            $base_url .= '/';
        }
        $search = preg_quote( $base_path, '/' );
        $relative_path = preg_replace( "/^{$search}\//", '', $file_path );
        $url = $base_url . $relative_path;
        $url = str_replace( DS, '/', $url );
        $fileName = basename( $file_path );
        $name_quoted = preg_quote( $fileName, '/' );
        if ( $app->no_encode_filename ) {
            $basename = rawurlencode( $fileName );
        } else {
            $basename = strpos( $fileName, ' ' ) !== false
                      ? str_replace( ' ', '%20', $fileName ) : $fileName;
        }
        if ( $fileName !== $basename ) {
            $url = preg_replace( "/{$name_quoted}$/", $basename, $url );
        }
        $relative_path = '%r' . DS . str_replace( '/', DS, $relative_path );
        $relative_url = preg_replace( '!^https{0,1}:\/\/.*?\/!', '/', $url );
        $ui->relative_url( $relative_url );
        $ui->relative_path( $relative_path );
        $ui->url( $url );
        $ui->dirname( dirname( $url ) );
        $extension = self::get_extension( $file_path );
        $ui->mime_type( self::get_mime_type( $extension ) );
        if ( $app->fmgr->exists( $file_path ) ) {
            if (! $ui->md5 ) {
                $ui->md5( md5_file( $file_path ) );
            }
            if (! $ui->filemtime ) {
                $ui->filemtime( filemtime( $file_path ) );
            }
            $ui->was_published( 1 );
            $ui->is_published( 1 );
            $ui->delete_flag( 0 );
        }
        return $ui;
    }

    public static function sanitize_regex ( $str, $delimiter = '/' ) {
        $delimiter_match = false;
        $add_delimiter = true;
        $opt = null;
        $delimiter_end = $delimiter;
        if (! $delimiter ) {
            $first = mb_substr( $str, 0, 1 );
            if ( $first == '[' ) {
                $delimiter = '[';
                $delimiter_end = ']';
            }
            $add_delimiter = false;
        }
        if ( $delimiter ) {
            if ( strpos( $str, $delimiter ) === 0 ) {
                if ( mb_substr_count( $str, $delimiter ) > 1 ) {
                    $start_end = $delimiter === '/' ? '!' : '/';
                    preg_match( "{$start_end}^{$delimiter}(.*){$delimiter}(.*)\${$start_end}", $str, $matches );
                    $str = $matches[1];
                    $opt = $matches[2];
                    $delimiter_match = true;
                }
            }
            if ( strpos( $str, $delimiter ) !== false ) {
                if ( preg_match( '![^\\\\]' . $delimiter . '!', $str ) ) {
                    $str = preg_replace( $start_end . '[^\\\\]' . $delimiter . $start_end, '$1\\' . $delimiter , $str );
                }
                if ( strpos( $str, $delimiter ) === 0 ) {
                    $str = '\\' . $str;
                }
            }
        } else {
            if ( strpos( $str, '/' ) !== false ) {
                if ( preg_match( '![^\\\\]/!', $str ) ) {
                    $str = preg_replace( '!([^\\\\])/!', '$1\\/', $str );
                }
                if ( strpos( $str, '/' ) === 0 ) {
                    $str = '\\' . $str;
                }
            }
        }
        if ( $delimiter !== '[' && ( strpos( $str, '[' ) !== false || strpos( $str, ']' ) !== false ) ) {
            if ( mb_substr_count( $str, '[' ) != mb_substr_count( $str, ']' ) ) {
                $str = preg_replace( '!([^\\\\])\[!', '$1\\[', $str );
                $str = preg_replace( '!([^\\\\])\]!', '$1\\]', $str );
                if ( strpos( $str, '[' ) === 0 || strpos( $str, ']' ) === 0 ) {
                    $str = '\\' . $str;
                }
            } else if ( mb_strpos( $str, '[' ) > mb_strpos( $str, ']' ) ) {
                $str = preg_replace( '!([^\\\\])\[!', '$1\\[', $str );
                $str = preg_replace( '!([^\\\\])\]!', '$1\\]', $str );
                if ( strpos( $str, '[' ) === 0 || strpos( $str, ']' ) === 0 ) {
                    $str = '\\' . $str;
                }
            } else {
                $chars = self::mb_str_split( $str );
                list( $start, $end, $error ) = [ false, true, false ];
                foreach ( $chars as $char ) {
                    if ( $char === '[' && !$end ) {
                        $error = true;
                        break;
                    } else if ( $char === ']' && !$start ) {
                        $error = true;
                        break;
                    }
                    if ( $char === '[' ) {
                        $start = true;
                        $end = false;
                        continue;
                    } else if ( $char === ']' ) {
                        $start = false;
                        $end = true;
                        continue;
                    }
                }
                if ( $error ) {
                    $str = preg_replace( '!([^\\\\])\[!', '$1\\[', $str );
                    $str = preg_replace( '!([^\\\\])\]!', '$1\\]', $str );
                    if ( strpos( $str, '[' ) === 0 || strpos( $str, ']' ) === 0 ) {
                        $str = '\\' . $str;
                    }
                }
            }
        }
        if ( $add_delimiter && $delimiter_match && $opt ) {
            $opt = preg_replace( '/[^imsxADSUXJu]/', '', $opt );
            $str = "{$delimiter}{$str}{$delimiter_end}{$opt}";
        }
        return $str;
    }

    public static function mb_str_split ( $str ) {
        if ( function_exists( 'mb_str_split' ) ) { // PHP7.4 or later
            return mb_str_split( $str );
        }
        $results = [];
        $length = mb_strlen( $str );
        for ( $offset = 0; $offset < $length; $offset++ ) {
            $results[] = mb_substr( $str, $offset, 1 );
        }
        return $results;
    }

    public static function compile_check ( $obj, $column = '', $logging = false ) {
        $app = Prototype::get_instance();
        if (! $app->compile_check ) {
            return true;
        }
        $ctx = $app->ctx;
        $regex = '/<\${0,1}' . $ctx->prefix . '/si';
        if ( is_string( $obj ) && stripos( $obj, '<?php' ) !== false ) {
            $text = $obj;
        } else if ( is_string( $obj ) && preg_match( $regex, $obj ) ) {
            $text = $obj;
            $mtml = $text;
        } else if ( is_string( $obj ) ) {
            return true;
        } else {
            if (! $column ) {
                $column = $app->compile_cols[ $obj->_model ] ?? null;
            }
            if (! $column ) {
                return true;
            }
            if ( is_array( $column ) ) {
                $column = array_shift( $column );
            }
            $text = $obj->$column;
            $mtml = $text;
        }
        $app->init_tags();
        if ( isset( $mtml ) ) {
            $error = '';
            if (! $app->eval_in_view ) {
                if ( stripos( $mtml, '<?php' ) !== false ) {
                    $error = $app->translate( 'Writing PHP code in views is not allowed.' );
                }
            }
            if (! preg_match( $regex, $mtml ) ) {
                return true;
            }
            ob_start();
            $tag_parser = new PTTagParser( $app );
            $tag_parser->logging = $logging;
            $__stash = $ctx->__stash;
            $local_vars = $ctx->local_vars;
            $vars = $ctx->vars;
            $ctx->app->in_compile = true;
            $ctx->build( $mtml, false, '', true );
            $ctx->app->in_compile = false;
            $ctx->compiled = [];
            $ctx->vars = $vars;
            $ctx->local_vars = $local_vars;
            $ctx->__stash = $__stash;
            ob_end_clean();
            if ( is_array( $app->stash( 'parser_errors' ) )
                && !empty( $app->stash( 'parser_errors' ) ) ) {
                $parser_errors = $app->stash( 'parser_errors' );
                if ( $error ) {
                    array_unshift( $parser_errors, $error );
                }
                return $parser_errors;
            }
            if ( $error ) return [ $error ];
        }
        $__stash = $ctx->__stash;
        $local_vars = $ctx->local_vars;
        $vars = $ctx->vars;
        $text = $ctx->build( $text, true );
        $text = rtrim( $text );
        $ctx->vars = $vars;
        $ctx->local_vars = $local_vars;
        $ctx->__stash = $__stash;
        $php_binary = $app->php_binary();
        if ( $php_binary ) {
            $compiled = $app->upload_dir() . DS . 'compiled.php';
            file_put_contents( $compiled, $text );
            $cmd = "{$php_binary} -l {$compiled}";
            exec( $cmd, $output, $return_var );
            if ( $return_var === 0 ) return true;
            $message = implode( "\n", $output );
            if ( stripos( $message, 'Error' ) !== false ) {
                if (! $output[0] ) {
                    $output[0] = $app->translate( 'An error occurred while compiling PHP code.' );
                } else {
                    array_unshift( $output, $app->translate( 'An error occurred while compiling PHP code.' ) );
                }
                return $output;
            }
        }
        return true;
    }

    public static function get_mime_type ( $extension, $default = '' ) {
        if ( strpos( $extension, DS ) !== false
            || strpos( $extension, '/' ) !== false
            || strpos( $extension, '.' ) !== false ) {
            $extension = self::get_extension( $extension );
        }
        $extension = strtolower( $extension );
        $extension = ltrim( $extension, '.' );
        if ( isset( $_SERVER[ 'HTTP_USER_AGENT' ] ) ) {
            if ( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'DoCoMo/2.0' ) === 0 ) {
                if ( $extension === 'html' ) {
                    return 'application/xhtml+xml';
                }
            }
        }
        $mime_types = self::mime_types();
        if ( isset( $mime_types[ $extension ] ) ) {
            return $mime_types[ $extension ];
        }
        return $default ? $default : 'text/plain';
    }

    public static function extension_from_mime_type ( $mime_type, $default = '' ) {
        $mime_types = self::mime_types();
        $mime_types = array_flip( $mime_types );
        if ( isset( $mime_types[ $mime_type ] ) ) {
            return $mime_types[ $mime_type ];
        }
        return $default ? $default : 'txt';
    }

    public static function get_src_func ( $path ) {
        if (! file_exists( $path ) ) {
            return '';
        }
        $type = @exif_imagetype( $path );
        if (! $type ) {
            return '';
        }
        $src_func = '';
        switch ( $type ) {
            case IMAGETYPE_JPEG:
                $src_func = 'imagecreatefromjpeg';
                break;
            case IMAGETYPE_PNG:
                $src_func = 'imagecreatefrompng';
                break;
            case IMAGETYPE_GIF:
                $src_func = 'imagecreatefromgif';
                break;
            case IMAGETYPE_WEBP:
                $src_func = 'imagecreatefromwebp';
                break;
        }
        if ( $src_func === 'imagecreatefromwebp' ) {
            if ( self::is_webp_animated( $path ) ) {
                return '';
            }
        }
        return $src_func;
    }

    public static function image_types ( $type = null, $const = null ) {
        $types = [
            'image/gif'  => IMAGETYPE_GIF,
            'image/jpeg' => IMAGETYPE_JPEG,
            'image/png'  => IMAGETYPE_PNG,
            'image/webp' => IMAGETYPE_WEBP,
        ];
        if ( $type ) {
            return isset( $types[ $type ] ) && $const === $types[ $type ];
        }
        return $types;
    }

    public static function mime_types () {
        return [
            'css'     => 'text/css',
            'html'    => 'text/html',
            'php'     => 'text/html',
            'mtml'    => 'text/html',
            'md'      => 'text/markdown',
            'xhtml'   => 'application/xhtml+xml',
            'ttf'     => 'font/ttf',
            'otf'     => 'font/otf',
            'woff'    => 'font/woff',
            'woff2'   => 'font/woff2',
            'htm'     => 'text/html',
            'txt'     => 'text/plain',
            'rtx'     => 'text/richtext',
            'tsv'     => 'text/tab-separated-values',
            'csv'     => 'text/csv',
            'hdml'    => 'text/x-hdml; charset=Shift_JIS',
            'xml'     => 'application/xml',
            'atom'    => 'application/atom+xml',
            'rss'     => 'application/rss+xml',
            'rdf'     => 'application/rdf+xml',
            'xsl'     => 'text/xsl',
            'mpeg'    => 'video/mpeg',
            'mpg'     => 'video/mpeg',
            'mpe'     => 'video/mpeg',
            'webm'    => 'video/webm',
            'avi'     => 'video/x-msvideo',
            'movie'   => 'video/x-sgi-movie',
            'mov'     => 'video/quicktime',
            'qt'      => 'video/quicktime',
            'ice'     => 'x-conference/x-cooltalk',
            'svr'     => 'x-world/x-svr',
            'vrml'    => 'x-world/x-vrml',
            'wrl'     => 'x-world/x-vrml',
            'vrt'     => 'x-world/x-vrt',
            'spl'     => 'application/futuresplash',
            'hqx'     => 'application/mac-binhex40',
            'doc'     => 'application/msword',
            'pdf'     => 'application/pdf',
            'ai'      => 'application/postscript',
            'eps'     => 'application/postscript',
            'ps'      => 'application/postscript',
            'ppt'     => 'application/vnd.ms-powerpoint',
            'rtf'     => 'application/rtf',
            'dcr'     => 'application/x-director',
            'dir'     => 'application/x-director',
            'dxr'     => 'application/x-director',
            'js'      => 'application/javascript',
            'dvi'     => 'application/x-dvi',
            'gtar'    => 'application/x-gtar',
            'gzip'    => 'application/x-gzip',
            'latex'   => 'application/x-latex',
            'lzh'     => 'application/x-lha',
            'swf'     => 'application/x-shockwave-flash',
            'sit'     => 'application/x-stuffit',
            'tar'     => 'application/x-tar',
            'tcl'     => 'application/x-tcl',
            'tex'     => 'application/x-texinfo',
            'texinfo' => 'application/x-texinfo',
            'texi'    => 'application/x-texi',
            'src'     => 'application/x-wais-source',
            'zip'     => 'application/zip',
            'au'      => 'audio/basic',
            'aac'     => 'audio/aac',
            'snd'     => 'audio/basic',
            'midi'    => 'audio/midi',
            'mid'     => 'audio/midi',
            'kar'     => 'audio/midi',
            'mpga'    => 'audio/mpeg',
            'mp2'     => 'audio/mpeg',
            'mp3'     => 'audio/mpeg',
            'mp4'     => 'video/mp4',
            'ra'      => 'audio/x-pn-realaudio',
            'ram'     => 'audio/x-pn-realaudio',
            'rm'      => 'audio/x-pn-realaudio',
            'rpm'     => 'audio/x-pn-realaudio-plugin',
            'wav'     => 'audio/x-wav',
            'bmp'     => 'image/x-ms-bmp',
            'gif'     => 'image/gif',
            'jpe'     => 'image/jpeg',
            'jpeg'    => 'image/jpeg',
            'jpg'     => 'image/jpeg',
            'png'     => 'image/png',
            'tiff'    => 'image/tiff',
            'tif'     => 'image/tiff',
            'webp'    => 'image/webp',
            'pnm'     => 'image/x-portable-anymap',
            'ras'     => 'image/x-cmu-raster',
            'pnm'     => 'image/x-portable-anymap',
            'pbm'     => 'image/x-portable-bitmap',
            'pgm'     => 'image/x-portable-graymap',
            'ppm'     => 'image/x-portable-pixmap',
            'svg'     => 'image/svg+xml',
            'rgb'     => 'image/x-rgb',
            'xbm'     => 'image/x-xbitmap',
            'xls'     => 'application/vnd.ms-excel',
            'xpm'     => 'image/x-pixmap',
            'xwd'     => 'image/x-xwindowdump',
            'ico'     => 'image/vnd.microsoft.icon',
            'docx'    => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'pptx'    => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'xlsx'    => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'json'    => 'application/json',
            'ts'      => 'video/mp2t',
            'm4s'     => 'video/iso.segment',
            'vtt'     => 'text/vtt',
            'mpd'     => 'application/dash+xml',
            'm3u8'    => 'application/x-mpegURL',
            'm3u'     => 'audio/x-mpegurl',
            'url'     => 'text/plain',
        ];
    }

    public static function convert2abs ( $target_path, $base = '' ) {
        if (! $base ) return $target_path;
        if ( strpos( $target_path, '#' ) === 0 ) return $target_path;
        if ( stripos( $target_path, 'mailto:' ) === 0 ) return $target_path;
        if ( stripos( $target_path, 'tel:' ) === 0 ) return $target_path;
        if ( stripos( $target_path, 'javascript:' ) === 0 ) return $target_path;
        if ( stripos( $target_path, 'data:' ) === 0 ) return $target_path;
        $component = parse_url( $base );
        $directory = preg_replace( '!/[^/]*$!', '/', $component['path'] );
        switch ( true ) {
            case preg_match( "/^http/", $target_path ) :
                $uri = $target_path;
                break;
            case preg_match( "/^\/\/.+/", $target_path ) :
                $uri = $component['scheme'].":".$target_path;
                break;
            case preg_match( "/^\/[^\/].+/", $target_path ) :
                $uri = $component['scheme'] . "://" . $component['host'] . $target_path;
                break;
            case preg_match( "/^\/$/", $target_path ) :
                $uri = $component['scheme'] . "://" . $component['host'] . $target_path;
                break;
            case preg_match( "/^\.\/(.+)/", $target_path, $maches ) :
                $uri = $component['scheme']
                     . "://" . $component['host'] . $directory.$maches[1];
                break;
            case preg_match( "/^([^\.\/]+)(.*)/", $target_path, $maches ):
                $uri = $component['scheme']
                     . "://" . $component['host'] . $directory . $maches[1] . $maches[2];
                break;
            case ( preg_match( "/^\.\.\/.+/", $target_path ) || $target_path == '../' ):
                preg_match_all( "!\.\./!", $target_path, $matches );
                $nest = count( $matches[0] );
                $dir = preg_replace( '!/[^/]*$!', '/', $component['path'] ) . "\n";
                $dir_array = explode( '/', $dir );
                array_shift( $dir_array );
                array_pop( $dir_array );
                $dir_count = count( $dir_array );
                $count = $dir_count - $nest;
                $pathto = '';
                $i = 0;
                while ( $i < $count ) {
                    $pathto .= '/' . $dir_array[ $i ];
                    $i++;
                }
                $file = str_replace( '../', '', $target_path );
                $uri = $component['scheme']
                     . '://' . $component['host'] . $pathto . '/' . $file;
                break;
            default:
                $uri = $target_path;
        }
        if ( strpos( $uri, '../' ) !== false && strpos( $uri, 'http' ) === 0 ) {
            $base = preg_replace( '!(^https{0,1}://[^/]*?/).*$!', '$1', $uri );
            $relative = preg_replace( '!^https{0,1}://[^/]*?/(.*$)!', '$1', $uri );
            $count = mb_substr_count( $relative, '../' );
            $paths = explode( '/', $relative );
            $cnt = 0;
            foreach ( $paths as $idx => $path ) {
                if ( $path == '..' ) {
                    $cnt++;
                    $index = $idx - $cnt;
                    if ( isset( $paths[ $index ] ) ) {
                        unset( $paths[ $index ] );
                        $cnt++;
                    }
                    unset( $paths[ $idx ] );
                }
            }
            $uri = $base . implode( '/', $paths );
        }
        if ( strpos( $uri, '/./' ) !== false && strpos( $uri, 'http' ) === 0 ) {
            $uri = str_replace( '/./', '/', $uri );
        }
        return $uri;
    }

    public static function get_thumbnail ( $app ) {
        $id = $app->param( 'id' );
        $file_url = $app->app_path . 'assets/img/file-icons/';
        if ( strpos( $id, 'session-' ) === 0 ) {
            $session_id = str_replace( 'session-', '', $id );
            $session = $app->db->model( 'session' )->load([
                'user_id' => $app->user()->id, 'id' => (int) $session_id,
            ], ['limit' => 1]);
            if (! empty( $session ) ) {
                $session = $session[0];
                $mime_type = $session->key;
                if (! $mime_type ) {
                    $meta = json_decode( $session->text );
                    $mime_type = $meta->mime_type;
                }
                if ( $mime_type == 'image/svg+xml' ) {
                    $app->print( $session->data, $mime_type );
                }
                if ( $app->param( 'square' ) && $session->extradata ) {
                    $app->print( $session->extradata, $mime_type );
                } else if ( $app->param( 'data' ) && $session->data ) {
                    $app->print( $session->data, $mime_type );
                } else if ( $session->metadata ) {
                    $app->print( $session->metadata, $mime_type );
                } else {
                    $prop = json_decode( $session->text, true );
                    $basename = $app->get_alternative_icon( $prop['class'], $prop['extension'], false );
                    return $app->redirect( "{$file_url}{$basename}" );
                }
            }
        }
        $id = (int) $app->param( 'id' );
        $has_thumbnail = $app->param( 'has_thumbnail' );
        $_model = $app->param( '_model' );
        if ( $has_thumbnail ) {
            header( 'Content-type: application/json' );
        }
        if ( $_model ) {
            $table = $app->get_table( $_model );
            if (! $table ) {
                if ( $has_thumbnail ) echo json_encode( ['has_thumbnail' => false ] );
                return;
            }
        }
        if ( $_model && !$app->can_do( $_model, 'list' ) && $has_thumbnail ) {
            echo json_encode( ['has_thumbnail' => false ] );
            return;
        }
        if (!$id ) {
            if ( $has_thumbnail && $_model ) {
                if ( $_model == 'asset' ) {
                    echo json_encode( ['has_thumbnail' => true ] );
                    return;
                }
                $scheme = $app->get_scheme_from_db( $_model );
                $props = $scheme['edit_properties'];
                foreach ( $props as $prop => $type ) {
                    if ( $type == 'file' ) {
                        $options = isset( $scheme['options'] ) ? $scheme['options'] : [];
                        if ( !empty( $options ) ) {
                            if ( isset( $options[ $prop ] )
                                && $options[ $prop ] == 'image' ) {
                                echo json_encode( ['has_thumbnail' => true ] );
                                return;
                            } else {
                                echo json_encode( ['has_thumbnail' => true ] );
                                return;
                            }
                        } else {
                            echo json_encode( ['has_thumbnail' => true ] );
                            return;
                        }
                    }
                }
                echo json_encode( ['has_thumbnail' => false ] );
                return;
            }
            $app->redirect( $app->app_path . 'assets/img/model-icons/default.png' );
        }
        $meta = null;
        $md = null;
        $mime_type = '';
        $column = $app->param( 'square' ) ? 'metadata' : 'data';
        $cols = "{$column},text,model,object_id,key,data,metadata";
        if ( $_model ) {
            $meta_terms = ['object_id' => $id, 'model' => $_model ];
            if ( $col_name = $app->param( 'column' ) ) {
                $app->get_scheme_from_db( $_model );
                if ( $app->db->model( $_model )->has_column( $col_name ) ) {
                    $meta_terms['key'] = $col_name;
                }
            } else if ( $_model === 'upload_file' ) {
                $meta_terms['key'] = 'file_path';
            }
            $meta_objs = $app->db->model( 'meta' )->load( $meta_terms, null, $cols );
            if (! is_array( $meta_objs ) || empty( $meta_objs ) ) {
                if ( $has_thumbnail ) {
                    echo json_encode( ['has_thumbnail' => false ] );
                    return;
                }
            }
            foreach ( $meta_objs as $m ) {
                $md = json_decode( $m->text, true );
                if ( isset( $md['class'] )
                    && ( $md['class'] == 'image' || $md['class'] == 'video' || $md['extension'] == 'svg' ) ) {
                    $meta = $m;
                    break;
                }
            }
        } else {
            $meta = $app->db->model( 'meta' )->load( $id, null, $cols );
        }
        $data = '';
        $asset_url = $app->app_path . 'assets/img/model-icons/';
        $asset_dir = $app->pt_dir . DS . 'assets' . DS . 'img' . DS . 'model-icons';
        if (!$meta ) {
            if ( $has_thumbnail ) {
                echo json_encode( ['has_thumbnail' => false ] );
                return;
            } else {
                if ( $md && isset( $md['class'] ) && isset( $md['extension'] ) ) {
                    $basename = $app->get_alternative_icon( $md['class'], $md['extension'], false );
                    return $app->redirect( "{$file_url}{$basename}" );
                }
            }
        }
        if (! is_object( $meta ) ) {
            if ( $has_thumbnail ) {
                echo json_encode( ['has_thumbnail' => false ] );
                return;
            } else {
                $icon_path = $asset_dir . DS . $_model . '.png';
                if (! file_exists( $icon_path ) && $_model ) {
                    $asset_url = $app->app_path . 'assets/img/file-icons/';
                    $file_dir = $app->pt_dir . DS . 'assets' . DS . 'img' . DS . 'file-icons';
                    $obj = $app->db->model( $_model )->load( $id );
                    if ( $obj ) {
                        if ( $obj->has_column( 'class' ) ) {
                            $icon_path = $file_dir . DS . $obj->class . '.png';
                        }
                        if (! file_exists( $icon_path ) && $obj->url ) {
                            $extension = PTUtil::get_extension( $obj->url );
                            $icon_path = $file_dir . DS . $extension . '.png';
                        }
                    }
                }
                $iconBasename = basename( $icon_path, '.png' );
                $default_path = $asset_dir . DS . 'default.png';
                $icon_url = file_exists( $icon_path ) ? "{$asset_url}{$iconBasename}.png" : "{$asset_url}default.png";
                return $app->redirect( $icon_url );
            }
        }
        if (! is_object( $meta ) ) {
            return;
        }
        $model = $meta->model;
        if (!$app->can_do( $model, 'list' ) ) {
            if ( $has_thumbnail ) {
                echo json_encode( ['has_thumbnail' => false ] );
                return;
            }
        }
        $matadata = json_decode( $meta->text, true );
        $mime_type = $mime_type ? $mime_type : $matadata['mime_type'];
        if ( strpos( $mime_type, 'video/' ) === 0 ) {
            $mime_type = 'image/png';
        }
        $data = $data ? $data : $meta->$column;
        if ( $matadata['extension'] == 'svg' ) {
            $obj = $app->db->model( $model )->load( (int) $meta->object_id, null, $meta->key );
            if ( $obj ) {
                $col = $meta->key;
                $data = $obj->$col;
            }
            if (! $data ) {
                if ( $has_thumbnail ) {
                    echo json_encode( ['has_thumbnail' => false ] );
                    return;
                }
                $icon_path = $asset_dir . DS . $_model . '.png';
                $default_path = $asset_dir . DS . 'default.png';
                $icon_path = file_exists( $icon_path ) ? $icon_path : $default_path;
                return $app->print( file_get_contents( $icon_path ), 'image/png' );
            }
        }
        if (! $data ) {
            $data = $app->param( 'square' ) ? $meta->data : $meta->metadata;
        }
        if (! $data && $has_thumbnail ) {
            echo json_encode( ['has_thumbnail' => false ] );
            return;
        }
        if ( $has_thumbnail ) {
            echo json_encode( ['has_thumbnail' => true ] );
            return;
        }
        if (! $data ) {
            if ( $md && isset( $md['class'] ) && isset( $md['extension'] ) ) {
                $basename = $app->get_alternative_icon( $md['class'], $md['extension'], false );
                return $app->redirect( "{$file_url}{$basename}" );
            }
            $data = '';
        }
        $etag = '"' . md5( $data ) . '"';
        ignore_user_abort( true );
        $ts = $app->param( 'ts' );
        while( ob_get_level() ) { ob_end_clean(); }
        if ( $ts && isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) ) {
            if ( $_SERVER['HTTP_IF_NONE_MATCH'] == $etag ) {
                header( $app->protocol . ' 304 Not Modified' );
                header( 'Connection: close' );
                flush();
                exit();
            }
        }
        // TODO Permission
        if ( $app->output_compression ) {
            ini_set( 'zlib.output_compression', 'On' );
        }
        $file_size = strlen( bin2hex( $data ) ) / 2;
        header( "Content-Type: {$mime_type}" );
        header( "Content-Length: {$file_size}" );
        if ( $ts ) {
            $last_modified = gmdate( "D, d M Y H:i:s", strtotime( $ts ) ) . ' GMT';
            header( "Last-Modified: $last_modified" );
            header( "ETag: $etag" );
        }
        header( 'Connection: close' );
        echo $data;
        flush();
        exit();
    }

    public static function rel2abs ( $path ) {
        $path = str_replace( DS, '/', $path );
        $url_base = '';
        if ( $path === '' || strpos( $path, '/' ) === false ) return $path;
        if ( preg_match( '!(^https{0,1}://[^/]*/)(.*?$)!', $path, $matchs ) ) {
            $url_base = $matchs[1];
            $path = $matchs[2];
        }
        $paths = explode('/', $path );
        $_paths = [];
        foreach ( $paths as $path_elem ) {
            if ( $path_elem === '.' ) { continue; }
            if ( $path_elem === '..' ) { array_pop( $_paths ); continue; }
            $_paths[] = $path_elem;
        }
        $path = $url_base . implode( '/', $_paths );
        return $path;
    }

    public static function normalize ( $string ) {
        if ( strpos( $string, '～' ) !== false ) {
            $string = str_replace( '～', '〜', $string );
        }
        if ( function_exists( 'normalizer_normalize' ) ) {
            $string = normalizer_normalize( $string, Normalizer::NFKC );
        } else {
            require_once( LIB_DIR . 'Prototype' . DS . 'class.PTUnicodeNormalizer.php' );
            $string = PTUnicodeNormalizer::normalize( $string );
        }
        if ( strpos( $string, '⁄' ) !== false ) {
            // Fraction Slash
            $string = str_replace( '⁄', '/', $string );
        }
        return $string;
    }

    public static function normalize_tag ( $tag ) {
        $tag = preg_replace( '/\s+/', '', trim( strtolower( $tag ) ) );
        return $tag;
    }

    public static function sync_dir ( $from, $to, $remove_dir = true, $fmgr = null ) {
        if (!is_dir( $from ) ) return 0;
        $from = rtrim( $from, DS );
        $to = rtrim( $to, DS );
        if (! $fmgr ) {
            $app = Prototype::get_instance();
            $fmgr = $app->fmgr;
        }
        list( $files, $dirs ) = [[], []];
        self::file_find( $from, $files, $dirs, true );
        $quoted = preg_quote( $from, '/' );
        $counter = 0;
        foreach ( $files as $file ) {
            $to_file = $to . preg_replace( "/^$quoted/", '', $file );
            if (! $fmgr->exists( $to_file ) ) {
                $fmgr->copy( $file, $to_file );
                $counter++;
            } else {
                $from_ts = filemtime( $file );
                $to_ts = filemtime( $to_file );
                if ( $from_ts > $to_ts ) {
                    $fmgr->copy( $file, $to_file );
                    $counter++;
                }
            }
        }
        list( $files, $dirs ) = [[], []];
        self::file_find( $to, $files, $dirs, true );
        $all_dirs = $dirs;
        $all_dirs = array_flip( $all_dirs );
        $keys = array_map( 'strlen', array_keys( $all_dirs ) );
        array_multisort( $keys, SORT_DESC, $all_dirs );
        $quoted = preg_quote( $to, '/' );
        $remove_dirs = [];
        foreach ( $files as $file ) {
            $from_file = $from . preg_replace( "/^$quoted/", '', $file );
            if (! $fmgr->exists( $from_file ) ) {
                $fmgr->unlink( $file );
                $counter++;
                $remove_dirs[ dirname( $file ) ] = true;
            }
        }
        if ( $remove_dir ) {
            if (! empty( $remove_dirs ) ) {
                $keys = array_map( 'strlen', array_keys( $remove_dirs ) );
                array_multisort( $keys, SORT_DESC, $remove_dirs );
                $remove_dirs = array_keys( $remove_dirs );
                foreach ( $remove_dirs as $dir ) {
                    if ( $dir == $to ) continue;
                    if ( is_dir( $dir ) && count( glob( $dir . "/*" ) ) == 0 ) {
                        @rmdir( $dir );
                        $counter++;
                        unset( $all_dirs[ $dir ] );
                    }
                }
            }
            if (! empty( $all_dirs ) ) {
                $all_dirs = array_keys( $all_dirs );
                foreach ( $all_dirs as $dir ) {
                    if ( $dir == $to ) continue;
                    if ( is_dir( $dir ) && count( glob( $dir . "/*" ) ) == 0 ) {
                        @rmdir( $dir );
                        $counter++;
                    }
                }
            }
        }
        return $counter;
    }

    public static function encode_double ( $content ) {
        $content = str_replace( '&amp;', '&amp;amp;', $content );
        $content = str_replace( '&quot;', '&amp;quot;', $content );
        $content = str_replace( '&lt;', '&amp;lt;', $content );
        $content = str_replace( '&gt;', '&amp;gt;', $content );
        return $content;
    }

    public static function decode_double ( $content ) {
        $content = str_replace( '&amp;amp;', '&amp;', $content );
        $content = str_replace( '&amp;quot;', '&quot;', $content );
        $content = str_replace( '&amp;lt;', '&lt;', $content );
        $content = str_replace( '&amp;gt;', '&gt;', $content );
        return $content;
    }

    public static function file_find ( $dir, &$files = [], &$dirs = [], $hidden = false ) {
        if (!is_dir( $dir ) ) return [];
        $dir = rtrim( $dir, DS );
        $comp = $dir . DS;
        $iterator = new RecursiveDirectoryIterator( $dir );
        $iterator = new RecursiveIteratorIterator( $iterator );
        $list = [];
        foreach ( $iterator as $fileinfo ) {
            $path = $fileinfo->getPathname();
            $name = $fileinfo->getBasename();
            if ( strpos( $name, '..' ) === 0 ) continue;
            if ( $fileinfo->isDir() ) {
                $path = rtrim( $path, '.' );
                if ( $path === $comp ) continue;
                $dirs[] = $path;
                $list[] = $path;
            } else if ( $fileinfo->isFile() ) {
                if (! $hidden && strpos( $name, '.' ) === 0 ) continue;
                $files[] = $path;
                $list[] = $path;
            }
        }
        return $list;
    }

    public static function stream_context_create ( $options = [], $params = [] ) {
        if ( is_array( $options ) && !isset( $options['http']['proxy'] ) ) {
            $app = Prototype::get_instance();
            if ( $http_proxy = $app->http_proxy ) {
                $http_proxy = preg_replace( '!^[^:]+://!', '', $http_proxy );
                $options['http']['proxy'] = $http_proxy;
            }
        }
        if ( is_array( $options ) && count( $options ) > 0 ) {
            $stream_context  = stream_context_get_default();
            $default_options = stream_context_get_options( $stream_context );
            if ( is_array( $default_options ) && count( $default_options ) > 0 ) {
                $options = array_replace_recursive( $default_options, $options );
            }
        }
        return stream_context_create( $options, $params );
    }

    public static function property_exists ( $obj, $prop ) {
        if ( property_exists( $obj, $prop ) ) {
            return true;
        } else if ( is_a( $obj, 'Prototype' ) &&
            property_exists( $obj, 'properties' ) && is_array( $obj->properties ) ) {
            return array_key_exists( $prop, $obj->properties );
        }
        return false;
    }

    public static function return_bytes ( $val ) {
        $val = strtolower( $val );
        $last = $val[ strlen( $val ) - 1 ];
        if ( $last == 'g' || $last == 'm' || $last == 'k' ) {
            $val = rtrim( $val, $last );
        }
        $val = (int) $val;
        switch( $last ) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
        return $val;
    }

    public static function selector2xpath ( $selector ) {
        $selector = new Translator( trim( $selector ) );
        return (string) $selector;
    }

    public static function formatLF ( &$text, $return_code = "\n" ) { 
        $text = preg_replace( "/\r\n?/", $return_code, $text );
        return $text;
    }

    public static function to_utf8 ( &$text, $from_encoding = null ) { 
        $from_encoding = $from_encoding
                       ? $from_encoding
                       : ['UTF-7',
                          'ISO-2022-JP',
                          'UTF-8',
                          'SJIS',
                          'JIS',
                          'eucjp-win',
                          'sjis-win',
                          'EUC-JP',
                          'ASCII',]; 
        try {
            $text = mb_convert_encoding( $text, 'UTF-8', $from_encoding );
        } catch ( \Throwable $e ) {
            $text = mb_convert_encoding( $text, 'UTF-8', 'auto' );
        }
        return $text;
    }

    public static function loadHTML ( $html, $encoding = null ) { 
        $remove_charset = false;
        if ( $encoding ) {
            try {
                $html = mb_convert_encoding( $html, $encoding, [
                    'UTF-7',
                    'ISO-2022-JP',
                    'UTF-8',
                    'SJIS',
                    'JIS',
                    'eucjp-win',
                    'sjis-win',
                    'EUC-JP',
                    'ASCII',
                ] );
            } catch ( \Throwable $e ) {
                $html = mb_convert_encoding( $html, $encoding, 'auto' );
            }
            $remove_charset = true;
        }
        libxml_use_internal_errors( true );
        $dom = new DomDocument();
        if (! $encoding ) {
            $encoding = 'utf-8';
        }
        if ( preg_match( '/^\xEF\xBB\xBF/', $html ) ) {
            // BOM
            $html = preg_replace( '/^\xEF\xBB\xBF/', '', $html );
        }
        if (! $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, $encoding ),
            LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
            trigger_error( 'loadHTML failed!' );
            return false;
        }
        if ( $remove_charset ) {
            $meta_elements = $dom->getElementsByTagName( 'meta' );
            if ( $meta_elements->length ) {
                $i = $meta_elements->length - 1;
                for ( $i = 0; $i < $meta_elements->length; $i++ ) {
                    $ele = $meta_elements->item( $i );
                    $charset = strtolower( $ele->getAttribute( 'charset' ) );
                    // <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
                    $meta_content = $ele->getAttribute( 'content' );
                    $equiv = strtolower( $ele->getAttribute( 'http-equiv' ) );
                    if ( $charset ) {
                        $ele->parentNode->removeChild( $ele );
                    } else if ( $equiv && strpos( $meta_content, 'text/html' ) === 0 ) {
                        $ele->parentNode->removeChild( $ele );
                    }
                }
            }
        }
        return $dom;
    }

    public static function saveHTML ( $dom, $encoding = null ) { 
        if (! $encoding ) $encoding = 'UTF-8';
        return html_entity_decode( $dom->saveHTML(), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, $encoding );
    }

    public static function innerHTML ( $element ) { 
        $innerHTML = ''; 
        $children  = $element->childNodes;
        foreach ( $children as $child ) { 
            $innerHTML .= $element->ownerDocument->saveHTML( $child );
        }
        return $innerHTML; 
    }

    public static function outerHTML ( $element ) { 
        $outerHTML = ''; 
        if ( $element->nodeType === XML_ELEMENT_NODE ) {
            $tagAttrs = [];
            foreach ( $element->attributes as $attr ) {
                $tagAttrs[] = $attr->nodeValue ?
                              $attr->nodeName . '="' . $attr->nodeValue . '"' : $attr->nodeName;
            }
            if (! empty( $tagAttrs ) ) {
                $startTag = '<' . $element->nodeName . ' ' . implode( ' ', $tagAttrs ) . '>';
            } else {
                $startTag = '<' . $element->nodeName . '>';
            }
            $endTag = '</' . $element->nodeName . '>';
        }
        $children  = $element->childNodes;
        if ( $children !== null ) {
            foreach ( $children as $child ) { 
                $outerHTML .= $element->ownerDocument->saveHTML( $child );
            }
        }
        $empty = ['br', 'hr', 'img'];
        if ( $element->nodeType == 1 ) {
            if (! $outerHTML && in_array( $element->nodeName, $empty ) ) {
                return str_replace( '>', ' />', $startTag );
            }
            $outerHTML = "{$startTag}{$outerHTML}{$endTag}";
        }
        return $outerHTML; 
    }

    public static function afterHTML ( $element, $remove = false ) {
        if (! $element ) {
            return '';
        }
        $next = $element->nextSibling;
        $afterHTML = '';
        while ( $next !== null ) {
            if ( $next->nodeType === XML_ELEMENT_NODE ) {
                $afterHTML .= self::outerHTML( $next );
            } else {
                $afterHTML .= $next->nodeValue;
            }
            $next = $next->nextSibling;
        }
        if ( $remove ) {
            $next = $element->nextSibling;
            while ( $next !== null ) {
                $nextSibling = $next->nextSibling;
                $parent = $next->parentNode;
                $parent->removeChild( $next );
                $next = $nextSibling;
            }
        }
        return $afterHTML;
    }

    public static function is_not_html ( $text ) {
        return preg_match( '/\A\s*<!DOCTYPE\s+html|<title[\s>]/i', $text ) !== 1;
    }

    public static function is_binary_file ( $file ) {
        $fp = fopen( $file, 'r' );
        while ( $line = fgets( $fp ) ) {
            if ( strpos( $line, '\0' ) !== false ||
                !preg_match('/^[^\x00-\x08\x0B\x0E-\x1A\x1C-\x1F\x7F]*+$/u', $line ) ) {
                fclose( $fp );
                return true;
            }
        }
        fclose( $fp );
        return false;
    }

    public static function year_to_wareki ( $year ) {
        $eras = [
            ['year' => 2018, 'name' => '令和'],
            ['year' => 1988, 'name' => '平成'],
            ['year' => 1925, 'name' => '昭和'],
            ['year' => 1911, 'name' => '大正'],
            ['year' => 1867, 'name' => '明治']
        ];
        $year = (int) $year;
        foreach( $eras as $era ) {
            $base_year = $era['year'];
            $era_name = $era['name'];
            if ( $year > $base_year ) {
                $era_year = $year - $base_year;
                if ( $era_year === 1 ) {
                    return $era_name .'元年';
                }
                return $era_name . $era_year .'年';
            }
        }
        return '';
    }

    public static function str_to_christian_era ( $string ) {
        $wareki_year = str_replace( '元年', '1年', mb_convert_kana( $string, 'n' ) );
        if ( preg_match_all( '!^(明治|大正|昭和|平成|令和)([0-9０-９元一二三四五六七八九十〇]+)年$!', $string, $matche ) ) {
            $matches = $matche[0];
            $era_names = $matche[1];
            $years = $matche[2];
            foreach ( $matches as $idx => $matche ) {
                $era_name = $era_names[ $idx ];
                $year = $years[ $idx ];
                if ( strlen( $year ) !== mb_strlen( $year ) ) {
                    $year = self::knum_to_num( $year );
                } else {
                    $year = (int) $year;
                }
                if (! $year ) {
                    return $string;
                }
                if ( $era_name === '明治') {
                    $year += 1867;
                } else if ( $era_name === '大正') {
                    $year += 1911;
                } else if ( $era_name === '昭和') {
                    $year += 1925;
                } else if ( $era_name === '平成') {
                    $year += 1988;
                } else if ( $era_name === '令和') {
                    $year += 2018;
                }
                $year .= '年';
                $string = str_replace( $matche, $year, $string );
            }
        }
        return $string;
    }

    public static function knum_to_num ( $string ) {
        $string = str_replace( '元', '一', $string );
        $string = str_replace( '壱', '一', $string );
        $string = str_replace( '弐', '二', $string );
        $string = str_replace( '参', '二', $string );
        $numbers = ['〇', '一', '二', '三', '四', '五', '六', '七', '八', '九'];
        $kdig = [
            '十' => 10,
            '百' => 100,
            '千' => 1000,
        ];
        $kdig_u = [
            '万' => 10000,
            '億' => 100000000,
            '兆' => 1000000000000,
            '京' => 10000000000000000,
        ];
        $kvmap = array_flip( $numbers );
        $len = mb_strlen( $string );
        $dig = 1;
        $dig_u = 1;
        $dig_chg = false;
        $value = '0';
        for ( $i = $len; $i-- > 0; ) {
            $c = mb_substr( $string, $i, 1 );
            if ( isset($kvmap[ $c ] ) ) {
                $value = bcadd( $value, bcmul( $kvmap[ $c ], bcmul( $dig, $dig_u, 0 ), 0 ), 0 );
                $dig = bcmul( $dig, 10, 0 );
                $dig_chg = false;
            } else if ( isset( $kdig[ $c ] ) ) {
                if (! $dig_chg ) {
                    $dig_chg = true;
                } else {
                    $value = bcadd( $value, bcmul( $dig, $dig_u, 0 ), 0 );
                }
                $dig = $kdig[ $c ];
            } else if ( isset( $kdig_u[ $c ] ) ) {
                $dig_u = $kdig_u[ $c ];
                $dig = 1;
                $dig_chg = false;
            }
        }
        if ( $dig_chg ) {
            $value = bcadd( $value, bcmul( $dig, $dig_u, 0 ), 0 );
        }
        return (int) $value;
    }

    public static function make_password ( $length ) {
        $app = Prototype::get_instance();
        if ( $length < $app->password_min ) {
            $length = $app->password_min;
        }
        $letters = range( 'a', 'z' );
        $letters = array_merge( $letters, range( 'A', 'Z' ) );
        if ( $app->password_letternum ) {
            $letters = array_merge( $letters, range( '0', '9' ) );
        }
        if ( $app->password_symbol ) {
            $letters = array_merge( $letters, ['!','#','$','%','&','?','*','+','–','_','|','~',',','.',':',';'] );
        }
        if ( empty( $letters ) ) {
            return self::magic( $length );
        }
        $letters = array_values( array_diff( $letters, ['I', 'l', '1', 'O', 'o', '0'] ) );
        $make_password = '';
        for ( $i = 0; $i < $length; $i++ ) {
            $make_password .= $letters[ rand( 0, count( $letters ) - 1 ) ];
        }
        $regex1 = '/[A-Z]/';
        $regex2 = '/[a-z]/';
        $regex3 = '/[0-9]/';
        $regex4 = '/[!|#|$|%|\?|\*|\+|\-_|\||~|\,|\.|:|;]/';
        if( ( $app->password_upperlower && (! preg_match( $regex1, $make_password )
          || ! preg_match( $regex2, $make_password ) ) )
          || ( $app->password_letternum && ! preg_match( $regex3, $make_password ) )
          || ( $app->password_symbol && ! preg_match( $regex4, $make_password ) ) ) {
            return self::make_password( $length );
        }
        return $make_password;
    }

    public static function yaml_parse ( $yaml ) {
        self::require_yaml();
        return \Symfony\Component\Yaml\Yaml::parse( $yaml );
    }

    public static function yaml_dump ( $array ) {
        self::require_yaml();
        return \Symfony\Component\Yaml\Yaml::dump( $array );
    }

    public static function require_yaml () {
        require_once( LIB_DIR . 'yaml' . DS . 'Yaml.php' );
        require_once( LIB_DIR . 'yaml' . DS . 'Dumper.php' );
        require_once( LIB_DIR . 'yaml' . DS . 'Parser.php' );
        require_once( LIB_DIR . 'yaml' . DS . 'Escaper.php' );
        require_once( LIB_DIR . 'yaml' . DS . 'Inline.php' );
        require_once( LIB_DIR . 'yaml' . DS . 'Unescaper.php' );
    }

    public static function array_unset ( &$array, $value, $reset = false ) {
        $existing = array_search( $value, $array );
        if ( $existing !== false ) {
            unset( $array[ $existing ] );
            if ( $reset ) {
                $array = array_values( $array );
            }
        }
        return $array;
    }

    public static function end_with ( $str, $end, $case_sensitive = true ) {
        if ( $case_sensitive ) {
            if ( strpos( $str, $end ) !== false ) {
                $end = preg_quote( $end, '/' );
                return preg_match( "/{$end}$/u", $str );
            }
        } else {
            if ( stripos( $str, $end ) !== false ) {
                $end = preg_quote( $end, '/' );
                return preg_match( "/{$end}$/iu", $str );
            }
        }
        return false;
    }

    public static function serialize ( &$array ) {
        if ( is_array( $array ) ) {
            foreach ( $array as $key => $value ) {
                if ( is_object( $value ) ) {
                    //  $array[ $key ] = get_object_vars( $value );
                    unset( $array[ $key ] );
                }
            }
        }
        $array = serialize( $array );
        return $array;
    }

    public static function is_webp_animated ( $file ) {
        if ( ! is_file( $file ) ) {
            return false;
        }
        $data = file_get_contents( $file );
        return ( stripos( $data, 'anmf' ) !== false || stripos( $data, 'anim' ) !== false );
    }
}