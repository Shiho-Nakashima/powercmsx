<?php $this->get_cache=array (
  'label' => 'EditorDiff',
  'id' => 'editordiff',
  'component' => 'EditorDiff',
  'description' => 'Adds a \'Show Diff\' button to the rich text editor.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'doc_link' => 'https://powercmsx.jp/about/editor-diff.html',
  'config_settings' => 
  array (
    'editordiff_assets_base' => '',
  ),
  'methods' => 
  array (
    'editor_diff' => 
    array (
      'component' => 'EditorDiff',
      'method' => 'editor_diff',
    ),
  ),
  'tags' => 
  array (
    'conditional' => 
    array (
      'ifobjecthasrevision' => 
      array (
        'component' => 'EditorDiff',
        'method' => 'hdlr_ifobjecthasrevision',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'editordiff_template_source_edit' => 
    array (
      'edit' => 
      array (
        'template_source' => 
        array (
          'component' => 'EditorDiff',
          'priority' => 12,
          'method' => 'insert_button',
        ),
      ),
    ),
  ),
);