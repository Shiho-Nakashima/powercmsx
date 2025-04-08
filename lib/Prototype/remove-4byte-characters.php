<?php
define( 'PATTERN_4_BYTE', '/[\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]/' );
if (! empty( $_REQUEST ) ) {
    foreach ( $_REQUEST as $key => $value ) {
        $changed = false;
        $_REQUEST[ $key ] = remove_4byte_characters( $value, $changed );
        if ( $changed ) {
            if ( isset( $_GET[ $key ] ) ) {
                $_GET[ $key ] = $_REQUEST[ $key ];
            } else if ( isset( $_POST[ $key ] ) ) {
                $_POST[ $key ] = $_REQUEST[ $key ];
            }
        }
    }
}
if (! empty( $_FILES ) ) {
    foreach ( $_FILES as $key => $value ) {
        if ( is_array( $value ) && isset( $value['name'] ) ) {
            $changed = false;
            $file_names = remove_4byte_characters( $value['name'], $changed, true );
            if ( $changed ) {
                $_FILES[ $key ]['name'] = $file_names;
            }
        }
    }
}
function remove_4byte_characters ( $data, &$changed, $encode = false ) {
    if ( is_array( $data ) ) {
        foreach ( $data as $key => $value ) {
            if ( is_array( $value ) ) {
                $value = remove_4byte_characters( $data, $changed, $replace );
            } else if ( is_string( $value ) && $value && preg_match( PATTERN_4_BYTE, $value, $matchs ) ) {
                if ( $encode ) {
                    foreach ( $matchs as $match ) {
                        $value = str_replace( $match, rawurlencode( $match ), $value );
                    }
                } else {
                    $value = preg_replace( PATTERN_4_BYTE, '', $value );
                }
                $changed = true;
            }
            $data[ $key ] = $value;
        }
    } else if ( is_string( $data ) && $data && preg_match( PATTERN_4_BYTE, $data, $matchs ) ) {
        if ( $encode ) {
            foreach ( $matchs as $match ) {
                $data = str_replace( $match, rawurlencode( $match ), $data );
            }
        } else {
            $data = preg_replace( PATTERN_4_BYTE, '', $data );
        }
        $changed = true;
    }
    return $data;
}