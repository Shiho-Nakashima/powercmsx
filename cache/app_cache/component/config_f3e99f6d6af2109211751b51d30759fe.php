<?php $this->get_cache=array (
  'label' => 'SiteMap',
  'id' => 'sitemap',
  'component' => 'SiteMap',
  'version' => '1.2',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'SiteMap dashboard widget.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'sitemap_sort_order' => 'ascend',
    'sitemap_binary' => false,
  ),
  'settings' => 
  array (
    'sitemap_contains_assets' => 1,
    'sitemap_contains_attachmentfiles' => 0,
    'sitemap_contains_files' => 0,
    'sitemap_contains_thumbnails' => 0,
    'sitemap_contains_draft' => 1,
  ),
  'widgets' => 
  array (
    'sitemap' => 
    array (
      'component' => 'SiteMap',
      'label' => 'Site Map',
      'order' => 20,
    ),
  ),
  'methods' => 
  array (
    'get_sitemap_tree' => 
    array (
      'component' => 'SiteMap',
      'method' => 'get_sitemap_tree',
    ),
  ),
  'callbacks' => 
  array (
    'sitemap_template_source_dashboard' => 
    array (
      'dashboard' => 
      array (
        'template_source' => 
        array (
          'component' => 'SiteMap',
          'priority' => 10,
          'method' => 'template_source_dashboard',
        ),
      ),
    ),
  ),
);