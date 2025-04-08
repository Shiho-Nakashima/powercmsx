<?php $this->get_cache=array (
  'label' => 'QuickEdit',
  'id' => 'quickedit',
  'component' => 'QuickEdit',
  'description' => 'Provides a Bookmarklet for a quick link from the public page to the Edit Profile screen.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'methods' => 
  array (
    'go_to_edit_screen' => 
    array (
      'component' => 'QuickEdit',
      'method' => 'go_to_edit_screen',
    ),
  ),
  'callbacks' => 
  array (
    'quickedit_template_source_dashboard' => 
    array (
      'dashboard' => 
      array (
        'template_source' => 
        array (
          'component' => 'QuickEdit',
          'priority' => 10,
          'method' => 'insert_quickedit_error',
        ),
      ),
    ),
  ),
);