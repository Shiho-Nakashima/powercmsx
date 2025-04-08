<?php

class PTAccessAnalytics extends Prototype {

    function __construct ( $options = [] ) {
        $this->id = 'AccessAnalytics';
        $this->login_model = 'member';
        parent::__construct( $options );
    }

    function run () {
        if ( $this->version > 300002 ) {
            if ( parent::have_method() ) {
                return parent::run();
            }
        }
        $app = $this;
        $uri = $app->param( 'uri' );
        $workspace_id = $app->param( 'workspace_id' );
        if (! $uri ) $this->print_json( 'HTTP/1.1 404 Not Found', 404 );
        $msg = '';
        if ( strpos( $uri, '/' ) === 0 ) {
            $site_url = $app->site_url;
            if ( $workspace_id ) {
                $workspace = $app->db->model( 'workspace' )->load( (int) $workspace_id );
                if ( $workspace ) {
                    $site_url = $workspace->site_url;
                }
                $uri = $site_url . ltrim( $uri, '/' );
            }
        }
        if (! $app->is_valid_url( $uri, $msg ) ) {
            $this->print_json( 'HTTP/1.1 404 Not Found', 404 );
        }
        $component = $app->component( 'AccessAnalytics' );
        $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
        $exclude_bots = $component->get_config_value( 'accessanalytics_exclude_bots' );
        if ( $exclude_bots && $user_agent ) {
            $exclude_bots = preg_split( '/\s*,\s*/', $exclude_bots );
            foreach ( $exclude_bots as $exclude_bot ) {
                if ( stripos( $user_agent, $exclude_bot ) !== false ) {
                    $this->print_json( 'HTTP/1.1 403 Forbidden', 403 );
                }
            }
        }
        $exclude_ips = $component->get_config_value( 'accessanalytics_exclude_ips' );
        if ( $exclude_ips ) {
            $exclude_ips = preg_split( '/\s*,\s*/', $exclude_ips );
            if ( in_array( $app->remote_ip, $exclude_ips ) ) {
                $this->print_json( 'HTTP/1.1 200 OK' );
            }
        }
        list( $request, $param ) = array_pad( explode( '?', $uri ), 2, null );
        if (! $request ) $this->print_json( 'HTTP/1.1 404 Not Found', 404 );
        if ( preg_match( '!/$!', $request ) ) {
            $request .= $app->directory_index;
        }
        $terms = ['url' => $request ];
        $url = $app->db->model( 'urlinfo' )->load( $terms, ['limit' => 1] );
        if ( empty( $url ) ) $this->print_json( 'HTTP/1.1 404 Not Found', 404 );
        $url = $url[0];
        if ( $url->delete_flag ) {
            $this->print_json( 'HTTP/1.1 404 Not Found', 404 );
        }
        $activity = $app->db->model( 'activity' )->new( ['url' => $request ] );
        $activity->object_id( (int) $url->object_id );
        $activity->model( $url->model );
        $app_url = $component->get_config_value( 'accessanalytics_app_url', $url->workspace_id );
        if (! $app_url ) {
            $app_url = $app->accessanalytics_app_url;
            if ( $app_url ) {
                list( $request, $param ) = array_pad( explode( '?', $app->request_uri ), 2, null );
                if ( preg_match( '!/$!', $request ) ) {
                    $request .= 'index.html';
                }
                $host = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : null;
                if (! $host ) {
                    $host = isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : null;
                }
                $protocol= $app->is_secure ? 'https' : 'http';
                $app_url = "{$protocol}://{$host}{$request}";
                $component->set_config_value( 'accessanalytics_app_url', $app_url, $url->workspace_id );
            }
        }
        $classes = ['Page View', 'Search', 'Contact', 'Comment', 'Login', 'Logout', 'Download'];
        $class = $app->param( 'class' ) ? $app->param( 'class' ) : 'Page View';
        if ( $app->mode == 'download' ) {
            $class = 'Download';
        }
        if (! in_array( $class, $classes ) ) {
            $this->print_json( '403 Forbidden', 403 );
        }
        if ( $member = $app->user( 'member' ) ) {
            $activity->member_id( $member->id );
        }
        if (! $activity->url ) {
            if (! $request ) {
                $this->print_json( 'HTTP/1.1 404 Not Found', 404 );
            }
            $activity->url( $request );
        }
        if ( $user_agent ) {
            $activity->user_agent( $user_agent );
        }
        if ( $app->param( 'lang' ) || $app->param( 'language' ) ) {
            if ( $activity->has_column( 'language' ) ) { 
                $language = $app->param( 'lang' ) ? $app->param( 'lang' ) : $app->param( 'language' );
                $activity->language( $language );
            }
        }
        $activity->referrer( $app->param( 'referrer' ) );
        $activity->class( $class );
        if ( $param ) {
            $activity->query_string( urldecode( $param ) );
        }
        $activity->workspace_id( (int) $url->workspace_id );
        $app->set_default( $activity );
        $activity->save();
        if ( $app->mode == 'download' ) {
            if ( file_exists( $url->file_path ) ) {
                $data = file_get_contents( $url->file_path );
                $file_name = basename( $url->file_path );
                header( 'Content-Type: application/octet-stream' );
                $file_size = strlen( bin2hex( $data ) ) / 2;
                header( "Content-Length: {$file_size}" );
                header( "Content-Disposition: attachment;" . " filename=\"{$file_name}\"" );
                header( "Pragma: " );
                echo $data;
            }
        } else {
            $this->print_json( 'HTTP/1.1 200 OK' );
        }
    }

    function print_json ( $message, $status = 200 ) {
        switch ( $status ) {
            case 403:
                header( 'HTTP/1.1 403 Forbidden' );
                break;
            case 404:
                header( 'HTTP/1.1 404 Not Found' );
                break;
            default:
                header( "HTTP/1.1 {$status}" );
        }
        $json = ['status'  => $status, 'message' => $message ];
        header( 'Content-type: application/json; charset=UTF-8' );
        echo json_encode( $json );
        exit();
    }
}