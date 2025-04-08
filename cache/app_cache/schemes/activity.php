<?php $this->get_cache=array (
  'label' => 'Activity',
  'plural' => 'Activities',
  'version' => '1.26',
  'primary' => 'url',
  'order' => 520,
  'menu_type' => 3,
  'max_revisions' => 20,
  'display_system' => 1,
  'display_space' => 1,
  'show_activity' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'url' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'query_string' => 
    array (
      'type' => 'text',
    ),
    'referrer' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'class' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'language' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
      'default' => NULL,
    ),
    'user_agent' => 
    array (
      'type' => 'text',
    ),
    'remote_ip' => 
    array (
      'type' => 'string',
      'size' => 50,
      'not_null' => 1,
    ),
    'member_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'url' => 'url',
    'referrer' => 'referrer',
    'class' => 'class',
    'model' => 'model',
    'object_id' => 'object_id',
    'language' => 'language',
    'remote_ip' => 'remote_ip',
    'member_id' => 'member_id',
    'workspace_id' => 'workspace_id',
    'created_on' => 'created_on',
  ),
  'relations' => 
  array (
  ),
  'options' => 
  array (
    'class' => 'Page View,Search,Contact,Comment,Login,Logout,Download',
  ),
  'extras' => 
  array (
  ),
  'translate' => 
  array (
    0 => 'class',
    1 => 'model',
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'autoset' => 
  array (
    0 => 'workspace_id',
    1 => 'created_on',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
  ),
  'disp_edit' => 
  array (
    'class' => 'radio',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'url' => 'primary',
    'query_string' => 'text',
    'referrer' => 'text',
    'class' => 'selection',
    'model' => 'text_short',
    'object_id' => 'number',
    'language' => 'text_short',
    'member_id' => 'reference:member:nickname',
    'user_agent' => 'text',
    'remote_ip' => 'text',
    'created_on' => 'datetime',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'url' => 'primary',
    'query_string' => 'text',
    'referrer' => 'text',
    'class' => 'text_short',
    'model' => 'text_short',
    'language' => 'text_short',
    'created_on' => 'datetime',
    'user_agent' => 'text',
    'remote_ip' => 'text',
    'member_id' => 'reference:member:nickname',
    'workspace_id' => 'reference:workspace:name',
  ),
  'column_labels' => 
  array (
    'object_id' => 'Object ID',
    'member_id' => 'Member',
    'remote_ip' => 'Remote IP',
    'workspace_id' => 'WorkSpace',
  ),
  'hide_edit_options' => 
  array (
  ),
);