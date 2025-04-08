<?php
class session extends PADOBaseModel {

    public $_sess_timeout = 86400;
    public $_request_time;

    function __construct ( $model = 'session', $pado = null ) {
        $this->_request_time = isset( $_SERVER['REQUEST_TIME'] ) ? $_SERVER['REQUEST_TIME'] : time();
        parent::__construct( $model, $pado );
    }

    function load ( $terms = [], $args = [], $cols = '', $extra = '', $ex_vars = [] ) {
        $session = parent::load( $terms, $args, $cols, $extra, $ex_vars );
        if ( isset( $args['get_by_key'] ) && !empty( $session ) && is_array( $terms ) ) {
            $session = $session[0];
            if ( $session->expires && ( $session->expires < $this->_request_time ) ) {
                $session->remove();
                return parent::new( $terms );
            }
        }
        return $session;
    }

    function get_by_key ( $params, $args = [], $cols = '*', $extra = '', $ex_vars = [] ) {
        $session = parent::get_by_key( $params, $args, $cols, $extra, $ex_vars );
        if ( $session->id ) {
            if ( $session->expires < $this->_request_time ) {
                $session->remove();
                return parent::get_by_key( $params, $args, $cols, $extra, $ex_vars );
            }
        }
        return $session;
    }

    function save () {
        if (!$this->start ) {
            $this->start( $this->_request_time );
        }
        if (!$this->expires ) {
            $this->expires( $this->_request_time + $this->_sess_timeout );
        }
        return parent::save();
    }

    function remove () {
        $old = $this->_pado->in_duplicate;
        $this->_pado->in_duplicate = false;
        $res = parent::remove();
        $this->_pado->in_duplicate = $old;
        return $res;
    }

    function remove_multi ( $objects ) {
        $old = $this->_pado->in_duplicate;
        $this->_pado->in_duplicate = false;
        $res = parent::remove_multi( $objects );
        $this->_pado->in_duplicate = $old;
        return $res;
    }
}