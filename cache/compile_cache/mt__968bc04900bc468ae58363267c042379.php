<?php ob_start();?><?php $_6c1c9e_vars=&$this->vars;$_6c1c9e_old_params=&$this->old_params;$_6c1c9e_local_params=&$this->local_params;$_6c1c9e_old_vars=&$this->old_vars;$_6c1c9e_local_vars=&$this->local_vars;?><?php $c_9455ba=null;$_6c1c9e_old_params['_9455ba']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_9455ba']=$_6c1c9e_local_vars;$a_9455ba=$this->setup_args(['name'=>'parser_errors','this_tag'=>'loop'],null,$this);$_9455ba=-1;$r_9455ba=true;while($r_9455ba===true):$r_9455ba=($_9455ba!==-1)?false:true;echo $this->block_loop($a_9455ba,$c_9455ba,$this,$r_9455ba,++$_9455ba,'_9455ba');ob_start();?>
<?php $c_9455ba = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9455ba=false;}if($c_9455ba ):?>

<?php $_6c1c9e_old_params['_3b987e']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_3b987e']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div id="alert-parser_errors" class="alert alert-danger" role="alert" tabindex="0">
<ul class="parser_errors list-group list-group-flush"><?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_3b987e'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_3b987e'];?>

<li><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</li>
<?php $_6c1c9e_old_params['_028c19']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_028c19']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</ul></div>
<script>
$('#alert-parser_errors').focus();
</script>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_028c19'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_028c19'];?>

<?php endif;$c_9455ba=ob_get_clean();endwhile; $_6c1c9e_local_params=$_6c1c9e_old_params['_9455ba'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_9455ba'];?>
<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\template\\screen_header.tmpl' => 1694708530,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075530,
);?>