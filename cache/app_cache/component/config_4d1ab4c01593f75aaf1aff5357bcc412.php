<?php $this->get_cache=array (
  'label' => 'Theme_GitHub',
  'id' => 'theme_github',
  'component' => 'Theme_GitHub',
  'description' => 'Commit the theme to GitHub.',
  'version' => '0.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'config_settings' => 
  array (
    'can_open_theme_dir' => false,
  ),
  'settings' => 
  array (
    'themegithub_use_system_setting' => '',
    'themegithub_account' => '',
    'themegithub_token' => '',
    'themegithub_gitignore' => '.DS_Store',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'theme_to_github' => 
    array (
      'component' => 'Theme_GitHub',
      'method' => 'theme_to_github',
      'permission' => 'import_objects',
    ),
    'open_theme_dir' => 
    array (
      'component' => 'Theme_GitHub',
      'method' => 'open_theme_dir',
      'permission' => 'import_objects',
    ),
  ),
  'callbacks' => 
  array (
    'theme_github_template_callback' => 
    array (
      'manage_theme' => 
      array (
        'template_output' => 
        array (
          'component' => 'Theme_GitHub',
          'priority' => 5,
          'method' => 'manage_theme',
        ),
      ),
    ),
  ),
);