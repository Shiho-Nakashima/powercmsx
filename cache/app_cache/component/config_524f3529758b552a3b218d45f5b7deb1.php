<?php $this->get_cache=array (
  'label' => 'AssetScope',
  'id' => 'assetscope',
  'component' => 'AssetScope',
  'description' => 'Make assets of other scopes available for each scope.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'settings' => 
  array (
    'assetscope_workspace_id' => '',
    'assetscope_label_column' => 'label',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'hooks' => 
  array (
    'assetscope_start_app' => 
    array (
      'start_app' => 
      array (
        'component' => 'AssetScope',
        'priority' => 2,
        'method' => 'start_app',
      ),
    ),
  ),
  'tasks' => 
  array (
    'assetscope_move_assets' => 
    array (
      'label' => 'Move Assets Scope',
      'component' => 'AssetScope',
      'method' => 'move_assets',
      'frequency' => 1,
      'priority' => 100,
    ),
  ),
);