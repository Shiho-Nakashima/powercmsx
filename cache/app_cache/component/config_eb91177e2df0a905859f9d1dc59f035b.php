<?php $this->get_cache=array (
  'label' => 'RebuildRelations',
  'id' => 'rebuildrelations',
  'component' => 'RebuildRelations',
  'version' => '1.4',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Add rebuild triggers for related objects.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'config_settings' => 
  array (
    'rebuildrelations_clear_cache' => false,
  ),
  'settings' => 
  array (
    'rebuildrelations_models' => '',
    'rebuildrelations_to_models' => '',
  ),
  'hooks' => 
  array (
    'rebuildrelations_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'RebuildRelations',
        'priority' => 1,
        'method' => 'rebuildrelations_post_init',
      ),
    ),
    'rebuildrelations_post_run' => 
    array (
      'post_run' => 
      array (
        'component' => 'RebuildRelations',
        'priority' => 1,
        'method' => 'rebuildrelations_post_run',
      ),
    ),
  ),
);