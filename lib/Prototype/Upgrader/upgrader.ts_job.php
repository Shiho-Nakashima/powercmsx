 <?php

class upgrader_ts_job {

    public $upgrade_functions = [
        'set_status' => [
            'method' => 'set_status',
            'version_limit' => 1.4
        ]
    ];

    function set_status ( $app, $upgrader, $old_version ) {
        $ts_jobs = $app->db->model( 'ts_job' )->load();
        foreach ( $ts_jobs as $ts_job ) {
            if (! $ts_job->status ) {
                $ts_job->status( 2 );
                $ts_job->save();
            }
        }
        return true;
    }
}