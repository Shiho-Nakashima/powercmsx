<?php
class upgrader_menu {

    public $upgrade_functions = [
        'set_meta' => [
            'method' => 'set_meta',
            'version_limit' => 1.4
        ]
    ];

    function set_meta ( $app, $upgrader, $old_version ) {
        $objects = $app->db->model( 'menu' )->load( [], [], 'id,meta' );
        foreach ( $objects as $obj ) {
            if (! $obj->meta ) {
                $url_objs = $app->load_related_objs( $obj, 'urlinfo' );
                $meta = [];
                foreach ( $url_objs as $url_obj ) {
                    $meta[ $url_obj->url ] = ['model' => $url_obj->model,
                                              'object_id' => (int) $url_obj->object_id,
                                              'class' => $url_obj->class,
                                              'archive_type' => $url_obj->archive_type ];
                }
                $obj->meta( serialize( $meta ) );
                $obj->save();
            }
        }
    }

}