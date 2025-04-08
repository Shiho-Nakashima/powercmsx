<?php ob_start();?><?php $_2111b6_vars=&$this->vars;$_2111b6_old_params=&$this->old_params;$_2111b6_local_params=&$this->local_params;$_2111b6_old_vars=&$this->old_vars;$_2111b6_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_2111b6_old_params['_785d76']=$_2111b6_local_params;$_2111b6_old_vars['_785d76']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_785d76'];$_2111b6_local_vars=$_2111b6_old_vars['_785d76'];?>

    </label>
  </div>
  <div class="col-lg-10">
  <?php $_2111b6_old_params['_c61c54']=$_2111b6_local_params;$_2111b6_old_vars['_c61c54']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_2111b6_old_params['_095a14']=$_2111b6_local_params;$_2111b6_old_vars['_095a14']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'forward_params','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'default','escape'=>'','setvar'=>'value','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('value','setvar',$this),$this,'setvar')?>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_095a14'];$_2111b6_local_vars=$_2111b6_old_vars['_095a14'];?>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_c61c54'];$_2111b6_local_vars=$_2111b6_old_vars['_c61c54'];?>

<textarea id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" rows="<?php $_2111b6_old_params['_f501cb']=$_2111b6_local_params;$_2111b6_old_vars['_f501cb']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'options','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
5<?php endif;$_2111b6_local_params=$_2111b6_old_params['_f501cb'];$_2111b6_local_vars=$_2111b6_old_vars['_f501cb'];?>
"
  class="form-control watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
"
  <?php $_2111b6_old_params['_e75d1f']=$_2111b6_local_params;$_2111b6_old_vars['_e75d1f']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_2111b6_local_params=$_2111b6_old_params['_e75d1f'];$_2111b6_local_vars=$_2111b6_old_vars['_e75d1f'];?>
>
<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
</textarea>
  <p class="text-muted hint-block hidden" id="default_value-hint-wrapper">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <span id="options-hint"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Enter the value to set in the hidden field.','this_tag'=>'trans'],null,$this),$this)?>
</span>
  </p>
  </div>
</div>
<script>
$('#questiontype_id-selector').change(function(){
    let class_name = $('[name=questiontype_id] option:selected').prop('class');
    if ( class_name.indexOf('hidden') != -1 ) {
        $('#default_value-hint-wrapper').show();
    } else {
        $('#default_value-hint-wrapper').hide();
    }
});
let class_name = $('[name=questiontype_id] option:selected').prop('class');
if ( class_name.indexOf('hidden') != -1 ) {
    $('#default_value-hint-wrapper').show();
} else {
    $('#default_value-hint-wrapper').hide();
}
</script><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005007,
);?>