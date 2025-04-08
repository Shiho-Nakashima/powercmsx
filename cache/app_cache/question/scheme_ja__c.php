<?php $this->get_cache=array (
  'label' => '設問',
  'plural' => 'Questions',
  'version' => '2.1',
  'primary' => 'label',
  'auditing' => 1,
  'order' => 360,
  'sortable' => 1,
  'menu_type' => 4,
  'template_tags' => 1,
  'display_space' => 1,
  'has_basename' => 1,
  'has_uuid' => 1,
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
    'label' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'description' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'questiontype_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'hint' => 
    array (
      'type' => 'text',
    ),
    'required' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'is_primary' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'is_name' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'validation_type' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'reply_to' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'normarize' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'normalize' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'delete_lb' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'format' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'maxlength' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'multi_byte' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'hide_in_email' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'aggregate' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'template' => 
    array (
      'type' => 'text',
    ),
    'rows' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'count_fields' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'multiple' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'connector' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'options' => 
    array (
      'type' => 'text',
    ),
    'unit' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'values' => 
    array (
      'type' => 'text',
    ),
    'aria_label' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'placeholder' => 
    array (
      'type' => 'text',
    ),
    'default_value' => 
    array (
      'type' => 'text',
    ),
    'attach_to_email' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
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
    'uuid' => 
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
    'id' => 'id',
    'label' => 'label',
    'description' => 'description',
    'questiontype_id' => 'questiontype_id',
    'basename' => 'basename',
    'order' => 'order',
    'workspace_id' => 'workspace_id',
    'rev_type' => 'rev_type',
    'rev_object_id' => 'rev_object_id',
    'rev_note' => 'rev_note',
    'uuid' => 'uuid',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'translate' => 
  array (
    0 => 'questiontype_id',
    1 => 'validation_type',
    2 => 'connector',
    3 => 'aria_label',
  ),
  'hint' => 
  array (
    'connector' => 'Combine multiple fields with connectors.',
    'options' => 'Please enter all allowable options for this field as a comma separated list.',
    'values' => 'If you want to receive a value different from the value entered for the options, please enter alternative comma separated list.',
    'aria_label' => 'Specify the aria-label attribute to be specified for the form control. When there are multiple controls, specify them by separating them with commas.',
  ),
  'options' => 
  array (
    'validation_type' => 'Email,Selected Items,Tel,Postal Code,URL,Date,Date & Time,Hiragana,Katakana,Number,Alphanumeric Symbols,Email (Confirm),Password',
    'multi_byte' => 'Multi-Byte',
    'template' => '10',
    'default_value' => '3',
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
    0 => 'workspace_id',
    1 => 'uuid',
  ),
  'disp_edit' => 
  array (
    'questiontype_id' => 'relation',
    'validation_type' => 'select',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'label' => 'primary',
    'description' => 'text',
    'questiontype_id' => 'relation:questiontype:name:select',
    'hint' => 'text',
    'validation_type' => 'selection',
    'maxlength' => 'number',
    'hide_in_email' => 'checkbox',
    'template' => 'textarea',
    'rows' => 'number',
    'count_fields' => 'number',
    'connector' => 'text_short',
    'options' => 'text',
    'values' => 'text',
    'aria_label' => 'text',
    'placeholder' => 'text',
    'default_value' => 'textarea',
    'basename' => 'text_short',
    'order' => 'number',
    'uuid' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'label' => 'primary',
    'description' => 'text',
    'questiontype_id' => 'reference:questiontype:name',
    'required' => 'checkbox',
    'is_primary' => 'checkbox',
    'is_name' => 'checkbox',
    'validation_type' => 'text_short',
    'aggregate' => 'checkbox',
    'options' => 'text_short',
    'basename' => 'text_short',
    'order' => 'number',
    'workspace_id' => 'reference:workspace:name',
    'rev_type' => 'text_short',
    'rev_note' => 'text',
    'rev_diff' => 'popover',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'column_labels' => 
  array (
    'is_name' => 'Name',
    'attach_to_email' => 'Attach to Email',
    'reply_to' => 'Reply-To',
    'delete_lb' => 'Delete Line Breaks',
    'aria_label' => 'aria-label',
  ),
  'max_revisions' => 20,
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
  'labels' => 
  array (
    'id' => 'ID',
    'label' => 'Label',
    'description' => 'Description',
    'questiontype_id' => 'Question Type',
    'hint' => 'Hint',
    'required' => 'Required',
    'is_primary' => 'Primary',
    'is_name' => 'Name',
    'validation_type' => 'Validation',
    'reply_to' => 'Reply-To',
    'normarize' => 'Normarize',
    'normalize' => 'Normalized',
    'delete_lb' => 'Delete Line Breaks',
    'format' => 'Format',
    'maxlength' => 'Max Length',
    'multi_byte' => 'Multi-Byte',
    'hide_in_email' => 'Hide in email',
    'aggregate' => 'Aggregate',
    'template' => 'View',
    'rows' => 'Rows',
    'count_fields' => 'Count of Fields',
    'multiple' => 'Multiple',
    'connector' => 'Connector',
    'options' => 'Options',
    'unit' => 'Unit',
    'values' => 'Values',
    'aria_label' => 'aria-label',
    'placeholder' => 'placeholder',
    'default_value' => 'Default Value',
    'attach_to_email' => 'Attach to Email',
    'basename' => 'Basename',
    'order' => 'Order',
    'workspace_id' => 'WorkSpace',
    'rev_type' => 'Type',
    'rev_object_id' => 'Object ID',
    'rev_changed' => 'Changed',
    'rev_note' => 'Change Note',
    'rev_diff' => 'Diff',
    'uuid' => 'UUID',
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
      'questiontype_id' => 'Question Type',
      'hint' => 'Hint',
      'required' => 'Required',
      'is_primary' => 'Primary',
      'is_name' => 'Name',
      'validation_type' => 'Validation',
      'reply_to' => 'Reply-To',
      'normarize' => 'Normarize',
      'normalize' => 'Normalized',
      'delete_lb' => 'Delete Line Breaks',
      'format' => 'Format',
      'maxlength' => 'Max Length',
      'multi_byte' => 'Multi-Byte',
      'hide_in_email' => 'Hide in email',
      'aggregate' => 'Aggregate',
      'template' => 'View',
      'rows' => 'Rows',
      'count_fields' => 'Count of Fields',
      'multiple' => 'Multiple',
      'connector' => 'Connector',
      'options' => 'Options',
      'unit' => 'Unit',
      'values' => 'Values',
      'aria_label' => 'aria-label',
      'placeholder' => 'placeholder',
      'default_value' => 'Default Value',
      'attach_to_email' => 'Attach to Email',
      'basename' => 'Basename',
      'order' => 'Order',
      'workspace_id' => 'WorkSpace',
      'rev_type' => 'Type',
      'rev_object_id' => 'Object ID',
      'rev_changed' => 'Changed',
      'rev_note' => 'Change Note',
      'rev_diff' => 'Diff',
      'uuid' => 'UUID',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
    ),
    'ja' => 
    array (
      'question' => '設問',
      'Question' => '設問',
      'Questions' => '設問',
      'ID' => 'ID',
      'Label' => 'ラベル',
      'Description' => '説明',
      'Question Type' => '設問タイプ',
      'Hint' => 'ヒント',
      'Required' => '必須',
      'Primary' => 'プライマリ',
      'Name' => '名前',
      'Validation' => 'バリデーション',
      'Reply-To' => 'Reply-To',
      'Normarize' => 'Normarize',
      'Normalized' => '正規化',
      'Delete Line Breaks' => '改行を削除する',
      'Format' => 'フォーマット',
      'Max Length' => 'テキスト長',
      'Multi-Byte' => 'マルチバイト',
      'Hide in email' => 'メールには情報を含めない',
      'Aggregate' => '集計する',
      'View' => 'ビュー',
      'Rows' => '行の高さ',
      'Count of Fields' => 'フィールド数',
      'Multiple' => '複数',
      'Connector' => 'コネクタ',
      'Options' => 'オプション',
      'Unit' => 'ユニット',
      'Values' => '値',
      'aria-label' => 'aria-label',
      'placeholder' => 'placeholder',
      'Default Value' => '初期値',
      'Attach to Email' => 'メールに添付',
      'Basename' => 'ベースネーム',
      'Order' => '表示順',
      'WorkSpace' => 'スペース',
      'Type' => 'タイプ',
      'Object ID' => 'オブジェクトID',
      'Changed' => '変更',
      'Change Note' => '変更メモ',
      'Diff' => '差分',
      'UUID' => 'UUID',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
    ),
  ),
);