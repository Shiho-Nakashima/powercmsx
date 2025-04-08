<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class Recaptcha extends PTPlugin {
    const CUSTOM_COLUMS = [
        ['name' => 'use_recaptcha', 'label' => 'Use Recaptcha']
    ];

    public function __construct () {
        parent::__construct();
    }

    public function activate ( $app, $plugin, $version, &$errors ) {
        return $this->add_custom_colums( $app, $plugin, $version, $errors );
    }

    public function deactivate ( $app, $plugin, $version, &$errors ) {
        // return $this->remove_custom_colums( $app, $plugin, $version, $errors );
        return true;
    }

    private function add_custom_colums ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'form' );
        $order = 5000;
        $upgrade = false;
        $upgrader = new PTUpgrader;
        foreach ( self::CUSTOM_COLUMS as $colum ) {
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => $colum['name']] );
            if (! $column->id ) {
                $order++;
                $values = ['type' => 'tinyint', 'label' => $colum['label'], 'size' => 4, 'order' => $order, 'edit' => 'checkbox'];
                $upgrader->make_column( $table, $colum['name'], $values, false );
                $upgrade = true;
            }
        }
        if ( $upgrade ) {
            $upgrader->upgrade_scheme( 'form' );
        }
        return true;
    }

    private function remove_custom_colums ( $app, $plugin, $version, &$errors ) {
        $table = $app->get_table( 'form' );
        $upgrade = false;
        foreach ( self::CUSTOM_COLUMS as $colum ) {
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => $colum['name']] );
            if ( $column->id ) {
                $column->remove();
                $upgrade = true;
            }
        }
        if ( $upgrade ) {
            $upgrader = new PTUpgrader;
            $upgrader->upgrade_scheme( 'form' );
        }
        return true;
    }

    private function do_recaptcha ( $cb, $app ) {
        // $app->log( 'do_recaptcha' );
        $token_name = $this->get_config_value( 'token_hidden_name', 0 );
        $token = ! empty( $app->param( $token_name ) ) ? $app->param( $token_name ) : null;
        // $app->log( $token );
        $result_status = '[reCAPTCHA] 認証失敗';
        if ( isset( $token ) ) {
            $api_endpoint = $this->get_config_value( 'api_endpoint', 0 );
            $secret_key = $this->get_config_value( 'api_secret_key', 0 );
            if ( isset( $api_endpoint ) && isset( $secret_key ) ) {
                $ch = curl_init();
                $c_opt = [
                    CURLOPT_URL => $api_endpoint,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => http_build_query([
                        'secret' => $secret_key,
                        'response' => $token,
                    ]),
                    CURLOPT_RETURNTRANSFER => true,
                ];
                if ( $app->http_proxy ) {
                    $c_opt[CURLOPT_PROXY] = $app->http_proxy;
                    $c_opt[CURLOPT_PROXYPORT] = null;
                    $c_opt[CURLOPT_PROXYUSERPWD] = null;
                }
                curl_setopt_array( $ch, $c_opt );
                $api_response = curl_exec( $ch );
                $app->log( $api_response );
                curl_close( $ch );
                $result = json_decode( $api_response, true );
                $pass_score = $this->get_config_value( 'pass_score', 0 );
                if ( $result['success'] && $result['score'] >= $pass_score ) {
                    $result_status = '[reCAPTCHA] 認証成功： $result->score : ' . $result['score'];
                }
                // else if (! $result['success'] && count( $result['error-codes'] ) === 1 && in_array( 'timeout-or-duplicate', $result['error-codes'], true ) ) {
                //     $result_status = '[reCAPTCHA] 認証成功： タイムアウト';
                // }
            }
        }

        $app->log( $result_status );
        if ( $result_status === '[reCAPTCHA] 認証失敗' ) {
            return false;
        }
        return true;
    }

    public function validation_form ( &$cb, $app, $form ) {
        if ( $form->use_recaptcha ) {
            if ( $this->do_recaptcha( $cb, $app ) ) {
                // $token_name = $this->get_config_value( 'token_hidden_name', 0 );
                // $app->ctx->vars[$token_name] = $app->param( $token_name );
                // $app->ctx->local_vars[$token_name] = $app->param( $token_name );
            } else {
                $cb['errors'][] = $this->translate( "There was an input error. Please contact us by e-mail." );
                $cb['confirm_ok'] = false;
            }
        }
    }

    public function save_filter_member ( &$cb, $app, $member ) {
        $use_members = $this->get_config_value( 'use_members', 0 );
        if ( $app->id === 'Members' && $use_members ) {
            if (! $this->do_recaptcha( $cb, $app ) ) {
                $cb['error'] = $this->translate( "There was an input error. Please contact us by e-mail." );
                return false;
            }
        }
        return true;
    }

    public function hdlr_recaptchaaddtoken ( $args, $ctx ) {
        $use_members = $this->get_config_value( 'use_members', 0 );
        if ( $app->id !== 'Members' || ( $app->id === 'Members' && $use_members ) ) {
            $app = $ctx->app;
            $tmpl = $app->ctx->get_template_path( 'add_token.tmpl' );
            $old_vars = $ctx->vars;
            $ctx->vars['form_class'] = isset( $args['form_class'] ) ? $args['form_class'] : '.recaptcha-form';
            $ctx->vars['confirm_button_class'] = isset( $args['confirm_button_class'] ) ? $args['confirm_button_class'] : '.recaptcha-confirm-button';
            $ctx->vars['submit_button_class'] = isset( $args['submit_button_class'] ) ? $args['submit_button_class'] : '.recaptcha-submit-button';
            $ctx->vars['api_js_url'] = $this->get_config_value( 'api_js_url', 0 );
            $ctx->vars['api_site_key'] = $this->get_config_value( 'api_site_key', 0 );
            $ctx->vars['token_hidden_name'] = $this->get_config_value( 'token_hidden_name', 0 );
            $script = $ctx->build( file_get_contents( $tmpl ) );
            $ctx->vars = $old_vars;
            return $script;
        }
        return '';
    }
}
