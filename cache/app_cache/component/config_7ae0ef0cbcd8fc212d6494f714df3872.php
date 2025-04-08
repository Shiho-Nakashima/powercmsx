<?php $this->get_cache=array (
  'label' => 'Minifier',
  'id' => 'minifier',
  'component' => 'Minifier',
  'version' => '1.3',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Minifying HTML, JavaScript, CSS code.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'minifier_preview' => false,
    'minifier_use_smarty' => false,
    'minifier_use_jshrink' => true,
  ),
  'settings' => 
  array (
    'minifier_minify_static' => false,
    'minifier_minify_dynamic' => false,
    'minifier_minify_html' => true,
    'minifier_minify_js' => true,
    'minifier_minify_css' => true,
  ),
  'tags' => 
  array (
    'block' => 
    array (
      'jsminifier' => 
      array (
        'component' => 'Minifier',
        'method' => 'hdlr_jsminifier',
      ),
      'cssminifier' => 
      array (
        'component' => 'Minifier',
        'method' => 'hdlr_cssminifier',
      ),
      'htmlminifier' => 
      array (
        'component' => 'Minifier',
        'method' => 'hdlr_htmlminifier',
      ),
    ),
  ),
  'config_overwrite' => 
  array (
    'publish_callbacks' => true,
  ),
  'callbacks' => 
  array (
    'minifier_post_rebuild' => 
    array (
      'template' => 
      array (
        'post_rebuild' => 
        array (
          'component' => 'Minifier',
          'priority' => 5,
          'method' => 'post_rebuild',
        ),
      ),
    ),
    'minifier_post_preview' => 
    array (
      'template' => 
      array (
        'post_preview' => 
        array (
          'component' => 'Minifier',
          'priority' => 5,
          'method' => 'post_preview',
        ),
      ),
    ),
  ),
);