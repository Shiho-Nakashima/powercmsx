<?php ob_start();?><?php $_63d9f8_vars=&$this->vars;$_63d9f8_old_params=&$this->old_params;$_63d9f8_local_params=&$this->local_params;$_63d9f8_old_vars=&$this->old_vars;$_63d9f8_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Anti-spam Measures','this_tag'=>'trans'],null,$this),$this)?>

      <?php $_63d9f8_old_params['_6d53af']=$_63d9f8_local_params;$_63d9f8_old_vars['_6d53af']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_6d53af'];$_63d9f8_local_vars=$_63d9f8_old_vars['_6d53af'];?>

    </label>
  </div>
  <div class="col-lg-10 form-inline row-more form-inline-left-margin">
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="0">
    <label class="custom-control custom-checkbox">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input watch-changed"
    <?php $_63d9f8_old_params['_36b11c']=$_63d9f8_local_params;$_63d9f8_old_vars['_36b11c']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_36b11c'];$_63d9f8_local_vars=$_63d9f8_old_vars['_36b11c'];?>

     type="checkbox" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="1" <?php $_63d9f8_old_params['_622d71']=$_63d9f8_local_params;$_63d9f8_old_vars['_622d71']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_622d71'];$_63d9f8_local_vars=$_63d9f8_old_vars['_622d71'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    </label>
    <label for="token_expires" class="token_expires"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Token Expires','this_tag'=>'trans'],null,$this),$this)?>
</label> <span class="token_expires"> &nbsp; : </span>
    <input id="token_expires" type="number" class="token_expires num form-control watch-changed" name="token_expires" value="<?php $_63d9f8_old_params['_ec5e20']=$_63d9f8_local_params;$_63d9f8_old_vars['_ec5e20']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_token_expires','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_token_expires','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
1200<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_ec5e20'];$_63d9f8_local_vars=$_63d9f8_old_vars['_ec5e20'];?>
">
    <span class="token_expires">&nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>'seconds','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <input type="hidden" name="use_session" value="0">
    <label class="custom-control custom-checkbox ml-4 token_expires">
    <input id="use_session" class="custom-control-input watch-changed"
     type="checkbox" name="use_session" value="1" <?php $_63d9f8_old_params['_46d88c']=$_63d9f8_local_params;$_63d9f8_old_vars['_46d88c']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_use_session','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_46d88c'];$_63d9f8_local_vars=$_63d9f8_old_vars['_46d88c'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Use Session','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>
<script>
<?php $_63d9f8_old_params['_4ae10d']=$_63d9f8_local_params;$_63d9f8_old_vars['_4ae10d']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_requires_token','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  $('.token_expires').hide();
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_4ae10d'];$_63d9f8_local_vars=$_63d9f8_old_vars['_4ae10d'];?>

$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').change(function(){
    if ( $(this).prop('checked') ) {
        $('.token_expires').show();
        $('#token_expires').focus();
    } else {
        $('.token_expires').hide();
    }
});
</script><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\entry\\column_title.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\entry\\column_text.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988263,
);?>