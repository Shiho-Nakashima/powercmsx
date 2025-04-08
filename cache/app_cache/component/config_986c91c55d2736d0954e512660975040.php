<?php $this->get_cache=array (
  'label' => 'Feeds',
  'id' => 'feeds',
  'component' => 'Feeds',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Get and parse RSS Feed and set template variables.',
  'config_settings' => 
  array (
    'feeds_useragent' => 'User-Agent: Mozilla/5.0',
  ),
  'tags' => 
  array (
    'block' => 
    array (
      'feed' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_feed',
      ),
      'feedentries' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_feedentries',
      ),
      'getxml2vars' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_getxml2vars',
      ),
      'getjson2vars' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_getjson2vars',
      ),
    ),
    'function' => 
    array (
      'feedtitle' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_feedtitle',
      ),
      'feedlink' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_feedlink',
      ),
      'feedentrylink' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_feedentrylink',
      ),
      'feedentrytitle' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_feedentrytitle',
      ),
      'feedinclude' => 
      array (
        'component' => 'Feeds',
        'method' => 'hdlr_feedinclude',
      ),
    ),
  ),
);