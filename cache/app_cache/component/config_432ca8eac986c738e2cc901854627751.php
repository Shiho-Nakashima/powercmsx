<?php $this->get_cache=array (
  'label' => 'ComponentBlocks',
  'id' => 'componentblocks',
  'component' => 'ComponentBlocks',
  'description' => 'Provides a block editor function.',
  'version' => '1.1',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'committer' => 'Hideki Abe',
  'doc_link' => 'https://powercmsx.jp/about/component_blocks.html',
  'cfg_template' => 'cfg_template.tmpl',
  'config_settings' => 
  array (
    'componentblocks_develop_mode' => false,
    'componentblocks_api_decode' => true,
  ),
  'edit_properties' => 
  array (
    'component_blocks' => 
    array (
      'label' => 'Component Blocks',
      'component' => 'ComponentBlocks',
      'method' => 'component_blocks_type',
      'order' => 100,
    ),
  ),
  'upgrade_functions' => 
  array (
    'component_block' => 
    array (
      'version_limit' => '999',
      'component' => 'ComponentBlocks',
      'method' => 'import_blocks',
    ),
  ),
  'methods' => 
  array (
    'component_blocks_object_info' => 
    array (
      'component' => 'ComponentBlocks',
      'method' => 'get_object_info',
    ),
    'component_blocks_default_template' => 
    array (
      'component' => 'ComponentBlocks',
      'method' => 'component_blocks_default_template',
    ),
    'component_blocks_i18n' => 
    array (
      'component' => 'ComponentBlocks',
      'method' => 'get_translate',
    ),
    'preview_component_blocks' => 
    array (
      'component' => 'ComponentBlocks',
      'method' => 'preview_component_blocks',
    ),
  ),
  'list_actions' => 
  array (
    'componentblocks_add_models' => 
    array (
      'component_block' => 
      array (
        'componentblocks_add_models' => 
        array (
          'name' => 'componentblocks_add_models',
          'label' => 'Add Model\'s',
          'hint' => 'Enter the model names separated by commas.',
          'component' => 'ComponentBlocks',
          'method' => 'componentblocks_add_models',
          'input' => 1,
          'order' => 100,
        ),
      ),
    ),
    'componentblocks_remove_models' => 
    array (
      'component_block' => 
      array (
        'componentblocks_remove_models' => 
        array (
          'name' => 'componentblocks_remove_models',
          'label' => 'Remove Model\'s',
          'hint' => 'Enter the model names separated by commas.',
          'component' => 'ComponentBlocks',
          'method' => 'componentblocks_remove_models',
          'input' => 1,
          'order' => 101,
        ),
      ),
    ),
  ),
  'hooks' => 
  array (
    'component_blocks_post_init' => 
    array (
      'post_init' => 
      array (
        'component' => 'ComponentBlocks',
        'priority' => 5,
        'method' => 'post_init',
      ),
    ),
    'component_blocks_pre_run' => 
    array (
      'pre_run' => 
      array (
        'component' => 'ComponentBlocks',
        'priority' => 5,
        'method' => 'pre_run',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'component_blocks_pre_listing_block' => 
    array (
      'component_block' => 
      array (
        'pre_listing' => 
        array (
          'component' => 'ComponentBlocks',
          'priority' => 10,
          'method' => 'pre_listing_block',
        ),
      ),
    ),
    'component_blocks_pre_save_block' => 
    array (
      'component_block' => 
      array (
        'pre_save' => 
        array (
          'component' => 'ComponentBlocks',
          'priority' => 10,
          'method' => 'pre_save_block',
        ),
      ),
    ),
    'component_blocks_template_output' => 
    array (
      'edit' => 
      array (
        'template_output' => 
        array (
          'component' => 'ComponentBlocks',
          'priority' => 10,
          'method' => 'edit_tinymce_js',
        ),
      ),
    ),
    'component_blocks_generate_resource' => 
    array (
      'restfulapi' => 
      array (
        'generate_resource' => 
        array (
          'component' => 'ComponentBlocks',
          'priority' => 10,
          'method' => 'generate_resource',
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'block' => 
    array (
      'blockpartsfields' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'block_block_parts_fields',
      ),
    ),
    'conditional' => 
    array (
      'ifblockissinglefield' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'hdlr_block_is_single_field',
      ),
    ),
    'function' => 
    array (
      'enableblocks' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'function_enable_blocks',
      ),
      'blockparts' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'function_block_parts',
      ),
      'blockvalidaterules' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'function_block_validate_rules',
      ),
      'fieldinitialvalue' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'function_field_initial_value',
      ),
      'settableblockvars' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'function_set_table_block_vars',
      ),
    ),
    'modifier' => 
    array (
      'escape_quote' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'modifier_escape_quote',
      ),
      'replace_curly_brackets' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'modifier_replace_curly_brackets',
      ),
      'component_blocks_options' => 
      array (
        'component' => 'ComponentBlocks',
        'method' => 'modifier_component_blocks_options',
      ),
    ),
  ),
);