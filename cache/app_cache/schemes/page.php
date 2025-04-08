<?php $this->get_cache=array (
  'label' => 'Page',
  'plural' => 'Pages',
  'version' => '1.72',
  'primary' => 'title',
  'display_system' => 1,
  'auditing' => 1,
  'order' => 15,
  'menu_type' => 1,
  'taggable' => 1,
  'revisable' => 1,
  'start_end' => 1,
  'has_assets' => 1,
  'template_tags' => 1,
  'display_space' => 1,
  'has_basename' => 1,
  'has_status' => 1,
  'assign_user' => 1,
  'display_dashboard' => 1,
  'default_status' => 2,
  'has_uuid' => 1,
  'show_activity' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'title' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'text' => 
    array (
      'type' => 'text',
    ),
    'text_format' => 
    array (
      'type' => 'string',
      'size' => 50,
      'default' => NULL,
    ),
    'widgets' => 
    array (
      'type' => 'relation',
    ),
    'assets' => 
    array (
      'type' => 'relation',
      'default' => NULL,
    ),
    'text_more' => 
    array (
      'type' => 'text',
    ),
    'excerpt' => 
    array (
      'type' => 'text',
    ),
    'keywords' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'folder_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'tags' => 
    array (
      'type' => 'relation',
    ),
    'extra_path' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'basename' => 
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
    'rev_note' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'rev_diff' => 
    array (
      'type' => 'text',
    ),
    'rev_type' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
      'default' => '0',
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
    'rev_changed' => 
    array (
      'type' => 'string',
      'size' => 255,
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
    'rev_object_id' => 
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
    'title' => 'title',
    'keywords' => 'keywords',
    'extra_path' => 'extra_path',
    'basename' => 'basename',
    'status' => 'status',
    'has_deadline' => 'has_deadline',
    'published_on' => 'published_on',
    'unpublished_on' => 'unpublished_on',
    'folder_id' => 'folder_id',
    'rev_note' => 'rev_note',
    'rev_type' => 'rev_type',
    'user_id' => 'user_id',
    'previous_owner' => 'previous_owner',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'workspace_id' => 'workspace_id',
    'rev_object_id' => 'rev_object_id',
    'uuid' => 'uuid',
  ),
  'sort_by' => 
  array (
    'published_on' => 'descend',
  ),
  'relations' => 
  array (
    'widgets' => 'widget',
    'tags' => 'tag',
    'assets' => 'asset',
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
  'translate' => 
  array (
    0 => 'folder_id',
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
    'title' => 'primary',
    'text' => 'richtext',
    'widgets' => 'relation:widget:name:dialog',
    'assets' => 'relation:asset:label:dialog',
    'text_more' => 'textarea',
    'excerpt' => 'textarea',
    'keywords' => 'text',
    'folder_id' => 'relation:folder:label:hierarchy',
    'tags' => 'relation:tag:name:dialog',
    'basename' => 'text_short',
    'status' => 'selection',
    'published_on' => 'datetime',
    'unpublished_on' => 'datetime',
    'user_id' => 'relation:user:nickname:dialog',
    'uuid' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'title' => 'primary',
    'folder_id' => 'reference:folder:label',
    'tags' => 'reference:tag:name',
    'status' => 'number',
    'extra_path' => 'text_short',
    'basename' => 'text_short',
    'has_deadline' => 'checkbox',
    'published_on' => 'date',
    'unpublished_on' => 'date',
    'rev_diff' => 'popover',
    'rev_type' => 'text_short',
    'rev_note' => 'text',
    'rev_changed' => 'text',
    'user_id' => 'reference:user:nickname',
    'previous_owner' => 'reference:user:nickname',
    'modified_on' => 'datetime',
    'created_by' => 'reference:user:nickname',
    'modified_by' => 'reference:user:nickname',
    'workspace_id' => 'reference:workspace:name',
  ),
  'column_labels' => 
  array (
    'text' => 'Body',
  ),
  'default_list_items' => 
  array (
    0 => 'title',
    1 => 'status',
    2 => 'published_on',
    3 => 'user_id',
    4 => 'workspace_id',
  ),
  'options' => 
  array (
    'text' => 20,
    'text_more' => 7,
    'status' => 'Draft,Review,Approval Pending,Reserved,Publish,Ended',
  ),
);