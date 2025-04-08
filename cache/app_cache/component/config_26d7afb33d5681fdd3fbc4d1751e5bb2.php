<?php $this->get_cache=array (
  'label' => 'DataMigrator',
  'id' => 'datamigrator',
  'component' => 'DataMigrator',
  'version' => '1.3',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'It provides data migration functions.',
  'config_settings' => 
  array (
    'datamigrator_develop' => false,
  ),
  'menus' => 
  array (
    'start_import' => 
    array (
      'display_system' => 1,
      'display_space' => 1,
      'component' => 'DataMigrator',
      'permission' => 'import_objects',
      'mode' => 'start_migration',
      'label' => 'Data Migration',
      'order' => 51,
    ),
  ),
  'methods' => 
  array (
    'start_migration' => 
    array (
      'component' => 'DataMigrator',
      'permission' => 'import_objects',
      'method' => 'start_migration',
    ),
    'data_migration' => 
    array (
      'component' => 'DataMigrator',
      'permission' => 'import_objects',
      'method' => 'data_migration',
    ),
    'upload_migration_file' => 
    array (
      'component' => 'DataMigrator',
      'permission' => 'import_objects',
      'method' => 'upload_migration_file',
    ),
  ),
  'import_format' => 
  array (
    'wordpress' => 
    array (
      'component' => 'DataMigrator',
      'label' => 'WordPress',
      'method' => 'import_wordpress',
      'models' => 
      array (
        0 => 'entry',
        1 => 'page',
      ),
      'order' => 10,
      'options' => 
      array (
        0 => 'author_setting',
        1 => 'new_author_password',
        2 => 'text_format',
        3 => 'comment_status',
        4 => 'set_folder',
        5 => 'field_settings',
      ),
    ),
    'movabletype' => 
    array (
      'component' => 'DataMigrator',
      'label' => 'Movable Type',
      'method' => 'import_movabletype',
      'models' => 
      array (
        0 => 'entry',
        1 => 'page',
      ),
      'order' => 20,
      'options' => 
      array (
        0 => 'author_setting',
        1 => 'new_author_password',
        2 => 'comment_status',
        3 => 'set_folder',
        4 => 'field_settings',
      ),
    ),
  ),
  'export_format' => 
  array (
    'movabletype' => 
    array (
      'component' => 'DataMigrator',
      'label' => 'Movable Type',
      'method' => 'export_movabletype',
    ),
  ),
  'list_actions' => 
  array (
    'export_entry' => 
    array (
      'entry' => 
      array (
        'export_entry' => 
        array (
          'name' => 'export_entry',
          'label' => 'Export Entries',
          'component' => 'DataMigrator',
          'method' => 'export_entry',
          'input' => 1,
          'order' => 100,
          'scope' => 
          array (
            0 => 'system',
            1 => 'workspace',
          ),
          'input_options' => 'list_options',
        ),
      ),
    ),
  ),
);