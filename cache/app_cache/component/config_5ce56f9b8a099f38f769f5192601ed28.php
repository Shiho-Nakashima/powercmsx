<?php $this->get_cache=array (
  'label' => 'ExternalPreview',
  'id' => 'externalpreview',
  'component' => 'ExternalPreview',
  'version' => '1.4',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'doc_link' => 'https://powercmsx.jp/about/external_preview.html',
  'description' => 'Provide preview function with UUID specified.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'externalpreview_cookie_domain' => '',
    'externalpreview_attachment_exts' => 
    array (
      0 => 'pdf',
    ),
  ),
  'settings' => 
  array (
    'externalpreview_models' => '',
    'externalpreview_url' => 'permalink',
    'externalpreview_default_expires' => 7,
    'externalpreview_password' => '',
    'externalpreview_pw_kind' => 1,
  ),
  'hooks' => 
  array (
    'externalpreview_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'ExternalPreview',
        'priority' => 1,
        'method' => 'post_init',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'externalpreview_post_load_urlinfo' => 
    array (
      'urlinfo' => 
      array (
        'post_load_object' => 
        array (
          'component' => 'ExternalPreview',
          'priority' => 10,
          'method' => 'post_load_urlinfo',
        ),
      ),
    ),
    'externalpreview_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'ExternalPreview',
          'priority' => 10,
          'method' => 'insert_externalpreview_link',
        ),
      ),
    ),
  ),
);