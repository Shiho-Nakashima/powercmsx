<?php ob_start();?><?php $_aeb42d_vars=&$this->vars;$_aeb42d_old_params=&$this->old_params;$_aeb42d_local_params=&$this->local_params;$_aeb42d_old_vars=&$this->old_vars;$_aeb42d_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_aeb42d_old_params['_4b1d13']=$_aeb42d_local_params;$_aeb42d_old_vars['_4b1d13']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_4b1d13'];$_aeb42d_local_vars=$_aeb42d_old_vars['_4b1d13'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <div class="input-group">
      <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="url" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php $_aeb42d_old_params['_f532c9']=$_aeb42d_local_params;$_aeb42d_old_vars['_f532c9']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'site_url','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_f532c9'];$_aeb42d_local_vars=$_aeb42d_old_vars['_f532c9'];?>
"
        <?php $_aeb42d_old_params['_400182']=$_aeb42d_local_params;$_aeb42d_old_vars['_400182']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_400182'];$_aeb42d_local_vars=$_aeb42d_old_vars['_400182'];?>
 class="watch-changed form-control <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" placeholder="https://">
      <div class="input-group-addon" style="border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;border-left:none">
      <a href="javascript:void(0);" id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-btn">
        <i class="fa fa-external-link" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Open in new window','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </a>
      </div>
    </div>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<script>
$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-btn').click(function(){
    var url = $('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').val();
    if ( url && url.match( /^https?:\/\// ) ) {
        window.open( url, '_blank');
    }
    return false;
});
</script><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744002381,
);?>