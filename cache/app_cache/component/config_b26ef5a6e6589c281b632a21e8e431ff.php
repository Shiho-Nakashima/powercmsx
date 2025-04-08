<?php $this->get_cache=array (
  'label' => 'HTTPAuth',
  'id' => 'httpauth',
  'component' => 'HTTPAuth',
  'description' => 'Set up HTTP Authentication for Admin Screen and Site URLs.',
  'version' => '1.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'httpauth_admin_always' => false,
    'httpauth_htpasswd_path' => '',
  ),
  'settings' => 
  array (
    'httpauth_auth_cms' => 0,
    'httpauth_type' => 1,
    'httpauth_column' => 'name',
    'httpauth_id_column' => '',
    'httpauth_pw_column' => '',
    'httpauth_loginid' => '',
    'httpauth_password' => '',
    'httpauth_htpasswd_authname' => 'Please enter your ID and password',
    'httpauth_auth_type' => 'Digest',
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_footer' => 'cfg_footer.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'methods' => 
  array (
    'http_auth_htpasswd' => 
    array (
      'component' => 'HTTPAuth',
      'method' => 'http_auth_htpasswd',
      'permission' => 'manage_plugins',
    ),
    'http_auth_changed' => 
    array (
      'component' => 'HTTPAuth',
      'method' => 'http_auth_changed',
      'permission' => 'manage_plugins',
    ),
  ),
  'hooks' => 
  array (
    'httpauth_start_app' => 
    array (
      'start_app' => 
      array (
        'component' => 'HTTPAuth',
        'priority' => 2,
        'method' => 'start_app',
      ),
    ),
  ),
);