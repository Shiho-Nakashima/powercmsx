<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_b3cc8d=null;ob_start();$_ba5c34_old_params['_b3cc8d']=$_ba5c34_local_params;$_ba5c34_old_vars['_b3cc8d']=$_ba5c34_local_vars;$a_b3cc8d=$this->setup_args(['regex_replace'=>'\'/^%s+$/um\',\'\'','remove_blank'=>'1','this_tag'=>'block'],null,$this);$_b3cc8d=-1;$r_b3cc8d=true;while($r_b3cc8d===true):$r_b3cc8d=($_b3cc8d!==-1)?false:true;echo $this->block_block($a_b3cc8d,$c_b3cc8d,$this,$r_b3cc8d,++$_b3cc8d,'_b3cc8d');ob_start();?>
<?php $c_b3cc8d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b3cc8d=false;}if($c_b3cc8d ):?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Header','this_tag'=>'include'],null,$this),$this)?>

<?php $_ba5c34_old_params['_1863e2']=$_ba5c34_local_params;$_ba5c34_old_vars['_1863e2']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'without_contenner','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<div class="content-section">
  <div class="container">
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_1863e2'];$_ba5c34_local_vars=$_ba5c34_old_vars['_1863e2'];?>

    <?php echo $this->function_var($this->setup_args(['name'=>'contents','this_tag'=>'var'],null,$this),$this)?>

<?php $_ba5c34_old_params['_6a48ff']=$_ba5c34_local_params;$_ba5c34_old_vars['_6a48ff']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'without_contenner','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  </div>
</div>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_6a48ff'];$_ba5c34_local_vars=$_ba5c34_old_vars['_6a48ff'];?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Footer','this_tag'=>'include'],null,$this),$this)?>

<?php endif;$c_b3cc8d=ob_get_clean();endwhile;$c_b3cc8d=ob_get_clean();echo($this->modifier_remove_blank($this->modifier_regex_replace($c_b3cc8d,$this->setup_args('\\\'/^%s+$/um\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('1','remove_blank',$this),$this,'remove_blank')); $_ba5c34_local_params=$_ba5c34_old_params['_b3cc8d'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b3cc8d'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>