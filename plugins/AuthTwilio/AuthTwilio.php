<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

use Twilio\Rest\Client;

class AuthTwilio extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function activate ( $app ) {
        $upgrader = new PTUpgrader;
        $sms_number = ['type' => 'string', 'label' => 'Cell Phone Number',
                       'size' => 255, 'order' => 45, 'edit' => 'text',
                       'hint' => 'Please enter your international cell phone number(ex. +8190XXXXXXXX).'];
        $table = $app->get_table( 'user' );
        $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'sms_number'] );
        if (! $column->id ) {
            $upgrade = $upgrader->make_column( $table, 'sms_number', $sms_number, false );
            $upgrader->upgrade_scheme( 'user' );
        }
        $table = $app->get_table( 'member' );
        if ( $table && $table->id ) {
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'sms_number'] );
            if (! $column->id ) {
                $upgrade = $upgrader->make_column( $table, 'sms_number', $sms_number, false );
                $upgrader->upgrade_scheme( 'member' );
            }
        }
        return true;
    }

    function deactivate ( $app ) {
        if (! $app->authtwilio_remove_column ) {
            return true;
        }
        $upgrader = new PTUpgrader;
        $table = $app->get_table( 'user' );
        $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'sms_number'] );
        if ( $column->id ) {
            $column->remove();
            $upgrader->upgrade_scheme( 'user' );
        }
        $table = $app->get_table( 'member' );
        if ( $table && $table->id ) {
            $column = $app->db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'sms_number'] );
            if ( $column->id ) {
                $column->remove();
                $upgrader->upgrade_scheme( 'member' );
            }
        }
        return true;
    }

    function mail_filter ( &$cb, $app, $to, $subject, $body, $headers ) {
        if ( $app->id === 'Members' && $app->param( '__mode' ) === 'login' ) {
            $app->mode = 'login';
        }
        if ( $app->mode !== 'login' ) {
            return true;
        }
        $ctx = $app->ctx;
        $model = $app->id === 'Prototype' ? 'user' : 'member';
        $user = $app->db->model( $model )->get_by_key( ['email' => $to ] );
        $sms_number = trim( $user->sms_number );
        if ( $sms_number && strpos( $sms_number, '+' ) !== 0 && strpos( $sms_number, '0' ) === 0 ) {
            $country_code = $this->get_config_value( 'authtwilio_country_code' );
            if ( $country_code ) {
                $sms_number = '+' . $country_code . ltrim( $sms_number, '0' );
            }
        }
        if ( $sms_number ) {
            $sms_number = preg_replace( '/[^0-9]*/', '', $sms_number );
            if (! $sms_number ) {
                return true;
            }
            $authtwilio_model = $this->get_config_value( 'authtwilio_' . $model );
            if (! $authtwilio_model ) {
                return true;
            }
            $sms_number = '+' . $sms_number;
            $account_sid = $this->get_config_value( 'authtwilio_account_sid' );
            $auth_token = $this->get_config_value( 'authtwilio_authtoken' );
            $twilio_number = $this->get_config_value( 'authtwilio_from_number' );
            $twilio_number = preg_replace( '/[^0-9]*/', '', $twilio_number );
            if (! $twilio_number ) {
                return true;
            }
            $twilio_number = '+' . $twilio_number;
            $send_email = $this->get_config_value( 'authtwilio_send_email' );
            $autoloader = $app->composer_autoload ? $app->composer_autoload
                        : $this->path() . DS . 'lib' . DS . 'twilio-php-main' . DS . 'src' . DS . 'Twilio' . DS . 'autoload.php';
            if (! file_exists( $autoloader ) ) {
                return true;
            }
            if ( $account_sid && $auth_token && $twilio_number ) {
                try {
                    $template = null;
                    $tmpl = $app->get_mail_tmpl( 'confirmation_code_sms', $template );
                    if ( $template ) {
                        $tmpl = $template->text;
                    }
                    if ( $tmpl ) {
                        $body = $app->build( $tmpl );
                    }
                    require_once( $autoloader );
                    $client = new Client( $account_sid, $auth_token );
                    $client->messages->create(
                        $sms_number, ['from' => $twilio_number, 'body' => $body ]
                    );
                    if ( $send_email ) {
                        return true;
                    }
                    $cb['cancel'] = true;
                } catch ( Exception $e ) {
                    $errstr = $e->getMessage();
                    $errotr = $errotr ? $this->translate( 'An error occurred while sending the SMS(%s).', $errotr )
                            : $this->translate( 'An error occurred while sending the SMS.' );
                    $app->error( $errstr );
                    exit();
                }
            }
        }
        return true;
    }

}