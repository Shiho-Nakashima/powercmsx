<?php $this->get_cache=array (
  'label' => 'LivePreview',
  'id' => 'livepreview',
  'component' => 'LivePreview',
  'version' => '2.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'doc_link' => 'https://powercmsx.jp/about/live_preview.html',
  'description' => 'It provides site preview in future.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'livepreview_session_timeout' => 3600,
    'livepreview_open_external' => false,
  ),
  'settings' => 
  array (
    'livepreview_page_url' => '',
    'livepreview_date_based' => 'entry',
    'livepreview_insert_html' => '',
    'livepreview_status_pending' => 1,
  ),
  'menus' => 
  array (
    'live_preview' => 
    array (
      'display_system' => 1,
      'display_space' => 1,
      'component' => 'LivePreview',
      'mode' => 'live_preview',
      'label' => 'Live Preview',
      'permission' => 'can_livepreview',
      'order' => 200,
    ),
  ),
  'hooks' => 
  array (
    'livepreview_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'LivePreview',
        'priority' => 1,
        'method' => 'post_init',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'livepreview_post_logout' => 
    array (
      'user' => 
      array (
        'post_logout' => 
        array (
          'component' => 'LivePreview',
          'priority' => 1,
          'method' => 'post_logout',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'conditional' => 
    array (
      'iflivepreview' => 
      array (
        'component' => 'LivePreview',
        'method' => 'hdlr_if_livepreview',
      ),
      'iflivepreviewinpending' => 
      array (
        'component' => 'LivePreview',
        'method' => 'hdlr_if_livepreview_inpending',
      ),
    ),
    'function' => 
    array (
      'livepreviewdate' => 
      array (
        'component' => 'LivePreview',
        'method' => 'hdlr_livepreview_date',
      ),
    ),
  ),
  'methods' => 
  array (
    'live_preview' => 
    array (
      'component' => 'LivePreview',
      'permission' => 'can_livepreview',
      'method' => 'live_preview',
    ),
  ),
);