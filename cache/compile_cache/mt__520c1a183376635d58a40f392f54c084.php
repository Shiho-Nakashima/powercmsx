<?php ob_start();?><?php $_93a9cf_vars=&$this->vars;$_93a9cf_old_params=&$this->old_params;$_93a9cf_local_params=&$this->local_params;$_93a9cf_old_vars=&$this->old_vars;$_93a9cf_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'model','setvar'=>'this_model','this_tag'=>'var'],null,$this),$this),$this->setup_args('this_model','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'model','setvar'=>'_this_model','this_tag'=>'var'],null,$this),$this),$this->setup_args('_this_model','setvar',$this),$this,'setvar')?>

<?php echo $this->function_var($this->setup_args(['name'=>'sort_cond','value'=>'','this_tag'=>'var'],null,$this),$this)?>

<?php $_93a9cf_old_params['_40c61e']=$_93a9cf_local_params;$_93a9cf_old_vars['_40c61e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.sort','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_3247b3']=$_93a9cf_local_params;$_93a9cf_old_vars['_3247b3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.direction','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_576d0d=null;$_93a9cf_old_params['_576d0d']=$_93a9cf_local_params;$_93a9cf_old_vars['_576d0d']=$_93a9cf_local_vars;$a_576d0d=$this->setup_args(['name'=>'sort_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;sort=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.sort','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;direction=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.direction','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_576d0d=ob_get_clean();$c_576d0d=$this->block_setvarblock($a_576d0d,$c_576d0d,$this,$r_576d0d,1,'_576d0d');echo($c_576d0d); $_93a9cf_local_params=$_93a9cf_old_params['_576d0d'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3247b3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3247b3'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_40c61e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_40c61e'];?>

<?php $_93a9cf_old_params['_e515b1']=$_93a9cf_local_params;$_93a9cf_old_vars['_e515b1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.query','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_d46609=null;$_93a9cf_old_params['_d46609']=$_93a9cf_local_params;$_93a9cf_old_vars['_d46609']=$_93a9cf_local_vars;$a_d46609=$this->setup_args(['name'=>'query_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;query=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'query','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_d46609=ob_get_clean();$c_d46609=$this->block_setvarblock($a_d46609,$c_d46609,$this,$r_d46609,1,'_d46609');echo($c_d46609); $_93a9cf_local_params=$_93a9cf_old_params['_d46609'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e515b1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e515b1'];?>

<?php $_93a9cf_old_params['_9c9d6c']=$_93a9cf_local_params;$_93a9cf_old_vars['_9c9d6c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_8650ee=null;$_93a9cf_old_params['_8650ee']=$_93a9cf_local_params;$_93a9cf_old_vars['_8650ee']=$_93a9cf_local_vars;$a_8650ee=$this->setup_args(['name'=>'filter_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;workspace_select=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_select','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $_93a9cf_old_params['_97730f']=$_93a9cf_local_params;$_93a9cf_old_vars['_97730f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._fix_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;_fix_filter=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_97730f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_97730f'];?>

<?php $c_8650ee=ob_get_clean();$c_8650ee=$this->block_setvarblock($a_8650ee,$c_8650ee,$this,$r_8650ee,1,'_8650ee');echo($c_8650ee); $_93a9cf_local_params=$_93a9cf_old_params['_8650ee'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9c9d6c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9c9d6c'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'selector_cond','value'=>'','this_tag'=>'var'],null,$this),$this)?>

<?php $_93a9cf_old_params['_1f627b']=$_93a9cf_local_params;$_93a9cf_old_vars['_1f627b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $c_e29bec=null;$_93a9cf_old_params['_e29bec']=$_93a9cf_local_params;$_93a9cf_old_vars['_e29bec']=$_93a9cf_local_vars;$a_e29bec=$this->setup_args(['name'=>'selector_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_select=1<?php $c_e29bec=ob_get_clean();$c_e29bec=$this->block_setvarblock($a_e29bec,$c_e29bec,$this,$r_e29bec,1,'_e29bec');echo($c_e29bec); $_93a9cf_local_params=$_93a9cf_old_params['_e29bec'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1f627b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1f627b'];?>

<?php $_93a9cf_old_params['_d22b94']=$_93a9cf_local_params;$_93a9cf_old_vars['_d22b94']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_04523a=null;$_93a9cf_old_params['_04523a']=$_93a9cf_local_params;$_93a9cf_old_vars['_04523a']=$_93a9cf_local_vars;$a_04523a=$this->setup_args(['name'=>'insert_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

&amp;insert_editor=1
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $_93a9cf_old_params['_cb0ee8']=$_93a9cf_local_params;$_93a9cf_old_vars['_cb0ee8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;_from_scope=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cb0ee8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cb0ee8'];?>

<?php $c_04523a=ob_get_clean();$c_04523a=$this->block_setvarblock($a_04523a,$c_04523a,$this,$r_04523a,1,'_04523a');echo($c_04523a); $_93a9cf_local_params=$_93a9cf_old_params['_04523a'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d22b94'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d22b94'];?>

<?php $_93a9cf_old_params['_bd830d']=$_93a9cf_local_params;$_93a9cf_old_vars['_bd830d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_156368=null;$_93a9cf_old_params['_156368']=$_93a9cf_local_params;$_93a9cf_old_vars['_156368']=$_93a9cf_local_vars;$a_156368=$this->setup_args(['name'=>'selected_ids_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<?php $_93a9cf_old_params['_37c563']=$_93a9cf_local_params;$_93a9cf_old_vars['_37c563']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.from_obj','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;from_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_37c563'];$_93a9cf_local_vars=$_93a9cf_old_vars['_37c563'];?>

&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $_93a9cf_old_params['_afe5b0']=$_93a9cf_local_params;$_93a9cf_old_vars['_afe5b0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_afe5b0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_afe5b0'];?>

<?php $_93a9cf_old_params['_384041']=$_93a9cf_local_params;$_93a9cf_old_vars['_384041']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;ids_only=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_384041'];$_93a9cf_local_vars=$_93a9cf_old_vars['_384041'];?>

<?php $c_156368=ob_get_clean();$c_156368=$this->block_setvarblock($a_156368,$c_156368,$this,$r_156368,1,'_156368');echo($c_156368); $_93a9cf_local_params=$_93a9cf_old_params['_156368'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bd830d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bd830d'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'revision_cond','value'=>'','this_tag'=>'var'],null,$this),$this)?>

<?php $_93a9cf_old_params['_6f1b81']=$_93a9cf_local_params;$_93a9cf_old_vars['_6f1b81']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.revision_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_679644']=$_93a9cf_local_params;$_93a9cf_old_vars['_679644']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.rev_object_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_ad024a=null;$_93a9cf_old_params['_ad024a']=$_93a9cf_local_params;$_93a9cf_old_vars['_ad024a']=$_93a9cf_local_vars;$a_ad024a=$this->setup_args(['name'=>'revision_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

&amp;revision_select=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.revision_select','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;rev_object_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.rev_object_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $c_ad024a=ob_get_clean();$c_ad024a=$this->block_setvarblock($a_ad024a,$c_ad024a,$this,$r_ad024a,1,'_ad024a');echo($c_ad024a); $_93a9cf_local_params=$_93a9cf_old_params['_ad024a'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_679644'];$_93a9cf_local_vars=$_93a9cf_old_vars['_679644'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6f1b81'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6f1b81'];?>

<?php $c_52f7f2=null;$_93a9cf_old_params['_52f7f2']=$_93a9cf_local_params;$_93a9cf_old_vars['_52f7f2']=$_93a9cf_local_vars;$a_52f7f2=$this->setup_args(['name'=>'allow_revision_in_list_model','this_tag'=>'setvarblock'],null,$this);ob_start();?>
allow_revision_in_list_<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
<?php $c_52f7f2=ob_get_clean();$c_52f7f2=$this->block_setvarblock($a_52f7f2,$c_52f7f2,$this,$r_52f7f2,1,'_52f7f2');echo($c_52f7f2); $_93a9cf_local_params=$_93a9cf_old_params['_52f7f2'];?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'$allow_revision_in_list_model','setvar'=>'allow_revision_in_list','this_tag'=>'property'],null,$this),$this),$this->setup_args('allow_revision_in_list','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_155e53']=$_93a9cf_local_params;$_93a9cf_old_vars['_155e53']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'allow_revision_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'allow_revision_in_list','setvar'=>'allow_revision_in_list','this_tag'=>'property'],null,$this),$this),$this->setup_args('allow_revision_in_list','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_155e53'];$_93a9cf_local_vars=$_93a9cf_old_vars['_155e53'];?>

<?php $_93a9cf_old_params['_7d3816']=$_93a9cf_local_params;$_93a9cf_old_vars['_7d3816']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_5ba95b']=$_93a9cf_local_params;$_93a9cf_old_vars['_5ba95b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_duplicate','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'allow_revision_in_list','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5ba95b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5ba95b'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7d3816'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7d3816'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_single_select','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_get_col','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_94c2ab']=$_93a9cf_local_params;$_93a9cf_old_vars['_94c2ab']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_d7b8ce']=$_93a9cf_local_params;$_93a9cf_old_vars['_d7b8ce']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.get_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.get_col','setvar'=>'_get_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('_get_col','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d7b8ce'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d7b8ce'];?>

<?php $c_cd6f86=null;$_93a9cf_old_params['_cd6f86']=$_93a9cf_local_params;$_93a9cf_old_vars['_cd6f86']=$_93a9cf_local_vars;$a_cd6f86=$this->setup_args(['name'=>'dialog_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;dialog_view=1<?php $c_cd6f86=ob_get_clean();$c_cd6f86=$this->block_setvarblock($a_cd6f86,$c_cd6f86,$this,$r_cd6f86,1,'_cd6f86');echo($c_cd6f86); $_93a9cf_local_params=$_93a9cf_old_params['_cd6f86'];?>

<?php $_93a9cf_old_params['_c9140c']=$_93a9cf_local_params;$_93a9cf_old_vars['_c9140c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_899204=null;$_93a9cf_old_params['_899204']=$_93a9cf_local_params;$_93a9cf_old_vars['_899204']=$_93a9cf_local_vars;$a_899204=$this->setup_args(['name'=>'dialog_param','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'request.ref_model','this_tag'=>'var'],null,$this),$this)?>
<?php $c_899204=ob_get_clean();$c_899204=$this->block_setvarblock($a_899204,$c_899204,$this,$r_899204,1,'_899204');echo($c_899204); $_93a9cf_local_params=$_93a9cf_old_params['_899204'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c9140c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c9140c'];?>

<?php $_93a9cf_old_params['_8786d0']=$_93a9cf_local_params;$_93a9cf_old_vars['_8786d0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_single_select','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php $c_0fc57b=null;$_93a9cf_old_params['_0fc57b']=$_93a9cf_local_params;$_93a9cf_old_vars['_0fc57b']=$_93a9cf_local_vars;$a_0fc57b=$this->setup_args(['name'=>'dialog_param','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;single_select=1<?php $c_0fc57b=ob_get_clean();$c_0fc57b=$this->block_setvarblock($a_0fc57b,$c_0fc57b,$this,$r_0fc57b,1,'_0fc57b');echo($c_0fc57b); $_93a9cf_local_params=$_93a9cf_old_params['_0fc57b'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8786d0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8786d0'];?>

<?php $_93a9cf_old_params['_58d035']=$_93a9cf_local_params;$_93a9cf_old_vars['_58d035']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_cc65e6=null;$_93a9cf_old_params['_cc65e6']=$_93a9cf_local_params;$_93a9cf_old_vars['_cc65e6']=$_93a9cf_local_vars;$a_cc65e6=$this->setup_args(['name'=>'dialog_param','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workflow_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_cc65e6=ob_get_clean();$c_cc65e6=$this->block_setvarblock($a_cc65e6,$c_cc65e6,$this,$r_cc65e6,1,'_cc65e6');echo($c_cc65e6); $_93a9cf_local_params=$_93a9cf_old_params['_cc65e6'];?>

<?php $c_881994=null;$_93a9cf_old_params['_881994']=$_93a9cf_local_params;$_93a9cf_old_vars['_881994']=$_93a9cf_local_vars;$a_881994=$this->setup_args(['name'=>'dialog_param','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workflow_type=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_881994=ob_get_clean();$c_881994=$this->block_setvarblock($a_881994,$c_881994,$this,$r_881994,1,'_881994');echo($c_881994); $_93a9cf_local_params=$_93a9cf_old_params['_881994'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_58d035'];$_93a9cf_local_vars=$_93a9cf_old_vars['_58d035'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_94c2ab'];$_93a9cf_local_vars=$_93a9cf_old_vars['_94c2ab'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'selecter_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_aff2a5']=$_93a9cf_local_params;$_93a9cf_old_vars['_aff2a5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_3e675d=null;$_93a9cf_old_params['_3e675d']=$_93a9cf_local_params;$_93a9cf_old_vars['_3e675d']=$_93a9cf_local_vars;$a_3e675d=$this->setup_args(['name'=>'selecter_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;from_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_3e675d=ob_get_clean();$c_3e675d=$this->block_setvarblock($a_3e675d,$c_3e675d,$this,$r_3e675d,1,'_3e675d');echo($c_3e675d); $_93a9cf_local_params=$_93a9cf_old_params['_3e675d'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_aff2a5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_aff2a5'];?>

<?php $_93a9cf_old_params['_3724d3']=$_93a9cf_local_params;$_93a9cf_old_vars['_3724d3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.revision_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_198f30=null;$_93a9cf_old_params['_198f30']=$_93a9cf_local_params;$_93a9cf_old_vars['_198f30']=$_93a9cf_local_vars;$a_198f30=$this->setup_args(['name'=>'filter_cond','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;manage_revision=1<?php $c_198f30=ob_get_clean();$c_198f30=$this->block_setvarblock($a_198f30,$c_198f30,$this,$r_198f30,1,'_198f30');echo($c_198f30); $_93a9cf_local_params=$_93a9cf_old_params['_198f30'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3724d3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3724d3'];?>

<?php $_93a9cf_old_params['_2106e9']=$_93a9cf_local_params;$_93a9cf_old_vars['_2106e9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_816216=null;$_93a9cf_old_params['_816216']=$_93a9cf_local_params;$_93a9cf_old_vars['_816216']=$_93a9cf_local_vars;$a_816216=$this->setup_args(['name'=>'filter_cond','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;manage_revision=1<?php $c_816216=ob_get_clean();$c_816216=$this->block_setvarblock($a_816216,$c_816216,$this,$r_816216,1,'_816216');echo($c_816216); $_93a9cf_local_params=$_93a9cf_old_params['_816216'];?>

<?php $c_d9288a=null;$_93a9cf_old_params['_d9288a']=$_93a9cf_local_params;$_93a9cf_old_vars['_d9288a']=$_93a9cf_local_vars;$a_d9288a=$this->setup_args(['name'=>'selecter_param','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;manage_revision=1<?php $c_d9288a=ob_get_clean();$c_d9288a=$this->block_setvarblock($a_d9288a,$c_d9288a,$this,$r_d9288a,1,'_d9288a');echo($c_d9288a); $_93a9cf_local_params=$_93a9cf_old_params['_d9288a'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2106e9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2106e9'];?>

<?php $_93a9cf_old_params['_9910f2']=$_93a9cf_local_params;$_93a9cf_old_vars['_9910f2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<!DOCTYPE html>
<html lang="<?php $_93a9cf_old_params['_c9e3ae']=$_93a9cf_local_params;$_93a9cf_old_vars['_c9e3ae']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c9e3ae'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c9e3ae'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_93a9cf_old_params['_375d2c']=$_93a9cf_local_params;$_93a9cf_old_vars['_375d2c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_375d2c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_375d2c'];?>
 | <?php echo $this->modifier_escape($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'appname','escape'=>'single','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php $_93a9cf_old_params['_9963d4']=$_93a9cf_local_params;$_93a9cf_old_vars['_9963d4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_34ad4c']=$_93a9cf_local_params;$_93a9cf_old_vars['_34ad4c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_34ad4c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_34ad4c'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9963d4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9963d4'];?>
</title>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tether.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.cookie.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/clipboard.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/theme.min.css?v=<?php echo $this->function_var($this->setup_args(['name'=>'version','this_tag'=>'var'],null,$this),$this)?>
" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery.fileupload.css">
    <?php $_93a9cf_old_params['_acc688']=$_93a9cf_local_params;$_93a9cf_old_vars['_acc688']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_dc99fe']=$_93a9cf_local_params;$_93a9cf_old_vars['_dc99fe']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'list_screen','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dc99fe'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dc99fe'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_acc688'];$_93a9cf_local_vars=$_93a9cf_old_vars['_acc688'];?>

    <style type="text/css">
    <?php $_93a9cf_old_params['_41ed43']=$_93a9cf_local_params;$_93a9cf_old_vars['_41ed43']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.disp-option-button { position:absolute; top: 5px; right: 15px; }<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_41ed43'];$_93a9cf_local_vars=$_93a9cf_old_vars['_41ed43'];?>

    <?php $_93a9cf_old_params['_71d275']=$_93a9cf_local_params;$_93a9cf_old_vars['_71d275']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_1cd7e0']=$_93a9cf_local_params;$_93a9cf_old_vars['_1cd7e0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_7aa45c']=$_93a9cf_local_params;$_93a9cf_old_vars['_7aa45c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7aa45c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7aa45c'];?>

      <?php $_93a9cf_old_params['_5d8ce9']=$_93a9cf_local_params;$_93a9cf_old_vars['_5d8ce9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5d8ce9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5d8ce9'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1cd7e0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1cd7e0'];?>

      <?php $_93a9cf_old_params['_a7e212']=$_93a9cf_local_params;$_93a9cf_old_vars['_a7e212']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a7e212'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a7e212'];?>

      <?php $_93a9cf_old_params['_209b85']=$_93a9cf_local_params;$_93a9cf_old_vars['_209b85']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_209b85'];$_93a9cf_local_vars=$_93a9cf_old_vars['_209b85'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1040; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; line-height: 1; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_71d275'];$_93a9cf_local_vars=$_93a9cf_old_vars['_71d275'];?>

      .nav-top,.brand-prototype{ background-color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; }
      <?php $_93a9cf_old_params['_017ae4']=$_93a9cf_local_params;$_93a9cf_old_vars['_017ae4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_017ae4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_017ae4'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_93a9cf_old_params['_134b65']=$_93a9cf_local_params;$_93a9cf_old_vars['_134b65']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_134b65'];$_93a9cf_local_vars=$_93a9cf_old_vars['_134b65'];?>

    <?php $_93a9cf_old_params['_1dad4f']=$_93a9cf_local_params;$_93a9cf_old_vars['_1dad4f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1dad4f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1dad4f'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 dialog">
<?php $_93a9cf_old_params['_5f1598']=$_93a9cf_local_params;$_93a9cf_old_vars['_5f1598']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
jQuery.fn.extend({
  ksortable: function(options) {
    let self = this;
    self.sortable(options);
    $(self).children().attr('tabindex', 0);
    $(self).on('keydown', '> *', function(event) {
    // $('li', this).attr('tabindex', 0).bind('keydown', function(event) {
        if ( event.target && /^(input|textarea|select)$/.test(event.target.tagName.toLowerCase()) ) {
            return;
        }
        if(event.which == 37 || event.which == 38) { // left or up
          $(this).insertBefore($(this).prev());
        } 
        if(event.which == 39 || event.which == 40) { // right or down
          $(this).insertAfter($(this).next()); 
        }     
        if (event.which == 84 || event.which == 33) { // "t" or page-up
          $(this).parent().prepend($(this));
        } 
        if (event.which == 66 || event.which == 34) { // "b" or page-down
          $(this).parent().append($(this));
        } 
        if(event.which == 82) { // "r"
          var p = $(this).parent();
          p.children().each(function(){p.prepend($(this))})
        } 
        if(event.which == 83) { // "s"
          var p = $(this).parent();
          p.children().each(function(){
            if(Math.random()<.5)
              p.prepend($(this));
            else
              p.append($(this));
          })
        }
        var keyNums = [33, 34, 37, 38, 39, 40, 66, 82, 83, 84];
        var keyNum = event.which + 0;
        if (keyNums.indexOf(keyNum) >= 0){
          event.stopPropagation();
          $(this).focus();
          if ( $(this).hasClass("edit-options-child") ) {
            sort_fields();
          } else if ( $(this).hasClass("badge-relation") ) {
            editContentChanged = true;
          }
          $(self).sortable('refresh').sortable('refreshPositions');
          $(self).trigger('ksortupdate', this);
        }
    });
    return self;
  }
});
</script>
<?php $_93a9cf_old_params['_6d6a8f']=$_93a9cf_local_params;$_93a9cf_old_vars['_6d6a8f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6d6a8f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6d6a8f'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5f1598'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5f1598'];?>

<?php $_93a9cf_old_params['_1c53dc']=$_93a9cf_local_params;$_93a9cf_old_vars['_1c53dc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_e42cac']=$_93a9cf_local_params;$_93a9cf_old_vars['_e42cac']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.direct_edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_7ac49d']=$_93a9cf_local_params;$_93a9cf_old_vars['_7ac49d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7ac49d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7ac49d'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e42cac'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e42cac'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1c53dc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1c53dc'];?>

    <div class="container-fluid full">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    
  <?php $_93a9cf_old_params['_c538c8']=$_93a9cf_local_params;$_93a9cf_old_vars['_c538c8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_97f399']=$_93a9cf_local_params;$_93a9cf_old_vars['_97f399']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_c031f1']=$_93a9cf_local_params;$_93a9cf_old_vars['_c031f1']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c031f1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c031f1'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_97f399'];$_93a9cf_local_vars=$_93a9cf_old_vars['_97f399'];?>

    <?php $_93a9cf_old_params['_670be4']=$_93a9cf_local_params;$_93a9cf_old_vars['_670be4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_670be4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_670be4'];?>

    <?php $_93a9cf_old_params['_0c6f6c']=$_93a9cf_local_params;$_93a9cf_old_vars['_0c6f6c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_e702a4']=$_93a9cf_local_params;$_93a9cf_old_vars['_e702a4']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

      <?php else:?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e702a4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e702a4'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0c6f6c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0c6f6c'];?>

    <?php $_93a9cf_old_params['_d0fabd']=$_93a9cf_local_params;$_93a9cf_old_vars['_d0fabd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d0fabd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d0fabd'];?>

    <?php $_93a9cf_old_params['_2dab03']=$_93a9cf_local_params;$_93a9cf_old_vars['_2dab03']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_5b24be']=$_93a9cf_local_params;$_93a9cf_old_vars['_5b24be']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php ob_start();$_93a9cf_old_params['_88c423']=$_93a9cf_local_params;$_93a9cf_old_vars['_88c423']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
      <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="LongTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Display Options','setvar'=>'options_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('options_title','setvar',$this),$this,'setvar')?>

          <h5 class="modal-title" id="LongTitle"><?php echo $this->function_var($this->setup_args(['name'=>'options_title','this_tag'=>'var'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="disp_options_form">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="edit">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" id="_field_sort_order" name="field_sort_order" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_field_sort_order','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php $_93a9cf_old_params['_fae087']=$_93a9cf_local_params;$_93a9cf_old_vars['_fae087']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fae087'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fae087'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_93a9cf_old_params['_d1d5a5']=$_93a9cf_local_params;$_93a9cf_old_vars['_d1d5a5']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_5e57c0=null;$_93a9cf_old_params['_5e57c0']=$_93a9cf_local_params;$_93a9cf_old_vars['_5e57c0']=$_93a9cf_local_vars;$a_5e57c0=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_5e57c0=-1;$r_5e57c0=true;while($r_5e57c0===true):$r_5e57c0=($_5e57c0!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_5e57c0,$c_5e57c0,$this,$r_5e57c0,++$_5e57c0,'_5e57c0');ob_start();?>
<?php $c_5e57c0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5e57c0=false;}if($c_5e57c0 ):?>

              <?php $_93a9cf_old_params['_f2b668']=$_93a9cf_local_params;$_93a9cf_old_vars['_f2b668']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_93a9cf_old_params['_4af94c']=$_93a9cf_local_params;$_93a9cf_old_vars['_4af94c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_93a9cf_old_params['_43758b']=$_93a9cf_local_params;$_93a9cf_old_vars['_43758b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_93a9cf_old_params['_d7818e']=$_93a9cf_local_params;$_93a9cf_old_vars['_d7818e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_93a9cf_old_params['_3ba1f3']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ba1f3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3ba1f3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ba1f3'];?>

                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d7818e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d7818e'];?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_43758b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_43758b'];?>

                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4af94c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4af94c'];?>

                <?php $_93a9cf_old_params['_5807f4']=$_93a9cf_local_params;$_93a9cf_old_vars['_5807f4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_93a9cf_old_params['_fcacfc']=$_93a9cf_local_params;$_93a9cf_old_vars['_fcacfc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fcacfc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fcacfc'];?>

                  <?php $_93a9cf_old_params['_f5379b']=$_93a9cf_local_params;$_93a9cf_old_vars['_f5379b']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f5379b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f5379b'];?>

                  <label class="edit-options-child <?php $_93a9cf_old_params['_a76da5']=$_93a9cf_local_params;$_93a9cf_old_vars['_a76da5']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a76da5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a76da5'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_93a9cf_old_params['_885b97']=$_93a9cf_local_params;$_93a9cf_old_vars['_885b97']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_885b97'];$_93a9cf_local_vars=$_93a9cf_old_vars['_885b97'];?>

                    <input<?php $_93a9cf_old_params['_7ef586']=$_93a9cf_local_params;$_93a9cf_old_vars['_7ef586']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_93a9cf_old_params['_0a6642']=$_93a9cf_local_params;$_93a9cf_old_vars['_0a6642']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_93a9cf_old_params['_7c6979']=$_93a9cf_local_params;$_93a9cf_old_vars['_7c6979']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7c6979'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7c6979'];?>

                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0a6642'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0a6642'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7ef586'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7ef586'];?>
<?php $_93a9cf_old_params['_06ab3f']=$_93a9cf_local_params;$_93a9cf_old_vars['_06ab3f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_06ab3f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_06ab3f'];?>
 type="<?php $_93a9cf_old_params['_e28069']=$_93a9cf_local_params;$_93a9cf_old_vars['_e28069']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e28069'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e28069'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_93a9cf_old_params['_81e82e']=$_93a9cf_local_params;$_93a9cf_old_vars['_81e82e']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_81e82e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_81e82e'];?>
<?php $_93a9cf_old_params['_9911da']=$_93a9cf_local_params;$_93a9cf_old_vars['_9911da']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9911da'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9911da'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5807f4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5807f4'];?>

              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f2b668'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f2b668'];?>

            <?php endif;$c_5e57c0=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_5e57c0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5e57c0'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d1d5a5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d1d5a5'];?>

                <?php $c_0b26d0=null;$_93a9cf_old_params['_0b26d0']=$_93a9cf_local_params;$_93a9cf_old_vars['_0b26d0']=$_93a9cf_local_vars;$a_0b26d0=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_0b26d0=-1;$r_0b26d0=true;while($r_0b26d0===true):$r_0b26d0=($_0b26d0!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_0b26d0,$c_0b26d0,$this,$r_0b26d0,++$_0b26d0,'_0b26d0');ob_start();?>
<?php $c_0b26d0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0b26d0=false;}if($c_0b26d0 ):?>

                <?php $c_f03f15=null;$_93a9cf_old_params['_f03f15']=$_93a9cf_local_params;$_93a9cf_old_vars['_f03f15']=$_93a9cf_local_vars;$a_f03f15=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_f03f15=ob_get_clean();$c_f03f15=$this->block_setvarblock($a_f03f15,$c_f03f15,$this,$r_f03f15,1,'_f03f15');echo($c_f03f15); $_93a9cf_local_params=$_93a9cf_old_params['_f03f15'];?>

                <label class="<?php $_93a9cf_old_params['_afd389']=$_93a9cf_local_params;$_93a9cf_old_vars['_afd389']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_afd389'];$_93a9cf_local_vars=$_93a9cf_old_vars['_afd389'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_93a9cf_old_params['_a5c72e']=$_93a9cf_local_params;$_93a9cf_old_vars['_a5c72e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a5c72e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a5c72e'];?>

                  <?php $_93a9cf_old_params['_19c4d4']=$_93a9cf_local_params;$_93a9cf_old_vars['_19c4d4']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_19c4d4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_19c4d4'];?>

                  <?php $_93a9cf_old_params['_c1e16c']=$_93a9cf_local_params;$_93a9cf_old_vars['_c1e16c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c1e16c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c1e16c'];?>
 <?php $_93a9cf_old_params['_3f29b3']=$_93a9cf_local_params;$_93a9cf_old_vars['_3f29b3']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3f29b3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3f29b3'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_93a9cf_old_params['_c0d32f']=$_93a9cf_local_params;$_93a9cf_old_vars['_c0d32f']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c0d32f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c0d32f'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_0b26d0=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_0b26d0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0b26d0'];?>

              <?php $_93a9cf_old_params['_317d91']=$_93a9cf_local_params;$_93a9cf_old_vars['_317d91']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_317d91'];$_93a9cf_local_vars=$_93a9cf_old_vars['_317d91'];?>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="reset-disp-option" class="btn btn-warning" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" id="disp_options_save" class="btn btn-primary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php endif;$_88c423=ob_get_clean();echo $this->modifier_trim_space($_88c423,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_93a9cf_local_params=$_93a9cf_old_params['_88c423'];$_93a9cf_local_vars=$_93a9cf_old_vars['_88c423'];?>

<script>
<?php $_93a9cf_old_params['_9918a1']=$_93a9cf_local_params;$_93a9cf_old_vars['_9918a1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9918a1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9918a1'];?>

function sort_fields(){
    var editor_data = [];
    if(tinymce && tinymce.editors){
        for(var i = tinymce.editors.length -1; i >= 0; i--){
            var ed = tinymce.editors[i];
            editor_data.push({
                target  : ed.targetElm,
                setting : ed.settings
            });
        }
    }
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        var field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
        $('#' + field_name + '-wrapper' ).find('');
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    for(var i = 0; i < editor_data.length; i++){
        tinyMCE.execCommand('mceAddEditor', false, editor_data[i].target);
    }
    reorder_fields();
}
function reorder_fields(){
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        let field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    var oldTextFormat = null;
    if ( $('#text_format-select').length ){
        oldTextFormat = $('#text_format-select').val();
    }
    if( tinymce && ( oldTextFormat == null || oldTextFormat == 'richtext' ) ){
        tinymce.EditorManager.remove();
        editorInit();
    }
    $(document).trigger('pcmsx.reorder_fields_done');
}
$("#disp_options_save").click(function(){
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options saved successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while saving %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        $('#_reset-disp-oprions').val('');
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options reset successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_trans($this->setup_args(['phrase'=>'Changes will be reflected the next time you open the screen.','this_tag'=>'trans'],null,$this),$this)?>
", 'warning');
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while resetting %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$(".disp_option").change(function(){
    let colname = $(this).prop("id");
    let wrapper_name = "#" + colname + 'wrapper';
    let option_name = "." + colname + 'option';
    let wrapper = $(wrapper_name);
    let option  = $(option_name);
    if($(this).prop("checked")) {
        wrapper.show("fade");
        option.show();
    } else {
        wrapper.hide("fade");
        option.hide();
    }
    let richtext = wrapper.find('textarea.richtext');
    if ( richtext.length && $(this).prop('checked') ) {
<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_dc51e2']=$_93a9cf_local_params;$_93a9cf_old_vars['_dc51e2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        let editor4 = $('.mce-edit-area iframe');
        if ( editor4.length ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            editor4.css( 'height', editor_height + 'px' );
        }
<?php else:?>

        if ( richtext.next().attr('role') == 'application' ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            richtext.next().css( 'height', editor_height + 'px' );
        }
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dc51e2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dc51e2'];?>

    }
    updateFieldSelector();
});
</script>
        <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5b24be'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5b24be'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2dab03'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2dab03'];?>

    <?php $_93a9cf_old_params['_b6a5c1']=$_93a9cf_local_params;$_93a9cf_old_vars['_b6a5c1']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_02a542']=$_93a9cf_local_params;$_93a9cf_old_vars['_02a542']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'time_step','setvar'=>'time_step','this_tag'=>'property'],null,$this),$this),$this->setup_args('time_step','setvar',$this),$this,'setvar')?>

      <div class="modal fade" id="filterOptions" tabindex="-1" role="dialog" aria-labelledby="listFiltersTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="listFiltersTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form id="list_filter_form" action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
            <input type="hidden" name="__mode" value="view" id="this_mode">
            <input type="hidden" name="_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_type" value="list">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter_id" id="_filter_id" value="">
            <input type="hidden" name="_save_filter_name" id="_save_filter_name" value="">
            <input type="hidden" name="_detach_filter" id="_detach_filter" value="">
            <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
            <input type="hidden" name="_system_filters_option" value="" id="_system_filters_option">
            <?php $_93a9cf_old_params['_6c24f1']=$_93a9cf_local_params;$_93a9cf_old_vars['_6c24f1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6c24f1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6c24f1'];?>

            <?php $_93a9cf_old_params['_cbdf90']=$_93a9cf_local_params;$_93a9cf_old_vars['_cbdf90']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cbdf90'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cbdf90'];?>

          <?php $_93a9cf_old_params['_2a8a44']=$_93a9cf_local_params;$_93a9cf_old_vars['_2a8a44']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2a8a44'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2a8a44'];?>

          <?php $_93a9cf_old_params['_0b2f31']=$_93a9cf_local_params;$_93a9cf_old_vars['_0b2f31']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0b2f31'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0b2f31'];?>

          <?php $_93a9cf_old_params['_52ac08']=$_93a9cf_local_params;$_93a9cf_old_vars['_52ac08']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_93a9cf_old_params['_194fd6']=$_93a9cf_local_params;$_93a9cf_old_vars['_194fd6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_194fd6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_194fd6'];?>

          <?php $_93a9cf_old_params['_7a6495']=$_93a9cf_local_params;$_93a9cf_old_vars['_7a6495']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_system_filters" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_system_filters_option" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert_editor" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7a6495'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7a6495'];?>

            <?php $_93a9cf_old_params['_ab51cf']=$_93a9cf_local_params;$_93a9cf_old_vars['_ab51cf']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ab51cf'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ab51cf'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_52ac08'];$_93a9cf_local_vars=$_93a9cf_old_vars['_52ac08'];?>

          <?php $_93a9cf_old_params['_2c8d5f']=$_93a9cf_local_params;$_93a9cf_old_vars['_2c8d5f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2c8d5f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2c8d5f'];?>

          <?php $_93a9cf_old_params['_c1e380']=$_93a9cf_local_params;$_93a9cf_old_vars['_c1e380']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_93a9cf_old_params['_b8301d']=$_93a9cf_local_params;$_93a9cf_old_vars['_b8301d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b8301d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b8301d'];?>

          <?php $_93a9cf_old_params['_4d03fd']=$_93a9cf_local_params;$_93a9cf_old_vars['_4d03fd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4d03fd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4d03fd'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c1e380'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c1e380'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_93a9cf_old_params['_d5f3f8']=$_93a9cf_local_params;$_93a9cf_old_vars['_d5f3f8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_72d840=null;$_93a9cf_old_params['_72d840']=$_93a9cf_local_params;$_93a9cf_old_vars['_72d840']=$_93a9cf_local_vars;$a_72d840=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_72d840=-1;$r_72d840=true;while($r_72d840===true):$r_72d840=($_72d840!==-1)?false:true;echo $this->block_loop($a_72d840,$c_72d840,$this,$r_72d840,++$_72d840,'_72d840');ob_start();?>
<?php $c_72d840 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_72d840=false;}if($c_72d840 ):?>

                      <?php $_93a9cf_old_params['_339f59']=$_93a9cf_local_params;$_93a9cf_old_vars['_339f59']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_339f59'];$_93a9cf_local_vars=$_93a9cf_old_vars['_339f59'];?>

                        <option <?php $_93a9cf_old_params['_c3bf9c']=$_93a9cf_local_params;$_93a9cf_old_vars['_c3bf9c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c3bf9c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c3bf9c'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_93a9cf_old_params['_a6e8d1']=$_93a9cf_local_params;$_93a9cf_old_vars['_a6e8d1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a6e8d1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a6e8d1'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_93a9cf_old_params['_d80d9d']=$_93a9cf_local_params;$_93a9cf_old_vars['_d80d9d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d80d9d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d80d9d'];?>

                    <?php endif;$c_72d840=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_72d840'];$_93a9cf_local_vars=$_93a9cf_old_vars['_72d840'];?>

                  </div>
                </div>
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d5f3f8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d5f3f8'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_98690c=null;$_93a9cf_old_params['_98690c']=$_93a9cf_local_params;$_93a9cf_old_vars['_98690c']=$_93a9cf_local_vars;$a_98690c=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_98690c=-1;$r_98690c=true;while($r_98690c===true):$r_98690c=($_98690c!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_98690c,$c_98690c,$this,$r_98690c,++$_98690c,'_98690c');ob_start();?>
<?php $c_98690c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_98690c=false;}if($c_98690c ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_93a9cf_old_params['_9d09c6']=$_93a9cf_local_params;$_93a9cf_old_vars['_9d09c6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9d09c6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9d09c6'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_98690c=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_98690c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_98690c'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_93a9cf_old_params['_aeadb3']=$_93a9cf_local_params;$_93a9cf_old_vars['_aeadb3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_aeadb3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_aeadb3'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_909c8a=null;$_93a9cf_old_params['_909c8a']=$_93a9cf_local_params;$_93a9cf_old_vars['_909c8a']=$_93a9cf_local_vars;$a_909c8a=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_909c8a=-1;$r_909c8a=true;while($r_909c8a===true):$r_909c8a=($_909c8a!==-1)?false:true;echo $this->block_loop($a_909c8a,$c_909c8a,$this,$r_909c8a,++$_909c8a,'_909c8a');ob_start();?>
<?php $c_909c8a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_909c8a=false;}if($c_909c8a ):?>

                    <?php $_93a9cf_old_params['_3aa6ba']=$_93a9cf_local_params;$_93a9cf_old_vars['_3aa6ba']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3aa6ba'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3aa6ba'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_93a9cf_old_params['_b1a15b']=$_93a9cf_local_params;$_93a9cf_old_vars['_b1a15b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b1a15b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b1a15b'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_909c8a=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_909c8a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_909c8a'];?>

                    </select>
                   <button type="button" class="btn btn-sm btn-secondary filter-selecter-ctrl-apply" id="filter-add-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</button>
                  </div>
                </div>
                <div class="row form-group new-filter-elem">
                  <div class="col-md-12">
                    <div class="card hidden" id="filter-parant-block">
                      <ul class="list-group list-group-flush" id="filters-list">
                        <li class="list-group-item hidden" id="selector-tmpl-int">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="number" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Grater than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ge"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Greater Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="le"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-text">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="text" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="ct"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="nc"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="bw"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Begin with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ew"><?php echo $this->function_trans($this->setup_args(['phrase'=>'End with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-date">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'published_on_default','setvar'=>'published_on_default','this_tag'=>'property'],null,$this),$this),$this->setup_args('published_on_default','setvar',$this),$this,'setvar')?>

                              <input type="datetime-local" step="<?php $_93a9cf_old_params['_9db896']=$_93a9cf_local_params;$_93a9cf_old_vars['_9db896']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9db896'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9db896'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_93a9cf_old_params['_3fc497']=$_93a9cf_local_params;$_93a9cf_old_vars['_3fc497']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3fc497'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3fc497'];?>
">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Newer than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Older than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-status">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                            <?php $_93a9cf_old_params['_bf8b66']=$_93a9cf_local_params;$_93a9cf_old_vars['_bf8b66']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_93a9cf_old_params['_2ae13f']=$_93a9cf_local_params;$_93a9cf_old_vars['_2ae13f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2ae13f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2ae13f'];?>

                            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bf8b66'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bf8b66'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_93a9cf_old_params['_cb11f2']=$_93a9cf_local_params;$_93a9cf_old_vars['_cb11f2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_d54827=null;$_93a9cf_old_params['_d54827']=$_93a9cf_local_params;$_93a9cf_old_vars['_d54827']=$_93a9cf_local_vars;$a_d54827=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_d54827=-1;$r_d54827=true;while($r_d54827===true):$r_d54827=($_d54827!==-1)?false:true;echo $this->block_loop($a_d54827,$c_d54827,$this,$r_d54827,++$_d54827,'_d54827');ob_start();?>
<?php $c_d54827 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d54827=false;}if($c_d54827 ):?>

                              <?php $_93a9cf_old_params['_dd8f3a']=$_93a9cf_local_params;$_93a9cf_old_vars['_dd8f3a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_93a9cf_old_params['_594056']=$_93a9cf_local_params;$_93a9cf_old_vars['_594056']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_594056'];$_93a9cf_local_vars=$_93a9cf_old_vars['_594056'];?>

                              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dd8f3a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dd8f3a'];?>

                            <?php endif;$c_d54827=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_d54827'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d54827'];?>

                            <?php else:?>

                            <?php $c_48d017=null;$_93a9cf_old_params['_48d017']=$_93a9cf_local_params;$_93a9cf_old_vars['_48d017']=$_93a9cf_local_vars;$a_48d017=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_48d017=-1;$r_48d017=true;while($r_48d017===true):$r_48d017=($_48d017!==-1)?false:true;echo $this->block_loop($a_48d017,$c_48d017,$this,$r_48d017,++$_48d017,'_48d017');ob_start();?>
<?php $c_48d017 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_48d017=false;}if($c_48d017 ):?>

                              <?php $_93a9cf_old_params['_c5f80a']=$_93a9cf_local_params;$_93a9cf_old_vars['_c5f80a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c5f80a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c5f80a'];?>

                            <?php endif;$c_48d017=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_48d017'];$_93a9cf_local_vars=$_93a9cf_old_vars['_48d017'];?>

                            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cb11f2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cb11f2'];?>

                            </select>
                            <input type="hidden" name="" value="eq">
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary delete-filter-elem hidden" id="detach-filter-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach Filter','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-secondary new-filter-elem hidden" id="filter-save-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save and Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
<script>
$('#system_filter-apply-button').click(function(){
    if (! $('[name=select_system_filters] option:selected').val() ) {
        if ( filter_itemCount ) {
            return $('#filter-apply').trigger('click');
        }
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    let input = $('[name=select_system_filters] option:selected').data( 'input' );
    let hint = $('[name=select_system_filters] option:selected').data( 'hint' );
    let filter_option = $('[name=select_system_filters] option:selected').attr('data-option');
    if ( input ) {
        if (! hint ) {
            hint = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the value.','this_tag'=>'trans'],null,$this),$this)?>
';
        }
        filter_option = prompt( hint, filter_option );
        if (! filter_option ) {
            return false;
        }
    }
    $('#select-user_filters').val('');
    $('#_system_filters_option').val( filter_option );
});
$('#filter-select-delete-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove selected filter?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $('#_filter_id').val( filter_id );
    $('#this_mode').val( 'delete_filter' );
    $('[name=select-user_filters] option:selected').remove();
    var str = $("#list_filter_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter has successfully deleted.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-danger");
            $("#header-alert").addClass("alert-success");
        } else {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while removing the Filter.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-success");
            $("#header-alert").addClass("alert-danger");
        }
        $("#header-alert").show();
        setTimeout(focus_header_dialog, 500);
        $(".current-filter").hide();
        $('#this_mode').val( 'list' );
        $('#_filter_id').val('');
        $('#filter-select-delete-button').hide();
        var loc = $(location).attr('href');
        if ( loc.indexOf('?') == -1 ) {
            loc = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php $_93a9cf_old_params['_cc01b6']=$_93a9cf_local_params;$_93a9cf_old_vars['_cc01b6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cc01b6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cc01b6'];?>

            loc += '&_detach_filter=1';
            location.href = loc;
        } else {
            loc += '&_detach_filter=1';
            location.href = loc;
        }
    },
    "json"
    );
});
function focus_header_dialog () {
    $("#header-alert").focus();
}
$('#filter-select-apply-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#select_system_filters').val('');
    $('#_filter_id').val( filter_id );
    return true;
});
$('#select-user_filters').change(function(){
    if ($(this).val() == 'add_new_filter' ) {
        $('.new-filter-elem').show();
        $('.delete-filter-elem').hide();
    } else {
        $('.new-filter-elem').hide();
        if ( $(this).val() ) {
            $('.delete-filter-elem').show();
        }
    }
});
var curr_user_filter = $('#select-user_filters').val();
if ( curr_user_filter != 'add_new_filter' && curr_user_filter != '' ) {
    $('.delete-filter-elem').show();
}
var filter_itemCount = 0;
$('#filter-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
});
$('#filter-save-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    var filter_name = prompt('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the Name of this Filter.','this_tag'=>'trans'],null,$this),$this)?>
', '');
    if (! filter_name ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter Name is required.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#_save_filter_name').val(filter_name);
});
$('#detach-filter-button').click(function(){
    $('#filters-list').remove();
    $('#_detach_filter').val(1);
});
$('#filter-add-button').click(function(){
    var selected_col = $('#filters-selector').val();
    var sel_class = $('[name=filters-selector] option:selected').attr('class');
    var sel_label = $('[name=filters-selector] option:selected').text();
    sel_class = sel_class.replace( 'coltype_', '' );
    var filter_tmpl = $('#selector-tmpl-text');
    if ( selected_col == 'status' ) {
        filter_tmpl = $('#selector-tmpl-status');
    } else if ( sel_class == 'int' || sel_class == 'tinyint' || sel_class == 'double' || sel_class.indexOf('decimal') == 0 ) {
        filter_tmpl = $('#selector-tmpl-int');
    } else if ( sel_class == 'datetime' ) {
        filter_tmpl = $('#selector-tmpl-date');
    }
    var addSelecter = filter_tmpl.clone( true ).appendTo('#filters-list');
    addSelecter.removeClass('hidden');
    addSelecter.removeAttr('id');
    addSelecter.children('div').children('span').html(sel_label);
    if ( selected_col == 'status' ) {
        addSelecter.children('div').children('input').attr('name', '_filter_cond_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_value_' + selected_col + '[]');
    } else {
        addSelecter.children('div').children('input').attr('name', '_filter_value_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_cond_' + selected_col + '[]');
    }
    $('#filter-parant-block').show();
    $('#filter-parant-block').css('border','none');
    addSelecter.show();
    filter_itemCount++;
});
$('.detach-filter').click(function(){
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove this filter condition?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $(this).parent().parent().remove();
    filter_itemCount--;
});
</script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_02a542'];$_93a9cf_local_vars=$_93a9cf_old_vars['_02a542'];?>

    <?php $_93a9cf_old_params['_138538']=$_93a9cf_local_params;$_93a9cf_old_vars['_138538']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_411cfd']=$_93a9cf_local_params;$_93a9cf_old_vars['_411cfd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="modal fade" id="startUpload" tabindex="-1" role="dialog" aria-labelledby="startUploadTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="startUploadTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-success hidden" id="clear-history-alert" role="alert" tabindex="0">
              <button onclick="$('#clear-history-alert').hide();" type="button" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
              <?php echo $this->function_trans($this->setup_args(['phrase'=>'The upload path history has been cleared successfully.','this_tag'=>'trans'],null,$this),$this)?>

            </div>
              <div class="container-fluid" id="drop-zone">
                <form>
                <span id="file-chooser" class="btn btn-success fileinput-button">
                    <span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select File...','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple
                        onfocus="$('#file-chooser').css('border','2px solid green');"
                        onblur="$('#file-chooser').css('border','none');">
                </span>
              <?php $_93a9cf_old_params['_faffb4']=$_93a9cf_local_params;$_93a9cf_old_vars['_faffb4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <label class="custom-control custom-checkbox" style="margin-top: 10px;margin-left: 7px">
                  <input type="checkbox" class="custom-control-input"
                    id="asset_overwrite" name="overwrite" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Overwrite files with the same path','this_tag'=>'trans'],null,$this),$this)?>

                </label>
                <script>
                $('#asset_overwrite').change(function(){
                    if ($(this).prop('checked')) {
                        $(this).val('1');
                    } else {
                        $(this).val('0');
                    }
                });
                </script>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_faffb4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_faffb4'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_93a9cf_old_params['_c77a01']=$_93a9cf_local_params;$_93a9cf_old_vars['_c77a01']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c77a01'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c77a01'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_93a9cf_old_params['_59c4a9']=$_93a9cf_local_params;$_93a9cf_old_vars['_59c4a9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_c9cf65=null;$_93a9cf_old_params['_c9cf65']=$_93a9cf_local_params;$_93a9cf_old_vars['_c9cf65']=$_93a9cf_local_vars;$a_c9cf65=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_c9cf65=-1;$r_c9cf65=true;while($r_c9cf65===true):$r_c9cf65=($_c9cf65!==-1)?false:true;echo $this->block_loop($a_c9cf65,$c_c9cf65,$this,$r_c9cf65,++$_c9cf65,'_c9cf65');ob_start();?>
<?php $c_c9cf65 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c9cf65=false;}if($c_c9cf65 ):?>

                    <?php $_93a9cf_old_params['_585039']=$_93a9cf_local_params;$_93a9cf_old_vars['_585039']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_585039'];$_93a9cf_local_vars=$_93a9cf_old_vars['_585039'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_93a9cf_old_params['_4f2321']=$_93a9cf_local_params;$_93a9cf_old_vars['_4f2321']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4f2321'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4f2321'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_93a9cf_old_params['_dd036b']=$_93a9cf_local_params;$_93a9cf_old_vars['_dd036b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dd036b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dd036b'];?>

                  <?php endif;$c_c9cf65=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_c9cf65'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c9cf65'];?>

                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_59c4a9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_59c4a9'];?>

                </div>
                <!-- The container for the uploaded files -->
                <div id="files" class="files"></div>
                </form>
              </div>
              <!-- The global progress bar -->
              <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary upload-cancel-button" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Next','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </div>
        </div>
      </div>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="assets/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="assets/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&deleted=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&deleted=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_db17c8']=$_93a9cf_local_params;$_93a9cf_old_vars['_db17c8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_db17c8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_db17c8'];?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}does_act=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}does_act=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}apply_actions=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}apply_actions=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}background_proccess_running=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}background_proccess_running=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}html_background_proccess=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}html_background_proccess=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&+/\',\'&\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&+/\\\',\\\'&\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/^&+/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^&+/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<script src="assets/js/jquery.fileupload.js"></script>
<script>
$('#upload_path').change(function(){
    $('#extra_path').val( $(this).val() );
});
$('#clear-upload_path').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to delete the upload path history?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", {
        '__mode' : 'clear_extra_paths',
        'workspace_id' : '<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
',
        'magic_token': '<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
'
    },
    function ( data ) {
        if( data.result == true ) {
            $('#upload_paths-box').hide( 300 );
            $('#clear-history-alert').show();
            $('#clear-history-alert').focus();
        } else {
            alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while clearing upload path history.','this_tag'=>'trans'],null,$this),$this)?>
");
        }
    },
    "json"
    );
    return false;
});
$('#toggle-upload_path').click(function(){
    $('#upload_path-wrapper').toggle();
    if ( $(this).html() == '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' ) {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Hide','this_tag'=>'trans'],null,$this),$this)?>
' );
        $('#upload_path-wrapper').css('display', 'inline');
    } else {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' );
    }
    return false;
});
var this_url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?<?php $_93a9cf_old_params['_822401']=$_93a9cf_local_params;$_93a9cf_old_vars['_822401']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_822401'];$_93a9cf_local_vars=$_93a9cf_old_vars['_822401'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'_query_string','this_tag'=>'var'],null,$this),$this)?>
&sort=id&direction=desc';
var selected_ids = [];
var upload_count = 0;
var receive_count = 0;
var DropZone = document.getElementById('drop-zone');
DropZone.addEventListener('dragover', function (event) {
    $('#drop-zone').css('background-color','#ddf');
});
DropZone.addEventListener('dragleave', function (event) {
    $('#drop-zone').css('background-color','#fff');
});
$('#drop-zone').css('border','3px dashed <?php $_93a9cf_old_params['_6b3c61']=$_93a9cf_local_params;$_93a9cf_old_vars['_6b3c61']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6b3c61'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6b3c61'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_93a9cf_old_params['_1d4547']=$_93a9cf_local_params;$_93a9cf_old_vars['_1d4547']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1d4547'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1d4547'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_93a9cf_old_params['_d1fcc7']=$_93a9cf_local_params;$_93a9cf_old_vars['_d1fcc7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d1fcc7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d1fcc7'];?>
};
            data.submit();
            upload_count++;
            $("#drop-zone").hide( 'slow' );
            $('.upload-cancel-button').hide( 'slow' );
        },
        done: function (e, data) {
            $('#clear-history-alert').hide();
            if (!data.result.files) {
                var error = data.result.message;
                $('#progress .progress-bar').css(
                    'width', 0
                );
                alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while uploading.','this_tag'=>'trans'],null,$this),$this)?>
"+' (' + error + ')');
                upload_count = 0;
                receive_count = 0;
                selected_ids = [];
                return;
            }
            $("input[name='id[]']").each(function(){
                if ( $(this).prop('checked') ) {
                    if( $.inArray($(this).val(), selected_ids ) == -1 ) {
                        selected_ids.push($(this).val());
                    }
                }
            });
            $.each(data.result.files, function (index, file) {
                // $('<p/>').text(file.name).appendTo('#files');
                var input_cb = $('#select_ids_tmpl');
                var new_input = input_cb.clone( true ).appendTo('#list-select-form');
                new_input.removeAttr('id');
                new_input.attr('name','id[]');
                new_input.val(file.asset_id);
                selected_ids.push(file.asset_id);
                receive_count++;
                //if ( upload_count == receive_count ) {
                setTimeout(uploaded_hdlr, 1000);
                //}
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            $('#drop-zone').css('background-color','#fff');
            $("#drop-zone").show( 'slow' );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
function uploaded_hdlr () {
    this_url += '&selected_ids=' + selected_ids.join(',');
    <?php $_93a9cf_old_params['_6b1bd9']=$_93a9cf_local_params;$_93a9cf_old_vars['_6b1bd9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6b1bd9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6b1bd9'];?>

}
</script>
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_411cfd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_411cfd'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_138538'];$_93a9cf_local_vars=$_93a9cf_old_vars['_138538'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b6a5c1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b6a5c1'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c538c8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c538c8'];?>

      <div class="row">
        <main class="pt-3 full <?php $_93a9cf_old_params['_b0fe72']=$_93a9cf_local_params;$_93a9cf_old_vars['_b0fe72']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'list_screen','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 col-md-12<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b0fe72'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b0fe72'];?>
">
        <?php $_93a9cf_old_params['_ce35e6']=$_93a9cf_local_params;$_93a9cf_old_vars['_ce35e6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="col-md-12 full"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ce35e6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ce35e6'];?>

          <h1 id="page-title" class="<?php $_93a9cf_old_params['_8ae644']=$_93a9cf_local_params;$_93a9cf_old_vars['_8ae644']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'full_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
page-title-full<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8ae644'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8ae644'];?>
<?php $_93a9cf_old_params['_b0c483']=$_93a9cf_local_params;$_93a9cf_old_vars['_b0c483']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title-with-opt<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b0c483'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b0c483'];?>
"><span class="title"><?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
</span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_9e7c7a']=$_93a9cf_local_params;$_93a9cf_old_vars['_9e7c7a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_6788e4']=$_93a9cf_local_params;$_93a9cf_old_vars['_6788e4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      
      <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'select_role','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6788e4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6788e4'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9e7c7a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9e7c7a'];?>

    <?php $_93a9cf_old_params['_731c7b']=$_93a9cf_local_params;$_93a9cf_old_vars['_731c7b']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'select_role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_4fed2b']=$_93a9cf_local_params;$_93a9cf_old_vars['_4fed2b']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_513c0d']=$_93a9cf_local_params;$_93a9cf_old_vars['_513c0d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_bf0b66']=$_93a9cf_local_params;$_93a9cf_old_vars['_bf0b66']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_93a9cf_old_params['_5041d6']=$_93a9cf_local_params;$_93a9cf_old_vars['_5041d6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_1283b0=null;$_93a9cf_old_params['_1283b0']=$_93a9cf_local_params;$_93a9cf_old_vars['_1283b0']=$_93a9cf_local_vars;$a_1283b0=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_1283b0=ob_get_clean();$c_1283b0=$this->block_setvarblock($a_1283b0,$c_1283b0,$this,$r_1283b0,1,'_1283b0');echo($c_1283b0); $_93a9cf_local_params=$_93a9cf_old_params['_1283b0'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5041d6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5041d6'];?>

          <?php $_93a9cf_old_params['_5170dd']=$_93a9cf_local_params;$_93a9cf_old_vars['_5170dd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_fc67b8']=$_93a9cf_local_params;$_93a9cf_old_vars['_fc67b8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_7d2a5c']=$_93a9cf_local_params;$_93a9cf_old_vars['_7d2a5c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_93a9cf_old_params['_a5d0a0']=$_93a9cf_local_params;$_93a9cf_old_vars['_a5d0a0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._start_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a5d0a0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a5d0a0'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7d2a5c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7d2a5c'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fc67b8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fc67b8'];?>

          <?php $_93a9cf_old_params['_12ef56']=$_93a9cf_local_params;$_93a9cf_old_vars['_12ef56']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_1eae3b']=$_93a9cf_local_params;$_93a9cf_old_vars['_1eae3b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" id="filter-button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1eae3b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1eae3b'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_12ef56'];$_93a9cf_local_vars=$_93a9cf_old_vars['_12ef56'];?>

          <?php $_93a9cf_old_params['_54c164']=$_93a9cf_local_params;$_93a9cf_old_vars['_54c164']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_7e1d21']=$_93a9cf_local_params;$_93a9cf_old_vars['_7e1d21']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_1b6a80']=$_93a9cf_local_params;$_93a9cf_old_vars['_1b6a80']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1b6a80'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1b6a80'];?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_93a9cf_old_params['_5248df']=$_93a9cf_local_params;$_93a9cf_old_vars['_5248df']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_26570c']=$_93a9cf_local_params;$_93a9cf_old_vars['_26570c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_26570c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_26570c'];?>
<?php $_93a9cf_old_params['_c239c9']=$_93a9cf_local_params;$_93a9cf_old_vars['_c239c9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c239c9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c239c9'];?>
<?php $_93a9cf_old_params['_cd04ce']=$_93a9cf_local_params;$_93a9cf_old_vars['_cd04ce']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cd04ce'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cd04ce'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5248df'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5248df'];?>
<?php $_93a9cf_old_params['_eda3d4']=$_93a9cf_local_params;$_93a9cf_old_vars['_eda3d4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_1c77c4']=$_93a9cf_local_params;$_93a9cf_old_vars['_1c77c4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1c77c4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1c77c4'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eda3d4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eda3d4'];?>
<?php $_93a9cf_old_params['_2ff4a1']=$_93a9cf_local_params;$_93a9cf_old_vars['_2ff4a1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2ff4a1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2ff4a1'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7e1d21'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7e1d21'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_54c164'];$_93a9cf_local_vars=$_93a9cf_old_vars['_54c164'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5170dd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5170dd'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bf0b66'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bf0b66'];?>

        <?php $_93a9cf_old_params['_f34cd4']=$_93a9cf_local_params;$_93a9cf_old_vars['_f34cd4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_24ee75']=$_93a9cf_local_params;$_93a9cf_old_vars['_24ee75']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_159507=null;$_93a9cf_old_params['_159507']=$_93a9cf_local_params;$_93a9cf_old_vars['_159507']=$_93a9cf_local_vars;$a_159507=$this->setup_args(['name'=>'filter_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $c_159507=ob_get_clean();$c_159507=$this->block_setvarblock($a_159507,$c_159507,$this,$r_159507,1,'_159507');echo($c_159507); $_93a9cf_local_params=$_93a9cf_old_params['_159507'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_24ee75'];$_93a9cf_local_vars=$_93a9cf_old_vars['_24ee75'];?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_93a9cf_old_params['_5b4435']=$_93a9cf_local_params;$_93a9cf_old_vars['_5b4435']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.rev_object_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1&amp;revision_select=1&amp;rev_object_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.rev_object_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5b4435'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5b4435'];?>
<?php $_93a9cf_old_params['_20e8df']=$_93a9cf_local_params;$_93a9cf_old_vars['_20e8df']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_60f92d']=$_93a9cf_local_params;$_93a9cf_old_vars['_60f92d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_60f92d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_60f92d'];?>
<?php $_93a9cf_old_params['_d3fb24']=$_93a9cf_local_params;$_93a9cf_old_vars['_d3fb24']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d3fb24'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d3fb24'];?>
<?php $_93a9cf_old_params['_12c98c']=$_93a9cf_local_params;$_93a9cf_old_vars['_12c98c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_12c98c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_12c98c'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_20e8df'];$_93a9cf_local_vars=$_93a9cf_old_vars['_20e8df'];?>
<?php $_93a9cf_old_params['_eeb30a']=$_93a9cf_local_params;$_93a9cf_old_vars['_eeb30a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.any_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;any_model=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eeb30a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eeb30a'];?>
<?php $_93a9cf_old_params['_8a529d']=$_93a9cf_local_params;$_93a9cf_old_vars['_8a529d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8a529d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8a529d'];?>
&amp;_from_scope=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Home','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f34cd4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f34cd4'];?>

        <?php $_93a9cf_old_params['_e3613e']=$_93a9cf_local_params;$_93a9cf_old_vars['_e3613e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_5e1df5']=$_93a9cf_local_params;$_93a9cf_old_vars['_5e1df5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_ab822b']=$_93a9cf_local_params;$_93a9cf_old_vars['_ab822b']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'create','model'=>'asset','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ab822b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ab822b'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5e1df5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5e1df5'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e3613e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e3613e'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_513c0d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_513c0d'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4fed2b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4fed2b'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_731c7b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_731c7b'];?>

          </h1>
    <?php $_93a9cf_old_params['_99d82e']=$_93a9cf_local_params;$_93a9cf_old_vars['_99d82e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_1e5543']=$_93a9cf_local_params;$_93a9cf_old_vars['_1e5543']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_per_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_36bc75']=$_93a9cf_local_params;$_93a9cf_old_vars['_36bc75']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php ob_start();$_93a9cf_old_params['_d0546e']=$_93a9cf_local_params;$_93a9cf_old_vars['_d0546e']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
    <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="dispOptionsTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dispOptionsTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="list">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
      <?php $_93a9cf_old_params['_0efd70']=$_93a9cf_local_params;$_93a9cf_old_vars['_0efd70']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0efd70'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0efd70'];?>

      <?php $_93a9cf_old_params['_5c407f']=$_93a9cf_local_params;$_93a9cf_old_vars['_5c407f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5c407f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5c407f'];?>

      <?php $_93a9cf_old_params['_2ea923']=$_93a9cf_local_params;$_93a9cf_old_vars['_2ea923']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_93a9cf_old_params['_bb98d6']=$_93a9cf_local_params;$_93a9cf_old_vars['_bb98d6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bb98d6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bb98d6'];?>

          <?php $_93a9cf_old_params['_428b9c']=$_93a9cf_local_params;$_93a9cf_old_vars['_428b9c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_428b9c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_428b9c'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_93a9cf_old_params['_b1b426']=$_93a9cf_local_params;$_93a9cf_old_vars['_b1b426']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b1b426'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b1b426'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2ea923'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2ea923'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_93a9cf_old_params['_ffce93']=$_93a9cf_local_params;$_93a9cf_old_vars['_ffce93']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_448562']=$_93a9cf_local_params;$_93a9cf_old_vars['_448562']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_87758f=null;$_93a9cf_old_params['_87758f']=$_93a9cf_local_params;$_93a9cf_old_vars['_87758f']=$_93a9cf_local_vars;$a_87758f=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_87758f=-1;$r_87758f=true;while($r_87758f===true):$r_87758f=($_87758f!==-1)?false:true;echo $this->block_loop($a_87758f,$c_87758f,$this,$r_87758f,++$_87758f,'_87758f');ob_start();?>
<?php $c_87758f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_87758f=false;}if($c_87758f ):?>

            <?php $_93a9cf_old_params['_ecf0a4']=$_93a9cf_local_params;$_93a9cf_old_vars['_ecf0a4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ecf0a4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ecf0a4'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_93a9cf_old_params['_8af90c']=$_93a9cf_local_params;$_93a9cf_old_vars['_8af90c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_93a9cf_old_params['_4057ec']=$_93a9cf_local_params;$_93a9cf_old_vars['_4057ec']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4057ec'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4057ec'];?>

                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8af90c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8af90c'];?>

                <?php $_93a9cf_old_params['_752f6d']=$_93a9cf_local_params;$_93a9cf_old_vars['_752f6d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_93a9cf_old_params['_2abdcd']=$_93a9cf_local_params;$_93a9cf_old_vars['_2abdcd']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_044a62']=$_93a9cf_local_params;$_93a9cf_old_vars['_044a62']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_044a62'];$_93a9cf_local_vars=$_93a9cf_old_vars['_044a62'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2abdcd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2abdcd'];?>

                <?php $_93a9cf_old_params['_3ff96f']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ff96f']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3ff96f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ff96f'];?>
">
                  <?php $_93a9cf_old_params['_7b5cba']=$_93a9cf_local_params;$_93a9cf_old_vars['_7b5cba']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7b5cba'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7b5cba'];?>

                  <input <?php $_93a9cf_old_params['_bade50']=$_93a9cf_local_params;$_93a9cf_old_vars['_bade50']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bade50'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bade50'];?>
 <?php $_93a9cf_old_params['_25cba8']=$_93a9cf_local_params;$_93a9cf_old_vars['_25cba8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_25cba8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_25cba8'];?>
<?php $_93a9cf_old_params['_099269']=$_93a9cf_local_params;$_93a9cf_old_vars['_099269']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_099269'];$_93a9cf_local_vars=$_93a9cf_old_vars['_099269'];?>
<?php $_93a9cf_old_params['_fd6bfd']=$_93a9cf_local_params;$_93a9cf_old_vars['_fd6bfd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_6fb85c']=$_93a9cf_local_params;$_93a9cf_old_vars['_6fb85c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6fb85c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6fb85c'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fd6bfd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fd6bfd'];?>
<?php $_93a9cf_old_params['_228c3c']=$_93a9cf_local_params;$_93a9cf_old_vars['_228c3c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_228c3c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_228c3c'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_93a9cf_old_params['_7d1807']=$_93a9cf_local_params;$_93a9cf_old_vars['_7d1807']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7d1807'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7d1807'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_752f6d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_752f6d'];?>

            <?php $_93a9cf_old_params['_1364ff']=$_93a9cf_local_params;$_93a9cf_old_vars['_1364ff']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1364ff'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1364ff'];?>

            <?php endif;$c_87758f=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_87758f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_87758f'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_448562'];$_93a9cf_local_vars=$_93a9cf_old_vars['_448562'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ffce93'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ffce93'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_93a9cf_old_params['_3770f0']=$_93a9cf_local_params;$_93a9cf_old_vars['_3770f0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_f0dfe9=null;$_93a9cf_old_params['_f0dfe9']=$_93a9cf_local_params;$_93a9cf_old_vars['_f0dfe9']=$_93a9cf_local_vars;$a_f0dfe9=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_f0dfe9=-1;$r_f0dfe9=true;while($r_f0dfe9===true):$r_f0dfe9=($_f0dfe9!==-1)?false:true;echo $this->block_loop($a_f0dfe9,$c_f0dfe9,$this,$r_f0dfe9,++$_f0dfe9,'_f0dfe9');ob_start();?>
<?php $c_f0dfe9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f0dfe9=false;}if($c_f0dfe9 ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_93a9cf_old_params['_d4389d']=$_93a9cf_local_params;$_93a9cf_old_vars['_d4389d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d4389d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d4389d'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_f0dfe9=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_f0dfe9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f0dfe9'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_fda62c']=$_93a9cf_local_params;$_93a9cf_old_vars['_fda62c']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fda62c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fda62c'];?>
<?php $_93a9cf_old_params['_3b7f45']=$_93a9cf_local_params;$_93a9cf_old_vars['_3b7f45']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3b7f45'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3b7f45'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_c264d8']=$_93a9cf_local_params;$_93a9cf_old_vars['_c264d8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c264d8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c264d8'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_f7b848']=$_93a9cf_local_params;$_93a9cf_old_vars['_f7b848']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f7b848'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f7b848'];?>
 name="_user_search_type" value="3">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'AND','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Keyword','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-3">
                <input type="hidden" name="_user_keep_search" value="0">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" <?php $_93a9cf_old_params['_6e4587']=$_93a9cf_local_params;$_93a9cf_old_vars['_6e4587']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6e4587'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6e4587'];?>
 class="custom-control-input" name="_user_keep_search" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Keep Keyword','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Replace','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_609a54']=$_93a9cf_local_params;$_93a9cf_old_vars['_609a54']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_609a54'];$_93a9cf_local_vars=$_93a9cf_old_vars['_609a54'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_6d496d']=$_93a9cf_local_params;$_93a9cf_old_vars['_6d496d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6d496d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6d496d'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3770f0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3770f0'];?>

            <div class="row form-group">
              <?php $c_1b1bf3=null;$_93a9cf_old_params['_1b1bf3']=$_93a9cf_local_params;$_93a9cf_old_vars['_1b1bf3']=$_93a9cf_local_vars;$a_1b1bf3=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_1b1bf3=-1;$r_1b1bf3=true;while($r_1b1bf3===true):$r_1b1bf3=($_1b1bf3!==-1)?false:true;echo $this->block_loop($a_1b1bf3,$c_1b1bf3,$this,$r_1b1bf3,++$_1b1bf3,'_1b1bf3');ob_start();?>
<?php $c_1b1bf3 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1b1bf3=false;}if($c_1b1bf3 ):?>

              <?php $_93a9cf_old_params['_398784']=$_93a9cf_local_params;$_93a9cf_old_vars['_398784']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_398784'];$_93a9cf_local_vars=$_93a9cf_old_vars['_398784'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_22eb20']=$_93a9cf_local_params;$_93a9cf_old_vars['_22eb20']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_22eb20'];$_93a9cf_local_vars=$_93a9cf_old_vars['_22eb20'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_93a9cf_old_params['_3cb950']=$_93a9cf_local_params;$_93a9cf_old_vars['_3cb950']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_3d5eb4=null;$_93a9cf_old_params['_3d5eb4']=$_93a9cf_local_params;$_93a9cf_old_vars['_3d5eb4']=$_93a9cf_local_vars;$a_3d5eb4=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_3d5eb4=-1;$r_3d5eb4=true;while($r_3d5eb4===true):$r_3d5eb4=($_3d5eb4!==-1)?false:true;echo $this->block_loop($a_3d5eb4,$c_3d5eb4,$this,$r_3d5eb4,++$_3d5eb4,'_3d5eb4');ob_start();?>
<?php $c_3d5eb4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3d5eb4=false;}if($c_3d5eb4 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_93a9cf_old_params['_d30668']=$_93a9cf_local_params;$_93a9cf_old_vars['_d30668']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d30668'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d30668'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_3d5eb4=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_3d5eb4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3d5eb4'];?>

                </select>
              </div>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3cb950'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3cb950'];?>

              <?php endif;$c_1b1bf3=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_1b1bf3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1b1bf3'];?>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="reset-disp-option" class="btn btn-warning"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="submit" class="btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'list_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_139e0d']=$_93a9cf_local_params;$_93a9cf_old_vars['_139e0d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_139e0d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_139e0d'];?>

<?php $_93a9cf_old_params['_0c1d65']=$_93a9cf_local_params;$_93a9cf_old_vars['_0c1d65']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
});
$('.disp-option-item').change(function(){
    let checkdCnt = 0;
    $('.disp-option-item').each(function() {
        if ( $(this).prop( 'checked' ) ) {
            checkdCnt++;
        }
    });
    if ( <?php echo $this->function_var($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'var'],null,$this),$this)?>
 < checkdCnt ) {
      <?php $_93a9cf_old_params['_79e761']=$_93a9cf_local_params;$_93a9cf_old_vars['_79e761']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_79e761'];$_93a9cf_local_vars=$_93a9cf_old_vars['_79e761'];?>

    }
});
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0c1d65'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0c1d65'];?>

<?php endif;$_d0546e=ob_get_clean();echo $this->modifier_trim_space($_d0546e,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_93a9cf_local_params=$_93a9cf_old_params['_d0546e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d0546e'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_36bc75'];$_93a9cf_local_vars=$_93a9cf_old_vars['_36bc75'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1e5543'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1e5543'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_99d82e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_99d82e'];?>

    <?php $c_88a364=null;$_93a9cf_old_params['_88a364']=$_93a9cf_local_params;$_93a9cf_old_vars['_88a364']=$_93a9cf_local_vars;$a_88a364=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

      <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
    <?php $c_88a364=ob_get_clean();$c_88a364=$this->block_setvarblock($a_88a364,$c_88a364,$this,$r_88a364,1,'_88a364');echo($c_88a364); $_93a9cf_local_params=$_93a9cf_old_params['_88a364'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_93a9cf_old_params['_b0efe5']=$_93a9cf_local_params;$_93a9cf_old_vars['_b0efe5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_0e8e7b']=$_93a9cf_local_params;$_93a9cf_old_vars['_0e8e7b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div class="alert alert-danger" id="header-error-message" tabindex="0" role="alert">
        <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
      <script>
      $('#header-error-message').focus();
      </script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'error','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0e8e7b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0e8e7b'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b0efe5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b0efe5'];?>

<script>
$(function () {
    if (window.ontouchstart !== null) {
        $('[data-toggle="tooltip"]').tooltip();
    }
})
</script>
<?php echo $this->function_setvar($this->setup_args(['name'=>'sortable','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php else:?>

<?php $_93a9cf_old_params['_77ad5a']=$_93a9cf_local_params;$_93a9cf_old_vars['_77ad5a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_c5f5e7']=$_93a9cf_local_params;$_93a9cf_old_vars['_c5f5e7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_fix_spacebar','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c5f5e7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c5f5e7'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_77ad5a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_77ad5a'];?>

<!DOCTYPE html>
<html lang="<?php $_93a9cf_old_params['_099a53']=$_93a9cf_local_params;$_93a9cf_old_vars['_099a53']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_099a53'];$_93a9cf_local_vars=$_93a9cf_old_vars['_099a53'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_93a9cf_old_params['_4b2739']=$_93a9cf_local_params;$_93a9cf_old_vars['_4b2739']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4b2739'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4b2739'];?>
<?php $_93a9cf_old_params['_2150ba']=$_93a9cf_local_params;$_93a9cf_old_vars['_2150ba']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_f10ba6']=$_93a9cf_local_params;$_93a9cf_old_vars['_f10ba6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f10ba6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f10ba6'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2150ba'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2150ba'];?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'appname','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</title>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tether.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.cookie.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/clipboard.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/theme.min.css?v=<?php echo $this->function_var($this->setup_args(['name'=>'version','this_tag'=>'var'],null,$this),$this)?>
" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery.fileupload.css">
    <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','escape'=>'','setvar'=>'sys_barcolor','this_tag'=>'getoption'],null,$this),$this),ENT_QUOTES),$this->setup_args('sys_barcolor','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','escape'=>'','setvar'=>'sys_bartextcolor','this_tag'=>'getoption'],null,$this),$this),ENT_QUOTES),$this->setup_args('sys_bartextcolor','setvar',$this),$this,'setvar')?>

    <style type="text/css">
    <?php $_93a9cf_old_params['_d8044c']=$_93a9cf_local_params;$_93a9cf_old_vars['_d8044c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_ab15f7']=$_93a9cf_local_params;$_93a9cf_old_vars['_ab15f7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_dfe98f']=$_93a9cf_local_params;$_93a9cf_old_vars['_dfe98f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dfe98f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dfe98f'];?>

      <?php $_93a9cf_old_params['_539738']=$_93a9cf_local_params;$_93a9cf_old_vars['_539738']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_539738'];$_93a9cf_local_vars=$_93a9cf_old_vars['_539738'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ab15f7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ab15f7'];?>

      <?php $_93a9cf_old_params['_5decb9']=$_93a9cf_local_params;$_93a9cf_old_vars['_5decb9']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5decb9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5decb9'];?>

      <?php $_93a9cf_old_params['_215774']=$_93a9cf_local_params;$_93a9cf_old_vars['_215774']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_215774'];$_93a9cf_local_vars=$_93a9cf_old_vars['_215774'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1020; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d8044c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d8044c'];?>

      .fixed-top { z-index: 1030 !important; }
      .nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      .nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php $_93a9cf_old_params['_137bf4']=$_93a9cf_local_params;$_93a9cf_old_vars['_137bf4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_93a9cf_old_params['_fc5767']=$_93a9cf_local_params;$_93a9cf_old_vars['_fc5767']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar, .workspace-bar a,
      .workspace-bar .dropdown-menu{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar button.my-sm-0{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar .my-sm-0, .workspace-bar .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php endif;$_fc5767=ob_get_clean();echo paml_htmlspecialchars($_fc5767,ENT_QUOTES);$_93a9cf_local_params=$_93a9cf_old_params['_fc5767'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fc5767'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_137bf4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_137bf4'];?>

      <?php $_93a9cf_old_params['_5a4c16']=$_93a9cf_local_params;$_93a9cf_old_vars['_5a4c16']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5a4c16'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5a4c16'];?>

      <?php $_93a9cf_old_params['_fbb2fb']=$_93a9cf_local_params;$_93a9cf_old_vars['_fbb2fb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'panel_width','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.nav-link{ max-width: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'panel_width','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
px !important }<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fbb2fb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fbb2fb'];?>

      .navbar .btn { width:35px }
      <?php $_93a9cf_old_params['_0f1220']=$_93a9cf_local_params;$_93a9cf_old_vars['_0f1220']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'config','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0f1220'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0f1220'];?>

      <?php $_93a9cf_old_params['_e39ce8']=$_93a9cf_local_params;$_93a9cf_old_vars['_e39ce8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'in_editing','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      @media (min-width: 992px) {
      .col-lg-2{ max-width:13rem !important }
      .col-lg-10{ min-width: -webkit-calc(100% - 13rem); min-width: calc(100% - 13rem) } }
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e39ce8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e39ce8'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_3b592c']=$_93a9cf_local_params;$_93a9cf_old_vars['_3b592c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'invisible_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <style><?php echo $this->modifier_join($this->function_var($this->setup_args(['name'=>'invisible_selector','join'=>',','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','join',$this),$this,'join')?>
{display:none !important}</style>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3b592c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3b592c'];?>

    <?php $_93a9cf_old_params['_8f6eeb']=$_93a9cf_local_params;$_93a9cf_old_vars['_8f6eeb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<style><?php $_93a9cf_old_params['_b7c959']=$_93a9cf_local_params;$_93a9cf_old_vars['_b7c959']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
body { padding-top: 80px; } .workspace-bar { margin-top: 0;}
    <?php else:?>
.workspace-bar { margin-bottom: 14px;}<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b7c959'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b7c959'];?>
</style><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8f6eeb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8f6eeb'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_93a9cf_old_params['_0c0531']=$_93a9cf_local_params;$_93a9cf_old_vars['_0c0531']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0c0531'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0c0531'];?>

    <?php $_93a9cf_old_params['_878d09']=$_93a9cf_local_params;$_93a9cf_old_vars['_878d09']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_878d09'];$_93a9cf_local_vars=$_93a9cf_old_vars['_878d09'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_93a9cf_old_params['_f7555e']=$_93a9cf_local_params;$_93a9cf_old_vars['_f7555e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
jQuery.fn.extend({
  ksortable: function(options) {
    let self = this;
    self.sortable(options);
    $(self).children().attr('tabindex', 0);
    $(self).on('keydown', '> *', function(event) {
    // $('li', this).attr('tabindex', 0).bind('keydown', function(event) {
        if ( event.target && /^(input|textarea|select)$/.test( event.target.tagName.toLowerCase()) ) {
            return;
        }
        if(event.which == 37 || event.which == 38) { // left or up
          $(this).insertBefore($(this).prev());
        } 
        if(event.which == 39 || event.which == 40) { // right or down
          $(this).insertAfter($(this).next()); 
        }     
        if (event.which == 84 || event.which == 33) { // "t" or page-up
          $(this).parent().prepend($(this));
        } 
        if (event.which == 66 || event.which == 34) { // "b" or page-down
          $(this).parent().append($(this));
        } 
        if(event.which == 82) { // "r"
          var p = $(this).parent();
          p.children().each(function(){p.prepend($(this))})
        } 
        if(event.which == 83) { // "s"
          var p = $(this).parent();
          p.children().each(function(){
            if(Math.random()<.5)
              p.prepend($(this));
            else
              p.append($(this));
          })
        }
        var keyNums = [33, 34, 37, 38, 39, 40, 66, 82, 83, 84];
        var keyNum = event.which + 0;
        if (keyNums.indexOf(keyNum) >= 0){
          event.stopPropagation();
          $(this).focus();
          if ( $(this).hasClass("edit-options-child") ) {
            sort_fields();
          } else if ( $(this).hasClass("badge-relation") ) {
            editContentChanged = true;
          }
          $(self).sortable('refresh').sortable('refreshPositions');
          $(self).trigger('ksortupdate', this);
        }
    });
    return self;
  }
});
</script>
<?php $_93a9cf_old_params['_235ee0']=$_93a9cf_local_params;$_93a9cf_old_vars['_235ee0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_235ee0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_235ee0'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f7555e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f7555e'];?>

  <div id="main-content">
<?php $_93a9cf_old_params['_f81878']=$_93a9cf_local_params;$_93a9cf_old_vars['_f81878']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="fixed-top">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f81878'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f81878'];?>

  <?php $_93a9cf_old_params['_aec1c0']=$_93a9cf_local_params;$_93a9cf_old_vars['_aec1c0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_d4228d']=$_93a9cf_local_params;$_93a9cf_old_vars['_d4228d']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.__mode','match'=>'/^(?:login|logout)$/iu','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d4228d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d4228d'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_aec1c0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_aec1c0'];?>

  <?php $_93a9cf_old_params['_ee1d2e']=$_93a9cf_local_params;$_93a9cf_old_vars['_ee1d2e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ee1d2e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ee1d2e'];?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse nav-top<?php $_93a9cf_old_params['_cac555']=$_93a9cf_local_params;$_93a9cf_old_vars['_cac555']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 fixed-top<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cac555'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cac555'];?>
">
      <?php $_93a9cf_old_params['_50afaf']=$_93a9cf_local_params;$_93a9cf_old_vars['_50afaf']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_5deb96']=$_93a9cf_local_params;$_93a9cf_old_vars['_5deb96']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'install','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="navbar-brand brand-prototype" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
">PowerCMS X</a>
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5deb96'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5deb96'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_50afaf'];$_93a9cf_local_vars=$_93a9cf_old_vars['_50afaf'];?>

      <?php $_93a9cf_old_params['_1daaec']=$_93a9cf_local_params;$_93a9cf_old_vars['_1daaec']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; z-index:7" class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1daaec'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1daaec'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_93a9cf_old_params['_43ca18']=$_93a9cf_local_params;$_93a9cf_old_vars['_43ca18']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_f8a73d=null;$_93a9cf_old_params['_f8a73d']=$_93a9cf_local_params;$_93a9cf_old_vars['_f8a73d']=$_93a9cf_local_vars;$a_f8a73d=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_f8a73d=ob_get_clean();$c_f8a73d=$this->block_setvarblock($a_f8a73d,$c_f8a73d,$this,$r_f8a73d,1,'_f8a73d');echo($c_f8a73d); $_93a9cf_local_params=$_93a9cf_old_params['_f8a73d'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_43ca18'];$_93a9cf_local_vars=$_93a9cf_old_vars['_43ca18'];?>

      <?php $_93a9cf_old_params['_d68501']=$_93a9cf_local_params;$_93a9cf_old_vars['_d68501']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a class="navbar-brand"<?php $_93a9cf_old_params['_7ec1fe']=$_93a9cf_local_params;$_93a9cf_old_vars['_7ec1fe']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7ec1fe'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7ec1fe'];?>
 style="z-index:1"><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
<span id="navbar-brand-end"></span></a>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_93a9cf_old_params['_e13a5e']=$_93a9cf_local_params;$_93a9cf_old_vars['_e13a5e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_4ee7dd']=$_93a9cf_local_params;$_93a9cf_old_vars['_4ee7dd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'ws_selector_limit','setvar'=>'selector_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('selector_limit','setvar',$this),$this,'setvar')?>

        <?php $_93a9cf_old_params['_654d7f']=$_93a9cf_local_params;$_93a9cf_old_vars['_654d7f']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'16','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_654d7f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_654d7f'];?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','op'=>'+','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_93a9cf_old_params['_e43f0e']=$_93a9cf_local_params;$_93a9cf_old_vars['_e43f0e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e43f0e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e43f0e'];?>

        <?php $c_6f72d5=null;$_93a9cf_old_params['_6f72d5']=$_93a9cf_local_params;$_93a9cf_old_vars['_6f72d5']=$_93a9cf_local_vars;$a_6f72d5=$this->setup_args(['cols'=>'id,name,barcolor,bartextcolor','model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_6f72d5=-1;$r_6f72d5=true;while($r_6f72d5===true):$r_6f72d5=($_6f72d5!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_6f72d5,$c_6f72d5,$this,$r_6f72d5,++$_6f72d5,'_6f72d5');ob_start();?>
<?php $c_6f72d5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_6f72d5=false;}if($c_6f72d5 ):?>

        <?php $_93a9cf_old_params['_a31420']=$_93a9cf_local_params;$_93a9cf_old_vars['_a31420']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="hidden nav-item dropdown workspace-dd-wrapper active" id="workspace-selector" style="z-index:5">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cube workspace-dd" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a31420'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a31420'];?>

            <?php $_93a9cf_old_params['_02b59f']=$_93a9cf_local_params;$_93a9cf_old_vars['_02b59f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a<?php $_93a9cf_old_params['_57b99b']=$_93a9cf_local_params;$_93a9cf_old_vars['_57b99b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_color_the_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_e2c56a']=$_93a9cf_local_params;$_93a9cf_old_vars['_e2c56a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_09ea68']=$_93a9cf_local_params;$_93a9cf_old_vars['_09ea68']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="<?php $_93a9cf_old_params['_a7a848']=$_93a9cf_local_params;$_93a9cf_old_vars['_a7a848']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__last__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
margin-bottom:3px;<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a7a848'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a7a848'];?>
background-color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_09ea68'];$_93a9cf_local_vars=$_93a9cf_old_vars['_09ea68'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e2c56a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e2c56a'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_57b99b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_57b99b'];?>
 class="dropdown-item btn-sm <?php $_93a9cf_old_params['_5bafe3']=$_93a9cf_local_params;$_93a9cf_old_vars['_5bafe3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5bafe3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5bafe3'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?_selector=1&amp;<?php $_93a9cf_old_params['_8c88a8']=$_93a9cf_local_params;$_93a9cf_old_vars['_8c88a8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_eb4cc7']=$_93a9cf_local_params;$_93a9cf_old_vars['_eb4cc7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->modifier_replace($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]*/\',\'\'','replace'=>'\'does_act=1\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('\\\'does_act=1\\\',\\\'\\\'','replace',$this),$this,'replace'),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eb4cc7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eb4cc7'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8c88a8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8c88a8'];?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
              <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

            </a>
            <?php else:?>

            <a class="dropdown-item btn-sm" data-toggle="modal" data-target="#modal"
                data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</a>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_02b59f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_02b59f'];?>

        <?php $_93a9cf_old_params['_933f6a']=$_93a9cf_local_params;$_93a9cf_old_vars['_933f6a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'$__counter__','this_tag'=>'setvar'],null,$this),$this)?>

            </div>
          </div>
<script>
$(window).on('load resize', function(){
  $('#navbar-brand-end').css('display','inline-block');
  var brandOffset = $('#navbar-brand-end').offset();
  $('#workspace-selector').css('position','absolute');
  $('#workspace-selector').css('left',brandOffset.left + 8);
  $('#workspace-selector').css('top','1px');
  if ( $('#workspace-selector').is(':hidden') ) {
    $('#workspace-selector').show('fast');
  }
});
</script>
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_933f6a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_933f6a'];?>

        <?php endif;$c_6f72d5=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_6f72d5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6f72d5'];?>

      <div class="collapse navbar-collapse" id="navbars" <?php $_93a9cf_old_params['_bd6669']=$_93a9cf_local_params;$_93a9cf_old_vars['_bd6669']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bd6669'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bd6669'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel">
        <?php $c_278c6d=null;$_93a9cf_old_params['_278c6d']=$_93a9cf_local_params;$_93a9cf_old_vars['_278c6d']=$_93a9cf_local_vars;$a_278c6d=$this->setup_args(['menu_type'=>'6','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_278c6d=-1;$r_278c6d=true;while($r_278c6d===true):$r_278c6d=($_278c6d!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_278c6d,$c_278c6d,$this,$r_278c6d,++$_278c6d,'_278c6d');ob_start();?>
<?php $c_278c6d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_278c6d=false;}if($c_278c6d ):?>

          <?php $_93a9cf_old_params['_139c12']=$_93a9cf_local_params;$_93a9cf_old_vars['_139c12']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_139c12'];$_93a9cf_local_vars=$_93a9cf_old_vars['_139c12'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_ce3c83']=$_93a9cf_local_params;$_93a9cf_old_vars['_ce3c83']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ce3c83'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ce3c83'];?>

        <?php endif;$c_278c6d=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_278c6d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_278c6d'];?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'panel_limit','setvar'=>'panel_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('panel_limit','setvar',$this),$this,'setvar')?>

        <?php $c_605fd2=null;$_93a9cf_old_params['_605fd2']=$_93a9cf_local_params;$_93a9cf_old_vars['_605fd2']=$_93a9cf_local_vars;$a_605fd2=$this->setup_args(['limit'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_605fd2=-1;$r_605fd2=true;while($r_605fd2===true):$r_605fd2=($_605fd2!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_605fd2,$c_605fd2,$this,$r_605fd2,++$_605fd2,'_605fd2');ob_start();?>
<?php $c_605fd2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_605fd2=false;}if($c_605fd2 ):?>

          <li class="nav-item <?php $_93a9cf_old_params['_bf5f7a']=$_93a9cf_local_params;$_93a9cf_old_vars['_bf5f7a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bf5f7a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bf5f7a'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php $_93a9cf_old_params['_c74808']=$_93a9cf_local_params;$_93a9cf_old_vars['_c74808']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c74808'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c74808'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_605fd2=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_605fd2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_605fd2'];?>

        <?php $c_51990c=null;$_93a9cf_old_params['_51990c']=$_93a9cf_local_params;$_93a9cf_old_vars['_51990c']=$_93a9cf_local_vars;$a_51990c=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_51990c=-1;$r_51990c=true;while($r_51990c===true):$r_51990c=($_51990c!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_51990c,$c_51990c,$this,$r_51990c,++$_51990c,'_51990c');ob_start();?>
<?php $c_51990c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_51990c=false;}if($c_51990c ):?>

          <?php $_93a9cf_old_params['_3ab26a']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ab26a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3ab26a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ab26a'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_b35dd5']=$_93a9cf_local_params;$_93a9cf_old_vars['_b35dd5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b35dd5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b35dd5'];?>

        <?php endif;$c_51990c=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_51990c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_51990c'];?>

        <?php $c_b9e087=null;$_93a9cf_old_params['_b9e087']=$_93a9cf_local_params;$_93a9cf_old_vars['_b9e087']=$_93a9cf_local_vars;$a_b9e087=$this->setup_args(['menu_type'=>'2','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_b9e087=-1;$r_b9e087=true;while($r_b9e087===true):$r_b9e087=($_b9e087!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_b9e087,$c_b9e087,$this,$r_b9e087,++$_b9e087,'_b9e087');ob_start();?>
<?php $c_b9e087 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b9e087=false;}if($c_b9e087 ):?>

          <?php $_93a9cf_old_params['_b7a242']=$_93a9cf_local_params;$_93a9cf_old_vars['_b7a242']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b7a242'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b7a242'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_b91d1b']=$_93a9cf_local_params;$_93a9cf_old_vars['_b91d1b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b91d1b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b91d1b'];?>

        <?php endif;$c_b9e087=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_b9e087'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b9e087'];?>

        <?php $c_fa1a09=null;$_93a9cf_old_params['_fa1a09']=$_93a9cf_local_params;$_93a9cf_old_vars['_fa1a09']=$_93a9cf_local_vars;$a_fa1a09=$this->setup_args(['menu_type'=>'3','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_fa1a09=-1;$r_fa1a09=true;while($r_fa1a09===true):$r_fa1a09=($_fa1a09!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_fa1a09,$c_fa1a09,$this,$r_fa1a09,++$_fa1a09,'_fa1a09');ob_start();?>
<?php $c_fa1a09 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fa1a09=false;}if($c_fa1a09 ):?>

          <?php $_93a9cf_old_params['_b68eca']=$_93a9cf_local_params;$_93a9cf_old_vars['_b68eca']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b68eca'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b68eca'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_488171']=$_93a9cf_local_params;$_93a9cf_old_vars['_488171']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_488171'];$_93a9cf_local_vars=$_93a9cf_old_vars['_488171'];?>

        <?php endif;$c_fa1a09=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_fa1a09'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fa1a09'];?>

        <?php $c_47a29e=null;$_93a9cf_old_params['_47a29e']=$_93a9cf_local_params;$_93a9cf_old_vars['_47a29e']=$_93a9cf_local_vars;$a_47a29e=$this->setup_args(['menu_type'=>'4','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_47a29e=-1;$r_47a29e=true;while($r_47a29e===true):$r_47a29e=($_47a29e!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_47a29e,$c_47a29e,$this,$r_47a29e,++$_47a29e,'_47a29e');ob_start();?>
<?php $c_47a29e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_47a29e=false;}if($c_47a29e ):?>

          <?php $_93a9cf_old_params['_c1c3e2']=$_93a9cf_local_params;$_93a9cf_old_vars['_c1c3e2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c1c3e2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c1c3e2'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_99e7f1']=$_93a9cf_local_params;$_93a9cf_old_vars['_99e7f1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_99e7f1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_99e7f1'];?>

        <?php endif;$c_47a29e=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_47a29e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_47a29e'];?>

        <?php $c_f26e26=null;$_93a9cf_old_params['_f26e26']=$_93a9cf_local_params;$_93a9cf_old_vars['_f26e26']=$_93a9cf_local_vars;$a_f26e26=$this->setup_args(['menu_type'=>'5','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_f26e26=-1;$r_f26e26=true;while($r_f26e26===true):$r_f26e26=($_f26e26!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_f26e26,$c_f26e26,$this,$r_f26e26,++$_f26e26,'_f26e26');ob_start();?>
<?php $c_f26e26 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f26e26=false;}if($c_f26e26 ):?>

          <?php $_93a9cf_old_params['_ef4e8a']=$_93a9cf_local_params;$_93a9cf_old_vars['_ef4e8a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ef4e8a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ef4e8a'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_a07068']=$_93a9cf_local_params;$_93a9cf_old_vars['_a07068']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a07068'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a07068'];?>

        <?php endif;$c_f26e26=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_f26e26'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f26e26'];?>

        <?php $c_1455ee=null;$_93a9cf_old_params['_1455ee']=$_93a9cf_local_params;$_93a9cf_old_vars['_1455ee']=$_93a9cf_local_vars;$a_1455ee=$this->setup_args(['name'=>'system_menus','this_tag'=>'loop'],null,$this);$_1455ee=-1;$r_1455ee=true;while($r_1455ee===true):$r_1455ee=($_1455ee!==-1)?false:true;echo $this->block_loop($a_1455ee,$c_1455ee,$this,$r_1455ee,++$_1455ee,'_1455ee');ob_start();?>
<?php $c_1455ee = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1455ee=false;}if($c_1455ee ):?>

          <?php $_93a9cf_old_params['_770765']=$_93a9cf_local_params;$_93a9cf_old_vars['_770765']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <?php $_93a9cf_old_params['_373ee7']=$_93a9cf_local_params;$_93a9cf_old_vars['_373ee7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php elseif($this->conditional_elseif($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_373ee7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_373ee7'];?>

            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_770765'];$_93a9cf_local_vars=$_93a9cf_old_vars['_770765'];?>

            <a <?php $_93a9cf_old_params['_6867bc']=$_93a9cf_local_params;$_93a9cf_old_vars['_6867bc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6867bc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6867bc'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
<?php $c_6135e6=null;$_93a9cf_old_params['_6135e6']=$_93a9cf_local_params;$_93a9cf_old_vars['_6135e6']=$_93a9cf_local_vars;$a_6135e6=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_6135e6=-1;$r_6135e6=true;while($r_6135e6===true):$r_6135e6=($_6135e6!==-1)?false:true;echo $this->block_loop($a_6135e6,$c_6135e6,$this,$r_6135e6,++$_6135e6,'_6135e6');ob_start();?>
<?php $c_6135e6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_6135e6=false;}if($c_6135e6 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_6135e6=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_6135e6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6135e6'];?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_93a9cf_old_params['_786bf7']=$_93a9cf_local_params;$_93a9cf_old_vars['_786bf7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_mode','eq'=>'manage_scheme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_ff18f1']=$_93a9cf_local_params;$_93a9cf_old_vars['_ff18f1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ff18f1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ff18f1'];?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_mode','eq'=>'manage_plugins','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_30fda1']=$_93a9cf_local_params;$_93a9cf_old_vars['_30fda1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_30fda1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_30fda1'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_786bf7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_786bf7'];?>

            </a>
          <?php $_93a9cf_old_params['_fec298']=$_93a9cf_local_params;$_93a9cf_old_vars['_fec298']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fec298'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fec298'];?>

        <?php endif;$c_1455ee=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_1455ee'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1455ee'];?>

        </ul>
        <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_system','this_tag'=>'var'],null,$this),$this)?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'show_both','setvar'=>'__show_both','this_tag'=>'property'],null,$this),$this),$this->setup_args('__show_both','setvar',$this),$this,'setvar')?>

          <a href="<?php $_93a9cf_old_params['_8042a6']=$_93a9cf_local_params;$_93a9cf_old_vars['_8042a6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_db9558']=$_93a9cf_local_params;$_93a9cf_old_vars['_db9558']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_db9558'];$_93a9cf_local_vars=$_93a9cf_old_vars['_db9558'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8042a6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8042a6'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_93a9cf_old_params['_486e3d']=$_93a9cf_local_params;$_93a9cf_old_vars['_486e3d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_486e3d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_486e3d'];?>

        <?php $_93a9cf_old_params['_9ba656']=$_93a9cf_local_params;$_93a9cf_old_vars['_9ba656']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'0','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_1b8569=null;$_93a9cf_old_params['_1b8569']=$_93a9cf_local_params;$_93a9cf_old_vars['_1b8569']=$_93a9cf_local_vars;$a_1b8569=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'0','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_1b8569=-1;$r_1b8569=true;while($r_1b8569===true):$r_1b8569=($_1b8569!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_1b8569,$c_1b8569,$this,$r_1b8569,++$_1b8569,'_1b8569');ob_start();?>
<?php $c_1b8569 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1b8569=false;}if($c_1b8569 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_1b8569=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_1b8569'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1b8569'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9ba656'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9ba656'];?>

          <a style="padding:<?php $_93a9cf_old_params['_45c26f']=$_93a9cf_local_params;$_93a9cf_old_vars['_45c26f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
0 3px<?php else:?>
4px<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_45c26f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_45c26f'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_profile=1" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
          <?php $_93a9cf_old_params['_ad4f42']=$_93a9cf_local_params;$_93a9cf_old_vars['_ad4f42']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.lazyload.min.js"></script>
            <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" class="lazy" style="Border-radius:50%" data-original="<?php echo $this->function_var($this->setup_args(['name'=>'user_photo','this_tag'=>'var'],null,$this),$this)?>
" width="26" height="26" alt="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <script>$(function() { $('img.lazy').lazyload(); });</script>
          <?php else:?>

            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ad4f42'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ad4f42'];?>

          </a>
          <a id="__logout" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_93a9cf_old_params['_850dad']=$_93a9cf_local_params;$_93a9cf_old_vars['_850dad']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config" class="btn btn-sm btn-secondary my-2 my-sm-0 config-system" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_850dad'];$_93a9cf_local_vars=$_93a9cf_old_vars['_850dad'];?>

        </div>
      </div>
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4ee7dd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4ee7dd'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e13a5e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e13a5e'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d68501'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d68501'];?>

      <?php $_93a9cf_old_params['_76f7c3']=$_93a9cf_local_params;$_93a9cf_old_vars['_76f7c3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbars" <?php $_93a9cf_old_params['_3fa8e6']=$_93a9cf_local_params;$_93a9cf_old_vars['_3fa8e6']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3fa8e6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3fa8e6'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel"></ul>
          <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_workspace','this_tag'=>'var'],null,$this),$this)?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout<?php $_93a9cf_old_params['_2ec6dd']=$_93a9cf_local_params;$_93a9cf_old_vars['_2ec6dd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2ec6dd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2ec6dd'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=edit_profile<?php $_93a9cf_old_params['_a22e9d']=$_93a9cf_local_params;$_93a9cf_old_vars['_a22e9d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a22e9d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a22e9d'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          </div>
        </div>
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_76f7c3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_76f7c3'];?>

    </nav>
  <?php $_93a9cf_old_params['_9fc6ae']=$_93a9cf_local_params;$_93a9cf_old_vars['_9fc6ae']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_bc9e82']=$_93a9cf_local_params;$_93a9cf_old_vars['_bc9e82']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_53eef9']=$_93a9cf_local_params;$_93a9cf_old_vars['_53eef9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_628676']=$_93a9cf_local_params;$_93a9cf_old_vars['_628676']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar"<?php $_93a9cf_old_params['_8cbc31']=$_93a9cf_local_params;$_93a9cf_old_vars['_8cbc31']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 style="z-index:1029;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8cbc31'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8cbc31'];?>
>
      <?php $_93a9cf_old_params['_0dac48']=$_93a9cf_local_params;$_93a9cf_old_vars['_0dac48']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important;" class="navbar-toggler navbar-toggler-right btn-ws" type="button" data-toggle="collapse" data-target="#navbars-ws" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0dac48'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0dac48'];?>

      <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'workspace_name','count_chars'=>'','setvar'=>'workspace_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('workspace_chars','setvar',$this),$this,'setvar')?>
<a class="navbar-brand brand-workspace" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_93a9cf_old_params['_969277']=$_93a9cf_local_params;$_93a9cf_old_vars['_969277']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_969277'];$_93a9cf_local_vars=$_93a9cf_old_vars['_969277'];?>
><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
</a>
      <div class="collapse navbar-collapse" id="navbars-ws">
        <ul class="nav-pills navbar-nav mr-auto">
          <?php $c_65fb3d=null;$_93a9cf_old_params['_65fb3d']=$_93a9cf_local_params;$_93a9cf_old_vars['_65fb3d']=$_93a9cf_local_vars;$a_65fb3d=$this->setup_args(['type'=>'display_space','menu_type'=>'6','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_65fb3d=-1;$r_65fb3d=true;while($r_65fb3d===true):$r_65fb3d=($_65fb3d!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_65fb3d,$c_65fb3d,$this,$r_65fb3d,++$_65fb3d,'_65fb3d');ob_start();?>
<?php $c_65fb3d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_65fb3d=false;}if($c_65fb3d ):?>

            <?php $_93a9cf_old_params['_a514fd']=$_93a9cf_local_params;$_93a9cf_old_vars['_a514fd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <li class="nav-item dropdown">
              <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
                <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </a>
              <div class="dropdown-menu">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a514fd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a514fd'];?>

              <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_85bbce']=$_93a9cf_local_params;$_93a9cf_old_vars['_85bbce']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_85bbce'];$_93a9cf_local_vars=$_93a9cf_old_vars['_85bbce'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
            <?php $_93a9cf_old_params['_ae731c']=$_93a9cf_local_params;$_93a9cf_old_vars['_ae731c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              </li>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ae731c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ae731c'];?>

          <?php endif;$c_65fb3d=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_65fb3d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_65fb3d'];?>

        <?php $c_dc370c=null;$_93a9cf_old_params['_dc370c']=$_93a9cf_local_params;$_93a9cf_old_vars['_dc370c']=$_93a9cf_local_vars;$a_dc370c=$this->setup_args(['limit'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_dc370c=-1;$r_dc370c=true;while($r_dc370c===true):$r_dc370c=($_dc370c!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_dc370c,$c_dc370c,$this,$r_dc370c,++$_dc370c,'_dc370c');ob_start();?>
<?php $c_dc370c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_dc370c=false;}if($c_dc370c ):?>

          <li class="nav-item nav-item-ws <?php $_93a9cf_old_params['_16c911']=$_93a9cf_local_params;$_93a9cf_old_vars['_16c911']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_16c911'];$_93a9cf_local_vars=$_93a9cf_old_vars['_16c911'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_c1ca0c']=$_93a9cf_local_params;$_93a9cf_old_vars['_c1ca0c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c1ca0c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c1ca0c'];?>
"<?php $_93a9cf_old_params['_d99aa0']=$_93a9cf_local_params;$_93a9cf_old_vars['_d99aa0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d99aa0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d99aa0'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_dc370c=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_dc370c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dc370c'];?>

        <?php $c_4869f8=null;$_93a9cf_old_params['_4869f8']=$_93a9cf_local_params;$_93a9cf_old_vars['_4869f8']=$_93a9cf_local_vars;$a_4869f8=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_4869f8=-1;$r_4869f8=true;while($r_4869f8===true):$r_4869f8=($_4869f8!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_4869f8,$c_4869f8,$this,$r_4869f8,++$_4869f8,'_4869f8');ob_start();?>
<?php $c_4869f8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4869f8=false;}if($c_4869f8 ):?>

          <?php $_93a9cf_old_params['_86f7bc']=$_93a9cf_local_params;$_93a9cf_old_vars['_86f7bc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_86f7bc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_86f7bc'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_b91275']=$_93a9cf_local_params;$_93a9cf_old_vars['_b91275']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b91275'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b91275'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_fbdea1']=$_93a9cf_local_params;$_93a9cf_old_vars['_fbdea1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fbdea1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fbdea1'];?>

        <?php endif;$c_4869f8=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_4869f8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4869f8'];?>

        <?php $c_5e3cfc=null;$_93a9cf_old_params['_5e3cfc']=$_93a9cf_local_params;$_93a9cf_old_vars['_5e3cfc']=$_93a9cf_local_vars;$a_5e3cfc=$this->setup_args(['type'=>'display_space','menu_type'=>'2','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_5e3cfc=-1;$r_5e3cfc=true;while($r_5e3cfc===true):$r_5e3cfc=($_5e3cfc!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_5e3cfc,$c_5e3cfc,$this,$r_5e3cfc,++$_5e3cfc,'_5e3cfc');ob_start();?>
<?php $c_5e3cfc = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5e3cfc=false;}if($c_5e3cfc ):?>

          <?php $_93a9cf_old_params['_5343cf']=$_93a9cf_local_params;$_93a9cf_old_vars['_5343cf']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5343cf'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5343cf'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_b31587']=$_93a9cf_local_params;$_93a9cf_old_vars['_b31587']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b31587'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b31587'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_7818b7']=$_93a9cf_local_params;$_93a9cf_old_vars['_7818b7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7818b7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7818b7'];?>

        <?php endif;$c_5e3cfc=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_5e3cfc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5e3cfc'];?>

        <?php $c_16ea5e=null;$_93a9cf_old_params['_16ea5e']=$_93a9cf_local_params;$_93a9cf_old_vars['_16ea5e']=$_93a9cf_local_vars;$a_16ea5e=$this->setup_args(['type'=>'display_space','menu_type'=>'3','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_16ea5e=-1;$r_16ea5e=true;while($r_16ea5e===true):$r_16ea5e=($_16ea5e!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_16ea5e,$c_16ea5e,$this,$r_16ea5e,++$_16ea5e,'_16ea5e');ob_start();?>
<?php $c_16ea5e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_16ea5e=false;}if($c_16ea5e ):?>

          <?php $_93a9cf_old_params['_0959ff']=$_93a9cf_local_params;$_93a9cf_old_vars['_0959ff']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0959ff'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0959ff'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_9c6e3f']=$_93a9cf_local_params;$_93a9cf_old_vars['_9c6e3f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9c6e3f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9c6e3f'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_e90517']=$_93a9cf_local_params;$_93a9cf_old_vars['_e90517']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e90517'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e90517'];?>

        <?php endif;$c_16ea5e=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_16ea5e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_16ea5e'];?>

        <?php $c_ff8699=null;$_93a9cf_old_params['_ff8699']=$_93a9cf_local_params;$_93a9cf_old_vars['_ff8699']=$_93a9cf_local_vars;$a_ff8699=$this->setup_args(['type'=>'display_space','menu_type'=>'4','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_ff8699=-1;$r_ff8699=true;while($r_ff8699===true):$r_ff8699=($_ff8699!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_ff8699,$c_ff8699,$this,$r_ff8699,++$_ff8699,'_ff8699');ob_start();?>
<?php $c_ff8699 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ff8699=false;}if($c_ff8699 ):?>

          <?php $_93a9cf_old_params['_b3fe44']=$_93a9cf_local_params;$_93a9cf_old_vars['_b3fe44']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b3fe44'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b3fe44'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_8ffa62']=$_93a9cf_local_params;$_93a9cf_old_vars['_8ffa62']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8ffa62'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8ffa62'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_98b9c5']=$_93a9cf_local_params;$_93a9cf_old_vars['_98b9c5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_98b9c5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_98b9c5'];?>

        <?php endif;$c_ff8699=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_ff8699'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ff8699'];?>

        <?php $c_f13e43=null;$_93a9cf_old_params['_f13e43']=$_93a9cf_local_params;$_93a9cf_old_vars['_f13e43']=$_93a9cf_local_vars;$a_f13e43=$this->setup_args(['type'=>'display_space','menu_type'=>'5','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_f13e43=-1;$r_f13e43=true;while($r_f13e43===true):$r_f13e43=($_f13e43!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_f13e43,$c_f13e43,$this,$r_f13e43,++$_f13e43,'_f13e43');ob_start();?>
<?php $c_f13e43 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f13e43=false;}if($c_f13e43 ):?>

          <?php $_93a9cf_old_params['_a0114a']=$_93a9cf_local_params;$_93a9cf_old_vars['_a0114a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a0114a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a0114a'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_467fc5']=$_93a9cf_local_params;$_93a9cf_old_vars['_467fc5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_467fc5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_467fc5'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_93a9cf_old_params['_46c8a7']=$_93a9cf_local_params;$_93a9cf_old_vars['_46c8a7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_46c8a7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_46c8a7'];?>

        <?php endif;$c_f13e43=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_f13e43'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f13e43'];?>

        <?php $c_3ebec9=null;$_93a9cf_old_params['_3ebec9']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ebec9']=$_93a9cf_local_vars;$a_3ebec9=$this->setup_args(['name'=>'workspace_menus','this_tag'=>'loop'],null,$this);$_3ebec9=-1;$r_3ebec9=true;while($r_3ebec9===true):$r_3ebec9=($_3ebec9!==-1)?false:true;echo $this->block_loop($a_3ebec9,$c_3ebec9,$this,$r_3ebec9,++$_3ebec9,'_3ebec9');ob_start();?>
<?php $c_3ebec9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3ebec9=false;}if($c_3ebec9 ):?>

          <?php $_93a9cf_old_params['_d07cca']=$_93a9cf_local_params;$_93a9cf_old_vars['_d07cca']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d07cca'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d07cca'];?>

            <a <?php $_93a9cf_old_params['_c50916']=$_93a9cf_local_params;$_93a9cf_old_vars['_c50916']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c50916'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c50916'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_eadc13=null;$_93a9cf_old_params['_eadc13']=$_93a9cf_local_params;$_93a9cf_old_vars['_eadc13']=$_93a9cf_local_vars;$a_eadc13=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_eadc13=-1;$r_eadc13=true;while($r_eadc13===true):$r_eadc13=($_eadc13!==-1)?false:true;echo $this->block_loop($a_eadc13,$c_eadc13,$this,$r_eadc13,++$_eadc13,'_eadc13');ob_start();?>
<?php $c_eadc13 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_eadc13=false;}if($c_eadc13 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_eadc13=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_eadc13'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eadc13'];?>
"><?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>
</a>
          <?php $_93a9cf_old_params['_44de36']=$_93a9cf_local_params;$_93a9cf_old_vars['_44de36']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_44de36'];$_93a9cf_local_vars=$_93a9cf_old_vars['_44de36'];?>

        <?php endif;$c_3ebec9=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_3ebec9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ebec9'];?>

        </ul>
        <div class="header-util">
          <a href="<?php $_93a9cf_old_params['_cba6fc']=$_93a9cf_local_params;$_93a9cf_old_vars['_cba6fc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_358d6b']=$_93a9cf_local_params;$_93a9cf_old_vars['_358d6b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_358d6b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_358d6b'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cba6fc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cba6fc'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_93a9cf_old_params['_7af90c']=$_93a9cf_local_params;$_93a9cf_old_vars['_7af90c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_d459f2']=$_93a9cf_local_params;$_93a9cf_old_vars['_d459f2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d459f2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d459f2'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7af90c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7af90c'];?>

        <?php $_93a9cf_old_params['_1d3187']=$_93a9cf_local_params;$_93a9cf_old_vars['_1d3187']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_f4efbd=null;$_93a9cf_old_params['_f4efbd']=$_93a9cf_local_params;$_93a9cf_old_vars['_f4efbd']=$_93a9cf_local_vars;$a_f4efbd=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'$workspace_id','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_f4efbd=-1;$r_f4efbd=true;while($r_f4efbd===true):$r_f4efbd=($_f4efbd!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_f4efbd,$c_f4efbd,$this,$r_f4efbd,++$_f4efbd,'_f4efbd');ob_start();?>
<?php $c_f4efbd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f4efbd=false;}if($c_f4efbd ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_f4efbd=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_f4efbd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f4efbd'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1d3187'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1d3187'];?>

        <?php $_93a9cf_old_params['_e323f2']=$_93a9cf_local_params;$_93a9cf_old_vars['_e323f2']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'workspace','id'=>'$workspace_id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 config-workspace" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e323f2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e323f2'];?>

        </div>
      </div>
    </nav>
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_628676'];$_93a9cf_local_vars=$_93a9cf_old_vars['_628676'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_53eef9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_53eef9'];?>

<?php $_93a9cf_old_params['_eab5ed']=$_93a9cf_local_params;$_93a9cf_old_vars['_eab5ed']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </div>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eab5ed'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eab5ed'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_9f6ea2']=$_93a9cf_local_params;$_93a9cf_old_vars['_9f6ea2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_3ffa67']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ffa67']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3ffa67'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ffa67'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9f6ea2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9f6ea2'];?>

    <?php $_93a9cf_old_params['_5e5750']=$_93a9cf_local_params;$_93a9cf_old_vars['_5e5750']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5e5750'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5e5750'];?>

    <?php $_93a9cf_old_params['_645ea7']=$_93a9cf_local_params;$_93a9cf_old_vars['_645ea7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_fcb59b']=$_93a9cf_local_params;$_93a9cf_old_vars['_fcb59b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fcb59b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fcb59b'];?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_645ea7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_645ea7'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'output_container','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <div class="container-fluid">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_42dbac']=$_93a9cf_local_params;$_93a9cf_old_vars['_42dbac']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_f236ce']=$_93a9cf_local_params;$_93a9cf_old_vars['_f236ce']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_c055d9']=$_93a9cf_local_params;$_93a9cf_old_vars['_c055d9']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_34d82a']=$_93a9cf_local_params;$_93a9cf_old_vars['_34d82a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'time_step','setvar'=>'time_step','this_tag'=>'property'],null,$this),$this),$this->setup_args('time_step','setvar',$this),$this,'setvar')?>

      <div class="modal fade" id="filterOptions" tabindex="-1" role="dialog" aria-labelledby="listFiltersTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="listFiltersTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form id="list_filter_form" action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
            <input type="hidden" name="__mode" value="view" id="this_mode">
            <input type="hidden" name="_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_type" value="list">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter_id" id="_filter_id" value="">
            <input type="hidden" name="_save_filter_name" id="_save_filter_name" value="">
            <input type="hidden" name="_detach_filter" id="_detach_filter" value="">
            <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
            <input type="hidden" name="_system_filters_option" value="" id="_system_filters_option">
            <?php $_93a9cf_old_params['_c8b037']=$_93a9cf_local_params;$_93a9cf_old_vars['_c8b037']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c8b037'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c8b037'];?>

            <?php $_93a9cf_old_params['_a06b18']=$_93a9cf_local_params;$_93a9cf_old_vars['_a06b18']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a06b18'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a06b18'];?>

          <?php $_93a9cf_old_params['_133474']=$_93a9cf_local_params;$_93a9cf_old_vars['_133474']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_133474'];$_93a9cf_local_vars=$_93a9cf_old_vars['_133474'];?>

          <?php $_93a9cf_old_params['_bfa245']=$_93a9cf_local_params;$_93a9cf_old_vars['_bfa245']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bfa245'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bfa245'];?>

          <?php $_93a9cf_old_params['_837d7e']=$_93a9cf_local_params;$_93a9cf_old_vars['_837d7e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_93a9cf_old_params['_ba584d']=$_93a9cf_local_params;$_93a9cf_old_vars['_ba584d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ba584d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ba584d'];?>

          <?php $_93a9cf_old_params['_23cf11']=$_93a9cf_local_params;$_93a9cf_old_vars['_23cf11']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_system_filters" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_system_filters_option" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert_editor" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_23cf11'];$_93a9cf_local_vars=$_93a9cf_old_vars['_23cf11'];?>

            <?php $_93a9cf_old_params['_e81c6a']=$_93a9cf_local_params;$_93a9cf_old_vars['_e81c6a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e81c6a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e81c6a'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_837d7e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_837d7e'];?>

          <?php $_93a9cf_old_params['_924e28']=$_93a9cf_local_params;$_93a9cf_old_vars['_924e28']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_924e28'];$_93a9cf_local_vars=$_93a9cf_old_vars['_924e28'];?>

          <?php $_93a9cf_old_params['_a4142b']=$_93a9cf_local_params;$_93a9cf_old_vars['_a4142b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_93a9cf_old_params['_e8f419']=$_93a9cf_local_params;$_93a9cf_old_vars['_e8f419']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e8f419'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e8f419'];?>

          <?php $_93a9cf_old_params['_7eb0a2']=$_93a9cf_local_params;$_93a9cf_old_vars['_7eb0a2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7eb0a2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7eb0a2'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a4142b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a4142b'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_93a9cf_old_params['_6a1883']=$_93a9cf_local_params;$_93a9cf_old_vars['_6a1883']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_5f6ff1=null;$_93a9cf_old_params['_5f6ff1']=$_93a9cf_local_params;$_93a9cf_old_vars['_5f6ff1']=$_93a9cf_local_vars;$a_5f6ff1=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_5f6ff1=-1;$r_5f6ff1=true;while($r_5f6ff1===true):$r_5f6ff1=($_5f6ff1!==-1)?false:true;echo $this->block_loop($a_5f6ff1,$c_5f6ff1,$this,$r_5f6ff1,++$_5f6ff1,'_5f6ff1');ob_start();?>
<?php $c_5f6ff1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5f6ff1=false;}if($c_5f6ff1 ):?>

                      <?php $_93a9cf_old_params['_956f10']=$_93a9cf_local_params;$_93a9cf_old_vars['_956f10']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_956f10'];$_93a9cf_local_vars=$_93a9cf_old_vars['_956f10'];?>

                        <option <?php $_93a9cf_old_params['_1d916e']=$_93a9cf_local_params;$_93a9cf_old_vars['_1d916e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1d916e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1d916e'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_93a9cf_old_params['_51c130']=$_93a9cf_local_params;$_93a9cf_old_vars['_51c130']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_51c130'];$_93a9cf_local_vars=$_93a9cf_old_vars['_51c130'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_93a9cf_old_params['_5bfd60']=$_93a9cf_local_params;$_93a9cf_old_vars['_5bfd60']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5bfd60'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5bfd60'];?>

                    <?php endif;$c_5f6ff1=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_5f6ff1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5f6ff1'];?>

                  </div>
                </div>
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6a1883'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6a1883'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_577435=null;$_93a9cf_old_params['_577435']=$_93a9cf_local_params;$_93a9cf_old_vars['_577435']=$_93a9cf_local_vars;$a_577435=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_577435=-1;$r_577435=true;while($r_577435===true):$r_577435=($_577435!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_577435,$c_577435,$this,$r_577435,++$_577435,'_577435');ob_start();?>
<?php $c_577435 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_577435=false;}if($c_577435 ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_93a9cf_old_params['_f12c0a']=$_93a9cf_local_params;$_93a9cf_old_vars['_f12c0a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f12c0a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f12c0a'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_577435=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_577435'];$_93a9cf_local_vars=$_93a9cf_old_vars['_577435'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_93a9cf_old_params['_7324a5']=$_93a9cf_local_params;$_93a9cf_old_vars['_7324a5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7324a5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7324a5'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_47a193=null;$_93a9cf_old_params['_47a193']=$_93a9cf_local_params;$_93a9cf_old_vars['_47a193']=$_93a9cf_local_vars;$a_47a193=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_47a193=-1;$r_47a193=true;while($r_47a193===true):$r_47a193=($_47a193!==-1)?false:true;echo $this->block_loop($a_47a193,$c_47a193,$this,$r_47a193,++$_47a193,'_47a193');ob_start();?>
<?php $c_47a193 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_47a193=false;}if($c_47a193 ):?>

                    <?php $_93a9cf_old_params['_a29339']=$_93a9cf_local_params;$_93a9cf_old_vars['_a29339']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a29339'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a29339'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_93a9cf_old_params['_ea4f5f']=$_93a9cf_local_params;$_93a9cf_old_vars['_ea4f5f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ea4f5f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ea4f5f'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_47a193=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_47a193'];$_93a9cf_local_vars=$_93a9cf_old_vars['_47a193'];?>

                    </select>
                   <button type="button" class="btn btn-sm btn-secondary filter-selecter-ctrl-apply" id="filter-add-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</button>
                  </div>
                </div>
                <div class="row form-group new-filter-elem">
                  <div class="col-md-12">
                    <div class="card hidden" id="filter-parant-block">
                      <ul class="list-group list-group-flush" id="filters-list">
                        <li class="list-group-item hidden" id="selector-tmpl-int">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="number" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Grater than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ge"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Greater Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="le"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-text">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="text" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="ct"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="nc"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="bw"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Begin with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ew"><?php echo $this->function_trans($this->setup_args(['phrase'=>'End with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-date">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'published_on_default','setvar'=>'published_on_default','this_tag'=>'property'],null,$this),$this),$this->setup_args('published_on_default','setvar',$this),$this,'setvar')?>

                              <input type="datetime-local" step="<?php $_93a9cf_old_params['_5d6f9e']=$_93a9cf_local_params;$_93a9cf_old_vars['_5d6f9e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5d6f9e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5d6f9e'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_93a9cf_old_params['_464862']=$_93a9cf_local_params;$_93a9cf_old_vars['_464862']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_464862'];$_93a9cf_local_vars=$_93a9cf_old_vars['_464862'];?>
">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Newer than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Older than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-status">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                            <?php $_93a9cf_old_params['_19b25f']=$_93a9cf_local_params;$_93a9cf_old_vars['_19b25f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_93a9cf_old_params['_ed3dde']=$_93a9cf_local_params;$_93a9cf_old_vars['_ed3dde']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ed3dde'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ed3dde'];?>

                            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_19b25f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_19b25f'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_93a9cf_old_params['_733aed']=$_93a9cf_local_params;$_93a9cf_old_vars['_733aed']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_4f2189=null;$_93a9cf_old_params['_4f2189']=$_93a9cf_local_params;$_93a9cf_old_vars['_4f2189']=$_93a9cf_local_vars;$a_4f2189=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_4f2189=-1;$r_4f2189=true;while($r_4f2189===true):$r_4f2189=($_4f2189!==-1)?false:true;echo $this->block_loop($a_4f2189,$c_4f2189,$this,$r_4f2189,++$_4f2189,'_4f2189');ob_start();?>
<?php $c_4f2189 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4f2189=false;}if($c_4f2189 ):?>

                              <?php $_93a9cf_old_params['_62f008']=$_93a9cf_local_params;$_93a9cf_old_vars['_62f008']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_93a9cf_old_params['_19035d']=$_93a9cf_local_params;$_93a9cf_old_vars['_19035d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_19035d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_19035d'];?>

                              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_62f008'];$_93a9cf_local_vars=$_93a9cf_old_vars['_62f008'];?>

                            <?php endif;$c_4f2189=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_4f2189'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4f2189'];?>

                            <?php else:?>

                            <?php $c_13d593=null;$_93a9cf_old_params['_13d593']=$_93a9cf_local_params;$_93a9cf_old_vars['_13d593']=$_93a9cf_local_vars;$a_13d593=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_13d593=-1;$r_13d593=true;while($r_13d593===true):$r_13d593=($_13d593!==-1)?false:true;echo $this->block_loop($a_13d593,$c_13d593,$this,$r_13d593,++$_13d593,'_13d593');ob_start();?>
<?php $c_13d593 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_13d593=false;}if($c_13d593 ):?>

                              <?php $_93a9cf_old_params['_3ff477']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ff477']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3ff477'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ff477'];?>

                            <?php endif;$c_13d593=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_13d593'];$_93a9cf_local_vars=$_93a9cf_old_vars['_13d593'];?>

                            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_733aed'];$_93a9cf_local_vars=$_93a9cf_old_vars['_733aed'];?>

                            </select>
                            <input type="hidden" name="" value="eq">
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary delete-filter-elem hidden" id="detach-filter-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach Filter','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-secondary new-filter-elem hidden" id="filter-save-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save and Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
<script>
$('#system_filter-apply-button').click(function(){
    if (! $('[name=select_system_filters] option:selected').val() ) {
        if ( filter_itemCount ) {
            return $('#filter-apply').trigger('click');
        }
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    let input = $('[name=select_system_filters] option:selected').data( 'input' );
    let hint = $('[name=select_system_filters] option:selected').data( 'hint' );
    let filter_option = $('[name=select_system_filters] option:selected').attr('data-option');
    if ( input ) {
        if (! hint ) {
            hint = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the value.','this_tag'=>'trans'],null,$this),$this)?>
';
        }
        filter_option = prompt( hint, filter_option );
        if (! filter_option ) {
            return false;
        }
    }
    $('#select-user_filters').val('');
    $('#_system_filters_option').val( filter_option );
});
$('#filter-select-delete-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove selected filter?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $('#_filter_id').val( filter_id );
    $('#this_mode').val( 'delete_filter' );
    $('[name=select-user_filters] option:selected').remove();
    var str = $("#list_filter_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter has successfully deleted.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-danger");
            $("#header-alert").addClass("alert-success");
        } else {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while removing the Filter.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-success");
            $("#header-alert").addClass("alert-danger");
        }
        $("#header-alert").show();
        setTimeout(focus_header_dialog, 500);
        $(".current-filter").hide();
        $('#this_mode').val( 'list' );
        $('#_filter_id').val('');
        $('#filter-select-delete-button').hide();
        var loc = $(location).attr('href');
        if ( loc.indexOf('?') == -1 ) {
            loc = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php $_93a9cf_old_params['_0fc7ac']=$_93a9cf_local_params;$_93a9cf_old_vars['_0fc7ac']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0fc7ac'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0fc7ac'];?>

            loc += '&_detach_filter=1';
            location.href = loc;
        } else {
            loc += '&_detach_filter=1';
            location.href = loc;
        }
    },
    "json"
    );
});
function focus_header_dialog () {
    $("#header-alert").focus();
}
$('#filter-select-apply-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#select_system_filters').val('');
    $('#_filter_id').val( filter_id );
    return true;
});
$('#select-user_filters').change(function(){
    if ($(this).val() == 'add_new_filter' ) {
        $('.new-filter-elem').show();
        $('.delete-filter-elem').hide();
    } else {
        $('.new-filter-elem').hide();
        if ( $(this).val() ) {
            $('.delete-filter-elem').show();
        }
    }
});
var curr_user_filter = $('#select-user_filters').val();
if ( curr_user_filter != 'add_new_filter' && curr_user_filter != '' ) {
    $('.delete-filter-elem').show();
}
var filter_itemCount = 0;
$('#filter-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
});
$('#filter-save-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    var filter_name = prompt('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the Name of this Filter.','this_tag'=>'trans'],null,$this),$this)?>
', '');
    if (! filter_name ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter Name is required.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#_save_filter_name').val(filter_name);
});
$('#detach-filter-button').click(function(){
    $('#filters-list').remove();
    $('#_detach_filter').val(1);
});
$('#filter-add-button').click(function(){
    var selected_col = $('#filters-selector').val();
    var sel_class = $('[name=filters-selector] option:selected').attr('class');
    var sel_label = $('[name=filters-selector] option:selected').text();
    sel_class = sel_class.replace( 'coltype_', '' );
    var filter_tmpl = $('#selector-tmpl-text');
    if ( selected_col == 'status' ) {
        filter_tmpl = $('#selector-tmpl-status');
    } else if ( sel_class == 'int' || sel_class == 'tinyint' || sel_class == 'double' || sel_class.indexOf('decimal') == 0 ) {
        filter_tmpl = $('#selector-tmpl-int');
    } else if ( sel_class == 'datetime' ) {
        filter_tmpl = $('#selector-tmpl-date');
    }
    var addSelecter = filter_tmpl.clone( true ).appendTo('#filters-list');
    addSelecter.removeClass('hidden');
    addSelecter.removeAttr('id');
    addSelecter.children('div').children('span').html(sel_label);
    if ( selected_col == 'status' ) {
        addSelecter.children('div').children('input').attr('name', '_filter_cond_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_value_' + selected_col + '[]');
    } else {
        addSelecter.children('div').children('input').attr('name', '_filter_value_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_cond_' + selected_col + '[]');
    }
    $('#filter-parant-block').show();
    $('#filter-parant-block').css('border','none');
    addSelecter.show();
    filter_itemCount++;
});
$('.detach-filter').click(function(){
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove this filter condition?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $(this).parent().parent().remove();
    filter_itemCount--;
});
</script>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_34d82a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_34d82a'];?>

          <?php $_93a9cf_old_params['_27ffcd']=$_93a9cf_local_params;$_93a9cf_old_vars['_27ffcd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_93a9cf_old_params['_f4f8d4']=$_93a9cf_local_params;$_93a9cf_old_vars['_f4f8d4']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
    <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="dispOptionsTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dispOptionsTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="list">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
      <?php $_93a9cf_old_params['_f1cc1d']=$_93a9cf_local_params;$_93a9cf_old_vars['_f1cc1d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f1cc1d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f1cc1d'];?>

      <?php $_93a9cf_old_params['_db3999']=$_93a9cf_local_params;$_93a9cf_old_vars['_db3999']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_db3999'];$_93a9cf_local_vars=$_93a9cf_old_vars['_db3999'];?>

      <?php $_93a9cf_old_params['_3693f8']=$_93a9cf_local_params;$_93a9cf_old_vars['_3693f8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_93a9cf_old_params['_570965']=$_93a9cf_local_params;$_93a9cf_old_vars['_570965']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_570965'];$_93a9cf_local_vars=$_93a9cf_old_vars['_570965'];?>

          <?php $_93a9cf_old_params['_cbd43b']=$_93a9cf_local_params;$_93a9cf_old_vars['_cbd43b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cbd43b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cbd43b'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_93a9cf_old_params['_8d9bec']=$_93a9cf_local_params;$_93a9cf_old_vars['_8d9bec']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8d9bec'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8d9bec'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3693f8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3693f8'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_93a9cf_old_params['_91ca1b']=$_93a9cf_local_params;$_93a9cf_old_vars['_91ca1b']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_e1297b']=$_93a9cf_local_params;$_93a9cf_old_vars['_e1297b']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_205334=null;$_93a9cf_old_params['_205334']=$_93a9cf_local_params;$_93a9cf_old_vars['_205334']=$_93a9cf_local_vars;$a_205334=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_205334=-1;$r_205334=true;while($r_205334===true):$r_205334=($_205334!==-1)?false:true;echo $this->block_loop($a_205334,$c_205334,$this,$r_205334,++$_205334,'_205334');ob_start();?>
<?php $c_205334 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_205334=false;}if($c_205334 ):?>

            <?php $_93a9cf_old_params['_2842e0']=$_93a9cf_local_params;$_93a9cf_old_vars['_2842e0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2842e0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2842e0'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_93a9cf_old_params['_c42e15']=$_93a9cf_local_params;$_93a9cf_old_vars['_c42e15']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_93a9cf_old_params['_dab5ac']=$_93a9cf_local_params;$_93a9cf_old_vars['_dab5ac']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dab5ac'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dab5ac'];?>

                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c42e15'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c42e15'];?>

                <?php $_93a9cf_old_params['_1b1832']=$_93a9cf_local_params;$_93a9cf_old_vars['_1b1832']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_93a9cf_old_params['_0a2289']=$_93a9cf_local_params;$_93a9cf_old_vars['_0a2289']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_1305f8']=$_93a9cf_local_params;$_93a9cf_old_vars['_1305f8']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1305f8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1305f8'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0a2289'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0a2289'];?>

                <?php $_93a9cf_old_params['_cf6cc9']=$_93a9cf_local_params;$_93a9cf_old_vars['_cf6cc9']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cf6cc9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cf6cc9'];?>
">
                  <?php $_93a9cf_old_params['_65ddf9']=$_93a9cf_local_params;$_93a9cf_old_vars['_65ddf9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_65ddf9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_65ddf9'];?>

                  <input <?php $_93a9cf_old_params['_7502bc']=$_93a9cf_local_params;$_93a9cf_old_vars['_7502bc']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7502bc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7502bc'];?>
 <?php $_93a9cf_old_params['_09be8c']=$_93a9cf_local_params;$_93a9cf_old_vars['_09be8c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_09be8c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_09be8c'];?>
<?php $_93a9cf_old_params['_3ccb5b']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ccb5b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3ccb5b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ccb5b'];?>
<?php $_93a9cf_old_params['_ee67d8']=$_93a9cf_local_params;$_93a9cf_old_vars['_ee67d8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_894651']=$_93a9cf_local_params;$_93a9cf_old_vars['_894651']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_894651'];$_93a9cf_local_vars=$_93a9cf_old_vars['_894651'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ee67d8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ee67d8'];?>
<?php $_93a9cf_old_params['_978be4']=$_93a9cf_local_params;$_93a9cf_old_vars['_978be4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_978be4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_978be4'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_93a9cf_old_params['_79f90e']=$_93a9cf_local_params;$_93a9cf_old_vars['_79f90e']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_79f90e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_79f90e'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1b1832'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1b1832'];?>

            <?php $_93a9cf_old_params['_cb09af']=$_93a9cf_local_params;$_93a9cf_old_vars['_cb09af']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cb09af'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cb09af'];?>

            <?php endif;$c_205334=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_205334'];$_93a9cf_local_vars=$_93a9cf_old_vars['_205334'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e1297b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e1297b'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_91ca1b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_91ca1b'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_93a9cf_old_params['_ca4a82']=$_93a9cf_local_params;$_93a9cf_old_vars['_ca4a82']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_eb290f=null;$_93a9cf_old_params['_eb290f']=$_93a9cf_local_params;$_93a9cf_old_vars['_eb290f']=$_93a9cf_local_vars;$a_eb290f=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_eb290f=-1;$r_eb290f=true;while($r_eb290f===true):$r_eb290f=($_eb290f!==-1)?false:true;echo $this->block_loop($a_eb290f,$c_eb290f,$this,$r_eb290f,++$_eb290f,'_eb290f');ob_start();?>
<?php $c_eb290f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_eb290f=false;}if($c_eb290f ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_93a9cf_old_params['_39446d']=$_93a9cf_local_params;$_93a9cf_old_vars['_39446d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_39446d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_39446d'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_eb290f=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_eb290f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eb290f'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_fafe63']=$_93a9cf_local_params;$_93a9cf_old_vars['_fafe63']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fafe63'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fafe63'];?>
<?php $_93a9cf_old_params['_4def9d']=$_93a9cf_local_params;$_93a9cf_old_vars['_4def9d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4def9d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4def9d'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_efee9d']=$_93a9cf_local_params;$_93a9cf_old_vars['_efee9d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_efee9d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_efee9d'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_b5bfe7']=$_93a9cf_local_params;$_93a9cf_old_vars['_b5bfe7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b5bfe7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b5bfe7'];?>
 name="_user_search_type" value="3">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'AND','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Keyword','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-3">
                <input type="hidden" name="_user_keep_search" value="0">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" <?php $_93a9cf_old_params['_1d0fa8']=$_93a9cf_local_params;$_93a9cf_old_vars['_1d0fa8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1d0fa8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1d0fa8'];?>
 class="custom-control-input" name="_user_keep_search" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Keep Keyword','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Replace','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_83b736']=$_93a9cf_local_params;$_93a9cf_old_vars['_83b736']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_83b736'];$_93a9cf_local_vars=$_93a9cf_old_vars['_83b736'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_a874da']=$_93a9cf_local_params;$_93a9cf_old_vars['_a874da']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a874da'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a874da'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ca4a82'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ca4a82'];?>

            <div class="row form-group">
              <?php $c_5bc067=null;$_93a9cf_old_params['_5bc067']=$_93a9cf_local_params;$_93a9cf_old_vars['_5bc067']=$_93a9cf_local_vars;$a_5bc067=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_5bc067=-1;$r_5bc067=true;while($r_5bc067===true):$r_5bc067=($_5bc067!==-1)?false:true;echo $this->block_loop($a_5bc067,$c_5bc067,$this,$r_5bc067,++$_5bc067,'_5bc067');ob_start();?>
<?php $c_5bc067 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5bc067=false;}if($c_5bc067 ):?>

              <?php $_93a9cf_old_params['_68a896']=$_93a9cf_local_params;$_93a9cf_old_vars['_68a896']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_68a896'];$_93a9cf_local_vars=$_93a9cf_old_vars['_68a896'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_93a9cf_old_params['_17ddd5']=$_93a9cf_local_params;$_93a9cf_old_vars['_17ddd5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_17ddd5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_17ddd5'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_93a9cf_old_params['_d62a9d']=$_93a9cf_local_params;$_93a9cf_old_vars['_d62a9d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_a8f423=null;$_93a9cf_old_params['_a8f423']=$_93a9cf_local_params;$_93a9cf_old_vars['_a8f423']=$_93a9cf_local_vars;$a_a8f423=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_a8f423=-1;$r_a8f423=true;while($r_a8f423===true):$r_a8f423=($_a8f423!==-1)?false:true;echo $this->block_loop($a_a8f423,$c_a8f423,$this,$r_a8f423,++$_a8f423,'_a8f423');ob_start();?>
<?php $c_a8f423 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a8f423=false;}if($c_a8f423 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_93a9cf_old_params['_c8dd54']=$_93a9cf_local_params;$_93a9cf_old_vars['_c8dd54']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c8dd54'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c8dd54'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_a8f423=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_a8f423'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a8f423'];?>

                </select>
              </div>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d62a9d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d62a9d'];?>

              <?php endif;$c_5bc067=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_5bc067'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5bc067'];?>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="reset-disp-option" class="btn btn-warning"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="submit" class="btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'list_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_59ea78']=$_93a9cf_local_params;$_93a9cf_old_vars['_59ea78']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_59ea78'];$_93a9cf_local_vars=$_93a9cf_old_vars['_59ea78'];?>

<?php $_93a9cf_old_params['_025b08']=$_93a9cf_local_params;$_93a9cf_old_vars['_025b08']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
});
$('.disp-option-item').change(function(){
    let checkdCnt = 0;
    $('.disp-option-item').each(function() {
        if ( $(this).prop( 'checked' ) ) {
            checkdCnt++;
        }
    });
    if ( <?php echo $this->function_var($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'var'],null,$this),$this)?>
 < checkdCnt ) {
      <?php $_93a9cf_old_params['_b95339']=$_93a9cf_local_params;$_93a9cf_old_vars['_b95339']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b95339'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b95339'];?>

    }
});
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_025b08'];$_93a9cf_local_vars=$_93a9cf_old_vars['_025b08'];?>

<?php endif;$_f4f8d4=ob_get_clean();echo $this->modifier_trim_space($_f4f8d4,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_93a9cf_local_params=$_93a9cf_old_params['_f4f8d4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f4f8d4'];?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_27ffcd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_27ffcd'];?>

            <?php $_93a9cf_old_params['_7f4fd7']=$_93a9cf_local_params;$_93a9cf_old_vars['_7f4fd7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <div class="modal fade" id="startUpload" tabindex="-1" role="dialog" aria-labelledby="startUploadTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="startUploadTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-success hidden" id="clear-history-alert" role="alert" tabindex="0">
              <button onclick="$('#clear-history-alert').hide();" type="button" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
              <?php echo $this->function_trans($this->setup_args(['phrase'=>'The upload path history has been cleared successfully.','this_tag'=>'trans'],null,$this),$this)?>

            </div>
              <div class="container-fluid" id="drop-zone">
                <form>
                <span id="file-chooser" class="btn btn-success fileinput-button">
                    <span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select File...','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple
                        onfocus="$('#file-chooser').css('border','2px solid green');"
                        onblur="$('#file-chooser').css('border','none');">
                </span>
              <?php $_93a9cf_old_params['_77db70']=$_93a9cf_local_params;$_93a9cf_old_vars['_77db70']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <label class="custom-control custom-checkbox" style="margin-top: 10px;margin-left: 7px">
                  <input type="checkbox" class="custom-control-input"
                    id="asset_overwrite" name="overwrite" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Overwrite files with the same path','this_tag'=>'trans'],null,$this),$this)?>

                </label>
                <script>
                $('#asset_overwrite').change(function(){
                    if ($(this).prop('checked')) {
                        $(this).val('1');
                    } else {
                        $(this).val('0');
                    }
                });
                </script>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_77db70'];$_93a9cf_local_vars=$_93a9cf_old_vars['_77db70'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_93a9cf_old_params['_730201']=$_93a9cf_local_params;$_93a9cf_old_vars['_730201']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_730201'];$_93a9cf_local_vars=$_93a9cf_old_vars['_730201'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_93a9cf_old_params['_e10f0f']=$_93a9cf_local_params;$_93a9cf_old_vars['_e10f0f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_fad245=null;$_93a9cf_old_params['_fad245']=$_93a9cf_local_params;$_93a9cf_old_vars['_fad245']=$_93a9cf_local_vars;$a_fad245=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_fad245=-1;$r_fad245=true;while($r_fad245===true):$r_fad245=($_fad245!==-1)?false:true;echo $this->block_loop($a_fad245,$c_fad245,$this,$r_fad245,++$_fad245,'_fad245');ob_start();?>
<?php $c_fad245 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fad245=false;}if($c_fad245 ):?>

                    <?php $_93a9cf_old_params['_638b3c']=$_93a9cf_local_params;$_93a9cf_old_vars['_638b3c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_638b3c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_638b3c'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_93a9cf_old_params['_8eb704']=$_93a9cf_local_params;$_93a9cf_old_vars['_8eb704']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8eb704'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8eb704'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_93a9cf_old_params['_1e87e1']=$_93a9cf_local_params;$_93a9cf_old_vars['_1e87e1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1e87e1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1e87e1'];?>

                  <?php endif;$c_fad245=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_fad245'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fad245'];?>

                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e10f0f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e10f0f'];?>

                </div>
                <!-- The container for the uploaded files -->
                <div id="files" class="files"></div>
                </form>
              </div>
              <!-- The global progress bar -->
              <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary upload-cancel-button" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Next','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </div>
        </div>
      </div>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="assets/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="assets/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&deleted=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&deleted=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_f336d0']=$_93a9cf_local_params;$_93a9cf_old_vars['_f336d0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f336d0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f336d0'];?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}does_act=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}does_act=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}apply_actions=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}apply_actions=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}background_proccess_running=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}background_proccess_running=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}html_background_proccess=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}html_background_proccess=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&+/\',\'&\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&+/\\\',\\\'&\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/^&+/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^&+/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<script src="assets/js/jquery.fileupload.js"></script>
<script>
$('#upload_path').change(function(){
    $('#extra_path').val( $(this).val() );
});
$('#clear-upload_path').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to delete the upload path history?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", {
        '__mode' : 'clear_extra_paths',
        'workspace_id' : '<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
',
        'magic_token': '<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
'
    },
    function ( data ) {
        if( data.result == true ) {
            $('#upload_paths-box').hide( 300 );
            $('#clear-history-alert').show();
            $('#clear-history-alert').focus();
        } else {
            alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while clearing upload path history.','this_tag'=>'trans'],null,$this),$this)?>
");
        }
    },
    "json"
    );
    return false;
});
$('#toggle-upload_path').click(function(){
    $('#upload_path-wrapper').toggle();
    if ( $(this).html() == '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' ) {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Hide','this_tag'=>'trans'],null,$this),$this)?>
' );
        $('#upload_path-wrapper').css('display', 'inline');
    } else {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' );
    }
    return false;
});
var this_url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?<?php $_93a9cf_old_params['_c3e9c2']=$_93a9cf_local_params;$_93a9cf_old_vars['_c3e9c2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c3e9c2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c3e9c2'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'_query_string','this_tag'=>'var'],null,$this),$this)?>
&sort=id&direction=desc';
var selected_ids = [];
var upload_count = 0;
var receive_count = 0;
var DropZone = document.getElementById('drop-zone');
DropZone.addEventListener('dragover', function (event) {
    $('#drop-zone').css('background-color','#ddf');
});
DropZone.addEventListener('dragleave', function (event) {
    $('#drop-zone').css('background-color','#fff');
});
$('#drop-zone').css('border','3px dashed <?php $_93a9cf_old_params['_dcac37']=$_93a9cf_local_params;$_93a9cf_old_vars['_dcac37']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dcac37'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dcac37'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_93a9cf_old_params['_a63ca1']=$_93a9cf_local_params;$_93a9cf_old_vars['_a63ca1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a63ca1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a63ca1'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_93a9cf_old_params['_8847f6']=$_93a9cf_local_params;$_93a9cf_old_vars['_8847f6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8847f6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8847f6'];?>
};
            data.submit();
            upload_count++;
            $("#drop-zone").hide( 'slow' );
            $('.upload-cancel-button').hide( 'slow' );
        },
        done: function (e, data) {
            $('#clear-history-alert').hide();
            if (!data.result.files) {
                var error = data.result.message;
                $('#progress .progress-bar').css(
                    'width', 0
                );
                alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while uploading.','this_tag'=>'trans'],null,$this),$this)?>
"+' (' + error + ')');
                upload_count = 0;
                receive_count = 0;
                selected_ids = [];
                return;
            }
            $("input[name='id[]']").each(function(){
                if ( $(this).prop('checked') ) {
                    if( $.inArray($(this).val(), selected_ids ) == -1 ) {
                        selected_ids.push($(this).val());
                    }
                }
            });
            $.each(data.result.files, function (index, file) {
                // $('<p/>').text(file.name).appendTo('#files');
                var input_cb = $('#select_ids_tmpl');
                var new_input = input_cb.clone( true ).appendTo('#list-select-form');
                new_input.removeAttr('id');
                new_input.attr('name','id[]');
                new_input.val(file.asset_id);
                selected_ids.push(file.asset_id);
                receive_count++;
                //if ( upload_count == receive_count ) {
                setTimeout(uploaded_hdlr, 1000);
                //}
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            $('#drop-zone').css('background-color','#fff');
            $("#drop-zone").show( 'slow' );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
function uploaded_hdlr () {
    this_url += '&selected_ids=' + selected_ids.join(',');
    <?php $_93a9cf_old_params['_9f5afb']=$_93a9cf_local_params;$_93a9cf_old_vars['_9f5afb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9f5afb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9f5afb'];?>

}
</script>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7f4fd7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7f4fd7'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c055d9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c055d9'];?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_1d3da5']=$_93a9cf_local_params;$_93a9cf_old_vars['_1d3da5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_93a9cf_old_params['_ea259a']=$_93a9cf_local_params;$_93a9cf_old_vars['_ea259a']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
      <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="LongTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Display Options','setvar'=>'options_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('options_title','setvar',$this),$this,'setvar')?>

          <h5 class="modal-title" id="LongTitle"><?php echo $this->function_var($this->setup_args(['name'=>'options_title','this_tag'=>'var'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="disp_options_form">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="edit">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" id="_field_sort_order" name="field_sort_order" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_field_sort_order','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php $_93a9cf_old_params['_01e801']=$_93a9cf_local_params;$_93a9cf_old_vars['_01e801']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_01e801'];$_93a9cf_local_vars=$_93a9cf_old_vars['_01e801'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_93a9cf_old_params['_a4f3a2']=$_93a9cf_local_params;$_93a9cf_old_vars['_a4f3a2']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_afa739=null;$_93a9cf_old_params['_afa739']=$_93a9cf_local_params;$_93a9cf_old_vars['_afa739']=$_93a9cf_local_vars;$a_afa739=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_afa739=-1;$r_afa739=true;while($r_afa739===true):$r_afa739=($_afa739!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_afa739,$c_afa739,$this,$r_afa739,++$_afa739,'_afa739');ob_start();?>
<?php $c_afa739 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_afa739=false;}if($c_afa739 ):?>

              <?php $_93a9cf_old_params['_603715']=$_93a9cf_local_params;$_93a9cf_old_vars['_603715']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_93a9cf_old_params['_ee30cd']=$_93a9cf_local_params;$_93a9cf_old_vars['_ee30cd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_93a9cf_old_params['_936130']=$_93a9cf_local_params;$_93a9cf_old_vars['_936130']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_93a9cf_old_params['_47675c']=$_93a9cf_local_params;$_93a9cf_old_vars['_47675c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_93a9cf_old_params['_488d14']=$_93a9cf_local_params;$_93a9cf_old_vars['_488d14']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_488d14'];$_93a9cf_local_vars=$_93a9cf_old_vars['_488d14'];?>

                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_47675c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_47675c'];?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_936130'];$_93a9cf_local_vars=$_93a9cf_old_vars['_936130'];?>

                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ee30cd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ee30cd'];?>

                <?php $_93a9cf_old_params['_d0a395']=$_93a9cf_local_params;$_93a9cf_old_vars['_d0a395']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_93a9cf_old_params['_c4a5d9']=$_93a9cf_local_params;$_93a9cf_old_vars['_c4a5d9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c4a5d9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c4a5d9'];?>

                  <?php $_93a9cf_old_params['_b5edb0']=$_93a9cf_local_params;$_93a9cf_old_vars['_b5edb0']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b5edb0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b5edb0'];?>

                  <label class="edit-options-child <?php $_93a9cf_old_params['_2c015b']=$_93a9cf_local_params;$_93a9cf_old_vars['_2c015b']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2c015b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2c015b'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_93a9cf_old_params['_c310d5']=$_93a9cf_local_params;$_93a9cf_old_vars['_c310d5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c310d5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c310d5'];?>

                    <input<?php $_93a9cf_old_params['_1903f7']=$_93a9cf_local_params;$_93a9cf_old_vars['_1903f7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_93a9cf_old_params['_670986']=$_93a9cf_local_params;$_93a9cf_old_vars['_670986']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_93a9cf_old_params['_d21f67']=$_93a9cf_local_params;$_93a9cf_old_vars['_d21f67']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d21f67'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d21f67'];?>

                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_670986'];$_93a9cf_local_vars=$_93a9cf_old_vars['_670986'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1903f7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1903f7'];?>
<?php $_93a9cf_old_params['_a6d1cf']=$_93a9cf_local_params;$_93a9cf_old_vars['_a6d1cf']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a6d1cf'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a6d1cf'];?>
 type="<?php $_93a9cf_old_params['_2b2255']=$_93a9cf_local_params;$_93a9cf_old_vars['_2b2255']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2b2255'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2b2255'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_93a9cf_old_params['_af0988']=$_93a9cf_local_params;$_93a9cf_old_vars['_af0988']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_af0988'];$_93a9cf_local_vars=$_93a9cf_old_vars['_af0988'];?>
<?php $_93a9cf_old_params['_9fc030']=$_93a9cf_local_params;$_93a9cf_old_vars['_9fc030']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9fc030'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9fc030'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d0a395'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d0a395'];?>

              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_603715'];$_93a9cf_local_vars=$_93a9cf_old_vars['_603715'];?>

            <?php endif;$c_afa739=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_afa739'];$_93a9cf_local_vars=$_93a9cf_old_vars['_afa739'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a4f3a2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a4f3a2'];?>

                <?php $c_90f1c3=null;$_93a9cf_old_params['_90f1c3']=$_93a9cf_local_params;$_93a9cf_old_vars['_90f1c3']=$_93a9cf_local_vars;$a_90f1c3=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_90f1c3=-1;$r_90f1c3=true;while($r_90f1c3===true):$r_90f1c3=($_90f1c3!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_90f1c3,$c_90f1c3,$this,$r_90f1c3,++$_90f1c3,'_90f1c3');ob_start();?>
<?php $c_90f1c3 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_90f1c3=false;}if($c_90f1c3 ):?>

                <?php $c_23ff58=null;$_93a9cf_old_params['_23ff58']=$_93a9cf_local_params;$_93a9cf_old_vars['_23ff58']=$_93a9cf_local_vars;$a_23ff58=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_23ff58=ob_get_clean();$c_23ff58=$this->block_setvarblock($a_23ff58,$c_23ff58,$this,$r_23ff58,1,'_23ff58');echo($c_23ff58); $_93a9cf_local_params=$_93a9cf_old_params['_23ff58'];?>

                <label class="<?php $_93a9cf_old_params['_e541ee']=$_93a9cf_local_params;$_93a9cf_old_vars['_e541ee']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e541ee'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e541ee'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_93a9cf_old_params['_bd6acf']=$_93a9cf_local_params;$_93a9cf_old_vars['_bd6acf']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bd6acf'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bd6acf'];?>

                  <?php $_93a9cf_old_params['_c42a58']=$_93a9cf_local_params;$_93a9cf_old_vars['_c42a58']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c42a58'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c42a58'];?>

                  <?php $_93a9cf_old_params['_eb784d']=$_93a9cf_local_params;$_93a9cf_old_vars['_eb784d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eb784d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eb784d'];?>
 <?php $_93a9cf_old_params['_b9ff96']=$_93a9cf_local_params;$_93a9cf_old_vars['_b9ff96']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b9ff96'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b9ff96'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_93a9cf_old_params['_ce604b']=$_93a9cf_local_params;$_93a9cf_old_vars['_ce604b']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ce604b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ce604b'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_90f1c3=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_90f1c3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_90f1c3'];?>

              <?php $_93a9cf_old_params['_2a5b12']=$_93a9cf_local_params;$_93a9cf_old_vars['_2a5b12']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2a5b12'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2a5b12'];?>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="reset-disp-option" class="btn btn-warning" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" id="disp_options_save" class="btn btn-primary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php endif;$_ea259a=ob_get_clean();echo $this->modifier_trim_space($_ea259a,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_93a9cf_local_params=$_93a9cf_old_params['_ea259a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ea259a'];?>

<script>
<?php $_93a9cf_old_params['_4e1a4f']=$_93a9cf_local_params;$_93a9cf_old_vars['_4e1a4f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4e1a4f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4e1a4f'];?>

function sort_fields(){
    var editor_data = [];
    if(tinymce && tinymce.editors){
        for(var i = tinymce.editors.length -1; i >= 0; i--){
            var ed = tinymce.editors[i];
            editor_data.push({
                target  : ed.targetElm,
                setting : ed.settings
            });
        }
    }
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        var field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
        $('#' + field_name + '-wrapper' ).find('');
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    for(var i = 0; i < editor_data.length; i++){
        tinyMCE.execCommand('mceAddEditor', false, editor_data[i].target);
    }
    reorder_fields();
}
function reorder_fields(){
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        let field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    var oldTextFormat = null;
    if ( $('#text_format-select').length ){
        oldTextFormat = $('#text_format-select').val();
    }
    if( tinymce && ( oldTextFormat == null || oldTextFormat == 'richtext' ) ){
        tinymce.EditorManager.remove();
        editorInit();
    }
    $(document).trigger('pcmsx.reorder_fields_done');
}
$("#disp_options_save").click(function(){
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options saved successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while saving %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        $('#_reset-disp-oprions').val('');
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options reset successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_trans($this->setup_args(['phrase'=>'Changes will be reflected the next time you open the screen.','this_tag'=>'trans'],null,$this),$this)?>
", 'warning');
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while resetting %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$(".disp_option").change(function(){
    let colname = $(this).prop("id");
    let wrapper_name = "#" + colname + 'wrapper';
    let option_name = "." + colname + 'option';
    let wrapper = $(wrapper_name);
    let option  = $(option_name);
    if($(this).prop("checked")) {
        wrapper.show("fade");
        option.show();
    } else {
        wrapper.hide("fade");
        option.hide();
    }
    let richtext = wrapper.find('textarea.richtext');
    if ( richtext.length && $(this).prop('checked') ) {
<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_27c6b7']=$_93a9cf_local_params;$_93a9cf_old_vars['_27c6b7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        let editor4 = $('.mce-edit-area iframe');
        if ( editor4.length ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            editor4.css( 'height', editor_height + 'px' );
        }
<?php else:?>

        if ( richtext.next().attr('role') == 'application' ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            richtext.next().css( 'height', editor_height + 'px' );
        }
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_27c6b7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_27c6b7'];?>

    }
    updateFieldSelector();
});
</script>
            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1d3da5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1d3da5'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f236ce'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f236ce'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_42dbac'];$_93a9cf_local_vars=$_93a9cf_old_vars['_42dbac'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bc9e82'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bc9e82'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9fc6ae'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9fc6ae'];?>

  <?php $_93a9cf_old_params['_b07f96']=$_93a9cf_local_params;$_93a9cf_old_vars['_b07f96']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    
    <?php $_93a9cf_old_params['_6eb72c']=$_93a9cf_local_params;$_93a9cf_old_vars['_6eb72c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php ob_start();$_93a9cf_old_params['_b825bc']=$_93a9cf_local_params;$_93a9cf_old_vars['_b825bc']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
      <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="LongTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Display Options','setvar'=>'options_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('options_title','setvar',$this),$this,'setvar')?>

          <h5 class="modal-title" id="LongTitle"><?php echo $this->function_var($this->setup_args(['name'=>'options_title','this_tag'=>'var'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="disp_options_form">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="edit">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" id="_field_sort_order" name="field_sort_order" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_field_sort_order','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php $_93a9cf_old_params['_30d9a0']=$_93a9cf_local_params;$_93a9cf_old_vars['_30d9a0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_30d9a0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_30d9a0'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_93a9cf_old_params['_5793df']=$_93a9cf_local_params;$_93a9cf_old_vars['_5793df']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_693109=null;$_93a9cf_old_params['_693109']=$_93a9cf_local_params;$_93a9cf_old_vars['_693109']=$_93a9cf_local_vars;$a_693109=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_693109=-1;$r_693109=true;while($r_693109===true):$r_693109=($_693109!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_693109,$c_693109,$this,$r_693109,++$_693109,'_693109');ob_start();?>
<?php $c_693109 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_693109=false;}if($c_693109 ):?>

              <?php $_93a9cf_old_params['_287c86']=$_93a9cf_local_params;$_93a9cf_old_vars['_287c86']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_93a9cf_old_params['_32c596']=$_93a9cf_local_params;$_93a9cf_old_vars['_32c596']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_93a9cf_old_params['_db31bd']=$_93a9cf_local_params;$_93a9cf_old_vars['_db31bd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_93a9cf_old_params['_86a0c7']=$_93a9cf_local_params;$_93a9cf_old_vars['_86a0c7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_93a9cf_old_params['_f0cc31']=$_93a9cf_local_params;$_93a9cf_old_vars['_f0cc31']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f0cc31'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f0cc31'];?>

                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_86a0c7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_86a0c7'];?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_db31bd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_db31bd'];?>

                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_32c596'];$_93a9cf_local_vars=$_93a9cf_old_vars['_32c596'];?>

                <?php $_93a9cf_old_params['_a9f57f']=$_93a9cf_local_params;$_93a9cf_old_vars['_a9f57f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_93a9cf_old_params['_a1fe1a']=$_93a9cf_local_params;$_93a9cf_old_vars['_a1fe1a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a1fe1a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a1fe1a'];?>

                  <?php $_93a9cf_old_params['_c4c6f2']=$_93a9cf_local_params;$_93a9cf_old_vars['_c4c6f2']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c4c6f2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c4c6f2'];?>

                  <label class="edit-options-child <?php $_93a9cf_old_params['_41ea3e']=$_93a9cf_local_params;$_93a9cf_old_vars['_41ea3e']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_41ea3e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_41ea3e'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_93a9cf_old_params['_46a309']=$_93a9cf_local_params;$_93a9cf_old_vars['_46a309']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_46a309'];$_93a9cf_local_vars=$_93a9cf_old_vars['_46a309'];?>

                    <input<?php $_93a9cf_old_params['_a63d94']=$_93a9cf_local_params;$_93a9cf_old_vars['_a63d94']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_93a9cf_old_params['_5b1df4']=$_93a9cf_local_params;$_93a9cf_old_vars['_5b1df4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_93a9cf_old_params['_ec66b0']=$_93a9cf_local_params;$_93a9cf_old_vars['_ec66b0']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ec66b0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ec66b0'];?>

                    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5b1df4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5b1df4'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a63d94'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a63d94'];?>
<?php $_93a9cf_old_params['_c88361']=$_93a9cf_local_params;$_93a9cf_old_vars['_c88361']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c88361'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c88361'];?>
 type="<?php $_93a9cf_old_params['_805a33']=$_93a9cf_local_params;$_93a9cf_old_vars['_805a33']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_805a33'];$_93a9cf_local_vars=$_93a9cf_old_vars['_805a33'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_93a9cf_old_params['_806eab']=$_93a9cf_local_params;$_93a9cf_old_vars['_806eab']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_806eab'];$_93a9cf_local_vars=$_93a9cf_old_vars['_806eab'];?>
<?php $_93a9cf_old_params['_d160b4']=$_93a9cf_local_params;$_93a9cf_old_vars['_d160b4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d160b4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d160b4'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a9f57f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a9f57f'];?>

              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_287c86'];$_93a9cf_local_vars=$_93a9cf_old_vars['_287c86'];?>

            <?php endif;$c_693109=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_693109'];$_93a9cf_local_vars=$_93a9cf_old_vars['_693109'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5793df'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5793df'];?>

                <?php $c_e827f9=null;$_93a9cf_old_params['_e827f9']=$_93a9cf_local_params;$_93a9cf_old_vars['_e827f9']=$_93a9cf_local_vars;$a_e827f9=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_e827f9=-1;$r_e827f9=true;while($r_e827f9===true):$r_e827f9=($_e827f9!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_e827f9,$c_e827f9,$this,$r_e827f9,++$_e827f9,'_e827f9');ob_start();?>
<?php $c_e827f9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e827f9=false;}if($c_e827f9 ):?>

                <?php $c_ffb865=null;$_93a9cf_old_params['_ffb865']=$_93a9cf_local_params;$_93a9cf_old_vars['_ffb865']=$_93a9cf_local_vars;$a_ffb865=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_ffb865=ob_get_clean();$c_ffb865=$this->block_setvarblock($a_ffb865,$c_ffb865,$this,$r_ffb865,1,'_ffb865');echo($c_ffb865); $_93a9cf_local_params=$_93a9cf_old_params['_ffb865'];?>

                <label class="<?php $_93a9cf_old_params['_bfb75e']=$_93a9cf_local_params;$_93a9cf_old_vars['_bfb75e']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bfb75e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bfb75e'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_93a9cf_old_params['_fd39a6']=$_93a9cf_local_params;$_93a9cf_old_vars['_fd39a6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fd39a6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fd39a6'];?>

                  <?php $_93a9cf_old_params['_69fcc4']=$_93a9cf_local_params;$_93a9cf_old_vars['_69fcc4']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_69fcc4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_69fcc4'];?>

                  <?php $_93a9cf_old_params['_347b1f']=$_93a9cf_local_params;$_93a9cf_old_vars['_347b1f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_347b1f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_347b1f'];?>
 <?php $_93a9cf_old_params['_f94bf9']=$_93a9cf_local_params;$_93a9cf_old_vars['_f94bf9']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f94bf9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f94bf9'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_93a9cf_old_params['_e254e1']=$_93a9cf_local_params;$_93a9cf_old_vars['_e254e1']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e254e1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e254e1'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_e827f9=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_e827f9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e827f9'];?>

              <?php $_93a9cf_old_params['_4a7bed']=$_93a9cf_local_params;$_93a9cf_old_vars['_4a7bed']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4a7bed'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4a7bed'];?>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="reset-disp-option" class="btn btn-warning" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" id="disp_options_save" class="btn btn-primary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php endif;$_b825bc=ob_get_clean();echo $this->modifier_trim_space($_b825bc,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_93a9cf_local_params=$_93a9cf_old_params['_b825bc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b825bc'];?>

<script>
<?php $_93a9cf_old_params['_30a5f6']=$_93a9cf_local_params;$_93a9cf_old_vars['_30a5f6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_30a5f6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_30a5f6'];?>

function sort_fields(){
    var editor_data = [];
    if(tinymce && tinymce.editors){
        for(var i = tinymce.editors.length -1; i >= 0; i--){
            var ed = tinymce.editors[i];
            editor_data.push({
                target  : ed.targetElm,
                setting : ed.settings
            });
        }
    }
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        var field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
        $('#' + field_name + '-wrapper' ).find('');
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    for(var i = 0; i < editor_data.length; i++){
        tinyMCE.execCommand('mceAddEditor', false, editor_data[i].target);
    }
    reorder_fields();
}
function reorder_fields(){
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        let field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    var oldTextFormat = null;
    if ( $('#text_format-select').length ){
        oldTextFormat = $('#text_format-select').val();
    }
    if( tinymce && ( oldTextFormat == null || oldTextFormat == 'richtext' ) ){
        tinymce.EditorManager.remove();
        editorInit();
    }
    $(document).trigger('pcmsx.reorder_fields_done');
}
$("#disp_options_save").click(function(){
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options saved successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while saving %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        $('#_reset-disp-oprions').val('');
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options reset successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_trans($this->setup_args(['phrase'=>'Changes will be reflected the next time you open the screen.','this_tag'=>'trans'],null,$this),$this)?>
", 'warning');
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while resetting %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$(".disp_option").change(function(){
    let colname = $(this).prop("id");
    let wrapper_name = "#" + colname + 'wrapper';
    let option_name = "." + colname + 'option';
    let wrapper = $(wrapper_name);
    let option  = $(option_name);
    if($(this).prop("checked")) {
        wrapper.show("fade");
        option.show();
    } else {
        wrapper.hide("fade");
        option.hide();
    }
    let richtext = wrapper.find('textarea.richtext');
    if ( richtext.length && $(this).prop('checked') ) {
<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_c9f512']=$_93a9cf_local_params;$_93a9cf_old_vars['_c9f512']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        let editor4 = $('.mce-edit-area iframe');
        if ( editor4.length ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            editor4.css( 'height', editor_height + 'px' );
        }
<?php else:?>

        if ( richtext.next().attr('role') == 'application' ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            richtext.next().css( 'height', editor_height + 'px' );
        }
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c9f512'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c9f512'];?>

    }
    updateFieldSelector();
});
</script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6eb72c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6eb72c'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b07f96'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b07f96'];?>

<script>
$(function () {
    if (window.ontouchstart !== null) {
        $('[data-toggle="tooltip"]').tooltip();
    }
})
$('.dropdown-sub').each(function(){
    if ( $(this).hasClass( 'active' ) ) {
        $(this).parent().parent().css('background-color','#444');
    }
})
$('#__logout').click(function(e){
    <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->modifier_escape($this->function_var($this->setup_args(['name'=>'appname','escape'=>'js','regex_replace'=>'\'/\\\'/g\',\'\\\\\'\'','setvar'=>'_appname','this_tag'=>'var'],null,$this),$this),$this->setup_args('js','escape',$this),$this,'escape'),$this->setup_args('\\\'/\\\\\\\'/g\\\',\\\'\\\\\\\\\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_appname','setvar',$this),$this,'setvar')?>

    if (! window.confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to log out from %s?','params'=>'$_appname','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        e.preventDefault();
    }
})
</script>
<?php $_93a9cf_old_params['_73fe68']=$_93a9cf_local_params;$_93a9cf_old_vars['_73fe68']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'output_container','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="container-fluid">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_73fe68'];$_93a9cf_local_vars=$_93a9cf_old_vars['_73fe68'];?>

      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 id="page-title" <?php $_93a9cf_old_params['_e22028']=$_93a9cf_local_params;$_93a9cf_old_vars['_e22028']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_f0f76f']=$_93a9cf_local_params;$_93a9cf_old_vars['_f0f76f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_827382']=$_93a9cf_local_params;$_93a9cf_old_vars['_827382']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-top:-33px"<?php else:?>
style="margin-top:-36px"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_827382'];$_93a9cf_local_vars=$_93a9cf_old_vars['_827382'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f0f76f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f0f76f'];?>
 class="title-with-opt"<?php else:?>
 <?php $_93a9cf_old_params['_c6d1b5']=$_93a9cf_local_params;$_93a9cf_old_vars['_c6d1b5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_36bd4c']=$_93a9cf_local_params;$_93a9cf_old_vars['_36bd4c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="margin-top:-3px"<?php else:?>
style="margin-top:-11px"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_36bd4c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_36bd4c'];?>
<?php else:?>
style="margin-top:-10px"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c6d1b5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c6d1b5'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e22028'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e22028'];?>
>
          <span class="title">
          <?php $_93a9cf_old_params['_c00071']=$_93a9cf_local_params;$_93a9cf_old_vars['_c00071']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_aa9991']=$_93a9cf_local_params;$_93a9cf_old_vars['_aa9991']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_93a9cf_old_params['_cc58f9']=$_93a9cf_local_params;$_93a9cf_old_vars['_cc58f9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.revision_select','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cc58f9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cc58f9'];?>
"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_aa9991'];$_93a9cf_local_vars=$_93a9cf_old_vars['_aa9991'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c00071'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c00071'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
<?php $_93a9cf_old_params['_0cf6fd']=$_93a9cf_local_params;$_93a9cf_old_vars['_0cf6fd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_a35259']=$_93a9cf_local_params;$_93a9cf_old_vars['_a35259']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a35259'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a35259'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0cf6fd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0cf6fd'];?>

          </span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

      <?php $_93a9cf_old_params['_222f47']=$_93a9cf_local_params;$_93a9cf_old_vars['_222f47']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_da6716']=$_93a9cf_local_params;$_93a9cf_old_vars['_da6716']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_c166b3']=$_93a9cf_local_params;$_93a9cf_old_vars['_c166b3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_7df23d']=$_93a9cf_local_params;$_93a9cf_old_vars['_7df23d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_72e0e1']=$_93a9cf_local_params;$_93a9cf_old_vars['_72e0e1']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_47e0bd']=$_93a9cf_local_params;$_93a9cf_old_vars['_47e0bd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_47e0bd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_47e0bd'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_72e0e1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_72e0e1'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7df23d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7df23d'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c166b3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c166b3'];?>

        <?php $_93a9cf_old_params['_670b71']=$_93a9cf_local_params;$_93a9cf_old_vars['_670b71']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_create','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_7f8413']=$_93a9cf_local_params;$_93a9cf_old_vars['_7f8413']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_af15b2']=$_93a9cf_local_params;$_93a9cf_old_vars['_af15b2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_93a9cf_old_params['_495448']=$_93a9cf_local_params;$_93a9cf_old_vars['_495448']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_495448'];$_93a9cf_local_vars=$_93a9cf_old_vars['_495448'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_af15b2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_af15b2'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7f8413'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7f8413'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_670b71'];$_93a9cf_local_vars=$_93a9cf_old_vars['_670b71'];?>

        <?php $_93a9cf_old_params['_6bd44e']=$_93a9cf_local_params;$_93a9cf_old_vars['_6bd44e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_4840f1']=$_93a9cf_local_params;$_93a9cf_old_vars['_4840f1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_ef0855']=$_93a9cf_local_params;$_93a9cf_old_vars['_ef0855']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'orig_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('orig_label','setvar',$this),$this,'setvar')?>

              <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Syetem\'s Role','setvar'=>'label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ef0855'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ef0855'];?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_93a9cf_old_params['_575eac']=$_93a9cf_local_params;$_93a9cf_old_vars['_575eac']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_5f2971']=$_93a9cf_local_params;$_93a9cf_old_vars['_5f2971']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5f2971'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5f2971'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_575eac'];$_93a9cf_local_vars=$_93a9cf_old_vars['_575eac'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_93a9cf_old_params['_db09e8']=$_93a9cf_local_params;$_93a9cf_old_vars['_db09e8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;workspace_role=1">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New WorkSpace\'s Role','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New WorkSpace\'s Role','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New WorkSpace\'s Role','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'orig_label','setvar'=>'label','this_tag'=>'var'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_db09e8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_db09e8'];?>

            <?php $_93a9cf_old_params['_c1b5c3']=$_93a9cf_local_params;$_93a9cf_old_vars['_c1b5c3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_785abd']=$_93a9cf_local_params;$_93a9cf_old_vars['_785abd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=hierarchy&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-sitemap" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_785abd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_785abd'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c1b5c3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c1b5c3'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4840f1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4840f1'];?>

          <?php $_93a9cf_old_params['_038ca6']=$_93a9cf_local_params;$_93a9cf_old_vars['_038ca6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_5129dc']=$_93a9cf_local_params;$_93a9cf_old_vars['_5129dc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_34db2e']=$_93a9cf_local_params;$_93a9cf_old_vars['_34db2e']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_352a54']=$_93a9cf_local_params;$_93a9cf_old_vars['_352a54']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_4efa63']=$_93a9cf_local_params;$_93a9cf_old_vars['_4efa63']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4efa63'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4efa63'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_352a54'];$_93a9cf_local_vars=$_93a9cf_old_vars['_352a54'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_34db2e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_34db2e'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5129dc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5129dc'];?>

            <?php $_93a9cf_old_params['_c0c7ce']=$_93a9cf_local_params;$_93a9cf_old_vars['_c0c7ce']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_1ad1f3']=$_93a9cf_local_params;$_93a9cf_old_vars['_1ad1f3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_93a9cf_old_params['_036913']=$_93a9cf_local_params;$_93a9cf_old_vars['_036913']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_a8ff08']=$_93a9cf_local_params;$_93a9cf_old_vars['_a8ff08']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a8ff08'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a8ff08'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_036913'];$_93a9cf_local_vars=$_93a9cf_old_vars['_036913'];?>

            <?php else:?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_a623ed']=$_93a9cf_local_params;$_93a9cf_old_vars['_a623ed']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a623ed'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a623ed'];?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_93a9cf_old_params['_66ecca']=$_93a9cf_local_params;$_93a9cf_old_vars['_66ecca']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_024477']=$_93a9cf_local_params;$_93a9cf_old_vars['_024477']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=hierarchy&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-sitemap" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_024477'];$_93a9cf_local_vars=$_93a9cf_old_vars['_024477'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_66ecca'];$_93a9cf_local_vars=$_93a9cf_old_vars['_66ecca'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1ad1f3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1ad1f3'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c0c7ce'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c0c7ce'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_038ca6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_038ca6'];?>

          <?php $_93a9cf_old_params['_ee3091']=$_93a9cf_local_params;$_93a9cf_old_vars['_ee3091']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_b6059f']=$_93a9cf_local_params;$_93a9cf_old_vars['_b6059f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_7762ec']=$_93a9cf_local_params;$_93a9cf_old_vars['_7762ec']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7762ec'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7762ec'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b6059f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b6059f'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ee3091'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ee3091'];?>

        <?php else:?>

          <?php $_93a9cf_old_params['_3a1f52']=$_93a9cf_local_params;$_93a9cf_old_vars['_3a1f52']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_9dd2ad']=$_93a9cf_local_params;$_93a9cf_old_vars['_9dd2ad']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9dd2ad'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9dd2ad'];?>

            <?php $_93a9cf_old_params['_e1aa23']=$_93a9cf_local_params;$_93a9cf_old_vars['_e1aa23']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','eq'=>'comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e1aa23'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e1aa23'];?>

            <?php $_93a9cf_old_params['_23ae8a']=$_93a9cf_local_params;$_93a9cf_old_vars['_23ae8a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_return_to_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_23ae8a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_23ae8a'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3a1f52'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3a1f52'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6bd44e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6bd44e'];?>

          <?php $_93a9cf_old_params['_b51ba8']=$_93a9cf_local_params;$_93a9cf_old_vars['_b51ba8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b51ba8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b51ba8'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_da6716'];$_93a9cf_local_vars=$_93a9cf_old_vars['_da6716'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_222f47'];$_93a9cf_local_vars=$_93a9cf_old_vars['_222f47'];?>

      <?php $_93a9cf_old_params['_5ea784']=$_93a9cf_local_params;$_93a9cf_old_vars['_5ea784']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_de74d6']=$_93a9cf_local_params;$_93a9cf_old_vars['_de74d6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_0475c8']=$_93a9cf_local_params;$_93a9cf_old_vars['_0475c8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_6ce789']=$_93a9cf_local_params;$_93a9cf_old_vars['_6ce789']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php else:?>

          <?php $_93a9cf_old_params['_c42856']=$_93a9cf_local_params;$_93a9cf_old_vars['_c42856']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;manage_revision=1">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Revision','this_tag'=>'trans'],null,$this),$this)?>

          </a>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c42856'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c42856'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6ce789'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6ce789'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0475c8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0475c8'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_de74d6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_de74d6'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5ea784'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5ea784'];?>

      <?php $_93a9cf_old_params['_4a12c6']=$_93a9cf_local_params;$_93a9cf_old_vars['_4a12c6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_c65246']=$_93a9cf_local_params;$_93a9cf_old_vars['_c65246']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_659d26']=$_93a9cf_local_params;$_93a9cf_old_vars['_659d26']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="btn btn-sm header-btn-icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="hidden fa fa-home" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
"></i>
          <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </a>
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_659d26'];$_93a9cf_local_vars=$_93a9cf_old_vars['_659d26'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c65246'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c65246'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4a12c6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4a12c6'];?>

          </h1>
    <?php $c_2aaf4b=null;$_93a9cf_old_params['_2aaf4b']=$_93a9cf_local_params;$_93a9cf_old_vars['_2aaf4b']=$_93a9cf_local_vars;$a_2aaf4b=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_2aaf4b=ob_get_clean();$c_2aaf4b=$this->block_setvarblock($a_2aaf4b,$c_2aaf4b,$this,$r_2aaf4b,1,'_2aaf4b');echo($c_2aaf4b); $_93a9cf_local_params=$_93a9cf_old_params['_2aaf4b'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_93a9cf_old_params['_b98473']=$_93a9cf_local_params;$_93a9cf_old_vars['_b98473']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-<?php $_93a9cf_old_params['_ecce27']=$_93a9cf_local_params;$_93a9cf_old_vars['_ecce27']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_class','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'header_alert_class','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
success<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ecce27'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ecce27'];?>
" tabindex="0">
      <?php $_93a9cf_old_params['_1d10b0']=$_93a9cf_local_params;$_93a9cf_old_vars['_1d10b0']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'header_alert_force','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1d10b0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1d10b0'];?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

      <?php $_93a9cf_old_params['_04d0d1']=$_93a9cf_local_params;$_93a9cf_old_vars['_04d0d1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_93a9cf_old_params['_948d12']=$_93a9cf_local_params;$_93a9cf_old_vars['_948d12']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_948d12'];$_93a9cf_local_vars=$_93a9cf_old_vars['_948d12'];?>
" class="popup">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

        </a>
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_04d0d1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_04d0d1'];?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b98473'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b98473'];?>

    <?php $_93a9cf_old_params['_364408']=$_93a9cf_local_params;$_93a9cf_old_vars['_364408']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_364408'];$_93a9cf_local_vars=$_93a9cf_old_vars['_364408'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9910f2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9910f2'];?>

<?php $c_cc5d76=null;$_93a9cf_old_params['_cc5d76']=$_93a9cf_local_params;$_93a9cf_old_vars['_cc5d76']=$_93a9cf_local_vars;$a_cc5d76=$this->setup_args(['name'=>'include_path','this_tag'=>'setvarblock'],null,$this);ob_start();?>
include/list/screen_header.tmpl<?php $c_cc5d76=ob_get_clean();$c_cc5d76=$this->block_setvarblock($a_cc5d76,$c_cc5d76,$this,$r_cc5d76,1,'_cc5d76');echo($c_cc5d76); $_93a9cf_local_params=$_93a9cf_old_params['_cc5d76'];?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['file'=>'$include_path','this_tag'=>'include'],null,$this),$this)?>

<?php $c_4965f5=null;$_93a9cf_old_params['_4965f5']=$_93a9cf_local_params;$_93a9cf_old_vars['_4965f5']=$_93a9cf_local_vars;$a_4965f5=$this->setup_args(['name'=>'include_path','this_tag'=>'setvarblock'],null,$this);ob_start();?>
include/list/<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
/screen_header.tmpl<?php $c_4965f5=ob_get_clean();$c_4965f5=$this->block_setvarblock($a_4965f5,$c_4965f5,$this,$r_4965f5,1,'_4965f5');echo($c_4965f5); $_93a9cf_local_params=$_93a9cf_old_params['_4965f5'];?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['file'=>'$include_path','this_tag'=>'include'],null,$this),$this)?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.lazyload.min.js"></script>
<?php $c_e9062f=null;$_93a9cf_old_params['_e9062f']=$_93a9cf_local_params;$_93a9cf_old_vars['_e9062f']=$_93a9cf_local_vars;$a_e9062f=$this->setup_args(['name'=>'this_url','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
<?php $c_e9062f=ob_get_clean();$c_e9062f=$this->block_setvarblock($a_e9062f,$c_e9062f,$this,$r_e9062f,1,'_e9062f');echo($c_e9062f); $_93a9cf_local_params=$_93a9cf_old_params['_e9062f'];?>

<?php $c_89f872=null;$_93a9cf_old_params['_89f872']=$_93a9cf_local_params;$_93a9cf_old_vars['_89f872']=$_93a9cf_local_vars;$a_89f872=$this->setup_args(['name'=>'setup_search','this_tag'=>'setvarblock'],null,$this);ob_start();?>

$(".search-btn").click(function(){
    $("#__mode").prop('value','view');
    return true;
});
$(".alt-search-button").click(function(){
    query = prompt('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter keyword for search.','this_tag'=>'trans'],null,$this),$this)?>
', '<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'query','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
');
    if ( query == null ) {
        return false;
    }
    $(".query-box").val(query);
    $(".query-box").show();
    $("#__mode").prop('value','view');
    return true;
});
$(".query-box").keypress(function(e){
  if(e.which==13){
    $("#__mode").prop('value','view');
    in_search = true;
    return true;
  }
}).blur(function(){
    in_search = false;
});
<?php $c_89f872=ob_get_clean();$c_89f872=$this->block_setvarblock($a_89f872,$c_89f872,$this,$r_89f872,1,'_89f872');echo($c_89f872); $_93a9cf_local_params=$_93a9cf_old_params['_89f872'];?>

<?php $c_d77e75=null;$_93a9cf_old_params['_d77e75']=$_93a9cf_local_params;$_93a9cf_old_vars['_d77e75']=$_93a9cf_local_vars;$a_d77e75=$this->setup_args(['name'=>'search_box','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<?php $_93a9cf_old_params['_b214e3']=$_93a9cf_local_params;$_93a9cf_old_vars['_b214e3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_8d939e']=$_93a9cf_local_params;$_93a9cf_old_vars['_8d939e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._start_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="_start_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._start_filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8d939e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8d939e'];?>

  <?php $_93a9cf_old_params['_b8a4f8']=$_93a9cf_local_params;$_93a9cf_old_vars['_b8a4f8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b8a4f8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b8a4f8'];?>

  <?php $_93a9cf_old_params['_70e66e']=$_93a9cf_local_params;$_93a9cf_old_vars['_70e66e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="_system_filters_option" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_70e66e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_70e66e'];?>

  <?php $_93a9cf_old_params['_b60375']=$_93a9cf_local_params;$_93a9cf_old_vars['_b60375']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="select_system_filters" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b60375'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b60375'];?>

  <input disabled class="short-padding query-box form-control mb-2 mr-sm-2 mb-sm-0 form-control-sm" name="query" type="text" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'query','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Keyword','this_tag'=>'trans'],null,$this),$this)?>
" placeholder="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Keyword','this_tag'=>'trans'],null,$this),$this)?>
">
  <?php $_93a9cf_old_params['_3bb82f']=$_93a9cf_local_params;$_93a9cf_old_vars['_3bb82f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="workspace_select" value="1">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3bb82f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3bb82f'];?>

  <?php $_93a9cf_old_params['_12cf76']=$_93a9cf_local_params;$_93a9cf_old_vars['_12cf76']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="manage_revision" value="1">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_12cf76'];$_93a9cf_local_vars=$_93a9cf_old_vars['_12cf76'];?>

  <?php $_93a9cf_old_params['_3ebe9b']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ebe9b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="select_add" value="1">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3ebe9b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ebe9b'];?>

  <?php $_93a9cf_old_params['_d81ac6']=$_93a9cf_local_params;$_93a9cf_old_vars['_d81ac6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_type','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d81ac6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d81ac6'];?>

  <?php $_93a9cf_old_params['_c24997']=$_93a9cf_local_params;$_93a9cf_old_vars['_c24997']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c24997'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c24997'];?>

  <button disabled class="search-btn btn btn-secondary search-button btn-sm" type="submit"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
  <button disabled class="hidden btn btn-secondary alt-search-button btn-sm" type="submit"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b214e3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b214e3'];?>

<?php $c_d77e75=ob_get_clean();$c_d77e75=$this->block_setvarblock($a_d77e75,$c_d77e75,$this,$r_d77e75,1,'_d77e75');echo($c_d77e75); $_93a9cf_local_params=$_93a9cf_old_params['_d77e75'];?>


<?php $_93a9cf_old_params['_58ae3b']=$_93a9cf_local_params;$_93a9cf_old_vars['_58ae3b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_4ec3bc']=$_93a9cf_local_params;$_93a9cf_old_vars['_4ec3bc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'query','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_a0d21d=null;$_93a9cf_old_params['_a0d21d']=$_93a9cf_local_params;$_93a9cf_old_vars['_a0d21d']=$_93a9cf_local_vars;$a_a0d21d=$this->setup_args(['name'=>'current_filter','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<?php $_93a9cf_old_params['_af5ea7']=$_93a9cf_local_params;$_93a9cf_old_vars['_af5ea7']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._detach_query','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <span class="_current_filter">( <?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
 :&nbsp;<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'query','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 <span> - </span> <a href="<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
&amp;_detach_query=1<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_93a9cf_old_params['_2cef9f']=$_93a9cf_local_params;$_93a9cf_old_vars['_2cef9f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2cef9f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2cef9f'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'selecter_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
</a> &nbsp;)</span></span>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_af5ea7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_af5ea7'];?>

<?php $c_a0d21d=ob_get_clean();$c_a0d21d=$this->block_setvarblock($a_a0d21d,$c_a0d21d,$this,$r_a0d21d,1,'_a0d21d');echo($c_a0d21d); $_93a9cf_local_params=$_93a9cf_old_params['_a0d21d'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4ec3bc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4ec3bc'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_58ae3b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_58ae3b'];?>


<?php $_93a9cf_old_params['_add4d8']=$_93a9cf_local_params;$_93a9cf_old_vars['_add4d8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_564ba6']=$_93a9cf_local_params;$_93a9cf_old_vars['_564ba6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_ed14d4']=$_93a9cf_local_params;$_93a9cf_old_vars['_ed14d4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ed14d4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ed14d4'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_564ba6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_564ba6'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_add4d8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_add4d8'];?>


<?php $_93a9cf_old_params['_1f22c0']=$_93a9cf_local_params;$_93a9cf_old_vars['_1f22c0']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._fix_filter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_33df38']=$_93a9cf_local_params;$_93a9cf_old_vars['_33df38']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._detach_filter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_dfe80e']=$_93a9cf_local_params;$_93a9cf_old_vars['_dfe80e']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_hide_filter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_5a7216']=$_93a9cf_local_params;$_93a9cf_old_vars['_5a7216']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $c_db6429=null;$_93a9cf_old_params['_db6429']=$_93a9cf_local_params;$_93a9cf_old_vars['_db6429']=$_93a9cf_local_vars;$a_db6429=$this->setup_args(['name'=>'current_filter','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<span class="_current_filter">( <?php echo $this->function_trans($this->setup_args(['phrase'=>'Current Filter','this_tag'=>'trans'],null,$this),$this)?>
 :&nbsp;<a href="javascript:void(0);" data-toggle="modal" data-target="#filterOptions"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'current_filter_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</a> <span> - </span> <a href="<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
&amp;_detach_filter=1<?php echo $this->function_var($this->setup_args(['name'=>'query_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_93a9cf_old_params['_ca1869']=$_93a9cf_local_params;$_93a9cf_old_vars['_ca1869']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ca1869'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ca1869'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'selecter_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
</a> &nbsp;)</span></span><?php $c_db6429=ob_get_clean();$c_db6429=$this->block_setvarblock($a_db6429,$c_db6429,$this,$r_db6429,1,'_db6429');echo($c_db6429); $_93a9cf_local_params=$_93a9cf_old_params['_db6429'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5a7216'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5a7216'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dfe80e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dfe80e'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_33df38'];$_93a9cf_local_vars=$_93a9cf_old_vars['_33df38'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1f22c0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1f22c0'];?>


<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'sortable','setvar'=>'_sortable','this_tag'=>'var'],null,$this),$this),$this->setup_args('_sortable','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'ascend','setvar'=>'order_asc','this_tag'=>'trans'],null,$this),$this),$this->setup_args('order_asc','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'descend','setvar'=>'order_desc','this_tag'=>'trans'],null,$this),$this),$this->setup_args('order_desc','setvar',$this),$this,'setvar')?>


<?php $_93a9cf_old_params['_d3d966']=$_93a9cf_local_params;$_93a9cf_old_vars['_d3d966']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.revision_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Revisions','setvar'=>'plural','this_tag'=>'trans'],null,$this),$this),$this->setup_args('plural','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d3d966'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d3d966'];?>


    <?php $_93a9cf_old_params['_433aa5']=$_93a9cf_local_params;$_93a9cf_old_vars['_433aa5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.deleted','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-success" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.deleted','setvar'=>'deletes','this_tag'=>'var'],null,$this),$this),$this->setup_args('deletes','setvar',$this),$this,'setvar')?>

    <?php $_93a9cf_old_params['_57fbd8']=$_93a9cf_local_params;$_93a9cf_old_vars['_57fbd8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s %s(Revision) have been deleted.','params'=>'\'$deletes\',\'$plural\'','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s %s have been deleted.','params'=>'\'$deletes\',\'$plural\'','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_57fbd8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_57fbd8'];?>

  </div>
    <script>
    $('.alert-success').focus();
    </script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_433aa5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_433aa5'];?>

    <?php $_93a9cf_old_params['_228409']=$_93a9cf_local_params;$_93a9cf_old_vars['_228409']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.already_deleted','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-success" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.already_deleted','setvar'=>'deletes','this_tag'=>'var'],null,$this),$this),$this->setup_args('deletes','setvar',$this),$this,'setvar')?>

    <?php $_93a9cf_old_params['_a1b5d0']=$_93a9cf_local_params;$_93a9cf_old_vars['_a1b5d0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'deletes','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s already deleted.','params'=>'$plural','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s already deleted.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a1b5d0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a1b5d0'];?>

  </div>
    <script>
    $('.alert-success').focus();
    </script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_228409'];$_93a9cf_local_vars=$_93a9cf_old_vars['_228409'];?>


    <?php $_93a9cf_old_params['_940a91']=$_93a9cf_local_params;$_93a9cf_old_vars['_940a91']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.does_act','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.apply_actions','setvar'=>'apply_actions','this_tag'=>'var'],null,$this),$this),$this->setup_args('apply_actions','setvar',$this),$this,'setvar')?>

  <div class="alert alert-<?php $_93a9cf_old_params['_641f3b']=$_93a9cf_local_params;$_93a9cf_old_vars['_641f3b']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'apply_actions','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
warning<?php else:?>
success<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_641f3b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_641f3b'];?>
" id="alert-does_act" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_70b9a5']=$_93a9cf_local_params;$_93a9cf_old_vars['_70b9a5']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'apply_actions','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'There were no %s for action.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

    <?php $_93a9cf_old_params['_4fd2f8']=$_93a9cf_local_params;$_93a9cf_old_vars['_4fd2f8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'apply_actions','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'You applied an action to %s %s.','params'=>'\'$apply_actions\',\'$label\'','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'You applied an action to %s %s.','params'=>'\'$apply_actions\',\'$plural\'','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4fd2f8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4fd2f8'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_70b9a5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_70b9a5'];?>

    <?php $_93a9cf_old_params['_0d18b2']=$_93a9cf_local_params;$_93a9cf_old_vars['_0d18b2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_93a9cf_old_params['_d9b78f']=$_93a9cf_local_params;$_93a9cf_old_vars['_d9b78f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d9b78f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d9b78f'];?>
" class="popup">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

    </a>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0d18b2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0d18b2'];?>

  </div>
    <script>
    $('#alert-does_act').focus();
    </script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_940a91'];$_93a9cf_local_vars=$_93a9cf_old_vars['_940a91'];?>


    <?php $_93a9cf_old_params['_134850']=$_93a9cf_local_params;$_93a9cf_old_vars['_134850']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved_order','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-success" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s order saved successfully.','params'=>'$plural','this_tag'=>'trans'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_f18590']=$_93a9cf_local_params;$_93a9cf_old_vars['_f18590']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_93a9cf_old_params['_635e69']=$_93a9cf_local_params;$_93a9cf_old_vars['_635e69']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_635e69'];$_93a9cf_local_vars=$_93a9cf_old_vars['_635e69'];?>
" class="popup">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

      </a>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f18590'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f18590'];?>

  </div>
    <script>
    $('.alert-success').focus();
    </script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_134850'];$_93a9cf_local_vars=$_93a9cf_old_vars['_134850'];?>

    <?php $_93a9cf_old_params['_afa631']=$_93a9cf_local_params;$_93a9cf_old_vars['_afa631']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved_props','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-success" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options saved successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>

  </div>
    <script>
    $('.alert-success').focus();
    </script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_afa631'];$_93a9cf_local_vars=$_93a9cf_old_vars['_afa631'];?>

    <?php $_93a9cf_old_params['_1bc63c']=$_93a9cf_local_params;$_93a9cf_old_vars['_1bc63c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.reset_props','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-success" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options reset successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>

  </div>
    <script>
    $('.alert-success').focus();
    </script>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1bc63c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1bc63c'];?>

<?php $c_c65f56=null;$_93a9cf_old_params['_c65f56']=$_93a9cf_local_params;$_93a9cf_old_vars['_c65f56']=$_93a9cf_local_vars;$a_c65f56=$this->setup_args(['name'=>'include_path','this_tag'=>'setvarblock'],null,$this);ob_start();?>
include/list/<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
/list_header.tmpl<?php $c_c65f56=ob_get_clean();$c_c65f56=$this->block_setvarblock($a_c65f56,$c_c65f56,$this,$r_c65f56,1,'_c65f56');echo($c_c65f56); $_93a9cf_local_params=$_93a9cf_old_params['_c65f56'];?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['file'=>'$include_path','this_tag'=>'include'],null,$this),$this)?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'user_id','setvar'=>'_admin_user_id','this_tag'=>'var'],null,$this),$this),$this->setup_args('_admin_user_id','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'*Unspecified*','setvar'=>'_unspecified','this_tag'=>'trans'],null,$this),$this),$this->setup_args('_unspecified','setvar',$this),$this,'setvar')?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'model','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" class="form-inline" id="list-select-form">
<input type="hidden" name="__mode" value="" id="__mode">
<input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'_this_model','this_tag'=>'var'],null,$this),$this)?>
">
<input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
<input type="hidden" name="_type" value="list">
<input type="hidden" name="sort" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.sort','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="direction" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.direction','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_93a9cf_old_params['_d9d506']=$_93a9cf_local_params;$_93a9cf_old_vars['_d9d506']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d9d506'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d9d506'];?>

<input type="hidden" name="" value="" id="select_ids_tmpl">
<input type="hidden" name="filter_params" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'filter_params','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" id="filter_params">
<input type="hidden" name="return_args" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'return_args','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_93a9cf_old_params['_ccb6aa']=$_93a9cf_local_params;$_93a9cf_old_vars['_ccb6aa']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="single_select" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.single_select','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_93a9cf_old_params['_2e5a9e']=$_93a9cf_local_params;$_93a9cf_old_vars['_2e5a9e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.from_obj','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2e5a9e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2e5a9e'];?>

<?php $_93a9cf_old_params['_15dc11']=$_93a9cf_local_params;$_93a9cf_old_vars['_15dc11']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_15dc11'];$_93a9cf_local_vars=$_93a9cf_old_vars['_15dc11'];?>

<input type="hidden" name="dialog_view" value="1">
<?php $_93a9cf_old_params['_56cf25']=$_93a9cf_local_params;$_93a9cf_old_vars['_56cf25']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<input type="hidden" name="select_system_filters" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="_system_filters_option" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="insert" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="insert_editor" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_56cf25'];$_93a9cf_local_vars=$_93a9cf_old_vars['_56cf25'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ccb6aa'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ccb6aa'];?>

<?php $_93a9cf_old_params['_38c6e4']=$_93a9cf_local_params;$_93a9cf_old_vars['_38c6e4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <?php $_93a9cf_old_params['_f41ca3']=$_93a9cf_local_params;$_93a9cf_old_vars['_f41ca3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'urlinfo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_fdc291']=$_93a9cf_local_params;$_93a9cf_old_vars['_fdc291']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','eq'=>'urls','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_7b9002']=$_93a9cf_local_params;$_93a9cf_old_vars['_7b9002']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._filter','eq'=>'urlinfo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_8c434f']=$_93a9cf_local_params;$_93a9cf_old_vars['_8c434f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','eq'=>'archive','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_597e94']=$_93a9cf_local_params;$_93a9cf_old_vars['_597e94']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_archive','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<input type="hidden" name="select_system_filters" value="filter_class_archive">
<input type="hidden" name="_system_filters_option" value="archive">
<input type="hidden" name="_filter" value="urlinfo">
<?php echo $this->function_setvar($this->setup_args(['name'=>'hide_current_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_597e94'];$_93a9cf_local_vars=$_93a9cf_old_vars['_597e94'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8c434f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8c434f'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7b9002'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7b9002'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fdc291'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fdc291'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f41ca3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f41ca3'];?>

  <?php $_93a9cf_old_params['_a97a29']=$_93a9cf_local_params;$_93a9cf_old_vars['_a97a29']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $c_319bae=null;$_93a9cf_old_params['_319bae']=$_93a9cf_local_params;$_93a9cf_old_vars['_319bae']=$_93a9cf_local_vars;$a_319bae=$this->setup_args(['name'=>'dialog_param','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workflow_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_319bae=ob_get_clean();$c_319bae=$this->block_setvarblock($a_319bae,$c_319bae,$this,$r_319bae,1,'_319bae');echo($c_319bae); $_93a9cf_local_params=$_93a9cf_old_params['_319bae'];?>

    <?php $c_2cbb0f=null;$_93a9cf_old_params['_2cbb0f']=$_93a9cf_local_params;$_93a9cf_old_vars['_2cbb0f']=$_93a9cf_local_vars;$a_2cbb0f=$this->setup_args(['name'=>'dialog_param','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workflow_type=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_2cbb0f=ob_get_clean();$c_2cbb0f=$this->block_setvarblock($a_2cbb0f,$c_2cbb0f,$this,$r_2cbb0f,1,'_2cbb0f');echo($c_2cbb0f); $_93a9cf_local_params=$_93a9cf_old_params['_2cbb0f'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a97a29'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a97a29'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_38c6e4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_38c6e4'];?>

<?php $_93a9cf_old_params['_7ea818']=$_93a9cf_local_params;$_93a9cf_old_vars['_7ea818']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7ea818'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7ea818'];?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'request_method','setvar'=>'_request_method','this_tag'=>'property'],null,$this),$this),$this->setup_args('_request_method','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_ee8c93']=$_93a9cf_local_params;$_93a9cf_old_vars['_ee8c93']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_request_method','eq'=>'POST','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_5d3e0a=null;$_93a9cf_old_params['_5d3e0a']=$_93a9cf_local_params;$_93a9cf_old_vars['_5d3e0a']=$_93a9cf_local_vars;$a_5d3e0a=$this->setup_args(['name'=>'_post_query','this_tag'=>'setvarblock'],null,$this);ob_start();?>
__mode=view&_type=list&_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_1817e1']=$_93a9cf_local_params;$_93a9cf_old_vars['_1817e1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.query','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&query=<?php echo $this->function_var($this->setup_args(['name'=>'request.query','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1817e1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1817e1'];?>
<?php $_93a9cf_old_params['_f0a078']=$_93a9cf_local_params;$_93a9cf_old_vars['_f0a078']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&manage_revision=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f0a078'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f0a078'];?>
<?php $_93a9cf_old_params['_989494']=$_93a9cf_local_params;$_93a9cf_old_vars['_989494']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_989494'];$_93a9cf_local_vars=$_93a9cf_old_vars['_989494'];?>
<?php $c_5d3e0a=ob_get_clean();$c_5d3e0a=$this->block_setvarblock($a_5d3e0a,$c_5d3e0a,$this,$r_5d3e0a,1,'_5d3e0a');echo($c_5d3e0a); $_93a9cf_local_params=$_93a9cf_old_params['_5d3e0a'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ee8c93'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ee8c93'];?>

<input type="hidden" name="_query_string" value="<?php $_93a9cf_old_params['_8b34c7']=$_93a9cf_local_params;$_93a9cf_old_vars['_8b34c7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_request_method','ne'=>'POST','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_rawurlencode($this->function_var($this->setup_args(['name'=>'query_string','escape'=>'url','this_tag'=>'var'],null,$this),$this))?>
<?php else:?>
<?php echo paml_rawurlencode($this->function_var($this->setup_args(['name'=>'_post_query','escape'=>'url','this_tag'=>'var'],null,$this),$this))?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8b34c7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8b34c7'];?>
">
<?php $_93a9cf_old_params['_51b95f']=$_93a9cf_local_params;$_93a9cf_old_vars['_51b95f']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'list_items','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-success full">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s not found.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_95fd0a']=$_93a9cf_local_params;$_93a9cf_old_vars['_95fd0a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'query','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_1f344f']=$_93a9cf_local_params;$_93a9cf_old_vars['_1f344f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;_detach_query=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1f344f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1f344f'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'filter_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
    <i class="hidden fa fa-list"></i> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>

    </a>
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_95fd0a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_95fd0a'];?>

  </div>
<?php $_93a9cf_old_params['_9422e0']=$_93a9cf_local_params;$_93a9cf_old_vars['_9422e0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'query','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="full<?php $_93a9cf_old_params['_800ad4']=$_93a9cf_local_params;$_93a9cf_old_vars['_800ad4']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'list_items','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 box-no-list-items"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_800ad4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_800ad4'];?>
">
  <?php echo $this->function_var($this->setup_args(['name'=>'search_box','this_tag'=>'var'],null,$this),$this)?>

  </div>
<script>
var in_search = false;
<?php echo $this->function_var($this->setup_args(['name'=>'setup_search','this_tag'=>'var'],null,$this),$this)?>

</script>
  <?php else:?>

    <?php $_93a9cf_old_params['_89b8b7']=$_93a9cf_local_params;$_93a9cf_old_vars['_89b8b7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'current_filter','this_tag'=>'var'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_89b8b7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_89b8b7'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9422e0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9422e0'];?>

</form>
<?php echo $this->function_setvar($this->setup_args(['name'=>'model','value'=>'$_this_model','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_9a8dcf']=$_93a9cf_local_params;$_93a9cf_old_vars['_9a8dcf']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <button id="dialog-cancel-btn" class="btn btn-secondary" type="submit"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
<script>
$('#dialog-cancel-btn').click(function(){
    window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
    window.parent.$('#modal').modal('hide');
    return false;
});
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9a8dcf'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9a8dcf'];?>

<?php else:?>

<?php $c_2bf895=null;$_93a9cf_old_params['_2bf895']=$_93a9cf_local_params;$_93a9cf_old_vars['_2bf895']=$_93a9cf_local_vars;$a_2bf895=$this->setup_args(['name'=>'table_header','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<tr>
<?php $_93a9cf_old_params['_51ae9d']=$_93a9cf_local_params;$_93a9cf_old_vars['_51ae9d']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_1ba0f1']=$_93a9cf_local_params;$_93a9cf_old_vars['_1ba0f1']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_f5e0fd']=$_93a9cf_local_params;$_93a9cf_old_vars['_f5e0fd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_delete','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'has_actions','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php else:?>

  <?php $_93a9cf_old_params['_d3dcc1']=$_93a9cf_local_params;$_93a9cf_old_vars['_d3dcc1']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_04876f']=$_93a9cf_local_params;$_93a9cf_old_vars['_04876f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_delete_any','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_actions','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_04876f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_04876f'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d3dcc1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d3dcc1'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f5e0fd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f5e0fd'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1ba0f1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1ba0f1'];?>

<th class="id">
<?php $_93a9cf_old_params['_226e3e']=$_93a9cf_local_params;$_93a9cf_old_vars['_226e3e']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_single_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'show_cb_all_select','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_511f67']=$_93a9cf_local_params;$_93a9cf_old_vars['_511f67']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_actions','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'show_cb_all_select','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'has_actions','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'has_actions','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'show_cb_all_select','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'show_cb_all_select','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_511f67'];$_93a9cf_local_vars=$_93a9cf_old_vars['_511f67'];?>

<?php $_93a9cf_old_params['_75bb80']=$_93a9cf_local_params;$_93a9cf_old_vars['_75bb80']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_cb_all_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<label class="custom-control custom-checkbox">
  <input type="checkbox" class="selector custom-control-input cb-all-select"
    aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select all','this_tag'=>'trans'],null,$this),$this)?>
">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description"></span>
</label>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_75bb80'];$_93a9cf_local_vars=$_93a9cf_old_vars['_75bb80'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_226e3e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_226e3e'];?>

</th>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_51ae9d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_51ae9d'];?>

<?php $c_c1c3c0=null;$_93a9cf_old_params['_c1c3c0']=$_93a9cf_local_params;$_93a9cf_old_vars['_c1c3c0']=$_93a9cf_local_vars;$a_c1c3c0=$this->setup_args(['name'=>'list_cols','this_tag'=>'loop'],null,$this);$_c1c3c0=-1;$r_c1c3c0=true;while($r_c1c3c0===true):$r_c1c3c0=($_c1c3c0!==-1)?false:true;echo $this->block_loop($a_c1c3c0,$c_c1c3c0,$this,$r_c1c3c0,++$_c1c3c0,'_c1c3c0');ob_start();?>
<?php $c_c1c3c0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c1c3c0=false;}if($c_c1c3c0 ):?>

<?php $_93a9cf_old_params['_76c60c']=$_93a9cf_local_params;$_93a9cf_old_vars['_76c60c']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['value'=>'$_name','array'=>'$show_cols','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

<th class="<?php $_93a9cf_old_params['_51594a']=$_93a9cf_local_params;$_93a9cf_old_vars['_51594a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_name','eq'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
id<?php else:?>
<?php $_93a9cf_old_params['_1d2f93']=$_93a9cf_local_params;$_93a9cf_old_vars['_1d2f93']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','ne'=>'relation','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_fcaba8']=$_93a9cf_local_params;$_93a9cf_old_vars['_fcaba8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
primary<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_list','like'=>'num','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
num<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fcaba8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fcaba8'];?>
<?php else:?>
not-primary<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1d2f93'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1d2f93'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_51594a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_51594a'];?>
" <?php $_93a9cf_old_params['_eb06bc']=$_93a9cf_local_params;$_93a9cf_old_vars['_eb06bc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_name','eq'=>'rev_diff','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="width:45%"<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_name','eq'=>'order','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
 style="width:100px"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eb06bc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eb06bc'];?>
>
  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'list_header_truncate','setvar'=>'truncate','this_tag'=>'property'],null,$this),$this),$this->setup_args('truncate','setvar',$this),$this,'setvar')?>

  <?php $_93a9cf_old_params['_aa5ca6']=$_93a9cf_local_params;$_93a9cf_old_vars['_aa5ca6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'truncate','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'truncate','value'=>'+...','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'truncate','value'=>'10+...','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_aa5ca6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_aa5ca6'];?>

  <?php echo $this->modifier_setvar($this->modifier_trim_to($this->function_var($this->setup_args(['name'=>'_label','trim_to'=>'$truncate','setvar'=>'_truncated_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('$truncate','trim_to',$this),$this,'trim_to'),$this->setup_args('_truncated_label','setvar',$this),$this,'setvar')?>

  <?php $_93a9cf_old_params['_16fd71']=$_93a9cf_local_params;$_93a9cf_old_vars['_16fd71']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_label','eq'=>'$_truncated_label','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_truncated_label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

  <?php else:?>

    <span data-toggle="tooltip" data-placement="right" title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_truncated_label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_16fd71'];$_93a9cf_local_vars=$_93a9cf_old_vars['_16fd71'];?>

  <?php $_93a9cf_old_params['_8401f8']=$_93a9cf_local_params;$_93a9cf_old_vars['_8401f8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_name','eq'=>'rev_diff','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Change Note','this_tag'=>'trans'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8401f8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8401f8'];?>

  <?php $_93a9cf_old_params['_b223a7']=$_93a9cf_local_params;$_93a9cf_old_vars['_b223a7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','ne'=>'relation','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <span class="text-sm toggle">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'class_asc','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'class_desc','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_d3f2d4']=$_93a9cf_local_params;$_93a9cf_old_vars['_d3f2d4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.sort','eq'=>'$_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_0987bc']=$_93a9cf_local_params;$_93a9cf_old_vars['_0987bc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.direction','eq'=>'asc','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'class_asc','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.direction','eq'=>'desc','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'class_desc','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0987bc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0987bc'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d3f2d4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d3f2d4'];?>

  <?php $_93a9cf_old_params['_df74df']=$_93a9cf_local_params;$_93a9cf_old_vars['_df74df']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <a aria-label="<?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'Sort by %s in %s','params'=>'\'$_label\',\'$order_asc\'','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_5b565b']=$_93a9cf_local_params;$_93a9cf_old_vars['_5b565b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'class_asc','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
(<?php echo $this->function_trans($this->setup_args(['phrase'=>'Selected','this_tag'=>'trans'],null,$this),$this)?>
)<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5b565b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5b565b'];?>
" class="<?php $_93a9cf_old_params['_9199e0']=$_93a9cf_local_params;$_93a9cf_old_vars['_9199e0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'class_asc','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
current-cnd<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9199e0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9199e0'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
&amp;sort=<?php echo $this->function_var($this->setup_args(['name'=>'_name','this_tag'=>'var'],null,$this),$this)?>
&amp;direction=asc<?php echo $this->function_var($this->setup_args(['name'=>'query_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_93a9cf_old_params['_e3c743']=$_93a9cf_local_params;$_93a9cf_old_vars['_e3c743']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e3c743'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e3c743'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'filter_add_params','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'selector_cond','this_tag'=>'var'],null,$this),$this)?>
">&#9650;</a>
    <a aria-label="<?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'Sort by %s in %s','params'=>'\'$_label\',\'$order_desc\'','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_ffb3a8']=$_93a9cf_local_params;$_93a9cf_old_vars['_ffb3a8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'class_asc','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
(<?php echo $this->function_trans($this->setup_args(['phrase'=>'Selected','this_tag'=>'trans'],null,$this),$this)?>
)<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ffb3a8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ffb3a8'];?>
" class="<?php $_93a9cf_old_params['_cd6c64']=$_93a9cf_local_params;$_93a9cf_old_vars['_cd6c64']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'class_desc','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
current-cnd<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cd6c64'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cd6c64'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
&amp;sort=<?php echo $this->function_var($this->setup_args(['name'=>'_name','this_tag'=>'var'],null,$this),$this)?>
&amp;direction=desc<?php echo $this->function_var($this->setup_args(['name'=>'query_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_93a9cf_old_params['_c0ce1d']=$_93a9cf_local_params;$_93a9cf_old_vars['_c0ce1d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c0ce1d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c0ce1d'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'filter_add_params','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'selector_cond','this_tag'=>'var'],null,$this),$this)?>
">&#9660;</a></span>
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_df74df'];$_93a9cf_local_vars=$_93a9cf_old_vars['_df74df'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b223a7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b223a7'];?>

</th>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_76c60c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_76c60c'];?>

<?php endif;$c_c1c3c0=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_c1c3c0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c1c3c0'];?>

</tr>
<?php $_93a9cf_old_params['_cccf45']=$_93a9cf_local_params;$_93a9cf_old_vars['_cccf45']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_single_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_b83b3a']=$_93a9cf_local_params;$_93a9cf_old_vars['_b83b3a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_from','ne'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'show_all_selected','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b83b3a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b83b3a'];?>

  <?php $_93a9cf_old_params['_21b6ce']=$_93a9cf_local_params;$_93a9cf_old_vars['_21b6ce']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_to','ne'=>'$object_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'show_all_selected','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_21b6ce'];$_93a9cf_local_vars=$_93a9cf_old_vars['_21b6ce'];?>

  <?php $_93a9cf_old_params['_284de8']=$_93a9cf_local_params;$_93a9cf_old_vars['_284de8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'show_all_selected','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_284de8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_284de8'];?>

  <?php $_93a9cf_old_params['_d1f8a3']=$_93a9cf_local_params;$_93a9cf_old_vars['_d1f8a3']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'editable_count','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'show_all_selected','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d1f8a3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d1f8a3'];?>

  <?php $_93a9cf_old_params['_171955']=$_93a9cf_local_params;$_93a9cf_old_vars['_171955']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_all_selected','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <tr>
    <td colspan="<?php echo $this->function_var($this->setup_args(['name'=>'list_colspan','this_tag'=>'var'],null,$this),$this)?>
" class="all-selected-cell">
<label class="custom-control custom-checkbox" style="display:block;">
  <input type="checkbox" class="custom-control-input cb-all-selected" name="all_selected" value="1">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description"></span>
    &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>'Select all %s items','params'=>'$editable_count','this_tag'=>'trans'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'max_batch_actions','setvar'=>'max_batch_actions','this_tag'=>'property'],null,$this),$this),$this->setup_args('max_batch_actions','setvar',$this),$this,'setvar')?>

    <?php $_93a9cf_old_params['_f84367']=$_93a9cf_local_params;$_93a9cf_old_vars['_f84367']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'max_batch_actions','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_73e2a7']=$_93a9cf_local_params;$_93a9cf_old_vars['_73e2a7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'editable_count','gt'=>'$max_batch_actions','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
(<?php echo $this->function_trans($this->setup_args(['phrase'=>'Maximum number of executions is %s','params'=>'$max_batch_actions','this_tag'=>'trans'],null,$this),$this)?>
)<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_73e2a7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_73e2a7'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f84367'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f84367'];?>

</label>
    </td>
<script>
$('.all-selected-cell').hide();
</script>
  </tr>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_171955'];$_93a9cf_local_vars=$_93a9cf_old_vars['_171955'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cccf45'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cccf45'];?>

<?php $c_2bf895=ob_get_clean();$c_2bf895=$this->block_setvarblock($a_2bf895,$c_2bf895,$this,$r_2bf895,1,'_2bf895');echo($c_2bf895); $_93a9cf_local_params=$_93a9cf_old_params['_2bf895'];?>

<table class="full table-sm list-actions-table">
<tr>
<td class="list-actions-col">
<?php $_93a9cf_old_params['_892467']=$_93a9cf_local_params;$_93a9cf_old_vars['_892467']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_action','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_3703ea']=$_93a9cf_local_params;$_93a9cf_old_vars['_3703ea']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $c_2b9aa5=null;$_93a9cf_old_params['_2b9aa5']=$_93a9cf_local_params;$_93a9cf_old_vars['_2b9aa5']=$_93a9cf_local_vars;$a_2b9aa5=$this->setup_args(['name'=>'delete_button','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <button type="button" class="__delete list-delete-btn btn btn-secondary btn-sm">
  <i class="fa fa-trash" aria-hidden="true"></i>
  <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
  </button>
<?php $c_2b9aa5=ob_get_clean();$c_2b9aa5=$this->block_setvarblock($a_2b9aa5,$c_2b9aa5,$this,$r_2b9aa5,1,'_2b9aa5');echo($c_2b9aa5); $_93a9cf_local_params=$_93a9cf_old_params['_2b9aa5'];?>

<?php $_93a9cf_old_params['_eeac79']=$_93a9cf_local_params;$_93a9cf_old_vars['_eeac79']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_delete','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_var($this->setup_args(['name'=>'delete_button','this_tag'=>'var'],null,$this),$this)?>

<?php else:?>

  <?php $_93a9cf_old_params['_a2ed21']=$_93a9cf_local_params;$_93a9cf_old_vars['_a2ed21']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_fffd66']=$_93a9cf_local_params;$_93a9cf_old_vars['_fffd66']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_delete_any','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'delete_button','this_tag'=>'var'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fffd66'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fffd66'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a2ed21'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a2ed21'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eeac79'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eeac79'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3703ea'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3703ea'];?>

<?php $_93a9cf_old_params['_4c5555']=$_93a9cf_local_params;$_93a9cf_old_vars['_4c5555']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_8d1542']=$_93a9cf_local_params;$_93a9cf_old_vars['_8d1542']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_actions','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'has_actions','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'actions_count','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php $c_4989d2=null;$_93a9cf_old_params['_4989d2']=$_93a9cf_local_params;$_93a9cf_old_vars['_4989d2']=$_93a9cf_local_vars;$a_4989d2=$this->setup_args(['name'=>'list_actions_options-dd','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<?php $c_38d112=null;$_93a9cf_old_params['_38d112']=$_93a9cf_local_params;$_93a9cf_old_vars['_38d112']=$_93a9cf_local_vars;$a_38d112=$this->setup_args(['name'=>'list_actions','this_tag'=>'loop'],null,$this);$_38d112=-1;$r_38d112=true;while($r_38d112===true):$r_38d112=($_38d112!==-1)?false:true;echo $this->block_loop($a_38d112,$c_38d112,$this,$r_38d112,++$_38d112,'_38d112');ob_start();?>
<?php $c_38d112 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_38d112=false;}if($c_38d112 ):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'actions_count','value'=>'$__counter__','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_5567f9']=$_93a9cf_local_params;$_93a9cf_old_vars['_5567f9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_ce2817=null;$_93a9cf_old_params['_ce2817']=$_93a9cf_local_params;$_93a9cf_old_vars['_ce2817']=$_93a9cf_local_vars;$a_ce2817=$this->setup_args(['name'=>'input_options','this_tag'=>'loop'],null,$this);$_ce2817=-1;$r_ce2817=true;while($r_ce2817===true):$r_ce2817=($_ce2817!==-1)?false:true;echo $this->block_loop($a_ce2817,$c_ce2817,$this,$r_ce2817,++$_ce2817,'_ce2817');ob_start();?>
<?php $c_ce2817 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ce2817=false;}if($c_ce2817 ):?>

<?php $_93a9cf_old_params['_a19f00']=$_93a9cf_local_params;$_93a9cf_old_vars['_a19f00']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<select name="" class="_action_input-options-<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
 custom-select hidden form-control-sm very-short list-actions-options"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a19f00'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a19f00'];?>

<option value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
" data-hint="<?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'hint','translate'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate')?>
" data-modal="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'modal','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'$label','component'=>'$component_name','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php $_93a9cf_old_params['_abd59e']=$_93a9cf_local_params;$_93a9cf_old_vars['_abd59e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_abd59e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_abd59e'];?>

<?php endif;$c_ce2817=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_ce2817'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ce2817'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5567f9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5567f9'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'input_options','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$c_38d112=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_38d112'];$_93a9cf_local_vars=$_93a9cf_old_vars['_38d112'];?>

<?php $c_4989d2=ob_get_clean();$c_4989d2=$this->block_setvarblock($a_4989d2,$c_4989d2,$this,$r_4989d2,1,'_4989d2');echo($c_4989d2); $_93a9cf_local_params=$_93a9cf_old_params['_4989d2'];?>

<?php $c_de9407=null;$_93a9cf_old_params['_de9407']=$_93a9cf_local_params;$_93a9cf_old_vars['_de9407']=$_93a9cf_local_vars;$a_de9407=$this->setup_args(['name'=>'list_actions','this_tag'=>'loop'],null,$this);$_de9407=-1;$r_de9407=true;while($r_de9407===true):$r_de9407=($_de9407!==-1)?false:true;echo $this->block_loop($a_de9407,$c_de9407,$this,$r_de9407,++$_de9407,'_de9407');ob_start();?>
<?php $c_de9407 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_de9407=false;}if($c_de9407 ):?>

<?php $_93a9cf_old_params['_d38c45']=$_93a9cf_local_params;$_93a9cf_old_vars['_d38c45']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<select aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Action...','this_tag'=>'trans'],null,$this),$this)?>
" name="action_name" data-pos="<?php $_93a9cf_old_params['_e5a868']=$_93a9cf_local_params;$_93a9cf_old_vars['_e5a868']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_action_bar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
bottom<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e5a868'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e5a868'];?>
" class="select-action form-control custom-select form-control-sm very-short">
  <?php echo $this->function_setvar($this->setup_args(['name'=>'has_actions','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'Action...','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d38c45'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d38c45'];?>

  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
" data-hint="<?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'hint','translate'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate')?>
" data-allow_empty="<?php echo $this->function_var($this->setup_args(['name'=>'allow_empty','this_tag'=>'var'],null,$this),$this)?>
" data-modal="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'modal','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="<?php $_93a9cf_old_params['_d81bce']=$_93a9cf_local_params;$_93a9cf_old_vars['_d81bce']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
with-input<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'input','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d81bce'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d81bce'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
  <?php echo $this->function_setvar($this->setup_args(['name'=>'hint','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_e69991']=$_93a9cf_local_params;$_93a9cf_old_vars['_e69991']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'UTF8,UTF8(without ID),Shift_JIS,Shift_JIS(without ID)','split'=>',','setvar'=>'export_loop','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('export_loop','setvar',$this),$this,'setvar')?>

<?php $c_490c62=null;$_93a9cf_old_params['_490c62']=$_93a9cf_local_params;$_93a9cf_old_vars['_490c62']=$_93a9cf_local_vars;$a_490c62=$this->setup_args(['name'=>'export_loop','this_tag'=>'loop'],null,$this);$_490c62=-1;$r_490c62=true;while($r_490c62===true):$r_490c62=($_490c62!==-1)?false:true;echo $this->block_loop($a_490c62,$c_490c62,$this,$r_490c62,++$_490c62,'_490c62');ob_start();?>
<?php $c_490c62 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_490c62=false;}if($c_490c62 ):?>

<?php $_93a9cf_old_params['_b14209']=$_93a9cf_local_params;$_93a9cf_old_vars['_b14209']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<select aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Export Type','this_tag'=>'trans'],null,$this),$this)?>
" name="itemset_export_select" class="custom-select itemset_export_options hidden form-control-sm very-short action-export-select">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b14209'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b14209'];?>

  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'$__value__','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php $_93a9cf_old_params['_470778']=$_93a9cf_local_params;$_93a9cf_old_vars['_470778']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_470778'];$_93a9cf_local_vars=$_93a9cf_old_vars['_470778'];?>

<?php endif;$c_490c62=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_490c62'];$_93a9cf_local_vars=$_93a9cf_old_vars['_490c62'];?>

<?php $_93a9cf_old_params['_ba1981']=$_93a9cf_local_params;$_93a9cf_old_vars['_ba1981']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_91f91c=null;$_93a9cf_old_params['_91f91c']=$_93a9cf_local_params;$_93a9cf_old_vars['_91f91c']=$_93a9cf_local_vars;$a_91f91c=$this->setup_args(['name'=>'status_loop','this_tag'=>'loop'],null,$this);$_91f91c=-1;$r_91f91c=true;while($r_91f91c===true):$r_91f91c=($_91f91c!==-1)?false:true;echo $this->block_loop($a_91f91c,$c_91f91c,$this,$r_91f91c,++$_91f91c,'_91f91c');ob_start();?>
<?php $c_91f91c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_91f91c=false;}if($c_91f91c ):?>

<?php $_93a9cf_old_params['_7f4a2a']=$_93a9cf_local_params;$_93a9cf_old_vars['_7f4a2a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<select aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Status','this_tag'=>'trans'],null,$this),$this)?>
" name="itemset_status_select" class="custom-select hidden form-control-sm very-short action-status-select">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7f4a2a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7f4a2a'];?>

<?php $_93a9cf_old_params['_fd41c8']=$_93a9cf_local_params;$_93a9cf_old_vars['_fd41c8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_c2a357']=$_93a9cf_local_params;$_93a9cf_old_vars['_c2a357']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
" <?php $_93a9cf_old_params['_855d0c']=$_93a9cf_local_params;$_93a9cf_old_vars['_855d0c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_default_status','eq'=>'$__index__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_855d0c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_855d0c'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'$__value__','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c2a357'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c2a357'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fd41c8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fd41c8'];?>

<?php $_93a9cf_old_params['_c50c8d']=$_93a9cf_local_params;$_93a9cf_old_vars['_c50c8d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c50c8d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c50c8d'];?>

<?php endif;$c_91f91c=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_91f91c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_91f91c'];?>
<?php else:?>

<?php $c_21e920=null;$_93a9cf_old_params['_21e920']=$_93a9cf_local_params;$_93a9cf_old_vars['_21e920']=$_93a9cf_local_vars;$a_21e920=$this->setup_args(['name'=>'status_loop','this_tag'=>'loop'],null,$this);$_21e920=-1;$r_21e920=true;while($r_21e920===true):$r_21e920=($_21e920!==-1)?false:true;echo $this->block_loop($a_21e920,$c_21e920,$this,$r_21e920,++$_21e920,'_21e920');ob_start();?>
<?php $c_21e920 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_21e920=false;}if($c_21e920 ):?>

<?php $_93a9cf_old_params['_c79d70']=$_93a9cf_local_params;$_93a9cf_old_vars['_c79d70']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<select aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Status','this_tag'=>'trans'],null,$this),$this)?>
" name="itemset_status_select" class="custom-select hidden form-control-sm very-short action-status-select">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c79d70'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c79d70'];?>

<?php $_93a9cf_old_params['_4c0428']=$_93a9cf_local_params;$_93a9cf_old_vars['_4c0428']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
" <?php $_93a9cf_old_params['_8a1253']=$_93a9cf_local_params;$_93a9cf_old_vars['_8a1253']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_default_status','eq'=>'$__counter__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8a1253'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8a1253'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'$__value__','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4c0428'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4c0428'];?>

<?php $_93a9cf_old_params['_55dfae']=$_93a9cf_local_params;$_93a9cf_old_vars['_55dfae']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_55dfae'];$_93a9cf_local_vars=$_93a9cf_old_vars['_55dfae'];?>

<?php endif;$c_21e920=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_21e920'];$_93a9cf_local_vars=$_93a9cf_old_vars['_21e920'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ba1981'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ba1981'];?>

<?php $_93a9cf_old_params['_0a5de2']=$_93a9cf_local_params;$_93a9cf_old_vars['_0a5de2']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'disp_action_bar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<input aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Input Text','this_tag'=>'trans'],null,$this),$this)?>
" id="action-input-box" data-pos="top" name="itemset_action_input" class="short-padding itemset-action-input hidden form-control-sm" type="text">
<input aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Input Date and Time','this_tag'=>'trans'],null,$this),$this)?>
" id="action-datetime-box" data-pos="top" name="" class="short-padding itemset-datetime-input hidden form-control-sm" type="datetime-local">
<?php else:?>

<input aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Input Text','this_tag'=>'trans'],null,$this),$this)?>
" id="action-input-box-bottom" name="itemset_action_input" class="short-padding itemset-action-input hidden form-control-sm" type="text">
<input aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Input Date and Time','this_tag'=>'trans'],null,$this),$this)?>
" id="action-datetime-box-bottom" name="" class="short-padding itemset-datetime-input hidden form-control-sm" type="datetime-local">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0a5de2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0a5de2'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'list_actions_options-dd','this_tag'=>'var'],null,$this),$this)?>

<button class="__action list-action-btn btn btn-secondary action-button btn-sm" type="submit"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Go','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e69991'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e69991'];?>

<?php endif;$c_de9407=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_de9407'];$_93a9cf_local_vars=$_93a9cf_old_vars['_de9407'];?>

<?php $_93a9cf_old_params['_863fbd']=$_93a9cf_local_params;$_93a9cf_old_vars['_863fbd']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'disp_action_bar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<script>
var action_export_select = false;
var action_status_select = false;
var need_action_input = false;
var need_datetime_input = false;
last_action_hint = '';
$(function(){
    $('.select-action').change(function(){
        var action_hint = $('[name=action_name] option:selected').attr('data-hint');
        if ( action_hint ) {
            if ( action_hint != last_action_hint ) {
                alert( action_hint );
            }
        }
        last_action_hint = action_hint;
        $('.list-actions-options').hide();
        $('.action-export-select').hide();
        $('.itemset-datetime-input').hide();
        $('.list-actions-options').each(function(){
            $(this).attr( 'name', '' );
        });
        if ( $(this).val() ) {
          $('.__action').removeClass('btn-secondary');
          $('.__action').addClass('btn-primary');
        } else {
          $('.__action').removeClass('btn-primary');
          $('.__action').addClass('btn-secondary');
        }
        $('.select-action').val($(this).val());
        if ( $(this).val() == 'set_status' ) {
            $('.action-status-select').addClass('form-control');
            $('.action-status-select').show();
            action_status_select = true;
            action_export_select = false;
        } else if ( $(this).val() == 'export_objects' ) {
            $('.action-export-select').addClass('form-control');
            $('.action-export-select').show();
            $('.action-status-select').hide();
            action_export_select = true;
            action_status_select = false;
        } else {
            $('.action-status-select').hide();
            action_status_select = false;
            action_export_select = false;
        }
        var opt_class = $('[name=action_name] option:selected').attr('class');
        if ( opt_class == 'with-input' ) {
            var dd_class = '._action_input-options-' + $(this).val();
            if( $(dd_class).length ){
                $('.itemset-action-input').attr( 'name', '' );
                $('.itemset-action-input').hide();
                $(dd_class).show();
                $(dd_class).css( 'display', 'inline' );
                $(dd_class).attr( 'name', 'itemset_action_input' );
                return;
            }
            $('.itemset-action-input').val('');
            $('.itemset-action-input').addClass('form-control');
            $('.itemset-action-input').show();
            $('.itemset-action-input').attr( 'name', 'itemset_action_input' );
            if ( $(this).attr('data-pos') ) {
                $('#action-input-box-bottom').focus();
            } else {
                $('#action-input-box').focus();
            }
            var allow_empty = $('[name=action_name] option:selected').attr('data-allow_empty');
            if (! allow_empty ) {
                need_action_input = true;
            } else {
                need_action_input = false;
            }
            need_datetime_input = false;
        } else if ( opt_class == 'datetime-local' ) {
            $('.itemset-datetime-input').val('');
            $('.itemset-action-input').hide();
            $('.itemset-datetime-input').addClass('form-control');
            $('.itemset-datetime-input').show();
            $('.itemset-datetime-input').attr( 'name', 'itemset_action_input' );
            if ( $(this).attr('data-pos') ) {
                $('#action-datetime-box-bottom').focus();
            } else {
                $('#action-datetime-box').focus();
            }
            need_action_input = false;
            need_datetime_input = true;
        } else {
            $('.itemset-action-input').hide();
            $('.itemset-datetime-input').hide();
            need_action_input = false;
            need_datetime_input = false;
        }
    });
    $('.itemset-action-input').change(function(){
        $('.itemset-action-input').val($(this).val());
    });
    $('.itemset-datetime-input').change(function(){
        $('.itemset-datetime-input').val($(this).val());
    });
    $('.action-status-select').change(function(){
        $('.action-status-select').val($(this).val());
    });
    $('.action-export-select').change(function(){
        $('.action-export-select').val($(this).val());
    });
    $('.list-actions-options').change(function(){
        let classes = $(this).attr('class').split( /\s+/ );
        for ( let clsss of classes ) {
            if ( clsss.indexOf('_action_input-options-') === 0 ) {
                $('.'+clsss).val($(this).val());
                break;
            }
        }
    });
});
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_863fbd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_863fbd'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8d1542'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8d1542'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4c5555'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4c5555'];?>

<?php $_93a9cf_old_params['_47988a']=$_93a9cf_local_params;$_93a9cf_old_vars['_47988a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_sortable','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <button type="submit" class="__save_order save-order-btn btn btn-secondary btn-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Order','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_47988a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_47988a'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_892467'];$_93a9cf_local_vars=$_93a9cf_old_vars['_892467'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'search_box','this_tag'=>'var'],null,$this),$this)?>

<script>
var $win = $(window);
var windowWidth = window.innerWidth;
if ( windowWidth > 768 ) {
    $('.alt-search-button').hide();
} else {
    $('.alt-search-button').show();
}
</script>
</td>
<?php $c_5285b5=null;$_93a9cf_old_params['_5285b5']=$_93a9cf_local_params;$_93a9cf_old_vars['_5285b5']=$_93a9cf_local_vars;$a_5285b5=$this->setup_args(['name'=>'pagenation_cell','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<td class="pagination-col">
<?php $_93a9cf_old_params['_2fe09b']=$_93a9cf_local_params;$_93a9cf_old_vars['_2fe09b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_per_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<nav aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Page navigation','this_tag'=>'trans'],null,$this),$this)?>
" class="pull-right">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2fe09b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2fe09b'];?>

  <ul class="pagination pagination-sm">
<?php $_93a9cf_old_params['_69817f']=$_93a9cf_local_params;$_93a9cf_old_vars['_69817f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_prev','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_f15ad5']=$_93a9cf_local_params;$_93a9cf_old_vars['_f15ad5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'prev_offset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <li class="page-item">
      <a title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'First','this_tag'=>'trans'],null,$this),$this)?>
" class="page-link" href="<?php $_93a9cf_old_params['_4c8607']=$_93a9cf_local_params;$_93a9cf_old_vars['_4c8607']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_prev','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'sort_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'query_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_93a9cf_old_params['_8de5c6']=$_93a9cf_local_params;$_93a9cf_old_vars['_8de5c6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8de5c6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8de5c6'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'filter_add_params','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'selector_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'revision_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php else:?>
#<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4c8607'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4c8607'];?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'First','this_tag'=>'trans'],null,$this),$this)?>
">
        <i style="margin: auto -1px" class="fa fa-angle-double-left" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'First','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </a>
    </li>
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f15ad5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f15ad5'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_69817f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_69817f'];?>

    <li class="page-item <?php $_93a9cf_old_params['_7512ed']=$_93a9cf_local_params;$_93a9cf_old_vars['_7512ed']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'has_prev','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7512ed'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7512ed'];?>
">
      <a title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Previous','this_tag'=>'trans'],null,$this),$this)?>
" class="page-link" href="<?php $_93a9cf_old_params['_8d0cda']=$_93a9cf_local_params;$_93a9cf_old_vars['_8d0cda']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_prev','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
&amp;offset=<?php echo $this->function_var($this->setup_args(['name'=>'prev_offset','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'sort_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'query_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_93a9cf_old_params['_c60846']=$_93a9cf_local_params;$_93a9cf_old_vars['_c60846']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c60846'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c60846'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'filter_add_params','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'selector_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'revision_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php else:?>
#<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8d0cda'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8d0cda'];?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Previous','this_tag'=>'trans'],null,$this),$this)?>
">
        <i style="margin: auto 1px" class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Previous','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </a>
    </li>
    <li class="page-item <?php $_93a9cf_old_params['_2f898c']=$_93a9cf_local_params;$_93a9cf_old_vars['_2f898c']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'next_offset','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
disabled<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2f898c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2f898c'];?>
">
      <a title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Next','this_tag'=>'trans'],null,$this),$this)?>
" class="page-link" href="<?php $_93a9cf_old_params['_a15a9b']=$_93a9cf_local_params;$_93a9cf_old_vars['_a15a9b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'next_offset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
&amp;offset=<?php echo $this->function_var($this->setup_args(['name'=>'next_offset','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'sort_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'query_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_93a9cf_old_params['_bcc22b']=$_93a9cf_local_params;$_93a9cf_old_vars['_bcc22b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bcc22b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bcc22b'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'filter_add_params','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'selector_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'revision_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php else:?>
#<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a15a9b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a15a9b'];?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Next','this_tag'=>'trans'],null,$this),$this)?>
">
        <i style="margin: auto 1px" class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Next','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </a>
    </li>
<?php $_93a9cf_old_params['_fe96fc']=$_93a9cf_local_params;$_93a9cf_old_vars['_fe96fc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'last_offset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <li class="page-item">
      <a title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Last','this_tag'=>'trans'],null,$this),$this)?>
" class="page-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
&amp;offset=<?php echo $this->function_var($this->setup_args(['name'=>'last_offset','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'sort_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'query_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_93a9cf_old_params['_6e4a46']=$_93a9cf_local_params;$_93a9cf_old_vars['_6e4a46']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6e4a46'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6e4a46'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'filter_add_params','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'selector_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'revision_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Last','this_tag'=>'trans'],null,$this),$this)?>
">
        <i style="margin: auto -1px" class="fa fa-angle-double-right" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Last','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </a>
    </li>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fe96fc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fe96fc'];?>

  </ul>
</nav>

<?php $_93a9cf_old_params['_32b8ff']=$_93a9cf_local_params;$_93a9cf_old_vars['_32b8ff']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_per_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="pull-right page-current">
  <?php echo $this->function_trans($this->setup_args(['phrase'=>'%s - %s of %s Items','params'=>'\'$list_from\',\'$list_to\',\'$object_count\'','this_tag'=>'trans'],null,$this),$this)?>

</div>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_32b8ff'];$_93a9cf_local_vars=$_93a9cf_old_vars['_32b8ff'];?>

</td>
<?php $c_5285b5=ob_get_clean();$c_5285b5=$this->block_setvarblock($a_5285b5,$c_5285b5,$this,$r_5285b5,1,'_5285b5');echo($c_5285b5); $_93a9cf_local_params=$_93a9cf_old_params['_5285b5'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'pagenation_cell','this_tag'=>'var'],null,$this),$this)?>

</tr>
<tr><td colspan="3">
  <?php echo $this->function_var($this->setup_args(['name'=>'current_filter','this_tag'=>'var'],null,$this),$this)?>

</td></tr>
</table>

<?php $c_f37d35=null;$_93a9cf_old_params['_f37d35']=$_93a9cf_local_params;$_93a9cf_old_vars['_f37d35']=$_93a9cf_local_vars;$a_f37d35=$this->setup_args(['name'=>'list_items','this_tag'=>'loop'],null,$this);$_f37d35=-1;$r_f37d35=true;while($r_f37d35===true):$r_f37d35=($_f37d35!==-1)?false:true;echo $this->block_loop($a_f37d35,$c_f37d35,$this,$r_f37d35,++$_f37d35,'_f37d35');ob_start();?>
<?php $c_f37d35 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f37d35=false;}if($c_f37d35 ):?>

<?php $_93a9cf_old_params['_3cfae5']=$_93a9cf_local_params;$_93a9cf_old_vars['_3cfae5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<table class="table table-striped table-sm listing-table table-hover <?php $_93a9cf_old_params['_86620e']=$_93a9cf_local_params;$_93a9cf_old_vars['_86620e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_sortable','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
listing-table_sortable<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_86620e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_86620e'];?>
">
<thead>
<?php echo $this->function_var($this->setup_args(['name'=>'table_header','this_tag'=>'var'],null,$this),$this)?>

</thead>
<tbody id="list_body">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3cfae5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3cfae5'];?>

<tr id="line_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_93a9cf_old_params['_abcd6b']=$_93a9cf_local_params;$_93a9cf_old_vars['_abcd6b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_this_model','eq'=>'log','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_de4f6a']=$_93a9cf_local_params;$_93a9cf_old_vars['_de4f6a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'level','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="background-color:#fee;color:#b00"<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'level','eq'=>'8','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
 style="background-color:#fee;color:#b00"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_de4f6a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_de4f6a'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_abcd6b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_abcd6b'];?>
>
<?php echo $this->function_setvar($this->setup_args(['name'=>'column_vars','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php $c_c76c26=null;$_93a9cf_old_params['_c76c26']=$_93a9cf_local_params;$_93a9cf_old_vars['_c76c26']=$_93a9cf_local_vars;$a_c76c26=$this->setup_args(['name'=>'list_cols','this_tag'=>'loop'],null,$this);$_c76c26=-1;$r_c76c26=true;while($r_c76c26===true):$r_c76c26=($_c76c26!==-1)?false:true;echo $this->block_loop($a_c76c26,$c_c76c26,$this,$r_c76c26,++$_c76c26,'_c76c26');ob_start();?>
<?php $c_c76c26 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c76c26=false;}if($c_c76c26 ):?>

<?php $_93a9cf_old_params['_fb8ccc']=$_93a9cf_local_params;$_93a9cf_old_vars['_fb8ccc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_80505b']=$_93a9cf_local_params;$_93a9cf_old_vars['_80505b']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<td>
  <?php echo $this->function_setvar($this->setup_args(['name'=>'has_checkbox','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $_93a9cf_old_params['_5ea8a3']=$_93a9cf_local_params;$_93a9cf_old_vars['_5ea8a3']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'status','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_checkbox','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php $_93a9cf_old_params['_eb31b7']=$_93a9cf_local_params;$_93a9cf_old_vars['_eb31b7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status','le'=>'$_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_checkbox','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_checkbox','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eb31b7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eb31b7'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5ea8a3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5ea8a3'];?>

  <?php $_93a9cf_old_params['_57f272']=$_93a9cf_local_params;$_93a9cf_old_vars['_57f272']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_39a519']=$_93a9cf_local_params;$_93a9cf_old_vars['_39a519']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$_this_model','column'=>'workspace_id','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_704b1a']=$_93a9cf_local_params;$_93a9cf_old_vars['_704b1a']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['model'=>'$_this_model','action'=>'delete','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_checkbox','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_checkbox','value'=>'$actions_count','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_704b1a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_704b1a'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_39a519'];$_93a9cf_local_vars=$_93a9cf_old_vars['_39a519'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_57f272'];$_93a9cf_local_vars=$_93a9cf_old_vars['_57f272'];?>

  <?php $_93a9cf_old_params['_cd8889']=$_93a9cf_local_params;$_93a9cf_old_vars['_cd8889']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_single_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $c_b80374=null;$_93a9cf_old_params['_b80374']=$_93a9cf_local_params;$_93a9cf_old_vars['_b80374']=$_93a9cf_local_vars;$a_b80374=$this->setup_args(['name'=>'selector_checkbox','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <label class="custom-control custom-checkbox">
      <input id="box_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" type="checkbox" name="id[]"
        value="<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input"
        aria-label="<?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'Select or deselect %s in this row.','params'=>'$label','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description"></span>
    </label>
  <?php $c_b80374=ob_get_clean();$c_b80374=$this->block_setvarblock($a_b80374,$c_b80374,$this,$r_b80374,1,'_b80374');echo($c_b80374); $_93a9cf_local_params=$_93a9cf_old_params['_b80374'];?>

  <?php $_93a9cf_old_params['_d014b9']=$_93a9cf_local_params;$_93a9cf_old_vars['_d014b9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_checkbox','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_51b9a0']=$_93a9cf_local_params;$_93a9cf_old_vars['_51b9a0']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'$this_model','id'=>'$id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'selector_checkbox','this_tag'=>'var'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'selector_checkbox','this_tag'=>'var'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_9e7183']=$_93a9cf_local_params;$_93a9cf_old_vars['_9e7183']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'show_detail_link','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_93a9cf_old_params['_476b30']=$_93a9cf_local_params;$_93a9cf_old_vars['_476b30']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_actions','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_var($this->setup_args(['name'=>'selector_checkbox','this_tag'=>'var'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_476b30'];$_93a9cf_local_vars=$_93a9cf_old_vars['_476b30'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9e7183'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9e7183'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_51b9a0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_51b9a0'];?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_9afb61']=$_93a9cf_local_params;$_93a9cf_old_vars['_9afb61']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'show_detail_link','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_93a9cf_old_params['_779622']=$_93a9cf_local_params;$_93a9cf_old_vars['_779622']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_actions','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'selector_checkbox','this_tag'=>'var'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_779622'];$_93a9cf_local_vars=$_93a9cf_old_vars['_779622'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9afb61'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9afb61'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d014b9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d014b9'];?>

  <?php else:?>

    <label class="custom-control custom-radio">
      <input type="radio" id="box_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" name="id" value="<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description"></span>
    </label>
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cd8889'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cd8889'];?>

</td>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_80505b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_80505b'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fb8ccc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fb8ccc'];?>

<?php $_93a9cf_old_params['_678a7f']=$_93a9cf_local_params;$_93a9cf_old_vars['_678a7f']=$_93a9cf_local_vars;if($this->conditional_ifinarray($this->setup_args(['value'=>'$_name','array'=>'$show_cols','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

<td <?php $_93a9cf_old_params['_d9a823']=$_93a9cf_local_params;$_93a9cf_old_vars['_d9a823']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_2e9f2a']=$_93a9cf_local_params;$_93a9cf_old_vars['_2e9f2a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_icon','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="line-height:1.6em;"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2e9f2a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2e9f2a'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d9a823'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d9a823'];?>
 class="<?php $_93a9cf_old_params['_74d676']=$_93a9cf_local_params;$_93a9cf_old_vars['_74d676']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_name','eq'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
id <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_74d676'];$_93a9cf_local_vars=$_93a9cf_old_vars['_74d676'];?>
<?php $_93a9cf_old_params['_612b47']=$_93a9cf_local_params;$_93a9cf_old_vars['_612b47']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list','eq'=>'number','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_0fe2c7']=$_93a9cf_local_params;$_93a9cf_old_vars['_0fe2c7']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'sort_order','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_8696b1']=$_93a9cf_local_params;$_93a9cf_old_vars['_8696b1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_name','ne'=>'status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
num<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8696b1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8696b1'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0fe2c7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0fe2c7'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_612b47'];$_93a9cf_local_vars=$_93a9cf_old_vars['_612b47'];?>
 list-col<?php $_93a9cf_old_params['_e2191a']=$_93a9cf_local_params;$_93a9cf_old_vars['_e2191a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
-primary primary<?php else:?>
 not-primary<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e2191a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e2191a'];?>
">
  <?php $_93a9cf_old_params['_32e646']=$_93a9cf_local_params;$_93a9cf_old_vars['_32e646']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_b4f754']=$_93a9cf_local_params;$_93a9cf_old_vars['_b4f754']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_get_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$_get_col','escape'=>'','setvar'=>'_get_col_value','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('_get_col_value','setvar',$this),$this,'setvar')?>

    <?php $_93a9cf_old_params['_b60dd2']=$_93a9cf_local_params;$_93a9cf_old_vars['_b60dd2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.from_obj','eq'=>'group','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_ac2d7c']=$_93a9cf_local_params;$_93a9cf_old_vars['_ac2d7c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_file','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $c_2e62f0=null;$_93a9cf_old_params['_2e62f0']=$_93a9cf_local_params;$_93a9cf_old_vars['_2e62f0']=$_93a9cf_local_vars;$a_2e62f0=$this->setup_args(['name'=>'_get_col_value','prepend'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>

        <div class="assets-child-thumb mr-2 mt-0" data-model="<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
" data-id="<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" style="margin-top: -5px !important;background-image:url('<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=get_thumbnail&amp;square=1&amp;_model=<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
')"></div>
        <?php $c_2e62f0=ob_get_clean();$c_2e62f0=$this->block_setvarblock($a_2e62f0,$c_2e62f0,$this,$r_2e62f0,1,'_2e62f0');echo($c_2e62f0); $_93a9cf_local_params=$_93a9cf_old_params['_2e62f0'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ac2d7c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ac2d7c'];?>

        <?php $c_5757f8=null;$_93a9cf_old_params['_5757f8']=$_93a9cf_local_params;$_93a9cf_old_vars['_5757f8']=$_93a9cf_local_vars;$a_5757f8=$this->setup_args(['name'=>'_get_col_value','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>

          <?php $_93a9cf_old_params['_1ffb8a']=$_93a9cf_local_params;$_93a9cf_old_vars['_1ffb8a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_status_text','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <span class="badge badge-status ml-2" style="background-color:white;color:black"> <?php echo $this->function_var($this->setup_args(['name'=>'_status_text','this_tag'=>'var'],null,$this),$this)?>
 </span>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1ffb8a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1ffb8a'];?>

        <?php $c_5757f8=ob_get_clean();$c_5757f8=$this->block_setvarblock($a_5757f8,$c_5757f8,$this,$r_5757f8,1,'_5757f8');echo($c_5757f8); $_93a9cf_local_params=$_93a9cf_old_params['_5757f8'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b60dd2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b60dd2'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b4f754'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b4f754'];?>

    <?php $_93a9cf_old_params['_35ab97']=$_93a9cf_local_params;$_93a9cf_old_vars['_35ab97']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'urlinfo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_2e60af']=$_93a9cf_local_params;$_93a9cf_old_vars['_2e60af']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','eq'=>'urls','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_model_primary','escape'=>'','setvar'=>'_get_col_value','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('_get_col_value','setvar',$this),$this,'setvar')?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2e60af'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2e60af'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_35ab97'];$_93a9cf_local_vars=$_93a9cf_old_vars['_35ab97'];?>

    <input type="hidden" id="_get_col_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_get_col_value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_32e646'];$_93a9cf_local_vars=$_93a9cf_old_vars['_32e646'];?>

  
<?php $c_1da6d7=null;$_93a9cf_old_params['_1da6d7']=$_93a9cf_local_params;$_93a9cf_old_vars['_1da6d7']=$_93a9cf_local_vars;$a_1da6d7=$this->setup_args(['name'=>'col_content','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_name','escape'=>'','setvar'=>'__col_name__','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('__col_name__','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_c8d1a7']=$_93a9cf_local_params;$_93a9cf_old_vars['_c8d1a7']=$_93a9cf_local_vars;if($this->conditional_isarray($this->setup_args(['name'=>'$_name','this_tag'=>'isarray'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'$_name','setvar'=>'__col_values__','this_tag'=>'var'],null,$this),$this),$this->setup_args('__col_values__','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'__escaped_values','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $c_5e306a=null;$_93a9cf_old_params['_5e306a']=$_93a9cf_local_params;$_93a9cf_old_vars['_5e306a']=$_93a9cf_local_vars;$a_5e306a=$this->setup_args(['name'=>'__col_values__','this_tag'=>'loop'],null,$this);$_5e306a=-1;$r_5e306a=true;while($r_5e306a===true):$r_5e306a=($_5e306a!==-1)?false:true;echo $this->block_loop($a_5e306a,$c_5e306a,$this,$r_5e306a,++$_5e306a,'_5e306a');ob_start();?>
<?php $c_5e306a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5e306a=false;}if($c_5e306a ):?>

    <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','setvar'=>'__escaped_value','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('__escaped_value','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'__escaped_values','value'=>'$__escaped_value','function'=>'push','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$c_5e306a=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_5e306a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5e306a'];?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__escaped_values','setvar'=>'__col_values__','this_tag'=>'var'],null,$this),$this),$this->setup_args('__col_values__','setvar',$this),$this,'setvar')?>

<?php else:?>

  <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$_name','escape'=>'','setvar'=>'__col_value__','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('__col_value__','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c8d1a7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c8d1a7'];?>

  <?php $c_59bc7d=null;$_93a9cf_old_params['_59bc7d']=$_93a9cf_local_params;$_93a9cf_old_vars['_59bc7d']=$_93a9cf_local_vars;$a_59bc7d=$this->setup_args(['name'=>'include_path','this_tag'=>'setvarblock'],null,$this);ob_start();?>
include/list/<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
/column_<?php echo $this->function_var($this->setup_args(['name'=>'_name','this_tag'=>'var'],null,$this),$this)?>
.tmpl<?php $c_59bc7d=ob_get_clean();$c_59bc7d=$this->block_setvarblock($a_59bc7d,$c_59bc7d,$this,$r_59bc7d,1,'_59bc7d');echo($c_59bc7d); $_93a9cf_local_params=$_93a9cf_old_params['_59bc7d'];?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_include($this->setup_args(['file'=>'$include_path','setvar'=>'alt_value','this_tag'=>'include'],null,$this),$this),$this->setup_args('alt_value','setvar',$this),$this,'setvar')?>

  <?php $_93a9cf_old_params['_810613']=$_93a9cf_local_params;$_93a9cf_old_vars['_810613']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'alt_value','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $c_ae0034=null;$_93a9cf_old_params['_ae0034']=$_93a9cf_local_params;$_93a9cf_old_vars['_ae0034']=$_93a9cf_local_vars;$a_ae0034=$this->setup_args(['name'=>'include_path','this_tag'=>'setvarblock'],null,$this);ob_start();?>
include/list/column_<?php echo $this->function_var($this->setup_args(['name'=>'_name','this_tag'=>'var'],null,$this),$this)?>
.tmpl<?php $c_ae0034=ob_get_clean();$c_ae0034=$this->block_setvarblock($a_ae0034,$c_ae0034,$this,$r_ae0034,1,'_ae0034');echo($c_ae0034); $_93a9cf_local_params=$_93a9cf_old_params['_ae0034'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_include($this->setup_args(['file'=>'$include_path','setvar'=>'alt_value','this_tag'=>'include'],null,$this),$this),$this->setup_args('alt_value','setvar',$this),$this,'setvar')?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_810613'];$_93a9cf_local_vars=$_93a9cf_old_vars['_810613'];?>

  <?php $_93a9cf_old_params['_9266e4']=$_93a9cf_local_params;$_93a9cf_old_vars['_9266e4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'alt_value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_var($this->setup_args(['name'=>'alt_value','this_tag'=>'var'],null,$this),$this)?>

  <?php else:?>

    <?php $_93a9cf_old_params['_259ab4']=$_93a9cf_local_params;$_93a9cf_old_vars['_259ab4']=$_93a9cf_local_vars;if($this->conditional_isarray($this->setup_args(['name'=>'$_name','this_tag'=>'isarray'],null,$this),null,$this,true,true)):?>

      <?php echo paml_htmlspecialchars($this->modifier_join($this->function_var($this->setup_args(['name'=>'$_name','join'=>', ','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args(', ','join',$this),$this,'join'),ENT_QUOTES)?>

    <?php else:?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'_can_sort','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_93a9cf_old_params['_8769a9']=$_93a9cf_local_params;$_93a9cf_old_vars['_8769a9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_name','eq'=>'order','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_93a9cf_old_params['_5e40d4']=$_93a9cf_local_params;$_93a9cf_old_vars['_5e40d4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_sortable','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'_can_sort','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5e40d4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5e40d4'];?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8769a9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8769a9'];?>

      <?php $_93a9cf_old_params['_a0aebb']=$_93a9cf_local_params;$_93a9cf_old_vars['_a0aebb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'_pull_back','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'show_edit_link','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_93a9cf_old_params['_e44b8b']=$_93a9cf_local_params;$_93a9cf_old_vars['_e44b8b']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'$this_model','id'=>'$id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'show_edit_link','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'show_detail_link','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'show_edit_link','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_has_workflow','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_578adb']=$_93a9cf_local_params;$_93a9cf_old_vars['_578adb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_pull_back','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_7aa0d3']=$_93a9cf_local_params;$_93a9cf_old_vars['_7aa0d3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_previous_owner','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_93a9cf_old_params['_810cf4']=$_93a9cf_local_params;$_93a9cf_old_vars['_810cf4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_previous_owner','eq'=>'$_admin_user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php $_93a9cf_old_params['_069100']=$_93a9cf_local_params;$_93a9cf_old_vars['_069100']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'max_status','lt'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_93a9cf_old_params['_5669bb']=$_93a9cf_local_params;$_93a9cf_old_vars['_5669bb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status','lt'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'_pull_back','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5669bb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5669bb'];?>

                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_069100'];$_93a9cf_local_vars=$_93a9cf_old_vars['_069100'];?>

              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_810cf4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_810cf4'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7aa0d3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7aa0d3'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_578adb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_578adb'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e44b8b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e44b8b'];?>

        <?php $_93a9cf_old_params['_65787c']=$_93a9cf_local_params;$_93a9cf_old_vars['_65787c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_edc7f1']=$_93a9cf_local_params;$_93a9cf_old_vars['_edc7f1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'show_edit_link','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_edc7f1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_edc7f1'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_65787c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_65787c'];?>

        <?php $_93a9cf_old_params['_e2a08f']=$_93a9cf_local_params;$_93a9cf_old_vars['_e2a08f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_file','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_0f45c5']=$_93a9cf_local_params;$_93a9cf_old_vars['_0f45c5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_icon','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="list-icon">
          <a href="javascript:void(0);" id="popover-list-<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
          <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/spacer.gif"
          style="background-image:url('<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif');background-size:25px;background-repeat:no-repeat;background-position:center center;"
          class="lazy" data-original="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_icon','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" width="32" alt="<?php echo $this->function_trans($this->setup_args(['phrase'=>'$_icon_class','this_tag'=>'trans'],null,$this),$this)?>
"> 
          </a>
          <script>
          $('#popover-list-<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
').popover({
              content: "<img src='<?php echo $this->function_var($this->setup_args(['name'=>'_icon_large','this_tag'=>'var'],null,$this),$this)?>
' alt='<?php echo $this->function_trans($this->setup_args(['phrase'=>'Preview','this_tag'=>'trans'],null,$this),$this)?>
' width='150'>",
              placement: "right",
              html: true
          });
          $('body').on('click', function (e) {
              $('#popover-list-<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
').popover('hide');
          });
          </script>
            <?php $_93a9cf_old_params['_ede8ef']=$_93a9cf_local_params;$_93a9cf_old_vars['_ede8ef']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_get_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" id="_get_col_img_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'_icon','this_tag'=>'var'],null,$this),$this)?>
">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ede8ef'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ede8ef'];?>

          </div>
          <?php else:?>

            <input type="hidden" id="_get_col_img_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=get_thumbnail&amp;square=1&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <span class="list-file-icon">
            <i class="fa-2x list-small-icon fa <?php $_93a9cf_old_params['_a235c0']=$_93a9cf_local_params;$_93a9cf_old_vars['_a235c0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_icon_class','eq'=>'image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
fa-file-image-o<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_icon_class','eq'=>'pdf','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
fa-file-pdf-o<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_icon_class','eq'=>'video','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
fa-file-video-o<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_icon_class','eq'=>'audio','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
fa-file-audio-o<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_icon_class','eq'=>'archive','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
fa-file-archive-o<?php else:?>
<?php $_93a9cf_old_params['_cbe35f']=$_93a9cf_local_params;$_93a9cf_old_vars['_cbe35f']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_icon_class','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
fa-minus<?php else:?>
fa-file-o<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cbe35f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cbe35f'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a235c0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a235c0'];?>
" aria-hidden="true"></i>
            </span>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'$_icon_class','this_tag'=>'trans'],null,$this),$this)?>
</span>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0f45c5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0f45c5'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e2a08f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e2a08f'];?>

        <?php $_93a9cf_old_params['_46915d']=$_93a9cf_local_params;$_93a9cf_old_vars['_46915d']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_07204b']=$_93a9cf_local_params;$_93a9cf_old_vars['_07204b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'rev_type','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_47ca46']=$_93a9cf_local_params;$_93a9cf_old_vars['_47ca46']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'rev_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <span class="badge badge-dark badge-pill badge-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Auto Save','this_tag'=>'trans'],null,$this),$this)?>
</span>
            <?php else:?>

            <span class="badge badge-dark badge-pill badge-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Revision','this_tag'=>'trans'],null,$this),$this)?>
</span>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_47ca46'];$_93a9cf_local_vars=$_93a9cf_old_vars['_47ca46'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_07204b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_07204b'];?>

          <?php $_93a9cf_old_params['_f52f91']=$_93a9cf_local_params;$_93a9cf_old_vars['_f52f91']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a target="_parent" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php else:?>

            <?php $_93a9cf_old_params['_0084e7']=$_93a9cf_local_params;$_93a9cf_old_vars['_0084e7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_93a9cf_old_params['_669728']=$_93a9cf_local_params;$_93a9cf_old_vars['_669728']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'show_edit_link','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_669728'];$_93a9cf_local_vars=$_93a9cf_old_vars['_669728'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0084e7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0084e7'];?>

            <?php $_93a9cf_old_params['_334615']=$_93a9cf_local_params;$_93a9cf_old_vars['_334615']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_edit_link','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <a id="edit-link-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_93a9cf_old_params['_5c7ee7']=$_93a9cf_local_params;$_93a9cf_old_vars['_5c7ee7']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php else:?>
target="_parent"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5c7ee7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5c7ee7'];?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php $_93a9cf_old_params['_a373d3']=$_93a9cf_local_params;$_93a9cf_old_vars['_a373d3']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_947731']=$_93a9cf_local_params;$_93a9cf_old_vars['_947731']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_947731'];$_93a9cf_local_vars=$_93a9cf_old_vars['_947731'];?>
<?php $_93a9cf_old_params['_5a7451']=$_93a9cf_local_params;$_93a9cf_old_vars['_5a7451']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_this_model','eq'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5a7451'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5a7451'];?>
<?php $_93a9cf_old_params['_eea144']=$_93a9cf_local_params;$_93a9cf_old_vars['_eea144']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.revision_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;edit_revision=1<?php $_93a9cf_old_params['_29fe94']=$_93a9cf_local_params;$_93a9cf_old_vars['_29fe94']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;rev_object_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.rev_object_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_29fe94'];$_93a9cf_local_vars=$_93a9cf_old_vars['_29fe94'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eea144'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eea144'];?>
<?php else:?>
dashboard&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a373d3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a373d3'];?>
<?php $_93a9cf_old_params['_f6a03a']=$_93a9cf_local_params;$_93a9cf_old_vars['_f6a03a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_93a9cf_old_params['_75c473']=$_93a9cf_local_params;$_93a9cf_old_vars['_75c473']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_6d557e']=$_93a9cf_local_params;$_93a9cf_old_vars['_6d557e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6d557e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6d557e'];?>
<?php $_93a9cf_old_params['_eb172e']=$_93a9cf_local_params;$_93a9cf_old_vars['_eb172e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_eb172e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_eb172e'];?>
<?php $_93a9cf_old_params['_40dde7']=$_93a9cf_local_params;$_93a9cf_old_vars['_40dde7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_40dde7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_40dde7'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_75c473'];$_93a9cf_local_vars=$_93a9cf_old_vars['_75c473'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f6a03a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f6a03a'];?>
<?php $_93a9cf_old_params['_1eb352']=$_93a9cf_local_params;$_93a9cf_old_vars['_1eb352']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.any_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;any_model=1<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1eb352'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1eb352'];?>
<?php $_93a9cf_old_params['_13aa70']=$_93a9cf_local_params;$_93a9cf_old_vars['_13aa70']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;_from_scope=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_13aa70'];$_93a9cf_local_vars=$_93a9cf_old_vars['_13aa70'];?>
">
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_334615'];$_93a9cf_local_vars=$_93a9cf_old_vars['_334615'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f52f91'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f52f91'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_46915d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_46915d'];?>

          <?php $_93a9cf_old_params['_7f2bfc']=$_93a9cf_local_params;$_93a9cf_old_vars['_7f2bfc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$_name','eq'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            null(id:<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
)
          <?php else:?>

            <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7f2bfc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7f2bfc'];?>

          <?php $_93a9cf_old_params['_37e541']=$_93a9cf_local_params;$_93a9cf_old_vars['_37e541']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </a>
          <?php else:?>

            <?php $_93a9cf_old_params['_9691a5']=$_93a9cf_local_params;$_93a9cf_old_vars['_9691a5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_edit_link','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </a>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9691a5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9691a5'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_37e541'];$_93a9cf_local_vars=$_93a9cf_old_vars['_37e541'];?>

          <?php $_93a9cf_old_params['_b28dc3']=$_93a9cf_local_params;$_93a9cf_old_vars['_b28dc3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'rev_type','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_1e6a80']=$_93a9cf_local_params;$_93a9cf_old_vars['_1e6a80']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            &nbsp; <span style="margin-right: -2px"><?php echo $this->component('PTTags')->hdlr_statustext($this->setup_args(['status'=>'$status','model'=>'$this_model','icon_only'=>'1','icon'=>'1','this_tag'=>'statustext'],null,$this),$this)?>
</span>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1e6a80'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1e6a80'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b28dc3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b28dc3'];?>

          <?php $_93a9cf_old_params['_fe2722']=$_93a9cf_local_params;$_93a9cf_old_vars['_fe2722']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_fe42f7']=$_93a9cf_local_params;$_93a9cf_old_vars['_fe42f7']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_53bd40']=$_93a9cf_local_params;$_93a9cf_old_vars['_53bd40']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_1f7e15']=$_93a9cf_local_params;$_93a9cf_old_vars['_1f7e15']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_93a9cf_old_params['_87a660']=$_93a9cf_local_params;$_93a9cf_old_vars['_87a660']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'allow_revision_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_93a9cf_old_params['_c7fa6f']=$_93a9cf_local_params;$_93a9cf_old_vars['_c7fa6f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status','le'=>'$max_status_for_create_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          &nbsp;
          <a data-toggle="tooltip" data-placement="top" class="create_revision" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Create Revision','this_tag'=>'trans'],null,$this),$this)?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=clone_object&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_e25b07']=$_93a9cf_local_params;$_93a9cf_old_vars['_e25b07']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e25b07'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e25b07'];?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;as_revision=1"><i class="fa fa-code-fork"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Create Revision','this_tag'=>'trans'],null,$this),$this)?>
</span></a>
              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c7fa6f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c7fa6f'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_87a660'];$_93a9cf_local_vars=$_93a9cf_old_vars['_87a660'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1f7e15'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1f7e15'];?>

          <?php $_93a9cf_old_params['_73c14e']=$_93a9cf_local_params;$_93a9cf_old_vars['_73c14e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_duplicate','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          &nbsp;
          <a class="clone_object" data-toggle="tooltip" data-placement="top" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Duplicate','this_tag'=>'trans'],null,$this),$this)?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=clone_object&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_425751']=$_93a9cf_local_params;$_93a9cf_old_vars['_425751']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_425751'];$_93a9cf_local_vars=$_93a9cf_old_vars['_425751'];?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><i class="fa fa-clone"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Duplicate','this_tag'=>'trans'],null,$this),$this)?>
</span></a>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_73c14e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_73c14e'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_53bd40'];$_93a9cf_local_vars=$_93a9cf_old_vars['_53bd40'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fe42f7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fe42f7'];?>

          <?php $_93a9cf_old_params['_371b24']=$_93a9cf_local_params;$_93a9cf_old_vars['_371b24']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_pull_back','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            &nbsp;
            <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'_workflow_notify_changes','setvar'=>'_workflow_notify','this_tag'=>'var'],null,$this),$this),$this->setup_args('_workflow_notify','setvar',$this),$this,'setvar')?>

            <?php $_93a9cf_old_params['_7605e6']=$_93a9cf_local_params;$_93a9cf_old_vars['_7605e6']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','eq'=>'$_unspecified','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_var($this->setup_args(['name'=>'_workflow_notify','value'=>'0','this_tag'=>'var'],null,$this),$this)?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7605e6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7605e6'];?>

            <?php $_93a9cf_old_params['_39dadc']=$_93a9cf_local_params;$_93a9cf_old_vars['_39dadc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_notify','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <span data-placement="top" data-toggle="tooltip" data-placement="top" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Pull Back','this_tag'=>'trans'],null,$this),$this)?>
">
              <button class="pull_back-btn" type="button" data-toggle="modal" data-target="#modal" data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=pull_back&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_12b67a']=$_93a9cf_local_params;$_93a9cf_old_vars['_12b67a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_12b67a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_12b67a'];?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;user_id=<?php echo $this->function_var($this->setup_args(['name'=>'_user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;dialog_view=1">
              <i class="fa fa-hand-o-left" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Pull Back','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </button>
              </span>
            <?php else:?>

              <button type="button" data-placement="top" class="pull_back pull_back-btn" data-toggle="tooltip" data-placement="top" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Pull Back','this_tag'=>'trans'],null,$this),$this)?>
" data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=pull_back&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_a10209']=$_93a9cf_local_params;$_93a9cf_old_vars['_a10209']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a10209'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a10209'];?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;user_id=<?php echo $this->function_var($this->setup_args(['name'=>'_user_id','this_tag'=>'var'],null,$this),$this)?>
">
              <i class="fa fa-hand-o-left" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Pull Back','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </button>
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_39dadc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_39dadc'];?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_371b24'];$_93a9cf_local_vars=$_93a9cf_old_vars['_371b24'];?>

        <?php $_93a9cf_old_params['_e85556']=$_93a9cf_local_params;$_93a9cf_old_vars['_e85556']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_0ee2e3']=$_93a9cf_local_params;$_93a9cf_old_vars['_0ee2e3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_permalink','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          &nbsp; &nbsp;
          <a data-toggle="tooltip" data-placement="top" id="permalink_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'_permalink','this_tag'=>'var'],null,$this),$this)?>
" target="_blank">
          <i class="fa fa-external-link" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php $_93a9cf_old_params['_9e382d']=$_93a9cf_local_params;$_93a9cf_old_vars['_9e382d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        &nbsp;
          <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'_permalink','replace'=>'\'$_site_url\',\'$_link_url\'','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$_site_url\\\',\\\'$_link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

          <a data-toggle="tooltip" data-placement="top" id="linkurl_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" style="position:absolute;margin-top:-1px" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
" target="_blank">
          <i class="fa fa-globe" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9e382d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9e382d'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0ee2e3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0ee2e3'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e85556'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e85556'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fe2722'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fe2722'];?>

          <a class="btn toggle-infobox hidden"
            id="toggle_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" href="javascript:void(0);">
            <i id="toggle_icn_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" class="fa fa-caret-down toggle-icn" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <div id="infobox_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" class="hidden info-box"></div>
      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_list','eq'=>'url','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$_name','escape'=>'','setvar'=>'_url_value','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('_url_value','setvar',$this),$this,'setvar')?>
<?php echo $this->function_var($this->setup_args(['name'=>'_url_value','this_tag'=>'var'],null,$this),$this)?>

        <?php $_93a9cf_old_params['_b08168']=$_93a9cf_local_params;$_93a9cf_old_vars['_b08168']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_url_value','match'=>'/^https?:\\/\\//','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'_url_value','this_tag'=>'var'],null,$this),$this)?>
" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Open in new window','this_tag'=>'trans'],null,$this),$this)?>
</span></a>
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b08168'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b08168'];?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_list','eq'=>'checkbox','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_00f90d']=$_93a9cf_local_params;$_93a9cf_old_vars['_00f90d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <i class="fa fa-check-square-o" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Checked','this_tag'=>'trans'],null,$this),$this)?>
</span>
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_00f90d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_00f90d'];?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_list','like'=>':','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_2e960a']=$_93a9cf_local_params;$_93a9cf_old_vars['_2e960a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_name','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_fc5c35']=$_93a9cf_local_params;$_93a9cf_old_vars['_fc5c35']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_scope','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <a href="<?php echo $this->function_var($this->setup_args(['name'=>'this_url','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'sort_cond','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'query_cond','this_tag'=>'var'],null,$this),$this)?>
<?php $_93a9cf_old_params['_5a38a5']=$_93a9cf_local_params;$_93a9cf_old_vars['_5a38a5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5a38a5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5a38a5'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
<?php echo $this->function_var($this->setup_args(['name'=>'selector_cond','this_tag'=>'var'],null,$this),$this)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</a>
          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fc5c35'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fc5c35'];?>

        <?php else:?>

          <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2e960a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2e960a'];?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_name','eq'=>'status','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'$_name','setvar'=>'status','this_tag'=>'var'],null,$this),$this),$this->setup_args('status','setvar',$this),$this,'setvar')?>

        <?php echo $this->function_var($this->setup_args(['name'=>'_status_text','this_tag'=>'var'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_list','eq'=>'popover','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <button id="popover-<?php echo $this->function_var($this->setup_args(['name'=>'_name','this_tag'=>'var'],null,$this),$this)?>
-<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" type="button" class="btn btn-secondary btn-sm" data-container="body" data-toggle="popover" data-placement="left">
        <i class="fa fa-commenting-o" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </button>
<script>
$('#popover-<?php echo $this->function_var($this->setup_args(['name'=>'_name','this_tag'=>'var'],null,$this),$this)?>
-<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
').popover({
    title: '<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
',
    content: '<?php echo $this->modifier_trim_to($this->modifier_encode_js($this->function_var($this->setup_args(['name'=>'$_name','encode_js'=>'1','trim_to'=>'600+...','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','encode_js',$this),$this,'encode_js'),$this->setup_args('600+...','trim_to',$this),$this,'trim_to')?>
',
    placement: "bottom",
    html: true
});
</script>
      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_can_sort','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <input name="order_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
" type="number" class="form-control order_col form-control-sm" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php else:?>

        <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a0aebb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a0aebb'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_259ab4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_259ab4'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9266e4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9266e4'];?>

<?php $c_1da6d7=ob_get_clean();$c_1da6d7=$this->block_setvarblock($a_1da6d7,$c_1da6d7,$this,$r_1da6d7,1,'_1da6d7');echo($c_1da6d7); $_93a9cf_local_params=$_93a9cf_old_params['_1da6d7'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'col_content','this_tag'=>'var'],null,$this),$this)?>

<?php $_93a9cf_old_params['_50d7e3']=$_93a9cf_local_params;$_93a9cf_old_vars['_50d7e3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list','ne'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_a70441']=$_93a9cf_local_params;$_93a9cf_old_vars['_a70441']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_sort','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_0fb185']=$_93a9cf_local_params;$_93a9cf_old_vars['_0fb185']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_name','ne'=>'$__last_col__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $c_e730ac=null;$_93a9cf_old_params['_e730ac']=$_93a9cf_local_params;$_93a9cf_old_vars['_e730ac']=$_93a9cf_local_vars;$a_e730ac=$this->setup_args(['name'=>'column_vars','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>

      <tr><th><?php echo $this->function_var($this->setup_args(['name'=>'_label','this_tag'=>'var'],null,$this),$this)?>
</th><td><?php echo $this->function_var($this->setup_args(['name'=>'col_content','this_tag'=>'var'],null,$this),$this)?>
</td></tr>
    <?php $c_e730ac=ob_get_clean();$c_e730ac=$this->block_setvarblock($a_e730ac,$c_e730ac,$this,$r_e730ac,1,'_e730ac');echo($c_e730ac); $_93a9cf_local_params=$_93a9cf_old_params['_e730ac'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0fb185'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0fb185'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a70441'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a70441'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_50d7e3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_50d7e3'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'__last_col__','value'=>'$_name','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_6acea8']=$_93a9cf_local_params;$_93a9cf_old_vars['_6acea8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_74cc15']=$_93a9cf_local_params;$_93a9cf_old_vars['_74cc15']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <a <?php $_93a9cf_old_params['_d4196d']=$_93a9cf_local_params;$_93a9cf_old_vars['_d4196d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="_blank"<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d4196d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d4196d'];?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_93a9cf_old_params['_a48f7a']=$_93a9cf_local_params;$_93a9cf_old_vars['_a48f7a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a48f7a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a48f7a'];?>
">
    (<?php echo $this->function_trans($this->setup_args(['phrase'=>'Edit','this_tag'=>'trans'],null,$this),$this)?>
)
    </a>
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_74cc15'];$_93a9cf_local_vars=$_93a9cf_old_vars['_74cc15'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6acea8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6acea8'];?>

</td>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_678a7f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_678a7f'];?>

<?php endif;$c_c76c26=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_c76c26'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c76c26'];?>

<td class="hidden" id="detail_<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
  <table class="cell-detail table-sm">
    <?php echo $this->function_var($this->setup_args(['name'=>'column_vars','this_tag'=>'var'],null,$this),$this)?>

  </table>
</td>
</tr>
<?php $_93a9cf_old_params['_9e5798']=$_93a9cf_local_params;$_93a9cf_old_vars['_9e5798']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</tbody>
<tfoot>
<?php echo $this->function_var($this->setup_args(['name'=>'table_header','this_tag'=>'var'],null,$this),$this)?>

</tfoot>
</table>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9e5798'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9e5798'];?>

<?php endif;$c_f37d35=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_f37d35'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f37d35'];?>

<?php $c_ffe9aa=null;$_93a9cf_old_params['_ffe9aa']=$_93a9cf_local_params;$_93a9cf_old_vars['_ffe9aa']=$_93a9cf_local_vars;$a_ffe9aa=$this->setup_args(['name'=>'include_path','this_tag'=>'setvarblock'],null,$this);ob_start();?>
include/list/<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
/list_footer.tmpl<?php $c_ffe9aa=ob_get_clean();$c_ffe9aa=$this->block_setvarblock($a_ffe9aa,$c_ffe9aa,$this,$r_ffe9aa,1,'_ffe9aa');echo($c_ffe9aa); $_93a9cf_local_params=$_93a9cf_old_params['_ffe9aa'];?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['file'=>'$include_path','this_tag'=>'include'],null,$this),$this)?>

<table class="full table-sm list-actions-table">
<tr>
<td class="list-actions-col">
<?php $_93a9cf_old_params['_d4ddff']=$_93a9cf_local_params;$_93a9cf_old_vars['_d4ddff']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_action','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_f6ed0b']=$_93a9cf_local_params;$_93a9cf_old_vars['_f6ed0b']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $c_de1051=null;$_93a9cf_old_params['_de1051']=$_93a9cf_local_params;$_93a9cf_old_vars['_de1051']=$_93a9cf_local_vars;$a_de1051=$this->setup_args(['name'=>'delete_button','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <button type="button" class="__delete list-delete-btn btn btn-secondary btn-sm">
  <i class="fa fa-trash" aria-hidden="true"></i>
  <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
  </button>
<?php $c_de1051=ob_get_clean();$c_de1051=$this->block_setvarblock($a_de1051,$c_de1051,$this,$r_de1051,1,'_de1051');echo($c_de1051); $_93a9cf_local_params=$_93a9cf_old_params['_de1051'];?>

<?php $_93a9cf_old_params['_ecacbf']=$_93a9cf_local_params;$_93a9cf_old_vars['_ecacbf']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_delete','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_var($this->setup_args(['name'=>'delete_button','this_tag'=>'var'],null,$this),$this)?>

<?php else:?>

  <?php $_93a9cf_old_params['_d6fa21']=$_93a9cf_local_params;$_93a9cf_old_vars['_d6fa21']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_8c7744']=$_93a9cf_local_params;$_93a9cf_old_vars['_8c7744']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_delete_any','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'delete_button','this_tag'=>'var'],null,$this),$this)?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8c7744'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8c7744'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d6fa21'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d6fa21'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ecacbf'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ecacbf'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f6ed0b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f6ed0b'];?>

<?php $_93a9cf_old_params['_257ed8']=$_93a9cf_local_params;$_93a9cf_old_vars['_257ed8']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_6e280e']=$_93a9cf_local_params;$_93a9cf_old_vars['_6e280e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_actions','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $c_daeff9=null;$_93a9cf_old_params['_daeff9']=$_93a9cf_local_params;$_93a9cf_old_vars['_daeff9']=$_93a9cf_local_vars;$a_daeff9=$this->setup_args(['file'=>'include/list_actions.tmpl','disp_action_bar'=>'1','this_tag'=>'block'],null,$this);$_daeff9=-1;$r_daeff9=true;while($r_daeff9===true):$r_daeff9=($_daeff9!==-1)?false:true;echo $this->block_block($a_daeff9,$c_daeff9,$this,$r_daeff9,++$_daeff9,'_daeff9');ob_start();?>
<?php $c_daeff9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_daeff9=false;}if($c_daeff9 ):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'has_actions','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'actions_count','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php $c_f196fa=null;$_93a9cf_old_params['_f196fa']=$_93a9cf_local_params;$_93a9cf_old_vars['_f196fa']=$_93a9cf_local_vars;$a_f196fa=$this->setup_args(['name'=>'list_actions_options-dd','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<?php $c_08c8a0=null;$_93a9cf_old_params['_08c8a0']=$_93a9cf_local_params;$_93a9cf_old_vars['_08c8a0']=$_93a9cf_local_vars;$a_08c8a0=$this->setup_args(['name'=>'list_actions','this_tag'=>'loop'],null,$this);$_08c8a0=-1;$r_08c8a0=true;while($r_08c8a0===true):$r_08c8a0=($_08c8a0!==-1)?false:true;echo $this->block_loop($a_08c8a0,$c_08c8a0,$this,$r_08c8a0,++$_08c8a0,'_08c8a0');ob_start();?>
<?php $c_08c8a0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_08c8a0=false;}if($c_08c8a0 ):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'actions_count','value'=>'$__counter__','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_29eb57']=$_93a9cf_local_params;$_93a9cf_old_vars['_29eb57']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_3eda73=null;$_93a9cf_old_params['_3eda73']=$_93a9cf_local_params;$_93a9cf_old_vars['_3eda73']=$_93a9cf_local_vars;$a_3eda73=$this->setup_args(['name'=>'input_options','this_tag'=>'loop'],null,$this);$_3eda73=-1;$r_3eda73=true;while($r_3eda73===true):$r_3eda73=($_3eda73!==-1)?false:true;echo $this->block_loop($a_3eda73,$c_3eda73,$this,$r_3eda73,++$_3eda73,'_3eda73');ob_start();?>
<?php $c_3eda73 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3eda73=false;}if($c_3eda73 ):?>

<?php $_93a9cf_old_params['_64fa6d']=$_93a9cf_local_params;$_93a9cf_old_vars['_64fa6d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<select name="" class="_action_input-options-<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
 custom-select hidden form-control-sm very-short list-actions-options"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_64fa6d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_64fa6d'];?>

<option value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
" data-hint="<?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'hint','translate'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate')?>
" data-modal="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'modal','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'$label','component'=>'$component_name','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php $_93a9cf_old_params['_0ba7d7']=$_93a9cf_local_params;$_93a9cf_old_vars['_0ba7d7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0ba7d7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0ba7d7'];?>

<?php endif;$c_3eda73=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_3eda73'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3eda73'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_29eb57'];$_93a9cf_local_vars=$_93a9cf_old_vars['_29eb57'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'input_options','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$c_08c8a0=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_08c8a0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_08c8a0'];?>

<?php $c_f196fa=ob_get_clean();$c_f196fa=$this->block_setvarblock($a_f196fa,$c_f196fa,$this,$r_f196fa,1,'_f196fa');echo($c_f196fa); $_93a9cf_local_params=$_93a9cf_old_params['_f196fa'];?>

<?php $c_2ec903=null;$_93a9cf_old_params['_2ec903']=$_93a9cf_local_params;$_93a9cf_old_vars['_2ec903']=$_93a9cf_local_vars;$a_2ec903=$this->setup_args(['name'=>'list_actions','this_tag'=>'loop'],null,$this);$_2ec903=-1;$r_2ec903=true;while($r_2ec903===true):$r_2ec903=($_2ec903!==-1)?false:true;echo $this->block_loop($a_2ec903,$c_2ec903,$this,$r_2ec903,++$_2ec903,'_2ec903');ob_start();?>
<?php $c_2ec903 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2ec903=false;}if($c_2ec903 ):?>

<?php $_93a9cf_old_params['_e76661']=$_93a9cf_local_params;$_93a9cf_old_vars['_e76661']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<select aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Action...','this_tag'=>'trans'],null,$this),$this)?>
" name="action_name" data-pos="<?php $_93a9cf_old_params['_1e2a36']=$_93a9cf_local_params;$_93a9cf_old_vars['_1e2a36']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_action_bar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
bottom<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1e2a36'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1e2a36'];?>
" class="select-action form-control custom-select form-control-sm very-short">
  <?php echo $this->function_setvar($this->setup_args(['name'=>'has_actions','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'Action...','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e76661'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e76661'];?>

  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
" data-hint="<?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'hint','translate'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate')?>
" data-allow_empty="<?php echo $this->function_var($this->setup_args(['name'=>'allow_empty','this_tag'=>'var'],null,$this),$this)?>
" data-modal="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'modal','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="<?php $_93a9cf_old_params['_579e5b']=$_93a9cf_local_params;$_93a9cf_old_vars['_579e5b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
with-input<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'input','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_579e5b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_579e5b'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
  <?php echo $this->function_setvar($this->setup_args(['name'=>'hint','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_93a9cf_old_params['_691f77']=$_93a9cf_local_params;$_93a9cf_old_vars['_691f77']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'UTF8,UTF8(without ID),Shift_JIS,Shift_JIS(without ID)','split'=>',','setvar'=>'export_loop','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('export_loop','setvar',$this),$this,'setvar')?>

<?php $c_f5bee7=null;$_93a9cf_old_params['_f5bee7']=$_93a9cf_local_params;$_93a9cf_old_vars['_f5bee7']=$_93a9cf_local_vars;$a_f5bee7=$this->setup_args(['name'=>'export_loop','this_tag'=>'loop'],null,$this);$_f5bee7=-1;$r_f5bee7=true;while($r_f5bee7===true):$r_f5bee7=($_f5bee7!==-1)?false:true;echo $this->block_loop($a_f5bee7,$c_f5bee7,$this,$r_f5bee7,++$_f5bee7,'_f5bee7');ob_start();?>
<?php $c_f5bee7 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f5bee7=false;}if($c_f5bee7 ):?>

<?php $_93a9cf_old_params['_6f63a5']=$_93a9cf_local_params;$_93a9cf_old_vars['_6f63a5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<select aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Export Type','this_tag'=>'trans'],null,$this),$this)?>
" name="itemset_export_select" class="custom-select itemset_export_options hidden form-control-sm very-short action-export-select">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6f63a5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6f63a5'];?>

  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'$__value__','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php $_93a9cf_old_params['_aa4a4d']=$_93a9cf_local_params;$_93a9cf_old_vars['_aa4a4d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_aa4a4d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_aa4a4d'];?>

<?php endif;$c_f5bee7=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_f5bee7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f5bee7'];?>

<?php $_93a9cf_old_params['_22bdcb']=$_93a9cf_local_params;$_93a9cf_old_vars['_22bdcb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_dc285d=null;$_93a9cf_old_params['_dc285d']=$_93a9cf_local_params;$_93a9cf_old_vars['_dc285d']=$_93a9cf_local_vars;$a_dc285d=$this->setup_args(['name'=>'status_loop','this_tag'=>'loop'],null,$this);$_dc285d=-1;$r_dc285d=true;while($r_dc285d===true):$r_dc285d=($_dc285d!==-1)?false:true;echo $this->block_loop($a_dc285d,$c_dc285d,$this,$r_dc285d,++$_dc285d,'_dc285d');ob_start();?>
<?php $c_dc285d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_dc285d=false;}if($c_dc285d ):?>

<?php $_93a9cf_old_params['_b34b8f']=$_93a9cf_local_params;$_93a9cf_old_vars['_b34b8f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<select aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Status','this_tag'=>'trans'],null,$this),$this)?>
" name="itemset_status_select" class="custom-select hidden form-control-sm very-short action-status-select">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b34b8f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b34b8f'];?>

<?php $_93a9cf_old_params['_860fdb']=$_93a9cf_local_params;$_93a9cf_old_vars['_860fdb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_29844c']=$_93a9cf_local_params;$_93a9cf_old_vars['_29844c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
" <?php $_93a9cf_old_params['_43a11a']=$_93a9cf_local_params;$_93a9cf_old_vars['_43a11a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_default_status','eq'=>'$__index__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_43a11a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_43a11a'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'$__value__','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_29844c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_29844c'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_860fdb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_860fdb'];?>

<?php $_93a9cf_old_params['_897cc5']=$_93a9cf_local_params;$_93a9cf_old_vars['_897cc5']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_897cc5'];$_93a9cf_local_vars=$_93a9cf_old_vars['_897cc5'];?>

<?php endif;$c_dc285d=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_dc285d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dc285d'];?>
<?php else:?>

<?php $c_b6d72b=null;$_93a9cf_old_params['_b6d72b']=$_93a9cf_local_params;$_93a9cf_old_vars['_b6d72b']=$_93a9cf_local_vars;$a_b6d72b=$this->setup_args(['name'=>'status_loop','this_tag'=>'loop'],null,$this);$_b6d72b=-1;$r_b6d72b=true;while($r_b6d72b===true):$r_b6d72b=($_b6d72b!==-1)?false:true;echo $this->block_loop($a_b6d72b,$c_b6d72b,$this,$r_b6d72b,++$_b6d72b,'_b6d72b');ob_start();?>
<?php $c_b6d72b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b6d72b=false;}if($c_b6d72b ):?>

<?php $_93a9cf_old_params['_db8cd9']=$_93a9cf_local_params;$_93a9cf_old_vars['_db8cd9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<select aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Status','this_tag'=>'trans'],null,$this),$this)?>
" name="itemset_status_select" class="custom-select hidden form-control-sm very-short action-status-select">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_db8cd9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_db8cd9'];?>

<?php $_93a9cf_old_params['_2cd056']=$_93a9cf_local_params;$_93a9cf_old_vars['_2cd056']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
" <?php $_93a9cf_old_params['_c78688']=$_93a9cf_local_params;$_93a9cf_old_vars['_c78688']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_default_status','eq'=>'$__counter__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c78688'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c78688'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'$__value__','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2cd056'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2cd056'];?>

<?php $_93a9cf_old_params['_bc21d2']=$_93a9cf_local_params;$_93a9cf_old_vars['_bc21d2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bc21d2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bc21d2'];?>

<?php endif;$c_b6d72b=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_b6d72b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b6d72b'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_22bdcb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_22bdcb'];?>

<?php $_93a9cf_old_params['_471bad']=$_93a9cf_local_params;$_93a9cf_old_vars['_471bad']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'disp_action_bar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<input aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Input Text','this_tag'=>'trans'],null,$this),$this)?>
" id="action-input-box" data-pos="top" name="itemset_action_input" class="short-padding itemset-action-input hidden form-control-sm" type="text">
<input aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Input Date and Time','this_tag'=>'trans'],null,$this),$this)?>
" id="action-datetime-box" data-pos="top" name="" class="short-padding itemset-datetime-input hidden form-control-sm" type="datetime-local">
<?php else:?>

<input aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Input Text','this_tag'=>'trans'],null,$this),$this)?>
" id="action-input-box-bottom" name="itemset_action_input" class="short-padding itemset-action-input hidden form-control-sm" type="text">
<input aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Input Date and Time','this_tag'=>'trans'],null,$this),$this)?>
" id="action-datetime-box-bottom" name="" class="short-padding itemset-datetime-input hidden form-control-sm" type="datetime-local">
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_471bad'];$_93a9cf_local_vars=$_93a9cf_old_vars['_471bad'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'list_actions_options-dd','this_tag'=>'var'],null,$this),$this)?>

<button class="__action list-action-btn btn btn-secondary action-button btn-sm" type="submit"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Go','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_691f77'];$_93a9cf_local_vars=$_93a9cf_old_vars['_691f77'];?>

<?php endif;$c_2ec903=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_2ec903'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2ec903'];?>

<?php $_93a9cf_old_params['_4e2141']=$_93a9cf_local_params;$_93a9cf_old_vars['_4e2141']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'disp_action_bar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<script>
var action_export_select = false;
var action_status_select = false;
var need_action_input = false;
var need_datetime_input = false;
last_action_hint = '';
$(function(){
    $('.select-action').change(function(){
        var action_hint = $('[name=action_name] option:selected').attr('data-hint');
        if ( action_hint ) {
            if ( action_hint != last_action_hint ) {
                alert( action_hint );
            }
        }
        last_action_hint = action_hint;
        $('.list-actions-options').hide();
        $('.action-export-select').hide();
        $('.itemset-datetime-input').hide();
        $('.list-actions-options').each(function(){
            $(this).attr( 'name', '' );
        });
        if ( $(this).val() ) {
          $('.__action').removeClass('btn-secondary');
          $('.__action').addClass('btn-primary');
        } else {
          $('.__action').removeClass('btn-primary');
          $('.__action').addClass('btn-secondary');
        }
        $('.select-action').val($(this).val());
        if ( $(this).val() == 'set_status' ) {
            $('.action-status-select').addClass('form-control');
            $('.action-status-select').show();
            action_status_select = true;
            action_export_select = false;
        } else if ( $(this).val() == 'export_objects' ) {
            $('.action-export-select').addClass('form-control');
            $('.action-export-select').show();
            $('.action-status-select').hide();
            action_export_select = true;
            action_status_select = false;
        } else {
            $('.action-status-select').hide();
            action_status_select = false;
            action_export_select = false;
        }
        var opt_class = $('[name=action_name] option:selected').attr('class');
        if ( opt_class == 'with-input' ) {
            var dd_class = '._action_input-options-' + $(this).val();
            if( $(dd_class).length ){
                $('.itemset-action-input').attr( 'name', '' );
                $('.itemset-action-input').hide();
                $(dd_class).show();
                $(dd_class).css( 'display', 'inline' );
                $(dd_class).attr( 'name', 'itemset_action_input' );
                return;
            }
            $('.itemset-action-input').val('');
            $('.itemset-action-input').addClass('form-control');
            $('.itemset-action-input').show();
            $('.itemset-action-input').attr( 'name', 'itemset_action_input' );
            if ( $(this).attr('data-pos') ) {
                $('#action-input-box-bottom').focus();
            } else {
                $('#action-input-box').focus();
            }
            var allow_empty = $('[name=action_name] option:selected').attr('data-allow_empty');
            if (! allow_empty ) {
                need_action_input = true;
            } else {
                need_action_input = false;
            }
            need_datetime_input = false;
        } else if ( opt_class == 'datetime-local' ) {
            $('.itemset-datetime-input').val('');
            $('.itemset-action-input').hide();
            $('.itemset-datetime-input').addClass('form-control');
            $('.itemset-datetime-input').show();
            $('.itemset-datetime-input').attr( 'name', 'itemset_action_input' );
            if ( $(this).attr('data-pos') ) {
                $('#action-datetime-box-bottom').focus();
            } else {
                $('#action-datetime-box').focus();
            }
            need_action_input = false;
            need_datetime_input = true;
        } else {
            $('.itemset-action-input').hide();
            $('.itemset-datetime-input').hide();
            need_action_input = false;
            need_datetime_input = false;
        }
    });
    $('.itemset-action-input').change(function(){
        $('.itemset-action-input').val($(this).val());
    });
    $('.itemset-datetime-input').change(function(){
        $('.itemset-datetime-input').val($(this).val());
    });
    $('.action-status-select').change(function(){
        $('.action-status-select').val($(this).val());
    });
    $('.action-export-select').change(function(){
        $('.action-export-select').val($(this).val());
    });
    $('.list-actions-options').change(function(){
        let classes = $(this).attr('class').split( /\s+/ );
        for ( let clsss of classes ) {
            if ( clsss.indexOf('_action_input-options-') === 0 ) {
                $('.'+clsss).val($(this).val());
                break;
            }
        }
    });
});
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4e2141'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4e2141'];?>
<?php endif;$c_daeff9=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_daeff9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_daeff9'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6e280e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6e280e'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_257ed8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_257ed8'];?>

<?php $_93a9cf_old_params['_6856a2']=$_93a9cf_local_params;$_93a9cf_old_vars['_6856a2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_sortable','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <button type="submit" class="__save_order save-order-btn btn btn-secondary btn-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Order','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6856a2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6856a2'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d4ddff'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d4ddff'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'search_box','this_tag'=>'var'],null,$this),$this)?>

</td>
<?php echo $this->function_var($this->setup_args(['name'=>'pagenation_cell','this_tag'=>'var'],null,$this),$this)?>

</tr>
<tr><td colspan="3">
  <?php echo $this->function_var($this->setup_args(['name'=>'current_filter','this_tag'=>'var'],null,$this),$this)?>

</td></tr>
</table>
</form>
<?php $_93a9cf_old_params['_6ef2d6']=$_93a9cf_local_params;$_93a9cf_old_vars['_6ef2d6']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_efc21a']=$_93a9cf_local_params;$_93a9cf_old_vars['_efc21a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_74baea']=$_93a9cf_local_params;$_93a9cf_old_vars['_74baea']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</div><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_74baea'];$_93a9cf_local_vars=$_93a9cf_old_vars['_74baea'];?>

<div class="mb-5 <?php $_93a9cf_old_params['_6fdd85']=$_93a9cf_local_params;$_93a9cf_old_vars['_6fdd85']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
pl-3<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6fdd85'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6fdd85'];?>
 edit-action-bar full">
<?php $_93a9cf_old_params['_df8957']=$_93a9cf_local_params;$_93a9cf_old_vars['_df8957']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_94bfce']=$_93a9cf_local_params;$_93a9cf_old_vars['_94bfce']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="mb-5"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_94bfce'];$_93a9cf_local_vars=$_93a9cf_old_vars['_94bfce'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_df8957'];$_93a9cf_local_vars=$_93a9cf_old_vars['_df8957'];?>

  <button id="dialog-cancel-btn" class="btn btn-secondary" type="button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
  <button id="dialog-selector-btn<?php $_93a9cf_old_params['_cd342a']=$_93a9cf_local_params;$_93a9cf_old_vars['_cd342a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
-editor_insert<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cd342a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cd342a'];?>
" class="btn btn-primary" type="button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php $_93a9cf_old_params['_da7181']=$_93a9cf_local_params;$_93a9cf_old_vars['_da7181']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_989db0']=$_93a9cf_local_params;$_93a9cf_old_vars['_989db0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</div><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_989db0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_989db0'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_da7181'];$_93a9cf_local_vars=$_93a9cf_old_vars['_da7181'];?>

</div>
<?php $_93a9cf_old_params['_269603']=$_93a9cf_local_params;$_93a9cf_old_vars['_269603']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="col-md-12"><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_269603'];$_93a9cf_local_vars=$_93a9cf_old_vars['_269603'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_efc21a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_efc21a'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6ef2d6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6ef2d6'];?>

<script>
var $win = $(window);
$('.toggle-infobox').click(function(){
    this_id = $(this).prop('id');
    this_id = this_id.replace( /toggle_/, '' );
    if (! $('#infobox_' + this_id).html() ) {
        $('#infobox_' + this_id).html( $('#detail_' + this_id).html() );
        $('#infobox_' + this_id).show();
        $('#toggle_icn_' + this_id).removeClass('fa-caret-down');
        $('#toggle_icn_' + this_id).addClass('fa-caret-up');
    } else {
        $('#infobox_' + this_id).html('');
        $('#infobox_' + this_id).hide();
        $('#toggle_icn_' + this_id).removeClass('fa-caret-up');
        $('#toggle_icn_' + this_id).addClass('fa-caret-down');
    }
});
<?php $_93a9cf_old_params['_bf36d3']=$_93a9cf_local_params;$_93a9cf_old_vars['_bf36d3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(document).keydown(evnt_keydown);
function evnt_keydown(e) {
    if ( e.keyCode == 27 ) {
        window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
        window.parent.$('#modal').modal('hide');
    }
}
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_bf36d3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_bf36d3'];?>

$(":checkbox").keypress(function(e) {
    if ( e.keyCode == 13 ) {
        if ( $(this).prop('checked') ) {
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }
        if ( $(this).hasClass('cb-all-select') ) {
            checked = $(this).prop('checked');
            $("input[name='id[]']").each(function(){
                $(this).prop('checked', checked);
            });
            $('.selector').prop('checked', checked);
            <?php $_93a9cf_old_params['_ce484f']=$_93a9cf_local_params;$_93a9cf_old_vars['_ce484f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_all_selected','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                if ( checked ) {
                    $('.all-selected-cell').show();
                } else {
                    $('.all-selected-cell').hide();
                    $('.cb-all-selected').prop('checked', false);
                }
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ce484f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ce484f'];?>

            <?php $_93a9cf_old_params['_1b1346']=$_93a9cf_local_params;$_93a9cf_old_vars['_1b1346']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_93a9cf_old_params['_f82754']=$_93a9cf_local_params;$_93a9cf_old_vars['_f82754']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

                <?php $_93a9cf_old_params['_a4cb7a']=$_93a9cf_local_params;$_93a9cf_old_vars['_a4cb7a']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_single_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

                set_selected_cbs();
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a4cb7a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a4cb7a'];?>

              <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f82754'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f82754'];?>

            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1b1346'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1b1346'];?>

        } else {
            set_all_select();
        }
    }
    return false;
});
var in_link = false;
$('a').mouseover(function() {
    in_link = true;
});
$('a').click(function() {
    in_link = true;
});
$('a').mouseout(function() {
    in_link = false;
});
<?php $_93a9cf_old_params['_cf90d9']=$_93a9cf_local_params;$_93a9cf_old_vars['_cf90d9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('input').click(function() {
    in_link = true;
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cf90d9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cf90d9'];?>

$('input').mouseover(function() {
    in_link = true;
});
$('input').mouseout(function() {
    in_link = false;
});
$('#list_body tr').click(function() {
    if ( in_link ) {
        return true;
    }
    line_id = $(this).prop('id');
    line = line_id.replace( /line_/, '' );
    checked = $('#box_'+line).prop('checked');
    if ( checked ) {
        $('#box_'+line).prop('checked', false);
    } else {
        $('#box_'+line).prop('checked', true);
    }
    set_all_select();
});
<?php $_93a9cf_old_params['_cbe278']=$_93a9cf_local_params;$_93a9cf_old_vars['_cbe278']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_sortable','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#list_body tr').mouseover(function() {
    $(this).css('cursor','move');
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cbe278'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cbe278'];?>

var in_search = false;
var selected_ids = [];
var upload_ids = [];
<?php $_93a9cf_old_params['_77430a']=$_93a9cf_local_params;$_93a9cf_old_vars['_77430a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

var target_control;
<?php $_93a9cf_old_params['_fb53e4']=$_93a9cf_local_params;$_93a9cf_old_vars['_fb53e4']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

$(function(){
    target_control = '<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
<?php $_93a9cf_old_params['_1186b9']=$_93a9cf_local_params;$_93a9cf_old_vars['_1186b9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    var selected_id = window.parent.$('#'+target_control).val();
    <?php $_93a9cf_old_params['_7ceae2']=$_93a9cf_local_params;$_93a9cf_old_vars['_7ceae2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'request.selected_ids','split'=>',','setvar'=>'request_selected_ids','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('request_selected_ids','setvar',$this),$this,'setvar')?>

    <?php $c_5d3f77=null;$_93a9cf_old_params['_5d3f77']=$_93a9cf_local_params;$_93a9cf_old_vars['_5d3f77']=$_93a9cf_local_vars;$a_5d3f77=$this->setup_args(['name'=>'request_selected_ids','this_tag'=>'loop'],null,$this);$_5d3f77=-1;$r_5d3f77=true;while($r_5d3f77===true):$r_5d3f77=($_5d3f77!==-1)?false:true;echo $this->block_loop($a_5d3f77,$c_5d3f77,$this,$r_5d3f77,++$_5d3f77,'_5d3f77');ob_start();?>
<?php $c_5d3f77 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5d3f77=false;}if($c_5d3f77 ):?>

        selected_id = '<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
';
    <?php endif;$c_5d3f77=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_5d3f77'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5d3f77'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7ceae2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7ceae2'];?>

    $("input[name='id']").each(function(){
        if( $(this).val() == selected_id ) {
            $(this).prop('checked', true);
        }
    });
<?php else:?>

    window.parent.$("input[name='"+<?php $_93a9cf_old_params['_d738cb']=$_93a9cf_local_params;$_93a9cf_old_vars['_d738cb']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._field_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
'<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._field_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
'<?php else:?>
target_control<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d738cb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d738cb'];?>
+"[]']").each(function(){
        if ( $(this).val() ) {
            selected_ids.push($(this).val());
        }
    });
    <?php $_93a9cf_old_params['_8d778b']=$_93a9cf_local_params;$_93a9cf_old_vars['_8d778b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'request.selected_ids','split'=>',','setvar'=>'request_selected_ids','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('request_selected_ids','setvar',$this),$this,'setvar')?>

    <?php $c_66a1d7=null;$_93a9cf_old_params['_66a1d7']=$_93a9cf_local_params;$_93a9cf_old_vars['_66a1d7']=$_93a9cf_local_vars;$a_66a1d7=$this->setup_args(['name'=>'request_selected_ids','this_tag'=>'loop'],null,$this);$_66a1d7=-1;$r_66a1d7=true;while($r_66a1d7===true):$r_66a1d7=($_66a1d7!==-1)?false:true;echo $this->block_loop($a_66a1d7,$c_66a1d7,$this,$r_66a1d7,++$_66a1d7,'_66a1d7');ob_start();?>
<?php $c_66a1d7 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_66a1d7=false;}if($c_66a1d7 ):?>

        if( $.inArray('<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
', selected_ids ) == -1 ) {
            upload_ids.push('<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
');
        }
    <?php endif;$c_66a1d7=ob_get_clean();endwhile; $_93a9cf_local_params=$_93a9cf_old_params['_66a1d7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_66a1d7'];?>

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8d778b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8d778b'];?>

    set_selected_cbs();
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1186b9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1186b9'];?>

});
<?php $_93a9cf_old_params['_178be9']=$_93a9cf_local_params;$_93a9cf_old_vars['_178be9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_82aa07']=$_93a9cf_local_params;$_93a9cf_old_vars['_82aa07']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_6e5603']=$_93a9cf_local_params;$_93a9cf_old_vars['_6e5603']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_single_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

function set_selected_cbs () {
    $("input[name='id[]']").each(function(){
        if( $.inArray($(this).val(), selected_ids ) != -1 ) {
            $(this).prop('checked', true );
            $('#line_' + $(this).val() ).css('background-color', '#ddd');
            $('#line_' + $(this).val() ).on('click', function() {
                var select_id = $(this).prop('id');
                select_id = select_id.replace( 'line_', '' );
                $("input[name='id[]']").each(function(){
                    if ( $(this).val() == select_id ) {
                        $(this).prop('checked', true );
                    }
                });
            });
        }
        if( $.inArray($(this).val(), upload_ids ) != -1 ) {
            $(this).prop('checked', true );
        }
    });
}

    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6e5603'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6e5603'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_82aa07'];$_93a9cf_local_vars=$_93a9cf_old_vars['_82aa07'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_178be9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_178be9'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_fb53e4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_fb53e4'];?>

$('#dialog-selector-btn-editor_insert').click(function(){
    if ( item_checked() == false ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any %s.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $("#__mode").prop('value', 'insert_asset');
    $('#list-select-form').submit();
});
$('#dialog-cancel-btn').click(function(){
    window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
    window.parent.$('#modal').modal('hide');
    return false;
});
$('#dialog-selector-btn').click(function(){
<?php $_93a9cf_old_params['_1cbad0']=$_93a9cf_local_params;$_93a9cf_old_vars['_1cbad0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    let selected = $('input[name=id]:checked').val();
    selected = $( '<span/>' ).text(selected).html();
    if (! selected ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any %s.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
  <?php $_93a9cf_old_params['_ca8b81']=$_93a9cf_local_params;$_93a9cf_old_vars['_ca8b81']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    let col_value = $('#_get_col_' + selected ).val();
    // col_value = $( '<span/>' ).text(col_value).html();
    window.parent.$('#'+target_control).val(selected);
    window.parent.$('#'+target_control+'-close').show();
    window.parent.$('#'+target_control+'-close').removeClass('hidden');
    window.parent.$('#'+target_control+'-label').html(col_value);
    if ( window.parent.$('#_' + target_control + '-edit-defeult').length ) {
        if ( $('#edit-link-'+selected).length ) {
            window.parent.$('#_' + target_control + '-edit-defeult').show();
            window.parent.$('#_' + target_control + '-edit-defeult').css( 'display', 'inline' );
            window.parent.$('#_' + target_control + '-edit-defeult').removeClass('hidden');
            var dataHref = window.parent.$('#_' + target_control + '-edit-defeult').attr('data-href');
            dataHref = dataHref.replace( /&id=[0-9]*&/, '&id=' + selected + '&' );
            window.parent.$('#_' + target_control + '-edit-defeult').data('href', dataHref);
            window.parent.$('#_' + target_control + '-edit-defeult').attr('href', dataHref);
            window.parent.$('#_' + target_control + '-edit-defeult').attr('data-href', dataHref);
        } else {
            window.parent.$('#_' + target_control + '-edit-defeult').hide();
            window.parent.$('#_' + target_control + '-edit-defeult').addClass('hidden');
        }
    }
    let obj_permalink = $('#permalink_'+selected);
    let obj_linkurl = $('#linkurl_'+selected);
    <?php $_93a9cf_old_params['_8b6b24']=$_93a9cf_local_params;$_93a9cf_old_vars['_8b6b24']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    window.parent.$('#_'+target_control+'_name').html(col_value);
    let viewLink = window.parent.$('#'+target_control+'-view-asset-link');
    let linkURL = window.parent.$('#'+target_control+'-view-asset-link-url');
    if ( obj_permalink.length ) {
        viewLink.removeClass('hidden');
        viewLink.show();
        let editButton = window.parent.$('#_'+target_control+'-edit');
        editButton.removeClass('hidden');
        editButton.attr('data-label', col_value );
        editButton.show();
        obj_permalink = obj_permalink.attr( 'href' );
        viewLink.attr( 'href', obj_permalink );
        let fInfo = obj_permalink.split('.');
        let fileExtension = fInfo[fInfo.length-1].toLowerCase();
        let extensionsInline = ['csv', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'pptx'];
        if (extensionsInline.indexOf(fileExtension) < 0){
            viewLink.attr('target', '_blank');
            viewLink.children('i').removeClass('fa-download');
            viewLink.children('i').addClass('fa-external-link-square');
            viewLink.attr('aria-label','<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
');
        }
        let obj_label = window.parent.$('#_'+target_control+'_label');
        if ( obj_label.length ) {
            obj_label.val( col_value );
        }
        if ( obj_linkurl.length ) {
            obj_linkurl = obj_linkurl.attr( 'href' );
            if ( linkURL.length ) {
                linkURL.attr( 'href', obj_linkurl );
                linkURL.removeClass('hidden');
                linkURL.show();
                if (extensionsInline.indexOf(fileExtension) < 0){
                    linkURL.attr('target', '_blank');
                }
            }
        }
    } else {
        viewLink.addClass('hidden');
        viewLink.hide();
    }
    <?php else:?>

    window.parent.$('#'+target_control+'-label').html(col_value);
    let thumbDiv = window.parent.$('#'+target_control+'-img');
    if ( thumbDiv.length ) {
        thumbDiv.attr( 'data-id', selected );
        let bgimage = thumbDiv.attr('data-href');
        if ( bgimage ) {
            thumbDiv.css('background-image','url(' + bgimage + selected + ')' );
            thumbDiv.removeClass( 'hidden' );
            thumbDiv.show();
        }
    }
    let viewLink = window.parent.$('.attachment-download-btn-' + target_control );
    let linkURL = window.parent.$('.attachment-linkurl-btn-' + target_control );
    if ( obj_permalink.length ) {
        obj_permalink = obj_permalink.attr( 'href' );
        viewLink.attr( 'href', obj_permalink );
        viewLink.removeClass('hidden');
        viewLink.show();
        if ( obj_linkurl.length ) {
            obj_linkurl = obj_linkurl.attr( 'href' );
            if ( linkURL.length ) {
                linkURL.attr( 'href', obj_linkurl );
                linkURL.removeClass('hidden');
                linkURL.show();
            }
        }
    } else {
        viewLink.addClass('hidden');
        viewLink.hide();
        linkURL.addClass('hidden');
        linkURL.hide();
    }
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8b6b24'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8b6b24'];?>

    if ( $('#_get_col_img_' + selected ).length ) {
        let col_img = $('#_get_col_img_' + selected ).val();
        if ( col_img ) {
            // col_img = $( '<span/>' ).text(col_img).html();
            window.parent.$('#'+target_control+'-img').removeClass('hidden');
            window.parent.$('#'+target_control+'-img')
                .attr('data-id',selected)
                .data('id',selected)
                .css('background-image','url(' + col_img + ')')
                .show();
        } else {
            window.parent.$('#'+target_control+'-img').hide();
        }
    }
  <?php else:?>

    next_url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=edit&_model=<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
&edit_revision=1&id='+selected<?php $_93a9cf_old_params['_a1181e']=$_93a9cf_local_params;$_93a9cf_old_vars['_a1181e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
+'&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
'<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a1181e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a1181e'];?>
;
    window.parent.$('#modal').modal('hide');
    window.parent.location.href = next_url;
    return;
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ca8b81'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ca8b81'];?>

<?php else:?>

    if ( in_search ) {
        return true;
    }
    if ( item_checked() == false ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any %s.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    <?php $_93a9cf_old_params['_2984c2']=$_93a9cf_local_params;$_93a9cf_old_vars['_2984c2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.get_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    // all-selected
    if ( $(".cb-all-selected").prop('checked') ) {
        var filter_params = $('#filter_params').val();
        var json_url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&dialog_view=1&_model=<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
<?php $_93a9cf_old_params['_191841']=$_93a9cf_local_params;$_93a9cf_old_vars['_191841']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_ifworkspacemodel($this->setup_args(['model'=>'$this_model','this_tag'=>'ifworkspacemodel'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_786939']=$_93a9cf_local_params;$_93a9cf_old_vars['_786939']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_786939'];$_93a9cf_local_vars=$_93a9cf_old_vars['_786939'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_191841'];$_93a9cf_local_vars=$_93a9cf_old_vars['_191841'];?>
&to_json=1&all_selected=1&limit=-1';
        $.ajax({
            url: json_url,
            type: 'POST',
            data: {'filter_params' : filter_params,
                   'get_col' : '<?php echo $this->function_var($this->setup_args(['name'=>'request.get_col','this_tag'=>'var'],null,$this),$this)?>
'},
            dataType: 'json',
            async: false,
            timeout: 10000,
            success: function( responce ){
                let arr = responce.items;
                arr.forEach(function(object) {
                    let col_value = object.<?php echo $this->function_var($this->setup_args(['name'=>'request.get_col','this_tag'=>'var'],null,$this),$this)?>
;
                    let obj_id = object.id;
                    if($('#box_' + obj_id).length){
                    } else {
                        let obj_icon = object._icon;
                        let tline = $('<tr class="hidden"></tr>');
                        tline.attr( 'id', 'line_' + obj_id );
                        let thtml = '<td>';
                        thtml += '<input checked id="box_"' + obj_id + ' type="checkbox" name="id[]" value="' + obj_id + '">';
                        thtml += '<input type="hidden" id="_get_col_' + obj_id +  '" value="' + col_value + '">';
                        if ( obj_icon ) {
                            thtml += '<input type="hidden" id="_get_col_img_' + obj_id +  '" value="' + obj_icon + '">';
                        }
                        thtml += '<a id="edit-link-' + obj_id +  '"  href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
&amp;id=' + obj_id + '<?php echo $this->function_var($this->setup_args(['name'=>'dialog_param','this_tag'=>'var'],null,$this),$this)?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo $this->function_var($this->setup_args(['name'=>'request.get_col','this_tag'=>'var'],null,$this),$this)?>
&amp;select_add=1"></td>';
                        tline.html( thtml );
                        $('#list_body').append( tline );
                    }
                });
            },
            error: function(){
                // error
            }
        });
    }
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2984c2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2984c2'];?>

    var checked_ids = [];
    $("input[name='id[]']").each(function(){
        if ( $(this).prop('checked') ) {
            checked_ids.push( $(this).val() );
        }
    });
    var count = checked_ids.length;
  <?php $_93a9cf_old_params['_96af37']=$_93a9cf_local_params;$_93a9cf_old_vars['_96af37']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.select_add','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    window.parent.$('.'+target_control+'-child').each(function(){
        $(this).remove();
    });
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_96af37'];$_93a9cf_local_vars=$_93a9cf_old_vars['_96af37'];?>

  <?php $_93a9cf_old_params['_55da25']=$_93a9cf_local_params;$_93a9cf_old_vars['_55da25']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    window.parent.$('#'+target_control).val(checked_ids.join(','));
    window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
    window.parent.$('#modal').modal('hide');
    return; // the if statement is on the template.
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_55da25'];$_93a9cf_local_vars=$_93a9cf_old_vars['_55da25'];?>

    for( let i = 0; i < count; i++ ) {
        <?php $_93a9cf_old_params['_f37898']=$_93a9cf_local_params;$_93a9cf_old_vars['_f37898']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        if( $.inArray(checked_ids[i], selected_ids ) != -1 ) {
            window.parent.$("input[name='"+target_control+"[]']").each(function(){
                if ($(this).val() == checked_ids[i] ) {
                    var col_value = $('#_get_col_' + checked_ids[i] ).val();
                    var innerSpans = $(this).parent().find('span');
                    innerSpans[0].innerHTML = col_value;
                }
            });
            continue;
        }
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f37898'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f37898'];?>

        window.parent.$('#'+target_control+'-none').hide();
        let _li = window.parent.$('#'+target_control+'-tmpl');
        let newli = _li.clone( true ).appendTo('#'+target_control );
        newli.removeClass('hidden');
        let col_value = $('#_get_col_' + checked_ids[i] ).val();
        <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.target','setvar'=>'this_target','this_tag'=>'var'],null,$this),$this),$this->setup_args('this_target','setvar',$this),$this,'setvar')?>

        <?php $_93a9cf_old_params['_3c1d39']=$_93a9cf_local_params;$_93a9cf_old_vars['_3c1d39']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_da2c94']=$_93a9cf_local_params;$_93a9cf_old_vars['_da2c94']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_target','match'=>'^asset_files\\-','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'this_target','value'=>'assets','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_da2c94'];$_93a9cf_local_vars=$_93a9cf_old_vars['_da2c94'];?>

            <?php $_93a9cf_old_params['_aa0208']=$_93a9cf_local_params;$_93a9cf_old_vars['_aa0208']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_target','eq'=>'assets','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            let obj_permalink = $('#permalink_'+checked_ids[i]);
            let obj_linkurl = $('#linkurl_'+checked_ids[i]);
            if ( obj_permalink.length ) {
                obj_permalink = obj_permalink.attr( 'href' );
                newli.children('.asset-download-btn').attr( 'href', obj_permalink );
                let fInfo = obj_permalink.split('.');
                let fileExtension = fInfo[fInfo.length-1].toLowerCase();
                let extensionsInline = ['csv', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'pptx'];
                if (extensionsInline.indexOf(fileExtension) < 0){
                    newli.children('.asset-download-btn').attr('target', '_blank');
                    newli.children('.asset-download-btn').children('i').removeClass('fa-download');
                    newli.children('.asset-download-btn').children('i').addClass('fa-external-link-square');
                    newli.children('.asset-download-btn').attr('aria-label','<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
');
                }
                if ( obj_linkurl.length ) {
                    obj_linkurl = obj_linkurl.attr( 'href' );
                    newli.children('.asset-linkurl-btn').attr( 'href', obj_linkurl );
                    if (extensionsInline.indexOf(fileExtension) < 0){
                        newli.children('.asset-linkurl-btn').attr('target', '_blank');
                    }
                    newli.children('.asset-linkurl-btn').removeClass('hidden');
                    newli.children('.asset-linkurl-btn').show();
                }
            } else {
                newli.children('.asset-download-btn').hide();
                newli.children('.asset-linkurl-btn').hide();
            }
            newli.children('.insert-file-id').attr('value',checked_ids[i]);
            newli.children('.insert-file-name').attr('value',col_value);
            newli.children('.insert-file-name').attr('id','_' + target_control + '_label_' + checked_ids[i]);
            newli.children('span').attr('id', '_' + target_control + '_name_' + checked_ids[i]);
            let editLink = $('#edit-link-'+checked_ids[i]);
            <?php else:?>

                newli.children('input').val( checked_ids[i] );
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_aa0208'];$_93a9cf_local_vars=$_93a9cf_old_vars['_aa0208'];?>

        <?php else:?>

            newli.children('input').val( checked_ids[i] );
            let obj_permalink = $('#permalink_'+checked_ids[i]);
            let obj_linkurl = $('#linkurl_'+checked_ids[i]);
            if ( obj_permalink.length ) {
                obj_permalink = obj_permalink.attr( 'href' );
                newli.children('.asset-download-btn').attr( 'href', obj_permalink );
                newli.children('.asset-download-btn').removeClass('hidden');
                if ( obj_linkurl.length ) {
                    obj_linkurl = obj_linkurl.attr( 'href' );
                    newli.children('.asset-linkurl-btn').attr( 'href', obj_linkurl );
                    newli.children('.asset-linkurl-btn').removeClass('hidden');
                    newli.children('.asset-linkurl-btn').show();
                }
            } else {
                newli.children('.asset-download-btn').addClass('hidden');
                newli.children('.asset-linkurl-btn').addClass('hidden');
            }
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3c1d39'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3c1d39'];?>

        newli.children('span').html( col_value );
        <?php $_93a9cf_old_params['_341775']=$_93a9cf_local_params;$_93a9cf_old_vars['_341775']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.from_obj','ne'=>'group','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_df8b4f']=$_93a9cf_local_params;$_93a9cf_old_vars['_df8b4f']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.any_model','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        let innerButtons = newli.find('button');
        let btn_index = 0;
        let elementClass = innerButtons[btn_index].getAttribute( 'class' );
        if ( $('#edit-link-'+checked_ids[i]).length ) {
            if ( elementClass.indexOf('relation-editor') != -1 ) {
                elementClass = elementClass.replace('hidden', '');
                innerButtons[btn_index].setAttribute( 'class', elementClass );
                let elementHref = innerButtons[btn_index].getAttribute( 'data-href' );
                elementHref = elementHref.replace( '__value__', checked_ids[i] );
                innerButtons[btn_index].setAttribute( 'data-href', elementHref );
                innerButtons[btn_index].setAttribute( 'href', elementHref );
            }
        } else {
            // Has not Permission.
            if ( elementClass.indexOf('relation-editor') != -1 ) {
                innerButtons[btn_index].setAttribute( 'class', elementClass + ' hidden' );
            }
        }
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_df8b4f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_df8b4f'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_341775'];$_93a9cf_local_vars=$_93a9cf_old_vars['_341775'];?>

        newli.removeAttr('id');
        newli.addClass( target_control+'-child');
        <?php $_93a9cf_old_params['_875c72']=$_93a9cf_local_params;$_93a9cf_old_vars['_875c72']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.from_obj','ne'=>'group','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_93a9cf_old_params['_44f5bb']=$_93a9cf_local_params;$_93a9cf_old_vars['_44f5bb']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.any_model','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        if ( newli.children('.assets-child-thumb').length ) {
            newli.children('.assets-child-thumb').attr('data-id',checked_ids[i]).css('background-image','url(\'<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=get_thumbnail&square=1&_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'this_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&id=' + checked_ids[i] + '\')');
            newli.children('.assets-child-thumb').removeClass('hidden');
            newli.children('.assets-child-thumb').show();
        }
        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_44f5bb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_44f5bb'];?>

        <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_875c72'];$_93a9cf_local_vars=$_93a9cf_old_vars['_875c72'];?>

        newli.show();
    }
    if(count){
        if(target_control && window.parent.setAssetThumbnail){
            window.parent.setAssetThumbnail(target_control,'<?php echo $this->function_var($this->setup_args(['name'=>'this_model','this_tag'=>'var'],null,$this),$this)?>
');
        }
    }
    if(target_control && window.parent.setRelatedObjectSelector){
        window.parent.setRelatedObjectSelector(target_control);
    }
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1cbad0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1cbad0'];?>

<?php $_93a9cf_old_params['_1461cb']=$_93a9cf_local_params;$_93a9cf_old_vars['_1461cb']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
    window.parent.$('#modal').modal('hide');
    window.parent.editContentChanged = true;
    return false;
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1461cb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1461cb'];?>

});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_77430a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_77430a'];?>

<?php $_93a9cf_old_params['_e70430']=$_93a9cf_local_params;$_93a9cf_old_vars['_e70430']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_sortable','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_dbaa09']=$_93a9cf_local_params;$_93a9cf_old_vars['_dbaa09']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

$('#list_body').sortable({
    stop: function( evt, ui ) {
        reorder();
    }
});
$('#list_body input').bind('click.sortable mousedown.sortable',function(ev){
    ev.target.focus();
});
function reorder(){
    <?php $_93a9cf_old_params['_240fcc']=$_93a9cf_local_params;$_93a9cf_old_vars['_240fcc']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_from','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    var i = <?php echo $this->function_var($this->setup_args(['name'=>'list_from','this_tag'=>'var'],null,$this),$this)?>
;
    <?php else:?>

    var i = 1;
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_240fcc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_240fcc'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'list_reorder_interval','setvar'=>'list_reorder_interval','this_tag'=>'property'],null,$this),$this),$this->setup_args('list_reorder_interval','setvar',$this),$this,'setvar')?>

    <?php $_93a9cf_old_params['_c68024']=$_93a9cf_local_params;$_93a9cf_old_vars['_c68024']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_order_desc','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    var tmp_raw = [];
    $('.order_col').each(function(){
        tmp_raw.push($(this));
    });
    tmp_raw.reverse();
    $.each(tmp_raw, function(index, item) {
        item.prop('value',i<?php $_93a9cf_old_params['_8ea9fe']=$_93a9cf_local_params;$_93a9cf_old_vars['_8ea9fe']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_reorder_interval','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
*<?php echo $this->function_var($this->setup_args(['name'=>'list_reorder_interval','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_model','eq'=>'table','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
*10<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8ea9fe'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8ea9fe'];?>
);
        i++;
    });
    <?php else:?>

    $('.order_col').each(function(){
        $(this).prop('value',i<?php $_93a9cf_old_params['_143b9c']=$_93a9cf_local_params;$_93a9cf_old_vars['_143b9c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_reorder_interval','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
*<?php echo $this->function_var($this->setup_args(['name'=>'list_reorder_interval','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_model','eq'=>'table','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
*10<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_143b9c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_143b9c'];?>
);
        i++;
    });
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c68024'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c68024'];?>

}
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dbaa09'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dbaa09'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e70430'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e70430'];?>

$('.query-box').change(function(){
    $('.query-box').val( $(this).val() );
});
$("input[name='id[]']").change(function(){
    set_all_select();
});
function set_all_select () {
    is_all = true;
    $("input[name='id[]']").each(function(){
        if ( $(this).prop('checked') == false ) {
            is_all = false;
            $('.cb-all-selected').prop('checked', false);
            $('.all-selected-cell').hide();
            return false;
        }
    });
    $('.selector').prop('checked', is_all );
}
$('.selector').click(function(){
    checked = $(this).prop('checked');
    $("input[name='id[]']").each(function(){
        $(this).prop('checked', checked);
    });
    $('.selector').prop('checked', checked);
<?php $_93a9cf_old_params['_0a695e']=$_93a9cf_local_params;$_93a9cf_old_vars['_0a695e']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_all_selected','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    if ( checked ) {
        $('.all-selected-cell').show();
    } else {
        $('.all-selected-cell').hide();
        $('.cb-all-selected').prop('checked', false);
    }
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0a695e'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0a695e'];?>

<?php $_93a9cf_old_params['_a5711d']=$_93a9cf_local_params;$_93a9cf_old_vars['_a5711d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_b045ac']=$_93a9cf_local_params;$_93a9cf_old_vars['_b045ac']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_93a9cf_old_params['_6ec379']=$_93a9cf_local_params;$_93a9cf_old_vars['_6ec379']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_single_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    set_selected_cbs();
    <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6ec379'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6ec379'];?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b045ac'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b045ac'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a5711d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a5711d'];?>

});
$('.cb-all-selected').change(function(){
    $('.cb-all-selected').prop('checked', $(this).prop('checked'));
});
$('.__delete').click(function(){
    if ( in_search ) {
        return true;
    }
    if( item_checked( true ) == false ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any %s to delete.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    var selected_items = item_checked( true );
    var cfm_msg = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove _1 %s?','params'=>'$plural','this_tag'=>'trans'],null,$this),$this)?>
';
    cfm_msg = cfm_msg.replace( '_1', selected_items );
    if(! confirm( cfm_msg ) ) {
        return false;
    }
    $("#__mode").prop('value', 'delete');
    $(this.form).submit();
    return true;
});
$('.__action').click(function(){
    if ( in_search ) {
        return;
    }
    if (! $('.select-action').val() ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any action.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if ( need_action_input ) {
        action_input = $('#action-input-box').val();
        if (! action_input ) {
            alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not any input.','this_tag'=>'trans'],null,$this),$this)?>
');
            return false;
        }
    }
    if ( need_datetime_input ) {
        action_input = $('#action-datetime-box').val();
        if (! action_input ) {
            alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not any input.','this_tag'=>'trans'],null,$this),$this)?>
');
            return false;
        }
    }
    if( item_checked( true ) == false ){
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any %s.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    var cfm_msg = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to process _1 _2?','this_tag'=>'trans'],null,$this),$this)?>
';
    var selected_items = item_checked( true );
    cfm_msg = cfm_msg.replace( '_1', selected_items );
    cfm_msg = cfm_msg.replace( '_2', '<?php echo $this->function_var($this->setup_args(['name'=>'plural','this_tag'=>'var'],null,$this),$this)?>
' );
    if(! confirm(cfm_msg) ) {
        return false;
    }
    if ( action_status_select ) {
        $('.itemset-action-input').val( $('.action-status-select').val() );
    }
    if ( need_datetime_input ) {
        $('.itemset-action-input').val( $('#action-input-box').val() );
    }
    $('#list-select-form').attr('target', '_self');
    var action_modal = $('[name=action_name] option:selected').attr('data-modal');
    if ( action_modal ) {
        $('#modal').modal();
        $('#list-select-form').attr('target', 'dialog-modal');
    }
    $("#__mode").prop('value', 'list_action');
    return true;
});
<?php $_93a9cf_old_params['_d4d43b']=$_93a9cf_local_params;$_93a9cf_old_vars['_d4d43b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_sortable','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('.__save_order').click(function(){
    if ( in_search ) {
        return true;
    }
    if ( item_checked() == false ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any %s to save order.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    let message = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to save order of selected %s?','params'=>'$plural','this_tag'=>'trans'],null,$this),$this)?>
';
    if ( $('.cb-all-selected').prop( 'checked' ) ) {
        message = message + ' <?php echo $this->function_trans($this->setup_args(['phrase'=>'Nothing applies to %s that are not visible.','params'=>'$plural','this_tag'=>'trans'],null,$this),$this)?>
';
    }
    if(! confirm( message ) ) {
        return false;
    }
    $('#__mode').prop('value', 'save_order');
    return true;
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d4d43b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d4d43b'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'setup_search','this_tag'=>'var'],null,$this),$this)?>

var selected_item_count;
function item_checked( count ) {
    if ( count && $('.cb-all-selected').prop('checked') ) {
        return <?php echo $this->function_var($this->setup_args(['name'=>'editable_count','this_tag'=>'var'],null,$this),$this)?>
;
    }
    selected_item_count = 0;
    var selected = false;
    $("input[name='id[]']").each(function(){
        if($(this).prop('checked') === true) {
            selected = true;
            if (! count ) {
                return false;
            }
            selected_item_count++;
        }
    });
    if ( count ) {
        return selected_item_count;
    }
    return selected;
}
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_51b95f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_51b95f'];?>


<script>
$(function() {
    $('img.lazy').lazyload();
    $('img.lazy').css('backgroundImage', 'url(<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/layer-bg.png)');
    $('img.lazy').css('backgroundRepeat', 'repeat');
    $('img.lazy').css('backgroundSize', 'cover');
});
</script>

<?php $_93a9cf_old_params['_29cb66']=$_93a9cf_local_params;$_93a9cf_old_vars['_29cb66']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'hide_current_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('._current_filter').hide();
$('#filter-button').hide();
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_29cb66'];$_93a9cf_local_vars=$_93a9cf_old_vars['_29cb66'];?>


<script>
<?php $_93a9cf_old_params['_9343dd']=$_93a9cf_local_params;$_93a9cf_old_vars['_9343dd']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_e66edc']=$_93a9cf_local_params;$_93a9cf_old_vars['_e66edc']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_e3deb4']=$_93a9cf_local_params;$_93a9cf_old_vars['_e3deb4']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_53cd4d']=$_93a9cf_local_params;$_93a9cf_old_vars['_53cd4d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_653fb7']=$_93a9cf_local_params;$_93a9cf_old_vars['_653fb7']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'allow_revision_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('.create_revision').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to create revision of this %s?','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_653fb7'];$_93a9cf_local_vars=$_93a9cf_old_vars['_653fb7'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_53cd4d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_53cd4d'];?>

<?php $_93a9cf_old_params['_d2df54']=$_93a9cf_local_params;$_93a9cf_old_vars['_d2df54']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_duplicate','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('.clone_object').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to duplicate this %s?','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d2df54'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d2df54'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e3deb4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e3deb4'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e66edc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e66edc'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9343dd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9343dd'];?>

$('.pull_back').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to pull back this %s?','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    window.location.href = $(this).attr('data-href');
});
var $win = $(window);
$win.on('load resize', function() {
    var windowWidth = window.innerWidth;
    if ( windowWidth > 768 ) {
        $('.info-box').html('');
        $('.info-box').hide();
        $('.toggle-icn').removeClass('fa-caret-up');
        $('.toggle-icn').addClass('fa-caret-down');
        $('.alt-search-button').hide();
        $('.list-col-primary').attr('colspan', 1);
    } else {
        $('.alt-search-button').show();
        $('.list-col-primary').attr('colspan', <?php echo $this->function_var($this->setup_args(['name'=>'list_colspan','this_tag'=>'var'],null,$this),$this)?>
);
    }
    $('.search-button').removeAttr('disabled');
    $('.alt-search-button').removeAttr('disabled');
    $('.query-box').removeAttr('disabled');
});
</script>

<?php $_93a9cf_old_params['_9f297f']=$_93a9cf_local_params;$_93a9cf_old_vars['_9f297f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_93a9cf_old_params['_ab3e48']=$_93a9cf_local_params;$_93a9cf_old_vars['_ab3e48']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_93a9cf_old_params['_faf853']=$_93a9cf_local_params;$_93a9cf_old_vars['_faf853']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</div><?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_faf853'];$_93a9cf_local_vars=$_93a9cf_old_vars['_faf853'];?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ab3e48'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ab3e48'];?>

        </main>
      </div>
    </div>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<?php $_93a9cf_old_params['_abd95b']=$_93a9cf_local_params;$_93a9cf_old_vars['_abd95b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_2bfb3f']=$_93a9cf_local_params;$_93a9cf_old_vars['_2bfb3f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_93a9cf_old_params['_702251']=$_93a9cf_local_params;$_93a9cf_old_vars['_702251']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_218752']=$_93a9cf_local_params;$_93a9cf_old_vars['_218752']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_218752'];$_93a9cf_local_vars=$_93a9cf_old_vars['_218752'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_702251'];$_93a9cf_local_vars=$_93a9cf_old_vars['_702251'];?>

<?php $_93a9cf_old_params['_3c67b3']=$_93a9cf_local_params;$_93a9cf_old_vars['_3c67b3']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_079a0f']=$_93a9cf_local_params;$_93a9cf_old_vars['_079a0f']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_079a0f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_079a0f'];?>

<?php $_93a9cf_old_params['_5480fd']=$_93a9cf_local_params;$_93a9cf_old_vars['_5480fd']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5480fd'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5480fd'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3c67b3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3c67b3'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_93a9cf_old_params['_f63fae']=$_93a9cf_local_params;$_93a9cf_old_vars['_f63fae']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_f63fae'];$_93a9cf_local_vars=$_93a9cf_old_vars['_f63fae'];?>

        relative_urls : false,
        image_advtab: true,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste code',
        toolbar  : 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.mce-tinymce[role=application]').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.addButton('pt-image', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_38df1b']=$_93a9cf_local_params;$_93a9cf_old_vars['_38df1b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_38df1b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_38df1b'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.addButton('pt-file', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_ccd0e4']=$_93a9cf_local_params;$_93a9cf_old_vars['_ccd0e4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ccd0e4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ccd0e4'];?>
&dialog_view=1&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.mce-tinymce[role=application]').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_93a9cf_old_params['_825364']=$_93a9cf_local_params;$_93a9cf_old_vars['_825364']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_93a9cf_old_params['_231c95']=$_93a9cf_local_params;$_93a9cf_old_vars['_231c95']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_231c95'];$_93a9cf_local_vars=$_93a9cf_old_vars['_231c95'];?>

                <?php $_93a9cf_old_params['_b7fa62']=$_93a9cf_local_params;$_93a9cf_old_vars['_b7fa62']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b7fa62'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b7fa62'];?>

                var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-size: cover; background-position: center;'
                  + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + '); color: <?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
}';
              } else {
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
              }
            }
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_825364'];$_93a9cf_local_vars=$_93a9cf_old_vars['_825364'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php else:?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce<?php echo $this->function_var($this->setup_args(['name'=>'tinymce_version','this_tag'=>'var'],null,$this),$this)?>
/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_93a9cf_old_params['_cf6b39']=$_93a9cf_local_params;$_93a9cf_old_vars['_cf6b39']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_5952e4']=$_93a9cf_local_params;$_93a9cf_old_vars['_5952e4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5952e4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5952e4'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_cf6b39'];$_93a9cf_local_vars=$_93a9cf_old_vars['_cf6b39'];?>

<?php $_93a9cf_old_params['_9e19dc']=$_93a9cf_local_params;$_93a9cf_old_vars['_9e19dc']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_711d92']=$_93a9cf_local_params;$_93a9cf_old_vars['_711d92']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_711d92'];$_93a9cf_local_vars=$_93a9cf_old_vars['_711d92'];?>

<?php $_93a9cf_old_params['_519a14']=$_93a9cf_local_params;$_93a9cf_old_vars['_519a14']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_519a14'];$_93a9cf_local_vars=$_93a9cf_old_vars['_519a14'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9e19dc'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9e19dc'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_93a9cf_old_params['_02004d']=$_93a9cf_local_params;$_93a9cf_old_vars['_02004d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_02004d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_02004d'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_93a9cf_old_params['_2ebf98']=$_93a9cf_local_params;$_93a9cf_old_vars['_2ebf98']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2ebf98'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2ebf98'];?>
',
        toolbar  : 'undo redo insert styleselect bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent fullscreen link image pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.tox-tinymce').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.ui.registry.addButton('pt-image', {
                <?php $_93a9cf_old_params['_3369d1']=$_93a9cf_local_params;$_93a9cf_old_vars['_3369d1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3369d1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3369d1'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_97b4de']=$_93a9cf_local_params;$_93a9cf_old_vars['_97b4de']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_97b4de'];$_93a9cf_local_vars=$_93a9cf_old_vars['_97b4de'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_93a9cf_old_params['_87ee81']=$_93a9cf_local_params;$_93a9cf_old_vars['_87ee81']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_87ee81'];$_93a9cf_local_vars=$_93a9cf_old_vars['_87ee81'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_255957']=$_93a9cf_local_params;$_93a9cf_old_vars['_255957']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_255957'];$_93a9cf_local_vars=$_93a9cf_old_vars['_255957'];?>
&dialog_view=1&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.tox-tinymce').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_93a9cf_old_params['_c40861']=$_93a9cf_local_params;$_93a9cf_old_vars['_c40861']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            ed.on('LoadContent',function(){
                if ( ed.id && ed.id == 'text' ) {
                    let clipboard_image = $('#clipboard-image');
                    let inline_image = $('#inline-image');
                    let bg_image_url = clipboard_image.val();
                    if ( inline_image.length ) {
                        bg_image_url = inline_image.attr('href');
                    }
                    let html_head = ed.iframeElement.contentWindow.document.getElementsByTagName('head')[0];
                    let style = document.createElement('style');
                    let content_style;
                    if ( clipboard_image.length ) {
                      <?php $_93a9cf_old_params['_4ef684']=$_93a9cf_local_params;$_93a9cf_old_vars['_4ef684']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4ef684'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4ef684'];?>

                      <?php $_93a9cf_old_params['_566997']=$_93a9cf_local_params;$_93a9cf_old_vars['_566997']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_566997'];$_93a9cf_local_vars=$_93a9cf_old_vars['_566997'];?>

                        var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-size: cover; background-position: center;'
                        + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + ')}';
                    } else {
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
                    }
                    style.innerHTML = content_style;
                    html_head.appendChild(style);
                }
            });
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c40861'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c40861'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2bfb3f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2bfb3f'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_abd95b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_abd95b'];?>

<script>
function disp_header_alert ( message, dialog_class ) {
    $("#header-alert-message").html( message );
    if (! dialog_class ) {
        dialog_class = 'success';
    }
    if ( dialog_class == 'success' ) {
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").addClass("alert-success");
    } else {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").addClass("alert-danger");
    }
    $("#header-alert").show();
    setTimeout(focus_header_dialog, 500);
}
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"WindowName","width=480,height=380,resizable=yes,scrollbars=yes");
        return false;
    });
});
</script>
<?php $_93a9cf_old_params['_10cc88']=$_93a9cf_local_params;$_93a9cf_old_vars['_10cc88']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>


<?php $_93a9cf_old_params['_926067']=$_93a9cf_local_params;$_93a9cf_old_vars['_926067']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_276cde']=$_93a9cf_local_params;$_93a9cf_old_vars['_276cde']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_93a9cf_old_params['_9dd144']=$_93a9cf_local_params;$_93a9cf_old_vars['_9dd144']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_5aef67']=$_93a9cf_local_params;$_93a9cf_old_vars['_5aef67']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5aef67'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5aef67'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9dd144'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9dd144'];?>

<?php $_93a9cf_old_params['_8e3dee']=$_93a9cf_local_params;$_93a9cf_old_vars['_8e3dee']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_276c4a']=$_93a9cf_local_params;$_93a9cf_old_vars['_276c4a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_276c4a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_276c4a'];?>

<?php $_93a9cf_old_params['_d4ed75']=$_93a9cf_local_params;$_93a9cf_old_vars['_d4ed75']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d4ed75'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d4ed75'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8e3dee'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8e3dee'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_93a9cf_old_params['_51bda3']=$_93a9cf_local_params;$_93a9cf_old_vars['_51bda3']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_51bda3'];$_93a9cf_local_vars=$_93a9cf_old_vars['_51bda3'];?>

        relative_urls : false,
        image_advtab: true,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste code',
        toolbar  : 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.mce-tinymce[role=application]').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.addButton('pt-image', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_1ef2f0']=$_93a9cf_local_params;$_93a9cf_old_vars['_1ef2f0']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1ef2f0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1ef2f0'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.addButton('pt-file', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_b74115']=$_93a9cf_local_params;$_93a9cf_old_vars['_b74115']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b74115'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b74115'];?>
&dialog_view=1&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.mce-tinymce[role=application]').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_93a9cf_old_params['_1e24b9']=$_93a9cf_local_params;$_93a9cf_old_vars['_1e24b9']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_93a9cf_old_params['_b1d432']=$_93a9cf_local_params;$_93a9cf_old_vars['_b1d432']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b1d432'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b1d432'];?>

                <?php $_93a9cf_old_params['_9a1ab1']=$_93a9cf_local_params;$_93a9cf_old_vars['_9a1ab1']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9a1ab1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9a1ab1'];?>

                var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-size: cover; background-position: center;'
                  + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + '); color: <?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
}';
              } else {
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
              }
            }
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1e24b9'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1e24b9'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php else:?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce<?php echo $this->function_var($this->setup_args(['name'=>'tinymce_version','this_tag'=>'var'],null,$this),$this)?>
/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_93a9cf_old_params['_dec7ba']=$_93a9cf_local_params;$_93a9cf_old_vars['_dec7ba']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_388963']=$_93a9cf_local_params;$_93a9cf_old_vars['_388963']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_388963'];$_93a9cf_local_vars=$_93a9cf_old_vars['_388963'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dec7ba'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dec7ba'];?>

<?php $_93a9cf_old_params['_e4b0e1']=$_93a9cf_local_params;$_93a9cf_old_vars['_e4b0e1']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_0efb26']=$_93a9cf_local_params;$_93a9cf_old_vars['_0efb26']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0efb26'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0efb26'];?>

<?php $_93a9cf_old_params['_3b076a']=$_93a9cf_local_params;$_93a9cf_old_vars['_3b076a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3b076a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3b076a'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e4b0e1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e4b0e1'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_93a9cf_old_params['_146649']=$_93a9cf_local_params;$_93a9cf_old_vars['_146649']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_146649'];$_93a9cf_local_vars=$_93a9cf_old_vars['_146649'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_93a9cf_old_params['_3ecb75']=$_93a9cf_local_params;$_93a9cf_old_vars['_3ecb75']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_3ecb75'];$_93a9cf_local_vars=$_93a9cf_old_vars['_3ecb75'];?>
',
        toolbar  : 'undo redo insert styleselect bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent fullscreen link image pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.tox-tinymce').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.ui.registry.addButton('pt-image', {
                <?php $_93a9cf_old_params['_610bd2']=$_93a9cf_local_params;$_93a9cf_old_vars['_610bd2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_610bd2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_610bd2'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_e60392']=$_93a9cf_local_params;$_93a9cf_old_vars['_e60392']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e60392'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e60392'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_93a9cf_old_params['_7767a4']=$_93a9cf_local_params;$_93a9cf_old_vars['_7767a4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_7767a4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_7767a4'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_a223b1']=$_93a9cf_local_params;$_93a9cf_old_vars['_a223b1']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a223b1'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a223b1'];?>
&dialog_view=1&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.tox-tinymce').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_93a9cf_old_params['_6bc159']=$_93a9cf_local_params;$_93a9cf_old_vars['_6bc159']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            ed.on('LoadContent',function(){
                if ( ed.id && ed.id == 'text' ) {
                    let clipboard_image = $('#clipboard-image');
                    let inline_image = $('#inline-image');
                    let bg_image_url = clipboard_image.val();
                    if ( inline_image.length ) {
                        bg_image_url = inline_image.attr('href');
                    }
                    let html_head = ed.iframeElement.contentWindow.document.getElementsByTagName('head')[0];
                    let style = document.createElement('style');
                    let content_style;
                    if ( clipboard_image.length ) {
                      <?php $_93a9cf_old_params['_a198d0']=$_93a9cf_local_params;$_93a9cf_old_vars['_a198d0']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a198d0'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a198d0'];?>

                      <?php $_93a9cf_old_params['_a71300']=$_93a9cf_local_params;$_93a9cf_old_vars['_a71300']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_a71300'];$_93a9cf_local_vars=$_93a9cf_old_vars['_a71300'];?>

                        var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-size: cover; background-position: center;'
                        + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + ')}';
                    } else {
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
                    }
                    style.innerHTML = content_style;
                    html_head.appendChild(style);
                }
            });
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_6bc159'];$_93a9cf_local_vars=$_93a9cf_old_vars['_6bc159'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_276cde'];$_93a9cf_local_vars=$_93a9cf_old_vars['_276cde'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_926067'];$_93a9cf_local_vars=$_93a9cf_old_vars['_926067'];?>

<script>
$(document).keydown(evnt_keydown);
function evnt_keydown(e) {
    if ( e.keyCode == 27 ) {
        window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
        window.parent.$('#modal').modal('hide');
    }
}
function disp_header_alert ( message, dialog_class ) {
    $("#header-alert-message").html( message );
    if (! dialog_class ) {
        dialog_class = 'success';
    }
    if ( dialog_class == 'success' ) {
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").addClass("alert-success");
    } else {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").addClass("alert-danger");
    }
    $("#header-alert").show();
    setTimeout(focus_header_dialog, 500);
}
function focus_header_dialog () {
    $("#header-alert").focus();
}
$(function(){
    $(document).on('click','[data-target="#modal"]',function(){
        let $this = $(this);
        let $modal = $('#modal');
        let url = '';
        if( $this.attr('href') ){
            url = $this.attr('href');
        } else if( this.href ){
            url = this.href;
        } else if( $this.data('href') ) {
            url = $this.data('href');
        } else if( $this.attr('data-href') ){
            url = $this.attr('data-href');
        }
        if( url ) {
            $modal.find('iframe').attr('src', url );
        }
    });
});
function getConversionRgba(color_code, alpha) {
    var rgba_code = [];
    rgba_code['red']   = parseInt(color_code.substring(1,3), 16);
    rgba_code['green'] = parseInt(color_code.substring(3,5), 16);
    rgba_code['blue']  = parseInt(color_code.substring(5,7), 16);
    rgba_code['alpha'] = isFinite(alpha) ? alpha : 0.4;
    return Object.values(rgba_code).join(',');
}
</script>
<div id="modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" data-keyboard="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
      <iframe id="modal-iframe" name="dialog-modal" style="width:100%;height:100%;"></iframe>
    </div>
  </div>
</div>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_10cc88'];$_93a9cf_local_vars=$_93a9cf_old_vars['_10cc88'];?>

<script>
function escape_html (string) {
  if(typeof string !== 'string') {
    return string;
  }
  return string.replace(/[&'`"<>]/g, function(match) {
    return {
      '&': '&amp;',
      "'": '&#x27;',
      '`': '&#x60;',
      '"': '&quot;',
      '<': '&lt;',
      '>': '&gt;',
    }[match]
  });
}
function unescape_html (string) {
  var div = document.createElement("div");
  div.innerHTML = string.replace(/</g,"&lt;")
                        .replace(/>/g,"&gt;")
                        .replace(/ /g, "&nbsp;")
                        .replace(/\r/g, "&#13;")
                        .replace(/\n/g, "&#10;");
  return div.textContent || div.innerText;
}
function submit_params_to_post ( url ) {
    const url_params = url.split('?');
    const url_param = url_params[1];
    const url_path = url_params[0];
    const url_param_data = JSON.parse('{"' + url_param.replace(/&/g, '","').replace(/=/g,'":"') + '"}', function( key, value ) { return key === "" ? value:decodeURIComponent( value ) } );
    const list_asset_form = document.createElement( 'form' );
    list_asset_form.method = 'post';
    list_asset_form.action = url_path;
    for ( const key in url_param_data ) {
        if ( url_param_data.hasOwnProperty( key ) ) {
            const hiddenField = document.createElement( 'input' );
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = url_param_data[ key ];
            list_asset_form.appendChild( hiddenField );
        }
    }
    document.body.appendChild( list_asset_form );
    list_asset_form.submit();
}
$('#modal').on('hidden.bs.modal', function(event) {
    $('#modal-iframe').attr('src', '<?php echo $this->function_var($this->setup_args(['name'=>'“script_uri”','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading' );
});
$('#modal').on('hidden.bs.modal', function(event) {
  if( window._active_ed ) {
      window._active_ed = window._active_ed.focus();
      window._active_ed = false;
  }
});
$('#modal-iframe').attr('src', '<?php echo $this->function_var($this->setup_args(['name'=>'“script_uri”','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading' );
</script>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>
<?php else:?>

<div id="modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" data-keyboard="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
      <iframe id="modal-iframe" name="dialog-modal" style="width:100%;height:100%;"></iframe>
    </div>
  </div>
</div>
        </main>
      </div>
    </div>
  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'copyright','setvar'=>'copyright','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('copyright','setvar',$this),$this,'setvar')?>

  <?php $_93a9cf_old_params['_e6e52b']=$_93a9cf_local_params;$_93a9cf_old_vars['_e6e52b']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'copyright','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <footer class="footer bar">
      <?php $_93a9cf_old_params['_8e3d13']=$_93a9cf_local_params;$_93a9cf_old_vars['_8e3d13']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <span class="copyright"><?php echo $this->modifier_eval($this->function_var($this->setup_args(['name'=>'copyright','eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval')?>
</span>
      <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8e3d13'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8e3d13'];?>

    </footer>
  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e6e52b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e6e52b'];?>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"RebuildPopupWindow","width=420,height=<?php $_93a9cf_old_params['_2023d2']=$_93a9cf_local_params;$_93a9cf_old_vars['_2023d2']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
360<?php else:?>
320<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_2023d2'];$_93a9cf_local_vars=$_93a9cf_old_vars['_2023d2'];?>
,resizable=yes,scrollbars=yes");
        return false;
    });
});
</script>
<script>
var $win = $(window);
$win.on('load resize', function() {
    var windowWidth = window.innerWidth;
    if ( windowWidth > 768 ) {
        $('.info-box').html('');
        $('.info-box').hide();
        $('.toggle-icn').removeClass('fa-caret-up');
        $('.toggle-icn').addClass('fa-caret-down');
        $('.alt-search-button').hide();
    } else {
        $('.alt-search-button').show();
    }
});
</script>
<?php $_93a9cf_old_params['_e5f276']=$_93a9cf_local_params;$_93a9cf_old_vars['_e5f276']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_93a9cf_old_params['_35151d']=$_93a9cf_local_params;$_93a9cf_old_vars['_35151d']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_93a9cf_old_params['_c42dfb']=$_93a9cf_local_params;$_93a9cf_old_vars['_c42dfb']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_13468a']=$_93a9cf_local_params;$_93a9cf_old_vars['_13468a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_13468a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_13468a'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c42dfb'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c42dfb'];?>

<?php $_93a9cf_old_params['_8cc77b']=$_93a9cf_local_params;$_93a9cf_old_vars['_8cc77b']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_43c67a']=$_93a9cf_local_params;$_93a9cf_old_vars['_43c67a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_43c67a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_43c67a'];?>

<?php $_93a9cf_old_params['_917c7c']=$_93a9cf_local_params;$_93a9cf_old_vars['_917c7c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_917c7c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_917c7c'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8cc77b'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8cc77b'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_93a9cf_old_params['_4c2038']=$_93a9cf_local_params;$_93a9cf_old_vars['_4c2038']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_4c2038'];$_93a9cf_local_vars=$_93a9cf_old_vars['_4c2038'];?>

        relative_urls : false,
        image_advtab: true,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste code',
        toolbar  : 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.mce-tinymce[role=application]').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.addButton('pt-image', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_41a0ed']=$_93a9cf_local_params;$_93a9cf_old_vars['_41a0ed']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_41a0ed'];$_93a9cf_local_vars=$_93a9cf_old_vars['_41a0ed'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.addButton('pt-file', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_ea2834']=$_93a9cf_local_params;$_93a9cf_old_vars['_ea2834']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ea2834'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ea2834'];?>
&dialog_view=1&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.mce-tinymce[role=application]').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_93a9cf_old_params['_5a00e8']=$_93a9cf_local_params;$_93a9cf_old_vars['_5a00e8']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_93a9cf_old_params['_420e52']=$_93a9cf_local_params;$_93a9cf_old_vars['_420e52']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_420e52'];$_93a9cf_local_vars=$_93a9cf_old_vars['_420e52'];?>

                <?php $_93a9cf_old_params['_118ed8']=$_93a9cf_local_params;$_93a9cf_old_vars['_118ed8']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_118ed8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_118ed8'];?>

                var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-size: cover; background-position: center;'
                  + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + '); color: <?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
}';
              } else {
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
              }
            }
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5a00e8'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5a00e8'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php else:?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce<?php echo $this->function_var($this->setup_args(['name'=>'tinymce_version','this_tag'=>'var'],null,$this),$this)?>
/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_93a9cf_old_params['_c5efbf']=$_93a9cf_local_params;$_93a9cf_old_vars['_c5efbf']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_93a9cf_old_params['_b6415c']=$_93a9cf_local_params;$_93a9cf_old_vars['_b6415c']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b6415c'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b6415c'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c5efbf'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c5efbf'];?>

<?php $_93a9cf_old_params['_dda588']=$_93a9cf_local_params;$_93a9cf_old_vars['_dda588']=$_93a9cf_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_0baf34']=$_93a9cf_local_params;$_93a9cf_old_vars['_0baf34']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_0baf34'];$_93a9cf_local_vars=$_93a9cf_old_vars['_0baf34'];?>

<?php $_93a9cf_old_params['_b97083']=$_93a9cf_local_params;$_93a9cf_old_vars['_b97083']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_b97083'];$_93a9cf_local_vars=$_93a9cf_old_vars['_b97083'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_dda588'];$_93a9cf_local_vars=$_93a9cf_old_vars['_dda588'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_93a9cf_old_params['_c648ee']=$_93a9cf_local_params;$_93a9cf_old_vars['_c648ee']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_c648ee'];$_93a9cf_local_vars=$_93a9cf_old_vars['_c648ee'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_93a9cf_old_params['_90ef03']=$_93a9cf_local_params;$_93a9cf_old_vars['_90ef03']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_90ef03'];$_93a9cf_local_vars=$_93a9cf_old_vars['_90ef03'];?>
',
        toolbar  : 'undo redo insert styleselect bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent fullscreen link image pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.tox-tinymce').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.ui.registry.addButton('pt-image', {
                <?php $_93a9cf_old_params['_5e101a']=$_93a9cf_local_params;$_93a9cf_old_vars['_5e101a']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_5e101a'];$_93a9cf_local_vars=$_93a9cf_old_vars['_5e101a'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_d52438']=$_93a9cf_local_params;$_93a9cf_old_vars['_d52438']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_d52438'];$_93a9cf_local_vars=$_93a9cf_old_vars['_d52438'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_93a9cf_old_params['_ed3f48']=$_93a9cf_local_params;$_93a9cf_old_vars['_ed3f48']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_ed3f48'];$_93a9cf_local_vars=$_93a9cf_old_vars['_ed3f48'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_93a9cf_old_params['_e92086']=$_93a9cf_local_params;$_93a9cf_old_vars['_e92086']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e92086'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e92086'];?>
&dialog_view=1&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.tox-tinymce').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_93a9cf_old_params['_1b4ba4']=$_93a9cf_local_params;$_93a9cf_old_vars['_1b4ba4']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            ed.on('LoadContent',function(){
                if ( ed.id && ed.id == 'text' ) {
                    let clipboard_image = $('#clipboard-image');
                    let inline_image = $('#inline-image');
                    let bg_image_url = clipboard_image.val();
                    if ( inline_image.length ) {
                        bg_image_url = inline_image.attr('href');
                    }
                    let html_head = ed.iframeElement.contentWindow.document.getElementsByTagName('head')[0];
                    let style = document.createElement('style');
                    let content_style;
                    if ( clipboard_image.length ) {
                      <?php $_93a9cf_old_params['_8df681']=$_93a9cf_local_params;$_93a9cf_old_vars['_8df681']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8df681'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8df681'];?>

                      <?php $_93a9cf_old_params['_85bff6']=$_93a9cf_local_params;$_93a9cf_old_vars['_85bff6']=$_93a9cf_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_85bff6'];$_93a9cf_local_vars=$_93a9cf_old_vars['_85bff6'];?>

                        var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-size: cover; background-position: center;'
                        + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + ')}';
                    } else {
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
                    }
                    style.innerHTML = content_style;
                    html_head.appendChild(style);
                }
            });
            <?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_1b4ba4'];$_93a9cf_local_vars=$_93a9cf_old_vars['_1b4ba4'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_35151d'];$_93a9cf_local_vars=$_93a9cf_old_vars['_35151d'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_e5f276'];$_93a9cf_local_vars=$_93a9cf_old_vars['_e5f276'];?>

<script>
function disp_header_alert ( message, dialog_class ) {
    $("#header-alert-message").html( message );
    if (! dialog_class ) {
        dialog_class = 'success';
    }
    if ( dialog_class == 'success' ) {
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").removeClass("alert-warning");
        $("#header-alert").addClass("alert-success");
    } else if ( dialog_class == 'warning' ) {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").addClass("alert-warning");
    } else {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").removeClass("alert-warning");
        $("#header-alert").addClass("alert-danger");
    }
    $("#header-alert").show();
    setTimeout(focus_header_dialog, 500);
}
function focus_header_dialog () {
    $("#header-alert").focus();
}
function escape_html (string) {
  if(typeof string !== 'string') {
    return string;
  }
  return string.replace(/[&'`"<>]/g, function(match) {
    return {
      '&': '&amp;',
      "'": '&#x27;',
      '`': '&#x60;',
      '"': '&quot;',
      '<': '&lt;',
      '>': '&gt;',
    }[match]
  });
}
function unescape_html (string) {
  var div = document.createElement("div");
  div.innerHTML = string.replace(/</g,"&lt;")
                        .replace(/>/g,"&gt;")
                        .replace(/ /g, "&nbsp;")
                        .replace(/\r/g, "&#13;")
                        .replace(/\n/g, "&#10;");
  return div.textContent || div.innerText;
}
function submit_params_to_post ( url ) {
    const url_params = url.split('?');
    const url_param = url_params[1];
    const url_path = url_params[0];
    const url_param_data = JSON.parse('{"' + url_param.replace(/&/g, '","').replace(/=/g,'":"') + '"}', function( key, value ) { return key === "" ? value:decodeURIComponent( value ) } );
    const list_asset_form = document.createElement( 'form' );
    list_asset_form.method = 'post';
    list_asset_form.action = url_path;
    for ( const key in url_param_data ) {
        if ( url_param_data.hasOwnProperty( key ) ) {
            const hiddenField = document.createElement( 'input' );
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = url_param_data[ key ];
            list_asset_form.appendChild( hiddenField );
        }
    }
    document.body.appendChild( list_asset_form );
    list_asset_form.submit();
}
$(function(){
    $(document).on('click','[data-target="#modal"]',function(){
        let $this = $(this);
        let $modal = $('#modal');
        let url = '';
        if( $this.attr('href') ){
            url = $this.attr('href');
        } else if( this.href ){
            url = this.href;
        } else if( $this.data('href') ) {
            url = $this.data('href');
        } else if( $this.attr('data-href') ){
            url = $this.attr('data-href');
        }
        if( url ) {
            $modal.find('iframe').attr('src', url );
        }
    });
});
function getConversionRgba(color_code, alpha) {
    var rgba_code = [];
    rgba_code['red']   = parseInt(color_code.substring(1,3), 16);
    rgba_code['green'] = parseInt(color_code.substring(3,5), 16);
    rgba_code['blue']  = parseInt(color_code.substring(5,7), 16);
    rgba_code['alpha'] = isFinite(alpha) ? alpha : 0.4;
    return Object.values(rgba_code).join(',');
}
<?php $_93a9cf_old_params['_188405']=$_93a9cf_local_params;$_93a9cf_old_vars['_188405']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_93a9cf_old_params['_8484fa']=$_93a9cf_local_params;$_93a9cf_old_vars['_8484fa']=$_93a9cf_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'loading','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#modal').on('hidden.bs.modal', function(event) {
    $('#modal-iframe').attr('src', '<?php echo $this->function_var($this->setup_args(['name'=>'“script_uri”','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading' );
});
$('#modal').on('hidden.bs.modal', function(event) {
  if( window._active_ed ) {
      window._active_ed = window._active_ed.focus();
      window._active_ed = false;
  }
});
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_8484fa'];$_93a9cf_local_vars=$_93a9cf_old_vars['_8484fa'];?>

<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_188405'];$_93a9cf_local_vars=$_93a9cf_old_vars['_188405'];?>

</script>
  </div>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>
<?php endif;$_93a9cf_local_params=$_93a9cf_old_params['_9f297f'];$_93a9cf_local_vars=$_93a9cf_old_vars['_9f297f'];?>


<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\list.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_actions.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\header.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_header.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\start_upload.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_filters.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext4.tmpl' => 1718664276,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988242,
);?>