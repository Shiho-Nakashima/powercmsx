<?php $this->get_cache=array (
  'label' => 'ImageInfo',
  'id' => 'imageinfo',
  'component' => 'ImageInfo',
  'description' => 'Get various information about the image pr pdf and validate accessibility.',
  'version' => '1.4',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'imageinfo_ocr_sleep' => 3,
    'imageinfo_ocr_retry' => 100,
    'imageinfo_set_asset_label' => true,
    'imageinfo_check_contrast' => true,
    'imageinfo_img_autocheck' => true,
    'imageinfo_pdf_autocheck' => false,
    'imageinfo_html_autocheck' => false,
    'imageinfo_inspection_background' => 0,
    'imageinfo_pdfinfo_path' => '',
    'imageinfo_exiftool_path' => '',
    'imageinfo_cache_expires' => 7200,
    'imageinfo_pt_to_px' => 2,
  ),
  'settings' => 
  array (
    'imageinfo_region' => '',
    'imageinfo_end_point' => '',
    'imageinfo_subscription_key' => '',
    'imageinfo_api_version' => '3.2',
    'imageinfo_language' => 'ja',
    'imageinfo_mt_end_point' => 'https://api.cognitive.microsofttranslator.com/translate',
    'imageinfo_mt_subscription_key' => '',
    'imageinfo_mt_api_version' => '3.0',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'get_imageinfo_insert' => 
    array (
      'component' => 'ImageInfo',
      'method' => 'get_imageinfo_insert',
    ),
    'get_imageinfo_dialog' => 
    array (
      'component' => 'ImageInfo',
      'method' => 'get_imageinfo_dialog',
    ),
  ),
  'tags' => 
  array (
    'function' => 
    array (
      'pdfthumbnail' => 
      array (
        'component' => 'ImageInfo',
        'method' => 'hdlr_pdfthumbnail',
      ),
    ),
  ),
  'list_actions' => 
  array (
    'action_asset_image_inspection' => 
    array (
      'asset' => 
      array (
        'action_asset_image_inspection' => 
        array (
          'name' => 'action_asset_image_inspection',
          'label' => 'Inspection(A11Y)',
          'component' => 'ImageInfo',
          'columns' => 
          array (
            0 => 'id',
            1 => 'class',
            2 => 'file_name',
            3 => 'a11y_verified',
            4 => 'file_ext',
            5 => 'status',
          ),
          'method' => 'action_asset_image_inspection',
          'input' => 0,
          'order' => 3000,
        ),
      ),
    ),
    'action_asset_make_verified' => 
    array (
      'asset' => 
      array (
        'action_asset_make_verified' => 
        array (
          'name' => 'action_asset_make_verified',
          'label' => 'Make Verified(A11Y)',
          'component' => 'ImageInfo',
          'columns' => 
          array (
            0 => 'id',
            1 => 'class',
            2 => 'file_name',
            3 => 'a11y_verified',
          ),
          'method' => 'action_asset_make_verified',
          'input' => 0,
          'order' => 3001,
        ),
      ),
    ),
    'action_asset_revert_to_unverified' => 
    array (
      'asset' => 
      array (
        'action_asset_revert_to_unverified' => 
        array (
          'name' => 'action_asset_revert_to_unverified',
          'label' => 'Revert to Unverified(A11Y)',
          'component' => 'ImageInfo',
          'columns' => 
          array (
            0 => 'id',
            1 => 'class',
            2 => 'file_name',
            3 => 'a11y_verified',
          ),
          'method' => 'action_asset_revert_to_unverified',
          'input' => 0,
          'order' => 3002,
        ),
      ),
    ),
  ),
  'hooks' => 
  array (
    'imageinfo_pre_view' => 
    array (
      'pre_view' => 
      array (
        'component' => 'ImageInfo',
        'priority' => 1,
        'method' => 'pre_view',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'imageinfo_post_save_asset' => 
    array (
      'asset' => 
      array (
        'post_save' => 
        array (
          'component' => 'ImageInfo',
          'priority' => 10,
          'method' => 'post_save_asset',
        ),
      ),
    ),
  ),
  'tasks' => 
  array (
    'imageinfo_remove_old_cache' => 
    array (
      'label' => 'Remove Old Cache for ImageInfo',
      'component' => 'ImageInfo',
      'priority' => 100,
      'method' => 'remove_old_cache',
      'frequency' => 86400,
    ),
  ),
);