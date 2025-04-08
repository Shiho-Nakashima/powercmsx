<?php $this->get_cache=array (
  'label' => 'CookieUtilities',
  'id' => 'cookieutilities',
  'component' => 'CookieUtilities',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Provides template tags that handle HTTP Cookie. Only available for dynamic publishing.',
  'tags' => 
  array (
    'conditional' => 
    array (
      'ifcookie' => 
      array (
        'component' => 'CookieUtilities',
        'method' => 'hdlr_ifcookie',
      ),
    ),
    'function' => 
    array (
      'getcookie' => 
      array (
        'component' => 'CookieUtilities',
        'method' => 'hdlr_getcookie',
      ),
      'getenv' => 
      array (
        'component' => 'CookieUtilities',
        'method' => 'hdlr_getenv',
      ),
      'setcookie' => 
      array (
        'component' => 'CookieUtilities',
        'method' => 'hdlr_setcookie',
      ),
      'clearcookie' => 
      array (
        'component' => 'CookieUtilities',
        'method' => 'hdlr_clearcookie',
      ),
      'clearallcookies' => 
      array (
        'component' => 'CookieUtilities',
        'method' => 'hdlr_clearallcookies',
      ),
    ),
  ),
);