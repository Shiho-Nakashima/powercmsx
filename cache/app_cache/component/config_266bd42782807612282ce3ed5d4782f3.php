<?php $this->get_cache=array (
  'label' => 'AuthTwilio',
  'id' => 'authtwilio',
  'component' => 'AuthTwilio',
  'description' => 'Support two-step authentication using Twilio SMS.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'config_settings' => 
  array (
    'authtwilio_remove_column' => false,
  ),
  'settings' => 
  array (
    'authtwilio_account_sid' => '',
    'authtwilio_authtoken' => '',
    'authtwilio_from_number' => '',
    'authtwilio_country_code' => '81',
    'authtwilio_user' => true,
    'authtwilio_member' => true,
    'authtwilio_send_email' => false,
  ),
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'callbacks' => 
  array (
    'authtwilio_mail_filter' => 
    array (
      'mail_filter' => 
      array (
        'mail_filter' => 
        array (
          'component' => 'AuthTwilio',
          'priority' => 1,
          'method' => 'mail_filter',
        ),
      ),
    ),
  ),
);