<?php ob_start();?><?php $_ad2869_vars=&$this->vars;$_ad2869_old_params=&$this->old_params;$_ad2869_local_params=&$this->local_params;$_ad2869_old_vars=&$this->old_vars;$_ad2869_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'edit','split'=>':','setvar'=>'edit_props','this_tag'=>'var'],null,$this),$this),$this->setup_args(':','split',$this),$this,'split'),$this->setup_args('edit_props','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[1]','setvar'=>'rel_model','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_model','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[2]','setvar'=>'rel_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_col','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[3]','setvar'=>'rel_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_type','setvar',$this),$this,'setvar')?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="additional_tags">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_ad2869_old_params['_ab17a5']=$_ad2869_local_params;$_ad2869_old_vars['_ab17a5']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_ab17a5'];$_ad2869_local_vars=$_ad2869_old_vars['_ab17a5'];?>

    </label>
  </div>
  <div class="col-lg-10">
  <?php $c_9c3ea5=null;$_ad2869_old_params['_9c3ea5']=$_ad2869_local_params;$_ad2869_old_vars['_9c3ea5']=$_ad2869_local_vars;$a_9c3ea5=$this->setup_args(['name'=>'__rel_name__','this_tag'=>'setvarblock'],null,$this);ob_start();?>
object_<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
<?php $c_9c3ea5=ob_get_clean();$c_9c3ea5=$this->block_setvarblock($a_9c3ea5,$c_9c3ea5,$this,$r_9c3ea5,1,'_9c3ea5');echo($c_9c3ea5); $_ad2869_local_params=$_ad2869_old_params['_9c3ea5'];?>

  <ul id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="relation-list">
    <li <?php $_ad2869_old_params['_693083']=$_ad2869_local_params;$_ad2869_old_vars['_693083']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$__rel_name__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="display:none" <?php endif;$_ad2869_local_params=$_ad2869_old_params['_693083'];$_ad2869_local_vars=$_ad2869_old_vars['_693083'];?>
class="badge badge-default badge-relation" id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-none">
    <span><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
&nbsp;</span>
    </li>
    <li class="hidden badge badge-default badge-relation badge-draggable" id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-tmpl">
    <span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Default','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <button type="button" class="btn btn-secondary btn-sm close-sm" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
" data-name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
[]" value="">
    </li>
  <?php $c_beb55a=null;$_ad2869_old_params['_beb55a']=$_ad2869_local_params;$_ad2869_old_vars['_beb55a']=$_ad2869_local_vars;$a_beb55a=$this->setup_args(['name'=>'selected_ids','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php $c_b2e79a=null;$_ad2869_old_params['_b2e79a']=$_ad2869_local_params;$_ad2869_old_vars['_b2e79a']=$_ad2869_local_vars;$a_b2e79a=$this->setup_args(['name'=>'$__rel_name__','glue'=>',','this_tag'=>'loop'],null,$this);$_b2e79a=-1;$r_b2e79a=true;while($r_b2e79a===true):$r_b2e79a=($_b2e79a!==-1)?false:true;echo $this->block_loop($a_b2e79a,$c_b2e79a,$this,$r_b2e79a,++$_b2e79a,'_b2e79a');ob_start();?>
<?php $c_b2e79a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b2e79a=false;}if($c_b2e79a ):?>
<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_b2e79a=ob_get_clean();endwhile; $_ad2869_local_params=$_ad2869_old_params['_b2e79a'];$_ad2869_local_vars=$_ad2869_old_vars['_b2e79a'];?>
<?php $c_beb55a=ob_get_clean();$c_beb55a=$this->block_setvarblock($a_beb55a,$c_beb55a,$this,$r_beb55a,1,'_beb55a');echo($c_beb55a); $_ad2869_local_params=$_ad2869_old_params['_beb55a'];?>


  <?php $c_fe8a64=null;$_ad2869_old_params['_fe8a64']=$_ad2869_local_params;$_ad2869_old_vars['_fe8a64']=$_ad2869_local_vars;$a_fe8a64=$this->setup_args(['name'=>'$__rel_name__','this_tag'=>'loop'],null,$this);$_fe8a64=-1;$r_fe8a64=true;while($r_fe8a64===true):$r_fe8a64=($_fe8a64!==-1)?false:true;echo $this->block_loop($a_fe8a64,$c_fe8a64,$this,$r_fe8a64,++$_fe8a64,'_fe8a64');ob_start();?>
<?php $c_fe8a64 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fe8a64=false;}if($c_fe8a64 ):?>

    <li class="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-child badge badge-default badge-relation badge-draggable">
    <span><?php echo paml_htmlspecialchars($this->component('PTTags')->hdlr_getobjectname($this->setup_args(['id'=>'$__value__','type'=>'$edit','escape'=>'','this_tag'=>'getobjectname'],null,$this),$this),ENT_QUOTES)?>
</span>
    <button type="button" class="btn btn-secondary btn-sm close-sm" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
" data-name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
[]" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"></li>
  <?php endif;$c_fe8a64=ob_get_clean();endwhile; $_ad2869_local_params=$_ad2869_old_params['_fe8a64'];$_ad2869_local_vars=$_ad2869_old_vars['_fe8a64'];?>

  </ul>
<?php $_ad2869_old_params['_770b73']=$_ad2869_local_params;$_ad2869_old_vars['_770b73']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'readonly','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <button type="button" class="btn btn-primary btn-sm dialog-chooser" data-toggle="modal" data-target="#modal"
    data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ad2869_old_params['_cd4e29']=$_ad2869_local_params;$_ad2869_old_vars['_cd4e29']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_cd4e29'];$_ad2869_local_vars=$_ad2869_old_vars['_cd4e29'];?>
&amp;dialog_view=1&amp;target=<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;select_add=1&_filter=tag&amp;_system_filters_option=<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
&select_system_filters=filter_class_<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
&amp;_start_filter=1&amp;ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add...','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_770b73'];$_ad2869_local_vars=$_ad2869_old_vars['_770b73'];?>

</div>
<script>
$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').sortable ( {
});
$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').ksortable();
</script>
</div>
<?php $_ad2869_old_params['_8d7846']=$_ad2869_local_params;$_ad2869_old_vars['_8d7846']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'readonly','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tag_permission','setvar'=>'tag_permission','this_tag'=>'property'],null,$this),$this),$this->setup_args('tag_permission','setvar',$this),$this,'setvar')?>

<?php $_ad2869_old_params['_9b2456']=$_ad2869_local_params;$_ad2869_old_vars['_9b2456']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tag_permission','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group add-tags">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <input type="text" placeholder="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter comma-separated tags to add.','this_tag'=>'trans'],null,$this),$this)?>
" class="form-control" id="additional_tags" name="additional_tags" value="<?php $_ad2869_old_params['_ed9fab']=$_ad2869_local_params;$_ad2869_old_vars['_ed9fab']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.additional_tags','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.additional_tags','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_ed9fab'];$_ad2869_local_vars=$_ad2869_old_vars['_ed9fab'];?>
">
  </div>
</div>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_9b2456'];$_ad2869_local_vars=$_ad2869_old_vars['_9b2456'];?>

<?php endif;$_ad2869_local_params=$_ad2869_old_params['_8d7846'];$_ad2869_local_vars=$_ad2869_old_vars['_8d7846'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744011352,
);?>