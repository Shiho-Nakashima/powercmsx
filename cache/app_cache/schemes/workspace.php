<?php $this->get_cache=array (
  'label' => 'WorkSpace',
  'plural' => 'WorkSpaces',
  'version' => '2.55',
  'primary' => 'name',
  'display_system' => 1,
  'sortable' => true,
  'order' => 20,
  'auditing' => 1,
  'menu_type' => 2,
  'template_tags' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => '11',
    ),
    'name' => 
    array (
      'type' => 'string',
      'not_null' => 1,
      'size' => 255,
    ),
    'description' => 
    array (
      'type' => 'text',
    ),
    'copyright' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'site_url' => 
    array (
      'type' => 'string',
      'not_null' => 1,
      'size' => '255',
    ),
    'site_path' => 
    array (
      'type' => 'string',
      'not_null' => 1,
      'size' => '255',
    ),
    'image' => 
    array (
      'type' => 'blob',
    ),
    'timezone' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'document_root' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'extra_path' => 
    array (
      'type' => 'string',
      'size' => '255',
    ),
    'asset_publish' => 
    array (
      'type' => 'tinyint',
      'size' => '4',
      'default' => NULL,
    ),
    'show_path_entry' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'show_path_page' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'preview_url' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'link_url' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'show_both' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => '11',
    ),
    'accept_comment' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'comment_status' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'anonymous_comment' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'comment_thanks' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'enable_api' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'not_null' => 1,
      'default' => 0,
    ),
    'language' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => NULL,
    ),
    'barcolor' => 
    array (
      'type' => 'string',
      'size' => '255',
    ),
    'bartextcolor' => 
    array (
      'type' => 'string',
      'size' => '255',
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
    ),
    'created_by' => 
    array (
      'type' => 'int',
      'size' => '11',
    ),
    'modified_by' => 
    array (
      'type' => 'int',
      'size' => '11',
    ),
    'last_update' => 
    array (
      'type' => 'int',
      'size' => '11',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'name' => 'name',
    'site_url' => 'site_url',
    'site_path' => 'site_path',
    'order' => 'order',
    'modified_on' => 'modified_on',
    'created_on' => 'created_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'last_update' => 'last_update',
  ),
  'autoset' => 
  array (
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
  ),
  'sort_by' => 
  array (
    'order' => 'ascend',
  ),
  'options' => 
  array (
    'image' => '',
  ),
  'extras' => 
  array (
    'image' => ':::image',
  ),
  'child_tables' => 
  array (
    0 => 'permission',
    1 => 'tag',
  ),
  'translate' => 
  array (
    0 => 'preview_url',
    1 => 'link_url',
    2 => 'show_both',
  ),
  'hint' => 
  array (
    'document_root' => 'Please specify if the document root of the management screen and the document root of website are different.',
    'preview_url' => 'When previewing with a URL different from the URL of the management screen, please enter the URL of the PHP application.',
    'link_url' => 'When viewing with a URL different from the URL of the management screen, please enter the another URL of this website.',
    'show_both' => 'Check this if you want to display both links together.',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'site_url' => 'url',
    'description' => 'text',
    'copyright' => 'text',
    'order' => 'number',
    'accept_comment' => 'checkbox',
    'language' => 'text',
    'created_by' => 'reference:user:nickname',
    'created_on' => 'datetime',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'description' => 'textarea',
    'copyright' => 'text',
    'site_url' => 'url',
    'site_path' => 'text',
    'image' => 'file',
    'timezone' => 'text',
    'document_root' => 'text',
    'extra_path' => 'text_short',
    'asset_publish' => 'checkbox',
    'preview_url' => 'text',
    'link_url' => 'text',
    'show_both' => 'checkbox',
    'order' => 'number',
    'accept_comment' => 'checkbox',
    'enable_api' => 'checkbox',
    'language' => 'languages',
    'barcolor' => 'color',
    'bartextcolor' => 'color',
    'last_update' => 'hidden',
  ),
  'column_labels' => 
  array (
    'enable_api' => 'Enable API',
  ),
);