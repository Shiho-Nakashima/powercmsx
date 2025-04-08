<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_a0f77e=null;ob_start();$_ba5c34_old_params['_a0f77e']=$_ba5c34_local_params;$_ba5c34_old_vars['_a0f77e']=$_ba5c34_local_vars;$a_a0f77e=$this->setup_args(['trim_space'=>'3','this_tag'=>'block'],null,$this);$_a0f77e=-1;$r_a0f77e=true;while($r_a0f77e===true):$r_a0f77e=($_a0f77e!==-1)?false:true;echo $this->block_block($a_a0f77e,$c_a0f77e,$this,$r_a0f77e,++$_a0f77e,'_a0f77e');ob_start();?>
<?php $c_a0f77e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a0f77e=false;}if($c_a0f77e ):?>

  <?php $_ba5c34_old_params['_2c866c']=$_ba5c34_local_params;$_ba5c34_old_vars['_2c866c']=$_ba5c34_local_vars;if($this->conditional_isset($this->setup_args(['name'=>'_ogp_images','this_tag'=>'isset'],null,$this),null,$this,true,true)):?>

  <?php else:?>

    <?php $c_c2ce85=null;$_ba5c34_old_params['_c2ce85']=$_ba5c34_local_params;$_ba5c34_old_vars['_c2ce85']=$_ba5c34_local_vars;$a_c2ce85=$this->setup_args(['name'=>'_ogp_images','key'=>'default','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/images/ogp-default.png<?php $c_c2ce85=ob_get_clean();$c_c2ce85=$this->block_setvarblock($a_c2ce85,$c_c2ce85,$this,$r_c2ce85,1,'_c2ce85');echo($c_c2ce85); $_ba5c34_local_params=$_ba5c34_old_params['_c2ce85'];?>

    <?php $c_f579b8=null;$_ba5c34_old_params['_f579b8']=$_ba5c34_local_params;$_ba5c34_old_vars['_f579b8']=$_ba5c34_local_vars;$a_f579b8=$this->setup_args(['class'=>'image','tag'=>'@ogp_image','this_tag'=>'assets'],null,$this);$_f579b8=-1;$r_f579b8=true;while($r_f579b8===true):$r_f579b8=($_f579b8!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_f579b8,$c_f579b8,$this,$r_f579b8,++$_f579b8,'_f579b8');ob_start();?>
<?php $c_f579b8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f579b8=false;}if($c_f579b8 ):?>

      <?php $c_277f7c=null;$_ba5c34_old_params['_277f7c']=$_ba5c34_local_params;$_ba5c34_old_vars['_277f7c']=$_ba5c34_local_vars;$a_277f7c=$this->setup_args(['this_tag'=>'assettags'],null,$this);$_277f7c=-1;$r_277f7c=true;while($r_277f7c===true):$r_277f7c=($_277f7c!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_277f7c,$c_277f7c,$this,$r_277f7c,++$_277f7c,'_277f7c');ob_start();?>
<?php $c_277f7c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_277f7c=false;}if($c_277f7c ):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'_tag_name_original','this_tag'=>'tagname'],null,$this),$this),$this->setup_args('_tag_name_original','setvar',$this),$this,'setvar')?>

        <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_tag_name_original','regex_replace'=>'\'/^@ogp_image_/ui\',\'\'','setvar'=>'_tag_name','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^@ogp_image_/ui\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_tag_name','setvar',$this),$this,'setvar')?>

        <?php $_ba5c34_old_params['_b6c97f']=$_ba5c34_local_params;$_ba5c34_old_vars['_b6c97f']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_tag_name','ne'=>'$_tag_name_original','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objecturl($this->setup_args(['setvar'=>'_ogp_image_url','this_tag'=>'assetfileurl'],null,$this),$this),$this->setup_args('_ogp_image_url','setvar',$this),$this,'setvar')?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'_ogp_images','key'=>'$_tag_name','value'=>'$_ogp_image_url','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_unset($this->setup_args(['name'=>'_ogp_image_url','this_tag'=>'unset'],null,$this),$this)?>

        <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b6c97f'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b6c97f'];?>

        <?php echo $this->function_unset($this->setup_args(['name'=>'_tag_name_original','this_tag'=>'unset'],null,$this),$this)?>

        <?php echo $this->function_unset($this->setup_args(['name'=>'_tag_name','this_tag'=>'unset'],null,$this),$this)?>

      <?php endif;$c_277f7c=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_277f7c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_277f7c'];?>

    <?php endif;$c_f579b8=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_f579b8'];$_ba5c34_local_vars=$_ba5c34_old_vars['_f579b8'];?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_2c866c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_2c866c'];?>

  <?php $_ba5c34_old_params['_f2cf67']=$_ba5c34_local_params;$_ba5c34_old_vars['_f2cf67']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'ogp_image_key','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'ogp_image_key','lower_case'=>'','setvar'=>'ogp_image_key','this_tag'=>'var'],null,$this),$this)),$this->setup_args('ogp_image_key','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'_ogp_images','key'=>'$ogp_image_key','setvar'=>'_','this_tag'=>'var'],null,$this),$this),$this->setup_args('_','setvar',$this),$this,'setvar')?>

    <?php $_ba5c34_old_params['_556d0f']=$_ba5c34_local_params;$_ba5c34_old_vars['_556d0f']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'_','this_tag'=>'var'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_var($this->setup_args(['name'=>'_ogp_images','key'=>'default','this_tag'=>'var'],null,$this),$this)?>

    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_556d0f'];$_ba5c34_local_vars=$_ba5c34_old_vars['_556d0f'];?>

    <?php echo $this->function_unset($this->setup_args(['name'=>'_','this_tag'=>'unset'],null,$this),$this)?>

    <?php echo $this->function_unset($this->setup_args(['name'=>'ogp_image_key','this_tag'=>'unset'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_var($this->setup_args(['name'=>'_ogp_images','key'=>'default','this_tag'=>'var'],null,$this),$this)?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_f2cf67'];$_ba5c34_local_vars=$_ba5c34_old_vars['_f2cf67'];?>

<?php endif;$c_a0f77e=ob_get_clean();endwhile;$c_a0f77e=ob_get_clean();echo($this->modifier_trim_space($c_a0f77e,$this->setup_args('3','trim_space',$this),$this,'trim_space')); $_ba5c34_local_params=$_ba5c34_old_params['_a0f77e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_a0f77e'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>