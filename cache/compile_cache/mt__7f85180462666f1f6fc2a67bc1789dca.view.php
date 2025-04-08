<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'apache_version','setvar'=>'apache_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('apache_version','setvar',$this),$this,'setvar')?>

Options -Indexes
DirectoryIndex <?php $_ba5c34_old_params['_9a7b5a']=$_ba5c34_local_params;$_ba5c34_old_vars['_9a7b5a']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'websitepublishtype','eq'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_relative($this->component('PTTags')->hdlr_websiteurl($this->setup_args(['relative'=>'1','this_tag'=>'websiteurl'],null,$this),$this),$this->setup_args('1','relative',$this),$this,'relative')?>
pt-view.php<?php else:?>
index.html<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_9a7b5a'];$_ba5c34_local_vars=$_ba5c34_old_vars['_9a7b5a'];?>


RewriteEngine On
RewriteCond %{HTTP_COOKIE} pt-live-preview
<?php $_ba5c34_old_params['_c0836c']=$_ba5c34_local_params;$_ba5c34_old_vars['_c0836c']=$_ba5c34_local_vars;if($this->component('PTTags')->hdlr_ifcomponent($this->setup_args(['component'=>'LivePreview','this_tag'=>'ifcomponent'],null,$this),null,$this,true,true)):?>
RewriteCond %{REQUEST_URI} !\.php$ [NC]
<?php else:?>
RewriteCond %{REQUEST_URI} \.html$ [NC]
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_c0836c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_c0836c'];?>
RewriteRule ^ <?php echo $this->component('PTTags')->hdlr_websitepath($this->setup_args(['this_tag'=>'websitepath'],null,$this),$this)?>
<?php echo $this->function_constant($this->setup_args(['name'=>'DIRECTORY_SEPARATOR','this_tag'=>'constant'],null,$this),$this)?>
pt-view.php [L]

RewriteCond %{QUERY_STRING} . [OR]
RewriteCond %{REQUEST_METHOD} !=GET [OR]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
# RewriteCond %{REQUEST_URI} !\.php$ [NC]
RewriteCond %{REQUEST_URI} \.html$ [NC]
RewriteRule ^ <?php echo $this->component('PTTags')->hdlr_websitepath($this->setup_args(['this_tag'=>'websitepath'],null,$this),$this)?>
<?php echo $this->function_constant($this->setup_args(['name'=>'DIRECTORY_SEPARATOR','this_tag'=>'constant'],null,$this),$this)?>
pt-view.php [L]
<?php $_ba5c34_old_params['_cac37d']=$_ba5c34_local_params;$_ba5c34_old_vars['_cac37d']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'apache_version','lt'=>'24','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ <?php echo $this->component('PTTags')->hdlr_websitepath($this->setup_args(['this_tag'=>'websitepath'],null,$this),$this)?>
<?php echo $this->function_constant($this->setup_args(['name'=>'DIRECTORY_SEPARATOR','this_tag'=>'constant'],null,$this),$this)?>
pt-view.php [L]
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_cac37d'];$_ba5c34_local_vars=$_ba5c34_old_vars['_cac37d'];?>

ErrorDocument 404 <?php echo $this->modifier_relative($this->component('PTTags')->hdlr_websiteurl($this->setup_args(['relative'=>'1','this_tag'=>'websiteurl'],null,$this),$this),$this->setup_args('1','relative',$this),$this,'relative')?>
pt-view.php
ErrorDocument 403 <?php echo $this->modifier_relative($this->component('PTTags')->hdlr_websiteurl($this->setup_args(['relative'=>'1','this_tag'=>'websiteurl'],null,$this),$this),$this->setup_args('1','relative',$this),$this,'relative')?>
pt-view.php
<IfModule mod_mime.c>
  AddType image/webp .webp
</IfModule>
<Files ~ "^\.ht">
  <?php $_ba5c34_old_params['_49a3d7']=$_ba5c34_local_params;$_ba5c34_old_vars['_49a3d7']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'apache_version','lt'=>'24','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
deny from all<?php else:?>
Require all denied<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_49a3d7'];$_ba5c34_local_vars=$_ba5c34_old_vars['_49a3d7'];?>

</Files><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>