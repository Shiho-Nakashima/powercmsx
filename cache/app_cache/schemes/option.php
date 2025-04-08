<?php $this->get_cache=array (
  'version' => '1.2',
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'key' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'value' => 
    array (
      'type' => 'text',
    ),
    'number' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'data' => 
    array (
      'type' => 'text',
    ),
    'option' => 
    array (
      'type' => 'text',
    ),
    'extra' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'other' => 
    array (
      'type' => 'text',
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'user_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'kind' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'key' => 'key',
    'extra' => 'extra',
    'number' => 'number',
    'object_id' => 'object_id',
    'user_id' => 'user_id',
    'kind' => 'kind',
    'workspace_id' => 'workspace_id',
  ),
);