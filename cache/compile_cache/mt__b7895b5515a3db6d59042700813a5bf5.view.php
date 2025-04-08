<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_45c7f9=null;ob_start();$_ba5c34_old_params['_45c7f9']=$_ba5c34_local_params;$_ba5c34_old_vars['_45c7f9']=$_ba5c34_local_vars;$a_45c7f9=$this->setup_args(['regex_replace'=>'\'/^%s+$/um\',\'\'','remove_blank'=>'1','this_tag'=>'block'],null,$this);$_45c7f9=-1;$r_45c7f9=true;while($r_45c7f9===true):$r_45c7f9=($_45c7f9!==-1)?false:true;echo $this->block_block($a_45c7f9,$c_45c7f9,$this,$r_45c7f9,++$_45c7f9,'_45c7f9');ob_start();?>
<?php $c_45c7f9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_45c7f9=false;}if($c_45c7f9 ):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Site Config','this_tag'=>'include'],null,$this),$this)?>

  <?php $_ba5c34_old_params['_fa38c5']=$_ba5c34_local_params;$_ba5c34_old_vars['_fa38c5']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'async_parts_enabled','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'call_from_async_parts','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $c_fd4eae=null;$_ba5c34_old_params['_fd4eae']=$_ba5c34_local_params;$_ba5c34_old_vars['_fd4eae']=$_ba5c34_local_vars;$a_fd4eae=$this->setup_args(['name'=>'_cache_key','this_tag'=>'setvarblock'],null,$this);ob_start();?>
__widget_ranking_async_parts_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
__<?php $c_fd4eae=ob_get_clean();$c_fd4eae=$this->block_setvarblock($a_fd4eae,$c_fd4eae,$this,$r_fd4eae,1,'_fd4eae');echo($c_fd4eae); $_ba5c34_local_params=$_ba5c34_old_params['_fd4eae'];?>

    <?php $c_83929d=null;$_ba5c34_old_params['_83929d']=$_ba5c34_local_params;$_ba5c34_old_vars['_83929d']=$_ba5c34_local_vars;$a_83929d=$this->setup_args(['cache_key'=>'$_cache_key','workspace_id'=>'$website_id','cache_ttl'=>'$dynamic_cache_ttl','triggers'=>'entry','this_tag'=>'cacheblock'],null,$this);$_83929d=-1;$r_83929d=true;while($r_83929d===true):$r_83929d=($_83929d!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_83929d,$c_83929d,$this,$r_83929d,++$_83929d,'_83929d');ob_start();?>
<?php $c_83929d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_83929d=false;}if($c_83929d ):?>

      <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Widget : Ranking','this_tag'=>'include'],null,$this),$this)?>

    <?php endif;$c_83929d=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_83929d'];$_ba5c34_local_vars=$_ba5c34_old_vars['_83929d'];?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_fa38c5'];$_ba5c34_local_vars=$_ba5c34_old_vars['_fa38c5'];?>

<?php endif;$c_45c7f9=ob_get_clean();endwhile;$c_45c7f9=ob_get_clean();echo($this->modifier_remove_blank($this->modifier_regex_replace($c_45c7f9,$this->setup_args('\\\'/^%s+$/um\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('1','remove_blank',$this),$this,'remove_blank')); $_ba5c34_local_params=$_ba5c34_old_params['_45c7f9'];$_ba5c34_local_vars=$_ba5c34_old_vars['_45c7f9'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>