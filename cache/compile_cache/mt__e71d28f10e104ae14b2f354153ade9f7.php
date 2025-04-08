<?php ob_start();?><?php $_2111b6_vars=&$this->vars;$_2111b6_old_params=&$this->old_params;$_2111b6_local_params=&$this->local_params;$_2111b6_old_vars=&$this->old_vars;$_2111b6_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_2111b6_old_params['_38aacd']=$_2111b6_local_params;$_2111b6_old_vars['_38aacd']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_38aacd'];$_2111b6_local_vars=$_2111b6_old_vars['_38aacd'];?>

    </label>
  </div>
  <div class="col-lg-10 form-inline">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="<?php $_2111b6_old_params['_883501']=$_2111b6_local_params;$_2111b6_old_vars['_883501']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','like'=>'num','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
number<?php else:?>
text<?php endif;$_2111b6_local_params=$_2111b6_old_params['_883501'];$_2111b6_local_vars=$_2111b6_old_vars['_883501'];?>
" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      <?php $_2111b6_old_params['_3853f6']=$_2111b6_local_params;$_2111b6_old_vars['_3853f6']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_2111b6_local_params=$_2111b6_old_params['_3853f6'];$_2111b6_local_vars=$_2111b6_old_vars['_3853f6'];?>
>
      <input type="hidden" name="multiple" value="0">
        &nbsp; &nbsp;
      <label class="custom-control custom-checkbox">
        <input id="multiple" class="form-control custom-control-input watch-changed"
         type="checkbox" name="multiple" value="1" <?php $_2111b6_old_params['_e2c2f0']=$_2111b6_local_params;$_2111b6_old_vars['_e2c2f0']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_multiple','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_e2c2f0'];$_2111b6_local_vars=$_2111b6_old_vars['_e2c2f0'];?>
>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description"> 
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Multiple Values','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </label>
  </div>
</div>
<div class="row form-group" style="margin-top: -1em;">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'class','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php $_2111b6_old_params['_cc25cc']=$_2111b6_local_params;$_2111b6_old_vars['_cc25cc']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'basename','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_cc25cc'];$_2111b6_local_vars=$_2111b6_old_vars['_cc25cc'];?>

<?php $_2111b6_old_params['_53cb0a']=$_2111b6_local_params;$_2111b6_old_vars['_53cb0a']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'checkboxes','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_8dd75c']=$_2111b6_local_params;$_2111b6_old_vars['_8dd75c']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'input_group','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_703bbc']=$_2111b6_local_params;$_2111b6_old_vars['_703bbc']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'date','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<script>
$('#connector-wrapper').hide();
</script>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_703bbc'];$_2111b6_local_vars=$_2111b6_old_vars['_703bbc'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_8dd75c'];$_2111b6_local_vars=$_2111b6_old_vars['_8dd75c'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_53cb0a'];$_2111b6_local_vars=$_2111b6_old_vars['_53cb0a'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005007,
);?>