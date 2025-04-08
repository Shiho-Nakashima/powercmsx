<?php $this->get_cache=array (
  'label' => 'Recaptcha',
  'id' => 'recaptcha',
  'component' => 'Recaptcha',
  'version' => '1.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Provides reCAPTCHA function.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'settings' => 
  array (
    'api_js_url' => 'https://www.google.com/recaptcha/api.js',
    'api_endpoint' => 'https://www.google.com/recaptcha/api/siteverify',
    'api_secret_key' => '',
    'api_site_key' => '',
    'token_hidden_name' => 'g_recaptcha_response',
    'use_members' => 0,
    'pass_score' => '0.7',
  ),
  'callbacks' => 
  array (
    'recaptcha_validation_form' => 
    array (
      'form' => 
      array (
        'validation' => 
        array (
          'component' => 'Recaptcha',
          'priority' => 10,
          'method' => 'validation_form',
        ),
      ),
    ),
    'recaptcha_save_filter_member' => 
    array (
      'member' => 
      array (
        'save_filter' => 
        array (
          'component' => 'Recaptcha',
          'priority' => 10,
          'method' => 'save_filter_member',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'function' => 
    array (
      'recaptchaaddtoken' => 
      array (
        'component' => 'Recaptcha',
        'method' => 'hdlr_recaptchaaddtoken',
      ),
    ),
  ),
);