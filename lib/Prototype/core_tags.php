<?php
$tags = [
    'function'   => ['objectvar', 'include', 'includeparts', 'getobjectname', 'mtime',
                     'assetthumbnail', 'assetproperty', 'getoption', 'statustext',
                     'archivetitle', 'archivedate', 'archivelink', 'property', 'asseturl',
                     'assetthumbnailurl', 'setrolecolumns', 'getobjectlabel', 'canonicalurl',
                     'canonicallink', 'gettableid', 'customfieldvalue', 'currenturlmappingvalue',
                     'columnproperty', 'pluginsetting', 'geturlprimary', 'getactivity',
                     'getchildrenids', 'websitename', 'websiteurl', 'websitelanguage',
                     'websiteid', 'websitepath', 'websitecopyright', 'websitedescription',
                     'customfieldcount','hex2rgba', 'phpstart', 'phpend', 'getregistry',
                     'modelproperty', 'websitepublishtype', 'objectcount', 'objecttojson',
                     'objecttoresource', 'archivedescription', 'archiveogimage', 'getcookie'],
    'block'      => ['includeblock', 'objectcols', 'objectloop', 'tables', 'nestableobjects',
                     'countgroupby', 'fieldloop', 'archivelist', 'grouploop', 'archivenext',
                     'workspacecontext', 'referencecontext', 'workflowusers', 'archiveprevious',
                     'customfieldvalues', 'cacheblock', 'calendar', 'setcontext', 'triggersection',
                     'menuitems', 'breadcrumbs', 'speedmeter', 'referencedobjects', 'convert2linkurl',
                     'relatedobjects'],
    'conditional'=> ['objectcontext', 'tablehascolumn', 'isadmin', 'ifcomponent',
                     'ifusercan', 'ifworkspacemodel', 'ifhasthumbnail', 'ifmodelhasurlmapping',
                     'ifobjectexists', 'ifuserrole', 'ifarchivetype', 'ifacceptcomment',
                     'ifuseragent', 'ifformisopen'],
    'modifier'   => ['epoch2str', 'sec2hms', 'trans', 'convert_breaks', '_eval', 'language',
                     '_archive_type', 'offset_time', 'convert2linkurl', 'add_mtime', 'normarize'] ];
foreach ( $tags as $kind => $arr ) {
    $tag_prefix = $kind === 'modifier' ? 'filter_' : 'hdlr_';
    foreach ( $arr as $tag ) {
        $ctx->register_tag( $tag, $kind, $tag_prefix . $tag, $core_tags );
    }
}