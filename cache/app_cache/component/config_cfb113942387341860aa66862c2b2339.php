<?php $this->get_cache=array (
  'label' => 'HTMLImporter',
  'id' => 'htmlimporter',
  'component' => 'HTMLImporter',
  'version' => '2.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'doc_link' => 'https://powercmsx.jp/about/html_importer_plugin.html',
  'description' => 'Provide data migration function from HTML by specifying URLs or upload ZipArchive.',
  'config_settings' => 
  array (
    'htmlimporter_timeout' => 15,
    'htmlimporter_setting_by_scope' => false,
    'htmlimporter_setting_by_user' => false,
    'htmlimporter_show_import_from' => false,
    'htmlimporter_href_to_relative' => true,
    'htmlimporter_use_curl' => true,
    'htmlimporter_force_basename' => false,
    'htmlimporter_print_separator_error' => false,
    'htmlimporter_settings_paths' => 
    array (
    ),
    'html_importer_report_encoding' => '',
  ),
  'methods' => 
  array (
    'html_importer_send_urls' => 
    array (
      'component' => 'HTMLImporter',
      'method' => 'html_importer_send_urls',
    ),
    'html_importer_get_settings' => 
    array (
      'component' => 'HTMLImporter',
      'method' => 'html_importer_get_settings',
    ),
    'html_importer_apply_settings' => 
    array (
      'component' => 'HTMLImporter',
      'method' => 'html_importer_apply_settings',
    ),
    'html_importer_save_settings' => 
    array (
      'component' => 'HTMLImporter',
      'method' => 'html_importer_save_settings',
    ),
    'html_importer_export_settings' => 
    array (
      'component' => 'HTMLImporter',
      'method' => 'html_importer_export_settings',
    ),
    'html_importer_report' => 
    array (
      'component' => 'HTMLImporter',
      'method' => 'html_importer_report',
    ),
  ),
  'hooks' => 
  array (
    'htmlimporter_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'HTMLImporter',
        'priority' => 1,
        'method' => 'htmlimporter_post_init',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'htmlimporter_pre_url_get' => 
    array (
      'htmlimporter' => 
      array (
        'pre_url_get' => 
        array (
          'component' => 'HTMLImporter',
          'priority' => 1,
          'method' => 'pre_url_get',
        ),
      ),
    ),
  ),
  'import_format' => 
  array (
    'html' => 
    array (
      'component' => 'HTMLImporter',
      'label' => 'HTML',
      'method' => 'import_html',
      'models' => 
      array (
        0 => 'entry',
        1 => 'page',
      ),
      'order' => 50,
      'options' => 
      array (
        0 => 'import_type',
        1 => 'auth_user',
        2 => 'auth_pwd',
        3 => 'html_digest_auth',
        4 => 'text_format',
        5 => 'title_perttern',
        6 => 'title_option',
        7 => 'meta_description',
        8 => 'meta_keywords',
        9 => 'meta_tags',
        10 => 'meta_ogimage',
        11 => 'body_perttern',
        12 => 'body_option',
        13 => 'field_settings',
        14 => 'overwrite_same',
        15 => 'import_assets',
        16 => 'create_categories',
        17 => 'asset_exts',
        18 => 'minifying_html',
        19 => 'remove_title',
        20 => 'create_report',
        21 => 'identifier',
        22 => 'setting_selector',
        23 => 'preprocessing',
        24 => 'preprocessing_replace',
        25 => 'js_to_asset',
        26 => 'css_to_asset',
      ),
    ),
  ),
);