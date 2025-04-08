<?php ob_start();?><?php $_b7ec14_vars=&$this->vars;$_b7ec14_old_params=&$this->old_params;$_b7ec14_local_params=&$this->local_params;$_b7ec14_old_vars=&$this->old_vars;$_b7ec14_local_vars=&$this->local_vars;?><script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.lazyload.min.js"></script>
<div class="card dashboard-widget" id="widget-workspaces">
  <h2 class="card-header"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>

    <button  type="button" class="detatch-widget" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
" data-name="widget-workspaces">
      <span aria-hidden="true">&times;</span>
    </button>
  </h2>
  <div class="card-block">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'6','this_tag'=>'setvar'],null,$this),$this)?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_b7ec14_old_params['_b8651c']=$_b7ec14_local_params;$_b7ec14_old_vars['_b8651c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b8651c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b8651c'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_found','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $c_d375f3=null;$_b7ec14_old_params['_d375f3']=$_b7ec14_local_params;$_b7ec14_old_vars['_d375f3']=$_b7ec14_local_vars;$a_d375f3=$this->setup_args(['model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_d375f3=-1;$r_d375f3=true;while($r_d375f3===true):$r_d375f3=($_d375f3!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_d375f3,$c_d375f3,$this,$r_d375f3,++$_d375f3,'_d375f3');ob_start();?>
<?php $c_d375f3 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d375f3=false;}if($c_d375f3 ):?>

    <?php $_b7ec14_old_params['_dc90b5']=$_b7ec14_local_params;$_b7ec14_old_vars['_dc90b5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_found','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <table class="table table-sm table-striped table-widget">
    <tr>
      <th class="workspace-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Name','this_tag'=>'trans'],null,$this),$this)?>
</th>
      <th class="workspace-last_update"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Last Update','this_tag'=>'trans'],null,$this),$this)?>
</th>
    </tr>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_dc90b5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_dc90b5'];?>

    <?php $_b7ec14_old_params['_9a8713']=$_b7ec14_local_params;$_b7ec14_old_vars['_9a8713']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <tr>
      <td class="workspace-primary">
        <a href="javascript:void(0);" id="popover-list-<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
"><img class="lazy" width="36" height="36"
        src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif"
        data-original="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=get_thumbnail&amp;square=1&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
&amp;_model=workspace"
        alt=""></a>
        <script>
        $('#popover-list-<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
').popover({
            content: "<img src='<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=get_thumbnail&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
&amp;_model=workspace' alt='<?php echo $this->function_trans($this->setup_args(['phrase'=>'Preview','this_tag'=>'trans'],null,$this),$this)?>
' width='150'>",
            placement: "right",
            html: true
        });
        $('body').on('click', function (e) {
            $('#popover-list-<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
').popover('hide');
        });
        </script>&nbsp;
        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

        </a>
        <?php $_b7ec14_old_params['_94fa83']=$_b7ec14_local_params;$_b7ec14_old_vars['_94fa83']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'description','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<small class="text-muted">( <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'description','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 )</small><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_94fa83'];$_b7ec14_local_vars=$_b7ec14_old_vars['_94fa83'];?>

      </td>
      <td class="workspace-last_update">
        <?php echo $this->component('PTTags')->filter_epoch2str($this->function_var($this->setup_args(['name'=>'last_update','epoch2str'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','epoch2str',$this),$this,'epoch2str')?>

      </td>
    </tr>
    <?php else:?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9a8713'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9a8713'];?>

    <?php $_b7ec14_old_params['_d16b81']=$_b7ec14_local_params;$_b7ec14_old_vars['_d16b81']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    </table>
    <?php $_b7ec14_old_params['_4b48d0']=$_b7ec14_local_params;$_b7ec14_old_vars['_4b48d0']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <div class="text-right">
      <a data-toggle="modal" data-target="#modal"
        class="btn btn-info btn-sm"
        data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace...','this_tag'=>'trans'],null,$this),$this)?>
</a>
      </div>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_4b48d0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_4b48d0'];?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d16b81'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d16b81'];?>

    <?php endif;$c_d375f3=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_d375f3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d375f3'];?>

    <?php $_b7ec14_old_params['_04255c']=$_b7ec14_local_params;$_b7ec14_old_vars['_04255c']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_found','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <table class="table table-sm table-striped table-widget">
    <tr><td>
    <?php echo $this->modifier_setvar($this->modifier_translate($this->component('PTTags')->hdlr_gettableid($this->setup_args(['model'=>'$count_group_by_model','column'=>'plural','translate'=>'','setvar'=>'_object_label','this_tag'=>'gettableid'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate'),$this->setup_args('_object_label','setvar',$this),$this,'setvar')?>

    <span class="text-muted"><?php echo $this->function_trans($this->setup_args(['phrase'=>'No WorkSpace Found.','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </td></tr>
    </table>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_04255c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_04255c'];?>

  </div>
</div>
<script>
$(function() {
    $('img.lazy').lazyload();
});
</script><?php $this->out=ob_get_clean();$this->meta=array (
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
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988087,
);?>