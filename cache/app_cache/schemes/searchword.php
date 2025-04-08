<?php $this->get_cache=array (
  'label' => 'Search Word',
  'plural' => 'Search Words',
  'version' => '1.06',
  'primary' => 'keyword',
  'order' => 530,
  'menu_type' => 3,
  'max_revisions' => 20,
  'display_system' => 1,
  'display_space' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'keyword' => 
    array (
      'type' => 'string',
      'size' => 50,
      'not_null' => 1,
    ),
    'and_or' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'activity_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
      'default' => NULL,
    ),
    'remote_ip' => 
    array (
      'type' => 'string',
      'size' => 50,
      'not_null' => 1,
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
    'keyword' => 'keyword',
    'activity_id' => 'activity_id',
    'created_on' => 'created_on',
    'remote_ip' => 'remote_ip',
    'workspace_id' => 'workspace_id',
  ),
  'relations' => 
  array (
  ),
  'options' => 
  array (
  ),
  'extras' => 
  array (
  ),
  'sort_by' => 
  array (
    'id' => 'descend',
  ),
  'autoset' => 
  array (
    0 => 'workspace_id',
    1 => 'and_or',
    2 => 'activity_id',
    3 => 'created_on',
  ),
  'unchangeable' => 
  array (
    0 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'keyword' => 'primary',
    'and_or' => 'text_short',
    'activity_id' => 'reference:activity:url',
    'remote_ip' => 'text',
    'created_on' => 'datetime',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'keyword' => 'primary',
    'and_or' => 'text_short',
    'activity_id' => 'reference:activity:url',
    'created_on' => 'datetime',
    'remote_ip' => 'text',
    'workspace_id' => 'reference:workspace:name',
  ),
  'column_labels' => 
  array (
    'id' => 'ID',
    'keyword' => 'Keyword',
    'and_or' => 'AND / OR',
    'activity_id' => 'Activity',
    'remote_ip' => 'Remote IP',
    'workspace_id' => 'WorkSpace',
  ),
  'hide_edit_options' => 
  array (
  ),
);