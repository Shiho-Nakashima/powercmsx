<?php ob_start();?><?php $_6c1c9e_vars=&$this->vars;$_6c1c9e_old_params=&$this->old_params;$_6c1c9e_local_params=&$this->local_params;$_6c1c9e_old_vars=&$this->old_vars;$_6c1c9e_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'linked_file','setvar'=>'_use_linked_file','this_tag'=>'property'],null,$this),$this),$this->setup_args('_use_linked_file','setvar',$this),$this,'setvar')?>

<?php $_6c1c9e_old_params['_859f60']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_859f60']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_use_linked_file','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

    </label>
  </div>
  <div class="col-lg-10">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="text" class="short form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
">
  <p class="text-muted hint-block mb-0">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Starting with \'%s\' will link to the files in the current theme directory.','params'=>'%t','this_tag'=>'trans'],null,$this),$this)?>

  </p>
  </div>
</div>
<?php else:?>

<!--Do not display-->
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_859f60'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_859f60'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\template\\screen_header.tmpl' => 1694708530,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075530,
);?>