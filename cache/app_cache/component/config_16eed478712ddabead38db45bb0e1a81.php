<?php $this->get_cache=array (
  'label' => 'MTMLReference',
  'id' => 'mtmlreference',
  'component' => 'MTMLReference',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'doc_link' => 'https://powercmsx.jp/about/mtmlreference_plugin.html',
  'description' => 'It provides MTML(Template Tag) Reference.',
  'menus' => 
  array (
    'mtml_reference' => 
    array (
      'display_system' => 1,
      'display_space' => 1,
      'component' => 'MTMLReference',
      'mode' => 'mtml_reference',
      'label' => 'Tag Reference',
      'permission' => 'can_create_template',
      'order' => 1400,
    ),
  ),
  'methods' => 
  array (
    'mtml_reference' => 
    array (
      'component' => 'MTMLReference',
      'method' => 'mtml_reference',
      'permission' => 'can_create_template',
    ),
  ),
);