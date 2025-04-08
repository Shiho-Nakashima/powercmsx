<?php $this->get_cache=array (
  'label' => 'AxeRunner',
  'id' => 'axerunner',
  'component' => 'AxeRunner',
  'version' => '1.4',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'committer' => 'Hideki Abe',
  'description' => 'Provides automated accessibility testing with the axe-core.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'axerunner_assets_base' => 'plugins/AxeRunner/assets/',
    'axe_core_result_date_based_col' => 'modified_on',
    'axe_core_session_expires' => 18000,
    'axerunner_list_limit' => 10,
    'axerunner_module_path' => NULL,
    'axerunner_useragent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36',
  ),
  'settings' => 
  array (
    'axerunner_sunday' => false,
    'axerunner_monday' => false,
    'axerunner_tuesday' => false,
    'axerunner_wednesday' => false,
    'axerunner_thursday' => false,
    'axerunner_friday' => false,
    'axerunner_saturday' => false,
    'axerunner_time' => '00:00',
    'axerunner_use_system_settings' => false,
    'axerunner_task_only_newer' => false,
    'axerunner_task_workspace_ids' => '',
    'axerunner_wcag_version' => 'wcag21',
    'axerunner_wcag_level' => 2,
    'axerunner_violation_only' => 0,
    'axerunner_username' => '',
    'axerunner_password' => '',
    'axerunner_digest' => false,
    'axerunner_exclude_urls' => '',
    'axerunner_exclude_sc' => '',
    'axerunner_user_id' => '',
    'axerunner_send_email' => false,
    'axerunner_member_id' => '',
    'axerunner_report_locale' => 'ja',
  ),
  'methods' => 
  array (
    'axerunner_check_url' => 
    array (
      'component' => 'AxeRunner',
      'method' => 'check_url',
    ),
    'axerunner_verify_url' => 
    array (
      'component' => 'AxeRunner',
      'method' => 'axerunner_verify_url',
    ),
    'axe_runner_summary' => 
    array (
      'component' => 'AxeRunner',
      'method' => 'axe_runner_summary',
    ),
    'axerunner_html_check' => 
    array (
      'component' => 'AxeRunner',
      'method' => 'axerunner_html_check',
    ),
    'axe_core_rebuild_report' => 
    array (
      'component' => 'AxeRunner',
      'method' => 'axe_core_rebuild_report',
    ),
  ),
  'hooks' => 
  array (
    'axerunner_pre_run' => 
    array (
      'pre_run' => 
      array (
        'component' => 'AxeRunner',
        'priority' => 1,
        'method' => 'pre_run',
      ),
    ),
    'axerunner_pre_view' => 
    array (
      'pre_view' => 
      array (
        'component' => 'AxeRunner',
        'priority' => 1,
        'method' => 'pre_view',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'axerunner_pre_listing_axe_core_result' => 
    array (
      'axe_core_result' => 
      array (
        'pre_listing' => 
        array (
          'component' => 'AxeRunner',
          'priority' => 10,
          'method' => 'pre_listing_axe_core_result',
        ),
      ),
    ),
    'axerunner_before_save_axe_core_result' => 
    array (
      'axe_core_result' => 
      array (
        'before_save' => 
        array (
          'component' => 'AxeRunner',
          'priority' => 10,
          'method' => 'before_save_axe_core_result',
        ),
      ),
    ),
    'axerunner_template_source_list' => 
    array (
      'list' => 
      array (
        'template_source' => 
        array (
          'component' => 'AxeRunner',
          'priority' => 10,
          'method' => 'template_source_list',
        ),
      ),
    ),
    'axerunner_mail_filter' => 
    array (
      'mail_filter' => 
      array (
        'mail_filter' => 
        array (
          'component' => 'AxeRunner',
          'priority' => 1,
          'method' => 'mail_filter',
        ),
      ),
    ),
    'axerunner_pre_delete_axe_core_result' => 
    array (
      'axe_core_result' => 
      array (
        'pre_delete' => 
        array (
          'component' => 'AxeRunner',
          'priority' => 5,
          'method' => 'pre_delete_axe_core_result',
        ),
      ),
    ),
  ),
  'list_actions' => 
  array (
    'action_axe_core_result_re_verification' => 
    array (
      'axe_core_result' => 
      array (
        'action_axe_core_result_re_verification' => 
        array (
          'name' => 'action_axe_core_result_re_verification',
          'label' => 'Re-Verification',
          'component' => 'AxeRunner',
          'method' => 'action_axe_core_result_re_verification',
          'input' => 0,
          'columns' => '*',
          'order' => 100,
        ),
      ),
    ),
    'action_axe_core_result_assign_me' => 
    array (
      'axe_core_result' => 
      array (
        'action_axe_core_result_assign_me' => 
        array (
          'name' => 'action_axe_core_result_assign_me',
          'label' => 'Take charge of yourself',
          'component' => 'AxeRunner',
          'method' => 'action_axe_core_result_assign_me',
          'input' => 0,
          'columns' => '*',
          'order' => 200,
        ),
      ),
    ),
    'action_axe_core_result_export_csv' => 
    array (
      'axe_core_result' => 
      array (
        'action_axe_core_result_export_csv' => 
        array (
          'name' => 'action_axe_core_result_export_csv',
          'label' => 'CSV Export',
          'component' => 'AxeRunner',
          'method' => 'action_axe_core_result_export_csv',
          'input' => 1,
          'input_options' => 
          array (
            0 => 
            array (
              'label' => 'UTF-8',
              'value' => 'UTF-8',
            ),
            1 => 
            array (
              'label' => 'Shift_JIS',
              'value' => 'Shift_JIS',
            ),
          ),
          'columns' => '*',
          'order' => 300,
        ),
      ),
    ),
    'action_axe_core_delete_unpublished' => 
    array (
      'axe_core_result' => 
      array (
        'action_axe_core_delete_unpublished' => 
        array (
          'name' => 'action_axe_core_delete_unpublished',
          'label' => 'Delete Unpublished Contents',
          'component' => 'AxeRunner',
          'method' => 'action_axe_core_delete_unpublished',
          'input' => 1,
          'input_options' => 
          array (
            0 => 
            array (
              'label' => 'All Unpublished',
              'value' => 'ALL',
            ),
            1 => 
            array (
              'label' => 'Only Deleted',
              'value' => 'DELETED',
            ),
          ),
          'columns' => 'id,urlinfo_id',
          'order' => 400,
        ),
      ),
    ),
  ),
  'system_filters' => 
  array (
    'filter_axe_core_result_violations' => 
    array (
      'axe_core_result' => 
      array (
        'filter_axe_core_result_violations' => 
        array (
          'name' => 'filter_axe_core_result_violations',
          'label' => 'Violations',
          'component' => 'AxeRunner',
          'method' => 'filter_axe_core_result_violations',
          'order' => 3000,
        ),
      ),
    ),
    'filter_axe_core_result_incompletes' => 
    array (
      'axe_core_result' => 
      array (
        'filter_axe_core_result_incompletes' => 
        array (
          'name' => 'filter_axe_core_result_incompletes',
          'label' => 'Incompletes',
          'component' => 'AxeRunner',
          'method' => 'filter_axe_core_result_incompletes',
          'order' => 4000,
        ),
      ),
    ),
    'filter_axe_core_result_check_failed' => 
    array (
      'axe_core_result' => 
      array (
        'filter_axe_core_result_check_failed' => 
        array (
          'name' => 'filter_axe_core_result_check_failed',
          'label' => 'Check Failed',
          'component' => 'AxeRunner',
          'method' => 'filter_axe_core_result_check_failed',
          'order' => 5000,
        ),
      ),
    ),
    'filter_axe_core_result_has_problem' => 
    array (
      'axe_core_result' => 
      array (
        'filter_axe_core_result_has_problem' => 
        array (
          'name' => 'filter_axe_core_result_has_problem',
          'label' => 'Violation or Incomplete',
          'component' => 'AxeRunner',
          'method' => 'filter_axe_core_result_has_problem',
          'order' => 6000,
        ),
      ),
    ),
    'filter_axe_core_result_no_problem_detected' => 
    array (
      'axe_core_result' => 
      array (
        'filter_axe_core_result_no_problem_detected' => 
        array (
          'name' => 'filter_axe_core_result_no_problem_detected',
          'label' => 'No Problem Detected',
          'component' => 'AxeRunner',
          'method' => 'filter_axe_core_result_no_problem_detected',
          'order' => 7000,
        ),
      ),
    ),
  ),
  'tasks' => 
  array (
    'axerunner_scheduled_a11y_check' => 
    array (
      'label' => 'Scheduled A11Y Checks',
      'component' => 'AxeRunner',
      'priority' => 100,
      'method' => 'scheduled_a11y_check',
      'frequency' => 1,
    ),
    'axe_core_rebuild_report' => 
    array (
      'label' => 'AxeRunner Recreate Report',
      'component' => 'AxeRunner',
      'priority' => 100,
      'method' => 'axe_core_rebuild_report',
      'frequency' => 86400,
    ),
  ),
);