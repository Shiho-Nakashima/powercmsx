<?php
require_once LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php';

class AxeRunner extends PTPlugin {

    const DAY_OF_WEEK  = [
          'sunday',    //0
          'monday',    //1
          'tuesday',   //2
          'wednesday', //3
          'thursday',  //4
          'friday',    //5
          'saturday',  //6
    ];

    public  $develop      = false;
    public  $silence      = false;
    private $exclude_urls = [];
    private $exclude_sc   = [];
    public  $results      = [];
    public  $hints        = [];
    public  $violations   = [];
    public  $incompletes  = [];
    public  $no_problem   = [];
    public  $has_problem  = [];
    public  $messages     = [];
    public  $s_criterion  = [];
    public  $admin_urls   = [];
    public  $ts_job       = null;

    public function __construct () {
        parent::__construct();
    }

    public function pre_run ( $app ) {
        if ( $app->id !== 'Prototype' ) {
            return true;
        }
        if ( $app->param( '_model' ) === 'urlinfo' && $app->mode === 'list_action'
            && $app->param( 'action_name' ) === 'axe_runner_verify_urls' ) {
            $list_actions = $app->registry['list_actions'];
            $list_actions['action_axe_runner_verify_urls'] = ['urlinfo' =>
            ['axe_runner_verify_urls' => 
            ['name' => 'axe_runner_verify_urls',
                                   'label'=> $this->translate( 'A11Y Check by axe-core' ),
                                   'component' => 'AxeRunner',
                                   'input' => 0,
                                   'columns' => ['id', 'url', 'md5', 'urlmapping_id', 'workspace_id'],
                                   'method' => 'action_axe_runner_verify_urls',
                                   'order' => 3000
                                  ]]];
            $app->registry['list_actions'] = $list_actions;
            return true;
        }
        if ( $app->param( '_model' ) !== 'axe_core_result' && $app->mode !== 'view' ) {
            return true;
        }
        if ( $app->param( '_model' ) === 'axe_core_result' && $app->param( '_type' ) === 'edit' ) {
            if (! isset( $app->ctx->vars['html_head'] ) ) {
                $app->ctx->vars['html_head'] = '';
            }
            $ts = date( 'YmdHis' );
            $app->ctx->vars['html_head'] .= '<link rel="stylesheet" href="' . $app->axerunner_assets_base . 'css/edit.css?ts=' . $ts . '">';
            $tmpl = $app->ctx->get_template_path( 'axe_runner_check_button.tmpl' );
            $app->ctx->vars['add_edit_action_bar'] = $app->build( $app->fmgr->get( $tmpl ) );
            $id = $app->param( 'id' );
            if ( $id ) {
                $app->get_scheme_from_db( 'axe_core_result' );
                $obj = $app->db->model( 'axe_core_result' )->load( (int) $id );
                if ( $obj ) {
                    $result = $this->result_data_table( $app, $obj->data );
                    $app->ctx->vars['axe_result_table'] = $result;
                    $this->set_object_title_link( $app, $obj->url );
                }
            }
        } else if ( $app->param( '_model' ) === 'axe_core_result' && $app->param( '_type' ) === 'list' ) {
            $workspace_id = (int) $app->param( 'workspace_id' );
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => 'axe-core-check-results', 'workspace_id' => $workspace_id ] );
            if ( $sess->id ) {
                $data = json_decode( $sess->data, true );
                $list_limit = $app->axerunner_list_limit;
                $count = count( $data ) >= $list_limit ? $list_limit : count( $data );
                $total = count( $data );
                $count_str = $this->translate( '1 - %s of %s Items', [ $count, $total ] );
                $app->ctx->vars['a11y_count_str'] = $count_str;
                $colors = ['#D9ECFF', '#FAF9DC', '#EFD9D9', '#D7EDCF', '#FFFFFF',
                           '#DDBBFF', '#E9E9FA', '#FFDDAA', '#EEEEEE'];
                $i = 0;
                $graph_colors = [];
                foreach ( $data as $count ) {
                    $graph_colors[] = $colors[ $i ];
                    $i++;
                    if ( $i > 8 ) {
                        $i = 0;
                    }
                }
                $startdate = date( 'Y-m-d H:i:s', $sess->start );
                $app->ctx->vars['a11y_report_date'] = $startdate;
                $values = json_decode( $sess->value, true );
                $app->ctx->vars['a11y_no_problem'] = $values['no_problem'];
                $app->ctx->vars['a11y_has_problem'] = $values['has_problem'];
                $app->ctx->vars['a11y_violations'] = $values['violations'];
                $app->ctx->vars['a11y_incompletes'] = $values['incompletes'];
                $app->ctx->vars['a11y_graph_colors'] = $graph_colors;
                $app->ctx->vars['a11y_report_summary'] = $data;
                $hints = json_decode( $sess->metadata, true );
                $messages = json_decode( $sess->extradata, true );
                $language = $this->get_config_value( 'axerunner_report_locale', $workspace_id );
                foreach ( $hints as $key => $url ) {
                    if (! $key || ! $url ) {
                        unset( $hints[ $key ] );
                        continue;
                    }
                    if ( $language != 'ja' ) {
                        $url = preg_replace( '/lang=.+$/', "lang=en", $url );
                    } else {
                        $url = preg_replace( '/lang=.+$/', "lang=ja", $url );
                    }
                    $hints[ $key ] = $url;
                }
                $app->ctx->vars['a11y_report_hints'] = $hints;
                $app->ctx->vars['a11y_report_messages'] = $messages;
                $s_criterion = json_decode( $sess->text, true );
                $app->ctx->vars['a11y_report_criterion'] = $s_criterion;
                $registries = $app->registry['system_filters'];
                if ( $sess->text ) {
                    $data = json_decode( $sess->text, true );
                    $data = array_unique( array_values( $data ) );
                    sort( $data );
                    foreach ( $data as $idx => $section ) {
                        $identifier = 'filter_axe_core_result_sc_' . preg_replace( '/[^0-9]/', '', $section );
                        $add_filter = ['name' => $identifier,
                                       'label' => $section,
                                       'option' => $section,
                                       'order' => 10000 + $idx,
                                       'method' => 'filter_by_section',
                                       'component' => 'AxeRunner'];
                        $registries[ $identifier ] = ['axe_core_result' => [ $identifier => $add_filter ] ];
                    }
                    $app->registry['system_filters'] = $registries;
                }
            }
            $error = $app->ctx->vars['error'] ?? '';
            if ( $skipped = $app->param( 'skipped' ) ) {
                $skipped = (int) $skipped;
                $message = $this->translate( 'Because the URL object could not be loaded, %s verifications were skipped.', $skipped );
                $error .= $error ? PHP_EOL . $message : $message;
            }
            if ( $errors = $app->param( 'errors' ) ) {
                $errors = (int) $errors;
                $message = $this->translate( 'An error occurred while validating %s URLs.', $errors );
                $error .= $error ? PHP_EOL . $message : $message;
            }
            if ( $excludes = $app->param( 'excludes' ) ) {
                $excludes = (int) $excludes;
                $message = $excludes === 1 ? $this->translate( 'The %sURL is not subject to verification.', $excludes )
                         : $this->translate( 'The %sURL are not subject to verification.', $excludes );
                $error .= $error ? PHP_EOL . $message : $message;
            }
            $app->ctx->vars['error'] = $error;
        }
    }

    public function pre_view ( &$app ) {
        if ( $app->param( '_model' ) === 'urlinfo' && $app->param( '_type' ) === 'list' ) {
            if ( $app->param( '_filter' ) === 'urlinfo' && ! $app->param( 'select-user_filters' )
                && $app->param( 'select_system_filters' ) === 'html_active' ) {
                $list_actions = $app->ctx->vars['list_actions'];
                $list_actions[] = ['name' => 'axe_runner_verify_urls',
                                   'label'=> $this->translate( 'A11Y Check by axe-core' ),
                                   'component' => $this,
                                   'columns' => ['id'],
                                   'method' => 'action_axe_runner_verify_urls',
                                  ];
                $app->ctx->vars['list_actions'] = $list_actions;
            } else if ( $app->param( 'background_proccess_running' ) ) {
                $app->ctx->vars['header_alert_message'] = $this->translate( 'Validation runs in the background process.' );
                $app->ctx->vars['header_alert_class'] = 'info';
            }
        }
        return true;
    }

    public function login_member ( $app, $member_id ) {
        $terms = ['user_id' => $member_id, 'kind' => 'US', 'key' => 'member' ];
        $session = $app->db->model( 'session' )->get_by_key( $terms );
        if ( ! $session->name ) {
            $token = $app->magic(); # TODO more secure?
            $session->name( $token );
        } else {
            $token = $session->name;
        }
        $expires = 60 * 60 * 24 * 3;
        $session->key( 'member' );
        $session->expires( $app->request_time + $expires );
        $session->start = ( $app->request_time );
        $app->set_language( $app->pt_dir . DS . 'locale', 'ja' );
        if ( $app->use_plugin && ! $app->init_plugins ) {
            if ( ( $plugin_d = $app->pt_dir . DS . 'plugins' ) && is_dir( $plugin_d ) )
                $app->plugin_paths[] = $plugin_d;
            $app->init_plugins();
        }
        $app->init_callbacks( 'member', 'pre_login' );
        $errors = [];
        $callback = ['name' => 'pre_login', 'model' => 'member', 'errors' => $errors, 'error' => ''];
        $pre_login = $app->run_callbacks( $callback, 'member', $user );
        $session->save();
        return $session->name;
    }

    public function exec_axe_core ( $app, $url_obj, $auth_data, $check_settings,
                                    $session_name_path = null, $locale = null, $task_worker = false ) {
        $node_path = $app->node_path;
        $node_path = escapeshellcmd( $node_path );
        $check_app_dir = $app->axerunner_module_path ? $app->axerunner_module_path : $this->plugin_path . '/node_app/a11ycheck';
        $check_app_path = $check_app_dir . '/app.js';
        $url = $url_obj->url;
        if (! $this->develop ) {
            $exclude_url = $this->exclude_urls( $url, $url_obj->workspace_id );
            if ( $exclude_url ) {
                if ( $app->id == 'Worker' && !$this->silence ) {
                    echo $this->translate( "The URL'%s' is not subject to verification.", $url ), PHP_EOL;
                }
                return false;
            }
            if ( basename( $url ) === 'pt-view.php' ) {
                if ( $urlmapping = $url_obj->urlmapping ) {
                    if ( is_object( $urlmapping ) ) {
                        $template = $urlmapping->template;
                        if ( is_object( $template ) && stripos( $template->basename, 'bootstrapper' ) !== false ) {
                            if ( $app->id == 'Worker' && !$this->silence ) {
                                echo $this->translate( "The URL'%s' is not subject to verification.", $url ), PHP_EOL;
                            }
                            return false;
                        }
                    }
                }
            }
        }
        $exclude_sc = $this->exclude_sc( $url_obj->workspace_id );
        $workspace_id = (int) $url_obj->workspace_id ? $url_obj->workspace_id : 0;
        $result_obj = $app->db->model( 'axe_core_result' )->get_by_key( ['url' => $url ] );
        if ( $result_obj->id && $task_worker ) {
            if (! $result_obj->check_failed && $result_obj->md5 === $url_obj->md5
                && $result_obj->language == $locale && $app->id == 'Worker' ) {
                if ( $app->id == 'Worker' && !$this->develop ) {
                    $result_json = json_decode( $result_obj->data );
                    $violations = 0;
                    $incompletes = 0;
                    if ( $result_json !== null && !empty( $result_json ) ) {
                        foreach ( $result_json as $item ) {
                            $type = $item->type;
                            $ruleId = $item->ruleId;
                            // $impact = $item->impact; // 緊急・深刻
                            $hint = $item->hint;
                            $subject = $item->subject;
                            if (! isset( $this->s_criterion[ $ruleId ] ) ) {
                                if (! empty( $item->tags ) ) {
                                    foreach ( $item->tags as $tag_item ) {
                                        if ( preg_match( '/wcag([0-9])([0-9])([0-9])/', $tag_item, $match_sc ) ) {
                                            $sc = $match_sc[1] . '.' . $match_sc[2] . '.' . $match_sc[3];
                                            if ( in_array( $sc, $exclude_sc ) ) {
                                                continue 2;
                                            }
                                            $sc = 'SC ' . $sc;
                                        }
                                    }
                                } else {
                                    $sc = '';
                                }
                                if ( $sc ) {
                                    $this->s_criterion[ $ruleId ] = $sc;
                                }
                            }
                            if ( $type == 'Violation' || $type == '違反' ) {
                                $violations++;
                            } else if ( $type == 'Incomplete' || $type == '要確認' ) {
                                $incompletes++;
                            }
                            $this->results[ $workspace_id ][ $ruleId ] =
                                isset( $this->results[ $workspace_id ][ $ruleId ] ) ?
                                $this->results[ $workspace_id ][ $ruleId ] + 1 : 1;
                            if ( $workspace_id ) {
                                $this->results[0][ $ruleId ] =
                                    isset( $this->results[0][ $ruleId ] ) ?
                                    $this->results[0][ $ruleId ] + 1 : 1;
                            }
                            $this->hints[ $ruleId ] = $hint;
                            $this->messages[ $ruleId ] = $subject;
                        }
                    }
                    if (! $violations && ! $incompletes ) {
                        $this->no_problem[ $workspace_id ] = 
                          isset( $this->no_problem[ $workspace_id ] )
                          ? $this->no_problem[ $workspace_id ] + 1 : 1;
                        if ( $workspace_id ) {
                            $this->no_problem[0] = 
                              isset( $this->no_problem[0] )
                              ? $this->no_problem[0] + 1 : 1;
                        }
                    } else {
                        $this->has_problem[ $workspace_id ] = 
                          isset( $this->has_problem[ $workspace_id ] )
                          ? $this->has_problem[ $workspace_id ] + 1 : 1;
                        $this->violations[ $workspace_id ] = 
                          isset( $this->violations[ $workspace_id ] )
                          ? $this->violations[ $workspace_id ] + $violations : $violations;
                        $this->incompletes[ $workspace_id ] = 
                          isset( $this->incompletes[ $workspace_id ] )
                          ? $this->incompletes[ $workspace_id ] + $incompletes : $incompletes;
                        if ( $workspace_id ) {
                            $this->has_problem[0] = 
                              isset( $this->has_problem[0] )
                              ? $this->has_problem[0] + 1 : 1;
                            $this->violations[0] = 
                              isset( $this->violations[0] )
                              ? $this->violations[0] + $violations : $violations;
                            $this->incompletes[0] = 
                              isset( $this->incompletes[0] )
                              ? $this->incompletes[0] + $incompletes : $incompletes;
                        }
                    }
                }
                if (!$this->silence ) {
                    echo $this->translate( "Verification was skipped because the URL'%s' has not been changed.", $url ), PHP_EOL;
                }
                return 0;
            }
        }
        $result_obj->urlinfo_id( $url_obj->id );
        $result_obj->md5( $url_obj->md5 );
        $result_obj->created_by( 0 );
        $result_obj->workspace_id( $url_obj->workspace_id );
        $url = escapeshellarg( $url );
        $command = "{$node_path} {$check_app_path} {$url} --appdir {$check_app_dir}{$auth_data}{$check_settings}";
        if ( $http_proxy = $app->http_proxy ) {
            $http_proxy = escapeshellarg( $http_proxy );
            $command .= " --proxy {$http_proxy}";
        }
        if ( $session_name_path ) {
            $command .= " --session-name-path {$session_name_path}";
        }
        $command = 'cd ' . $check_app_dir . '; ' . $command;
        exec( $command, $output, $return_var );
        // $result = shell_exec( $command );
        if ( $return_var !== 0 ) {
            $ts = date( 'Y-m-d H:i:s' );
            if (! $ts_job = $this->ts_job ) {
                $ts_job = $app->db->model( 'ts_job' )->__new();
                $ts_job->name( 'AxeRunner Validating URL' );
                $ts_job->class( $locale );
                $ts_job->component( 'AxeRunner' );
                $ts_job->label( $url_obj->url );
                $ts_job->workspace_id( $workspace_id );
                $ts_job->start_on( $ts );
                $app->set_default( $ts_job );
                $ts_job->save();
            }
            $this->ts_job = $ts_job;
            $queue = $app->db->model( 'queue' )->get_by_key( [
                'key' => md5( $url_obj->url ),
                'component' => 'AxeRunner',
                'method' => 'axerunner_validating_url',
                'workspace_id' => $workspace_id
                ] );
            if ( $queue ) {
                $queue->remove();
            }
            $queue = $app->db->model( 'queue' )->__new( [
                'key' => md5( $url_obj->url ),
                'class' => $locale,
                'component' => 'AxeRunner',
                'method' => 'axerunner_validating_url',
                'start_on' => $ts,
                'workspace_id' => $workspace_id
                ] );
            $queue->ts_job_id( $ts_job->id );
            $queue->value( $command );
            $result_obj->checked_on( $app->date( 'YmdHis' ) );
            $app->set_default( $result_obj );
            $result_obj->save();
            $queue->object_id( $result_obj->id );
            $queue->model( $result_obj->_model );
            $app->set_default( $queue );
            $queue->workspace_id( $url_obj->workspace_id );
            $queue->save();
            return true;
        }
        $result = implode( PHP_EOL, $output );
        if ( $result == 'false' ) {
            $result_obj->violations( 0 );
            $result_obj->incompletes( 0 );
            $result_obj->check_failed( 1 );
            $result_obj->checked_on( $app->date( 'YmdHis' ) );
            $result_obj->workspace_id( $workspace_id );
            $result_obj->language( $locale );
            $app->set_default( $result_obj );
            $result_obj->save();
            return 0;
        }
        $result = $result === null ? '' : $result;
        if ( preg_match( '/^HTTP (4|5)0/', $result ) ) {
            // $result_obj->data( $result );
            $result_obj->violations( 0 );
            $result_obj->incompletes( 0 );
            $result_obj->check_failed( 1 );
            $result_obj->checked_on( $app->date( 'YmdHis' ) );
            $result_obj->workspace_id( $workspace_id );
            $result_obj->language( $locale );
            $app->set_default( $result_obj );
            $result_obj->save();
        } else {
            $csv_path = $app->temp_dir . DS . 'axe_core_check_' . mt_rand() . '.txt';
            file_put_contents( $csv_path, $result );
            $length = 0;
            $violations = 0;
            $incompletes = 0;
            $result_object = [];
            if ( version_compare( phpversion(), '8.0.0' ) >= 0 ) {
                $length = null;
            }
            if ( ( $handle = fopen( $csv_path, 'r' ) ) !== false ) {
                while ( ( $data = fgetcsv( $handle, $length, ',' ) ) !== false ) {
                    if ( $locale !== 'ja' ) {
                        // ヒントのサイトが英語か日本語にしか対応していない
                        $hint = str_replace( '&lang=ja', '&lang=en', $data[4] );
                    } else {
                        $hint = $data[4];
                    }
                    $ruleId = $data[2];
                    $subject = $data[7];
                    $tags = explode( ',', $data[5] );
                    $sc = '';
                    foreach ( $tags as $tag_item ) {
                        if ( preg_match( '/wcag([0-9])([0-9])([0-9])/', $tag_item, $match_sc ) ) {
                            $sc = $match_sc[1] . '.' . $match_sc[2] . '.' . $match_sc[3];
                            if ( in_array( $sc, $exclude_sc ) ) {
                                continue 2;
                            }
                            $sc = 'SC ' . $sc;
                        }
                    }
                    if ( $data[1] === '違反' ) {
                        $violations += 1;
                        $type = $locale === 'ja' ? '違反' : 'Violation'; // axe-coreが英語か日本語のみとなっている
                    } elseif ( $data[1] === '要確認' ) {
                        $incompletes += 1;
                        $type = $locale === 'ja' ? '要確認' : 'Incomplete'; // axe-coreが英語か日本語のみとなっている
                    }
                    if ( $app->id == 'Worker' ) {
                        $this->results[ $workspace_id ][ $ruleId ] =
                            isset( $this->results[ $workspace_id ][ $ruleId ] ) ?
                            $this->results[ $workspace_id ][ $ruleId ] + 1 : 1;
                        if ( $workspace_id ) {
                            $this->results[0][ $ruleId ] =
                                isset( $this->results[0][ $ruleId ] ) ?
                                $this->results[0][ $ruleId ] + 1 : 1;
                        }
                        $this->hints[ $ruleId ] = $hint;
                        $this->messages[ $ruleId ] = $subject;
                        if (! isset( $this->s_criterion[ $ruleId ] ) ) {
                            if ( $sc ) {
                                $this->s_criterion[ $ruleId ] = $sc;
                            }
                        }
                    }
                    $object = (object) [
                        'type' => $type,
                        'ruleId' => $ruleId,
                        'impact' => preg_replace( '/^(.*) \(.*\)$/', '$1', $data[3] ),
                        'hint' => $hint,
                        'tags' => $tags,
                        'element' => $data[6],
                        'subject' => $subject,
                        'detail' => $data[8],
                        'path' => $data[9]
                    ];
                    $result_object[] = $object;
                }
                fclose( $handle );
            }
            $app->fmgr->unlink( $csv_path );
            $result_obj->data( json_encode( $result_object, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) );
            $result_obj->violations( $violations );
            $result_obj->incompletes( $incompletes );
            $result_obj->check_failed( 0 );
            $result_obj->checked_on( $app->date( 'YmdHis' ) );
            $result_obj->workspace_id( $workspace_id );
            $result_obj->language( $locale );
            $app->set_default( $result_obj );
            if ( $app->id == 'Worker' ) {
                if (! $violations && ! $incompletes ) {
                    $this->no_problem[ $workspace_id ] = 
                      isset( $this->no_problem[ $workspace_id ] )
                      ? $this->no_problem[ $workspace_id ] + 1 : 1;
                    if ( $workspace_id ) {
                        $this->no_problem[0] = 
                          isset( $this->no_problem[0] )
                          ? $this->no_problem[0] + 1 : 1;
                    }
                } else {
                    $this->has_problem[ $workspace_id ] = 
                      isset( $this->has_problem[ $workspace_id ] )
                      ? $this->has_problem[ $workspace_id ] + 1 : 1;
                    $this->violations[ $workspace_id ] = 
                      isset( $this->violations[ $workspace_id ] )
                      ? $this->violations[ $workspace_id ] + $violations : $violations;
                    $this->incompletes[ $workspace_id ] = 
                      isset( $this->incompletes[ $workspace_id ] )
                      ? $this->incompletes[ $workspace_id ] + $incompletes : $incompletes;
                    if ( $workspace_id ) {
                        $this->has_problem[0] = 
                          isset( $this->has_problem[0] )
                          ? $this->has_problem[0] + 1 : 1;
                        $this->violations[0] = 
                          isset( $this->violations[0] )
                          ? $this->violations[0] + $violations : $violations;
                        $this->incompletes[0] = 
                          isset( $this->incompletes[0] )
                          ? $this->incompletes[0] + $incompletes : $incompletes;
                    }
                }
                $user_id  = (int) $this->get_config_value( 'axerunner_user_id', $workspace_id );
                if ( $user_id ) {
                    $result_obj->user_id( $user_id );
                    $send_email  = (int) $this->get_config_value( 'axerunner_send_email', $workspace_id );
                    if ( $send_email ) {
                        if (! $result_obj->id ) {
                            $result_obj->save();
                        }
                        $this->admin_urls[ $user_id ][] = '__mode=view&_type=edit&_model=axe_core_result&id=' . $result_obj->id . '&workspace_id=' . $workspace_id;
                    }
                }
            }
            $result_obj->save();
        }
        $component = $app->component( 'ImageInfo' );
        if ( $component && $url_obj->model === 'asset' ) {
            $this->set_imageinfo( $app, $result_obj, $url_obj, $component );
        }
        return $result_obj;
    }

    function set_imageinfo ( $app, $obj, $url, $component ) {
        $meta = $app->db->model( 'meta' )->get_by_key(
          ['kind' => 'metadata', 'model' => 'asset', 'object_id' => $url->object_id, 'key' => 'file'] );
        if ( $meta->id && $meta->text ) {
            $metadata = json_decode( $meta->text, true );
            if ( is_array( $metadata ) ) {
                $metadata['violations'] = $obj->violations;
                $metadata['incompletes'] = $obj->incompletes;
                $metadata['axe_core_result_id'] = $obj->id;
                $meta->text( json_encode( $metadata ) );
                $meta->save();
            }
        }
    }

    function axerunner_validating_url ( $app, $queue, &$error ) {
        $command = $queue->value;
        // $result = shell_exec( $command );
        exec( $command, $output, $return_var );
        $result_obj = $app->db->model( $queue->model )->load( $queue->object_id );
        if ( $result_obj && $return_var === 0 ) {
            $result = implode( PHP_EOL, $output );
            $workspace_id = (int) $queue->workspace_id;
            $exclude_sc = $this->exclude_sc( $workspace_id );
            $locale = $queue->class;
            $csv_path = $app->temp_dir . DS . 'axe_core_check_' . mt_rand() . '.txt';
            file_put_contents( $csv_path, $result );
            $length = 0;
            $violations = 0;
            $incompletes = 0;
            $result_object = [];
            if ( version_compare( phpversion(), '8.0.0' ) >= 0 ) {
                $length = null;
            }
            if ( ( $handle = fopen( $csv_path, 'r' ) ) !== false ) {
                while ( ( $data = fgetcsv( $handle, $length, ',' ) ) !== false ) {
                    if ( $locale !== 'ja' ) {
                        $hint = str_replace( '&lang=ja', '&lang=en', $data[4] );
                    } else {
                        $hint = $data[4];
                    }
                    $ruleId = $data[2];
                    $subject = $data[7];
                    $tags = explode( ',', $data[5] );
                    $sc = '';
                    foreach ( $tags as $tag_item ) {
                        if ( preg_match( '/wcag([0-9])([0-9])([0-9])/', $tag_item, $match_sc ) ) {
                            $sc = $match_sc[1] . '.' . $match_sc[2] . '.' . $match_sc[3];
                            if ( in_array( $sc, $exclude_sc ) ) {
                                continue 2;
                            }
                            $sc = 'SC ' . $sc;
                        }
                    }
                    if ( $data[1] === '違反' ) {
                        $violations += 1;
                        $type = $locale === 'ja' ? '違反' : 'Violation'; // axe-coreが英語か日本語のみとなっている
                    } elseif ( $data[1] === '要確認' ) {
                        $incompletes += 1;
                        $type = $locale === 'ja' ? '要確認' : 'Incomplete'; // axe-coreが英語か日本語のみとなっている
                    }
                    $object = (object) [
                        'type' => $type,
                        'ruleId' => $ruleId,
                        'impact' => preg_replace( '/^(.*) \(.*\)$/', '$1', $data[3] ),
                        'hint' => $hint,
                        'tags' => $tags,
                        'element' => $data[6],
                        'subject' => $subject,
                        'detail' => $data[8],
                        'path' => $data[9] ?? ''
                    ];
                    $result_object[] = $object;
                }
                fclose( $handle );
            }
            $app->fmgr->unlink( $csv_path );
            $result_obj->data( json_encode( $result_object, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) );
            $result_obj->violations( $violations );
            $result_obj->incompletes( $incompletes );
            $result_obj->check_failed( 0 );
            $result_obj->checked_on( $app->date( 'YmdHis' ) );
            $result_obj->workspace_id( $workspace_id );
            $result_obj->language( $locale );
            $app->set_default( $result_obj );
            $result_obj->save();
            return true;
        }
        return false;
    }

    public function check_url ( $app ) {
        if (! $app->can_do( 'axe_core_result', 'update_all' ) ) {
            return $app->error( 'Permission denied.' );
        }
        $app->validate_magic();
        if ( $app->request_method !== 'POST' ) {
            return $app->error( 'Invalid request.' );
        }
        $id = $app->param( 'id' );
        $app->get_scheme_from_db( 'axe_core_result' );
        $obj = $app->db->model( 'axe_core_result' )->load( (int) $id );
        if (! $id || !$obj ) {
            return $app->error( 'Invalid request.' );
        }
        $workspace_id = (int) $obj->workspace_id ? $obj->workspace_id : 0;
        $username  = $this->get_config_value( 'axerunner_username', $workspace_id );
        $password  = $this->get_config_value( 'axerunner_password', $workspace_id );
        $member_id = $this->get_config_value( 'axerunner_member_id', 0 );
        $wcag_version = $this->get_config_value( 'axerunner_wcag_version', $workspace_id );
        $wcag_level = (int) $this->get_config_value( 'axerunner_wcag_level', $workspace_id );
        $violation_only = (int) $this->get_config_value( 'axerunner_violation_only', $workspace_id );
        $locale_org = $this->get_config_value( 'axerunner_report_locale', $workspace_id );
        $locale = escapeshellarg( $locale_org );
        $check_settings = " --version {$wcag_version} --level {$wcag_level} --violation-only {$violation_only} --locale {$locale}";
        if ( $username && $password ) {
            $username = escapeshellarg( $username );
            $password = escapeshellarg( $password );
            $auth_data = " --username {$username} --password {$password}";
        } else {
            $auth_data = '';
        }
        if ( $member_id ) {
            $session_name = $this->login_member( $app, $member_id );
            $session_name_path = $app->temp_dir . DS . 'axe_runner_' . mt_rand() . '.txt';
            file_put_contents( $session_name_path, $session_name );
        } else {
            $session_name_path = null;
        }
        $terms = [
            'url' => $app->param( 'url' ),
            'mime_type' => 'text/html',
            'delete_flag' => 0,
            'workspace_id' => $workspace_id,
        ];
        $url_objs = $app->db->model( 'urlinfo' )->load( $terms, ['limit' => 1], 'id,url,md5,urlmapping_id,workspace_id,model,object_id' );
        if ( empty( $url_objs ) ) {
            return $app->error( $this->translate( 'The URL object could not be load.' ) );
        }
        $obj = $this->exec_axe_core( $app, $url_objs[0], $auth_data, $check_settings, $session_name_path, $locale_org );
        if ( $member_id ) {
            $app->fmgr->unlink( $session_name_path );
        }
        if ( $obj === false ) {
            $app->redirect( $this->script_uri . "?__mode=view&_type=edit&_model=axe_core_result&id={$id}&exclude=1&workspace_id={$workspace_id}" );
        } else if ( $obj === true ) {
            $app->redirect( $this->script_uri . "?__mode=view&_type=edit&_model=axe_core_result&id={$id}&background_proccess_running=1&workspace_id={$workspace_id}" );
        } else if (! $obj ) {
            $app->redirect( $this->script_uri . "?__mode=view&_type=edit&_model=axe_core_result&id={$id}&error=1&workspace_id={$workspace_id}" );
        }
        if ( $obj->status ) {
            $obj->status( 0 );
        }
        $obj->checked_on( $app->date( 'YmdHis' ) );
        $app->set_default( $obj );
        $obj->created_by( 0 );
        $obj->save();
        $component = $app->component( 'ImageInfo' );
        $url_obj = $url_objs[0];
        $result_obj = $obj;
        $component = $app->component( 'ImageInfo' );
        if ( $component && $url_obj->model === 'asset' ) {
            $this->set_imageinfo( $app, $result_obj, $url_obj, $component );
        }
        $app->redirect( $this->script_uri . "?__mode=view&_type=edit&_model=axe_core_result&id={$id}&checked=1&workspace_id={$workspace_id}" );
    }

    function axe_runner_summary ( $app ) {
        $workspace_id = (int) $app->param( 'workspace_id' );
        $sess = $app->db->model( 'session' )->get_by_key( ['name' => 'axe-core-check-results', 'workspace_id' => $workspace_id ] );
        if ( $sess->id ) {
            $data = json_decode( $sess->data, true );
            $count = count( $data ) >= 10 ? '10' : count( $data );
            $total = count( $data );
            $colors = ['#D9ECFF', '#FAF9DC', '#EFD9D9', '#D7EDCF', '#FFFFFF',
                       '#DDBBFF', '#E9E9FA', '#FFDDAA', '#EEEEEE'];
            $i = 0;
            $graph_colors = [];
            foreach ( $data as $count ) {
                $graph_colors[] = $colors[ $i ];
                $i++;
                if ( $i > 8 ) {
                    $i = 0;
                }
            }
            $startdate = date( 'Y-m-d H:i:s', $sess->start );
            $app->ctx->vars['a11y_report_date'] = $startdate;
            $values = json_decode( $sess->value, true );
            $app->ctx->vars['a11y_no_problem'] = $values['no_problem'];
            $app->ctx->vars['a11y_has_problem'] = $values['has_problem'];
            $app->ctx->vars['a11y_violations'] = $values['violations'];
            $app->ctx->vars['a11y_incompletes'] = $values['incompletes'];
            $app->ctx->vars['a11y_graph_colors'] = $graph_colors;
            $count_str = $this->translate( '1 - %s of %s Items', [ $count, $total ] );
            $app->ctx->vars['a11y_count_str'] = $count_str;
            $app->ctx->vars['a11y_report_summary'] = $data;
            $hints = json_decode( $sess->metadata, true );
            $messages = json_decode( $sess->extradata, true );
            $language = $this->get_config_value( 'axerunner_report_locale', $workspace_id );
            foreach ( $hints as $key => $url ) {
                if (! $key || ! $url ) {
                    unset( $hints[ $key ] );
                    continue;
                }
                if ( $language != 'ja' ) {
                    $url = preg_replace( '/lang=.+$/', "lang=en", $url );
                } else {
                    $url = preg_replace( '/lang=.+$/', "lang=ja", $url );
                }
                $hints[ $key ] = $url;
            }
            $app->ctx->vars['a11y_report_hints'] = $hints;
            $app->ctx->vars['a11y_report_messages'] = $messages;
            $s_criterion = json_decode( $sess->text, true );
            $app->ctx->vars['a11y_report_criterion'] = $s_criterion;
        }
        $app->__mode( 'axe_runner_summary' );
    }

    function axerunner_verify_url ( $app, $html_check = false ) {
        if (! $app->can_do( 'axe_core_result', 'update_all' ) ) {
            return $app->error( 'Permission denied.' );
        }
        $app->validate_magic();
        if ( $app->request_method !== 'POST' ) {
            return $app->error( 'Invalid request.' );
        }
        $id = $app->param( 'id' );
        $app->get_scheme_from_db( 'axe_core_result' );
        $obj = $app->db->model( 'axe_core_result' )->load( (int) $id );
        if (! $id || !$obj ) {
            return $app->error( 'Invalid request.' );
        }
        $workspace_id = (int) $obj->workspace_id ? $obj->workspace_id : 0;
        $username  = $this->get_config_value( 'axerunner_username', $workspace_id );
        $password  = $this->get_config_value( 'axerunner_password', $workspace_id );
        $digest  = $this->get_config_value( 'axerunner_digest', $workspace_id );
        $member_id = $this->get_config_value( 'axerunner_member_id', 0 );
        $session = null;
        $cookie = null;
        $members = $app->component( 'Members' );
        if ( $members && $member_id ) {
            $member = $app->db->model( 'member' )->load( (int) $member_id );
            if ( $member ) {
                $session = $app->db->model( 'session' )->get_by_key( ['user_id' => $member->id, 'key' => 'member', 'kind' => 'US'] );
                if (! $session->id || $session->expires < $app->request_time ) {
                    $session->start( $app->request_time );
                    $session->expires( $app->request_time + $app->sess_timeout );
                    $session->save();
                }
                $session_name = $session->name;
                $cookie_name = $members->cookie_name;
                $cookie = "Cookie: {$cookie_name}={$session_name}";
            }
        }
        $url = $obj->url;
        $ch = curl_init();
        $this->curl_setoption( $ch, $url, $username, $password, $digest, $cookie );
        $response = $this->curl_get( $ch, $url, $username, $password, $digest, $cookie );
        curl_close( $ch );
        if ( $session ) {
            $session->remove();
        }
        if (! $response ) {
            return $app->error( $this->translate( 'An error occurred while retrieving the HTML.' ) );
        }
        $cb = [];
        if ( $html_check ) {
            $component = $app->component( 'NuHtmlChecker' );
            $app->param('_preview', 'nu_html_checker' );
            $_REQUEST['_preview'] = 'nu_html_checker';
            $component->nu_html_checker( $cb, $app, $response );
            $app->print( $response );
        }
        if (! preg_match( '/<base[^>]*?>/si', $response ) ) {
            $dq = '"';
            $tag = "<base href={$dq}{$url}{$dq}>";
            $response = preg_replace( '/(<head[^>]*?>)/si', '$1' . $tag, $response );
        }
        $component = $app->component( 'HTML_CodeSniffer' );
        $cb['mime_type'] = 'text/html';
        $cb['workspace'] = $obj->workspace;
        $app->param( '__html_codesniffer', 1 );
        $_REQUEST['__html_codesniffer'] = 1;
        $component->insert_html_codesniffer( $cb, $app, $response );
        $app->print( $response );
    }

    function axerunner_html_check ( $app ) {
        return $this->axerunner_verify_url( $app, true );
    }

    function curl_get ( $ch, $url, $username, $password, $digest, $cookie ) {
        $response = curl_exec( $ch );
        $status_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
        if ( $status_code == 200 ) {
            return $response;
        } else if ( ( $status_code == 301 || $status_code == 302 )
            && $redirect = curl_getinfo( $ch, CURLINFO_REDIRECT_URL ) ) {
            
            return $this->curl_get( $redirect );
        }
        return false;
    }

    function curl_setoption ( &$ch, $url, $username, $password, $digest, $cookie ) {
        $app = Prototype::get_instance();
        $c_opt = [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_USERAGENT      => $app->axerunner_useragent,
        ];
        if ( $app->http_proxy ) {
            $c_opt[ CURLOPT_PROXY ] = $app->http_proxy;
            $c_opt[ CURLOPT_PROXYPORT ] = null;
            $c_opt[ CURLOPT_PROXYUSERPWD ] = null;
        }
        if ( $username ) {
            $c_opt[ CURLOPT_USERPWD ] = "{$username}:{$password}";
        }
        if ( $this->cookie ) {
            $c_opt[ CURLOPT_HTTPHEADER ] = [ $cookie ];
        }
        if ( $digest ) {
            $c_opt[ CURLOPT_HTTPAUTH ] = CURLAUTH_DIGEST;
        } else {
            $c_opt[ CURLOPT_HTTPAUTH ] = CURLAUTH_BASIC;
        }
        curl_setopt_array( $ch, $c_opt );
        return $ch;
    }

    function before_save_axe_core_result ( &$cb, $app, &$obj, $original, $clone_org = null ) {
        $obj->created_by( 0 );
        $obj->save();
        return true;
    }

    function pre_delete_axe_core_result ( &$cb, $app, &$obj, $original ) {
        $component = $app->component( 'ImageInfo' );
        if (! $component ) {
            return true;
        }
        if (! $obj->urlinfo_id ) {
            $obj = $obj->load( $obj->id );
        }
        $url = $obj->urlinfo;
        if ( $url && $url->model === 'asset' ) {
            $meta = $app->db->model( 'meta' )->get_by_key(
              ['kind' => 'metadata', 'model' => 'asset', 'object_id' => $url->object_id, 'key' => 'file'] );
            if ( $meta->id && $meta->text ) {
                $metadata = json_decode( $meta->text, true );
                if ( is_array( $metadata ) ) {
                    unset( $metadata['violations'], $metadata['incompletes'], $metadata['axe_core_result_id'] );
                    $meta->text( json_encode( $metadata ) );
                    $meta->save();
                }
            }
        }
        return true;
    }

    public function result_data_table ( $app, $data = '' ) {
        $ctx = $app->ctx;
        if (! $data ) return '';
        if ( preg_match( '/^HTTP (4|5)0/', $data ) ) {
            return '<div class="alert alert-danger">' . $data . '</div>';
        }
        $workspace_id = 0;
        $workspace = $app->workspace();
        if ( $workspace ) {
            $workspace_id = $workspace->id;
        }
        $line = 0;
        $data_tmpl = $ctx->get_template_path( 'axe_runner_check_data.tmpl' );
        $result_json = json_decode( $data );
        $all_lines = [];
        $language = $this->get_config_value( 'axerunner_report_locale', $workspace_id );
        foreach ( $result_json as $item ) {
            $line += 1;
            $type = $item->type;
            $rule_id = $item->ruleId;
            // $impact = $item->impact; // 緊急・深刻
            $hint = $item->hint;
            if ( $language != 'ja' ) {
                $hint = preg_replace( '/lang=.+$/', "lang=en", $hint );
            } else {
                $hint = preg_replace( '/lang=.+$/', "lang=ja", $hint );
            }
            $element = $item->element;
            $subject = $item->subject;
            $detail = $item->detail;
            $path = property_exists( $item, 'path' ) ? $item->path : '';
            if ( strpos( $detail, '--' ) !== false ) {
                $detail_temp = explode( '--', $detail );
                $item_count = count( $detail_temp );
                foreach ( $detail_temp as $idx => $detail_tmp ) {
                    if ( ! $idx ) {
                        $detail = '<ul>';
                    }
                    $detail .= '<li>' . $detail_tmp . '</li>';
                    if ( $idx === ( $item_count - 1 ) ) {
                        $detail .= '</ul>';
                    }
                }
            }
            $sc = '';
            if (! empty( $item->tags ) ) {
                foreach ( $item->tags as $tag_item ) {
                    if ( preg_match( '/wcag([0-9])([0-9])([0-9])/', $tag_item, $match_sc ) ) {
                        $sc = 'SC ' . $match_sc[1] . '.' . $match_sc[2] . '.' . $match_sc[3];
                    }
                }
            } else {
                $sc = '';
            }
            $row_css_class = $type === 'Violation' || $type ===  '違反' ? 'violation' : 'incomplete';
            $params = [];
            $params['axe_row_css_class'] = $row_css_class;
            $params['axe_line'] = $line;
            $params['axe_type'] = $this->translate( $type );
            $params['axe_hint'] = $hint;
            $params['axe_sc'] = $sc;
            $params['axe_rule_id'] = $rule_id;
            $params['axe_subject'] = $subject;
            if ( strpos( $detail, '<ul>' ) !== 0 && !preg_match( '!</ul>$!', $detail ) ) {
                $detail = htmlspecialchars( $detail );
            }
            $params['axe_detail'] = $detail;
            $params['axe_element'] = $element;
            $params['axe_path'] = $path;
            $all_lines[] = $params;
        }
        if (! empty( $all_lines ) ) {
            if ( $app->param( 'background_proccess_running' ) ) {
                $alert_box = '<div class="alert alert-success">' . $this->translate( 'Validation runs in the background process.' ) .
                           ' ' . $this->translate( 'Please check results after a while.' ) . '</div>';
            } else {
                $alert_box = '<div class="alert alert-warning">' . $this->translate( 'Check the verification results by axe-core.' ) . '</div>';
            }
            $table_add_class = $workspace_id > 0 ? ' is-workspace' : '';
            $params = [];
            $params['table_add_class'] = $table_add_class;
            $params['alert_box'] = $alert_box;
            $params['all_lines'] = $all_lines;
            return  $app->build_page( $data_tmpl, $params, false );
        }
        return '<p class="alert alert-success">' . $this->translate( 'Checking with ax-core did not find any issues.' ) . '</p>';
    }

    function filter_axe_core_result_violations ( $app, &$terms, $model ) {
        $terms['violations'] = ['>' => 0];
    }

    function filter_axe_core_result_incompletes ( $app, &$terms, $model ) {
        $terms['incompletes'] = ['>' => 0];
    }

    function filter_axe_core_result_check_failed ( $app, &$terms, $model ) {
        $terms['check_failed'] = 1;
    }

    function filter_axe_core_result_has_problem ( $app, &$terms, $model ) {
        // => pre_listing_axe_core_result
    }

    function pre_listing_axe_core_result ( &$cb, $app, &$terms, &$args, &$extra, &$placeholders ) {
        $app->param( 'get_cols', 'url,memo' );
        $_REQUEST['get_cols'] = 'url,memo';
        $filter = $app->param( '_filter' );
        if ( $filter != 'axe_core_result' ) {
            return true;
        }
        $filter = $app->param( 'select_system_filters' );
        if ( $filter == 'filter_axe_core_result_has_problem' ) {
            $extra .= ' AND ( axe_core_result_violations > 0 OR axe_core_result_incompletes > 0 OR axe_core_result_check_failed != 0 )';
        } else if ( $filter == 'my_objects' ) {
            unset( $terms['created_by'] );
            $terms['modified_by'] = $app->user()->id;
        }
        return true;
    }

    function template_source_list ( $cb, &$app, &$param, &$src ) {
        if ( $app->param( '_model' ) === 'axe_core_result' ) {
            $app->ctx->vars['menu_type'] = 3;
            $list_actions = $app->ctx->vars['list_actions'];
            foreach ( $list_actions as $idx => $list_action ) {
                if ( $list_action['name'] == 'set_published_on' || $list_action['name'] == 'set_unpublished_on' ) {
                    unset( $list_actions[ $idx ] );
                }
            }
            $list_actions = array_merge( $list_actions, [] );
            $app->ctx->vars['list_actions'] = $list_actions;
            $filter_options = $app->ctx->vars['filter_options'];
            foreach ( $filter_options as $idx => $filter_option ) {
                if ( $filter_option['name'] == 'published_on'
                    || $filter_option['name'] == 'unpublished_on'
                    || $filter_option['name'] == 'has_deadline' ) {
                    unset( $filter_options[ $idx ] );
                }
            }
            $filter_options = array_merge( $filter_options, [] );
            $app->ctx->vars['filter_options'] = $filter_options;
            $system_filters = $app->ctx->vars['system_filters'];
            $model_label = $app->translate( 'A11Y Check Results' );
            foreach ( $system_filters as $idx => $system_filter ) {
                if ( $system_filter['name'] == 'filter_not_published' ) {
                    $system_filter['label'] = $this->translate( 'Not Verified %s', $model_label );
                } else if ( $system_filter['name'] == 'filter_draft' ) {
                    $system_filter['label'] = $this->translate( 'Unverified %s', $model_label );
                } else if ( $system_filter['name'] == 'filter_reserved' ) {
                    unset( $system_filters[ $idx ] );
                    continue;
                } else if ( $system_filter['name'] == 'filter_published' ) {
                    $system_filter['label'] = $this->translate( 'Verified %s', $model_label );
                }
                $system_filters[ $idx ] = $system_filter;
            }
            $system_filters = array_merge( $system_filters, [] );
            $app->ctx->vars['system_filters'] = $system_filters;
        }
        return true;
    }

    function filter_by_section ( $app, &$terms ) {
        $option = $app->param( 'select_system_filters' );
        $option = '"wcag' . preg_replace( '/[^0-9]/', '', $option ) . '"';
        $option = $app->db->escape_like( $option, true, true );
        $terms['data'] = ['like' => $option ];
    }

    function filter_axe_core_result_no_problem_detected ( $app, &$terms, $model ) {
        $terms['violations'] = 0;
        $terms['incompletes'] = 0;
        $terms['check_failed'] = 0;
    }

    function action_axe_core_result_assign_me ( $app, $objects, $action ) {
        $class = new PTListActions();
        $model = $app->param( '_model' );
        $counter = 0;
        $skipped = 0;
        $user = $app->user();
        foreach ( $objects as $obj ) {
            $max_status = $app->max_status( $user, $model, $obj->workspace );
            if ( $obj->status > $max_status ) {
                $skipped++;
                continue;
            } else {
                if ( $obj->user_id != $user->id ) {
                    $obj->user_id( $user->id );
                    $obj->save();
                    $counter++;
                } else {
                    $skipped++;
                }
            }
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $skipped ) {
            $return_args .= "&skipped={$skipped}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function action_axe_core_result_re_verification ( $app, $objects, $action ) {
        $class = new PTListActions();
        $model = $app->param( '_model' );
        $counter = 0;
        $skipped = 0;
        $excludes = 0;
        $errors = 0;
        $proc_session = $app->db->model( 'session' )->get_by_key( ['name' => 'exec_axe_core-proccess', 'kind' => 'AX'] );
        if ( $proc_session->id ) {
            $return_args = "skip_proccess_running=1&__mode=view&_type=list&_model={$model}"
                         . $app->workspace_param;
            if ( $add_params = $class->add_return_params( $app ) ) {
                $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}excludes=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}errors=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}skipped=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}skip_proccess_running=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}background_proccess_running=[0-9]+&{0,1}/', '', $add_params );
                $return_args .= "&{$add_params}";
            }
            return $app->redirect( $app->admin_url . '?' . $return_args );
        }
        $php_binary = $app->php_binary();
        $path = $this->path() . DS . 'tools' . DS . 'axeRunner.php';
        if ( $php_binary && file_exists( $path ) ) {
            $cmd = $php_binary . " {$path} --silence --urlinfo_ids ";
            $urlinfo_ids = [];
            foreach ( $objects as $obj ) {
                $url_obj = null;
                $url_obj = $app->db->model( 'urlinfo' )->load( ['url' => $obj->url ], null, 'id' );
                $url_obj = !empty( $url_obj ) ? $url_obj[0] : null;
                if (! $url_obj && $obj->urlinfo_id ) {
                    $url_obj = $app->db->model( 'urlinfo' )->load( $obj->urlinfo_id, null, 'id' );
                }
                if (! $url_obj ) {
                    $skipped++;
                    continue;
                }
                $urlinfo_ids[] = (int) $url_obj->id;
            }
            $urlinfo_ids = array_unique( $urlinfo_ids );
            if (!empty( $urlinfo_ids ) ) {
                $cmd .= implode( ',', $urlinfo_ids );
                $cmd = 'cd ' . dirname( $app->pt_path ) . ';' . $cmd;
                if ( $app->user() ) {
                    $cmd .= ' --user_id ' . $app->user()->id;
                }
                $process = proc_open( $cmd, [], $pipes );
                if ( $process === false ) {
                    return $app->error( $this->translate( 'Failed to start A11Y Check process.' ) );
                }
                $return_args = "background_proccess_running=1&__mode=view&_type=list&_model={$model}&apply_actions="
                             . count( $urlinfo_ids ) . $app->workspace_param;
                if ( $add_params = $class->add_return_params( $app ) ) {
                    $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}excludes=[0-9]+&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}errors=[0-9]+&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}skipped=[0-9]+&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}skip_proccess_running=[0-9]+&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}background_proccess_running=[0-9]+&{0,1}/', '', $add_params );
                    $return_args .= "&{$add_params}";
                }
                $app->redirect( $app->admin_url . '?' . $return_args, true );
                if ( is_resource( $process ) ) {
                    proc_close($process);
                }
                exit();
            }
        }
        foreach ( $objects as $obj ) {
            $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
            $username  = $this->get_config_value( 'axerunner_username', $workspace_id );
            $password  = $this->get_config_value( 'axerunner_password', $workspace_id );
            $member_id = $this->get_config_value( 'axerunner_member_id', 0 );
            $wcag_version = $this->get_config_value( 'axerunner_wcag_version', $workspace_id );
            $wcag_level = $this->get_config_value( 'axerunner_wcag_level', $workspace_id );
            $violation_only = (int) $this->get_config_value( 'axerunner_violation_only', $workspace_id );
            $locale_org = $this->get_config_value( 'axerunner_report_locale', $workspace_id );
            $locale = escapeshellarg( $locale_org );
            $check_settings = " --version {$wcag_version} --level {$wcag_level} --violation-only {$violation_only} --locale {$locale}";
            if ( $username && $password ) {
                $username = escapeshellarg( $username );
                $password = escapeshellarg( $password );
                $auth_data = " --username {$username} --password {$password}";
            } else {
                $auth_data = '';
            }
            if ( $member_id ) {
                $session_name = $this->login_member( $app, $member_id );
                $session_name_path = $app->temp_dir . DS . 'axe_runner_' . mt_rand() . '.txt';
                file_put_contents( $session_name_path, $session_name );
            } else {
                $session_name_path = null;
            }
            $url_obj = null;
            $url_obj = $app->db->model( 'urlinfo' )->load( ['url' => $obj->url ] );
            $url_obj = !empty( $url_obj ) ? $url_obj[0] : null;
            if (! $url_obj && $obj->urlinfo_id ) {
                $url_obj = $app->db->model( 'urlinfo' )->load( $obj->urlinfo_id );
            }
            if (! $url_obj ) {
                $skipped++;
                continue;
            }
            $obj = $this->exec_axe_core( $app, $url_obj, $auth_data, $check_settings, $session_name_path, $locale_org );
            if ( $member_id ) {
                $app->fmgr->unlink( $session_name_path );
            }
            if ( $obj === false ) {
                $excludes++;
                continue;
            } else if (! $obj ) {
                $errors++;
                continue;
            }
            $counter++;
            $obj->checked_on( $app->date( 'YmdHis' ) );
            $app->set_default( $obj );
            $obj->created_by( 0 );
            $obj->save();
            $component = $app->component( 'ImageInfo' );
            if ( $component && $url_obj->model === 'asset' ) {
                $result_obj = $obj;
                $this->set_imageinfo( $app, $result_obj, $url_obj, $component );
            }
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $class->add_return_params( $app ) ) {
            $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}excludes=[0-9]+&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}errors=[0-9]+&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}skipped=[0-9]+&{0,1}/', '', $add_params );
            $return_args .= "&{$add_params}";
        }
        if ( $excludes ) {
            $return_args .= "&excludes={$excludes}";
        }
        if ( $skipped ) {
            $return_args .= "&skipped={$skipped}";
        }
        if ( $errors ) {
            $return_args .= "&errors={$errors}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    public function action_axe_runner_verify_urls  ( $app, $objects, $action ) {
        $class = new PTListActions();
        $model = $app->param( '_model' );
        $counter = 0;
        $skipped = 0;
        $excludes = 0;
        $errors = 0;
        $proc_session = $app->db->model( 'session' )->get_by_key( ['name' => 'exec_axe_core-proccess', 'kind' => 'AX'] );
        if ( $proc_session->id ) {
            $return_args = "skip_proccess_running=1&__mode=view&_type=list&_model={$model}"
                         . $app->workspace_param;
            if ( $add_params = $class->add_return_params( $app ) ) {
                $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}excludes=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}errors=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}skipped=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}skip_proccess_running=[0-9]+&{0,1}/', '', $add_params );
                $add_params = preg_replace( '/&{0,1}background_proccess_running=[0-9]+&{0,1}/', '', $add_params );
                $return_args .= "&{$add_params}";
            }
            return $app->redirect( $app->admin_url . '?' . $return_args );
        }
        $php_binary = $app->php_binary();
        $path = $this->path() . DS . 'tools' . DS . 'axeRunner.php';
        if ( $php_binary && file_exists( $path ) ) {
            $cmd = $php_binary . " {$path} --silence --urlinfo_ids ";
            $urlinfo_ids = [];
            foreach ( $objects as $obj ) {
                $urlinfo_ids[] = (int) $obj->id;
            }
            $urlinfo_ids = array_unique( $urlinfo_ids );
            if (!empty( $urlinfo_ids ) ) {
                $cmd .= implode( ',', $urlinfo_ids );
                $cmd = 'cd ' . dirname( $app->pt_path ) . ';' . $cmd;
                if ( $app->user() ) {
                    $cmd .= ' --user_id ' . $app->user()->id;
                }
                $process = proc_open( $cmd, [], $pipes );
                if ( $process === false ) {
                    return $app->error( $this->translate( 'Failed to start A11Y Check process.' ) );
                }
                $return_args = "background_proccess_running=1&__mode=view&_type=list&_model={$model}&does_act=1&apply_actions="
                             . count( $urlinfo_ids ) . $app->workspace_param;
                if ( $add_params = $class->add_return_params( $app ) ) {
                    $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}excludes=[0-9]+&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}errors=[0-9]+&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}skipped=[0-9]+&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}skip_proccess_running=[0-9]+&{0,1}/', '', $add_params );
                    $add_params = preg_replace( '/&{0,1}background_proccess_running=[0-9]+&{0,1}/', '', $add_params );
                    $return_args .= "&{$add_params}";
                }
                $app->redirect( $app->admin_url . '?' . $return_args, true );
                if ( is_resource( $process ) ) {
                    proc_close($process);
                }
                exit();
            }
        }
        foreach ( $objects as $obj ) {
            $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
            $username  = $this->get_config_value( 'axerunner_username', $workspace_id );
            $password  = $this->get_config_value( 'axerunner_password', $workspace_id );
            $member_id = $this->get_config_value( 'axerunner_member_id', 0 );
            $wcag_version = $this->get_config_value( 'axerunner_wcag_version', $workspace_id );
            $wcag_level = $this->get_config_value( 'axerunner_wcag_level', $workspace_id );
            $violation_only = $this->get_config_value( 'axerunner_violation_only', $workspace_id );
            $locale = $this->get_config_value( 'axerunner_report_locale', $workspace_id );
            $check_settings = " --version {$wcag_version} --level {$wcag_level} --violation-only {$violation_only} --locale {$locale}";
            if ( $username && $password ) {
                $username = escapeshellarg( $username );
                $password = escapeshellarg( $password );
                $auth_data = " --username {$username} --password {$password}";
            } else {
                $auth_data = '';
            }
            if ( $member_id ) {
                $session_name = $this->login_member( $app, $member_id );
                $session_name_path = $app->temp_dir . DS . 'axe_runner_' . mt_rand() . '.txt';
                file_put_contents( $session_name_path, $session_name );
            } else {
                $session_name_path = null;
            }
            $axe_core_result = $this->exec_axe_core( $app, $obj, $auth_data, $check_settings, $session_name_path, $locale );
            if ( $member_id ) {
                $app->fmgr->unlink( $session_name_path );
            }
            if ( $axe_core_result === false ) {
                $excludes++;
                continue;
            } else if (! $axe_core_result ) {
                $errors++;
                continue;
            }
            $counter++;
            $axe_core_result->checked_on( $app->date( 'YmdHis' ) );
            $app->set_default( $axe_core_result );
            $axe_core_result->created_by( 0 );
            $axe_core_result->save();
            $component = $app->component( 'ImageInfo' );
            $url_obj = $obj;
            if ( $component && $url_obj->model === 'asset' ) {
                $result_obj = $axe_core_result;
                $this->set_imageinfo( $app, $result_obj, $url_obj, $component );
            }
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $class->add_return_params( $app ) ) {
            $add_params = preg_replace( '/&{0,1}does_act=1&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}excludes=[0-9]+&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}errors=[0-9]+&{0,1}/', '', $add_params );
            $add_params = preg_replace( '/&{0,1}skipped=[0-9]+&{0,1}/', '', $add_params );
            $return_args .= "&{$add_params}";
        }
        if ( $excludes ) {
            $return_args .= "&excludes={$excludes}";
        }
        if ( $skipped ) {
            $return_args .= "&skipped={$skipped}";
        }
        if ( $errors ) {
            $return_args .= "&errors={$errors}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function action_axe_core_result_export_csv ( $app, $objects, $action ) {
        $encoding = $app->param( 'itemset_action_input' );
        $plural = 'axe_core_results';
        $ts = date( 'Y-m-d_H-i-s' );
        $upload_dir = $app->upload_dir();
        $csv_out = $upload_dir . DS . "{$plural}-{$ts}.csv";
        $fp = fopen( $csv_out, 'w' );
        if ( $encoding == 'Shift_JIS' ) {
            stream_filter_append( $fp, 'convert.iconv.UTF-8/CP932', STREAM_FILTER_WRITE );
        }
        $headers = [];
        $headers[] = $this->translate( 'URL (Status)' );
        $headers[] = $this->translate( 'Issue Type' );
        $headers[] = $this->translate( 'Impact' );
        $headers[] = $this->translate( 'Rule ID' );
        $headers[] = $this->translate( 'Success Criterion' );
        $headers[] = $app->translate( 'Hint' );
        $headers[] = $this->translate( 'Subject' );
        $headers[] = $this->translate( 'Detail' );
        $headers[] = $this->translate( 'Element' );
        fputcsv( $fp, $headers, ',', '"' );
        $no_problem = $this->translate( 'No Problem Detected' );
        foreach ( $objects as $obj ) {
            $all_data = json_decode( $obj->data, true );
            $url = $obj->url;
            $status = $obj->status;
            if ( $status == 0 ) {
                $status = $this->translate( 'Not Verified' );
            } else if ( $status == 1 ) {
                $status = $app->translate( 'Review' );
            } else if ( $status == 2 ) {
                $status = $app->translate( 'Approval Pending' );
            } else if ( $status == 4 ) {
                $status = $app->translate( 'Verified' );
            } else if ( $status == 4 ) {
                $status = $app->translate( 'Ended' );
            }
            if ( is_array( $all_data ) && !empty( $all_data ) ) {
                $summary = ["{$url} ({$status})"];
                fputcsv( $fp, $summary, ',', '"' );
                foreach ( $all_data as $data ) {
                    $ruleId = $data['ruleId'];
                    $type = $data['type'];
                    $hint = $data['hint'];
                    $impact = $data['impact'];
                    $subject = $data['subject'];
                    $detail = $data['detail'];
                    $tags = $data['tags'];
                    $element = $data['element'];
                    $sc = '';
                    if (! empty ( $tags ) ) {
                        foreach ( $tags as $tag_item ) {
                            if ( preg_match( '/wcag([0-9])([0-9])([0-9])/', $tag_item, $match_sc ) ) {
                                $sc = 'SC ' . $match_sc[1] . '.' . $match_sc[2] . '.' . $match_sc[3];
                            }
                        }
                    }
                    $column_values = ['', $type, $impact, $ruleId, $sc, $hint, $subject, $detail, $element ];
                    $res = fputcsv( $fp, $column_values, ',', '"' );
                    if (! $res ) {
                        $has_data = false;
                        foreach ( $column_values as $v ) {
                            if ( $v != '' ) {
                                $has_data = true;
                                break;
                            }
                        }
                        if ( $has_data ) {
                            $tempLine = '"';
                            $tempLine .= implode( '","', $column_values );
                            $tempLine = preg_replace("/\r\n|\r|\n/", "", $tempLine );
                            $tempLine .= '"';
                            $error_lines[] = $tempLine;
                        }
                    }
                }
            } else {
                
                $summary = ["{$url} ({$status}/{$no_problem})"];
                fputcsv( $fp, $summary, ',', '"' );
            }
        }
        fclose( $fp );
        if (! empty( $error_lines ) ) {
            if ( $encoding == 'Shift_JIS' ) {
                mb_convert_variables( 'sjis-win', 'utf-8', $error_lines );
            }
            $append = implode( "\n", array_values( $error_lines ) );
            file_put_contents( $csv_out, $append, FILE_APPEND );
        }
        PTUtil::export_data( $csv_out );
    }

    function action_axe_core_delete_unpublished ( $app, $objects, $action ) {
        $class = new PTListActions();
        $input = $app->param( 'itemset_action_input' );
        $model = $app->param( '_model' );
        $counter = 0;
        $urlinfo = $app->db->model( 'urlinfo' );
        $removed = [];
        foreach ( $objects as $obj ) {
            $ui = $urlinfo->load( ['id' => $obj->urlinfo_id,
                                   'delete_flag' => [0, 1] ], null, 'model,object_id,delete_flag' );
            if (! $ui ) {
                $removed[] = $obj;
                continue;
            }
            $ui = $ui[0];
            if ( $ui && $ui->delete_flag ) {
                if ( $input === 'ALL' ) {
                    $removed[] = $obj;
                    $counter++;
                } else {
                    $urlObj = $app->db->model( $ui->model )->load( $ui->object_id, null, 'id' );
                    if (! $urlObj ) {
                        $removed[] = $obj;
                        $counter++;
                    }
                }
                if ( count( $removed ) > 50 ) {
                    $app->db->model( 'axe_core_result' )->remove_multi( $removed );
                    $removed = [];
                }
            }
        }
        if (! empty( $removed ) ) {
            $app->db->model( 'axe_core_result' )->remove_multi( $removed );
            unset( $removed );
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $class->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function axe_core_rebuild_report ( $app ) {
        $objects = $app->db->model( 'axe_core_result' )->load( null, null, 'id,data,workspace_id' );
        $counter = 0;
        foreach ( $objects as $obj ) {
            $workspace_id = (int) $obj->workspace_id;
            if (! $obj->data ) {
                if (!isset( $this->no_problem[ $workspace_id ] ) ) {
                    $this->no_problem[ $workspace_id ] = 0;
                }
                $this->no_problem[ $workspace_id ]++;
                if ( $workspace_id ) {
                    if (!isset( $this->no_problem[0] ) ) {
                        $this->no_problem[0] = 0;
                    }
                    $this->no_problem[0]++;
                }
                if ( $obj->incompletes || $obj->violations ) {
                    $obj->incompletes( 0 );
                    $obj->violations( 0 );
                    $obj->save();
                }
                continue;
            }
            $data = json_decode( $obj->data, true );
            $violations = 0;
            $incompletes = 0;
            foreach ( $data as $line ) {
                $ruleId = $line['ruleId'];
                $hint = $line['hint'];
                $type = $line['type'];
                if ( $type == 'Violation' || $type == '違反' ) {
                    $violations++;
                } else if ( $type == 'Incomplete' || $type == '要確認' ) {
                    $incompletes++;
                }
                $subject = $line['subject'];
                if (! isset( $this->results[ $workspace_id ][ $ruleId ] ) )
                    $this->results[ $workspace_id ][ $ruleId ] = 0;
                $this->results[ $workspace_id ][ $ruleId ]++;
                if ( $workspace_id ) {
                    if (! isset( $this->results[0][ $ruleId ] ) )
                        $this->results[0][ $ruleId ] = 0;
                    $this->results[0][ $ruleId ]++;
                }
                $this->hints[ $ruleId ] = $hint;
                $this->messages[ $ruleId ] = $subject;
                $tags = $line['tags'];
                $exclude_sc = $this->exclude_sc( $workspace_id );
                foreach ( $tags as $tag_item ) {
                    if ( preg_match( '/wcag([0-9])([0-9])([0-9])/', $tag_item, $match_sc ) ) {
                        $sc = $match_sc[1] . '.' . $match_sc[2] . '.' . $match_sc[3];
                        if ( in_array( $sc, $exclude_sc ) ) {
                            continue 2;
                        }
                        $sc = 'SC ' . $sc;
                        $this->s_criterion[ $ruleId ] = $sc;
                    }
                }
            }
            if (! $violations && ! $incompletes ) {
                if (! isset( $this->no_problem[ $workspace_id ] ) )
                    $this->no_problem[ $workspace_id ] = 0;
                $this->no_problem[ $workspace_id ]++;
                if ( $workspace_id ) {
                    if (! isset( $this->no_problem[0] ) )
                        $this->no_problem[0] = 0;
                    $this->no_problem[0]++;
                }
            } else {
                if (! isset( $this->violations[ $workspace_id ] ) )
                    $this->violations[ $workspace_id ] = 0;
                if (! isset( $this->incompletes[ $workspace_id ] ) )
                    $this->incompletes[ $workspace_id ] = 0;
                $this->violations[ $workspace_id ] += $violations;
                $this->incompletes[ $workspace_id ] += $incompletes;
                if (! isset( $this->has_problem[ $workspace_id ] ) )
                    $this->has_problem[ $workspace_id ] = 0;
                $this->has_problem[ $workspace_id ]++;
                if ( $workspace_id ) {
                    if (! isset( $this->violations[0] ) )
                        $this->violations[0] = 0;
                    if (! isset( $this->incompletes[0] ) )
                        $this->incompletes[0] = 0;
                    $this->violations[0] += $violations;
                    $this->incompletes[0] += $incompletes;
                    if (! isset( $this->has_problem[0] ) )
                        $this->has_problem[0] = 0;
                    $this->has_problem[0]++;
                }
            }
            $counter++;
        }
        $hints = json_encode( $this->hints );
        $messages = json_encode( $this->messages );
        $s_criterion = json_encode( $this->s_criterion );
        $time = time();
        $expires = $time + 365 * 86400;
        $workspace_ids = array_keys( $this->results );
        $workspaces = $app->db->model( 'workspace' )->load( ['id' => ['NOT IN' => $workspace_ids ] ], null, 'id' );
        foreach ( $workspaces as $workspace ) {
            if (! isset( $this->results[ $workspace->id ] ) ) {
                $this->results[ $workspace->id ] = [];
            }
        }
        if (! isset( $this->results[0] ) ) {
            $this->results[0] = [];
        }
        foreach ( $this->results as $workspace_id => $data ) {
            arsort( $data );
            $session = $app->db->model( 'session' )->get_by_key( ['name' => 'axe-core-check-results', 'workspace_id' => $workspace_id ] );
            $session->data( json_encode( $data ) );
            $session->metadata( $hints );
            $session->extradata( $messages );
            $session->start( $time );
            $session->expires( $expires );
            $session->kind( 'AX' );
            $violations = $this->violations[ $workspace_id ] ?? 0;
            $incompletes = $this->incompletes[ $workspace_id ] ?? 0;
            $no_problem = $this->no_problem[ $workspace_id ] ?? 0;
            $has_problem = $this->has_problem[ $workspace_id ] ?? 0;
            $results = ['total' => $has_problem + $no_problem,
                        'has_problem' => $has_problem,
                        'no_problem' => $no_problem,
                        'violations' => $violations,
                        'incompletes' => $incompletes ];
            $session->value( json_encode( $results ) );
            $session->text( $s_criterion );
            $session->save();
        }
        if ( $app->id === 'Prototype' ) {
            $return_url = $this->script_uri . "?__mode=view&_type=list&_model=axe_core_result";
            if ( $workspace_id = $app->param( 'workspace_id' ) ) {
                $return_url .= '&workspace_id=' . $workspace_id;
            }
            $return_url .= '&rebuilt_report=1';
            $app->redirect( $return_url );
        }
        return $counter;
    }

    function exclude_urls ( $url, $workspace_id ) {
        if ( isset( $this->exclude_urls[ $workspace_id ] ) ) {
            $exclude_urls = $this->exclude_urls[ $workspace_id ];
        } else {
            $exclude_urls = trim( $this->get_config_value( 'axerunner_exclude_urls', $workspace_id ) );
            if (! $exclude_urls ) {
                $this->exclude_urls[ $workspace_id ] = [];
                return false;
            }
            $exclude_urls = preg_replace( "/\r\n|\r|\n/", PHP_EOL, $exclude_urls );
            $exclude_urls = explode( PHP_EOL, $exclude_urls );
            $exclude_urls = array_filter( $exclude_urls, 'strlen' );
            $this->exclude_urls[ $workspace_id ] = $exclude_urls;
        }
        foreach ( $exclude_urls as $exclude_url ) {
            if ( $url === $exclude_url ) {
                return true;
            } elseif ( strpos( $exclude_url, '!' ) === 0 &&
                mb_substr_count( $exclude_url, '!' ) == 2 ) {
                if ( preg_match( $exclude_url, $url ) ) {
                    return true;
                }
            } elseif ( strpos( $url, $exclude_url ) !== false ) {
                return true;
            }
        }
        return false;
    }

    function exclude_sc ( $workspace_id ) {
        if ( isset( $this->exclude_sc[ $workspace_id ] ) ) {
            return $this->exclude_sc[ $workspace_id ];
        } else {
            $exclude_sc = trim( $this->get_config_value( 'axerunner_exclude_sc', $workspace_id ) );
            if (! $exclude_sc ) {
                $this->exclude_sc[ $workspace_id ] = [];
                return [];
            }
            $exclude_sc = preg_split( "/\s*,\s*/", $exclude_sc );
            $this->exclude_sc[ $workspace_id ] = $exclude_sc;
            return $exclude_sc;
        }
    }

    function mail_filter ( &$cb, $app, $to, &$subject, &$body, $headers ) {
        if ( $app->id !== 'Prototype' ) {
            return true;
        }
        if ( $app->mode == 'save' && $app->param( '_model' ) == 'axe_core_result' ) {
            $status = $app->param( 'status' );
            $object_id = $app->param( 'id' );
            if ( $status == 4 && $object_id ) {
                $url = $app->param( 'url' );
                $subject1 = $this->translate( 'you creadted (or edited)' );
                $subject2 = $this->translate( 'you requested approval' );
                if ( strpos( $subject, $subject1 ) !== false ) {
                    $new_subject = $this->translate( "The A11Y Check Result'%s' you creadted (or edited) has been approved and verified by %s.",
                      [ $url, $app->user()->nickname ] );
                    $subject = $new_subject;
                } else if ( strpos( $subject, $subject2 ) !== false ) {
                    $new_subject = $this->translate( "The A11Y Check Result'%s' you requested approval has been approved and verified by %s.",
                      [ $url, $app->user()->nickname ] );
                    $subject = $new_subject;
                }
                $tmpl = $app->ctx->get_template_path( 'email/axe_core_workflow.tmpl' );
                $app->ctx->vars['subject'] = $new_subject;
                $app->ctx->vars['object_label'] = $app->translate( 'A11Y Check Result' );
                $edit_label = $this->translate( 'Edit URL' );
                $edit_link = $app->script_uri . "?__mode=view&_type=edit&_model=axe_core_result&id={$object_id}";
                if ( $app->workspace() ) {
                    $edit_link .= '&workspace_id=' . $app->workspace()->id;
                }
                $app->ctx->vars['edit_label'] = $edit_label;
                $app->ctx->vars['edit_link'] = $edit_link;
                $body = $app->build( $app->fmgr->get( $tmpl ) );
            }
        }
        return true;
    }

    public function set_object_title_link ( $app, $url ) {
        $urlinfo_terms = [
            'url' => $url,
            'delete_flag' => 0
        ];
        $urlinfo = $app->db->model( 'urlinfo' )->load( $urlinfo_terms, [], 'id,object_id,model,urlmapping_id,workspace_id' );
        if ( $urlinfo && $urlinfo[0]->object_id ) {
            $model = $urlinfo[0]->model;
            $object_id = $urlinfo[0]->object_id;
            $scheme = $app->get_scheme_from_db( $urlinfo[0]->model );
            $primary_col = $scheme['primary'];
            $object = $app->db->model( $model )->load( $object_id );
            if (! $object ) return '';
            $table = $app->get_table( $model );
            if (! $table ) {
                return;
            }
            $result = [];
            if ( $table->menu_type == 3 ) {
                $permission = $app->can_do( $model, 'update_all' );
            } else {
                $permission = $app->can_do( $model, 'edit', $object );
            }
            $t_permission = false;
            $tmpl_id = null;
            $tmpl_name = null;
            $map = $urlinfo[0]->urlmapping;
            if ( is_object( $map ) ) {
                $tmpl = $map->template;
                $t_permission = $app->can_do( 'template', 'edit', $tmpl );
                $tmpl_id = $tmpl->id;
                $tmpl_name = $tmpl->name;
                $app->ctx->vars['axe_tmpl_title'] = $this->translate( "%s'%s'", [ $app->translate( 'template' ), $app->escape( $tmpl_name ) ] );
            }
            $app->ctx->vars['axe_permission'] = $permission;
            $app->ctx->vars['axe_tmpl_permission'] = $t_permission;
            $app->ctx->vars['axe_label'] = $app->translate( $table->label );
            $title = $this->translate( "%s'%s'", [ $app->translate( $model ), $app->escape( $object->$primary_col ) ] );
            $app->ctx->vars['axe_title'] = $title;
            $url = $app->script_uri . "?__mode=view&amp;_type=edit&amp;_model={$model}&amp;id={$object_id}";
            $workspace_id = $urlinfo[0]->workspace_id;
            if ( $workspace_id ) {
                $url .= "&amp;workspace_id={$workspace_id}";
            }
            $app->ctx->vars['axe_url'] = $url;
            if ( $t_permission && $tmpl_id ) {
                $url = $app->script_uri . "?__mode=view&amp;_type=edit&amp;_model=template&amp;id={$tmpl_id}";
                if ( $workspace_id ) {
                    $url .= "&amp;workspace_id={$workspace_id}";
                }
                $app->ctx->vars['axe_tmpl_url'] = $url;
            }
        }
        return;
    }

    function scheduled_a11y_check ( $app ) {
        if (! $this->is_excecute( $app ) ) {
            return 0;
        }
        $week = self::DAY_OF_WEEK;
        $w = date( 'w' );
        $session = $app->db->model( 'session' )->get_by_key(
          ['name' => 'axerunner-scheduled-task', 'key' => $w, 'kind' => 'ST',
           'workspace_id' => 0] );
        $ts_from = date( 'Y-m-d H:i:s' );
        $session->value( $ts_from );
        $session->save();
        $php_binary = $app->php_binary();
        $path = $this->path() . DS . 'tools' . DS . 'axeRunner.php';
        if ( $php_binary && file_exists( $path ) ) {
            $only_newer = $this->get_config_value( 'axerunner_task_only_newer' );
            $workspace_ids = $this->get_config_value( 'axerunner_task_workspace_ids' );
            $cmd = $php_binary . " {$path} --silence";
            if ( $only_newer ) {
                $cmd .= ' --only_newer';
            }
            if ( $workspace_ids ) {
                $workspace_ids = preg_split( '/\s*,\s*/', $workspace_ids );
                foreach ( $workspace_ids as $idx => $workspace_id ) {
                    if (! ctype_digit( $workspace_id ) ) {
                        unset( $workspace_ids[ $idx ] );
                    } else {
                        $workspace_ids[ $idx ] = (int) $workspace_id;
                    }
                }
                $workspace_ids = array_unique( $workspace_ids );
                $cmd .= ' --workspace_ids ' . implode( ',', $workspace_ids );
            }
            $cmd = 'cd ' . dirname( $app->pt_path ) . ';' . $cmd;
            $cmd .= ' --task_worker';
            $process = proc_open( $cmd, [], $pipes );
            if ( $process === false ) {
                $this->error( $this->translate( 'Failed to start A11Y Check process.' ), 'error' );
                return 0;
            }
            if ( is_resource( $process ) ) {
                proc_close($process);
            }
            return 1;
        } else {
            if (! $php_binary ) {
                $this->log( $app->translate( "The system environment value '%s' is not specified.", 'php_binary' ), 'error' );
            }
            return 0;
        }
    }

    function pre_save_plugin_config ( $cb, $app, $component, &$errors ) {
        if ( $component->id != 'axerunner' ) {
            return true;
        }
        if ( $app->param( 'cleanup_session' ) ) {
            $sessions = $app->db->model( 'session' )->load(
              ['name' => 'axerunner-scheduled-task', 'key' => $w, 'kind' => 'ST', 'workspace_id' => 0] );
            if (! empty( $sessions ) ) {
                $app->db->model( 'session' )->remove_multi( $sessions );
            }
        }
        return true;
    }

    function get_config_value ( $name, $ws_id = 0, $inheritance = false ) {
        if ( $ws_id ) {
            $use_system_settings = parent::get_config_value( 'axerunner_use_system_settings', $ws_id );
            if ( $use_system_settings ) {
                $ws_id = 0;
            }
        }
        return parent::get_config_value( $name, $ws_id, $inheritance );
    }

    function is_excecute ( $app ) {
        $workspace_id = 0;
        $week = self::DAY_OF_WEEK;
        $w = date( 'w' );
        $time = date( 'Hi' );
        $day_of_week = $week[ $w ];
        $do_today = $this->get_config_value( 'axerunner_' . $day_of_week, $workspace_id );
        if (! $do_today ) {
            return false;
        }
        $excec_time = $this->get_config_value( 'axerunner_time', $workspace_id );
        $excec_time = preg_replace( '/[^0-9]/', '', $excec_time );
        $time = date( 'Hi' );
        if ( $time < $excec_time ) {
            return false;
        }
        $ts_from = date( 'Y-m-d 00:00:00' );
        /*
        $sessions = $app->db->model( 'session' )->load(
          ['name' => 'axerunner-scheduled-task', 'key' => $w, 'kind' => 'ST',
           'value' => ['>=' => $ts_from ], 'workspace_id' => $workspace_id ] );
        if (! empty( $sessions ) ) {
            $app->db->model( 'session' )->remove_multi( $sessions );
        }
        */
        $sessions = $app->db->model( 'session' )->load(
          ['name' => 'axerunner-scheduled-task', 'key' => $w, 'kind' => 'ST',
           'value' => ['<' => $ts_from ], 'workspace_id' => $workspace_id ] );
        if (! empty( $sessions ) ) {
            $app->db->model( 'session' )->remove_multi( $sessions );
        }
        $session = $app->db->model( 'session' )->count(
          ['name' => 'axerunner-scheduled-task', 'key' => $w, 'kind' => 'ST',
           'value' => ['>=' => $ts_from ], 'workspace_id' => $workspace_id ] );
        return $session ? false : true;
    }
}