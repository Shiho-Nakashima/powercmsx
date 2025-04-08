<?php $this->get_cache=array (
  'label' => 'Taxonomy',
  'plural' => 'Taxonomies',
  'version' => '1.01',
  'primary' => 'name',
  'auditing' => 1,
  'hierarchy' => 1,
  'sortable' => 1,
  'order' => 1,
  'menu_type' => 2,
  'display_system' => 1,
  'template_tags' => 1,
  'dialog_view' => 1,
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
    'normalize' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'parent_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
      'default' => 0,
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
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'name' => 'name',
    'normalize' => 'normalize',
    'order' => 'order',
    'parent_id' => 'parent_id',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'options' => 
  array (
  ),
  'extras' => 
  array (
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'normalize',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'created_by',
    4 => 'modified_by',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'normalize' => 'text_short',
    'parent_id' => 'relation:category:label:select',
    'order' => 'number',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'normalize' => 'text_short',
    'parent_id' => 'reference:category:label',
    'order' => 'number',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'column_labels' => 
  array (
    'normalize' => 'Normalized',
  ),
);