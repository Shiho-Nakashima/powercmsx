<?php $this->get_cache=array (
  'version' => '1.3',
  'label' => 'IP Address',
  'plural' => 'IP Addresses',
  'primary' => 'ip_address',
  'auditing' => 1,
  'order' => 300,
  'menu_type' => 2,
  'display_system' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'ip_address' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'memo' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'model' => 
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
    'modified_by' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'memo' => 'memo',
    'ip_address' => 'ip_address',
    'class' => 'class',
    'model' => 'model',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'disp_edit' => 
  array (
    'class' => 'select',
  ),
  'translate' => 
  array (
    0 => 'class',
  ),
  'options' => 
  array (
    'class' => 'administrator,allow,banned,info,spam',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'model',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'created_by',
    4 => 'modified_by',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'ip_address' => 'primary',
    'memo' => 'text',
    'class' => 'selection',
    'model' => 'text_short',
    'created_on' => 'datetime',
    'modified_on' => 'datetime',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'ip_address' => 'primary',
    'memo' => 'text',
    'class' => 'text_short',
    'model' => 'text_short',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
);