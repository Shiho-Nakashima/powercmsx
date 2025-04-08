<?php $this->get_cache=array (
  'label' => 'BatchTriggerControl',
  'id' => 'batchtriggercontrol',
  'component' => 'BatchTriggerControl',
  'description' => 'Collectively set URL Map\'s rebuild triggers from the Listing Screen.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'list_actions' => 
  array (
    'action_urlmapping_remove_trigger' => 
    array (
      'urlmapping' => 
      array (
        'action_urlmapping_remove_trigger' => 
        array (
          'name' => 'action_urlmapping_remove_trigger',
          'label' => 'Delete Model\'s Triggers',
          'hint' => 'Enter the model names separated by commas.',
          'component' => 'BatchTriggerControl',
          'method' => 'action_urlmapping_remove_trigger',
          'input' => 1,
          'order' => 100,
        ),
      ),
    ),
    'action_urlmapping_add_trigger' => 
    array (
      'urlmapping' => 
      array (
        'action_urlmapping_add_trigger' => 
        array (
          'name' => 'action_urlmapping_add_trigger',
          'label' => 'Add Model\'s Triggers',
          'hint' => 'Enter the model names separated by commas.',
          'component' => 'BatchTriggerControl',
          'method' => 'action_urlmapping_add_trigger',
          'input' => 1,
          'order' => 101,
        ),
      ),
    ),
  ),
);