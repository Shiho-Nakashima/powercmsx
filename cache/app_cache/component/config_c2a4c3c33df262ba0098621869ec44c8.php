<?php $this->get_cache=array (
  'label' => 'AccessAnalytics',
  'id' => 'accessanalytics',
  'component' => 'AccessAnalytics',
  'description' => 'Record activity and enable ranking output.',
  'version' => '1.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'config_settings' => 
  array (
    'accessanalytics_app_url' => '',
  ),
  'settings' => 
  array (
    'accessanalytics_app_url' => '',
    'accessanalytics_activity_limit' => 30,
    'accessanalytics_rank_limit' => 10,
    'accessanalytics_queries' => 'query',
    'accessanalytics_exclude_ips' => '',
    'accessanalytics_exclude_bots' => 'CloudWatchSynthetics,Bot,spider,Crawler',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'list_page_views' => 
    array (
      'component' => 'AccessAnalytics',
      'method' => 'list_page_views',
      'permission' => 'list_activity',
    ),
    'list_searchwords' => 
    array (
      'component' => 'AccessAnalytics',
      'method' => 'list_searchwords',
      'permission' => 'list_searchword',
    ),
  ),
  'tags' => 
  array (
    'block' => 
    array (
      'rankedobjects' => 
      array (
        'component' => 'AccessAnalytics',
        'method' => 'hdlr_rankedobjects',
      ),
      'rankedkeywords' => 
      array (
        'component' => 'AccessAnalytics',
        'method' => 'hdlr_rankedkeywords',
      ),
      'activitymonths' => 
      array (
        'component' => 'AccessAnalytics',
        'method' => 'hdlr_activitymonths',
      ),
    ),
    'function' => 
    array (
      'accesstracking' => 
      array (
        'component' => 'AccessAnalytics',
        'method' => 'hdlr_accesstracking',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'accessanalytics_post_save_comment' => 
    array (
      'comment' => 
      array (
        'post_save' => 
        array (
          'component' => 'AccessAnalytics',
          'priority' => 5,
          'method' => 'post_save_comment',
        ),
      ),
    ),
    'accessanalytics_post_save_contact' => 
    array (
      'contact' => 
      array (
        'post_save' => 
        array (
          'component' => 'AccessAnalytics',
          'priority' => 5,
          'method' => 'post_save_contact',
        ),
      ),
    ),
    'accessanalytics_post_login_member' => 
    array (
      'member' => 
      array (
        'post_login' => 
        array (
          'component' => 'AccessAnalytics',
          'priority' => 5,
          'method' => 'post_login_member',
        ),
      ),
    ),
    'accessanalytics_post_logout_member' => 
    array (
      'member' => 
      array (
        'post_logout' => 
        array (
          'component' => 'AccessAnalytics',
          'priority' => 5,
          'method' => 'post_logout_member',
        ),
      ),
    ),
  ),
);