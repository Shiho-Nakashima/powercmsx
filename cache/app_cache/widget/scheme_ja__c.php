<?php $this->get_cache=array (
  'version' => '1.51',
  'label' => 'ウィジェット',
  'plural' => 'Widgets',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 460,
  'sortable' => 1,
  'start_end' => 1,
  'menu_type' => 6,
  'template_tags' => 1,
  'taggable' => 1,
  'display_space' => 1,
  'has_basename' => 1,
  'has_status' => 1,
  'assign_user' => 1,
  'revisable' => 1,
  'default_status' => 4,
  'has_uuid' => 1,
  'has_assets' => 1,
  'display_system' => 1,
  'text_format' => 'RichText',
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
    'text' => 
    array (
      'type' => 'text',
    ),
    'fore_color' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => '#000000',
    ),
    'back_color' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => '#ffffff',
    ),
    'text_format' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'image' => 
    array (
      'type' => 'blob',
    ),
    'colors' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'assets' => 
    array (
      'type' => 'relation',
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => 11,
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
    'tags' => 
    array (
      'type' => 'relation',
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
    'status' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '4',
    ),
    'basename' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'uuid' => 
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
    'rev_note' => 
    array (
      'type' => 'string',
      'size' => 255,
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
    'class' => 'class',
    'order' => 'order',
    'user_id' => 'user_id',
    'previous_owner' => 'previous_owner',
    'published_on' => 'published_on',
    'unpublished_on' => 'unpublished_on',
    'has_deadline' => 'has_deadline',
    'status' => 'status',
    'basename' => 'basename',
    'uuid' => 'uuid',
    'workspace_id' => 'workspace_id',
    'rev_type' => 'rev_type',
    'rev_object_id' => 'rev_object_id',
    'rev_note' => 'rev_note',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'relations' => 
  array (
    'assets' => 'asset',
    'tags' => 'tag',
  ),
  'options' => 
  array (
    'text' => '20',
    'status' => 'Draft,Review,Approval Pending,Reserved,Publish,Ended',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'workspace_id',
    1 => 'rev_type',
    2 => 'rev_object_id',
    3 => 'rev_changed',
    4 => 'rev_diff',
    5 => 'created_on',
    6 => 'modified_on',
    7 => 'created_by',
    8 => 'modified_by',
  ),
  'unchangeable' => 
  array (
    0 => 'uuid',
    1 => 'workspace_id',
  ),
  'disp_edit' => 
  array (
    'user_id' => 'relation',
    'status' => 'select',
  ),
  'extras' => 
  array (
    'image' => ':1920:resize:image',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'text' => 'richtext',
    'fore_color' => 'text_short',
    'back_color' => 'text_short',
    'image' => 'file',
    'colors' => 'text_short',
    'assets' => 'relation:asset:label:dialog',
    'class' => 'text_short',
    'order' => 'number',
    'user_id' => 'relation:user:nickname:dialog',
    'tags' => 'relation:tag:name:dialog',
    'published_on' => 'datetime',
    'unpublished_on' => 'datetime',
    'status' => 'selection',
    'basename' => 'text_short',
    'uuid' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'class' => 'text',
    'order' => 'number',
    'user_id' => 'reference:user:nickname',
    'previous_owner' => 'reference:user:nickname',
    'tags' => 'reference:tag:name',
    'published_on' => 'date',
    'unpublished_on' => 'date',
    'has_deadline' => 'checkbox',
    'status' => 'number',
    'workspace_id' => 'reference:workspace:name',
    'rev_type' => 'text_short',
    'rev_note' => 'text',
    'rev_diff' => 'popover',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'column_labels' => 
  array (
    'text' => 'Body',
    'fore_color' => 'Fore Color',
    'back_color' => 'Back Color',
    'image' => 'Background Image',
    'colors' => 'Colors',
  ),
  'hide_edit_options' => 
  array (
    0 => 'status',
    1 => 'user_id',
    2 => 'fore_color',
    3 => 'back_color',
    4 => 'published_on',
    5 => 'unpublished_on',
  ),
  'max_revisions' => 20,
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
    'text' => 'Body',
    'fore_color' => 'Fore Color',
    'back_color' => 'Back Color',
    'text_format' => 'Format',
    'image' => 'Background Image',
    'colors' => 'Colors',
    'assets' => 'Assets',
    'class' => 'Class',
    'order' => 'Order',
    'user_id' => 'User',
    'previous_owner' => 'Previous Owner',
    'tags' => 'Tags',
    'published_on' => 'Publish Date',
    'unpublished_on' => 'Unpublish Date',
    'has_deadline' => 'Specify the Deadline',
    'status' => 'Status',
    'basename' => 'Basename',
    'uuid' => 'UUID',
    'workspace_id' => 'WorkSpace',
    'rev_type' => 'Type',
    'rev_object_id' => 'Object ID',
    'rev_changed' => 'Changed',
    'rev_note' => 'Change Note',
    'rev_diff' => 'Diff',
    'created_on' => 'Date Created',
    'modified_on' => 'Date Modified',
    'created_by' => 'Created By',
    'modified_by' => 'Modified By',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'name' => 'Name',
      'text' => 'Body',
      'fore_color' => 'Fore Color',
      'back_color' => 'Back Color',
      'text_format' => 'Format',
      'image' => 'Background Image',
      'colors' => 'Colors',
      'assets' => 'Assets',
      'class' => 'Class',
      'order' => 'Order',
      'user_id' => 'User',
      'previous_owner' => 'Previous Owner',
      'tags' => 'Tags',
      'published_on' => 'Publish Date',
      'unpublished_on' => 'Unpublish Date',
      'has_deadline' => 'Specify the Deadline',
      'status' => 'Status',
      'basename' => 'Basename',
      'uuid' => 'UUID',
      'workspace_id' => 'WorkSpace',
      'rev_type' => 'Type',
      'rev_object_id' => 'Object ID',
      'rev_changed' => 'Changed',
      'rev_note' => 'Change Note',
      'rev_diff' => 'Diff',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
    ),
    'ja' => 
    array (
      'widget' => 'ウィジェット',
      'Widget' => 'ウィジェット',
      'Widgets' => 'ウィジェット',
      'ID' => 'ID',
      'Name' => '名前',
      'Body' => '本文',
      'Fore Color' => '前景色',
      'Back Color' => '背景色',
      'Format' => 'フォーマット',
      'Background Image' => '背景画像',
      'Colors' => '配色',
      'Assets' => 'アセット',
      'Class' => 'クラス',
      'Order' => '表示順',
      'User' => 'ユーザー',
      'Previous Owner' => '直前のユーザー',
      'Tags' => 'タグ',
      'Publish Date' => '公開日',
      'Unpublish Date' => '公開終了日',
      'Specify the Deadline' => '公開終了日を指定',
      'Status' => 'ステータス',
      'Basename' => 'ベースネーム',
      'UUID' => 'UUID',
      'WorkSpace' => 'スペース',
      'Type' => 'タイプ',
      'Object ID' => 'オブジェクトID',
      'Changed' => '変更',
      'Change Note' => '変更メモ',
      'Diff' => '差分',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
    ),
  ),
);