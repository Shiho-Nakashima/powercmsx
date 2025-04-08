<?php $this->get_cache=array (
  'version' => '1.0',
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 60,
    ),
    'kind' => 
    array (
      'type' => 'string',
      'size' => 60,
    ),
    'type' => 
    array (
      'type' => 'string',
      'size' => 60,
    ),
    'name' => 
    array (
      'type' => 'string',
      'size' => 60,
    ),
    'key' => 
    array (
      'type' => 'string',
      'size' => 60,
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
    'blob' => 
    array (
      'type' => 'blob',
    ),
    'data' => 
    array (
      'type' => 'blob',
    ),
    'metadata' => 
    array (
      'type' => 'blob',
    ),
    'field_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'number' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'object_id' => 'object_id',
    'model' => 'model',
    'type' => 'type',
    'key' => 'key',
    'name' => 'name',
    'value' => 'value',
    'field_id' => 'field_id',
    'kind' => 'kind',
  ),
);