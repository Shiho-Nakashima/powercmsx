<?php $this->get_cache=array (
  'label' => 'スペース',
  'plural' => 'WorkSpaces',
  'version' => '2.55',
  'primary' => 'name',
  'display_system' => 1,
  'sortable' => 1,
  'order' => 20,
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
      'size' => 255,
      'not_null' => 1,
    ),
    'description' => 
    array (
      'type' => 'text',
    ),
    'copyright' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'site_url' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'site_path' => 
    array (
      'type' => 'string',
      'size' => 255,
      'not_null' => 1,
    ),
    'image' => 
    array (
      'type' => 'blob',
    ),
    'timezone' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'document_root' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'extra_path' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'asset_publish' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'show_path_entry' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'show_path_page' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'preview_url' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'link_url' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'show_both' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'accept_comment' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'comment_status' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'anonymous_comment' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'comment_thanks' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'enable_api' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'not_null' => 1,
      'default' => '0',
    ),
    'language' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'barcolor' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'bartextcolor' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
    'modified_on' => 
    array (
      'type' => 'datetime',
    ),
    'created_on' => 
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
    'last_update' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'name' => 'name',
    'site_url' => 'site_url',
    'site_path' => 'site_path',
    'order' => 'order',
    'modified_on' => 'modified_on',
    'created_on' => 'created_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'last_update' => 'last_update',
  ),
  'autoset' => 
  array (
    0 => 'modified_on',
    1 => 'created_on',
    2 => 'created_by',
    3 => 'modified_by',
  ),
  'sort_by' => 
  array (
    'order' => 'ascend',
  ),
  'options' => 
  array (
  ),
  'extras' => 
  array (
    'image' => ':::image',
  ),
  'child_tables' => 
  array (
    0 => 'permission',
    1 => 'tag',
  ),
  'translate' => 
  array (
    0 => 'preview_url',
    1 => 'link_url',
    2 => 'show_both',
  ),
  'hint' => 
  array (
    'document_root' => 'Please specify if the document root of the management screen and the document root of website are different.',
    'preview_url' => 'When previewing with a URL different from the URL of the management screen, please enter the URL of the PHP application.',
    'link_url' => 'When viewing with a URL different from the URL of the management screen, please enter the another URL of this website.',
    'show_both' => 'Check this if you want to display both links together.',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'description' => 'text',
    'copyright' => 'text',
    'site_url' => 'url',
    'order' => 'number',
    'accept_comment' => 'checkbox',
    'language' => 'text',
    'created_on' => 'datetime',
    'created_by' => 'reference:user:nickname',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'description' => 'textarea',
    'copyright' => 'text',
    'site_url' => 'url',
    'site_path' => 'text',
    'image' => 'file',
    'timezone' => 'text',
    'document_root' => 'text',
    'extra_path' => 'text_short',
    'asset_publish' => 'checkbox',
    'preview_url' => 'text',
    'link_url' => 'text',
    'show_both' => 'checkbox',
    'order' => 'number',
    'accept_comment' => 'checkbox',
    'enable_api' => 'checkbox',
    'language' => 'languages',
    'barcolor' => 'color',
    'bartextcolor' => 'color',
    'last_update' => 'hidden',
  ),
  'column_labels' => 
  array (
    'enable_api' => 'Enable API',
  ),
  'relations' => 
  array (
  ),
  'unique' => 
  array (
  ),
  'unchangeable' => 
  array (
  ),
  'validation_types' => 
  array (
  ),
  'maxlength' => 
  array (
  ),
  'disp_edit' => 
  array (
  ),
  'labels' => 
  array (
    'id' => 'ID',
    'name' => 'Name',
    'description' => 'Description',
    'copyright' => 'Copyright',
    'site_url' => 'Site URL',
    'site_path' => 'Site Path',
    'image' => 'Image',
    'timezone' => 'Timezone',
    'document_root' => 'Document Root',
    'extra_path' => 'Upload Path',
    'asset_publish' => 'Output the File',
    'show_path_entry' => 'Show Path of Entry',
    'show_path_page' => 'Show Path of Page',
    'preview_url' => 'Preview URL',
    'link_url' => 'Link URL',
    'show_both' => 'Show Both',
    'order' => 'Order',
    'accept_comment' => 'Accept Comments',
    'comment_status' => 'Comment Status',
    'anonymous_comment' => 'Anonymous Comment',
    'comment_thanks' => 'Thanks email',
    'enable_api' => 'Enable API',
    'language' => 'Language',
    'barcolor' => 'Bar Color',
    'bartextcolor' => 'Bar TextColor',
    'modified_on' => 'Date Modified',
    'created_on' => 'Date Created',
    'created_by' => 'Created By',
    'modified_by' => 'Modified By',
    'last_update' => 'Last Update',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'name' => 'Name',
      'description' => 'Description',
      'copyright' => 'Copyright',
      'site_url' => 'Site URL',
      'site_path' => 'Site Path',
      'image' => 'Image',
      'timezone' => 'Timezone',
      'document_root' => 'Document Root',
      'extra_path' => 'Upload Path',
      'asset_publish' => 'Output the File',
      'show_path_entry' => 'Show Path of Entry',
      'show_path_page' => 'Show Path of Page',
      'preview_url' => 'Preview URL',
      'link_url' => 'Link URL',
      'show_both' => 'Show Both',
      'order' => 'Order',
      'accept_comment' => 'Accept Comments',
      'comment_status' => 'Comment Status',
      'anonymous_comment' => 'Anonymous Comment',
      'comment_thanks' => 'Thanks email',
      'enable_api' => 'Enable API',
      'language' => 'Language',
      'barcolor' => 'Bar Color',
      'bartextcolor' => 'Bar TextColor',
      'modified_on' => 'Date Modified',
      'created_on' => 'Date Created',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
      'last_update' => 'Last Update',
    ),
    'ja' => 
    array (
      'workspace' => 'スペース',
      'WorkSpace' => 'スペース',
      'WorkSpaces' => 'スペース',
      'ID' => 'ID',
      'Name' => '名前',
      'Description' => '説明',
      'Copyright' => 'コピーライト',
      'Site URL' => 'サイトURL',
      'Site Path' => 'サイト・パス',
      'Image' => '画像',
      'Timezone' => 'タイムゾーン',
      'Document Root' => 'ドキュメント・ルート',
      'Upload Path' => 'アップロード・パス',
      'Output the File' => 'ファイルを出力',
      'Show Path of Entry' => '記事のパスを表示',
      'Show Path of Page' => 'ページのパスを表示',
      'Preview URL' => 'プレビューURL',
      'Link URL' => 'リンクURL',
      'Show Both' => '両方のリンクボタンを表示',
      'Order' => '表示順',
      'Accept Comments' => 'コメントを許可',
      'Comment Status' => 'Comment Status',
      'Anonymous Comment' => '匿名コメント',
      'Thanks email' => 'Thanks メール',
      'Enable API' => 'APIを有効化',
      'Language' => '言語',
      'Bar Color' => 'バーの色',
      'Bar TextColor' => 'バーの文字色',
      'Date Modified' => '更新日',
      'Date Created' => '作成日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
      'Last Update' => '最終更新',
    ),
  ),
);