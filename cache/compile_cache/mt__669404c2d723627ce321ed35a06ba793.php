<?php ob_start();?><?php $_ad2869_vars=&$this->vars;$_ad2869_old_params=&$this->old_params;$_ad2869_local_params=&$this->local_params;$_ad2869_old_vars=&$this->old_vars;$_ad2869_local_vars=&$this->local_vars;?><script>
    var current_status = '<?php echo $this->modifier_regex_replace($this->modifier_escape($this->function_var($this->setup_args(['name'=>'object_status','escape'=>'js','regex_replace'=>'\'/\\\'/g\',\'\\\\\'\'','this_tag'=>'var'],null,$this),$this),$this->setup_args('js','escape',$this),$this,'escape'),$this->setup_args('\\\'/\\\\\\\'/g\\\',\\\'\\\\\\\\\\\'\\\'','regex_replace',$this),$this,'regex_replace')?>
';
</script>
<?php $_ad2869_old_params['_b05220']=$_ad2869_local_params;$_ad2869_old_vars['_b05220']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_workflow','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_2015e8=null;ob_start();$_ad2869_old_params['_2015e8']=$_ad2869_local_params;$_ad2869_old_vars['_2015e8']=$_ad2869_local_vars;$a_2015e8=$this->setup_args(['from_json'=>'workflow_hidden_user_type','this_tag'=>'block'],null,$this);$_2015e8=-1;$r_2015e8=true;while($r_2015e8===true):$r_2015e8=($_2015e8!==-1)?false:true;echo $this->block_block($a_2015e8,$c_2015e8,$this,$r_2015e8,++$_2015e8,'_2015e8');ob_start();?>
<?php $c_2015e8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2015e8=false;}if($c_2015e8 ):?>
[]<?php endif;$c_2015e8=ob_get_clean();endwhile;$c_2015e8=ob_get_clean();echo($this->modifier_from_json($c_2015e8,$this->setup_args('workflow_hidden_user_type','from_json',$this),$this,'from_json')); $_ad2869_local_params=$_ad2869_old_params['_2015e8'];$_ad2869_local_vars=$_ad2869_old_vars['_2015e8'];?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'workflow_nextprev_only','setvar'=>'workflow_nextprev_only','this_tag'=>'property'],null,$this),$this),$this->setup_args('workflow_nextprev_only','setvar',$this),$this,'setvar')?>

<?php $_ad2869_old_params['_f9834c']=$_ad2869_local_params;$_ad2869_old_vars['_f9834c']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workflow_nextprev_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'_workflow_has_users_review','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'_workflow_contains_me','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $_ad2869_old_params['_6c8678']=$_ad2869_local_params;$_ad2869_old_vars['_6c8678']=$_ad2869_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['model'=>'workflow','prefix'=>'_workflow','this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

    <?php $_ad2869_old_params['_35b8be']=$_ad2869_local_params;$_ad2869_old_vars['_35b8be']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_users_review','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $c_29f765=null;$_ad2869_old_params['_29f765']=$_ad2869_local_params;$_ad2869_old_vars['_29f765']=$_ad2869_local_vars;$a_29f765=$this->setup_args(['model'=>'user','ids'=>'$_workflow_users_review','options'=>'\'lock_out\',\'0\'','cols'=>'id','limit'=>'1','this_tag'=>'objectloop'],null,$this);$_29f765=-1;$r_29f765=true;while($r_29f765===true):$r_29f765=($_29f765!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_29f765,$c_29f765,$this,$r_29f765,++$_29f765,'_29f765');ob_start();?>
<?php $c_29f765 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_29f765=false;}if($c_29f765 ):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'_workflow_has_users_review','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$c_29f765=ob_get_clean();endwhile; $_ad2869_local_params=$_ad2869_old_params['_29f765'];$_ad2869_local_vars=$_ad2869_old_vars['_29f765'];?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_35b8be'];$_ad2869_local_vars=$_ad2869_old_vars['_35b8be'];?>

    <?php $_ad2869_old_params['_c22888']=$_ad2869_local_params;$_ad2869_old_vars['_c22888']=$_ad2869_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'_workflow_users_draft','value'=>'$user_id','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'_workflow_contains_me','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_c22888'];$_ad2869_local_vars=$_ad2869_old_vars['_c22888'];?>

    <?php $_ad2869_old_params['_efbf1a']=$_ad2869_local_params;$_ad2869_old_vars['_efbf1a']=$_ad2869_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'_workflow_users_review','value'=>'$user_id','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'_workflow_contains_me','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_efbf1a'];$_ad2869_local_vars=$_ad2869_old_vars['_efbf1a'];?>

    <?php $_ad2869_old_params['_559873']=$_ad2869_local_params;$_ad2869_old_vars['_559873']=$_ad2869_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'_workflow_users_publish','value'=>'$user_id','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'_workflow_contains_me','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_559873'];$_ad2869_local_vars=$_ad2869_old_vars['_559873'];?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_6c8678'];$_ad2869_local_vars=$_ad2869_old_vars['_6c8678'];?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'_workflow_user_type','setvar'=>'_workflow_group_name','this_tag'=>'var'],null,$this),$this),$this->setup_args('_workflow_group_name','setvar',$this),$this,'setvar')?>

  <?php $_ad2869_old_params['_8ee03f']=$_ad2869_local_params;$_ad2869_old_vars['_8ee03f']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_workflow_contains_me','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_ad2869_old_params['_860749']=$_ad2869_local_params;$_ad2869_old_vars['_860749']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_owner_type','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'_workflow_owner_type','setvar'=>'_workflow_group_name','this_tag'=>'var'],null,$this),$this),$this->setup_args('_workflow_group_name','setvar',$this),$this,'setvar')?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_860749'];$_ad2869_local_vars=$_ad2869_old_vars['_860749'];?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_8ee03f'];$_ad2869_local_vars=$_ad2869_old_vars['_8ee03f'];?>

  <?php $_ad2869_old_params['_b3d406']=$_ad2869_local_params;$_ad2869_old_vars['_b3d406']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_group_name','eq'=>'creator','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'workflow_hidden_user_type','function'=>'push','value'=>'users_draft','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_ad2869_old_params['_75e917']=$_ad2869_local_params;$_ad2869_old_vars['_75e917']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_has_users_review','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workflow_hidden_user_type','function'=>'push','value'=>'users_publish','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_75e917'];$_ad2869_local_vars=$_ad2869_old_vars['_75e917'];?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_workflow_group_name','eq'=>'reviewer','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'workflow_hidden_user_type','function'=>'push','value'=>'users_review','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_workflow_group_name','eq'=>'publisher','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'workflow_hidden_user_type','function'=>'push','value'=>'users_publish','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_ad2869_old_params['_582339']=$_ad2869_local_params;$_ad2869_old_vars['_582339']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_has_users_review','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workflow_hidden_user_type','function'=>'push','value'=>'users_draft','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_582339'];$_ad2869_local_vars=$_ad2869_old_vars['_582339'];?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_b3d406'];$_ad2869_local_vars=$_ad2869_old_vars['_b3d406'];?>

  <?php echo $this->function_unset($this->setup_args(['name'=>'_workflow_has_users_review','this_tag'=>'unset'],null,$this),$this)?>

  <?php echo $this->function_unset($this->setup_args(['name'=>'_workflow_contains_me','this_tag'=>'unset'],null,$this),$this)?>

  <?php echo $this->function_unset($this->setup_args(['name'=>'_workflow_group_name','this_tag'=>'unset'],null,$this),$this)?>

<?php endif;$_ad2869_local_params=$_ad2869_old_params['_f9834c'];$_ad2869_local_vars=$_ad2869_old_vars['_f9834c'];?>

<div class="row form-group user_id-widget">
  <div class="col-lg-2">
    <label for="">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Workflow','this_tag'=>'trans'],null,$this),$this)?>

      <?php $_ad2869_old_params['_a5612e']=$_ad2869_local_params;$_ad2869_old_vars['_a5612e']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_a5612e'];$_ad2869_local_vars=$_ad2869_old_vars['_a5612e'];?>

    </label>
  </div>
  <div class="col-lg-10">
  
  <?php $_ad2869_old_params['_5bf8c5']=$_ad2869_local_params;$_ad2869_old_vars['_5bf8c5']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','ne'=>'$object_user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <span class="text-muted" id="__workflow_disable_message">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Caution','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Because other User is in edit, Workflow can not be used.','this_tag'=>'trans'],null,$this),$this)?>

    </span>
    <button id="__workflow_use" type="button" class="btn btn-sm btn-outline-danger btn-very-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Use Workflow','this_tag'=>'trans'],null,$this),$this)?>
</button>
<script>
__enable_workflow = true;
$('#__workflow_use').click(function() {
    __reset_workflow();
    __enable_workflow = true;
});
function __reset_workflow () {
    $('#status-selector').show();
    $('#status-alterative').hide();
    $('[name=__workflow_type]:eq(0)').prop('checked', true);
    $('#__workflow_disable_message').hide();
    $('#__workflow_use').hide();
    $('.__workflow_elements').show();
    $('#__workflow_hide').show();
    $("#__workflow_remand").hide();
    $("#__workflow_approval").hide();
    $("#__workflow_remand").val('');
    $("#__workflow_approval").val('');
    if ( __workflow_orig_status != $('#status-selector').val() ) {
        $('#status-selector').val( __workflow_orig_status );
        __workflow_owner_max_status = __workflow_orig_max_status;
        $('#status-alert-block').show();
        $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'The status has been reset.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
        $('#badge-change-user').html('<span></span>');
        $('#badge-change-user').hide();
        $('#badge-change-arrow').hide();
        __hide_workflow_message();
    }
}
</script>
  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_5bf8c5'];$_ad2869_local_vars=$_ad2869_old_vars['_5bf8c5'];?>


  <label class="custom-control custom-radio __workflow_elements">
    <input class="custom-control-input" type="radio" checked name="__workflow_type" value="0">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>
</span>
  </label>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'__workflow_remand_show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $c_934c49=null;$_ad2869_old_params['_934c49']=$_ad2869_local_params;$_ad2869_old_vars['_934c49']=$_ad2869_local_vars;$a_934c49=$this->setup_args(['name'=>'__workflow_remand_element','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_remand_type_single','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_ad2869_old_params['_b9db65']=$_ad2869_local_params;$_ad2869_old_vars['_b9db65']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_remand_type','eq'=>'Serial','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'_remand_type_single','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_b9db65'];$_ad2869_local_vars=$_ad2869_old_vars['_b9db65'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'current_group','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $c_55217e=null;$_ad2869_old_params['_55217e']=$_ad2869_local_params;$_ad2869_old_vars['_55217e']=$_ad2869_local_vars;$a_55217e=$this->setup_args(['previous'=>'1','single'=>'$_remand_type_single','this_tag'=>'workflowusers'],null,$this);$_55217e=-1;$r_55217e=true;while($r_55217e===true):$r_55217e=($_55217e!==-1)?false:true;echo $this->component('PTTags')->hdlr_workflowusers($a_55217e,$c_55217e,$this,$r_55217e,++$_55217e,'_55217e');ob_start();?>
<?php $c_55217e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_55217e=false;}if($c_55217e ):?>

      <?php $_ad2869_old_params['_0d960c']=$_ad2869_local_params;$_ad2869_old_vars['_0d960c']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <label class="custom-control custom-radio __workflow_elements">
          <input class="custom-control-input" type="radio" name="__workflow_type" value="1">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Remand','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </label>
        <select class="form-control custom-select __workflow_elements short" name="__workflow_remand" id="__workflow_remand">
        <?php $_ad2869_old_params['_651ddf']=$_ad2869_local_params;$_ad2869_old_vars['_651ddf']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_remand_type_single','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <option class="remand-none" value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>
</option>
        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_651ddf'];$_ad2869_local_vars=$_ad2869_old_vars['_651ddf'];?>

      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_0d960c'];$_ad2869_local_vars=$_ad2869_old_vars['_0d960c'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'_option_enabled','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_ad2869_old_params['_342604']=$_ad2869_local_params;$_ad2869_old_vars['_342604']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_remand_type_single','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php $_ad2869_old_params['_ed204a']=$_ad2869_local_params;$_ad2869_old_vars['_ed204a']=$_ad2869_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'workflow_hidden_user_type','value'=>'$workflow_relation_name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'_option_enabled','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_ed204a'];$_ad2869_local_vars=$_ad2869_old_vars['_ed204a'];?>

      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_342604'];$_ad2869_local_vars=$_ad2869_old_vars['_342604'];?>

      <?php $_ad2869_old_params['_31c15e']=$_ad2869_local_params;$_ad2869_old_vars['_31c15e']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_option_enabled','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ad2869_old_params['_f797be']=$_ad2869_local_params;$_ad2869_old_vars['_f797be']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workflow_user_id','ne'=>'$object_user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'__workflow_remand_show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php $_ad2869_old_params['_526456']=$_ad2869_local_params;$_ad2869_old_vars['_526456']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workflow_user_id','eq'=>'$user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ad2869_old_params['_5f9b28']=$_ad2869_local_params;$_ad2869_old_vars['_5f9b28']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_group','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</optgroup><?php endif;$_ad2869_local_params=$_ad2869_old_params['_5f9b28'];$_ad2869_local_vars=$_ad2869_old_vars['_5f9b28'];?>

            <optgroup label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'You','this_tag'=>'trans'],null,$this),$this)?>
" class="group-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_relation_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php else:?>

            <?php $_ad2869_old_params['_669902']=$_ad2869_local_params;$_ad2869_old_vars['_669902']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_group','ne'=>'$workflow_relation_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_ad2869_old_params['_7b533d']=$_ad2869_local_params;$_ad2869_old_vars['_7b533d']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_group','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</optgroup><?php endif;$_ad2869_local_params=$_ad2869_old_params['_7b533d'];$_ad2869_local_vars=$_ad2869_old_vars['_7b533d'];?>

              <optgroup label="<?php echo paml_htmlspecialchars($this->modifier_translate($this->function_var($this->setup_args(['name'=>'workflow_group_label','translate'=>'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate'),ENT_QUOTES)?>
" class="group-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_relation_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_ad2869_local_params=$_ad2869_old_params['_669902'];$_ad2869_local_vars=$_ad2869_old_vars['_669902'];?>

          <?php endif;$_ad2869_local_params=$_ad2869_old_params['_526456'];$_ad2869_local_vars=$_ad2869_old_vars['_526456'];?>

          <option class="remand-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_relation_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_user_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_user_nickname','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

          </option>
          <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'workflow_relation_name','setvar'=>'current_group','this_tag'=>'var'],null,$this),$this),$this->setup_args('current_group','setvar',$this),$this,'setvar')?>

        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_f797be'];$_ad2869_local_vars=$_ad2869_old_vars['_f797be'];?>

      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_31c15e'];$_ad2869_local_vars=$_ad2869_old_vars['_31c15e'];?>

      <?php $_ad2869_old_params['_33fe24']=$_ad2869_local_params;$_ad2869_old_vars['_33fe24']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</optgroup></select>
<script>
$("#__workflow_remand").hide();
$('#__workflow_remand').change(function(e) {
    $('#status-selector').show();
    $('#status-alterative').hide();
    var remand_selected_class = $('[name=__workflow_remand] option:selected').attr('class');
    var nickname = $('[name=__workflow_remand] option:selected').text();
    $('#badge-change-user').html('<span>' + nickname + '</span>');
    $('#badge-change-user').css('display', 'inline');
    $('#badge-change-arrow').css('display', 'inline');
    __show_workflow_message();
    let _current_status = $('#status-selector').val();
    if ( remand_selected_class == 'remand-users_draft' ) {
        $('#status-selector').val('0');
        if ( current_status != 0 || _current_status != 0 ) {
            $('#status-alert-block').show();
            $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When remanded back to the Creator, the status will be changed to Draft.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
            $('#status-selector').attr( 'readonly', true );
        }
        __workflow_owner_max_status = 0;
    } else if ( remand_selected_class == 'remand-users_review' ) {
        if ( current_status > 1 || _current_status > 1 ) {
            $('#status-selector').val('1');
            $('#status-alert-block').show();
            $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When remanded back to the Reviewer, the status will be changed to Review.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
            $('#status-selector').attr( 'readonly', true );
        }
        __workflow_owner_max_status = 1;
    } else if ( remand_selected_class == 'remand-users_publish' ) {
        if ( current_status < 2 || _current_status < 2 ) {
            $('#status-selector').val('2');
            $('#status-alert-block').show();
            $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When remanded back to the Publisher, the status will be changed to Approval Pending.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
            $('#status-selector').attr( 'readonly', true );
        }
        __workflow_owner_max_status = 5;
    } else {
        $('#status-alert-block').hide();
        $('#badge-change-user').html('<span></span>');
        $('#badge-change-user').hide();
        $('#badge-change-arrow').hide();
        __hide_workflow_message();
        __reset_workflow();
    }
});
</script>
      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_33fe24'];$_ad2869_local_vars=$_ad2869_old_vars['_33fe24'];?>

    <?php endif;$c_55217e=ob_get_clean();endwhile; $_ad2869_local_params=$_ad2869_old_params['_55217e'];$_ad2869_local_vars=$_ad2869_old_vars['_55217e'];?>

  <?php $c_934c49=ob_get_clean();$c_934c49=$this->block_setvarblock($a_934c49,$c_934c49,$this,$r_934c49,1,'_934c49');echo($c_934c49); $_ad2869_local_params=$_ad2869_old_params['_934c49'];?>

  <?php $_ad2869_old_params['_63bfd3']=$_ad2869_local_params;$_ad2869_old_vars['_63bfd3']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__workflow_remand_show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_var($this->setup_args(['name'=>'__workflow_remand_element','this_tag'=>'var'],null,$this),$this)?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_63bfd3'];$_ad2869_local_vars=$_ad2869_old_vars['_63bfd3'];?>


  <?php echo $this->function_setvar($this->setup_args(['name'=>'__workflow_approval_show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $c_c2d9df=null;$_ad2869_old_params['_c2d9df']=$_ad2869_local_params;$_ad2869_old_vars['_c2d9df']=$_ad2869_local_vars;$a_c2d9df=$this->setup_args(['name'=>'__workflow_approval_element','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_approval_type_single','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_ad2869_old_params['_191525']=$_ad2869_local_params;$_ad2869_old_vars['_191525']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_approval_type','eq'=>'Serial','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'_approval_type_single','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_191525'];$_ad2869_local_vars=$_ad2869_old_vars['_191525'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'current_group','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $c_7f0069=null;$_ad2869_old_params['_7f0069']=$_ad2869_local_params;$_ad2869_old_vars['_7f0069']=$_ad2869_local_vars;$a_7f0069=$this->setup_args(['next'=>'1','single'=>'$_approval_type_single','this_tag'=>'workflowusers'],null,$this);$_7f0069=-1;$r_7f0069=true;while($r_7f0069===true):$r_7f0069=($_7f0069!==-1)?false:true;echo $this->component('PTTags')->hdlr_workflowusers($a_7f0069,$c_7f0069,$this,$r_7f0069,++$_7f0069,'_7f0069');ob_start();?>
<?php $c_7f0069 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7f0069=false;}if($c_7f0069 ):?>

      <?php $_ad2869_old_params['_30eb0a']=$_ad2869_local_params;$_ad2869_old_vars['_30eb0a']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <label class="custom-control custom-radio __workflow_elements">
          <input class="custom-control-input" type="radio" name="__workflow_type" value="2">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Approval Request','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </label>
        <select class="form-control custom-select __workflow_elements short" name="__workflow_approval" id="__workflow_approval">
        <?php $_ad2869_old_params['_67109e']=$_ad2869_local_params;$_ad2869_old_vars['_67109e']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_approval_type_single','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <option class="approval-none" value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>
</option>
        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_67109e'];$_ad2869_local_vars=$_ad2869_old_vars['_67109e'];?>

      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_30eb0a'];$_ad2869_local_vars=$_ad2869_old_vars['_30eb0a'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'_option_enabled','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_ad2869_old_params['_4f59df']=$_ad2869_local_params;$_ad2869_old_vars['_4f59df']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_approval_type_single','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php $_ad2869_old_params['_ab3572']=$_ad2869_local_params;$_ad2869_old_vars['_ab3572']=$_ad2869_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'workflow_hidden_user_type','value'=>'$workflow_relation_name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'_option_enabled','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_ab3572'];$_ad2869_local_vars=$_ad2869_old_vars['_ab3572'];?>

      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_4f59df'];$_ad2869_local_vars=$_ad2869_old_vars['_4f59df'];?>

      <?php $_ad2869_old_params['_12b285']=$_ad2869_local_params;$_ad2869_old_vars['_12b285']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_option_enabled','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ad2869_old_params['_4bb648']=$_ad2869_local_params;$_ad2869_old_vars['_4bb648']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workflow_user_id','ne'=>'$object_user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'__workflow_approval_show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php $_ad2869_old_params['_51e46a']=$_ad2869_local_params;$_ad2869_old_vars['_51e46a']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workflow_user_id','eq'=>'$user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ad2869_old_params['_fb789c']=$_ad2869_local_params;$_ad2869_old_vars['_fb789c']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_group','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</optgroup><?php endif;$_ad2869_local_params=$_ad2869_old_params['_fb789c'];$_ad2869_local_vars=$_ad2869_old_vars['_fb789c'];?>

            <optgroup label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'You','this_tag'=>'trans'],null,$this),$this)?>
" class="group-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_relation_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php else:?>

            <?php $_ad2869_old_params['_67ae76']=$_ad2869_local_params;$_ad2869_old_vars['_67ae76']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_group','ne'=>'$workflow_relation_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_ad2869_old_params['_86412f']=$_ad2869_local_params;$_ad2869_old_vars['_86412f']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_group','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</optgroup><?php endif;$_ad2869_local_params=$_ad2869_old_params['_86412f'];$_ad2869_local_vars=$_ad2869_old_vars['_86412f'];?>

              <optgroup label="<?php echo paml_htmlspecialchars($this->modifier_translate($this->function_var($this->setup_args(['name'=>'workflow_group_label','translate'=>'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate'),ENT_QUOTES)?>
" class="group-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_relation_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_ad2869_local_params=$_ad2869_old_params['_67ae76'];$_ad2869_local_vars=$_ad2869_old_vars['_67ae76'];?>

          <?php endif;$_ad2869_local_params=$_ad2869_old_params['_51e46a'];$_ad2869_local_vars=$_ad2869_old_vars['_51e46a'];?>

          <option class="approval-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_relation_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_user_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workflow_user_nickname','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

          </option>
          <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'workflow_relation_name','setvar'=>'current_group','this_tag'=>'var'],null,$this),$this),$this->setup_args('current_group','setvar',$this),$this,'setvar')?>

        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_4bb648'];$_ad2869_local_vars=$_ad2869_old_vars['_4bb648'];?>

      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_12b285'];$_ad2869_local_vars=$_ad2869_old_vars['_12b285'];?>

      <?php $_ad2869_old_params['_a5d3d0']=$_ad2869_local_params;$_ad2869_old_vars['_a5d3d0']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</optgroup></select>
<script>
$("#__workflow_approval").hide();
$('#__workflow_approval').change(function(e) {
    var approval_selected_class = $('[name=__workflow_approval] option:selected').attr('class');
    var nickname = $('[name=__workflow_approval] option:selected').text();
    $('#badge-change-user').html('<span>' + nickname + '</span>');
    $('#badge-change-user').css('display', 'inline');
    $('#badge-change-arrow').css('display', 'inline');
    __show_workflow_message();
    let _current_status = $('#status-selector').val();
    if ( approval_selected_class == 'approval-users_draft' ) {
        $('#status-selector').show();
        $('#status-alterative').hide();
        $('#status-selector').val('0');
        if ( current_status != 0 ) {
            $('#status-alert-block').show();
            $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When you send approval request to the Creator, the status will be changed to Draft.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
            $('#status-selector').attr( 'readonly', true );
        }
        __workflow_owner_max_status = 0;
    } else if ( approval_selected_class == 'approval-users_review' ) {
        if ( current_status != 1 || _current_status != 1 ) {
            $('#status-selector').val('1');
            $('#status-alert-block').show();
            if ( '<?php echo $this->function_var($this->setup_args(['name'=>'_workflow_user_type','this_tag'=>'var'],null,$this),$this)?>
' != 'reviewer' ) {
                $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When you send approval request to the Reviewer, the status will be changed to Review(You will not be able to edit this %s).','params'=>'$_object_label','this_tag'=>'trans'],null,$this),$this)?>
</span>');
                $('#status-selector').hide();
                $('#status-alterative').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Review','this_tag'=>'trans'],null,$this),$this)?>
</span>');
                $('#status-alterative').show();
                $('#status-selector').attr( 'readonly', true );
            } else {
                $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When you send approval request to the Reviewer, the status will be changed to Review.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
                $('#status-selector').attr( 'readonly', true );
            }
        }
        __workflow_owner_max_status = 1;
    } else if ( approval_selected_class == 'approval-users_publish' ) {
        if ( current_status < 2 || _current_status < 2 ) {
            $('#status-selector').val('2');
            $('#status-alert-block').show();
            $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When you send approval request to the Publisher, the status will be changed to Approval Pending.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
            if ( '<?php echo $this->function_var($this->setup_args(['name'=>'_workflow_user_type','this_tag'=>'var'],null,$this),$this)?>
' != 'publisher' ) {
                $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When you send approval request to the Publisher, the status will be changed to Approval Pending(You will not be able to edit this %s).','params'=>'$_object_label','this_tag'=>'trans'],null,$this),$this)?>
</span>');
                $('#status-selector').hide();
                $('#status-alterative').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Approval Pending','this_tag'=>'trans'],null,$this),$this)?>
</span>');
                $('#status-alterative').show();
                $('#status-selector').attr( 'readonly', true );
            } else {
                $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When you send approval request to the Publisher, the status will be changed to Approval Pending.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
                $('#status-selector').attr( 'readonly', true );
            }
        } else if ( current_status == 5 || _current_status == 5 ) {
            $('#status-selector').val('2');
            $('#status-alert-block').show();
            $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'When you send approval request to the Publisher, the status will be changed to Approval Pending.','params'=>'$_object_label','this_tag'=>'trans'],null,$this),$this)?>
</span>');
            $('#status-selector').attr( 'readonly', true );
        }
        __workflow_owner_max_status = 5;
    } else {
        $('#status-alert-block').hide();
        $('#badge-change-user').html('<span></span>');
        $('#badge-change-user').hide();
        $('#badge-change-arrow').hide();
        __hide_workflow_message();
        __reset_workflow();
    }
});
</script>
      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_a5d3d0'];$_ad2869_local_vars=$_ad2869_old_vars['_a5d3d0'];?>

    <?php endif;$c_7f0069=ob_get_clean();endwhile; $_ad2869_local_params=$_ad2869_old_params['_7f0069'];$_ad2869_local_vars=$_ad2869_old_vars['_7f0069'];?>

  <?php $c_c2d9df=ob_get_clean();$c_c2d9df=$this->block_setvarblock($a_c2d9df,$c_c2d9df,$this,$r_c2d9df,1,'_c2d9df');echo($c_c2d9df); $_ad2869_local_params=$_ad2869_old_params['_c2d9df'];?>

  <?php $_ad2869_old_params['_b84d96']=$_ad2869_local_params;$_ad2869_old_vars['_b84d96']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__workflow_approval_show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_var($this->setup_args(['name'=>'__workflow_approval_element','this_tag'=>'var'],null,$this),$this)?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_b84d96'];$_ad2869_local_vars=$_ad2869_old_vars['_b84d96'];?>


  <?php $_ad2869_old_params['_eb5efd']=$_ad2869_local_params;$_ad2869_old_vars['_eb5efd']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','ne'=>'$object_user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <button id="__workflow_hide" type="button" class="btn btn-sm btn-outline-danger btn-very-sm"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hide Workflow','this_tag'=>'trans'],null,$this),$this)?>
</button>
<script>
__enable_workflow = false;
$('#__workflow_hide').click(function() {
    __enable_workflow = false;
    $('#status-selector').show();
    $('#status-alterative').hide();
    $('#__workflow_disable_message').show();
    $('#__workflow_use').show();
    $('#__workflow_hide').hide();
    $('.__workflow_elements').hide();
    if ( __workflow_orig_status != $('#status-selector').val() ) {
        $('#status-selector').val( __workflow_orig_status );
        __workflow_owner_max_status = __workflow_orig_max_status;
        $('#status-alert-block').show();
        $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'The status has been reset.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
        $('#badge-change-user').html('<span></span>');
        $('#badge-change-user').hide();
        $('#badge-change-arrow').hide();
        __hide_workflow_message();
    }
});
$('#__workflow_hide').hide();
</script>
  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_eb5efd'];$_ad2869_local_vars=$_ad2869_old_vars['_eb5efd'];?>

<script>
$('[name=__workflow_type]').change(function() {
    <?php $_ad2869_old_params['_fe7762']=$_ad2869_local_params;$_ad2869_old_vars['_fe7762']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.edit_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    if ( $(this).val() == 0 ) {
        $('#object-rev_type').val( object_rev_type );
    } else {
        $('#object-rev_type').val( 2 );
    }
    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_fe7762'];$_ad2869_local_vars=$_ad2869_old_vars['_fe7762'];?>

    $('#status-selector').show();
    $('#status-alterative').hide();
    $('#badge-change-user').html('<span></span>');
    $('#badge-change-user').hide();
    $('#__workflow_message-wrapper').hide();
    $("#__workflow_approval").val('');
    $("#__workflow_approval").hide();
    var selected_workflow_type = $('input[name=__workflow_type]:checked').val();
    var $userSelecter;
    var userid;
    if ( selected_workflow_type == 1 ) {
        if ( $("#__workflow_remand").length ) {
            <?php $_ad2869_old_params['_c60329']=$_ad2869_local_params;$_ad2869_old_vars['_c60329']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_remand_type_single','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              $userSelecter = $('#__workflow_remand');
              userid = $userSelecter.find('>optgroup >option:last-child').val();
              if (!userid) {
                  userid = $userSelecter.find('>option:last-child').val();
              }
              $userSelecter.val(userid).trigger('change');
              return;
            <?php else:?>

              $("#__workflow_remand").show();
            <?php endif;$_ad2869_local_params=$_ad2869_old_params['_c60329'];$_ad2869_local_vars=$_ad2869_old_vars['_c60329'];?>

        }
    } else {
        if ( $("#__workflow_remand").length ) {
            $("#__workflow_remand").hide();
            $("#__workflow_remand").val('');
        }
    }
    if ( selected_workflow_type == 2 ) {
        if ( $("#__workflow_approval").length ) {
            <?php $_ad2869_old_params['_ae3ae1']=$_ad2869_local_params;$_ad2869_old_vars['_ae3ae1']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_approval_type_single','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              $userSelecter = $('#__workflow_approval');
              userid = $userSelecter.find('>optgroup >option:last-child').val();
              if (!userid) {
                  userid = $userSelecter.find('>option:last-child').val();
              }
              $userSelecter.val(userid).trigger('change');
              return;
            <?php else:?>

              $("#__workflow_approval").show();
            <?php endif;$_ad2869_local_params=$_ad2869_old_params['_ae3ae1'];$_ad2869_local_vars=$_ad2869_old_vars['_ae3ae1'];?>

        }
    } else {
        if ( $("#__workflow_approval").length ) {
            $("#__workflow_approval").hide();
            $("#__workflow_approval").val('');
        }
    }
    if ( selected_workflow_type == 0 ) {
        $("#__workflow_remand").val('');
        $("#__workflow_approval").val('');
        $('#status-alert-block').hide();
        $('#badge-change-user').hide();
        $('#badge-change-user').html('<span></span>');
        $('#badge-change-arrow').hide();
        __hide_workflow_message();
        $('#__workflow_remand').val('');
        $('#__workflow_approval').val('');
    }
    if ( typeof __workflow_orig_status !== 'undefined' && __workflow_orig_status != $('#status-selector').val() ) {
        $('#status-selector').val( __workflow_orig_status );
        __workflow_owner_max_status = __workflow_orig_max_status;
        $('#status-alert-block').show();
        $('#status-alert-message').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'The status has been reset.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
    }
});
</script>
  </div>
<?php $_ad2869_old_params['_b1e0aa']=$_ad2869_local_params;$_ad2869_old_vars['_b1e0aa']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','ne'=>'$object_user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$(".__workflow_elements").hide();
</script>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_b1e0aa'];$_ad2869_local_vars=$_ad2869_old_vars['_b1e0aa'];?>

</div>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_b05220'];$_ad2869_local_vars=$_ad2869_old_vars['_b05220'];?>

  <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'edit','split'=>':','setvar'=>'edit_props','this_tag'=>'var'],null,$this),$this),$this->setup_args(':','split',$this),$this,'split'),$this->setup_args('edit_props','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[1]','setvar'=>'rel_model','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_model','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[2]','setvar'=>'rel_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_col','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[3]','setvar'=>'rel_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_type','setvar',$this),$this,'setvar')?>

  <div class="row form-group">
    <div class="col-lg-2">
      <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
        <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

        <?php $_ad2869_old_params['_9fad34']=$_ad2869_local_params;$_ad2869_old_vars['_9fad34']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_9fad34'];$_ad2869_local_vars=$_ad2869_old_vars['_9fad34'];?>

      </label>
    </div>
    <div class="col-lg-8">

<?php $_ad2869_old_params['_d25f93']=$_ad2869_local_params;$_ad2869_old_vars['_d25f93']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_previous_owner','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_ad2869_old_params['_171432']=$_ad2869_local_params;$_ad2869_old_vars['_171432']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_previous_owner','ne'=>'$object_user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>


( <?php echo $this->function_trans($this->setup_args(['phrase'=>'Previous Owner','this_tag'=>'trans'],null,$this),$this)?>
 : 
    <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->component('PTTags')->hdlr_getobjectname($this->setup_args(['id'=>'$object_previous_owner','type'=>'relation:user:nickname:dialog','wants'=>'id','escape'=>'','setvar'=>'__owner_id__','this_tag'=>'getobjectname'],null,$this),$this),ENT_QUOTES),$this->setup_args('__owner_id__','setvar',$this),$this,'setvar')?>

  
    <span class="badge badge-default badge-relation badge-relation-user">
      <div id="previous_owner-img" class="assets-child-thumb" data-model="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" data-id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_previous_owner','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" style="background-image:url('<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=get_thumbnail&amp;square=1&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_previous_owner','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
')"></div>
    <span id="previous_owner-label">
    <?php $_ad2869_old_params['_98ae00']=$_ad2869_local_params;$_ad2869_old_vars['_98ae00']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__owner_id__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo paml_htmlspecialchars($this->component('PTTags')->hdlr_getobjectname($this->setup_args(['id'=>'$__owner_id__','type'=>'relation:user:nickname:dialog','escape'=>'','this_tag'=>'getobjectname'],null,$this),$this),ENT_QUOTES)?>

    <?php else:?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_98ae00'];$_ad2869_local_vars=$_ad2869_old_vars['_98ae00'];?>

    </span>
    </span>
    <input type="hidden" name="owner_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'__owner_id__','this_tag'=>'var'],null,$this),$this)?>
">
) <i class="fa fa-arrow-right" aria-hidden="true"></i>

<?php endif;$_ad2869_local_params=$_ad2869_old_params['_171432'];$_ad2869_local_vars=$_ad2869_old_vars['_171432'];?>

<?php endif;$_ad2869_local_params=$_ad2869_old_params['_d25f93'];$_ad2869_local_vars=$_ad2869_old_vars['_d25f93'];?>

    <span class="badge badge-default badge-relation badge-relation-user">
    <div id="user_id-img" class="assets-child-thumb" data-model="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" data-id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__col_value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" style="background-image:url('<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=get_thumbnail&amp;square=1&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__col_value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
')"></div>
    <span id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-label">
    <?php $_ad2869_old_params['_27788e']=$_ad2869_local_params;$_ad2869_old_vars['_27788e']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->component('PTTags')->hdlr_getobjectname($this->setup_args(['id'=>'$__col_value__','type'=>'$edit','this_tag'=>'getobjectname'],null,$this),$this)?>

    <?php else:?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_27788e'];$_ad2869_local_vars=$_ad2869_old_vars['_27788e'];?>

    </span>
    </span>
    <?php $_ad2869_old_params['_da8b1b']=$_ad2869_local_params;$_ad2869_old_vars['_da8b1b']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_workflow','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <span id="badge-change-arrow" class="hidden">
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
      </span>
      <span style="border:1px solid gray; margin-top: 4px; padding-top: 5px !important; padding-bottom: 6px !important;" class="pt-1 pb-2 pl-2 pr-2 badge badge-warning-lite change-user hidden" id="badge-change-user"></span>
    <div>
    </div>
    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_da8b1b'];$_ad2869_local_vars=$_ad2869_old_vars['_da8b1b'];?>

    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__col_value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
    <?php $_ad2869_old_params['_25aa67']=$_ad2869_local_params;$_ad2869_old_vars['_25aa67']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_has_workflow','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <button id="user_id-chooser" type="button" class="btn btn-primary btn-sm dialog-chooser" data-toggle="modal" data-target="#modal"
      data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ad2869_old_params['_462e06']=$_ad2869_local_params;$_ad2869_old_vars['_462e06']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_462e06'];$_ad2869_local_vars=$_ad2869_old_vars['_462e06'];?>
&amp;dialog_view=1&amp;single_select=1&amp;target=<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;workflow_type=all&amp;workflow_model=<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
&amp;ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</button>
      <?php $_ad2869_old_params['_402ad8']=$_ad2869_local_params;$_ad2869_old_vars['_402ad8']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_assign_user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a id="user_id-edit" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Assign User','this_tag'=>'trans'],null,$this),$this)?>
</span></a>
      <?php endif;$_ad2869_local_params=$_ad2869_old_params['_402ad8'];$_ad2869_local_vars=$_ad2869_old_vars['_402ad8'];?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_25aa67'];$_ad2869_local_vars=$_ad2869_old_vars['_25aa67'];?>

    </div>
  </div>
<?php $_ad2869_old_params['_7dade3']=$_ad2869_local_params;$_ad2869_old_vars['_7dade3']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_assign_user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_ad2869_old_params['_4ebfef']=$_ad2869_local_params;$_ad2869_old_vars['_4ebfef']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_has_workflow','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<script>
$("#user_id-chooser").hide();
</script>
<script>
$("#user_id-edit").click(function(){
    $("#user_id-chooser").toggle();
});
</script>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_4ebfef'];$_ad2869_local_vars=$_ad2869_old_vars['_4ebfef'];?>

<?php endif;$_ad2869_local_params=$_ad2869_old_params['_7dade3'];$_ad2869_local_vars=$_ad2869_old_vars['_7dade3'];?>

<?php $_ad2869_old_params['_76cc91']=$_ad2869_local_params;$_ad2869_old_vars['_76cc91']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_workflow','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group has-danger" id="__workflow_message-wrapper">
  <div class="col-lg-2">
    <label for="__workflow_message">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Notify Message','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <textarea class="form-control alert-textarea" name="__workflow_message" id="__workflow_message">
<?php $_ad2869_old_params['_4c24a3']=$_ad2869_local_params;$_ad2869_old_vars['_4c24a3']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.__workflow_message','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_workflow_message','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_4c24a3'];$_ad2869_local_vars=$_ad2869_old_vars['_4c24a3'];?>
</textarea>
  </div>
</div>
<script>
$("#__workflow_message-wrapper").hide();
<?php $_ad2869_old_params['_a97fdb']=$_ad2869_local_params;$_ad2869_old_vars['_a97fdb']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_user_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

// Notify at published.
$('#status-selector').change(function(){
    if ( '<?php echo $this->function_var($this->setup_args(['name'=>'_workflow_user_type','this_tag'=>'var'],null,$this),$this)?>
' == 'publisher' ) {
        if ( $(this).val() > 1 ) {
            __show_workflow_message();
        } else {
            __hide_workflow_message();
        }
    }
});
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_a97fdb'];$_ad2869_local_vars=$_ad2869_old_vars['_a97fdb'];?>

function __show_workflow_message () {
    <?php $_ad2869_old_params['_92ee33']=$_ad2869_local_params;$_ad2869_old_vars['_92ee33']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_notify_changes','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $('#__workflow_message-wrapper').show();
    $('#__workflow_message').focus();
    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_92ee33'];$_ad2869_local_vars=$_ad2869_old_vars['_92ee33'];?>

}
function __hide_workflow_message () {
    <?php $_ad2869_old_params['_16ac4a']=$_ad2869_local_params;$_ad2869_old_vars['_16ac4a']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_notify_changes','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $('#__workflow_message-wrapper').hide();
    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_16ac4a'];$_ad2869_local_vars=$_ad2869_old_vars['_16ac4a'];?>

    $('#status-selector').removeAttr( 'readonly' );
}
$(function(){
    $('#__apply_to_master').click(function(e){
        // Notify at published.
        <?php $_ad2869_old_params['_8b4335']=$_ad2869_local_params;$_ad2869_old_vars['_8b4335']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_notify_changes','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ad2869_old_params['_8e01be']=$_ad2869_local_params;$_ad2869_old_vars['_8e01be']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_user_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ad2869_old_params['_a85172']=$_ad2869_local_params;$_ad2869_old_vars['_a85172']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_master_status','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'need_workflow_message','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_master_status','eq'=>'4','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'need_workflow_message','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_a85172'];$_ad2869_local_vars=$_ad2869_old_vars['_a85172'];?>

        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_8e01be'];$_ad2869_local_vars=$_ad2869_old_vars['_8e01be'];?>

        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_8b4335'];$_ad2869_local_vars=$_ad2869_old_vars['_8b4335'];?>

        <?php $_ad2869_old_params['_ec69dd']=$_ad2869_local_params;$_ad2869_old_vars['_ec69dd']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'need_workflow_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        if ( '<?php echo $this->function_var($this->setup_args(['name'=>'_workflow_user_type','this_tag'=>'var'],null,$this),$this)?>
' == 'publisher' ) {
            if (! $('#__workflow_message').is(':visible') && ! $('#__workflow_message').val() ) {
                if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'No notification message has been entered. Do you want to continue processing?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
                    __show_workflow_message();
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    return false;
                }
            }
        }
        <?php endif;$_ad2869_local_params=$_ad2869_old_params['_ec69dd'];$_ad2869_local_vars=$_ad2869_old_vars['_ec69dd'];?>

    });
});
</script>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_76cc91'];$_ad2869_local_vars=$_ad2869_old_vars['_76cc91'];?>


<?php $_ad2869_old_params['_fb4478']=$_ad2869_local_params;$_ad2869_old_vars['_fb4478']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_ad2869_old_params['_f1d706']=$_ad2869_local_params;$_ad2869_old_vars['_f1d706']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__workflow_type','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
    // Case save_filter returns false.
    $('input[name=__workflow_type]').val(['<?php echo $this->function_var($this->setup_args(['name'=>'request.__workflow_type','this_tag'=>'var'],null,$this),$this)?>
']);
    $('input[name=__workflow_type]').trigger('change');
    <?php $_ad2869_old_params['_2c1c0d']=$_ad2869_local_params;$_ad2869_old_vars['_2c1c0d']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__workflow_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        $('#__workflow_approval').val( '<?php echo $this->function_var($this->setup_args(['name'=>'request.__workflow_approval','this_tag'=>'var'],null,$this),$this)?>
' );
        $('#__workflow_approval').trigger('change');
    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.__workflow_type','eq'=>'1','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        $('#__workflow_remand').val( '<?php echo $this->function_var($this->setup_args(['name'=>'request.__workflow_remand','this_tag'=>'var'],null,$this),$this)?>
' );
        $('#__workflow_remand').trigger('change');
    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_2c1c0d'];$_ad2869_local_vars=$_ad2869_old_vars['_2c1c0d'];?>

</script>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_f1d706'];$_ad2869_local_vars=$_ad2869_old_vars['_f1d706'];?>

<?php endif;$_ad2869_local_params=$_ad2869_old_params['_fb4478'];$_ad2869_local_vars=$_ad2869_old_vars['_fb4478'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744011352,
);?>