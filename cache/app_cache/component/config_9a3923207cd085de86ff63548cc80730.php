<?php $this->get_cache=array (
  'label' => 'common',
  'id' => 'common',
  'component' => 'common',
  'version' => '1.0',
  'author' => 'JNA',
  'author_link' => 'code',
  'description' => '共通部品',
  'menus' => 
  array (
    'manage_cache' => 
    array (
      'display_system' => 1,
      'component' => 'common',
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
      'component' => 'CachecommonManager',
      'permission' => 'is_superuser',
      'method' => 'manage_cache',
    ),
    'common_manage_cache' => 
    array (
      'component' => 'common',
      'permission' => 'is_superuser',
      'method' => 'common_manage_cache',
    ),
  ),
);