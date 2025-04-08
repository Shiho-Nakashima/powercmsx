<?php $this->get_cache=array (
  'label' => 'Attachment File',
  'plural' => 'Attachment Files',
  'version' => '1.8',
  'primary' => 'name',
  'order' => 410,
  'menu_type' => 2,
  'display_space' => 1,
  'display_system' => 1,
  'start_end' => 1,
  'has_status' => 1,
  'template_tags' => 1,
  'default_status' => 4,
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
    'file' => 
    array (
      'type' => 'blob',
    ),
    'mime_type' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'size' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => NULL,
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
    ),
    'status' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '1',
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
    ),
    'modified_by' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'published_on' => 
    array (
      'type' => 'datetime',
    ),
    'unpublished_on' => 
    array (
      'type' => 'datetime',
    ),
    'has_deadline' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'workspace_id' => 'workspace_id',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'modified_by' => 'modified_by',
    'published_on' => 'published_on',
    'unpublished_on' => 'unpublished_on',
    'has_deadline' => 'has_deadline',
    'status' => 'status',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'autoset' => 
  array (
    0 => 'workspace_id',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'modified_by',
  ),
  'options' => 
  array (
    'status' => 'Draft,Review,Approval Pending,Reserved,Publish,Ended',
  ),
  'disp_edit' => 
  array (
    'status' => 'select',
  ),
  'unchangeable' => 
  array (
    0 => 'class',
    1 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'file' => 'file',
    'mime_type' => 'text_short',
    'size' => 'number',
    'class' => 'text_short',
    'status' => 'selection',
    'published_on' => 'datetime',
    'unpublished_on' => 'datetime',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'status' => 'number',
    'mime_type' => 'text_short',
    'size' => 'number',
    'class' => 'text_short',
    'workspace_id' => 'reference:workspace:name',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
    'published_on' => 'date',
    'unpublished_on' => 'date',
    'has_deadline' => 'checkbox',
  ),
);