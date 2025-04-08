<?php
class menu extends PADOBaseModel {

    function save () {
        $db = $this->_pado;
        $app = $db->app;
        $url_objs = $app->load_related_objs( $this, 'urlinfo' );
        if (! empty( $url_objs ) ) {
            $meta = [];
            foreach ( $url_objs as $url_obj ) {
                $meta[ $url_obj->url ] = ['model' => $url_obj->model,
                                          'object_id' => (int) $url_obj->object_id,
                                          'class' => $url_obj->class,
                                          'archive_type' => $url_obj->archive_type ];
            }
            $this->meta( serialize( $meta ) );
        }
        return parent::save();
    }
}