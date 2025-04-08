<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

use Aws\Command;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Aws\S3\MultipartUploader;
use Aws\Exception\MultipartUploadException;
use Aws\Credentials\CredentialProvider;
use Aws\MediaConvert\MediaConvertClient;
use Aws\Exception\AwsException;

class AWS_S3 extends PTPlugin {

    protected $buckets    = [];
    protected $acls       = [];
    protected $regions    = [];
    protected $extensions = [];
    protected $exclude_exts = [];
    protected $ext_bucket_map = [];
    protected $max_ages   = [];
    protected $S3Clients  = [];
    protected $scope_cache_keys = [];
    protected $results    = [];
    protected $errors     = [];
    public    $sync_paths = [];
    protected $maxSize    = 1024 * 1024 * 100;
    protected $access_key_ids = [];
    protected $secret_acc_keys= [];

    function __construct () {
        parent::__construct();
    }

    function activate ( $app, $plugin, $version, &$errors ) {
        $composer_autoload = $app->composer_autoload;
        if (! $composer_autoload || ! file_exists( $composer_autoload ) ) {
            $composer_autoload = null;
        }
        if (! $composer_autoload ) {
            $requires = $app->requires ? $app->requires : [];
            if ( is_array( $requires ) && !empty( $requires ) ) {
                foreach ( $requires as $require ) {
                    if ( basename( $require ) == 'autoload.php' ) {
                        $composer_autoload = $require;
                        break;
                    }
                }
            }
        }
        if (!$composer_autoload ) {
            $errors[] = $this->translate(
              'The plugin AWS_S3 cannot be enabled because the required environment variables have not been specified.' );
            return false;
        }
        return true;
    }

    function aws_s3_urlinfo_synchronize_to_s3 ( $app, $objects, $action, $process = false, $class = null ) {
        $model = 'urlinfo';
        $action['model'] = $model;
        if ( !$process && $class ) {
            return $class->process_start( $app, $objects, $action );
        }
        if (! $class ) {
            return $this->aws_s3_urlinfo_synchronize_to_s3_compat( $app, $objects, $action );
        }
        $class = $class ? $class : new PTListActions();
        foreach ( $objects as $obj ) {
            if (! is_file( $obj->file_path ) && !$obj->delete_flag ) {
                continue;
            } else if ( $obj->delete_flag && is_file( $obj->file_path ) ) {
                continue;
            }
            $workspace_id = $obj->workspace_id;
            $s3 = $this->get_s3_client( $app, $workspace_id );
            $bucket = $this->get_config( 'aws_s3_bucket', $workspace_id );
            $ext_bucket_map = $this->get_config( 'aws_s3_ext_bucket_map', $workspace_id );
            $extension = PTUtil::get_extension( $obj->file_path, true );
            if (! empty( $ext_bucket_map ) && isset( $ext_bucket_map[ $extension ] ) ) {
                $bucket = $ext_bucket_map[ $extension ];
            }
            $max_age = $app->aws_s3_cache_max_age;
            $max_ages = $this->get_config( 'aws_s3_cache_max_age', $workspace_id );
            if ( is_array( $max_ages ) ) {
                if ( isset( $max_ages[ $extension ] ) ) {
                    $max_age = $max_ages[ $extension ];
                } else if ( isset( $max_ages['default'] ) ) {
                    $max_age = $max_ages['default'];
                }
            }
            if (! $max_age ) {
                $max_age = $app->aws_s3_cache_max_age;
            }
            $acl = $this->get_config( 'aws_s3_acl', $workspace_id );
            $keyname = $obj->relative_url;
            $keyname = ltrim( $keyname, '/' );
            if (! $obj->delete_flag ) {
                $filesize = filesize( $obj->file_path );
                if ( $filesize > $this->maxSize ) {
                    $uploader = new MultipartUploader( $s3, $obj->file_path, [
                        'bucket' => $bucket,
                        'key'    => $keyname,
                        'acl'    => $acl,
                        'before_initiate' => function ( \Aws\Command $command ) use ( $max_age ) {
                            $command['CacheControl'] = 'max-age=' . $max_age;
                        },
                    ] );
                    try {
                        $result = $uploader->upload();
                        $this->results["{$bucket}/{$keyname}"] = 'Upload';
                    } catch ( MultipartUploadException $e ) {
                        $this->errors["{$bucket}/{$keyname}"] = 'Upload';
                        return $app->error( $this->translate(
                            "An error occues while upload '%s' to AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ) );
                    }
                } else {
                    $body = $app->fmgr->get( $obj->file_path );
                    $mime_type = PTUtil::get_mime_type( $obj->file_path );
                    try {
                        $result = $s3->putObject( [
                            'Bucket' => $bucket,
                            'Key'    => $keyname,
                            'Body'   => $body,
                            'ACL'    => $acl,
                            'CacheControl' => 'max-age=' . $max_age,
                            'ContentType' => $mime_type
                        ] );
                        $this->results["{$bucket}/{$keyname}"] = 'Upload';
                    } catch ( S3Exception $e ) {
                        return $app->error( $this->translate(
                            "An error occues while upload '%s' to AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ) );
                    }
                }
            } else {
                try {
                    $result = $s3->deleteObject( [
                        'Bucket' => $bucket,
                        'Key'    => $keyname
                    ] );
                    try {
                        $result = $s3->getObject( [
                            'Bucket' => $bucket,
                            'Key'    => $keyname
                        ] );
                        $this->results["{$bucket}/{$keyname}"] = 'Delete';
                    } catch ( S3Exception $e ) {
                        if ( $e->getStatusCode() === 404 ) {
                            $this->results["{$bucket}/{$keyname}"] = 'Delete';
                        } else {
                            return $app->error( $this->translate(
                                "An error occues while delete '%s' from AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ) );
                        }
                    }
                } catch ( S3Exception $e ) {
                    $this->errors["{$bucket}/{$keyname}"] = 'Delete';
                    return $app->error( $this->translate(
                        "An error occues while delete '%s' from AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ) );
                }
            }
        }
    }

    function aws_s3_urlinfo_synchronize_to_s3_compat ( $app, $objects, $action ) {
        $class = new PTListActions();
        $model = $app->param( '_model' );
        $counter = 0;
        $count = count( $objects );
        $realtime_sync = true;
        $max_list_actions = (int) $app->aws_s3_max_list_actions;
        if ( $count > $max_list_actions ) {
            $app->aws_s3_realtime_sync = false;
            $app->aws_s3_worker_only = false;
            $realtime_sync = false;
        }
        foreach ( $objects as $obj ) {
            if (! is_file( $obj->file_path ) && !$obj->delete_flag ) {
                continue;
            } else if ( $obj->delete_flag && is_file( $obj->file_path ) ) {
                continue;
            }
            if (! $realtime_sync ) {
                $bool = $obj->delete_flag ? false : true;
                $app->fmgr->update_paths[ $obj->file_path ] = $bool;
                $counter++;
                continue;
            }
            $workspace_id = $obj->workspace_id;
            $s3 = $this->get_s3_client( $app, $workspace_id );
            $bucket = $this->get_config( 'aws_s3_bucket', $workspace_id );
            $ext_bucket_map = $this->get_config( 'aws_s3_ext_bucket_map', $workspace_id );
            $extension = PTUtil::get_extension( $obj->file_path, true );
            if (! empty( $ext_bucket_map ) && isset( $ext_bucket_map[ $extension ] ) ) {
                $bucket = $ext_bucket_map[ $extension ];
            }
            $max_age = $app->aws_s3_cache_max_age;
            $max_ages = $this->get_config( 'aws_s3_cache_max_age', $workspace_id );
            if ( is_array( $max_ages ) ) {
                if ( isset( $max_ages[ $extension ] ) ) {
                    $max_age = $max_ages[ $extension ];
                } else if ( isset( $max_ages['default'] ) ) {
                    $max_age = $max_ages['default'];
                }
            }
            if (! $max_age ) {
                $max_age = $app->aws_s3_cache_max_age;
            }
            $acl = $this->get_config( 'aws_s3_acl', $workspace_id );
            $keyname = $obj->relative_url;
            $keyname = ltrim( $keyname, '/' );
            if (! $obj->delete_flag ) {
                $filesize = filesize( $obj->file_path );
                if ( $filesize > $this->maxSize ) {
                    $uploader = new MultipartUploader( $s3, $obj->file_path, [
                        'bucket' => $bucket,
                        'key'    => $keyname,
                        'acl'    => $acl,
                        'before_initiate' => function ( \Aws\Command $command ) use ( $max_age ) {
                            $command['CacheControl'] = 'max-age=' . $max_age;
                        },
                    ] );
                    try {
                        $result = $uploader->upload();
                        $this->results["{$bucket}/{$keyname}"] = 'Upload';
                    } catch ( MultipartUploadException $e ) {
                        $this->errors["{$bucket}/{$keyname}"] = 'Upload';
                        return $app->error( $this->translate(
                            "An error occues while upload '%s' to AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ) );
                    }
                } else {
                    $body = $app->fmgr->get( $obj->file_path );
                    $mime_type = PTUtil::get_mime_type( $obj->file_path );
                    try {
                        $result = $s3->putObject( [
                            'Bucket' => $bucket,
                            'Key'    => $keyname,
                            'Body'   => $body,
                            'ACL'    => $acl,
                            'CacheControl' => 'max-age=' . $max_age,
                            'ContentType' => $mime_type
                        ] );
                        $this->results["{$bucket}/{$keyname}"] = 'Upload';
                    } catch ( S3Exception $e ) {
                        return $app->error( $this->translate(
                            "An error occues while upload '%s' to AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ) );
                    }
                }
            } else {
                try {
                    $result = $s3->deleteObject( [
                        'Bucket' => $bucket,
                        'Key'    => $keyname
                    ] );
                    try {
                        $result = $s3->getObject( [
                            'Bucket' => $bucket,
                            'Key'    => $keyname
                        ] );
                        $this->results["{$bucket}/{$keyname}"] = 'Delete';
                    } catch ( S3Exception $e ) {
                        if ( $e->getStatusCode() === 404 ) {
                            $this->results["{$bucket}/{$keyname}"] = 'Delete';
                        } else {
                            return $app->error( $this->translate(
                                "An error occues while delete '%s' from AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ) );
                        }
                    }
                } catch ( S3Exception $e ) {
                    $this->errors["{$bucket}/{$keyname}"] = 'Delete';
                    return $app->error( $this->translate(
                        "An error occues while delete '%s' from AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ) );
                }
            }
            $counter++;
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $class->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        if (! $realtime_sync ) {
            $return_args .= '&queue=' . $counter;
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function set_apply_message ( $cb, $app, &$param, &$tmpl ) {
        if ( $app->param( '_model' ) !== 'urlinfo' ) {
            return true;
        }
        if ( $app->param( 'does_act' ) && $app->param( 'queue' ) ) {
            $count = (int) $app->param( 'queue' );
            $label = $count === 1 ? $app->translate( 'URL' ) : $app->translate( 'URLs' );
            $msg = $app->translate( 'You applied an action to %s %s.', [ $count, $label ] );
            $msg .= $this->translate( 'Synchronize to AWS S3 reserved for queue.' );
            $param['apply_actions_message'] = $msg;
        }
        return true;
    }

    function list_objects ( $app ) {
        $workspace_id = (int) $app->param( 'workspace_id' );
        $access_key_id = $this->get_config( 'aws_s3_access_key_id', $workspace_id );
        $secret_access_key = $this->get_config( 'aws_s3_secret_access_key', $workspace_id );
        $aws_region = $this->get_config( 'aws_s3_region', $workspace_id );
        $bucket = $this->get_config( 'aws_s3_bucket', $workspace_id );
        if ( $app->param( 'bucket' ) ) {
            $bucket = $app->param( 'bucket' );
            $bucket = preg_replace( '/[^ -~]/', '', $bucket );
            $bucket = trim( $bucket );
        }
        if (! $aws_region || ! $bucket ) {
            return $app->error( $this->translate( 'The required settings have not been specified.' ), true );
        }
        $acl = $this->get_config( 'aws_s3_acl', $workspace_id );
        if ( $app->composer_autoload ) {
            require_once( $app->composer_autoload );
        }
        if (! $access_key_id || ! $secret_access_key ) {
            $credentials = CredentialProvider::defaultProvider();
            $credentials = CredentialProvider::memoize( $credentials );
        } else {
            $credentials = [
                'key'    => $access_key_id,
                'secret' => $secret_access_key,
            ];
        }
        $s3 = new S3Client( [
            'version' => 'latest',
            'region'  => $aws_region,
            'credentials' => $credentials,
        ] );
        if ( $app->param( '_type' ) && $app->param( '_type' ) === 'delete' ) {
            if ( $app->request_method !== 'POST' ) {
                return $app->error( 'Invalid request.' );
            }
            $app->validate_magic();
            $merged_params = $app->param( 'merged_params' );
            $urls = [];
            if ( $merged_params ) {
                $urls = json_decode( $merged_params, true );
            }
            if (! is_array( $urls ) ) {
                return $app->error( 'Invalid request.' );
            }
            $counter = count( $urls );
            $all_objs = [];
            $objects = [];
            foreach ( $urls as $keyname ) {
                $objects[] = ['Key' => $keyname ];
            }
            if ( $counter > 250 ) {
                $all_objs = array_chunk( $objects, 250 );
            } else {
                $all_objs = [ $objects ];
            }
            if ( $max_execution_time = $app->max_exec_time ) {
                $max_execution_time = (int) $max_execution_time;
                ini_set( 'max_execution_time', $max_execution_time );
            }
            $params = $_POST;
            unset( $params['_type'], $params['urls'], $params['magic_token'], $params['merged_params'] );
            $params = http_build_query( $params );
            if ( $counter ) {
                $params .= '&deleted=' . $counter;
            }
            foreach ( $all_objs as $objects ) {
                try{
                    $s3->deleteObjects( [
                        'Bucket' => $bucket,
                        'Delete' => [
                            'Objects' => $objects,
                        ]
                    ] );
                } catch ( s3Exception $e ){
                    return $app->error( $e->getMessage() );
                }
                if ( count( $all_objs ) > 1 ) {
                    sleep( 1 );
                }
            }
            return $app->redirect( $app->admin_url . '?' . $params );
        }
        $_type = $app->param( '_type' );
        $keyname = $app->param( 'url' );
        if ( $_type && $keyname ) {
            try {
                $result = $s3->getObject( [
                    'Bucket' => $bucket,
                    'Key'    => $keyname
                ] );
                $extension = PTUtil::get_extension( $keyname, true );
                $mime_type = $result['ContentType'];
                $export_exts = ['m3u8', 'ts'];
                $upload_dir = $app->upload_dir();
                $out = $upload_dir . DS . basename( $keyname );
                $app->fmgr->put( $out, $result['Body'] );
                if ( in_array( $extension, $export_exts ) ) {
                    $mime_type = PTUtil::get_mime_type( $keyname );
                    PTUtil::export_data( $out );
                    exit();
                }
                header( "Content-type: {$mime_type}" );
                $upload_dir = $app->upload_dir();
                $out = $upload_dir . DS . basename( $keyname );
                $app->fmgr->put( $out, $result['Body'] );
                // echo $result['Body'];
                readfile( $out );
                exit();
            } catch ( S3Exception $e ) {
                $app->error( $e->getMessage(), true );
            }
        }
        $site_url = null;
        $link_url = null;
        $show_both = null;
        if ( $workspace_id ) {
            $workspace = $app->workspace();
            $site_url = $workspace->site_url;
            $link_url = $workspace->link_url;
            $show_both = $workspace->show_both;
        } else {
            $site_url = $app->site_url;
            $link_url = $app->link_url;
            $show_both = $app->show_both;
        }
        $objectContents = null;
        // Cache Objects.
        $prefix = '';
        $query = $app->param( 'query' );
        $prefix_match = $app->param( 'prefix_match' );
        if ( $prefix_match ) {
            $prefix = $query;
            $query  = null;
            if ( strpos( $prefix, '/' ) === 0 ) {
                $prefix = ltrim( $prefix, '/' );
            }
        }
        $marker = null;
        $recursive = true;
        if ( $app->aws_s3_use_list_caching ) {
            $key = $prefix_match && $prefix ? "{$bucket}-objects-{$prefix}" : "{$bucket}-objects";
            $session = $app->db->model( 'session' )->get_by_key( ['value' => $bucket, 'kind' => 'S3', 'name' => $key ] );
            if ( $session->id ) {
                $objectContents = json_decode( $session->data, true );
                $start = $session->start;
                $update = date( 'Y-m-d H:i:s', $start );
                $logs = $app->db->model( 'log' )->load( ['category' => 'aws_s3', 'created_on' => ['>=' => $update ] ], null, 'metadata' );
                foreach ( $logs as $log ) {
                    $metadata = $log->metadata;
                    if ( strpos( $metadata, $bucket ) !== false ) {
                        $objectContents = null;
                        break;
                    }
                }
            }
            if ( $objectContents === null ) {
                $objectContents = $this->get_all_objects( $s3, $bucket, $marker, $recursive, $prefix );
                $session->data( json_encode( $objectContents ) );
                $session->start( $app->request_time );
                $session->expires( $app->request_time + 604800 ); // 3days.
                $session->save();
            }
        } else {
            $marker = $query ? null : $app->param( 'marker' );
            $app->ctx->vars['current_marker'] = $marker;
            $recursive = $query ? true : false;
            $objectContents = $this->get_all_objects( $s3, $bucket, $marker, $recursive, $prefix );
            $app->ctx->vars['next_marker'] = $marker;
            // TODO::Pagenation and Search.
        }
        if ( $query ) {
            foreach ( $objectContents as $idx => $item ) {
                if ( stripos( $idx, $query ) === false ) {
                    unset( $objectContents[ $idx ] );
                }
            }
        }
        if ( $app->param( 'debug' ) ) {
            echo '<pre>';
            var_dump( $objectContents );
            exit();
        }
        $tmpl = $app->ctx->get_template_path( 'aws_s3_list_objects.tmpl' );
        $app->ctx->vars['page_title'] = $this->translate( "All objects of bucket '%s'", $bucket );
        $app->ctx->vars['site_url'] = $site_url;
        $app->ctx->vars['link_url'] = $link_url;
        $app->ctx->vars['show_both'] = $show_both;
        $app->ctx->vars['aws_s3_list_result'] = $objectContents;
        $list_limit = $app->aws_s3_pagination_limit;
        if (! $list_limit ) $list_limit = 1000;
        $total_result = count( $objectContents );
        $mod = floor( $total_result / $list_limit );
        $pager = [];
        if ( $total_result > $list_limit ) {
            $mod++;
            for ( $i = 1; $i <= $mod; $i++ ) {
                $offset = $i - 1;
                $pager[ $i ] = $offset * $list_limit;
            }
        }
        $app->ctx->vars['total_result'] = $total_result;
        $app->ctx->vars['list_limit'] = $list_limit;
        $app->ctx->vars['pager'] = $pager;
        echo $app->build_page( $tmpl );
    }

    function get_all_objects ( $s3, $bucket, &$marker = null, $recursive = true, $prefix = '' ) {
        $list = [];
        $objects = $s3->listObjects([
            'Bucket' => $bucket,
            'Marker' => $marker,
            'Prefix' => $prefix,
        ]);
        $app = Prototype::get_instance();
        $timezone = new DateTimeZone( $app->timezone );
        if ( isset( $objects['Contents'] ) ) {
            $last = null;
            $contents = $objects['Contents'];
            foreach ( $contents as $object ) {
                $last = $object['Key'];
                // if ( substr( $last, -1, 1 ) != '/' ) {
                $lastModified = (array)( $object['LastModified'] );
                $tz = $lastModified['timezone'];
                $lastModified = array_shift( $lastModified );
                $lastModified = preg_replace( '/\..*$/', '', $lastModified );
                $date = new DateTime( $lastModified . $tz );
                $date->setTimeZone( $timezone );
                $lastModified = $date->format( 'Y-m-d H:i:s' );
                $list[ $last ] = $lastModified;
                // }
            }
            $IsTruncated = $objects['IsTruncated'] ?? false;
            if ( $IsTruncated && $last ) {
                $marker = $last;
                if ( $recursive ) {
                    $list = array_merge( $list, $this->get_all_objects( $s3, $bucket, $last, $recursive ) );
                }
            }
        }
        return $list;
    }

    function aws_s3_mediaconvert_jobs ( $app, $status = null, $require = null ) {
        $workspace_id = (int) $app->param( 'workspace_id' );
        $region = $this->get_config( 'aws_s3_mediaconvert_region', $workspace_id );
        $endpoint = $this->get_config( 'aws_s3_mediaconvert_endpoint', $workspace_id );
        if (! $region || !$endpoint ) {
            return $this->error( 'Invalid request.' );
        }
        if ( $app->composer_autoload ) {
            require_once( $app->composer_autoload );
        }
        $api_version = $app->aws_s3_mediaconvert_api_version;
        $client = new Aws\MediaConvert\MediaConvertClient([
            'version' => $api_version,
            'region' => $region,
            'endpoint' => $endpoint,
        ]);
        // 'Status' => 'SUBMITTED|PROGRESSING|COMPLETE|CANCELED|ERROR'
        $Statuses = null;
        if ( $status ) {
            if ( is_string( $status ) ) {
                $Statuses = [ $status ];
            } else if ( is_array( $status ) ) {
                $Statuses = $status;
            }
        }
        if (! $Statuses ) {
            $Statuses = ['SUBMITTED', 'PROGRESSING', 'COMPLETE', 'CANCELED', 'ERROR'];
        }
        if ( $require ) {
            $require = ltrim( $require, '/' );
            $require = '/' . $require;
        }
        $timezone = new DateTimeZone( $app->timezone );
        foreach ( $Statuses as $Status ) {
            try {
                $result = $client->listJobs( [
                    'MaxResults' => 20,
                    //'Order' => 'ASCENDING',
                    'Status' => $Status,
                    // 'NextToken' => '<string>', //OPTIONAL To retrieve the twenty next most recent jobs
                ] );
            } catch ( AwsException $e ) {
                // output error message if fails
                $error = $e->getMessage();
                $all_jobs[ $Status ] = false;
                continue;
            }
            $results = [];
            foreach ( $result['Jobs'] as $job ) {
                foreach ( $job['Settings']['Inputs'] as $input ) {
                    $url = $input['FileInput'];
                    $path = preg_replace( '!^s3://.*?/!', '/', $url );
                    $FinishTime = null;
                    if ( isset( $job['Timing']['FinishTime'] ) ) {
                        $FinishTime = (array) $job['Timing']['FinishTime'];
                        $tz = $FinishTime['timezone'];
                        $FinishTime = array_shift( $FinishTime );
                        $FinishTime = preg_replace( '/\..*$/', '', $FinishTime );
                        $date = new DateTime( $FinishTime . $tz );
                        $date->setTimeZone( $timezone );
                        $FinishTime = $date->format( 'Y-m-d H:i:s' );
                    }
                    $results[ $path ] = $FinishTime;
                    if ( $require === $path ) {
                        return ['Status' => $Status, 'Path' => $path, 'FinishTime' => $FinishTime ];
                    }
                }
            }
            $app->ctx->vars[ $Status ] = $results;
        }
        if ( $require ) {
            return false;
        }
        $app->ctx->vars['statuses'] = $Statuses;
        $tmpl = $app->ctx->get_template_path( 'aws_s3_mediaconvert_jobs.tmpl' );
        $app->ctx->vars['page_title'] = $this->translate( 'View Jobs in MediaConvert' );
        echo $app->build_page( $tmpl );
    }

    function take_down ( $app ) {
        if ( $app->id !== 'Prototype' && $app->id !== 'Worker' ) {
            return;
        }
        if ( $app->aws_s3_worker_only ) {
            // Always sync by queue_synchronize.
            return;
        } else if ( $app->aws_s3_skip_rebuild_phase && $app->mode === 'rebuild_phase' ) {
            return;
        }
        $fmgr = $app->fmgr;
        $updates = $fmgr->updates;
        if ( $fmgr->delayed && ! empty( $updates ) ) {
            $fmgr->delayed = false;
            foreach ( $updates as $path => $data ) {
                if ( $data !== false ) {
                    $fmgr->put( $path, $data );
                } else {
                    $fmgr->unlink( $path );
                }
                unset( $updates[ $path ], $fmgr->updates[ $path ] );
            }
            $fmgr->updates = [];
        }
        $update_paths = $fmgr->update_paths;
        $urls = [];
        $denied_exts = $app->aws_s3_exclude_exts ? explode( ',', $app->aws_s3_exclude_exts ) : explode( ',', $app->denied_exts );
        $temp_dir = $app->temp_dir;
        $support_dir = $app->support_dir;
        $update_objs = property_exists( $fmgr, 'update_objs' ) ? $fmgr->update_objs : [];
        foreach ( $update_paths as $update_path => $bool ) {
            $url = $update_objs[ $update_path ] ?? null;
            if (! $url ) {
                if ( strpos( $update_path, $temp_dir ) === 0 ) {
                    continue;
                } else if ( strpos( $update_path, $support_dir ) === 0 ) {
                    continue;
                } else if ( is_dir( $update_path ) ) {
                    unset( $update_paths[ $update_path ] );
                    continue;
                }
                $extension = PTUtil::get_extension( $update_path, true );
                if ( in_array( $extension, $denied_exts ) ) {
                    unset( $update_paths[ $update_path ] );
                    continue;
                }
                $url = $app->db->model( 'urlinfo' )->load(
                ['file_path' => $update_path, 'delete_flag' => ['IN' => [0, 1] ] ],
                ['sort' => 'delete_flag', 'direction' => 'ascend', 'limit' => 1],
                'id,relative_url,workspace_id,key' );
                if ( empty( $url ) ) {
                    unset( $update_paths[ $update_path ] );
                    continue;
                }
                $url = $url[0];
            }
            if ( $app->aws_s3_skip_rebuild_phase && $url->key === 'rebuild_phase' ) {
                continue;
            }
            $sync_extensions = $this->get_config( 'aws_s3_extensions', $url->workspace_id );
            $exclude_exts = $this->get_config( 'aws_s3_exclude_exts', $url->workspace_id );
            $extension = PTUtil::get_extension( $update_path, true );
            if (!empty( $sync_extensions ) ) {
                if ( count( $sync_extensions ) == 1 && $sync_extensions[0] == '*' ) {
                } else {
                    if (! in_array( $extension, $sync_extensions ) ) {
                        unset( $update_paths[ $update_path ] );
                        continue;
                    }
                }
            }
            if (!empty( $exclude_exts ) && in_array( $extension, $exclude_exts ) ) {
                unset( $update_paths[ $update_path ] );
                continue;
            }
            $bucket = $this->get_config( 'aws_s3_bucket', $url->workspace_id );
            $aws_region = $this->get_config( 'aws_s3_region', $url->workspace_id );
            if (! $bucket || ! $aws_region ) {
                unset( $update_paths[ $update_path ] );
                continue;
            }
            $urls[ $update_path ] = $url;
        }
        if (! empty( $update_paths ) ) {
            $time_limit = 3000;
            if ( $max_execution_time = $app->max_exec_time ) {
                $max_execution_time = (int) $max_execution_time;
                ini_set( 'max_execution_time', $max_execution_time );
                $time_limit = $max_execution_time - 600;
            }
            $ts_job = $app->db->model( 'ts_job' )->__new();
            $ts_job->name( 'Synchronize to AWS S3' );
            $ts_job->class( 'AWS S3' );
            $ts_job->component( 'AWS_S3' );
            $label = $this->translate( 'Publish File(s)' );
            $realtime = $app->aws_s3_realtime_sync;
            if ( $app->id == 'Prototype' ) {
                if ( strpos( $app->mode, 'upload' ) !== false ) {
                    if ( $app->mode == 'upload' ) {
                        $label = $this->translate( 'Upload File' );
                    } else {
                        $label = $this->translate( 'Upload Files' );
                    }
                } else if ( $app->mode == 'delete' ) {
                    $ids = $app->param( 'id' );
                    if ( is_array( $ids ) && count( $ids ) > 1 ) {
                        $label = $this->translate( 'Delete Objects' );
                    } else {
                        $label = $this->translate( 'Delete Object' );
                    }
                } else if ( $app->mode == 'save' ) {
                    if ( $app->param( 'id' ) ) {
                        $label = $this->translate( 'Save Object' );
                    } else {
                        $label = $this->translate( 'Create Object' );
                    }
                } else if ( $app->mode == 'rebuild_phase' ) {
                    $label = $this->translate( 'Rebuild Files' );
                }
            } else if ( $app->id == 'Worker' ) {
                $label = $this->translate( 'Scheduled Task' );
                $realtime = true;
            }
            $ts_job->label( $label );
            $ts = date( 'Y-m-d H:i:s', strtotime( '10 second' ) );
            $ts_job->start_on( $ts );
            $app->set_default( $ts_job );
            $ts_job->workspace_id( 0 );
            $ts_job->status( 1 );
            $ts_job->save();
            $queues = 0;
            $counter = 0;
            $start_time = $app->request_time;
            foreach ( $update_paths as $update_path => $bool ) {
                $url = $urls[ $update_path ] ?? null;
                if (! $url ) {
                    continue;
                } else if ( is_dir( $update_path ) ) {
                    continue;
                }
                $class = $bool === false ? 'Delete' : 'Upload';
                if ( $class === 'Upload' && !$fmgr->exists( $update_path ) ) {
                    continue;
                }
                $queue = $app->db->model( 'queue' )->get_by_key( [
                    'key' => md5( $update_path ),
                    'component' => 'AWS_S3',
                    'method' => 'queue_synchronize',
                    ] );
                $queue->class( $class );
                $queue->start_on( $ts );
                $queue->ts_job_id( $ts_job->id );
                $queue->value( $update_path );
                $queue->metadata( $url->relative_url );
                $queue->object_id( $url->id );
                $queue->model( 'urlinfo' );
                $queue->interval( $app->aws_s3_queue_interval );
                $app->set_default( $queue );
                $queue->workspace_id( $url->workspace_id );
                if ( $realtime ) {
                    $past = time() - $start_time;
                    if ( $class == 'Upload' && $app->aws_s3_realtime_maxsize < filesize( $update_path ) ) {
                        $realtime = false;
                    } else if ( $past > $time_limit ) {
                        $realtime = false;
                    } else {
                        $error = '';
                        $result = $this->queue_synchronize( $app, $queue, $error );
                        $this->sync_paths[ $update_path ] = true;
                        if ( $result ) {
                            if ( $counter && $app->aws_s3_queue_interval ) {
                                usleep( $app->aws_s3_queue_interval );
                            }
                            continue;
                        }
                        $counter++;
                    }
                }
                $queue->save();
                $queues++;
            }
            if (! $queues ) {
                $ts_job->remove();
            } else {
                $ts_job->status( 2 );
                $ts_job->save();
            }
        }
        if (! empty( $this->results ) || ! empty( $this->errors ) ) {
            $metadata = ['result' => $this->results, 'errors' => $this->errors ];
            $class = !empty( $this->errors ) ? 'error' : 'info';
            $this->log( $this->translate( 'Synchronize to AWS S3.' ), $class, $metadata );
        }
    }

    function get_s3_client ( $app, $workspace_id ) {
        $aws_region = $this->get_config( 'aws_s3_region', $workspace_id );
        $bucket = $this->get_config( 'aws_s3_bucket', $workspace_id );
        if (! $aws_region || ! $bucket ) {
            return null;
        }
        if ( isset( $this->scope_cache_keys[ $workspace_id ] ) ) {
            return $this->S3Clients[ $this->scope_cache_keys[ $workspace_id ] ];
        }
        require_once( $app->composer_autoload );
        $access_key_id = $this->get_config( 'aws_s3_access_key_id', $workspace_id );
        $secret_access_key = $this->get_config( 'aws_s3_secret_access_key', $workspace_id );
        if (! $access_key_id || ! $secret_access_key ) {
            $credentials = CredentialProvider::defaultProvider();
            $credentials = CredentialProvider::memoize( $credentials );
            $cache_key = "default-provider-{$aws_region}";
        } else {
            $credentials = [
                'key'    => $access_key_id,
                'secret' => $secret_access_key,
            ];
            $cache_key = "{$access_key_id}-{$aws_region}";
        }
        if ( isset( $this->S3Clients[ $cache_key ] ) ) {
            return $this->S3Clients[ $cache_key ];
        }
        $this->scope_cache_keys[ $workspace_id ] = $cache_key;
        $s3 = new S3Client( [
            'version' => 'latest',
            'region'  => $aws_region,
            'credentials' => $credentials,
        ] );
        $this->S3Clients[ $cache_key ] = $s3;
        return $s3;
    }

    function queue_synchronize ( $app, $queue, &$error ) {
        $workspace_id = $queue->workspace_id;
        $bucket = $this->get_config( 'aws_s3_bucket', $workspace_id );
        if (! $bucket ) {
            return false;
        }
        $s3 = $this->get_s3_client( $app, $workspace_id );
        if (! $s3 ) {
            return false;
        }
        $acl = $this->get_config( 'aws_s3_acl', $workspace_id );
        $keyname = $queue->metadata;
        $keyname = ltrim( $keyname, '/' );
        // $keyname = urldecode( $keyname );
        $max_age = $app->aws_s3_cache_max_age;
        $max_ages = $this->get_config( 'aws_s3_cache_max_age', $workspace_id );
        $extension = PTUtil::get_extension( $keyname, true );
        if ( is_array( $max_ages ) ) {
            if ( isset( $max_ages[ $extension ] ) ) {
                $max_age = $max_ages[ $extension ];
            } else if ( isset( $max_ages['default'] ) ) {
                $max_age = $max_ages['default'];
            }
        }
        if (! $max_age ) {
            $max_age = $app->aws_s3_cache_max_age;
        }
        $ext_bucket_map = $this->get_config( 'aws_s3_ext_bucket_map', $workspace_id );
        if (! empty( $ext_bucket_map ) && isset( $ext_bucket_map[ $extension ] ) ) {
            $bucket = $ext_bucket_map[ $extension ];
        }
        $timezone = new DateTimeZone( $app->timezone );
        if ( $queue->class == 'Upload' ) {
            if (! $app->fmgr->exists( $queue->value ) ) {
                return false;
            }
            if ( $app->aws_s3_modified_only ) {
                try {
                    $object = $s3->headObject( ['Bucket' => $bucket, 'Key' => $keyname ] )->toArray();
                    $deleteMarker = $object['DeleteMarker'];
                    if (! $deleteMarker ) {
                        $lastModified = (array)( $object['LastModified'] );
                        $tz = $lastModified['timezone'];
                        $lastModified = array_shift( $lastModified );
                        $lastModified = preg_replace( '/\..*$/', '', $lastModified );
                        $date = new DateTime( $lastModified . $tz );
                        $date->setTimeZone( $timezone );
                        $lastModified = (int) $date->format( 'U' );
                        if ( $lastModified >= filemtime( $queue->value ) ) {
                            return true;
                        }
                    }
                } catch ( S3Exception $e ) {
                    // Object Not Found.
                }
            }
            $filesize = filesize( $queue->value );
            if ( $filesize > $this->maxSize ) {
                $uploader = new MultipartUploader( $s3, $queue->value, [
                    'bucket' => $bucket,
                    'key'    => $keyname,
                    'acl'    => $acl,
                    'before_initiate' => function ( \Aws\Command $command ) use ( $max_age ) {
                        $command['CacheControl'] = 'max-age=' . $max_age;
                    },
                ] );
                try {
                    $result = $uploader->upload();
                    $effectiveUri = $result['Location'];
                    $msg = $this->translate( "Upload '%s' to AWS S3.", $effectiveUri );
                    if ( $app->id == 'Worker' ) {
                        echo $msg, PHP_EOL;
                    }
                    $this->results["{$bucket}/{$keyname}"] = 'Upload';
                    return true;
                } catch ( MultipartUploadException $e ) {
                    $this->errors["{$bucket}/{$keyname}"] = 'Upload';
                    $this->log( $this->translate(
                        "An error occues while upload '%s' to AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ), 'error' );
                    return false;
                }
            } else {
                $body = $app->fmgr->get( $queue->value );
                $mime_type = PTUtil::get_mime_type( $queue->value );
                try {
                    $result = $s3->putObject( [
                        'Bucket' => $bucket,
                        'Key'    => $keyname,
                        'Body'   => $body,
                        'ACL'    => $acl,
                        'CacheControl' => 'max-age=' . $max_age,
                        'ContentType' => $mime_type
                    ] );
                    $effectiveUri = $result['ObjectURL'];
                    $msg = $this->translate( "Upload '%s' to AWS S3.", $effectiveUri );
                    if ( $app->id == 'Worker' ) {
                        echo $msg, PHP_EOL;
                    }
                    $this->results["{$bucket}/{$keyname}"] = 'Upload';
                    return true;
                } catch ( S3Exception $e ) {
                    $this->errors["{$bucket}/{$keyname}"] = 'Upload';
                    $this->log( $this->translate(
                        "An error occues while upload '%s' to AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ), 'error' );
                    return false;
                }
            }
        } else if ( $queue->class == 'Delete' ) {
            if ( $app->fmgr->exists( $queue->value ) ) {
                return false;
            }
            if ( $app->aws_s3_modified_only ) {
                try {
                    $object = $s3->headObject( ['Bucket' => $bucket, 'Key' => $keyname ] )->toArray();
                    $deleteMarker = $object['DeleteMarker'];
                    if ( $deleteMarker ) {
                        return true;
                    }
                } catch ( S3Exception $e ) {
                    // Object Not Found.
                    return true;
                }
            }
            try {
                $result = $s3->deleteObject( [
                    'Bucket' => $bucket,
                    'Key'    => $keyname
                ] );
                $effectiveUri = $result['@metadata']['effectiveUri'];
                try {
                    // && $result['DeleteMarker'] === true
                    // See https://docs.aws.amazon.com/ja_jp/AmazonS3/latest/userguide/DeleteMarker.html
                    $result = $s3->getObject( [
                        'Bucket' => $bucket,
                        'Key'    => $keyname
                    ] );
                    $this->results["{$bucket}/{$keyname}"] = 'Delete';
                } catch ( S3Exception $e ) {
                    if ( $e->getStatusCode() === 404 ) {
                        $msg = $this->translate( "Deleted '%s' from AWS S3.", $effectiveUri );
                        if ( $app->id == 'Worker' ) {
                            echo $msg, PHP_EOL;
                        }
                        $this->results["{$bucket}/{$keyname}"] = 'Delete';
                        return true;
                    } else {
                        $this->errors["{$bucket}/{$keyname}"] = 'Delete';
                    }
                }
            } catch ( S3Exception $e ) {
                $this->errors["{$bucket}/{$keyname}"] = 'Delete';
                $this->log( $this->translate(
                    "An error occues while delete '%s' from AWS S3(%s).", ["{$bucket}/{$keyname}", $e->getMessage() ] ), 'error' );
                return false;
            }
        }
        return false;
    }

    function task_synchronize_s3 ( $app ) {
        $argv = $app->worker->argv;
        $_argv = $app->worker->_argv;
        if ( is_array( $argv ) && in_array( 'aws_s3_synchronize_s3', $argv ) ) {
        } else {
            return false;
        }
        if ( is_array( $_argv ) && in_array( '--modified_only', $_argv ) ) {
            $app->aws_s3_modified_only = true;
        }
        $delete_flag = [0, 1];
        if ( is_array( $_argv ) && in_array( '--put_only', $_argv ) ) {
            $delete_flag = 0;
        } else if ( is_array( $_argv ) && in_array( '--delete_only', $_argv ) ) {
            $delete_flag = 1;
        }
        $ts = null;
        if ( is_array( $_argv ) && in_array( '--update_from', $_argv ) ) {
            $idx = array_search( '--update_from', $_argv );
            if ( isset( $_argv[ $idx + 1] ) ) {
                $ts = $_argv[ $idx + 1];
                if ( preg_match( '/[a-zA-Z]/', $ts ) ) {
                    $ts = strtotime( $ts );
                } else if ( is_numeric( $ts ) ) {
                    if ( strlen( $ts ) === 14 ) {
                        $ts = strtotime( $ts );
                    }
                    // or Unixtime
                } else {
                    $ts = preg_replace( '/[^0-9]/', '', $ts );
                    if ( $app->is_valid_is( $ts, $msg ) ) {
                        $ts = strtotime( $ts );
                    } else {
                        $ts = null;
                    }
                }
            }
        }
        $bucket = $this->get_config_value( 'aws_s3_bucket', 0 );
        $workspace_ids = ( $bucket ) ? [0 => $bucket ] : [];
        $workspaces = $app->db->model( 'workspace' )->load( null, ['sort' => 'id', 'direction' => 'ascend'], 'id' );
        foreach ( $workspaces as $workspace ) {
            $bucket = $this->get_config( 'aws_s3_bucket', $workspace->id );
            if ( $bucket ) {
                $workspace_ids[ (int)$workspace->id ] = $bucket;
            }
        }
        $counter = 0;
        $denied_exts = $app->aws_s3_exclude_exts ? explode( ',', $app->aws_s3_exclude_exts ) : explode( ',', $app->denied_exts );
        if ( $app->aws_s3_task_exclude_exts ) {
            $denied_exts = array_merge( $denied_exts, explode( ',', $app->aws_s3_task_exclude_exts ) );
        }
        $i = 0;
        $extra_terms = [];
        if ( is_array( $_argv ) && in_array( '--classes', $_argv ) ) {
            $idx = array_search( '--classes', $_argv );
            if ( isset( $_argv[ $idx + 1] ) ) {
                $classes = $_argv[ $idx + 1];
                $classes = explode( ',', $classes );
                if ( count( $classes ) === 1 ) {
                    $extra_terms['class'] = $classes[0];
                } else {
                    $extra_terms['class'] = ['IN' => $classes ];
                }
            }
        }
        $extra = '';
        $extra_vars = [];
        if ( is_array( $_argv ) && in_array( '--exclude_classes', $_argv ) ) {
            $idx = array_search( '--exclude_classes', $_argv );
            if ( isset( $_argv[ $idx + 1] ) ) {
                $classes = $_argv[ $idx + 1];
                $classes = explode( ',', $classes );
                $count = count( $classes );
                $extra_vars = $classes;
                if ( $count === 1 ) {
                    $extra = " AND urlinfo_class!=? ";
                } else {
                    $repeat = rtrim( str_repeat( '?,', $count ), ',' );
                    $extra = " AND urlinfo_class NOT IN ({$repeat}) ";
                }
            }
        }
        foreach ( $workspace_ids as $workspace_id => $bucket ) {
            $synced_urls = [];
            $terms = ['workspace_id' => $workspace_id, 'was_published' => 1];
            if ( $delete_flag ) {
                $terms['delete_flag'] = $delete_flag;
            }
            if ( $ts ) {
                $terms['filemtime'] = ['>' => $ts ];
            }
            $terms = array_merge( $terms, $extra_terms );
            $urls = $app->db->model( 'urlinfo' )->load( $terms, ['sort' => 'filemtime', 'direction' => 'decend'],
                                                        'id,url,workspace_id,file_path,delete_flag,relative_url',
                                                        $extra, $extra_vars );
            foreach ( $urls as $url ) {
                if ( isset( $synced_urls[ $url->url ] ) ) continue;
                $sync_extensions = $this->get_config( 'aws_s3_extensions', $url->workspace_id );
                $extension = PTUtil::get_extension( $url->file_path, true );
                if (!empty( $sync_extensions ) ) {
                    if ( count( $sync_extensions ) == 1 && $sync_extensions[0] == '*' ) {
                    } else {
                        if (! in_array( $extension, $sync_extensions ) ) {
                            continue;
                        }
                    }
                } else {
                    if ( in_array( $extension, $denied_exts ) ) {
                        continue;
                    }
                }
                if (! $url->delete_flag && !is_file( $url->file_path ) ) {
                    // Require re-publish.
                    continue;
                }
                $synced_urls[ $url->url ] = true;
                $class = $url->delete_flag ? 'Delete' : 'Upload';
                $queue = $app->db->model( 'queue' )->__new( [
                    'key' => md5( $url->file_path ),
                    'component' => 'AWS_S3',
                    'method' => 'queue_synchronize',
                    ] );
                $queue->class( $class );
                $queue->value( $url->file_path );
                $queue->metadata( $url->relative_url );
                $queue->object_id( $url->id );
                $queue->model( 'urlinfo' );
                $queue->interval( $app->aws_s3_queue_interval );
                $app->set_default( $queue );
                $queue->workspace_id( $url->workspace_id );
                $error = '';
                $result = $this->queue_synchronize( $app, $queue, $error );
                if ( $result ) {
                    $counter++;
                }
                /*
                if ( $i && $app->aws_s3_queue_interval ) {
                    usleep( $app->aws_s3_queue_interval );
                }
                */
                $i++;
            }
        }
        return $counter;
    }

    function get_config ( $key, $workspace_id ) {
        if ( $key == 'aws_s3_bucket' && isset( $this->buckets[ $workspace_id ] ) ) {
            return $this->buckets[ $workspace_id ];
        } else if ( $key == 'aws_s3_acl' && isset( $this->acls[ $workspace_id ] ) ) {
            return $this->acls[ $workspace_id ];
        } else if ( $key == 'aws_s3_extensions' && isset( $this->extensions[ $workspace_id ] ) ) {
            return $this->extensions[ $workspace_id ];
        } else if ( $key == 'aws_s3_exclude_exts' && isset( $this->exclude_exts[ $workspace_id ] ) ) {
            return $this->exclude_exts[ $workspace_id ];
        } else if ( $key == 'aws_s3_region' && isset( $this->regions[ $workspace_id ] ) ) {
            return $this->regions[ $workspace_id ];
        } else if ( $key == 'aws_s3_cache_max_age' && isset( $this->max_ages[ $workspace_id ] ) ) {
            return $this->max_ages[ $workspace_id ];
        } else if ( $key == 'aws_s3_access_key_id' && isset( $this->access_key_ids[ $workspace_id ] ) ) {
            return $this->access_key_ids[ $workspace_id ];
        } else if ( $key == 'aws_s3_secret_access_key' && isset( $this->secret_acc_keys[ $workspace_id ] ) ) {
            return $this->secret_acc_keys[ $workspace_id ];
        } else if ( $key == 'aws_s3_ext_bucket_map' && isset( $this->ext_bucket_map[ $workspace_id ] ) ) {
            return $this->ext_bucket_map[ $workspace_id ];
        }
        if ( $key == 'aws_s3_access_key_id' || $key == 'aws_s3_secret_access_key' || $key == 'aws_s3_region' ) {
            $app = Prototype::get_instance();
            $cfg_workspace_id = $workspace_id;
            $use_system = $this->get_config_value( 'aws_s3_use_system_setting', $workspace_id );
            if (! $app->aws_s3_setting_by_scope ) {
                $cfg_workspace_id = 0;
            } else if ( $use_system ) {
                $cfg_workspace_id = 0;
            }
            $value = $this->get_config_value( $key, $cfg_workspace_id );
            if ( $key == 'aws_s3_access_key_id' ) {
                $this->access_key_ids[ $workspace_id ] = $value;
            } else if ( $key == 'aws_s3_secret_access_key' ) {
                $this->secret_acc_keys[ $workspace_id ] = $value;
            } else if ( $key == 'aws_s3_region' ) {
                $this->regions[ $workspace_id ] = $value;
            }
            return $value;
        }
        if ( $workspace_id ) {
            $use_system = $this->get_config_value( 'aws_s3_use_system_setting', $workspace_id );
            if ( $use_system ) {
                $value = $this->get_config_value( $key, 0 );
            } else {
                $value = $this->get_config_value( $key, $workspace_id );
            }
        } else {
            $value = $this->get_config_value( $key, 0 );
        }
        if ( $key == 'aws_s3_bucket' ) {
            $this->buckets[ $workspace_id ] = $value;
        } else if ( $key == 'aws_s3_acl' ) {
            $this->acls[ $workspace_id ] = $value;
        } else if ( $key == 'aws_s3_extensions' ) {
            $value = strtolower( trim( $value ) );
            $value = ! $value ? [] : preg_split( '/\s*,\s*/', $value );
            $this->extensions[ $workspace_id ] = $value;
        } else if ( $key == 'aws_s3_exclude_exts' ) {
            $value = strtolower( trim( $value ) );
            $value = ! $value ? [] : preg_split( '/\s*,\s*/', $value );
            $this->exclude_exts[ $workspace_id ] = $value;
        } else if ( $key == 'aws_s3_cache_max_age' ) {
            $value = str_replace( ' ', '', $value );
            $max_ages = [];
            if ( ctype_digit( ( string ) $value ) ) {
                $max_ages['default'] = $value;
            } else {
                $items = preg_split( '/\s*,\s*/', $value );
                foreach ( $items as $item ) {
                    $item = strtolower( $item );
                    if ( strpos( $item, '=' ) === false ) {
                        $max_ages['default'] = $item;
                    } else {
                        list( $extension, $max_age ) = explode( '=', $item );
                        $max_ages[ $extension ] = (int) $max_age;
                    }
                }
            }
            $value = $max_ages;
            $this->max_ages[ $workspace_id ] = $max_ages;
        } else if ( $key === 'aws_s3_ext_bucket_map' ) {
            $value = preg_replace( "/\r\n|\r/",PHP_EOL, $value );
            $value = explode( PHP_EOL, $value );
            $map = [];
            foreach ( $value as $v ) {
                if (! $v || strpos( $v, ',' ) === false ) continue;
                list( $ext, $bucket ) = preg_split( '/\s*,\s*/', trim( $v ) );
                $map[ strtolower( $ext ) ] = $bucket;
            }
            $this->ext_bucket_map[ $workspace_id ] = $map;
            $value = $map;
        }
        return $value;
    }
}