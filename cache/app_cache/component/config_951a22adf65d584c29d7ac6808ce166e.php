<?php $this->get_cache=array (
  'label' => 'ExportContents',
  'id' => 'exportcontents',
  'component' => 'ExportContents',
  'description' => 'Provides the ability to export published content.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'exportcontents_can_export' => true,
  ),
  'menus' => 
  array (
    'export_contents' => 
    array (
      'component' => 'ExportContents',
      'mode' => 'export_contents',
      'label' => 'Export Contents',
      'display_system' => true,
      'display_space' => true,
      'permission' => 
      array (
        0 => 'superuser',
        1 => 'workspace_admin',
      ),
      'condition' => 'can_export_contents',
      'order' => 5000,
    ),
  ),
  'methods' => 
  array (
    'export_contents' => 
    array (
      'component' => 'ExportContents',
      'method' => 'export_contents',
    ),
  ),
  'list_actions' => 
  array (
    'action_urlinfo_export_contents' => 
    array (
      'urlinfo' => 
      array (
        'action_urlinfo_export_contents' => 
        array (
          'name' => 'action_urlinfo_export_contents',
          'label' => 'Export Contents',
          'component' => 'ExportContents',
          'method' => 'action_urlinfo_export_contents',
          'input' => 0,
          'columns' => 
          array (
            0 => 'file_path',
            1 => 'relative_url',
          ),
          'order' => 2000,
        ),
      ),
    ),
  ),
);