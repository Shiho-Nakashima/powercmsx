<?php $this->get_cache=array (
  'label' => 'Role',
  'plural' => 'Roles',
  'version' => '1.71',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 160,
  'menu_type' => 5,
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
      'not_null' => 1,
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'workspace_admin' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'description' => 
    array (
      'type' => 'text',
    ),
    'can_list' => 
    array (
      'type' => 'relation',
    ),
    'can_assoc_list' => 
    array (
      'type' => 'relation',
    ),
    'can_all_list' => 
    array (
      'type' => 'relation',
    ),
    'can_create' => 
    array (
      'type' => 'relation',
    ),
    'can_update_own' => 
    array (
      'type' => 'relation',
    ),
    'can_update_assoc' => 
    array (
      'type' => 'relation',
    ),
    'can_update_all' => 
    array (
      'type' => 'relation',
    ),
    'can_review' => 
    array (
      'type' => 'relation',
    ),
    'can_hierarchy' => 
    array (
      'type' => 'relation',
    ),
    'can_revision' => 
    array (
      'type' => 'relation',
    ),
    'can_duplicate' => 
    array (
      'type' => 'relation',
    ),
    'can_activate' => 
    array (
      'type' => 'relation',
    ),
    'can_delete' => 
    array (
      'type' => 'relation',
    ),
    'can_comment_notify' => 
    array (
      'type' => 'relation',
    ),
    'can_rebuild' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'can_livepreview' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'import_objects' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'manage_plugins' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'columns_data' => 
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
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'name' => 'name',
    'class' => 'class',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'relations' => 
  array (
    'can_list' => 'table',
    'can_assoc_list' => 'table',
    'can_all_list' => 'table',
    'can_create' => 'table',
    'can_update_own' => 'table',
    'can_update_assoc' => 'table',
    'can_update_all' => 'table',
    'can_review' => 'table',
    'can_hierarchy' => 'table',
    'can_revision' => 'table',
    'can_duplicate' => 'table',
    'can_activate' => 'table',
    'can_delete' => 'table',
    'can_comment_notify' => 'table',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'autoset' => 
  array (
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
  ),
  'hide_edit_options' => 
  array (
    0 => 'can_list',
    1 => 'can_assoc_list',
    2 => 'can_all_list',
    3 => 'can_create',
    4 => 'can_update_own',
    5 => 'can_update_assoc',
    6 => 'can_update_all',
    7 => 'can_review',
    8 => 'can_revision',
    9 => 'can_duplicate',
    10 => 'can_hierarchy',
    11 => 'workspace_admin',
    12 => 'can_delete',
    13 => 'can_comment_notify',
    14 => 'can_livepreview',
    15 => 'can_activate',
    16 => 'can_rebuild',
    17 => 'class',
    18 => 'import_objects',
    19 => 'manage_plugins',
  ),
  'unchangeable' => 
  array (
    0 => 'class',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'class' => 'text',
    'workspace_admin' => 'checkbox',
    'description' => 'textarea',
    'can_list' => 'relation:table:label:checkbox',
    'can_assoc_list' => 'relation:table:label:checkbox',
    'can_all_list' => 'relation:table:label:checkbox',
    'can_create' => 'relation:table:label:checkbox',
    'can_update_own' => 'relation:table:label:checkbox',
    'can_update_assoc' => 'relation:table:label:checkbox',
    'can_update_all' => 'relation:table:label:checkbox',
    'can_review' => 'relation:table:label:checkbox',
    'can_hierarchy' => 'relation:table:label:checkbox',
    'can_revision' => 'relation:table:label:checkbox',
    'can_duplicate' => 'relation:table:label:checkbox',
    'can_activate' => 'relation:table:label:checkbox',
    'can_delete' => 'relation:table:label:checkbox',
    'can_comment_notify' => 'relation:table:label:checkbox',
    'can_rebuild' => 'checkbox',
    'can_livepreview' => 'checkbox',
    'import_objects' => 'checkbox',
    'manage_plugins' => 'checkbox',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'class' => 'text',
    'workspace_admin' => 'checkbox',
    'description' => 'text',
    'can_list' => 'reference:table:label',
    'can_assoc_list' => 'reference:table:label',
    'can_all_list' => 'reference:table:label',
    'can_create' => 'reference:table:label',
    'can_update_own' => 'reference:table:label',
    'can_update_assoc' => 'reference:table:label',
    'can_update_all' => 'reference:table:label',
    'can_review' => 'reference:table:label',
    'can_hierarchy' => 'reference:table:label',
    'can_revision' => 'reference:table:label',
    'can_duplicate' => 'reference:table:label',
    'can_activate' => 'reference:table:label',
    'can_delete' => 'reference:table:label',
    'can_comment_notify' => 'reference:table:label',
    'can_rebuild' => 'checkbox',
    'import_objects' => 'checkbox',
    'manage_plugins' => 'checkbox',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
);