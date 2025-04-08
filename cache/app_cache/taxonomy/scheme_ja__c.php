<?php $this->get_cache=array (
  'label' => '情報分類',
  'plural' => 'Taxonomies',
  'version' => '1.01',
  'primary' => 'name',
  'auditing' => 1,
  'hierarchy' => 1,
  'sortable' => 1,
  'order' => 1,
  'menu_type' => 2,
  'display_system' => 1,
  'template_tags' => 1,
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
    'normalize' => 'normalize',
    'parent_id' => 'parent_id',
    'order' => 'order',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'options' => 
  array (
  ),
  'extras' => 
  array (
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'normalize',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'created_by',
    4 => 'modified_by',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'normalize' => 'text_short',
    'parent_id' => 'relation:category:label:select',
    'order' => 'number',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'normalize' => 'text_short',
    'parent_id' => 'reference:category:label',
    'order' => 'number',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'column_labels' => 
  array (
    'normalize' => 'Normalized',
  ),
  'relations' => 
  array (
  ),
  'unique' => 
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
  'disp_edit' => 
  array (
    'parent_id' => 'relation',
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'name' => 'Name',
    'normalize' => 'Normalized',
    'parent_id' => 'Parent',
    'order' => 'Order',
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
      'parent_id' => 'Parent',
      'order' => 'Order',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
    ),
    'ja' => 
    array (
      'taxonomy' => '情報分類',
      'Taxonomy' => '情報分類',
      'Taxonomies' => '情報分類',
      'ID' => 'ID',
      'Name' => '名前',
      'Normalized' => '正規化',
      'Parent' => '親',
      'Order' => '表示順',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
    ),
  ),
);