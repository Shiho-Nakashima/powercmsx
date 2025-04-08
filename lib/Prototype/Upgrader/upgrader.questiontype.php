<?php

class upgrader_questiontype {

    public $upgrade_functions = [
        'install_field_types' => [
            'method' => 'install_question_types',
            'version_limit' => 1.6
        ]
    ];

    function install_question_types ( $app, $upgrader, $old_version ) {
        $upgrader->install_question_types( $app, true );
        return true;
    }
}