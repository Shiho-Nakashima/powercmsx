<?php $this->get_cache=array (
  'label' => 'ExclusionControl',
  'id' => 'exclusioncontrol',
  'component' => 'ExclusionControl',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'doc_link' => 'https://powercmsx.jp/about/exclusioncontrol.html',
  'description' => 'Provides exclusion control for edit screen.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'settings' => 
  array (
    'exclusioncontrol_target_models' => 'entry,page',
    'exclusioncontrol_sess_expires' => 90,
    'exclusioncontrol_hierarchy' => false,
    'exclusioncontrol_error' => 'dashboard',
    'exclusioncontrol_show_username' => true,
  ),
  'methods' => 
  array (
    'exclusioncontrol_in_edit' => 
    array (
      'component' => 'ExclusionControl',
      'method' => 'exclusioncontrol_in_edit',
    ),
  ),
  'hooks' => 
  array (
    'exclusioncontrol_pre_view' => 
    array (
      'pre_view' => 
      array (
        'component' => 'ExclusionControl',
        'priority' => 1,
        'method' => 'exclusioncontrol_pre_view',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'exclusioncontrol_template_source_dashboard' => 
    array (
      'dashboard' => 
      array (
        'template_source' => 
        array (
          'component' => 'ExclusionControl',
          'priority' => 10,
          'method' => 'set_dashboard_message',
        ),
      ),
    ),
    'exclusioncontrol_template_output_edit' => 
    array (
      'edit' => 
      array (
        'template_output' => 
        array (
          'component' => 'ExclusionControl',
          'priority' => 11,
          'method' => 'insert_exclusioncontrol_script',
        ),
      ),
    ),
    'exclusioncontrol_template_output_hierarchy' => 
    array (
      'hierarchy' => 
      array (
        'template_output' => 
        array (
          'component' => 'ExclusionControl',
          'priority' => 11,
          'method' => 'insert_exclusioncontrol_script',
        ),
      ),
    ),
  ),
);