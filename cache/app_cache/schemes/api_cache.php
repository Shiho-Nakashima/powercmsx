<?php $this->get_cache=array (
  'label' => 'API Cache',
  'plural' => 'API Caches',
  'version' => '1.2',
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'key' => 
    array (
      'type' => 'string',
      'size' => 50,
      'not_null' => 1,
    ),
    'value' => 
    array (
      'type' => 'blob',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'key' => 'key',
  ),
);