<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $_ba5c34_old_params['_e21e9e']=$_ba5c34_local_params;$_ba5c34_old_vars['_e21e9e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_count','op'=>'%','value'=>'$pagination_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'is_divisible','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php else:?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'is_divisible','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_e21e9e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_e21e9e'];?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'object_count','setvar'=>'count_for_pager','this_tag'=>'var'],null,$this),$this),$this->setup_args('count_for_pager','setvar',$this),$this,'setvar')?>

<?php $_ba5c34_old_params['_c3f97e']=$_ba5c34_local_params;$_ba5c34_old_vars['_c3f97e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_divisible','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_decrement($this->function_var($this->setup_args(['name'=>'object_count','decrement'=>'','setvar'=>'count_for_pager','this_tag'=>'var'],null,$this),$this),$this->setup_args('','decrement',$this),$this,'decrement'),$this->setup_args('count_for_pager','setvar',$this),$this,'setvar')?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_c3f97e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_c3f97e'];?>

<?php $_ba5c34_old_params['_22d51b']=$_ba5c34_local_params;$_ba5c34_old_vars['_22d51b']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_count','gt'=>'$pagination_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_ba5c34_old_params['_138f9e']=$_ba5c34_local_params;$_ba5c34_old_vars['_138f9e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'filter_add_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $c_463567=null;$_ba5c34_old_params['_463567']=$_ba5c34_local_params;$_ba5c34_old_vars['_463567']=$_ba5c34_local_vars;$a_463567=$this->setup_args(['name'=>'pagination_base_url','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->function_var($this->setup_args(['name'=>'current_archive_url','this_tag'=>'var'],null,$this),$this)?>
?<?php echo $this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'filter_add_params','regex_replace'=>'\'/^&/\',\'\',\'1\'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^&/\\\',\\\'\\\',\\\'1\\\'','regex_replace',$this),$this,'regex_replace')?>
<?php $c_463567=ob_get_clean();$c_463567=$this->block_setvarblock($a_463567,$c_463567,$this,$r_463567,1,'_463567');echo($c_463567); $_ba5c34_local_params=$_ba5c34_old_params['_463567'];?>

  <?php else:?>

    <?php $c_5ff742=null;$_ba5c34_old_params['_5ff742']=$_ba5c34_local_params;$_ba5c34_old_vars['_5ff742']=$_ba5c34_local_vars;$a_5ff742=$this->setup_args(['name'=>'pagination_base_url','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->function_var($this->setup_args(['name'=>'current_archive_url','this_tag'=>'var'],null,$this),$this)?>
?_filter=<?php echo $this->function_var($this->setup_args(['name'=>'filter_model','this_tag'=>'var'],null,$this),$this)?>
<?php $c_5ff742=ob_get_clean();$c_5ff742=$this->block_setvarblock($a_5ff742,$c_5ff742,$this,$r_5ff742,1,'_5ff742');echo($c_5ff742); $_ba5c34_local_params=$_ba5c34_old_params['_5ff742'];?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_138f9e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_138f9e'];?>

<div class="row justify-content-center next-prev">
  <div class="next-prev-btns align-center">
  <?php $_ba5c34_old_params['_d286eb']=$_ba5c34_local_params;$_ba5c34_old_vars['_d286eb']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_page','ge'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <a class="btn btn-secondary btn-sm display-4" href="<?php echo $this->function_var($this->setup_args(['name'=>'pagination_base_url','this_tag'=>'var'],null,$this),$this)?>
&amp;limit=<?php echo $this->function_var($this->setup_args(['name'=>'pagination_limit','this_tag'=>'var'],null,$this),$this)?>
<?php $_ba5c34_old_params['_344da1']=$_ba5c34_local_params;$_ba5c34_old_vars['_344da1']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'prev_offset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;offset=<?php echo $this->function_var($this->setup_args(['name'=>'prev_offset','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_344da1'];$_ba5c34_local_vars=$_ba5c34_old_vars['_344da1'];?>
"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'Previous','escape'=>'single','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
  <?php else:?>

    <span class="btn btn-white btn-sm display-4 disabled"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'Previous','escape'=>'single','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</span>
  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_d286eb'];$_ba5c34_local_vars=$_ba5c34_old_vars['_d286eb'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'has_next','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $_ba5c34_old_params['_cb47fc']=$_ba5c34_local_params;$_ba5c34_old_vars['_cb47fc']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_page','eq'=>'$offset_last','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_ba5c34_old_params['_eaa913']=$_ba5c34_local_params;$_ba5c34_old_vars['_eaa913']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'is_divisible','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_next','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_eaa913'];$_ba5c34_local_vars=$_ba5c34_old_vars['_eaa913'];?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'current_page','le'=>'$offset_last','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_next','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'current_page','eq'=>'1','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_next','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_cb47fc'];$_ba5c34_local_vars=$_ba5c34_old_vars['_cb47fc'];?>

  <?php $_ba5c34_old_params['_50de4d']=$_ba5c34_local_params;$_ba5c34_old_vars['_50de4d']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_next','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <a class="btn btn-secondary btn-sm display-4" href="<?php echo $this->function_var($this->setup_args(['name'=>'pagination_base_url','this_tag'=>'var'],null,$this),$this)?>
&amp;limit=<?php echo $this->function_var($this->setup_args(['name'=>'pagination_limit','this_tag'=>'var'],null,$this),$this)?>
&amp;offset=<?php $_ba5c34_old_params['_5270d3']=$_ba5c34_local_params;$_ba5c34_old_vars['_5270d3']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'next_offset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'next_offset','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'pagination_limit','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_5270d3'];$_ba5c34_local_vars=$_ba5c34_old_vars['_5270d3'];?>
"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'Next','escape'=>'single','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
  <?php else:?>

  <span class="btn btn-white btn-sm display-4 disabled"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'Next','escape'=>'single','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</span>
  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_50de4d'];$_ba5c34_local_vars=$_ba5c34_old_vars['_50de4d'];?>

  </div>
</div>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_22d51b'];$_ba5c34_local_vars=$_ba5c34_old_vars['_22d51b'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>