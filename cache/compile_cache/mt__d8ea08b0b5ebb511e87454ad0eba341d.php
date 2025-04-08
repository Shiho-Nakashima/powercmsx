<?php ob_start();?><?php $_ad2869_vars=&$this->vars;$_ad2869_old_params=&$this->old_params;$_ad2869_local_params=&$this->local_params;$_ad2869_old_vars=&$this->old_vars;$_ad2869_local_vars=&$this->local_vars;?><?php $_ad2869_old_params['_1a087e']=$_ad2869_local_params;$_ad2869_old_vars['_1a087e']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

<?php $_ad2869_old_params['_51d0e6']=$_ad2869_local_params;$_ad2869_old_vars['_51d0e6']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Comment','this_tag'=>'trans'],null,$this),$this)?>
</label>
  </div>
  <div class="col-lg-10">
    <?php $_ad2869_old_params['_1c07ef']=$_ad2869_local_params;$_ad2869_old_vars['_1c07ef']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_ad2869_old_params['_aa8121']=$_ad2869_local_params;$_ad2869_old_vars['_aa8121']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'forward_params','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'default','escape'=>'','setvar'=>'value','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('value','setvar',$this),$this,'setvar')?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_aa8121'];$_ad2869_local_vars=$_ad2869_old_vars['_aa8121'];?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_1c07ef'];$_ad2869_local_vars=$_ad2869_old_vars['_1c07ef'];?>

    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="0">
    <label class="custom-control custom-checkbox">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input watch-changed"
    <?php $_ad2869_old_params['_3b6202']=$_ad2869_local_params;$_ad2869_old_vars['_3b6202']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ad2869_local_params=$_ad2869_old_params['_3b6202'];$_ad2869_local_vars=$_ad2869_old_vars['_3b6202'];?>

     type="checkbox" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="1" <?php $_ad2869_old_params['_cd999f']=$_ad2869_local_params;$_ad2869_old_vars['_cd999f']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ad2869_local_params=$_ad2869_old_params['_cd999f'];$_ad2869_local_vars=$_ad2869_old_vars['_cd999f'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    </label>
  </div>
</div>
<?php else:?>

<!--Do not Accept Comment-->
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_51d0e6'];$_ad2869_local_vars=$_ad2869_old_vars['_51d0e6'];?>

<?php else:?>

<!--Do not Accept Comment-->
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_1a087e'];$_ad2869_local_vars=$_ad2869_old_vars['_1a087e'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744011352,
);?>