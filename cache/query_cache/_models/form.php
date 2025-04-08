<?php $this->get_cache=array (
  'label' => 'Form',
  'plural' => 'Forms',
  'version' => '2.34',
  'primary' => 'name',
  'auditing' => 1,
  'order' => 380,
  'start_end' => 1,
  'menu_type' => 4,
  'template_tags' => 1,
  'display_space' => 1,
  'has_basename' => 1,
  'has_status' => 1,
  'revisable' => 1,
  'display_system' => 1,
  'has_uuid' => 1,
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
    'text_format' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'text' => 
    array (
      'type' => 'text',
    ),
    'questions' => 
    array (
      'type' => 'relation',
    ),
    'requires_token' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'token_expires' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'use_session' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'contact_limit' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
      'default' => '0',
    ),
    'unique' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'redirect_url' => 
    array (
      'type' => 'text',
    ),
    'published_on' => 
    array (
      'type' => 'datetime',
    ),
    'unpublished_on' => 
    array (
      'type' => 'datetime',
    ),
    'has_deadline' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'status' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '1',
    ),
    'basename' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'send_email' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'not_save' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'email_from' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'notify_return_path' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'send_thanks' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'thanks_return_path' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'thanks_cc' => 
    array (
      'type' => 'text',
    ),
    'thanks_bcc' => 
    array (
      'type' => 'text',
    ),
    'thanks_template' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'send_notify' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'notify_from' => 
    array (
      'type' => 'text',
    ),
    'notify_to' => 
    array (
      'type' => 'text',
    ),
    'notify_cc' => 
    array (
      'type' => 'text',
    ),
    'notify_bcc' => 
    array (
      'type' => 'text',
    ),
    'notify_template' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => NULL,
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => 0,
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
    'uuid' => 
    array (
      'type' => 'string',
      'size' => 255,
      'default' => NULL,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'id' => 'id',
    'name' => 'name',
    'published_on' => 'published_on',
    'unpublished_on' => 'unpublished_on',
    'has_deadline' => 'has_deadline',
    'status' => 'status',
    'basename' => 'basename',
    'workspace_id' => 'workspace_id',
    'rev_type' => 'rev_type',
    'rev_object_id' => 'rev_object_id',
    'rev_note' => 'rev_note',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'uuid' => 'uuid',
  ),
  'relations' => 
  array (
    'questions' => 'question',
  ),
  'options' => 
  array (
    'text' => '12',
    'status' => 'Draft,Review,Approval Pending,Reserved,Publish,Ended',
  ),
  'sort_by' => 
  array (
    'modified_by' => 'descend',
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
    'status' => 'select',
    'thanks_template' => 'relation',
    'notify_template' => 'relation',
  ),
  'translate' => 
  array (
    0 => 'contact_limit',
  ),
  'hint' => 
  array (
    'contact_limit' => 'If you specify 0, unlimited contacts will be accepted.',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'text' => 'richtext',
    'questions' => 'relation:question:label:dialog',
    'requires_token' => 'checkbox',
    'contact_limit' => 'number',
    'unique' => 'checkbox',
    'redirect_url' => 'text_short',
    'published_on' => 'datetime',
    'unpublished_on' => 'datetime',
    'status' => 'selection',
    'basename' => 'text_short',
    'send_email' => 'checkbox',
    'thanks_template' => 'relation:template:name:select',
    'notify_template' => 'relation:template:name:select',
    'uuid' => 'text_short',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'published_on' => 'date',
    'unpublished_on' => 'date',
    'has_deadline' => 'checkbox',
    'status' => 'number',
    'send_email' => 'checkbox',
    'not_save' => 'checkbox',
    'contact_limit' => 'number',
    'unique' => 'checkbox',
    'workspace_id' => 'reference:workspace:name',
    'rev_note' => 'text',
    'rev_diff' => 'popover',
    'rev_type' => 'text_short',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'hide_edit_options' => 
  array (
    0 => 'status',
    1 => 'published_on',
    2 => 'unpublished_on',
  ),
  'column_labels' => 
  array (
    'text' => 'Description',
    'contact_limit' => 'Limit of Contacts',
    'not_save' => 'Save',
  ),
);