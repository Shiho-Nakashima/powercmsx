<?php $this->get_cache=array (
  'label' => 'MachineTranslator',
  'id' => 'machinetranslator',
  'component' => 'MachineTranslator',
  'description' => 'Translate your content using Microsoft Translator.',
  'version' => '1.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'settings' => 
  array (
    'machinetranslator_end_point' => 'https://api.cognitive.microsofttranslator.com/translate',
    'machinetranslator_subscription_key' => '',
    'machinetranslator_region' => '',
    'machinetranslator_api_version' => '3.0',
    'machinetranslator_translate_from' => 'ja',
    'machinetranslator_translate_to' => 'en',
    'machinetranslator_translate_page' => false,
    'machinetranslator_tracking' => false,
    'machinetranslator_exclude_urls' => '',
    'machinetranslator_exclude_classes' => '',
    'machinetranslator_hidden_classes' => '',
    'machinetranslator_ucwords_classes' => '',
    'machinetranslator_block_classes' => '',
    'machinetranslator_individuals' => '',
    'machinetranslator_footer_html' => '',
    'machinetranslator_trans_footer' => false,
    'machinetranslator_use_system_settings' => false,
  ),
  'config_settings' => 
  array (
    'machinetranslator_mb_languages' => 
    array (
      0 => 'ja',
      1 => 'zh-Hans',
      2 => 'zh-Hant',
    ),
    'machinetranslator_cookie_name' => 'pt-mt-language',
    'machinetranslator_no_convert_class' => 'pt-mt-no-convert',
    'machinetranslator_trans_attrs' => false,
    'machinetranslator_trans_meta' => false,
    'machinetranslator_language_all' => false,
    'machinetranslator_can_bot' => false,
    'machinetranslator_logging' => true,
    'machinetranslator_no_index' => true,
    'machinetranslator_exclude_post' => true,
    'machinetranslator_async_api' => '',
    'machinetranslator_exclude_cookie' => 'pt-mt-is-exclude',
    'machinetranslator_caching' => true,
    'machinetranslator_cache_expires' => 21600,
    'machinetranslator_cookie_expires' => 3600,
    'machinetranslator_bracket_individual' => true,
    'machinetranslator_virtual' => 
    array (
    ),
    'machinetranslator_show_loader' => 35000,
    'machinetranslator_loader_interval' => 2500,
    'machinetranslator_ruby_force_html' => false,
    'machinetranslator_loader' => '',
    'machinetranslator_loader_image' => '',
    'machinetranslator_auto_detect' => false,
    'machinetranslator_keep_original' => false,
    'machinetranslator_redirectto_org' => true,
    'machinetranslator_japanese_check' => false,
    'machinetranslator_difficulty_check' => false,
    'machinetranslator_japanese_check_len' => 62,
    'machinetranslator_kanji_characters' => 7,
    'machinetranslator_katakana_characters' => 7,
    'machinetranslator_hiragana_characters' => 13,
    'machinetranslator_tsutaeru_web' => 'https://tsutaeru.cloud/api/simplified/translator.php',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'machinetranslator_translate' => 
    array (
      'component' => 'MachineTranslator',
      'method' => 'machinetranslator_translate',
    ),
    'machinetranslator_settings' => 
    array (
      'component' => 'MachineTranslator',
      'method' => 'machinetranslator_settings',
    ),
    'machinetranslator_japanese_check' => 
    array (
      'component' => 'MachineTranslator',
      'method' => 'machinetranslator_japanese_check',
    ),
    'machinetranslator_detect_language' => 
    array (
      'component' => 'MachineTranslator',
      'method' => 'machinetranslator_detect_language',
    ),
  ),
  'callbacks' => 
  array (
    'machinetranslator_post_save_mt_dic' => 
    array (
      'mt_dic' => 
      array (
        'post_save' => 
        array (
          'component' => 'MachineTranslator',
          'priority' => 10,
          'method' => 'post_save_mt_dic',
        ),
      ),
    ),
    'machinetranslator_post_delete_mt_dic' => 
    array (
      'mt_dic' => 
      array (
        'post_delete' => 
        array (
          'component' => 'MachineTranslator',
          'priority' => 10,
          'method' => 'post_save_mt_dic',
        ),
      ),
    ),
    'machinetranslator_post_publish' => 
    array (
      'template' => 
      array (
        'post_publish' => 
        array (
          'component' => 'MachineTranslator',
          'priority' => 1,
          'method' => 'post_publish',
        ),
      ),
    ),
    'machinetranslator_start_publish' => 
    array (
      'template' => 
      array (
        'start_publish' => 
        array (
          'component' => 'MachineTranslator',
          'priority' => 1,
          'method' => 'start_publish',
        ),
      ),
    ),
    'machinetranslator_dynamic_view' => 
    array (
      'urlinfo' => 
      array (
        'dynamic_view' => 
        array (
          'component' => 'MachineTranslator',
          'priority' => 10,
          'method' => 'dynamic_view',
        ),
      ),
    ),
    'machinetranslator_virtual' => 
    array (
      'template' => 
      array (
        '404-error' => 
        array (
          'component' => 'MachineTranslator',
          'priority' => 10,
          'method' => 'machinetranslator_virtual',
        ),
      ),
    ),
    'machinetranslator_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'MachineTranslator',
          'priority' => 7,
          'method' => 'insert_button',
        ),
      ),
    ),
    'machinetranslator_simplifiedjapanese_helper' => 
    array (
      'simplifiedjapanese_helper' => 
      array (
        'template_source' => 
        array (
          'component' => 'MachineTranslator',
          'priority' => 7,
          'method' => 'insert_button',
        ),
      ),
    ),
  ),
);