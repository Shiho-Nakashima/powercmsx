<?php ob_start();?><?php $_aeb42d_vars=&$this->vars;$_aeb42d_old_params=&$this->old_params;$_aeb42d_local_params=&$this->local_params;$_aeb42d_old_vars=&$this->old_vars;$_aeb42d_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_aeb42d_old_params['_807bca']=$_aeb42d_local_params;$_aeb42d_old_vars['_807bca']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_807bca'];$_aeb42d_local_vars=$_aeb42d_old_vars['_807bca'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <?php $_aeb42d_old_params['_6edcc6']=$_aeb42d_local_params;$_aeb42d_old_vars['_6edcc6']=$_aeb42d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_aeb42d_old_params['_a68091']=$_aeb42d_local_params;$_aeb42d_old_vars['_a68091']=$_aeb42d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'forward_params','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'value','value'=>'assets/','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_a68091'];$_aeb42d_local_vars=$_aeb42d_old_vars['_a68091'];?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_6edcc6'];$_aeb42d_local_vars=$_aeb42d_old_vars['_6edcc6'];?>

    <?php $_aeb42d_old_params['_9d9843']=$_aeb42d_local_params;$_aeb42d_old_vars['_9d9843']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_name__','eq'=>'uuid','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_aeb42d_old_params['_b10bf0']=$_aeb42d_local_params;$_aeb42d_old_vars['_b10bf0']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._duplicate','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'value','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_b10bf0'];$_aeb42d_local_vars=$_aeb42d_old_vars['_b10bf0'];?>

    <?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_9d9843'];$_aeb42d_local_vars=$_aeb42d_old_vars['_9d9843'];?>

    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="<?php $_aeb42d_old_params['_ac1a98']=$_aeb42d_local_params;$_aeb42d_old_vars['_ac1a98']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','like'=>'num','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
number<?php else:?>
text<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_ac1a98'];$_aeb42d_local_vars=$_aeb42d_old_vars['_ac1a98'];?>
" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      <?php $_aeb42d_old_params['_a7fa3f']=$_aeb42d_local_params;$_aeb42d_old_vars['_a7fa3f']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_a7fa3f'];$_aeb42d_local_vars=$_aeb42d_old_vars['_a7fa3f'];?>
>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744002381,
);?>