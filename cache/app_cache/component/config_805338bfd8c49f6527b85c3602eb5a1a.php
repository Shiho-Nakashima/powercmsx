<?php $this->get_cache=array (
  'label' => 'PostOnTwitter',
  'id' => 'postontwitter',
  'component' => 'PostOnTwitter',
  'version' => '1.2',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Provides the ability to post to 𝕏 from PowerCMS X.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'settings' => 
  array (
    'api_key' => '',
    'api_secret_key' => '',
    'callback_url' => '',
    'all_target_models' => '',
    'base_account_name' => '',
    'base_access_token' => '',
    'base_access_token_secret' => '',
    'base_target_models' => '',
    'base_tweet_template' => '<mt:var name="object_primary" remove_html>',
    'enabled' => 0,
    'use_base_access_token' => 1,
    'use_base_target_models' => 1,
    'use_base_tweet_template' => 1,
    'use_link_url' => 0,
    'account_name' => '',
    'access_token' => '',
    'access_token_secret' => '',
    'target_models' => '',
    'tweet_template' => '',
  ),
  'config_overwrite' => 
  array (
    'publish_callbacks' => true,
  ),
  'menus' => 
  array (
    'twitter_account' => 
    array (
      'display_system' => 1,
      'display_space' => 1,
      'component' => 'PostOnTwitter',
      'mode' => 'link_twitter_account',
      'label' => 'Link to a 𝕏 account',
      'permission' => 'can_twitter_account',
      'condition' => 'can_link_twitter_account',
      'order' => 3000,
    ),
  ),
  'hooks' => 
  array (
    'postontwitter_start_app' => 
    array (
      'start_app' => 
      array (
        'component' => 'PostOnTwitter',
        'method' => 'start_app',
        'priority' => 1,
      ),
    ),
    'postontwitter_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'PostOnTwitter',
        'method' => 'post_init',
      ),
    ),
    'postontwitter_start_mode' => 
    array (
      'start_mode' => 
      array (
        'component' => 'PostOnTwitter',
        'method' => 'start_mode',
      ),
    ),
    'postontwitter_take_down' => 
    array (
      'take_down' => 
      array (
        'component' => 'PostOnTwitter',
        'method' => 'take_down',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'postontwitter_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'PostOnTwitter',
          'method' => 'template_source_edit',
        ),
      ),
    ),
    'postontwitter_start_publish' => 
    array (
      'template' => 
      array (
        'start_publish' => 
        array (
          'component' => 'PostOnTwitter',
          'method' => 'check_object_publishing',
        ),
      ),
    ),
    'postontwitter_post_rebuild' => 
    array (
      'template' => 
      array (
        'post_rebuild' => 
        array (
          'component' => 'PostOnTwitter',
          'method' => 'check_object_publishing',
        ),
      ),
    ),
    'postontwitter_post_publish' => 
    array (
      'template' => 
      array (
        'post_publish' => 
        array (
          'component' => 'PostOnTwitter',
          'method' => 'check_object_publishing',
        ),
      ),
    ),
  ),
  'methods' => 
  array (
    'link_twitter_account' => 
    array (
      'component' => 'PostOnTwitter',
      'method' => 'method_link_twitter_account',
      'permission' => 'can_twitter_account',
    ),
    'twitter_authorization' => 
    array (
      'component' => 'PostOnTwitter',
      'method' => 'method_twitter_authorization',
      'permission' => 'can_twitter_account',
    ),
    'twitter_oauth_callback' => 
    array (
      'component' => 'PostOnTwitter',
      'method' => 'method_twitter_oauth_callback',
      'permission' => 'can_twitter_account',
    ),
    'twitter_post_test' => 
    array (
      'component' => 'PostOnTwitter',
      'method' => 'method_twitter_post_test',
      'permission' => 'is_superuser',
    ),
  ),
  'tags' => 
  array (
    'conditional' => 
    array (
      'ifpostontwitterenabled' => 
      array (
        'component' => 'PostOnTwitter',
        'method' => 'hdlr_ifpostontwitterenabled',
      ),
      'ifpostontwittertweetmodel' => 
      array (
        'component' => 'PostOnTwitter',
        'method' => 'hdlr_ifpostontwittertweetmodel',
      ),
    ),
  ),
);