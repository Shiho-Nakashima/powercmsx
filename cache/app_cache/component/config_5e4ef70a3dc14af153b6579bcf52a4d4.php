<?php $this->get_cache=array (
  'label' => 'PasswordExpired',
  'id' => 'passwordexpired',
  'component' => 'PasswordExpired',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Set the password expiration settings.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'settings' => 
  array (
    'password_expired_enabled' => 0,
    'password_expiration_days' => 30,
    'password_expired_mode' => 1,
    'password_history_enabled' => 0,
    'password_history_max' => 2,
  ),
  'hooks' => 
  array (
    'passwordexpired_start_app' => 
    array (
      'start_app' => 
      array (
        'component' => 'PasswordExpired',
        'method' => 'start_app',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'passwordexpired_post_login' => 
    array (
      'post_login' => 
      array (
        'user' => 
        array (
          'component' => 'PasswordExpired',
          'method' => 'post_login_user',
        ),
      ),
    ),
    'passwordexpired_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'PasswordExpired',
          'method' => 'template_source_edit',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'conditional' => 
    array (
      'ifpasswordexpired' => 
      array (
        'component' => 'PasswordExpired',
        'method' => 'hdlr_if_password_expired',
      ),
    ),
  ),
);