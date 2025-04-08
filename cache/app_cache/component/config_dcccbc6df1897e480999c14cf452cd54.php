<?php $this->get_cache=array (
  'label' => 'TaxonomyUtils',
  'id' => 'taxonomyutils',
  'component' => 'TaxonomyUtils',
  'description' => 'Provides various functions related to model Taxonomy.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'config_settings' => 
  array (
    'searchestraier_count_by_object' => true,
    'taxonomyutils_use_estraier' => false,
  ),
  'hooks' => 
  array (
    'taxonomyutils_pre_run' => 
    array (
      'pre_run' => 
      array (
        'component' => 'TaxonomyUtils',
        'priority' => 5,
        'method' => 'pre_run',
      ),
    ),
  ),
  'list_actions' => 
  array (
    'action_taxonomy_normalize' => 
    array (
      'taxonomy' => 
      array (
        'action_taxonomy_normalize' => 
        array (
          'name' => 'action_taxonomy_normalize',
          'label' => 'Normalize',
          'component' => 'TaxonomyUtils',
          'method' => 'action_taxonomy_normalize',
          'columns' => 'id,name,normalize',
          'input' => 0,
          'order' => 1000,
        ),
      ),
    ),
  ),
  'tags' => 
  array (
    'block' => 
    array (
      'taxonomyobjects' => 
      array (
        'component' => 'TaxonomyUtils',
        'method' => 'hdlr_taxonomyobjects',
      ),
    ),
    'conditional' => 
    array (
      'iftaxonomyhaschild' => 
      array (
        'component' => 'TaxonomyUtils',
        'method' => 'hdlr_iftaxonomyhaschild',
      ),
    ),
    'function' => 
    array (
      'taxonomychildcount' => 
      array (
        'component' => 'TaxonomyUtils',
        'method' => 'hdlr_taxonomychildcount',
      ),
    ),
  ),
  'callbacks' => 
  array (
    'taxonomyutils_pre_listing_taxonomy' => 
    array (
      'taxonomy' => 
      array (
        'pre_listing' => 
        array (
          'component' => 'TaxonomyUtils',
          'priority' => 5,
          'method' => 'pre_listing_taxonomy',
        ),
      ),
    ),
    'taxonomyutils_post_load_objects_taxonomy' => 
    array (
      'taxonomy' => 
      array (
        'post_load_objects' => 
        array (
          'component' => 'TaxonomyUtils',
          'priority' => 5,
          'method' => 'post_load_objects_taxonomy',
        ),
      ),
    ),
    'taxonomyutils_mtml_reference' => 
    array (
      'mtml_reference' => 
      array (
        'template_source' => 
        array (
          'component' => 'TaxonomyUtils',
          'priority' => 10,
          'method' => 'template_source_mtml_reference',
        ),
      ),
    ),
  ),
);