<?php ob_start();?><?php $_2111b6_vars=&$this->vars;$_2111b6_old_params=&$this->old_params;$_2111b6_local_params=&$this->local_params;$_2111b6_old_vars=&$this->old_vars;$_2111b6_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'class','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php $_2111b6_old_params['_b737c5']=$_2111b6_local_params;$_2111b6_old_vars['_b737c5']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'basename','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_b737c5'];$_2111b6_local_vars=$_2111b6_old_vars['_b737c5'];?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_2111b6_old_params['_e5b476']=$_2111b6_local_params;$_2111b6_old_vars['_e5b476']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_e5b476'];$_2111b6_local_vars=$_2111b6_old_vars['_e5b476'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="<?php $_2111b6_old_params['_a4326a']=$_2111b6_local_params;$_2111b6_old_vars['_a4326a']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','like'=>'num','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
number<?php else:?>
text<?php endif;$_2111b6_local_params=$_2111b6_old_params['_a4326a'];$_2111b6_local_vars=$_2111b6_old_vars['_a4326a'];?>
" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      <?php $_2111b6_old_params['_bab288']=$_2111b6_local_params;$_2111b6_old_vars['_bab288']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_2111b6_local_params=$_2111b6_old_params['_bab288'];$_2111b6_local_vars=$_2111b6_old_vars['_bab288'];?>
>
<?php $_2111b6_old_params['_c52a4d']=$_2111b6_local_params;$_2111b6_old_vars['_c52a4d']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'questiontype_value','eq'=>'checkbox','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_hint','value'=>'If you want to receive a value different from the value entered for the label, please enter alternative value.','this_tag'=>'setvar'],null,$this),$this)?>

<?php else:?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_hint','value'=>'If you want to receive a value different from the value entered for the options, please enter alternative comma separated list.','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_c52a4d'];$_2111b6_local_vars=$_2111b6_old_vars['_c52a4d'];?>

  <p class="text-muted hint-block">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <span id="column-values-hint"><?php echo $this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'_hint','trans'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans')?>
</span>
  </p>
  </div>
</div>
<?php $_2111b6_old_params['_ee688e']=$_2111b6_local_params;$_2111b6_old_vars['_ee688e']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'checkbox','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_f8ed91']=$_2111b6_local_params;$_2111b6_old_vars['_f8ed91']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'radio','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_f9f7d8']=$_2111b6_local_params;$_2111b6_old_vars['_f9f7d8']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'dropdown','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<script>
$('#values-wrapper').hide();
</script>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_f9f7d8'];$_2111b6_local_vars=$_2111b6_old_vars['_f9f7d8'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_f8ed91'];$_2111b6_local_vars=$_2111b6_old_vars['_f8ed91'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_ee688e'];$_2111b6_local_vars=$_2111b6_old_vars['_ee688e'];?>

<?php $_2111b6_old_params['_974369']=$_2111b6_local_params;$_2111b6_old_vars['_974369']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'questiontype_value','like'=>'file','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#maxlength-wrapper').show();
$('#validation_type-wrapper').hide();
$('#column_maxlength-label').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Max File Size','this_tag'=>'trans'],null,$this),$this)?>
</span>');
$('#column_maxlength-option').hide();
</script>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'questiontype_value','like'=>'attachment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

<script>
$('#maxlength-wrapper').show();
$('#validation_type-wrapper').hide();
$('#column_maxlength-label').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Max File Size','this_tag'=>'trans'],null,$this),$this)?>
</span>');
$('#column_maxlength-option').hide();
</script>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_974369'];$_2111b6_local_vars=$_2111b6_old_vars['_974369'];?>
<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005007,
);?>