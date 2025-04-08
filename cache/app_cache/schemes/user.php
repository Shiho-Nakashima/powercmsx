<?php $this->get_cache=array (
  'label' => 'User',
  'plural' => 'Users',
  'version' => '2.32',
  'primary' => 'name',
  'display_system' => 1,
  'order' => 80,
  'auditing' => 1,
  'menu_type' => 5,
  'has_status' => 1,
  'default_status' => 2,
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
    'password' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'email' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'nickname' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'photo' => 
    array (
      'type' => 'blob',
    ),
    'text_format' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'space_order' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'color_the_selector' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'fix_spacebar' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 1,
    ),
    'sticky_buttons' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'language' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'control_border' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => NULL,
    ),
    'is_superuser' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'debug' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'develop' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'status' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '2',
    ),
    'created_by' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'lock_out' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'modified_by' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'lock_out_on' => 
    array (
      'type' => 'datetime',
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
    ),
    'last_login_on' => 
    array (
      'type' => 'datetime',
    ),
    'last_login_ip' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'name' => 'name',
    'email' => 'email',
    'nickname' => 'nickname',
    'is_superuser' => 'is_superuser',
    'status' => 'status',
    'created_by' => 'created_by',
    'lock_out' => 'lock_out',
    'modified_by' => 'modified_by',
    'lock_out_on' => 'lock_out_on',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'last_login_on' => 'last_login_on',
  ),
  'unique' => 
  array (
    0 => 'name',
    1 => 'email',
  ),
  'unchangeable' => 
  array (
    0 => 'name',
    1 => 'last_login_on',
    2 => 'last_login_ip',
  ),
  'autoset' => 
  array (
    0 => 'created_by',
    1 => 'modified_by',
    2 => 'lock_out_on',
    3 => 'created_on',
    4 => 'modified_on',
    5 => 'last_login_on',
    6 => 'last_login_ip',
  ),
  'options' => 
  array (
    'photo' => '',
    'text_format' => 'None,Convert Line Breaks,Markdown,RichText',
    'space_order' => 'Default,by Updated',
    'status' => 'Disable,Enable',
  ),
  'extras' => 
  array (
    'photo' => ':::image',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'child_tables' => 
  array (
    0 => 'permission',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'email' => 'text',
    'nickname' => 'text',
    'is_superuser' => 'checkbox',
    'status' => 'number',
    'lock_out' => 'checkbox',
    'modified_by' => 'reference:user:nickname',
    'created_on' => 'date',
    'last_login_on' => 'datetime',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'password' => 'password(hash)',
    'email' => 'text',
    'nickname' => 'text',
    'photo' => 'file',
    'text_format' => 'selection',
    'space_order' => 'selection',
    'color_the_selector' => 'checkbox',
    'fix_spacebar' => 'checkbox',
    'sticky_buttons' => 'checkbox',
    'language' => 'languages',
    'control_border' => 'text',
    'is_superuser' => 'checkbox',
    'status' => 'selection',
    'lock_out' => 'checkbox',
    'lock_out_on' => 'datetime',
    'created_on' => 'datetime',
    'last_login_on' => 'datetime',
    'last_login_ip' => 'text_short',
  ),
  'translate' => 
  array (
    0 => 'text_format',
    1 => 'space_order',
  ),
  'hint' => 
  array (
    'space_order' => 'Specify the display order of the WorkSpace selector of the top of the screen.',
  ),
  'disp_edit' => 
  array (
    'text_format' => 'select',
    'space_order' => 'radio',
  ),
  'column_labels' => 
  array (
    'color_the_selector' => 'Color the WorkSpace Selector',
    'sticky_buttons' => 'Fix Buttons',
  ),
);