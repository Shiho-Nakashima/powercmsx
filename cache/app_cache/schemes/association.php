<?php $this->get_cache=array (
  'label' => 'Association',
  'plural' => 'Associations',
  'version' => '1.1',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 510,
  'menu_type' => 5,
  'display_system' => 1,
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
    'users' => 
    array (
      'type' => 'relation',
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
      'default' => NULL,
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
      'default' => NULL,
    ),
    'created_by' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => NULL,
    ),
    'modified_by' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => NULL,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'relations' => 
  array (
    'users' => 'user',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'autoset' => 
  array (
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'users' => 'relation:user:nickname:dialog',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'users' => 'reference:user:name',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
);