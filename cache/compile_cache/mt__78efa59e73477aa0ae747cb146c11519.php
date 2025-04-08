<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php echo $this->function_setvar($this->setup_args(['name'=>'page_category_id','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_ba5c34_old_params['_14eca9']=$_ba5c34_local_params;$_ba5c34_old_vars['_14eca9']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_archive_model','eq'=>'category','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'current_object_id','setvar'=>'page_category_id','this_tag'=>'var'],null,$this),$this),$this->setup_args('page_category_id','setvar',$this),$this,'setvar')?>

  <?php $c_a25a9f=null;$_ba5c34_old_params['_a25a9f']=$_ba5c34_local_params;$_ba5c34_old_vars['_a25a9f']=$_ba5c34_local_vars;$a_a25a9f=$this->setup_args(['name'=>'_cache_key','this_tag'=>'setvarblock'],null,$this);ob_start();?>
__widget_category_archives_<?php echo $this->function_var($this->setup_args(['name'=>'page_category_id','this_tag'=>'var'],null,$this),$this)?>
__<?php $c_a25a9f=ob_get_clean();$c_a25a9f=$this->block_setvarblock($a_a25a9f,$c_a25a9f,$this,$r_a25a9f,1,'_a25a9f');echo($c_a25a9f); $_ba5c34_local_params=$_ba5c34_old_params['_a25a9f'];?>

<?php else:?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'page_category_id','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $c_c81a2b=null;$_ba5c34_old_params['_c81a2b']=$_ba5c34_local_params;$_ba5c34_old_vars['_c81a2b']=$_ba5c34_local_vars;$a_c81a2b=$this->setup_args(['name'=>'_cache_key','this_tag'=>'setvarblock'],null,$this);ob_start();?>
__widget_category_archives__<?php $c_c81a2b=ob_get_clean();$c_c81a2b=$this->block_setvarblock($a_c81a2b,$c_c81a2b,$this,$r_c81a2b,1,'_c81a2b');echo($c_c81a2b); $_ba5c34_local_params=$_ba5c34_old_params['_c81a2b'];?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_14eca9'];$_ba5c34_local_vars=$_ba5c34_old_vars['_14eca9'];?>

<?php $c_fcb75f=null;$_ba5c34_old_params['_fcb75f']=$_ba5c34_local_params;$_ba5c34_old_vars['_fcb75f']=$_ba5c34_local_vars;$a_fcb75f=$this->setup_args(['cache_key'=>'$_cache_key','workspace_id'=>'$website_id','this_tag'=>'cacheblock'],null,$this);$_fcb75f=-1;$r_fcb75f=true;while($r_fcb75f===true):$r_fcb75f=($_fcb75f!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_fcb75f,$c_fcb75f,$this,$r_fcb75f,++$_fcb75f,'_fcb75f');ob_start();?>
<?php $c_fcb75f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fcb75f=false;}if($c_fcb75f ):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'category_exists','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $c_a4179c=null;$_ba5c34_old_params['_a4179c']=$_ba5c34_local_params;$_ba5c34_old_vars['_a4179c']=$_ba5c34_local_vars;$a_a4179c=$this->setup_args(['name'=>'list_of_categories','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <?php $c_27880f=null;$_ba5c34_old_params['_27880f']=$_ba5c34_local_params;$_ba5c34_old_vars['_27880f']=$_ba5c34_local_vars;$a_27880f=$this->setup_args(['ignore_archive_context'=>'date_based','ignore_filter'=>'1','cols'=>'id,label','this_tag'=>'categories'],null,$this);$_27880f=-1;$r_27880f=true;while($r_27880f===true):$r_27880f=($_27880f!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_27880f,$c_27880f,$this,$r_27880f,++$_27880f,'_27880f');ob_start();?>
<?php $c_27880f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_27880f=false;}if($c_27880f ):?>

      <?php $_ba5c34_old_params['_68ecb4']=$_ba5c34_local_params;$_ba5c34_old_vars['_68ecb4']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<section class="category-section">
  <h2 class="section-heading mb-4"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'Categories','escape'=>'single','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</h2>
  <ul class="list-group">
      <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_68ecb4'];$_ba5c34_local_vars=$_ba5c34_old_vars['_68ecb4'];?>

      <?php $_ba5c34_old_params['_7d622e']=$_ba5c34_local_params;$_ba5c34_old_vars['_7d622e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'entriescount','ignore_archive_context'=>'date_based','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'category_exists','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <li class="list-group-item<?php $_ba5c34_old_params['_b7ef1e']=$_ba5c34_local_params;$_ba5c34_old_vars['_b7ef1e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$page_category_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 list-active<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b7ef1e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b7ef1e'];?>
">
        <a href="<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'categorypermalink'],null,$this),$this)?>
" class="text-primary<?php $_ba5c34_old_params['_cd1945']=$_ba5c34_local_params;$_ba5c34_old_vars['_cd1945']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$page_category_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 active<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_cd1945'];$_ba5c34_local_vars=$_ba5c34_old_vars['_cd1945'];?>
"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','escape'=>'single','this_tag'=>'categorylabel'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
      </li>
      <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_7d622e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_7d622e'];?>

      <?php $_ba5c34_old_params['_639c1c']=$_ba5c34_local_params;$_ba5c34_old_vars['_639c1c']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </ul>
</section>
      <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_639c1c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_639c1c'];?>

    <?php endif;$c_27880f=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_27880f'];$_ba5c34_local_vars=$_ba5c34_old_vars['_27880f'];?>

  <?php $c_a4179c=ob_get_clean();$c_a4179c=$this->block_setvarblock($a_a4179c,$c_a4179c,$this,$r_a4179c,1,'_a4179c');echo($c_a4179c); $_ba5c34_local_params=$_ba5c34_old_params['_a4179c'];?>

  <?php $_ba5c34_old_params['_81542d']=$_ba5c34_local_params;$_ba5c34_old_vars['_81542d']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'category_exists','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'list_of_categories','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_81542d'];$_ba5c34_local_vars=$_ba5c34_old_vars['_81542d'];?>

<?php endif;$c_fcb75f=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_fcb75f'];$_ba5c34_local_vars=$_ba5c34_old_vars['_fcb75f'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>