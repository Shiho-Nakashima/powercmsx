<?php $this->get_cache=array (
  'label' => 'DisplayOptions',
  'id' => 'displayoptions',
  'component' => 'DisplayOptions',
  'version' => '1.7',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'doc_link' => 'https://powercmsx.jp/about/displayoptions.html',
  'description' => 'Make custom display options configurable for each workspace or system.',
  'config_settings' => 
  array (
    'displayoptions_v1_compat' => false,
    'displayoptions_add_new_workspace' => false,
  ),
  'hooks' => 
  array (
    'displayoptions_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'DisplayOptions',
        'priority' => 1,
        'method' => 'post_init',
      ),
    ),
    'displayoptions_pre_view' => 
    array (
      'pre_view' => 
      array (
        'component' => 'DisplayOptions',
        'priority' => 10,
        'method' => 'pre_view',
      ),
    ),
  ),
  'methods' => 
  array (
    'customize_menus' => 
    array (
      'component' => 'DisplayOptions',
      'permission' => 'create_displayoption',
      'method' => 'customize_menus',
    ),
  ),
  'menus' => 
  array (
    'customize_menus' => 
    array (
      'display_system' => 1,
      'display_space' => 1,
      'component' => 'DisplayOptions',
      'mode' => 'customize_menus',
      'label' => 'Customize Menus',
      'permission' => 'create_displayoption',
      'order' => 300,
    ),
  ),
  'tags' => 
  array (
    'function' => 
    array (
      'getmenuposition' => 
      array (
        'component' => 'DisplayOptions',
        'method' => 'hdlr_get_menu_position',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'displayoptions_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'template_source_edit',
        ),
      ),
    ),
    'displayoptions_template_source_list' => 
    array (
      'list' => 
      array (
        'template_source' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'template_source_list',
        ),
      ),
    ),
    'displayoptions_pre_load_objects' => 
    array (
      'table' => 
      array (
        'pre_load_objects' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'pre_load_objects',
        ),
      ),
    ),
    'displayoptions_pre_save_displayoption' => 
    array (
      'displayoption' => 
      array (
        'pre_save' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'pre_save_displayoption',
        ),
      ),
    ),
    'displayoptions_post_save_displayoption' => 
    array (
      'displayoption' => 
      array (
        'post_save' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'post_save_displayoption',
        ),
      ),
    ),
    'displayoptions_post_delete_displayoption' => 
    array (
      'displayoption' => 
      array (
        'post_delete' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'post_delete_displayoption',
        ),
      ),
    ),
    'displayoptions_post_save_table' => 
    array (
      'table' => 
      array (
        'post_save' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'post_save_table',
        ),
      ),
    ),
    'displayoptions_post_save_workspace' => 
    array (
      'workspace' => 
      array (
        'post_save' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'post_save_workspace',
        ),
      ),
    ),
    'displayoptions_permission_can_do' => 
    array (
      'permission' => 
      array (
        'can_do' => 
        array (
          'component' => 'DisplayOptions',
          'priority' => 10,
          'method' => 'permission_can_do',
        ),
      ),
    ),
  ),
);