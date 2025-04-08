 <?php

class upgrader_urlinfo {

    public $upgrade_functions = [
        'dirname_and_filemtime' => [
            'method' => 'dirname_and_filemtime',
            'version_limit' => 2.1
        ],
        'mime_type_svg' => [
            'method' => 'mime_type_svg',
            'version_limit' => 1.8
        ],
        'was_published' => [
            'method' => 'was_published',
            'version_limit' => 2.0
        ],
        'optimize' => [
            'method' => 'optimize_table',
            'version_limit' => 2.4
        ]
    ];

    function optimize_table ( $app, $upgrader, $old_version ) {
        $pdo = $app->db->db;
        $sql = 'OPTIMIZE TABLE mt_urlinfo';
        $sth = $pdo->prepare( $sql );
        $sth->execute();
        return true;
    }

    function was_published ( $app, $upgrader, $old_version ) {
        $objects = $app->db->model( 'urlinfo' )->load( [
                      'delete_flag' => ['IN' => [0,1] ] ], [],
                      'id,file_path,delete_flag,was_published' );
        foreach ( $objects as $obj ) {
            if ( file_exists( $obj->file_path ) ) {
                $obj->was_published( 1 );
                $obj->save();
            }
        }
    }

    function dirname_and_filemtime ( $app, $upgrader, $old_version ) {
        $objects = $app->db->model( 'urlinfo' )->load( [], [],
                                    'id,url,file_path,publish_file,filemtime,dirname' );
        foreach ( $objects as $obj ) {
            $update = false;
            if ( file_exists( $obj->file_path ) && $obj->publish_file != 1 ) {
                $obj->publish_file( 1 );
                $update = true;
            }
            if ( $obj->dirname == '/' || $update || ( ! $obj->filemtime || ! $obj->dirname ) ) {
                $obj->save();
            }
        }
    }

    function mime_type_svg ( $app, $upgrader, $old_version ) {
        $objects = $app->db->model( 'urlinfo' )->load(
                      ['mime_type' => 'text/plain',
                       'relative_path' => ['like' => '%.svg'],
                       'delete_flag' => ['IN' => [0,1] ] ], [],
                       'id,relative_path,mime_type' );
        foreach ( $objects as $obj ) {
            $obj->mime_type( 'image/svg+xml' );
            $obj->save();
        }
    }
}