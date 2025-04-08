<?php ob_start();?><?php $_2111b6_vars=&$this->vars;$_2111b6_old_params=&$this->old_params;$_2111b6_local_params=&$this->local_params;$_2111b6_old_vars=&$this->old_vars;$_2111b6_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_2111b6_old_params['_1f2af9']=$_2111b6_local_params;$_2111b6_old_vars['_1f2af9']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_1f2af9'];$_2111b6_local_vars=$_2111b6_old_vars['_1f2af9'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="<?php $_2111b6_old_params['_e75347']=$_2111b6_local_params;$_2111b6_old_vars['_e75347']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','like'=>'num','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
number<?php else:?>
text<?php endif;$_2111b6_local_params=$_2111b6_old_params['_e75347'];$_2111b6_local_vars=$_2111b6_old_vars['_e75347'];?>
" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      <?php $_2111b6_old_params['_4869d4']=$_2111b6_local_params;$_2111b6_old_vars['_4869d4']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_2111b6_local_params=$_2111b6_old_params['_4869d4'];$_2111b6_local_vars=$_2111b6_old_vars['_4869d4'];?>
>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'class','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php $_2111b6_old_params['_a51793']=$_2111b6_local_params;$_2111b6_old_vars['_a51793']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'basename','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_a51793'];$_2111b6_local_vars=$_2111b6_old_vars['_a51793'];?>

<?php $_2111b6_old_params['_7e4c0b']=$_2111b6_local_params;$_2111b6_old_vars['_7e4c0b']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_template','like'=>'placeholder=','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<script>
$('#placeholder-wrapper').hide();
</script>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_7e4c0b'];$_2111b6_local_vars=$_2111b6_old_vars['_7e4c0b'];?>

<?php $_2111b6_old_params['_385468']=$_2111b6_local_params;$_2111b6_old_vars['_385468']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'questiontype_value','like'=>'file','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#default_value-wrapper').hide();
</script>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'questiontype_value','like'=>'attachment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

<script>
$('#default_value-wrapper').hide();
</script>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_385468'];$_2111b6_local_vars=$_2111b6_old_vars['_385468'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005007,
);?>