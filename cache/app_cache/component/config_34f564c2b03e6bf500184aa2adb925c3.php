<?php $this->get_cache=array (
  'label' => 'HTML_CodeSniffer',
  'id' => 'html_codesniffer',
  'component' => 'HTML_CodeSniffer',
  'version' => '1.2',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'doc_link' => 'https://powercmsx.jp/about/accessibility.html',
  'description' => 'A client-side JavaScript that checks a HTML document or source code, and detects violations of a defined coding standard in preview screen.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'settings' => 
  array (
    'html_codesniffer_wcag_level' => 'AA',
    'html_codesniffer_set_timeout' => '1200',
    'html_codesniffer_base_path' => '',
    'html_codesniffer_enabled' => 1,
  ),
  'hooks' => 
  array (
    'html_codesniffer_pre_run' => 
    array (
      'pre_run' => 
      array (
        'component' => 'HTML_CodeSniffer',
        'priority' => 5,
        'method' => 'pre_run',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'html_codesniffer_post_preview' => 
    array (
      'preview' => 
      array (
        'post_preview' => 
        array (
          'component' => 'HTML_CodeSniffer',
          'priority' => 10,
          'method' => 'insert_html_codesniffer',
        ),
      ),
    ),
    'html_codesniffer_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'HTML_CodeSniffer',
          'priority' => 11,
          'method' => 'insert_codesniffer_checkbox',
        ),
      ),
    ),
  ),
);