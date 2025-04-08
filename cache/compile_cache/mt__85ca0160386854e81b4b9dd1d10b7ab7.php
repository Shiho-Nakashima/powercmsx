<?php ob_start();?><?php $_b7ec14_vars=&$this->vars;$_b7ec14_old_params=&$this->old_params;$_b7ec14_local_params=&$this->local_params;$_b7ec14_old_vars=&$this->old_vars;$_b7ec14_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'activity_cache_ttl','setvar'=>'activity_cache_ttl','this_tag'=>'property'],null,$this),$this),$this->setup_args('activity_cache_ttl','setvar',$this),$this,'setvar')?>

<?php $_b7ec14_old_params['_4e4cc3']=$_b7ec14_local_params;$_b7ec14_old_vars['_4e4cc3']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'activity_cache_ttl','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'activity_cache_ttl','value'=>'3600','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_4e4cc3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_4e4cc3'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'activity_limit','value'=>'30','this_tag'=>'setvar'],null,$this),$this)?>

<?php $c_1cecc3=null;$_b7ec14_old_params['_1cecc3']=$_b7ec14_local_params;$_b7ec14_old_vars['_1cecc3']=$_b7ec14_local_vars;$a_1cecc3=$this->setup_args(['name'=>'activity_cache_key_0','this_tag'=>'setvarblock'],null,$this);ob_start();?>
cache_key_<?php echo $this->function_var($this->setup_args(['name'=>'activity_model','this_tag'=>'var'],null,$this),$this)?>
_1_<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_1cecc3=ob_get_clean();$c_1cecc3=$this->block_setvarblock($a_1cecc3,$c_1cecc3,$this,$r_1cecc3,1,'_1cecc3');echo($c_1cecc3); $_b7ec14_local_params=$_b7ec14_old_params['_1cecc3'];?>

<?php $c_6aa2cc=null;$_b7ec14_old_params['_6aa2cc']=$_b7ec14_local_params;$_b7ec14_old_vars['_6aa2cc']=$_b7ec14_local_vars;$a_6aa2cc=$this->setup_args(['name'=>'activity_cache_key_1','this_tag'=>'setvarblock'],null,$this);ob_start();?>
cache_key_<?php echo $this->function_var($this->setup_args(['name'=>'activity_model','this_tag'=>'var'],null,$this),$this)?>
_1_<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_6aa2cc=ob_get_clean();$c_6aa2cc=$this->block_setvarblock($a_6aa2cc,$c_6aa2cc,$this,$r_6aa2cc,1,'_6aa2cc');echo($c_6aa2cc); $_b7ec14_local_params=$_b7ec14_old_params['_6aa2cc'];?>

<?php $c_fa0b59=null;$_b7ec14_old_params['_fa0b59']=$_b7ec14_local_params;$_b7ec14_old_vars['_fa0b59']=$_b7ec14_local_vars;$a_fa0b59=$this->setup_args(['name'=>'activity_cache_key_2','this_tag'=>'setvarblock'],null,$this);ob_start();?>
cache_key_<?php echo $this->function_var($this->setup_args(['name'=>'activity_model','this_tag'=>'var'],null,$this),$this)?>
_2_<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_fa0b59=ob_get_clean();$c_fa0b59=$this->block_setvarblock($a_fa0b59,$c_fa0b59,$this,$r_fa0b59,1,'_fa0b59');echo($c_fa0b59); $_b7ec14_local_params=$_b7ec14_old_params['_fa0b59'];?>

<?php $c_47c5c8=null;$_b7ec14_old_params['_47c5c8']=$_b7ec14_local_params;$_b7ec14_old_vars['_47c5c8']=$_b7ec14_local_vars;$a_47c5c8=$this->setup_args(['name'=>'_workspace_activity','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php $c_e48ad0=null;$_b7ec14_old_params['_e48ad0']=$_b7ec14_local_params;$_b7ec14_old_vars['_e48ad0']=$_b7ec14_local_vars;$a_e48ad0=$this->setup_args(['dynamic_caching'=>'','cache_key'=>'$activity_cache_key_0','cache_ttl'=>'$activity_cache_ttl','this_tag'=>'cacheblock'],null,$this);$_e48ad0=-1;$r_e48ad0=true;while($r_e48ad0===true):$r_e48ad0=($_e48ad0!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_e48ad0,$c_e48ad0,$this,$r_e48ad0,++$_e48ad0,'_e48ad0');ob_start();?>
<?php $c_e48ad0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e48ad0=false;}if($c_e48ad0 ):?>
<?php echo $this->component('PTTags')->hdlr_getactivity($this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$activity_model','column'=>'$activity_column','limit'=>'$activity_limit','this_tag'=>'getactivity'],null,$this),$this)?>
<?php endif;$c_e48ad0=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_e48ad0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e48ad0'];?>
<?php $c_47c5c8=ob_get_clean();$c_47c5c8=$this->block_setvarblock($a_47c5c8,$c_47c5c8,$this,$r_47c5c8,1,'_47c5c8');echo($c_47c5c8); $_b7ec14_local_params=$_b7ec14_old_params['_47c5c8'];?>

<?php $_b7ec14_old_params['_017957']=$_b7ec14_local_params;$_b7ec14_old_vars['_017957']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workspace_activity','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="card dashboard-widget" id="widget-activity">
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/Chart.js/Chart.min.js"></script>
  <h2 class="card-header"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Activity','this_tag'=>'trans'],null,$this),$this)?>
 ( <?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'activity_label','translate'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate')?>
 )
    <button type="button" class="detatch-widget" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
" data-name="widget-activity">
      <span aria-hidden="true">&times;</span>
    </button>
  </h2>
  <?php echo $this->modifier_setvar($this->modifier_translate($this->function_var($this->setup_args(['name'=>'activity_label','translate'=>'','setvar'=>'activity_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate'),$this->setup_args('activity_label','setvar',$this),$this,'setvar')?>

  <div class="card-block">
    <div style="height:160px;max-height:160px;" id="_activity_log-wrapper">
    <canvas id="_activity_log" width="100%" height="160px"
        style="margin-bottom:-10px;display:none;height:160px;max-height:160px"></canvas>
    </div>
    <script>
    var ctx = document.getElementById('_activity_log').getContext('2d');
    ctx.canvas.height = 160;
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [<?php $c_a81d62=null;$_b7ec14_old_params['_a81d62']=$_b7ec14_local_params;$_b7ec14_old_vars['_a81d62']=$_b7ec14_local_vars;$a_a81d62=$this->setup_args(['dynamic_caching'=>'','cache_key'=>'$activity_cache_key_1','cache_ttl'=>'$activity_cache_ttl','this_tag'=>'cacheblock'],null,$this);$_a81d62=-1;$r_a81d62=true;while($r_a81d62===true):$r_a81d62=($_a81d62!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_a81d62,$c_a81d62,$this,$r_a81d62,++$_a81d62,'_a81d62');ob_start();?>
<?php $c_a81d62 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a81d62=false;}if($c_a81d62 ):?>
<?php echo $this->component('PTTags')->hdlr_getactivity($this->setup_args(['model'=>'$activity_model','column'=>'$activity_column','workspace_id'=>'$workspace_id','limit'=>'$activity_limit','this_tag'=>'getactivity'],null,$this),$this)?>
<?php endif;$c_a81d62=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_a81d62'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a81d62'];?>
],
        datasets: [{
          label: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Activity (%s)','params'=>'$activity_label','this_tag'=>'trans'],null,$this),$this)?>
',
          data: [<?php $c_394509=null;$_b7ec14_old_params['_394509']=$_b7ec14_local_params;$_b7ec14_old_vars['_394509']=$_b7ec14_local_vars;$a_394509=$this->setup_args(['dynamic_caching'=>'','cache_key'=>'$activity_cache_key_2','cache_ttl'=>'$activity_cache_ttl','this_tag'=>'cacheblock'],null,$this);$_394509=-1;$r_394509=true;while($r_394509===true):$r_394509=($_394509!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_394509,$c_394509,$this,$r_394509,++$_394509,'_394509');ob_start();?>
<?php $c_394509 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_394509=false;}if($c_394509 ):?>
<?php echo $this->component('PTTags')->hdlr_getactivity($this->setup_args(['model'=>'$activity_model','column'=>'$activity_column','data'=>'1','workspace_id'=>'$workspace_id','limit'=>'$activity_limit','this_tag'=>'getactivity'],null,$this),$this)?>
<?php endif;$c_394509=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_394509'];$_b7ec14_local_vars=$_b7ec14_old_vars['_394509'];?>
],
          backgroundColor: "<?php $_b7ec14_old_params['_1abac8']=$_b7ec14_local_params;$_b7ec14_old_vars['_1abac8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'activity_model','eq'=>'error_log','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
#fcc<?php else:?>
rgba(35,180,51,0.4)<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1abac8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1abac8'];?>
"
        }]
      },
      options: {
        legend: {
          display: false
        },
        responsive: true,
        maintainAspectRatio: false,
        animation: false
      }
    });
    $('#_activity_log').show(90);
    </script>
    <table class="activity_footer-table" role="presentation">
    <tr>
    <td>
    <?php $_b7ec14_old_params['_3c2521']=$_b7ec14_local_params;$_b7ec14_old_vars['_3c2521']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'display_type','value'=>'display_space','this_tag'=>'setvar'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'display_type','value'=>'display_system','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_3c2521'];$_b7ec14_local_vars=$_b7ec14_old_vars['_3c2521'];?>

    <?php $c_e4b276=null;$_b7ec14_old_params['_e4b276']=$_b7ec14_local_params;$_b7ec14_old_vars['_e4b276']=$_b7ec14_local_vars;$a_e4b276=$this->setup_args(['show_activity'=>'1','permission'=>'1','type'=>'$display_type','this_tag'=>'tables'],null,$this);$_e4b276=-1;$r_e4b276=true;while($r_e4b276===true):$r_e4b276=($_e4b276!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_e4b276,$c_e4b276,$this,$r_e4b276,++$_e4b276,'_e4b276');ob_start();?>
<?php $c_e4b276 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e4b276=false;}if($c_e4b276 ):?>

      <?php $_b7ec14_old_params['_25150d']=$_b7ec14_local_params;$_b7ec14_old_vars['_25150d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
      <input type="hidden" name="__mode" value="change_activity">
      <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
      <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <select name="_model" class="form-control custom-select form-control-sm control-inline form-control-very-sm" style="min-width:85px;">
      <option <?php $_b7ec14_old_params['_074aa6']=$_b7ec14_local_params;$_b7ec14_old_vars['_074aa6']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'activity_model','eq'=>'log','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_074aa6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_074aa6'];?>
 value="log"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logs','this_tag'=>'trans'],null,$this),$this)?>
</option>
      <option <?php $_b7ec14_old_params['_37ffae']=$_b7ec14_local_params;$_b7ec14_old_vars['_37ffae']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'activity_model','eq'=>'error_log','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_37ffae'];$_b7ec14_local_vars=$_b7ec14_old_vars['_37ffae'];?>
 value="error_log"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Error Logs','this_tag'=>'trans'],null,$this),$this)?>
</option>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_25150d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_25150d'];?>

      <option <?php $_b7ec14_old_params['_d14fa2']=$_b7ec14_local_params;$_b7ec14_old_vars['_d14fa2']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$activity_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d14fa2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d14fa2'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_translate(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'plural','escape'=>'','translate'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','translate',$this),$this,'translate')?>
</option>
      <?php $_b7ec14_old_params['_96d12b']=$_b7ec14_local_params;$_b7ec14_old_vars['_96d12b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
      <button class="control-inline btn btn-sm btn-secondary btn-very-sm btn-activity-change"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Change','this_tag'=>'trans'],null,$this),$this)?>
</button>
      </form>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_96d12b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_96d12b'];?>

    <?php endif;$c_e4b276=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_e4b276'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e4b276'];?>

    </td>
    <td>
    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'activity_model','setvar'=>'model_4perm','this_tag'=>'var'],null,$this),$this),$this->setup_args('model_4perm','setvar',$this),$this,'setvar')?>

    <it:if name="activity_model" eq="error_log">
      <?php echo $this->function_setvar($this->setup_args(['name'=>'model_4perm','value'=>'log','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_017957'];$_b7ec14_local_vars=$_b7ec14_old_vars['_017957'];?>

    <?php $_b7ec14_old_params['_cf35dd']=$_b7ec14_local_params;$_b7ec14_old_vars['_cf35dd']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model_4perm','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar($this->modifier_translate($this->function_var($this->setup_args(['name'=>'activity_label','translate'=>'','setvar'=>'activity_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate'),$this->setup_args('activity_label','setvar',$this),$this,'setvar')?>

      <div class="text-right" style="margin-top:-5px"><a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php $_b7ec14_old_params['_9873e2']=$_b7ec14_local_params;$_b7ec14_old_vars['_9873e2']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'activity_model','eq'=>'error_log','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
log&amp;select_system_filters=show_only_errors&amp;_filter=log<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'activity_model','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9873e2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9873e2'];?>
<?php $_b7ec14_old_params['_72a478']=$_b7ec14_local_params;$_b7ec14_old_vars['_72a478']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_72a478'];$_b7ec14_local_vars=$_b7ec14_old_vars['_72a478'];?>
"
        class="btn btn-secondary btn-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View %s','params'=>'$activity_label','this_tag'=>'trans'],null,$this),$this)?>
</a>
      </div>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_cf35dd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_cf35dd'];?>

    </td></tr>
    </table>
  </div>
</div><?php $this->out=ob_get_clean();$this->meta=array (
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
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988087,
);?>