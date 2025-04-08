<?php $this->get_cache=array (
  'label' => 'GetHierarchy',
  'id' => 'gethierarchy',
  'component' => 'GetHierarchy',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Get objects with hierarchy as an array.',
  'tags' => 
  array (
    'function' => 
    array (
      'gethierarchy' => 
      array (
        'component' => 'GetHierarchy',
        'method' => 'hdlr_gethierarchy',
      ),
      'getmenustructure' => 
      array (
        'component' => 'GetHierarchy',
        'method' => 'hdlr_getmenustructure',
      ),
    ),
  ),
);