<?php $this->get_cache=array (
  'label' => 'Permission',
  'plural' => 'Permissions',
  'version' => '1.25',
  'display_system' => 1,
  'order' => 130,
  'menu_type' => 5,
  'display_space' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'user_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'association_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'roles' => 
    array (
      'type' => 'relation',
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'user_id' => 'user_id',
    'association_id' => 'association_id',
    'workspace_id' => 'workspace_id',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'user_id' => 'reference:user:nickname',
    'association_id' => 'reference:association:name',
    'roles' => 'reference:role:name',
    'workspace_id' => 'reference:workspace:name',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'user_id' => 'relation:user:nickname:dialog',
    'association_id' => 'relation:association:name:dialog',
    'roles' => 'relation:role:name:dialog',
    'workspace_id' => 'hidden',
  ),
  'relations' => 
  array (
    'roles' => 'role',
  ),
  'column_labels' => 
  array (
    'association_id' => 'Association',
  ),
);