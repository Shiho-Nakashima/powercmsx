<?php $this->get_cache=array (
  'label' => 'Text2OgImage',
  'id' => 'text2ogimage',
  'component' => 'Text2OgImage',
  'description' => 'Generate og:image from text.',
  'version' => '1.2',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'text2ogimage_model' => 'urlinfo',
    'text2ogimage_realtime' => false,
    'text2ogimage_at_preview' => true,
    'text2ogimage_fonts' => 'Noto Sans JP,M PLUS Rounded 1c,BIZ UDPGothic,BIZ UDPMincho,Zen Maru Gothic,Noto Serif JP,Kaisei Opti,RocknRoll One',
  ),
  'settings' => 
  array (
    'text2ogimage_use_system_setting' => false,
    'text2ogimage_extension' => 'png',
    'text2ogimage_bg_image_path' => '',
    'text2ogimage_basename' => '<mt:var name="model">-<mt:var name="id">-og_image',
    'text2ogimage_font_color' => '#000000',
    'text2ogimage_mask_color' => '#ffffff',
    'text2ogimage_ruby_color' => '#000000',
    'text2ogimage_canvas_webfont' => true,
    'text2ogimage_font_size' => 340,
    'text2ogimage_quality' => 50,
    'text2ogimage_coefficient' => '0.5',
    'text2ogimage_auto_fontsize' => false,
    'text2ogimage_text_align' => 'left',
    'text2ogimage_padding_right' => 5,
    'text2ogimage_padding_left' => 5,
    'text2ogimage_padding_top' => 5,
    'text2ogimage_padding_bottom' => 5,
    'text2ogimage_canvas_font_face' => 'Noto Sans JP',
    'text2ogimage_canvas_font_weight' => 700,
    'text2ogimage_canvas_font' => 'sans-serif',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'hooks' => 
  array (
    'text2ogimage_post_run' => 
    array (
      'post_run' => 
      array (
        'component' => 'Text2OgImage',
        'priority' => 1,
        'method' => 'post_run',
      ),
    ),
    'text2ogimage_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'Text2OgImage',
        'priority' => 1,
        'method' => 'post_init',
      ),
    ),
  ),
  'tags' => 
  array (
    'function' => 
    array (
      'text2ogimage' => 
      array (
        'component' => 'Text2OgImage',
        'method' => 'hdlr_text2ogimage',
      ),
    ),
  ),
  'methods' => 
  array (
    'editor_ogimage' => 
    array (
      'component' => 'Text2OgImage',
      'method' => 'editor_ogimage',
    ),
  ),
  'callbacks' => 
  array (
    'text2ogimage_template_source_edit' => 
    array (
      'simplifiedjapanese_helper' => 
      array (
        'template_source' => 
        array (
          'component' => 'Text2OgImage',
          'priority' => 11,
          'method' => 'insert_button',
        ),
      ),
    ),
  ),
  'tasks' => 
  array (
    'text2ogimage_remove_unpublish_ogimage' => 
    array (
      'label' => 'Delete og:image of Unpublish Objects',
      'component' => 'Text2OgImage',
      'method' => 'remove_unpublish_ogimage',
      'frequency' => 43200,
      'priority' => 100,
    ),
  ),
);