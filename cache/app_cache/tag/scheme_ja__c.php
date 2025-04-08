<?php $this->get_cache=array (
  'label' => 'タグ',
  'plural' => 'Tags',
  'version' => '1.81',
  'auditing' => 1,
  'display_system' => 1,
  'sortable' => 1,
  'order' => 131,
  'primary' => 'name',
  'menu_type' => 2,
  'template_tags' => 1,
  'display_space' => 1,
  'dialog_view' => 1,
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
    'normalize' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 50,
      'not_null' => 1,
    ),
    'order' => 
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
    'name' => 'name',
    'normalize' => 'normalize',
    'class' => 'class',
    'order' => 'order',
    'workspace_id' => 'workspace_id',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'normalize',
    1 => 'workspace_id',
    2 => 'created_on',
    3 => 'modified_on',
    4 => 'created_by',
    5 => 'modified_by',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'normalize' => 'text',
    'class' => 'text_short',
    'order' => 'number',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'normalize' => 'text',
    'class' => 'text_short',
    'order' => 'number',
    'workspace_id' => 'reference:workspace:name',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'translate' => 
  array (
    0 => 'table_id',
  ),
  'column_labels' => 
  array (
    'class' => 'Model',
  ),
  'relations' => 
  array (
  ),
  'options' => 
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
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'name' => 'Name',
    'normalize' => 'Normalized',
    'class' => 'Model',
    'order' => 'Order',
    'workspace_id' => 'WorkSpace',
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
      'normalize' => 'Normalized',
      'class' => 'Model',
      'order' => 'Order',
      'workspace_id' => 'WorkSpace',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
    ),
    'ja' => 
    array (
      'tag' => 'タグ',
      'Tag' => 'タグ',
      'Tags' => 'タグ',
      'ID' => 'ID',
      'Name' => '名前',
      'Normalized' => '正規化',
      'Model' => 'モデル',
      'Order' => '表示順',
      'WorkSpace' => 'スペース',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
    ),
  ),
);