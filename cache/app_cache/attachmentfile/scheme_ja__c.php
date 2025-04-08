<?php $this->get_cache=array (
  'label' => '添付ファイル',
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
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
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
    'status' => 'status',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'modified_by' => 'modified_by',
    'published_on' => 'published_on',
    'unpublished_on' => 'unpublished_on',
    'has_deadline' => 'has_deadline',
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
    'mime_type' => 'text_short',
    'size' => 'number',
    'class' => 'text_short',
    'workspace_id' => 'reference:workspace:name',
    'status' => 'number',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
    'published_on' => 'date',
    'unpublished_on' => 'date',
    'has_deadline' => 'checkbox',
  ),
  'relations' => 
  array (
  ),
  'extras' => 
  array (
  ),
  'unique' => 
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
    'name' => 'Name',
    'file' => 'File',
    'mime_type' => 'MIME Type',
    'size' => 'Size',
    'class' => 'Class',
    'workspace_id' => 'WorkSpace',
    'status' => 'Status',
    'created_on' => 'Date Created',
    'modified_on' => 'Date Modified',
    'modified_by' => 'Modified By',
    'published_on' => 'Publish Date',
    'unpublished_on' => 'Unpublish Date',
    'has_deadline' => 'Specify the Deadline',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'name' => 'Name',
      'file' => 'File',
      'mime_type' => 'MIME Type',
      'size' => 'Size',
      'class' => 'Class',
      'workspace_id' => 'WorkSpace',
      'status' => 'Status',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'modified_by' => 'Modified By',
      'published_on' => 'Publish Date',
      'unpublished_on' => 'Unpublish Date',
      'has_deadline' => 'Specify the Deadline',
    ),
    'ja' => 
    array (
      'attachmentfile' => '添付ファイル',
      'Attachment File' => '添付ファイル',
      'Attachment Files' => '添付ファイル',
      'ID' => 'ID',
      'Name' => '名前',
      'File' => 'ファイル',
      'MIME Type' => 'MIMEタイプ',
      'Size' => 'サイズ',
      'Class' => 'クラス',
      'WorkSpace' => 'スペース',
      'Status' => 'ステータス',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Modified By' => '更新者',
      'Publish Date' => '公開日',
      'Unpublish Date' => '公開終了日',
      'Specify the Deadline' => '公開終了日を指定',
    ),
  ),
);