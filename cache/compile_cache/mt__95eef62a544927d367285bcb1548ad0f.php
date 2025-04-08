<?php ob_start();?><?php $_aeb42d_vars=&$this->vars;$_aeb42d_old_params=&$this->old_params;$_aeb42d_local_params=&$this->local_params;$_aeb42d_old_vars=&$this->old_vars;$_aeb42d_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'app_version','setvar'=>'app_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('app_version','setvar',$this),$this,'setvar')?>

<?php $_aeb42d_old_params['_f025d8']=$_aeb42d_local_params;$_aeb42d_old_vars['_f025d8']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'app_version','ge'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'API','this_tag'=>'trans'],null,$this),$this)?>

      <?php $_aeb42d_old_params['_b6e3da']=$_aeb42d_local_params;$_aeb42d_old_vars['_b6e3da']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_b6e3da'];$_aeb42d_local_vars=$_aeb42d_old_vars['_b6e3da'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="0">
    <label class="custom-control custom-checkbox">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input watch-changed"
    <?php $_aeb42d_old_params['_9770fb']=$_aeb42d_local_params;$_aeb42d_old_vars['_9770fb']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_9770fb'];$_aeb42d_local_vars=$_aeb42d_old_vars['_9770fb'];?>

     type="checkbox" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="1" <?php $_aeb42d_old_params['_5fde72']=$_aeb42d_local_params;$_aeb42d_old_vars['_5fde72']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_5fde72'];$_aeb42d_local_vars=$_aeb42d_old_vars['_5fde72'];?>
>
        <span class="custom-control-indicator<?php $_aeb42d_old_params['_432b8e']=$_aeb42d_local_params;$_aeb42d_old_vars['_432b8e']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_432b8e'];$_aeb42d_local_vars=$_aeb42d_old_vars['_432b8e'];?>
"></span>
        <span class="custom-control-description"> 
        <?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'Enable API','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</span>
    </label>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<?php else:?>

<!--Do not display-->
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_f025d8'];$_aeb42d_local_vars=$_aeb42d_old_vars['_f025d8'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744002381,
);?>