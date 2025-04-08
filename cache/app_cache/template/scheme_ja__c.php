<?php $this->get_cache=array (
  'label' => 'ビュー',
  'plural' => 'Views',
  'version' => '2.4',
  'auditing' => 1,
  'display_system' => 1,
  'order' => 130,
  'primary' => 'name',
  'menu_type' => 6,
  'revisable' => 1,
  'template_tags' => 1,
  'display_space' => 1,
  'has_basename' => 1,
  'has_status' => 1,
  'has_form' => 1,
  'default_status' => 2,
  'sortable' => 1,
  'has_uuid' => 1,
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
    'subject' => 
    array (
      'type' => 'text',
    ),
    'form_id' => 
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
    'basename' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'linked_file' => 
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
    'compiled' => 
    array (
      'type' => 'text',
    ),
    'cache_key' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'uuid' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'last_compiled' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'name' => 'name',
    'form_id' => 'form_id',
    'status' => 'status',
    'basename' => 'basename',
    'order' => 'order',
    'linked_file' => 'linked_file',
    'rev_note' => 'rev_note',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'workspace_id' => 'workspace_id',
    'rev_type' => 'rev_type',
    'rev_object_id' => 'rev_object_id',
    'cache_key' => 'cache_key',
    'uuid' => 'uuid',
    'last_compiled' => 'last_compiled',
  ),
  'sort_by' => 
  array (
    'order' => 'ascend',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
    1 => 'uuid',
  ),
  'unique' => 
  array (
    0 => 'name',
    1 => 'linked_file',
  ),
  'disp_edit' => 
  array (
    'form_id' => 'relation',
    'class' => 'select',
    'status' => 'select',
  ),
  'autoset' => 
  array (
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
    4 => 'rev_type',
    5 => 'rev_object_id',
    6 => 'rev_changed',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'text' => 'textarea',
    'subject' => 'text',
    'form_id' => 'relation:form:name:dialog',
    'class' => 'selection',
    'status' => 'selection',
    'basename' => 'text_short',
    'order' => 'number',
    'linked_file' => 'text',
    'uuid' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'form_id' => 'reference:form:name',
    'class' => 'text_short',
    'status' => 'number',
    'basename' => 'text_short',
    'order' => 'number',
    'rev_note' => 'text',
    'rev_diff' => 'popover',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
    'workspace_id' => 'reference:workspace:name',
    'rev_type' => 'text_short',
    'rev_changed' => 'text',
  ),
  'default_list_items' => 
  array (
    0 => 'name',
    1 => 'class',
    2 => 'status',
    3 => 'basename',
    4 => 'order',
    5 => 'template_id',
    6 => 'modified_on',
    7 => 'modified_by',
    8 => 'workspace_id',
  ),
  'options' => 
  array (
    'class' => 'Archive,Module,Form,Search,Member,Mail,Backup',
    'status' => 'Disable,Enable',
  ),
  'column_labels' => 
  array (
    'form_id' => 'Form',
    'linked_file' => 'Link to File',
  ),
  'translate' => 
  array (
    0 => 'class',
  ),
  'max_revisions' => 20,
  'relations' => 
  array (
  ),
  'extras' => 
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
    'text' => 'Text',
    'subject' => 'Subject',
    'form_id' => 'Form',
    'class' => 'Class',
    'status' => 'Status',
    'basename' => 'Basename',
    'order' => 'Order',
    'linked_file' => 'Link to File',
    'rev_note' => 'Change Note',
    'rev_diff' => 'Diff',
    'created_on' => 'Date Created',
    'modified_on' => 'Date Modified',
    'created_by' => 'Created By',
    'modified_by' => 'Modified By',
    'workspace_id' => 'WorkSpace',
    'rev_type' => 'Type',
    'rev_object_id' => 'Object ID',
    'rev_changed' => 'Changed',
    'compiled' => 'Compiled',
    'cache_key' => 'Cache Key',
    'uuid' => 'UUID',
    'last_compiled' => 'Last Compiled',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'name' => 'Name',
      'text' => 'Text',
      'subject' => 'Subject',
      'form_id' => 'Form',
      'class' => 'Class',
      'status' => 'Status',
      'basename' => 'Basename',
      'order' => 'Order',
      'linked_file' => 'Link to File',
      'rev_note' => 'Change Note',
      'rev_diff' => 'Diff',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
      'workspace_id' => 'WorkSpace',
      'rev_type' => 'Type',
      'rev_object_id' => 'Object ID',
      'rev_changed' => 'Changed',
      'compiled' => 'Compiled',
      'cache_key' => 'Cache Key',
      'uuid' => 'UUID',
      'last_compiled' => 'Last Compiled',
    ),
    'ja' => 
    array (
      'template' => 'ビュー',
      'View' => 'ビュー',
      'Views' => 'ビュー',
      'ID' => 'ID',
      'Name' => '名前',
      'Text' => '本文',
      'Subject' => '件名',
      'Form' => 'フォーム',
      'Class' => 'クラス',
      'Status' => 'ステータス',
      'Basename' => 'ベースネーム',
      'Order' => '表示順',
      'Link to File' => 'ファイルへのリンク',
      'Change Note' => '変更メモ',
      'Diff' => '差分',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
      'WorkSpace' => 'スペース',
      'Type' => 'タイプ',
      'Object ID' => 'オブジェクトID',
      'Changed' => '変更',
      'Compiled' => 'コンパイル済',
      'Cache Key' => 'キャッシュ・キー',
      'UUID' => 'UUID',
      'Last Compiled' => '最終コンパイル',
    ),
  ),
);