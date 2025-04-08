<?php $this->get_cache=array (
  'label' => 'Watermark',
  'id' => 'watermark',
  'component' => 'Watermark',
  'description' => 'Combine the watermark to the image and video.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'settings' => 
  array (
    'watermark_use_system_setting' => '',
    'watermark_default_pos' => '',
    'watermark_watermark_dir' => '',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'combine_watermark' => 
    array (
      'component' => 'Watermark',
      'method' => 'combine_watermark',
    ),
    'watermark_asset' => 
    array (
      'component' => 'Watermark',
      'method' => 'watermark_asset',
    ),
  ),
  'callbacks' => 
  array (
    'watermark_post_save_asset' => 
    array (
      'asset' => 
      array (
        'post_save' => 
        array (
          'component' => 'Watermark',
          'priority' => 10,
          'method' => 'post_save_asset',
        ),
      ),
    ),
    'watermark_post_delete_asset' => 
    array (
      'asset' => 
      array (
        'post_delete' => 
        array (
          'component' => 'Watermark',
          'priority' => 10,
          'method' => 'post_delete_asset',
        ),
      ),
    ),
    'watermark_post_save_upload_file' => 
    array (
      'upload_file' => 
      array (
        'post_save' => 
        array (
          'component' => 'Watermark',
          'priority' => 10,
          'method' => 'post_save_upload_file',
        ),
      ),
    ),
    'watermark_post_delete_upload_file' => 
    array (
      'upload_file' => 
      array (
        'post_delete' => 
        array (
          'component' => 'Watermark',
          'priority' => 10,
          'method' => 'post_delete_upload_file',
        ),
      ),
    ),
    'watermark_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'Watermark',
          'priority' => 5,
          'method' => 'set_watermark_param',
        ),
      ),
    ),
  ),
);