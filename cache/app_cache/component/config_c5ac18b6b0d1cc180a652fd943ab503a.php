<?php $this->get_cache=array (
  'label' => 'PluginStarter',
  'id' => 'pluginstarter',
  'component' => 'PluginStarter',
  'version' => '1.2',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Provides skeleton creation for PowerCMS X plugins.',
  'config_settings' => 
  array (
    'plugin_starter_check_default_plugins' => true,
    'plugin_starter_csv_encoding' => 'UTF-8',
    'plugin_starter_can_existing' => false,
  ),
  'methods' => 
  array (
    'plugin_starter' => 
    array (
      'component' => 'PluginStarter',
      'permission' => 'manage_plugin',
      'method' => 'plugin_starter',
    ),
  ),
  'cms_validations' => 
  array (
    'pluginstarter_component' => 
    array (
      'component' => 'PluginStarter',
      'label' => 'Existing Class',
      'method' => 'validation_existing_class',
      'type' => 'text',
      'order' => 2000,
    ),
  ),
  'callbacks' => 
  array (
    'pluginstarter_pre_listing_table' => 
    array (
      'table' => 
      array (
        'pre_listing' => 
        array (
          'component' => 'PluginStarter',
          'priority' => 10,
          'method' => 'pre_listing_table',
        ),
      ),
    ),
    'pluginstarter_pre_save_plugin_skeleton' => 
    array (
      'plugin_skeleton' => 
      array (
        'pre_save' => 
        array (
          'component' => 'PluginStarter',
          'priority' => 10,
          'method' => 'pre_save_plugin_skeleton',
        ),
      ),
    ),
    'pluginstarter_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'PluginStarter',
          'priority' => 10,
          'method' => 'template_source_edit',
        ),
      ),
    ),
  ),
);