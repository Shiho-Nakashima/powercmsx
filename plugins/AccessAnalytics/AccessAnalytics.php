<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class AccessAnalytics extends PTPlugin {

    public $already_save = false;

    function __construct () {
        parent::__construct();
    }

    function hdlr_rankedobjects ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (!$counter ) {
            $params = [];
            $model = isset( $args['models'] ) ? $args['models'] : [];
            if ( empty( $model ) && isset( $args['model'] ) ) {
                $model = $args['model'];
            }
            if ( is_string( $model ) ) {
                $model = trim( strtolower( $model ) );
            }
            $sql = 'SELECT activity_url, COUNT(activity_url) FROM mt_activity ';
            if ( is_string( $model ) && strpos( $model, ',' ) !== false ) {
                $model = preg_split( '/\s*,\s*/', $model );
            } else if ( is_string( $model ) ) {
                $model = [ $model ];
            }
            $placeholders = [];
            $where = false;
            if ( is_array( $model ) && !empty( $model ) ) {
                foreach ( $model as $m ) {
                    $placeholders[] = '?';
                }
                $placeholders = implode( ',', $placeholders );
                $sql .= "WHERE activity_model IN ({$placeholders})";
                $where = true;
            }
            $period = isset( $args['period'] ) ? $args['period'] : null;
            $values = $model;
            if ( $period ) {
                $ts = $this->period2ts( $period );
                if ( $ts ) {
                    if (! $where ) {
                        $sql .= ' WHERE ';
                        $where = true;
                    } else {
                        $sql .= ' AND ';
                    }
                    $sql .= ' activity_created_on >= ?';
                    $values[] = $ts;
                }
            }
            $period = isset( $args['period_end'] ) ? $args['period_end'] : null;
            if ( $period ) {
                $ts = $this->period2ts( $period );
                if ( $ts ) {
                    if (! $where ) {
                        $sql .= ' WHERE ';
                        $where = true;
                    } else {
                        $sql .= ' AND ';
                    }
                    $sql .= ' activity_created_on <= ?';
                    $values[] = $ts;
                }
            }
            $tag_class = new PTTags();
            $extra = $tag_class->include_exclude_workspaces( $app, $args, $app->db->model( 'activity' ) );
            if ( $extra ) {
                if (! $where ) {
                    $sql .= ' WHERE ';
                    $where = true;
                } else {
                    $sql .= ' AND ';
                }
                $sql .= 'activity_workspace_id ' . $extra;
            }
            $classes = ['Page View', 'Search', 'Contact', 'Comment', 'Login', 'Logout', 'Download'];
            $class = isset( $args['class'] ) ? $args['class'] : 'Page View';
            if ( in_array( $class, $classes ) ) {
                if (! $where ) {
                    $sql .= ' WHERE ';
                    $where = true;
                } else {
                    $sql .= ' AND ';
                }
                $sql .= " activity_class='{$class}'";
            }
            $min_count = isset( $args['min_count'] ) ? (int) $args['min_count'] : 0;
            $having = '';
            if ( $min_count ) {
                $having = "HAVING COUNT(activity_url)>={$min_count}";
            }
            $sql .= " GROUP BY activity_url {$having} ORDER BY COUNT(activity_url) DESC";
            $limit = isset( $args['limit'] ) ? (int) $args['limit'] : null;
            $include_draft = isset( $args['include_draft'] ) ? true : false;
            if ( ( $limit && $limit > 0 ) && $include_draft ) {
                $sql .= " LIMIT {$limit}";
            }
            $params = $app->db->model( 'activity' )->load( $sql, $values );
            if ( empty( $params ) ) {
                $repeat = $ctx->false();
                return '';
            }
            $local_vars = ['workspace', 'workspace_id', 'current_context',
                           'current_archive_context', 'current_container'];
            $local_vars = array_merge( $local_vars, $model );
            $objects = [];
            $tables = [];
            $i = 0;
            foreach ( $params as $param ) {
                if ( $limit && !$include_draft ) {
                    if ( $i >= $limit ) {
                        break;
                    }
                }
                $param = $param->get_values();
                $url = $param['activity_url'];
                $count = isset( $param['COUNT(activity_url)'] )
                       ? (int) $param['COUNT(activity_url)'] : $param['activity_COUNT(activity_url)'];
                if (! $count ) continue;
                if (! empty( $model ) ) {
                    $activity = $app->db->model( 'activity' )->get_by_key(
                        ['url' => $url, 'model' => ['IN' => $values ] ], ['sort' => 'id', 'direction' => 'descend', 'limit' => 1] );
                } else {
                    $activity = $app->db->model( 'activity' )->get_by_key(
                        ['url' => $url ], ['sort' => 'id', 'direction' => 'descend', 'limit' => 1] );
                }
                if ( $activity->id && $activity->model && $activity->object_id ) {
                    $table = isset( $tables[ $activity->model ] )
                           ? $tables[ $activity->model ] : $app->get_table( $activity->model );
                    if (! $table ) continue;
                    $tables[ $activity->model ] = $table;
                    $primary = $table->primary;
                    $obj = $app->db->model( $activity->model )->load( (int) $activity->object_id );
                    if (! $obj ) {
                        if (! $include_draft ) {
                            continue;
                        }
                        $obj = $app->db->model( $activity->model )->new();
                    }
                    if (! $include_draft && $obj->has_column( 'status' ) ) {
                        $status_published = $app->status_published( $activity->model );
                        if ( $obj->status != $status_published ) continue;
                    }
                    $_obj = $app->db->model( $activity->model )->new( $obj->get_values() );
                    $_obj->_object_label = $obj->id ? $obj->$primary : $app->translate( '*Deleted*' );
                    $obj = $_obj;
                    $obj->_object_count = $count;
                    $obj->_object_url = $url;
                    $obj->_object_table = $app->translate( $table->label );
                    $objects[] = $obj;
                    $i++;
                }
            }
            $params = $objects;
            $csv = isset( $args['csv'] ) ? $args['csv'] : false;
            if ( $csv ) {
                $repeat = $ctx->false();
                $ts = $app->param( 'year_and_month' ) ? date( 'Y-m', strtotime( $app->param( 'year_and_month' ) ) ) : date( 'Y-m' );
                $upload_dir = $app->upload_dir();
                $csv_out = $upload_dir . DS . "{$ts}.csv";
                $fp = fopen( $csv_out, 'w' );
                if ( $csv == 'Shift_JIS' ) {
                    stream_filter_append( $fp, 'convert.iconv.UTF-8/CP932', STREAM_FILTER_WRITE );
                }
                $line = ['URL', $app->translate( 'Title' ), $app->translate( 'Model' ), 'PV'];
                fputcsv( $fp, $line, ',', '"' );
                foreach ( $params as $obj ) {
                    $object_count = number_format( $obj->_object_count, 0, '.', ',' );
                    $line = [ $obj->_object_url, $obj->_object_label, $obj->_object_table, $object_count ];
                    fputcsv( $fp, $line, ',', '"' );
                }
                fclose( $fp );
                return file_get_contents( $csv_out );
            }
            $ctx->localize( $local_vars );
            $ctx->local_params = $params;
            $ctx->local_vars['local_vars'] = $local_vars;
        }
        if (!isset( $params ) ) $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $repeat = true;
            $obj = $params[ $counter ];
            $var_prefix = isset( $args['prefix'] ) ? $args['prefix'] : 'object';
            $var_prefix .= '_';
            $model = $obj->_model;
            $ctx->stash( 'current_context', $model );
            $ctx->stash( 'current_archive_context', $model );
            $ctx->stash( 'current_container', $model );
            $ctx->stash( $model, $obj );
            if ( $obj->has_column( 'workspace_id', true ) ) {
                if ( $workspace = $obj->workspace ) {
                    $ctx->stash( 'workspace', $workspace );
                    $ctx->stash( 'workspace_id', $workspace->id );
                } else {
                    $ctx->stash( 'workspace', null );
                    $ctx->stash( 'workspace_id', 0 );
                }
            } else if ( $model == 'workspace' ) {
                $ctx->stash( 'workspace', $obj );
                $ctx->stash( 'workspace_id', $obj->id );
            }
            $ctx->local_vars[ $var_prefix . 'id'] = $obj->id;
            $ctx->local_vars[ $var_prefix . 'label'] = $obj->_object_label;
            $ctx->local_vars[ $var_prefix . 'name'] = $obj->_object_label;
            $ctx->local_vars[ $var_prefix . 'title'] = $obj->_object_label;
            $ctx->local_vars[ $var_prefix . 'url'] = $obj->_object_url;
            $ctx->local_vars[ $var_prefix . 'count'] = $obj->_object_count;
            $ctx->local_vars[ $var_prefix . 'model'] = $obj->_model;
            $ctx->local_vars[ $var_prefix . 'table'] = $obj->_object_table;
        } else {
            unset( $params );
            if (!isset( $local_vars ) ) $local_vars = $ctx->local_vars['local_vars'];
            $ctx->restore( $local_vars );
            unset( $local_vars );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_rankedkeywords ( $args, $content, $ctx, &$repeat, $counter ) {
        $app = $ctx->app;
        if (!$counter ) {
            $params = [];
            $model = isset( $args['models'] ) ? $args['models'] : [];
            if ( empty( $model ) && isset( $args['model'] ) ) {
                $model = $args['model'];
            }
            if ( is_string( $model ) ) {
                $model = trim( strtolower( $model ) );
            }
            $sql = 'SELECT searchword_keyword, COUNT(searchword_keyword) FROM mt_searchword ';
            $where = false;
            $period = isset( $args['period'] ) ? $args['period'] : null;
            if ( $period ) {
                $ts = $this->period2ts( $period );
                if ( $ts ) {
                    if (! $where ) {
                        $sql .= ' WHERE ';
                        $where = true;
                    } else {
                        $sql .= ' AND ';
                    }
                    $sql .= ' searchword_created_on >= ?';
                    $values[] = $ts;
                }
            }
            $period = isset( $args['period_end'] ) ? $args['period_end'] : null;
            if ( $period ) {
                $ts = $this->period2ts( $period );
                if ( $ts ) {
                    if (! $where ) {
                        $sql .= ' WHERE ';
                        $where = true;
                    } else {
                        $sql .= ' AND ';
                    }
                    $sql .= ' searchword_created_on <= ?';
                    $values[] = $ts;
                }
            }
            $min_length = isset( $args['min_length'] ) ? (int) $args['min_length'] : 0;
            if ( $min_length ) {
                if (! $where ) {
                    $sql .= ' WHERE ';
                    $where = true;
                } else {
                    $sql .= ' AND ';
                }
                $sql .= " CHAR_LENGTH(searchword_keyword)>={$min_length}";
            }
            $tag_class = new PTTags();
            $extra = $tag_class->include_exclude_workspaces( $app, $args, $app->db->model( 'searchword' ) );
            if ( $extra ) {
                if (! $where ) {
                    $sql .= ' WHERE ';
                    $where = true;
                } else {
                    $sql .= ' AND ';
                }
                $sql .= 'searchword_workspace_id ' . $extra;
            }
            $min_count = isset( $args['min_count'] ) ? (int) $args['min_count'] : 0;
            $having = '';
            if ( $min_count ) {
                $having = "HAVING COUNT(searchword_keyword)>={$min_count}";
            }
            $sql .= " GROUP BY searchword_keyword {$having} ORDER BY COUNT(searchword_keyword) DESC";
            $limit = isset( $args['limit'] ) ? (int) $args['limit'] : null;
            if ( $limit && $limit > 0 ) {
                $sql .= " LIMIT {$limit}";
            }
            $params = isset( $values ) ? $app->db->model( 'searchword' )->load( $sql, $values )
                                       : $app->db->model( 'searchword' )->load( $sql );
            if ( empty( $params ) ) {
                $repeat = $ctx->false();
                return;
            }
            $objects = [];
            $tables = [];
            $i = 0;
            foreach ( $params as $idx => $param ) {
                $param = $param->get_values();
                $count = isset( $param['COUNT(searchword_keyword)'] )
                       ? (int) $param['COUNT(searchword_keyword)'] : $param['searchword_COUNT(searchword_keyword)'];
                if (! $count ) continue;
                $params[ $idx ]->_count = $count;
            }
            $csv = isset( $args['csv'] ) ? $args['csv'] : false;
            if ( $csv ) {
                $repeat = $ctx->false();
                $ts = $app->param( 'year_and_month' ) ? date( 'Y-m', strtotime( $app->param( 'year_and_month' ) ) ) : date( 'Y-m' );
                $upload_dir = $app->upload_dir();
                $csv_out = $upload_dir . DS . "{$ts}.csv";
                $fp = fopen( $csv_out, 'w' );
                if ( $csv == 'Shift_JIS' ) {
                    stream_filter_append( $fp, 'convert.iconv.UTF-8/CP932', STREAM_FILTER_WRITE );
                }
                $line = [ $app->translate( 'Search Word' ), $this->translate( 'Number of Searches' ) ];
                fputcsv( $fp, $line, ',', '"' );
                foreach ( $params as $obj ) {
                    $object_count = number_format( $obj->_count, 0, '.', ',' );
                    $line = [ $obj->searchword_keyword, $object_count ];
                    fputcsv( $fp, $line, ',', '"' );
                }
                fclose( $fp );
                return file_get_contents( $csv_out );
            }
            $ctx->local_params = $params;
        }
        if (!isset( $params ) ) $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $repeat = true;
            $obj = $params[ $counter ];
            $var_prefix = isset( $args['prefix'] ) ? $args['prefix'] : 'object';
            $var_prefix .= '_';
            $ctx->local_vars[ $var_prefix . 'keyword'] = $obj->searchword_keyword;
            $ctx->local_vars[ $var_prefix . 'count'] = $obj->_count;
        } else {
            unset( $params );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function hdlr_activitymonths ( $args, $content, $ctx, &$repeat, $counter ) {
        if (!$counter ) {
            $app = $ctx->app;
            $sql = 'SELECT DISTINCT YEAR(activity_created_on), MONTH(activity_created_on) FROM mt_activity';
            $workspace_id = isset( $args['workspace_id'] ) && $args['workspace_id']
                          ? (int) $args['workspace_id'] : null;
            if ( $workspace_id ) {
                $sql .= " WHERE activity_workspace_id=?";
                $activitymonths = $app->db->model( 'activity' )->load( $sql, [ $workspace_id ] );
            } else {
                $activitymonths = $app->db->model( 'activity' )->load( $sql );
            }
            $yKey = 'YEAR(activity_created_on)';
            $mKey = 'MONTH(activity_created_on)';
            $params = [];
            foreach ( $activitymonths as $activitymonth ) {
                $month = sprintf( '%02d', $activitymonth->$mKey );
                $params[] = $activitymonth->$yKey . $month . '01000000';
            }
            rsort( $params, SORT_NUMERIC );
            if (!$params ) {
                $repeat = $ctx->false();
                return;
            }
            $ctx->local_params = $params;
        }
        if (!isset( $params ) ) $params = $ctx->local_params;
        $ctx->set_loop_vars( $counter, $params );
        if ( isset( $params[ $counter ] ) ) {
            $repeat = true;
            $var = isset( $args['var'] ) ? $args['var'] : '__value__';
            $ctx->local_vars[ $var ] = $params[ $counter ];
        } else {
            unset( $params );
            $repeat = $ctx->false();
        }
        return ( $counter > 1 && isset( $args['glue'] ) )
            ? $args['glue'] . $content : $content;
    }

    function period2ts ( $period ) {
        $ts= null;
        if ( preg_match( '/^[0-9]{14}$/', $period ) ) {
            preg_match( '/^(\d\d\d\d)?(\d\d)?(\d\d)?(\d\d)?(\d\d)?(\d\d)?$/', $period, $mts );
            list( $all, $Y, $M, $D, $h, $m, $s ) = $mts;
            $ts = sprintf( "%04d-%02d-%02d %02d:%02d:%02d", $Y, $M, $D, $h, $m, $s );
        } else if ( stripos( $period, 'last' ) === 0 ) {
            $period = preg_replace( '/^last/i', '', $period );
            if ( preg_match( '/^([0-9]{1,})(.*$)/', $period, $mts ) ) {
                $number = (int) $mts[1];
                $unit = $mts[2];
                $days = 0;
                if ( stripos( $unit, 'day' ) === 0 ) {
                    // $number is equal to days.
                } else if ( stripos( $unit, 'week' ) === 0 ) {
                    $number *= 7;
                } else if ( stripos( $unit, 'month' ) === 0 ) {
                    $number *= 30;
                } else if ( stripos( $unit, 'year' ) === 0 ) {
                    $number *= 365;
                }
                $ts = date( 'Y-m-d H:i:s', strtotime( "-{$number} day" ) );
            }
        }
        return $ts;
    }

    function hdlr_accesstracking ( $args, $ctx ) {
        $app = $ctx->app;
        $workspace = $ctx->stash( 'workspace' );
        $workspace_id = $workspace ? (int) $workspace->id : 0;
        $language = isset( $args['lang'] ) ? $args['lang'] : null;
        if (! $language && isset( $args['language'] ) ) {
            $language = $args['language'];
        }
        if ( $app->id === 'Bootstrapper' && !isset( $args['url'] ) ) {
            if ( $app->request_method !== 'GET' || $this->already_save ) {
                return '';
            }
            $url = $ctx->stash( 'current_urlinfo' );
            if (! $url || !$url->id ) {
                return '';
            }
            if ( $url->delete_flag ) {
                return '';
            }
            $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
            $exclude_bots = $this->get_config_value( 'accessanalytics_exclude_bots' );
            if ( $exclude_bots && $user_agent ) {
                $exclude_bots = preg_split( '/\s*,\s*/', $exclude_bots );
                foreach ( $exclude_bots as $exclude_bot ) {
                    if ( stripos( $user_agent, $exclude_bot ) !== false ) {
                        return '';
                    }
                }
            }
            $exclude_ips = $this->get_config_value( 'accessanalytics_exclude_ips' );
            if ( $exclude_ips ) {
                $exclude_ips = preg_split( '/\s*,\s*/', $exclude_ips );
                if ( in_array( $app->remote_ip, $exclude_ips ) ) {
                    return '';
                }
            }
            $activity = $app->db->model( 'activity' )->new( ['url' => $url->url ] );
            $activity->object_id( (int) $url->object_id );
            $activity->model( $url->model );
            $query_string = $app->query_string() ? urldecode( $app->query_string() ) : '';
            $activity->query_string( $query_string );
            $class = 'Page View';
            $queries = $this->get_config_value( 'accessanalytics_queries', $workspace_id );
            $query_strings = [];
            $and_or = null;
            if ( $queries ) {
                $queries = preg_split( '/\s*,\s*/', trim( $queries ) );
                foreach ( $queries as $query ) {
                    if ( $query_str = $app->param( $query ) ) {
                        if ( is_array( $query_str ) ) {
                            $query_str = implode( ' ', $query_str );
                        }
                        $query_str = strtolower( $query_str );
                        $class = 'Search';
                        $query_str = preg_split( '/\s{1,}/', trim( $query_str ) );
                        $and_or = $app->param( 'and_or' ) ? strtoupper( $app->param( 'and_or' ) ) : null;
                        if (! $and_or && count( $query_str ) > 1 ) {
                            $and_or = 'OR';
                        }
                        if ( $and_or && $and_or != 'AND' && $and_or != 'OR' ) {
                            $and_or = 'OR';
                        }
                        $query_strings = array_merge( $query_strings, $query_str );
                    }
                }
            }
            if ( $app->param( '_filter' ) ) {
                $model = $app->param( '_filter' );
                $table = $app->get_table( $model );
                if ( $table && $table->id ) {
                    $class = 'Search';
                }
            }
            if ( $member = $app->user( 'member' ) ) {
                $activity->member_id( $member->id );
            }
            if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
                $activity->referrer( $_SERVER['HTTP_REFERER'] );
            }
            $activity->class( $class );
            $activity->workspace_id( (int) $url->workspace_id );
            if ( $user_agent ) {
                $activity->user_agent( $user_agent );
            }
            if ( $language && $activity->has_column( 'language' ) ) {
                $activity->language( $language );
            }
            $app->set_default( $activity );
            $this->already_save = $activity;
            $activity->save();
            if (! empty( $query_strings ) ) {
                $query_strings = array_unique( $query_strings );
                foreach ( $query_strings as $query_str ) {
                    $searchword = $app->db->model( 'searchword' )->new(
                        ['keyword' => $query_str, 'activity_id' => $activity->id ]
                    );
                    $searchword->and_or( $and_or );
                    $searchword->remote_ip( $app->remote_ip );
                    $searchword->workspace_id( $workspace_id );
                    $searchword->created_on( date( 'YmdHis' ) );
                    $searchword->save();
                }
            }
            return '';
        }
        $app_url = $this->get_config_value( 'accessanalytics_app_url', $workspace_id );
        if (! $app_url ) {
            $app_url = $app->accessanalytics_app_url;
            if (! $app_url ) {
                $app_url = $app->base . $app->path . 'plugins/AccessAnalytics/app/pt-accessanalytics.php';
            }
        }
        if ( isset( $args['relative'] ) ) {
            $app_url = preg_replace( "/^https{0,1}:\/\/.*?\//", '/', $app_url );
        }
        if ( isset( $args['url'] ) ) {
            return $app_url;
        }
        $tmpl = $app->ctx->get_template_path( 'accessanalytics_tracking.tmpl' );
        $old_vars = $ctx->vars;
        $ctx->vars['app_url'] = $app_url;
        $ctx->vars['language'] = $language;
        $script = $ctx->build( file_get_contents( $tmpl ) );
        $ctx->vars = $old_vars;
        return $script;
    }

    function post_save_comment ( &$cb, $app, &$obj, $original, $clone_org = null ) {
        return $this->post_save_object( $cb, $app, $obj, 'Comment' );
    }

    function post_save_contact ( &$cb, $app, &$obj, $original, $clone_org = null ) {
        return $this->post_save_object( $cb, $app, $obj, 'Contact' );
    }

    function post_save_object ( &$cb, $app, &$obj, $class ) {
        $is_new = isset( $cb['is_new'] ) && $cb['is_new'] ? true : false;
        if ( $app->id !== 'Bootstrapper' || !$is_new ) {
            return true;
        }
        $url = $this->get_current_url( $app );
        $ctx = $app->ctx;
        $urlinfo = $ctx->stash( 'current_urlinfo' );
        if (!$urlinfo || !$urlinfo->id ) {
            return true;
        }
        $activity = $app->db->model( 'activity' )->new( ['url' => $url ] );
        $activity->object_id( (int) $urlinfo->object_id );
        $activity->model( $urlinfo->model );
        if ( $member = $app->user( 'member' ) ) {
            $activity->member_id( $member->id );
        }
        $activity->class( $class );
        if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
            $activity->user_agent( $_SERVER['HTTP_USER_AGENT'] );
        }
        $activity->workspace_id( $obj->workspace_id );
        $app->set_default( $activity );
        $activity->save();
        return true;
    }

    function post_login_member ( &$cb, $app, &$member ) {
        $url = $this->get_current_url( $app );
        $activity = $app->db->model( 'activity' )->new( ['url' => $url ] );
        $activity->object_id( (int) $member->id );
        $activity->member_id( (int) $member->id );
        $activity->model( 'member' );
        $activity->class( 'Login' );
        if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
            $activity->user_agent( $_SERVER['HTTP_USER_AGENT'] );
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $activity->workspace_id( $workspace_id );
        $app->set_default( $activity );
        $activity->save();
        return true;
    }

    function post_logout_member ( &$cb, $app, &$member ) {
        $url = $this->get_current_url( $app );
        $activity = $app->db->model( 'activity' )->new( ['url' => $url ] );
        $activity->object_id( (int) $member->id );
        $activity->member_id( (int) $member->id );
        $activity->model( 'member' );
        $activity->class( 'Logout' );
        if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
            $activity->user_agent( $_SERVER['HTTP_USER_AGENT'] );
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $activity->workspace_id( $workspace_id );
        if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
            $activity->user_agent( $_SERVER['HTTP_USER_AGENT'] );
        }
        $app->set_default( $activity );
        $activity->save();
        return true;
    }

    function list_page_views ( $app ) {
        $_type = $app->param( '_type' );
        if ( $_type == 'export' ) {
            $params = [];
            $data = $app->build_page( 'page_views_csv.tmpl', $params, false );
            $ts = $app->param( 'year_and_month' ) ? date( 'Y-m', strtotime( $app->param( 'year_and_month' ) ) ) : date( 'Y-m-d-' );
            if (! $app->param( 'year_and_month' ) ) {
                $workspace_id = (int) $app->param( 'workspace_id' );
                $activity_limit = $this->get_config_value( 'accessanalytics_activity_limit', $workspace_id );
                $ts .= "last{$activity_limit}days";
            }
            $file_name = "{$ts}.csv";
            $file_size = strlen( bin2hex( $data ) ) / 2;
            header( "Content-Type: text/csv" );
            header( "Content-Length: {$file_size}" );
                header( "Content-Disposition: attachment;"
                    . " filename=\"{$file_name}\"" );
                header( "Pragma: " );
            echo $data;
            exit();
        }
        echo $app->build_page( 'page_views_list.tmpl' );
    }

    function list_searchwords ( $app ) {
        $_type = $app->param( '_type' );
        if ( $_type == 'export' ) {
            $params = [];
            $data = $app->build_page( 'searchwords_csv.tmpl', $params, false );
            $ts = $app->param( 'year_and_month' ) ? date( 'Y-m', strtotime( $app->param( 'year_and_month' ) ) ) : date( 'Y-m-d-' );
            if (! $app->param( 'year_and_month' ) ) {
                $workspace_id = (int) $app->param( 'workspace_id' );
                $activity_limit = $this->get_config_value( 'accessanalytics_activity_limit', $workspace_id );
                $ts .= "last{$activity_limit}days";
            }
            $file_name = "{$ts}.csv";
            $file_size = strlen( bin2hex( $data ) ) / 2;
            header( "Content-Type: text/csv" );
            header( "Content-Length: {$file_size}" );
                header( "Content-Disposition: attachment;"
                    . " filename=\"{$file_name}\"" );
                header( "Pragma: " );
            echo $data;
            exit();
        }
        echo $app->build_page( 'searchwords_list.tmpl' );
    }

    function get_current_url ( $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $ctx = $app->ctx;
        if ( isset( $ctx->vars['current_archive_url'] ) ) return $ctx->vars['current_archive_url'];
        if ( $app->id == 'Bootstrapper' ) {
            $url = $ctx->stash( 'current_urlinfo' );
            if ( $url && $url->id ) {
                return $url;
            }
        }
        list( $request, $param ) = array_pad( explode( '?', $app->request_uri ), 2, null );
        if ( preg_match( '!/$!', $request ) ) {
            $request .= 'index.html';
        }
        $host = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : null;
        if (! $host ) {
            $host = isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : null;
        }
        $protocol= $app->is_secure ? 'https' : 'http';
        return "{$protocol}://{$host}{$request}";
    }

}