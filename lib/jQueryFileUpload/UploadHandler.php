<?php
/*
 * jQuery File Upload Plugin PHP Class
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

class UploadHandler
{

    protected $options;

    protected $upload_file;
    protected $thumbnail_file;
    protected $square_file;

    protected $extension;
    protected $basename;
    protected $thumbnail_data;
    protected $thumb_square_data;
    public    $scaled_image;
    public    $write_func;
    public    $image_quality;
    public    $image_original;
    public    $response = null;

    public    $upload_files = [];

    // PHP File Upload error message codes:
    // http://php.net/manual/en/features.file-upload.errors.php
    protected $error_messages = array(
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk',
        8 => 'A PHP extension stopped the file upload',
        'post_max_size' => 'The uploaded file exceeds the post_max_size directive in php.ini',
        'max_file_size' => 'File is too big',
        'min_file_size' => 'File is too small',
        'accept_file_types' => 'Filetype not allowed',
        'max_number_of_files' => 'Maximum number of files exceeded',
        'max_width' => 'Image exceeds maximum width',
        'min_width' => 'Image requires a minimum width',
        'max_height' => 'Image exceeds maximum height',
        'min_height' => 'Image requires a minimum height',
        'abort' => 'File upload aborted',
        'image_resize' => 'Failed to resize image'
    );

    protected $image_objects = array();

    public function __construct($options = null, $initialize = true, $error_messages = null) {
        ignore_user_abort( true );
        error_reporting(0);
        $this->response = array();
        $this->options = array(
            'script_url' => $this->get_full_url().'/'.$this->basename($this->get_server_var('SCRIPT_NAME')),
            'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/files/',
            'upload_url' => $this->get_full_url().'/files/',
            'input_stream' => 'php://input',
            'user_dirs' => false,
            'session_no_data' => false,
            'mkdir_mode' => 0755,
            'param_name' => 'files',
            // Set the following option to 'POST', if your server does not support
            // DELETE requests. This is a parameter sent to the client:
            'delete_type' => 'DELETE',
            'access_control_allow_origin' => '*',
            'access_control_allow_credentials' => false,
            'access_control_allow_methods' => array(
                'OPTIONS',
                'HEAD',
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'DELETE'
            ),
            'access_control_allow_headers' => array(
                'Content-Type',
                'Content-Range',
                'Content-Disposition'
            ),
            // By default, allow redirects to the referer protocol+host:
            'redirect_allow_target' => '/^'.preg_quote(
              parse_url($this->get_server_var('HTTP_REFERER'), PHP_URL_SCHEME)
                .'://'
                .parse_url($this->get_server_var('HTTP_REFERER'), PHP_URL_HOST)
                .'/', // Trailing slash to not match subdomains by mistake
              '/' // preg_quote delimiter param
            ).'/',
            // Enable to provide file downloads via GET requests to the PHP script:
            //     1. Set to 1 to download files via readfile method through PHP
            //     2. Set to 2 to send a X-Sendfile header for lighttpd/Apache
            //     3. Set to 3 to send a X-Accel-Redirect header for nginx
            // If set to 2 or 3, adjust the upload_url option to the base path of
            // the redirect parameter, e.g. '/files/'.
            'download_via_php' => false,
            // Read files in chunks to avoid memory limits when download_via_php
            // is enabled, set to 0 to disable chunked reading of files:
            'readfile_chunk_size' => 10 * 1024 * 1024 * 1024,
            // Defines which files can be displayed inline when downloaded:
            'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Defines which files (based on their names) are accepted for upload:
            'accept_file_types' => '/.+$/i',
            // The php.ini settings upload_max_filesize and post_max_size
            // take precedence over the following max_file_size setting:
            'max_file_size' => null,
            'min_file_size' => 1,
            // The maximum number of files for the upload directory:
            'max_number_of_files' => null,
            // Defines which files are handled as image files:
            'image_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Use exif_imagetype on all files to correct file extensions:
            'correct_image_extensions' => false,
            // Image resolution restrictions:
            'max_width' => null,
            'max_height' => null,
            'min_width' => 1,
            'min_height' => 1,
            // Set the following option to false to enable resumable uploads:
            'discard_aborted_uploads' => true,
            // Set to 0 to use the GD library to scale and orient images,
            // set to 1 to use imagick (if installed, falls back to GD),
            // set to 2 to use the ImageMagick convert binary directly:
            'image_library' => 0,
            // Uncomment the following to define an array of resource limits
            // for imagick:
            /*
            'imagick_resource_limits' => array(
                imagick::RESOURCETYPE_MAP => 32,
                imagick::RESOURCETYPE_MEMORY => 32
            ),
            */
            // Command or path for to the ImageMagick convert binary:
            'convert_bin' => 'convert',
            // Uncomment the following to add parameters in front of each
            // ImageMagick convert call (the limit constraints seem only
            // to have an effect if put in front):
            /*
            'convert_params' => '-limit memory 32MiB -limit map 32MiB',
            */
            // Command or path for to the ImageMagick identify binary:
            'identify_bin' => 'identify',
            'image_versions' => array(
                // The empty image version key defines options for the original image:
                '' => array(
                    // Automatically rotate images based on EXIF meta data:
                    'auto_orient' => true
                ),
                // Uncomment the following to create medium sized images:
                /*
                'medium' => array(
                    'max_width' => 800,
                    'max_height' => 600
                ),
                */
                'thumbnail' => array(
                    // Uncomment the following to use a defined directory for the thumbnails
                    // instead of a subdirectory based on the version identifier.
                    // Make sure that this directory doesn't allow execution of files if you
                    // don't pose any restrictions on the type of uploaded files, e.g. by
                    // copying the .htaccess file from the files directory for Apache:
                    //'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/thumb/',
                    //'upload_url' => $this->get_full_url().'/thumb/',
                    // Uncomment the following to force the max
                    // dimensions and e.g. create square thumbnails:
                    //'crop' => true,
                    'max_width' => 256,
                    'max_height' => 256
                )
            ),
            'allow_hidden' => false,
            'print_response' => true
        );
        if ($options) {
            $this->options = $options + $this->options;
        }
        if ($error_messages) {
            $this->error_messages = $error_messages + $this->error_messages;
        }
        if ($initialize) {
            $this->initialize();
        }
    }

    protected function initialize() {
        switch ($this->get_server_var('REQUEST_METHOD')) {
            case 'OPTIONS':
            case 'HEAD':
                $this->head();
                break;
            case 'GET':
                $this->get($this->options['print_response']);
                break;
            case 'PATCH':
            case 'PUT':
            case 'POST':
                $this->post($this->options['print_response']);
                break;
            case 'DELETE':
                $this->delete($this->options['print_response']);
                break;
            default:
                $this->header('HTTP/1.1 405 Method Not Allowed');
        }
    }

    protected function get_full_url() {
        $https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 ||
            !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
                strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
        return
            ($https ? 'https://' : 'http://').
            (!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
            (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
            ($https && $_SERVER['SERVER_PORT'] === 443 ||
            $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
            substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
    }

    protected function get_user_id() {
        @session_start();
        return session_id();
    }

    protected function get_user_path() {
        if ($this->options['user_dirs']) {
            return $this->get_user_id().'/';
        }
        return '';
    }

    protected function get_upload_path($file_name = null, $version = null) {
        $file_name = $file_name ? $file_name : '';
        if (empty($version)) {
            $version_path = '';
        } else {
            $version_dir = 
            isset($this->options['image_versions'][$version]['upload_dir']) ?
            @$this->options['image_versions'][$version]['upload_dir']:'';
            if ($version_dir) {
                return $version_dir.$this->get_user_path().$file_name;
            }
            $version_path = $version.'/';
        }
        return $this->options['upload_dir'].$this->get_user_path()
            .$version_path.$file_name;
    }

    protected function get_query_separator($url) {
        return strpos($url, '?') === false ? '?' : '&';
    }

    protected function get_download_url($file_name, $version = null, $direct = false) {
        if (!$direct && $this->options['download_via_php']) {
            $url = $this->options['script_url']
                .$this->get_query_separator($this->options['script_url'])
                .$this->get_singular_param_name()
                .'='.rawurlencode($file_name);
            if ($version) {
                $url .= '&version='.rawurlencode($version);
            }
            return $url.'&download=1';
        }
        if (empty($version)) {
            $version_path = '';
        } else {
            $version_url = isset($this->options['image_versions'][$version]['upload_url']) ?
            @$this->options['image_versions'][$version]['upload_url'] : '';
            if ($version_url) {
                return $version_url.$this->get_user_path().rawurlencode($file_name);
            }
            $version_path = rawurlencode($version).'/';
        }
        return $this->options['upload_url'].$this->get_user_path()
            .$version_path.rawurlencode($file_name);
    }

    protected function set_additional_file_properties($file) {
        $upload_file = $this->upload_file;
        $basename = quotemeta(basename($upload_file));
        $thumbnail = preg_replace( "/($basename$)/", "thumbnail/$1", $upload_file );
        $file->thumbnail = $thumbnail;
        $paths = explode( DIRECTORY_SEPARATOR, $upload_file );
        $count = count( $paths );
        $paths = [ $paths[ $count - 3 ], $paths[ $count - 2 ], $paths[ $count - 1 ] ];
        $file->filePath = join( DIRECTORY_SEPARATOR, $paths );
        $file->magic = $this->options['magic'];
        $file->extension = $this->extension;
        $extension = strtolower( $this->extension );
        $file->thumbnail = $this->thumbnail_data;
        $file->basename = $this->basename;
        $file->class = $this->get_asset_class();
        $app = $this->options['prototype'];
        if (in_array($extension, $app->images) && file_exists( $upload_file )) {
            $file->class = 'image';
            list($width, $height) = getimagesize($upload_file);
            $file->width = $width;
            $file->height = $height;
        }
        $file->uploadDir = $this->options['upload_dir'];
        $basename = urldecode( $file->basename );
        $file->hashed_name = $basename;
        if ( $app->hash_multibyte_filename && ( strlen( $basename ) !== mb_strlen( $basename ) ) ) {
            $file->hashed_name = md5( $basename );
        }
        return;
    }

    // Fix for overflowing signed 32 bit integers,
    // works for sizes up to 2^32-1 bytes (4 GiB - 1):
    protected function fix_integer_overflow($size) {
        if ($size < 0) {
            $size += 2.0 * (PHP_INT_MAX + 1);
        }
        return $size;
    }

    protected function get_file_size($file_path, $clear_stat_cache = false) {
        if (! file_exists( $file_path ) ) {
            return 0;
        }
        if ($clear_stat_cache) {
            if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
                clearstatcache(true, $file_path);
            } else {
                clearstatcache();
            }
        }
        return $this->fix_integer_overflow(filesize($file_path));
    }

    protected function is_valid_file_object($file_name) {
        $file_path = $this->get_upload_path($file_name);
        if (is_file($file_path) && $file_name[0] !== '.') {
            return true;
        }
        return false;
    }

    protected function get_file_object($file_name) {
        if ($this->is_valid_file_object($file_name)) {
            $file = new \stdClass();
            $file->name = $file_name;
            $file->size = $this->get_file_size(
                $this->get_upload_path($file_name)
            );
            $file->url = $this->get_download_url($file->name);
            foreach ($this->options['image_versions'] as $version => $options) {
                if (!empty($version)) {
                    if (is_file($this->get_upload_path($file_name, $version))) {
                        $file->{$version.'Url'} = $this->get_download_url(
                            $file->name,
                            $version
                        );
                    }
                }
            }
            $this->set_additional_file_properties($file);
            return $file;
        }
        return null;
    }

    protected function get_file_objects($iteration_method = 'get_file_object') {
        $upload_dir = $this->get_upload_path();
        if (!is_dir($upload_dir)) {
            return array();
        }
        return array_values(array_filter(array_map(
            array($this, $iteration_method),
            scandir($upload_dir)
        )));
    }

    protected function count_file_objects() {
        return count($this->get_file_objects('is_valid_file_object'));
    }

    protected function get_error_message($error) {
        return isset($this->error_messages[$error]) ?
            $this->error_messages[$error] : $error;
    }

    public function get_config_bytes($val) {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        if (is_numeric($val)) {
            $val = (int)$val;
        } else {
            $val = (int)substr($val, 0, -1);
        }
        switch ($last) {
            case 'g':
                $val *= 1024 * 1024 * 1024;
                break;
            case 'm':
                $val *= 1024 * 1024;
                break;
            case 'k':
                $val *= 1024;
                break;
        }
        return $this->fix_integer_overflow($val);
    }

    protected function validate($uploaded_file, $file, $error, $index) {
        if (defined('NOT_VERIFY_THE_IMAGE')) {
            return true;
        }
        if ($error) {
            $file->error = $this->get_error_message($error);
            return false;
        }
        $content_length = $this->fix_integer_overflow(
            (int)$this->get_server_var('CONTENT_LENGTH')
        );
        $post_max_size = $this->get_config_bytes(ini_get('post_max_size'));
        if ($post_max_size && ($content_length > $post_max_size)) {
            $file->error = $this->get_error_message('post_max_size');
            return false;
        }
        if (!preg_match($this->options['accept_file_types'], $file->name)) {
            $file->error = $this->get_error_message('accept_file_types');
            return false;
        }
        if ($uploaded_file && is_uploaded_file($uploaded_file)) {
            $file_size = $this->get_file_size($uploaded_file);
        } else {
            $file_size = $content_length;
        }
        if ($this->options['max_file_size'] && (
                $file_size > $this->options['max_file_size'] ||
                $file->size > $this->options['max_file_size'])
            ) {
            $file->error = $this->get_error_message('max_file_size');
            return false;
        }
        if ($this->options['min_file_size'] &&
            $file_size < $this->options['min_file_size']) {
            $file->error = $this->get_error_message('min_file_size');
            return false;
        }
        if (is_int($this->options['max_number_of_files']) &&
                ($this->count_file_objects() >= $this->options['max_number_of_files']) &&
                // Ignore additional chunks of existing files:
                !is_file($this->get_upload_path($file->name))) {
            $file->error = $this->get_error_message('max_number_of_files');
            return false;
        }
        $max_width = @$this->options['max_width'];
        $max_height = @$this->options['max_height'];
        $min_width = @$this->options['min_width'];
        $min_height = @$this->options['min_height'];
        if (($max_width || $max_height || $min_width || $min_height)
           && preg_match($this->options['image_file_types'], $file->name)) {
            list($img_width, $img_height) = $this->get_image_size($uploaded_file);

            // If we are auto rotating the image by default, do the checks on
            // the correct orientation
            if (
                @$this->options['image_versions']['']['auto_orient'] &&
                function_exists('exif_read_data') &&
                ($exif = @exif_read_data($uploaded_file)) &&
                (((int) @$exif['Orientation']) >= 5)
            ) {
                $tmp = $img_width;
                $img_width = $img_height;
                $img_height = $tmp;
                unset($tmp);
            }

        }
        if (!empty($img_width)) {
            if ($max_width && $img_width > $max_width) {
                $file->error = $this->get_error_message('max_width');
                return false;
            }
            if ($max_height && $img_height > $max_height) {
                $file->error = $this->get_error_message('max_height');
                return false;
            }
            if ($min_width && $img_width < $min_width) {
                $file->error = $this->get_error_message('min_width');
                return false;
            }
            if ($min_height && $img_height < $min_height) {
                $file->error = $this->get_error_message('min_height');
                return false;
            }
        }
        return true;
    }

    protected function upcount_name_callback($matches) {
        $index = isset($matches[1]) ? ((int)$matches[1]) + 1 : 1;
        $ext = isset($matches[2]) ? $matches[2] : '';
        return ' ('.$index.')'.$ext;
    }

    protected function upcount_name($name) {
        return preg_replace_callback(
            '/(?:(?: \(([\d]+)\))?(\.[^.]+))?$/',
            array($this, 'upcount_name_callback'),
            $name,
            1
        );
    }

    protected function get_unique_filename($file_path, $name, $size, $type, $error,
            $index, $content_range) {
        $app = $this->options['prototype'];
        if ( $app->param( 'chunk_upload' ) ) {
            // Keep an existing filename if this is part of a chunked upload:
            return $name;
        }
        if (!isset($this->options['no_upload'])){
            while(is_dir($this->get_upload_path($name))) {
                $name = $this->upcount_name($name);
            }
            // Keep an existing filename if this is part of a chunked upload:
            $uploaded_bytes = is_array( $content_range ) ? $this->fix_integer_overflow((int)$content_range[1]) : 0;
            while (is_file($this->get_upload_path($name))) {
                if ($uploaded_bytes === $this->get_file_size(
                        $this->get_upload_path($name))) {
                    break;
                }
                $name = $this->upcount_name($name);
            }
        }
        return $name;
    }

    protected function fix_file_extension($file_path, $name, $size, $type, $error,
            $index, $content_range) {
        // Add missing file extension for known image types:
        if (strpos($name, '.') === false &&
                preg_match('/^image\/(gif|jpe?g|png)/', $type, $matches)) {
            $name .= '.'.$matches[1];
        }
        if ($this->options['correct_image_extensions'] &&
                function_exists('exif_imagetype')) {
            switch (@exif_imagetype($file_path)){
                case IMAGETYPE_JPEG:
                    $extensions = array('jpg', 'jpeg');
                    break;
                case IMAGETYPE_PNG:
                    $extensions = array('png');
                    break;
                case IMAGETYPE_GIF:
                    $extensions = array('gif');
                    break;
            }
            // Adjust incorrect image file extensions:
            if (!empty($extensions)) {
                $parts = explode('.', $name);
                $extIndex = count($parts) - 1;
                $ext = strtolower(@$parts[$extIndex]);
                if (!in_array($ext, $extensions)) {
                    $parts[$extIndex] = $extensions[0];
                    $name = implode('.', $parts);
                }
            }
        }
        return $name;
    }

    protected function trim_file_name($file_path, $name, $size, $type, $error,
            $index, $content_range) {
        // Remove path information and dots around the filename, to prevent uploading
        // into different directories or replacing hidden system files.
        // Also remove control characters and spaces (\x00..\x20) around the filename:
        $name = str_replace( DIRECTORY_SEPARATOR, '', $name );
        if ( $this->options['allow_hidden'] ) {
            $name = preg_replace( '/^\.{2,}/', '', $name );
            $name = trim($this->basename(stripslashes($name)), "\x00..\x20");
        } else {
            // Original.
            $name = trim($this->basename(stripslashes($name)), ".\x00..\x20");
        }
        // Use a timestamp for empty filenames:
        if (!$name) {
            $name = str_replace('.', '-', microtime(true));
        }
        return $name;
    }

    protected function get_file_name($file_path, $name, $size, $type, $error,
            $index, $content_range) {
        $name = $this->trim_file_name($file_path, $name, $size, $type, $error,
            $index, $content_range);
        return $this->get_unique_filename(
            $file_path,
            $this->fix_file_extension($file_path, $name, $size, $type, $error,
                $index, $content_range),
            $size,
            $type,
            $error,
            $index,
            $content_range
        );
    }

    protected function get_scaled_image_file_paths($file_name, $version) {
        $file_path = $this->get_upload_path($file_name);
        if (!empty($version)) {
            $version_dir = $this->get_upload_path(null, $version);
            $version_dir = rtrim($version_dir,'/');
            if (!is_dir($version_dir)) {
                mkdir($version_dir, $this->options['mkdir_mode'], true);
            }
            $new_file_path = $version_dir.'/'.$file_name;
        } else {
            $new_file_path = $file_path;
        }
        return array($file_path, $new_file_path);
    }

    protected function gd_get_image_object($file_path, $func, $no_cache = false) {
        if (empty($this->image_objects[$file_path]) || $no_cache) {
            $this->gd_destroy_image_object($file_path);
            $image_obj = $func($file_path);
            if ( $image_obj === false ) {
                $app = $this->options['prototype'];
                return $app->json_error( 'The image format are Invalid. Please confirm the file.' );
            }
            $this->image_objects[$file_path] = $image_obj;
        }
        return $this->image_objects[$file_path];
    }

    protected function gd_set_image_object($file_path, $image) {
        $this->gd_destroy_image_object($file_path);
        $this->image_objects[$file_path] = $image;
    }

    protected function gd_destroy_image_object($file_path) {
        $image = (isset($this->image_objects[$file_path])) ? $this->image_objects[$file_path] : null ;
        return $image && imagedestroy($image);
    }

    protected function gd_imageflip($image, $mode) {
        /*
        if (function_exists('imageflip')) {
            return imageflip($image, $mode);
        }
        */
        $new_width = $src_width = imagesx($image);
        $new_height = $src_height = imagesy($image);
        if ( $new_width < 1 ) $new_width = 1;
        if ( $new_height < 1 ) $new_height = 1;
        $new_img = imagecreatetruecolor($new_width, $new_height);
        $src_x = 0;
        $src_y = 0;
        switch ($mode) {
            case '1': // flip on the horizontal axis
                $src_y = $new_height - 1;
                $src_height = -$new_height;
                break;
            case '2': // flip on the vertical axis
                $src_x  = $new_width - 1;
                $src_width = -$new_width;
                break;
            case '3': // flip on both axes
                $src_y = $new_height - 1;
                $src_height = -$new_height;
                $src_x  = $new_width - 1;
                $src_width = -$new_width;
                break;
            default:
                return $image;
        }
        imagecopyresampled(
            $new_img,
            $image,
            0,
            0,
            $src_x,
            $src_y,
            $new_width,
            $new_height,
            $src_width,
            $src_height
        );
        return $new_img;
    }

    protected function gd_orient_image($file_path, $src_img) {
        if (!function_exists('exif_read_data')) {
            return false;
        }
        $exif = @exif_read_data($file_path);
        if ($exif === false) {
            return false;
        }
        $orientation = (int)@$exif['Orientation'];
        $app = $this->options['prototype'];
        if ( $app->remove_exif ) {
            $w = imagesx( $src_img );
            $h = imagesy( $src_img );
            if (! $h ) $h = 1;
            if (! $w ) $w = 1;
            $new_img = imagecreatetruecolor( $w, $h );
            if (!$orientation ) return false;
            if ($orientation < 2 || $orientation > 8) {
                imagecopyresampled( $new_img, $src_img, 0, 0, 0, 0, $w, $h, $w, $h );
                $write_func = $this->write_func;
                if ( $write_func ) {
                    $image_quality = $this->image_quality;
                    $write_func( $new_img, $file_path, $image_quality );
                }
                return false;
            }
        }
        if ($orientation < 2 || $orientation > 8) {
            return false;
        }
        switch ($orientation) {
            case 2:
                $new_img = $this->gd_imageflip(
                    $src_img,
                    defined('IMG_FLIP_VERTICAL') ? IMG_FLIP_VERTICAL : 2
                );
                break;
            case 3:
                $new_img = imagerotate($src_img, 180, 0);
                $write_func = $this->write_func;
                break;
            case 4:
                $new_img = $this->gd_imageflip(
                    $src_img,
                    defined('IMG_FLIP_HORIZONTAL') ? IMG_FLIP_HORIZONTAL : 1
                );
                break;
            case 5:
                $tmp_img = $this->gd_imageflip(
                    $src_img,
                    defined('IMG_FLIP_HORIZONTAL') ? IMG_FLIP_HORIZONTAL : 1
                );
                $new_img = imagerotate($tmp_img, 270, 0);
                imagedestroy($tmp_img);
                break;
            case 6:
                $new_img = imagerotate($src_img, 270, 0);
                break;
            case 7:
                $tmp_img = $this->gd_imageflip(
                    $src_img,
                    defined('IMG_FLIP_VERTICAL') ? IMG_FLIP_VERTICAL : 2
                );
                $new_img = imagerotate($tmp_img, 270, 0);
                imagedestroy($tmp_img);
                break;
            case 8:
                $new_img = imagerotate($src_img, 90, 0);
                break;
            default:
                return false;
        }
        $this->gd_set_image_object($file_path, $new_img);
        return true;
    }

    protected function gd_create_scaled_image($file_name, $version, $options, $square = false) {
        if (!function_exists('imagecreatetruecolor')) {
            error_log('Function not found: imagecreatetruecolor');
            return false;
        }
        list($file_path, $new_file_path) =
            $this->get_scaled_image_file_paths($file_name, $version);
        if ( $this->image_original && $this->image_original == $new_file_path ) {
            return true;
        }
        $type = strtolower(substr(strrchr($file_name, '.'), 1));
        $app = $this->options['prototype'];
        switch ($type) {
            case 'jpg':
            case 'jpeg':
                $src_func = 'imagecreatefromjpeg';
                $write_func = 'imagejpeg';
                $image_quality = isset($options['jpeg_quality']) ?
                    $options['jpeg_quality'] : 100;
                break;
            case 'gif':
                $src_func = 'imagecreatefromgif';
                $write_func = 'imagegif';
                $image_quality = null;
                break;
            case 'png':
                $src_func = 'imagecreatefrompng';
                $write_func = 'imagepng';
                $image_quality = isset($options['png_quality']) ?
                    $options['png_quality'] : 0;
                break;
            default:
                return false;
        }
        $this->write_func = $write_func;
        $this->image_quality = $image_quality;
        $src_img = $this->gd_get_image_object(
            $file_path,
            $src_func,
            !empty($options['no_cache'])
        );
        $image_oriented = false;
        if (!empty($options['auto_orient']) && $this->gd_orient_image(
                $file_path,
                $src_img
            )) {
            $image_oriented = true;
            $src_img = $this->gd_get_image_object(
                $file_path,
                $src_func
            );
        }
        $dir = basename(dirname( $new_file_path ));
        if ( $dir != 'thumbnail' ) {
            $this->image_original = $new_file_path;
            if (empty($options['auto_orient']) ) {
                if ( $app->remove_exif ) {
                    if (function_exists('exif_read_data')) {
                        $exif = @exif_read_data($file_path);
                        if ($exif !== false) {
                            return $write_func($src_img, $new_file_path, $image_quality);
                        }
                    }
                }
            }
        }
        $max_width = $img_width = imagesx($src_img);
        $max_height = $img_height = imagesy($src_img);
        if (!empty($options['max_width'])) {
            $max_width = $options['max_width'];
        }
        if (!empty($options['max_height'])) {
            $max_height = $options['max_height'];
        }
        $scale = min(
            $max_width / $img_width,
            $max_height / $img_height
        );
        $smaller = false;
        if ($scale >= 1) {
            if ($image_oriented) {
                return $write_func($src_img, $new_file_path, $image_quality);
            }
            if ($file_path !== $new_file_path) {
                $success = copy($file_path, $new_file_path);
                $smaller = true;
            }
        }
        if (!$smaller) {
            if (empty($options['crop'])) {
                $new_width = $img_width * $scale;
                $new_height = $img_height * $scale;
                $dst_x = 0;
                $dst_y = 0;
                $new_width = round( $new_width );
                $new_height = round( $new_height );
                if ( $new_width < 1 ) $new_width = 1;
                if ( $new_height < 1 ) $new_height = 1;
                $new_img = imagecreatetruecolor($new_width, $new_height);
            } else {
                if (($img_width / $img_height) >= ($max_width / $max_height)) {
                    $new_width = $img_width / ($img_height / $max_height);
                    $new_height = $max_height;
                } else {
                    $new_width = $max_width;
                    $new_height = $img_height / ($img_width / $max_width);
                }
                $dst_x = 0 - ($new_width - $max_width) / 2;
                $dst_y = 0 - ($new_height - $max_height) / 2;
                if ( $max_width < 1 ) $max_width = 1;
                if ( $max_height < 1 ) $max_height = 1;
                $new_img = imagecreatetruecolor($max_width, $max_height);
            }
            // Handle transparency in GIF and PNG images:
            switch ($type) {
                case 'gif':
                case 'png':
                    imagecolortransparent($new_img, imagecolorallocate($new_img, 0, 0, 0));
                case 'png':
                    imagealphablending($new_img, false);
                    imagesavealpha($new_img, true);
                    break;
                case 'webp':
                    imagealphablending($new_img, false);
                    imagesavealpha($new_img, true);
                    break;
            }
            $new_file_path = str_replace( DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR,
                DIRECTORY_SEPARATOR, $new_file_path );
            if ($square) {
                $basename = preg_quote(basename($new_file_path));
                $new_file_path = preg_replace("/($basename$)/","square-$1", $new_file_path);
            }
            if ( $app->param( '__mode' ) == 'upload_multi' ) {
                if ( $square && $dir != 'thumbnail' ) {
                    return true;
                }
            }
            if ( $dir != 'thumbnail' )
                $this->upload_files[] = $new_file_path;
            if ( $dir == 'thumbnail' ) {
                if ( $app ) {
                    $quality = (int) $app->image_quality;
                    if ( $type == 'png' && $quality >= 10 ) {
                        $quality *= 0.1;
                        $quality = (int) $quality;
                        if ( $quality > 9 ) {
                            $quality = 0;
                        }
                    } else if ( $type == 'png' && $quality == 0 ) {
                        $quality = 1;
                    }
                    $image_quality = $quality;
                }
                $new_width = round( $new_width );
                $new_height = round( $new_height );
                if ( $new_width < 1 ) $new_width = 1;
                if ( $new_height < 1 ) $new_height = 1;
                $dst_x = round( $dst_x );
                $dst_y = round( $dst_y );
                if ( $type === 'gif' ) {
                    $success = imagecopyresampled(
                        $new_img,
                        $src_img,
                        $dst_x,
                        $dst_y,
                        0,
                        0,
                        $new_width,
                        $new_height,
                        $img_width,
                        $img_height
                    ) && $write_func($new_img, $new_file_path);
                } else {
                    $success = imagecopyresampled(
                        $new_img,
                        $src_img,
                        $dst_x,
                        $dst_y,
                        0,
                        0,
                        $new_width,
                        $new_height,
                        $img_width,
                        $img_height
                    ) && $write_func($new_img, $new_file_path, $image_quality);
                }
            } else {
                $success = true;
            }
        }
        if (!isset($this->options['no_upload'])){
            if (! $square ) {
                $options['crop'] = true;
                $options['max_width'] = isset($options['max_width']) ? $options['max_width'] : 500;
                $options['max_width'] = $options['max_width']/2;
                $options['max_height'] = isset($options['max_height']) ? $options['max_height'] : 500;
                $options['max_height'] = $options['max_height']/2;
                $this->gd_create_scaled_image($file_name, $version, $options,true);
            }
        }
        $this->scaled_image = $new_file_path;
        return $success;
    }

    protected function imagick_get_image_object($file_path, $no_cache = false) {
        if (empty($this->image_objects[$file_path]) || $no_cache) {
            $this->imagick_destroy_image_object($file_path);
            $image = new \Imagick();
            if (!empty($this->options['imagick_resource_limits'])) {
                foreach ($this->options['imagick_resource_limits'] as $type => $limit) {
                    $image->setResourceLimit($type, $limit);
                }
            }
            $image->readImage($file_path);
            $this->image_objects[$file_path] = $image;
        }
        return $this->image_objects[$file_path];
    }

    protected function imagick_set_image_object($file_path, $image) {
        $this->imagick_destroy_image_object($file_path);
        $this->image_objects[$file_path] = $image;
    }

    protected function imagick_destroy_image_object($file_path) {
        $image = (isset($this->image_objects[$file_path])) ? $this->image_objects[$file_path] : null ;
        return $image && $image->destroy();
    }

    protected function imagick_orient_image($image) {
        $orientation = $image->getImageOrientation();
        $background = new \ImagickPixel('none');
        switch ($orientation) {
            case \imagick::ORIENTATION_TOPRIGHT: // 2
                $image->flopImage(); // horizontal flop around y-axis
                break;
            case \imagick::ORIENTATION_BOTTOMRIGHT: // 3
                $image->rotateImage($background, 180);
                break;
            case \imagick::ORIENTATION_BOTTOMLEFT: // 4
                $image->flipImage(); // vertical flip around x-axis
                break;
            case \imagick::ORIENTATION_LEFTTOP: // 5
                $image->flopImage(); // horizontal flop around y-axis
                $image->rotateImage($background, 270);
                break;
            case \imagick::ORIENTATION_RIGHTTOP: // 6
                $image->rotateImage($background, 90);
                break;
            case \imagick::ORIENTATION_RIGHTBOTTOM: // 7
                $image->flipImage(); // vertical flip around x-axis
                $image->rotateImage($background, 270);
                break;
            case \imagick::ORIENTATION_LEFTBOTTOM: // 8
                $image->rotateImage($background, 270);
                break;
            default:
                return false;
        }
        $image->setImageOrientation(\imagick::ORIENTATION_TOPLEFT); // 1
        return true;
    }

    protected function imagick_create_scaled_image($file_name, $version, $options, $square = false) {
        $success = null;
        list($file_path, $new_file_path) =
            $this->get_scaled_image_file_paths($file_name, $version);
        $image = $this->imagick_get_image_object(
            $file_path,
            !empty($options['crop']) || !empty($options['no_cache'])
        );
        if ($image->getImageFormat() === 'GIF') {
            // Handle animated GIFs:
            $images = $image->coalesceImages();
            foreach ($images as $frame) {
                $image = $frame;
                $this->imagick_set_image_object($file_name, $image);
                break;
            }
        }
        $image_oriented = false;
        if (!empty($options['auto_orient'])) {
            $image_oriented = $this->imagick_orient_image($image);
        }
        $new_width = $max_width = $img_width = $image->getImageWidth();
        $new_height = $max_height = $img_height = $image->getImageHeight();
        if (!empty($options['max_width'])) {
            $new_width = $max_width = $options['max_width'];
        }
        if (!empty($options['max_height'])) {
            $new_height = $max_height = $options['max_height'];
        }
        $smaller = false;
        if (!($image_oriented || $max_width < $img_width || $max_height < $img_height)) {
            if ($file_path !== $new_file_path) {
                $success = copy($file_path, $new_file_path);
            }
            $smaller = true;
        }
        if ($square) {
            $basename = preg_quote(basename($new_file_path));
            $new_file_path = preg_replace("/($basename$)/","square-$1", $new_file_path);
        }
        if (!$smaller) {
            $new_file_path = str_replace( DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR,
                DIRECTORY_SEPARATOR, $new_file_path );
            $crop = !empty($options['crop']);
            if ($crop) {
                $x = 0;
                $y = 0;
                if (($img_width / $img_height) >= ($max_width / $max_height)) {
                    $new_width = 0; // Enables proportional scaling based on max_height
                    $x = ($img_width / ($img_height / $max_height) - $max_width) / 2;
                } else {
                    $new_height = 0; // Enables proportional scaling based on max_width
                    $y = ($img_height / ($img_width / $max_width) - $max_height) / 2;
                }
            }
            $success = $image->resizeImage(
                $new_width,
                $new_height,
                isset($options['filter']) ? $options['filter'] : \imagick::FILTER_LANCZOS,
                isset($options['blur']) ? $options['blur'] : 1,
                $new_width && $new_height // fit image into constraints if not to be cropped
            );
            if ($success && $crop) {
                $success = $image->cropImage(
                    $max_width,
                    $max_height,
                    $x,
                    $y
                );
                if ($success) {
                    $success = $image->setImagePage($max_width, $max_height, 0, 0);
                }
            }
            $type = strtolower(substr(strrchr($file_name, '.'), 1));
            switch ($type) {
                case 'jpg':
                case 'jpeg':
                    if (!empty($options['jpeg_quality'])) {
                        $image->setImageCompression(\imagick::COMPRESSION_JPEG);
                        $image->setImageCompressionQuality($options['jpeg_quality']);
                    }
                    break;
            }
            if (!empty($options['strip'])) {
                $image->stripImage();
            }
        }
        if (!isset($this->options['no_upload'])){
            if (! $square ) {
                $options['crop'] = true;
                $options['max_width'] = isset($options['max_width']) ? $options['max_width'] : 500;
                $options['max_width'] = $options['max_width']/2;
                $options['max_height'] = isset($options['max_height']) ? $options['max_height'] : 500;
                $options['max_height'] = $options['max_height']/2;
                $this->imagick_create_scaled_image($file_name, $version, $options,true);
            }
        }
        if ($smaller) return $success;
        return $success && $image->writeImage($new_file_path);
    }

    protected function imagemagick_create_scaled_image($file_name, $version, $options) {
        list($file_path, $new_file_path) =
            $this->get_scaled_image_file_paths($file_name, $version);
        $resize = @$options['max_width']
            .(empty($options['max_height']) ? '' : 'X'.$options['max_height']);
        if (!$resize && empty($options['auto_orient'])) {
            if ($file_path !== $new_file_path) {
                return copy($file_path, $new_file_path);
            }
            return true;
        }
        $cmd = $this->options['convert_bin'];
        if (!empty($this->options['convert_params'])) {
            $cmd .= ' '.$this->options['convert_params'];
        }
        $cmd .= ' '.escapeshellarg($file_path);
        if (!empty($options['auto_orient'])) {
            $cmd .= ' -auto-orient';
        }
        if ($resize) {
            // Handle animated GIFs:
            $cmd .= ' -coalesce';
            if (empty($options['crop'])) {
                $cmd .= ' -resize '.escapeshellarg($resize.'>');
            } else {
                $cmd .= ' -resize '.escapeshellarg($resize.'^');
                $cmd .= ' -gravity center';
                $cmd .= ' -crop '.escapeshellarg($resize.'+0+0');
            }
            // Make sure the page dimensions are correct (fixes offsets of animated GIFs):
            $cmd .= ' +repage';
        }
        if (!empty($options['convert_params'])) {
            $cmd .= ' '.$options['convert_params'];
        }
        $cmd .= ' '.escapeshellarg($new_file_path);
        exec($cmd, $output, $error);
        if ($error) {
            error_log(implode('\n', $output));
            return false;
        }
        return true;
    }

    protected function get_image_size($file_path) {
        if ($this->options['image_library']) {
            if (extension_loaded('imagick')) {
                $image = new \Imagick();
                try {
                    if (@$image->pingImage($file_path)) {
                        $dimensions = array($image->getImageWidth(), $image->getImageHeight());
                        $image->destroy();
                        return $dimensions;
                    }
                    return false;
                } catch (\Exception $e) {
                    error_log($e->getMessage());
                }
            }
            if ($this->options['image_library'] === 2) {
                $cmd = $this->options['identify_bin'];
                $cmd .= ' -ping '.escapeshellarg($file_path);
                exec($cmd, $output, $error);
                if (!$error && !empty($output)) {
                    // image.jpg JPEG 1920x1080 1920x1080+0+0 8-bit sRGB 465KB 0.000u 0:00.000
                    $infos = preg_split('/\s+/', substr($output[0], strlen($file_path)));
                    $dimensions = preg_split('/x/', $infos[2]);
                    return $dimensions;
                }
                return false;
            }
        }
        if (!function_exists('getimagesize')) {
            error_log('Function not found: getimagesize');
            return false;
        }
        return @getimagesize($file_path);
    }

    protected function create_scaled_image($file_name, $version, $options) {
        if ($this->options['image_library'] === 2) {
            return $this->imagemagick_create_scaled_image($file_name, $version, $options);
        }
        if ($this->options['image_library'] && extension_loaded('imagick')) {
            return $this->imagick_create_scaled_image($file_name, $version, $options);
        }
        return $this->gd_create_scaled_image($file_name, $version, $options);
    }

    protected function destroy_image_object($file_path) {
        if ($this->options['image_library'] && extension_loaded('imagick')) {
            return $this->imagick_destroy_image_object($file_path);
        }
    }

    protected function is_valid_image_file($file_path) {
        if (!preg_match($this->options['image_file_types'], $file_path)) {
            return false;
        }
        if (function_exists('exif_imagetype')) {
            return @exif_imagetype($file_path);
        }
        $image_info = $this->get_image_size($file_path);
        return $image_info && $image_info[0] && $image_info[1];
    }

    protected function handle_image_file($file_path, $file) {
        $failed_versions = array();
        foreach ($this->options['image_versions'] as $version => $options) {
            if ($this->create_scaled_image($file->name, $version, $options)) {
                if (!empty($version)) {
                    $file->{$version.'Url'} = $this->get_download_url(
                        $file->name,
                        $version
                    );
                } else {
                    $file->size = $this->get_file_size($file_path, true);
                }
            } else {
                $failed_versions[] = $version ? $version : 'original';
            }
        }
        if (count($failed_versions)) {
            $file->error = $this->get_error_message('image_resize')
                    .' ('.implode($failed_versions, ', ').')';
        }
        // Free memory:
        $this->destroy_image_object($file_path);
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $app = $this->options['prototype'];
        $target = ['image/jpeg', 'image/gif', 'image/webp', 'image/png'];
        if ( in_array( $type, $target ) && function_exists( 'exif_imagetype' ) ) {
            $check_type = PTUtil::image_types( $type, exif_imagetype( $uploaded_file ) );
            if (! $check_type ) {
                return $app->json_error( 'The image format are Invalid. Please confirm the file.' );
            }
        }
        $denied_exts = strtolower( $app->denied_exts );
        $denied_exts = preg_split( '/\s*,\s*/', $denied_exts );
        $file = new \stdClass();
        $file->name = $this->get_file_name($uploaded_file, $name, $size, $type, $error,
            $index, $content_range);
        $file->size = $this->fix_integer_overflow((int)$size);
        $file_path = $this->get_upload_path($file->name);
        $extension = PTUtil::get_extension( $file_path );
        $type = PTUtil::get_mime_type( $extension );
        $file->type = $type;
        if ($this->validate($uploaded_file, $file, $error, $index)) {
            $this->handle_form_data($file, $index);
            $upload_dir = $this->get_upload_path();
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, $this->options['mkdir_mode'], true);
            }
            $this->upload_file = $file_path;
            $this->extension = $extension;
            $basename = basename( $file_path );
            if ( in_array( $extension, $denied_exts ) ) {
                $error = $app->translate( "'%s' is not allowed to upload by system settings.", $basename );
                header( 'Content-type: application/json' );
                echo json_encode( ['message'=> $error ] );
                exit();
            // } else if ( mb_substr_count( $basename, '.' ) > 1 ) {
                // ex. .php.gz
                /*
                $exts = explode( '.', $basename );
                array_shift( $exts );
                foreach ( $exts as $ext ) {
                    $ext = strtolower( $ext );
                    if ( in_array( $ext, $denied_exts ) ) {
                        $error = $app->translate( "'%s' is not allowed to upload by system settings.", $basename );
                        header( 'Content-type: application/json' );
                        echo json_encode( ['message'=> $error ] );
                        exit();
                    }
                }
                */
            }
            $append_file = $content_range && is_file($file_path) &&
                $file->size > $this->get_file_size($file_path);
            if ($uploaded_file) { // && is_uploaded_file($uploaded_file)
                // multipart/formdata uploads (POST method uploads)
                if ($append_file) {
                    file_put_contents(
                        $file_path,
                        fopen($uploaded_file, 'r'),
                        FILE_APPEND
                    );
                } else {
                    // move_uploaded_file($uploaded_file, $file_path);
                    if (!isset($this->options['no_upload'])){
                        rename($uploaded_file, $file_path);
                    }
                    //} else {
                    //    $file_path = $uploaded_file;
                    //}
                }
            } else {
                // Non-multipart uploads (PUT method support)
                file_put_contents(
                    $file_path,
                    fopen($this->options['input_stream'], 'r'),
                    $append_file ? FILE_APPEND : 0
                );
            }
            $file_size = $this->get_file_size($file_path, $append_file);
            if ($file_size === $file->size || defined('NOT_VERIFY_THE_IMAGE')) {
                $file->url = $this->get_download_url($file->name);
                if ($this->is_valid_image_file($file_path)) {
                    $this->handle_image_file($file_path, $file);
                }
            } else {
                $file->size = $file_size;
                if (!$content_range && $this->options['discard_aborted_uploads']) {
                    $file->error = $this->get_error_message('abort');
                }
            }
            // From Prototype
            // Save session
            $magic = $this->options['magic'];
            $user_id = $this->options['user_id'];
            if ( $app->param( '__mode' ) != 'upload_multi' ) {
                $sess = $app->db->model( 'session' )
                    ->get_by_key( [ 'name' => $magic,
                                    'user_id' => $user_id, 'kind' => 'UP' ] );
                // $sess->key($type);
                list($width, $height) = getimagesize($file_path);
                $class = $this->get_asset_class();
                // $sess->value("{$size}:{$width}:{$height}:{$class}:{$extension}");
                $filename = basename($file_path);
                $basename = preg_replace( "/\.$extension$/i", "", $filename );
                $ts = date( 'Y-m-d H:i:s' );
                $user_id = $app->user()->id;
                $sess->user_id( $user_id );
                $sess->start( time() );
                $sess->expires( time() + $app->sess_timeout );
                if ( $app->workspace() ) {
                    $sess->workspace_id( $app->workspace()->id );
                }
                $props = [
                    'file_size'    => $file->size,
                    'image_width'  => $width,
                    'image_height' => $height,
                    'class'        => $class,
                    'extension'    => $extension,
                    'basename'     => $basename,
                    'uploaded'     => $ts,
                    'user_id'      => $user_id,
                    'mime_type'    => $type,
                    'file_name'    => $filename,
                ];
                $this->basename = $basename;
                if ( $app->mode == 'upload_objects' ) {
                    $props['file_path'] = $file_path;
                    // TODO cleanup session.
                } else {
                    $session_no_data = $this->options['session_no_data'];
                    if (! $session_no_data ) {
                        $max_packet = $app->db->get_max_packet();
                        if ( $max_packet && $max_packet <= filesize( $file_path ) ) {
                            return $app->json_error( 'The file you uploaded is too large.' );
                        }
                        $sess->data(file_get_contents($file_path));
                    } else {
                        $sess->data($file_path);
                    }
                }
                $sess->value( $file_path );
                $basename = quotemeta(basename($file_path));
                $thumbnail = preg_replace( "/($basename$)/", "thumbnail/$1", $file_path );
                $square = preg_replace( "/($basename$)/", "thumbnail/square-$1", $file_path );
                if ( $extension == 'webp' ) {
                    $this->__thumbnail_webp( $app, $file_path, $thumbnail, $square );
                }
                if ( file_exists($thumbnail) ) {
                    $data = file_get_contents($thumbnail);
                    $this->thumbnail_data = base64_encode($data);
                    $sess->metadata($data);
                    $this->thumbnail_file = $thumbnail;
                } else {
                    $sess->metadata('');
                    $this->thumbnail_file = '';
                }
                if (file_exists($square)) {
                    $data = file_get_contents($square);
                    $this->thumb_square_data = base64_encode($data);
                    $sess->extradata($data);
                    $this->square_file = $square;
                } else {
                    $sess->extradata('');
                }
                // TODO::Check Max Packet Size.
                // $filename = basename($file_path);
                // $filename = preg_replace( "/\.$extension$/", "", $filename );
                $sess->text(json_encode($props));
                $sess->save();
            }
            $this->set_additional_file_properties($file);
        }
        return $file;
    }

    protected function __thumbnail_webp ( $app, $file_path, $thumbnail, $square ) {
        $max_width = isset($this->options['thumbnail']['max_width'])
                   && $this->options['thumbnail']['max_width'] ? $this->options['thumbnail']['max_width'] : 256;
        $square_size = $max_width / 2;
        $square_size = (int) $square_size;
        if (! $square_size ) $square_size = 1;
        mkdir( dirname( $thumbnail ), 0755, true );
        list( $orig_width, $orig_height ) = getimagesize( $file_path );
        $width  = $orig_width;
        $height = $orig_height;
        if ( $width > $height ) {
            $diff  = ( $width - $height ) * 0.5; 
            $diffW = $height;
            $diffH = $height;
            $diffY = 0;
            $diffX = $diff;
            $scale = $max_width / $width;
            $width = $max_width;
            $height = $height * $scale;
            $height = (int) $height;
        } else {
            if( $width == $height ) {
                $diffW = $width;
                $diffH = $height;
                $diffY = 0;
                $diffX = 0;
            } else {
                $diff  = ( $height - $width ) * 0.5; 
                $diffW = $width;
                $diffH = $width;
                $diffY = $diff;
                $diffX = 0;
            }
            $scale = $max_width / $height;
            $height = $max_width;
            $width = $width * $scale;
            $width = (int) $width;
        }
        if (! $width ) $width = 1;
        if (! $height ) $height = 1;
        $is_animated = PTUtil::is_webp_animated( $file_path );
        if (! $is_animated && function_exists( 'imagecreatefromwebp' ) ) {
            $src_img = imagecreatefromwebp( $file_path );
            $square_image = imagecreatetruecolor( $square_size, $square_size );
            imagealphablending($square_image, false);
            imagesavealpha($square_image, true);
            imagecopyresampled( $square_image, $src_img, 0, 0, $diffX, $diffY, $square_size, $square_size, $diffW, $diffH );
            imagewebp( $square_image, $square, $app->image_quality );
            $thumb_image = imagecreatetruecolor( $width, $height );
            imagealphablending($thumb_image, false);
            imagesavealpha($thumb_image, true);
            imagecopyresampled( $thumb_image, $src_img, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height );
            imagewebp( $thumb_image, $thumbnail, $app->image_quality );
            imagedestroy( $src_img );
            imagedestroy( $square_image );
            imagedestroy( $thumb_image );
        } else if ( $convert_path = $app->imagick_convert_path ) {
            $convert_path = escapeshellcmd( $convert_path );
            $file_path = escapeshellarg( $file_path );
            $square = escapeshellarg( $square );
            $thumbnail = escapeshellarg( $thumbnail );
            if ( $width > $height ) {
                $cmd = "{$convert_path} {$file_path} -resize {$square_size}x -resize x{$square_size}";
            } else {
                $cmd = "{$convert_path} {$file_path} -resize x{$square_size} -resize {$square_size}x";
            }
            $cmd .= " -gravity center -crop {$square_size}x{$square_size}+0+0 {$square}";
            exec( $cmd, $output, $return_var );
            $cmd = "{$convert_path} {$file_path} -resize {$width}x{$height} {$thumbnail}";
            exec( $cmd, $output, $return_var );
        } else {
            $app->fmgr->copy( $file_path, $thumbnail );
            $app->fmgr->copy( $file_path, $square );
        }
    }

    protected function __handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $app = $this->options['prototype'];
        if ( stripos( $type, 'image/' ) === 0 ) {
            $check_type = PTUtil::image_types( $type, exif_imagetype( $uploaded_file ) );
            if (! $check_type ) {
                return $app->json_error( 'The image format are Invalid. Please confirm the file.' );
            }
        }
        $file = new \stdClass();
        $file->name = $this->get_file_name($uploaded_file, $name, $size, $type, $error,
            $index, $content_range);
        $file->size = $this->fix_integer_overflow((int)$size);
        $file->type = $type;
        if ($this->validate($uploaded_file, $file, $error, $index)) {
            $this->handle_form_data($file, $index);
            $upload_dir = $this->get_upload_path();
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, $this->options['mkdir_mode'], true);
            }
            $file_path = $this->get_upload_path($file->name);
            $append_file = $content_range && is_file($file_path) &&
                $file->size > $this->get_file_size($file_path);
            if ($uploaded_file && (is_uploaded_file($uploaded_file) || defined('NOT_VERIFY_THE_IMAGE'))) {
                // multipart/formdata uploads (POST method uploads)
                if ($append_file) {
                    file_put_contents(
                        $file_path,
                        fopen($uploaded_file, 'r'),
                        FILE_APPEND
                    );
                } else {
                    if (defined('NOT_VERIFY_THE_IMAGE')) {
                        rename($uploaded_file, $file_path);
                    } else {
                        move_uploaded_file($uploaded_file, $file_path);
                    }
                }
            } else {
                // Non-multipart uploads (PUT method support)
                file_put_contents(
                    $file_path,
                    fopen($this->options['input_stream'], 'r'),
                    $append_file ? FILE_APPEND : 0
                );
            }
            $file_size = $this->get_file_size($file_path, $append_file);
            if ($file_size === $file->size || defined('NOT_VERIFY_THE_IMAGE')) {
                $file->url = $this->get_download_url($file->name);
                if ($this->is_valid_image_file($file_path)) {
                    $this->handle_image_file($file_path, $file);
                }
            } else {
                $file->size = $file_size;
                if (!$content_range && $this->options['discard_aborted_uploads']) {
                    $file->error = $this->get_error_message('abort');
                }
            }
            $this->upload_file = $file_path;
            $this->extension = strtolower(pathinfo( $file_path )['extension']);
            $extension = $this->extension;
            $basename = basename( $file_path );
            $basename = preg_replace( "/\.{$extension}$/", '', $basename );
            $this->basename = $basename;
            $this->set_additional_file_properties($file);
        }
        return $file;
    }

    protected function get_asset_class () {
        $extension = strtolower( $this->extension );
        $app = $this->options['prototype'];
        if (in_array($extension, $app->videos)) {
            return 'video';
        } elseif (in_array($extension, $app->images)) {
            return 'image';
        } elseif (in_array($extension, $app->audios)) {
            return 'audio';
        } elseif ($extension==='pdf') {
            return 'pdf';
        } else {
            return 'file';
        }
    }

    protected function readfile($file_path) {
        $file_size = $this->get_file_size($file_path);
        $chunk_size = $this->options['readfile_chunk_size'];
        if ($chunk_size && $file_size > $chunk_size) {
            $handle = fopen($file_path, 'rb');
            while (!feof($handle)) {
                echo fread($handle, $chunk_size);
                @ob_flush();
                @flush();
            }
            fclose($handle);
            return $file_size;
        }
        return readfile($file_path);
    }

    protected function body($str) {
        echo $str;
    }

    protected function header($str) {
        header($str);
    }

    function get_upload_data($id) {
        $app = $this->options['prototype'];
        if ( isset( $_FILES[$id]['error'] ) && $_FILES[$id]['error'] === UPLOAD_ERR_INI_SIZE ) {
            return $app->json_error( 'The file you uploaded is too large.' );
        }
        if ( $app->no_encode_filename || $app->hash_multibyte_filename ) {
            return @$_FILES[$id];
        }
        $basename_len = $app->basename_len;
        $truncate = $basename_len / 3;
        $truncate = (int) $truncate;
        $truncate = "{$truncate}+…";
        $name = $_FILES[$id]['name'];
        if ( is_array( $name ) ) {
            $new_names = array();
            foreach ( $name as $n ) {
                $n = str_replace( DS, '', $n );
                $n = PTUtil::normalize( $n );
                if ( strlen( $n ) === mb_strlen( $n ) ) {
                } else {
                    if ( rawurlencode( $n ) != $n && strlen( $n ) > $basename_len ) {
                        $extension = $this->get_extension( $n );
                        $n = $this->truncate( $n, $truncate ) . '.' . $extension;
                    }
                    $n = $this->encode_multibyte_chars( $n );
                }
                $new_names[] = $n;
            }
            $_FILES[$id]['name'] = $new_names;
        } else {
            $name = str_replace( DS, '', $name );
            $name = PTUtil::normalize( $name );
            if ( strlen( $name ) === mb_strlen( $name ) ) {
                return @$_FILES[$id];
            }
            if ( rawurlencode( $name ) != $name && strlen( $name ) > $basename_len ) {
                $extension = $this->get_extension( $name );
                $name = $this->truncate( $name, $truncate ) . '.' . $extension;
            }
            $name = $this->encode_multibyte_chars( $name );
            $_FILES[$id]['name'] = $name;
        }
        return @$_FILES[$id];
    }

    function encode_multibyte_chars ( $name ) {
        $chars = preg_split( '//u', $name );
        $encoded = '';
        foreach ( $chars as $char ) {
            if ( strlen( $char ) === mb_strlen( $char ) ) {
                $encoded .= $char;
            } else {
                $encoded .= rawurlencode( $char );
            }
        }
        return $encoded;
    }

    protected function truncate ($str, $len) {
        list ( $plus, $tail ) = [false, ''];
        if ( is_array( $len ) ) {
            $middle = isset( $len[3] ) ? $len[3] : null;
            $break_words = isset( $len[2] ) ? $len[2] : null;
            $tail = isset( $len[1] ) ? $len[1] : null;
            $len = $len[0];
        }
        if ( strpos( $len, '+' ) !== false ) {
            list( $len, $tail ) = explode( '+', $len );
            $plus = true;
        }
        $len = (int) $len;
        if ( $len === 0 ) return;
        if ( mb_strlen( $str ) > $len ) {
            $len -= min( $len, mb_strlen( $tail ) );
            if (!isset( $plus ) && !isset( $break_words ) && !isset( $middle ) )
                $str = preg_replace( '/\s+?(\S+)?$/u', '',
                    mb_substr( $str, 0, $len + 1, 'UTF-8' ) );
            if ( $plus ) $len += mb_strlen( $tail );
            if (!isset( $middle ) ) return mb_substr( $str, 0, $len, 'utf-8' ) . $tail;
            $str = mb_substr( $str, 0, $len / 2, 'utf-8' )
                . $tail . mb_substr( $str, - $len / 2, 'utf-8' );
        }
        return $str;
    }

    protected function get_extension ($path) {
        if ( strpos( $path, '.' ) === false ) {
            return '';
        }
        $parts = explode( '.', $path );
        $extIndex = count( $parts ) - 1;
        $extension = strtolower( @$parts[ $extIndex ] );
        return $extension;
    }

    protected function get_post_param($id) {
        return isset($_POST[$id]) ? @$_POST[$id] : '';
    }

    protected function get_query_param($id) {
        return @$_GET[$id];
    }

    protected function get_server_var($id) {
        return isset($_SERVER[$id]) ? @$_SERVER[$id] : '';
    }

    protected function handle_form_data($file, $index) {
        // Handle form data, e.g. $_POST['description'][$index]
    }

    protected function get_version_param() {
        return $this->basename(stripslashes($this->get_query_param('version')));
    }

    protected function get_singular_param_name() {
        return substr($this->options['param_name'], 0, -1);
    }

    protected function get_file_name_param() {
        $name = $this->get_singular_param_name();
        return $this->basename(stripslashes($this->get_query_param($name)));
    }

    protected function get_file_names_params() {
        $params = $this->get_query_param($this->options['param_name']);
        if (!$params) {
            return null;
        }
        foreach ($params as $key => $value) {
            $params[$key] = $this->basename(stripslashes($value));
        }
        return $params;
    }

    protected function get_file_type($file_path) {
        switch (strtolower(pathinfo($file_path, PATHINFO_EXTENSION))) {
            case 'jpeg':
            case 'jpg':
                return 'image/jpeg';
            case 'png':
                return 'image/png';
            case 'gif':
                return 'image/gif';
            default:
                return '';
        }
    }

    protected function download() {
        switch ($this->options['download_via_php']) {
            case 1:
                $redirect_header = null;
                break;
            case 2:
                $redirect_header = 'X-Sendfile';
                break;
            case 3:
                $redirect_header = 'X-Accel-Redirect';
                break;
            default:
                return $this->header('HTTP/1.1 403 Forbidden');
        }
        $file_name = $this->get_file_name_param();
        if (!$this->is_valid_file_object($file_name)) {
            return $this->header('HTTP/1.1 404 Not Found');
        }
        if ($redirect_header) {
            return $this->header(
                $redirect_header.': '.$this->get_download_url(
                    $file_name,
                    $this->get_version_param(),
                    true
                )
            );
        }
        $file_path = $this->get_upload_path($file_name, $this->get_version_param());
        // Prevent browsers from MIME-sniffing the content-type:
        $this->header('X-Content-Type-Options: nosniff');
        if (!preg_match($this->options['inline_file_types'], $file_name)) {
            $this->header('Content-Type: application/octet-stream');
            $this->header('Content-Disposition: attachment; filename="'.$file_name.'"');
        } else {
            $this->header('Content-Type: '.$this->get_file_type($file_path));
            $this->header('Content-Disposition: inline; filename="'.$file_name.'"');
        }
        $this->header('Content-Length: '.$this->get_file_size($file_path));
        $this->header('Last-Modified: '.gmdate('D, d M Y H:i:s T', filemtime($file_path)));
        $this->readfile($file_path);
    }

    protected function send_content_type_header() {
        $this->header('Vary: Accept');
        if (strpos($this->get_server_var('HTTP_ACCEPT'), 'application/json') !== false) {
            $this->header('Content-type: application/json');
        } else {
            $this->header('Content-type: text/plain');
        }
    }

    protected function send_access_control_headers() {
        $this->header('Access-Control-Allow-Origin: '.$this->options['access_control_allow_origin']);
        $this->header('Access-Control-Allow-Credentials: '
            .($this->options['access_control_allow_credentials'] ? 'true' : 'false'));
        $this->header('Access-Control-Allow-Methods: '
            .implode(', ', $this->options['access_control_allow_methods']));
        $this->header('Access-Control-Allow-Headers: '
            .implode(', ', $this->options['access_control_allow_headers']));
    }

    public function generate_response($content, $print_response = true) {
        $this->response = $content;
        $resized = isset( $this->options['resized'] ) ? $this->options['resized'] : null;
        $content['files'][0]->resized = $resized;
        if ($print_response) {
            $app = $this->options['prototype'];
            $file = (array) $content['files'][0];
            $file_ext = $file['extension'];
            $label = $file['name'];
            $upload_dir = $this->options['upload_dir'];
            $upload_dir = rtrim( $upload_dir, DS );
            $path = realpath( $upload_dir . DS . $label );
            if ( $file_ext == 'svg' ) {
                $content['files'][0]->thumbnail = base64_encode( file_get_contents( $path ) );
                $content['files'][0]->thumbnail_square = $content['files'][0]->thumbnail;
            }
            $json = json_encode($content);
            $redirect = stripslashes($this->get_post_param('redirect'));
            if ($redirect && preg_match($this->options['redirect_allow_target'], $redirect)) {
                $this->header('Location: '.sprintf($redirect, rawurlencode($json)));
                return;
            }
            $this->head();
            if ($this->get_server_var('HTTP_CONTENT_RANGE')) {
                $files = isset($content[$this->options['param_name']]) ?
                    $content[$this->options['param_name']] : null;
                if ($files && is_array($files) && is_object($files[0]) && $files[0]->size) {
                    $this->header('Range: 0-'.(
                        $this->fix_integer_overflow((int)$files[0]->size) - 1
                    ));
                }
            }
            if ( $app->param( '__mode' ) == 'upload_multi' ) {
                $file_name = $file['name'];
                $mime_type = $file['type'];
                $size = $file['size'];
                $class = $file['class'];
                $image_width = ( $class == 'image' ) ? $file['width'] : '';
                $image_height = ( $class == 'image' ) ? $file['height'] : '';
                if ( $class == 'image' ) {
                    $thumbnail = dirname( $path ) . DS . 'thumbnail' . DS . $label;
                    $square = dirname( $path ) . DS . 'thumbnail' . DS . "square-{$label}";
                    if (! file_exists( $square ) && file_exists( $thumbnail ) ) {
                        $square = $thumbnail;
                    }
                }
                $extra_path = $app->param( 'extra_path' );
                $extra_path = $app->sanitize_dir( $extra_path );
                $basename = $file['basename'];
                if (! $basename ) {
                    $basename = basename( $file_name );
                    $basename = preg_replace( "/\.{$file_ext}$/", '', $basename );
                }
                $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
                if (! $app->param( 'file_attachment' ) ) {
                    $app->db->in_duplicate = true; // Not remove blob file.
                    $method = $app->param( 'overwrite' ) ? 'get_by_key' : 'new';
                    if ( $method == 'get_by_key' && $app->path_upperlower ) {
                        $asset = $app->db->model( 'asset' )->$method( ['workspace_id' => $workspace_id,
                                                                       'extra_path' => ['BINARY' => $extra_path ],
                                                                       'file_name' => ['BINARY' => $file_name ] ] );
                    } else {
                        $asset = $app->db->model( 'asset' )->$method( ['workspace_id' => $workspace_id,
                                                                       'extra_path' => $extra_path,
                                                                       'file_name' => $file_name ] );
                    }
                    $original = $method == 'get_by_key' && $asset->id ? clone $asset : null;
                    if ( $original ) {
                        $app->db->cleanup_blob = false;
                    }
                    $is_new = true;
                    $orig_relations = [];
                    $orig_metadata = [];
                    if ( $original ) {
                        if (! $app->upload_compat ) {
                            $max_status = $app->max_status( $app->user(), 'asset' );
                            if ( $original->status > $max_status ) {
                                return $app->json_error( 'Permission denied.' );
                            }
                        }
                        $label = $original->label;
                        $orig_relations = $app->get_relations( $original );
                        $orig_metadata = $app->get_meta( $original );
                        $original->_relations = $orig_relations;
                        $original->_meta = $orig_metadata;
                        $original->id( null );
                        $is_new = false;
                    } else {
                        $label = urldecode( $basename );
                    }
                    $asset->set_values(
                        ['label' => $label, 'extra_path' => $extra_path,
                         'image_width' => $image_width, 'image_height' => $image_height,
                         'class' => $class, 'size' => $size, 'file_name' => $file_name,
                         'file_ext' => $file_ext, 'mime_type' => $mime_type,
                         'workspace_id' => $workspace_id ] );
                    $max_packet = $app->db->get_max_packet();
                    if ( $max_packet && $max_packet <= filesize( $path ) ) {
                        return $app->json_error( 'The file you uploaded is too large.' );
                    }
                    $asset->file( file_get_contents( $path ) );
                    $app->set_default( $asset );
                    $callback = ['name' => 'save_filter', 'error' => '', 'is_new' => $is_new ];
                    $filter = $app->save_filter_asset( $callback, $app, $asset );
                    if (! $filter && $callback['error'] ) {
                        return $app->json_error( $callback['error'] );
                    }
                    $res = $asset->save();
                    if (! $res || ! $asset->id ) {
                        $errors = $app->db->errors;
                        if (! empty( $errors ) ) {
                            $msg = $errors[ array_key_last( $errors ) ];
                        } else {
                            $msg = $app->translate( 'An error occurred while saving %s.', $app->translate( 'Asset' ) );
                        }
                        return $app->json_error( $msg );
                    }
                    $basename = basename( $basename, $file_ext );
                    $meta = $app->db->model( 'meta' )->$method( ['model' => 'asset',
                         'object_id' => $asset->id, 'kind' => 'metadata', 'key' => 'file'] );
                    $metadata = ['file_size' => $size, 'image_width' => $image_width,
                                 'image_height' => $image_height, 'class' => $class,
                                 'extension' => $file_ext, 'basename' => $basename,
                                 'mime_type' => $mime_type, 'file_name' => $file_name ];
                    if ( $original && $meta->id ) {
                        $orig_meta = json_decode( $meta->text, true );
                        $metadata = array_merge( $orig_meta, $metadata );
                    }
                    $metadata['uploaded'] = date( 'Y-m-d H:i:s' );
                    $metadata['user_id'] = $app->user()->id;
                    $meta->text( json_encode( $metadata ) );
                    if ( $file_ext == 'webp' ) {
                        $this->__thumbnail_webp( $app, $path, $thumbnail, $square );
                    }
                    if ( $class == 'image' ) {
                        if ( file_exists( $thumbnail ) ) {
                            $meta->data( file_get_contents( $thumbnail ) );
                        }
                        if ( file_exists( $square ) ) {
                            $meta->metadata( file_get_contents( $square ) );
                        }
                        if ( $app->assets_c && is_dir( $app->assets_c ) ) {
                            $asset_id = $asset->id;
                            $thumb_name = "thumb-asset-128xauto-square-{$asset_id}-file.{$file_ext}";
                            copy ( $square, $app->assets_c . DS . $thumb_name );
                        }
                    }
                    $meta->save();
                    $changed_cols = [];
                    if ( $original ) {
                        if ( base64_encode( $asset->file ) !== base64_encode( $original->file ) ) {
                            require_once( LIB_DIR . 'Prototype' . DS . 'class.PTUtil.php' );
                            $changed_cols = PTUtil::object_diff( $app, $asset, $original );
                            PTUtil::pack_revision( $asset, $original, $changed_cols );
                        }
                    }
                    $nickname = $app->user()->nickname;
                    $params = [ $app->translate( 'Asset' ), $label, $asset->id, $nickname ];
                    $message = $is_new ? $app->translate( "%1\$s '%2\$s(ID:%3\$s)' created by %4\$s.", $params )
                             : $app->translate( "%1\$s '%2\$s(ID:%3\$s)' edited by %4\$s.", $params );
                    $original = $original ? $original : clone $asset;
                    $callback = ['name' => 'post_save', 'error' => '', 'is_new' => $is_new,
                                 'original' => $original ];
                    $app->post_save_asset( $callback, $app, $asset );
                    $log = $app->log( ['message'   => $message,
                                       'category'  => 'save',
                                       'model'     => 'asset',
                                       'object_id' => $asset->id,
                                       'level'     => 'info'] );
                    $app->init_callbacks( 'asset', 'save' );
                    $callback = ['name' => 'post_save', 'is_new' => $is_new,
                                 'changed_cols' => $changed_cols, 'orig_relations' => $orig_relations,
                                 'orig_metadata' => $orig_metadata, 'log' => $log ];
                    $app->run_callbacks( $callback, 'asset', $asset, $original );
                    $content['files'][0]->asset_id = $asset->id;
                } else {
                    $magic = $this->options['magic'];
                    $user_id = $this->options['user_id'];
                    $sess = $app->db->model( 'session' )
                        ->new( ['name' => $magic,
                                'user_id' => $user_id, 'kind' => 'UP'] );
                    $ts = date( 'Y-m-d H:i:s' );
                    $sess->user_id( $user_id );
                    $sess->start( time() );
                    $sess->expires( time() + $app->sess_timeout );
                    if ( $app->workspace() ) {
                        $sess->workspace_id( $app->workspace()->id );
                    }
                    $basename = basename( $basename, $file_ext );
                    $props = [
                        'file_size'    => $size,
                        'image_width'  => $image_width,
                        'image_height' => $image_height,
                        'class'        => $class,
                        'extension'    => $file_ext,
                        'basename'     => $basename,
                        'uploaded'     => $ts,
                        'user_id'      => $user_id,
                        'mime_type'    => $mime_type,
                        'file_name'    => $file_name,
                    ];
                    $sess->key( $mime_type );
                    $sess->value( $file_name );
                    $session_no_data = $this->options['session_no_data'];
                    if (! $session_no_data ) {
                        $max_packet = $app->db->get_max_packet();
                        if ( $max_packet && $max_packet <= filesize( $path ) ) {
                            return $app->json_error( 'The file you uploaded is too large.' );
                        }
                        $sess->data(file_get_contents($path));
                    } else {
                        $sess->data($path);
                    }
                    $thumb_base64 = '';
                    $square_base64 = '';
                    if ( $class == 'image' ) {
                        if ( file_exists( $thumbnail ) ) {
                            $thumb_data = file_get_contents( $thumbnail );
                            $thumb_base64 = base64_encode( $thumb_data );
                            $sess->metadata( $thumb_data );
                        }
                        if ( file_exists( $square ) ) {
                            $square_data = file_get_contents( $square );
                            $square_base64 = base64_encode( $square_data );
                            $sess->extradata( $square_data );
                        } else {
                            $sess->extradata( $sess->metadata );
                        }
                    }
                    if (! $thumb_base64 ) {
                        $thumb = base64_encode(
                            $app->get_alternative_icon( $class, $file_ext ) );
                        $thumb_base64 = $thumb;
                        $square_base64 = $thumb;
                    }
                    $sess->text(json_encode($props));
                    $sess->save();
                    $content['files'][0]->session_id = $sess->id;
                    if (! isset( $content['files'][0]->thumbnail ) ||! $content['files'][0]->thumbnail ) {
                        $content['files'][0]->thumbnail = $thumb_base64;
                    }
                    if (! isset( $content['files'][0]->thumbnail_square ) ||! $content['files'][0]->thumbnail_square ) {
                        $content['files'][0]->thumbnail_square = $square_base64 ? $square_base64 : $thumb_base64;
                    }
                    $content['files'][0]->type = $mime_type;
                    $content['files'][0]->class = $class;
                }
                $this->response = $content;
                $json = json_encode($content);
            }
            $this->body($json);
        }
        $app = $this->options['prototype'];
        if ( $app->param( '__mode' ) == 'upload_multi' ) {
            return $content;
        }
        return $content;
    }

    public function get_response () {
        return $this->response;
    }

    public function head() {
        $this->header('Pragma: no-cache');
        $this->header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->header('Content-Disposition: inline; filename="files.json"');
        // Prevent Internet Explorer from MIME-sniffing the content-type:
        $this->header('X-Content-Type-Options: nosniff');
        if ($this->options['access_control_allow_origin']) {
            $this->send_access_control_headers();
        }
        $this->send_content_type_header();
    }

    public function get($print_response = true) {
        if ($print_response && $this->get_query_param('download')) {
            return $this->download();
        }
        $file_name = $this->get_file_name_param();
        if ($file_name) {
            $response = array(
                $this->get_singular_param_name() => $this->get_file_object($file_name)
            );
        } else {
            $response = array(
                $this->options['param_name'] => $this->get_file_objects()
            );
        }
        return $this->generate_response($response, $print_response);
    }

    public function post($print_response = true) {
        /*
        if ($this->get_query_param('_method') === 'DELETE') {
            return $this->delete($print_response);
        }
        
        */
        $upload = $this->get_upload_data($this->options['param_name']);
        // Parse the Content-Disposition header, if available:
        $content_disposition_header = $this->get_server_var('HTTP_CONTENT_DISPOSITION');
        $file_name = $content_disposition_header ?
            rawurldecode(preg_replace(
                '/(^[^"]+")|("$)/',
                '',
                $content_disposition_header
            )) : null;
        // Parse the Content-Range header, which has the following form:
        // Content-Range: bytes 0-524287/2000000
        $content_range_header = $this->get_server_var('HTTP_CONTENT_RANGE');
        $content_range = $content_range_header ?
            preg_split('/[^0-9]+/', $content_range_header) : null;
        $size =  $content_range ? $content_range[3] : null;
        $files = array();
        $app = $this->options['prototype'];
        $meth = 'handle_file_upload';
        if ( $app->param( '__mode' ) != 'edit_image' ) {
            if (! isset($this->options['magic'] ) ) $meth = '__handle_file_upload';
        }
        if ($upload) {
            if (is_array($upload['tmp_name'])) {
                // param_name is an array identifier like "files[]",
                // $upload is a multi-dimensional array:
                foreach ($upload['tmp_name'] as $index => $value) {
                    $files[] = $this->$meth(
                        $upload['tmp_name'][$index],
                        $file_name ? $file_name : $upload['name'][$index],
                        $size ? $size : $upload['size'][$index],
                        $upload['type'][$index],
                        $upload['error'][$index],
                        $index,
                        $content_range
                    );
                }
            } else {
                // param_name is a single object identifier like "file",
                // $upload is a one-dimensional array:
                $files[] = $this->$meth(
                    isset($upload['tmp_name']) ? $upload['tmp_name'] : null,
                    $file_name ? $file_name : (isset($upload['name']) ?
                            $upload['name'] : null),
                    $size ? $size : (isset($upload['size']) ?
                            $upload['size'] : $this->get_server_var('CONTENT_LENGTH')),
                    isset($upload['type']) ?
                            $upload['type'] : $this->get_server_var('CONTENT_TYPE'),
                    isset($upload['error']) ? $upload['error'] : null,
                    null,
                    $content_range
                );
            }
        }
        $response = array($this->options['param_name'] => $files);
        return $this->generate_response($response, $print_response);
    }

    protected function basename($filepath, $suffix = '') {
        $splited = preg_split('/\//', rtrim ($filepath, '/ '));
        return substr(basename('X'.$splited[count($splited)-1], $suffix), 1);
    }
}