<?php $this->get_cache=array (
  0 => 
  array (
    'option_key' => 'default_models',
    'option_value' => 'phrase,api_cache,asset,association,attachmentfile,category,column,comment,contact,entry,field,fieldtype,folder,form,group,log,menu,meta,option,page,permission,question,questiontype,queue,relation,remote_ip,role,session,table,tag,taxonomy,template,ts_job,urlinfo,urlmapping,user,widget,workflow,workspace,searchword',
    'option_data' => '',
  ),
  1 => 
  array (
    'option_key' => 'appname',
    'option_value' => 'PowerCMS X',
    'option_data' => NULL,
  ),
  2 => 
  array (
    'option_key' => 'activation_code',
    'option_value' => 'DUAE3-7HNB-WLK2',
    'option_data' => NULL,
  ),
  3 => 
  array (
    'option_key' => 'site_path',
    'option_value' => 'C:/xampp/htdocs/site',
    'option_data' => NULL,
  ),
  4 => 
  array (
    'option_key' => 'site_url',
    'option_value' => 'http://localhost/powercmsx/site/',
    'option_data' => NULL,
  ),
  5 => 
  array (
    'option_key' => 'extra_path',
    'option_value' => 'assets/',
    'option_data' => NULL,
  ),
  6 => 
  array (
    'option_key' => 'language',
    'option_value' => 'ja',
    'option_data' => NULL,
  ),
  7 => 
  array (
    'option_key' => 'copyright',
    'option_value' => 'PowerCMS X version <mt:var name="app_version"> : Copyright &copy; <mt:date format="Y"> Alfasado Inc. All rights reserved.',
    'option_data' => NULL,
  ),
  8 => 
  array (
    'option_key' => 'system_email',
    'option_value' => 'nakashima-n1-shiho@jna.co.jp',
    'option_data' => NULL,
  ),
  9 => 
  array (
    'option_key' => 'asset_publish',
    'option_value' => '1',
    'option_data' => NULL,
  ),
  10 => 
  array (
    'option_key' => 'lockout_limit',
    'option_value' => '3',
    'option_data' => NULL,
  ),
  11 => 
  array (
    'option_key' => 'lockout_interval',
    'option_value' => '600',
    'option_data' => NULL,
  ),
  12 => 
  array (
    'option_key' => 'ip_lockout_interval',
    'option_value' => '600',
    'option_data' => NULL,
  ),
  13 => 
  array (
    'option_key' => 'ip_lockout_limit',
    'option_value' => '5',
    'option_data' => NULL,
  ),
  14 => 
  array (
    'option_key' => 'default_widget',
    'option_value' => '<mt:setvarblock name="card_text">
  <mt:isadmin><a href="<mt:var name="script_uri">?__mode=config"><mt:trans phrase="If you want to customize or delete this widget please click this link text."></a></mt:isadmin>
</mt:setvarblock>
<div class="card dashboard-widget dashboard-widget-main">
<mt:unless name="workspace_id">
  <div class="card-image-wrapper"><img class="card-img-top img-fluid" src="assets/brand/PowerCMSX.svg" alt="PowerCMS X"></div>
  <div class="card-block">
    <p class="card-text mb-1"><mt:trans phrase="Welcome to %s!" params="PowerCMS X"><mt:var name="card_text"></p>
    <mt:isadmin>
    <div class="text-center mt-1">
      <a href="<mt:var name="script_uri">?__mode=view&amp;_type=edit&amp;_model=workspace" class="btn btn-primary very-short btn-sm"><mt:trans phrase="New WorkSpace"></a>
      <a href="<mt:var name="script_uri">?__mode=manage_theme" class="btn btn-primary very-short btn-sm"><mt:trans phrase="Manage Theme"></a>
    </div>
    </mt:isadmin>
  </div>
<mt:else>
  <div class="card-image-wrapper"><span><mt:var name="workspace_name" escape></span></div>
  <div class="card-block">
    <p class="card-text mb-1"><mt:trans phrase="This Page is WorkSpace %s\'s Dashboard!" params="$workspace_name"> <mt:var name="card_text"></p>
    <mt:isadmin workspace_id="$workspace_id">
    <div class="text-center mt-1">
      <a href="<mt:var name="script_uri">?__mode=view&amp;_type=edit&amp;_model=workspace&amp;workspace_id=<mt:var name="workspace_id">&amp;id=<mt:var name="workspace_id">" class="btn btn-primary very-short btn-sm"><mt:trans phrase="WorkSpace Settings"></a>
      <a href="<mt:var name="script_uri">?__mode=manage_theme&amp;workspace_id=<mt:var name="workspace_id">" class="btn btn-primary very-short btn-sm"><mt:trans phrase="Manage Theme"></a>
    </div>
    </mt:isadmin>
  </div>
</mt:unless>
</div>',
    'option_data' => NULL,
  ),
  15 => 
  array (
    'option_key' => 'tmpl_markup',
    'option_value' => 'mt',
    'option_data' => NULL,
  ),
  16 => 
  array (
    'option_key' => 'barcolor',
    'option_value' => '#000000',
    'option_data' => NULL,
  ),
  17 => 
  array (
    'option_key' => 'bartextcolor',
    'option_value' => '#ffffff',
    'option_data' => NULL,
  ),
  18 => 
  array (
    'option_key' => 'app_version',
    'option_value' => '3.63',
    'option_data' => NULL,
  ),
  19 => 
  array (
    'option_key' => 'apache_version',
    'option_value' => '24',
    'option_data' => NULL,
  ),
  20 => 
  array (
    'option_key' => 'path',
    'option_value' => '/powercmsx/',
    'option_data' => NULL,
  ),
  21 => 
  array (
    'option_key' => 'app_path',
    'option_value' => '/powercmsx/',
    'option_data' => NULL,
  ),
  22 => 
  array (
    'option_key' => 'admin_url',
    'option_value' => 'http://localhost/powercmsx/index.php',
    'option_data' => NULL,
  ),
);