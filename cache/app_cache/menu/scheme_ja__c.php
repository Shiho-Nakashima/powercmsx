<?php $this->get_cache=array (
  'version' => '1.5',
  'label' => 'メニュー',
  'plural' => 'Menus',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 450,
  'sortable' => 1,
  'hierarchy' => 1,
  'menu_type' => 6,
  'display_space' => 1,
  'display_system' => 1,
  'has_basename' => 1,
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
    'urls' => 
    array (
      'type' => 'relation',
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'parent_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
      'default' => '0',
    ),
    'meta' => 
    array (
      'type' => 'text',
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
    ),
    'basename' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
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
    'order' => 'order',
    'parent_id' => 'parent_id',
    'workspace_id' => 'workspace_id',
    'basename' => 'basename',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'relations' => 
  array (
    'urls' => 'urlinfo',
  ),
  'sort_by' => 
  array (
    'order' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'workspace_id',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'created_by',
    4 => 'modified_by',
  ),
  'unique' => 
  array (
    0 => 'name',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'urls' => 'relation:urlinfo:url:dialog',
    'order' => 'number',
    'parent_id' => 'relation:menu:name:select',
    'basename' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'order' => 'number',
    'parent_id' => 'reference:menu:name',
    'workspace_id' => 'reference:workspace:name',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'column_labels' => 
  array (
    'urls' => 'Archives',
    'meta' => 'Metadata',
  ),
  'hide_edit_options' => 
  array (
    0 => 'urls',
  ),
  'options' => 
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
  'disp_edit' => 
  array (
    'parent_id' => 'relation',
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'name' => 'Name',
    'urls' => 'Archives',
    'order' => 'Order',
    'parent_id' => 'Parent',
    'meta' => 'Metadata',
    'workspace_id' => 'WorkSpace',
    'basename' => 'Basename',
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
      'urls' => 'Archives',
      'order' => 'Order',
      'parent_id' => 'Parent',
      'meta' => 'Metadata',
      'workspace_id' => 'WorkSpace',
      'basename' => 'Basename',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
    ),
    'ja' => 
    array (
      'menu' => 'メニュー',
      'Menu' => 'メニュー',
      'Menus' => 'メニュー',
      'ID' => 'ID',
      'Name' => '名前',
      'Archives' => 'アーカイブ',
      'Order' => '表示順',
      'Parent' => '親',
      'Metadata' => 'メタデータ',
      'WorkSpace' => 'スペース',
      'Basename' => 'ベースネーム',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
    ),
  ),
);