<?php $this->get_cache=array (
  'label' => 'Phrase',
  'plural' => 'Phrases',
  'version' => '1.3',
  'primary' => 'phrase',
  'display_system' => 1,
  'editable' => true,
  'order' => 120,
  'auditing' => 1,
  'menu_type' => 2,
  'can_duplicate' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'phrase' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'trans' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'lang' => 
    array (
      'type' => 'string',
      'size' => 60,
      'not_null' => 1,
    ),
    'component' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => NULL,
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
    'phrase' => 'phrase',
    'trans' => 'trans',
    'lang' => 'lang',
    'component' => 'component',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'phrase' => 'primary',
    'trans' => 'text_short',
    'lang' => 'text_short',
    'component' => 'text_short',
    'created_on' => 'date',
    'modified_on' => 'date',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'phrase' => 'primary',
    'trans' => 'text',
    'lang' => 'languages',
    'component' => 'text_short',
  ),
  'autoset' => 
  array (
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
    4 => 'component',
  ),
  'unchangeable' => 
  array (
    0 => 'component',
  ),
);