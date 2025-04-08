<?php

class upgrader_entry {

    public $upgrade_functions = [
        'remove_comment_count' => [
            'method' => 'remove_comment_count',
            'version_limit' => 2.2
        ]
    ];

    function remove_comment_count ( $app, $upgrader, $old_version ) {
        $app->get_scheme_from_db( 'entry' );
        $entry = $app->db->model( 'entry' )->new();
        if ( $entry->has_column( 'comment_count' ) ) {
            $sql = 'ALTER TABLE mt_entry DROP entry_comment_count';
            $app->db->db->query( $sql );
            $table = $app->get_table( 'entry' );
            $column = $app->db->model( 'column' )->get_by_key(
                ['table_id' => $table->id, 'name' => 'comment_count'] );
            if ( $column->id ) $column->remove();
        }
    }

}