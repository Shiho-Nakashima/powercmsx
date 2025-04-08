<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class LinkChecker extends PTPlugin {

    const DAY_OF_WEEK  = [
          'sunday',    //0
          'monday',    //1
          'tuesday',   //2
          'wednesday', //3
          'thursday',  //4
          'friday',    //5
          'saturday',  //6
    ];

    private $tmp_sessions = [];
    public  $cookie = null;
    public  $digest = false;

    function __construct () {
        $app = Prototype::get_instance();
        if ( $app->id == 'Prototype' && $app->mode == 'linkchecker_linkcheck' ) {
            if ( $max_execution_time = $app->max_exec_time ) {
                $max_execution_time = (int) $max_execution_time;
                ini_set( 'max_execution_time', $max_execution_time );
            }
        }
        parent::__construct();
    }

    function linkchecker_start_app ( &$app ) {
        $app->permissions[] = 'can_linkchecker';
        if ( $app->linkchecker_open_external && $app->id === 'Prototype'
            && !$app->param( 'dialog_view' ) && !$app->mode != 'rebuild_phase' ) {
            if ( isset( $app->registry['menus']['linkchecker_linkcheck'] ) ) {
                $app->registry['menus']['linkchecker_linkcheck']['target'] = '_blank';
            }
        }
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'role' );
        $column = $app->db->model( 'column' )->get_by_key(
            ['table_id' => $table->id, 'name' => 'can_linkchecker'] );
        if (! $column->id ) {
            $upgrader = new PTUpgrader;
            $can_linkchecker = ['type' => 'tinyint', 'label' => 'Broken Link Check',
                                'index' => 1, 'size' => 4, 'order' => 4000,
                                'edit' => 'checkbox', 'list' => 'checkbox'];
            $upgrader->make_column( $table, 'can_linkchecker', $can_linkchecker, false );
            $upgrader->upgrade_scheme( 'role' );
        }
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'role' );
        $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id,
                                                            'name' => 'can_linkchecker'] );
        if ( $column->id ) {
            $column->remove();
            $upgrader = new PTUpgrader;
            $upgrader->upgrade_scheme( 'role' );
        }
        return true;
    }

    function linkchecker_post_run ( $app ) {
        if (! empty( $this->tmp_sessions ) ) {
            $app->db->model( 'session' )->remove_multi( $this->tmp_sessions );
        }
    }

    function pre_save_plugin_config ( $cb, $app, $component, &$errors ) {
        if ( $component->id != 'linkchecker' ) {
            return true;
        }
        if ( $app->param( 'reset_config' ) ) return true;
        $time = $app->param( 'setting_linkchecker_time' );
        $time = str_replace( ':', '', $time );
        if ( (! preg_match( '/^[0-9]{4}$/', $time ) ) || $time > 235959 ) {
            $errors[] = $this->translate( 'Please enter a valid time.' );
        }
        $email_to = $app->param( 'setting_linkchecker_email_to' );
        $email_from = $app->param( 'setting_linkchecker_email_from' );
        $addrs = [];
        $addrs[] = $email_to;
        $addrs[] = $email_from;
        $counter = 0;
        $ctx = $app->ctx;
        $regex = '<\${0,1}' . $ctx->prefix;
        $regex_end = '<\/' . $ctx->prefix;
        foreach ( $addrs as $email ) {
            $counter++;
            if (! $email ) continue;
            $col_name = $counter === 1 ? $this->translate( 'Email To' )
                                       : $this->translate( 'Email From' );
            if ( preg_match( "/{$regex}[^>]*?>/i", $email ) ) {
                $email = preg_replace( "/{$regex}[^>]*?>/", ',', $email );
                $email = preg_replace( "/{$regex_end}[^>]*?>/", ',', $email );
                $email = trim( $email, ',' );
                $email = preg_replace( '/\,{1,}/', ',', $email );
            }
            if ( strpos( $email, ',' ) !== false ) {
                $emails = preg_split( '/\s*,\s*/', $email );
            } else {
                $emails = [ $email ];
            }
            foreach ( $emails as $email ) {
                if (!$app->is_valid_email( $email, $msg ) ) {
                    $errors[] = $app->translate(
                                "Please specify a valid Email Address for %s.", $col_name );
                }
            }
        }
        $member_name = $app->param( 'setting_linkchecker_member_name' );
        if ( $member_name ) {
            $member = $app->db->model( 'member' )->get_by_key( ['name' => ['BINARY' => $member_name ],
                                                                'ststus' => 2, 'delete_flag' => 0 ] );
            if (! $member->id ) {
                $errors[] = $this->translate( "The Member '%s' was not found.", $member_name );
            }
        }
        if (! empty( $errors ) ) {
            return false;
        }
        return true;
    }

    function app_linkcheck( $app ) {
        $workspace_id = (int) $app->param( 'workspace_id' );
        $this->linkchecker_linkcheck( $app, $workspace_id );
    }

    function linkchecker_linkcheck ( $app, $workspace_id = null ) {
        if ( $max_execution_time = $app->linkchecker_max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        /* Move to queue
        if ( $app->id === 'Worker' ) {
            if ( $app->linkchecker_worker_async && basename( $_SERVER['PHP_SELF'] ) == 'worker.php' ) {
                $php_binary = $app->php_binary();
                if ( $php_binary ) {
                    $cmd = $php_binary . ' ' . $this->path() . DS . 'tools' . DS . 'linkChecker.php';
                    chdir( $app->pt_dir );
                    $process = proc_open( $cmd, [], $pipes );
                    return false;
                }
            }
        }
        */
        $force = false;
        $all_scope = $this->get_config_value( 'linkchecker_all_scope', 0 ) && $app->linkchecker_can_all_scope;
        $sth = $app->db->model( 'workspace' )->load_iter( [], ['sort' => 'id', 'direction' => 'ascend'], 'id' );
        if ( $workspace_id === null ) {
            $workspace_ids = [0];
            $workspace_ids = array_merge( $workspace_ids, $sth->fetchAll( PDO::FETCH_COLUMN ) );
        } else {
            if ( $all_scope && $workspace_id === 0 ) {
                $workspace_ids = [0];
                $workspace_ids = array_merge( $workspace_ids, $sth->fetchAll( PDO::FETCH_COLUMN ) );
            } else {
                $workspace_ids = [ $workspace_id ];
                $sth->fetchAll( PDO::FETCH_COLUMN );
            }
            $force = true;
        }
        $pub = new PTPublisher();
        /*
        $pub->publish_queue();
        */
        $ctx = $app->ctx;
        if (! $theme_static = $app->theme_static ) {
            $theme_static = $app->path . 'theme-static/';
            $app->theme_static = $theme_static;
        }
        $ctx->vars['theme_static'] = $theme_static;
        $old_vars = $ctx->vars;
        $fmgr = $app->fmgr;
        libxml_use_internal_errors( true );
        $all_urls = [];
        $script_uri = $app->admin_url ? $app->admin_url : $app->script_uri;
        $counter = 0;
        $all_bodys = [];
        $all_total_error = 0;
        $all_check_pages = 0;
        $all_error = 0;
        $all_metadata = [];
        $log_msg = '<mt:trans phrase="Broken link check was performed." component="LinkChecker">';
        $log_msg .= '<mt:if name="total_error"><mt:trans phrase="%1$s broken links found in %2$s page(s)." params="\'$broken_links\',\'$all_pages\'" component="LinkChecker">';
        $log_msg .= '<mt:else><mt:trans phrase="Found no broken links." component="LinkChecker"></mt:if>';
        $all_pages = 0;
        $all_log = null;
        if ( $app->id === 'Worker' && $all_scope && $this->is_excecute( $app, 0 ) ) {
            $all_log = $app->log( ['message' => $this->translate( 'All LinkCheck Start...' ),
                                   'workspace_id' => 0, 'category' => 'worker'] );
        }
        $print_state = $app->linkchecker_print_state && $app->id === 'Prototype';
        if ( $print_state ) {
            $print_state_tmpl = file_get_contents( $this->path() . DS . 'tmpl' . DS . 'print_state.tmpl' );
            while ( ob_get_level() > 0 ) {
                ob_end_flush();
            }
            echo str_repeat( ' ', 1024 );
            $frame_tmpl = file_get_contents( $this->path() . DS . 'tmpl' . DS . 'linkchecker_print_state.tmpl' );
            echo $app->build( $frame_tmpl );
            flush();
        }
        $odd = true;
        $no_print_errors = 0;
        $app->init_tags();
        $app->init_tags = true;
        foreach ( $workspace_ids as $workspace_id ) {
            $results = [];
            $workspace_id = (int) $workspace_id;
            if (! $force && ! $all_scope ) {
                $enabled = $this->get_config_value( 'linkchecker_email_to', $workspace_id );
                if (! $enabled ) continue;
            }
            if (! $force && ! $all_scope ) {
                if (! $this->is_excecute( $app, $workspace_id ) ) {
                    continue;
                }
            } else if (! $force && $all_scope ) {
                if (! $this->is_excecute( $app, 0 ) ) {
                    continue;
                }
            }
            $workspace = null;
            if ( $workspace_id ) {
                $workspace = $app->db->model( 'workspace' )->load( $workspace_id );
                $app->stash( 'workspace', $workspace );
            }
            if ( $print_state && $all_scope ) {
                $appname = $workspace ? $app->escape( $workspace->name ) : $app->appname;
                echo '<h3 class="mt-2 ml-2 mr-2">' , $this->translate( "The broken link check for'%s'...", $appname ), '</h3>';
                flush();
            }
            $ws_log = null;
            if ( $app->id === 'Worker' && $workspace_id && $this->is_excecute( $app, $workspace_id ) ) {
                $ws_log = $app->log( ['message' => $this->translate( 'LinkCheck Start...' ),
                                      'workspace_id' => $workspace_id, 'category' => 'worker'] );
            }
            $user_agent = $app->linkchecker_useragent;
            $outer_link = $this->get_config_value( 'linkchecker_outer_link', $workspace_id );
            $exclude_nofollow = $this->get_config_value( 'linkchecker_exclude_nofollow', $workspace_id );
            $exclude_paths = $this->get_config_value( 'linkchecker_exclude_paths', $workspace_id );
            $only_errors = $this->get_config_value( 'linkchecker_only_errors', $workspace_id );
            $member_name = $this->get_config_value( 'linkchecker_member_name', $workspace_id );
            $username = $this->get_config_value( 'linkchecker_username', $workspace_id );
            $password = $this->get_config_value( 'linkchecker_password', $workspace_id );
            $digest = $this->get_config_value( 'linkchecker_digest', $workspace_id );
            $this->digest = $digest;
            // $basic_auth = $username ? base64_encode( "{$username}:{$password}" ) : '';
            $basic_auth_raw = $username ? "{$username}:{$password}" : '';
            $cookie = null;
            $members = $app->component( 'Members' );
            if ( $exclude_paths ) {
                $exclude_paths = preg_split( '/\s*,\s*/', $exclude_paths );
            } else {
                $exclude_paths = [];
            }
            if ( $member_name && $members ) {
                $member = $app->db->model( 'member' )->get_by_key( ['name' => ['BINARY' => $member_name ],
                                                                    'ststus' => 2, 'delete_flag' => 0 ] );
                if ( $member->id ) {
                    $session = $app->db->model( 'session' )->get_by_key( ['user_id' => $member->id, 'key' => 'member', 'kind' => 'US'] );
                    if (! $session->id || $session->expires < $app->request_time ) {
                        $session->start( $app->request_time );
                        $session->expires( $app->request_time + $app->sess_timeout );
                        $session->save();
                        $this->tmp_sessions[] = $session;
                    }
                    $session_name = $session->name;
                    $cookie_name = $members->cookie_name;
                    $cookie = "Cookie: {$cookie_name}={$session_name}";
                    $this->cookie = $cookie;
                    $app->ctx->stash( 'member', $member );
                    $members->member = $member;
                } else {
                    $app->ctx->vars['errors'][] = $this->translate( "The Member '%s' was not found.", $member_name );
                }
            }
            $terms = ['mime_type' => 'text/html', 'workspace_id' => $workspace_id ];
            $dynamic = $this->get_config_value( 'linkchecker_dynamic', $workspace_id );
            if (! $dynamic ) {
                $terms['publish_file'] = [1, 2, 3, 4, 5];
            }
            $error = 0;
            $total_error = 0;
            $check_pages = 0;
            $urls = $app->db->model( 'urlinfo' )->load( $terms );
            $page_errors = [];
            $old_id = $app->id;
            $pages = 0;
            foreach ( $urls as $url ) {
                if (! empty( $exclude_paths ) ) {
                    foreach ( $exclude_paths as $exclude_path ) {
                        if ( strpos( $exclude_path, '!' ) === 0 &&
                             mb_substr_count( $exclude_path, '!' ) == 2 ) {
                            if ( preg_match( $exclude_path, $url->url ) ) {
                                continue 2;
                            }
                        } else {
                            if ( strpos( $url->url, $exclude_path ) !== false ) {
                                continue 2;
                            }
                        }
                    }
                }
                $page_error = 0;
                $counter++;
                $file_path = $url->file_path;
                $extension = PTUtil::get_extension( $file_path, true );
                if ( $url->publish_file == 3 && !file_exists( $url->file_path ) ) {
                    $pub->publish( $url );
                } else if ( $url->publish_file == 4 && !$url->is_published ) {
                    $data = $pub->publish( $url );
                    $hash = md5( $data );
                    $publish = false;
                    $md5 = $url->md5;
                    if ( !$md5 && file_exists( $file_path ) ) {
                        $md5 = md5( $fmgr->get( $file_path ) );
                    }
                    if (! file_exists( $file_path ) || ( !$md5 || $md5 !== $hash ) ) {
                        $publish = true;
                    }
                    if ( $publish ) {
                        $fmgr->put( $file_path, $data );
                    }
                    $extension = PTUtil::get_extension( $file_path, true );
                    $mime_type = PTUtil::get_mime_type( $extension );
                    $url->mime_type( $mime_type );
                    $url->is_published( 1 );
                    $url->save();
                }
                $admin_url = $script_uri . '?__mode=view&_type=edit&_model='
                                         . $url->model . '&id=' . $url->object_id;
                if ( $workspace_id ) {
                    $admin_url .= '&workspace_id=' . $workspace_id;
                }
                if ( $app->id === 'Prototype' && $url->object_id && $url->model ) {
                    $model = $url->model;
                    $obj = $app->db->model( $model )->load( $url->object_id );
                    if (!$app->can_do( $model, 'edit', $obj ) ) {
                        $admin_url = null;
                    }
                }
                $with_admin_url = $admin_url ? $url->url . PHP_EOL . '  ' . $admin_url : $url->url;
                $html = null;
                if ( file_exists( $url->file_path ) ) {
                    if ( $extension === 'php' ) {
                        if ( basename( $file_path ) === 'pt-view.php' && $url->model === 'template' ) {
                            $t = $app->db->model( 'template' )->load( $url->object_id );
                            if ( is_object( $t ) && strpos( $t->basename, 'bootstrapper' ) !== false ) {
                                continue;
                            }
                        }
                        $html = $this->file_get_contents( $url->url, $basic_auth_raw, $app );
                        if ( $html === false ) {
                            continue;
                        }
                    } else {
                        $html = @file_get_contents( $url->file_path );
                    }
                } else if ( $url->publish_file == 6 ) {
                    $app->id = 'Bootstrapper';
                    $html = $pub->publish( $url );
                    $app->id = $old_id;
                }
                if ( $this->is_not_html( $html ) ) {
                    continue;
                }
                $parse_url = parse_url( $url->url );
                if (! isset( $parse_url['host'] ) ) continue;
                $host = $parse_url['host'];
                $dom = new DomDocument();
                $errors = [];
                $base = $url->url;
                if ( stripos( $html, '<s' ) !== false ) {
                    if ( stripos( $html, '<script' ) !== false ) {
                        $html = preg_replace( '/<script.*?<\/script>/si', '', $html );
                    }
                    if ( stripos( $html, '<style' ) !== false ) {
                        $html = preg_replace( '/<style.*?<\/style>/si', '', $html );
                    }
                }
                if ( $dom->loadHTML( mb_encode_numericentity( $html, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
                    LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
                    $check_pages++;
                    $all_check_pages++;
                    $bases = $dom->getElementsByTagName( 'base' );
                    if ( $bases->length ) {
                        for ( $i = 0; $i < $bases->length; $i++ ) {
                            $ele = $bases->item( $i );
                            $href = $ele->getAttribute( 'href' );
                            if ( $href ) {
                                $base = $href;
                            }
                        }
                    }
                    $elements = $dom->getElementsByTagName( '*' );
                    $links = [];
                    $outer_links = [];
                    if ( $elements->length ) {
                        for ( $i = 0; $i < $elements->length; $i++ ) {
                            $ele = $elements->item( $i );
                            $link = $ele->getAttribute( 'src' );
                            if (! $link ) $link = $ele->getAttribute( 'href' );
                            if (! $link ) $link = $ele->getAttribute( 'action' );
                            if (! $link ) continue;
                            if ( $exclude_nofollow ) {
                                $rel = $ele->getAttribute( 'rel' );
                                if ( $rel && strtolower( $rel ) == 'nofollow' ) {
                                    continue;
                                }
                            }
                            if ( strpos( $link, '#' ) === 0 ) continue;
                            if ( stripos( $link, 'mailto:' ) === 0 ) continue;
                            if ( stripos( $link, 'tel:' ) === 0 ) continue;
                            if ( stripos( $link, 'javascript:' ) === 0 ) continue;
                            if ( stripos( $link, 'data:' ) === 0 ) continue;
                            $link = PTUtil::convert2abs( $link, $base );
                            $parse_link = parse_url( $link );
                            if (! isset( $parse_link['host'] ) ) continue;
                            if ( isset( $all_urls[ $link ] ) ) {
                                if ( $all_urls[ $link ] === false ) {
                                    $error++;
                                    $page_error++;
                                    $all_error++;
                                    $errors[ $link ] = true;
                                }
                                continue;
                            }
                            if ( $parse_link['host'] !== $host ) {
                                if (! $outer_link ) {
                                    continue;
                                } else {
                                    if ( $ele->tagName == 'link' ) {
                                        $rel = $ele->getAttribute( 'rel' );
                                        if ( $rel ) {
                                            $rel = strtolower( $rel );
                                            if ( $rel == 'preconnect' || $rel == 'dns-prefetch' ) {
                                                continue;
                                            }
                                        }
                                    }
                                    $outer_links[] = $link;
                                    continue;
                                }
                            }
                            $links[] = $link;
                        }
                        if ( $outer_links ) {
                            $outer_links_list = array_chunk( $outer_links, $app->linkchecker_parallel );
                            foreach ( $outer_links_list as $o_links ) {
                                $ch_list = [];
                                $m_ch = curl_multi_init();
                                foreach ( $o_links as $link ) {
                                    $ch = curl_init();
                                    $ch_list[] = $ch;
                                    $this->curl_setoption( $app, $ch, $link, true, $basic_auth_raw );
                                    curl_multi_add_handle( $m_ch, $ch );
                                }
                                $m_ch_active = null;
                                $m_ch_status = null;
                                do {
                                    $m_ch_status = curl_multi_exec( $m_ch, $m_ch_active );
                                    if ( $m_ch_active ) {
                                        curl_multi_select( $m_ch );
                                    }
                                } while ( $m_ch_active && $m_ch_status === CURLM_OK );
                                foreach ( $ch_list as $ch ) {
                                    $status_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
                                    $link = curl_getinfo( $ch, CURLINFO_EFFECTIVE_URL );
                                    if ( $status_code == 200 ) {
                                        $all_urls[ $link ] = true;
                                    } else {
                                        $response = false;
                                        if ( $status_code == 301 || $status_code == 302 || $status_code == 303 || $status_code == 307 ) {
                                            $redirect_url = curl_getinfo( $ch, CURLINFO_REDIRECT_URL );
                                            if ( $redirect_url ) {
                                                $response = $this->url_existing( $link, $basic_auth_raw, $app );
                                            }
                                            if ( $response === false && $app->linkchecker_retry_outlink ) {
                                                $response = $this->_url_existing( $redirect_url, false, $basic_auth_raw, $app );
                                                //$response = file_get_contents( $redirect_url, false, null, 0, 1 );
                                            }
                                        } else if ( $app->linkchecker_retry_outlink ) {
                                            // CURLOPT_NOBODY => FALSE
                                            $response = $this->_url_existing( $link, false, $basic_auth_raw, $app );
                                        }
                                        if ( $response !== false ) {
                                            $all_urls[ $link ] = true;
                                        } else {
                                            $all_urls[ $link ] = false;
                                            $error++;
                                            $page_error++;
                                            $all_error++;
                                            $errors[ $link ] = true;
                                        }
                                    }
                                    curl_multi_remove_handle( $m_ch, $ch );
                                    curl_close( $ch );
                                }
                                curl_multi_close( $m_ch );
                            }
                            unset( $outer_links_list );
                        }
                    }
                    foreach ( $links as $link ) {
                        if ( strpos( basename( $link ) , '#' ) !== false ) {
                            $_filename = preg_replace( '/#.*$/', '', basename( $link ) );
                            $link = dirname( $link ) . '/' . $_filename;
                        }
                        if ( preg_match( "/\/$/", $link ) ) {
                            $_link = $link . $app->directory_index;
                        } else if ( strpos( $link, '?' ) !== false ) {
                            list( $_link, $query ) = explode( '?', $link );
                        } else {
                            $_link = $link;
                        }
                        $link_urls = $app->db->model( 'urlinfo' )->load( ['url' => $_link ] );
                        if ( empty( $link_urls ) && strpos( basename( $_link ), '.' ) === false ) {
                            $_link = $_link . '/' . $app->directory_index;
                            $link_urls = $app->db->model( 'urlinfo' )->load( ['url' => $_link ] );
                        }
                        if ( empty( $link_urls ) && strpos( $_link, '%' ) !== false ) {
                            $link_urls = $app->db->model( 'urlinfo' )->load( ['url' => urldecode( $_link ) ] );
                        }
                        if ( empty( $link_urls ) ) {
                            $response = $this->url_existing( $link, $basic_auth_raw, $app );
                            if ( $response === false ) {
                                $site_url = $workspace ? $workspace->site_url : $app->site_url;
                                if ( strpos( $_link, $site_url ) === 0 ) {
                                    $site_path = $workspace ? $workspace->site_path : $app->site_path;
                                    $site_path = rtrim( $site_path, DS ) . DS;
                                    $site_url = preg_quote( $site_url, '/' );
                                    $_link_file = preg_replace( "/^{$site_url}/", $site_path, $_link );
                                    if ( file_exists( $_link_file ) ) {
                                        $response = true;
                                    }
                                }
                                if ( $response === false ) {
                                    $relative = preg_replace( '!^https{0,1}://[^/]*?(/.*$)!', '$1', $_link );
                                    if ( strpos( $relative, $theme_static ) === 0 ) {
                                        $basename = basename( $app->pt_dir );
                                        $regex = "!^" . DS . $basename . DS . '!';
                                        $relative = preg_replace( $regex, '/', $relative );
                                        if ( file_exists( $app->pt_dir . $relative ) ) {
                                            $response = true;
                                        }
                                    }
                                }
                            }
                            if ( $response === false ) {
                                $all_urls[ $link ] = false;
                                $error++;
                                $page_error++;
                                $all_error++;
                                $errors[ $link ] = true;
                            } else {
                                $all_urls[ $link ] = true;
                            }
                            continue;
                        } else {
                            $file_exists = false;
                            foreach ( $link_urls as $link_url ) {
                                if ( file_exists( $link_url->file_path ) || $link_url->publish_file == 6 ) {
                                    $file_exists = true;
                                    $all_urls[ $link ] = true;
                                    continue 2;
                                } else if ( $url->publish_file == 3 ) {
                                    $pub->publish( $link_url );
                                    if ( file_exists( $link_url->file_path ) ) {
                                        $file_exists = true;
                                        $all_urls[ $link ] = true;
                                        continue 2;
                                    }
                                }
                            }
                            if (! $file_exists ) {
                                $response = $this->url_existing( $link, $basic_auth_raw, $app );
                                if ( $response === false ) {
                                    $all_urls[ $link ] = false;
                                    $error++;
                                    $page_error++;
                                    $all_error++;
                                    $errors[ $link ] = true;
                                } else {
                                    $all_urls[ $link ] = true;
                                }
                                continue;
                            }
                        }
                    }
                    $pages += count( $errors ) ? 1 : 0;
                    $total_error += count( $errors );
                    $all_total_error += count( $errors );
                    if ( $print_state ) {
                        if ( $only_errors && empty( $errors ) ) {
                            $no_print_errors++;
                            if ( $no_print_errors > 10 ) {
                                echo str_repeat( ' ', 256 );
                                flush();
                            }
                            continue;
                        }
                        $odd = $odd ? false : true;
                        $ctx->vars['__odd__'] = $odd;
                        $ctx->vars['__key__'] = empty( $errors ) ? $url->url : $with_admin_url;
                        $ctx->vars['__value__'] = empty( $errors ) ? 'OK' : array_keys( $errors );
                        echo $app->build( $print_state_tmpl );
                        flush();
                        $no_print_errors = 0;
                    } else {
                        if (! $only_errors ) {
                            if (! empty( $errors ) ) {
                                $results[ $with_admin_url ] = array_keys( $errors );
                                $page_errors[ $url->url ] = $page_error;
                            } else {
                                $results[ $url->url ] = 'OK';
                            }
                        } else if (! empty( $errors ) ) {
                            $results[ $with_admin_url ] = array_keys( $errors );
                            $page_errors[ $url->url ] = $page_error;
                        }
                    }
                } else {
                    if ( $print_state ) {
                        $odd = $odd ? false : true;
                        $ctx->vars['__odd__'] = $odd;
                        $ctx->vars['__key__'] = $with_admin_url;
                        $ctx->vars['__value__'] = 'ERROR';
                        echo $app->build( $print_state_tmpl );
                        flush();
                    } else {
                        $results[ $with_admin_url ] = 'ERROR';
                    }
                }
            }
            if ( $print_state && $all_scope ) {
                echo '<hr>';
                flush();
            }
            $tmpl = $this->path() . DS . 'tmpl' . DS . 'result_mail.tmpl';
            if ( $workspace ) {
                $ctx->stash( 'workspace', $workspace );
            }
            $app->set_mail_param( $ctx );
            $mail_to = $this->get_config_value( 'linkchecker_email_to', $workspace_id );
            $ctx->vars['results'] = $results;
            $ctx->vars['pages'] = $pages;
            $all_pages += $pages;
            $ctx->vars['all_pages'] = $pages;
            $ctx->vars['check_pages'] = $check_pages;
            $ctx->vars['total_error'] = $total_error;
            $ctx->vars['broken_links'] = $error;
            $ctx->vars['page_errors'] = $page_errors;
            $metadata = ['broken_links' => $error, 'total_error' => $total_error, 'result' => $results ];
            $all_metadata[ $workspace_id ] = $metadata;
            if ( $app->id === 'Worker' ) {
                $mail_to = $app->build( $mail_to );
                if ( $mail_to || $all_scope ) {
                    if ( $this->is_excecute( $app, $workspace_id, $all_scope ) ) {
                        $mail_from = $this->get_config_value( 'linkchecker_email_from', $workspace_id );
                        if (! $mail_from ) {
                            $system_email = $app->get_config( 'system_email' );
                            $mail_from = $system_email->value;
                        } else {
                            $mail_from = $app->build( $mail_from );
                        }
                        $subject = $this->get_config_value( 'linkchecker_email_subject', $workspace_id );
                        $body = trim( $this->get_config_value( 'linkchecker_email_body', $workspace_id ) );
                        if (! $body ) $body = file_get_contents( $tmpl );
                        $subject = $app->build( $subject );
                        $body = $app->build( $body );
                        $headers = ['From' => $mail_from ];
                        $error_msg = '';
                        $all_bodys[] = $body;
                        if (! $workspace_id && $all_scope ) {
                        } else if ( $mail_to ) {
                            $footer = trim( $this->get_config_value( 'linkchecker_email_footer', $workspace_id ) );
                            $footer = $app->build( $footer );
                            $body .= PHP_EOL . $footer;
                            if (! PTUtil::send_mail(
                                $mail_to, $subject, $body, $headers, $error_msg ) ) {
                                $msg = $this->translate( 'Failed to send a link check report email.(%s)', $error_msg );
                                $this->log( $msg, 'error', $metadata, $workspace_id );
                            }
                        }
                    }
                }
                if (! $workspace_id && $all_scope ) {
                } else {
                    if ( $this->is_excecute( $app, $workspace_id ) ) {
                        $msg = $app->build( $log_msg );
                        $this->log( $msg, 'info', $metadata, $workspace_id, $app, $ws_log );
                    }
                }
            } else {
                $tmpl = $this->path() . DS . 'tmpl' . DS . 'result.tmpl';
                $body = $app->build( file_get_contents( $tmpl ) );
                $all_bodys[] = $body;
            }
            $ctx->vars = array_merge( $ctx->vars, $old_vars );
            if ( $force && $workspace_id && $app->param( 'workspace_id' ) ) {
                $ctx->vars['result_loop'] = $all_bodys;
                if ( $print_state ) {
                    echo $app->build_page( 'linkchecker_print_footer.tmpl', [], false );
                    exit();
                }
                return $app->build_page( 'linkchecker_linkcheck.tmpl' );
            } else if ( $force && ! $workspace_id && ! $all_scope ) {
                $ctx->vars['result_loop'] = $all_bodys;
                if ( $print_state ) {
                    echo $app->build_page( 'linkchecker_print_footer.tmpl', [], false );
                    exit();
                }
                return $app->build_page( 'linkchecker_linkcheck.tmpl' );
            }
        }
        if ( $all_scope ) {
            $app->stash( 'workspace', null );
            $ctx->stash( 'workspace', null );
            $app->set_mail_param( $ctx );
            $ctx->vars['all_pages'] = $all_pages;
            $ctx->vars['check_pages'] = $all_check_pages;
            $ctx->vars['total_error'] = $all_total_error;
            $ctx->vars['broken_links'] = $all_error;
            $msg = $app->build( $log_msg );
            $ctx->vars['all_msg'] = $msg;
            if ( $app->id === 'Worker' && $this->is_excecute( $app, 0 ) ) {
                $mail_to = $this->get_config_value( 'linkchecker_email_to', 0 );
                $mail_to = $app->build( $mail_to );
                if ( $mail_to ) {
                    $subject = $this->get_config_value( 'linkchecker_email_subject', 0 );
                    $separator = $this->get_config_value( 'linkchecker_email_separator', 0 );
                    $mail_from = $this->get_config_value( 'linkchecker_email_from', 0 );
                    if (! $mail_from ) {
                        $system_email = $app->get_config( 'system_email' );
                        $mail_from = $system_email->value;
                    } else {
                        $mail_from = $app->build( $mail_from );
                    }
                    $subject = $this->get_config_value( 'linkchecker_email_subject', 0 );
                    $subject = $app->build( $subject );
                    $body = implode( PHP_EOL . $separator . PHP_EOL . PHP_EOL, $all_bodys );
                    $footer = trim( $this->get_config_value( 'linkchecker_email_footer', 0 ) );
                    $footer = $app->build( $footer );
                    $body .= PHP_EOL . $footer;
                    $body = $msg . PHP_EOL . PHP_EOL . $separator . PHP_EOL . PHP_EOL . $body;
                    $headers = ['From' => $mail_from ];
                    $error_msg = '';
                    $this->log( $msg, 'info', $all_metadata, 0, $app, $all_log );
                    if (! PTUtil::send_mail(
                        $mail_to, $subject, $body, $headers, $error_msg ) ) {
                        $msg = $this->translate( 'Failed to send a link check report email.(%s)', $error_msg );
                        $this->log( $msg, 'error', $all_metadata, $workspace_id );
                    }
                }
            }
            if ( $app->id === 'Prototype' ) {
                $ctx->vars = array_merge( $ctx->vars, $old_vars );
                $ctx->vars['result_loop'] = $all_bodys;
                if ( $print_state ) {
                    echo $app->build_page( 'linkchecker_print_footer.tmpl', [], false );
                    exit();
                }
                return $app->build_page( 'linkchecker_linkcheck.tmpl' );
            }
        }
        return $counter;
    }

    private function is_not_html ( $text ) {
        return preg_match( '/\A\s*<!DOCTYPE\s+html|<title[\s>]/i', $text ) !== 1;
    }

    function curl_setoption ( $app, &$ch, $link, $nobody = true, $basic_auth_raw = '' ) {
        $c_opt = [
            CURLOPT_URL            => $link,
            CURLOPT_HEADER         => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT        => 180,
            CURLOPT_USERAGENT      => $app->linkchecker_useragent,
        ];
        if ( $app->http_proxy ) {
            $c_opt[ CURLOPT_PROXY ] = $app->http_proxy;
            $c_opt[ CURLOPT_PROXYPORT ] = null;
            $c_opt[ CURLOPT_PROXYUSERPWD ] = null;
        }
        if ( $nobody ) {
            $c_opt[ CURLOPT_NOBODY ] = $nobody;
        }
        if ( $basic_auth_raw ) {
            $c_opt[ CURLOPT_USERPWD ] = $basic_auth_raw;
        }
        if ( $this->cookie ) {
            $c_opt[ CURLOPT_HTTPHEADER ] = [ $this->cookie ];
        }
        if ( $this->digest ) {
            $c_opt[ CURLOPT_HTTPAUTH ] = CURLAUTH_DIGEST;
        }
        curl_setopt_array( $ch, $c_opt );
        return $ch;
    }

    function file_get_contents ( $link, $basic_auth_raw = '', $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $response = $this->_url_existing( $link, false, $basic_auth_raw, $app, true );
        if ( $response === false && $app->linkchecker_retry_outlink ) {
            $response = $this->_url_existing( $link, false, $basic_auth_raw, $app, true );
        }
        return $response;
    }

    function url_existing ( $link, $basic_auth_raw = '', $app = null, $body = false ) {
        $app = $app ? $app : Prototype::get_instance();
        $response = $this->_url_existing( $link, true, $basic_auth_raw, $app, $body );
        if ( $response === false && $app->linkchecker_retry_outlink ) {
            $response = $this->_url_existing( $link, false, $basic_auth_raw, $app, $body );
        }
        return $response;
    }

    function _url_existing ( $link, $nobody = true, $basic_auth_raw = '', $app = null, $body = false ) {
        $app = $app ? $app : Prototype::get_instance();
        $ch = curl_init();
        $this->curl_setoption( $app, $ch, $link, $nobody, $basic_auth_raw );
        $response = curl_exec( $ch );
        $status_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
        curl_close( $ch );
        if ( $status_code == 200 ) {
            if ( $body ) {
                return preg_replace( "/^.*?\r\n\r\n/s", '', $response );
            }
            return true;
        } else if ( ( $status_code == 301 || $status_code == 302 )
            && $redirect = curl_getinfo( $ch, CURLINFO_REDIRECT_URL ) ) {
            return $this->_url_existing( $redirect, $nobody, $basic_auth_raw );
        }
        if ( $app->linkchecker_retry_outlink ) {
            $header = 'User-Agent: ' . $app->linkchecker_useragent;
            if ( $basic_auth_raw ) {
                $header .= "\r\n" . 'Authorization: Basic ' . base64_encode( $basic_auth_raw );
            }
            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => $header ]
                ];
            $opts['ssl']['verify_peer'] = false;
            $opts['ssl']['verify_peer_name'] = false;
            $opts['http']['timeout'] = 180;
            $opts = PTUtil::stream_context_create( $opts );
            if ( $body ) {
                return @file_get_contents( $link, false, $opts );
            } else {
                return @file_get_contents( $link, false, $opts, 0, 1 );
            }
        }
        return false;
    }

    function is_excecute ( $app, $workspace_id, $all_scope = false ) {
        if ( $all_scope && $workspace_id && $app->id === 'Worker' ) {
            return true;
        }
        $email_to = $this->get_config_value( 'linkchecker_email_to', $workspace_id );
        if (! $email_to ) return false;
        if ( $app->develop ) return true;
        $week = self::DAY_OF_WEEK;
        $w = date( 'w' );
        $time = date( 'Hi' );
        $day_of_week = $week[ $w ];
        $do_today = $this->get_config_value( 'linkchecker_' . $day_of_week, $workspace_id );
        if (! $do_today ) {
            return false;
        }
        $excec_time = $this->get_config_value( 'linkchecker_time', $workspace_id );
        $excec_time = preg_replace( '/[^0-9]/', '', $excec_time );
        $time = date( 'Hi' );
        if ( $time < $excec_time ) {
            return false;
        }
        $ts_from = date( 'Y-m-d 00:00:00' );
        $log = $app->db->model( 'log' )->count(
          ['created_on' => ['>=' => $ts_from ], 'workspace_id' => $workspace_id,
           'category' => 'linkchecker', 'level' => 1] );
        return $log ? false : true;
    }

    function log ( $message, $level = 'error', $metadata = [], $workspace_id = 0, $app = null, $log_obj = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $log = ['level' => $level, 'category' => 'linkchecker',
                'message' => $message, 'workspace_id' => $workspace_id ];
        if ( $log_obj ) {
            if ( is_array( $metadata ) ) {
                $log['metadata'] = json_encode( $metadata, JSON_UNESCAPED_UNICODE );
            }
            unset( $log['level'] );
            $log_obj->set_values( $log );
            $log_obj->save();
            $log = $log_obj;
        } else {
            if (! empty( $metadata ) ) {
                $log['metadata'] = $metadata;
            }
            $log = $app->log( $log );
        }
        if ( $app->id === 'Worker' && $level == 'error' ) {
            echo $message, PHP_EOL;
        }
        return $log;
    }
}