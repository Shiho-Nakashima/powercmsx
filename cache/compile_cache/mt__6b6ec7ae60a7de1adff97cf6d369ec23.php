<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Widget : Category Archives','this_tag'=>'include'],null,$this),$this)?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Widget : Date Based Archives','this_tag'=>'include'],null,$this),$this)?>

<?php $_ba5c34_old_params['_6b485a']=$_ba5c34_local_params;$_ba5c34_old_vars['_6b485a']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'ranking_enabled','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Widget : Ranking','this_tag'=>'include'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_6b485a'];$_ba5c34_local_vars=$_ba5c34_old_vars['_6b485a'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>