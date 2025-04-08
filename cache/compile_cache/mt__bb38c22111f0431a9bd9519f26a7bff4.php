<?php ob_start();?><?php $_7a2f6a_vars=&$this->vars;$_7a2f6a_old_params=&$this->old_params;$_7a2f6a_local_params=&$this->local_params;$_7a2f6a_old_vars=&$this->old_vars;$_7a2f6a_local_vars=&$this->local_vars;?><?php $c_50635c=null;$_7a2f6a_old_params['_50635c']=$_7a2f6a_local_params;$_7a2f6a_old_vars['_50635c']=$_7a2f6a_local_vars;$a_50635c=$this->setup_args(['limit'=>'1','this_tag'=>'entrycategories'],null,$this);$_50635c=-1;$r_50635c=true;while($r_50635c===true):$r_50635c=($_50635c!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_50635c,$c_50635c,$this,$r_50635c,++$_50635c,'_50635c');ob_start();?>
<?php $c_50635c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_50635c=false;}if($c_50635c ):?>
<?php echo $this->component('PTTags')->hdlr_get_objectpath($this->setup_args(['this_tag'=>'categorypath'],null,$this),$this)?>
/<?php endif;$c_50635c=ob_get_clean();endwhile; $_7a2f6a_local_params=$_7a2f6a_old_params['_50635c'];$_7a2f6a_local_vars=$_7a2f6a_old_vars['_50635c'];?>
<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'entrybasename'],null,$this),$this)?>
.html<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744011343,
);?>