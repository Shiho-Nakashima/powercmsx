<?php $this->get_cache=array (
  'version' => '1.5',
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'name' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'user_id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'key' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'value' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'text' => 
    array (
      'type' => 'text',
    ),
    'kind' => 
    array (
      'type' => 'string',
      'size' => 2,
    ),
    'data' => 
    array (
      'type' => 'blob',
    ),
    'metadata' => 
    array (
      'type' => 'blob',
    ),
    'extradata' => 
    array (
      'type' => 'blob',
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
    ),
    'start' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'expires' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'name' => 'name',
    'user_id' => 'user_id',
    'key' => 'key',
    'value' => 'value',
    'kind' => 'kind',
    'object_id' => 'object_id',
    'workspace_id' => 'workspace_id',
    'start' => 'start',
    'expires' => 'expires',
  ),
);