<?php ob_start();?><?php $_23ce9e_vars=&$this->vars;$_23ce9e_old_params=&$this->old_params;$_23ce9e_local_params=&$this->local_params;$_23ce9e_old_vars=&$this->old_vars;$_23ce9e_local_vars=&$this->local_vars;?><?php $c_048ef5=null;$_23ce9e_old_params['_048ef5']=$_23ce9e_local_params;$_23ce9e_old_vars['_048ef5']=$_23ce9e_local_vars;$a_048ef5=$this->setup_args(['this_tag'=>'pagefoldercontext'],null,$this);$_048ef5=-1;$r_048ef5=true;while($r_048ef5===true):$r_048ef5=($_048ef5!==-1)?false:true;echo $this->component('PTTags')->hdlr_referencecontext($a_048ef5,$c_048ef5,$this,$r_048ef5,++$_048ef5,'_048ef5');ob_start();?>
<?php $c_048ef5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_048ef5=false;}if($c_048ef5 ):?>
<?php echo $this->component('PTTags')->hdlr_get_objectpath($this->setup_args(['this_tag'=>'folderpath'],null,$this),$this)?>
/<?php endif;$c_048ef5=ob_get_clean();endwhile; $_23ce9e_local_params=$_23ce9e_old_params['_048ef5'];$_23ce9e_local_vars=$_23ce9e_old_vars['_048ef5'];?>
<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'pagebasename'],null,$this),$this)?>
.html<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744011381,
);?>