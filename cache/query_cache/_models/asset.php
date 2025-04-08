<?php $this->get_cache=array (
  'label' => 'Asset',
  'plural' => 'Assets',
  'version' => '1.81',
  'primary' => 'label',
  'display_system' => 1,
  'order' => 80,
  'auditing' => 1,
  'menu_type' => 1,
  'taggable' => 1,
  'revisable' => 1,
  'start_end' => 1,
  'template_tags' => 1,
  'dialog_view' => 1,
  'display_space' => 1,
  'display_dashboard' => 1,
  'has_status' => 1,
  'assign_user' => 1,
  'default_status' => 4,
  'has_uuid' => 1,
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
    'file' => 
    array (
      'type' => 'blob',
      'not_null' => 1,
    ),
    'extra_path' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'file_name' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'file_ext' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'mime_type' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'tags' => 
    array (
      'type' => 'relation',
    ),
    'size' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'image_width' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'image_height' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'class' => 
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
    'created_by' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'rev_note' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'modified_by' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'rev_diff' => 
    array (
      'type' => 'text',
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
    ),
    'has_deadline' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'published_on' => 
    array (
      'type' => 'datetime',
    ),
    'unpublished_on' => 
    array (
      'type' => 'datetime',
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
    ),
    'rev_changed' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'user_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'previous_owner' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'uuid' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'label' => 'label',
    'extra_path' => 'extra_path',
    'file_name' => 'file_name',
    'file_ext' => 'file_ext',
    'mime_type' => 'mime_type',
    'size' => 'size',
    'class' => 'class',
    'status' => 'status',
    'created_by' => 'created_by',
    'rev_note' => 'rev_note',
    'modified_by' => 'modified_by',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'workspace_id' => 'workspace_id',
    'has_deadline' => 'has_deadline',
    'published_on' => 'published_on',
    'unpublished_on' => 'unpublished_on',
    'rev_type' => 'rev_type',
    'rev_object_id' => 'rev_object_id',
    'user_id' => 'user_id',
    'previous_owner' => 'previous_owner',
    'uuid' => 'uuid',
  ),
  'hide_edit_options' => 
  array (
    0 => 'status',
    1 => 'published_on',
    2 => 'unpublished_on',
    3 => 'user_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'label' => 'primary',
    'description' => 'textarea',
    'file' => 'file',
    'extra_path' => 'text_short',
    'file_name' => 'text_short',
    'tags' => 'relation:tag:name:dialog',
    'size' => 'number',
    'status' => 'selection',
    'published_on' => 'datetime',
    'unpublished_on' => 'datetime',
    'user_id' => 'relation:user:nickname:dialog',
    'uuid' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'label' => 'primary',
    'file_name' => 'text',
    'tags' => 'reference:tag:name',
    'class' => 'text',
    'status' => 'number',
    'created_by' => 'reference:user:nickname',
    'rev_note' => 'text',
    'modified_by' => 'reference:user:nickname',
    'rev_diff' => 'popover',
    'rev_type' => 'text_short',
    'created_on' => 'date',
    'workspace_id' => 'reference:workspace:name',
    'has_deadline' => 'checkbox',
    'published_on' => 'date',
    'unpublished_on' => 'date',
    'rev_changed' => 'text',
    'user_id' => 'reference:user:nickname',
    'previous_owner' => 'reference:user:nickname',
  ),
  'default_list_items' => 
  array (
    0 => 'label',
    1 => 'file_name',
    2 => 'class',
    3 => 'status',
    4 => 'published_on',
    5 => 'workspace_id',
  ),
  'autoset' => 
  array (
    0 => 'rev_diff',
    1 => 'rev_type',
    2 => 'rev_changed',
    3 => 'created_on',
    4 => 'modified_on',
    5 => 'created_by',
    6 => 'modified_by',
    7 => 'workspace_id',
    8 => 'rev_object_id',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
    1 => 'uuid',
  ),
  'sort_by' => 
  array (
    'created_on' => 'descend',
  ),
  'relations' => 
  array (
    'tags' => 'tag',
  ),
  'options' => 
  array (
    'status' => 'Draft,Review,Approval Pending,Reserved,Publish,Ended',
  ),
);