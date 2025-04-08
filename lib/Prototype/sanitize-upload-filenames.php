<?php
$regex = self::INVALID_PATH_PATTERN;
$invalid_chars = ['<', '>', '#', '"', '%', '{', '}', '|', '\\', '^', '[', ']', '｀', '?', ':'];
$cnt = 1;
foreach ( $_FILES as $input => $data ) {
    $names = isset( $data['name'] ) ? $data['name'] : [];
    if ( is_array( $names ) ) {
        foreach ( $names as $idx => $file_name ) {
            if (! $file_name ) continue;
            $file_name = urldecode( $file_name );
            $file_ext = PTUtil::get_extension( $file_name );
            $etsearch = preg_quote( $file_ext, '/' );
            $basename = preg_replace( "/\.{$etsearch}$/i", '', $file_name );
            $filebase = $basename;
            foreach ( $invalid_chars as $char ) {
                if ( strpos( $basename, $char ) !== false ) {
                    $basename = str_replace( $char, '', $basename );
                }
            }
            $basename = preg_replace( '/[\\\\\/]/', '', $basename );
            $basename = preg_replace( '/[\.]{2,}/', '', $basename );
            $basename = preg_replace( $regex, '$1', $basename );
            $file_name = $file_ext ? "{$basename}.{$file_ext}" : $basename;
            if (! $basename && $filebase ) {
                $file_name = $file_ext ? "upload-{$cnt}.{$file_ext}" : "upload-{$cnt}";
                $cnt++;
            }
            $file_name = preg_replace( $regex, '$1', $file_name );
            $names[ $idx ] = $file_name;
        }
        $data['name'] = $names;
    } else if ( $names ) {
        $file_name = urldecode( $names );
        $file_ext = PTUtil::get_extension( $file_name );
        $etsearch = preg_quote( $file_ext, '/' );
        $basename = preg_replace( "/\.{$etsearch}$/i", '', $file_name );
        $filebase = $basename;
        foreach ( $invalid_chars as $char ) {
            if ( strpos( $basename, $char ) !== false ) {
                $basename = str_replace( $char, '', $basename );
            }
        }
        $basename = preg_replace( '/[\\\\\/]/', '', $basename );
        $basename = preg_replace( '/[\.]{2,}/', '', $basename );
        $basename = preg_replace( $regex, '$1', $basename );
        $file_name = $file_ext ? "{$basename}.{$file_ext}" : $basename;
        if (! $basename && $filebase ) {
            $file_name = $file_ext ? "upload-{$cnt}.{$file_ext}" : "upload-{$cnt}";
            $cnt++;
        }
        $file_name = preg_replace( $regex, '$1', $file_name );
        $data['name'] = $file_name;
    }
    $_FILES[ $input ] = $data;
}