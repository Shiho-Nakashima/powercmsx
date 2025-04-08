<?php

class PTMaintenance {

    function maintenance_setting ( $app ) {
        if ( $app->request_method === 'POST' && $app->param( '_type' ) ) {
            $_type = $app->param( '_type' );
            if ( $_type === 'set_maintenance' || $_type === 'unset_maintenance' ) {
                if ( $app->user() && !$app->user()->is_superuser ) {
                    return $app->error( 'Permission denied.' );
                }
                $app->validate_magic();
                $option = $app->db->model( 'option' )->get_by_key(
                    ['key' => 'maintenance_setting', 'kind' => 'config', 'workspace_id' => 0] );
                if ( $_type === 'set_maintenance' ) {
                    if ( $option->value != 1 ) {
                        $option->value( 1 );
                        $option->save();
                    }
                } else {
                    $option->remove();
                }
                $app->clear_cache( 'app_configs__c' );
                return $app->redirect( $app->admin_url . "?__mode=maintenance_setting&{$_type}=1" );
            } else if ( $_type === 'delete_sessions' ) {
                if ( $app->user() && !$app->user()->is_superuser ) {
                    $app->error( 'Permission denied.' );
                }
                $app->validate_magic();
                $sessions = $app->param( 'sessions' );
                $counter = 0;
                foreach ( $sessions as $session ) {
                    $obj = $app->db->model( 'session' )->load( $session );
                    if (! $obj ) {
                        continue;
                    }
                    if ( $obj->kind !== 'PR' ) {
                        return $app->error( 'Invalid request.' );
                    }
                    $obj->remove();
                    $counter++;
                }
                return $app->redirect( $app->admin_url . "?__mode=maintenance_setting&{$_type}={$counter}" );
            }
        }
        $sessions = $app->db->model( 'session' )->load(
          ['name' => ['!=' => $app->request_id ], 'kind' => 'PR', 'expires' => ['<' => $app->request_time ] ], null, 'id' );
        if (!empty( $sessions ) ) {
            $app->db->model( 'session' )->remove_multi( $sessions );
        }
        $sessions = $app->db->model( 'session' )->count(
          ['name' => ['!=' => $app->request_id ], 'kind' => 'PR'] );
        if ( $counter = $app->param( 'delete_sessions' ) ) {
            $message = $counter == 1 ? $app->translate( '%s %s have been deleted.', [ $counter, $app->translate( 'Session' ) ] )
                                     : $app->translate( '%s %s have been deleted.', [ $counter, $app->translate( 'Sessions' ) ] );
            $app->ctx->vars['delete_message'] = $message;
        }
        $app->ctx->vars['maintenance_setting'] = $app->maintenance_setting;
        $app->ctx->vars['active_processes'] = $sessions;
        $app->ctx->vars['page_title'] = $app->translate( 'Maintenance Setting' );
        $app->build_page( 'maintenance_setting.tmpl' );
    }
}