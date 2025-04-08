<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class Theme_GitHub extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    public function activate ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'user' );
        $upgrader = new PTUpgrader();
        $upgrade  = false;
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'github_account'
        ] );
        if (! $column->id ) {
            $values = [
                'type' => 'string',
                'label' => 'GitHub Account',
                'index' => 0,
                'size' => 255,
                'order' => 63,
                'edit' => 'text'
            ];
            $upgrade = $upgrader->make_column( $table, 'github_account', $values, false );
        }
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'github_token'
        ] );
        if (! $column->id ) {
            $values = [
                'type' => 'string',
                'label' => 'Token for GitHub',
                'index' => 0,
                'size' => 255,
                'order' => 65,
                'edit' => 'text'
            ];
            $upgrade = $upgrader->make_column( $table, 'github_token', $values, false );
        }
        if ( $upgrade ) {
            $upgrader->upgrade_scheme( 'user' );
            $app->clear_compiled( 'edit.tmpl' );
        }
        return true;
    }

    function deactivate ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'user' );
        $upgrader = new PTUpgrader();
        $upgrade  = false;
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'github_account'
        ] );
        if ( $column->id ) {
            $upgrade = $column->remove();
        }
        $column = $app->db->model( 'column' )->get_by_key( [
            'table_id' => $table->id,
            'name' => 'github_token'
        ] );
        if ( $column->id ) {
            $upgrade = $column->remove();
        }
        if ( $upgrade ) {
            $upgrader->upgrade_scheme( 'user' );
            $app->clear_compiled( 'edit.tmpl' );
        }
        return true;
    }

    function theme_to_github ( $app ) {
        $workspace_id = (int)$app->param( 'workspace_id' );
        $theme = $app->get_config( 'theme', $workspace_id );
        if (! $theme || !is_object( $theme ) ) {
            return $app->error( 'Invalid request.' );
        }
        if (! $theme->data ) {
            return $app->error( 'Invalid request.' );
        }
        $theme_id = $theme->value;
        $theme_class = new PTTheme;
        $theme_path = $theme_class->rel2abs( $theme->data );
        if (! $app->fmgr->exists( $theme_path . DS . 'theme.json' ) ) {
            return $app->error( 'Invalid request.' );
        }
        $theme = json_decode( $app->fmgr->get( $theme_path . DS . 'theme.json' ) );
        if ( $theme === null || !property_exists( $theme, 'repository' ) || !$theme->repository ) {
            return $app->error( 'Invalid request.' );
        }
        $repository = $theme->repository;
        $repository_path = preg_replace( '!^https://.*?/!', '', $repository );
        list( $owner, $repo_name ) = explode( '/', $repository_path );
        $base_url = preg_replace( '!^https://github\.com/!', 'https://api.github.com/repos/', $repository );
        $branch_url = $base_url . '/zipball';
        $token = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                           'key' => 'theme_setting', 'kind' => 'token'] );
        $token = $this->get_setting( $app, 'token', $theme_id, $workspace_id );
        if (! $token ) {
            return $app->error( $this->translate( 'This function requires Personal access token for GitHub.' ) );
        }
        $options = [
            'http' => [
                'header' => [
                    'User-Agent: Mozilla/5.0',
                    'Authorization: bearer ' . $token,
                    'Content-type: application/json; charset=UTF-8'
                ]
            ]
        ];
        $account = $this->get_setting( $app, 'account', $theme_id, $workspace_id ) ?? $owner;
        $context = PTUtil::stream_context_create( $options );
        $theme_class = new PTTheme;
        $branch = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                        'key' => 'theme_setting', 'kind' => 'branch'] );
        if ( $branch->id && $branch->value ) {
            $branch_name = $branch->value;
        } else {
            $json = $theme_class->_file_get_contents( $base_url, false, $context );
            if ( $json === false ) {
                return $app->error( $this->translate( 'An error occues while get theme settings from GitHub.' ) );
            }
            $settings = json_decode( $json );
            $branch_name = $settings->default_branch;
        }
        $gitignore = $this->get_setting( $app, 'gitignore', $theme_id, $workspace_id );
        $gitignore = preg_split( '/\s*,\s*/', $gitignore );
        if ( $app->request_method == 'POST' ) {
            $file_paths = $app->param( 'file_path' );
            require_once( $app->composer_autoload );
            $client = new \Github\Client();
            $account = $this->get_setting( $app, 'account', $theme_id, $workspace_id ) ?? $owner;
            $committer = ['name' => $app->user()->nickname, 'email' => $app->user()->email ];
            $client->authenticate( $account, $token, \Github\Client::AUTH_CLIENT_ID);
            $message = $app->param( 'commit_message' );
            $metadata = [];
            $metadata['Message'] = $message;
            $counter = 0;
            foreach ( $file_paths as $file_path ) {
                if ( strpos( $file_path, '..' ) !== false ) {
                    continue;
                }
                if ( in_array( basename( $file_path ), $gitignore ) ) {
                    continue;
                }
                $path = $file_path;
                $md5 = md5( $file_path );
                $status = $app->param( "{$md5}_status" );
                $file_path = $theme_path . DS . $file_path;
                if (! $status ) {
                    continue;
                }
                try {
                    if ( $status == 'Update' && $app->fmgr->exists( $file_path ) ) {
                        $oldFile = $client->api( 'repo' )->contents()->show( $owner, $repo_name, $path, $branch_name );
                        $fileInfo = $client->api( 'repo' )->contents()->update(
                            $owner, $repo_name, $path,
                            $app->fmgr->get( $file_path ),
                            $message, $oldFile['sha'], $branch_name, $committer );
                        $metadata['Update'][] = $path;
                    } else if ( $status == 'New' && $app->fmgr->exists( $file_path ) ) {
                        $fileInfo = $client->api( 'repo' )->contents()->create( $owner, $repo_name, $path,
                            $app->fmgr->get( $file_path ), $message, $branch_name, $committer );
                        $metadata['New'][] = $path;
                    } else if ( $status == 'Delete' ) {
                        $oldFile = $client->api( 'repo' )->contents()->show( $owner, $repo_name, $path, $branch_name );
                        $fileInfo = $client->api( 'repo' )->contents()->rm( $owner, $repo_name,
                                        $path, $message, $oldFile['sha'], $branch_name, $committer );
                        $metadata['Delete'][] = $path;
                    }
                    $counter++;
                } catch ( RuntimeException $e ) {
                    $errstr = $e->getMessage();
                    $errstr = $errstr == 'Not Found'
                            ? $this->translate( 'Path not found or authentication failed.' )
                            : $errstr;
                    return $app->error( $this->translate( "An error occued while commit '%s' to GitHub(%s).", [ $path, $errstr ] ) );
                }
            }
            if ( $counter ) {
                $params = [ $counter, $repository_path, $app->user()->nickname ];
                $messsage = $counter == 1 ? $this->translate( "%1\$s file have been committed to %2\$s on GitHub by %3\$s.", $params )
                                          : $this->translate( "%1\$s files have been committed to %2\$s on GitHub by %3\$s.", $params );
                $app->log( ['message'   => $messsage,
                            'category'  => 'themegithub',
                            'metadata'  => json_encode( $metadata ),
                            'level'     => 'info'] );
            }
            $return_args = "__mode=theme_to_github&commits={$counter}&does_act=1";
            if ( $workspace_id ) {
                $return_args .= '&workspace_id=' . $workspace_id;
            }
            $app->redirect( $app->admin_url . '?' . $return_args );
        }
        $branch_url .= '/' . $branch_name;
        $pull = file_get_contents( $branch_url, false, $context );
        if ( $pull === false ) {
            return $app->error( $this->translate( "Failed to pull theme from '%s'.", $branch_url ) );
        }
        $upload_dir = $app->upload_dir();
        $tmpPath = $upload_dir . DS . 'theme.zip';
        $extractPath = $upload_dir . DS . 'theme';
        $out = $app->fmgr->put( $tmpPath, $pull );
        $zip = new ZipArchive();
        $res = $zip->open( $tmpPath );
        if ( $res === true ) {
            $zip->extractTo( $extractPath );
            $zip->close();
        } else {
            return $app->error( "Failed to pull theme from '%s'.", $branch_url );
        }
        $items = scandir( $extractPath );
        foreach ( $items as $theme ) {
            if ( strpos( $theme, '.' ) === 0 ) continue;
            $extractPath = $extractPath . DS . $theme;
            break;
        }
        $paths = [];
        $dir_quoted = preg_quote( $extractPath, '/' );
        PTUtil::file_find( $extractPath, $files, $dirs, true );
        foreach ( $files as $file ) {
            if ( in_array( basename( $file ), $gitignore ) ) {
                continue;
            }
            $relative = preg_replace( "/^{$dir_quoted}/", '', $file );
            $relative = ltrim( $relative, '/\\' );
            $comp = preg_replace( "/^{$dir_quoted}/", $theme_path, $file );
            $repos_file = !$this->_is_binary( $file ) ? $app->fmgr->get( $file ) : '';
            if (! $app->fmgr->exists( $comp ) ) {
                $paths[ $relative ] = ['status' => 'Delete', 'repos_file' => $repos_file,
                                       'theme_file' => $theme_file, 'md5' => md5( $relative ) ];
            } else if ( md5_file( $comp ) != md5_file( $file ) ) {
                $theme_file = !$this->_is_binary( $comp ) ? $app->fmgr->get( $comp ) : '';
                $paths[ $relative ] = ['status' => 'Update', 'repos_file' => $repos_file,
                                       'theme_file' => $theme_file, 'md5' => md5( $relative ) ];
            }
        }
        $theme_quoted = preg_quote( $theme_path, '/' );
        PTUtil::file_find( $theme_path, $theme_files, $theme_dirs, true );
        foreach ( $theme_files as $file ) {
            if ( in_array( basename( $file ), $gitignore ) ) {
                continue;
            }
            $relative = preg_replace( "/^{$theme_quoted}/", '', $file );
            $relative = ltrim( $relative, '/\\' );
            if ( stripos( $relative, '.git/' ) === 0 || stripos( $relative, '.git\\' ) === 0 ) {
                continue;
            }
            $comp = preg_replace( "/^{$theme_quoted}/", $extractPath, $file );
            if (! $app->fmgr->exists( $comp ) ) {
                $repos_file = '';
                $theme_file = !$this->_is_binary( $file ) ? $app->fmgr->get( $file ) : '';
                $paths[ $relative ] = ['status' => 'New', 'repos_file' => $repos_file,
                                       'theme_file' => $theme_file, 'md5' => md5( $relative ) ];
            }
        }
        $params = ['theme_files' => $paths, 'branch_name' => $branch_name ];
        $params['page_title'] = $this->translate( "Update of theme '%s'", $theme_id );
        $params['page_title'] .= "<small><small>&nbsp;<a title=\"";
        $params['page_title'] .= $this->translate('View on GitHub') . "\" href=\"$repository\" target=\"_blank\">";
        $params['page_title'] .= "<em class=\"fa fa-external-link\" aria-hidden=\"true\"></em>";
        $params['page_title'] .= "<span class=\"sr-only\">{$repository}</span>";
        $params['page_title'] .= "</a></small></small>";
        echo $app->build_page( 'theme_files.tmpl', $params );
    }

    function open_theme_dir ( $app ) {
        $app->validate_magic( true );
        $workspace_id = (int)$app->param( 'workspace_id' );
        $theme = $app->get_config( 'theme', $workspace_id );
        $theme_class = new PTTheme;
        $theme_path = $theme_class->rel2abs( $theme->data );
        if ( $theme_path ) {
            $cmd = 'open ' . escapeshellarg( $theme_path );
            $res = shell_exec( $cmd );
            if ( $res === false ) {
                return $app->json_error( $this->translate( 'Could not open the folder.' ) );
            }
        } else {
            return $app->json_error( $this->translate( 'Could not open the folder.' ) );
        }
        header( 'Content-type: application/json' );
        echo json_encode( ['result' => true ] );
        exit();
    }

    function manage_theme ( $cb, $app, $param, $src, &$out ) {
        $tmpl = $app->ctx->get_template_path( 'github_commit_button.tmpl' );
        $tmpl = $app->ctx->build( $app->fmgr->get( $tmpl ) );
        $out = str_replace( '<!--Commit Update Files-->', $tmpl, $out );
    }

    function get_setting ( $app, $name, $theme_id, $workspace_id ) {
        if ( $name != 'gitignore' && $app->user()->github_account && $app->user()->github_token ) {
            $column = "github_{$name}";
            return $app->user()->$column;
        }
        $use_system_setting = $this->get_config_value( 'themegithub_use_system_setting' );
        if ( $use_system_setting ) {
            $config_id = 0;
        } else {
            $config_id = $workspace_id;
        }
        $column = "themegithub_{$name}";
        $setting = $this->get_config_value( $column, $config_id );
        if ( $setting ) {
            return $setting;
        }
        if ( $name == 'token' ) {
            $token = $app->db->model( 'option' )->get_by_key( ['workspace_id' => $workspace_id, 'extra' => $theme_id,
                                                               'key' => 'theme_setting', 'kind' => 'token'] );
            if ( $token->id && $token->value ) {
                return $token->value;
            }
        }
    }

    function _is_binary ( $file ) {
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

}