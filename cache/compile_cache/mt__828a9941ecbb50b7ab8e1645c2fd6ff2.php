<?php ob_start();?><?php $_aeb42d_vars=&$this->vars;$_aeb42d_old_params=&$this->old_params;$_aeb42d_local_params=&$this->local_params;$_aeb42d_old_vars=&$this->old_vars;$_aeb42d_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

<?php $_aeb42d_old_params['_eae75e']=$_aeb42d_local_params;$_aeb42d_old_vars['_eae75e']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Comments','this_tag'=>'trans'],null,$this),$this)?>

      <?php $_aeb42d_old_params['_a8b0d2']=$_aeb42d_local_params;$_aeb42d_old_vars['_a8b0d2']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_a8b0d2'];$_aeb42d_local_vars=$_aeb42d_old_vars['_a8b0d2'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="0">
    <label class="custom-control custom-checkbox">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input watch-changed"
    <?php $_aeb42d_old_params['_a6ff7b']=$_aeb42d_local_params;$_aeb42d_old_vars['_a6ff7b']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_a6ff7b'];$_aeb42d_local_vars=$_aeb42d_old_vars['_a6ff7b'];?>

     type="checkbox" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="1" <?php $_aeb42d_old_params['_91dba0']=$_aeb42d_local_params;$_aeb42d_old_vars['_91dba0']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_91dba0'];$_aeb42d_local_vars=$_aeb42d_old_vars['_91dba0'];?>
>
        <span class="custom-control-indicator<?php $_aeb42d_old_params['_61a651']=$_aeb42d_local_params;$_aeb42d_old_vars['_61a651']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_61a651'];$_aeb42d_local_vars=$_aeb42d_old_vars['_61a651'];?>
"></span>
        <span class="custom-control-description"> 
        <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    </label>
    <input type="hidden" name="anonymous_comment" value="0">
    <label id="anonymous_comment" class="custom-control custom-checkbox <?php $_aeb42d_old_params['_ff728c']=$_aeb42d_local_params;$_aeb42d_old_vars['_ff728c']=$_aeb42d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
hidden<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_ff728c'];$_aeb42d_local_vars=$_aeb42d_old_vars['_ff728c'];?>
">
    <input class="custom-control-input watch-changed"
     type="checkbox" name="anonymous_comment" value="1" <?php $_aeb42d_old_params['_328c81']=$_aeb42d_local_params;$_aeb42d_old_vars['_328c81']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_anonymous_comment','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_328c81'];$_aeb42d_local_vars=$_aeb42d_old_vars['_328c81'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Accept Anonymous Comment','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <input type="hidden" name="comment_thanks" value="0">
    <label id="comment_thanks" class="custom-control custom-checkbox <?php $_aeb42d_old_params['_b9532a']=$_aeb42d_local_params;$_aeb42d_old_vars['_b9532a']=$_aeb42d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
hidden<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_b9532a'];$_aeb42d_local_vars=$_aeb42d_old_vars['_b9532a'];?>
">
    <input class="custom-control-input watch-changed"
     type="checkbox" name="comment_thanks" value="1" <?php $_aeb42d_old_params['_b26f7a']=$_aeb42d_local_params;$_aeb42d_old_vars['_b26f7a']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_comment_thanks','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_b26f7a'];$_aeb42d_local_vars=$_aeb42d_old_vars['_b26f7a'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Thanks email','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <span <?php $_aeb42d_old_params['_f6ae8c']=$_aeb42d_local_params;$_aeb42d_old_vars['_f6ae8c']=$_aeb42d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
class="hidden"<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_f6ae8c'];$_aeb42d_local_vars=$_aeb42d_old_vars['_f6ae8c'];?>
" id="comment_status"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Status','this_tag'=>'trans'],null,$this),$this)?>
 &nbsp; : &nbsp;
    <select class="form-control custom-select short" name="comment_status">
      <option value="1" <?php $_aeb42d_old_params['_442bc9']=$_aeb42d_local_params;$_aeb42d_old_vars['_442bc9']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_comment_status','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_442bc9'];$_aeb42d_local_vars=$_aeb42d_old_vars['_442bc9'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'Disabled','this_tag'=>'trans'],null,$this),$this)?>
</option>
      <option value="2" <?php $_aeb42d_old_params['_a1be77']=$_aeb42d_local_params;$_aeb42d_old_vars['_a1be77']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_comment_status','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_a1be77'];$_aeb42d_local_vars=$_aeb42d_old_vars['_a1be77'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'Enabled','this_tag'=>'trans'],null,$this),$this)?>
</option>
    </select>
    </span>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<script>
$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').change(function(){
    if ( $(this).prop('checked') ) {
        $('#anonymous_comment').css('display', 'inline');
        $('#comment_thanks').css('display', 'inline');
        $('#comment_status').css('display', 'inline');
        $('#anonymous_comment').show();
        $('#comment_thanks').show();
        $('#comment_status').show();
    } else {
        $('#anonymous_comment').hide();
        $('#comment_thanks').hide();
        $('#comment_status').hide();
    }
});
</script>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_eae75e'];$_aeb42d_local_vars=$_aeb42d_old_vars['_eae75e'];?>

<!--Dummy Comment--><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744002381,
);?>