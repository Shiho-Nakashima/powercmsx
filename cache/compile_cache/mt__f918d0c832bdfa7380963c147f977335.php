<?php ob_start();?><?php $_b7ec14_vars=&$this->vars;$_b7ec14_old_params=&$this->old_params;$_b7ec14_local_params=&$this->local_params;$_b7ec14_old_vars=&$this->old_vars;$_b7ec14_local_vars=&$this->local_vars;?><?php $_b7ec14_old_params['_e349ff']=$_b7ec14_local_params;$_b7ec14_old_vars['_e349ff']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_1e8e68=null;$_b7ec14_old_params['_1e8e68']=$_b7ec14_local_params;$_b7ec14_old_vars['_1e8e68']=$_b7ec14_local_vars;$a_1e8e68=$this->setup_args(['name'=>'header_alert_message','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=manage_scheme">
  <?php $_b7ec14_old_params['_e822c1']=$_b7ec14_local_params;$_b7ec14_old_vars['_e822c1']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'There is one scheme upgrade.','this_tag'=>'trans'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'There are %s schemes upgrade.','params'=>'$scheme_upgrade_count','this_tag'=>'trans'],null,$this),$this)?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e822c1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e822c1'];?>

</a>
<?php $c_1e8e68=ob_get_clean();$c_1e8e68=$this->block_setvarblock($a_1e8e68,$c_1e8e68,$this,$r_1e8e68,1,'_1e8e68');echo($c_1e8e68); $_b7ec14_local_params=$_b7ec14_old_params['_1e8e68'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'header_alert_force','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'header_alert_class','value'=>'warning','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e349ff'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e349ff'];?>

<?php $_b7ec14_old_params['_7f7012']=$_b7ec14_local_params;$_b7ec14_old_vars['_7f7012']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_17c035=null;$_b7ec14_old_params['_17c035']=$_b7ec14_local_params;$_b7ec14_old_vars['_17c035']=$_b7ec14_local_vars;$a_17c035=$this->setup_args(['name'=>'header_alert_message','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=manage_plugins">
  <?php $_b7ec14_old_params['_885ecb']=$_b7ec14_local_params;$_b7ec14_old_vars['_885ecb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'There is one plugin upgrade.','this_tag'=>'trans'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'There are %s plugins upgrade.','params'=>'$plugin_upgrade_count','this_tag'=>'trans'],null,$this),$this)?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_885ecb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_885ecb'];?>

</a>
<?php $c_17c035=ob_get_clean();$c_17c035=$this->block_setvarblock($a_17c035,$c_17c035,$this,$r_17c035,1,'_17c035');echo($c_17c035); $_b7ec14_local_params=$_b7ec14_old_params['_17c035'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'header_alert_force','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'header_alert_class','value'=>'warning','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7f7012'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7f7012'];?>

<?php $_b7ec14_old_params['_7113fd']=$_b7ec14_local_params;$_b7ec14_old_vars['_7113fd']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.change_activity','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_translate($this->function_var($this->setup_args(['name'=>'activity_label','translate'=>'','setvar'=>'activity_label_trans','this_tag'=>'var'],null,$this),$this),$this->setup_args('','translate',$this),$this,'translate'),$this->setup_args('activity_label_trans','setvar',$this),$this,'setvar')?>

<?php $c_efd15d=null;$_b7ec14_old_params['_efd15d']=$_b7ec14_local_params;$_b7ec14_old_vars['_efd15d']=$_b7ec14_local_vars;$a_efd15d=$this->setup_args(['name'=>'header_alert_message','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Activity model has been changed to \'%s\'.','params'=>'$activity_label_trans','this_tag'=>'trans'],null,$this),$this)?>
<?php $c_efd15d=ob_get_clean();$c_efd15d=$this->block_setvarblock($a_efd15d,$c_efd15d,$this,$r_efd15d,1,'_efd15d');echo($c_efd15d); $_b7ec14_local_params=$_b7ec14_old_params['_efd15d'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7113fd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7113fd'];?>

<?php $_b7ec14_old_params['_88e59f']=$_b7ec14_local_params;$_b7ec14_old_vars['_88e59f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.detatch_widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_f19072=null;$_b7ec14_old_params['_f19072']=$_b7ec14_local_params;$_b7ec14_old_vars['_f19072']=$_b7ec14_local_vars;$a_f19072=$this->setup_args(['name'=>'header_alert_message','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Dashboard has been updated.','this_tag'=>'trans'],null,$this),$this)?>
<?php $c_f19072=ob_get_clean();$c_f19072=$this->block_setvarblock($a_f19072,$c_f19072,$this,$r_f19072,1,'_f19072');echo($c_f19072); $_b7ec14_local_params=$_b7ec14_old_params['_f19072'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_88e59f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_88e59f'];?>

<?php $_b7ec14_old_params['_5d018e']=$_b7ec14_local_params;$_b7ec14_old_vars['_5d018e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.add_widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_1911eb=null;$_b7ec14_old_params['_1911eb']=$_b7ec14_local_params;$_b7ec14_old_vars['_1911eb']=$_b7ec14_local_vars;$a_1911eb=$this->setup_args(['name'=>'header_alert_message','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Dashboard has been updated.','this_tag'=>'trans'],null,$this),$this)?>
<?php $c_1911eb=ob_get_clean();$c_1911eb=$this->block_setvarblock($a_1911eb,$c_1911eb,$this,$r_1911eb,1,'_1911eb');echo($c_1911eb); $_b7ec14_local_params=$_b7ec14_old_params['_1911eb'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5d018e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5d018e'];?>

<?php $_b7ec14_old_params['_937077']=$_b7ec14_local_params;$_b7ec14_old_vars['_937077']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_a8cd61']=$_b7ec14_local_params;$_b7ec14_old_vars['_a8cd61']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_fix_spacebar','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a8cd61'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a8cd61'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_937077'];$_b7ec14_local_vars=$_b7ec14_old_vars['_937077'];?>

<!DOCTYPE html>
<html lang="<?php $_b7ec14_old_params['_ac2d14']=$_b7ec14_local_params;$_b7ec14_old_vars['_ac2d14']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ac2d14'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ac2d14'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_b7ec14_old_params['_972cc4']=$_b7ec14_local_params;$_b7ec14_old_vars['_972cc4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_972cc4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_972cc4'];?>
<?php $_b7ec14_old_params['_1f9869']=$_b7ec14_local_params;$_b7ec14_old_vars['_1f9869']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_59943f']=$_b7ec14_local_params;$_b7ec14_old_vars['_59943f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_59943f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_59943f'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1f9869'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1f9869'];?>
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
    <?php $_b7ec14_old_params['_ba2f4c']=$_b7ec14_local_params;$_b7ec14_old_vars['_ba2f4c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_93f560']=$_b7ec14_local_params;$_b7ec14_old_vars['_93f560']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_b7ec14_old_params['_0586e9']=$_b7ec14_local_params;$_b7ec14_old_vars['_0586e9']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0586e9'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0586e9'];?>

      <?php $_b7ec14_old_params['_822669']=$_b7ec14_local_params;$_b7ec14_old_vars['_822669']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_822669'];$_b7ec14_local_vars=$_b7ec14_old_vars['_822669'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_93f560'];$_b7ec14_local_vars=$_b7ec14_old_vars['_93f560'];?>

      <?php $_b7ec14_old_params['_666677']=$_b7ec14_local_params;$_b7ec14_old_vars['_666677']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_666677'];$_b7ec14_local_vars=$_b7ec14_old_vars['_666677'];?>

      <?php $_b7ec14_old_params['_1cc37e']=$_b7ec14_local_params;$_b7ec14_old_vars['_1cc37e']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1cc37e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1cc37e'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1020; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ba2f4c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ba2f4c'];?>

      .fixed-top { z-index: 1030 !important; }
      .nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      .nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php $_b7ec14_old_params['_c69a22']=$_b7ec14_local_params;$_b7ec14_old_vars['_c69a22']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_b7ec14_old_params['_83572b']=$_b7ec14_local_params;$_b7ec14_old_vars['_83572b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar, .workspace-bar a,
      .workspace-bar .dropdown-menu{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar button.my-sm-0{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar .my-sm-0, .workspace-bar .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php endif;$_83572b=ob_get_clean();echo paml_htmlspecialchars($_83572b,ENT_QUOTES);$_b7ec14_local_params=$_b7ec14_old_params['_83572b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_83572b'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c69a22'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c69a22'];?>

      <?php $_b7ec14_old_params['_b759b4']=$_b7ec14_local_params;$_b7ec14_old_vars['_b759b4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b759b4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b759b4'];?>

      <?php $_b7ec14_old_params['_f9c948']=$_b7ec14_local_params;$_b7ec14_old_vars['_f9c948']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'panel_width','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.nav-link{ max-width: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'panel_width','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
px !important }<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f9c948'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f9c948'];?>

      .navbar .btn { width:35px }
      <?php $_b7ec14_old_params['_098261']=$_b7ec14_local_params;$_b7ec14_old_vars['_098261']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'config','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_098261'];$_b7ec14_local_vars=$_b7ec14_old_vars['_098261'];?>

      <?php $_b7ec14_old_params['_63aad8']=$_b7ec14_local_params;$_b7ec14_old_vars['_63aad8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'in_editing','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      @media (min-width: 992px) {
      .col-lg-2{ max-width:13rem !important }
      .col-lg-10{ min-width: -webkit-calc(100% - 13rem); min-width: calc(100% - 13rem) } }
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_63aad8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_63aad8'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php $_b7ec14_old_params['_e5dcfc']=$_b7ec14_local_params;$_b7ec14_old_vars['_e5dcfc']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'invisible_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <style><?php echo $this->modifier_join($this->function_var($this->setup_args(['name'=>'invisible_selector','join'=>',','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','join',$this),$this,'join')?>
{display:none !important}</style>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e5dcfc'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e5dcfc'];?>

    <?php $_b7ec14_old_params['_e6e89a']=$_b7ec14_local_params;$_b7ec14_old_vars['_e6e89a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<style><?php $_b7ec14_old_params['_6b6a5e']=$_b7ec14_local_params;$_b7ec14_old_vars['_6b6a5e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
body { padding-top: 80px; } .workspace-bar { margin-top: 0;}
    <?php else:?>
.workspace-bar { margin-bottom: 14px;}<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6b6a5e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6b6a5e'];?>
</style><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e6e89a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e6e89a'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_b7ec14_old_params['_873ff3']=$_b7ec14_local_params;$_b7ec14_old_vars['_873ff3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_873ff3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_873ff3'];?>

    <?php $_b7ec14_old_params['_b03092']=$_b7ec14_local_params;$_b7ec14_old_vars['_b03092']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b03092'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b03092'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_b7ec14_old_params['_95eb6a']=$_b7ec14_local_params;$_b7ec14_old_vars['_95eb6a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php $_b7ec14_old_params['_e7f0a1']=$_b7ec14_local_params;$_b7ec14_old_vars['_e7f0a1']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e7f0a1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e7f0a1'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_95eb6a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_95eb6a'];?>

  <div id="main-content">
<?php $_b7ec14_old_params['_f95d6a']=$_b7ec14_local_params;$_b7ec14_old_vars['_f95d6a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="fixed-top">
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f95d6a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f95d6a'];?>

  <?php $_b7ec14_old_params['_43fffa']=$_b7ec14_local_params;$_b7ec14_old_vars['_43fffa']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_081a87']=$_b7ec14_local_params;$_b7ec14_old_vars['_081a87']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.__mode','match'=>'/^(?:login|logout)$/iu','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_081a87'];$_b7ec14_local_vars=$_b7ec14_old_vars['_081a87'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_43fffa'];$_b7ec14_local_vars=$_b7ec14_old_vars['_43fffa'];?>

  <?php $_b7ec14_old_params['_27b09e']=$_b7ec14_local_params;$_b7ec14_old_vars['_27b09e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_27b09e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_27b09e'];?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse nav-top<?php $_b7ec14_old_params['_af388c']=$_b7ec14_local_params;$_b7ec14_old_vars['_af388c']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 fixed-top<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_af388c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_af388c'];?>
">
      <?php $_b7ec14_old_params['_19b4c5']=$_b7ec14_local_params;$_b7ec14_old_vars['_19b4c5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_b7ec14_old_params['_effbe0']=$_b7ec14_local_params;$_b7ec14_old_vars['_effbe0']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'install','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="navbar-brand brand-prototype" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
">PowerCMS X</a>
        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_effbe0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_effbe0'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_19b4c5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_19b4c5'];?>

      <?php $_b7ec14_old_params['_99a312']=$_b7ec14_local_params;$_b7ec14_old_vars['_99a312']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; z-index:7" class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_99a312'];$_b7ec14_local_vars=$_b7ec14_old_vars['_99a312'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_b7ec14_old_params['_ed4f2c']=$_b7ec14_local_params;$_b7ec14_old_vars['_ed4f2c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_11da86=null;$_b7ec14_old_params['_11da86']=$_b7ec14_local_params;$_b7ec14_old_vars['_11da86']=$_b7ec14_local_vars;$a_11da86=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_11da86=ob_get_clean();$c_11da86=$this->block_setvarblock($a_11da86,$c_11da86,$this,$r_11da86,1,'_11da86');echo($c_11da86); $_b7ec14_local_params=$_b7ec14_old_params['_11da86'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ed4f2c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ed4f2c'];?>

      <?php $_b7ec14_old_params['_e3dcfe']=$_b7ec14_local_params;$_b7ec14_old_vars['_e3dcfe']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a class="navbar-brand"<?php $_b7ec14_old_params['_8f5123']=$_b7ec14_local_params;$_b7ec14_old_vars['_8f5123']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8f5123'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8f5123'];?>
 style="z-index:1"><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
<span id="navbar-brand-end"></span></a>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_b7ec14_old_params['_bc13a5']=$_b7ec14_local_params;$_b7ec14_old_vars['_bc13a5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_01847e']=$_b7ec14_local_params;$_b7ec14_old_vars['_01847e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'ws_selector_limit','setvar'=>'selector_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('selector_limit','setvar',$this),$this,'setvar')?>

        <?php $_b7ec14_old_params['_f97818']=$_b7ec14_local_params;$_b7ec14_old_vars['_f97818']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'16','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f97818'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f97818'];?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','op'=>'+','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_b7ec14_old_params['_107de2']=$_b7ec14_local_params;$_b7ec14_old_vars['_107de2']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_107de2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_107de2'];?>

        <?php $c_fa30e0=null;$_b7ec14_old_params['_fa30e0']=$_b7ec14_local_params;$_b7ec14_old_vars['_fa30e0']=$_b7ec14_local_vars;$a_fa30e0=$this->setup_args(['cols'=>'id,name,barcolor,bartextcolor','model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_fa30e0=-1;$r_fa30e0=true;while($r_fa30e0===true):$r_fa30e0=($_fa30e0!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_fa30e0,$c_fa30e0,$this,$r_fa30e0,++$_fa30e0,'_fa30e0');ob_start();?>
<?php $c_fa30e0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fa30e0=false;}if($c_fa30e0 ):?>

        <?php $_b7ec14_old_params['_5a6347']=$_b7ec14_local_params;$_b7ec14_old_vars['_5a6347']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="hidden nav-item dropdown workspace-dd-wrapper active" id="workspace-selector" style="z-index:5">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cube workspace-dd" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5a6347'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5a6347'];?>

            <?php $_b7ec14_old_params['_2588fa']=$_b7ec14_local_params;$_b7ec14_old_vars['_2588fa']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a<?php $_b7ec14_old_params['_70e971']=$_b7ec14_local_params;$_b7ec14_old_vars['_70e971']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_color_the_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_44f9bb']=$_b7ec14_local_params;$_b7ec14_old_vars['_44f9bb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_7a7599']=$_b7ec14_local_params;$_b7ec14_old_vars['_7a7599']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="<?php $_b7ec14_old_params['_14064e']=$_b7ec14_local_params;$_b7ec14_old_vars['_14064e']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__last__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
margin-bottom:3px;<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_14064e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_14064e'];?>
background-color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7a7599'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7a7599'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_44f9bb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_44f9bb'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_70e971'];$_b7ec14_local_vars=$_b7ec14_old_vars['_70e971'];?>
 class="dropdown-item btn-sm <?php $_b7ec14_old_params['_072c5d']=$_b7ec14_local_params;$_b7ec14_old_vars['_072c5d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_072c5d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_072c5d'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?_selector=1&amp;<?php $_b7ec14_old_params['_28169f']=$_b7ec14_local_params;$_b7ec14_old_vars['_28169f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_168008']=$_b7ec14_local_params;$_b7ec14_old_vars['_168008']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->modifier_replace($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]*/\',\'\'','replace'=>'\'does_act=1\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('\\\'does_act=1\\\',\\\'\\\'','replace',$this),$this,'replace'),ENT_QUOTES)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_168008'];$_b7ec14_local_vars=$_b7ec14_old_vars['_168008'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_28169f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_28169f'];?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
              <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

            </a>
            <?php else:?>

            <a class="dropdown-item btn-sm" data-toggle="modal" data-target="#modal"
                data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</a>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2588fa'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2588fa'];?>

        <?php $_b7ec14_old_params['_fe0f45']=$_b7ec14_local_params;$_b7ec14_old_vars['_fe0f45']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_fe0f45'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fe0f45'];?>

        <?php endif;$c_fa30e0=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_fa30e0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fa30e0'];?>

      <div class="collapse navbar-collapse" id="navbars" <?php $_b7ec14_old_params['_8137c1']=$_b7ec14_local_params;$_b7ec14_old_vars['_8137c1']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8137c1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8137c1'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel">
        <?php $c_d4bf06=null;$_b7ec14_old_params['_d4bf06']=$_b7ec14_local_params;$_b7ec14_old_vars['_d4bf06']=$_b7ec14_local_vars;$a_d4bf06=$this->setup_args(['menu_type'=>'6','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_d4bf06=-1;$r_d4bf06=true;while($r_d4bf06===true):$r_d4bf06=($_d4bf06!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_d4bf06,$c_d4bf06,$this,$r_d4bf06,++$_d4bf06,'_d4bf06');ob_start();?>
<?php $c_d4bf06 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d4bf06=false;}if($c_d4bf06 ):?>

          <?php $_b7ec14_old_params['_6c61d7']=$_b7ec14_local_params;$_b7ec14_old_vars['_6c61d7']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6c61d7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6c61d7'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_b2e299']=$_b7ec14_local_params;$_b7ec14_old_vars['_b2e299']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b2e299'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b2e299'];?>

        <?php endif;$c_d4bf06=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_d4bf06'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d4bf06'];?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'panel_limit','setvar'=>'panel_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('panel_limit','setvar',$this),$this,'setvar')?>

        <?php $c_5761d0=null;$_b7ec14_old_params['_5761d0']=$_b7ec14_local_params;$_b7ec14_old_vars['_5761d0']=$_b7ec14_local_vars;$a_5761d0=$this->setup_args(['limit'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_5761d0=-1;$r_5761d0=true;while($r_5761d0===true):$r_5761d0=($_5761d0!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_5761d0,$c_5761d0,$this,$r_5761d0,++$_5761d0,'_5761d0');ob_start();?>
<?php $c_5761d0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5761d0=false;}if($c_5761d0 ):?>

          <li class="nav-item <?php $_b7ec14_old_params['_168b37']=$_b7ec14_local_params;$_b7ec14_old_vars['_168b37']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_168b37'];$_b7ec14_local_vars=$_b7ec14_old_vars['_168b37'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php $_b7ec14_old_params['_9e3d9d']=$_b7ec14_local_params;$_b7ec14_old_vars['_9e3d9d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9e3d9d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9e3d9d'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_5761d0=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_5761d0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5761d0'];?>

        <?php $c_86993f=null;$_b7ec14_old_params['_86993f']=$_b7ec14_local_params;$_b7ec14_old_vars['_86993f']=$_b7ec14_local_vars;$a_86993f=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_86993f=-1;$r_86993f=true;while($r_86993f===true):$r_86993f=($_86993f!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_86993f,$c_86993f,$this,$r_86993f,++$_86993f,'_86993f');ob_start();?>
<?php $c_86993f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_86993f=false;}if($c_86993f ):?>

          <?php $_b7ec14_old_params['_0057bc']=$_b7ec14_local_params;$_b7ec14_old_vars['_0057bc']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0057bc'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0057bc'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_51d9b5']=$_b7ec14_local_params;$_b7ec14_old_vars['_51d9b5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_51d9b5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_51d9b5'];?>

        <?php endif;$c_86993f=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_86993f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_86993f'];?>

        <?php $c_7f48ea=null;$_b7ec14_old_params['_7f48ea']=$_b7ec14_local_params;$_b7ec14_old_vars['_7f48ea']=$_b7ec14_local_vars;$a_7f48ea=$this->setup_args(['menu_type'=>'2','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_7f48ea=-1;$r_7f48ea=true;while($r_7f48ea===true):$r_7f48ea=($_7f48ea!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_7f48ea,$c_7f48ea,$this,$r_7f48ea,++$_7f48ea,'_7f48ea');ob_start();?>
<?php $c_7f48ea = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7f48ea=false;}if($c_7f48ea ):?>

          <?php $_b7ec14_old_params['_3376a2']=$_b7ec14_local_params;$_b7ec14_old_vars['_3376a2']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_3376a2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_3376a2'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_308043']=$_b7ec14_local_params;$_b7ec14_old_vars['_308043']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_308043'];$_b7ec14_local_vars=$_b7ec14_old_vars['_308043'];?>

        <?php endif;$c_7f48ea=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_7f48ea'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7f48ea'];?>

        <?php $c_b38e98=null;$_b7ec14_old_params['_b38e98']=$_b7ec14_local_params;$_b7ec14_old_vars['_b38e98']=$_b7ec14_local_vars;$a_b38e98=$this->setup_args(['menu_type'=>'3','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_b38e98=-1;$r_b38e98=true;while($r_b38e98===true):$r_b38e98=($_b38e98!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_b38e98,$c_b38e98,$this,$r_b38e98,++$_b38e98,'_b38e98');ob_start();?>
<?php $c_b38e98 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b38e98=false;}if($c_b38e98 ):?>

          <?php $_b7ec14_old_params['_cec893']=$_b7ec14_local_params;$_b7ec14_old_vars['_cec893']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_cec893'];$_b7ec14_local_vars=$_b7ec14_old_vars['_cec893'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_a6b6d1']=$_b7ec14_local_params;$_b7ec14_old_vars['_a6b6d1']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a6b6d1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a6b6d1'];?>

        <?php endif;$c_b38e98=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_b38e98'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b38e98'];?>

        <?php $c_13c21b=null;$_b7ec14_old_params['_13c21b']=$_b7ec14_local_params;$_b7ec14_old_vars['_13c21b']=$_b7ec14_local_vars;$a_13c21b=$this->setup_args(['menu_type'=>'4','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_13c21b=-1;$r_13c21b=true;while($r_13c21b===true):$r_13c21b=($_13c21b!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_13c21b,$c_13c21b,$this,$r_13c21b,++$_13c21b,'_13c21b');ob_start();?>
<?php $c_13c21b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_13c21b=false;}if($c_13c21b ):?>

          <?php $_b7ec14_old_params['_591ab6']=$_b7ec14_local_params;$_b7ec14_old_vars['_591ab6']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_591ab6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_591ab6'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_046eb4']=$_b7ec14_local_params;$_b7ec14_old_vars['_046eb4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_046eb4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_046eb4'];?>

        <?php endif;$c_13c21b=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_13c21b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_13c21b'];?>

        <?php $c_076fb5=null;$_b7ec14_old_params['_076fb5']=$_b7ec14_local_params;$_b7ec14_old_vars['_076fb5']=$_b7ec14_local_vars;$a_076fb5=$this->setup_args(['menu_type'=>'5','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_076fb5=-1;$r_076fb5=true;while($r_076fb5===true):$r_076fb5=($_076fb5!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_076fb5,$c_076fb5,$this,$r_076fb5,++$_076fb5,'_076fb5');ob_start();?>
<?php $c_076fb5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_076fb5=false;}if($c_076fb5 ):?>

          <?php $_b7ec14_old_params['_21e4be']=$_b7ec14_local_params;$_b7ec14_old_vars['_21e4be']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_21e4be'];$_b7ec14_local_vars=$_b7ec14_old_vars['_21e4be'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_250bc4']=$_b7ec14_local_params;$_b7ec14_old_vars['_250bc4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_250bc4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_250bc4'];?>

        <?php endif;$c_076fb5=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_076fb5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_076fb5'];?>

        <?php $c_1fee5e=null;$_b7ec14_old_params['_1fee5e']=$_b7ec14_local_params;$_b7ec14_old_vars['_1fee5e']=$_b7ec14_local_vars;$a_1fee5e=$this->setup_args(['name'=>'system_menus','this_tag'=>'loop'],null,$this);$_1fee5e=-1;$r_1fee5e=true;while($r_1fee5e===true):$r_1fee5e=($_1fee5e!==-1)?false:true;echo $this->block_loop($a_1fee5e,$c_1fee5e,$this,$r_1fee5e,++$_1fee5e,'_1fee5e');ob_start();?>
<?php $c_1fee5e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1fee5e=false;}if($c_1fee5e ):?>

          <?php $_b7ec14_old_params['_04768f']=$_b7ec14_local_params;$_b7ec14_old_vars['_04768f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <?php $_b7ec14_old_params['_91845b']=$_b7ec14_local_params;$_b7ec14_old_vars['_91845b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php elseif($this->conditional_elseif($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_91845b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_91845b'];?>

            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_04768f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_04768f'];?>

            <a <?php $_b7ec14_old_params['_f823dd']=$_b7ec14_local_params;$_b7ec14_old_vars['_f823dd']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f823dd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f823dd'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
<?php $c_6ba1c9=null;$_b7ec14_old_params['_6ba1c9']=$_b7ec14_local_params;$_b7ec14_old_vars['_6ba1c9']=$_b7ec14_local_vars;$a_6ba1c9=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_6ba1c9=-1;$r_6ba1c9=true;while($r_6ba1c9===true):$r_6ba1c9=($_6ba1c9!==-1)?false:true;echo $this->block_loop($a_6ba1c9,$c_6ba1c9,$this,$r_6ba1c9,++$_6ba1c9,'_6ba1c9');ob_start();?>
<?php $c_6ba1c9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_6ba1c9=false;}if($c_6ba1c9 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_6ba1c9=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_6ba1c9'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6ba1c9'];?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_b7ec14_old_params['_24cae1']=$_b7ec14_local_params;$_b7ec14_old_vars['_24cae1']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_mode','eq'=>'manage_scheme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_0cf93b']=$_b7ec14_local_params;$_b7ec14_old_vars['_0cf93b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0cf93b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0cf93b'];?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_mode','eq'=>'manage_plugins','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_aedd71']=$_b7ec14_local_params;$_b7ec14_old_vars['_aedd71']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_aedd71'];$_b7ec14_local_vars=$_b7ec14_old_vars['_aedd71'];?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_24cae1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_24cae1'];?>

            </a>
          <?php $_b7ec14_old_params['_f15cb0']=$_b7ec14_local_params;$_b7ec14_old_vars['_f15cb0']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f15cb0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f15cb0'];?>

        <?php endif;$c_1fee5e=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_1fee5e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1fee5e'];?>

        </ul>
        <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_system','this_tag'=>'var'],null,$this),$this)?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'show_both','setvar'=>'__show_both','this_tag'=>'property'],null,$this),$this),$this->setup_args('__show_both','setvar',$this),$this,'setvar')?>

          <a href="<?php $_b7ec14_old_params['_2badd7']=$_b7ec14_local_params;$_b7ec14_old_vars['_2badd7']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_840170']=$_b7ec14_local_params;$_b7ec14_old_vars['_840170']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_840170'];$_b7ec14_local_vars=$_b7ec14_old_vars['_840170'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2badd7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2badd7'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_b7ec14_old_params['_301d94']=$_b7ec14_local_params;$_b7ec14_old_vars['_301d94']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_301d94'];$_b7ec14_local_vars=$_b7ec14_old_vars['_301d94'];?>

        <?php $_b7ec14_old_params['_a79b6e']=$_b7ec14_local_params;$_b7ec14_old_vars['_a79b6e']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'0','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_9b135f=null;$_b7ec14_old_params['_9b135f']=$_b7ec14_local_params;$_b7ec14_old_vars['_9b135f']=$_b7ec14_local_vars;$a_9b135f=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'0','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_9b135f=-1;$r_9b135f=true;while($r_9b135f===true):$r_9b135f=($_9b135f!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_9b135f,$c_9b135f,$this,$r_9b135f,++$_9b135f,'_9b135f');ob_start();?>
<?php $c_9b135f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9b135f=false;}if($c_9b135f ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_9b135f=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_9b135f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9b135f'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a79b6e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a79b6e'];?>

          <a style="padding:<?php $_b7ec14_old_params['_d3d8e4']=$_b7ec14_local_params;$_b7ec14_old_vars['_d3d8e4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
0 3px<?php else:?>
4px<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d3d8e4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d3d8e4'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_profile=1" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
          <?php $_b7ec14_old_params['_ee12c0']=$_b7ec14_local_params;$_b7ec14_old_vars['_ee12c0']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ee12c0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ee12c0'];?>

          </a>
          <a id="__logout" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_b7ec14_old_params['_907aa3']=$_b7ec14_local_params;$_b7ec14_old_vars['_907aa3']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config" class="btn btn-sm btn-secondary my-2 my-sm-0 config-system" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_907aa3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_907aa3'];?>

        </div>
      </div>
        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_01847e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_01847e'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_bc13a5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_bc13a5'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e3dcfe'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e3dcfe'];?>

      <?php $_b7ec14_old_params['_a3ec97']=$_b7ec14_local_params;$_b7ec14_old_vars['_a3ec97']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbars" <?php $_b7ec14_old_params['_2bbf98']=$_b7ec14_local_params;$_b7ec14_old_vars['_2bbf98']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2bbf98'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2bbf98'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel"></ul>
          <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_workspace','this_tag'=>'var'],null,$this),$this)?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout<?php $_b7ec14_old_params['_b2efd2']=$_b7ec14_local_params;$_b7ec14_old_vars['_b2efd2']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b2efd2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b2efd2'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=edit_profile<?php $_b7ec14_old_params['_33202a']=$_b7ec14_local_params;$_b7ec14_old_vars['_33202a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_33202a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_33202a'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          </div>
        </div>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a3ec97'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a3ec97'];?>

    </nav>
  <?php $_b7ec14_old_params['_fd458a']=$_b7ec14_local_params;$_b7ec14_old_vars['_fd458a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_b7ec14_old_params['_c9e1e4']=$_b7ec14_local_params;$_b7ec14_old_vars['_c9e1e4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_4f2223']=$_b7ec14_local_params;$_b7ec14_old_vars['_4f2223']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_b7ec14_old_params['_1a043e']=$_b7ec14_local_params;$_b7ec14_old_vars['_1a043e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar"<?php $_b7ec14_old_params['_c9d012']=$_b7ec14_local_params;$_b7ec14_old_vars['_c9d012']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 style="z-index:1029;"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c9d012'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c9d012'];?>
>
      <?php $_b7ec14_old_params['_1845cd']=$_b7ec14_local_params;$_b7ec14_old_vars['_1845cd']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important;" class="navbar-toggler navbar-toggler-right btn-ws" type="button" data-toggle="collapse" data-target="#navbars-ws" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1845cd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1845cd'];?>

      <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'workspace_name','count_chars'=>'','setvar'=>'workspace_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('workspace_chars','setvar',$this),$this,'setvar')?>
<a class="navbar-brand brand-workspace" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_b7ec14_old_params['_34fdfc']=$_b7ec14_local_params;$_b7ec14_old_vars['_34fdfc']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_34fdfc'];$_b7ec14_local_vars=$_b7ec14_old_vars['_34fdfc'];?>
><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
</a>
      <div class="collapse navbar-collapse" id="navbars-ws">
        <ul class="nav-pills navbar-nav mr-auto">
          <?php $c_644ff2=null;$_b7ec14_old_params['_644ff2']=$_b7ec14_local_params;$_b7ec14_old_vars['_644ff2']=$_b7ec14_local_vars;$a_644ff2=$this->setup_args(['type'=>'display_space','menu_type'=>'6','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_644ff2=-1;$r_644ff2=true;while($r_644ff2===true):$r_644ff2=($_644ff2!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_644ff2,$c_644ff2,$this,$r_644ff2,++$_644ff2,'_644ff2');ob_start();?>
<?php $c_644ff2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_644ff2=false;}if($c_644ff2 ):?>

            <?php $_b7ec14_old_params['_a24b39']=$_b7ec14_local_params;$_b7ec14_old_vars['_a24b39']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <li class="nav-item dropdown">
              <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
                <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </a>
              <div class="dropdown-menu">
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a24b39'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a24b39'];?>

              <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_47ed9f']=$_b7ec14_local_params;$_b7ec14_old_vars['_47ed9f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_47ed9f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_47ed9f'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
            <?php $_b7ec14_old_params['_5af109']=$_b7ec14_local_params;$_b7ec14_old_vars['_5af109']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              </li>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5af109'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5af109'];?>

          <?php endif;$c_644ff2=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_644ff2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_644ff2'];?>

        <?php $c_2762c4=null;$_b7ec14_old_params['_2762c4']=$_b7ec14_local_params;$_b7ec14_old_vars['_2762c4']=$_b7ec14_local_vars;$a_2762c4=$this->setup_args(['limit'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_2762c4=-1;$r_2762c4=true;while($r_2762c4===true):$r_2762c4=($_2762c4!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_2762c4,$c_2762c4,$this,$r_2762c4,++$_2762c4,'_2762c4');ob_start();?>
<?php $c_2762c4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2762c4=false;}if($c_2762c4 ):?>

          <li class="nav-item nav-item-ws <?php $_b7ec14_old_params['_967cd6']=$_b7ec14_local_params;$_b7ec14_old_vars['_967cd6']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_967cd6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_967cd6'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_e98f82']=$_b7ec14_local_params;$_b7ec14_old_vars['_e98f82']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e98f82'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e98f82'];?>
"<?php $_b7ec14_old_params['_1f071b']=$_b7ec14_local_params;$_b7ec14_old_vars['_1f071b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1f071b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1f071b'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_2762c4=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_2762c4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2762c4'];?>

        <?php $c_7df2ce=null;$_b7ec14_old_params['_7df2ce']=$_b7ec14_local_params;$_b7ec14_old_vars['_7df2ce']=$_b7ec14_local_vars;$a_7df2ce=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_7df2ce=-1;$r_7df2ce=true;while($r_7df2ce===true):$r_7df2ce=($_7df2ce!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_7df2ce,$c_7df2ce,$this,$r_7df2ce,++$_7df2ce,'_7df2ce');ob_start();?>
<?php $c_7df2ce = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7df2ce=false;}if($c_7df2ce ):?>

          <?php $_b7ec14_old_params['_d951cf']=$_b7ec14_local_params;$_b7ec14_old_vars['_d951cf']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d951cf'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d951cf'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_902858']=$_b7ec14_local_params;$_b7ec14_old_vars['_902858']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_902858'];$_b7ec14_local_vars=$_b7ec14_old_vars['_902858'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_a2f057']=$_b7ec14_local_params;$_b7ec14_old_vars['_a2f057']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a2f057'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a2f057'];?>

        <?php endif;$c_7df2ce=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_7df2ce'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7df2ce'];?>

        <?php $c_5d3132=null;$_b7ec14_old_params['_5d3132']=$_b7ec14_local_params;$_b7ec14_old_vars['_5d3132']=$_b7ec14_local_vars;$a_5d3132=$this->setup_args(['type'=>'display_space','menu_type'=>'2','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_5d3132=-1;$r_5d3132=true;while($r_5d3132===true):$r_5d3132=($_5d3132!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_5d3132,$c_5d3132,$this,$r_5d3132,++$_5d3132,'_5d3132');ob_start();?>
<?php $c_5d3132 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5d3132=false;}if($c_5d3132 ):?>

          <?php $_b7ec14_old_params['_0e2823']=$_b7ec14_local_params;$_b7ec14_old_vars['_0e2823']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0e2823'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0e2823'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_88dfce']=$_b7ec14_local_params;$_b7ec14_old_vars['_88dfce']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_88dfce'];$_b7ec14_local_vars=$_b7ec14_old_vars['_88dfce'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_972481']=$_b7ec14_local_params;$_b7ec14_old_vars['_972481']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_972481'];$_b7ec14_local_vars=$_b7ec14_old_vars['_972481'];?>

        <?php endif;$c_5d3132=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_5d3132'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5d3132'];?>

        <?php $c_938ae6=null;$_b7ec14_old_params['_938ae6']=$_b7ec14_local_params;$_b7ec14_old_vars['_938ae6']=$_b7ec14_local_vars;$a_938ae6=$this->setup_args(['type'=>'display_space','menu_type'=>'3','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_938ae6=-1;$r_938ae6=true;while($r_938ae6===true):$r_938ae6=($_938ae6!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_938ae6,$c_938ae6,$this,$r_938ae6,++$_938ae6,'_938ae6');ob_start();?>
<?php $c_938ae6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_938ae6=false;}if($c_938ae6 ):?>

          <?php $_b7ec14_old_params['_71727a']=$_b7ec14_local_params;$_b7ec14_old_vars['_71727a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_71727a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_71727a'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_8a32aa']=$_b7ec14_local_params;$_b7ec14_old_vars['_8a32aa']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8a32aa'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8a32aa'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_6e3cd0']=$_b7ec14_local_params;$_b7ec14_old_vars['_6e3cd0']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6e3cd0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6e3cd0'];?>

        <?php endif;$c_938ae6=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_938ae6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_938ae6'];?>

        <?php $c_d9a6c0=null;$_b7ec14_old_params['_d9a6c0']=$_b7ec14_local_params;$_b7ec14_old_vars['_d9a6c0']=$_b7ec14_local_vars;$a_d9a6c0=$this->setup_args(['type'=>'display_space','menu_type'=>'4','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_d9a6c0=-1;$r_d9a6c0=true;while($r_d9a6c0===true):$r_d9a6c0=($_d9a6c0!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_d9a6c0,$c_d9a6c0,$this,$r_d9a6c0,++$_d9a6c0,'_d9a6c0');ob_start();?>
<?php $c_d9a6c0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d9a6c0=false;}if($c_d9a6c0 ):?>

          <?php $_b7ec14_old_params['_7f5bc4']=$_b7ec14_local_params;$_b7ec14_old_vars['_7f5bc4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7f5bc4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7f5bc4'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_a69b85']=$_b7ec14_local_params;$_b7ec14_old_vars['_a69b85']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a69b85'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a69b85'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_76974e']=$_b7ec14_local_params;$_b7ec14_old_vars['_76974e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_76974e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_76974e'];?>

        <?php endif;$c_d9a6c0=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_d9a6c0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d9a6c0'];?>

        <?php $c_d4cd7a=null;$_b7ec14_old_params['_d4cd7a']=$_b7ec14_local_params;$_b7ec14_old_vars['_d4cd7a']=$_b7ec14_local_vars;$a_d4cd7a=$this->setup_args(['type'=>'display_space','menu_type'=>'5','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_d4cd7a=-1;$r_d4cd7a=true;while($r_d4cd7a===true):$r_d4cd7a=($_d4cd7a!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_d4cd7a,$c_d4cd7a,$this,$r_d4cd7a,++$_d4cd7a,'_d4cd7a');ob_start();?>
<?php $c_d4cd7a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d4cd7a=false;}if($c_d4cd7a ):?>

          <?php $_b7ec14_old_params['_5c8959']=$_b7ec14_local_params;$_b7ec14_old_vars['_5c8959']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5c8959'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5c8959'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_fa5407']=$_b7ec14_local_params;$_b7ec14_old_vars['_fa5407']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_fa5407'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fa5407'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_b7ec14_old_params['_6a83e6']=$_b7ec14_local_params;$_b7ec14_old_vars['_6a83e6']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6a83e6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6a83e6'];?>

        <?php endif;$c_d4cd7a=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_d4cd7a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d4cd7a'];?>

        <?php $c_717809=null;$_b7ec14_old_params['_717809']=$_b7ec14_local_params;$_b7ec14_old_vars['_717809']=$_b7ec14_local_vars;$a_717809=$this->setup_args(['name'=>'workspace_menus','this_tag'=>'loop'],null,$this);$_717809=-1;$r_717809=true;while($r_717809===true):$r_717809=($_717809!==-1)?false:true;echo $this->block_loop($a_717809,$c_717809,$this,$r_717809,++$_717809,'_717809');ob_start();?>
<?php $c_717809 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_717809=false;}if($c_717809 ):?>

          <?php $_b7ec14_old_params['_abc05d']=$_b7ec14_local_params;$_b7ec14_old_vars['_abc05d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_abc05d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_abc05d'];?>

            <a <?php $_b7ec14_old_params['_52f9c5']=$_b7ec14_local_params;$_b7ec14_old_vars['_52f9c5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_52f9c5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_52f9c5'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_90edf1=null;$_b7ec14_old_params['_90edf1']=$_b7ec14_local_params;$_b7ec14_old_vars['_90edf1']=$_b7ec14_local_vars;$a_90edf1=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_90edf1=-1;$r_90edf1=true;while($r_90edf1===true):$r_90edf1=($_90edf1!==-1)?false:true;echo $this->block_loop($a_90edf1,$c_90edf1,$this,$r_90edf1,++$_90edf1,'_90edf1');ob_start();?>
<?php $c_90edf1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_90edf1=false;}if($c_90edf1 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_90edf1=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_90edf1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_90edf1'];?>
"><?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>
</a>
          <?php $_b7ec14_old_params['_be64fe']=$_b7ec14_local_params;$_b7ec14_old_vars['_be64fe']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_be64fe'];$_b7ec14_local_vars=$_b7ec14_old_vars['_be64fe'];?>

        <?php endif;$c_717809=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_717809'];$_b7ec14_local_vars=$_b7ec14_old_vars['_717809'];?>

        </ul>
        <div class="header-util">
          <a href="<?php $_b7ec14_old_params['_c1ff7c']=$_b7ec14_local_params;$_b7ec14_old_vars['_c1ff7c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_131fca']=$_b7ec14_local_params;$_b7ec14_old_vars['_131fca']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_131fca'];$_b7ec14_local_vars=$_b7ec14_old_vars['_131fca'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c1ff7c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c1ff7c'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_b7ec14_old_params['_363824']=$_b7ec14_local_params;$_b7ec14_old_vars['_363824']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_bd6c8e']=$_b7ec14_local_params;$_b7ec14_old_vars['_bd6c8e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_bd6c8e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_bd6c8e'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_363824'];$_b7ec14_local_vars=$_b7ec14_old_vars['_363824'];?>

        <?php $_b7ec14_old_params['_d5c071']=$_b7ec14_local_params;$_b7ec14_old_vars['_d5c071']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_dcef00=null;$_b7ec14_old_params['_dcef00']=$_b7ec14_local_params;$_b7ec14_old_vars['_dcef00']=$_b7ec14_local_vars;$a_dcef00=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'$workspace_id','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_dcef00=-1;$r_dcef00=true;while($r_dcef00===true):$r_dcef00=($_dcef00!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_dcef00,$c_dcef00,$this,$r_dcef00,++$_dcef00,'_dcef00');ob_start();?>
<?php $c_dcef00 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_dcef00=false;}if($c_dcef00 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_dcef00=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_dcef00'];$_b7ec14_local_vars=$_b7ec14_old_vars['_dcef00'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d5c071'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d5c071'];?>

        <?php $_b7ec14_old_params['_ac6c0e']=$_b7ec14_local_params;$_b7ec14_old_vars['_ac6c0e']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'workspace','id'=>'$workspace_id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 config-workspace" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ac6c0e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ac6c0e'];?>

        </div>
      </div>
    </nav>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1a043e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1a043e'];?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_4f2223'];$_b7ec14_local_vars=$_b7ec14_old_vars['_4f2223'];?>

<?php $_b7ec14_old_params['_b04f69']=$_b7ec14_local_params;$_b7ec14_old_vars['_b04f69']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </div>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b04f69'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b04f69'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_b7ec14_old_params['_b8bb5b']=$_b7ec14_local_params;$_b7ec14_old_vars['_b8bb5b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_b7ec14_old_params['_5a765d']=$_b7ec14_local_params;$_b7ec14_old_vars['_5a765d']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5a765d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5a765d'];?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b8bb5b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b8bb5b'];?>

    <?php $_b7ec14_old_params['_c033eb']=$_b7ec14_local_params;$_b7ec14_old_vars['_c033eb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c033eb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c033eb'];?>

    <?php $_b7ec14_old_params['_d5d421']=$_b7ec14_local_params;$_b7ec14_old_vars['_d5d421']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_b7ec14_old_params['_2b052d']=$_b7ec14_local_params;$_b7ec14_old_vars['_2b052d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2b052d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2b052d'];?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d5d421'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d5d421'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'output_container','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <div class="container-fluid">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_b7ec14_old_params['_0e31b2']=$_b7ec14_local_params;$_b7ec14_old_vars['_0e31b2']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_b7ec14_old_params['_a1dd52']=$_b7ec14_local_params;$_b7ec14_old_vars['_a1dd52']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_b7ec14_old_params['_98a468']=$_b7ec14_local_params;$_b7ec14_old_vars['_98a468']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_b729ad']=$_b7ec14_local_params;$_b7ec14_old_vars['_b729ad']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php $_b7ec14_old_params['_0a61f0']=$_b7ec14_local_params;$_b7ec14_old_vars['_0a61f0']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0a61f0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0a61f0'];?>

            <?php $_b7ec14_old_params['_633e99']=$_b7ec14_local_params;$_b7ec14_old_vars['_633e99']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_633e99'];$_b7ec14_local_vars=$_b7ec14_old_vars['_633e99'];?>

          <?php $_b7ec14_old_params['_13b633']=$_b7ec14_local_params;$_b7ec14_old_vars['_13b633']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_13b633'];$_b7ec14_local_vars=$_b7ec14_old_vars['_13b633'];?>

          <?php $_b7ec14_old_params['_fd2bee']=$_b7ec14_local_params;$_b7ec14_old_vars['_fd2bee']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_fd2bee'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fd2bee'];?>

          <?php $_b7ec14_old_params['_53d727']=$_b7ec14_local_params;$_b7ec14_old_vars['_53d727']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_b7ec14_old_params['_252270']=$_b7ec14_local_params;$_b7ec14_old_vars['_252270']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_252270'];$_b7ec14_local_vars=$_b7ec14_old_vars['_252270'];?>

          <?php $_b7ec14_old_params['_28ddd9']=$_b7ec14_local_params;$_b7ec14_old_vars['_28ddd9']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_28ddd9'];$_b7ec14_local_vars=$_b7ec14_old_vars['_28ddd9'];?>

            <?php $_b7ec14_old_params['_d4bca8']=$_b7ec14_local_params;$_b7ec14_old_vars['_d4bca8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d4bca8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d4bca8'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_53d727'];$_b7ec14_local_vars=$_b7ec14_old_vars['_53d727'];?>

          <?php $_b7ec14_old_params['_ff26dd']=$_b7ec14_local_params;$_b7ec14_old_vars['_ff26dd']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ff26dd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ff26dd'];?>

          <?php $_b7ec14_old_params['_986d03']=$_b7ec14_local_params;$_b7ec14_old_vars['_986d03']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_b7ec14_old_params['_24486f']=$_b7ec14_local_params;$_b7ec14_old_vars['_24486f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_24486f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_24486f'];?>

          <?php $_b7ec14_old_params['_84f9da']=$_b7ec14_local_params;$_b7ec14_old_vars['_84f9da']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_84f9da'];$_b7ec14_local_vars=$_b7ec14_old_vars['_84f9da'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_986d03'];$_b7ec14_local_vars=$_b7ec14_old_vars['_986d03'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_b7ec14_old_params['_51368f']=$_b7ec14_local_params;$_b7ec14_old_vars['_51368f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_35185f=null;$_b7ec14_old_params['_35185f']=$_b7ec14_local_params;$_b7ec14_old_vars['_35185f']=$_b7ec14_local_vars;$a_35185f=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_35185f=-1;$r_35185f=true;while($r_35185f===true):$r_35185f=($_35185f!==-1)?false:true;echo $this->block_loop($a_35185f,$c_35185f,$this,$r_35185f,++$_35185f,'_35185f');ob_start();?>
<?php $c_35185f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_35185f=false;}if($c_35185f ):?>

                      <?php $_b7ec14_old_params['_9ff319']=$_b7ec14_local_params;$_b7ec14_old_vars['_9ff319']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9ff319'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9ff319'];?>

                        <option <?php $_b7ec14_old_params['_25895a']=$_b7ec14_local_params;$_b7ec14_old_vars['_25895a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_25895a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_25895a'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_b7ec14_old_params['_b47fe4']=$_b7ec14_local_params;$_b7ec14_old_vars['_b47fe4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b47fe4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b47fe4'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_b7ec14_old_params['_5ce39c']=$_b7ec14_local_params;$_b7ec14_old_vars['_5ce39c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5ce39c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5ce39c'];?>

                    <?php endif;$c_35185f=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_35185f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_35185f'];?>

                  </div>
                </div>
                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_51368f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_51368f'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_148130=null;$_b7ec14_old_params['_148130']=$_b7ec14_local_params;$_b7ec14_old_vars['_148130']=$_b7ec14_local_vars;$a_148130=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_148130=-1;$r_148130=true;while($r_148130===true):$r_148130=($_148130!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_148130,$c_148130,$this,$r_148130,++$_148130,'_148130');ob_start();?>
<?php $c_148130 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_148130=false;}if($c_148130 ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_b7ec14_old_params['_cd4901']=$_b7ec14_local_params;$_b7ec14_old_vars['_cd4901']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_cd4901'];$_b7ec14_local_vars=$_b7ec14_old_vars['_cd4901'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_148130=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_148130'];$_b7ec14_local_vars=$_b7ec14_old_vars['_148130'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_b7ec14_old_params['_7e5509']=$_b7ec14_local_params;$_b7ec14_old_vars['_7e5509']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7e5509'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7e5509'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_c90a40=null;$_b7ec14_old_params['_c90a40']=$_b7ec14_local_params;$_b7ec14_old_vars['_c90a40']=$_b7ec14_local_vars;$a_c90a40=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_c90a40=-1;$r_c90a40=true;while($r_c90a40===true):$r_c90a40=($_c90a40!==-1)?false:true;echo $this->block_loop($a_c90a40,$c_c90a40,$this,$r_c90a40,++$_c90a40,'_c90a40');ob_start();?>
<?php $c_c90a40 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c90a40=false;}if($c_c90a40 ):?>

                    <?php $_b7ec14_old_params['_5867ba']=$_b7ec14_local_params;$_b7ec14_old_vars['_5867ba']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5867ba'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5867ba'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_b7ec14_old_params['_6f6f3a']=$_b7ec14_local_params;$_b7ec14_old_vars['_6f6f3a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6f6f3a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6f6f3a'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_c90a40=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_c90a40'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c90a40'];?>

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

                              <input type="datetime-local" step="<?php $_b7ec14_old_params['_5934b4']=$_b7ec14_local_params;$_b7ec14_old_vars['_5934b4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5934b4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5934b4'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_b7ec14_old_params['_9500d6']=$_b7ec14_local_params;$_b7ec14_old_vars['_9500d6']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9500d6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9500d6'];?>
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

                            <?php $_b7ec14_old_params['_29eb02']=$_b7ec14_local_params;$_b7ec14_old_vars['_29eb02']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_b7ec14_old_params['_f210ab']=$_b7ec14_local_params;$_b7ec14_old_vars['_f210ab']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f210ab'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f210ab'];?>

                            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_29eb02'];$_b7ec14_local_vars=$_b7ec14_old_vars['_29eb02'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_b7ec14_old_params['_793d23']=$_b7ec14_local_params;$_b7ec14_old_vars['_793d23']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_414b41=null;$_b7ec14_old_params['_414b41']=$_b7ec14_local_params;$_b7ec14_old_vars['_414b41']=$_b7ec14_local_vars;$a_414b41=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_414b41=-1;$r_414b41=true;while($r_414b41===true):$r_414b41=($_414b41!==-1)?false:true;echo $this->block_loop($a_414b41,$c_414b41,$this,$r_414b41,++$_414b41,'_414b41');ob_start();?>
<?php $c_414b41 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_414b41=false;}if($c_414b41 ):?>

                              <?php $_b7ec14_old_params['_931494']=$_b7ec14_local_params;$_b7ec14_old_vars['_931494']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_b7ec14_old_params['_0ba937']=$_b7ec14_local_params;$_b7ec14_old_vars['_0ba937']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0ba937'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0ba937'];?>

                              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_931494'];$_b7ec14_local_vars=$_b7ec14_old_vars['_931494'];?>

                            <?php endif;$c_414b41=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_414b41'];$_b7ec14_local_vars=$_b7ec14_old_vars['_414b41'];?>

                            <?php else:?>

                            <?php $c_5e2bde=null;$_b7ec14_old_params['_5e2bde']=$_b7ec14_local_params;$_b7ec14_old_vars['_5e2bde']=$_b7ec14_local_vars;$a_5e2bde=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_5e2bde=-1;$r_5e2bde=true;while($r_5e2bde===true):$r_5e2bde=($_5e2bde!==-1)?false:true;echo $this->block_loop($a_5e2bde,$c_5e2bde,$this,$r_5e2bde,++$_5e2bde,'_5e2bde');ob_start();?>
<?php $c_5e2bde = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5e2bde=false;}if($c_5e2bde ):?>

                              <?php $_b7ec14_old_params['_6c8409']=$_b7ec14_local_params;$_b7ec14_old_vars['_6c8409']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6c8409'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6c8409'];?>

                            <?php endif;$c_5e2bde=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_5e2bde'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5e2bde'];?>

                            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_793d23'];$_b7ec14_local_vars=$_b7ec14_old_vars['_793d23'];?>

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
            <?php $_b7ec14_old_params['_5701ef']=$_b7ec14_local_params;$_b7ec14_old_vars['_5701ef']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5701ef'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5701ef'];?>

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
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b729ad'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b729ad'];?>

          <?php $_b7ec14_old_params['_d7b633']=$_b7ec14_local_params;$_b7ec14_old_vars['_d7b633']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_b7ec14_old_params['_5aca63']=$_b7ec14_local_params;$_b7ec14_old_vars['_5aca63']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
      <?php $_b7ec14_old_params['_c2181c']=$_b7ec14_local_params;$_b7ec14_old_vars['_c2181c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c2181c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c2181c'];?>

      <?php $_b7ec14_old_params['_6706b3']=$_b7ec14_local_params;$_b7ec14_old_vars['_6706b3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6706b3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6706b3'];?>

      <?php $_b7ec14_old_params['_fc7663']=$_b7ec14_local_params;$_b7ec14_old_vars['_fc7663']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_b7ec14_old_params['_6ecda0']=$_b7ec14_local_params;$_b7ec14_old_vars['_6ecda0']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6ecda0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6ecda0'];?>

          <?php $_b7ec14_old_params['_c76d33']=$_b7ec14_local_params;$_b7ec14_old_vars['_c76d33']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c76d33'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c76d33'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_b7ec14_old_params['_12b579']=$_b7ec14_local_params;$_b7ec14_old_vars['_12b579']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_12b579'];$_b7ec14_local_vars=$_b7ec14_old_vars['_12b579'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_fc7663'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fc7663'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_b7ec14_old_params['_b219d8']=$_b7ec14_local_params;$_b7ec14_old_vars['_b219d8']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_b4d344']=$_b7ec14_local_params;$_b7ec14_old_vars['_b4d344']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_f217ee=null;$_b7ec14_old_params['_f217ee']=$_b7ec14_local_params;$_b7ec14_old_vars['_f217ee']=$_b7ec14_local_vars;$a_f217ee=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_f217ee=-1;$r_f217ee=true;while($r_f217ee===true):$r_f217ee=($_f217ee!==-1)?false:true;echo $this->block_loop($a_f217ee,$c_f217ee,$this,$r_f217ee,++$_f217ee,'_f217ee');ob_start();?>
<?php $c_f217ee = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f217ee=false;}if($c_f217ee ):?>

            <?php $_b7ec14_old_params['_ae5655']=$_b7ec14_local_params;$_b7ec14_old_vars['_ae5655']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ae5655'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ae5655'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_b7ec14_old_params['_21f0b8']=$_b7ec14_local_params;$_b7ec14_old_vars['_21f0b8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_b7ec14_old_params['_4ded94']=$_b7ec14_local_params;$_b7ec14_old_vars['_4ded94']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_4ded94'];$_b7ec14_local_vars=$_b7ec14_old_vars['_4ded94'];?>

                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_21f0b8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_21f0b8'];?>

                <?php $_b7ec14_old_params['_32e5c5']=$_b7ec14_local_params;$_b7ec14_old_vars['_32e5c5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_b7ec14_old_params['_7146be']=$_b7ec14_local_params;$_b7ec14_old_vars['_7146be']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_5401e5']=$_b7ec14_local_params;$_b7ec14_old_vars['_5401e5']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5401e5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5401e5'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7146be'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7146be'];?>

                <?php $_b7ec14_old_params['_db673c']=$_b7ec14_local_params;$_b7ec14_old_vars['_db673c']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_db673c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_db673c'];?>
">
                  <?php $_b7ec14_old_params['_ea084a']=$_b7ec14_local_params;$_b7ec14_old_vars['_ea084a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ea084a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ea084a'];?>

                  <input <?php $_b7ec14_old_params['_c90c1f']=$_b7ec14_local_params;$_b7ec14_old_vars['_c90c1f']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c90c1f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c90c1f'];?>
 <?php $_b7ec14_old_params['_58b614']=$_b7ec14_local_params;$_b7ec14_old_vars['_58b614']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_58b614'];$_b7ec14_local_vars=$_b7ec14_old_vars['_58b614'];?>
<?php $_b7ec14_old_params['_8fb70f']=$_b7ec14_local_params;$_b7ec14_old_vars['_8fb70f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8fb70f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8fb70f'];?>
<?php $_b7ec14_old_params['_5c1ad8']=$_b7ec14_local_params;$_b7ec14_old_vars['_5c1ad8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_f296a7']=$_b7ec14_local_params;$_b7ec14_old_vars['_f296a7']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f296a7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f296a7'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5c1ad8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5c1ad8'];?>
<?php $_b7ec14_old_params['_0592cb']=$_b7ec14_local_params;$_b7ec14_old_vars['_0592cb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0592cb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0592cb'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_b7ec14_old_params['_649544']=$_b7ec14_local_params;$_b7ec14_old_vars['_649544']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_649544'];$_b7ec14_local_vars=$_b7ec14_old_vars['_649544'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_32e5c5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_32e5c5'];?>

            <?php $_b7ec14_old_params['_241360']=$_b7ec14_local_params;$_b7ec14_old_vars['_241360']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_241360'];$_b7ec14_local_vars=$_b7ec14_old_vars['_241360'];?>

            <?php endif;$c_f217ee=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_f217ee'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f217ee'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b4d344'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b4d344'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b219d8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b219d8'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_b7ec14_old_params['_607407']=$_b7ec14_local_params;$_b7ec14_old_vars['_607407']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_319921=null;$_b7ec14_old_params['_319921']=$_b7ec14_local_params;$_b7ec14_old_vars['_319921']=$_b7ec14_local_vars;$a_319921=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_319921=-1;$r_319921=true;while($r_319921===true):$r_319921=($_319921!==-1)?false:true;echo $this->block_loop($a_319921,$c_319921,$this,$r_319921,++$_319921,'_319921');ob_start();?>
<?php $c_319921 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_319921=false;}if($c_319921 ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_b7ec14_old_params['_e8b725']=$_b7ec14_local_params;$_b7ec14_old_vars['_e8b725']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e8b725'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e8b725'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_319921=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_319921'];$_b7ec14_local_vars=$_b7ec14_old_vars['_319921'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_b7ec14_old_params['_6cdb39']=$_b7ec14_local_params;$_b7ec14_old_vars['_6cdb39']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6cdb39'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6cdb39'];?>
<?php $_b7ec14_old_params['_d00067']=$_b7ec14_local_params;$_b7ec14_old_vars['_d00067']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d00067'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d00067'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_b7ec14_old_params['_2133ac']=$_b7ec14_local_params;$_b7ec14_old_vars['_2133ac']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2133ac'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2133ac'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_b7ec14_old_params['_f9d930']=$_b7ec14_local_params;$_b7ec14_old_vars['_f9d930']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f9d930'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f9d930'];?>
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
                  <input type="checkbox" <?php $_b7ec14_old_params['_598d3a']=$_b7ec14_local_params;$_b7ec14_old_vars['_598d3a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_598d3a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_598d3a'];?>
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
                  <input class="custom-control-input" type="radio" <?php $_b7ec14_old_params['_eb9f61']=$_b7ec14_local_params;$_b7ec14_old_vars['_eb9f61']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_eb9f61'];$_b7ec14_local_vars=$_b7ec14_old_vars['_eb9f61'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_b7ec14_old_params['_1b461d']=$_b7ec14_local_params;$_b7ec14_old_vars['_1b461d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1b461d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1b461d'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_607407'];$_b7ec14_local_vars=$_b7ec14_old_vars['_607407'];?>

            <div class="row form-group">
              <?php $c_8acd64=null;$_b7ec14_old_params['_8acd64']=$_b7ec14_local_params;$_b7ec14_old_vars['_8acd64']=$_b7ec14_local_vars;$a_8acd64=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_8acd64=-1;$r_8acd64=true;while($r_8acd64===true):$r_8acd64=($_8acd64!==-1)?false:true;echo $this->block_loop($a_8acd64,$c_8acd64,$this,$r_8acd64,++$_8acd64,'_8acd64');ob_start();?>
<?php $c_8acd64 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8acd64=false;}if($c_8acd64 ):?>

              <?php $_b7ec14_old_params['_387914']=$_b7ec14_local_params;$_b7ec14_old_vars['_387914']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_387914'];$_b7ec14_local_vars=$_b7ec14_old_vars['_387914'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_b7ec14_old_params['_10a122']=$_b7ec14_local_params;$_b7ec14_old_vars['_10a122']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_10a122'];$_b7ec14_local_vars=$_b7ec14_old_vars['_10a122'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_b7ec14_old_params['_05de32']=$_b7ec14_local_params;$_b7ec14_old_vars['_05de32']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_c8ddb8=null;$_b7ec14_old_params['_c8ddb8']=$_b7ec14_local_params;$_b7ec14_old_vars['_c8ddb8']=$_b7ec14_local_vars;$a_c8ddb8=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_c8ddb8=-1;$r_c8ddb8=true;while($r_c8ddb8===true):$r_c8ddb8=($_c8ddb8!==-1)?false:true;echo $this->block_loop($a_c8ddb8,$c_c8ddb8,$this,$r_c8ddb8,++$_c8ddb8,'_c8ddb8');ob_start();?>
<?php $c_c8ddb8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c8ddb8=false;}if($c_c8ddb8 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_b7ec14_old_params['_0d3f72']=$_b7ec14_local_params;$_b7ec14_old_vars['_0d3f72']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0d3f72'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0d3f72'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_c8ddb8=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_c8ddb8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c8ddb8'];?>

                </select>
              </div>
              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_05de32'];$_b7ec14_local_vars=$_b7ec14_old_vars['_05de32'];?>

              <?php endif;$c_8acd64=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_8acd64'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8acd64'];?>

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

<?php $_b7ec14_old_params['_4a35a8']=$_b7ec14_local_params;$_b7ec14_old_vars['_4a35a8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_4a35a8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_4a35a8'];?>

<?php $_b7ec14_old_params['_55b642']=$_b7ec14_local_params;$_b7ec14_old_vars['_55b642']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
      <?php $_b7ec14_old_params['_6fe236']=$_b7ec14_local_params;$_b7ec14_old_vars['_6fe236']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6fe236'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6fe236'];?>

    }
});
</script>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_55b642'];$_b7ec14_local_vars=$_b7ec14_old_vars['_55b642'];?>

<?php endif;$_5aca63=ob_get_clean();echo $this->modifier_trim_space($_5aca63,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_b7ec14_local_params=$_b7ec14_old_params['_5aca63'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5aca63'];?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d7b633'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d7b633'];?>

            <?php $_b7ec14_old_params['_80a1d6']=$_b7ec14_local_params;$_b7ec14_old_vars['_80a1d6']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_b7ec14_old_params['_57fb0e']=$_b7ec14_local_params;$_b7ec14_old_vars['_57fb0e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_57fb0e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_57fb0e'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_b7ec14_old_params['_92f8e7']=$_b7ec14_local_params;$_b7ec14_old_vars['_92f8e7']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_92f8e7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_92f8e7'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_b7ec14_old_params['_a7eb13']=$_b7ec14_local_params;$_b7ec14_old_vars['_a7eb13']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_fcadc1=null;$_b7ec14_old_params['_fcadc1']=$_b7ec14_local_params;$_b7ec14_old_vars['_fcadc1']=$_b7ec14_local_vars;$a_fcadc1=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_fcadc1=-1;$r_fcadc1=true;while($r_fcadc1===true):$r_fcadc1=($_fcadc1!==-1)?false:true;echo $this->block_loop($a_fcadc1,$c_fcadc1,$this,$r_fcadc1,++$_fcadc1,'_fcadc1');ob_start();?>
<?php $c_fcadc1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fcadc1=false;}if($c_fcadc1 ):?>

                    <?php $_b7ec14_old_params['_e9014b']=$_b7ec14_local_params;$_b7ec14_old_vars['_e9014b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e9014b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e9014b'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_b7ec14_old_params['_8c0875']=$_b7ec14_local_params;$_b7ec14_old_vars['_8c0875']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8c0875'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8c0875'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_b7ec14_old_params['_676424']=$_b7ec14_local_params;$_b7ec14_old_vars['_676424']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_676424'];$_b7ec14_local_vars=$_b7ec14_old_vars['_676424'];?>

                  <?php endif;$c_fcadc1=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_fcadc1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fcadc1'];?>

                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a7eb13'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a7eb13'];?>

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

<?php $_b7ec14_old_params['_1ebc0a']=$_b7ec14_local_params;$_b7ec14_old_vars['_1ebc0a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1ebc0a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1ebc0a'];?>

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
?<?php $_b7ec14_old_params['_736e3a']=$_b7ec14_local_params;$_b7ec14_old_vars['_736e3a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_736e3a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_736e3a'];?>
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
$('#drop-zone').css('border','3px dashed <?php $_b7ec14_old_params['_4cb183']=$_b7ec14_local_params;$_b7ec14_old_vars['_4cb183']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_4cb183'];$_b7ec14_local_vars=$_b7ec14_old_vars['_4cb183'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_b7ec14_old_params['_f3ce45']=$_b7ec14_local_params;$_b7ec14_old_vars['_f3ce45']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f3ce45'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f3ce45'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_b7ec14_old_params['_cc293b']=$_b7ec14_local_params;$_b7ec14_old_vars['_cc293b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_cc293b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_cc293b'];?>
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
    <?php $_b7ec14_old_params['_9e684c']=$_b7ec14_local_params;$_b7ec14_old_vars['_9e684c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9e684c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9e684c'];?>

}
</script>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_80a1d6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_80a1d6'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_98a468'];$_b7ec14_local_vars=$_b7ec14_old_vars['_98a468'];?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_572a30']=$_b7ec14_local_params;$_b7ec14_old_vars['_572a30']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_b7ec14_old_params['_60d336']=$_b7ec14_local_params;$_b7ec14_old_vars['_60d336']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_b7ec14_old_params['_2aec94']=$_b7ec14_local_params;$_b7ec14_old_vars['_2aec94']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2aec94'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2aec94'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_b7ec14_old_params['_d57137']=$_b7ec14_local_params;$_b7ec14_old_vars['_d57137']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_0bf748=null;$_b7ec14_old_params['_0bf748']=$_b7ec14_local_params;$_b7ec14_old_vars['_0bf748']=$_b7ec14_local_vars;$a_0bf748=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_0bf748=-1;$r_0bf748=true;while($r_0bf748===true):$r_0bf748=($_0bf748!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_0bf748,$c_0bf748,$this,$r_0bf748,++$_0bf748,'_0bf748');ob_start();?>
<?php $c_0bf748 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0bf748=false;}if($c_0bf748 ):?>

              <?php $_b7ec14_old_params['_ecf3fb']=$_b7ec14_local_params;$_b7ec14_old_vars['_ecf3fb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_b7ec14_old_params['_3efed3']=$_b7ec14_local_params;$_b7ec14_old_vars['_3efed3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_b7ec14_old_params['_a078a3']=$_b7ec14_local_params;$_b7ec14_old_vars['_a078a3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_b7ec14_old_params['_1493d6']=$_b7ec14_local_params;$_b7ec14_old_vars['_1493d6']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_b7ec14_old_params['_a97626']=$_b7ec14_local_params;$_b7ec14_old_vars['_a97626']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a97626'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a97626'];?>

                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1493d6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1493d6'];?>

                  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a078a3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a078a3'];?>

                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_3efed3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_3efed3'];?>

                <?php $_b7ec14_old_params['_2e7575']=$_b7ec14_local_params;$_b7ec14_old_vars['_2e7575']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_b7ec14_old_params['_a82d37']=$_b7ec14_local_params;$_b7ec14_old_vars['_a82d37']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a82d37'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a82d37'];?>

                  <?php $_b7ec14_old_params['_d0b65d']=$_b7ec14_local_params;$_b7ec14_old_vars['_d0b65d']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d0b65d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d0b65d'];?>

                  <label class="edit-options-child <?php $_b7ec14_old_params['_d1d291']=$_b7ec14_local_params;$_b7ec14_old_vars['_d1d291']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d1d291'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d1d291'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_b7ec14_old_params['_41cb64']=$_b7ec14_local_params;$_b7ec14_old_vars['_41cb64']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_41cb64'];$_b7ec14_local_vars=$_b7ec14_old_vars['_41cb64'];?>

                    <input<?php $_b7ec14_old_params['_85d7af']=$_b7ec14_local_params;$_b7ec14_old_vars['_85d7af']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_b7ec14_old_params['_b07c0e']=$_b7ec14_local_params;$_b7ec14_old_vars['_b07c0e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_b7ec14_old_params['_bee4b1']=$_b7ec14_local_params;$_b7ec14_old_vars['_bee4b1']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_bee4b1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_bee4b1'];?>

                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b07c0e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b07c0e'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_85d7af'];$_b7ec14_local_vars=$_b7ec14_old_vars['_85d7af'];?>
<?php $_b7ec14_old_params['_0a8228']=$_b7ec14_local_params;$_b7ec14_old_vars['_0a8228']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0a8228'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0a8228'];?>
 type="<?php $_b7ec14_old_params['_08dc0e']=$_b7ec14_local_params;$_b7ec14_old_vars['_08dc0e']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_08dc0e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_08dc0e'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_b7ec14_old_params['_d56119']=$_b7ec14_local_params;$_b7ec14_old_vars['_d56119']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d56119'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d56119'];?>
<?php $_b7ec14_old_params['_33325f']=$_b7ec14_local_params;$_b7ec14_old_vars['_33325f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_33325f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_33325f'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2e7575'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2e7575'];?>

              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ecf3fb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ecf3fb'];?>

            <?php endif;$c_0bf748=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_0bf748'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0bf748'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d57137'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d57137'];?>

                <?php $c_9633ca=null;$_b7ec14_old_params['_9633ca']=$_b7ec14_local_params;$_b7ec14_old_vars['_9633ca']=$_b7ec14_local_vars;$a_9633ca=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_9633ca=-1;$r_9633ca=true;while($r_9633ca===true):$r_9633ca=($_9633ca!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_9633ca,$c_9633ca,$this,$r_9633ca,++$_9633ca,'_9633ca');ob_start();?>
<?php $c_9633ca = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9633ca=false;}if($c_9633ca ):?>

                <?php $c_55e5ac=null;$_b7ec14_old_params['_55e5ac']=$_b7ec14_local_params;$_b7ec14_old_vars['_55e5ac']=$_b7ec14_local_vars;$a_55e5ac=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_55e5ac=ob_get_clean();$c_55e5ac=$this->block_setvarblock($a_55e5ac,$c_55e5ac,$this,$r_55e5ac,1,'_55e5ac');echo($c_55e5ac); $_b7ec14_local_params=$_b7ec14_old_params['_55e5ac'];?>

                <label class="<?php $_b7ec14_old_params['_5fff4f']=$_b7ec14_local_params;$_b7ec14_old_vars['_5fff4f']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5fff4f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5fff4f'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_b7ec14_old_params['_3b3ffb']=$_b7ec14_local_params;$_b7ec14_old_vars['_3b3ffb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_3b3ffb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_3b3ffb'];?>

                  <?php $_b7ec14_old_params['_729492']=$_b7ec14_local_params;$_b7ec14_old_vars['_729492']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_729492'];$_b7ec14_local_vars=$_b7ec14_old_vars['_729492'];?>

                  <?php $_b7ec14_old_params['_9de799']=$_b7ec14_local_params;$_b7ec14_old_vars['_9de799']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9de799'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9de799'];?>
 <?php $_b7ec14_old_params['_00bdcb']=$_b7ec14_local_params;$_b7ec14_old_vars['_00bdcb']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_00bdcb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_00bdcb'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_b7ec14_old_params['_ac41b7']=$_b7ec14_local_params;$_b7ec14_old_vars['_ac41b7']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ac41b7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ac41b7'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_9633ca=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_9633ca'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9633ca'];?>

              <?php $_b7ec14_old_params['_d11033']=$_b7ec14_local_params;$_b7ec14_old_vars['_d11033']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d11033'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d11033'];?>

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
<?php endif;$_60d336=ob_get_clean();echo $this->modifier_trim_space($_60d336,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_b7ec14_local_params=$_b7ec14_old_params['_60d336'];$_b7ec14_local_vars=$_b7ec14_old_vars['_60d336'];?>

<script>
<?php $_b7ec14_old_params['_6ce508']=$_b7ec14_local_params;$_b7ec14_old_vars['_6ce508']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6ce508'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6ce508'];?>

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

<?php $_b7ec14_old_params['_7a19ed']=$_b7ec14_local_params;$_b7ec14_old_vars['_7a19ed']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7a19ed'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7a19ed'];?>

    }
    updateFieldSelector();
});
</script>
            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_572a30'];$_b7ec14_local_vars=$_b7ec14_old_vars['_572a30'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a1dd52'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a1dd52'];?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0e31b2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0e31b2'];?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c9e1e4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c9e1e4'];?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_fd458a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fd458a'];?>

  <?php $_b7ec14_old_params['_77c6ab']=$_b7ec14_local_params;$_b7ec14_old_vars['_77c6ab']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    
    <?php $_b7ec14_old_params['_6b50e6']=$_b7ec14_local_params;$_b7ec14_old_vars['_6b50e6']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php ob_start();$_b7ec14_old_params['_ecb07b']=$_b7ec14_local_params;$_b7ec14_old_vars['_ecb07b']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_b7ec14_old_params['_00ac41']=$_b7ec14_local_params;$_b7ec14_old_vars['_00ac41']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_00ac41'];$_b7ec14_local_vars=$_b7ec14_old_vars['_00ac41'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_b7ec14_old_params['_40ad32']=$_b7ec14_local_params;$_b7ec14_old_vars['_40ad32']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_d26c81=null;$_b7ec14_old_params['_d26c81']=$_b7ec14_local_params;$_b7ec14_old_vars['_d26c81']=$_b7ec14_local_vars;$a_d26c81=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_d26c81=-1;$r_d26c81=true;while($r_d26c81===true):$r_d26c81=($_d26c81!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_d26c81,$c_d26c81,$this,$r_d26c81,++$_d26c81,'_d26c81');ob_start();?>
<?php $c_d26c81 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d26c81=false;}if($c_d26c81 ):?>

              <?php $_b7ec14_old_params['_acb130']=$_b7ec14_local_params;$_b7ec14_old_vars['_acb130']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_b7ec14_old_params['_b5ad5d']=$_b7ec14_local_params;$_b7ec14_old_vars['_b5ad5d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_b7ec14_old_params['_c8c8cb']=$_b7ec14_local_params;$_b7ec14_old_vars['_c8c8cb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_b7ec14_old_params['_0daaca']=$_b7ec14_local_params;$_b7ec14_old_vars['_0daaca']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_b7ec14_old_params['_f45dc5']=$_b7ec14_local_params;$_b7ec14_old_vars['_f45dc5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f45dc5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f45dc5'];?>

                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0daaca'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0daaca'];?>

                  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c8c8cb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c8c8cb'];?>

                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b5ad5d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b5ad5d'];?>

                <?php $_b7ec14_old_params['_b539c1']=$_b7ec14_local_params;$_b7ec14_old_vars['_b539c1']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_b7ec14_old_params['_c12088']=$_b7ec14_local_params;$_b7ec14_old_vars['_c12088']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c12088'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c12088'];?>

                  <?php $_b7ec14_old_params['_5d684a']=$_b7ec14_local_params;$_b7ec14_old_vars['_5d684a']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5d684a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5d684a'];?>

                  <label class="edit-options-child <?php $_b7ec14_old_params['_69659c']=$_b7ec14_local_params;$_b7ec14_old_vars['_69659c']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_69659c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_69659c'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_b7ec14_old_params['_13a528']=$_b7ec14_local_params;$_b7ec14_old_vars['_13a528']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_13a528'];$_b7ec14_local_vars=$_b7ec14_old_vars['_13a528'];?>

                    <input<?php $_b7ec14_old_params['_5f5538']=$_b7ec14_local_params;$_b7ec14_old_vars['_5f5538']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_b7ec14_old_params['_71be12']=$_b7ec14_local_params;$_b7ec14_old_vars['_71be12']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_b7ec14_old_params['_1f81e3']=$_b7ec14_local_params;$_b7ec14_old_vars['_1f81e3']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1f81e3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1f81e3'];?>

                    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_71be12'];$_b7ec14_local_vars=$_b7ec14_old_vars['_71be12'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5f5538'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5f5538'];?>
<?php $_b7ec14_old_params['_438867']=$_b7ec14_local_params;$_b7ec14_old_vars['_438867']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_438867'];$_b7ec14_local_vars=$_b7ec14_old_vars['_438867'];?>
 type="<?php $_b7ec14_old_params['_8caa39']=$_b7ec14_local_params;$_b7ec14_old_vars['_8caa39']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8caa39'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8caa39'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_b7ec14_old_params['_b069c7']=$_b7ec14_local_params;$_b7ec14_old_vars['_b069c7']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b069c7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b069c7'];?>
<?php $_b7ec14_old_params['_b57b79']=$_b7ec14_local_params;$_b7ec14_old_vars['_b57b79']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b57b79'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b57b79'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b539c1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b539c1'];?>

              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_acb130'];$_b7ec14_local_vars=$_b7ec14_old_vars['_acb130'];?>

            <?php endif;$c_d26c81=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_d26c81'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d26c81'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_40ad32'];$_b7ec14_local_vars=$_b7ec14_old_vars['_40ad32'];?>

                <?php $c_8b5c38=null;$_b7ec14_old_params['_8b5c38']=$_b7ec14_local_params;$_b7ec14_old_vars['_8b5c38']=$_b7ec14_local_vars;$a_8b5c38=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_8b5c38=-1;$r_8b5c38=true;while($r_8b5c38===true):$r_8b5c38=($_8b5c38!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_8b5c38,$c_8b5c38,$this,$r_8b5c38,++$_8b5c38,'_8b5c38');ob_start();?>
<?php $c_8b5c38 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8b5c38=false;}if($c_8b5c38 ):?>

                <?php $c_c8b41e=null;$_b7ec14_old_params['_c8b41e']=$_b7ec14_local_params;$_b7ec14_old_vars['_c8b41e']=$_b7ec14_local_vars;$a_c8b41e=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_c8b41e=ob_get_clean();$c_c8b41e=$this->block_setvarblock($a_c8b41e,$c_c8b41e,$this,$r_c8b41e,1,'_c8b41e');echo($c_c8b41e); $_b7ec14_local_params=$_b7ec14_old_params['_c8b41e'];?>

                <label class="<?php $_b7ec14_old_params['_9e1b65']=$_b7ec14_local_params;$_b7ec14_old_vars['_9e1b65']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9e1b65'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9e1b65'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_b7ec14_old_params['_a33435']=$_b7ec14_local_params;$_b7ec14_old_vars['_a33435']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a33435'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a33435'];?>

                  <?php $_b7ec14_old_params['_cc655a']=$_b7ec14_local_params;$_b7ec14_old_vars['_cc655a']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_cc655a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_cc655a'];?>

                  <?php $_b7ec14_old_params['_dc099e']=$_b7ec14_local_params;$_b7ec14_old_vars['_dc099e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_dc099e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_dc099e'];?>
 <?php $_b7ec14_old_params['_04264e']=$_b7ec14_local_params;$_b7ec14_old_vars['_04264e']=$_b7ec14_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_04264e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_04264e'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_b7ec14_old_params['_7a1f13']=$_b7ec14_local_params;$_b7ec14_old_vars['_7a1f13']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7a1f13'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7a1f13'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_8b5c38=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_8b5c38'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8b5c38'];?>

              <?php $_b7ec14_old_params['_f2ac16']=$_b7ec14_local_params;$_b7ec14_old_vars['_f2ac16']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f2ac16'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f2ac16'];?>

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
<?php endif;$_ecb07b=ob_get_clean();echo $this->modifier_trim_space($_ecb07b,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_b7ec14_local_params=$_b7ec14_old_params['_ecb07b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ecb07b'];?>

<script>
<?php $_b7ec14_old_params['_c4de4a']=$_b7ec14_local_params;$_b7ec14_old_vars['_c4de4a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c4de4a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c4de4a'];?>

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

<?php $_b7ec14_old_params['_cb1af2']=$_b7ec14_local_params;$_b7ec14_old_vars['_cb1af2']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_cb1af2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_cb1af2'];?>

    }
    updateFieldSelector();
});
</script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6b50e6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6b50e6'];?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_77c6ab'];$_b7ec14_local_vars=$_b7ec14_old_vars['_77c6ab'];?>

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
<?php $_b7ec14_old_params['_a13cf8']=$_b7ec14_local_params;$_b7ec14_old_vars['_a13cf8']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'output_container','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="container-fluid">
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a13cf8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a13cf8'];?>

      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 id="page-title" <?php $_b7ec14_old_params['_dfc307']=$_b7ec14_local_params;$_b7ec14_old_vars['_dfc307']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_b5e7ff']=$_b7ec14_local_params;$_b7ec14_old_vars['_b5e7ff']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_2941aa']=$_b7ec14_local_params;$_b7ec14_old_vars['_2941aa']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-top:-33px"<?php else:?>
style="margin-top:-36px"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2941aa'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2941aa'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b5e7ff'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b5e7ff'];?>
 class="title-with-opt"<?php else:?>
 <?php $_b7ec14_old_params['_d0558f']=$_b7ec14_local_params;$_b7ec14_old_vars['_d0558f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_205829']=$_b7ec14_local_params;$_b7ec14_old_vars['_205829']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="margin-top:-3px"<?php else:?>
style="margin-top:-11px"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_205829'];$_b7ec14_local_vars=$_b7ec14_old_vars['_205829'];?>
<?php else:?>
style="margin-top:-10px"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d0558f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d0558f'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_dfc307'];$_b7ec14_local_vars=$_b7ec14_old_vars['_dfc307'];?>
>
          <span class="title">
          <?php $_b7ec14_old_params['_8d5547']=$_b7ec14_local_params;$_b7ec14_old_vars['_8d5547']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_1a562c']=$_b7ec14_local_params;$_b7ec14_old_vars['_1a562c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_b7ec14_old_params['_e224ff']=$_b7ec14_local_params;$_b7ec14_old_vars['_e224ff']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.revision_select','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e224ff'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e224ff'];?>
"><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1a562c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1a562c'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8d5547'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8d5547'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
<?php $_b7ec14_old_params['_d06bd8']=$_b7ec14_local_params;$_b7ec14_old_vars['_d06bd8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_7a436d']=$_b7ec14_local_params;$_b7ec14_old_vars['_7a436d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7a436d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7a436d'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d06bd8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d06bd8'];?>

          </span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

      <?php $_b7ec14_old_params['_746fa9']=$_b7ec14_local_params;$_b7ec14_old_vars['_746fa9']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_b7ec14_old_params['_7b8007']=$_b7ec14_local_params;$_b7ec14_old_vars['_7b8007']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_b7ec14_old_params['_83597d']=$_b7ec14_local_params;$_b7ec14_old_vars['_83597d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_e2b77b']=$_b7ec14_local_params;$_b7ec14_old_vars['_e2b77b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_a0c838']=$_b7ec14_local_params;$_b7ec14_old_vars['_a0c838']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_94d9a7']=$_b7ec14_local_params;$_b7ec14_old_vars['_94d9a7']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_94d9a7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_94d9a7'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a0c838'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a0c838'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e2b77b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e2b77b'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_83597d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_83597d'];?>

        <?php $_b7ec14_old_params['_557dc7']=$_b7ec14_local_params;$_b7ec14_old_vars['_557dc7']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_create','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_6f99e9']=$_b7ec14_local_params;$_b7ec14_old_vars['_6f99e9']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_b7ec14_old_params['_6d03c4']=$_b7ec14_local_params;$_b7ec14_old_vars['_6d03c4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_b7ec14_old_params['_ff0236']=$_b7ec14_local_params;$_b7ec14_old_vars['_ff0236']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ff0236'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ff0236'];?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6d03c4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6d03c4'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6f99e9'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6f99e9'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_557dc7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_557dc7'];?>

        <?php $_b7ec14_old_params['_15c12f']=$_b7ec14_local_params;$_b7ec14_old_vars['_15c12f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_d1cacb']=$_b7ec14_local_params;$_b7ec14_old_vars['_d1cacb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_b7ec14_old_params['_5409c5']=$_b7ec14_local_params;$_b7ec14_old_vars['_5409c5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'orig_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('orig_label','setvar',$this),$this,'setvar')?>

              <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Syetem\'s Role','setvar'=>'label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_5409c5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_5409c5'];?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_b7ec14_old_params['_d1c9d3']=$_b7ec14_local_params;$_b7ec14_old_vars['_d1c9d3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_d1d765']=$_b7ec14_local_params;$_b7ec14_old_vars['_d1d765']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d1d765'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d1d765'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d1c9d3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d1c9d3'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_b7ec14_old_params['_9427db']=$_b7ec14_local_params;$_b7ec14_old_vars['_9427db']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9427db'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9427db'];?>

            <?php $_b7ec14_old_params['_c830aa']=$_b7ec14_local_params;$_b7ec14_old_vars['_c830aa']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_42ce46']=$_b7ec14_local_params;$_b7ec14_old_vars['_42ce46']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_42ce46'];$_b7ec14_local_vars=$_b7ec14_old_vars['_42ce46'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c830aa'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c830aa'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d1cacb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d1cacb'];?>

          <?php $_b7ec14_old_params['_733f21']=$_b7ec14_local_params;$_b7ec14_old_vars['_733f21']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_b7ec14_old_params['_24b006']=$_b7ec14_local_params;$_b7ec14_old_vars['_24b006']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_b7ec14_old_params['_f21ba2']=$_b7ec14_local_params;$_b7ec14_old_vars['_f21ba2']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_72ad2a']=$_b7ec14_local_params;$_b7ec14_old_vars['_72ad2a']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_9a8a23']=$_b7ec14_local_params;$_b7ec14_old_vars['_9a8a23']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9a8a23'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9a8a23'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_72ad2a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_72ad2a'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f21ba2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f21ba2'];?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_24b006'];$_b7ec14_local_vars=$_b7ec14_old_vars['_24b006'];?>

            <?php $_b7ec14_old_params['_0574f4']=$_b7ec14_local_params;$_b7ec14_old_vars['_0574f4']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_b7ec14_old_params['_f334a3']=$_b7ec14_local_params;$_b7ec14_old_vars['_f334a3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_b7ec14_old_params['_7f7f2b']=$_b7ec14_local_params;$_b7ec14_old_vars['_7f7f2b']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_6e696a']=$_b7ec14_local_params;$_b7ec14_old_vars['_6e696a']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6e696a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6e696a'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7f7f2b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7f7f2b'];?>

            <?php else:?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_b7ec14_old_params['_c8f750']=$_b7ec14_local_params;$_b7ec14_old_vars['_c8f750']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c8f750'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c8f750'];?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_b7ec14_old_params['_abee71']=$_b7ec14_local_params;$_b7ec14_old_vars['_abee71']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_33dc56']=$_b7ec14_local_params;$_b7ec14_old_vars['_33dc56']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_33dc56'];$_b7ec14_local_vars=$_b7ec14_old_vars['_33dc56'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_abee71'];$_b7ec14_local_vars=$_b7ec14_old_vars['_abee71'];?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f334a3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f334a3'];?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0574f4'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0574f4'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_733f21'];$_b7ec14_local_vars=$_b7ec14_old_vars['_733f21'];?>

          <?php $_b7ec14_old_params['_b6818c']=$_b7ec14_local_params;$_b7ec14_old_vars['_b6818c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_b7ec14_old_params['_1f0e1b']=$_b7ec14_local_params;$_b7ec14_old_vars['_1f0e1b']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_b7ec14_old_params['_f721c3']=$_b7ec14_local_params;$_b7ec14_old_vars['_f721c3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f721c3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f721c3'];?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1f0e1b'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1f0e1b'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b6818c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b6818c'];?>

        <?php else:?>

          <?php $_b7ec14_old_params['_00cb59']=$_b7ec14_local_params;$_b7ec14_old_vars['_00cb59']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_b7ec14_old_params['_1369c5']=$_b7ec14_local_params;$_b7ec14_old_vars['_1369c5']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1369c5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1369c5'];?>

            <?php $_b7ec14_old_params['_2c37db']=$_b7ec14_local_params;$_b7ec14_old_vars['_2c37db']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','eq'=>'comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2c37db'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2c37db'];?>

            <?php $_b7ec14_old_params['_d18849']=$_b7ec14_local_params;$_b7ec14_old_vars['_d18849']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_return_to_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d18849'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d18849'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_00cb59'];$_b7ec14_local_vars=$_b7ec14_old_vars['_00cb59'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_15c12f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_15c12f'];?>

          <?php $_b7ec14_old_params['_9fc37c']=$_b7ec14_local_params;$_b7ec14_old_vars['_9fc37c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9fc37c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9fc37c'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7b8007'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7b8007'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_746fa9'];$_b7ec14_local_vars=$_b7ec14_old_vars['_746fa9'];?>

      <?php $_b7ec14_old_params['_be98f9']=$_b7ec14_local_params;$_b7ec14_old_vars['_be98f9']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_b7ec14_old_params['_f1202a']=$_b7ec14_local_params;$_b7ec14_old_vars['_f1202a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_4a4353']=$_b7ec14_local_params;$_b7ec14_old_vars['_4a4353']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_b7ec14_old_params['_754d1e']=$_b7ec14_local_params;$_b7ec14_old_vars['_754d1e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

          <?php $_b7ec14_old_params['_7c6023']=$_b7ec14_local_params;$_b7ec14_old_vars['_7c6023']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;manage_revision=1">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Revision','this_tag'=>'trans'],null,$this),$this)?>

          </a>
          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7c6023'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7c6023'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_754d1e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_754d1e'];?>

          <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_4a4353'];$_b7ec14_local_vars=$_b7ec14_old_vars['_4a4353'];?>

        <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f1202a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f1202a'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_be98f9'];$_b7ec14_local_vars=$_b7ec14_old_vars['_be98f9'];?>

      <?php $_b7ec14_old_params['_94a0e8']=$_b7ec14_local_params;$_b7ec14_old_vars['_94a0e8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_b7ec14_old_params['_f4b0e2']=$_b7ec14_local_params;$_b7ec14_old_vars['_f4b0e2']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_b7ec14_old_params['_a59cb3']=$_b7ec14_local_params;$_b7ec14_old_vars['_a59cb3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="btn btn-sm header-btn-icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="hidden fa fa-home" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
"></i>
          <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </a>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a59cb3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a59cb3'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f4b0e2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f4b0e2'];?>

      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_94a0e8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_94a0e8'];?>

          </h1>
    <?php $c_03a792=null;$_b7ec14_old_params['_03a792']=$_b7ec14_local_params;$_b7ec14_old_vars['_03a792']=$_b7ec14_local_vars;$a_03a792=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_03a792=ob_get_clean();$c_03a792=$this->block_setvarblock($a_03a792,$c_03a792,$this,$r_03a792,1,'_03a792');echo($c_03a792); $_b7ec14_local_params=$_b7ec14_old_params['_03a792'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_b7ec14_old_params['_ac7d3a']=$_b7ec14_local_params;$_b7ec14_old_vars['_ac7d3a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-<?php $_b7ec14_old_params['_3bff1c']=$_b7ec14_local_params;$_b7ec14_old_vars['_3bff1c']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_class','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'header_alert_class','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
success<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_3bff1c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_3bff1c'];?>
" tabindex="0">
      <?php $_b7ec14_old_params['_aae94c']=$_b7ec14_local_params;$_b7ec14_old_vars['_aae94c']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'header_alert_force','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_aae94c'];$_b7ec14_local_vars=$_b7ec14_old_vars['_aae94c'];?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

      <?php $_b7ec14_old_params['_a82113']=$_b7ec14_local_params;$_b7ec14_old_vars['_a82113']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_b7ec14_old_params['_090825']=$_b7ec14_local_params;$_b7ec14_old_vars['_090825']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_090825'];$_b7ec14_local_vars=$_b7ec14_old_vars['_090825'];?>
" class="popup">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

        </a>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a82113'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a82113'];?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ac7d3a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ac7d3a'];?>

    <?php $_b7ec14_old_params['_2f60e5']=$_b7ec14_local_params;$_b7ec14_old_vars['_2f60e5']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2f60e5'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2f60e5'];?>

<?php $_b7ec14_old_params['_fe4de9']=$_b7ec14_local_params;$_b7ec14_old_vars['_fe4de9']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_info_content','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_var($this->setup_args(['name'=>'system_info_content','this_tag'=>'var'],null,$this),$this)?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_fe4de9'];$_b7ec14_local_vars=$_b7ec14_old_vars['_fe4de9'];?>

<?php $_b7ec14_old_params['_89960a']=$_b7ec14_local_params;$_b7ec14_old_vars['_89960a']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_b7ec14_old_params['_7ce43e']=$_b7ec14_local_params;$_b7ec14_old_vars['_7ce43e']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'activation_code','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_b7ec14_old_params['_c8a21a']=$_b7ec14_local_params;$_b7ec14_old_vars['_c8a21a']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['workspace_id'=>'0','this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

      <div style="margin-bottom:28px" id="header-activation-message" class="alert alert-warning" role="alert" tabindex="0">
        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the your activation code.','this_tag'=>'trans'],null,$this),$this)?>
</a>
      </div>
    <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c8a21a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c8a21a'];?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_7ce43e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_7ce43e'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_89960a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_89960a'];?>

<?php $c_45462a=null;$_b7ec14_old_params['_45462a']=$_b7ec14_local_params;$_b7ec14_old_vars['_45462a']=$_b7ec14_local_vars;$a_45462a=$this->setup_args(['name'=>'disabled_widgets','this_tag'=>'loop'],null,$this);$_45462a=-1;$r_45462a=true;while($r_45462a===true):$r_45462a=($_45462a!==-1)?false:true;echo $this->block_loop($a_45462a,$c_45462a,$this,$r_45462a,++$_45462a,'_45462a');ob_start();?>
<?php $c_45462a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_45462a=false;}if($c_45462a ):?>

<?php $_b7ec14_old_params['_2bd6ea']=$_b7ec14_local_params;$_b7ec14_old_vars['_2bd6ea']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="selector-small" style="<?php $_b7ec14_old_params['_8fddaf']=$_b7ec14_local_params;$_b7ec14_old_vars['_8fddaf']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_rebuild_all','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
margin-right:44px;<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8fddaf'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8fddaf'];?>
">
<form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="add-widget-form">
<input type="hidden" name="__mode" value="update_dashboard">
<input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
<input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
<input type="hidden" name="_type" value="add">
<select name="name" id="widget-selecter" class="form-control form-control-sm custom-select"
  style="margin-top:1px;">
<option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a Widget...','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2bd6ea'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2bd6ea'];?>

<option value="widget-<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
</option>
<?php $_b7ec14_old_params['_d9af8d']=$_b7ec14_local_params;$_b7ec14_old_vars['_d9af8d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</select>
<button type="submit" class="btn btn-sm btn-secondary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</button>
</form>
</div>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d9af8d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d9af8d'];?>

<?php endif;$c_45462a=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_45462a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_45462a'];?>


<?php $_b7ec14_old_params['_88e72d']=$_b7ec14_local_params;$_b7ec14_old_vars['_88e72d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_rebuild_all','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;start_all=1" style="color:<?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','this_tag'=>'getoption'],null,$this),$this)?>
;
  position:absolute; top: 10px; right: 16px; width:37px; height:27px; background-color:<?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','this_tag'=>'getoption'],null,$this),$this)?>
" class="popup btn btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish all','this_tag'=>'trans'],null,$this),$this)?>
">
  <i class="fa fa-refresh" aria-hidden="true"></i>
  <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish all','this_tag'=>'trans'],null,$this),$this)?>
</span>
</a>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_88e72d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_88e72d'];?>


<?php $_b7ec14_old_params['_cbadeb']=$_b7ec14_local_params;$_b7ec14_old_vars['_cbadeb']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'default_widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="default_widget<?php $_b7ec14_old_params['_ca7eae']=$_b7ec14_local_params;$_b7ec14_old_vars['_ca7eae']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 mt-4<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_ca7eae'];$_b7ec14_local_vars=$_b7ec14_old_vars['_ca7eae'];?>
">
  <?php echo $this->component('PTTags')->filter__eval($this->function_var($this->setup_args(['name'=>'default_widget','_eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','_eval',$this),$this,'_eval')?>

</div>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_cbadeb'];$_b7ec14_local_vars=$_b7ec14_old_vars['_cbadeb'];?>

<div id="dashboard_widgets-loop" <?php $_b7ec14_old_params['_8d3b19']=$_b7ec14_local_params;$_b7ec14_old_vars['_8d3b19']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_b7ec14_old_params['_2d1205']=$_b7ec14_local_params;$_b7ec14_old_vars['_2d1205']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'default_widget','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 class="mt-4"<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_2d1205'];$_b7ec14_local_vars=$_b7ec14_old_vars['_2d1205'];?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8d3b19'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8d3b19'];?>
>
<?php $c_98b9f2=null;$_b7ec14_old_params['_98b9f2']=$_b7ec14_local_params;$_b7ec14_old_vars['_98b9f2']=$_b7ec14_local_vars;$a_98b9f2=$this->setup_args(['name'=>'dashboard_widgets','this_tag'=>'loop'],null,$this);$_98b9f2=-1;$r_98b9f2=true;while($r_98b9f2===true):$r_98b9f2=($_98b9f2!==-1)?false:true;echo $this->block_loop($a_98b9f2,$c_98b9f2,$this,$r_98b9f2,++$_98b9f2,'_98b9f2');ob_start();?>
<?php $c_98b9f2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_98b9f2=false;}if($c_98b9f2 ):?>

<?php $c_c35cd8=null;$_b7ec14_old_params['_c35cd8']=$_b7ec14_local_params;$_b7ec14_old_vars['_c35cd8']=$_b7ec14_local_vars;$a_c35cd8=$this->setup_args(['name'=>'_widgets_path','this_tag'=>'setvarblock'],null,$this);ob_start();?>
widgets/<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
.tmpl<?php $c_c35cd8=ob_get_clean();$c_c35cd8=$this->block_setvarblock($a_c35cd8,$c_c35cd8,$this,$r_c35cd8,1,'_c35cd8');echo($c_c35cd8); $_b7ec14_local_params=$_b7ec14_old_params['_c35cd8'];?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['file'=>'$_widgets_path','this_tag'=>'include'],null,$this),$this)?>

<?php endif;$c_98b9f2=ob_get_clean();endwhile; $_b7ec14_local_params=$_b7ec14_old_params['_98b9f2'];$_b7ec14_local_vars=$_b7ec14_old_vars['_98b9f2'];?>

</div>

<script>
$('#add-widget-form').submit(function(){
    if (! $('#widget-selecter').val() ) {
        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any widget.','this_tag'=>'trans'],null,$this),$this)?>
' );
        return false;
    }
    return true;
});
$('#dashboard_widgets-loop').sortable ( {
    handle: '.card-header',
    stop: function( evt, ui ) {
        var widgets = [];
        $('.dashboard-widget').each(function(){
            var widget_id = $(this).prop('id');
            widgets.push( widget_id );
        });
        var updateURL = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
';
        var postData = {
            "__mode" : "update_dashboard",
            "workspace_id" : "<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
",
            "_type" : "sort",
            "magic_token" : "<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
",
            "widgets" : widgets.join(',')
        };
        $.post(
            updateURL,
            postData,
            function( data ) {
                if ( data.status !== 200 ) {
                    alert( data.message );
                    return;
                }
            }
        );
    }
});
$('.detatch-widget').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove this widget?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    var name = $(this).attr('data-name');
    var postData = {
        "__mode" : "update_dashboard",
        "workspace_id" : "<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
",
        "_type" : "detatch",
        "magic_token" : "<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
",
        "name" : name
    };
    var updateURL = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
';
    $.post(
        updateURL,
        postData,
        function( data ) {
            if ( data.status !== 200 ) {
                alert( data.message );
                return;
            }
            window.location.href = data.return_url;
        }
    );
});
</script>
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

  <?php $_b7ec14_old_params['_517ff7']=$_b7ec14_local_params;$_b7ec14_old_vars['_517ff7']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'copyright','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <footer class="footer bar">
      <?php $_b7ec14_old_params['_503325']=$_b7ec14_local_params;$_b7ec14_old_vars['_503325']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <span class="copyright"><?php echo $this->modifier_eval($this->function_var($this->setup_args(['name'=>'copyright','eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval')?>
</span>
      <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_503325'];$_b7ec14_local_vars=$_b7ec14_old_vars['_503325'];?>

    </footer>
  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_517ff7'];$_b7ec14_local_vars=$_b7ec14_old_vars['_517ff7'];?>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"RebuildPopupWindow","width=420,height=<?php $_b7ec14_old_params['_3b1abd']=$_b7ec14_local_params;$_b7ec14_old_vars['_3b1abd']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
360<?php else:?>
320<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_3b1abd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_3b1abd'];?>
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
<?php $_b7ec14_old_params['_1f792f']=$_b7ec14_local_params;$_b7ec14_old_vars['_1f792f']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_b7ec14_old_params['_d90d65']=$_b7ec14_local_params;$_b7ec14_old_vars['_d90d65']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_b7ec14_old_params['_b1aea9']=$_b7ec14_local_params;$_b7ec14_old_vars['_b1aea9']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_b7ec14_old_params['_3f07e1']=$_b7ec14_local_params;$_b7ec14_old_vars['_3f07e1']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_3f07e1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_3f07e1'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_b1aea9'];$_b7ec14_local_vars=$_b7ec14_old_vars['_b1aea9'];?>

<?php $_b7ec14_old_params['_9a0f7f']=$_b7ec14_local_params;$_b7ec14_old_vars['_9a0f7f']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_b7ec14_old_params['_69ddbd']=$_b7ec14_local_params;$_b7ec14_old_vars['_69ddbd']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_69ddbd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_69ddbd'];?>

<?php $_b7ec14_old_params['_6c0dbe']=$_b7ec14_local_params;$_b7ec14_old_vars['_6c0dbe']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6c0dbe'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6c0dbe'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9a0f7f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9a0f7f'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_b7ec14_old_params['_6e8643']=$_b7ec14_local_params;$_b7ec14_old_vars['_6e8643']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_6e8643'];$_b7ec14_local_vars=$_b7ec14_old_vars['_6e8643'];?>

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
?__mode=view&_type=list&_model=asset<?php $_b7ec14_old_params['_599ee3']=$_b7ec14_local_params;$_b7ec14_old_vars['_599ee3']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_599ee3'];$_b7ec14_local_vars=$_b7ec14_old_vars['_599ee3'];?>
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
?__mode=view&_type=list&_model=asset<?php $_b7ec14_old_params['_0a7031']=$_b7ec14_local_params;$_b7ec14_old_vars['_0a7031']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_0a7031'];$_b7ec14_local_vars=$_b7ec14_old_vars['_0a7031'];?>
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
            <?php $_b7ec14_old_params['_988894']=$_b7ec14_local_params;$_b7ec14_old_vars['_988894']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_b7ec14_old_params['_81e0cd']=$_b7ec14_local_params;$_b7ec14_old_vars['_81e0cd']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_81e0cd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_81e0cd'];?>

                <?php $_b7ec14_old_params['_22b5dc']=$_b7ec14_local_params;$_b7ec14_old_vars['_22b5dc']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_22b5dc'];$_b7ec14_local_vars=$_b7ec14_old_vars['_22b5dc'];?>

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
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_988894'];$_b7ec14_local_vars=$_b7ec14_old_vars['_988894'];?>

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
<?php $_b7ec14_old_params['_a809e6']=$_b7ec14_local_params;$_b7ec14_old_vars['_a809e6']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_b7ec14_old_params['_acca64']=$_b7ec14_local_params;$_b7ec14_old_vars['_acca64']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_acca64'];$_b7ec14_local_vars=$_b7ec14_old_vars['_acca64'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a809e6'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a809e6'];?>

<?php $_b7ec14_old_params['_4b8853']=$_b7ec14_local_params;$_b7ec14_old_vars['_4b8853']=$_b7ec14_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_b7ec14_old_params['_978b23']=$_b7ec14_local_params;$_b7ec14_old_vars['_978b23']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_978b23'];$_b7ec14_local_vars=$_b7ec14_old_vars['_978b23'];?>

<?php $_b7ec14_old_params['_281789']=$_b7ec14_local_params;$_b7ec14_old_vars['_281789']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_281789'];$_b7ec14_local_vars=$_b7ec14_old_vars['_281789'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_4b8853'];$_b7ec14_local_vars=$_b7ec14_old_vars['_4b8853'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_b7ec14_old_params['_19dc0a']=$_b7ec14_local_params;$_b7ec14_old_vars['_19dc0a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_19dc0a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_19dc0a'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_b7ec14_old_params['_a797ae']=$_b7ec14_local_params;$_b7ec14_old_vars['_a797ae']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a797ae'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a797ae'];?>
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
                <?php $_b7ec14_old_params['_f8726d']=$_b7ec14_local_params;$_b7ec14_old_vars['_f8726d']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f8726d'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f8726d'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_b7ec14_old_params['_9cd6a8']=$_b7ec14_local_params;$_b7ec14_old_vars['_9cd6a8']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_9cd6a8'];$_b7ec14_local_vars=$_b7ec14_old_vars['_9cd6a8'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_b7ec14_old_params['_85dfa1']=$_b7ec14_local_params;$_b7ec14_old_vars['_85dfa1']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_85dfa1'];$_b7ec14_local_vars=$_b7ec14_old_vars['_85dfa1'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_b7ec14_old_params['_e4ad0e']=$_b7ec14_local_params;$_b7ec14_old_vars['_e4ad0e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_e4ad0e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_e4ad0e'];?>
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
            <?php $_b7ec14_old_params['_21bdc0']=$_b7ec14_local_params;$_b7ec14_old_vars['_21bdc0']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_b7ec14_old_params['_c044cd']=$_b7ec14_local_params;$_b7ec14_old_vars['_c044cd']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_c044cd'];$_b7ec14_local_vars=$_b7ec14_old_vars['_c044cd'];?>

                      <?php $_b7ec14_old_params['_f35d3a']=$_b7ec14_local_params;$_b7ec14_old_vars['_f35d3a']=$_b7ec14_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_f35d3a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_f35d3a'];?>

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
            <?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_21bdc0'];$_b7ec14_local_vars=$_b7ec14_old_vars['_21bdc0'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_d90d65'];$_b7ec14_local_vars=$_b7ec14_old_vars['_d90d65'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_1f792f'];$_b7ec14_local_vars=$_b7ec14_old_vars['_1f792f'];?>

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
<?php $_b7ec14_old_params['_249b8a']=$_b7ec14_local_params;$_b7ec14_old_vars['_249b8a']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_b7ec14_old_params['_a514ae']=$_b7ec14_local_params;$_b7ec14_old_vars['_a514ae']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'loading','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_a514ae'];$_b7ec14_local_vars=$_b7ec14_old_vars['_a514ae'];?>

<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_249b8a'];$_b7ec14_local_vars=$_b7ec14_old_vars['_249b8a'];?>

</script>
  </div>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>

<?php $this->out=ob_get_clean();$this->meta=array (
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
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988087,
);?>