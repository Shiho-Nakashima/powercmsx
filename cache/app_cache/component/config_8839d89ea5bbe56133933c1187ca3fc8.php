<?php $this->get_cache=array (
  'label' => 'AppProperties',
  'id' => 'appproperties',
  'component' => 'AppProperties',
  'version' => '1.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Manage the properties of PowerCMS X.',
  'config_settings' => 
  array (
    'appproperties_allow_override' => false,
  ),
  'hooks' => 
  array (
    'appproperties_start_app' => 
    array (
      'start_app' => 
      array (
        'component' => 'AppProperties',
        'priority' => 1,
        'method' => 'start_app',
      ),
    ),
  ),
  'list_actions' => 
  array (
    'action_app_property_export' => 
    array (
      'app_property' => 
      array (
        'action_app_property_export' => 
        array (
          'name' => 'action_app_property_export',
          'label' => 'CSV Export',
          'component' => 'AppProperties',
          'method' => 'action_app_property_export',
          'input' => 0,
          'order' => 10,
        ),
      ),
    ),
  ),
  'callbacks' => 
  array (
    'appproperties_pre_save_app_property' => 
    array (
      'app_property' => 
      array (
        'pre_save' => 
        array (
          'component' => 'AppProperties',
          'priority' => 10,
          'method' => 'pre_save_app_property',
        ),
      ),
    ),
    'appproperties_pre_save_table' => 
    array (
      'table' => 
      array (
        'pre_save' => 
        array (
          'component' => 'AppProperties',
          'priority' => 10,
          'method' => 'pre_save_table',
        ),
      ),
    ),
    'appproperties_post_delete_app_property' => 
    array (
      'app_property' => 
      array (
        'post_delete' => 
        array (
          'component' => 'AppProperties',
          'priority' => 10,
          'method' => 'post_delete_app_property',
        ),
      ),
    ),
  ),
);