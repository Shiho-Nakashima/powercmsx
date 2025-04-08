<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_740bed=null;$_ba5c34_old_params['_740bed']=$_ba5c34_local_params;$_ba5c34_old_vars['_740bed']=$_ba5c34_local_vars;$a_740bed=$this->setup_args(['module'=>'(Media) Site Layout','without_contenner'=>'1','this_tag'=>'includeblock'],null,$this);$_740bed=-1;$r_740bed=true;while($r_740bed===true):$r_740bed=($_740bed!==-1)?false:true;echo $this->component('PTTags')->hdlr_includeblock($a_740bed,$c_740bed,$this,$r_740bed,++$_740bed,'_740bed');ob_start();?>
<?php $c_740bed = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_740bed=false;}if($c_740bed ):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Site Config','this_tag'=>'include'],null,$this),$this)?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Page not found.','language'=>'$language','setvar'=>'archive_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('archive_title','setvar',$this),$this,'setvar')?>


  <main class="content-section">
    <div class="section-head">
      <h1 class="section-title align-center mb-4 display-5"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'archive_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</h1>
    </div>
  </main>
<?php endif;$c_740bed=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_740bed'];$_ba5c34_local_vars=$_ba5c34_old_vars['_740bed'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>