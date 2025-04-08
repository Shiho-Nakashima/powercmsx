<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_378382=null;$_ba5c34_old_params['_378382']=$_ba5c34_local_params;$_ba5c34_old_vars['_378382']=$_ba5c34_local_vars;$a_378382=$this->setup_args(['module'=>'(Media) Site Layout','this_tag'=>'includeblock'],null,$this);$_378382=-1;$r_378382=true;while($r_378382===true):$r_378382=($_378382!==-1)?false:true;echo $this->component('PTTags')->hdlr_includeblock($a_378382,$c_378382,$this,$r_378382,++$_378382,'_378382');ob_start();?>
<?php $c_378382 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_378382=false;}if($c_378382 ):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Site Config','this_tag'=>'include'],null,$this),$this)?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','setvar'=>'archive_title','this_tag'=>'pagetitle'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('archive_title','setvar',$this),$this,'setvar')?>

  <?php $_ba5c34_old_params['_7e6233']=$_ba5c34_local_params;$_ba5c34_old_vars['_7e6233']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'pageexcerpt','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'page_description','this_tag'=>'pageexcerpt'],null,$this),$this),$this->setup_args('page_description','setvar',$this),$this,'setvar')?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_7e6233'];$_ba5c34_local_vars=$_ba5c34_old_vars['_7e6233'];?>

  <?php $_ba5c34_old_params['_a27bbc']=$_ba5c34_local_params;$_ba5c34_old_vars['_a27bbc']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'pagekeywords','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'page_keywords','this_tag'=>'pagekeywords'],null,$this),$this),$this->setup_args('page_keywords','setvar',$this),$this,'setvar')?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_a27bbc'];$_ba5c34_local_vars=$_ba5c34_old_vars['_a27bbc'];?>

  <?php $c_82493a=null;$_ba5c34_old_params['_82493a']=$_ba5c34_local_params;$_ba5c34_old_vars['_82493a']=$_ba5c34_local_vars;$a_82493a=$this->setup_args(['class'=>'image','limit'=>'1','this_tag'=>'pageassets'],null,$this);$_82493a=-1;$r_82493a=true;while($r_82493a===true):$r_82493a=($_82493a!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_82493a,$c_82493a,$this,$r_82493a,++$_82493a,'_82493a');ob_start();?>
<?php $c_82493a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_82493a=false;}if($c_82493a ):?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objecturl($this->setup_args(['setvar'=>'ogp_image','this_tag'=>'assetfileurl'],null,$this),$this),$this->setup_args('ogp_image','setvar',$this),$this,'setvar')?>

  <?php endif;$c_82493a=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_82493a'];$_ba5c34_local_vars=$_ba5c34_old_vars['_82493a'];?>


  <main class="content-section">
    <div class="section-head">
      <h1 class="section-title align-center mb-4 display-5"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'archive_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</h1>
      <p class="section-info align-right mb-4">
        <?php echo $this->modifier_format_ts($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['format_ts'=>'$datetime_format','this_tag'=>'pagedate'],null,$this),$this),$this->setup_args('$datetime_format','format_ts',$this),$this,'format_ts')?>

      </p>
    </div>
    <div class="text content-block">
      <?php echo $this->component('PTTags')->filter_convert_breaks($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['convert_breaks'=>'auto','this_tag'=>'pagebody'],null,$this),$this),$this->setup_args('auto','convert_breaks',$this),$this,'convert_breaks')?>

    </div>
<?php $_ba5c34_old_params['_4f6815']=$_ba5c34_local_params;$_ba5c34_old_vars['_4f6815']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'pagemore','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div class="text content-block">
      <?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'pagemore'],null,$this),$this)?>

    </div>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_4f6815'];$_ba5c34_local_vars=$_ba5c34_old_vars['_4f6815'];?>

  </main>
<?php endif;$c_378382=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_378382'];$_ba5c34_local_vars=$_ba5c34_old_vars['_378382'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>