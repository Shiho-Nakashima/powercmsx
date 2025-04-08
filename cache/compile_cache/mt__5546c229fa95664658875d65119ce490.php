<?php ob_start();?><?php $_2111b6_vars=&$this->vars;$_2111b6_old_params=&$this->old_params;$_2111b6_local_params=&$this->local_params;$_2111b6_old_vars=&$this->old_vars;$_2111b6_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'options','split'=>',','setvar'=>'_options_loop','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('_options_loop','setvar',$this),$this,'setvar')?>

<div class="row form-group">
  <div class="col-lg-2" id="column_maxlength-label">
    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

  </div>
  <div class="col-lg-10 form-inline">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="number" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php $_2111b6_old_params['_974eff']=$_2111b6_local_params;$_2111b6_old_vars['_974eff']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_974eff'];$_2111b6_local_vars=$_2111b6_old_vars['_974eff'];?>
"
      <?php $_2111b6_old_params['_64b792']=$_2111b6_local_params;$_2111b6_old_vars['_64b792']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_2111b6_local_params=$_2111b6_old_params['_64b792'];$_2111b6_local_vars=$_2111b6_old_vars['_64b792'];?>
>
    
    &nbsp;&nbsp;
    <span id="column_maxlength-option"><input type="hidden" name="multi_byte" value="0">
    <label class="custom-control custom-checkbox">
    <input id="multi_byte" class="form-control custom-control-input watch-changed"
    <?php $_2111b6_old_params['_b82d76']=$_2111b6_local_params;$_2111b6_old_vars['_b82d76']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_2111b6_local_params=$_2111b6_old_params['_b82d76'];$_2111b6_local_vars=$_2111b6_old_vars['_b82d76'];?>

     type="checkbox" name="multi_byte" value="1" <?php $_2111b6_old_params['_506915']=$_2111b6_local_params;$_2111b6_old_vars['_506915']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_multi_byte','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_506915'];$_2111b6_local_vars=$_2111b6_old_vars['_506915'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Multi-Byte','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label></span>
    
    <label class="custom-control custom-radio unit-label">&nbsp; &nbsp;
        <input class="custom-control-input" <?php $_2111b6_old_params['_6286ce']=$_2111b6_local_params;$_2111b6_old_vars['_6286ce']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_unit','eq'=>'Bytes','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked <?php endif;$_2111b6_local_params=$_2111b6_old_params['_6286ce'];$_2111b6_local_vars=$_2111b6_old_vars['_6286ce'];?>
type="radio" name="unit" value="Bytes">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Bytes','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <label class="custom-control custom-radio unit-label">
        <input class="custom-control-input" <?php $_2111b6_old_params['_4f9ca5']=$_2111b6_local_params;$_2111b6_old_vars['_4f9ca5']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_unit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked <?php endif;$_2111b6_local_params=$_2111b6_old_params['_4f9ca5'];$_2111b6_local_vars=$_2111b6_old_vars['_4f9ca5'];?>
<?php $_2111b6_old_params['_8d981f']=$_2111b6_local_params;$_2111b6_old_vars['_8d981f']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_unit','eq'=>'KB','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked <?php endif;$_2111b6_local_params=$_2111b6_old_params['_8d981f'];$_2111b6_local_vars=$_2111b6_old_vars['_8d981f'];?>
type="radio" name="unit" value="KB">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'KB','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <label class="custom-control custom-radio unit-label">
        <input class="custom-control-input" <?php $_2111b6_old_params['_048f72']=$_2111b6_local_params;$_2111b6_old_vars['_048f72']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_unit','eq'=>'MB','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked <?php endif;$_2111b6_local_params=$_2111b6_old_params['_048f72'];$_2111b6_local_vars=$_2111b6_old_vars['_048f72'];?>
type="radio" name="unit" value="MB">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'MB','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    &nbsp; 
    <input type="hidden" name="attach_to_email" value="0">
    <label class="custom-control custom-checkbox unit-label">
    <input id="required" class="form-control custom-control-input watch-changed"
    <?php $_2111b6_old_params['_38fdbf']=$_2111b6_local_params;$_2111b6_old_vars['_38fdbf']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_2111b6_local_params=$_2111b6_old_params['_38fdbf'];$_2111b6_local_vars=$_2111b6_old_vars['_38fdbf'];?>

     type="checkbox" name="attach_to_email" value="1" <?php $_2111b6_old_params['_409b30']=$_2111b6_local_params;$_2111b6_old_vars['_409b30']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_attach_to_email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_409b30'];$_2111b6_local_vars=$_2111b6_old_vars['_409b30'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Attach to Email','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'class','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php $_2111b6_old_params['_5aa998']=$_2111b6_local_params;$_2111b6_old_vars['_5aa998']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'questiontype_value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getobjectlabel($this->setup_args(['id'=>'$object_questiontype_id','column'=>'basename','model'=>'questiontype','setvar'=>'questiontype_value','this_tag'=>'getobjectlabel'],null,$this),$this),$this->setup_args('questiontype_value','setvar',$this),$this,'setvar')?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_5aa998'];$_2111b6_local_vars=$_2111b6_old_vars['_5aa998'];?>

<?php $_2111b6_old_params['_51a544']=$_2111b6_local_params;$_2111b6_old_vars['_51a544']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'questiontype_value','like'=>'file','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('.unit-label').show();
</script>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'questiontype_value','like'=>'attachment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

<script>
$('.unit-label').show();
</script>
<?php else:?>

<script>
$('.unit-label').hide();
</script>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_51a544'];$_2111b6_local_vars=$_2111b6_old_vars['_51a544'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005007,
);?>