<?php ob_start();?><?php $_b7ec14_vars=&$this->vars;$_b7ec14_old_params=&$this->old_params;$_b7ec14_local_params=&$this->local_params;$_b7ec14_old_vars=&$this->old_vars;$_b7ec14_local_vars=&$this->local_vars;?><?php $c_318460=null;$_b7ec14_old_params['_318460']=$_b7ec14_local_params;$_b7ec14_old_vars['_318460']=$_b7ec14_local_vars;$a_318460=$this->setup_args(['name'=>'card_text','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <?php $_b7ec14_old_params['_fc1ee6']=$_b7ec14_local_params;$_b7ec14_old_vars['_fc1ee6']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config"><?php echo $this->function_trans($this->setup_args(['phrase'=>'If you want to customize or delete this widget please click this link text.','this_tag'=>'trans'],null,$this),$this)?>
</a><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_fc1ee6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fc1ee6'];?>

<?php $c_318460=ob_get_clean();$c_318460=$this->block_setvarblock($a_318460,$c_318460,$this,$r_318460,1,'_318460');echo($c_318460); $_b7ec14_local_params=$_b7ec14_old_params['_318460'];?>

<div class="card dashboard-widget dashboard-widget-main">
<?php $_b7ec14_old_params['_69e885']=$_b7ec14_local_params;$_b7ec14_old_vars['_69e885']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="card-image-wrapper"><img class="card-img-top img-fluid" src="assets/brand/PowerCMSX.svg" alt="PowerCMS X"></div>
  <div class="card-block">
    <p class="card-text mb-1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Welcome to %s!','params'=>'PowerCMS X','this_tag'=>'trans'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'card_text','this_tag'=>'var'],null,$this),$this)?>
</p>
    <?php $_b7ec14_old_params['_432c73']=$_b7ec14_local_params;$_b7ec14_old_vars['_432c73']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

    <div class="text-center mt-1">
      <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace" class="btn btn-primary very-short btn-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
</a>
      <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=manage_theme" class="btn btn-primary very-short btn-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Theme','this_tag'=>'trans'],null,$this),$this)?>
</a>
    </div>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_432c73'];$_b7ec14_local_vars=$_b7ec14_old_vars['_432c73'];?>

  </div>
<?php else:?>

  <div class="card-image-wrapper"><span><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span></div>
  <div class="card-block">
    <p class="card-text mb-1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'This Page is WorkSpace %s\'s Dashboard!','params'=>'$workspace_name','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_var($this->setup_args(['name'=>'card_text','this_tag'=>'var'],null,$this),$this)?>
</p>
    <?php $_b7ec14_old_params['_6c36b0']=$_b7ec14_local_params;$_b7ec14_old_vars['_6c36b0']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['workspace_id'=>'$workspace_id','this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

    <div class="text-center mt-1">
      <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-primary very-short btn-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</a>
      <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=manage_theme&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-primary very-short btn-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Theme','this_tag'=>'trans'],null,$this),$this)?>
</a>
    </div>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6c36b0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6c36b0'];?>

  </div>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_69e885'];$_b7ec14_local_vars=$_b7ec14_old_vars['_69e885'];?>

</div><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\dashboard.tmpl' => 1694708434,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\header.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\start_upload.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_filters.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext4.tmpl' => 1718664276,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988087,
);?>