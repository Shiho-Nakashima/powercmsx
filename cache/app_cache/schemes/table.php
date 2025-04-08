<?php $this->get_cache=array (
  'label' => 'Model',
  'plural' => 'Models',
  'version' => '2.81',
  'primary' => 'name',
  'display_system' => 1,
  'sortable' => true,
  'order' => 1,
  'auditing' => 1,
  'menu_type' => 2,
  'template_tags' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'name' => 
    array (
      'type' => 'string',
      'not_null' => 1,
      'size' => 50,
    ),
    'label' => 
    array (
      'type' => 'string',
      'not_null' => 1,
      'size' => 255,
    ),
    'plural' => 
    array (
      'type' => 'string',
      'not_null' => 1,
      'size' => 255,
    ),
    'description' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'version' => 
    array (
      'type' => 'string',
      'size' => 25,
    ),
    'do_not_output' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => NULL,
    ),
    'out_path' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'primary' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'child_tables' => 
    array (
      'type' => 'text',
    ),
    'display_system' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'space_child' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'allow_comment' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'display_space' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'menu_type' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'display_dashboard' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'show_activity' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => NULL,
    ),
    'taggable' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'taxonomy' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'sortable' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'auditing' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'not_delete' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'api' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'template_tags' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'start_end' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => 0,
    ),
    'has_status' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'has_assets' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'has_extra_path' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'has_basename' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'allow_identical' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'has_form' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'assign_user' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'hierarchy' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'dialog_view' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => NULL,
    ),
    'default_status' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => NULL,
    ),
    'revisable' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'max_revisions' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => NULL,
    ),
    'im_export' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'has_attachments' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'can_duplicate' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'logical_delete' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'order' => 
    array (
      'type' => 'int',
      'not_null' => 1,
      'size' => 11,
    ),
    'sort_by' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'sort_order' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'text_format' => 
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
    'has_uuid' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'version' => 'version',
    'display_system' => 'display_system',
    'space_child' => 'space_child',
    'display_space' => 'display_space',
    'menu_type' => 'menu_type',
    'has_status' => 'has_status',
    'display_dashboard' => 'display_dashboard',
    'show_activity' => 'show_activity',
    'sortable' => 'sortable',
    'api' => 'api',
    'template_tags' => 'template_tags',
    'hierarchy' => 'hierarchy',
    'im_export' => 'im_export',
    'order' => 'order',
  ),
  'unique' => 
  array (
    0 => 'name',
    1 => 'out_path',
  ),
  'unchangeable' => 
  array (
    0 => 'name',
  ),
  'sort_by' => 
  array (
    'order' => 'ascend',
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
    'name' => 'primary',
    'label' => 'text',
    'plural' => 'text',
    'version' => 'text_short',
    'order' => 'number',
    'space_child' => 'checkbox',
    'show_activity' => 'checkbox',
    'not_delete' => 'checkbox',
    'created_on' => 'date',
    'modified_on' => 'date',
    'has_uuid' => 'checkbox',
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
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
  ),
  'options' => 
  array (
    'text_format' => 'None,Convert Line Breaks,Markdown,RichText',
  ),
  'disp_edit' => 
  array (
    'text_format' => 'select',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'not_delete' => 'hidden',
    'name' => 'primary',
    'label' => 'text',
    'plural' => 'text',
    'version' => 'text_short',
    'out_path' => 'text_short',
    'description' => 'textarea',
    'primary' => 'text_short',
    'display_system' => 'checkbox',
    'display_space' => 'checkbox',
    'space_child' => 'checkbox',
    'order' => 'number',
    'sort_by' => 'text_short',
    'text_format' => 'selection',
  ),
  'column_labels' => 
  array (
    'allow_identical' => 'Allow Identical Basename',
    'text_format' => 'Format',
  ),
);