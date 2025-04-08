<?php $this->get_cache=array (
  'label' => 'VideoCaptions',
  'id' => 'videocaptions',
  'component' => 'VideoCaptions',
  'description' => 'Add a captions and audio description to the uploaded video.',
  'version' => '3.3',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'video_captions_postfix' => '-with-caption',
    'video_captions_chapters_postfix' => '-ch',
    'video_captions_compat_postfix' => '',
    'video_captions_video_id' => 'video-player',
    'video_captions_video_class' => 'video-js',
    'video_captions_text_shadow' => 2,
    'video_captions_can_bake' => false,
    'video_captions_bake_parallel' => 1,
    'video_captions_bake_queue' => true,
    'video_captions_keep_audio' => false,
    'video_captions_fonts' => 'Noto Sans JP,M PLUS Rounded 1c,BIZ UDPGothic,BIZ UDPMincho,Zen Maru Gothic,Noto Serif JP,Kaisei Opti,RocknRoll One',
    'video_captions_backup_expires' => 7200,
    'video_captions_cache_expires' => 86400,
    'video_captions_codec' => '',
    'video_captions_can_convert_hls' => false,
    'video_captions_thumbnail_queue' => false,
    'video_captions_thumbnail_queue_per' => 50,
    'video_captions_job_max_per' => 10,
    'video_captions_hls_queue' => true,
    'video_captions_hls_queue_sleep' => 3,
    'video_captions_hls_parallel' => 1,
    'video_captions_hls_time' => 10,
    'video_captions_framerate' => 30,
    'video_captions_work_dir' => '',
    'video_captions_hls_playlist_type' => 2,
    'video_captions_hls_allow_overwrite' => true,
    'video_captions_hls_mkdir' => true,
    'video_captions_hls_scales' => '',
    'video_captions_fill_chapter' => false,
    'video_captions_chapter_json' => false,
    'video_captions_thumbnail_sec' => 0,
    'video_captions_thumbnail_ext' => 'png',
    'video_captions_thumbnail_width' => 240,
  ),
  'settings' => 
  array (
    'video_captions_font' => 'sans-serif',
    'video_captions_font_face' => 'Noto Sans JP',
    'video_captions_font_weight' => 900,
    'video_captions_canvas_webfont' => true,
    'video_captions_default_ruby' => 0,
    'video_captions_default_color' => 1,
    'video_captions_default_pos' => 1,
    'video_captions_wordwrap' => 1,
    'video_captions_src_relative' => 0,
    'video_captions_video_tag' => '<video controls class="video-js" style="width:100%;height:auto">',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'video_caption_add_subtitles' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_add_subtitles',
    ),
    'video_caption_bake_processing' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_bake_processing',
    ),
    'video_caption_temp_save' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_temp_save',
    ),
    'video_caption_temp_save_text' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_temp_save_text',
    ),
    'video_caption_determine' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_determine',
    ),
    'video_caption_discard' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_discard',
    ),
    'video_caption_generate_vtt' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_generate_vtt',
    ),
    'video_caption_preview_vtt' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_preview_vtt',
    ),
    'video_caption_insert_video' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_insert_video',
    ),
    'video_caption_js' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_js',
    ),
    'video_caption_example' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_example',
    ),
    'video_caption_delete_file' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_delete_file',
    ),
    'video_caption_is_hls' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_caption_is_hls',
    ),
    'video_captions_view_hls' => 
    array (
      'component' => 'VideoCaptions',
      'method' => 'video_captions_view_hls',
    ),
  ),
  'callbacks' => 
  array (
    'video_caption_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'VideoCaptions',
          'priority' => 10,
          'method' => 'set_caption_param',
        ),
      ),
    ),
    'video_caption_template_output_list' => 
    array (
      'list' => 
      array (
        'template_output' => 
        array (
          'component' => 'VideoCaptions',
          'priority' => 1,
          'method' => 'output_list',
        ),
      ),
    ),
    'video_caption_pre_save_upload_file' => 
    array (
      'upload_file' => 
      array (
        'pre_save' => 
        array (
          'component' => 'VideoCaptions',
          'priority' => 5,
          'method' => 'pre_save_upload_file',
        ),
      ),
    ),
    'video_caption_post_save_upload_file' => 
    array (
      'upload_file' => 
      array (
        'post_save' => 
        array (
          'component' => 'VideoCaptions',
          'priority' => 10,
          'method' => 'post_save_upload_file',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'conditional' => 
    array (
      'ifembedvideo' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_ifembedvideo',
      ),
      'ifembedaudio' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_ifembedaudio',
      ),
    ),
    'function' => 
    array (
      'embedvideo' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_embedvideo',
      ),
      'embedaudio' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_embedaudio',
      ),
      'videojsscript' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_videojsscript',
      ),
      'videothumbnail' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_videothumbnailurl',
      ),
      'videothumbnailurl' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_videothumbnailurl',
      ),
      'videoplaylisturl' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_videoplaylisturl',
      ),
      'videochapterurl' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_videochapterurl',
      ),
      'videovtturl' => 
      array (
        'component' => 'VideoCaptions',
        'method' => 'hdlr_videovtturl',
      ),
    ),
  ),
  'tasks' => 
  array (
    'video_captions_cleanup_tmp' => 
    array (
      'label' => 'Delete temporary files and cache',
      'component' => 'VideoCaptions',
      'method' => 'cleanup_tmp',
      'frequency' => 1,
      'priority' => 5,
    ),
  ),
);