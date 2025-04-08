<?php
    $normalizer = true;
    if (! function_exists( 'normalizer_normalize' ) ) {
        $normalizer = false;
    }
    require_once( __DIR__ . DIRECTORY_SEPARATOR .'class.Prototype.php' );
    $app = new Prototype( ['id' => 'CheckScript'] );
    $ts = $app->param( 'ts' );
    $can_flush = true;
    $this_url = $app->pt_check_url ? $app->pt_check_url
              : $app->base . $app->request;
    if (! $ts || ( time() - $ts ) > 15 ) {
        $url = $this_url . '?ts=' . time();
        ignore_user_abort( true );
        while( ob_get_level() ) { ob_end_clean() ; }
        $out = "\r\n";
        header( 'Content-Length: ' . strlen( $out ) );
        header( 'Connection: close' );
        header( 'Location: ' . $url, true, 302 );
        echo $out;
        flush();
        sleep( 10 );
        exit();
    } else {
        if ( ( time() - $ts ) > 9 ) {
            $can_flush = false;
        }
    }
    $error_messages = [];
    $config = __DIR__ . DS . 'config.json';
    $paml_version = $app->paml_version;
    $cfg_encrypt_key = null;
    $encrypt_dbpassword = null;
    if (! file_exists( $config ) ) {
        $error_messages[] = $app->translate( 'The configuration file config.json is missing.' );
    } else {
        $config = json_decode( file_get_contents( $config ), true );
        $paml_version = $config['config_settings']['paml_version'] ?? $app->paml_version;
        $cfg_encrypt_key = $config['config_settings']['cfg_encrypt_key'] ?? null;
        $encrypt_dbpassword = $config['config_settings']['encrypt_dbpassword'] ?? null;
    }
    require_once( LIB_DIR . 'Prototype' . DS .'class.PTUtil.php' );
    if ( file_exists( LIB_DIR . 'PAML' . DS .'class.paml' . $paml_version . '.php' ) ) {
        require_once( LIB_DIR . 'PAML' . DS .'class.paml' . $paml_version . '.php' );
    } else {
        require_once( LIB_DIR . 'PAML' . DS .'class.paml.php' );
    }
    $ctx = new PAML();
    $ctx->prefix = 'mt';
    $ctx->app = $app;
    $ctx->default_component = $app;
    $ctx->force_compile = true;
    $ctx->init();
    $cache_driver = $app->cache_driver;
    foreach ( $app->template_paths as $tmpl_dir ) {
        $ctx->include_paths[ $tmpl_dir ] = true;
    }
    $ctx->vars['appname'] = 'PowerCMS X';
    $ctx->vars['html_head'] = '<style>.nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: black !important; color: white !important; }</style>';
    $language = 'en';
    if ( isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
        $language = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
    $ctx->language = $language;
    $ctx->vars['user_language'] = $language;
    $app->ctx = $ctx;
    $locale_dir = __DIR__ . DS . 'locale';
    $locale = $locale_dir . DS . $language . '.json';
    if ( file_exists( $locale ) ) {
        $dict = json_decode( file_get_contents( $locale ), true );
        $app->dictionary[ $language ] = $dict;
    }
    $request_uri = $app->request_uri;
    if (! preg_match( '!^https{0,1}://!', $request_uri ) ) {
        $request_uri = $app->base . $request_uri;
    }
    $config_url = preg_replace( '![^/]*$!', '', $request_uri ) . 'config.json';
    $http_options = ['http' => ['timeout' => 5], 'ssl' => ['verify_peer' => false, 'verify_peer_name' => false ] ];
    $context = PTUtil::stream_context_create( $http_options );
    if (! $app->skip_config_check ) {
        $config_json = @file_get_contents( $config_url, false, $context );
        if ( $config_json !== false ) {
            $error_messages[] = $app->translate( "Please deny HTTP access to '%s'.", $config_url );
        }
    }
    if (! $can_flush ) {
        $error_messages[] = '<a href="https://www.php.net/manual/ja/function.flush.php" target="_blank">'
                          . $app->translate( 'The system output buffer could not be flushed.' )
                          . '<i class="fa fa-external-link" aria-hidden="true"></i></a>';
    }
    $warning_messages = [];
    $cfg = __DIR__ . DS . 'db-config.php';
    $db_connect = false;
    $db_create = false;
    $db_failed = false;
    $db_exists = false;
    $dbname    = '';
    include_once( $cfg );
    $max_allowed_packet = '';
    $pdo_mysql_version = '';
    $php_version = phpversion();
    $available = $php_version >= 7.1;
    if (! $available ) {
        $error_messages[] = $app->translate(
        'The version of PHP installed on your server (%s) is lower than the minimum supported version %s.',
        [ $php_version, '7.1' ] , null, $language);
    }
    $email = null;
    $send_email = false;
    if ( file_exists( $cfg ) ) {
        $dbhost = PADO_DB_HOST;
        $dbname = PADO_DB_NAME;
        $dbport = PADO_DB_PORT;
        if ( $cfg_encrypt_key && $encrypt_dbpassword ) {
            $dbpasswd = $app->decrypt( PADO_DB_PASSWORD, $cfg_encrypt_key );
        } else {
            $dbpasswd = PADO_DB_PASSWORD;
        }
        $dbcharset = 'utf8mb4';
        $dsn = "mysql:host={$dbhost};charset={$dbcharset};port={$dbport}";
        try {
            require_once( LIB_DIR . 'PADO' . DS . 'class.pado.php' );
            $pado = new PADO();
            $app->db = $pado;
            $dbh = new PDO( $dsn , PADO_DB_USER, $dbpasswd );
            $db_connect = true;
            if ( $max_packet = $app->max_packet ) {
                $max_packet = (int) $max_packet;
                $sql = "SHOW VARIABLES LIKE 'max_allowed_packet'";
                $max_allowed_packet = $dbh->query( $sql )->fetchAll();
                if ( isset( $max_allowed_packet[0] ) ) {
                    $max_allowed_packet = (int) $max_allowed_packet[0]['Value'];
                    if ( $max_allowed_packet < $max_packet ) {
                        $sql = "SET GLOBAL MAX_ALLOWED_PACKET = {$max_packet}";
                        $sth = $dbh->prepare( $sql );
                        $sth->execute();
                    }
                }
            }
            $sql = "SHOW VARIABLES LIKE 'max_allowed_packet'";
            $max_allowed_packet = $dbh->query( $sql )->fetchAll();
            if ( isset( $max_allowed_packet[0] ) ) {
                $max_allowed_packet = $max_allowed_packet[0]['Value'];
                if ( $max_allowed_packet && ctype_digit( (string) $max_allowed_packet ) ) {
                    $max_allowed_packet = $max_allowed_packet / 1024 /1024;
                    $max_allowed_packet = (int) $max_allowed_packet;
                } else if ( stripos( $max_allowed_packet, 'MB' ) !== false ) {
                    $max_allowed_packet = str_replace( 'MB', '', strtoupper( $max_allowed_packet ) );
                }
            }
            $pdo_mysql_version = $dbh->query('select version()')->fetchColumn();
            if ( stripos( $pdo_mysql_version, 'MariaDB' ) === false && $pdo_mysql_version <= 5.5 ) {
                $error_messages[] = $app->translate( 'The version of MySQL installed on your server (%s) is lower than the minimum supported version %s.', [ $pdo_mysql_version, '5.6' ], null, $language );
            }
            $pdo_mysql_version = preg_replace( '/[^0-9\.]/', '', $pdo_mysql_version );
            $pdo_mysql_versions = explode( '.', $pdo_mysql_version );
            $mysql_version = $pdo_mysql_versions[0] . '.' . $pdo_mysql_versions[1];
            if ( $mysql_version == 5.6 ) {
                $error_messages[] = $app->translate( 'MySQL version %s is installed, but be aware of some settings such as collation.', $pdo_mysql_version );
            }
            $show = "SHOW DATABASES LIKE '{$dbname}'";
            $res = $dbh->query( $show );
            $res = $res->fetchAll();
            if ( empty( $res ) ) {
                $sql = "CREATE DATABASE IF NOT EXISTS {$dbname}";
                $charset = defined( 'PADO_DB_CHARSET' ) ? PADO_DB_CHARSET : $pado->dbcharset;
                if ( $charset ) $sql .= ' CHARACTER SET ' . $charset;
                $collation = defined( 'PADO_DB_COLLATION' ) ? PADO_DB_COLLATION : $pado->collation;
                if ( $collation ) $sql .= ' COLLATE ' . $collation;
                try {
                    $res = $dbh->query( $sql );
                    $db_create = true;
                } catch ( PDOException $e ) {
                    $db_failed = true;
                }
            }
            $res = $dbh->query( $show );
            $res = $res->fetchAll();
            if ( empty( $res ) ) {
                $db_exists = false;
                $error_messages[] = $app->translate( "The connection to MySQL was successful but database '%s' does not exists.", $app->escape( $dbname ) );
            } else {
                $db_exists = true;
                $tbl_name = DB_PREFIX . 'table';
                $pcmsx_table = $dbh->query("SHOW TABLES FROM `{$dbname}` LIKE '{$tbl_name}'")->fetchColumn();
                if ( $pcmsx_table !== false && $pcmsx_table == $tbl_name ) {
                    $app->init();
                    $app->ctx = $ctx;
                    $ctx->vars['already_installed'] = 1;
                    if ( $app->user() && $app->user()->is_superuser ) {
                        $msg = '';
                        $email = $app->system_email( $msg );
                        if (! $email ) {
                            $error_messages[] = $app->translate( 'System Email Address is not set in System.' );
                        } else {
                            if ( $app->pt_check_test_email ) {
                                $headers = ['From' => $email ];
                                $subject = $app->translate( 'Test email from PowerCMS X' );
                                $body = $app->translate( 'This is the test email sent by PowerCMS X.' );
                                $send_email = PTUtil::send_mail( $app->user()->email, $subject, $body, $headers );
                                if (! $send_email ) {
                                    $error_messages[] = $app->translate( 'An error occurred while sending test mail.' );
                                } else {
                                    $email = $app->user()->email;
                                }
                            }
                        }
                    } else {
                        $ctx->vars['already_installed'] = 1;
                        $ctx->vars['do_not_show_result'] = 1;
                        $app->print( $app->build_page( 'pt_check.tmpl' ) );
                    }
                }
            }
        } catch ( PDOException $e ) {
            $error_messages[] = $app->translate( 'MySQL connection failed( %s ).', $e->getMessage() );
        }
    } else {
        $error_messages[] = $app->translate( 'MySQL connection check was skipped because db-config.php does not exist.' );
    }
    ob_start();
    phpinfo();
    $res = ob_get_clean();
    $locale_dir = __DIR__ . DS . 'locale';
    $locale = $locale_dir . DS . $language . '.json';
    if ( file_exists( $locale ) ) {
        $dict = json_decode( file_get_contents( $locale ), true );
        $app->dictionary[ $language ] = $dict;
    }
    $config = __DIR__ . DS . 'config.json';
    if ( file_exists( $config ) ) {
        $app->configure_from_json( $config );
    }
    if ( $app->temp_dir === '/tmp' ) {
        $warning_messages[] = $app->translate( "It is recommended that the environment variable 'temp_dir' be changed from '/tmp'." );
    }
    if (! $app->log_dir ) $app->log_dir = __DIR__ . DS . 'log';
    if (! $app->support_dir ) $app->support_dir = __DIR__ . DS . 'support';
    $cache_dir = $app->cache_dir;
    if (! $cache_dir ) {
        if ( $app->temp_dir != '/tmp' ) {
            $cache_dir = rtrim( $app->temp_dir, DS ) . DS
                       . 'com.alfasado.powercmsx' . DS . md5( $app->pt_path );
        } else if ( $app->support_dir ) {
            $cache_dir = $app->support_dir . DS . 'cache';
        } else {
            $cache_dir = __DIR__ . DS . 'cache';
        }
    } else {
        $cache_dir = rtrim( $cache_dir, DS );
    }
    $app->cache_dir = $cache_dir;
    $directries = [ $app->log_dir, $app->support_dir ];
    if ( $app->cache_dir ) {
        $directries[] = $app->cache_dir;
    }
    if ( $app->compile_dir ) {
        $directries[] = $app->compile_dir;
    }
    if ( defined( 'PADO_DB_BLOB2FILE' ) && defined( 'PADO_DB_BLOBPATH' ) ) {
        $directries[] = PADO_DB_BLOBPATH;
    }
    require_once( 'class.' . $app->file_mgr . '.php' );
    $fmgr = new $app->file_mgr;
    foreach ( $directries as $directry ) {
        if (! $directry ) {
            continue;
        }
        if (! is_dir( $directry ) ) {
            $fmgr->mkpath( $directry );
        }
        if (! is_writable( $directry ) ) {
            $error_messages[] = $app->translate( "Cannot write to direcroty'%s'.", $directry );
        } else {
            $tempnam = tempnam( $directry, 'pt_' );
            $put = file_put_contents( $tempnam, '.' );
            if ( $put === false ) {
                $error_messages[] = $app->translate( "Cannot write to direcroty'%s'.", $directry );
            } else {
                unlink( $tempnam );
            }
        }
    }
    $ctx->vars['page_title'] = $app->translate( 'PowerCMS X System Check', '', null, $language );
    if ( $cache_driver == 'APCu' ) {
        $enable_cli = ini_get( 'apc.enable_cli' );
        if (! $enable_cli ) {
            $warning_messages[] = $app->translate( "Set PHP Runtime Configuration 'apc.enable_cli' to \"1\"." );
        }
    }
    $lib = LIB_DIR . 'simple_html_dom' . DS . 'simple_html_dom.php';
    require_once( $lib );
    $parser = str_get_html( $res );
    $elements = $parser->find( 'a[name=module_mbstring]' );
    $mbstring = false;
    $mbstring_version = '';
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'mbstring' ) {
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'multibyte support' && $value == 'enabled' ) {
                    $mbstring = true;
                } else if ( $name == 'libmbfl version' ) {
                    $mbstring_version = trim( $th->plaintext ) . ' ' . $value;
                }
            }
        }
    }
    if (! $mbstring && ! extension_loaded( 'mbstring' ) ) {
        $error_messages[] = $app->translate( '%s is not enabled.', 'mbstring' );
    } else {
        $mbstring = true;
    }
    $elements = $parser->find( 'a[name=module_dom]' );
    $dom = false;
    $libxml_version = '';
    $libxml_version_ok = false;
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'dom' ) {
            $dom = true;
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'dom/xml' && $value != 'enabled' ) {
                    $error_messages[] = $app->translate( '%s is not enabled.', 'DOM/XML' );
                    $dom = false;
                }
                if ( $name == 'libxml version' ) {
                    $libxml_version = $value;
                    $libxml_version = $value;
                    if ( version_compare( $value, '2.7.8', '<' ) ) {
                        $error_messages[] = $app->translate( 'libxml Version 2.7.8 or greater is needed.' );
                        $dom = false;
                    } else {
                        $libxml_version_ok = true;
                    }
                }
                if ( $name == 'html support' && $value != 'enabled' ) {
                    $dom = false;
                    $error_messages[] = $app->translate( '%s is not enabled.', 'HTML Support' );
                }
            }
        }
    }
    if (! $dom ) {
        $error_messages[] = $app->translate( '%s is not enabled.', 'dom' );
    }
    $elements = $parser->find( 'a[name=module_pdo_mysql]' );
    $pdo_mysql = false;
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'pdo_mysql' ) {
            $pdo_mysql = true;
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'pdo driver for mysql' && $value != 'enabled' ) {
                    $error_messages[] = $app->translate( '%s is not enabled.', 'PDO MySQL' );
                    $pdo_mysql = false;
                    break;
                }
            }
        }
    }
    if (! $pdo_mysql ) {
        $error_messages[] = $app->translate( '%s is not enabled.', 'PDO MySQL' );
    }
    $elements = $parser->find( 'a[name=module_json]' );
    $json = false;
    $json_version = '';
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'json' ) {
            $json = true;
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'json support' && $value != 'enabled' ) {
                    $error_messages[] = $app->translate( '%s is not enabled.', 'json' );
                    $json = false;
                }
                if ( $name == 'json version' ) {
                    $json_version = $value;
                }
            }
        }
    }
    if (! $json ) {
        $error_messages[] = $app->translate( '%s is not enabled.', 'json' );
    }
    $elements = $parser->find( 'a[name=module_simplexml]' );
    $simplexml = false;
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'simplexml' ) {
            $simplexml = true;
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'simplexml support' && $value != 'enabled' ) {
                    $simplexml = false;
                    break;
                }
            }
        }
    }
    if (! $simplexml ) {
        $error_messages[] = $app->translate( '%s is not enabled.', 'SimpleXML' );
    }
    $elements = $parser->find( 'a[name=module_gd]' );
    $gd = false;
    $gd_supports = [];
    $gd_version = '';
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'gd' ) {
            $gd = true;
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'gd support' && $value != 'enabled' ) {
                    $gd = false;
                    break;
                }
                if ( $name == 'gif read support' && $value == 'enabled' ) {
                    $gd_supports[] = 'gif';
                }
                if ( $name == 'jpeg support' && $value == 'enabled' ) {
                    $gd_supports[] = 'jpeg';
                }
                if ( $name == 'png support' && $value == 'enabled' ) {
                    $gd_supports[] = 'png';
                }
                if ( $name == 'gd version' ) {
                    $gd_version = $value;
                } else if ( $name == 'gd library version' ) {
                    $gd_version = $value;
                }
                if ( $name == 'freetype support' ) {
                    $gd_supports[] = 'freetype';
                }
                if ( $name == 'wbmp support' ) {
                    $gd_supports[] = 'wbmp';
                }
                if ( $name == 'xpm support' ) {
                    $gd_supports[] = 'xpm';
                }
                if ( $name == 'xbm support' ) {
                    $gd_supports[] = 'xbm';
                }
                if ( $name == 'webp support' ) {
                    $gd_supports[] = 'webp';
                }
            }
        }
    }
    if (! $gd ) {
        $error_messages[] = $app->translate( '%s is not enabled.', 'gd' );
    } else {
        if ( !in_array( 'jpeg', $gd_supports ) ) {
            $error_messages[] = $app->translate( '%s is not enabled.', 'GD JPEG Support' );
        }
        if ( !in_array( 'png', $gd_supports ) ) {
            $error_messages[] = $app->translate( '%s is not enabled.', 'GD PNG Support' );
        }
    }
    $elements = $parser->find( 'a[name=module_zip]' );
    $zip = false;
    $zip_version = '';
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'zip' ) {
            $zip = true;
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'zip' && $value != 'enabled' ) {
                    $zip = false;
                }
                if ( $name == 'zip version' ) {
                    $zip_version = $value;
                }
            }
        }
    }
    if (! $zip ) {
        $error_messages[] = $app->translate( '%s is not enabled.', 'zip' );
    }
    $elements = $parser->find( 'a[name=module_curl]' );
    $curl = false;
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'curl' ) {
            $curl = true;
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'cURL support' && $value != 'enabled' ) {
                    $curl = false;
                }
                break;
            }
        }
    }
    if (! $zip ) {
        $error_messages[] = $app->translate( '%s is not enabled.', 'curl' );
    }
    $elements = $parser->find( 'a[name=module_zend+opcache]' );
    $opcache = false;
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'zend opcache' ) {
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'opcode caching' ) {
                    if ( $value == 'up and running' ) {
                        $opcache = true;
                    }
                }
            }
        }
    }
    if (! $opcache ) {
        $warning_messages[] = $app->translate( '%s is not enabled.', 'OPCache' )
                            . $app->translate( 'This extension is not required.' );
    }
    $elements = $parser->find( 'a[name=module_memcached]' );
    $memcached = false;
    $memcached_version = '';
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'memcached' ) {
            $memcached = true;
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'memcached support' && $value != 'enabled' ) {
                    $memcached = false;
                }
                if ( $name == 'version' ) {
                    $memcached_version = $value;
                }
            }
        }
    }
    if (! $memcached ) {
        $warning_messages[] = $app->translate( '%s is not enabled.', 'memcached' )
                            . $app->translate( 'This extension is not required.' );
    }
    $elements = $parser->find( 'a[name=module_xdebug]' );
    $xdebug = false;
    $xdebug_version = '';
    foreach ( $elements as $element ) {
        if ( trim( strtolower( $element->plaintext ) ) == 'xdebug' ) {
            $table = $element->parentNode()->nextSibling()->childNodes();
            foreach ( $table as $cell ) {
                $th = $cell->firstChild();
                $td = $th->nextSibling();
                $name = strtolower( trim( $th->plaintext ) );
                $value = strtolower( trim( $td->plaintext ) );
                if ( $name == 'xdebug support' ) {
                    if ( $value == 'enabled' ) {
                        $xdebug = true;
                    }
                } else if ( $name == 'version' ) {
                    $xdebug_version = $value;
                }
            }
        }
    }
    if ( $xdebug ) {
        $warning_messages[] = $app->translate( '%s is enabled.', 'xdebug' )
                            . $app->translate( 'This extension is not recommended because it slows down processing speed.' );
    }
    $max_input_vars = ini_get( 'max_input_vars' );
    if ( $max_input_vars < 2000 ) {
        $warning_messages[] = $app->translate( "( %s ) '%s' recommended value is %s or more.", ['php.ini', 'max_input_vars', 2000 ] );
    }
    if ( $max_allowed_packet && $max_allowed_packet < 16 ) {
        $warning_messages[] = $app->translate( "( %s ) '%s' recommended value is %s or more.", ['MySQL', 'max_allowed_packet', '16MB' ] );
    }
    $post_max_size = ini_get( 'post_max_size' );
    $upload_max_filesize = ini_get( 'upload_max_filesize' );
    $max_packet = PTUtil::return_bytes( "{$max_allowed_packet}M" );
    $post_max_size = PTUtil::return_bytes( $post_max_size );
    $upload_max_filesize = PTUtil::return_bytes( $upload_max_filesize );
    $upload_limit = [ $max_packet, $post_max_size, $upload_max_filesize ];
    $upload_limit = min( $upload_limit );
    $upload_size_limit = $app->upload_size_limit;
    if ( $upload_limit < $upload_size_limit ) {
        $upload_size_limit = $upload_limit;
    }
    if (! $normalizer ) {
        $warning_messages[] = $app->translate( '%s is not enabled.', 'normalizer' )
                            . $app->translate( 'This extension is not required.' );
    }
    if ( $app->imagick_convert_path || function_exists( 'imagecreatefromwebp' ) ) {
    } else {
        $warning_messages[] = $app->translate( "WebP format image is not supported." );
    }
    $system_info_url = $app->system_info_url;
    $powercmsx_auth  = $app->powercmsx_auth;
    if ( $system_info_url && $powercmsx_auth ) {
        $config_url = preg_replace( '![^/]*$!', '', $request_uri ) . 'config.json';
        $http_options = ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false ] ];
        $context = PTUtil::stream_context_create( $http_options );
        $config_json = @file_get_contents( $config_url, false, $context );
        if ( $config_json !== false ) {
            $error_messages[] = $app->translate( "Please deny HTTP access to '%s'.", $config_url );
        }
        $options = ['http' => ['timeout' => 10], 'ssl' => ['verify_peer' => false, 'verify_peer_name' => false ] ];
        $basic = ['Authorization: Basic ' . base64_encode( $powercmsx_auth )];
        $options['http']['header'] = $basic;
        $context = PTUtil::stream_context_create( $options );
        $content = @file_get_contents( 'https://powercmsx.jp/information/dashboard.html', false, $context );
        if ( $content === false ) {
            $warning_messages[] = $app->translate( 'Could not get external server data with file_get_contents function.' );
        }
    }
    $plugin_messages = [];
    $cmd = '/usr/local/bin/lftp';
    if ( $app->mirroring_lftp_path ) {
        $cmd = $app->mirroring_lftp_path;
    }
    $cmd = escapeshellcmd( $cmd );
    $output = [];
    $return_var = '';
    $test = "{$cmd} -h";
    exec( $test, $output, $return_var );
    if ( $return_var !== 0 ) {
        $msg = $app->translate( "Can't execute command '%s' from PHP.", $app->escape( $cmd ) );
        $msg .= $app->translate( "This is not required, but requires the plugin '%s'.", 'Mirroring' );
        $plugin_messages[] = $msg;
    }
    $cmd = '/usr/local/bin/estcmd';
    if ( $app->searchestraier_estcmd_path ) {
        $cmd = $app->searchestraier_estcmd_path;
    }
    $cmd = escapeshellcmd( $cmd );
    $output = [];
    $return_var = '';
    $test = "{$cmd} version";
    exec( $test, $output, $return_var );
    if ( $return_var !== 0 ) {
        $msg = $app->translate( "Can't execute command '%s' from PHP.", $app->escape( $cmd ) );
        $msg .= $app->translate( "This is not required, but requires the plugin '%s'.", 'SearchEstraier' );
        $plugin_messages[] = $msg;
    }
    $admin_url = $app->cfg_admin_url;
    if (! $admin_url ) {
        $admin_url = dirname( $app->script_uri ) . '/index.php';
    }
    $error_messages = array_unique( $error_messages );
    $warning_messages = array_unique( $warning_messages );
    $ctx->vars['this_url'] = $this_url;
    $ctx->vars['admin_url'] = $admin_url;
    $ctx->vars['error_messages'] = $error_messages;
    $ctx->vars['warning_messages'] = $warning_messages;
    $ctx->vars['plugin_messages'] = $plugin_messages;
    $ctx->vars['php_version'] = $php_version;
    $ctx->vars['version_ok'] = $available;
    $ctx->vars['send_email'] = $send_email;
    $ctx->vars['email'] = $email;
    $ctx->vars['mbstring'] = $mbstring;
    $ctx->vars['mbstring_version'] = $mbstring_version;
    $ctx->vars['libxml_version_ok'] = $libxml_version_ok;
    $ctx->vars['libxml_version'] = $libxml_version;
    $ctx->vars['pdo_mysql'] = $pdo_mysql;
    $ctx->vars['pdo_mysql_version'] = $pdo_mysql_version;
    $ctx->vars['json'] = $json;
    $ctx->vars['json_version'] = $json_version;
    $ctx->vars['simplexml'] = $simplexml;
    $ctx->vars['gd'] = $gd;
    $ctx->vars['gd_version'] = $gd_version;
    $ctx->vars['gd_supports'] = $gd_supports;
    $ctx->vars['zip'] = $zip;
    $ctx->vars['zip_version'] = $zip_version;
    $ctx->vars['curl'] = $curl;
    $ctx->vars['opcache'] = $opcache;
    $ctx->vars['memcached'] = $memcached;
    $ctx->vars['memcached_version'] = $memcached_version;
    $ctx->vars['xdebug'] = $xdebug;
    $ctx->vars['xdebug_version'] = $xdebug_version;
    $ctx->vars['max_input_vars'] = $max_input_vars;
    $ctx->vars['db_connect'] = $db_connect;
    $ctx->vars['db_create'] = $db_create;
    $ctx->vars['db_failed'] = $db_failed;
    $ctx->vars['db_exists'] = $db_exists;
    $ctx->vars['dbname'] = $app->escape( $dbname );
    $ctx->vars['normalizer'] = $normalizer;
    $ctx->vars['post_max_size'] = $post_max_size;
    $ctx->vars['upload_max_filesize'] = $upload_max_filesize;
    $ctx->vars['max_allowed_packet'] = $max_allowed_packet;
    $ctx->vars['upload_size_limit'] = $upload_size_limit;
    $app->print( $app->build_page( 'pt_check.tmpl' ) );
