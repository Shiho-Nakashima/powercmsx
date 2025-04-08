<?php $this->get_cache=array (
  'label' => 'モデル',
  'plural' => 'Models',
  'version' => '2.81',
  'primary' => 'name',
  'display_system' => 1,
  'sortable' => 1,
  'order' => 1,
  'auditing' => 1,
  'menu_type' => 2,
  'template_tags' => 1,
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
      'size' => 50,
      'not_null' => 1,
    ),
    'label' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'plural' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
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
      'default' => '0',
    ),
    'space_child' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
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
      'default' => '0',
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
      'default' => '0',
    ),
    'show_activity' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'taggable' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'taxonomy' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'sortable' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'auditing' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'not_delete' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'api' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'template_tags' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'start_end' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
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
    ),
    'default_status' => 
    array (
      'type' => 'int',
      'size' => 11,
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
      'size' => 11,
      'not_null' => 1,
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
    'display_dashboard' => 'display_dashboard',
    'show_activity' => 'show_activity',
    'sortable' => 'sortable',
    'api' => 'api',
    'template_tags' => 'template_tags',
    'has_status' => 'has_status',
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
    'space_child' => 'checkbox',
    'show_activity' => 'checkbox',
    'not_delete' => 'checkbox',
    'order' => 'number',
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
    'name' => 'primary',
    'label' => 'text',
    'plural' => 'text',
    'description' => 'textarea',
    'version' => 'text_short',
    'out_path' => 'text_short',
    'primary' => 'text_short',
    'display_system' => 'checkbox',
    'space_child' => 'checkbox',
    'display_space' => 'checkbox',
    'not_delete' => 'hidden',
    'order' => 'number',
    'sort_by' => 'text_short',
    'text_format' => 'selection',
  ),
  'column_labels' => 
  array (
    'allow_identical' => 'Allow Identical Basename',
    'text_format' => 'Format',
  ),
  'relations' => 
  array (
  ),
  'extras' => 
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
    'label' => 'Label',
    'plural' => 'Plural',
    'description' => 'Description',
    'version' => 'Version',
    'do_not_output' => 'Do not output file(s)',
    'out_path' => 'File Out Path',
    'primary' => 'Primary',
    'child_tables' => 'Child Models',
    'display_system' => 'Display in System',
    'space_child' => 'Child of WorkSpace',
    'allow_comment' => 'Accept Comments',
    'display_space' => 'Display in WorkSpace',
    'menu_type' => 'Menu Type',
    'display_dashboard' => 'Display in Dashboard',
    'show_activity' => 'Show Activity',
    'taggable' => 'Taggable',
    'taxonomy' => 'Taxonomy',
    'sortable' => 'Sortable',
    'auditing' => 'Auditing',
    'not_delete' => 'Not Delete',
    'api' => 'API',
    'template_tags' => 'Template Tags',
    'start_end' => 'Expiration Date',
    'has_status' => 'Has Status',
    'has_assets' => 'Has Assets',
    'has_extra_path' => 'Has Extra Path',
    'has_basename' => 'Has Basename',
    'allow_identical' => 'Allow Identical Basename',
    'has_form' => 'Has Form',
    'assign_user' => 'Assign User',
    'hierarchy' => 'Hierarchy',
    'dialog_view' => 'Dialog View',
    'default_status' => 'Default Status',
    'revisable' => 'Revisable',
    'max_revisions' => 'Max Revisions',
    'im_export' => 'Import &amp; Export',
    'has_attachments' => 'Has Attachments',
    'can_duplicate' => 'Can Duplicate',
    'logical_delete' => 'Logical Deletion',
    'order' => 'Order',
    'sort_by' => 'Sort By',
    'sort_order' => 'Sort',
    'text_format' => 'Format',
    'created_on' => 'Date Created',
    'modified_on' => 'Date Modified',
    'created_by' => 'Created By',
    'modified_by' => 'Modified By',
    'has_uuid' => 'UUID',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'name' => 'Name',
      'label' => 'Label',
      'plural' => 'Plural',
      'description' => 'Description',
      'version' => 'Version',
      'do_not_output' => 'Do not output file(s)',
      'out_path' => 'File Out Path',
      'primary' => 'Primary',
      'child_tables' => 'Child Models',
      'display_system' => 'Display in System',
      'space_child' => 'Child of WorkSpace',
      'allow_comment' => 'Accept Comments',
      'display_space' => 'Display in WorkSpace',
      'menu_type' => 'Menu Type',
      'display_dashboard' => 'Display in Dashboard',
      'show_activity' => 'Show Activity',
      'taggable' => 'Taggable',
      'taxonomy' => 'Taxonomy',
      'sortable' => 'Sortable',
      'auditing' => 'Auditing',
      'not_delete' => 'Not Delete',
      'api' => 'API',
      'template_tags' => 'Template Tags',
      'start_end' => 'Expiration Date',
      'has_status' => 'Has Status',
      'has_assets' => 'Has Assets',
      'has_extra_path' => 'Has Extra Path',
      'has_basename' => 'Has Basename',
      'allow_identical' => 'Allow Identical Basename',
      'has_form' => 'Has Form',
      'assign_user' => 'Assign User',
      'hierarchy' => 'Hierarchy',
      'dialog_view' => 'Dialog View',
      'default_status' => 'Default Status',
      'revisable' => 'Revisable',
      'max_revisions' => 'Max Revisions',
      'im_export' => 'Import &amp; Export',
      'has_attachments' => 'Has Attachments',
      'can_duplicate' => 'Can Duplicate',
      'logical_delete' => 'Logical Deletion',
      'order' => 'Order',
      'sort_by' => 'Sort By',
      'sort_order' => 'Sort',
      'text_format' => 'Format',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
      'has_uuid' => 'UUID',
    ),
    'ja' => 
    array (
      'table' => 'モデル',
      'Model' => 'モデル',
      'Models' => 'モデル',
      'ID' => 'ID',
      'Name' => '名前',
      'Label' => 'ラベル',
      'Plural' => '複数形',
      'Description' => '説明',
      'Version' => 'バージョン',
      'Do not output file(s)' => 'ファイル出力しない',
      'File Out Path' => 'ファイル出力パス',
      'Primary' => 'プライマリ',
      'Child Models' => '子モデル',
      'Display in System' => 'システムに表示',
      'Child of WorkSpace' => 'スペースの子テーブル',
      'Accept Comments' => 'コメントを許可',
      'Display in WorkSpace' => 'スペースに表示',
      'Menu Type' => 'メニュータイプ',
      'Display in Dashboard' => 'ダッシュボードに表示',
      'Show Activity' => 'アクティビティを表示',
      'Taggable' => 'タグ付け',
      'Taxonomy' => '情報分類',
      'Sortable' => 'ソート可',
      'Auditing' => '自動監査',
      'Not Delete' => '削除不可',
      'API' => 'API',
      'Template Tags' => 'テンプレート・タグ',
      'Expiration Date' => '有効期限対応',
      'Has Status' => 'ステータス対応',
      'Has Assets' => 'アセット',
      'Has Extra Path' => 'ディレクトリ・パス',
      'Has Basename' => 'ベースネーム',
      'Allow Identical Basename' => 'ベースネームの重複を許可',
      'Has Form' => 'フォーム',
      'Assign User' => 'ユーザーをアサイン',
      'Hierarchy' => '階層',
      'Dialog View' => 'ダイアログ・ビュー',
      'Default Status' => 'ステータス(既定値)',
      'Revisable' => 'リビジョン対応',
      'Max Revisions' => '最大リビジョン数',
      'Import &amp; Export' => 'インポート &amp; エクスポート',
      'Has Attachments' => '添付ファイル',
      'Can Duplicate' => '複製',
      'Logical Deletion' => '論理削除',
      'Order' => '表示順',
      'Sort By' => 'ソート設定',
      'Sort' => 'ソート',
      'Format' => 'フォーマット',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
      'UUID' => 'UUID',
    ),
  ),
);