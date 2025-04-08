<?php $this->get_cache=array (
  'label' => 'ImageWebP',
  'id' => 'imagewebp',
  'component' => 'ImageWebP',
  'description' => 'Convert the uploaded image to WebP format.',
  'version' => '1.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'settings' => 
  array (
    'imagewebp_use_system_settings' => 0,
    'imagewebp_quality' => 80,
    'imagewebp_models' => '',
    'imagewebp_file_types' => 'image/png,image/jpeg',
  ),
  'config_overwrite' => 
  array (
    'publish_callbacks' => true,
  ),
  'hooks' => 
  array (
    'imagewebp_start_mode' => 
    array (
      'start_mode' => 
      array (
        'component' => 'ImageWebP',
        'priority' => 10,
        'method' => 'start_mode',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'imagewebp_start_publish_blob' => 
    array (
      'blob' => 
      array (
        'start_publish' => 
        array (
          'component' => 'ImageWebP',
          'priority' => 10,
          'method' => 'start_publish',
        ),
      ),
    ),
    'imagewebp_post_publish_blob' => 
    array (
      'blob' => 
      array (
        'post_publish' => 
        array (
          'component' => 'ImageWebP',
          'priority' => 10,
          'method' => 'post_publish',
        ),
      ),
    ),
    'imagewebp_post_load_urlinfo' => 
    array (
      'urlinfo' => 
      array (
        'post_load_object' => 
        array (
          'component' => 'ImageWebP',
          'priority' => 10,
          'method' => 'post_load_urlinfo',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'modifier' => 
    array (
      'convert2webp' => 
      array (
        'component' => 'ImageWebP',
        'method' => 'filter_convert2webp',
      ),
    ),
  ),
);