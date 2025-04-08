<?php $this->get_cache=array (
  'label' => 'Category',
  'plural' => 'Categories',
  'version' => '1.21',
  'primary' => 'label',
  'auditing' => 1,
  'order' => 20,
  'menu_type' => 1,
  'hierarchy' => 1,
  'sortable' => 1,
  'template_tags' => 1,
  'display_system' => 1,
  'display_space' => 1,
  'has_basename' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'label' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'description' => 
    array (
      'type' => 'text',
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
    'basename' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
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
    'label' => 'label',
    'order' => 'order',
    'parent_id' => 'parent_id',
    'basename' => 'basename',
    'workspace_id' => 'workspace_id',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'workspace_id',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'created_by',
    4 => 'modified_by',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'label' => 'primary',
    'description' => 'textarea',
    'parent_id' => 'relation:category:label:select',
    'order' => 'number',
    'basename' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'label' => 'primary',
    'description' => 'text_short',
    'basename' => 'text_short',
    'parent_id' => 'reference:category:label',
    'order' => 'number',
    'workspace_id' => 'reference:workspace:name',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
);