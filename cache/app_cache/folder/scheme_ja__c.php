<?php $this->get_cache=array (
  'label' => 'フォルダ',
  'plural' => 'Folders',
  'version' => '1.21',
  'primary' => 'label',
  'auditing' => 1,
  'order' => 140,
  'menu_type' => 6,
  'hierarchy' => 1,
  'sortable' => 1,
  'template_tags' => 1,
  'display_system' => 1,
  'display_space' => 1,
  'has_basename' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'label' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'description' => 
    array (
      'type' => 'text',
    ),
    'parent_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
      'default' => '0',
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'basename' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
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
    'label' => 'label',
    'parent_id' => 'parent_id',
    'order' => 'order',
    'basename' => 'basename',
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
    0 => 'workspace_id',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'created_by',
    4 => 'modified_by',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'label' => 'primary',
    'description' => 'textarea',
    'parent_id' => 'relation:folder:label:select',
    'order' => 'number',
    'basename' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'label' => 'primary',
    'description' => 'text_short',
    'parent_id' => 'reference:folder:label',
    'order' => 'number',
    'basename' => 'text_short',
    'workspace_id' => 'reference:workspace:name',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
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
    'parent_id' => 'relation',
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'label' => 'Label',
    'description' => 'Description',
    'parent_id' => 'Parent',
    'order' => 'Order',
    'basename' => 'Basename',
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
      'label' => 'Label',
      'description' => 'Description',
      'parent_id' => 'Parent',
      'order' => 'Order',
      'basename' => 'Basename',
      'workspace_id' => 'WorkSpace',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
    ),
    'ja' => 
    array (
      'folder' => 'フォルダ',
      'Folder' => 'フォルダ',
      'Folders' => 'フォルダ',
      'ID' => 'ID',
      'Label' => 'ラベル',
      'Description' => '説明',
      'Parent' => '親',
      'Order' => '表示順',
      'Basename' => 'ベースネーム',
      'WorkSpace' => 'スペース',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
    ),
  ),
);