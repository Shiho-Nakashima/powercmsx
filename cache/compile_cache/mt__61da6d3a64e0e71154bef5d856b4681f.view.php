<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_409b55=null;$_ba5c34_old_params['_409b55']=$_ba5c34_local_params;$_ba5c34_old_vars['_409b55']=$_ba5c34_local_vars;$a_409b55=$this->setup_args(['module'=>'(Media) Site Layout','this_tag'=>'includeblock'],null,$this);$_409b55=-1;$r_409b55=true;while($r_409b55===true):$r_409b55=($_409b55!==-1)?false:true;echo $this->component('PTTags')->hdlr_includeblock($a_409b55,$c_409b55,$this,$r_409b55,++$_409b55,'_409b55');ob_start();?>
<?php $c_409b55 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_409b55=false;}if($c_409b55 ):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Site Config','this_tag'=>'include'],null,$this),$this)?>

  <?php $_ba5c34_old_params['_9d7481']=$_ba5c34_local_params;$_ba5c34_old_vars['_9d7481']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_archive_type','eq'=>'index','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Latest Entries','language'=>'$language','setvar'=>'archive_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('archive_title','setvar',$this),$this,'setvar')?>

  <?php else:?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_archivetitle($this->setup_args(['language'=>'$language','setvar'=>'archive_title','this_tag'=>'archivetitle'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('archive_title','setvar',$this),$this,'setvar')?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_9d7481'];$_ba5c34_local_vars=$_ba5c34_old_vars['_9d7481'];?>


  <div class="row">
    <div class="col-lg-8">
      <section class="new-section">
        <h1 class="section-heading"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'archive_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</h1>
        <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) List of Entries','entries_image'=>'1','entries_category_badge'=>'1','entries_pagination'=>'1','this_tag'=>'include'],null,$this),$this)?>

      </section>
    </div>
    <div class="col-lg-4">
      <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Side Bar','this_tag'=>'include'],null,$this),$this)?>

    </div>
  </div>
<?php endif;$c_409b55=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_409b55'];$_ba5c34_local_vars=$_ba5c34_old_vars['_409b55'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>