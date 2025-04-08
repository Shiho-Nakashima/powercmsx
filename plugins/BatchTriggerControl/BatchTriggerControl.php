<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class BatchTriggerControl extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function action_urlmapping_remove_trigger ( $app, $objects, $action ) {
        $class = new PTListActions();
        $input = $app->param( 'itemset_action_input' );
        $triggers = preg_split( '/\s*,\s*/', $input );
        $model = $app->param( '_model' );
        $counter = 0;
        foreach ( $objects as $obj ) {
            $done = false;
            foreach ( $triggers as $trigger ) {
                $table = $app->get_table( $trigger );
                if (! $table ) {
                    continue;
                }
                $relation = $app->db->model( 'relation' )->get_by_key(
                    ['name' => 'triggers',
                     'from_obj' => 'urlmapping',
                     'from_id' => $obj->id,
                     'to_obj' => 'table',
                     'to_id' => $table->id ]
                );
                if ( $relation->id ) {
                    $relation->remove();
                    $done = true;
                }
            }
            if ( $done ) {
                $counter++;
            }
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $class->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }

    function action_urlmapping_add_trigger ( $app, $objects, $action ) {
        $class = new PTListActions();
        $input = $app->param( 'itemset_action_input' );
        $triggers = preg_split( '/\s*,\s*/', $input );
        $model = $app->param( '_model' );
        $counter = 0;
        foreach ( $objects as $obj ) {
            $done = false;
            foreach ( $triggers as $trigger ) {
                $table = $app->get_table( $trigger );
                if (! $table ) {
                    continue;
                }
                $relation = $app->db->model( 'relation' )->get_by_key(
                    ['name' => 'triggers',
                     'from_obj' => 'urlmapping',
                     'from_id' => $obj->id,
                     'to_obj' => 'table',
                     'to_id' => $table->id ]
                );
                if (! $relation->id ) {
                    $last = $app->db->model( 'relation' )->get_by_key(
                        ['name' => 'triggers',
                         'from_obj' => 'urlmapping',
                         'from_id' => $obj->id,
                         'to_obj' => 'table'],
                        ['sort_by' => 'order',
                         'direction' => 'descend'] );
                    $order = 0;
                    if ( $last->id ) {
                        $order = $last->order;
                    }
                    $order++;
                    $relation->order( $order );
                    $relation->save();
                    $done = true;
                }
            }
            if ( $done ) {
                $counter++;
            }
        }
        if ( $counter ) {
            $action = $action['label'];
            $class->log( $action, $model, $counter );
        }
        $return_args = "does_act=1&__mode=view&_type=list&_model={$model}"
                     . "&apply_actions={$counter}" . $app->workspace_param;
        if ( $add_params = $class->add_return_params( $app ) ) {
            $return_args .= "&{$add_params}";
        }
        $app->redirect( $app->admin_url . '?' . $return_args );
    }
}