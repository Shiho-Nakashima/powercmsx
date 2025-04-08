<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class AppProperties extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function start_app ( &$app ) {
        $table = $app->get_table( 'app_property' );
        if (!$table ) return true;
        $ctx = $app->ctx;
        $blacklist = $this->get_blacklist( $app );
        $app_properties = $app->get_cache( 'app_properties__c' );
        if ( is_array( $app_properties ) ) {
        } else {
            $app_properties = $app->db->model( 'app_property' )->load_iter( [], [], 'name,value,type' );
            $app_properties = $app_properties->fetchAll( PDO::FETCH_NUM );
            $app->set_cache( 'app_properties__c', $app_properties );
        }
        if ( empty( $app_properties ) ) {
            return;
        }
        $requires_login = false;
        $properties = $app->properties;
        // Indirect modification of overloaded property Prototype::$properties has no effect.
        foreach ( $app_properties as $app_prop ) {
            list( $name, $value, $type ) = $app_prop;
            if ( in_array( $name, $blacklist ) ) continue;
            // String,Integer,Float(DOUBLE),Boolean,Array
            $name = trim( $name );
            $value = trim( $value );
            if ( $type === 'Array' ) {
                $value = preg_split( "/\s*,\s*/", $value );
            } else if ( $type === 'Integer' ) {
                $value = (int) $value;
                if ( $name === 'dir_perms' ) {
                    $dir_perms = octdec( sprintf ( '%04d', $value ) );
                    $app->fmgr->dir_perms = $dir_perms;
                } else if ( $name === 'file_perms' ) {
                    $file_perms = octdec( sprintf ( '%04d', $value ) );
                    $app->fmgr->file_perms = $file_perms;
                }
            } else if ( $type === 'Float(DOUBLE)' ) {
                $value = (float) $value;
            } else if ( $type === 'Boolean' ) {
                $value = ( $value == 'false' || $value == false ) ? false : true;
                if ( $name === 'debug' && $value ) {
                    error_reporting( E_ALL );
                    $app->db->debug = 4;
                } else if ( $name === 'strict_offset' && $value && !$app->strict_offset ) {
                    $app->strict_offset = true;
                    $app->db->strict_offset = true;
                }
            } else if ( $type === 'JSON' ) {
                $value = json_decode( $value, true );
            }
            if ( isset( $ctx->vars[ $name ] ) && stripos( 'user', $name ) !== 0 ) {
                $ctx->vars[ $name ] = $value;
            }
            if ( $name === 'sess_timeout' && $app->id === 'Prototype' && $app->user_session ) {
                $requires_login = true;
            } else if ( $name === 'tag_delimiter' ) {
                $ctx->inited = false;
                $ctx->compatible = $value;
                $ctx->init();
            } else if ( $name === 'memory_limit' ) {
                ini_set( 'memory_limit', $value );
            }
            if ( property_exists( $app, $name ) ) {
                $app->$name = $value;
            } else {
                $properties[ $name ] = $value;
            }
        }
        $app->properties = $properties;
        if ( $requires_login && $app->always_update_login ) {
            $sess = $app->user_session;
            if (! $sess->value ) {
                $cookie_name = $app->cookie_name;
                $cookie = $sess->name;
                $path = $app->cookie_path ? $app->cookie_path : $app->path;
                $expires = $app->sess_timeout;
                $app->bake_cookie( $cookie_name, $cookie, $expires, $path, true, $app->cookie_domain );
                $expires = $app->request_time + $app->sess_timeout;
                if ( $expires > $sess->expires ) {
                    $sess->expires( $expires );
                    $sess->save();
                }
            }
        }
        if ( $app->keywords_mecab_path || $app->simplifiedjapanese_mecab_path || $app->searchestraier_mecab_path ) {
            // Duplicate Settings.
            if ( $app->simplifiedjapanese_mecab_path ) {
                $mecab_path = $app->simplifiedjapanese_mecab_path;
                $app->keywords_mecab_path = $mecab_path;
                $app->searchestraier_mecab_path = $mecab_path;
            } else if ( $app->searchestraier_mecab_path ) {
                $mecab_path = $app->searchestraier_mecab_path;
                $app->keywords_mecab_path = $mecab_path;
                $app->simplifiedjapanese_mecab_path = $mecab_path;
            } else if ( $app->keywords_mecab_path ) {
                $mecab_path = $app->keywords_mecab_path;
                $app->simplifiedjapanese_mecab_path = $mecab_path;
                $app->searchestraier_mecab_path = $mecab_path;
            }
            if ( $app->searchestraier_estcmd_path ) {
                $estcmd_path = $app->searchestraier_estcmd_path;
                $app->simplifiedjapanese_estcmd_path = $estcmd_path;
                $app->keywords_estcmd_path = $estcmd_path;
            } else if ( $app->simplifiedjapanese_estcmd_path ) {
                $estcmd_path = $app->simplifiedjapanese_estcmd_path;
                $app->searchestraier_estcmd_path = $estcmd_path;
                $app->keywords_estcmd_path = $estcmd_path;
            } else if ( $app->keywords_estcmd_path ) {
                $estcmd_path = $app->keywords_estcmd_path;
                $app->searchestraier_estcmd_path = $estcmd_path;
                $app->simplifiedjapanese_estcmd_path = $estcmd_path;
            }
            $dic_path = null;
            if ( $app->simplifiedjapanese_mecab_dic_path ) {
                $dic_path = $app->simplifiedjapanese_mecab_dic_path;
                $app->keywords_mecab_dic_path = $dic_path;
            } else if ( $app->keywords_mecab_dic_path ) {
                $dic_path = $app->keywords_mecab_dic_path;
                $app->simplifiedjapanese_mecab_dic_path = $dic_path;
            }
            $dict_index_path = null;
            if ( $app->simplifiedjapanese_mecab_dict_index_path ) {
                $dict_index_path = $app->simplifiedjapanese_mecab_dict_index_path;
                $app->keywords_mecab_dict_index_path = $dict_index_path;
            } else if ( $app->keywords_mecab_dict_index_path ) {
                $dict_index_path = $app->keywords_mecab_dict_index_path;
                $app->simplifiedjapanese_mecab_dict_index_path = $dict_index_path;
            }
        }
    }

    function pre_save_app_property ( &$cb, $app, &$obj, $original ) {
        $name = strtolower( trim( $obj->name ) );
        $blacklist = $this->get_blacklist( $app );
        if ( in_array( $name, $blacklist ) ) {
            $cb['error'] = $this->translate( "The app property '%s' cannot be set.", $name );
            return false;
        } else if ( stripos( $name, '_path' ) !== false || stripos( $name, '_dir' ) !== false ) {
            $cb['error'] = $this->translate( "The app property '%s' cannot be set.", $name );
            return false;
        }
        $obj->name( $name );
        $value = trim( $obj->value );
        if ( $app->id === 'Prototype' && $app->param( 'value' ) !== '' && $app->mode === 'save' ) {
            // Before ver.3.07, From '0' to '' Bug Exists.
            $value= trim( $app->param( 'value' ) );
        }
        $obj->value( $value );
        if ( PTUtil::property_exists( $app, $name ) ) {
            $default = $app->$name;
            $default_type = gettype( $default );
            if ( $default_type  == 'array' && $obj->type !== 'JSON' ) {
                $obj->type( 'Array' );
                $default = implode( ', ', $default );
            } else if ( $default_type  == 'double' ) {
                $obj->type( 'Float(DOUBLE)' );
            } else if ( $default_type  == 'integer' ) {
                $obj->type( 'Integer' );
            } else if ( $default_type  == 'boolean' ) {
                $obj->type( 'Boolean' );
            }
            if ( $value === '' ) {
                $obj->value( $default );
            }
        }
        $value = $obj->value;
        if ( $obj->type == 'Boolean' ) {
            $value = ( $value == 'false' || $value == false ) ? 'false' : 'true';
            $obj->value( $value );
        } else if ( $obj->type == 'Float(DOUBLE)' ) {
            $obj->value( (float) $value );
        } else if ( $obj->type == 'Integer' ) {
            $obj->value( (int) $value );
        } else if ( $obj->type == 'JSON' ) {
            $json = json_decode( $obj->value );
            if ( json_last_error() ) {
                $cb['error'] = $this->translate( 'An error occurred while decoding JSON (%s).', json_last_error_msg() );
                return false;
            }
        }
        $app->clear_cache( 'app_properties__c' );
        if ( $name === 'allowed_domains' ) {
            $app->clear_cache( 'allowed_domains__c' );
        }
        return true;
    }

    function post_delete_app_property ( $cb, $app, &$obj, $original ) {
        $app->clear_cache( 'app_properties__c' );
        $name = strtolower( trim( $obj->name ) );
        if ( $name === 'allowed_domains' ) {
            $app->clear_cache( 'allowed_domains__c' );
        }
        return true;
    }

    function pre_save_table ( &$cb, $app, &$obj, $original ) {
        if ( $obj->name == 'app_property' && $obj->im_export ) {
            $cb['error'] = $this->translate( 'Importing and Exporting app properties is not allowed.' );
            return false;
        }
        return true;
    }

    function action_app_property_export ( $app, $objects, $action ) {
        $app->param( '_model', 'app_property' );
        $_REQUEST['_model'] = 'app_property';
        $app->param( 'itemset_export_select', '2' );
        $_REQUEST['itemset_export_select'] = '2';
        $class = new PTListActions();
        $class->export_objects( $app, $objects, $action );
    }

    function get_blacklist ( $app ) {
        $config_blacklist = isset( $app->registry['config_blacklist'] ) ? array_keys( $app->registry['config_blacklist'] ) : [];
        $blacklist = trim( file_get_contents( $this->path() . DS . 'blacklist' . DS . 'blacklist.txt' ) );
        $blacklist = explode( PHP_EOL, str_replace( ["\r\n", "\r"], PHP_EOL, $blacklist ) );
        $blacklist = array_merge( $blacklist, $config_blacklist );
        if (! $app->appproperties_allow_override ) {
            $config = $app->pt_dir . DS . 'config.json';
            if ( file_exists( $config ) ) {
                $config = json_decode( file_get_contents( $config ), true );
                $config_settings = isset( $config['config_settings'] ) ? $config['config_settings'] : [];
                unset( $config_settings['debug'] );
                $blacklist = array_merge( $blacklist, array_keys( $config_settings ) );
            }
        }
        if ( $app->id === 'Worker' ) {
            $blacklist[] = 'develop';
        }
        return $blacklist;
    }
}