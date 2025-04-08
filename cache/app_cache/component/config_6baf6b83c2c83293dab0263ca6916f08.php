<?php $this->get_cache=array (
  'label' => 'NuHtmlChecker',
  'id' => 'nuhtmlchecker',
  'component' => 'NuHtmlChecker',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'It helps you catch unintended mistakes in your HTML.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'settings' => 
  array (
    'nuhtmlchecker_agree' => false,
    'nuhtmlchecker_url' => 'https://validator.w3.org/nu/',
    'nuhtmlchecker_parse_result' => true,
    'nuhtmlchecker_caching' => true,
  ),
  'config_settings' => 
  array (
    'nuhtmlchecker_debug' => false,
    'nuhtmlchecker_cache_expires' => 613200,
  ),
  'methods' => 
  array (
    'nuhtmlchecker_htmlcheck' => 
    array (
      'component' => 'NuHtmlChecker',
      'method' => 'nuhtmlchecker_htmlcheck',
    ),
  ),
  'callbacks' => 
  array (
    'nuhtmlchecker_post_preview' => 
    array (
      'preview' => 
      array (
        'post_preview' => 
        array (
          'component' => 'NuHtmlChecker',
          'priority' => 10,
          'method' => 'nu_html_checker',
        ),
      ),
    ),
    'nuhtmlchecker_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'NuHtmlChecker',
          'priority' => 11,
          'method' => 'insert_nu_html_checker',
        ),
      ),
    ),
  ),
  'tasks' => 
  array (
    'nuhtmlchecker_remove_old_cache' => 
    array (
      'label' => 'Remove Old Cache for NuHtmlChecker',
      'component' => 'NuHtmlChecker',
      'priority' => 100,
      'method' => 'remove_old_cache',
      'frequency' => 86400,
    ),
  ),
);