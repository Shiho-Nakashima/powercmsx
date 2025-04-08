<?php $this->get_cache=array (
  'label' => 'フレーズ',
  'plural' => 'Phrases',
  'version' => '1.3',
  'primary' => 'phrase',
  'display_system' => 1,
  'sortable' => true,
  'order' => 120,
  'auditing' => 1,
  'menu_type' => 2,
  'template_tags' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'phrase' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'trans' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'lang' => 
    array (
      'type' => 'string',
      'size' => 60,
      'not_null' => 1,
    ),
    'component' => 
    array (
      'type' => 'string',
      'size' => 255,
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
    'phrase' => 'phrase',
    'trans' => 'trans',
    'lang' => 'lang',
    'component' => 'component',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'unique' => 
  array (
  ),
  'unchangeable' => 
  array (
    0 => 'component',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'child_tables' => 
  array (
    0 => 'column',
  ),
  'translate' => 
  array (
    0 => 'label',
    1 => 'plural',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'phrase' => 'primary',
    'trans' => 'text_short',
    'lang' => 'text_short',
    'component' => 'text_short',
    'created_on' => 'date',
    'modified_on' => 'date',
  ),
  'hide_edit_options' => 
  array (
    0 => 'label',
    1 => 'plural',
    2 => 'primary',
    3 => 'version',
    4 => 'display_system',
    5 => 'display_space',
    6 => 'space_child',
    7 => 'not_delete',
  ),
  'autoset' => 
  array (
    0 => 'component',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'created_by',
    4 => 'modified_by',
  ),
  'options' => 
  array (
  ),
  'disp_edit' => 
  array (
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'phrase' => 'primary',
    'trans' => 'text',
    'lang' => 'languages',
    'component' => 'text_short',
  ),
  'column_labels' => 
  array (
    'allow_identical' => 'Allow Identical Basename',
    'text_format' => 'Format',
  ),
  'can_duplicate' => 1,
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
    'phrase' => 'Phrase',
    'trans' => 'Translate',
    'lang' => 'Language',
    'component' => 'Component',
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
      'phrase' => 'Phrase',
      'trans' => 'Translate',
      'lang' => 'Language',
      'component' => 'Component',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
    ),
    'ja' => 
    array (
      'phrase' => 'フレーズ',
      'Phrase' => 'フレーズ',
      'Phrases' => 'フレーズ',
      'ID' => 'ID',
      'Translate' => '翻訳',
      'Language' => '言語',
      'Component' => 'コンポーネント',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
    ),
  ),
);