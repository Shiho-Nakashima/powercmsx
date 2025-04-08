<?php $this->get_cache=array (
  'label' => 'AWS_S3',
  'id' => 'aws_s3',
  'component' => 'AWS_S3',
  'description' => 'Synchronize static files to Amazon Simple Storage Service(S3).',
  'version' => '2.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'config_settings' => 
  array (
    'aws_s3_queue_interval' => 100,
    'aws_s3_realtime_sync' => true,
    'aws_s3_cache_max_age' => 86400,
    'aws_s3_realtime_maxsize' => 104857600,
    'aws_s3_exclude_exts' => '',
    'aws_s3_setting_by_scope' => false,
    'aws_s3_pagination_limit' => 1000,
    'aws_s3_use_custom_mapping' => false,
    'aws_s3_use_list_caching' => true,
    'aws_s3_task_exclude_exts' => '',
    'aws_s3_use_mediaconvert' => false,
    'aws_s3_mediaconvert_api_version' => '2017-08-29',
    'aws_s3_modified_only' => false,
    'aws_s3_worker_only' => false,
    'aws_s3_max_list_actions' => 30,
    'aws_s3_skip_rebuild_phase' => false,
  ),
  'settings' => 
  array (
    'aws_s3_access_key_id' => '',
    'aws_s3_secret_access_key' => '',
    'aws_s3_bucket' => '',
    'aws_s3_region' => 'ap-northeast-1',
    'aws_s3_acl' => '',
    'aws_s3_cache_max_age' => 86400,
    'aws_s3_use_system_setting' => false,
    'aws_s3_extensions' => '',
    'aws_s3_exclude_exts' => '',
    'aws_s3_ext_bucket_map' => '',
    'aws_s3_mediaconvert_region' => 'ap-northeast-1',
    'aws_s3_mediaconvert_endpoint' => '',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'list_actions' => 
  array (
    'aws_s3_urlinfo_synchronize_to_s3' => 
    array (
      'urlinfo' => 
      array (
        'aws_s3_urlinfo_synchronize_to_s3' => 
        array (
          'name' => 'aws_s3_urlinfo_synchronize_to_s3',
          'label' => 'Synchronize to AWS S3',
          'component' => 'AWS_S3',
          'method' => 'aws_s3_urlinfo_synchronize_to_s3',
          'columns' => 'id,file_path,relative_path,delete_flag',
          'input' => 0,
          'order' => 500,
        ),
      ),
    ),
  ),
  'methods' => 
  array (
    'aws_s3_list_objects' => 
    array (
      'component' => 'AWS_S3',
      'method' => 'list_objects',
      'permission' => 'manage_plugins',
    ),
    'aws_s3_mediaconvert_jobs' => 
    array (
      'component' => 'AWS_S3',
      'method' => 'aws_s3_mediaconvert_jobs',
      'permission' => 'manage_plugins',
    ),
  ),
  'hooks' => 
  array (
    'aws_s3_take_down' => 
    array (
      'take_down' => 
      array (
        'component' => 'AWS_S3',
        'priority' => 9,
        'method' => 'take_down',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'aws_s3_template_source_list' => 
    array (
      'list' => 
      array (
        'template_source' => 
        array (
          'component' => 'AWS_S3',
          'priority' => 5,
          'method' => 'set_apply_message',
        ),
      ),
    ),
  ),
  'tasks' => 
  array (
    'aws_s3_synchronize_s3' => 
    array (
      'label' => 'Synchronize to AWS S3',
      'component' => 'AWS_S3',
      'method' => 'task_synchronize_s3',
      'frequency' => 1,
      'priority' => 90,
    ),
  ),
);