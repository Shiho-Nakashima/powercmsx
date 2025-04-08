<?php $this->get_cache=array (
  'label' => 'URLマップ',
  'plural' => 'URL Maps',
  'version' => '2.75',
  'auditing' => 1,
  'display_system' => 1,
  'sortable' => 1,
  'order' => 30,
  'primary' => 'name',
  'menu_type' => 2,
  'display_space' => 1,
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
    'model' => 
    array (
      'type' => 'string',
      'size' => 50,
      'not_null' => 1,
    ),
    'mapping' => 
    array (
      'type' => 'text',
      'not_null' => 1,
    ),
    'container' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'container_scope' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'skip_empty' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'triggers' => 
    array (
      'type' => 'relation',
    ),
    'trigger_scope' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
    ),
    'template_id' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'date_based' => 
    array (
      'type' => 'string',
      'size' => 50,
    ),
    'fiscal_start' => 
    array (
      'type' => 'int',
      'size' => 11,
      'not_null' => 1,
    ),
    'publish_file' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'is_preferred' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
      'default' => '0',
    ),
    'link_status' => 
    array (
      'type' => 'tinyint',
      'size' => 4,
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
    'workspace_id' => 
    array (
      'type' => 'int',
      'size' => 11,
      'default' => '0',
    ),
    'order' => 
    array (
      'type' => 'int',
      'size' => 11,
    ),
    'compiled' => 
    array (
      'type' => 'text',
    ),
    'cache_key' => 
    array (
      'type' => 'string',
      'size' => 255,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 'id',
    'name' => 'name',
    'model' => 'model',
    'container' => 'container',
    'template_id' => 'template_id',
    'date_based' => 'date_based',
    'fiscal_start' => 'fiscal_start',
    'publish_file' => 'publish_file',
    'is_preferred' => 'is_preferred',
    'created_on' => 'created_on',
    'modified_on' => 'modified_on',
    'created_by' => 'created_by',
    'modified_by' => 'modified_by',
    'workspace_id' => 'workspace_id',
    'order' => 'order',
  ),
  'sort_by' => 
  array (
    'id' => 'ascend',
  ),
  'options' => 
  array (
    'date_based' => 'Yearly,Fiscal-Yearly,Monthly,Daily',
    'publish_file' => 'Dynamic,Static,Static(Delayed),On-Demand,Queue,Manually',
  ),
  'unique' => 
  array (
    0 => 'name',
  ),
  'disp_edit' => 
  array (
    'template_id' => 'relation',
    'publish_file' => 'select',
  ),
  'autoset' => 
  array (
    0 => 'created_on',
    1 => 'modified_on',
    2 => 'created_by',
    3 => 'modified_by',
  ),
  'translate' => 
  array (
    0 => 'model',
    1 => 'container',
    2 => 'triggers',
    3 => 'date_based',
  ),
  'child_tables' => 
  array (
    0 => 'urlinfo',
  ),
  'relations' => 
  array (
    'triggers' => 'table',
  ),
  'edit_properties' => 
  array (
    'id' => 'hidden',
    'name' => 'primary',
    'model' => 'text',
    'mapping' => 'text',
    'container' => 'text',
    'triggers' => 'relation:table:plural:checkbox',
    'template_id' => 'relation:template:name:dialog',
    'date_based' => 'selection',
    'publish_file' => 'selection',
    'is_preferred' => 'checkbox',
    'link_status' => 'hidden',
    'order' => 'number',
  ),
  'list_properties' => 
  array (
    'id' => 'number',
    'name' => 'primary',
    'model' => 'text',
    'mapping' => 'text_short',
    'container' => 'text',
    'triggers' => 'reference:table:plural',
    'trigger_scope' => 'checkbox',
    'template_id' => 'reference:template:name',
    'date_based' => 'text',
    'publish_file' => 'text',
    'is_preferred' => 'checkbox',
    'modified_on' => 'datetime',
    'modified_by' => 'reference:user:nickname',
    'workspace_id' => 'reference:workspace:name',
    'order' => 'number',
  ),
  'default_list_items' => 
  array (
    0 => 'name',
    1 => 'model',
    2 => 'container',
    3 => 'mapping',
    4 => 'triggers',
    5 => 'template_id',
    6 => 'order',
    7 => 'modified_by',
    8 => 'workspace_id',
  ),
  'column_labels' => 
  array (
    'model' => 'Archive Type',
    'container_scope' => 'Scope of Container',
    'triggers' => 'Rebuild Triggers',
    'is_preferred' => 'Prioritize',
    'trigger_scope' => 'Scope of Triggers',
  ),
  'extras' => 
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
  'labels' => 
  array (
    'id' => 'ID',
    'name' => 'Name',
    'model' => 'Archive Type',
    'mapping' => 'URL Map',
    'container' => 'Container',
    'container_scope' => 'Scope of Container',
    'skip_empty' => 'Skip Empty',
    'triggers' => 'Rebuild Triggers',
    'trigger_scope' => 'Scope of Triggers',
    'template_id' => 'View',
    'date_based' => 'Date-Based',
    'fiscal_start' => 'Fiscal Year Start',
    'publish_file' => 'Publish the File',
    'is_preferred' => 'Prioritize',
    'link_status' => 'Linked with Status',
    'created_on' => 'Date Created',
    'modified_on' => 'Date Modified',
    'created_by' => 'Created By',
    'modified_by' => 'Modified By',
    'workspace_id' => 'WorkSpace',
    'order' => 'Order',
    'compiled' => 'Compiled',
    'cache_key' => 'Cache Key',
  ),
  'locale' => 
  array (
    'default' => 
    array (
      'id' => 'ID',
      'name' => 'Name',
      'model' => 'Archive Type',
      'mapping' => 'URL Map',
      'container' => 'Container',
      'container_scope' => 'Scope of Container',
      'skip_empty' => 'Skip Empty',
      'triggers' => 'Rebuild Triggers',
      'trigger_scope' => 'Scope of Triggers',
      'template_id' => 'View',
      'date_based' => 'Date-Based',
      'fiscal_start' => 'Fiscal Year Start',
      'publish_file' => 'Publish the File',
      'is_preferred' => 'Prioritize',
      'link_status' => 'Linked with Status',
      'created_on' => 'Date Created',
      'modified_on' => 'Date Modified',
      'created_by' => 'Created By',
      'modified_by' => 'Modified By',
      'workspace_id' => 'WorkSpace',
      'order' => 'Order',
      'compiled' => 'Compiled',
      'cache_key' => 'Cache Key',
    ),
    'ja' => 
    array (
      'urlmapping' => 'URLマップ',
      'URL Map' => 'URLマップ',
      'URL Maps' => 'URLマップ',
      'ID' => 'ID',
      'Name' => '名前',
      'Archive Type' => 'アーカイブ種別',
      'Container' => 'コンテナ',
      'Scope of Container' => 'コンテナのスコープ',
      'Skip Empty' => 'スキップ',
      'Rebuild Triggers' => '再構築トリガー',
      'Scope of Triggers' => 'トリガーのスコープ',
      'View' => 'ビュー',
      'Date-Based' => '日付ベース',
      'Fiscal Year Start' => '年度の開始月',
      'Publish the File' => 'ファイル出力',
      'Prioritize' => '優先',
      'Linked with Status' => 'ステータスと連動',
      'Date Created' => '作成日',
      'Date Modified' => '更新日',
      'Created By' => '作成者',
      'Modified By' => '更新者',
      'WorkSpace' => 'スペース',
      'Order' => '表示順',
      'Compiled' => 'コンパイル済',
      'Cache Key' => 'キャッシュ・キー',
    ),
  ),
);