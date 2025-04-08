<?php $this->get_cache=array (
  'label' => 'Log',
  'plural' => 'Logs',
  'primary' => 'message',
  'version' => '1.4',
  'order' => 150,
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
    'message' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'category' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'level' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'metadata' => 
    array (
      'type' => 'text',
    ),
    'remote_ip' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'md5' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
    ),
    'created_by' => 
    array (
      'type' => 'int',
      'size' => 11,
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
    'id' => 'id',
    'message' => 'message',
    'category' => 'category',
    'level' => 'level',
    'model' => 'model',
    'remote_ip' => 'remote_ip',
    'object_id' => 'object_id',
    'md5' => 'md5',
    'created_on' => 'created_on',
    'created_by' => 'created_by',
    'modified_on' => 'modified_on',
    'workspace_id' => 'workspace_id',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'autoset' => 
  array (
    0 => 'message',
    1 => 'category',
    2 => 'level',
    3 => 'metadata',
    4 => 'model',
    5 => 'remote_ip',
    6 => 'object_id',
    7 => 'created_on',
    8 => 'created_by',
    9 => 'workspace_id',
  ),
  'unchangeable' => 
  array (
    0 => 'message',
    1 => 'category',
    2 => 'level',
    3 => 'metadata',
    4 => 'remote_ip',
    5 => 'object_id',
    6 => 'created_on',
    7 => 'created_by',
    8 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'message' => 'primary',
    'category' => 'text',
    'level' => 'text',
    'model' => 'text',
    'metadata' => 'textarea',
    'remote_ip' => 'text',
    'object_id' => 'number',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'message' => 'primary',
    'category' => 'text',
    'level' => 'text',
    'model' => 'text',
    'metadata' => 'text',
    'remote_ip' => 'text',
    'object_id' => 'number',
    'created_on' => 'datetime',
    'modified_on' => 'datetime',
    'created_by' => 'reference:user:nickname',
    'workspace_id' => 'reference:workspace:name',
  ),
  'column_labels' => 
  array (
    'md5' => 'MD5',
  ),
);