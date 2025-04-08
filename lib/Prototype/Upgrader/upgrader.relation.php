 <?php

class upgrader_relation {

    public $upgrade_functions = [
        'optimize' => [
            'method' => 'optimize_table',
            'version_limit' => 1.1
        ]
    ];

    function optimize_table ( $app, $upgrader, $old_version ) {
        $pdo = $app->db->db;
        $sql = 'OPTIMIZE TABLE mt_relation';
        $sth = $pdo->prepare( $sql );
        $sth->execute();
        return true;
    }

}