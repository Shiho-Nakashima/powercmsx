<?php $this->get_cache=array (
  'label' => 'URL',
  'plural' => 'URLs',
  'version' => '2.61',
  'display_system' => 1,
  'order' => 110,
  'primary' => 'relative_path',
  'menu_type' => 3,
  'display_space' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'url' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
      'default' => '',
    ),
    'dirname' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'relative_url' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
      'default' => '',
    ),
    'relative_path' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'key' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'delete_flag' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'not_null' => 1,
      'default' => 0,
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => '11',
    ),
    'meta_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => NULL,
    ),
    'archive_type' => 
    array (
      'type' => 'string',
      'size' => 50,
      'default' => NULL,
    ),
    'archive_date' => 
    array (
      'type' => 'datetime',
    ),
    'urlmapping_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'file_path' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'filemtime' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'md5' => 
    array (
      'type' => 'string',
      'size' => 50,
      'default' => NULL,
    ),
    'is_published' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'was_published' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'publish_file' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'mime_type' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
      'default' => 0,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'relative_path' => 'relative_path',
    'class' => 'class',
    'relative_url' => 'relative_url',
    'model' => 'model',
    'key' => 'key',
    'object_id' => 'object_id',
    'meta_id' => 'meta_id',
    'archive_type' => 'archive_type',
    'archive_date' => 'archive_date',
    'urlmapping_id' => 'urlmapping_id',
    'file_path' => 'file_path',
    'dirname' => 'dirname',
    'filemtime' => 'filemtime',
    'is_published' => 'is_published',
    'was_published' => 'was_published',
    'delete_flag' => 'delete_flag',
    'url' => 'url',
    'mime_type' => 'mime_type',
    'publish_file' => 'publish_file',
    'workspace_id' => 'workspace_id',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'unique' => 
  array (
    0 => 'file_path',
    1 => 'url',
  ),
  'autoset' => 
  array (
    0 => 'id',
    1 => 'url',
    2 => 'relative_url',
    3 => 'relative_path',
    4 => 'class',
    5 => 'model',
    6 => 'key',
    7 => 'dirname',
    8 => 'filemtime',
    9 => 'object_id',
    10 => 'meta_id',
    11 => 'archive_type',
    12 => 'archive_date',
    13 => 'urlmapping_id',
    14 => 'file_path',
    15 => 'md5',
    16 => 'is_published',
    17 => 'delete_flag',
    18 => 'publish_file',
    19 => 'mime_type',
    20 => 'workspace_id',
  ),
  'translate' => 
  array (
    0 => 'model',
    1 => 'archive_type',
  ),
  'options' => 
  array (
    'publish_file' => 'Dynamic,Static,Static(Delayed),On-Demand,Queue,Manually',
  ),
  'disp_edit' => 
  array (
    'publish_file' => 'select',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'url' => 'primary',
    'dirname' => 'text',
    'class' => 'text_short',
    'relative_url' => 'text',
    'relative_path' => 'text',
    'model' => 'text',
    'key' => 'text_short',
    'object_id' => 'number',
    'meta_id' => 'number',
    'archive_type' => 'text_short',
    'archive_date' => 'datetime',
    'urlmapping_id' => 'reference:urlmapping:name',
    'file_path' => 'text',
    'filemtime' => 'number',
    'md5' => 'text',
    'is_published' => 'checkbox',
    'was_published' => 'checkbox',
    'delete_flag' => 'checkbox',
    'publish_file' => 'selection',
    'mime_type' => 'text_short',
    'workspace_id' => 'reference:workspace:name',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'url' => 'primary',
    'dirname' => 'text',
    'class' => 'text_short',
    'model' => 'text',
    'object_id' => 'number',
    'meta_id' => 'number',
    'archive_type' => 'text',
    'archive_date' => 'date',
    'urlmapping_id' => 'reference:urlmapping:name',
    'filemtime' => 'text_short',
    'is_published' => 'checkbox',
    'was_published' => 'checkbox',
    'delete_flag' => 'checkbox',
    'publish_file' => 'text',
    'mime_type' => 'text_short',
    'workspace_id' => 'reference:workspace:name',
  ),
);