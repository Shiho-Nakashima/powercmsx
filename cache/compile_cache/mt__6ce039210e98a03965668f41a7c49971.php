<?php ob_start();?><?php $_84610b_vars=&$this->vars;$_84610b_old_params=&$this->old_params;$_84610b_local_params=&$this->local_params;$_84610b_old_vars=&$this->old_vars;$_84610b_local_vars=&$this->local_vars;?><?php $_84610b_old_params['_1a55e9']=$_84610b_local_params;$_84610b_old_vars['_1a55e9']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.revision_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_var($this->setup_args(['name'=>'_status_text','this_tag'=>'var'],null,$this),$this)?>

<?php else:?>

<?php $_84610b_old_params['_cbfdce']=$_84610b_local_params;$_84610b_old_vars['_cbfdce']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_84610b_old_params['_10b581']=$_84610b_local_params;$_84610b_old_vars['_10b581']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'class_name','value'=>'unpublished','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'filter_name','value'=>'filter_unpublished','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'status','eq'=>'4','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'class_name','value'=>'published','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'filter_name','value'=>'filter_published','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'status','eq'=>'3','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'class_name','value'=>'reserved','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'filter_name','value'=>'filter_reserved','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'status','eq'=>'2','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'class_name','value'=>'approval','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'filter_name','value'=>'filter_approval','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'status','eq'=>'1','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'class_name','value'=>'review','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'filter_name','value'=>'filter_review','this_tag'=>'setvar'],null,$this),$this)?>

<?php else:?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'class_name','value'=>'draft','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'filter_name','value'=>'filter_draft','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_10b581'];$_84610b_local_vars=$_84610b_old_vars['_10b581'];?>

<?php else:?>

<?php $_84610b_old_params['_0d8635']=$_84610b_local_params;$_84610b_old_vars['_0d8635']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'class_name','value'=>'draft','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'filter_name','value'=>'filter_review','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'status','eq'=>'2','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'class_name','value'=>'published','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'filter_name','value'=>'filter_approval','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_0d8635'];$_84610b_local_vars=$_84610b_old_vars['_0d8635'];?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_cbfdce'];$_84610b_local_vars=$_84610b_old_vars['_cbfdce'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_84610b_old_params['_bd5532']=$_84610b_local_params;$_84610b_old_vars['_bd5532']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'&amp;dialog_view=1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_bd5532'];$_84610b_local_vars=$_84610b_old_vars['_bd5532'];?>

<?php $_84610b_old_params['_782bd2']=$_84610b_local_params;$_84610b_old_vars['_782bd2']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'&amp;select_add=1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_782bd2'];$_84610b_local_vars=$_84610b_old_vars['_782bd2'];?>

<?php $_84610b_old_params['_920311']=$_84610b_local_params;$_84610b_old_vars['_920311']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'&amp;single_select=1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_920311'];$_84610b_local_vars=$_84610b_old_vars['_920311'];?>

<?php $_84610b_old_params['_e47cd9']=$_84610b_local_params;$_84610b_old_vars['_e47cd9']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $c_fa930f=null;$_84610b_old_params['_fa930f']=$_84610b_local_params;$_84610b_old_vars['_fa930f']=$_84610b_local_vars;$a_fa930f=$this->setup_args(['name'=>'add_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_fa930f=ob_get_clean();$c_fa930f=$this->block_setvarblock($a_fa930f,$c_fa930f,$this,$r_fa930f,1,'_fa930f');echo($c_fa930f); $_84610b_local_params=$_84610b_old_params['_fa930f'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'$add_param','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_e47cd9'];$_84610b_local_vars=$_84610b_old_vars['_e47cd9'];?>

<?php $_84610b_old_params['_c41a57']=$_84610b_local_params;$_84610b_old_vars['_c41a57']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.from_obj','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $c_a572b9=null;$_84610b_old_params['_a572b9']=$_84610b_local_params;$_84610b_old_vars['_a572b9']=$_84610b_local_vars;$a_a572b9=$this->setup_args(['name'=>'add_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;from_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_a572b9=ob_get_clean();$c_a572b9=$this->block_setvarblock($a_a572b9,$c_a572b9,$this,$r_a572b9,1,'_a572b9');echo($c_a572b9); $_84610b_local_params=$_84610b_old_params['_a572b9'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'$add_param','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_c41a57'];$_84610b_local_vars=$_84610b_old_vars['_c41a57'];?>

<?php $_84610b_old_params['_1618bb']=$_84610b_local_params;$_84610b_old_vars['_1618bb']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.get_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $c_961fcd=null;$_84610b_old_params['_961fcd']=$_84610b_local_params;$_84610b_old_vars['_961fcd']=$_84610b_local_vars;$a_961fcd=$this->setup_args(['name'=>'add_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_961fcd=ob_get_clean();$c_961fcd=$this->block_setvarblock($a_961fcd,$c_961fcd,$this,$r_961fcd,1,'_961fcd');echo($c_961fcd); $_84610b_local_params=$_84610b_old_params['_961fcd'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'$add_param','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_1618bb'];$_84610b_local_vars=$_84610b_old_vars['_1618bb'];?>

<?php $_84610b_old_params['_27cf37']=$_84610b_local_params;$_84610b_old_vars['_27cf37']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $c_64c8be=null;$_84610b_old_params['_64c8be']=$_84610b_local_params;$_84610b_old_vars['_64c8be']=$_84610b_local_vars;$a_64c8be=$this->setup_args(['name'=>'add_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;ref_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_64c8be=ob_get_clean();$c_64c8be=$this->block_setvarblock($a_64c8be,$c_64c8be,$this,$r_64c8be,1,'_64c8be');echo($c_64c8be); $_84610b_local_params=$_84610b_old_params['_64c8be'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'$add_param','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_27cf37'];$_84610b_local_vars=$_84610b_old_vars['_27cf37'];?>

<?php $_84610b_old_params['_5db6fb']=$_84610b_local_params;$_84610b_old_vars['_5db6fb']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $c_d0beaf=null;$_84610b_old_params['_d0beaf']=$_84610b_local_params;$_84610b_old_vars['_d0beaf']=$_84610b_local_vars;$a_d0beaf=$this->setup_args(['name'=>'add_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;insert_editor=1<?php $c_d0beaf=ob_get_clean();$c_d0beaf=$this->block_setvarblock($a_d0beaf,$c_d0beaf,$this,$r_d0beaf,1,'_d0beaf');echo($c_d0beaf); $_84610b_local_params=$_84610b_old_params['_d0beaf'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'$add_param','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_5db6fb'];$_84610b_local_vars=$_84610b_old_vars['_5db6fb'];?>


<?php $_84610b_old_params['_c3623a']=$_84610b_local_params;$_84610b_old_vars['_c3623a']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $c_96e5b8=null;$_84610b_old_params['_96e5b8']=$_84610b_local_params;$_84610b_old_vars['_96e5b8']=$_84610b_local_vars;$a_96e5b8=$this->setup_args(['name'=>'add_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;ref_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_96e5b8=ob_get_clean();$c_96e5b8=$this->block_setvarblock($a_96e5b8,$c_96e5b8,$this,$r_96e5b8,1,'_96e5b8');echo($c_96e5b8); $_84610b_local_params=$_84610b_old_params['_96e5b8'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'$add_param','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_c3623a'];$_84610b_local_vars=$_84610b_old_vars['_c3623a'];?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request._from_scope','setvar'=>'_from_scope','this_tag'=>'var'],null,$this),$this),$this->setup_args('_from_scope','setvar',$this),$this,'setvar')?>

<?php $_84610b_old_params['_98d89d']=$_84610b_local_params;$_84610b_old_vars['_98d89d']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $c_b83543=null;$_84610b_old_params['_b83543']=$_84610b_local_params;$_84610b_old_vars['_b83543']=$_84610b_local_vars;$a_b83543=$this->setup_args(['name'=>'add_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;_from_scope=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_b83543=ob_get_clean();$c_b83543=$this->block_setvarblock($a_b83543,$c_b83543,$this,$r_b83543,1,'_b83543');echo($c_b83543); $_84610b_local_params=$_84610b_old_params['_b83543'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'add_params','append'=>'1','value'=>'$add_param','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_98d89d'];$_84610b_local_vars=$_84610b_old_vars['_98d89d'];?>

<a class="col-status-<?php echo $this->function_var($this->setup_args(['name'=>'class_name','this_tag'=>'var'],null,$this),$this)?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_type=list&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;select_system_filters=<?php echo $this->function_var($this->setup_args(['name'=>'filter_name','this_tag'=>'var'],null,$this),$this)?>
<?php $_84610b_old_params['_4e164e']=$_84610b_local_params;$_84610b_old_vars['_4e164e']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_84610b_local_params=$_84610b_old_params['_4e164e'];$_84610b_local_vars=$_84610b_old_vars['_4e164e'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'add_params','this_tag'=>'var'],null,$this),$this)?>
">
<?php echo $this->function_var($this->setup_args(['name'=>'_status_text','this_tag'=>'var'],null,$this),$this)?>

</a>
<?php endif;$_84610b_local_params=$_84610b_old_params['_1a55e9'];$_84610b_local_vars=$_84610b_old_vars['_1a55e9'];?>

<?php $_84610b_old_params['_0098ae']=$_84610b_local_params;$_84610b_old_vars['_0098ae']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_84610b_old_params['_969617']=$_84610b_local_params;$_84610b_old_vars['_969617']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_78958b=null;$_84610b_old_params['_78958b']=$_84610b_local_params;$_84610b_old_vars['_78958b']=$_84610b_local_vars;$a_78958b=$this->setup_args(['workspace_ids'=>'all','ignore_filter'=>'1','model'=>'$this_model','cols'=>'id,published_on','rev_type'=>'2','status'=>'3','rev_object_id'=>'$id','limit'=>'1','sort_by'=>'published_on','sort_order'=>'ascend','this_tag'=>'objectloop'],null,$this);$_78958b=-1;$r_78958b=true;while($r_78958b===true):$r_78958b=($_78958b!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_78958b,$c_78958b,$this,$r_78958b,++$_78958b,'_78958b');ob_start();?>
<?php $c_78958b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_78958b=false;}if($c_78958b ):?>

<a title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Reserved(Replace)','this_tag'=>'trans'],null,$this),$this)?>
" data-toggle="tooltip" data-placement="top"
  style="margin-top:-3px;font-size:0.95rem;"
  href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_84610b_old_params['_220847']=$_84610b_local_params;$_84610b_old_vars['_220847']=$_84610b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_84610b_local_params=$_84610b_old_params['_220847'];$_84610b_local_vars=$_84610b_old_vars['_220847'];?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;edit_revision=1"
  class="col-status-reserved ml-1 pl-0 pr-0 pt-0 pb-0">
  <i class="fa fa-code-fork"></i> <?php echo $this->component('PTTags')->hdlr_statustext($this->setup_args(['status'=>'3','model'=>'$this_model','no_title'=>'1','icon_only'=>'1','icon'=>'1','revision'=>'1','this_tag'=>'statustext'],null,$this),$this)?>

  '<?php echo $this->modifier_format_ts($this->function_var($this->setup_args(['name'=>'published_on','format_ts'=>'y-m-d H:i','this_tag'=>'var'],null,$this),$this),$this->setup_args('y-m-d H:i','format_ts',$this),$this,'format_ts')?>

</a>
<?php endif;$c_78958b=ob_get_clean();endwhile; $_84610b_local_params=$_84610b_old_params['_78958b'];$_84610b_local_vars=$_84610b_old_vars['_78958b'];?>

  <?php endif;$_84610b_local_params=$_84610b_old_params['_969617'];$_84610b_local_vars=$_84610b_old_vars['_969617'];?>

<?php endif;$_84610b_local_params=$_84610b_old_params['_0098ae'];$_84610b_local_vars=$_84610b_old_vars['_0098ae'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\list.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list\\column_status.tmpl' => 1694708530,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744002895,
);?>