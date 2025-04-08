<?php ob_start();?><?php $_aeb42d_vars=&$this->vars;$_aeb42d_old_params=&$this->old_params;$_aeb42d_local_params=&$this->local_params;$_aeb42d_old_vars=&$this->old_vars;$_aeb42d_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <?php $_aeb42d_old_params['_f5ffee']=$_aeb42d_local_params;$_aeb42d_old_vars['_f5ffee']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_f5ffee'];$_aeb42d_local_vars=$_aeb42d_old_vars['_f5ffee'];?>

  </div>
  <div class="col-lg-10">
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="0">
    <label class="custom-control custom-checkbox">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input watch-changed"
    <?php $_aeb42d_old_params['_702d79']=$_aeb42d_local_params;$_aeb42d_old_vars['_702d79']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_702d79'];$_aeb42d_local_vars=$_aeb42d_old_vars['_702d79'];?>

     type="checkbox" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="1" <?php $_aeb42d_old_params['_a9b5a4']=$_aeb42d_local_params;$_aeb42d_old_vars['_a9b5a4']=$_aeb42d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_aeb42d_old_params['_aa2ad1']=$_aeb42d_local_params;$_aeb42d_old_vars['_aa2ad1']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_aa2ad1'];$_aeb42d_local_vars=$_aeb42d_old_vars['_aa2ad1'];?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_a9b5a4'];$_aeb42d_local_vars=$_aeb42d_old_vars['_a9b5a4'];?>
 <?php $_aeb42d_old_params['_95c06a']=$_aeb42d_local_params;$_aeb42d_old_vars['_95c06a']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_95c06a'];$_aeb42d_local_vars=$_aeb42d_old_vars['_95c06a'];?>
>
        <span class="custom-control-indicator<?php $_aeb42d_old_params['_3192b1']=$_aeb42d_local_params;$_aeb42d_old_vars['_3192b1']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_3192b1'];$_aeb42d_local_vars=$_aeb42d_old_vars['_3192b1'];?>
"></span>
        <span class="custom-control-description"> 
        <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    </label>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="show_path">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Show Path Field','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <label class="custom-control custom-checkbox">
    <input id="show_path" class="custom-control-input"
     type="checkbox" name="show_path_entry" value="1" <?php $_aeb42d_old_params['_021220']=$_aeb42d_local_params;$_aeb42d_old_vars['_021220']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_show_path_entry','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_021220'];$_aeb42d_local_vars=$_aeb42d_old_vars['_021220'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Entry','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <label class="custom-control custom-checkbox">
    <input class="custom-control-input"
     type="checkbox" name="show_path_page" value="1" <?php $_aeb42d_old_params['_e0811b']=$_aeb42d_local_params;$_aeb42d_old_vars['_e0811b']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_show_path_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_e0811b'];$_aeb42d_local_vars=$_aeb42d_old_vars['_e0811b'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Page','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
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