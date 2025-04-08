<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_6631b4=null;ob_start();$_ba5c34_old_params['_6631b4']=$_ba5c34_local_params;$_ba5c34_old_vars['_6631b4']=$_ba5c34_local_vars;$a_6631b4=$this->setup_args(['regex_replace'=>'\'/^%s+$/um\',\'\'','remove_blank'=>'1','this_tag'=>'block'],null,$this);$_6631b4=-1;$r_6631b4=true;while($r_6631b4===true):$r_6631b4=($_6631b4!==-1)?false:true;echo $this->block_block($a_6631b4,$c_6631b4,$this,$r_6631b4,++$_6631b4,'_6631b4');ob_start();?>
<?php $c_6631b4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_6631b4=false;}if($c_6631b4 ):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Site Config','this_tag'=>'include'],null,$this),$this)?>

  <?php $_ba5c34_old_params['_5797d6']=$_ba5c34_local_params;$_ba5c34_old_vars['_5797d6']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'async_parts_enabled','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'call_from_async_parts','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $c_6f44fd=null;$_ba5c34_old_params['_6f44fd']=$_ba5c34_local_params;$_ba5c34_old_vars['_6f44fd']=$_ba5c34_local_vars;$a_6f44fd=$this->setup_args(['name'=>'_cache_key','this_tag'=>'setvarblock'],null,$this);ob_start();?>
__parts_latest_entries_by_category_<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'categoryid'],null,$this),$this)?>
_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
__<?php $c_6f44fd=ob_get_clean();$c_6f44fd=$this->block_setvarblock($a_6f44fd,$c_6f44fd,$this,$r_6f44fd,1,'_6f44fd');echo($c_6f44fd); $_ba5c34_local_params=$_ba5c34_old_params['_6f44fd'];?>

    <?php $c_59bbd5=null;$_ba5c34_old_params['_59bbd5']=$_ba5c34_local_params;$_ba5c34_old_vars['_59bbd5']=$_ba5c34_local_vars;$a_59bbd5=$this->setup_args(['cache_key'=>'$_cache_key','workspace_id'=>'$website_id','cache_ttl'=>'$dynamic_cache_ttl','triggers'=>'entry','this_tag'=>'cacheblock'],null,$this);$_59bbd5=-1;$r_59bbd5=true;while($r_59bbd5===true):$r_59bbd5=($_59bbd5!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_59bbd5,$c_59bbd5,$this,$r_59bbd5,++$_59bbd5,'_59bbd5');ob_start();?>
<?php $c_59bbd5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_59bbd5=false;}if($c_59bbd5 ):?>

      <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Latest Entries by Category','this_tag'=>'include'],null,$this),$this)?>

    <?php endif;$c_59bbd5=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_59bbd5'];$_ba5c34_local_vars=$_ba5c34_old_vars['_59bbd5'];?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_5797d6'];$_ba5c34_local_vars=$_ba5c34_old_vars['_5797d6'];?>

<?php endif;$c_6631b4=ob_get_clean();endwhile;$c_6631b4=ob_get_clean();echo($this->modifier_remove_blank($this->modifier_regex_replace($c_6631b4,$this->setup_args('\\\'/^%s+$/um\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('1','remove_blank',$this),$this,'remove_blank')); $_ba5c34_local_params=$_ba5c34_old_params['_6631b4'];$_ba5c34_local_vars=$_ba5c34_old_vars['_6631b4'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>