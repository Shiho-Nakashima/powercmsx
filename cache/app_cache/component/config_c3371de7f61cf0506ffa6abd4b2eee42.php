<?php $this->get_cache=array (
  'label' => 'CSSPreprocessor',
  'id' => 'csspreprocessor',
  'component' => 'CSSPreprocessor',
  'description' => 'Compiling preprocessor code to CSS.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'config_settings' => 
  array (
    'csspreprocessor_use_sass' => true,
    'csspreprocessor_minify_preview' => false,
    'csspreprocessor_sass_cmd' => 'Dart',
    'csspreprocessor_sass_path' => '/usr/local/bin/sass',
    'csspreprocessor_stylus_path' => '',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'settings' => 
  array (
    'csspreprocessor_compile' => true,
    'csspreprocessor_minify' => false,
  ),
  'tags' => 
  array (
    'block' => 
    array (
      'csspreprocessor' => 
      array (
        'component' => 'CSSPreprocessor',
        'method' => 'hdlr_csspreprocessor',
      ),
    ),
  ),
  'config_overwrite' => 
  array (
    'publish_callbacks' => true,
  ),
  'callbacks' => 
  array (
    'csspreprocessor_post_preview_template' => 
    array (
      'template' => 
      array (
        'post_preview' => 
        array (
          'component' => 'CSSPreprocessor',
          'priority' => 3,
          'method' => 'post_preview_template',
        ),
      ),
    ),
    'csspreprocessor_post_rebuild_template' => 
    array (
      'template' => 
      array (
        'post_rebuild' => 
        array (
          'component' => 'CSSPreprocessor',
          'priority' => 3,
          'method' => 'post_rebuild_template',
        ),
      ),
    ),
  ),
);