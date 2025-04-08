<?php $this->get_cache=array (
  'label' => 'Contact',
  'plural' => 'Contacts',
  'version' => '1.7',
  'primary' => 'subject',
  'order' => 390,
  'menu_type' => 4,
  'taggable' => 1,
  'display_space' => 1,
  'display_system' => 1,
  'has_attachments' => 1,
  'show_activity' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'subject' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'name' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'email' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'identifier' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'data' => 
    array (
      'type' => 'text',
    ),
    'question_map' => 
    array (
      'type' => 'text',
    ),
    'attachmentfiles' => 
    array (
      'type' => 'relation',
    ),
    'tags' => 
    array (
      'type' => 'relation',
    ),
    'memo' => 
    array (
      'type' => 'text',
    ),
    'state' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'created_on' => 
    array (
      'type' => 'datetime',
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'form_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'object_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'remote_ip' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
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
    'subject' => 'subject',
    'name' => 'name',
    'email' => 'email',
    'identifier' => 'identifier',
    'state' => 'state',
    'created_on' => 'created_on',
    'form_id' => 'form_id',
    'model' => 'model',
    'remote_ip' => 'remote_ip',
    'workspace_id' => 'workspace_id',
    'modified_on' => 'modified_on',
    'modified_by' => 'modified_by',
  ),
  'translate' => 
  array (
    0 => 'state',
    1 => 'model',
    2 => 'object_id',
  ),
  'relations' => 
  array (
    'attachmentfiles' => 'attachmentfile',
    'tags' => 'tag',
  ),
  'options' => 
  array (
    'data' => '10',
    'memo' => '6',
    'state' => 'Unread,Already Read,In Progress,Resolved,Flagged,Closed',
  ),
  'sort_by' => 
  array (
    'created_on' => 'descend',
  ),
  'autoset' => 
  array (
    0 => 'attachmentfiles',
    1 => 'form_id',
    2 => 'model',
    3 => 'object_id',
    4 => 'workspace_id',
    5 => 'created_on',
    6 => 'modified_on',
    7 => 'modified_by',
  ),
  'unchangeable' => 
  array (
    0 => 'subject',
    1 => 'name',
    2 => 'email',
    3 => 'data',
    4 => 'attachmentfiles',
    5 => 'form_id',
    6 => 'model',
    7 => 'object_id',
    8 => 'remote_ip',
    9 => 'workspace_id',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'subject' => 'primary',
    'name' => 'text_short',
    'email' => 'text_short',
    'identifier' => 'text_short',
    'data' => 'textarea',
    'attachmentfiles' => 'relation:attachmentfile:name:dialog',
    'tags' => 'relation:tag:name:dialog',
    'memo' => 'textarea',
    'state' => 'selection',
    'created_on' => 'datetime',
    'form_id' => 'relation:form:name:select',
    'object_id' => 'number',
    'modified_by' => 'reference:user:nickname',
    'remote_ip' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'subject' => 'primary',
    'name' => 'text_short',
    'email' => 'text',
    'identifier' => 'text_short',
    'attachmentfiles' => 'reference:attachmentfile:name',
    'tags' => 'reference:tag:name',
    'memo' => 'text',
    'state' => 'text_short',
    'form_id' => 'reference:form:name',
    'object_id' => 'number',
    'remote_ip' => 'text_short',
    'workspace_id' => 'reference:workspace:name',
    'created_on' => 'datetime',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'default_list_items' => 
  array (
    0 => 'subject',
    1 => 'name',
    2 => 'email',
    3 => 'identifier',
    4 => 'tags',
    5 => 'state',
    6 => 'memo',
    7 => 'created_on',
    8 => 'workspace_id',
  ),
  'disp_edit' => 
  array (
    'state' => 'select',
  ),
  'column_labels' => 
  array (
    'created_on' => 'Date Posted',
  ),
);