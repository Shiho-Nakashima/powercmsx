<?php $this->get_cache=array (
  'label' => 'Column',
  'plural' => 'Columns',
  'version' => '2.4',
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'table_id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'name' => 
    array (
      'type' => 'string',
      'size' => 100,
    ),
    'type' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'default' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'size' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'label' => 
    array (
      'type' => 'string',
      'size' => 100,
    ),
    'hint' => 
    array (
      'type' => 'text',
    ),
    'edit' => 
    array (
      'type' => 'string',
      'size' => 100,
    ),
    'disp_edit' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'options' => 
    array (
      'type' => 'text',
    ),
    'validation_type' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'maxlength' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'extra' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'list' => 
    array (
      'type' => 'string',
      'size' => 100,
    ),
    'order' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'not_null' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'rel_model' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'translate' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'unique' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'unchangeable' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'not_delete' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'autoset' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'index' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'is_primary' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'table_id' => 'table_id',
    'rel_model' => 'rel_model',
    'is_primary' => 'is_primary',
  ),
);