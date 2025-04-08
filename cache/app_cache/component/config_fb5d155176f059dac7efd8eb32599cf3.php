<?php $this->get_cache=array (
  'label' => 'CacheManager',
  'id' => 'cachemanager',
  'component' => 'CacheManager',
  'version' => '1.6',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'It provides clear cache interface for PowerCMS X.',
  'menus' => 
  array (
    'manage_cache' => 
    array (
      'display_system' => 1,
      'component' => 'CacheManager',
      'permission' => 'is_superuser',
      'mode' => 'manage_cache',
      'label' => 'Manage Cache',
      'order' => 2000,
    ),
  ),
  'methods' => 
  array (
    'manage_cache' => 
    array (
      'component' => 'CacheManager',
      'permission' => 'is_superuser',
      'method' => 'manage_cache',
    ),
    'cachemanager_manage_cache' => 
    array (
      'component' => 'CacheManager',
      'permission' => 'is_superuser',
      'method' => 'cachemanager_manage_cache',
    ),
  ),
);