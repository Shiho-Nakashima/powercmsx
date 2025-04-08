<?php ob_start();?><?php $_a3ac63_vars=&$this->vars;$_a3ac63_old_params=&$this->old_params;$_a3ac63_local_params=&$this->local_params;$_a3ac63_old_vars=&$this->old_vars;$_a3ac63_local_vars=&$this->local_vars;?><?php $_a3ac63_old_params['_6874f7']=$_a3ac63_local_params;$_a3ac63_old_vars['_6874f7']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_c9229d']=$_a3ac63_local_params;$_a3ac63_old_vars['_c9229d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_fix_spacebar','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c9229d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c9229d'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6874f7'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6874f7'];?>

<!DOCTYPE html>
<html lang="<?php $_a3ac63_old_params['_fe697c']=$_a3ac63_local_params;$_a3ac63_old_vars['_fe697c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fe697c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fe697c'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_a3ac63_old_params['_47dce3']=$_a3ac63_local_params;$_a3ac63_old_vars['_47dce3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_47dce3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_47dce3'];?>
<?php $_a3ac63_old_params['_a8769f']=$_a3ac63_local_params;$_a3ac63_old_vars['_a8769f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_12a14b']=$_a3ac63_local_params;$_a3ac63_old_vars['_12a14b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_12a14b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_12a14b'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a8769f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a8769f'];?>
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
    <?php $_a3ac63_old_params['_9ea578']=$_a3ac63_local_params;$_a3ac63_old_vars['_9ea578']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_0bbfc6']=$_a3ac63_local_params;$_a3ac63_old_vars['_0bbfc6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_a3ac63_old_params['_c61e19']=$_a3ac63_local_params;$_a3ac63_old_vars['_c61e19']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c61e19'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c61e19'];?>

      <?php $_a3ac63_old_params['_3ce6a2']=$_a3ac63_local_params;$_a3ac63_old_vars['_3ce6a2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3ce6a2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3ce6a2'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0bbfc6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0bbfc6'];?>

      <?php $_a3ac63_old_params['_2395bf']=$_a3ac63_local_params;$_a3ac63_old_vars['_2395bf']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2395bf'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2395bf'];?>

      <?php $_a3ac63_old_params['_f1bb64']=$_a3ac63_local_params;$_a3ac63_old_vars['_f1bb64']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f1bb64'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f1bb64'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1020; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9ea578'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9ea578'];?>

      .fixed-top { z-index: 1030 !important; }
      .nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      .nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php $_a3ac63_old_params['_ff724d']=$_a3ac63_local_params;$_a3ac63_old_vars['_ff724d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_a3ac63_old_params['_147de2']=$_a3ac63_local_params;$_a3ac63_old_vars['_147de2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar, .workspace-bar a,
      .workspace-bar .dropdown-menu{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar button.my-sm-0{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar .my-sm-0, .workspace-bar .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php endif;$_147de2=ob_get_clean();echo paml_htmlspecialchars($_147de2,ENT_QUOTES);$_a3ac63_local_params=$_a3ac63_old_params['_147de2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_147de2'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ff724d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ff724d'];?>

      <?php $_a3ac63_old_params['_1d2737']=$_a3ac63_local_params;$_a3ac63_old_vars['_1d2737']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1d2737'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1d2737'];?>

      <?php $_a3ac63_old_params['_d2eaaf']=$_a3ac63_local_params;$_a3ac63_old_vars['_d2eaaf']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'panel_width','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.nav-link{ max-width: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'panel_width','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
px !important }<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d2eaaf'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d2eaaf'];?>

      .navbar .btn { width:35px }
      <?php $_a3ac63_old_params['_377fa8']=$_a3ac63_local_params;$_a3ac63_old_vars['_377fa8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'config','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_377fa8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_377fa8'];?>

      <?php $_a3ac63_old_params['_9435ea']=$_a3ac63_local_params;$_a3ac63_old_vars['_9435ea']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'in_editing','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      @media (min-width: 992px) {
      .col-lg-2{ max-width:13rem !important }
      .col-lg-10{ min-width: -webkit-calc(100% - 13rem); min-width: calc(100% - 13rem) } }
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9435ea'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9435ea'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php $_a3ac63_old_params['_58c511']=$_a3ac63_local_params;$_a3ac63_old_vars['_58c511']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'invisible_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <style><?php echo $this->modifier_join($this->function_var($this->setup_args(['name'=>'invisible_selector','join'=>',','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','join',$this),$this,'join')?>
{display:none !important}</style>
    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_58c511'];$_a3ac63_local_vars=$_a3ac63_old_vars['_58c511'];?>

    <?php $_a3ac63_old_params['_127257']=$_a3ac63_local_params;$_a3ac63_old_vars['_127257']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<style><?php $_a3ac63_old_params['_4b9e1b']=$_a3ac63_local_params;$_a3ac63_old_vars['_4b9e1b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
body { padding-top: 80px; } .workspace-bar { margin-top: 0;}
    <?php else:?>
.workspace-bar { margin-bottom: 14px;}<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4b9e1b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4b9e1b'];?>
</style><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_127257'];$_a3ac63_local_vars=$_a3ac63_old_vars['_127257'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_a3ac63_old_params['_2432c3']=$_a3ac63_local_params;$_a3ac63_old_vars['_2432c3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2432c3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2432c3'];?>

    <?php $_a3ac63_old_params['_00f97f']=$_a3ac63_local_params;$_a3ac63_old_vars['_00f97f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_00f97f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_00f97f'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_a3ac63_old_params['_9f8068']=$_a3ac63_local_params;$_a3ac63_old_vars['_9f8068']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php $_a3ac63_old_params['_3e31e8']=$_a3ac63_local_params;$_a3ac63_old_vars['_3e31e8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3e31e8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3e31e8'];?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9f8068'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9f8068'];?>

  <div id="main-content">
<?php $_a3ac63_old_params['_7246f3']=$_a3ac63_local_params;$_a3ac63_old_vars['_7246f3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="fixed-top">
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7246f3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7246f3'];?>

  <?php $_a3ac63_old_params['_27ecf4']=$_a3ac63_local_params;$_a3ac63_old_vars['_27ecf4']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_98936e']=$_a3ac63_local_params;$_a3ac63_old_vars['_98936e']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.__mode','match'=>'/^(?:login|logout)$/iu','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_98936e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_98936e'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_27ecf4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_27ecf4'];?>

  <?php $_a3ac63_old_params['_b57099']=$_a3ac63_local_params;$_a3ac63_old_vars['_b57099']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b57099'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b57099'];?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse nav-top<?php $_a3ac63_old_params['_eceed0']=$_a3ac63_local_params;$_a3ac63_old_vars['_eceed0']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 fixed-top<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_eceed0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_eceed0'];?>
">
      <?php $_a3ac63_old_params['_f1261b']=$_a3ac63_local_params;$_a3ac63_old_vars['_f1261b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_a3ac63_old_params['_d98caf']=$_a3ac63_local_params;$_a3ac63_old_vars['_d98caf']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'install','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="navbar-brand brand-prototype" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
">PowerCMS X</a>
        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d98caf'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d98caf'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f1261b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f1261b'];?>

      <?php $_a3ac63_old_params['_e28acc']=$_a3ac63_local_params;$_a3ac63_old_vars['_e28acc']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; z-index:7" class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e28acc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e28acc'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_a3ac63_old_params['_c18e07']=$_a3ac63_local_params;$_a3ac63_old_vars['_c18e07']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_b7c130=null;$_a3ac63_old_params['_b7c130']=$_a3ac63_local_params;$_a3ac63_old_vars['_b7c130']=$_a3ac63_local_vars;$a_b7c130=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_b7c130=ob_get_clean();$c_b7c130=$this->block_setvarblock($a_b7c130,$c_b7c130,$this,$r_b7c130,1,'_b7c130');echo($c_b7c130); $_a3ac63_local_params=$_a3ac63_old_params['_b7c130'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c18e07'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c18e07'];?>

      <?php $_a3ac63_old_params['_798937']=$_a3ac63_local_params;$_a3ac63_old_vars['_798937']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a class="navbar-brand"<?php $_a3ac63_old_params['_213b5e']=$_a3ac63_local_params;$_a3ac63_old_vars['_213b5e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_213b5e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_213b5e'];?>
 style="z-index:1"><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
<span id="navbar-brand-end"></span></a>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_a3ac63_old_params['_e92ce6']=$_a3ac63_local_params;$_a3ac63_old_vars['_e92ce6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_fe93ce']=$_a3ac63_local_params;$_a3ac63_old_vars['_fe93ce']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'ws_selector_limit','setvar'=>'selector_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('selector_limit','setvar',$this),$this,'setvar')?>

        <?php $_a3ac63_old_params['_b8274c']=$_a3ac63_local_params;$_a3ac63_old_vars['_b8274c']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'16','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b8274c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b8274c'];?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','op'=>'+','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_a3ac63_old_params['_86363a']=$_a3ac63_local_params;$_a3ac63_old_vars['_86363a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_86363a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_86363a'];?>

        <?php $c_064e0f=null;$_a3ac63_old_params['_064e0f']=$_a3ac63_local_params;$_a3ac63_old_vars['_064e0f']=$_a3ac63_local_vars;$a_064e0f=$this->setup_args(['cols'=>'id,name,barcolor,bartextcolor','model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_064e0f=-1;$r_064e0f=true;while($r_064e0f===true):$r_064e0f=($_064e0f!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_064e0f,$c_064e0f,$this,$r_064e0f,++$_064e0f,'_064e0f');ob_start();?>
<?php $c_064e0f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_064e0f=false;}if($c_064e0f ):?>

        <?php $_a3ac63_old_params['_9a9c87']=$_a3ac63_local_params;$_a3ac63_old_vars['_9a9c87']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="hidden nav-item dropdown workspace-dd-wrapper active" id="workspace-selector" style="z-index:5">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cube workspace-dd" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9a9c87'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9a9c87'];?>

            <?php $_a3ac63_old_params['_b8dd69']=$_a3ac63_local_params;$_a3ac63_old_vars['_b8dd69']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a<?php $_a3ac63_old_params['_196042']=$_a3ac63_local_params;$_a3ac63_old_vars['_196042']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_color_the_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_25c244']=$_a3ac63_local_params;$_a3ac63_old_vars['_25c244']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_d1606f']=$_a3ac63_local_params;$_a3ac63_old_vars['_d1606f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="<?php $_a3ac63_old_params['_e42573']=$_a3ac63_local_params;$_a3ac63_old_vars['_e42573']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__last__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
margin-bottom:3px;<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e42573'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e42573'];?>
background-color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d1606f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d1606f'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_25c244'];$_a3ac63_local_vars=$_a3ac63_old_vars['_25c244'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_196042'];$_a3ac63_local_vars=$_a3ac63_old_vars['_196042'];?>
 class="dropdown-item btn-sm <?php $_a3ac63_old_params['_e792db']=$_a3ac63_local_params;$_a3ac63_old_vars['_e792db']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e792db'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e792db'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?_selector=1&amp;<?php $_a3ac63_old_params['_bd199f']=$_a3ac63_local_params;$_a3ac63_old_vars['_bd199f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_dc7e49']=$_a3ac63_local_params;$_a3ac63_old_vars['_dc7e49']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->modifier_replace($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]*/\',\'\'','replace'=>'\'does_act=1\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('\\\'does_act=1\\\',\\\'\\\'','replace',$this),$this,'replace'),ENT_QUOTES)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_dc7e49'];$_a3ac63_local_vars=$_a3ac63_old_vars['_dc7e49'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_bd199f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_bd199f'];?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
              <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

            </a>
            <?php else:?>

            <a class="dropdown-item btn-sm" data-toggle="modal" data-target="#modal"
                data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</a>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b8dd69'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b8dd69'];?>

        <?php $_a3ac63_old_params['_e7894e']=$_a3ac63_local_params;$_a3ac63_old_vars['_e7894e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e7894e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e7894e'];?>

        <?php endif;$c_064e0f=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_064e0f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_064e0f'];?>

      <div class="collapse navbar-collapse" id="navbars" <?php $_a3ac63_old_params['_a0a5c5']=$_a3ac63_local_params;$_a3ac63_old_vars['_a0a5c5']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a0a5c5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a0a5c5'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel">
        <?php $c_db58c1=null;$_a3ac63_old_params['_db58c1']=$_a3ac63_local_params;$_a3ac63_old_vars['_db58c1']=$_a3ac63_local_vars;$a_db58c1=$this->setup_args(['menu_type'=>'6','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_db58c1=-1;$r_db58c1=true;while($r_db58c1===true):$r_db58c1=($_db58c1!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_db58c1,$c_db58c1,$this,$r_db58c1,++$_db58c1,'_db58c1');ob_start();?>
<?php $c_db58c1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_db58c1=false;}if($c_db58c1 ):?>

          <?php $_a3ac63_old_params['_04e903']=$_a3ac63_local_params;$_a3ac63_old_vars['_04e903']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_04e903'];$_a3ac63_local_vars=$_a3ac63_old_vars['_04e903'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_9161c3']=$_a3ac63_local_params;$_a3ac63_old_vars['_9161c3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9161c3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9161c3'];?>

        <?php endif;$c_db58c1=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_db58c1'];$_a3ac63_local_vars=$_a3ac63_old_vars['_db58c1'];?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'panel_limit','setvar'=>'panel_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('panel_limit','setvar',$this),$this,'setvar')?>

        <?php $c_b25696=null;$_a3ac63_old_params['_b25696']=$_a3ac63_local_params;$_a3ac63_old_vars['_b25696']=$_a3ac63_local_vars;$a_b25696=$this->setup_args(['limit'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_b25696=-1;$r_b25696=true;while($r_b25696===true):$r_b25696=($_b25696!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_b25696,$c_b25696,$this,$r_b25696,++$_b25696,'_b25696');ob_start();?>
<?php $c_b25696 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b25696=false;}if($c_b25696 ):?>

          <li class="nav-item <?php $_a3ac63_old_params['_c44c24']=$_a3ac63_local_params;$_a3ac63_old_vars['_c44c24']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c44c24'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c44c24'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php $_a3ac63_old_params['_ba5434']=$_a3ac63_local_params;$_a3ac63_old_vars['_ba5434']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ba5434'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ba5434'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_b25696=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_b25696'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b25696'];?>

        <?php $c_c50eb8=null;$_a3ac63_old_params['_c50eb8']=$_a3ac63_local_params;$_a3ac63_old_vars['_c50eb8']=$_a3ac63_local_vars;$a_c50eb8=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_c50eb8=-1;$r_c50eb8=true;while($r_c50eb8===true):$r_c50eb8=($_c50eb8!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_c50eb8,$c_c50eb8,$this,$r_c50eb8,++$_c50eb8,'_c50eb8');ob_start();?>
<?php $c_c50eb8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c50eb8=false;}if($c_c50eb8 ):?>

          <?php $_a3ac63_old_params['_749220']=$_a3ac63_local_params;$_a3ac63_old_vars['_749220']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_749220'];$_a3ac63_local_vars=$_a3ac63_old_vars['_749220'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_84d835']=$_a3ac63_local_params;$_a3ac63_old_vars['_84d835']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_84d835'];$_a3ac63_local_vars=$_a3ac63_old_vars['_84d835'];?>

        <?php endif;$c_c50eb8=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_c50eb8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c50eb8'];?>

        <?php $c_9dfabd=null;$_a3ac63_old_params['_9dfabd']=$_a3ac63_local_params;$_a3ac63_old_vars['_9dfabd']=$_a3ac63_local_vars;$a_9dfabd=$this->setup_args(['menu_type'=>'2','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_9dfabd=-1;$r_9dfabd=true;while($r_9dfabd===true):$r_9dfabd=($_9dfabd!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_9dfabd,$c_9dfabd,$this,$r_9dfabd,++$_9dfabd,'_9dfabd');ob_start();?>
<?php $c_9dfabd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9dfabd=false;}if($c_9dfabd ):?>

          <?php $_a3ac63_old_params['_d57b41']=$_a3ac63_local_params;$_a3ac63_old_vars['_d57b41']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d57b41'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d57b41'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_71795d']=$_a3ac63_local_params;$_a3ac63_old_vars['_71795d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_71795d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_71795d'];?>

        <?php endif;$c_9dfabd=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_9dfabd'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9dfabd'];?>

        <?php $c_bcaf83=null;$_a3ac63_old_params['_bcaf83']=$_a3ac63_local_params;$_a3ac63_old_vars['_bcaf83']=$_a3ac63_local_vars;$a_bcaf83=$this->setup_args(['menu_type'=>'3','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_bcaf83=-1;$r_bcaf83=true;while($r_bcaf83===true):$r_bcaf83=($_bcaf83!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_bcaf83,$c_bcaf83,$this,$r_bcaf83,++$_bcaf83,'_bcaf83');ob_start();?>
<?php $c_bcaf83 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bcaf83=false;}if($c_bcaf83 ):?>

          <?php $_a3ac63_old_params['_b9cfdb']=$_a3ac63_local_params;$_a3ac63_old_vars['_b9cfdb']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b9cfdb'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b9cfdb'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_b5c149']=$_a3ac63_local_params;$_a3ac63_old_vars['_b5c149']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b5c149'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b5c149'];?>

        <?php endif;$c_bcaf83=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_bcaf83'];$_a3ac63_local_vars=$_a3ac63_old_vars['_bcaf83'];?>

        <?php $c_0956d9=null;$_a3ac63_old_params['_0956d9']=$_a3ac63_local_params;$_a3ac63_old_vars['_0956d9']=$_a3ac63_local_vars;$a_0956d9=$this->setup_args(['menu_type'=>'4','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_0956d9=-1;$r_0956d9=true;while($r_0956d9===true):$r_0956d9=($_0956d9!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_0956d9,$c_0956d9,$this,$r_0956d9,++$_0956d9,'_0956d9');ob_start();?>
<?php $c_0956d9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0956d9=false;}if($c_0956d9 ):?>

          <?php $_a3ac63_old_params['_6b39c9']=$_a3ac63_local_params;$_a3ac63_old_vars['_6b39c9']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6b39c9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6b39c9'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_c6b0b6']=$_a3ac63_local_params;$_a3ac63_old_vars['_c6b0b6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c6b0b6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c6b0b6'];?>

        <?php endif;$c_0956d9=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_0956d9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0956d9'];?>

        <?php $c_79a939=null;$_a3ac63_old_params['_79a939']=$_a3ac63_local_params;$_a3ac63_old_vars['_79a939']=$_a3ac63_local_vars;$a_79a939=$this->setup_args(['menu_type'=>'5','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_79a939=-1;$r_79a939=true;while($r_79a939===true):$r_79a939=($_79a939!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_79a939,$c_79a939,$this,$r_79a939,++$_79a939,'_79a939');ob_start();?>
<?php $c_79a939 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_79a939=false;}if($c_79a939 ):?>

          <?php $_a3ac63_old_params['_1bda62']=$_a3ac63_local_params;$_a3ac63_old_vars['_1bda62']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1bda62'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1bda62'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_9fc39e']=$_a3ac63_local_params;$_a3ac63_old_vars['_9fc39e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9fc39e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9fc39e'];?>

        <?php endif;$c_79a939=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_79a939'];$_a3ac63_local_vars=$_a3ac63_old_vars['_79a939'];?>

        <?php $c_91a5e3=null;$_a3ac63_old_params['_91a5e3']=$_a3ac63_local_params;$_a3ac63_old_vars['_91a5e3']=$_a3ac63_local_vars;$a_91a5e3=$this->setup_args(['name'=>'system_menus','this_tag'=>'loop'],null,$this);$_91a5e3=-1;$r_91a5e3=true;while($r_91a5e3===true):$r_91a5e3=($_91a5e3!==-1)?false:true;echo $this->block_loop($a_91a5e3,$c_91a5e3,$this,$r_91a5e3,++$_91a5e3,'_91a5e3');ob_start();?>
<?php $c_91a5e3 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_91a5e3=false;}if($c_91a5e3 ):?>

          <?php $_a3ac63_old_params['_0ed5ab']=$_a3ac63_local_params;$_a3ac63_old_vars['_0ed5ab']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <?php $_a3ac63_old_params['_72ef5a']=$_a3ac63_local_params;$_a3ac63_old_vars['_72ef5a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php elseif($this->conditional_elseif($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_72ef5a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_72ef5a'];?>

            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0ed5ab'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0ed5ab'];?>

            <a <?php $_a3ac63_old_params['_0c7409']=$_a3ac63_local_params;$_a3ac63_old_vars['_0c7409']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0c7409'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0c7409'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
<?php $c_8c7330=null;$_a3ac63_old_params['_8c7330']=$_a3ac63_local_params;$_a3ac63_old_vars['_8c7330']=$_a3ac63_local_vars;$a_8c7330=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_8c7330=-1;$r_8c7330=true;while($r_8c7330===true):$r_8c7330=($_8c7330!==-1)?false:true;echo $this->block_loop($a_8c7330,$c_8c7330,$this,$r_8c7330,++$_8c7330,'_8c7330');ob_start();?>
<?php $c_8c7330 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8c7330=false;}if($c_8c7330 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_8c7330=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_8c7330'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8c7330'];?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_a3ac63_old_params['_9aee18']=$_a3ac63_local_params;$_a3ac63_old_vars['_9aee18']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_mode','eq'=>'manage_scheme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_a2dd93']=$_a3ac63_local_params;$_a3ac63_old_vars['_a2dd93']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a2dd93'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a2dd93'];?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_mode','eq'=>'manage_plugins','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_f26c94']=$_a3ac63_local_params;$_a3ac63_old_vars['_f26c94']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f26c94'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f26c94'];?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9aee18'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9aee18'];?>

            </a>
          <?php $_a3ac63_old_params['_5dd19c']=$_a3ac63_local_params;$_a3ac63_old_vars['_5dd19c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5dd19c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5dd19c'];?>

        <?php endif;$c_91a5e3=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_91a5e3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_91a5e3'];?>

        </ul>
        <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_system','this_tag'=>'var'],null,$this),$this)?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'show_both','setvar'=>'__show_both','this_tag'=>'property'],null,$this),$this),$this->setup_args('__show_both','setvar',$this),$this,'setvar')?>

          <a href="<?php $_a3ac63_old_params['_2a3574']=$_a3ac63_local_params;$_a3ac63_old_vars['_2a3574']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_01abc6']=$_a3ac63_local_params;$_a3ac63_old_vars['_01abc6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_01abc6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_01abc6'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2a3574'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2a3574'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_a3ac63_old_params['_7a1da8']=$_a3ac63_local_params;$_a3ac63_old_vars['_7a1da8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7a1da8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7a1da8'];?>

        <?php $_a3ac63_old_params['_357d9c']=$_a3ac63_local_params;$_a3ac63_old_vars['_357d9c']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'0','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_33ec41=null;$_a3ac63_old_params['_33ec41']=$_a3ac63_local_params;$_a3ac63_old_vars['_33ec41']=$_a3ac63_local_vars;$a_33ec41=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'0','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_33ec41=-1;$r_33ec41=true;while($r_33ec41===true):$r_33ec41=($_33ec41!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_33ec41,$c_33ec41,$this,$r_33ec41,++$_33ec41,'_33ec41');ob_start();?>
<?php $c_33ec41 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_33ec41=false;}if($c_33ec41 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_33ec41=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_33ec41'];$_a3ac63_local_vars=$_a3ac63_old_vars['_33ec41'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_357d9c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_357d9c'];?>

          <a style="padding:<?php $_a3ac63_old_params['_784b6e']=$_a3ac63_local_params;$_a3ac63_old_vars['_784b6e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
0 3px<?php else:?>
4px<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_784b6e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_784b6e'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_profile=1" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
          <?php $_a3ac63_old_params['_6b804f']=$_a3ac63_local_params;$_a3ac63_old_vars['_6b804f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6b804f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6b804f'];?>

          </a>
          <a id="__logout" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_a3ac63_old_params['_7b8fa2']=$_a3ac63_local_params;$_a3ac63_old_vars['_7b8fa2']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config" class="btn btn-sm btn-secondary my-2 my-sm-0 config-system" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7b8fa2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7b8fa2'];?>

        </div>
      </div>
        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fe93ce'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fe93ce'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e92ce6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e92ce6'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_798937'];$_a3ac63_local_vars=$_a3ac63_old_vars['_798937'];?>

      <?php $_a3ac63_old_params['_5463fa']=$_a3ac63_local_params;$_a3ac63_old_vars['_5463fa']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbars" <?php $_a3ac63_old_params['_fad79d']=$_a3ac63_local_params;$_a3ac63_old_vars['_fad79d']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fad79d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fad79d'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel"></ul>
          <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_workspace','this_tag'=>'var'],null,$this),$this)?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout<?php $_a3ac63_old_params['_f83b12']=$_a3ac63_local_params;$_a3ac63_old_vars['_f83b12']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f83b12'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f83b12'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=edit_profile<?php $_a3ac63_old_params['_f2179d']=$_a3ac63_local_params;$_a3ac63_old_vars['_f2179d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f2179d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f2179d'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          </div>
        </div>
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5463fa'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5463fa'];?>

    </nav>
  <?php $_a3ac63_old_params['_f9a5c8']=$_a3ac63_local_params;$_a3ac63_old_vars['_f9a5c8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_a3ac63_old_params['_66f8a3']=$_a3ac63_local_params;$_a3ac63_old_vars['_66f8a3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_53b42e']=$_a3ac63_local_params;$_a3ac63_old_vars['_53b42e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_a3ac63_old_params['_1261db']=$_a3ac63_local_params;$_a3ac63_old_vars['_1261db']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar"<?php $_a3ac63_old_params['_eaa98c']=$_a3ac63_local_params;$_a3ac63_old_vars['_eaa98c']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 style="z-index:1029;"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_eaa98c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_eaa98c'];?>
>
      <?php $_a3ac63_old_params['_14ffd0']=$_a3ac63_local_params;$_a3ac63_old_vars['_14ffd0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important;" class="navbar-toggler navbar-toggler-right btn-ws" type="button" data-toggle="collapse" data-target="#navbars-ws" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_14ffd0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_14ffd0'];?>

      <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'workspace_name','count_chars'=>'','setvar'=>'workspace_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('workspace_chars','setvar',$this),$this,'setvar')?>
<a class="navbar-brand brand-workspace" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_a3ac63_old_params['_f388f9']=$_a3ac63_local_params;$_a3ac63_old_vars['_f388f9']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f388f9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f388f9'];?>
><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
</a>
      <div class="collapse navbar-collapse" id="navbars-ws">
        <ul class="nav-pills navbar-nav mr-auto">
          <?php $c_184023=null;$_a3ac63_old_params['_184023']=$_a3ac63_local_params;$_a3ac63_old_vars['_184023']=$_a3ac63_local_vars;$a_184023=$this->setup_args(['type'=>'display_space','menu_type'=>'6','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_184023=-1;$r_184023=true;while($r_184023===true):$r_184023=($_184023!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_184023,$c_184023,$this,$r_184023,++$_184023,'_184023');ob_start();?>
<?php $c_184023 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_184023=false;}if($c_184023 ):?>

            <?php $_a3ac63_old_params['_c3af3c']=$_a3ac63_local_params;$_a3ac63_old_vars['_c3af3c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <li class="nav-item dropdown">
              <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
                <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </a>
              <div class="dropdown-menu">
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c3af3c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c3af3c'];?>

              <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_194f4b']=$_a3ac63_local_params;$_a3ac63_old_vars['_194f4b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_194f4b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_194f4b'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
            <?php $_a3ac63_old_params['_26fb4f']=$_a3ac63_local_params;$_a3ac63_old_vars['_26fb4f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              </li>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_26fb4f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_26fb4f'];?>

          <?php endif;$c_184023=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_184023'];$_a3ac63_local_vars=$_a3ac63_old_vars['_184023'];?>

        <?php $c_b73a8b=null;$_a3ac63_old_params['_b73a8b']=$_a3ac63_local_params;$_a3ac63_old_vars['_b73a8b']=$_a3ac63_local_vars;$a_b73a8b=$this->setup_args(['limit'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_b73a8b=-1;$r_b73a8b=true;while($r_b73a8b===true):$r_b73a8b=($_b73a8b!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_b73a8b,$c_b73a8b,$this,$r_b73a8b,++$_b73a8b,'_b73a8b');ob_start();?>
<?php $c_b73a8b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b73a8b=false;}if($c_b73a8b ):?>

          <li class="nav-item nav-item-ws <?php $_a3ac63_old_params['_f3c596']=$_a3ac63_local_params;$_a3ac63_old_vars['_f3c596']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f3c596'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f3c596'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_528d20']=$_a3ac63_local_params;$_a3ac63_old_vars['_528d20']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_528d20'];$_a3ac63_local_vars=$_a3ac63_old_vars['_528d20'];?>
"<?php $_a3ac63_old_params['_e2d726']=$_a3ac63_local_params;$_a3ac63_old_vars['_e2d726']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e2d726'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e2d726'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_b73a8b=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_b73a8b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b73a8b'];?>

        <?php $c_f48b5d=null;$_a3ac63_old_params['_f48b5d']=$_a3ac63_local_params;$_a3ac63_old_vars['_f48b5d']=$_a3ac63_local_vars;$a_f48b5d=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_f48b5d=-1;$r_f48b5d=true;while($r_f48b5d===true):$r_f48b5d=($_f48b5d!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_f48b5d,$c_f48b5d,$this,$r_f48b5d,++$_f48b5d,'_f48b5d');ob_start();?>
<?php $c_f48b5d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f48b5d=false;}if($c_f48b5d ):?>

          <?php $_a3ac63_old_params['_4f79b0']=$_a3ac63_local_params;$_a3ac63_old_vars['_4f79b0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4f79b0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4f79b0'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_8b7b6a']=$_a3ac63_local_params;$_a3ac63_old_vars['_8b7b6a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8b7b6a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8b7b6a'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_1e8c51']=$_a3ac63_local_params;$_a3ac63_old_vars['_1e8c51']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1e8c51'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1e8c51'];?>

        <?php endif;$c_f48b5d=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_f48b5d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f48b5d'];?>

        <?php $c_b48f2a=null;$_a3ac63_old_params['_b48f2a']=$_a3ac63_local_params;$_a3ac63_old_vars['_b48f2a']=$_a3ac63_local_vars;$a_b48f2a=$this->setup_args(['type'=>'display_space','menu_type'=>'2','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_b48f2a=-1;$r_b48f2a=true;while($r_b48f2a===true):$r_b48f2a=($_b48f2a!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_b48f2a,$c_b48f2a,$this,$r_b48f2a,++$_b48f2a,'_b48f2a');ob_start();?>
<?php $c_b48f2a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b48f2a=false;}if($c_b48f2a ):?>

          <?php $_a3ac63_old_params['_b4661f']=$_a3ac63_local_params;$_a3ac63_old_vars['_b4661f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b4661f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b4661f'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_f908fc']=$_a3ac63_local_params;$_a3ac63_old_vars['_f908fc']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f908fc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f908fc'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_bcd20d']=$_a3ac63_local_params;$_a3ac63_old_vars['_bcd20d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_bcd20d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_bcd20d'];?>

        <?php endif;$c_b48f2a=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_b48f2a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b48f2a'];?>

        <?php $c_2ca7dd=null;$_a3ac63_old_params['_2ca7dd']=$_a3ac63_local_params;$_a3ac63_old_vars['_2ca7dd']=$_a3ac63_local_vars;$a_2ca7dd=$this->setup_args(['type'=>'display_space','menu_type'=>'3','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_2ca7dd=-1;$r_2ca7dd=true;while($r_2ca7dd===true):$r_2ca7dd=($_2ca7dd!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_2ca7dd,$c_2ca7dd,$this,$r_2ca7dd,++$_2ca7dd,'_2ca7dd');ob_start();?>
<?php $c_2ca7dd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2ca7dd=false;}if($c_2ca7dd ):?>

          <?php $_a3ac63_old_params['_13bdfe']=$_a3ac63_local_params;$_a3ac63_old_vars['_13bdfe']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_13bdfe'];$_a3ac63_local_vars=$_a3ac63_old_vars['_13bdfe'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_fb081f']=$_a3ac63_local_params;$_a3ac63_old_vars['_fb081f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fb081f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fb081f'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_ebe370']=$_a3ac63_local_params;$_a3ac63_old_vars['_ebe370']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ebe370'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ebe370'];?>

        <?php endif;$c_2ca7dd=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_2ca7dd'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2ca7dd'];?>

        <?php $c_eea192=null;$_a3ac63_old_params['_eea192']=$_a3ac63_local_params;$_a3ac63_old_vars['_eea192']=$_a3ac63_local_vars;$a_eea192=$this->setup_args(['type'=>'display_space','menu_type'=>'4','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_eea192=-1;$r_eea192=true;while($r_eea192===true):$r_eea192=($_eea192!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_eea192,$c_eea192,$this,$r_eea192,++$_eea192,'_eea192');ob_start();?>
<?php $c_eea192 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_eea192=false;}if($c_eea192 ):?>

          <?php $_a3ac63_old_params['_58fe0c']=$_a3ac63_local_params;$_a3ac63_old_vars['_58fe0c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_58fe0c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_58fe0c'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_7cb37e']=$_a3ac63_local_params;$_a3ac63_old_vars['_7cb37e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7cb37e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7cb37e'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_070b89']=$_a3ac63_local_params;$_a3ac63_old_vars['_070b89']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_070b89'];$_a3ac63_local_vars=$_a3ac63_old_vars['_070b89'];?>

        <?php endif;$c_eea192=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_eea192'];$_a3ac63_local_vars=$_a3ac63_old_vars['_eea192'];?>

        <?php $c_f4d792=null;$_a3ac63_old_params['_f4d792']=$_a3ac63_local_params;$_a3ac63_old_vars['_f4d792']=$_a3ac63_local_vars;$a_f4d792=$this->setup_args(['type'=>'display_space','menu_type'=>'5','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_f4d792=-1;$r_f4d792=true;while($r_f4d792===true):$r_f4d792=($_f4d792!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_f4d792,$c_f4d792,$this,$r_f4d792,++$_f4d792,'_f4d792');ob_start();?>
<?php $c_f4d792 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f4d792=false;}if($c_f4d792 ):?>

          <?php $_a3ac63_old_params['_0ec297']=$_a3ac63_local_params;$_a3ac63_old_vars['_0ec297']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0ec297'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0ec297'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_7c96e2']=$_a3ac63_local_params;$_a3ac63_old_vars['_7c96e2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7c96e2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7c96e2'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_a3ac63_old_params['_b5391f']=$_a3ac63_local_params;$_a3ac63_old_vars['_b5391f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b5391f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b5391f'];?>

        <?php endif;$c_f4d792=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_f4d792'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f4d792'];?>

        <?php $c_9dafbf=null;$_a3ac63_old_params['_9dafbf']=$_a3ac63_local_params;$_a3ac63_old_vars['_9dafbf']=$_a3ac63_local_vars;$a_9dafbf=$this->setup_args(['name'=>'workspace_menus','this_tag'=>'loop'],null,$this);$_9dafbf=-1;$r_9dafbf=true;while($r_9dafbf===true):$r_9dafbf=($_9dafbf!==-1)?false:true;echo $this->block_loop($a_9dafbf,$c_9dafbf,$this,$r_9dafbf,++$_9dafbf,'_9dafbf');ob_start();?>
<?php $c_9dafbf = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9dafbf=false;}if($c_9dafbf ):?>

          <?php $_a3ac63_old_params['_22131d']=$_a3ac63_local_params;$_a3ac63_old_vars['_22131d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_22131d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_22131d'];?>

            <a <?php $_a3ac63_old_params['_c2a68a']=$_a3ac63_local_params;$_a3ac63_old_vars['_c2a68a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c2a68a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c2a68a'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_95da78=null;$_a3ac63_old_params['_95da78']=$_a3ac63_local_params;$_a3ac63_old_vars['_95da78']=$_a3ac63_local_vars;$a_95da78=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_95da78=-1;$r_95da78=true;while($r_95da78===true):$r_95da78=($_95da78!==-1)?false:true;echo $this->block_loop($a_95da78,$c_95da78,$this,$r_95da78,++$_95da78,'_95da78');ob_start();?>
<?php $c_95da78 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_95da78=false;}if($c_95da78 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_95da78=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_95da78'];$_a3ac63_local_vars=$_a3ac63_old_vars['_95da78'];?>
"><?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>
</a>
          <?php $_a3ac63_old_params['_1c329b']=$_a3ac63_local_params;$_a3ac63_old_vars['_1c329b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1c329b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1c329b'];?>

        <?php endif;$c_9dafbf=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_9dafbf'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9dafbf'];?>

        </ul>
        <div class="header-util">
          <a href="<?php $_a3ac63_old_params['_86696f']=$_a3ac63_local_params;$_a3ac63_old_vars['_86696f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_fa1940']=$_a3ac63_local_params;$_a3ac63_old_vars['_fa1940']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fa1940'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fa1940'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_86696f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_86696f'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_a3ac63_old_params['_ce6a6f']=$_a3ac63_local_params;$_a3ac63_old_vars['_ce6a6f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_38b1b4']=$_a3ac63_local_params;$_a3ac63_old_vars['_38b1b4']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_38b1b4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_38b1b4'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ce6a6f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ce6a6f'];?>

        <?php $_a3ac63_old_params['_8a5476']=$_a3ac63_local_params;$_a3ac63_old_vars['_8a5476']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_140f14=null;$_a3ac63_old_params['_140f14']=$_a3ac63_local_params;$_a3ac63_old_vars['_140f14']=$_a3ac63_local_vars;$a_140f14=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'$workspace_id','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_140f14=-1;$r_140f14=true;while($r_140f14===true):$r_140f14=($_140f14!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_140f14,$c_140f14,$this,$r_140f14,++$_140f14,'_140f14');ob_start();?>
<?php $c_140f14 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_140f14=false;}if($c_140f14 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_140f14=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_140f14'];$_a3ac63_local_vars=$_a3ac63_old_vars['_140f14'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8a5476'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8a5476'];?>

        <?php $_a3ac63_old_params['_4ddabd']=$_a3ac63_local_params;$_a3ac63_old_vars['_4ddabd']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'workspace','id'=>'$workspace_id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 config-workspace" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4ddabd'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4ddabd'];?>

        </div>
      </div>
    </nav>
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1261db'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1261db'];?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_53b42e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_53b42e'];?>

<?php $_a3ac63_old_params['_b24cf5']=$_a3ac63_local_params;$_a3ac63_old_vars['_b24cf5']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </div>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b24cf5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b24cf5'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_a3ac63_old_params['_b735ea']=$_a3ac63_local_params;$_a3ac63_old_vars['_b735ea']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_a3ac63_old_params['_7fc778']=$_a3ac63_local_params;$_a3ac63_old_vars['_7fc778']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7fc778'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7fc778'];?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b735ea'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b735ea'];?>

    <?php $_a3ac63_old_params['_eeb2b6']=$_a3ac63_local_params;$_a3ac63_old_vars['_eeb2b6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_eeb2b6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_eeb2b6'];?>

    <?php $_a3ac63_old_params['_4db8f3']=$_a3ac63_local_params;$_a3ac63_old_vars['_4db8f3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_a3ac63_old_params['_fdbc91']=$_a3ac63_local_params;$_a3ac63_old_vars['_fdbc91']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fdbc91'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fdbc91'];?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4db8f3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4db8f3'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'output_container','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <div class="container-fluid">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_a3ac63_old_params['_619397']=$_a3ac63_local_params;$_a3ac63_old_vars['_619397']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_a3ac63_old_params['_78eb3b']=$_a3ac63_local_params;$_a3ac63_old_vars['_78eb3b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_a3ac63_old_params['_073bee']=$_a3ac63_local_params;$_a3ac63_old_vars['_073bee']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_88e65b']=$_a3ac63_local_params;$_a3ac63_old_vars['_88e65b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php $_a3ac63_old_params['_e8e0b3']=$_a3ac63_local_params;$_a3ac63_old_vars['_e8e0b3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e8e0b3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e8e0b3'];?>

            <?php $_a3ac63_old_params['_3b67c6']=$_a3ac63_local_params;$_a3ac63_old_vars['_3b67c6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3b67c6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3b67c6'];?>

          <?php $_a3ac63_old_params['_77dee0']=$_a3ac63_local_params;$_a3ac63_old_vars['_77dee0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_77dee0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_77dee0'];?>

          <?php $_a3ac63_old_params['_580495']=$_a3ac63_local_params;$_a3ac63_old_vars['_580495']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_580495'];$_a3ac63_local_vars=$_a3ac63_old_vars['_580495'];?>

          <?php $_a3ac63_old_params['_59e9bb']=$_a3ac63_local_params;$_a3ac63_old_vars['_59e9bb']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_a3ac63_old_params['_cfe240']=$_a3ac63_local_params;$_a3ac63_old_vars['_cfe240']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_cfe240'];$_a3ac63_local_vars=$_a3ac63_old_vars['_cfe240'];?>

          <?php $_a3ac63_old_params['_88c45e']=$_a3ac63_local_params;$_a3ac63_old_vars['_88c45e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_88c45e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_88c45e'];?>

            <?php $_a3ac63_old_params['_2d1e8c']=$_a3ac63_local_params;$_a3ac63_old_vars['_2d1e8c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2d1e8c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2d1e8c'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_59e9bb'];$_a3ac63_local_vars=$_a3ac63_old_vars['_59e9bb'];?>

          <?php $_a3ac63_old_params['_e1f8b5']=$_a3ac63_local_params;$_a3ac63_old_vars['_e1f8b5']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e1f8b5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e1f8b5'];?>

          <?php $_a3ac63_old_params['_87e9a5']=$_a3ac63_local_params;$_a3ac63_old_vars['_87e9a5']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_a3ac63_old_params['_6759b6']=$_a3ac63_local_params;$_a3ac63_old_vars['_6759b6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6759b6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6759b6'];?>

          <?php $_a3ac63_old_params['_d3cecf']=$_a3ac63_local_params;$_a3ac63_old_vars['_d3cecf']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d3cecf'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d3cecf'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_87e9a5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_87e9a5'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_a3ac63_old_params['_ba3301']=$_a3ac63_local_params;$_a3ac63_old_vars['_ba3301']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_dacf9e=null;$_a3ac63_old_params['_dacf9e']=$_a3ac63_local_params;$_a3ac63_old_vars['_dacf9e']=$_a3ac63_local_vars;$a_dacf9e=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_dacf9e=-1;$r_dacf9e=true;while($r_dacf9e===true):$r_dacf9e=($_dacf9e!==-1)?false:true;echo $this->block_loop($a_dacf9e,$c_dacf9e,$this,$r_dacf9e,++$_dacf9e,'_dacf9e');ob_start();?>
<?php $c_dacf9e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_dacf9e=false;}if($c_dacf9e ):?>

                      <?php $_a3ac63_old_params['_7926d4']=$_a3ac63_local_params;$_a3ac63_old_vars['_7926d4']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7926d4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7926d4'];?>

                        <option <?php $_a3ac63_old_params['_6586b9']=$_a3ac63_local_params;$_a3ac63_old_vars['_6586b9']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6586b9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6586b9'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_a3ac63_old_params['_ceab3d']=$_a3ac63_local_params;$_a3ac63_old_vars['_ceab3d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ceab3d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ceab3d'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_a3ac63_old_params['_53e027']=$_a3ac63_local_params;$_a3ac63_old_vars['_53e027']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_53e027'];$_a3ac63_local_vars=$_a3ac63_old_vars['_53e027'];?>

                    <?php endif;$c_dacf9e=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_dacf9e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_dacf9e'];?>

                  </div>
                </div>
                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ba3301'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ba3301'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_8d2c4a=null;$_a3ac63_old_params['_8d2c4a']=$_a3ac63_local_params;$_a3ac63_old_vars['_8d2c4a']=$_a3ac63_local_vars;$a_8d2c4a=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_8d2c4a=-1;$r_8d2c4a=true;while($r_8d2c4a===true):$r_8d2c4a=($_8d2c4a!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_8d2c4a,$c_8d2c4a,$this,$r_8d2c4a,++$_8d2c4a,'_8d2c4a');ob_start();?>
<?php $c_8d2c4a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8d2c4a=false;}if($c_8d2c4a ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_a3ac63_old_params['_9b53c0']=$_a3ac63_local_params;$_a3ac63_old_vars['_9b53c0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9b53c0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9b53c0'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_8d2c4a=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_8d2c4a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8d2c4a'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_a3ac63_old_params['_184a59']=$_a3ac63_local_params;$_a3ac63_old_vars['_184a59']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_184a59'];$_a3ac63_local_vars=$_a3ac63_old_vars['_184a59'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_460aa2=null;$_a3ac63_old_params['_460aa2']=$_a3ac63_local_params;$_a3ac63_old_vars['_460aa2']=$_a3ac63_local_vars;$a_460aa2=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_460aa2=-1;$r_460aa2=true;while($r_460aa2===true):$r_460aa2=($_460aa2!==-1)?false:true;echo $this->block_loop($a_460aa2,$c_460aa2,$this,$r_460aa2,++$_460aa2,'_460aa2');ob_start();?>
<?php $c_460aa2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_460aa2=false;}if($c_460aa2 ):?>

                    <?php $_a3ac63_old_params['_334898']=$_a3ac63_local_params;$_a3ac63_old_vars['_334898']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_334898'];$_a3ac63_local_vars=$_a3ac63_old_vars['_334898'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_a3ac63_old_params['_70cf04']=$_a3ac63_local_params;$_a3ac63_old_vars['_70cf04']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_70cf04'];$_a3ac63_local_vars=$_a3ac63_old_vars['_70cf04'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_460aa2=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_460aa2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_460aa2'];?>

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

                              <input type="datetime-local" step="<?php $_a3ac63_old_params['_d2aaf3']=$_a3ac63_local_params;$_a3ac63_old_vars['_d2aaf3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d2aaf3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d2aaf3'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_a3ac63_old_params['_4a4f91']=$_a3ac63_local_params;$_a3ac63_old_vars['_4a4f91']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4a4f91'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4a4f91'];?>
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

                            <?php $_a3ac63_old_params['_da2161']=$_a3ac63_local_params;$_a3ac63_old_vars['_da2161']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_a3ac63_old_params['_cb2d34']=$_a3ac63_local_params;$_a3ac63_old_vars['_cb2d34']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_cb2d34'];$_a3ac63_local_vars=$_a3ac63_old_vars['_cb2d34'];?>

                            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_da2161'];$_a3ac63_local_vars=$_a3ac63_old_vars['_da2161'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_a3ac63_old_params['_a893a0']=$_a3ac63_local_params;$_a3ac63_old_vars['_a893a0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_7da816=null;$_a3ac63_old_params['_7da816']=$_a3ac63_local_params;$_a3ac63_old_vars['_7da816']=$_a3ac63_local_vars;$a_7da816=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_7da816=-1;$r_7da816=true;while($r_7da816===true):$r_7da816=($_7da816!==-1)?false:true;echo $this->block_loop($a_7da816,$c_7da816,$this,$r_7da816,++$_7da816,'_7da816');ob_start();?>
<?php $c_7da816 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7da816=false;}if($c_7da816 ):?>

                              <?php $_a3ac63_old_params['_e0d630']=$_a3ac63_local_params;$_a3ac63_old_vars['_e0d630']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_a3ac63_old_params['_0702de']=$_a3ac63_local_params;$_a3ac63_old_vars['_0702de']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0702de'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0702de'];?>

                              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e0d630'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e0d630'];?>

                            <?php endif;$c_7da816=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_7da816'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7da816'];?>

                            <?php else:?>

                            <?php $c_75adbc=null;$_a3ac63_old_params['_75adbc']=$_a3ac63_local_params;$_a3ac63_old_vars['_75adbc']=$_a3ac63_local_vars;$a_75adbc=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_75adbc=-1;$r_75adbc=true;while($r_75adbc===true):$r_75adbc=($_75adbc!==-1)?false:true;echo $this->block_loop($a_75adbc,$c_75adbc,$this,$r_75adbc,++$_75adbc,'_75adbc');ob_start();?>
<?php $c_75adbc = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_75adbc=false;}if($c_75adbc ):?>

                              <?php $_a3ac63_old_params['_56c7c9']=$_a3ac63_local_params;$_a3ac63_old_vars['_56c7c9']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_56c7c9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_56c7c9'];?>

                            <?php endif;$c_75adbc=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_75adbc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_75adbc'];?>

                            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a893a0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a893a0'];?>

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
            <?php $_a3ac63_old_params['_9b48d1']=$_a3ac63_local_params;$_a3ac63_old_vars['_9b48d1']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9b48d1'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9b48d1'];?>

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
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_88e65b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_88e65b'];?>

          <?php $_a3ac63_old_params['_3f841d']=$_a3ac63_local_params;$_a3ac63_old_vars['_3f841d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_a3ac63_old_params['_a2bb07']=$_a3ac63_local_params;$_a3ac63_old_vars['_a2bb07']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
      <?php $_a3ac63_old_params['_c4be8a']=$_a3ac63_local_params;$_a3ac63_old_vars['_c4be8a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c4be8a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c4be8a'];?>

      <?php $_a3ac63_old_params['_3b1cb8']=$_a3ac63_local_params;$_a3ac63_old_vars['_3b1cb8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3b1cb8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3b1cb8'];?>

      <?php $_a3ac63_old_params['_f0f6f8']=$_a3ac63_local_params;$_a3ac63_old_vars['_f0f6f8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_a3ac63_old_params['_ba160f']=$_a3ac63_local_params;$_a3ac63_old_vars['_ba160f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ba160f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ba160f'];?>

          <?php $_a3ac63_old_params['_e6b833']=$_a3ac63_local_params;$_a3ac63_old_vars['_e6b833']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e6b833'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e6b833'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_a3ac63_old_params['_69e026']=$_a3ac63_local_params;$_a3ac63_old_vars['_69e026']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_69e026'];$_a3ac63_local_vars=$_a3ac63_old_vars['_69e026'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f0f6f8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f0f6f8'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_a3ac63_old_params['_8f1620']=$_a3ac63_local_params;$_a3ac63_old_vars['_8f1620']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_78d3e1']=$_a3ac63_local_params;$_a3ac63_old_vars['_78d3e1']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_fb5963=null;$_a3ac63_old_params['_fb5963']=$_a3ac63_local_params;$_a3ac63_old_vars['_fb5963']=$_a3ac63_local_vars;$a_fb5963=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_fb5963=-1;$r_fb5963=true;while($r_fb5963===true):$r_fb5963=($_fb5963!==-1)?false:true;echo $this->block_loop($a_fb5963,$c_fb5963,$this,$r_fb5963,++$_fb5963,'_fb5963');ob_start();?>
<?php $c_fb5963 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fb5963=false;}if($c_fb5963 ):?>

            <?php $_a3ac63_old_params['_0eb5c2']=$_a3ac63_local_params;$_a3ac63_old_vars['_0eb5c2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0eb5c2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0eb5c2'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_a3ac63_old_params['_4095f5']=$_a3ac63_local_params;$_a3ac63_old_vars['_4095f5']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_a3ac63_old_params['_338f95']=$_a3ac63_local_params;$_a3ac63_old_vars['_338f95']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_338f95'];$_a3ac63_local_vars=$_a3ac63_old_vars['_338f95'];?>

                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4095f5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4095f5'];?>

                <?php $_a3ac63_old_params['_6c4fea']=$_a3ac63_local_params;$_a3ac63_old_vars['_6c4fea']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_a3ac63_old_params['_abfaac']=$_a3ac63_local_params;$_a3ac63_old_vars['_abfaac']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_e7fbcf']=$_a3ac63_local_params;$_a3ac63_old_vars['_e7fbcf']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e7fbcf'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e7fbcf'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_abfaac'];$_a3ac63_local_vars=$_a3ac63_old_vars['_abfaac'];?>

                <?php $_a3ac63_old_params['_7cf9a5']=$_a3ac63_local_params;$_a3ac63_old_vars['_7cf9a5']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7cf9a5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7cf9a5'];?>
">
                  <?php $_a3ac63_old_params['_7c0c30']=$_a3ac63_local_params;$_a3ac63_old_vars['_7c0c30']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7c0c30'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7c0c30'];?>

                  <input <?php $_a3ac63_old_params['_5afe9b']=$_a3ac63_local_params;$_a3ac63_old_vars['_5afe9b']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5afe9b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5afe9b'];?>
 <?php $_a3ac63_old_params['_e0a3d4']=$_a3ac63_local_params;$_a3ac63_old_vars['_e0a3d4']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e0a3d4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e0a3d4'];?>
<?php $_a3ac63_old_params['_389a0b']=$_a3ac63_local_params;$_a3ac63_old_vars['_389a0b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_389a0b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_389a0b'];?>
<?php $_a3ac63_old_params['_4f5d69']=$_a3ac63_local_params;$_a3ac63_old_vars['_4f5d69']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_c8368e']=$_a3ac63_local_params;$_a3ac63_old_vars['_c8368e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c8368e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c8368e'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4f5d69'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4f5d69'];?>
<?php $_a3ac63_old_params['_721e04']=$_a3ac63_local_params;$_a3ac63_old_vars['_721e04']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_721e04'];$_a3ac63_local_vars=$_a3ac63_old_vars['_721e04'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_a3ac63_old_params['_5d640f']=$_a3ac63_local_params;$_a3ac63_old_vars['_5d640f']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5d640f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5d640f'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6c4fea'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6c4fea'];?>

            <?php $_a3ac63_old_params['_f41444']=$_a3ac63_local_params;$_a3ac63_old_vars['_f41444']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f41444'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f41444'];?>

            <?php endif;$c_fb5963=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_fb5963'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fb5963'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_78d3e1'];$_a3ac63_local_vars=$_a3ac63_old_vars['_78d3e1'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8f1620'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8f1620'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_a3ac63_old_params['_ac3acc']=$_a3ac63_local_params;$_a3ac63_old_vars['_ac3acc']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_4b529e=null;$_a3ac63_old_params['_4b529e']=$_a3ac63_local_params;$_a3ac63_old_vars['_4b529e']=$_a3ac63_local_vars;$a_4b529e=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_4b529e=-1;$r_4b529e=true;while($r_4b529e===true):$r_4b529e=($_4b529e!==-1)?false:true;echo $this->block_loop($a_4b529e,$c_4b529e,$this,$r_4b529e,++$_4b529e,'_4b529e');ob_start();?>
<?php $c_4b529e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4b529e=false;}if($c_4b529e ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_a3ac63_old_params['_146a23']=$_a3ac63_local_params;$_a3ac63_old_vars['_146a23']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_146a23'];$_a3ac63_local_vars=$_a3ac63_old_vars['_146a23'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_4b529e=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_4b529e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4b529e'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_a3ac63_old_params['_8ac0f1']=$_a3ac63_local_params;$_a3ac63_old_vars['_8ac0f1']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8ac0f1'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8ac0f1'];?>
<?php $_a3ac63_old_params['_774e55']=$_a3ac63_local_params;$_a3ac63_old_vars['_774e55']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_774e55'];$_a3ac63_local_vars=$_a3ac63_old_vars['_774e55'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_a3ac63_old_params['_b0fb08']=$_a3ac63_local_params;$_a3ac63_old_vars['_b0fb08']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b0fb08'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b0fb08'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_a3ac63_old_params['_05ee04']=$_a3ac63_local_params;$_a3ac63_old_vars['_05ee04']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_05ee04'];$_a3ac63_local_vars=$_a3ac63_old_vars['_05ee04'];?>
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
                  <input type="checkbox" <?php $_a3ac63_old_params['_c6f1b4']=$_a3ac63_local_params;$_a3ac63_old_vars['_c6f1b4']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c6f1b4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c6f1b4'];?>
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
                  <input class="custom-control-input" type="radio" <?php $_a3ac63_old_params['_383af0']=$_a3ac63_local_params;$_a3ac63_old_vars['_383af0']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_383af0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_383af0'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_a3ac63_old_params['_10d5aa']=$_a3ac63_local_params;$_a3ac63_old_vars['_10d5aa']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_10d5aa'];$_a3ac63_local_vars=$_a3ac63_old_vars['_10d5aa'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ac3acc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ac3acc'];?>

            <div class="row form-group">
              <?php $c_5a3d0e=null;$_a3ac63_old_params['_5a3d0e']=$_a3ac63_local_params;$_a3ac63_old_vars['_5a3d0e']=$_a3ac63_local_vars;$a_5a3d0e=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_5a3d0e=-1;$r_5a3d0e=true;while($r_5a3d0e===true):$r_5a3d0e=($_5a3d0e!==-1)?false:true;echo $this->block_loop($a_5a3d0e,$c_5a3d0e,$this,$r_5a3d0e,++$_5a3d0e,'_5a3d0e');ob_start();?>
<?php $c_5a3d0e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5a3d0e=false;}if($c_5a3d0e ):?>

              <?php $_a3ac63_old_params['_772253']=$_a3ac63_local_params;$_a3ac63_old_vars['_772253']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_772253'];$_a3ac63_local_vars=$_a3ac63_old_vars['_772253'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_a3ac63_old_params['_adec6d']=$_a3ac63_local_params;$_a3ac63_old_vars['_adec6d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_adec6d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_adec6d'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_a3ac63_old_params['_9f62a1']=$_a3ac63_local_params;$_a3ac63_old_vars['_9f62a1']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_a9f7c7=null;$_a3ac63_old_params['_a9f7c7']=$_a3ac63_local_params;$_a3ac63_old_vars['_a9f7c7']=$_a3ac63_local_vars;$a_a9f7c7=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_a9f7c7=-1;$r_a9f7c7=true;while($r_a9f7c7===true):$r_a9f7c7=($_a9f7c7!==-1)?false:true;echo $this->block_loop($a_a9f7c7,$c_a9f7c7,$this,$r_a9f7c7,++$_a9f7c7,'_a9f7c7');ob_start();?>
<?php $c_a9f7c7 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a9f7c7=false;}if($c_a9f7c7 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_a3ac63_old_params['_eedf03']=$_a3ac63_local_params;$_a3ac63_old_vars['_eedf03']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_eedf03'];$_a3ac63_local_vars=$_a3ac63_old_vars['_eedf03'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_a9f7c7=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_a9f7c7'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a9f7c7'];?>

                </select>
              </div>
              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9f62a1'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9f62a1'];?>

              <?php endif;$c_5a3d0e=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_5a3d0e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5a3d0e'];?>

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

<?php $_a3ac63_old_params['_6760bd']=$_a3ac63_local_params;$_a3ac63_old_vars['_6760bd']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6760bd'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6760bd'];?>

<?php $_a3ac63_old_params['_b36c2b']=$_a3ac63_local_params;$_a3ac63_old_vars['_b36c2b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
      <?php $_a3ac63_old_params['_5f416d']=$_a3ac63_local_params;$_a3ac63_old_vars['_5f416d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5f416d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5f416d'];?>

    }
});
</script>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b36c2b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b36c2b'];?>

<?php endif;$_a2bb07=ob_get_clean();echo $this->modifier_trim_space($_a2bb07,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_a3ac63_local_params=$_a3ac63_old_params['_a2bb07'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a2bb07'];?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3f841d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3f841d'];?>

            <?php $_a3ac63_old_params['_affd3f']=$_a3ac63_local_params;$_a3ac63_old_vars['_affd3f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_a3ac63_old_params['_b8ecfc']=$_a3ac63_local_params;$_a3ac63_old_vars['_b8ecfc']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b8ecfc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b8ecfc'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_a3ac63_old_params['_32872a']=$_a3ac63_local_params;$_a3ac63_old_vars['_32872a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_32872a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_32872a'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_a3ac63_old_params['_7d3b41']=$_a3ac63_local_params;$_a3ac63_old_vars['_7d3b41']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_7cfbda=null;$_a3ac63_old_params['_7cfbda']=$_a3ac63_local_params;$_a3ac63_old_vars['_7cfbda']=$_a3ac63_local_vars;$a_7cfbda=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_7cfbda=-1;$r_7cfbda=true;while($r_7cfbda===true):$r_7cfbda=($_7cfbda!==-1)?false:true;echo $this->block_loop($a_7cfbda,$c_7cfbda,$this,$r_7cfbda,++$_7cfbda,'_7cfbda');ob_start();?>
<?php $c_7cfbda = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7cfbda=false;}if($c_7cfbda ):?>

                    <?php $_a3ac63_old_params['_7b2e51']=$_a3ac63_local_params;$_a3ac63_old_vars['_7b2e51']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7b2e51'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7b2e51'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_a3ac63_old_params['_fc362d']=$_a3ac63_local_params;$_a3ac63_old_vars['_fc362d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fc362d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fc362d'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_a3ac63_old_params['_361c76']=$_a3ac63_local_params;$_a3ac63_old_vars['_361c76']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_361c76'];$_a3ac63_local_vars=$_a3ac63_old_vars['_361c76'];?>

                  <?php endif;$c_7cfbda=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_7cfbda'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7cfbda'];?>

                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7d3b41'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7d3b41'];?>

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

<?php $_a3ac63_old_params['_20a48c']=$_a3ac63_local_params;$_a3ac63_old_vars['_20a48c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_20a48c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_20a48c'];?>

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
?<?php $_a3ac63_old_params['_3662d2']=$_a3ac63_local_params;$_a3ac63_old_vars['_3662d2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3662d2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3662d2'];?>
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
$('#drop-zone').css('border','3px dashed <?php $_a3ac63_old_params['_2c9bb6']=$_a3ac63_local_params;$_a3ac63_old_vars['_2c9bb6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2c9bb6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2c9bb6'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_a3ac63_old_params['_0dbecc']=$_a3ac63_local_params;$_a3ac63_old_vars['_0dbecc']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0dbecc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0dbecc'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_a3ac63_old_params['_3fae7c']=$_a3ac63_local_params;$_a3ac63_old_vars['_3fae7c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3fae7c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3fae7c'];?>
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
    <?php $_a3ac63_old_params['_472475']=$_a3ac63_local_params;$_a3ac63_old_vars['_472475']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_472475'];$_a3ac63_local_vars=$_a3ac63_old_vars['_472475'];?>

}
</script>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_affd3f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_affd3f'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_073bee'];$_a3ac63_local_vars=$_a3ac63_old_vars['_073bee'];?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_bba133']=$_a3ac63_local_params;$_a3ac63_old_vars['_bba133']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_a3ac63_old_params['_3096b4']=$_a3ac63_local_params;$_a3ac63_old_vars['_3096b4']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_a3ac63_old_params['_2d38c5']=$_a3ac63_local_params;$_a3ac63_old_vars['_2d38c5']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2d38c5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2d38c5'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_a3ac63_old_params['_cf7ca9']=$_a3ac63_local_params;$_a3ac63_old_vars['_cf7ca9']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_5ffd2c=null;$_a3ac63_old_params['_5ffd2c']=$_a3ac63_local_params;$_a3ac63_old_vars['_5ffd2c']=$_a3ac63_local_vars;$a_5ffd2c=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_5ffd2c=-1;$r_5ffd2c=true;while($r_5ffd2c===true):$r_5ffd2c=($_5ffd2c!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_5ffd2c,$c_5ffd2c,$this,$r_5ffd2c,++$_5ffd2c,'_5ffd2c');ob_start();?>
<?php $c_5ffd2c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5ffd2c=false;}if($c_5ffd2c ):?>

              <?php $_a3ac63_old_params['_963dfc']=$_a3ac63_local_params;$_a3ac63_old_vars['_963dfc']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_a3ac63_old_params['_bb99e8']=$_a3ac63_local_params;$_a3ac63_old_vars['_bb99e8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_a3ac63_old_params['_588491']=$_a3ac63_local_params;$_a3ac63_old_vars['_588491']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_a3ac63_old_params['_a144da']=$_a3ac63_local_params;$_a3ac63_old_vars['_a144da']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_a3ac63_old_params['_3fe8f9']=$_a3ac63_local_params;$_a3ac63_old_vars['_3fe8f9']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3fe8f9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3fe8f9'];?>

                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a144da'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a144da'];?>

                  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_588491'];$_a3ac63_local_vars=$_a3ac63_old_vars['_588491'];?>

                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_bb99e8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_bb99e8'];?>

                <?php $_a3ac63_old_params['_5b8929']=$_a3ac63_local_params;$_a3ac63_old_vars['_5b8929']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_a3ac63_old_params['_5a3c1f']=$_a3ac63_local_params;$_a3ac63_old_vars['_5a3c1f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5a3c1f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5a3c1f'];?>

                  <?php $_a3ac63_old_params['_49d122']=$_a3ac63_local_params;$_a3ac63_old_vars['_49d122']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_49d122'];$_a3ac63_local_vars=$_a3ac63_old_vars['_49d122'];?>

                  <label class="edit-options-child <?php $_a3ac63_old_params['_26b155']=$_a3ac63_local_params;$_a3ac63_old_vars['_26b155']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_26b155'];$_a3ac63_local_vars=$_a3ac63_old_vars['_26b155'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_a3ac63_old_params['_1cf44a']=$_a3ac63_local_params;$_a3ac63_old_vars['_1cf44a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1cf44a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1cf44a'];?>

                    <input<?php $_a3ac63_old_params['_481483']=$_a3ac63_local_params;$_a3ac63_old_vars['_481483']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_a3ac63_old_params['_f9a6b5']=$_a3ac63_local_params;$_a3ac63_old_vars['_f9a6b5']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_a3ac63_old_params['_604cdf']=$_a3ac63_local_params;$_a3ac63_old_vars['_604cdf']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_604cdf'];$_a3ac63_local_vars=$_a3ac63_old_vars['_604cdf'];?>

                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f9a6b5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f9a6b5'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_481483'];$_a3ac63_local_vars=$_a3ac63_old_vars['_481483'];?>
<?php $_a3ac63_old_params['_fa08ec']=$_a3ac63_local_params;$_a3ac63_old_vars['_fa08ec']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fa08ec'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fa08ec'];?>
 type="<?php $_a3ac63_old_params['_60594e']=$_a3ac63_local_params;$_a3ac63_old_vars['_60594e']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_60594e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_60594e'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_a3ac63_old_params['_129913']=$_a3ac63_local_params;$_a3ac63_old_vars['_129913']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_129913'];$_a3ac63_local_vars=$_a3ac63_old_vars['_129913'];?>
<?php $_a3ac63_old_params['_96ece4']=$_a3ac63_local_params;$_a3ac63_old_vars['_96ece4']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_96ece4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_96ece4'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5b8929'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5b8929'];?>

              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_963dfc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_963dfc'];?>

            <?php endif;$c_5ffd2c=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_5ffd2c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5ffd2c'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_cf7ca9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_cf7ca9'];?>

                <?php $c_994f79=null;$_a3ac63_old_params['_994f79']=$_a3ac63_local_params;$_a3ac63_old_vars['_994f79']=$_a3ac63_local_vars;$a_994f79=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_994f79=-1;$r_994f79=true;while($r_994f79===true):$r_994f79=($_994f79!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_994f79,$c_994f79,$this,$r_994f79,++$_994f79,'_994f79');ob_start();?>
<?php $c_994f79 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_994f79=false;}if($c_994f79 ):?>

                <?php $c_8f0bac=null;$_a3ac63_old_params['_8f0bac']=$_a3ac63_local_params;$_a3ac63_old_vars['_8f0bac']=$_a3ac63_local_vars;$a_8f0bac=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_8f0bac=ob_get_clean();$c_8f0bac=$this->block_setvarblock($a_8f0bac,$c_8f0bac,$this,$r_8f0bac,1,'_8f0bac');echo($c_8f0bac); $_a3ac63_local_params=$_a3ac63_old_params['_8f0bac'];?>

                <label class="<?php $_a3ac63_old_params['_d899e2']=$_a3ac63_local_params;$_a3ac63_old_vars['_d899e2']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d899e2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d899e2'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_a3ac63_old_params['_822484']=$_a3ac63_local_params;$_a3ac63_old_vars['_822484']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_822484'];$_a3ac63_local_vars=$_a3ac63_old_vars['_822484'];?>

                  <?php $_a3ac63_old_params['_b5f36d']=$_a3ac63_local_params;$_a3ac63_old_vars['_b5f36d']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b5f36d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b5f36d'];?>

                  <?php $_a3ac63_old_params['_8b4ad8']=$_a3ac63_local_params;$_a3ac63_old_vars['_8b4ad8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8b4ad8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8b4ad8'];?>
 <?php $_a3ac63_old_params['_ddd85d']=$_a3ac63_local_params;$_a3ac63_old_vars['_ddd85d']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ddd85d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ddd85d'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_a3ac63_old_params['_aee2a9']=$_a3ac63_local_params;$_a3ac63_old_vars['_aee2a9']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_aee2a9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_aee2a9'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_994f79=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_994f79'];$_a3ac63_local_vars=$_a3ac63_old_vars['_994f79'];?>

              <?php $_a3ac63_old_params['_e17c56']=$_a3ac63_local_params;$_a3ac63_old_vars['_e17c56']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e17c56'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e17c56'];?>

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
<?php endif;$_3096b4=ob_get_clean();echo $this->modifier_trim_space($_3096b4,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_a3ac63_local_params=$_a3ac63_old_params['_3096b4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3096b4'];?>

<script>
<?php $_a3ac63_old_params['_0dc84e']=$_a3ac63_local_params;$_a3ac63_old_vars['_0dc84e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0dc84e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0dc84e'];?>

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

<?php $_a3ac63_old_params['_c31fca']=$_a3ac63_local_params;$_a3ac63_old_vars['_c31fca']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c31fca'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c31fca'];?>

    }
    updateFieldSelector();
});
</script>
            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_bba133'];$_a3ac63_local_vars=$_a3ac63_old_vars['_bba133'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_78eb3b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_78eb3b'];?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_619397'];$_a3ac63_local_vars=$_a3ac63_old_vars['_619397'];?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_66f8a3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_66f8a3'];?>

  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f9a5c8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f9a5c8'];?>

  <?php $_a3ac63_old_params['_73db22']=$_a3ac63_local_params;$_a3ac63_old_vars['_73db22']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    
    <?php $_a3ac63_old_params['_137873']=$_a3ac63_local_params;$_a3ac63_old_vars['_137873']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php ob_start();$_a3ac63_old_params['_e9d6f0']=$_a3ac63_local_params;$_a3ac63_old_vars['_e9d6f0']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_a3ac63_old_params['_0a4801']=$_a3ac63_local_params;$_a3ac63_old_vars['_0a4801']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0a4801'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0a4801'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_a3ac63_old_params['_1bd276']=$_a3ac63_local_params;$_a3ac63_old_vars['_1bd276']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_c85fd0=null;$_a3ac63_old_params['_c85fd0']=$_a3ac63_local_params;$_a3ac63_old_vars['_c85fd0']=$_a3ac63_local_vars;$a_c85fd0=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_c85fd0=-1;$r_c85fd0=true;while($r_c85fd0===true):$r_c85fd0=($_c85fd0!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_c85fd0,$c_c85fd0,$this,$r_c85fd0,++$_c85fd0,'_c85fd0');ob_start();?>
<?php $c_c85fd0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c85fd0=false;}if($c_c85fd0 ):?>

              <?php $_a3ac63_old_params['_01e7e6']=$_a3ac63_local_params;$_a3ac63_old_vars['_01e7e6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_a3ac63_old_params['_c2595c']=$_a3ac63_local_params;$_a3ac63_old_vars['_c2595c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_a3ac63_old_params['_0931e2']=$_a3ac63_local_params;$_a3ac63_old_vars['_0931e2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_a3ac63_old_params['_9848db']=$_a3ac63_local_params;$_a3ac63_old_vars['_9848db']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_a3ac63_old_params['_42ae6a']=$_a3ac63_local_params;$_a3ac63_old_vars['_42ae6a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_42ae6a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_42ae6a'];?>

                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9848db'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9848db'];?>

                  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0931e2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0931e2'];?>

                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c2595c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c2595c'];?>

                <?php $_a3ac63_old_params['_49fd6b']=$_a3ac63_local_params;$_a3ac63_old_vars['_49fd6b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_a3ac63_old_params['_a076dd']=$_a3ac63_local_params;$_a3ac63_old_vars['_a076dd']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a076dd'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a076dd'];?>

                  <?php $_a3ac63_old_params['_f1c95b']=$_a3ac63_local_params;$_a3ac63_old_vars['_f1c95b']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f1c95b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f1c95b'];?>

                  <label class="edit-options-child <?php $_a3ac63_old_params['_ba1a02']=$_a3ac63_local_params;$_a3ac63_old_vars['_ba1a02']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ba1a02'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ba1a02'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_a3ac63_old_params['_90e60e']=$_a3ac63_local_params;$_a3ac63_old_vars['_90e60e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_90e60e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_90e60e'];?>

                    <input<?php $_a3ac63_old_params['_25d678']=$_a3ac63_local_params;$_a3ac63_old_vars['_25d678']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_a3ac63_old_params['_d967a2']=$_a3ac63_local_params;$_a3ac63_old_vars['_d967a2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_a3ac63_old_params['_4bb72d']=$_a3ac63_local_params;$_a3ac63_old_vars['_4bb72d']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4bb72d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4bb72d'];?>

                    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d967a2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d967a2'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_25d678'];$_a3ac63_local_vars=$_a3ac63_old_vars['_25d678'];?>
<?php $_a3ac63_old_params['_da354a']=$_a3ac63_local_params;$_a3ac63_old_vars['_da354a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_da354a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_da354a'];?>
 type="<?php $_a3ac63_old_params['_64fc70']=$_a3ac63_local_params;$_a3ac63_old_vars['_64fc70']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_64fc70'];$_a3ac63_local_vars=$_a3ac63_old_vars['_64fc70'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_a3ac63_old_params['_7c12c2']=$_a3ac63_local_params;$_a3ac63_old_vars['_7c12c2']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7c12c2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7c12c2'];?>
<?php $_a3ac63_old_params['_facc7f']=$_a3ac63_local_params;$_a3ac63_old_vars['_facc7f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_facc7f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_facc7f'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_49fd6b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_49fd6b'];?>

              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_01e7e6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_01e7e6'];?>

            <?php endif;$c_c85fd0=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_c85fd0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c85fd0'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1bd276'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1bd276'];?>

                <?php $c_b55936=null;$_a3ac63_old_params['_b55936']=$_a3ac63_local_params;$_a3ac63_old_vars['_b55936']=$_a3ac63_local_vars;$a_b55936=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_b55936=-1;$r_b55936=true;while($r_b55936===true):$r_b55936=($_b55936!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_b55936,$c_b55936,$this,$r_b55936,++$_b55936,'_b55936');ob_start();?>
<?php $c_b55936 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b55936=false;}if($c_b55936 ):?>

                <?php $c_e84501=null;$_a3ac63_old_params['_e84501']=$_a3ac63_local_params;$_a3ac63_old_vars['_e84501']=$_a3ac63_local_vars;$a_e84501=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_e84501=ob_get_clean();$c_e84501=$this->block_setvarblock($a_e84501,$c_e84501,$this,$r_e84501,1,'_e84501');echo($c_e84501); $_a3ac63_local_params=$_a3ac63_old_params['_e84501'];?>

                <label class="<?php $_a3ac63_old_params['_faad32']=$_a3ac63_local_params;$_a3ac63_old_vars['_faad32']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_faad32'];$_a3ac63_local_vars=$_a3ac63_old_vars['_faad32'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_a3ac63_old_params['_be1db4']=$_a3ac63_local_params;$_a3ac63_old_vars['_be1db4']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_be1db4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_be1db4'];?>

                  <?php $_a3ac63_old_params['_360630']=$_a3ac63_local_params;$_a3ac63_old_vars['_360630']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_360630'];$_a3ac63_local_vars=$_a3ac63_old_vars['_360630'];?>

                  <?php $_a3ac63_old_params['_c5c7f2']=$_a3ac63_local_params;$_a3ac63_old_vars['_c5c7f2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c5c7f2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c5c7f2'];?>
 <?php $_a3ac63_old_params['_44da57']=$_a3ac63_local_params;$_a3ac63_old_vars['_44da57']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_44da57'];$_a3ac63_local_vars=$_a3ac63_old_vars['_44da57'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_a3ac63_old_params['_da7d86']=$_a3ac63_local_params;$_a3ac63_old_vars['_da7d86']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_da7d86'];$_a3ac63_local_vars=$_a3ac63_old_vars['_da7d86'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_b55936=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_b55936'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b55936'];?>

              <?php $_a3ac63_old_params['_503bed']=$_a3ac63_local_params;$_a3ac63_old_vars['_503bed']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_503bed'];$_a3ac63_local_vars=$_a3ac63_old_vars['_503bed'];?>

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
<?php endif;$_e9d6f0=ob_get_clean();echo $this->modifier_trim_space($_e9d6f0,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_a3ac63_local_params=$_a3ac63_old_params['_e9d6f0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e9d6f0'];?>

<script>
<?php $_a3ac63_old_params['_948c2a']=$_a3ac63_local_params;$_a3ac63_old_vars['_948c2a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_948c2a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_948c2a'];?>

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

<?php $_a3ac63_old_params['_fe20a6']=$_a3ac63_local_params;$_a3ac63_old_vars['_fe20a6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fe20a6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fe20a6'];?>

    }
    updateFieldSelector();
});
</script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_137873'];$_a3ac63_local_vars=$_a3ac63_old_vars['_137873'];?>

  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_73db22'];$_a3ac63_local_vars=$_a3ac63_old_vars['_73db22'];?>

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
<?php $_a3ac63_old_params['_68e01b']=$_a3ac63_local_params;$_a3ac63_old_vars['_68e01b']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'output_container','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="container-fluid">
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_68e01b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_68e01b'];?>

      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 id="page-title" <?php $_a3ac63_old_params['_5beb0d']=$_a3ac63_local_params;$_a3ac63_old_vars['_5beb0d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_605d4c']=$_a3ac63_local_params;$_a3ac63_old_vars['_605d4c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_0aa9c2']=$_a3ac63_local_params;$_a3ac63_old_vars['_0aa9c2']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-top:-33px"<?php else:?>
style="margin-top:-36px"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0aa9c2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0aa9c2'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_605d4c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_605d4c'];?>
 class="title-with-opt"<?php else:?>
 <?php $_a3ac63_old_params['_a0eb37']=$_a3ac63_local_params;$_a3ac63_old_vars['_a0eb37']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_0ebdb2']=$_a3ac63_local_params;$_a3ac63_old_vars['_0ebdb2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="margin-top:-3px"<?php else:?>
style="margin-top:-11px"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0ebdb2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0ebdb2'];?>
<?php else:?>
style="margin-top:-10px"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a0eb37'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a0eb37'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5beb0d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5beb0d'];?>
>
          <span class="title">
          <?php $_a3ac63_old_params['_3f7a16']=$_a3ac63_local_params;$_a3ac63_old_vars['_3f7a16']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_e0578f']=$_a3ac63_local_params;$_a3ac63_old_vars['_e0578f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_a3ac63_old_params['_abb72f']=$_a3ac63_local_params;$_a3ac63_old_vars['_abb72f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.revision_select','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_abb72f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_abb72f'];?>
"><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e0578f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e0578f'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_3f7a16'];$_a3ac63_local_vars=$_a3ac63_old_vars['_3f7a16'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
<?php $_a3ac63_old_params['_d81227']=$_a3ac63_local_params;$_a3ac63_old_vars['_d81227']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_51b978']=$_a3ac63_local_params;$_a3ac63_old_vars['_51b978']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_51b978'];$_a3ac63_local_vars=$_a3ac63_old_vars['_51b978'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d81227'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d81227'];?>

          </span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

      <?php $_a3ac63_old_params['_a5e368']=$_a3ac63_local_params;$_a3ac63_old_vars['_a5e368']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_a3ac63_old_params['_fd4401']=$_a3ac63_local_params;$_a3ac63_old_vars['_fd4401']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_a3ac63_old_params['_bcac19']=$_a3ac63_local_params;$_a3ac63_old_vars['_bcac19']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_84e5a4']=$_a3ac63_local_params;$_a3ac63_old_vars['_84e5a4']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_e49370']=$_a3ac63_local_params;$_a3ac63_old_vars['_e49370']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_7adc46']=$_a3ac63_local_params;$_a3ac63_old_vars['_7adc46']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7adc46'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7adc46'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e49370'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e49370'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_84e5a4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_84e5a4'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_bcac19'];$_a3ac63_local_vars=$_a3ac63_old_vars['_bcac19'];?>

        <?php $_a3ac63_old_params['_4aa606']=$_a3ac63_local_params;$_a3ac63_old_vars['_4aa606']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_create','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_6439d3']=$_a3ac63_local_params;$_a3ac63_old_vars['_6439d3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_a3ac63_old_params['_af58e8']=$_a3ac63_local_params;$_a3ac63_old_vars['_af58e8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_a3ac63_old_params['_7c245a']=$_a3ac63_local_params;$_a3ac63_old_vars['_7c245a']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7c245a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7c245a'];?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_af58e8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_af58e8'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6439d3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6439d3'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4aa606'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4aa606'];?>

        <?php $_a3ac63_old_params['_fe938f']=$_a3ac63_local_params;$_a3ac63_old_vars['_fe938f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_cbc2d0']=$_a3ac63_local_params;$_a3ac63_old_vars['_cbc2d0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_a3ac63_old_params['_491d3f']=$_a3ac63_local_params;$_a3ac63_old_vars['_491d3f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'orig_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('orig_label','setvar',$this),$this,'setvar')?>

              <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Syetem\'s Role','setvar'=>'label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_491d3f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_491d3f'];?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_a3ac63_old_params['_fbc0c0']=$_a3ac63_local_params;$_a3ac63_old_vars['_fbc0c0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_022b9e']=$_a3ac63_local_params;$_a3ac63_old_vars['_022b9e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_022b9e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_022b9e'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fbc0c0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fbc0c0'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_a3ac63_old_params['_13087c']=$_a3ac63_local_params;$_a3ac63_old_vars['_13087c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_13087c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_13087c'];?>

            <?php $_a3ac63_old_params['_5e7088']=$_a3ac63_local_params;$_a3ac63_old_vars['_5e7088']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_32418a']=$_a3ac63_local_params;$_a3ac63_old_vars['_32418a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_32418a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_32418a'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5e7088'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5e7088'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_cbc2d0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_cbc2d0'];?>

          <?php $_a3ac63_old_params['_4b9baf']=$_a3ac63_local_params;$_a3ac63_old_vars['_4b9baf']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_a3ac63_old_params['_0831a8']=$_a3ac63_local_params;$_a3ac63_old_vars['_0831a8']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_a3ac63_old_params['_8644a9']=$_a3ac63_local_params;$_a3ac63_old_vars['_8644a9']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_437ede']=$_a3ac63_local_params;$_a3ac63_old_vars['_437ede']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_842b93']=$_a3ac63_local_params;$_a3ac63_old_vars['_842b93']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_842b93'];$_a3ac63_local_vars=$_a3ac63_old_vars['_842b93'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_437ede'];$_a3ac63_local_vars=$_a3ac63_old_vars['_437ede'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8644a9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8644a9'];?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0831a8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0831a8'];?>

            <?php $_a3ac63_old_params['_92fc8d']=$_a3ac63_local_params;$_a3ac63_old_vars['_92fc8d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_a3ac63_old_params['_bcdddc']=$_a3ac63_local_params;$_a3ac63_old_vars['_bcdddc']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_a3ac63_old_params['_d5a4a7']=$_a3ac63_local_params;$_a3ac63_old_vars['_d5a4a7']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_0021fe']=$_a3ac63_local_params;$_a3ac63_old_vars['_0021fe']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0021fe'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0021fe'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d5a4a7'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d5a4a7'];?>

            <?php else:?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_a3ac63_old_params['_7266c3']=$_a3ac63_local_params;$_a3ac63_old_vars['_7266c3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_7266c3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_7266c3'];?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_a3ac63_old_params['_4880c3']=$_a3ac63_local_params;$_a3ac63_old_vars['_4880c3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_6c15e0']=$_a3ac63_local_params;$_a3ac63_old_vars['_6c15e0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6c15e0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6c15e0'];?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4880c3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4880c3'];?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_bcdddc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_bcdddc'];?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_92fc8d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_92fc8d'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4b9baf'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4b9baf'];?>

          <?php $_a3ac63_old_params['_f1d4c6']=$_a3ac63_local_params;$_a3ac63_old_vars['_f1d4c6']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_a3ac63_old_params['_5e9894']=$_a3ac63_local_params;$_a3ac63_old_vars['_5e9894']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_a3ac63_old_params['_8ff349']=$_a3ac63_local_params;$_a3ac63_old_vars['_8ff349']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8ff349'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8ff349'];?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5e9894'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5e9894'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f1d4c6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f1d4c6'];?>

        <?php else:?>

          <?php $_a3ac63_old_params['_cb9ac7']=$_a3ac63_local_params;$_a3ac63_old_vars['_cb9ac7']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_a3ac63_old_params['_4e7198']=$_a3ac63_local_params;$_a3ac63_old_vars['_4e7198']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4e7198'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4e7198'];?>

            <?php $_a3ac63_old_params['_025895']=$_a3ac63_local_params;$_a3ac63_old_vars['_025895']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','eq'=>'comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_025895'];$_a3ac63_local_vars=$_a3ac63_old_vars['_025895'];?>

            <?php $_a3ac63_old_params['_5bea7d']=$_a3ac63_local_params;$_a3ac63_old_vars['_5bea7d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_return_to_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5bea7d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5bea7d'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_cb9ac7'];$_a3ac63_local_vars=$_a3ac63_old_vars['_cb9ac7'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fe938f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fe938f'];?>

          <?php $_a3ac63_old_params['_0acac9']=$_a3ac63_local_params;$_a3ac63_old_vars['_0acac9']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0acac9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0acac9'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_fd4401'];$_a3ac63_local_vars=$_a3ac63_old_vars['_fd4401'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a5e368'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a5e368'];?>

      <?php $_a3ac63_old_params['_d979f2']=$_a3ac63_local_params;$_a3ac63_old_vars['_d979f2']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_a3ac63_old_params['_781d35']=$_a3ac63_local_params;$_a3ac63_old_vars['_781d35']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_82798c']=$_a3ac63_local_params;$_a3ac63_old_vars['_82798c']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_a3ac63_old_params['_4cfe14']=$_a3ac63_local_params;$_a3ac63_old_vars['_4cfe14']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

          <?php $_a3ac63_old_params['_649fa1']=$_a3ac63_local_params;$_a3ac63_old_vars['_649fa1']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;manage_revision=1">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Revision','this_tag'=>'trans'],null,$this),$this)?>

          </a>
          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_649fa1'];$_a3ac63_local_vars=$_a3ac63_old_vars['_649fa1'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4cfe14'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4cfe14'];?>

          <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_82798c'];$_a3ac63_local_vars=$_a3ac63_old_vars['_82798c'];?>

        <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_781d35'];$_a3ac63_local_vars=$_a3ac63_old_vars['_781d35'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d979f2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d979f2'];?>

      <?php $_a3ac63_old_params['_f2353a']=$_a3ac63_local_params;$_a3ac63_old_vars['_f2353a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_a3ac63_old_params['_b91cfd']=$_a3ac63_local_params;$_a3ac63_old_vars['_b91cfd']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_a3ac63_old_params['_556e19']=$_a3ac63_local_params;$_a3ac63_old_vars['_556e19']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="btn btn-sm header-btn-icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="hidden fa fa-home" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
"></i>
          <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </a>
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_556e19'];$_a3ac63_local_vars=$_a3ac63_old_vars['_556e19'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_b91cfd'];$_a3ac63_local_vars=$_a3ac63_old_vars['_b91cfd'];?>

      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f2353a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f2353a'];?>

          </h1>
    <?php $c_c75f0f=null;$_a3ac63_old_params['_c75f0f']=$_a3ac63_local_params;$_a3ac63_old_vars['_c75f0f']=$_a3ac63_local_vars;$a_c75f0f=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_c75f0f=ob_get_clean();$c_c75f0f=$this->block_setvarblock($a_c75f0f,$c_c75f0f,$this,$r_c75f0f,1,'_c75f0f');echo($c_c75f0f); $_a3ac63_local_params=$_a3ac63_old_params['_c75f0f'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_a3ac63_old_params['_6a2a18']=$_a3ac63_local_params;$_a3ac63_old_vars['_6a2a18']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-<?php $_a3ac63_old_params['_17134f']=$_a3ac63_local_params;$_a3ac63_old_vars['_17134f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_class','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'header_alert_class','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
success<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_17134f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_17134f'];?>
" tabindex="0">
      <?php $_a3ac63_old_params['_60a239']=$_a3ac63_local_params;$_a3ac63_old_vars['_60a239']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'header_alert_force','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_60a239'];$_a3ac63_local_vars=$_a3ac63_old_vars['_60a239'];?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

      <?php $_a3ac63_old_params['_0f8500']=$_a3ac63_local_params;$_a3ac63_old_vars['_0f8500']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_a3ac63_old_params['_c25737']=$_a3ac63_local_params;$_a3ac63_old_vars['_c25737']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c25737'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c25737'];?>
" class="popup">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

        </a>
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0f8500'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0f8500'];?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6a2a18'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6a2a18'];?>

    <?php $_a3ac63_old_params['_4fdaac']=$_a3ac63_local_params;$_a3ac63_old_vars['_4fdaac']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4fdaac'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4fdaac'];?>


<div class="table-screen">
<?php $c_146eec=null;$_a3ac63_old_params['_146eec']=$_a3ac63_local_params;$_a3ac63_old_vars['_146eec']=$_a3ac63_local_vars;$a_146eec=$this->setup_args(['name'=>'errors','this_tag'=>'loop'],null,$this);$_146eec=-1;$r_146eec=true;while($r_146eec===true):$r_146eec=($_146eec!==-1)?false:true;echo $this->block_loop($a_146eec,$c_146eec,$this,$r_146eec,++$_146eec,'_146eec');ob_start();?>
<?php $c_146eec = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_146eec=false;}if($c_146eec ):?>

<?php $_a3ac63_old_params['_a2770a']=$_a3ac63_local_params;$_a3ac63_old_vars['_a2770a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div id="alert-scheme_errors" class="alert alert-danger" role="alert" tabindex="0">
<ul class="parser_errors list-group list-group-flush"><?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a2770a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a2770a'];?>

<li><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</li>
<?php $_a3ac63_old_params['_0bdc62']=$_a3ac63_local_params;$_a3ac63_old_vars['_0bdc62']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</ul></div>
<script>
$('#alert-scheme_errors').focus();
</script>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_0bdc62'];$_a3ac63_local_vars=$_a3ac63_old_vars['_0bdc62'];?>

<?php endif;$c_146eec=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_146eec'];$_a3ac63_local_vars=$_a3ac63_old_vars['_146eec'];?>


<?php $_a3ac63_old_params['_a03f76']=$_a3ac63_local_params;$_a3ac63_old_vars['_a03f76']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved_changes','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-success">
    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.saved_changes','setvar'=>'upgraded_count','this_tag'=>'var'],null,$this),$this),$this->setup_args('upgraded_count','setvar',$this),$this,'setvar')?>

  <?php $_a3ac63_old_params['_2fde61']=$_a3ac63_local_params;$_a3ac63_old_vars['_2fde61']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgraded_count','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade 1 scheme.','this_tag'=>'trans'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade %s schemes.','params'=>'$upgraded_count','this_tag'=>'trans'],null,$this),$this)?>

  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2fde61'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2fde61'];?>

  </div>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a03f76'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a03f76'];?>


<?php $_a3ac63_old_params['_677f51']=$_a3ac63_local_params;$_a3ac63_old_vars['_677f51']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_a3ac63_old_params['_2f63c7']=$_a3ac63_local_params;$_a3ac63_old_vars['_2f63c7']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-warning" id="alert-upgrade" tabindex="0">
      <strong><?php echo $this->function_trans($this->setup_args(['phrase'=>'We do not recommend upgrading multiple models at the same time. We recommend doing them one at a time.','this_tag'=>'trans'],null,$this),$this)?>
</strong>
  </div>
  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2f63c7'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2f63c7'];?>

  <div class="alert alert-warning" <?php $_a3ac63_old_params['_4c13e3']=$_a3ac63_local_params;$_a3ac63_old_vars['_4c13e3']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php else:?>
id="alert-upgrade"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4c13e3'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4c13e3'];?>
 tabindex="0">
    <?php $_a3ac63_old_params['_5b8343']=$_a3ac63_local_params;$_a3ac63_old_vars['_5b8343']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'There is one upgrade.','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'There are %s upgrades.','params'=>'$upgrade_count','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5b8343'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5b8343'];?>

  </div>
<script>
$('#alert-upgrade').focus();
</script>
<?php else:?>

  <div class="alert alert-success">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'There is no upgrade.','this_tag'=>'trans'],null,$this),$this)?>

  </div>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_677f51'];$_a3ac63_local_vars=$_a3ac63_old_vars['_677f51'];?>


<?php $c_fee0e4=null;$_a3ac63_old_params['_fee0e4']=$_a3ac63_local_params;$_a3ac63_old_vars['_fee0e4']=$_a3ac63_local_vars;$a_fee0e4=$this->setup_args(['name'=>'table_header','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <tr>
  <?php $_a3ac63_old_params['_e4376e']=$_a3ac63_local_params;$_a3ac63_old_vars['_e4376e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <th class="all-selector cb-col">
    <label class="custom-control custom-checkbox">
      <input type="checkbox" class="selector custom-control-input cb-all-select">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description"></span>
    </label>
  </th>
  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_e4376e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_e4376e'];?>

  <th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Name','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Component','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <th class="short-col"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Version of Scheme','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <th class="short-col"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Version of Database','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <?php $_a3ac63_old_params['_ed6f0f']=$_a3ac63_local_params;$_a3ac63_old_vars['_ed6f0f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <th class="short-col"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ed6f0f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ed6f0f'];?>

</tr>
<?php $c_fee0e4=ob_get_clean();$c_fee0e4=$this->block_setvarblock($a_fee0e4,$c_fee0e4,$this,$r_fee0e4,1,'_fee0e4');echo($c_fee0e4); $_a3ac63_local_params=$_a3ac63_old_params['_fee0e4'];?>


<?php $_a3ac63_old_params['_108e4e']=$_a3ac63_local_params;$_a3ac63_old_vars['_108e4e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
<input type="hidden" name="__mode" value="manage_scheme">
<input type="hidden" name="magic_token" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'magic_token','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="_type" value="upgrade">
<div class="form-group">
  <button type="submit" class="upgrade-btn btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade','this_tag'=>'trans'],null,$this),$this)?>
</button>
</div>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_108e4e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_108e4e'];?>


<table class="table table-striped table-sm listing-table table-hover">
<thead>
  <?php echo $this->function_var($this->setup_args(['name'=>'table_header','this_tag'=>'var'],null,$this),$this)?>

</thead>
<tbody id="list_body">
<?php $c_ed37aa=null;$_a3ac63_old_params['_ed37aa']=$_a3ac63_local_params;$_a3ac63_old_vars['_ed37aa']=$_a3ac63_local_vars;$a_ed37aa=$this->setup_args(['name'=>'schemes','this_tag'=>'loop'],null,$this);$_ed37aa=-1;$r_ed37aa=true;while($r_ed37aa===true):$r_ed37aa=($_ed37aa!==-1)?false:true;echo $this->block_loop($a_ed37aa,$c_ed37aa,$this,$r_ed37aa,++$_ed37aa,'_ed37aa');ob_start();?>
<?php $c_ed37aa = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ed37aa=false;}if($c_ed37aa ):?>

<?php $_a3ac63_old_params['_ce9f8f']=$_a3ac63_local_params;$_a3ac63_old_vars['_ce9f8f']=$_a3ac63_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'invalid','value'=>'$model','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'is_error','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php else:?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'is_error','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ce9f8f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ce9f8f'];?>

<tr id="line_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_a3ac63_old_params['_17ad95']=$_a3ac63_local_params;$_a3ac63_old_vars['_17ad95']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'is_error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_a3ac63_old_params['_88503a']=$_a3ac63_local_params;$_a3ac63_old_vars['_88503a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_version','vc'=>'$db_version','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
class="active-cell"<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'db_version','eq'=>'0','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
class="active-cell"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_88503a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_88503a'];?>
<?php else:?>
class="table-danger"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_17ad95'];$_a3ac63_local_vars=$_a3ac63_old_vars['_17ad95'];?>
>
  <?php $_a3ac63_old_params['_75e960']=$_a3ac63_local_params;$_a3ac63_old_vars['_75e960']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <th class="cb-col">
<?php $_a3ac63_old_params['_a272a8']=$_a3ac63_local_params;$_a3ac63_old_vars['_a272a8']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'is_error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_a3ac63_old_params['_296f4e']=$_a3ac63_local_params;$_a3ac63_old_vars['_296f4e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_version','vc'=>'$db_version','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <label class="custom-control custom-checkbox">
      <input id="box_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" type="checkbox" class="custom-control-input" name="model[]" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description"></span>
    </label>
  <?php else:?>

    <?php $_a3ac63_old_params['_d75ef4']=$_a3ac63_local_params;$_a3ac63_old_vars['_d75ef4']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'scheme_version','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_a3ac63_old_params['_4939e9']=$_a3ac63_local_params;$_a3ac63_old_vars['_4939e9']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'db_version','eq'=>'0','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <label class="custom-control custom-checkbox">
      <input id="box_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" type="checkbox" class="custom-control-input" name="model[]" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description"></span>
    </label>
    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4939e9'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4939e9'];?>

    <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d75ef4'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d75ef4'];?>

  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_296f4e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_296f4e'];?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a272a8'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a272a8'];?>

  </th>
  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_75e960'];$_a3ac63_local_vars=$_a3ac63_old_vars['_75e960'];?>

  <td><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</td>
  <td><?php $_a3ac63_old_params['_cc799a']=$_a3ac63_local_params;$_a3ac63_old_vars['_cc799a']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'component','eq'=>'core','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
prototype<?php else:?>
<?php echo paml_htmlspecialchars(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'component','lower_case'=>'','escape'=>'','this_tag'=>'var'],null,$this),$this)),ENT_QUOTES)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_cc799a'];$_a3ac63_local_vars=$_a3ac63_old_vars['_cc799a'];?>
</td>
  <td><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'scheme_version','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</td>
  <td><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'db_version','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</td>
  <?php $_a3ac63_old_params['_5c93ea']=$_a3ac63_local_params;$_a3ac63_old_vars['_5c93ea']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <td>
  <?php $_a3ac63_old_params['_9a0aa0']=$_a3ac63_local_params;$_a3ac63_old_vars['_9a0aa0']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_version','gt'=>'$db_version','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Checked','this_tag'=>'trans'],null,$this),$this)?>
</span>
  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'db_version','eq'=>'0','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Checked','this_tag'=>'trans'],null,$this),$this)?>
</span>
  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_9a0aa0'];$_a3ac63_local_vars=$_a3ac63_old_vars['_9a0aa0'];?>

  </td>
  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5c93ea'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5c93ea'];?>

</tr>
<?php endif;$c_ed37aa=ob_get_clean();endwhile; $_a3ac63_local_params=$_a3ac63_old_params['_ed37aa'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ed37aa'];?>

</tbody>
<tfoot>
  <?php echo $this->function_var($this->setup_args(['name'=>'table_header','this_tag'=>'var'],null,$this),$this)?>

</tfoot>
</table>
<?php $_a3ac63_old_params['_317305']=$_a3ac63_local_params;$_a3ac63_old_vars['_317305']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div <?php $_a3ac63_old_params['_8be899']=$_a3ac63_local_params;$_a3ac63_old_vars['_8be899']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
class="form-group edit-action-bar pl-2" style="margin-left:-15px;margin-right:-15px"<?php else:?>
class="form-group"<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8be899'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8be899'];?>
>
  <button type="submit" class="upgrade-btn btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade','this_tag'=>'trans'],null,$this),$this)?>
</button>
</div>
</form>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_317305'];$_a3ac63_local_vars=$_a3ac63_old_vars['_317305'];?>

</div>

<script>
var in_link = false;
var is_all  = false;
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
function set_all_select () {
    is_all = true;
    $("input[name='model[]']").each(function(){
        if ( $(this).prop('checked') == false ) {
            is_all = false;
            return false;
        }
    });
    $('.selector').prop('checked', is_all );
}
$("input[name='model[]']").change(function(){
    set_all_select();
});
$('.selector').click(function(){
    checked = $(this).prop('checked');
    $("input[name='model[]']").each(function(){
        $(this).prop('checked', checked);
    });
    $('.selector').prop('checked', checked);
});
$('.upgrade-btn').click(function() {
    if ( item_checked( true ) == 0 ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any scheme.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to upgrade selected scheme(s)?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
});
var selected_item_count;
function item_checked( count ) {
    selected_item_count = 0;
    var selected = false;
    $("input[name='model[]']").each(function(){
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
$(":checkbox").keypress(function(e) {
    if ( e.keyCode == 13 ) {
        if ( $(this).prop('checked') ) {
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }
        if ( $(this).hasClass('cb-all-select') ) {
            checked = $(this).prop('checked');
            $("input[name='model[]']").each(function(){
                $(this).prop('checked', checked);
            });
            $('.selector').prop('checked', checked);
        } else {
            set_all_select();
        }
    }
    return false;
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

  <?php $_a3ac63_old_params['_c8e96b']=$_a3ac63_local_params;$_a3ac63_old_vars['_c8e96b']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'copyright','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <footer class="footer bar">
      <?php $_a3ac63_old_params['_a39336']=$_a3ac63_local_params;$_a3ac63_old_vars['_a39336']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <span class="copyright"><?php echo $this->modifier_eval($this->function_var($this->setup_args(['name'=>'copyright','eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval')?>
</span>
      <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a39336'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a39336'];?>

    </footer>
  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_c8e96b'];$_a3ac63_local_vars=$_a3ac63_old_vars['_c8e96b'];?>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"RebuildPopupWindow","width=420,height=<?php $_a3ac63_old_params['_4f7c72']=$_a3ac63_local_params;$_a3ac63_old_vars['_4f7c72']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
360<?php else:?>
320<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4f7c72'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4f7c72'];?>
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
<?php $_a3ac63_old_params['_ae3a8d']=$_a3ac63_local_params;$_a3ac63_old_vars['_ae3a8d']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_a3ac63_old_params['_d83cf7']=$_a3ac63_local_params;$_a3ac63_old_vars['_d83cf7']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_a3ac63_old_params['_d5b9bb']=$_a3ac63_local_params;$_a3ac63_old_vars['_d5b9bb']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_a3ac63_old_params['_960047']=$_a3ac63_local_params;$_a3ac63_old_vars['_960047']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_960047'];$_a3ac63_local_vars=$_a3ac63_old_vars['_960047'];?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d5b9bb'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d5b9bb'];?>

<?php $_a3ac63_old_params['_f35ac6']=$_a3ac63_local_params;$_a3ac63_old_vars['_f35ac6']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_a3ac63_old_params['_2ddee7']=$_a3ac63_local_params;$_a3ac63_old_vars['_2ddee7']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2ddee7'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2ddee7'];?>

<?php $_a3ac63_old_params['_d6a0cd']=$_a3ac63_local_params;$_a3ac63_old_vars['_d6a0cd']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d6a0cd'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d6a0cd'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f35ac6'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f35ac6'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_a3ac63_old_params['_95d389']=$_a3ac63_local_params;$_a3ac63_old_vars['_95d389']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_95d389'];$_a3ac63_local_vars=$_a3ac63_old_vars['_95d389'];?>

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
?__mode=view&_type=list&_model=asset<?php $_a3ac63_old_params['_a65d41']=$_a3ac63_local_params;$_a3ac63_old_vars['_a65d41']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a65d41'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a65d41'];?>
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
?__mode=view&_type=list&_model=asset<?php $_a3ac63_old_params['_dd9085']=$_a3ac63_local_params;$_a3ac63_old_vars['_dd9085']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_dd9085'];$_a3ac63_local_vars=$_a3ac63_old_vars['_dd9085'];?>
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
            <?php $_a3ac63_old_params['_f73904']=$_a3ac63_local_params;$_a3ac63_old_vars['_f73904']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_a3ac63_old_params['_2ccd79']=$_a3ac63_local_params;$_a3ac63_old_vars['_2ccd79']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2ccd79'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2ccd79'];?>

                <?php $_a3ac63_old_params['_918015']=$_a3ac63_local_params;$_a3ac63_old_vars['_918015']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_918015'];$_a3ac63_local_vars=$_a3ac63_old_vars['_918015'];?>

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
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_f73904'];$_a3ac63_local_vars=$_a3ac63_old_vars['_f73904'];?>

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
<?php $_a3ac63_old_params['_8f5455']=$_a3ac63_local_params;$_a3ac63_old_vars['_8f5455']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_a3ac63_old_params['_ea765f']=$_a3ac63_local_params;$_a3ac63_old_vars['_ea765f']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ea765f'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ea765f'];?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8f5455'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8f5455'];?>

<?php $_a3ac63_old_params['_8c62c2']=$_a3ac63_local_params;$_a3ac63_old_vars['_8c62c2']=$_a3ac63_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_a3ac63_old_params['_1a4926']=$_a3ac63_local_params;$_a3ac63_old_vars['_1a4926']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1a4926'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1a4926'];?>

<?php $_a3ac63_old_params['_84237e']=$_a3ac63_local_params;$_a3ac63_old_vars['_84237e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_84237e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_84237e'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_8c62c2'];$_a3ac63_local_vars=$_a3ac63_old_vars['_8c62c2'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_a3ac63_old_params['_2d0c80']=$_a3ac63_local_params;$_a3ac63_old_vars['_2d0c80']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_2d0c80'];$_a3ac63_local_vars=$_a3ac63_old_vars['_2d0c80'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_a3ac63_old_params['_5bceb5']=$_a3ac63_local_params;$_a3ac63_old_vars['_5bceb5']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5bceb5'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5bceb5'];?>
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
                <?php $_a3ac63_old_params['_4f1391']=$_a3ac63_local_params;$_a3ac63_old_vars['_4f1391']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4f1391'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4f1391'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_a3ac63_old_params['_4a8176']=$_a3ac63_local_params;$_a3ac63_old_vars['_4a8176']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_4a8176'];$_a3ac63_local_vars=$_a3ac63_old_vars['_4a8176'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_a3ac63_old_params['_80fafe']=$_a3ac63_local_params;$_a3ac63_old_vars['_80fafe']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_80fafe'];$_a3ac63_local_vars=$_a3ac63_old_vars['_80fafe'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_a3ac63_old_params['_1b7780']=$_a3ac63_local_params;$_a3ac63_old_vars['_1b7780']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_1b7780'];$_a3ac63_local_vars=$_a3ac63_old_vars['_1b7780'];?>
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
            <?php $_a3ac63_old_params['_d6e20e']=$_a3ac63_local_params;$_a3ac63_old_vars['_d6e20e']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_a3ac63_old_params['_6db029']=$_a3ac63_local_params;$_a3ac63_old_vars['_6db029']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_6db029'];$_a3ac63_local_vars=$_a3ac63_old_vars['_6db029'];?>

                      <?php $_a3ac63_old_params['_5624dc']=$_a3ac63_local_params;$_a3ac63_old_vars['_5624dc']=$_a3ac63_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_5624dc'];$_a3ac63_local_vars=$_a3ac63_old_vars['_5624dc'];?>

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
            <?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d6e20e'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d6e20e'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_d83cf7'];$_a3ac63_local_vars=$_a3ac63_old_vars['_d83cf7'];?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_ae3a8d'];$_a3ac63_local_vars=$_a3ac63_old_vars['_ae3a8d'];?>

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
<?php $_a3ac63_old_params['_a899e1']=$_a3ac63_local_params;$_a3ac63_old_vars['_a899e1']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_a3ac63_old_params['_36a157']=$_a3ac63_local_params;$_a3ac63_old_vars['_36a157']=$_a3ac63_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'loading','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_36a157'];$_a3ac63_local_vars=$_a3ac63_old_vars['_36a157'];?>

<?php endif;$_a3ac63_local_params=$_a3ac63_old_params['_a899e1'];$_a3ac63_local_vars=$_a3ac63_old_vars['_a899e1'];?>

</script>
  </div>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>

<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\manage_scheme.tmpl' => 1697132444,
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
  'time' => 1744005715,
);?>