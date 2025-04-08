<?php $this->get_cache=array (
  'label' => 'Abs2Rel',
  'id' => 'abs2rel',
  'component' => 'Abs2Rel',
  'version' => '1.2',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Convert absolute path to relative path.',
  'committer' => 'tahakashi.shinji',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'abs2rel_preview' => false,
    'abs2rel_caching' => false,
  ),
  'settings' => 
  array (
    'abs2rel_enabled' => 1,
    'abs2rel_target_dynamic' => 0,
    'abs2rel_use_system_settings' => 1,
    'abs2rel_path_type' => 'root_relative_path',
    'abs2rel_target_extensions' => 'html',
    'abs2rel_exclude_base' => 1,
    'abs2rel_exclude_js' => 0,
    'abs2rel_exclude_comment' => 0,
    'abs2rel_exclude_directries' => '',
    'abs2rel_exclude_links' => '',
    'abs2rel_directory_index' => 'index.html',
  ),
  'config_overwrite' => 
  array (
    'publish_callbacks' => true,
  ),
  'callbacks' => 
  array (
    'abs2rel_post_rebuild' => 
    array (
      'template' => 
      array (
        'post_rebuild' => 
        array (
          'component' => 'Abs2Rel',
          'priority' => 10,
          'method' => 'post_rebuild',
        ),
      ),
    ),
    'abs2rel_post_preview' => 
    array (
      'preview' => 
      array (
        'post_preview' => 
        array (
          'component' => 'Abs2Rel',
          'priority' => 10,
          'method' => 'post_preview',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'modifier' => 
    array (
      'abs2relconvert' => 
      array (
        'component' => 'Abs2Rel',
        'method' => 'modifier_abs2relconvert',
      ),
    ),
  ),
);