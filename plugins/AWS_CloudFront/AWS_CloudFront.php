<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

/*
$loader = PT_DIR  . 'vendor' . DS . 'autoload.php';
if ( file_exists( $loader ) ) {
    require_once( $loader );
}
*/

use Aws\CloudFront\CloudFrontClient;
use Aws\CloudFront\Exception\CloudFrontException;
use Aws\Credentials\CredentialProvider;

class AWS_CloudFront extends PTPlugin {

    protected $distributions    = [];
    protected $regions          = [];
    protected $directryIdxes    = [];
    protected $directryOnlys    = [];
    protected $skipBeginWith    = [];
    protected $forcePaths       = [];
    protected $wildCards        = [];
    protected $pathDelayMap     = [];
    protected $exclude_map_ids  = [];
    protected $purge_map        = [];
    protected $exclude_patterns = [];
    protected $trigger_updates  = [];
    protected $trigger_deletes  = [];
    protected $not_cached       = [];
    protected $paths            = [];
    protected $queues           = [];
    protected $update_paths     = [];
    protected $skipped          = false;
    protected $purge_this_month = 0;
    protected $wild_card_count  = 0;
    protected $access_key_ids   = [];
    protected $secret_acc_keys  = [];
    protected $clients          = [];
    protected $distribution_ids = [];

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
              'The plugin AWS_CloudFront cannot be enabled because the required environment variables have not been specified.' );
            return false;
        }
        return true;
    }

    function take_down ( $app ) {
        $fmgr = $app->fmgr;
        $does_act = false;
        $S3 = $app->component( 'AWS_S3' );
        $denied_exts = $app->aws_s3_exclude_exts
                     ? explode( ',', $app->aws_s3_exclude_exts )
                     : explode( ',', $app->denied_exts );
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
        $update_paths = array_merge( $this->update_paths, $fmgr->update_paths );
        $label = null;
        $current_ts  = time();
        $queue_delay = (int) $app->aws_cloudfront_queue_delay;
        $min_delay = (int) $app->aws_cloudfront_min_delay;
        $queue_delay = $queue_delay > $min_delay ? $queue_delay : $min_delay;
        $queue_delay += $current_ts;
        $urls = [];
        $wildCards_map = [];
        $temp_dir = $app->temp_dir;
        $support_dir = $app->support_dir;
        $update_objs = property_exists( $fmgr, 'update_objs' ) ? $fmgr->update_objs : [];
        foreach ( $update_paths as $update_path => $bool ) {
            if (! empty( $this->skipBeginWith ) ) {
                // Continue if matched wildCards.
                foreach ( $this->skipBeginWith as $wildCard => $bool ) {
                    if ( strpos( $update_path, $wildCard ) === 0 ) {
                        unset( $update_paths[ $update_path ] );
                        continue;
                    }
                }
            }
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
                $url = $app->db->model( 'urlinfo' )->load(
                ['file_path' => $update_path, 'delete_flag' => ['IN' => [0, 1] ] ],
                ['sort' => 'delete_flag', 'direction' => 'ascend', 'limit' => 1 ],
                'id,workspace_id,urlmapping_id,relative_url' );
                if ( empty( $url ) ) {
                    unset( $update_paths[ $update_path ] );
                    continue;
                }
                $url = $url[0];
            }
            $workspace_id = (int) $url->workspace_id;
            $distribution_id = $this->get_config( 'aws_cloudfront_distribution_id', $url->workspace_id );
            if (! $distribution_id ) {
                unset( $update_paths[ $update_path ] );
                continue;
            }
            $access_key_id = $this->get_config( 'aws_cloudfront_access_key_id', $workspace_id );
            $secret_access_key = $this->get_config( 'aws_cloudfront_secret_access_key', $workspace_id );
            if (! $access_key_id || ! $secret_access_key ) {
                unset( $update_paths[ $update_path ] );
                continue;
            }
            if ( $url->urlmapping_id ) {
                $exclude_maps = $this->get_config( 'aws_cloudfront_exclude_maps', $url->workspace_id );
                if (! empty( $exclude_maps ) && in_array( $url->urlmapping_id, $exclude_maps ) ) {
                    unset( $update_paths[ $update_path ] );
                    continue;
                }
            }
            if ( is_object( $S3 ) && $app->aws_cloudfront_inherit_S3_extensions ) {
                $sync_extensions = $S3->get_config( 'aws_s3_extensions', $url->workspace_id );
                $extension = PTUtil::get_extension( $update_path, true );
                if (!empty( $sync_extensions ) ) {
                    if ( count( $sync_extensions ) == 1 && $sync_extensions[0] == '*' ) {
                    } else {
                        if (! in_array( $extension, $sync_extensions ) ) {
                            unset( $update_paths[ $update_path ] );
                            continue;
                        }
                    }
                } else {
                    if ( in_array( $extension, $denied_exts ) ) {
                        unset( $update_paths[ $update_path ] );
                        continue;
                    }
                }
            }
            $patterns = $this->get_config( 'aws_cloudfront_exclude_patterns', $workspace_id );
            if (! empty( $patterns ) ) {
                foreach ( $patterns as $exclude_pattern ) {
                    if ( preg_match( $exclude_pattern, $url->relative_url ) ) {
                        unset( $update_paths[ $update_path ] );
                        continue 2;
                    }
                }
            }
            $purge_update = $this->get_config( 'aws_cloudfront_update', $workspace_id );
            $purge_delete = $this->get_config( 'aws_cloudfront_delete', $workspace_id );
            $force_paths = $this->get_config( 'aws_cloudfront_force_paths', $workspace_id );
            $force = !empty( $force_paths ) && in_array( $url->relative_url, $force_paths );
            if (! $force ) {
                $wildCards = $this->wildCards[ $workspace_id ] ?? [];
                if (! empty( $wildCards ) ) {
                    foreach ( $wildCards as $wildCard ) {
                        if ( strpos( $url->relative_url, $wildCard ) === 0 ) {
                            $this->skipBeginWith[ $wildCard ] = true;
                            $wildCards_map[ $update_path ] = $wildCard . '*';
                            $force = true;
                            break;
                        }
                    }
                }
            }
            if (! $force ) {
                if (! $purge_delete && $bool === false ) {
                    unset( $update_paths[ $update_path ] );
                    continue;
                } else if (! $purge_update && $bool === true ) {
                    unset( $update_paths[ $update_path ] );
                    continue;
                }
            }
            $urls[ $update_path ] = $url;
        }
        $realtime = $app->aws_cloudfront_realtime_purge;
        $ts_job_ids = [];
        if (! empty( $update_paths ) ) {
            $ts = date( 'Y-m-d H:i:s', $queue_delay );
            $ts_job = $app->db->model( 'ts_job' )->__new();
            $ts_job->name( 'Purge AWS CloudFront cache' );
            $ts_job->class( 'AWS CloudFront' );
            $ts_job->component( 'AWS_CloudFront' );
            $label = $this->translate( 'Publish File(s)' );
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
                $worker = $app->worker;
                if ( $worker->meth == 'work' ) {
                    $label = $this->translate( 'Scheduled Task' );
                    $realtime = true;
                }
            }
            $ts_job->label( $label );
            $ts_job->start_on( $ts );
            $app->set_default( $ts_job );
            $ts_job->workspace_id( 0 );
            $ts_job->status( 1 );
            if ( $app->aws_cloudfront_ts_job ) {
                $does_act = $ts_job->save();
                $ts_job_ids[ $ts_job->id ] = true;
            }
            $queues = 0;
            $purge_this_month = $this->purge_this_month( $app );
            $this->purge_this_month = $purge_this_month;
            $purges = 0;
            foreach ( $update_paths as $update_path => $bool ) {
                if (! is_bool( $bool ) ) continue; // (int) 1 is new file.
                $url = $urls[ $update_path ] ?? null;
                if (! $url ) {
                    continue;
                }
                $purges++;
                $purge_this_month += $purges;
                if ( $app->aws_cloudfront_maxpurge_per_month > 0 ) {
                    if ( $purge_this_month >= $app->aws_cloudfront_maxpurge_per_month ) {
                        $this->skipped = true;
                        break;
                    }
                }
                $relative_url = $wildCards_map[ $update_path ] ?? $url->relative_url;
                if ( strlen( $relative_url ) != mb_strlen( $relative_url ) ) {
                    $relative_paths = explode( '/', $relative_url );
                    $relative_paths = array_map( 'rawurlencode', $relative_paths );
                    $relative_url = implode( '/', $relative_paths );
                }
                $purge_map = $this->get_config( 'aws_cloudfront_purge_map', $url->workspace_id );
                $distribution_id = $this->get_config( 'aws_cloudfront_distribution_id', $url->workspace_id );
                foreach ( $purge_map as $from => $to ) {
                    $unset = false;
                    $to = $to ? $to : $from;
                    if ( preg_match( '/\*$/', $from ) ) {
                        $from = rtrim( $from, '*' );
                        if ( strpos( $relative_url, $from ) === 0 ) {
                            $relative_url = $to;
                        }
                    } else if ( $from == $relative_url ) {
                        $relative_url = $to;
                    }
                }
                $class = $bool === true ? 'Cache Purge(Update)' : 'Cache Purge(Delete)';
                $queue = $app->db->model( 'queue' )->get_by_key( [
                    'key' => md5( "{$distribution_id}/{$relative_url}" ),
                    'component' => 'AWS_CloudFront',
                    'method' => 'queue_purge',
                    'model' => 'urlinfo',
                    'workspace_id' => $url->workspace_id,
                    ] );
                $queue->class( $class );
                $pathDelayMap = $this->pathDelayMap[ $url->workspace_id ] ?? [];
                if ( isset( $pathDelayMap[ $relative_url ] ) ) {
                    $delay = $pathDelayMap[ $relative_url ];
                    $delay = $delay > $min_delay ? $delay : $min_delay;
                    $this_ts = date( 'Y-m-d H:i:s', $current_ts + $delay );
                    $queue->start_on( $this_ts );
                } else {
                    $queue->start_on( $ts );
                }
                if ( $app->aws_cloudfront_ts_job ) {
                    $queue->ts_job_id( $ts_job->id );
                }
                $queue->value( $distribution_id );
                $invalid_chars_pattern = '/[ `~].*/';
                if ( preg_match($invalid_chars_pattern, $relative_url ) ) {
                    $relative_url = preg_replace( $invalid_chars_pattern, '*', $relative_url );
                }
                $queue->metadata( $relative_url );
                $queue->object_id( $url->id );
                $app->set_default( $queue );
                if ( $realtime ) {
                    if ( $app->id == 'Prototype' && is_object( $S3 ) && $app->aws_s3_realtime_sync ) {
                        if (! isset( $S3->sync_paths[ $update_path ] ) ) {
                            if (! $queue->ts_job_id ) {
                                $does_act = $ts_job->save();
                                $ts_job_ids[ $ts_job->id ] = true;
                                $queue->ts_job_id( $ts_job->id );
                            }
                            $does_act = $queue->save();
                            $queues++;
                            continue;
                        }
                    }
                    $error = '';
                    $result = $this->queue_purge( $app, $queue, $error );
                    if ( $result ) {
                        continue;
                    }
                }
                if ( $app->aws_cloudfront_ts_job && ! $queue->ts_job_id ) {
                    $does_act = $ts_job->save();
                    $ts_job_ids[ $ts_job->id ] = true;
                    $queue->ts_job_id( $ts_job->id );
                }
                $does_act = $queue->save();
                $queues++;
            }
            if ( $app->aws_cloudfront_ts_job ) {
                if (! $queues ) {
                    unset( $ts_job_ids[ $ts_job->id ] );
                    $ts_job->remove();
                } else {
                    $ts_job->status( 2 );
                    $does_act = $ts_job->save();
                    $ts_job_ids[ $ts_job->id ] = true;
                }
            }
        }
        if (! empty( $this->not_cached ) ) {
            foreach ( $this->paths as $distribution_id => $paths ) {
                foreach ( $paths as $path => $bool ) {
                    if ( isset( $this->not_cached["{$distribution_id}{$path}"] ) ) {
                        unset( $paths[ $path ] );
                    }
                }
                if ( empty( $paths ) ) {
                    unset( $this->paths[ $distribution_id ] );
                } else {
                    $this->paths[ $distribution_id ] = $paths;
                }
            }
        }
        if (! empty( $this->paths ) ) {
            if ( $app->composer_autoload ) {
                require_once( $app->composer_autoload );
            }
            $error = false;
            $purged = false;
            if ( $app->aws_cloudfront_maxpurge_per_once > 0 ) {
                $path_count = 0;
                foreach ( $this->paths as $distribution_id => $paths ) {
                    $path_count += count( $paths );
                }
                if ( $path_count > $app->aws_cloudfront_maxpurge_per_once ) {
                    foreach ( $this->paths as $distribution_id => $paths ) {
                        $this->paths[ $distribution_id ] = ['/*' => true];
                    }
                }
            }
            foreach ( $this->paths as $distribution_id => $paths ) {
                $paths = array_keys( $paths );
                if (! empty( $paths ) ) {
                    $all_paths = array_chunk( $paths, $app->aws_cloudfront_bulk_per );
                    $i = 0;
                    foreach ( $all_paths as $paths ) {
                        if ( $i && $app->aws_cloudfront_api_interval ) {
                            usleep( $app->aws_cloudfront_api_interval );
                        }
                        if (! isset( $this->distribution_ids[ $distribution_id ] ) ) {
                            continue;
                        }
                        list( $access_key_id, $secret_access_key, $aws_region ) = $this->distribution_ids[ $distribution_id ];
                        if (! $aws_region ) {
                            continue;
                        }
                        if ( isset( $this->clients[ $distribution_id ] ) ) {
                            $client = $this->clients[ $distribution_id ];
                        } else {
                            if (! $access_key_id || ! $secret_access_key ) {
                                $credentials = CredentialProvider::defaultProvider();
                                $credentials = CredentialProvider::memoize( $credentials );
                            } else {
                                $credentials = [
                                    'key'    => $access_key_id,
                                    'secret' => $secret_access_key,
                                ];
                            }
                            $client = new CloudFrontClient( [
                                'region'  => $aws_region,
                                'version' => $app->aws_cloudfront_api_version,
                                'credentials' => $credentials,
                            ] );
                            $this->clients[ $distribution_id ] = $client;
                        }
                        try {
                            $result = $client->createInvalidation( [
                                'DistributionId' => $distribution_id,
                                'InvalidationBatch' => [
                                    'Paths' => [
                                        'Quantity' => count( $paths ),
                                        'Items' => $paths,
                                    ],
                                    'CallerReference' => $app->magic(),
                                ],
                            ] );
                            $purged = true;
                            if ( $paths[0] === '/*' ) {
                                $this->purge_cloudfront_queue( $app, 0, $distribution_id );
                                $queue_keys = array_keys( $this->queues );
                                foreach ( $queue_keys as $key ) {
                                    if ( strpos( $key, $distribution_id ) === 0 ) {
                                        unset( $this->queues[ $key ] );
                                    }
                                }
                                unset( $queue_keys );
                            } else {
                                foreach ( $paths as $path ) {
                                    unset( $this->queues["{$distribution_id}{$path}"] );
                                }
                            }
                        } catch ( CloudFrontException $e ) {
                            $metadata = ['distribution_id' =>  $distribution_id, 'paths' => $paths, 'method' => 'take_down'];
                            $this->log( $this->translate(
                                'An error occues while purge AWS CloudFront cache(%s).', $e->getAwsErrorMessage() ), 'error', $metadata );
                            $error = true;
                        }
                        $i++;
                    }
                }
            }
            if ( $purged ) {
                $this->log( $this->translate( 'Purge AWS CloudFront cache.' ), 'info', $this->paths );
            }
            if ( $error && !empty( $this->queues ) ) {
                $app->db->begin_work();
                $ts = date( 'Y-m-d H:i:s', $queue_delay + $app->job_retry_interval ); // + 60
                if ( $app->aws_cloudfront_ts_job ) {
                    $ts_job = $app->db->model( 'ts_job' )->__new();
                    $ts_job->name( 'Purge AWS CloudFront cache' );
                    $ts_job->class( 'AWS CloudFront' );
                    $ts_job->component( 'AWS_CloudFront' );
                    $label = $label ? $label . $this->translate( '(Retry)' ) : $this->translate( 'Cache Purge(Retry)' );
                    $ts_job->label( $label );
                    $ts_job->start_on( $ts );
                    $app->set_default( $ts_job );
                    $ts_job->workspace_id( 0 );
                    $does_act = $ts_job->save();
                    $ts_job_ids[ $ts_job->id ] = true;
                    $queues = $this->queues;
                    foreach ( $queues as $idx => $queue ) {
                        $queue->start_on( $ts );
                        $queue->ts_job_id( $ts_job->id );
                        $queues[ $idx ] = $queue;
                    }
                    $app->db->model( 'queue' )->update_multi( $queues );
                } else {
                    $queues = $this->queues;
                    foreach ( $queues as $idx => $queue ) {
                        $queue->start_on( $ts );
                        $queues[ $idx ] = $queue;
                    }
                    $app->db->model( 'queue' )->update_multi( $queues );
                }
                $app->db->commit();
            }
        }
        if (! $realtime && $does_act ) {
            $terms = ['component' => 'AWS_CloudFront', 'method' => 'queue_purge', 'model' => 'urlinfo'];
            $terms['metadata'] = ['LIKE' => '%*'];
            $wild_cards = $app->db->model( 'queue' )->load( $terms );
            // Merge Wild Card.
            foreach ( $wild_cards as $wild_card ) {
                $path = rtrim( $wild_card->metadata, '*' );
                $path = $app->db->escape_like( $path, false, true );
                $terms['metadata'] = ['LIKE' => $path ];
                $terms['id'] = ['!=' => $wild_card->id ];
                $queues = $app->db->model( 'queue' )->load( $terms );
                if (! empty( $queues ) ) {
                    $app->db->model( 'queue' )->remove_multi( $queues );
                }
            }
            // Delete Empty Jobs.
            if ( $app->aws_cloudfront_ts_job ) {
                $terms = ['name' => 'Purge AWS CloudFront cache', 'class' => 'AWS CloudFront', 'component' => 'AWS_CloudFront'];
                if (!empty( $ts_job_ids ) ) {
                    $terms['id'] = ['NOT IN' => $ts_job_ids ];
                }
                $ts_jobs = $app->db->model( 'ts_job' )->load( $terms );
                foreach ( $ts_jobs as $ts_job ) {
                    $count = $app->db->model( 'queue' )->count( ['ts_job_id' => $ts_job->id ] );
                    if (! $count ) {
                        $ts_job->remove();
                    }
                }
            }
        }
        if ( $this->skipped ) {
            $this->log( $this->translate(
            'The AWS CloudFront cache purge process has been skipped because the configured monthly purge limit has been reached.' ), 'error' );
        }
    }

    function start_publish ( $cb, $app, $unlink ) {
        $ui = $cb['urlinfo'];
        $force_paths = $this->get_config( 'aws_cloudfront_force_paths', $ui->workspace_id );
        $force = !empty( $force_paths ) && in_array( $ui->relative_url, $force_paths );
        if (! $force ) {
            $wildCards = $this->wildCards[ $ui->workspace_id ] ?? [];
            if (! empty( $wildCards ) ) {
                foreach ( $wildCards as $wildCard ) {
                    if ( strpos( $ui->relative_url, $wildCard ) === 0 ) {
                        $force = true;
                        break;
                    }
                }
            }
        }
        if (! $force ) {
            if (! $app->aws_cloudfront_purge_dynamic ) return true;
        }
        $obj = $cb['object'];
        $original = isset( $cb['original'] ) ? $cb['original'] : clone $obj;
        $update = false;
        if ( $ui->delete_flag ) {
            $unlink = true;
        } else if (! $unlink && $obj && $obj->has_column( 'status' ) ) {
            $status_published = $app->status_published( $obj->_model );
            if ( $obj->status != $status_published ) {
                $unlink = true;
            } else {
                $unlink = false;
            }
            if ( $unlink || ( $original && $original->status != $status_published ) ) {
                $ui->md5 = '';
                $update = true;
            }
        }
        if ( $ui->publish_file != 6 && $ui->publish_file != 3 && ! $unlink ) {
            if ( $update ) {
                $ui->save();
            }
            return true;
        }
        if ( $ui->publish_file == 4 ) {
            // Queue
            if ( $update ) {
                $ui->save();
            }
            return true;
        }
        if ( $ui->urlmapping_id ) {
            $exclude_maps = $this->get_config( 'aws_cloudfront_exclude_maps', $ui->workspace_id );
            if (! empty( $exclude_maps ) && in_array( $ui->urlmapping_id, $exclude_maps ) ) {
                if ( $update ) {
                    $ui->save();
                }
                return true;
            }
        }
        // Newly created files cannot be determined dynamically.
        $this->update_paths[ $ui->file_path ] = true;
        return true;
    }

    function queue_purge ( $app, $queue, &$error ) {
        $workspace_id = $queue->workspace_id;
        $access_key_id = $this->get_config( 'aws_cloudfront_access_key_id', $workspace_id );
        $secret_access_key = $this->get_config( 'aws_cloudfront_secret_access_key', $workspace_id );
        if (! $access_key_id || ! $secret_access_key ) {
            return false;
        }
        $distribution_id = $this->get_config( 'aws_cloudfront_distribution_id', $workspace_id );
        if (! $distribution_id ) {
            return false;
        }
        $path = $queue->metadata;
        if ( preg_match( '/\*$/', $path ) ) {
            $this->wild_card_count++;
        }
        if ( $this->wild_card_count > 15 ) {
            // If you’re using the * wildcard, you can have requests for up to 15 invalidation paths in progress at one time.
            return false;
        }
        $directryIdx = $this->get_config( 'aws_cloudfront_directory_index', $workspace_id );
        $this->paths[ $distribution_id ][ $path ] = true;
        $purge_this_month = $this->purge_this_month ? $this->purge_this_month : $this->purge_this_month( $app );
        $this->purge_this_month = $purge_this_month;
        $purges = 0;
        foreach ( $this->paths as $key => $urls ) {
            $purges += count( $urls );
        }
        $purge_this_month += $purges;
        if ( $app->aws_cloudfront_maxpurge_per_month > 0 && $purge_this_month >= $app->aws_cloudfront_maxpurge_per_month ) {
            $this->skipped = true;
            return false;
        } else {
            if ( $directryIdx && basename( $path ) == $directryIdx ) {
                $directryOnly = $this->get_config( 'aws_cloudfront_only_directry', $workspace_id );
                if ( $directryOnly ) {
                    unset( $this->paths[ $distribution_id ][ $path ] );
                    $purge_this_month--;
                }
                $directryIdx = preg_quote( $directryIdx );
                $index = preg_replace( "/$directryIdx$/", '', $path );
                $this->paths[ $distribution_id ][ $index ] = true;
                $purge_this_month += 1;
                if ( $app->aws_cloudfront_purge_directry_without_slash ) {
                    if ( $app->aws_cloudfront_maxpurge_per_month > 0 && $purge_this_month >= $app->aws_cloudfront_maxpurge_per_month ) {
                        $this->skipped = true;
                    } else {
                        $index = preg_replace( "/\/$directryIdx$/", '', $path );
                        $this->paths[ $distribution_id ][ $index ] = true;
                        $purge_this_month += 1;
                    }
                }
            }
        }
        $this->queues["{$distribution_id}{$path}"] = $queue;
        return true;
    }

    function aws_cloudfront_urlinfo_invalidation ( $app, $objects, $action ) {
        if ( $app->aws_cloudfront_maxpurge_per_month > 0 ) {
            $purge_this_month = $this->purge_this_month( $app );
            if ( $purge_this_month >= $app->aws_cloudfront_maxpurge_per_month ) {
                $app->error( $this->translate( 'The AWS CloudFront cache purges have reached the set monthly purge limit.' ) );
            }
        }
        if ( $app->composer_autoload ) {
            require_once( $app->composer_autoload );
        }
        $class = new PTListActions();
        $model = $app->param( '_model' );
        $all_paths = [];
        $distribution_ids = [];
        $ctx = $app->ctx;
        foreach ( $objects as $obj ) {
            $workspace_id = $obj->workspace_id;
            $distribution_id = $this->get_config( 'aws_cloudfront_distribution_id', $workspace_id );
            if (! $distribution_id ) {
                continue;
            }
            $distribution_ids[ $distribution_id ] = $workspace_id;
            $paths = $all_paths[ $distribution_id ] ?? [];
            $paths[] = $ctx->modifier_encode_url_basename( $obj->relative_url, 'all' );
            $all_paths[ $distribution_id ] = $paths;
        }
        $counter = 0;
        foreach ( $all_paths as $distribution_id => $paths ) {
            $send_paths = [];
            $workspace_id = $distribution_ids[ $distribution_id ];
            $aws_region = $this->get_config( 'aws_cloudfront_region', $workspace_id );
            $access_key_id = $this->get_config( 'aws_cloudfront_access_key_id', $workspace_id );
            $secret_access_key = $this->get_config( 'aws_cloudfront_secret_access_key', $workspace_id );
            if (! $access_key_id || ! $secret_access_key ) {
                $credentials = CredentialProvider::defaultProvider();
                $credentials = CredentialProvider::memoize( $credentials );
            } else {
                $credentials = [
                    'key'    => $access_key_id,
                    'secret' => $secret_access_key,
                ];
            }
            $client = new CloudFrontClient( [
                'region'  => $aws_region,
                'version' => $app->aws_cloudfront_api_version,
                'credentials' => $credentials,
            ] );
            try {
                $result = $client->createInvalidation( [
                    'DistributionId' => $distribution_id,
                    'InvalidationBatch' => [
                        'Paths' => [
                            'Quantity' => count( $paths ),
                            'Items' => $paths,
                        ],
                        'CallerReference' => $app->magic(),
                    ],
                ] );
                $send_paths[ $distribution_id ] = $paths;
                if (!empty( $send_paths ) ) {
                    $this->log( $this->translate( 'Purge AWS CloudFront cache.' ), 'info', $send_paths );
                }
                $counter += count( $paths );
            } catch ( CloudFrontException $e ) {
                $metadata = ['distribution_id' =>  $distribution_id, 'paths' => $paths, 'method' => 'aws_cloudfront_urlinfo_invalidation'];
                $app->error( $this->translate(
                    'An error occues while purge AWS CloudFront cache(%s).', $e->getAwsErrorMessage() ), 'error', $metadata );
            }
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
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function aws_cloudfront_invalidation ( $app ) {
        $json_string = file_get_contents( 'php://input' );
        $json = json_decode( $json_string, true );
        $magic_token = $json['magic_token'];
        if ( $magic_token != $app->current_magic ) {
            $app->json_error( 'Invalid request.' );
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $access_key_id = $this->get_config( 'aws_cloudfront_access_key_id', $workspace_id );
        $secret_access_key = $this->get_config( 'aws_cloudfront_secret_access_key', $workspace_id );
        $path = $json['path'] ?? null;
        if (! $path ) {
            $app->json_error( $this->translate( 'No text selected.' ) );
        }
        if ( strlen( $path ) != mb_strlen( $path ) ) {
            $paths = explode( '/', $path );
            $paths = array_map( 'rawurlencode', $paths );
            $path = implode( '/', $paths );
        }
        $distribution_id = $json['distribution_id'] ?? $this->get_config( 'aws_cloudfront_distribution_id', $workspace_id );
        if (! $distribution_id ) {
            $app->json_error( $this->translate( 'Cannot be execute because the required environment variables or settings have not been specified.' ) );
        }
        $aws_region = $json['region'] ?? $this->get_config( 'aws_cloudfront_region', $workspace_id );
        if (! $aws_region ) {
            $app->json_error( $this->translate( 'Cannot be execute because the required environment variables or settings have not been specified.' ) );
        }
        $purge_this_month = $this->purge_this_month( $app );
        if ( $app->aws_cloudfront_maxpurge_per_month > 0 ) {
            if ( $purge_this_month >= $app->aws_cloudfront_maxpurge_per_month ) {
                $app->json_error( $this->translate( 'The AWS CloudFront cache purges have reached the set monthly purge limit.' ) );
            }
        }
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
        $client = new CloudFrontClient( [
            'region'  => $aws_region,
            'version' => $app->aws_cloudfront_api_version,
            'credentials' => $credentials,
        ] );
        $all_paths = [];
        $paths = [ $path ];
        try {
            $result = $client->createInvalidation( [
                'DistributionId' => $distribution_id,
                'InvalidationBatch' => [
                    'Paths' => [
                        'Quantity' => count( $paths ),
                        'Items' => $paths,
                    ],
                    'CallerReference' => $app->magic(),
                ],
            ] );
            $all_paths[ $distribution_id ] = $paths;
            header( 'Content-type: application/json' );
            echo json_encode( ['status' => $result['@metadata']['statusCode'] ] );
            if ( $path == '/*' ) {
                $this->purge_cloudfront_queue( $app, $workspace_id, $distribution_id );
            } else if ( preg_match( '/\*$/', $path ) ) {
                $this->purge_cloudfront_queue( $app, $workspace_id, $distribution_id, $path );
            }
        } catch ( CloudFrontException $e ) {
            $metadata = ['distribution_id' =>  $distribution_id, 'paths' => $paths, 'method' => 'aws_cloudfront_invalidation'];
            $this->log( $this->translate(
                'An error occues while purge AWS CloudFront cache(%s).', $e->getAwsErrorMessage() ), 'error', $metadata, $workspace_id );
        }
        if (!empty( $all_paths ) ) {
            $this->log( $this->translate( 'Purge AWS CloudFront cache.' ), 'info', $all_paths );
            exit();
        }
        $app->json_error( $this->translate( 'An error occues while purge AWS CloudFront cache.' ) );
    }

    function purge_cloudfront_queue ( $app, $workspace_id, $distribution_id, $wokdCard = null ) {
        if ( $wokdCard ) {
            $wokdCard = rtrim( $wokdCard, '*' );
            $terms = ['component' => 'AWS_CloudFront', 'method' => 'queue_purge', 'model' => 'urlinfo', 'value' => $distribution_id ];
            $wokdCard = $app->db->escape_like( $wokdCard, false, true );
            $terms['metadata'] = ['LIKE' => $wokdCard ];
            $queues = $app->db->model( 'queue' )->load( $terms );
            if (!empty( $queues ) ) {
                $app->db->model( 'queue' )->remove_multi( $queues );
            }
            return;
        }
        $options = $app->db->model( 'option' )->load( ['key' => 'aws_cloudfront_distribution_id',
                                                       'kind' => 'plugin_setting',
                                                       'extra' => 'aws_cloudfront',
                                                       'value' => $distribution_id ] );
        $workspace_ids = [];
        foreach ( $options as $option ) {
            $workspace_ids[ $option->workspace_id ] = true;
        }
        if (! $workspace_id && isset( $workspace_ids[0] ) ) {
            $options = $app->db->model( 'option' )->load( ['key' => 'aws_cloudfront_use_system_setting',
                                                           'kind' => 'plugin_setting',
                                                           'extra' => 'aws_cloudfront',
                                                           'value' => 1] );
            foreach ( $options as $option ) {
                $workspace_ids[ $option->workspace_id ] = true;
            }
        }
        $workspace_ids = array_keys( $workspace_ids );
        $queues = $app->db->model( 'queue' )->load( ['component' => 'AWS_CloudFront', 'workspace_id' => ['IN' => $workspace_ids ] ] );
        if (! empty( $queues ) ) {
            $ts_job_ids = [];
            foreach ( $queues as $queue ) {
                if ( $queue->ts_job_id ) {
                    $ts_job_ids[ $queue->ts_job_id ] = true;
                }
                $queue->remove();
            }
            if ( $ts_job_ids ) {
                $ts_job_ids = array_keys( $ts_job_ids );
                $ts_jobs = $app->db->model( 'ts_job' )->load( ['id' => ['IN' => $ts_job_ids ] ] );
                if ( is_array( $ts_jobs ) ) {
                    foreach ( $ts_jobs as $ts_job ) {
                        $queues = $app->db->model( 'queue' )->count( ['component' => 'AWS_CloudFront', 'ts_job_id' => $ts_job->id ] );
                        if (! $queues ) {
                            $ts_job->remove();
                        }
                    }
                }
            }
        }
    }

    function purge_cloudfront_cache ( $app ) {
        $argv = $app->worker->argv;
        if ( is_array( $argv ) && in_array( 'aws_cloudfront_purge_cache', $argv ) ) {
        } else {
            return false;
        }
        if ( $app->aws_cloudfront_maxpurge_per_month > 0 ) {
            $purge_this_month = $this->purge_this_month( $app );
            if ( $purge_this_month >= $app->aws_cloudfront_maxpurge_per_month ) {
                $this->log( $this->translate(
                'The AWS CloudFront cache purge process has been skipped because the configured monthly purge limit has been reached.' ), 'error' );
                return false;
            }
        }
        $options = $app->db->model( 'option' )->load( ['key' => 'aws_cloudfront_distribution_id',
                                                       'kind' => 'plugin_setting',
                                                       'extra' => 'aws_cloudfront'] );
        $distribution_ids = [];
        foreach ( $options as $option ) {
            if ( $option->value ) {
                $distribution_ids[ $option->value ] = $option->workspace_id;
            }
        }
        if ( $app->composer_autoload ) {
            require_once( $app->composer_autoload );
        }
        $counter = 0;
        $all_paths = [];
        foreach ( $distribution_ids as $distribution_id => $workspace_id ) {
            $access_key_id = $this->get_config( 'aws_cloudfront_access_key_id', $workspace_id );
            $secret_access_key = $this->get_config( 'aws_cloudfront_secret_access_key', $workspace_id );
            $aws_region = $resion = $this->get_config( 'aws_cloudfront_region', $workspace_id );
            if (! $aws_region ) {
                continue;
            }
            if ( isset( $this->clients[ $distribution_id ] ) ) {
                $client = $this->clients[ $distribution_id ];
            } else {
                if (! $access_key_id || ! $secret_access_key ) {
                    $credentials = CredentialProvider::defaultProvider();
                    $credentials = CredentialProvider::memoize( $credentials );
                } else {
                    $credentials = [
                        'key'    => $access_key_id,
                        'secret' => $secret_access_key,
                    ];
                }
                $client = new CloudFrontClient( [
                    'region'  => $aws_region,
                    'version' => $app->aws_cloudfront_api_version,
                    'credentials' => $credentials,
                ] );
                $this->clients[ $distribution_id ] = $client;
            }
            $paths = ['/*'];
            try {
                $result = $client->createInvalidation( [
                    'DistributionId' => $distribution_id,
                    'InvalidationBatch' => [
                        'Paths' => [
                            'Quantity' => count( $paths ),
                            'Items' => $paths,
                        ],
                        'CallerReference' => $app->magic(),
                    ],
                ] );
                $counter++;
                $all_paths[ $distribution_id ] = $paths;
            } catch ( CloudFrontException $e ) {
                $metadata = ['distribution_id' =>  $distribution_id, 'paths' => $paths, 'method' => 'purge_cloudfront_cache'];
                $this->log( $this->translate(
                    'An error occues while purge AWS CloudFront cache(%s).', $e->getAwsErrorMessage() ), 'error', $metadata );
            }
        }
        if (!empty( $all_paths ) ) {
            $this->log( $this->translate( 'Purge AWS CloudFront cache.' ), 'info', $all_paths );
            foreach ( $options as $option ) {
                if ( $option->value ) {
                    $this->purge_cloudfront_queue( $app, $option->workspace_id, $option->value );
                }
            }
        }
        return $counter;
    }

    function hdlr_awscloudfrontpurgethismonth ( $args, $ctx ) {
        $app = $ctx->app;
        return $this->purge_this_month( $app );
    }

    function purge_this_month ( $app ) {
        $offset_time = $app->offset_time( $app->timezone );
        list( $start, $end ) = PTUtil::start_end_month( date( 'YmdHis', $this->start_time ) );
        $start = strtotime( $start ) + $offset_time;
        $start = date( 'Y-m-d H:i:s', $start );
        $sql = "SELECT SUM(log_md5) from {$app->db->prefix}log WHERE log_created_on >= ?";
        $sql .= ' AND log_category = ? AND log_level=1';
        $placeholders = [ $start, 'aws_cloudfront'];
        $key = 'SUM(log_md5)';
        $logs = $app->db->model( 'log' )->load( $sql, $placeholders );
        $purge_this_month = isset( $logs[0] ) && is_object( $logs[0] ) ? (int) $logs[0]->$key : 0;
        return $purge_this_month;
    }

    function log ( $message, $level = 'info', $metadata = [], $workspace_id = 0, $app = null ) {
        if (! $app ) $app = Prototype::get_instance();
        $plugin_id = strtolower( get_class( $this ) );
        $log = ['level' => $level, 'category' => $plugin_id,
                'message' => $message, 'workspace_id' => $workspace_id ];
        if (! empty( $metadata ) ) {
            $log['metadata'] = $metadata;
        }
        $purges = 0;
        if ( $level == 'info' && !empty( $metadata ) ) {
            foreach ( $metadata as $key => $urls ) {
                $purges += count( $urls );
            }
        }
        $log['md5'] = $purges; // aws_cloudfront_maxpurge_per_month
        $log = $app->log( $log );
        if ( $app->id === 'Worker' && $level == 'error' ) {
            echo $message, PHP_EOL;
        }
        return $log;
    }

    function get_config ( $key, $workspace_id ) {
        if ( $key == 'aws_cloudfront_distribution_id' && isset( $this->distributions[ $workspace_id ] ) ) {
            return $this->distributions[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_directory_index' && isset( $this->directryIdxes[ $workspace_id ] ) ) {
            return $this->directryIdxes[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_only_directry' && isset( $this->directryOnlys[ $workspace_id ] ) ) {
            return $this->directryOnlys[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_purge_map' && isset( $this->purge_map[ $workspace_id ] ) ) {
            return $this->purge_map[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_exclude_patterns' && isset( $this->exclude_patterns[ $workspace_id ] ) ) {
            return $this->exclude_patterns[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_update' && isset( $this->trigger_updates[ $workspace_id ] ) ) {
            return $this->trigger_updates[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_delete' && isset( $this->trigger_deletes[ $workspace_id ] ) ) {
            return $this->trigger_deletes[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_region' && isset( $this->regions[ $workspace_id ] ) ) {
            return $this->regions[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_exclude_maps' && isset( $this->exclude_map_ids[ $workspace_id ] ) ) {
            return $this->exclude_map_ids[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_access_key_id' && isset( $this->access_key_ids[ $workspace_id ] ) ) {
            return $this->access_key_ids[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_secret_access_key' && isset( $this->secret_acc_keys[ $workspace_id ] ) ) {
            return $this->secret_acc_keys[ $workspace_id ];
        } else if ( $key == 'aws_cloudfront_force_paths' && isset( $this->forcePaths[ $workspace_id ] ) ) {
            return $this->forcePaths[ $workspace_id ];
        }
        $app = Prototype::get_instance();
        if ( $key == 'aws_cloudfront_access_key_id' || $key == 'aws_cloudfront_secret_access_key' ) {
            $cfg_workspace_id = $workspace_id;
            $use_system = $this->get_config_value( 'aws_cloudfront_use_system_setting', $workspace_id );
            if (! $app->aws_cloudfront_setting_by_scope ) {
                $cfg_workspace_id = 0;
            } else if ( $use_system ) {
                $cfg_workspace_id = 0;
            }
            $value = $this->get_config_value( $key, $cfg_workspace_id );
            if ( $key == 'aws_cloudfront_access_key_id' ) {
                $this->access_key_ids[ $workspace_id ] = $value;
            } else if ( $key == 'aws_cloudfront_secret_access_key' ) {
                $this->secret_acc_keys[ $workspace_id ] = $value;
            }
            return $value;
        }
        $value = $this->get_config_value( $key, $workspace_id );
        if ( $workspace_id ) {
            $use_system = $this->get_config_value( 'aws_cloudfront_use_system_setting', $workspace_id );
            if ( $use_system ) {
                $value = $this->get_config_value( $key, 0 );
            }
        }
        if ( $key == 'aws_cloudfront_distribution_id' ) {
            if (! isset( $this->distribution_ids[ $value ] ) ) {
                $access_key_id = $this->get_config( 'aws_cloudfront_access_key_id', $workspace_id );
                $secret_access_key = $this->get_config( 'aws_cloudfront_secret_access_key', $workspace_id );
                $region = $this->get_config( 'aws_cloudfront_region', $workspace_id );
                if ( $region ) {
                    $this->distribution_ids[ $value ] = [ $access_key_id, $secret_access_key, $region ];
                }
            }
            $this->distributions[ $workspace_id ] = $value;
        } else if ( $key == 'aws_cloudfront_directory_index' ) {
            $this->directryIdxes[ $workspace_id ] = $value;
        } else if ( $key == 'aws_cloudfront_only_directry' ) {
            $this->directryOnlys[ $workspace_id ] = $value;
        } else if ( $key == 'aws_cloudfront_purge_map' ) {
            $purge_mapping = $value;
            $purge_map = [];
            $pathDelayMap = $this->pathDelayMap[ $workspace_id ] ?? [];
            if ( $purge_mapping ) {
                $purge_mapping = preg_replace( "/\r\n|\r|\n/", PHP_EOL, trim( $purge_mapping ) );
                $purge_mapping = explode( PHP_EOL, $purge_mapping );
                $purge_mapping = array_filter( $purge_mapping, 'strlen' ) ;
                foreach ( $purge_mapping as $line ) {
                    $line = trim( $line );
                    $line = str_replace( '\\,', "\t", $forcePath );
                    $items = preg_split( '/\s*,\s*/', $line );
                    $key = array_shift( $items );
                    $value = array_shift( $items );
                    $key = str_replace( "\t", ',', $key );
                    $value = str_replace( "\t", ',', $value );
                    $purge_map[ $key ] = $value;
                    if (! empty( $items ) ) {
                        $delay = array_shift( $items );
                        $delay = (int) $delay;
                        if ( $delay ) {
                            $pathDelayMap[ $value ] = $delay;
                        }
                    }
                }
            }
            $this->pathDelayMap[ $workspace_id ]  = $pathDelayMap;
            $this->purge_map[ $workspace_id ] = $purge_map;
            return $purge_map;
        } else if ( $key == 'aws_cloudfront_exclude_patterns' ) {
            $excludes = trim( $value );
            $exclude_patterns = [];
            if ( $excludes ) {
                $excludes = preg_replace( "/\r\n|\r|\n/", PHP_EOL, trim( $excludes ) );
                $excludes = explode( PHP_EOL, $excludes );
                $excludes = array_filter( $excludes, 'strlen' ) ;
                foreach ( $excludes as $exclude ) {
                    if ( strpos( $exclude, '/' ) === 0 && preg_match( '!/$!', $exclude ) ) {
                    } else if ( strpos( $exclude, '!' ) === 0 && preg_match( '/!$/', $exclude ) ) {
                    } else {
                        $exclude = preg_replace( '!([^\\\\])\.!', '$1\\.', $exclude );
                        $exclude = preg_replace( '!^\.!', '\\.', $exclude );
                        $exclude = preg_replace( '!([^\.])\*!', '$1.*', $exclude );
                        $exclude = trim( $exclude, '!' );
                        $exclude = PTUtil::sanitize_regex( $exclude, '!' );
                        $exclude = "!{$exclude}!";
                    }
                    $exclude_patterns[] = $exclude;
                }
            }
            $this->exclude_patterns[ $workspace_id ] = $exclude_patterns;
            return $exclude_patterns;
        } else if ( $key == 'aws_cloudfront_update' ) {
            $this->trigger_updates[ $workspace_id ] = $value;
        } else if ( $key == 'aws_cloudfront_delete' ) {
            $this->trigger_deletes[ $workspace_id ] = $value;
        } else if ( $key == 'aws_cloudfront_region' ) {
            $this->regions[ $workspace_id ] = $value;
        } else if ( $key == 'aws_cloudfront_exclude_maps' ) {
            $value = trim( $value );
            $value = ! $value ? [] : array_map( 'intval',  preg_split( '/\s*,\s*/', $value ) );
            $this->exclude_map_ids[ $workspace_id ] = $value;
        } else if ( $key == 'aws_cloudfront_force_paths' ) {
            $value = preg_replace( "/\r\n|\r|\n/", PHP_EOL, trim( $value ) );
            $forcePaths = explode( PHP_EOL, $value );
            $wildCards = [];
            $pathDelayMap = $this->pathDelayMap[ $workspace_id ] ?? [];
            foreach ( $forcePaths as $idx => $forcePath ) {
                $delay = null;
                if ( strpos( $forcePath, ',' ) !== false ) {
                    $forcePath = str_replace( '\\,', "\t", $forcePath );
                    if ( strpos( $forcePath, ',' ) !== false ) {
                        list( $forcePath, $delay ) = explode( ',', $forcePath );
                        $forcePath = str_replace( "\t", ',', $forcePath );
                        $delay = (int) $delay;
                        if ( $delay ) {
                            $pathDelayMap[ $forcePath ] = $delay;
                        }
                    } else {
                        $forcePath = str_replace( "\t", ',', $forcePath );
                    }
                }
                if ( preg_match( '/\*$/', $forcePath ) ) {
                    $wildCards[] = rtrim( $forcePath, '*' );
                    unset( $forcePaths[ $idx ] );
                }
            }
            $this->pathDelayMap[ $workspace_id ]  = $pathDelayMap;
            $this->wildCards[ $workspace_id ]  = $wildCards;
            $this->forcePaths[ $workspace_id ] = $forcePaths;
            return $forcePaths;
        }
        return $value;
    }
}