 <?php

class upgrader_column {

    public $upgrade_functions = [
        'set_int_column' => [
            'method' => 'set_int_column',
            'version_limit' => 2.4
        ]
    ];

    function set_int_column ( $app, $upgrader, $old_version ) {
        $columns = $app->db->model( 'column' )->load( ['type' => ['IN' => ['int', 'relation'] ],
                                                       'edit' => ['like' => '%:%'] ] );
        foreach ( $columns as $record ) {
            if ( strpos( $record->edit, 'relation:' ) === 0 ||
                strpos( $record->edit, 'reference:' ) === 0 ) {
                $edit_props = explode( ':', $record->edit );
                if ( $edit_props[1] != '__any__' ) {
                    $record->rel_model( $edit_props[1] );
                    if ( $record->type == 'int' ) {
                        if ( $record->option == $edit_props[1] ) {
                            $record->option( '' );
                        }
                        $record->disp_edit( $edit_props[0] );
                    }
                    $record->save();
                }
            }
        }
        return true;
    }
}