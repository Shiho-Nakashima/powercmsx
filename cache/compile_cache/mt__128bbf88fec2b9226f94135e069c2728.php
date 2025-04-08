<?php ob_start();?><?php $literal_old__b7ec14_=$this->literal_vars;$this->literal_vars=array (
  0 => '
<tr>
<td class="workflow-primary">
<div>
<span class="widget-cell-detail hidden workflow-icon"><mtstatustext status="$object_status" model="$count_group_by_model" icon="1" /></span>
<a href="<mtvar name="script_uri" />?__mode=view&amp;_type=edit&_model=<mtvar name="count_group_by_model" />&amp;id=<mtvar name="object_id" /><mtif name="object_workspace_id">&amp;workspace_id=<mtvar name="object_workspace_id" /></mtif>">
<mtif name="object_rev_type">
<span class="badge badge-dark badge-pill badge-sm"><mttrans phrase="Revision" /></span>
</mtif>
<mtif name="object__primary">
<mtvar name="object__primary" escape />
<mtelse />
(null)
</mtif>
</a>
<a class="widget-cell-detail btn toggle-infobox hidden"
  id="toggle_<mtvar name="count_group_by_model" />_<mtvar name="object_id" />" href="javascript:void(0);">
<i id="icon_<mtvar name="count_group_by_model" />_<mtvar name="object_id" />" class="fa fa-caret-down toggle-icn" aria-hidden="true"></i>
<span class="sr-only"><mttrans phrase="Toggle" /></span>
</a>
</div>
<div class="widget-cell-detail hidden">
<table class="cell-detail table-sm hidden" id="detail_<mtvar name="count_group_by_model" />_<mtvar name="object_id" />">
  <tr><th><mttrans phrase="Status" /></th><td><mtstatustext status="$object_status" text="1" model="$count_group_by_model" icon="1" /></td></tr>
  <tr><th><mtvar name="date_col_label" /></th><td><mtvar name="$published_on_col" format_ts="Y-m-d H:i" /></td></tr>
  <mtunless name="workspace_id">
  <mtobjectvar model="workspace" id="$object_workspace_id" name="name" escape setvar="_object_workspace_name" />
  <mtunless name="_object_workspace_name"><mttrans phrase="System" setvar="_object_workspace_name" /></mtunless>
  <tr><th><mttrans phrase="WorkSpace" /></th><td><mtvar name="_object_workspace_name" /></td></tr>
  </mtunless>
</table>
</div>
</td>
<td class="workflow-status workflow-option">
<mtstatustext status="$object_status" text="1" model="$count_group_by_model" icon="1" />
</td>
<td class="workflow-published_on workflow-option">
<mtvar name="$published_on_col" format_ts="Y-m-d H:i" />
</td>
<mtunless name="workspace_id">
<td class="workflow-workspace-name workflow-option">
<mtvar name="_object_workspace_name" />
</td>
</mtunless>
</tr>
',
  1 => '
<tr>
  <th class="workflow-primary"><mttrans phrase="$_object_primary_label" /></th>
  <th class="workflow-status workflow-option"><mttrans phrase="Status" /></th>
  <th class="workflow-published_on workflow-option"><mtvar name="date_col_label" /></th>
  <mtunless name="workspace_id">
  <th class="workflow-workspace-name workflow-option"><mttrans phrase="WorkSpace" /></th>
  </mtunless>
</tr>
',
  2 => '
<div class="workflow-model-wrapper">
  <mtsetvar name="_workspace_ids" value="" />
  <mtif name="workspace_id">
    <mtifusercan model="$count_group_by_model" workspace_id="$workspace_id" action="list">
      <mtgettableid model="$count_group_by_model" column="display_space" setvar="_display" />
    </mtifusercan>
    <mtvar name="workspace_id" setvar="_workspace_ids" />
  <mtelse />
    <mtifusercan model="$count_group_by_model" workspace_id="0" action="list">
      <mtgettableid model="$count_group_by_model" column="display_system" setvar="_display" />
    </mtifusercan>
  <mtobjectloop model="workflow" prefix="workflow">
    <mtif name="workflow_model" eq="$count_group_by_model">
      <mtsetvar name="_workspace_ids" value="$workflow_workspace_id" function="push" />
    </mtif>
  </mtobjectloop>
  <mtvar name="_workspace_ids" join="," setvar="_workspace_ids" />
  </mtif>
  <mtsetvarblock name="_workflow_objects">
  <h3>
  <mtgettableid model="$count_group_by_model" column="plural" translate setvar="_object_label" />
  <mttrans phrase="%s that your responsible" params="$_object_label" />
  </h3>
  <mtsetvar name="_object_count" value="0" />
  <mtgetobjectlabel model="$count_group_by_model" primary="1" setvar="_object_primary" />
  <mttrans phrase="$_object_primary" language="default" setvar="_object_primary_label" />
  <mtif name="_object_primary_label" eq="$_object_primary">
  <mtvar name="_object_primary_label" title_case="1" setvar="_object_primary_label" />
  </mtif>

<mtsetvarblock name="date_col_name"><mtvar name="count_group_by_model" />_date_based_col</mtsetvarblock>
<mtproperty name="$date_col_name" setvar="date_col_name" />
<mtsetvar name="published_on_col" value="object_" />
<mtif name="date_col_name">
  <mtsetvar name="published_on_col" value="$date_col_name" append="1" />
  <mttrans phrase="$date_col_name" language="default" setvar="date_col_label" />
  <mttrans phrase="$date_col_label" setvar="date_col_label" />

<mtelse />
  <mtsetvar name="published_on_col" value="published_on" append="1" />
  <mttrans phrase="Publish Date" setvar="date_col_label" />
</mtif>

  <mtsetvar name="header_sent" value="0" />
  <mtobjectloop model="$count_group_by_model" prefix="object" cols="*"
    user_id="$user_id" sort_by="published_on" workflow="1" workspace_ids="$_workspace_ids"
    sort_order="descend" limit="$_object_limit" status="2">
    <mtif name="object_id">
      <mtvar name="_object_count" increment setvar="_object_count" />
    </mtif>
    <mtif name="_object_count" le="$_object_limit">
    <mtif name="__first__">
    <table class="table table-sm table-striped table-widget">
    <mtvar name="_object_head" />
    </mtif>
    <mtvar name="_object_line" />
    <mtif name="__counter__">
      <mtif name="object_id">
        <mtsetvar name="header_sent" value="$__counter__" />
      </mtif>
    </mtif>
    </mtif>
  </mtobjectloop>
<mtif name="_object_count" le="$_object_limit">
  <mtobjectloop model="$count_group_by_model" prefix="object" cols="*"
    user_id="$user_id" sort_by="published_on" workflow="1" workspace_ids="$_workspace_ids"
    sort_order="descend" limit="$_object_limit" status="1">
    <mtif name="object_id">
      <mtvar name="_object_count" increment setvar="_object_count" />
    </mtif>
    <mtif name="_object_count" le="$_object_limit">
    <mtif name="__first__">
    <mtunless name="header_sent">
    <table class="table table-sm table-striped table-widget">
    <mtvar name="_object_head" />
    </mtunless>
    </mtif>
    <mtvar name="_object_line" />
    <mtif name="__counter__">
      <mtif name="object_id">
        <mtsetvar name="header_sent" value="$__counter__" />
      </mtif>
    </mtif>
    </mtif>
  </mtobjectloop>
</mtif>
<mtif name="_object_count" le="$_object_limit">
  <mtobjectloop model="$count_group_by_model" prefix="object" cols="*"
    user_id="$user_id" sort_by="published_on" workflow="1" workspace_ids="$_workspace_ids"
    sort_order="descend" limit="$_object_limit" status="0">
    <mtif name="object_id">
      <mtvar name="_object_count" increment setvar="_object_count" />
    </mtif>
    <mtif name="_object_count" le="$_object_limit">
    <mtif name="__first__">
    <mtunless name="header_sent">
    <table class="table table-sm table-striped table-widget">
    <mtvar name="_object_head" />
    </mtunless>
    </mtif>
    <mtvar name="_object_line" />
    <mtif name="__counter__">
      <mtif name="object_id">
        <mtsetvar name="header_sent" value="$__counter__" />
      </mtif>
    </mtif>
    </mtif>
  </mtobjectloop>
</mtif>
  <mtif name="header_sent">
    </table>
    <mtif name="_display">
    <div class="mt-2">
    <div class="text-right" id="workflow-footer-btn mt-3">
      <a href="<mtvar name="script_uri" />?__mode=view&_type=list&_model=<mtvar name="count_group_by_model" /><mtif name="workspace_id">&amp;workspace_id=<mtvar name="workspace_id" /></mtif>&amp;select_system_filters=responsible_objects&amp;_filter=<mtvar name="count_group_by_model" />"
        class="btn btn-secondary btn-sm"><mttrans phrase="View all %s that your responsible" params="$_object_label" /></a>
    </div>
    </div>
    </mtif>
  </mtif>
  </mtsetvarblock>
  <mtif name="header_sent">
    <mtsetvar name="_has_workflow" value="1" />
    <mtvar name="_workflow_objects" />
  <mtelse />
    <h3>
    <mtgettableid model="$count_group_by_model" column="plural" translate setvar="_object_label" />
    <mttrans phrase="%s that your responsible" params="$_object_label" />
    </h3>
    <table class="table table-sm table-striped table-widget">
    <tr><td>
    <mtgettableid model="$count_group_by_model" column="plural" translate setvar="_object_label" />
    <span class="text-muted"><mttrans phrase="No %s Found." params="$_object_label" /></span>
    </td></tr>
    </table>
  </mtif>
</div>
',
);?><?php $_b7ec14_vars=&$this->vars;$_b7ec14_old_params=&$this->old_params;$_b7ec14_local_params=&$this->local_params;$_b7ec14_old_vars=&$this->old_vars;$_b7ec14_local_vars=&$this->local_vars;?><?php echo $this->function_setvar($this->setup_args(['name'=>'_has_workflow','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_object_limit','value'=>'5','this_tag'=>'setvar'],null,$this),$this)?>

<?php $c_897438=null;ob_start();$_b7ec14_old_params['_897438']=$_b7ec14_local_params;$_b7ec14_old_vars['_897438']=$_b7ec14_local_vars;$a_897438=$this->setup_args(['setvartemplate'=>'_object_line','index'=>'0','name'=>'_object_line','this_tag'=>'literal'],null,$this);$_897438=-1;$r_897438=true;while($r_897438===true):$r_897438=($_897438!==-1)?false:true;echo $this->block_literal($a_897438,$c_897438,$this,$r_897438,++$_897438,'_897438');ob_start();?>
<?php $c_897438 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_897438=false;}if($c_897438 ):?>
<?php endif;$c_897438=ob_get_clean();endwhile;$c_897438=ob_get_clean();echo($this->modifier_setvartemplate($c_897438,$this->setup_args('_object_line','setvartemplate',$this),$this,'setvartemplate')); $_b7ec14_local_params=$_b7ec14_old_params['_897438'];$_b7ec14_local_vars=$_b7ec14_old_vars['_897438'];?>

<?php $c_81e3da=null;ob_start();$_b7ec14_old_params['_81e3da']=$_b7ec14_local_params;$_b7ec14_old_vars['_81e3da']=$_b7ec14_local_vars;$a_81e3da=$this->setup_args(['setvartemplate'=>'_object_head','index'=>'1','name'=>'_object_head','this_tag'=>'literal'],null,$this);$_81e3da=-1;$r_81e3da=true;while($r_81e3da===true):$r_81e3da=($_81e3da!==-1)?false:true;echo $this->block_literal($a_81e3da,$c_81e3da,$this,$r_81e3da,++$_81e3da,'_81e3da');ob_start();?>
<?php $c_81e3da = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_81e3da=false;}if($c_81e3da ):?>
<?php endif;$c_81e3da=ob_get_clean();endwhile;$c_81e3da=ob_get_clean();echo($this->modifier_setvartemplate($c_81e3da,$this->setup_args('_object_head','setvartemplate',$this),$this,'setvartemplate')); $_b7ec14_local_params=$_b7ec14_old_params['_81e3da'];$_b7ec14_local_vars=$_b7ec14_old_vars['_81e3da'];?>

<?php $c_f37b8e=null;ob_start();$_b7ec14_old_params['_f37b8e']=$_b7ec14_local_params;$_b7ec14_old_vars['_f37b8e']=$_b7ec14_local_vars;$a_f37b8e=$this->setup_args(['setvartemplate'=>'_count_group_by','index'=>'2','name'=>'_count_group_by','this_tag'=>'literal'],null,$this);$_f37b8e=-1;$r_f37b8e=true;while($r_f37b8e===true):$r_f37b8e=($_f37b8e!==-1)?false:true;echo $this->block_literal($a_f37b8e,$c_f37b8e,$this,$r_f37b8e,++$_f37b8e,'_f37b8e');ob_start();?>
<?php $c_f37b8e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f37b8e=false;}if($c_f37b8e ):?>
<?php endif;$c_f37b8e=ob_get_clean();endwhile;$c_f37b8e=ob_get_clean();echo($this->modifier_setvartemplate($c_f37b8e,$this->setup_args('_count_group_by','setvartemplate',$this),$this,'setvartemplate')); $_b7ec14_local_params=$_b7ec14_old_params['_f37b8e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f37b8e'];?>

<?php $c_1c088b=null;$_b7ec14_old_params['_1c088b']=$_b7ec14_local_params;$_b7ec14_old_vars['_1c088b']=$_b7ec14_local_vars;$a_1c088b=$this->setup_args(['name'=>'_workflow_widget','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<div id="widget-workflow" class="card dashboard-widget <?php $_b7ec14_old_params['_b514c8']=$_b7ec14_local_params;$_b7ec14_old_vars['_b514c8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
dashboard-widget-workspace<?php else:?>
dashboard-widget-system<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b514c8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b514c8'];?>
">
  <h2 class="card-header"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Workflow','this_tag'=>'trans'],null,$this),$this)?>

    <button type="button" class="detatch-widget" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
" data-name="widget-workflow">
      <span aria-hidden="true">&times;</span>
    </button>
  </h2>
  <div class="card-block">
<?php $_b7ec14_old_params['_03f4be']=$_b7ec14_local_params;$_b7ec14_old_vars['_03f4be']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_8baedb=null;$_b7ec14_old_params['_8baedb']=$_b7ec14_local_params;$_b7ec14_old_vars['_8baedb']=$_b7ec14_local_vars;$a_8baedb=$this->setup_args(['model'=>'workflow','count'=>'model','group'=>'model','workspace_ids'=>'$workspace_id','this_tag'=>'countgroupby'],null,$this);$_8baedb=-1;$r_8baedb=true;while($r_8baedb===true):$r_8baedb=($_8baedb!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_8baedb,$c_8baedb,$this,$r_8baedb,++$_8baedb,'_8baedb');ob_start();?>
<?php $c_8baedb = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8baedb=false;}if($c_8baedb ):?>

  <?php $_b7ec14_old_params['_ba981d']=$_b7ec14_local_params;$_b7ec14_old_vars['_ba981d']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['model'=>'$count_group_by_model','action'=>'list','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_var($this->setup_args(['name'=>'_count_group_by','this_tag'=>'var'],null,$this),$this)?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ba981d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ba981d'];?>

<?php endif;$c_8baedb=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_8baedb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8baedb'];?>

<?php else:?>

<?php $c_874b79=null;$_b7ec14_old_params['_874b79']=$_b7ec14_local_params;$_b7ec14_old_vars['_874b79']=$_b7ec14_local_vars;$a_874b79=$this->setup_args(['model'=>'workflow','count'=>'model','group'=>'model','this_tag'=>'countgroupby'],null,$this);$_874b79=-1;$r_874b79=true;while($r_874b79===true):$r_874b79=($_874b79!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_874b79,$c_874b79,$this,$r_874b79,++$_874b79,'_874b79');ob_start();?>
<?php $c_874b79 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_874b79=false;}if($c_874b79 ):?>

  <?php $_b7ec14_old_params['_aea366']=$_b7ec14_local_params;$_b7ec14_old_vars['_aea366']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['model'=>'$count_group_by_model','action'=>'list','workspace_id'=>'any','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_var($this->setup_args(['name'=>'_count_group_by','this_tag'=>'var'],null,$this),$this)?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_aea366'];$_b7ec14_local_vars=$_b7ec14_old_vars['_aea366'];?>

<?php endif;$c_874b79=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_874b79'];$_b7ec14_local_vars=$_b7ec14_old_vars['_874b79'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_03f4be'];$_b7ec14_local_vars=$_b7ec14_old_vars['_03f4be'];?>

  </div>
</div>
<?php $c_1c088b=ob_get_clean();$c_1c088b=$this->block_setvarblock($a_1c088b,$c_1c088b,$this,$r_1c088b,1,'_1c088b');echo($c_1c088b); $_b7ec14_local_params=$_b7ec14_old_params['_1c088b'];?>

<?php $_b7ec14_old_params['_5d8085']=$_b7ec14_local_params;$_b7ec14_old_vars['_5d8085']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_workflow','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_var($this->setup_args(['name'=>'_workflow_widget','this_tag'=>'var'],null,$this),$this)?>

<script>
$('.toggle-infobox').click(function(){
    this_id = $(this).prop('id');
    this_id = this_id.replace( /toggle_/, '' );
    $('#detail_' + this_id).toggle();
    if ($('#detail_' + this_id).is(':visible')) {
        $('#icon_' + this_id).removeClass('fa-caret-down');
        $('#icon_' + this_id).addClass('fa-caret-up');
    } else {
        $('#icon_' + this_id).addClass('fa-caret-down');
        $('#icon_' + this_id).removeClass('fa-caret-up');
    }
});
</script>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5d8085'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5d8085'];?>

<?php $this->literal_vars=$literal_old__b7ec14_?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\dashboard.tmpl' => 1694708434,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\header.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\start_upload.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_filters.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext4.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\widgets\\activity.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\widgets\\workspaces.tmpl' => 1694708434,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\widgets\\workflow.tmpl' => 1718664276,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988087,
);?>