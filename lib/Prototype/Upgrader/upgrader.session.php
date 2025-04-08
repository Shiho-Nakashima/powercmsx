 <?php

class upgrader_session {

    public $upgrade_functions = [
        'optimize' => [
            'method' => 'optimize_table',
            'version_limit' => 1.2
        ]
    ];

    function optimize_table ( $app, $upgrader, $old_version ) {
        $time = time();
        $pdo = $app->db->db;
        $sessions = $app->db->model( 'session' )->load( ['expires' => ['<' => $time ], null, 'id' ] );
        foreach ( $sessions as $session ) {
            $session->remove();
        }
        $sql = 'OPTIMIZE TABLE mt_session';
        $sth = $pdo->prepare( $sql );
        $sth->execute();
        return true;
    }

}