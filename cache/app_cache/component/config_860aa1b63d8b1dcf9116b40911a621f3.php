<?php $this->get_cache=array (
  'label' => 'TableOfContents',
  'id' => 'tableofcontents',
  'component' => 'TableOfContents',
  'description' => 'Generates a table of contents (anchor links) from headings.',
  'version' => '1.0',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net',
  'doc_link' => 'https://powercmsx.jp/about/table_of_contents.html',
  'tags' => 
  array (
    'block' => 
    array (
      'generatetableofcontents' => 
      array (
        'component' => 'TableOfContents',
        'method' => 'hdlr_generatetableofcontents',
      ),
    ),
  ),
);