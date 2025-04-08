<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

if (! defined( 'POSTONTWITTER_API_VERSION' ) ) {
    $phpversion = explode( '.', phpversion() );
    $phpversion = $phpversion[0];
    if ( $phpversion >= 8 ) {
        define( 'POSTONTWITTER_API_VERSION', 2 );
    } else {
        define( 'POSTONTWITTER_API_VERSION', 1 );
    }
}
if ( POSTONTWITTER_API_VERSION == 2 ) {
    require_once( __DIR__ . DS . 'lib' . DS . 'ca-bundle-1.3.4' . DS . 'src' . DS . 'CaBundle.php' );
    require_once( __DIR__ . DS . 'lib' . DS . 'twitteroauth-4.0.1' . DS . 'autoload.php' );
} else {
    require_once( __DIR__ . DS . 'lib' . DS . 'twitteroauth' . DS . 'autoload.php' );
}

use Abraham\TwitterOAuth\TwitterOAuth;

class PostOnTwitter extends PTPlugin {

    public $upgrade_functions = [ ['version_limit' => 1.1, 'method' => 'change_column_name'] ];

    const EXCLUDE_MODELS = [
        'asset', 'attachmentfile', 'boilerplate', 'contact', 'displayoption',
        'field', 'fieldtype', 'log', 'menu', 'permission', 'phrase', 'question',
        'questiontype', 'queue', 'remote_ip', 'role', 'table', 'template',
        'ts_job', 'urlinfo', 'urlmapping', 'widget', 'workflow', 'workspace',
    ];

    const CUSTOM_PERMISSIONS = [
        ['name'  => 'can_twitter_account',
         'label' => 'Link to a 𝕏 account'],
    ];

    private $tweet_objects = [];
    private $do_update_all_target_models = false;

    public function __construct () {
        parent::__construct();
    }

    public function start_app ( $app ) {
        foreach ( self::CUSTOM_PERMISSIONS as $permission ) {
            $app->permissions[] = $permission['name'];
        }
    }

    public function activate ( $app, $plugin, $version, &$errors ) {
        return $this->add_custom_permissions( $app, $plugin, $version, $errors );
    }

    public function deactivate ( $app, $plugin, $version, &$errors ) {
        return $this->remove_custom_permissions( $app, $plugin, $version, $errors );
    }

    public function change_column_name ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'role' );
        foreach ( self::CUSTOM_PERMISSIONS as $permission ) {
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => $permission['name']] );
            if ( $column->id ) {
                $column->label( $permission['label'] );
                $column->save();
            }
        }
        return true;
    }

    private function add_custom_permissions ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'role' );
        $order = 5000;
        $upgrade = false;
        $upgrader = new PTUpgrader;
        foreach ( self::CUSTOM_PERMISSIONS as $permission ) {
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => $permission['name']] );
            if (! $column->id ) {
                $order++;
                $values = ['type' => 'tinyint', 'label' => $permission['label'], 'index' => 1,
                           'size' => 4, 'order' => $order, 'edit' => 'checkbox', 'list' => 'checkbox', 'not_null' => 0];
                $upgrader->make_column( $table, $permission['name'], $values, false );
                $upgrade = true;
            }
        }
        if ( $upgrade ) {
            $upgrader->upgrade_scheme( 'role' );
        }
        return true;
    }

    public function remove_custom_permissions ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'role' );
        $upgrade = false;
        foreach ( self::CUSTOM_PERMISSIONS as $permission ) {
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => $permission['name']] );
            if ( $column->id ) {
                $column->remove();
                $upgrade = true;
            }
        }
        if ( $upgrade ) {
            $upgrader = new PTUpgrader;
            $upgrader->upgrade_scheme( 'role' );
        }
        return true;
    }

    public function can_link_twitter_account ( $app, $workspace, $menu ) {
        $workspace_id = $workspace ? (int) $workspace->id : 0;
        $enabled = $this->get_config_value( 'enabled', $workspace_id );
        if (! $enabled ) {
            return false;
        }
        $api_keys = $this->get_api_keys();
        if (! $api_keys ) {
            return false;
        }
        return true;
    }

    public function method_link_twitter_account ( $app ) {
        $api_keys = $this->get_api_keys();
        if (! $api_keys ) {
            return $app->error( $this->translate( 'API Key is not set.' ) );
        }
        $ctx = $app->ctx;
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $ctx->stash( 'workspace', $app->workspace() );
        if ( $app->request_method === 'POST' ) {
            $app->validate_magic();
            $unlink_account = $app->param( 'unlink_twitter_account' );
            $save_settings = [];
            $save_settings['use_base_access_token'] = $app->param( 'setting_use_base_access_token' );
            $save_settings['account_name']          = $unlink_account ? '' : $app->param( 'setting_account_name' );
            $save_settings['access_token']          = $unlink_account ? '' : $app->param( 'setting_access_token' );
            $save_settings['access_token_secret']   = $unlink_account ? '' : $app->param( 'setting_access_token_secret' );
            foreach ( $save_settings as $key => $value ) {
                $this->set_config_value( $key, $value, $workspace_id );
            }
            $redirect_params = ['__mode' => 'link_twitter_account', 'saved' => 1];
            if ( $workspace_id ) {
                $redirect_params['workspace_id'] = $workspace_id;
            }
            $app->redirect( $app->admin_url . '?' . http_build_query( $redirect_params ) );
        }
        return $app->build_page( 'link_twitter_account.tmpl' );
    }

    public function post_init( $app ) {
        if (! $app->db ) return;
        if ( $app->id === 'Prototype' || $app->id === 'Worker' ) {
            $app->db->register_callback( 'meta', 'save_filter', 'db_save_filter_meta', 100, $this );
            $all_target_models = $this->get_config_value( 'all_target_models', 0 );
            $all_target_models = preg_split( '/\s*,\s*/u', $all_target_models );
            foreach ( $all_target_models as $model ) {
                if ( $model !== '' ) {
                    if ( $app->id === 'Prototype' ) {
                        $app->register_callback( $model, 'before_save', 'before_save_tweet_model', 5, $this );
                    } else if ( $app->id === 'Worker' ) {
                        $app->register_callback( $model, 'scheduled_replacement', 'scheduled_replacement_tweet_model', 5, $this );
                    }
                }
            }
        }
    }

    public function db_save_filter_meta ( $cb, $pado, $obj ) {
        $app = Prototype::get_instance();
        if ( $app->mode === 'clone_object' || $app->param( '_duplicate' ) === '1' ) {
            $plugin_id = strtolower( get_class( $this ) );
            if ( $obj->kind === $plugin_id ) {
                return false;
            }
        }
        return true;
    }

    public function before_save_tweet_model ( &$cb, $app, $obj, $original, $clone_org ) {
        $app->get_scheme_from_db( $obj->_model );
        $workspace_id = 0;
        if ( $obj->has_column( 'workspace_id' ) ) {
            $workspace_id = (int) $obj->workspace_id;
        }
        if (! $this->is_tweet_model( $obj->_model, $workspace_id ) ) {
            return true;
        }
        $tweeted_on = $this->load_meta( $obj, 'tweeted_on', true );
        if ( $tweeted_on && $tweeted_on->id && $tweeted_on->value ) {
            return true;
        }
        $do_tweet_value = $app->param( 'do_tweet' );
        if ( $do_tweet_value !== '0' && $do_tweet_value !== '1' ) {
            return true;
        }
        $do_tweet = $this->load_meta( $obj, 'do_tweet' );
        if ( $do_tweet ) {
            if ( $do_tweet->id ) {
                if ( $do_tweet->value != $do_tweet_value ) {
                    $do_tweet->value( $do_tweet_value );
                    $do_tweet->save();
                }
            } else {
                $do_tweet->value( $do_tweet_value );
                $do_tweet->save();
            }
        }
        return true;
    }

    public function scheduled_replacement_tweet_model ( &$cb, $app, $obj, $original ) {
        $app->get_scheme_from_db( $obj->_model );
        $workspace_id = 0;
        if ( $obj->has_column( 'workspace_id' ) ) {
            $workspace_id = (int) $obj->workspace_id;
        }
        if (! $this->is_tweet_model( $obj->_model, $workspace_id ) ) {
            return true;
        }
        $original_tweeted_on = $this->load_meta( $original, 'tweeted_on' );
        if (
            $original_tweeted_on
         && $original_tweeted_on->id
         && $original_tweeted_on->value
        ) {
            // Set original meta values
            $tweeted_on = $this->load_meta( $obj, 'tweeted_on' );
            $tweeted_on->value( $original_tweeted_on->value );
            $tweeted_on->save();
            $do_tweet = $this->load_meta( $obj, 'do_tweet' );
            $do_tweet->value( 1 );
            $do_tweet->save();
            // Delete Tweet Queue
            if (
                isset( $this->tweet_objects[$obj->_model] )
             && isset( $this->tweet_objects[$obj->_model][$obj->id] )
            ) {
                unset( $this->tweet_objects[$obj->_model][$obj->id] );
            }
        }
        return true;
    }

    public function start_mode ( $app ) {
        $plugin_id = strtolower( get_class( $this ) );
        if (
            $app->id === 'Prototype'
         && $app->mode === 'manage_plugins'
         && $app->param( 'edit_settings' )
         && $app->param( 'plugin_id' ) === $plugin_id
        ) {
            $workspace = $app->workspace();
            $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;
            $app->ctx->vars['candidate_models_space'] = $this->get_has_urlmapping_models( $workspace_id );
            $app->ctx->vars['candidate_models_all'] = $this->get_has_urlmapping_models();
        }
    }

    public function get_has_urlmapping_models ( int $workspace_id = null ) {
        $app = Prototype::get_instance();
        $terms = [];
        $join_terms = ['is_preferred' => 1, 'date_based' => ''];
        if ( is_int( $workspace_id ) ) {
            $join_terms['workspace_id'] = $workspace_id;
        }
        $args = [
            'unique' => 1,
            'join' => ['urlmapping', ['name', 'model', 'INNER JOIN'], $join_terms, 'model'],
            'sort' => 'order',
            'direction' => 'ASC'
        ];
        $_query_cache = $app->db->query_cache;
        $app->db->query_cache = false;
        $tables = $app->db->model( 'table' )->load( $terms, $args, 'name,label,order' );
        $app->db->query_cache = $_query_cache;
        $models = [];
        if ( is_array( $tables ) && count( $tables ) > 0 ) {
            foreach ( $tables as $table ) {
                if ( in_array( $table->name, self::EXCLUDE_MODELS ) ) {
                    continue;
                }
                $models[] = ['name' => $table->name, 'label' => $table->label];
            }
        }
        return $models;
    }

    public function pre_save_plugin_config ( &$cb, $app, $component, &$errors ) {
        $plugin_id = strtolower( get_class( $this ) );
        if ( $cb['plugin_id'] !== $plugin_id ) {
            return;
        }
        $workspace = $app->workspace();
        $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;

        // Unlink twitter account
        if ( $app->param( 'unlink_twitter_account' ) ) {
            $this->remove_param( 'setting_account_name' );
            $this->remove_param( 'setting_access_token' );
            $this->remove_param( 'setting_access_token_secret' );
        }

        // Unlink base twitter account
        if ( $app->param( 'unlink_base_twitter_account' ) ) {
            $this->remove_param( 'setting_base_account_name' );
            $this->remove_param( 'setting_base_access_token' );
            $this->remove_param( 'setting_base_access_token_secret' );
        }

        // Set the plugin setting "all_target_models".
        $this->remove_param( 'setting_all_target_models' );
        $this->update_all_target_models();
    }

    private function remove_param ( string $key = null ) {
        if (! $key ) {
            return;
        }
        if ( isset( $_GET ) && isset( $_GET[$key] ) ) {
            unset( $_GET[$key] );
        }
        if ( isset( $_POST ) && isset( $_POST[$key] ) ) {
            unset( $_POST[$key] );
        }
        if ( isset( $_REQUEST ) && isset( $_REQUEST[$key] ) ) {
            unset( $_REQUEST[$key] );
        }
    }

    public function update_all_target_models () {
        // Saved when the "take_down" callback is executed.
        $this->do_update_all_target_models = true;
    }

    private function get_all_target_models () {
        $app = Prototype::get_instance();
        $plugin_id = strtolower( get_class( $this ) );
        $models = '';
        $use_base = false;
        $options = $app->db->model( 'option' )->load( [
            'extra' => $plugin_id,
            'kind' => 'plugin_setting',
            'key' => ['OR' => [
                ['=' => 'enabled'],
                ['=' => 'use_base_target_models'],
                ['=' => 'target_models'],
            ]],
        ], [], 'key,value,workspace_id' );
        if ( is_array( $options ) && count( $options ) > 0 ) {
            $option_set = [];
            foreach ( $options as $option ) {
                if (! isset( $option_set[(int) $option->workspace_id] ) ) {
                    $option_set[(int) $option->workspace_id] = [];
                }
                $option_set[(int) $option->workspace_id][$option->key] = $option->value;
            }
            foreach ( $option_set as $option ) {
                if (! isset( $option['enabled'] ) || ! $option['enabled'] ) {
                    continue;
                }
                if (! isset( $option['use_base_target_models'] ) || $option['use_base_target_models'] ) {
                    $use_base = true;
                    continue;
                }
                if (! isset( $option['target_models'] ) || $option['target_models'] ) {
                    $models .= ',' . $option['target_models'];
                }
            }
        }
        if ( $use_base ) {
            if ( $models !== '' ) {
                $models .= ',';
            }
            $models .= $this->get_config_value( 'base_target_models', 0 );
        }
        if ( $models === '' ) {
            $models = [];
        } else {
            $models = preg_replace( '/,\s*,/u', ',', $models );
            $models = preg_replace( '/^\s*,\s*|\s*,\s*$/u', '', $models );
            $models = preg_split( '/\s*,\s*/u', $models );
            $models = array_unique( $models, SORT_STRING );
            sort( $models, SORT_NATURAL );
        }
        return $models;
    }

    public function take_down ( $app ) {
        if ( $this->do_update_all_target_models ) {
            $this->do_update_all_target_models = false;
            $all_target_models = $this->get_all_target_models();
            $all_target_models = implode( ',', $all_target_models );
            $this->set_config_value( 'all_target_models', $all_target_models, 0 );
        }
        if ( count( $this->tweet_objects ) > 0 ) {
            $plugin_id = strtolower( get_class( $this ) );
            $app->init_tags();
            $_local_vars = ['workspace', 'workspace_id',
                            'current_object', 'current_context'];
            foreach ( $this->tweet_objects as $model => $objects ) {
                if (! is_array( $objects ) ) {
                    continue;
                }
                $scheme = $app->get_scheme_from_db( $model );
                $table = $app->get_table( $model );
                if (! $table ) continue;
                $primary_col = $table->primary ?? '';
                $has_workspace_id = false;
                if ( $app->db->model( $model )->has_column( 'workspace_id' ) ) {
                    $has_workspace_id = true;
                }
                $local_vars = $_local_vars;
                $local_vars[] = $model;
                foreach ( $objects as $obj ) {
                    $urlmapping = $app->get_permalink( $obj, true, '*' );
                    $permalink  = $app->build_path_with_map( $obj, $urlmapping, $table, null, true );
                    if (! $permalink ) {
                        continue;
                    }
                    $ctx = clone $app->ctx;
                    $ctx->localize( $local_vars );
                    $ctx->vars = [];
                    $ctx->stash( $model, $obj );
                    $ctx->stash( 'current_object', $obj );
                    $ctx->stash( 'current_context', $model );
                    $workspace = null;
                    $workspace_id = 0;
                    if ( $has_workspace_id && $obj->workspace_id ) {
                        $workspace_id = (int) $obj->workspace_id;
                        $workspace = $app->db->model( 'workspace' )->load((int) $workspace_id);
                    }
                    if ( $workspace ) {
                        $ctx->stash( 'workspace', $workspace );
                        $ctx->stash( 'workspace_id', $workspace->id );
                    }
                    $tmpl = $this->get_tweet_template( $workspace_id );
                    if (! $tmpl ) {
                        $ctx->restore( $local_vars );
                        continue;
                    }
                    $primary = null;
                    if ( $primary_col ) {
                        $primary = $obj->$primary_col;
                    }
                    $ctx->vars['object_id'] = $obj->id;
                    $ctx->vars['object_primary'] = $primary;
                    $ctx->vars['model'] = $model;
                    $ctx->vars['model_label'] = $scheme['label'];
                    $tweet = $app->build( $tmpl, $ctx );
                    if ( $tweet === '' ) {
                        $ctx->restore( $local_vars );
                        continue;
                    } else {
                        $_tweet = $tweet;
                        $_tweet = preg_replace( '/\n/u', '', $_tweet );
                        $_tweet = preg_replace( '/^[\s　]*|[\s　]*/u', '', $_tweet );
                        if ( $_tweet === '' ) {
                            $ctx->restore( $local_vars );
                            continue;
                        }
                    }
                    if ( mb_strwidth( $tweet, 'utf-8' ) > 256 ) {
                        $tweet = mb_strimwidth( $tweet, 0, 253, '...', 'utf-8' );
                    }
                    $use_link_url = $this->get_config_value( 'use_link_url', $workspace_id );
                    if ( $use_link_url ) {
                        $link_url = $workspace ? $workspace->link_url : $app->link_url;
                        if ( $link_url ) {
                            $site_url = $workspace ? $workspace->site_url : $app->site_url;
                            $permalink = str_replace( $site_url, $link_url, $permalink );
                        }
                    }
                    $tweet .= "\n" . $permalink;
                    $response = null;
                    $result = $this->tweet( $tweet, $workspace_id, $response );
                    if ( $result === false ) {
                        $app->log( [
                            'category' => $plugin_id,
                            'level' => 'error',
                            'message' => $this->translate( 'Posting to 𝕏 failed.' ),
                            'metadata' => json_encode( $response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ),
                            'workspace_id' => $workspace_id,
                            'model' => $model,
                            'object_id' => $obj->id,
                        ] );
                    } else {
                        $tweeted_on = $this->load_meta( $obj, 'tweeted_on' );
                        $tweeted_on->value( date( 'YmdHis' ) );
                        $tweeted_on->save();
                        $app->log( [
                            'category' => $plugin_id,
                            'level' => 'info',
                            'message' => $this->translate( '\'%s (ID: %s)\' has been posted to 𝕏.', [
                                $app->translate( $scheme['label'] ), $obj->id
                            ] ),
                            //'metadata' => json_encode( $response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ),
                            'workspace_id' => $workspace_id,
                            'model' => $model,
                            'object_id' => $obj->id,
                        ] );
                    }
                    $ctx->restore( $local_vars );
                }
            }
        }
        $this->tweet_objects = [];
    }

    private function get_tweet_template ( int $workspace_id ) {
        $tmpl = null;
        $use_base = $this->get_config_value( 'use_base_tweet_template', $workspace_id );
        if ( $use_base ) {
            $tmpl = $this->get_config_value( 'base_tweet_template', 0 );
        } else {
            $tmpl = $this->get_config_value( 'tweet_template', $workspace_id );
        }
        return $tmpl;
    }

    private function tweet ( string $tweet, int $workspace_id, &$response = null, string &$error_message = '' ) {
        if ( $tweet === '' ) {
            $error_message = $this->translate( 'Post is empty' );
            return false;
        }
        $app = Prototype::get_instance();
        $api_keys = $this->get_api_keys();
        if (! $api_keys ) {
            $error_message = $this->translate( 'API Key is not set.' );
            return false;
        }
        $app->get_scheme_from_db( 'workspace' );
        $workspace = $app->db->model( 'workspace' )->load( (int) $workspace_id );
        $workspace_id = $workspace ? $workspace->id : 0;
        $tokens = $this->get_access_tokens( $workspace_id );
        if (! $tokens ) {
            $error_message = $this->translate( 'Not linked to a 𝕏 account.' );
            return false;
        }
        try {
            $connection = new TwitterOAuth( $api_keys['key'], $api_keys['secret'], $tokens['token'], $tokens['secret'] );
            if ( POSTONTWITTER_API_VERSION == 2 ) {
                $connection->setApiVersion( '2' );
            }
            $this->setCommonSettingsForTwitterOAuth( $connection );
            $response = null;
            if ( POSTONTWITTER_API_VERSION == 2 ) {
                $response = $connection->post( 'tweets', ['text' => $tweet], true);
            } else {
                $response = $connection->post( 'statuses/update', ['status' => $tweet] );
            }
            if ( property_exists( $response, 'errors' ) && is_array( $response->errors ) ) {
                $error_message = $this->translate( 'An error occurred.' ) . "\n\n";
                foreach ( $response->errors as $error ) {
                    $error_message .= '[' . $error->code . '] ' . $error->message . "\n";
                }
                return false;
            }
            return true;
        } catch ( Exception $e ) {
            $error_message = $this->translate( 'An error occurred.' ) . "\n\n" . $e->getMessage();
            return false;
        }
    }

    private function setCommonSettingsForTwitterOAuth ( $twitter_oauth ) {
        if ( $twitter_oauth instanceof TwitterOAuth === false ) {
            return;
        }
        $app = Prototype::get_instance();
        if ( $app->http_proxy ) {
            $twitter_oauth->setProxy( [
                'CURLOPT_PROXY' => $app->http_proxy,
                'CURLOPT_PROXYPORT' => null,
                'CURLOPT_PROXYUSERPWD' => null,
            ] );
        }
    }

    private function get_api_keys () {
        $keys = [];
        $api_key    = $this->get_config_value( 'api_key', 0 );
        $api_secret = $this->get_config_value( 'api_secret_key', 0 );
        if ( $api_key && $api_secret ) {
            $keys = ['key' => $api_key, 'secret' => $api_secret];
        }
        return $keys;
    }

    private function get_access_tokens ( int $workspace_id ) {
        $tokens = [];
        $use_base = $this->get_config_value( 'use_base_access_token', $workspace_id );
        if ( $use_base ) {
            $token  = $this->get_config_value( 'base_access_token', 0 );
            $secret = $this->get_config_value( 'base_access_token_secret', 0 );
        } else {
            $token  = $this->get_config_value( 'access_token', $workspace_id );
            $secret = $this->get_config_value( 'access_token_secret', $workspace_id );
        }
        if ( $token && $secret ) {
            $tokens = ['token' => $token, 'secret' => $secret];
        }
        return $tokens;
    }

    public function check_object_publishing ( &$cb, $app ) {
        if (
            !isset( $cb['name'] )
         || !is_string( $cb['name'] )
         || !isset( $cb['object'] )
         || !isset( $cb['urlmapping'] )
        ) {
            return true;
        }
        $map = $cb['urlmapping'];
        $target_publish_types = [];
        if ( $cb['name'] === 'start_publish' ) {
            $target_publish_types = [3, 6]; // 3:On-Demand, 6:Dynamic
        } else if ( $cb['name'] === 'post_rebuild' ) {
            $target_publish_types = [4]; // 4:Queue
        } else if ( $cb['name'] === 'post_publish' ) {
            $target_publish_types = [1, 2]; // 1:Static, 2:Static(Delayed)
        } else {
            return true; // Skip for publish-type "Manual".
        }
        if (! in_array( $map->publish_file, $target_publish_types ) ) {
            return true;
        }
        $app->get_scheme_from_db( 'urlmapping' );
        $maps = $app->db->model( 'urlmapping' )->load(
            ['id' => $map->id, 'is_preferred' => 1], ['limit' => 1], 'id,model,workspace_id' );
        if (! is_array( $maps ) || ! isset( $maps[0] ) ) {
            return true;
        }
        $map = $maps[0];
        $obj = $cb['object'];
        if ( $map->model !== $obj->_model ) {
            return true;
        }

        $model = $map->model;
        if (! $map->id || ! $this->is_tweet_model( $model, (int) $map->workspace_id ) ) {
            return true;
        }
        if ( $this->is_tweet_object( $obj ) ) {
            // Add Tweet Queue
            if ( array_key_exists( $model, $this->tweet_objects ) ) {
                $this->tweet_objects[$model] = [];
            }
            $this->tweet_objects[$model][$obj->id] = $obj;
        }
        return true;
    }

    private function is_tweet_model ( string $model, int $workspace_id ) {
        if (! is_string( $model ) || $model === '' ) {
            return false;
        }
        $tweet_models = $this->get_tweet_models( $workspace_id );
        return in_array( $model, $tweet_models );
    }

    private function get_tweet_models ( int $workspace_id ) {
        if (! $this->get_config_value( 'enabled', $workspace_id ) ) {
            return [];
        }
        $use_base = $this->get_config_value( 'use_base_target_models', $workspace_id );
        $setting_models = ( $use_base )
                        ? $this->get_config_value( 'base_target_models', 0 )
                        : $this->get_config_value( 'target_models', $workspace_id );
        if (! is_string( $setting_models ) || $setting_models === '' ) {
            return [];
        }
        $setting_models = preg_split( '/\s*,\s*/u', $setting_models );
        $_models = $this->get_has_urlmapping_models( $workspace_id );
        $tweet_models = [];
        foreach ( $_models as $_model ) {
            if ( in_array( $_model['name'], $setting_models ) ) {
                $tweet_models[] = $_model['name'];
            }
        }
        return $tweet_models;
    }

    private function is_tweet_object ( $obj ) {
        if (! $obj ) {
            return false;
        }
        $id_column = $obj->_id_column;
        if (! $obj->$id_column ) {
            return false;
        }
        $app = Prototype::get_instance();
        $app->get_scheme_from_db( $obj->_model );
        if ( $obj->has_column( 'status' ) ) {
            $status_published = $app->status_published( $obj );
            if ( $obj->status != $status_published ) {
                return false;
            }
        }
        $table = $app->get_table( $obj->_model );
        if ( $table->revisable && $obj->rev_type ) {
            return false;
        }
        $tweeted_on = $this->load_meta( $obj, 'tweeted_on', true );
        if ( $tweeted_on && $tweeted_on->id && $tweeted_on->value ) {
            return false;
        }
        $do_tweet = $this->load_meta( $obj, 'do_tweet' );
        if (! $do_tweet || ! $do_tweet->id || ! $do_tweet->value ) {
            return false;
        }
        return true;
    }

    public function template_source_edit ( &$cb, $app, &$params, &$src ) {
        if ( $app->id !== 'Prototype' ) {
            return;
        }
        $model = $cb['model'];
        $workspace = $app->workspace();
        $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;
        if ( $this->is_tweet_model( $model, $workspace_id ) === false ) {
            return;
        }
        $obj = $app->ctx->stash( 'object' );
        $tweeted_on = $this->load_meta( $obj, 'tweeted_on', true );
        if ( $tweeted_on && $tweeted_on->id && $tweeted_on->value ) {
            $app->ctx->vars['tweeted_on'] = $tweeted_on->value;
        } else {
            $do_tweet = $this->load_meta( $obj, 'do_tweet' );
            if ( $do_tweet && $do_tweet->id && $do_tweet->value ) {
                $app->ctx->vars['do_tweet'] = $do_tweet->value;
            }
        }
        $path = $this->path() . DS . 'tmpl' . DS . 'additional_edit_form_footer.tmpl';
        $include = $app->ctx->build( file_get_contents( $path ) );
        $form_footer = $app->ctx->vars['form_footer'] ?? '';
        $app->ctx->vars['form_footer'] = $include . $form_footer;
    }

    private function load_meta ( $obj, string $key, bool $inherit = false ) {
        if (! $obj || ! $key ) return false;
        $app = Prototype::get_instance();
        if ( $obj instanceof PADOBaseModel === false ) {
            return false;
        }
        $object_id = null;
        $table = $app->get_table( $obj->_model );
        if ( $inherit && $table->revisable && $obj->rev_type ) {
            if ( $obj->rev_object_id ) {
                $object_id = (int) $obj->rev_object_id;
            }
        } else {
            $id_column = $obj->_id_column;
            if ( $id_column && $obj->$id_column ) {
                $object_id = (int) $obj->$id_column;
            }
        }
        $meta = null;
        if ( $object_id ) {
            $_query_cache = $app->db->query_cache;
            $app->db->query_cache = false;
            $plugin_id = strtolower( get_class( $this ) );
            $params = ['kind' => $plugin_id, 'key' => $key,
                       'model' => $obj->_model, 'object_id' => $object_id];
            $meta = $app->db->model( 'meta' )->get_by_key( $params );
            $app->db->query_cache = $_query_cache;
        }
        return $meta;
    }

    private function remove_meta ( $obj, $keys = [] ) {
        if ( is_string( $keys ) ) $keys = [ $keys ];
        if (! is_array( $keys ) ) return;
        if (! $obj ) return;
        $id_column = $obj->_id_column;
        if (! $id_column || ! $obj->$id_column ) return;

        $app = Prototype::get_instance();
        $plugin_id = strtolower( get_class( $this ) );
        $terms = ['kind' => $plugin_id, 'model' => $obj->_model, 'object_id' => $obj->$id_column];
        if ( $keys ) {
            $terms['key'] = ( count($keys) === 1 ) ? $keys[0] : ['IN' => $keys];
        }

        $metas = $app->db->model( 'meta' )->load( $terms );
        if ( $metas && is_array( $metas ) ) {
            $app->db->model( 'meta' )->remove_multi( $metas );
        }
    }

    public function method_twitter_authorization ( $app ) {
        $api_keys = $this->get_api_keys();
        if (! $api_keys ) {
            return $app->error( $this->translate( 'API Key is not set.' ) );
        }
        try {
            $magic = $app->magic();
            $base  = $app->param( 'base' ) ? '1' : '0';
            $connection = new TwitterOAuth( $api_keys['key'], $api_keys['secret'] );
            if ( POSTONTWITTER_API_VERSION == 2 ) {
                $connection->setApiVersion( '2' );
            }
            $this->setCommonSettingsForTwitterOAuth( $connection );
            $response = $connection->oauth( 'oauth/request_token', [
                'oauth_callback' => $this->get_callback_url( ['magic' => $magic, 'base' => $base] )
            ] );
            if ( $response['oauth_callback_confirmed'] === 'true' ) {
                $user = $app->user();
                $workspace = $app->workspace();
                $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;
                $plugin_id = strtolower( get_class( $this ) );
                $session = $app->db->model( 'session' )->new( [
                    'name' => $magic,
                    'kind' => 'TO', // Twitter OAuth
                    'key'  => $plugin_id,
                    'user_id' => $user->id,
                    'workspace_id' => $workspace_id,
                ] );
                $data = ['oauth_token_secret' => $response['oauth_token_secret']];
                $session->text( json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) );
                $session->start( $app->request_time );
                $session->expires( $app->request_time + $app->sess_timeout );
                $session->save();

                $url = $connection->url( 'oauth/authenticate', ['oauth_token' => $response['oauth_token']] );
                $app->redirect( $url );
            } else {
                return $app->error( '<pre>' . var_export( $response, true ) . '</pre>' );
            }
        } catch ( Exception $e ) {
            return $app->error( $e->getMessage() );
        }
    }

    public function method_twitter_oauth_callback ( $app ) {
        $api_keys = $this->get_api_keys();
        if (! $api_keys ) {
            return $app->error( $this->translate( 'API Key is not set.' ) );
        }
        $user = $app->user();
        $magic = $app->param( 'magic' );
        $workspace = $app->workspace();
        $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;
        $plugin_id = strtolower( get_class( $this ) );
        $session = $app->db->model( 'session' )->get_by_key( [
            'name' => $magic,
            'kind' => 'TO', // Twitter OAuth
            'key'  => $plugin_id,
            'user_id' => $user->id,
            'workspace_id' => $workspace_id,
        ] );
        if (! $session->id ) {
            return $app->error( $this->translate( 'Invalid request.' ) );
        }

        $oauth_token    = $app->param( 'oauth_token' );
        $oauth_verifier = $app->param( 'oauth_verifier' );
        if (! $oauth_token || ! $oauth_verifier ) {
            $modal_message = $this->translate( 'Could not get access token.' );
            $this->add_template_vars( 'modal_message', $modal_message );
            return $app->build_page( 'twitter_oauth_callback.tmpl' );
        }

        $data = json_decode( $session->text, true );
        $session->remove();
        try {
            $connection = new TwitterOAuth( $api_keys['key'], $api_keys['secret'], $oauth_token, $data['oauth_token_secret'] );
            if ( POSTONTWITTER_API_VERSION == 2 ) {
                $connection->setApiVersion( '2' );
            }
            $this->setCommonSettingsForTwitterOAuth( $connection );
            $response = $connection->oauth( 'oauth/access_token', ['oauth_verifier' => $oauth_verifier] );
            if ( $app->param( 'base' ) === '1' ) {
                $this->set_config_value( 'base_access_token', $response['oauth_token'], 0 );
                $this->set_config_value( 'base_access_token_secret', $response['oauth_token_secret'], 0 );
                $this->add_template_vars( 'base', 1 );
            } else {
                $this->set_config_value( 'access_token', $response['oauth_token'], $workspace_id );
                $this->set_config_value( 'access_token_secret', $response['oauth_token_secret'], $workspace_id );
            }
            $this->add_template_vars( 'oauth_token', $response['oauth_token'] );
            $this->add_template_vars( 'oauth_token_secret', $response['oauth_token_secret'] );
            $modal_message = $this->translate( 'Successful acquisition of access token.' )
                           . '<br>' . $this->translate( '(Saved the token in the database .)' );

            // Get name and screen_name
            $connection = new TwitterOAuth( $api_keys['key'], $api_keys['secret'], $response['oauth_token'], $response['oauth_token_secret'] );
            if ( POSTONTWITTER_API_VERSION == 2 ) {
                $connection->setApiVersion( '2' );
            }
            $this->setCommonSettingsForTwitterOAuth( $connection );
            $response = $connection->get( 'account/verify_credentials' );
            if (
                is_object( $response )
             && property_exists( $response, 'name' )
             && property_exists( $response, 'screen_name' )
            ) {
                $account_name = $response->name . '@' . $response->screen_name;
                $this->add_template_vars( 'account_name', $account_name );
                if ( $app->param( 'base' ) === '1' ) {
                    $this->set_config_value( 'base_account_name', $account_name, 0 );
                } else {
                    $this->set_config_value( 'account_name', $account_name, $workspace_id );
                }
            }
            $plugin_id = strtolower( get_class( $this ) );
            $app->init_callbacks( $plugin_id, 'post_twitter_authenticate' );
            $callback = ['name' => 'post_twitter_authenticate',
                         'ctx' => $app->ctx, 'component' => $this ];
            $app->run_callbacks( $callback, $plugin_id );
        } catch ( Exception $e ) {
            $modal_message = $this->translate( 'An error occurred.' ) . '<br><br>' . $e->getMessage();
        }

        $this->add_template_vars( 'modal_message', $modal_message );
        return $app->build_page( 'twitter_oauth_callback.tmpl' );
    }

    private function get_callback_url ( $additional_query = null ) {
        $app = Prototype::get_instance();
        $workspace = $app->workspace();
        $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;
        $url = $this->get_config_value( 'callback_url', $workspace_id );
        if ( empty( $url ) ) {
            $app = Prototype::get_instance();
            $url = $this->get_default_callback_url( $workspace_id );
        }
        if ( $additional_query ) {
            if ( is_array( $additional_query ) ) {
                $additional_query = http_build_query( $additional_query );
            } elseif (! is_string( $additional_query ) ) {
                $additional_query = null;
            }
            if ( $additional_query ) {
                $url .= ( strpos( $url, '?' ) === false ) ? '?' : '&';
                $url .= $additional_query;
            }
        }
        return $url;
    }

    private function get_default_callback_url ( int $workspace_id = 0 ) {
        $app = Prototype::get_instance();
        return $app->admin_url . '?__mode=twitter_oauth_callback&workspace_id=' . $workspace_id;
    }

    public function method_twitter_post_test ( $app ) {
        //return $this->json_error( $this->translate( 'Permission denied.' ) );
        $api_keys = $this->get_api_keys();
        if (! $api_keys ) {
            $this->json_error( $this->translate( 'API Key is not set.' ) );
        }
        $workspace = $app->workspace();
        $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;
        $tokens = $this->get_access_tokens( $workspace_id );
        if (! $tokens ) {
            $this->json_error( $this->translate( 'Not linked to a 𝕏 account.' ) );
        }
        try {
            $connection = new TwitterOAuth( $api_keys['key'], $api_keys['secret'], $tokens['token'], $tokens['secret'] );
            if ( POSTONTWITTER_API_VERSION == 2 ) {
                $connection->setApiVersion( '2' );
            }
            $this->setCommonSettingsForTwitterOAuth( $connection );
            $tweet = 'This post is test for PostOnTwitter. (' . date( 'c', time() ) . ' :' . rand() . ')';
            $statues = null;
            if ( POSTONTWITTER_API_VERSION == 2 ) {
                $statues = $connection->post( 'tweets', ['text' => $tweet], true);
            } else {
                $statues = $connection->post( 'statuses/update', ['status' => $tweet] );
            }
            if ( property_exists( $statues, 'errors' ) && is_array( $statues->errors ) ) {
                $errors = [];
                $message = $this->translate( 'An error occurred.' ) . "\n\n";
                foreach ( $statues->errors as $error ) {
                    $errors[] = ['code' => $error->code, 'message' => $error->message];
                    $message .= '[' . $error->code . '] ' . $error->message . "\n";
                }
                $this->json_error( $message );
            }
            $this->json_print( ['statues' => $statues, 'LastXHeaders' => $connection->getLastXHeaders()] );
        } catch ( Exception $e ) {
            $this->json_error( $this->translate( 'An error occurred.' ) . "\n\n" . $e->getMessage() );
        }
    }

    private function json_print ( array $data = [] ) {
        $app = Prototype::get_instance();
        $data['status'] = 200;
        $output = json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
        $app->print( $output, 'application/json' );
    }

    private function json_error ( string $message, array $params = null, int $status = 400, $component = null, $lang = null ) {
        $app = Prototype::get_instance();
        $code_list = [ 200 => '200 OK',
                       400 => '400 Bad Request',
                       403 => '403 Forbidden',
                       404 => '404 Not Found',
                     ];
        header( $app->protocol . ' ' . ( isset( $code_list[$status] ) ?? $status ) );
        header( 'Content-type: application/json' );
        $message = $app->translate( $message, $params, $component, $lang );
        echo json_encode( [
            'status' => $status,
            'message' => $message
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
        exit();
    }

    public function hdlr_ifpostontwitterenabled ( $args, $content, $ctx, $repeat, $context ) {
        $enabled = $this->get_config_value( 'enabled', $workspace_id );
        if (! $enabled ) {
            return false;
        }
        $api_keys = $this->get_api_keys();
        if (! $api_keys ) {
            return false;
        }
        $workspace_id = null;
        if ( isset( $args['workspace_id'] ) && ctype_digit( (string) $args['workspace_id'] ) ) {
            $workspace_id = (int) $args['workspace_id'];
        }
        if ( is_null( $workspace_id ) ) {
            $workspace = $ctx->stash( 'workspace' );
            $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;
        }
        $tokens = $this->get_access_tokens( $workspace_id );
        return $tokens ? true : false;
    }

    public function hdlr_ifpostontwittertweetmodel ( $args, $content, $ctx, $repeat, $counter ) {
        $model = $args['model'] ?? null;
        if (! $model || ! is_string( $model ) || $model === '' ) {
            return false;
        }
        $workspace_id = null;
        if ( isset( $args['workspace_id'] ) && ctype_digit( (string) $args['workspace_id'] ) ) {
            $workspace_id = (int) $args['workspace_id'];
        }
        if ( is_null( $workspace_id ) ) {
            $workspace = $ctx->stash( 'workspace' );
            $workspace_id = ( $workspace && $workspace->id ) ? (int) $workspace->id : 0;
        }
        return $this->is_tweet_model( $model, $workspace_id );
    }
}
