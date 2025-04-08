<?php $this->get_cache=array (
  'label' => 'Group',
  'plural' => 'Groups',
  'version' => '1.2',
  'primary' => 'name',
  'display_system' => 1,
  'auditing' => 1,
  'order' => 140,
  'menu_type' => 2,
  'template_tags' => 1,
  'display_space' => 1,
  'has_status' => 1,
  'has_basename' => 1,
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
    'objects' => 
    array (
      'type' => 'relation',
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'status' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '1',
    ),
    'basename' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
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
    'name' => 'name',
    'model' => 'model',
    'status' => 'status',
    'basename' => 'basename',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'workspace_id' => 'workspace_id',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'relations' => 
  array (
    'objects' => '__any__',
  ),
  'autoset' => 
  array (
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
    4 => 'workspace_id',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'objects' => 'relation:__any__:__primary__:dialog',
    'status' => 'selection',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'model' => 'text',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
    'workspace_id' => 'reference:workspace:name',
  ),
  'options' => 
  array (
    'status' => 'Disable,Enable',
  ),
  'default_status' => 1,
  'translate' => 
  array (
    0 => 'model',
  ),
  'column_labels' => 
  array (
    'status' => 'Archive',
  ),
  'hide_edit_options' => 
  array (
    0 => 'status',
  ),
);