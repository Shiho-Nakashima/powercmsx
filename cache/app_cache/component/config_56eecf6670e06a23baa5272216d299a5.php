<?php $this->get_cache=array (
  'label' => 'URLRedirect',
  'id' => 'urlredirect',
  'component' => 'URLRedirect',
  'description' => 'Manage the URL redirect settings.',
  'version' => '1.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'urlredirect_delimiter' => '!',
  ),
  'callbacks' => 
  array (
    'urlredirect_save_filter_redirect_map' => 
    array (
      'redirect_map' => 
      array (
        'save_filter' => 
        array (
          'component' => 'URLRedirect',
          'priority' => 5,
          'method' => 'save_filter_redirect_map',
        ),
      ),
    ),
    'urlredirect_redirect' => 
    array (
      'template' => 
      array (
        '404-error' => 
        array (
          'component' => 'URLRedirect',
          'priority' => 10,
          'method' => 'urlredirect_redirect',
        ),
      ),
    ),
  ),
);