<?php

class upgrader_table {

    public $upgrade_functions = [
        'column_order' => [
            'method' => 'column_order',
            'version_limit' => 2.5
        ],
        'optimize' => [
            'method' => 'optimize_table',
            'version_limit' => 2.6
        ]
    ];

    function optimize_table ( $app, $upgrader, $old_version ) {
        $app->clear_all_cache( false, false );
        $app->db->clear_cache();
        $pdo = $app->db->db;
        $sql = 'OPTIMIZE TABLE mt_table';
        $sth = $pdo->prepare( $sql );
        $sth->execute();
        return true;
    }

    function column_order ( $app, $upgrader, $old_version ) {
        $objects = $app->db->model( 'column' )->load( [], [],
                                    'id,order' );
        foreach ( $objects as $obj ) {
            $obj->order( $obj->order * 10 );
            $obj->save();
        }
    }

}