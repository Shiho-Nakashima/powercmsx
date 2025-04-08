<?php $this->get_cache=array (
  'label' => 'Keywords',
  'id' => 'keywords',
  'component' => 'Keywords',
  'version' => '1.5',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Tags, Keywords, and Excerpt generate automatically. Also, automatically extract keywords and set links automatically.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'keywords_use_mecab' => false,
    'keywords_add_punctuation' => true,
    'keywords_mecab_path' => '/usr/local/bin/mecab',
    'keywords_estcmd_path' => '/usr/local/bin/estcmd',
    'keywords_mecab_dict_index_path' => '/usr/local/libexec/mecab/mecab-dict-index',
    'keywords_mecab_dic_path' => '/usr/local/lib/mecab/dic/ipadic',
  ),
  'settings' => 
  array (
    'keywords_auto_tags' => '',
    'keywords_auto_tag_model' => 'keyword',
    'keywords_auto_taxonomies' => '',
    'keywords_auto_taxonomy_model' => 'keyword',
    'keywords_auto_keywords' => '',
    'keywords_auto_excerpt' => '',
    'keywords_excerpt_length' => 200,
    'keywords_trim_excerpt' => '',
  ),
  'hooks' => 
  array (
    'keywords_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'Keywords',
        'priority' => 10,
        'method' => 'post_init',
      ),
    ),
    'keywords_post_run' => 
    array (
      'post_run' => 
      array (
        'component' => 'Keywords',
        'priority' => 1,
        'method' => 'keywords_post_run',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'keywords_post_save_keyword' => 
    array (
      'keyword' => 
      array (
        'post_save' => 
        array (
          'component' => 'Keywords',
          'priority' => 10,
          'method' => 'post_update_keyword',
        ),
      ),
    ),
    'keywords_post_delete_keyword' => 
    array (
      'keyword' => 
      array (
        'post_delete' => 
        array (
          'component' => 'Keywords',
          'priority' => 10,
          'method' => 'post_update_keyword',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'block' => 
    array (
      'autokeywords' => 
      array (
        'component' => 'Keywords',
        'method' => 'hdlr_autokeywords',
      ),
      'keyword2link' => 
      array (
        'component' => 'Keywords',
        'method' => 'hdlr_autokeywords',
      ),
    ),
    'modifier' => 
    array (
      'summarize' => 
      array (
        'component' => 'Keywords',
        'method' => 'filter_summarize',
      ),
    ),
  ),
);