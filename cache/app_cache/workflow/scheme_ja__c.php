<?php $this->get_cache=array (
  'version' => '1.41',
  'label' => 'ワークフロー',
  'plural' => 'Workflows',
  'primary' => 'model',
  'auditing' => 1,
  'order' => 420,
  'menu_type' => 5,
  'display_space' => 1,
  'display_system' => 1,
  'column_defs' => 
  array (
    'id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'model' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'users_draft' => 
    array (
      'type' => 'relation',
    ),
    'users_review' => 
    array (
      'type' => 'relation',
    ),
    'users_publish' => 
    array (
      'type' => 'relation',
    ),
    'assoc_only' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'approval_type' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'remand_type' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'notify_changes' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'email_from' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'from_address' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'can_assign_you' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
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
    'model' => 'model',
    'workspace_id' => 'workspace_id',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
  ),
  'translate' => 
  array (
    0 => 'model',
    1 => 'approval_type',
    2 => 'remand_type',
    3 => 'email_from',
  ),
  'validation_types' => 
  array (
  ),
  'relations' => 
  array (
    'users_draft' => 'user',
    'users_review' => 'user',
    'users_publish' => 'user',
  ),
  'options' => 
  array (
    'approval_type' => 'Serial,Parallel',
    'remand_type' => 'Serial,Parallel',
    'email_from' => 'User\'s Email,System Email,Specify Individually',
  ),
  'sort_by' => 
  array (
    'modified_on' => 'descend',
  ),
  'autoset' => 
  array (
    0 => 'workspace_id',
    1 => 'created_on',
    2 => 'modified_on',
    3 => 'created_by',
    4 => 'modified_by',
  ),
  'unique' => 
  array (
    0 => 'model',
  ),
  'unchangeable' => 
  array (
    0 => 'model',
    1 => 'workspace_id',
  ),
  'disp_edit' => 
  array (
    'approval_type' => 'radio',
    'remand_type' => 'radio',
    'email_from' => 'radio',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'model' => 'primary',
    'users_draft' => 'relation:user:nickname:dialog',
    'users_review' => 'relation:user:nickname:dialog',
    'users_publish' => 'relation:user:nickname:dialog',
    'assoc_only' => 'checkbox',
    'approval_type' => 'selection',
    'remand_type' => 'selection',
    'notify_changes' => 'checkbox',
    'email_from' => 'selection',
    'from_address' => 'hidden',
    'can_assign_you' => 'checkbox',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'model' => 'primary',
    'users_draft' => 'reference:user:nickname',
    'users_review' => 'reference:user:nickname',
    'users_publish' => 'reference:user:nickname',
    'assoc_only' => 'checkbox',
    'approval_type' => 'text_short',
    'remand_type' => 'text_short',
    'workspace_id' => 'reference:workspace:name',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
  ),
  'extras' => 
  array (
  ),
  'maxlength' => 
  array (
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'model' => 'Model',
    'users_draft' => 'Creator',
    'users_review' => 'Reviewer',
    'users_publish' => 'Publisher',
    'assoc_only' => 'Select only Association Users',
    'approval_type' => 'Approval Type',
    'remand_type' => 'Remand Type',
    'notify_changes' => 'Notify at Change User',
    'email_from' => 'Mail From',
    'from_address' => 'From Address',
    'can_assign_you' => 'Can Assign You',
    'workspace_id' => 'WorkSpace',
    'created_on' => 'Date Created',
    'modified_on' => 'Date Modified',
    'created_by' => 'Created By',
    'modified_by' => 'Modified By',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'model' => 'Model',
      'users_draft' => 'Creator',
      'users_review' => 'Reviewer',
      'users_publish' => 'Publisher',
      'assoc_only' => 'Select only Association Users',
      'approval_type' => 'Approval Type',
      'remand_type' => 'Remand Type',
      'notify_changes' => 'Notify at Change User',
      'email_from' => 'Mail From',
      'from_address' => 'From Address',
      'can_assign_you' => 'Can Assign You',
      'workspace_id' => 'WorkSpace',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
    ),
    'ja' => 
    array (
      'workflow' => 'ワークフロー',
      'Workflow' => 'ワークフロー',
      'Workflows' => 'ワークフロー',
      'ID' => 'ID',
      'Model' => 'モデル',
      'Creator' => '作成者',
      'Reviewer' => 'レビュアー',
      'Publisher' => '公開者',
      'Select only Association Users' => 'グループのメンバーのみを選択する',
      'Approval Type' => '承認タイプ',
      'Remand Type' => '差し戻しタイプ',
      'Notify at Change User' => 'ユーザー変更時に通知する',
      'Mail From' => 'メールのFrom',
      'From Address' => 'Fromアドレス',
      'Can Assign You' => '自分へのアサインを可能にする',
      'WorkSpace' => 'スペース',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
    ),
  ),
);