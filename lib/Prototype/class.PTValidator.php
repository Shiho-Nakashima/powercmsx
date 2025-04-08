<?php

class PTValidator {

    public $app;

    function __construct () {
        $this->app = Prototype::get_instance();
    }

    function app () {
        if (! $this->app ) $this->app = Prototype::get_instance();
        return $this->app;
    }

    function cms_is_valid_email ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_valid_email( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please specify a valid email address for %s.", $label );
        }
        return $res;
    }

    function cms_is_valid_ts ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_valid_ts( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please specify a valid date for %s.", $label );
        }
        return $res;
    }

    function cms_is_valid_url ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_valid_url( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please specify a valid URL for %s.", $label );
        }
        return $res;
    }

    function cms_is_valid_tel ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_valid_tel( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please enter a valid phone number for %s.", $label );
        }
        return $res;
    }

    function cms_is_valid_postal_code ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_valid_postal_code( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please enter a valid postal code for %s.", $label );
        }
        return $res;
    }

    function cms_is_valid_hiragana ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_valid_hiragana( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please enter only the Hiragana for %s.", $label );
        }
        return $res;
    }

    function cms_is_valid_katakana ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_valid_katakana( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please enter only the Katakana for %s.", $label );
        }
        return $res;
    }

    function cms_is_valid_number ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_valid_number( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please enter only the Number for %s.", $label );
        }
        return $res;
    }

    function cms_is_alphanumeric_symbols ( $label, &$value, &$msg, $col = null ) {
        $res = $this->is_alphanumeric_symbols( $value, $msg );
        if (! $res ) {
            $msg = $this->app()->translate(
                "Please enter only the Alphanumeric Symbols for %s.", $label );
        }
        return $res;
    }

    function cms_required ( $label, &$value, &$msg, $col = null ) {
        if (! $value ) {
            $msg = $this->app()->translate(
                "%s is required.", $label );
            return false;
        }
        return true;
    }

    function is_valid_email ( &$value, &$msg ) {
        $value = trim( $value );
        if ( preg_match( '/^.*?<(.*?\@.*)>$/', $value, $m ) ) {
            $value = $m[1];
        }
        $regex = '/^[a-zA-Z0-9\.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-z'
               .'A-Z0-9-]+)*\.+[A-Za-z]+$/';
        if ( $value ) {
            if (! preg_match( $regex, $value, $mts ) ) {
                $msg = $this->app()->translate(
                            'Please specify a valid email address.' );
                return false;
            }
        } else {
            $msg = $this->app()->translate(
                        'Please specify a valid email address.' );
            return false;
        }
        return true;
    }

    function is_valid_ts ( &$ts, &$msg ) {
        // YYYYmmddHHiiss (14) or YYYYmmddHHii (12)
        if (! preg_match(
                '/^ (?P<Y> [0-9]{4} ) (?P<m> 0[1-9] | 1[012] ) (?P<d> 0[1-9] | [12][0-9] | 3[01] )' .
                '   (?:(?# H) [01][0-9] | 2[0-3] ) (?# i) [0-5][0-9]' .
                '   (?:(?# s) [0-5][0-9] | (?<= 59 ) 60 | ) $/x', // leap second (HH:59:60) is ok.
                $ts, $m ) ||
            ! checkdate( $m['m'], $m['d'], $m['Y'] )
        ) {
            $msg = $this->app()->translate( 'Please specify a valid date.' );
            return false;
        }
        return true;
    }

    function is_valid_property ( $prop, &$msg = '', $len = false ) {
        if (! preg_match( "/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/", $prop ) ||
            ! preg_match( "/^[a-zA-Z]/", $prop ) ) {
            $msg = $this->app()->translate(
            'A valid model or column name starts with a letter, '
            .'followed by any number of letters, numbers, or underscores.' );
            return false;
        }
        if ( $len ) {
            $max_length = 30 - strlen( DB_PREFIX );
            if ( strlen( $prop ) > $max_length ) {
                $msg = $this->app()->translate(
                'The Model or Column name must be %s characters or less.', $max_length );
                return false;
            }
        }
        return true;
    }

    function is_valid_url ( $url, &$msg = '' ) {
        if ( preg_match( '/^https?:\/\/([-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/',
                $url, $matches ) ) {
            if ( strpos( $matches[1], '//' ) === false ) return true;
        }
        $msg = $this->app()->translate( 'Please enter a valid URL.' );
        return false;
    }

    function is_valid_tel ( $value, &$msg ) {
        $p = '/\A(((0(\d{1}[-(]?\d{4}|\d{2}[-(]?\d{3}|\d{3}[-(]?\d{2}|\d{4}'
        .'[-(]?\d{1}|[5789]0[-(]?\d{4})[-)]?)|\d{1,4}\-?)\d{4}|0120[-(]?\d{3}'
        .'[-)]?\d{3})\z/';
        if (! preg_match( $p, $value ) ) {
            $msg = $this->app()->translate( 'Please enter a valid phone number.' );
            return false;
        }
        return true;
    }

    function is_valid_postal_code ( $value, &$msg ) {
        if (! preg_match( "/^\d{3}\-{0,1}\d{4}$/", $value ) ) {
            $msg = $this->app()->translate( 'Please enter a valid postal code.' );
            return false;
        }
        return true;
    }

    function is_valid_hiragana ( $value, &$msg ) {
        if (! preg_match( "/^([ぁ-んむ]|ー)+$/u", $value ) ) {
            $msg = $this->app()->translate( 'Please enter only the Hiragana.' );
            return false;
        }
        return true;
    }

    function is_valid_katakana ( $value, &$msg ) {
        $app = $this->app();
        if ( $app->validation_katakana_unicode ) {
            $pattern = "/^[ァ-ヿ]+$/u";
        } else {
            $pattern =  "/^([ァ-ヴ]|ー)+$/u";
        }
        if (! preg_match($pattern, $value ) ) {
            $msg = $this->app()->translate( 'Please enter only the Katakana.' );
            return false;
        }
        return true;
    }

    function is_valid_number ( $value, &$msg ) {
        if (! preg_match( "/^[0-9]+$/", $value ) ) {
            $msg = $this->app()->translate( 'Please enter only the Number.' );
            return false;
        }
        return true;
    }

    function is_alphanumeric_symbols ( $value, &$msg ) {
        if (! preg_match( "/^[!-~]+$/", $value ) ) {
            $msg = $this->app()->translate( 'Please enter only the Alphanumeric Symbols.' );
            return false;
        }
        return true;
    }

    function is_valid_password ( $pass, $verify = null, &$msg = '' ) {
        $app = $this->app();
        if ( isset( $verify ) && $pass !== $verify ) {
            $msg = $app->translate( 'Both passwords must match.' );
            return false;
        }
        $min = $app->password_min;
        $len = mb_strlen( $pass );
        $error = false;
        if ( $min ) {
            if ( $len < $min ) {
                $msg = $app->translate(
                'Password should be longer than %s characters.', $min );
                $error = true;
            }
        }
        if ( $app->password_1byte_letternum ) {
            if (! preg_match("/^[a-zA-Z0-9]+$/u", $pass ) ) {
                $msg = $app->translate(
                'Passwords can only contain alphanumeric characters.' );
                $error = true;
            }
        }
        if ( $app->password_symbol ) {
            if (! preg_match( '/[!"#$%&\'\(\|\)\*\+,-\.\/\\:;<=>\?@\[\]^_`{}~]/', $pass ) ) {
                $msg .= $msg ? ' ' : '';
                $msg .= $app->translate( 'Password should contain symbols.' );
                $error = true;
            }
        }
        if ( $app->password_letternum ) {
            if ( preg_match( '/[a-zA-Z]/', $pass ) && preg_match( '/[0-9]/', $pass ) ) {
            } else {
                $msg .= $msg ? ' ' : '';
                $msg .= $app->translate( 'Password should include letters and numbers.' );
                $error = true;
            }
        }
        if ( $app->password_upperlower ) {
            if ( preg_match( '/[a-z]/', $pass ) && preg_match( '/[A-Z]/', $pass ) ) {
            } else {
                $msg .= $msg ? ' ' : '';
                $msg .= $app->translate( 'Password should include lowercase and uppercase letters.' );
                $error = true;
            }
        }
        if ( $error ) return false;
        return true;
    }
}
