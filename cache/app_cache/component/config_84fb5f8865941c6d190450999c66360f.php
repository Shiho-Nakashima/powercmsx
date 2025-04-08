<?php $this->get_cache=array (
  'label' => 'DynamicCaching',
  'id' => 'dynamiccaching',
  'component' => 'DynamicCaching',
  'description' => 'Conditionally caches dynamic content.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'dynamiccaching_extensions' => 
    array (
      0 => 'html',
      1 => 'json',
    ),
    'dynamiccaching_request_methods' => 
    array (
      0 => 'GET',
    ),
    'dynamiccaching_exclude_logged_in' => 
    array (
      0 => 'member',
    ),
    'dynamiccaching_cache_with_query' => false,
  ),
  'config_overwrite' => 
  array (
    'publish_callbacks' => true,
  ),
  'callbacks' => 
  array (
    'dynamiccaching_post_load_object_urlinfo' => 
    array (
      'urlinfo' => 
      array (
        'post_load_object' => 
        array (
          'component' => 'DynamicCaching',
          'priority' => 1,
          'method' => 'post_load_object_urlinfo',
        ),
      ),
    ),
    'dynamiccaching_dynamic_view_urlinfo' => 
    array (
      'urlinfo' => 
      array (
        'dynamic_view' => 
        array (
          'component' => 'DynamicCaching',
          'priority' => 10,
          'method' => 'dynamic_view_urlinfo',
        ),
      ),
    ),
    'dynamiccaching_start_publish_template' => 
    array (
      'template' => 
      array (
        'start_publish' => 
        array (
          'component' => 'DynamicCaching',
          'priority' => 1,
          'method' => 'start_publish_template',
        ),
      ),
    ),
  ),
);