<?php
if ( isset( $_SERVER['REMOTE_ADDR'] ) || php_sapi_name() !== 'cli' ) {
    exit;
}

require_once( 'class.Prototype.php' );

class AxeRunnerWorker {

    private $app = null;
    private $target_workspace_ids = null;
    private $urlinfo_ids = null;
    private $auth_data_stack = [];
    private $check_settings_stack = [];
    private $develop = false;
    private $only_newer = false;
    private $silence = false;
    private $task_worker = false;
    private $user_id = null;

    private function check_pid_file( $argv ) {
        $pid = $this->app->temp_dir . DS . md5( __FILE__ . implode( '', $argv ) ) . '.pid';
        if ( file_exists( $pid ) ) {
            $worker_period = $this->app->worker_period;
            $mtime = filemtime( $pid );
            if ( ( time() - $worker_period ) < $mtime ) {
                echo date( "Y-m-d H:i:s " ), $this->app->translate( "%s skipped (the file %s already exists).", [ basename( __FILE__ ), $pid ] ), "\n";
                exit;
            }
            unlink( $pid );
        }
        touch( $pid );
        $this->app->pid = $pid;
    }

    private function check_argv( $argv ) {
        if ( in_array( '--workspace_ids', $argv ) ) {
            $index = array_search( '--workspace_ids', $argv );
            if ( isset( $argv[ $index + 1 ] ) ) {
                $target_workspace_ids = preg_split( '/\s*,\s*/', $argv[ $index + 1 ] );
                foreach ( $target_workspace_ids as $idx => $target_workspace_id ) {
                    if (! ctype_digit( $target_workspace_id ) ) {
                        unset( $target_workspace_ids[ $idx ] );
                    }
                }
                $target_workspace_ids = array_unique( $target_workspace_ids );
                if (!empty( $target_workspace_ids ) ) {
                    $this->target_workspace_ids = $target_workspace_ids;
                }
                // $_GET['workspace_ids'] = $argv[ $index + 1 ];
                unset( $argv[ $index + 1 ] );
            }
            unset( $argv[ $index ] );
        }
        if ( in_array( '--urlinfo_ids', $argv ) ) {
            $index = array_search( '--urlinfo_ids', $argv );
            if ( isset( $argv[ $index + 1 ] ) ) {
                $urlinfo_ids = preg_split( '/\s*,\s*/', $argv[ $index + 1 ] );
                foreach ( $urlinfo_ids as $idx => $urlinfo_id ) {
                    if (! ctype_digit( $urlinfo_id ) ) {
                        unset( $urlinfo_ids[ $idx ] );
                    }
                }
                $urlinfo_ids = array_unique( $urlinfo_ids );
                if (!empty( $urlinfo_ids ) ) {
                    $this->urlinfo_ids = $urlinfo_ids;
                }
                unset( $argv[ $index + 1 ] );
            }
            unset( $argv[ $index ] );
        }
        if ( in_array( '--develop', $argv ) ) {
            $this->develop = true;
            $index = array_search( '--develop', $argv );
            unset( $argv[ $index ] );
        }
        if ( in_array( '--only_newer', $argv ) ) {
            $this->only_newer = true;
            $index = array_search( '--only_newer', $argv );
            unset( $argv[ $index ] );
        }
        if ( in_array( '--silence', $argv ) ) {
            $this->silence = true;
            $index = array_search( '--silence', $argv );
            unset( $argv[ $index ] );
        }
        if ( in_array( '--task_worker', $argv ) ) {
            $this->task_worker = true;
            $index = array_search( '--task_worker', $argv );
            unset( $argv[ $index ] );
        }
        if ( in_array( '--user_id', $argv ) ) {
            $index = array_search( '--user_id', $argv );
            if ( isset( $argv[ $index + 1 ] ) ) {
                $this->user_id = (int) $argv[ $index + 1 ];
            }
            unset( $argv[ $index ] );
        }
    }

    private function get_auth_data( $component, $url_obj ) {
        if ( array_key_exists( $url_obj->workspace_id, $this->auth_data_stack ) === false ) {
            $username = $component->get_config_value( 'axerunner_username', $url_obj->workspace_id );
            $password = $component->get_config_value( 'axerunner_password', $url_obj->workspace_id );
            $this->auth_data_stack[$url_obj->workspace_id] = [
                'username' => $username,
                'password' => $password,
            ];
            if ( $username && $password ) {
                $username = escapeshellarg( $username );
                $password = escapeshellarg( $password );
                $auth_data = " --username {$username} --password {$password}";
            } else {
                $auth_data = '';
            }
        } elseif (
            array_key_exists( $url_obj->workspace_id, $this->auth_data_stack ) &&
            $this->auth_data_stack[$url_obj->workspace_id] !== null
        ) {
            $username = $this->auth_data_stack[$url_obj->workspace_id]['username'];
            $password = $this->auth_data_stack[$url_obj->workspace_id]['password'];
            if ( $username && $password ) {
                $username = escapeshellarg( $username );
                $password = escapeshellarg( $password );
                $auth_data = " --username {$username} --password {$password}";
            } else {
                $auth_data = '';
            }
        } else {
            $auth_data = '';
        }
        return $auth_data;
    }

    private function get_check_settings( $component, $url_obj ) {
        if ( array_key_exists( $url_obj->workspace_id, $this->check_settings_stack ) === false ) {
            $wcag_version   = $component->get_config_value( 'axerunner_wcag_version', $url_obj->workspace_id );
            $wcag_level     = $component->get_config_value( 'axerunner_wcag_level', $url_obj->workspace_id );
            $violation_only = (int) $component->get_config_value( 'axerunner_violation_only', $url_obj->workspace_id );
            $locale         = $component->get_config_value( 'axerunner_report_locale', $url_obj->workspace_id );
            $locale = escapeshellarg( $locale );
            $this->check_settings_stack[$url_obj->workspace_id] = [
                'wcag_version'   => $wcag_version,
                'wcag_level'     => $wcag_level,
                'violation_only' => $violation_only,
                'locale'         => $locale,
            ];
            $check_settings = " --version {$wcag_version} --level {$wcag_level} --violation-only {$violation_only} --locale {$locale}";
        } elseif (
            array_key_exists( $url_obj->workspace_id, $this->check_settings_stack ) &&
            $this->check_settings_stack[$url_obj->workspace_id] !== null
        ) {
            $wcag_version   = $this->check_settings_stack[$url_obj->workspace_id]['wcag_version'];
            $wcag_level     = (int) $this->check_settings_stack[$url_obj->workspace_id]['wcag_level'];
            $violation_only = $this->check_settings_stack[$url_obj->workspace_id]['violation_only'];
            $violation_only = $violation_only ? '1' : '0';
            $locale         = $this->check_settings_stack[$url_obj->workspace_id]['locale'];
            $check_settings = " --version {$wcag_version} --level {$wcag_level} --violation-only {$violation_only} --locale {$locale}";
        } else {
            $check_settings = '';
        }
        return $check_settings;
    }

    private function set_member_data( $component ) {
        $member_id = $component->get_config_value( 'axerunner_member_id', 0 );
        if ( $member_id ) {
            $session_name = $component->login_member( $this->app, $member_id );
            file_put_contents( $this->app->pid, $session_name, FILE_APPEND );
            return true;
        }
        return false;
    }

    private function exec_axe_core() {
        $app = $this->app;
        if ( $this->user_id ) {
            $user = $app->db->model( 'user' )->load( $this->user_id );
            $app->user = $user;
        }
        $start_dt = date( 'Y-m-d H:i:s' );
        $app->get_scheme_from_db( 'axe_core_result' );
        $component = $app->component( 'AxeRunner' );
        $auth_data_stack = [];
        if (! $app->node_path ) {
            throw new Exception( 'App Property `node_path` required.' );
            return;
        }
        $proc_session = $app->db->model( 'session' )->get_by_key( ['name' => 'exec_axe_core-proccess', 'kind' => 'AX'] );
        if ( $this->task_worker ) {
            if ( $proc_session->id ) {
                $message = $component->translate( 'Skipped because another ax-core check process is running.' );
                echo $message, PHP_EOL;
                $app->log(
                    [
                        'message'  => $message1,
                        'category' => 'axe-runner',
                        'level' => 'info',
                    ]
                );
                return;
            }
        }
        $session_expires = $app->request_time + $app->axe_core_session_expires;
        $proc_session->start( $app->request_time );
        $proc_session->expires( $session_expires );
        $proc_session->save();
        $terms = [
            // 'class' => 'archive',
            'mime_type' => 'text/html',
            'delete_flag' => 0,
        ];
        $args = [];
        if ( $this->target_workspace_ids ) {
            $terms['workspace_id'] = ['IN' => $this->target_workspace_ids ];
        }
        if ( $this->urlinfo_ids ) {
            $terms['urlinfo_id'] = ['IN' => $this->urlinfo_ids ];
        }
        if ( $this->develop ) {
            $component->develop = true;
        }
        if ( $this->silence ) {
            $component->silence = true;
        }
        if ( $this->set_member_data( $component ) ) {
            $session_name_path = $app->pid;
        } else {
            $session_name_path = '';
        }
        $url_objs = $app->db->model( 'urlinfo' )->load_iter( $terms, $args, 'id,url,md5,urlmapping_id,workspace_id,model,object_id' );
        $counter = 0;
        while ( $url_obj = $url_objs->fetch( PDO::FETCH_BOTH ) ) {
            $url_obj = $app->db->model( 'urlinfo' )->new( $url_obj );
            $url_obj = $app->db->model( 'urlinfo' )->load( $url_obj->id );
            if (! $url_obj || $url_obj->delete_flag ) {
                continue;
            }
            if ( $this->only_newer ) {
                $axe_core_result = $app->db->model( 'axe_core_result' )->get_by_key( ['url' => $url_obj->url ] );
                if ( $axe_core_result->id ) {
                    if ( $this->urlinfo_ids && !$this->silence ) {
                        echo $component->translate( "Verification was skipped because the URL'%s' was validated.", $url_obj->url ), PHP_EOL;
                    }
                    continue;
                }
            }
            $auth_data = $this->get_auth_data( $component, $url_obj );
            $check_settings = $this->get_check_settings( $component, $url_obj );
            $locale = $component->get_config_value( 'axerunner_report_locale', $url_obj->workspace_id );
            $res = $component->exec_axe_core( $app, $url_obj, $auth_data, $check_settings, $session_name_path, $locale, $this->task_worker );
            if ( is_object( $res ) ) {
                $counter++;
                if (!$this->silence && $this->task_worker ) {
                    echo $component->translate( "The URL'%s' verified.", $url_obj->url ), PHP_EOL;
                }
                if ( $this->develop ) {
                    break;
                }
            }
        }
        if (! $this->task_worker ) {
            $proc_session->remove();
            return;
        }
        if (! $counter ) {
            $proc_session->remove();
            $message1 = $component->translate( 'Accessibility verification by axe-core was performed.' );
            $message2 = $component->translate( 'There were no pages to verify.' );
            if (!$this->silence ) {
                echo "{$message1} {$message2}", PHP_EOL;
            }
            $metadata = [ $app->translate( 'Message' ) => $message2 ];
            $app->log(
                [
                    'message'  => $message1,
                    'category' => 'axe-runner',
                    'metadata' => json_encode( $metadata, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ),
                    'level' => 'info',
                ]
            );
            return;
        }
        $end_dt = date( 'Y-m-d H:i:s' );
        $metadata = [
            'pages' => $counter,
            'start' => $start_dt,
            'end'   => $end_dt,
        ];
        $hints = json_encode( $component->hints );
        $messages = json_encode( $component->messages );
        $s_criterion = json_encode( $component->s_criterion );
        $time = time();
        $expires = $time + 365 * 86400;
        foreach ( $component->results as $workspace_id => $data ) {
            arsort( $data );
            $session = $app->db->model( 'session' )->get_by_key( ['name' => 'axe-core-check-results', 'workspace_id' => $workspace_id ] );
            $session->data( json_encode( $data ) );
            $session->metadata( $hints );
            $session->extradata( $messages );
            $session->start( $time );
            $session->expires( $expires );
            $session->kind( 'AX' );
            $violations = $component->violations[ $workspace_id ] ?? 0;
            $incompletes = $component->incompletes[ $workspace_id ] ?? 0;
            $no_problem = $component->no_problem[ $workspace_id ] ?? 0;
            $has_problem = $component->has_problem[ $workspace_id ] ?? 0;
            $results = ['total' => $has_problem + $no_problem,
                        'has_problem' => $has_problem,
                        'no_problem' => $no_problem,
                        'violations' => $violations,
                        'incompletes' => $incompletes ];
            $session->value( json_encode( $results ) );
            $session->text( $s_criterion );
            $session->save();
        }
        $app->set_mail_param( $app->ctx );
        $subject = null;
        $body = null;
        $template = null;
        $body = $app->get_mail_tmpl( 'axe_core_result', $template );
        if ( $template ) {
            $subject = $template->subject;
        }
        $subject = $subject ? $app->translate( $subject, $app->appname )
                 : $component->translate( "[%s] AxeRunner Automate Testing Results.", $app->appname );
        $subject = $app->build( $subject );
        $app->ctx->vars['appname'] = $app->appname;
        foreach ( $component->admin_urls as $user_id => $urls ) {
            $user = $app->db->model( 'user' )->load( $user_id, null, 'nickname,email' );
            if (! $user ) {
                continue;
            }
            $app->ctx->vars['admin_urls'] = $urls;
            $mail_body = $app->build( $body );
            $to = $user->email;
            $headers = [];
            $error = '';
            $res = PTUtil::send_mail( $to, $subject, $mail_body, $headers, $error );
            if (! $res ) {
                $message = $component->translate( "An email could not be sent to user '%s' due to an error.", $user->nickname );
                $component->log( $message, 'error' );
            }
        }
        $message = $component->translate( 'Accessibility verification by axe-core was performed.' );
        $app->log(
            [
                'message'  => $message,
                'category' => 'axe-runner',
                'metadata' => json_encode( $metadata, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ),
                'level' => 'info',
            ]
        );
        if (!$this->silence ) {
            echo $message, PHP_EOL;
        }
        $proc_session->remove();
    }

    public function run( $argv = [] ) {
        $app = new Prototype( ['id' => 'Worker'] );
        $app->logging  = true;
        $app->init();
        $this->app = $app;
        $this->check_pid_file( $argv );
        $this->check_argv( $argv );
        $this->exec_axe_core();
    }

}

$worker = new AxeRunnerWorker();
$worker->run( $argv );