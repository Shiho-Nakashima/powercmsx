<?php $this->get_cache=array (
  'label' => 'BatchApproval',
  'id' => 'batchapproval',
  'component' => 'BatchApproval',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'Enable Approval collectively from the Listing Screen.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'settings' => 
  array (
    'batchapproval_mail_footer' => '',
  ),
  'hooks' => 
  array (
    'batch_approval_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'BatchApproval',
        'priority' => 10000,
        'method' => 'post_init',
      ),
    ),
  ),
);