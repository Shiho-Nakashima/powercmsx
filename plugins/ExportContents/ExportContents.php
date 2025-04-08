<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class ExportContents extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function can_export_contents ( $app ) {
        return $app->exportcontents_can_export;
    }

    function export_contents ( $app ) {
        if (! $app->exportcontents_can_export ) {
            $app->error( 'Permission denied.' );
        }
        $workspace_id = $app->param( 'workspace_id' );
        $permissions = $app->permissions();
        if (! $workspace_id && ! $app->user()->is_superuser ) {
            $app->error( 'Permission denied.' );
        } else if ( $workspace_id && ! $app->user()->is_superuser ) {
            $perms = $permissions[ $workspace_id ] ?? [];
            if (! in_array( 'workspace_admin', $perms ) ) {
                $app->error( 'Permission denied.' );
            }
        }
        if ( $app->request_method == 'GET' ) {
            $ctx = $app->ctx;
            $tmpl = $ctx->get_template_path( 'export_contents.tmpl' );
            echo $app->build_page( $tmpl );
        } else {
            ini_set( 'max_execution_time', 7200 );
            $app->validate_magic();
            $site_path = $app->workspace() ? $app->workspace()->site_path : $app->site_path;
            $ts = date( 'Y-m-d_H-i-s' );
            $upload_dir = $app->upload_dir();
            $file = $upload_dir . DS . "export_contents-{$ts}.zip";
            PTUtil::make_zip_archive( $site_path, $file );
            PTUtil::export_data( $file );
        }
    }

    function action_urlinfo_export_contents ( $app, $objects, $action ) {
        ini_set( 'max_execution_time', 7200 );
        $ts = date( 'Y-m-d_H-i-s' );
        $upload_dir = $app->upload_dir();
        $file = $upload_dir . DS . "export_contents-{$ts}.zip";
        $zip = new ZipArchive();
        $res = $zip->open( $file, ZipArchive::CREATE );
        $fmgr = $app->fmgr;
        foreach ( $objects as $obj ) {
            if ( $fmgr->exists( $obj->file_path ) ) {
                $file_path = $obj->file_path;
                $relative_url = $obj->relative_url;
                $file_path = str_replace( DS, '/', $file_path );
                $relative_url = str_replace( DS, '/', $relative_url );
                if ( $app->workspace() ) {
                    $zip->addFile( $file_path, ltrim( $relative_url, '/' ) );
                } else {
                    $workspace = $obj->workspace ?? null;
                    $workspace_id = $workspace ? $workspace->id : '0';
                    $zip->addFile( $file_path, $workspace_id . '/' . ltrim( $relative_url, '/' ) );
                }
            }
        }
        $zip->close();
        PTUtil::export_data( $file );
    }
}