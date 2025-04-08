<?php $this->get_cache=array (
  'label' => 'MultipleNotifications',
  'id' => 'multiplenotifications',
  'component' => 'MultipleNotifications',
  'version' => '1.2',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Notify users with the same permissions at the same time for workflow emails.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'multiplenotifications_to_same_group' => false,
    'multiplenotifications_to_all_publisher' => false,
    'multiplenotifications_send_bcc' => false,
    'multiplenotifications_send_bcc_logging' => false,
  ),
  'settings' => 
  array (
    'multiplenotifications_enabled' => false,
  ),
  'callbacks' => 
  array (
    'multiplenotifications_mail_filter' => 
    array (
      'mail_filter' => 
      array (
        'mail_filter' => 
        array (
          'component' => 'MultipleNotifications',
          'priority' => 10,
          'method' => 'mail_filter',
        ),
      ),
    ),
    'multiplenotifications_publish_object' => 
    array (
      'workflow' => 
      array (
        'publish_object' => 
        array (
          'component' => 'MultipleNotifications',
          'priority' => 10,
          'method' => 'publish_object',
        ),
      ),
    ),
  ),
);