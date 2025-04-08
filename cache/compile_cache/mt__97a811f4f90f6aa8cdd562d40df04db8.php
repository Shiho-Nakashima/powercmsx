<?php ob_start();?><?php $_aeb42d_vars=&$this->vars;$_aeb42d_old_params=&$this->old_params;$_aeb42d_local_params=&$this->local_params;$_aeb42d_old_vars=&$this->old_vars;$_aeb42d_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_aeb42d_old_params['_1cc57e']=$_aeb42d_local_params;$_aeb42d_old_vars['_1cc57e']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_1cc57e'];$_aeb42d_local_vars=$_aeb42d_old_vars['_1cc57e'];?>

    </label>
  </div>
  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'site_base_path','setvar'=>'site_base_path','this_tag'=>'property'],null,$this),$this),$this->setup_args('site_base_path','setvar',$this),$this,'setvar')?>

  <?php $_aeb42d_old_params['_cf4311']=$_aeb42d_local_params;$_aeb42d_old_vars['_cf4311']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'site_base_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div class="col-lg-10 form-inline">
      <?php echo $this->modifier_setvar($this->modifier_preg_quote($this->function_var($this->setup_args(['name'=>'site_base_path','preg_quote'=>'/','setvar'=>'search_path','this_tag'=>'var'],null,$this),$this),$this->setup_args('/','preg_quote',$this),$this,'preg_quote'),$this->setup_args('search_path','setvar',$this),$this,'setvar')?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'search_path','value'=>'/','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'search_path','value'=>'/^','prepend'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      &nbsp; &nbsp; &nbsp; <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'site_base_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="text" style="width: 200px;" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php $_aeb42d_old_params['_bcf1f4']=$_aeb42d_local_params;$_aeb42d_old_vars['_bcf1f4']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars(paml_modifier_funcs('ltrim', $this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'value','regex_replace'=>'\'$search_path\',\'\'','ltrim'=>'/','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$search_path\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'), '/'),ENT_QUOTES)?>
<?php else:?>
<?php echo paml_htmlspecialchars(paml_modifier_funcs('ltrim', $this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'site_path','regex_replace'=>'\'$search_path\',\'\'','ltrim'=>'/','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$search_path\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'), '/'),ENT_QUOTES)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_bcf1f4'];$_aeb42d_local_vars=$_aeb42d_old_vars['_bcf1f4'];?>
">
    </div>
  <?php else:?>

    <div class="col-lg-10">
      <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="text" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php $_aeb42d_old_params['_7a5af9']=$_aeb42d_local_params;$_aeb42d_old_vars['_7a5af9']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'site_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_7a5af9'];$_aeb42d_local_vars=$_aeb42d_old_vars['_7a5af9'];?>
">
    </div>
  <?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_cf4311'];$_aeb42d_local_vars=$_aeb42d_old_vars['_cf4311'];?>

</div><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744002381,
);?>