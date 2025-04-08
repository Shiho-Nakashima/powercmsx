<?php ob_start();?><?php $_2111b6_vars=&$this->vars;$_2111b6_old_params=&$this->old_params;$_2111b6_local_params=&$this->local_params;$_2111b6_old_vars=&$this->old_vars;$_2111b6_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'class','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php $_2111b6_old_params['_cac590']=$_2111b6_local_params;$_2111b6_old_vars['_cac590']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'basename','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_cac590'];$_2111b6_local_vars=$_2111b6_old_vars['_cac590'];?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" id="column-options-label">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_2111b6_old_params['_fcefe5']=$_2111b6_local_params;$_2111b6_old_vars['_fcefe5']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_fcefe5'];$_2111b6_local_vars=$_2111b6_old_vars['_fcefe5'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="<?php $_2111b6_old_params['_d5d0c9']=$_2111b6_local_params;$_2111b6_old_vars['_d5d0c9']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','like'=>'num','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
number<?php else:?>
text<?php endif;$_2111b6_local_params=$_2111b6_old_params['_d5d0c9'];$_2111b6_local_vars=$_2111b6_old_vars['_d5d0c9'];?>
" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      <?php $_2111b6_old_params['_48f50b']=$_2111b6_local_params;$_2111b6_old_vars['_48f50b']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_2111b6_local_params=$_2111b6_old_params['_48f50b'];$_2111b6_local_vars=$_2111b6_old_vars['_48f50b'];?>
>
<?php $_2111b6_old_params['_61795c']=$_2111b6_local_params;$_2111b6_old_vars['_61795c']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'questiontype_value','like'=>'input_group','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_hint','value'=>'Please enter the width (number) of the fields(Comma separated list).','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'questiontype_value','like'=>'file','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_hint','value'=>'Please enter the file extension for allow(Comma separated list).','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'questiontype_value','like'=>'attachment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_hint','value'=>'Please enter the file extension for allow(Comma separated list).','this_tag'=>'setvar'],null,$this),$this)?>

<?php else:?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_hint','value'=>'Please enter all allowable options for this field as a comma separated list.','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_61795c'];$_2111b6_local_vars=$_2111b6_old_vars['_61795c'];?>

  <p class="text-muted hint-block" id="options-hint-wrapper">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <span id="options-hint"><?php echo $this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'_hint','trans'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans')?>
</span>
  </p>
  </div>
</div>
<?php $_2111b6_old_params['_37a647']=$_2111b6_local_params;$_2111b6_old_vars['_37a647']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'checkbox','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_5c0fb2']=$_2111b6_local_params;$_2111b6_old_vars['_5c0fb2']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'radio','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_9663ce']=$_2111b6_local_params;$_2111b6_old_vars['_9663ce']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'dropdown','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_a075ca']=$_2111b6_local_params;$_2111b6_old_vars['_a075ca']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'input_group','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_730fbd']=$_2111b6_local_params;$_2111b6_old_vars['_730fbd']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'date','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_c16c5c']=$_2111b6_local_params;$_2111b6_old_vars['_c16c5c']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'file','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_2111b6_old_params['_62c48e']=$_2111b6_local_params;$_2111b6_old_vars['_62c48e']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','like'=>'attachment','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<script>
$('#options-wrapper').hide();
</script>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_62c48e'];$_2111b6_local_vars=$_2111b6_old_vars['_62c48e'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_c16c5c'];$_2111b6_local_vars=$_2111b6_old_vars['_c16c5c'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_730fbd'];$_2111b6_local_vars=$_2111b6_old_vars['_730fbd'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_a075ca'];$_2111b6_local_vars=$_2111b6_old_vars['_a075ca'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_9663ce'];$_2111b6_local_vars=$_2111b6_old_vars['_9663ce'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_5c0fb2'];$_2111b6_local_vars=$_2111b6_old_vars['_5c0fb2'];?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_37a647'];$_2111b6_local_vars=$_2111b6_old_vars['_37a647'];?>

<?php $_2111b6_old_params['_00f8d0']=$_2111b6_local_params;$_2111b6_old_vars['_00f8d0']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'questiontype_value','eq'=>'checkbox','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#column-options-label').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Label','this_tag'=>'trans'],null,$this),$this)?>
</span>');
$('#options-hint-wrapper').hide();
</script>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_00f8d0'];$_2111b6_local_vars=$_2111b6_old_vars['_00f8d0'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005007,
);?>