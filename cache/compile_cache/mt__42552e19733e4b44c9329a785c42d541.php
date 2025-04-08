<?php ob_start();?><?php $_6c1c9e_vars=&$this->vars;$_6c1c9e_old_params=&$this->old_params;$_6c1c9e_local_params=&$this->local_params;$_6c1c9e_old_vars=&$this->old_vars;$_6c1c9e_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_6c1c9e_old_params['_5aea8e']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_5aea8e']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_5aea8e'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_5aea8e'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="text" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      <?php $_6c1c9e_old_params['_c8ce18']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_c8ce18']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_c8ce18'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_c8ce18'];?>
>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<?php $_6c1c9e_old_params['_bb63da']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_bb63da']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_class','ne'=>'Mail','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#subject-wrapper').hide();
</script>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_bb63da'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_bb63da'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\template\\screen_header.tmpl' => 1694708530,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075530,
);?>