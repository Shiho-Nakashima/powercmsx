<?php

class upgrader_tag {

    public $upgrade_functions = [
        'set_tag_class' => [
            'method' => 'set_tag_class',
            'version_limit' => 1.5
        ],
        'optimize' => [
            'method' => 'optimize_table',
            'version_limit' => 1.6
        ]
    ];

    function optimize_table ( $app, $upgrader, $old_version ) {
        $pdo = $app->db->db;
        $sql = 'OPTIMIZE TABLE mt_tag';
        $sth = $pdo->prepare( $sql );
        $sth->execute();
        return true;
    }

    function set_tag_class ( $app, $upgrader, $old_version ) {
        $tags = $app->db->model( 'tag' )->load();
        foreach ( $tags as $tag ) {
            if ( $tag->class ) continue;
            $relations =
                $app->db->model( 'relation' )->load( ['to_obj' => 'tag', 'to_id' => $tag->id ] );
            $tag_models = [];
            foreach ( $relations as $relation ) {
                if ( isset( $tag_models[ $relation->from_obj ] )
                    && is_array( $tag_models[ $relation->from_obj ] ) ) {
                    $tag_models[ $relation->from_obj ][] = $relation;
                } else {
                    $tag_models[ $relation->from_obj ] = [ $relation ];
                }
            }
            $i = 0;
            foreach ( $tag_models as $model => $relations ) {
                if ( $i == 0 ) {
                    $tag->class( $model );
                    $tag->save();
                    $i++;
                    continue;
                }
                $values = $tag->get_values( true );
                unset( $values['id'] );
                $values['class'] = $model;
                $newTag = $app->db->model( 'tag' )->new( $values );
                $newTag->save();
                foreach ( $relations as $relation ) {
                    $relation->to_id( $newTag->id );
                    $relation->save();
                }
                $i++;
            }
        }
    }

}