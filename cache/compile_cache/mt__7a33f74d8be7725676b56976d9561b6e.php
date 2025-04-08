<?php ob_start();?><?php $_6c1c9e_vars=&$this->vars;$_6c1c9e_old_params=&$this->old_params;$_6c1c9e_local_params=&$this->local_params;$_6c1c9e_old_vars=&$this->old_vars;$_6c1c9e_local_vars=&$this->local_vars;?><script>
$('#class').change(function(){
    if ( $(this).val() == 'Mail' ) {
        $('#subject-wrapper').show();
    } else {
        $('#subject-wrapper').hide();
    }
});
</script>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__can_rebuild_this_template','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.id','escape'=>'','setvar'=>'template_id','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('template_id','setvar',$this),$this,'setvar')?>

<?php $_6c1c9e_old_params['_230e1f']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_230e1f']=$_6c1c9e_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._duplicate','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'mapping_out','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php $c_0688e9=null;$_6c1c9e_old_params['_0688e9']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_0688e9']=$_6c1c9e_local_vars;$a_0688e9=$this->setup_args(['model'=>'urlmapping','template_id'=>'$template_id','sort_by'=>'order','sort_order'=>'ascend','this_tag'=>'objectloop'],null,$this);$_0688e9=-1;$r_0688e9=true;while($r_0688e9===true):$r_0688e9=($_0688e9!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_0688e9,$c_0688e9,$this,$r_0688e9,++$_0688e9,'_0688e9');ob_start();?>
<?php $c_0688e9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0688e9=false;}if($c_0688e9 ):?>

<?php $_6c1c9e_old_params['_94e282']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_94e282']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'mapping_out','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<div class="row form-group">
<div class="col-lg-2 input-group-lg">
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Used in','this_tag'=>'trans'],null,$this),$this)?>

<?php $_6c1c9e_old_params['_22d829']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_22d829']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<a target="_blank" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=edit&_model=urlmapping<?php $_6c1c9e_old_params['_b065e6']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_b065e6']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_b065e6'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_b065e6'];?>
&amp;template_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <i class="fa fa-plus-circle" aria-hidden="true"> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</i>
</a>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_22d829'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_22d829'];?>

</div>
<div class="col-lg-10 input-group-lg">
<table class="table table-sm table-bordered">
<thead class="thead-default">
<tr>
<th><?php echo $this->function_trans($this->setup_args(['phrase'=>'URL Map','this_tag'=>'trans'],null,$this),$this)?>
</th>
<th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Archive Type','this_tag'=>'trans'],null,$this),$this)?>
</th>
<th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Container','this_tag'=>'trans'],null,$this),$this)?>
</th>
<th style="width:25%"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
</th>
</tr>
</thead>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_94e282'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_94e282'];?>

<tr>
<td>
<a target="_blank" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=urlmapping&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
<?php $_6c1c9e_old_params['_815de8']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_815de8']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_815de8'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_815de8'];?>
">
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

</a>
</td>
<td>
<?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'$model','language'=>'default','setvar'=>'map_model','this_tag'=>'trans'],null,$this),$this),$this->setup_args('default','language',$this),$this,'language'),$this->setup_args('map_model','setvar',$this),$this,'setvar')?>

<?php $_6c1c9e_old_params['_debe8c']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_debe8c']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'map_model','eq'=>'View','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__can_rebuild_this_template','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Index','this_tag'=>'trans'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$map_model','this_tag'=>'trans'],null,$this),$this)?>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_debe8c'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_debe8c'];?>

&nbsp; <a target="_blank" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=urlinfo<?php $_6c1c9e_old_params['_2c3843']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_2c3843']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_2c3843'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_2c3843'];?>
&amp;_filter=urlinfo&amp;_filter_value_urlmapping_id[]=<?php echo paml_rawurlencode($this->function_var($this->setup_args(['name'=>'name','escape'=>'url','this_tag'=>'var'],null,$this),$this))?>
&amp;_filter_cond_urlmapping_id[]=eq">
( <?php echo $this->function_trans($this->setup_args(['phrase'=>'List of %s','params'=>'URL','this_tag'=>'trans'],null,$this),$this)?>
 <i class="fa fa-external-link-square" aria-hidden="true"></i> )
</a>
</td>
<td>
<?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'$container','language'=>'default','setvar'=>'map_container','this_tag'=>'trans'],null,$this),$this),$this->setup_args('default','language',$this),$this,'language'),$this->setup_args('map_container','setvar',$this),$this,'setvar')?>

<?php echo $this->function_trans($this->setup_args(['phrase'=>'$map_container','this_tag'=>'trans'],null,$this),$this)?>

</td>
<td>
<?php echo paml_htmlspecialchars($this->component('PTTags')->hdlr_getobjectname($this->setup_args(['id'=>'$workspace_id','type'=>'reference:workspace:name','escape'=>'','this_tag'=>'getobjectname'],null,$this),$this),ENT_QUOTES)?>

</td>
</tr>
<?php $_6c1c9e_old_params['_6c3e62']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_6c3e62']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</table>
</div>
</div>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_6c3e62'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_6c3e62'];?>

<?php endif;$c_0688e9=ob_get_clean();endwhile; $_6c1c9e_local_params=$_6c1c9e_old_params['_0688e9'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_0688e9'];?>

<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_230e1f'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_230e1f'];?>

<?php $c_4ac276=null;$_6c1c9e_old_params['_4ac276']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_4ac276']=$_6c1c9e_local_vars;$a_4ac276=$this->setup_args(['name'=>'_include_modules','this_tag'=>'loop'],null,$this);$_4ac276=-1;$r_4ac276=true;while($r_4ac276===true):$r_4ac276=($_4ac276!==-1)?false:true;echo $this->block_loop($a_4ac276,$c_4ac276,$this,$r_4ac276,++$_4ac276,'_4ac276');ob_start();?>
<?php $c_4ac276 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4ac276=false;}if($c_4ac276 ):?>

<?php $_6c1c9e_old_params['_599608']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_599608']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
<div class="col-lg-2 input-group-lg">
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Include Modules','this_tag'=>'trans'],null,$this),$this)?>

</div>
<div class="col-lg-10 input-group-lg">
<table class="table table-sm table-bordered">
<thead class="thead-default">
<tr>
<th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Name','this_tag'=>'trans'],null,$this),$this)?>
</th>
<th style="width:25%"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
</th>
</tr>
</thead>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_599608'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_599608'];?>

<tr>
<td>
<a target="_blank" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=template&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'template_id','this_tag'=>'var'],null,$this),$this)?>
<?php $_6c1c9e_old_params['_198d71']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_198d71']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'template_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'template_workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_198d71'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_198d71'];?>
">
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'template_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

</a>
</td>
<td>
<?php echo paml_htmlspecialchars($this->component('PTTags')->hdlr_getobjectname($this->setup_args(['id'=>'$template_workspace_id','type'=>'reference:workspace:name','escape'=>'','this_tag'=>'getobjectname'],null,$this),$this),ENT_QUOTES)?>

</td>
</tr>
<?php $_6c1c9e_old_params['_b8ce09']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_b8ce09']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</table>
</div>
</div>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_b8ce09'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_b8ce09'];?>

<?php endif;$c_4ac276=ob_get_clean();endwhile; $_6c1c9e_local_params=$_6c1c9e_old_params['_4ac276'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_4ac276'];?>

<?php $_6c1c9e_old_params['_968557']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_968557']=$_6c1c9e_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'mapping_out','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_6c1c9e_old_params['_2eeadf']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_2eeadf']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group hidden" id="add_urlmapping">
<div class="col-lg-2 input-group-lg">
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Used in','this_tag'=>'trans'],null,$this),$this)?>

<a target="_blank" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=edit&_model=urlmapping<?php $_6c1c9e_old_params['_08bd71']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_08bd71']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_08bd71'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_08bd71'];?>
&amp;template_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <i class="fa fa-plus-circle" aria-hidden="true"> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</i>
</a>
</div>
<div class="col-lg-10 input-group-lg">
</div>
</div>
<script>
if ( $('#class').val() == 'Archive' ) {
    $('#add_urlmapping').show();
}
</script>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_2eeadf'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_2eeadf'];?>

<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_968557'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_968557'];?>

<?php $_6c1c9e_old_params['_32942e']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_32942e']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'mapping_out','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'can_rebuild_in_view','setvar'=>'can_rebuild_in_view','this_tag'=>'property'],null,$this),$this),$this->setup_args('can_rebuild_in_view','setvar',$this),$this,'setvar')?>

<?php $_6c1c9e_old_params['_da718b']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_da718b']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_rebuild_in_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'__can_rebuild_this_template','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_da718b'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_da718b'];?>

<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_32942e'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_32942e'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\template\\screen_header.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\template\\form_footer.tmpl' => 1694708434,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075530,
);?>