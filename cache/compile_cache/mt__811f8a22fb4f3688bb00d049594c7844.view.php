<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_401780=null;$_ba5c34_old_params['_401780']=$_ba5c34_local_params;$_ba5c34_old_vars['_401780']=$_ba5c34_local_vars;$a_401780=$this->setup_args(['module'=>'(Media) Site Layout','this_tag'=>'includeblock'],null,$this);$_401780=-1;$r_401780=true;while($r_401780===true):$r_401780=($_401780!==-1)?false:true;echo $this->component('PTTags')->hdlr_includeblock($a_401780,$c_401780,$this,$r_401780,++$_401780,'_401780');ob_start();?>
<?php $c_401780 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_401780=false;}if($c_401780 ):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Site Config','this_tag'=>'include'],null,$this),$this)?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','setvar'=>'archive_title','this_tag'=>'formname'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('archive_title','setvar',$this),$this,'setvar')?>


  <div class="row">
    <div class="col-lg-12">
      <section class="new-section">
        <h1 class="section-heading"><?php echo $this->function_var($this->setup_args(['name'=>'archive_title','this_tag'=>'var'],null,$this),$this)?>
</h1>
        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'form_identifier','this_tag'=>'formbasename'],null,$this),$this),$this->setup_args('form_identifier','setvar',$this),$this,'setvar')?>

        <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Contact Form','form_identifier'=>'$form_identifier','this_tag'=>'include'],null,$this),$this)?>

      </section>
    </div>
  </div>
<?php endif;$c_401780=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_401780'];$_ba5c34_local_vars=$_ba5c34_old_vars['_401780'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>