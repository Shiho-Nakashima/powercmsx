<?php $this->get_cache=array (
  'label' => '記事',
  'plural' => 'Entries',
  'version' => '2.31',
  'primary' => 'title',
  'display_system' => 1,
  'auditing' => 1,
  'order' => 10,
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
  'allow_comment' => 1,
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
    ),
    'assets' => 
    array (
      'type' => 'relation',
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
    'categories' => 
    array (
      'type' => 'relation',
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
    'allow_comment' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
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
      'default' => '0',
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
    'assets' => 'asset',
    'categories' => 'category',
    'tags' => 'tag',
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
    0 => 'categories',
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
    'assets' => 'relation:asset:label:dialog',
    'text_more' => 'textarea',
    'excerpt' => 'textarea',
    'keywords' => 'text',
    'categories' => 'relation:category:label:hierarchy',
    'tags' => 'relation:tag:name:dialog',
    'basename' => 'text_short',
    'status' => 'selection',
    'published_on' => 'datetime',
    'unpublished_on' => 'datetime',
    'user_id' => 'relation:user:nickname:dialog',
    'allow_comment' => 'hidden',
    'uuid' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'title' => 'primary',
    'categories' => 'reference:category:label',
    'tags' => 'reference:tag:name',
    'extra_path' => 'text_short',
    'basename' => 'text_short',
    'status' => 'number',
    'has_deadline' => 'checkbox',
    'published_on' => 'date',
    'unpublished_on' => 'date',
    'rev_note' => 'text',
    'rev_diff' => 'popover',
    'rev_type' => 'text_short',
    'user_id' => 'reference:user:nickname',
    'previous_owner' => 'reference:user:nickname',
    'rev_changed' => 'text',
    'modified_on' => 'datetime',
    'created_by' => 'reference:user:nickname',
    'modified_by' => 'reference:user:nickname',
    'workspace_id' => 'reference:workspace:name',
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
    'text' => '20',
    'text_more' => '7',
    'status' => 'Draft,Review,Approval Pending,Reserved,Publish,Ended',
  ),
  'column_labels' => 
  array (
    'extra_path' => 'Path',
  ),
  'max_revisions' => 20,
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
  'disp_edit' => 
  array (
    'user_id' => 'relation',
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'title' => 'Title',
    'text' => 'Body',
    'text_format' => 'Text Format',
    'assets' => 'Assets',
    'text_more' => 'More',
    'excerpt' => 'Excerpt',
    'keywords' => 'Keywords',
    'categories' => 'Categories',
    'tags' => 'Tags',
    'extra_path' => 'Path',
    'basename' => 'Basename',
    'status' => 'Status',
    'has_deadline' => 'Specify the Deadline',
    'published_on' => 'Publish Date',
    'unpublished_on' => 'Unpublish Date',
    'rev_note' => 'Change Note',
    'rev_diff' => 'Diff',
    'rev_type' => 'Type',
    'user_id' => 'User',
    'previous_owner' => 'Previous Owner',
    'rev_changed' => 'Changed',
    'allow_comment' => 'Accept Comments',
    'created_on' => 'Date Created',
    'modified_on' => 'Date Modified',
    'created_by' => 'Created By',
    'modified_by' => 'Modified By',
    'workspace_id' => 'WorkSpace',
    'rev_object_id' => 'Object ID',
    'uuid' => 'UUID',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'title' => 'Title',
      'text' => 'Body',
      'text_format' => 'Text Format',
      'assets' => 'Assets',
      'text_more' => 'More',
      'excerpt' => 'Excerpt',
      'keywords' => 'Keywords',
      'categories' => 'Categories',
      'tags' => 'Tags',
      'extra_path' => 'Path',
      'basename' => 'Basename',
      'status' => 'Status',
      'has_deadline' => 'Specify the Deadline',
      'published_on' => 'Publish Date',
      'unpublished_on' => 'Unpublish Date',
      'rev_note' => 'Change Note',
      'rev_diff' => 'Diff',
      'rev_type' => 'Type',
      'user_id' => 'User',
      'previous_owner' => 'Previous Owner',
      'rev_changed' => 'Changed',
      'allow_comment' => 'Accept Comments',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
      'workspace_id' => 'WorkSpace',
      'rev_object_id' => 'Object ID',
      'uuid' => 'UUID',
    ),
    'ja' => 
    array (
      'entry' => '記事',
      'Entry' => '記事',
      'Entries' => '記事',
      'ID' => 'ID',
      'Title' => 'タイトル',
      'Body' => '本文',
      'Text Format' => 'フォーマット',
      'Assets' => 'アセット',
      'More' => '続き',
      'Excerpt' => '概要',
      'Keywords' => 'キーワード',
      'Categories' => 'カテゴリ',
      'Tags' => 'タグ',
      'Path' => 'パス',
      'Basename' => 'ベースネーム',
      'Status' => 'ステータス',
      'Specify the Deadline' => '公開終了日を指定',
      'Publish Date' => '公開日',
      'Unpublish Date' => '公開終了日',
      'Change Note' => '変更メモ',
      'Diff' => '差分',
      'Type' => 'タイプ',
      'User' => 'ユーザー',
      'Previous Owner' => '直前のユーザー',
      'Changed' => '変更',
      'Accept Comments' => 'コメントを許可',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
      'WorkSpace' => 'スペース',
      'Object ID' => 'オブジェクトID',
      'UUID' => 'UUID',
    ),
  ),
);