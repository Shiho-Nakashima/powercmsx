<?php ob_start();?><?php $_1972e2_vars=&$this->vars;$_1972e2_old_params=&$this->old_params;$_1972e2_local_params=&$this->local_params;$_1972e2_old_vars=&$this->old_vars;$_1972e2_local_vars=&$this->local_vars;?><?php $_1972e2_old_params['_757afa']=$_1972e2_local_params;$_1972e2_old_vars['_757afa']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_6fc721']=$_1972e2_local_params;$_1972e2_old_vars['_6fc721']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_fix_spacebar','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6fc721'];$_1972e2_local_vars=$_1972e2_old_vars['_6fc721'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_757afa'];$_1972e2_local_vars=$_1972e2_old_vars['_757afa'];?>

<!DOCTYPE html>
<html lang="<?php $_1972e2_old_params['_f33585']=$_1972e2_local_params;$_1972e2_old_vars['_f33585']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_1972e2_local_params=$_1972e2_old_params['_f33585'];$_1972e2_local_vars=$_1972e2_old_vars['_f33585'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_1972e2_old_params['_c6279f']=$_1972e2_local_params;$_1972e2_old_vars['_c6279f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c6279f'];$_1972e2_local_vars=$_1972e2_old_vars['_c6279f'];?>
<?php $_1972e2_old_params['_fb783a']=$_1972e2_local_params;$_1972e2_old_vars['_fb783a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_4d1d08']=$_1972e2_local_params;$_1972e2_old_vars['_4d1d08']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_4d1d08'];$_1972e2_local_vars=$_1972e2_old_vars['_4d1d08'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_fb783a'];$_1972e2_local_vars=$_1972e2_old_vars['_fb783a'];?>
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
    <?php $_1972e2_old_params['_49f77a']=$_1972e2_local_params;$_1972e2_old_vars['_49f77a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_96a127']=$_1972e2_local_params;$_1972e2_old_vars['_96a127']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_1972e2_old_params['_e4f7f6']=$_1972e2_local_params;$_1972e2_old_vars['_e4f7f6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e4f7f6'];$_1972e2_local_vars=$_1972e2_old_vars['_e4f7f6'];?>

      <?php $_1972e2_old_params['_91014d']=$_1972e2_local_params;$_1972e2_old_vars['_91014d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_91014d'];$_1972e2_local_vars=$_1972e2_old_vars['_91014d'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_96a127'];$_1972e2_local_vars=$_1972e2_old_vars['_96a127'];?>

      <?php $_1972e2_old_params['_05d56e']=$_1972e2_local_params;$_1972e2_old_vars['_05d56e']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_05d56e'];$_1972e2_local_vars=$_1972e2_old_vars['_05d56e'];?>

      <?php $_1972e2_old_params['_537b0f']=$_1972e2_local_params;$_1972e2_old_vars['_537b0f']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_537b0f'];$_1972e2_local_vars=$_1972e2_old_vars['_537b0f'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1020; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_49f77a'];$_1972e2_local_vars=$_1972e2_old_vars['_49f77a'];?>

      .fixed-top { z-index: 1030 !important; }
      .nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      .nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php $_1972e2_old_params['_167bda']=$_1972e2_local_params;$_1972e2_old_vars['_167bda']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_1972e2_old_params['_55a87f']=$_1972e2_local_params;$_1972e2_old_vars['_55a87f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar, .workspace-bar a,
      .workspace-bar .dropdown-menu{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar button.my-sm-0{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar .my-sm-0, .workspace-bar .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php endif;$_55a87f=ob_get_clean();echo paml_htmlspecialchars($_55a87f,ENT_QUOTES);$_1972e2_local_params=$_1972e2_old_params['_55a87f'];$_1972e2_local_vars=$_1972e2_old_vars['_55a87f'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_167bda'];$_1972e2_local_vars=$_1972e2_old_vars['_167bda'];?>

      <?php $_1972e2_old_params['_a92a7a']=$_1972e2_local_params;$_1972e2_old_vars['_a92a7a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a92a7a'];$_1972e2_local_vars=$_1972e2_old_vars['_a92a7a'];?>

      <?php $_1972e2_old_params['_406bb3']=$_1972e2_local_params;$_1972e2_old_vars['_406bb3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'panel_width','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.nav-link{ max-width: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'panel_width','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
px !important }<?php endif;$_1972e2_local_params=$_1972e2_old_params['_406bb3'];$_1972e2_local_vars=$_1972e2_old_vars['_406bb3'];?>

      .navbar .btn { width:35px }
      <?php $_1972e2_old_params['_31dda4']=$_1972e2_local_params;$_1972e2_old_vars['_31dda4']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'config','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_31dda4'];$_1972e2_local_vars=$_1972e2_old_vars['_31dda4'];?>

      <?php $_1972e2_old_params['_7cf3f1']=$_1972e2_local_params;$_1972e2_old_vars['_7cf3f1']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'in_editing','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      @media (min-width: 992px) {
      .col-lg-2{ max-width:13rem !important }
      .col-lg-10{ min-width: -webkit-calc(100% - 13rem); min-width: calc(100% - 13rem) } }
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_7cf3f1'];$_1972e2_local_vars=$_1972e2_old_vars['_7cf3f1'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php $_1972e2_old_params['_665329']=$_1972e2_local_params;$_1972e2_old_vars['_665329']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'invisible_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <style><?php echo $this->modifier_join($this->function_var($this->setup_args(['name'=>'invisible_selector','join'=>',','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','join',$this),$this,'join')?>
{display:none !important}</style>
    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_665329'];$_1972e2_local_vars=$_1972e2_old_vars['_665329'];?>

    <?php $_1972e2_old_params['_67d3b4']=$_1972e2_local_params;$_1972e2_old_vars['_67d3b4']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<style><?php $_1972e2_old_params['_abcbb7']=$_1972e2_local_params;$_1972e2_old_vars['_abcbb7']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
body { padding-top: 80px; } .workspace-bar { margin-top: 0;}
    <?php else:?>
.workspace-bar { margin-bottom: 14px;}<?php endif;$_1972e2_local_params=$_1972e2_old_params['_abcbb7'];$_1972e2_local_vars=$_1972e2_old_vars['_abcbb7'];?>
</style><?php endif;$_1972e2_local_params=$_1972e2_old_params['_67d3b4'];$_1972e2_local_vars=$_1972e2_old_vars['_67d3b4'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_1972e2_old_params['_c66d1c']=$_1972e2_local_params;$_1972e2_old_vars['_c66d1c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_1972e2_local_params=$_1972e2_old_params['_c66d1c'];$_1972e2_local_vars=$_1972e2_old_vars['_c66d1c'];?>

    <?php $_1972e2_old_params['_71e55a']=$_1972e2_local_params;$_1972e2_old_vars['_71e55a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_1972e2_local_params=$_1972e2_old_params['_71e55a'];$_1972e2_local_vars=$_1972e2_old_vars['_71e55a'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_1972e2_old_params['_f4b561']=$_1972e2_local_params;$_1972e2_old_vars['_f4b561']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php $_1972e2_old_params['_c6f838']=$_1972e2_local_params;$_1972e2_old_vars['_c6f838']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c6f838'];$_1972e2_local_vars=$_1972e2_old_vars['_c6f838'];?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_f4b561'];$_1972e2_local_vars=$_1972e2_old_vars['_f4b561'];?>

  <div id="main-content">
<?php $_1972e2_old_params['_a2b340']=$_1972e2_local_params;$_1972e2_old_vars['_a2b340']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="fixed-top">
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a2b340'];$_1972e2_local_vars=$_1972e2_old_vars['_a2b340'];?>

  <?php $_1972e2_old_params['_c30181']=$_1972e2_local_params;$_1972e2_old_vars['_c30181']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_0d757f']=$_1972e2_local_params;$_1972e2_old_vars['_0d757f']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.__mode','match'=>'/^(?:login|logout)$/iu','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_0d757f'];$_1972e2_local_vars=$_1972e2_old_vars['_0d757f'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c30181'];$_1972e2_local_vars=$_1972e2_old_vars['_c30181'];?>

  <?php $_1972e2_old_params['_521006']=$_1972e2_local_params;$_1972e2_old_vars['_521006']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_521006'];$_1972e2_local_vars=$_1972e2_old_vars['_521006'];?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse nav-top<?php $_1972e2_old_params['_e27792']=$_1972e2_local_params;$_1972e2_old_vars['_e27792']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 fixed-top<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e27792'];$_1972e2_local_vars=$_1972e2_old_vars['_e27792'];?>
">
      <?php $_1972e2_old_params['_030464']=$_1972e2_local_params;$_1972e2_old_vars['_030464']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_1972e2_old_params['_ea484b']=$_1972e2_local_params;$_1972e2_old_vars['_ea484b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'install','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="navbar-brand brand-prototype" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
">PowerCMS X</a>
        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_ea484b'];$_1972e2_local_vars=$_1972e2_old_vars['_ea484b'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_030464'];$_1972e2_local_vars=$_1972e2_old_vars['_030464'];?>

      <?php $_1972e2_old_params['_253ed5']=$_1972e2_local_params;$_1972e2_old_vars['_253ed5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; z-index:7" class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_253ed5'];$_1972e2_local_vars=$_1972e2_old_vars['_253ed5'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_1972e2_old_params['_1a4f6d']=$_1972e2_local_params;$_1972e2_old_vars['_1a4f6d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_41231c=null;$_1972e2_old_params['_41231c']=$_1972e2_local_params;$_1972e2_old_vars['_41231c']=$_1972e2_local_vars;$a_41231c=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_41231c=ob_get_clean();$c_41231c=$this->block_setvarblock($a_41231c,$c_41231c,$this,$r_41231c,1,'_41231c');echo($c_41231c); $_1972e2_local_params=$_1972e2_old_params['_41231c'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_1a4f6d'];$_1972e2_local_vars=$_1972e2_old_vars['_1a4f6d'];?>

      <?php $_1972e2_old_params['_fb47c3']=$_1972e2_local_params;$_1972e2_old_vars['_fb47c3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a class="navbar-brand"<?php $_1972e2_old_params['_56c1ae']=$_1972e2_local_params;$_1972e2_old_vars['_56c1ae']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_56c1ae'];$_1972e2_local_vars=$_1972e2_old_vars['_56c1ae'];?>
 style="z-index:1"><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
<span id="navbar-brand-end"></span></a>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_1972e2_old_params['_dac2cf']=$_1972e2_local_params;$_1972e2_old_vars['_dac2cf']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_b4c1c8']=$_1972e2_local_params;$_1972e2_old_vars['_b4c1c8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'ws_selector_limit','setvar'=>'selector_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('selector_limit','setvar',$this),$this,'setvar')?>

        <?php $_1972e2_old_params['_dd6529']=$_1972e2_local_params;$_1972e2_old_vars['_dd6529']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'16','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_dd6529'];$_1972e2_local_vars=$_1972e2_old_vars['_dd6529'];?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','op'=>'+','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_1972e2_old_params['_4a23b2']=$_1972e2_local_params;$_1972e2_old_vars['_4a23b2']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_4a23b2'];$_1972e2_local_vars=$_1972e2_old_vars['_4a23b2'];?>

        <?php $c_df40a1=null;$_1972e2_old_params['_df40a1']=$_1972e2_local_params;$_1972e2_old_vars['_df40a1']=$_1972e2_local_vars;$a_df40a1=$this->setup_args(['cols'=>'id,name,barcolor,bartextcolor','model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_df40a1=-1;$r_df40a1=true;while($r_df40a1===true):$r_df40a1=($_df40a1!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_df40a1,$c_df40a1,$this,$r_df40a1,++$_df40a1,'_df40a1');ob_start();?>
<?php $c_df40a1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_df40a1=false;}if($c_df40a1 ):?>

        <?php $_1972e2_old_params['_8fb95a']=$_1972e2_local_params;$_1972e2_old_vars['_8fb95a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="hidden nav-item dropdown workspace-dd-wrapper active" id="workspace-selector" style="z-index:5">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cube workspace-dd" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8fb95a'];$_1972e2_local_vars=$_1972e2_old_vars['_8fb95a'];?>

            <?php $_1972e2_old_params['_a1b5f3']=$_1972e2_local_params;$_1972e2_old_vars['_a1b5f3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a<?php $_1972e2_old_params['_17ed8d']=$_1972e2_local_params;$_1972e2_old_vars['_17ed8d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_color_the_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_b28c1c']=$_1972e2_local_params;$_1972e2_old_vars['_b28c1c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_bb5321']=$_1972e2_local_params;$_1972e2_old_vars['_bb5321']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="<?php $_1972e2_old_params['_5cfc30']=$_1972e2_local_params;$_1972e2_old_vars['_5cfc30']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__last__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
margin-bottom:3px;<?php endif;$_1972e2_local_params=$_1972e2_old_params['_5cfc30'];$_1972e2_local_vars=$_1972e2_old_vars['_5cfc30'];?>
background-color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_bb5321'];$_1972e2_local_vars=$_1972e2_old_vars['_bb5321'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_b28c1c'];$_1972e2_local_vars=$_1972e2_old_vars['_b28c1c'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_17ed8d'];$_1972e2_local_vars=$_1972e2_old_vars['_17ed8d'];?>
 class="dropdown-item btn-sm <?php $_1972e2_old_params['_e72632']=$_1972e2_local_params;$_1972e2_old_vars['_e72632']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e72632'];$_1972e2_local_vars=$_1972e2_old_vars['_e72632'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?_selector=1&amp;<?php $_1972e2_old_params['_3a609b']=$_1972e2_local_params;$_1972e2_old_vars['_3a609b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_94ca8b']=$_1972e2_local_params;$_1972e2_old_vars['_94ca8b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->modifier_replace($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]*/\',\'\'','replace'=>'\'does_act=1\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('\\\'does_act=1\\\',\\\'\\\'','replace',$this),$this,'replace'),ENT_QUOTES)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_94ca8b'];$_1972e2_local_vars=$_1972e2_old_vars['_94ca8b'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_3a609b'];$_1972e2_local_vars=$_1972e2_old_vars['_3a609b'];?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
              <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

            </a>
            <?php else:?>

            <a class="dropdown-item btn-sm" data-toggle="modal" data-target="#modal"
                data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</a>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a1b5f3'];$_1972e2_local_vars=$_1972e2_old_vars['_a1b5f3'];?>

        <?php $_1972e2_old_params['_379395']=$_1972e2_local_params;$_1972e2_old_vars['_379395']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_379395'];$_1972e2_local_vars=$_1972e2_old_vars['_379395'];?>

        <?php endif;$c_df40a1=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_df40a1'];$_1972e2_local_vars=$_1972e2_old_vars['_df40a1'];?>

      <div class="collapse navbar-collapse" id="navbars" <?php $_1972e2_old_params['_b59d9f']=$_1972e2_local_params;$_1972e2_old_vars['_b59d9f']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_b59d9f'];$_1972e2_local_vars=$_1972e2_old_vars['_b59d9f'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel">
        <?php $c_aa2ac8=null;$_1972e2_old_params['_aa2ac8']=$_1972e2_local_params;$_1972e2_old_vars['_aa2ac8']=$_1972e2_local_vars;$a_aa2ac8=$this->setup_args(['menu_type'=>'6','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_aa2ac8=-1;$r_aa2ac8=true;while($r_aa2ac8===true):$r_aa2ac8=($_aa2ac8!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_aa2ac8,$c_aa2ac8,$this,$r_aa2ac8,++$_aa2ac8,'_aa2ac8');ob_start();?>
<?php $c_aa2ac8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_aa2ac8=false;}if($c_aa2ac8 ):?>

          <?php $_1972e2_old_params['_d910bd']=$_1972e2_local_params;$_1972e2_old_vars['_d910bd']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_d910bd'];$_1972e2_local_vars=$_1972e2_old_vars['_d910bd'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_5b1792']=$_1972e2_local_params;$_1972e2_old_vars['_5b1792']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5b1792'];$_1972e2_local_vars=$_1972e2_old_vars['_5b1792'];?>

        <?php endif;$c_aa2ac8=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_aa2ac8'];$_1972e2_local_vars=$_1972e2_old_vars['_aa2ac8'];?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'panel_limit','setvar'=>'panel_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('panel_limit','setvar',$this),$this,'setvar')?>

        <?php $c_a9f2c1=null;$_1972e2_old_params['_a9f2c1']=$_1972e2_local_params;$_1972e2_old_vars['_a9f2c1']=$_1972e2_local_vars;$a_a9f2c1=$this->setup_args(['limit'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_a9f2c1=-1;$r_a9f2c1=true;while($r_a9f2c1===true):$r_a9f2c1=($_a9f2c1!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_a9f2c1,$c_a9f2c1,$this,$r_a9f2c1,++$_a9f2c1,'_a9f2c1');ob_start();?>
<?php $c_a9f2c1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a9f2c1=false;}if($c_a9f2c1 ):?>

          <li class="nav-item <?php $_1972e2_old_params['_e5549a']=$_1972e2_local_params;$_1972e2_old_vars['_e5549a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e5549a'];$_1972e2_local_vars=$_1972e2_old_vars['_e5549a'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php $_1972e2_old_params['_65ccd0']=$_1972e2_local_params;$_1972e2_old_vars['_65ccd0']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_65ccd0'];$_1972e2_local_vars=$_1972e2_old_vars['_65ccd0'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_a9f2c1=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_a9f2c1'];$_1972e2_local_vars=$_1972e2_old_vars['_a9f2c1'];?>

        <?php $c_1a85e5=null;$_1972e2_old_params['_1a85e5']=$_1972e2_local_params;$_1972e2_old_vars['_1a85e5']=$_1972e2_local_vars;$a_1a85e5=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_1a85e5=-1;$r_1a85e5=true;while($r_1a85e5===true):$r_1a85e5=($_1a85e5!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_1a85e5,$c_1a85e5,$this,$r_1a85e5,++$_1a85e5,'_1a85e5');ob_start();?>
<?php $c_1a85e5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1a85e5=false;}if($c_1a85e5 ):?>

          <?php $_1972e2_old_params['_4f2be9']=$_1972e2_local_params;$_1972e2_old_vars['_4f2be9']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_4f2be9'];$_1972e2_local_vars=$_1972e2_old_vars['_4f2be9'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_ce98c8']=$_1972e2_local_params;$_1972e2_old_vars['_ce98c8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_ce98c8'];$_1972e2_local_vars=$_1972e2_old_vars['_ce98c8'];?>

        <?php endif;$c_1a85e5=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_1a85e5'];$_1972e2_local_vars=$_1972e2_old_vars['_1a85e5'];?>

        <?php $c_5451ae=null;$_1972e2_old_params['_5451ae']=$_1972e2_local_params;$_1972e2_old_vars['_5451ae']=$_1972e2_local_vars;$a_5451ae=$this->setup_args(['menu_type'=>'2','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_5451ae=-1;$r_5451ae=true;while($r_5451ae===true):$r_5451ae=($_5451ae!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_5451ae,$c_5451ae,$this,$r_5451ae,++$_5451ae,'_5451ae');ob_start();?>
<?php $c_5451ae = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5451ae=false;}if($c_5451ae ):?>

          <?php $_1972e2_old_params['_603a2b']=$_1972e2_local_params;$_1972e2_old_vars['_603a2b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_603a2b'];$_1972e2_local_vars=$_1972e2_old_vars['_603a2b'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_5d4f62']=$_1972e2_local_params;$_1972e2_old_vars['_5d4f62']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5d4f62'];$_1972e2_local_vars=$_1972e2_old_vars['_5d4f62'];?>

        <?php endif;$c_5451ae=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_5451ae'];$_1972e2_local_vars=$_1972e2_old_vars['_5451ae'];?>

        <?php $c_863868=null;$_1972e2_old_params['_863868']=$_1972e2_local_params;$_1972e2_old_vars['_863868']=$_1972e2_local_vars;$a_863868=$this->setup_args(['menu_type'=>'3','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_863868=-1;$r_863868=true;while($r_863868===true):$r_863868=($_863868!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_863868,$c_863868,$this,$r_863868,++$_863868,'_863868');ob_start();?>
<?php $c_863868 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_863868=false;}if($c_863868 ):?>

          <?php $_1972e2_old_params['_37968f']=$_1972e2_local_params;$_1972e2_old_vars['_37968f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_37968f'];$_1972e2_local_vars=$_1972e2_old_vars['_37968f'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_94117d']=$_1972e2_local_params;$_1972e2_old_vars['_94117d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_94117d'];$_1972e2_local_vars=$_1972e2_old_vars['_94117d'];?>

        <?php endif;$c_863868=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_863868'];$_1972e2_local_vars=$_1972e2_old_vars['_863868'];?>

        <?php $c_9cb031=null;$_1972e2_old_params['_9cb031']=$_1972e2_local_params;$_1972e2_old_vars['_9cb031']=$_1972e2_local_vars;$a_9cb031=$this->setup_args(['menu_type'=>'4','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_9cb031=-1;$r_9cb031=true;while($r_9cb031===true):$r_9cb031=($_9cb031!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_9cb031,$c_9cb031,$this,$r_9cb031,++$_9cb031,'_9cb031');ob_start();?>
<?php $c_9cb031 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9cb031=false;}if($c_9cb031 ):?>

          <?php $_1972e2_old_params['_0d69f2']=$_1972e2_local_params;$_1972e2_old_vars['_0d69f2']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_0d69f2'];$_1972e2_local_vars=$_1972e2_old_vars['_0d69f2'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_676a09']=$_1972e2_local_params;$_1972e2_old_vars['_676a09']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_676a09'];$_1972e2_local_vars=$_1972e2_old_vars['_676a09'];?>

        <?php endif;$c_9cb031=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_9cb031'];$_1972e2_local_vars=$_1972e2_old_vars['_9cb031'];?>

        <?php $c_1e58cc=null;$_1972e2_old_params['_1e58cc']=$_1972e2_local_params;$_1972e2_old_vars['_1e58cc']=$_1972e2_local_vars;$a_1e58cc=$this->setup_args(['menu_type'=>'5','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_1e58cc=-1;$r_1e58cc=true;while($r_1e58cc===true):$r_1e58cc=($_1e58cc!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_1e58cc,$c_1e58cc,$this,$r_1e58cc,++$_1e58cc,'_1e58cc');ob_start();?>
<?php $c_1e58cc = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1e58cc=false;}if($c_1e58cc ):?>

          <?php $_1972e2_old_params['_4a015e']=$_1972e2_local_params;$_1972e2_old_vars['_4a015e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_4a015e'];$_1972e2_local_vars=$_1972e2_old_vars['_4a015e'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_ef82d8']=$_1972e2_local_params;$_1972e2_old_vars['_ef82d8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_ef82d8'];$_1972e2_local_vars=$_1972e2_old_vars['_ef82d8'];?>

        <?php endif;$c_1e58cc=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_1e58cc'];$_1972e2_local_vars=$_1972e2_old_vars['_1e58cc'];?>

        <?php $c_9a3f6b=null;$_1972e2_old_params['_9a3f6b']=$_1972e2_local_params;$_1972e2_old_vars['_9a3f6b']=$_1972e2_local_vars;$a_9a3f6b=$this->setup_args(['name'=>'system_menus','this_tag'=>'loop'],null,$this);$_9a3f6b=-1;$r_9a3f6b=true;while($r_9a3f6b===true):$r_9a3f6b=($_9a3f6b!==-1)?false:true;echo $this->block_loop($a_9a3f6b,$c_9a3f6b,$this,$r_9a3f6b,++$_9a3f6b,'_9a3f6b');ob_start();?>
<?php $c_9a3f6b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9a3f6b=false;}if($c_9a3f6b ):?>

          <?php $_1972e2_old_params['_4fbb8b']=$_1972e2_local_params;$_1972e2_old_vars['_4fbb8b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <?php $_1972e2_old_params['_185510']=$_1972e2_local_params;$_1972e2_old_vars['_185510']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php elseif($this->conditional_elseif($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php endif;$_1972e2_local_params=$_1972e2_old_params['_185510'];$_1972e2_local_vars=$_1972e2_old_vars['_185510'];?>

            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_4fbb8b'];$_1972e2_local_vars=$_1972e2_old_vars['_4fbb8b'];?>

            <a <?php $_1972e2_old_params['_db1947']=$_1972e2_local_params;$_1972e2_old_vars['_db1947']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_db1947'];$_1972e2_local_vars=$_1972e2_old_vars['_db1947'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
<?php $c_d3d109=null;$_1972e2_old_params['_d3d109']=$_1972e2_local_params;$_1972e2_old_vars['_d3d109']=$_1972e2_local_vars;$a_d3d109=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_d3d109=-1;$r_d3d109=true;while($r_d3d109===true):$r_d3d109=($_d3d109!==-1)?false:true;echo $this->block_loop($a_d3d109,$c_d3d109,$this,$r_d3d109,++$_d3d109,'_d3d109');ob_start();?>
<?php $c_d3d109 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d3d109=false;}if($c_d3d109 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_d3d109=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_d3d109'];$_1972e2_local_vars=$_1972e2_old_vars['_d3d109'];?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_1972e2_old_params['_e8e34e']=$_1972e2_local_params;$_1972e2_old_vars['_e8e34e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_mode','eq'=>'manage_scheme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_9c2f65']=$_1972e2_local_params;$_1972e2_old_vars['_9c2f65']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_9c2f65'];$_1972e2_local_vars=$_1972e2_old_vars['_9c2f65'];?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_mode','eq'=>'manage_plugins','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_7f1009']=$_1972e2_local_params;$_1972e2_old_vars['_7f1009']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_7f1009'];$_1972e2_local_vars=$_1972e2_old_vars['_7f1009'];?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e8e34e'];$_1972e2_local_vars=$_1972e2_old_vars['_e8e34e'];?>

            </a>
          <?php $_1972e2_old_params['_750fe6']=$_1972e2_local_params;$_1972e2_old_vars['_750fe6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_750fe6'];$_1972e2_local_vars=$_1972e2_old_vars['_750fe6'];?>

        <?php endif;$c_9a3f6b=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_9a3f6b'];$_1972e2_local_vars=$_1972e2_old_vars['_9a3f6b'];?>

        </ul>
        <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_system','this_tag'=>'var'],null,$this),$this)?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'show_both','setvar'=>'__show_both','this_tag'=>'property'],null,$this),$this),$this->setup_args('__show_both','setvar',$this),$this,'setvar')?>

          <a href="<?php $_1972e2_old_params['_71fe73']=$_1972e2_local_params;$_1972e2_old_vars['_71fe73']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_927416']=$_1972e2_local_params;$_1972e2_old_vars['_927416']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_927416'];$_1972e2_local_vars=$_1972e2_old_vars['_927416'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_71fe73'];$_1972e2_local_vars=$_1972e2_old_vars['_71fe73'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_1972e2_old_params['_3fb0eb']=$_1972e2_local_params;$_1972e2_old_vars['_3fb0eb']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_3fb0eb'];$_1972e2_local_vars=$_1972e2_old_vars['_3fb0eb'];?>

        <?php $_1972e2_old_params['_632fe3']=$_1972e2_local_params;$_1972e2_old_vars['_632fe3']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'0','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_36d011=null;$_1972e2_old_params['_36d011']=$_1972e2_local_params;$_1972e2_old_vars['_36d011']=$_1972e2_local_vars;$a_36d011=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'0','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_36d011=-1;$r_36d011=true;while($r_36d011===true):$r_36d011=($_36d011!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_36d011,$c_36d011,$this,$r_36d011,++$_36d011,'_36d011');ob_start();?>
<?php $c_36d011 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_36d011=false;}if($c_36d011 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_36d011=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_36d011'];$_1972e2_local_vars=$_1972e2_old_vars['_36d011'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_632fe3'];$_1972e2_local_vars=$_1972e2_old_vars['_632fe3'];?>

          <a style="padding:<?php $_1972e2_old_params['_484e82']=$_1972e2_local_params;$_1972e2_old_vars['_484e82']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
0 3px<?php else:?>
4px<?php endif;$_1972e2_local_params=$_1972e2_old_params['_484e82'];$_1972e2_local_vars=$_1972e2_old_vars['_484e82'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_profile=1" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
          <?php $_1972e2_old_params['_23c962']=$_1972e2_local_params;$_1972e2_old_vars['_23c962']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_23c962'];$_1972e2_local_vars=$_1972e2_old_vars['_23c962'];?>

          </a>
          <a id="__logout" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_1972e2_old_params['_89707d']=$_1972e2_local_params;$_1972e2_old_vars['_89707d']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config" class="btn btn-sm btn-secondary my-2 my-sm-0 config-system" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_89707d'];$_1972e2_local_vars=$_1972e2_old_vars['_89707d'];?>

        </div>
      </div>
        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_b4c1c8'];$_1972e2_local_vars=$_1972e2_old_vars['_b4c1c8'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_dac2cf'];$_1972e2_local_vars=$_1972e2_old_vars['_dac2cf'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_fb47c3'];$_1972e2_local_vars=$_1972e2_old_vars['_fb47c3'];?>

      <?php $_1972e2_old_params['_89d787']=$_1972e2_local_params;$_1972e2_old_vars['_89d787']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbars" <?php $_1972e2_old_params['_97e9c2']=$_1972e2_local_params;$_1972e2_old_vars['_97e9c2']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_97e9c2'];$_1972e2_local_vars=$_1972e2_old_vars['_97e9c2'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel"></ul>
          <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_workspace','this_tag'=>'var'],null,$this),$this)?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout<?php $_1972e2_old_params['_217f98']=$_1972e2_local_params;$_1972e2_old_vars['_217f98']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_217f98'];$_1972e2_local_vars=$_1972e2_old_vars['_217f98'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=edit_profile<?php $_1972e2_old_params['_ef6321']=$_1972e2_local_params;$_1972e2_old_vars['_ef6321']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ef6321'];$_1972e2_local_vars=$_1972e2_old_vars['_ef6321'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          </div>
        </div>
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_89d787'];$_1972e2_local_vars=$_1972e2_old_vars['_89d787'];?>

    </nav>
  <?php $_1972e2_old_params['_197338']=$_1972e2_local_params;$_1972e2_old_vars['_197338']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_1972e2_old_params['_f0c95a']=$_1972e2_local_params;$_1972e2_old_vars['_f0c95a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_2cd5c5']=$_1972e2_local_params;$_1972e2_old_vars['_2cd5c5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_1972e2_old_params['_e2c5e3']=$_1972e2_local_params;$_1972e2_old_vars['_e2c5e3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar"<?php $_1972e2_old_params['_3b6629']=$_1972e2_local_params;$_1972e2_old_vars['_3b6629']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 style="z-index:1029;"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_3b6629'];$_1972e2_local_vars=$_1972e2_old_vars['_3b6629'];?>
>
      <?php $_1972e2_old_params['_1cd0bb']=$_1972e2_local_params;$_1972e2_old_vars['_1cd0bb']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important;" class="navbar-toggler navbar-toggler-right btn-ws" type="button" data-toggle="collapse" data-target="#navbars-ws" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_1cd0bb'];$_1972e2_local_vars=$_1972e2_old_vars['_1cd0bb'];?>

      <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'workspace_name','count_chars'=>'','setvar'=>'workspace_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('workspace_chars','setvar',$this),$this,'setvar')?>
<a class="navbar-brand brand-workspace" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_1972e2_old_params['_06bc33']=$_1972e2_local_params;$_1972e2_old_vars['_06bc33']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_06bc33'];$_1972e2_local_vars=$_1972e2_old_vars['_06bc33'];?>
><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
</a>
      <div class="collapse navbar-collapse" id="navbars-ws">
        <ul class="nav-pills navbar-nav mr-auto">
          <?php $c_b4bf22=null;$_1972e2_old_params['_b4bf22']=$_1972e2_local_params;$_1972e2_old_vars['_b4bf22']=$_1972e2_local_vars;$a_b4bf22=$this->setup_args(['type'=>'display_space','menu_type'=>'6','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_b4bf22=-1;$r_b4bf22=true;while($r_b4bf22===true):$r_b4bf22=($_b4bf22!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_b4bf22,$c_b4bf22,$this,$r_b4bf22,++$_b4bf22,'_b4bf22');ob_start();?>
<?php $c_b4bf22 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b4bf22=false;}if($c_b4bf22 ):?>

            <?php $_1972e2_old_params['_b84173']=$_1972e2_local_params;$_1972e2_old_vars['_b84173']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <li class="nav-item dropdown">
              <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
                <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </a>
              <div class="dropdown-menu">
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_b84173'];$_1972e2_local_vars=$_1972e2_old_vars['_b84173'];?>

              <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_42182b']=$_1972e2_local_params;$_1972e2_old_vars['_42182b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_42182b'];$_1972e2_local_vars=$_1972e2_old_vars['_42182b'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
            <?php $_1972e2_old_params['_5e65ab']=$_1972e2_local_params;$_1972e2_old_vars['_5e65ab']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              </li>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5e65ab'];$_1972e2_local_vars=$_1972e2_old_vars['_5e65ab'];?>

          <?php endif;$c_b4bf22=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_b4bf22'];$_1972e2_local_vars=$_1972e2_old_vars['_b4bf22'];?>

        <?php $c_401525=null;$_1972e2_old_params['_401525']=$_1972e2_local_params;$_1972e2_old_vars['_401525']=$_1972e2_local_vars;$a_401525=$this->setup_args(['limit'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_401525=-1;$r_401525=true;while($r_401525===true):$r_401525=($_401525!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_401525,$c_401525,$this,$r_401525,++$_401525,'_401525');ob_start();?>
<?php $c_401525 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_401525=false;}if($c_401525 ):?>

          <li class="nav-item nav-item-ws <?php $_1972e2_old_params['_e79eab']=$_1972e2_local_params;$_1972e2_old_vars['_e79eab']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e79eab'];$_1972e2_local_vars=$_1972e2_old_vars['_e79eab'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_0a249c']=$_1972e2_local_params;$_1972e2_old_vars['_0a249c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_0a249c'];$_1972e2_local_vars=$_1972e2_old_vars['_0a249c'];?>
"<?php $_1972e2_old_params['_6f465f']=$_1972e2_local_params;$_1972e2_old_vars['_6f465f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6f465f'];$_1972e2_local_vars=$_1972e2_old_vars['_6f465f'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_401525=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_401525'];$_1972e2_local_vars=$_1972e2_old_vars['_401525'];?>

        <?php $c_7dcc2b=null;$_1972e2_old_params['_7dcc2b']=$_1972e2_local_params;$_1972e2_old_vars['_7dcc2b']=$_1972e2_local_vars;$a_7dcc2b=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_7dcc2b=-1;$r_7dcc2b=true;while($r_7dcc2b===true):$r_7dcc2b=($_7dcc2b!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_7dcc2b,$c_7dcc2b,$this,$r_7dcc2b,++$_7dcc2b,'_7dcc2b');ob_start();?>
<?php $c_7dcc2b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7dcc2b=false;}if($c_7dcc2b ):?>

          <?php $_1972e2_old_params['_941161']=$_1972e2_local_params;$_1972e2_old_vars['_941161']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_941161'];$_1972e2_local_vars=$_1972e2_old_vars['_941161'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_f0b70d']=$_1972e2_local_params;$_1972e2_old_vars['_f0b70d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_f0b70d'];$_1972e2_local_vars=$_1972e2_old_vars['_f0b70d'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_a42b58']=$_1972e2_local_params;$_1972e2_old_vars['_a42b58']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a42b58'];$_1972e2_local_vars=$_1972e2_old_vars['_a42b58'];?>

        <?php endif;$c_7dcc2b=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_7dcc2b'];$_1972e2_local_vars=$_1972e2_old_vars['_7dcc2b'];?>

        <?php $c_ce519f=null;$_1972e2_old_params['_ce519f']=$_1972e2_local_params;$_1972e2_old_vars['_ce519f']=$_1972e2_local_vars;$a_ce519f=$this->setup_args(['type'=>'display_space','menu_type'=>'2','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_ce519f=-1;$r_ce519f=true;while($r_ce519f===true):$r_ce519f=($_ce519f!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_ce519f,$c_ce519f,$this,$r_ce519f,++$_ce519f,'_ce519f');ob_start();?>
<?php $c_ce519f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ce519f=false;}if($c_ce519f ):?>

          <?php $_1972e2_old_params['_1c6d20']=$_1972e2_local_params;$_1972e2_old_vars['_1c6d20']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_1c6d20'];$_1972e2_local_vars=$_1972e2_old_vars['_1c6d20'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_3f854e']=$_1972e2_local_params;$_1972e2_old_vars['_3f854e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_3f854e'];$_1972e2_local_vars=$_1972e2_old_vars['_3f854e'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_acffff']=$_1972e2_local_params;$_1972e2_old_vars['_acffff']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_acffff'];$_1972e2_local_vars=$_1972e2_old_vars['_acffff'];?>

        <?php endif;$c_ce519f=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_ce519f'];$_1972e2_local_vars=$_1972e2_old_vars['_ce519f'];?>

        <?php $c_1c58c6=null;$_1972e2_old_params['_1c58c6']=$_1972e2_local_params;$_1972e2_old_vars['_1c58c6']=$_1972e2_local_vars;$a_1c58c6=$this->setup_args(['type'=>'display_space','menu_type'=>'3','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_1c58c6=-1;$r_1c58c6=true;while($r_1c58c6===true):$r_1c58c6=($_1c58c6!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_1c58c6,$c_1c58c6,$this,$r_1c58c6,++$_1c58c6,'_1c58c6');ob_start();?>
<?php $c_1c58c6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1c58c6=false;}if($c_1c58c6 ):?>

          <?php $_1972e2_old_params['_b7da13']=$_1972e2_local_params;$_1972e2_old_vars['_b7da13']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_b7da13'];$_1972e2_local_vars=$_1972e2_old_vars['_b7da13'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_e30103']=$_1972e2_local_params;$_1972e2_old_vars['_e30103']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e30103'];$_1972e2_local_vars=$_1972e2_old_vars['_e30103'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_1b7bc6']=$_1972e2_local_params;$_1972e2_old_vars['_1b7bc6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_1b7bc6'];$_1972e2_local_vars=$_1972e2_old_vars['_1b7bc6'];?>

        <?php endif;$c_1c58c6=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_1c58c6'];$_1972e2_local_vars=$_1972e2_old_vars['_1c58c6'];?>

        <?php $c_05ad76=null;$_1972e2_old_params['_05ad76']=$_1972e2_local_params;$_1972e2_old_vars['_05ad76']=$_1972e2_local_vars;$a_05ad76=$this->setup_args(['type'=>'display_space','menu_type'=>'4','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_05ad76=-1;$r_05ad76=true;while($r_05ad76===true):$r_05ad76=($_05ad76!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_05ad76,$c_05ad76,$this,$r_05ad76,++$_05ad76,'_05ad76');ob_start();?>
<?php $c_05ad76 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_05ad76=false;}if($c_05ad76 ):?>

          <?php $_1972e2_old_params['_560072']=$_1972e2_local_params;$_1972e2_old_vars['_560072']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_560072'];$_1972e2_local_vars=$_1972e2_old_vars['_560072'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_a52a92']=$_1972e2_local_params;$_1972e2_old_vars['_a52a92']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a52a92'];$_1972e2_local_vars=$_1972e2_old_vars['_a52a92'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_763e68']=$_1972e2_local_params;$_1972e2_old_vars['_763e68']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_763e68'];$_1972e2_local_vars=$_1972e2_old_vars['_763e68'];?>

        <?php endif;$c_05ad76=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_05ad76'];$_1972e2_local_vars=$_1972e2_old_vars['_05ad76'];?>

        <?php $c_986d8b=null;$_1972e2_old_params['_986d8b']=$_1972e2_local_params;$_1972e2_old_vars['_986d8b']=$_1972e2_local_vars;$a_986d8b=$this->setup_args(['type'=>'display_space','menu_type'=>'5','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_986d8b=-1;$r_986d8b=true;while($r_986d8b===true):$r_986d8b=($_986d8b!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_986d8b,$c_986d8b,$this,$r_986d8b,++$_986d8b,'_986d8b');ob_start();?>
<?php $c_986d8b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_986d8b=false;}if($c_986d8b ):?>

          <?php $_1972e2_old_params['_6bf909']=$_1972e2_local_params;$_1972e2_old_vars['_6bf909']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_6bf909'];$_1972e2_local_vars=$_1972e2_old_vars['_6bf909'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_89f2e7']=$_1972e2_local_params;$_1972e2_old_vars['_89f2e7']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_89f2e7'];$_1972e2_local_vars=$_1972e2_old_vars['_89f2e7'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_1972e2_old_params['_158b37']=$_1972e2_local_params;$_1972e2_old_vars['_158b37']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_158b37'];$_1972e2_local_vars=$_1972e2_old_vars['_158b37'];?>

        <?php endif;$c_986d8b=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_986d8b'];$_1972e2_local_vars=$_1972e2_old_vars['_986d8b'];?>

        <?php $c_ca2c5e=null;$_1972e2_old_params['_ca2c5e']=$_1972e2_local_params;$_1972e2_old_vars['_ca2c5e']=$_1972e2_local_vars;$a_ca2c5e=$this->setup_args(['name'=>'workspace_menus','this_tag'=>'loop'],null,$this);$_ca2c5e=-1;$r_ca2c5e=true;while($r_ca2c5e===true):$r_ca2c5e=($_ca2c5e!==-1)?false:true;echo $this->block_loop($a_ca2c5e,$c_ca2c5e,$this,$r_ca2c5e,++$_ca2c5e,'_ca2c5e');ob_start();?>
<?php $c_ca2c5e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ca2c5e=false;}if($c_ca2c5e ):?>

          <?php $_1972e2_old_params['_af4eb9']=$_1972e2_local_params;$_1972e2_old_vars['_af4eb9']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_af4eb9'];$_1972e2_local_vars=$_1972e2_old_vars['_af4eb9'];?>

            <a <?php $_1972e2_old_params['_e7ef29']=$_1972e2_local_params;$_1972e2_old_vars['_e7ef29']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e7ef29'];$_1972e2_local_vars=$_1972e2_old_vars['_e7ef29'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_74ec69=null;$_1972e2_old_params['_74ec69']=$_1972e2_local_params;$_1972e2_old_vars['_74ec69']=$_1972e2_local_vars;$a_74ec69=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_74ec69=-1;$r_74ec69=true;while($r_74ec69===true):$r_74ec69=($_74ec69!==-1)?false:true;echo $this->block_loop($a_74ec69,$c_74ec69,$this,$r_74ec69,++$_74ec69,'_74ec69');ob_start();?>
<?php $c_74ec69 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_74ec69=false;}if($c_74ec69 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_74ec69=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_74ec69'];$_1972e2_local_vars=$_1972e2_old_vars['_74ec69'];?>
"><?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>
</a>
          <?php $_1972e2_old_params['_89b036']=$_1972e2_local_params;$_1972e2_old_vars['_89b036']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_89b036'];$_1972e2_local_vars=$_1972e2_old_vars['_89b036'];?>

        <?php endif;$c_ca2c5e=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_ca2c5e'];$_1972e2_local_vars=$_1972e2_old_vars['_ca2c5e'];?>

        </ul>
        <div class="header-util">
          <a href="<?php $_1972e2_old_params['_cbaadd']=$_1972e2_local_params;$_1972e2_old_vars['_cbaadd']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_6184db']=$_1972e2_local_params;$_1972e2_old_vars['_6184db']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6184db'];$_1972e2_local_vars=$_1972e2_old_vars['_6184db'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_cbaadd'];$_1972e2_local_vars=$_1972e2_old_vars['_cbaadd'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_1972e2_old_params['_58ea22']=$_1972e2_local_params;$_1972e2_old_vars['_58ea22']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_6ee798']=$_1972e2_local_params;$_1972e2_old_vars['_6ee798']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_6ee798'];$_1972e2_local_vars=$_1972e2_old_vars['_6ee798'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_58ea22'];$_1972e2_local_vars=$_1972e2_old_vars['_58ea22'];?>

        <?php $_1972e2_old_params['_3f385c']=$_1972e2_local_params;$_1972e2_old_vars['_3f385c']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_69d86a=null;$_1972e2_old_params['_69d86a']=$_1972e2_local_params;$_1972e2_old_vars['_69d86a']=$_1972e2_local_vars;$a_69d86a=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'$workspace_id','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_69d86a=-1;$r_69d86a=true;while($r_69d86a===true):$r_69d86a=($_69d86a!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_69d86a,$c_69d86a,$this,$r_69d86a,++$_69d86a,'_69d86a');ob_start();?>
<?php $c_69d86a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_69d86a=false;}if($c_69d86a ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_69d86a=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_69d86a'];$_1972e2_local_vars=$_1972e2_old_vars['_69d86a'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_3f385c'];$_1972e2_local_vars=$_1972e2_old_vars['_3f385c'];?>

        <?php $_1972e2_old_params['_429b7a']=$_1972e2_local_params;$_1972e2_old_vars['_429b7a']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'workspace','id'=>'$workspace_id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 config-workspace" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_429b7a'];$_1972e2_local_vars=$_1972e2_old_vars['_429b7a'];?>

        </div>
      </div>
    </nav>
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e2c5e3'];$_1972e2_local_vars=$_1972e2_old_vars['_e2c5e3'];?>

    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_2cd5c5'];$_1972e2_local_vars=$_1972e2_old_vars['_2cd5c5'];?>

<?php $_1972e2_old_params['_3f87d6']=$_1972e2_local_params;$_1972e2_old_vars['_3f87d6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </div>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_3f87d6'];$_1972e2_local_vars=$_1972e2_old_vars['_3f87d6'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_1972e2_old_params['_4da438']=$_1972e2_local_params;$_1972e2_old_vars['_4da438']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_1972e2_old_params['_208aa0']=$_1972e2_local_params;$_1972e2_old_vars['_208aa0']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_208aa0'];$_1972e2_local_vars=$_1972e2_old_vars['_208aa0'];?>

    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_4da438'];$_1972e2_local_vars=$_1972e2_old_vars['_4da438'];?>

    <?php $_1972e2_old_params['_5f5b5b']=$_1972e2_local_params;$_1972e2_old_vars['_5f5b5b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5f5b5b'];$_1972e2_local_vars=$_1972e2_old_vars['_5f5b5b'];?>

    <?php $_1972e2_old_params['_8b1f97']=$_1972e2_local_params;$_1972e2_old_vars['_8b1f97']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_1972e2_old_params['_4e7268']=$_1972e2_local_params;$_1972e2_old_vars['_4e7268']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_4e7268'];$_1972e2_local_vars=$_1972e2_old_vars['_4e7268'];?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8b1f97'];$_1972e2_local_vars=$_1972e2_old_vars['_8b1f97'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'output_container','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <div class="container-fluid">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_1972e2_old_params['_c8f4bf']=$_1972e2_local_params;$_1972e2_old_vars['_c8f4bf']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_1972e2_old_params['_b77897']=$_1972e2_local_params;$_1972e2_old_vars['_b77897']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_1972e2_old_params['_fb4756']=$_1972e2_local_params;$_1972e2_old_vars['_fb4756']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_f38688']=$_1972e2_local_params;$_1972e2_old_vars['_f38688']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php $_1972e2_old_params['_0da2b9']=$_1972e2_local_params;$_1972e2_old_vars['_0da2b9']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_1972e2_local_params=$_1972e2_old_params['_0da2b9'];$_1972e2_local_vars=$_1972e2_old_vars['_0da2b9'];?>

            <?php $_1972e2_old_params['_3bffdb']=$_1972e2_local_params;$_1972e2_old_vars['_3bffdb']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_1972e2_local_params=$_1972e2_old_params['_3bffdb'];$_1972e2_local_vars=$_1972e2_old_vars['_3bffdb'];?>

          <?php $_1972e2_old_params['_45d72b']=$_1972e2_local_params;$_1972e2_old_vars['_45d72b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_45d72b'];$_1972e2_local_vars=$_1972e2_old_vars['_45d72b'];?>

          <?php $_1972e2_old_params['_a77c2b']=$_1972e2_local_params;$_1972e2_old_vars['_a77c2b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a77c2b'];$_1972e2_local_vars=$_1972e2_old_vars['_a77c2b'];?>

          <?php $_1972e2_old_params['_50f23a']=$_1972e2_local_params;$_1972e2_old_vars['_50f23a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_1972e2_old_params['_e341b8']=$_1972e2_local_params;$_1972e2_old_vars['_e341b8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e341b8'];$_1972e2_local_vars=$_1972e2_old_vars['_e341b8'];?>

          <?php $_1972e2_old_params['_037bd9']=$_1972e2_local_params;$_1972e2_old_vars['_037bd9']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_037bd9'];$_1972e2_local_vars=$_1972e2_old_vars['_037bd9'];?>

            <?php $_1972e2_old_params['_cf5ff9']=$_1972e2_local_params;$_1972e2_old_vars['_cf5ff9']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_cf5ff9'];$_1972e2_local_vars=$_1972e2_old_vars['_cf5ff9'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_50f23a'];$_1972e2_local_vars=$_1972e2_old_vars['_50f23a'];?>

          <?php $_1972e2_old_params['_9b4647']=$_1972e2_local_params;$_1972e2_old_vars['_9b4647']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_9b4647'];$_1972e2_local_vars=$_1972e2_old_vars['_9b4647'];?>

          <?php $_1972e2_old_params['_b83de4']=$_1972e2_local_params;$_1972e2_old_vars['_b83de4']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_1972e2_old_params['_0f3f7d']=$_1972e2_local_params;$_1972e2_old_vars['_0f3f7d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_0f3f7d'];$_1972e2_local_vars=$_1972e2_old_vars['_0f3f7d'];?>

          <?php $_1972e2_old_params['_e1ccac']=$_1972e2_local_params;$_1972e2_old_vars['_e1ccac']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e1ccac'];$_1972e2_local_vars=$_1972e2_old_vars['_e1ccac'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_b83de4'];$_1972e2_local_vars=$_1972e2_old_vars['_b83de4'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_1972e2_old_params['_9e58f3']=$_1972e2_local_params;$_1972e2_old_vars['_9e58f3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_bf3663=null;$_1972e2_old_params['_bf3663']=$_1972e2_local_params;$_1972e2_old_vars['_bf3663']=$_1972e2_local_vars;$a_bf3663=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_bf3663=-1;$r_bf3663=true;while($r_bf3663===true):$r_bf3663=($_bf3663!==-1)?false:true;echo $this->block_loop($a_bf3663,$c_bf3663,$this,$r_bf3663,++$_bf3663,'_bf3663');ob_start();?>
<?php $c_bf3663 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bf3663=false;}if($c_bf3663 ):?>

                      <?php $_1972e2_old_params['_9d9e07']=$_1972e2_local_params;$_1972e2_old_vars['_9d9e07']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_9d9e07'];$_1972e2_local_vars=$_1972e2_old_vars['_9d9e07'];?>

                        <option <?php $_1972e2_old_params['_a6ea00']=$_1972e2_local_params;$_1972e2_old_vars['_a6ea00']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a6ea00'];$_1972e2_local_vars=$_1972e2_old_vars['_a6ea00'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_1972e2_old_params['_f7374e']=$_1972e2_local_params;$_1972e2_old_vars['_f7374e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_1972e2_local_params=$_1972e2_old_params['_f7374e'];$_1972e2_local_vars=$_1972e2_old_vars['_f7374e'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_1972e2_old_params['_b6d5d6']=$_1972e2_local_params;$_1972e2_old_vars['_b6d5d6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_b6d5d6'];$_1972e2_local_vars=$_1972e2_old_vars['_b6d5d6'];?>

                    <?php endif;$c_bf3663=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_bf3663'];$_1972e2_local_vars=$_1972e2_old_vars['_bf3663'];?>

                  </div>
                </div>
                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_9e58f3'];$_1972e2_local_vars=$_1972e2_old_vars['_9e58f3'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_f073fd=null;$_1972e2_old_params['_f073fd']=$_1972e2_local_params;$_1972e2_old_vars['_f073fd']=$_1972e2_local_vars;$a_f073fd=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_f073fd=-1;$r_f073fd=true;while($r_f073fd===true):$r_f073fd=($_f073fd!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_f073fd,$c_f073fd,$this,$r_f073fd,++$_f073fd,'_f073fd');ob_start();?>
<?php $c_f073fd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f073fd=false;}if($c_f073fd ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_1972e2_old_params['_b98534']=$_1972e2_local_params;$_1972e2_old_vars['_b98534']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_1972e2_local_params=$_1972e2_old_params['_b98534'];$_1972e2_local_vars=$_1972e2_old_vars['_b98534'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_f073fd=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_f073fd'];$_1972e2_local_vars=$_1972e2_old_vars['_f073fd'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_1972e2_old_params['_78aa31']=$_1972e2_local_params;$_1972e2_old_vars['_78aa31']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_78aa31'];$_1972e2_local_vars=$_1972e2_old_vars['_78aa31'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_c7b384=null;$_1972e2_old_params['_c7b384']=$_1972e2_local_params;$_1972e2_old_vars['_c7b384']=$_1972e2_local_vars;$a_c7b384=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_c7b384=-1;$r_c7b384=true;while($r_c7b384===true):$r_c7b384=($_c7b384!==-1)?false:true;echo $this->block_loop($a_c7b384,$c_c7b384,$this,$r_c7b384,++$_c7b384,'_c7b384');ob_start();?>
<?php $c_c7b384 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c7b384=false;}if($c_c7b384 ):?>

                    <?php $_1972e2_old_params['_2272d5']=$_1972e2_local_params;$_1972e2_old_vars['_2272d5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_2272d5'];$_1972e2_local_vars=$_1972e2_old_vars['_2272d5'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_1972e2_old_params['_8ee560']=$_1972e2_local_params;$_1972e2_old_vars['_8ee560']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8ee560'];$_1972e2_local_vars=$_1972e2_old_vars['_8ee560'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_c7b384=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_c7b384'];$_1972e2_local_vars=$_1972e2_old_vars['_c7b384'];?>

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

                              <input type="datetime-local" step="<?php $_1972e2_old_params['_4ee746']=$_1972e2_local_params;$_1972e2_old_vars['_4ee746']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_1972e2_local_params=$_1972e2_old_params['_4ee746'];$_1972e2_local_vars=$_1972e2_old_vars['_4ee746'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_1972e2_old_params['_8b71ef']=$_1972e2_local_params;$_1972e2_old_vars['_8b71ef']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8b71ef'];$_1972e2_local_vars=$_1972e2_old_vars['_8b71ef'];?>
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

                            <?php $_1972e2_old_params['_fc3478']=$_1972e2_local_params;$_1972e2_old_vars['_fc3478']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_1972e2_old_params['_985066']=$_1972e2_local_params;$_1972e2_old_vars['_985066']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_985066'];$_1972e2_local_vars=$_1972e2_old_vars['_985066'];?>

                            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_fc3478'];$_1972e2_local_vars=$_1972e2_old_vars['_fc3478'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_1972e2_old_params['_63e969']=$_1972e2_local_params;$_1972e2_old_vars['_63e969']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_206013=null;$_1972e2_old_params['_206013']=$_1972e2_local_params;$_1972e2_old_vars['_206013']=$_1972e2_local_vars;$a_206013=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_206013=-1;$r_206013=true;while($r_206013===true):$r_206013=($_206013!==-1)?false:true;echo $this->block_loop($a_206013,$c_206013,$this,$r_206013,++$_206013,'_206013');ob_start();?>
<?php $c_206013 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_206013=false;}if($c_206013 ):?>

                              <?php $_1972e2_old_params['_92d84b']=$_1972e2_local_params;$_1972e2_old_vars['_92d84b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_1972e2_old_params['_7a581b']=$_1972e2_local_params;$_1972e2_old_vars['_7a581b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_7a581b'];$_1972e2_local_vars=$_1972e2_old_vars['_7a581b'];?>

                              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_92d84b'];$_1972e2_local_vars=$_1972e2_old_vars['_92d84b'];?>

                            <?php endif;$c_206013=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_206013'];$_1972e2_local_vars=$_1972e2_old_vars['_206013'];?>

                            <?php else:?>

                            <?php $c_cc94da=null;$_1972e2_old_params['_cc94da']=$_1972e2_local_params;$_1972e2_old_vars['_cc94da']=$_1972e2_local_vars;$a_cc94da=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_cc94da=-1;$r_cc94da=true;while($r_cc94da===true):$r_cc94da=($_cc94da!==-1)?false:true;echo $this->block_loop($a_cc94da,$c_cc94da,$this,$r_cc94da,++$_cc94da,'_cc94da');ob_start();?>
<?php $c_cc94da = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_cc94da=false;}if($c_cc94da ):?>

                              <?php $_1972e2_old_params['_c262bb']=$_1972e2_local_params;$_1972e2_old_vars['_c262bb']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_c262bb'];$_1972e2_local_vars=$_1972e2_old_vars['_c262bb'];?>

                            <?php endif;$c_cc94da=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_cc94da'];$_1972e2_local_vars=$_1972e2_old_vars['_cc94da'];?>

                            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_63e969'];$_1972e2_local_vars=$_1972e2_old_vars['_63e969'];?>

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
            <?php $_1972e2_old_params['_a5262e']=$_1972e2_local_params;$_1972e2_old_vars['_a5262e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a5262e'];$_1972e2_local_vars=$_1972e2_old_vars['_a5262e'];?>

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
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_f38688'];$_1972e2_local_vars=$_1972e2_old_vars['_f38688'];?>

          <?php $_1972e2_old_params['_891c28']=$_1972e2_local_params;$_1972e2_old_vars['_891c28']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_1972e2_old_params['_542ceb']=$_1972e2_local_params;$_1972e2_old_vars['_542ceb']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
      <?php $_1972e2_old_params['_f9dd58']=$_1972e2_local_params;$_1972e2_old_vars['_f9dd58']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_f9dd58'];$_1972e2_local_vars=$_1972e2_old_vars['_f9dd58'];?>

      <?php $_1972e2_old_params['_6e27de']=$_1972e2_local_params;$_1972e2_old_vars['_6e27de']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_6e27de'];$_1972e2_local_vars=$_1972e2_old_vars['_6e27de'];?>

      <?php $_1972e2_old_params['_fda25c']=$_1972e2_local_params;$_1972e2_old_vars['_fda25c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_1972e2_old_params['_da59e0']=$_1972e2_local_params;$_1972e2_old_vars['_da59e0']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_da59e0'];$_1972e2_local_vars=$_1972e2_old_vars['_da59e0'];?>

          <?php $_1972e2_old_params['_e48b12']=$_1972e2_local_params;$_1972e2_old_vars['_e48b12']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e48b12'];$_1972e2_local_vars=$_1972e2_old_vars['_e48b12'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_1972e2_old_params['_5f7238']=$_1972e2_local_params;$_1972e2_old_vars['_5f7238']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5f7238'];$_1972e2_local_vars=$_1972e2_old_vars['_5f7238'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_fda25c'];$_1972e2_local_vars=$_1972e2_old_vars['_fda25c'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_1972e2_old_params['_8b0557']=$_1972e2_local_params;$_1972e2_old_vars['_8b0557']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_9a4d80']=$_1972e2_local_params;$_1972e2_old_vars['_9a4d80']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_357d53=null;$_1972e2_old_params['_357d53']=$_1972e2_local_params;$_1972e2_old_vars['_357d53']=$_1972e2_local_vars;$a_357d53=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_357d53=-1;$r_357d53=true;while($r_357d53===true):$r_357d53=($_357d53!==-1)?false:true;echo $this->block_loop($a_357d53,$c_357d53,$this,$r_357d53,++$_357d53,'_357d53');ob_start();?>
<?php $c_357d53 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_357d53=false;}if($c_357d53 ):?>

            <?php $_1972e2_old_params['_fabee6']=$_1972e2_local_params;$_1972e2_old_vars['_fabee6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_fabee6'];$_1972e2_local_vars=$_1972e2_old_vars['_fabee6'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_1972e2_old_params['_d8e320']=$_1972e2_local_params;$_1972e2_old_vars['_d8e320']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_1972e2_old_params['_5f7947']=$_1972e2_local_params;$_1972e2_old_vars['_5f7947']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5f7947'];$_1972e2_local_vars=$_1972e2_old_vars['_5f7947'];?>

                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_d8e320'];$_1972e2_local_vars=$_1972e2_old_vars['_d8e320'];?>

                <?php $_1972e2_old_params['_9405e5']=$_1972e2_local_params;$_1972e2_old_vars['_9405e5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_1972e2_old_params['_c5cbff']=$_1972e2_local_params;$_1972e2_old_vars['_c5cbff']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_4ba623']=$_1972e2_local_params;$_1972e2_old_vars['_4ba623']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_1972e2_local_params=$_1972e2_old_params['_4ba623'];$_1972e2_local_vars=$_1972e2_old_vars['_4ba623'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c5cbff'];$_1972e2_local_vars=$_1972e2_old_vars['_c5cbff'];?>

                <?php $_1972e2_old_params['_14acb9']=$_1972e2_local_params;$_1972e2_old_vars['_14acb9']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_1972e2_local_params=$_1972e2_old_params['_14acb9'];$_1972e2_local_vars=$_1972e2_old_vars['_14acb9'];?>
">
                  <?php $_1972e2_old_params['_2574a1']=$_1972e2_local_params;$_1972e2_old_vars['_2574a1']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_1972e2_local_params=$_1972e2_old_params['_2574a1'];$_1972e2_local_vars=$_1972e2_old_vars['_2574a1'];?>

                  <input <?php $_1972e2_old_params['_b8aa9d']=$_1972e2_local_params;$_1972e2_old_vars['_b8aa9d']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_b8aa9d'];$_1972e2_local_vars=$_1972e2_old_vars['_b8aa9d'];?>
 <?php $_1972e2_old_params['_a50a6f']=$_1972e2_local_params;$_1972e2_old_vars['_a50a6f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a50a6f'];$_1972e2_local_vars=$_1972e2_old_vars['_a50a6f'];?>
<?php $_1972e2_old_params['_937f51']=$_1972e2_local_params;$_1972e2_old_vars['_937f51']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_1972e2_local_params=$_1972e2_old_params['_937f51'];$_1972e2_local_vars=$_1972e2_old_vars['_937f51'];?>
<?php $_1972e2_old_params['_3a84fe']=$_1972e2_local_params;$_1972e2_old_vars['_3a84fe']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_c9eec1']=$_1972e2_local_params;$_1972e2_old_vars['_c9eec1']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c9eec1'];$_1972e2_local_vars=$_1972e2_old_vars['_c9eec1'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_3a84fe'];$_1972e2_local_vars=$_1972e2_old_vars['_3a84fe'];?>
<?php $_1972e2_old_params['_e3a49b']=$_1972e2_local_params;$_1972e2_old_vars['_e3a49b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e3a49b'];$_1972e2_local_vars=$_1972e2_old_vars['_e3a49b'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_1972e2_old_params['_6f6cba']=$_1972e2_local_params;$_1972e2_old_vars['_6f6cba']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6f6cba'];$_1972e2_local_vars=$_1972e2_old_vars['_6f6cba'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_9405e5'];$_1972e2_local_vars=$_1972e2_old_vars['_9405e5'];?>

            <?php $_1972e2_old_params['_5ee6da']=$_1972e2_local_params;$_1972e2_old_vars['_5ee6da']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5ee6da'];$_1972e2_local_vars=$_1972e2_old_vars['_5ee6da'];?>

            <?php endif;$c_357d53=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_357d53'];$_1972e2_local_vars=$_1972e2_old_vars['_357d53'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_9a4d80'];$_1972e2_local_vars=$_1972e2_old_vars['_9a4d80'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8b0557'];$_1972e2_local_vars=$_1972e2_old_vars['_8b0557'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_1972e2_old_params['_b7b001']=$_1972e2_local_params;$_1972e2_old_vars['_b7b001']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_64b908=null;$_1972e2_old_params['_64b908']=$_1972e2_local_params;$_1972e2_old_vars['_64b908']=$_1972e2_local_vars;$a_64b908=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_64b908=-1;$r_64b908=true;while($r_64b908===true):$r_64b908=($_64b908!==-1)?false:true;echo $this->block_loop($a_64b908,$c_64b908,$this,$r_64b908,++$_64b908,'_64b908');ob_start();?>
<?php $c_64b908 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_64b908=false;}if($c_64b908 ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_1972e2_old_params['_a43525']=$_1972e2_local_params;$_1972e2_old_vars['_a43525']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a43525'];$_1972e2_local_vars=$_1972e2_old_vars['_a43525'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_64b908=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_64b908'];$_1972e2_local_vars=$_1972e2_old_vars['_64b908'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_1972e2_old_params['_15ea03']=$_1972e2_local_params;$_1972e2_old_vars['_15ea03']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_15ea03'];$_1972e2_local_vars=$_1972e2_old_vars['_15ea03'];?>
<?php $_1972e2_old_params['_e872a8']=$_1972e2_local_params;$_1972e2_old_vars['_e872a8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e872a8'];$_1972e2_local_vars=$_1972e2_old_vars['_e872a8'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_1972e2_old_params['_031dde']=$_1972e2_local_params;$_1972e2_old_vars['_031dde']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_031dde'];$_1972e2_local_vars=$_1972e2_old_vars['_031dde'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_1972e2_old_params['_b266c3']=$_1972e2_local_params;$_1972e2_old_vars['_b266c3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_b266c3'];$_1972e2_local_vars=$_1972e2_old_vars['_b266c3'];?>
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
                  <input type="checkbox" <?php $_1972e2_old_params['_ffa0c2']=$_1972e2_local_params;$_1972e2_old_vars['_ffa0c2']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ffa0c2'];$_1972e2_local_vars=$_1972e2_old_vars['_ffa0c2'];?>
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
                  <input class="custom-control-input" type="radio" <?php $_1972e2_old_params['_91cf13']=$_1972e2_local_params;$_1972e2_old_vars['_91cf13']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_91cf13'];$_1972e2_local_vars=$_1972e2_old_vars['_91cf13'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_1972e2_old_params['_ce0141']=$_1972e2_local_params;$_1972e2_old_vars['_ce0141']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ce0141'];$_1972e2_local_vars=$_1972e2_old_vars['_ce0141'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_b7b001'];$_1972e2_local_vars=$_1972e2_old_vars['_b7b001'];?>

            <div class="row form-group">
              <?php $c_cbadd6=null;$_1972e2_old_params['_cbadd6']=$_1972e2_local_params;$_1972e2_old_vars['_cbadd6']=$_1972e2_local_vars;$a_cbadd6=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_cbadd6=-1;$r_cbadd6=true;while($r_cbadd6===true):$r_cbadd6=($_cbadd6!==-1)?false:true;echo $this->block_loop($a_cbadd6,$c_cbadd6,$this,$r_cbadd6,++$_cbadd6,'_cbadd6');ob_start();?>
<?php $c_cbadd6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_cbadd6=false;}if($c_cbadd6 ):?>

              <?php $_1972e2_old_params['_d0e3d5']=$_1972e2_local_params;$_1972e2_old_vars['_d0e3d5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_d0e3d5'];$_1972e2_local_vars=$_1972e2_old_vars['_d0e3d5'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_1972e2_old_params['_28b3fe']=$_1972e2_local_params;$_1972e2_old_vars['_28b3fe']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_28b3fe'];$_1972e2_local_vars=$_1972e2_old_vars['_28b3fe'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_1972e2_old_params['_32c787']=$_1972e2_local_params;$_1972e2_old_vars['_32c787']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_8bcd2b=null;$_1972e2_old_params['_8bcd2b']=$_1972e2_local_params;$_1972e2_old_vars['_8bcd2b']=$_1972e2_local_vars;$a_8bcd2b=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_8bcd2b=-1;$r_8bcd2b=true;while($r_8bcd2b===true):$r_8bcd2b=($_8bcd2b!==-1)?false:true;echo $this->block_loop($a_8bcd2b,$c_8bcd2b,$this,$r_8bcd2b,++$_8bcd2b,'_8bcd2b');ob_start();?>
<?php $c_8bcd2b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8bcd2b=false;}if($c_8bcd2b ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_1972e2_old_params['_61c629']=$_1972e2_local_params;$_1972e2_old_vars['_61c629']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_1972e2_local_params=$_1972e2_old_params['_61c629'];$_1972e2_local_vars=$_1972e2_old_vars['_61c629'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_8bcd2b=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_8bcd2b'];$_1972e2_local_vars=$_1972e2_old_vars['_8bcd2b'];?>

                </select>
              </div>
              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_32c787'];$_1972e2_local_vars=$_1972e2_old_vars['_32c787'];?>

              <?php endif;$c_cbadd6=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_cbadd6'];$_1972e2_local_vars=$_1972e2_old_vars['_cbadd6'];?>

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

<?php $_1972e2_old_params['_860198']=$_1972e2_local_params;$_1972e2_old_vars['_860198']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_860198'];$_1972e2_local_vars=$_1972e2_old_vars['_860198'];?>

<?php $_1972e2_old_params['_a88356']=$_1972e2_local_params;$_1972e2_old_vars['_a88356']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
      <?php $_1972e2_old_params['_6172a7']=$_1972e2_local_params;$_1972e2_old_vars['_6172a7']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_6172a7'];$_1972e2_local_vars=$_1972e2_old_vars['_6172a7'];?>

    }
});
</script>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a88356'];$_1972e2_local_vars=$_1972e2_old_vars['_a88356'];?>

<?php endif;$_542ceb=ob_get_clean();echo $this->modifier_trim_space($_542ceb,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_1972e2_local_params=$_1972e2_old_params['_542ceb'];$_1972e2_local_vars=$_1972e2_old_vars['_542ceb'];?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_891c28'];$_1972e2_local_vars=$_1972e2_old_vars['_891c28'];?>

            <?php $_1972e2_old_params['_d9e4b2']=$_1972e2_local_params;$_1972e2_old_vars['_d9e4b2']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_1972e2_old_params['_bd325d']=$_1972e2_local_params;$_1972e2_old_vars['_bd325d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_bd325d'];$_1972e2_local_vars=$_1972e2_old_vars['_bd325d'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_1972e2_old_params['_8d38d1']=$_1972e2_local_params;$_1972e2_old_vars['_8d38d1']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8d38d1'];$_1972e2_local_vars=$_1972e2_old_vars['_8d38d1'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_1972e2_old_params['_133f4a']=$_1972e2_local_params;$_1972e2_old_vars['_133f4a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_0cb43a=null;$_1972e2_old_params['_0cb43a']=$_1972e2_local_params;$_1972e2_old_vars['_0cb43a']=$_1972e2_local_vars;$a_0cb43a=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_0cb43a=-1;$r_0cb43a=true;while($r_0cb43a===true):$r_0cb43a=($_0cb43a!==-1)?false:true;echo $this->block_loop($a_0cb43a,$c_0cb43a,$this,$r_0cb43a,++$_0cb43a,'_0cb43a');ob_start();?>
<?php $c_0cb43a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0cb43a=false;}if($c_0cb43a ):?>

                    <?php $_1972e2_old_params['_03d33c']=$_1972e2_local_params;$_1972e2_old_vars['_03d33c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_1972e2_local_params=$_1972e2_old_params['_03d33c'];$_1972e2_local_vars=$_1972e2_old_vars['_03d33c'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_1972e2_old_params['_e4fbc5']=$_1972e2_local_params;$_1972e2_old_vars['_e4fbc5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e4fbc5'];$_1972e2_local_vars=$_1972e2_old_vars['_e4fbc5'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_1972e2_old_params['_2769c3']=$_1972e2_local_params;$_1972e2_old_vars['_2769c3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_2769c3'];$_1972e2_local_vars=$_1972e2_old_vars['_2769c3'];?>

                  <?php endif;$c_0cb43a=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_0cb43a'];$_1972e2_local_vars=$_1972e2_old_vars['_0cb43a'];?>

                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_133f4a'];$_1972e2_local_vars=$_1972e2_old_vars['_133f4a'];?>

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

<?php $_1972e2_old_params['_f20d72']=$_1972e2_local_params;$_1972e2_old_vars['_f20d72']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_f20d72'];$_1972e2_local_vars=$_1972e2_old_vars['_f20d72'];?>

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
?<?php $_1972e2_old_params['_77e19d']=$_1972e2_local_params;$_1972e2_old_vars['_77e19d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_1972e2_local_params=$_1972e2_old_params['_77e19d'];$_1972e2_local_vars=$_1972e2_old_vars['_77e19d'];?>
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
$('#drop-zone').css('border','3px dashed <?php $_1972e2_old_params['_70e966']=$_1972e2_local_params;$_1972e2_old_vars['_70e966']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_1972e2_local_params=$_1972e2_old_params['_70e966'];$_1972e2_local_vars=$_1972e2_old_vars['_70e966'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_1972e2_old_params['_4cf8b5']=$_1972e2_local_params;$_1972e2_old_vars['_4cf8b5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_1972e2_local_params=$_1972e2_old_params['_4cf8b5'];$_1972e2_local_vars=$_1972e2_old_vars['_4cf8b5'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_1972e2_old_params['_8931aa']=$_1972e2_local_params;$_1972e2_old_vars['_8931aa']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8931aa'];$_1972e2_local_vars=$_1972e2_old_vars['_8931aa'];?>
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
    <?php $_1972e2_old_params['_299b6b']=$_1972e2_local_params;$_1972e2_old_vars['_299b6b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_299b6b'];$_1972e2_local_vars=$_1972e2_old_vars['_299b6b'];?>

}
</script>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_d9e4b2'];$_1972e2_local_vars=$_1972e2_old_vars['_d9e4b2'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_fb4756'];$_1972e2_local_vars=$_1972e2_old_vars['_fb4756'];?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_cc0e2b']=$_1972e2_local_params;$_1972e2_old_vars['_cc0e2b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_1972e2_old_params['_4c6ca8']=$_1972e2_local_params;$_1972e2_old_vars['_4c6ca8']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_1972e2_old_params['_5e6e9e']=$_1972e2_local_params;$_1972e2_old_vars['_5e6e9e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5e6e9e'];$_1972e2_local_vars=$_1972e2_old_vars['_5e6e9e'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_1972e2_old_params['_17bb9c']=$_1972e2_local_params;$_1972e2_old_vars['_17bb9c']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_d01ab4=null;$_1972e2_old_params['_d01ab4']=$_1972e2_local_params;$_1972e2_old_vars['_d01ab4']=$_1972e2_local_vars;$a_d01ab4=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_d01ab4=-1;$r_d01ab4=true;while($r_d01ab4===true):$r_d01ab4=($_d01ab4!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_d01ab4,$c_d01ab4,$this,$r_d01ab4,++$_d01ab4,'_d01ab4');ob_start();?>
<?php $c_d01ab4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d01ab4=false;}if($c_d01ab4 ):?>

              <?php $_1972e2_old_params['_3db0fe']=$_1972e2_local_params;$_1972e2_old_vars['_3db0fe']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_1972e2_old_params['_259989']=$_1972e2_local_params;$_1972e2_old_vars['_259989']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_1972e2_old_params['_3baace']=$_1972e2_local_params;$_1972e2_old_vars['_3baace']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_1972e2_old_params['_1eaf4e']=$_1972e2_local_params;$_1972e2_old_vars['_1eaf4e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_1972e2_old_params['_646692']=$_1972e2_local_params;$_1972e2_old_vars['_646692']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_646692'];$_1972e2_local_vars=$_1972e2_old_vars['_646692'];?>

                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_1eaf4e'];$_1972e2_local_vars=$_1972e2_old_vars['_1eaf4e'];?>

                  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_3baace'];$_1972e2_local_vars=$_1972e2_old_vars['_3baace'];?>

                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_259989'];$_1972e2_local_vars=$_1972e2_old_vars['_259989'];?>

                <?php $_1972e2_old_params['_89f293']=$_1972e2_local_params;$_1972e2_old_vars['_89f293']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_1972e2_old_params['_96936c']=$_1972e2_local_params;$_1972e2_old_vars['_96936c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_96936c'];$_1972e2_local_vars=$_1972e2_old_vars['_96936c'];?>

                  <?php $_1972e2_old_params['_abb883']=$_1972e2_local_params;$_1972e2_old_vars['_abb883']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_abb883'];$_1972e2_local_vars=$_1972e2_old_vars['_abb883'];?>

                  <label class="edit-options-child <?php $_1972e2_old_params['_7e3055']=$_1972e2_local_params;$_1972e2_old_vars['_7e3055']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_1972e2_local_params=$_1972e2_old_params['_7e3055'];$_1972e2_local_vars=$_1972e2_old_vars['_7e3055'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_1972e2_old_params['_4b9ca8']=$_1972e2_local_params;$_1972e2_old_vars['_4b9ca8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_4b9ca8'];$_1972e2_local_vars=$_1972e2_old_vars['_4b9ca8'];?>

                    <input<?php $_1972e2_old_params['_6108f9']=$_1972e2_local_params;$_1972e2_old_vars['_6108f9']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_1972e2_old_params['_5efd38']=$_1972e2_local_params;$_1972e2_old_vars['_5efd38']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_1972e2_old_params['_530dda']=$_1972e2_local_params;$_1972e2_old_vars['_530dda']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_530dda'];$_1972e2_local_vars=$_1972e2_old_vars['_530dda'];?>

                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5efd38'];$_1972e2_local_vars=$_1972e2_old_vars['_5efd38'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6108f9'];$_1972e2_local_vars=$_1972e2_old_vars['_6108f9'];?>
<?php $_1972e2_old_params['_cac212']=$_1972e2_local_params;$_1972e2_old_vars['_cac212']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_cac212'];$_1972e2_local_vars=$_1972e2_old_vars['_cac212'];?>
 type="<?php $_1972e2_old_params['_514402']=$_1972e2_local_params;$_1972e2_old_vars['_514402']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_1972e2_local_params=$_1972e2_old_params['_514402'];$_1972e2_local_vars=$_1972e2_old_vars['_514402'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_1972e2_old_params['_02c046']=$_1972e2_local_params;$_1972e2_old_vars['_02c046']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_1972e2_local_params=$_1972e2_old_params['_02c046'];$_1972e2_local_vars=$_1972e2_old_vars['_02c046'];?>
<?php $_1972e2_old_params['_3c8c39']=$_1972e2_local_params;$_1972e2_old_vars['_3c8c39']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_1972e2_local_params=$_1972e2_old_params['_3c8c39'];$_1972e2_local_vars=$_1972e2_old_vars['_3c8c39'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_89f293'];$_1972e2_local_vars=$_1972e2_old_vars['_89f293'];?>

              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_3db0fe'];$_1972e2_local_vars=$_1972e2_old_vars['_3db0fe'];?>

            <?php endif;$c_d01ab4=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_d01ab4'];$_1972e2_local_vars=$_1972e2_old_vars['_d01ab4'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_17bb9c'];$_1972e2_local_vars=$_1972e2_old_vars['_17bb9c'];?>

                <?php $c_d1f11d=null;$_1972e2_old_params['_d1f11d']=$_1972e2_local_params;$_1972e2_old_vars['_d1f11d']=$_1972e2_local_vars;$a_d1f11d=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_d1f11d=-1;$r_d1f11d=true;while($r_d1f11d===true):$r_d1f11d=($_d1f11d!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_d1f11d,$c_d1f11d,$this,$r_d1f11d,++$_d1f11d,'_d1f11d');ob_start();?>
<?php $c_d1f11d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d1f11d=false;}if($c_d1f11d ):?>

                <?php $c_19da3e=null;$_1972e2_old_params['_19da3e']=$_1972e2_local_params;$_1972e2_old_vars['_19da3e']=$_1972e2_local_vars;$a_19da3e=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_19da3e=ob_get_clean();$c_19da3e=$this->block_setvarblock($a_19da3e,$c_19da3e,$this,$r_19da3e,1,'_19da3e');echo($c_19da3e); $_1972e2_local_params=$_1972e2_old_params['_19da3e'];?>

                <label class="<?php $_1972e2_old_params['_f17048']=$_1972e2_local_params;$_1972e2_old_vars['_f17048']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_1972e2_local_params=$_1972e2_old_params['_f17048'];$_1972e2_local_vars=$_1972e2_old_vars['_f17048'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_1972e2_old_params['_f4d18d']=$_1972e2_local_params;$_1972e2_old_vars['_f4d18d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_1972e2_local_params=$_1972e2_old_params['_f4d18d'];$_1972e2_local_vars=$_1972e2_old_vars['_f4d18d'];?>

                  <?php $_1972e2_old_params['_3b6fe0']=$_1972e2_local_params;$_1972e2_old_vars['_3b6fe0']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_3b6fe0'];$_1972e2_local_vars=$_1972e2_old_vars['_3b6fe0'];?>

                  <?php $_1972e2_old_params['_9d7535']=$_1972e2_local_params;$_1972e2_old_vars['_9d7535']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_9d7535'];$_1972e2_local_vars=$_1972e2_old_vars['_9d7535'];?>
 <?php $_1972e2_old_params['_a46aae']=$_1972e2_local_params;$_1972e2_old_vars['_a46aae']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a46aae'];$_1972e2_local_vars=$_1972e2_old_vars['_a46aae'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_1972e2_old_params['_a6b6cd']=$_1972e2_local_params;$_1972e2_old_vars['_a6b6cd']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a6b6cd'];$_1972e2_local_vars=$_1972e2_old_vars['_a6b6cd'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_d1f11d=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_d1f11d'];$_1972e2_local_vars=$_1972e2_old_vars['_d1f11d'];?>

              <?php $_1972e2_old_params['_d3f280']=$_1972e2_local_params;$_1972e2_old_vars['_d3f280']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_d3f280'];$_1972e2_local_vars=$_1972e2_old_vars['_d3f280'];?>

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
<?php endif;$_4c6ca8=ob_get_clean();echo $this->modifier_trim_space($_4c6ca8,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_1972e2_local_params=$_1972e2_old_params['_4c6ca8'];$_1972e2_local_vars=$_1972e2_old_vars['_4c6ca8'];?>

<script>
<?php $_1972e2_old_params['_8087ef']=$_1972e2_local_params;$_1972e2_old_vars['_8087ef']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8087ef'];$_1972e2_local_vars=$_1972e2_old_vars['_8087ef'];?>

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

<?php $_1972e2_old_params['_ff4177']=$_1972e2_local_params;$_1972e2_old_vars['_ff4177']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ff4177'];$_1972e2_local_vars=$_1972e2_old_vars['_ff4177'];?>

    }
    updateFieldSelector();
});
</script>
            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_cc0e2b'];$_1972e2_local_vars=$_1972e2_old_vars['_cc0e2b'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_b77897'];$_1972e2_local_vars=$_1972e2_old_vars['_b77897'];?>

    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_c8f4bf'];$_1972e2_local_vars=$_1972e2_old_vars['_c8f4bf'];?>

    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_f0c95a'];$_1972e2_local_vars=$_1972e2_old_vars['_f0c95a'];?>

  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_197338'];$_1972e2_local_vars=$_1972e2_old_vars['_197338'];?>

  <?php $_1972e2_old_params['_ab28fc']=$_1972e2_local_params;$_1972e2_old_vars['_ab28fc']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    
    <?php $_1972e2_old_params['_fb0358']=$_1972e2_local_params;$_1972e2_old_vars['_fb0358']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php ob_start();$_1972e2_old_params['_88e522']=$_1972e2_local_params;$_1972e2_old_vars['_88e522']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_1972e2_old_params['_e55d27']=$_1972e2_local_params;$_1972e2_old_vars['_e55d27']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e55d27'];$_1972e2_local_vars=$_1972e2_old_vars['_e55d27'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_1972e2_old_params['_8d79ab']=$_1972e2_local_params;$_1972e2_old_vars['_8d79ab']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_3865a3=null;$_1972e2_old_params['_3865a3']=$_1972e2_local_params;$_1972e2_old_vars['_3865a3']=$_1972e2_local_vars;$a_3865a3=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_3865a3=-1;$r_3865a3=true;while($r_3865a3===true):$r_3865a3=($_3865a3!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_3865a3,$c_3865a3,$this,$r_3865a3,++$_3865a3,'_3865a3');ob_start();?>
<?php $c_3865a3 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3865a3=false;}if($c_3865a3 ):?>

              <?php $_1972e2_old_params['_8006d2']=$_1972e2_local_params;$_1972e2_old_vars['_8006d2']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_1972e2_old_params['_e381f5']=$_1972e2_local_params;$_1972e2_old_vars['_e381f5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_1972e2_old_params['_28759f']=$_1972e2_local_params;$_1972e2_old_vars['_28759f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_1972e2_old_params['_0a0041']=$_1972e2_local_params;$_1972e2_old_vars['_0a0041']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_1972e2_old_params['_533a81']=$_1972e2_local_params;$_1972e2_old_vars['_533a81']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_533a81'];$_1972e2_local_vars=$_1972e2_old_vars['_533a81'];?>

                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_0a0041'];$_1972e2_local_vars=$_1972e2_old_vars['_0a0041'];?>

                  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_28759f'];$_1972e2_local_vars=$_1972e2_old_vars['_28759f'];?>

                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e381f5'];$_1972e2_local_vars=$_1972e2_old_vars['_e381f5'];?>

                <?php $_1972e2_old_params['_3eca51']=$_1972e2_local_params;$_1972e2_old_vars['_3eca51']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_1972e2_old_params['_49fb16']=$_1972e2_local_params;$_1972e2_old_vars['_49fb16']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_49fb16'];$_1972e2_local_vars=$_1972e2_old_vars['_49fb16'];?>

                  <?php $_1972e2_old_params['_92bb4c']=$_1972e2_local_params;$_1972e2_old_vars['_92bb4c']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_92bb4c'];$_1972e2_local_vars=$_1972e2_old_vars['_92bb4c'];?>

                  <label class="edit-options-child <?php $_1972e2_old_params['_58937c']=$_1972e2_local_params;$_1972e2_old_vars['_58937c']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_1972e2_local_params=$_1972e2_old_params['_58937c'];$_1972e2_local_vars=$_1972e2_old_vars['_58937c'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_1972e2_old_params['_a54893']=$_1972e2_local_params;$_1972e2_old_vars['_a54893']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a54893'];$_1972e2_local_vars=$_1972e2_old_vars['_a54893'];?>

                    <input<?php $_1972e2_old_params['_080126']=$_1972e2_local_params;$_1972e2_old_vars['_080126']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_1972e2_old_params['_7ad1b4']=$_1972e2_local_params;$_1972e2_old_vars['_7ad1b4']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_1972e2_old_params['_0bd660']=$_1972e2_local_params;$_1972e2_old_vars['_0bd660']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_0bd660'];$_1972e2_local_vars=$_1972e2_old_vars['_0bd660'];?>

                    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_7ad1b4'];$_1972e2_local_vars=$_1972e2_old_vars['_7ad1b4'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_080126'];$_1972e2_local_vars=$_1972e2_old_vars['_080126'];?>
<?php $_1972e2_old_params['_95019e']=$_1972e2_local_params;$_1972e2_old_vars['_95019e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_95019e'];$_1972e2_local_vars=$_1972e2_old_vars['_95019e'];?>
 type="<?php $_1972e2_old_params['_2dcdcf']=$_1972e2_local_params;$_1972e2_old_vars['_2dcdcf']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_1972e2_local_params=$_1972e2_old_params['_2dcdcf'];$_1972e2_local_vars=$_1972e2_old_vars['_2dcdcf'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_1972e2_old_params['_8aed3b']=$_1972e2_local_params;$_1972e2_old_vars['_8aed3b']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8aed3b'];$_1972e2_local_vars=$_1972e2_old_vars['_8aed3b'];?>
<?php $_1972e2_old_params['_bb4666']=$_1972e2_local_params;$_1972e2_old_vars['_bb4666']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_1972e2_local_params=$_1972e2_old_params['_bb4666'];$_1972e2_local_vars=$_1972e2_old_vars['_bb4666'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_3eca51'];$_1972e2_local_vars=$_1972e2_old_vars['_3eca51'];?>

              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8006d2'];$_1972e2_local_vars=$_1972e2_old_vars['_8006d2'];?>

            <?php endif;$c_3865a3=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_3865a3'];$_1972e2_local_vars=$_1972e2_old_vars['_3865a3'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8d79ab'];$_1972e2_local_vars=$_1972e2_old_vars['_8d79ab'];?>

                <?php $c_6353ce=null;$_1972e2_old_params['_6353ce']=$_1972e2_local_params;$_1972e2_old_vars['_6353ce']=$_1972e2_local_vars;$a_6353ce=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_6353ce=-1;$r_6353ce=true;while($r_6353ce===true):$r_6353ce=($_6353ce!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_6353ce,$c_6353ce,$this,$r_6353ce,++$_6353ce,'_6353ce');ob_start();?>
<?php $c_6353ce = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_6353ce=false;}if($c_6353ce ):?>

                <?php $c_3a1d00=null;$_1972e2_old_params['_3a1d00']=$_1972e2_local_params;$_1972e2_old_vars['_3a1d00']=$_1972e2_local_vars;$a_3a1d00=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_3a1d00=ob_get_clean();$c_3a1d00=$this->block_setvarblock($a_3a1d00,$c_3a1d00,$this,$r_3a1d00,1,'_3a1d00');echo($c_3a1d00); $_1972e2_local_params=$_1972e2_old_params['_3a1d00'];?>

                <label class="<?php $_1972e2_old_params['_679ae7']=$_1972e2_local_params;$_1972e2_old_vars['_679ae7']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_1972e2_local_params=$_1972e2_old_params['_679ae7'];$_1972e2_local_vars=$_1972e2_old_vars['_679ae7'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_1972e2_old_params['_428f17']=$_1972e2_local_params;$_1972e2_old_vars['_428f17']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_1972e2_local_params=$_1972e2_old_params['_428f17'];$_1972e2_local_vars=$_1972e2_old_vars['_428f17'];?>

                  <?php $_1972e2_old_params['_8a8462']=$_1972e2_local_params;$_1972e2_old_vars['_8a8462']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8a8462'];$_1972e2_local_vars=$_1972e2_old_vars['_8a8462'];?>

                  <?php $_1972e2_old_params['_326eee']=$_1972e2_local_params;$_1972e2_old_vars['_326eee']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_326eee'];$_1972e2_local_vars=$_1972e2_old_vars['_326eee'];?>
 <?php $_1972e2_old_params['_ddfef2']=$_1972e2_local_params;$_1972e2_old_vars['_ddfef2']=$_1972e2_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ddfef2'];$_1972e2_local_vars=$_1972e2_old_vars['_ddfef2'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_1972e2_old_params['_713578']=$_1972e2_local_params;$_1972e2_old_vars['_713578']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_1972e2_local_params=$_1972e2_old_params['_713578'];$_1972e2_local_vars=$_1972e2_old_vars['_713578'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_6353ce=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_6353ce'];$_1972e2_local_vars=$_1972e2_old_vars['_6353ce'];?>

              <?php $_1972e2_old_params['_2f0cba']=$_1972e2_local_params;$_1972e2_old_vars['_2f0cba']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_2f0cba'];$_1972e2_local_vars=$_1972e2_old_vars['_2f0cba'];?>

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
<?php endif;$_88e522=ob_get_clean();echo $this->modifier_trim_space($_88e522,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_1972e2_local_params=$_1972e2_old_params['_88e522'];$_1972e2_local_vars=$_1972e2_old_vars['_88e522'];?>

<script>
<?php $_1972e2_old_params['_aa3b61']=$_1972e2_local_params;$_1972e2_old_vars['_aa3b61']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_aa3b61'];$_1972e2_local_vars=$_1972e2_old_vars['_aa3b61'];?>

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

<?php $_1972e2_old_params['_dbfac6']=$_1972e2_local_params;$_1972e2_old_vars['_dbfac6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_dbfac6'];$_1972e2_local_vars=$_1972e2_old_vars['_dbfac6'];?>

    }
    updateFieldSelector();
});
</script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_fb0358'];$_1972e2_local_vars=$_1972e2_old_vars['_fb0358'];?>

  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_ab28fc'];$_1972e2_local_vars=$_1972e2_old_vars['_ab28fc'];?>

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
<?php $_1972e2_old_params['_8e8a00']=$_1972e2_local_params;$_1972e2_old_vars['_8e8a00']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'output_container','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="container-fluid">
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8e8a00'];$_1972e2_local_vars=$_1972e2_old_vars['_8e8a00'];?>

      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 id="page-title" <?php $_1972e2_old_params['_5a3b2a']=$_1972e2_local_params;$_1972e2_old_vars['_5a3b2a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_6c9cd6']=$_1972e2_local_params;$_1972e2_old_vars['_6c9cd6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_5b2475']=$_1972e2_local_params;$_1972e2_old_vars['_5b2475']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-top:-33px"<?php else:?>
style="margin-top:-36px"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_5b2475'];$_1972e2_local_vars=$_1972e2_old_vars['_5b2475'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6c9cd6'];$_1972e2_local_vars=$_1972e2_old_vars['_6c9cd6'];?>
 class="title-with-opt"<?php else:?>
 <?php $_1972e2_old_params['_935c25']=$_1972e2_local_params;$_1972e2_old_vars['_935c25']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_1337e1']=$_1972e2_local_params;$_1972e2_old_vars['_1337e1']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="margin-top:-3px"<?php else:?>
style="margin-top:-11px"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_1337e1'];$_1972e2_local_vars=$_1972e2_old_vars['_1337e1'];?>
<?php else:?>
style="margin-top:-10px"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_935c25'];$_1972e2_local_vars=$_1972e2_old_vars['_935c25'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_5a3b2a'];$_1972e2_local_vars=$_1972e2_old_vars['_5a3b2a'];?>
>
          <span class="title">
          <?php $_1972e2_old_params['_20f60e']=$_1972e2_local_params;$_1972e2_old_vars['_20f60e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_f3aa7f']=$_1972e2_local_params;$_1972e2_old_vars['_f3aa7f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_1972e2_old_params['_8c209d']=$_1972e2_local_params;$_1972e2_old_vars['_8c209d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.revision_select','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8c209d'];$_1972e2_local_vars=$_1972e2_old_vars['_8c209d'];?>
"><?php endif;$_1972e2_local_params=$_1972e2_old_params['_f3aa7f'];$_1972e2_local_vars=$_1972e2_old_vars['_f3aa7f'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_20f60e'];$_1972e2_local_vars=$_1972e2_old_vars['_20f60e'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
<?php $_1972e2_old_params['_604eed']=$_1972e2_local_params;$_1972e2_old_vars['_604eed']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_636bfb']=$_1972e2_local_params;$_1972e2_old_vars['_636bfb']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_1972e2_local_params=$_1972e2_old_params['_636bfb'];$_1972e2_local_vars=$_1972e2_old_vars['_636bfb'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_604eed'];$_1972e2_local_vars=$_1972e2_old_vars['_604eed'];?>

          </span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

      <?php $_1972e2_old_params['_6519ee']=$_1972e2_local_params;$_1972e2_old_vars['_6519ee']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_1972e2_old_params['_a35bed']=$_1972e2_local_params;$_1972e2_old_vars['_a35bed']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_1972e2_old_params['_281be8']=$_1972e2_local_params;$_1972e2_old_vars['_281be8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_8aaa05']=$_1972e2_local_params;$_1972e2_old_vars['_8aaa05']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_c25d5c']=$_1972e2_local_params;$_1972e2_old_vars['_c25d5c']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_afb0bd']=$_1972e2_local_params;$_1972e2_old_vars['_afb0bd']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_afb0bd'];$_1972e2_local_vars=$_1972e2_old_vars['_afb0bd'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_c25d5c'];$_1972e2_local_vars=$_1972e2_old_vars['_c25d5c'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8aaa05'];$_1972e2_local_vars=$_1972e2_old_vars['_8aaa05'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_281be8'];$_1972e2_local_vars=$_1972e2_old_vars['_281be8'];?>

        <?php $_1972e2_old_params['_3e02b8']=$_1972e2_local_params;$_1972e2_old_vars['_3e02b8']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_create','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_4cb436']=$_1972e2_local_params;$_1972e2_old_vars['_4cb436']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_1972e2_old_params['_c33110']=$_1972e2_local_params;$_1972e2_old_vars['_c33110']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_1972e2_old_params['_8894a9']=$_1972e2_local_params;$_1972e2_old_vars['_8894a9']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8894a9'];$_1972e2_local_vars=$_1972e2_old_vars['_8894a9'];?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_c33110'];$_1972e2_local_vars=$_1972e2_old_vars['_c33110'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_4cb436'];$_1972e2_local_vars=$_1972e2_old_vars['_4cb436'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_3e02b8'];$_1972e2_local_vars=$_1972e2_old_vars['_3e02b8'];?>

        <?php $_1972e2_old_params['_62bfef']=$_1972e2_local_params;$_1972e2_old_vars['_62bfef']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_28ffd3']=$_1972e2_local_params;$_1972e2_old_vars['_28ffd3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_1972e2_old_params['_333233']=$_1972e2_local_params;$_1972e2_old_vars['_333233']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'orig_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('orig_label','setvar',$this),$this,'setvar')?>

              <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Syetem\'s Role','setvar'=>'label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_333233'];$_1972e2_local_vars=$_1972e2_old_vars['_333233'];?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_1972e2_old_params['_534280']=$_1972e2_local_params;$_1972e2_old_vars['_534280']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_e256cb']=$_1972e2_local_params;$_1972e2_old_vars['_e256cb']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e256cb'];$_1972e2_local_vars=$_1972e2_old_vars['_e256cb'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_534280'];$_1972e2_local_vars=$_1972e2_old_vars['_534280'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_1972e2_old_params['_cd2588']=$_1972e2_local_params;$_1972e2_old_vars['_cd2588']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_cd2588'];$_1972e2_local_vars=$_1972e2_old_vars['_cd2588'];?>

            <?php $_1972e2_old_params['_3a582e']=$_1972e2_local_params;$_1972e2_old_vars['_3a582e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_e5b6fa']=$_1972e2_local_params;$_1972e2_old_vars['_e5b6fa']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e5b6fa'];$_1972e2_local_vars=$_1972e2_old_vars['_e5b6fa'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_3a582e'];$_1972e2_local_vars=$_1972e2_old_vars['_3a582e'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_28ffd3'];$_1972e2_local_vars=$_1972e2_old_vars['_28ffd3'];?>

          <?php $_1972e2_old_params['_c5de6e']=$_1972e2_local_params;$_1972e2_old_vars['_c5de6e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_1972e2_old_params['_6dd5f7']=$_1972e2_local_params;$_1972e2_old_vars['_6dd5f7']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_1972e2_old_params['_d55017']=$_1972e2_local_params;$_1972e2_old_vars['_d55017']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_c4bd5b']=$_1972e2_local_params;$_1972e2_old_vars['_c4bd5b']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_a430e5']=$_1972e2_local_params;$_1972e2_old_vars['_a430e5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a430e5'];$_1972e2_local_vars=$_1972e2_old_vars['_a430e5'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_c4bd5b'];$_1972e2_local_vars=$_1972e2_old_vars['_c4bd5b'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_d55017'];$_1972e2_local_vars=$_1972e2_old_vars['_d55017'];?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_6dd5f7'];$_1972e2_local_vars=$_1972e2_old_vars['_6dd5f7'];?>

            <?php $_1972e2_old_params['_40707d']=$_1972e2_local_params;$_1972e2_old_vars['_40707d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_1972e2_old_params['_f4cbf3']=$_1972e2_local_params;$_1972e2_old_vars['_f4cbf3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_1972e2_old_params['_c8eb74']=$_1972e2_local_params;$_1972e2_old_vars['_c8eb74']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_1f95e7']=$_1972e2_local_params;$_1972e2_old_vars['_1f95e7']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_1972e2_local_params=$_1972e2_old_params['_1f95e7'];$_1972e2_local_vars=$_1972e2_old_vars['_1f95e7'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c8eb74'];$_1972e2_local_vars=$_1972e2_old_vars['_c8eb74'];?>

            <?php else:?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_1972e2_old_params['_32485b']=$_1972e2_local_params;$_1972e2_old_vars['_32485b']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_32485b'];$_1972e2_local_vars=$_1972e2_old_vars['_32485b'];?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_1972e2_old_params['_4fdf1f']=$_1972e2_local_params;$_1972e2_old_vars['_4fdf1f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_1e2ec5']=$_1972e2_local_params;$_1972e2_old_vars['_1e2ec5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_1e2ec5'];$_1972e2_local_vars=$_1972e2_old_vars['_1e2ec5'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_4fdf1f'];$_1972e2_local_vars=$_1972e2_old_vars['_4fdf1f'];?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_f4cbf3'];$_1972e2_local_vars=$_1972e2_old_vars['_f4cbf3'];?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_40707d'];$_1972e2_local_vars=$_1972e2_old_vars['_40707d'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_c5de6e'];$_1972e2_local_vars=$_1972e2_old_vars['_c5de6e'];?>

          <?php $_1972e2_old_params['_ee69c5']=$_1972e2_local_params;$_1972e2_old_vars['_ee69c5']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_1972e2_old_params['_747e96']=$_1972e2_local_params;$_1972e2_old_vars['_747e96']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_1972e2_old_params['_60a1a8']=$_1972e2_local_params;$_1972e2_old_vars['_60a1a8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_60a1a8'];$_1972e2_local_vars=$_1972e2_old_vars['_60a1a8'];?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_747e96'];$_1972e2_local_vars=$_1972e2_old_vars['_747e96'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_ee69c5'];$_1972e2_local_vars=$_1972e2_old_vars['_ee69c5'];?>

        <?php else:?>

          <?php $_1972e2_old_params['_888522']=$_1972e2_local_params;$_1972e2_old_vars['_888522']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_1972e2_old_params['_185427']=$_1972e2_local_params;$_1972e2_old_vars['_185427']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_185427'];$_1972e2_local_vars=$_1972e2_old_vars['_185427'];?>

            <?php $_1972e2_old_params['_a7295f']=$_1972e2_local_params;$_1972e2_old_vars['_a7295f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','eq'=>'comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a7295f'];$_1972e2_local_vars=$_1972e2_old_vars['_a7295f'];?>

            <?php $_1972e2_old_params['_26bfff']=$_1972e2_local_params;$_1972e2_old_vars['_26bfff']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_return_to_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_26bfff'];$_1972e2_local_vars=$_1972e2_old_vars['_26bfff'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_888522'];$_1972e2_local_vars=$_1972e2_old_vars['_888522'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_62bfef'];$_1972e2_local_vars=$_1972e2_old_vars['_62bfef'];?>

          <?php $_1972e2_old_params['_82fc94']=$_1972e2_local_params;$_1972e2_old_vars['_82fc94']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_82fc94'];$_1972e2_local_vars=$_1972e2_old_vars['_82fc94'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a35bed'];$_1972e2_local_vars=$_1972e2_old_vars['_a35bed'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_6519ee'];$_1972e2_local_vars=$_1972e2_old_vars['_6519ee'];?>

      <?php $_1972e2_old_params['_e5110d']=$_1972e2_local_params;$_1972e2_old_vars['_e5110d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_1972e2_old_params['_e4dfe9']=$_1972e2_local_params;$_1972e2_old_vars['_e4dfe9']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_1e2774']=$_1972e2_local_params;$_1972e2_old_vars['_1e2774']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_1972e2_old_params['_831522']=$_1972e2_local_params;$_1972e2_old_vars['_831522']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

          <?php $_1972e2_old_params['_5fd92d']=$_1972e2_local_params;$_1972e2_old_vars['_5fd92d']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;manage_revision=1">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Revision','this_tag'=>'trans'],null,$this),$this)?>

          </a>
          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5fd92d'];$_1972e2_local_vars=$_1972e2_old_vars['_5fd92d'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_831522'];$_1972e2_local_vars=$_1972e2_old_vars['_831522'];?>

          <?php endif;$_1972e2_local_params=$_1972e2_old_params['_1e2774'];$_1972e2_local_vars=$_1972e2_old_vars['_1e2774'];?>

        <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e4dfe9'];$_1972e2_local_vars=$_1972e2_old_vars['_e4dfe9'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_e5110d'];$_1972e2_local_vars=$_1972e2_old_vars['_e5110d'];?>

      <?php $_1972e2_old_params['_474d3e']=$_1972e2_local_params;$_1972e2_old_vars['_474d3e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_1972e2_old_params['_5d65e8']=$_1972e2_local_params;$_1972e2_old_vars['_5d65e8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_1972e2_old_params['_8bda10']=$_1972e2_local_params;$_1972e2_old_vars['_8bda10']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="btn btn-sm header-btn-icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="hidden fa fa-home" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
"></i>
          <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </a>
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_8bda10'];$_1972e2_local_vars=$_1972e2_old_vars['_8bda10'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_5d65e8'];$_1972e2_local_vars=$_1972e2_old_vars['_5d65e8'];?>

      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_474d3e'];$_1972e2_local_vars=$_1972e2_old_vars['_474d3e'];?>

          </h1>
    <?php $c_700ca2=null;$_1972e2_old_params['_700ca2']=$_1972e2_local_params;$_1972e2_old_vars['_700ca2']=$_1972e2_local_vars;$a_700ca2=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_700ca2=ob_get_clean();$c_700ca2=$this->block_setvarblock($a_700ca2,$c_700ca2,$this,$r_700ca2,1,'_700ca2');echo($c_700ca2); $_1972e2_local_params=$_1972e2_old_params['_700ca2'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_1972e2_old_params['_d8e1fb']=$_1972e2_local_params;$_1972e2_old_vars['_d8e1fb']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-<?php $_1972e2_old_params['_676b64']=$_1972e2_local_params;$_1972e2_old_vars['_676b64']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_class','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'header_alert_class','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
success<?php endif;$_1972e2_local_params=$_1972e2_old_params['_676b64'];$_1972e2_local_vars=$_1972e2_old_vars['_676b64'];?>
" tabindex="0">
      <?php $_1972e2_old_params['_a2ce91']=$_1972e2_local_params;$_1972e2_old_vars['_a2ce91']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'header_alert_force','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a2ce91'];$_1972e2_local_vars=$_1972e2_old_vars['_a2ce91'];?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

      <?php $_1972e2_old_params['_2413df']=$_1972e2_local_params;$_1972e2_old_vars['_2413df']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_1972e2_old_params['_ac26cc']=$_1972e2_local_params;$_1972e2_old_vars['_ac26cc']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ac26cc'];$_1972e2_local_vars=$_1972e2_old_vars['_ac26cc'];?>
" class="popup">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

        </a>
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_2413df'];$_1972e2_local_vars=$_1972e2_old_vars['_2413df'];?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_d8e1fb'];$_1972e2_local_vars=$_1972e2_old_vars['_d8e1fb'];?>

    <?php $_1972e2_old_params['_618c11']=$_1972e2_local_params;$_1972e2_old_vars['_618c11']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_618c11'];$_1972e2_local_vars=$_1972e2_old_vars['_618c11'];?>


<?php $c_272c0b=null;$_1972e2_old_params['_272c0b']=$_1972e2_local_params;$_1972e2_old_vars['_272c0b']=$_1972e2_local_vars;$a_272c0b=$this->setup_args(['name'=>'field_required','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <i class="fa fa-asterisk required" aria-hidden="true"></i>
  <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Required','this_tag'=>'trans'],null,$this),$this)?>
</span>
<?php $c_272c0b=ob_get_clean();$c_272c0b=$this->block_setvarblock($a_272c0b,$c_272c0b,$this,$r_272c0b,1,'_272c0b');echo($c_272c0b); $_1972e2_local_params=$_1972e2_old_params['_272c0b'];?>


<?php $_1972e2_old_params['_feea58']=$_1972e2_local_params;$_1972e2_old_vars['_feea58']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-success">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Your changes have been saved.','this_tag'=>'trans'],null,$this),$this)?>

  </div>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_feea58'];$_1972e2_local_vars=$_1972e2_old_vars['_feea58'];?>


<?php $_1972e2_old_params['_32d322']=$_1972e2_local_params;$_1972e2_old_vars['_32d322']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_appname','setvar'=>'appname','this_tag'=>'var'],null,$this),$this),$this->setup_args('appname','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_activation_code','setvar'=>'activation_code','this_tag'=>'var'],null,$this),$this),$this->setup_args('activation_code','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_copyright','setvar'=>'copyright','this_tag'=>'var'],null,$this),$this),$this->setup_args('copyright','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_description','setvar'=>'description','this_tag'=>'var'],null,$this),$this),$this->setup_args('description','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_two_factor_auth','setvar'=>'two_factor_auth','this_tag'=>'var'],null,$this),$this),$this->setup_args('two_factor_auth','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_two_factor_auth','setvar'=>'two_factor_auth','this_tag'=>'var'],null,$this),$this),$this->setup_args('two_factor_auth','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_lockout_limit','setvar'=>'lockout_limit','this_tag'=>'var'],null,$this),$this),$this->setup_args('lockout_limit','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_lockout_interval','setvar'=>'lockout_interval','this_tag'=>'var'],null,$this),$this),$this->setup_args('lockout_interval','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_ip_lockout_interval','setvar'=>'ip_lockout_interval','this_tag'=>'var'],null,$this),$this),$this->setup_args('ip_lockout_interval','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_ip_lockout_limit','setvar'=>'ip_lockout_limit','this_tag'=>'var'],null,$this),$this),$this->setup_args('ip_lockout_limit','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_no_lockout_allowed_ip','setvar'=>'no_lockout_allowed_ip','this_tag'=>'var'],null,$this),$this),$this->setup_args('no_lockout_allowed_ip','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_administrator_ip','setvar'=>'administrator_ip','this_tag'=>'var'],null,$this),$this),$this->setup_args('administrator_ip','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_allowed_ip_only','setvar'=>'allowed_ip_only','this_tag'=>'var'],null,$this),$this),$this->setup_args('allowed_ip_only','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_system_email','setvar'=>'system_email','this_tag'=>'var'],null,$this),$this),$this->setup_args('system_email','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_tmpl_markup','setvar'=>'tmpl_markup','this_tag'=>'var'],null,$this),$this),$this->setup_args('tmpl_markup','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_default_widget','setvar'=>'default_widget','this_tag'=>'var'],null,$this),$this),$this->setup_args('default_widget','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_site_url','setvar'=>'site_url','this_tag'=>'var'],null,$this),$this),$this->setup_args('site_url','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_preview_url','setvar'=>'preview_url','this_tag'=>'var'],null,$this),$this),$this->setup_args('preview_url','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_link_url','setvar'=>'link_url','this_tag'=>'var'],null,$this),$this),$this->setup_args('link_url','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_show_both','setvar'=>'show_both','this_tag'=>'var'],null,$this),$this),$this->setup_args('show_both','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_document_root','setvar'=>'document_root','this_tag'=>'var'],null,$this),$this),$this->setup_args('document_root','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_site_path','setvar'=>'site_path','this_tag'=>'var'],null,$this),$this),$this->setup_args('site_path','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_extra_path','setvar'=>'extra_path','this_tag'=>'var'],null,$this),$this),$this->setup_args('extra_path','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_asset_publish','setvar'=>'asset_publish','this_tag'=>'var'],null,$this),$this),$this->setup_args('asset_publish','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_accept_comment','setvar'=>'accept_comment','this_tag'=>'var'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_anonymous_comment','setvar'=>'anonymous_comment','this_tag'=>'var'],null,$this),$this),$this->setup_args('anonymous_comment','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_comment_status','setvar'=>'comment_status','this_tag'=>'var'],null,$this),$this),$this->setup_args('comment_status','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_comment_thanks','setvar'=>'comment_thanks','this_tag'=>'var'],null,$this),$this),$this->setup_args('comment_thanks','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_enable_api','setvar'=>'enable_api','this_tag'=>'var'],null,$this),$this),$this->setup_args('enable_api','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_show_path_entry','setvar'=>'show_path_entry','this_tag'=>'var'],null,$this),$this),$this->setup_args('show_path_entry','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_show_path_page','setvar'=>'show_path_page','this_tag'=>'var'],null,$this),$this),$this->setup_args('show_path_page','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_language','setvar'=>'language','this_tag'=>'var'],null,$this),$this),$this->setup_args('language','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_barcolor','setvar'=>'barcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('barcolor','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'forward_bartextcolor','setvar'=>'bartextcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('bartextcolor','setvar',$this),$this,'setvar')?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_32d322'];$_1972e2_local_vars=$_1972e2_old_vars['_32d322'];?>


<form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
<input type="hidden" name="__mode" value="config">
<input type="hidden" name="_type" value="save">
<input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">

<div class="row form-group">
  <div class="col-lg-2">
    <label for="app_version">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Version','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <input readonly disabled type="text" id="app_version" name="app_version" class="form-control" value="PowerCMS X ver.<?php echo paml_htmlspecialchars($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'app_version','escape'=>'','this_tag'=>'property'],null,$this),$this),ENT_QUOTES)?>
 (<?php echo paml_htmlspecialchars($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'version','escape'=>'','this_tag'=>'property'],null,$this),$this),ENT_QUOTES)?>
)">
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="appname">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'App Name','this_tag'=>'trans'],null,$this),$this)?>

      <?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <input type="text" id="appname" name="appname" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="activation_code">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Activation Code','this_tag'=>'trans'],null,$this),$this)?>

      <?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <input type="text" id="activation_code" name="activation_code" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'activation_code','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="copyright">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Copyright','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <input type="text" id="copyright" name="copyright" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'copyright','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="description">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Description','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <textarea rows="4" id="description" name="description" class="form-control"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'description','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</textarea>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="two_factor_auth">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Authentication','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <label class="custom-control custom-checkbox">
    <input id="two_factor_auth" class="custom-control-input"
     type="checkbox" name="two_factor_auth" value="1" <?php $_1972e2_old_params['_7f122e']=$_1972e2_local_params;$_1972e2_old_vars['_7f122e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'two_factor_auth','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_7f122e'];$_1972e2_local_vars=$_1972e2_old_vars['_7f122e'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Use Two-factor Authentication','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
  <?php echo $this->function_trans($this->setup_args(['phrase'=>'User Lock Out','this_tag'=>'trans'],null,$this),$this)?>

  </div>
  <div class="col-lg-4 form-inline lockout-col">
    <label for="lockout_limit">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Lock Out Limit','this_tag'=>'trans'],null,$this),$this)?>
 : 
      <input type="number" id="lockout_limit" name="lockout_limit" class="form-control" value="<?php $_1972e2_old_params['_943809']=$_1972e2_local_params;$_1972e2_old_vars['_943809']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'lockout_limit','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'lockout_limit','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
3<?php endif;$_1972e2_local_params=$_1972e2_old_params['_943809'];$_1972e2_local_vars=$_1972e2_old_vars['_943809'];?>
">
    </label>
  </div>
  <div class="col-lg-6 form-inline lockout-col">
    <label for="lockout_interval">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Lock Out Interval(Seconds)','this_tag'=>'trans'],null,$this),$this)?>
 : 
      <input type="number" id="lockout_interval" name="lockout_interval" class="form-control" value="<?php $_1972e2_old_params['_882fdd']=$_1972e2_local_params;$_1972e2_old_vars['_882fdd']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'lockout_interval','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'lockout_interval','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
600<?php endif;$_1972e2_local_params=$_1972e2_old_params['_882fdd'];$_1972e2_local_vars=$_1972e2_old_vars['_882fdd'];?>
">
    </label>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
  <?php echo $this->function_trans($this->setup_args(['phrase'=>'IP Lock Out','this_tag'=>'trans'],null,$this),$this)?>

  </div>
  <div class="col-lg-4 form-inline lockout-col">
    <label for="ip_lockout_limit">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Lock Out Limit','this_tag'=>'trans'],null,$this),$this)?>
 : 
      <input type="number" id="ip_lockout_limit" name="ip_lockout_limit" class="form-control" value="<?php $_1972e2_old_params['_31680c']=$_1972e2_local_params;$_1972e2_old_vars['_31680c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'ip_lockout_limit','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'ip_lockout_limit','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
3<?php endif;$_1972e2_local_params=$_1972e2_old_params['_31680c'];$_1972e2_local_vars=$_1972e2_old_vars['_31680c'];?>
">
    </label>
  </div>
  <div class="col-lg-6 form-inline lockout-col">
    <label for="ip_lockout_interval">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Lock Out Interval(Seconds)','this_tag'=>'trans'],null,$this),$this)?>
 : 
      <input type="number" id="ip_lockout_interval" name="ip_lockout_interval" class="form-control" value="<?php $_1972e2_old_params['_1a1d74']=$_1972e2_local_params;$_1972e2_old_vars['_1a1d74']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'ip_lockout_interval','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'ip_lockout_interval','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
600<?php endif;$_1972e2_local_params=$_1972e2_old_params['_1a1d74'];$_1972e2_local_vars=$_1972e2_old_vars['_1a1d74'];?>
">
    </label>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <label class="custom-control custom-checkbox">
    <input id="no_lockout_allowed_ip" class="custom-control-input"
     type="checkbox" name="no_lockout_allowed_ip" value="1" <?php $_1972e2_old_params['_9187ce']=$_1972e2_local_params;$_1972e2_old_vars['_9187ce']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'no_lockout_allowed_ip','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_9187ce'];$_1972e2_local_vars=$_1972e2_old_vars['_9187ce'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Allowed ip address is not lockout','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>

<div class="row form-group" style="margin-top:-14px">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <p class="text-muted">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'When Lock Out Limit is set to 0, lockout is not performed.','this_tag'=>'trans'],null,$this),$this)?>

    </p>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Administrator','this_tag'=>'trans'],null,$this),$this)?>

  </div>
  <div class="col-lg-10">
    <label class="custom-control custom-checkbox">
    <input id="administrator_ip" class="custom-control-input"
     type="checkbox" name="administrator_ip" value="1" <?php $_1972e2_old_params['_c7d18f']=$_1972e2_local_params;$_1972e2_old_vars['_c7d18f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'administrator_ip','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c7d18f'];$_1972e2_local_vars=$_1972e2_old_vars['_c7d18f'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply IP address restriction to Administrator login','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <label class="custom-control custom-checkbox">
    <input id="allowed_ip_only" class="custom-control-input"
     type="checkbox" name="allowed_ip_only" value="1" <?php $_1972e2_old_params['_b6d59c']=$_1972e2_local_params;$_1972e2_old_vars['_b6d59c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'allowed_ip_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_b6d59c'];$_1972e2_local_vars=$_1972e2_old_vars['_b6d59c'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply IP address restriction to all user','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>

<div class="row form-group" style="margin-top:-14px">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <p class="text-muted">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You need to register at least one administrator login IP address.','this_tag'=>'trans'],null,$this),$this)?>

    <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=edit&_model=remote_ip"><i class="fa fa-plus-circle"></i> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Create','this_tag'=>'trans'],null,$this),$this)?>
</a>
    </p>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="system_email">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'System Email','this_tag'=>'trans'],null,$this),$this)?>

      <?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <input type="text" id="system_email" name="system_email" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'system_email','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
    <div class="input-group-addon" style="border: 1px solid #5d5d5d;border-left:none">
      <a href="javascript:void(0);" id="test_mail">
      <i class="fa fa-envelope" aria-hidden="true"></i>
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Send Test Mail','this_tag'=>'trans'],null,$this),$this)?>

      </a>
    </div>
  </div>
</div>
<script>
$('#test_mail').click(function(){
    result = window.prompt( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Send Mail To','this_tag'=>'trans'],null,$this),$this)?>
', '<?php echo $this->function_var($this->setup_args(['name'=>'user_email','this_tag'=>'var'],null,$this),$this)?>
' );
    if (! result ) {
        return;
    }
    var formData = {'magic_token': '<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
', '__mode': 'test_mail', 'email': result};
    $.ajax({
        url: '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
',
        data: formData,
        type:'POST',
        dataType: 'json',
        success: function(data){
            if ( data.result == true ) {
                alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'A test mail was sent.','this_tag'=>'trans'],null,$this),$this)?>
' );
            } else {
                alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while sending test mail.','this_tag'=>'trans'],null,$this),$this)?>
' );
            }
        },
        error: function(){
            alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while sending test mail.','this_tag'=>'trans'],null,$this),$this)?>
' );
        }
    });
});
</script>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="tmpl_markup">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Template Markup','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-3">
    <select class="form-control custom-select" id="tmpl_markup" name="tmpl_markup">
      <option value="mt" <?php $_1972e2_old_params['_ccf63a']=$_1972e2_local_params;$_1972e2_old_vars['_ccf63a']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tmpl_markup','eq'=>'mt','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ccf63a'];$_1972e2_local_vars=$_1972e2_old_vars['_ccf63a'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'PowerCMS Compatible','this_tag'=>'trans'],null,$this),$this)?>
</option>
      
    </select>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="default_widget">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Default Widget','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <textarea rows="10" id="default_widget" name="default_widget" class="form-control"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'default_widget','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</textarea>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="site_url">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Site URL','this_tag'=>'trans'],null,$this),$this)?>

      <?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group">
    <input type="text" id="site_url" name="site_url" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'site_url','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  </div>
</div>

<div class="row form-group mb-1">
  <div class="col-lg-2">
    <label for="preview_url">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Preview URL','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="text" id="preview_url" name="preview_url" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'preview_url','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
    <p class="text-muted mb-2 mt-1">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'When previewing with a URL different from the URL of the management screen, please enter the URL of the PHP application.','this_tag'=>'trans'],null,$this),$this)?>

    </p>
  </div>
</div>

<div class="row form-group mt-1 mb-1">
  <div class="col-lg-2">
    <label for="link_url">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Link URL','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="text" id="link_url" name="link_url" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'link_url','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
    <p class="text-muted mb-2 mt-1">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'When viewing with a URL different from the URL of the management screen, please enter the another URL of this website.','this_tag'=>'trans'],null,$this),$this)?>

    </p>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <label class="custom-control custom-checkbox">
    <input id="show_both" class="custom-control-input"
     type="checkbox" name="show_both" value="1" <?php $_1972e2_old_params['_f277ea']=$_1972e2_local_params;$_1972e2_old_vars['_f277ea']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_f277ea'];$_1972e2_local_vars=$_1972e2_old_vars['_f277ea'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Show Both','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  <span class="text-muted ">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Check this if you want to display both links together.','this_tag'=>'trans'],null,$this),$this)?>

  </span>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="site_path">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Site Path','this_tag'=>'trans'],null,$this),$this)?>

      <?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>

    </label>
  </div>
  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'site_base_path','setvar'=>'site_base_path','this_tag'=>'property'],null,$this),$this),$this->setup_args('site_base_path','setvar',$this),$this,'setvar')?>

  <?php $_1972e2_old_params['_a9d170']=$_1972e2_local_params;$_1972e2_old_vars['_a9d170']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'site_base_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div class="col-lg-10 form-inline">
      <?php echo $this->modifier_setvar($this->modifier_preg_quote($this->function_var($this->setup_args(['name'=>'site_base_path','preg_quote'=>'/','setvar'=>'search_path','this_tag'=>'var'],null,$this),$this),$this->setup_args('/','preg_quote',$this),$this,'preg_quote'),$this->setup_args('search_path','setvar',$this),$this,'setvar')?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'search_path','value'=>'/','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'search_path','value'=>'/^','prepend'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      &nbsp; &nbsp; &nbsp; <?php echo paml_htmlspecialchars(paml_modifier_funcs('rtrim', $this->function_var($this->setup_args(['name'=>'site_base_path','rtrim'=>'/','escape'=>'','this_tag'=>'var'],null,$this),$this), '/'),ENT_QUOTES)?>
/<input id="site_path" type="text" style="width: 200px;" class="form-control watch-changed" name="site_path" value="<?php echo paml_htmlspecialchars(paml_modifier_funcs('ltrim', $this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'site_path','regex_replace'=>'\'$search_path\',\'\'','ltrim'=>'/','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$search_path\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'), '/'),ENT_QUOTES)?>
">
    </div>
  <?php else:?>

  <div class="col-lg-10">
    <input type="text" id="site_path" name="site_path" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'site_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  </div>
  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a9d170'];$_1972e2_local_vars=$_1972e2_old_vars['_a9d170'];?>

</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="application_path">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Application Path','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="text" readonly disabled id="application_path" name="application_path" class="form-control" value="<?php echo paml_htmlspecialchars($this->modifier_regex_replace($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'pt_path','regex_replace'=>'\'/class\\.Prototype\\.php$/\',\'\'','escape'=>'','this_tag'=>'property'],null,$this),$this),$this->setup_args('\\\'/class\\\\.Prototype\\\\.php$/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),ENT_QUOTES)?>
">
  </div>
</div>

<div class="row form-group mt-1 mb-1">
  <div class="col-lg-2">
    <label for="document_root">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Document Root','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="text" id="document_root" name="document_root" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'document_root','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
    <p class="text-muted mb-2 mt-1">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Please specify if the document root of the management screen and the document root of website are different.','this_tag'=>'trans'],null,$this),$this)?>

    </p>
  </div>
</div>

<div class="row form-group mt-1 mb-3">
  <div class="col-lg-2">
    <label for="timezone">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Timezone','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'timezone','setvar'=>'system_timezone','this_tag'=>'property'],null,$this),$this),$this->setup_args('system_timezone','setvar',$this),$this,'setvar')?>

    <select id="timezone" class="form-control custom-select watch-changed" name="timezone">
    <?php $c_50509f=null;$_1972e2_old_params['_50509f']=$_1972e2_local_params;$_1972e2_old_vars['_50509f']=$_1972e2_local_vars;$a_50509f=$this->setup_args(['name'=>'timezones','this_tag'=>'loop'],null,$this);$_50509f=-1;$r_50509f=true;while($r_50509f===true):$r_50509f=($_50509f!==-1)?false:true;echo $this->block_loop($a_50509f,$c_50509f,$this,$r_50509f,++$_50509f,'_50509f');ob_start();?>
<?php $c_50509f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_50509f=false;}if($c_50509f ):?>

      <?php $_1972e2_old_params['_6ac557']=$_1972e2_local_params;$_1972e2_old_vars['_6ac557']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <option value="">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>

        </option>
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_6ac557'];$_1972e2_local_vars=$_1972e2_old_vars['_6ac557'];?>

        <option <?php $_1972e2_old_params['_859455']=$_1972e2_local_params;$_1972e2_old_vars['_859455']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'timezone','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_1972e2_old_params['_c2631c']=$_1972e2_local_params;$_1972e2_old_vars['_c2631c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_timezone','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected <?php endif;$_1972e2_local_params=$_1972e2_old_params['_c2631c'];$_1972e2_local_vars=$_1972e2_old_vars['_c2631c'];?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_859455'];$_1972e2_local_vars=$_1972e2_old_vars['_859455'];?>
<?php $_1972e2_old_params['_57fd5e']=$_1972e2_local_params;$_1972e2_old_vars['_57fd5e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'timezone','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected <?php endif;$_1972e2_local_params=$_1972e2_old_params['_57fd5e'];$_1972e2_local_vars=$_1972e2_old_vars['_57fd5e'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'$__key__','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</option>
    <?php endif;$c_50509f=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_50509f'];$_1972e2_local_vars=$_1972e2_old_vars['_50509f'];?>

    </select>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="extra_path">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-2">
    <input type="text" id="extra_path" name="extra_path" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  </div>
  <div class="col-lg-8 input-group mt-2">
    <label class="custom-control custom-checkbox">
    <input id="asset_publish" class="custom-control-input"
     type="checkbox" name="asset_publish" value="1" <?php $_1972e2_old_params['_23b797']=$_1972e2_local_params;$_1972e2_old_vars['_23b797']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'asset_publish','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_23b797'];$_1972e2_local_vars=$_1972e2_old_vars['_23b797'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Output the File','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

<?php $_1972e2_old_params['_39bff6']=$_1972e2_local_params;$_1972e2_old_vars['_39bff6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="show_path">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Comments','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <label class="custom-control custom-checkbox">
    <input id="accept_comment" class="custom-control-input"
     type="checkbox" name="accept_comment" value="1" <?php $_1972e2_old_params['_83ec8c']=$_1972e2_local_params;$_1972e2_old_vars['_83ec8c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_83ec8c'];$_1972e2_local_vars=$_1972e2_old_vars['_83ec8c'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Accept Comment','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <label class="custom-control custom-checkbox <?php $_1972e2_old_params['_36db03']=$_1972e2_local_params;$_1972e2_old_vars['_36db03']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'accept_comment','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
hidden<?php endif;$_1972e2_local_params=$_1972e2_old_params['_36db03'];$_1972e2_local_vars=$_1972e2_old_vars['_36db03'];?>
" id="anonymous_comment">
    <input class="custom-control-input"
     type="checkbox" name="anonymous_comment" value="1" <?php $_1972e2_old_params['_d874a0']=$_1972e2_local_params;$_1972e2_old_vars['_d874a0']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'anonymous_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_d874a0'];$_1972e2_local_vars=$_1972e2_old_vars['_d874a0'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Accept Anonymous Comment','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <label class="custom-control custom-checkbox <?php $_1972e2_old_params['_4e420c']=$_1972e2_local_params;$_1972e2_old_vars['_4e420c']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'accept_comment','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
hidden<?php endif;$_1972e2_local_params=$_1972e2_old_params['_4e420c'];$_1972e2_local_vars=$_1972e2_old_vars['_4e420c'];?>
" id="comment_thanks">
    <input class="custom-control-input"
     type="checkbox" name="comment_thanks" value="1" <?php $_1972e2_old_params['_e864c9']=$_1972e2_local_params;$_1972e2_old_vars['_e864c9']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'comment_thanks','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e864c9'];$_1972e2_local_vars=$_1972e2_old_vars['_e864c9'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Thanks email','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <span <?php $_1972e2_old_params['_aeb3ec']=$_1972e2_local_params;$_1972e2_old_vars['_aeb3ec']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'accept_comment','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
class="hidden"<?php endif;$_1972e2_local_params=$_1972e2_old_params['_aeb3ec'];$_1972e2_local_vars=$_1972e2_old_vars['_aeb3ec'];?>
" id="comment_status"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Status','this_tag'=>'trans'],null,$this),$this)?>
 &nbsp; : &nbsp;
    <select class="form-control custom-select short" name="comment_status">
      <option value="1" <?php $_1972e2_old_params['_7bc535']=$_1972e2_local_params;$_1972e2_old_vars['_7bc535']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'comment_status','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_1972e2_local_params=$_1972e2_old_params['_7bc535'];$_1972e2_local_vars=$_1972e2_old_vars['_7bc535'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'Disabled','this_tag'=>'trans'],null,$this),$this)?>
</option>
      <option value="2" <?php $_1972e2_old_params['_cf7f16']=$_1972e2_local_params;$_1972e2_old_vars['_cf7f16']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'comment_status','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_1972e2_local_params=$_1972e2_old_params['_cf7f16'];$_1972e2_local_vars=$_1972e2_old_vars['_cf7f16'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'Enabled','this_tag'=>'trans'],null,$this),$this)?>
</option>
    </select>
    </span>
  </div>
</div>
<script>
$('#accept_comment').change(function(){
    if ( $(this).prop('checked') ) {
        $('#anonymous_comment').css('display', 'inline');
        $('#comment_thanks').css('display', 'inline');
        $('#comment_status').css('display', 'inline');
        $('#anonymous_comment').show();
        $('#comment_thanks').show();
        $('#comment_status').show();
    } else {
        $('#anonymous_comment').hide();
        $('#comment_thanks').hide();
        $('#comment_status').hide();
    }
});
</script>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_39bff6'];$_1972e2_local_vars=$_1972e2_old_vars['_39bff6'];?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'app_version','setvar'=>'app_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('app_version','setvar',$this),$this,'setvar')?>

<?php $_1972e2_old_params['_19e6ff']=$_1972e2_local_params;$_1972e2_old_vars['_19e6ff']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'app_version','ge'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="enable_api">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'API','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="hidden" name="enable_api" value="0">
    <label class="custom-control custom-checkbox">
    <input id="enable_api" class="custom-control-input watch-changed"
     type="checkbox" name="enable_api" value="1" <?php $_1972e2_old_params['_061922']=$_1972e2_local_params;$_1972e2_old_vars['_061922']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'enable_api','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_061922'];$_1972e2_local_vars=$_1972e2_old_vars['_061922'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'Enable API','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</span>
    </label>
  </div>
</div>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_19e6ff'];$_1972e2_local_vars=$_1972e2_old_vars['_19e6ff'];?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="show_path">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Show Path Field','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <label class="custom-control custom-checkbox">
    <input id="show_path" class="custom-control-input"
     type="checkbox" name="show_path_entry" value="1" <?php $_1972e2_old_params['_d8524c']=$_1972e2_local_params;$_1972e2_old_vars['_d8524c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_path_entry','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_d8524c'];$_1972e2_local_vars=$_1972e2_old_vars['_d8524c'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Entry','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <label class="custom-control custom-checkbox">
    <input class="custom-control-input"
     type="checkbox" name="show_path_page" value="1" <?php $_1972e2_old_params['_ca050f']=$_1972e2_local_params;$_1972e2_old_vars['_ca050f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_path_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ca050f'];$_1972e2_local_vars=$_1972e2_old_vars['_ca050f'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Page','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="language">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Language','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-3">
    <?php $c_61ac43=null;$_1972e2_old_params['_61ac43']=$_1972e2_local_params;$_1972e2_old_vars['_61ac43']=$_1972e2_local_vars;$a_61ac43=$this->setup_args(['name'=>'languages','this_tag'=>'loop'],null,$this);$_61ac43=-1;$r_61ac43=true;while($r_61ac43===true):$r_61ac43=($_61ac43!==-1)?false:true;echo $this->block_loop($a_61ac43,$c_61ac43,$this,$r_61ac43,++$_61ac43,'_61ac43');ob_start();?>
<?php $c_61ac43 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_61ac43=false;}if($c_61ac43 ):?>

    <?php $_1972e2_old_params['_afdda6']=$_1972e2_local_params;$_1972e2_old_vars['_afdda6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <select class="form-control custom-select short" id="language" name="language">
    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_afdda6'];$_1972e2_local_vars=$_1972e2_old_vars['_afdda6'];?>

      <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
" <?php $_1972e2_old_params['_c6c6d7']=$_1972e2_local_params;$_1972e2_old_vars['_c6c6d7']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'language','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c6c6d7'];$_1972e2_local_vars=$_1972e2_old_vars['_c6c6d7'];?>
><?php echo $this->modifier_translate(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','translate'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','translate',$this),$this,'translate')?>
</option>
    <?php $_1972e2_old_params['_a77c89']=$_1972e2_local_params;$_1972e2_old_vars['_a77c89']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    </select>
    <?php endif;$_1972e2_local_params=$_1972e2_old_params['_a77c89'];$_1972e2_local_vars=$_1972e2_old_vars['_a77c89'];?>

    <?php endif;$c_61ac43=ob_get_clean();endwhile; $_1972e2_local_params=$_1972e2_old_params['_61ac43'];$_1972e2_local_vars=$_1972e2_old_vars['_61ac43'];?>

  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="barcolor">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Bar Color','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="color" id="barcolor" name="barcolor" class="watch-changed form-control color-picker" value="<?php $_1972e2_old_params['_60db7e']=$_1972e2_local_params;$_1972e2_old_vars['_60db7e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#000000<?php endif;$_1972e2_local_params=$_1972e2_old_params['_60db7e'];$_1972e2_local_vars=$_1972e2_old_vars['_60db7e'];?>
">
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="bartextcolor">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Bar TextColor','this_tag'=>'trans'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="color" id="bartextcolor" name="bartextcolor" class="watch-changed form-control color-picker" value="<?php $_1972e2_old_params['_c350bf']=$_1972e2_local_params;$_1972e2_old_vars['_c350bf']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ffffff<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c350bf'];$_1972e2_local_vars=$_1972e2_old_vars['_c350bf'];?>
">
  </div>
</div>

<div class="row form-group">
  <div class="col-lg-12">
  <button type="submit" class="btn btn-primary" id="__save"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save','this_tag'=>'trans'],null,$this),$this)?>
</button>
  </div>
</div>
</form>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'reset_url_method','setvar'=>'reset_url_method','this_tag'=>'property'],null,$this),$this),$this->setup_args('reset_url_method','setvar',$this),$this,'setvar')?>

<?php $_1972e2_old_params['_130f9e']=$_1972e2_local_params;$_1972e2_old_vars['_130f9e']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'reset_url_method','eq'=>'rename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#__save').click(function(){
    if ( $('#site_path').val() != '<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'site_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
' ) {
        if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Changing the site path will move all current files to the new file path. Are you sure you want to save your settings?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
            return false;
        }
    }
    return true;
});
</script>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_130f9e'];$_1972e2_local_vars=$_1972e2_old_vars['_130f9e'];?>

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

  <?php $_1972e2_old_params['_65b43c']=$_1972e2_local_params;$_1972e2_old_vars['_65b43c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'copyright','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <footer class="footer bar">
      <?php $_1972e2_old_params['_ea8550']=$_1972e2_local_params;$_1972e2_old_vars['_ea8550']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <span class="copyright"><?php echo $this->modifier_eval($this->function_var($this->setup_args(['name'=>'copyright','eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval')?>
</span>
      <?php endif;$_1972e2_local_params=$_1972e2_old_params['_ea8550'];$_1972e2_local_vars=$_1972e2_old_vars['_ea8550'];?>

    </footer>
  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_65b43c'];$_1972e2_local_vars=$_1972e2_old_vars['_65b43c'];?>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"RebuildPopupWindow","width=420,height=<?php $_1972e2_old_params['_814ebd']=$_1972e2_local_params;$_1972e2_old_vars['_814ebd']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
360<?php else:?>
320<?php endif;$_1972e2_local_params=$_1972e2_old_params['_814ebd'];$_1972e2_local_vars=$_1972e2_old_vars['_814ebd'];?>
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
<?php $_1972e2_old_params['_6b68d2']=$_1972e2_local_params;$_1972e2_old_vars['_6b68d2']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_1972e2_old_params['_8601fe']=$_1972e2_local_params;$_1972e2_old_vars['_8601fe']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_1972e2_old_params['_729694']=$_1972e2_local_params;$_1972e2_old_vars['_729694']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_1972e2_old_params['_f6478f']=$_1972e2_local_params;$_1972e2_old_vars['_f6478f']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_f6478f'];$_1972e2_local_vars=$_1972e2_old_vars['_f6478f'];?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_729694'];$_1972e2_local_vars=$_1972e2_old_vars['_729694'];?>

<?php $_1972e2_old_params['_a38764']=$_1972e2_local_params;$_1972e2_old_vars['_a38764']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_1972e2_old_params['_41b6ab']=$_1972e2_local_params;$_1972e2_old_vars['_41b6ab']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_41b6ab'];$_1972e2_local_vars=$_1972e2_old_vars['_41b6ab'];?>

<?php $_1972e2_old_params['_43a836']=$_1972e2_local_params;$_1972e2_old_vars['_43a836']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_43a836'];$_1972e2_local_vars=$_1972e2_old_vars['_43a836'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a38764'];$_1972e2_local_vars=$_1972e2_old_vars['_a38764'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_1972e2_old_params['_025203']=$_1972e2_local_params;$_1972e2_old_vars['_025203']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_1972e2_local_params=$_1972e2_old_params['_025203'];$_1972e2_local_vars=$_1972e2_old_vars['_025203'];?>

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
?__mode=view&_type=list&_model=asset<?php $_1972e2_old_params['_a3075c']=$_1972e2_local_params;$_1972e2_old_vars['_a3075c']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a3075c'];$_1972e2_local_vars=$_1972e2_old_vars['_a3075c'];?>
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
?__mode=view&_type=list&_model=asset<?php $_1972e2_old_params['_823b42']=$_1972e2_local_params;$_1972e2_old_vars['_823b42']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_823b42'];$_1972e2_local_vars=$_1972e2_old_vars['_823b42'];?>
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
            <?php $_1972e2_old_params['_f5083d']=$_1972e2_local_params;$_1972e2_old_vars['_f5083d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_1972e2_old_params['_db0187']=$_1972e2_local_params;$_1972e2_old_vars['_db0187']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_db0187'];$_1972e2_local_vars=$_1972e2_old_vars['_db0187'];?>

                <?php $_1972e2_old_params['_71b2df']=$_1972e2_local_params;$_1972e2_old_vars['_71b2df']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_71b2df'];$_1972e2_local_vars=$_1972e2_old_vars['_71b2df'];?>

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
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_f5083d'];$_1972e2_local_vars=$_1972e2_old_vars['_f5083d'];?>

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
<?php $_1972e2_old_params['_8bf641']=$_1972e2_local_params;$_1972e2_old_vars['_8bf641']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_1972e2_old_params['_b76695']=$_1972e2_local_params;$_1972e2_old_vars['_b76695']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_1972e2_local_params=$_1972e2_old_params['_b76695'];$_1972e2_local_vars=$_1972e2_old_vars['_b76695'];?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8bf641'];$_1972e2_local_vars=$_1972e2_old_vars['_8bf641'];?>

<?php $_1972e2_old_params['_6b0d95']=$_1972e2_local_params;$_1972e2_old_vars['_6b0d95']=$_1972e2_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_1972e2_old_params['_bff3f3']=$_1972e2_local_params;$_1972e2_old_vars['_bff3f3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_bff3f3'];$_1972e2_local_vars=$_1972e2_old_vars['_bff3f3'];?>

<?php $_1972e2_old_params['_ce3fec']=$_1972e2_local_params;$_1972e2_old_vars['_ce3fec']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_ce3fec'];$_1972e2_local_vars=$_1972e2_old_vars['_ce3fec'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6b0d95'];$_1972e2_local_vars=$_1972e2_old_vars['_6b0d95'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_1972e2_old_params['_eeeb15']=$_1972e2_local_params;$_1972e2_old_vars['_eeeb15']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_1972e2_local_params=$_1972e2_old_params['_eeeb15'];$_1972e2_local_vars=$_1972e2_old_vars['_eeeb15'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_1972e2_old_params['_6665f8']=$_1972e2_local_params;$_1972e2_old_vars['_6665f8']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6665f8'];$_1972e2_local_vars=$_1972e2_old_vars['_6665f8'];?>
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
                <?php $_1972e2_old_params['_d13556']=$_1972e2_local_params;$_1972e2_old_vars['_d13556']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_d13556'];$_1972e2_local_vars=$_1972e2_old_vars['_d13556'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_1972e2_old_params['_833ac6']=$_1972e2_local_params;$_1972e2_old_vars['_833ac6']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_833ac6'];$_1972e2_local_vars=$_1972e2_old_vars['_833ac6'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_1972e2_old_params['_0f29bf']=$_1972e2_local_params;$_1972e2_old_vars['_0f29bf']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_1972e2_local_params=$_1972e2_old_params['_0f29bf'];$_1972e2_local_vars=$_1972e2_old_vars['_0f29bf'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_1972e2_old_params['_7a6a0d']=$_1972e2_local_params;$_1972e2_old_vars['_7a6a0d']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_7a6a0d'];$_1972e2_local_vars=$_1972e2_old_vars['_7a6a0d'];?>
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
            <?php $_1972e2_old_params['_59da36']=$_1972e2_local_params;$_1972e2_old_vars['_59da36']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_1972e2_old_params['_a3a5f1']=$_1972e2_local_params;$_1972e2_old_vars['_a3a5f1']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_a3a5f1'];$_1972e2_local_vars=$_1972e2_old_vars['_a3a5f1'];?>

                      <?php $_1972e2_old_params['_8b1bfc']=$_1972e2_local_params;$_1972e2_old_vars['_8b1bfc']=$_1972e2_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8b1bfc'];$_1972e2_local_vars=$_1972e2_old_vars['_8b1bfc'];?>

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
            <?php endif;$_1972e2_local_params=$_1972e2_old_params['_59da36'];$_1972e2_local_vars=$_1972e2_old_vars['_59da36'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_8601fe'];$_1972e2_local_vars=$_1972e2_old_vars['_8601fe'];?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_6b68d2'];$_1972e2_local_vars=$_1972e2_old_vars['_6b68d2'];?>

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
<?php $_1972e2_old_params['_c2c1b3']=$_1972e2_local_params;$_1972e2_old_vars['_c2c1b3']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_1972e2_old_params['_e9eca4']=$_1972e2_local_params;$_1972e2_old_vars['_e9eca4']=$_1972e2_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'loading','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_1972e2_local_params=$_1972e2_old_params['_e9eca4'];$_1972e2_local_vars=$_1972e2_old_vars['_e9eca4'];?>

<?php endif;$_1972e2_local_params=$_1972e2_old_params['_c2c1b3'];$_1972e2_local_vars=$_1972e2_old_vars['_c2c1b3'];?>

</script>
  </div>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>

<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\config.tmpl' => 1694708530,
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
  'time' => 1743988213,
);?>