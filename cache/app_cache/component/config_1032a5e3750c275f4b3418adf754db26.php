<?php $this->get_cache=array (
  'label' => 'HTMLTidy',
  'id' => 'htmltidy',
  'component' => 'HTMLTidy',
  'description' => 'Execute configured cleanup and repair operations on parsed markup.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'tidy_html5' => true,
    'tidy_cleanup' => false,
    'tidy_re_save_html' => false,
    'tidy_outputfilter' => false,
    'tidy_css_to_head' => false,
    'tidy_class_prefix' => 'tidy',
    'tidy_clean_table' => true,
    'tidy_clean_table_border' => true,
    'tidy_clean_table_zero_border' => true,
    'tidy_table_presentation_class' => '',
    'tidy_clean_image' => true,
    'tidy_clean_duplicate_alt' => 0,
    'tidy_clean_image_attrs' => 'longdesc,name',
    'tidy_clean_block_align' => true,
    'tidy_clean_br_clear' => true,
    'tidy_clean_a_href' => true,
    'tidy_clean_a_name' => false,
    'tidy_clean_font' => true,
    'tidy_clean_dl' => true,
    'tidy_clean_ul_ol' => true,
    'tidy_clean_area' => true,
    'tidy_clean_iframe' => true,
    'tidy_clean_lang' => 
    array (
      'jp' => 'ja',
    ),
    'tidy_clean_deprecated' => 
    array (
      'acronym' => 'abbr',
      's' => 'del',
      'strike' => 'del',
      'dir' => 'ul',
      'big' => 'span',
      'tt' => 'span',
      'u' => 'span',
      'center' => 'div',
    ),
    'tidy_clean_applet' => true,
    'tidy_clean_empty_attrs' => '',
    'tidy_clean_empty_a' => false,
    'tidy_clean_comment' => true,
    'tidy_clean_double_byte_space' => true,
    'tidy_repair_ldquo_rdquo' => false,
    'tidy_force_utf8' => true,
    'tidy_clean_code_point' => false,
    'tidy_html_wrap' => 0,
    'tidy_config' => 
    array (
    ),
  ),
  'config_overwrite' => 
  array (
    'publish_callbacks' => true,
  ),
  'settings' => 
  array (
    'htmltidy_exclude_petterns' => '',
    'htmltidy_exclude_string' => '',
    'htmltidy_replace_petterns' => '',
    'htmltidy_archive_types' => '',
    'htmltidy_body_pettern' => '',
    'htmltidy_use_system_setting' => 1,
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'tags' => 
  array (
    'modifier' => 
    array (
      'htmltidy' => 
      array (
        'component' => 'HTMLTidy',
        'method' => 'filter_htmltidy',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'htmltidy_post_preview' => 
    array (
      'preview' => 
      array (
        'post_preview' => 
        array (
          'component' => 'HTMLTidy',
          'priority' => 1,
          'method' => 'post_preview',
        ),
      ),
    ),
    'htmltidy_post_rebuild' => 
    array (
      'template' => 
      array (
        'post_rebuild' => 
        array (
          'component' => 'HTMLTidy',
          'priority' => 10,
          'method' => 'post_rebuild',
        ),
      ),
    ),
    'htmltidy_pre_publish' => 
    array (
      'blob' => 
      array (
        'pre_publish' => 
        array (
          'component' => 'HTMLTidy',
          'priority' => 10,
          'method' => 'pre_publish',
        ),
      ),
    ),
  ),
);