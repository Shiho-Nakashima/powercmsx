<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><script src="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/js/jquery.min.js"></script>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/js/popper.min.js"></script>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/js/tether.min.js"></script>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/js/bootstrap.min.js"></script>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/js/smooth-scroll.js"></script>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/js/nav-dropdown.js"></script>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/js/navbar-dropdown.js"></script>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/js/jquery.touch-swipe.min.js"></script>
<?php echo $this->function_var($this->setup_args(['name'=>'additional_script','this_tag'=>'var'],null,$this),$this)?>

<?php $_ba5c34_old_params['_92df87']=$_ba5c34_local_params;$_ba5c34_old_vars['_92df87']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'ranking_enabled','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Scripts - AccessTracking','this_tag'=>'include'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_92df87'];$_ba5c34_local_vars=$_ba5c34_old_vars['_92df87'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>