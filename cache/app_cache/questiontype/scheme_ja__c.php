<?php $this->get_cache=array (
  'label' => '設問タイプ',
  'plural' => 'Question Types',
  'version' => '1.75',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 370,
  'sortable' => 1,
  'menu_type' => 4,
  'has_basename' => 1,
  'revisable' => 1,
  'display_system' => 1,
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
    'template' => 
    array (
      'type' => 'text',
    ),
    'aria_label' => 
    array (
      'type' => 'string',
      'size' => 255,
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
    'class' => 
    array (
      'type' => 'string',
      'size' => 255,
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
      'not_null' => 1,
      'default' => '0',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'name' => 'name',
    'order' => 'order',
    'basename' => 'basename',
    'rev_type' => 'rev_type',
    'rev_object_id' => 'rev_object_id',
    'rev_note' => 'rev_note',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'translate' => 
  array (
    0 => 'name',
    1 => 'aria_label',
  ),
  'options' => 
  array (
    'template' => '10',
    'class' => 'text,textarea,text_input_group,radio,checkbox,checkboxes,dropdown,date,file,email_with_confirm,hidden,password',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'rev_type',
    1 => 'rev_object_id',
    2 => 'rev_changed',
    3 => 'rev_diff',
    4 => 'created_on',
    5 => 'modified_on',
    6 => 'created_by',
    7 => 'modified_by',
  ),
  'unique' => 
  array (
    0 => 'name',
  ),
  'hint' => 
  array (
    'aria_label' => 'Specify the aria-label attribute to be specified for the form control. When there are multiple controls, specify them by separating them with commas.',
    'class' => 'Please select the basename of the question type to be customized.',
  ),
  'disp_edit' => 
  array (
    'class' => 'select',
  ),
  'column_labels' => 
  array (
    'aria_label' => 'aria-label',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'template' => 'textarea',
    'aria_label' => 'text',
    'order' => 'number',
    'basename' => 'text_short',
    'class' => 'selection',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'order' => 'number',
    'basename' => 'text_short',
    'rev_note' => 'text',
    'rev_diff' => 'popover',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'max_revisions' => 20,
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
    'name' => 'Name',
    'template' => 'View',
    'aria_label' => 'aria-label',
    'order' => 'Order',
    'basename' => 'Basename',
    'class' => 'Class',
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
      'template' => 'View',
      'aria_label' => 'aria-label',
      'order' => 'Order',
      'basename' => 'Basename',
      'class' => 'Class',
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
      'questiontype' => '設問タイプ',
      'Question Type' => '設問タイプ',
      'Question Types' => '設問タイプ',
      'ID' => 'ID',
      'Name' => '名前',
      'View' => 'ビュー',
      'aria-label' => 'aria-label',
      'Order' => '表示順',
      'Basename' => 'ベースネーム',
      'Class' => 'クラス',
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