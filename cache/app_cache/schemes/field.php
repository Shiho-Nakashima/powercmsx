<?php $this->get_cache=array (
  'label' => 'Field',
  'plural' => 'Fields',
  'version' => '1.5',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 181,
  'sortable' => 1,
  'display_system' => 1,
  'menu_type' => 2,
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
    'name' => 
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
    'translate' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'fieldtype_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'label' => 
    array (
      'type' => 'text',
    ),
    'hide_label' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'content' => 
    array (
      'type' => 'text',
    ),
    'models' => 
    array (
      'type' => 'relation',
    ),
    'options' => 
    array (
      'type' => 'text',
    ),
    'options_labels' => 
    array (
      'type' => 'text',
    ),
    'required' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'display' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'translate_labels' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'multiple' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
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
      'default' => 0,
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
    'fieldtype_id' => 'fieldtype_id',
    'display' => 'display',
    'order' => 'order',
    'basename' => 'basename',
    'workspace_id' => 'workspace_id',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'translate' => 
  array (
    0 => 'fieldtype_id',
    1 => 'models',
  ),
  'hint' => 
  array (
    'translate' => 'Translate to the user\'s language.',
    'options' => 'Comma separated values. The value is stored in the variable \'field_option\' in the loop of the template variable \'field_options\'.',
    'options_labels' => 'Comma separated values. The value is stored in the variable \'field_label\' in the loop of the template variable \'field_options\'.',
    'display' => 'Even if you do not specify it, you can add it in the edit screen.',
    'translate_labels' => 'Translate labels to the user\'s language.',
    'multiple' => 'The input field can be increased or decreased dynamically.',
  ),
  'relations' => 
  array (
    'models' => 'table',
  ),
  'options' => 
  array (
    'label' => '10',
    'content' => '18',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
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
    1 => 'basename',
  ),
  'unchangeable' => 
  array (
    0 => 'fieldtype_id',
    1 => 'workspace_id',
  ),
  'hide_edit_options' => 
  array (
    0 => 'fieldtype_id',
    1 => 'label',
    2 => 'hide_label',
    3 => 'content',
    4 => 'models',
    5 => 'options',
    6 => 'options_labels',
    7 => 'required',
    8 => 'translate_labels',
    9 => 'display',
    10 => 'multiple',
    11 => 'basename',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'translate' => 'checkbox',
    'fieldtype_id' => 'relation:fieldtype:name:select',
    'label' => 'textarea',
    'hide_label' => 'checkbox',
    'content' => 'textarea',
    'models' => 'relation:table:label:dialog',
    'options' => 'text',
    'options_labels' => 'text',
    'required' => 'checkbox',
    'translate_labels' => 'checkbox',
    'display' => 'checkbox',
    'multiple' => 'checkbox',
    'order' => 'number',
    'basename' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'basename' => 'text',
    'translate' => 'checkbox',
    'fieldtype_id' => 'reference:fieldtype:name',
    'models' => 'reference:table:label',
    'options' => 'text',
    'options_labels' => 'text',
    'required' => 'checkbox',
    'translate_labels' => 'checkbox',
    'display' => 'checkbox',
    'multiple' => 'checkbox',
    'order' => 'number',
    'workspace_id' => 'reference:workspace:name',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'column_labels' => 
  array (
    'display' => 'Display in Edit Screen',
  ),
);