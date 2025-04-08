<?php $this->get_cache=array (
  'label' => 'コメント',
  'plural' => 'Comments',
  'version' => '1.7',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 460,
  'hierarchy' => 1,
  'menu_type' => 4,
  'template_tags' => 1,
  'display_system' => 1,
  'display_space' => 1,
  'has_status' => 1,
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
    'subject' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'text' => 
    array (
      'type' => 'text',
      'not_null' => 1,
    ),
    'email' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'url' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'remote_ip' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'contributor_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'contributor_type' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'parent_id' => 
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
    'created_by' => 
    array (
      'type' => 'int',
      'size' => 11,
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
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'name' => 'name',
    'subject' => 'subject',
    'email' => 'email',
    'url' => 'url',
    'remote_ip' => 'remote_ip',
    'object_id' => 'object_id',
    'model' => 'model',
    'contributor_id' => 'contributor_id',
    'contributor_type' => 'contributor_type',
    'parent_id' => 'parent_id',
    'status' => 'status',
    'created_on' => 'created_on',
    'created_by' => 'created_by',
    'modified_on' => 'modified_on',
    'modified_by' => 'modified_by',
    'workspace_id' => 'workspace_id',
  ),
  'options' => 
  array (
    'text' => '15',
    'status' => 'Disable,Enable',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'autoset' => 
  array (
    0 => 'name',
    1 => 'subject',
    2 => 'text',
    3 => 'email',
    4 => 'url',
    5 => 'object_id',
    6 => 'model',
    7 => 'contributor_id',
    8 => 'contributor_type',
    9 => 'created_on',
    10 => 'created_by',
    11 => 'modified_on',
    12 => 'modified_by',
    13 => 'workspace_id',
  ),
  'unchangeable' => 
  array (
    0 => 'remote_ip',
    1 => 'object_id',
    2 => 'contributor_id',
    3 => 'contributor_type',
    4 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'subject' => 'primary',
    'text' => 'textarea',
    'email' => 'text',
    'url' => 'text',
    'remote_ip' => 'text',
    'object_id' => 'reference:__any__:__primary__',
    'model' => 'text',
    'contributor_id' => 'text_short',
    'contributor_type' => 'hidden',
    'parent_id' => 'relation:comment:name:select',
    'status' => 'selection',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'subject' => 'text',
    'text' => 'text',
    'email' => 'text',
    'url' => 'text',
    'remote_ip' => 'text',
    'object_id' => 'reference:__any__:__primary__',
    'model' => 'text',
    'contributor_id' => 'text_short',
    'parent_id' => 'reference:comment:name',
    'status' => 'number',
    'created_on' => 'datetime',
    'created_by' => 'reference:user:nickname',
    'modified_by' => 'reference:user:nickname',
    'workspace_id' => 'reference:workspace:name',
  ),
  'default_list_items' => 
  array (
    0 => 'id',
    1 => 'name',
    2 => 'email',
    3 => 'text',
    4 => 'object_id',
    5 => 'model',
    6 => 'status',
    7 => 'created_on',
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
  'disp_edit' => 
  array (
    'parent_id' => 'relation',
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'name' => 'Name',
    'subject' => 'Subject',
    'text' => 'Text',
    'email' => 'Email',
    'url' => 'URL',
    'remote_ip' => 'Remote IP',
    'object_id' => 'Object ID',
    'model' => 'Model',
    'contributor_id' => 'Commenter',
    'contributor_type' => 'Commenter Type',
    'parent_id' => 'Parent',
    'status' => 'Status',
    'created_on' => 'Date Created',
    'created_by' => 'Created By',
    'modified_on' => 'Date Modified',
    'modified_by' => 'Modified By',
    'workspace_id' => 'WorkSpace',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'name' => 'Name',
      'subject' => 'Subject',
      'text' => 'Text',
      'email' => 'Email',
      'url' => 'URL',
      'remote_ip' => 'Remote IP',
      'object_id' => 'Object ID',
      'model' => 'Model',
      'contributor_id' => 'Commenter',
      'contributor_type' => 'Commenter Type',
      'parent_id' => 'Parent',
      'status' => 'Status',
      'created_on' => 'Date Created',
      'created_by' => 'Created By',
      'modified_on' => 'Date Modified',
      'modified_by' => 'Modified By',
      'workspace_id' => 'WorkSpace',
    ),
    'ja' => 
    array (
      'comment' => 'コメント',
      'Comment' => 'コメント',
      'Comments' => 'コメント',
      'ID' => 'ID',
      'Name' => '名前',
      'Subject' => '件名',
      'Text' => '本文',
      'Email' => 'メールアドレス',
      'URL' => 'URL',
      'Remote IP' => 'IPアドレス',
      'Object ID' => 'オブジェクトID',
      'Model' => 'モデル',
      'Commenter' => 'コメント投稿者',
      'Commenter Type' => '投稿者タイプ',
      'Parent' => '親',
      'Status' => 'ステータス',
      'Date Created' => '作成日',
      'Created By' => '作成者',
      'Date Modified' => '更新日',
      'Modified By' => '更新者',
      'WorkSpace' => 'スペース',
    ),
  ),
);