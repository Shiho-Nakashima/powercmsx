<?php
class relation extends PADOBaseModel {

    function load ( $terms = [], $args = [], $cols = '*', $extra = '', $ex_vals = [] ) {
        if ( !isset( $args['load_iter'] ) && is_array( $args ) && ( isset( $args['status'] ) || isset( $args['rev_type'] ) ) ) {
            if ( is_string( $cols ) && ( $cols === 'from_id' || $cols === 'to_id' ) ) {
                if ( isset( $args['status'] ) && !is_numeric( $args['status'] )
                  || isset( $args['rev_type'] ) && !is_numeric( $args['rev_type'] ) ) {
                } else {
                    $model = $cols === 'from_id' ? $terms['from_obj'] : $terms['to_obj'];
                    $model = $this->_pado->model( $model )->_model;
                    if ( $model && 
                        ( $this->_pado->model( $model )->has_column( 'status' ) ||
                          $this->_pado->model( $model )->has_column( 'rev_type' ) ) ) {
                        $prefix = DB_PREFIX;
                        $where = $cols === 'from_id' ? 'to_id' : 'from_id';
                        $id = isset( $terms['to_id'] ) ? $terms['to_id'] : $terms['from_id'];
                        $sql = "SELECT DISTINCT {$prefix}relation.relation_{$cols} ";
                        $sql .= " FROM {$prefix}relation JOIN {$prefix}{$model} ON {$prefix}relation.relation_{$cols}={$prefix}{$model}.{$model}_id ";
                        $sql .= " WHERE relation_to_obj = ? AND relation_{$where} = ? AND relation_from_obj = ? ";
                        $placeholders = [ $terms['to_obj'], $id, $model ];
                        if ( isset( $terms['name'] ) && $name = $terms['name'] ) {
                            $sql .= " AND relation_name = ? ";
                            $placeholders[] = $name;
                        }
                        if ( isset( $terms['name'] ) && $name = $terms['name'] ) {
                            $sql .= " AND relation_name = ? ";
                            $placeholders[] = $name;
                        }
                        if ( isset( $terms['order'] ) && is_numeric( $terms['order'] ) && $order = $terms['order'] ) {
                            $sql .= " AND relation_order = ? ";
                            $placeholders[] = $order;
                        }
                        if ( isset( $args['status'] ) && $this->_pado->model( $model )->has_column( 'status' ) ) {
                            $sql .= " AND {$prefix}{$model}.{$model}_status = ? ";
                            $placeholders[] = (int) $args['status'];
                        }
                        if ( isset( $args['rev_type'] ) && $this->_pado->model( $model )->has_column( 'rev_type' ) ) {
                            $sql .= " AND {$prefix}{$model}.{$model}_rev_type = ? ";
                            $placeholders[] = (int) $args['rev_type'];
                        }
                        $sql .= $extra;
                        if ( is_array( $ex_vals ) && !empty( $ex_vals ) ) {
                            $placeholders = array_merge( $placeholders, $ex_vals );
                        }
                        if ( isset( $args['sort'] ) && $args['sort'] ) {
                            $direction = $args['direction'] ?? 'ASC';
                            $direction = stripos( $direction, 'ASC' ) === 0 ? 'ASC' : 'DESC';
                            if ( strpos( $args['sort'], "{$model}_" ) === 0 ) {
                                $sort = preg_replace( "/^{$model}_/", '', $args['sort'] );
                                if ( $this->_pado->model( $model )->has_column( $sort ) ) {
                                    $sql .= " ORDER BY ? {$direction} ";
                                    $placeholders[] = "{$prefix}{$model}.{$model}_{$sort}";
                                }
                            } else if ( $this->has_column( $args['sort'] ) ) {
                                $sql .= " ORDER BY ? {$direction} ";
                                $placeholders[] = 'relation_' . $args['sort'];
                            }
                        }
                        if ( isset( $args['limit'] ) && is_numeric( $args['limit'] ) && 0 < $args['limit'] ) {
                            $limit = (int) $args['limit'];
                            $sql .= " LIMIT {$limit} ";
                            if ( isset( $args['offset'] ) && is_numeric( $args['offset'] ) && 0 < $args['offset'] ) {
                                $offset = (int) $args['offset'];
                                $sql .= " OFFSET {$offset} ";
                            }
                        }
                        return parent::load( $sql, $placeholders );
                    }
                }
            }
        }
        return parent::load( $terms, $args, $cols, $extra, $ex_vals );
    }
}