<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_currenturlmappingvalue($this->setup_args(['column'=>'container','setvar'=>'current_container','this_tag'=>'currenturlmappingvalue'],null,$this),$this),$this->setup_args('current_container','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_websiteid($this->setup_args(['setvar'=>'website_id','this_tag'=>'websiteid'],null,$this),$this),$this->setup_args('website_id','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_websitelanguage($this->setup_args(['setvar'=>'website_language','this_tag'=>'websitelanguage'],null,$this),$this),$this->setup_args('website_language','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'website_language','setvar'=>'language','this_tag'=>'var'],null,$this),$this),$this->setup_args('language','setvar',$this),$this,'setvar')?>

<?php $_ba5c34_old_params['_386aee']=$_ba5c34_local_params;$_ba5c34_old_vars['_386aee']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._language','escape'=>'','setvar'=>'language','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('language','setvar',$this),$this,'setvar')?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_386aee'];$_ba5c34_local_vars=$_ba5c34_old_vars['_386aee'];?>

<?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_websitename($this->setup_args(['language'=>'$language','setvar'=>'website_name','this_tag'=>'websitename'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('website_name','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_websiteurl($this->setup_args(['setvar'=>'website_url','this_tag'=>'websiteurl'],null,$this),$this),$this->setup_args('website_url','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_relative($this->function_var($this->setup_args(['name'=>'website_url','relative'=>'','setvar'=>'website_url_relative','this_tag'=>'var'],null,$this),$this),$this->setup_args('','relative',$this),$this,'relative'),$this->setup_args('website_url_relative','setvar',$this),$this,'setvar')?>

<?php $_ba5c34_old_params['_9ac56f']=$_ba5c34_local_params;$_ba5c34_old_vars['_9ac56f']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'website_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'website_link_url','this_tag'=>'workspacelinkurl'],null,$this),$this),$this->setup_args('website_link_url','setvar',$this),$this,'setvar')?>

<?php else:?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'link_url','setvar'=>'website_link_url','this_tag'=>'property'],null,$this),$this),$this->setup_args('website_link_url','setvar',$this),$this,'setvar')?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_9ac56f'];$_ba5c34_local_vars=$_ba5c34_old_vars['_9ac56f'];?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_websitecopyright($this->setup_args(['setvar'=>'website_copyright','this_tag'=>'websitecopyright'],null,$this),$this),$this->setup_args('website_copyright','setvar',$this),$this,'setvar')?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'date_format','value'=>'M jS, Y','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_ba5c34_old_params['_ae3ac9']=$_ba5c34_local_params;$_ba5c34_old_vars['_ae3ac9']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'language','eq'=>'ja','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'date_format','value'=>'Y年m月d日','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_ae3ac9'];$_ba5c34_local_vars=$_ba5c34_old_vars['_ae3ac9'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'datetime_format','value'=>'M jS, Y, g:i a','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_ba5c34_old_params['_d35397']=$_ba5c34_local_params;$_ba5c34_old_vars['_d35397']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'language','eq'=>'ja','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'datetime_format','value'=>'Y年m月d日 g時i分','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_d35397'];$_ba5c34_local_vars=$_ba5c34_old_vars['_d35397'];?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'website_name','setvar'=>'page_title','this_tag'=>'var'],null,$this),$this),$this->setup_args('page_title','setvar',$this),$this,'setvar')?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'page_title_delimiter','value'=>' | ','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_websitedescription($this->setup_args(['language'=>'$language','setvar'=>'page_description','this_tag'=>'websitedescription'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('page_description','setvar',$this),$this,'setvar')?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'page_keywords','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'additional_script','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php $c_5d2ec2=null;$_ba5c34_old_params['_5d2ec2']=$_ba5c34_local_params;$_ba5c34_old_vars['_5d2ec2']=$_ba5c34_local_vars;$a_5d2ec2=$this->setup_args(['name'=>'ogp_image','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) OGP Image URL','ogp_image_key'=>'default','this_tag'=>'include'],null,$this),$this)?>
<?php $c_5d2ec2=ob_get_clean();$c_5d2ec2=$this->block_setvarblock($a_5d2ec2,$c_5d2ec2,$this,$r_5d2ec2,1,'_5d2ec2');echo($c_5d2ec2); $_ba5c34_local_params=$_ba5c34_old_params['_5d2ec2'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'entries_limit','value'=>'8','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'ranking_enabled','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_ba5c34_old_params['_b71752']=$_ba5c34_local_params;$_ba5c34_old_vars['_b71752']=$_ba5c34_local_vars;if($this->component('PTTags')->hdlr_ifcomponent($this->setup_args(['component'=>'AccessAnalytics','this_tag'=>'ifcomponent'],null,$this),null,$this,true,true)):?>

<?php else:?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'ranking_enabled','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b71752'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b71752'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'ranking_period','value'=>'last10days','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'async_parts_enabled','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'dynamic_cache_ttl','value'=>'86400','this_tag'=>'setvar'],null,$this),$this)?>


<?php $_ba5c34_old_params['_b65270']=$_ba5c34_local_params;$_ba5c34_old_vars['_b65270']=$_ba5c34_local_vars;if($this->component('PTTags')->hdlr_ifcomponent($this->setup_args(['component'=>'SimplifiedJapanese','this_tag'=>'ifcomponent'],null,$this),null,$this,true,true)):?>

<?php $_ba5c34_old_params['_b9caab']=$_ba5c34_local_params;$_ba5c34_old_vars['_b9caab']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'simplifiedjapanese_furigana_api_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_ba5c34_old_params['_943dd7']=$_ba5c34_local_params;$_ba5c34_old_vars['_943dd7']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'simplifiedjapanese_api_endpoint','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'use_furigana_js','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_943dd7'];$_ba5c34_local_vars=$_ba5c34_old_vars['_943dd7'];?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b9caab'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b9caab'];?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b65270'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b65270'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>