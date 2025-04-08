<?php $this->get_cache=array (
  'label' => 'Job',
  'plural' => 'Jobs',
  'primary' => 'name',
  'version' => '1.57',
  'order' => 480,
  'menu_type' => 3,
  'display_space' => 1,
  'display_system' => 1,
  'has_status' => 1,
  'default_status' => 2,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'name' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'label' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'component' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'is_running' => 
    array (
      'type' => 'tinyint',
      'size' => '4',
      'default' => '0',
    ),
    'max_per_once' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'retry_interval' => 
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
    'status' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '2',
    ),
    'user_id' => 
    array (
      'type' => 'int',
      'size' => 11,
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
    'name' => 'name',
    'label' => 'label',
    'class' => 'class',
    'is_running' => 'is_running',
    'created_on' => 'created_on',
    'start_on' => 'start_on',
    'status' => 'status',
    'user_id' => 'user_id',
    'workspace_id' => 'workspace_id',
  ),
  'translate' => 
  array (
    0 => 'name',
    1 => 'class',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'disp_edit' => 
  array (
    'status' => 'select',
    'user_id' => 'reference',
  ),
  'autoset' => 
  array (
    0 => 'workspace_id',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'label' => 'text',
    'component' => 'text',
    'class' => 'text',
    'is_running' => 'checkbox',
    'max_per_once' => 'number',
    'created_on' => 'datetime',
    'start_on' => 'datetime',
    'status' => 'selection',
    'user_id' => 'reference:user:nickname',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'label' => 'text',
    'component' => 'text',
    'class' => 'text',
    'is_running' => 'checkbox',
    'max_per_once' => 'number',
    'created_on' => 'datetime',
    'start_on' => 'datetime',
    'status' => 'number',
    'user_id' => 'reference:user:nickname',
    'workspace_id' => 'reference:workspace:name',
  ),
  'options' => 
  array (
    'status' => 'Disable,Enable',
    'user_id' => 'user',
  ),
  'hide_edit_options' => 
  array (
    0 => 'user_id',
    1 => 'status',
  ),
);