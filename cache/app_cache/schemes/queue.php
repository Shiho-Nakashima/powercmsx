<?php $this->get_cache=array (
  'label' => 'Queue',
  'plural' => 'Queues',
  'version' => '1.1',
  'primary' => 'key',
  'order' => 500,
  'menu_type' => 3,
  'display_system' => 1,
  'display_space' => 1,
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
      'size' => 255,
    ),
    'component' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'method' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'value' => 
    array (
      'type' => 'text',
    ),
    'metadata' => 
    array (
      'type' => 'text',
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'data' => 
    array (
      'type' => 'blob',
    ),
    'interval' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'ts_job_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'max_retries' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'errors' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'created_by' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
    ),
    'start_on' => 
    array (
      'type' => 'datetime',
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'key' => 'key',
    'component' => 'component',
    'method' => 'method',
    'class' => 'class',
    'ts_job_id' => 'ts_job_id',
    'created_on' => 'created_on',
    'start_on' => 'start_on',
    'workspace_id' => 'workspace_id',
  ),
  'translate' => 
  array (
    0 => 'class',
  ),
  'options' => 
  array (
    'value' => '3',
    'metadata' => '3',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'key',
    1 => 'component',
    2 => 'method',
    3 => 'class',
    4 => 'model',
    5 => 'object_id',
    6 => 'value',
    7 => 'metadata',
    8 => 'data',
    9 => 'interval',
    10 => 'ts_job_id',
    11 => 'max_retries',
    12 => 'errors',
    13 => 'created_by',
    14 => 'created_on',
    15 => 'start_on',
    16 => 'workspace_id',
  ),
  'unchangeable' => 
  array (
    0 => 'key',
    1 => 'component',
    2 => 'method',
    3 => 'class',
    4 => 'model',
    5 => 'object_id',
    6 => 'value',
    7 => 'metadata',
    8 => 'data',
    9 => 'interval',
    10 => 'ts_job_id',
    11 => 'max_retries',
    12 => 'errors',
    13 => 'created_by',
    14 => 'created_on',
    15 => 'start_on',
    16 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'key' => 'text',
    'component' => 'text',
    'method' => 'text',
    'class' => 'text',
    'model' => 'text_short',
    'object_id' => 'number',
    'value' => 'textarea',
    'metadata' => 'textarea',
    'ts_job_id' => 'number',
    'max_retries' => 'number',
    'errors' => 'number',
    'created_by' => 'reference:user:nickname',
    'created_on' => 'datetime',
    'start_on' => 'datetime',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'key' => 'text_short',
    'component' => 'text_short',
    'method' => 'text_short',
    'class' => 'text_short',
    'model' => 'text_short',
    'object_id' => 'number',
    'value' => 'text',
    'metadata' => 'text',
    'ts_job_id' => 'number',
    'max_retries' => 'number',
    'errors' => 'number',
    'created_by' => 'reference:user:nickname',
    'created_on' => 'datetime',
    'start_on' => 'datetime',
    'workspace_id' => 'reference:workspace:name',
  ),
);