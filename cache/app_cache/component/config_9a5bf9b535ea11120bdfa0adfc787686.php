<?php $this->get_cache=array (
  'label' => 'Members',
  'id' => 'members',
  'component' => 'Members',
  'version' => '1.6',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Provides website login functionality.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'members_require_agreement' => true,
    'members_set_accept_language' => false,
    'members_member_in_worker' => false,
    'members_member_in_preview' => false,
  ),
  'settings' => 
  array (
    'members_app_url' => '',
    'members_terms_and_privacy' => '',
    'members_email_from' => '',
    'members_sign_up_notify_mailto' => '',
    'members_unsubscribe_notify_mailto' => '',
    'members_sess_timeout' => 86400,
    'members_sign_up_timeout' => 600,
    'members_unsubscribe_timeout' => 600,
    'members_sign_up_expires' => 86400,
    'members_sign_up_status' => 2,
    'members_non_editable_cols' => '',
    'members_sign_up_normalize' => 1,
    'members_allow_login' => 1,
    'members_allow_sign_up' => 1,
    'members_two_factor_auth' => 0,
    'members_login_return_url' => '',
    'members_recover_return_url' => '',
  ),
  'callbacks' => 
  array (
    'members_pre_save_member' => 
    array (
      'member' => 
      array (
        'pre_save' => 
        array (
          'component' => 'Members',
          'priority' => 1,
          'method' => 'pre_save_member',
        ),
      ),
    ),
    'post_login_member' => 
    array (
      'member' => 
      array (
        'post_login' => 
        array (
          'component' => 'Members',
          'priority' => 5,
          'method' => 'post_login_member',
        ),
      ),
    ),
    'members_post_load_urlinfo' => 
    array (
      'urlinfo' => 
      array (
        'post_load_object' => 
        array (
          'component' => 'Members',
          'priority' => 1,
          'method' => 'members_post_load_urlinfo',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'conditional' => 
    array (
      'iflogin' => 
      array (
        'component' => 'Members',
        'method' => 'hdlr_if_login',
      ),
      'ifmembersappurl' => 
      array (
        'component' => 'Members',
        'method' => 'hdlr_if_members_app_url',
      ),
    ),
    'block' => 
    array (
      'membercontext' => 
      array (
        'component' => 'Members',
        'method' => 'hdlr_member_context',
      ),
    ),
    'function' => 
    array (
      'membersappurl' => 
      array (
        'component' => 'Members',
        'method' => 'hdlr_members_app_url',
      ),
      'memberssignuptoken' => 
      array (
        'component' => 'Members',
        'method' => 'hdlr_members_signuptoken',
      ),
    ),
  ),
  'tasks' => 
  array (
    'members_member_ip_unlock' => 
    array (
      'label' => 'Unlock Member\'s IP Addresses',
      'component' => 'Members',
      'priority' => 80,
      'method' => 'member_ip_unlock',
      'frequency' => 300,
    ),
  ),
);