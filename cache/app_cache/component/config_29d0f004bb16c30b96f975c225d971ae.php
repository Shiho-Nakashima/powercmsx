<?php $this->get_cache=array (
  'label' => 'FileUploader',
  'id' => 'fileuploader',
  'component' => 'FileUploader',
  'description' => 'Provides file upload function.',
  'version' => '1.2',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'config_settings' => 
  array (
    'fileuploader_backup' => false,
    'fileuploader_max_chunk_size' => 1048576,
    'fileuploader_upload_size_limit' => 2147483648,
    'fileuploader_keep_extension' => false,
    'fileuploader_list_video_thumb' => false,
  ),
  'settings' => 
  array (
    'fileuploader_extra_path' => '',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'fileuploader_upload' => 
    array (
      'component' => 'FileUploader',
      'method' => 'fileuploader_upload',
      'permission' => 'can_create_upload_file',
    ),
  ),
  'callbacks' => 
  array (
    'fileuploader_save_filter_upload_file' => 
    array (
      'upload_file' => 
      array (
        'save_filter' => 
        array (
          'component' => 'FileUploader',
          'priority' => 1,
          'method' => 'save_filter_upload_file',
        ),
      ),
    ),
    'fileuploader_pre_save_upload_file' => 
    array (
      'upload_file' => 
      array (
        'pre_save' => 
        array (
          'component' => 'FileUploader',
          'priority' => 5,
          'method' => 'pre_save_upload_file',
        ),
      ),
    ),
    'fileuploader_post_save_upload_file' => 
    array (
      'upload_file' => 
      array (
        'post_save' => 
        array (
          'component' => 'FileUploader',
          'priority' => 5,
          'method' => 'post_save_upload_file',
        ),
      ),
    ),
    'fileuploader_post_delete_upload_file' => 
    array (
      'upload_file' => 
      array (
        'post_delete' => 
        array (
          'component' => 'FileUploader',
          'priority' => 5,
          'method' => 'post_delete_upload_file',
        ),
      ),
    ),
    'fileuploader_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'FileUploader',
          'priority' => 1,
          'method' => 'param_meta_id',
        ),
      ),
    ),
  ),
);