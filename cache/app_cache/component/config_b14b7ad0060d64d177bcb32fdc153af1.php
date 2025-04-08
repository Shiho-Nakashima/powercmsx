<?php $this->get_cache=array (
  'label' => 'BannedWords',
  'id' => 'bannedwords',
  'component' => 'BannedWords',
  'version' => '3.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'It provides check words which should not be used.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'bannedwords_editor_proofread' => 
    array (
      'component' => 'BannedWords',
      'method' => 'editor_proofread',
    ),
    'bannedwords_apply_proofread' => 
    array (
      'component' => 'BannedWords',
      'method' => 'apply_proofread',
    ),
  ),
  'settings' => 
  array (
    'bannedwords_rules' => '',
    'bannedwords_not_normalize' => '⓪①②③④⑤⑥⑦⑧⑨⑩⑪⑫⑬⑭⑮⑯⑰⑱⑲⑳㉑㉒㉓㉔㉕㉖㉗㉘㉙㉚㉛㉜㉝㉞㉟㊱㊲㊳㊴㊵㊶㊷㊸㊹㊺㊻㊼㊽㊾㊿',
    'bannedwords_models' => 'entry,page,tag',
    'bannedwords_convert_kanji_level' => 0,
    'bannedwords_inheritance' => 0,
    'bannedwords_convert_normalize' => 0,
    'bannedwords_convert_non_common' => 0,
    'bannedwords_convert_ra_nuki' => 0,
    'bannedwords_convert_sa_ire' => 0,
    'bannedwords_convert_go_on' => 0,
    'bannedwords_convert_variante' => 0,
    'bannedwords_convert_suffixes' => 0,
    'bannedwords_convert_wareki' => 0,
    'bannedwords_convert_date' => 0,
    'bannedwords_convert_time' => 0,
    'bannedwords_convert_twelve_hour' => 0,
    'bannedwords_convert_kana' => 0,
    'bannedwords_convert_alphabet' => 0,
    'bannedwords_convert_number' => 0,
    'bannedwords_convert_conjunction' => 0,
    'bannedwords_convert_adverb' => 0,
    'bannedwords_remove_adverb' => 0,
    'bannedwords_convert_maybe' => 0,
    'bannedwords_ty_long_sound' => 0,
    'bannedwords_convert_possible_verbs' => 0,
    'bannedwords_convert_kana_end' => 0,
    'bannedwords_convert_diff' => 1,
    'bannedwords_remove_final_particle' => 0,
    'bannedwords_diff_selected' => 1,
    'bannedwords_convert_sentence_end' => 0,
    'bannedwords_allow_end_nominal' => 0,
    'bannedwords_ambiguous' => 0,
    'bannedwords_notation_check' => 0,
    'bannedwords_exclude_quote' => 'blockquote,cite,ruby',
    'bannedwords_exclude_cite' => 0,
    'bannedwords_only_editor' => 0,
    'bannedwords_editor_select' => 0,
    'bannedwords_force' => 0,
  ),
  'config_settings' => 
  array (
    'bannedwords_kana_dic_path' => '',
  ),
  'hooks' => 
  array (
    'bannedwords_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'BannedWords',
        'priority' => 1,
        'method' => 'post_init',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'bannedwords_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'BannedWords',
          'priority' => 11,
          'method' => 'insert_button',
        ),
      ),
    ),
    'bannedwords_simplifiedjapanese_helper' => 
    array (
      'simplifiedjapanese_helper' => 
      array (
        'template_source' => 
        array (
          'component' => 'BannedWords',
          'priority' => 11,
          'method' => 'insert_button',
        ),
      ),
    ),
  ),
);