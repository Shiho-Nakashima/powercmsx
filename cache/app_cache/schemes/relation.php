<?php $this->get_cache=array (
  'label' => 'Relation',
  'plural' => 'Relations',
  'version' => '1.1',
  'display' => 0,
  'order' => 81,
  'primary' => 'name',
  'menu_type' => 3,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => '11',
      'not_null' => 1,
    ),
    'name' => 
    array (
      'type' => 'string',
      'size' => '255',
    ),
    'from_obj' => 
    array (
      'type' => 'string',
      'size' => '50',
      'not_null' => 1,
    ),
    'from_id' => 
    array (
      'type' => 'int',
      'size' => '11',
      'not_null' => 1,
    ),
    'to_obj' => 
    array (
      'type' => 'string',
      'size' => '50',
      'not_null' => 1,
    ),
    'to_id' => 
    array (
      'type' => 'int',
      'size' => '11',
      'not_null' => 1,
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => '11',
      'default' => NULL,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'name' => 'name',
    'context' => 
    array (
      0 => 'to_obj',
      1 => 'to_id',
    ),
    'related' => 
    array (
      0 => 'from_obj',
      1 => 'from_id',
    ),
    'from_obj' => 'from_obj',
    'from_id' => 'from_id',
    'to_obj' => 'to_obj',
    'to_id' => 'to_id',
    'order' => 'order',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'from_obj' => 'text_short',
    'from_id' => 'number',
    'to_obj' => 'text_short',
    'to_id' => 'number',
    'order' => 'number',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'from_obj' => 'text_short',
    'from_id' => 'number',
    'to_obj' => 'text_short',
    'to_id' => 'number',
    'order' => 'number',
  ),
);