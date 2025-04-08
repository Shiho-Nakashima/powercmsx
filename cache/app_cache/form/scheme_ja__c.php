<?php $this->get_cache=array (
  'label' => 'フォーム',
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
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
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
    'contact_limit' => 'number',
    'unique' => 'checkbox',
    'published_on' => 'date',
    'unpublished_on' => 'date',
    'has_deadline' => 'checkbox',
    'status' => 'number',
    'send_email' => 'checkbox',
    'not_save' => 'checkbox',
    'workspace_id' => 'reference:workspace:name',
    'rev_type' => 'text_short',
    'rev_note' => 'text',
    'rev_diff' => 'popover',
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
  'max_revisions' => 20,
  'extras' => 
  array (
  ),
  'unique' => 
  array (
  ),
  'validation_types' => 
  array (
  ),
  'maxlength' => 
  array (
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'name' => 'Name',
    'text_format' => 'Text Format',
    'text' => 'Description',
    'questions' => 'Questions',
    'requires_token' => 'Requires Token',
    'token_expires' => 'Token Expires',
    'use_session' => 'Use Session',
    'contact_limit' => 'Limit of Contacts',
    'unique' => 'Unique',
    'redirect_url' => 'Redirect To',
    'published_on' => 'Publish Date',
    'unpublished_on' => 'Unpublish Date',
    'has_deadline' => 'Specify the Deadline',
    'status' => 'Status',
    'basename' => 'Basename',
    'send_email' => 'Send Email',
    'not_save' => 'Save',
    'email_from' => 'Mail From',
    'notify_return_path' => 'Notify Return Path',
    'send_thanks' => 'Send Thank You Message',
    'thanks_return_path' => 'Thanks Return Path',
    'thanks_cc' => 'Cc(Thanks email)',
    'thanks_bcc' => 'Bcc(Thanks email)',
    'thanks_template' => 'View(Thanks)',
    'send_notify' => 'Send Notify Message',
    'notify_from' => 'Mail From(Notify)',
    'notify_to' => 'Notify To',
    'notify_cc' => 'Notify Cc',
    'notify_bcc' => 'Notify Bcc',
    'notify_template' => 'View(Notify)',
    'workspace_id' => 'WorkSpace',
    'rev_type' => 'Type',
    'rev_object_id' => 'Object ID',
    'rev_changed' => 'Changed',
    'rev_note' => 'Change Note',
    'rev_diff' => 'Diff',
    'created_on' => 'Date Created',
    'modified_on' => 'Date Modified',
    'created_by' => 'Created By',
    'modified_by' => 'Modified By',
    'uuid' => 'UUID',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'name' => 'Name',
      'text_format' => 'Text Format',
      'text' => 'Description',
      'questions' => 'Questions',
      'requires_token' => 'Requires Token',
      'token_expires' => 'Token Expires',
      'use_session' => 'Use Session',
      'contact_limit' => 'Limit of Contacts',
      'unique' => 'Unique',
      'redirect_url' => 'Redirect To',
      'published_on' => 'Publish Date',
      'unpublished_on' => 'Unpublish Date',
      'has_deadline' => 'Specify the Deadline',
      'status' => 'Status',
      'basename' => 'Basename',
      'send_email' => 'Send Email',
      'not_save' => 'Save',
      'email_from' => 'Mail From',
      'notify_return_path' => 'Notify Return Path',
      'send_thanks' => 'Send Thank You Message',
      'thanks_return_path' => 'Thanks Return Path',
      'thanks_cc' => 'Cc(Thanks email)',
      'thanks_bcc' => 'Bcc(Thanks email)',
      'thanks_template' => 'View(Thanks)',
      'send_notify' => 'Send Notify Message',
      'notify_from' => 'Mail From(Notify)',
      'notify_to' => 'Notify To',
      'notify_cc' => 'Notify Cc',
      'notify_bcc' => 'Notify Bcc',
      'notify_template' => 'View(Notify)',
      'workspace_id' => 'WorkSpace',
      'rev_type' => 'Type',
      'rev_object_id' => 'Object ID',
      'rev_changed' => 'Changed',
      'rev_note' => 'Change Note',
      'rev_diff' => 'Diff',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
      'uuid' => 'UUID',
    ),
    'ja' => 
    array (
      'form' => 'フォーム',
      'Form' => 'フォーム',
      'Forms' => 'フォーム',
      'ID' => 'ID',
      'Name' => '名前',
      'Text Format' => 'フォーマット',
      'Description' => '説明',
      'Questions' => '設問',
      'Requires Token' => 'トークンを要求する',
      'Token Expires' => 'トークン有効期限',
      'Use Session' => 'セッションを利用する',
      'Limit of Contacts' => 'コンタクト数上限',
      'Unique' => 'ユニーク',
      'Redirect To' => 'リダイレクト先',
      'Publish Date' => '公開日',
      'Unpublish Date' => '公開終了日',
      'Specify the Deadline' => '公開終了日を指定',
      'Status' => 'ステータス',
      'Basename' => 'ベースネーム',
      'Send Email' => 'メールを送信する',
      'Save' => '保存',
      'Mail From' => 'メールのFrom',
      'Notify Return Path' => 'Notify Return Path',
      'Send Thank You Message' => '送信者にメールを送る',
      'Thanks Return Path' => 'Thanks Return Path',
      'Cc(Thanks email)' => 'ThanksメールのCc',
      'Bcc(Thanks email)' => 'ThanksメールのBcc',
      'View(Thanks)' => 'ビュー(送信者宛)',
      'Send Notify Message' => '管理者に通知メールを送る',
      'Mail From(Notify)' => '通知メールのFrom',
      'Notify To' => '通知送信先',
      'Notify Cc' => '通知メールのCc',
      'Notify Bcc' => '通知メールのBcc',
      'View(Notify)' => 'ビュー(管理者宛)',
      'WorkSpace' => 'スペース',
      'Type' => 'タイプ',
      'Object ID' => 'オブジェクトID',
      'Changed' => '変更',
      'Change Note' => '変更メモ',
      'Diff' => '差分',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
      'UUID' => 'UUID',
    ),
  ),
);