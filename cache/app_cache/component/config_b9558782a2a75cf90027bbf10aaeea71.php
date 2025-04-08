<?php $this->get_cache=array (
  'label' => 'SimplifiedJapanese',
  'id' => 'simplifiedjapanese',
  'component' => 'SimplifiedJapanese',
  'version' => '1.854',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'It support make a Simplified Japanese.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'settings' => 
  array (
    'simplifiedjapanese_whole_dictionary' => false,
    'simplifiedjapanese_use_whole_dict' => false,
    'simplifiedjapanese_separator' => '&nbsp;&nbsp;',
    'simplifiedjapanese_caching' => true,
    'simplifiedjapanese_add_button' => false,
    'simplifiedjapanese_add_rp' => false,
    'simplifiedjapanese_split_in_editor' => false,
    'simplifiedjapanese_split_in_editor_s' => false,
    'simplifiedjapanese_ruby_in_editor_s' => false,
    'simplifiedjapanese_add_rt_style' => true,
    'simplifiedjapanese_bgcolor' => '#ffffff',
    'simplifiedjapanese_forecolor' => '#000000',
    'simplifiedjapanese_font' => 'sans-serif',
    'simplifiedjapanese_google_font' => true,
    'simplifiedjapanese_font_face' => 'BIZ UDPGothic',
    'simplifiedjapanese_font_weight' => 400,
    'simplifiedjapanese_morphological' => false,
    'simplifiedjapanese_custom_style' => '',
    'simplifiedjapanese_detect_chinese' => false,
    'simplifiedjapanese_summarize' => false,
    'simplifiedjapanese_summarize_size' => 2,
    'simplifiedjapanese_can_audio' => false,
    'simplifiedjapanese_pitch' => 'default',
    'simplifiedjapanese_rate' => 'default',
    'simplifiedjapanese_voice' => 'Mizuki',
    'simplifiedjapanese_aws_id' => '',
    'simplifiedjapanese_aws_secret' => '',
    'simplifiedjapanese_aws_region' => 'ap-northeast-1',
    'simplifiedjapanese_mode_email' => false,
    'simplifiedjapanese_bracket_start' => '(',
    'simplifiedjapanese_bracket_end' => ')',
    'simplifiedjapanese_translate' => false,
    'simplifiedjapanese_editor_only' => false,
    'tsutaeru_access_token' => '',
    'tsutaeru_client_id' => '9663b1ff-06e4-4035-b31e-efe1276a267b',
    'tsutaeru_client_secret' => '1a3a1310-e849-4802-b6f9-3985408e42a7',
  ),
  'config_settings' => 
  array (
    'simplifiedjapanese_mecab_path' => '/usr/local/bin/mecab',
    'simplifiedjapanese_cabocha_path' => '/usr/local/bin/cabocha',
    'simplifiedjapanese_estcmd_path' => '/usr/local/bin/estcmd',
    'simplifiedjapanese_mecab_dict_index_path' => '/usr/local/libexec/mecab/mecab-dict-index',
    'simplifiedjapanese_mecab_dic_path' => '/usr/local/lib/mecab/dic/ipadic',
    'simplifiedjapanese_wkhtmltopdf_path' => '/usr/local/bin/wkhtmltopdf',
    'simplifiedjapanese_wkhtmltoimage_path' => '/usr/local/bin/wkhtmltoimage',
    'simplifiedjapanese_image_quality' => 5,
    'simplifiedjapanese_dic_path' => '',
    'simplifiedjapanese_wkhtmltopdf' => false,
    'simplifiedjapanese_wkhtmltoimage' => false,
    'simplifiedjapanese_can_embed_draft' => false,
    'simplifiedjapanese_cache_expires' => 613200,
    'simplifiedjapanese_assets_base' => '',
    'simplifiedjapanese_remove_conjunctions' => true,
    'simplifiedjapanese_ruby_length' => 3,
    'simplifiedjapanese_editor_history' => 10,
    'simplifiedjapanese_exception_all' => true,
    'simplifiedjapanese_mp3_by_scope' => true,
    'simplifiedjapanese_mp3_by_month' => -1,
    'simplifiedjapanese_fonts' => 'Noto Sans JP,M PLUS 1p,M PLUS Rounded 1c,BIZ UDPGothic,BIZ UDPMincho,Zen Maru Gothic,Noto Serif JP,Kaisei Opti,RocknRoll One',
    'simplifiedjapanese_google_font_url' => 'https://fonts.googleapis.com/css2?',
    'simplifiedjapanese_ffprobe_path' => '',
    'simplifiedjapanese_ffmpeg_path' => '',
    'simplifiedjapanese_caption_js_tmpl' => 'js_caption_player.tmpl',
    'simplifiedjapanese_caption_ext' => 'js',
    'simplifiedjapanese_audio_id' => 'audio-player',
    'simplifiedjapanese_caption_id' => 'caption-area',
    'simplifiedjapanese_caption_backcolor' => 'black',
    'simplifiedjapanese_caption_forecolor' => 'white',
    'simplifiedjapanese_caption_align' => 'center',
    'simplifiedjapanese_reflects_dates' => true,
    'simplifiedjapanese_api_endpoint' => '',
    'simplifiedjapanese_furigana_queue_per' => 100,
    'simplifiedjapanese_furigana_force_queue' => false,
    'simplifiedjapanese_furigana_api_only' => false,
    'simplifiedjapanese_furigana_default_arg' => 1,
    'simplifiedjapanese_furigana_default_map' => 'furigana/<mt:var name="current_archive_type"><mt:if name="archive_date_based">/<mt:var name="current_container">/<mt:archivedate format="Ymd"></mt:if>/<mt:var name="current_object_id">.json',
    'simplifiedjapanese_pdf_header_footer' => false,
    'simplifiedjapanese_pdf_page_number' => false,
    'tsutaeru_token_endpoint' => 'https://tsutaeru.cloud/api/token/index.php',
    'tsutaeru_parse_endpoint' => 'https://tsutaeru.cloud/api/parse/index.php',
    'tsutaeru_simplified_endpoint' => 'https://tsutaeru.cloud/api/simplified/index.php',
  ),
  'menus' => 
  array (
    'simplifiedjapanese_helper' => 
    array (
      'display_system' => 1,
      'display_space' => 1,
      'component' => 'SimplifiedJapanese',
      'mode' => 'simplifiedjapanese_helper',
      'label' => 'Simplified Japanese',
      'order' => 1500,
    ),
  ),
  'methods' => 
  array (
    'simplifiedjapanese_helper' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_helper',
    ),
    'simplifiedjapanese_content_css' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_content_css',
    ),
    'simplifiedjapanese_get_phonetic' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_get_phonetic',
    ),
    'simplifiedjapanese_export_img' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_export_img',
    ),
    'simplifiedjapanese_export_pdf' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_export_pdf',
    ),
    'simplifiedjapanese_export_word' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_export_word',
    ),
    'simplifiedjapanese_export_mp3' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_export_mp3',
    ),
    'simplifiedjapanese_proxy' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_proxy',
      'requires_login' => false,
    ),
    'simplifiedjapanese_tmp_save' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_tmp_save',
    ),
    'simplifiedjapanese_tmp_restore' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_tmp_restore',
    ),
    'simplifiedjapanese_tmp_delete' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_tmp_delete',
    ),
    'simplifiedjapanese_json_preview' => 
    array (
      'component' => 'SimplifiedJapanese',
      'method' => 'simplifiedjapanese_json_preview',
    ),
  ),
  'api_methods' => 
  array (
    'v1' => 
    array (
      'dynamic_furigana_json' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'dynamic_furigana_json',
        'requires_login' => false,
        'allowed' => 
        array (
          0 => 'GET',
          1 => 'POST',
        ),
      ),
      'get_furigana_mapping' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'get_furigana_mapping',
        'requires_login' => false,
        'allowed' => 
        array (
          0 => 'GET',
          1 => 'POST',
        ),
      ),
    ),
  ),
  'list_actions' => 
  array (
    'urlmapping_furigana_settings' => 
    array (
      'urlmapping' => 
      array (
        'action_urlmapping_set_furigana_settings' => 
        array (
          'name' => 'urlmapping_furigana_settings',
          'label' => 'Generate JSON for Furigana',
          'component' => 'SimplifiedJapanese',
          'method' => 'urlmapping_furigana_settings',
          'columns' => '*',
          'input' => 0,
          'order' => 200,
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'function' => 
    array (
      'makemp3' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'hdlr_makemp3',
      ),
      'furiganajsonurl' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'hdlr_furiganajsonurl',
      ),
    ),
    'modifier' => 
    array (
      'furigana' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'filter_furigana',
      ),
      'hiragana' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'filter_hiragana',
      ),
      'katakana' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'filter_katakana',
      ),
      'ssml2furigana' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'filter_ssml2furigana',
      ),
      'textnode_furigana_to_json' => 
      array (
        'component' => 'SimplifiedJapanese',
        'method' => 'filter_textnode_to_json',
      ),
    ),
  ),
  'hooks' => 
  array (
    'simplifiedjapanese_post_run' => 
    array (
      'post_run' => 
      array (
        'component' => 'SimplifiedJapanese',
        'priority' => 1,
        'method' => 'simplifiedjapanese_post_run',
      ),
    ),
    'simplifiedjapanese_take_down' => 
    array (
      'take_down' => 
      array (
        'component' => 'SimplifiedJapanese',
        'priority' => 1,
        'method' => 'take_down',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'simplifiedjapanese_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'insert_button',
        ),
      ),
    ),
    'simplifiedjapanese_post_import_user_dic' => 
    array (
      'user_dic' => 
      array (
        'post_import' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'post_import_user_dic',
        ),
      ),
    ),
    'simplifiedjapanese_pre_save_user_dic' => 
    array (
      'user_dic' => 
      array (
        'pre_save' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'pre_save_user_dic',
        ),
      ),
    ),
    'simplifiedjapanese_post_save_user_dic' => 
    array (
      'user_dic' => 
      array (
        'post_save' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'post_save_user_dic',
        ),
      ),
    ),
    'simplifiedjapanese_post_delete_user_dic' => 
    array (
      'user_dic' => 
      array (
        'post_delete' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'post_save_user_dic',
        ),
      ),
    ),
    'simplifiedjapanese_post_save_workspace' => 
    array (
      'workspace' => 
      array (
        'post_save' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'post_save_workspace',
        ),
      ),
    ),
    'simplifiedjapanese_post_delete_workspace' => 
    array (
      'workspace' => 
      array (
        'post_delete' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'post_delete_workspace',
        ),
      ),
    ),
    'simplifiedjapanese_post_save_urlmapping' => 
    array (
      'urlmapping' => 
      array (
        'post_save' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 5,
          'method' => 'post_save_urlmapping',
        ),
      ),
    ),
    'simplifiedjapanese_post_publish' => 
    array (
      'template' => 
      array (
        'post_publish' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'post_publish',
        ),
      ),
    ),
    'simplifiedjapanese_dynamic_view' => 
    array (
      'urlinfo' => 
      array (
        'dynamic_view' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'dynamic_view',
        ),
      ),
    ),
    'simplifiedjapanese_post_preview' => 
    array (
      'preview' => 
      array (
        'post_preview' => 
        array (
          'component' => 'SimplifiedJapanese',
          'priority' => 10,
          'method' => 'post_preview',
        ),
      ),
    ),
  ),
  'tasks' => 
  array (
    'simplifiedjapanese_remove_old_cache' => 
    array (
      'label' => 'Remove Old Cache for Simplified Japanese',
      'component' => 'SimplifiedJapanese',
      'priority' => 100,
      'method' => 'remove_old_cache',
      'frequency' => 86400,
    ),
    'simplifiedjapanese_recreate_dictionaries' => 
    array (
      'label' => 'Regenerate User\'s Dictionaries',
      'component' => 'SimplifiedJapanese',
      'priority' => 100,
      'method' => 'regenerate_dictionaries',
      'frequency' => 3600,
    ),
  ),
);