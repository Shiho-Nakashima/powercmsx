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
      'default' => '0',
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'meta_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'archive_type' => 
    array (
      'type' => 'string',
      'size' => 50,
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
    ),
    'is_published' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'was_published' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
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
      'default' => '0',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'url' => 'url',
    'dirname' => 'dirname',
    'relative_url' => 'relative_url',
    'relative_path' => 'relative_path',
    'class' => 'class',
    'model' => 'model',
    'key' => 'key',
    'delete_flag' => 'delete_flag',
    'object_id' => 'object_id',
    'meta_id' => 'meta_id',
    'archive_type' => 'archive_type',
    'archive_date' => 'archive_date',
    'urlmapping_id' => 'urlmapping_id',
    'file_path' => 'file_path',
    'filemtime' => 'filemtime',
    'is_published' => 'is_published',
    'was_published' => 'was_published',
    'publish_file' => 'publish_file',
    'mime_type' => 'mime_type',
    'workspace_id' => 'workspace_id',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'unique' => 
  array (
    0 => 'url',
    1 => 'file_path',
  ),
  'autoset' => 
  array (
    0 => 'id',
    1 => 'url',
    2 => 'dirname',
    3 => 'relative_url',
    4 => 'relative_path',
    5 => 'class',
    6 => 'model',
    7 => 'key',
    8 => 'delete_flag',
    9 => 'object_id',
    10 => 'meta_id',
    11 => 'archive_type',
    12 => 'archive_date',
    13 => 'urlmapping_id',
    14 => 'file_path',
    15 => 'filemtime',
    16 => 'md5',
    17 => 'is_published',
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
    'urlmapping_id' => 'reference',
    'publish_file' => 'select',
    'workspace_id' => 'reference',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'url' => 'primary',
    'dirname' => 'text',
    'relative_url' => 'text',
    'relative_path' => 'text',
    'class' => 'text_short',
    'model' => 'text',
    'key' => 'text_short',
    'delete_flag' => 'checkbox',
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
    'delete_flag' => 'checkbox',
    'object_id' => 'number',
    'meta_id' => 'number',
    'archive_type' => 'text',
    'archive_date' => 'date',
    'urlmapping_id' => 'reference:urlmapping:name',
    'filemtime' => 'text_short',
    'is_published' => 'checkbox',
    'was_published' => 'checkbox',
    'publish_file' => 'text',
    'mime_type' => 'text_short',
    'workspace_id' => 'reference:workspace:name',
  ),
  'relations' => 
  array (
  ),
  'extras' => 
  array (
  ),
  'unchangeable' => 
  array (
  ),
  'validation_types' => 
  array (
  ),
  'maxlength' => 
  array (
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'url' => 'URL',
    'dirname' => 'Directory',
    'relative_url' => 'Relative URL',
    'relative_path' => 'Relative Path',
    'class' => 'Class',
    'model' => 'Model',
    'key' => 'Key',
    'delete_flag' => 'Delete Flag',
    'object_id' => 'Object ID',
    'meta_id' => 'Meta ID',
    'archive_type' => 'Archive Type',
    'archive_date' => 'Archive Date',
    'urlmapping_id' => 'URL Map',
    'file_path' => 'File Path',
    'filemtime' => 'Timestamp',
    'md5' => 'MD5',
    'is_published' => 'Published',
    'was_published' => 'Was Published',
    'publish_file' => 'Publish the File',
    'mime_type' => 'MIME Type',
    'workspace_id' => 'WorkSpace',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'url' => 'URL',
      'dirname' => 'Directory',
      'relative_url' => 'Relative URL',
      'relative_path' => 'Relative Path',
      'class' => 'Class',
      'model' => 'Model',
      'key' => 'Key',
      'delete_flag' => 'Delete Flag',
      'object_id' => 'Object ID',
      'meta_id' => 'Meta ID',
      'archive_type' => 'Archive Type',
      'archive_date' => 'Archive Date',
      'urlmapping_id' => 'URL Map',
      'file_path' => 'File Path',
      'filemtime' => 'Timestamp',
      'md5' => 'MD5',
      'is_published' => 'Published',
      'was_published' => 'Was Published',
      'publish_file' => 'Publish the File',
      'mime_type' => 'MIME Type',
      'workspace_id' => 'WorkSpace',
    ),
    'ja' => 
    array (
      'urlinfo' => 'URL',
      'URL' => 'URL',
      'URLs' => 'URL',
      'ID' => 'ID',
      'Directory' => 'ディレクトリ',
      'Relative URL' => '相対URL',
      'Relative Path' => '相対パス',
      'Class' => 'クラス',
      'Model' => 'モデル',
      'Key' => 'キー',
      'Delete Flag' => '削除フラグ',
      'Object ID' => 'オブジェクトID',
      'Meta ID' => 'メタID',
      'Archive Type' => 'アーカイブ種別',
      'Archive Date' => 'アーカイブ日付',
      'URL Map' => 'URLマップ',
      'File Path' => 'ファイル・パス',
      'Timestamp' => 'タイムスタンプ',
      'MD5' => 'MD5',
      'Published' => 'パブリッシュ',
      'Was Published' => '出力済み',
      'Publish the File' => 'ファイル出力',
      'MIME Type' => 'MIMEタイプ',
      'WorkSpace' => 'スペース',
    ),
  ),
);