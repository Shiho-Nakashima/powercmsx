<?php $this->get_cache=array (
  'label' => 'UploadUtilities',
  'id' => 'uploadutilities',
  'component' => 'UploadUtilities',
  'version' => '1.27',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Makes the asset upload function convenient.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'settings' => 
  array (
    'uploadutilities_use_system_settings' => false,
    'uploadutilities_can_switches' => false,
    'uploadutilities_settings' => 'images : jpeg, jpg, png, gif, jpe
videos : mov, avi, qt, mp4, wmv, 3gp, asx, mpg, flv, mkv, ogm
audios : mp3, mid, midi, wav, aif, aac, flac, aiff, aifc, au, snd, ogg,wma, m4a
files : pdf, doc, docx, ppt, pptx, xls, xlsx',
    'uploadutilities_can_status' => false,
    'uploadutilities_can_overwrite' => false,
    'uploadutilities_allow_multibyte' => false,
    'uploadutilities_can_publish_date' => false,
    'uploadutilities_can_unpublish_date' => false,
    'uploadutilities_can_add_tags' => false,
    'uploadutilities_can_tag_helper' => false,
    'uploadutilities_can_extract_zip' => false,
    'uploadutilities_sync_status' => '',
    'uploadutilities_sync_status_published' => false,
    'uploadutilities_not_sync_published' => false,
  ),
  'methods' => 
  array (
    'uploadutilities_extract_zip' => 
    array (
      'component' => 'UploadUtilities',
      'permission' => 'create_asset',
      'method' => 'extract_zip',
    ),
  ),
  'hooks' => 
  array (
    'uploadutilities_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'UploadUtilities',
        'priority' => 1,
        'method' => 'post_init',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'uploadutilities_post_save_asset' => 
    array (
      'asset' => 
      array (
        'post_save' => 
        array (
          'component' => 'UploadUtilities',
          'priority' => 10,
          'method' => 'post_save_asset',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'block' => 
    array (
      'assetmodels' => 
      array (
        'component' => 'UploadUtilities',
        'method' => 'hdlr_assetmodels',
      ),
    ),
  ),
);