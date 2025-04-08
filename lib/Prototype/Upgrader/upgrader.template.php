<?php

class upgrader_template {

    public $upgrade_functions = [
        'set_compile_cache' => [
            'method' => 'set_compile_cache',
            'version_limit' => 2.0
        ]
    ];

    function set_compile_cache ( $app, $upgrader, $old_version ) {
        $objects = $app->db->model( 'template' )->load( [], [],
                                    'id,text' );
        foreach ( $objects as $obj ) {
            $obj->save();
        }
    }

    function tmpl_last_compiled ( $app, $upgrader ) {
        $table = $app->get_table( 'template' );
        $column = $app->db->model( 'column' )->get_by_key(
            ['table_id' => $table->id, 'name' => 'last_compiled'] );
        if (! $column->id ) {
            $last_compiled = ['type' => 'int', 'label' => 'Last Compiled',
                              'index' => 1, 'size' => 11, 'order' => 230 ];
            $column = $upgrader->make_column( $table, 'last_compiled', $last_compiled, false );
            $column->not_delete( 1 );
            $column->save();
            $upgrader->upgrade_scheme( 'template' );
            $time = time();
            $query = "UPDATE mt_template SET template_last_compiled={$time}";
            $app->db->db->query( $query );
        }
    }
}