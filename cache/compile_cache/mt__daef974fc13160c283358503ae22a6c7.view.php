<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_d4cec0=null;$_ba5c34_old_params['_d4cec0']=$_ba5c34_local_params;$_ba5c34_old_vars['_d4cec0']=$_ba5c34_local_vars;$a_d4cec0=$this->setup_args(['module'=>'(Media) Site Layout','this_tag'=>'includeblock'],null,$this);$_d4cec0=-1;$r_d4cec0=true;while($r_d4cec0===true):$r_d4cec0=($_d4cec0!==-1)?false:true;echo $this->component('PTTags')->hdlr_includeblock($a_d4cec0,$c_d4cec0,$this,$r_d4cec0,++$_d4cec0,'_d4cec0');ob_start();?>
<?php $c_d4cec0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d4cec0=false;}if($c_d4cec0 ):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Site Config','this_tag'=>'include'],null,$this),$this)?>

  <?php $_ba5c34_old_params['_b9eaa3']=$_ba5c34_local_params;$_ba5c34_old_vars['_b9eaa3']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'categorydescription','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'page_description','this_tag'=>'categorydescription'],null,$this),$this),$this->setup_args('page_description','setvar',$this),$this,'setvar')?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b9eaa3'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b9eaa3'];?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','setvar'=>'archive_title','this_tag'=>'categorylabel'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('archive_title','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'category_basename','this_tag'=>'categorybasename'],null,$this),$this),$this->setup_args('category_basename','setvar',$this),$this,'setvar')?>

  <?php $c_826116=null;$_ba5c34_old_params['_826116']=$_ba5c34_local_params;$_ba5c34_old_vars['_826116']=$_ba5c34_local_vars;$a_826116=$this->setup_args(['name'=>'ogp_image','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) OGP Image URL','ogp_image_key'=>'$category_basename','this_tag'=>'include'],null,$this),$this)?>
<?php $c_826116=ob_get_clean();$c_826116=$this->block_setvarblock($a_826116,$c_826116,$this,$r_826116,1,'_826116');echo($c_826116); $_ba5c34_local_params=$_ba5c34_old_params['_826116'];?>


  <div class="row">
    <div class="col-lg-8">
      <section class="new-section">
        <h1 class="section-heading"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'archive_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</h1>
        <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) List of Entries','entries_image'=>'1','entries_pagination'=>'1','this_tag'=>'include'],null,$this),$this)?>

      </section>
    </div>
    <div class="col-lg-4">
      <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Side Bar','this_tag'=>'include'],null,$this),$this)?>

    </div>
  </div>
<?php endif;$c_d4cec0=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_d4cec0'];$_ba5c34_local_vars=$_ba5c34_old_vars['_d4cec0'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>