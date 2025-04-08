<?php $this->get_cache=array (
  'label' => 'Field Type',
  'plural' => 'Field Types',
  'version' => '1.5',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 191,
  'sortable' => 1,
  'display_system' => 1,
  'menu_type' => 2,
  'has_basename' => 1,
  'revisable' => 1,
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
    ),
    'label' => 
    array (
      'type' => 'text',
    ),
    'hide_label' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'content' => 
    array (
      'type' => 'text',
    ),
    'basename' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => 11,
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
      'not_null' => 1,
      'default' => '0',
    ),
    'rev_type' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
      'default' => '0',
    ),
    'rev_object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => NULL,
    ),
    'rev_changed' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => NULL,
    ),
    'rev_note' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => NULL,
    ),
    'rev_diff' => 
    array (
      'type' => 'text',
      'default' => NULL,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'basename' => 'basename',
    'order' => 'order',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'rev_type' => 'rev_type',
    'rev_object_id' => 'rev_object_id',
    'rev_note' => 'rev_note',
  ),
  'translate' => 
  array (
    0 => 'name',
  ),
  'options' => 
  array (
    'label' => '10',
    'content' => '16',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
    4 => 'rev_type',
    5 => 'rev_object_id',
    6 => 'rev_changed',
    7 => 'rev_diff',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'label' => 'textarea',
    'hide_label' => 'checkbox',
    'content' => 'textarea',
    'basename' => 'text_short',
    'order' => 'number',
    'uuid' => 'text_short',
  ),
  'hide_edit_options' => 
  array (
    0 => 'label',
    1 => 'hide_label',
    2 => 'content',
    3 => 'basename',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'basename' => 'text',
    'order' => 'number',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
    'rev_note' => 'text',
    'rev_diff' => 'popover',
  ),
);